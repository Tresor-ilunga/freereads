<?php

declare(strict_types=1);

namespace App\Service;

use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

/**
 * Class GoogleBooksApiService
 *
 * @author tresor-ilunga <ilungat82@gmail.com>
 */
class GoogleBooksApiService
{
    public function __construct(private readonly HttpClientInterface $googlebooksClient)
    {
    }

    /**
     * This method will return an array of books
     *
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws ClientExceptionInterface
     */
    private function makeRequest(string $method, string $url, $options = []): array
    {
        $response = $this->googlebooksClient->request($method, $url, $options);
        return $response->toArray();
    }

    /**
     * This method will return an array of books
     *
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws ClientExceptionInterface
     */
    public function search(string $search): array
    {
        if (strlen($search) < 3) {
            return [];
        }

        return $this->makeRequest('GET', 'volumes', [
            'query' => [
                'q' => $search,
            ]
        ]);
    }
}