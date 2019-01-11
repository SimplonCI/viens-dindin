-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Ven 11 Janvier 2019 à 00:00
-- Version du serveur :  5.7.24-2
-- Version de PHP :  7.2.11-3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `viens-dindin`
--

-- --------------------------------------------------------

--
-- Structure de la table `abonement`
--

CREATE TABLE `abonement` (
  `id` int(11) NOT NULL,
  `premium_abonnement` tinyint(1) DEFAULT '0',
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `prix` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `bande_annonce`
--

CREATE TABLE `bande_annonce` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `resume` text NOT NULL,
  `lien_video` text NOT NULL,
  `cover` longtext NOT NULL,
  `root_id` int(11) NOT NULL,
  `categorie_id` int(11) NOT NULL,
  `date_creation` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `icon` longtext NOT NULL,
  `root_id` int(11) NOT NULL,
  `date_creation` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE `compte` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `telephone` int(11) NOT NULL,
  `carte` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `episode`
--

CREATE TABLE `episode` (
  `id` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `date_sortie` date NOT NULL,
  `lien_episode` text NOT NULL,
  `serie_id` int(11) NOT NULL,
  `saison_id` int(11) NOT NULL,
  `date_creation` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `favoris_episode`
--

CREATE TABLE `favoris_episode` (
  `id` int(11) NOT NULL,
  `episode_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `love` tinyint(1) NOT NULL DEFAULT '0',
  `unlove` tinyint(1) NOT NULL DEFAULT '0',
  `date_creation` date NOT NULL,
  `date_update` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `favoris_film`
--

CREATE TABLE `favoris_film` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `film_id` int(11) NOT NULL,
  `love` tinyint(1) NOT NULL,
  `unlove` int(11) NOT NULL,
  `date_creation` date NOT NULL,
  `date_update` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `film`
--

CREATE TABLE `film` (
  `id` int(11) NOT NULL,
  `date_de_sortie` date NOT NULL,
  `duree` varchar(255) NOT NULL,
  `realisateur` varchar(255) NOT NULL,
  `acteurs_principals` varchar(255) NOT NULL,
  `categorie_id` int(11) NOT NULL,
  `lien_film` text NOT NULL,
  `cover_film` longtext NOT NULL,
  `root_id` int(11) NOT NULL,
  `date_creation` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `like_episode`
--

CREATE TABLE `like_episode` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `episode_id` int(11) NOT NULL,
  `unlike_episode` tinyint(1) NOT NULL DEFAULT '0',
  `like_episode` tinyint(1) NOT NULL DEFAULT '0',
  `date_creation` date NOT NULL,
  `date_update` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `like_film`
--

CREATE TABLE `like_film` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `film_id` int(11) NOT NULL,
  `like_film` int(11) NOT NULL DEFAULT '0',
  `unlike_film` int(11) NOT NULL DEFAULT '0',
  `date_creation` date NOT NULL,
  `date_update` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `payement`
--

CREATE TABLE `payement` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type_payement` varchar(255) NOT NULL,
  `date_payement` date NOT NULL,
  `prix` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `playlist_film`
--

CREATE TABLE `playlist_film` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `film_id` int(11) NOT NULL,
  `date_creation` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `playlist_serie`
--

CREATE TABLE `playlist_serie` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `episode_id` int(11) NOT NULL,
  `date_creation` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `regarder_episode_later`
--

CREATE TABLE `regarder_episode_later` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `episode_id` int(11) NOT NULL,
  `date_creation` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `regarder_film_later`
--

CREATE TABLE `regarder_film_later` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `film_id` int(11) NOT NULL,
  `date_creation` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `root`
--

CREATE TABLE `root` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `telephone` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `photo_profil` longtext,
  `password` varchar(255) NOT NULL,
  `sexe` varchar(255) NOT NULL,
  `date_creation` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `saison`
--

CREATE TABLE `saison` (
  `id` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `serie_id` int(11) NOT NULL,
  `root_id` int(11) NOT NULL,
  `date_creation` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `serie`
--

CREATE TABLE `serie` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `resume` text NOT NULL,
  `categorie_id` int(11) NOT NULL,
  `maison_production` varchar(255) NOT NULL,
  `cover` longtext NOT NULL,
  `root_id` int(11) NOT NULL,
  `date_creation` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `date_naissance` date DEFAULT NULL,
  `sexe` varchar(255) DEFAULT NULL,
  `photo_profil` longtext,
  `premium_user` tinyint(1) NOT NULL DEFAULT '0',
  `date_creation` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `abonement`
--
ALTER TABLE `abonement`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `bande_annonce`
--
ALTER TABLE `bande_annonce`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `episode`
--
ALTER TABLE `episode`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `favoris_episode`
--
ALTER TABLE `favoris_episode`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `favoris_film`
--
ALTER TABLE `favoris_film`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `like_episode`
--
ALTER TABLE `like_episode`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `like_film`
--
ALTER TABLE `like_film`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `payement`
--
ALTER TABLE `payement`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `playlist_film`
--
ALTER TABLE `playlist_film`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `playlist_serie`
--
ALTER TABLE `playlist_serie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `regarder_episode_later`
--
ALTER TABLE `regarder_episode_later`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `regarder_film_later`
--
ALTER TABLE `regarder_film_later`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `root`
--
ALTER TABLE `root`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `saison`
--
ALTER TABLE `saison`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `serie`
--
ALTER TABLE `serie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `abonement`
--
ALTER TABLE `abonement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `bande_annonce`
--
ALTER TABLE `bande_annonce`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `episode`
--
ALTER TABLE `episode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `favoris_episode`
--
ALTER TABLE `favoris_episode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `favoris_film`
--
ALTER TABLE `favoris_film`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `film`
--
ALTER TABLE `film`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `like_episode`
--
ALTER TABLE `like_episode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `like_film`
--
ALTER TABLE `like_film`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `payement`
--
ALTER TABLE `payement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `playlist_film`
--
ALTER TABLE `playlist_film`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `playlist_serie`
--
ALTER TABLE `playlist_serie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `regarder_episode_later`
--
ALTER TABLE `regarder_episode_later`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `regarder_film_later`
--
ALTER TABLE `regarder_film_later`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `root`
--
ALTER TABLE `root`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `saison`
--
ALTER TABLE `saison`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `serie`
--
ALTER TABLE `serie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
