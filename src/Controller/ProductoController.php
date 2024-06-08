<?php

namespace App\Controller;

use App\Entity\Artista;
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

        $todosProductos = $productoRepository->findAll();

        shuffle($todosProductos);

        $productosRecomendados = array_slice($todosProductos, 0, 4);

        $formatos = $entityManager->getRepository(Formato::class)->findAll();

        $artistaRepository = $entityManager->getRepository(Artista::class);

        $artista = $artistaRepository->findOneById($producto->getArtista()->getId());

        $artistaFinal = $entityManager->getRepository(Artista::class)->find($artista[0]['id']);

//        if (!$producto) {
//            throw $this->createNotFoundException("No se encuentra ningún producto. Siga buscando");
//        }
        return $this->render('producto/index.html.twig', [
            'producto' => $producto,
            'artista' => $artistaFinal,
            'formatos' => $formatos,
            'productos_recomendados' => $productosRecomendados,
        ]);
    }

    public function showAllProducts(EntityManagerInterface $entityManager) {
        $productos = $entityManager->getRepository(Producto::class)->findAll();


    }
}
