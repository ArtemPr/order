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

    #[Type("int")]
    #[Serializer\SerializedName("tab_id")]
    private ?int $tab_id;

    #[Type("string")]
    #[Serializer\SerializedName("current_price")]
    private ?string $current_price;

    #[Type("int")]
    #[Serializer\SerializedName("long_time")]
    private ?int $long_time;

    #[Type("string")]
    #[Serializer\SerializedName("site_domain_exact")]
    private ?string $site_domain_exact;

    #[Type("string")]
    #[Serializer\SerializedName("page_url")]
    private ?string $page_url;

    #[Type("string")]
    #[Serializer\SerializedName("form_name")]
    private ?string $form_name;

    #[Type("string")]
    #[Serializer\SerializedName("link_thank_you")]
    private ?string $link_thank_you;

    
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

    public function getTabId(): ?int
    {
        return $this->tab_id;
    }

    public function setTabId(?int $tab_id): void
    {
        $this->tab_id = $tab_id;
    }

    
    public function getCurrentPrice(): ?string
    {
        return $this->current_price;
    }

    public function setCurrentPrice(?string $current_price): void
    {
        $this->current_price = $current_price;
    }

    public function getLongTime(): ?int
    {
        return $this->long_time;
    }

    public function setLongTime(?int $long_time): void
    {
        $this->long_time = $long_time;
    }

    
    public function getSiteDomainExact(): ?string
    {
        return $this->site_domain_exact;
    }

    public function setSiteDomainExact(?string $site_domain_exact): void
    {
        $this->site_domain_exact = $site_domain_exact;
    }

    
    public function getPageUrl(): ?string
    {
        return $this->page_url;
    }

    public function setPageUrl(?string $page_url): void
    {
        $this->page_url = $page_url;
    }

    
    public function getFormName(): ?string
    {
        return $this->form_name;
    }

    public function setFormName(?string $form_name): void
    {
        $this->form_name = $form_name;
    }

    
    public function getLinkThankYou(): ?string
    {
        return $this->link_thank_you;
    }

    public function setLinkThankYou(?string $link_thank_you): void
    {
        $this->link_thank_you = $link_thank_you;
    }
}