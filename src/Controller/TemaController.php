<?php

namespace App\Controller;

use App\Entity\Tema;
use App\Form\TemaType;
use App\Repository\TemaRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use MongoDB\Driver\Manager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/tema')]
class TemaController extends AbstractController
{
    #[Route('/', name: 'app_tema_index', methods: ['GET'])]
    public function index(TemaRepository $temaRepository): Response
    {
        return $this->render('tema/index.html.twig', [
            'temas' => $temaRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_tema_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $tema = new Tema();
        $form = $this->createForm(TemaType::class, $tema);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($tema);
            $entityManager->flush();

            return $this->redirectToRoute('app_tema_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('tema/new.html.twig', [
            'tema' => $tema,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_tema_show', methods: ['GET'])]
    public function show(Tema $tema): Response
    {
        return $this->render('tema/show.html.twig', [
            'tema' => $tema,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_tema_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Tema $tema, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(TemaType::class, $tema);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_tema_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('tema/edit.html.twig', [
            'tema' => $tema,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_tema_delete', methods: ['POST'])]
    public function delete(Request $request, Tema $tema, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $tema->getId(), $request->request->get('_token'))) {
            $entityManager->remove($tema);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_tema_index', [], Response::HTTP_SEE_OTHER);
    }

    public function getTemasRepository(ManagerRegistry $managerRegistry)
    {
        $objectManager = $managerRegistry->getManagerForClass(Tema::class);
        return $objectManager->getRepository(Tema::class);
    }

    public function getTemasByMateria(ManagerRegistry $managerRegistry, $materia)
    {
        $temaRepository = $this->getTemasRepository($managerRegistry);
        return $temaRepository->findBy(["materia" => $materia], []);
    }
}
