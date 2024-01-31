<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/joueur')]
class JoueurController extends AbstractController
{
    #[Route('/', name: 'app_joueur')]
    public function index(): Response
    {
        return $this->render('joueur/index.html.twig');
    }
}
