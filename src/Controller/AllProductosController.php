<?php

namespace App\Controller;

use App\Entity\Producto;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AllProductosController extends AbstractController
{
    #[Route('/productos', name: 'mostrar_todos_productos')]
    public function index(EntityManagerInterface $entityManager): Response
    {

        $productos = $entityManager->getRepository(Producto::class)->findAll();
        return $this->render('all_productos/index.html.twig', [
            'productos' => $productos,
        ]);
    }
}
