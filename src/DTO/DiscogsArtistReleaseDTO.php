<?php

namespace App\DTO;

class DiscogsArtistReleaseDTO
{
    public array $artist;
    public int $id;
    public int $mainRelease;
    public string $resourceUrl;
    public string $role;
    public string $thumb;
    public string $title;
    public string $type;
    public int $year;
    public string $format;
    public string $label;
    public string $status;

    public function __construct(array $artist, int $id, int $mainRelease, string $resourceUrl, string $role, string $thumb, string $title, string $type, int $year, string $format, string $label, string $status)
    {
        $this->artist = $artist;
        $this->id = $id;
        $this->mainRelease = $mainRelease;
        $this->resourceUrl = $resourceUrl;
        $this->role = $role;
        $this->thumb = $thumb;
        $this->title = $title;
        $this->type = $type;
        $this->year = $year;
        $this->format = $format;
        $this->label = $label;
        $this->status = $status;
    }
}
