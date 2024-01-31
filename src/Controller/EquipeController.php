<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/equipe')]
class EquipeController extends AbstractController
{
    #[Route('/{id}', name: 'app_equipe')]
    public function index(): Response
    {
        return $this->render('equipe/index.html.twig');
    }

    /*#[Route('{id}/race/{id}', name: 'app_creation')]
    public function new(): Response
    {
        return $this->render('equipe/creation.html.twig)
    }*/
}