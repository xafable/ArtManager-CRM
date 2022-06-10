-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 23, 2021 at 10:35 PM
-- Server version: 8.0.19
-- PHP Version: 8.0.1

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(15, 5, 'Лунь', '2021-09-24 17:51:16', '2021-09-24 17:51:16'),
(16, 1, 'Киев', '2021-12-16 16:16:06', '2021-12-16 16:16:06');

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
  `deleted_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `extension` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `type`, `url`, `work_object_id`, `created_at`, `updated_at`, `deleted_at`, `title`, `extension`) VALUES
(74, 'image', '/uploads33/71600_ifs_tech_class_error.png', 33, '2021-07-05 13:08:45', '2021-07-05 13:08:45', NULL, '71600_ifs_tech_class_error.png', 'png'),
(75, 'image', '/uploads/33/8976_1.png', 33, '2021-07-05 13:09:17', '2021-07-05 13:09:17', NULL, '8976_1.png', 'png'),
(76, 'image', '/uploads/31/41323_555.png', 31, '2021-07-27 10:22:42', '2021-07-27 10:22:42', NULL, '41323_555.png', 'png'),
(77, 'image', '/uploads/35/54725_54545.png', 35, '2021-07-28 10:41:10', '2021-07-28 10:41:10', NULL, '54725_54545.png', 'png'),
(78, 'image', '/uploads/38/78745_artmanager.sql', 38, '2021-08-04 10:52:02', '2021-08-04 10:52:02', NULL, '78745_artmanager.sql', 'sql'),
(79, 'image', '/uploads/38/13273_555.png', 38, '2021-08-04 10:52:52', '2021-08-04 10:52:52', NULL, '13273_555.png', 'png'),
(80, 'image', '/uploads/38/89026_2222222.png', 38, '2021-08-04 10:53:31', '2021-08-04 10:53:31', NULL, '89026_2222222.png', 'png'),
(81, 'image', '/uploads/39/64320_gruppmo.jpg', 39, '2021-08-04 10:54:10', '2021-08-04 10:54:10', NULL, '64320_gruppmo.jpg', 'jpg'),
(82, 'image', '/uploads/45/73048_54545.png', 45, '2021-08-11 08:09:26', '2021-08-11 08:09:26', NULL, '73048_54545.png', 'png'),
(83, 'image', '/uploads/56/80605_IMG_20210918_105026.jpg', 56, '2021-09-18 14:59:24', '2021-09-18 14:59:24', NULL, '80605_IMG_20210918_105026.jpg', 'jpg'),
(84, 'image', '/uploads/57/91692_IMG_20210810_185308.jpg', 57, '2021-09-24 09:24:22', '2021-09-24 09:24:22', NULL, '91692_IMG_20210810_185308.jpg', 'jpg'),
(85, 'image', '/uploads/57/62841_16325163607698674100412369666075.jpg', 57, '2021-09-24 17:46:13', '2021-09-24 17:46:13', NULL, '62841_16325163607698674100412369666075.jpg', 'jpg'),
(86, 'image', '/uploads/60/92062_IMG_20210924_214441.jpg', 60, '2021-09-24 19:24:39', '2021-09-24 19:24:39', NULL, '92062_IMG_20210924_214441.jpg', 'jpg'),
(87, 'image', '/uploads/60/40340_IMG_20210924_214441.jpg', 60, '2021-09-24 19:26:01', '2021-09-24 19:26:01', NULL, '40340_IMG_20210924_214441.jpg', 'jpg'),
(88, 'image', '/uploads/61/24698_artmanager_.sql', 61, '2021-12-10 18:55:04', '2021-12-10 18:55:04', NULL, '24698_artmanager_.sql', 'sql');

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
(243, 62, 'App\\Models\\WorkObject', 'App\\Models\\WorkObject', 'description', '{\"id\":62,\"type_id\":65,\"description\":\"\",\"status_id\":1,\"status_type_id\":1,\"user_id\":7,\"created_at\":\"2021-12-23T12:49:56.000000Z\",\"updated_at\":\"2021-12-23T12:49:56.000000Z\",\"deleted_at\":null,\"title\":\"MarketOpt\",\"deleted\":0}', '{\"id\":62,\"type_id\":65,\"description\":\"Some Dscription\",\"status_id\":\"1\",\"status_type_id\":1,\"user_id\":7,\"created_at\":\"2021-12-23T12:49:56.000000Z\",\"updated_at\":\"2021-12-23T12:50:13.000000Z\",\"deleted_at\":null,\"title\":\"MarketOpt\",\"deleted\":0}', 'updated', 7, '2021-12-23 10:50:13', '2021-12-23 10:50:13'),
(244, 62, 'App\\Models\\WorkObject', 'App\\Models\\Attribute', 'kod-obekta', '{\"kod-obekta\":\"\"}', '{\"kod-obekta\":\"45-12.3\"}', 'updated', 7, '2021-12-23 10:57:21', '2021-12-23 10:57:21'),
(245, 62, 'App\\Models\\WorkObject', 'App\\Models\\Attribute', 'edrpu', '{\"edrpu\":\"\"}', '{\"edrpu\":\"3309\"}', 'updated', 7, '2021-12-23 10:57:21', '2021-12-23 10:57:21'),
(246, 62, 'App\\Models\\WorkObject', 'App\\Models\\Attribute', 'pozarka', '{\"pozarka\":\"\"}', '{\"pozarka\":\"1\"}', 'updated', 7, '2021-12-23 10:57:21', '2021-12-23 10:57:21'),
(247, 62, 'App\\Models\\WorkObject', 'App\\Models\\Attribute', 'koordinaty', '{\"koordinaty\":\"\"}', '{\"koordinaty\":null}', 'updated', 7, '2021-12-23 10:57:21', '2021-12-23 10:57:21'),
(248, 62, 'App\\Models\\WorkObject', 'App\\Models\\Task', 'task', '', '{\"description\":\" \",\"priority\":1,\"status_id\":1,\"title\":\"\\u041e\\u0441\\u043c\\u043e\\u0442\\u0440\",\"work_object_id\":\"62\",\"updated_at\":\"2021-12-23T12:57:41.000000Z\",\"created_at\":\"2021-12-23T12:57:41.000000Z\",\"id\":20}', 'created', 7, '2021-12-23 10:57:41', '2021-12-23 10:57:41'),
(249, 62, 'App\\Models\\WorkObject', 'App\\Models\\WorkObject', 'description', '{\"id\":62,\"type_id\":65,\"description\":\"Some Dscription\",\"status_id\":1,\"status_type_id\":1,\"user_id\":7,\"created_at\":\"2021-12-23T12:49:56.000000Z\",\"updated_at\":\"2021-12-23T12:50:13.000000Z\",\"deleted_at\":null,\"title\":\"MarketOpt\",\"deleted\":0}', '{\"id\":62,\"type_id\":65,\"description\":\"Some Description\",\"status_id\":\"1\",\"status_type_id\":1,\"user_id\":7,\"created_at\":\"2021-12-23T12:49:56.000000Z\",\"updated_at\":\"2021-12-23T16:38:03.000000Z\",\"deleted_at\":null,\"title\":\"MarketOpt\",\"deleted\":0}', 'updated', 7, '2021-12-23 14:38:03', '2021-12-23 14:38:03');

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
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 7),
(1, 'App\\Models\\User', 8),
(1, 'App\\Models\\User', 108),
(2, 'App\\Models\\User', 109);

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
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `comment`, `created_at`, `updated_at`) VALUES
(1, 'view field62', 'web', 'field', '2021-12-12 15:02:23', '2021-12-12 15:02:23'),
(2, 'view field63', 'web', 'field', '2021-12-12 15:02:23', '2021-12-12 15:02:23'),
(3, 'view field56', 'web', 'field', '2021-12-12 15:02:23', '2021-12-12 15:02:23'),
(4, 'view field64', 'web', 'field', '2021-12-12 15:02:24', '2021-12-12 15:02:24'),
(5, 'view field65', 'web', 'field', '2021-12-12 15:02:24', '2021-12-12 15:02:24'),
(6, 'update workObject', 'web', 'workObject', '2021-12-18 12:50:07', '2021-12-18 12:50:07'),
(7, 'delete workObject', 'web', 'workObject', '2021-12-18 12:50:07', '2021-12-18 12:50:07'),
(8, 'create workObject', 'web', 'workObject', '2021-12-18 12:50:07', '2021-12-18 12:50:07'),
(9, 'view workObject', 'web', 'workObject', '2021-12-18 12:50:07', '2021-12-18 12:50:07'),
(10, 'update workObjectType', 'web', 'workObjectType', '2021-12-20 17:43:10', '2021-12-20 17:43:10'),
(11, 'delete workObjectType', 'web', 'workObjectType', '2021-12-20 17:43:10', '2021-12-20 17:43:10'),
(12, 'create workObjectType', 'web', 'workObjectType', '2021-12-20 17:43:10', '2021-12-20 17:43:10'),
(13, 'view workObjectType', 'web', 'workObjectType', '2021-12-20 17:43:10', '2021-12-20 17:43:10'),
(14, 'update statusType', 'web', 'statusType', '2021-12-20 17:43:10', '2021-12-20 17:43:10'),
(15, 'delete statusType', 'web', 'statusType', '2021-12-20 17:43:10', '2021-12-20 17:43:10'),
(16, 'create statusType', 'web', 'statusType', '2021-12-20 17:43:10', '2021-12-20 17:43:10'),
(17, 'view statusType', 'web', 'statusType', '2021-12-20 17:43:10', '2021-12-20 17:43:10'),
(18, 'view Objects by WoType61', 'web', 'Objects by WoType', '2021-12-22 17:21:39', '2021-12-22 17:21:39'),
(19, 'view Objects by WoType62', 'web', 'Objects by WoType', '2021-12-22 17:41:32', '2021-12-22 17:41:32'),
(20, 'view field66', 'web', 'field', '2021-12-22 17:42:41', '2021-12-22 17:42:41'),
(21, 'view Objects by WoType60', 'web', 'Objects by WoType', '2021-12-22 17:42:41', '2021-12-22 17:42:41'),
(22, 'view Objects by WoType64', 'web', 'Objects by WoType', '2021-12-23 10:12:18', '2021-12-23 10:12:18'),
(23, 'view field70', 'web', 'field', '2021-12-23 10:50:27', '2021-12-23 10:50:27'),
(24, 'view field71', 'web', 'field', '2021-12-23 10:50:27', '2021-12-23 10:50:27'),
(25, 'view field72', 'web', 'field', '2021-12-23 10:50:27', '2021-12-23 10:50:27'),
(26, 'view field73', 'web', 'field', '2021-12-23 10:50:27', '2021-12-23 10:50:27'),
(27, 'view Objects by WoType65', 'web', 'Objects by WoType', '2021-12-23 10:50:27', '2021-12-23 10:50:27');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2021-12-09 12:21:34', '2021-12-09 12:21:34'),
(2, 'Viewer', 'web', '2021-12-10 06:47:38', '2021-12-10 06:47:38'),
(3, 'Manager', 'web', '2021-12-10 12:51:32', '2021-12-10 12:51:32'),
(4, 'test1', 'web', '2021-12-23 10:34:48', '2021-12-23 10:34:48');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(9, 2),
(13, 2),
(17, 2),
(18, 2),
(19, 2),
(20, 2),
(21, 2),
(27, 2),
(7, 3),
(8, 3),
(9, 3);

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
(20, 'Осмотр', 'Осмотреть', '2021-12-23 10:57:41', '2021-12-23 16:40:08', 1, 2, '2021-12-29 00:00:00', '2021-12-30 00:00:00', 62, NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `task_user`
--

INSERT INTO `task_user` (`id`, `task_id`, `user_id`) VALUES
(71, 20, 109),
(72, 20, 7);

-- --------------------------------------------------------

--
-- Table structure for table `tbot`
--

CREATE TABLE `tbot` (
  `text` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbot`
