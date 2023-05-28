<?php

declare(strict_types=1);

namespace App\Tests\Entity;

use App\Entity\Author;
use App\Entity\Book;
use App\Entity\Publisher;
use App\Entity\UserBook;
use DateTime;
use PHPUnit\Framework\TestCase;

/**
 * Class BookTest
 *
 * @author tresor-ilunga <ilungat82@gmail.com>
 */
class BookTest extends TestCase
{
    public function testGettersAndSetters(): void
    {
        $book = new Book();

        $this->assertNull($book->getId());

        $book->setGoogleBooksId('google_books_id');
        $this->assertSame('google_books_id', $book->getGoogleBooksId());

        $book->setTitle('title');
        $this->assertSame('title', $book->getTitle());

        $book->setSubtitle('subtitle');
        $this->assertSame('subtitle', $book->getSubtitle());

        $publishDate = new DateTime();
        $book->setPublishDate($publishDate);
        $this->assertSame($publishDate, $book->getPublishDate());

        $book->setDescription('description');
        $this->assertSame('description', $book->getDescription());

        $book->setIsbn10('isbn10');
        $this->assertSame('isbn10', $book->getIsbn10());

        $book->setIsbn13('isbn13');
        $this->assertSame('isbn13', $book->getIsbn13());

        $book->setPageCount(100);
        $this->assertSame(100, $book->getPageCount());

        $book->setSmallThumbnail('small_thumbnail');
        $this->assertSame('small_thumbnail', $book->getSmallThumbnail());

        $book->setThumbnail('thumbnail');
        $this->assertSame('thumbnail', $book->getThumbnail());

        $author = new Author();
        $book->addAuthor($author);
        $this->assertSame($author, $book->getAuthors()->first());

        $publisher = new Publisher();
        $book->addPublisher($publisher);
        $this->assertSame($publisher, $book->getPublishers()->first());

        $userBook = new UserBook();
        $book->addUserBook($userBook);
        $this->assertSame($userBook, $book->getUserBooks()->first());
    }

    public function testAddAndRemoveAuthor(): void
    {
        $book = new Book();
        $author1 = new Author();
        $author2 = new Author();

        $book->addAuthor($author1);
        $this->assertTrue($book->getAuthors()->contains($author1));

        $book->addAuthor($author2);
        $this->assertTrue($book->getAuthors()->contains($author2));

        $book->removeAuthor($author1);
        $this->assertFalse($book->getAuthors()->contains($author1));
    }

    public function testAddAndRemovePublisher(): void
    {
        $book = new Book();
        $publisher1 = new Publisher();
        $publisher2 = new Publisher();

        $book->addPublisher($publisher1);
        $this->assertTrue($book->getPublishers()->contains($publisher1));

        $book->addPublisher($publisher2);
        $this->assertTrue($book->getPublishers()->contains($publisher2));

        $book->removePublisher($publisher1);
        $this->assertFalse($book->getPublishers()->contains($publisher1));
    }

    public function testAddAndRemoveUserBook(): void
    {
        $book = new Book();
        $userBook1 = new UserBook();
        $userBook2 = new UserBook();

        $book->addUserBook($userBook1);
        $this->assertTrue($book->getUserBooks()->contains($userBook1));
        $this->assertSame($book, $userBook1->getBook());

        $book->addUserBook($userBook2);
        $this->assertTrue($book->getUserBooks()->contains($userBook2));
        $this->assertSame($book, $userBook2->getBook());

        $book->removeUserBook($userBook1);
        $this->assertFalse($book->getUserBooks()->contains($userBook1));
        $this->assertNull($userBook1->getBook());
    }

}