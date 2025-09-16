# Exercice 4 : Système de formes géométriques avancé

**Niveau :** Avancé  
**Durée estimée :** 90 minutes

## Objectif

Créer un système complet de gestion de formes géométriques combinant interfaces,
classes abstraites, héritage et polymorphisme.

## Consignes

### Étape 1 : Interfaces

#### Interface Drawable

```php
interface Drawable {
    public function draw(): string;
    public function getColor(): string;
    public function setColor(string $color): void;
}
```

#### Interface Moveable

```php
interface Moveable {
    public function move(float $deltaX, float $deltaY): void;
    public function getPosition(): array;
    public function setPosition(float $x, float $y): void;
}
```

#### Interface Scalable

```php
interface Scalable {
    public function scale(float $factor): void;
    public function getArea(): float;
    public function getPerimeter(): float;
}
```

### Étape 2 : Classe abstraite Shape

Créez une classe abstraite `Shape` qui implémente toutes les interfaces avec :

Propriétés protégées :

- `x`, `y` (position)
- `color`
- `id` (généré automatiquement)

Méthodes concrètes communes :

- Constructeur
- Implémentation de `Moveable`
- Implémentation de `Drawable` (partielle)
- `getId()`, `distanceTo(Shape $other)`
- `isLargerThan(Shape $other)`

Méthodes abstraites :

- `calculateArea()` et `calculatePerimeter()` (pour Scalable)
- `scaleImplementation(float $factor)` (implémentation spécifique du scaling)

### Étape 3 : Classes de formes spécifiques

#### Rectangle

- Propriétés : `width`, `height`
- Méthode `isSquare()`
- Gestion du scaling proportionnel

#### Circle

- Propriété : `radius`
- Méthode `getDiameter()`
- Gestion du scaling du rayon

#### Triangle

- Propriétés : `base`, `height`, `sideA`, `sideB`
- Méthode `getAngles()`
- Recalcul des côtés lors du scaling

### Étape 4 : Classe Canvas

Créez une classe `Canvas` qui :

- Stocke une collection de formes
- Gère les couches (z-index)
- Permet d'ajouter/supprimer des formes
- Peut dessiner tout le canvas
- Trouve des formes par critères
- Applique des transformations en lot

Méthodes :

- `addShape(Shape $shape, int $layer = 0)`
- `removeShape(int $shapeId)`
- `moveShape(int $shapeId, float $deltaX, float $deltaY)`
- `scaleShape(int $shapeId, float $factor)`
- `findShapesByColor(string $color)`
- `findShapesInArea(float $x, float $y, float $width, float $height)`
- `getTotalArea()`
- `drawCanvas()`
- `exportToSVG()` (bonus)

### Étape 5 : Système d'événements (Bonus)

#### Interface EventListener

```php
interface EventListener {
    public function onShapeAdded(Shape $shape): void;
    public function onShapeMoved(Shape $shape, float $oldX, float $oldY): void;
    public function onShapeScaled(Shape $shape, float $factor): void;
}
```

### Étape 6 : Tests complets

Créez un script de test qui :

1. Crée différentes formes
2. Les ajoute au canvas sur différentes couches
3. Applique des transformations
4. Recherche des formes par critères
5. Génère des statistiques
6. Exporte le résultat

## Structure attendue

```text
exercice-04-shapes/
├── interfaces/
│   ├── Drawable.php
│   ├── Moveable.php
│   ├── Scalable.php
│   └── EventListener.php
├── abstract/
│   └── Shape.php
├── shapes/
│   ├── Rectangle.php
│   ├── Circle.php
│   └── Triangle.php
├── Canvas.php
├── ShapeEventLogger.php (bonus)
└── test.php
```

## Exemple d'utilisation

```php
$canvas = new Canvas(800, 600);

// Création de formes
$rect = new Rectangle("rouge", 100, 50, 10, 10);
$circle = new Circle("bleu", 30, 200, 100);
$triangle = new Triangle("vert", 60, 40, 350, 200);

// Ajout au canvas
$canvas->addShape($rect, 1);
$canvas->addShape($circle, 2);
$canvas->addShape($triangle, 0);

// Transformations
$canvas->moveShape($rect->getId(), 50, 25);
$canvas->scaleShape($circle->getId(), 1.5);

// Recherche
$redShapes = $canvas->findShapesByColor("rouge");
$shapesInArea = $canvas->findShapesInArea(0, 0, 200, 200);

// Statistiques
echo "Aire totale: " . $canvas->getTotalArea() . "\n";
echo $canvas->drawCanvas();
```

## Points à vérifier

- ✅ Interfaces correctement implémentées
- ✅ Classe abstraite avec bon mélange concret/abstrait
- ✅ Polymorphisme utilisé efficacement
- ✅ Gestion des erreurs et validations
- ✅ Architecture extensible et maintenable
- ✅ Séparation des responsabilités

## Bonus avancés

- Système d'événements avec listeners
- Export SVG/JSON du canvas
- Animation (déplacement progressif)
- Détection de collisions entre formes
- Groupes de formes avec transformations communes
- Persistance en base de données
