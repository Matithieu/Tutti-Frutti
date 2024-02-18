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
        return $response->toArray();
    }

    public function getArtistReleases($id): array
    {
        $url = 'artists/' . $id . '/releases?token=' . $this->token;
        $response = $this->client->request('GET', $url);
        return $response->toArray();
    }

    public function getMaster($id)
    {
        $url = 'masters/' . $id . '?token=' . $this->token;
        $response = $this->client->request('GET', $url);
        return $response->toArray();
    }

    public function getRelease($id)
    {
        $url = 'releases/' . $id . '?token=' . $this->token;
        $response = $this->client->request('GET', $url);
        return $response->toArray();
    }

    public function getLabel($id)
    {
        $url = 'labels/' . $id . '?token=' . $this->token;
        $response = $this->client->request('GET', $url);
        return $response->toArray();
    }

    public function search(string $query, int $page = 1, int $limit = 10): array
    {
        $url = 'database/search?q=' . $query . '&type=all' . '&token=' . $this->token . '&per_page=' . $limit . '&page=' . $page;
        $response = $this->client->request('GET', $url);
        return $response->toArray();
    }
}