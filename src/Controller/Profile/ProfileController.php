<?php

declare(strict_types=1);

namespace App\Controller\Profile;

use App\Entity\UserBook;
use App\Service\GoogleBooksApiService;
use App\Service\ProfileService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

/**
 * Class ProfileController
 *
 * @author tresor-ilunga <ilungat82@gmail.com>
 */
#[Route('/profile', name: 'app_profile_', methods: ['GET'])]
class ProfileController extends AbstractController
{
    public function __construct(
        private readonly GoogleBooksApiService $googleBooksApiService,
        private readonly ProfileService $profileService
    )
    {
    }

    /**
     * @return Response
     */
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render(
            view: 'profile/index.html.twig',
            parameters: [
                'controller_name' => 'ProfileController',
            ]
        );
    }

    #[Route('/search', name: 'search')]
    public function  search(): Response
    {
        return $this->render(
            view: 'profile/search.html.twig');
    }

    /**
     * This method is used to search books from Google Books API
     *
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws ClientExceptionInterface
     */
    #[Route('/search/api', name: 'search_api', methods: ['POST'])]
    public function searchApi(Request $request): Response
    {
       $search = $request->request->get('search');

       return $this->render(
           view: 'profile/_api.html.twig',
           parameters: [
               'search' => $this->googleBooksApiService->search($search),
           ]);
    }

    /**
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws ClientExceptionInterface
     */
    #[Route('/search/add/{id}', name: 'search_add', methods: ['GET'])]
    public function searchAdd(string $id): Response
    {
        $userBook = $this->profileService->addBookToProfile($this->getUser(), $id);

        return $this->redirectToRoute('app_profile_my_books', [
            'id' => $userBook->getId(),
        ]);

    }

    #[Route('/my-books/{id}', name: 'my_books')]
    public function showOneBook(UserBook $userBook): Response
    {
        return $this->render(
            view: 'profile/show_one_book.html.twig',
            parameters: [
                'userBook' => $userBook,
            ]);
    }

}
