<?php

namespace App\Entity;

use App\Repository\LabelRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LabelRepository::class)]
class Label
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $name = null;

    #[ORM\Column(length: 10000, nullable: true)]
    private ?string $profile = null;

    #[ORM\Column(length: 10000, nullable: true)]
    private ?string $contactInfo = null;

    #[ORM\Column(type: Types::SIMPLE_ARRAY, nullable: true)]
    private ?array $subLabels = null;

    #[ORM\Column(type: Types::SIMPLE_ARRAY, nullable: true)]
    private ?array $urls = null;

    #[ORM\Column(type: Types::SIMPLE_ARRAY, nullable: true)]
    private ?array $images = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getProfile(): ?string
    {
        return $this->profile;
    }

    public function setProfile(?string $profile): static
    {
        $this->profile = $profile;

        return $this;
    }

    public function getContactInfo(): ?string
    {
        return $this->contactInfo;
    }

    public function setContactInfo(?string $contactInfo): static
    {
        $this->contactInfo = $contactInfo;

        return $this;
    }

    public function getSubLabels(): ?array
    {
        return $this->subLabels;
    }

    public function setSubLabels(?array $subLabels): static
    {
        $this->subLabels = $subLabels;

        return $this;
    }

    public function getUrls(): ?array
    {
        return $this->urls;
    }

    public function setUrls(?array $urls): static
    {
        $this->urls = $urls;

        return $this;
    }

    public function getImages(): ?array
    {
        return $this->images;
    }

    public function setImages(?array $images): static
    {
        $this->images = $images;

        return $this;
    }
}
