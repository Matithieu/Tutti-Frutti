<?php

namespace App\Controller;

use App\DTO\DiscogsReleaseDTO;
use App\DTO\DiscogsMasterDTO;
use App\DTO\DiscogsArtistDTO;
use App\DTO\DiscogsLabelDTO;

use App\DTO\DiscogsSearchDTO;
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

    #[Route('/release/{id}', name: 'release_show')]
    public function searchRelease(int $id, DiscogsService $discogsService): Response
    {
        $releaseData = $discogsService->getRelease($id);

        $releaseDTO = new DiscogsReleaseDTO(
            $releaseData['styles'] ?? [],
            $releaseData['thumb'] ?? null,
            $releaseData['title'] ?? null,
            $releaseData['uri'] ?? null,
            $releaseData['label'] ?? '',
            $releaseData['year'] ?? null,
            $releaseData['format'] ?? [],
            $releaseData['genre'] ?? [],
            $releaseData['resource_url'] ?? null,
            $releaseData['id'] ?? null
        );

        return $this->render('discogs/release.html.twig', [
            'release' => $releaseDTO,
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

    #[Route('/artist/{id}', name: 'artist_show')]
    public function searchArtist(int $id, DiscogsService $discogsService): Response
    {
        $artistData = $discogsService->getArtist($id);

        $artistDTO = new DiscogsArtistDTO(
            $artistData['namevariations'] ?? [],
            $artistData['profile'] ?? null,
            $artistData['releases_url'] ?? null,
            $artistData['resource_url'] ?? null,
            $artistData['uri'] ?? null,
            $artistData['images'] ?? [],
            $artistData['members'] ?? [],
            $artistData['id'] ?? null
        );

        return $this->render('discogs/artist.html.twig', [
            'artist' => $artistDTO,
        ]);
    }

    #[Route('/label/{id}', name: 'label_show')]
    public function searchLabel(int $id, DiscogsService $discogsService): Response
    {
        $labelData = $discogsService->getLabel($id);

        $labelDTO = new DiscogsLabelDTO(
            $labelData['id'] ?? null,
            $labelData['name'] ?? null,
            $labelData['profile'] ?? null,
            $labelData['contact_info'] ?? null,
            $labelData['sublabels'] ?? null,
            $labelData['urls'] ?? [],
            $labelData['images'] ?? []
        );

        return $this->render('discogs/label.html.twig', [
            'label' => $labelDTO,
        ]);
    }

    #[Route('/search/{query}', name: 'search_result')]
    public function searchByQuery(string $query, DiscogsService $discogsService, Request $request): Response
    {
        $page = $request->query->getInt('page', 1);

        $results = $discogsService->search($query, $page, 10);

        $releaseDTOs = array_map(function ($result) {
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
        }, $results['results']);

        $results['results'] = $releaseDTOs;


        return $this->render('discogs/search.html.twig', [
            'results' => $results,
        ]);
    }
}
