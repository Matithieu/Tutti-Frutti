<?php

namespace App\Entity;

use App\Entity\DiscogsArtist;
use App\Repository\DiscogsMasterRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DiscogsMasterRepository::class)]
#[ORM\Table(name: "discogs_master")]
class DiscogsMaster
{
    #[ORM\Id]
    #[ORM\Column(type: "integer")]
    private int $id;

    #[ORM\Column(length: 1000, type: "string")]
    private string $title;

    #[ORM\Column(length: 1000, type: "string")]
    private $uri;

    #[ORM\Column(type: "integer")]
    private int $year;

    #[ORM\ManyToMany(targetEntity: DiscogsArtist::class, inversedBy: "discogs_master", cascade: ["persist", "remove"])]
    #[ORM\JoinTable(name: "discogs_master_discogs_artist")]
    private $artists;

    #[ORM\ManyToMany(targetEntity: DiscogsTrack::class, inversedBy: "discogs_master", cascade: ["persist", "remove"])]
    #[ORM\JoinTable(name: "discogs_master_discogs_track")]
    private $tracks;

    #[ORM\Column(type: "json", nullable: true)]
    private $styles;

    #[ORM\Column(type: "json", nullable: true)]
    private $genres;

    #[ORM\ManyToMany(targetEntity: DiscogsVideo::class, inversedBy: "discogs_master", cascade: ["persist", "remove"])]
    #[ORM\JoinTable(name: "discogs_master_discogs_video")]
    private $videos;

    public function __construct(int $id, string $title, string $uri, int $year, array $styles = [], array $genres = [], array $artists = [], array $tracks = [], array $videos = [])
    {
        $this->id = $id;
        $this->title = $title;
        $this->uri = $uri;
        $this->year = $year;
        $this->styles = $styles;
        $this->genres = $genres;
        $this->artists = new ArrayCollection($artists);
        $this->tracks = new ArrayCollection($tracks);
        $this->videos = new ArrayCollection($videos);
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

    public function getUri(): ?string
    {
        return $this->uri;
    }

    public function setUri(string $uri): static
    {
        $this->uri = $uri;

        return $this;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(int $year): static
    {
        $this->year = $year;

        return $this;
    }

    /**
     * @return Collection|DiscogsArtist[]
     */
    public function getArtists(): Collection
    {
        return $this->artists;
    }

    public function addArtist(DiscogsArtist $artist): static
    {
        if (!$this->artists->contains($artist)) {
            $this->artists->add($artist);
        }

        return $this;
    }

    public function removeArtist(DiscogsArtist $artist): void
    {
        if ($this->artists->contains($artist)) {
            $this->artists->removeElement($artist);
        }
    }

    /**
     * @return Collection|DiscogsTrack[]
     */
    public function getTracks(): Collection
    {
        return $this->tracks;
    }

    public function addTrack(DiscogsTrack $track): static
    {
        if (!$this->tracks->contains($track)) {
            $this->tracks->add($track);
        }

        return $this;
    }

    public function removeTrack(DiscogsTrack $track): static
    {
        if ($this->tracks->contains($track)) {
            $this->tracks->removeElement($track);
        }

        return $this;
    }

    public function getStyles(): ?array
    {
        return $this->styles;
    }

    public function setStyles(?array $styles): static
    {
        $this->styles = $styles;

        return $this;
    }

    public function getGenres(): ?array
    {
        return $this->genres;
    }

    public function setGenres(?array $genres): static
    {
        $this->genres = $genres;

        return $this;
    }

    /**
     * @return Collection|DiscogsVideo[]
     */
    public function getVideos(): Collection
    {
        return $this->videos;
    }

    public function addVideo(DiscogsVideo $video): static
    {
        if (!$this->videos->contains($video)) {
            $this->videos->add($video);
        }

        return $this;
    }

    public function removeVideo(DiscogsVideo $video): static
    {
        if ($this->videos->contains($video)) {
            $this->videos->removeElement($video);
        }

        return $this;
    }
}
