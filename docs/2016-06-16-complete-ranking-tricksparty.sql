-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Gegenereerd op: 16 jun 2016 om 01:54
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
('0d9a6976bc51e1592c2be7390236dcc71e1bdd51', '127.0.0.1', 1466015743, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436363031353437333b6c6f676765645f696e7c613a323a7b733a383a22557365726e616d65223b733a31303a224c756361735f4d616573223b733a31303a225065726d697373696f6e223b733a353a2250696c6f74223b7d),
('0e2433ec870d40de4c5e27c7d1255904bf971bbc', '127.0.0.1', 1466016113, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436363031353832313b6c6f676765645f696e7c613a323a7b733a383a22557365726e616d65223b733a31353a224e617468616e5f4a616e7373656e73223b733a31303a225065726d697373696f6e223b733a353a2250696c6f74223b7d),
('8add14e3760785fe4ca6c7bec3c710826d4dfed2', '127.0.0.1', 1466016497, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436363031363230373b6c6f676765645f696e7c613a323a7b733a383a22557365726e616d65223b733a31333a2253657070655f44655f536d6574223b733a31303a225065726d697373696f6e223b733a353a2250696c6f74223b7d),
('948248662d2b4eb602e22ae4e38399ae6565ab6e', '127.0.0.1', 1466017023, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436363031363736353b6c6f676765645f696e7c613a323a7b733a383a22557365726e616d65223b733a31313a2253696d6f6e5f436c616573223b733a31303a225065726d697373696f6e223b733a353a2250696c6f74223b7d),
('d04fa4efcec7cb64ef6ac83c00ca34787f6b4d0a', '127.0.0.1', 1466017474, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436363031373138393b6c6f676765645f696e7c613a323a7b733a383a22557365726e616d65223b733a31343a2254686f6d61735f50656574657273223b733a31303a225065726d697373696f6e223b733a353a2250696c6f74223b7d),
('0dd87c5e4ee813ce06442529d8bf376759fd7568', '127.0.0.1', 1466018111, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436363031373831333b6c6f676765645f696e7c613a323a7b733a383a22557365726e616d65223b733a31323a22576f75745f4d657274656e73223b733a31303a225065726d697373696f6e223b733a353a2250696c6f74223b7d),
('2b66d56481eef52b1cec704d1ca29ca936d9759f', '127.0.0.1', 1466018502, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436363031383231303b6c6f676765645f696e7c613a323a7b733a383a22557365726e616d65223b733a31343a224669656c645f6469726563746f72223b733a31303a225065726d697373696f6e223b733a31343a224669656c64206469726563746f72223b7d),
('25e0b3b00adc62024092e18f6e82d50667d84c3a', '127.0.0.1', 1466018810, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436363031383531353b6c6f676765645f696e7c613a323a7b733a383a22557365726e616d65223b733a363a224a7564676531223b733a31303a225065726d697373696f6e223b733a353a224a75646765223b7d),
('96ab132672efb90208f404059080517741529b49', '127.0.0.1', 1466019235, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436363031393039383b6c6f676765645f696e7c613a323a7b733a383a22557365726e616d65223b733a31343a224669656c645f6469726563746f72223b733a31303a225065726d697373696f6e223b733a31343a224669656c64206469726563746f72223b7d),
('6609a99459f5437e84bfc23f1790a25eac8b1f59', '127.0.0.1', 1466019702, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436363031393432373b6c6f676765645f696e7c613a323a7b733a383a22557365726e616d65223b733a31343a224669656c645f6469726563746f72223b733a31303a225065726d697373696f6e223b733a31343a224669656c64206469726563746f72223b7d),
('d6d9d52c5d63f93a24d0b020f7de5bc8c8ac1629', '127.0.0.1', 1466020045, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436363031393834313b6c6f676765645f696e7c613a323a7b733a383a22557365726e616d65223b733a353a2241646d696e223b733a31303a225065726d697373696f6e223b733a353a2241646d696e223b7d),
('32819cadb1d2eb41f47ef9a3095c431c5e25acab', '127.0.0.1', 1466020312, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436363032303331323b6c6f676765645f696e7c613a323a7b733a383a22557365726e616d65223b733a353a2241646d696e223b733a31303a225065726d697373696f6e223b733a353a2241646d696e223b7d),
('73f09f5ef0ab866905eebaebd68f2407de27791c', '127.0.0.1', 1466020960, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436363032303637333b6c6f676765645f696e7c613a323a7b733a383a22557365726e616d65223b733a353a2241646d696e223b733a31303a225065726d697373696f6e223b733a353a2241646d696e223b7d),
('791a4be6b82b5e7acf8540fe34c587befe5f4a30', '127.0.0.1', 1466022022, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436363032313732323b6c6f676765645f696e7c613a323a7b733a383a22557365726e616d65223b733a363a224a7564676531223b733a31303a225065726d697373696f6e223b733a353a224a75646765223b7d),
('fde7328f9c63a664cc7c52c3abe695ec63956867', '127.0.0.1', 1466022320, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436363032323032353b6c6f676765645f696e7c613a323a7b733a383a22557365726e616d65223b733a363a224a7564676531223b733a31303a225065726d697373696f6e223b733a353a224a75646765223b7d),
('f6aa97e1e40c11f124555a76f2ad2ce47a9645d8', '127.0.0.1', 1466022815, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436363032323532393b6c6f676765645f696e7c613a323a7b733a383a22557365726e616d65223b733a363a224a7564676531223b733a31303a225065726d697373696f6e223b733a353a224a75646765223b7d),
('7226e25a603a92786bf284c21ed520f4fc3bf1ee', '127.0.0.1', 1466023507, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436363032333232383b6c6f676765645f696e7c613a323a7b733a383a22557365726e616d65223b733a363a224a7564676531223b733a31303a225065726d697373696f6e223b733a353a224a75646765223b7d),
('6c2dc4a9a563fac057891ff3fbebe040c0398364', '127.0.0.1', 1466023558, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436363032333534343b6c6f676765645f696e7c613a323a7b733a383a22557365726e616d65223b733a363a224a7564676531223b733a31303a225065726d697373696f6e223b733a353a224a75646765223b7d),
('c67a6172d4ca5950bd408b20a7d90c83821dbb4c', '127.0.0.1', 1466025336, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436363032353033363b6c6f676765645f696e7c613a323a7b733a383a22557365726e616d65223b733a363a224a7564676531223b733a31303a225065726d697373696f6e223b733a353a224a75646765223b7d),
('8de90978360ec0a17bc3c1f1fd2178ce7b9ca4a5', '127.0.0.1', 1466025944, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436363032353830353b6c6f676765645f696e7c613a323a7b733a383a22557365726e616d65223b733a31343a224669656c645f6469726563746f72223b733a31303a225065726d697373696f6e223b733a31343a224669656c64206469726563746f72223b7d),
('12faea974adafbecf80ab966b2f067f5c889ca69', '127.0.0.1', 1466026953, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436363032363635393b6c6f676765645f696e7c613a323a7b733a383a22557365726e616d65223b733a363a224a7564676531223b733a31303a225065726d697373696f6e223b733a353a224a75646765223b7d),
('4fb7786a5fc72a2ff305a9056d52ebd24c817a00', '127.0.0.1', 1466027461, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436363032373231333b6c6f676765645f696e7c613a323a7b733a383a22557365726e616d65223b733a31343a224669656c645f6469726563746f72223b733a31303a225065726d697373696f6e223b733a31343a224669656c64206469726563746f72223b7d),
('96213ea69ff3eed55b10111a02a349eb82b99870', '127.0.0.1', 1466031151, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436363033313135313b),
('a32d086897216db39c94eba972fc67f0988baabb', '127.0.0.1', 1466032467, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436363033323137313b6c6f676765645f696e7c613a323a7b733a383a22557365726e616d65223b733a363a224a7564676531223b733a31303a225065726d697373696f6e223b733a353a224a75646765223b7d),
('cf90496548f8169975850a264cbd37f0fab599d3', '127.0.0.1', 1466033726, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436363033333433323b6c6f676765645f696e7c613a323a7b733a383a22557365726e616d65223b733a363a224a7564676531223b733a31303a225065726d697373696f6e223b733a353a224a75646765223b7d),
('66374acc726766ae3804eb20c5d6842b923d2848', '127.0.0.1', 1466033987, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436363033333733353b6c6f676765645f696e7c613a323a7b733a383a22557365726e616d65223b733a363a224a7564676531223b733a31303a225065726d697373696f6e223b733a353a224a75646765223b7d),
('9842aa1827c2f4679cdda4ccb7b1e2434ccb8973', '127.0.0.1', 1466034355, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436363033343035363b6c6f676765645f696e7c613a323a7b733a383a22557365726e616d65223b733a363a224a7564676531223b733a31303a225065726d697373696f6e223b733a353a224a75646765223b7d),
('cbd78ecaa76e417884161294715d87936936fd76', '127.0.0.1', 1466034822, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436363033343738313b6c6f676765645f696e7c613a323a7b733a383a22557365726e616d65223b733a353a2241646d696e223b733a31303a225065726d697373696f6e223b733a353a2241646d696e223b7d);

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

--
-- Gegevens worden geëxporteerd voor tabel `competition`
--

