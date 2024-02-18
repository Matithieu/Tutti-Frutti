<?php

// src/DTO/DiscogsMasterDTO.php

namespace App\DTO;

class DiscogsMasterDTO
{
    public $id;
    public $title;
    public $year;
    public $artists;
    public $genres;
    public $styles;
    public $videos;
    public $mainRelease;
    public $images;
    public $tracklist;

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
