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
class ProductoController extends AbstractController
{
    #[Route('/producto/{id}', name: 'app_productos')]
    public function showProductoById(EntityManagerInterface $entityManager, int $id): Response
    {

        $productoRepository = $entityManager->getRepository(Producto::class);
        $producto = $productoRepository->find($id);

        $formatos = $entityManager->getRepository(Formato::class)->findAll();

        if (!$producto) {
            throw $this->createNotFoundException("No se encuentra ningún producto. Siga buscando");
        }
        return $this->render('producto/index.html.twig', [
            'producto' => $producto,
            'formatos' => $formatos
        ]);
    }

    public function showAllProducts(EntityManagerInterface $entityManager) {
        $productos = $entityManager->getRepository(Producto::class)->findAll();


    }
}
