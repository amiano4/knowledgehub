<?php

namespace App\Controller\Admin;

use App\EasyAdmin\DateTimeAgoField;
use App\Entity\Note;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class NoteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Note::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
                ->hideOnForm(),

            TextField::new('title'),

            // content field
            // TextField::new('content')
            //     ->onlyOnIndex()
            //     ->setMaxLength(80)
            //     ->setLabel('Preview')
            //     ->formatValue(function ($value, $entity) {
            //         // Strip HTML tags from the TextEditorField content
            //         $text = strip_tags($value ?? '');

            //         // Trim extra whitespace and truncate to 80 characters
            //         $text = trim(preg_replace('/\s+/', ' ', $text));

            //         return mb_strimwidth($text, 0, 80, '...');
            //     }),
            TextareaField::new('content'),
            // ->hideOnIndex(),

            AssociationField::new('category')
                ->autocomplete(),

            AssociationField::new('tags')
                ->autocomplete(),

            DateTimeAgoField::new('createdAt')
                ->onlyOnIndex(),
        ];
    }

    public function configureActions(Actions $actions): Actions
    {
        return parent::configureActions($actions)
            ->add(Crud::PAGE_INDEX, Action::DETAIL);
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPaginatorPageSize(10)
            ->setPaginatorRangeSize(4)
            ->setDefaultSort(['createdAt' => 'DESC']);
    }
}
