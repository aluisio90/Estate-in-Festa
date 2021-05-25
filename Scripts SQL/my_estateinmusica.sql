-- phpMyAdmin SQL Dump
-- version 4.1.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mag 25, 2021 alle 11:49
-- Versione del server: 8.0.21
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `my_estateinmusica`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `AUTORI`
--

CREATE TABLE IF NOT EXISTS `AUTORI` (
  `Codice_Autore` int NOT NULL,
  `Nome` varchar(25) NOT NULL,
  `Cognome` varchar(25) NOT NULL,
  PRIMARY KEY (`Codice_Autore`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci AUTO_INCREMENT=1 ;

--
-- Dump dei dati per la tabella `AUTORI`
--

INSERT INTO `AUTORI` (`Codice_Autore`, `Nome`, `Cognome`) VALUES
(1, 'Vasco Rossi', 'Mario'),
(2, 'Rubla', 'Carrisi'),
(3, 'Tina', 'Mancini'),
(4, 'Jhoana', 'Russo'),
(5, 'Giovanni', 'Paganini'),
(6, 'Carlo', 'Paganini'),
(7, 'Umberto', 'Terzani'),
(8, 'Attilio', 'Fontana'),
(90, 'Gabriel', 'De Ferrera');

-- --------------------------------------------------------

--
-- Struttura della tabella `BIGLIETTI`
--

CREATE TABLE IF NOT EXISTS `BIGLIETTI` (
  `Matricola` int NOT NULL AUTO_INCREMENT,
  `Descrizione` varchar(50) DEFAULT ' ',
  `ID` int NOT NULL,
  `Codice_Concerto` int NOT NULL,
  `Prezzo` float NOT NULL,
  PRIMARY KEY (`Matricola`),
  KEY `Codice_Concerto` (`Codice_Concerto`),
  KEY `ID` (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci AUTO_INCREMENT=96375 ;

--
-- Dump dei dati per la tabella `BIGLIETTI`
--

INSERT INTO `BIGLIETTI` (`Matricola`, `Descrizione`, `ID`, `Codice_Concerto`, `Prezzo`) VALUES
(1245, ' intero', 1, 12, 48),
(2598, '  intero', 3, 4, 40),
(8945, '  intero', 5, 3, 40),
(895, '  intero', 1, 18, 40),
(6564, '  intero', 7, 20, 40),
(896, '  intero', 9, 20, 40),
(9547, ' ridotto', 4, 15, 40),
(9512, '  ridotto', 4, 16, 40),
(9875, '  ridotto', 5, 17, 25),
(5241, '  ridotto', 6, 11, 88.9),
(96374, ' non paga', 7, 7, 0),
(12456, '  non paga', 8, 7, 0),
(5874, '  non paga', 2, 8, 0),
(2326, '  non paga', 14, 9, 0),
(452, '  non paga', 12, 17, 0),
(1, ' libera accesso', 12, 14, 35.25),
(365, '  libera accesso', 5, 17, 12.5),
(555, '  libera accesso', 4, 6, 12.5),
(222, '  libera accesso', 6, 6, 12.5),
(444, 'Intero', 8, 1, 70);

-- --------------------------------------------------------

--
-- Struttura della tabella `BRANI`
--

CREATE TABLE IF NOT EXISTS `BRANI` (
  `Codice_Brano` int NOT NULL,
  `Titolo` varchar(45) NOT NULL,
  `Descrizione` varchar(50) DEFAULT ' ',
  PRIMARY KEY (`Codice_Brano`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci AUTO_INCREMENT=1 ;

--
-- Dump dei dati per la tabella `BRANI`
--

INSERT INTO `BRANI` (`Codice_Brano`, `Titolo`, `Descrizione`) VALUES
(1, 'Viva La Vita', 'Musica pop'),
(2, 'Il Silenzio del cuore', 'Musica Sentimentale'),
(3, 'Forse ti Amo', 'Musica Storica'),
(4, 'La Marcia Imperiale', 'Musica Classica'),
(6, 'Nona Sinfonia', ' Musica Classica'),
(7, 'La Primavera', ' Musica Classica'),
(8, 'L''autunno', ' Musica Classica'),
(9, 'Titanic', 'Colonna Sonora'),
(20, 'Come il domani', 'Musica folk'),
(21, 'Meglio di Te', 'Musica Techno'),
(22, 'Gioca con Me', ' Musica Regge '),
(23, 'Datemi un Martello', 'Musica disco'),
(24, 'She is', ' Musica Tradizionale'),
(25, 'Concerto Largo Adagio', ' Componimento Sinfonico Musicale'),
(26, 'E quest ed il mare', 'Musica Popolare'),
(27, 'Come non dirtelo', ' Musica Pop'),
(28, 'Boleno', 'Musica Latina'),
(29, 'Laura non c''e', 'Musica Pop'),
(30, 'Jhonny va via', ' Musica Etnica'),
(31, 'Fiore di Rosa', ' Musica Tradizionale'),
(32, 'La Ballata di Primavera', ' Musica Tradizionale'),
(33, 'Hola', ' Musica Latina');

-- --------------------------------------------------------

--
-- Struttura della tabella `CONCERTI`
--

CREATE TABLE IF NOT EXISTS `CONCERTI` (
  `Descrizione` varchar(50) DEFAULT ' ',
  `Titolo` varchar(25) NOT NULL,
  `Codice_Concerto` int NOT NULL,
  PRIMARY KEY (`Codice_Concerto`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci AUTO_INCREMENT=1 ;

--
-- Dump dei dati per la tabella `CONCERTI`
--

INSERT INTO `CONCERTI` (`Descrizione`, `Titolo`, `Codice_Concerto`) VALUES
(' Opera Lirica in Tre Atti', 'Le Nozze di Figaro', 1),
('Suonata Rock per appasionati', 'Rock in Fiesta', 2),
('Opera Lirica tipica della produzione Verdiana', 'Aida', 3),
('Minuetto nottorno', 'Al Chiaro Di Luna', 4),
('Esecuzione della banda di Castel Verde', 'Parata annuale di Castel ', 5),
('Concerto internazionale dei Pink', 'Music CC', 6),
('Concerto ispirato al Cinem', 'Titanic e via col vento', 7),
('Serata all''insegna del Tango', 'Tanghero per una notte', 8),
('Suonata XIII', 'Opera II', 9),
('Concerto estivo sulla spiaggia', 'Mare e Musica', 10),
('Coro del conservatorio di Santa Cecilia', 'Corale', 11),
('Esecuzione di musica classica', 'Adagio ma Non Troppo', 12),
('Opera Lirica', 'Turandot', 13),
('Concerto Pop ', 'New Age', 14),
('Concerto Blues', 'Le Stelle di Notte', 15),
('Rievocazione di musica mediavale', 'Medioevo per una Notte', 16),
('Gram Concerto di fine estate', 'Estate che Va', 17),
('concerto da solista', 'Jeck jocker', 18),
('Concerto da solista', 'Willie e il cojote', 19),
(' Musica Latina', 'on dos tres', 20);

-- --------------------------------------------------------

--
-- Struttura della tabella `ESECUTORI`
--

CREATE TABLE IF NOT EXISTS `ESECUTORI` (
  `Stato_Di_Provenienza` varchar(25) NOT NULL,
  `Matricola` int NOT NULL,
  `Nome` varchar(25) NOT NULL,
  PRIMARY KEY (`Matricola`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci AUTO_INCREMENT=1 ;

--
-- Dump dei dati per la tabella `ESECUTORI`
--

INSERT INTO `ESECUTORI` (`Stato_Di_Provenienza`, `Matricola`, `Nome`) VALUES
('Italia', 2374, 'Orchestra Reale di Napoli'),
('Italia', 2353, 'Orchestra Reale di Sardeg'),
('Italia', 8739, 'Conservatori Santa Cecili'),
('Francia', 7685, 'Orchestra privata di Pari'),
('USA', 98347, 'Ledy Gaga'),
('Belgio', 8765, 'Madame De Boy'),
('Olanda', 654, 'Federich Ozlands'),
('USA', 8757, 'Jo Di Maggio'),
('Cina', 8756, 'Zoe Tzu'),
('Cina', 7645, 'Dorotea Mao');

-- --------------------------------------------------------

--
-- Struttura della tabella `ORCHESTRALI`
--

CREATE TABLE IF NOT EXISTS `ORCHESTRALI` (
  `Codice_Orchestrale` int NOT NULL,
  `Nome` varchar(50) DEFAULT NULL,
  `Data_Nascita` date DEFAULT NULL,
  `Matricola` int NOT NULL,
  `Strumento_Suonato` varchar(25) NOT NULL,
  PRIMARY KEY (`Codice_Orchestrale`),
  KEY `Matricola` (`Matricola`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci AUTO_INCREMENT=1 ;

--
-- Dump dei dati per la tabella `ORCHESTRALI`
--

INSERT INTO `ORCHESTRALI` (`Codice_Orchestrale`, `Nome`, `Data_Nascita`, `Matricola`, `Strumento_Suonato`) VALUES
(1, 'Anna', '2012-02-17', 100, 'Violino'),
(2, 'Raul', '2021-05-24', 80, 'Chitarra'),
(3, 'Tina', '2021-05-28', 120, 'Pianoforte'),
(4, 'Lucia', '2021-05-02', 40, 'Batteria'),
(5, 'Giovanni', '2021-05-04', 40, 'Tromba');

-- --------------------------------------------------------

--
-- Struttura della tabella `ORCHESTRE`
--

CREATE TABLE IF NOT EXISTS `ORCHESTRE` (
  `Nome_Direttore` varchar(50) NOT NULL,
  `Numero_Di_Elementi` tinyint DEFAULT '0',
  `Matricola` int NOT NULL,
  PRIMARY KEY (`Matricola`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci AUTO_INCREMENT=1 ;

--
-- Dump dei dati per la tabella `ORCHESTRE`
--

INSERT INTO `ORCHESTRE` (`Nome_Direttore`, `Numero_Di_Elementi`, `Matricola`) VALUES
('Anna Kerinova', 40, 2374),
('Luigi Pierbasso', 100, 2353),
('Karl Kolliman', 120, 8793),
('Luise Bretèn', 80, 7685);

-- --------------------------------------------------------

--
-- Struttura della tabella `PRENOTATE`
--

CREATE TABLE IF NOT EXISTS `PRENOTATE` (
  `Codice_Concerto` int NOT NULL,
  `Data_Prenotazione` date NOT NULL,
  `Codice_Sala` int NOT NULL,
  PRIMARY KEY (`Codice_Concerto`,`Codice_Sala`),
  KEY `Codice_Sala` (`Codice_Sala`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci AUTO_INCREMENT=1 ;

--
-- Dump dei dati per la tabella `PRENOTATE`
--

INSERT INTO `PRENOTATE` (`Codice_Concerto`, `Data_Prenotazione`, `Codice_Sala`) VALUES
(4, '2021-02-01', 3),
(9, '2021-01-04', 6),
(20, '2021-04-09', 3),
(19, '2021-07-06', 34),
(7, '2021-07-12', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `PROGRAMMATI`
--

CREATE TABLE IF NOT EXISTS `PROGRAMMATI` (
  `Ordine` int NOT NULL DEFAULT '1',
  `Codice_Concerto` int NOT NULL,
  `Codice_Brano` int NOT NULL,
  PRIMARY KEY (`Ordine`,`Codice_Concerto`,`Codice_Brano`),
  KEY `Codice_Brano` (`Codice_Brano`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci AUTO_INCREMENT=1 ;

--
-- Dump dei dati per la tabella `PROGRAMMATI`
--

INSERT INTO `PROGRAMMATI` (`Ordine`, `Codice_Concerto`, `Codice_Brano`) VALUES
(1, 4, 1),
(1, 8, 30),
(1, 10, 30),
(1, 12, 4),
(1, 20, 20),
(2, 4, 2),
(2, 8, 31),
(2, 10, 28),
(2, 12, 6),
(2, 20, 24),
(3, 4, 3),
(3, 12, 3),
(4, 4, 22),
(4, 20, 21),
(5, 4, 6),
(5, 12, 22),
(6, 4, 9);

-- --------------------------------------------------------

--
-- Struttura della tabella `SALE_CONCERTI`
--

CREATE TABLE IF NOT EXISTS `SALE_CONCERTI` (
  `Capienza_Massima` int NOT NULL,
  `Numero_Posti` int NOT NULL,
  `Codice_Sala` int NOT NULL,
  `Nome` varchar(45) NOT NULL,
  `Indirizzo` varchar(45) NOT NULL,
  PRIMARY KEY (`Codice_Sala`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci AUTO_INCREMENT=1 ;

--
-- Dump dei dati per la tabella `SALE_CONCERTI`
--

INSERT INTO `SALE_CONCERTI` (`Capienza_Massima`, `Numero_Posti`, `Codice_Sala`, `Nome`, `Indirizzo`) VALUES
(1000, 1000, 3, 'Capannone_2', 'Via XXX N.20'),
(750, 750, 34, 'Capannone_1', 'Via XXX N.20'),
(500, 500, 1, 'Capannone_3', 'Via XXX N.20'),
(900, 900, 6, 'Capannone_4', 'Via XXX N.20');

-- --------------------------------------------------------

--
-- Struttura della tabella `SCRIVONO`
--

CREATE TABLE IF NOT EXISTS `SCRIVONO` (
  `Codice_Autore` int NOT NULL,
  `Codice_Brano` int NOT NULL,
  PRIMARY KEY (`Codice_Brano`,`Codice_Autore`),
  KEY `Codice_Autore` (`Codice_Autore`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci AUTO_INCREMENT=1 ;

--
-- Dump dei dati per la tabella `SCRIVONO`
--

INSERT INTO `SCRIVONO` (`Codice_Autore`, `Codice_Brano`) VALUES
(1, 1),
(2, 1),
(1, 2),
(4, 3),
(4, 4),
(20, 4),
(20, 5),
(8, 7),
(9, 9),
(5, 20),
(6, 24),
(90, 25),
(2, 29),
(4, 32),
(90, 33);

-- --------------------------------------------------------

--
-- Struttura della tabella `SOLISTI`
--

CREATE TABLE IF NOT EXISTS `SOLISTI` (
  `Strumento_Suonato` varchar(45) DEFAULT NULL,
  `Matricola` int NOT NULL,
  PRIMARY KEY (`Matricola`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci AUTO_INCREMENT=1 ;

--
-- Dump dei dati per la tabella `SOLISTI`
--

INSERT INTO `SOLISTI` (`Strumento_Suonato`, `Matricola`) VALUES
('Chitarra ', 98347),
('Arpa', 8765),
('Violino', 654),
('Chitarra', 8756),
('Pianoforte', 8757),
('Batteria', 7645);

-- --------------------------------------------------------

--
-- Struttura della tabella `SPETTATORI`
--

CREATE TABLE IF NOT EXISTS `SPETTATORI` (
  `Nome` varchar(45) NOT NULL,
  `Cognome` varchar(45) NOT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Telefono` varchar(15) DEFAULT NULL,
  `ID` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Email` (`Email`),
  UNIQUE KEY `Telefono` (`Telefono`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci AUTO_INCREMENT=15 ;

--
-- Dump dei dati per la tabella `SPETTATORI`
--

INSERT INTO `SPETTATORI` (`Nome`, `Cognome`, `Email`, `Telefono`, `ID`) VALUES
('Anna', 'Rossi', 'anna.rossi@mymail.it', '337 885 1236', 1),
('Paolo', 'Neri', 'neripaolo@ppt.net', '788 776 1124', 2),
('Paolina', 'De Gasperi', 'gasperino@hillman.com', '887 548 6206', 5),
('Franco', 'De Lora', 'franco@pippo.it', '749 560 0654', 6),
('Fiorella', 'Neri', 'nerifiore@autolux.com', '284 764 9097', 7),
('Lucia', 'Grossi', 'lucyG@autolux.com', '293 860 8777', 8),
('Tina', 'Minoche', 'tina.minoche@kali.net', '945 709 8732', 9),
('Lucrezia ', 'Da Gama', 'dagamaLuces@goolex.eno', '952 867 9954', 10),
('Felix', 'Romano', 'romanox@xoop.it', '203 769 9872', 11),
('Monica', 'De Chierico', 'chierix@pop.net', '009 763 4397', 12),
('Kamalia', 'Lutex', 'lut.kamal@hots.net', '937 839 4327', 13),
('Noemi', 'Sordini', 'jock@kok.net', '943 777 8430', 14);

-- --------------------------------------------------------

--
-- Struttura della tabella `SUONANO`
--

CREATE TABLE IF NOT EXISTS `SUONANO` (
  `Matricola` int NOT NULL,
  `Codice_Brano` int NOT NULL,
  PRIMARY KEY (`Matricola`,`Codice_Brano`),
  KEY `Codice_Brano` (`Codice_Brano`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci AUTO_INCREMENT=1 ;

--
-- Dump dei dati per la tabella `SUONANO`
--

INSERT INTO `SUONANO` (`Matricola`, `Codice_Brano`) VALUES
(654, 0),
(2353, 5),
(2374, 1),
(7645, 2),
(8739, 6),
(8756, 0),
(8757, 1),
(8757, 4),
(98347, 7),
(98347, 20);

-- --------------------------------------------------------

--
-- Struttura della tabella `TELEFONI`
--

CREATE TABLE IF NOT EXISTS `TELEFONI` (
  `Numero` varchar(15) NOT NULL,
  `Tipologia` varchar(10) DEFAULT ' ',
  `Codice_Sala` int NOT NULL,
  PRIMARY KEY (`Numero`),
  KEY `Codice_Sala` (`Codice_Sala`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci AUTO_INCREMENT=1 ;

--
-- Dump dei dati per la tabella `TELEFONI`
--

INSERT INTO `TELEFONI` (`Numero`, `Tipologia`, `Codice_Sala`) VALUES
('337 888 9541', 'Segreteria', 34),
('987 547 5226', 'Reception', 6),
('179 456 125', 'Interno Sa', 34),
('778 859 6653', 'Segreteria', 1),
('126 98 5691', 'Principale', 1),
('286 236 4527', 'Principale', 34),
('777 888 6594', 'Segreteria', 34),
('445 9886 124', 'Emergenza ', 3),
('335 9998 4571', ' Reception', 1),
('746 985 1257', ' Numero Un', 6);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
