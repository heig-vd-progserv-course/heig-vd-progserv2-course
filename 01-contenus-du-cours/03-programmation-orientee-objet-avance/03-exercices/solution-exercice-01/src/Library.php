<?php
require_once __DIR__ . '/Book.php';

class Library {
    private string $name;
    private array $books = [];

    public function __construct(string $name) {
        $this->name = $name;
    }

    public function addBook(Book $book): void {
        $this->books[] = $book;
    }

    public function findBookByTitle(string $title): ?Book {
        foreach ($this->books as $book) {
            if ($book->getTitle() === $title) {
                return $book;
            }
        }
        return null;
    }

    public function findBookByAuthor(string $author): array {
        // Plutôt que de faire la recherche avec une boucle, on utilise array_filter
        // Documentation : https://www.php.net/manual/fr/function.array-filter.php
        return array_filter($this->books, fn($book) => $book->getAuthor() === $author);
    }

    public function borrowBook(string $title): bool {
        $book = $this->findBookByTitle($title);
        return $book ? $book->borrow() : false;
    }

    public function returnBook(string $title): bool {
        $book = $this->findBookByTitle($title);
        return $book ? $book->return() : false;
    }

    public function getAvailableBooks(): array {
        return array_filter($this->books, fn($book) => $book->isAvailable());
    }

    public function getBorrowedBooks(): array {
        return array_filter($this->books, fn($book) => !$book->isAvailable());
    }

    public function getLibraryStats(): string {
        $total = count($this->books);
        $available = count($this->getAvailableBooks());
        $borrowed = count($this->getBorrowedBooks());

        return "Library: {$this->name}<br>" .
            "Total books: $total<br>" .
            "Available books: $available<br>" .
            "Borrowed books: $borrowed<br>";
    }
}
