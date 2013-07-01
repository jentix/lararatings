-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 01 2013 г., 10:48
-- Версия сервера: 5.6.12-log
-- Версия PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `lararating`
--
CREATE DATABASE IF NOT EXISTS `lararating` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `lararating`;

-- --------------------------------------------------------

--
-- Структура таблицы `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ip` varchar(15) NOT NULL,
  `site_id` int(10) unsigned NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `site_id` (`site_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Таблица рэйтингов' AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `sites`
--

INSERT INTO `sites` (`id`, `name`, `date`, `description`, `link`) VALUES
(1, 'Первый сайт', 1371460148, NULL, ''),
(2, 'Второй сайт', 1371461148, 'Отличный сайтик ! )', ''),
(3, 'Новый веб', 1371583148, 'городской провайдер', 'http://fryazino.net/');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
