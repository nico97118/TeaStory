-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 13 Juillet 2016 à 17:53
-- Version du serveur :  5.5.49-0+deb8u1
-- Version de PHP :  5.6.20-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `teastory`
--

-- --------------------------------------------------------

--
-- Structure de la table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `ci_sessions`
--


-- --------------------------------------------------------

--
-- Structure de la table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
`id` mediumint(8) unsigned NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Structure de la table `history_rate`
--

CREATE TABLE IF NOT EXISTS `history_rate` (
  `history_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rate` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `history_rate`
--

INSERT INTO `history_rate` (`history_id`, `user_id`, `rate`) VALUES
(15, 2, 4),
(16, 2, 2),
(17, 2, 5),
(16, 3, 1),
(17, 3, 5),
(15, 3, 3);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `history_stats`
--
CREATE TABLE IF NOT EXISTS `history_stats` (
`history_id` int(11)
,`rate` decimal(14,4)
);
-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `history_user`
--
CREATE TABLE IF NOT EXISTS `history_user` (
`id` int(11)
,`fk_tea_id` int(11)
,`name` varchar(40)
,`type` varchar(40)
,`temperature` int(3)
,`sleeping` time
,`dosage` int(2)
,`unit` varchar(30)
,`date` datetime
,`comment` tinytext
,`fk_user_id` int(11)
,`first_name` varchar(50)
,`last_name` varchar(50)
);
-- --------------------------------------------------------

--
-- Structure de la table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
`id` int(11) unsigned NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tea_history`
--

CREATE TABLE IF NOT EXISTS `tea_history` (
`id` int(11) NOT NULL,
  `fk_tea_id` int(11) NOT NULL,
  `temperature` int(3) NOT NULL,
  `sleeping` time NOT NULL,
  `dosage` int(2) NOT NULL,
  `unit` varchar(30) NOT NULL,
  `date` datetime NOT NULL,
  `comment` tinytext NOT NULL,
  `fk_user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tea_history`
--

INSERT INTO `tea_history` (`id`, `fk_tea_id`, `temperature`, `sleeping`, `dosage`, `unit`, `date`, `comment`, `fk_user_id`) VALUES
(15, 19, 95, '00:05:00', 2, 'cs', '2016-07-12 14:30:00', 'Nice !', 2),
(16, 22, 90, '00:03:00', 2, 'cs', '2016-07-13 17:14:00', 'Pas assez infusé ? Tenter 5 minutes ?', 2),
(17, 20, 95, '00:05:00', 2, 'cs', '2016-07-13 10:30:00', '', 2);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `tea_history_view`
--
CREATE TABLE IF NOT EXISTS `tea_history_view` (
`id` int(11)
,`fk_tea_id` int(11)
,`name` varchar(40)
,`type` varchar(40)
,`temperature` int(3)
,`sleeping` time
,`dosage` int(2)
,`unit` varchar(30)
,`date` datetime
,`comment` tinytext
,`fk_user_id` int(11)
,`first_name` varchar(50)
,`last_name` varchar(50)
,`history_id` int(11)
,`rate` decimal(14,4)
);
-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `tea_stats`
--
CREATE TABLE IF NOT EXISTS `tea_stats` (
`tea_id` int(11)
,`rate` decimal(18,8)
,`counter` bigint(21)
,`temperature` decimal(14,4)
);
-- --------------------------------------------------------

--
-- Structure de la table `tea_store`
--

CREATE TABLE IF NOT EXISTS `tea_store` (
`id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `type` varchar(40) NOT NULL,
  `temperature` int(11) NOT NULL,
  `sleeping` time NOT NULL,
  `seller` varchar(40) NOT NULL,
  `empty` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tea_store`
--

INSERT INTO `tea_store` (`id`, `name`, `type`, `temperature`, `sleeping`, `seller`, `empty`) VALUES
(4, 'Genmaicha Premium', 'vert', 70, '00:02:00', 'Palais des thés', 0),
(5, 'Grand Jasmin', 'vert', 75, '00:03:30', 'Palais des thés', 0),
(6, 'Thé des Moines', 'autre', 95, '00:03:00', 'Palais des thés', 0),
(7, 'Big Ben', 'noir', 95, '00:04:00', 'Palais des thés', 0),
(8, 'Bali', 'vert', 85, '00:03:30', '(Voir Adrien)', 0),
(9, 'Noir au Tibet', 'noir', 95, '00:03:00', '(Voir Adrien)', 0),
(10, 'Russian Star', 'vert', 85, '00:04:00', '(Voir Adrien)', 0),
(11, 'Gunpowder', 'vert', 80, '00:04:00', 'Palais des thés', 0),
(12, 'Pleine', 'noir', 100, '00:04:00', 'Mariage Frères', 0),
(13, 'Passion de fleurs', 'blanc', 80, '00:05:00', 'Dammann Frères', 0),
(14, 'Royal Ceylan', 'noir', 100, '00:04:00', 'Lipton', 0),
(15, 'Pomme verte', 'vert', 90, '00:03:30', 'Dammann Frères', 0),
(16, 'Anastasia', 'noir', 95, '00:03:00', 'Kusmi Tea', 0),
(17, 'Prince Vladimir', 'noir', 90, '00:04:00', 'Kusmi Tea', 0),
(18, ' Thé des Rois Mages ', 'noir', 90, '00:04:00', 'Kusmi Tea', 0),
(19, 'Marco Polo', 'noir', 95, '00:05:00', 'Mariage Frères', 0),
(20, 'Earl Grey French Blue', 'noir', 95, '00:05:00', 'Mariage Frères', 0),
(21, 'Esprit de Noël', 'noir', 95, '00:05:00', 'Mariage Frères', 0),
(22, 'Assam Maijian T.G.F.O.P.', 'noir', 90, '00:03:00', 'Palais des thés', 0);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `tea_store_view`
--
CREATE TABLE IF NOT EXISTS `tea_store_view` (
`id` int(11)
,`name` varchar(40)
,`type` varchar(40)
,`seller` varchar(40)
,`empty` tinyint(1)
,`temperature` int(11)
,`sleeping` time
,`rate_avg` decimal(18,8)
,`counter` bigint(21)
);
-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) unsigned NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1468398813, 1, 'Admin', 'istrator', 'ADMIN', '0'),

-- --------------------------------------------------------

--
-- Structure de la table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
`id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1)

