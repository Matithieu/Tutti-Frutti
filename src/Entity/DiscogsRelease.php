<?php

namespace App\Entity;

use App\Repository\DiscogsReleaseRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DiscogsReleaseRepository::class)]
class DiscogsRelease
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::SIMPLE_ARRAY, nullable: true)]
    private ?array $style = null;

    #[ORM\Column(length: 1000, nullable: true)]
    private ?string $thumb = null;

    #[ORM\Column(length: 1000, nullable: true)]
    private ?string $title = null;

    #[ORM\Column(length: 1000, nullable: true)]
    private ?string $uri = null;

    #[ORM\Column(length: 1000, nullable: true)]
    private ?string $label = null;

    #[ORM\Column(nullable: true)]
    private ?int $year = null;

    #[ORM\Column(type: Types::SIMPLE_ARRAY, nullable: true)]
    private ?array $format = null;

    #[ORM\Column(type: Types::SIMPLE_ARRAY, nullable: true)]
    private ?array $genre = null;

    #[ORM\Column(length: 1000, nullable: true)]
    private ?string $ressourceUrl = null;

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
