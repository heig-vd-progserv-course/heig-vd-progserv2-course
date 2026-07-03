<?php

class Book {
    private string $title;
    private string $author;
    private string $isbn;
    private bool $isAvailable;

    public function __construct(string $title, string $author, string $isbn) {
        $this->title = $title;
        $this->author = $author;
        $this->isbn = $isbn;
        $this->isAvailable = true;
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function getAuthor(): string {
        return $this->author;
    }

    public function getIsbn(): string {
        return $this->isbn;
    }

    public function isAvailable(): bool {
        return $this->isAvailable;
    }

    public function borrow(): bool {
        if ($this->isAvailable) {
            $this->isAvailable = false;
            return true;
        }
        return false;
    }

    public function return(): bool {
        $this->isAvailable = true;

        return true;
    }

    public function getInfo(): string {
        return "{$this->title} by {$this->author} (ISBN: {$this->isbn}) - " .
            ($this->isAvailable ? "Available" : "Borrowed");
    }
}
