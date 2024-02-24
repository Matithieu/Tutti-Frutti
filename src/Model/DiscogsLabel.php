<?php

namespace App\Model;

class DiscogsLabel
{
    private ?int $id = null;

    private ?string $name = null;

    private ?string $profile = null;

    private ?string $contactInfo = null;

    private ?array $subLabels = null;

    private ?array $urls = null;

    private ?array $images = null;

    public function __construct(int $id, string $name = '', string $profile = '', string $contactInfo = '', array $subLabels = [], array $urls = [], array $images = [])
    {
        $this->id = $id;
        $this->name = $name;
        $this->profile = $profile;
        $this->contactInfo = $contactInfo;
        $this->subLabels = $subLabels;
        $this->urls = $urls;
        $this->images = $images;
    }

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
