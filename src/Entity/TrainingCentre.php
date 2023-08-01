<?php

namespace App\Entity;

use App\Repository\TrainingCentreRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TrainingCentreRepository::class)]
class TrainingCentre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $crm_url = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $key = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getCrmUrl(): ?string
    {
        return $this->crm_url;
    }

    public function setCrmUrl(string $crm_url): static
    {
        $this->crm_url = $crm_url;

        return $this;
    }

    public function getKey(): ?string
    {
        return $this->key;
    }

    public function setKey(?string $key): static
    {
        $this->key = $key;

        return $this;
    }
}
