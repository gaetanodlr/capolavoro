-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 09, 2024 alle 13:43
-- Versione del server: 10.4.22-MariaDB
-- Versione PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `delregno2014`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `accessori`
--

CREATE TABLE `accessori` (
  `id_accessorio` int(3) NOT NULL,
  `descAccessorio` varchar(30) NOT NULL,
  `costoAccessorio` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `accessori`
--

INSERT INTO `accessori` (`id_accessorio`, `descAccessorio`, `costoAccessorio`) VALUES
(300, 'Tappetini in gomma', 50),
(301, 'Coprisedili in pelle', 200),
(302, 'Telecamera per parcheggio', 100),
(303, 'Cerchi in lega 17\"', 200),
(304, 'Navigatore GPS touchscreen', 150),
(305, 'Telecamera posteriore ', 80),
(306, 'Portabici da tetto', 130),
(307, 'Cavo adattatore Bluetooth', 25);

-- --------------------------------------------------------

--
-- Struttura della tabella `autoveicolo`
--

CREATE TABLE `autoveicolo` (
  `targa` varchar(10) NOT NULL,
  `marca` varchar(15) NOT NULL,
  `modello` varchar(15) NOT NULL,
  `annoDiCostruzione` int(4) NOT NULL,
  `cod_cliente` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `autoveicolo`
--

INSERT INTO `autoveicolo` (`targa`, `marca`, `modello`, `annoDiCostruzione`, `cod_cliente`) VALUES
('AB123CD', 'Fiat', '500', 2018, 500),
('CD012EF', 'Toyota', 'Corolla', 2017, 502),
('FG234HI', 'Renault', 'Clio', 2016, 503),
('JK567LM', 'BMW', 'X3', 2019, 506),
('LM789OP', 'Ford', 'Focus', 2020, 502),
('NO890PQ', 'Audi', 'A4', 2018, 505),
('RS123TU', 'Mercedes-Benz', 'GLA', 2017, 501),
('XY456ZA', 'Volkswagen', 'Golf', 2019, 501);

-- --------------------------------------------------------

--
-- Struttura della tabella `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(3) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `cognome` varchar(30) NOT NULL,
  `telefono` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nome`, `cognome`, `telefono`) VALUES
(500, 'Mario', 'Rossi', 331234567),
(501, 'Laura', 'Bianchi', 349876543),
(502, 'Gianuca', 'Verdi', 356543210),
(503, 'Simona', 'Paterni', 331234564),
(505, 'Gaetanto', 'DelRegno', 349876541),
(506, 'Sica', 'Alessandro', 331234568);

-- --------------------------------------------------------

--
-- Struttura della tabella `dipendenti`
--

CREATE TABLE `dipendenti` (
  `username` varchar(10) NOT NULL,
  `cognomeDip` varchar(20) NOT NULL,
  `nomeDip` varchar(20) NOT NULL,
  `pass` varchar(10) NOT NULL,
  `cod_officina` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `dipendenti`
--

INSERT INTO `dipendenti` (`username`, `cognomeDip`, `nomeDip`, `pass`, `cod_officina`) VALUES
('user12', 'Mani', 'Laura', 'pass1456', 100),
('user13', 'Merola', 'Anna', 'MrLnn', 101),
('user14', 'Sica', 'Simone', 'SSmn', 102);

-- --------------------------------------------------------

--
-- Struttura della tabella `intervento`
--

CREATE TABLE `intervento` (
  `id_intervento` int(3) NOT NULL,
  `descIntervento` varchar(50) NOT NULL,
  `prezzoIntervento` double NOT NULL,
  `cod_officina` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `intervento`
--

INSERT INTO `intervento` (`id_intervento`, `descIntervento`, `prezzoIntervento`, `cod_officina`) VALUES
(700, 'Cambio olio motore e filtro olio', 50, 100),
(701, 'Controllo e sostituzione delle pastiglie dei freni', 100, 100),
(702, 'Sostituzione della cinghia di distribuzione', 200, 101),
(703, 'Ricarica del sistema di climatizzazione', 80, 101),
(704, 'Allineamento delle ruote', 60, 102),
(705, 'Sostituzione della batteria', 120, 102),
(706, 'Controllo generale e manutenzione periodica', 150, 100);

-- --------------------------------------------------------

--
-- Struttura della tabella `intervento_autoveicolo`
--

CREATE TABLE `intervento_autoveicolo` (
  `cod_intervento` int(3) NOT NULL,
  `cod_autoveicolo` varchar(10) NOT NULL,
  `dataInizio` date NOT NULL,
  `dataFine` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `intervento_autoveicolo`
--

INSERT INTO `intervento_autoveicolo` (`cod_intervento`, `cod_autoveicolo`, `dataInizio`, `dataFine`) VALUES
(700, 'AB123CD', '2024-05-01', '2024-05-02'),
(700, 'JK567LM', '2024-05-08', '2024-05-09'),
(701, 'LM789OP', '2024-05-09', '2024-05-10'),
(701, 'RS123TU', '2024-05-02', '2024-05-03'),
(702, 'FG234HI', '2024-05-10', '2024-05-11'),
(702, 'XY456ZA', '2024-05-03', '2024-05-04'),
(703, 'CD012EF', '2024-05-04', '2024-05-05'),
(703, 'NO890PQ', '2024-05-11', '2024-05-12'),
(704, 'JK567LM', '2024-05-12', '2024-05-13'),
(704, 'LM789OP', '2024-05-05', '2024-05-06'),
(705, 'FG234HI', '2024-05-06', '2024-05-07'),
(706, 'NO890PQ', '2024-05-07', '2024-05-08');

-- --------------------------------------------------------

--
-- Struttura della tabella `officina`
--

CREATE TABLE `officina` (
  `id_officina` int(3) NOT NULL,
  `denominazione` varchar(30) NOT NULL,
  `citta` varchar(30) NOT NULL,
  `indirizzo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `officina`
--

INSERT INTO `officina` (`id_officina`, `denominazione`, `citta`, `indirizzo`) VALUES
(100, 'GasGoGo', 'Roma', 'Via Nazionale'),
(101, 'SoloMotori', 'Milano', 'Via Agnello'),
(102, 'RuoteRuote', 'Bari', 'Via Trento');

-- --------------------------------------------------------

--
-- Struttura della tabella `officina_accessori`
--

CREATE TABLE `officina_accessori` (
  `cod_officina` int(3) NOT NULL,
  `cod_accessorio` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `officina_accessori`
--

INSERT INTO `officina_accessori` (`cod_officina`, `cod_accessorio`) VALUES
(100, 301),
(100, 305),
(100, 306),
(100, 307),
(101, 300),
(101, 302),
(101, 303),
(101, 306),
(102, 300),
(102, 302),
(102, 303),
(102, 304),
(102, 305),
(102, 306);

-- --------------------------------------------------------

--
-- Struttura della tabella `officina_pezzi`
--

CREATE TABLE `officina_pezzi` (
  `cod_officina` int(3) NOT NULL,
  `cod_pezzo` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `officina_pezzi`
--

INSERT INTO `officina_pezzi` (`cod_officina`, `cod_pezzo`) VALUES
(100, 400),
(100, 401),
(100, 402),
(100, 403),
(100, 405),
(101, 400),
(101, 401),
(101, 402),
(101, 403),
(101, 404),
(102, 400),
(102, 401),
(102, 402),
(102, 403),
(102, 404);

-- --------------------------------------------------------

--
-- Struttura della tabella `officina_servizi`
--

CREATE TABLE `officina_servizi` (
  `cod_officina` int(3) NOT NULL,
  `cod_servizio` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `officina_servizi`
--

INSERT INTO `officina_servizi` (`cod_officina`, `cod_servizio`) VALUES
(100, 200),
(100, 201),
(100, 202),
(100, 205),
(100, 206),
(101, 201),
(101, 202),
(101, 203),
(101, 204),
(102, 201),
(102, 202),
(102, 204),
(102, 205),
(102, 206);

-- --------------------------------------------------------

--
-- Struttura della tabella `pezzidiricambio`
--

CREATE TABLE `pezzidiricambio` (
  `id_pezzo` int(3) NOT NULL,
  `descPezzo` varchar(30) NOT NULL,
  `costoPezzo` int(2) NOT NULL,
  `quantita` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `pezzidiricambio`
--

INSERT INTO `pezzidiricambio` (`id_pezzo`, `descPezzo`, `costoPezzo`, `quantita`) VALUES
(400, 'Lampadina LED', 10, 100),
(401, 'Viti di fissaggio', 1, 200),
(402, 'Batteria di ricambio', 80, 5),
(403, 'Pastiglie dei freni anteriori', 40, 50),
(404, 'Lampadine H7', 6, 200),
(405, 'Batteria auto 12V', 100, 30);

-- --------------------------------------------------------

--
-- Struttura della tabella `servizi`
--

CREATE TABLE `servizi` (
  `id_servizio` int(3) NOT NULL,
  `descrizioneServizio` varchar(50) NOT NULL,
  `costoOrario` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `servizi`
--

INSERT INTO `servizi` (`id_servizio`, `descrizioneServizio`, `costoOrario`) VALUES
(200, 'Cambio olio', 50),
(201, 'Riparazione motore', 100),
(202, 'Bilanciamento pneumatici', 30),
(203, 'Controllo e sostituzione delle pastiglie dei freni', 80),
(204, 'Bilanciatura e convergenza delle ruote', 120),
(205, 'Revisione impianto di climatizzazione', 100),
(206, 'Sostituzione cinghia di distribuzione', 150);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `accessori`
--
ALTER TABLE `accessori`
  ADD PRIMARY KEY (`id_accessorio`);

--
-- Indici per le tabelle `autoveicolo`
--
ALTER TABLE `autoveicolo`
  ADD PRIMARY KEY (`targa`),
  ADD KEY `cod_cliente` (`cod_cliente`);

--
-- Indici per le tabelle `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indici per le tabelle `dipendenti`
--
ALTER TABLE `dipendenti`
  ADD PRIMARY KEY (`username`),
  ADD KEY `cod_officina` (`cod_officina`);

--
-- Indici per le tabelle `intervento`
--
ALTER TABLE `intervento`
  ADD PRIMARY KEY (`id_intervento`),
  ADD KEY `cod_officina` (`cod_officina`);

--
-- Indici per le tabelle `intervento_autoveicolo`
--
ALTER TABLE `intervento_autoveicolo`
  ADD PRIMARY KEY (`cod_intervento`,`cod_autoveicolo`),
  ADD KEY `cod_autoveicolo` (`cod_autoveicolo`);

--
-- Indici per le tabelle `officina`
--
ALTER TABLE `officina`
  ADD PRIMARY KEY (`id_officina`);

--
-- Indici per le tabelle `officina_accessori`
--
ALTER TABLE `officina_accessori`
  ADD PRIMARY KEY (`cod_officina`,`cod_accessorio`),
  ADD KEY `cod_accessorio` (`cod_accessorio`);

--
-- Indici per le tabelle `officina_pezzi`
--
ALTER TABLE `officina_pezzi`
  ADD PRIMARY KEY (`cod_officina`,`cod_pezzo`),
  ADD KEY `cod_pezzo` (`cod_pezzo`);

--
-- Indici per le tabelle `officina_servizi`
--
ALTER TABLE `officina_servizi`
  ADD PRIMARY KEY (`cod_officina`,`cod_servizio`),
  ADD KEY `cod_servizio` (`cod_servizio`);

--
-- Indici per le tabelle `pezzidiricambio`
--
ALTER TABLE `pezzidiricambio`
  ADD PRIMARY KEY (`id_pezzo`);

--
-- Indici per le tabelle `servizi`
--
ALTER TABLE `servizi`
  ADD PRIMARY KEY (`id_servizio`);

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `autoveicolo`
--
ALTER TABLE `autoveicolo`
  ADD CONSTRAINT `autoveicolo_ibfk_1` FOREIGN KEY (`cod_cliente`) REFERENCES `cliente` (`id_cliente`);

--
-- Limiti per la tabella `dipendenti`
--
ALTER TABLE `dipendenti`
  ADD CONSTRAINT `dipendenti_ibfk_1` FOREIGN KEY (`cod_officina`) REFERENCES `officina` (`id_officina`);

--
-- Limiti per la tabella `intervento`
--
ALTER TABLE `intervento`
  ADD CONSTRAINT `intervento_ibfk_1` FOREIGN KEY (`cod_officina`) REFERENCES `officina` (`id_officina`);

--
-- Limiti per la tabella `intervento_autoveicolo`
--
ALTER TABLE `intervento_autoveicolo`
  ADD CONSTRAINT `intervento_autoveicolo_ibfk_1` FOREIGN KEY (`cod_intervento`) REFERENCES `intervento` (`id_intervento`),
  ADD CONSTRAINT `intervento_autoveicolo_ibfk_2` FOREIGN KEY (`cod_autoveicolo`) REFERENCES `autoveicolo` (`targa`);

--
-- Limiti per la tabella `officina_accessori`
--
ALTER TABLE `officina_accessori`
  ADD CONSTRAINT `officina_accessori_ibfk_1` FOREIGN KEY (`cod_officina`) REFERENCES `officina` (`id_officina`),
  ADD CONSTRAINT `officina_accessori_ibfk_2` FOREIGN KEY (`cod_accessorio`) REFERENCES `accessori` (`id_accessorio`);

--
-- Limiti per la tabella `officina_pezzi`
--
ALTER TABLE `officina_pezzi`
  ADD CONSTRAINT `officina_pezzi_ibfk_1` FOREIGN KEY (`cod_officina`) REFERENCES `officina` (`id_officina`),
  ADD CONSTRAINT `officina_pezzi_ibfk_2` FOREIGN KEY (`cod_pezzo`) REFERENCES `pezzidiricambio` (`id_pezzo`);

--
-- Limiti per la tabella `officina_servizi`
--
ALTER TABLE `officina_servizi`
  ADD CONSTRAINT `officina_servizi_ibfk_1` FOREIGN KEY (`cod_officina`) REFERENCES `officina` (`id_officina`),
  ADD CONSTRAINT `officina_servizi_ibfk_2` FOREIGN KEY (`cod_servizio`) REFERENCES `servizi` (`id_servizio`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
