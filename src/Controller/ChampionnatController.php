<?php

namespace App\Controller;

use App\Entity\Championnat;
use App\Form\ChampionnatType;
use App\Repository\ChampionnatRepository;
use App\Service\ChampionnatService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/championnat')]
class ChampionnatController extends AbstractController
{
    #[Route('/', name: 'championnat')]
    public function index(ChampionnatRepository $championnatRepository): Response
    {
        $championnats = $championnatRepository->findAll();
        return $this->render('championnat/index.html.twig', [
            'championnats' => $championnats,
        ]);
    }

    #[Route('/afficher_championnat/{id}', name: 'afficher_championnat')]
    public function affichageChampionnat(int $id, ChampionnatRepository $championnatRepository): Response
    {
        $championnats = $championnatRepository->findOneBy(['id' => $id]);
        return $this->render('championnat/afficher.html.twig', [
            'championnats' => $championnats,
        ]);
    }

    #[Route('/creer_championnat', name: 'creer_championnat')]
    public function creerChampionnat(Request $request, EntityManagerInterface $entityManager): Response
    {
        $championnats = new Championnat();
        $form = $this->createForm(ChampionnatType::class, $championnats);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($championnats);
            $entityManager->flush();
            return $this->redirectToRoute('championnat');
        }

        return $this->render('championnat/creation.html.twig', [
            'championnats' => $championnats,
            'form' => $form,
        ]);
    }

    #[Route('/afficher_journee/{id}', name: 'journee')]
    public function affichageJournée(int $id, ChampionnatRepository $championnatRepository, ChampionnatService $championnatService): Response
    {
        $championnat = $championnatRepository->find($id);

        if (!$championnat) {
            throw $this->createNotFoundException('Championnat non trouvé');
        }

        $equipes = $championnat->getEquipes();

        $calendrier = $championnatService->creerChampionnat((array)$equipes);

        $championnatService->afficherChampionnat($calendrier);

        return $this->render('championnat/journée.html.twig', [
            'championnat' => $championnat,
            'calendrier' => $calendrier,
        ]);
    }
}
