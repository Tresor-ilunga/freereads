<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Entity\Author;
use App\Entity\Book;
use App\Entity\Invitation;
use App\Entity\Publisher;
use App\Entity\Status;
use App\Entity\User;
use App\Entity\UserBook;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class DashboardController
 *
 * @author tresor-ilunga <ilungat82@gmail.com>
 */
class DashboardController extends AbstractDashboardController
{
    /**
     * This method is called for each page loaded by EasyAdmin.
     *
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return  $this->redirect($adminUrlGenerator->setController(BookCrudController::class)->generateUrl());
    }

    /**
     * @return Dashboard
     */
    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Freereads');
    }

    /**
     * This method is called for each page loaded by EasyAdmin.
     *
     * @return iterable
     */
    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToCrud('Books', 'fas fa-book', Book::class);
        yield MenuItem::linkToCrud('Invitation', 'fas fa-user-pen', Invitation::class);
        yield MenuItem::linkToCrud('Authors', 'fas fa-user-pen', Author::class);
        yield MenuItem::linkToCrud('Publishers', 'fas fa-building', Publisher::class);
        yield MenuItem::linkToCrud('Status', 'fas fa-info-circle', Status::class);
        yield MenuItem::linkToCrud('Users', 'fas fa-user', User::class);
        yield MenuItem::linkToCrud('UserBooks', 'fas fa-book-reader', UserBook::class);
    }
}
