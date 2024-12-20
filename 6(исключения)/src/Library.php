<?php

namespace App;

class BookAlreadyExistsException extends \Exception
{
    protected $message = 'Книга с таким названием уже существует в библиотеке.';
}

class LibraryFullException extends \Exception
{
    protected $message = 'Библиотека полна, не удается добавить новую книгу.';
}

class Library
{
    private array $books = [];
    private int $maxBooks;

    public function __construct($maxBooks)
    {
        $this->maxBooks = $maxBooks;
    }

    public function addBook(Book $book): void
    {
        foreach ($this->books as $existingBook) {
            if ($existingBook->getTitle() === $book->getTitle()) {
                throw new BookAlreadyExistsException();
            }
        }

        if (count($this->books) >= $this->maxBooks) {
            throw new LibraryFullException();
        }

        $this->books[] = $book;
    }

    public function getBooks(): array
    {
        return $this->books;
    }
}
