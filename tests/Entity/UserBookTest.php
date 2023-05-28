<?php

declare(strict_types=1);

namespace App\Tests\Entity;

use App\Entity\Book;
use App\Entity\Status;
use App\Entity\User;
use App\Entity\UserBook;
use DateTimeImmutable;
use PHPUnit\Framework\TestCase;

/**
 * Class UserBookTest
 *
 * @author tresor-ilunga <ilungat82@gmail.com>
 */
class UserBookTest extends TestCase
{

    public function testGettersAndSetters(): void
    {
        $userBook = new UserBook();

        $createdAt = new DateTimeImmutable();
        $userBook->setCreatedAt($createdAt);
        $this->assertSame($createdAt, $userBook->getCreatedAt());

        $updatedAt = new DateTimeImmutable();
        $userBook->setUpdatedAt($updatedAt);
        $this->assertSame($updatedAt, $userBook->getUpdatedAt());

        $comment = 'This is a comment';
        $userBook->setComment($comment);
        $this->assertSame($comment, $userBook->getComment());

        $rating = 4;
        $userBook->setRating($rating);
        $this->assertSame($rating, $userBook->getRating());

        $reader = new User();
        $userBook->setReader($reader);
        $this->assertSame($reader, $userBook->getReader());

        $book = new Book();
        $userBook->setBook($book);
        $this->assertSame($book, $userBook->getBook());

        $status = new Status();
        $userBook->setStatus($status);
        $this->assertSame($status, $userBook->getStatus());

        $this->assertNull($userBook->getId());
    }

}