<?php

namespace App\DTO;

class DiscogsSearchDTO
{
    private int $id;
    private string $title;
    private array $style;
    private string $country;
    private array $format;
    private string $uri;
    private array $label;
    private int $year;
    private string $type;
    private string $thumb;
    private array $genre;

    public function __construct(int $id, string $title, array $style, string $country = null, array $format = [], string $uri, array $label, int $year, string $type, string $thumb, array $genre)
    {
        $this->id = $id;
        $this->title = $title;
        $this->style = $style;
        $this->country = $country;
        $this->format = $format;
        $this->uri = $uri;
        $this->label = $label;
        $this->year = $year;
        $this->type = $type;
        $this->thumb = $thumb;
        $this->genre = $genre;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getStyle(): array
    {
        return $this->style;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function getFormat(): array
    {
        return $this->format;
    }

    public function getUri(): string
    {
        return $this->uri;
    }

    public function getLabel(): array
    {
        return $this->label;
    }

    public function getYear(): int
    {
        return $this->year;
    }
    public function getType(): string
    {
        return $this->type;
    }

    public function getThumb(): string
    {
        return $this->thumb;
    }

    public function getGenre(): array
    {
        return $this->genre;
    }

    public function getStyleAsString(): string
    {
        return implode(', ', $this->style);
    }

    public function getFormatAsString(): string
    {
        return implode(', ', $this->format);
    }

    public function getLabelAsString(): string
    {
        return implode(', ', $this->label);
    }

    public function getGenreAsString(): string
    {
        return implode(', ', $this->genre);
    }
}