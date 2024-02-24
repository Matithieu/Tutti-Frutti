<?php

namespace App\Model;

class DiscogsArtistRelease
{
    private ?int $id = null;

    private ?array $artist = null;

    private ?int $mainRelease = null;

    private ?string $ressourceUrl = null;

    private ?string $role = null;

    private ?string $thumb = null;

    private ?string $title = null;

    private ?string $type = null;

    private ?int $year = null;

    private ?string $format = null;

    private ?string $label = null;

    private ?string $status = null;

    public function __construct(int $id, array $artist = [], int $mainRelease = 0, string $ressourceUrl = '', string $role = '', string $thumb = '', string $title = '', string $type = '', int $year = 0, string $format = '', string $label = '', string $status = '')
    {
        $this->id = $id;
        $this->artist = $artist;
        $this->mainRelease = $mainRelease;
        $this->ressourceUrl = $ressourceUrl;
        $this->role = $role;
        $this->thumb = $thumb;
        $this->title = $title;
        $this->type = $type;
        $this->year = $year;
        $this->format = $format;
        $this->label = $label;
        $this->status = $status;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArtist(): ?array
    {
        return $this->artist;
    }

    public function setArtist(?array $artist): static
    {
        $this->artist = $artist;

        return $this;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getMainRelease(): ?int
    {
        return $this->mainRelease;
    }

    public function setMainRelease(?int $mainRelease): static
    {
        $this->mainRelease = $mainRelease;

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

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(?string $role): static
    {
        $this->role = $role;

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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): static
    {
        $this->type = $type;

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

    public function getFormat(): ?string
    {
        return $this->format;
    }

    public function setFormat(?string $format): static
    {
        $this->format = $format;

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

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): static
    {
        $this->status = $status;

        return $this;
    }
}
