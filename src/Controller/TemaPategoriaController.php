<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route("/prueba")]
class TemaPategoriaController extends AbstractController
{
    #[Route('/', name: 'app_tema_pategoria')]
    public function index(): Response
    {
        return $this->render('tema_pategoria/index.html.twig', [
            'controller_name' => 'TemaPategoriaController',
        ]);
    }

    #[Route('/huecos', name: 'app_tema_pategoria/huecos')]
    public function huecos()
    {
        return $this->render('tema_pategoria/huecos.html.twig', []);
    }

    #[Route('/adivinar', name: 'app_tema_pategoria/adivinar')]
    public function adivina()
    {

    }

    #[Route('/test', name: 'app_tema_pategoria/test')]
    public function test()
    {

    }

    #[Route('/emparejar', name: 'app_tema_pategoria/emparejar')]
    public function emparejar()
    {

    }

    #[Route('/finales', name: 'app_tema_pategoria/finales')]
    public function finales()
    {

    }
}
