# **PHP & MVC**

Version | Objectif | Cadre | Démo
------- | -------- | ----- | ----
2.0 | Andragogie | Labo PHP | [PHP & MVC](https://demo.elodiebayet.com/php-mvc)


---


## Présentation

Ce projet est un support de cours qui sert d'exemple de développement en PHP à travers l'architecture **Model-View-Controller** et le paradigme **Orienté Objet**.


### Objectifs

- Résoudre un système de routage en PHP
- Respecter l'architecture Model-View-Controller et la Programmation Orientée Objets
- Se préprarer à l'apprentissage d'un Framework professionnel comme Symfony


### Exploitation

Ce projet peut être utilisé dans un cadre d'apprentissage individuel et privé. Il ne convient pas pour une utilisation publique ou professionnelle.


---


## Description

Le projet gère 2 versions linguistiques : le français et l'anglais. Les URIs et la base de données sont conçues en conséquence.


### Sitemap

```sh
"Sélection linguistique"
├── "Accueil" || "Home"
├── "Périodes" || "Périodes"
├── "Compositeurs" || "Compositors"
│   ├── "{nom}-{prenom}"
├── "À propos" || "About"
├── "Conception" || "Design"
```


### Base de données

#### Schéma entités-associations

<img src="https://demo.elodiebayet.com/php-mvc/assets/img/schema_entites-associations.jpg" width="356" height="372">

#### Schéma relationel

![Schéma relationel](https://demo.elodiebayet.com/php-mvc/assets/img/schema_relationel.jpg)


### Diagramme logiciel

#### Classes

(en cours de rédaction)

#### État

(en cours de rédaction)

#### Composants

(en cours de rédaction)


---


## Installation

Clônez ce _repository_ dans un répertoire local sur votre machine.

### Prérequis

- [Apache HTTP Server](https://httpd.apache.org/download.cgi)
- [PHP](https://www.php.net/downloads.php)
- [MySQL et Workbench](https://dev.mysql.com/downloads/)


### Configuration

#### Virtual Host

Fichier **httpd-vhosts.conf**
```
<VirtualHost *:80>
	ServerName php-mvc.local
	DocumentRoot "YOUR-DIRECTORY-PATH-HERE"
	<Directory "YOUR-DIRECTORY-PATH-HERE">
		Options +Indexes +Includes +FollowSymLinks +MultiViews
		AllowOverride All
		Require local
	</Directory>
</VirtualHost>
```

Fichier **host**
```
127.0.0.1 php-mvc.local
::1 php-mvc.local
```


#### Base de données

Le dossier `_database/` contient les fichiers SQL nécessaires à l'implémentation de la base de données.

- `1_schema.sql` définit la structure (DDL). Il doit être exécuter en premier.
- `2_data_periods.sql` implémente la table `period` et ses sous-entités languistiques (DML). C'est l'entité forte, donc il doit être exécuté en deuxième.
- `3_data_compositor.sql` implémente la table `compositor` (DML). C'est l'entité faible, donc il doit être exécuté après le DML précédent.


#### Variables d'environnement

Dupliquez le fichier `env.template.php` et renommez-le en `env.local.php`. Adaptez les constantes avec des propriétés adéquantes pour votre utilisation locale – en particulier les valeurs de connexion la base de données.

Si vous déployez ce projet en ligne, dupliquez une nouvelle fois le fichier `env.template.php` et renommez-le en `env.php`. Adaptez cette fois les constantes avec des propriétés adaptées pour l'environnement de production. C'est cette version `en.php` doit être déployée sur votre serveur distant. 

**Attention** : ne divulguez jamais vos variables d'environnement publiquement.


---


## Remarques


### Ressources

Les ressources externes **CSS** et **JavaScript** sont à votre disposition gracieusement et **leur utilisation est autorisée**. Mais notez bien que ces ressources sont **susceptibles d'évoluer sans préavis** car elles ne font pas l'objet d'une librairie publique.

En revanche, l'utilisation des ressources externes `.png`, `.jpg`, `.svg` figurant dans `/trademark` **est formellement interdite**. Si vous souhaitez utiliser et publier ce projet, **veuillez replacer ces images par vos logos et icônes**.


### Références

- [Wikibooks : Patrons de conception](https://fr.wikibooks.org/wiki/Patrons_de_conception)
- [Wikipédia : Patron de conception](https://fr.wikipedia.org/wiki/Patron_de_conception)
- [PHP : Documentation](https://www.php.net/manual/fr/)
- [MySQL : Documentation](https://dev.mysql.com/doc/refman/8.0/en/)

