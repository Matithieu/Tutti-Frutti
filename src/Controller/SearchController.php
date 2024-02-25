<?php

namespace App\Controller;

use App\Form\SearchType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    #[Route('/search-bar', name: 'search')]
    public function search(Request $request): Response
    {
        $form = $this->createForm(SearchType::class, null, [
            'action' => $this->generateUrl('search'),
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $searchData = $form->getData();
            $query = $searchData['query'];

            $fruits = ['apple', 'banana', 'orange', 'grape'];

            if (!in_array(strtolower($query), $fruits)) {
                $this->addFlash('error', 'Please enter a valid fruit.');

                // Redirect to the route where the user is coming from
                return $this->redirect($request->headers->get('referer'));
            }

            // Render the search result template and pass the ID
            return $this->redirectToRoute('search_result', ['query' => $query]);
        }

        return $this->render('search/index.html.twig', [
            'form' => $form,
        ]);
    }
}
