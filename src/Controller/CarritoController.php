<?php

namespace App\Controller;

use App\Entity\Artista;
use App\Entity\Formato;
use App\Entity\LineaPedido;
use App\Entity\Pedido;
use App\Entity\Producto;
use App\Entity\Usuario;
use App\Repository\ProductoRepository;
use App\Repository\UsuarioRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class CarritoController extends AbstractController
{
    #[Route('/carrito', name: 'app_carrito')]
    public function index(EntityManagerInterface $entityManager, SessionInterface $session): Response
    {

        $carrito = $session->get('carrito', []);

        $formatos = $entityManager->getRepository(Formato::class)->findAll();

        $productos = $entityManager->getRepository(Producto::class);

//        $carrito = array_values($carrito2);

//        print_r($carrito);

        $finalProductosArray  = [];

        $arrayProductos = [];

        $productosFinales = [];

//        for ($x = 0; $x < count($carrito); $x++) {
//
//            $productoTemp = $productos->findOneById($carrito[$x]['id']);
//
//            $arrayProductos[] = $productoTemp;
//
//        }

//        print_r($arrayProductos);



        for ($x = 0; $x < count($arrayProductos); $x++) {

            $finalProductosArray [] = $arrayProductos[$x][0]['id'];

        }


        for ($x = 0; $x < count($finalProductosArray); $x++) {

            $productosFinales[] = $productos->findOneById($finalProductosArray[$x]);
        }

        print_r($productosFinales);

        return $this->render('carrito/index.html.twig', [
            'carrito' => $carrito,
            'formatos' => $formatos
        ]);
    }
    #[Route('/anadirCarrito/{id}', name: 'add_carrito')]
    public function anadirCarrito (int $id, EntityManagerInterface $entityManager, SessionInterface $session) : Response
    {

        $producto = $entityManager->getRepository(Producto::class)->find($id);

        $carrito = $session->get('carrito', []);

        $carrito[$producto->getId()] = [
            'id' => $producto->getId(),
            'nombre' => $producto->getNombre(),
            'artista' => $producto->getArtista(),
            'precio' => $producto->getPrecio(),
        ];

        $session->set('carrito', $carrito);


        return $this->redirectToRoute('app_carrito');
    }

    #[Route('/borrar_carrito', name: 'borrar_carrito')]
    public function borrar_carrito (SessionInterface $session, EntityManagerInterface $entityManager): Response {

        $carrito = $session->set('carrito', []);
        $formatos = $entityManager->getRepository(Formato::class)->findAll();

        return $this->render('carrito/index.html.twig',[
            'carrito' => $carrito,
            'formatos' => $formatos
        ]);
    }

    #[Route('/fin_compra', name: 'fin_compra')]
    public function fin_compra (ProductoRepository $productoRepository, UsuarioRepository $usuarioRepository, AuthenticationUtils $authenticationUtils, Request $request, EntityManagerInterface $entityManager, SessionInterface $session): Response {

        $user = $this->getUser();

        $usuario = $entityManager->getRepository(Usuario::class)->findUsuarioByEmail($user->getUserIdentifier());

        $finalUser = $entityManager->getRepository(Usuario::class)->find($usuario['id']);

        //$usuarioId = $finalUser->getId();

        $carrito = $session->get('carrito', []);

        $pedido = new Pedido();
        $pedido->setUsuario($finalUser);
        //$pedido->setFecha(date('l dS F Y'));

        foreach($carrito as $productoEnCarrito){

            $producto = $productoRepository->find($productoEnCarrito['id']);

            $lineaPedido = new LineaPedido();
            $lineaPedido->setPedido($pedido);
            $lineaPedido->setProducto($producto);
            $lineaPedido->setCantidad(1);
            $entityManager->persist($lineaPedido);
        }

        $entityManager->persist($pedido);
        $entityManager->flush();

        $carrito = $session->set('carrito', []);





        return new Response('GRACIAS POR COMPRAR EN SUPEL-DISCOS. SU NUMERO DE PEDIDO ES ' . $pedido->getId());
    }
}
