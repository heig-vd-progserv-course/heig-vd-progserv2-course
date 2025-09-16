<?php

/**
 * Exemple 7 : Héritage - Système d'employés
 * 
 * Cet exemple montre :
 * - Une hiérarchie d'employés avec différents niveaux
 * - L'utilisation de protected pour permettre l'accès aux sous-classes
 * - La redéfinition de méthodes avec différents comportements
 * - L'ajout de fonctionnalités spécifiques à chaque type d'employé
 */

// Classe de base pour tous les employés
class Employee {
    protected string $firstName;
    protected string $lastName;
    protected string $employeeId;
    protected float $baseSalary;
    protected string $department;
    protected DateTime $hireDate;
    protected array $skills;

    public function __construct(
        string $firstName,
        string $lastName,
        string $employeeId,
        float $baseSalary,
        string $department
    ) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->employeeId = $employeeId;
        $this->baseSalary = $baseSalary;
        $this->department = $department;
        $this->hireDate = new DateTime();
        $this->skills = [];
    }

    // Getters
    public function getFirstName(): string {
        return $this->firstName;
    }

    public function getLastName(): string {
        return $this->lastName;
    }

    public function getFullName(): string {
        return $this->firstName . ' ' . $this->lastName;
    }

    public function getEmployeeId(): string {
        return $this->employeeId;
    }

    public function getBaseSalary(): float {
        return $this->baseSalary;
    }

    public function getDepartment(): string {
        return $this->department;
    }

    public function getHireDate(): DateTime {
        return $this->hireDate;
    }

    public function getSkills(): array {
        return $this->skills;
    }

    // Setters
    public function setBaseSalary(float $salary): void {
        $this->baseSalary = max(0, $salary);
    }

    public function setDepartment(string $department): void {
        $this->department = $department;
    }

    public function addSkill(string $skill): void {
        if (!in_array($skill, $this->skills)) {
            $this->skills[] = $skill;
        }
    }

    // Méthodes qui peuvent être redéfinies
    public function calculateSalary(): float {
        return $this->baseSalary;
    }

    public function getJobTitle(): string {
        return "Employé";
    }

    public function getResponsibilities(): array {
        return ["Suivre les procédures de l'entreprise", "Respecter les horaires"];
    }

    public function performWork(): string {
        return "{$this->getFullName()} effectue ses tâches quotidiennes.";
    }

    public function getYearsOfService(): int {
        $now = new DateTime();
        return $this->hireDate->diff($now)->y;
    }

    public function getEmployeeInfo(): string {
        $salary = number_format($this->calculateSalary(), 2, ',', ' ');
        $skills = empty($this->skills) ? "Aucune compétence enregistrée" : implode(", ", $this->skills);

        return sprintf(
            "ID: %s | %s %s | Poste: %s | Département: %s | Salaire: %s€ | Compétences: %s",
            $this->employeeId,
            $this->firstName,
            $this->lastName,
            $this->getJobTitle(),
            $this->department,
            $salary,
            $skills
        );
    }
}

// Classe Manager héritant d'Employee
class Manager extends Employee {
    protected array $teamMembers;
    protected float $managementBonus;
    protected int $teamSize;

    public function __construct(
        string $firstName,
        string $lastName,
        string $employeeId,
        float $baseSalary,
        string $department,
        float $managementBonus = 0.15
    ) {
        parent::__construct($firstName, $lastName, $employeeId, $baseSalary, $department);
        $this->teamMembers = [];
        $this->managementBonus = $managementBonus;
        $this->teamSize = 0;

        // Compétences par défaut pour un manager
        $this->addSkill("Leadership");
        $this->addSkill("Gestion d'équipe");
        $this->addSkill("Communication");
    }

    public function getTeamMembers(): array {
        return $this->teamMembers;
    }

    public function getTeamSize(): int {
        return $this->teamSize;
    }

    public function getManagementBonus(): float {
        return $this->managementBonus;
    }

    public function addTeamMember(Employee $employee): void {
        if (!in_array($employee->getEmployeeId(), array_keys($this->teamMembers))) {
            $this->teamMembers[$employee->getEmployeeId()] = $employee;
            $this->teamSize++;
        }
    }

    public function removeTeamMember(string $employeeId): bool {
        if (isset($this->teamMembers[$employeeId])) {
            unset($this->teamMembers[$employeeId]);
            $this->teamSize--;
            return true;
        }
        return false;
    }

