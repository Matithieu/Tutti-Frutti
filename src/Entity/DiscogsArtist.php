<?php

namespace App\Entity;

use App\Repository\DiscogsArtistRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DiscogsArtistRepository::class)]
class DiscogsArtist
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::SIMPLE_ARRAY, nullable: true)]
    private ?array $nameVariations = null;

    #[ORM\Column(length: 1000, nullable: true)]
    private ?string $profile = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $releasesUrl = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $resourceUrl = null;

    #[ORM\Column(length: 1000, nullable: true)]
    private ?string $uri = null;

    #[ORM\Column(type: Types::SIMPLE_ARRAY, nullable: true)]
    private ?array $images = null;

    #[ORM\Column(type: Types::SIMPLE_ARRAY, nullable: true)]
    private ?array $members = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameVariations(): ?array
    {
        return $this->nameVariations;
    }

    public function setNameVariations(?array $nameVariations): static
    {
        $this->nameVariations = $nameVariations;

        return $this;
    }

    public function getProfile(): ?string
    {
        return $this->profile;
    }

    public function setProfile(?string $profile): static
    {
        $this->profile = $profile;

        return $this;
    }

    public function getReleasesUrl(): ?string
    {
        return $this->releasesUrl;
    }

    public function setReleasesUrl(?string $releasesUrl): static
    {
        $this->releasesUrl = $releasesUrl;

        return $this;
    }

    public function getResourceUrl(): ?string
    {
        return $this->resourceUrl;
    }

    public function setResourceUrl(?string $resourceUrl): static
    {
        $this->resourceUrl = $resourceUrl;

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

    public function getImages(): ?array
    {
        return $this->images;
    }

    public function setImages(?array $images): static
    {
        $this->images = $images;

        return $this;
    }

    public function getMembers(): ?array
    {
        return $this->members;
    }

    public function setMembers(?array $members): static
    {
        $this->members = $members;

        return $this;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }
}
