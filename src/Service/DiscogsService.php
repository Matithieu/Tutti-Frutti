<?php

namespace App\Service;

use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class DiscogsService
{
    private HttpClientInterface $client;
    private string $token;

    public function __construct()
    {
        $this->client = HttpClient::createForBaseUri('https://api.discogs.com/');
        $this->token = $_ENV['DISCOGS_API_KEY'];
    }

    public function getArtist($id)
    {
        $url = 'artists/' . $id . '?token=' . $this->token;
        $response = $this->client->request('GET', $url);
        return $response;
    }

    public function getArtistReleases($id): array
    {
        $url = 'artists/' . $id . '/releases?token=' . $this->token;
        $response = $this->client->request('GET', $url);
        return $response->toArray();
    }
}