-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Gegenereerd op: 25 mei 2016 om 02:19
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
-- Tabelstructuur voor tabel `artistic`
--

CREATE TABLE `artistic` (
  `ArtisticID` int(11) NOT NULL,
  `ParticipantID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `artisticscore`
--

CREATE TABLE `artisticscore` (
  `ArtisticScoreID` int(11) NOT NULL,
  `ArtisticID` int(11) NOT NULL,
  `PersonID` int(11) NOT NULL,
  `Score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `attempt`
--

CREATE TABLE `attempt` (
  `AttemptID` int(11) NOT NULL,
  `Attempt` int(11) NOT NULL,
  `Percentage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `balletlisttype`
--

CREATE TABLE `balletlisttype` (
  `BalletListTypeID` int(11) NOT NULL,
  `BalletListType` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `balletlisttype`
--

INSERT INTO `balletlisttype` (`BalletListTypeID`, `BalletListType`) VALUES
(1, 'A'),
(2, 'B');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `ballettrick`
--

CREATE TABLE `ballettrick` (
  `BalletTrickID` int(11) NOT NULL,
  `TrickID` int(11) NOT NULL,
  `ParticipantID` int(11) NOT NULL,
  `Position` int(11) NOT NULL,
  `BalletListTypeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `ballettrickscore`
--

CREATE TABLE `ballettrickscore` (
  `BalletTrickScoreID` int(11) NOT NULL,
  `BalletTrickID` int(11) NOT NULL,
  `ScoreTypeID` int(11) NOT NULL,
  `PersonID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `competition`
--

CREATE TABLE `competition` (
  `CompetitionID` int(11) NOT NULL,
  `LocationID` int(11) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `freeexpression`
--

CREATE TABLE `freeexpression` (
  `FreeExpressionID` int(11) NOT NULL,
  `ParticipantID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `freeexpressionscore`
--

CREATE TABLE `freeexpressionscore` (
  `FreeExpressionScoreID` int(11) NOT NULL,
  `FreeExpressionID` int(11) NOT NULL,
  `PersonID` int(11) NOT NULL,
  `Score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `imposedtrick`
--

CREATE TABLE `imposedtrick` (
  `ImposedTrickID` int(11) NOT NULL,
  `ParticipantID` int(11) NOT NULL,
  `TrickID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `imposedtrickscore`
--

CREATE TABLE `imposedtrickscore` (
  `ImposedTrickScoreID` int(11) NOT NULL,
  `ImposedTrickID` int(11) NOT NULL,
  `Score` int(11) NOT NULL,
  `PersonID` int(11) NOT NULL,
  `AttemptID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `location`
--

CREATE TABLE `location` (
  `LocationID` int(11) NOT NULL,
  `Location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `login`
--

CREATE TABLE `login` (
  `LoginID` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `PermissionID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `login`
--

INSERT INTO `login` (`LoginID`, `Username`, `Password`, `PermissionID`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `participant`
--

CREATE TABLE `participant` (
  `ParticipantID` int(11) NOT NULL,
  `CompetitionID` int(11) NOT NULL,
  `Position` int(11) NOT NULL,
  `BalletListTypeID` int(11) NOT NULL,
  `PersonID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `permission`
--

CREATE TABLE `permission` (
  `PermissionID` int(11) NOT NULL,
  `Permission` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `permission`
--

INSERT INTO `permission` (`PermissionID`, `Permission`) VALUES
(1, 'Admin'),
(2, 'Judge'),
(3, 'Field director'),
(4, 'Pilot');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `person`
--

CREATE TABLE `person` (
  `PersonID` int(11) NOT NULL,
  `FrontName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `EmailAddress` varchar(255) DEFAULT NULL,
  `LoginID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `scoretype`
--

CREATE TABLE `scoretype` (
  `ScoreTypeID` int(11) NOT NULL,
  `ScoreType` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `scoretype`
--

INSERT INTO `scoretype` (`ScoreTypeID`, `ScoreType`) VALUES
(1, 'Bad'),
(2, 'Average'),
(3, 'Good'),
(4, 'Excellent');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `technical`
--

CREATE TABLE `technical` (
  `TechnicalID` int(11) NOT NULL,
  `ParticipantID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `technicalscore`
--

CREATE TABLE `technicalscore` (
  `TechnicalScoreID` int(11) NOT NULL,
  `TechnicalID` int(11) NOT NULL,
  `PersonID` int(11) NOT NULL,
  `Score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `trick`
--

CREATE TABLE `trick` (
  `TrickID` int(11) NOT NULL,
  `Trick` varchar(255) NOT NULL,
  `TrickGroup` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `trick`
--

INSERT INTO `trick` (`TrickID`, `Trick`, `TrickGroup`) VALUES
(1, 'Fade', 1),
(2, 'Half Axel', 1),
(3, 'Insane', 1),
(4, 'Turtle (Backflip)', 1),
(5, '2 Tips Landing', 2),
(6, '360°', 2),
(7, 'Axel', 2),
(8, 'Cascade', 2),
(9, 'Coin Toss', 2),
(10, 'Flapjack', 2),
(11, 'Flic Flac (pancake)', 2),
(12, 'Kombo', 2),
(13, 'Lazy Susan', 2),
(14, 'Refueling', 2),
(15, 'Rolling Susan', 2),
(16, 'Stop (snapstall)', 2),
(17, '540', 3),
(18, 'Backspins', 3),
(19, 'Insane left-right', 3),
(20, 'Jacobs Ladder', 3),
(21, 'K2000', 3),
(22, 'Lewis', 3),
(23, 'Multilazy', 3),
(24, 'Pinwheel (Helicopter)', 3),
(25, 'Reverse Rolling', 3),
(26, 'Reversed Coin Toss', 3),
(27, 'Reversed Flic-Flac', 3),
(28, 'Rolling Cascade', 3),
(29, 'Side Slide', 3),
(30, 'Slotmachine', 3),
(31, 'Spike', 3),
(32, 'Yoyo', 3),
(33, '540 Mutex', 4),
(34, 'Backspin Cascade', 4),
(35, 'Comete', 4),
(36, 'Double Axel', 4),
(37, 'Duplex', 4),
(38, 'Multislot', 4),
(39, 'Tazmachine', 4),
(40, 'Torpille', 4),
(41, 'Wap Doo Wap', 4),
(42, 'YoFade', 4),
(43, 'Yoyo Take-off', 4),
(44, 'Cascade Comete', 5),
(45, 'Crazy Copter', 5),
(46, 'Cynique', 5),
(47, 'La Dole', 5),
(48, 'Multi Yoyo', 5),
(49, 'YoFade Backspins', 5),
(50, 'Yoyo Multilazy', 5);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `trickgroup`
--

CREATE TABLE `trickgroup` (
  `TrickGroup` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `trickgroup`
--

INSERT INTO `trickgroup` (`TrickGroup`) VALUES
(1),
(2),
(3),
(4),
(5);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `trickgroupscore`
--

CREATE TABLE `trickgroupscore` (
  `TrickGroupScoreID` int(11) NOT NULL,
  `TrickGroup` int(11) NOT NULL,
  `ScoreTypeID` int(11) NOT NULL,
  `Score` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `trickgroupscore`
--

INSERT INTO `trickgroupscore` (`TrickGroupScoreID`, `TrickGroup`, `ScoreTypeID`, `Score`) VALUES
(1, 1, 1, '0'),
(2, 1, 2, '2'),
(3, 1, 3, '4'),
(4, 1, 4, '6'),
(5, 2, 1, '0'),
(6, 2, 2, '3'),
(7, 2, 3, '6'),
(8, 2, 4, '9'),
(9, 3, 1, '0'),
(10, 3, 2, '4'),
(11, 3, 3, '8'),
(12, 3, 4, '12'),
(13, 4, 1, '0'),
(14, 4, 2, '5'),
(15, 4, 3, '10'),
(16, 4, 4, '15'),
(17, 5, 1, '0'),
(18, 5, 2, '6'),
(19, 5, 3, '12'),
(20, 5, 4, '18');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `artistic`
--
ALTER TABLE `artistic`
  ADD PRIMARY KEY (`ArtisticID`);

--
-- Indexen voor tabel `artisticscore`
--
ALTER TABLE `artisticscore`
  ADD PRIMARY KEY (`ArtisticScoreID`);

--
-- Indexen voor tabel `attempt`
--
ALTER TABLE `attempt`
  ADD PRIMARY KEY (`AttemptID`);

--
-- Indexen voor tabel `balletlisttype`
--
ALTER TABLE `balletlisttype`
  ADD PRIMARY KEY (`BalletListTypeID`);

--
-- Indexen voor tabel `ballettrick`
--
ALTER TABLE `ballettrick`
  ADD PRIMARY KEY (`BalletTrickID`);

--
-- Indexen voor tabel `ballettrickscore`
--
ALTER TABLE `ballettrickscore`
  ADD PRIMARY KEY (`BalletTrickScoreID`);

--
-- Indexen voor tabel `competition`
--
ALTER TABLE `competition`
  ADD PRIMARY KEY (`CompetitionID`);

--
-- Indexen voor tabel `freeexpression`
--
ALTER TABLE `freeexpression`
  ADD PRIMARY KEY (`FreeExpressionID`);

--
-- Indexen voor tabel `freeexpressionscore`
--
ALTER TABLE `freeexpressionscore`
  ADD PRIMARY KEY (`FreeExpressionScoreID`);

--
-- Indexen voor tabel `imposedtrick`
--
ALTER TABLE `imposedtrick`
  ADD PRIMARY KEY (`ImposedTrickID`);

--
-- Indexen voor tabel `imposedtrickscore`
--
ALTER TABLE `imposedtrickscore`
  ADD PRIMARY KEY (`ImposedTrickScoreID`);

--
-- Indexen voor tabel `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`LocationID`);

--
-- Indexen voor tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`LoginID`);

--
-- Indexen voor tabel `participant`
--
ALTER TABLE `participant`
  ADD PRIMARY KEY (`ParticipantID`);

--
-- Indexen voor tabel `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`PermissionID`);

--
-- Indexen voor tabel `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`PersonID`);

--
-- Indexen voor tabel `scoretype`
--
ALTER TABLE `scoretype`
  ADD PRIMARY KEY (`ScoreTypeID`);

--
-- Indexen voor tabel `technical`
--
ALTER TABLE `technical`
  ADD PRIMARY KEY (`TechnicalID`);

--
-- Indexen voor tabel `technicalscore`
--
ALTER TABLE `technicalscore`
  ADD PRIMARY KEY (`TechnicalScoreID`);

--
-- Indexen voor tabel `trick`
--
ALTER TABLE `trick`
  ADD PRIMARY KEY (`TrickID`);

--
-- Indexen voor tabel `trickgroup`
--
ALTER TABLE `trickgroup`
  ADD PRIMARY KEY (`TrickGroup`);

--
-- Indexen voor tabel `trickgroupscore`
--
ALTER TABLE `trickgroupscore`
  ADD PRIMARY KEY (`TrickGroupScoreID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `artistic`
--
ALTER TABLE `artistic`
  MODIFY `ArtisticID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `artisticscore`
--
ALTER TABLE `artisticscore`
  MODIFY `ArtisticScoreID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `attempt`
--
ALTER TABLE `attempt`
  MODIFY `AttemptID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `balletlisttype`
--
ALTER TABLE `balletlisttype`
  MODIFY `BalletListTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT voor een tabel `ballettrick`
--
ALTER TABLE `ballettrick`
  MODIFY `BalletTrickID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `ballettrickscore`
--
ALTER TABLE `ballettrickscore`
  MODIFY `BalletTrickScoreID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `competition`
--
ALTER TABLE `competition`
  MODIFY `CompetitionID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `freeexpression`
--
ALTER TABLE `freeexpression`
  MODIFY `FreeExpressionID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `freeexpressionscore`
--
ALTER TABLE `freeexpressionscore`
  MODIFY `FreeExpressionScoreID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `imposedtrick`
--
ALTER TABLE `imposedtrick`
  MODIFY `ImposedTrickID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `imposedtrickscore`
--
ALTER TABLE `imposedtrickscore`
  MODIFY `ImposedTrickScoreID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `location`
--
ALTER TABLE `location`
  MODIFY `LocationID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `login`
--
ALTER TABLE `login`
  MODIFY `LoginID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT voor een tabel `participant`
--
ALTER TABLE `participant`
  MODIFY `ParticipantID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `permission`
--
ALTER TABLE `permission`
  MODIFY `PermissionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT voor een tabel `person`
--
ALTER TABLE `person`
  MODIFY `PersonID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `scoretype`
--
ALTER TABLE `scoretype`
  MODIFY `ScoreTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT voor een tabel `technical`
--
ALTER TABLE `technical`
  MODIFY `TechnicalID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `technicalscore`
--
ALTER TABLE `technicalscore`
  MODIFY `TechnicalScoreID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `trick`
--
ALTER TABLE `trick`
  MODIFY `TrickID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT voor een tabel `trickgroupscore`
--
ALTER TABLE `trickgroupscore`
  MODIFY `TrickGroupScoreID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
