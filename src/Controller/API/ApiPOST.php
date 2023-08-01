<?php

namespace App\Controller\API;

use App\Service\SendForCRMService;
use App\Transformer\RequestTransformer;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class ApiPOST extends AbstractController
{
    public function __construct(
        private readonly RequestTransformer $requestTransformer
    )
    {
    }

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



