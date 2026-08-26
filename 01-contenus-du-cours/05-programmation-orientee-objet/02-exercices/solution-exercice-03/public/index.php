<?php
require_once __DIR__ . '/../src/Library.php';
require_once __DIR__ . '/../src/Book.php';

$library = new Library("Bibliothèque Municipale");

$book1 = new Book("1984", "George Orwell", "978-0451524935");
$book2 = new Book("Le Petit Prince", "Antoine de Saint-Exupéry", "978-2070408504");

$library->addBook($book1);
$library->addBook($book2);

$library->borrowBook("1984");
echo $library->getLibraryStats();
