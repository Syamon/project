-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 11 2021 г., 12:57
-- Версия сервера: 5.6.37
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `NKO2`
--

-- --------------------------------------------------------

--
-- Структура таблицы `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `nomer_cheta` int(11) DEFAULT NULL,
  `RUB` int(11) NOT NULL,
  `USD` int(11) NOT NULL,
  `EUR` int(11) NOT NULL,
  `CHF` int(11) NOT NULL,
  `CZK` int(11) NOT NULL,
  `nomer_pasporta` int(11) DEFAULT NULL,
  `seria_pasporta` int(11) DEFAULT NULL,
  `strana` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `client`
--

INSERT INTO `client` (`id`, `name`, `nomer_cheta`, `RUB`, `USD`, `EUR`, `CHF`, `CZK`, `nomer_pasporta`, `seria_pasporta`, `strana`) VALUES
(4, 'Лиза', 777, 29000, 29000, 377, 3000, 2950, 2222, 12345, 'Россия'),
(5, 'Вася', 2223, -200, -200, 1600, 7000, 5000, 234, 2345, 'Россия'),
(6, 'Дима', 2222, 11845, 11845, 10000, 5000, 5050, 4444, 444444, 'Испания');

-- --------------------------------------------------------

--
-- Структура таблицы `commission`
--

CREATE TABLE `commission` (
  `ID_commission` int(11) NOT NULL,
  `Сountry` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `commission` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `commission`
--

INSERT INTO `commission` (`ID_commission`, `Сountry`, `commission`) VALUES
(1, 'Испания', 0.15),
(2, 'Греция', 0.5),
(3, 'Грузия', 0.12),
(4, 'Германия', 0.3),
(5, 'Румыния', 0.7),
(6, 'Италия', 0.11),
(7, 'Дания', 0.1),
(8, 'Турция', 0.14),
(9, 'Швеция', 0.16),
(10, 'Швейцария', 0.6),
(11, 'Польша', 0.4),
(12, 'Португалия', 0.13),
(13, 'Венгрия', 0.15),
(14, 'Хорватия', 0.11),
(15, 'Чехия', 0.1),
(16, 'Италия', 0.2),
(17, 'Россия', 0.2);

-- --------------------------------------------------------

--
-- Структура таблицы `dogovor`
--

CREATE TABLE `dogovor` (
  `ID` int(11) NOT NULL,
  `Num_dog` int(11) NOT NULL,
  `Name_klient` text NOT NULL,
  `Nomer_cheta` int(11) NOT NULL,
  `Date_dogovor` datetime NOT NULL,
  `FIO_user` text NOT NULL,
  `Role_user` text NOT NULL,
  `Name_action` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `dogovor`
--

INSERT INTO `dogovor` (`ID`, `Num_dog`, `Name_klient`, `Nomer_cheta`, `Date_dogovor`, `FIO_user`, `Role_user`, `Name_action`) VALUES
(1, 0, 'Вася', 2223, '2021-02-10 17:21:40', 'Давыдкин Д.Д.', 'Менеджер', ''),
(2, 0, 'Вася', 2223, '2021-02-10 17:23:14', 'Давыдкин Д.Д.', 'Менеджер', '');

-- --------------------------------------------------------

--
-- Структура таблицы `name_valut`
--

CREATE TABLE `name_valut` (
  `ID_valut` int(11) NOT NULL,
  `Name_val` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `name_valut`
--

INSERT INTO `name_valut` (`ID_valut`, `Name_val`) VALUES
(1, 'RUB'),
(2, 'USD'),
(3, 'EUR'),
(4, 'CHF'),
(5, 'CZK');

-- --------------------------------------------------------

--
-- Структура таблицы `oper`
--

CREATE TABLE `oper` (
  `ID_oper` int(11) NOT NULL,
  `Name_otprav` text NOT NULL,
  `Chet_otprav` int(11) NOT NULL,
  `ID_otprav` int(11) NOT NULL,
  `Name_pol` text,
  `Chet_pol` int(11) DEFAULT NULL,
  `ID_pol` int(11) DEFAULT NULL,
  `Summ` int(11) NOT NULL,
  `Name_val` text NOT NULL,
  `ID_vid_oper` int(11) NOT NULL,
  `Data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `oper`
--

