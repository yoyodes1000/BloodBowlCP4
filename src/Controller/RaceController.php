<?php

namespace App\Controller;

use App\Repository\RaceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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

    #[Route('/liste', name: 'liste')]
    public function liste(RaceRepository $raceRepository): Response
    {
        $races = $raceRepository->findAll();
        return $this->render('race/liste.html.twig', [
            'races' => $races,
        ]);
    }

    #[Route('/create/{id}', name: 'create')]
    public function create(int $id, RaceRepository $raceRepository): Response
    {
        $races = $raceRepository->findOneBy(['id' => $id]);
        return $this->render('race/create.html.twig', [
            'races' => $races,
        ]);
    }
}