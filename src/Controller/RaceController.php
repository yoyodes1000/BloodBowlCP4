<?php

namespace App\Controller;

use App\Repository\RaceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/race')]
class RaceController extends AbstractController
{
    #[Route('/', name: 'race')]
    public function index(RaceRepository $raceRepository): Response
    {
        $races = $raceRepository->findAll();
        return $this->render('race/index.html.twig', [
            'races' => $races,
        ]);
    }

    #[Route('/create', name: 'creation')]
    public function create(RaceRepository $raceRepository): Response
    {
        $races = $raceRepository->findAll();
        return $this->render('race/create.html.twig', [
            'races' => $races,
        ]);
    }
}