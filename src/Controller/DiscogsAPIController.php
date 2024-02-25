<?php

namespace App\Controller;

use App\Entity\DiscogsMaster;
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
        return match ($type) {
            'release' => $this->redirectToRoute('release_show', ['id' => $id]),
            'master' => $this->redirectToRoute('master_show', ['id' => $id]),
            'artist' => $this->redirectToRoute('artist_show', ['id' => $id]),
            'label' => $this->redirectToRoute('label_show', ['id' => $id]),
            default => $this->redirectToRoute('landing'),
        };
        // This should never happen, put a 404 page here
    }

    #[Route('/release/{id}', name: 'release_show')]
    public function searchRelease(int $id, DiscogsService $discogsService): Response
    {
        $releaseData = $discogsService->getRelease($id);

        $releaseDTO = transformDiscogsRelease($releaseData);

        return $this->render('discogs/release.html.twig', [
            'release' => $releaseDTO,
        ]);
    }

    #[Route('/master/{id}', name: 'master_show')]
    public function searchMaster(int $id, DiscogsService $discogsService): Response
    {
        $masterData = $discogsService->getMaster($id);

        $masterDTO = transformDiscogsMaster($masterData);
        $isInFavorites = $this->getUser() ? $this->getUser()->getDiscogsMasters()->exists(fn (int $key, DiscogsMaster $master) => $master->getId() === $masterDTO->getId()) : false;

        return $this->render('discogs/master.html.twig', [
            'master' => $masterDTO,
            'isInFavorites' => $isInFavorites,
        ]);
    }

    #[Route('/artist/{id}', name: 'artist_show')]
    public function searchArtist(int $id, DiscogsService $discogsService): Response
    {
        $artistData = $discogsService->getArtist($id);

        $artist = transformDiscogsArtist($artistData);

        return $this->render('discogs/artist.html.twig', [
            'artist' => $artist,
        ]);
    }

    #[Route('/label/{id}', name: 'label_show')]
    public function searchLabel(int $id, DiscogsService $discogsService): Response
    {
        $labelData = $discogsService->getLabel($id);

        $labelDTO = transformDiscogsLabel($labelData);

        return $this->render('discogs/label.html.twig', [
            'label' => $labelDTO,
        ]);
    }

    #[Route('/search/{query}', name: 'search_result')]
    public function searchByQuery(string $query, DiscogsService $discogsService, Request $request): Response
    {
        $page = $request->query->getInt('page', 1);

        $results = $discogsService->search($query, $page, 10);

        $releaseDTOs = transformDiscogsSearchDTO($results);

        $results['results'] = $releaseDTOs;


        return $this->render('discogs/search.html.twig', [
            'results' => $results,
        ]);
    }
}
