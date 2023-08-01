<?php

namespace App\DTO;

use JMS\Serializer\Annotation as Serializer;
use JMS\Serializer\Annotation\Type AS Type;

class RequestDTO implements RequestDTOInterface
{
    #[Type("string")]
    #[Serializer\SerializedName("name")]
    private ?string $name;

    #[Type("string")]
    #[Serializer\SerializedName("email")]
    private ?string $email;

    #[Type("string")]
    #[Serializer\SerializedName("phone")]
    private ?string $phone;

    #[Type("string")]
    #[Serializer\SerializedName("product")]
    private ?string $product;

    #[Type("int")]
    #[Serializer\SerializedName("product_id")]
    private ?int $product_id;

    #[Type("string")]
    #[Serializer\SerializedName("comment")]
    private ?string $comment;

    #[Type("string")]
    #[Serializer\SerializedName("current_price")]
    private ?string $price;

    #[Type("int")]
    #[Serializer\SerializedName("long_time")]
    private ?int $long_time;

    #[Type("string")]
    #[Serializer\SerializedName("training_centre")]
    private ?int $training_centre;

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): void
    {
        $phone = preg_replace('/[^0-9]/i', '', $phone);
        if ((int)$phone[0] === 8) {
            $phone = substr($phone, 1);
            $phone = '7' . $phone;
        }
        $this->phone = $phone;
    }

    public function getProduct(): ?string
    {
        return $this->product;
    }

    public function setProduct(?string $product): void
    {
        $this->product = $product;
    }

    public function getProductId(): ?int
    {
        return $this->product_id;
    }

    public function setProductId(?int $product_id): void
    {
        $this->product_id = $product_id;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): void
    {
        $this->comment = $comment;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(?string $price): void
    {
        $this->price = $price;
    }

    public function getLongTime(): ?int
    {
        return $this->long_time;
    }

    public function setLongTime(?int $long_time): void
    {
        $this->long_time = $long_time;
    }

    public function getTrainingCentre(): ?string
    {
        return $this->training_centre;
    }

    public function setTrainingCentre(?string $training_centre): void
    {
        $this->training_centre = $training_centre;
    }

}