    // Redéfinition des méthodes héritées
    public function calculateSalary(): float {
        $bonus = $this->baseSalary * $this->managementBonus;
        $teamBonus = $this->teamSize * 500; // Bonus par membre d'équipe
        return $this->baseSalary + $bonus + $teamBonus;
    }

    public function getJobTitle(): string {
        return "Manager";
    }

    public function getResponsibilities(): array {
        $baseResponsibilities = parent::getResponsibilities();
        return array_merge($baseResponsibilities, [
            "Gérer une équipe de {$this->teamSize} personnes",
            "Planifier et coordonner les projets",
            "Évaluer les performances de l'équipe",
            "Mener les réunions d'équipe"
        ]);
    }

    public function performWork(): string {
        $baseWork = parent::performWork();
        $teamManagement = "Il/elle supervise son équipe de {$this->teamSize} membres.";
        return $baseWork . " " . $teamManagement;
    }

    // Méthodes spécifiques au manager
    public function conductTeamMeeting(): string {
        if ($this->teamSize === 0) {
            return "{$this->getFullName()} n'a pas d'équipe à réunir.";
        }
        return "{$this->getFullName()} anime une réunion d'équipe avec {$this->teamSize} collaborateurs.";
    }

    public function evaluateTeam(): array {
        $evaluations = [];
        foreach ($this->teamMembers as $member) {
            $evaluations[] = "Évaluation de {$member->getFullName()}: Performance satisfaisante";
        }
        return $evaluations;
    }

    public function getTeamSummary(): string {
        if ($this->teamSize === 0) {
            return "Aucune équipe assignée.";
        }

        $memberNames = [];
        foreach ($this->teamMembers as $member) {
            $memberNames[] = $member->getFullName();
        }

        return "Équipe de {$this->teamSize} membres: " . implode(", ", $memberNames);
    }
}

// Classe Developer héritant d'Employee
class Developer extends Employee {
    protected array $programmingLanguages;
    protected array $projects;
    protected string $seniority; // junior, senior, lead
    protected int $linesOfCodeWritten;

    public function __construct(
        string $firstName,
        string $lastName,
        string $employeeId,
        float $baseSalary,
        string $seniority = "junior"
    ) {
        parent::__construct($firstName, $lastName, $employeeId, $baseSalary, "IT");
        $this->programmingLanguages = [];
        $this->projects = [];
        $this->seniority = $seniority;
        $this->linesOfCodeWritten = 0;

        // Compétences par défaut pour un développeur
        $this->addSkill("Programmation");
        $this->addSkill("Résolution de problèmes");
        $this->addSkill("Débogage");
    }

    public function getProgrammingLanguages(): array {
        return $this->programmingLanguages;
    }

    public function getProjects(): array {
        return $this->projects;
    }

    public function getSeniority(): string {
        return $this->seniority;
    }

    public function getLinesOfCodeWritten(): int {
        return $this->linesOfCodeWritten;
    }

    public function addProgrammingLanguage(string $language): void {
        if (!in_array($language, $this->programmingLanguages)) {
            $this->programmingLanguages[] = $language;
            $this->addSkill($language);
        }
    }

    public function addProject(string $project): void {
        if (!in_array($project, $this->projects)) {
            $this->projects[] = $project;
        }
    }

    public function setSeniority(string $seniority): void {
        $validLevels = ['junior', 'senior', 'lead'];
        if (in_array($seniority, $validLevels)) {
            $this->seniority = $seniority;
        }
    }

    // Redéfinition des méthodes héritées
    public function calculateSalary(): float {
        $seniorityMultiplier = match ($this->seniority) {
            'junior' => 1.0,
            'senior' => 1.3,
            'lead' => 1.6,
            default => 1.0
        };

        $languageBonus = count($this->programmingLanguages) * 1000;
        $projectBonus = count($this->projects) * 500;

        return ($this->baseSalary * $seniorityMultiplier) + $languageBonus + $projectBonus;
    }

    public function getJobTitle(): string {
        return ucfirst($this->seniority) . " Developer";
    }

    public function getResponsibilities(): array {
        $baseResponsibilities = parent::getResponsibilities();
        $devResponsibilities = [
            "Développer et maintenir des applications",
            "Participer aux code reviews",
            "Documenter le code",
            "Travailler en équipe agile"
        ];

        if ($this->seniority === 'lead') {
            $devResponsibilities[] = "Mentorer les développeurs junior";
            $devResponsibilities[] = "Définir l'architecture technique";
        }

        return array_merge($baseResponsibilities, $devResponsibilities);
    }

