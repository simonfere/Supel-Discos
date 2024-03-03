<?php

namespace App\Controller\Admin;

use App\Entity\Artista;
use App\Entity\Direccion;
use App\Entity\Formato;
use App\Entity\Producto;
use App\Entity\Usuario;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('Admin/admin.html.twig');

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Supel Discos');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::section('Artista');
        yield MenuItem::linkToCrud('Artista', 'fas fa-list', Artista::Class);
        yield MenuItem::section('Formato');
        yield MenuItem::linkToCrud('Formato', 'fas fa-list', Formato::Class);
        yield MenuItem::section('Producto');
        yield MenuItem::linkToCrud('Producto', 'fas fa-list', Producto::Class);
        yield MenuItem::section('Usuario');
        yield MenuItem::linkToCrud('Usuario', 'fas fa-list', Usuario::Class);
        yield MenuItem::section('Dirección');
        yield MenuItem::linkToCrud('Dirección', 'fas fa-list', Direccion::Class);
    }
}
