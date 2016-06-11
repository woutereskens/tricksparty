-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Gegenereerd op: 08 jun 2016 om 23:38
-- Serverversie: 10.1.13-MariaDB
-- PHP-versie: 5.6.21

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
('5468404f5f3297ae22888b34983c7ee842efdc48', '127.0.0.1', 1465398361, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436353339383231303b6c6f676765645f696e7c613a323a7b733a383a22557365726e616d65223b733a31333a22576f757465725f45736b656e73223b733a31303a225065726d697373696f6e223b733a353a2250696c6f74223b7d),
('04e26b6fdf3e64c59d1b1e61646f2774a313d2cf', '127.0.0.1', 1465398760, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436353339383531383b6c6f676765645f696e7c613a323a7b733a383a22557365726e616d65223b733a31333a22576f757465725f45736b656e73223b733a31303a225065726d697373696f6e223b733a353a2250696c6f74223b7d),
('e46ed89fb4f4d09535debe7d542f4d6db65f03e0', '127.0.0.1', 1465399177, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436353339393034353b6c6f676765645f696e7c613a323a7b733a383a22557365726e616d65223b733a31333a22576f757465725f45736b656e73223b733a31303a225065726d697373696f6e223b733a353a2250696c6f74223b7d),
('42d6e2641750c2ace5af43fcb00dde9748f732bf', '127.0.0.1', 1465400739, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436353430303638333b6c6f676765645f696e7c613a323a7b733a383a22557365726e616d65223b733a353a2261646d696e223b733a31303a225065726d697373696f6e223b733a353a2241646d696e223b7d),
('83ab9f69b3f428bc4841f858e697c0718a044970', '127.0.0.1', 1465401356, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436353430313330383b6c6f676765645f696e7c613a323a7b733a383a22557365726e616d65223b733a353a2261646d696e223b733a31303a225065726d697373696f6e223b733a353a2241646d696e223b7d),
('976f84affe8afc43fa60dde1ab7756d56ec3327d', '127.0.0.1', 1465402440, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436353430323333383b6c6f676765645f696e7c613a323a7b733a383a22557365726e616d65223b733a353a2261646d696e223b733a31303a225065726d697373696f6e223b733a353a2241646d696e223b7d),
('e633cec88992dd915c6c2ae1d7a4e3ca4fb57f38', '127.0.0.1', 1465403005, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436353430323730393b6c6f676765645f696e7c613a323a7b733a383a22557365726e616d65223b733a353a2261646d696e223b733a31303a225065726d697373696f6e223b733a353a2241646d696e223b7d),
('08eba78ebdbcb50ca57963d747db752023a66596', '127.0.0.1', 1465403807, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436353430333738383b6c6f676765645f696e7c613a323a7b733a383a22557365726e616d65223b733a363a224a7564676531223b733a31303a225065726d697373696f6e223b733a353a224a75646765223b7d),
('b19b6ce1457aa43f4dead6920267e4665a3f2963', '127.0.0.1', 1465408044, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436353430373836333b6c6f676765645f696e7c613a323a7b733a383a22557365726e616d65223b733a31343a224669656c645f6469726563746f72223b733a31303a225065726d697373696f6e223b733a31343a224669656c64206469726563746f72223b7d),
('d1b716017019be82f2d7ca62cfed4f266797a5c7', '127.0.0.1', 1465408388, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436353430383238333b6c6f676765645f696e7c613a323a7b733a383a22557365726e616d65223b733a31343a224669656c645f6469726563746f72223b733a31303a225065726d697373696f6e223b733a31343a224669656c64206469726563746f72223b7d),
('fa66960c173c4d386f6112fd8d3c2737f0b15088', '127.0.0.1', 1465409453, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436353430393139343b6c6f676765645f696e7c613a323a7b733a383a22557365726e616d65223b733a31343a224669656c645f6469726563746f72223b733a31303a225065726d697373696f6e223b733a31343a224669656c64206469726563746f72223b7d),
('6aa83f8e85c15ee881a53f339b8358c4188b0342', '127.0.0.1', 1465410556, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436353431303431353b6c6f676765645f696e7c613a323a7b733a383a22557365726e616d65223b733a31333a224669656c644469726563746f72223b733a31303a225065726d697373696f6e223b733a31343a224669656c64206469726563746f72223b7d),
('ec0716d84628a15029fd4eb908d1ca7c60a7d05f', '127.0.0.1', 1465412373, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436353431323337333b),
('e3bccb722835d18cd0923dcf4ded2a12226bcb29', '127.0.0.1', 1465412920, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436353431323833373b6c6f676765645f696e7c613a323a7b733a383a22557365726e616d65223b733a31333a22576f757465725f45736b656e73223b733a31303a225065726d697373696f6e223b733a353a2250696c6f74223b7d),
('1a68c02150db66356e95e43f82fd93d2cb74d011', '127.0.0.1', 1465413900, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436353431333838333b6c6f676765645f696e7c613a323a7b733a383a22557365726e616d65223b733a31343a224669656c645f6469726563746f72223b733a31303a225065726d697373696f6e223b733a31343a224669656c64206469726563746f72223b7d),
('0f44baedf4d0a02ff91b790345516d03e69f9512', '127.0.0.1', 1465414548, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436353431343530353b6c6f676765645f696e7c613a323a7b733a383a22557365726e616d65223b733a31343a224669656c645f6469726563746f72223b733a31303a225065726d697373696f6e223b733a31343a224669656c64206469726563746f72223b7d),
('ac2a16dac0a0f2d3485b189806712783bd71bd31', '127.0.0.1', 1465418020, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436353431373732313b6c6f676765645f696e7c613a323a7b733a383a22557365726e616d65223b733a353a2241646d696e223b733a31303a225065726d697373696f6e223b733a353a2241646d696e223b7d),
('0acd5ac05ea42fa6ec2d0a3cde5104cb17dbf9d7', '127.0.0.1', 1465418321, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436353431383032373b6c6f676765645f696e7c613a323a7b733a383a22557365726e616d65223b733a353a2241646d696e223b733a31303a225065726d697373696f6e223b733a353a2241646d696e223b7d),
('2aac4a95bec007a1cfeb40cf6de38811e0c0a61a', '127.0.0.1', 1465418714, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436353431383639383b6c6f676765645f696e7c613a323a7b733a383a22557365726e616d65223b733a31343a224669656c645f6469726563746f72223b733a31303a225065726d697373696f6e223b733a31343a224669656c64206469726563746f72223b7d),
('6aff67982c75dfd3f28b25764e4f167dcab11d60', '127.0.0.1', 1465421803, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436353432313737333b6c6f676765645f696e7c613a323a7b733a383a22557365726e616d65223b733a363a224a7564676531223b733a31303a225065726d697373696f6e223b733a353a224a75646765223b7d);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `competition`
--

