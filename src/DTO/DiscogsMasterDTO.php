<?php

// src/DTO/DiscogsMasterDTO.php

namespace App\DTO;

class DiscogsMasterDTO
{
    public int $id;
    public string $title;
    public int $year;
    public array $artists;
    public array $genres;
    public array $styles;
    public array $videos;
    public int $mainRelease;
    public array $images;
    public array $tracklist;

    public function __construct(
        int $id,
        string $title,
        int $year,
        array $artists,
        array $genres,
        array $styles,
        array $videos,
        int $mainRelease,
        array $images,
        array $tracklist
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->year = $year;
        $this->artists = $artists;
        $this->genres = $genres;
        $this->styles = $styles;
        $this->videos = $videos;
        $this->mainRelease = $mainRelease;
        $this->images = $images;
        $this->tracklist = $tracklist;
    }
}
