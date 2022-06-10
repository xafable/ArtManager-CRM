-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 10, 2021 at 02:58 PM
-- Server version: 8.0.24
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `artmanager`
--

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` bigint UNSIGNED NOT NULL,
  `work_object_id` int NOT NULL,
  `title_ru` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_eng` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `format` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `work_object_type_id` int NOT NULL,
  `type_field_id` int NOT NULL,
  `enumeration_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `work_object_id`, `title_ru`, `title_eng`, `value`, `format`, `work_object_type_id`, `type_field_id`, `enumeration_id`, `created_at`, `updated_at`) VALUES
(169, 57, 'Координаты', 'koordinaty', '123.54444', 'string', 61, 62, NULL, '2021-09-24 08:14:26', '2021-09-24 08:14:54'),
(170, 57, 'Город', 'gorod', 'Комсомольск', 'enum', 61, 63, 1, '2021-09-24 08:14:26', '2021-09-24 09:20:37'),
(171, 57, 'Пожарка', 'pozarka', '1', 'boolean', 61, 56, NULL, '2021-09-24 08:14:26', '2021-09-24 10:00:11'),
(172, 57, 'Дата регистрации', 'data-regestracii', '2021-09-10', 'date', 61, 64, NULL, '2021-09-24 08:14:26', '2021-09-24 08:14:54'),
(173, 58, 'Координаты', 'koordinaty', '45700.333.1', 'string', 61, 62, NULL, '2021-09-24 10:00:43', '2021-09-24 10:01:02'),
(174, 58, 'Город', 'gorod', 'Полтава', 'enum', 61, 63, 1, '2021-09-24 10:00:43', '2021-09-24 10:01:02'),
(175, 58, 'Пожарка', 'pozarka', '1', 'boolean', 61, 56, NULL, '2021-09-24 10:00:43', '2021-09-24 10:09:02'),
(176, 58, 'Дата регистрации', 'data-regestracii', '2021-10-10', 'date', 61, 64, NULL, '2021-09-24 10:00:43', '2021-09-24 10:01:02'),
(177, 59, 'Прибор', 'pribor', 'Тирас Прайм', 'enum', 63, 66, 5, '2021-09-24 17:58:15', '2021-09-24 17:58:45'),
(178, 59, 'Дата добавления', 'data-dobavleniya', '2021-09-24', 'date', 63, 67, NULL, '2021-09-24 17:58:15', '2021-09-24 17:58:45'),
(179, 59, 'Пожарка', 'pozarka', '1', 'boolean', 63, 56, NULL, '2021-09-24 17:58:15', '2021-09-24 17:58:45'),
(180, 60, 'Прибор', 'pribor', 'Варта Адрес', 'enum', 63, 66, 5, '2021-09-24 18:18:57', '2021-09-24 18:19:15'),
(181, 60, 'Дата добавления', 'data-dobavleniya', '2021-09-24', 'date', 63, 67, NULL, '2021-09-24 18:18:57', '2021-09-24 18:19:15'),
(182, 60, 'Пожарка', 'pozarka', '1', 'boolean', 63, 56, NULL, '2021-09-24 18:18:57', '2021-09-24 18:19:15');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint UNSIGNED NOT NULL,
  `comment` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentable_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `commentable_type`, `commentable_id`, `user_id`, `created_at`, `updated_at`) VALUES
(17, 'ff', 'App\\Models\\WorkObject', 45, 7, '2021-08-11 08:09:15', '2021-08-11 08:09:15'),
(18, 'ывы', 'App\\Models\\WorkObject', 46, 7, '2021-08-12 08:34:37', '2021-08-12 08:34:37'),
(19, 'Dehej', 'App\\Models\\WorkObject', 57, 6, '2021-09-24 09:23:11', '2021-09-24 09:23:11'),
(20, 'Hehehddh', 'App\\Models\\WorkObject', 59, 6, '2021-09-24 17:58:53', '2021-09-24 17:58:53');

-- --------------------------------------------------------

--
-- Table structure for table `enumerations`
--

CREATE TABLE `enumerations` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enumerations`
--

INSERT INTO `enumerations` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Города', NULL, NULL),
(2, 'Районы', NULL, NULL),
(5, 'Приборы', '2021-09-24 17:49:20', '2021-09-24 17:49:20');

-- --------------------------------------------------------

--
-- Table structure for table `enumeration_data`
--

