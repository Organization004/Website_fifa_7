-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 17 mei 2018 om 09:03
-- Serverversie: 10.1.31-MariaDB
-- PHP-versie: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_fifa`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_login`
--

CREATE TABLE `tbl_login` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `tbl_login`
--

INSERT INTO `tbl_login` (`id`, `username`, `email`, `password`, `type`) VALUES
(40, '123', '123@123.com', '$2y$10$EIb4NYswJ3fpZuFsz1yf8OH/YP7cAI8bhetDl8STc8GL48tEZSy/G', 'admin'),
(41, 'swag', 'swag@swag.com', '$2y$10$xMOqhaqmodLEitCHEd5p2eF79VIbx1g1QZUIxs8iTejzPr.WK777.', 'user'),
(43, '1', '1@1.com', '$2y$10$MoE3ND3QbFg5Kh9iG2Q.xuZ2rPflwIVqg54Hs8oqCg75PR61bEjTe', 'admin'),
(44, '', '', '', 'user'),
(45, '', '', '', 'user'),
(46, '', '', '', 'user'),
(47, '', '', '', 'user'),
(48, '', '', '', 'user'),
(49, '', '', '', 'user'),
(50, '', '', '', 'user'),
(51, '', '', '', 'user'),
(52, '', '', '', 'user'),
(53, '', '', '', 'user'),
(54, '', '', '', 'user'),
(55, '', '', '', 'user'),
(56, '1234', 'f@f.com', '$2y$10$UsOTKtMQLvE1AKhvhM80/ujrqWQox5bT6.bwP0MsaS3nKrMhRdZsq', 'admin');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_matches`
--

CREATE TABLE `tbl_matches` (
  `id` int(10) UNSIGNED NOT NULL,
  `team_id_a` int(10) UNSIGNED NOT NULL,
  `team_id_b` int(10) UNSIGNED NOT NULL,
  `score_team_a` int(10) UNSIGNED DEFAULT NULL,
  `score_team_b` int(10) UNSIGNED DEFAULT NULL,
  `start_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Gegevens worden geëxporteerd voor tabel `tbl_matches`
--

INSERT INTO `tbl_matches` (`id`, `team_id_a`, `team_id_b`, `score_team_a`, `score_team_b`, `start_time`) VALUES
(3, 11, 12, 4, 2, '0000-00-00 00:00:00'),
(4, 13, 14, 2, 0, '0000-00-00 00:00:00'),
(5, 15, 16, 3, 6, '0000-00-00 00:00:00'),
(6, 17, 18, 1, 4, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_players`
--

CREATE TABLE `tbl_players` (
  `id` int(11) UNSIGNED NOT NULL,
  `student_id` varchar(10) NOT NULL,
  `team_id` int(11) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `tbl_players`
--

INSERT INTO `tbl_players` (`id`, `student_id`, `team_id`, `created_at`, `deleted_at`) VALUES
(1, 'd123456', 1, '2017-04-13 09:44:13', NULL),
(2, 'd5435435', 1, '2017-04-13 09:44:13', NULL),
(3, 'd545454', 1, '2017-04-13 09:45:47', NULL),
(4, 'd666555', 1, '2017-04-13 09:45:47', NULL),
(5, 'd74745', 2, '2017-04-13 09:48:23', NULL),
(6, 'd987665', 2, '2017-04-13 09:48:23', NULL),
(7, 'd11555', 2, '2017-04-13 09:48:23', NULL),
(8, 'd544566', 2, '2017-04-13 09:48:23', NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_poules`
--

CREATE TABLE `tbl_poules` (
  `id` int(11) NOT NULL,
  `naam` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `tbl_poules`
--

INSERT INTO `tbl_poules` (`id`, `naam`, `created_at`, `deleted_at`) VALUES
(1, 'Team 1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Team 2', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Team 3', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Team 4', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Team 5', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Team 6', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Team 7', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Team 8', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Ajex', '2018-04-25 12:08:08', '2018-04-25 12:08:08'),
(10, 'FC kevin', '2018-04-25 12:08:08', '2018-04-25 12:08:08'),
(11, 'PZV', '2018-05-15 13:08:14', '2018-05-15 13:08:14'),
(12, 'NOC', '2018-05-15 13:08:14', '2018-05-15 13:08:14');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_student`
--

CREATE TABLE `tbl_student` (
  `id` int(11) NOT NULL,
  `student_id` varchar(10) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_teams`
--

CREATE TABLE `tbl_teams` (
  `id` int(11) UNSIGNED NOT NULL,
  `poule_id` int(11) NOT NULL,
  `team_name` varchar(255) NOT NULL,
  `position` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `tbl_teams`
--

INSERT INTO `tbl_teams` (`id`, `poule_id`, `team_name`, `position`, `created_at`, `deleted_at`) VALUES
(1, 1, '', 0, '2017-04-13 09:42:45', NULL),
(2, 1, '', 0, '2017-04-13 09:42:45', NULL),
(11, 0, 'Team 1', 1, '2018-04-24 10:02:46', NULL),
(12, 0, 'Team 2', 2, '2018-04-24 10:02:46', NULL),
(13, 0, 'Team 3', 3, '2018-04-24 10:02:46', NULL),
(14, 0, 'Team 4', 4, '2018-04-24 10:02:46', NULL),
(15, 0, 'Team 5', 5, '2018-04-24 10:02:46', NULL),
(16, 0, 'Team 6', 6, '2018-04-24 10:02:46', NULL),
(17, 0, 'Team 7', 7, '2018-04-24 10:02:46', NULL),
(18, 0, 'Team 8', 8, '2018-04-24 10:02:47', NULL);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `tbl_matches`
--
ALTER TABLE `tbl_matches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_matches_ibfk_1` (`team_id_a`),
  ADD KEY `tbl_matches_ibfk_2` (`team_id_b`);

--
-- Indexen voor tabel `tbl_players`
--
ALTER TABLE `tbl_players`
  ADD PRIMARY KEY (`id`),
  ADD KEY `team_id` (`team_id`);

--
-- Indexen voor tabel `tbl_poules`
--
ALTER TABLE `tbl_poules`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `naam` (`naam`);

--
-- Indexen voor tabel `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `tbl_teams`
--
ALTER TABLE `tbl_teams`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT voor een tabel `tbl_matches`
--
ALTER TABLE `tbl_matches`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT voor een tabel `tbl_players`
--
ALTER TABLE `tbl_players`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT voor een tabel `tbl_poules`
--
ALTER TABLE `tbl_poules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT voor een tabel `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `tbl_teams`
--
ALTER TABLE `tbl_teams`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `tbl_matches`
--
ALTER TABLE `tbl_matches`
  ADD CONSTRAINT `tbl_matches_ibfk_1` FOREIGN KEY (`team_id_a`) REFERENCES `tbl_teams` (`id`),
  ADD CONSTRAINT `tbl_matches_ibfk_2` FOREIGN KEY (`team_id_b`) REFERENCES `tbl_teams` (`id`);

--
-- Beperkingen voor tabel `tbl_players`
--
ALTER TABLE `tbl_players`
  ADD CONSTRAINT `tbl_players_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `tbl_teams` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
