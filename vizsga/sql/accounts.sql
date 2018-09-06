-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2018. Már 27. 12:09
-- Kiszolgáló verziója: 10.1.25-MariaDB
-- PHP verzió: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `accounts`
--
CREATE DATABASE IF NOT EXISTS `accounts` DEFAULT CHARACTER SET utf8 COLLATE utf8_hungarian_ci;
USE `accounts`;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `account_info`
--

CREATE TABLE `account_info` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_hungarian_ci NOT NULL,
  `level` tinyint(4) NOT NULL,
  `exp` int(11) NOT NULL,
  `health` float(12,2) NOT NULL,
  `max_health` float(12,2) NOT NULL,
  `coins` int(11) NOT NULL,
  `strength` int(11) NOT NULL,
  `agility` int(11) NOT NULL,
  `intelligence` int(11) NOT NULL,
  `vitality` int(11) NOT NULL,
  `attacks` text COLLATE utf8_hungarian_ci NOT NULL,
  `last_enemy_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `account_info`
--

INSERT INTO `account_info` (`id`, `name`, `password`, `level`, `exp`, `health`, `max_health`, `coins`, `strength`, `agility`, `intelligence`, `vitality`, `attacks`, `last_enemy_id`) VALUES
(1, 'asd', '85136c79cbf9fe36bb9d05d0639c70c265c18d37', 0, 0, 0.00, 0.00, 0, 0, 0, 0, 0, '', 0),
(2, 'asd1', '85136c79cbf9fe36bb9d05d0639c70c265c18d37', 0, 0, 0.00, 0.00, 0, 0, 0, 0, 0, '', 0),
(3, 'asdasd', '85136c79cbf9fe36bb9d05d0639c70c265c18d37', 0, 0, 0.00, 0.00, 0, 0, 0, 0, 0, '', 0),
(4, 'asdasd2', '85136c79cbf9fe36bb9d05d0639c70c265c18d37', 0, 0, 0.00, 0.00, 0, 0, 0, 0, 0, '', 0),
(5, 'asdasd3', '85136c79cbf9fe36bb9d05d0639c70c265c18d37', 1, 0, 100.00, 100.00, 0, 1, 1, 1, 1, '', 0),
(6, 'asdasd4', '85136c79cbf9fe36bb9d05d0639c70c265c18d37', 0, 0, 0.00, 0.00, 0, 0, 0, 0, 0, '', 0),
(7, '', '', 1, 0, 100.00, 100.00, 0, 1, 1, 1, 1, '', 0),
(8, 'asdasd5', '85136c79cbf9fe36bb9d05d0639c70c265c18d37', 1, 0, 100.00, 100.00, 0, 1, 1, 1, 1, '', 0),
(9, 'admin123', 'f865b53623b121fd34ee5426c792e5c33af8c227', 1, 0, 100.00, 100.00, 10, 1, 1, 1, 1, '', 0),
(10, 'Tester', '2891baceeef1652ee698294da0e71ba78a2a4064', 3, 342, 217.89, 435.00, 4000, 20, 15, 8, 12, '', 0),
(11, 'Kharos', '46a3202c6706df76720681236df600592239fa6c', 9, 3510, 285.16, 300.00, 519, 20, 10, 15, 15, '{\"1\":{\"combat_text\":\"Punches.\",\"type\":\"melee\",\"power\":2},\"2\":{\"combat_text\":\"Kicks.\",\"type\":\"melee\",\"power\":1}}', 2),
(12, 'Tester2', '46a3202c6706df76720681236df600592239fa6c', 1, 0, 100.00, 100.00, 10, 1, 1, 1, 1, '', 0),
(13, '', '', 0, 0, 0.00, 0.00, 0, 0, 0, 0, 0, '', 2),
(14, 'Zeros159', '7c4b82e2004b24571f75554877591c06a2b43232', 1, 30, 6.72, 100.00, 40, 1, 1, 1, 1, '', 2);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `monsters`
--

CREATE TABLE `monsters` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `level` tinyint(4) NOT NULL,
  `max_health` float(12,2) NOT NULL,
  `strength` int(11) NOT NULL,
  `agility` int(11) NOT NULL,
  `intelligence` int(11) NOT NULL,
  `vitality` int(11) NOT NULL,
  `coins_min_reward` int(11) NOT NULL,
  `coins_max_reward` int(11) NOT NULL,
  `exp_reward` int(11) NOT NULL,
  `attacks` text COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `monsters`
--

INSERT INTO `monsters` (`id`, `name`, `level`, `max_health`, `strength`, `agility`, `intelligence`, `vitality`, `coins_min_reward`, `coins_max_reward`, `exp_reward`, `attacks`) VALUES
(1, 'Thug', 1, 20.00, 1, 1, 1, 1, 5, 15, 10, '{\"1\":{\"combat_text\":\"Punches you.\",\"type\":\"melee\",\"power\":2},\"2\":{\"combat_text\":\"Kicks you.\",\"type\":\"melee\",\"power\":1}}'),
(2, 'Raider', 2, 35.00, 2, 2, 2, 2, 10, 20, 20, '{\"1\":{\"combat_text\":\"Slashes you.\",\"type\":\"melee\",\"power\":3},\"2\":{\"combat_text\":\"Kicks you.\",\"type\":\"melee\",\"power\":2}}');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `account_info`
--
ALTER TABLE `account_info`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `monsters`
--
ALTER TABLE `monsters`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `account_info`
--
ALTER TABLE `account_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT a táblához `monsters`
--
ALTER TABLE `monsters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
