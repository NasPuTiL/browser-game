-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Czas generowania: 30 Sie 2018, 12:10
-- Wersja serwera: 5.7.21
-- Wersja PHP: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `game`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `equipment`
--

DROP TABLE IF EXISTS `equipment`;
CREATE TABLE IF NOT EXISTS `equipment` (
  `name` text CHARACTER SET ucs2 COLLATE ucs2_bin NOT NULL,
  `attack` int(11) NOT NULL,
  `HP` int(11) NOT NULL,
  `strength` int(11) NOT NULL,
  `uid` text NOT NULL,
  `dexterity` int(11) NOT NULL,
  `defence` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `isUsedValue` int(11) NOT NULL,
  `kind` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `equipment`
--

INSERT INTO `equipment` (`name`, `attack`, `HP`, `strength`, `uid`, `dexterity`, `defence`, `id`, `isUsedValue`, `kind`) VALUES
('Noname', 0, 0, 0, 'admin', 5, 9, 20, 1, 'boots'),
('Noname', 13, 0, 4, 'admin', 0, 0, 21, 1, 'weapon'),
('Noname', 0, 0, 0, 'user1', 3, 11, 22, 1, 'boots'),
('Noname', 15, 0, 4, 'user1', 0, 0, 23, 1, 'weapon'),
('Noname', 0, 0, 0, 'user2', 3, 11, 24, 1, 'boots'),
('Noname', 14, 0, 5, 'user2', 0, 0, 25, 1, 'weapon'),
('Noname', 0, 0, 0, 'userNext', 4, 11, 26, 1, 'boots'),
('Noname', 14, 0, 5, 'userNext', 0, 0, 27, 1, 'weapon'),
('Noname', 0, 0, 0, 'Bartek', 3, 10, 28, 1, 'boots'),
('Noname', 12, 0, 4, 'Bartek', 0, 0, 29, 1, 'weapon'),
('Noname', 0, 0, 0, 'Andrzej', 3, 10, 30, 1, 'boots'),
('Noname', 13, 0, 5, 'Andrzej', 0, 0, 31, 1, 'weapon'),
('Noname', 0, 0, 0, 'person', 3, 11, 32, 1, 'boots'),
('Noname', 14, 0, 3, 'person', 0, 0, 33, 1, 'weapon'),
('Noname', 0, 0, 0, 'admin2', 4, 9, 34, 1, 'boots'),
('Noname', 15, 0, 4, 'admin2', 0, 0, 35, 0, 'weapon');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `stats`
--

DROP TABLE IF EXISTS `stats`;
CREATE TABLE IF NOT EXISTS `stats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gold` text NOT NULL,
  `blood` text NOT NULL,
  `defence` text NOT NULL,
  `attack` text NOT NULL,
  `HP` text NOT NULL,
  `manna` text NOT NULL,
  `strength` text NOT NULL,
  `dexitery` text NOT NULL,
  `uid` text NOT NULL,
  `level` int(11) NOT NULL,
  `expiriance` int(11) NOT NULL,
  `stan` text NOT NULL,
  `duration` datetime DEFAULT NULL,
  `points` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=107 DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `stats`
--

INSERT INTO `stats` (`id`, `gold`, `blood`, `defence`, `attack`, `HP`, `manna`, `strength`, `dexitery`, `uid`, `level`, `expiriance`, `stan`, `duration`, `points`) VALUES
(105, '300', '0', '10', '10', '100', '50', '7', '7', 'person', 1, 0, '-', NULL, 10),
(106, '300', '0', '10', '10', '100', '50', '7', '7', 'admin2', 1, 0, '-', NULL, 10),
(104, '300', '0', '10', '10', '100', '50', '7', '7', 'Andrzej', 1, 0, '-', NULL, 10),
(103, '300', '0', '10', '10', '100', '50', '7', '7', 'Bartek', 1, 0, '-', NULL, 10),
(102, '300', '0', '10', '10', '100', '50', '7', '7', 'userNext', 1, 0, '-', NULL, 10),
(101, '300', '0', '10', '10', '100', '50', '7', '7', 'user2', 1, 0, '-', NULL, 10),
(99, '130', '400', '12', '12', '100', '50', '9', '9', 'admin', 2, 51, '-', NULL, 7),
(100, '300', '0', '10', '10', '100', '50', '7', '7', 'user1', 1, 0, '-', NULL, 10);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=111 DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`) VALUES
(110, 'admin2', 'admin', 'admin2@poczta.pl'),
(109, 'person', 'perso', 'nper'),
(108, 'Andrzej', 'wiecej', 'cos'),
(107, 'Bartek', 'elf', 'cos'),
(106, 'userNext', 'usernext', 'usernext'),
(105, 'user2', 'user2', 'user2'),
(104, 'user1', 'user1', 'suer'),
(103, 'admin', 'admin', 'admin@poczta.pl');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
