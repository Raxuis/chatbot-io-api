-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : jeu. 04 avr. 2024 à 07:05
-- Version du serveur : 5.7.39
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `chatbot_io`
--

-- --------------------------------------------------------

--
-- Structure de la table `bots`
--

CREATE TABLE `bots` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` varchar(80) NOT NULL,
  `avatar` text NOT NULL,
  `actions` set('helloAction','pokemonAction','serpentAction','parkingAction','swAction','headsOrTailsAction','shifumiAction','passwordAction','weatherAction','loveAction','fortniteShopAction','fortniteLastAddedAction','fortniteMapAction','fortniteStatsAction','exchangeRateAction','valorantAgentsAction','movieAction','trendingAction') NOT NULL DEFAULT 'helloAction'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `bots`
--

INSERT INTO `bots` (`id`, `name`, `description`, `avatar`, `actions`) VALUES
(1, 'Assistant', 'I am an assistant to help you !', 'https://source.boringavatars.com/', 'helloAction,parkingAction,passwordAction,exchangeRateAction'),
(2, 'Evelyne', 'Miss météo', 'https://www.gala.fr/imgre/fit/~1~gal~2023~10~02~c259200d-c07b-45a2-94bc-b2b9c289807b.jpeg/2671x1914/quality/80/evelyne-dheliat.jpeg', 'helloAction,weatherAction'),
(3, 'Professor Oak', 'Catch them all', 'https://d1lss44hh2trtw.cloudfront.net/resize?type=webp&url=https%3A%2F%2Fshacknews-www.s3.amazonaws.com%2Fassets%2Feditorial%2F2018%2F11%2Fprofoakbig.jpg&width=986&sign=ZvLPW1bobNJKiK0uRyfilVYVkukVqFJGb-zCwkYo-kg', 'helloAction,pokemonAction'),
(4, 'Game Master', 'I am the game master', 'https://img.freepik.com/free-photo/friends-having-fun-while-playing-poker_23-2149273957.jpg', 'helloAction,headsOrTailsAction,shifumiAction'),
(5, 'C-3PO', 'A pleasure to meet you. I am C-3PO, Human-Cyborg Relations.', 'https://a1cf74336522e87f135f-2f21ace9a6cf0052456644b80fa06d4f.ssl.cf2.rackcdn.com/images/characters/large/2800/C3PO.Star-Wars-Series.webp', 'helloAction,swAction'),
(6, 'Woody', 'There\'s a snake in his boot', 'https://www.sosyncd.com/wp-content/uploads/2022/07/87.png', 'helloAction,serpentAction'),
(7, 'Cupid', 'I calculate your love percentage', 'https://media.istockphoto.com/id/637985650/vector/cute-little-cupid-aiming-at-someone.jpg?s=612x612&w=0&k=20&c=o1Gi4i_kRZKzYKaA73zAjel9F0mNIEOnTKjvGOjZnbs=', 'helloAction,loveAction'),
(8, 'Video Game', 'I can help you in every game', 'https://www.pngitem.com/pimgs/m/146-1468323_gamer-profile-icon-png-transparent-png.png', 'helloAction,fortniteShopAction,fortniteLastAddedAction,fortniteMapAction,fortniteStatsAction,valorantAgentsAction'),
(9, 'Cinema', 'Search movies', 'https://images.pexels.com/photos/33129/popcorn-movie-party-entertainment.jpg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2', 'helloAction,movieAction,trendingAction');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `bot_id` int(11) DEFAULT NULL,
  `message` varchar(10000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `date` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `avatar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `avatar`) VALUES
(1, 'Elliot', 'https://i.pinimg.com/736x/a3/b3/1a/a3b31a3d62d7643ebd97c49dc8c43ffa.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `bots`
--
ALTER TABLE `bots`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chatbot_message_user_id_foreign` (`user_id`),
  ADD KEY `chatbot_message_bot_id_foreign` (`bot_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `bots`
--
ALTER TABLE `bots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `chatbot_message_bot_id_foreign` FOREIGN KEY (`bot_id`) REFERENCES `bots` (`id`),
  ADD CONSTRAINT `chatbot_message_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
