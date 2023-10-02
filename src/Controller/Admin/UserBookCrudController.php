<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Entity\UserBook;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

/**
 * Class UserBookCrudController
 *
 * @author tressor-ilunga <ilungat82@gmail.com>
 */
class UserBookCrudController extends AbstractCrudController
{
    use Trait\ReadOnlyTrait;

    /**
     * This method is used to return the entity class name
     *
     * @return string
     */
    public static function getEntityFqcn(): string
    {
        return UserBook::class;
    }


    /**
     * This method is used to configure the fields of the entity
     *
     * @param string $pageName
     * @return iterable
     */
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('reader'),
            TextField::new('book'),
            TextareaField::new('comment'),
            IntegerField::new('rating')
                ->onlyOnIndex(),
            TextField::new('status')
        ];
    }

}
