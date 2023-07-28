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

        $orderId = $orderIdService->getOrderId($request);
        $crm = $CRMService->send($request);

        return $this->json($request);
    }
}