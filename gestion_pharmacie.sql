-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 16 mai 2022 à 15:09
-- Version du serveur : 10.4.20-MariaDB
-- Version de PHP : 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_pharmacie`
--

-- --------------------------------------------------------

--
-- Structure de la table `calendrier`
--

CREATE TABLE `calendrier` (
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `calendrier`
--

INSERT INTO `calendrier` (`date`) VALUES
('0000-00-00'),
('1970-01-01'),
('2021-05-12'),
('2021-07-08'),
('2021-08-11'),
('2021-08-13'),
('2021-08-14'),
('2021-08-18'),
('2021-08-19'),
('2021-08-20'),
('2021-08-21'),
('2021-08-22'),
('2021-08-23'),
('2021-08-24'),
('2021-08-25'),
('2021-08-26'),
('2021-08-27'),
('2021-08-28'),
('2021-08-29'),
('2021-09-01'),
('2021-09-12'),
('2021-09-13'),
('2021-10-19'),
('2021-10-27'),
('2021-11-13'),
('2021-11-17'),
('2021-11-24'),
('2021-11-26'),
('2021-12-22'),
('2022-01-12'),
('2022-06-08'),
('2023-07-06'),
('2028-10-18'),
('2029-07-05'),
('2029-08-16'),
('2030-01-30'),
('2033-07-07'),
('2036-10-15'),
('2040-07-06'),
('2052-03-01');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id_client` int(11) NOT NULL,
  `nomComplet` varchar(25) NOT NULL,
  `telephone` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id_client`, `nomComplet`, `telephone`, `email`) VALUES
(2, 'CHAFIK', '0766589066', 'chafikyousr43@gmail.com'),
(4, 'abdrahman', '0678999455', 'abdrahman71@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `comporter`
--

CREATE TABLE `comporter` (
  `idfacture` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `nfacture` varchar(50) NOT NULL,
  `code_medica` varchar(25) NOT NULL,
  `depot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `comporter`
--

INSERT INTO `comporter` (`idfacture`, `quantite`, `nfacture`, `code_medica`, `depot`) VALUES
(110, 3, '9', 'P005', 4),
(124, 2, '10', 'P005', 4),
(125, 2, '10', 'P005', 4),
(126, 2, '1', 'P0034', 3),
(127, 1, '2', 'P0034', 3),
(128, 3, '3', 'P0034', 3),
(129, 3, '20', 'P005', 4);

-- --------------------------------------------------------

--
-- Structure de la table `depot`
--

