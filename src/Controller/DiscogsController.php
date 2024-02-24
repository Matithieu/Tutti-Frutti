<?php

namespace App\Controller;

use App\Entity\DiscogsMaster;
use App\Entity\User;
use App\Form\DiscogsMasterFilterType;
use App\Repository\DiscogsMasterRepository;
use App\Repository\UserRepository;
use App\Service\DiscogsService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
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

    #[Route("/favorites", name: "favorites_index")]
    public function index(DiscogsMasterRepository $repository, UserRepository $userRepository ,Request $request): Response
    {
        $form = $this->createForm(DiscogsMasterFilterType::class);
        $form->handleRequest($request);

        $masters = [];

        $masters = $userRepository->find($this->getUser()->getId())->getDiscogsMasters();

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            switch ($data['filterType']) {
                case 'fruit':
                    $masters = $repository->findDiscogsMasterByFruit($data['filterValue']);
                    break;
                case 'year':
                    $masters = $repository->findDiscogsMasterByYear($data['filterValue']);
                    break;
                case 'groupName':
                    $masters = $repository->findDiscogsMasterByName($data['filterValue']);
                    break;
                case 'label':
                    $masters = $repository->findDiscogsMasterByLabel($data['filterValue']);
                    break;
                case 'genre':
                    $masters = $repository->findDiscogsMasterByGenre($data['filterValue']);
                    break;
                case 'format':
                    $masters = $repository->findDiscogsMasterByFormat($data['filterValue']);
                    break;
            }
        }

        return $this->render('favorites/favorites.html.twig', [
            'masters' => $masters,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/favorites/master/{id}', name: 'favorites_master_show')]
    public function searchMaster(int $id, DiscogsMasterRepository $repository): Response
    {
        $master = $repository->find($id);
        $isInFavorites = $this->getUser() ? $this->getUser()->getDiscogsMasters()->exists(fn (int $key, DiscogsMaster $master) => $master->getId() === $id) : false;

        return $this->render('favorites/master.html.twig', [
            'master' => $master,
            'isInFavorites' => $isInFavorites,
        ]);
    }
}
