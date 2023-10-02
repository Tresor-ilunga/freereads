<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Entity\Status;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

/**
 * Class StatusCrudController
 *
 * @author tressor-ilunga <ilungat82@gmail.com>
 */
class StatusCrudController extends AbstractCrudController
{
    use Trait\ReadOnlyTrait;

    /**
     * @return string
     */
    public static function getEntityFqcn(): string
    {
        return Status::class;
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
