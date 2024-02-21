<?php

namespace App\DTO;

class DiscogsReleaseDTO
{
    public array $style;
    public string $thumb;
    public string $title;
    public string $uri;
    public string $label;
    public int $year;
    public array $format;
    public array $genre;
    public string $resourceUrl;
    public int $id;

    public function __construct(array $style, string $thumb, string $title, string $uri, string $label, int $year, array $format, array $genre, string $resourceUrl, int $id)
    {
        $this->style = $style;
        $this->thumb = $thumb;
        $this->title = $title;
        $this->uri = $uri;
        $this->label = $label;
        $this->year = $year;
        $this->format = $format;
        $this->genre = $genre;
        $this->resourceUrl = $resourceUrl;
        $this->id = $id;
    }
}