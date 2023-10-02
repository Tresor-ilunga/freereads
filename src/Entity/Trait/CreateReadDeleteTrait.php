<?php

declare(strict_types=1);

namespace App\Entity\Trait;

use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

/**
 * Trait CreateReadDeleteTrait
 *
 * @author tresor-ilunga <ilungat82@gmail.com>
 */
trait CreateReadDeleteTrait
{
    /**
     * This method is used to configure the main CRUD controller for this entity.
     *
     * @param Actions $actions
     * @return Actions
     */
    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->disable(Action::EDIT)
            ->add(Crud::PAGE_INDEX, Action::DETAIL);
    }
}