--

INSERT INTO `tbot` (`text`) VALUES
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
(70, 'kod-obekta', 'Код объекта', 1, 0, 1, 1, NULL, '2021-12-23 10:49:35', '2021-12-23 10:49:35'),
(71, 'edrpu', 'ЭДРПУ', 1, 0, 1, 1, NULL, '2021-12-23 10:49:35', '2021-12-23 10:49:35'),
(72, 'pozarka', 'Пожарка', 3, 0, 1, 1, NULL, '2021-12-23 10:49:35', '2021-12-23 10:49:35'),
(73, 'koordinaty', 'Координаты', 1, 0, 1, 1, NULL, '2021-12-23 10:49:35', '2021-12-23 10:49:35');

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
(38, 70, 65, 1),
(39, 71, 65, 1),
(40, 72, 65, 1),
(41, 73, 65, 1);

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
(9, 65, 1, '2021-12-23 10:48:26', '2021-12-23 10:49:35');

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
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telegram_chat_id` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `google_id`, `fio`, `avatar`, `telegram_chat_id`) VALUES
(7, 'admin', 'admin@admin', NULL, '$2y$10$4Z4xNKJ4VZSBGIk118FvMOBnD5D9WewsUgvs6TeTun/h7RESbMqOu', 'bYNveWEcBhZ3Ea79J5CqwID1hw92v4x969QYo5foSwIl1YR5YfrbfGYnD4F8', '2021-07-27 10:09:20', '2021-07-27 10:09:20', NULL, 'admin', NULL, NULL),
(8, '102645387157216467423', 'bodya.alekseevich@gmail.com', NULL, '$2y$10$JBRP.TnOczzcdD9cbGewoukPmhFmUZ7ZY28K1gXotrRXwlfzSSZ3m', 'G3fEhUQ8sCtLnsD0pkjYw7LtfKQb53whU98ayrByDnxYqZYIVtX9t3RREJmv', '2021-09-18 14:56:00', '2021-09-18 14:56:00', '102645387157216467423', 'Богдан Алексеевич', 'https://lh3.googleusercontent.com/a-/AOh14GhxSa9KA3dh_X412n-Hebx0Dg4zryxibaj5G5e5EQ=s96-c', '219605422'),
(9, '8bc51dc4-4c64-4476-a149-47ccb2999b0b', 'Ally_Murphy9151@atink.com', NULL, '2', NULL, NULL, NULL, NULL, 'Ally Murphy', NULL, NULL),
(101, '2b44530e-36e1-4903-9f4a-8a2ebf54e90d', 'Phoebe_Cann1485@nanoff.biz', NULL, '94', NULL, NULL, NULL, NULL, 'Phoebe Cann', NULL, NULL),
(102, '9cab1ff5-1bea-4593-8c1a-56dba7072303', 'Alexander_Roth7648@joiniaa.com', NULL, '95', NULL, NULL, NULL, NULL, 'Alexander Roth', NULL, NULL),
(105, '1f93694e-1a62-4406-8d27-453cadd11e25', 'Joseph_White9437@eirey.tech', NULL, '98', NULL, NULL, NULL, NULL, 'Joseph White', NULL, NULL),
(109, '111314692680120606412', 'xafable55@gmail.com', NULL, '$2y$10$ir1QtlsNxdQLfGhPI4lQMu7QvVsrRYsA5VHNj/YxNlhCatAbVwxYm', 'bKjUx8Wk5DTenHMpsOR5cXrmTtk20wMBmm2ypGaUa4YayIUK3bD1aWuJbJvo', '2021-12-23 10:44:54', '2021-12-23 10:44:54', '111314692680120606412', 'Олег Рахубовский', 'https://lh3.googleusercontent.com/a-/AOh14Gh1gnoHAR_x02Qphel5VI1u4R4AAW8y9NV7YvYe0g=s96-c', NULL);

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
(3, 1, 7, NULL, NULL),
(6, 2, 6, NULL, NULL),
(7, 3, 6, NULL, NULL),
(8, 2, 7, NULL, NULL),
(9, 3, 7, NULL, NULL),
(10, 1, 6, NULL, NULL),
(11, 1, 108, NULL, NULL),
(12, 2, 108, NULL, NULL),
(13, 3, 108, NULL, NULL),
(14, 4, 108, NULL, NULL),
(15, 1, 8, NULL, NULL),
(16, 2, 8, NULL, NULL),
(17, 3, 8, NULL, NULL);

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
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `work_objects`
--

INSERT INTO `work_objects` (`id`, `type_id`, `description`, `status_id`, `status_type_id`, `user_id`, `created_at`, `updated_at`, `deleted_at`, `title`) VALUES
(62, 65, 'Some Description', 1, 1, 7, '2021-12-23 10:49:56', '2021-12-23 16:40:08', NULL, 'MarketOpt');

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
(65, 'MainTemplate', 7, '2021-12-23 10:48:26', '2021-12-23 10:48:26', NULL);

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `enumerations`
--
ALTER TABLE `enumerations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `enumeration_data`
--
ALTER TABLE `enumeration_data`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `histories`
--
ALTER TABLE `histories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `task_statuses`
--
ALTER TABLE `task_statuses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `task_user`
--
ALTER TABLE `task_user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `type_fields`
--
ALTER TABLE `type_fields`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `type_field_work_object_type`
--
ALTER TABLE `type_field_work_object_type`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `type_settings`
--
ALTER TABLE `type_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `user_allowed_roles`
--
ALTER TABLE `user_allowed_roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `work_objects`
--
ALTER TABLE `work_objects`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `work_object_types`
--
ALTER TABLE `work_object_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

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
