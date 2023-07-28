<?php

namespace App\Transformer;

use App\DTO\RequestDTO;
use App\DTO\RequestDTOInterface;

class RequestTransformer
{
    public function transformRequest(array $request): RequestDTOInterface
    {
        $requestDTO = new RequestDTO();
        $requestDTO->name = $request['name'];
        $requestDTO->phone = $this->transformPhone($request['phone']);
        $requestDTO->email = $request['email'];
        $requestDTO->product = $request['product'];
        $requestDTO->product_id = $request['product_id'];

        return $requestDTO;
    }

    private function transformPhone(string $phone): string
    {
        $phone = preg_replace('/[^0-9]/i', '', $phone);

        if ((int)$phone[0] === 8) {
            $phone = substr($phone, 1);
            $phone = '+7' . $phone;
        }

        return $phone;
    }
}