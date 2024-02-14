<?php

namespace App\Controller;

use App\Entity\Pategoria;
use App\Form\PategoriaType;
use App\Repository\PategoriaRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/pategoria')]
class PategoriaController extends AbstractController
{
    #[Route('/', name: 'app_pategoria_index', methods: ['GET'])]
    public function index(PategoriaRepository $pategoriaRepository): Response
    {
        return $this->render('pategoria/index.html.twig', [
            'pategorias' => $pategoriaRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_pategoria_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $pategorium = new Pategoria();
        $form = $this->createForm(PategoriaType::class, $pategorium);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($pategorium);
            $entityManager->flush();

            return $this->redirectToRoute('app_pategoria_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('pategoria/new.html.twig', [
            'pategorium' => $pategorium,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_pategoria_show', methods: ['GET'])]
    public function show(Pategoria $pategorium): Response
    {
        return $this->render('pategoria/show.html.twig', [
            'pategorium' => $pategorium,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_pategoria_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Pategoria $pategorium, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PategoriaType::class, $pategorium);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_pategoria_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('pategoria/edit.html.twig', [
            'pategorium' => $pategorium,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_pategoria_delete', methods: ['POST'])]
    public function delete(Request $request, Pategoria $pategorium, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$pategorium->getId(), $request->request->get('_token'))) {
            $entityManager->remove($pategorium);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_pategoria_index', [], Response::HTTP_SEE_OTHER);
    }
}
