-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Sam 21 Mars 2020 à 22:55
-- Version du serveur :  10.3.22-MariaDB-0+deb10u1
-- Version de PHP :  7.3.11-1~deb10u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet_tut`
--

-- --------------------------------------------------------

--
-- Structure de la table `equipe`
--

CREATE TABLE `equipe` (
  `id_equipe` bigint(20) UNSIGNED NOT NULL,
  `nom_equipe` varchar(100) NOT NULL,
  `id_jeu` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `equipe`
--

INSERT INTO `equipe` (`id_equipe`, `nom_equipe`, `id_jeu`) VALUES
(1, 'Atlanta Reign', 3),
(2, 'Boston uprising', 3),
(3, 'Florida Mayhem', 3),
(4, 'Houston Outlaws', 3),
(5, 'London Spitfire', 3),
(6, 'New York Excelsior', 3),
(7, 'Team Secret', 2),
(8, 'Virtus pro', 2),
(9, 'Vici Gaming', 2),
(10, 'Evil Geniuses', 2),
(11, 'Team liquid', 2);

-- --------------------------------------------------------

--
-- Structure de la table `event_ulco`
--

CREATE TABLE `event_ulco` (
  `debut` datetime NOT NULL,
  `intitule` varchar(200) DEFAULT NULL,
  `fin` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `historique_match`
--

CREATE TABLE `historique_match` (
  `id_match` bigint(20) UNSIGNED NOT NULL,
  `date_match` date NOT NULL,
  `score_eq1` int(11) DEFAULT NULL,
  `score_eq2` int(11) DEFAULT NULL,
  `nom_eq2` varchar(100) DEFAULT NULL,
  `nom_eq1` varchar(100) DEFAULT NULL,
  `id_jeu` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `historique_match`
--

INSERT INTO `historique_match` (`id_match`, `date_match`, `score_eq1`, `score_eq2`, `nom_eq2`, `nom_eq1`, `id_jeu`) VALUES
(6, '2000-10-16', 1, 1, 'Non', 'Oui', 4),
(7, '2000-10-15', 1, 1, 'Non', 'Oui', 4),
(8, '2000-10-15', 1, 1, 'Non', 'Oui', 1),
(9, '2000-10-15', 1, 1, 'Non', 'Oui', 2),
(10, '2000-10-15', 1, 1, 'Non', 'Oui', 3);

-- --------------------------------------------------------

--
-- Structure de la table `intitule_pari`
--

CREATE TABLE `intitule_pari` (
  `id_intitule` bigint(20) UNSIGNED NOT NULL,
  `equipe1` int(11) NOT NULL,
  `equipe2` int(11) NOT NULL,
  `id_jeu` int(11) NOT NULL,
  `debut` datetime DEFAULT NULL,
  `fin` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `intitule_pari`
--

INSERT INTO `intitule_pari` (`id_intitule`, `equipe1`, `equipe2`, `id_jeu`, `debut`, `fin`) VALUES
(20, 6, 2, 3, '2020-03-20 20:00:00', '2020-03-20 23:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `jeu`
--

CREATE TABLE `jeu` (
  `id_jeu` bigint(20) UNSIGNED NOT NULL,
  `nom_jeu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `jeu`
--

