-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 31 2018 г., 10:49
-- Версия сервера: 5.5.53
-- Версия PHP: 5.6.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `login_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `gender` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `date`, `gender`, `email`, `password`) VALUES
(1, 'Torogeldi', 'Abaev', '1996-06-20', 'М', 'tor.abaev@mail.ru', 'e10adc3949ba59abbe56e057f20f883e'),
(2, 'Joni', 'Lon', '2031-08-20', 'М', 'johndoe@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(3, 'Андрей', 'Алексеев', '1991-08-20', 'Ж', 'andrei@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(4, 'Торогелди', 'Абаев', '1991-08-20', 'М', 'torogeldi96kg@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(5, 'user', 'user', '1991-08-20', 'М', 'andrei8456@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(6, 'Jane', 'Codi', '2016-08-20', 'Ж', 'jane@gmail.com', '71b3b26aaa319e0cdf6fdb8429c112b0'),
(7, 'Lora', 'Norm', '1991-08-20', 'Ж', 'lora@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(8, 'Ela', 'Jones', '1991-08-20', 'Ж', 'ela@gmail.com', 'e35cf7b66449df565f93c607d5a81d09'),
(9, 'Kate', 'Lee', '1990-01-01', 'Ж', 'kate@gmail.com', 'e35cf7b66449df565f93c607d5a81d09'),
(10, 'Mark', 'Ronson', '2001-08-20', 'М', 'mark@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4'),
(11, 'Bran', 'Smith', '1991-08-01', 'М', 'bran@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4'),
(12, 'Smith', 'John', '1991-08-16', 'М', 'smith@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4'),
(13, 'loky', 'Mark', '2018-08-01', 'М', 'loky@gmail.com', '71b3b26aaa319e0cdf6fdb8429c112b0'),
(14, 'Anna', 'Tomas', '1999-08-31', 'Ж', 'anna@gmail.com', '94ee440bf0821d408553930ea46f3802'),
(15, 'Иван', 'Иванов', '2011-08-20', 'М', 'sasha@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(16, 'Юрий', 'Гагарин', '2016-08-20', 'М', 'user@mail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(17, 'Жанна', 'Демис', '1991-08-12', 'Ж', 'ann@mail.ru', 'e35cf7b66449df565f93c607d5a81d09'),
(18, 'Николай', 'Басков', '1991-08-11', 'М', 'asdf@mail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(19, 'Наташа', 'Николаева', '1990-08-31', 'Ж', 'kate12@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
