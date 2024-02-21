<?php

namespace App\DTO;

class DiscogsArtistDTO
{
    public array $nameVariations;
    public string $profile;
    public string $releasesUrl;
    public string $resourceUrl;
    public string $uri;
    public array $images;
    public array $members;
    public int $id;

    public function __construct(array $nameVariations, string $profile, string $releasesUrl, string $resourceUrl, string $uri, array $images, array $members, int $id)
    {
        $this->nameVariations = $nameVariations;
        $this->profile = $profile;
        $this->releasesUrl = $releasesUrl;
        $this->resourceUrl = $resourceUrl;
        $this->uri = $uri;
        $this->images = $images;
        $this->members = $members;
        $this->id = $id;
    }
}
