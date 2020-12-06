<?php

namespace App\Controller;

use App\Entity\Clothe;
use App\Form\PictureType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
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
            CollectionField::new('pictures')
                ->hideOnIndex()
                ->setFormTypeOptions([
                    'entry_type' => PictureType::class,
                ]),
        ];
    }

    public function createEntity(string $entityFqcn)
    {
        $clothe = new Clothe();
        $clothe->setOwner($this->getUser());

        if ($this->getUser() === null) {
            throw new \Exception('Aucun utilisateur n\'est connecté');
        }

        return $clothe;
    }
}
