<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class HomeController
 *
 * @author tresor-ilunga <ilungat82@gmail.com>
 */
class HomeController extends AbstractController
{
    /**
     * @return Response
     */
    #[Route('/', name: 'app_home', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render(
            view: 'home/index.html.twig',
            parameters: [
                'controller_name' => 'HomeController',
            ]
        );
    }
}