INSERT INTO `oper` (`ID_oper`, `Name_otprav`, `Chet_otprav`, `ID_otprav`, `Name_pol`, `Chet_pol`, `ID_pol`, `Summ`, `Name_val`, `ID_vid_oper`, `Data`) VALUES
(76, 'Лиза', 777, 3, 'Вася', 2223, 4, 50, 'USD', 1, '2020-12-17 23:11:14'),
(77, 'Лиза', 777, 3, NULL, NULL, NULL, 123, 'EUR', 2, '2020-12-17 23:11:21'),
(78, 'Лиза', 777, 3, NULL, NULL, NULL, 1233, 'EUR', 3, '2020-12-17 23:11:39'),
(79, 'Лиза', 777, 3, 'Вася', 2223, 4, 50, 'EUR', 1, '2020-12-17 23:28:25'),
(80, 'Лиза', 777, 3, NULL, NULL, NULL, 1000, 'EUR', 2, '2020-12-17 23:28:30'),
(81, 'Лиза', 777, 3, NULL, NULL, NULL, 123, 'EUR', 3, '2020-12-17 23:28:36'),
(82, 'Лиза', 777, 3, 'Вася', 2223, 4, 200000, 'RUB', 1, '2020-12-17 23:44:30'),
(83, 'Лиза', 777, 3, NULL, NULL, NULL, 123, 'USD', 2, '2020-12-17 23:45:20'),
(84, 'Лиза', 777, 3, 'Вася', 2223, 4, 200, 'EUR', 1, '2020-12-17 23:48:55'),
(85, 'Лиза', 777, 3, NULL, NULL, NULL, 123, 'RUB', 2, '2020-12-17 23:49:03'),
(86, 'Лиза', 777, 3, 'Вася', 2223, 4, 200, 'RUB', 1, '2020-12-17 23:51:21'),
(87, 'Лиза', 777, 3, 'Вася', 2223, 4, 200, 'RUB', 1, '2020-12-17 23:51:54'),
(88, 'Лиза', 777, 3, NULL, NULL, NULL, 50, 'EUR', 3, '2020-12-17 23:52:01'),
(89, 'Лиза', 777, 3, 'Вася', 2223, 4, 200, 'EUR', 1, '2020-12-17 23:58:04'),
(90, 'Лиза', 777, 3, NULL, NULL, NULL, 866, 'RUB', 2, '2020-12-17 23:58:23'),
(91, 'Лиза', 777, 3, 'Вася', 2223, 4, 200, 'RUB', 1, '2020-12-18 00:21:29'),
(92, 'Лиза', 777, 3, NULL, NULL, NULL, 200, 'EUR', 2, '2020-12-18 00:21:34'),
(93, 'Лиза', 777, 3, NULL, NULL, NULL, 50, 'EUR', 3, '2020-12-18 00:21:45'),
(94, 'Лиза', 777, 3, NULL, NULL, NULL, 856, 'USD', 2, '2020-12-18 00:26:13'),
(95, 'Лиза', 777, 3, NULL, NULL, NULL, 657, 'EUR', 2, '2020-12-18 00:26:49'),
(96, 'Лиза', 777, 3, NULL, NULL, NULL, 750, 'RUB', 2, '2020-12-18 00:26:59'),
(97, 'Лиза', 777, 3, 'Вася', 2223, 4, 200, 'EUR', 1, '2020-12-18 00:51:58'),
(98, 'Лиза', 777, 3, 'Вася', 2223, 4, 200, 'RUB', 1, '2020-12-18 00:52:45'),
(99, 'Лиза', 777, 3, 'Вася', 2223, 4, 50, 'EUR', 1, '2020-12-18 21:45:50'),
(100, 'Лиза', 777, 3, 'Вася', 2223, 4, 200, 'EUR', 1, '2020-12-18 21:46:10'),
(101, 'Лиза', 777, 3, NULL, NULL, NULL, 5000, 'EUR', 3, '2020-12-18 21:46:24'),
(102, 'Лиза', 777, 3, 'Вася', 2223, 4, 50, 'EUR', 1, '2020-12-18 23:44:57'),
(103, 'Лиза', 777, 3, 'Вася', 2223, 4, 200, 'EUR', 1, '2020-12-18 23:45:05'),
(104, 'Лиза', 777, 3, NULL, NULL, NULL, 1000, 'EUR', 2, '2020-12-18 23:45:14'),
(105, 'Лиза', 777, 3, 'Вася', 2223, 4, 50, 'EUR', 1, '2020-12-20 15:40:30'),
(106, 'Лиза', 777, 3, NULL, NULL, NULL, 1000, 'USD', 2, '2020-12-20 15:40:56'),
(107, 'Лиза', 777, 3, NULL, NULL, NULL, 5000, 'EUR', 3, '2020-12-20 15:41:04'),
(108, 'Лиза', 777, 3, NULL, NULL, NULL, 1000, 'EUR', 2, '2020-12-22 14:00:31'),
(109, 'Лиза', 777, 3, NULL, NULL, NULL, 1000, 'RUB', 2, '2020-12-22 14:31:36'),
(110, 'Лиза', 777, 3, NULL, NULL, NULL, 5000, 'RUB', 2, '2020-12-22 14:44:41'),
(111, 'Лиза', 777, 3, NULL, NULL, NULL, 1000, 'RUB', 2, '2020-12-22 14:51:46'),
(112, 'Лиза', 777, 3, NULL, NULL, NULL, 1000, 'RUB', 2, '2020-12-22 14:58:59'),
(113, 'Лиза', 777, 3, 'Вася', 2223, 4, 123, 'USD', 1, '2021-01-04 00:08:25'),
(114, 'Лиза', 777, 3, 'Вася', 2223, 4, 123, 'USD', 1, '2021-01-04 00:10:00'),
(115, 'Лиза', 777, 3, 'Дима', 2222, 4, 123, 'USD', 1, '2021-01-04 00:11:04'),
(116, 'Лиза', 777, 3, 'Дима', 2222, 4, 123, 'USD', 1, '2021-01-04 00:20:15'),
(117, 'Лиза', 777, 3, 'Дима', 2222, 4, 123, 'USD', 1, '2021-01-04 00:24:23'),
(118, 'Лиза', 777, 3, 'Дима', 2222, 4, 123, 'USD', 1, '2021-01-04 00:24:48'),
(119, 'Лиза', 777, 3, 'Дима', 2222, 4, 123, 'USD', 1, '2021-01-04 00:25:03'),
(120, 'Лиза', 777, 3, 'Дима', 2222, 4, 123, 'USD', 1, '2021-01-04 00:25:18'),
(121, 'Лиза', 777, 3, 'Дима', 2222, 4, 123, 'USD', 1, '2021-01-04 00:25:31'),
(122, 'Лиза', 777, 3, 'Дима', 2222, 4, 123, 'USD', 1, '2021-01-04 00:27:12'),
(123, 'Лиза', 777, 3, 'Дима', 2222, 4, 123, 'USD', 1, '2021-01-04 00:27:31'),
(124, 'Лиза', 777, 3, 'Дима', 2222, 4, 123, 'USD', 1, '2021-01-04 00:30:32'),
(125, 'Лиза', 777, 3, 'Дима', 2222, 4, 123, 'USD', 1, '2021-01-04 00:35:53'),
(126, 'Лиза', 777, 3, 'Дима', 2222, 4, 123, 'USD', 1, '2021-01-04 00:37:09'),
(127, 'Лиза', 777, 3, 'Дима', 2222, 4, 123, 'USD', 1, '2021-01-04 00:37:56'),
(128, 'Лиза', 777, 3, 'Дима', 2222, 4, 123, 'USD', 1, '2021-01-04 00:39:21'),
(129, 'Лиза', 777, 3, 'Дима', 2222, 4, 123, 'USD', 1, '2021-01-04 00:39:56'),
(130, 'Лиза', 777, 3, NULL, NULL, NULL, 1000, 'EUR', 2, '2021-01-04 23:21:24'),
(131, 'Лиза', 777, 3, NULL, NULL, NULL, 1000, 'CZK', 2, '2021-01-04 23:22:16'),
(132, 'Лиза', 777, 3, NULL, NULL, NULL, 1000, 'CZK', 2, '2021-01-04 23:23:28'),
(133, 'Лиза', 777, 3, 'Вася', 2223, 4, 50, 'CHF', 1, '2021-01-13 22:50:16'),
(134, 'Лиза', 777, 3, 'Вася', 2223, 4, 50, 'Summ_USD', 1, '2021-01-13 22:51:24'),
(135, 'Лиза', 777, 3, 'Вася', 2223, 4, 50, 'Summ_USD', 1, '2021-01-13 22:51:46'),
(136, 'Лиза', 777, 3, 'Вася', 2223, 4, 856, 'RUB', 1, '2021-01-13 22:52:15'),
(137, 'Лиза', 777, 3, 'Вася', 2223, 4, 5000, 'CZK', 1, '2021-01-13 22:56:55'),
(138, 'Лиза', 777, 3, 'Вася', 2223, 4, 5000, 'Summ_na_chete', 1, '2021-01-13 23:42:12'),
(139, 'Лиза', 777, 3, 'Вася', 2223, 4, 200, 'EUR', 1, '2021-01-13 23:57:44'),
(140, 'Лиза', 777, 3, 'Вася', 2223, 4, 200, 'Summ_USD', 1, '2021-01-13 23:57:59'),
(141, 'Лиза', 777, 3, 'Вася', 2223, 4, 200, 'Summ_USD', 1, '2021-01-13 23:58:23'),
(142, 'Лиза', 777, 3, 'Вася', 2223, 4, 200, 'Summ_USD', 1, '2021-01-13 23:58:54'),
(143, 'Лиза', 777, 3, 'Вася', 2223, 4, 500, 'Summ_CHF', 1, '2021-01-13 23:59:34'),
(144, 'Лиза', 777, 3, 'Вася', 2223, 4, 500, 'Summ_CHF', 1, '2021-01-14 00:00:08'),
(145, 'Лиза', 777, 3, 'Вася', 2223, 4, 500, 'Summ_CHF', 1, '2021-01-14 00:00:38'),
(146, 'Лиза', 777, 3, 'Вася', 2223, 4, 500, 'Summ_CHF', 1, '2021-01-14 00:00:51'),
(147, 'Лиза', 777, 3, 'Дима', 2222, 4, 50, 'Summ_CZK', 1, '2021-01-14 00:02:07'),
(148, 'Лиза', 777, 3, 'Вася', 2223, 4, 50, 'Summ_USD', 1, '2021-01-14 14:01:06'),
(149, 'Лиза', 777, 3, 'Вася', 2223, 4, 50, 'Summ_USD', 1, '2021-01-14 14:01:12'),
(150, 'Лиза', 777, 3, 'Вася', 2223, 4, 50, 'USD', 1, '2021-01-14 14:02:35'),
(151, 'Лиза', 777, 3, '', 2223, 4, 50, '', 1, '2021-01-16 01:44:45'),
(152, 'Лиза', 777, 3, '', 2223, 4, 50, '', 1, '2021-01-16 01:44:56'),
(153, 'Лиза', 777, 3, '', 2222, 4, 200, '', 1, '2021-01-16 15:28:57'),
(154, 'Лиза', 777, 3, '', 2222, 4, 200, '', 1, '2021-01-16 15:31:18'),
(155, 'Лиза', 777, 3, '', 2222, 4, 50, '', 1, '2021-01-16 15:34:31'),
(156, 'Лиза', 777, 3, '', 2222, 4, 50, '', 1, '2021-01-16 15:39:51'),
(157, 'Лиза', 777, 3, '', 2222, 4, 200, '', 1, '2021-01-30 22:47:06'),
(158, 'Лиза', 777, 3, NULL, NULL, NULL, 500, '', 3, '2021-01-30 22:58:16'),
(159, 'Лиза', 777, 3, NULL, NULL, NULL, 500, '', 3, '2021-01-30 23:09:19'),
(160, 'Лиза', 777, 3, NULL, NULL, NULL, 500, 'USD', 3, '2021-01-30 23:10:47'),
(161, 'Лиза', 777, 3, NULL, NULL, NULL, 500, 'USD', 3, '2021-01-30 23:15:00'),
(162, 'Лиза', 777, 3, NULL, NULL, NULL, 100, 'USD', 3, '2021-01-30 23:15:54'),
(163, 'Лиза', 777, 3, NULL, NULL, NULL, 100, 'USD', 3, '2021-01-30 23:16:13'),
(164, 'Лиза', 777, 3, NULL, NULL, NULL, 100, 'USD', 3, '2021-01-30 23:16:23'),
(165, 'Лиза', 777, 3, NULL, NULL, NULL, 100, 'USD', 3, '2021-01-30 23:17:13'),
(166, 'Лиза', 777, 3, NULL, NULL, NULL, 50, 'USD', 3, '2021-01-30 23:18:05'),
(167, 'Лиза', 777, 3, NULL, NULL, NULL, 50, 'USD', 3, '2021-01-30 23:18:59'),
(168, 'Лиза', 777, 3, NULL, NULL, NULL, 150, 'EUR', 3, '2021-01-30 23:19:56'),
(169, 'Лиза', 777, 3, NULL, NULL, NULL, 150, 'EUR', 3, '2021-01-30 23:20:41'),
(170, 'Лиза', 777, 3, NULL, NULL, NULL, 150, 'EUR', 3, '2021-01-30 23:54:16'),
(171, 'Лиза', 777, 3, NULL, NULL, NULL, 150, 'EUR', 3, '2021-01-30 23:54:49'),
(172, 'Лиза', 777, 3, NULL, NULL, NULL, 150, 'EUR', 3, '2021-01-30 23:59:05'),
(173, 'Лиза', 777, 3, NULL, NULL, NULL, 850, 'USD', 3, '2021-01-31 00:08:37'),
(174, 'Вася', 2223, 3, '', 2222, 4, 501, 'RUB', 1, '2021-02-10 17:11:51'),
(175, 'Вася', 2223, 3, '', 777, 4, 0, 'USD', 1, '2021-02-10 17:12:15'),
(176, 'Вася', 2223, 3, NULL, NULL, NULL, 100, 'ноль', 2, '2021-02-10 17:12:46'),
(177, 'Вася', 2223, 3, NULL, NULL, NULL, 100, 'USD', 3, '2021-02-10 17:12:57'),
(178, 'Лиза', 777, 3, NULL, NULL, NULL, 100, 'EUR', 3, '2021-02-10 17:16:26'),
(179, 'Лиза', 777, 3, NULL, NULL, NULL, 100, 'EUR', 3, '2021-02-10 17:16:46'),
(180, 'Лиза', 777, 3, NULL, NULL, NULL, 100, 'USD', 3, '2021-02-10 17:16:59'),
(181, 'Лиза', 777, 3, '', 2223, 4, 0, 'RUB', 1, '2021-02-10 17:18:23'),
(182, 'Лиза', 777, 3, '', 2223, 4, 0, 'USD', 1, '2021-02-10 17:19:56'),
(183, 'Лиза', 777, 3, NULL, NULL, NULL, 100, 'USD', 3, '2021-02-10 17:20:38'),
(184, 'Вася', 2223, 3, '', 777, 4, 0, 'RUB', 1, '2021-02-10 17:21:34'),
(185, 'Вася', 2223, 3, '', 777, 4, 0, 'USD', 1, '2021-02-10 17:23:07');

