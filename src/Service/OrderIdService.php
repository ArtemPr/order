<?php

namespace App\Service;

use App\DTO\RequestDTOInterface;

class OrderIdService
{
    public function getOrderId($param): int
    {
        $orderNumMicroservice = 'https://mdixteem8ct1fb2i9xw2pj7yudcbv4.ru/get_num';
        // @TODO send request
        return 3242231;
    }
}