<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Entity\Publisher;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

/**
 * Class PublisherCrudController
 *
 * @author tressor-ilunga <ilungat82@gmail.com>
 */
class PublisherCrudController extends AbstractCrudController
{
    use Trait\ReadOnlyTrait;

    public static function getEntityFqcn(): string
    {
        return Publisher::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('name'),
            AssociationField::new('books')
                        ->onlyOnIndex(),
            ArrayField::new('books')
                        ->onlyOnDetail(),
        ];
    }

}
