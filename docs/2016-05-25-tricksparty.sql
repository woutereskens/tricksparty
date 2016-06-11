-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Gegenereerd op: 25 mei 2016 om 18:58
-- Serverversie: 10.1.13-MariaDB
-- PHP-versie: 5.5.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tricksparty`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `balletlist`
--

CREATE TABLE `balletlist` (
  `PilotUsername` varchar(255) NOT NULL,
  `CompetitionID` int(11) NOT NULL,
  `ScoreType` varchar(255) NOT NULL,
  `Trick` varchar(255) NOT NULL,
  `ListEnum` enum('A','B') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('cefb48749abb7d8f89734a337b507d78163f279c', '::1', 1464195030, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436343139353031343b),
('68fc5a95641c8693868775fca1a47fae180aa931', '127.0.0.1', 1464195180, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436343139353034353b6c6f676765645f696e7c613a323a7b733a383a22557365726e616d65223b733a353a2261646d696e223b733a31303a225065726d697373696f6e223b733a353a2241646d696e223b7d);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `competition`
--

CREATE TABLE `competition` (
  `ID` int(11) NOT NULL,
  `Location` varchar(255) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `imposedtrick`
--

CREATE TABLE `imposedtrick` (
  `CompetitionID` int(11) NOT NULL,
  `ScoreType` varchar(255) NOT NULL,
  `Trick` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `login`
--

CREATE TABLE `login` (
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Permission` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `login`
--

