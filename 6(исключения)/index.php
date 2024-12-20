<?php

require 'vendor/autoload.php';

use App\Book;
use App\Library;
use App\BookAlreadyExistsException;
use App\LibraryFullException;

try {
    $library = new Library(3);

    $book1 = new Book("Зов Ктулху", "Говард Лавкрафт");
    $library->addBook($book1);

    $book2 = new Book("Собака Баскервилей", "Конан Дойл");
    $library->addBook($book2);

    //добавление нью книги
    $book3 = new Book("Зов Ктулху", "Другой автор");
    $library->addBook($book3);
} catch (BookAlreadyExistsException $e) {
    error_log($e->getMessage());
    echo $e->getMessage();
} catch (LibraryFullException $e) {
    error_log($e->getMessage());
    echo $e->getMessage();
}

$books = $library->getBooks();
foreach ($books as $book) {
    echo "Название: " . $book->getTitle() . ", Автор: " . $book->getAuthor() . "\n";
}
