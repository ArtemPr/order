<?php

namespace App\Transformer;

use App\DTO\RequestDTO;
use App\DTO\RequestDTOInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class RequestTransformer
{

    public function __construct(
        private readonly ValidatorInterface $validator
    )
    {
    }

    public function transformRequest(array $request): RequestDTOInterface
    {
        $requestDTO = new RequestDTO();
        $this->validator->validate($request);
        $requestDTO->setName($request['fio'] ?? null);
        $requestDTO->setPhone($request['phone'] ?? null);
        $requestDTO->setEmail($request['email'] ?? null);
        $requestDTO->setProduct($request['product_name'] ?? null);
        $requestDTO->setProductId($request['product_id'] ?? null);
        $requestDTO->setComment($request['comment'] ?? null);
        $requestDTO->setTabId($request['tab_id'] ?? null);
        $requestDTO->setCurrentPrice($request['current_price'] ?? null);
        $requestDTO->setLongTime($request['long_time'] ?? null);
        $requestDTO->setSiteDomainExact($request['site_domain_exact'] ?? null);
        $requestDTO->setPageUrl($request['page_url'] ?? null);
        $requestDTO->setFormName($request['form_name'] ?? null);
        $requestDTO->setLinkThankYou($request['link_thank_you'] ?? null);

        return $requestDTO;
    }

}