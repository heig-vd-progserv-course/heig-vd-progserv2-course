# Déploiement - Exercices

L. Delafontaine, avec l'aide de
[GitHub Copilot](https://github.com/features/copilot).

Ce travail est sous licence [CC BY-SA 4.0][licence].

## Ressources annexes

- Objectifs, méthodes d'enseignement et d'apprentissage, et méthodes
  d'évaluation : [Lien vers le contenu](..)
- Supports de cours : [Lien vers le contenu](../01-supports-de-cours/README.md)
  ·
  [Presentation (web)](https://heig-vd-progserv-course.github.io/heig-vd-progserv2-course/03.01-deploiement/01-supports-de-cours/index.html)
  ·
  [Presentation (PDF)](https://heig-vd-progserv-course.github.io/heig-vd-progserv2-course/03.01-deploiement/01-supports-de-cours/03.01-deploiement-presentation.pdf)
- Exemples de code : [Lien vers le contenu](../02-exemples-de-code/)

## Table des matières

- [Ressources annexes](#ressources-annexes)
- [Table des matières](#table-des-matières)
- [Exercices](#exercices)
  - [Exercice 0 - Accéder au programme étudiant d'Infomaniak](#exercice-0---accéder-au-programme-étudiant-dinfomaniak)
  - [Exercice 1 - Créer un hébergement web](#exercice-1---créer-un-hébergement-web)
  - [Exercice 2 - Désactiver le renouvellement automatique](#exercice-2---désactiver-le-renouvellement-automatique)
  - [Exercice 3 - Configurer l'hébergement web](#exercice-3---configurer-lhébergement-web)
  - [Exercice 4 - Accéder à l'hébergement web via FTP/SFTP](#exercice-4---accéder-à-lhébergement-web-via-ftpsftp)
  - [Exercice 5 - Déployer une application PHP simple avec SQLite](#exercice-5---déployer-une-application-php-simple-avec-sqlite)
  - [Exercice 6 - Accéder à la base de données MySQL/MariaDB](#exercice-6---accéder-à-la-base-de-données-mysqlmariadb)
  - [Exercice 7 - Déployer une application PHP simple avec MySQL/MariaDB](#exercice-7---déployer-une-application-php-simple-avec-mysqlmariadb)
  - [Exercice 8 - Sécuriser l'application PHP](#exercice-8---sécuriser-lapplication-php)
  - [Exercice 9 - Effectuer la demande de remboursement auprès de la HEIG-VD](#exercice-9---effectuer-la-demande-de-remboursement-auprès-de-la-heig-vd)
  - [Exercice 10 - Renouveler/révoquer le programme étudiant d'Infomaniak](#exercice-10---renouvelerrévoquer-le-programme-étudiant-dinfomaniak)

## Exercices

> [!CAUTION]
>
> Ces exercices sont à réaliser par groupe de projets. Une seule demande de
> remboursement doit être effectuée par groupe de projet.

### Exercice 0 - Accéder au programme étudiant d'Infomaniak

Afin d'accéder au programme étudiant d'Infomaniak, vous devez accéder à la page
dédiée au programme étudiant d'Infomaniak à l'adresse suivante :
<https://www.infomaniak.com/fr/education>.

![Programme étudiant d'Infomaniak](./images/infomaniak-student-program-01-homepage.png)

À l'aide du bouton **Rejoindre le programme étudiant**, vous pouvez créer un
compte Infomaniak en utilisant votre adresse e-mail HEIG-VD. Si vous avez déjà
un compte Infomaniak, vous pouvez l'utiliser pour accéder au programme étudiant
:

![Programme étudiant d'Infomaniak - Connexion](./images/infomaniak-student-program-02-register.png)

Si vous avez plusieurs organisations Infomaniak (par exemple, si vous avez créé
un compte Infomaniak pour un projet personnel), assurez-vous de choisir la bonne
organisation lors de votre inscription au programme étudiant :

![Programme étudiant d'Infomaniak - Sélection du compte](./images/infomaniak-student-program-03-select-account.png)

Une fois la bonne organisation sélectionnée, vous devez fournir une preuve que
vous êtes étudiant.e à la HEIG-VD. Pour cela, vous pouvez utiliser votre carte
d'étudiant.e ou votre attestation d'étude. Vous devez également fournir une
adresse e-mail HEIG-VD pour vérifier que vous êtes bien étudiant.e à la HEIG-VD.

Saisissez le nom de votre école (_"HEIG-VD"_) et votre adresse e-mail HEIG-VD
dans le formulaire :

![Programme étudiant d'Infomaniak - École et adresse e-mail](./images/infomaniak-student-program-04-school-name-and-email-address.png)

Après avoir soumis le formulaire, vous recevrez un e-mail de confirmation à
votre adresse e-mail HEIG-VD. Cliquez sur le lien dans l'e-mail pour confirmer
votre inscription au programme étudiant :

![Programme étudiant d'Infomaniak - Confirmation par e-mail](./images/infomaniak-student-program-05-email-confirmation.png)

Une fois votre inscription confirmée, Infomaniak vérifiera votre statut
d'étudiant.e auprès de la HEIG-VD. Ce processus peut prendre quelques jours.
Vous pouvez vérifier le statut de votre demande dans votre compte Infomaniak :

> [!NOTE]
>
> Infomaniak peut mettre plusieurs jours ouvrables pour vérifier votre statut
> d'étudiant.e. Vous recevrez un e-mail de confirmation une fois que votre
> statut sera approuvé.
>
> Si vous ne recevez pas d'e-mail de confirmation dans les 7 jours, annoncez-le
> à votre enseignant.e.

![Programme étudiant d'Infomaniak - Statut en attente](./images/infomaniak-student-program-06-wait-for-approbation-1.png)

![Programme étudiant d'Infomaniak - Statut en attente](./images/infomaniak-student-program-06-wait-for-approbation-2.png)

Une fois votre statut d'étudiant.e approuvé par Infomaniak, connectez-vous à
votre compte Infomaniak et accédez à la page du programme étudiant pour vérifier
que votre statut est bien approuvé :

![Programme étudiant d'Infomaniak - Hébergement web](./images/infomaniak-student-program-07-student-dashboard.png)

### Exercice 1 - Créer un hébergement web

> [!CAUTION]
>
> Suivez ces étapes uniquement une fois que les étapes précédentes ont été
> complétées !

Afin de commander un hébergement web, vous pouvez vous rendre la page page
suivante : <https://shop.infomaniak.com/order2/domain?hosting_order=true>.

La première étape consiste à choisir un nom de domaine pour votre hébergement
web. Vous pouvez acheter un nouveau nom de domaine ou utiliser un nom de domaine
que vous possédez déjà. Nous vous recommandons d'activer l'option de
confidentialité (_"Domain Privacy"_) du nom de domaine pour protéger vos
informations personnelles. L'option pour accélérer l'accès au site web (_"DNS
Fast Anycast"_) n'est pas nécessaire pour ce cours.:

![Infomaniak - Choisir un nom de domaine](./images/infomaniak-01-choose-domain.png)

Une fois le nom de domaine choisi, vous devez saisir vos coordonnées de
facturation. Même si vous ne serez pas facturé pour l'hébergement web dans le
cadre du programme étudiant, Infomaniak exige ces informations pour créer
l'hébergement web. C'est la raison pour laquelle l'option _"Domain Privacy"_ est
recommandée pour protéger vos informations personnelles :

![Infomaniak - Données personnelles](./images/infomaniak-02-personal-information.png)

Sélectionnez maintenant un plan d'hébergement web. Choisissez le plan
_"Hébergement Web"_ :

![Infomaniak - Choisir un plan d'hébergement web](./images/infomaniak-03-choose-web-hosting-plan.png)

Sélectionnez l'option _"Je n'ai pas encore besoin d'adresse mail"_ pour le
moment. Nous obtiendrons une adresse e-mail gratuite plus tard dans l'unité
d'enseignement :

![Infomaniak - Choisir un plan d'adresse e-mail](./images/infomaniak-04-choose-email-plan.png)

Confirmez que vous serez propriétaire du nom de domaine et de l'hébergement web.
Toutes autres options peuvent être ignorées (_"Continuer sans Renewal
Guarantee"_).

Validez votre commande :

> [!CAUTION]
>
> Assurez-vous de bénéficier du programme étudiant d'Infomaniak avant de valider
> votre commande. L'hébergement web doit être gratuit dans le cadre du programme
> étudiant d'Infomaniak. Si vous ne bénéficiez pas du programme étudiant, vous
> serez facturé pour l'hébergement web.

> [!WARNING]
>
> Vous avez droit jusqu'à 20 hébergements web gratuits dans le cadre du
> programme étudiant d'Infomaniak. Il est néanmoins obligatoire d'acquérir un
> nom de domaine pour votre projet que vous devrez payer vous-même (environ 15
> CHF pour une année). Ce montant peut être remboursé par la HEIG-VD si vous
> effectuez la demande de remboursement (voir ci-après).

![Infomaniak - Résumé de la commande](./images/infomaniak-05-order-summary.png)

> [!TIP]
>
> Le même nom de domaine peut être utilisé pour plusieurs hébergements web (par
> exemple, pour différents projets) à l'aide de sous-domaines (par exemple,
> `projet1.mondomaine.ch`, `projet2.mondomaine.ch`, etc.). Cette utilisation
> spécifique n'est pas couverte dans cette unité d'enseignement.

Une fois la commande validée et payée, vous pouvez télécharger la facture au
format PDF. Vous en aurez besoin pour effectuer la demande de remboursement
auprès de la HEIG-VD (voir ci-après) :

![Infomaniak - Télécharger la facture](./images/infomaniak-06-download-invoice.png)

### Exercice 2 - Désactiver le renouvellement automatique

Afin d'éviter des frais supplémentaires à la fin de la première année, vous
devez désactiver le renouvellement automatique du nom de domaine et de
l'hébergement web. Pour cela, vous pouvez vous rendre dans **Comptabilité** >
**Renouvellement** dans le portail d'Infomaniak :

![Infomaniak - Accéder aux renouvellements](./images/infomaniak-accounting-01-access-renewals.png)

Sélectionnez tous les éléments de la liste puis cliquez sur le bouton
**Désactiver le renouvellement automatique** :

![Infomaniak - Désactiver le renouvellement automatique](./images/infomaniak-accounting-02-disable-auto-renewal.png)

### Exercice 3 - Configurer l'hébergement web

Avant de pouvoir utiliser l'hébergement web, vous devez configurer certains
paramètres. Pour cela, vous pouvez vous rendre dans **Web & Domaines** >
**Hébergement** :

![Infomaniak - Accéder à l'hébergement web](./images/infomaniak-web-01-access-hosting.png)

En cliquant sur le nom de domaine ou en accédant aux paramètres de l'hébergement
web grâce au bouton des trois points, vous pouvez accéder au tableau de bord de
l'hébergement web :

![Infomaniak - Tableau de bord de l'hébergement web](./images/infomaniak-web-02-hosting-dashboard.png)

Ce tableau de bord vous permet de configurer plusieurs paramètres importants
pour votre hébergement web, notamment :

- Le(s) site(s) web associé(s) à l'hébergement web.
- Les accès FTP/SFTP pour transférer les fichiers de votre application PHP.
- Les accès à la base de données MariaDB.

Accédez ensuite au tableau de bord du site que vous venez de commander en
cliquant sur celui-ci ou en utilisant le bouton des trois points :

![Infomaniak - Accéder au site web](./images/infomaniak-web-03-access-website.png)

Ce tableau de bord vous permet de configurer plusieurs paramètres importants
pour le site en cours de configuration, notamment :

- La version de PHP utilisée par le dit site web.
- La configuration de HTTPS pour sécuriser le dit site web.
- Et d'autres paramètres avancés.

![Infomaniak - Tableau de bord du site web](./images/infomaniak-web-04-website-dashboard.png)

Commencez par accéder aux paramètres avancés du site web en cliquant sur le
bouton **Gérer** dans la section **Domaine principal** :

![Infomaniak - Accéder aux paramètres avancés](./images/infomaniak-web-05-access-advanced-parameters.png)

Vous accédez aux paramètres avancés du site web :

![Infomaniak - Paramètres avancés du site web](./images/infomaniak-web-06-advanced-parameters.png)

Puis, sélectionnez la version de PHP à utiliser pour le site web dans l'onglet
**PHP | Apache**.

Nous vous recommandons d'utiliser la dernière version disponible de PHP :

![Infomaniak - Choisir la version de PHP](./images/infomaniak-web-07-choose-php-version.png)

Terminez la configuration du site web en sauvegardant les modifications.

Tentez d'accéder au site web en utilisant votre navigateur web en vous rendant à
l'adresse du nom de domaine que vous avez choisi lors de la commande de
l'hébergement web. Vous devriez voir une page par défaut d'Infomaniak :

![Infomaniak - Page par défaut](./images/infomaniak-web-08-default-page.png)

Votre site web est maintenant configuré et prêt à être utilisé !

### Exercice 4 - Accéder à l'hébergement web via FTP/SFTP

Afin de transférer les fichiers de votre application PHP vers l'hébergement web,
vous devez utiliser un client FTP/SFTP comme FileZilla (Windows/Linux) ou
Cyberduck (macOS).

Commencez par télécharger et installer un client FTP/SFTP si vous n'en avez pas
encore un :

- [FileZilla (client)](https://filezilla-project.org/) (Windows/Linux)
- [Cyberduck](https://cyberduck.io/) (macOS)

Une fois le client FTP/SFTP installé, vous devez récupérer les informations de
connexion fournies par Infomaniak pour vous connecter à l'hébergement web via
FTP/SFTP.

Accédez à la page dédiée aux accès FTP/SFTP dans le tableau de bord de
l'hébergement web (**attention, nous parlons du tableau de bord de l'hébergement
web et non du tableau de bord du site spécifique au sein de l'hébergement web**)
en allant dans la section **FTP / SSH** :

![Infomaniak - Accéder aux accès FTP/SFTP](./images/infomaniak-ftp-01-access-ftp-ssh.png)

Un utilisateur par défaut est créé pour accéder à l'hébergement web. Vous pouvez
utiliser l'utilisateur par défaut en lui attribuant un mot de passe en cliquant
sur le bouton trois points à droite de l'utilisateur > **Modifier** :

![Infomaniak - Modifier l'utilisateur FTP/SFTP](./images/infomaniak-ftp-02-modify-ftp-user.png)

Définissez un mot de passe sécurisé pour l'utilisateur FTP/SFTP. Notez-le
quelque part, vous en aurez besoin pour vous connecter à l'hébergement web plus
tard :

![Infomaniak - Définir le mot de passe de l'utilisateur FTP/SFTP](./images/infomaniak-ftp-03-set-ftp-user-password.png)

Une fois le mot de passe défini, vous pouvez utiliser les informations de
connexion fournies par Infomaniak pour vous connecter à l'hébergement web via
FTP/SFTP. Récupérez l'adresse du serveur dans le menu **FTP / SSH** :

![Infomaniak - Récupérer l'adresse du serveur FTP/SFTP](./images/infomaniak-ftp-04-get-ftp-server-address.png)

Ouvrez ensuite votre client FTP/SFTP et créez une nouvelle connexion en
utilisant les informations suivantes :

- Hôte : l'adresse du serveur que vous avez récupérée dans le tableau de bord de
  l'hébergement web.
- Nom d'utilisateur : le nom d'utilisateur que vous avez défini ou l'utilisateur
  par défaut.
- Mot de passe : le mot de passe que vous avez défini pour l'utilisateur
  FTP/SFTP.
- Port : laissez vide pour utiliser le port par défaut (21 pour FTP, 22 pour
  SFTP - le port 22 est recommandé).

Tentez de vous connecter à l'hébergement web. Si la connexion est réussie, vous
devez voir la structure de fichiers de l'hébergement web dans votre client
FTP/SFTP :

> [!NOTE]
>
> Il se peut que vous receviez un avertissement de sécurité lors de la première
> connexion via SFTP. Cela est normal, car le client FTP/SFTP ne reconnaît pas
> encore le certificat du serveur. Acceptez l'avertissement pour continuer.

![Infomaniak - Connexion réussie via FTP/SFTP](./images/infomaniak-ftp-05-successful-ftp-connection.png)

L'interface de votre client FTP/SFTP peut varier en fonction du logiciel que
vous utilisez. Néanmoins, ils partagent tous une structure similaire avec deux
panneaux principaux :

- Le panneau de gauche affiche les fichiers locaux (sur votre ordinateur)
- Le panneau de droite affiche les fichiers distants (sur l'hébergement web).

Les fichiers peuvent ainsi être transférés entre les deux panneaux en les
glissant-déposant ou en utilisant les boutons de transfert. Cela permet de
transférer les fichiers vers et depuis l'hébergement web.

Par défaut, vous arrivez dans le répertoire racine de l'utilisateur FTP/SFTP.
Pour accéder aux fichiers du site web, vous devez naviguer dans le répertoire
`sites/<nom de domaine>`, où `<nom de domaine>` est le nom de domaine que vous
avez choisi lors de la commande de l'hébergement web :

![Infomaniak - Naviguer vers le répertoire du site web](./images/infomaniak-ftp-06-navigate-to-website-directory.png)

Ce dossier contient les fichiers du site web spécifique associé à l'hébergement
web. C'est ici que vous devez transférer les fichiers de votre application PHP
afin de mettre à jour votre site web.

Créez un dossier `backup` dans le répertoire du site web (à l'aide du clic-droit
dans FileZilla ou Cyberduck, puis en sélectionnant l'option pour créer un
nouveau dossier). Ensuite, déplacez tous les fichiers et dossiers existants dans
ce dossier `backup`. Cela vous permettra de conserver une copie de sauvegarde
des fichiers par défaut d'Infomaniak au cas où vous en auriez besoin plus tard.

### Exercice 5 - Déployer une application PHP simple avec SQLite

Transférez maintenant les fichiers de l'exemple `01-site-web-simple-avec-sqlite`
des exemples de code disponibles ici :
[Exemples de code](../02-exemples-de-code/01-site-web-simple-avec-sqlite/).

Pour cela, glissez-déposez les fichiers depuis le panneau de gauche (fichiers
locaux) vers le panneau de droite (fichiers distants) dans votre client
FTP/SFTP. Les fichiers doivent être placés directement dans le répertoire du
site web (et non dans un sous-dossier) :

![Infomaniak - Transférer les fichiers de l'application PHP simple avec SQLite](./images/infomaniak-simple-php-sqlite-01-upload-files.png)

Accédez ensuite à l'adresse du nom de domaine que vous avez choisi lors de la
commande de l'hébergement web. Vous devriez voir l'application PHP d'exemple
fonctionnelle :

![Infomaniak - Application PHP déployée](./images/infomaniak-simple-php-sqlite-02-deployed-application.png)

Bravo ! Vous avez déployé avec succès une application PHP simple sur
l'hébergement web d'Infomaniak !

Créez un nouvel utilisateur en utilisant le formulaire de l'application. Vous
devriez voir le nouvel utilisateur apparaître dans la liste des utilisateurs et
vous assurez que toute l'application fonctionne correctement.

Rafraîchissez l'hébergeur web dans votre client FTP/SFTP. Vous devriez voir un
nouveau fichier `mydatabase.db` dans le répertoire du site web. Ce fichier
contient la base de données SQLite utilisée par l'application PHP pour stocker
les données des utilisateurs :

![Infomaniak - Fichier de la base de données SQLite](./images/infomaniak-simple-php-sqlite-03-database-file.png)

Dans votre navigateur web, essayez d'accéder au fichier `mydatabase.db` en
utilisant l'URL suivante : `http://<votre-nom-de-domaine>/mydatabase.db`. Le
téléchargement de la base de données devrait se lancer.

Cela signifie que le fichier de la base de données est accessible publiquement,
ce qui n'est pas sécurisé. N'importe qui peut télécharger ce fichier et accéder
aux données des utilisateurs.

Nous corrigerons ce problème de sécurité dans un exercice ultérieur.

Supprimez les trois fichiers de l'application PHP (`index.php`, `create.php` et
`mydatabase.db`) dans votre client FTP/SFTP pour nettoyer l'hébergement web.

### Exercice 6 - Accéder à la base de données MySQL/MariaDB

Avant de pouvoir utiliser une base de données MySQL/MariaDB avec votre
application PHP, vous devez créer une base de données dans le tableau de bord de
l'hébergement web.

Accédez à la page dédiée aux bases de données dans le tableau de bord de
l'hébergement web en allant dans la section **Base de données** :

![Infomaniak - Accéder aux bases de données](./images/infomaniak-mariadb-01-access-databases.png)

Créez une nouvelle base de données en cliquant sur le bouton **Ajouter une base
de données** :

![Infomaniak - Ajouter une base de données](./images/infomaniak-mariadb-02-add-database.png)

Remplissez le formulaire pour créer une nouvelle base de données. Choisissez un
nom pour la base de données :

![Infomaniak - Formulaire de création de la base de données](./images/infomaniak-mariadb-03-create-database-form-database.png)

Créez également un nouvel utilisateur avec un mot de passe sécurisé. Notez ces
informations quelque part, vous en aurez besoin pour configurer votre
application PHP plus tard :

![Infomaniak - Formulaire de création de la base de données](./images/infomaniak-mariadb-04-create-database-form-user.png)

Donnez tous les droits à l'utilisateur sur la base de donnée :

![Infomaniak - Formulaire de création de la base de données](./images/infomaniak-mariadb-05-create-database-form-roles.png)

Validez la création de la base de données :

![Infomaniak - Base de données créée](./images/infomaniak-mariadb-06-create-database-form-validation.png)

La base de données est maintenant créée. Vous pouvez voir les informations de
connexion à la base de données dans le tableau de bord de l'hébergement web.
Vous en aurez besoin pour configurer votre application PHP plus tard :

![Infomaniak - Informations de connexion à la base de données](./images/infomaniak-mariadb-07-database-created.png)

Vous pouvez vous connecter à la base de données grâce à l'outil phpMyAdmin
fourni par Infomaniak. Cliquez sur le bouton **phpMyAdmin** pour accéder à
l'outil phpMyAdmin et saisissez les informations de connexion à la base de
données que vous avez notées précédemment.

### Exercice 7 - Déployer une application PHP simple avec MySQL/MariaDB

Récupérez maintenant les fichiers de l'exemple `02-site-web-simple-avec-mariadb`
des exemples de code disponibles ici :
[Exemples de code](../02-exemples-de-code/02-site-web-simple-avec-mariadb/).

Copiez le fichier `database.ini.example` en `database.ini.example`. Insérez-y
les informations de connexion à la base de données que vous avez notées
précédemment :

```ini
host = "<adresse-du-serveur-mariadb>"
port = 3306
dbname = "<nom-de-la-base-de-donnees>"
username = "<nom-de-l-utilisateur>"
password = "<mot-de-passe-de-l-utilisateur>"
```

Votre fichier de configuration devrait ressembler à ceci (avec vos propres
informations de connexion) :

```ini
host = "oz45o8.myd.infomaniak.com"
port = 3306
database = "oz45o8_heig_vd_progserv_course"
username = "oz45o8_ludelafo"
password = "********************"
```

Une fois le fichier `database.ini` modifié, vous pouvez transférer les fichiers
de l'exemple `02-site-web-simple-avec-mariadb` vers l'hébergement web
d'Infomaniak.

Pour cela, glissez-déposez les fichiers depuis le panneau de gauche (fichiers
locaux) vers le panneau de droite (fichiers distants) dans votre client
FTP/SFTP. Les fichiers doivent être placés directement dans le répertoire du
site web (et non dans un sous-dossier) :

![Infomaniak - Transférer les fichiers de l'application PHP simple avec MySQL/MariaDB](./images/infomaniak-simple-php-mariadb-01-upload-files.png)

Accédez ensuite à l'adresse du nom de domaine que vous avez choisi lors de la
commande de l'hébergement web. Vous devriez voir l'application PHP d'exemple
fonctionnelle comme pour l'exemple précédent.

Si une exception est levée, vérifiez que les informations de connexion à la base
de données dans le fichier `database.ini` sont correctes. Si les informations
sont incorrectes, une exception sera levée lors de la tentative de connexion à
la base de données :

![Infomaniak - Application PHP déployée avec erreur de connexion à la base de données](./images/infomaniak-simple-php-mysql-02-deployed-application-with-database-error.png)

Si aucune exception n'est levée, vous devriez voir l'application PHP
fonctionnelle.

Bravo ! Vous avez déployé avec succès une application PHP simple utilisant
MySQL/MariaDB sur l'hébergement web d'Infomaniak !

Assurez-vous que toute l'application fonctionne correctement en créant un nouvel
utilisateur en utilisant le formulaire de l'application. Vous devriez voir le
nouvel utilisateur apparaître dans la liste des utilisateurs.

Vous pouvez également vérifier que la table `users` a bien été créée dans la
base de données en utilisant l'outil phpMyAdmin fourni par Infomaniak :

![Infomaniak - Table users dans la base de données](./images/infomaniak-simple-php-mysql-03-users-table-in-database.png)

A nouveau, si vous tentez de télécharger le fichier `database.ini` en utilisant
l'URL suivante : `http://<votre-nom-de-domaine>/database.ini`, le téléchargement
du fichier devrait se lancer, ce qui signifie que le fichier de configuration
est accessible publiquement. Cela n'est pas sécurisé, car le fichier contient
des informations sensibles (nom d'utilisateur et mot de passe de la base de
données). Il faudra à tout prix corriger ce problème de sécurité dans un
exercice ultérieur.

Supprimez les trois fichiers de l'application PHP (`index.php`, `create.php` et
`database.ini`) dans votre client FTP/SFTP pour nettoyer l'hébergement web.

### Exercice 8 - Sécuriser l'application PHP

Afin de sécuriser l'application PHP, vous devez empêcher l'accès direct aux
fichiers sensibles tels que la base de données SQLite (`mydatabase.db`) ou le
fichier de configuration de la base de données MySQL/MariaDB (`database.ini`).

Récupérez les fichiers de l'exemple `03-site-web-securise-avec-mysql` des
exemples de code disponibles ici :
[Exemples de code](../02-exemples-de-code/03-site-web-securise-avec-mysql/).

Copiez le fichier `src/config/database.ini.example` en
`src/config/database.ini`. Insérez-y les informations de connexion à la base de
données que vous avez notées précédemment :

```ini
host = "<adresse-du-serveur-mariadb>"
port = 3306
dbname = "<nom-de-la-base-de-donnees>"
username = "<nom-de-l-utilisateur>"
password = "<mot-de-passe-de-l-utilisateur>"
```

Transférez ensuite les fichiers de l'exemple `03-site-web-securise-avec-mysql`
vers l'hébergement web d'Infomaniak.

Tentez d'accéder à l'application PHP en utilisant l'adresse du nom de domaine
que vous avez choisi lors de la commande de l'hébergement web. Vous devriez voir
l'application PHP d'exemple fonctionnelle comme pour les exemples précédents.

Si vous tentez de télécharger le fichier `src/config/database.ini` en utilisant
l'URL suivante : `http://<votre-nom-de-domaine>/src/config/database.ini`, vous
devriez recevoir une erreur 403 (Interdit). Cela signifie que le fichier de
configuration n'est plus accessible publiquement, ce qui est sécurisé.

Tout accès en dehors du dossier `public` est interdit par la configuration du
serveur web d'Infomaniak grâce au fichier `.htaccess` placé à la racine du site
web.

Un fichier `.htaccess` est un fichier de configuration utilisé par le serveur
web Apache pour définir des règles spécifiques pour un répertoire donné. Dans
notre cas, nous utilisons un fichier `.htaccess` pour rediriger toutes les
requêtes vers le dossier `public`, où se trouvent les fichiers accessibles
publiquement de notre application PHP.

Ce fichier `.htaccess` contient les règles suivantes :

> [!WARNING]
>
> Je (Ludovic) ne suis pas un expert en configuration de serveur web Apache. Les
> règles suivantes fonctionnent pour notre cas d'utilisation, mais elles peuvent
> ne pas être optimales pour d'autres cas d'utilisation. N'hésitez pas à
> consulter la documentation officielle d'Apache pour plus d'informations :
> <https://httpd.apache.org/docs/current/howto/htaccess.html>.

```apache
# Active le moteur de réécriture d'URL.
# Permet de rediriger les requêtes vers d'autres emplacements.
RewriteEngine On

# Si le fichier ou le répertoire demandé existe dans /public, ne pas réécrire le chemin d'accès (tout ce qui est dans /public reste accessible).
RewriteCond %{DOCUMENT_ROOT}/public/$1 -f [OR]
RewriteCond %{DOCUMENT_ROOT}/public/$1 -d

# Tout le reste des requêtes est redirigé vers /public en masquant /public dans l'URL.
RewriteRule ^(.*)$ public/$1 [L]
```

Cela signifie que seuls les fichiers et répertoires situés dans le dossier
`public` sont accessibles publiquement. Tous les autres fichiers et répertoires,
y compris les fichiers sensibles comme `database.ini`, sont protégés et ne
peuvent pas être accédés directement via une URL.

La dernière étape pour sécuriser l'application PHP est de mettre en place la
connexion HTTPS pour chiffrer les communications entre le navigateur web et le
serveur web.

Lorsque vous accédez à l'application PHP en utilisant l'adresse du nom de
domaine, vous avez peut-être remarqué que l'URL commence par `http://` au lieu
de `https://`. Cela signifie que la connexion n'est pas sécurisée. Votre
navigateur web peut afficher un avertissement indiquant que la connexion n'est
pas sécurisée à l'aide d'un message ou d'un cadenas barré :

![Infomaniak - Connexion non sécurisée](./images/infomaniak-ssl-01-insecure-connection.png)

Pour activer HTTPS, vous devez configurer un certificat SSL pour votre nom de
domaine. Infomaniak fournit gratuitement des certificats SSL via Let's Encrypt,
un service de certification gratuit et automatisé.

Accédez au tableau de bord du site web dans le portail d'Infomaniak. Dans la
section **Certificat SSL**, cliquez sur le bouton **Configurer**.

![Infomaniak - Accéder à la configuration du certificat SSL](./images/infomaniak-ssl-02-access-ssl-configuration.png)

Cliquez ensuite sur le bouton **Installer un certificat** pour commencer la
configuration du certificat SSL :

![Infomaniak - Installer un certificat SSL](./images/infomaniak-ssl-03-install-ssl-certificate.png)

Sélectionnez l'option **Let's Encrypt** pour utiliser un certificat SSL gratuit
fourni par Let's Encrypt :

![Infomaniak - Choisir Let's Encrypt](./images/infomaniak-ssl-04-choose-lets-encrypt.png)

Sélectionnez les noms de domaine pour lesquels vous souhaitez activer le
certificat SSL. Assurez-vous de sélectionner le nom de domaine principal ainsi
que le sous-domaine `www` :

![Infomaniak - Sélectionner les noms de domaine pour le certificat SSL](./images/infomaniak-ssl-05-select-domains-for-ssl-certificate.png)

Validez la configuration du certificat SSL. Infomaniak va maintenant générer et
installer le certificat SSL pour votre nom de domaine. Ce processus peut prendre
quelques minutes :

> [!NOTE]
>
> Si vous avez récemment modifié les enregistrements DNS de votre nom de
> domaine, il se peut que le processus de validation du certificat SSL échoue.
> Assurez-vous que les enregistrements DNS sont correctement configurés et
> attendez quelques heures avant de réessayer.

![Infomaniak - Certificat SSL installé](./images/infomaniak-ssl-06-ssl-certificate-installed.png)

Rafraîchissez la page du site web dans votre navigateur web. Vous devriez
maintenant voir que l'URL commence par `https://` et que le cadenas vert indique
que la connexion est sécurisée :

![Infomaniak - Connexion sécurisée](./images/infomaniak-ssl-07-secure-connection.png)

Bravo ! Vous avez sécurisé votre application PHP en protégeant les fichiers
sensibles et en activant HTTPS.

Vous avez maintenant toutes les compétences nécessaires pour déployer et
sécuriser une application PHP sur un hébergement web tel que celui d'Infomaniak.

### Exercice 9 - Effectuer la demande de remboursement auprès de la HEIG-VD

Afin d'obtenir le remboursement du nom de domaine que vous avez acheté pour
votre hébergement web, vous devez effectuer une demande de remboursement auprès
de la HEIG-VD. Pour cela, vous devez obtenir la facture au format PDF attestant
de l'achat du nom de domaine (voir ci-après).

Pour cela, vous pouvez vous rendre dans **Comptabilité** > **Commande** dans le
portail d'Infomaniak :

![Infomaniak - Accéder aux commandes](./images/infomaniak-accounting-03-access-orders.png)

Puis cliquer sur le bouton **Facture** pour télécharger la facture au format PDF
:

![Infomaniak - Télécharger la facture](./images/infomaniak-accounting-04-download-invoice.png)

Une fois la facture téléchargée, vous pouvez effectuer la demande de
remboursement auprès de la HEIG-VD en passant au secrétariat COMEM+ de la
HEIG-VD ou en leur envoyant un e-mail. Vous devez fournir les informations
suivantes dans votre demande de remboursement :

- Votre nom et prénom.
- La facture au format PDF attestant de l'achat du nom de domaine.
- Indiquez que l'achat a été effectué dans le cadre du programme étudiant
  d'Infomaniak pour le cours de Programmation Serveur 2 (ProgServ2).
- Vos coordonnées bancaires (IBAN) ou votre numéro de téléphone pour le
  remboursement via TWINT.

Le secrétariat COMEM+ traitera votre demande de remboursement et vous
remboursera le montant du nom de domaine sur votre compte bancaire ou via TWINT.

### Exercice 10 - Renouveler/révoquer le programme étudiant d'Infomaniak

> [!CAUTION]
>
> Suivez ces étapes uniquement une fois que l'année d'hébergement web est
> terminée !

Le programme étudiant d'Infomaniak est valable pour une année. Il est possible
de le renouveler pour une année supplémentaire si vous êtes toujours étudiant.e
à la HEIG-VD :

![Programme étudiant d'Infomaniak - Renouveler le programme étudiant](./images/infomaniak-student-program-08-renew-student-status.png)

Si vous n'êtes plus étudiant.e, l'offre sera automatiquement révoquée mais il
est nécessaire de s'assurer que le renouvellement automatique du nom de domaine
et de l'hébergement web a bien été désactivé (voir ci-dessus).

Une fois le programme étudiant terminé, les frais supplémentaires seront à votre
charge.

> [!CAUTION]
>
> N'oubliez pas de renouveler/révoquer le nom de domaine et l'hébergement web à
> la fin de la première année pour éviter des frais dans le futur.

[licence]:
	https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/main/LICENSE.md
