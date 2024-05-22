-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 22, 2024 alle 14:59
-- Versione del server: 10.4.32-MariaDB
-- Versione PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_esame`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `email` varchar(32) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nome` varchar(32) NOT NULL,
  `cognome` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dump dei dati per la tabella `admin`
--

INSERT INTO `admin` (`ID`, `email`, `password`, `nome`, `cognome`) VALUES
(1, 'andreadisanti22@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'andrea', 'disanti');

-- --------------------------------------------------------

--
-- Struttura della tabella `bicicletta`
--

CREATE TABLE `bicicletta` (
  `ID` int(11) NOT NULL,
  `codice` varchar(16) NOT NULL,
  `distanza_percorsa` float DEFAULT NULL,
  `posizione_attuale` varchar(64) NOT NULL,
  `GPS` varchar(50) NOT NULL,
  `attiva` tinyint(1) NOT NULL,
  `RFID` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `cliente`
--

CREATE TABLE `cliente` (
  `ID` int(11) NOT NULL,
  `email` varchar(32) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nome` varchar(32) NOT NULL,
  `cognome` varchar(32) NOT NULL,
  `numero_tessera` int(11) NOT NULL,
  `numero_carta_credito` int(11) NOT NULL,
  `via` varchar(32) NOT NULL,
  `città` varchar(32) NOT NULL,
  `provincia` varchar(32) NOT NULL,
  `regione` varchar(32) NOT NULL,
  `CAP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dump dei dati per la tabella `cliente`
--

INSERT INTO `cliente` (`ID`, `email`, `password`, `nome`, `cognome`, `numero_tessera`, `numero_carta_credito`, `via`, `città`, `provincia`, `regione`, `CAP`) VALUES
(1, 'matteorossi@gmail.com', 'aa9a0040f7c00a74d0362b8c4a214b6e', 'matteo', 'rossi', 12345, 2147483647, 'via Prealpi 47', 'Mariano Comense', 'CO', 'Lombardia', 22066);

-- --------------------------------------------------------

--
-- Struttura della tabella `operazione`
--

CREATE TABLE `operazione` (
  `ID` int(11) NOT NULL,
  `distanza_percorsa` float DEFAULT NULL,
  `tipo` enum('Noleggio','Riconsegna') NOT NULL,
  `tariffa` float DEFAULT NULL,
  `data_ora` datetime NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_stazione` int(11) NOT NULL,
  `id_bicicletta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `stazione`
--

CREATE TABLE `stazione` (
  `ID` int(11) NOT NULL,
  `codice` varchar(16) NOT NULL,
  `numero_slot` int(11) NOT NULL,
  `via` varchar(64) NOT NULL,
  `città` varchar(32) NOT NULL,
  `provincia` varchar(32) NOT NULL,
  `regione` varchar(32) NOT NULL,
  `CAP` int(11) NOT NULL,
  `latitudine` float NOT NULL,
  `longitudine` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dump dei dati per la tabella `stazione`
--

INSERT INTO `stazione` (`ID`, `codice`, `numero_slot`, `via`, `città`, `provincia`, `regione`, `CAP`, `latitudine`, `longitudine`) VALUES
(1, '1234', 30, 'via Prealpi 47', 'Mariano Comense', 'CO', 'Lombardia', 22066, 45.6993, 9.1883);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`,`email`);

--
-- Indici per le tabelle `bicicletta`
--
ALTER TABLE `bicicletta`
  ADD PRIMARY KEY (`ID`,`codice`);

--
-- Indici per le tabelle `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`ID`,`email`),
  ADD UNIQUE KEY `numero_tessera` (`numero_tessera`);

--
-- Indici per le tabelle `operazione`
--
ALTER TABLE `operazione`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `id_cliente` (`id_cliente`,`id_stazione`,`id_bicicletta`),
  ADD KEY `id_stazione` (`id_stazione`),
  ADD KEY `id_bicicletta` (`id_bicicletta`);

--
-- Indici per le tabelle `stazione`
--
ALTER TABLE `stazione`
  ADD PRIMARY KEY (`ID`,`codice`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `bicicletta`
--
ALTER TABLE `bicicletta`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `cliente`
--
ALTER TABLE `cliente`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `operazione`
--
ALTER TABLE `operazione`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `stazione`
--
ALTER TABLE `stazione`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `operazione`
--
ALTER TABLE `operazione`
  ADD CONSTRAINT `operazione_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`ID`),
  ADD CONSTRAINT `operazione_ibfk_2` FOREIGN KEY (`id_stazione`) REFERENCES `stazione` (`ID`),
  ADD CONSTRAINT `operazione_ibfk_3` FOREIGN KEY (`id_bicicletta`) REFERENCES `bicicletta` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
