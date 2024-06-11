<?php

namespace App\Controller;

use App\Entity\Formato;
use App\Entity\Producto;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted("ROLE_USER")]
class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(EntityManagerInterface $entityManager): Response
    {

        $productoRepository = $entityManager->getRepository(Producto::class);
        $productosTemp = $productoRepository->findAll();

        $productos = array_slice($productosTemp, 0, 8);


        $formatos = $entityManager->getRepository(Formato::class)->findAll();

        return $this->render('home/index.html.twig', [
            /*'controller_name' => 'HomeController',*/
            'productos' => $productos,
            'formatos' => $formatos
        ]);
    }
}
