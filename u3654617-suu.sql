-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 19 2020 г., 00:30
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `u3654617-suu`
--

-- --------------------------------------------------------

--
-- Структура таблицы `uniq_url`
--

CREATE TABLE `uniq_url` (
  `id` int(6) NOT NULL,
  `token` char(64) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `uniq_url`
--

INSERT INTO `uniq_url` (`id`, `token`, `url`) VALUES
(59, '6C33DB', 'https://3agorod.pro/test'),
(64, 'E69166', 'https://ibryl.store'),
(65, '23BA04', 'https://3agorod.pro/'),
(66, '11CBA4', 'http://3agorod.pro/\"'),
(68, '01569E', 'http://3agorod.pro/'),
(70, '757160', 'http://3agorod.pro/asdasd'),
(71, 'C4DD93', 'https://www.google.com/search?q=google.oq=googleaqs=chrome.0.69i59j69i57j69i60l2j69i65l2j69i60l2.631j0j7sourceid=chromeie=UTF-8');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `uniq_url` int(16) DEFAULT NULL,
  `login` varchar(128) NOT NULL,
  `password` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `uniq_url`, `login`, `password`) VALUES
(3, NULL, 'admin', 'admin123'),
(28, NULL, 'vitalii', 'asdasd'),
(29, NULL, 'evgenii', 'asdasd'),
(30, NULL, 'Oleg', 'asdasd');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `uniq_url`
--
ALTER TABLE `uniq_url`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `uniq_url`
--
ALTER TABLE `uniq_url`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