-- --------------------------------------------------------

--
-- Structure de la vue `history_stats`
--
DROP TABLE IF EXISTS `history_stats`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `history_stats` AS select `r`.`history_id` AS `history_id`,avg(`r`.`rate`) AS `rate` from `history_rate` `r` group by `r`.`history_id`;

-- --------------------------------------------------------

--
-- Structure de la vue `history_user`
--
DROP TABLE IF EXISTS `history_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `history_user` AS select `h`.`id` AS `id`,`h`.`fk_tea_id` AS `fk_tea_id`,`s`.`name` AS `name`,`s`.`type` AS `type`,`h`.`temperature` AS `temperature`,`h`.`sleeping` AS `sleeping`,`h`.`dosage` AS `dosage`,`h`.`unit` AS `unit`,`h`.`date` AS `date`,`h`.`comment` AS `comment`,`h`.`fk_user_id` AS `fk_user_id`,`u`.`first_name` AS `first_name`,`u`.`last_name` AS `last_name` from ((`tea_history` `h` join `users` `u`) join `tea_store` `s` on(((`h`.`fk_tea_id` = `s`.`id`) and (`h`.`fk_user_id` = `u`.`id`))));

-- --------------------------------------------------------

--
-- Structure de la vue `tea_history_view`
--
DROP TABLE IF EXISTS `tea_history_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tea_history_view` AS select `h`.`id` AS `id`,`h`.`fk_tea_id` AS `fk_tea_id`,`h`.`name` AS `name`,`h`.`type` AS `type`,`h`.`temperature` AS `temperature`,`h`.`sleeping` AS `sleeping`,`h`.`dosage` AS `dosage`,`h`.`unit` AS `unit`,`h`.`date` AS `date`,`h`.`comment` AS `comment`,`h`.`fk_user_id` AS `fk_user_id`,`h`.`first_name` AS `first_name`,`h`.`last_name` AS `last_name`,`r`.`history_id` AS `history_id`,`r`.`rate` AS `rate` from (`history_user` `h` left join `history_stats` `r` on((`h`.`id` = `r`.`history_id`)));

-- --------------------------------------------------------

--
-- Structure de la vue `tea_stats`
--
DROP TABLE IF EXISTS `tea_stats`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tea_stats` AS select `h`.`fk_tea_id` AS `tea_id`,avg(`h`.`rate`) AS `rate`,count(`h`.`id`) AS `counter`,avg(`h`.`temperature`) AS `temperature` from `tea_history_view` `h` group by `h`.`fk_tea_id`;

-- --------------------------------------------------------

--
-- Structure de la vue `tea_store_view`
--
DROP TABLE IF EXISTS `tea_store_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tea_store_view` AS select `s`.`id` AS `id`,`s`.`name` AS `name`,`s`.`type` AS `type`,`s`.`seller` AS `seller`,`s`.`empty` AS `empty`,`s`.`temperature` AS `temperature`,`s`.`sleeping` AS `sleeping`,`r`.`rate` AS `rate_avg`,`r`.`counter` AS `counter` from (`tea_store` `s` left join `tea_stats` `r` on((`s`.`id` = `r`.`tea_id`)));

--
-- Index pour les tables exportées
--

--
-- Index pour la table `ci_sessions`
--
ALTER TABLE `ci_sessions`
 ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Index pour la table `groups`
--
ALTER TABLE `groups`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `login_attempts`
--
ALTER TABLE `login_attempts`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tea_history`
--
ALTER TABLE `tea_history`
 ADD PRIMARY KEY (`id`), ADD KEY `tea_id` (`fk_tea_id`) USING BTREE;

--
-- Index pour la table `tea_store`
--
ALTER TABLE `tea_store`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users_groups`
--
ALTER TABLE `users_groups`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`), ADD KEY `fk_users_groups_users1_idx` (`user_id`), ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `groups`
--
ALTER TABLE `groups`
MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `login_attempts`
--
ALTER TABLE `login_attempts`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `tea_history`
--
ALTER TABLE `tea_history`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT pour la table `tea_store`
--
ALTER TABLE `tea_store`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `users_groups`
--
ALTER TABLE `users_groups`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `tea_history`
--
ALTER TABLE `tea_history`
ADD CONSTRAINT `fk_tea_id` FOREIGN KEY (`fk_tea_id`) REFERENCES `tea_store` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `users_groups`
--
ALTER TABLE `users_groups`
ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
