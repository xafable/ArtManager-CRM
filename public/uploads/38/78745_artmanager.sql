-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 23 2021 г., 06:49
-- Версия сервера: 8.0.19
-- Версия PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `artmanager`
--

-- --------------------------------------------------------

--
-- Структура таблицы `attributes`
--

CREATE TABLE `attributes` (
  `id` bigint UNSIGNED NOT NULL,
  `work_object_id` int NOT NULL,
  `title_ru` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_eng` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `format` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `work_object_type_id` int NOT NULL,
  `type_field_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `attributes`
--

INSERT INTO `attributes` (`id`, `work_object_id`, `title_ru`, `title_eng`, `value`, `format`, `work_object_type_id`, `type_field_id`, `created_at`, `updated_at`) VALUES
(63, 30, 'ЭДРПУ', 'edrpu', '344', 'integer', 54, 28, '2021-06-02 13:06:44', '2021-06-02 13:06:56'),
(64, 30, 'Адрес', 'adres', 'Сталик', 'string', 54, 29, '2021-06-02 13:06:44', '2021-06-02 13:06:57'),
(65, 31, 'ЭДРПУ', 'edrpu', '1', 'integer', 54, 28, '2021-06-17 15:02:25', '2021-06-17 15:03:09'),
(66, 31, 'Адрес', 'adres', 'sdsss', 'string', 54, 29, '2021-06-17 15:02:25', '2021-06-24 06:51:49'),
(67, 31, 'c', 'c', '333', 'string', 54, 32, '2021-06-17 15:02:26', '2021-06-24 06:51:49'),
(68, 31, 'c', 'c', '5454', 'string', 54, 33, '2021-06-17 15:02:26', '2021-06-24 06:51:49'),
(69, 32, 'ЭДРПУ', 'edrpu', '', 'integer', 54, 28, '2021-06-25 06:53:58', '2021-06-25 06:53:58'),
(70, 32, 'Адрес', 'adres', '', 'string', 54, 29, '2021-06-25 06:53:58', '2021-06-25 06:53:58'),
(71, 32, 'c', 'c', '', 'string', 54, 32, '2021-06-25 06:53:58', '2021-06-25 06:53:58'),
(72, 32, 'c', 'c', '', 'string', 54, 33, '2021-06-25 06:53:58', '2021-06-25 06:53:58'),
(73, 33, 'ЭДРПУ', 'edrpu', '2188', 'integer', 54, 28, '2021-07-04 07:06:52', '2021-07-05 06:40:58'),
(74, 33, 'Адрес', 'adres', '121250', 'string', 54, 29, '2021-07-04 07:06:52', '2021-07-06 12:16:37'),
(75, 33, 'swith', 'swith', '1', 'boolean', 54, 32, '2021-07-04 07:06:52', '2021-07-04 08:10:26'),
(76, 33, 'c_dat', 'c-dat', '2021-07-22', 'date', 54, 33, '2021-07-04 07:06:52', '2021-07-05 07:10:11'),
(77, 34, 'ЭДРПУ', 'edrpu', '767', 'integer', 54, 28, '2021-07-06 12:50:30', '2021-07-06 12:51:26'),
(78, 34, 'Адрес', 'adres', 'yjyu', 'string', 54, 29, '2021-07-06 12:50:30', '2021-07-06 12:51:26'),
(79, 34, 'swith', 'swith', '1', 'boolean', 54, 32, '2021-07-06 12:50:30', '2021-07-06 12:51:27'),
(80, 34, 'c_dat', 'c-dat', '2021-07-06', 'date', 54, 33, '2021-07-06 12:50:30', '2021-07-06 12:51:27'),
(81, 35, 'ЭДРПУ', 'edrpu', '', 'integer', 54, 28, '2021-07-08 05:55:38', '2021-07-08 05:55:38'),
(82, 35, 'Адрес', 'adres', '', 'string', 54, 29, '2021-07-08 05:55:38', '2021-07-08 05:55:38'),
(83, 35, 'swith', 'swith', '', 'boolean', 54, 32, '2021-07-08 05:55:38', '2021-07-08 05:55:38'),
(84, 35, 'c_dat', 'c-dat', '', 'date', 54, 33, '2021-07-08 05:55:38', '2021-07-08 05:55:38');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` bigint UNSIGNED NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentable_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `comment`, `commentable_type`, `commentable_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '77', 'App\\Models\\WorkObject', 30, 6, '2021-06-24 06:45:53', '2021-06-24 06:45:53'),
(2, 'jj', 'App\\Models\\WorkObject', 30, 6, '2021-06-24 06:47:42', '2021-06-24 06:47:42'),
(3, 'vbvcb', 'App\\Models\\WorkObject', 30, 6, '2021-06-24 06:47:46', '2021-06-24 06:47:46'),
(4, '88', 'App\\Models\\Task', 1, NULL, '2021-06-25 08:38:19', '2021-06-25 08:38:19'),
(5, '6546', 'App\\Models\\Task', 1, NULL, '2021-06-25 08:38:24', '2021-06-25 08:38:24'),
(6, 'jghjgh', 'App\\Models\\Task', 2, NULL, '2021-07-04 08:23:13', '2021-07-04 08:23:13'),
(7, 'yyy', 'App\\Models\\WorkObject', 33, 6, '2021-07-05 06:46:21', '2021-07-05 06:46:21'),
(8, '666', 'App\\Models\\WorkObject', 33, 6, '2021-07-05 06:53:35', '2021-07-05 06:53:35'),
(9, '666', 'App\\Models\\WorkObject', 33, 6, '2021-07-05 06:58:49', '2021-07-05 06:58:49'),
(10, '666', 'App\\Models\\WorkObject', 33, 6, '2021-07-05 07:00:35', '2021-07-05 07:00:35'),
(11, '999', 'App\\Models\\WorkObject', 33, 6, '2021-07-05 07:02:07', '2021-07-05 07:02:07'),
(12, 'нгонг', 'App\\Models\\Task', 6, NULL, '2021-07-05 07:46:23', '2021-07-05 07:46:23'),
(13, 'ЬЬЬ', 'App\\Models\\WorkObject', 33, 6, '2021-07-06 12:17:01', '2021-07-06 12:17:01');

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `field_formats`
--

