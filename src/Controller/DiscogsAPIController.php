<?php

namespace App\Controller;

use App\DTO\DiscogsArtistDTO;
use App\DTO\DiscogsReleaseDTO;
use App\Service\DiscogsService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DiscogsAPIController extends AbstractController
{
    #[Route('/artist/{id}', name: 'artist_show')]
    public function show(int $id, DiscogsService $discogsService): Response
    {
        $artistData = $discogsService->getArtist($id);

        $artistDTO = new DiscogsArtistDTO(
            $artistData['namevariations'],
            $artistData['profile'],
            $artistData['releases_url'],
            $artistData['resource_url'],
            $artistData['images'],
            $artistData['members'] ?? null
        );

        return $this->render('discogs/artist.html.twig', [
            'artist' => $artistDTO,
        ]);
    }

    #[Route('/search/{query}', name: 'search_result')]
    public function searchByQuery(string $query, DiscogsService $discogsService, Request $request): Response
    {
        $page = $request->query->getInt('page', 1);

        $results = $discogsService->search($query, $page, 10);

        $releaseDTOs = array_map(function ($result) {
            return new DiscogsReleaseDTO(
                $result['style'] ?? null,
                $result['thumb'] ?? null,
                $result['title'] ?? null,
                $result['format'] ?? null,
                $result['uri'] ?? null,
                $result['label'] ?? null,
                $result['year'] ?? null,
                $result['genre'] ?? null,
                $result['resource_url'] ?? null,
                $result['type'] ?? null,
                $result['id'] ?? null
            );
        }, $results['results']);

        $results['results'] = $releaseDTOs;


        return $this->render('discogs/search.html.twig', [
            'results' => $results,
        ]);
    }
}
