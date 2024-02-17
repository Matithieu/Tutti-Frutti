<?php

namespace App\Controller;

use App\DTO\DiscogsArtistDTO;
use App\DTO\DiscogsReleaseDTO;
use App\Service\DiscogsService;
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
    public function searchByQuery($query, DiscogsService $discogsService): Response
    {
        $results = $discogsService->search($query);

        $releaseDTOs = array_map(function ($result) {
            return new DiscogsReleaseDTO(
                $result['style'],
                $result['thumb'],
                $result['title'],
                $result['country'],
                $result['format'],
                $result['uri'],
                $result['community'],
                $result['label'],
                $result['catno'],
                $result['year'],
                $result['genre'],
                $result['resource_url'],
                $result['type'],
                $result['id']
            );
        }, $results['results']);


        return $this->render('discogs/search.html.twig', [
            'results' => $releaseDTOs,
        ]);
    }
}
