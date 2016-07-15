-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 12 Juillet 2016 à 15:42
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `teastory`
--
CREATE DATABASE IF NOT EXISTS `teastory` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `teastory`;

-- --------------------------------------------------------

--
-- Structure de la table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Structure de la table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;


-- --------------------------------------------------------

--
-- Structure de la table `login_attempts`
--

DROP TABLE IF EXISTS `login_attempts`;
CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `tea_history`
--

DROP TABLE IF EXISTS `tea_history`;
CREATE TABLE IF NOT EXISTS `tea_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_tea_id` int(11) NOT NULL,
  `temperature` int(3) NOT NULL,
  `sleeping` time NOT NULL,
  `dosage` int(2) NOT NULL,
  `unit` varchar(30) NOT NULL,
  `date` datetime NOT NULL,
  `comment` tinytext NOT NULL,
  `rate` int(1) DEFAULT NULL,
  `fk_user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tea_id` (`fk_tea_id`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `tea_history_view`
--
DROP VIEW IF EXISTS `tea_history_view`;
CREATE TABLE IF NOT EXISTS `tea_history_view` (
`name` varchar(40)
,`tea_temperature` int(11)
,`tea_sleeping` time
,`id` int(11)
,`fk_tea_id` int(11)
,`temperature` int(3)
,`sleeping` time
,`dosage` int(2)
,`unit` varchar(30)
,`date` datetime
,`comment` tinytext
,`rate` int(1)
);
-- --------------------------------------------------------

--
-- Structure de la table `tea_store`
--

DROP TABLE IF EXISTS `tea_store`;
CREATE TABLE IF NOT EXISTS `tea_store` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `type` varchar(40) NOT NULL,
  `temperature` int(11) NOT NULL,
  `sleeping` time NOT NULL,
  `seller` varchar(40) NOT NULL,
  `empty` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;



-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `tea_store_view`
--
DROP VIEW IF EXISTS `tea_store_view`;
CREATE TABLE IF NOT EXISTS `tea_store_view` (
`id` int(11)
,`name` varchar(40)
,`type` varchar(40)
,`seller` varchar(40)
,`empty` tinyint(1)
,`temperature` int(11)
,`sleeping` time
,`counter` bigint(21)
,`temperature_avg` decimal(14,4)
,`rate_avg` decimal(14,4)
);
-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
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
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;


-- --------------------------------------------------------

--
-- Structure de la table `users_groups`
--

DROP TABLE IF EXISTS `users_groups`;
CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;


-- --------------------------------------------------------

--
-- Structure de la vue `tea_history_view`
--
DROP TABLE IF EXISTS `tea_history_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tea_history_view` AS select `store`.`name` AS `name`,`store`.`temperature` AS `tea_temperature`,`store`.`sleeping` AS `tea_sleeping`,`history`.`id` AS `id`,`history`.`fk_tea_id` AS `fk_tea_id`,`history`.`temperature` AS `temperature`,`history`.`sleeping` AS `sleeping`,`history`.`dosage` AS `dosage`,`history`.`unit` AS `unit`,`history`.`date` AS `date`,`history`.`comment` AS `comment`,`history`.`rate` AS `rate` from (`tea_history` `history` join `tea_store` `store` on((`history`.`fk_tea_id` = `store`.`id`))) where (`store`.`empty` = 0);

-- --------------------------------------------------------

--
-- Structure de la vue `tea_store_view`
--
DROP TABLE IF EXISTS `tea_store_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tea_store_view` AS select `s`.`id` AS `id`,`s`.`name` AS `name`,`s`.`type` AS `type`,`s`.`seller` AS `seller`,`s`.`empty` AS `empty`,`s`.`temperature` AS `temperature`,`s`.`sleeping` AS `sleeping`,count(`h`.`id`) AS `counter`,avg(`h`.`temperature`) AS `temperature_avg`,avg(`h`.`rate`) AS `rate_avg` from (`tea_history` `h` join `tea_store` `s` on((`s`.`id` = `h`.`fk_tea_id`))) group by `h`.`fk_tea_id`;

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
