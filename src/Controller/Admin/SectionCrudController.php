<?php

namespace App\Controller\Admin;

use App\Entity\Section;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class SectionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Section::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
//            IdField::new('id'),
            TextField::new('name'),
            SlugField::new('slug')->setTargetFieldName('name'),
            TextEditorField::new('description'),
//            ImageField::new('image_url')
//                ->setBasePath('uploads')
//                ->setUploadDir('public/uploads')
            ImageField::new('image_url')
                ->setBasePath('uploads')
                ->setUploadDir('public/uploads')
                ->setFormTypeOptions([
                    'required' => false
                ])
            ,
        ];
    }

//    public function createNewFormBuilder(EntityDto $entityDto, KeyValueStore $formOptions, AdminContext $context): FormBuilderInterface
//    {
//        $formBuilder = parent::createNewFormBuilder($entityDto, $formOptions, $context);
//        return $this->addPasswordEventListener($formBuilder);
//    }
//
//    public function createEditFormBuilder(EntityDto $entityDto, KeyValueStore $formOptions, AdminContext $context): FormBuilderInterface
//    {
//        $formBuilder = parent::createEditFormBuilder($entityDto, $formOptions, $context);
//        return $this->addPasswordEventListener($formBuilder);
//    }
//
//    private function addPasswordEventListener(FormBuilderInterface $formBuilder): FormBuilderInterface
//    {
//        return $formBuilder->addEventListener(FormEvents::PRE_SUBMIT, $this->optimizeImage());
//    }
//
//    private function optimizeImage() {
//        return function(PreSubmitEvent $event) {
//            $form = $event->getForm();
//            if (!$form->isValid()) {
//                return;
//            }
//            $image = $form->get('image')->getData();
//            if ($image === null) {
//                return;
//            }

//            dd($event->getData()['image']);
//
//            dd($form->get('image')->getData());
//
//            dd($image);

//            $hash = $this->userPasswordHasher->hashPassword($this->getUser(), $image);
//            $form->getData()->setPassword($hash);
//        };
//    }
}