INSERT INTO `login` (`Username`, `Password`, `Permission`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `permission`
--

CREATE TABLE `permission` (
  `Permission` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `permission`
--

INSERT INTO `permission` (`Permission`) VALUES
('Admin'),
('Field director'),
('Judge'),
('Organizer'),
('Pilot');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `person`
--

CREATE TABLE `person` (
  `Username` varchar(255) NOT NULL,
  `FrontName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `EmailAddress` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `resulttype`
--

CREATE TABLE `resulttype` (
  `ResultType` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `resulttype`
--

INSERT INTO `resulttype` (`ResultType`) VALUES
('1'),
('10'),
('11'),
('12'),
('13'),
('14'),
('15'),
('16'),
('17'),
('18'),
('19'),
('2'),
('20'),
('3'),
('4'),
('5'),
('6'),
('7'),
('8'),
('9'),
('Average'),
('Bad'),
('Excellent'),
('Good');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `score`
--

CREATE TABLE `score` (
  `CompetitionID` int(11) NOT NULL,
  `JudgeUsername` varchar(255) NOT NULL,
  `PilotUsername` varchar(255) NOT NULL,
  `ScoreType` varchar(255) NOT NULL,
  `ResultType` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `scoretype`
--

CREATE TABLE `scoretype` (
  `ScoreType` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `scoretype`
--

INSERT INTO `scoretype` (`ScoreType`) VALUES
('Artistic'),
('BT1'),
('BT2'),
('BT3'),
('BT4'),
('BT5'),
('BT6'),
('BT7'),
('BT8'),
('BT9'),
('Free expression'),
('IT1A1'),
('IT1A2'),
('IT2A1'),
('IT2A2'),
('IT3A1'),
('IT3A2'),
('IT4A1'),
('IT4A2'),
('Technical');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `selectedballetlist`
--

CREATE TABLE `selectedballetlist` (
  `PilotUsername` varchar(255) NOT NULL,
  `CompetitionID` int(11) NOT NULL,
  `ListEnum` enum('A','B') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `trick`
--

CREATE TABLE `trick` (
  `Trick` varchar(255) NOT NULL,
  `TrickGroup` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `trick`
--

INSERT INTO `trick` (`Trick`, `TrickGroup`) VALUES
('2 Tips Landing', 2),
('360°', 2),
('540', 3),
('540 Mutex', 4),
('Axel', 2),
('Backspin Cascade', 4),
('Backspins', 3),
('Cascade', 2),
('Cascade Comete', 5),
('Coin Toss', 2),
('Comete', 4),
('Crazy Copter', 5),
('Cynique', 5),
('Double Axel', 4),
('Duplex', 4),
('Fade', 1),
('Flapjack', 2),
('Flic Flac (pancake)', 2),
('Half Axel', 1),
('Insane', 1),
('Insane left-right', 3),
('Jacobs Ladder', 3),
('K2000', 3),
('Kombo', 2),
('La Dole', 5),
('Lazy Susan', 2),
('Lewis', 3),
('Multi Yoyo', 5),
('Multilazy', 3),
('Multislot', 4),
('Pinwheel (Helicopter)', 3),
('Refueling', 2),
('Reverse Rolling', 3),
('Reversed Coin Toss', 3),
('Reversed Flic-Flac', 3),
('Rolling Cascade', 3),
('Rolling Susan', 2),
('Side Slide', 3),
('Slotmachine', 3),
('Spike', 3),
('Stop (snapstall)', 2),
('Tazmachine', 4),
('Torpille', 4),
('Turtle (Backflip)', 1),
('Wap Doo Wap', 4),
('YoFade', 4),
('YoFade Backspins', 5),
('Yoyo', 3),
('Yoyo Multilazy', 5),
('Yoyo Take-off', 4);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `trickgroup`
--

CREATE TABLE `trickgroup` (
  `TrickGroup` int(11) NOT NULL,
  `ResultType` varchar(255) NOT NULL,
  `Score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `trickgroup`
--

INSERT INTO `trickgroup` (`TrickGroup`, `ResultType`, `Score`) VALUES
(1, 'Average', 2),
(1, 'Bad', 0),
(1, 'Excellent', 6),
(1, 'Good', 4),
(2, 'Average', 3),
(2, 'Bad', 0),
(2, 'Excellent', 9),
(2, 'Good', 6),
(3, 'Average', 4),
(3, 'Bad', 0),
(3, 'Excellent', 12),
(3, 'Good', 8),
(4, 'Average', 5),
(4, 'Bad', 0),
(4, 'Excellent', 15),
(4, 'Good', 10),
(5, 'Average', 6),
(5, 'Bad', 0),
(5, 'Excellent', 18),
(5, 'Good', 12);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `balletlist`
--
ALTER TABLE `balletlist`
  ADD PRIMARY KEY (`PilotUsername`,`CompetitionID`,`ScoreType`,`ListEnum`);

--
-- Indexen voor tabel `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexen voor tabel `competition`
--
ALTER TABLE `competition`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `imposedtrick`
--
ALTER TABLE `imposedtrick`
  ADD PRIMARY KEY (`CompetitionID`,`ScoreType`);

--
-- Indexen voor tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`Username`);

--
-- Indexen voor tabel `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`Permission`);

--
-- Indexen voor tabel `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`Username`);

--
-- Indexen voor tabel `resulttype`
--
ALTER TABLE `resulttype`
  ADD PRIMARY KEY (`ResultType`);

--
-- Indexen voor tabel `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`CompetitionID`,`JudgeUsername`,`PilotUsername`,`ScoreType`);

--
-- Indexen voor tabel `scoretype`
--
ALTER TABLE `scoretype`
  ADD PRIMARY KEY (`ScoreType`);

--
-- Indexen voor tabel `selectedballetlist`
--
ALTER TABLE `selectedballetlist`
  ADD PRIMARY KEY (`PilotUsername`,`CompetitionID`);

--
-- Indexen voor tabel `trick`
--
ALTER TABLE `trick`
  ADD PRIMARY KEY (`Trick`);

--
-- Indexen voor tabel `trickgroup`
--
ALTER TABLE `trickgroup`
  ADD PRIMARY KEY (`TrickGroup`,`ResultType`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `competition`
--
ALTER TABLE `competition`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