CREATE TABLE `competition` (
  `ID` int(11) NOT NULL,
  `Location` varchar(255) NOT NULL,
  `Date` date NOT NULL,
  `NumberOfJudges` int(11) NOT NULL
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
('Admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin'),
('Field_director', '06e3d36fa30cea095545139854ad1fb9', 'Field director'),
('Judge1', '9801133a9a5eb052a4f588f44a86936d', 'Judge'),
('Judge2', '1256db16c9c3ee2f9463fe547433950d', 'Judge'),
('Judge3', 'e06eb0f114ebbc1f2f262f9976f0c715', 'Judge');

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
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `EmailAddress` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `ranking`
--

CREATE TABLE `ranking` (
  `ID` int(11) NOT NULL,
  `Location` varchar(255) NOT NULL,
  `Date` date NOT NULL,
  `PilotUsername` varchar(255) NOT NULL,
  `PilotFirstName` varchar(255) NOT NULL,
  `PilotLastName` varchar(255) NOT NULL,
  `PilotEmailAddress` varchar(255) NOT NULL,
  `NumberOfJudges` int(11) NOT NULL,
  `BalletTricksPercentage` int(11) NOT NULL,
  `ArtisticPercentage` int(11) NOT NULL,
  `ArtisticMultiplier` int(11) NOT NULL,
  `TechnicalPercentage` int(11) NOT NULL,
  `TechnicalMultiplier` int(11) NOT NULL,
  `ImposedTricksPercentage` int(11) NOT NULL,
  `FreeExpressionPercentage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `rankingscore`
--

CREATE TABLE `rankingscore` (
  `RankingID` int(11) NOT NULL,
  `ScoreType` varchar(255) NOT NULL,
  `Score` float NOT NULL,
  `Trick` varchar(255) DEFAULT NULL
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
  ADD PRIMARY KEY (`PilotUsername`,`CompetitionID`,`ScoreType`,`ListEnum`),
  ADD KEY `FK_CompetitionID` (`CompetitionID`);

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
-- Indexen voor tabel `ranking`
--
ALTER TABLE `ranking`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `rankingscore`
--
ALTER TABLE `rankingscore`
  ADD PRIMARY KEY (`RankingID`,`ScoreType`);

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT voor een tabel `ranking`
--
ALTER TABLE `ranking`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