CREATE TABLE `field_formats` (
  `id` bigint UNSIGNED NOT NULL,
  `format` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `field_formats`
--

INSERT INTO `field_formats` (`id`, `format`, `title`, `created_at`, `updated_at`) VALUES
(1, 'string', 'Строка', NULL, NULL),
(2, 'integer', 'Целое число', NULL, NULL),
(3, 'boolean', 'Переключатель', NULL, NULL),
(4, 'date', 'Дата', NULL, NULL),
(5, 'float', 'Дробь', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `files`
--

CREATE TABLE `files` (
  `id` bigint UNSIGNED NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `work_object_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `extension` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `files`
--

INSERT INTO `files` (`id`, `type`, `url`, `work_object_id`, `created_at`, `updated_at`, `title`, `extension`) VALUES
(74, 'image', '/uploads33/71600_ifs_tech_class_error.png', 33, '2021-07-05 13:08:45', '2021-07-05 13:08:45', '71600_ifs_tech_class_error.png', 'png'),
(75, 'image', '/uploads/33/8976_1.png', 33, '2021-07-05 13:09:17', '2021-07-05 13:09:17', '8976_1.png', 'png');

-- --------------------------------------------------------

--
-- Структура таблицы `histories`
--

CREATE TABLE `histories` (
  `id` bigint UNSIGNED NOT NULL,
  `historyble_id` int NOT NULL,
  `historyble_type` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `old_value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `new_value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `action` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `histories`
--

INSERT INTO `histories` (`id`, `historyble_id`, `historyble_type`, `model_type`, `data_name`, `old_value`, `new_value`, `action`, `user_id`, `created_at`, `updated_at`) VALUES
(63, 33, 'App\\Models\\WorkObject', 'App\\Models\\WorkObject', 'description', '{\"id\":33,\"type_id\":54,\"description\":\"fgbfg\",\"status_id\":null,\"status_type_id\":2,\"user_id\":6,\"created_at\":\"2021-07-04T10:06:52.000000Z\",\"updated_at\":\"2021-07-04T10:34:39.000000Z\",\"title\":\"mark_2\"}', '{\"id\":33,\"type_id\":54,\"description\":\"fgbfgggggt\",\"status_id\":null,\"status_type_id\":2,\"user_id\":6,\"created_at\":\"2021-07-04T10:06:52.000000Z\",\"updated_at\":\"2021-07-05T09:40:58.000000Z\",\"title\":\"mark_2\"}', 'updated', 6, '2021-07-05 06:40:58', '2021-07-05 06:40:58'),
(64, 33, 'App\\Models\\WorkObject', 'App\\Models\\Attribute', 'edrpu', '{\"edrpu\":\"21\"}', '{\"edrpu\":\"2188\"}', 'updated', 6, '2021-07-05 06:40:59', '2021-07-05 06:40:59'),
(69, 33, 'App\\Models\\WorkObject', 'App\\Models\\Attribute', 'adres', '{\"adres\":\"1212\"}', '{\"adres\":\"12125\"}', 'updated', 6, '2021-07-05 07:10:11', '2021-07-05 07:10:11'),
(70, 33, 'App\\Models\\WorkObject', 'App\\Models\\Attribute', 'c-dat', '{\"c-dat\":\"2021-07-09\"}', '{\"c-dat\":\"2021-07-22\"}', 'updated', 6, '2021-07-05 07:10:11', '2021-07-05 07:10:11'),
(72, 33, 'App\\Models\\WorkObject', 'App\\Models\\Attribute', 'adres', '{\"adres\":\"12125\"}', '{\"adres\":\"121250\"}', 'updated', 6, '2021-07-06 12:16:37', '2021-07-06 12:16:37'),
(74, 34, 'App\\Models\\WorkObject', 'App\\Models\\WorkObject', 'description', '{\"id\":34,\"type_id\":54,\"description\":\"\",\"status_id\":1,\"status_type_id\":1,\"user_id\":6,\"created_at\":\"2021-07-06T15:50:30.000000Z\",\"updated_at\":\"2021-07-06T15:50:30.000000Z\",\"title\":\"vvv\"}', '{\"id\":34,\"type_id\":54,\"description\":null,\"status_id\":\"1\",\"status_type_id\":1,\"user_id\":6,\"created_at\":\"2021-07-06T15:50:30.000000Z\",\"updated_at\":\"2021-07-06T15:51:26.000000Z\",\"title\":\"vvv\"}', 'updated', 6, '2021-07-06 12:51:26', '2021-07-06 12:51:26'),
(75, 34, 'App\\Models\\WorkObject', 'App\\Models\\Attribute', 'edrpu', '{\"edrpu\":\"\"}', '{\"edrpu\":\"767\"}', 'updated', 6, '2021-07-06 12:51:26', '2021-07-06 12:51:26'),
(76, 34, 'App\\Models\\WorkObject', 'App\\Models\\Attribute', 'adres', '{\"adres\":\"\"}', '{\"adres\":\"yjyu\"}', 'updated', 6, '2021-07-06 12:51:27', '2021-07-06 12:51:27'),
(77, 34, 'App\\Models\\WorkObject', 'App\\Models\\Attribute', 'swith', '{\"swith\":\"\"}', '{\"swith\":\"1\"}', 'updated', 6, '2021-07-06 12:51:27', '2021-07-06 12:51:27'),
(78, 34, 'App\\Models\\WorkObject', 'App\\Models\\Attribute', 'c-dat', '{\"c-dat\":\"\"}', '{\"c-dat\":\"2021-07-06\"}', 'updated', 6, '2021-07-06 12:51:27', '2021-07-06 12:51:27'),
(79, 30, 'App\\Models\\WorkObject', 'App\\Models\\WorkObject', 'status_id', '{\"id\":30,\"type_id\":54,\"description\":\"\\u0430\\u043f\\u0440\\u0430\\u043f\\u0440\",\"status_id\":2,\"status_type_id\":1,\"user_id\":6,\"created_at\":\"2021-06-02T16:06:44.000000Z\",\"updated_at\":\"2021-07-04T11:22:51.000000Z\",\"title\":\"\\u043c\\u0430\\u0440\\u043a\\u0435\\u0442\",\"deleted\":0}', '{\"id\":30,\"type_id\":54,\"description\":\"\\u0430\\u043f\\u0440\\u0430\\u043f\\u0440\",\"status_id\":\"1\",\"status_type_id\":1,\"user_id\":6,\"created_at\":\"2021-06-02T16:06:44.000000Z\",\"updated_at\":\"2021-07-08T09:41:23.000000Z\",\"title\":\"\\u043c\\u0430\\u0440\\u043a\\u0435\\u0442\",\"deleted\":0}', 'updated', 6, '2021-07-08 06:41:23', '2021-07-08 06:41:23');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_04_18_110441_create_work_objects_table', 1),
(5, '2021_04_18_110709_create_attributes_table', 1),
(6, '2021_04_18_110747_create_work_object_types_table', 1),
(7, '2021_04_18_110814_create_type_settings_table', 1),
(8, '2021_04_18_110837_create_comments_table', 1),
(9, '2021_04_18_110950_create_type_fields_table', 1),
(10, '2021_04_19_120721_add_google_id_column', 2),
(11, '2021_04_20_132115_type_fields_add_work_object_type_id', 3),
(13, '2021_04_22_145513_create_field_types', 4),
(14, '2021_05_06_162743_create_histories_table', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `statuses`
--

CREATE TABLE `statuses` (
  `id` bigint UNSIGNED NOT NULL,
  `type_id` int NOT NULL,
  `status_id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `statuses`
--

INSERT INTO `statuses` (`id`, `type_id`, `status_id`, `title`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 'Новое', '2021-03-17 09:55:45', '2021-06-16 09:34:53'),
(2, 1, 1, 'В работе', '2021-03-17 09:55:50', '2021-06-16 09:34:53'),
(3, 1, 2, 'Выполнено', '2021-03-17 09:55:50', '2021-06-16 09:34:53'),
(4, 1, 3, 'В ожидании', '2021-03-17 09:55:50', '2021-06-16 09:34:53'),
(5, 1, 4, 'Отменено', '2021-03-17 09:55:50', '2021-06-16 09:34:53'),
(13, 1, 5, 'xz1', '2021-06-24 16:07:16', '2021-07-04 06:54:05');

-- --------------------------------------------------------

--
-- Структура таблицы `status_types`
--

CREATE TABLE `status_types` (
  `id` int NOT NULL,
  `title` varchar(250) NOT NULL,
  `user_id` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `status_types`
--

INSERT INTO `status_types` (`id`, `title`, `user_id`) VALUES
(1, 'Статус Рабочий Объект', ''),
(2, 'st1', '6'),
(3, 'Статусы_3', '6');

-- --------------------------------------------------------

--
-- Структура таблицы `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `priority` int NOT NULL,
  `status_id` int NOT NULL,
  `start_date` datetime DEFAULT NULL,
  `finish_date` datetime DEFAULT NULL,
  `work_object_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `description`, `created_at`, `updated_at`, `priority`, `status_id`, `start_date`, `finish_date`, `work_object_id`) VALUES
(1, 'w2222', 'afdsaf', '2021-06-25 08:51:42', '2021-06-25 09:05:14', 1, 1, '2021-06-01 00:00:00', '2021-06-17 00:00:00', 30),
(2, 'q123', 'gjgh', '2021-06-25 06:22:59', '2021-07-04 08:23:13', 1, 1, '2021-07-14 00:00:00', '2021-07-09 00:00:00', 30),
(3, '111', ' ', '2021-06-25 06:50:41', '2021-06-25 06:50:41', 1, 1, NULL, NULL, 30),
(4, '666', ' ', '2021-06-25 06:52:48', '2021-06-25 06:52:48', 1, 1, NULL, NULL, 30),
(5, '77y', ' ', '2021-06-25 06:53:43', '2021-06-25 06:53:43', 1, 1, NULL, NULL, 30),
(6, 'OPO_ROS', 'гнонг', '2021-07-05 07:46:08', '2021-07-05 07:46:30', 1, 3, '2021-07-08 00:00:00', '2021-07-21 00:00:00', 33);

-- --------------------------------------------------------

--
-- Структура таблицы `task_statuses`
--

CREATE TABLE `task_statuses` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `task_statuses`
--

INSERT INTO `task_statuses` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Новое', '2021-03-17 09:55:45', '2021-03-17 09:55:47'),
(2, 'В работе', '2021-03-17 09:55:50', '2021-03-17 09:55:50'),
(3, 'Выполнено', '2021-03-17 09:55:50', '2021-03-17 09:55:50'),
(4, 'В ожидании', '2021-03-17 09:55:50', '2021-03-17 09:55:50'),
(5, 'Отменено', '2021-03-17 09:55:50', '2021-03-17 09:55:50');

-- --------------------------------------------------------

--
-- Структура таблицы `type_fields`
--

CREATE TABLE `type_fields` (
  `id` bigint UNSIGNED NOT NULL,
  `title_eng` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_ru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `format_id` int NOT NULL,
  `required` tinyint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `work_object_type_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `type_fields`
--

INSERT INTO `type_fields` (`id`, `title_eng`, `title_ru`, `format_id`, `required`, `created_at`, `updated_at`, `work_object_type_id`) VALUES
(28, 'edrpu', 'ЭДРПУ', 2, 0, '2021-06-02 13:05:09', '2021-06-02 13:06:28', '54'),
(29, 'adres', 'Адрес', 1, 1, '2021-06-02 13:06:28', '2021-06-17 15:44:40', '54'),
(30, 't1', 't1', 1, 0, '2021-06-02 13:24:58', '2021-06-02 13:24:58', '56'),
(31, 't2', 't2', 1, 1, '2021-06-02 13:24:58', '2021-06-02 13:24:58', '56'),
(32, 'swith', 'swith', 3, 0, '2021-06-16 09:47:13', '2021-07-04 07:06:39', '54'),
(33, 'c-dat', 'c_dat', 4, 1, '2021-06-16 09:47:24', '2021-07-04 07:06:30', '54');

-- --------------------------------------------------------

--
-- Структура таблицы `type_settings`
--

CREATE TABLE `type_settings` (
  `id` bigint UNSIGNED NOT NULL,
  `work_object_type_id` int NOT NULL,
  `status_type_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `type_settings`
--

INSERT INTO `type_settings` (`id`, `work_object_type_id`, `status_type_id`, `created_at`, `updated_at`) VALUES
(2, 54, 1, '2021-06-17 17:51:22', '2021-07-08 04:54:56');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `google_id`, `fio`, `role`, `avatar`) VALUES
(6, '111314692680120606412', 'xafable55@gmail.com', NULL, '$2y$10$i64L1cOCTeDF1YbpcgYZvegCKEXAOHmP7TLM9HzGXR1UzC4gHkmMm', 'r7rbt9llj1M5ElDep9LZ3s6uA8TFgo2ACq7yO2ZvtKwOsh3erzkROViCzdDY', '2021-04-19 17:12:57', '2021-04-19 17:12:57', '111314692680120606412', 'Олег Рахубовский', NULL, 'https://lh3.googleusercontent.com/a-/AOh14Gh1gnoHAR_x02Qphel5VI1u4R4AAW8y9NV7YvYe0g=s96-c');

-- --------------------------------------------------------

--
-- Структура таблицы `work_objects`
--

CREATE TABLE `work_objects` (
  `id` bigint UNSIGNED NOT NULL,
  `type_id` int NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_id` int DEFAULT '1',
  `status_type_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted` tinyint NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `work_objects`
--

INSERT INTO `work_objects` (`id`, `type_id`, `description`, `status_id`, `status_type_id`, `user_id`, `created_at`, `updated_at`, `title`, `deleted`) VALUES
(30, 54, 'апрапр', 1, 1, 6, '2021-06-02 13:06:44', '2021-07-08 06:41:23', 'маркет', 0),
(31, 54, 'bfdbgfb', 0, 1, 6, '2021-06-17 15:02:25', '2021-06-24 06:51:49', 'маркет2', 0),
(32, 54, '', 1, 2, 6, '2021-06-25 06:53:58', '2021-06-25 06:53:58', '67', 0),
(33, 54, 'fgbfgggggt', 1, 2, 6, '2021-07-04 07:06:52', '2021-07-08 06:31:44', 'mark_2', 1),
(34, 54, NULL, 1, 1, 6, '2021-07-06 12:50:30', '2021-07-06 12:51:26', 'vvv', 0),
(35, 54, '', 1, 1, 6, '2021-07-08 05:55:38', '2021-07-08 05:55:38', 'bb', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `work_object_types`
--

CREATE TABLE `work_object_types` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `work_object_types`
--

INSERT INTO `work_object_types` (`id`, `title`, `user_id`, `created_at`, `updated_at`) VALUES
(54, 'Рабочие объект', 6, '2021-06-02 12:43:49', '2021-06-02 12:43:49'),
(55, 'объект2', 6, '2021-06-02 13:14:15', '2021-06-02 13:14:15'),
(56, 'объект3', 6, '2021-06-02 13:24:02', '2021-06-02 13:24:02');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `field_formats`
--
ALTER TABLE `field_formats`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `histories`
--
ALTER TABLE `histories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `status_types`
--
ALTER TABLE `status_types`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `task_statuses`
--
ALTER TABLE `task_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `type_fields`
--
ALTER TABLE `type_fields`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `type_settings`
--
ALTER TABLE `type_settings`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Индексы таблицы `work_objects`
--
ALTER TABLE `work_objects`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `work_object_types`
--
ALTER TABLE `work_object_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `field_formats`
--
ALTER TABLE `field_formats`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `files`
--
ALTER TABLE `files`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT для таблицы `histories`
--
ALTER TABLE `histories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `status_types`
--
ALTER TABLE `status_types`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `task_statuses`
--
ALTER TABLE `task_statuses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `type_fields`
--
ALTER TABLE `type_fields`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT для таблицы `type_settings`
--
ALTER TABLE `type_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `work_objects`
--
ALTER TABLE `work_objects`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT для таблицы `work_object_types`
--
ALTER TABLE `work_object_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