INSERT INTO `competition` (`ID`, `Location`, `Date`, `NumberOfJudges`) VALUES
(8, 'Den Helder', '2016-09-04', 1);

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
('Admin', '$2a$08$nXpRIJ6cc3Ih2kZH..PrVOlghrhGIIGew4fanKSIYaMAU1JxFCZHS', 'Admin'),
('Arne_Willems', '$2a$08$TbKESpIapDcRFA578WA5SOGxBLbUvaBM8yt00y8gqEeaWm4NXtPe6', 'Pilot'),
('Daan_Aerts', '$2a$08$Bo.eNlMrRExni.ne9WLx6ecq3S3VbcIn17HR.Zg.xJxMbj9UNs4sS', 'Pilot'),
('Field_director', '$2a$12$xu9kChiL6fHcKhHDEUhTme.mscmO.21nRxXqBrdfH1WisOTYy70Re', 'Field director'),
('Judge1', '$2a$12$3r0EI4iWJjpUVneYQOejeej69S43fbuGww5hEBpXlYOTu39.LReSa', 'Judge'),
('Judge2', '$2a$12$bdbjLOKmG1N4OGmLHg9xouAzbVM9bKD9tNpEu0sz6c3Tbeezw3L.a', 'Judge'),
('Judge3', '$2a$12$rZ.gC1SvE6f6bLZ3P3V4g.3/ohds5nXjOUedZ/Ayu0U0M2EZEwwMK', 'Judge'),
('Lars_Wouters', '$2a$08$U9cvnRVdrkVVmZ48Qf/VJOp48G.ybYAG0OfnzW/H7UVGMwO1Qe38C', 'Pilot'),
('Louis_Jacobs', '$2a$08$s2CfUFHJ.VhGKblN57IcZe126D7Vh/Iv5Vb..pnObhR5mx9OdwPiy', 'Pilot'),
('Lucas_Maes', '$2a$08$FbsacPQAo81sGHXLMHFBje2fPp8BIoO7GuqJwqEa5rvn8VaEq1Oke', 'Pilot'),
('Nathan_Janssens', '$2a$08$FIHWxHUGuvwKB8D15CaZOuZ6aYjn9M2b9/fLYcUZR3.n8HIlVH8zq', 'Pilot'),
('Seppe_De_Smet', '$2a$08$KcrFJMptc8xKAzAyH0sLVOl0gkPlJFaZy7ewKD.tn2EyyfYE0O9ae', 'Pilot'),
('Simon_Claes', '$2a$08$lcaok9G.18RMHNgGliWk9ebOUpXBNrBz/u.hoL24c6.q4bM57zBUy', 'Pilot'),
('Thomas_Peeters', '$2a$08$ScfbE5fpi1GOYep0iOv/a..uGSmWGISjbpe4Q0/H/YBFLAx8DmriW', 'Pilot'),
('Victor_Goossens', '$2a$08$xBmEWgsqvYyvLjfbG69SSuSAuOH97NfMNo64NlWv5Zp0Xae5CuvXy', 'Pilot'),
('Wout_Mertens', '$2a$08$TqcDw1syYJI1ciOxDHYG8uUgxSpeJPPx6PXf9A5rUmhev79pemx5y', 'Pilot');

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
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `EmailAddress` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `person`
--

INSERT INTO `person` (`Username`, `FirstName`, `LastName`, `EmailAddress`) VALUES
('Arne_Willems', 'Arne', 'Willems', 'arne.willems@tricksparty.be'),
('Daan_Aerts', 'Daan', 'Aerts', 'daan.aerts@tricksparty.be'),
('Lars_Wouters', 'Lars', 'Wouters', 'lars.wouters@tricksparty.be'),
('Louis_Jacobs', 'Louis', 'Jacobs', 'louis.jacobs@tricksparty.be'),
('Lucas_Maes', 'Lucas', 'Maes', 'lucas.maes@tricksparty.be'),
('Nathan_Janssens', 'Nathan', 'Janssens', 'nathan.janssens@tricksparty.be'),
('Seppe_De_Smet', 'Seppe', 'De Smet', 'seppe.de.smet@tricksparty.be'),
('Simon_Claes', 'Simon', 'Claes', 'simon.claes@tricksparty.be'),
('Thomas_Peeters', 'Thomas', 'Peeters', 'thomas.peeters@tricksparty.be'),
('Victor_Goossens', 'Victor', 'Goossens', 'victor.goossens@tricksparty.be'),
('Wout_Mertens', 'Wout', 'Mertens', 'wout.mertens@tricksparty.be');

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

--
-- Gegevens worden geëxporteerd voor tabel `ranking`
--

INSERT INTO `ranking` (`ID`, `Location`, `Date`, `PilotUsername`, `PilotFirstName`, `PilotLastName`, `PilotEmailAddress`, `NumberOfJudges`, `BalletTricksPercentage`, `ArtisticPercentage`, `ArtisticMultiplier`, `TechnicalPercentage`, `TechnicalMultiplier`, `ImposedTricksPercentage`, `FreeExpressionPercentage`) VALUES
(9, 'Den Helder', '2014-09-07', 'Arne_Willems', 'Arne', 'Willems', 'arne.willems@tricksparty.be', 1, 30, 30, 3, 30, 2, 40, 100),
(10, 'Den Helder', '2014-09-07', 'Daan_Aerts', 'Daan', 'Aerts', 'daan.aerts@tricksparty.be', 1, 30, 30, 3, 30, 2, 40, 100),
(11, 'Den Helder', '2014-09-07', 'Lars_Wouters', 'Lars', 'Wouters', 'lars.wouters@tricksparty.be', 1, 30, 30, 3, 30, 2, 40, 100),
(12, 'Den Helder', '2014-09-07', 'Louis_Jacobs', 'Louis', 'Jacobs', 'louis.jacobs@tricksparty.be', 1, 30, 30, 3, 30, 2, 40, 100),
(13, 'Den Helder', '2014-09-07', 'Lucas_Maes', 'Lucas', 'Maes', 'lucas.maes@tricksparty.be', 1, 30, 30, 3, 30, 2, 40, 100),
(14, 'Den Helder', '2014-09-07', 'Nathan_Janssens', 'Nathan', 'Janssens', 'nathan.janssens@tricksparty.be', 1, 30, 30, 3, 30, 2, 40, 100),
(15, 'Den Helder', '2014-09-07', 'Seppe_De_Smet', 'Seppe', 'De Smet', 'seppe.de.smet@tricksparty.be', 1, 30, 30, 3, 30, 2, 40, 100),
(16, 'Den Helder', '2014-09-07', 'Simon_Claes', 'Simon', 'Claes', 'simon.claes@tricksparty.be', 1, 30, 30, 3, 30, 2, 40, 100),
(17, 'Den Helder', '2014-09-07', 'Thomas_Peeters', 'Thomas', 'Peeters', 'thomas.peeters@tricksparty.be', 1, 30, 30, 3, 30, 2, 40, 100),
(18, 'Den Helder', '2014-09-07', 'Victor_Goossens', 'Victor', 'Goossens', 'victor.goossens@tricksparty.be', 1, 30, 30, 3, 30, 2, 40, 100),
(19, 'Den Helder', '2014-09-07', 'Wout_Mertens', 'Wout', 'Mertens', 'wout.mertens@tricksparty.be', 1, 30, 30, 3, 30, 2, 40, 100),
(20, 'Zeebrugge', '2015-05-03', 'Arne_Willems', 'Arne', 'Willems', 'arne.willems@tricksparty.be', 1, 30, 30, 3, 30, 2, 40, 100),
(21, 'Zeebrugge', '2015-05-03', 'Daan_Aerts', 'Daan', 'Aerts', 'daan.aerts@tricksparty.be', 1, 30, 30, 3, 30, 2, 40, 100),
(22, 'Zeebrugge', '2015-05-03', 'Lars_Wouters', 'Lars', 'Wouters', 'lars.wouters@tricksparty.be', 1, 30, 30, 3, 30, 2, 40, 100),
(23, 'Zeebrugge', '2015-05-03', 'Louis_Jacobs', 'Louis', 'Jacobs', 'louis.jacobs@tricksparty.be', 1, 30, 30, 3, 30, 2, 40, 100),
(24, 'Zeebrugge', '2015-05-03', 'Lucas_Maes', 'Lucas', 'Maes', 'lucas.maes@tricksparty.be', 1, 30, 30, 3, 30, 2, 40, 100),
(25, 'Zeebrugge', '2015-05-03', 'Nathan_Janssens', 'Nathan', 'Janssens', 'nathan.janssens@tricksparty.be', 1, 30, 30, 3, 30, 2, 40, 100),
(26, 'Zeebrugge', '2015-05-03', 'Seppe_De_Smet', 'Seppe', 'De Smet', 'seppe.de.smet@tricksparty.be', 1, 30, 30, 3, 30, 2, 40, 100),
(27, 'Zeebrugge', '2015-05-03', 'Simon_Claes', 'Simon', 'Claes', 'simon.claes@tricksparty.be', 1, 30, 30, 3, 30, 2, 40, 100),
(28, 'Zeebrugge', '2015-05-03', 'Thomas_Peeters', 'Thomas', 'Peeters', 'thomas.peeters@tricksparty.be', 1, 30, 30, 3, 30, 2, 40, 100),
(29, 'Zeebrugge', '2015-05-03', 'Victor_Goossens', 'Victor', 'Goossens', 'victor.goossens@tricksparty.be', 1, 30, 30, 3, 30, 2, 40, 100),
(30, 'Zeebrugge', '2015-05-03', 'Wout_Mertens', 'Wout', 'Mertens', 'wout.mertens@tricksparty.be', 1, 30, 30, 3, 30, 2, 40, 100),
(31, 'Bray-Dunes', '2015-05-23', 'Arne_Willems', 'Arne', 'Willems', 'arne.willems@tricksparty.be', 1, 30, 30, 3, 30, 2, 40, 100),
(32, 'Bray-Dunes', '2015-05-23', 'Daan_Aerts', 'Daan', 'Aerts', 'daan.aerts@tricksparty.be', 1, 30, 30, 3, 30, 2, 40, 100),
(33, 'Bray-Dunes', '2015-05-23', 'Lars_Wouters', 'Lars', 'Wouters', 'lars.wouters@tricksparty.be', 1, 30, 30, 3, 30, 2, 40, 100),
(34, 'Bray-Dunes', '2015-05-23', 'Louis_Jacobs', 'Louis', 'Jacobs', 'louis.jacobs@tricksparty.be', 1, 30, 30, 3, 30, 2, 40, 100),
(35, 'Bray-Dunes', '2015-05-23', 'Lucas_Maes', 'Lucas', 'Maes', 'lucas.maes@tricksparty.be', 1, 30, 30, 3, 30, 2, 40, 100),
(36, 'Bray-Dunes', '2015-05-23', 'Nathan_Janssens', 'Nathan', 'Janssens', 'nathan.janssens@tricksparty.be', 1, 30, 30, 3, 30, 2, 40, 100),
(37, 'Bray-Dunes', '2015-05-23', 'Seppe_De_Smet', 'Seppe', 'De Smet', 'seppe.de.smet@tricksparty.be', 1, 30, 30, 3, 30, 2, 40, 100),
(38, 'Bray-Dunes', '2015-05-23', 'Simon_Claes', 'Simon', 'Claes', 'simon.claes@tricksparty.be', 1, 30, 30, 3, 30, 2, 40, 100),
(39, 'Bray-Dunes', '2015-05-23', 'Thomas_Peeters', 'Thomas', 'Peeters', 'thomas.peeters@tricksparty.be', 1, 30, 30, 3, 30, 2, 40, 100),
(40, 'Bray-Dunes', '2015-05-23', 'Victor_Goossens', 'Victor', 'Goossens', 'victor.goossens@tricksparty.be', 1, 30, 30, 3, 30, 2, 40, 100),
(41, 'Bray-Dunes', '2015-05-23', 'Wout_Mertens', 'Wout', 'Mertens', 'wout.mertens@tricksparty.be', 1, 30, 30, 3, 30, 2, 40, 100),
(42, 'Den Helder', '2015-09-06', 'Arne_Willems', 'Arne', 'Willems', 'arne.willems@tricksparty.be', 1, 30, 30, 3, 30, 2, 40, 100),
(43, 'Den Helder', '2015-09-06', 'Daan_Aerts', 'Daan', 'Aerts', 'daan.aerts@tricksparty.be', 1, 30, 30, 3, 30, 2, 40, 100),
(44, 'Den Helder', '2015-09-06', 'Lars_Wouters', 'Lars', 'Wouters', 'lars.wouters@tricksparty.be', 1, 30, 30, 3, 30, 2, 40, 100),
(45, 'Den Helder', '2015-09-06', 'Louis_Jacobs', 'Louis', 'Jacobs', 'louis.jacobs@tricksparty.be', 1, 30, 30, 3, 30, 2, 40, 100),
(46, 'Den Helder', '2015-09-06', 'Lucas_Maes', 'Lucas', 'Maes', 'lucas.maes@tricksparty.be', 1, 30, 30, 3, 30, 2, 40, 100),
(47, 'Den Helder', '2015-09-06', 'Nathan_Janssens', 'Nathan', 'Janssens', 'nathan.janssens@tricksparty.be', 1, 30, 30, 3, 30, 2, 40, 100),
(48, 'Den Helder', '2015-09-06', 'Seppe_De_Smet', 'Seppe', 'De Smet', 'seppe.de.smet@tricksparty.be', 1, 30, 30, 3, 30, 2, 40, 100),
(49, 'Den Helder', '2015-09-06', 'Simon_Claes', 'Simon', 'Claes', 'simon.claes@tricksparty.be', 1, 30, 30, 3, 30, 2, 40, 100),
(50, 'Den Helder', '2015-09-06', 'Thomas_Peeters', 'Thomas', 'Peeters', 'thomas.peeters@tricksparty.be', 1, 30, 30, 3, 30, 2, 40, 100),
(51, 'Den Helder', '2015-09-06', 'Victor_Goossens', 'Victor', 'Goossens', 'victor.goossens@tricksparty.be', 1, 30, 30, 3, 30, 2, 40, 100),
(52, 'Den Helder', '2015-09-06', 'Wout_Mertens', 'Wout', 'Mertens', 'wout.mertens@tricksparty.be', 1, 30, 30, 3, 30, 2, 40, 100),
(53, 'Zeebrugge', '2016-05-01', 'Arne_Willems', 'Arne', 'Willems', 'arne.willems@tricksparty.be', 1, 30, 30, 3, 30, 2, 40, 100),
(54, 'Zeebrugge', '2016-05-01', 'Daan_Aerts', 'Daan', 'Aerts', 'daan.aerts@tricksparty.be', 1, 30, 30, 3, 30, 2, 40, 100),
(55, 'Zeebrugge', '2016-05-01', 'Lars_Wouters', 'Lars', 'Wouters', 'lars.wouters@tricksparty.be', 1, 30, 30, 3, 30, 2, 40, 100),
(56, 'Zeebrugge', '2016-05-01', 'Louis_Jacobs', 'Louis', 'Jacobs', 'louis.jacobs@tricksparty.be', 1, 30, 30, 3, 30, 2, 40, 100),
(57, 'Zeebrugge', '2016-05-01', 'Lucas_Maes', 'Lucas', 'Maes', 'lucas.maes@tricksparty.be', 1, 30, 30, 3, 30, 2, 40, 100),
(58, 'Zeebrugge', '2016-05-01', 'Nathan_Janssens', 'Nathan', 'Janssens', 'nathan.janssens@tricksparty.be', 1, 30, 30, 3, 30, 2, 40, 100),
(59, 'Zeebrugge', '2016-05-01', 'Seppe_De_Smet', 'Seppe', 'De Smet', 'seppe.de.smet@tricksparty.be', 1, 30, 30, 3, 30, 2, 40, 100),
(60, 'Zeebrugge', '2016-05-01', 'Simon_Claes', 'Simon', 'Claes', 'simon.claes@tricksparty.be', 1, 30, 30, 3, 30, 2, 40, 100),
(61, 'Zeebrugge', '2016-05-01', 'Thomas_Peeters', 'Thomas', 'Peeters', 'thomas.peeters@tricksparty.be', 1, 30, 30, 3, 30, 2, 40, 100),
(62, 'Zeebrugge', '2016-05-01', 'Victor_Goossens', 'Victor', 'Goossens', 'victor.goossens@tricksparty.be', 1, 30, 30, 3, 30, 2, 40, 100),
(63, 'Zeebrugge', '2016-05-01', 'Wout_Mertens', 'Wout', 'Mertens', 'wout.mertens@tricksparty.be', 1, 30, 30, 3, 30, 2, 40, 100),
(64, 'Bray-Dunes', '2016-05-15', 'Arne_Willems', 'Arne', 'Willems', 'arne.willems@tricksparty.be', 1, 30, 30, 3, 30, 2, 40, 100),
(65, 'Bray-Dunes', '2016-05-15', 'Daan_Aerts', 'Daan', 'Aerts', 'daan.aerts@tricksparty.be', 1, 30, 30, 3, 30, 2, 40, 100),
(66, 'Bray-Dunes', '2016-05-15', 'Lars_Wouters', 'Lars', 'Wouters', 'lars.wouters@tricksparty.be', 1, 30, 30, 3, 30, 2, 40, 100),
(67, 'Bray-Dunes', '2016-05-15', 'Louis_Jacobs', 'Louis', 'Jacobs', 'louis.jacobs@tricksparty.be', 1, 30, 30, 3, 30, 2, 40, 100),
(68, 'Bray-Dunes', '2016-05-15', 'Lucas_Maes', 'Lucas', 'Maes', 'lucas.maes@tricksparty.be', 1, 30, 30, 3, 30, 2, 40, 100),
(69, 'Bray-Dunes', '2016-05-15', 'Nathan_Janssens', 'Nathan', 'Janssens', 'nathan.janssens@tricksparty.be', 1, 30, 30, 3, 30, 2, 40, 100),
(70, 'Bray-Dunes', '2016-05-15', 'Seppe_De_Smet', 'Seppe', 'De Smet', 'seppe.de.smet@tricksparty.be', 1, 30, 30, 3, 30, 2, 40, 100),
(71, 'Bray-Dunes', '2016-05-15', 'Simon_Claes', 'Simon', 'Claes', 'simon.claes@tricksparty.be', 1, 30, 30, 3, 30, 2, 40, 100),
(72, 'Bray-Dunes', '2016-05-15', 'Thomas_Peeters', 'Thomas', 'Peeters', 'thomas.peeters@tricksparty.be', 1, 30, 30, 3, 30, 2, 40, 100),
(73, 'Bray-Dunes', '2016-05-15', 'Victor_Goossens', 'Victor', 'Goossens', 'victor.goossens@tricksparty.be', 1, 30, 30, 3, 30, 2, 40, 100),
(74, 'Bray-Dunes', '2016-05-15', 'Wout_Mertens', 'Wout', 'Mertens', 'wout.mertens@tricksparty.be', 1, 30, 30, 3, 30, 2, 40, 100);

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

