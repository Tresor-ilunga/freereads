<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Entity\Author;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

/**
 * Class AuthorCrudController
 *
 * @author tressor-ilunga <ilungat82@gmail.com>
 */
class AuthorCrudController extends AbstractCrudController
{
    use Trait\ReadOnlyTrait;

    /**
     * @return string
     */
    public static function getEntityFqcn(): string
    {
        return Author::class;
    }


    /**
     * This method is used to configure the CRUD operations of the entity managed by this controller.
     *
     * @param string $pageName
     * @return iterable
     */
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
