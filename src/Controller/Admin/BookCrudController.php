<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Entity\Book;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

/**
 * Class BookCrudController
 *
 * @author tressor-ilunga <ilungat82@gmail.com>
 */
class BookCrudController extends AbstractCrudController
{
    use Trait\ReadOnlyTrait;

    public static function getEntityFqcn(): string
    {
        return Book::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextField::new('subtitle'),
            TextField::new('description'),
            TextField::new('isbn10'),
            TextField::new('isbn13'),
            ImageField::new('smallThumbnail'),
            ImageField::new('thumbnail'),
            CollectionField::new('authors'),
            CollectionField::new('Publishers'),
            TextField::new('googleBooksId'),
        ];
    }

}
