<?php

namespace App\Controller;

use App\Entity\DiscogsMaster;
use App\Entity\User;
use App\Service\DiscogsService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DiscogsController extends AbstractController
{
    #[Route("/add-discogs-master/{discogsMasterId}", name: "add_discogs_master")]
    public function addDiscogsMaster(int $discogsMasterId, DiscogsService $discogsService, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();

        if (!$user instanceof User) {
            return $this->redirectToRoute('app_login');
        }

        $discogsMasterRessource = $discogsService->getMaster($discogsMasterId);

        $discogsMaster = loadDiscogsMaster($discogsMasterRessource);

        // ManyToMany relationship, check if the master is already in the user's collection
        if (!$user->getDiscogsMasters()->exists(fn(int $key, DiscogsMaster $master) => $master->getId() === $discogsMaster->getId())) {

            $userRepository = $entityManager->getRepository(User::class);
            $discogsMasterRepository = $entityManager->getRepository(DiscogsMaster::class);

            $discogsMasterInDb = $discogsMasterRepository->find($discogsMaster->getId());

            // If the master is not in the database, add it
            if (!$discogsMasterInDb) {
                $discogsMasterRepository->createDiscogsMaster($discogsMaster);
            } else {
                $discogsMaster = $discogsMasterRepository->find($discogsMaster->getId());
            }

            $user->addDiscogsMaster($discogsMaster);
            $userRepository->updateUser($user);

            return $this->redirectToRoute('master_show', ['id' => $discogsMaster->getId()]);
        }

        return new Response('Le master Discogs est déjà dans votre collection.');
    }

    #[Route("/remove-discogs-master/{discogsMasterId}", name: "remove_discogs_master")]
    public function removeDiscogsMaster(int $discogsMasterId, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();

        if (!$user instanceof User) {
            return $this->redirectToRoute('app_login');
        }

        $userRepository = $entityManager->getRepository(User::class);

        $discogsMaster = $user->getDiscogsMasters()->filter(fn(DiscogsMaster $master) => $master->getId() === $discogsMasterId)->first();

        if ($discogsMaster) {
            $user->removeDiscogsMaster($discogsMaster);
            $userRepository->updateUser($user);

            return $this->redirectToRoute('master_show', ['id' => $discogsMasterId]);
        }

        return new Response('Le master Discogs n\'est pas dans votre collection.');
    }
}
