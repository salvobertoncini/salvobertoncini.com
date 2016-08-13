-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Creato il: Ago 07, 2016 alle 12:42
-- Versione del server: 10.1.10-MariaDB
-- Versione PHP: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `salvobertoncini`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `title` text NOT NULL,
  `subtitle` text NOT NULL,
  `text` text NOT NULL,
  `preview` text NOT NULL,
  `image` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `posts`
--

INSERT INTO `posts` (`id`, `id_user`, `title`, `subtitle`, `text`, `preview`, `image`, `date`) VALUES
(1, 1, 'Napoli, sparatoria in vico Nocelle:\r\ndue morti e una persona ferita', 'Le vittime sono un 25enne e un 32enne, quest’ultimo deceduto per le ferite al Cardarelli. Il ferito non sembra in condizioni critiche', 'NAPOLI — Ancora spari e sangue in centro storico, a Napoli, dove da tempo si combatte la guerra tra bande che si contendono il controllo dello spaccio di droga. I killer sono entrati in azione in pieno giorno: due uomini - per i carabinieri hanno ruoli di rilievo nella geografia dei clan della zona - sono stati uccisi mentre un terzo è stato ferito nell’agguato in vico delle Nocelle, nei pressi di via Salvator Rosa, nella zona di Materdei. Ammazzato sul colpo Ciro Marfe’, di 25 anni, mentre Salvatore Esposito, di 32 anni, ferito gravemente, è spirato all’ospedale Cardarelli dove era stato trasportato in un disperato tentativo di soccorso. Ferito Pasquale Amodio, di 43 anni, ricoverato all’ospedale Pellegrini per un colpo alla schiena, ma non considerato in pericolo di vita', 'NAPOLI — Ancora spari e sangue in centro storico, a Napoli, dove da tempo si combatte la guerra tra bande che si contendono il controllo dello spaccio di droga. I killer sono entrati in azione in pieno giorno...', 'null', '2016-08-03');

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `avatar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `password`, `birthday`, `avatar`) VALUES
(1, 'Salvo', 'Bertoncini', 'salvobertoncini@gmail.com', 'blink.182', '1991-01-03', '/contents/stanco.jpg');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
