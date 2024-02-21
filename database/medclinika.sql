-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 20 2022 г., 19:14
-- Версия сервера: 10.4.19-MariaDB
-- Версия PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `medclinika`
--

-- --------------------------------------------------------

--
-- Структура таблицы `appointment`
--

CREATE TABLE `appointment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `cabinet_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `time` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `appointment`
--

INSERT INTO `appointment` (`id`, `doctor_id`, `user_id`, `cabinet_id`, `date`, `time`, `created_at`, `updated_at`) VALUES
(8, 5, 10, 311, '2022-06-16', '18:30', '2022-06-16 05:15:24', '2022-06-20 06:56:52'),
(9, 5, 10, 311, '2022-06-16', '17:30', '2022-06-18 02:08:13', '2022-06-18 02:08:13'),
(10, 3, 11, 211, '2022-06-14', '12:30', '2022-06-18 04:45:29', '2022-06-18 04:45:29'),
(11, 3, 11, 211, '2022-06-14', '11:30', '2022-06-18 05:14:27', '2022-06-18 05:14:27');

-- --------------------------------------------------------

--
-- Структура таблицы `cabinets`
--

CREATE TABLE `cabinets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `floor` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `cabinets`
--

INSERT INTO `cabinets` (`id`, `phone`, `floor`, `created_at`, `updated_at`) VALUES
(111, '89123345246', 1, NULL, '2022-06-19 16:03:27'),
(123, NULL, 1, '2022-06-20 08:33:25', '2022-06-20 08:33:25'),
(211, '89111111111', 2, NULL, NULL),
(311, '89122222222', 3, NULL, NULL),
(411, '89123333333', 4, NULL, NULL),
(511, '89123333334', 1, NULL, NULL),
(611, '89123333335', 2, NULL, NULL),
(711, '89123333341', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patronymic` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `speciality_id` bigint(20) UNSIGNED NOT NULL,
  `cabinet_id` bigint(20) UNSIGNED NOT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `licenz` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `doctors`
--

