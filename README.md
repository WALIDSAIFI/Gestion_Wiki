# Wiki Content Management System (CMS)

## Contexte du projet

Wiki a besoin d'un système de gestion de contenu efficace, associé à un front office intuitif, pour offrir une expérience utilisateur optimale. Ce système permet aux administrateurs de gérer facilement les catégories, les tags et les wikis, tandis que les auteurs peuvent créer, modifier et supprimer leur contenu.

L'objectif principal est de fournir un espace collaboratif où tout le monde peut créer, rechercher et partager des wikis de manière simple et interactive.

## Fonctionnalités clés

### Partie Back Office

- **Gestion des Catégories** : Les administrateurs peuvent créer, modifier et supprimer des catégories pour organiser les wikis.
- **Gestion des Tags** : Les administrateurs peuvent ajouter, modifier et supprimer des tags, facilitant la recherche et le regroupement du contenu.
- **Inscription des Auteurs** : Les auteurs peuvent s'inscrire avec des informations de base pour créer des wikis.
- **Gestion des Wikis** : Les auteurs peuvent créer, modifier et supprimer leurs wikis, avec des options d'ajout de catégories et de tags. Les administrateurs peuvent archiver des wikis inappropriés.
- **Dashboard (Tableau de bord)** : Un tableau de bord affiche les statistiques des entités gérées par le système.

### Partie Front Office

- **Login et Register** : Les utilisateurs peuvent créer un compte ou se connecter. Les administrateurs sont redirigés vers le tableau de bord, tandis que les auteurs sont redirigés vers la page d'accueil.
- **Barre de Recherche** : Une barre de recherche AJAX permet de rechercher des wikis, catégories et tags en temps réel.
- **Affichage des Derniers Wikis** : La page d'accueil affiche les derniers wikis ajoutés.
- **Affichage des Dernières Catégories** : Les catégories récentes sont également mises en avant sur la plateforme.
- **Page Détail des Wikis** : Chaque wiki peut être consulté en détail, avec des informations sur l'auteur, les tags et la catégorie associée.

## Technologies Utilisées

- **Frontend** : HTML5, CSS (Framework Bootstrap), JavaScript (AJAX)
- **Backend** : PHP 8 avec architecture MVC
- **Base de données** : MySQL avec PDO Driver

### Bonus

- **Upload d'Images** : Les auteurs peuvent uploader des images pour enrichir leurs wikis.
- **Architecture MVC** : Un système de routage et autoload est utilisé pour organiser le code en classes avec des namespaces.

## Installation

1. Cloner le dépôt GitHub :

    ```bash
    git clone https://github.com/utilisateur/projet-wiki.git
    cd projet-wiki
    ```

2. Configurer la base de données en utilisant le fichier `database.sql` fourni dans le dépôt.
   
3. Configurer les informations de connexion à la base de données dans un fichier `.env` :

    ```dotenv
    DB_HOST=localhost
    DB_NAME=DB_wiki
    DB_USER=utilisateur
    DB_PASS=mot_de_passe
    ```

4. Lancer le serveur local (par exemple, avec XAMPP ou WAMP).

## Utilisation

- Accédez au Front Office via `http://localhost/projet-wiki/`.
- Pour les administrateurs, utilisez `http://localhost/projet-wiki/admin/` pour accéder au back office.

## Livrables

- Scrum board avec toutes les User Stories.
- Lien vers le dépôt GitHub : [lien_du_repository](https://github.com/WALIDSAIFI/projet-wiki)
- Diagrammes UML :
    - Diagramme de classes
    - Diagramme de cas d'utilisations


## Critères de Performance

1. **Planification des tâches** : Utilisation d’un outil de gestion des tâches comme Jira ou Trello.
2. **Commits journaliers** : Les commits doivent être faits quotidiennement pour assurer la traçabilité.
3. **Design Responsive** : Le site doit s'adapter aux différents écrans.
4. **Validation des formulaires** : Validation côté client avec HTML5 et JavaScript, et côté serveur pour éviter les attaques CSRF et XSS.
5. **Séparation des responsabilités (MVC)** : La logique métier, l'interface et le traitement des requêtes doivent être bien séparés.
6. **Sécurité** :
    - Utiliser des requêtes préparées pour éviter les injections SQL.
    - Échapper les données avant de les afficher pour éviter les attaques XSS.

## Auteurs

- *Développeur principal* - WALID SAIFI(https://github.com/WALIDSAIFI)


