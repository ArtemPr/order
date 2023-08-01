<?php

declare(strict_types=1);

namespace App\Controller\API;

use App\Service\SendForCRMService;
use App\Transformer\RequestTransformer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

final class ApiPOST extends AbstractController
{
    public function __construct(
        private readonly RequestTransformer $requestTransformer
    )
    {
    }

    /**
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws ClientExceptionInterface
     */
    #[Route('/api/post/add', name: 'addOrderPost',  methods: ['POST'])]
    public function postOrder(
        Request $request,
        SendForCRMService $CRMService
    ): Response
    {
        $request = $request->request->all();
        $request = $this->requestTransformer->transformRequest($request);
        $crmResult = $CRMService($request);
        return $this->json($crmResult);
    }

    /**
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws ClientExceptionInterface
     */
    #[Route('/api/get/add', name: 'addOrderGet', methods: ['GET'])]
    public function getOrder(
        Request $request,
        SendForCRMService $CRMService
    ): Response
    {
        $request = $request->query->all();
        $request = $this->requestTransformer->transformRequest($request);
        $crmResult = $CRMService($request);
        return $this->json($crmResult);
    }
}



