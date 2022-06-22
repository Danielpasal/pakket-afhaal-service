-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 22 apr 2022 om 16:26
-- Serverversie: 10.4.17-MariaDB
-- PHP-versie: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pakket-afhaal-service`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_aangemelde_pakketten`
--

CREATE TABLE `tbl_aangemelde_pakketten` (
  `id` int(11) NOT NULL,
  `ontvanger` varchar(255) NOT NULL,
  `omschrijving` varchar(255) NOT NULL,
  `straatnaam` varchar(255) NOT NULL,
  `huisnummer` varchar(30) NOT NULL,
  `postcode` varchar(30) NOT NULL,
  `woon_id` int(11) NOT NULL,
  `gewicht_id` int(11) NOT NULL,
  `keuze` varchar(20) NOT NULL,
  `totaal_prijs` float NOT NULL,
  `status_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `coureur_id` int(11) DEFAULT NULL,
  `betaal_status_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `tbl_aangemelde_pakketten`
--

INSERT INTO `tbl_aangemelde_pakketten` (`id`, `ontvanger`, `omschrijving`, `straatnaam`, `huisnummer`, `postcode`, `woon_id`, `gewicht_id`, `keuze`, `totaal_prijs`, `status_id`, `user_id`, `coureur_id`, `betaal_status_id`) VALUES
(39, 'Voluptate mollit mai', 'Rerum in dolore cons', 'Cum laborum ad omnis', 'Voluptatem earum tot', 'Excepteur in autem n', 2, 2, 'spoed', 22, 7, 67, NULL, NULL),
(40, 'Nam cillum dolorem e', 'Quia est consequat ', 'Nisi qui doloremque ', 'Ratione voluptas dui', 'Blanditiis mollitia ', 1, 1, 'spoed', 12, 3, 67, NULL, NULL),
(41, 'Aspernatur vel offic', 'Voluptas quis est in', 'Praesentium quo obca', 'Tempor cillum aliqui', 'Reprehenderit ad nos', 8, 2, 'beide', 26, 3, 67, NULL, NULL),
(42, 'Quasi excepteur magn', 'Perspiciatis conseq', 'Doloribus aut perfer', 'Dolore quisquam offi', 'Aut nihil maxime del', 2, 1, 'spoed', 11, 7, 67, NULL, NULL),
(43, 'Dolor qui irure reru', 'Est illo sed enim ev', 'Nulla aperiam id of', 'Cumque assumenda lab', 'Anim odit aut volupt', 2, 1, 'spoed', 11, 7, 67, NULL, NULL),
(44, 'Obcaecati numquam po', 'Rerum eligendi cupid', 'Non velit voluptate ', 'Eu beatae debitis fa', 'Corrupti unde tenet', 8, 2, 'spoed', 24, 3, 67, NULL, NULL),
(45, 'Dolore enim Nam debi', 'Quisquam voluptatum ', 'Vel officia labore a', 'Rem veniam porro li', 'Sed aliquid nulla si', 12, 1, 'beide', 13, 3, 67, 78, NULL),
(46, 'Ut repudiandae ea qu', 'Aute do id minus nul', 'Rerum exercitation f', 'Dolorem deserunt qui', 'Perspiciatis reicie', 2, 2, 'beide', 26, 7, 67, NULL, NULL),
(47, 'Duis dolor porro ips', 'Quaerat quia vel sus', 'Corporis deserunt ha', 'Sed quis consectetur', 'Sunt nobis in est f', 2, 2, 'beide', 26, 7, 67, NULL, 7),
(48, 'Voluptas quam dolore', 'Laborum Quis elit ', 'Ut tempora quasi vol', 'Sint voluptatum eum ', 'Cupiditate maiores m', 2, 2, 'geen', 20, 7, 67, NULL, NULL),
(49, 'Nemo nesciunt maior', 'Aspernatur quae dist', 'Dolores recusandae ', 'Sed numquam qui enim', 'Non assumenda non od', 12, 1, 'beide', 13, 3, 68, 78, NULL),
(50, 'Magnam cum provident', 'Provident ipsum in', 'Dignissimos soluta a', 'Qui mollit est aute', 'Qui quod eum et dolo', 10, 2, 'spoed', 24, 7, 68, NULL, NULL),
(51, 'Rem voluptatibus cum', 'Dignissimos libero l', 'Magnam in porro recu', 'Eveniet eum assumen', 'Aperiam esse aut ut', 2, 1, 'spoed', 12, 1, 68, NULL, NULL),
(52, 'c@gmail.com', 'c', 'c', 'c', 'c', 6, 2, 'beide', 26, 3, 70, NULL, NULL),
(53, 'Sit voluptate nisi t', 'Facilis aut ut volup', 'Nulla inventore quia', 'Qui aut itaque perfe', 'Aut incididunt quaer', 8, 1, 'spoed', 12, 7, 70, NULL, NULL),
(54, 'Migel', 'Osprong', 'Kolenstraat ', '4', '8439KD', 7, 2, 'spoed', 24, 7, 73, NULL, NULL),
(55, 'Kian', 'Fietsenbel', 'opostraat', '28', '8753HD', 4, 2, 'beide', 26, 1, 68, NULL, NULL),
(56, 'kian konings', 'Fietsenbel', 'Voermansdreef ', '23', '8439HD', 9, 2, 'beide', 26, 7, 68, NULL, NULL),
(57, 'Earum totam commodo ', 'Inventore rerum nobi', 'Incidunt sunt et eu', 'Explicabo Ad magni ', 'Laboris ipsa quis n', 12, 2, 'spoed', 24, 3, 68, 78, NULL),
(58, 'Dolorum deserunt adi', 'Laboris ea voluptas ', 'Eius dolorem consequ', 'Enim aliquip sint qu', 'Dolor incidunt dolo', 9, 1, 'spoed', 11, 1, 68, NULL, NULL),
(59, 'qh', 'h', 'h', 'h', 'h', 1, 1, 'geen', 10, 7, 68, NULL, NULL),
(60, 'Perferendis est fug', 'Itaque itaque et id', 'Rerum id omnis quaer', 'Id molestiae archit', 'Quis impedit ea ali', 10, 2, 'spoed', 24, 1, 68, NULL, NULL),
(61, 'Recusandae Eligendi', 'Ex corporis dolor pr', 'Dolore ea facilis qu', 'Aliqua Ea excepteur', 'Aliquam aperiam accu', 6, 2, 'spoed', 24, 1, 68, NULL, NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_gewichten_prijs`
--

CREATE TABLE `tbl_gewichten_prijs` (
  `id` int(11) NOT NULL,
  `gewicht` varchar(255) NOT NULL,
  `prijs` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `tbl_gewichten_prijs`
--

INSERT INTO `tbl_gewichten_prijs` (`id`, `gewicht`, `prijs`) VALUES
(1, '0-10', 10),
(2, '10-30', 20);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_rollen`
--

CREATE TABLE `tbl_rollen` (
  `id` int(11) NOT NULL,
  `roll` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `tbl_rollen`
--

INSERT INTO `tbl_rollen` (`id`, `roll`) VALUES
(1, 'klant'),
(2, 'admin'),
(3, 'coureur'),
(5, 'gebruiker');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_status`
--

CREATE TABLE `tbl_status` (
  `id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `tbl_status`
--

INSERT INTO `tbl_status` (`id`, `status`) VALUES
(1, 'aangemeld'),
(2, 'geclaimed'),
(3, 'afgeleverd'),
(7, 'afgerekend');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `wachtwoord` varchar(255) NOT NULL,
  `voornaam` varchar(255) NOT NULL,
  `tussenvoegsel` varchar(20) NOT NULL,
  `achternaam` varchar(20) NOT NULL,
  `postcode` varchar(15) NOT NULL,
  `straatnaam` varchar(255) NOT NULL,
  `huisnummer` varchar(255) NOT NULL,
  `roll_id` int(11) NOT NULL,
  `woon_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `email`, `wachtwoord`, `voornaam`, `tussenvoegsel`, `achternaam`, `postcode`, `straatnaam`, `huisnummer`, `roll_id`, `woon_id`) VALUES
(57, 'a@gmail.com', 'NnM0MjArbTl1NUJrK1orRi9CbUkvUT09OjqO07gjrafB1g5POCgt4YNJ', 'a', 'a@gmail.com', 'a', 'a', 'a', 'a', 2, 1),
(65, 'i@gmail.com', 'T2t3akdIRFFaOFFVQ0hZbWREeU1Ldz09Ojpv5VIoQigCuX5lQVd63oEh', 'i', 'i@gmail.com', 'i', 'i', 'i', 'i', 1, 2),
(66, 'o@gmail.com', 'YzZwRkZuRUhBNnNpM2RZaURiQ09wUT09OjrSiwZlbkpEuZg4GmGNKNyv', 'o', 'o@gmail.com', 'o', 'o', 'o', 'o', 1, 2),
(67, 'b@gmail.com', 'ZzVuQXFZS3JWazJ1WVdQb1Q4eXpRdz09OjrG4A9SqrbRF93/WReL7Jw0', 'Reprehenderit labori', 'b@gmail.com', 'In qui laboris qui l', 'Voluptatibus se', 'Sequi quia eum nisi ', 'Omnis et fugiat aliq', 1, 1),
(68, 't@gmail.com', 'VjU0UGx2Z3VMY1AyTTFFSlgwemw2dz09OjqgIheUntR/vbWy8q2El7D0', 'Excepturi voluptatem', 't@gmail.com', 'Rerum officia eiusmo', 'Provident dolor', 'Amet quaerat necess', 'Blanditiis consequat', 1, 12),
(70, 'd@gmail.com', 'WndsN1VqVERiMFc2T2lNb2NNMnZhdz09Ojp3+VY1nYRtkAsWD/tGwA8E', 'd', 'd@gmail.com', 'd', 'd', 'd', 'd', 1, 8),
(73, 'p@gmail.com', 'MkFob3l2QnNNdGNuRkd4WDd1WjMzQT09OjrEnigDo4nHhRNojnqsLTqE', 'p', 'p@gmail.com', 'p', 'p', 'p', 'p', 1, 4),
(78, 'g@gmail.com', 'UFE2RStOSkdoSFhLdGEzMjh2cjBMZz09OjrM3uNPSW3kgy4l0clbfg2Q', 'k', '', 'k', 'k', 'k', 'k', 3, 12);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_woonplaatsen`
--

CREATE TABLE `tbl_woonplaatsen` (
  `id` int(11) NOT NULL,
  `woonplaats` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `tbl_woonplaatsen`
--

INSERT INTO `tbl_woonplaatsen` (`id`, `woonplaats`) VALUES
(1, 'Groningen'),
(2, 'Friesland'),
(3, 'Drenthe'),
(4, 'Overijssel'),
(5, 'Flevoland'),
(6, 'Gelderland'),
(7, 'Utrecht'),
(8, 'Noord-Holland'),
(9, 'Zuid-Holland'),
(10, 'Zeeland'),
(11, 'Noord-Brabant'),
(12, 'Limburg');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `tbl_aangemelde_pakketten`
--
ALTER TABLE `tbl_aangemelde_pakketten`
  ADD PRIMARY KEY (`id`),
  ADD KEY `woon_id` (`woon_id`),
  ADD KEY `klant_id` (`user_id`),
  ADD KEY `betaal_status_id` (`betaal_status_id`),
  ADD KEY `status_id` (`status_id`),
  ADD KEY `gewicht_id` (`gewicht_id`),
  ADD KEY `coureur_id` (`coureur_id`);

--
-- Indexen voor tabel `tbl_gewichten_prijs`
--
ALTER TABLE `tbl_gewichten_prijs`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `tbl_rollen`
--
ALTER TABLE `tbl_rollen`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `tbl_status`
--
ALTER TABLE `tbl_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `woon_id` (`woon_id`),
  ADD KEY `roll_id` (`roll_id`);

--
-- Indexen voor tabel `tbl_woonplaatsen`
--
ALTER TABLE `tbl_woonplaatsen`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `tbl_aangemelde_pakketten`
--
ALTER TABLE `tbl_aangemelde_pakketten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT voor een tabel `tbl_gewichten_prijs`
--
ALTER TABLE `tbl_gewichten_prijs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `tbl_rollen`
--
ALTER TABLE `tbl_rollen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT voor een tabel `tbl_status`
--
ALTER TABLE `tbl_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT voor een tabel `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT voor een tabel `tbl_woonplaatsen`
--
ALTER TABLE `tbl_woonplaatsen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `tbl_aangemelde_pakketten`
--
ALTER TABLE `tbl_aangemelde_pakketten`
  ADD CONSTRAINT `betaal_status_id` FOREIGN KEY (`betaal_status_id`) REFERENCES `tbl_status` (`id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `coureur_id` FOREIGN KEY (`coureur_id`) REFERENCES `tbl_users` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `gewicht_id` FOREIGN KEY (`gewicht_id`) REFERENCES `tbl_gewichten_prijs` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `klant_id` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `status_id` FOREIGN KEY (`status_id`) REFERENCES `tbl_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_aangemelde_pakketten_ibfk_1` FOREIGN KEY (`betaal_status_id`) REFERENCES `tbl_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `woon_id` FOREIGN KEY (`woon_id`) REFERENCES `tbl_woonplaatsen` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD CONSTRAINT `tbl_users_ibfk_1` FOREIGN KEY (`woon_id`) REFERENCES `tbl_woonplaatsen` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_users_ibfk_2` FOREIGN KEY (`roll_id`) REFERENCES `tbl_rollen` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
