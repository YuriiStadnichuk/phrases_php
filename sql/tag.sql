-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 06 2020 г., 21:55
-- Версия сервера: 10.3.13-MariaDB
-- Версия PHP: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `great_names_of_history`
--

-- --------------------------------------------------------

--
-- Структура таблицы `tag`
--

CREATE TABLE `tag` (
  `id` int(11) NOT NULL,
  `tag` varchar(50) NOT NULL,
  `post` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tag`
--

INSERT INTO `tag` (`id`, `tag`, `post`) VALUES
(2, 'France', 6),
(4, 'philosopher', 6),
(5, 'France', 8),
(6, 'writer', 8),
(9, 'USA', 19),
(10, 'writer', 19),
(14, 'USA', 44),
(15, 'writer', 44),
(16, 'journalist', 44),
(20, 'France', 17),
(21, 'philosopher', 17),
(22, 'writer', 17),
(28, 'Japan', 47),
(29, 'hentai', 47),
(30, 'Japan', 48),
(31, 'hentai', 48),
(32, 'Japan', 49),
(33, 'hentai', 49),
(37, 'Russia', 51),
(38, 'writer', 51),
(39, 'philosopher', 51),
(40, 'Russia', 52),
(41, 'writer', 52),
(42, 'philosopher', 52),
(48, 'teacher Canada', 85),
(49, 'France', 5),
(50, 'writer', 5),
(51, 'poet', 23),
(52, 'The Roman Empire', 23),
(53, 'poet', 26),
(54, 'France', 26),
(55, 'writer', 26),
(56, 'philosopher', 29),
(57, 'France', 29),
(58, 'writer', 29),
(59, 'philosopher', 30),
(60, 'Germany', 30),
(61, 'writer', 33),
(62, 'poet', 33),
(63, 'philosopher', 33),
(64, 'Germany', 33),
(65, 'philosopher', 34),
(66, 'Poland', 34),
(67, 'writer', 34),
(68, 'poet', 34),
(69, 'politician', 36),
(70, 'military', 36),
(71, 'Germany', 36),
(72, 'writer', 37),
(73, 'artist', 37),
(74, 'Germany', 37),
(75, 'Russia', 38),
(76, 'writer', 38),
(77, 'USA', 38),
(78, 'Poland', 39),
(79, 'writer', 39),
(80, 'politician', 40),
(81, 'military', 40),
(82, 'USA', 40),
(83, 'Russia', 43),
(84, 'writer', 43),
(85, 'doctor', 43),
(86, 'physicist', 84),
(87, 'USA', 84),
(88, 'Germany', 84),
(89, 'scientist', 84),
(90, 'writer', 87),
(91, 'Ireland', 87);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
