# **PHP & MVC**

Version | Objectif | Domaine | Cadre | Démo
------- | -------- | ------- | ----- | ----
2.1 | Andragogie | Programmation | Laboratoire | [PHP & MVC](https://demo.elodiebayet.com/php-mvc)

Reupload et correction du support 'PHP & MVC' daté d'octobre 2019.

---


## Présentation

Ce projet est une **ressource pédagogique** qui sert d'exemple de développement en PHP à travers l'architecture **Model-View-Controller** et le paradigme **Orienté Objet**.

Ce support était fourni aux stagiaires ayant accompli le cours "Laboratoire PHP".


### Objectifs

- Résoudre un système de routage en PHP en deux versions linguistiques
- Respecter l'architecture Model-View-Controller et l'abstraction Orientée Objets
- Se préprarer à l'apprentissage d'un Framework professionnel comme [Symfony](https://symfony.com/doc)


### Prérequis

Cours 
1. "Informatique"
1. "Algorithmique"
1. "HTML/CSS"
1. "Programmation PHP"
1. "Modélisation de base de données"
1. "Orienté Objet en PHP"
1. "SQL / MySQL"


### Exploitation

Ce projet peut être utilisé dans un cadre d'apprentissage individuel et privé. Il ne convient pas pour une utilisation publique ou professionnelle.


---


## Analyse

Le projet gère 2 versions linguistiques : le français et l'anglais. Les URIs et la base de données sont conçues en conséquence.


### Sitemap

![Architecture SEO](https://demo.elodiebayet.com/php-mvc/assets/img/architecture_seo.jpg)


### Base de données

#### 1️⃣ Schéma entités-associations

<img src="https://demo.elodiebayet.com/php-mvc/assets/img/schema_entites-associations.jpg" width="431" height="339">

#### 2️⃣ Schéma relationnel

![Schéma relationnel](https://demo.elodiebayet.com/php-mvc/assets/img/schema_relationnel.jpg)


###  Diagrammes logiciel

(en cours de rédaction)


---


## Installation

Clônez ce _repository_ dans un répertoire local sur votre machine.

### Prérequis

- [Apache HTTP Server ^2.4](https://httpd.apache.org/download.cgi)
- [PHP ^8.4](https://www.php.net/downloads.php)
- [MySQL ^8.0 et Workbench](https://dev.mysql.com/downloads/)


### Configuration

#### 1️⃣ Virtual Host

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


#### 2️⃣ Base de données

Le dossier `_database/` contient les fichiers SQL nécessaires à l'implémentation de la base de données.

1. `1_schema.sql` définit la structure (DDL). Il doit être exécuté en premier.
1. `2_data_periods.sql` implémente la table `period` et ses sous-entités languistiques (DML). C'est l'entité forte, donc il doit être exécuté en deuxième.
1. `3_data_compositor.sql` implémente la table `compositor` (DML). C'est l'entité faible, donc il doit être exécuté après le DML précédent.


#### 3️⃣ Variables d'environnement

Dupliquez le fichier `env.template.php` et renommez-le en `env.local.php`. Adaptez les constantes avec des propriétés adéquantes pour votre utilisation locale – en particulier les valeurs de connexion la base de données.

Si vous déployez ce projet en ligne, dupliquez une nouvelle fois le fichier `env.template.php` et renommez-le en `env.php`. Adaptez cette fois les constantes avec des propriétés adaptées pour l'environnement de production. C'est cette version `en.php` doit être déployée sur votre serveur distant. 

⚠️ **Attention** : ne divulguez jamais vos variables d'environnement publiquement.


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

