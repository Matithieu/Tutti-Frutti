<?php

namespace App\DTO;

class DiscogsLabelDTO
{
    private string $name;
    private string $profile;
    private string $contactInfo;
    private array $sublabels;
    private array $urls;
    private array $images;

    public function __construct(string $name, string $profile, string $contactInfo, array $sublabels, array $urls = [], array $images = [])
    {
        $this->name = $name;
        $this->profile = $profile;
        $this->contactInfo = $contactInfo;
        $this->sublabels = $sublabels;
        $this->urls = $urls;
        $this->images = $images;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getProfile(): string
    {
        return $this->profile;
    }

    public function getContactInfo(): string
    {
        return $this->contactInfo;
    }

    public function getSublabels(): array
    {
        return $this->sublabels;
    }

    public function getUrls(): array
    {
        return $this->urls;
    }

    public function getImages(): array
    {
        return $this->images;
    }
}
