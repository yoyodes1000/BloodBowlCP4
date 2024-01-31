<?php

namespace App\Controller;

use App\Entity\Race;
use App\Repository\JoueurRepository;
use App\Repository\RaceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/race')]
class RaceController extends AbstractController
{
    #[Route('/', name: 'race')]
    public function index(): Response
    {
        return $this->render('race/index.html.twig');
    }

    #[Route('/creation', name: 'creation')]
    public function new(RaceRepository $raceRepository, JoueurRepository $joueurRepository): Response
    {
        $race = $raceRepository->findAll();
        $joueurs = $joueurRepository->findAll();
        return $this->render('race/creation.html.twig', [
            'races' => $race,
            'joueurs' => $joueurs,
        ]);
    }
}
