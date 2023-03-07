<?php

namespace App\Controller\Admin;

use App\Entity\Club;
use App\Entity\Licensee;
use App\Entity\User;
use App\Repository\UserRepository;
use CKEditorField;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\QueryBuilder;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ClubCrudController extends AbstractCrudController
{
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public static function getEntityFqcn(): string
    {
        return Club::class;
    }

    public function configureFields(string $pageName): iterable
    {

        return [
            TextField::new('name'),
            SlugField::new('slug')->setTargetFieldName('name'),
            TextEditorField::new('description'),
//            AssociationField::new('licensees')
//                ->setQueryBuilder(function ($queryBuilder) {
//                    return $this->userRepository->createQueryBuilder('entity')->getQuery();
//
//                })
//            ,
            ImageField::new('imageUrl')
                ->setBasePath('uploads')
                ->setUploadDir('public/uploads')
                ->setFormTypeOptions([
                    'required' => false
                ])
            ,
            AssociationField::new('section'),
        ];
    }
}
