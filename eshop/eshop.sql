-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Окт 16 2020 г., 22:36
-- Версия сервера: 10.4.11-MariaDB
-- Версия PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `eshop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `order_row` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `title`, `order_row`) VALUES
(1, 'Женщинам', 10),
(2, 'Мужчинам', 9),
(3, 'Детям', 8);

-- --------------------------------------------------------

--
-- Структура таблицы `core_articles`
--

CREATE TABLE `core_articles` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `core_articles`
--

INSERT INTO `core_articles` (`id`, `title`, `description`, `photo`) VALUES
(1, 'Джинсовые куртки', 'new arrival', 'img/article1.jpg'),
(2, NULL, NULL, 'img/article2.jpg'),
(3, NULL, 'каждый сезон мы подготавливаем для Вас исключительно лучшую модную одежду. Следите за нашими новинками', NULL),
(4, 'джинсы', 'от 3200 руб', 'img/article3.jpg'),
(5, 'аксессуары', NULL, NULL),
(6, NULL, NULL, 'img/article4.jpg'),
(7, NULL, 'Самые низкие цены в Москве.<br>Нашли дешевле? Вернём разницу.', NULL),
(8, 'спортивная одежда ', 'от 590 руб.', 'img/article5.jpg'),
(9, 'элегантная<br>обувь', 'ботинки, кроссовки', NULL),
(10, 'детская<br>одежда', 'new arrival', 'img/article6.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `core_goods`
--

CREATE TABLE `core_goods` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `articul` int(11) NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `photo` varchar(1000) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `is_new` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `core_goods`
--

INSERT INTO `core_goods` (`id`, `title`, `price`, `articul`, `description`, `photo`, `category_id`, `type_id`, `is_new`) VALUES
(1, 'Куртка синяя', 5400, 44557700, 'Очень классная куртка, тёплая. Носить одно удовольствие.', 'img/catalog/1.jpg', 3, 1, 1),
(2, 'Кожаная куртка', 22500, 22334455, 'Из кожи ягодиц молодого дракона.', 'img/catalog/2.jpg', 2, 1, 0),
(3, 'Куртка с карманами', 9200, 964993592, 'Круче жилетки Вассермана.', 'img/catalog/3.png', 3, 1, 0),
(4, 'Куртка с капюшоном', 6100, 37902651, 'И не нужна шапка.', 'img/catalog/4.jpg', 3, 1, 0),
(5, 'Куртка Casual', 8800, 1234567, 'Хорошая куртка.', 'img/catalog/5.jpg', 2, 1, 0),
(6, 'Стильная кожаная куртка', 12800, 234578990, 'Дорого, богато.', 'img/catalog/6.jpg', 2, 1, 1),
(7, 'Кеды серые', 2900, 354576587, 'Удобные и лёгкие.', 'img/catalog/7.jpg', 3, 3, 0),
(8, 'Кеды чёрные', 4500, 577841209, 'Модные и стильные.', 'img/catalog/8.jpg', 1, 3, 0),
(9, 'Кеды casual', 5900, 89314678, 'Клёвые стильные кеды. Все парни твои!', 'img/catalog/9.jpg', 1, 3, 1),
(10, 'Кеды всепогодные', 9200, 83128032, 'Отличные куды из водонепроницаемого материала. Отлично подходят для любой погоды. Приятно сидят на ноге, стильные и комфортные.', 'img/catalog/10.jpg', 1, 3, 0),
(11, 'Джинсы', 4800, 200469860, 'Прочный материал и стойкий цвет', 'img/catalog/11.jpg', 1, 2, 0),
(12, 'Джинсы голубые', 4200, 246557945, 'В них выросла вся Америка', 'img/catalog/12.jpg', 2, 2, 1),
(13, 'Джинсы рваные', 5000, 111111, 'Не покупайте эту рвань!', 'img/catalog/12_8a4e01b5eaa10b7c1a98b1805d8092c8.jpg', 1, 2, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `core_orders`
--

CREATE TABLE `core_orders` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `surname` varchar(100) DEFAULT NULL,
  `address` varchar(1000) DEFAULT NULL,
  `city` varchar(200) DEFAULT NULL,
  `postcode` int(11) DEFAULT NULL,
  `goods` varchar(500) NOT NULL,
  `publ_time` int(11) NOT NULL,
  `order_status` tinyint(1) NOT NULL DEFAULT 1,
  `last_update` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `core_orders`
--

INSERT INTO `core_orders` (`id`, `email`, `phone`, `first_name`, `surname`, `address`, `city`, `postcode`, `goods`, `publ_time`, `order_status`, `last_update`) VALUES
(1, 'yuri_tes@mail.ru', '89177221212', 'Юрий', 'Городжий', 'Волгоградская область, г. Волжский, ул. Мира, д.40, кв. 36', 'Волжский', 404132, '[\"3\"]', 1602067907, 1, 0),
(2, 'yuri_tes@mail.ru', '8917711111', 'Юрий', 'Городжий', 'Волгоградская область, г. Волжский, ул. Мира, д.40, кв. 36', 'Волжский', 404132, '[\"3\",\"12\"]', 1602069189, 1, 0),
(3, 'yuri_tes@mail.ru', '8917734546', 'Юрий', 'Городжий', 'Волгоградская область, г. Волжский, ул. Мира, д.40, кв. 36', 'Волжский', 404132, '[\"3\",\"12\"]', 1602069768, 1, 0),
(4, 'yuri_tes@mail.ru', '89968958', 'Юрий', '', '', '', 0, '[\"3\",\"12\"]', 1602069882, 1, 0),
(5, 'yuri_tes@mail.ru', '68874664', 'Юрий', '', '', '', 0, '[\"3\",\"12\"]', 1602071476, 1, 0),
(6, 'yuri_tes@mail.ru', '9900754433', 'Юрий', 'Городжий', 'Волгоградская область, г. Волжский, ул. Мира, д.40, кв. 36', 'Волжский', 404132, '[\"12\",\"1\"]', 1602161308, 1, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `core_shops`
--

CREATE TABLE `core_shops` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `latitude` float DEFAULT NULL,
  `longitude` float DEFAULT NULL,
  `photo` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `core_shops`
--

INSERT INTO `core_shops` (`id`, `title`, `description`, `address`, `latitude`, `longitude`, `photo`) VALUES
(1, 'Главный магазин возле кремля', 'Много товаров и всего всего', 'Россия, Москва, Кремль', 55.752, 37.6177, 'https://bigenc.ru/media/2016/10/27/1237282504/25635.jpg.262x-.png'),
(2, 'Магазин в Питере', 'Культурный магазин', 'Россия, Питер, Дворцовая Площадь', 59.9391, 30.3159, 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQ_pYIWTniXRHx8vfXAq6yAUVrB8ns95j6fJw&usqp=CAU');

-- --------------------------------------------------------

--
-- Структура таблицы `core_users`
--

CREATE TABLE `core_users` (
  `id` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_group` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `core_users`
