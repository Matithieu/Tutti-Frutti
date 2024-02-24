<?php

namespace App\Controller;

use KnpU\OAuth2ClientBundle\Client\ClientRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Config\Doctrine\Dbal\ConnectionConfig\ReplicaConfig;

class FormController extends AbstractController
{
    #[Route(path: '/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('form/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
        ]);
    }


    #[Route("/oauth/login", name: "oauth_login", methods: ["GET"])]
    public function loginOauth(){
        if($this->getUser())
        {
            return $this->redirectToRoute("landing");
        }
        return $this->render('form/login.html.twig');
    }

    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }

    #[Route(path: '/oauth/connect/{client}', name: 'connect', methods: ['GET'])]
    public function connect(string $client, ClientRegistry $registry): RedirectResponse
    {
        if($client != "google"){ // verifie les client oauth supporté
           throw $this->createNotFoundException();
        }
        return $registry->getClient($client)->redirect([]);
    }

    #[Route(path: '/oauth/check/{client}', name: 'check', methods: ['GET',"POST"])]
    public function check():Response {
        return new Response(status: 200);
    }



}
