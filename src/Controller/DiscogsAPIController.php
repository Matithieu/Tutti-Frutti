<?php

namespace App\Controller;

use App\DTO\DiscogsArtistDTO;
use App\DTO\DiscogsMasterDTO;
use App\DTO\DiscogsReleaseDTO;
use App\Service\DiscogsService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DiscogsAPIController extends AbstractController
{
    #[Route(path: '/{type}?{id}', name: 'type_of_media', requirements: ['type' => 'master|artist|release|label'])]
    public function typeOfMedia(string $type, $id): Response
    {
        switch ($type) {
            case 'release':
                return $this->redirectToRoute('release_show', ['id' => $id]);
            case 'master':
                return $this->redirectToRoute('master_show', ['id' => $id]);
            case 'artist':
                return $this->redirectToRoute('artist_show', ['id' => $id]);
            case 'label':
                return $this->redirectToRoute('label_show', ['id' => $id]);
        }
        return $this->redirectToRoute('landing'); // This should never happen, put a 404 page here
    }


    #[Route('/artist/{id}', name: 'artist_show')]
    public function searchArtist(int $id, DiscogsService $discogsService): Response
    {
        $artistData = $discogsService->getArtist($id);

        $artistDTO = new DiscogsArtistDTO(
            $artistData['namevariations'] ?? null,
            $artistData['profile'] ?? null,
            $artistData['releases_url'] ?? null,
            $artistData['resource_url'] ?? null,
            $artistData['images'] ?? null,
            $artistData['members'] ?? null
        );

        return $this->render('discogs/artist.html.twig', [
            'artist' => $artistDTO,
        ]);
    }

    #[Route('/master/{id}', name: 'master_show')]
    public function searchMaster(int $id, DiscogsService $discogsService): Response
    {
        $masterData = $discogsService->getMaster($id);

        $masterDTO = new DiscogsMasterDTO(
            $masterData['id'] ?? null,
            $masterData['title'] ?? null,
            $masterData['year'] ?? null,
            $masterData['artists'] ?? null,
            $masterData['genres'] ?? null,
            $masterData['styles'] ?? null,
            $masterData['videos'] ?? null,
            $masterData['main_release'] ?? null,
            $masterData['images'] ?? null,
            $masterData['tracklist'] ?? null
        );

        return $this->render('discogs/master.html.twig', [
            'master' => $masterDTO,
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
