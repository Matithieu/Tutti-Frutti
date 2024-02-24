<?php

namespace App\Entity;

use App\Repository\DiscogsArtistRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DiscogsArtistRepository::class)]
#[ORM\Table(name: "discogs_artist")]
class DiscogsArtist
{
    #[ORM\Id]
    #[ORM\Column(type: "integer")]
    private ?int $id;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $name = null;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $nameVariations = null;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $realName = null;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $profile = null;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $releasesUrl = null;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $resourceUrl = null;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $uri = null;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $images = null;

    public function __construct(int $id, string $name, string $nameVariations, string $description, string $realName, string $profile, string $releasesUrl, string $resourceUrl, string $uri, string $images)
    {
        $this->id = $id;
        $this->name = $name;
        $this->nameVariations = $nameVariations;
        $this->description = $description;
        $this->realName = $realName;
        $this->profile = $profile;
        $this->releasesUrl = $releasesUrl;
        $this->resourceUrl = $resourceUrl;
        $this->uri = $uri;
        $this->images = $images;
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getNameVariations(): ?string
    {
        return $this->nameVariations;
    }

    public function setNameVariations(string $nameVariations): static
    {
        $this->nameVariations = $nameVariations;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getRealName(): ?string
    {
        return $this->realName;
    }

    public function setRealName(string $realName): static
    {
        $this->realName = $realName;

        return $this;
    }

    public function getProfile(): ?string
    {
        return $this->profile;
    }

    public function setProfile(string $profile): static
    {
        $this->profile = $profile;

        return $this;
    }

    public function getReleasesUrl(): ?string
    {
        return $this->releasesUrl;
    }

    public function setReleasesUrl(string $releasesUrl): static
    {
        $this->releasesUrl = $releasesUrl;

        return $this;
    }

    public function getResourceUrl(): ?string
    {
        return $this->resourceUrl;
    }

    public function setResourceUrl(string $resourceUrl): static
    {
        $this->resourceUrl = $resourceUrl;

        return $this;
    }

    public function getUri(): ?string
    {
        return $this->uri;
    }

    public function setUri(string $uri): static
    {
        $this->uri = $uri;

        return $this;
    }

    public function getImages(): ?string
    {
        return $this->images;
    }

    public function setImages(string $images): static
    {
        $this->images = $images;

        return $this;
    }
}
