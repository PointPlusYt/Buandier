<?php

namespace App\Controller;

use App\Entity\Recommendation;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class RecommendationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Recommendation::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
