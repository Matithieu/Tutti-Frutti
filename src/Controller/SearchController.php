<?php

namespace App\Controller;

use App\Form\SearchType;
use Discogs\DiscogsClient;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    #[Route(name: "search")]
    public function search(Request $request): Response
    {
        $form = $this->createForm(SearchType::class, null, [
            'action' => $this->generateUrl('search'),
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $searchData = $form->getData();
            $id = $searchData['id'];

            // Render the search result template and pass the ID
            return $this->redirectToRoute('search_result', ['id' => $id]);
        }

        return $this->render('search/index.html.twig', [
            'form' => $form,
        ]);
    }
}
