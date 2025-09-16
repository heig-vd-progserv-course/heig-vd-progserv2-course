<?php

/**
 * Exemple 6 : Héritage - Hiérarchie de plantes
 * 
 * Cet exemple illustre :
 * - L'héritage simple avec extends
 * - L'utilisation de parent::__construct()
 * - La redéfinition de méthodes (override)
 * - L'ajout de propriétés et méthodes spécifiques dans les classes filles
 * - L'utilisation de protected pour partager avec les sous-classes
 */

// Classe parent (de base)
class Plant {
    protected string $englishName;
    protected string $latinName;
    protected float $height; // en cm
    protected string $soilType;
    protected int $wateringFrequency; // jours entre arrosages

    public function __construct(string $englishName, string $latinName, float $height = 0.0) {
        $this->englishName = $englishName;
        $this->latinName = $latinName;
        $this->height = $height;
        $this->soilType = "Universel";
        $this->wateringFrequency = 7; // Par défaut, une fois par semaine
    }

    // Getters
    public function getEnglishName(): string {
        return $this->englishName;
    }

    public function getLatinName(): string {
        return $this->latinName;
    }

    public function getHeight(): float {
        return $this->height;
    }

    public function getSoilType(): string {
        return $this->soilType;
    }

    public function getWateringFrequency(): int {
        return $this->wateringFrequency;
    }

    // Setters
    public function setHeight(float $height): void {
        $this->height = max(0, $height);
    }

    public function setSoilType(string $soilType): void {
        $this->soilType = $soilType;
    }

    public function setWateringFrequency(int $days): void {
        $this->wateringFrequency = max(1, $days);
    }

    // Méthodes que les classes filles peuvent redéfinir
    public function grow(float $centimeters): string {
        $oldHeight = $this->height;
        $this->height += $centimeters;
        return "{$this->englishName} a grandi de {$centimeters}cm (de {$oldHeight}cm à {$this->height}cm).";
    }

    public function getDescription(): string {
        return "Plante: {$this->englishName} ({$this->latinName}), Hauteur: {$this->height}cm";
    }

    public function getCareInstructions(): string {
        return "Arroser tous les {$this->wateringFrequency} jours. Sol recommandé: {$this->soilType}.";
    }

    // Méthode qui sera peut-être redéfinie
    public function canBeGrown(string $climate): bool {
        return in_array($climate, ['tempéré', 'méditerranéen']);
    }
}

// Classe fille - Plante aromatique
class Herb extends Plant {
    protected array $culinaryUses;
    protected string $harvestSeason;
    protected bool $isPerennial;

    public function __construct(string $englishName, string $latinName, float $height = 0.0, bool $isPerennial = true) {
        // Appel du constructeur parent
        parent::__construct($englishName, $latinName, $height);

        // Propriétés spécifiques aux herbes aromatiques
        $this->culinaryUses = [];
        $this->harvestSeason = "Été";
        $this->isPerennial = $isPerennial;

        // Modification des paramètres hérités pour les herbes
        $this->soilType = "Bien drainé";
        $this->wateringFrequency = 3; // Plus fréquent
    }

    // Getters spécifiques
    public function getCulinaryUses(): array {
        return $this->culinaryUses;
    }

    public function getHarvestSeason(): string {
        return $this->harvestSeason;
    }

    public function isPerennial(): bool {
        return $this->isPerennial;
    }

    // Setters spécifiques
    public function addCulinaryUse(string $use): void {
        if (!in_array($use, $this->culinaryUses)) {
            $this->culinaryUses[] = $use;
        }
    }

    public function setHarvestSeason(string $season): void {
        $this->harvestSeason = $season;
    }

    // Redéfinition de méthodes (override)
    public function getDescription(): string {
        $baseDescription = parent::getDescription();
        $type = $this->isPerennial ? "vivace" : "annuelle";
        return $baseDescription . ", Herbe aromatique {$type}";
    }

    public function getCareInstructions(): string {
        $baseInstructions = parent::getCareInstructions();
        return $baseInstructions . " Pincer les fleurs pour favoriser la croissance des feuilles.";
    }

    // Méthodes spécifiques aux herbes
    public function harvest(): string {
        if (empty($this->culinaryUses)) {
            return "Récolte de {$this->englishName} effectuée.";
        }

        $uses = implode(", ", $this->culinaryUses);
        return "Récolte de {$this->englishName} effectuée. Utilisations: {$uses}.";
    }

    public function canBeGrown(string $climate): bool {
        // Les herbes sont plus adaptables
        return in_array($climate, ['tempéré', 'méditerranéen', 'continental', 'subtropical']);
    }
}

// Classe fille spécialisée - Basilic
class Basil extends Herb {
    private string $variety;
    private int $leafSize; // en mm

    public function __construct(string $variety = "Genovese", float $height = 0.0) {
        // Appel du constructeur parent avec des valeurs spécifiques
        parent::__construct("Basil", "Ocimum basilicum", $height, false); // Annuel

        $this->variety = $variety;
        $this->leafSize = 25; // Taille moyenne

        // Configuration spécifique au basilic
        $this->addCulinaryUse("Cuisine italienne");
        $this->addCulinaryUse("Pesto");
        $this->addCulinaryUse("Salades");
        $this->setHarvestSeason("Été à automne");
        $this->wateringFrequency = 2; // Très fréquent
    }

