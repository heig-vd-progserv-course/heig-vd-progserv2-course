# Exercice 5 : Jeu de rôle avec personnages

**Niveau :** Avancé  
**Durée estimée :** 120 minutes

## Objectif

Développer un système de jeu de rôle (RPG) avec différents types de personnages,
utilisant tous les concepts POO avancés.

## Consignes

### Étape 1 : Interfaces de base

#### Interface Combatant

```php
interface Combatant {
    public function attack(Combatant $target): int; // retourne les dégâts infligés
    public function defend(int $damage): int; // retourne les dégâts reçus après défense
    public function isAlive(): bool;
    public function getHealthPercentage(): float;
}
```

#### Interface MagicUser

```php
interface MagicUser {
    public function castSpell(string $spellName, Combatant $target = null): string;
    public function getMana(): int;
    public function getMaxMana(): int;
    public function restoreMana(int $amount): void;
}
```

#### Interface Healer

```php
interface Healer {
    public function heal(Combatant $target): int; // retourne les HP restaurés
    public function getHealingPower(): int;
}
```

### Étape 2 : Classe abstraite Character

Propriétés protégées :

- `name`, `level`, `health`, `maxHealth`
- `strength`, `defense`, `agility`, `intelligence`
- `experience`, `experienceToNextLevel`

Méthodes concrètes :

- Constructeur, getters/setters
- `takeDamage(int $damage)`, `heal(int $amount)`
- `gainExperience(int $exp)`, `levelUp()`
- `getStats()`, `isAlive()`

Méthodes abstraites :

- `getCharacterClass()` : retourne la classe du personnage
- `getSpecialAbility()` : capacité spéciale de la classe

### Étape 3 : Classes de personnages

#### Warrior extends Character implements Combatant

- Spécialisation dans l'attaque physique et la défense
- Capacité spéciale : "Charge" (double dégâts au prochain tour)
- Propriétés : `armor`, `weapon`

#### Mage extends Character implements Combatant, MagicUser

- Spécialisation dans la magie
- Propriétés : `mana`, `maxMana`, `spells`
- Sorts : "Fireball", "Lightning", "Shield"
- Faible en combat physique

#### Priest extends Character implements Combatant, MagicUser, Healer

- Hybride magie/soins
- Sorts de soin et de protection
- Combat physique modéré

#### Rogue extends Character implements Combatant

- Spécialisation dans l'agilité et les attaques critiques
- Capacité : attaque sournoise (chance de critique)
- Esquive améliorée

### Étape 4 : Système de combat

#### Classe Battle

```php
class Battle {
    private array $participants;
    private array $turnOrder;
    private int $currentTurn;

    public function addParticipant(Combatant $participant): void;
    public function start(): string; // retourne le récit du combat
    public function nextTurn(): string;
    public function isFinished(): bool;
    public function getWinner(): ?Combatant;
}
```

### Étape 5 : Système de groupe

#### Classe Party

- Gère un groupe d'aventuriers
- Répartition automatique de l'expérience
- Soins de groupe
- Stratégies de combat (qui attaque qui)

### Étape 6 : Système d'objets (Bonus)

#### Interface Equipable

```php
interface Equipable {
    public function getStatBonus(): array; // ['strength' => 5, 'defense' => 3]
    public function getRequiredLevel(): int;
    public function getDurability(): int;
}
```

Classes d'équipement :

- `Weapon implements Equipable`
- `Armor implements Equipable`
- `Accessory implements Equipable`

## Structure attendue

```text
exercice-05-rpg/
├── interfaces/
│   ├── Combatant.php
│   ├── MagicUser.php
│   ├── Healer.php
│   └── Equipable.php
├── abstract/
│   └── Character.php
├── classes/
│   ├── Warrior.php
│   ├── Mage.php
│   ├── Priest.php
│   └── Rogue.php
├── combat/
│   ├── Battle.php
│   └── Party.php
├── equipment/
│   ├── Weapon.php
│   ├── Armor.php
│   └── Accessory.php
└── test.php
```

## Exemple d'utilisation

```php
// Création des personnages
$warrior = new Warrior("Conan", 1);
$mage = new Mage("Gandalf", 1);
$priest = new Priest("Sanctus", 1);
$rogue = new Rogue("Shadow", 1);

// Formation d'un groupe
$party = new Party("Les Héros");
$party->addMember($warrior);
$party->addMember($mage);
$party->addMember($priest);

// Équipement (bonus)
$sword = new Weapon("Épée de fer", ['strength' => 10], 1);
$warrior->equip($sword);

// Combat
$battle = new Battle();
$battle->addParticipant($warrior);
$battle->addParticipant($rogue);

echo $battle->start();
```

## Scénarios de test

1. **Combat simple** : Warrior vs Rogue
2. **Combat magique** : Mage vs Priest
3. **Combat en groupe** : Party vs monsters
4. **Montée de niveau** : gain d'expérience et progression
5. **Équipement** : amélioration des stats
6. **Soins** : récupération pendant et après combat

## Points à vérifier

- ✅ Toutes les interfaces correctement implémentées
- ✅ Polymorphisme dans le système de combat
- ✅ Équilibrage des classes (forces/faiblesses)
- ✅ Gestion correcte des états (vie, mana, etc.)
- ✅ Système d'expérience fonctionnel
- ✅ Code modulaire et extensible

## Bonus expert

- Système de compétences et talents
- Effets temporaires (buffs/debuffs)
- Intelligence artificielle pour les combats automatiques
- Sauvegarde/chargement des personnages
- Interface graphique simple (HTML/CSS)
- Balancement automatique basé sur les statistiques de combat
