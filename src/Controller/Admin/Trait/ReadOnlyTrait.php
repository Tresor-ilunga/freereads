<?php

declare(strict_types=1);

namespace App\Controller\Admin\Trait;

use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

/**
 * Trait ReadOnlyTrait
 *
 * @author tresor-ilunga <ilungat82@gmail.com>
 */
trait ReadOnlyTrait
{
    /**
     * This method is called for all pages (index, detail, edit, new, delete, search)
     *
     * @param Actions $actions
     * @return Actions
     */
    public function configureActions(Actions $actions): Actions
    {
        $actions
            ->disable(Action::NEW, Action::EDIT, Action::DELETE)
            ->add(Crud::PAGE_INDEX, Action::DETAIL);

        return $actions;
    }

}