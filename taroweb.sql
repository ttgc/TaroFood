-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mer 16 Janvier 2019 à 15:46
-- Version du serveur :  5.7.14
-- Version de PHP :  7.0.10

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
  `client_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `compo_menu`
--

CREATE TABLE `compo_menu` (
  `menu_id` int(11) NOT NULL,
  `produit_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

CREATE TABLE `groupe` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Structure de la table `paiement`
--

CREATE TABLE `paiement` (
  `id` int(11) NOT NULL,
  `libelle` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(62, 'Kebab', 4, NULL, 8),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `groupe`
--
ALTER TABLE `groupe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `option_produit`
--
ALTER TABLE `option_produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `paiement`
--
ALTER TABLE `paiement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `valeur_option`
--
ALTER TABLE `valeur_option`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
