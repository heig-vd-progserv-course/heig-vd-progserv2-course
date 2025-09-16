# Exercice 6 : Système de notifications multi-canal

**Niveau :** Expert  
**Durée estimée :** 90 minutes

## Objectif

Créer un système de notifications flexible supportant différents canaux (email,
SMS, push, Slack) avec filtrage et personnalisation.

## Consignes

### Étape 1 : Interfaces du système

#### Interface NotificationChannel

```php
interface NotificationChannel {
    public function send(Notification $notification, User $recipient): bool;
    public function isAvailable(): bool;
    public function getChannelName(): string;
    public function getSupportedTypes(): array; // ['urgent', 'info', 'marketing']
}
```

#### Interface NotificationFilter

```php
interface NotificationFilter {
    public function shouldSend(Notification $notification, User $recipient): bool;
    public function getFilterName(): string;
}
```

#### Interface NotificationFormatter

```php
interface NotificationFormatter {
    public function format(Notification $notification, string $channel): string;
    public function supportsChannel(string $channel): bool;
}
```

### Étape 2 : Classes de base

#### Classe abstraite Notification

Propriétés :

- `id`, `title`, `message`, `type`, `priority`
- `createdAt`, `scheduledAt`, `metadata`

Méthodes abstraites :

- `getTemplate()` : template spécifique au type de notification

#### Classes de notifications concrètes

- `WelcomeNotification extends Notification`
- `OrderConfirmationNotification extends Notification`
- `SecurityAlertNotification extends Notification`
- `MarketingNotification extends Notification`

### Étape 3 : Canaux de communication

#### EmailChannel implements NotificationChannel

- Configuration SMTP
- Templates HTML/text
- Gestion des pièces jointes
- Limites de débit (rate limiting)

#### SmsChannel implements NotificationChannel

- Intégration API SMS
- Limitation de caractères
- Coûts par message
- Numéros internationaux

#### PushNotificationChannel implements NotificationChannel

- Notifications push mobile
- Gestion des tokens
- Personnalisation par plateforme (iOS/Android)

#### SlackChannel implements NotificationChannel

- Intégration Webhook Slack
- Formatage Markdown
- Canaux et utilisateurs spécifiques

### Étape 4 : Système de filtrage

#### TimeBasedFilter implements NotificationFilter

- Heures d'envoi autorisées
- Jours de la semaine
- Fuseaux horaires

#### FrequencyFilter implements NotificationFilter

- Limite du nombre de notifications par période
- Anti-spam personnalisé par utilisateur

#### PreferenceFilter implements NotificationFilter

- Préférences utilisateur par canal
- Types de notifications acceptés
- Mode "Ne pas déranger"

#### ContentFilter implements NotificationFilter

- Filtrage par mots-clés
- Contenu inapproprié
- Longueur des messages

### Étape 5 : Classe NotificationManager

```php
class NotificationManager {
    private array $channels = [];
    private array $filters = [];
    private array $formatters = [];
    private array $queue = [];

    public function addChannel(NotificationChannel $channel): void;
    public function addFilter(NotificationFilter $filter): void;
    public function addFormatter(NotificationFormatter $formatter): void;

    public function send(Notification $notification, User $recipient, array $preferredChannels = []): bool;
    public function sendBulk(Notification $notification, array $recipients, array $channels = []): array;
    public function schedule(Notification $notification, User $recipient, DateTime $when, array $channels = []): void;

    public function processQueue(): array; // traite les notifications en attente
    public function getDeliveryReport(string $notificationId): array;
    public function getChannelStats(): array;
}
```

### Étape 6 : Classe User étendue

```php
class User {
    private int $id;
    private string $name, $email, $phone;
    private array $preferences; // préférences de notification
    private string $timezone;
    private array $deviceTokens; // pour push notifications
    private string $slackUserId;

    public function getPreferenceForChannel(string $channel): array;
    public function updateNotificationPreference(string $channel, array $settings): void;
    public function isChannelEnabled(string $channel): bool;
    public function getQuietHours(): array; // heures de silence
}
```

## Structure attendue

```text
exercice-06-notifications/
├── interfaces/
│   ├── NotificationChannel.php
│   ├── NotificationFilter.php
│   └── NotificationFormatter.php
├── abstract/
│   └── Notification.php
├── notifications/
│   ├── WelcomeNotification.php
│   ├── OrderConfirmationNotification.php
│   ├── SecurityAlertNotification.php
│   └── MarketingNotification.php
├── channels/
│   ├── EmailChannel.php
│   ├── SmsChannel.php
│   ├── PushNotificationChannel.php
│   └── SlackChannel.php
├── filters/
│   ├── TimeBasedFilter.php
│   ├── FrequencyFilter.php
│   ├── PreferenceFilter.php
│   └── ContentFilter.php
├── formatters/
│   ├── EmailFormatter.php
│   ├── SmsFormatter.php
│   └── SlackFormatter.php
├── NotificationManager.php
├── User.php
└── test.php
```

## Exemple d'utilisation

```php
// Configuration du système
$manager = new NotificationManager();

// Ajout des canaux
$manager->addChannel(new EmailChannel($smtpConfig));
$manager->addChannel(new SmsChannel($smsConfig));
$manager->addChannel(new SlackChannel($slackConfig));

// Ajout des filtres
$manager->addFilter(new TimeBasedFilter('08:00', '22:00'));
$manager->addFilter(new FrequencyFilter(10, '1 hour'));
$manager->addFilter(new PreferenceFilter());

// Création d'utilisateurs
$user = new User("Alice", "alice@example.com", "+33123456789");
$user->updateNotificationPreference('email', ['enabled' => true, 'html' => true]);
$user->updateNotificationPreference('sms', ['enabled' => false]);

// Envoi de notifications
$welcome = new WelcomeNotification("Bienvenue Alice!", "Merci de vous être inscrit.");
$manager->send($welcome, $user, ['email', 'slack']);

// Envoi en masse
$promo = new MarketingNotification("Promo -50%", "Offre limitée aujourd'hui!");
$manager->sendBulk($promo, $allUsers, ['email']);

// Planification
$reminder = new OrderConfirmationNotification("Votre commande", "Merci pour votre achat");
$manager->schedule($reminder, $user, new DateTime('+1 hour'), ['email']);
```

## Scénarios de test

1. **Envoi simple** : notification à un utilisateur via email
2. **Filtrage** : notification bloquée par les préférences
3. **Multi-canal** : même notification envoyée par email et SMS
4. **Planification** : notification programmée dans le futur
5. **Envoi en masse** : newsletter à 1000 utilisateurs
6. **Gestion d'erreurs** : canal indisponible, utilisateur inexistant
7. **Rapports** : statistiques de livraison et performance

## Points à vérifier

- ✅ Architecture flexible et extensible
- ✅ Respect des préférences utilisateur
- ✅ Gestion robuste des erreurs
- ✅ Performance avec gros volumes
- ✅ Filtrage efficace anti-spam
- ✅ Formatage adapté à chaque canal
- ✅ Système de rapports complet

## Bonus expert

- Base de données pour persistance des notifications
- Retry automatique en cas d'échec
- A/B testing sur les messages
- Analytics avancés (taux d'ouverture, clics)
- Interface d'administration web
- API REST pour intégration externe
- Webhooks pour notifications de statut
