<?php

namespace App\Controller;

use App\Entity\Race;
use App\Form\RaceType;
use App\Repository\RaceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/race')]
class RaceController extends AbstractController
{

    #[Route('/{id}/edit', name: 'edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Race $race, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(RaceType::class, $race);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_race_controller2_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('race/edit.html.twig', [
            'race' => $race,
            'form' => $form,
        ]);
    }

    /*#[Route('/{id}', name: 'delete', methods: ['POST'])]
    public function delete(Request $request, Race $race, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$race->getId(), $request->request->get('_token'))) {
            $entityManager->remove($race);
            $entityManager->flush();
        }

        return $this->redirectToRoute('edit', [], Response::HTTP_SEE_OTHER);
    }*/

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
