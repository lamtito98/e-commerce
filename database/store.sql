-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 06 juil. 2020 à 04:27
-- Version du serveur :  10.1.37-MariaDB
-- Version de PHP :  7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `store`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `id_administrateur` int(11) NOT NULL,
  `nom_administrateur` varchar(30) NOT NULL,
  `prenom_administrateur` varchar(40) NOT NULL,
  `username` varchar(15) NOT NULL,
  `mot_de_passe` varchar(100) NOT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`id_administrateur`, `nom_administrateur`, `prenom_administrateur`, `username`, `mot_de_passe`, `email`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', 'admin @admin.com');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id_categorie` int(11) NOT NULL,
  `nom_categorie` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `nom_categorie`) VALUES
(1, 'Iphone'),
(2, 'Samsung'),
(3, 'LG'),
(4, 'Motorola'),
(5, 'Laptop'),
(6, 'Montre'),
(7, 'Watchphone'),
(8, 'LG');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id_commande` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `date_commande` datetime NOT NULL,
  `prix_total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id_commande`, `id_user`, `date_commande`, `prix_total`) VALUES
(1, 1, '2020-06-24 00:00:00', 700);

-- --------------------------------------------------------

--
-- Structure de la table `commande_produit`
--

CREATE TABLE `commande_produit` (
  `id_produit` int(11) NOT NULL,
  `id_commande` int(11) NOT NULL,
  `prix_total` float NOT NULL,
  `qte_commander` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commande_produit`
--

INSERT INTO `commande_produit` (`id_produit`, `id_commande`, `prix_total`, `qte_commander`) VALUES
(2, 1, 700, 1);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id_produit` int(11) NOT NULL,
  `id_categorie` int(11) DEFAULT NULL,
  `nom_produit` varchar(40) NOT NULL,
  `description_produit` varchar(400) NOT NULL,
  `desc_courte_produit` varchar(50) NOT NULL,
  `prix` float NOT NULL,
  `qte` int(11) NOT NULL DEFAULT '0',
  `id_administrateur` int(11) DEFAULT NULL,
  `images` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id_produit`, `id_categorie`, `nom_produit`, `description_produit`, `desc_courte_produit`, `prix`, `qte`, `id_administrateur`, `images`) VALUES
(1, 1, 'Iphone SE', 'L\'iPhone SE est un smartphone de 4 pouces, qui abrite l\'Apple A9, comme sur l\'iPhone 6S. Son design est très similaire aux l\'iPhone 5 et 5S. Le bouton central du smartphone embarque un capteur d’empreintes, secondé par une puce NFC, ce qui fait donc de cet iPhone SE un argument fort pour Apple, qui cherche à développer son système de paiement mobile.', 'Iphone 2020', 600, 6, 1, 'img/iphone_se.jpg'),
(2, 1, 'Iphone Xr', 'Apple iPhone XR est un smartphone de 2018 pesant 194 grammes et mesurant 150.9 x 75.7 x 8.3 mm. Avec un écran de 6.1 pouces, un appareil photo 12 MP et une mémoire 64/128/256 GB, 3 GB RAM. Son processeur est Hexa-core (2x2.5 GHz Vortex + 4x1.6 GHz Tempest)', 'Iphone Xr', 700, 10, 1, 'img/iphone_xr.jpg'),
(4, 2, 'Samsung Galaxy s20 Plus', 'ifjf', 'Galaxy S20 Plus', 1500, 5, 1, 'img/s20.jpg'),
(6, 2, 'Samsung Galaxy A80', 'dpeddpdeew', 'Galaxy A80', 450, 3, 1, 'img/A80.jpg'),
(11, 1, 'Iphone 4S+', 'ancien Iphone', 'Iphone 4 SPlus', 80, 7, 1, 'img/iphone4.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_user` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `mot_de_passe` varchar(100) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(40) NOT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_user`, `username`, `mot_de_passe`, `nom`, `prenom`, `email`) VALUES
(1, 'lamson', '1234567890-', 'Estimond', 'Lamson', 'lamsonestimond2@gmail.com');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`id_administrateur`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_commande`),
  ADD KEY `fk_id_user` (`id_user`);

--
-- Index pour la table `commande_produit`
--
ALTER TABLE `commande_produit`
  ADD PRIMARY KEY (`id_produit`,`id_commande`),
  ADD KEY `fk_id_commande_produit` (`id_commande`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id_produit`),
  ADD UNIQUE KEY `nom_produit` (`nom_produit`),
  ADD KEY `fk_id_administrateur` (`id_administrateur`),
  ADD KEY `fk_id_categorie` (`id_categorie`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `id_administrateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_commande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id_produit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `fk_id_user` FOREIGN KEY (`id_user`) REFERENCES `utilisateur` (`id_user`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `commande_produit`
--
ALTER TABLE `commande_produit`
  ADD CONSTRAINT `fk_id_commande_produit` FOREIGN KEY (`id_commande`) REFERENCES `commande` (`id_commande`),
  ADD CONSTRAINT `fk_produit_commande` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `fk_id_administrateur` FOREIGN KEY (`id_administrateur`) REFERENCES `administrateur` (`id_administrateur`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_categorie` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id_categorie`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
