# PHP MVC :: Exemple de développement OO et MVC avec PHP

Date | Reviewed | Purpose | Discipline | Example
---- | -------- | ------- | ---------- | -------
2018.06 | 2021.12 | Pedagogy | PHP | [PHP-MVC](https://demo.elodiebayet.com/php-mvc)


## **Avant-propos**

Le but n'est pas de fournir publiquement un _modèle_ ou un _template_ intégrable, mais bien de montrer **comment développer quelque chose de similaire** en se servant de ce projet comme exemple de départ. Il n'y aura pas de _versions ultérieures_, ce projet ne va pas _évoluer_ – sauf corrections bugs, erreurs, coquilles laissés par mégarde.

---

## Sommaire 
0. [Présentation](#0---présentation)
    * [0.0 - Objectifs](#00---objectifs)
    * [0.1 - Contenu](#01---contenu)
    * [0.2 - Évolution](#02---évolution)
    * [0.3 - Utilisation](#03---utilisation)
1. [Démarrage](#1---démarrage)
    * [1.0 - Prérequis](#10---prérequis)
    * [1.1 - Configuration](#11---configuration)
2. [Structure](#2---structure)
    * [2.0 - Architecture SEO](#20---architecture-seo)
    * [2.1 - Dossiers et fichiers](#21---dossiers-et-fichiers)
    * [2.2 - Base de données](#22---base-de-données)
3. [Méthodologie](#3---méthodologie)
    * [3.0 - Développement](#3.0---développement)
4. [Remarques](#4---remarques)

---

## 0 - Présentation 

Exemple de développement d'un site web en **vanilla PHP** à travers l'architecture **Model-View-Controller** et le paradigme **Orienté Objet**. 


### 0.0 - Objectifs

- Apprendre la résolution d'un système de routage en PHP
- Découvrir l'architecture **Model-View-Controller** et la **Programmation Orientée Objets**
- Observer une structure et une organisation de fichiers pertinentes


### 0.1 - Contenu

Le thème employé est celui des **Design Patterns**. Cette application étant une simple démonstration de développement, elle n'a pas pour vocation de présenter un contenu absolument complet, et peut se montrer très approximative sur certains points. Les sources principales *– et uniques –* des informations présentées ne sont autres que la page **[Wikibooks : Patrons de Conception](https://fr.wikibooks.org/wiki/Patrons_de_conception)** et la page **[Wikipédia : Patron de conception](https://fr.wikipedia.org/wiki/Patron_de_conception)**.


### 0.2 - Évolution

Sauf un quelconque défaut laissé par mégarde, ce projet ne doit pas évoluer vers une modélisation plus avancée. Il constitue **une ressource pédagogique** de base destinée à l'apprentissage de concepts parfois obscurs pour des néophytes.


### 0.3 - Utilisation

Ce projet n'est utilisable que dans un cadre d'apprentissage individuel et privé. Il ne convient pas pour une utilisation publique ou professionnelle.

#### Images

Certaines images employées dans ce projet – sauf celles listées dans **"Exceptions"** – sont soumises aux droits d'auteur et protégées par la [Sofam](https://www.sofam.be/) – auteure n° 72/55. Aucune reproduction, communication publique, réutilisation partielle ou entière des images **n'est autorisée**.

#### Exceptions

* les logos des technologies employés sur la page _Informations_.

---

## 1 - Démarrage

Le projet requiert quelques éléments pour fonctionner et une configuration minimum.

### 1.0 - Prérequis

* Un serveur Web local tel que **[Wamp](https://www.wampserver.com/)** – ou [Xampp](https://www.apachefriends.org/fr/index.html), ou [Mamp](https://www.mamp.info/en/downloads/), ou [Easy-PHP](https://www.easyphp.org/), etc.
* PHP > 7.1
* Un Virtual Host, à mettre en place selon la procédure décrite dans la documentation du Server Web local. **Le nom du Virtual Host ou du dossier n'a aucune importance** puisque seul le _path_ de chaque requête entre en jeu.
* Un système de gestion de base de données en SQL tel que **MySQL** – ou MariaDB, ou PostgreSQL, etc. Lequel est généralement inclu avec le pack de serveur web local.

### 1.1 - Configuration

#### Le .htaccess

Ce fichier doit être placé à la racine du dossier de ce projet. Le code ci-dessous est suffisemment efficace pour ce type de projet.
```htaccess
# Active la ré-écriture
RewriteEngine on

# Éviter les requêtes des ressources embarquées (où se trouvent les .css, .js, .jpg, etc.)
RewriteCond %{REQUEST_URI} !^/(public|assets)/.*$

# Éviter les requêtes de fichiers clairement ciblés et résolvables
RewriteCond %{REQUEST_FILENAME} !-f

# Rediriger les requêtes vers le point d'entrée de l'application
RewriteRule . /index.php [QSA,L]
```

#### La base de données

Le fichier `phpmvc_db.sql` est à charger dans un système de gestion de bases de données en SQL. Ensuite les constantes de connexion doivent être mises à jour en fonction des paramètres environnementaux dans le fichier `core/constants.php`.
```php
const DATABASE = [
    'pilot'         => 'mysql',
    'host'          => '127.0.0.1',
    'port'          => '3306',
    'dbname'        => 'phpmvc',
    'charset'       => 'utf8mb4',
    'user'          => 'root',
    'password'      => ''
];
```

---

## 2 - Structure

Chaque partie observe une structure spécifique. Laquelle est utile à découvrir pour mieux comprendre le projet et sa résolution.


### 2.0 - Architecture SEO

#### URIs

* Design Patterns :: `/`
* Gang Of Four :: `/gang-of-four`
* Patrons :: `/patron`
    - Model-View-Controller :: `./model-view-controller`
    - Model-View-VueModel :: `./model-view-viewmodel`
    - Model-View-Presentation :: `./model-view-presentation`
* Informations :: `/info`

#### Schéma

![Website Tree](/assets/fig/architecture_seo.jpg)


### 2.1 - Dossiers et fichiers

Il n'y a aucune _librairie tierce_ dans ce projet.

* `assets/` images, icônes, logos, etc.
* `core/` code source métier de l'application
    - `Error/`
        - `Controller/`
        - `View/`
        - `Error.php`
    - `GangOfFour/`
        - `Controller/`
        - `View/`
        - `GangOfFour.php`
    - `Home/`
        - `Controller/`
        - `View/`
        - `Home.php`
    - `Info/`
        - `Controller/`
        - `View/`
        - `Home.php`
    - `Patron/`
        - `Controller/`
        - `Model/`
        - `View/`
        - `Patron.php`
    - `Template/` fichiers communs de vue
        - `Layout.php`
        - `Menu.php`
    - `constants.php` fichiers sur lesquels le code source métier s'appuie
* `lib/` librairies de services
    - `phpmvc/` classes de services propres à l'application elle-même
* `public/` code source frontend
    - `css/`
    - `js/`
* `_manifest.json` en guise d'exemple (optionnel), à préfixer avec le nom de l'application
* `.htaccess` configuration des requêtes entrantes
* `index.php` point d'entrée de l'application
* `unavailable.php` destination en cas d'erreur de programme


### 2.2 - Base de données

#### Entités

![Patron entity](/assets/fig/patron_entity.jpg)

---

## 3 - Méthodologie

Cet exemple répond à un fonctionnement basique de traitements Back-End en PHP. Le principe est donc de capter des requêtes, d'analyser leurs destinations, d'exploiter le traitement associé, et de construire une réponse.

Dans cet exemple, certains traitements ont été volontairement écarté sans quoi ce projet serait beaucoup trop volumineux. Entre autres, les traitements suivants :
* Les requêtes d'insertions, de modifications ou de suppressions de données
* Les requêtes désynchronisées – AJAX
* Les autres formats de réponse – tels que le JSon ou l'XML
* L'exploitation des parties _scheme_, _user_, _password_, _host_, _query_ et _fragment_ d'une URL standard
* Le contrôle de formulaire (aucun n'est d'ailleurs présent)


### 3.0 - Développement

En Orienté objet, _tout_ est objet. Et selon les principes de l'architecture MVC, un contrôleur capte une "demande" utilisateur, opère un traitement sur le modèle – si lieu – puis notifie la vue qui est alors "mise à jour".

Pour une application Web plus conséquente, quelque éléments additionnels entrent en jeu. 

#### Décomposition

Tous ces objets – ces classes – doivent être classés convenablement. Il y a donc :
* un répertoire `core/`, lequel contient les sous-répertoires "métiers", avec à chaque fois un dossier `Controller`, un dossier `View`, et le cas échéant, un dossier `Model`, comme préconisés par l'architecture MVC ;
* un répertoire `lib/phpmvc`, lequel contient les classes générales, celles qui sont utilisées à chaque requêtes – pratiquement.

#### Traitement

Le fichier `.htaccess` redirige chaque requête vers une **stratégie principale** – cf. catégorie _“Gang of Four”_ › _Strategie_ › _Comportement_. Cette **stratégie principale** est mise en place par la classe `phpmvc\Process` qui s'occupe de trouver le contrôleur approprié en mettant en relation la requête et les **managers** répartis à la racine de chaque "métier". 

Ces **managers** font office de _router_. Ils consituent une sorte de "sous-stratégie" sous forme d'objet composite – cf. catégorie _“Gang of Four”_ › _Structure_ › _Objet Composite_ – régit par un objet parent, la classe `phpmvc\Manager`. Chacun d'eux s'utilise donc de la même manière par la **stratégie principale**.

Chaque section "métier" organise ses fichiers en fonction de leur tâche. Les fichiers de **Vues** ne contiennent que du HTML avec des espaces _variables_ réservés aux données. Les contrôleurs, eux, sont également des "objets composites" qui fonctionnent tous de la même manière puisqu'ils sont régit par la classe `phpmvc/Controller`. Un contrôleur fait office "d'observateur" – cf. catégorie _“Gang of Four”_ › _Comportement_ › _Observateur_ –, il en faut donc **un pour chaque requête**. 

Dans le cas où interviennent des données issues de la base de données, une classe de "modèle métier" sert à encapsuler les requêtes SQL et la connexion à la base de données en exploitant la classe générale `phpmvc/Repository`. Dans cet exemple, **une classe d'entité** est également prévue pour représenter les **champs de la base de données sous formes de propriétés d'objets** – technique du `PDO::FETCH_CLASS` dans les [Fetch Modes](https://phpdelusions.net/pdo/fetch_modes).

#### Résolution

En définitive, chaque requête abouti sur un contrôleur qui charge une vue, le layout de la page, et construit une réponse à renvoyer au _client_. L'erreur _400 - Bad Request_ et l'erreur _404 - Not found_ fonctionnent de la même manière que les autres requêtes. Dans le cas où aucune réponse ne pourrait être construite, c'est une redirection vers le fichier statique `unavailable.php` qui prend le relait. Cela signifierait qu'une erreur se cache dans la logique du traitement, et qu'il faut corriger le code source.

---

## 4 - Remarques

(R.A.S)