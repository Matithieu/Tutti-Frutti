<?php

namespace App\DTO;

class DiscogsArtistDTO
{
    private $nameVariations;
    private $profile;
    private $releasesUrl;
    private $resourceUrl;
    private $uri;
    private $images;
    private $members;

    public function __construct($nameVariations, $profile, $releasesUrl, $resourceUrl, $uri, $images, $members = null)
    {
        $this->nameVariations = $nameVariations;
        $this->profile = $profile;
        $this->releasesUrl = $releasesUrl;
        $this->resourceUrl = $resourceUrl;
        $this->uri = $uri;
        $this->images = $images;
        $this->members = $members;
    }

    public function getNameVariations()
    {
        return $this->nameVariations;
    }

    public function getProfile()
    {
        return $this->profile;
    }

    public function getReleasesUrl()
    {
        return $this->releasesUrl;
    }

    public function getResourceUrl()
    {
        return $this->resourceUrl;
    }

    public function getUri()
    {
        return $this->uri;
    }

    public function getImages()
    {
        return $this->images;
    }

    public function getMembers()
    {
        return $this->members;
    }
}
