-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Апр 22 2019 г., 03:16
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `books`
--

-- --------------------------------------------------------

--
-- Структура таблицы `assessment`
--

CREATE TABLE IF NOT EXISTS `assessment` (
  `id_assessment` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_book` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `assessment` int(10) NOT NULL,
  PRIMARY KEY (`id_assessment`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Оценка' AUTO_INCREMENT=32 ;

--
-- Дамп данных таблицы `assessment`
--

INSERT INTO `assessment` (`id_assessment`, `id_user`, `id_book`, `date`, `assessment`) VALUES
(1, 1, 1, '2019-04-04 00:00:00', 5),
(2, 1, 2, '2019-04-04 00:00:00', 10),
(3, 1, 3, '2019-04-04 00:00:00', 10),
(4, 1, 4, '2019-04-04 00:00:00', 7),
(5, 1, 5, '2019-04-04 00:00:00', 3),
(6, 2, 6, '2019-04-04 00:00:00', 10),
(7, 2, 7, '2019-04-04 00:00:00', 10),
(8, 2, 8, '2019-04-04 00:00:00', 1),
(9, 3, 9, '2019-04-04 00:00:00', 4),
(10, 3, 10, '2019-04-04 00:00:00', 2),
(11, 3, 11, '2019-04-04 00:00:00', 5),
(12, 3, 12, '2019-04-04 00:00:00', 7),
(13, 3, 13, '2019-04-04 00:00:00', 5),
(14, 4, 14, '2019-04-04 00:00:00', 7),
(15, 4, 15, '2019-04-04 00:00:00', 2),
(16, 4, 1, '2019-04-04 00:00:00', 7),
(17, 4, 2, '2019-04-04 00:00:00', 9),
(18, 4, 3, '2019-04-04 00:00:00', 7),
(19, 4, 4, '2019-04-04 00:00:00', 10),
(20, 4, 5, '2019-04-04 00:00:00', 3),
(21, 1, 6, '2019-04-04 00:00:00', 5),
(22, 1, 7, '2019-04-04 00:00:00', 8),
(23, 1, 8, '2019-04-04 00:00:00', 6),
(24, 5, 9, '2019-04-04 00:00:00', 8),
(25, 5, 10, '2019-04-04 00:00:00', 1),
(26, 5, 11, '2019-04-04 00:00:00', 9),
(27, 5, 12, '2019-04-04 00:00:00', 10),
(28, 1, 13, '2019-04-04 00:00:00', 3),
(29, 1, 14, '2019-04-04 00:00:00', 3),
(30, 5, 15, '2019-04-04 00:00:00', 8),
(31, 1, 16, '2019-04-17 00:00:00', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `author`
--

CREATE TABLE IF NOT EXISTS `author` (
  `id_author` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `burthday` datetime NOT NULL,
  PRIMARY KEY (`id_author`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Автор' AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `author`
--

INSERT INTO `author` (`id_author`, `name`, `burthday`) VALUES
(1, 'Михаил Булгаков', '1891-05-15 02:00:00'),
(2, 'Федор Достоевский', '1821-11-11 00:00:00'),
(3, 'Лев Толстой', '1828-09-09 00:00:00'),
(4, 'Александр Пушкин', '1799-06-06 00:02:00'),
(5, 'Александр Дюма', '1802-07-24 00:00:00');

-- --------------------------------------------------------

--
-- Структура таблицы `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `id_book` int(11) NOT NULL AUTO_INCREMENT,
  `id_author` int(11) NOT NULL,
  `name` text NOT NULL,
  `number_of_pages` int(11) NOT NULL,
  PRIMARY KEY (`id_book`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Книга' AUTO_INCREMENT=16 ;

--
-- Дамп данных таблицы `book`
--

INSERT INTO `book` (`id_book`, `id_author`, `name`, `number_of_pages`) VALUES
(1, 1, 'Мастер и Маргарита', 100),
(2, 1, 'Собачье сердце', 100),
(3, 1, 'Белая гвардия', 100),
(4, 2, 'Преступление и наказание', 100),
(5, 2, 'Идиот', 100),
(6, 2, 'Бесы', 100),
(7, 3, 'Война и мир', 100),
(8, 3, 'Анна Каренина', 100),
(9, 3, 'Воскресение', 100),
(10, 4, 'Евгений Онегин', 100),
(11, 4, 'Повести Белкина', 100),
(12, 4, 'Пиковая дама', 100),
(13, 5, 'Граф Монте-Кристо', 100),
(14, 5, 'Двадцать лет спустя', 100),
(15, 5, 'Три мушкетера', 100);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `login` text NOT NULL,
  `password` text NOT NULL,
  `burthday` date NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Пользователи' AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `login`, `password`, `burthday`) VALUES
(1, 'Пользователь1', 'Пароль1', '2019-04-04'),
(2, 'Пользователь2', 'Пароль2', '2019-04-04'),
(3, 'Пользователь3', 'Пароль3', '2019-04-04'),
(4, 'Пользователь4', 'Пароль4', '2019-04-04'),
(5, 'Пользователь5', 'Пароль5', '2019-04-04');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
