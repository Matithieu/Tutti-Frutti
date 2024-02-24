<?php

namespace App\Entity;

use App\Repository\DiscogsTrackRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DiscogsTrackRepository::class)]
#[ORM\Table(name: "discogs_track")]
class DiscogsTrack
{
    #[ORM\Id]
    #[ORM\Column(type: "integer")]
    #[ORM\GeneratedValue(strategy:"AUTO")]
    private int $id;

    #[ORM\Column(type: "string")]
    private string $title;

    #[ORM\Column(type: "string")]
    private string $position;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private $duration;

    public function __construct(string $title, string $position, string $duration)
    {
        $this->title = $title;
        $this->position = $position;
        $this->duration = $duration;
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

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getPosition(): ?string
    {
        return $this->position;
    }

    public function setPosition(string $position): static
    {
        $this->position = $position;

        return $this;
    }

    public function getDuration(): ?string
    {
        return $this->duration;
    }

    public function setDuration(?string $duration): static
    {
        $this->duration = $duration;

        return $this;
    }
}