--
-- Gegevens worden geëxporteerd voor tabel `rankingscore`
--

INSERT INTO `rankingscore` (`RankingID`, `ScoreType`, `Score`, `Trick`) VALUES
(9, 'BT1', 8, 'Slotmachine'),
(9, 'BT2', 8, '540'),
(9, 'BT3', 0, 'Multislot'),
(9, 'BT4', 4, 'Fade'),
(9, 'BT5', 4, '540'),
(9, 'BT6', 0, 'Spike'),
(9, 'BT7', 4, 'Fade'),
(9, 'BT8', 10, 'Multislot'),
(9, 'BT9', 3, '2 Tips Landing'),
(9, 'IT1', 6.4, 'Yoyo Multilazy'),
(9, 'IT2', 6, 'Rolling Susan'),
(9, 'IT3', 6.4, 'Axel'),
(9, 'IT4', 7, '2 Tips Landing'),
(9, 'Total artistic', 12, NULL),
(9, 'Total free expression', 5, NULL),
(9, 'Total technical', 13, NULL),
(10, 'BT1', 6, 'Lazy Susan'),
(10, 'BT2', 4, 'Slotmachine'),
(10, 'BT3', 0, 'Jacobs Ladder'),
(10, 'BT4', 0, 'Fade'),
(10, 'BT5', 0, 'Flic Flac (pancake)'),
(10, 'BT6', 0, 'Cascade'),
(10, 'BT7', 0, 'Jacobs Ladder'),
(10, 'BT8', 8, 'Yoyo'),
(10, 'BT9', 0, 'Kombo'),
(10, 'IT1', 6, 'Yoyo Multilazy'),
(10, 'IT2', 5, 'Rolling Susan'),
(10, 'IT3', 1, 'Axel'),
(10, 'IT4', 5, '2 Tips Landing'),
(10, 'Total artistic', 4, NULL),
(10, 'Total free expression', 4, NULL),
(10, 'Total technical', 4, NULL),
(11, 'BT1', 4, 'Half Axel'),
(11, 'BT2', 2, 'Half Axel'),
(11, 'BT3', 6, 'Lazy Susan'),
(11, 'BT4', 4, 'Fade'),
(11, 'BT5', 0, 'Backspins'),
(11, 'BT6', 2, 'Turtle (Backflip)'),
(11, 'BT7', 0, 'Fade'),
(11, 'BT8', 6, 'Lazy Susan'),
(11, 'BT9', 0, 'Insane'),
(11, 'IT1', 5, 'Yoyo Multilazy'),
(11, 'IT2', 1, 'Rolling Susan'),
(11, 'IT3', 1, 'Axel'),
(11, 'IT4', 1, '2 Tips Landing'),
(11, 'Total artistic', 5, NULL),
(11, 'Total free expression', 6, NULL),
(11, 'Total technical', 3, NULL),
(12, 'BT1', 0, 'Lazy Susan'),
(12, 'BT2', 3, 'Flic Flac (pancake)'),
(12, 'BT3', 0, '540'),
(12, 'BT4', 0, 'Fade'),
(12, 'BT5', 0, 'Yoyo'),
(12, 'BT6', 4, 'Insane'),
(12, 'BT7', 0, 'Lewis'),
(12, 'BT8', 0, 'Side Slide'),
(12, 'BT9', 0, '2 Tips Landing'),
(12, 'IT1', 7, 'Yoyo Multilazy'),
(12, 'IT2', 4.8, 'Rolling Susan'),
(12, 'IT3', 1, 'Axel'),
(12, 'IT4', 4, '2 Tips Landing'),
(12, 'Total artistic', 4, NULL),
(12, 'Total free expression', 7, NULL),
(12, 'Total technical', 3, NULL),
(13, 'BT1', 6, 'Cascade'),
(13, 'BT2', 0, 'Slotmachine'),
(13, 'BT3', 8, 'Backspins'),
(13, 'BT4', 4, 'Insane'),
(13, 'BT5', 9, 'Axel'),
(13, 'BT6', 4, 'Insane'),
(13, 'BT7', 0, 'Double Axel'),
(13, 'BT8', 0, 'Multislot'),
(13, 'BT9', 12, '540'),
(13, 'IT1', 4, 'Yoyo Multilazy'),
(13, 'IT2', 2, 'Rolling Susan'),
(13, 'IT3', 1, 'Axel'),
(13, 'IT4', 2.4, '2 Tips Landing'),
(13, 'Total artistic', 11, NULL),
(13, 'Total free expression', 4, NULL),
(13, 'Total technical', 11, NULL),
(14, 'BT1', 4, '540'),
(14, 'BT2', 4, 'Backspins'),
(14, 'BT3', 4, 'Slotmachine'),
(14, 'BT4', 8, 'Multilazy'),
(14, 'BT5', 0, 'Slotmachine'),
(14, 'BT6', 8, 'Multilazy'),
(14, 'BT7', 8, 'Backspins'),
(14, 'BT8', 8, 'Lewis'),
(14, 'BT9', 8, 'Jacobs Ladder'),
(14, 'IT1', 4.8, 'Yoyo Multilazy'),
(14, 'IT2', 1.6, 'Rolling Susan'),
(14, 'IT3', 1, 'Axel'),
(14, 'IT4', 1, '2 Tips Landing'),
(14, 'Total artistic', 10, NULL),
(14, 'Total free expression', 2, NULL),
(14, 'Total technical', 7, NULL),
(15, 'BT1', 4, '540'),
(15, 'BT2', 8, 'Backspins'),
(15, 'BT3', 8, 'Slotmachine'),
(15, 'BT4', 0, 'Multilazy'),
(15, 'BT5', 4, 'Slotmachine'),
(15, 'BT6', 8, 'Multilazy'),
(15, 'BT7', 4, 'Backspins'),
(15, 'BT8', 8, 'Lewis'),
(15, 'BT9', 8, 'Jacobs Ladder'),
(15, 'IT1', 6, 'Yoyo Multilazy'),
(15, 'IT2', 5, 'Rolling Susan'),
(15, 'IT3', 1, 'Axel'),
(15, 'IT4', 1.6, '2 Tips Landing'),
(15, 'Total artistic', 8, NULL),
(15, 'Total free expression', 4, NULL),
(15, 'Total technical', 12, NULL),
(16, 'BT1', 6, 'Axel'),
(16, 'BT2', 0, 'Multislot'),
(16, 'BT3', 4, 'Slotmachine'),
(16, 'BT4', 6, 'Axel'),
(16, 'BT5', 4, '540'),
(16, 'BT6', 5, 'Double Axel'),
(16, 'BT7', 0, 'Slotmachine'),
(16, 'BT8', 4, '540'),
(16, 'BT9', 0, 'Multislot'),
(16, 'IT1', 8, 'Yoyo Multilazy'),
(16, 'IT2', 5, 'Rolling Susan'),
(16, 'IT3', 4, 'Axel'),
(16, 'IT4', 5, '2 Tips Landing'),
(16, 'Total artistic', 5, NULL),
(16, 'Total free expression', 7, NULL),
(16, 'Total technical', 11, NULL),
(17, 'BT1', 4, 'Half Axel'),
(17, 'BT2', 4, 'Half Axel'),
(17, 'BT3', 3, 'Lazy Susan'),
(17, 'BT4', 2, 'Fade'),
(17, 'BT5', 4, 'Backspins'),
(17, 'BT6', 0, 'Cascade'),
(17, 'BT7', 0, 'Fade'),
(17, 'BT8', 6, 'Lazy Susan'),
(17, 'BT9', 0, 'Turtle (Backflip)'),
(17, 'IT1', 8, 'Yoyo Multilazy'),
(17, 'IT2', 5, 'Rolling Susan'),
(17, 'IT3', 7, 'Axel'),
(17, 'IT4', 5, '2 Tips Landing'),
(17, 'Total artistic', 2, NULL),
(17, 'Total free expression', 4, NULL),
(17, 'Total technical', 2, NULL),
(18, 'BT1', 0, 'Backspin Cascade'),
(18, 'BT2', 0, 'Jacobs Ladder'),
(18, 'BT3', 4, 'Backspins'),
(18, 'BT4', 10, 'Wap Doo Wap'),
(18, 'BT5', 4, 'Jacobs Ladder'),
(18, 'BT6', 0, 'Backspin Cascade'),
(18, 'BT7', 3, 'Cascade'),
(18, 'BT8', 8, 'Lewis'),
(18, 'BT9', 10, 'Comete'),
(18, 'IT1', 8, 'Yoyo Multilazy'),
(18, 'IT2', 6.4, 'Rolling Susan'),
(18, 'IT3', 1, 'Axel'),
(18, 'IT4', 5.6, '2 Tips Landing'),
(18, 'Total artistic', 10, NULL),
(18, 'Total free expression', 6, NULL),
(18, 'Total technical', 10, NULL),
(19, 'BT1', 3, 'Cascade'),
(19, 'BT2', 10, 'Comete'),
(19, 'BT3', 5, 'Multislot'),
(19, 'BT4', 8, 'Multilazy'),
(19, 'BT5', 8, 'Lewis'),
(19, 'BT6', 0, '540 Mutex'),
(19, 'BT7', 8, 'Rolling Cascade'),
(19, 'BT8', 15, 'Comete'),
(19, 'BT9', 6, 'Kombo'),
(19, 'IT1', 5, 'Yoyo Multilazy'),
(19, 'IT2', 5.6, 'Rolling Susan'),
(19, 'IT3', 6, 'Axel'),
(19, 'IT4', 3, '2 Tips Landing'),
(19, 'Total artistic', 12, NULL),
(19, 'Total free expression', 5, NULL),
(19, 'Total technical', 12, NULL),
(20, 'BT1', 8, 'Slotmachine'),
(20, 'BT2', 0, '540'),
(20, 'BT3', 0, 'Multislot'),
(20, 'BT4', 2, 'Fade'),
(20, 'BT5', 0, '540'),
(20, 'BT6', 4, 'Spike'),
(20, 'BT7', 0, 'Fade'),
(20, 'BT8', 0, 'Multislot'),
(20, 'BT9', 0, '2 Tips Landing'),
(20, 'IT1', 5, 'Half Axel'),
(20, 'IT2', 6, 'Fade'),
(20, 'IT3', 5, 'Backspins'),
(20, 'IT4', 4, '540'),
(20, 'Total artistic', 6, NULL),
(20, 'Total free expression', 5, NULL),
(20, 'Total technical', 6, NULL),
(21, 'BT1', 0, 'Lazy Susan'),
(21, 'BT2', 8, 'Slotmachine'),
(21, 'BT3', 4, 'Jacobs Ladder'),
(21, 'BT4', 0, 'Fade'),
(21, 'BT5', 0, 'Flic Flac (pancake)'),
(21, 'BT6', 0, 'Cascade'),
(21, 'BT7', 0, 'Jacobs Ladder'),
(21, 'BT8', 4, 'Yoyo'),
(21, 'BT9', 0, 'Kombo'),
(21, 'IT1', 8, 'Half Axel'),
(21, 'IT2', 4.8, 'Fade'),
(21, 'IT3', 1, 'Backspins'),
(21, 'IT4', 4.8, '540'),
(21, 'Total artistic', 2, NULL),
(21, 'Total free expression', 6, NULL),
(21, 'Total technical', 4, NULL),
(22, 'BT1', 2, 'Half Axel'),
(22, 'BT2', 0, 'Half Axel'),
(22, 'BT3', 0, 'Lazy Susan'),
(22, 'BT4', 0, 'Fade'),
(22, 'BT5', 0, 'Backspins'),
(22, 'BT6', 0, 'Turtle (Backflip)'),
(22, 'BT7', 0, 'Fade'),
(22, 'BT8', 0, 'Lazy Susan'),
(22, 'BT9', 0, 'Insane'),
(22, 'IT1', 8, 'Half Axel'),
(22, 'IT2', 6, 'Fade'),
(22, 'IT3', 8, 'Backspins'),
(22, 'IT4', 7, '540'),
(22, 'Total artistic', 2, NULL),
(22, 'Total free expression', 8, NULL),
(22, 'Total technical', 5, NULL),
(23, 'BT1', 6, 'Lazy Susan'),
(23, 'BT2', 0, 'Flic Flac (pancake)'),
(23, 'BT3', 8, '540'),
(23, 'BT4', 4, 'Fade'),
(23, 'BT5', 0, 'Yoyo'),
(23, 'BT6', 0, 'Insane'),
(23, 'BT7', 0, 'Lewis'),
(23, 'BT8', 0, 'Side Slide'),
(23, 'BT9', 0, '2 Tips Landing'),
(23, 'IT1', 8, 'Half Axel'),
(23, 'IT2', 6, 'Fade'),
(23, 'IT3', 4.8, 'Backspins'),
(23, 'IT4', 7, '540'),
(23, 'Total artistic', 3, NULL),
(23, 'Total free expression', 7, NULL),
(23, 'Total technical', 2, NULL),
(24, 'BT1', 6, 'Cascade'),
(24, 'BT2', 8, 'Slotmachine'),
(24, 'BT3', 0, 'Backspins'),
(24, 'BT4', 4, 'Insane'),
(24, 'BT5', 0, 'Axel'),
(24, 'BT6', 4, 'Insane'),
(24, 'BT7', 0, 'Double Axel'),
(24, 'BT8', 0, 'Multislot'),
(24, 'BT9', 0, '540'),
(24, 'IT1', 5, 'Half Axel'),
(24, 'IT2', 5, 'Fade'),
(24, 'IT3', 1, 'Backspins'),
(24, 'IT4', 1.6, '540'),
(24, 'Total artistic', 5, NULL),
(24, 'Total free expression', 4, NULL),
(24, 'Total technical', 6, NULL),
(25, 'BT1', 4, '540'),
(25, 'BT2', 4, 'Backspins'),
(25, 'BT3', 4, 'Slotmachine'),
(25, 'BT4', 8, 'Multilazy'),
(25, 'BT5', 0, 'Slotmachine'),
(25, 'BT6', 8, 'Multilazy'),
(25, 'BT7', 8, 'Backspins'),
(25, 'BT8', 8, 'Lewis'),
(25, 'BT9', 8, 'Jacobs Ladder'),
(25, 'IT1', 3.2, 'Half Axel'),
(25, 'IT2', 3.2, 'Fade'),
(25, 'IT3', 1, 'Backspins'),
(25, 'IT4', 1, '540'),
(25, 'Total artistic', 10, NULL),
(25, 'Total free expression', 2, NULL),
(25, 'Total technical', 7, NULL),
(26, 'BT1', 4, '540'),
(26, 'BT2', 8, 'Backspins'),
(26, 'BT3', 4, 'Slotmachine'),
(26, 'BT4', 4, 'Multilazy'),
(26, 'BT5', 4, 'Slotmachine'),
(26, 'BT6', 4, 'Multilazy'),
(26, 'BT7', 8, 'Backspins'),
(26, 'BT8', 8, 'Lewis'),
(26, 'BT9', 0, 'Jacobs Ladder'),
(26, 'IT1', 4, 'Half Axel'),
(26, 'IT2', 3, 'Fade'),
(26, 'IT3', 1, 'Backspins'),
(26, 'IT4', 2.4, '540'),
(26, 'Total artistic', 9, NULL),
(26, 'Total free expression', 4, NULL),
(26, 'Total technical', 7, NULL),
(27, 'BT1', 3, 'Axel'),
(27, 'BT2', 10, 'Multislot'),
(27, 'BT3', 0, 'Slotmachine'),
(27, 'BT4', 3, 'Axel'),
(27, 'BT5', 8, '540'),
(27, 'BT6', 5, 'Double Axel'),
(27, 'BT7', 8, 'Slotmachine'),
(27, 'BT8', 8, '540'),
(27, 'BT9', 15, 'Multislot'),
(27, 'IT1', 6, 'Half Axel'),
(27, 'IT2', 5.6, 'Fade'),
(27, 'IT3', 1, 'Backspins'),
(27, 'IT4', 3.2, '540'),
(27, 'Total artistic', 12, NULL),
(27, 'Total free expression', 7, NULL),
(27, 'Total technical', 10, NULL),
(28, 'BT1', 4, 'Half Axel'),
(28, 'BT2', 0, 'Half Axel'),
(28, 'BT3', 0, 'Lazy Susan'),
(28, 'BT4', 0, 'Fade'),
(28, 'BT5', 8, 'Backspins'),
(28, 'BT6', 0, 'Cascade'),
(28, 'BT7', 0, 'Fade'),
(28, 'BT8', 0, 'Lazy Susan'),
(28, 'BT9', 0, 'Turtle (Backflip)'),
(28, 'IT1', 4, 'Half Axel'),
(28, 'IT2', 2, 'Fade'),
(28, 'IT3', 1, 'Backspins'),
(28, 'IT4', 2, '540'),
(28, 'Total artistic', 2, NULL),
(28, 'Total free expression', 6, NULL),
(28, 'Total technical', 2, NULL),
(29, 'BT1', 0, 'Backspins'),
(29, 'BT2', 0, 'Jacobs Ladder'),
(29, 'BT3', 4, 'Backspins'),
(29, 'BT4', 10, 'Wap Doo Wap'),
(29, 'BT5', 8, 'Jacobs Ladder'),
(29, 'BT6', 10, 'Backspin Cascade'),
(29, 'BT7', 6, 'Cascade'),
(29, 'BT8', 4, 'Lewis'),
(29, 'BT9', 5, 'Comete'),
(29, 'IT1', 6, 'Half Axel'),
(29, 'IT2', 6, 'Fade'),
(29, 'IT3', 1, 'Backspins'),
(29, 'IT4', 6, '540'),
(29, 'Total artistic', 10, NULL),
(29, 'Total free expression', 4, NULL),
(29, 'Total technical', 8, NULL),
(30, 'BT1', 3, 'Cascade'),
(30, 'BT2', 0, 'Comete'),
(30, 'BT3', 0, 'Multislot'),
(30, 'BT4', 8, 'Multilazy'),
(30, 'BT5', 4, 'Lewis'),
(30, 'BT6', 0, '540 Mutex'),
(30, 'BT7', 8, 'Rolling Cascade'),
(30, 'BT8', 5, 'Comete'),
(30, 'BT9', 6, 'Kombo'),
(30, 'IT1', 6.4, 'Half Axel'),
(30, 'IT2', 7, 'Fade'),
(30, 'IT3', 6.4, 'Backspins'),
(30, 'IT4', 8, '540'),
(30, 'Total artistic', 5, NULL),
(30, 'Total free expression', 5, NULL),
(30, 'Total technical', 4, NULL),
(31, 'BT1', 4, 'Slotmachine'),
(31, 'BT2', 8, '540'),
(31, 'BT3', 0, 'Multislot'),
(31, 'BT4', 4, 'Fade'),
(31, 'BT5', 4, '540'),
(31, 'BT6', 0, 'Spike'),
(31, 'BT7', 4, 'Fade'),
(31, 'BT8', 5, 'Multislot'),
(31, 'BT9', 3, '2 Tips Landing'),
(31, 'IT1', 5, '540 Mutex'),
(31, 'IT2', 5.6, 'Multilazy'),
(31, 'IT3', 6, 'Side Slide'),
(31, 'IT4', 3, 'Kombo'),
(31, 'Total artistic', 12, NULL),
(31, 'Total free expression', 7, NULL),
(31, 'Total technical', 12, NULL),
(32, 'BT1', 6, 'Lazy Susan'),
(32, 'BT2', 4, 'Slotmachine'),
(32, 'BT3', 0, 'Jacobs Ladder'),
(32, 'BT4', 4, 'Fade'),
(32, 'BT5', 3, 'Flic Flac (pancake)'),
(32, 'BT6', 0, 'Cascade'),
(32, 'BT7', 4, 'Jacobs Ladder'),
(32, 'BT8', 4, 'Yoyo'),
(32, 'BT9', 6, 'Kombo'),
(32, 'IT1', 6, '540 Mutex'),
(32, 'IT2', 7, 'Multilazy'),
(32, 'IT3', 7, 'Side Slide'),
(32, 'IT4', 5.6, 'Kombo'),
(32, 'Total artistic', 5, NULL),
(32, 'Total free expression', 7, NULL),
(32, 'Total technical', 8, NULL),
(33, 'BT1', 4, 'Half Axel'),
(33, 'BT2', 2, 'Half Axel'),
(33, 'BT3', 3, 'Lazy Susan'),
(33, 'BT4', 2, 'Fade'),
(33, 'BT5', 8, 'Backspins'),
(33, 'BT6', 0, 'Turtle (Backflip)'),
(33, 'BT7', 0, 'Fade'),
(33, 'BT8', 6, 'Lazy Susan'),
(33, 'BT9', 0, 'Insane'),
(33, 'IT1', 5.6, '540 Mutex'),
(33, 'IT2', 5, 'Multilazy'),
(33, 'IT3', 5.6, 'Side Slide'),
(33, 'IT4', 6.4, 'Kombo'),
(33, 'Total artistic', 5, NULL),
(33, 'Total free expression', 8, NULL),
(33, 'Total technical', 11, NULL),
(34, 'BT1', 0, 'Lazy Susan'),
(34, 'BT2', 0, 'Flic Flac (pancake)'),
(34, 'BT3', 8, '540'),
(34, 'BT4', 4, 'Fade'),
(34, 'BT5', 8, 'Yoyo'),
(34, 'BT6', 2, 'Insane'),
(34, 'BT7', 8, 'Lewis'),
(34, 'BT8', 4, 'Side Slide'),
(34, 'BT9', 3, '2 Tips Landing'),
(34, 'IT1', 1, '540 Mutex'),
(34, 'IT2', 7, 'Multilazy'),
(34, 'IT3', 8, 'Side Slide'),
(34, 'IT4', 1, 'Kombo'),
(34, 'Total artistic', 8, NULL),
(34, 'Total free expression', 3, NULL),
(34, 'Total technical', 10, NULL),
(35, 'BT1', 6, 'Cascade'),
(35, 'BT2', 8, 'Slotmachine'),
(35, 'BT3', 0, 'Backspins'),
(35, 'BT4', 4, 'Insane'),
(35, 'BT5', 0, 'Axel'),
(35, 'BT6', 2, 'Insane'),
(35, 'BT7', 5, 'Double Axel'),
(35, 'BT8', 5, 'Multislot'),
(35, 'BT9', 0, '540'),
(35, 'IT1', 3, '540 Mutex'),
(35, 'IT2', 6, 'Multilazy'),
(35, 'IT3', 7, 'Side Slide'),
(35, 'IT4', 7, 'Kombo'),
(35, 'Total artistic', 5, NULL),
(35, 'Total free expression', 8, NULL),
(35, 'Total technical', 8, NULL),
(36, 'BT1', 8, '540'),
(36, 'BT2', 0, 'Backspins'),
(36, 'BT3', 0, 'Slotmachine'),
(36, 'BT4', 0, 'Multilazy'),
(36, 'BT5', 8, 'Slotmachine'),
(36, 'BT6', 0, 'Multilazy'),
(36, 'BT7', 0, 'Backspins'),
(36, 'BT8', 0, 'Lewis'),
(36, 'BT9', 0, 'Jacobs Ladder'),
(36, 'IT1', 2, '540 Mutex'),
(36, 'IT2', 1, 'Multilazy'),
(36, 'IT3', 1, 'Side Slide'),
(36, 'IT4', 1, 'Kombo'),
(36, 'Total artistic', 5, NULL),
(36, 'Total free expression', 5, NULL),
(36, 'Total technical', 9, NULL),
(37, 'BT1', 0, '540'),
(37, 'BT2', 4, 'Backspins'),
(37, 'BT3', 0, 'Slotmachine'),
(37, 'BT4', 0, 'Multilazy'),
(37, 'BT5', 4, 'Slotmachine'),
(37, 'BT6', 4, 'Multilazy'),
(37, 'BT7', 0, 'Backspins'),
(37, 'BT8', 4, 'Lewis'),
(37, 'BT9', 0, 'Jacobs Ladder'),
(37, 'IT1', 1, '540 Mutex'),
(37, 'IT2', 2, 'Multilazy'),
(37, 'IT3', 1, 'Side Slide'),
(37, 'IT4', 1, 'Kombo'),
(37, 'Total artistic', 5, NULL),
(37, 'Total free expression', 9, NULL),
(37, 'Total technical', 7, NULL),
(38, 'BT1', 3, 'Axel'),
(38, 'BT2', 10, 'Multislot'),
(38, 'BT3', 0, 'Slotmachine'),
(38, 'BT4', 6, 'Axel'),
(38, 'BT5', 4, '540'),
(38, 'BT6', 10, 'Double Axel'),
(38, 'BT7', 8, 'Slotmachine'),
(38, 'BT8', 8, '540'),
(38, 'BT9', 10, 'Multislot'),
(38, 'IT1', 6, '540 Mutex'),
(38, 'IT2', 7, 'Multilazy'),
(38, 'IT3', 6.4, 'Side Slide'),
(38, 'IT4', 4, 'Kombo'),
(38, 'Total artistic', 15, NULL),
(38, 'Total free expression', 4, NULL),
(38, 'Total technical', 13, NULL),
(39, 'BT1', 2, 'Half Axel'),
(39, 'BT2', 0, 'Half Axel'),
(39, 'BT3', 3, 'Lazy Susan'),
(39, 'BT4', 4, 'Fade'),
(39, 'BT5', 12, 'Backspins'),
(39, 'BT6', 6, 'Cascade'),
(39, 'BT7', 0, 'Fade'),
(39, 'BT8', 0, 'Lazy Susan'),
(39, 'BT9', 4, 'Turtle (Backflip)'),
(39, 'IT1', 3.2, '540 Mutex'),
(39, 'IT2', 1.6, 'Multilazy'),
(39, 'IT3', 1, 'Side Slide'),
(39, 'IT4', 1, 'Kombo'),
(39, 'Total artistic', 5, NULL),
(39, 'Total free expression', 6, NULL),
(39, 'Total technical', 10, NULL),
(40, 'BT1', 5, 'Backspin Cascade'),
(40, 'BT2', 8, 'Jacobs Ladder'),
(40, 'BT3', 8, 'Backspins'),
(40, 'BT4', 10, 'Wap Doo Wap'),
(40, 'BT5', 8, 'Jacobs Ladder'),
(40, 'BT6', 10, 'Backspin Cascade'),
(40, 'BT7', 6, 'Cascade'),
(40, 'BT8', 8, 'Lewis'),
(40, 'BT9', 5, 'Comete'),
(40, 'IT1', 4.8, '540 Mutex'),
(40, 'IT2', 4, 'Multilazy'),
(40, 'IT3', 6, 'Side Slide'),
(40, 'IT4', 6.4, 'Kombo'),
(40, 'Total artistic', 8, NULL),
(40, 'Total free expression', 4, NULL),
(40, 'Total technical', 10, NULL),
(41, 'BT1', 6, 'Cascade'),
(41, 'BT2', 10, 'Comete'),
(41, 'BT3', 5, 'Multislot'),
(41, 'BT4', 8, 'Multilazy'),
(41, 'BT5', 4, 'Lewis'),
(41, 'BT6', 10, '540 Mutex'),
(41, 'BT7', 8, 'Rolling Cascade'),
(41, 'BT8', 10, 'Comete'),
(41, 'BT9', 6, 'Kombo'),
(41, 'IT1', 4, '540 Mutex'),
(41, 'IT2', 1.6, 'Multilazy'),
(41, 'IT3', 1, 'Side Slide'),
(41, 'IT4', 1, 'Kombo'),
(41, 'Total artistic', 13, NULL),
(41, 'Total free expression', 4, NULL),
(41, 'Total technical', 13, NULL),
(42, 'BT1', 2, 'Turtle (Backflip)'),
(42, 'BT2', 0, 'Lazy Susan'),
(42, 'BT3', 0, '540'),
(42, 'BT4', 4, 'Slotmachine'),
(42, 'BT5', 0, 'Backspins'),
(42, 'BT6', 4, 'Lewis'),
(42, 'BT7', 0, 'Lazy Susan'),
(42, 'BT8', 0, 'Half Axel'),
(42, 'BT9', 0, '2 Tips Landing'),
(42, 'IT1', 4, 'Stop (snapstall)'),
(42, 'IT2', 1.6, 'Lazy Susan'),
(42, 'IT3', 1, 'Jacobs Ladder'),
(42, 'IT4', 1, 'Backspin Cascade'),
(42, 'Total artistic', 9, NULL),
(42, 'Total free expression', 4, NULL),
(42, 'Total technical', 14, NULL),
(43, 'BT1', 3, 'Cascade'),
(43, 'BT2', 8, 'Jacobs Ladder'),
(43, 'BT3', 8, 'Slotmachine'),
(43, 'BT4', 10, 'Comete'),
(43, 'BT5', 6, 'Cascade'),
(43, 'BT6', 0, 'Comete'),
(43, 'BT7', 3, 'Rolling Susan'),
(43, 'BT8', 8, 'Slotmachine'),
(43, 'BT9', 6, '2 Tips Landing'),
(43, 'IT1', 5, 'Stop (snapstall)'),
(43, 'IT2', 5.6, 'Lazy Susan'),
(43, 'IT3', 6, 'Jacobs Ladder'),
(43, 'IT4', 7, 'Backspin Cascade'),
(43, 'Total artistic', 12, NULL),
(43, 'Total free expression', 6, NULL),
(43, 'Total technical', 12, NULL),
(44, 'BT1', 3, 'Lazy Susan'),
(44, 'BT2', 3, 'Axel'),
(44, 'BT3', 0, 'Half Axel'),
(44, 'BT4', 0, 'Multilazy'),
(44, 'BT5', 0, 'Lazy Susan'),
(44, 'BT6', 0, 'Axel'),
(44, 'BT7', 0, 'Jacobs Ladder'),
(44, 'BT8', 4, 'Multilazy'),
(44, 'BT9', 0, 'Lewis'),
(44, 'IT1', 2, 'Stop (snapstall)'),
(44, 'IT2', 1, 'Lazy Susan'),
(44, 'IT3', 1, 'Jacobs Ladder'),
(44, 'IT4', 1, 'Backspin Cascade'),
(44, 'Total artistic', 7, NULL),
(44, 'Total free expression', 4, NULL),
(44, 'Total technical', 6, NULL),
(45, 'BT1', 0, 'Cascade'),
(45, 'BT2', 0, 'Comete'),
(45, 'BT3', 12, 'Rolling Cascade'),
(45, 'BT4', 8, 'Multilazy'),
(45, 'BT5', 8, 'Lewis'),
(45, 'BT6', 3, 'Rolling Susan'),
(45, 'BT7', 5, 'Comete'),
(45, 'BT8', 12, 'Rolling Cascade'),
(45, 'BT9', 12, 'Lewis'),
(45, 'IT1', 7, 'Stop (snapstall)'),
(45, 'IT2', 8, 'Lazy Susan'),
(45, 'IT3', 7.2, 'Jacobs Ladder'),
(45, 'IT4', 3.2, 'Backspin Cascade'),
(45, 'Total artistic', 16, NULL),
(45, 'Total free expression', 9, NULL),
(45, 'Total technical', 14, NULL),
(46, 'BT1', 6, 'Yoyo Multilazy'),
(46, 'BT2', 4, 'Lewis'),
(46, 'BT3', 0, 'Slotmachine'),
(46, 'BT4', 0, '540'),
(46, 'BT5', 4, 'Side Slide'),
(46, 'BT6', 0, '540'),
(46, 'BT7', 0, 'Insane'),
(46, 'BT8', 0, 'Lewis'),
(46, 'BT9', 0, 'Slotmachine'),
(46, 'IT1', 1.6, 'Stop (snapstall)'),
(46, 'IT2', 2.4, 'Lazy Susan'),
(46, 'IT3', 1, 'Jacobs Ladder'),
(46, 'IT4', 1, 'Backspin Cascade'),
(46, 'Total artistic', 6, NULL),
(46, 'Total free expression', 5, NULL),
(46, 'Total technical', 7, NULL),
(47, 'BT1', 8, 'Side Slide'),
(47, 'BT2', 4, 'Slotmachine'),
(47, 'BT3', 6, 'Cascade'),
(47, 'BT4', 4, '540'),
(47, 'BT5', 2, 'Fade'),
(47, 'BT6', 0, 'Cascade'),
(47, 'BT7', 0, '540'),
(47, 'BT8', 3, '360°'),
(47, 'BT9', 0, 'Axel'),
(47, 'IT1', 1, 'Stop (snapstall)'),
(47, 'IT2', 3, 'Lazy Susan'),
(47, 'IT3', 1, 'Jacobs Ladder'),
(47, 'IT4', 2, 'Backspin Cascade'),
(47, 'Total artistic', 8, NULL),
(47, 'Total free expression', 8, NULL),
(47, 'Total technical', 8, NULL),
(48, 'BT1', 8, 'Jacobs Ladder'),
(48, 'BT2', 0, 'Lewis'),
(48, 'BT3', 8, 'Multilazy'),
(48, 'BT4', 4, 'Backspins'),
(48, 'BT5', 0, 'Side Slide'),
(48, 'BT6', 0, 'Backspins'),
(48, 'BT7', 0, 'Lewis'),
(48, 'BT8', 0, 'Multilazy'),
(48, 'BT9', 0, 'Jacobs Ladder'),
(48, 'IT1', 3.2, 'Stop (snapstall)'),
(48, 'IT2', 4, 'Lazy Susan'),
(48, 'IT3', 4, 'Jacobs Ladder'),
(48, 'IT4', 7, 'Backspin Cascade'),
(48, 'Total artistic', 8, NULL),
(48, 'Total free expression', 3, NULL),
(48, 'Total technical', 10, NULL),
(49, 'BT1', 6, 'Cascade'),
(49, 'BT2', 0, 'Backspins'),
(49, 'BT3', 3, 'Rolling Susan'),
(49, 'BT4', 6, 'Cascade'),
(49, 'BT5', 4, 'Jacobs Ladder'),
(49, 'BT6', 4, 'Backspins'),
(49, 'BT7', 5, 'Tazmachine'),
(49, 'BT8', 3, 'Rolling Susan'),
(49, 'BT9', 0, 'Backspin Cascade'),
(49, 'IT1', 1, 'Stop (snapstall)'),
(49, 'IT2', 7, 'Lazy Susan'),
(49, 'IT3', 8, 'Jacobs Ladder'),
(49, 'IT4', 1.6, 'Backspin Cascade'),
(49, 'Total artistic', 8, NULL),
(49, 'Total free expression', 8, NULL),
(49, 'Total technical', 9, NULL),
(50, 'BT1', 6, 'Lazy Susan'),
(50, 'BT2', 8, 'Slotmachine'),
(50, 'BT3', 0, 'Jacobs Ladder'),
(50, 'BT4', 4, 'Half Axel'),
(50, 'BT5', 0, 'Flic Flac (pancake)'),
(50, 'BT6', 6, 'Cascade'),
(50, 'BT7', 0, 'Jacobs Ladder'),
(50, 'BT8', 0, 'Lewis'),
(50, 'BT9', 0, 'Kombo'),
(50, 'IT1', 5.6, 'Stop (snapstall)'),
(50, 'IT2', 5, 'Lazy Susan'),
(50, 'IT3', 5, 'Jacobs Ladder'),
(50, 'IT4', 5.6, 'Backspin Cascade'),
(50, 'Total artistic', 2, NULL),
(50, 'Total free expression', 4, NULL),
(50, 'Total technical', 2, NULL),
(51, 'BT1', 4, 'Half Axel'),
(51, 'BT2', 4, 'Half Axel'),
(51, 'BT3', 3, 'Lazy Susan'),
(51, 'BT4', 0, 'Fade'),
(51, 'BT5', 4, 'Backspins'),
(51, 'BT6', 4, 'Turtle (Backflip)'),
(51, 'BT7', 2, 'Fade'),
(51, 'BT8', 3, 'Lazy Susan'),
(51, 'BT9', 3, '2 Tips Landing'),
(51, 'IT1', 6, 'Stop (snapstall)'),
(51, 'IT2', 8, 'Lazy Susan'),
(51, 'IT3', 6, 'Jacobs Ladder'),
(51, 'IT4', 5.6, 'Backspin Cascade'),
(51, 'Total artistic', 12, NULL),
(51, 'Total free expression', 7, NULL),
(51, 'Total technical', 13, NULL),
(52, 'BT1', 6, 'Lazy Susan'),
(52, 'BT2', 10, 'Double Axel'),
(52, 'BT3', 4, 'Multilazy'),
(52, 'BT4', 8, 'Yoyo'),
(52, 'BT5', 4, 'Multilazy'),
(52, 'BT6', 6, 'Axel'),
(52, 'BT7', 8, 'Lewis'),
(52, 'BT8', 12, 'Yoyo Multilazy'),
(52, 'BT9', 10, 'YoFade'),
(52, 'IT1', 5, 'Stop (snapstall)'),
(52, 'IT2', 6, 'Lazy Susan'),
(52, 'IT3', 5, 'Jacobs Ladder'),
(52, 'IT4', 4, 'Backspin Cascade'),
(52, 'Total artistic', 13, NULL),
(52, 'Total free expression', 7, NULL),
(52, 'Total technical', 13, NULL),
(53, 'BT1', 4, 'Turtle (Backflip)'),
(53, 'BT2', 6, 'Lazy Susan'),
(53, 'BT3', 0, '540'),
(53, 'BT4', 8, 'Slotmachine'),
(53, 'BT5', 0, 'Backspins'),
(53, 'BT6', 0, 'Lewis'),
(53, 'BT7', 6, 'Lazy Susan'),
(53, 'BT8', 2, 'Half Axel'),
(53, 'BT9', 3, '2 Tips Landing'),
(53, 'IT1', 7, 'Yoyo Multilazy'),
(53, 'IT2', 6, 'Crazy Copter'),
(53, 'IT3', 7.2, 'Cynique'),
(53, 'IT4', 7, 'YoFade'),
(53, 'Total artistic', 8, NULL),
(53, 'Total free expression', 5, NULL),
(53, 'Total technical', 7, NULL),
(54, 'BT1', 3, 'Cascade'),
(54, 'BT2', 0, 'Jacobs Ladder'),
(54, 'BT3', 0, 'Slotmachine'),
(54, 'BT4', 10, 'Comete'),
(54, 'BT5', 3, 'Cascade'),
(54, 'BT6', 0, 'Comete'),
(54, 'BT7', 3, 'Rolling Susan'),
(54, 'BT8', 4, 'Slotmachine'),
(54, 'BT9', 6, '2 Tips Landing'),
(54, 'IT1', 4, 'Yoyo Multilazy'),
(54, 'IT2', 1, 'Crazy Copter'),
(54, 'IT3', 1, 'Cynique'),
(54, 'IT4', 1, 'YoFade'),
(54, 'Total artistic', 6, NULL),
(54, 'Total free expression', 6, NULL),
(54, 'Total technical', 7, NULL),
(55, 'BT1', 6, 'Lazy Susan'),
(55, 'BT2', 3, 'Axel'),
(55, 'BT3', 2, 'Half Axel'),
(55, 'BT4', 4, 'Multilazy'),
(55, 'BT5', 3, 'Lazy Susan'),
(55, 'BT6', 0, 'Axel'),
(55, 'BT7', 0, 'Jacobs Ladder'),
(55, 'BT8', 8, 'Multilazy'),
(55, 'BT9', 4, 'Lewis'),
(55, 'IT1', 3.2, 'Yoyo Multilazy'),
(55, 'IT2', 3, 'Crazy Copter'),
(55, 'IT3', 1, 'Cynique'),
(55, 'IT4', 2.4, 'YoFade'),
(55, 'Total artistic', 5, NULL),
(55, 'Total free expression', 4, NULL),
(55, 'Total technical', 5, NULL),
(56, 'BT1', 0, 'Cascade'),
(56, 'BT2', 0, 'Comete'),
(56, 'BT3', 4, 'Rolling Cascade'),
(56, 'BT4', 8, 'Multilazy'),
(56, 'BT5', 8, 'Lewis'),
(56, 'BT6', 3, 'Rolling Susan'),
(56, 'BT7', 10, 'Comete'),
(56, 'BT8', 4, 'Rolling Cascade'),
(56, 'BT9', 4, 'Lewis'),
(56, 'IT1', 6, 'Yoyo Multilazy'),
(56, 'IT2', 5, 'Crazy Copter'),
(56, 'IT3', 1, 'Cynique'),
(56, 'IT4', 1, 'YoFade'),
(56, 'Total artistic', 8, NULL),
(56, 'Total free expression', 4, NULL),
(56, 'Total technical', 9, NULL),
(57, 'BT1', 12, 'Yoyo Multilazy'),
(57, 'BT2', 8, 'Lewis'),
(57, 'BT3', 4, 'Slotmachine'),
(57, 'BT4', 4, '540'),
(57, 'BT5', 0, 'Side Slide'),
(57, 'BT6', 4, '540'),
(57, 'BT7', 0, 'Insane'),
(57, 'BT8', 4, 'Lewis'),
(57, 'BT9', 0, 'Slotmachine'),
(57, 'IT1', 8, 'Yoyo Multilazy'),
(57, 'IT2', 5, 'Crazy Copter'),
(57, 'IT3', 8, 'Cynique'),
(57, 'IT4', 6, 'YoFade'),
(57, 'Total artistic', 6, NULL),
(57, 'Total free expression', 8, NULL),
(57, 'Total technical', 7, NULL),
(58, 'BT1', 8, 'Side Slide'),
(58, 'BT2', 0, 'Slotmachine'),
(58, 'BT3', 0, 'Cascade'),
(58, 'BT4', 0, '540'),
(58, 'BT5', 4, 'Fade'),
(58, 'BT6', 0, 'Cascade'),
(58, 'BT7', 0, '540'),
(58, 'BT8', 0, '360°'),
(58, 'BT9', 0, 'Axel'),
(58, 'IT1', 6, 'Yoyo Multilazy'),
(58, 'IT2', 6, 'Crazy Copter'),
(58, 'IT3', 7, 'Cynique'),
(58, 'IT4', 4, 'YoFade'),
(58, 'Total artistic', 6, NULL),
(58, 'Total free expression', 5, NULL),
(58, 'Total technical', 8, NULL),
(59, 'BT1', 0, 'Jacobs Ladder'),
(59, 'BT2', 4, 'Lewis'),
(59, 'BT3', 0, 'Multilazy'),
(59, 'BT4', 0, 'Backspins'),
(59, 'BT5', 4, 'Side Slide'),
(59, 'BT6', 8, 'Backspins'),
(59, 'BT7', 0, 'Lewis'),
(59, 'BT8', 4, 'Multilazy'),
(59, 'BT9', 0, 'Jacobs Ladder'),
(59, 'IT1', 7, 'Yoyo Multilazy'),
(59, 'IT2', 8, 'Crazy Copter'),
(59, 'IT3', 8, 'Cynique'),
(59, 'IT4', 5.6, 'YoFade'),
(59, 'Total artistic', 6, NULL),
(59, 'Total free expression', 7, NULL),
(59, 'Total technical', 7, NULL),
(60, 'BT1', 3, 'Cascade'),
(60, 'BT2', 8, 'Backspins'),
(60, 'BT3', 0, 'Rolling Susan'),
(60, 'BT4', 6, 'Cascade'),
(60, 'BT5', 4, 'Jacobs Ladder'),
(60, 'BT6', 8, 'Backspins'),
(60, 'BT7', 10, 'Tazmachine'),
(60, 'BT8', 6, 'Rolling Susan'),
(60, 'BT9', 10, 'Backspin Cascade'),
(60, 'IT1', 1.6, 'Yoyo Multilazy'),
(60, 'IT2', 7, 'Crazy Copter'),
(60, 'IT3', 7, 'Cynique'),
(60, 'IT4', 1, 'YoFade'),
(60, 'Total artistic', 12, NULL),
(60, 'Total free expression', 8, NULL),
(60, 'Total technical', 10, NULL),
(61, 'BT1', 6, 'Lazy Susan'),
(61, 'BT2', 0, 'Slotmachine'),
(61, 'BT3', 8, 'Jacobs Ladder'),
(61, 'BT4', 6, 'Axel'),
(61, 'BT5', 9, 'Flic Flac (pancake)'),
(61, 'BT6', 6, 'Cascade'),
(61, 'BT7', 0, 'Jacobs Ladder'),
(61, 'BT8', 0, 'Lewis'),
(61, 'BT9', 9, 'Kombo'),
(61, 'IT1', 1, 'Yoyo Multilazy'),
(61, 'IT2', 1, 'Crazy Copter'),
(61, 'IT3', 1, 'Cynique'),
(61, 'IT4', 3, 'YoFade'),
(61, 'Total artistic', 14, NULL),
(61, 'Total free expression', 8, NULL),
(61, 'Total technical', 12, NULL),
(62, 'BT1', 2, 'Half Axel'),
(62, 'BT2', 4, 'Half Axel'),
(62, 'BT3', 3, 'Lazy Susan'),
(62, 'BT4', 4, 'Fade'),
(62, 'BT5', 8, 'Backspins'),
(62, 'BT6', 2, 'Turtle (Backflip)'),
(62, 'BT7', 4, 'Fade'),
(62, 'BT8', 6, 'Lazy Susan'),
(62, 'BT9', 0, '2 Tips Landing'),
(62, 'IT1', 7, 'Yoyo Multilazy'),
(62, 'IT2', 8, 'Crazy Copter'),
(62, 'IT3', 7, 'Cynique'),
(62, 'IT4', 4.8, 'YoFade'),
(62, 'Total artistic', 8, NULL),
(62, 'Total free expression', 9, NULL),
(62, 'Total technical', 10, NULL),
(63, 'BT1', 6, 'Lazy Susan'),
(63, 'BT2', 5, 'Double Axel'),
(63, 'BT3', 4, 'Multilazy'),
(63, 'BT4', 8, 'Yoyo'),
(63, 'BT5', 8, 'Multilazy'),
(63, 'BT6', 6, 'Axel'),
(63, 'BT7', 8, 'Lewis'),
(63, 'BT8', 12, 'Yoyo Multilazy'),
(63, 'BT9', 10, 'YoFade'),
(63, 'IT1', 3.2, 'Yoyo Multilazy'),
(63, 'IT2', 4.8, 'Crazy Copter'),
(63, 'IT3', 7, 'Cynique'),
(63, 'IT4', 7, 'YoFade'),
(63, 'Total artistic', 12, NULL),
(63, 'Total free expression', 6, NULL),
(63, 'Total technical', 13, NULL),
(64, 'BT1', 4, 'Turtle (Backflip)'),
(64, 'BT2', 3, 'Lazy Susan'),
(64, 'BT3', 4, '540'),
(64, 'BT4', 8, 'Slotmachine'),
(64, 'BT5', 8, 'Backspins'),
(64, 'BT6', 8, 'Lewis'),
(64, 'BT7', 6, 'Lazy Susan'),
(64, 'BT8', 4, 'Half Axel'),
(64, 'BT9', 6, '2 Tips Landing'),
(64, 'IT1', 6, 'Fade'),
(64, 'IT2', 2.4, 'Rolling Cascade'),
(64, 'IT3', 2, 'Kombo'),
(64, 'IT4', 1, 'Jacobs Ladder'),
(64, 'Total artistic', 12, NULL),
(64, 'Total free expression', 4, NULL),
(64, 'Total technical', 13, NULL),
(65, 'BT1', 3, 'Cascade'),
(65, 'BT2', 8, 'Jacobs Ladder'),
(65, 'BT3', 8, 'Slotmachine'),
(65, 'BT4', 0, 'Comete'),
(65, 'BT5', 3, 'Cascade'),
(65, 'BT6', 10, 'Comete'),
(65, 'BT7', 3, 'Rolling Susan'),
(65, 'BT8', 8, 'Slotmachine'),
(65, 'BT9', 6, '2 Tips Landing'),
(65, 'IT1', 2.4, 'Fade'),
(65, 'IT2', 1, 'Rolling Cascade'),
(65, 'IT3', 2, 'Kombo'),
(65, 'IT4', 1, 'Jacobs Ladder'),
(65, 'Total artistic', 8, NULL),
(65, 'Total free expression', 4, NULL),
(65, 'Total technical', 8, NULL),
(66, 'BT1', 6, 'Lazy Susan'),
(66, 'BT2', 6, 'Axel'),
(66, 'BT3', 0, 'Half Axel'),
(66, 'BT4', 8, 'Multilazy'),
(66, 'BT5', 0, 'Lazy Susan'),
(66, 'BT6', 6, 'Axel'),
(66, 'BT7', 0, 'Jacobs Ladder'),
(66, 'BT8', 0, 'Multilazy'),
(66, 'BT9', 0, 'Lewis'),
(66, 'IT1', 1, 'Fade'),
(66, 'IT2', 3, 'Rolling Cascade'),
(66, 'IT3', 1, 'Kombo'),
(66, 'IT4', 1, 'Jacobs Ladder'),
(66, 'Total artistic', 8, NULL),
(66, 'Total free expression', 5, NULL),
(66, 'Total technical', 11, NULL),
(67, 'BT1', 6, 'Cascade'),
(67, 'BT2', 0, 'Comete'),
(67, 'BT3', 4, 'Rolling Cascade'),
(67, 'BT4', 8, 'Multilazy'),
(67, 'BT5', 8, 'Lewis'),
(67, 'BT6', 3, 'Rolling Susan'),
(67, 'BT7', 0, 'Comete'),
(67, 'BT8', 4, 'Rolling Cascade'),
(67, 'BT9', 0, 'Lewis'),
(67, 'IT1', 3, 'Fade'),
(67, 'IT2', 6, 'Rolling Cascade'),
(67, 'IT3', 7, 'Kombo'),
(67, 'IT4', 7, 'Jacobs Ladder'),
(67, 'Total artistic', 4, NULL),
(67, 'Total free expression', 3, NULL),
(67, 'Total technical', 6, NULL),
(68, 'BT1', 12, 'Yoyo Multilazy'),
(68, 'BT2', 0, 'Lewis'),
(68, 'BT3', 4, 'Slotmachine'),
(68, 'BT4', 8, '540'),
(68, 'BT5', 0, 'Side Slide'),
(68, 'BT6', 0, '540'),
(68, 'BT7', 0, 'Insane'),
(68, 'BT8', 4, 'Lewis'),
(68, 'BT9', 0, 'Slotmachine'),
(68, 'IT1', 5.6, 'Fade'),
(68, 'IT2', 5, 'Rolling Cascade'),
(68, 'IT3', 6, 'Kombo'),
(68, 'IT4', 5.6, 'Jacobs Ladder'),
(68, 'Total artistic', 8, NULL),
(68, 'Total free expression', 4, NULL),
(68, 'Total technical', 10, NULL),
(69, 'BT1', 8, 'Side Slide'),
(69, 'BT2', 4, 'Slotmachine'),
(69, 'BT3', 3, 'Cascade'),
(69, 'BT4', 4, '540'),
(69, 'BT5', 2, 'Fade'),
(69, 'BT6', 0, 'Cascade'),
(69, 'BT7', 0, '540'),
(69, 'BT8', 6, '360°'),
(69, 'BT9', 0, 'Axel'),
(69, 'IT1', 6, 'Fade'),
(69, 'IT2', 6, 'Rolling Cascade'),
(69, 'IT3', 7, 'Kombo'),
(69, 'IT4', 4, 'Jacobs Ladder'),
(69, 'Total artistic', 5, NULL),
(69, 'Total free expression', 7, NULL),
(69, 'Total technical', 7, NULL),
(70, 'BT1', 4, 'Jacobs Ladder'),
(70, 'BT2', 4, 'Lewis'),
(70, 'BT3', 0, 'Multilazy'),
(70, 'BT4', 4, 'Backspins'),
(70, 'BT5', 4, 'Side Slide'),
(70, 'BT6', 0, 'Backspins'),
(70, 'BT7', 0, 'Lewis'),
(70, 'BT8', 0, 'Multilazy'),
(70, 'BT9', 0, 'Jacobs Ladder'),
(70, 'IT1', 8, 'Fade'),
(70, 'IT2', 6.4, 'Rolling Cascade'),
(70, 'IT3', 1, 'Kombo'),
(70, 'IT4', 4.8, 'Jacobs Ladder'),
(70, 'Total artistic', 5, NULL),
(70, 'Total free expression', 6, NULL),
(70, 'Total technical', 3, NULL),
(71, 'BT1', 0, 'Cascade'),
(71, 'BT2', 0, 'Backspins'),
(71, 'BT3', 6, 'Rolling Susan'),
(71, 'BT4', 6, 'Cascade'),
(71, 'BT5', 8, 'Jacobs Ladder'),
(71, 'BT6', 4, 'Backspins'),
(71, 'BT7', 0, 'Tazmachine'),
(71, 'BT8', 6, 'Rolling Susan'),
(71, 'BT9', 10, 'Backspin Cascade'),
(71, 'IT1', 8, 'Fade'),
(71, 'IT2', 6, 'Rolling Cascade'),
(71, 'IT3', 5.6, 'Kombo'),
(71, 'IT4', 7, 'Jacobs Ladder'),
(71, 'Total artistic', 15, NULL),
(71, 'Total free expression', 7, NULL),
(71, 'Total technical', 12, NULL),
(72, 'BT1', 3, 'Lazy Susan'),
(72, 'BT2', 4, 'Slotmachine'),
(72, 'BT3', 0, 'Jacobs Ladder'),
(72, 'BT4', 0, 'Axel'),
(72, 'BT5', 0, 'Flic Flac (pancake)'),
(72, 'BT6', 0, 'Cascade'),
(72, 'BT7', 4, 'Jacobs Ladder'),
(72, 'BT8', 4, 'Lewis'),
(72, 'BT9', 0, 'Kombo'),
(72, 'IT1', 4, 'Fade'),
(72, 'IT2', 1.6, 'Rolling Cascade'),
(72, 'IT3', 1, 'Kombo'),
(72, 'IT4', 1, 'Jacobs Ladder'),
(72, 'Total artistic', 5, NULL),
(72, 'Total free expression', 2, NULL),
(72, 'Total technical', 3, NULL),
(73, 'BT1', 2, 'Half Axel'),
(73, 'BT2', 4, 'Half Axel'),
(73, 'BT3', 6, 'Lazy Susan'),
(73, 'BT4', 4, 'Fade'),
(73, 'BT5', 8, 'Backspins'),
(73, 'BT6', 0, 'Turtle (Backflip)'),
(73, 'BT7', 4, 'Fade'),
(73, 'BT8', 6, 'Lazy Susan'),
(73, 'BT9', 6, '2 Tips Landing'),
(73, 'IT1', 7, 'Fade'),
(73, 'IT2', 5.6, 'Rolling Cascade'),
(73, 'IT3', 1, 'Kombo'),
(73, 'IT4', 5.6, 'Jacobs Ladder'),
(73, 'Total artistic', 15, NULL),
(73, 'Total free expression', 7, NULL),
(73, 'Total technical', 10, NULL),
(74, 'BT1', 6, 'Lazy Susan'),
(74, 'BT2', 5, 'Double Axel'),
(74, 'BT3', 4, 'Multilazy'),
(74, 'BT4', 12, 'Yoyo'),
(74, 'BT5', 4, 'Multilazy'),
(74, 'BT6', 6, 'Axel'),
(74, 'BT7', 0, 'Lewis'),
(74, 'BT8', 6, 'Yoyo Multilazy'),
(74, 'BT9', 0, 'YoFade'),
(74, 'IT1', 5, 'Fade'),
(74, 'IT2', 6, 'Rolling Cascade'),
(74, 'IT3', 1, 'Kombo'),
(74, 'IT4', 6, 'Jacobs Ladder'),
(74, 'Total artistic', 15, NULL),
(74, 'Total free expression', 4, NULL),
(74, 'Total technical', 17, NULL);

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT voor een tabel `ranking`
--
ALTER TABLE `ranking`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
