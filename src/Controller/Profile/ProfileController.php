<?php

declare(strict_types=1);

namespace App\Controller\Profile;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ProfileController
 *
 * @author tresor-ilunga <ilungat82@gmail.com>
 */
class ProfileController extends AbstractController
{
    #[Route('/profile', name: 'app_profile', methods: ['GET', 'POST'])]
    public function index(): Response
    {
        return $this->render(
            view: 'profile/profile/index.html.twig',
            parameters: [
                'controller_name' => 'ProfileController',
            ]
        );
    }
}
