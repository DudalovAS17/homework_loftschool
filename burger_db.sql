-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 16 2017 г., 00:09
-- Версия сервера: 5.6.37
-- Версия PHP: 7.0.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `burger_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mobile` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `client`
--

INSERT INTO `client` (`id`, `firstname`, `email`, `mobile`) VALUES
(1, 'Alex', 'dudalov.asgrot@mail.ru', '+7 (888) 888 88 88'),
(2, 'Nastya', 'dudnik@ma', '+7 (878) 787 87 87'),
(3, 'Maks', 'terou@mail', '+7 (888) 888 88 88'),
(4, 'Ma', '', ''),
(5, 'Jeje', 'trtrt@mail', '+7 (888) 888 88 88'),
(6, 'Damir', 'Deir96@mail', '+7 (888) 888 88 88'),
(7, 'lolowa', 'ololo@mail', '+7 (555) 555 55 55'),
(8, 'Ytreee', 'grot@mail.ru', '999999999');

-- --------------------------------------------------------

--
-- Структура таблицы `details`
--

CREATE TABLE `details` (
  `id` int(11) NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `street` varchar(100) DEFAULT NULL,
  `home` int(11) DEFAULT NULL,
  `part` varchar(100) DEFAULT NULL,
  `appt` varchar(100) DEFAULT NULL,
  `floor` int(11) DEFAULT NULL,
  `comment` text,
  `payment` varchar(100) DEFAULT NULL,
  `callback` varchar(100) DEFAULT NULL,
  `data` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `details`
--

INSERT INTO `details` (`id`, `client_id`, `street`, `home`, `part`, `appt`, `floor`, `comment`, `payment`, `callback`, `data`) VALUES
(1, 1, 'Pyshkina', 5, '6', '6', 66, 'Отсутствует', 'Нужна сдача', 'Не Перезванивать', '08-11-2017 21:50:37'),
(2, 2, 'Gogolya', 8, '8', '8', 8, 'Отсутствует', 'Оплата по карте', 'Не Перезванивать', '08-11-2017 21:50:37'),
(3, 3, 'uuuuu', 9, '99', '9', 9, 'Отсутствует', 'Нужна сдача', 'Не Перезванивать', '08-11-2017 21:50:37'),
(4, 4, 'Tverb', 8, '8', '8', 8, 'Hello, pas', 'Оплата по карте', 'Не Перезванивать', '08-11-2017 21:55:52'),
(5, 1, '99', 9, '9', '9', 9, 'OOOOO', 'Нужна сдача', 'Не Перезванивать', '15-12-2017 22:54:02'),
(6, 8, '99', 9, '9', '9', 9, 'OOOOO', 'Нужна сдача', 'Не Перезванивать', '15-12-2017 22:54:59');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `details`
--
ALTER TABLE `details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
