<?php

namespace App\Controller;

use App\Entity\Artista;
use App\Entity\Formato;
use App\Entity\Producto;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class FormatoController extends AbstractController
{
    #[Route('/formato/{id}', name: 'prod_por_formato')]
    public function index(int $id, EntityManagerInterface $entityManager): Response
    {

        $formatoRepository = $entityManager->getRepository(Formato::class);

        $formato = $formatoRepository->find($id);

        $formatos = $entityManager->getRepository(Formato::class)->findAll();

        $productosRaw = $entityManager->getRepository(Producto::class)->findOneByFormato_Id($id);

        //print_r($productosRaw);

//        if (!$productos) {
//            $this->createNotFoundException("No hay productos de esta categoría");
//        }

        $arrayProductosFinal = [];

        for ($i = 0; $i < count($productosRaw); $i++) {
            foreach ($productosRaw[$i] as $id => $idUser) {

                $productosEnForeach = $entityManager->getRepository(Producto::class)->find($productosRaw[$i]['id']);

                $arrayProductosFinal[] = $productosEnForeach;
            }
        }

        return $this->render('formato/index.html.twig', [
            'formato' => $formato,
            'formatos' => $formatos,
            'productos' => $arrayProductosFinal

        ]);
    }

    #[Route('/artista/{id}', name: 'prod_por_artista')]
    public function artista(int $id, EntityManagerInterface $entityManager): Response
    {

        $artistaRepository = $entityManager->getRepository(Artista::class);

        $artista = $artistaRepository->find($id);

        $artistas = $entityManager->getRepository(Artista::class)->findAll();

        $productosRaw = $entityManager->getRepository(Producto::class)->findOneByArtista($id);

        //print_r($productosRaw);

//        if (!$productos) {
//            $this->createNotFoundException("No hay productos de esta categoría");
//        }

        $arrayProductosFinal = [];

        for ($i = 0; $i < count($productosRaw); $i++) {
            foreach ($productosRaw[$i] as $id => $idUser) {

                $productosEnForeach = $entityManager->getRepository(Producto::class)->find($productosRaw[$i]['id']);

                $arrayProductosFinal[] = $productosEnForeach;
            }
        }

        $formatoRepository = $entityManager->getRepository(Formato::class);

        $formatos = $formatoRepository->findAll();

        return $this->render('formato/artista.html.twig', [
            'artista' => $artista,
            'formatos' => $formatos,
            'productos' => $arrayProductosFinal

        ]);
    }
}
