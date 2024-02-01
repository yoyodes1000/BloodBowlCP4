<?php

namespace App\Controller;

use App\Repository\EquipeRepository;
use App\Repository\RaceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/equipe')]
class EquipeController extends AbstractController
{
    #[Route('/', name: 'equipes')]
    public function index(): Response
    {
        return $this->render('equipe/index.html.twig');
    }
}