--

INSERT INTO `core_users` (`id`, `login`, `email`, `password`, `user_group`) VALUES
(1, 'world', '111@mail.ru', '$1$yEB120J.$x3ubfdf7mRuGFX//isRKl.', 2),
(2, 'Юрий', 'yuri@mail.ru', '$1$uhCpV/be$cPL.TEnJL.40Wm3avJXGF1', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `core_user_groups`
--

CREATE TABLE `core_user_groups` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `color` varchar(50) NOT NULL,
  `background` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `core_user_groups`
--

INSERT INTO `core_user_groups` (`id`, `title`, `color`, `background`) VALUES
(1, 'Пользователь', 'grey', ''),
(2, 'Менеджер', 'blue', 'green');

-- --------------------------------------------------------

--
-- Структура таблицы `itemtypes`
--

CREATE TABLE `itemtypes` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `itemtypes`
--

INSERT INTO `itemtypes` (`id`, `title`) VALUES
(1, 'Куртки'),
(2, 'Джинсы'),
(3, 'Обувь');

-- --------------------------------------------------------

--
-- Структура таблицы `statuses`
--

CREATE TABLE `statuses` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `color` varchar(50) DEFAULT NULL,
  `background` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `statuses`
--

INSERT INTO `statuses` (`id`, `title`, `color`, `background`) VALUES
(1, 'Не обработан', 'red', 'yellow'),
(2, 'Обработан', 'white', 'green');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `core_articles`
--
ALTER TABLE `core_articles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `core_goods`
--
ALTER TABLE `core_goods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `core_orders`
--
ALTER TABLE `core_orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `core_shops`
--
ALTER TABLE `core_shops`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `core_users`
--
ALTER TABLE `core_users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `core_user_groups`
--
ALTER TABLE `core_user_groups`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `itemtypes`
--
ALTER TABLE `itemtypes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `core_articles`
--
ALTER TABLE `core_articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `core_goods`
--
ALTER TABLE `core_goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `core_orders`
--
ALTER TABLE `core_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `core_shops`
--
ALTER TABLE `core_shops`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `core_users`
--
ALTER TABLE `core_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `core_user_groups`
--
ALTER TABLE `core_user_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `itemtypes`
--
ALTER TABLE `itemtypes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
