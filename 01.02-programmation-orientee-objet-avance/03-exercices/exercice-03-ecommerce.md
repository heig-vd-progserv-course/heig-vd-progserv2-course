# Exercice 3 : Mini E-commerce (Produits et Panier)

**Niveau :** Intermédiaire  
**Durée estimée :** 60 minutes

## Objectif

Développer un mini-système d'e-commerce avec gestion de produits et panier
d'achat.

## Consignes

### Étape 1 : Classe Product

Créez une classe `Product` avec :

Propriétés privées :

- `id` (int, généré automatiquement)
- `name` (string)
- `price` (float)
- `stock` (int)
- `category` (string)

Méthodes :

- Constructeur
- Getters et setters avec validation
- `reduceStock(int $quantity)` : réduit le stock
- `addStock(int $quantity)` : augmente le stock
- `isInStock(int $quantity = 1)` : vérifie la disponibilité
- `getTotalValue()` : valeur totale du stock

### Étape 2 : Classe CartItem

Créez une classe `CartItem` qui représente un élément dans le panier :

Propriétés privées :

- `product` (Product)
- `quantity` (int)

Méthodes :

- Constructeur
- Getters et setters
- `getSubTotal()` : prix total pour cet élément
- `updateQuantity(int $newQuantity)` : met à jour la quantité

### Étape 3 : Classe ShoppingCart

Créez une classe `ShoppingCart` avec :

Propriétés privées :

- `items` (array de CartItem)
- `discountPercent` (float, par défaut 0)

Méthodes :

- `addProduct(Product $product, int $quantity)`
- `removeProduct(int $productId)`
- `updateQuantity(int $productId, int $quantity)`
- `getItems()` : retourne tous les éléments
- `getItemCount()` : nombre total d'articles
- `getSubTotal()` : sous-total avant remise
- `getDiscount()` : montant de la remise
- `getTotal()` : total après remise
- `applyDiscount(float $percent)` : applique une remise
- `clear()` : vide le panier
- `checkout()` : finalise la commande (réduit les stocks)

### Étape 4 : Classe Customer

Créez une classe `Customer` avec :

Propriétés privées :

- `id` (int)
- `name` (string)
- `email` (string)
- `cart` (ShoppingCart)

Méthodes :

- Constructeur
- Getters et setters
- `getCart()` : retourne le panier
- `placeOrder()` : passe la commande

### Étape 5 : Tests complets

Créez un script qui teste tous les scénarios :

1. Création de produits
2. Ajout au panier
3. Modification des quantités
4. Application de remises
5. Finalisation de commande
6. Vérification des stocks après achat

## Structure attendue

```text
exercice-03-ecommerce/
├── Product.php
├── CartItem.php
├── ShoppingCart.php
├── Customer.php
└── test.php
```

## Exemple d'utilisation

```php
// Création de produits
$laptop = new Product("Laptop Dell", 899.99, 10, "Informatique");
$mouse = new Product("Souris", 29.99, 50, "Accessoires");

// Création d'un client
$customer = new Customer("Alice Martin", "alice@example.com");

// Ajout au panier
$cart = $customer->getCart();
$cart->addProduct($laptop, 1);
$cart->addProduct($mouse, 2);

// Application d'une remise
$cart->applyDiscount(10); // 10% de remise

// Finalisation
echo "Total: " . $cart->getTotal() . "€\n";
$customer->placeOrder();
```

## Points à vérifier

- ✅ Validation des données (prix positifs, stock suffisant)
- ✅ Gestion des erreurs (produit non trouvé, stock insuffisant)
- ✅ Calculs corrects (sous-totaux, remises, totaux)
- ✅ Encapsulation et cohérence des données
- ✅ Code réutilisable et bien structuré

## Bonus (optionnel)

- Ajouter un système de TVA
- Implémenter différents types de remises (fixe, pourcentage, par catégorie)
- Ajouter un historique des commandes
- Créer une classe Order pour sauvegarder les commandes finalisées