CREATE TABLE `enumeration_data` (
  `id` bigint UNSIGNED NOT NULL,
  `enumeration_id` int NOT NULL,
  `value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enumeration_data`
--

INSERT INTO `enumeration_data` (`id`, `enumeration_id`, `value`, `created_at`, `updated_at`) VALUES
(1, 1, 'Кременчуг', NULL, '2021-09-24 08:12:03'),
(2, 1, 'Комсомольск', NULL, '2021-09-24 08:12:03'),
(3, 2, 'Автозаводской', NULL, '2021-09-24 08:12:20'),
(4, 1, 'Полтава', '2021-09-17 09:14:47', '2021-09-24 08:12:03'),
(5, 3, 'Кременчуг', '2021-09-17 09:45:33', '2021-09-17 09:45:33'),
(6, 3, 'Комс', '2021-09-17 09:45:33', '2021-09-17 09:45:33'),
(7, 4, 'a1', '2021-09-17 10:41:56', '2021-09-17 10:41:56'),
(8, 4, 'a2', '2021-09-17 10:41:56', '2021-09-17 10:41:56'),
(9, 2, 'Крюковский', '2021-09-24 08:12:20', '2021-09-24 08:12:20'),
(10, 5, 'Тирас', '2021-09-24 17:50:47', '2021-09-24 17:50:47'),
(11, 5, 'Тирас А', '2021-09-24 17:50:47', '2021-09-24 17:50:47'),
(12, 5, 'Тирас Прайм', '2021-09-24 17:50:47', '2021-09-24 17:50:47'),
(13, 5, 'Варта', '2021-09-24 17:50:47', '2021-09-24 17:50:47'),
(14, 5, 'Варта Адрес', '2021-09-24 17:50:47', '2021-09-24 17:50:47'),
(15, 5, 'Лунь', '2021-09-24 17:51:16', '2021-09-24 17:51:16');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `field_formats`
--

CREATE TABLE `field_formats` (
  `id` bigint UNSIGNED NOT NULL,
  `format` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `field_formats`
--

INSERT INTO `field_formats` (`id`, `format`, `title`, `created_at`, `updated_at`) VALUES
(1, 'string', 'Строка', NULL, NULL),
(2, 'integer', 'Целое число', NULL, NULL),
(3, 'boolean', 'Переключатель', NULL, NULL),
(4, 'date', 'Дата', NULL, NULL),
(5, 'float', 'Дробь', NULL, NULL),
(7, 'enum', 'Перечисление', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `files`
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
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `type`, `url`, `work_object_id`, `created_at`, `updated_at`, `title`, `extension`) VALUES
(74, 'image', '/uploads33/71600_ifs_tech_class_error.png', 33, '2021-07-05 13:08:45', '2021-07-05 13:08:45', '71600_ifs_tech_class_error.png', 'png'),
(75, 'image', '/uploads/33/8976_1.png', 33, '2021-07-05 13:09:17', '2021-07-05 13:09:17', '8976_1.png', 'png'),
(76, 'image', '/uploads/31/41323_555.png', 31, '2021-07-27 10:22:42', '2021-07-27 10:22:42', '41323_555.png', 'png'),
(77, 'image', '/uploads/35/54725_54545.png', 35, '2021-07-28 10:41:10', '2021-07-28 10:41:10', '54725_54545.png', 'png'),
(78, 'image', '/uploads/38/78745_artmanager.sql', 38, '2021-08-04 10:52:02', '2021-08-04 10:52:02', '78745_artmanager.sql', 'sql'),
(79, 'image', '/uploads/38/13273_555.png', 38, '2021-08-04 10:52:52', '2021-08-04 10:52:52', '13273_555.png', 'png'),
(80, 'image', '/uploads/38/89026_2222222.png', 38, '2021-08-04 10:53:31', '2021-08-04 10:53:31', '89026_2222222.png', 'png'),
(81, 'image', '/uploads/39/64320_gruppmo.jpg', 39, '2021-08-04 10:54:10', '2021-08-04 10:54:10', '64320_gruppmo.jpg', 'jpg'),
(82, 'image', '/uploads/45/73048_54545.png', 45, '2021-08-11 08:09:26', '2021-08-11 08:09:26', '73048_54545.png', 'png'),
(83, 'image', '/uploads/56/80605_IMG_20210918_105026.jpg', 56, '2021-09-18 14:59:24', '2021-09-18 14:59:24', '80605_IMG_20210918_105026.jpg', 'jpg'),
(84, 'image', '/uploads/57/91692_IMG_20210810_185308.jpg', 57, '2021-09-24 09:24:22', '2021-09-24 09:24:22', '91692_IMG_20210810_185308.jpg', 'jpg'),
(85, 'image', '/uploads/57/62841_16325163607698674100412369666075.jpg', 57, '2021-09-24 17:46:13', '2021-09-24 17:46:13', '62841_16325163607698674100412369666075.jpg', 'jpg'),
(86, 'image', '/uploads/60/92062_IMG_20210924_214441.jpg', 60, '2021-09-24 19:24:39', '2021-09-24 19:24:39', '92062_IMG_20210924_214441.jpg', 'jpg'),
(87, 'image', '/uploads/60/40340_IMG_20210924_214441.jpg', 60, '2021-09-24 19:26:01', '2021-09-24 19:26:01', '40340_IMG_20210924_214441.jpg', 'jpg');

-- --------------------------------------------------------

--
-- Table structure for table `histories`
--

CREATE TABLE `histories` (
  `id` bigint UNSIGNED NOT NULL,
  `historyble_id` int NOT NULL,
  `historyble_type` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `old_value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `new_value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `action` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `histories`
--

INSERT INTO `histories` (`id`, `historyble_id`, `historyble_type`, `model_type`, `data_name`, `old_value`, `new_value`, `action`, `user_id`, `created_at`, `updated_at`) VALUES
(144, 43, 'App\\Models\\WorkObject', 'App\\Models\\WorkObject', 'description', '{\"id\":43,\"type_id\":59,\"description\":\"\",\"status_id\":1,\"status_type_id\":1,\"user_id\":7,\"created_at\":\"2021-08-11T10:21:44.000000Z\",\"updated_at\":\"2021-08-11T10:21:44.000000Z\",\"deleted_at\":null,\"title\":\"a1_m1\",\"deleted\":0}', '{\"id\":43,\"type_id\":59,\"description\":null,\"status_id\":\"3\",\"status_type_id\":1,\"user_id\":7,\"created_at\":\"2021-08-11T10:21:44.000000Z\",\"updated_at\":\"2021-08-11T10:23:38.000000Z\",\"deleted_at\":null,\"title\":\"a1_m1\",\"deleted\":0}', 'updated', 7, '2021-08-11 07:23:38', '2021-08-11 07:23:38'),
(145, 43, 'App\\Models\\WorkObject', 'App\\Models\\WorkObject', 'status_id', '{\"id\":43,\"type_id\":59,\"description\":\"\",\"status_id\":1,\"status_type_id\":1,\"user_id\":7,\"created_at\":\"2021-08-11T10:21:44.000000Z\",\"updated_at\":\"2021-08-11T10:21:44.000000Z\",\"deleted_at\":null,\"title\":\"a1_m1\",\"deleted\":0}', '{\"id\":43,\"type_id\":59,\"description\":null,\"status_id\":\"3\",\"status_type_id\":1,\"user_id\":7,\"created_at\":\"2021-08-11T10:21:44.000000Z\",\"updated_at\":\"2021-08-11T10:23:38.000000Z\",\"deleted_at\":null,\"title\":\"a1_m1\",\"deleted\":0}', 'updated', 7, '2021-08-11 07:23:38', '2021-08-11 07:23:38'),
(146, 43, 'App\\Models\\WorkObject', 'App\\Models\\Attribute', 'koordin2', '{\"koordin2\":\"\"}', '{\"koordin2\":\"23.01\"}', 'updated', 7, '2021-08-11 07:23:38', '2021-08-11 07:23:38'),
(147, 43, 'App\\Models\\WorkObject', 'App\\Models\\Attribute', 'data3', '{\"data3\":\"\"}', '{\"data3\":\"2021-08-11\"}', 'updated', 7, '2021-08-11 07:23:38', '2021-08-11 07:23:38'),
(148, 43, 'App\\Models\\WorkObject', 'App\\Models\\Attribute', 'po', '{\"po\":\"\"}', '{\"po\":\"2021-08-27\"}', 'updated', 7, '2021-08-11 07:23:38', '2021-08-11 07:23:38'),
(149, 44, 'App\\Models\\WorkObject', 'App\\Models\\WorkObject', 'description', '{\"id\":44,\"type_id\":60,\"description\":\"\",\"status_id\":1,\"status_type_id\":1,\"user_id\":7,\"created_at\":\"2021-08-11T10:24:12.000000Z\",\"updated_at\":\"2021-08-11T10:24:12.000000Z\",\"deleted_at\":null,\"title\":\"b1_m2\",\"deleted\":0}', '{\"id\":44,\"type_id\":60,\"description\":null,\"status_id\":\"1\",\"status_type_id\":1,\"user_id\":7,\"created_at\":\"2021-08-11T10:24:12.000000Z\",\"updated_at\":\"2021-08-11T10:24:21.000000Z\",\"deleted_at\":null,\"title\":\"b1_m2\",\"deleted\":0}', 'updated', 7, '2021-08-11 07:24:21', '2021-08-11 07:24:21'),
(150, 44, 'App\\Models\\WorkObject', 'App\\Models\\Attribute', 'data3', '{\"data3\":\"\"}', '{\"data3\":\"2021-09-25\"}', 'updated', 7, '2021-08-11 07:24:21', '2021-08-11 07:24:21'),
(151, 43, 'App\\Models\\WorkObject', 'App\\Models\\WorkObject', 'description', '{\"id\":43,\"type_id\":59,\"description\":null,\"status_id\":3,\"status_type_id\":1,\"user_id\":7,\"created_at\":\"2021-08-11T10:21:44.000000Z\",\"updated_at\":\"2021-08-11T10:23:38.000000Z\",\"deleted_at\":null,\"title\":\"a1_m1\",\"deleted\":0}', '{\"id\":43,\"type_id\":59,\"description\":\"88\",\"status_id\":\"3\",\"status_type_id\":1,\"user_id\":7,\"created_at\":\"2021-08-11T10:21:44.000000Z\",\"updated_at\":\"2021-08-11T10:25:52.000000Z\",\"deleted_at\":null,\"title\":\"a1_m1\",\"deleted\":0}', 'updated', 7, '2021-08-11 07:25:52', '2021-08-11 07:25:52'),
(152, 43, 'App\\Models\\WorkObject', 'App\\Models\\WorkObject', 'description', '{\"id\":43,\"type_id\":59,\"description\":\"88\",\"status_id\":3,\"status_type_id\":1,\"user_id\":7,\"created_at\":\"2021-08-11T10:21:44.000000Z\",\"updated_at\":\"2021-08-11T10:25:52.000000Z\",\"deleted_at\":null,\"title\":\"a1_m1\",\"deleted\":0}', '{\"id\":43,\"type_id\":59,\"description\":\"887\",\"status_id\":\"3\",\"status_type_id\":1,\"user_id\":7,\"created_at\":\"2021-08-11T10:21:44.000000Z\",\"updated_at\":\"2021-08-11T10:26:42.000000Z\",\"deleted_at\":null,\"title\":\"a1_m1\",\"deleted\":0}', 'updated', 7, '2021-08-11 07:26:42', '2021-08-11 07:26:42'),
(153, 43, 'App\\Models\\WorkObject', 'App\\Models\\Attribute', 'koordin2', '{\"koordin2\":\"23.01\"}', '{\"koordin2\":null}', 'updated', 7, '2021-08-11 08:06:44', '2021-08-11 08:06:44'),
(154, 43, 'App\\Models\\WorkObject', 'App\\Models\\Attribute', 'koordin2', '{\"koordin2\":null}', '{\"koordin2\":\"55\"}', 'updated', 7, '2021-08-11 08:06:47', '2021-08-11 08:06:47'),
(155, 45, 'App\\Models\\WorkObject', 'App\\Models\\WorkObject', 'description', '{\"id\":45,\"type_id\":60,\"description\":\"\",\"status_id\":1,\"status_type_id\":1,\"user_id\":7,\"created_at\":\"2021-08-11T11:08:40.000000Z\",\"updated_at\":\"2021-08-11T11:08:40.000000Z\",\"deleted_at\":null,\"title\":\"b2_m2\",\"deleted\":0}', '{\"id\":45,\"type_id\":60,\"description\":null,\"status_id\":\"2\",\"status_type_id\":1,\"user_id\":7,\"created_at\":\"2021-08-11T11:08:40.000000Z\",\"updated_at\":\"2021-08-11T11:09:03.000000Z\",\"deleted_at\":null,\"title\":\"b2_m2\",\"deleted\":0}', 'updated', 7, '2021-08-11 08:09:03', '2021-08-11 08:09:03'),
(156, 45, 'App\\Models\\WorkObject', 'App\\Models\\WorkObject', 'status_id', '{\"id\":45,\"type_id\":60,\"description\":\"\",\"status_id\":1,\"status_type_id\":1,\"user_id\":7,\"created_at\":\"2021-08-11T11:08:40.000000Z\",\"updated_at\":\"2021-08-11T11:08:40.000000Z\",\"deleted_at\":null,\"title\":\"b2_m2\",\"deleted\":0}', '{\"id\":45,\"type_id\":60,\"description\":null,\"status_id\":\"2\",\"status_type_id\":1,\"user_id\":7,\"created_at\":\"2021-08-11T11:08:40.000000Z\",\"updated_at\":\"2021-08-11T11:09:03.000000Z\",\"deleted_at\":null,\"title\":\"b2_m2\",\"deleted\":0}', 'updated', 7, '2021-08-11 08:09:03', '2021-08-11 08:09:03'),
(157, 45, 'App\\Models\\WorkObject', 'App\\Models\\Attribute', 'data3', '{\"data3\":\"\"}', '{\"data3\":\"2021-08-11\"}', 'updated', 7, '2021-08-11 08:09:03', '2021-08-11 08:09:03'),
(158, 45, 'App\\Models\\WorkObject', 'App\\Models\\Comment', 'comment', '', '{\"comment\":\"ff\",\"user_id\":7,\"commentable_id\":45,\"commentable_type\":\"App\\\\Models\\\\WorkObject\",\"updated_at\":\"2021-08-11T11:09:15.000000Z\",\"created_at\":\"2021-08-11T11:09:15.000000Z\",\"id\":17}', 'created', 7, '2021-08-11 08:09:15', '2021-08-11 08:09:15'),
(159, 45, 'App\\Models\\WorkObject', 'App\\Models\\File', 'file', '', '{\"type\":\"image\",\"work_object_id\":\"45\",\"url\":\"\\/uploads\\/45\\/73048_54545.png\",\"title\":\"73048_54545.png\",\"extension\":\"png\",\"updated_at\":\"2021-08-11T11:09:26.000000Z\",\"created_at\":\"2021-08-11T11:09:26.000000Z\",\"id\":82}', 'created', 7, '2021-08-11 08:09:26', '2021-08-11 08:09:26'),
(160, 46, 'App\\Models\\WorkObject', 'App\\Models\\WorkObject', 'description', '{\"id\":46,\"type_id\":59,\"description\":\"\",\"status_id\":1,\"status_type_id\":1,\"user_id\":7,\"created_at\":\"2021-08-12T07:28:11.000000Z\",\"updated_at\":\"2021-08-12T07:28:11.000000Z\",\"deleted_at\":null,\"title\":\"a2_m1\",\"deleted\":0}', '{\"id\":46,\"type_id\":59,\"description\":null,\"status_id\":\"1\",\"status_type_id\":1,\"user_id\":7,\"created_at\":\"2021-08-12T07:28:11.000000Z\",\"updated_at\":\"2021-08-12T07:28:16.000000Z\",\"deleted_at\":null,\"title\":\"a2_m1\",\"deleted\":0}', 'updated', 7, '2021-08-12 04:28:16', '2021-08-12 04:28:16'),
(161, 46, 'App\\Models\\WorkObject', 'App\\Models\\Attribute', 'koordin2', '{\"koordin2\":\"\"}', '{\"koordin2\":\"231321\"}', 'updated', 7, '2021-08-12 04:28:16', '2021-08-12 04:28:16'),
(162, 46, 'App\\Models\\WorkObject', 'App\\Models\\Attribute', 'data3', '{\"data3\":\"\"}', '{\"data3\":\"2021-08-12\"}', 'updated', 7, '2021-08-12 04:28:16', '2021-08-12 04:28:16'),
(163, 46, 'App\\Models\\WorkObject', 'App\\Models\\Attribute', 'po', '{\"po\":\"\"}', '{\"po\":\"2021-08-12\"}', 'updated', 7, '2021-08-12 04:28:16', '2021-08-12 04:28:16'),
(164, 46, 'App\\Models\\WorkObject', 'App\\Models\\Attribute', 'pozarka', '{\"pozarka\":\"\"}', '{\"pozarka\":\"1\"}', 'updated', 7, '2021-08-12 04:28:16', '2021-08-12 04:28:16'),
(165, 43, 'App\\Models\\WorkObject', 'App\\Models\\WorkObject', 'status_id', '{\"id\":43,\"type_id\":59,\"description\":\"887\",\"status_id\":3,\"status_type_id\":1,\"user_id\":7,\"created_at\":\"2021-08-11T10:21:44.000000Z\",\"updated_at\":\"2021-08-11T10:26:42.000000Z\",\"deleted_at\":null,\"title\":\"a1_m1\",\"deleted\":0}', '{\"id\":43,\"type_id\":59,\"description\":\"887\",\"status_id\":\"6\",\"status_type_id\":1,\"user_id\":7,\"created_at\":\"2021-08-11T10:21:44.000000Z\",\"updated_at\":\"2021-08-12T10:40:41.000000Z\",\"deleted_at\":null,\"title\":\"a1_m1\",\"deleted\":0}', 'updated', 7, '2021-08-12 07:40:41', '2021-08-12 07:40:41'),
(166, 46, 'App\\Models\\WorkObject', 'App\\Models\\Comment', 'comment', '', '{\"comment\":\"\\u044b\\u0432\\u044b\",\"user_id\":7,\"commentable_id\":46,\"commentable_type\":\"App\\\\Models\\\\WorkObject\",\"updated_at\":\"2021-08-12T11:34:37.000000Z\",\"created_at\":\"2021-08-12T11:34:37.000000Z\",\"id\":18}', 'created', 7, '2021-08-12 08:34:37', '2021-08-12 08:34:37'),
(167, 43, 'App\\Models\\WorkObject', 'App\\Models\\Attribute', 'koordin2', '{\"koordin2\":\"55\"}', '{\"koordin2\":\"555\"}', 'updated', 7, '2021-08-13 07:50:13', '2021-08-13 07:50:13'),
(168, 53, 'App\\Models\\WorkObject', 'App\\Models\\WorkObject', 'description', '{\"id\":53,\"type_id\":59,\"description\":\"\",\"status_id\":1,\"status_type_id\":1,\"user_id\":7,\"created_at\":\"2021-09-13T13:42:02.000000Z\",\"updated_at\":\"2021-09-13T13:42:02.000000Z\",\"deleted_at\":null,\"title\":\"0_3\",\"deleted\":0}', '{\"id\":53,\"type_id\":59,\"description\":\"fghgf\",\"status_id\":\"1\",\"status_type_id\":1,\"user_id\":7,\"created_at\":\"2021-09-13T13:42:02.000000Z\",\"updated_at\":\"2021-09-13T13:42:17.000000Z\",\"deleted_at\":null,\"title\":\"0_3\",\"deleted\":0}', 'updated', 7, '2021-09-13 10:42:17', '2021-09-13 10:42:17'),
(169, 53, 'App\\Models\\WorkObject', 'App\\Models\\Attribute', 'date', '{\"date\":\"\"}', '{\"date\":\"2021-09-13\"}', 'updated', 7, '2021-09-13 10:42:18', '2021-09-13 10:42:18'),
(170, 53, 'App\\Models\\WorkObject', 'App\\Models\\Attribute', 'switch', '{\"switch\":\"\"}', '{\"switch\":\"0\"}', 'updated', 7, '2021-09-13 10:42:18', '2021-09-13 10:42:18'),
(171, 53, 'App\\Models\\WorkObject', 'App\\Models\\Attribute', 'm1', '{\"m1\":\"\"}', '{\"m1\":\"1111111111\"}', 'updated', 7, '2021-09-13 10:42:18', '2021-09-13 10:42:18'),
(172, 53, 'App\\Models\\WorkObject', 'App\\Models\\Attribute', 'm2', '{\"m2\":\"\"}', '{\"m2\":\"43\"}', 'updated', 7, '2021-09-13 10:42:18', '2021-09-13 10:42:18'),
(173, 53, 'App\\Models\\WorkObject', 'App\\Models\\Attribute', 'm2', '{\"m2\":\"\"}', '{\"m2\":\"55\"}', 'updated', 7, '2021-09-13 10:42:18', '2021-09-13 10:42:18'),
(174, 53, 'App\\Models\\WorkObject', 'App\\Models\\Attribute', 'm2', '{\"m2\":\"\"}', '{\"m2\":\"11\"}', 'updated', 7, '2021-09-13 10:42:18', '2021-09-13 10:42:18'),
(175, 56, 'App\\Models\\WorkObject', 'App\\Models\\WorkObject', 'description', '{\"id\":56,\"type_id\":59,\"description\":\"\",\"status_id\":1,\"status_type_id\":1,\"user_id\":7,\"created_at\":\"2021-09-15T07:49:32.000000Z\",\"updated_at\":\"2021-09-15T07:49:32.000000Z\",\"deleted_at\":null,\"title\":\"enr33\",\"deleted\":0}', '{\"id\":56,\"type_id\":59,\"description\":\"33\",\"status_id\":\"1\",\"status_type_id\":1,\"user_id\":7,\"created_at\":\"2021-09-15T07:49:32.000000Z\",\"updated_at\":\"2021-09-15T07:57:14.000000Z\",\"deleted_at\":null,\"title\":\"enr33\",\"deleted\":0}', 'updated', 7, '2021-09-15 04:57:14', '2021-09-15 04:57:14'),
(176, 56, 'App\\Models\\WorkObject', 'App\\Models\\Attribute', 'date', '{\"date\":\"\"}', '{\"date\":\"2021-09-15\"}', 'updated', 7, '2021-09-15 04:57:14', '2021-09-15 04:57:14'),
(177, 56, 'App\\Models\\WorkObject', 'App\\Models\\Attribute', 'switch', '{\"switch\":\"\"}', '{\"switch\":\"0\"}', 'updated', 7, '2021-09-15 04:57:14', '2021-09-15 04:57:14'),
(178, 56, 'App\\Models\\WorkObject', 'App\\Models\\Attribute', 'switch', '{\"switch\":\"\"}', '{\"switch\":\"0\"}', 'updated', 7, '2021-09-15 04:57:14', '2021-09-15 04:57:14'),
(179, 56, 'App\\Models\\WorkObject', 'App\\Models\\Attribute', 'switch', '{\"switch\":\"\"}', '{\"switch\":\"1\"}', 'updated', 7, '2021-09-15 04:57:14', '2021-09-15 04:57:14'),
(180, 56, 'App\\Models\\WorkObject', 'App\\Models\\Attribute', 'm1', '{\"m1\":\"\"}', '{\"m1\":null}', 'updated', 7, '2021-09-15 04:57:14', '2021-09-15 04:57:14'),
(181, 56, 'App\\Models\\WorkObject', 'App\\Models\\Attribute', 'm2', '{\"m2\":\"\"}', '{\"m2\":\"x86\"}', 'updated', 7, '2021-09-15 04:57:14', '2021-09-15 04:57:14'),
(182, 56, 'App\\Models\\WorkObject', 'App\\Models\\Attribute', 'm2', '{\"m2\":\"\"}', '{\"m2\":\"arm\"}', 'updated', 7, '2021-09-15 04:57:14', '2021-09-15 04:57:14'),
(183, 56, 'App\\Models\\WorkObject', 'App\\Models\\Attribute', 'm2', '{\"m2\":\"\"}', '{\"m2\":\"x86\"}', 'updated', 7, '2021-09-15 04:57:14', '2021-09-15 04:57:14'),
(184, 56, 'App\\Models\\WorkObject', 'App\\Models\\Attribute', 'm2', '{\"m2\":\"\"}', '{\"m2\":\"arm\"}', 'updated', 7, '2021-09-15 04:57:14', '2021-09-15 04:57:14'),
(185, 56, 'App\\Models\\WorkObject', 'App\\Models\\Attribute', 'm2', '{\"m2\":\"\"}', '{\"m2\":\"x86\"}', 'updated', 7, '2021-09-15 04:57:14', '2021-09-15 04:57:14'),
(186, 56, 'App\\Models\\WorkObject', 'App\\Models\\Attribute', 'm2', '{\"m2\":\"\"}', '{\"m2\":\"arm\"}', 'updated', 7, '2021-09-15 04:57:14', '2021-09-15 04:57:14'),
(187, 56, 'App\\Models\\WorkObject', 'App\\Models\\Attribute', 'enum', '{\"enum\":\"\"}', '{\"enum\":\"H264\"}', 'updated', 7, '2021-09-15 04:57:14', '2021-09-15 04:57:14'),
(188, 56, 'App\\Models\\WorkObject', 'App\\Models\\Attribute', 'm2', '{\"m2\":\"x86\"}', '{\"m2\":\"arm\"}', 'updated', 7, '2021-09-16 09:56:27', '2021-09-16 09:56:27'),
(189, 56, 'App\\Models\\WorkObject', 'App\\Models\\Attribute', 'm2', '{\"m2\":\"arm\"}', '{\"m2\":\"x86\"}', 'updated', 7, '2021-09-16 09:56:27', '2021-09-16 09:56:27'),
(190, 56, 'App\\Models\\WorkObject', 'App\\Models\\Attribute', 'm2', '{\"m2\":\"arm\"}', '{\"m2\":\"x86\"}', 'updated', 7, '2021-09-16 09:56:32', '2021-09-16 09:56:32'),
(191, 56, 'App\\Models\\WorkObject', 'App\\Models\\Attribute', 'm2', '{\"m2\":\"arm\"}', '{\"m2\":\"x86\"}', 'updated', 7, '2021-09-17 07:32:26', '2021-09-17 07:32:26'),
(192, 56, 'App\\Models\\WorkObject', 'App\\Models\\Attribute', 'm2', '{\"m2\":\"x86\"}', '{\"m2\":\"x23\"}', 'updated', 7, '2021-09-17 09:15:17', '2021-09-17 09:15:17'),
(193, 56, 'App\\Models\\WorkObject', 'App\\Models\\File', 'file', '', '{\"type\":\"image\",\"work_object_id\":\"56\",\"url\":\"\\/uploads\\/56\\/80605_IMG_20210918_105026.jpg\",\"title\":\"80605_IMG_20210918_105026.jpg\",\"extension\":\"jpg\",\"updated_at\":\"2021-09-18T17:59:24.000000Z\",\"created_at\":\"2021-09-18T17:59:24.000000Z\",\"id\":83}', 'created', 8, '2021-09-18 14:59:24', '2021-09-18 14:59:24'),
(194, 56, 'App\\Models\\WorkObject', 'App\\Models\\Task', 'task', '', '{\"description\":\" \",\"priority\":1,\"status_id\":1,\"title\":\"Pidor\",\"work_object_id\":\"56\",\"updated_at\":\"2021-09-18T17:59:37.000000Z\",\"created_at\":\"2021-09-18T17:59:37.000000Z\",\"id\":10}', 'created', 8, '2021-09-18 14:59:37', '2021-09-18 14:59:37'),
(195, 57, 'App\\Models\\WorkObject', 'App\\Models\\WorkObject', 'description', '{\"id\":57,\"type_id\":61,\"description\":\"\",\"status_id\":1,\"status_type_id\":1,\"user_id\":6,\"created_at\":\"2021-09-24T11:14:26.000000Z\",\"updated_at\":\"2021-09-24T11:14:26.000000Z\",\"deleted_at\":null,\"title\":\"\\u041c\\u0430\\u0440\\u043a\\u0435\\u0442\\u041e\\u043f\\u0442\",\"deleted\":0}', '{\"id\":57,\"type_id\":61,\"description\":null,\"status_id\":\"1\",\"status_type_id\":1,\"user_id\":6,\"created_at\":\"2021-09-24T11:14:26.000000Z\",\"updated_at\":\"2021-09-24T11:14:54.000000Z\",\"deleted_at\":null,\"title\":\"\\u041c\\u0430\\u0440\\u043a\\u0435\\u0442\\u041e\\u043f\\u0442\",\"deleted\":0}', 'updated', 6, '2021-09-24 08:14:54', '2021-09-24 08:14:54'),
(196, 57, 'App\\Models\\WorkObject', 'App\\Models\\Attribute', 'koordinaty', '{\"koordinaty\":\"\"}', '{\"koordinaty\":\"123.54444\"}', 'updated', 6, '2021-09-24 08:14:54', '2021-09-24 08:14:54'),
(197, 57, 'App\\Models\\WorkObject', 'App\\Models\\Attribute', 'gorod', '{\"gorod\":\"\"}', '{\"gorod\":\"\\u041a\\u043e\\u043c\\u0441\\u043e\\u043c\\u043e\\u043b\\u044c\\u0441\\u043a\"}', 'updated', 6, '2021-09-24 08:14:54', '2021-09-24 08:14:54'),
(198, 57, 'App\\Models\\WorkObject', 'App\\Models\\Attribute', 'pozarka', '{\"pozarka\":\"\"}', '{\"pozarka\":\"1\"}', 'updated', 6, '2021-09-24 08:14:54', '2021-09-24 08:14:54'),
(199, 57, 'App\\Models\\WorkObject', 'App\\Models\\Attribute', 'data-regestracii', '{\"data-regestracii\":\"\"}', '{\"data-regestracii\":\"2021-09-10\"}', 'updated', 6, '2021-09-24 08:14:54', '2021-09-24 08:14:54'),
(200, 57, 'App\\Models\\WorkObject', 'App\\Models\\Attribute', 'gorod', '{\"gorod\":\"\\u041a\\u043e\\u043c\\u0441\\u043e\\u043c\\u043e\\u043b\\u044c\\u0441\\u043a\"}', '{\"gorod\":\"\\u041f\\u043e\\u043b\\u0442\\u0430\\u0432\\u0430\"}', 'updated', 6, '2021-09-24 08:15:33', '2021-09-24 08:15:33'),
(201, 57, 'App\\Models\\WorkObject', 'App\\Models\\Task', 'task', '', '{\"description\":\" \",\"priority\":1,\"status_id\":1,\"title\":\"\\u041e\\u0441\\u043c\\u043e\\u0442\\u0440 25.09\",\"work_object_id\":\"57\",\"updated_at\":\"2021-09-24T11:15:58.000000Z\",\"created_at\":\"2021-09-24T11:15:58.000000Z\",\"id\":11}', 'created', 6, '2021-09-24 08:15:58', '2021-09-24 08:15:58'),
(202, 57, 'App\\Models\\WorkObject', 'App\\Models\\Task', 'task', '', '{\"description\":\" \",\"priority\":1,\"status_id\":1,\"title\":\"\\u041e\\u0441\\u043c\\u043e\\u0442\\u0440 21.10\",\"work_object_id\":\"57\",\"updated_at\":\"2021-09-24T11:31:11.000000Z\",\"created_at\":\"2021-09-24T11:31:11.000000Z\",\"id\":12}', 'created', 6, '2021-09-24 08:31:11', '2021-09-24 08:31:11'),
(203, 57, 'App\\Models\\WorkObject', 'App\\Models\\Attribute', 'gorod', '{\"gorod\":\"\\u041f\\u043e\\u043b\\u0442\\u0430\\u0432\\u0430\"}', '{\"gorod\":\"\\u041a\\u043e\\u043c\\u0441\\u043e\\u043c\\u043e\\u043b\\u044c\\u0441\\u043a\"}', 'updated', 6, '2021-09-24 09:20:37', '2021-09-24 09:20:37'),
(204, 57, 'App\\Models\\WorkObject', 'App\\Models\\Comment', 'comment', '', '{\"comment\":\"Dehej\",\"user_id\":6,\"commentable_id\":57,\"commentable_type\":\"App\\\\Models\\\\WorkObject\",\"updated_at\":\"2021-09-24T12:23:11.000000Z\",\"created_at\":\"2021-09-24T12:23:11.000000Z\",\"id\":19}', 'created', 6, '2021-09-24 09:23:11', '2021-09-24 09:23:11'),
(205, 57, 'App\\Models\\WorkObject', 'App\\Models\\File', 'file', '', '{\"type\":\"image\",\"work_object_id\":\"57\",\"url\":\"\\/uploads\\/57\\/91692_IMG_20210810_185308.jpg\",\"title\":\"91692_IMG_20210810_185308.jpg\",\"extension\":\"jpg\",\"updated_at\":\"2021-09-24T12:24:22.000000Z\",\"created_at\":\"2021-09-24T12:24:22.000000Z\",\"id\":84}', 'created', 6, '2021-09-24 09:24:22', '2021-09-24 09:24:22'),
(206, 57, 'App\\Models\\WorkObject', 'App\\Models\\Attribute', 'pozarka', '{\"pozarka\":\"1\"}', '{\"pozarka\":\"0\"}', 'updated', 6, '2021-09-24 10:00:09', '2021-09-24 10:00:09'),
(207, 57, 'App\\Models\\WorkObject', 'App\\Models\\Attribute', 'pozarka', '{\"pozarka\":\"0\"}', '{\"pozarka\":\"1\"}', 'updated', 6, '2021-09-24 10:00:11', '2021-09-24 10:00:11'),
(208, 58, 'App\\Models\\WorkObject', 'App\\Models\\WorkObject', 'description', '{\"id\":58,\"type_id\":61,\"description\":\"\",\"status_id\":1,\"status_type_id\":1,\"user_id\":6,\"created_at\":\"2021-09-24T13:00:43.000000Z\",\"updated_at\":\"2021-09-24T13:00:43.000000Z\",\"deleted_at\":null,\"title\":\"\\u041c\\u0430\\u0440\\u043a\\u0435\\u0442\\u0421\\u0442\\u0430\\u043b\\u0438\\u043a17\",\"deleted\":0}', '{\"id\":58,\"type_id\":61,\"description\":null,\"status_id\":\"3\",\"status_type_id\":1,\"user_id\":6,\"created_at\":\"2021-09-24T13:00:43.000000Z\",\"updated_at\":\"2021-09-24T13:01:02.000000Z\",\"deleted_at\":null,\"title\":\"\\u041c\\u0430\\u0440\\u043a\\u0435\\u0442\\u0421\\u0442\\u0430\\u043b\\u0438\\u043a17\",\"deleted\":0}', 'updated', 6, '2021-09-24 10:01:02', '2021-09-24 10:01:02'),
(209, 58, 'App\\Models\\WorkObject', 'App\\Models\\WorkObject', 'status_id', '{\"id\":58,\"type_id\":61,\"description\":\"\",\"status_id\":1,\"status_type_id\":1,\"user_id\":6,\"created_at\":\"2021-09-24T13:00:43.000000Z\",\"updated_at\":\"2021-09-24T13:00:43.000000Z\",\"deleted_at\":null,\"title\":\"\\u041c\\u0430\\u0440\\u043a\\u0435\\u0442\\u0421\\u0442\\u0430\\u043b\\u0438\\u043a17\",\"deleted\":0}', '{\"id\":58,\"type_id\":61,\"description\":null,\"status_id\":\"3\",\"status_type_id\":1,\"user_id\":6,\"created_at\":\"2021-09-24T13:00:43.000000Z\",\"updated_at\":\"2021-09-24T13:01:02.000000Z\",\"deleted_at\":null,\"title\":\"\\u041c\\u0430\\u0440\\u043a\\u0435\\u0442\\u0421\\u0442\\u0430\\u043b\\u0438\\u043a17\",\"deleted\":0}', 'updated', 6, '2021-09-24 10:01:02', '2021-09-24 10:01:02'),
(210, 58, 'App\\Models\\WorkObject', 'App\\Models\\Attribute', 'koordinaty', '{\"koordinaty\":\"\"}', '{\"koordinaty\":\"45700.333.1\"}', 'updated', 6, '2021-09-24 10:01:02', '2021-09-24 10:01:02'),
(211, 58, 'App\\Models\\WorkObject', 'App\\Models\\Attribute', 'gorod', '{\"gorod\":\"\"}', '{\"gorod\":\"\\u041f\\u043e\\u043b\\u0442\\u0430\\u0432\\u0430\"}', 'updated', 6, '2021-09-24 10:01:02', '2021-09-24 10:01:02'),
(212, 58, 'App\\Models\\WorkObject', 'App\\Models\\Attribute', 'pozarka', '{\"pozarka\":\"\"}', '{\"pozarka\":\"0\"}', 'updated', 6, '2021-09-24 10:01:02', '2021-09-24 10:01:02'),
(213, 58, 'App\\Models\\WorkObject', 'App\\Models\\Attribute', 'data-regestracii', '{\"data-regestracii\":\"\"}', '{\"data-regestracii\":\"2021-10-10\"}', 'updated', 6, '2021-09-24 10:01:02', '2021-09-24 10:01:02'),
(214, 58, 'App\\Models\\WorkObject', 'App\\Models\\Attribute', 'pozarka', '{\"pozarka\":\"0\"}', '{\"pozarka\":\"1\"}', 'updated', 6, '2021-09-24 10:09:02', '2021-09-24 10:09:02'),
(215, 58, 'App\\Models\\WorkObject', 'App\\Models\\Task', 'task', '', '{\"description\":\" \",\"priority\":1,\"status_id\":1,\"title\":\"\\u0417\\u0430\\u043c\\u0435\\u043d\\u0430 \\u0434\\u0430\\u0442\\u0447\\u0438\\u043a\\u0430\",\"work_object_id\":\"58\",\"updated_at\":\"2021-09-24T13:12:25.000000Z\",\"created_at\":\"2021-09-24T13:12:25.000000Z\",\"id\":13}', 'created', 6, '2021-09-24 10:12:25', '2021-09-24 10:12:25'),
(216, 58, 'App\\Models\\WorkObject', 'App\\Models\\WorkObject', 'status_id', '{\"id\":58,\"type_id\":61,\"description\":null,\"status_id\":3,\"status_type_id\":4,\"user_id\":6,\"created_at\":\"2021-09-24T13:00:43.000000Z\",\"updated_at\":\"2021-09-24T13:01:02.000000Z\",\"deleted_at\":null,\"title\":\"\\u041c\\u0430\\u0440\\u043a\\u0435\\u0442\\u0421\\u0442\\u0430\\u043b\\u0438\\u043a17\",\"deleted\":0}', '{\"id\":58,\"type_id\":61,\"description\":null,\"status_id\":\"1\",\"status_type_id\":4,\"user_id\":6,\"created_at\":\"2021-09-24T13:00:43.000000Z\",\"updated_at\":\"2021-09-24T13:18:23.000000Z\",\"deleted_at\":null,\"title\":\"\\u041c\\u0430\\u0440\\u043a\\u0435\\u0442\\u0421\\u0442\\u0430\\u043b\\u0438\\u043a17\",\"deleted\":0}', 'updated', 6, '2021-09-24 10:18:23', '2021-09-24 10:18:23'),
(217, 57, 'App\\Models\\WorkObject', 'App\\Models\\File', 'file', '', '{\"type\":\"image\",\"work_object_id\":\"57\",\"url\":\"\\/uploads\\/57\\/62841_16325163607698674100412369666075.jpg\",\"title\":\"62841_16325163607698674100412369666075.jpg\",\"extension\":\"jpg\",\"updated_at\":\"2021-09-24T20:46:13.000000Z\",\"created_at\":\"2021-09-24T20:46:13.000000Z\",\"id\":85}', 'created', 6, '2021-09-24 17:46:13', '2021-09-24 17:46:13'),
(218, 59, 'App\\Models\\WorkObject', 'App\\Models\\WorkObject', 'description', '{\"id\":59,\"type_id\":63,\"description\":\"\",\"status_id\":1,\"status_type_id\":1,\"user_id\":6,\"created_at\":\"2021-09-24T20:58:15.000000Z\",\"updated_at\":\"2021-09-24T20:58:15.000000Z\",\"deleted_at\":null,\"title\":\"Buh1\",\"deleted\":0}', '{\"id\":59,\"type_id\":63,\"description\":\"Se22\",\"status_id\":\"1\",\"status_type_id\":1,\"user_id\":6,\"created_at\":\"2021-09-24T20:58:15.000000Z\",\"updated_at\":\"2021-09-24T20:58:45.000000Z\",\"deleted_at\":null,\"title\":\"Buh1\",\"deleted\":0}', 'updated', 6, '2021-09-24 17:58:45', '2021-09-24 17:58:45'),
(219, 59, 'App\\Models\\WorkObject', 'App\\Models\\Attribute', 'pribor', '{\"pribor\":\"\"}', '{\"pribor\":\"\\u0422\\u0438\\u0440\\u0430\\u0441 \\u041f\\u0440\\u0430\\u0439\\u043c\"}', 'updated', 6, '2021-09-24 17:58:45', '2021-09-24 17:58:45'),
(220, 59, 'App\\Models\\WorkObject', 'App\\Models\\Attribute', 'data-dobavleniya', '{\"data-dobavleniya\":\"\"}', '{\"data-dobavleniya\":\"2021-09-24\"}', 'updated', 6, '2021-09-24 17:58:45', '2021-09-24 17:58:45'),
(221, 59, 'App\\Models\\WorkObject', 'App\\Models\\Attribute', 'pozarka', '{\"pozarka\":\"\"}', '{\"pozarka\":\"1\"}', 'updated', 6, '2021-09-24 17:58:45', '2021-09-24 17:58:45'),
(222, 59, 'App\\Models\\WorkObject', 'App\\Models\\Comment', 'comment', '', '{\"comment\":\"Hehehddh\",\"user_id\":6,\"commentable_id\":59,\"commentable_type\":\"App\\\\Models\\\\WorkObject\",\"updated_at\":\"2021-09-24T20:58:53.000000Z\",\"created_at\":\"2021-09-24T20:58:53.000000Z\",\"id\":20}', 'created', 6, '2021-09-24 17:58:53', '2021-09-24 17:58:53'),
(223, 59, 'App\\Models\\WorkObject', 'App\\Models\\WorkObject', 'description', '{\"id\":59,\"type_id\":63,\"description\":\"Se22\",\"status_id\":1,\"status_type_id\":1,\"user_id\":6,\"created_at\":\"2021-09-24T20:58:15.000000Z\",\"updated_at\":\"2021-09-24T20:58:45.000000Z\",\"deleted_at\":null,\"title\":\"Buh1\",\"deleted\":0}', '{\"id\":59,\"type_id\":63,\"description\":\"555\",\"status_id\":\"1\",\"status_type_id\":1,\"user_id\":6,\"created_at\":\"2021-09-24T20:58:15.000000Z\",\"updated_at\":\"2021-09-24T20:59:43.000000Z\",\"deleted_at\":null,\"title\":\"Buh1\",\"deleted\":0}', 'updated', 6, '2021-09-24 17:59:43', '2021-09-24 17:59:43'),
(224, 59, 'App\\Models\\WorkObject', 'App\\Models\\Task', 'task', '', '{\"description\":\" \",\"priority\":1,\"status_id\":1,\"title\":\"\\u0417\\u0430\\u043c\\u0435\\u043d\\u0430 \\u043a\\u0430\\u043c\\u0435\\u0440\\u044b\",\"work_object_id\":\"59\",\"updated_at\":\"2021-09-24T21:00:59.000000Z\",\"created_at\":\"2021-09-24T21:00:59.000000Z\",\"id\":14}', 'created', 6, '2021-09-24 18:00:59', '2021-09-24 18:00:59'),
(225, 59, 'App\\Models\\WorkObject', 'App\\Models\\Task', 'task', '', '{\"description\":\" \",\"priority\":1,\"status_id\":1,\"title\":\"\\u041d\\u043d\\u043d\\u0433\",\"work_object_id\":\"59\",\"updated_at\":\"2021-09-24T21:02:05.000000Z\",\"created_at\":\"2021-09-24T21:02:05.000000Z\",\"id\":15}', 'created', 6, '2021-09-24 18:02:05', '2021-09-24 18:02:05'),
(226, 58, 'App\\Models\\WorkObject', 'App\\Models\\Task', 'task', '', '{\"description\":\" \",\"priority\":1,\"status_id\":1,\"title\":\"\\u0412\\u044b\\u043a\\u0438\\u043d\\u0443\\u0442\\u044c \\u043e\\u0431\\u043e\\u0438\",\"work_object_id\":\"58\",\"updated_at\":\"2021-09-24T21:08:04.000000Z\",\"created_at\":\"2021-09-24T21:08:04.000000Z\",\"id\":16}', 'created', 6, '2021-09-24 18:08:04', '2021-09-24 18:08:04'),
(227, 58, 'App\\Models\\WorkObject', 'App\\Models\\WorkObject', 'description', '{\"id\":58,\"type_id\":61,\"description\":null,\"status_id\":1,\"status_type_id\":4,\"user_id\":6,\"created_at\":\"2021-09-24T13:00:43.000000Z\",\"updated_at\":\"2021-09-24T13:18:23.000000Z\",\"deleted_at\":null,\"title\":\"\\u041c\\u0430\\u0440\\u043a\\u0435\\u0442\\u0421\\u0442\\u0430\\u043b\\u0438\\u043a17\",\"deleted\":0}', '{\"id\":58,\"type_id\":61,\"description\":\"\\u0420\\u0440\\u0440\\u0440\",\"status_id\":\"1\",\"status_type_id\":4,\"user_id\":6,\"created_at\":\"2021-09-24T13:00:43.000000Z\",\"updated_at\":\"2021-09-24T21:16:36.000000Z\",\"deleted_at\":null,\"title\":\"\\u041c\\u0430\\u0440\\u043a\\u0435\\u0442\\u0421\\u0442\\u0430\\u043b\\u0438\\u043a17\",\"deleted\":0}', 'updated', 6, '2021-09-24 18:16:36', '2021-09-24 18:16:36'),
(228, 60, 'App\\Models\\WorkObject', 'App\\Models\\WorkObject', 'description', '{\"id\":60,\"type_id\":63,\"description\":\"\",\"status_id\":1,\"status_type_id\":1,\"user_id\":6,\"created_at\":\"2021-09-24T21:18:57.000000Z\",\"updated_at\":\"2021-09-24T21:18:57.000000Z\",\"deleted_at\":null,\"title\":\"Mk2\",\"deleted\":0}', '{\"id\":60,\"type_id\":63,\"description\":\"Hjjj\",\"status_id\":\"1\",\"status_type_id\":1,\"user_id\":6,\"created_at\":\"2021-09-24T21:18:57.000000Z\",\"updated_at\":\"2021-09-24T21:19:15.000000Z\",\"deleted_at\":null,\"title\":\"Mk2\",\"deleted\":0}', 'updated', 6, '2021-09-24 18:19:15', '2021-09-24 18:19:15'),
(229, 60, 'App\\Models\\WorkObject', 'App\\Models\\Attribute', 'pribor', '{\"pribor\":\"\"}', '{\"pribor\":\"\\u0412\\u0430\\u0440\\u0442\\u0430 \\u0410\\u0434\\u0440\\u0435\\u0441\"}', 'updated', 6, '2021-09-24 18:19:15', '2021-09-24 18:19:15'),
(230, 60, 'App\\Models\\WorkObject', 'App\\Models\\Attribute', 'data-dobavleniya', '{\"data-dobavleniya\":\"\"}', '{\"data-dobavleniya\":\"2021-09-24\"}', 'updated', 6, '2021-09-24 18:19:15', '2021-09-24 18:19:15'),
(231, 60, 'App\\Models\\WorkObject', 'App\\Models\\Attribute', 'pozarka', '{\"pozarka\":\"\"}', '{\"pozarka\":\"1\"}', 'updated', 6, '2021-09-24 18:19:15', '2021-09-24 18:19:15'),
(232, 60, 'App\\Models\\WorkObject', 'App\\Models\\Task', 'task', '', '{\"description\":\" \",\"priority\":1,\"status_id\":1,\"title\":\"m2\",\"work_object_id\":\"60\",\"updated_at\":\"2021-09-24T21:57:44.000000Z\",\"created_at\":\"2021-09-24T21:57:44.000000Z\",\"id\":17}', 'created', 6, '2021-09-24 18:57:44', '2021-09-24 18:57:44'),
(233, 58, 'App\\Models\\WorkObject', 'App\\Models\\Task', 'task', '', '{\"description\":\" \",\"priority\":1,\"status_id\":1,\"title\":\"e1\",\"work_object_id\":\"58\",\"updated_at\":\"2021-10-01T12:17:21.000000Z\",\"created_at\":\"2021-10-01T12:17:21.000000Z\",\"id\":18}', 'created', 7, '2021-10-01 09:17:21', '2021-10-01 09:17:21');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
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
(14, '2021_05_06_162743_create_histories_table', 5),
(16, '2021_09_14_080114_create_enumerations_table', 6),
(17, '2021_09_14_080421_create_enumeration_data_table', 6),
(18, '2021_12_09_102524_create_permission_tables', 7),
(19, '2021_12_09_103233_create_user_allowed_roles', 8);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Администратор', 'web', '2021-12-09 12:21:34', '2021-12-09 12:21:34'),
(2, 'Viewer', 'web', '2021-12-10 06:47:38', '2021-12-10 06:47:38');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
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
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `type_id`, `status_id`, `title`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 'Новое', '2021-03-17 09:55:45', '2021-06-16 09:34:53'),
(2, 1, 1, 'В работе', '2021-03-17 09:55:50', '2021-06-16 09:34:53'),
(3, 1, 2, 'Выполнено', '2021-03-17 09:55:50', '2021-06-16 09:34:53'),
(4, 1, 3, 'В ожидании', '2021-03-17 09:55:50', '2021-06-16 09:34:53'),
(5, 1, 4, 'Отменено', '2021-03-17 09:55:50', '2021-06-16 09:34:53'),
(15, 4, 0, 'Не осмотрен', '2021-09-24 10:16:11', '2021-09-24 10:16:11'),
(16, 4, 1, 'Осмотрен', '2021-09-24 10:16:11', '2021-09-24 10:16:11');

-- --------------------------------------------------------

--
-- Table structure for table `status_types`
--

CREATE TABLE `status_types` (
  `id` int NOT NULL,
  `title` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status_types`
--

INSERT INTO `status_types` (`id`, `title`, `user_id`) VALUES
(1, 'Статус Рабочий Объект', ''),
(2, 'st1', '6'),
(3, 'Статусы_3', '6'),
(4, 'Статусы для МаркетОпт', '6');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
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
  `work_object_id` int NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `description`, `created_at`, `updated_at`, `priority`, `status_id`, `start_date`, `finish_date`, `work_object_id`, `deleted_at`) VALUES
(18, 'e1', 'ghg', '2021-10-01 09:17:21', '2021-10-01 09:18:53', 1, 1, '2021-10-01 00:00:00', '2021-10-28 00:00:00', 58, '2021-10-01 09:18:53');

-- --------------------------------------------------------

--
-- Table structure for table `task_statuses`
--

CREATE TABLE `task_statuses` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `task_statuses`
--

INSERT INTO `task_statuses` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Новое', '2021-03-17 09:55:45', '2021-03-17 09:55:47'),
(2, 'В работе', '2021-03-17 09:55:50', '2021-03-17 09:55:50'),
(3, 'Выполнено', '2021-03-17 09:55:50', '2021-03-17 09:55:50'),
(4, 'В ожидании', '2021-03-17 09:55:50', '2021-03-17 09:55:50'),
(5, 'Отменено', '2021-03-17 09:55:50', '2021-03-17 09:55:50');

-- --------------------------------------------------------

--
-- Table structure for table `task_user`
--

CREATE TABLE `task_user` (
  `id` int NOT NULL,
  `task_id` int NOT NULL,
  `user_id` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `task_user`
--

INSERT INTO `task_user` (`id`, `task_id`, `user_id`) VALUES
(38, 11, 12),
(21, 11, 8),
(30, 13, 8),
(23, 12, 6),
(37, 11, 6),
(29, 13, 6),
(28, 12, 8),
(34, 16, 8),
(35, 16, 6),
(62, 17, 12),
(61, 17, 11),
(60, 17, 7),
(57, 17, 13),
(63, 18, 6),
(64, 18, 7);

-- --------------------------------------------------------

--
-- Table structure for table `tbot`
--

CREATE TABLE `tbot` (
  `text` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbot`
--

INSERT INTO `tbot` (`text`) VALUES
('gggg'),
('gggg'),
('gggg'),
('gggg'),
('gggg'),
('gggg'),
('gggg'),
('gggg'),
('gggg');

-- --------------------------------------------------------

--
-- Table structure for table `type_fields`
--

CREATE TABLE `type_fields` (
  `id` bigint UNSIGNED NOT NULL,
  `title_eng` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_ru` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `format_id` int NOT NULL,
  `required` tinyint NOT NULL,
  `active` tinyint NOT NULL DEFAULT '1',
  `quantity` smallint NOT NULL DEFAULT '1',
  `enumeration_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `type_fields`
--

INSERT INTO `type_fields` (`id`, `title_eng`, `title_ru`, `format_id`, `required`, `active`, `quantity`, `enumeration_id`, `created_at`, `updated_at`) VALUES
(56, 'pozarka', 'Пожарка', 2, 0, 1, 1, NULL, '2021-08-12 04:28:02', '2021-09-24 19:29:35'),
(62, 'koordinaty', 'Координаты', 1, 0, 1, 1, NULL, '2021-09-24 08:14:14', '2021-09-24 08:15:16'),
(63, 'gorod', 'Город', 7, 0, 1, 1, 1, '2021-09-24 08:14:14', '2021-09-24 08:15:16'),
(64, 'data-registracii', 'Дата регистрации', 4, 0, 1, 1, NULL, '2021-09-24 08:14:14', '2021-09-24 17:48:33'),
(65, 'edrpu', 'ЭДРПУ', 1, 0, 1, 1, NULL, '2021-09-24 17:48:33', '2021-09-24 17:48:33'),
(66, 'pribor', 'Прибор', 7, 0, 1, 1, 5, '2021-09-24 17:57:15', '2021-09-24 17:57:15'),
(67, 'data-dobavleniya', 'Дата добавления', 4, 0, 1, 1, NULL, '2021-09-24 17:57:15', '2021-09-24 17:57:15'),
(68, 'r1', 'r1', 1, 0, 1, 1, NULL, '2021-10-01 05:21:31', '2021-10-01 05:21:31'),
(69, 'r2', 'r2', 2, 0, 1, 1, NULL, '2021-10-01 05:21:31', '2021-10-01 05:21:31');

-- --------------------------------------------------------

--
-- Table structure for table `type_field_work_object_type`
--

CREATE TABLE `type_field_work_object_type` (
  `id` int NOT NULL,
  `type_field_id` int NOT NULL,
  `work_object_type_id` int NOT NULL,
  `fields_quantity` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `type_field_work_object_type`
--

INSERT INTO `type_field_work_object_type` (`id`, `type_field_id`, `work_object_type_id`, `fields_quantity`) VALUES
(28, 62, 61, 1),
(29, 63, 61, 1),
(30, 56, 61, 1),
(31, 64, 61, 1),
(32, 65, 61, 1),
(33, 66, 63, 1),
(34, 67, 63, 1),
(35, 56, 63, 1);

-- --------------------------------------------------------

--
-- Table structure for table `type_settings`
--

CREATE TABLE `type_settings` (
  `id` bigint UNSIGNED NOT NULL,
  `work_object_type_id` int NOT NULL,
  `status_type_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `type_settings`
--

INSERT INTO `type_settings` (`id`, `work_object_type_id`, `status_type_id`, `created_at`, `updated_at`) VALUES
(3, 59, 1, '2021-08-03 11:17:33', '2021-09-17 10:40:31'),
(4, 60, 1, '2021-08-04 06:52:21', '2021-09-15 05:39:01'),
(5, 61, 4, '2021-09-24 08:12:56', '2021-09-24 19:29:02'),
(6, 62, 1, '2021-09-24 17:52:28', '2021-10-01 05:26:10'),
(7, 63, 1, '2021-09-24 17:53:50', '2021-09-24 19:29:35'),
(8, 64, 1, '2021-10-01 08:04:37', '2021-10-01 08:04:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `google_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fio` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telegram_chat_id` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `google_id`, `fio`, `role`, `avatar`, `telegram_chat_id`) VALUES
(6, '111314692680120606412', 'xafable55@gmail.com', NULL, '$2y$10$i64L1cOCTeDF1YbpcgYZvegCKEXAOHmP7TLM9HzGXR1UzC4gHkmMm', 'x0h7qgmSR1okwZFPcy4QsujZHOXvw9juKpyRsdwGtGDsimbCqodQhT7Ki9CQ', '2021-04-19 17:12:57', '2021-04-19 17:12:57', '111314692680120606412', 'Олег Рахубовский', NULL, 'https://lh3.googleusercontent.com/a-/AOh14Gh1gnoHAR_x02Qphel5VI1u4R4AAW8y9NV7YvYe0g=s96-c', '433380489'),
(7, 'admin', 'admin@admin', NULL, '$2y$10$4Z4xNKJ4VZSBGIk118FvMOBnD5D9WewsUgvs6TeTun/h7RESbMqOu', 'OEPriNw7laXrXWPiydUv3dkSQGuqDK02fi69pkKYn8MFZDpB6ajSnMpjvuUy', '2021-07-27 10:09:20', '2021-07-27 10:09:20', NULL, 'admin', NULL, NULL, NULL),
(8, '102645387157216467423', 'bodya.alekseevich@gmail.com', NULL, '$2y$10$JBRP.TnOczzcdD9cbGewoukPmhFmUZ7ZY28K1gXotrRXwlfzSSZ3m', 'G3fEhUQ8sCtLnsD0pkjYw7LtfKQb53whU98ayrByDnxYqZYIVtX9t3RREJmv', '2021-09-18 14:56:00', '2021-09-18 14:56:00', '102645387157216467423', 'Богдан Алексеевич', NULL, 'https://lh3.googleusercontent.com/a-/AOh14GhxSa9KA3dh_X412n-Hebx0Dg4zryxibaj5G5e5EQ=s96-c', '219605422'),
(9, '8bc51dc4-4c64-4476-a149-47ccb2999b0b', 'Ally_Murphy9151@atink.com', NULL, '2', NULL, NULL, NULL, NULL, 'Ally Murphy', NULL, NULL, NULL),
(10, '72bbfd69-16a6-4e6f-9ab0-03ba2ebcdd93', 'Jacob_Forth4769@zorer.org', NULL, '3', NULL, NULL, NULL, NULL, 'Jacob Forth', NULL, NULL, NULL),
(11, '195e62c5-0178-42a5-8592-49ed8f3b874a', 'Barney_Quinnell6899@twace.org', NULL, '4', NULL, NULL, NULL, NULL, 'Barney Quinnell', NULL, NULL, NULL),
(12, '86e1faf3-da95-437d-8554-e4ddc9a18d81', 'Johnathan_Yang5784@gembat.biz', NULL, '5', NULL, NULL, NULL, NULL, 'Johnathan Yang', NULL, NULL, NULL),
(13, '47213df4-eb20-4874-a9d2-554894f98711', 'Roger_Newton4154@iatim.tech', NULL, '6', NULL, NULL, NULL, NULL, 'Roger Newton', NULL, NULL, NULL),
(14, '879460c9-7483-422f-bd92-5e1c83b6d996', 'Mara_May6710@muall.tech', NULL, '7', NULL, NULL, NULL, NULL, 'Mara May', NULL, NULL, NULL),
(15, '643d596f-96f2-47c5-b6a9-707bd931c257', 'Erica_James9398@gembat.biz', NULL, '8', NULL, NULL, NULL, NULL, 'Erica James', NULL, NULL, NULL),
(16, '4124e38d-7588-4129-9693-65d2b0bc9ff8', 'Emmanuelle_Khan3244@qater.org', NULL, '9', NULL, NULL, NULL, NULL, 'Emmanuelle Khan', NULL, NULL, NULL),
(17, 'a557d350-133b-4293-b88f-9c6127d9bc5b', 'Ronald_Mcneill9622@cispeto.com', NULL, '10', NULL, NULL, NULL, NULL, 'Ronald Mcneill', NULL, NULL, NULL),
(18, '57d732ef-d233-4937-ae8d-35be2153e59c', 'Chester_Bentley6313@guentu.biz', NULL, '11', NULL, NULL, NULL, NULL, 'Chester Bentley', NULL, NULL, NULL),
(19, 'd9280ea9-45b7-4a15-b669-9d145cf5c118', 'Daron_Wilkinson8391@bretoux.com', NULL, '12', NULL, NULL, NULL, NULL, 'Daron Wilkinson', NULL, NULL, NULL),
(20, 'db9922f7-0665-4c64-9fff-1541fe9a2b05', 'Erick_Thorne2909@bauros.biz', NULL, '13', NULL, NULL, NULL, NULL, 'Erick Thorne', NULL, NULL, NULL),
(21, 'cc08c263-e751-419c-84e9-30ef62d5ee3b', 'Destiny_Bright8313@acrit.org', NULL, '14', NULL, NULL, NULL, NULL, 'Destiny Bright', NULL, NULL, NULL),
(22, 'f59ffeaf-e345-43ed-b75a-5700cbff63da', 'Chris_Forth4888@bauros.biz', NULL, '15', NULL, NULL, NULL, NULL, 'Chris Forth', NULL, NULL, NULL),
(23, 'ce1d1c0c-7f8a-4af0-8d06-099f1b4921d9', 'Chester_Robertson7222@bauros.biz', NULL, '16', NULL, NULL, NULL, NULL, 'Chester Robertson', NULL, NULL, NULL),
(24, '90d68597-d24a-4a48-b839-e4ab59ea0bc2', 'Amelia_Wigley9111@infotech44.tech', NULL, '17', NULL, NULL, NULL, NULL, 'Amelia Wigley', NULL, NULL, NULL),
(25, 'e86b4621-b959-4697-9049-9b7f90002901', 'Daniel_Dickson7781@kideod.biz', NULL, '18', NULL, NULL, NULL, NULL, 'Daniel Dickson', NULL, NULL, NULL),
(26, 'a45d1056-c9f5-4900-a9ad-fb1734375ecc', 'George_Gonzales6283@deavo.com', NULL, '19', NULL, NULL, NULL, NULL, 'George Gonzales', NULL, NULL, NULL),
(27, '8a6a101a-0a1f-4633-b03e-d38c7139d6d0', 'Javier_Edler5736@sheye.org', NULL, '20', NULL, NULL, NULL, NULL, 'Javier Edler', NULL, NULL, NULL),
(28, '5e5aaf2b-9851-44c1-9aa0-e8bf499dd0ea', 'Christy_Reese6161@bungar.biz', NULL, '21', NULL, NULL, NULL, NULL, 'Christy Reese', NULL, NULL, NULL),
(29, '8eafb8fe-810e-4b96-8e57-b1695a83c7ae', 'Tyler_Jefferson8839@dionrab.com', NULL, '22', NULL, NULL, NULL, NULL, 'Tyler Jefferson', NULL, NULL, NULL),
(30, '27011ba2-7f0a-49a1-bd91-c00769d8c644', 'Ethan_Farrant931@twipet.com', NULL, '23', NULL, NULL, NULL, NULL, 'Ethan Farrant', NULL, NULL, NULL),
(31, '66544392-13bd-431d-9159-a57fbe8f76a6', 'Rufus_Savage3159@cispeto.com', NULL, '24', NULL, NULL, NULL, NULL, 'Rufus Savage', NULL, NULL, NULL),
(32, '84272dc5-2b48-4777-aaff-212b12b93b3d', 'Christine_Snell3891@sveldo.biz', NULL, '25', NULL, NULL, NULL, NULL, 'Christine Snell', NULL, NULL, NULL),
(33, 'f8e823f7-605e-4a3b-abfc-3d81a06b3fb6', 'Mayleen_Ebbs7768@nanoff.biz', NULL, '26', NULL, NULL, NULL, NULL, 'Mayleen Ebbs', NULL, NULL, NULL),
(34, '00c0f8ce-ea40-4219-8bcf-dd48cdc4484b', 'Noah_Nash9563@qater.org', NULL, '27', NULL, NULL, NULL, NULL, 'Noah Nash', NULL, NULL, NULL),
(35, '84466503-2183-449b-afae-c1076244cc0d', 'Kurt_Wright9769@typill.biz', NULL, '28', NULL, NULL, NULL, NULL, 'Kurt Wright', NULL, NULL, NULL),
(36, 'f36da906-85be-4ab4-b776-8b26084c748f', 'Ronald_Squire7120@supunk.biz', NULL, '29', NULL, NULL, NULL, NULL, 'Ronald Squire', NULL, NULL, NULL),
(37, '55010904-cf68-43de-8996-ed707d26213e', 'Jaylene_Wright3290@bauros.biz', NULL, '30', NULL, NULL, NULL, NULL, 'Jaylene Wright', NULL, NULL, NULL),
(38, '300ec136-708a-4981-a76f-59f00ce0c60d', 'Jennifer_Walker642@mafthy.com', NULL, '31', NULL, NULL, NULL, NULL, 'Jennifer Walker', NULL, NULL, NULL),
(39, '6f261772-6aa3-4636-8bca-03e0f1153641', 'Eduardo_Tobin4985@bulaffy.com', NULL, '32', NULL, NULL, NULL, NULL, 'Eduardo Tobin', NULL, NULL, NULL),
(40, '3d381a9b-21ac-4f1b-9060-ff183c298327', 'Logan_Vass7231@joiniaa.com', NULL, '33', NULL, NULL, NULL, NULL, 'Logan Vass', NULL, NULL, NULL),
(41, '41076e0e-f7b9-4dc1-a6dd-553ee1328d4c', 'Rick_Skinner2440@zorer.org', NULL, '34', NULL, NULL, NULL, NULL, 'Rick Skinner', NULL, NULL, NULL),
(42, '293afb5e-09da-4a9e-b311-f311a1d6b80e', 'Alex_Broomfield5088@ubusive.com', NULL, '35', NULL, NULL, NULL, NULL, 'Alex Broomfield', NULL, NULL, NULL),
(43, 'e713cffb-1457-412e-a388-66dedf1b7112', 'Aeris_Wilson9956@dionrab.com', NULL, '36', NULL, NULL, NULL, NULL, 'Aeris Wilson', NULL, NULL, NULL),
(44, 'caf9cbbb-5bf7-48d6-80bf-b3554c617857', 'Lynn_Briggs300@deons.tech', NULL, '37', NULL, NULL, NULL, NULL, 'Lynn Briggs', NULL, NULL, NULL),
(45, '913686d4-554f-4c3b-a126-ea2c43673c1f', 'Doug_Roberts3656@acrit.org', NULL, '38', NULL, NULL, NULL, NULL, 'Doug Roberts', NULL, NULL, NULL),
(46, 'acd11cc7-f355-4b29-a17c-be23e3e76b36', 'Alessia_Logan589@acrit.org', NULL, '39', NULL, NULL, NULL, NULL, 'Alessia Logan', NULL, NULL, NULL),
(47, '41c38fb2-bc7e-42ae-aacc-125de4349550', 'Violet_Fox3106@eirey.tech', NULL, '40', NULL, NULL, NULL, NULL, 'Violet Fox', NULL, NULL, NULL),
(48, '1a2a3a48-b10c-4396-9970-4731288c4a4f', 'Angelique_Murphy4585@gompie.com', NULL, '41', NULL, NULL, NULL, NULL, 'Angelique Murphy', NULL, NULL, NULL),
(49, '9275ad3f-6937-40a7-948d-18b9a85ee9f4', 'Melinda_Bright7390@joiniaa.com', NULL, '42', NULL, NULL, NULL, NULL, 'Melinda Bright', NULL, NULL, NULL),
(50, '01030a15-5d6f-4aad-bb97-635369d70ec3', 'Angela_Isaac4360@liret.org', NULL, '43', NULL, NULL, NULL, NULL, 'Angela Isaac', NULL, NULL, NULL),
(51, 'c21062cd-741b-4ffd-b02a-7b1350c91f4a', 'Victoria_Barrett6421@dionrab.com', NULL, '44', NULL, NULL, NULL, NULL, 'Victoria Barrett', NULL, NULL, NULL),
(52, '62474edd-6ad3-4a6f-a2b5-c1c1a794cb92', 'Sage_Tyrrell8955@gmail.com', NULL, '45', NULL, NULL, NULL, NULL, 'Sage Tyrrell', NULL, NULL, NULL),
(53, 'a6e167e6-2634-457b-a1cc-915477dc70bb', 'Margaret_Whinter1645@brety.org', NULL, '46', NULL, NULL, NULL, NULL, 'Margaret Whinter', NULL, NULL, NULL),
(54, '52332c6c-690e-4f87-9262-aa89dc8a7b1c', 'Michael_Fleming7478@iatim.tech', NULL, '47', NULL, NULL, NULL, NULL, 'Michael Fleming', NULL, NULL, NULL),
(55, '4b1febc6-455f-469d-a9b4-a32945724222', 'Christy_Button4539@hourpy.biz', NULL, '48', NULL, NULL, NULL, NULL, 'Christy Button', NULL, NULL, NULL),
(56, '7d6f5b31-1855-427a-99e3-02099078a89c', 'Luna_Yates9480@ovock.tech', NULL, '49', NULL, NULL, NULL, NULL, 'Luna Yates', NULL, NULL, NULL),
(57, '7664fddf-205a-41ee-b355-4295eb7f036f', 'Aeris_Bowen8363@bulaffy.com', NULL, '50', NULL, NULL, NULL, NULL, 'Aeris Bowen', NULL, NULL, NULL),
(58, '0cd56334-d90a-459b-9e0f-55e69379957d', 'Joseph_Dixon2357@dionrab.com', NULL, '51', NULL, NULL, NULL, NULL, 'Joseph Dixon', NULL, NULL, NULL),
(59, 'f93ea40b-ffdf-4277-84f6-2a00ce1ae00d', 'Rachael_Ryan813@qater.org', NULL, '52', NULL, NULL, NULL, NULL, 'Rachael Ryan', NULL, NULL, NULL),
(60, 'e1264d08-98a9-4446-8de3-9fbb8a11b526', 'Carina_Porter102@sveldo.biz', NULL, '53', NULL, NULL, NULL, NULL, 'Carina Porter', NULL, NULL, NULL),
(61, '212dbd44-c8bf-48e4-944f-2695b728edd4', 'Sylvia_Evans8107@gompie.com', NULL, '54', NULL, NULL, NULL, NULL, 'Sylvia Evans', NULL, NULL, NULL),
(62, '42a54cda-ea64-490f-b57a-228c040ef2f2', 'Shelby_Davies8172@liret.org', NULL, '55', NULL, NULL, NULL, NULL, 'Shelby Davies', NULL, NULL, NULL),
(63, '7d6d9a91-6a1c-4698-8cc7-616ce9db58a0', 'Sylvia_Alcroft9414@guentu.biz', NULL, '56', NULL, NULL, NULL, NULL, 'Sylvia Alcroft', NULL, NULL, NULL),
(64, 'cc326082-48c7-4a3b-81a9-2e692c82b20e', 'Cedrick_Lunt2600@mafthy.com', NULL, '57', NULL, NULL, NULL, NULL, 'Cedrick Lunt', NULL, NULL, NULL),
(65, '10bc7a84-3cf1-414b-a185-a78a90ea1e4c', 'Rick_Chappell6778@bretoux.com', NULL, '58', NULL, NULL, NULL, NULL, 'Rick Chappell', NULL, NULL, NULL),
(66, '110e557e-f8f1-47e0-be53-23882835e4dd', 'Bart_Fenton5957@gembat.biz', NULL, '59', NULL, NULL, NULL, NULL, 'Bart Fenton', NULL, NULL, NULL),
(67, 'f6fe67a3-7217-4c9b-bdbe-f129e6294ec5', 'Anabel_Wallace8381@sveldo.biz', NULL, '60', NULL, NULL, NULL, NULL, 'Anabel Wallace', NULL, NULL, NULL),
(68, 'c9b104d2-b182-49db-9f01-36995b60841a', 'Erica_Strong2671@famism.biz', NULL, '61', NULL, NULL, NULL, NULL, 'Erica Strong', NULL, NULL, NULL),
(69, '34486463-7597-46d7-aa20-fc808d25fb29', 'Aeris_Wright9966@elnee.tech', NULL, '62', NULL, NULL, NULL, NULL, 'Aeris Wright', NULL, NULL, NULL),
(70, '5818ebd9-3ae6-4607-aa46-60fc12e4566b', 'Abbey_Rossi1976@eirey.tech', NULL, '63', NULL, NULL, NULL, NULL, 'Abbey Rossi', NULL, NULL, NULL),
(71, 'ed33e76c-6194-430d-a511-6071c9b30ad2', 'Joseph_Chester4284@gompie.com', NULL, '64', NULL, NULL, NULL, NULL, 'Joseph Chester', NULL, NULL, NULL),
(72, '82cc15de-ac36-454d-8d98-1b67c36460b6', 'Aleksandra_Preston4957@famism.biz', NULL, '65', NULL, NULL, NULL, NULL, 'Aleksandra Preston', NULL, NULL, NULL),
(73, '47a68c04-e9b0-4485-8e84-b98e1ce98b4c', 'Abbey_Lindsay6086@sveldo.biz', NULL, '66', NULL, NULL, NULL, NULL, 'Abbey Lindsay', NULL, NULL, NULL),
(74, '850007b5-2ca8-406f-b278-a2f08a500f3f', 'Goldie_Ellery8413@sheye.org', NULL, '67', NULL, NULL, NULL, NULL, 'Goldie Ellery', NULL, NULL, NULL),
(75, 'da257ff1-135f-4727-9394-c045bc0236b2', 'Carolyn_Phillips2113@gembat.biz', NULL, '68', NULL, NULL, NULL, NULL, 'Carolyn Phillips', NULL, NULL, NULL),
(76, '9fc600eb-2a99-4ccb-8022-788e26fc28d1', 'Rufus_Warner2441@gmail.com', NULL, '69', NULL, NULL, NULL, NULL, 'Rufus Warner', NULL, NULL, NULL),
(77, 'e644a783-275f-4770-9515-af4d4c2fa8a6', 'Lana_Wood3476@corti.com', NULL, '70', NULL, NULL, NULL, NULL, 'Lana Wood', NULL, NULL, NULL),
(78, '6ef9e65a-d90c-48fa-b8b9-1d8c93a53378', 'John_Hunt2763@zorer.org', NULL, '71', NULL, NULL, NULL, NULL, 'John Hunt', NULL, NULL, NULL),
(79, 'c761a81f-d796-492b-9ce6-944ae6ff5e28', 'Naomi_Wills2199@liret.org', NULL, '72', NULL, NULL, NULL, NULL, 'Naomi Wills', NULL, NULL, NULL),
(80, 'f5e12b68-7de3-4fb2-acc2-f999390dc6dd', 'Deborah_Ingham8912@dionrab.com', NULL, '73', NULL, NULL, NULL, NULL, 'Deborah Ingham', NULL, NULL, NULL),
(81, '1e2f4996-704a-4802-a5cf-dd80114fe1f3', 'Bart_Riley4331@atink.com', NULL, '74', NULL, NULL, NULL, NULL, 'Bart Riley', NULL, NULL, NULL),
(82, '4cea1abd-0e4d-4184-9c67-3da9e2990c00', 'Ally_Neville2265@twace.org', NULL, '75', NULL, NULL, NULL, NULL, 'Ally Neville', NULL, NULL, NULL),
(83, 'c433a123-9c03-4e94-b61a-bf1f9cf814e8', 'Harry_Burnley1161@nimogy.biz', NULL, '76', NULL, NULL, NULL, NULL, 'Harry Burnley', NULL, NULL, NULL),
(84, 'bef24e4f-655c-44eb-9ee2-b3a6c815186c', 'Emerald_Connor1249@brety.org', NULL, '77', NULL, NULL, NULL, NULL, 'Emerald Connor', NULL, NULL, NULL),
(85, 'e56ae669-cc67-4694-a6fc-ffcd7ae0ab62', 'Jaylene_Hunt9797@iatim.tech', NULL, '78', NULL, NULL, NULL, NULL, 'Jaylene Hunt', NULL, NULL, NULL),
(86, 'b90f01b8-0de4-4c67-9868-72066931edbf', 'Clint_Ellison9774@extex.org', NULL, '79', NULL, NULL, NULL, NULL, 'Clint Ellison', NULL, NULL, NULL),
(87, '0dea2076-9b8d-4cf4-8642-3a022c6b439c', 'Janelle_Young1670@dionrab.com', NULL, '80', NULL, NULL, NULL, NULL, 'Janelle Young', NULL, NULL, NULL),
(88, '6c879e9a-ee90-4ee8-92a4-863ef9ec0dd2', 'Angel_Beal1989@deavo.com', NULL, '81', NULL, NULL, NULL, NULL, 'Angel Beal', NULL, NULL, NULL),
(89, 'ef8d1251-9d57-41af-bd32-c9cfce39ceb6', 'Jamie_Glynn1555@twace.org', NULL, '82', NULL, NULL, NULL, NULL, 'Jamie Glynn', NULL, NULL, NULL),
(90, 'f49e4733-e588-421b-8192-70385faf4c18', 'Daniel_Curtis5276@qater.org', NULL, '83', NULL, NULL, NULL, NULL, 'Daniel Curtis', NULL, NULL, NULL),
(91, '78b2fa52-27bd-427a-8ac1-41f930d02000', 'Nate_Gavin1693@extex.org', NULL, '84', NULL, NULL, NULL, NULL, 'Nate Gavin', NULL, NULL, NULL),
(92, '953c076c-5702-48e2-b3d4-536fe67cf4c7', 'Maxwell_Lucas8028@muall.tech', NULL, '85', NULL, NULL, NULL, NULL, 'Maxwell Lucas', NULL, NULL, NULL),
(93, 'e636fb9c-cbc0-43c0-afa1-659cab0506dd', 'Trisha_Shaw2363@brety.org', NULL, '86', NULL, NULL, NULL, NULL, 'Trisha Shaw', NULL, NULL, NULL),
(94, 'd012fc14-a7e2-41fe-bd1b-5cb79ab4b713', 'Dasha_King387@gmail.com', NULL, '87', NULL, NULL, NULL, NULL, 'Dasha King', NULL, NULL, NULL),
(95, 'ecf9a19e-c29e-4dee-a89b-034b6a12c017', 'Drew_Allen4116@joiniaa.com', NULL, '88', NULL, NULL, NULL, NULL, 'Drew Allen', NULL, NULL, NULL),
(96, 'e0a4b235-187e-480c-86aa-aa782ebcb73e', 'Sonya_Knight8477@deons.tech', NULL, '89', NULL, NULL, NULL, NULL, 'Sonya Knight', NULL, NULL, NULL),
(97, '4f0701f3-c26f-4c4d-bcb3-999edee7af5f', 'Laila_Strong1195@grannar.com', NULL, '90', NULL, NULL, NULL, NULL, 'Laila Strong', NULL, NULL, NULL),
(98, '62e4571d-1c48-4ae0-ba7d-109c62ace039', 'Martin_Henderson1685@deons.tech', NULL, '91', NULL, NULL, NULL, NULL, 'Martin Henderson', NULL, NULL, NULL),
(99, 'e40d5d51-4512-418f-b760-114894c556f5', 'Cedrick_Mcnally5584@kideod.biz', NULL, '92', NULL, NULL, NULL, NULL, 'Cedrick Mcnally', NULL, NULL, NULL),
(100, '28c13254-5fce-41a4-b295-87d0ef7541b7', 'Carol_Hobson4252@joiniaa.com', NULL, '93', NULL, NULL, NULL, NULL, 'Carol Hobson', NULL, NULL, NULL),
(101, '2b44530e-36e1-4903-9f4a-8a2ebf54e90d', 'Phoebe_Cann1485@nanoff.biz', NULL, '94', NULL, NULL, NULL, NULL, 'Phoebe Cann', NULL, NULL, NULL),
(102, '9cab1ff5-1bea-4593-8c1a-56dba7072303', 'Alexander_Roth7648@joiniaa.com', NULL, '95', NULL, NULL, NULL, NULL, 'Alexander Roth', NULL, NULL, NULL),
(103, '119e1d56-fd39-4c0d-82b9-343848d18c73', 'Aiden_Morris7148@famism.biz', NULL, '96', NULL, NULL, NULL, NULL, 'Aiden Morris', NULL, NULL, NULL),
(104, 'ab12d724-577d-4ecf-b8df-64cf18a20ccc', 'Marla_Knight6922@nimogy.biz', NULL, '97', NULL, NULL, NULL, NULL, 'Marla Knight', NULL, NULL, NULL),
(105, '1f93694e-1a62-4406-8d27-453cadd11e25', 'Joseph_White9437@eirey.tech', NULL, '98', NULL, NULL, NULL, NULL, 'Joseph White', NULL, NULL, NULL),
(106, '8dfbd851-e832-43d0-a3d1-be0c50aa325b', 'Adina_Lunt9563@nimogy.biz', NULL, '99', NULL, NULL, NULL, NULL, 'Adina Lunt', NULL, NULL, NULL),
(107, '54828962-7561-4d47-8111-401f60d5fed8', 'Nina_Vinton4353@iatim.tech', NULL, '100', NULL, NULL, NULL, NULL, 'Nina Vinton', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_allowed_roles`
--

CREATE TABLE `user_allowed_roles` (
  `id` bigint UNSIGNED NOT NULL,
  `role_id` int NOT NULL,
  `user_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_allowed_roles`
--

INSERT INTO `user_allowed_roles` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(3, 1, 7, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `work_objects`
--

CREATE TABLE `work_objects` (
  `id` bigint UNSIGNED NOT NULL,
  `type_id` int NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_id` int DEFAULT '1',
  `status_type_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted` tinyint NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `work_objects`
--

INSERT INTO `work_objects` (`id`, `type_id`, `description`, `status_id`, `status_type_id`, `user_id`, `created_at`, `updated_at`, `deleted_at`, `title`, `deleted`) VALUES
(57, 61, NULL, 1, 4, 6, '2021-09-24 08:14:26', '2021-09-24 08:14:54', NULL, 'МаркетОпт', 0),
(58, 61, 'Рррр', 1, 4, 6, '2021-09-24 10:00:43', '2021-10-01 09:18:53', '2021-10-01 09:18:53', 'МаркетСталик17', 0),
(59, 63, '555', 1, 1, 6, '2021-09-24 17:58:15', '2021-09-24 18:12:22', '2021-09-24 18:12:22', 'Buh1', 0),
(60, 63, 'fff87mm87', 1, 1, 6, '2021-09-24 18:18:57', '2021-10-01 09:10:39', '2021-10-01 09:10:39', 'Mk2', 0);

-- --------------------------------------------------------

--
-- Table structure for table `work_object_types`
--

CREATE TABLE `work_object_types` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `work_object_types`
--

INSERT INTO `work_object_types` (`id`, `title`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(61, 'МаркетОпт', 6, '2021-09-24 08:12:56', '2021-09-24 08:12:56', NULL),
(62, 'Видео', 6, '2021-09-24 17:52:28', '2021-09-24 17:52:28', NULL),
(63, 'маркет2', 6, '2021-09-24 17:53:50', '2021-09-24 17:53:50', NULL),
(64, '11', 7, '2021-10-01 08:04:37', '2021-10-01 08:04:37', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enumerations`
--
ALTER TABLE `enumerations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enumeration_data`
--
ALTER TABLE `enumeration_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `field_formats`
--
ALTER TABLE `field_formats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `histories`
--
ALTER TABLE `histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_types`
--
ALTER TABLE `status_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_statuses`
--
ALTER TABLE `task_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_user`
--
ALTER TABLE `task_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_fields`
--
ALTER TABLE `type_fields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_field_work_object_type`
--
ALTER TABLE `type_field_work_object_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_settings`
--
ALTER TABLE `type_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_allowed_roles`
--
ALTER TABLE `user_allowed_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_objects`
--
ALTER TABLE `work_objects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_object_types`
--
ALTER TABLE `work_object_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `enumerations`
--
ALTER TABLE `enumerations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `enumeration_data`
--
ALTER TABLE `enumeration_data`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `field_formats`
--
ALTER TABLE `field_formats`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `histories`
--
ALTER TABLE `histories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=234;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `status_types`
--
ALTER TABLE `status_types`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `task_statuses`
--
ALTER TABLE `task_statuses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `task_user`
--
ALTER TABLE `task_user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `type_fields`
--
ALTER TABLE `type_fields`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `type_field_work_object_type`
--
ALTER TABLE `type_field_work_object_type`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `type_settings`
--
ALTER TABLE `type_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `user_allowed_roles`
--
ALTER TABLE `user_allowed_roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `work_objects`
--
ALTER TABLE `work_objects`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `work_object_types`
--
ALTER TABLE `work_object_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
