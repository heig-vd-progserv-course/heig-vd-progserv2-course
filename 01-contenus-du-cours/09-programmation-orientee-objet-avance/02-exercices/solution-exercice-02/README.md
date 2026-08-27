# Solution de l'exercice 2

Cette solution montre comment organiser une hiérarchie de classes de plantes en
utilisant des traits pour partager les comportements communs de boisson et
d'odorat.

## Structure

```text
./
├── public/
│   └── index.php
├── src/
│   └── Plants/
│       ├── Basilic.php
│       ├── Cactus.php
│       ├── Orchid.php
│       └── Rose.php
├── traits/
│   ├── DrinkTrait.php
│   └── SmellTrait.php
├── utils/
│   └── autoloader.php
└── README.md
```

## Exemple d'utilisation

```php
<?php
require_once __DIR__ . '/../utils/autoloader.php';

use Plants\Basilic;
use Plants\Cactus;
use Plants\Orchid;
use Plants\Rose;

$basilic = new Basilic();
$cactus = new Cactus();
$orchid = new Orchid();
$rose = new Rose();

echo $basilic->drink() . "<br>";
echo $basilic->smell() . "<br>";
echo $rose->drink() . "<br>";
echo $rose->smell() . "<br>";
echo $orchid->drink() . "<br>";
```
