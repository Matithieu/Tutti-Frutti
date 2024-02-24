<?php

namespace App\Model;

class DiscogsRelease
{
    private ?int $id = null;

    private ?array $style = null;

    private ?string $thumb = null;

    private ?string $title = null;

    private ?string $uri = null;

    private ?string $label = null;

    private ?int $year = null;

    private ?array $format = null;

    private ?array $genre = null;

    private ?string $ressourceUrl = null;

    public function __construct(int $id, array $style = [], string $thumb = '', string $title = '', string $uri = '', string $label = '', int $year = null, array $format = [], array $genre = [], string $ressourceUrl = '')
    {
        $this->id = $id;
        $this->style = $style;
        $this->thumb = $thumb;
        $this->title = $title;
        $this->uri = $uri;
        $this->label = $label;
        $this->year = $year;
        $this->format = $format;
        $this->genre = $genre;
        $this->ressourceUrl = $ressourceUrl;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStyle(): ?array
    {
        return $this->style;
    }

    public function setStyle(?array $style): static
    {
        $this->style = $style;

        return $this;
    }

    public function getThumb(): ?string
    {
        return $this->thumb;
    }

    public function setThumb(?string $thumb): static
    {
        $this->thumb = $thumb;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getUri(): ?string
    {
        return $this->uri;
    }

    public function setUri(?string $uri): static
    {
        $this->uri = $uri;

        return $this;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(?string $label): static
    {
        $this->label = $label;

        return $this;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(?int $year): static
    {
        $this->year = $year;

        return $this;
    }

    public function getFormat(): ?array
    {
        return $this->format;
    }

    public function setFormat(?array $format): static
    {
        $this->format = $format;

        return $this;
    }

    public function getGenre(): ?array
    {
        return $this->genre;
    }

    public function setGenre(?array $genre): static
    {
        $this->genre = $genre;

        return $this;
    }

    public function getRessourceUrl(): ?string
    {
        return $this->ressourceUrl;
    }

    public function setRessourceUrl(?string $ressourceUrl): static
    {
        $this->ressourceUrl = $ressourceUrl;

        return $this;
    }
}
