<?php

namespace App\Controller;

use App\Entity\Championnat;
use App\Entity\Equipe;
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
    #[Route('/', name: 'championnat', methods: ['GET', 'POST'])]
    public function index(ChampionnatRepository $championnatRepository): Response
    {
        $championnats = $championnatRepository->findAll();
        return $this->render('championnat/index.html.twig', [
            'championnats' => $championnats,
        ]);
    }

    #[Route('/afficher_championnat/{id}', name: 'afficher_championnat', methods: ['GET', 'POST'])]
    public function affichageChampionnat(int $id, ChampionnatRepository $championnatRepository): Response
    {
        $championnats = $championnatRepository->findOneBy(['id' => $id]);
        return $this->render('championnat/afficher.html.twig', [
            'championnats' => $championnats,
        ]);
    }

    #[Route('/creer_championnat', name: 'creer_championnat', methods: ['GET', 'POST'])]
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

    #[Route('/{id}', name: 'delete', methods: ['GET', 'POST'])]
    public function delete(Request $request, Championnat $championnat, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$championnat->getId(), $request->request->get('_token'))) {
            $entityManager->remove($championnat);
            $entityManager->flush();
        }

        return $this->redirectToRoute('championnat', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/afficher_journee/{id}', name: 'journee', methods: ['GET', 'POST'])]
    public function affichageJournée(int $id, ChampionnatRepository $championnatRepository, ChampionnatService $championnatService, EntityManagerInterface $entityManager): Response
    {
        $championnat = $championnatRepository->find($id);
        if (!$championnat) {
            throw $this->createNotFoundException('Championnat non trouvé');
        }

        $equipes = $championnat->getEquipes()->toArray();
        $calendrier = $championnatService->creerChampionnat((array)$equipes);
            // Informer Doctrine des modifications apportées à l'objet championnat
            $entityManager->persist($championnat);

            // Enregistrer les modifications en base de données
            $entityManager->flush();

            // Recréer le calendrier avec l'équipe "Exempte" ajoutée
        $calendrier = $championnatService->creerChampionnat($championnat->getEquipes()->toArray());


        //$championnatService->afficherChampionnat($calendrier);

        return $this->render('championnat/journee.html.twig', [
            'championnat' => $championnat,
            'calendrier' => $calendrier,
        ]);
    }
}
