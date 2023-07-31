<?php

namespace App\Controller\API;

use App\Service\OrderIdService;
use App\Service\SendForCRMService;
use App\Transformer\RequestTransformer;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApiPOST extends AbstractController
{
    public function __construct(
        private readonly EntityManagerInterface $entityManager,
        private readonly RequestTransformer $requestTransformer
    )
    {
    }

    #[Route('/api/post/add')]
    public function postOrder(
        Request $request,
        SendForCRMService $CRMService,
        OrderIdService $orderIdService
    ): Response
    {
        $request = $request->request->all();
        $request = $this->requestTransformer->transformRequest($request);
dd($request);
        $orderId = $orderIdService->getOrderId($request);
        $crm = $CRMService->send($request);

        return $this->json($orderId);
    }

//    private function sendToCRM(array $data): array
//    {
//        if ($this->isSpam($data)) {
//            return [
//                'result' => 'success',
//                'order_num' => $data['order_num'],
//            ];
//        }
//
//        $this->getCredential();
//
//        $data['phone'] = trim(str_replace('+', '', $data['phone']));
//        $data['order_key'] = md5($this->api_key.$data['phone'].$data['email']);
//
//        try {
//            $response = $this->client->request(
//                'POST',
//                $this->crm_url,
//                [
//                    'body' => $data,
//                    'timeout' => 15,
//                    'extra' => [
//                        'curl' => [
//                            CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4,
//                        ],
//                    ],
//                ]
//            );
//
//            $crm_content = $response->toArray();
//        } catch (\Exception $exception) {
//            $crm_content['result'] = 'error';
//            $crm_content['error_message'] = $exception;
//        }
//
//        $crm_content['order_num'] = $data['order_num'];
//
//        if (null !== $this->program) {
//            $crm_content['price'] = (string) ($this->program->getDiscountPrice() ?? $this->program->getPrice());
//            $category = $this->program->getCategory()->first();
//            $crm_content['category'] = $category->getCategoryName().(!empty($category->getPartnerProgram()) ? '. Программы от партнеров' : '');
//        }
//
//        $this->logCrmService
//            ->addData('crm_url', $this->crm_url)
//            ->setSecureData('phone', $data['phone'])
//            ->setSecureData('email', $data['email'])
//            ->setSecureData('fio', $data['fio'])
//            ->execute($crm_content, $data);
//
//        $visit = $this->OrderVisit($data, $crm_content);
//
//        // Запись в БД для сбора статистики
//        $this->collectStatistics($crm_content, $data, $visit);
//
//        return $crm_content;
//    }

}



