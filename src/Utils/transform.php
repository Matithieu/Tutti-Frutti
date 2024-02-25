<?php

use App\Utils;

use App\DTO\DiscogsSearchDTO;
use App\Entity\DiscogsArtist;
use App\Entity\DiscogsTrack;
use App\Entity\DiscogsVideo;
use App\Model\DiscogsLabel;
use App\Entity\DiscogsMaster;
use App\Model\DiscogsRelease;


// Transform Into Classes

function transformDiscogsRelease(array $data): DiscogsRelease
{
    return (
        new DiscogsRelease(
            $data['id'],
            $data['style'] ?? [],
            $data['thumb'] ?? '',
            $data['title'] ?? '',
            $data['uri'] ?? '',
            $data['label'] ?? '',
            $data['year'] ?? null,
            $data['format'] ?? [],
            $data['genre'] ?? [],
            $data['resource_url'] ?? ''
        )
    );
}

function transformDiscogsMaster(array $data): DiscogsMaster
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
            array_map('transformDiscogsVideo', $data['videos'])
        )
    );
}

function transformDiscogsLabel(array $data): DiscogsLabel
{
    return (
        new DiscogsLabel(
            $data['id'],
            $data['name'] ?? '',
            $data['profile'] ?? '',
            $data['contact_info'] ?? '',
            $data['sublabels'] ?? [],
            $data['urls'] ?? [],
            $data['images'] ?? []
        )
    );
}

function transformDiscogsArtist(array $data): DiscogsArtist
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
            $data['resourceUrl'] ?? '',
            $data['uri'] ?? '',
            $data['images'][0]["uri"] ?? ''
        )
    );
}

function transformDiscogsTrack(array $data): DiscogsTrack
{
    return (
        new DiscogsTrack(
            $data['title'] ?? '',
            $data['position'] ?? 0,
            $data['duration'] ?? ''
        )
    );
}

function transformDiscogsVideo(array $data): DiscogsVideo
{    return (
        new DiscogsVideo(
            $data['title'] ?? '',
            $data['description'] ?? 0,
            $data['uri'] ?? ''
        )
    );
}

// Transform Into DTOs

function transformDiscogsSearchDTO(array $data): array
{
    return array_map(function ($result) {
        return new DiscogsSearchDTO(
            $result['id'] ?? 0,
            $result['title'] ?? null,
            $result['style'] ?? [],
            $result['country'] ?? '',
            $result['format'] ?? [],
            $result['uri'] ?? null,
            $result['label'] ?? [],
            $result['year'] ?? 0,
            $result['type'] ?? null,
            $result['thumb'] ?? null,
            $result['genre'] ?? []
        );
    }, $data['results']);
}