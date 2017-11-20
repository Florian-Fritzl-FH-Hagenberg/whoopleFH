-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 16. Nov 2017 um 07:04
-- Server-Version: 10.1.19-MariaDB
-- PHP-Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `whoople`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `wAuthentication`
--

CREATE TABLE `wAuthentication` (
  `wAuthentication_ID` bigint(20) NOT NULL,
  `wAuthentication_PW` varchar(45) DEFAULT NULL,
  `wAuthentication_TwoWay` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `wAuthentication`
--

INSERT INTO `wAuthentication` (`wAuthentication_ID`, `wAuthentication_PW`, `wAuthentication_TwoWay`) VALUES
(1, 'geheim', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `wFriend`
--

CREATE TABLE `wFriend` (
  `wUser_ID1` bigint(20) NOT NULL,
  `wUser_ID2` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `wFriendRequest`
--

CREATE TABLE `wFriendRequest` (
  `wUser_IDSender` bigint(20) NOT NULL,
  `wUser_IDReciever` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `wGroup`
--

CREATE TABLE `wGroup` (
  `wGroup_ID` bigint(20) NOT NULL,
  `wGroup_Name` varchar(100) DEFAULT NULL,
  `wGroup_Picture` blob,
  `wGroup_Description` varchar(255) DEFAULT NULL,
  `wGroup_DateFounded` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `wGroup_has_Users`
--

CREATE TABLE `wGroup_has_Users` (
  `wGroup_ID` bigint(20) NOT NULL,
  `wUser_ID` bigint(20) NOT NULL,
  `wGroup_has_Users_DateJoined` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `wUser`
--

CREATE TABLE `wUser` (
  `wUser_ID` bigint(20) NOT NULL,
  `wAuthentication_ID` bigint(20) NOT NULL,
  `wUser_Forename` varchar(45) DEFAULT NULL,
  `wUser_Lastname` varchar(45) DEFAULT NULL,
  `wUser_Username` varchar(45) DEFAULT NULL,
  `wUser_Birthday` date DEFAULT NULL,
  `wUser_Gender` char(1) DEFAULT NULL,
  `wUser_Phone` varchar(45) DEFAULT NULL,
  `wUser_Mail` varchar(45) DEFAULT NULL,
  `wUser_ProfilePicture` blob,
  `wUser_Description` varchar(255) DEFAULT NULL,
  `wUser_Language` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `wUser`
--

INSERT INTO `wUser` (`wUser_ID`, `wAuthentication_ID`, `wUser_Forename`, `wUser_Lastname`, `wUser_Username`, `wUser_Birthday`, `wUser_Gender`, `wUser_Phone`, `wUser_Mail`, `wUser_ProfilePicture`, `wUser_Description`, `wUser_Language`) VALUES
(2, 1, NULL, NULL, 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `wUserBlocked`
--

CREATE TABLE `wUserBlocked` (
  `wUser_Blocker` bigint(20) NOT NULL,
  `wUser_Blocked` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `wUserRole`
--

CREATE TABLE `wUserRole` (
  `wUserRole_ID` bigint(20) NOT NULL,
  `wUserRole_Name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `wUser_UserRole`
--

CREATE TABLE `wUser_UserRole` (
  `wUserRole_ID` bigint(20) NOT NULL,
  `wUser_ID` bigint(20) NOT NULL,
  `wUserRole_DateFrom` datetime DEFAULT NULL,
  `wUserRole_DateTo` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `wWhoople`
--

CREATE TABLE `wWhoople` (
  `wWhoople_ID` bigint(20) NOT NULL,
  `wUser_ID` bigint(20) NOT NULL,
  `wWhoople_Website` varchar(100) DEFAULT NULL,
  `wWhoople_AccountName` varchar(45) DEFAULT NULL,
  `wWhoople_Token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `wAuthentication`
--
ALTER TABLE `wAuthentication`
  ADD PRIMARY KEY (`wAuthentication_ID`);

--
-- Indizes für die Tabelle `wFriend`
--
ALTER TABLE `wFriend`
  ADD PRIMARY KEY (`wUser_ID1`,`wUser_ID2`),
  ADD KEY `wFriend_FKIndex1` (`wUser_ID2`),
  ADD KEY `wFriend_FKIndex2` (`wUser_ID1`);

--
-- Indizes für die Tabelle `wFriendRequest`
--
ALTER TABLE `wFriendRequest`
  ADD PRIMARY KEY (`wUser_IDSender`,`wUser_IDReciever`),
  ADD KEY `wFriendRequest_FKIndex1` (`wUser_IDSender`),
  ADD KEY `wFriendRequest_FKIndex2` (`wUser_IDReciever`);

--
-- Indizes für die Tabelle `wGroup`
--
ALTER TABLE `wGroup`
  ADD PRIMARY KEY (`wGroup_ID`);

--
-- Indizes für die Tabelle `wGroup_has_Users`
--
ALTER TABLE `wGroup_has_Users`
  ADD PRIMARY KEY (`wGroup_ID`,`wUser_ID`),
  ADD KEY `wGroup_has_Users_FKIndex1` (`wUser_ID`),
  ADD KEY `wGroup_has_Users_FKIndex2` (`wGroup_ID`);

--
-- Indizes für die Tabelle `wUser`
--
ALTER TABLE `wUser`
  ADD PRIMARY KEY (`wUser_ID`),
  ADD KEY `wUser_FKIndex1` (`wAuthentication_ID`);

--
-- Indizes für die Tabelle `wUserBlocked`
--
ALTER TABLE `wUserBlocked`
  ADD PRIMARY KEY (`wUser_Blocker`,`wUser_Blocked`),
  ADD KEY `wUserBlocked_FKIndex1` (`wUser_Blocker`),
  ADD KEY `wUserBlocked_FKIndex2` (`wUser_Blocked`);

--
-- Indizes für die Tabelle `wUserRole`
--
ALTER TABLE `wUserRole`
  ADD PRIMARY KEY (`wUserRole_ID`);

--
-- Indizes für die Tabelle `wUser_UserRole`
--
ALTER TABLE `wUser_UserRole`
  ADD PRIMARY KEY (`wUserRole_ID`,`wUser_ID`),
  ADD KEY `wUser_UserRolle_FKIndex1` (`wUser_ID`),
  ADD KEY `wUser_UserRolle_FKIndex2` (`wUserRole_ID`);

--
-- Indizes für die Tabelle `wWhoople`
--
ALTER TABLE `wWhoople`
  ADD PRIMARY KEY (`wWhoople_ID`),
  ADD KEY `wLinkedAccount_FKIndex1` (`wUser_ID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `wAuthentication`
--
ALTER TABLE `wAuthentication`
  MODIFY `wAuthentication_ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT für Tabelle `wGroup`
--
ALTER TABLE `wGroup`
  MODIFY `wGroup_ID` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `wUser`
--
ALTER TABLE `wUser`
  MODIFY `wUser_ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT für Tabelle `wUserRole`
--
ALTER TABLE `wUserRole`
  MODIFY `wUserRole_ID` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `wWhoople`
--
ALTER TABLE `wWhoople`
  MODIFY `wWhoople_ID` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `wFriend`
--
ALTER TABLE `wFriend`
  ADD CONSTRAINT `wfriend_ibfk_1` FOREIGN KEY (`wUser_ID1`) REFERENCES `wUser` (`wUser_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `wfriend_ibfk_2` FOREIGN KEY (`wUser_ID2`) REFERENCES `wUser` (`wUser_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `wFriendRequest`
--
ALTER TABLE `wFriendRequest`
  ADD CONSTRAINT `wfriendrequest_ibfk_1` FOREIGN KEY (`wUser_IDSender`) REFERENCES `wUser` (`wUser_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `wfriendrequest_ibfk_2` FOREIGN KEY (`wUser_IDReciever`) REFERENCES `wUser` (`wUser_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `wGroup_has_Users`
--
ALTER TABLE `wGroup_has_Users`
  ADD CONSTRAINT `wgroup_has_users_ibfk_1` FOREIGN KEY (`wUser_ID`) REFERENCES `wUser` (`wUser_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `wgroup_has_users_ibfk_2` FOREIGN KEY (`wGroup_ID`) REFERENCES `wGroup` (`wGroup_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `wUser`
--
ALTER TABLE `wUser`
  ADD CONSTRAINT `wuser_ibfk_1` FOREIGN KEY (`wAuthentication_ID`) REFERENCES `wAuthentication` (`wAuthentication_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `wUserBlocked`
--
ALTER TABLE `wUserBlocked`
  ADD CONSTRAINT `wuserblocked_ibfk_1` FOREIGN KEY (`wUser_Blocker`) REFERENCES `wUser` (`wUser_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `wuserblocked_ibfk_2` FOREIGN KEY (`wUser_Blocked`) REFERENCES `wUser` (`wUser_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `wUser_UserRole`
--
ALTER TABLE `wUser_UserRole`
  ADD CONSTRAINT `wuser_userrole_ibfk_1` FOREIGN KEY (`wUser_ID`) REFERENCES `wUser` (`wUser_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `wuser_userrole_ibfk_2` FOREIGN KEY (`wUserRole_ID`) REFERENCES `wUserRole` (`wUserRole_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `wWhoople`
--
ALTER TABLE `wWhoople`
  ADD CONSTRAINT `wwhoople_ibfk_1` FOREIGN KEY (`wUser_ID`) REFERENCES `wUser` (`wUser_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
