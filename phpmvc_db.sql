-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 27 déc. 2021 à 17:14
-- Version du serveur :  8.0.19
-- Version de PHP : 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `phpmvc`
--

-- --------------------------------------------------------

--
-- Structure de la table `patron`
--

DROP TABLE IF EXISTS `patron`;
CREATE TABLE IF NOT EXISTS `patron` (
  `tag` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `figure` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `explanation` varchar(1000) COLLATE utf8mb4_general_ci NOT NULL,
  `details` varchar(1000) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`tag`),
  UNIQUE KEY `tag` (`tag`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `patron`
--

INSERT INTO `patron` (`tag`, `title`, `figure`, `explanation`, `details`) VALUES
('model-view-controller', 'Patron d\'Architecture MVC', 'schema_mvc.jpg', '<p>Un motif d\'architecture logicielle destiné aux interfaces graphiques lancé en 1978 et très populaire pour les applications web. Le motif est composé de trois types de modules ayant trois responsabilités différentes : <strong>les modèles</strong>, <strong>les vues</strong> et <strong>les contrôleurs</strong>.</p><p>Ce <strong>patron d\'architecture</strong> est une combinaison des patrons <em>observateur</em> <span class=\"light\">– catégorie <em>Patrons de comportement</em> –</span>, <em>stratégie</em> <span class=\"light\">– catégorie <em>Patrons de comportement</em> –</span> et <em>composite</em> <span class=\"light\">– catégorie <em>Patrons de structure</em> –</span> que l\'on retrouve dans les Design Patterns.</p>', '<ul class=\"list\"><li><strong>Modèle :</strong> Élément qui contient les données ainsi que de la logique en rapport avec les données <span class=\"light\">– validation, lecture et enregistrement</span>. Il peut, dans sa forme la plus simple, contenir uniquement une simple valeur, ou une structure de données plus complexe.</li><li><strong>Vue :</strong> Partie visible d\'une interface graphique et qui se sert du modèle. Une vue contient des éléments visuels ainsi que la logique nécessaire pour afficher les données provenant du modèle</li><li><strong>Contrôleur :</strong> Module qui traite les actions effectuées par l\'utilisateur, détient un rôle logique pure et modifie les données du modèle et de la vue.</li><ul>'),
('model-view-presentation', 'Patron de conception MVP', 'schema_mvp.jpg', '<p>Ce <strong>patron de Conception</strong> est dérivé du patron Modèle-Vue-Contrôleur (MVC) Le principe est de découpler <strong>la vue</strong> et <strong>le modèle</strong>, en utilisant <strong>le présentateur</strong> comme intermédiaire.</p><p>Il permet d\'avoir plusieurs vues d\'un même modèle <span class=\"light\">– une table de données sous la forme d\'un tableau modifiable <strong>ET</strong> sous la forme d\'un graphique</span>. Et une même vue peut, inversement, présenter les données de plusieurs modèles.</p>', '<ul class=\"list\"><li><strong>Modèle :</strong> Les classes représentant les données manipulées à travers l\'interface utilisateur.</li> <li><strong>Vue :</strong> Les classes présentant une vue des données à l\'utilisateur.</li> <li><strong>Présentation :</strong> Les classes présentant une vue des données à l\'utilisateur.</li><ul>'),
('model-view-viewmodel', 'Patron d\'Architecture MVVM', 'schema_mvvm.jpg', '<p>Apparu en 2004, MVVM est originaire de Microsoft et adapté pour le développement des applications basées sur les technologies <em>Windows Presentation Foundation</em> et <em>Silverlight</em> via l\'outil <em>MVVM Light</em> par exemple. Cette méthode permet, tel le modèle MVC <span class=\"light\">– modèle-vue-contrôleur –</span>, de séparer la <strong>vue</strong> de la <strong>logique</strong> et de <strong>l\'accès aux données</strong> en accentuant les principes de liaison et d’événement.</p>', '<ul class=\"list\"><li><strong>Modèle :</strong> Élément qui contient les données ainsi que de la logique en rapport avec les données <span class=\"light\">– validation, lecture et enregistrement</span>. Il peut, dans sa forme la plus simple, contenir uniquement une simple valeur, ou une structure de données plus complexe.</li><li><strong>Vue :</strong> Partie visible d\'une interface graphique et qui se sert du modèle. Une vue contient des éléments visuels ainsi que la logique nécessaire pour afficher les données provenant du modèle</li><li><strong>Vue-Modèle :</strong> Couche logique métier, un peu similaire à la couche <em>Contrôleur</em> du modèle MVC mais avec comme rôle de mettre les deux autres couche en <strong>liaison</strong>.</li><ul>');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
