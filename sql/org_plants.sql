-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июл 31 2018 г., 08:31
-- Версия сервера: 10.1.31-MariaDB
-- Версия PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `tgc1_users`
--

-- --------------------------------------------------------

--
-- Структура таблицы `org_plants`
--

CREATE TABLE `org_plants` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `org_top_id` int(11) NOT NULL,
  `code` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Второй уровень орг структуры (предприятия)';

--
-- Дамп данных таблицы `org_plants`
--

INSERT INTO `org_plants` (`id`, `name`, `org_top_id`, `code`) VALUES
(1, 'Кас Ладожск ГЭС', 1, 'D202'),
(2, 'ТЭЦ 5 Правобер', 1, 'D205'),
(3, 'Управление ПАО', 2, 'D100'),
(4, 'Аппарат Упр НФ', 1, 'D200'),
(5, 'ТЭЦ 15 Автовск', 1, 'D215'),
(6, 'ТЭЦ 17 Выборгск', 1, 'D217'),
(7, 'ТЭЦ 14 Первомай', 1, 'D214'),
(8, 'ТЭЦ 21 Северная', 1, 'D221'),
(9, 'ТЭЦ 22 Южная', 1, 'D222'),
(10, 'ТЭЦ 7 Василеост', 1, 'D207'),
(11, 'ГЭС 13 Нарвская', 1, 'D213'),
(12, 'Аппарат Упр КаФ', 4, 'D300'),
(13, 'ЦТЭЦ Центральн', 1, 'D204'),
(14, 'Кас Тул-Сер ГЭС', 3, 'D404'),
(15, 'Аппарат Упр КоФ', 3, 'D400'),
(16, 'АТЭЦ Апатитская', 3, 'D401'),
(17, 'Кас Нивских ГЭС', 3, 'D402'),
(18, 'Кас Пазских ГЭС', 3, 'D403'),
(19, 'Кас Выгских ГЭС', 4, 'D302'),
(20, 'Кас Кемских ГЭС', 4, 'D303'),
(21, 'ПТЭЦ Петрозавод', 4, 'D301'),
(22, 'Кас Сунских ГЭС', 4, 'D304'),
(23, 'ПСДТУ и ИТ', 1, 'D203'),
(24, 'Кас Вуоксин ГЭС', 1, 'D201');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `org_plants`
--
ALTER TABLE `org_plants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `org_top_id` (`org_top_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `org_plants`
--
ALTER TABLE `org_plants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `org_plants`
--
ALTER TABLE `org_plants`
  ADD CONSTRAINT `org_plants_ibfk_1` FOREIGN KEY (`org_top_id`) REFERENCES `org_top` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