INSERT INTO `jeu` (`id_jeu`, `nom_jeu`) VALUES
(1, 'hearthstone'),
(2, 'dota'),
(3, 'overwatch'),
(4, 'league of legends');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id_mess` bigint(20) UNSIGNED NOT NULL,
  `id_uti` bigint(20) UNSIGNED NOT NULL,
  `id_jeu` bigint(20) UNSIGNED NOT NULL,
  `texte` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `messages`
--

INSERT INTO `messages` (`id_mess`, `id_uti`, `id_jeu`, `texte`) VALUES
(78, 13, 4, 'oui'),
(79, 13, 4, 'oui'),
(80, 13, 4, 'ok boomer'),
(81, 13, 4, 'tg fdp'),
(82, 15, 4, 'salut'),
(83, 13, 4, 'yo'),
(84, 13, 4, 'Ca va?'),
(85, 15, 4, 't ki'),
(86, 13, 4, 'ptdr t ki'),
(87, 15, 4, 'chez moi aussi c\'est bugé un peu'),
(88, 15, 4, 'le coté'),
(89, 13, 4, 'Parcontre c\'est chiant'),
(90, 13, 4, ''),
(91, 15, 4, 'ah non '),
(92, 13, 4, ''),
(93, 15, 4, 'what'),
(94, 13, 4, 'On voit pas si il y\'a des nvx messages'),
(95, 15, 4, 'ptn fait descendre ala main'),
(96, 13, 4, 'Wtf'),
(97, 15, 4, ''),
(98, 15, 4, 'att'),
(99, 13, 4, ''),
(100, 13, 4, ''),
(101, 13, 4, ''),
(102, 13, 4, ''),
(103, 15, 4, ''),
(104, 15, 4, 'p'),
(105, 13, 4, ''),
(106, 13, 4, ''),
(107, 13, 4, ''),
(108, 15, 4, 'p'),
(109, 15, 4, 'p'),
(110, 13, 4, 'Je fix ça'),
(111, 15, 4, 'l'),
(112, 15, 4, 'salut'),
(113, 13, 4, 'oui'),
(114, 13, 4, 'oui'),
(115, 13, 4, 'salut'),
(116, 13, 4, 'coucou'),
(117, 15, 4, 'ici thooms'),
(118, 13, 4, '5/5'),
(119, 15, 4, 'tg peio'),
(120, 13, 4, 'logique'),
(121, 18, 4, 'ui'),
(122, 18, 3, 'k'),
(123, 18, 3, 'k'),
(124, 18, 3, 'kk'),
(125, 18, 3, 'kk'),
(126, 18, 3, 'k'),
(127, 18, 3, 'k'),
(128, 18, 3, 'k'),
(129, 18, 3, 'k'),
(130, 18, 3, 'bonjour'),
(131, 19, 4, 'salut');

-- --------------------------------------------------------

--
-- Structure de la table `pari`
--

CREATE TABLE `pari` (
  `id_pari` bigint(20) UNSIGNED NOT NULL,
  `id_uti` bigint(20) UNSIGNED NOT NULL,
  `id_intitule` bigint(20) UNSIGNED NOT NULL,
  `id_equipe_pari` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `pari`
--

INSERT INTO `pari` (`id_pari`, `id_uti`, `id_intitule`, `id_equipe_pari`) VALUES
(23, 14, 20, 6);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_uti` bigint(20) UNSIGNED NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `mail` varchar(100) DEFAULT NULL,
  `univ` varchar(50) DEFAULT NULL,
  `role` varchar(50) DEFAULT 'membre',
  `token_site` int(11) DEFAULT 0,
  `token_ulco` int(11) DEFAULT 0,
  `cote` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_uti`, `pseudo`, `password`, `mail`, `univ`, `role`, `token_site`, `token_ulco`, `cote`) VALUES
(13, 'admin', 'admin', 'gwendal.garenaux@gmail.com', NULL, 'admin', 0, 0, 0),
(14, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'gwendal.garenaux@gmail.com', '', 'admin', 0, 0, 0),
(15, 'benoit', '0b36e58acc0a3c7f807b049c935f3b94', 'benoit.benoit@benoit.fr', '', 'membre', 0, 0, 0),
(19, 'maman', '6ffee7d3af984c95d72d813efda2d919', 'maman.maman@maman.fr', '', 'membre', 0, 0, 0),
(11, 'non', 'non', 'gwendal.garenaux@gmail.com', '', 'membre', 0, 0, 0),
(17, 'non', '7b57f31bea0ae2e9c8e2985a285b922d', 'gwendal.garenaux@gmail.com', '', 'membre', 0, 0, 0),
(10, 'oui', 'oui', 'gwendal.garenaux@gmail.com', '', 'admin', 0, 0, 0),
(16, 'oui', 'b2a5abfeef9e36964281a31e17b57c97', 'gwendal.garenaux@gmail.com', '', 'membre', 0, 0, 0),
(8, 'Ténébra', 'ouitkt', 'benoit.tkt@tkt.fr', '', 'admin', 0, 0, 0),
(18, 'Thooms', 'ef6e65efc188e7dffd7335b646a85a21', 'thomas.thomas@thomas.fr', '', 'admin', 0, 0, 0),
(7, 'Tkt', 'oui', 'Sisi@gmail.com', '', 'membre', 0, 0, 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `equipe`
--
ALTER TABLE `equipe`
  ADD PRIMARY KEY (`id_equipe`),
  ADD UNIQUE KEY `id_equipe` (`id_equipe`),
  ADD KEY `fk_jeu_equipe` (`id_jeu`);

--
-- Index pour la table `event_ulco`
--
ALTER TABLE `event_ulco`
  ADD PRIMARY KEY (`debut`);

--
-- Index pour la table `historique_match`
--
ALTER TABLE `historique_match`
  ADD PRIMARY KEY (`id_match`,`date_match`),
  ADD UNIQUE KEY `id_match` (`id_match`);

--
-- Index pour la table `intitule_pari`
--
ALTER TABLE `intitule_pari`
  ADD PRIMARY KEY (`id_intitule`),
  ADD UNIQUE KEY `id_pari` (`id_intitule`);

--
-- Index pour la table `jeu`
--
ALTER TABLE `jeu`
  ADD PRIMARY KEY (`id_jeu`),
  ADD UNIQUE KEY `id_jeu` (`id_jeu`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD UNIQUE KEY `id_mess` (`id_mess`),
  ADD KEY `fk_uti_mess` (`id_uti`),
  ADD KEY `fk_jeu_mess` (`id_jeu`);

--
-- Index pour la table `pari`
--
ALTER TABLE `pari`
  ADD PRIMARY KEY (`id_pari`),
  ADD UNIQUE KEY `id_pari` (`id_pari`),
  ADD KEY `fk_util_pari` (`id_uti`),
  ADD KEY `fk_intitule_pari` (`id_intitule`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`pseudo`,`id_uti`),
  ADD UNIQUE KEY `id_uti` (`id_uti`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `equipe`
--
ALTER TABLE `equipe`
  MODIFY `id_equipe` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `historique_match`
--
ALTER TABLE `historique_match`
  MODIFY `id_match` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `intitule_pari`
--
ALTER TABLE `intitule_pari`
  MODIFY `id_intitule` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT pour la table `jeu`
--
ALTER TABLE `jeu`
  MODIFY `id_jeu` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id_mess` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;
--
-- AUTO_INCREMENT pour la table `pari`
--
ALTER TABLE `pari`
  MODIFY `id_pari` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_uti` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `equipe`
--
ALTER TABLE `equipe`
  ADD CONSTRAINT `fk_jeu_equipe` FOREIGN KEY (`id_jeu`) REFERENCES `jeu` (`id_jeu`);

--
-- Contraintes pour la table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `fk_jeu_mess` FOREIGN KEY (`id_jeu`) REFERENCES `jeu` (`id_jeu`),
  ADD CONSTRAINT `fk_uti_mess` FOREIGN KEY (`id_uti`) REFERENCES `utilisateur` (`id_uti`);

--
-- Contraintes pour la table `pari`
--
ALTER TABLE `pari`
  ADD CONSTRAINT `fk_intitule_pari` FOREIGN KEY (`id_intitule`) REFERENCES `intitule_pari` (`id_intitule`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_util_pari` FOREIGN KEY (`id_uti`) REFERENCES `utilisateur` (`id_uti`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
