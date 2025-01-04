# Documentation Technique du Projet IMDB

## Structure du Projet

Le projet est structuré comme suit :

```
Project2/
├── config/
│   ├── cdntailwinds.php
│   └── db.php
├── public/
│   ├── image/
│   │   └── ...
│   └── js/
│       ├── addToCart.js
│       ├── deleteFromCart.js
│       ├── navlink.js
│       └── search.js
└── src/
    ├── controller/
    │   ├── LoginController.php
    │   ├── MovieController.php
    │   └── UserController.php
    ├── model/
    │   ├── DetailsDisplay.php
    │   ├── do_cart.php
    │   ├── do_search.php
    │   ├── MovieAction.php
    │   ├── MovieDrama.php
    │   ├── MovieHome.php
    │   └── User.php
    └── view/
        ├── action.php
        ├── cart.php
        ├── details.php
        ├── drama.php
        ├── footer.php
        ├── header.php
        ├── home.php
        ├── login.php
        ├── logout.php
        └── signup.php
```



## Description des Dossiers et Fichiers

### `config/`
Contient les fichiers de configuration du projet.

- `cdntailwinds.php`: Intègre Tailwind CSS via CDN et configure le thème.
- `db.php`: Établit la connexion à la base de données MySQL avec PDO.

### `public/`
Contient les ressources publiques comme les images et les scripts JavaScript.

- `image/`: Dossier pour les images utilisées dans le projet.
- `js/`: Dossier pour les scripts JavaScript qui ajoutent des fonctionnalités interactives au site.

### `src/`
Contient le code source du projet, organisé en MVC (Modèle-Vue-Contrôleur).

#### `controller/`
Gère la logique de traitement des requêtes.

- `LoginController.php`: Gère la connexion et la déconnexion des utilisateurs.
- `MovieController.php`: Gère les opérations sur les films dans le panier.
- `UserController.php`: Gère les informations des utilisateurs.

#### `model/`
Contient les classes et méthodes pour interagir avec la base de données.

- `DetailsDisplay.php`: Affiche les détails d'un film spécifique.
- `MovieAction.php`: Récupère et affiche les films d'action.
- `MovieDrama.php`: Récupère et affiche les films dramatiques.
- `MovieHome.php`: Récupère et affiche tous les films pour la page d'accueil.
- `User.php`: Gère les actions liées aux utilisateurs.
- `do_cart.php`: Gère l'affichage et la mise à jour du panier.
- `do_search.php`: Gère la recherche de films.

#### `view/`
Contient les fichiers PHP qui génèrent l'affichage utilisateur.

- `action.php`: Page des films d'action.
- `cart.php`: Page du panier d'achats.
- `details.php`: Page de détails d'un film.
- `drama.php`: Page des films dramatiques.
- `footer.php`: Pied de page commun à toutes les pages.
- `header.php`: En-tête commun à toutes les pages.
- `home.php`: Page d'accueil du site.
- `login.php`: Page de connexion.
- `logout.php`: Script de déconnexion.
- `signup.php`: Page d'inscription.

## Conclusion

Cette documentation technique fournit une vue d'ensemble de la structure et des composants du projet IMDB.