CREATE TABLE `depot` (
  `N_depot` int(11) NOT NULL,
  `ville` varchar(25) NOT NULL,
  `nom_depot` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `depot`
--

INSERT INTO `depot` (`N_depot`, `ville`, `nom_depot`) VALUES
(3, 'tanger', 'tawfik'),
(4, 'safi', 'narjiss'),
(5, 'FES', 'talis');

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

CREATE TABLE `facture` (
  `N_facture` varchar(50) NOT NULL,
  `date_facture` date NOT NULL,
  `idclient` int(11) NOT NULL,
  `nbrproduits` int(11) NOT NULL,
  `MHT` int(11) NOT NULL,
  `id_paiement` int(11) NOT NULL,
  `remise` int(11) NOT NULL,
  `avance` int(11) NOT NULL,
  `MTTC` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `facture`
--

INSERT INTO `facture` (`N_facture`, `date_facture`, `idclient`, `nbrproduits`, `MHT`, `id_paiement`, `remise`, `avance`, `MTTC`) VALUES
('1', '2021-10-19', 2, 1, 40, 1, 0, 10, 48),
('10', '2021-08-29', 4, 2, 4000, 1, 0, 100, 4800),
('2', '2021-10-19', 2, 1, 20, 1, 0, 0, 24),
('20', '2021-11-13', 2, 1, 3000, 1, 0, 0, 3600),
('22', '2021-09-12', 2, 1, 150, 1, 5, 10, 173),
('3', '2021-10-19', 2, 1, 60, 1, 0, 0, 72),
('6', '2021-08-28', 4, 1, 400, 1, 0, 0, 480),
('8', '2021-08-28', 4, 1, 40, 1, 0, 0, 48),
('9', '2021-08-28', 2, 2, 3080, 1, 0, 0, 3696);

-- --------------------------------------------------------

--
-- Structure de la table `famiile`
--

CREATE TABLE `famiile` (
  `id_famille` int(11) NOT NULL,
  `libellé_famille` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `famiile`
--

INSERT INTO `famiile` (`id_famille`, `libellé_famille`) VALUES
(1, 'Antibiotique'),
(2, 'Anti-flammatoire'),
(3, 'absorbant intestinal'),
(4, 'Analgesiques simples'),
(5, 'Analgésiques narcotiques '),
(6, 'prémédications anesthésiques'),
(7, 'Anesthésiques généraux et oxygène'),
(8, 'Anti epleptiques');

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

CREATE TABLE `fournisseur` (
  `id_fournisseur` int(11) NOT NULL,
  `nomComplet` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `tel` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `fournisseur`
--

INSERT INTO `fournisseur` (`id_fournisseur`, `nomComplet`, `email`, `tel`) VALUES
(2, 'ROUIFI', 'rouifi30@gmail.com', '578904437'),
(4, 'FAOUZI', 'fouzi40@gmail.com', '577890535'),
(8, 'brahim chkiri', 'brahim45@gmail.com', '699887744'),
(10, 'khalid SABIR', 'hachem@gmail.com', '0699887744'),
(11, 'SI', 'contact@gmail.com', '0678999455');

-- --------------------------------------------------------

--
-- Structure de la table `medicament`
--

CREATE TABLE `medicament` (
  `code` varchar(25) NOT NULL,
  `libellé` varchar(25) NOT NULL,
  `date_experation` date NOT NULL,
  `id_famille` int(11) NOT NULL,
  `prixvente` int(11) NOT NULL,
  `stockmini` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `medicament`
--

INSERT INTO `medicament` (`code`, `libellé`, `date_experation`, `id_famille`, `prixvente`, `stockmini`) VALUES
('P003', 'medica', '2022-08-24', 3, 401, 0),
('P0034', 'aspigic', '2025-10-15', 1, 20, 0),
('P004', 'Advil sirop', '2025-08-19', 2, 50, 0),
('P005', 'Actapulgite boite', '2022-08-03', 3, 1000, 20),
('P006', 'Actrapid inj', '2022-12-07', 1, 70, 0),
('P007', 'remix', '2019-08-13', 1, 25, 0),
('P008', 'REMICINE', '2021-08-12', 1, 35, 0);

-- --------------------------------------------------------

--
-- Structure de la table `medica_livré`
--

CREATE TABLE `medica_livré` (
  `id_livré` int(11) NOT NULL,
  `QT_livré` int(11) NOT NULL,
  `code_medica` varchar(25) NOT NULL,
  `idfournisseur` int(11) NOT NULL,
  `date` date NOT NULL,
  `prixachat` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `medica_livré`
--

INSERT INTO `medica_livré` (`id_livré`, `QT_livré`, `code_medica`, `idfournisseur`, `date`, `prixachat`) VALUES
(5, 13, 'P004', 10, '2021-08-22', 40);

-- --------------------------------------------------------

--
-- Structure de la table `medica_stocké`
--

CREATE TABLE `medica_stocké` (
  `id_stocké` int(11) NOT NULL,
  `ndepot` int(11) NOT NULL,
  `code_medica` varchar(25) NOT NULL,
  `QT_stocké` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `medica_stocké`
--

INSERT INTO `medica_stocké` (`id_stocké`, `ndepot`, `code_medica`, `QT_stocké`, `date`) VALUES
(4, 4, 'P005', 25, '2021-08-14'),
(8, 5, 'P007', 10, '2021-08-14'),
(16, 3, 'P005', 0, '2021-08-29'),
(18, 3, 'P0034', 2, '2021-08-26');

-- --------------------------------------------------------

--
-- Structure de la table `medica_vendu`
--

CREATE TABLE `medica_vendu` (
  `id_vendu` int(11) NOT NULL,
  `QT_vendu` int(11) NOT NULL,
  `code_medica` varchar(25) NOT NULL,
  `idclient` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `medica_vendu`
--

INSERT INTO `medica_vendu` (`id_vendu`, `QT_vendu`, `code_medica`, `idclient`, `date`) VALUES
(117, 3, 'P005 ', 2, '2021-08-14'),
(118, 3, 'P005 ', 2, '2021-08-11'),
(119, 3, 'P005 ', 2, '2021-08-18'),
(136, 10, 'P005  ', 2, '2021-08-26'),
(143, 10, 'P005 ', 2, '2021-08-25'),
(148, 2, 'P005', 4, '2021-08-29'),
(149, 2, 'P005', 4, '2021-08-29'),
(150, 2, 'P0034', 2, '2021-10-19'),
(151, 1, 'P0034', 2, '2021-10-19'),
(152, 3, 'P0034', 2, '2021-10-19'),
(153, 3, 'P005', 2, '2021-11-13');

-- --------------------------------------------------------

--
-- Structure de la table `type_paiement`
--

CREATE TABLE `type_paiement` (
  `id_paiement` int(11) NOT NULL,
  `type_paiement` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `type_paiement`
--

INSERT INTO `type_paiement` (`id_paiement`, `type_paiement`) VALUES
(1, 'chèque'),
(2, 'espèce'),
(3, 'virement bancaire');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id_utilisateur` int(11) NOT NULL,
  `nomComplet` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  `mot_de_passe` varchar(50) NOT NULL,
  `pharmacie` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telephone` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_utilisateur`, `nomComplet`, `login`, `mot_de_passe`, `pharmacie`, `email`, `telephone`) VALUES
(1, 'salma fassi', 'admin', 'fassi', 'LA REFERENCE', 'salmafassi72@gmail.com', '065540308'),
(2, 'hajar amrani', 'admin', 'hajar', 'JOULANE', 'amrani@gmail.com', '0655778899');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `calendrier`
--
ALTER TABLE `calendrier`
  ADD PRIMARY KEY (`date`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`);

--
-- Index pour la table `comporter`
--
ALTER TABLE `comporter`
  ADD PRIMARY KEY (`idfacture`),
  ADD KEY `nfacture` (`nfacture`),
  ADD KEY `code_medica` (`code_medica`);

--
-- Index pour la table `depot`
--
ALTER TABLE `depot`
  ADD PRIMARY KEY (`N_depot`);

--
-- Index pour la table `facture`
--
ALTER TABLE `facture`
  ADD PRIMARY KEY (`N_facture`),
  ADD KEY `idclient` (`idclient`),
  ADD KEY `type_paiement` (`id_paiement`);

--
-- Index pour la table `famiile`
--
ALTER TABLE `famiile`
  ADD PRIMARY KEY (`id_famille`);

--
-- Index pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  ADD PRIMARY KEY (`id_fournisseur`);

--
-- Index pour la table `medicament`
--
ALTER TABLE `medicament`
  ADD PRIMARY KEY (`code`),
  ADD KEY `id_famille` (`id_famille`);

--
-- Index pour la table `medica_livré`
--
ALTER TABLE `medica_livré`
  ADD PRIMARY KEY (`id_livré`),
  ADD KEY `code_medica` (`code_medica`),
  ADD KEY `idfournisseur` (`idfournisseur`),
  ADD KEY `date` (`date`);

--
-- Index pour la table `medica_stocké`
--
ALTER TABLE `medica_stocké`
  ADD PRIMARY KEY (`id_stocké`),
  ADD KEY `code_medica` (`code_medica`),
  ADD KEY `date` (`date`),
  ADD KEY `ndepot` (`ndepot`);

--
-- Index pour la table `medica_vendu`
--
ALTER TABLE `medica_vendu`
  ADD PRIMARY KEY (`id_vendu`),
  ADD KEY `code_medica` (`code_medica`),
  ADD KEY `idclient` (`idclient`),
  ADD KEY `date` (`date`);

--
-- Index pour la table `type_paiement`
--
ALTER TABLE `type_paiement`
  ADD PRIMARY KEY (`id_paiement`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `comporter`
--
ALTER TABLE `comporter`
  MODIFY `idfacture` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT pour la table `depot`
--
ALTER TABLE `depot`
  MODIFY `N_depot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `famiile`
--
ALTER TABLE `famiile`
  MODIFY `id_famille` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  MODIFY `id_fournisseur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `medica_livré`
--
ALTER TABLE `medica_livré`
  MODIFY `id_livré` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `medica_stocké`
--
ALTER TABLE `medica_stocké`
  MODIFY `id_stocké` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `medica_vendu`
--
ALTER TABLE `medica_vendu`
  MODIFY `id_vendu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT pour la table `type_paiement`
--
ALTER TABLE `type_paiement`
  MODIFY `id_paiement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comporter`
--
ALTER TABLE `comporter`
  ADD CONSTRAINT `comporter_ibfk_1` FOREIGN KEY (`nfacture`) REFERENCES `facture` (`N_facture`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comporter_ibfk_2` FOREIGN KEY (`code_medica`) REFERENCES `medicament` (`code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `facture`
--
ALTER TABLE `facture`
  ADD CONSTRAINT `facture_ibfk_1` FOREIGN KEY (`idclient`) REFERENCES `client` (`id_client`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `facture_ibfk_2` FOREIGN KEY (`id_paiement`) REFERENCES `type_paiement` (`id_paiement`);

--
-- Contraintes pour la table `medicament`
--
ALTER TABLE `medicament`
  ADD CONSTRAINT `medicament_ibfk_1` FOREIGN KEY (`id_famille`) REFERENCES `famiile` (`id_famille`);

--
-- Contraintes pour la table `medica_livré`
--
ALTER TABLE `medica_livré`
  ADD CONSTRAINT `medica_livré_ibfk_1` FOREIGN KEY (`code_medica`) REFERENCES `medicament` (`code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `medica_livré_ibfk_3` FOREIGN KEY (`date`) REFERENCES `calendrier` (`date`),
  ADD CONSTRAINT `medica_livré_ibfk_4` FOREIGN KEY (`idfournisseur`) REFERENCES `fournisseur` (`id_fournisseur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `medica_stocké`
--
ALTER TABLE `medica_stocké`
  ADD CONSTRAINT `medica_stocké_ibfk_1` FOREIGN KEY (`ndepot`) REFERENCES `depot` (`N_depot`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `medica_stocké_ibfk_2` FOREIGN KEY (`code_medica`) REFERENCES `medicament` (`code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `medica_stocké_ibfk_3` FOREIGN KEY (`date`) REFERENCES `calendrier` (`date`);

--
-- Contraintes pour la table `medica_vendu`
--
ALTER TABLE `medica_vendu`
  ADD CONSTRAINT `medica_vendu_ibfk_1` FOREIGN KEY (`code_medica`) REFERENCES `medicament` (`code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `medica_vendu_ibfk_2` FOREIGN KEY (`idclient`) REFERENCES `client` (`id_client`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `medica_vendu_ibfk_3` FOREIGN KEY (`date`) REFERENCES `calendrier` (`date`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
