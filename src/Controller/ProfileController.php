<?php

namespace App\Controller;

use App\Entity\Formato;
use App\Entity\Pedido;
use App\Entity\Usuario;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ProfileController extends AbstractController
{
    #[Route('/profile', name: 'app_profile')]
    public function index(EntityManagerInterface $entityManager): Response
    {

        $user = $this->getUser();

        $formatos = $entityManager->getRepository(Formato::class)->findAll();

        $usuario = $entityManager->getRepository(Usuario::class)->findUsuarioByEmail($user->getUserIdentifier());

        $finalUser = $entityManager->getRepository(Usuario::class)->find($usuario['id']);

        $pedidos = $entityManager->getRepository(Pedido::class)->findAllByUser($finalUser->getId());
        return $this->render('profile/index.html.twig', [
            'usuario' => $finalUser,
            'formatos' => $formatos,
            'pedidos' => $pedidos
        ]);
    }
}
