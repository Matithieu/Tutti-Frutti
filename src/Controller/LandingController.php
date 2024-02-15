<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class LandingController extends AbstractController
{
    //#[IsGranted('ROLE_USER', message: 'You are not allowed to access this page.')]
    #[Route('/landing', name: "landing")]
    public function number(): Response
    {
       // $this->denyAccessUnlessGranted('ROLE_USER');

        $number = random_int(0, 100);

        return $this->render('landing/landing.html.twig', [
            'number' => $number,
        ]);
    }
}