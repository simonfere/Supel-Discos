<?php

namespace App\Controller\Admin;

use App\Entity\Direccion;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class DireccionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Direccion::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('calle'),
            TextField::new('numero'),
            TextField::new('piso'),
            TextField::new('codigo_postal'),
            TextField::new('ciudad'),
            TextField::new('provincia'),
            TextField::new('pais'),
        ];
    }

}