-- --------------------------------------------------------

--
-- Структура таблицы `prib_organiz`
--

CREATE TABLE `prib_organiz` (
  `ID_prib` int(11) NOT NULL,
  `Date_prib` datetime NOT NULL,
  `Summ_prib` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `prib_organiz`
--

INSERT INTO `prib_organiz` (`ID_prib`, `Date_prib`, `Summ_prib`) VALUES
(1, '2021-01-16 15:28:57', 0),
(2, '2021-01-16 15:31:18', 0),
(3, '2021-01-16 15:28:57', 2),
(4, '2021-01-16 15:34:31', 0),
(5, '2021-01-16 15:39:51', 0),
(6, '2021-01-30 22:47:06', 0.3),
(7, '2021-02-10 17:11:51', 0.75);

-- --------------------------------------------------------

--
-- Структура таблицы `role`
--

CREATE TABLE `role` (
  `ID_role` int(11) NOT NULL,
  `Role` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `role`
--

INSERT INTO `role` (`ID_role`, `Role`) VALUES
(1, 'Администратор'),
(2, 'Менеджер'),
(3, 'Клиент'),
(4, 'Клиент-получатель');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `ID_user` int(11) NOT NULL,
  `login` text NOT NULL,
  `password` int(11) NOT NULL,
  `FIO_user` text NOT NULL,
  `ID_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`ID_user`, `login`, `password`, `FIO_user`, `ID_role`) VALUES
(1, 'qwerty', 228, 'Давыдкин Д.Д.', 2),
(2, 'W', 2, 'Попов В.Ю.', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `valuta`
--

CREATE TABLE `valuta` (
  `ID_val` int(11) NOT NULL,
  `Name_val` int(11) NOT NULL,
  `Pocup_val` int(11) NOT NULL,
  `Prodach_val` int(11) NOT NULL,
  `Data_izm` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `valuta`
--

INSERT INTO `valuta` (`ID_val`, `Name_val`, `Pocup_val`, `Prodach_val`, `Data_izm`) VALUES
(1, 2, 75, 67, '2021-01-04 22:38:05'),
(2, 3, 75, 67, '2021-01-04 22:38:05'),
(3, 4, 20, 30, '2021-01-04 22:39:53'),
(4, 5, 75, 67, '2021-01-04 22:38:05');

-- --------------------------------------------------------

--
-- Структура таблицы `vid_oper`
--

CREATE TABLE `vid_oper` (
  `ID_Vid` int(11) NOT NULL,
  `Name_oper` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `vid_oper`
--

INSERT INTO `vid_oper` (`ID_Vid`, `Name_oper`) VALUES
(1, 'Перевод'),
(2, 'Снятие денег'),
(3, 'Покупка валюты');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `commission`
--
ALTER TABLE `commission`
  ADD PRIMARY KEY (`ID_commission`);

--
-- Индексы таблицы `dogovor`
--
ALTER TABLE `dogovor`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `name_valut`
--
ALTER TABLE `name_valut`
  ADD PRIMARY KEY (`ID_valut`);

--
-- Индексы таблицы `oper`
--
ALTER TABLE `oper`
  ADD PRIMARY KEY (`ID_oper`),
  ADD KEY `ID_otprav` (`ID_otprav`),
  ADD KEY `ID_pol` (`ID_pol`),
  ADD KEY `ID_vid_oper` (`ID_vid_oper`);

--
-- Индексы таблицы `prib_organiz`
--
ALTER TABLE `prib_organiz`
  ADD PRIMARY KEY (`ID_prib`);

--
-- Индексы таблицы `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`ID_role`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_user`),
  ADD KEY `ID_role` (`ID_role`);

--
-- Индексы таблицы `valuta`
--
ALTER TABLE `valuta`
  ADD PRIMARY KEY (`ID_val`),
  ADD KEY `Name_val` (`Name_val`);

--
-- Индексы таблицы `vid_oper`
--
ALTER TABLE `vid_oper`
  ADD PRIMARY KEY (`ID_Vid`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `commission`
--
ALTER TABLE `commission`
  MODIFY `ID_commission` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT для таблицы `dogovor`
--
ALTER TABLE `dogovor`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `name_valut`
--
ALTER TABLE `name_valut`
  MODIFY `ID_valut` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `oper`
--
ALTER TABLE `oper`
  MODIFY `ID_oper` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;
--
-- AUTO_INCREMENT для таблицы `prib_organiz`
--
ALTER TABLE `prib_organiz`
  MODIFY `ID_prib` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `role`
--
ALTER TABLE `role`
  MODIFY `ID_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `ID_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `valuta`
--
ALTER TABLE `valuta`
  MODIFY `ID_val` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `vid_oper`
--
ALTER TABLE `vid_oper`
  MODIFY `ID_Vid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `oper`
--
ALTER TABLE `oper`
  ADD CONSTRAINT `oper_ibfk_1` FOREIGN KEY (`ID_otprav`) REFERENCES `role` (`ID_role`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `oper_ibfk_2` FOREIGN KEY (`ID_pol`) REFERENCES `role` (`ID_role`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `oper_ibfk_3` FOREIGN KEY (`ID_vid_oper`) REFERENCES `vid_oper` (`ID_Vid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`ID_role`) REFERENCES `role` (`ID_role`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `valuta`
--
ALTER TABLE `valuta`
  ADD CONSTRAINT `valuta_ibfk_1` FOREIGN KEY (`Name_val`) REFERENCES `name_valut` (`ID_valut`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
