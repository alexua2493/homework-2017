-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 13 2017 г., 15:10
-- Версия сервера: 5.6.34
-- Версия PHP: 5.6.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `blog`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comment`
--

CREATE TABLE `comment` (
  `comment_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) DEFAULT NULL,
  `comment_parent_id` bigint(20) DEFAULT NULL,
  `comment_username` varchar(255) DEFAULT NULL,
  `comment_text` text,
  `comment_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comment`
--

INSERT INTO `comment` (`comment_id`, `post_id`, `comment_parent_id`, `comment_username`, `comment_text`, `comment_datetime`) VALUES
(95, 74, NULL, 'den21', 'он невиновен, об этом все знают!!!', '2017-02-13 09:36:33'),
(97, 74, 95, 'fda', 'это далеко не факт, на словах все вы - молодцы!', '2017-02-13 09:38:10'),
(99, 72, NULL, 'tonix', 'Как говорится - дураки и дороги две проблемы России', '2017-02-13 10:37:30'),
(101, 72, 99, 'zen27', 'tonix, ты тому пример!', '2017-02-13 10:38:20');

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `image_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `post_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `login_admin`
--

CREATE TABLE `login_admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `login` varchar(128) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `login_admin`
--

INSERT INTO `login_admin` (`id`, `login`, `password`) VALUES
(1, 'root', 'root');

-- --------------------------------------------------------

--
-- Структура таблицы `post`
--

CREATE TABLE `post` (
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `post_title` varchar(255) DEFAULT NULL,
  `post_min_text` text,
  `post_text` text,
  `post_create_datetime` timestamp NULL DEFAULT NULL,
  `post_update_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `post`
--

INSERT INTO `post` (`post_id`, `post_title`, `post_min_text`, `post_text`, `post_create_datetime`, `post_update_datetime`) VALUES
(72, 'Массовая драка в Москве: есть пострадавшие', '                                                          Словесный конфликт между группой граждан, который перерос в массовую драку, произошёл на северо-востоке российской столицы.                                                ', '                                                Инцидент случился рано утром 11 февраля в районе дома № 91 на проспекте Мира, передаёт «Москва».\r\n\r\nПо данным агентства городских новостей, которое ссылается на свои источники в правоохранительных органах, в результате случившегося 3 человека получили повреждения различной степени тяжести — все они обратились за помощью в одно из медицинских учреждений города.\r\n\r\nВ настоящее время полицейские устанавливают личности граждан, участвовавших в драке и скрывшихся с места происшествия\r\n\r\nПо факту инцидента проводится доследственная проверка, по результатам которой будет принято процессуальное решение.		        	    		        	    ', '2017-02-13 09:31:02', '2017-02-13 10:25:45'),
(73, ' На родине Адольфа Гитлера ищут его двойника', 'В Австрии разыскивают двойника Адольфа Гитлера. Об этом написали немецкие СМИ со ссылкой на полицию города Браунау-ам-Инне.', 'По сообщениям полицейских, на улицах родного города Гитлера прохожие заметили молодого человека, который одет и выглядит как диктатор. В последний раз его заметили в книжном магазине, читающим журналы о Второй мировой войне.\r\n\r\nТакже двойник фюрера появлялся у дома, где родился Адольф Гитлер и в баре, расположенном поблизости. Там мужчина представился как Харальд Гитлер.\r\n\r\nПолиция намерена привлечь мужчину к ответственности за прославление диктатора, пишет Газета.ру', '2017-02-13 09:33:13', '2017-02-13 09:33:13'),
(74, 'Суд признал Навального виновным по делу «Кировлеса»', 'Ленинский суд Кирова в среду начал выносить обвинительный приговор оппозиционеру Алексею Навальному по делу о хищении денег компании «Кировлес», передают РИА Новости.', 'Сейчас продолжается оглашение приговора. Позднее станет известно, согласился ли суд с решением прокуратуры об условном сроке оппозиционеру.\r\n\r\nОтмечается, что хотя речь о реальном сроке и не идет, Навальный пришел в суд с вещами, на случай, если его поместят в СИЗО, пишет Газета.ру.', '2017-02-13 09:34:51', '2017-02-13 09:34:51');

-- --------------------------------------------------------

--
-- Структура таблицы `post_to_tag`
--

CREATE TABLE `post_to_tag` (
  `post_to_tag_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) DEFAULT NULL,
  `tag_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `post_to_tag`
--

INSERT INTO `post_to_tag` (`post_to_tag_id`, `post_id`, `tag_id`) VALUES
(1000, 73, 104),
(1038, 73, 113),
(1039, 73, 114),
(1040, 73, 115),
(1041, 74, 116),
(1042, 74, 117),
(1043, 74, 118),
(1044, 74, 119),
(1050, 72, 110),
(1051, 72, 120),
(1052, 72, 121),
(1054, 75, 122);

-- --------------------------------------------------------

--
-- Структура таблицы `tag`
--

CREATE TABLE `tag` (
  `tag_id` bigint(20) UNSIGNED NOT NULL,
  `tag_title` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tag`
--

INSERT INTO `tag` (`tag_id`, `tag_title`) VALUES
(109, 'запись'),
(110, 'драка'),
(111, ' москва'),
(112, ' конфликт'),
(113, 'адольф'),
(114, ' гитлер'),
(115, ' двойник'),
(116, 'суд навального'),
(117, ' решение суда новального'),
(118, ' навальный'),
(119, ' кировлес'),
(120, ' пострадавшие в москве'),
(121, ' массовая драка');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comment`
--
ALTER TABLE `comment`
  ADD UNIQUE KEY `comment_id` (`comment_id`);

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD UNIQUE KEY `image_id` (`image_id`);

--
-- Индексы таблицы `login_admin`
--
ALTER TABLE `login_admin`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `post`
--
ALTER TABLE `post`
  ADD UNIQUE KEY `post_id` (`post_id`);

--
-- Индексы таблицы `post_to_tag`
--
ALTER TABLE `post_to_tag`
  ADD UNIQUE KEY `post_to_tag_id` (`post_to_tag_id`);

--
-- Индексы таблицы `tag`
--
ALTER TABLE `tag`
  ADD UNIQUE KEY `tag_id` (`tag_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `image_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT для таблицы `login_admin`
--
ALTER TABLE `login_admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `post`
--
ALTER TABLE `post`
  MODIFY `post_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT для таблицы `post_to_tag`
--
ALTER TABLE `post_to_tag`
  MODIFY `post_to_tag_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1055;
--
-- AUTO_INCREMENT для таблицы `tag`
--
ALTER TABLE `tag`
  MODIFY `tag_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
