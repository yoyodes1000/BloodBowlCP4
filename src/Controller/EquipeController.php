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
    #[Route('/', name: 'equipes')]
    public function index(Request $request): Response
    {
        /*$equipe = new Equipe;
        $form = $this->createForm(EquipeFormType::class, $equipe);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

        }*/
        return $this->render('equipe/index.html.twig');
    }

    #[Route('/championnat', name: 'creation_championnat')]
    public function creationChampionnat(ChampionnatService $championnatService): Response
    {
        $equipes = $championnatService->getEquipes();

        // Créer un tableau associatif avec les équipes et les coachs
        $equipes = [];
        foreach ($equipes as $equipe) {
            $equipesAvecCoachs[] = [
                'equipe' => $equipe,
                'coach' => $equipe->getCoach(), // Supposons que chaque équipe a une méthode getCoach()
            ];
        }

        // Envoyer le tableau des équipes avec leurs coachs à la vue
        return $this->render('championnat/creation.html.twig', [
            'equipes' => $equipes,
        ]);
    }
}