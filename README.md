# FirstCrudG2

## Installation 

Installation de la dernière version stable avec les dépendances courantes pour un site web

    symfony new FirstCrudG2 --webapp
    cd FirstCrudG2

### Mise à jour de composer

    composer update

### Lancement du serveur

    symfony serve -d

https://127.0.0.1:8000

### Création d'un contrôleur

    php bin/console make:controller HomeController

2 fichiers sont créés, le contrôleur et sa vue :

    created: src/Controller/HomeController.php
    created: templates/home/index.html.twig

Pour voir le chemin généré pour le contrôleur

    php bin/console debug:route

Pour voir le détail du chemin généré pour le contrôleur

    php bin/console debug:route

Pour le fichier

```php
<?php
#src/Controller/HomeController.php

# ...
    #[Route('/home', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
# ...
```

On souhaite avoir cette page comme accueil réel de notre site

```php
<?php
#src/Controller/HomeController.php

# ...
    #[Route('/', name: 'homepage')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'titre' => 'homepage',
        ]);
    }
# ...
```

Et le template

```twig
{% extends 'base.html.twig' %}

{% block title %}{{ titre }}{% endblock %}

{% block body %}
<div class="container">
    <h1>{{ titre }}</h1>
</div>
{% endblock %}

```

### Création d'une entité

    php bin/console make:entity Article

    created: src/Entity/Article.php
    created: src/Repository/ArticleRepository.php

Le premier fichier sera le "mapping - DTO" d'une donnée, le deuxième sera un Manager

### Création du fichier de configuration

On va copier le fichier `.env` en `.env.local` :

    cp .env .env.local

Puis on va modifier la clef secrète

```env
# .env.local

APP_SECRET=VotreVraiClefSecrete
```