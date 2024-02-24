<?php

use App\Utils;

use App\Entity\DiscogsArtist;
use App\Entity\DiscogsMaster;


// Load same object Into Classes

function loadDiscogsMaster(array $data): DiscogsMaster
{
    return (
        new DiscogsMaster(
            $data['id'],
            $data['title'] ?? '',
            $data['uri'] ?? '',
            $data['year'] ?? 0,
            $data['styles'] ?? [],
            $data['genres'] ?? [],
            array_map('loadDiscogsArtist', $data['artists']),
            array_map('transformDiscogsTrack', $data['tracklist']),
            array_map('transformDiscogsVideo', $data['videos'] ?? [])
        )
    );
}

function loadDiscogsArtist(array $data): DiscogsArtist
{
    return (
        new DiscogsArtist(
            $data['id'],
            $data['name'] ?? '',
            $data['nameVariations'] ?? '',
            $data['description'] ?? '',
            $data['realName'] ?? '',
            $data['profile'] ?? '',
            $data['releasesUrl'] ?? '',
            $data['resource_url'] ?? '',
            $data['uri'] ?? '',
            $data['thumbnail_url'] ?? '',
        )
    );
}