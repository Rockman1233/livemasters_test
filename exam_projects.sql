-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:8889
-- Время создания: Янв 23 2018 г., 14:27
-- Версия сервера: 5.6.35
-- Версия PHP: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `exam_projects`
--

-- --------------------------------------------------------

--
-- Структура таблицы `exam_projects`
--

CREATE TABLE `exam_projects` (
  `project_id` int(11) NOT NULL COMMENT 'ID проекта',
  `project_name` varchar(255) DEFAULT NULL COMMENT 'название проекта'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Проекты компании';

--
-- Дамп данных таблицы `exam_projects`
--

INSERT INTO `exam_projects` (`project_id`, `project_name`) VALUES
(1, 'Microsoft'),
(2, 'Google\'s proj.'),
(4, 'Apple\'s proj.'),
(19, 'Instargam\'s proj.'),
(22, 'Uber'),
(24, 'Tesla'),
(26, 'Amazon');

-- --------------------------------------------------------

--
-- Структура таблицы `exam_projects_workers`
--

CREATE TABLE `exam_projects_workers` (
  `ep_id` int(11) NOT NULL COMMENT 'primary ID',
  `project_id` int(11) DEFAULT NULL COMMENT 'ID из exam_projects ',
  `worker_id` int(11) DEFAULT NULL COMMENT 'ID из exam_workers',
  `role_id` int(11) DEFAULT NULL COMMENT 'ID из exam_roles',
  `dt_begin` date DEFAULT NULL COMMENT 'дата начала работы сотрудника над проектом',
  `dt_end` date DEFAULT NULL COMMENT 'дата окончания работы сотрудника над проектом'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Занятость сотрудников в проектах компании';

--
-- Дамп данных таблицы `exam_projects_workers`
--

INSERT INTO `exam_projects_workers` (`ep_id`, `project_id`, `worker_id`, `role_id`, `dt_begin`, `dt_end`) VALUES
(4, 19, 1, 7, '2018-01-12', '2018-01-26'),
(10, 2, 3, 3, '2018-01-25', '2018-01-26'),
(11, 4, 5, 7, '2018-02-01', '2018-02-07'),
(58, 3, 4, 7, '2018-01-30', '2018-01-31'),
(59, 3, 2, 5, '2018-01-18', '2018-01-30'),
(60, 3, 2, 7, '2018-01-17', '2018-01-31'),
(61, 4, 1, 7, '2018-01-25', '2018-01-31'),
(63, 24, 8, 9, '2018-05-29', '2018-06-02'),
(65, 24, 9, 14, '2018-02-09', '2018-02-10'),
(66, 19, 4, 7, '2018-01-24', '2018-01-27'),
(71, 26, 10, 14, '2018-01-24', '2018-02-01');

-- --------------------------------------------------------

--
-- Структура таблицы `exam_roles`
--

CREATE TABLE `exam_roles` (
  `role_id` int(11) NOT NULL COMMENT 'ID роли',
  `role_name` varchar(255) DEFAULT NULL COMMENT 'название роли (например, DEV, PM, QA и т.п.)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Проектные роли';

--
-- Дамп данных таблицы `exam_roles`
--

INSERT INTO `exam_roles` (`role_id`, `role_name`) VALUES
(1, 'DEV'),
(3, 'CR'),
(5, 'QA'),
(7, 'PM'),
(9, 'TL'),
(10, 'SEO'),
(14, 'CEO'),
(16, 'SM');

-- --------------------------------------------------------

--
-- Структура таблицы `exam_workers`
--

CREATE TABLE `exam_workers` (
  `worker_id` int(11) NOT NULL COMMENT 'ID сотрудника',
  `worker_lastname` varchar(255) DEFAULT NULL COMMENT 'фамилия сотрудника'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Сотрудники компании';

--
-- Дамп данных таблицы `exam_workers`
--

INSERT INTO `exam_workers` (`worker_id`, `worker_lastname`) VALUES
(2, 'Zuckerberg'),
(3, 'Brin'),
(4, 'Durov'),
(5, 'Jobs'),
(8, 'Mask'),
(9, 'Gates'),
(10, 'Bezos');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `exam_projects`
--
ALTER TABLE `exam_projects`
  ADD PRIMARY KEY (`project_id`);

--
-- Индексы таблицы `exam_projects_workers`
--
ALTER TABLE `exam_projects_workers`
  ADD PRIMARY KEY (`ep_id`);

--
-- Индексы таблицы `exam_roles`
--
ALTER TABLE `exam_roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Индексы таблицы `exam_workers`
--
ALTER TABLE `exam_workers`
  ADD PRIMARY KEY (`worker_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `exam_projects`
--
ALTER TABLE `exam_projects`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID проекта', AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT для таблицы `exam_projects_workers`
--
ALTER TABLE `exam_projects_workers`
  MODIFY `ep_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary ID', AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT для таблицы `exam_roles`
--
ALTER TABLE `exam_roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID роли', AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT для таблицы `exam_workers`
--
ALTER TABLE `exam_workers`
  MODIFY `worker_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID сотрудника', AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