    public function getVariety(): string {
        return $this->variety;
    }

    public function getLeafSize(): int {
        return $this->leafSize;
    }

    // Redéfinition spécifique au basilic
    public function getDescription(): string {
        $baseDescription = parent::getDescription();
        return $baseDescription . ", Variété: {$this->variety}";
    }

    public function grow(float $centimeters): string {
        $result = parent::grow($centimeters);

        // Le basilic développe aussi ses feuilles en grandissant
        if ($centimeters > 0) {
            $this->leafSize += intval($centimeters * 0.5);
            $result .= " Les feuilles mesurent maintenant {$this->leafSize}mm.";
        }

        return $result;
    }

    public function getCareInstructions(): string {
        $baseInstructions = parent::getCareInstructions();
        return $baseInstructions . " Attention: sensible au froid, rentrer en hiver!";
    }

    // Méthode spécifique
    public function makePesto(): string {
        if ($this->height < 15) {
            return "Le basilic est encore trop petit pour faire du pesto.";
        }
        return "Délicieux pesto préparé avec du basilic {$this->variety}!";
    }
}

// Classe fille spécialisée - Romarin
class Rosemary extends Herb {
    private bool $isFlowering;
    private string $hardiness; // Résistance au froid

    public function __construct(float $height = 0.0) {
        parent::__construct("Rosemary", "Rosmarinus officinalis", $height, true); // Vivace

        $this->isFlowering = false;
        $this->hardiness = "Rustique";

        // Configuration spécifique au romarin
        $this->addCulinaryUse("Viandes grillées");
        $this->addCulinaryUse("Pommes de terre rôties");
        $this->addCulinaryUse("Pain");
        $this->setHarvestSeason("Toute l'année");
        $this->wateringFrequency = 10; // Résistant à la sécheresse
        $this->soilType = "Sec et calcaire";
    }

    public function isFlowering(): bool {
        return $this->isFlowering;
    }

    public function getHardiness(): string {
        return $this->hardiness;
    }

    public function bloom(): string {
        if (!$this->isFlowering && $this->height > 20) {
            $this->isFlowering = true;
            return "Le romarin produit de belles fleurs bleues!";
        } elseif ($this->height <= 20) {
            return "Le romarin est encore trop jeune pour fleurir.";
        }
        return "Le romarin est déjà en fleurs.";
    }

    public function canBeGrown(string $climate): bool {
        // Le romarin est très résistant
        return true; // Peut pousser partout avec les soins appropriés
    }

    public function getCareInstructions(): string {
        $baseInstructions = parent::getCareInstructions();
        return $baseInstructions . " Résiste bien au froid et à la sécheresse. Tailler après floraison.";
    }
}

// Fonction pour simuler une saison de croissance
function simulateGrowthSeason(array $plants): void {
    echo "=== Simulation d'une saison de croissance ===\n";

    foreach ($plants as $plant) {
        echo "\n--- {$plant->getEnglishName()} ---\n";
        echo $plant->getDescription() . "\n";

        // Croissance aléatoire
        $growth = rand(5, 20);
        echo $plant->grow($growth) . "\n";

        // Actions spécifiques selon le type
        if ($plant instanceof Basil && $plant->getHeight() > 15) {
            echo $plant->makePesto() . "\n";
        }

        if ($plant instanceof Rosemary && rand(1, 3) === 1) {
            echo $plant->bloom() . "\n";
        }

        if ($plant instanceof Herb) {
            echo $plant->harvest() . "\n";
        }

        echo "Instructions d'entretien: " . $plant->getCareInstructions() . "\n";
    }
}

// Démonstration
echo "=== Exemple 6 : Héritage - Hiérarchie de plantes ===\n\n";

// Création d'instances de différents niveaux de la hiérarchie
$genericPlant = new Plant("Rose", "Rosa", 30.0);
$herb = new Herb("Thyme", "Thymus vulgaris", 15.0);
$basil = new Basil("Purple Ruffles", 10.0);
$rosemary = new Rosemary(25.0);

// Configuration des herbes
$herb->addCulinaryUse("Assaisonnement");
$herb->addCulinaryUse("Tisanes");

// Affichage des informations initiales
echo "=== Plantes du jardin ===\n";
$plants = [$genericPlant, $herb, $basil, $rosemary];

foreach ($plants as $plant) {
    echo $plant->getDescription() . "\n";
    echo "Entretien: " . $plant->getCareInstructions() . "\n";

    if ($plant instanceof Herb) {
        echo "Utilisations culinaires: " . implode(", ", $plant->getCulinaryUses()) . "\n";
        echo "Type: " . ($plant->isPerennial() ? "Vivace" : "Annuelle") . "\n";
    }
    echo "\n";
}

// Test de la compatibilité climatique
echo "=== Test de compatibilité climatique ===\n";
$climates = ['tempéré', 'méditerranéen', 'tropical', 'continental'];

foreach ($climates as $climate) {
    echo "Climat {$climate}:\n";
    foreach ($plants as $plant) {
        $compatible = $plant->canBeGrown($climate) ? "✓" : "✗";
        echo "  {$compatible} {$plant->getEnglishName()}\n";
    }
    echo "\n";
}

// Simulation de croissance
simulateGrowthSeason($plants);
