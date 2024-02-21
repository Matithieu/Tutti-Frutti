<?php

namespace App\DTO;

class DiscogsLabelDTO
{
    public int $id;
    public string $name;
    public string $profile;
    public string $contactInfo;
    public array $sublabels;
    public array $urls;
    public array $images;

    public function __construct(int $id, string $name, string $profile, string $contactInfo, array $sublabels, array $urls, array $images)
    {
        $this->id = $id;
        $this->name = $name;
        $this->profile = $profile;
        $this->contactInfo = $contactInfo;
        $this->sublabels = $sublabels;
        $this->urls = $urls;
        $this->images = $images;
    }
}
