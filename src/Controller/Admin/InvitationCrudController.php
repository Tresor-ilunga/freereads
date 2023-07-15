<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Entity\Invitation;
use App\Entity\Trait\CreateReadDeleteTrait;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

/**
 * Class InvitationCrudController
 *
 * @author tresor-ilunga <ilungat82@gmail.com>
 */
class InvitationCrudController extends AbstractCrudController
{
    use CreateReadDeleteTrait;

    public static function getEntityFqcn(): string
    {
        return Invitation::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('email'),
            TextField::new('uuid')
                ->hideWhenCreating(),
            AssociationField::new('reader')
                ->hideWhenCreating(),
        ];
    }

}
