-- phpMyAdmin SQL Dump
-- version 3.5.8.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 20 2013 г., 13:03
-- Версия сервера: 5.5.31-log
-- Версия PHP: 5.3.26

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `lararating`
--

-- --------------------------------------------------------

--
-- Структура таблицы `sites`
--

CREATE TABLE IF NOT EXISTS `sites` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `date` int(10) unsigned NOT NULL,
  `description` tinytext,
  `link` varchar(60) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rtg_name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Таблица рэйтингов' AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `sites`
--

INSERT INTO `sites` (`id`, `name`, `date`, `description`, `link`) VALUES
(1, 'Первый сайт', 1371460148, NULL, ''),
(2, 'Второй сайт', 1371461148, NULL, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
