<?php

namespace App\Controller;

use App\Entity\Usuario;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class RegistroController extends AbstractController
{
    #[Route('/registro', name: 'app_registro')]
    public function registrar(UserPasswordHasherInterface $passwordHasher,
    EntityManagerInterface $entityManager): Response
    {

        //NOTA suponemos que eestos datos vienen de un formulario HTML
        $usuario = new Usuario();
        $usuario->setEmail('test@test.es');
        $usuario->setNombre('test');
        $usuario->setApellidos('test');

        $passwordTexto = '1234';

        $hashedPassword = $passwordHasher->hashPassword(
            $usuario,
            $passwordTexto
        );


        $usuario->setPassword($hashedPassword);
        $entityManager->persist($usuario);
        $entityManager->flush();


        return $this->render('registro/index.html.twig', [
            'controller_name' => 'RegistroController',
        ]);
    }
}