INSERT INTO `doctors` (`id`, `first_name`, `last_name`, `patronymic`, `speciality_id`, `cabinet_id`, `photo`, `licenz`, `created_at`, `updated_at`) VALUES
(1, 'Иван', 'Ерофеев', 'Петрович', 1, 111, 'docm1.png', 'lic1.png', NULL, '2022-06-19 13:39:18'),
(2, 'Светлана', 'Никанорова', 'Андреевна', 2, 411, 'docj1.png', 'lic2.png', NULL, NULL),
(3, 'Андрей', 'Шапкин', 'Сергеевич', 3, 311, 'docm2.png', 'lic3.png', NULL, NULL),
(4, 'Игорь', 'Светлов', 'Вячеславович', 5, 211, 'docm3.png', 'lic4.png', NULL, NULL),
(5, 'Елена', 'Борисова', 'Ивановна', 4, 511, 'docj2.png', 'lic5.png', NULL, NULL),
(6, 'Александр', 'Андреев', 'Иванович', 1, 611, 'docm4.png', 'lic6.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2021_10_02_062729_create_tovars_table', 1),
(3, '2022_03_11_033308_create_users_table', 2),
(4, '2022_03_14_031822_create_orders_table', 3),
(5, '2022_03_14_031953_create_cards_table', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `schedule`
--

CREATE TABLE `schedule` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `mon` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tue` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wed` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thu` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fri` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sat` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT '-',
  `sun` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT '-',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `schedule`
--

INSERT INTO `schedule` (`id`, `doctor_id`, `mon`, `tue`, `wed`, `thu`, `fri`, `sat`, `sun`, `created_at`, `updated_at`) VALUES
(1, 1, '08:00-13:00', '14:00-19:00', '08:00-13:00', '-', '14:00-19:00', '-', '-', NULL, NULL),
(2, 2, '08:00-13:00', '14:00-19:00', '08:00-13:00', '14:00-19:00', '-', '-', '-', NULL, NULL),
(3, 3, '14:00-19:00', '08:00-13:00', '14:00-19:00', '-', '08:00-13:00', '-', '-', NULL, NULL),
(4, 4, '14:00-19:00', '08:00-13:00', '-', '08:00-13:00', '14:00-19:00', '-', '-', NULL, NULL),
(5, 5, '08:00-13:00', '-', '08:00-13:00', '14:00-19:00', '14:00-19:00', '-', '-', NULL, NULL),
(6, 6, '08:00-13:00', '14:00-19:00', '08:00-13:00', '14:00-19:00', '-', '-', '-', NULL, '2022-06-20 09:24:48');

-- --------------------------------------------------------

--
-- Структура таблицы `specialities`
--

CREATE TABLE `specialities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `specialities`
--

INSERT INTO `specialities` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Терапевт', NULL, '2022-06-19 16:02:49'),
(2, 'Невролог', NULL, NULL),
(3, 'Хирург', NULL, NULL),
(4, 'Офтальмолог', NULL, NULL),
(5, 'Эндокринолог', NULL, NULL),
(6, 'Кардиолог', '2022-06-20 08:43:47', '2022-06-20 08:43:47');

-- --------------------------------------------------------

--
-- Структура таблицы `timetable`
--

CREATE TABLE `timetable` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date` date NOT NULL,
  `time` enum('-','08:00','08:30','09:00','09:30','10:00','10:30','11:00','11:30','12:00','12:30','14:00','14:30','15:00','15:30','16:00','16:30','17:00','17:30','18:00','18:30') COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `timetable`
--


INSERT INTO `timetable` (`id`, `doctor_id`, `date`, `time`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-10-20', '08:00', NULL, NULL, NULL),
(2, 1, '2023-10-20', '08:30', 8, NULL, '2021-12-05 08:25:54'),
(3, 1, '2023-10-20', '09:00', NULL, NULL, '2023-10-20 11:12:54'),
(4, 1, '2023-10-20', '09:30', NULL, NULL, NULL),
(5, 1, '2023-10-20', '10:00', NULL, NULL, NULL),
(6, 1, '2023-10-20', '10:30', NULL, NULL, NULL),
(7, 1, '2023-10-20', '11:00', NULL, NULL, NULL),
(8, 1, '2023-10-20', '11:30', NULL, NULL, NULL),
(9, 1, '2023-10-20', '12:00', NULL, NULL, NULL),
(10, 1, '2023-10-20', '12:30', NULL, NULL, NULL),
(11, 1, '2023-10-21', '14:00', NULL, NULL, NULL),
(12, 1, '2023-10-21', '14:30', NULL, NULL, NULL),
(13, 1, '2023-10-21', '15:00', NULL, NULL, NULL),
(14, 1, '2023-10-21', '15:30', NULL, NULL, NULL),
(15, 1, '2023-10-21', '16:00', NULL, NULL, NULL),
(16, 1, '2023-10-21', '16:30', NULL, NULL, NULL),
(17, 1, '2023-10-21', '17:00', NULL, NULL, NULL),
(18, 1, '2023-10-21', '17:30', NULL, NULL, NULL),
(19, 1, '2023-10-21', '18:00', NULL, NULL, NULL),
(20, 1, '2023-10-21', '18:30', NULL, NULL, NULL),
(21, 1, '2023-10-22', '08:00', NULL, NULL, NULL),
(22, 1, '2023-10-22', '08:30', NULL, NULL, NULL),
(23, 1, '2023-10-22', '09:00', NULL, NULL, NULL),
(24, 1, '2023-10-22', '09:30', NULL, NULL, NULL),
(25, 1, '2023-10-22', '10:00', NULL, NULL, NULL),
(26, 1, '2023-10-22', '10:30', NULL, NULL, NULL),
(27, 1, '2023-10-22', '11:00', NULL, NULL, NULL),
(28, 1, '2023-10-22', '11:30', NULL, NULL, NULL),
(29, 1, '2023-10-22', '12:00', NULL, NULL, NULL),
(30, 1, '2023-10-22', '12:30', NULL, NULL, NULL),
(31, 1, '2023-10-24', '14:00', NULL, NULL, NULL),
(32, 1, '2023-10-24', '14:30', NULL, NULL, NULL),
(33, 1, '2023-10-24', '15:00', NULL, NULL, NULL),
(34, 1, '2023-10-24', '15:30', NULL, NULL, NULL),
(35, 1, '2023-10-24', '16:00', NULL, NULL, NULL),
(36, 1, '2023-10-24', '16:30', NULL, NULL, NULL),
(37, 1, '2023-10-24', '17:00', NULL, NULL, NULL),
(38, 1, '2023-10-24', '17:30', NULL, NULL, NULL),
(39, 1, '2023-10-24', '18:00', NULL, NULL, NULL),
(40, 1, '2023-10-24', '18:30', NULL, NULL, NULL),
(41, 2, '2023-10-20', '08:00', NULL, NULL, NULL),
(42, 2, '2023-10-20', '08:30', NULL, NULL, NULL),
(43, 2, '2023-10-20', '09:00', NULL, NULL, NULL),
(44, 2, '2023-10-20', '09:30', NULL, NULL, NULL),
(45, 2, '2023-10-20', '10:00', NULL, NULL, NULL),
(46, 2, '2023-10-20', '10:30', NULL, NULL, NULL),
(47, 2, '2023-10-20', '11:00', NULL, NULL, NULL),
(48, 2, '2023-10-20', '11:30', NULL, NULL, NULL),
(49, 2, '2023-10-20', '12:00', NULL, NULL, NULL),
(50, 2, '2023-10-20', '12:30', NULL, NULL, NULL),
(51, 2, '2023-10-21', '14:00', NULL, NULL, NULL),
(52, 2, '2023-10-21', '14:30', NULL, NULL, NULL),
(53, 2, '2023-10-21', '15:00', NULL, NULL, NULL),
(54, 2, '2023-10-21', '15:30', NULL, NULL, NULL),
(55, 2, '2023-10-21', '16:00', NULL, NULL, NULL),
(56, 2, '2023-10-21', '16:30', NULL, NULL, NULL),
(57, 2, '2023-10-21', '17:00', NULL, NULL, NULL),
(58, 2, '2023-10-21', '17:30', NULL, NULL, NULL),
(59, 2, '2023-10-21', '18:00', NULL, NULL, NULL),
(60, 2, '2023-10-21', '18:30', NULL, NULL, NULL),
(61, 2, '2023-10-22', '08:00', NULL, NULL, NULL),
(62, 2, '2023-10-22', '08:30', NULL, NULL, NULL),
(63, 2, '2023-10-22', '09:00', NULL, NULL, NULL),
(64, 2, '2023-10-22', '09:30', NULL, NULL, NULL),
(65, 2, '2023-10-22', '10:00', NULL, NULL, NULL),
(66, 2, '2023-10-22', '10:30', NULL, NULL, NULL),
(67, 2, '2023-10-22', '11:00', NULL, NULL, NULL),
(68, 2, '2023-10-22', '11:30', NULL, NULL, NULL),
(69, 2, '2023-10-22', '12:00', NULL, NULL, NULL),
(70, 2, '2023-10-22', '12:30', NULL, NULL, NULL),
(71, 2, '2023-10-23', '14:00', NULL, NULL, NULL),
(72, 2, '2023-10-23', '14:30', NULL, NULL, NULL),
(73, 2, '2023-10-23', '15:00', NULL, NULL, NULL),
(74, 2, '2023-10-23', '15:30', NULL, NULL, NULL),
(75, 2, '2023-10-23', '16:00', NULL, NULL, NULL),
(76, 2, '2023-10-23', '16:30', NULL, NULL, NULL),
(77, 2, '2023-10-23', '17:00', NULL, NULL, NULL),
(78, 2, '2023-10-23', '17:30', NULL, NULL, NULL),
(79, 2, '2023-10-23', '18:00', NULL, NULL, NULL),
(80, 2, '2023-10-23', '18:30', NULL, NULL, NULL),
(81, 3, '2023-10-20', '14:00', NULL, NULL, NULL),
(82, 3, '2023-10-20', '14:30', NULL, NULL, NULL),
(83, 3, '2023-10-20', '15:00', NULL, NULL, NULL),
(84, 3, '2023-10-20', '15:30', NULL, NULL, NULL),
(85, 3, '2023-10-20', '16:00', NULL, NULL, NULL),
(86, 3, '2023-10-20', '16:30', NULL, NULL, NULL),
(87, 3, '2023-10-20', '17:00', NULL, NULL, NULL),
(88, 3, '2023-10-20', '17:30', NULL, NULL, NULL),
(89, 3, '2023-10-20', '18:00', NULL, NULL, NULL),
(90, 3, '2023-10-20', '18:30', NULL, NULL, NULL),
(91, 3, '2023-10-21', '08:00', NULL, NULL, NULL),
(92, 3, '2023-10-21', '08:30', NULL, NULL, NULL),
(93, 3, '2023-10-21', '09:00', NULL, NULL, NULL),
(94, 3, '2023-10-21', '09:30', NULL, NULL, NULL),
(95, 3, '2023-10-21', '10:00', NULL, NULL, NULL),
(96, 3, '2023-10-21', '10:30', NULL, NULL, NULL),
(97, 3, '2023-10-21', '11:00', NULL, NULL, NULL),
(98, 3, '2023-10-21', '11:30', NULL, NULL, NULL),
(99, 3, '2023-10-21', '12:00', NULL, NULL, NULL),
(100, 3, '2023-10-21', '12:30', NULL, NULL, NULL),
(101, 3, '2023-10-22', '14:00', NULL, NULL, NULL),
(102, 3, '2023-10-22', '14:30', NULL, NULL, NULL),
(103, 3, '2023-10-22', '15:00', NULL, NULL, NULL),
(104, 3, '2023-10-22', '15:30', NULL, NULL, NULL),
(105, 3, '2023-10-22', '16:00', NULL, NULL, NULL),
(110, 3, '2023-10-22', '16:30', NULL, NULL, NULL),
(107, 3, '2023-10-22', '17:00', NULL, NULL, NULL),
(108, 3, '2023-10-22', '17:30', NULL, NULL, NULL),
(109, 3, '2023-10-22', '18:00', NULL, NULL, NULL),
(110, 3, '2023-10-22', '18:30', NULL, NULL, NULL),
(111, 3, '2023-10-24', '08:00', 2, NULL, '2021-12-05 08:28:56'),
(112, 3, '2023-10-24', '08:30', 1, NULL, '2021-12-05 08:26:07'),
(113, 3, '2023-10-24', '09:00', 2, NULL, '2021-12-05 09:22:45'),
(114, 3, '2023-10-24', '09:30', NULL, NULL, NULL),
(115, 3, '2023-10-24', '10:00', NULL, NULL, NULL),
(116, 3, '2023-10-24', '10:30', NULL, NULL, NULL),
(117, 3, '2023-10-24', '11:00', NULL, NULL, NULL),
(118, 3, '2023-10-24', '11:30', NULL, NULL, NULL),
(119, 3, '2023-10-24', '12:00', NULL, NULL, NULL),
(120, 3, '2023-10-24', '12:30', NULL, NULL, NULL),
(121, 4, '2023-10-20', '14:00', NULL, NULL, NULL),
(122, 4, '2023-10-20', '14:30', NULL, NULL, NULL),
(123, 4, '2023-10-20', '15:00', NULL, NULL, NULL),
(124, 4, '2023-10-20', '15:30', NULL, NULL, NULL),
(125, 4, '2023-10-20', '16:00', NULL, NULL, NULL),
(126, 4, '2023-10-20', '16:30', NULL, NULL, NULL),
(127, 4, '2023-10-20', '17:00', NULL, NULL, NULL),
(128, 4, '2023-10-20', '17:30', NULL, NULL, NULL),
(129, 4, '2023-10-20', '18:00', NULL, NULL, NULL),
(130, 4, '2023-10-20', '18:30', NULL, NULL, NULL),
(131, 4, '2023-10-21', '08:00', NULL, NULL, NULL),
(132, 4, '2023-10-21', '08:30', NULL, NULL, NULL),
(133, 4, '2023-10-21', '09:00', NULL, NULL, NULL),
(134, 4, '2023-10-21', '09:30', NULL, NULL, NULL),
(135, 4, '2023-10-21', '10:00', NULL, NULL, NULL),
(136, 4, '2023-10-21', '10:30', NULL, NULL, NULL),
(137, 4, '2023-10-21', '11:00', NULL, NULL, NULL),
(138, 4, '2023-10-21', '11:30', NULL, NULL, NULL),
(139, 4, '2023-10-21', '12:00', NULL, NULL, NULL),
(140, 4, '2023-10-21', '12:30', NULL, NULL, NULL),
(141, 4, '2023-10-22', '08:00', NULL, NULL, NULL),
(142, 4, '2023-10-22', '08:30', NULL, NULL, NULL),
(143, 4, '2023-10-22', '09:00', NULL, NULL, NULL),
(144, 4, '2023-10-22', '09:30', NULL, NULL, NULL),
(145, 4, '2023-10-22', '10:00', NULL, NULL, NULL),
(146, 4, '2023-10-22', '10:30', NULL, NULL, NULL),
(147, 4, '2023-10-22', '11:00', NULL, NULL, NULL),
(148, 4, '2023-10-22', '11:30', NULL, NULL, NULL),
(149, 4, '2023-10-22', '12:00', NULL, NULL, NULL),
(150, 4, '2023-10-22', '12:30', NULL, NULL, NULL),
(151, 4, '2023-10-24', '14:00', NULL, NULL, NULL),
(152, 4, '2023-10-24', '14:30', NULL, NULL, NULL),
(153, 4, '2023-10-24', '15:00', NULL, NULL, NULL),
(154, 4, '2023-10-24', '15:30', NULL, NULL, NULL),
(155, 4, '2023-10-24', '16:00', NULL, NULL, NULL),
(156, 4, '2023-10-24', '16:30', NULL, NULL, NULL),
(157, 4, '2023-10-24', '17:00', NULL, NULL, NULL),
(158, 4, '2023-10-24', '17:30', NULL, NULL, NULL),
(159, 4, '2023-10-24', '18:00', NULL, NULL, NULL),
(160, 4, '2023-10-24', '18:30', NULL, NULL, NULL),
(161, 5, '2023-10-20', '08:00', NULL, NULL, NULL),
(162, 5, '2023-10-20', '08:30', NULL, NULL, NULL),
(163, 5, '2023-10-20', '09:00', NULL, NULL, NULL),
(164, 5, '2023-10-20', '09:30', NULL, NULL, NULL),
(165, 5, '2023-10-20', '10:00', NULL, NULL, NULL),
(166, 5, '2023-10-20', '10:30', NULL, NULL, NULL),
(167, 5, '2023-10-20', '11:00', NULL, NULL, NULL),
(168, 5, '2023-10-20', '11:30', NULL, NULL, NULL),
(169, 5, '2023-10-20', '12:00', NULL, NULL, NULL),
(170, 5, '2023-10-20', '12:30', NULL, NULL, NULL),
(171, 5, '2023-10-21', '14:00', NULL, NULL, NULL),
(172, 5, '2023-10-21', '14:30', NULL, NULL, NULL),
(173, 5, '2023-10-21', '15:00', NULL, NULL, NULL),
(174, 5, '2023-10-21', '15:30', NULL, NULL, NULL),
(175, 5, '2023-10-21', '16:00', NULL, NULL, NULL),
(176, 5, '2023-10-21', '16:30', NULL, NULL, NULL),
(177, 5, '2023-10-21', '17:00', NULL, NULL, NULL),
(178, 5, '2023-10-21', '17:30', NULL, NULL, NULL),
(179, 5, '2023-10-21', '18:00', NULL, NULL, NULL),
(180, 5, '2023-10-21', '18:30', NULL, NULL, NULL),
(181, 5, '2023-10-22', '08:00', NULL, NULL, NULL),
(182, 5, '2023-10-22', '08:30', NULL, NULL, NULL),
(183, 5, '2023-10-22', '09:00', NULL, NULL, NULL),
(184, 5, '2023-10-22', '09:30', NULL, NULL, NULL),
(185, 5, '2023-10-22', '10:00', NULL, NULL, NULL),
(186, 5, '2023-10-22', '10:30', NULL, NULL, NULL),
(187, 5, '2023-10-22', '11:00', NULL, NULL, NULL),
(188, 5, '2023-10-22', '11:30', NULL, NULL, NULL),
(189, 5, '2023-10-22', '12:00', NULL, NULL, NULL),
(190, 5, '2023-10-22', '12:30', NULL, NULL, NULL),
(191, 5, '2023-10-24', '14:00', NULL, NULL, NULL),
(192, 5, '2023-10-24', '14:30', NULL, NULL, NULL),
(193, 5, '2023-10-24', '15:00', NULL, NULL, NULL),
(194, 5, '2023-10-24', '15:30', NULL, NULL, NULL),
(195, 5, '2023-10-24', '16:00', NULL, NULL, NULL),
(196, 5, '2023-10-24', '16:30', NULL, NULL, NULL),
(197, 5, '2023-10-24', '17:00', NULL, NULL, NULL),
(198, 5, '2023-10-24', '17:30', NULL, NULL, NULL),
(199, 5, '2023-10-24', '18:00', NULL, NULL, NULL),
(200, 5, '2023-10-24', '18:30', NULL, NULL, NULL),
(201, 3, '2023-10-14', '08:00', NULL, NULL, NULL),
(202, 3, '2023-10-14', '08:30', 8, NULL, '2023-10-15 04:59:13'),
(203, 3, '2023-10-14', '09:00', 8, NULL, '2023-10-15 05:02:09'),
(204, 3, '2023-10-14', '09:30', 8, NULL, '2023-10-15 05:03:10'),
(205, 3, '2023-10-14', '10:00', NULL, NULL, NULL),
(210, 3, '2023-10-14', '10:30', NULL, NULL, NULL),
(207, 3, '2023-10-14', '11:00', NULL, NULL, NULL),
(208, 3, '2023-10-14', '11:30', 11, NULL, '2023-10-18 05:14:27'),
(209, 3, '2023-10-14', '12:00', NULL, NULL, NULL),
(210, 3, '2023-10-14', '12:30', 11, NULL, '2023-10-18 04:45:29'),
(211, 3, '2023-10-13', '14:00', NULL, NULL, NULL),
(212, 3, '2023-10-13', '14:30', NULL, NULL, NULL),
(213, 3, '2023-10-13', '15:00', NULL, NULL, NULL),
(214, 3, '2023-10-13', '15:30', NULL, NULL, NULL),
(215, 3, '2023-10-13', '16:00', NULL, NULL, NULL),
(216, 3, '2023-10-13', '16:30', NULL, NULL, NULL),
(217, 3, '2023-10-13', '17:00', NULL, NULL, NULL),
(218, 3, '2023-10-13', '17:30', NULL, NULL, NULL),
(219, 3, '2023-10-13', '18:00', 8, NULL, '2023-10-15 04:18:48'),
(220, 3, '2023-10-13', '18:30', 6, NULL, NULL),
(221, 5, '2023-10-16', '14:00', 8, NULL, '2023-10-15 05:46:18'),
(222, 5, '2023-10-16', '14:30', 8, NULL, '2023-10-15 09:20:33'),
(223, 5, '2023-10-16', '15:00', NULL, NULL, NULL),
(224, 5, '2023-10-16', '15:30', NULL, NULL, NULL),
(225, 5, '2023-10-16', '16:00', NULL, NULL, NULL),
(226, 5, '2023-10-16', '16:30', NULL, NULL, NULL),
(227, 5, '2023-10-16', '17:00', NULL, NULL, NULL),
(228, 5, '2023-10-16', '17:30', 10, NULL, '2023-10-18 02:08:13'),
(229, 5, '2023-10-16', '18:00', 8, NULL, '2023-10-15 05:50:10'),
(230, 5, '2023-10-16', '18:30', 10, NULL, '2023-10-16 05:15:24'),
(231, 6, '2023-10-20', '08:00', NULL, NULL, NULL),
(232, 6, '2023-10-20', '08:30', NULL, NULL, NULL),
(233, 6, '2023-10-20', '09:00', NULL, NULL, NULL),
(234, 6, '2023-10-20', '09:30', NULL, NULL, NULL),
(235, 6, '2023-10-20', '10:00', NULL, NULL, NULL),
(236, 6, '2023-10-20', '10:30', NULL, NULL, NULL),
(237, 6, '2023-10-20', '11:00', NULL, NULL, NULL),
(238, 6, '2023-10-20', '11:30', NULL, NULL, NULL),
(239, 6, '2023-10-20', '12:00', NULL, NULL, NULL),
(240, 6, '2023-10-20', '12:30', NULL, NULL, NULL),
(241, 6, '2023-10-21', '14:00', NULL, NULL, NULL),
(242, 6, '2023-10-21', '14:30', NULL, NULL, NULL),
(243, 6, '2023-10-21', '15:00', NULL, NULL, NULL),
(244, 6, '2023-10-21', '15:30', NULL, NULL, NULL),
(245, 6, '2023-10-21', '16:00', NULL, NULL, NULL),
(246, 6, '2023-10-21', '16:30', NULL, NULL, NULL),
(247, 6, '2023-10-21', '17:00', NULL, NULL, NULL),
(248, 6, '2023-10-21', '17:30', NULL, NULL, NULL),
(249, 6, '2023-10-21', '18:00', NULL, NULL, NULL),
(250, 6, '2023-10-21', '18:30', NULL, NULL, NULL),
(251, 6, '2023-10-22', '08:00', NULL, NULL, NULL),
(252, 6, '2023-10-22', '08:30', NULL, NULL, NULL),
(253, 6, '2023-10-22', '09:00', NULL, NULL, NULL),
(254, 6, '2023-10-22', '09:30', NULL, NULL, NULL),
(255, 6, '2023-10-22', '10:00', NULL, NULL, NULL),
(256, 6, '2023-10-22', '10:30', NULL, NULL, NULL),
(257, 6, '2023-10-22', '11:00', NULL, NULL, NULL),
(258, 6, '2023-10-22', '11:30', NULL, NULL, NULL),
(259, 6, '2023-10-22', '12:00', NULL, NULL, NULL),
(260, 6, '2023-10-22', '12:30', NULL, NULL, NULL),
(261, 6, '2023-10-23', '14:00', NULL, NULL, NULL),
(262, 6, '2023-10-23', '14:30', NULL, NULL, NULL),
(263, 6, '2023-10-23', '15:00', NULL, NULL, NULL),
(264, 6, '2023-10-23', '15:30', NULL, NULL, NULL),
(265, 6, '2023-10-23', '16:00', NULL, NULL, NULL),
(266, 6, '2023-10-23', '16:30', NULL, NULL, NULL),
(267, 6, '2023-10-23', '17:00', NULL, NULL, NULL),
(268, 6, '2023-10-23', '17:30', NULL, NULL, NULL),
(269, 6, '2023-10-23', '18:00', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patronymic` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bithday` date NOT NULL DEFAULT '2000-01-01',
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pol` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('user','admin') COLLATE utf8mb4_unicode_ci NOT NULL,
  `police` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0000000000000000',
  `adres` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Челябинск',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `patronymic`, `bithday`, `phone`, `pol`, `password`, `role`, `police`, `adres`, `created_at`, `updated_at`) VALUES
(9, 'Илья', 'Черепанов', 'Бахтиярович', '2002-10-13', '+79220181023', 'М', '$2y$10$sNv0BGdWMowzkrYG1oZf.eTXIYAAg4mcMqefqhXEoU6.o3xKmTQzu', 'admin', '1234567890123456', 'Челябинская обл., Челябинск ул.Набережная д.7, кв.76', NULL, NULL),
(10, 'Кирилл', 'Андреев', 'Бахтиярович', '2000-09-08', '89220181023', 'Ж', '$2y$10$sNv0BGdWMowzkrYG1oZf.eTXIYAAg4mcMqefqhXEoU6.o3xKmTQzu', 'user', '1234567890123459', 'Челябинск', NULL, NULL),
(11, 'Данил', 'Подкарытов', 'Арбертокрович', '1999-05-08', '89220181035', 'Ж', '$2y$10$yEsEgb/u7waGzfLAyRzDrekS7SeF1N8ExkCghsdc960kQCW2dd6iu', 'user', '1111111111111111', 'Челябинск', NULL, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointment_doctor_id_foreign` (`doctor_id`),
  ADD KEY `appointment_patient_id_foreign` (`user_id`),
  ADD KEY `appointment_cabinet_id_foreign` (`cabinet_id`);

--
-- Индексы таблицы `cabinets`
--
ALTER TABLE `cabinets`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctors_speciality_id_foreign` (`speciality_id`),
  ADD KEY `doctors_cabinet_id_foreign` (`cabinet_id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `specialities`
--
ALTER TABLE `specialities`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `timetable`
--
ALTER TABLE `timetable`
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
-- AUTO_INCREMENT для таблицы `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `specialities`
--
ALTER TABLE `specialities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `timetable`
--
ALTER TABLE `timetable`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=275;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_cabinet_id_foreign` FOREIGN KEY (`cabinet_id`) REFERENCES `cabinets` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `appointment_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appointment_patient_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_ibfk_1` FOREIGN KEY (`speciality_id`) REFERENCES `specialities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `doctors_ibfk_2` FOREIGN KEY (`cabinet_id`) REFERENCES `cabinets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
