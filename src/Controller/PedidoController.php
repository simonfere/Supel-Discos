<?php

namespace App\Controller;

use App\Entity\Formato;
use App\Entity\LineaPedido;
use App\Entity\Pedido;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PedidoController extends AbstractController
{
    #[Route('/pedido/{id}', name: 'app_pedido')]
    public function index(EntityManagerInterface $entityManager, int $id): Response
    {

        $pedidoRepo = $entityManager->getRepository(Pedido::class);
        $lineaPedidoRepo = $entityManager->getRepository(LineaPedido::class);

        $pedido = $pedidoRepo->find($id);
        $lineasPedido = $lineaPedidoRepo->findAllByPedido_Id($id);

        $arrayLineasPedidoFinal = [];

        for ($i = 0; $i < count($lineasPedido); $i++) {
            foreach ($lineasPedido[$i] as $id => $linea) {

                $lineasEnForeach = $entityManager->getRepository(LineaPedido::class)->find($lineasPedido[$i]['id']);

                $arrayLineasPedidoFinal = $lineasEnForeach;
            }
        }

        print_r($arrayLineasPedidoFinal);

        $formatos = $entityManager->getRepository(Formato::class)->findAll();

        return $this->render('pedido/index.html.twig', [
            'pedido' => $pedido,
            'lineasPedido' => $arrayLineasPedidoFinal,
            'formatos' => $formatos
        ]);
    }

    public function showAllPedidos () : Response
    {
        return $this->render('pedido/all.html.twig', []);
    }
}
