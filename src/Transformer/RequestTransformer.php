<?php

declare(strict_types=1);

namespace App\Transformer;

use App\DTO\RequestDTO;
use App\DTO\RequestDTOInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

final class RequestTransformer
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
        //$requestDTO->setProductId($request['product_id'] ?? null);
        $requestDTO->setComment($request['comment'] ?? null);
        //$requestDTO->setPrice($request['price'] ?? null);
        //$requestDTO->setLongTime($request['long_time'] ?? null);
        $requestDTO->setTrainingCentre($request['training_centre']);

        return $requestDTO;
    }

}