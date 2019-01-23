-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 23 Janvier 2019 à 14:46
-- Version du serveur :  5.7.11
-- Version de PHP :  7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `taroweb`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id`, `libelle`) VALUES
(1, 'Boisson'),
(2, 'Sandwich'),
(3, 'Dessert'),
(4, 'Pizza'),
(5, 'Accompagnement');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` char(10) DEFAULT NULL,
  `abo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`id`, `nom`, `prenom`, `email`, `telephone`, `abo`) VALUES
(1, 'Exploratrice', 'Dora', 'Aretedechiper@gmail.com', '0605040302', 1),
(2, 'Capitaine', 'Haddock', 'tintin@wanadoo.com', '0605040302', 0),
(3, 'Christ', 'Jesus', 'Allah@orange.fr', '0605040302', 1);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `adresse_rue` text NOT NULL,
  `adresse_cp` varchar(255) NOT NULL,
  `adresse_ville` varchar(255) NOT NULL,
  `datetime_livraison` datetime NOT NULL,
  `datetime_creation` datetime NOT NULL,
  `total` float NOT NULL,
  `commentaire` text,
  `etat_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `paiement_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `commande`
--

INSERT INTO `commande` (`id`, `adresse_rue`, `adresse_cp`, `adresse_ville`, `datetime_livraison`, `datetime_creation`, `total`, `commentaire`, `etat_id`, `type_id`, `client_id`, `paiement_id`) VALUES
(1, '5 rue ma bite sur ton front', '87000', 'suce ma queue', '2019-01-23 09:35:16', '2019-01-21 08:07:24', 10, 'j\'aime les gros chibres', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `compo_menu`
--

CREATE TABLE `compo_menu` (
  `menu_id` int(11) NOT NULL,
  `produit_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `compo_menu`
--

