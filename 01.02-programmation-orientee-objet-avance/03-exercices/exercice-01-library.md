# Exercice 1 : Classe Library (Bibliothèque)

**Niveau :** Débutant  
**Durée estimée :** 30 minutes

## Objectif

Créer un système simple de gestion de bibliothèque pour comprendre les bases de
la POO.

## Consignes

### Étape 1 : Classe Book

Créez une classe `Book` avec les propriétés suivantes :

- `title` (string, privé)
- `author` (string, privé)
- `isbn` (string, privé)
- `isAvailable` (bool, privé, par défaut `true`)

Implémentez les méthodes suivantes :

- Constructeur prenant le titre, l'auteur et l'ISBN
- Getters pour toutes les propriétés
- `borrow()` : marque le livre comme emprunté (retourne `true` si succès,
  `false` si déjà emprunté)
- `return()` : marque le livre comme disponible
- `getInfo()` : retourne une chaîne avec les informations du livre

### Étape 2 : Classe Library

Créez une classe `Library` avec les propriétés suivantes :

- `name` (string, privé)
- `books` (array, privé)

Implémentez les méthodes suivantes :

- Constructeur prenant le nom de la bibliothèque
- `addBook(Book $book)` : ajoute un livre à la collection
- `findBookByTitle(string $title)` : trouve un livre par son titre
- `findBookByAuthor(string $author)` : trouve tous les livres d'un auteur
- `borrowBook(string $title)` : emprunte un livre par son titre
- `returnBook(string $title)` : retourne un livre par son titre
- `getAvailableBooks()` : retourne la liste des livres disponibles
- `getBorrowedBooks()` : retourne la liste des livres empruntés
- `getLibraryStats()` : retourne les statistiques (nombre total, disponibles,
  empruntés)

### Étape 3 : Tests

Créez un script de test qui :

1. Crée une bibliothèque
2. Ajoute plusieurs livres
3. Emprunte quelques livres
4. Retourne quelques livres
5. Affiche les statistiques finales

## Structure attendue

```
exercice-01-library/
├── Book.php
├── Library.php
└── test.php
```

## Exemple d'utilisation

```php
$library = new Library("Bibliothèque Municipale");

$book1 = new Book("1984", "George Orwell", "978-0451524935");
$book2 = new Book("Le Petit Prince", "Antoine de Saint-Exupéry", "978-2070408504");

$library->addBook($book1);
$library->addBook($book2);

$library->borrowBook("1984");
echo $library->getLibraryStats();
```

## Points à vérifier

- ✅ Encapsulation : propriétés privées avec getters/setters appropriés
- ✅ Validation : impossible d'emprunter un livre déjà emprunté
- ✅ Gestion des cas d'erreur : livre introuvable, etc.
- ✅ Code propre et bien commenté

## Bonus (optionnel)

- Ajouter une propriété `borrower` (string) pour savoir qui a emprunté le livre
- Implémenter une limite de durée d'emprunt avec une date
- Ajouter une méthode pour rechercher par ISBN
