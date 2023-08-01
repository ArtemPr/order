<?php

namespace App\Service;

use App\DTO\RequestDTOInterface;
use App\Entity\TrainingCentre;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

final class SendForCRMService
{
    private string|null $trainingCentreHashKey = null;

    private string|null $trainingCentreCrmUrl = null;

    private string|null $orderId = null;

    public function __construct(
        private readonly EntityManagerInterface $entityManager,
        private readonly HttpClientInterface $httpClient,
        private readonly OrderIdService $orderIdService
    )
    {
    }

    public function __invoke(RequestDTOInterface $param): array
    {
        $this->orderId = $this->orderIdService->getOrderId($param);
        $this->trainingCentreFactory($param->getTrainingCentre());
        $crmURL = $this->getCrmUrl($param->getTrainingCentre());
        $param = $this->convertResponseData($param);
        $param = $this->setCustomParam($param);
        try {
            $response = $this->httpClient->request(
                'POST',
                $crmURL,
                [
                    'body' => $param,
                    'extra' => [
                        'curl' => [
                            CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4,
                        ],
                    ],
                ]
            );

            $responseResult = $response->toArray();
        } catch (TransportExceptionInterface|ServerExceptionInterface|RedirectionExceptionInterface|DecodingExceptionInterface|ClientExceptionInterface $e) {
            throw new $e->getMessage();
        }
        return $responseResult;
    }

    private function setCustomParam($param)
    {
        $param['order_key'] = $this->getKey($param);
        $param['encoding'] = 'utf-8';
        //$param['order_id'] = $this->orderId;
        return $param;
    }

    private function trainingCentreFactory(int $trainingCentreId): void
    {
        $trainingCentre = $this->entityManager->getRepository(TrainingCentre::class)->find(
            $trainingCentreId
        );
        $this->trainingCentreHashKey = $trainingCentre->getKey();
        $this->trainingCentreCrmUrl = $trainingCentre->getCrmUrl();
    }

    private function getCrmUrl(): ?string
    {
        return $this->trainingCentreCrmUrl ? 'https://' . $this->trainingCentreCrmUrl . '.dev.priemka.online/new_order' : null ;
    }

    public function getKey($param): string
    {
        $apiKey = md5($this->trainingCentreCrmUrl.$this->trainingCentreHashKey);
        return md5($apiKey . $param['phone'] . $param['email']);;
    }

    private function convertResponseData(RequestDTOInterface $param): array
    {
        return [
            'fio' => $param->getName(),
            'email' => $param->getEmail(),
            'phone' => $param->getPhone(),
            'product_name' => $param->getProduct(),
            'comment' => $param->getComment(),
        ];
    }
}