    public function performWork(): string {
        $baseWork = parent::performWork();
        $languages = empty($this->programmingLanguages) ? "divers langages" : implode(", ", $this->programmingLanguages);
        return $baseWork . " Il/elle développe en utilisant: {$languages}.";
    }

    // Méthodes spécifiques au développeur
    public function writeCode(int $lines): string {
        $this->linesOfCodeWritten += $lines;
        return "{$this->getFullName()} a écrit {$lines} lignes de code. Total: {$this->linesOfCodeWritten} lignes.";
    }

    public function reviewCode(): string {
        if ($this->seniority === 'junior') {
            return "{$this->getFullName()} apprend en participant aux code reviews.";
        }
        return "{$this->getFullName()} effectue une review de code approfondie.";
    }

    public function mentorJunior(): string {
        if ($this->seniority !== 'lead' && $this->seniority !== 'senior') {
            return "{$this->getFullName()} n'a pas encore le niveau pour faire du mentorat.";
        }
        return "{$this->getFullName()} guide un développeur junior dans son apprentissage.";
    }
}

// Fonction pour afficher les informations d'équipe
function displayTeamInfo(array $employees): void {
    echo "=== Informations de l'équipe ===\n";

    $totalSalary = 0;
    $departmentCount = [];
    $skillCount = [];

    foreach ($employees as $employee) {
        echo $employee->getEmployeeInfo() . "\n";

        $totalSalary += $employee->calculateSalary();

        $dept = $employee->getDepartment();
        $departmentCount[$dept] = ($departmentCount[$dept] ?? 0) + 1;

        foreach ($employee->getSkills() as $skill) {
            $skillCount[$skill] = ($skillCount[$skill] ?? 0) + 1;
        }

        echo "Responsabilités: " . implode(" | ", $employee->getResponsibilities()) . "\n";
        echo $employee->performWork() . "\n\n";
    }

    echo "=== Statistiques ===\n";
    echo "Coût salarial total: " . number_format($totalSalary, 2, ',', ' ') . "€\n";
    echo "Répartition par département:\n";
    foreach ($departmentCount as $dept => $count) {
        echo "  - {$dept}: {$count} employé(s)\n";
    }
    echo "Compétences les plus courantes:\n";
    arsort($skillCount);
    $top3Skills = array_slice($skillCount, 0, 3, true);
    foreach ($top3Skills as $skill => $count) {
        echo "  - {$skill}: {$count} employé(s)\n";
    }
    echo "\n";
}

// Démonstration
echo "=== Exemple 7 : Héritage - Système d'employés ===\n\n";

// Création d'employés de différents types
$employee1 = new Employee("Alice", "Martin", "EMP001", 35000, "RH");
$employee1->addSkill("Communication");
$employee1->addSkill("Organisation");

$manager1 = new Manager("Bob", "Johnson", "MGR001", 55000, "IT", 0.20);
$manager1->addSkill("Planification");

$dev1 = new Developer("Charlie", "Brown", "DEV001", 45000, "junior");
$dev1->addProgrammingLanguage("PHP");
$dev1->addProgrammingLanguage("JavaScript");
$dev1->addProject("Site e-commerce");

$dev2 = new Developer("Diana", "Wilson", "DEV002", 65000, "senior");
$dev2->addProgrammingLanguage("PHP");
$dev2->addProgrammingLanguage("Python");
$dev2->addProgrammingLanguage("Java");
$dev2->addProject("API REST");
$dev2->addProject("Microservices");

$dev3 = new Developer("Eve", "Davis", "DEV003", 75000, "lead");
$dev3->addProgrammingLanguage("PHP");
$dev3->addProgrammingLanguage("Go");
$dev3->addProgrammingLanguage("Rust");
$dev3->addProject("Architecture distribuée");
$dev3->addProject("Système de monitoring");

// Formation d'équipe
$manager1->addTeamMember($dev1);
$manager1->addTeamMember($dev2);
$manager1->addTeamMember($dev3);

// Affichage des informations
$allEmployees = [$employee1, $manager1, $dev1, $dev2, $dev3];
displayTeamInfo($allEmployees);

// Activités spécifiques
echo "=== Activités quotidiennes ===\n";
echo $manager1->conductTeamMeeting() . "\n";
echo $manager1->getTeamSummary() . "\n\n";

echo $dev1->writeCode(150) . "\n";
echo $dev2->reviewCode() . "\n";
echo $dev3->mentorJunior() . "\n\n";

// Évaluations d'équipe
echo "=== Évaluations d'équipe ===\n";
$evaluations = $manager1->evaluateTeam();
foreach ($evaluations as $evaluation) {
    echo $evaluation . "\n";
}
