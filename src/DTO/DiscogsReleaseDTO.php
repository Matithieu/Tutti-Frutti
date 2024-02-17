<?php

namespace App\DTO;

class DiscogsReleaseDTO
{
    private $style;
    private $thumb;
    private $title;
    private $format;
    private $uri;
    private $label;
    private $year;
    private $genre;
    private $resourceUrl;
    private $type;
    private $id;

    public function __construct($style, $thumb, $title, $format, $uri, $label, $year, $genre, $resourceUrl, $type, $id)
    {
        $this->style = $style;
        $this->thumb = $thumb;
        $this->title = $title;
        $this->format = $format;
        $this->uri = $uri;
        $this->label = $label;
        $this->year = $year;
        $this->genre = $genre;
        $this->resourceUrl = $resourceUrl;
        $this->type = $type;
        $this->id = $id;
    }

    public function getStyle()
    {
        return $this->style;
    }

    public function getThumb()
    {
        return $this->thumb;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getFormat()
    {
        return $this->format;
    }

    public function getUri()
    {
        return $this->uri;
    }

    public function getLabel()
    {
        return $this->label;
    }

    public function getYear()
    {
        return $this->year;
    }

    public function getGenre()
    {
        return $this->genre;
    }

    public function getResourceUrl()
    {
        return $this->resourceUrl;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getId()
    {
        return $this->id;
    }
}