INSERT INTO `compo_menu` (`menu_id`, `produit_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 28),
(1, 30),
(1, 32),
(1, 33),
(1, 34),
(1, 36),
(1, 37),
(1, 38),
(1, 42),
(1, 43),
(1, 61),
(1, 101),
(1, 103),
(1, 106),
(1, 107),
(1, 108),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(2, 7),
(2, 8),
(2, 9),
(2, 10),
(2, 11),
(2, 12),
(2, 13),
(2, 14),
(2, 15),
(2, 16),
(2, 17),
(2, 28),
(2, 30),
(2, 32),
(2, 33),
(2, 39),
(2, 40),
(2, 41),
(2, 44),
(2, 61),
(2, 101),
(2, 103),
(2, 106),
(2, 107),
(2, 108),
(3, 1),
(3, 2),
(3, 3),
(3, 4),
(3, 5),
(3, 6),
(3, 7),
(3, 8),
(3, 9),
(3, 10),
(3, 11),
(3, 12),
(3, 13),
(3, 14),
(3, 15),
(3, 16),
(3, 17),
(3, 28),
(3, 30),
(3, 32),
(3, 33),
(3, 34),
(3, 51),
(3, 52),
(3, 53),
(3, 54),
(3, 55),
(3, 56),
(3, 57),
(3, 58),
(3, 66),
(3, 69),
(3, 70),
(3, 71),
(3, 72),
(3, 73),
(3, 74),
(4, 1),
(4, 2),
(4, 3),
(4, 4),
(4, 5),
(4, 6),
(4, 7),
(4, 8),
(4, 9),
(4, 10),
(4, 11),
(4, 12),
(4, 13),
(4, 14),
(4, 15),
(4, 16),
(4, 17),
(4, 28),
(4, 30),
(4, 32),
(4, 33),
(4, 34),
(4, 59),
(4, 60),
(4, 64),
(4, 101),
(4, 103),
(4, 106),
(4, 107),
(4, 108),
(5, 1),
(5, 2),
(5, 3),
(5, 4),
(5, 5),
(5, 6),
(5, 7),
(5, 8),
(5, 9),
(5, 10),
(5, 11),
(5, 12),
(5, 13),
(5, 14),
(5, 15),
(5, 16),
(5, 17),
(5, 28),
(5, 30),
(5, 32),
(5, 33),
(5, 34),
(5, 63),
(5, 101),
(5, 103),
(5, 106),
(5, 107),
(5, 108),
(6, 1),
(6, 2),
(6, 3),
(6, 4),
(6, 5),
(6, 6),
(6, 7),
(6, 8),
(6, 9),
(6, 10),
(6, 11),
(6, 12),
(6, 13),
(6, 14),
(6, 15),
(6, 16),
(6, 17),
(6, 28),
(6, 30),
(6, 32),
(6, 33),
(6, 34),
(6, 65),
(6, 101),
(6, 103),
(6, 106),
(6, 107),
(6, 108),
(7, 1),
(7, 2),
(7, 3),
(7, 4),
(7, 5),
(7, 6),
(7, 7),
(7, 8),
(7, 9),
(7, 10),
(7, 11),
(7, 12),
(7, 13),
(7, 14),
(7, 15),
(7, 16),
(7, 17),
(7, 28),
(7, 30),
(7, 32),
(7, 33),
(7, 34),
(7, 66),
(7, 69),
(7, 70),
(7, 71),
(7, 72),
(7, 73),
(7, 74),
(7, 75),
(7, 76),
(7, 77),
(7, 78),
(7, 79),
(7, 80),
(7, 81),
(8, 1),
(8, 2),
(8, 3),
(8, 4),
(8, 5),
(8, 6),
(8, 7),
(8, 8),
(8, 9),
(8, 10),
(8, 11),
(8, 12),
(8, 13),
(8, 14),
(8, 15),
(8, 16),
(8, 17),
(8, 28),
(8, 30),
(8, 32),
(8, 33),
(8, 34),
(8, 66),
(8, 69),
(8, 70),
(8, 71),
(8, 72),
(8, 73),
(8, 74),
(8, 82),
(8, 83),
(8, 84),
(9, 1),
(9, 2),
(9, 3),
(9, 4),
(9, 5),
(9, 6),
(9, 7),
(9, 8),
(9, 9),
(9, 10),
(9, 11),
(9, 12),
(9, 13),
(9, 14),
(9, 15),
(9, 16),
(9, 17),
(9, 28),
(9, 30),
(9, 32),
(9, 33),
(9, 34),
(9, 66),
(9, 69),
(9, 70),
(9, 71),
(9, 72),
(9, 73),
(9, 74),
(9, 85),
(9, 86),
(9, 87),
(9, 88),
(9, 89),
(9, 90),
(9, 91),
(9, 92),
(9, 93),
(9, 94),
(9, 95),
(9, 96),
(9, 97),
(9, 98);

-- --------------------------------------------------------

--
-- Structure de la table `compo_produit`
--

CREATE TABLE `compo_produit` (
  `produit_id` int(11) NOT NULL,
  `option_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `custom_produit`
--

CREATE TABLE `custom_produit` (
  `id` int(11) NOT NULL,
  `produit_id` int(11) NOT NULL,
  `commande_id` int(11) NOT NULL,
  `valeur_id` int(11) NOT NULL,
  `qte` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `etat_commande`
--

CREATE TABLE `etat_commande` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `etat_commande`
--

INSERT INTO `etat_commande` (`id`, `libelle`) VALUES
(1, 'Remise au client'),
(2, 'pret'),
(3, 'en preparation'),
(4, 'Pas commencée');

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

CREATE TABLE `groupe` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `groupe`
--

INSERT INTO `groupe` (`id`, `libelle`) VALUES
(1, 'admin'),
(2, 'manager');

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `prix` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `menu`
--

INSERT INTO `menu` (`id`, `libelle`, `prix`) VALUES
(1, 'Burger Simple', 6),
(2, 'Burger Double', 8),
(3, 'Sandwich', 5),
(4, 'Snack', 6),
(5, 'Hot Dog', 5),
(6, 'Croque Monsieur', 5),
(7, 'Pizza Classique', 10),
(8, 'Pizza Calzone', 11),
(9, 'Pizza Complète', 12);

-- --------------------------------------------------------

--
-- Structure de la table `option_produit`
--

CREATE TABLE `option_produit` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `option_produit`
--

INSERT INTO `option_produit` (`id`, `libelle`) VALUES
(1, 'Sauces'),
(2, 'Ananas'),
(3, 'Assaisonement aux Poivre'),
(4, 'Bacon'),
(5, 'Bases'),
(6, 'Boulettes de boeuf assaisonnées'),
(7, 'Champignons'),
(8, 'Chèvre'),
(9, 'Crème Fraîche'),
(10, 'Emmental'),
(11, 'Emmental Rapé'),
(12, 'Figues séchées'),
(13, 'Fourme d\'Ambert'),
(14, 'Jambon'),
(15, 'Jambon Sec'),
(16, 'Lardon'),
(17, 'Mélange Fondue'),
(18, 'Merguez'),
(19, 'Miel'),
(20, 'Mozzarella'),
(21, 'Oignons'),
(22, 'Olives Noires'),
(23, 'Origan'),
(24, 'Pepperoni Tranché'),
(25, 'Piment Jalapenos'),
(26, 'Poivrons Mélangés'),
(27, 'Pomme de terre'),
(28, 'Poulet Rôti'),
(29, 'Raclette'),
(30, 'Reblochon'),
(31, 'Sauce BBQ'),
(32, 'Sauce Dallas '),
(33, 'Sauce Echalote et Aneth'),
(34, 'Saumon d\'Écosse'),
(35, 'Thon'),
(36, 'Tomates Fraîches'),
(37, 'Steack haché'),
(38, 'Salade'),
(39, 'Tomate'),
(40, 'Chedar'),
(41, 'Poisson pané'),
(42, 'Poulet pané'),
(43, 'Baguette'),
(44, 'Panini'),
(45, 'Poulet Rôti'),
(46, 'Rosette'),
(47, 'Paté'),
(48, 'Kebab'),
(49, 'Kefta'),
(50, 'Saucisse'),
(51, 'Falafelle'),
(52, 'Chedar'),
(53, 'Pain de mie'),
(54, 'Salade'),
(55, 'Carotte'),
(56, 'Choux'),
(57, 'Chicon'),
(58, 'Celeri');

-- --------------------------------------------------------

--
-- Structure de la table `paiement`
--

CREATE TABLE `paiement` (
  `id` int(11) NOT NULL,
  `libelle` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `paiement`
--

INSERT INTO `paiement` (`id`, `libelle`) VALUES
(1, 'Carte Bleue'),
(2, 'Espèces'),
(3, 'Chèque restaurant');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `prix` float NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `sscategorie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`id`, `libelle`, `prix`, `image`, `sscategorie_id`) VALUES
(1, 'Coca Cola', 1.5, NULL, 1),
(2, 'Coca Cola Light', 1.5, NULL, 1),
(3, 'Coca Cola Zéro', 1.5, NULL, 1),
(4, 'Coca Cola Life', 1.5, NULL, 1),
(5, 'Coca Cola Cherry', 1.5, NULL, 1),
(6, 'Pepsi', 1.5, NULL, 1),
(7, 'Pepsi Max', 1.5, NULL, 1),
(8, 'Orangina', 1.5, NULL, 1),
(9, 'Fanta Citron', 1.5, NULL, 1),
(10, 'Fanta Orange', 1.5, NULL, 1),
(11, 'Ice Tea', 1.5, NULL, 1),
(12, 'Oasis', 1.5, NULL, 1),
(13, 'Minute Maid Pomme', 1.5, NULL, 1),
(14, 'Minute Maid Orange', 1.5, NULL, 1),
(15, 'Minute Maid Tropical', 1.5, NULL, 1),
(16, 'Dr Pepper', 1.5, NULL, 1),
(17, 'Sprite', 1.5, NULL, 1),
(18, 'Red Bull', 3, NULL, 1),
(19, 'Monster', 2, NULL, 1),
(20, 'Leffe', 2.5, NULL, 2),
(21, 'Leffe Ruby', 2.5, NULL, 2),
(22, '1664', 2.5, NULL, 2),
(23, 'Kronenbourg', 2.5, NULL, 2),
(24, 'Grimbergen', 3, NULL, 2),
(25, 'Rouge', 6, NULL, 3),
(26, 'Rosé', 6, NULL, 3),
(27, 'Blanc', 6, NULL, 3),
(28, 'Evian 50 cL', 1.5, NULL, 4),
(29, 'Evian 1,5 L', 3, NULL, 4),
(30, 'Cristalline 50 cL', 1, NULL, 4),
(31, 'Cristalline 1,5 L', 2, NULL, 4),
(32, 'Perrier', 1.5, NULL, 4),
(33, 'Badoit', 1.5, NULL, 4),
(34, 'San Pellegrino', 1.5, NULL, 4),
(35, 'Heineken', 2.5, NULL, 2),
(36, 'Beef Burger', 4, NULL, 5),
(37, 'Cheese Burger', 4.5, NULL, 5),
(38, 'Bacon Burger', 4.5, NULL, 5),
(39, 'DoubleBeef Burger', 6, NULL, 5),
(40, 'DoubleCheese Burger', 6.5, NULL, 5),
(41, 'DoubleBacon Burger', 6.5, NULL, 5),
(42, 'Fish Burger', 4, NULL, 5),
(43, 'Chicken Burger', 4, NULL, 5),
(44, 'DoubleChicken Burger', 6, NULL, 5),
(45, 'Burger', 2, NULL, 6),
(46, 'Jambon', 2, NULL, 6),
(47, 'Jambon Fromage', 2, NULL, 6),
(48, 'Bacon Chèvre', 2, NULL, 6),
(49, 'Bacon Burger', 2, NULL, 6),
(50, 'Cheese Burger', 2, NULL, 6),
(51, 'Thon Mayonnaise', 2, NULL, 7),
(52, 'Poulet Mayonnaise', 2, NULL, 7),
(53, 'Poulet Andalouse', 2, NULL, 7),
(54, 'Parisien', 2, NULL, 7),
(55, 'Jambon Fromage', 2, NULL, 7),
(56, 'Volailler', 2, NULL, 7),
(57, 'Rosette', 2, NULL, 7),
(58, 'Paté', 2, NULL, 7),
(59, 'Kebab', 4, NULL, 8),
(60, 'Kefta', 4, NULL, 8),
(61, 'Hummer', 4, NULL, 8),
(63, 'Hot Dog', 3, NULL, 8),
(64, 'Falafelle', 4, NULL, 8),
(65, 'Croque Monsieur', 3, NULL, 8),
(66, 'Calippo', 2, NULL, 9),
(67, 'Haagen dazs', 4, NULL, 9),
(68, 'Ben & Jerry\'s', 4, NULL, 9),
(69, 'Fusée', 2, NULL, 9),
(70, 'Magnum', 3, NULL, 9),
(71, 'Chocolat', 2, NULL, 10),
(72, 'Caramel', 2, NULL, 10),
(73, 'Vanille', 2, NULL, 10),
(74, 'Daim', 2, NULL, 11),
(75, 'Reine', 6, NULL, 12),
(76, 'Deluxe', 6, NULL, 12),
(77, 'Pepper Beef', 6, NULL, 12),
(78, 'Orientale', 6, NULL, 12),
(79, 'Peppina', 6, NULL, 12),
(80, 'Steack & Cheese', 6, NULL, 12),
(81, 'Reine', 6, NULL, 12),
(82, 'Jambon', 7, NULL, 13),
(83, 'Poulet', 7, NULL, 13),
(84, 'Boeuf', 7, NULL, 13),
(85, 'Fondue', 8, NULL, 14),
(86, 'Authentique Raclette', 8, NULL, 14),
(87, 'Bacon Groovy', 8, NULL, 14),
(88, 'Savoyarde', 8, NULL, 14),
(89, 'Diavola', 8, NULL, 14),
(90, 'Diavola Pepperoni', 8, NULL, 14),
(91, 'Hypnotika', 8, NULL, 14),
(92, 'Extravaganzza', 8, NULL, 14),
(93, 'Chickenita Pepperoni', 8, NULL, 14),
(94, '4 Fromages', 8, NULL, 14),
(95, 'Hawaïenne Jambon', 8, NULL, 14),
(96, 'Hawaïenne Poulet', 8, NULL, 14),
(97, 'Indienne', 8, NULL, 14),
(98, 'Forestière', 8, NULL, 14),
(99, 'Cannibale', 8, NULL, 14),
(100, 'Grande Frite', 3, NULL, 15),
(101, 'Petite Frite', 2, NULL, 15),
(102, 'Grande Potatoes', 3, NULL, 15),
(103, 'Petite Potatoes', 2, NULL, 15),
(104, 'Maïs', 3, NULL, 15),
(105, 'Onion rings', 3, NULL, 15),
(106, 'Salade', 3, NULL, 16),
(107, 'Carotte rapées', 3, NULL, 15),
(108, 'Celeri', 3, NULL, 15),
(109, 'Chicon', 3, NULL, 15);

-- --------------------------------------------------------

--
-- Structure de la table `sscategorie`
--

CREATE TABLE `sscategorie` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `categorie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `sscategorie`
--

INSERT INTO `sscategorie` (`id`, `libelle`, `categorie_id`) VALUES
(1, 'Soda', 1),
(2, 'Bière', 1),
(3, 'Vin', 1),
(4, 'Eau', 1),
(5, 'Hamburger', 2),
(6, 'Panini', 2),
(7, 'Froid', 2),
(8, 'Snack', 2),
(9, 'Glace', 3),
(10, 'Crème', 3),
(11, 'Tarte', 3),
(12, 'Classique', 4),
(13, 'Calzone', 4),
(14, 'Complète', 4),
(15, 'Chaud', 5),
(16, 'Froid', 5);

-- --------------------------------------------------------

--
-- Structure de la table `type_commande`
--

CREATE TABLE `type_commande` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `type_commande`
--

INSERT INTO `type_commande` (`id`, `libelle`) VALUES
(1, 'retrait'),
(2, 'livraison'),
(3, 'restaurant');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `groupe_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `login`, `mdp`, `groupe_id`) VALUES
(1, 'root', '$2y$10$APK/h9s9YWKqM5YY3/o6guUUpTaAtrNPCP59M/y9tXvqGnqpCgCnq', 1);

-- --------------------------------------------------------

--
-- Structure de la table `valeur_option`
--

CREATE TABLE `valeur_option` (
  `id` int(11) NOT NULL,
  `valeur` varchar(255) NOT NULL,
  `option_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `valeur_option`
--

INSERT INTO `valeur_option` (`id`, `valeur`, `option_id`) VALUES
(1, 'Ketchup', 1),
(2, 'Mayonnaise', 1),
(3, 'Andalouse', 1),
(4, 'Algérienne', 1),
(5, 'Poivre', 1),
(6, 'Moutarde', 1),
(7, 'Blanche', 1),
(8, 'BBQ', 1),
(9, 'Samuraï', 1),
(10, 'Bicky', 1),
(11, 'Quantité', 2),
(12, 'Quantité', 3),
(13, 'Quantité', 4),
(14, 'Tomates', 5),
(15, 'Crème Fraîche', 5),
(16, 'Aucune', 5),
(17, 'Quantité', 6),
(18, 'Quantité', 7),
(19, 'Quantité', 8),
(20, 'Quantité', 9),
(21, 'Quantité', 10),
(22, 'Quantité', 11),
(23, 'Quantité', 12),
(24, 'Quantité', 13),
(25, 'Quantité', 14),
(26, 'Quantité', 15),
(27, 'Quantité', 16),
(28, 'Quantité', 17),
(29, 'Quantité', 18),
(30, 'Quantité', 19),
(31, 'Quantité', 20),
(32, 'Quantité', 21),
(33, 'Quantité', 22),
(34, 'Quantité', 23),
(35, 'Quantité', 24),
(36, 'Quantité', 25),
(37, 'Quantité', 26),
(38, 'Quantité', 27),
(39, 'Quantité', 28),
(40, 'Quantité', 29),
(41, 'Quantité', 30),
(42, 'Quantité', 31),
(43, 'Quantité', 32),
(44, 'Quantité', 33),
(45, 'Quantité', 34),
(46, 'Quantité', 35),
(47, 'Quantité', 36),
(48, 'Bleu', 37),
(49, 'Saignant', 37),
(50, 'A Point', 37),
(51, 'Cramé', 37),
(52, 'Quantité', 37),
(53, 'Quantité', 38),
(54, 'Quantité', 39),
(55, 'Quantité', 40),
(56, 'Quantité', 41),
(57, 'Quantité', 42),
(58, 'Quantité', 43),
(59, 'Quantité', 44),
(60, 'Quantité', 45),
(61, 'Quantité', 46),
(62, 'Quantité', 47),
(63, 'Quantité', 48),
(64, 'Quantité', 49),
(65, 'Quantité', 50),
(66, 'Quantité', 51),
(67, 'Quantité', 52),
(68, 'Quantité', 53),
(69, 'Quantité', 54),
(70, 'Quantité', 55),
(71, 'Quantité', 56),
(72, 'Quantité', 57),
(73, 'Quantité', 58);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `compo_menu`
--
ALTER TABLE `compo_menu`
  ADD PRIMARY KEY (`menu_id`,`produit_id`);

--
-- Index pour la table `compo_produit`
--
ALTER TABLE `compo_produit`
  ADD PRIMARY KEY (`produit_id`,`option_id`);

--
-- Index pour la table `custom_produit`
--
ALTER TABLE `custom_produit`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `etat_commande`
--
ALTER TABLE `etat_commande`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `groupe`
--
ALTER TABLE `groupe`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `option_produit`
--
ALTER TABLE `option_produit`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `paiement`
--
ALTER TABLE `paiement`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sscategorie`
--
ALTER TABLE `sscategorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type_commande`
--
ALTER TABLE `type_commande`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `valeur_option`
--
ALTER TABLE `valeur_option`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `custom_produit`
--
ALTER TABLE `custom_produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `etat_commande`
--
ALTER TABLE `etat_commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `groupe`
--
ALTER TABLE `groupe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `option_produit`
--
ALTER TABLE `option_produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT pour la table `paiement`
--
ALTER TABLE `paiement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;
--
-- AUTO_INCREMENT pour la table `sscategorie`
--
ALTER TABLE `sscategorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT pour la table `type_commande`
--
ALTER TABLE `type_commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `valeur_option`
--
ALTER TABLE `valeur_option`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
