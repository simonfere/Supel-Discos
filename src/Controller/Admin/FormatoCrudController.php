<?php

namespace App\Controller\Admin;

use App\Entity\Formato;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class FormatoCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Formato::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('tipo'),
            TextField::new('cantidad_formato'),
            TextareaField::new('info_adicional')

        ];
    }

}
