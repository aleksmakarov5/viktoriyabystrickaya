-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Апр 20 2021 г., 20:35
-- Версия сервера: 8.0.23
-- Версия PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `anketa`
--

CREATE TABLE `anketa` (
  `id` int NOT NULL,
  `1` text NOT NULL,
  `2` text NOT NULL,
  `3` text NOT NULL,
  `4` text NOT NULL,
  `5` text NOT NULL,
  `6` text NOT NULL,
  `7` text NOT NULL,
  `8` text NOT NULL,
  `9` text NOT NULL,
  `10` text NOT NULL,
  `11` varchar(100) NOT NULL,
  `12` varchar(20) NOT NULL,
  `13` varchar(20) NOT NULL,
  `14` varchar(20) NOT NULL,
  `15` varchar(20) NOT NULL,
  `16` varchar(20) NOT NULL,
  `17` varchar(20) NOT NULL,
  `18` varchar(20) NOT NULL,
  `19` text NOT NULL,
  `20` text NOT NULL,
  `21` text NOT NULL,
  `22` varchar(20) NOT NULL,
  `23` varchar(100) NOT NULL,
  `24` text NOT NULL,
  `25` varchar(15) NOT NULL,
  `img_name` varchar(300) DEFAULT NULL,
  `date_create` date NOT NULL,
  `date_look` date DEFAULT NULL,
  `date_exec` date DEFAULT NULL,
  `comment` text CHARACTER SET utf8 COLLATE utf8_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `anketa`
--

INSERT INTO `anketa` (`id`, `1`, `2`, `3`, `4`, `5`, `6`, `7`, `8`, `9`, `10`, `11`, `12`, `13`, `14`, `15`, `16`, `17`, `18`, `19`, `20`, `21`, `22`, `23`, `24`, `25`, `img_name`, `date_create`, `date_look`, `date_exec`, `comment`) VALUES
(36, 'sdfg', 'sdfg', 'dsfgs', 'dog', 'sdfg', 'dfsg', 'dfsg', 'dsfg', 'dfsg', 'sgdf', 'dsfg', 'dxfs', 'dsfg', 'dsgf', 'dsfg', 'gfds', 'sdfg', 'sgfd', 'dsfg', 'gdsf', 'sdfg', 'sdfg', 'bababa', 'dfsg', 'dfsg', 'img/check/20210407111353043-Fd_aD7ayuTbspnsz_ENeokGsuTB6rrs.jpeg', '2021-04-07', '2021-04-07', '2021-04-07', NULL),
(37, 'asdf', 'sad', 'sad', 'aside', 'sad', 'sad', 'sad', 'sad', 'sad', 'staff', 'dosa', 'sda', 'asdf', 'dsu', 're', 'er', 'er', 'er', 'er', 'er', 'er', 'er', 'er', 'er', 'er', 'img/check/20210407111927151-ddf51af19bfecaf1fc368ca41fef93c9.jpg', '2021-04-07', '2021-04-07', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `login` varchar(40) NOT NULL,
  `pass` varchar(40) NOT NULL,
  `fname` varchar(40) NOT NULL,
  `lname` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `birth` varchar(15) NOT NULL,
  `photo` text NOT NULL,
  `group_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `fname`, `lname`, `birth`, `photo`, `group_id`) VALUES
(1, '24967530', 'social', 'Алексей', 'Макаров', '9.7.1993', 'https://vk.com/images/camera_200.png', 2),
(10, 'aleks', 'rohSem-niqnuf-7tiwdy', 'Алексей', 'Макаров', '09.07.1993', '', 5),
(11, 'Irina', 'kutbam-dyjjy1-xeDnuv', 'Ирина', 'Макарова', '27.02.1992', '', 2),
(15, 'kmh', 'dfsg', 'dsfg', 'sdfgs', 'dog', '', 0),
(16, 'aleksq', 'sfdsa', 'pdf', 'sad', 'ads', '', 0),
(17, 'user', 'user', 'ПОльзователь', 'пользователей', '08.09.2017', '', 2),
(18, 'admin', 'admin', 'Админ', 'админов', '09.09.1990', '', 5);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `anketa`
--
ALTER TABLE `anketa`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `anketa`
--
ALTER TABLE `anketa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
