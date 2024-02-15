<?php

namespace App\Controller;

use App\Service\DiscogsService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DiscogsAPIController extends AbstractController
{
    #[Route('/search/{id}', name: 'search_result')]
    public function searchById($id, DiscogsService $discogsService) : Response
    {
        $artist = $discogsService->getArtist($id);

        $albums = $discogsService->getArtistReleases($id);

        return $this->render('discogs/discogs.html.twig', [
            'artist' => $artist,
            'albums' => $albums,
        ]);
    }
}
