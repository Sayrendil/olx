-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 16 2022 г., 12:35
-- Версия сервера: 10.4.24-MariaDB
-- Версия PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `olx`
--

-- --------------------------------------------------------

--
-- Структура таблицы `adverts`
--

CREATE TABLE `adverts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `status` int(3) NOT NULL,
  `image_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `adverts`
--

INSERT INTO `adverts` (`id`, `title`, `description`, `price`, `user_id`, `category_id`, `subcategory_id`, `status`, `image_id`) VALUES
(1, 'Игровая приставка Dendy Retro Genesis 8 Bit HD (+ 300 игр)', 'Стационарная игровая приставка Retro Genesis 8 Bit Classic – это выполненная в классическом полноразмерном корпусе приставка типа «денди» и «НЕС», предназначенная для подключения к телевизору. Приставка оснащается двумя проводными джойстиками и позволяет прямиком из коробки играть в игры, предназначенные для игры вдвоем. Джойстики имеют не только кнопки A и B, но и их турбо версии, которые позволяют имитировать непрерывное нажатие. Как правило, турбо-кнопки крайне удобно использовать в играх, где необходимо постоянно нажимать на одну из кнопок. Например, в аркадных шутерах или скролл-шутерах, где необходимо постоянно поддерживать огонь из орудий персонажем игры. Длина провода джойстиков составляет 1,5 метра. По бокам корпуса приставки присутствуют отсеки для крепления джойстиков для более удобного хранения. Питание устройства осуществляется через разъем питания microUSB, который на данный момент является универсальным стандартом, поэтому является легко заменяемым. Для большей аутентичности рекомендуется подключение к кинескопным экранам, на которых изображение выглядит наиболее комфортно. Особенности: Классическая форма корпуса «Famicom» со знакомыми узнаваемыми элементами – отсеками для хранения джойстиков, рычаг для легкого извлечения игровых картриджей и крышкой отсека картриджей, который предохраняет его от попадания излишней пыли или крошек. Быстрый выход в раздел выбора встроенных игр с помощью кнопки Reset. Моментальная загрузка. Совместимость с игровыми картриджами для Dendy и NES. Питание от стандартного адаптера 5V с разъемом microUSB. 300 встроенных полноценных игр самых разнообразных жанров. Никаких повторов или вариантов 9999-в-одном. Турбо аналоги кнопок A и B, которые обеспечивают многократное нажатие на кнопку. Это позволяет нажать один раз на одну кнопку, чтобы постоянно производить выстрелы или прыгать. В некоторых играх это крайне удобно и позволяет сохранить ресурс самих кнопок на джойстике. Комплектация: Игровая приставка Retro Genesis 8 Bit Classic. Два проводных джойстика. AV-кабель. Адаптер питания. Инструкция.', 32990, 1, 5, 0, 0, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Книги'),
(2, 'Игрушки'),
(3, 'Активный отдых и спорт'),
(4, 'Школа, канцелярия'),
(5, 'Видеоигры и консоли'),
(6, 'Продукты и напитки'),
(7, 'Наушники и аудиотехника'),
(8, 'Электроника'),
(9, 'Мебель и интерьер');

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `subcategories`
--

INSERT INTO `subcategories` (`id`, `name`, `category_id`) VALUES
(1, 'Художественная литература', 1),
(2, 'Детская литература', 1),
(3, 'Наш Казахстан', 1),
(4, 'Книги по бизнесу', 1),
(5, 'Конструктор LEGO', 2),
(6, 'Настольные игры', 2),
(7, 'Мягкая игрушка', 2),
(8, 'Для мальчиков', 2),
(9, 'Для девочек', 2),
(10, 'Активные игры', 3),
(11, 'Самокаты, скейты', 3),
(12, 'Для плавания', 3),
(13, 'Велосипеды', 3),
(14, 'Письменные принадлежности', 4),
(15, 'Офисные и школьные папки', 4),
(16, 'Playstation 4', 5),
(17, 'Playstation 5', 5),
(18, 'XBOX', 5),
(19, 'Nintendo Switch', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `login`, `password`, `role_id`) VALUES
(1, 'Daniyar', '+77081596010', 'daniyarsigaev@gmail.com', '12345678', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `adverts`
--
ALTER TABLE `adverts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `subcategories`
--
ALTER TABLE `subcategories`
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
-- AUTO_INCREMENT для таблицы `adverts`
--
ALTER TABLE `adverts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
