-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1:3306
-- Généré le :  Jeu 07 Février 2019 à 01:30
-- Version du serveur :  5.6.35
-- Version de PHP :  7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `date_add` datetime NOT NULL,
  `verified` int(11) NOT NULL,
  `authorized` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `author`, `comment`, `date_add`, `verified`, `authorized`) VALUES
(11, 29, '35', 'test commentaire 1', '2018-12-28 20:53:16', 0, 0),
(12, 29, '35', 'test commentaire 1', '2018-12-28 20:54:00', 0, 0),
(13, 29, '35', 'test commentaire 1', '2018-12-28 20:54:06', 0, 0),
(14, 29, '35', 'test', '2019-01-22 23:22:26', 0, 0),
(15, 29, '36', 'tyest', '2019-01-23 12:48:23', 0, 1),
(16, 37, '35', 'test 04/02/2019', '2019-02-04 01:18:27', 0, 1),
(17, 30, '37', 'titi', '2019-02-04 01:28:45', 0, 1),
(18, 37, '37', 'toto commente', '2019-02-04 22:39:36', 0, 1),
(19, 37, '38', 'xavier commente', '2019-02-05 12:26:37', 0, 1),
(20, 30, '37', 'test', '2019-02-07 01:25:25', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `media`
--

CREATE TABLE `media` (
  `id_media` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `alt` varchar(255) NOT NULL,
  `height` int(5) NOT NULL,
  `width` int(5) NOT NULL,
  `url` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `date_add` datetime NOT NULL,
  `user_add` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `function` varchar(40) DEFAULT NULL,
  `type_id` int(11) NOT NULL,
  `author` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `chapo` text NOT NULL,
  `content` text NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_description` text NOT NULL,
  `comment_auth` int(1) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  `date_add` datetime NOT NULL,
  `date_upd` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `posts`
--

INSERT INTO `posts` (`id`, `function`, `type_id`, `author`, `title`, `chapo`, `content`, `meta_title`, `meta_description`, `comment_auth`, `active`, `date_add`, `date_upd`) VALUES
(22, 'showHome', 1, 35, 'Accueil1', '<u><b>Accueil2 </b></u><b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod \r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim \r\nveniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea \r\ncommodo consequat. Duis aute irure dolor in reprehenderit in voluptate \r\nvelit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint \r\noccaecat cupidatat non proident, sunt in culpa qui officia deserunt \r\nmollit anim id est laborum.</b>', '<p class=\"col-12 col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6\">1Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod \r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim \r\nveniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea \r\ncommodo consequat. Duis aute irure dolor in reprehenderit in voluptate \r\nvelit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint \r\noccaecat cupidatat non proident, sunt in culpa qui officia deserunt \r\nmollit anim id est laborum.</p>\r\n<p class=\"col-12 col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod \r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim \r\nveniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea \r\ncommodo consequat. Duis aute irure dolor in reprehenderit in voluptate \r\nvelit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint \r\noccaecat cupidatat non proident, sunt in culpa qui officia deserunt \r\nmollit anim id est laborum.</p>\r\n\r\n<p class=\"col-12 col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 text-center\">\r\n<img class=\"img-fluid\" src=\"http://lorempixel.com/output/abstract-q-c-400-300-4.jpg\" alt=\"img\"></p>\r\n<p class=\"col-12 col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod \r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim \r\nveniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea \r\ncommodo consequat. Duis aute irure dolor in reprehenderit in voluptate \r\nvelit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint \r\noccaecat cupidatat non proident, sunt in culpa qui officia deserunt \r\nmollit anim id est laborum.</p>\r\n<p class=\"col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center\">\r\n<img class=\"img-fluid\" src=\"http://lorempixel.com/output/abstract-q-c-1000-300-2.jpg\" alt=\"img\"></p>', '1Anthony Blanchard developpeur Web Occitanie test', '1Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 0, 1, '2018-12-28 18:20:01', '2019-02-04 01:32:53'),
(23, 'seeBlog', 1, 35, 'Blog', '<p>chapo blog<br></p>', '<p>contenu blog<br></p>', 'title blog', 'description blog', 0, 1, '2018-12-28 18:50:32', '2019-01-22 22:35:59'),
(24, 'seeCompetence', 1, 35, 'Competences', '<p>chapoLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod \r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim \r\nveniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea \r\ncommodo consequat. Duis aute irure dolor in reprehenderit in voluptate \r\nvelit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint \r\noccaecat cupidatat non proident, sunt in culpa qui officia deserunt \r\nmollit anim id est laborum.</p>', '<p class=\"col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center\">\r\n<img class=\"img-fluid\" src=\"http://lorempixel.com/output/abstract-q-c-1000-300-2.jpg\" alt=\"img\"></p>\r\n<div class=\"row\">\r\n<p class=\"col-12 col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-4\"><img class=\"img-fluid\" src=\"http://lorempixel.com/output/abstract-q-c-1000-300-2.jpg\" alt=\"img\"></p>\r\n<p class=\"col-12 col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-4\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod \r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim \r\nveniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea \r\ncommodo consequat. Duis aute irure dolor in reprehenderit in voluptate \r\nvelit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint \r\noccaecat cupidatat non proident, sunt in culpa qui officia deserunt \r\nmollit anim id est laborum.</p>\r\n<p class=\"col-12 col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-4\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod \r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim \r\nveniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea \r\ncommodo consequat. Duis aute irure dolor in reprehenderit in voluptate \r\nvelit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint \r\noccaecat cupidatat non proident, sunt in culpa qui officia deserunt \r\nmollit anim id est laborum.</p>\r\n<hr>\r\n</div>\r\n<div class=\"row\">\r\n<p class=\"col-12 col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-4\"><img class=\"img-fluid\" src=\"http://lorempixel.com/output/abstract-q-c-1000-300-2.jpg\" alt=\"img\"></p>\r\n<p class=\"col-12 col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-4\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod \r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim \r\nveniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea \r\ncommodo consequat. Duis aute irure dolor in reprehenderit in voluptate \r\nvelit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint \r\noccaecat cupidatat non proident, sunt in culpa qui officia deserunt \r\nmollit anim id est laborum.</p>\r\n<p class=\"col-12 col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-4\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod \r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim \r\nveniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea \r\ncommodo consequat. Duis aute irure dolor in reprehenderit in voluptate \r\nvelit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint \r\noccaecat cupidatat non proident, sunt in culpa qui officia deserunt \r\nmollit anim id est laborum.</p>\r\n<hr>\r\n</div>\r\n<div class=\"row\">\r\n<p class=\"col-12 col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-4\"><img class=\"img-fluid\" src=\"http://lorempixel.com/output/abstract-q-c-1000-300-2.jpg\" alt=\"img\"></p>\r\n<p class=\"col-12 col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-4\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod \r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim \r\nveniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea \r\ncommodo consequat. Duis aute irure dolor in reprehenderit in voluptate \r\nvelit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint \r\noccaecat cupidatat non proident, sunt in culpa qui officia deserunt \r\nmollit anim id est laborum.</p>\r\n<p class=\"col-12 col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-4\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod \r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim \r\nveniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea \r\ncommodo consequat. Duis aute irure dolor in reprehenderit in voluptate \r\nvelit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint \r\noccaecat cupidatat non proident, sunt in culpa qui officia deserunt \r\nmollit anim id est laborum.</p>\r\n<hr>\r\n</div>\r\n<div class=\"row\">\r\n<p class=\"col-12 col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-4\"><img class=\"img-fluid\" src=\"http://lorempixel.com/output/abstract-q-c-1000-300-2.jpg\" alt=\"img\"></p>\r\n<p class=\"col-12 col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-4\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod \r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim \r\nveniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea \r\ncommodo consequat. Duis aute irure dolor in reprehenderit in voluptate \r\nvelit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint \r\noccaecat cupidatat non proident, sunt in culpa qui officia deserunt \r\nmollit anim id est laborum.</p>\r\n<p class=\"col-12 col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-4\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod \r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim \r\nveniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea \r\ncommodo consequat. Duis aute irure dolor in reprehenderit in voluptate \r\nvelit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint \r\noccaecat cupidatat non proident, sunt in culpa qui officia deserunt \r\nmollit anim id est laborum.</p>\r\n<hr>\r\n</div>\r\n<div class=\"row\">\r\n<p class=\"col-12 col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-4\"><img class=\"img-fluid\" src=\"http://lorempixel.com/output/abstract-q-c-1000-300-2.jpg\" alt=\"img\"></p>\r\n<p class=\"col-12 col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-4\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod \r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim \r\nveniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea \r\ncommodo consequat. Duis aute irure dolor in reprehenderit in voluptate \r\nvelit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint \r\noccaecat cupidatat non proident, sunt in culpa qui officia deserunt \r\nmollit anim id est laborum.</p>\r\n<p class=\"col-12 col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-4\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod \r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim \r\nveniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea \r\ncommodo consequat. Duis aute irure dolor in reprehenderit in voluptate \r\nvelit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint \r\noccaecat cupidatat non proident, sunt in culpa qui officia deserunt \r\nmollit anim id est laborum.</p>\r\n<hr>\r\n</div>\r\n<div class=\"row\">\r\n<p class=\"col-12 col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-4\"><img class=\"img-fluid\" src=\"http://lorempixel.com/output/abstract-q-c-1000-300-2.jpg\" alt=\"img\"></p>\r\n<p class=\"col-12 col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-4\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod \r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim \r\nveniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea \r\ncommodo consequat. Duis aute irure dolor in reprehenderit in voluptate \r\nvelit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint \r\noccaecat cupidatat non proident, sunt in culpa qui officia deserunt \r\nmollit anim id est laborum.</p>\r\n<p class=\"col-12 col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-4\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod \r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim \r\nveniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea \r\ncommodo consequat. Duis aute irure dolor in reprehenderit in voluptate \r\nvelit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint \r\noccaecat cupidatat non proident, sunt in culpa qui officia deserunt \r\nmollit anim id est laborum.</p>\r\n<hr>\r\n</div>\r\n', 'Anthony Blanchard developpeur Web Occitanie test', 'meta Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 0, 1, '2018-12-28 18:52:00', '2019-01-22 22:35:54'),
(25, 'seePortfolio', 1, 35, 'Portfolio', '<p><u><b>Chapo portfolio</b></u> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod \r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim \r\nveniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea \r\ncommodo consequat. Duis aute irure dolor in reprehenderit in voluptate \r\nvelit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint \r\noccaecat cupidatat non proident, sunt in culpa qui officia deserunt \r\nmollit anim id est laborum.\r\n</p>', '<div class=\"row\">\r\n<div class=\"col-12 col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-4\">\r\n<img class=\"img-fluid\" src=\"http://lorempixel.com/output/abstract-q-c-1000-300-2.jpg\" alt=\"img\">\r\n<p class=\"col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod \r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim \r\nveniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea \r\ncommodo consequat. Duis aute irure dolor in reprehenderit in voluptate \r\nvelit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint \r\noccaecat cupidatat non proident, sunt in culpa qui officia deserunt \r\nmollit anim id est laborum.\r\n</p>\r\n</div>\r\n<div class=\"col-12 col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-4\">\r\n<img class=\"img-fluid\" src=\"http://lorempixel.com/output/abstract-q-c-1000-300-2.jpg\" alt=\"img\">\r\n<p class=\"col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod \r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim \r\nveniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea \r\ncommodo consequat. Duis aute irure dolor in reprehenderit in voluptate \r\nvelit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint \r\noccaecat cupidatat non proident, sunt in culpa qui officia deserunt \r\nmollit anim id est laborum.\r\n</p>\r\n</div>\r\n<div class=\"col-12 col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-4\">\r\n<img class=\"img-fluid\" src=\"http://lorempixel.com/output/abstract-q-c-1000-300-2.jpg\" alt=\"img\">\r\n<p class=\"col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod \r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim \r\nveniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea \r\ncommodo consequat. Duis aute irure dolor in reprehenderit in voluptate \r\nvelit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint \r\noccaecat cupidatat non proident, sunt in culpa qui officia deserunt \r\nmollit anim id est laborum.\r\n</p>\r\n</div>\r\n</div>\r\n<hr>\r\n<div class=\"row\">\r\n<div class=\"col-12 col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-4\">\r\n<img class=\"img-fluid\" src=\"http://lorempixel.com/output/abstract-q-c-1000-300-2.jpg\" alt=\"img\">\r\n<p class=\"col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod \r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim \r\nveniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea \r\ncommodo consequat. Duis aute irure dolor in reprehenderit in voluptate \r\nvelit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint \r\noccaecat cupidatat non proident, sunt in culpa qui officia deserunt \r\nmollit anim id est laborum.\r\n</p>\r\n</div>\r\n<div class=\"col-12 col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-4\">\r\n<img class=\"img-fluid\" src=\"http://lorempixel.com/output/abstract-q-c-1000-300-2.jpg\" alt=\"img\">\r\n<p class=\"col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod \r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim \r\nveniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea \r\ncommodo consequat. Duis aute irure dolor in reprehenderit in voluptate \r\nvelit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint \r\noccaecat cupidatat non proident, sunt in culpa qui officia deserunt \r\nmollit anim id est laborum.\r\n</p>\r\n</div>\r\n<div class=\"col-12 col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-4\">\r\n<img class=\"img-fluid\" src=\"http://lorempixel.com/output/abstract-q-c-1000-300-2.jpg\" alt=\"img\">\r\n<p class=\"col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod \r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim \r\nveniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea \r\ncommodo consequat. Duis aute irure dolor in reprehenderit in voluptate \r\nvelit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint \r\noccaecat cupidatat non proident, sunt in culpa qui officia deserunt \r\nmollit anim id est laborum.\r\n</p>\r\n</div>\r\n</div>\r\n<hr>\r\n<div class=\"row\">\r\n<div class=\"col-12 col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-4\">\r\n<img class=\"img-fluid\" src=\"http://lorempixel.com/output/abstract-q-c-1000-300-2.jpg\" alt=\"img\">\r\n<p class=\"col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod \r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim \r\nveniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea \r\ncommodo consequat. Duis aute irure dolor in reprehenderit in voluptate \r\nvelit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint \r\noccaecat cupidatat non proident, sunt in culpa qui officia deserunt \r\nmollit anim id est laborum.\r\n</p>\r\n</div>\r\n<div class=\"col-12 col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-4\">\r\n<img class=\"img-fluid\" src=\"http://lorempixel.com/output/abstract-q-c-1000-300-2.jpg\" alt=\"img\">\r\n<p class=\"col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod \r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim \r\nveniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea \r\ncommodo consequat. Duis aute irure dolor in reprehenderit in voluptate \r\nvelit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint \r\noccaecat cupidatat non proident, sunt in culpa qui officia deserunt \r\nmollit anim id est laborum.\r\n</p>\r\n</div>\r\n<div class=\"col-12 col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-4\">\r\n<img class=\"img-fluid\" src=\"http://lorempixel.com/output/abstract-q-c-1000-300-2.jpg\" alt=\"img\">\r\n<p class=\"col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod \r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim \r\nveniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea \r\ncommodo consequat. Duis aute irure dolor in reprehenderit in voluptate \r\nvelit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint \r\noccaecat cupidatat non proident, sunt in culpa qui officia deserunt \r\nmollit anim id est laborum.\r\n</p>\r\n</div>\r\n</div>\r\n<hr>', 'Anthony Blanchard developpeur Web Occitanie test', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod \r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim \r\nveniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea \r\ncommodo consequat. Duis aute irure dolor in reprehenderit in voluptate \r\nvelit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint \r\noccaecat cupidatat non proident, sunt in culpa qui officia deserunt \r\nmollit anim id est laborum.', 0, 1, '2018-12-28 18:52:43', '2019-01-22 22:36:04'),
(26, 'seeMe', 1, 35, 'Présentation', '<p>Chapo présentation<br></p>', '<div class=\"row\">\r\n<img class=\"img-fluid\" src=\"http://lorempixel.com/output/abstract-q-c-1000-300-2.jpg\" alt=\"img\">\r\n<p class=\"col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod \r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim \r\nveniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea \r\ncommodo consequat. Duis aute irure dolor in reprehenderit in voluptate \r\nvelit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint \r\noccaecat cupidatat non proident, sunt in culpa qui officia deserunt \r\nmollit anim id est laborum.\r\n</p>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"col-12 col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-4\">\r\n<img class=\"img-fluid\" src=\"http://lorempixel.com/output/abstract-q-c-1000-300-2.jpg\" alt=\"img\">\r\n<p class=\"col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod \r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim \r\nveniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea \r\ncommodo consequat. Duis aute irure dolor in reprehenderit in voluptate \r\nvelit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint \r\noccaecat cupidatat non proident, sunt in culpa qui officia deserunt \r\nmollit anim id est laborum.\r\n</p>\r\n</div>\r\n<div class=\"col-12 col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-4\">\r\n<img class=\"img-fluid\" src=\"http://lorempixel.com/output/abstract-h-c-300-550-10.jpg\" alt=\"img\">\r\n</div>\r\n<div class=\"col-12 col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-4\">\r\n<img class=\"img-fluid\" src=\"http://lorempixel.com/output/abstract-q-c-1000-300-2.jpg\" alt=\"img\">\r\n<p class=\"col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod \r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim \r\nveniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea \r\ncommodo consequat. Duis aute irure dolor in reprehenderit in voluptate \r\nvelit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint \r\noccaecat cupidatat non proident, sunt in culpa qui officia deserunt \r\nmollit anim id est laborum.\r\n</p>\r\n</div></div>', 'title présentation', 'meta description', 0, 1, '2018-12-28 18:53:57', '2019-01-22 22:36:09'),
(27, '', 2, 35, 'article test 1 2', '<p>chapo article test 1 <br></p>', '<p>contenu article test 1 2<br></p>', 'title article test 1 2', 'meta article test 1 2', 1, 1, '2018-12-28 18:54:37', '2019-02-05 00:06:11'),
(28, '', 2, 35, 'article test 23', '<p>chapo article test 2<br></p>', '<p>contenu article test 2<br></p>', 'title article test 2', 'meta article test 2', 0, 1, '2018-12-28 18:55:54', '2019-02-05 12:24:05'),
(29, '', 2, 35, 'billet 1 ', '<p>chapo billet 1Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod \r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim \r\nveniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea \r\ncommodo consequat. Duis aute irure dolor in reprehenderit in voluptate \r\nvelit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint \r\noccaecat cupidatat non proident, sunt in culpa qui officia deserunt \r\nmollit anim id est laborum.</p>', '<p>contenu billet 1</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod \r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim \r\nveniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea \r\ncommodo consequat. Duis aute irure dolor in reprehenderit in voluptate \r\nvelit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint \r\noccaecat cupidatat non proident, sunt in culpa qui officia deserunt \r\nmollit anim id est laborum.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod \r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim \r\nveniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea \r\ncommodo consequat. Duis aute irure dolor in reprehenderit in voluptate \r\nvelit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint \r\noccaecat cupidatat non proident, sunt in culpa qui officia deserunt \r\nmollit anim id est laborum.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod \r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim \r\nveniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea \r\ncommodo consequat. Duis aute irure dolor in reprehenderit in voluptate \r\nvelit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint \r\noccaecat cupidatat non proident, sunt in culpa qui officia deserunt \r\nmollit anim id est laborum.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod \r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim \r\nveniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea \r\ncommodo consequat. Duis aute irure dolor in reprehenderit in voluptate \r\nvelit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint \r\noccaecat cupidatat non proident, sunt in culpa qui officia deserunt \r\nmollit anim id est laborum.</p>', 'title billet 1', 'description billet 1\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, 0, '2018-12-28 19:04:13', '2019-01-23 12:55:46'),
(30, '', 2, 35, 'billet 2', '<p>chapo billet 2Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod \r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim \r\nveniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea \r\ncommodo consequat. Duis aute irure dolor in reprehenderit in voluptate \r\nvelit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint \r\noccaecat cupidatat non proident, sunt in culpa qui officia deserunt \r\nmollit anim id est laborum.</p>', '<p>contenu billet 2 </p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod \r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim \r\nveniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea \r\ncommodo consequat. Duis aute irure dolor in reprehenderit in voluptate \r\nvelit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint \r\noccaecat cupidatat non proident, sunt in culpa qui officia deserunt \r\nmollit anim id est laborum.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod \r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim \r\nveniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea \r\ncommodo consequat. Duis aute irure dolor in reprehenderit in voluptate \r\nvelit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint \r\noccaecat cupidatat non proident, sunt in culpa qui officia deserunt \r\nmollit anim id est laborum.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod \r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim \r\nveniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea \r\ncommodo consequat. Duis aute irure dolor in reprehenderit in voluptate \r\nvelit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint \r\noccaecat cupidatat non proident, sunt in culpa qui officia deserunt \r\nmollit anim id est laborum.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod \r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim \r\nveniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea \r\ncommodo consequat. Duis aute irure dolor in reprehenderit in voluptate \r\nvelit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint \r\noccaecat cupidatat non proident, sunt in culpa qui officia deserunt \r\nmollit anim id est laborum.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod \r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim \r\nveniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea \r\ncommodo consequat. Duis aute irure dolor in reprehenderit in voluptate \r\nvelit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint \r\noccaecat cupidatat non proident, sunt in culpa qui officia deserunt \r\nmollit anim id est laborum.</p>', 'title billet 2', 'description billet 2Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, 1, '2018-12-28 19:05:12', '2019-01-23 12:34:27'),
(31, 'mention', 1, 35, 'Mention', 'Mention légales', '<p>Mention légales<br></p>', '', '', 0, 0, '2019-01-25 10:49:20', '2019-01-25 10:49:20'),
(37, '', 2, 35, 'billet 3 ', '<p>chapo billlet 3 test&nbsp;&nbsp;&nbsp;&nbsp;<br></p>', '<p>contenu billet 3 test<br></p>', 'meta title billet 3', 'meta desc billet 3', 1, 1, '2019-02-03 21:01:35', '2019-02-03 21:01:35'),
(38, '', 1, 35, 'test page non afficher', 'chapo de page', '<p>contenu de page<br></p>', 'meta 1 de page', 'meta desc de page', 0, 0, '2019-02-04 01:35:34', '2019-02-04 01:35:34');

-- --------------------------------------------------------

--
-- Structure de la table `post_type`
--

CREATE TABLE `post_type` (
  `id_type` int(11) NOT NULL,
  `value` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `value` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `scene`
--

CREATE TABLE `scene` (
  `id_scene` int(11) NOT NULL,
  `id_media` int(11) NOT NULL,
  `id_post` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(120) NOT NULL,
  `Dob` datetime NOT NULL,
  `comment_auth` int(11) NOT NULL,
  `date_add` datetime NOT NULL,
  `date_upd` datetime NOT NULL,
  `uniqid` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id_user`, `role_id`, `email`, `password`, `firstname`, `lastname`, `Dob`, `comment_auth`, `date_add`, `date_upd`, `uniqid`) VALUES
(35, 1, 'anth.blanchard@gmail.com', '$2y$12$5c23d8615f26e5c23d861uX2OfPEa.IC34eBgvhYLjLELwdn4OGDu', 'Blanchard', 'Anthony', '0000-00-00 00:00:00', 1, '2018-12-26 20:37:06', '0000-00-00 00:00:00', '5c23d8615f26e5c23d8615f2a7'),
(37, 2, 'khyshant@msn.com', '$2y$12$5c5762a011e6e5c5762a0u2LsxPe1esaZRmeKKJy1T5K/9/VmaNAC', 'prénom', 'nom', '1988-04-27 00:00:00', 1, '2019-02-03 09:52:33', '0000-00-00 00:00:00', '5c5762a011e6e5c5762a011e70'),
(38, 2, 'xavier.douillard@gmail.com', '$2y$12$5c597f86f053f5c597f86evyeiW46oaq7f4mhdcFbGN2l5lYKJt1K', 'xavier', 'douillard', '1977-04-27 00:00:00', 1, '2019-02-05 12:20:24', '0000-00-00 00:00:00', '5c597f86f053f5c597f86f0541');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`);

--
-- Index pour la table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id_media`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_id` (`type_id`),
  ADD KEY `author` (`author`);

--
-- Index pour la table `post_type`
--
ALTER TABLE `post_type`
  ADD PRIMARY KEY (`id_type`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT pour la table `media`
--
ALTER TABLE `media`
  MODIFY `id_media` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT pour la table `post_type`
--
ALTER TABLE `post_type`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
