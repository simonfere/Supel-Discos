<?php

namespace App\Controller;

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
        $productos = $productoRepository->findAll();

        return $this->render('home/index.html.twig', [
            /*'controller_name' => 'HomeController',*/
            'producto' => $productos
        ]);
    }
}
