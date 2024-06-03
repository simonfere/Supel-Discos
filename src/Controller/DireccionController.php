<?php

namespace App\Controller;

use App\Entity\Direccion;
use App\Form\DireccionType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DireccionController extends AbstractController
{
    #[Route('/direccion', name: 'app_direccion')]
    public function index(): Response
    {
        $direccion = new Direccion();
        $form = $this->createForm(DireccionType::class, $direccion);

        $form->handleRequest();
        return $this->render('direccion/index.html.twig', [
            'controller_name' => 'DireccionController',
        ]);
    }
}
