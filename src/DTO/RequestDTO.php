<?php

namespace App\DTO;

class RequestDTO implements RequestDTOInterface
{
    public string $name;

    public string $email;

    public string $phone;

    public string $product;

    public string $product_id;
}