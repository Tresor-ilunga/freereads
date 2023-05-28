<?php

declare(strict_types=1);

namespace App\Tests\Entity;

use App\Entity\Book;
use App\Entity\Publisher;
use PHPUnit\Framework\TestCase;

/**
 * Class PublisherTest
 *
 * @author tresor-ilunga <ilungat82@gmail.com>
 */
class PublisherTest extends TestCase
{
    public function testGetBooksReturnsEmptyCollectionByDefault()
    {
        $publisher = new Publisher();
        $this->assertEmpty($publisher->getBooks());
    }

    public function testAddBookAddsBookToCollection()
    {
        $publisher = new Publisher();
        $book = new Book();
        $publisher->addBook($book);
        $this->assertCount(1, $publisher->getBooks());
        $this->assertSame($book, $publisher->getBooks()->first());
    }

    public function testAddBookDoesNotAddSameBookTwice()
    {
        $publisher = new Publisher();
        $book = new Book();
        $publisher->addBook($book);
        $publisher->addBook($book);
        $this->assertCount(1, $publisher->getBooks());
    }

    public function testRemoveBookRemovesBookFromCollection()
    {
        $publisher = new Publisher();
        $book = new Book();
        $publisher->addBook($book);
        $publisher->removeBook($book);
        $this->assertEmpty($publisher->getBooks());
    }

    public function testRemoveBookDoesNothingIfBookNotInCollection()
    {
        $publisher = new Publisher();
        $book = new Book();
        $publisher->removeBook($book);
        $this->assertEmpty($publisher->getBooks());
    }

}