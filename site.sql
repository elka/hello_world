-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Июн 23 2012 г., 10:12
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `site`
--

-- --------------------------------------------------------

--
-- Структура таблицы `pos`
--

CREATE TABLE IF NOT EXISTS `pos` (
  `predmet` varchar(20) CHARACTER SET cp1251 NOT NULL,
  `title` varchar(20) CHARACTER SET cp1251 NOT NULL,
  `post` text CHARACTER SET cp1251 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pos`
--

INSERT INTO `pos` (`predmet`, `title`, `post`) VALUES
('Математика', 'hghfh', 'gfhgfh'),
('Биология', 'ghgfhg', 'hgfh'),
('Математика', 'апапап', 'папавпав'),
('Матан', 'пост1', 'блаблабла');

-- --------------------------------------------------------

--
-- Структура таблицы `pred`
--

CREATE TABLE IF NOT EXISTS `pred` (
  `idpre` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(20) CHARACTER SET cp1251 NOT NULL,
  `predmet` varchar(50) CHARACTER SET cp1251 NOT NULL,
  PRIMARY KEY (`idpre`),
  UNIQUE KEY `idpre` (`idpre`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Дамп данных таблицы `pred`
--

INSERT INTO `pred` (`idpre`, `login`, `predmet`) VALUES
(5, 'karishok', 'Математика'),
(7, 'karishok', 'Биология'),
(13, 'kotka', 'Алгебра'),
(12, 'kotka', 'Геометрия'),
(14, 'kotka', 'Физика'),
(15, 'valera', 'Матан');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `surname` varchar(20) CHARACTER SET cp1251 NOT NULL,
  `name` varchar(20) CHARACTER SET cp1251 NOT NULL,
  `otchestvo` varchar(20) CHARACTER SET cp1251 NOT NULL,
  `login` varchar(20) CHARACTER SET cp1251 NOT NULL,
  `pass_hash` varchar(100) CHARACTER SET cp1251 NOT NULL,
  `email` varchar(40) CHARACTER SET cp1251 NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `surname`, `name`, `otchestvo`, `login`, `pass_hash`, `email`) VALUES
(2, 'Бабальянц', 'Карина', 'Сергеевна', 'karishok', 'd0bf7ee46d50f1a059033d9cda0a442272097ee3', 'babaliants@bk.ru'),
(3, 'Горяченкова', 'Екатерина', 'Сергеввна', 'kotka', 'ed1e050e9409e45722831efc3bac68871777b436', 'buga_ga@bk.ru'),
(4, 'Горяченкова', 'Екатерина', 'Сергеевна', 'kate', '44844b8aa9d746a5d4c101a588644394115d190f', 'buga_ga@bk.ru'),
(5, 'Иванов', 'Валерий', 'Иванович', 'valera', 'fdccca670f21737caf08a322534cb596aaa60135', 'fbugf@mail.ru'),
(6, 'Вызова', 'Светлана', 'Светлановна', 'lora', '0fea403cad96670278f5aad803565320283519f5', 'sveta@bk.ru');

-- --------------------------------------------------------

--
-- Структура таблицы `zadanie`
--

CREATE TABLE IF NOT EXISTS `zadanie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(20) CHARACTER SET cp1251 NOT NULL,
  `predmet` varchar(50) CHARACTER SET cp1251 NOT NULL,
  `razdel` int(11) NOT NULL,
  `path` varchar(50) CHARACTER SET cp1251 NOT NULL,
  `name` varchar(20) CHARACTER SET cp1251 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=38 ;

--
-- Дамп данных таблицы `zadanie`
--

INSERT INTO `zadanie` (`id`, `login`, `predmet`, `razdel`, `path`, `name`) VALUES
(17, 'kotka', 'Алгебра', 2, 'files/5b94db50bb00.png', 'оропро'),
(23, 'karishok', 'Биология', 3, 'ya.ru', 'ссылка1'),
(29, 'karishok', 'Русский', 1, 'files/lab2.pdf', 'ропо'),
(30, 'karishok', 'Русский', 1, 'files/lab2.pdf', 'апапав'),
(31, 'karishok', 'Русский', 1, 'files/lab2.pdf', 'апавп'),
(32, 'karishok', 'Биология', 1, 'files/lab2.pdf', 'екнекн'),
(33, 'karishok', 'Математика', 3, 'mail.ru', 'fgfdgfd'),
(34, 'karishok', 'Русский', 1, 'files/презегнтация.pdf', 'папавп'),
(35, 'karishok', 'Русский', 1, 'files/презегнтация.pdf', 'прпар'),
(36, 'valera', 'Матан', 1, 'files/lab2.pdf', 'задание1'),
(37, 'valera', 'Матан', 3, 'ya.ru', 'яндекс');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
