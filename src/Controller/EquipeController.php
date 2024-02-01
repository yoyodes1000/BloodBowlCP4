<?php

namespace App\Controller;

use App\Entity\Equipe;
use App\Form\EquipeFormType;
use App\Service\ChampionnatService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/equipe')]
class EquipeController extends AbstractController
{
    #[Route('/', name: 'equipe')]
    public function index(Request $request): Response
    {
        return $this->render('equipe/index.html.twig');
    }

    #[Route('/championnat', name: 'creation_championnat')]
    public function creationChampionnat(ChampionnatService $championnatService): Response
    {
        $equipes = $championnatService->getEquipes();

        $equipes = [];
        foreach ($equipes as $equipe) {
            $equipesAvecCoachs[] = [
                'equipe' => $equipe,
                'coach' => $equipe->getCoach(), // Supposons que chaque équipe a une méthode getCoach()
            ];
        }

        return $this->render('equipe/creation.html.twig', [
            'equipes' => $equipes,
        ]);
    }
}