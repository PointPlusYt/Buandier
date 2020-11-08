<?php

namespace App\Controller;

use App\Entity\Clothe;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ClotheCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Clothe::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            TextField::new('name'),
            DateTimeField::new('boughtAt'),
            TextField::new('color'),
            TextField::new('type'),
            AssociationField::new('recommendations')->hideOnIndex(),
        ];
    }
}
