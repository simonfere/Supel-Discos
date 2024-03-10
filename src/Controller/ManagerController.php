<?php

namespace App\Controller;

use App\Entity\Formato;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted("ROLE_MANAGER")]
class ManagerController extends AbstractController
{
    #[Route('/manager', name: 'app_manager')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $formatos = $entityManager->getRepository(Formato::class)->findAll();
        return $this->render('manager/index.html.twig', [
            'formatos' => $formatos,
        ]);
    }
}
