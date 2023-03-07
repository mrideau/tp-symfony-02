<?php

namespace App\Controller\Admin;

use App\Entity\Licensee;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class LicenseeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Licensee::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('user'),
            AssociationField::new('club')
        ];
    }
}
