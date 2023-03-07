<?php

namespace App\Field;

use EasyCorp\Bundle\EasyAdminBundle\Contracts\Field\FieldInterface;
use EasyCorp\Bundle\EasyAdminBundle\Field\FieldTrait;
use FOS\CKEditorBundle\Form\Type\CKEditorType;

final class CKEditorField implements FieldInterface {
    use FieldTrait;

    public static function new(string $propertyName, ?string $label = null)
    {
        return(new self())
            ->setProperty($propertyName)
            ->setLabel($label)

            ->addFormTheme('@FOSCKEditor/Form/ckeditor_widget.html.twig')

            ->setFormType(CKEditorType::class)
            ->addCssClass('field-map')

            ->addCssFiles('js/admin/field-map.css')
            ->addJsFiles('js/admin/field-map.js')
        ;
    }
}