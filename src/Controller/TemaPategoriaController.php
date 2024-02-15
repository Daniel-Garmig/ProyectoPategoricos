<?php

namespace App\Controller;

use App\Entity\TemaPategoria;
use App\Form\TemaPategoriaHuecosType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route("/prueba")]
class TemaPategoriaController extends AbstractController
{
    #[Route('/', name: 'app_tema_pategoria')]
    public function index(Request $request): Response
    {
        $texto = $request->query->get("texto");
        $words = $request->query->get("palabras");

        return $this->render('tema_pategoria/index.html.twig', [
            'controller_name' => 'TemaPategoriaController',
            "texto" => $texto,
            "palabras" => $words,
        ]);
    }

    #[Route('/huecos', name: 'app_tema_pategoria/huecos')]
    public function huecos(Request $request, EntityManagerInterface $entityManager)
    {
        $tp = new TemaPategoria();

        $form = $this->createForm(TemaPategoriaHuecosType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $formData = $form->getData();
            $content = $formData["frase"];

            $words = array();
            $cont = 1;
            $pattern = "/\${([^}]*)}/";

            $content_fixed = preg_replace_callback($pattern, function ($matches) use (&$words, &$cont) {
                $words[] = $matches[1];
                $replacement = '${' . $cont . '}';
                $cont++;
                return $replacement;
            }, $content);

//            $entityManager->persist($tp);
//            $entityManager->flush();

            return $this->redirectToRoute('app_tema_pategoria', [
                'controller_name' => 'TemaPategoriaController',
                "texto" => $content_fixed,
                "palabras" => $words,
            ]);
        }

        return $this->render('tema_pategoria/huecos.html.twig', [
            "form" => $form->createView(),
            "texto" => "",
            "palabras" => array()
        ]);
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
