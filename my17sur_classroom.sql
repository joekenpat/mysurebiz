-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 02, 2020 at 06:58 AM
-- Server version: 5.6.47
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my17sur_classroom`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `users_id` int(10) UNSIGNED NOT NULL,
  `function` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`users_id`, `function`, `created_at`, `updated_at`) VALUES
(85, 'Super Admin', '2019-03-08 05:00:00', '2019-03-08 05:00:00'),
(87, 'Super Admin', '2019-05-07 04:00:00', '2019-05-07 04:00:00'),
(90, 'Admin', '2019-05-08 04:00:00', '2019-05-08 04:00:00'),
(99, 'Admin', '2019-07-01 04:00:00', '2019-07-01 04:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `artisans`
--

CREATE TABLE `artisans` (
  `users_id` int(10) UNSIGNED NOT NULL,
  `trade` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artisans`
--

INSERT INTO `artisans` (`users_id`, `trade`, `created_at`, `updated_at`) VALUES
(91, 'Buyer', '2019-03-16 16:12:31', '2019-03-16 16:12:31'),
(98, 'Dhdhdjdjdjdj', '2019-05-18 13:06:01', '2019-05-18 13:06:01'),
(101, 'Import and export', '2019-06-04 17:18:25', '2019-06-04 17:18:25'),
(102, 'Import and export', '2019-06-04 18:39:26', '2019-06-04 18:39:26'),
(103, 'Import and export', '2019-06-04 18:58:03', '2019-06-04 18:58:03'),
(104, 'Bigi company', '2019-06-04 19:24:42', '2019-06-04 19:24:42'),
(105, 'Import and export', '2019-06-04 19:43:44', '2019-06-04 19:43:44'),
(106, 'Import and export', '2019-06-04 20:00:22', '2019-06-04 20:00:22'),
(107, 'sssss', '2019-06-04 21:08:34', '2019-06-04 21:08:34'),
(108, 'Liquid soap and Dettol', '2019-06-06 15:04:46', '2019-06-06 15:04:46'),
(110, 'AasaA', '2019-06-07 23:02:01', '2019-06-07 23:02:01'),
(111, 'Import and export', '2019-06-13 14:44:24', '2019-06-13 14:44:24'),
(112, 'Import and export', '2019-06-13 16:59:24', '2019-06-13 16:59:24'),
(114, 'Electrical', '2019-06-14 02:04:24', '2019-06-14 02:04:24'),
(115, 'Large Production', '2019-06-14 02:24:13', '2019-06-14 02:24:13'),
(116, 'Mobile Eartry', '2019-06-14 02:32:10', '2019-06-14 02:32:10'),
(117, 'Large Supply', '2019-06-14 02:37:31', '2019-06-14 02:37:31'),
(118, 'Import and export', '2019-06-14 13:24:01', '2019-06-14 13:24:01'),
(119, 'Import and export', '2019-06-14 17:57:37', '2019-06-14 17:57:37'),
(120, 'Import and export', '2019-06-14 18:51:20', '2019-06-14 18:51:20'),
(121, 'Import and export', '2019-06-16 20:11:39', '2019-06-16 20:11:39'),
(122, 'Computer and Networking', '2019-06-16 21:47:48', '2019-06-16 21:47:48'),
(123, 'Transport Services', '2019-06-16 22:13:13', '2019-06-16 22:13:13'),
(124, 'Trading', '2019-06-16 23:34:06', '2019-06-16 23:34:06'),
(125, 'Import and export', '2019-06-17 00:30:14', '2019-06-17 00:30:14'),
(126, 'Computer repair and analysis', '2019-06-18 17:13:06', '2019-06-18 17:13:06'),
(127, 'Fabric sales/fashionpreneur', '2019-06-20 03:45:10', '2019-06-20 03:45:10'),
(128, 'Export and import', '2019-06-20 14:55:18', '2019-06-20 14:55:18'),
(130, 'High product', '2019-06-20 17:47:30', '2019-06-20 17:47:30'),
(131, 'Events Decoration', '2019-06-20 20:41:23', '2019-06-20 20:41:23'),
(132, 'fashion store', '2019-06-20 20:59:30', '2019-06-20 20:59:30'),
(133, 'Sjjjjj', '2019-06-21 16:59:34', '2019-06-21 16:59:34'),
(134, 'Large Production', '2019-06-21 17:22:48', '2019-06-21 17:22:48'),
(137, 'Graphics Centre', '2019-06-21 21:43:39', '2019-06-21 21:43:39'),
(138, 'big farm', '2019-06-21 21:51:23', '2019-06-21 21:51:23'),
(139, 'large farming', '2019-06-22 01:48:00', '2019-06-22 01:48:00'),
(140, 'Large Production', '2019-06-22 01:54:51', '2019-06-22 01:54:51'),
(141, 'large format', '2019-06-22 02:23:59', '2019-06-22 02:23:59'),
(144, 'bigshop', '2019-06-22 10:16:26', '2019-06-22 10:16:26'),
(145, 'supplying', '2019-06-22 10:23:36', '2019-06-22 10:23:36'),
(146, 'big farming', '2019-06-22 10:31:19', '2019-06-22 10:31:19'),
(149, 'big farming', '2019-06-22 11:16:25', '2019-06-22 11:16:25'),
(150, 'Bread baking', '2019-06-22 11:26:54', '2019-06-22 11:26:54'),
(151, 'Gas plant', '2019-06-22 11:37:41', '2019-06-22 11:37:41'),
(152, 'big solar power plant', '2019-06-22 11:52:35', '2019-06-22 11:52:35'),
(155, 'big farming', '2019-06-22 12:30:11', '2019-06-22 12:30:11'),
(156, 'Food', '2019-06-22 13:12:55', '2019-06-22 13:12:55'),
(157, 'Fabricator', '2019-06-24 18:15:26', '2019-06-24 18:15:26'),
(158, 'Import and export', '2019-06-25 14:43:25', '2019-06-25 14:43:25'),
(159, 'Big catering shop', '2019-06-25 16:21:56', '2019-06-25 16:21:56'),
(161, 'Famine', '2019-07-01 14:14:49', '2019-07-01 14:14:49'),
(162, 'Driving school', '2019-07-02 18:07:31', '2019-07-02 18:07:31'),
(163, 'Cake making', '2019-07-02 18:33:51', '2019-07-02 18:33:51'),
(164, 'Sound Engineer', '2019-07-05 14:22:06', '2019-07-05 14:22:06'),
(166, 'Service', '2019-07-10 21:03:47', '2019-07-10 21:03:47'),
(167, 'constructing', '2019-07-11 20:34:51', '2019-07-11 20:34:51'),
(168, 'Crops, Livestock and Consultant', '2019-07-12 12:34:28', '2019-07-12 12:34:28'),
(169, 'Service', '2019-07-12 19:29:41', '2019-07-12 19:29:41'),
(171, 'Shawarma,barbeque,asun etc', '2019-07-16 18:53:44', '2019-07-16 18:53:44'),
(172, 'Cobbler', '2019-07-16 19:47:13', '2019-07-16 19:47:13'),
(173, 'Egg in Crates and Birds', '2019-07-17 17:07:07', '2019-07-17 17:07:07'),
(174, 'Service', '2019-07-17 17:43:17', '2019-07-17 17:43:17'),
(175, 'Service', '2019-07-17 17:55:03', '2019-07-17 17:55:03'),
(176, 'Royal Seed', '2019-07-17 18:16:57', '2019-07-17 18:16:57'),
(177, 'Entertainment', '2019-07-17 18:37:42', '2019-07-17 18:37:42'),
(178, 'Service', '2019-07-17 18:48:21', '2019-07-17 18:48:21'),
(179, 'Service', '2019-07-18 13:04:03', '2019-07-18 13:04:03'),
(181, 'Marketing in Egg', '2019-07-19 10:49:30', '2019-07-19 10:49:30'),
(182, 'Clothing', '2019-07-19 17:56:46', '2019-07-19 17:56:46'),
(183, 'Production', '2019-07-19 18:04:59', '2019-07-19 18:04:59'),
(184, 'Graphic design', '2019-07-19 18:05:49', '2019-07-19 18:05:49'),
(185, 'Service', '2019-07-19 19:03:57', '2019-07-19 19:03:57'),
(186, 'Engineering', '2019-07-19 19:41:19', '2019-07-19 19:41:19'),
(187, 'Marketing', '2019-07-20 13:38:33', '2019-07-20 13:38:33'),
(189, 'Photographer', '2019-07-22 15:03:55', '2019-07-22 15:03:55'),
(192, 'Barber', '2019-07-24 16:48:05', '2019-07-24 16:48:05'),
(193, 'Clothing', '2019-07-24 18:15:57', '2019-07-24 18:15:57'),
(198, 'Buying and selling', '2019-07-26 15:52:47', '2019-07-26 15:52:47'),
(199, 'Service', '2019-07-26 18:14:22', '2019-07-26 18:14:22'),
(201, 'Service', '2019-07-29 14:49:34', '2019-07-29 14:49:34'),
(202, 'Service', '2019-07-29 15:38:37', '2019-07-29 15:38:37'),
(203, 'Service', '2019-07-30 19:40:16', '2019-07-30 19:40:16'),
(204, 'Buying and selling', '2019-07-30 20:00:02', '2019-07-30 20:00:02'),
(205, 'Service', '2019-07-30 20:10:08', '2019-07-30 20:10:08'),
(206, 'Tailor', '2019-08-01 15:28:01', '2019-08-01 15:28:01'),
(207, 'Service', '2019-08-01 18:00:00', '2019-08-01 18:00:00'),
(208, 'Buying and selling', '2019-08-01 18:41:22', '2019-08-01 18:41:22'),
(209, 'Service', '2019-08-01 19:14:39', '2019-08-01 19:14:39'),
(210, 'Estate agent', '2019-08-08 21:13:18', '2019-08-08 21:13:18'),
(217, 'Recharge card', '2019-09-10 18:38:51', '2019-09-10 18:38:51'),
(221, 'Poultry farmer', '2019-10-28 17:01:41', '2019-10-28 17:01:41'),
(235, 'Branded Tomatoes and seasonings', '2019-11-19 00:02:24', '2019-11-19 00:02:24'),
(236, 'Health worker', '2019-11-19 22:32:52', '2019-11-19 22:32:52'),
(250, 'Farm produce', '2019-11-29 07:57:58', '2019-11-29 07:57:58'),
(253, 'hair dressing', '2019-12-02 20:04:33', '2019-12-02 20:04:33'),
(254, 'hair dressing', '2019-12-02 20:47:16', '2019-12-02 20:47:16'),
(261, 'Photography', '2020-01-02 05:20:09', '2020-01-02 05:20:09'),
(263, 'Selling furnitures', '2020-01-10 02:10:28', '2020-01-10 02:10:28'),
(269, 'Buying and selling', '2020-02-09 11:31:11', '2020-02-09 11:31:11'),
(280, 'Sjjjjj', '2020-03-20 23:24:44', '2020-03-20 23:24:44'),
(282, 'fashion', '2020-05-08 15:30:47', '2020-05-08 15:30:47'),
(283, 'nurse', '2020-05-19 16:18:59', '2020-05-19 16:18:59');

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `course_id` int(10) UNSIGNED NOT NULL,
  `lesson_id` int(10) UNSIGNED DEFAULT NULL,
  `file` varchar(255) NOT NULL,
  `score` int(10) UNSIGNED DEFAULT NULL,
  `seen` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`id`, `user_id`, `course_id`, `lesson_id`, `file`, `score`, `seen`, `created_at`, `updated_at`) VALUES
(4, 87, 15, NULL, 'submitted_assignments/new-microsoft-office-word-document.docx', 20, 1, '2019-04-01 20:49:41', '2019-04-02 17:43:26'),
(3, 87, 16, 11, 'submitted_assignments/action-step-1.docx', 10, 1, '2019-03-21 20:03:21', '2019-03-21 20:32:32'),
(5, 90, 15, NULL, 'submitted_assignments/vote6.png', 10, NULL, '2019-04-10 16:12:22', '2019-04-11 14:33:45'),
(6, 87, 16, 12, 'submitted_assignments/write-up.docx', 50, 1, '2019-04-23 01:40:44', '2019-04-29 21:53:29'),
(7, 91, 22, NULL, 'submitted_assignments/vote5.jpg', 2, 1, '2019-05-09 04:26:09', '2019-05-17 17:04:42'),
(8, 95, 16, 11, 'submitted_assignments/1jojl1fomkx9wypfbe43d6kjfjqhjonrbewxs1m3emoajtlsekgvzt8p48.png', 60, 1, '2019-05-20 18:31:21', '2019-05-20 18:35:00'),
(9, 122, 23, NULL, 'submitted_assignments/lecture-1-action-step-s.doc', 60, NULL, '2019-07-02 01:48:19', '2019-07-05 13:20:51'),
(10, 125, 23, NULL, 'submitted_assignments/adefila-yetunde-action-steps.doc', 60, NULL, '2019-07-02 02:03:02', '2019-07-02 16:07:09'),
(11, 126, 23, NULL, 'submitted_assignments/action-step-answers.docx', 50, NULL, '2019-07-04 09:54:03', '2019-07-05 13:20:51'),
(12, 157, 23, NULL, 'submitted_assignments/action-step.', 10, 1, '2019-07-11 18:01:26', '2019-07-15 17:06:33'),
(13, 200, 23, 15, 'submitted_assignments/business-assignment-1.docx', 65, 1, '2019-08-04 21:17:58', '2019-08-14 20:52:17'),
(14, 91, 23, 15, 'submitted_assignments/test.', 10, NULL, '2019-08-22 14:44:17', '2019-08-22 17:26:15'),
(15, 195, 23, 15, 'submitted_assignments/surebiz-assignment-1.docx', 72, 1, '2019-08-25 19:16:11', '2019-09-02 22:14:44'),
(16, 165, 23, 15, 'submitted_assignments/new-microsoft-office-word-document-2.docx', 10, 1, '2019-09-03 15:06:02', '2019-09-11 16:35:41'),
(17, 200, 23, 16, 'submitted_assignments/business-assignment-2.docx', 55, NULL, '2019-10-08 21:18:24', '2019-10-13 00:19:37'),
(18, 157, 23, 15, 'submitted_assignments/action-step-2.', 35, 1, '2019-10-21 19:28:23', '2020-01-06 22:15:14'),
(19, 122, 23, 15, 'submitted_assignments/oguntope-emmanuel-training-1-lesson-2-action-step-1.odt', 45, 1, '2019-11-19 06:08:31', '2019-11-19 16:57:48'),
(20, 122, 25, 17, 'submitted_assignments/oguntope-emmanuel-action-step-training-2-lession-2.odt', 52, NULL, '2019-11-20 01:59:52', '2019-11-20 14:34:48'),
(21, 225, 23, 15, 'submitted_assignments/beautyplus-20191204103813-save.jpg', 57, 1, '2019-12-09 17:53:20', '2019-12-13 00:00:33'),
(22, 195, 25, 17, 'submitted_assignments/grace-my-sure-biz-2.docx', 65, NULL, '2020-01-15 16:24:28', '2020-01-30 23:14:10');

-- --------------------------------------------------------

--
-- Table structure for table `batches`
--

CREATE TABLE `batches` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `batches`
--

INSERT INTO `batches` (`id`, `name`, `start_date`, `created_at`, `updated_at`) VALUES
(2, 'batch 1', '2019-05-29', '2019-05-29 04:25:07', '2019-05-29 04:30:50'),
(3, '1', '2019-06-02', '2019-06-02 00:59:21', '2019-06-02 00:59:21'),
(4, '1', '2019-06-03', '2019-06-02 23:23:04', '2019-06-02 23:23:04'),
(5, 'Batch 1', '2019-07-01', '2019-06-06 11:36:08', '2019-06-06 11:36:08'),
(6, 'batch 2', '2019-08-01', '2019-07-05 13:16:00', '2019-07-05 13:16:00'),
(7, 'BATCH 3', '2019-10-01', '2019-09-19 17:27:09', '2019-09-19 17:27:09'),
(8, 'BATCH 4', '2019-11-01', '2019-09-19 17:30:16', '2019-09-19 17:30:16'),
(9, 'BATCH 5', '2019-12-01', '2019-09-19 17:31:05', '2019-09-19 17:31:05'),
(10, 'BATCH 6', '2020-01-01', '2019-12-09 16:32:41', '2019-12-09 16:32:41'),
(11, 'BATCH 7', '2020-02-01', '2019-12-09 16:34:21', '2019-12-09 16:34:21'),
(12, 'BATCH 8', '2020-03-01', '2019-12-09 21:32:35', '2019-12-09 21:32:35'),
(13, 'BATCH 9', '2020-04-01', '2019-12-09 21:33:04', '2019-12-09 21:33:04'),
(14, 'BATCH 10', '2020-05-01', '2019-12-09 21:37:01', '2019-12-09 21:37:01'),
(15, 'BACTH 11', '2020-06-01', '2020-05-19 18:58:18', '2020-05-19 18:58:18'),
(16, 'BATCH 12', '2020-07-01', '2020-05-19 18:59:37', '2020-05-19 18:59:37'),
(17, 'BATCH  13', '2020-08-01', '2020-05-19 19:01:30', '2020-05-19 19:01:30'),
(18, 'BATCH 14', '2020-09-01', '2020-05-19 19:02:02', '2020-05-19 19:02:02'),
(19, 'BATCH 15', '2020-10-01', '2020-05-19 19:02:22', '2020-05-19 19:02:22'),
(20, 'BATCH 16', '2020-11-01', '2020-05-19 19:03:22', '2020-05-19 19:03:22'),
(21, 'BATCH 17', '2020-12-01', '2020-05-19 19:15:10', '2020-05-19 19:15:10');

-- --------------------------------------------------------

--
-- Table structure for table `business_categories`
--

CREATE TABLE `business_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` char(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `business_categories`
--

INSERT INTO `business_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Production', '2018-11-29 10:09:41', '2018-11-29 10:09:41'),
(2, 'Service', '2018-11-29 10:09:41', '2018-11-29 10:09:41'),
(3, 'Buying and Selling', '2018-11-29 10:09:41', '2018-11-29 10:09:41'),
(4, 'Agriculture', '2018-11-29 10:09:41', '2018-11-29 10:09:41'),
(5, 'Construction', '2018-11-29 10:09:41', '2018-11-29 10:09:41'),
(6, 'Mining', '2018-11-29 10:09:41', '2018-11-29 10:09:41');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(10) UNSIGNED NOT NULL,
  `users_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `note` text,
  `cover_image` varchar(255) NOT NULL,
  `video` char(200) DEFAULT NULL,
  `start_date` date NOT NULL,
  `assignment_note` text,
  `assignment_doc` varchar(255) DEFAULT NULL,
  `url` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `users_id`, `title`, `note`, `cover_image`, `video`, `start_date`, `assignment_note`, `assignment_doc`, `url`, `created_at`, `updated_at`) VALUES
(25, 99, 'BUSINESS DEVELOPMENT', 'Hello,\r\n\r\nYou are doing a good job for moving up to the next Training. \r\nThis training will lead you to start writing your BUSINESS PLAN and lead you to DIRECT IMPACT on you choice business.\r\n\r\nThis Lesson \"WHAT IS BUSINESS series 2\" will make you understand the type and form of businesses available and choosing the best for your choice venture.\r\n\r\nDownload the PDF of the Lesson and make sure you are impacted as this will add up to the values making you a boss of your own.\r\n\r\nKindly feel free to chat us up via the website Life Chat and we will respond to your request immediately\r\n\r\nGood Luck', 'cover_images/business-development.jpg', 'https://www.youtube.com/embed/nsV461YIr6c', '2019-08-16', 'ACTION STEP\r\n\r\nHi, \r\n\r\nYou have started the second Training and the Action Steps in this training will require your concentration on your business choice\r\n\r\nMake sure you do all the Action steps Because \r\n1. It will prove that you have attended this class\r\n2. It will enable us to deliver start up support to you\r\n3. it will enable us to help you on your dream business DIRECTLY', 'assignments/training-2-lesson-1action-step.pdf', 'business-development', '2019-08-16 21:34:24', '2019-08-16 21:34:24'),
(26, 99, 'WHO IS AN ENTREPRENEUR', 'This lesson center on who an entrepreneur is, you are going to know in this lesson that an Entrepreneur is not just self employed but a conscious person who start a business and create a system within the business to success with or without him\r\n\r\nIn the lesson you will also learn that every entrepreneur has peculiar strength that they utilize as advantage to achieve their business goal.\r\n\r\nAmazingly in the lesson\'s video, 50 entrepreneurs share with you their strength and what characteristic you should have as entrepreneur. This will help you discover your advantage for sure\r\n\r\nDownload your lesson PDF Document and attend and make sure you don\'t miss the video. Good Luck', 'cover_images/think-entrepreneur.jpg', 'https://www.youtube.com/embed/QoqohmccTSc', '2019-12-04', 'This lesson ACTION STEP is a must for you to do because\r\n\r\n1. It will stimulate you to identify your strength and relate it with your business\r\n2. It will charge you to understand the role of personal advantage in the life of entrepreneurs around\r\n\r\nNOTE: The successful submission of your action step by uploading in \'document file\' will mark your attendance to the lesson and it will serve as edge for your start up support.\r\n\r\nGood Luck', 'assignments/training-1-1.pdf', 'who-is-an-entrepreneur', '2019-12-04 22:47:10', '2019-12-04 22:47:10'),
(23, 87, 'ORIENTATION', 'Welcome to your first lecture. Under this lecture \'ORIENTATION\" you will have couple of lessons according to you duration\r\n\r\nThis lecture will blow your mind on why you should start your own business Now. Make sure you attending to this lecture immediately.\r\n\r\nYou can download the lecture on pdf to safe your data but make sure you see the video for further resources for your business quest.\r\n\r\nGood Luck to you', 'cover_images/entrepreneuship-300x200.jpeg', 'https://www.youtube.com/embed/0SQSwrgRKhs', '2019-07-01', 'Make sure you do the Action Step and submit it successfully as this will mean you have successfully finished the first training.', 'assignments/lecture-1-action-step.pdf', 'orientation', '2019-07-01 02:57:32', '2019-07-01 02:57:32');

-- --------------------------------------------------------

--
-- Table structure for table `courses_progress`
--

CREATE TABLE `courses_progress` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `course_id` int(10) UNSIGNED NOT NULL,
  `assignment` tinyint(4) DEFAULT NULL,
  `completed` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses_progress`
--

INSERT INTO `courses_progress` (`id`, `user_id`, `course_id`, `assignment`, `completed`, `created_at`, `updated_at`) VALUES
(11, 87, 16, NULL, NULL, '2019-03-19 21:31:18', '2019-03-19 21:31:18'),
(10, 89, 15, NULL, NULL, '2019-03-18 11:24:42', '2019-03-18 11:24:42'),
(9, 87, 15, 1, 1, '2019-03-15 00:35:14', '2019-04-01 20:49:50'),
(12, 90, 15, 1, 1, '2019-03-20 01:09:07', '2019-04-10 16:12:46'),
(13, 90, 16, NULL, NULL, '2019-04-11 22:50:37', '2019-04-11 22:50:37'),
(14, 87, 21, NULL, NULL, '2019-04-12 14:50:11', '2019-04-12 14:50:11'),
(15, 90, 21, NULL, NULL, '2019-04-12 16:48:26', '2019-04-12 16:48:26'),
(16, 87, 22, NULL, NULL, '2019-04-19 17:36:55', '2019-04-19 17:36:55'),
(17, 91, 22, 1, 1, '2019-05-09 04:24:16', '2019-05-09 16:09:09'),
(18, 95, 22, NULL, NULL, '2019-05-13 00:09:52', '2019-05-13 00:09:52'),
(19, 95, 16, NULL, NULL, '2019-05-13 00:13:39', '2019-05-13 00:13:39'),
(20, 97, 22, NULL, NULL, '2019-05-18 00:52:06', '2019-05-18 00:52:06'),
(21, 97, 16, NULL, NULL, '2019-05-18 00:54:44', '2019-05-18 00:54:44'),
(22, 98, 22, NULL, NULL, '2019-05-18 13:14:16', '2019-05-18 13:14:16'),
(23, 125, 23, 1, 1, '2019-07-01 09:08:31', '2019-07-02 02:03:12'),
(24, 157, 23, 1, 1, '2019-07-01 12:46:51', '2019-07-11 18:02:26'),
(25, 122, 23, 1, 1, '2019-07-01 13:04:12', '2019-07-02 01:48:40'),
(26, 99, 23, NULL, NULL, '2019-07-01 13:20:21', '2019-07-01 13:20:21'),
(27, 129, 23, NULL, NULL, '2019-07-01 18:09:54', '2019-07-01 18:09:54'),
(28, 91, 23, NULL, NULL, '2019-07-01 18:35:05', '2019-07-01 18:35:05'),
(29, 128, 23, NULL, NULL, '2019-07-01 23:12:59', '2019-07-01 23:12:59'),
(30, 126, 23, 1, 1, '2019-07-02 00:00:10', '2019-07-04 09:54:07'),
(31, 127, 23, NULL, NULL, '2019-07-04 22:35:58', '2019-07-04 22:35:58'),
(32, 192, 23, NULL, NULL, '2019-08-01 17:06:19', '2019-08-01 17:06:19'),
(33, 176, 23, NULL, NULL, '2019-08-01 23:32:49', '2019-08-01 23:32:49'),
(34, 165, 23, NULL, NULL, '2019-08-02 01:53:14', '2019-08-02 01:53:14'),
(35, 191, 23, NULL, NULL, '2019-08-02 23:23:20', '2019-08-02 23:23:20'),
(36, 200, 23, NULL, NULL, '2019-08-02 23:44:22', '2019-08-02 23:44:22'),
(37, 195, 23, NULL, NULL, '2019-08-03 01:30:11', '2019-08-03 01:30:11'),
(38, 101, 23, NULL, NULL, '2019-08-04 17:49:46', '2019-08-04 17:49:46'),
(39, 194, 23, NULL, NULL, '2019-08-05 15:20:07', '2019-08-05 15:20:07'),
(40, 91, 25, NULL, NULL, '2019-08-22 13:47:52', '2019-08-22 13:47:52'),
(41, 122, 25, NULL, NULL, '2019-10-08 02:16:18', '2019-10-08 02:16:18'),
(42, 125, 25, NULL, NULL, '2019-10-09 19:04:13', '2019-10-09 19:04:13'),
(43, 157, 25, NULL, NULL, '2019-10-21 15:51:32', '2019-10-21 15:51:32'),
(44, 237, 23, NULL, NULL, '2019-12-02 02:15:01', '2019-12-02 02:15:01'),
(45, 225, 23, NULL, NULL, '2019-12-02 12:44:18', '2019-12-02 12:44:18'),
(46, 222, 23, NULL, NULL, '2019-12-02 16:27:49', '2019-12-02 16:27:49'),
(47, 242, 23, NULL, NULL, '2019-12-03 22:29:09', '2019-12-03 22:29:09'),
(48, 126, 25, NULL, NULL, '2019-12-13 03:51:17', '2019-12-13 03:51:17'),
(49, 218, 23, NULL, NULL, '2019-12-21 08:20:34', '2019-12-21 08:20:34'),
(50, 258, 23, NULL, NULL, '2020-01-01 16:42:36', '2020-01-01 16:42:36'),
(51, 195, 25, NULL, NULL, '2020-01-03 21:16:33', '2020-01-03 21:16:33'),
(52, 262, 23, NULL, NULL, '2020-02-01 11:17:14', '2020-02-01 11:17:14'),
(53, 260, 23, NULL, NULL, '2020-02-21 09:54:37', '2020-02-21 09:54:37');

-- --------------------------------------------------------

--
-- Table structure for table `course_business_categories`
--

CREATE TABLE `course_business_categories` (
  `course_id` int(10) UNSIGNED NOT NULL,
  `business_category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_business_categories`
--

INSERT INTO `course_business_categories` (`course_id`, `business_category_id`, `created_at`, `updated_at`) VALUES
(15, 6, '2019-03-19 21:51:53', '2019-03-19 21:51:53'),
(15, 5, '2019-03-19 21:51:53', '2019-03-19 21:51:53'),
(15, 4, '2019-03-19 21:51:53', '2019-03-19 21:51:53'),
(15, 3, '2019-03-19 21:51:53', '2019-03-19 21:51:53'),
(15, 2, '2019-03-19 21:51:53', '2019-03-19 21:51:53'),
(15, 1, '2019-03-19 21:51:53', '2019-03-19 21:51:53'),
(16, 6, '2019-05-09 04:04:10', '2019-05-09 04:04:10'),
(16, 5, '2019-05-09 04:04:10', '2019-05-09 04:04:10'),
(16, 4, '2019-05-09 04:04:10', '2019-05-09 04:04:10'),
(16, 3, '2019-05-09 04:04:10', '2019-05-09 04:04:10'),
(16, 2, '2019-05-09 04:04:10', '2019-05-09 04:04:10'),
(16, 1, '2019-05-09 04:04:10', '2019-05-09 04:04:10'),
(17, 1, '2019-04-11 22:44:02', '2019-04-11 22:44:02'),
(18, 1, '2019-04-11 22:45:17', '2019-04-11 22:45:17'),
(18, 2, '2019-04-11 22:45:17', '2019-04-11 22:45:17'),
(18, 3, '2019-04-11 22:45:17', '2019-04-11 22:45:17'),
(18, 4, '2019-04-11 22:45:17', '2019-04-11 22:45:17'),
(18, 5, '2019-04-11 22:45:17', '2019-04-11 22:45:17'),
(18, 6, '2019-04-11 22:45:17', '2019-04-11 22:45:17'),
(19, 1, '2019-04-11 22:46:50', '2019-04-11 22:46:50'),
(19, 3, '2019-04-11 22:46:50', '2019-04-11 22:46:50'),
(20, 6, '2019-04-12 14:10:56', '2019-04-12 14:10:56'),
(20, 5, '2019-04-12 14:10:56', '2019-04-12 14:10:56'),
(20, 4, '2019-04-12 14:10:56', '2019-04-12 14:10:56'),
(20, 3, '2019-04-12 14:10:56', '2019-04-12 14:10:56'),
(20, 2, '2019-04-12 14:10:56', '2019-04-12 14:10:56'),
(20, 1, '2019-04-12 14:10:56', '2019-04-12 14:10:56'),
(21, 6, '2019-04-12 16:47:12', '2019-04-12 16:47:12'),
(21, 5, '2019-04-12 16:47:12', '2019-04-12 16:47:12'),
(21, 4, '2019-04-12 16:47:12', '2019-04-12 16:47:12'),
(21, 3, '2019-04-12 16:47:12', '2019-04-12 16:47:12'),
(21, 2, '2019-04-12 16:47:12', '2019-04-12 16:47:12'),
(21, 1, '2019-04-12 16:47:12', '2019-04-12 16:47:12'),
(22, 6, '2019-05-09 04:02:51', '2019-05-09 04:02:51'),
(22, 5, '2019-05-09 04:02:51', '2019-05-09 04:02:51'),
(22, 4, '2019-05-09 04:02:51', '2019-05-09 04:02:51'),
(22, 3, '2019-05-09 04:02:51', '2019-05-09 04:02:51'),
(22, 2, '2019-05-09 04:02:51', '2019-05-09 04:02:51'),
(22, 1, '2019-05-09 04:02:51', '2019-05-09 04:02:51'),
(23, 1, '2019-07-01 02:57:32', '2019-07-01 02:57:32'),
(23, 2, '2019-07-01 02:57:32', '2019-07-01 02:57:32'),
(23, 3, '2019-07-01 02:57:32', '2019-07-01 02:57:32'),
(23, 4, '2019-07-01 02:57:32', '2019-07-01 02:57:32'),
(23, 5, '2019-07-01 02:57:32', '2019-07-01 02:57:32'),
(23, 6, '2019-07-01 02:57:32', '2019-07-01 02:57:32'),
(24, 1, '2019-08-02 20:13:04', '2019-08-02 20:13:04'),
(24, 2, '2019-08-02 20:13:04', '2019-08-02 20:13:04'),
(24, 3, '2019-08-02 20:13:04', '2019-08-02 20:13:04'),
(24, 4, '2019-08-02 20:13:04', '2019-08-02 20:13:04'),
(24, 5, '2019-08-02 20:13:04', '2019-08-02 20:13:04'),
(24, 6, '2019-08-02 20:13:04', '2019-08-02 20:13:04'),
(25, 1, '2019-08-16 21:34:24', '2019-08-16 21:34:24'),
(25, 2, '2019-08-16 21:34:24', '2019-08-16 21:34:24'),
(25, 3, '2019-08-16 21:34:24', '2019-08-16 21:34:24'),
(25, 4, '2019-08-16 21:34:24', '2019-08-16 21:34:24'),
(25, 5, '2019-08-16 21:34:24', '2019-08-16 21:34:24'),
(25, 6, '2019-08-16 21:34:24', '2019-08-16 21:34:24'),
(26, 1, '2019-12-04 22:47:10', '2019-12-04 22:47:10'),
(26, 2, '2019-12-04 22:47:10', '2019-12-04 22:47:10'),
(26, 3, '2019-12-04 22:47:10', '2019-12-04 22:47:10'),
(26, 4, '2019-12-04 22:47:10', '2019-12-04 22:47:10'),
(26, 5, '2019-12-04 22:47:10', '2019-12-04 22:47:10'),
(26, 6, '2019-12-04 22:47:10', '2019-12-04 22:47:10');

-- --------------------------------------------------------

--
-- Table structure for table `course_periods`
--

CREATE TABLE `course_periods` (
  `id` int(10) UNSIGNED NOT NULL,
  `course_id` int(10) UNSIGNED NOT NULL,
  `period` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_periods`
--

INSERT INTO `course_periods` (`id`, `course_id`, `period`, `created_at`, `updated_at`) VALUES
(24, 16, 60, '2019-05-09 04:04:10', '2019-05-09 04:04:10'),
(23, 16, 48, '2019-05-09 04:04:10', '2019-05-09 04:04:10'),
(22, 16, 36, '2019-05-09 04:04:10', '2019-05-09 04:04:10'),
(21, 16, 30, '2019-05-09 04:04:10', '2019-05-09 04:04:10'),
(20, 16, 24, '2019-05-09 04:04:10', '2019-05-09 04:04:10'),
(19, 16, 18, '2019-05-09 04:04:10', '2019-05-09 04:04:10'),
(18, 16, 12, '2019-05-09 04:04:10', '2019-05-09 04:04:10'),
(17, 16, 6, '2019-05-09 04:04:10', '2019-05-09 04:04:10'),
(9, 22, 6, '2019-05-09 04:02:51', '2019-05-09 04:02:51'),
(10, 22, 12, '2019-05-09 04:02:51', '2019-05-09 04:02:51'),
(11, 22, 18, '2019-05-09 04:02:51', '2019-05-09 04:02:51'),
(12, 22, 24, '2019-05-09 04:02:51', '2019-05-09 04:02:51'),
(13, 22, 30, '2019-05-09 04:02:51', '2019-05-09 04:02:51'),
(14, 22, 36, '2019-05-09 04:02:51', '2019-05-09 04:02:51'),
(15, 22, 48, '2019-05-09 04:02:51', '2019-05-09 04:02:51'),
(16, 22, 60, '2019-05-09 04:02:51', '2019-05-09 04:02:51'),
(25, 23, 6, '2019-07-01 02:57:32', '2019-07-01 02:57:32'),
(26, 23, 12, '2019-07-01 02:57:32', '2019-07-01 02:57:32'),
(27, 23, 18, '2019-07-01 02:57:32', '2019-07-01 02:57:32'),
(28, 23, 24, '2019-07-01 02:57:32', '2019-07-01 02:57:32'),
(29, 23, 30, '2019-07-01 02:57:32', '2019-07-01 02:57:32'),
(30, 23, 36, '2019-07-01 02:57:32', '2019-07-01 02:57:32'),
(31, 23, 48, '2019-07-01 02:57:32', '2019-07-01 02:57:32'),
(32, 23, 60, '2019-07-01 02:57:32', '2019-07-01 02:57:32'),
(33, 24, 6, '2019-08-02 20:13:04', '2019-08-02 20:13:04'),
(34, 24, 12, '2019-08-02 20:13:04', '2019-08-02 20:13:04'),
(35, 24, 18, '2019-08-02 20:13:04', '2019-08-02 20:13:04'),
(36, 24, 24, '2019-08-02 20:13:04', '2019-08-02 20:13:04'),
(37, 24, 30, '2019-08-02 20:13:04', '2019-08-02 20:13:04'),
(38, 24, 36, '2019-08-02 20:13:04', '2019-08-02 20:13:04'),
(39, 24, 48, '2019-08-02 20:13:04', '2019-08-02 20:13:04'),
(40, 24, 60, '2019-08-02 20:13:04', '2019-08-02 20:13:04'),
(41, 25, 6, '2019-08-16 21:34:24', '2019-08-16 21:34:24'),
(42, 25, 12, '2019-08-16 21:34:24', '2019-08-16 21:34:24'),
(43, 25, 18, '2019-08-16 21:34:24', '2019-08-16 21:34:24'),
(44, 25, 24, '2019-08-16 21:34:24', '2019-08-16 21:34:24'),
(45, 25, 30, '2019-08-16 21:34:24', '2019-08-16 21:34:24'),
(46, 25, 36, '2019-08-16 21:34:24', '2019-08-16 21:34:24'),
(47, 25, 48, '2019-08-16 21:34:24', '2019-08-16 21:34:24'),
(48, 25, 60, '2019-08-16 21:34:24', '2019-08-16 21:34:24'),
(49, 26, 36, '2019-12-04 22:47:10', '2019-12-04 22:47:10'),
(50, 26, 48, '2019-12-04 22:47:10', '2019-12-04 22:47:10'),
(51, 26, 60, '2019-12-04 22:47:10', '2019-12-04 22:47:10');

-- --------------------------------------------------------

--
-- Table structure for table `ebooks`
--

CREATE TABLE `ebooks` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ebook` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `users` tinyint(4) DEFAULT NULL,
  `non_users` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ebooks`
--

INSERT INTO `ebooks` (`id`, `title`, `description`, `cover_image`, `ebook`, `price`, `status`, `users`, `non_users`, `created_at`, `updated_at`) VALUES
(1, 'ENTRE-MORAL MASTER CLASS MANUAL (MONTH 1)', 'ENTRE-MORAL MASTER CLASS MANUAL (MONTH 1)\r\nIt contain four manuals for 4 weeks \r\nWeek 1: Self Discovery (series 1)\r\nWeek 2: Self Discovery (series 2)\r\nWeek 3: Self Discovery (series 3)\r\nWeek 4: Why you are Born?\r\n\r\nPay and download the full 4 manual in 1', 'ebook_cover_images/1_20200210_202526_0000.png', 'ebooks/ENTRE-MORAL+MANUAL+MONTH+1.pdf', 2000, 1, NULL, 1, '2020-01-25 18:05:23', '2020-02-11 01:02:01'),
(2, 'FINDING MEANING TO LIFE AND DECIDE ON PURPOSE (PART 1)', 'Life is a gift for those who understand the meaning of life, those who seek to know how and why they are here seems to find the part to life of purpose. This Book will help you to find the part to peace and true living.', 'ebook_cover_images/20200218_230851_0000.png', 'ebooks/FINDING+MEANING+TO+LIFE+AND+DECIDE+ON+PURPOSE%28PART+1%29.pdf', 500, 1, 1, 1, '2020-02-24 21:02:51', '2020-03-13 15:51:56'),
(3, 'E.COM TRAINING MANUAL', 'This book is super good training manual. It is self guide on how to start and build a sustaining 4 pillars needed to start and grow a micro business. \r\n•	Pillar # 1: Entrepreneurs Mindset (Right Orientation)\r\n•	Pillar # 2: Business Ideas/Plan (Right Opportunity)\r\n•	Pillar # 3: Marketing Strategy (Right People)\r\n•	Pillar # 4: Financial Analysis (Get the Money)\r\nThe manual also contain Business Plan Template , Cash Flow Template and Template to raise Start-up Capital. \r\nYou need this super Manual Get It Now.', 'ebook_cover_images/e.com.png', 'ebooks/E.COM+TRAINING+MANUAL.pdf', 5000, 1, 1, 1, '2020-02-24 23:10:01', '2020-05-07 23:50:19'),
(4, 'BEHIND THE SCREEN', 'The feeling of never-ending script acting of human on earth is an evidence of script director behind the screen. \r\nThis book will tell you a beautiful story of a life related to yours and how you acting to a divine scripting. \r\nIT IS A MUST READ FOR YOU!', 'ebook_cover_images/20200227_182624_0000.png', 'ebooks/BEHIND+THE+SCREEN.pdf', 500, 1, 1, 1, '2020-02-28 00:55:58', '2020-02-28 00:55:58'),
(5, 'FINDING MEANING TO LIFE AND DECIDE ON PURPOSE (PART 2)', 'Making decision in life is one of the vital steps that build or destroy one. The quality of your decision will determine the quality of your life. This book will help you make right decision that will propel your life to greatness. You need it!', 'ebook_cover_images/20200218_235016_0000.png', 'ebooks/FINDING+MEANING+TO+LIFE+%28PART+2%29.pdf', 500, 1, 1, 1, '2020-03-13 15:50:28', '2020-03-13 15:50:28');

-- --------------------------------------------------------

--
-- Table structure for table `ebook_sales`
--

CREATE TABLE `ebook_sales` (
  `id` int(10) UNSIGNED NOT NULL,
  `ref` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ebook_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ebook_sales`
--

INSERT INTO `ebook_sales` (`id`, `ref`, `ebook_id`, `email`, `name`, `price`, `status`, `created_at`, `updated_at`) VALUES
(1, 'PUh3uYKgL2S4gcsAtfIL9U6Kk', 1, 'seeyondgroup@gmail.com', 'seeun oliat', 2000, 0, '2020-01-25 18:39:51', '2020-01-25 18:39:51'),
(2, 'DbGneE1KQNOMqUqVYBYgq9t5P', 1, 'manchidede2@gmail.com', 'Okafor Callistus', 2000, 0, '2020-01-28 01:51:36', '2020-01-28 01:51:36'),
(3, 'spfC42b6cGIvoPXNx4RidUZCx', 1, 'ashimolowoseun@gmail.com', 'seeun ash', 2000, 0, '2020-01-28 02:30:51', '2020-01-28 02:30:51'),
(4, 'HbzuH33rAosOqihux8RzFi8yo', 1, 'ashimolowoseun@gmail.com', 'seeun ash', 2000, 0, '2020-01-28 02:31:16', '2020-01-28 02:31:16'),
(5, 'Ojz3Iwcu9IwVpuivYKa2p1XiO', 1, 'seeyondgroup@gmail.com', 'AAA', 2000, 0, '2020-01-28 20:46:51', '2020-01-28 20:46:51'),
(6, 'jYH0EAAzwvnK21gSRVpH3HzWe', 1, 'seeyondgroup@gmail.com', 'seeun oliat', 2000, 0, '2020-01-31 17:52:56', '2020-01-31 17:52:56'),
(7, 'KCqJtziamfbWjNnyWx10gLgdt', 1, 'seeyondgroup@gmail.com', 'SEUN', 2000, 0, '2020-01-31 22:08:32', '2020-01-31 22:08:32'),
(8, 'NLOAwjMFQq1AsXq7D7YUjPxmW', 1, 'seeyondgroup@gmail.com', 'SEUN', 2000, 0, '2020-01-31 22:11:35', '2020-01-31 22:11:35'),
(9, 'Dxejw1PNcoCFM2PWaWt7z3D0f', 1, 'seunashimolowo@gmail.com', 'Oluwaseun Ashimolowo', 2000, 0, '2020-02-11 01:02:28', '2020-02-11 01:02:28'),
(10, 'Pqst2HNJCYD3xnqEh2Pth9sDZ', 1, 'seunashimolowo@gmail.com', 'Oluwaseun Ashimolowo', 2000, 0, '2020-02-11 01:03:34', '2020-02-11 01:03:34'),
(11, 'CulT26frqL1euUXh6vuTLPihR', 1, 'seeyondgroup@gmail.com', 'Seun', 2000, 0, '2020-02-11 21:47:25', '2020-02-11 21:47:25'),
(12, 'Neeau3aCkuCzKwp80QvExNJre', 3, 'comyashimolowo@gmail.com', 'Comfort Ashimolowo', 2000, 0, '2020-02-25 03:19:15', '2020-02-25 03:19:15'),
(13, 'C357N0zJo6rH2bFKXj7XLcIsV', 3, 'seeyondgroup@gmail.com', 'Seun', 2000, 0, '2020-02-25 18:27:17', '2020-02-25 18:27:17'),
(14, 'RyomAZTDZ61hAlKYsmW95YlFu', 1, 'seeyondgroup@gmail.com', 'Seun', 2000, 0, '2020-03-13 17:31:51', '2020-03-13 17:31:51'),
(15, 'rY1TTA5jBgE2rccBpkHGmMmwd', 3, 'ashimolowoseun@gmail.com', 'Seun', 5000, 0, '2020-05-09 13:34:31', '2020-05-09 13:34:31'),
(16, 'WHlorzwW0xyZmKiTBTsuZiOty', 3, 'ashimolowoseun@gmail.com', 'Seun', 5000, 0, '2020-05-09 13:35:32', '2020-05-09 13:35:32'),
(17, 'JUPvzI46VaEV22YH4gIUHha6Q', 3, 'ashimolowoseun@gmail.com', 'Seun', 5000, 0, '2020-05-09 13:36:37', '2020-05-09 13:36:37'),
(18, 'wGX9MxUosbv7woiiFP26n9WWn', 3, 'taoaze1@gmail.com', 'Azeez Taofeek Abiodun', 5000, 0, '2020-05-09 14:07:14', '2020-05-09 14:07:14'),
(19, 'XPyCjCIhGJNTsdhLevGtqYl8Q', 3, 'ashimolowoseun@gmail.com', 'Seun', 5000, 0, '2020-05-09 20:29:57', '2020-05-09 20:29:57'),
(20, 'TJjEgj9sBbdnlSemuJEqsDKgh', 3, 'seunashimolowo@gmail.com', 'SEUN', 5000, 0, '2020-05-09 23:07:36', '2020-05-09 23:07:36'),
(21, 'znnCBfWfH94FHxFxOqA3sMdHd', 1, 'chidiblog1@gmail.com', 'Okafor Callistus', 2000, 0, '2020-07-20 03:00:05', '2020-07-20 03:00:05');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `users_id` int(10) UNSIGNED NOT NULL,
  `nature_of_job` varchar(255) NOT NULL,
  `position_at_job` varchar(255) NOT NULL,
  `pennywise_percentage` int(11) NOT NULL,
  `has_set_pennywise` tinyint(4) NOT NULL DEFAULT '0',
  `existing_business` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`users_id`, `nature_of_job`, `position_at_job`, `pennywise_percentage`, `has_set_pennywise`, `existing_business`, `created_at`, `updated_at`) VALUES
(94, 'production', 'juyfurfy', 30, 0, 1, '2019-04-16 02:33:59', '2019-04-16 02:33:59'),
(93, 'service', 'Md', 50, 0, 0, '2019-04-12 14:37:13', '2019-04-12 14:37:13'),
(96, 'construction', 'Senior staff', 40, 0, 1, '2019-05-15 19:14:21', '2019-05-15 19:14:21'),
(97, 'others', 'ggggg', 40, 0, 1, '2019-05-18 00:35:01', '2019-05-18 00:35:01'),
(100, 'civil servant', 'wee', 40, 0, 1, '2019-06-02 23:30:27', '2019-06-02 23:30:27'),
(135, 'service', 'English Teacher', 40, 0, 0, '2019-06-21 17:30:28', '2019-06-21 17:30:28'),
(142, 'service', 'Printer', 30, 0, 0, '2019-06-22 02:29:52', '2019-06-22 02:29:52'),
(165, 'service', 'cccddscd', 30, 1, 0, '2019-07-08 21:29:24', '2019-11-19 15:35:52'),
(170, 'service', 'Owner', 50, 0, 1, '2019-07-13 16:31:11', '2019-07-13 16:31:11'),
(191, 'service', 'Owner', 20, 0, 1, '2019-07-24 15:54:33', '2019-07-24 15:54:33'),
(194, 'production', 'Asst Human Resources Manager', 20, 0, 0, '2019-07-24 19:49:06', '2019-07-24 19:49:06'),
(195, 'production', 'Marketer', 20, 0, 0, '2019-07-24 21:22:46', '2019-07-24 21:22:46'),
(200, 'service', 'Junior', 20, 1, 0, '2019-07-28 15:58:44', '2019-12-21 12:31:17'),
(211, 'service', 'SALES REP', 60, 0, 0, '2019-08-17 18:07:44', '2019-08-17 18:07:44'),
(216, 'others', 'Admin', 30, 0, 1, '2019-08-23 21:24:44', '2019-08-23 21:24:44'),
(219, 'civil servant', 'Junior staff', 20, 0, 0, '2019-10-17 20:48:03', '2019-10-17 20:48:03'),
(222, 'service', 'teacher', 20, 1, 0, '2019-10-31 13:58:00', '2019-11-27 18:59:38'),
(223, 'production', 'Management Officer', 20, 0, 1, '2019-10-31 14:23:26', '2019-10-31 14:23:26'),
(224, 'civil servant', 'Extension officer', 20, 0, 1, '2019-11-04 22:30:28', '2019-11-04 22:30:28'),
(231, 'others', 'Junior staff', 30, 0, 0, '2019-11-16 14:28:39', '2019-11-16 14:28:39'),
(234, 'production', 'OPERATIONAL DIRECTOR', 20, 0, 1, '2019-11-18 20:21:39', '2019-11-18 20:21:39');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES
(2315, 'default', '{\"displayName\":\"App\\\\Jobs\\\\ProcessBatch\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":3,\"timeout\":60,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\ProcessBatch\",\"command\":\"O:21:\\\"App\\\\Jobs\\\\ProcessBatch\\\":11:{s:8:\\\"\\u0000*\\u0000batch\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Batch\\\";s:2:\\\"id\\\";i:15;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"\\u0000*\\u0000date\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2020-06-01 00:00:00.000000\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}s:5:\\\"tries\\\";i:3;s:7:\\\"timeout\\\";i:60;s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2020-06-01 00:00:00.000000\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1590969600, 1589900298),
(2316, 'default', '{\"displayName\":\"App\\\\Jobs\\\\ProcessBatch\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":3,\"timeout\":60,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\ProcessBatch\",\"command\":\"O:21:\\\"App\\\\Jobs\\\\ProcessBatch\\\":11:{s:8:\\\"\\u0000*\\u0000batch\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Batch\\\";s:2:\\\"id\\\";i:16;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"\\u0000*\\u0000date\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2020-07-01 00:00:00.000000\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}s:5:\\\"tries\\\";i:3;s:7:\\\"timeout\\\";i:60;s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2020-07-01 00:00:00.000000\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1593561600, 1589900377),
(2317, 'default', '{\"displayName\":\"App\\\\Jobs\\\\ProcessBatch\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":3,\"timeout\":60,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\ProcessBatch\",\"command\":\"O:21:\\\"App\\\\Jobs\\\\ProcessBatch\\\":11:{s:8:\\\"\\u0000*\\u0000batch\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Batch\\\";s:2:\\\"id\\\";i:17;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"\\u0000*\\u0000date\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2020-08-01 00:00:00.000000\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}s:5:\\\"tries\\\";i:3;s:7:\\\"timeout\\\";i:60;s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2020-08-01 00:00:00.000000\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1596240000, 1589900490),
(2318, 'default', '{\"displayName\":\"App\\\\Jobs\\\\ProcessBatch\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":3,\"timeout\":60,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\ProcessBatch\",\"command\":\"O:21:\\\"App\\\\Jobs\\\\ProcessBatch\\\":11:{s:8:\\\"\\u0000*\\u0000batch\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Batch\\\";s:2:\\\"id\\\";i:18;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"\\u0000*\\u0000date\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2020-09-01 00:00:00.000000\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}s:5:\\\"tries\\\";i:3;s:7:\\\"timeout\\\";i:60;s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2020-09-01 00:00:00.000000\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1598918400, 1589900522),
(2319, 'default', '{\"displayName\":\"App\\\\Jobs\\\\ProcessBatch\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":3,\"timeout\":60,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\ProcessBatch\",\"command\":\"O:21:\\\"App\\\\Jobs\\\\ProcessBatch\\\":11:{s:8:\\\"\\u0000*\\u0000batch\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Batch\\\";s:2:\\\"id\\\";i:19;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"\\u0000*\\u0000date\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2020-10-01 00:00:00.000000\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}s:5:\\\"tries\\\";i:3;s:7:\\\"timeout\\\";i:60;s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2020-10-01 00:00:00.000000\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1601510400, 1589900542),
(2320, 'default', '{\"displayName\":\"App\\\\Jobs\\\\ProcessBatch\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":3,\"timeout\":60,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\ProcessBatch\",\"command\":\"O:21:\\\"App\\\\Jobs\\\\ProcessBatch\\\":11:{s:8:\\\"\\u0000*\\u0000batch\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Batch\\\";s:2:\\\"id\\\";i:20;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"\\u0000*\\u0000date\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2020-11-01 00:00:00.000000\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}s:5:\\\"tries\\\";i:3;s:7:\\\"timeout\\\";i:60;s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2020-11-01 00:00:00.000000\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1604188800, 1589900602),
(2321, 'default', '{\"displayName\":\"App\\\\Jobs\\\\ProcessBatch\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":3,\"timeout\":60,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\ProcessBatch\",\"command\":\"O:21:\\\"App\\\\Jobs\\\\ProcessBatch\\\":11:{s:8:\\\"\\u0000*\\u0000batch\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Batch\\\";s:2:\\\"id\\\";i:21;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"\\u0000*\\u0000date\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2020-12-01 00:00:00.000000\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}s:5:\\\"tries\\\";i:3;s:7:\\\"timeout\\\";i:60;s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2020-12-01 00:00:00.000000\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1606780800, 1589901310),
(2322, 'high', '{\"displayName\":\"App\\\\Jobs\\\\ProcessEmailConfirmation\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":3,\"timeout\":60,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\ProcessEmailConfirmation\",\"command\":\"O:33:\\\"App\\\\Jobs\\\\ProcessEmailConfirmation\\\":10:{s:7:\\\"\\u0000*\\u0000user\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";i:284;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:5:\\\"tries\\\";i:3;s:7:\\\"timeout\\\";i:60;s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";s:4:\\\"high\\\";s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1590426736, 1590426736),
(2323, 'high', '{\"displayName\":\"App\\\\Jobs\\\\ProcessEmailConfirmation\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":3,\"timeout\":60,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\ProcessEmailConfirmation\",\"command\":\"O:33:\\\"App\\\\Jobs\\\\ProcessEmailConfirmation\\\":10:{s:7:\\\"\\u0000*\\u0000user\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";i:285;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:5:\\\"tries\\\";i:3;s:7:\\\"timeout\\\";i:60;s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";s:4:\\\"high\\\";s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1591022157, 1591022157),
(2324, 'high', '{\"displayName\":\"App\\\\Jobs\\\\ProcessEmailConfirmation\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":3,\"timeout\":60,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\ProcessEmailConfirmation\",\"command\":\"O:33:\\\"App\\\\Jobs\\\\ProcessEmailConfirmation\\\":10:{s:7:\\\"\\u0000*\\u0000user\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";i:285;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:5:\\\"tries\\\";i:3;s:7:\\\"timeout\\\";i:60;s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";s:4:\\\"high\\\";s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1591022764, 1591022764),
(2325, 'high', '{\"displayName\":\"App\\\\Jobs\\\\ProcessEmailConfirmation\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":3,\"timeout\":60,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\ProcessEmailConfirmation\",\"command\":\"O:33:\\\"App\\\\Jobs\\\\ProcessEmailConfirmation\\\":10:{s:7:\\\"\\u0000*\\u0000user\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";i:285;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:5:\\\"tries\\\";i:3;s:7:\\\"timeout\\\";i:60;s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";s:4:\\\"high\\\";s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1591022831, 1591022831),
(2326, 'high', '{\"displayName\":\"App\\\\Jobs\\\\ProcessEmailConfirmation\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":3,\"timeout\":60,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\ProcessEmailConfirmation\",\"command\":\"O:33:\\\"App\\\\Jobs\\\\ProcessEmailConfirmation\\\":10:{s:7:\\\"\\u0000*\\u0000user\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";i:285;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:5:\\\"tries\\\";i:3;s:7:\\\"timeout\\\";i:60;s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";s:4:\\\"high\\\";s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1591043238, 1591043238);

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `id` int(10) UNSIGNED NOT NULL,
  `users_id` int(10) UNSIGNED NOT NULL,
  `course_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `video` char(200) DEFAULT NULL,
  `note` text,
  `assignment_note` text,
  `assignment_doc` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`id`, `users_id`, `course_id`, `title`, `video`, `note`, `assignment_note`, `assignment_doc`, `created_at`, `updated_at`) VALUES
(16, 99, 23, 'ENTREPRENEURSHIP MINDSET', 'https://www.youtube.com/embed/VLGh5jucM1o', 'TRAINING: 	Orientation\r\nLESSON 3: 	Entrepreneurship Mind Set\r\nTIME:		1hr: 30mins\r\n\r\n\r\n      ENTREPRENEURSHIP MINDSET\r\n\r\nHI! You have successfully finished the second lesson and you are gradually building a strong business for yourself, continuous with this is the best decision that you will ever make in your life because it will sure transform you and make you be who you wanna be....... CEO Mysurebiz\r\n\r\nOBJECTIVES\r\n	\r\n•	This training will facilitate you to what an entrepreneurship is\r\n•	It will help you to know the basic resources needed to become an entrepreneur\r\n•	It will affirm you that becoming an entrepreneur is a goal you can reach.  \r\n•	It will help you to know the secret of the successful entrepreneur and their driving force\r\n\r\nCOURSE BENEFIT\r\n\r\n•	The lecture will make you start thinking like an entrepreneur\r\n•	The lecture will make you to realize that you are an entrepreneur in making\r\n•	You will gain insight into the untold unlimited Natural Resources and how to use them to become a successful entrepreneur\r\n\r\nWho is an Entrepreneur?\r\nAccording to Howard H. Stevenson, a professor at Harvard University he says, “An entrepreneur is a person that pursuit opportunities without regard to resources currently control” there are many definitions that really explain who an entrepreneur is, but for the sake of simplicity and clarity I define an entrepreneur as follows.  \r\n“An entrepreneur is a person that capitalized on unlimited natural resources to coordinate limited physical resources to produce goods or services for human consumption to make gain.” In this definition you will observe underlined words Unlimited Natural Resources and Limited Physical Resources. Every successful entrepreneur you see today capitalized on their unlimited natural resources. \r\n\r\nWhat are the Natural Resources? \r\n\r\nThey are TIME, MIND, CREATIVE POWER, IMAGINATION POWER, BRAIN POWER AND TALENT.\r\n\r\nTIME: Time is the on-going sequence of events taking place, is the indefinite continued progress of existence and events in the Past, the Present and the Future\r\n\r\nMIND: The mind is the set of cognitive faculties including consciousness, imagination, perception, thinking, judgement, language and memory, which is housed in the brain (sometimes including the central nervous system). It is usually defined as the faculty of an entity\'s thoughts and consciousness. Ever man has it freely\r\n\r\nCREATIVE POWER: Creativity is defined as the tendency to generate or recognize ideas, alternatives, or possibilities that may be useful in solving problems, communicating with others, and entertaining ourselves and others.\r\nIMAGINATIVE POWER: Imagination definition is the act or power of forming a mental image of something not present to the senses or never before wholly perceived in reality. This resource is present in every men\r\n\r\nBRAIN POWER: The brain is one of the largest and most complex organs in the human body. It is made up of more than 100 billion nerves that communicate in trillions of connections called synapses. ... The brain stem is between the spinal cord and the rest of the brain. Basic functions like breathing and sleep are controlled here. This is another resource that every man has\r\n\r\nTALENT: A talent (or gift, or aptitude) is the skill that someone has to do something very well that people usually like and that is difficult. ... People say they are \"born with a talent\". Everybody has talent no matter how small and some people may have more than one talent.\r\n\r\nAll these are resources unlimitedly available to everybody including you including the beggar on the street, as long as you are breathing, the use of these resources determined whether you will be successful or not. The interesting thing about these resources is that they are always available, no charges fee to tap into them, no restriction of time, age or tribe,   no scarcity, no condition what so ever to tap into the use of these resources and every man and woman has them more abundantly in different measure, the more you tap into these resources the more successful you become.\r\nAll the successful entrepreneurs capitalized on these unlimited natural resources to coordinate limited physical resources. \r\n\r\nWhat are the Physical Resources? \r\n\r\nThe physical resources are LAND, LABOUR AND CAPITAL, \r\n\r\nLAND: Land is an area of ground, especially one that is used for a particular purpose such as farming or building or business…....  \r\n\r\nLABOUR: The aggregate of all human physical and mental effort used in creation of goods and services. Labour is one of the primary factor of production. ...\r\n\r\nCAPITAL: Capital refers to the financial resources that businesses can use to fund their operations like cash, machinery, equipment and other resources.\r\n\r\nThese are also call factor of production in economics, these resources are so scarce that they are most time not available at once, sometimes when land is available there will be no labour and when labour is available there will be no land and capital. \r\n\r\nWhat makes most potential entrepreneur end up a dreamer is that they put the cat before the horse. They think of the capital which supposed to be the last as a first factor and because is a scarce resource, it in availability will paralyze the intention or the creativity. According to the definition above, the unlimited natural resources come first before the physical resources, the very reason for that is that if you can utilize the natural resources which is 100% freely available to your personal disposal you can use them to achieve all the scarce resources.\r\n\r\nIf you need LAND or LABOUR or CAPITAL to start a business all you need to do is to engage the activity of the five above mention unlimited natural resources  \r\n   \r\nAll the successful entrepreneurs today are not extra ordinary people they are ordinary people like you that use ordinary things extraordinarily. \r\n\r\nHOW ENTREPRENEUR THINKS  \r\n\r\nTHINKING!  What a great weapon if use positively \r\n\r\nEverybody thinks, there is no one on earth that doesn’t think the only person that cannot think is a dead person, even mad man thinks only that his thinking have been derailed that is why they say he has mental disorder, what am saying is that every man and woman thinks, the same faculty that a rich man use to think is the same that the poor man use to think, the different is the direction of there thinking, when a man see a problem affecting people he thinks on how to solve it while other person keep thinking and complaining. Both of them thinks and they of course has right to think anyway. Henry Ford said if you believe you can, if you believe you can’t either way you are right.\r\n\r\nHELLO!!!  YOUR THINKING DETERMINING YOUR SUCCESS AS AN ENTREPRENEUR\r\n\r\nLet see how Employee and Entrepreneur thinks \r\n\r\nEMPLOYEE				ENTREPRENEUR\r\n•	Thinks for financial security\r\n•	Thinks for steady paycheck\r\nSo he need to: \r\n•	Obey some one’s rule\r\n•	Obey some one’s order\r\n•	Take partial responsibility\r\n•	Induce into company culture\r\n•	Make complain in the world\r\n•	Live to manage life\r\n•	Live to be subdued and dominate by someone\r\n•	Leave your children to struggle for themselves	•	Thinks for financial freedom \r\n•	Thinks for great wealth\r\nSo he need to:\r\n•	Make his own rule\r\n•	Give his own order\r\n•	Take full responsibility\r\n•	Determine company culture\r\n•	Make difference in the world\r\n•	Live to enjoy life\r\n•	Live to subdue and dominate the earth\r\n\r\n•	Leave inheritance for your children’s children \r\nTo become an entrepreneur, the first thing you need to do is to change the direction of your thinking, that is the first step ever, you can’t skip it if you try to you will fall. Your thinking determine your living, is your road map either to the hall of fame or to the hall of shame. “As a man thinketh in his heart so he is”, it means you are the product of your thinking, not product of you poverty sticking family, not the product of you community, tribe or colour, but product of your own thinking any other thing is unacceptable excuse.  \r\n\r\nYOUR MIND is a strong hold of our life. When mechanism of thought picks any information from anywhere, either through your sight, nose, feel, or ears it transfers is to the brain for processing then drop it on your mind whichever way your mind interpreted the  information determine your reactions, it then become Mind-Set. If you make up your mind to utilize this golden advantage it will work for you and if you don’t it will still be impossible to start that business.   \r\n\r\nRESPONSIBILITIES OF AN ENTREPRENEUR\r\nIf you make up your mind to become an entrepreneur, you have to become highly responsible. No more excuses, no more dependence, no more waiting for someone to do it  for you or show you how to do it, it means you are now in charge, you are now the driver of your life and I know that you will surely drive your way through to fortune. How ruff, Lonely or narrow is the way I trust that you can drive through.\r\nTwo Major Responsibilities of an Entrepreneur are:\r\nRISK BEARING: Bearing of risk is one of your primary responsibilities; you are investing your time, energy and money, to provide peoples need in return for money (profit) that is why you have to be a PLANING person, a THINKING person, a RISK-TAKING person, a CALCULATING person, PERSISTENCE person and a FUTURE-ORIENTED person. \r\nPOLICY MAKER: You have become a decision maker, the question Where, When and How, to run the business, how much money to make, will be answered by you, that is why you have to be a SELF-CONFIDENCE person, a TASK-RESULT ORIENTED person, a GOOD LEADER, an ORIGINALITY person, a HARD WORKING person, a SEEING person.\r\n											                     Good Luck', 'Dear user,\r\n\r\nDownload the Action Step below, attend to it sincerely and upload you findings in document as indicated below. \r\n\r\nMysurebiz will make you presence as you upload the Action Step and this is one of the criteria to benefit start-up Fund support from the platform. \r\n\r\nWish you the best of Luck', 'assignments/training-1-lesson-3-action-step.pdf', '2019-08-02 20:27:36', '2019-08-02 20:27:36'),
(15, 99, 23, 'WHAT IS BUSINESS (SERIES 1)', 'https://www.youtube.com/embed/qBC-adYvEtw', 'LECTURE: 	Orientation\r\nLESSON 2: 	What is Business (Series One)\r\nTIME:		1hr: 30mins\r\n\r\n\r\n       \r\n\r\n\r\nOBJECTIVES\r\n	\r\n•	This training will facilitate you to know what is business in a real sense\r\n•	It will help you to know the basic resources that are needed to start a business in the stiff economy and social/political instability.\r\n•	It will affirm you that business trait is in you with all uncountable facts.  \r\n•	It will help you to know that you can start your  own business no matter the circumstance, age or race\r\n\r\nCOURSE BENEFIT\r\n\r\n•	The lecture will bestow I CAN DO IT drive to you which is more needed\r\n•	The lecture will make you to realize that business start-up is a risk any one can take\r\n•	Gain insight into to untold common advantage available to start a business in under developed economy \r\n\r\nLECTURE\r\n\r\nWhat is Business?\r\nBusiness is an organized effort of individuals to venture creation of goods or services and make it available to meet a specific need satisfactorily with a conceive mission of making a reasonable profit, \r\n\r\nBusiness is an activated opportunity within obscurity. \r\nBusiness is a smart way of making money through a decisive effort of identifying a certain problem peculiar to a population, defiling the odds and lay down the tools to create a solution and make it available to the people at equilibrium price \r\n\r\nThe purpose of a business is to offer value (through products or services) to customers, who pay for the value with cash or equivalents. Minimally, the money received should fund the costs of operating the business as well as provide for the life needs of the proprietor\r\nBusiness start up is one of the essences of human existence; the world revolves round many inventions and creative display of many young and old, black and white people who discover the essence of their existence. \r\nThe world become more habitable by the creation of more businesses, every man came to this planet with a value to deliver to the world including you. \r\nBusiness acumen is not peculiar to any set of people, race or continent but to as many that will make up their mind to use the trait. God created every man with an inbuilt business to improve mankind and get rewarded; business ideas are mostly rap up in talent, likes or nature. No mater unpopular the talent is, it is capable of solving a problem and making you smile to the bank. \r\n\r\n\r\n\r\n\r\nResearch has shown that most sustainable and easy driving businesses are the businesses that are established through talents or nature. That is why Mysurebiz encourage gifting and talent driving and develop inner business \r\nOne of the adventures that can lead to financial freedom is starting up a business, floating a business could be so exciting, if well footing it can settle the generation to come financially. However, because of the failure of right footing many have believed that it is difficult to start a business seen many start-up businesses collapse in their infancy. The questions many emerging entrepreneur fail to answer are:\r\n1.	Does the business relate with my talent or nature?\r\n2.	Have I consider my strength and weakness before I choose that business\r\n3.	Have I made up my mind to start the business\r\n4.	Do i have the right mentor and training that can avoid me expensive mistakes\r\nIf these three major unpopular questions are not well answered, it is possible to crash the business in infancy. 100 percent succeeding business in the world have these questions positively answered \r\nThere are three category of business, no matter the innovation you will operate under either of the following \r\n1.	Production or Manufacturing\r\n2.	Services \r\n3.	Merchandise or Buying and selling\r\nEach of these categories of business has the ability to give you financial freedom depending on bond with your talent, your strength than your weakness and your mind made up\r\nStarting a business has incomparable advantages, and succeeding the business is much easier than the fear of failure. However, the challenges of unavailable Land, Labour and Capital still post a setback, in the midst of discouraging environment and daunting Government policy. Questions many ask are: \r\nCan one do business in a bad economy?  \r\nCan one introduce a new idea in uncivilized society?\r\nThe answer is big YES. Doing business in bad economy is more needful and introducing a new product or services is much more needful and rewarding in an uncivilized society. These two seemly problems are most opportunity that most decisive entrepreneur translate to change their financial status but ordinary person cannot see it  \r\nYour registration to Mysurebiz will accord you opportunity to see opportunity within problem around you and convert it to good business. There are always two sides to every problem, you either solve it or complain about it. Money is everywhere because every unpleasant situation is an opportunity to make money. \r\nEvery challenge in every society is a conceal opportunity for a smart entrepreneur to create income. This simply means as much as problem around as much as money to make, if you begin to see it that way then you will begin to understand that business is venturing into opportunity untapped.\r\nIn your next class you are going to be taught on how to discover and annex the potential(s) in you and how to can convert your talent to business spinning money for you. Don’t miss it!\r\nGood Luck 								                  Lecture By: Seun Ashimolowo', 'LESSON TWO              ACTION STEP\r\n\r\n\r\n\r\n\r\nPART A\r\n\r\nFrom the lecture received, answer the following questions to show that you learn something\r\n\r\n1.	What is Business\r\n2.	What are the categories of business we have\r\n3.	Which category does your intending/existing business fall in\r\n\r\n\r\n\r\nPART B\r\n\r\na)	Do an environmental research and state the percentage of the business categories, fill it bellow\r\nSN	CATEGORIES	                             %\r\n1	Production or Manufacturing	\r\n2	Services 	\r\n3	Merchandise or Buying and selling	\r\n\r\nb)	Talk to at least one person in each category to get\r\nI.	How did he/ she start\r\nII.	What does he/she do\r\n\r\n*MAKE SURE YOU SUBMIT YOUR ACTION STEP CORRECTLY AND ON TIME.', 'assignments/training-1-lesson-2-action-step-1.pdf', '2019-07-17 01:00:34', '2019-07-17 01:00:34'),
(17, 99, 25, 'BUSINESS IDEA GENERATION', 'https://www.youtube.com/embed/r5kT1RSgp4c', 'BUSINESS IDEA GENERATION\r\n\r\nOBJECTIVES\r\n	\r\n•	This training will equipped you with information needed to develop business idea \r\n•	It will help you to know that there are 2 source of idea generation\r\n•	It will help you know the consequence of each source.  \r\n•	It will help you to know the best of the sources and advantage\r\n\r\nCOURSE FOCUS\r\n\r\n•	What Is Business Idea\r\n•	Criteria of Good Business Ideas\r\n•	Sources of Business Ideas Generation\r\n•	Advantage of Internal Business Idea Generation\r\n•	Check on Your Business Idea\r\n\r\nDOWNLOAD THE LESSON.....', 'ACTION STEP \r\n\r\nDoing and submitting Action Step of this lesson will enable the system mark your attendance and that will sure enable you a step closer to benefit more from MySureBiz  \r\n\r\nDownload the Action Step. attend to all the questions and submit you findings by uploading it successfully.\r\n\r\nGood Luck.', 'assignments/training-2-lesson-2-action-step.pdf', '2019-09-01 04:05:11', '2019-09-01 04:05:11'),
(18, 99, 25, 'BUSINESS PLAN GUIDE', 'https://www.youtube.com/embed/FIoGLHT4wGE', 'Great Mind.\r\n\r\nYou are welcome to this lesson, am happy that you are getting along well. \r\n\r\nIn this lesson you are going to learn what is Business Plan and at the same time you will start writing Plan for your own Business. Isn\'t that Amazing?\r\n\r\nTHIS COURSE FOCUS ON:\r\n• What is a Business Plan?\r\n• How does it help you to achieve your goals?\r\n• What are the thinking processes you have to go through?\r\n• What value does it have for you as a manager or as an \r\n   entrepreneur starting up a new business?\r\n• How is it prepared?\r\nAnd ultimately you will get a guide that will help you start writing your own Plan.\r\n\r\nJust download \"TRAINING 2 LESSON 3\" to start your class and make sure you see the video for the lesson. this will give you complete information on the Subject.', 'ACTION STEP.\r\n\r\nTHIS ACTION STEP IS VERY IMPORTANT TO YOU. BECAUSE YOU START WRITING YOUR OWN BUSINESS PLAN WITH A GUIDE.\r\n\r\nNOTE: This plan will be used for the following:\r\n1.	It will be used to measure viability of your business venture with MYSUREBIZ Jury\r\n2.	It is bases of qualification for the start-up fund you are getting\r\n3.	It is the guideline for the release of the start-up fund for your business\r\n4.	It is step-to-step guide for your business operation\r\n5.	It is a document you can’t do without\r\n\r\nDownload the Action Step \"TRAINING 2 LESSON 3 ACTION STEP\" and carefully upload your answer in document. \r\n\r\nDon\'t forget successful submission of your Action Step proved you attend this class.', 'assignments/training-2-lesson-3-action-step.pdf', '2019-09-19 17:21:42', '2019-09-19 17:21:42'),
(19, 99, 25, 'RESEARCH YOUR BUSINESS', 'https://www.youtube.com/embed/CCKHH9jjS0s', 'You welcome to this lesson: you have just 120 minutes to attend to this lecture and it will give you answers to how to gather information on your business\r\n\r\nLESSON OBJECTIVES:\r\n	\r\n•	This lesson will expose you to importance of Business Research \r\n•	It will help you to know vital role Business Research play in managing your business project \r\n•	It will also give you a guide to conduct your own Business Research.  \r\n•	It will guide you through process of developing logical business conclusion after thorough research through and best approach suitable for your Business nature\r\n\r\n“SECTION 1” LESSON FOCUS ON BUSINESS RESEARCH\r\n•	What is a Business Research?\r\n• How does it help you to achieve your goals?\r\n• Importance of Business Research?\r\n• Types of business research and methodology?\r\n• What are the advantages and disadvantages of\r\n   research to your business?\r\n\r\n“SECTION 2” LESSON FOCUS ON WRITING CHAPTER 2 OF YOUR BUSINESS PLAN.\r\n•	What is your product or service all about?\r\n•	What value does your product or service offer?\r\n•	What distinguish you from other products/services \r\n•	What are your selling points?\r\n•	How will your product or service satisfy client needs and expectations?\r\n\r\nEnjoy your lesson\r\n\r\nDOWNLOAD THE LESSON BELOW (PDF FILE)', 'Great Mind,\r\n\r\nYou have two sections for your ACTION STEP. \r\n\r\nFirst is based on RESEARCH YOUR BUSINESS\r\n\r\nSecond is based on WRITING CHAPTER 2 OF YOUR BUSINESS PLAN (keep a copy of this chapter for yourself)\r\n\r\nMake sure you do this Action Step and submit it successfully by uploading it in document format ......\r\n\r\nDOWNLOAD THE ACTION STEP BELOW', 'assignments/training-2-lesson-4-action-step.pdf', '2019-10-07 22:28:45', '2019-10-07 22:28:45'),
(20, 99, 23, 'WHO IS AN ENTREPRENEUR', 'https://www.youtube.com/embed/QoqohmccTSc', 'This lesson center on who an entrepreneur is, you are going to know in this lesson that an Entrepreneur is not just self employed but a conscious person who start a business and create a system within the business to success with or without him\r\n\r\nIn the lesson you will also learn that every entrepreneur has peculiar strength that they utilize as advantage to achieve their business goal. \r\n\r\nAmazingly in the lesson\'s video, 50 entrepreneurs share with you their strength and what characteristic you should have as entrepreneur. This will help you discover your advantage for sure\r\n\r\ndownload your lesson in PDF Document and attend and make sure you don\'t miss the video. Good Luck', 'This lesson ACTION STEP is a must for you to do because\r\n\r\n1. It will stimulate you to identify your strength and relate it with your business\r\n2. It will charge you to understand the role of personal advantage in the life of entrepreneurs around \r\n\r\nNOTE: The successful submission of your action step by uploading in \'document file\' will mark your attendance to the lesson and it will serve as edge for your start up support.\r\n\r\nGood Luck', 'assignments/training-1.pdf', '2019-11-27 23:14:50', '2019-11-27 23:14:50');

-- --------------------------------------------------------

--
-- Table structure for table `lessons_progress`
--

CREATE TABLE `lessons_progress` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `lesson_id` int(10) UNSIGNED NOT NULL,
  `start` tinyint(4) NOT NULL,
  `video` tinyint(4) DEFAULT NULL,
  `assignment` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lessons_progress`
--

INSERT INTO `lessons_progress` (`id`, `user_id`, `lesson_id`, `start`, `video`, `assignment`, `created_at`, `updated_at`) VALUES
(6, 87, 12, 1, NULL, 1, '2019-04-20 21:22:56', '2019-04-23 01:40:44'),
(5, 90, 11, 1, 1, NULL, '2019-04-11 22:56:01', '2019-04-12 16:48:49'),
(4, 87, 11, 1, 1, 1, '2019-03-21 19:53:20', '2019-03-22 21:26:39'),
(7, 95, 11, 1, 1, 1, '2019-05-13 00:14:16', '2019-05-20 18:31:21'),
(8, 97, 11, 1, 1, NULL, '2019-05-18 00:55:42', '2019-05-18 00:55:42'),
(9, 157, 14, 1, NULL, NULL, '2019-07-22 15:43:06', '2019-07-22 15:43:06'),
(10, 125, 14, 1, NULL, NULL, '2019-07-25 13:00:21', '2019-07-25 13:00:21'),
(11, 192, 14, 1, NULL, NULL, '2019-08-01 17:07:56', '2019-08-01 17:07:56'),
(12, 176, 14, 1, 1, NULL, '2019-08-01 23:33:43', '2019-08-01 23:43:11'),
(13, 165, 15, 1, 1, 1, '2019-08-02 02:07:45', '2019-09-03 15:06:02'),
(14, 176, 15, 1, 1, NULL, '2019-08-02 17:04:52', '2019-08-14 09:44:01'),
(15, 126, 15, 1, NULL, NULL, '2019-08-02 21:18:19', '2019-08-02 21:18:19'),
(16, 191, 15, 1, NULL, NULL, '2019-08-02 23:24:26', '2019-08-02 23:24:26'),
(17, 200, 15, 1, 1, 1, '2019-08-02 23:45:08', '2019-08-21 19:23:55'),
(18, 195, 15, 1, 1, 1, '2019-08-03 01:30:56', '2019-09-14 17:00:46'),
(19, 101, 15, 1, NULL, NULL, '2019-08-04 17:52:37', '2019-08-04 17:52:37'),
(20, 157, 15, 1, NULL, 1, '2019-08-21 19:01:41', '2019-10-21 19:28:23'),
(21, 91, 16, 1, NULL, NULL, '2019-08-22 13:46:26', '2019-08-22 13:46:26'),
(22, 91, 15, 1, 1, 1, '2019-08-22 13:47:23', '2019-08-22 14:44:17'),
(23, 165, 16, 1, 1, NULL, '2019-09-03 15:06:18', '2019-09-12 15:38:13'),
(24, 200, 16, 1, NULL, 1, '2019-09-08 18:53:37', '2019-10-08 21:18:24'),
(25, 195, 16, 1, NULL, NULL, '2019-09-25 01:19:46', '2019-09-25 01:19:46'),
(26, 122, 15, 1, NULL, 1, '2019-10-07 01:37:47', '2019-11-19 06:08:31'),
(27, 122, 18, 1, 1, NULL, '2019-10-08 02:46:20', '2019-10-08 02:46:36'),
(28, 125, 17, 1, 1, NULL, '2019-10-09 19:04:32', '2020-01-09 02:42:25'),
(29, 157, 18, 1, NULL, NULL, '2019-10-21 15:55:03', '2019-10-21 15:55:03'),
(30, 122, 17, 1, 1, 1, '2019-11-19 06:10:14', '2019-11-20 01:59:52'),
(31, 237, 15, 1, NULL, NULL, '2019-12-02 02:15:56', '2019-12-02 02:15:56'),
(32, 225, 15, 1, NULL, 1, '2019-12-02 12:46:23', '2019-12-09 17:53:20'),
(33, 222, 15, 1, NULL, NULL, '2019-12-02 16:30:56', '2019-12-02 16:30:56'),
(34, 218, 15, 1, NULL, NULL, '2019-12-21 08:21:28', '2019-12-21 08:21:28'),
(35, 258, 15, 1, 1, NULL, '2020-01-01 16:43:06', '2020-01-01 17:01:49'),
(36, 195, 17, 1, 1, 1, '2020-01-03 21:21:43', '2020-01-15 16:24:28'),
(37, 157, 17, 1, 1, NULL, '2020-01-06 22:24:15', '2020-01-06 22:27:15'),
(38, 125, 15, 1, NULL, NULL, '2020-01-09 02:23:51', '2020-01-09 02:23:51'),
(39, 195, 18, 1, NULL, NULL, '2020-01-15 16:25:20', '2020-01-15 16:25:20'),
(40, 262, 15, 1, NULL, NULL, '2020-02-01 11:18:29', '2020-02-01 11:18:29'),
(41, 260, 15, 1, NULL, NULL, '2020-02-21 09:55:38', '2020-02-21 09:55:38');

-- --------------------------------------------------------

--
-- Table structure for table `library`
--

CREATE TABLE `library` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `course_id` int(10) UNSIGNED DEFAULT NULL,
  `lesson_id` int(10) UNSIGNED DEFAULT NULL,
  `file` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `library`
--

INSERT INTO `library` (`id`, `user_id`, `course_id`, `lesson_id`, `file`, `created_at`, `updated_at`) VALUES
(75, 99, 26, NULL, 'library/training-1-1.pdf', '2019-12-04 22:47:10', '2019-12-04 22:47:10'),
(74, 99, 23, 20, 'library/training-1.pdf', '2019-11-27 23:14:50', '2019-11-27 23:14:50'),
(64, 87, NULL, NULL, 'library/mysurebiz-welcome-note-1.pdf', '2019-05-15 20:53:37', '2019-05-15 20:53:37'),
(63, 87, NULL, NULL, 'library/welcoming-action-step.docx', '2019-05-10 00:58:31', '2019-05-10 00:58:31'),
(73, 99, 25, 19, 'library/training-2-lesson-4.pdf', '2019-10-07 22:28:45', '2019-10-07 22:28:45'),
(72, 99, 25, 18, 'library/training-2-lesson-3.pdf', '2019-09-19 17:21:42', '2019-09-19 17:21:42'),
(71, 99, 25, 17, 'library/training-2-lesson-2.pdf', '2019-09-01 04:05:11', '2019-09-01 04:05:11'),
(69, 99, 23, 16, 'library/training-1-lesson-3.pdf', '2019-08-02 20:27:36', '2019-08-02 20:27:36'),
(70, 99, 25, NULL, 'library/training-2-lesson-1.pdf', '2019-08-16 21:34:24', '2019-08-16 21:34:24'),
(65, 87, 23, NULL, 'library/reason-to-start-biz.pdf', '2019-07-01 02:57:32', '2019-07-01 02:57:32');

-- --------------------------------------------------------

--
-- Table structure for table `library_business_categories`
--

CREATE TABLE `library_business_categories` (
  `library_id` int(10) UNSIGNED NOT NULL,
  `business_category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `library_business_categories`
--

INSERT INTO `library_business_categories` (`library_id`, `business_category_id`, `created_at`, `updated_at`) VALUES
(63, 1, '2019-05-10 00:58:31', '2019-05-10 00:58:31'),
(63, 2, '2019-05-10 00:58:31', '2019-05-10 00:58:31'),
(63, 3, '2019-05-10 00:58:31', '2019-05-10 00:58:31'),
(63, 4, '2019-05-10 00:58:31', '2019-05-10 00:58:31'),
(63, 5, '2019-05-10 00:58:31', '2019-05-10 00:58:31'),
(63, 6, '2019-05-10 00:58:31', '2019-05-10 00:58:31'),
(64, 1, '2019-05-15 20:53:37', '2019-05-15 20:53:37'),
(64, 2, '2019-05-15 20:53:37', '2019-05-15 20:53:37'),
(64, 3, '2019-05-15 20:53:37', '2019-05-15 20:53:37'),
(64, 4, '2019-05-15 20:53:37', '2019-05-15 20:53:37'),
(64, 5, '2019-05-15 20:53:37', '2019-05-15 20:53:37'),
(64, 6, '2019-05-15 20:53:37', '2019-05-15 20:53:37');

-- --------------------------------------------------------

--
-- Table structure for table `mailattachements`
--

CREATE TABLE `mailattachements` (
  `id` int(10) UNSIGNED NOT NULL,
  `mail_id` int(10) UNSIGNED NOT NULL,
  `attachment` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mailattachements`
--

INSERT INTO `mailattachements` (`id`, `mail_id`, `attachment`, `created_at`, `updated_at`) VALUES
(5, 14, 'emailattachments/visa-au-canada-2-1.jpg', '2019-04-10 16:16:23', '2019-04-10 16:16:23');

-- --------------------------------------------------------

--
-- Table structure for table `mails`
--

CREATE TABLE `mails` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `subject` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `schedule` date NOT NULL,
  `deleted` tinyint(10) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mails`
--

INSERT INTO `mails` (`id`, `user_id`, `subject`, `content`, `schedule`, `deleted`, `created_at`, `updated_at`) VALUES
(21, 99, 'HOW TO PAY YOUR TOKEN', '<p><strong>HOW TO PAY YOUR TOKEN</strong></p><p>Login into your dashboard, click on Pay Penny-Wise</p><p>There are many options to pay, kindly choose the most convenience for you from the following available: Pay with <strong>CARD</strong> | Pay with <strong>USSD</strong> | Pay with <strong>BANK</strong>, | Pay with <strong>BANK TRANSFER</strong>, | Pay with <strong>VISA QR</strong>, | Pay with <strong>BARTER</strong>, | etc. And follow the instruction, it is so simple.</p>', '2019-08-22', 0, '2019-08-22 21:06:57', '2019-08-22 21:06:57'),
(19, 87, 'mysurebiz', '<p>god blee you</p>', '2019-05-28', 0, '2019-05-28 16:14:49', '2019-05-28 16:14:49'),
(20, 99, 'EASY WAY TO PAY YOUR TOKEN', '<p><strong>HOW TO PAY YOUR TOKEN</strong></p><p>Login into your dashboard, click on Pay Penny-Wise</p><p>There are many options to pay, kindly choose the most convenience for you from the following available: Pay with <strong>CARD</strong> | Pay with <strong>USSD</strong> | Pay with <strong>BANK</strong>, | Pay with <strong>BANK TRANSFER</strong>, | Pay with <strong>VISA QR</strong>, | Pay with <strong>BARTER</strong>, | etc. And follow the instruction, it is so simple.</p>', '2019-08-22', 0, '2019-08-22 21:05:17', '2019-08-22 21:05:17'),
(16, 86, 'Test Message', '<p>;lmdsfdvk,fsl;,;slf</p>', '2019-04-13', 0, '2019-04-13 11:21:36', '2019-04-13 11:21:36'),
(17, 90, 'Test', '<p>kdsbvjklccs</p>', '2019-05-09', 0, '2019-05-09 16:15:42', '2019-05-09 16:15:42'),
(18, 87, 'welcome to mysurebiz', '<p>get ready to have a life time experience</p>', '2019-05-20', 0, '2019-05-20 18:21:37', '2019-05-20 18:21:37'),
(15, 85, 'NOTES', '<p>This is the best platform</p>', '2019-04-11', 0, '2019-04-11 15:54:05', '2019-04-11 15:54:05'),
(10, 86, 'Test', '<p>kbsdlksjsk</p>', '2019-04-10', 0, '2019-04-10 15:53:55', '2019-04-10 15:53:55'),
(11, 86, 'test', '<p>kvcdgfhjkl</p>', '2019-04-10', 0, '2019-04-10 15:57:01', '2019-04-10 15:57:01'),
(12, 86, 'Second Test', '<p>kvcdgfhjkl</p>', '2019-04-10', 0, '2019-04-10 16:06:10', '2019-04-10 16:06:10'),
(13, 86, 'test 3', '<p>kvcdgfhjkl</p>', '2019-04-10', 0, '2019-04-10 16:07:28', '2019-04-10 16:07:28'),
(14, 86, 'Test 3', '<p>jhjcskml;</p>', '2019-04-10', 0, '2019-04-10 16:16:23', '2019-04-10 16:16:23'),
(22, 99, 'HOW TO PAY YOUR TOKEN ON MYSUREBIZ', '<p><strong style=\"background-color: rgb(250, 251, 253);\">HOW TO PAY YOUR TOKEN</strong></p><p><br></p><p><span style=\"background-color: rgb(250, 251, 253);\">In our effort to serve you better, we have design most convenient way for you to pay your tokens from your dashboard: click on </span><strong style=\"background-color: rgb(250, 251, 253);\">Pay Penny-Wise</strong></p><p><span style=\"background-color: rgb(250, 251, 253);\">there are many options to pay, kindly choose the most convenience for you from the following available: Pay with&nbsp;</span><strong style=\"background-color: rgb(250, 251, 253);\">CARD</strong><span style=\"background-color: rgb(250, 251, 253);\">&nbsp;| Pay with&nbsp;</span><strong style=\"background-color: rgb(250, 251, 253);\">USSD</strong><span style=\"background-color: rgb(250, 251, 253);\">&nbsp;| Pay with&nbsp;</span><strong style=\"background-color: rgb(250, 251, 253);\">BANK</strong><span style=\"background-color: rgb(250, 251, 253);\">, | Pay with&nbsp;</span><strong style=\"background-color: rgb(250, 251, 253);\">BANK TRANSFER,</strong><span style=\"background-color: rgb(250, 251, 253);\"> | Pay with&nbsp;</span><strong style=\"background-color: rgb(250, 251, 253);\">VISA QR</strong><span style=\"background-color: rgb(250, 251, 253);\">, | Pay with&nbsp;</span><strong style=\"background-color: rgb(250, 251, 253);\">BARTER</strong><span style=\"background-color: rgb(250, 251, 253);\">, | etc. And follow the instruction, it is so simple.</span></p><p><br></p><p>If you have issue on payment on receiving your training kindly chat with us using our life chat on the home page of our site: www.mysurebiz.com</p><p><br></p><p>MySureBiz Team</p><p><br></p>', '2019-08-27', 0, '2019-08-27 17:59:18', '2019-08-27 17:59:18'),
(23, 99, 'YOU NEED TO KNOW THIS FACT', '<p><span style=\"color: rgb(34, 34, 34); background-color: rgb(255, 255, 255);\">Why do start-up fail?</span></p><p><br></p><p><span style=\"color: rgb(34, 34, 34); background-color: rgb(255, 255, 255);\">Lack of Funds:</span></p><p><br></p><p><span style=\"color: rgb(34, 34, 34); background-color: rgb(255, 255, 255);\">Another problem with the most of&nbsp;</span><strong style=\"color: rgb(34, 34, 34); background-color: rgb(255, 255, 255);\">entrepreneurs</strong><span style=\"color: rgb(34, 34, 34); background-color: rgb(255, 255, 255);\">&nbsp;is not putting in the required amount of money. It is often seen that people pursue their brilliant ideas without realizing that they lack proper funding which are needed for any particular business</span></p><p><span style=\"background-color: rgb(255, 255, 255);\">Fund are not easy to get by especially start-up fund, In Nigeria today there are no financial institution that are willing to give startup fund except few and they have many conditions that will possibly discourage your quest. </span></p><p><span style=\"background-color: rgb(255, 255, 255);\">The best way to raise fund for your business is through DCI \"Dependent Cash Inflow\" which is money coming to you from every where. token from these flow will solve your funding problem or provide an equity that encourage financials on that business.</span></p><p>Hurrah! <a href=\"www.mysurebiz.com\" target=\"_blank\"><strong>Mysurebiz </strong></a>have made it all easy for you, you now get 100% refund of all your training payment and with simple condition you get start-up loan up to N20 million at 0% interest. Isn\'t that Great? </p><p>Click on FAQ on: <strong>www.mysurebiz.com</strong> for detail. Talk to us on any issue bordering you on our services via our Live Chat</p><p><br></p><p>Become active user and <strong>Be What You Wanna Be</strong></p>', '2019-08-29', 0, '2019-08-29 20:56:49', '2019-08-29 20:56:49'),
(24, 99, 'This information will help you!', '<p>You have this opportunity to make it!!!</p><p><br></p><p>Opportunity to make it in life comes and go, the smart people decide and make good use of those privilege when it present itself. </p><p>One of the greatest opportunity you can have is the one that will help you to create a source of income and make you becoming your own boss. </p><p>This type of opportunity do not come repeatedly. </p><p>Fortunately you are one of the people that made the right decision that place you on a right part of <strong style=\"color: rgb(178, 107, 0);\">MYSUREBIZ</strong></p><p>But! It doesn\'t stop there, just registring to <strong style=\"color: rgb(178, 107, 0);\">MYSUREBIZ</strong> will not take you there, you will need to become active on the platform by:</p><p><br></p><p><strong>1</strong>. <strong style=\"color: rgb(230, 0, 0);\">Attending your Business Training Lectures which comes intervals</strong></p><p><br></p><p><strong>2</strong><strong style=\"color: rgb(255, 255, 255);\">.</strong><strong style=\"color: rgb(230, 0, 0);\"> Start Paying your Token Right Now via your dashboard</strong></p><p><br></p><p>These two steps will position you to benefit the following:</p><p><br></p><p><strong>1</strong>. <strong style=\"color: rgb(0, 138, 0);\">Free Expert Practical Support</strong></p><p><strong>2</strong><strong style=\"color: rgb(0, 138, 0);\">. 100% Payment Refund </strong></p><p><strong>3</strong><strong style=\"color: rgb(0, 138, 0);\">. Free CAC Business Registration Certificate</strong></p><p><strong>4</strong><strong style=\"color: rgb(0, 138, 0);\">. Start-Up Loan up to N20,000,000 @ 0% interest </strong></p><p><br></p><p>What are you waiting for Log in to your dashboard right now to attend your lesson and carefully attend to the Action Step and submit it</p><p><br></p><p><strong><em>Wait</em></strong>!  click on <strong>Pay Penny Wise</strong> on the menu on your dashboard to pay your token. There are 5 options available for you to pay. Chose the best comfortable for you</p><p><br></p><p>If you have any issue, kindly talk to our customer care via a life chat on our website. </p><p><br></p><p>Good Luck to YOU.</p><p><br></p><p><br></p><p><br></p>', '2019-09-06', 0, '2019-09-06 18:44:51', '2019-09-06 18:44:51'),
(25, 99, 'This will sure interest you!! You haven\'t got it this easy ever!!!', '<p><span style=\"background-color: rgb(250, 251, 253);\">HOW TO PAY YOUR TOKEN</span></p><p><br></p><p><img src=\"https://classroom.mysurebiz.com/storage/emailattachmentsImages/a4d845a8e21e5ff2333acda9d156b1f31161b096.png\"></p><p><br></p><p><span style=\"background-color: rgb(250, 251, 253);\">If you have not been attending your lesson on Mysurebiz, hey! Better start doing so because we have all you need to be your own Boss. You know what? In most Convenent way you can ever think.</span></p><p><br></p><p><span style=\"background-color: rgb(250, 251, 253);\">In our effort to serve you better, we have design most convenient way for you to pay your tokens from your dashboard: </span></p><p><img src=\"https://classroom.mysurebiz.com/storage/emailattachmentsImages/8070720ac83e8d91713716b688ddf7ed7b30acd1.jpeg\"><span style=\"background-color: rgb(250, 251, 253);\"> </span></p><p><br></p><p><span style=\"background-color: rgb(250, 251, 253);\">Click on&nbsp;</span><strong style=\"background-color: rgb(250, 251, 253);\">Pay Penny-Wise</strong></p><p><span style=\"background-color: rgb(250, 251, 253);\">there are many options to pay, kindly choose the most convenience for you from the following available: Pay with&nbsp;CARD&nbsp;| Pay with&nbsp;USSD&nbsp;| Pay with&nbsp;BANK, | Pay with&nbsp;BANK TRANSFER,&nbsp;| Pay with&nbsp;VISA QR, | Pay with&nbsp;BARTER, | etc. And follow the instruction, it is so simple.</span></p><p><br></p><p><img src=\"https://classroom.mysurebiz.com/storage/emailattachmentsImages/ff183809801611863e6b3e6571893270d8d5352d.png\"></p><p><span style=\"background-color: rgb(250, 251, 253);\">If you have issue on payment on receiving your training kindly chat with us using our life chat on the home page of our site: </span><a href=\"www.mysurebiz.com\" target=\"_blank\" style=\"background-color: rgb(250, 251, 253);\"><strong>www.mysurebiz.com</strong></a></p><p><br></p><p><span style=\"background-color: rgb(250, 251, 253);\">MySureBiz Team</span></p><p><br></p>', '2019-09-16', 0, '2019-09-16 19:45:25', '2019-09-16 19:45:25'),
(26, 99, 'You need this interesting information!', '<p><strong style=\"background-color: rgb(250, 251, 253);\">You have this opportunity to make it!!!</strong></p><p><br></p><p><span style=\"background-color: rgb(250, 251, 253);\">Opportunity to make it in life comes and go, the smart people decide and make good use of those privilege when it present itself.</span></p><p><span style=\"background-color: rgb(250, 251, 253);\">One of the greatest opportunity you can have is the one that will help you to create a source of income and make you becoming your own boss.</span></p><p><span style=\"background-color: rgb(250, 251, 253);\">This type of opportunity do not come repeatedly.</span></p><p><span style=\"background-color: rgb(250, 251, 253);\">Fortunately you are one of the people that made the right decision that place you on a right part of&nbsp;</span><span style=\"background-color: rgb(250, 251, 253); color: rgb(178, 107, 0);\">MYSUREBIZ</span></p><p><span style=\"background-color: rgb(250, 251, 253);\">But! It doesn\'t stop there, just registering to&nbsp;</span><span style=\"background-color: rgb(250, 251, 253); color: rgb(178, 107, 0);\">MYSUREBIZ</span><span style=\"background-color: rgb(250, 251, 253);\">&nbsp;will not take you there, you will need to become active on the platform by:</span></p><p><br></p><p><span style=\"background-color: rgb(250, 251, 253);\">1.&nbsp;</span><span style=\"background-color: rgb(250, 251, 253); color: rgb(230, 0, 0);\">Attending your Business Training Lectures which comes intervals</span></p><p><br></p><p><span style=\"background-color: rgb(250, 251, 253);\">2</span><span style=\"background-color: rgb(250, 251, 253); color: rgb(255, 255, 255);\">.</span><span style=\"background-color: rgb(250, 251, 253); color: rgb(230, 0, 0);\">&nbsp;Start Paying your Token Right Now via your dashboard</span></p><p><br></p><p><span style=\"background-color: rgb(250, 251, 253);\">These two steps will position you to benefit the following:</span></p><p><br></p><p><span style=\"background-color: rgb(250, 251, 253);\">1.&nbsp;</span><span style=\"background-color: rgb(250, 251, 253); color: rgb(0, 138, 0);\">Free Expert Practical Support</span></p><p><span style=\"background-color: rgb(250, 251, 253);\">2</span><span style=\"background-color: rgb(250, 251, 253); color: rgb(0, 138, 0);\">. 100% Payment Refund</span></p><p><span style=\"background-color: rgb(250, 251, 253);\">3</span><span style=\"background-color: rgb(250, 251, 253); color: rgb(0, 138, 0);\">. Free CAC Business Registration Certificate</span></p><p><span style=\"background-color: rgb(250, 251, 253);\">4</span><span style=\"background-color: rgb(250, 251, 253); color: rgb(0, 138, 0);\">. Start-Up Loan up to N20,000,000 @ 0% interest</span></p><p><br></p><p><span style=\"background-color: rgb(250, 251, 253);\">What are you waiting for Log in to your dashboard right now to attend your lesson and carefully attend to the Action Step and submit it</span></p><p><br></p><p><em style=\"background-color: rgb(250, 251, 253);\">Wait</em><span style=\"background-color: rgb(250, 251, 253);\">! click on&nbsp;Pay Penny Wise&nbsp;on the menu on your dashboard to pay your token. There are 5 options available for you to pay. Chose the best comfortable for you</span></p><p><br></p><p><span style=\"background-color: rgb(250, 251, 253);\">If you have any issue, kindly talk to our customer care via a life chat on our website.</span></p><p><br></p><p><span style=\"background-color: rgb(250, 251, 253);\">Good Luck to YOU.</span></p><p><br></p>', '2019-10-11', 0, '2019-10-11 15:21:21', '2019-10-11 15:21:21'),
(27, 99, 'YOU HAVE THIS OPPORTUNITY TO MAKE IT!!!', '<p><span style=\"background-color: rgb(250, 251, 253);\">You have this opportunity to make it!!!</span></p><p><br></p><p><span style=\"background-color: rgb(250, 251, 253);\">Opportunity to make it in life comes and go, the smart people decide and make good use of those privilege when it present itself.</span></p><p><span style=\"background-color: rgb(250, 251, 253);\">One of the greatest opportunity you can have is the one that will help you to create a source of income and make you becoming your own boss.</span></p><p><span style=\"background-color: rgb(250, 251, 253);\">This type of opportunity do not come repeatedly.</span></p><p><span style=\"background-color: rgb(250, 251, 253);\">Fortunately you are one of the people that made the right decision that place you on a right part of&nbsp;</span><span style=\"background-color: rgb(250, 251, 253); color: rgb(178, 107, 0);\">MYSUREBIZ</span></p><p><span style=\"background-color: rgb(250, 251, 253);\">But! It doesn\'t stop there, just registering to&nbsp;</span><span style=\"background-color: rgb(250, 251, 253); color: rgb(178, 107, 0);\">MYSUREBIZ</span><span style=\"background-color: rgb(250, 251, 253);\">&nbsp;will not take you there, you will need to become active on the platform by:</span></p><p><br></p><p><span style=\"background-color: rgb(250, 251, 253);\">1.&nbsp;</span><span style=\"background-color: rgb(250, 251, 253); color: rgb(230, 0, 0);\">Attending your Business Training Lectures which comes intervals</span></p><p><br></p><p><span style=\"background-color: rgb(250, 251, 253);\">2</span><span style=\"background-color: rgb(250, 251, 253); color: rgb(255, 255, 255);\">.</span><span style=\"background-color: rgb(250, 251, 253); color: rgb(230, 0, 0);\">&nbsp;Start Paying your Token Right Now via your dashboard</span></p><p><br></p><p><span style=\"background-color: rgb(250, 251, 253);\">These two steps will position you to benefit the following:</span></p><p><br></p><p><span style=\"background-color: rgb(250, 251, 253);\">1.&nbsp;</span><span style=\"background-color: rgb(250, 251, 253); color: rgb(0, 138, 0);\">Free Expert Practical Support</span></p><p><span style=\"background-color: rgb(250, 251, 253);\">2</span><span style=\"background-color: rgb(250, 251, 253); color: rgb(0, 138, 0);\">. 50% Payment Refund</span></p><p><span style=\"background-color: rgb(250, 251, 253);\">3</span><span style=\"background-color: rgb(250, 251, 253); color: rgb(0, 138, 0);\">. Free CAC Business Registration Certificate</span></p><p><span style=\"background-color: rgb(250, 251, 253);\">4</span><span style=\"background-color: rgb(250, 251, 253); color: rgb(0, 138, 0);\">. Start-Up Loan up to N20,000,000 @ 0% interest</span></p><p><br></p><p><span style=\"background-color: rgb(250, 251, 253);\">What are you waiting for Log in to your dashboard right now to attend your Lesson and carefully attend to the Action Step and submit it</span></p><p><br></p><p><em style=\"background-color: rgb(250, 251, 253);\">Wait</em><span style=\"background-color: rgb(250, 251, 253);\">! click on&nbsp;</span><strong style=\"background-color: rgb(250, 251, 253);\">Pay Penny Wise</strong><span style=\"background-color: rgb(250, 251, 253);\">&nbsp;on the menu on your dashboard to pay your token. There are 5 options available for you to pay. Chose the best comfortable for you</span></p><p><br></p><p><span style=\"background-color: rgb(250, 251, 253);\">If you have any issue, kindly talk to our customer care via a life chat on our website.</span></p><p><br></p><p><span style=\"background-color: rgb(250, 251, 253);\">Good Luck to YOU.</span></p><p><br></p>', '2019-11-20', 0, '2019-11-20 14:43:11', '2019-11-20 14:43:11'),
(28, 99, 'HAVE YOU REGISTER TO MYSUREBIZ?  YOU NEED TO READ THIS!', '<p>You have this opportunity to make it!!!</p><p><br></p><p>Opportunity to make it in life comes and go, the smart people decide and make good use of those privilege when it present itself.</p><p>One of the greatest opportunity you can have is the one that will help you to create a source of income and make you becoming your own boss.</p><p>This type of opportunity do not come repeatedly.</p><p>Fortunately you are one of the people that made the right decision that place you on a right part of&nbsp;<span style=\"color: rgb(178, 107, 0);\">MYSUREBIZ</span></p><p>But! It doesn\'t stop there, just registering to&nbsp;<span style=\"color: rgb(178, 107, 0);\">MYSUREBIZ</span>&nbsp;will not take you there, you will need to become active on the platform by:</p><p><br></p><p>1.&nbsp;<span style=\"color: rgb(230, 0, 0);\">Attending your Business Training Lesson which comes intervals</span></p><p><br></p><p>2<span style=\"color: rgb(255, 255, 255);\">.</span><span style=\"color: rgb(230, 0, 0);\">&nbsp;Start Paying your Token Right Now via your dashboard</span></p><p><br></p><p>These two steps will position you to benefit the following:</p><p><br></p><p>1.&nbsp;<span style=\"color: rgb(0, 138, 0);\">Free Expert Practical Support</span></p><p>2<span style=\"color: rgb(0, 138, 0);\">. 50% Payment Cashback</span></p><p>3<span style=\"color: rgb(0, 138, 0);\">. Free CAC Business Registration Certificate</span></p><p>4<span style=\"color: rgb(0, 138, 0);\">. Start-Up Loan up to N20,000,000 @ 0% interest (T&amp;C)</span></p><p><br></p><p>What are you waiting for Log in to your dashboard right now to attend your lesson and carefully attend to the Action Step and submit it</p><p><br></p><p><em>Wait</em>! click on&nbsp;Pay Penny Wise&nbsp;on the menu on your dashboard to pay your token. There are 5 options available for you to pay. Chose the best comfortable for you</p><p><br></p><p>If you have any issue, kindly talk to our customer care via a life chat on our website.</p><p><br></p><p>Good Luck to YOU.</p><p><br></p>', '2019-12-02', 0, '2019-12-02 21:31:04', '2019-12-02 21:31:04'),
(29, 99, 'ARE YOU MYSUREBIZ USER? READ THIS', '<p class=\"ql-align-justify\"><span style=\"color: rgb(255, 153, 0);\">Are you  Mysurebiz User? Read this</span></p><p class=\"ql-align-justify\"><br></p><p class=\"ql-align-justify\">Now that you have properly registered with <span style=\"color: rgb(0, 138, 0);\">Mysurebiz</span> dont stop there, begin to take steps that will transform your life tomorrow.</p><p class=\"ql-align-justify\"><br></p><p class=\"ql-align-justify\">One of the criteria of Mysurebiz &nbsp;users is to attend training class and pay token daily or weekly depending when convenient for you if you have any difficulties you can talk to our customer care via  our live chat on our site</p><p class=\"ql-align-justify\"><br></p><p class=\"ql-align-justify\">what are you waiting for? Commence your training class and pay your token which will enable you become an entrepreneur in future. Remember <span style=\"color: rgb(230, 0, 0);\">Knowledge is Power.</span></p><p class=\"ql-align-justify\"><br></p><p class=\"ql-align-justify\"><span style=\"color: rgb(230, 0, 0);\">Idea rule the world</span> if you are not informed you will be deformed .</p><p class=\"ql-align-justify\"><br></p><p class=\"ql-align-justify\">The decision you have taken today can make you an Employer or an Employee even worst, Jobless. </p><p class=\"ql-align-justify\"><br></p><p class=\"ql-align-justify\">We urge you to decide to <em style=\"color: rgb(0, 97, 0);\">Be what you wanna be</em></p><p class=\"ql-align-justify\"><br></p><p class=\"ql-align-justify\"><br></p><p class=\"ql-align-justify\">&nbsp;</p><p><br></p>', '2019-12-06', 0, '2019-12-06 21:05:20', '2019-12-06 21:05:20'),
(30, 99, 'THIS IS FOR MYSUREBIZ USERS', '<p class=\"ql-align-justify\"><span style=\"color: rgb(0, 138, 0);\">This is for&nbsp;Mysurebiz Users</span></p><p><br></p><p class=\"ql-align-justify\"><span style=\"color: rgb(230, 0, 0);\">Do you know that there is remedy for unemployment in Nigeria?</span> Millions of Nigeria are hopeless and looking for way out. But for you, you are wise because you have registered to the platform that has solution to help you birth you business dreams. </p><p class=\"ql-align-justify\"><span style=\"color: rgb(0, 71, 178);\">One Amazing thing about this platform is that it mentors your business dream to reality via your mobile phone and at your convenience.</span></p><p><br></p><p class=\"ql-align-justify\">Since there is scarcity of job in Nigeria Mysurebiz will enable you start your own business and create a job for others. </p><p class=\"ql-align-justify\"><br></p><p class=\"ql-align-justify\">To achieve this you need to make up your mind to utilize the opportunity Mysurebiz brings your way by attending your Training and Lesson on your dashboard and pay your token using payment system on the menu on your dashboard. It is so easy</p><p class=\"ql-align-justify\"><br></p><p class=\"ql-align-justify\">You have got the opportunity to plan for your tomorrow. </p><p class=\"ql-align-justify\"><br></p><p class=\"ql-align-justify\">If you don’t blow your whistle nobody will blow for you.</p><p><br></p><p class=\"ql-align-justify\">I implore you to be among the few wise ones that convert opportunity to advantage.</p><p><br></p><p class=\"ql-align-justify\">Hurry up now a stick in time saves nine. <em style=\"color: rgb(49, 132, 155);\">Mysurebiz makes yo be what you wanna be</em>.</p><p><br></p>', '2019-12-10', 0, '2019-12-10 18:34:45', '2019-12-10 18:34:45'),
(31, 99, 'YOU HAVE THIS OPPORTUNITY TO MAKE IT 2020!!!', '<p class=\"ql-align-justify\"><span style=\"color: rgb(0, 138, 0);\">This is for&nbsp;Mysurebiz Users</span></p><p><br></p><p class=\"ql-align-justify\"><span style=\"color: rgb(230, 0, 0);\">Do you know that there is remedy for unemployment in Nigeria?</span>&nbsp;Millions of Nigeria are hopeless and looking for way out. But for you, you are wise because you have registered to the platform that can help you birth you business dreams.</p><p class=\"ql-align-justify\"><span style=\"color: rgb(0, 71, 178);\">One Amazing thing about this platform is that it mentors your business dream to reality via your mobile phone and at your convenience.</span></p><p><br></p><p class=\"ql-align-justify\">Since there is scarcity of job in Nigeria Mysurebiz will enable you start your dream business and create a job for others.</p><p class=\"ql-align-justify\"><br></p><p class=\"ql-align-justify\">To achieve this you need to make up your mind to utilize the opportunity Mysurebiz brings your way by attending your Training and Lesson on your dashboard and start paying your token using payment system on the menu on your dashboard. It is so easy</p><p class=\"ql-align-justify\"><br></p><p class=\"ql-align-justify\">You have got the opportunity to plan for your tomorrow.</p><p class=\"ql-align-justify\"><br></p><p class=\"ql-align-justify\">If you don’t blow your whistle nobody will blow for you.</p><p><br></p><p class=\"ql-align-justify\">I implore you to be among the few wise ones that convert opportunity to advantage.</p><p><br></p><p class=\"ql-align-justify\">Hurry up now a stick in time saves nine.&nbsp;<em style=\"color: rgb(49, 132, 155);\">Mysurebiz makes yo be what you wanna be</em>.</p><p class=\"ql-align-justify\"><br></p><p class=\"ql-align-justify\">Best Regards</p><p><br></p>', '2020-02-04', 0, '2020-02-04 20:31:32', '2020-02-04 20:31:32'),
(32, 99, 'This opportunity will make your dream come true 2020', '<p><span style=\"background-color: rgb(250, 251, 253);\">You have this opportunity to make it!!!</span></p><p><br></p><p><span style=\"background-color: rgb(250, 251, 253);\">Opportunity to make it in life comes and go, the smart people decide and make good use of those privilege when it present itself.</span></p><p><span style=\"background-color: rgb(250, 251, 253);\">One of the greatest opportunity you can have is the one that will help you to create a source of income and make you becoming your own boss.</span></p><p><span style=\"background-color: rgb(250, 251, 253);\">This type of opportunity do not come repeatedly.</span></p><p><span style=\"background-color: rgb(250, 251, 253);\">Fortunately you are one of the people that made the right decision that place you on a right part of&nbsp;</span><span style=\"background-color: rgb(250, 251, 253); color: rgb(178, 107, 0);\">MYSUREBIZ</span></p><p><span style=\"background-color: rgb(250, 251, 253);\">But! It doesn\'t stop there, just registering to&nbsp;</span><span style=\"background-color: rgb(250, 251, 253); color: rgb(178, 107, 0);\">MYSUREBIZ</span><span style=\"background-color: rgb(250, 251, 253);\">&nbsp;will not take you there, you will need to become active on the platform by:</span></p><p><br></p><p><span style=\"background-color: rgb(250, 251, 253);\">1.&nbsp;</span><span style=\"background-color: rgb(250, 251, 253); color: rgb(230, 0, 0);\">Attending your Business Training Lectures which comes intervals</span></p><p><br></p><p><span style=\"background-color: rgb(250, 251, 253);\">2</span><span style=\"background-color: rgb(250, 251, 253); color: rgb(255, 255, 255);\">.</span><span style=\"background-color: rgb(250, 251, 253); color: rgb(230, 0, 0);\">&nbsp;Start Paying your Token Right Now via your dashboard</span></p><p><br></p><p><span style=\"background-color: rgb(250, 251, 253);\">These two steps will position you to benefit the following:</span></p><p><br></p><p><span style=\"background-color: rgb(250, 251, 253);\">1.&nbsp;</span><span style=\"background-color: rgb(250, 251, 253); color: rgb(0, 138, 0);\">Free Expert Practical Support</span></p><p><span style=\"background-color: rgb(250, 251, 253);\">2</span><span style=\"background-color: rgb(250, 251, 253); color: rgb(0, 138, 0);\">. 50% Payment Refund</span></p><p><span style=\"background-color: rgb(250, 251, 253);\">3</span><span style=\"background-color: rgb(250, 251, 253); color: rgb(0, 138, 0);\">. Free CAC Business Registration Certificate</span></p><p><span style=\"background-color: rgb(250, 251, 253);\">4</span><span style=\"background-color: rgb(250, 251, 253); color: rgb(0, 138, 0);\">. Start-Up Loan up to N20,000,000 @ 0% interest</span></p><p><br></p><p><span style=\"background-color: rgb(250, 251, 253);\">What are you waiting for Log in to your dashboard right now to attend your Lesson and carefully attend to the Action Step and submit it</span></p><p><br></p><p><strong style=\"background-color: rgb(250, 251, 253);\"><em>Wait</em>!</strong><span style=\"background-color: rgb(250, 251, 253);\"> click on&nbsp;Pay Penny Wise&nbsp;on the menu on your dashboard to pay your token. There are 5 options available for you to pay. Chose the best comfortable for you</span></p><p><br></p><p><span style=\"background-color: rgb(250, 251, 253);\">If you have any issue, kindly talk to our customer care via a life chat on our website.</span></p><p><br></p><p><span style=\"background-color: rgb(250, 251, 253);\">Good Luck to YOU.</span></p><p><br></p>', '2020-02-11', 0, '2020-02-11 17:36:32', '2020-02-11 17:36:32'),
(33, 99, 'Important message for you this year!  Need To Read This', '<p><span style=\"background-color: rgb(250, 251, 253);\">Why is  it so difficult to start up?</span></p><p><br></p><p><span style=\"background-color: rgb(250, 251, 253); color: rgb(34, 34, 34);\">And why do start-up fails?</span></p><p><br></p><p><em style=\"background-color: rgb(250, 251, 253); color: rgb(34, 34, 34);\">Lack of Funds</em><span style=\"background-color: rgb(250, 251, 253); color: rgb(34, 34, 34);\">?</span></p><p><br></p><p><span style=\"background-color: rgb(250, 251, 253); color: rgb(34, 34, 34);\">The problem with the most of&nbsp;potential entrepreneurs&nbsp;are not only getting the the required amount of money needed. It is often seen that people pursue their brilliant ideas without realizing that they lack proper training which are needed for any particular business. Training is one key factor that is most overlooked but very vital. You are in the right place to get the smart training  you needed.</span></p><p><br></p><p><span style=\"background-color: rgb(250, 251, 253);\">It is also true that funds are not easy to get by especially start-up funds, In Nigeria today there are no financial institution that are willing to give startup funds except few and they have many conditions that will possibly discourage your quest.</span></p><p><br></p><p><span style=\"background-color: rgb(250, 251, 253);\">We have research that the best way to raise fund for your business is through DCI \"Dependent Cash Inflow\" which is money coming to you from every where. we have equally discovered that token from these inflow will solve your funding problem or provide an equity that encourage external funding.</span></p><p><br></p><p><span style=\"background-color: rgb(250, 251, 253);\">The big question is how to get this done?</span></p><p><br></p><p><span style=\"background-color: rgb(250, 251, 253);\">Got you the good news!</span></p><p><br></p><p><a href=\"https://classroom.mysurebiz.com/message/www.mysurebiz.com\" target=\"_blank\" style=\"background-color: rgb(250, 251, 253); color: rgb(0, 123, 255);\"><strong>Mysurebiz</strong>&nbsp;</a><span style=\"background-color: rgb(250, 251, 253);\">have made it all easy for you. YES so easy!</span></p><p><br></p><p><span style=\"background-color: rgb(250, 251, 253);\">You can now get trained at the comfort of your smart phone or tab or PC. And you now get 50% refund of all your training payment and with simple condition you get start-up loan up to N20 million at 0% interest. </span><strong style=\"background-color: rgb(250, 251, 253);\"><em>Isn\'t that Great</em></strong><span style=\"background-color: rgb(250, 251, 253);\">?</span></p><p><br></p><p><span style=\"background-color: rgb(250, 251, 253);\">For more info on this rare opportunity click on FAQ on&nbsp;www.mysurebiz.com&nbsp;for detail. </span></p><p><br></p><p><span style=\"background-color: rgb(250, 251, 253);\">Talk to us on any issue bordering you on our services via Live Chat on our website we are 24 hours available.</span></p><p><br></p><p><span style=\"background-color: rgb(250, 251, 253);\">Become active user and&nbsp;Be What You Wanna Be</span></p><p><br></p><p>Good Luck</p><p><br></p><p><br></p>', '2020-02-17', 0, '2020-02-17 20:19:52', '2020-02-17 20:19:52'),
(34, 99, 'CEO: MYSUREBIZ got you this message!', '<p class=\"ql-align-justify\">Are you <strong style=\"color: rgb(230, 0, 0);\">MYSUREBIZ</strong> user?</p><p class=\"ql-align-justify\"><br></p><p class=\"ql-align-justify\">Are you still very far from taking a step to success?</p><p class=\"ql-align-justify\">That is simply because you have not been <span style=\"background-color: rgb(250, 251, 253);\">attending your lesson on </span><strong style=\"background-color: rgb(250, 251, 253);\">MYSUREBIZ</strong><span style=\"background-color: rgb(250, 251, 253);\">, Hey! Better start doing so because we have all you need to be your own Boss. You know what? In most Convenient way you can ever think of, begin to take steps that will transform your life tomorrow.</span></p><p class=\"ql-align-justify\"><br></p><p class=\"ql-align-justify\"><span style=\"background-color: rgb(250, 251, 253);\">One of the criteria of </span><strong style=\"background-color: rgb(250, 251, 253);\">MYSUREBIZ</strong><span style=\"background-color: rgb(250, 251, 253);\"> &nbsp;users is to attend training class and pay token daily or weekly depending when convenient for you, if you have any difficulties you can talk to our customer care via our live chat on our site</span></p><p class=\"ql-align-justify\"><br></p><p class=\"ql-align-justify\"><span style=\"background-color: rgb(250, 251, 253);\">What are you waiting for? Commence your training class and pay your token which will enable you become an entrepreneur in future. Remember&nbsp;</span><span style=\"background-color: rgb(250, 251, 253); color: rgb(230, 0, 0);\">Knowledge is Power.</span></p><p class=\"ql-align-justify\"><br></p><p class=\"ql-align-justify\"><span style=\"background-color: rgb(250, 251, 253); color: rgb(230, 0, 0);\">Idea rule the world </span><span style=\"background-color: rgb(250, 251, 253);\">&nbsp;and if you are not informed you will be deformed .</span></p><p class=\"ql-align-justify\"><br></p><p class=\"ql-align-justify\"><span style=\"background-color: rgb(250, 251, 253);\">The decision you have taken today can make you an Employer or an Employee even worst, Jobless.</span></p><p class=\"ql-align-justify\"><br></p><p class=\"ql-align-justify\">Are you reading this message from your mailbox? Click on <a href=\"classroom.mysurebiz.com/login\" target=\"_blank\"><strong>login </strong></a>to start attending your class on your MYSUREBIZ dashboard</p><p class=\"ql-align-justify\"><br></p><p class=\"ql-align-justify\"><span style=\"background-color: rgb(250, 251, 253);\">I urge you to decide to&nbsp;</span><strong style=\"background-color: rgb(250, 251, 253); color: rgb(0, 97, 0);\"><em>Be what you wanna be</em></strong></p><p><br></p><p>Good Luck</p>', '2020-02-20', 0, '2020-02-20 16:19:29', '2020-02-20 16:19:29');

-- --------------------------------------------------------

--
-- Table structure for table `mail_audiences`
--

CREATE TABLE `mail_audiences` (
  `id` int(10) UNSIGNED NOT NULL,
  `mail_id` int(10) UNSIGNED NOT NULL,
  `period` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mail_audiences`
--

INSERT INTO `mail_audiences` (`id`, `mail_id`, `period`, `created_at`, `updated_at`) VALUES
(53, 19, 36, '2019-05-28 16:14:49', '2019-05-28 16:14:49'),
(52, 19, 30, '2019-05-28 16:14:49', '2019-05-28 16:14:49'),
(51, 19, 24, '2019-05-28 16:14:49', '2019-05-28 16:14:49'),
(50, 19, 18, '2019-05-28 16:14:49', '2019-05-28 16:14:49'),
(49, 19, 12, '2019-05-28 16:14:49', '2019-05-28 16:14:49'),
(48, 19, 6, '2019-05-28 16:14:49', '2019-05-28 16:14:49'),
(47, 18, 60, '2019-05-20 18:21:37', '2019-05-20 18:21:37'),
(46, 18, 48, '2019-05-20 18:21:37', '2019-05-20 18:21:37'),
(45, 18, 36, '2019-05-20 18:21:37', '2019-05-20 18:21:37'),
(44, 18, 30, '2019-05-20 18:21:37', '2019-05-20 18:21:37'),
(43, 18, 24, '2019-05-20 18:21:37', '2019-05-20 18:21:37'),
(42, 18, 18, '2019-05-20 18:21:37', '2019-05-20 18:21:37'),
(41, 18, 12, '2019-05-20 18:21:37', '2019-05-20 18:21:37'),
(40, 18, 6, '2019-05-20 18:21:37', '2019-05-20 18:21:37'),
(39, 17, 24, '2019-05-09 16:15:42', '2019-05-09 16:15:42'),
(38, 16, 60, '2019-04-13 11:21:36', '2019-04-13 11:21:36'),
(37, 15, 60, '2019-04-11 15:54:05', '2019-04-11 15:54:05'),
(36, 15, 48, '2019-04-11 15:54:05', '2019-04-11 15:54:05'),
(35, 15, 36, '2019-04-11 15:54:05', '2019-04-11 15:54:05'),
(34, 15, 30, '2019-04-11 15:54:05', '2019-04-11 15:54:05'),
(33, 15, 24, '2019-04-11 15:54:05', '2019-04-11 15:54:05'),
(32, 15, 18, '2019-04-11 15:54:05', '2019-04-11 15:54:05'),
(31, 15, 12, '2019-04-11 15:54:05', '2019-04-11 15:54:05'),
(30, 15, 6, '2019-04-11 15:54:05', '2019-04-11 15:54:05'),
(25, 10, 24, '2019-04-10 15:53:55', '2019-04-10 15:53:55'),
(26, 11, 24, '2019-04-10 15:57:01', '2019-04-10 15:57:01'),
(27, 12, 24, '2019-04-10 16:06:10', '2019-04-10 16:06:10'),
(28, 13, 24, '2019-04-10 16:07:28', '2019-04-10 16:07:28'),
(29, 14, 24, '2019-04-10 16:16:23', '2019-04-10 16:16:23'),
(54, 19, 48, '2019-05-28 16:14:49', '2019-05-28 16:14:49'),
(55, 19, 60, '2019-05-28 16:14:49', '2019-05-28 16:14:49'),
(56, 20, 6, '2019-08-22 21:05:17', '2019-08-22 21:05:17'),
(57, 20, 12, '2019-08-22 21:05:17', '2019-08-22 21:05:17'),
(58, 20, 18, '2019-08-22 21:05:17', '2019-08-22 21:05:17'),
(59, 20, 24, '2019-08-22 21:05:17', '2019-08-22 21:05:17'),
(60, 20, 30, '2019-08-22 21:05:17', '2019-08-22 21:05:17'),
(61, 20, 36, '2019-08-22 21:05:17', '2019-08-22 21:05:17'),
(62, 20, 48, '2019-08-22 21:05:17', '2019-08-22 21:05:17'),
(63, 20, 60, '2019-08-22 21:05:17', '2019-08-22 21:05:17'),
(64, 21, 6, '2019-08-22 21:06:57', '2019-08-22 21:06:57'),
(65, 21, 12, '2019-08-22 21:06:57', '2019-08-22 21:06:57'),
(66, 21, 18, '2019-08-22 21:06:57', '2019-08-22 21:06:57'),
(67, 21, 24, '2019-08-22 21:06:57', '2019-08-22 21:06:57'),
(68, 21, 30, '2019-08-22 21:06:57', '2019-08-22 21:06:57'),
(69, 21, 36, '2019-08-22 21:06:57', '2019-08-22 21:06:57'),
(70, 21, 48, '2019-08-22 21:06:57', '2019-08-22 21:06:57'),
(71, 21, 60, '2019-08-22 21:06:57', '2019-08-22 21:06:57'),
(72, 22, 6, '2019-08-27 17:59:18', '2019-08-27 17:59:18'),
(73, 22, 12, '2019-08-27 17:59:18', '2019-08-27 17:59:18'),
(74, 22, 18, '2019-08-27 17:59:18', '2019-08-27 17:59:18'),
(75, 22, 24, '2019-08-27 17:59:18', '2019-08-27 17:59:18'),
(76, 22, 30, '2019-08-27 17:59:18', '2019-08-27 17:59:18'),
(77, 22, 36, '2019-08-27 17:59:18', '2019-08-27 17:59:18'),
(78, 22, 48, '2019-08-27 17:59:18', '2019-08-27 17:59:18'),
(79, 22, 60, '2019-08-27 17:59:18', '2019-08-27 17:59:18'),
(80, 23, 6, '2019-08-29 20:56:49', '2019-08-29 20:56:49'),
(81, 23, 12, '2019-08-29 20:56:49', '2019-08-29 20:56:49'),
(82, 23, 18, '2019-08-29 20:56:49', '2019-08-29 20:56:49'),
(83, 23, 24, '2019-08-29 20:56:49', '2019-08-29 20:56:49'),
(84, 23, 30, '2019-08-29 20:56:49', '2019-08-29 20:56:49'),
(85, 23, 36, '2019-08-29 20:56:49', '2019-08-29 20:56:49'),
(86, 23, 48, '2019-08-29 20:56:49', '2019-08-29 20:56:49'),
(87, 23, 60, '2019-08-29 20:56:49', '2019-08-29 20:56:49'),
(88, 24, 6, '2019-09-06 18:44:51', '2019-09-06 18:44:51'),
(89, 24, 12, '2019-09-06 18:44:51', '2019-09-06 18:44:51'),
(90, 24, 18, '2019-09-06 18:44:51', '2019-09-06 18:44:51'),
(91, 24, 24, '2019-09-06 18:44:51', '2019-09-06 18:44:51'),
(92, 24, 30, '2019-09-06 18:44:51', '2019-09-06 18:44:51'),
(93, 24, 36, '2019-09-06 18:44:51', '2019-09-06 18:44:51'),
(94, 24, 48, '2019-09-06 18:44:51', '2019-09-06 18:44:51'),
(95, 24, 60, '2019-09-06 18:44:51', '2019-09-06 18:44:51'),
(96, 25, 6, '2019-09-16 19:45:25', '2019-09-16 19:45:25'),
(97, 25, 12, '2019-09-16 19:45:25', '2019-09-16 19:45:25'),
(98, 25, 18, '2019-09-16 19:45:25', '2019-09-16 19:45:25'),
(99, 25, 24, '2019-09-16 19:45:25', '2019-09-16 19:45:25'),
(100, 25, 30, '2019-09-16 19:45:25', '2019-09-16 19:45:25'),
(101, 25, 36, '2019-09-16 19:45:25', '2019-09-16 19:45:25'),
(102, 25, 48, '2019-09-16 19:45:25', '2019-09-16 19:45:25'),
(103, 25, 60, '2019-09-16 19:45:25', '2019-09-16 19:45:25'),
(104, 26, 6, '2019-10-11 15:21:21', '2019-10-11 15:21:21'),
(105, 26, 12, '2019-10-11 15:21:21', '2019-10-11 15:21:21'),
(106, 26, 18, '2019-10-11 15:21:21', '2019-10-11 15:21:21'),
(107, 26, 24, '2019-10-11 15:21:21', '2019-10-11 15:21:21'),
(108, 26, 30, '2019-10-11 15:21:21', '2019-10-11 15:21:21'),
(109, 26, 36, '2019-10-11 15:21:21', '2019-10-11 15:21:21'),
(110, 26, 48, '2019-10-11 15:21:21', '2019-10-11 15:21:21'),
(111, 26, 60, '2019-10-11 15:21:21', '2019-10-11 15:21:21'),
(112, 27, 6, '2019-11-20 14:43:11', '2019-11-20 14:43:11'),
(113, 27, 12, '2019-11-20 14:43:11', '2019-11-20 14:43:11'),
(114, 27, 18, '2019-11-20 14:43:11', '2019-11-20 14:43:11'),
(115, 27, 24, '2019-11-20 14:43:11', '2019-11-20 14:43:11'),
(116, 27, 30, '2019-11-20 14:43:11', '2019-11-20 14:43:11'),
(117, 27, 36, '2019-11-20 14:43:11', '2019-11-20 14:43:11'),
(118, 27, 48, '2019-11-20 14:43:11', '2019-11-20 14:43:11'),
(119, 27, 60, '2019-11-20 14:43:11', '2019-11-20 14:43:11'),
(120, 28, 6, '2019-12-02 21:31:04', '2019-12-02 21:31:04'),
(121, 28, 12, '2019-12-02 21:31:04', '2019-12-02 21:31:04'),
(122, 28, 18, '2019-12-02 21:31:04', '2019-12-02 21:31:04'),
(123, 28, 24, '2019-12-02 21:31:04', '2019-12-02 21:31:04'),
(124, 28, 30, '2019-12-02 21:31:04', '2019-12-02 21:31:04'),
(125, 28, 36, '2019-12-02 21:31:04', '2019-12-02 21:31:04'),
(126, 28, 48, '2019-12-02 21:31:04', '2019-12-02 21:31:04'),
(127, 28, 60, '2019-12-02 21:31:04', '2019-12-02 21:31:04'),
(128, 29, 6, '2019-12-06 21:05:20', '2019-12-06 21:05:20'),
(129, 29, 12, '2019-12-06 21:05:20', '2019-12-06 21:05:20'),
(130, 29, 18, '2019-12-06 21:05:20', '2019-12-06 21:05:20'),
(131, 29, 30, '2019-12-06 21:05:20', '2019-12-06 21:05:20'),
(132, 29, 48, '2019-12-06 21:05:20', '2019-12-06 21:05:20'),
(133, 30, 6, '2019-12-10 18:34:45', '2019-12-10 18:34:45'),
(134, 30, 12, '2019-12-10 18:34:45', '2019-12-10 18:34:45'),
(135, 30, 18, '2019-12-10 18:34:45', '2019-12-10 18:34:45'),
(136, 30, 24, '2019-12-10 18:34:45', '2019-12-10 18:34:45'),
(137, 30, 30, '2019-12-10 18:34:45', '2019-12-10 18:34:45'),
(138, 30, 36, '2019-12-10 18:34:45', '2019-12-10 18:34:45'),
(139, 30, 48, '2019-12-10 18:34:45', '2019-12-10 18:34:45'),
(140, 30, 60, '2019-12-10 18:34:45', '2019-12-10 18:34:45'),
(141, 31, 6, '2020-02-04 20:31:32', '2020-02-04 20:31:32'),
(142, 31, 12, '2020-02-04 20:31:32', '2020-02-04 20:31:32'),
(143, 31, 18, '2020-02-04 20:31:32', '2020-02-04 20:31:32'),
(144, 31, 24, '2020-02-04 20:31:32', '2020-02-04 20:31:32'),
(145, 31, 30, '2020-02-04 20:31:32', '2020-02-04 20:31:32'),
(146, 31, 36, '2020-02-04 20:31:32', '2020-02-04 20:31:32'),
(147, 31, 48, '2020-02-04 20:31:32', '2020-02-04 20:31:32'),
(148, 31, 60, '2020-02-04 20:31:32', '2020-02-04 20:31:32'),
(149, 32, 6, '2020-02-11 17:36:32', '2020-02-11 17:36:32'),
(150, 32, 12, '2020-02-11 17:36:32', '2020-02-11 17:36:32'),
(151, 32, 18, '2020-02-11 17:36:32', '2020-02-11 17:36:32'),
(152, 32, 24, '2020-02-11 17:36:32', '2020-02-11 17:36:32'),
(153, 32, 30, '2020-02-11 17:36:32', '2020-02-11 17:36:32'),
(154, 32, 36, '2020-02-11 17:36:32', '2020-02-11 17:36:32'),
(155, 32, 48, '2020-02-11 17:36:32', '2020-02-11 17:36:32'),
(156, 32, 60, '2020-02-11 17:36:32', '2020-02-11 17:36:32'),
(157, 33, 6, '2020-02-17 20:19:52', '2020-02-17 20:19:52'),
(158, 33, 12, '2020-02-17 20:19:52', '2020-02-17 20:19:52'),
(159, 33, 18, '2020-02-17 20:19:52', '2020-02-17 20:19:52'),
(160, 33, 24, '2020-02-17 20:19:52', '2020-02-17 20:19:52'),
(161, 33, 30, '2020-02-17 20:19:52', '2020-02-17 20:19:52'),
(162, 33, 36, '2020-02-17 20:19:52', '2020-02-17 20:19:52'),
(163, 33, 48, '2020-02-17 20:19:52', '2020-02-17 20:19:52'),
(164, 33, 60, '2020-02-17 20:19:52', '2020-02-17 20:19:52'),
(165, 34, 6, '2020-02-20 16:19:29', '2020-02-20 16:19:29'),
(166, 34, 12, '2020-02-20 16:19:29', '2020-02-20 16:19:29'),
(167, 34, 18, '2020-02-20 16:19:29', '2020-02-20 16:19:29'),
(168, 34, 24, '2020-02-20 16:19:29', '2020-02-20 16:19:29'),
(169, 34, 30, '2020-02-20 16:19:29', '2020-02-20 16:19:29'),
(170, 34, 36, '2020-02-20 16:19:29', '2020-02-20 16:19:29'),
(171, 34, 48, '2020-02-20 16:19:29', '2020-02-20 16:19:29'),
(172, 34, 60, '2020-02-20 16:19:29', '2020-02-20 16:19:29');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(28, '2020_01_21_233411_create_ebook_sales_table', 7),
(27, '2020_01_20_213432_create_ebooks_table', 7),
(26, '2019_05_28_112944_create_batches_table', 6),
(25, '2019_05_17_111556_create_users_welcome_notes_table', 5),
(24, '2019_05_16_114054_create_welcome_notes_table', 5),
(23, '2019_04_06_145734_create_users_message_deletes_table', 4),
(22, '2019_03_23_172146_create_read_mails_table', 3),
(21, '2019_03_14_171032_create_mailattachements_table', 2),
(20, '2019_03_14_170035_create_mail_audiences_table', 2),
(19, '2019_03_14_165906_create_mails_table', 2),
(18, '2019_03_13_152204_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `reference` char(100) NOT NULL,
  `amount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `user_id`, `reference`, `amount`, `created_at`, `updated_at`) VALUES
(38, 125, 'xLX9hNMJ4fXV0dG5ZTAf6p7oj', 2000, '2020-01-07 17:14:38', '2020-01-07 17:14:38'),
(37, 258, 'lqpphoo0QCbdtc6ekolzXqZJy', 405, '2019-12-16 17:52:17', '2019-12-16 17:52:17'),
(36, 218, '6ldl6NXDfov5SFSThKI25svfu', 200, '2019-10-11 14:30:32', '2019-10-11 14:30:32'),
(35, 126, 'BxBacw01jeQ3sMr9ru9BwG8F8', 1600, '2019-08-28 17:14:00', '2019-08-28 17:16:00'),
(34, 195, '6PnezXPk61W40FKs5jhQAda9K', 4056, '2019-08-26 09:41:41', '2019-08-26 09:41:41'),
(33, 165, 'aqAMT8PlPlLiPEgpYeWvnPOJp', 200, '2019-08-22 13:47:04', '2019-08-22 13:47:04');

-- --------------------------------------------------------

--
-- Table structure for table `read_mails`
--

CREATE TABLE `read_mails` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `mail_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `read_mails`
--

INSERT INTO `read_mails` (`user_id`, `mail_id`, `created_at`, `updated_at`) VALUES
(90, 7, '2019-03-24 18:40:14', '2019-03-24 18:40:14'),
(90, 6, '2019-03-24 20:55:59', '2019-03-24 20:55:59'),
(87, 6, '2019-03-26 23:51:20', '2019-03-26 23:51:20'),
(87, 9, '2019-03-27 00:09:09', '2019-03-27 00:09:09'),
(90, 10, '2019-04-10 16:13:16', '2019-04-10 16:13:16'),
(90, 11, '2019-04-10 16:13:43', '2019-04-10 16:13:43'),
(90, 14, '2019-04-10 16:16:44', '2019-04-10 16:16:44'),
(90, 12, '2019-04-11 02:03:32', '2019-04-11 02:03:32'),
(87, 15, '2019-04-11 16:25:50', '2019-04-11 16:25:50'),
(90, 15, '2019-04-13 14:29:15', '2019-04-13 14:29:15'),
(95, 16, '2019-04-20 21:53:17', '2019-04-20 21:53:17'),
(91, 15, '2019-05-09 16:09:19', '2019-05-09 16:09:19'),
(95, 18, '2019-05-20 18:27:44', '2019-05-20 18:27:44'),
(95, 19, '2019-05-28 16:16:28', '2019-05-28 16:16:28'),
(91, 19, '2019-08-22 13:48:44', '2019-08-22 13:48:44'),
(165, 21, '2019-08-23 18:24:14', '2019-08-23 18:24:14'),
(212, 20, '2019-08-24 13:19:52', '2019-08-24 13:19:52'),
(195, 21, '2019-08-26 14:05:37', '2019-08-26 14:05:37'),
(165, 22, '2019-08-27 18:05:23', '2019-08-27 18:05:23'),
(180, 22, '2019-08-27 18:59:25', '2019-08-27 18:59:25'),
(157, 22, '2019-08-28 12:26:42', '2019-08-28 12:26:42'),
(126, 22, '2019-08-28 16:18:27', '2019-08-28 16:18:27'),
(126, 23, '2019-08-29 23:58:02', '2019-08-29 23:58:02'),
(165, 23, '2019-08-30 02:26:14', '2019-08-30 02:26:14'),
(200, 22, '2019-09-01 16:48:11', '2019-09-01 16:48:11'),
(165, 24, '2019-09-06 18:48:38', '2019-09-06 18:48:38'),
(200, 24, '2019-09-08 18:57:17', '2019-09-08 18:57:17'),
(200, 25, '2019-09-22 16:37:07', '2019-09-22 16:37:07'),
(165, 25, '2019-09-23 15:56:58', '2019-09-23 15:56:58'),
(122, 25, '2019-10-07 01:57:18', '2019-10-07 01:57:18'),
(157, 26, '2019-10-21 15:31:04', '2019-10-21 15:31:04'),
(157, 25, '2019-10-21 15:33:33', '2019-10-21 15:33:33'),
(129, 26, '2019-11-19 15:20:52', '2019-11-19 15:20:52'),
(122, 26, '2019-11-19 17:25:36', '2019-11-19 17:25:36'),
(220, 27, '2019-11-20 17:34:11', '2019-11-20 17:34:11'),
(225, 27, '2019-12-01 23:31:27', '2019-12-01 23:31:27'),
(165, 28, '2019-12-02 21:49:06', '2019-12-02 21:49:06'),
(225, 28, '2019-12-03 18:16:27', '2019-12-03 18:16:27'),
(237, 28, '2019-12-04 12:21:27', '2019-12-04 12:21:27'),
(225, 29, '2019-12-06 22:03:41', '2019-12-06 22:03:41'),
(236, 28, '2019-12-07 04:33:32', '2019-12-07 04:33:32'),
(235, 28, '2019-12-12 02:41:06', '2019-12-12 02:41:06'),
(218, 30, '2019-12-21 08:22:12', '2019-12-21 08:22:12'),
(125, 30, '2020-01-09 02:29:13', '2020-01-09 02:29:13'),
(129, 21, '2020-01-25 12:21:26', '2020-01-25 12:21:26'),
(165, 32, '2020-02-14 19:23:43', '2020-02-14 19:23:43'),
(270, 33, '2020-02-17 20:53:20', '2020-02-17 20:53:20'),
(268, 33, '2020-02-20 15:15:09', '2020-02-20 15:15:09'),
(268, 34, '2020-02-20 16:23:18', '2020-02-20 16:23:18'),
(165, 34, '2020-03-14 18:48:46', '2020-03-14 18:48:46'),
(126, 34, '2020-05-12 14:21:51', '2020-05-12 14:21:51'),
(126, 33, '2020-05-12 14:23:14', '2020-05-12 14:23:14'),
(165, 33, '2020-05-12 17:35:47', '2020-05-12 17:35:47'),
(218, 34, '2020-06-10 18:39:36', '2020-06-10 18:39:36');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `users_id` int(10) UNSIGNED NOT NULL,
  `name_of_school` varchar(255) NOT NULL,
  `state_of_school` varchar(30) NOT NULL,
  `course` varchar(255) NOT NULL,
  `parent_guardian_phone` varchar(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`users_id`, `name_of_school`, `state_of_school`, `course`, `parent_guardian_phone`, `created_at`, `updated_at`) VALUES
(136, 'Okafor Callistus', 'Rivers', 'elect', '08063483130', '2019-06-21 17:35:31', '2019-06-21 17:35:31'),
(129, 'University of Lagos', 'Lagos', 'Computer Science', '07023432343', '2019-06-20 16:59:04', '2019-06-20 16:59:04'),
(113, 'Fedral poly Ilaro', 'Ogun', 'mass communication', '08080346669', '2019-06-14 01:56:07', '2019-06-14 01:56:07'),
(95, 'wwww', 'eerrrr', 'wwqwqw', '08030812841', '2019-04-20 21:46:18', '2019-04-20 21:46:18'),
(92, 'LASU', 'Lagos', 'Accounting', '08050967217', '2019-04-02 18:09:49', '2019-04-02 18:09:49'),
(99, 'Mysurebiz', 'Lagos', 'MD', '08030812841', '2019-05-29 05:04:54', '2019-05-29 05:04:54'),
(109, 'erfer', 'erer', 'rererwer', '09033445566', '2019-06-07 22:55:02', '2019-06-07 22:55:02'),
(89, 'Unilag', 'Lagos', 'Quantity surveying', '08064521002', '2019-03-15 00:47:10', '2019-03-15 00:47:10'),
(88, 'University of Maryland', 'United', 'Physiology', '08032905352', '2019-03-14 17:43:43', '2019-03-14 17:43:43'),
(86, 'Okafor Callistus', 'Unn', 'elect', '08063483130', '2019-03-13 17:38:18', '2019-03-13 17:38:18'),
(143, 'Yaba Tech', 'Lagos', 'Elect-Elect', '09073068867', '2019-06-22 02:36:11', '2019-06-22 02:36:11'),
(147, 'adeyemi college of education', 'Ondo', 'English', '08020908756', '2019-06-22 11:05:18', '2019-06-22 11:05:18'),
(148, 'Lagos State University', 'Lagos', 'Mass Communication', '09033949474', '2019-06-22 11:12:33', '2019-06-22 11:12:33'),
(153, 'lagos state University', 'Lagos', 'computer Science', '08187674587', '2019-06-22 12:02:33', '2019-06-22 12:02:33'),
(154, 'Adekunle Ajasin University', 'Ondo', 'Mechnical Engineering', '08097209327', '2019-06-22 12:23:47', '2019-06-22 12:23:47'),
(160, 'Federal college of education akoka', 'Lagos', 'PES', '08863801443', '2019-06-25 16:32:39', '2019-06-25 16:32:39'),
(180, 'Yaba Tech', 'Lagos', 'Computer science', '08023264904', '2019-07-18 17:14:28', '2019-07-18 17:14:28'),
(188, 'Yaba college of technology', 'Lagos', 'science lab tech', '07019942695', '2019-07-22 14:42:04', '2019-07-22 14:42:04'),
(190, 'Yaba college of technology', 'lagos', 'Marketing', '08187132034', '2019-07-22 21:31:41', '2019-07-22 21:31:41'),
(196, 'Kwasu', 'Kwara', 'Mass.com', '09023118278', '2019-07-25 15:08:41', '2019-07-25 15:08:41'),
(197, 'Landmark University', 'Kwara', 'Computer Science', '08028038931', '2019-07-25 18:38:27', '2019-07-25 18:38:27'),
(212, 'NNAMDI AZIKIWE UNIVERSITY, AWKA', 'ANAMBRA', 'PSYCHOLOGY', '07067453162', '2019-08-20 17:19:01', '2019-08-20 17:19:01'),
(213, 'National Open University of Nigeria', 'Lagos', 'Computer Science', '09093933261', '2019-08-22 10:45:00', '2019-08-22 10:45:00'),
(214, 'James I', 'Lagos', 'CS', '08171904747', '2019-08-22 10:48:21', '2019-08-22 10:48:21'),
(215, 'Okafor Callistus', 'Rivers', 'elect', '08063483130', '2019-08-22 14:24:20', '2019-08-22 14:24:20'),
(218, 'University of Ibadan', 'Oyo', 'Medical Physiology', '08069239648', '2019-10-11 14:21:55', '2019-10-11 14:21:55'),
(220, 'Lagos State University', 'Lagos', 'Business Administration', '08081338002', '2019-10-27 14:52:05', '2019-10-27 14:52:05'),
(225, 'Federal university katsina', 'katsina', 'Political science', '07068006863', '2019-11-06 05:10:09', '2019-11-06 05:10:09'),
(226, 'kaduna state university', 'kaduna', 'English', '08036550624', '2019-11-06 05:51:32', '2019-11-06 05:51:32'),
(227, 'University', 'katsina', 'political science', '09034122720', '2019-11-07 13:15:09', '2019-11-07 13:15:09'),
(228, 'Federal university katsina', 'Kasina', 'Political science', '08127012460', '2019-11-07 14:56:51', '2019-11-07 14:56:51'),
(229, 'Federal university katsina', 'Katsina', 'Business Management', '08127012460', '2019-11-11 03:18:19', '2019-11-11 03:18:19'),
(230, 'Federal university of agriculture, Abeokuta', 'Ogunstate', 'Biochemistry', '08038195706', '2019-11-13 14:33:39', '2019-11-13 14:33:39'),
(232, 'federal university Katrina state', 'Katsina', 'political science', '08127012460', '2019-11-16 17:41:31', '2019-11-16 17:41:31'),
(233, 'Federal university dutsinma', 'Katsina', 'Food science and technology', '08036059628', '2019-11-17 21:26:46', '2019-11-17 21:26:46'),
(237, 'Federal University Dutsin-ma, Katsina State', 'Katsina', 'Political Science', '08106012042', '2019-11-20 03:12:49', '2019-11-20 03:12:49'),
(238, 'Abubakar Tafawa Balewa University,ATBU Bauchi', 'Bauchi', 'Microbiology', '07062344471', '2019-11-20 22:45:30', '2019-11-20 22:45:30'),
(239, 'Federal polytechnic', 'Bauchi', 'Banking and finance', '07068006863', '2019-11-21 02:22:39', '2019-11-21 02:22:39'),
(255, 'Federal University Dutsinma', 'Katsina', 'Sociology', '08065511235', '2019-12-03 03:10:34', '2019-12-03 03:10:34'),
(257, 'Federal University dutsinma', 'Katsina', 'Political Science', '08089638594', '2019-12-16 16:22:36', '2019-12-16 16:22:36'),
(258, 'Ekiti state university', 'Ekiti', 'Accounting Education', '08036946697', '2019-12-16 17:04:14', '2019-12-16 17:04:14'),
(259, 'Federal university Dutsin-ma', 'Katsina', 'Political science', '07030426387', '2019-12-20 17:50:42', '2019-12-20 17:50:42'),
(260, 'Ahmadu bello University zaria', 'Kaduna', 'Bsc. Botany', '08145151959', '2019-12-20 19:40:41', '2019-12-20 19:40:41'),
(262, 'Adeshina college of education', 'Kwara', 'Business Education', '08036038551', '2020-01-10 00:04:59', '2020-01-10 00:04:59'),
(264, 'Lagos state polytechnic, ikorodu', 'Lagos', 'Elect elect', '08068620278', '2020-01-11 18:07:18', '2020-01-11 18:07:18'),
(265, 'University of Ilorin', 'Kwara', 'Educational Technology', '08025095986', '2020-02-04 22:44:57', '2020-02-04 22:44:57'),
(268, 'National Open University Of Nigeria', 'OGUN', 'B.Sc.(ED)Chemistry', '09079422217', '2020-02-08 09:15:20', '2020-02-08 09:15:20'),
(270, 'Sadiq Abubakar', 'Borno', 'Radiography', '08025867124', '2020-02-10 00:37:32', '2020-02-10 00:37:32'),
(273, 'University of benin', 'E', 'Biochemistry', '09054008154', '2020-03-09 18:43:08', '2020-03-09 18:43:08'),
(276, 'Vem bethel college', 'Lagos', 'Political science', '07035359061', '2020-03-10 03:58:56', '2020-03-10 03:58:56'),
(278, 'university of the people( online university)', 'unitedstate', 'business administration', '08024352255', '2020-03-12 18:49:46', '2020-03-12 18:49:46'),
(279, 'Ekiti state University', 'Ekiti', 'Educational management', '08148451830', '2020-03-15 00:03:08', '2020-03-15 00:03:08'),
(285, 'Futa', 'Akure', 'Estate management', '09045468153', '2020-06-01 18:35:57', '2020-06-01 18:35:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `home_address` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `state_of_origin` char(30) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `name_next_of_kin` varchar(255) NOT NULL,
  `phone_next_of_kin` varchar(11) NOT NULL,
  `state_next_of_kin` char(30) DEFAULT NULL,
  `business_category_id` int(10) UNSIGNED NOT NULL,
  `business_of_interest` varchar(255) DEFAULT NULL,
  `period` int(11) NOT NULL,
  `pennywise` int(11) DEFAULT NULL,
  `resident_state` varchar(30) DEFAULT NULL,
  `gender` varchar(6) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `role` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `balance` double NOT NULL DEFAULT '0',
  `authorization_code` char(100) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `email_verification_code` varchar(50) NOT NULL,
  `ref_code` varchar(11) NOT NULL,
  `ref_by` varchar(11) DEFAULT NULL,
  `ref_bonus` double NOT NULL DEFAULT '0',
  `batch_id` int(10) UNSIGNED DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `home_address`, `dob`, `state_of_origin`, `phone`, `name_next_of_kin`, `phone_next_of_kin`, `state_next_of_kin`, `business_category_id`, `business_of_interest`, `period`, `pennywise`, `resident_state`, `gender`, `image`, `role`, `status`, `balance`, `authorization_code`, `email_verified_at`, `email_verification_code`, `ref_code`, `ref_by`, `ref_bonus`, `batch_id`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(102, 'olayiwola', 'eniola', 'olayiwolaeniola41@gamil.com', '12 Mayowa Olakanye street egbeda Lagos State', '1988-05-06', 'oyo', '08188329247', 'Okesola oluremi emmanuel', '08025975133', 'Oyo', 3, 'Boutique', 6, 200, 'lagos', 'female', 'profile_photos/img-20190604-wa0003.jpg', 2, 0, 0, NULL, NULL, 'effbce7ac1a807c0fe539505483f9191be452b9d', 'olayiwo', NULL, 0, 5, '$2y$10$Jb7zd1ISDt89gou5pmp2FOs2LKsj8Z0qvpu4cy0zmXWz8Dy0iGDUe', NULL, '2019-06-04 18:39:26', '2019-07-01 04:00:00'),
(101, 'ANTHONY', 'MBOKO', 'mansoxial@gmail.com', '21 Mayowa Olakanye street, egbeda Lagos State', '1996-12-06', 'ebonyi', '08163107142', 'Oliver mboko', '09074553531', 'ebonyi', 3, 'Selling phones and accessories', 6, 200, 'Lagos', 'male', 'profile_photos/fb-img-15595886932096494-1.jpg', 2, 1, 0, NULL, '2019-06-04 21:44:25', '354c0e5e953b252ebb1191d322435e304c15cde4', 'mansoxi', NULL, 0, 5, '$2y$10$hev2YJMr1T7a/2ssTEGujeiHYzcIHI2cDsGO/PsT1i6G4E7T0cOyy', NULL, '2019-06-04 17:18:25', '2019-07-01 04:00:00'),
(91, 'Okafor', 'Chidi', 'okaforchidi121@gmail.com', 'No 5 Orosi', '1989-03-09', 'Rivers', '08063483130', 'Chinedu', '08063483130', NULL, 3, NULL, 18, 600, NULL, 'male', NULL, 2, 1, 0, NULL, '2019-05-09 04:00:00', '6ab86dbce591292e8328e4ccd7b93a753fd81be3', 'okaforc', NULL, 0, 3, '$2y$10$nrOc92xSQ4RpvRoYWISYaucxJp0CQ1xGM9C1S4NuSzuaYvd7AKyXq', 'q1hSkJKp70OEXx6r3QCltb82r25l9Gf96BkeBN0gSqqNICHPzgGPYZvqmF3R', '2019-03-16 16:12:31', '2019-06-02 19:01:38'),
(103, 'Ilesanmi', 'Oluwabunmi', 'ilesanmioluwabunmi01@gmail.com', '14 Mayowa Olakanye street egbeda Lagos State', '1986-06-08', 'osun', '07036101525', 'Ilesanmi tobi', '08068126006', 'ekiti', 3, 'Clothes materials', 6, 200, 'lagos', 'female', 'profile_photos/img-20190604-wa0002.jpg', 2, 0, 0, NULL, NULL, '04aabc6bf666d5231fd08bb4e55f661af2979835', 'ilesanm', NULL, 0, 5, '$2y$10$gMaqdaXLYsr1DKZLMgE76eLmZTDXrs3X5CQu9pFA5ns1ZbN3xaO4W', NULL, '2019-06-04 18:58:03', '2019-07-01 04:00:00'),
(87, 'seeun', 'ash', 'ashimolowoseun@gmail.com', 'sfsdbd', '1999-03-13', 'ogu', '08030812841', '08030812841', '08030812841', 'ogun', 1, 'barbin', 6, 300, 'lag', 'male', NULL, 4, 1, 0, NULL, '2019-05-09 04:00:00', '6a7d7797285e546d7a6071ae4a8c63faa49620ad', 'ashimol', NULL, 0, 2, '$2y$10$LE8Nyoctu5y9n8GUVU/qMuUsrolbwemjVZFdX8LqnOy.4Mu6bpdEG', 'FwWOIPfLq3aKYL7O6QglvNqZ8lyo6cyM5IQO386RsBf6BqdkhGkrdlV434xa', '2019-03-13 20:57:42', '2019-05-29 04:30:53'),
(108, 'Soliu', 'Adebola', 'soliuadebola58@gmail.com', 'Block 397 flat 6 abesan estate ipaja Lagos state', '1995-07-26', 'Oyo', '08177633493', 'Adewale waajidah', '08058458482', 'Lagos', 1, 'Household Products', 6, 500, 'Lagos', 'female', 'profile_photos/img-20190202-150724.jpg', 2, 1, 0, NULL, '2019-06-06 15:35:23', '63282122768f17e3ef3ebdd424a5fe52226a3d9c', 'soliuad', NULL, 0, 5, '$2y$10$nALyeMkbjb16hOJAgGmUhe8.oFYr7GnSfRa/9vPgI.cywFROGsTHy', NULL, '2019-06-06 15:04:46', '2019-07-01 04:00:00'),
(99, 'Oluwaseun', 'Ashimolowo', 'seunashimolowo@gmail.com', '1st Avenue Peace Estate, Baruwa Lagos', '1974-06-17', 'Ogun', '08030812841', 'Comfort Ashimolowo', '08051119539', 'Edo', 1, 'Seeyond Group', 60, 500, 'Lagos', 'male', 'profile_photos/sd-20170110-105304.jpg', 4, 1, 0, NULL, '2019-05-29 05:06:04', '2c9d3778a708bf4c3cd83140bb193e10eb856256', 'seunash', NULL, 0, 3, '$2y$10$6c2Ll/HVlV8Au8l5cHXh9uHs2y2yf/KyQpqCSEvb5kGbNHwePELei', '9ef6VzCObK5tIQHN3U9f0jNaUQL9kcXBAGROLTPMgq4jKxRASRRUKS5g3bea', '2019-05-29 05:04:54', '2019-06-02 19:01:38'),
(104, 'Lawal', 'Alaba', 'lawalalaba080@gmail.com', '25 aderogba street egbeda Lagos State', '1997-08-25', 'ogun', '08156884487', 'Lawal inioluwa', '08156558753', 'ogun', 3, 'Soft drinks', 6, 200, 'lagos', 'female', 'profile_photos/img-20190604-wa0004.jpg', 2, 0, 0, NULL, NULL, '08dad26c1b9a71ce6529f2a962fa5b1568d3b0c2', 'lawalal', NULL, 0, 5, '$2y$10$xEWjKqhgmPHErAq/waZMLO/yzSVHlptTA5mFz/tmrNwx1eQG/3im2', NULL, '2019-06-04 19:24:42', '2019-07-01 04:00:00'),
(105, 'Babayemi', 'oluwakemi', 'kemiphynar@yahoo.com', '21 mayowa street egbeda lagos state', '1989-06-16', 'ekiti', '08086154985', 'Babayemi Babatunde', '07086017924', 'ekiti', 3, 'Boutique/supermarket', 6, 200, 'lagos', 'female', 'profile_photos/img-20190603-wa0019.jpg', 2, 0, 0, NULL, NULL, 'd68630b2f71204c1a75599e18f88f67559717e4f', 'kemiphy', NULL, 0, 5, '$2y$10$SPseApCRsIRCY58/GVP13ec/jQMDVn8E575SKAneMol5kgqpXEaDq', NULL, '2019-06-04 19:43:44', '2019-07-01 04:00:00'),
(106, 'Adeyemi', 'Adewumi', 'adewumi_f@yahoo.com', '21 mayowa street egbeda Lagos state', '1982-05-22', 'oyo', '08068962757', 'Adeyemi Tunde', '08039100598', 'Oyo', 3, 'Supermarket', 6, 200, 'lagos', 'female', 'profile_photos/img-20190604-wa0014.jpg', 2, 0, 0, NULL, NULL, 'f5766dcd46677809c70765f04e89cda46d83ea1e', 'adewumi', NULL, 0, 5, '$2y$10$JJCnE8WNMWP.Xe3ETZ4iNe3kDhPHiq9dK4k1nsDdsYOcqeye8ugW.', NULL, '2019-06-04 20:00:22', '2019-07-01 04:00:00'),
(111, 'Adeyoyin', 'Adelowo', 'delowo2002@yahoo.com', 'Blockb189 Flat3 Abesan Estate,Ipaja', '1074-06-29', 'osun', '08136813094', 'Olajumoke Adeyoyin', '08036341457', 'Osun', 1, 'Food process', 6, 200, 'lagos', 'male', 'profile_photos/img-20190613-113037.jpg', 2, 0, 0, NULL, NULL, '38247850ac4f2e2d34385e72847dac0191db9699', 'delowo2', NULL, 0, 5, '$2y$10$5feag3PYI6g3mK4OhMFPAOuNjpAt3ikju3ZsT20NbCL79q9bK9qXq', NULL, '2019-06-13 14:44:24', '2019-07-01 04:00:00'),
(112, 'Omeyi', 'Chinasa', 'tinaomeyi080@gmail.com', '11 banmeke oremerin egbeda Lagos State', '1985-09-17', 'Anambra', '09031618968', 'Peter Christopher', '08062583074', 'Abia', 3, 'Bautique', 6, 300, 'lagos', 'female', 'profile_photos/img-20190613-133359.jpg', 2, 0, 0, NULL, NULL, 'f09dbba92fa2039198f957a719725b14b02d73b1', 'tinaome', NULL, 0, 5, '$2y$10$j5/aDFt7P.qP8u2XeMn2WO2RKrlsp/.K0ydp7SjhZuWT6oHaL8RyS', NULL, '2019-06-13 16:59:24', '2019-07-01 04:00:00'),
(113, 'Damilola', 'Oyebola', 'oyedam2016@gmail.com', '9, church avenue ipaja lagos', '1996-03-07', 'Ogun', '08157089461', 'Oyebola', '09091318250', 'Ogun', 2, 'Hairdressing', 12, 200, 'Lagos', 'female', 'profile_photos/img-20190613-222248.jpg', 1, 0, 0, NULL, NULL, '4528bdd058de48fbbccb97c42cc2719a51c87035', 'oyedam2', NULL, 0, 5, '$2y$10$u6A49e8CYlaMtAAPO31jM.WhIIzIE7q.8F/YIqYu6gWdVEq4MizUO', NULL, '2019-06-14 01:56:07', '2019-07-01 04:00:00'),
(114, 'David', 'Makinde', 'davidmakinde40@gmail.com', '5 makinde street off olubondu', '1999-05-10', 'Osun', '07068619842', 'Makinde bukola', '08122926748', 'Osun', 2, 'Provide  Services', 6, 200, 'Lagos', 'male', 'profile_photos/img-20190602-184841.jpg', 2, 1, 0, NULL, '2019-06-14 02:28:03', '59f82f24aab1cf190fc71933ccfd3c8c391ef903', 'davidma', NULL, 0, 5, '$2y$10$gdLiaKjJC33LhEGc6SyUEe9Y4vBb2qz.bWU0itvISs2BBDsQfP4D2', NULL, '2019-06-14 02:04:24', '2019-07-01 04:00:00'),
(115, 'Opeyemi', 'Oyebola', 'opeyemioyebola10@gmail.com', '9 church avenue ipaja lagos', '2003-01-21', 'Ogun', '09091318250', 'Praise', '09091318250', 'Lagos', 1, NULL, 6, 200, 'Lagos', 'female', 'profile_photos/img-20190613-222339.jpg', 2, 0, 0, NULL, NULL, '9cbcbe80883b6effe6cf026306be186df87335f2', 'opeyemi', NULL, 0, 5, '$2y$10$49yKXvHnNgoTNEU1AnG6gespOjNzZc1JWQdiE06WqZK2DvnH2vyje', NULL, '2019-06-14 02:24:13', '2019-07-01 04:00:00'),
(116, 'Oluwatomiloba', 'lbikunle', 'ioluwatomiloba@gmail.com', '11, church avenue, ipaja, lagos', '2000-11-17', 'Oyo', '08150742826', 'Rachel', '08150741859', 'Ogun', 2, 'Catering', 6, 200, 'Lagos', 'male', 'profile_photos/img-20190613-222534.jpg', 2, 1, 0, NULL, '2019-06-18 09:18:22', '0e14ad8bed15e0b57f68a3eaf048158d8b19f4fd', 'ioluwat', NULL, 0, 5, '$2y$10$6q0MuBD7nOdoaB0jvZlaxuQAYGPI9Y/CZGMJDY7y0RNFpHWic3O1W', NULL, '2019-06-14 02:32:10', '2019-07-01 04:00:00'),
(117, 'Grace', 'Igbekele', 'gratogood2017@gmail.com', 'Church Avenue Ipaja Lagos', '1989-02-16', 'Ogun', '08114965274', 'Praise', '08114965274', NULL, 3, 'Drinks', 6, 200, 'Lagos', 'female', 'profile_photos/atole.jpg', 2, 1, 0, NULL, '2019-06-14 02:39:20', '7c52e4a7a3580b77f1b9f1c2fce2ae58dc8a6042', 'gratogo', NULL, 0, 5, '$2y$10$Li4M5mnrRKHroxXc3JhWDO1Uz3WIqSGNyPpX3vXZUD28KLYwjjZNC', NULL, '2019-06-14 02:37:31', '2019-07-01 04:00:00'),
(118, 'Babayemi', 'Babatunde', 'ololadejesuyemi@gmail.com', '21 Mayowa street egbeda Lagos', '1971-08-02', 'Ekiti', '07086017924', 'Babayemi oluwakemi', '08086154985', 'ekiti', 3, 'Supermarket', 6, 200, 'lagos', 'male', 'profile_photos/pic-3.jpg', 2, 0, 0, NULL, NULL, 'f0bc1ae76563e198394da7ee22de032f44cfa4f4', 'ololade', NULL, 0, 5, '$2y$10$bf2Uzfb3qSOXz6WTVmbgneOIL3DXfoWWKtKLQPUoit.G509gYfXCy', NULL, '2019-06-14 13:24:01', '2019-07-01 04:00:00'),
(119, 'Ajewole', 'Oluwaseyi', 'sheyify27@gmail.com', '2,olusegun street,alimosho, iyana-ipaja Lagos', '1991-09-29', 'osun', '08136075729', 'Agbonifi Glory', '08033711212', 'Benin', 1, 'Tailoring', 6, 200, 'lagos', 'male', 'profile_photos/1560520145994666425911262162183.jpg', 2, 0, 0, NULL, NULL, '71e6f6d92883316ef8dbd202dca5a8f66e959071', 'sheyify', NULL, 0, 5, '$2y$10$tLdAJQ96qNemoCIo53x9p.bQzfuy1eW2GpgXRvRRygBmnMKwjp6IC', NULL, '2019-06-14 17:57:37', '2019-07-01 04:00:00'),
(120, 'Kehinde', 'Olagoke', 'ksmithkenny1@gmail.com', '7 Enukoroyin Olakitan Aralamo bus stop Command Lagos', '1995-08-24', 'osun', '08122100520', 'Abiola', '08081757921', 'ogun', 3, 'Jewelries', 6, 200, 'lagos', 'female', 'profile_photos/img-20190614-153040.jpg', 2, 1, 0, NULL, '2019-06-17 16:06:44', '28c63dfa0d65af10d66b1c88876d74dc89ae50dd', 'ksmithk', NULL, 0, 5, '$2y$10$d1jHg1LZQLk0kVi7iYvcQ.iOG0fG2Il8XNf.ZvSzNhIqd1D0UswOC', NULL, '2019-06-14 18:51:20', '2019-07-01 04:00:00'),
(121, 'Danjuma', 'Ali', 'martinsaugustine606@gmail.com', '24 adedeji aderogba street egbeda Lagos', '1983-06-27', 'Benue', '08147335541', 'Lawrence Ali', '08132596802', 'Benue', 3, 'Bautique', 6, 200, 'Lagos', 'male', 'profile_photos/fb-img-15607008271061609.jpg', 2, 1, 0, NULL, '2019-06-17 15:11:27', 'e613463b93079e22c74b09b51c431654647b1af3', 'martins', NULL, 0, 5, '$2y$10$Lwz24/PJvK2NNqKl3OuMA.sOGSnF/LSKGd0oEFfYEgDQK9TGPbRuK', '1Zn0z7CB2AT33HnBKYdcAMIC6MmaULLVOFP1kx463WL3GOfmOWRTDTvjSRKm', '2019-06-16 20:11:39', '2019-07-01 04:00:00'),
(122, 'Emmanuel', 'Oguntope', 'eoluwafemi37@gmail.com', '7, Michael Odeyemi Street, Ikola-Ilumo, Ipaja, Lagos State', '1985-07-10', 'Oyo', '07030171127', 'Oguntope Isaac', '07066287301', 'Oyo', 3, 'General Supplies', 6, 200, 'Lagos', 'male', 'profile_photos/img-20190609-wa0039.jpg', 2, 1, 0, NULL, '2019-06-17 00:11:19', '5f4eafd44ba800a156185ff86bc56f90f93de51d', 'eoluwaf', NULL, 0, 5, '$2y$10$vrp1F2z59MefRpogbbRPKety/NK38yYCfM7TTX7oKsvC/YO517zE6', 'LtaJ1CIZ7p12LDuma9AygRAxvQ0ZtZKOEoXSAQreRlV2giMqV08L4sjE7zPY', '2019-06-16 21:47:48', '2019-07-01 04:00:00'),
(123, 'James', 'Adefila', 'jamesadefila48@gmail.com', '7, Aje Street, Pleasure bus stop.', '1956-08-28', 'Ekiti', '07061929986', 'Adefila Abosede', '07088944589', 'Osun', 2, 'Transportation', 6, 200, 'Lagos', 'male', 'profile_photos/15607075995084941490000973138964.jpg', 2, 0, 0, NULL, NULL, '25c2edc35a8945cd36ed20184319355dd8a09dda', 'jamesad', NULL, 0, 5, '$2y$10$549gvr73Oz3dRarljkNpCegcdDrZqKffAUF//i9IXJU1zZsLD3ZHi', NULL, '2019-06-16 22:13:13', '2019-07-01 04:00:00'),
(124, 'Abosede', 'Adefila', 'abosedeadefila@gmail.com', '7,Aje Street, Pleasure bus stop,Abule egba', '1969-05-03', 'Osun', '07088944589', 'James Adefila', '07061929986', 'Ekiti', 3, 'Raw food selling and grinding of food', 6, 200, 'Lagos', 'female', 'profile_photos/img-20190616-wa0033.jpg', 2, 0, 0, NULL, NULL, 'b1b520d6ed4c69d3b264115036bb99fc9641c889', 'abosede', NULL, 0, 5, '$2y$10$rtOOG89MOOKIta8ZZWSi/OpgToGd6pJlIcq3LP/iakUa1MiegE.oq', NULL, '2019-06-16 23:34:05', '2019-07-01 04:00:00'),
(125, 'Adefila', 'Yetunde', 'yetundeadenike120@gmail.com', '7 Aje Street Pleasure bus stop', '1993-06-25', 'Ekiti', '08138818330', 'Adedoyin', '08189815252', 'ekiti', 3, 'Bautique', 6, 200, 'lagos', 'female', 'profile_photos/img-20190616-wa0034.jpg', 2, 1, 2000, NULL, '2019-06-30 18:13:45', 'a37b3b4dc4d89ea079b29f2c7da10e968496ec5a', 'yetunde', NULL, 0, 5, '$2y$10$rfb6ZKK7NP0GhuS5WSGHV.NgqBFmfr3nfbDfEs0z0R1qHWYUcHPSe', 'WFe8QUrSS6wDxTc3ay1D4YdF7jUnGh17r2pUHaetqh3DiYrT5AmD33kPT2Jy', '2019-06-17 00:30:14', '2019-07-01 04:00:00'),
(126, 'Genesis', 'Solomon', 'gnsssolomonagi5@gmail.com', '14, odunlami esho ipaja lagos', '1996-07-21', 'benue', '07064208573', 'Genesis Sunday okpabi', '08135537402', 'benue', 2, 'Engineering', 6, 200, 'lagos', 'male', 'profile_photos/img-20190618-092511.jpg', 2, 1, 0, NULL, '2019-06-18 17:13:51', '36d09e13b16d3c428a498c708948d3e2695bb550', 'gnsssol', NULL, 0, 5, '$2y$10$awr.2hm1zXS1rM7KgKSBuuib47NWybzK.40zJRjcI2hkiX6mOmOgS', 'tD9lPrNhvXTrJkw7Zq9knIUny2uEmE1QkCHGQzwheFPrWZ84OnIvKi8Rsoto', '2019-06-18 17:13:06', '2019-07-01 04:00:00'),
(127, 'Eluwa', 'Lilian', 'lillyauxano@gmail.com', '50B Felly Akunruwa street, ago palace way, okota. Amuwo_Odofin local govt', '1984-03-28', 'Abia', '08060455296', 'Chiso anslem njoku', '08027525965', 'Lagos', 2, 'Fashion Designing', 6, 500, 'Lagos', 'female', 'profile_photos/img-20180923-092216.jpg', 2, 1, 0, NULL, '2019-06-20 03:47:11', '6110e54077f41b016f460f8b2e3fd3862bbae403', 'lillyau', NULL, 0, 5, '$2y$10$iEHil/axkcBcjckwgTIEwuY3ks3y8jVXUtMpLRbD0cFioAKB5HeW6', 'f4Gq7COKXUGKX6NtFs0PmJ9P51OAIlVxiZ1C5hPMidKTUWbGf4sYTizm2hkh', '2019-06-20 03:45:10', '2019-07-01 04:00:00'),
(128, 'Goodnews', 'Idowu', 'goodnewsidowu1@gmail.com', '9 fatolu street ipaja ayobo Lagos State', '1995-02-02', 'Edo', '09067356938', 'Dajuma sumaila', '07062285099', 'Edo', 1, 'Shoe making', 6, 200, 'Lagos', 'male', 'profile_photos/15610272894104036829746302685307.jpg', 2, 1, 0, NULL, '2019-06-20 23:45:35', 'd9f2eee8249466d87b40b3a645fb90c3efde3f0c', 'goodnew', NULL, 0, 5, '$2y$10$Tgk5LeDez217OY/LGtxmoOvFQw/AwWobudf.ug1mbJ1Ivj27UtjjS', NULL, '2019-06-20 14:55:18', '2019-07-01 04:00:00'),
(129, 'Oluwa', 'Memphis', 'noblegistblog@gmail.com', 'No 3 Ikeja Sreet, Lagos', '1981-02-28', 'Ogun', '07085563650', 'Olakunle Oluwa', '08023432343', 'Ogun', 1, 'Marketing', 24, 500, 'Lagos', 'male', 'profile_photos/50068000-1928778990509660-3010642715188707697-n.jpg', 1, 1, 0, NULL, '2019-06-20 17:00:23', 'b3f54a298bdacade052bfb387bbf8496a999b039', 'noblegi', NULL, 0, 5, '$2y$10$EDc.hRuGamKtwvn8dcUUcOuqvGHy9Vx2kkFC2EjVGFF/bfm8gHlwG', 'lo7cmiew78Afewn46cHGWqUxB5U1eWykLgz7pCCMwUXbgopTMBpLzhEXP1Q0', '2019-06-20 16:59:04', '2019-07-01 04:00:00'),
(130, 'Oluwabukola', 'Gbadegesin', 'damilola467@gmail.com', '42,adeshina str ,off pipeline Rd', '1990-07-17', 'Ekiti', '08133652287', 'Afolabi fadiran', '08133652287', 'Abeokuta', 2, 'Skills Training Center', 6, 200, 'Lagos', 'female', 'profile_photos/img-20190617-154718.jpg', 2, 0, 0, NULL, NULL, '27a12839a363c002c281cc6d0121823a46ec85cf', 'damilol', NULL, 0, 5, '$2y$10$8UHWcp2098q2bY3aglXzwOqoq6hIf02icw5ZCHP3MovEhO53d1Gsi', NULL, '2019-06-20 17:47:30', '2019-07-01 04:00:00'),
(131, 'Olabode', 'Iyabo', 'olabodeiyabo2016@gmail.com', '36, morebise street Amule, Ayobo', '1989-06-03', 'Ekiti', '08106905016', 'Yemi Adamoh', '08106905016', NULL, 2, 'Catering', 6, 400, 'Lagos', 'female', 'profile_photos/u.jpg', 2, 1, 0, NULL, '2019-06-20 20:41:53', 'ea1b72a6f7dcf52944d08818b4ad93fe2d8b1b05', 'olabode', NULL, 0, 5, '$2y$10$7EMlCXaambpER1HPVU0OfOL3WsF..nQazCrI5uyqXiutb60BWM/M6', 'wR5hFnonoiZkEIZgq1DMrotTybqBLnImF2QOcMZGjO19Glb9HE8kcEu4th4F', '2019-06-20 20:41:23', '2019-07-01 04:00:00'),
(132, 'sekiriat', 'adekunle', 'sekirat09@gmail.com', '6, unity avenue ipaja', '1985-08-10', 'Osun', '07081675958', 'moturayo', '07081675958', NULL, 3, 'cloth', 6, 800, 'Lagos', 'female', 'profile_photos/iii.jpg', 2, 1, 0, NULL, '2019-06-20 21:00:01', '70f1860ecf4e05d7f82aa3407413f0ac4d6790ea', 'sekirat', NULL, 0, 5, '$2y$10$qahet2UHJJHTlK8OjPFgse9JSjSCYZkAY9tvKXxMECUjKY268MCc2', NULL, '2019-06-20 20:59:30', '2019-07-01 04:00:00'),
(134, 'timilehin', 'Olawale', 'timiwale2018@gmail.com', '9, candos road, ashipa ayobo lagos', '1995-04-14', 'Oyo', '08118981048', 'Abiola', '08118981048', NULL, 1, 'starch production', 6, 500, 'Lagos', 'male', 'profile_photos/dsc-7127.JPG', 2, 1, 0, NULL, '2019-06-21 17:23:19', 'f3b7d28a764fef661defb119a528887e978b26a3', 'timiwal', NULL, 0, 5, '$2y$10$xu6PO9Wanm3v77FMH8YCmO9A10BaYOx3fVpgV2Wp.yF5LILUyPf6a', NULL, '2019-06-21 17:22:48', '2019-07-01 04:00:00'),
(135, 'Egaji', 'Moses', 'mosesegaji4real@gmail.com', '56, Bada road, bada ayobo', '1997-03-07', 'Benue', '08062815469', 'James', '08062815469', 'Benue', 5, 'Power Plant', 24, NULL, 'Lagos', 'male', 'profile_photos/img-20170408-224106-1-1.jpg', 3, 0, 0, NULL, NULL, '3bbdb738ef1aa3ba744dc7ba2c07383f4a37ed87', 'moseseg', NULL, 0, 5, '$2y$10$7LstxwfUGbjsOEyi4Sizf.p3EdZ2tATZirLEeWdNY6DWNB5BWAf0W', NULL, '2019-06-21 17:30:28', '2019-07-01 04:00:00'),
(136, 'Okafor', 'Callistus', 'chidiblog1@gmail.com', 'No 2 chukwu street', '1989-06-08', 'Rivers', '08063483130', 'Okafor Callistus', '08063483130', 'Rivers', 2, NULL, 24, 500, 'Rivers', 'male', 'profile_photos/0.jpg', 1, 1, 0, NULL, '2019-07-01 18:07:31', '57e521ad0f6614f665ae0183ec6d06c3e8601462', 'chidibl', NULL, 0, 5, '$2y$10$GdhhN2DfwaaA5pbkYApONuuU2QNcX2oa/iF90q.ts.ThKthOFYZ8m', 'UEAv5feF8uhFyNriqd2hbHAai1l5PAJK0NC2wzBg9vGlWissPZCRVr9tCRiP', '2019-06-21 17:35:31', '2019-07-01 18:07:31'),
(137, 'Aishat', 'Tajudeen', 'tajudeenaishat111@gmail.com', '27 adeshina street, oke Odo', '1990-10-03', 'osun', '09095846807', 'Adeola', '09095846807', 'Osun', 2, 'IT', 6, 200, 'Lagos', 'female', 'profile_photos/4c8f3b0b-1bcf-4ddf-b234-e53087e26ebb.jpg', 2, 0, 0, NULL, NULL, '407f58561abe0c284ecb0ac0977bfe9c06f5eb8d', 'tajudee', NULL, 0, 5, '$2y$10$IrAfmaJhP2ev35whZcWNiuKrO5co6r8Yq9u9ecstlIksMeccTaWJm', NULL, '2019-06-21 21:43:39', '2019-07-01 04:00:00'),
(138, 'Anuoluwapo', 'Akinola', 'Anuolu4real@gmail.com', '867 camp davies  road, ibadan', '1991-11-03', 'Oyo', '08026183064', 'demilade', '08026183064', NULL, 1, 'farming', 18, 600, 'ibadan', 'female', 'profile_photos/pp-2.jpg', 2, 0, 0, NULL, NULL, '9d17ae90ca8fc2503eef692211988c06b2e30de2', 'anuolu4', NULL, 0, 5, '$2y$10$PctlGe3cX6nnVD07Z2x.Tu0OH4MFpffT8m66Z8S6weHXhbmydOENK', NULL, '2019-06-21 21:51:23', '2019-07-01 04:00:00'),
(139, 'Ademoye', 'Westola', 'westola324@gmail.com', '9, Camp Davies road, Bada ayobo', '1990-05-07', 'Ogun', '08065680783', 'Amokade', '08065680783', 'Ogun', 4, 'farming', 18, 300, 'Lagos', 'male', 'profile_photos/pp.jpg', 2, 0, 0, NULL, NULL, '73632d2429045c14e929e56ae10107b1e08d8d60', 'westola', NULL, 0, 5, '$2y$10$ZRjFzaXA6802RpEsEvEHTu/VjtaF4ocTWLpBrwL3tPiDjxbPCAPTm', NULL, '2019-06-22 01:48:00', '2019-07-01 04:00:00'),
(140, 'Adeleye', 'Adewale', 'adewale565@gmail.com', '98, morebise, mechanic village, ipaja lagos', '1972-09-07', 'Ekiti', '08060078634', 'Adeoyemide', '08060078634', 'Ekiti', 1, 'herbal mixture', 24, 600, 'Lagos', 'male', 'profile_photos/c55321c4-4b2d-442e-acd0-0080cc428008.jpg', 2, 0, 0, NULL, NULL, '6a203bc14f51171d8cac93c9fd65639c17649607', 'adewale', NULL, 0, 5, '$2y$10$pJ0B5heOe3fhxpdawEivy.oOZe3LjyQ4hCo4OuQHO9C11IAdZz8Xy', NULL, '2019-06-22 01:54:51', '2019-07-01 04:00:00'),
(141, 'Wasiu', 'Hammed', 'washad309@gmail.com', '8, Asubiaro street, Ekoro, Lagos', '1991-03-07', 'Ogun', '09011498216', 'Rufiyat', '09011498216', 'Ogun', 2, 'Printing', 30, 500, 'Lagos', 'male', 'profile_photos/pp-9.jpg', 2, 0, 0, NULL, NULL, '15990df2dc04e732680eeb620a38509e309efe8c', 'washad3', NULL, 0, 5, '$2y$10$0rLMdGSzsrWIOwVNIeVnhOcjstD/uUkekuiMm08QFLYEA3u7xFBLu', NULL, '2019-06-22 02:23:59', '2019-07-01 04:00:00'),
(142, 'Opeyemi', 'Kehinde', 'kennyG12@gmail.com', '9, olubori Street, Ipaja, Lagos', '1995-12-06', 'Ogun', '08135679876', 'Deyanju', '08135679876', 'Ogun', 2, 'Printing', 12, NULL, NULL, 'male', 'profile_photos/pp-7.jpg', 3, 0, 0, NULL, NULL, '537c7171403b092bfdc938c4a300da09c918a3da', 'kennyg1', NULL, 0, 5, '$2y$10$kQHphfaPdCi3yqrF2agZ1ul3xTmqbrFowxWkcgR9ocOY5Hk6BzH9y', NULL, '2019-06-22 02:29:52', '2019-07-01 04:00:00'),
(143, 'babatunde', 'Badejo', 'btunde@gmail.com', '6, morebise street, Amule', '1978-06-06', 'Ogun', '09073068867', 'Moses', '09073068867', 'Ogun', 1, 'power plant', 36, 200, 'Lagos', 'male', 'profile_photos/pp-4.jpg', 1, 0, 0, NULL, NULL, '89a44fcf371a63ad22a5c11f3e42c222a770a344', 'btunde', NULL, 0, 5, '$2y$10$bRUDE1EVV52nTCs2vuMmFex5cFhunVe0uCi7lI4m9uXOqOy6yzBOi', NULL, '2019-06-22 02:36:11', '2019-07-01 04:00:00'),
(144, 'adeola', 'akinwande', 'adeolamine4@gmail.com', '26, kayode aina street, ayobo', '1987-09-11', 'osun', '08188532653', 'yemisi', '08188532653', 'osun', 2, 'hairdressing', 12, 300, NULL, 'female', 'profile_photos/images.jpg', 2, 0, 0, NULL, NULL, '7507b0d3f4d94a89a91e43de4cccf631341741d7', 'adeolam', NULL, 0, 5, '$2y$10$D0nwCIuuAG3ZmL1qjMHMQOjETPcV9/bvO3jRSZIz/mn21D0ZnUUD6', NULL, '2019-06-22 10:16:26', '2019-07-01 04:00:00'),
(145, 'esther', 'Adelere', 'adeere4real@gmail.com', '4 unity avenue, ipaja lagos', '1990-06-05', 'ogun', '08015487731', 'biyi', '08015487731', 'lagos', 2, 'household', 12, 400, 'lagos', 'female', 'profile_photos/images-1.jpg', 2, 0, 0, NULL, NULL, 'd28bb0ea2ae3beb587c100130e6d84c7f63eb28d', 'adeere4', NULL, 0, 5, '$2y$10$ByI8tiWxRxiEHSIK/WfWl.DMcLUITZ.w27RjAevVXEIGf.hJ8kaly', NULL, '2019-06-22 10:23:36', '2019-07-01 04:00:00'),
(146, 'adeshola', 'adeseun', 'seunade43@gmail.com', '7, sangotedo, epe express lagos', '1999-09-09', 'edo', '09087654564', 'victor', '09087654564', 'lagos', 4, 'farming', 12, 300, 'lagos', 'female', 'profile_photos/64561072-2294500330816181-306951258126680064-n.jpg', 2, 0, 0, NULL, NULL, 'e0131fe4fddd7ebf37104dcdd0391f7401d4872e', 'seunade', NULL, 0, 5, '$2y$10$fINCJnr2Kl6B1qt8ftmLouDeI8yGFNl.Nju3RU.WhEkMW.JXTjgNO', NULL, '2019-06-22 10:31:19', '2019-07-01 04:00:00'),
(147, 'faith', 'igbekele', 'faithiyanu3@gmail.com', '8, oke odan street, Ado Ekiti', '2004-08-23', 'ondo', '09065438976', 'Beular', '09065438976', 'ondo', 2, 'School', 24, 200, 'Akure', 'female', 'profile_photos/35053137-992593044236291-1510487161315524608-n.jpg', 1, 0, 0, NULL, NULL, '2c2933b5b465c0750d6fc59ee1c0fa7a1fe86ab4', 'faithiy', NULL, 0, 5, '$2y$10$6.HtxBMG0VetV2sfz76PfumesvKS0giV0k/dWPu2BH56Px5P0IfCW', NULL, '2019-06-22 11:05:18', '2019-07-01 04:00:00'),
(148, 'Okanlawon', 'Azeez', 'okanla4mum@gmail.com', '756 ipaja road, opeki, lagos', '2002-08-07', 'osun', '09033949474', 'Ade', '09033949474', 'osun', 4, 'Farming', 12, 200, 'lagos', 'female', 'profile_photos/39135569-526163767838780-8199867736646483968-n.jpg', 1, 0, 0, NULL, NULL, '4415278d75d5d33d6a6fbdf7da8fdd29b1523d7a', 'okanla4', NULL, 0, 5, '$2y$10$0C6cWy1gkVUc6QbHO1mFIetzTGwPdeeSXLyIsXL9cDy0lz/5FtXFm', NULL, '2019-06-22 11:12:33', '2019-07-01 04:00:00'),
(149, 'Agbor', 'Samuel', 'mcgeepe23@gmail.com', '10, Ifedore street Ayobo, Lagos', '1999-10-10', 'Delta', '08034657894', 'Emmanuella', '08034657894', 'Delta', 4, 'Farming', 12, 200, 'Lagos', 'male', 'profile_photos/60954703-2436667096396929-1125240496218701824-n.jpg', 2, 0, 0, NULL, NULL, 'ff06c969fc91161fb48f1822b26a924c12b2fa94', 'mcgeepe', NULL, 0, 5, '$2y$10$2TAioCBQO0pddYUure21guOy7MJhibKQmWcg0O6CueGrzfivOcEIW', NULL, '2019-06-22 11:16:25', '2019-07-01 04:00:00'),
(150, 'Akinola', 'ojo', 'akinadeojo435@gmail.com', '145, Aiyetoro itele road, Lafenwa, Ogun State', '1992-05-07', 'oyo', '09081127022', 'Opemipo', '09081127022', 'Lagos', 1, 'bakery', 12, 300, 'Ogun', 'male', 'profile_photos/64313699-2646946478865161-7221057218307686400-n.jpg', 2, 0, 0, NULL, NULL, '15795bdeea61f95d1274d688af25788df1f7ed5e', 'akinade', NULL, 0, 5, '$2y$10$3lzIrRF.adMdHdGKpAS10.G.FCZfLw37UPbH3kpQCgEXbF6DLqw3y', NULL, '2019-06-22 11:26:54', '2019-07-01 04:00:00'),
(151, 'Adekola', 'adesola', 'solakola4real@gmail.com', '4, Canal close, olubondu majiyagbe layout, ipaja', '2000-07-08', 'Ogun', '08189728389', 'toluwalase', '08167564567', 'Ogun', 2, 'Gas', 24, 300, 'lagos', 'male', 'profile_photos/59777036-811505785888660-7169966009636356096-n.jpg', 2, 0, 0, NULL, NULL, 'a56a93d2329d9cc445e4d498cf8f9b2a203d98f3', 'solakol', NULL, 0, 5, '$2y$10$w86XWkN7g.U9Kk7gzT4YA.xNmDmsMkZqbk8xMPIBtSmtTncGonYky', NULL, '2019-06-22 11:37:41', '2019-07-01 04:00:00'),
(152, 'Ambrose', 'palmer', 'ambrosepalm32@gmail.com', '1, powerline amule, ayobo', '1989-09-06', 'Edo', '09053517311', 'Blessing', '09053517311', NULL, 1, 'solar installation', 24, 300, 'Lagos', 'male', 'profile_photos/44098206-558282817937371-965357306378190848-n.jpg', 2, 0, 0, NULL, NULL, '0bad0c334bf7cd42adf040b2ce6350709481f2bd', 'ambrose', NULL, 0, 5, '$2y$10$znoayvdb6hzsCxXcnmNkquATvcSuBXkDqlw6QdYKjmADCePwRG8UC', NULL, '2019-06-22 11:52:35', '2019-07-01 04:00:00'),
(153, 'Adebisi', 'Glory', 'glorybaby@gmail.com', '6 majiyagbe-layout, ipaja, lagos', '2002-09-07', 'Ogun', '08187674587', 'ayomide', '08187674587', 'Ogun', 4, 'Farming', 36, 200, 'Lagos', 'female', 'profile_photos/53030521-2291877907721719-6746926290919489536-n.jpg', 1, 0, 0, NULL, NULL, 'a31f7add847d5340b0683aecc6663233df71ea03', 'gloryba', NULL, 0, 5, '$2y$10$QGqCWSTyiI/8f2HjKI8AIeRW8eMosqCs0dR0mym911fIGooHuxQQW', NULL, '2019-06-22 12:02:33', '2019-07-01 04:00:00'),
(154, 'oluwatoyin', 'Araba', 'oluwatoyinaraba6@gmail.com', 'MFM street amule street, ipaja, lagos', '1999-10-05', 'Ogun', '08097209327', 'Ayomide', '08097209327', 'Lagos', 1, 'Car Plant', 36, 200, 'Lagos', 'male', 'profile_photos/50343481-1933954796700745-2244644900681285632-n.jpg', 1, 0, 0, NULL, NULL, '65c9e700a03d4833356db2ee9a65744ac5cc99ac', 'oluwato', NULL, 0, 5, '$2y$10$w4XkRC/D0NnP8N3k7BgLfe5PoZj9f72W76a78CwKvESO2aI6iAbuq', NULL, '2019-06-22 12:23:47', '2019-07-01 04:00:00'),
(155, 'omisore', 'michael', 'omisoremic@gmail.com', '9 toluwani majiyagbe lagos', '1987-08-07', 'Osun', '08076569887', 'Demilade', '08076569887', NULL, 1, 'farming', 12, 500, 'Lagos', 'male', 'profile_photos/13710027-10207062648433147-8900929311726997009-n.jpg', 2, 0, 0, NULL, NULL, '0ce58a7ff173708a1afe0e22c6450f29d4951496', 'omisore', NULL, 0, 5, '$2y$10$A1zGTjvNzrx1UFYce.pc4OBUWMnALA9kERB23vc3eFE2lsYxc4L8m', NULL, '2019-06-22 12:30:11', '2019-07-01 04:00:00'),
(156, 'Oluwatoyin', 'Adediran', 'oluwatoyinadediran40@gmail.com', '14 adeshina amusan street oke-odo Lagos State', '1978-04-28', 'Ogun', '07067299262', 'Damilare adediran', '07067299262', 'Osun', 2, 'Catering', 6, 200, 'lagos', 'female', 'profile_photos/fb-img-15611421313570403.jpg', 2, 0, 0, NULL, NULL, '516e6085d6bf642d1c4975b6d33b21658fff85ca', 'oluwato-1', NULL, 0, 5, '$2y$10$DIULuRd2WnrDz3dFL3hKSeePROwjIaHaUR7ogHp/bJxNS1iRmTt/a', NULL, '2019-06-22 13:12:55', '2019-07-01 04:00:00'),
(157, 'AYENI', 'ADETUNJI', 'ayenibamidele@live.com', '15, Michael Aladesuyi st, Abule odu Egbeda-Idimu rd, Egbeda Lagos.', '1980-07-16', 'Osun', '08033170542', 'Ayeni Adewole', '08098341681', 'Osun', 5, 'Agro Allied Food processing', 6, 1000, 'Lagos', 'male', 'profile_photos/img-20190411-145128.jpg', 2, 1, 0, NULL, '2019-06-24 18:23:34', '8d73794b3928de17dc3bc849d3f6903db0b6b23d', 'ayeniba', NULL, 0, 5, '$2y$10$Yp3m758SEcBK49rYoQKb9unu1HBZQRR6JCWyPb/KOeRyDvFN27owm', 'c890bZGlZsRBNjahs5IbmeaqXvxDigdTYvavtcwRTPACZT1mN7eXanf8Ftto', '2019-06-24 18:15:26', '2019-07-01 04:00:00'),
(158, 'Babatunde', 'Babayemi', 'babayemitunde123@gmail.com', '21 Mayowa street Egbeda Lagos State', '1971-02-08', 'Ekiti', '07086017924', 'Oluwakemi babayemi', '08086154985', 'Ekiti', 3, 'Supermarket', 6, 200, 'lagos', 'male', 'profile_photos/screenshot-20190514-002834.png', 2, 1, 0, NULL, '2019-06-25 14:57:43', '7ebd816f0b06e4268298f7a7d77609031c778373', 'babayem', NULL, 0, 5, '$2y$10$eqB0OAk4CiTdzHI.ruU1Z.AXfgXfQtYEZ7akGfqz3c3uyLT8RZOB.', 'RofEHVIUfmJFdPzPXvdZ7KUJHsqdngLddovHfQaNUSCCg8bXkKvC7bvHC0q8', '2019-06-25 14:43:25', '2019-07-01 04:00:00'),
(159, 'Collins', 'Ogbodo', 'collinseso307@gmail.com', '6, Ogunjemilosi street, ashipa, ayobo Lagoa', '1978-06-07', 'Enugu', '08063801443', 'Faith', '07033475731', 'Enugu', 2, 'Catering', 6, 200, 'Lagos', 'male', 'profile_photos/15614648975252595645815707800441.jpg', 2, 0, 0, NULL, NULL, '9bc190b2f67d65a32badc1abf608ba2fb591b91b', 'collins', NULL, 0, 5, '$2y$10$a8kkJUMaJcIVtIG6uQRp8.keJ6Czy57En.z5F2xr.KpBv4/h71lRy', NULL, '2019-06-25 16:21:56', '2019-07-01 04:00:00'),
(160, 'Faith', 'Ogbodo', 'faithogbodo31@gmail.com', '6, Ogunjemilosi street ashipa ayobo', '1981-11-15', 'Enugu', '07033475731', 'Collins', '08863801443', 'Lagos', 2, 'School', 12, 200, 'Lagos', 'female', 'profile_photos/img-20190625-124207.jpg', 1, 0, 0, NULL, NULL, 'f2143ad42a416cb0d375ac4d99b20997b64021bb', 'faithog', NULL, 0, 5, '$2y$10$yLx5DEj8Bsrg7VEG6UqkXemU8I67su/x7V/6qiRss0ItI1OJCp9Cm', NULL, '2019-06-25 16:32:38', '2019-07-01 04:00:00'),
(161, 'Samuel', 'Ashore', 'Ashoresamuel@gmail.com', 'No 5 baru', '1994-10-30', 'Ondo', '08174807071', 'Faith', '08026959558', 'Onda', 4, 'Agriculture', 6, 200, 'Lagos', 'male', 'profile_photos/img-20190630-104031-264.jpg', 2, 1, 0, NULL, '2019-07-01 14:20:36', '6ed75d9db49e052d68f7a8f198711b18f4c68580', 'ashores', NULL, 0, 6, '$2y$10$62BZQ1n53HDBEnYfNdpr3ON5zKlfTN3XL0D7AM8Vre3tyYNA0iXoe', NULL, '2019-07-01 14:14:49', '2019-08-01 04:00:00'),
(162, 'Adebisi', 'Oshinowo', 'debioshconsult2016@gmail.com', 'Federal housing estate, phase II, Salolo, Alagbado, Lagos', '1977-02-03', 'Ogunstate', '09053056677', 'Olusegun Oshinowo', '08034075773', 'Ogun', 2, 'Driving school', 6, 200, 'Lagos', 'female', 'profile_photos/fb-img-15605520533068506.jpg', 2, 0, 0, NULL, NULL, 'd7cff1d171fc222bc413d32f601b432f26407b67', 'debiosh', NULL, 0, 6, '$2y$10$vZyXc43zp4.If0d0DHdqkeX9gMgQJcLGDOVkLMJ7dYllMArOQMtZO', NULL, '2019-07-02 18:07:31', '2019-08-01 04:00:00'),
(163, 'Adejoke', 'Sobola', 'adejokesobola75@gmail.com', '15,ajayi ologidan street idimago agege lagos', '1978-07-20', 'Ogunstate', '08182344869', 'Abiodun sobola', '08023544938', 'Ogunstate', 1, 'Cake making and event decor', 6, 200, 'Lagos', 'female', 'profile_photos/20190702-153234-1.jpg', 2, 0, 0, NULL, NULL, '806f115b4209b59dfa8de2443878c4ecd4a1247e', 'adejoke', NULL, 0, 6, '$2y$10$zanhsxVo.yERocfIvsZX3OenCB2prNrnzw2.Z1u5UCZ0IRQ2zLHJS', NULL, '2019-07-02 18:33:51', '2019-08-01 04:00:00'),
(164, 'Adewunmi', 'Adebayo', 'adewunmistephen69@gmail.com', '9 Tunde olanitori area 1 Estate Adura Bus stop Lagos', '1980-09-28', 'Osunstate', '08024798973', 'Oluwaseunadebayo', '08024574944', 'Osunstate', 2, 'Sound Engineering', 18, 200, 'Lagosstate', 'male', 'profile_photos/fb-img-15623219961237038.jpg', 2, 0, 0, NULL, NULL, '692577a7795aa69f44b1ffbd702dcf2390e25d59', 'adewunm', NULL, 0, 6, '$2y$10$lquhruQC/nhkWsHqKzNd5e56pd5EzAQAYIi73IE27zB//aeSOrd3C', NULL, '2019-07-05 14:22:06', '2019-08-01 04:00:00'),
(165, 'seeun', 'oliat', 'seeyondgroup@gmail.com', 'ughefih', '1919-07-10', 'ogun', '08030812841', 'titi', '08134027905', 'kalaba', 1, 'dqewdqwdds', 6, 200, 'lagos', 'male', 'profile_photos/fb-img-1466010744593-2.jpg', 3, 1, 200, NULL, '2019-07-08 21:34:03', 'a343083a8aa49927675cf2830da9d037658d876e', 'seeyond', NULL, 0, 6, '$2y$10$a/FkHuCeXW1G49m0akx8IuAODaB3mPi7yTmeXp.RsvPd4HEB4AI/G', '9KWXrjeFN4NKGMxTq4DdRXIGGtjPT1MAsSdepWG1zviUav5fMgF1MuJqCJl3', '2019-07-08 21:29:24', '2019-11-19 15:35:52'),
(166, 'MONSURAT', 'SALAUDEEN', 'salaudeenmonsurat17@gmail.com', 'no7 abubakar alaja, ayobo lagos state.', '1990-06-26', 'kwara', '08135323763', 'muhammed', '08134042474', 'kwara', 2, 'Tailoring', 6, 200, 'kwara', 'female', 'profile_photos/6.png', 2, 1, 0, NULL, '2019-07-10 21:06:36', 'be5d205564f06035765a91acbef8824fd9118145', 'salaude', NULL, 0, 6, '$2y$10$tiIBOdywkERfZu2TdpsPfOut.ddsR/OPzPpBzl.7GNinyo.3SvV1i', NULL, '2019-07-10 21:03:47', '2019-08-01 04:00:00'),
(167, 'Samuel', 'Ogunsote', 'ogunsotesamuel9@gmail.com', '9 Onaopepo Str, Ipaja Lagos.', '1994-12-11', 'Ogun', '09097784912', 'Ogunsote Victoria', '08029001384', 'Lagos', 5, 'construction', 12, 200, 'Ogun', 'male', 'profile_photos/6-1.png', 2, 1, 0, NULL, '2019-07-11 20:38:18', 'fde7e7a4e7b1ceb1b7e10715338aaa3b63b9ed54', 'ogunsot', NULL, 0, 6, '$2y$10$7bh54OTEFnbm0xlFlTbU1.UsFnedM3uNPzoqKmaGRm9V7kS9WsxHy', 'I0gxgjF2axO4VWrwNOmevwZ2apFDOBHyzvKnzOqHmcxwWu61st2Jycj9yzoC', '2019-07-11 20:34:51', '2019-08-01 04:00:00'),
(168, 'Femi', 'Lambe', 'princefemilambe@gmail.com', '34, alhaji Adeniji Street, Alakuko Lagos', '1963-08-09', 'Osun', '08028576399', 'Lambe Lanre', '08169712006', 'Osun', 4, 'MOSLAM Agricultural Ventures Limited', 12, 200, 'Lagos', 'male', 'profile_photos/dad.jpg', 2, 1, 0, NULL, '2019-07-12 12:54:42', '8aa630579ebd0aebc4c85d247c858a164e505b44', 'princef', NULL, 0, 6, '$2y$10$8LKc.xxTJArM2mz7fEopDeHtCD34M1utKetvDcklEdC5CuHtVi3Tm', NULL, '2019-07-12 12:34:28', '2019-08-01 04:00:00'),
(169, 'Balikis', 'Aribidesi', 'balikisari@gmail.com', '7 Adeniji str, Ikola, Ipaja lagos state', '1989-09-29', 'Kwara', '08135721205', 'Jimoh Kabiru', '08164462330', 'Lagos', 2, 'Fashion Designing', 6, 200, 'Lagos', 'female', 'profile_photos/9.png', 2, 1, 0, NULL, '2019-07-12 19:30:57', 'af2f0976264909bb572199de8b0658e6fed6adc4', 'balikis', NULL, 0, 6, '$2y$10$nujEJBsuSQpNqKkMpC2n4u2GY4LSukiBkfCnN9FeA9IuE.U7Du9dq', NULL, '2019-07-12 19:29:41', '2019-08-01 04:00:00'),
(170, 'Olayemi', 'Rachael', 'Yemkaz.r@gmail.com', '27 church st Abule Egba Lagos', '1971-03-03', 'Osun', '08128171889', 'Okelola', '08028268491', 'Oyo', 4, 'Poultry', 12, NULL, 'Lagos', 'female', 'profile_photos/img-20190620-161950.jpg', 3, 0, 0, NULL, NULL, 'daeb85f81247058598e1c97bcb9a6596790c0501', 'yemkaz', 'princef', 0, 6, '$2y$10$bo0mkutGrB8mYkR.6J3vTueCLy288sB9DdZOMau.dWEAaqs/ScRfG', NULL, '2019-07-13 16:31:11', '2019-08-01 04:00:00'),
(171, 'Jacobs', 'Caleb', 'Jacobscaleb2017@gmail.com', '36,aiyetoro,ipaja,lagos', '2000-05-03', 'Edo', '07083910655', 'Jacobs joshua', '07059579655', 'Edo', 2, 'Service', 6, 200, 'Lagos', 'male', 'profile_photos/img-20190711-080253.jpg', 2, 1, 0, NULL, '2019-07-16 19:09:43', '4505893937fc629e9696674c54c151232f9c861e', 'jacobsc', NULL, 0, 6, '$2y$10$H3Wk4HFa0iFoU3p.z/.09.SwxNX9QZNZ3QBO7/3EEtNPOi5J8zbtC', NULL, '2019-07-16 18:53:44', '2019-08-01 04:00:00'),
(172, 'Muhammad', 'Ashiru', 'muhammedashiru32@gmail.con', 'No 12 ogunabewela close', '2000-08-09', 'Oyo', '09019928352', 'My mum', '08103660213', 'Ogun', 2, 'Cobbler', 6, 200, 'Lagos', 'male', 'profile_photos/screenshot-20190626-091420.png', 2, 0, 0, NULL, NULL, '482e8b290eff27b1baaee38180b3d5b2d0e5b548', 'muhamme', NULL, 0, 6, '$2y$10$eCWOHo7fZG4ZRFU0XiJSSu3J1nWFeu8P2lKWNZuzSEw1SIBIk.m7i', NULL, '2019-07-16 19:47:13', '2019-08-01 04:00:00'),
(173, 'ABIODUN', 'ODUGBEMI', 'aodugbemi@gmail.com', 'House 3, Road J, Olubadan Estate; Egbeda - Ibadan', '1985-05-11', 'Oyo', '08036926252', 'Odugbemi Azeez Arisekola', '08082231255', 'Lagos', 4, 'Poultry Production', 18, 500, 'Lagos', 'male', 'profile_photos/pppppp-001.jpg', 2, 1, 0, NULL, '2019-07-17 17:25:16', 'da104ccabb253d819b67fac8ada5b9909052277d', 'aodugbe', 'princef', 0, 6, '$2y$10$W2vRoErl0BQrrZcaLvE34eDg8/XtDaIhbB8Bw1iAjsIQEKUYW6NGG', NULL, '2019-07-17 17:07:07', '2019-08-01 04:00:00'),
(174, 'Amida', 'Abiodun', 'amidaabiodunabdrahman@gmail.c', '20 zaka iroko rd.  Lagos s State.', '1979-12-19', 'Lagos', '08098517102', 'Aminat', '08098522903', 'Ogun', 4, 'Piggery', 6, 200, 'Lagos', 'male', 'profile_photos/img-20190508-230338.jpg', 2, 0, 0, NULL, NULL, 'd911fb67860fbd38aed5a7bff76cbbf595ee423d', 'amidaab', NULL, 0, 6, '$2y$10$K/qWW.dux5eNS8vwT0JudOYoLab5CuNq5L.kizrdPAuv9KxW1xEfu', NULL, '2019-07-17 17:43:17', '2019-08-01 04:00:00'),
(176, 'Ezekiel', 'Bamigboye', 'olalerebamigboye01@gmail.com', '56,Unity Road ALAKUKO Lagos State', '1957-09-29', 'Osun', '08031118614', 'Mrs Esther Bamigboye', '08166764651', 'Kogi', 4, 'Piggery', 6, 200, 'LAGOS', 'male', 'profile_photos/img-20190618-120450-1.jpg', 2, 1, 0, NULL, '2019-07-17 18:18:51', '3e76843f9a99b79c420f05a7481fb23ae2ac01c9', 'olalere', NULL, 0, 6, '$2y$10$Skg6gJZeB31ZWddRb5Wiwe/sgwm7bOv9hX99i1D1UkiD/UjUy9xuq', 'ZuEPj7AD4Se549lYydcZjQmhiy8lvvtoXnucaZ4BXXLvN0TaHevu59A1ovz2', '2019-07-17 18:16:57', '2019-08-01 04:00:00'),
(177, 'Alakija', 'Albert', 'Alakijatunde123@gmail.com', '1 David oladokun street,abule egba', '1986-07-29', 'Lagos', '09059644513', 'Mayowa', '08032397250', 'Lagos', 2, 'Entertainment', 6, 300, 'Lagos', 'male', 'profile_photos/c923d39f9c713c3b59b967e22a792f5b.jpg', 2, 1, 0, NULL, '2019-07-17 18:41:16', 'c86e44ebb569942b22ed0ef19b2d9ea76738382f', 'alakija', NULL, 0, 6, '$2y$10$Ebda507LTMH18ca4VBAw7unDvv0CUmYOfUSBc41qMRi774/v3tF9W', NULL, '2019-07-17 18:37:42', '2019-08-01 04:00:00'),
(178, 'wasiu', 'Lawal', 'Wlwajisl4@gmail.com', '9 oziegbe str, ilupeju, odi-olowo mushin, lagos state.', '1964-06-20', 'oyo', '09078372611', 'lateefat lawal', '08160544302', 'lagos', 5, 'Fabricating', 6, 400, 'lagos', 'male', 'profile_photos/10.png', 2, 1, 0, NULL, '2019-07-19 17:21:54', 'dff72f90ec9b8866d4607d5190add58f805a99e8', 'wlwajis', NULL, 0, 6, '$2y$10$sq1SIxrf/0.FwcgCRb/OQen0V3YvjcBnmRpkKcZ0tsQQ/mm7IvU3W', NULL, '2019-07-17 18:48:21', '2019-08-01 04:00:00'),
(179, 'Maryam', 'Olayinka', 'olayinkamaryam27@gmail.com', '15 sumanu str, Adebisi, Ipaja, Lagos State.', '1994-06-13', 'Osun', '07038719042', 'lateef Salako', '08038661619', 'lagos', 2, 'Hairdressing / make up', 6, 200, 'lagos', 'female', 'profile_photos/11.png', 2, 1, 0, NULL, '2019-07-18 13:04:54', '1a28fd25f5afeddbad7dc0c1123252221dbffe87', 'olayink', NULL, 0, 6, '$2y$10$q.mThYnJP5CU02Wwnc8oVuoEC3C7v2Ux7nxOVWxCrp291cUWwEJCC', NULL, '2019-07-18 13:04:03', '2019-08-01 04:00:00'),
(180, 'Emmanuel', 'Stephen', 'emmastephen111@gmail.com', '25,yemi ogunleye str, ikotun, Lagos State.', '1998-08-21', 'Abia', '08146464264', 'Kelechi stephen', '08146464264', 'Abia', 3, 'Laptors', 24, 200, 'Lagos', 'male', 'profile_photos/img-20190627-173733-3.jpg', 1, 1, 0, NULL, '2019-07-18 17:17:26', '22e8d9a85c3a09d7f5de9fbcc92017769e1e8962', 'emmaste', NULL, 0, 6, '$2y$10$4mYtctsACECiu7wkSVMcxeVehCBayP5e/hWVjbtj2shxWdBLfhuNq', NULL, '2019-07-18 17:14:28', '2019-08-01 04:00:00'),
(181, 'Olanike', 'Oguntayo', 'oguntayoolanike15@gmail.com', '5,Musibau Ajao Street Agbado Ijaiye', '1991-02-17', 'Oyo', '08169188176', 'Mr Olakunle Oguntayo', '08023304566', 'Daddy', 1, 'Egg marketing', 12, 700, 'Lagos', 'female', 'profile_photos/1563518324304738291349.jpg', 2, 1, 0, NULL, '2019-07-19 11:01:26', '7acc24d055a23515e9ce347633cb0a7d6e98be2a', 'oguntay', 'aodugbe', 0, 6, '$2y$10$lOOCjy/UUh/Jc7M2/4Bz8eceIF/OySA8cf6tmO2QGuEetP4gsRX7W', NULL, '2019-07-19 10:49:30', '2019-08-01 04:00:00'),
(182, 'Ganiu', 'Olashile', 'olugbonganiu@gmail.com', '17,igunmuyiwa street Ajasa command Lagos state', '1998-12-26', 'Osun', '08034273770', 'Abibat', '09095309771', 'Osun', 2, 'Service', 12, 200, 'Osun', 'male', 'profile_photos/ce26b04c-aa4b-4713-bc6d-8a38804af328.jpeg', 2, 1, 0, NULL, '2019-07-19 17:57:24', 'cb8ff310eabf2b77d923f00760d8d8a236bb9f7a', 'olugbon', NULL, 0, 6, '$2y$10$y0gTnLFJYxUIHNqPt2RNZOyCTr1ITio1f8gsJLei.etTiF1jGh20G', NULL, '2019-07-19 17:56:46', '2019-08-01 04:00:00'),
(183, 'Bilawu', 'Jamiu', 'jamiubilawu8@gmail.com', 'No 8 olude street ipaja ayobo', '1999-08-14', 'Osun', '09066387682', 'Rashidat', '08061323830', 'lagos', 1, 'Graphics and design', 6, 200, 'lagos', 'male', 'profile_photos/snapchat-466094047.jpg', 2, 1, 0, NULL, '2019-07-19 18:05:28', 'c4a11ce0106b114abe7bcfc7d5aa116211eb3f64', 'jamiubi', NULL, 0, 6, '$2y$10$rE.aBAKVqi1feTW9Ik1iSOQfuIpkgGyOIn3quayfcMCD1cGscOUmC', NULL, '2019-07-19 18:04:59', '2019-08-01 04:00:00'),
(184, 'Sanni', 'Oluwatobi', 'sheriftobi8@gmail.com', 'Ayobo', '1998-07-31', 'Ogun', '08163707151', 'Fuad', '08096515811', 'Ogun', 1, 'Graphic design', 6, 200, 'Lagos', 'male', 'profile_photos/snapchat-1240098314.jpg', 2, 0, 0, NULL, NULL, '3e0a4d182fdfbac822e504bdfe6f551c42d741d0', 'sherift', NULL, 0, 6, '$2y$10$gZnben1qmcOmaaOn2uTfNu.Ypiu.O.FqKfqBYN2tqZpISZ2.kTj.K', NULL, '2019-07-19 18:05:49', '2019-08-01 04:00:00'),
(185, 'Oshin', 'Olapeju', 'oshin_peju@yahoo.com', '7 Isaiah solakan str, oluwa ga, ipaja lagos', '1982-08-12', 'Ogun', '08076825055', 'Mr Oshin', '08025487179', 'Ogun', 2, 'Make up/  Gele,/ Torban', 6, 200, 'Lagos', 'female', 'profile_photos/img-20190602-123308.jpg', 2, 1, 0, NULL, '2019-07-19 19:04:59', '56eefe3634ae217b6a53d75b25b8ba0c109185a3', 'oshin-p', NULL, 0, 6, '$2y$10$xPv6TknfjnOwK6JQEVXaguoInItGwGwRFFdQWJqG2V1oLkVM6HM4u', NULL, '2019-07-19 19:03:57', '2019-08-01 04:00:00'),
(186, 'Riliwan', 'Gbademu', 'lisamoris44@gmail.com', '13 balogun street ipaja', '1995-06-30', 'Ogun', '07030240522', 'Biola', '08038410073', 'Lagos', 2, 'Service', 6, 200, 'Lagos', 'male', 'profile_photos/img-20190703-193603-9.jpg', 2, 1, 0, NULL, '2019-07-19 19:56:49', '44279bbe49f1dbe7b9abf1bd204404775e9af596', 'lisamor', NULL, 0, 6, '$2y$10$OOAYO6es7PpEQ/hi47.Tx.fVj5PzhrplubH4q2m520hk1/hbxxtoK', NULL, '2019-07-19 19:41:19', '2019-08-01 04:00:00'),
(187, 'Adenike', 'Taiwo', 'aadeniketaiwo@yahoo.com', 'Plot 4, house 9, tanwa abudu close, jibowu estate, abule egba', '1967-03-12', 'Osun', '08023203178', 'Abimbola Taiwo', '08033028659', 'Osun', 4, 'Pigery', 6, 200, 'Lagos', 'female', 'profile_photos/img-20161119-135022.jpg', 2, 1, 0, NULL, '2019-07-20 13:42:06', '18f7bb3d5ec184144166cca5adcf4ed4e04114a9', 'aadenik', 'princef', 0, 6, '$2y$10$pPq85nfcg7Iiqugm1Z1UeORczjpue8wsT1/jvh0JSiP3fsOCU3vca', 'VPOpJYMosm1XZSovFqS2OuIhWajhfZ3gH1QigEV5kCl41X6TimShROvfmgNC', '2019-07-20 13:38:33', '2019-08-01 04:00:00'),
(188, 'AKINBO', 'Sinmilouwa', 'sinmijustified@gmail.com', 'christ redeemer ajasa command', '1997-09-27', 'Ogun', '07019942695', 'Daniel Akinbo', '07019942695', NULL, 3, NULL, 36, 200, 'Lagos', 'male', 'profile_photos/img-20190706-wa0010.jpg', 1, 1, 0, NULL, '2019-07-22 14:42:49', '710bc6a4f282f378841225ddecc87dc306e3601d', 'sinmiju', NULL, 0, 6, '$2y$10$rWdtmIkWDEPgiFxRpKKCyuut9Zxvr1I9tES/yJBvjWO9j0KvmaeHe', NULL, '2019-07-22 14:42:04', '2019-08-01 04:00:00'),
(189, 'Samuel', 'Boluwatife', 'boxide2017@gmail.com', '243 flat 4, abesan estate', '1998-11-06', 'Ondo', '07080434291', 'Roseline', '08027555451', 'Ondo', 2, 'Photographer', 6, 200, 'Lagos', 'male', 'profile_photos/img-20190710-133228.jpg', 2, 1, 0, NULL, '2019-07-22 15:09:54', '0378108c1ef63577e07b1b40115bd4a9c385ab7c', 'boxide2', NULL, 0, 6, '$2y$10$hNUSmzlcpfXoJNhjIQLIzucGQD1ePWFGactMQs5lRqlnu.gC3RRgi', 'wxbv1Ia5iTuADPsbbexVZJ88Nw1Mr773Uyh61j2qQHov0i1Y0U3UcC9a2tzT', '2019-07-22 15:03:54', '2019-08-01 04:00:00'),
(190, 'Uti', 'Eyomi', 'Utieyineyomi15@gmail.com', 'Plot 1410 block 59 aboru heritage estate', '1997-11-11', 'warri', '08162758290', 'Mom', '08187123034', 'serrialeone', 3, 'Buying and selling', 12, 200, 'Lagos', 'female', 'profile_photos/img-20181203-164750-292.JPG', 1, 0, 0, NULL, NULL, 'e6bc98c678b48cf350a5a7f379dd3dff3224f99e', 'utieyin', NULL, 0, 6, '$2y$10$Cj6FBag5EKigpLQoYvgSCO7CoqHQLIPIverLXODmGjPU/MX8KJCA.', NULL, '2019-07-22 21:31:41', '2019-08-01 04:00:00'),
(191, 'Olabisi', 'Abraham', 'olaabraham20@gmail.com', '55, Anuoluwapo Street, Block Bus Stop, Ijaye Ojokoro, Lagos', '1984-08-02', 'Ogun', '08037749036', 'Grace Ochima Ugah', '08169463788', 'Benue', 2, 'Branding and Print Production', 6, NULL, 'Lagos', 'male', 'profile_photos/img.jpg', 3, 1, 0, NULL, '2019-07-24 15:55:46', '3c6c85866f5a817644e6b82c694f10c05634e907', 'olaabra', NULL, 0, 6, '$2y$10$DE6LWPT614ykGVQ2gJw3a.gMTQn8Jjy7IKQS7UfRHUxZwhxpFcdYi', 'BN8Jc9r2fIYMuaVJyvHAah4vrXBszReVJ2WjCeR5umLE86tdytXil5kTuLHF', '2019-07-24 15:54:33', '2019-08-01 04:00:00'),
(192, 'Olalekan', 'Damilola', 'olalekansirloko@gmail.com', 'No 5 sosanya str, egbeda Lagos', '1993-07-12', 'Osun', '08108724661', 'Christiana', '08065136105', 'Osun', 2, 'Service', 6, 200, 'Lagos', 'male', 'profile_photos/1562444321888.jpg', 2, 1, 0, NULL, '2019-07-24 16:50:47', '5861812853d19b842b9297a39a1a918266b7a931', 'olaleka', NULL, 0, 6, '$2y$10$0IPQs/1rsMmBB5ScDZF6WuP8MyVuQY2cJ4IesMXm8FUfsM3Afsb6.', NULL, '2019-07-24 16:48:05', '2019-08-01 04:00:00'),
(193, 'Ademide', 'Adebayo', 'adebayoademide1@gmail.com', 'Baruwa ipaja lagos', '1996-07-10', 'Oyo', '07019819145', 'Bidemi Olaoluwa ojo', '09092464638', 'Ekiti', 3, 'Clothing', 6, 200, 'Lagos', 'female', 'profile_photos/img-20190724-085614-743.jpg', 2, 1, 0, NULL, '2019-07-24 18:16:55', '5f25bc22cfc9e8ad86a63a2b323e209eb365df75', 'adebayo', NULL, 0, 6, '$2y$10$cwkJW1MYWxnV/Rq3/VpOGOhqtnxq8y5uhS4m4UYN8GY6dy5z6KPBK', NULL, '2019-07-24 18:15:57', '2019-08-01 04:00:00'),
(194, 'Ige', 'Oluwafunmilayo', 'igeoluwafunmilayo2016@gmail.com', '5,semiu babatunde street,alishiba sango otta, ogun state', '1992-06-02', 'oyo', '07037257353', 'ige Olajumoke', '07032808126', 'Oyo', 3, 'Water and drinks', 6, NULL, 'OTA', 'female', 'profile_photos/img-20190624-065200-450.jpg', 3, 1, 0, NULL, '2019-07-24 19:50:07', '477cbd3be4290dc6cbf2032340bc740380d3b24d', 'igeoluw', NULL, 0, 6, '$2y$10$dse1L.U3fIxFmGQgwdrB3eRKmVv32AIoeaX3v1VHNv8keHPpCozEq', NULL, '2019-07-24 19:49:06', '2019-08-01 04:00:00'),
(195, 'Grace', 'Ugah', 'martinsgrace001@gmail.com', '55, Governor Road, Aboru, Alimosho', '1990-04-23', 'Benue', '08169463788', 'Mr. Olabisi Abraham', '08183902649', 'Ogun', 1, 'Satchet Water Nylon Printing', 6, 4000, 'Lagos', 'female', 'profile_photos/grace-2.jpg', 3, 1, 4056, NULL, '2019-07-24 21:44:44', '31b2edbe8f0bf22b48bd23568235ee6ac04bc2d9', 'martins-1', NULL, 0, 6, '$2y$10$YLiIJueRGR6vvWcfI142UOmg6ESiRJxGW.2.VxtEdxXDArT60xM8G', 'jumN2EVdmcjY8wQt5juqWGruKmw8kXJwu7GIZwN7E9DVLhWFYN32tjZcXA8M', '2019-07-24 21:22:46', '2019-08-01 04:00:00'),
(196, 'Philip', 'Ovie', 'philky1960@gmail.com', 'Ipaja ayobo', '1991-10-21', 'Delta', '09026101322', 'Daniel', '08134733585', 'Lagos', 1, 'Photographer', 36, 500, 'Lagos', 'male', 'profile_photos/img-20190721-130942.jpg', 1, 1, 0, NULL, '2019-07-25 15:36:00', 'd8d231961dc505036a391391a9511f209780c4b4', 'philky1', NULL, 0, 6, '$2y$10$k2ZdBJNw1TI1EEUt6jt9yu4P0N3qP0SNAT3UgMC9p10sYY7SBYNiy', NULL, '2019-07-25 15:08:41', '2019-08-01 04:00:00'),
(197, 'Joshua', 'Akinyele', 'akinjosh007@gmail.com', '12, Omoba Ekisewa Street, Ota Ogun State.', '1996-12-07', 'Ondo', '09035602598', 'Akinyele David', '08066112643', 'Ondo', 3, 'Sales of Wears and Gadgets.', 36, 200, 'Ogun', 'male', 'profile_photos/img-20190725-151303.jpg', 1, 1, 0, NULL, '2019-07-25 18:39:13', '3cc6f6884bed3ac6bf86ae36d2853440ab6b407c', 'akinjos', NULL, 0, 6, '$2y$10$y1luFw2Om3V9jks79AWOG.vrtEivOHFRiNesgZMWmD8/HzqKMmuTq', 'UfdltyajuT2NgS7ziA5FUsP4TzE2SbVaMEUhrVof9xqsbNGYOgdgPCcgQDkV', '2019-07-25 18:38:27', '2019-08-01 04:00:00'),
(198, 'Toheeb', 'Saminu', 'toeebsaminu6@gmail.com', 'Opeki phase 708, ipaja, Lagos', '1997-01-19', 'osun', '08138887708', 'Afeez Adeboye', '09068428740', 'osun', 3, 'Buying and selling', 6, 200, 'lagos', 'male', 'profile_photos/beautyplus-20190725134408-fast.jpg', 2, 0, 0, NULL, NULL, '00d850bae56d2025d2296a105dc1257f9bee8f10', 'toeebsa', NULL, 0, 6, '$2y$10$Ke0WFzDYpIvjUP2NVHtbEOkG86L3E803mP/g4UK.lOtu0UC2BuRb2', NULL, '2019-07-26 15:52:47', '2019-08-01 04:00:00'),
(199, 'Oluwakemi', 'Oluwatosin', 'oluwakemitosin219@gmail.com', '10, majekodunmi str, ipaja,  Lagos State.', '1983-07-28', 'ondo', '08064176301', 'Tunmiise', '08064176301', 'lagos', 2, 'Hair dressing', 6, 200, 'lagos', 'male', 'profile_photos/img-20190726-120011.jpg', 2, 1, 0, NULL, '2019-07-26 18:27:07', 'fb14be141f185f9ec50138ec757408f5e51beaf4', 'oluwake', NULL, 0, 6, '$2y$10$q/enF.zUkEfFzTxPsjXZzeTa9NeK8JbJbRPs2.VmeNBjPp51H0eSC', NULL, '2019-07-26 18:14:22', '2019-08-01 04:00:00'),
(200, 'UGAH', 'PETER', 'crystalfountain144@gmail.com', 'Beside Afisuru Block Ind. Ikosi Road, Iyesi Ota', '1987-07-01', 'Benue', '07060755147', 'UGAH Olaide Adeola', '07036462436', 'Ogun', 2, 'Computer service and education consult', 6, 500, 'Ogun', 'male', 'profile_photos/img-20190727-173242.jpg', 3, 1, 0, NULL, '2019-07-29 20:09:49', 'a1dc78a8324bf85587552ee7fb1eacfcd4ca25c9', 'crystal', NULL, 0, 6, '$2y$10$Ya1pNd4krHGU90YEFKf5hOgT16gB2ZKmq4DRQXlOTwbPga5xtc0Qy', NULL, '2019-07-28 15:58:44', '2019-12-21 12:31:17'),
(201, 'Feranmi', 'Taiwo', 'feranmitaiwo60@gmail.com', 'Ifelodun str, akinyele outside, Lagos', '1986-04-04', 'Ogun', '08176458230', 'Semilore', '08176458230', 'Lagos', 2, 'Barbing', 6, 200, 'Lagos', 'male', 'profile_photos/fb-img-15606789301070276.jpg', 2, 1, 0, NULL, '2019-07-29 14:53:52', '93a66d45f7e2ebfda2c6ee63c59386e020c466fb', 'feranmi', NULL, 0, 6, '$2y$10$5nXjsVRucDt7QH.E0e4if.CEGolnCI/VwGz1pwNgQMTZvHFX70WaO', NULL, '2019-07-29 14:49:34', '2019-08-01 04:00:00'),
(202, 'Aminat', 'Akinremi', 'Akinremiaminat001@gmail.com', '8 majekodunmi close, opeki, Lagos state.', '1989-10-21', 'Ogun', '09057425743', 'Akinremi Asisat', '08094336462', 'Lagos', 2, 'Hair dressing', 6, 500, 'Lagos', 'female', 'profile_photos/img-20190505-115843.jpg', 2, 1, 0, NULL, '2019-07-29 15:53:41', '3f3bc554dbc0f1b8e827cbf5009c18a36e0fbb5d', 'akinrem', NULL, 0, 6, '$2y$10$cauh8fquQUza3KJOPzKX7OtL2UjHz0ulRMQDxYK0McHfQnIyTNcKe', NULL, '2019-07-29 15:38:37', '2019-08-01 04:00:00'),
(203, 'Ganiyat', 'Lawal', 'ganiyatlawal46@gmail.com', '39, araokanmi str, aye toro, Ogun state.', '1998-11-14', 'Osun', '08022276800', 'Olawale', '08108509410', 'Ondo', 2, 'Hair dressing', 6, 200, 'Lagos', 'female', 'profile_photos/1564501176818979889818.jpg', 2, 1, 0, NULL, '2019-07-30 19:40:59', 'f60e96f771e6cfe1c75d04593d3c091e7ccfdb10', 'ganiyat', NULL, 0, 6, '$2y$10$8ZRBJHnjwD1kGY2kIUkLt..CO.vvVf9tSkgrPR8unHtRXClAUjRZC', NULL, '2019-07-30 19:40:16', '2019-08-01 04:00:00'),
(204, 'Omobolanle', 'Iwasun', 'omobolanleiwasun@gmail.com', '46,anisere str, ayobo, ipaja, lagos', '1990-09-16', 'Lagos', '09096198287', 'Boluwatife iwasun', '07081873135', 'Lagos', 3, 'Boutique', 6, 200, 'Lagos', 'female', 'profile_photos/15645021710221961161451.jpg', 2, 1, 0, NULL, '2019-07-30 20:00:21', 'ac25f81f14792799199f133a752c9b752a53167f', 'omobola', NULL, 0, 6, '$2y$10$vfkoOnzDwiokaUeHP3Wb4O1mp47rTjthmpkdgBkZNtZDefe061saW', NULL, '2019-07-30 20:00:02', '2019-08-01 04:00:00');
INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `home_address`, `dob`, `state_of_origin`, `phone`, `name_next_of_kin`, `phone_next_of_kin`, `state_next_of_kin`, `business_category_id`, `business_of_interest`, `period`, `pennywise`, `resident_state`, `gender`, `image`, `role`, `status`, `balance`, `authorization_code`, `email_verified_at`, `email_verification_code`, `ref_code`, `ref_by`, `ref_bonus`, `batch_id`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(205, 'Olawale', 'Azeez', 'olawaleazeez436@gmail.com', '6 owoyele str, ipaja, Lagos state.', '1982-05-06', 'Ogun', '08081816664', 'Kolawole', '08028938384', 'Ogun', 3, 'Selling of phones and Accessories', 6, 200, 'Lagos', 'male', 'profile_photos/1564502728678794601437.jpg', 2, 1, 0, NULL, '2019-07-30 20:10:40', '2879996340f996abefb5e0abdacdcdbb8a1e1b5f', 'olawale', NULL, 0, 6, '$2y$10$ZrxCllapwXVL65amWDyaE.R7Ic5sl5Gb9kBNqbHcyLKwZlgwtlBYy', NULL, '2019-07-30 20:10:08', '2019-08-01 04:00:00'),
(206, 'ayomide', 'pamilerin', 'sanniolaazeezah@gmail.com', 'No 7 Bashiru Adigun Street', '2001-03-12', 'ogun', '07011207324', 'Damilare', '08101164905', 'ogun', 2, 'Tailoring', 6, 200, 'Lagos', 'female', 'profile_photos/snapchat-31320687.jpg', 2, 0, 0, NULL, NULL, 'ac51807ee7db2c2f45dd90ee2966a0ec2a3ae349', 'sanniol', NULL, 0, 7, '$2y$10$qxNR8uTffY.rXo.EsHAUfeWhwyc0eI1AumU4woU68XSekZrmmFm3y', NULL, '2019-08-01 15:28:01', '2019-10-01 04:00:01'),
(207, 'Azizat', 'Adedeji', 'adedejiazeezat98@gmail.com', '11, timidire, alaja rd, lpaja, lagos', '1998-02-07', 'Oyo', '08171083555', 'Yusuf', '08171083555', 'Lagos', 2, 'Tailoringy', 6, 200, 'Lagos', 'female', 'profile_photos/screenshot-20190730-112136.png', 2, 1, 0, NULL, '2019-08-01 18:01:59', '23f737caeb91a57856dc953bd7073d05a0cfc723', 'adedeji', NULL, 0, 7, '$2y$10$CZ9Gwo6JGtpZybiLFsYHc.Tn/cdCfQYmJ8dQWQ3PcPP1im3i0TMBC', NULL, '2019-08-01 18:00:00', '2019-10-01 04:00:01'),
(208, 'toyin', 'Adebisi', 'toyinadebisi2011@gmail.com', '2,olateju ilesanmi,ipaja,lagos', '1977-06-15', 'Ogun', '08108656216', 'Stephen Adebisi', '08108656216', 'Ogun', 3, 'Buying and selling', 6, 200, 'Lagos', 'female', 'profile_photos/img-20190622-164347.jpg', 2, 1, 0, NULL, '2019-08-01 18:42:24', '84424fe42aa9bcbfde2e3fb4bef868de06d4c18b', 'toyinad', NULL, 0, 7, '$2y$10$H20C1..LhrPDBxEeVCf6JOfQcy3ym0FQHIbdWtpNsObnRLg14A/Ba', NULL, '2019-08-01 18:41:22', '2019-10-01 04:00:01'),
(209, 'Yosola', 'Ojo', 'yosolaojo@rocketmail.com', '50,oshoba\r\nAvenue ipaja ayobo', '1988-06-13', 'Ondo', '08093451206', 'Akorede', '08125312674', NULL, 3, 'Selling', 6, 200, 'Lagos', 'female', 'profile_photos/15646724233142029914654.jpg', 2, 0, 0, NULL, NULL, '187c84a764f59392968a26ce2518cfb0ad558c98', 'yosolao', NULL, 0, 7, '$2y$10$AiVLl0EuPkh7tDPyYmkknOH.pCJTPHpYubf0Bpnd.NwUWGESQThMy', NULL, '2019-08-01 19:14:39', '2019-10-01 04:00:01'),
(210, 'Owolabi', 'Musa', 'Howohlarbeemooser@gmail.com', 'No 27, Onikanga road, Bada Ayobo, Ipaja Lagos', '1985-07-02', 'Ogun', '08140273272', 'Atinuke Balogun', '08034245686', 'Ogun', 2, 'Service', 6, 500, 'Lagos', 'male', 'profile_photos/1565284357657-1001388219.jpg', 2, 1, 0, NULL, '2019-08-08 21:14:46', 'f4ba79d351286a037c45ded021c11d53c9777243', 'howohla', NULL, 0, 7, '$2y$10$9Gpm40OUwhmRTyJp4CYYPeKNnsczY6A5KD0kjBDG2G49VqczScE3S', NULL, '2019-08-08 21:13:18', '2019-10-01 04:00:01'),
(211, 'OWUH', 'UCHECHUKWU', 'reaiwood298@gmail.com', '5 Ogunjemilusi Street Ashipa', '1986-10-08', 'ANAMBRA', '07037698981', 'OWUH JOY UZOMAKA', '08106256801', 'ANAMBRA', 2, 'LAPTOP ENGENEER', 24, NULL, 'LAGOS', 'male', 'profile_photos/53850245-2336393839950021-4127393202711822336-o-1.jpg', 3, 0, 0, NULL, NULL, '9c49fe372768c020f9e8824e49520ac6fe71b9d9', 'reaiwoo', NULL, 0, 7, '$2y$10$K.Q1hcs5P5rGteNNjr8RCOLjDObTVmvfxx7P17zolqge2zfKKMnl6', NULL, '2019-08-17 18:07:44', '2019-10-01 04:00:01'),
(212, 'UCHECHUKWU', 'OWUH', 'realwood298@gmail.com', '5 Ogunjemilusi Street, Ashipa Lagos', '1986-10-08', 'Anambra', '07037698981', 'JOY UZOAMAKA OWUH', '07067453162', 'ANAMBRA', 2, 'COMPUTER REPAIR & NETWORKING', 24, 1000, 'LAGOS', 'male', 'profile_photos/53850245-2336393839950021-4127393202711822336-o.jpg', 1, 1, 0, NULL, '2019-08-20 17:20:34', 'e266d15c446db31dba80edb449a14db1b1dd2373', 'realwoo', NULL, 0, 7, '$2y$10$edmMK0llMAPTdAvUkPAS/ehbaeB1HVgiDxAKChq6vxgZC4uzu5bqa', NULL, '2019-08-20 17:19:00', '2019-10-01 04:00:01'),
(217, 'Ogunbiyi', 'Olumide', 'olumidemuyiwa2015@gmail.com', 'Block 296 flat 5 Abesan Estate ipaja Lagos', '1987-07-01', 'Ogun', '08068776083', 'Ogunbiyi olufolarin', '07086903431', 'Ogun', 3, 'Recharge card', 12, 300, 'Lagos', 'male', 'profile_photos/olumide-pics.jpg', 2, 1, 0, NULL, '2019-09-10 18:39:23', 'df8c495f3c26876c8558662b0b2a57fb9d3e98e8', 'olumide', NULL, 0, 7, '$2y$10$V63Wkh56ClAO5O6VYBh1AuSoAV7Y7zXa34kQLS1KQliJ3nKU1jMh2', '0KIsAlfu2DUx7tpF4Df2GN0ivPdiLRTn6XAncpGUS5hcJS53X5FXJCv2oaZo', '2019-09-10 18:38:51', '2019-10-01 04:00:01'),
(214, 'Lekan', 'Busayo', 'thrustinv@gmail.com', '4 Adewale Adegbite', '1999-07-17', 'Lagos', '08171904747', 'oluwatobiloba Akinbanjo', '09093933261', 'Lagos', 2, 'D', 36, 500, 'Lagos', 'male', 'profile_photos/profileicknew-1.jpg', 1, 1, 0, NULL, '2019-08-22 10:48:34', '250519c9ada83319184ab3a0bbd1287aa3cb095d', 'thrusti-1', NULL, 0, 7, '$2y$10$fJnpTjXhe1PnMdvafUAXGuml0CrEBy.RDsh0zQYs6x1Hg7ALEqGBO', '1J7FAc9oCZbxLoDSrrOEvICJ5yuKSKertIFpd9SmS7JmHPiWkEZbJrB5LpUT', '2019-08-22 10:48:21', '2019-10-01 04:00:01'),
(215, 'Okafor', 'Callistus', 'manchidede2@gmail.com', 'No 2 chukwu street', '1998-08-11', 'Rivers', '08063483130', 'Okafor Callistus', '08063483139', 'Rivers', 3, NULL, 60, 500, 'Rivers', 'male', 'profile_photos/blank-124.png', 4, 1, 0, NULL, '2019-08-22 14:25:01', '7b44f360d051f91a6ba3817bd18445bef9141b02', 'manchid', NULL, 0, 7, '$2y$10$lwxNeFshd0Ed22HOxxn2vuHq0qIZHpEuLx038SWw9TlWGPOqQCtW6', 'kozCVu6nj742fGa9zjzbiTt6HaiQmRe0tOgbTRW4OnhYAPQqfLuuv3OmOKqi', '2019-08-22 14:24:20', '2019-10-01 04:00:01'),
(216, 'Blessing', 'Ifeoma', 'Mmasinachiblessing302@gmail.com', 'No 68 acha street iyiowa odoekpe idemmili anambra state', '1990-03-25', 'Anambra', '08069504542', 'Daniel', '08033868337', 'Anambra', 3, 'Buying and selling', 36, NULL, 'Anambra', 'female', 'profile_photos/img-20190803-115041.jpg', 3, 1, 0, NULL, '2019-08-23 21:25:56', 'a3c8c3399eb3c0fc38e9b11607d8f8dccfc21edd', 'mmasina', NULL, 0, 7, '$2y$10$6ugJjlZBf8YRKOaezM2GU.H4SHlX0/Rmvg.Ca/vuYH1jr/K0YqRZm', NULL, '2019-08-23 21:24:44', '2019-10-01 04:00:01'),
(218, 'Ebenezer', 'Okwuoma', 'wdcebenezer@gmail.com', '#28 Unique Avenue, Off Aker Road, Port Harcourt', '1980-10-18', 'Rivers', '08069239648', 'Ebenezer Okwuoma', '08069239648', 'Rivers', 3, 'Web Design', 60, 200, 'Rivers', 'male', 'profile_photos/buynaijaestatecom1.jpg', 1, 1, 200, NULL, '2019-10-11 14:22:51', '8597d033c6b5ce6d771b7d1e8e91df7e8632186a', 'wdceben', NULL, 0, 8, '$2y$10$viTOciVf3wfvef0JW3gsyuw5bqolIHBaUiI5ze6I6Ncw3qB627sdi', NULL, '2019-10-11 14:21:55', '2019-11-01 04:00:00'),
(219, 'Ali', 'Samaila', 'alisamaila213@gmail.com', 'Nigeria,yobe state,damaturu', '1998-10-02', 'Nigeria', '08032116759', 'Ibrahim', '08031116759', 'Yobestat', 6, 'Minning', 12, NULL, 'Nigeria', 'male', 'profile_photos/img-20191017-000049.jpg', 3, 0, 0, NULL, NULL, '303b04c50b13d2885d880d2bdbcde69c330133fe', 'alisama', NULL, 0, 8, '$2y$10$0NmbPDlzwxSdZAfNZBQkjezbvIujVyK/ACF7y84WtfjkFb./YNRo2', NULL, '2019-10-17 20:48:02', '2019-11-01 04:00:00'),
(220, 'Kayode', 'Bankole', 'whalesenergy@gmail.com', '14 Olanrewaju Ajewole St, Unique Est, Baruwa, Lagos', '1985-05-15', 'Osun', '07063396991', 'Modupeola', '08081338002', 'Lagos', 4, 'Farm', 60, 200, 'Lagos', 'male', 'profile_photos/20190514-110647.jpg', 1, 1, 0, NULL, '2019-10-27 14:53:06', '767740a0954168d6302ef9ff5d74444c47cfffa0', 'whalese', NULL, 0, 8, '$2y$10$cf89dN15odkyxGp7ZYhTguPpiZUhNiaqTNmNhC7ZrcgiUo/JYzAqu', 'nNb3UzrkgKEopsT7QHBdUaBq9AFYQ8LPGEsXZoaRGME0RFMCYTrV9PMEtXic', '2019-10-27 14:52:05', '2019-11-01 04:00:00'),
(221, 'Olakitan', 'Samson', 'oladapobharca@gmail.com', '21 Tioluwani street off olubondu ipaja Lagos', '1993-05-21', 'Ogun', '08066227017', 'Bolanle Olakitan', '08063971268', 'Ogun', 4, 'Poultry farm', 18, 200, 'Lagos', 'male', 'profile_photos/img-20190503-073545-0.jpg', 2, 1, 0, NULL, '2019-10-28 17:03:13', '0e7417dc6b28ce10f04aae5fa7665cc98b254fcd', 'oladapo', NULL, 0, 8, '$2y$10$Bj7ecpHrUiiyVCwfVvYWEe7JOk5wfYh7f6Mc04Z4xnFRQfxF62Jnu', NULL, '2019-10-28 17:01:41', '2019-11-01 04:00:00'),
(222, 'ismail', 'abdulazeez', 'ismailabdul3513@gmail.com', '24 latona street araromi bus stop iyana-ipaja lagos', '1995-10-25', 'katsina', '08067497024', 'yusuf abdulazeez', '08043863312', 'katsina', 2, 'tutorial classes for post secondary school students', 6, 200, 'Lagos', 'male', 'profile_photos/17991919-826948827482051-6404911789708256165-n.jpg', 3, 1, 0, NULL, '2019-10-31 14:01:43', '9f240ec2dc8db9c97dd5e220c8ab63ddaadd59ab', 'ismaila', NULL, 0, 8, '$2y$10$YlrtxTZ/bOvoaW4R3UNq1O800Yd4dd600YpTQF0o4kGBdDXqEclTa', NULL, '2019-10-31 13:58:00', '2019-11-27 18:59:38'),
(223, 'Alaka', 'Ayoola', 'ayoolaalaka2@gmail.com', 'Block 432 Flat 3 Abesan Estate Ipaja', '1975-07-09', 'Osun', '09013311848', 'Deborah Alaka', '08085858225', 'Lagos', 4, 'Production', 12, NULL, 'Lagod', 'male', 'profile_photos/dee3fe24-8713-4e9e-a97b-f1758529bf5a.jpeg', 3, 1, 0, NULL, '2019-10-31 14:23:56', '979a365b705f4b95156b9ff282ccbb45bcc3bffe', 'ayoolaa', NULL, 0, 8, '$2y$10$kc/VAt3W.uwC9Eu.mIqR8emPMZUotvsi/yQgCvYrJbt5SqdINyEF.', NULL, '2019-10-31 14:23:26', '2019-11-01 04:00:00'),
(224, 'TAOFEEK', 'TAJUDEEN', 'taofeektajudeen2522@gmail.com', 'No,36 Muretala Muhammad way kabala west Kaduna State', '1996-01-06', 'OYO', '08066461138', 'Taofeek', '08036987333', 'OYO', 4, 'Agriculture', 12, NULL, 'Kaduna', 'male', 'profile_photos/img-20190512-010520-119.jpg', 3, 1, 0, NULL, '2019-11-04 22:31:39', '9c457f733da466eaf0ed09979454b30090fb3853', 'taofeek', NULL, 0, 9, '$2y$10$0AKECdZKci3kPuLrbv6J7uhHnQTnVBzqLpVltUiJavuO3tseQmGCG', '3bH4jPeOtSbJOJIjYLjdYfISQq8EFNy1JHFmaDoLmTCfOd6Y0m8Aau6HJjWS', '2019-11-04 22:30:28', '2019-12-01 05:00:00'),
(225, 'Ibrahim', 'iliya', 'ibrahimavan22@gmail.com', '26 power street kadunaHu', '1994-01-09', 'Bauchi', '08127012460', 'Suzy balewa', '09060053204', 'Bauchi', 4, 'Agriculture', 48, 200, 'Kaduna', 'male', 'profile_photos/beautyplus-20191106010936-save.jpg', 1, 1, 0, NULL, '2019-11-06 05:10:35', 'e37fedfa837539fc9546d0e0f8d0752a36815778', 'ibrahim', NULL, 0, 9, '$2y$10$78sPRhNWrqegwOVpwvUMou11W4LgSa4FU5SGD9vNm6kE6NPqgD6h.', '4CpRV5Ofmlv6aDrKyyQiMHNtts4mpamx1iPZNzlu1QNKiq1xRo8dQ0awiQGb', '2019-11-06 05:10:09', '2019-12-01 05:00:00'),
(226, 'Mazadu', 'avan', 'lieutanant22@gmail.com', '67 emir close', '1990-09-09', 'Bauchi', '08168825275', 'Ibrahim', '08127012460', 'kaduna', 3, 'Buying and selling', 36, 500, 'Bauchi', 'male', 'profile_photos/beautyplus-20191106015053-save.jpg', 1, 1, 0, NULL, '2019-11-06 05:56:10', '9cf4c05205a46a395e115c0fb5d7efe9d4fb16f3', 'lieutan', 'ibrahim', 0, 9, '$2y$10$fy7s3lipg2KYLW2ZUDbtcubYVlF5LLWQrxpXqXrktAUiYM4jB0/Ci', NULL, '2019-11-06 05:51:32', '2019-12-01 05:00:00'),
(227, 'Jamilat', 'Danjuma', 'Jaydanj16@gmail.com', '09 street lokoja', '1994-12-04', 'kogi', '08061329069', 'ibrahim avan', '08127012360', 'Kaduna', 3, 'Buying and selling', 48, 200, 'kogi', 'female', 'profile_photos/beautyplus-20191107091323-save.jpg', 1, 1, 0, NULL, '2019-11-07 13:17:42', '3145997460f02430ff4ce959617134524f966380', 'jaydanj', 'ibrahim', 0, 9, '$2y$12$yt2lMvGj9MpJsI6UhZIHyOsoupKx6AKUOx3hCAZPHz9HrDZOsZS3O', 'dmt5pFyjaqXqabynv9DPcSewVKUL86BkfHBye9mpPagioOo9MO1kqHSK4ZE0', '2019-11-07 13:15:09', '2019-12-01 05:00:00'),
(228, 'Mary', 'ibrahim', 'ibrahimmary2012@gmail.com', 'Hotorrow limawa Behind NNPC Depot Kano', '1996-02-25', 'Kaduna', '07067366663', 'yusuf ibrahim audi', '07067366667', 'Kaduna', 3, 'Buying and selling', 48, 200, 'kano', 'female', 'profile_photos/beautyplus-20191107104329-save.jpg', 1, 1, 0, NULL, '2019-11-07 22:45:18', '6f39b2fb8fe6e5c47103c24493b18c4ee2db4598', 'ibrahim-1', 'ibrahim', 0, 9, '$2y$12$jAdj2EO3cjLIEmS6cqOkQOMHYpvanO5Y6gh2Dx8nibD5G6TFXhF9O', '3S06KIvSN7OrFK2Y6R24rkOGepdGapgNfDKfJSPvls5IQN6vaN6u4oW6sCE0', '2019-11-07 14:56:51', '2019-12-01 05:00:00'),
(229, 'Veronica', 'Baba', 'Veronicababa56@gail.com', 'Celestial road faringida mando kaduna', '1991-01-15', 'Nasarawa', '07066085575', 'Esther baba', '07066085575', 'Nasarawa', 3, 'Buying and selling', 48, 200, 'kaduna', 'female', 'profile_photos/beautyplus-20191110231801-save.jpg', 1, 0, 0, NULL, NULL, '81f0296b47384848ac3d50d1c3dd4f67b4a93b6c', 'veronic', 'ibrahim', 0, 9, '$2y$10$kPH0P.FVB2fpCybfNUlUhuWo6s.D4ZpW9xC9lpQuQv9Mp626B6qi.', NULL, '2019-11-11 03:18:19', '2019-12-01 05:00:00'),
(230, 'Olakitan', 'Moses', 'mosesolakitan9@gmail.com', '27,Olunondu road,Ipaja,Lagos.', '1997-06-26', 'Ogunstate', '08145848570', 'Peace Olakitan', '08063971268', 'Ogunstate', 3, 'Selling of clothes', 36, 200, 'Lagosstate', 'male', 'profile_photos/img-20190401-143316.jpg', 1, 1, 0, NULL, '2019-11-13 14:36:24', '1005d2a0b34c3cbcbbcf65ad8eedc0351fc99097', 'mosesol', NULL, 0, 9, '$2y$10$qR4oOh/gmP3a.Hhe4xGMV.wbhzDc1RAoShT.3L4zTL0HEY2RgRVqK', NULL, '2019-11-13 14:33:39', '2019-12-01 05:00:00'),
(231, 'Joshua', 'Akomolafe', 'joshuaakomolafe1582@gmail.com', 'Jabiri roundabout funtua Katsina', '1996-10-14', 'Ondo', '07036742838', 'Samuel Akomolafe', '07030166961', 'Katsina', 4, 'Farming and poultry', 18, NULL, 'Katsina', 'male', 'profile_photos/img-20191116-102817-224.jpg', 3, 1, 0, NULL, '2019-11-16 14:30:11', '3e9bdff733edd8b04dd230bebfa37eb197aea65c', 'joshuaa', NULL, 0, 9, '$2y$10$o8cx9BcYpovHSKwH9TOdYeo8o.zvkXsazeW6bVVHR5HlnL5KIh1AC', NULL, '2019-11-16 14:28:39', '2019-12-01 05:00:00'),
(232, 'Binta', 'abbas', 'abbasbintaa@gmail.com', 'Nayibawa Zaria Road', '1995-12-18', 'Bauchi', '08145626175', 'ibrahim abbas', '08034325070', 'bauchi', 4, 'Fish farming', 36, 200, 'kano', 'female', 'profile_photos/img-20191116-133940.jpg', 1, 1, 0, NULL, '2019-11-16 17:42:37', '4d8d5371469cdedb78353c8b54c2fe58ecc79be8', 'abbasbi', 'ibrahim', 0, 9, '$2y$10$lso8bORmtUe3RxpsoFEuPutV6ql1UM4QtClWoKC2QsHD3R3B7qQLO', '9H5Vvda19dPsHq3mLNqVg8XZBfiKVaeqNDyHOkU7N6gfh0c4yy9DZemJpQKZ', '2019-11-16 17:41:31', '2019-12-01 05:00:00'),
(233, 'Maryam', 'Olagunju', 'molayemi2001@gmail.com', 'Line asibiti maikalwa quarters Kano, kano state', '2001-11-25', 'Kwara', '08091558713', 'Lateefat mustapha olagunju', '07066507346', 'Kwara', 3, 'Buying and selling', 36, 500, 'Kano', 'female', 'profile_photos/2019-09-16-17-55-12-647.jpg', 1, 0, 0, NULL, NULL, '145c4ad98e2e67b297851b3f4b553faa907a03d3', 'molayem', NULL, 0, 9, '$2y$10$L8IvzrFm/euiPnSC9JnOP.t9sKTb9wYLiATL1ojPppZXEtja7xamG', NULL, '2019-11-17 21:26:46', '2019-12-01 05:00:00'),
(235, 'Benjamin', 'Ifeta', 'bencocoone@gmail.com', '1, Agenebode Street orisunbare phase2 ayobo', '1982-11-29', 'Delta', '08038530565', 'Happiness Ben', '08057888496', 'Lagos', 3, NULL, 24, 200, 'Lagos', 'male', 'profile_photos/fb754bd15b2f0c55756e3e82b655b764.jpg', 2, 1, 0, NULL, '2019-11-19 00:04:12', 'df5e3f550b18307b962c948c72cd7666efec2ee1', 'bencoco', NULL, 0, 9, '$2y$10$K4E90hKdjOp5Qk8iD4tSOOoHxbMsapDa7uwpjWjDQsEUz7L9hB2sy', 'HS70F7lwjFYHJfB7mP66VZvetMrcxr1r53lh5xw0iXvpoPFYOzH9MwSUSmwG', '2019-11-19 00:02:24', '2019-12-01 05:00:00'),
(236, 'Elizabeth', 'Orajiaku', 'maximumhealthsolutions@gmail.com', '46, Aina Obembe Str, Ipaja,\nLagos', '1972-09-20', 'Imo', '08034595706', 'Olive Orajiaku', '08183140414', 'Anambra', 1, 'Health/Skincare products', 6, 200, 'Nigeria', 'female', 'profile_photos/img-20191018-152505.jpg', 2, 1, 0, NULL, '2019-11-19 22:37:19', '7938daf6530094844ec7bb5db50f57e7ca978ce7', 'maximum', NULL, 0, 9, '$2y$10$xYGZiEWz82QV0FOmKxezj.wfeby6URvr8HJPKl/0Yg7bEPg1d9fUK', NULL, '2019-11-19 22:32:52', '2019-12-01 05:00:00'),
(237, 'Shitnaan', 'John', 'dariankohn@gmail.com', 'Jos, Nigeria', '1995-10-29', 'Plateau', '08106012042', 'Progress', '08079289002', 'Plateau', 3, 'Fabrics and Shoes', 48, 500, 'Jos', 'male', 'profile_photos/screenshot-20191029-122522.png', 1, 1, 0, NULL, '2019-11-20 03:15:31', 'f79b4d97e99361da081046834f8a5fdd38003145', 'dariank', 'ibrahim', 0, 9, '$2y$10$lpLpptIlQJrUJF8SuHaqAu9kj5rePouwnXBKryTEzVE8i52nSm7dm', NULL, '2019-11-20 03:12:49', '2019-12-01 05:00:00'),
(238, 'Ghani', 'Mallaka', 'ghanimallaka@gmail.com', 'Maryam Tafawa Balewa LGA of Bauchi state', '1996-12-25', 'Bauchi', '07062311149', 'Ibrahim Murtala', '07066179879', 'Bauchi', 4, 'Poultry Farm.', 36, 200, 'Bauchi', 'male', 'profile_photos/beautyplus-20191120184436-save.jpg', 1, 0, 0, NULL, NULL, 'd3a885d298c9dd73486c54bea45c71a14c948666', 'ghanima', 'ibrahim', 0, 9, '$2y$10$UX3.rCyG1GszCiZ7u0X9c.UV0mn5iCsojk6oGy43zcG9d.9bqAoPa', NULL, '2019-11-20 22:45:30', '2019-12-01 05:00:00'),
(239, 'Suzan', 'Joshua', 'Suzanjoshua26@gmail.com', 'Yalwa kagadama bauchi state', '1998-01-09', 'Bauchi', '09060053204', 'Ibrahim iliya', '08127012460', 'Bauchi', 3, 'Buying and selling', 48, 200, 'Bauchi', 'female', 'profile_photos/beautyplus-20191120221806-save.jpg', 1, 1, 0, NULL, '2019-11-21 13:02:39', '4e8b877cd269fe85d0e81360891c2a8abe7a353a', 'suzanjo', 'ibrahim', 0, 9, '$2y$10$5KcpsbuOBkWnL2q0qiRLg.u.nIV.Ulo/rxh4atbcVdlHLfiAzrOOG', NULL, '2019-11-21 02:22:39', '2019-12-01 05:00:00'),
(240, 'Paul', 'Abba', 'abbapaul2@gmail.com', 'E27 hausawa street television kaduna', '1992-09-01', 'Kogi', '08133761357', 'Stephen', '09033338975', 'Niger', 1, 'Fashion and designs', 6, 500, 'Kaduna', 'male', 'profile_photos/img-20191122-113200-4.jpg', 3, 0, 0, NULL, NULL, 'ebf95cfff708b421fc560113fa9f0b5c10d1caf7', 'abbapau', NULL, 0, 9, '$2y$10$rekaLu26s099.ipc3bByruftgkfFDaGfk06Ze1rTNYZ/KwbE8N04y', NULL, '2019-11-23 12:39:17', '2019-12-01 05:00:00'),
(244, 'Abigail', 'Akinsulore', 'akinsuloreo@gmail.com', '3, Elejigbo Estate road B, Sango Ota, Ogun State.', '1996-09-12', 'Ondo', '08101974402', 'Blessing Akinsulore', '08135503892', 'Ondo', 3, 'Buying and selling', 6, 200, 'Ogun', 'female', 'profile_photos/img-20190828-073309-01.jpeg', 3, 0, 0, NULL, NULL, '64c7b4765e892c5ab6aa295b8dc8890110a900d5', 'akinsul', NULL, 0, 9, '$2y$10$o5E8KVekg2O/gcLL6GY5j.XpQH8NQFSHl/zCw.K2hzi9MFDViqxUG', NULL, '2019-11-28 15:29:51', '2019-12-01 05:00:00'),
(242, 'Stanley', 'Nkwocha', 'Joe_stan@yahoo.com', '22, Adekunle street, Oshodi, Lagos', '1995-01-15', 'IMO', '08102133252', 'Emmanuel Joseph', '08122767526', 'IMO', 3, 'Wristwatch', 12, 200, 'Lagos', 'male', 'profile_photos/15749328428391301836605343443808.jpg', 3, 1, 0, NULL, '2019-11-28 14:52:13', 'e2f6ed48398dd20f92469806256d55c88f25076c', 'joe-sta', NULL, 0, 9, '$2y$10$EKd1mXT/rsH8zvYH41vyiOdWiAUST03MPlXUQPssY3r4Ye1CWmePK', '92zCBeJbhIs6fB5E2enSh386ZDAVQ4KFTUEOLPohaM7WfQrU4llwKDDn42Md', '2019-11-28 14:22:55', '2019-12-01 05:00:00'),
(245, 'Abigail', 'Akinsulore', 'emeraldbags129@gmail.com', '3, Elejigbo Estate road B, Sango Ota, Ogun State.', '1996-09-12', 'Ondo', '08101974402', 'Blessing Akinsulore', '08135503892', 'Ondo', 3, 'Buying and selling', 6, 200, 'Ogun', 'female', 'profile_photos/img-20190828-073309-01-1.jpeg', 3, 0, 0, NULL, NULL, '94191a07af8bec5da0c2b136134ad01736c493c9', 'emerald', NULL, 0, 9, '$2y$10$UnlZRszs49DKMJKZLqciy.66WPvyD8gf.1vlyacQRKkm.r1PhnKJe', NULL, '2019-11-28 15:31:00', '2019-12-01 05:00:00'),
(246, 'Timothy', 'Geoffrey', 'timgeoff225@gmail.com', 'Gondola, Jos north. Plateau State', '1995-02-26', 'Plateau', '07038337111', 'Philemon', '08141812883', 'Plateau', 2, 'Photography', 6, 200, 'Plateau', 'male', 'profile_photos/img-20191124-091217-0.jpg', 3, 0, 0, NULL, NULL, '5332fde1222e6339546530e628230ac21514e1d5', 'timgeof', NULL, 0, 9, '$2y$10$vOPx3edWJqysx9vX1VQ0bOBWm5r/BWLRRpSUWi0M5Q99w5BuzwMOa', NULL, '2019-11-28 22:26:21', '2019-12-01 05:00:00'),
(247, 'Timothy', 'Geoffrey', 'timgeoff225@yahoo.com', 'Gondola, Jos north. Plateau State', '1995-02-26', 'Plateau', '07038337111', 'Philemon', '08141812883', 'Plateau', 2, 'Photography', 6, 200, 'Plateau', 'male', 'profile_photos/img-20191124-091217-0-1.jpg', 3, 0, 0, NULL, NULL, 'd52be3f521f983d70a468f4170c4b31d5131ba90', 'timgeof-1', NULL, 0, 9, '$2y$10$FqQuuWlyMMRI0W5Tp1isGer/JMG/UWy8D4SWw87yifAU71fusnso2', NULL, '2019-11-28 22:34:31', '2019-12-01 05:00:00'),
(255, 'Ibrahim', 'Yushau', 'Ibrahimmuazzamyushau@gmail.com', 'Bakori Road, Funtua, Katsina State', '1995-10-15', 'Katsina', '08032320140', 'Najibullah Yushau', '07060648053', 'Katsina', 4, 'Poultry', 36, 500, 'Katsina', 'male', 'profile_photos/img-20190504-164914.jpg', 1, 1, 0, NULL, '2019-12-03 03:11:54', '44c4c38209a016b3850cd0470e9f4293ce33bd42', 'ibrahim-2', NULL, 0, 10, '$2y$10$7wgM8SezsSjpXUJkBrV2IesrlHGnWJjan/hrbuHdWU/3GRr5tTkVe', NULL, '2019-12-03 03:10:34', '2020-01-01 05:00:00'),
(256, 'Ismail', 'Abdullahi', 'i.abdullahi5@fudutsinma.edu.ng', 'No 184 Damba Housing Estate Gusau', '1994-04-27', 'Zamfara', '08109941840', 'Abdullahi Ismail', '08069177642', 'Zamfara', 3, 'Clothing', 6, 1000, 'Zamfara', 'male', 'profile_photos/new-doc-2019-03-17-10.jpg', 3, 1, 0, NULL, '2019-12-03 22:42:22', '0077ca8c8a8dcae0cb511707ba0e159e6b5c71cd', 'iabdul', NULL, 0, 10, '$2y$10$Lzc0nX1T.BAtxTj/AoVY4.bfp6TNkaUvJrzWzpDTYhW.F8np4X3Si', NULL, '2019-12-03 21:58:45', '2020-01-01 05:00:00'),
(250, 'Olawale', 'Okunowo', 'olawaleokunowo@gmail.com', '1,OLAWALE okunowo bakare street ilado,igbogbo,ikorodu', '1969-08-08', 'Ogun', '08098422311', 'Bakare oladunke', '08023673777', 'Lagos', 4, 'Farming(crop)', 12, 200, 'Lagos', 'male', 'profile_photos/15749962112407941221102005101774.jpg', 2, 1, 0, NULL, '2019-11-29 07:59:41', '1320613bf0095ce1022e830707d34e4526341034', 'olawale-1', NULL, 0, 9, '$2y$10$5U6nX5geI3Nlh6TifcjQXeMwkD5UToQfhivOJlWmDtwsPLNr..nJu', NULL, '2019-11-29 07:57:58', '2019-12-01 05:00:00'),
(251, 'Timothy', 'Geoffrey', 'geoffreytimothytongshuwar@gmail.com', 'Gondola Jos North, Plateau Sate', '1995-02-26', 'Plateau', '07038337111', 'Philemon', '08141812883', 'Katsina', 2, 'Photography', 6, 200, 'Plateau', 'male', 'profile_photos/img-20191124-091217-0-1575011560261.jpg', 3, 0, 0, NULL, NULL, 'b30f764854e45d256ff8c60f5bd34d85afd035e4', 'geoffre', NULL, 0, 9, '$2y$10$aejswduK39pvMOHjGbd5au3GvyoY8dQQekZX6u0vJYIfyZS5pR3By', NULL, '2019-11-29 13:05:40', '2019-12-01 05:00:00'),
(257, 'Isiya', 'Mubarak', 'www.isiyamubarak1995@gmail.com', 'No 30 Aba street wadata makurdi Benue state', '1995-08-12', 'Katsina', '08137328296', 'Abduljabbar', '07082227208', 'Katsina', 3, '10000', 36, 200, 'BENUE', 'male', 'profile_photos/img-20191216-wa0007.jpg', 1, 1, 0, NULL, '2019-12-16 16:29:29', '268ab62e059d9f7ad8fbf9162005cfa22dd1b152', 'wwwisi', NULL, 0, 10, '$2y$10$QHCTJQ7PDVTPQnTiZqjum.6hr/Uy82vWQsePHielWFyZsEXGFLl7q', NULL, '2019-12-16 16:22:36', '2020-01-01 05:00:00'),
(254, 'rahmat', 'muhammed', 'muhamedrahmato@gmail.com', '24,lambe street off pako bus/stop', '1995-02-28', 'kogi', '07018188436', 'muhammed sodiq', '08124220701', 'kogi', 3, 'cosmetics', 6, 200, 'Lagos', 'female', 'profile_photos/rahamat-1.jpg', 2, 1, 0, NULL, '2019-12-02 20:48:04', '113b78b4037ba11a11ea25c152725415b6f352e8', 'muhamed', NULL, 0, 10, '$2y$10$dGnEcRJv8vgRJ9AaOwV79epo00jFYgMbiOjVxI7Oest950UnstAjG', NULL, '2019-12-02 20:47:16', '2020-01-01 05:00:00'),
(252, 'ASHIMOLOWO', 'COMFORT', 'comyashimolowo@gmail.com', 'House 2, 1st Avenue peace estate, baruwa lpaja, Lagos', '1977-03-28', 'EDO', '08051119539', 'SEUN ASHIMOLOWO', '08030812841', 'OGUN', 1, 'production', 18, 200, 'Lagos', 'female', 'profile_photos/20190908-142628-1.jpg', 3, 1, 0, NULL, '2019-12-02 20:04:44', '0418806ca0c49941d6f4a07ed65472990d120045', 'comyash', NULL, 0, 10, '$2y$10$ApAjBkkBFm0YvpC3OfzzP.CFV5hrCqbnViwfLHNmPBREjE6E/a0tS', NULL, '2019-12-02 19:40:34', '2020-01-01 05:00:00'),
(258, 'Oyindamola', 'babatunde', 'Oyindamala@gmail.com', 'Near karmanje filing station jabiri funtua katsina state', '1999-04-14', 'Kogi', '07064284341', 'Aderonke', '07068872317', 'Kogi', 3, 'Buying and selling', 24, 200, 'Katsina', 'female', 'profile_photos/img-20191215-134000.jpg', 1, 1, 405, NULL, '2019-12-16 17:12:09', '00c6cc35db45e5ec9a6b82cb158dae5797315489', 'oyindam', NULL, 0, 10, '$2y$10$Kyvv1fKs3RvWSS0Vs7lkJebPZb/UeqfOV6/fLV7ZzKOs4QillYQs6', NULL, '2019-12-16 17:04:14', '2020-01-01 05:00:00'),
(259, 'Yusuf', 'Abdulaziz', 'yusufabdullazeezsulaiman5@gmail.com', 'No 54, tudun wada funtua', '1995-06-10', 'Katsina', '08027405529', 'Bashir Abulaziz', '07066664452', 'Lagos', 4, 'Poutry farm', 60, 1000, 'Katsina', 'male', 'profile_photos/inbound5058988451317212499.jpg', 1, 1, 0, NULL, '2019-12-20 17:53:15', '5da627e01be1ff4783f1f96ea1c7d5ecaeb5f5ec', 'yusufab', NULL, 0, 10, '$2y$10$5MNiVFHEr5ZwA0g1ne9sPu0lYfUL8Pycwu5flMDlHoQ95eZ/LmxBe', NULL, '2019-12-20 17:50:42', '2020-01-01 05:00:00'),
(260, 'Kamaladdin', 'Abdulrashid', 'kamalgee21@gmail.com', 'Unguwar kashe naira dutsinma', '1989-12-23', 'Katsina', '08138146398', 'Abdulrashid badamasi kunduri', '08145151959', 'Katsina', 4, 'Bee farming', 60, 1000, 'Katsina', 'male', 'profile_photos/inbound6328538349530340488.jpg', 1, 1, 0, NULL, '2019-12-20 19:44:16', '67bbd761f5653e13b18e20a94632b3c80b17a557', 'kamalge', NULL, 0, 10, '$2y$10$sHqcOEkLbgBskxalZZUhBOuRcV9.YMefUv/y1e6wZ4mzUB9xDj1AW', NULL, '2019-12-20 19:40:41', '2020-01-01 05:00:00'),
(261, 'Felix', 'Ebuka', 'ebukafelix28@gmail.com', '12,alafia street olambe, off giwa-oke are roadogun state', '1997-09-28', 'Lagos', '08114946485', 'Felix divine', '08080338934', 'Lagos', 2, 'Photography and media', 6, 200, 'Lagos', 'male', 'profile_photos/img-20191223-112945-4.jpg', 2, 1, 0, NULL, '2020-01-02 05:20:41', '2ebe345e65b9bd89f1e64861563d6a5ba2ef1b32', 'ebukafe', NULL, 0, 11, '$2y$10$SP35NgMgorwVSp5W/opSr.BE.2cLmZryJAmFof6mQDDdsdgPrRb4G', NULL, '2020-01-02 05:20:09', '2020-02-01 05:00:00'),
(262, 'Soliu', 'Ayomide', 'soliuayomide2525@gmail.com', '27, modupe ayoade street Araromi iyanapaja Lagos', '1998-12-04', 'Ogun', '08089092393', 'Latif lekan', '08029365903', 'Ogun', 3, 'Goods', 24, 200, 'Lagos', 'male', 'profile_photos/screenshot-20200109-200232.png', 1, 1, 0, NULL, '2020-01-10 00:07:34', 'e9a4cb7e092662f12d23dd4c0e594dbb2e710f11', 'soliuay', NULL, 0, 11, '$2y$10$LOkeBBaO1OIObLYMAdUkK.SRL1Dn2jZY70DufAGtPeKWMJ/.S.4ES', NULL, '2020-01-10 00:04:59', '2020-02-01 05:00:00'),
(263, 'Erinfolami', 'Ibrahim', 'erinfolamioladimeji2410@gmail.com', '18,Malik street Aleniboro \nOff lubcon-wara road\nIlorin \nKwara state', '2002-10-24', 'Ogun', '08025362951', 'Erinfolami Ridwan', '08071219837', 'Ogun', 2, NULL, 6, 200, 'Kwara', 'male', 'profile_photos/img-20191224-103207.jpg', 2, 1, 0, NULL, '2020-01-10 02:14:00', '7d7841aca54becea1bab43e4370b247db2261660', 'erinfol', 'soliuay', 0, 11, '$2y$10$Ow9XcH3uTbh4FQyJDy9wWO8.WLxJ3eGLMGC8FqZRSOyrDnYdIvZ92', NULL, '2020-01-10 02:10:28', '2020-02-01 05:00:00'),
(264, 'Shamsudeen', 'Opeyemi', 'sulaimonopeyemi360@gmail.com', '5, engr laide adekoya crescent aminkanle alagbado', '1998-11-01', 'Ogun', '07067017535', 'Sulyman baliqees', '08068620278', 'Ogun', 3, 'Goods', 24, 200, 'Lagos', 'male', 'profile_photos/screenshot-20200111-1402422.png', 1, 1, 0, NULL, '2020-01-11 18:10:35', 'e841a096ae8b1bfdf36c4254a0ed02ac4bb9392c', 'sulaimo', 'soliuay', 0, 11, '$2y$10$G0tPsqpKg42GS7ch4HALyO8sYuJVJD5osq0B29Dnq19CeAX/Ywhi2', NULL, '2020-01-11 18:07:18', '2020-02-01 05:00:00'),
(265, 'Success', 'Ofili', 'Ofilisuccess01@gmail.com', '5 Bolanta street Fate Tanke Ilorin Kwara State', '1995-01-26', 'Delta', '08185945410', 'Olaosebikan Akinola', '08136247583', 'Kwara', 2, 'Selling of consumables', 48, 200, 'Kwara', 'female', 'profile_photos/img-20200122-121214.jpg', 1, 1, 0, NULL, '2020-02-04 22:45:50', '4167a2ae1724eb8e5df5d8f66c30229f4f50cf36', 'ofilisu', NULL, 0, 12, '$2y$10$YJIMiQRkgKtcwLKQN6VeSe4e0xPC2jsOOLhasnKRPEoW0Q1uC91.S', 'JAmpETjapUqErq1HgjcEwB1lWBf8UKWmK2NOpzpQ7uUYP3EEJ24nokzuJugK', '2020-02-04 22:44:57', '2020-05-12 23:19:35'),
(266, 'Isyaku', 'Galadima', 'isyakugaladima149@gmail.com', 'Dala', '2000-02-13', 'Kano', '07035918074', 'Kasim', '07035918074', 'Kano', 3, 'Selling', 36, 1000, 'Kano', 'male', 'profile_photos/57a3f1f1-75cf-4cad-a381-5ec49593bf86.png', 3, 0, 0, NULL, NULL, '44d59417c8bbda69f063e7b9f189684f3db29854', 'isyakug', NULL, 0, 12, '$2y$10$3jkWjWS3Yl5NHjBQwLuYlOUoLtNbZ25yaP8GxNP8vkTpYSpfr0nVi', NULL, '2020-02-05 08:19:55', '2020-05-12 23:19:35'),
(267, 'Adeniyi', 'Abosede', 'adeniyibsd@gmail.com', 'opeki ipaja lagos', '1993-01-01', 'kogi', '08167943150', 'Adeniyi Elizabeth', '08075879973', 'Kog', 1, NULL, 6, 200, 'Lagos', 'female', 'profile_photos/10-1.png', 3, 1, 0, NULL, '2020-02-05 19:59:48', 'd8084aba833370bf9cf19fc3714296990a047f57', 'adeniyi', NULL, 0, 12, '$2y$10$pfRcS87soM7Uflc1S7gcFuzv7UObfS0qJTS3U1OGpd8e8tMdF09zO', NULL, '2020-02-05 19:35:15', '2020-05-12 23:19:35'),
(268, 'Dorcas', 'Animashaun', 'animashaundorcas122@gmail.com', '52 Kaka Zone 2, Ayobo, Lagos', '1995-05-08', 'Ogun', '09079422217', 'Mrs Animashaun', '09079422217', 'Grace', 2, NULL, 36, 200, 'Lagos', 'female', 'profile_photos/f4733e8b-c887-4078-a4bc-2edc4858a8dc.jpeg', 1, 1, 0, NULL, '2020-02-08 09:16:42', '81de786c04892f5f752f51c363f0148ac6b79b48', 'animash', NULL, 0, 12, '$2y$10$sqgFAf6.xqDDNDTbQUXYouMXAkhLspmxEBZucYwTaQmxjervM7lMe', 'T7UCZjiYTyqeSIZHl19QZueGADv9NuuqEk91WWku06c7DMGWq2Li8wQQTObp', '2020-02-08 09:15:20', '2020-05-12 23:19:35'),
(269, 'Ibrahim', 'Muhammad', 'ibrahimmuhammadgelwasa@gmail.com', 'Kebbi', '1999-05-24', 'Kebbi', '08161780089', 'Abdulrahman', '07033294954', 'Kebbi', 3, 'Yes', 12, 500, 'Wasagu', 'male', 'profile_photos/img-20191215-105517-32.jpg', 2, 1, 0, NULL, '2020-02-09 11:37:02', 'fe294a5532f53df6b3eb3d4a7d3d11b1fda0e156', 'ibrahim-3', NULL, 0, 12, '$2y$10$k805y/lgw182m23SBdZ8ve5jj6WlJsFNTwjgjqc1JWsLeog/vpi/2', NULL, '2020-02-09 11:31:11', '2020-05-12 23:19:35'),
(270, 'Sadiq', 'Abubakar', 'sadiqalia44@gmail.com', 'Unimaid staff quarters', '2001-08-08', 'Borno', '08025867124', 'Sadiq Abubakar', '08025867124', 'Borno', 1, 'Software engineer', 12, 1000, 'Borno', 'male', 'profile_photos/received-164020991585128-1580755903660.jpg', 1, 1, 0, NULL, '2020-02-10 00:38:12', 'fa5af56174b6589f17ed465f6c704a1e7b58142a', 'sadiqal', NULL, 0, 12, '$2y$10$QIpOjvWO.ww3vTU/15mKdOZ.zw2nC4ywEuXk0NArVn2pMv/Sv5LuG', NULL, '2020-02-10 00:37:32', '2020-05-12 23:19:35'),
(271, 'Victor', 'James', 'Robinboy010@gmail.com', 'No 41b memudu bada street Ikotun,Lagos.', '1997-09-13', 'Benue', '09093983382', 'James christiana', '08165646730', 'Sibling', 1, 'Fashion design', 12, 500, 'Lagos', 'male', 'profile_photos/fb-img-1579711602921.jpg', 3, 0, 0, NULL, NULL, '52edeced221422e45a1827bf49d25b7022f546b3', 'robinbo', NULL, 0, 12, '$2y$10$hrtGA52ZkQNyl136J9XoROYvG5Wcd.LQL2y41iY0Mm5vdFov87/FW', NULL, '2020-03-06 03:01:59', '2020-05-12 23:19:35'),
(272, 'Oladele', 'Ola', 'oladelehz@gmail.com', '4, Aduralebo street, Ofatedo, Osogbo', '1980-11-06', 'Osun', '08037204695', 'Julianah Ola', '08066476857', 'Osun', 2, 'Digital and Affiliate marketing', 12, 200, 'Osun', 'male', 'profile_photos/fb-img-15631170930244976.jpg', 3, 0, 0, NULL, NULL, 'e4e32b7ffb8179972fcc154a0048ff3700e129e7', 'oladele', NULL, 0, 12, '$2y$10$sSvGWpmyQtLyqYuvrIVWs.ToI36RJIyakOq6hR0xjQUPrhq8KfGOi', NULL, '2020-03-07 16:12:22', '2020-05-12 23:19:35'),
(273, 'Amba', 'Micheal', 'michealamba0@gmail.com', '16,adebayo ajayi street,igando Lagos state', '1998-07-03', 'C', '08107100719', 'Atim amba', '08107100719', 'L', 3, 'Buying of cloths', 36, 200, 'L', 'male', 'profile_photos/img-20200301-wa0058.jpg', 1, 0, 0, NULL, NULL, 'ca423eff83b9c8507551c8966f7740736d1a0053', 'micheal', NULL, 0, 12, '$2y$10$X6bDFc45.xzSAaxWoNqEf.DHAGwxqkzpmPU/IbK7kkBHQbFlYhPRO', NULL, '2020-03-09 18:43:08', '2020-05-12 23:19:35'),
(274, 'Sodiq', 'Oseni', 'osenisodiq4all@yahoo.com', '90, agege motor road, mushing lagos', '1991-06-22', 'Ogun', '08169181532', 'Oseni azeez', '08184798413', 'Ogun', 3, 'Lighting & beautification', 12, 500, 'Lagos', 'male', 'profile_photos/img-20200206-183354.jpg', 3, 0, 0, NULL, NULL, '8b2d111b980ae50a1ade9e5915f34ad7af5c53ae', 'oseniso', NULL, 0, 12, '$2y$10$KQ2uQgQlIDK8uIVJ5IQC1.7nzG2yw5Ar9tgC44O48DFl2/ex6FQ22', NULL, '2020-03-09 18:44:00', '2020-05-12 23:19:35'),
(277, 'O', 'F', 'owonibifortune06@gmail.com', 'No 16 olushola street ogun state', '1999-06-16', 'K', '08134873277', 'Owonibi Blessing', '09060516052', 'Ko', 3, 'For promotion', 24, 1000, 'L', 'female', 'profile_photos/7c5c4509-cd35-492e-a435-02778257b4c6.jpeg', 3, 0, 0, NULL, NULL, '668312ef977e105c2e3976f3bfeb449da5528d6e', 'owonibi', NULL, 0, 12, '$2y$10$sIb9FjvI6F.yZ78q9.VoY.xHzIZqLOcvFYSCaq4zsAppgz.K5d5z6', NULL, '2020-03-12 12:02:45', '2020-05-12 23:19:35'),
(276, 'Omobola', 'Odeyale', 'Olakunleoye1997@gmail.com', '17a bode edun alagbole ojodu Berger', '1998-07-16', 'Ogun', '08058803826', 'Mrs odeyale', '07035359061', 'Bayelsa', 4, 'Crop farming', 12, 200, 'Lagos', 'male', 'profile_photos/fb-img-15444381214943572.jpg', 1, 0, 0, NULL, NULL, 'ea4636dc567a453db5c376b173834fe2067513bf', 'olakunl', NULL, 0, 12, '$2y$10$ahMbPGafiVc3/64XZGwMZ.Uj1z9EbQUM09Vo3oHu62qpDjyXvYvcy', NULL, '2020-03-10 03:58:56', '2020-05-12 23:19:35'),
(278, 'adeniran', 'sulaimon', 'adeniransulaimon29@gmail.com', '34, olaniyi street, idi oro, mushin, lagos', '2001-01-07', 'oyo', '08084671004', 'adeniran quam', '08097368283', 'oyo', 3, 'import and export', 12, 500, 'lagos', 'male', 'profile_photos/75233512-545152066281656-1245384754556043264-n.jpg', 1, 0, 0, NULL, NULL, '1b24befc52768e9b62df65819de069a41fda88b3', 'adenira', NULL, 0, 12, '$2y$10$CZa2g498h5dTyeDUsw6hz.hYKA/PF1MgT9sugqt2lQofiAk.rIh/G', NULL, '2020-03-12 18:49:46', '2020-05-12 23:19:35'),
(279, 'AYODELE', 'Tomilola', 'ayodeleomotolanitomilola@gmail.com', 'No 12,lokotuma street, Adehun Ado Ekiti', '1992-12-12', 'Ekiti', '08105561238', 'Ayodele folasade', '08164759800', 'Ekiti', 3, '2%', 48, 200, 'Ado', 'female', 'profile_photos/inbound5876323378983840934.jpg', 1, 0, 0, NULL, NULL, '70be931a64cf6e16cd02284fe903e17e90d8af89', 'ayodele', NULL, 0, 12, '$2y$10$SNxFmfalN8K0Qq.hinPiLe2UYp1Csr0u7kbjv.BDLAuyjWzEiuK/C', NULL, '2020-03-15 00:03:07', '2020-05-12 23:19:35'),
(280, 'Seun', 'Ashii', 'seun.mysurebiz@gmail.com', '12 ipaja', '1980-05-19', 'Ogun', '08030812841', 'Commy', '08063801443', 'Shshsh', 3, 'Fishing', 6, 500, 'Lagos', 'male', 'profile_photos/img-20200316-151349.jpg', 2, 0, 0, NULL, NULL, '742f8796e82168237c3bff2d88233d9fbf4e2d46', 'seunmy', NULL, 0, 12, '$2y$10$aPfLsIUNT1OtyAl/6u4R.uU6xVAzJkMsNgun59HOhRd6SyTvEvItm', NULL, '2020-03-20 23:24:44', '2020-05-12 23:19:35'),
(281, 'Adaeze', 'Okwuoma', 'glory.tkd@gmail.com', '1, Kunle Ogunlade Street Beside Ibeju Lekki L.G. Secretariat Igando Oloja, Along Ajah Epe Expressway', '1992-12-11', 'Lagos', '08037208805', 'Stanley Eze', '08069180320', 'Lagos', 2, 'AmacollHomes & Gardens', 12, 1000, 'Lagos', 'female', 'profile_photos/facebook.png', 3, 0, 0, NULL, NULL, 'c76fc213d81d754161caa7ad861ec030b381a10e', 'gloryt', NULL, 0, 12, '$2y$10$PTGpT8F1E5rBgBuWwf09q.7xuawSM37/hMDND8nFqoJtEyMGrq.Py', NULL, '2020-04-12 15:40:48', '2020-05-12 23:19:35'),
(283, 'Grace', 'Anuoluwapo', 'gracepweety111@gmail.com', '2,messiah avenue ayetoro, ogun state', '1995-05-11', 'osun', '09038612884', 'grace', '08163084780', 'ogun', 3, 'Buying and selling', 6, 200, 'Ayetoro', 'female', 'profile_photos/beautyplus-20200506101401-fast1.jpg', 2, 1, 0, NULL, '2020-05-19 16:50:59', '98c22df15e9bae6b3ea6183f47d423d5c6ca134a', 'gracepw', NULL, 0, NULL, '$2y$10$L7lIL3RRn/Kb2G7it8Jlyeiw0uOxQjcSIyuTxFMDIHbBfNRzBM9mO', 'dyJpskQemGcas5VcfHvTZuaBhcvSAEtsFmXT2hkQYelZzvXkVZXPeC6Ky8EH', '2020-05-19 16:18:59', '2020-05-19 16:50:59'),
(284, 'Elizabeth', 'Temilade', 'temi.mysurebiz@gmail.com', 'kolabe Ayetoro Compliment Roqad Ayobo Lagos', '1995-01-11', 'osun', '09031568027', 'Patrick Susan  Oluwatomiyin', '08156998702', 'Edo', 3, 'Buying and selling', 6, 200, 'Ayetoro', 'female', 'profile_photos/s-71.jpg', 3, 0, 0, NULL, NULL, 'e7ff1de7928fbf52fc2d8275d49dec1e02ae6bf0', 'temimy', NULL, 0, NULL, '$2y$10$7hRkqRdOosBUwi6yhr0YZOWKkdZGv48qKanOjLY5oHRSvFUlhLlzC', NULL, '2020-05-25 20:48:15', '2020-05-25 20:48:15'),
(285, 'Joseph', 'Olamide', 'olamidejoseph086@gmail.com', 'Lagos', '2003-10-10', 'Lagos', '09045468153', 'Mr joseph', '08105853325', 'Lagos', 2, 'A lot', 12, 200, 'Lagos', 'male', 'profile_photos/20200522-165242.jpg', 1, 0, 0, NULL, NULL, 'ff6625f40642709748e51c04a652961cf63779b2', 'olamide', NULL, 0, NULL, '$2y$10$q03mF.KOYufQ2m6OYRuYFOMONzhHyC.a.p4agy6w/qjRYKqwS.6d2', NULL, '2020-06-01 18:35:57', '2020-06-01 18:35:57'),
(286, 'Coleman', 'Godseal', 'cgodseal@gmail.com', '12b Igesu road Ayobo Lagos', '2002-06-08', 'Imo', '08087353423', 'Emmanuella Coleman', '08075839104', 'Imo', 2, 'Agriculture', 36, 200, 'Lagos', 'male', 'profile_photos/screenshot-2020-04-16-11-46-20.png', 3, 0, 0, NULL, NULL, '4ab536e17cb64636d151b2df67abbbc0f5f12467', 'cgodsea', NULL, 0, NULL, '$2y$10$AMtITDgkmNwqw7UoCapCCuvLWswAMIvFOHOLBQnr.bdTB80BE9Fm2', NULL, '2020-08-04 00:51:49', '2020-08-04 00:51:49');

-- --------------------------------------------------------

--
-- Table structure for table `users_message_deletes`
--

CREATE TABLE `users_message_deletes` (
  `mail_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_message_deletes`
--

INSERT INTO `users_message_deletes` (`mail_id`, `user_id`, `created_at`, `updated_at`) VALUES
(13, 90, '2019-04-10 16:13:30', '2019-04-10 16:13:30'),
(15, 87, '2019-04-11 16:27:30', '2019-04-11 16:27:30'),
(11, 90, '2019-04-13 14:29:25', '2019-04-13 14:29:25');

-- --------------------------------------------------------

--
-- Table structure for table `users_welcome_notes`
--

CREATE TABLE `users_welcome_notes` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `welcome_note_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_welcome_notes`
--

INSERT INTO `users_welcome_notes` (`id`, `user_id`, `welcome_note_id`, `created_at`, `updated_at`) VALUES
(2, 91, 1, NULL, NULL),
(3, 95, 1, NULL, NULL),
(4, 97, 1, NULL, NULL),
(5, 98, 1, NULL, NULL),
(6, 99, 1, NULL, NULL),
(7, 100, 1, NULL, NULL),
(8, 101, 1, NULL, NULL),
(9, 110, 1, NULL, NULL),
(10, 114, 1, NULL, NULL),
(11, 117, 1, NULL, NULL),
(12, 122, 1, NULL, NULL),
(13, 121, 1, NULL, NULL),
(14, 126, 1, NULL, NULL),
(15, 127, 1, NULL, NULL),
(16, 129, 1, NULL, NULL),
(17, 131, 1, NULL, NULL),
(18, 128, 1, NULL, NULL),
(19, 134, 1, NULL, NULL),
(20, 157, 1, NULL, NULL),
(21, 158, 1, NULL, NULL),
(22, 125, 1, NULL, NULL),
(23, 161, 1, NULL, NULL),
(24, 165, 1, NULL, NULL),
(25, 166, 1, NULL, NULL),
(26, 167, 1, NULL, NULL),
(27, 168, 1, NULL, NULL),
(28, 169, 1, NULL, NULL),
(29, 171, 1, NULL, NULL),
(30, 173, 1, NULL, NULL),
(31, 176, 1, NULL, NULL),
(32, 177, 1, NULL, NULL),
(33, 179, 1, NULL, NULL),
(34, 180, 1, NULL, NULL),
(35, 181, 1, NULL, NULL),
(36, 178, 1, NULL, NULL),
(37, 182, 1, NULL, NULL),
(38, 183, 1, NULL, NULL),
(39, 185, 1, NULL, NULL),
(40, 186, 1, NULL, NULL),
(41, 187, 1, NULL, NULL),
(42, 188, 1, NULL, NULL),
(43, 189, 1, NULL, NULL),
(44, 191, 1, NULL, NULL),
(45, 192, 1, NULL, NULL),
(46, 193, 1, NULL, NULL),
(47, 194, 1, NULL, NULL),
(48, 195, 1, NULL, NULL),
(49, 196, 1, NULL, NULL),
(50, 197, 1, NULL, NULL),
(51, 199, 1, NULL, NULL),
(52, 201, 1, NULL, NULL),
(53, 202, 1, NULL, NULL),
(54, 200, 1, NULL, NULL),
(55, 203, 1, NULL, NULL),
(56, 207, 1, NULL, NULL),
(57, 208, 1, NULL, NULL),
(58, 210, 1, NULL, NULL),
(59, 212, 1, NULL, NULL),
(60, 214, 1, NULL, NULL),
(61, 136, 1, NULL, NULL),
(62, 215, 1, NULL, NULL),
(63, 216, 1, NULL, NULL),
(64, 217, 1, NULL, NULL),
(65, 218, 1, NULL, NULL),
(66, 220, 1, NULL, NULL),
(67, 221, 1, NULL, NULL),
(68, 222, 1, NULL, NULL),
(69, 223, 1, NULL, NULL),
(70, 224, 1, NULL, NULL),
(71, 225, 1, NULL, NULL),
(72, 227, 1, NULL, NULL),
(73, 228, 1, NULL, NULL),
(74, 231, 1, NULL, NULL),
(75, 232, 1, NULL, NULL),
(76, 235, 1, NULL, NULL),
(77, 236, 1, NULL, NULL),
(78, 237, 1, NULL, NULL),
(79, 242, 1, NULL, NULL),
(80, 250, 1, NULL, NULL),
(81, 252, 1, NULL, NULL),
(82, 254, 1, NULL, NULL),
(83, 255, 1, NULL, NULL),
(84, 256, 1, NULL, NULL),
(85, 257, 1, NULL, NULL),
(86, 258, 1, NULL, NULL),
(87, 259, 1, NULL, NULL),
(88, 260, 1, NULL, NULL),
(89, 261, 1, NULL, NULL),
(90, 262, 1, NULL, NULL),
(91, 263, 1, NULL, NULL),
(92, 264, 1, NULL, NULL),
(93, 265, 1, NULL, NULL),
(94, 267, 1, NULL, NULL),
(95, 268, 1, NULL, NULL),
(96, 269, 1, NULL, NULL),
(97, 270, 1, NULL, NULL),
(98, 283, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `welcome_notes`
--

CREATE TABLE `welcome_notes` (
  `id` int(10) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `welcome_notes`
--

INSERT INTO `welcome_notes` (`id`, `content`, `video`, `created_at`, `updated_at`) VALUES
(1, '<p><span style=\"color: black;\">Welcome to </span><strong style=\"color: rgb(178, 107, 0);\">MYSUREBIZ</strong><span style=\"color: rgb(178, 107, 0);\">,</span><span style=\"color: black;\"> the biggest all encompassing business empowerment platform. My name is Seun Ashimolowo, I am one of the team off resource persons that will be showing and leading you through the part to fulfill your business dreams. The purpose of this correspondence is to prepare you for the journey ahead. So please read it carefully. You should also view the video posted to prepare your mind for this program. This platform provides you with advance business information, training, mentorship and business start-up management skills that are needed to become a business owner. </span></p><p class=\"ql-align-justify\"><br></p><p><span style=\"color: black;\">The training and lessons on your potential business will be done online which means you will be attending your class at schedule period here on your dashboard as synchronized with your training period *please see the FAQs on the website to see your training period in line with your duration* you are expected to attend each training and lesson which is equally provided in downloadable format, view the applicable video, do and submit the action steps appropriately</span></p><p class=\"ql-align-justify\"><br></p><p><span style=\"color: black;\">The first question I like to ask you is </span><strong style=\"color: black;\">WHY ARE YOU HERE?</strong></p><p class=\"ql-align-justify\"><br></p><p><span style=\"color: black;\">Am sure you will want to say you are here because you have strong quest to start your own business and become a successful entrepreneur and </span><span style=\"color: rgb(178, 107, 0);\">MYSUREBIZ </span><span style=\"color: black;\">assures to help you achieve this desire. Well that is true but not enough answer.</span></p><p class=\"ql-align-justify\"><br></p><p><span style=\"color: black;\">You might need to know that The poverty rate in Nigeria rises to 61% as at 2018, the implication of this is that over 112 million people are living below poverty line and there is possibility for the figure to increase in another few years, this is an indications that many more student might be out of school without jobs and many staff losing their jobs as many companies shrinks, in the midst of this, there is need for you to consider being in charge of your financial system so that you won’t add up to the rising poverty density or as the case maybe reduce the growing population.</span></p><p class=\"ql-align-justify\"><br></p><p><span style=\"color: black;\">I need to assure you that you have exit yourself from the future failure by using this platform because the platform will give you opportunity to determine your hope as it hold the promise to help you start that dream business with 50% cash back Guarantied. </span></p><p class=\"ql-align-justify\"><br></p><p><span style=\"color: black;\">I need to also let you know that you have no limitation to the business you can start on this platform, do your potential so big that you dream to manufacture cars, aircraft, computers, TV set, phones, fans, name your own idea or your dream is to start a business like fashion designing, head dresser, auto mechanic, farming, production etc as long as is under this three categories of business: Manufacturing, Servicing and Merchandising this platform will give you 100% support you need to achieve the dream</span></p><p class=\"ql-align-justify\"><br></p><p><span style=\"color: black;\">At appropriate time we will deploy to you an expert in your line of business who will guide you in building your pilot product or practically mentor you on the service you are planning to start. Contact of the expert will be send to your dashboard when due, you can call your mentor at any working hours to meet with him for practical experience, if your product is not movable your expert will come over to help you out without any charges, all charges have been paid up by Mysurebiz</span></p><p class=\"ql-align-justify\"><br></p><p><span style=\"color: black;\">Your registration to Mysurebiz is the first best and giant step you have ever made to reach your business goal, I will want you to know that it doesn’t end just registering, you need to begin the move by attending training provided to you on this dashboard and make sure you perform every action step and submit it appropriately to assure your attendance for that period and keep doing this for the span of training period, alongside this, you should start paying that token for yourself here by just clicking on \'Pay Penny on the menu. This will sure enable you to becoming a business owner immediately you are done with your training program.</span></p><p class=\"ql-align-justify\"><br></p><p><span style=\"color: black;\">I need to clearly inform you that if you only pay without attending the class you will be deactivated at the end of three month and pay you off with a fine and if you are only attending the class without keeping token for yourself it will also jeopardize your chances of starting your business when you finished your program with us and sure you will not be eligible to benefit our start up fund.</span></p><p class=\"ql-align-justify\"><br></p><p><span style=\"color: black;\">Moreover, Mysurebiz will make it possible for you to start up a small or big business without limitation of startup capital which most time mark the stop point for many business aspirations. Therefore I encourage you to think big</span></p><p class=\"ql-align-justify\"><br></p><p><span style=\"color: black;\">This platform after completing your commitment to your business dream provides Business Start-up Fund (BSF) up to </span><strong style=\"color: black;\">N20,000,000 (Twenty Million Naira) at 0% interest</strong><span style=\"color: black;\"> to start that business. To be eligible for this fund, you will</span></p><p class=\"ql-align-justify\"><span style=\"color: black;\">need to satisfy the </span><strong style=\"color: rgb(153, 102, 0);\">5 Golden Rule</strong><span style=\"color: black;\"> stated bellow</span></p><p class=\"ql-align-justify\"><br></p><p><span style=\"color: rgb(153, 102, 0);\">1.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span><strong style=\"color: rgb(153, 102, 0);\">You must be an activated registered Mysurebiz user to either of the three categories with accredited business set.</strong></p><p><br></p><p><strong style=\"color: rgb(153, 102, 0);\">2.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; You must complete and present Mysurebiz directed business plan and must be approved by Mysurebiz Jury when completed your training.</strong></p><p><br></p><p><strong style=\"color: rgb(153, 102, 0);\">3.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; You must paid up your training fee 100% in Penny Wise of your choice; this is in respect of the category of your participation. </strong></p><p><br></p><p><strong style=\"color: rgb(153, 102, 0);\">4.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; You must attend Mysurebiz on line lecture and submit your Action Steps back to back 100% without any default</strong></p><p><br></p><p><strong style=\"color: rgb(153, 102, 0);\">5.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; You must complete and present your functional pilot product /services at the end of your program and must be approved by Mysurebiz Jury </strong></p><p class=\"ql-align-justify\"><br></p><p><span style=\"color: black;\">So you see you have no limitation and your destiny is in your hand to be what you wanna be</span></p><p><br></p><p class=\"ql-align-justify\"><span style=\"color: black;\">One big weapon you need to deploy is determination and I CAN mindset. It is said that there is no impossibility for a determined mind and there is no limitation for I can do it spirit. Visualize that business and keep seeing yourself on the MD seat </span></p><p class=\"ql-align-justify\"><span class=\"ql-cursor\">﻿﻿﻿</span></p><p><span style=\"color: black;\">I want you to clearly state what could stop you to achieve this goal and daily declare that you can’t be stopped by them, make sure you don’t declare your mission with people that will discourage you, don’t walk with people that are not going same direction with you because they will either slow you down or distract your attention</span></p><p class=\"ql-align-justify\"><br></p><p><span style=\"color: black;\">Feel free to ask our customer care any question or get clarification on any issue regards Mysurebiz services and I will equally be here to help you 24/7.</span></p><p class=\"ql-align-justify\"><br></p><p><span style=\"color: black;\">I wish you</span></p><p class=\"ql-align-justify\"><span style=\"color: black;\">best of luck</span></p><p class=\"ql-align-justify\"><br></p><p><span style=\"color: black;\">Best Regard&nbsp;</span>																		<span style=\"color: black;\">&nbsp;</span></p><p><br></p><p><strong style=\"color: black;\"><span class=\"ql-cursor\">﻿﻿</span></strong><strong style=\"color: rgb(153, 102, 0);\">Seun Ashimolowo</strong></p><p>	</p>', 'https://www.youtube.com/embed/1Ru2DucP2A8', '2019-05-17 04:00:00', '2019-12-10 02:48:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD UNIQUE KEY `admins_users_id_unique` (`users_id`);

--
-- Indexes for table `artisans`
--
ALTER TABLE `artisans`
  ADD UNIQUE KEY `artisans_users_id_unique` (`users_id`);

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assignments_user_id_foreign` (`user_id`),
  ADD KEY `assignments_course_id_foreign` (`course_id`),
  ADD KEY `assignments_lesson_id_foreign` (`lesson_id`);

--
-- Indexes for table `batches`
--
ALTER TABLE `batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_categories`
--
ALTER TABLE `business_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `courses_url_unique` (`url`),
  ADD KEY `courses_users_id_foreign` (`users_id`);

--
-- Indexes for table `courses_progress`
--
ALTER TABLE `courses_progress`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courses_progress_user_id_foreign` (`user_id`),
  ADD KEY `courses_progress_course_id_foreign` (`course_id`);

--
-- Indexes for table `course_business_categories`
--
ALTER TABLE `course_business_categories`
  ADD KEY `course_business_categories_business_category_id_foreign` (`business_category_id`),
  ADD KEY `course_business_categories_course_id_foreign` (`course_id`);

--
-- Indexes for table `course_periods`
--
ALTER TABLE `course_periods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `ebooks`
--
ALTER TABLE `ebooks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ebook_sales`
--
ALTER TABLE `ebook_sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD UNIQUE KEY `employees_users_id_unique` (`users_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lessons_users_id_foreign` (`users_id`),
  ADD KEY `lessons_course_id_foreign` (`course_id`);

--
-- Indexes for table `lessons_progress`
--
ALTER TABLE `lessons_progress`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lessons_progress_user_id_foreign` (`user_id`),
  ADD KEY `lessons_progress_lesson_id_foreign` (`lesson_id`);

--
-- Indexes for table `library`
--
ALTER TABLE `library`
  ADD PRIMARY KEY (`id`),
  ADD KEY `library_user_id_foreign` (`user_id`),
  ADD KEY `library_course_id_foreign` (`course_id`),
  ADD KEY `library_lesson_id_foreign` (`lesson_id`);

--
-- Indexes for table `library_business_categories`
--
ALTER TABLE `library_business_categories`
  ADD KEY `library_business_categories_library_id_foreign` (`library_id`),
  ADD KEY `library_business_categories_business_category_id_foreign` (`business_category_id`);

--
-- Indexes for table `mailattachements`
--
ALTER TABLE `mailattachements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mailattachements_mail_id_foreign` (`mail_id`);

--
-- Indexes for table `mails`
--
ALTER TABLE `mails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mails_user_id_foreign` (`user_id`);

--
-- Indexes for table `mail_audiences`
--
ALTER TABLE `mail_audiences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mail_audiences_mail_id_foreign` (`mail_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_user_id_foreign` (`user_id`);

--
-- Indexes for table `read_mails`
--
ALTER TABLE `read_mails`
  ADD KEY `read_mails_user_id_foreign` (`user_id`),
  ADD KEY `read_mails_mail_id_foreign` (`mail_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD UNIQUE KEY `students_users_id_unique` (`users_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_business_category_id_foreign` (`business_category_id`),
  ADD KEY `batch_id` (`batch_id`);

--
-- Indexes for table `users_message_deletes`
--
ALTER TABLE `users_message_deletes`
  ADD KEY `users_message_deletes_mail_id_foreign` (`mail_id`),
  ADD KEY `users_message_deletes_user_id_foreign` (`user_id`);

--
-- Indexes for table `users_welcome_notes`
--
ALTER TABLE `users_welcome_notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_welcome_notes_user_id_foreign` (`user_id`),
  ADD KEY `users_welcome_notes_welcome_note_id_foreign` (`welcome_note_id`);

--
-- Indexes for table `welcome_notes`
--
ALTER TABLE `welcome_notes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `batches`
--
ALTER TABLE `batches`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `business_categories`
--
ALTER TABLE `business_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `courses_progress`
--
ALTER TABLE `courses_progress`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `course_periods`
--
ALTER TABLE `course_periods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `ebooks`
--
ALTER TABLE `ebooks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ebook_sales`
--
ALTER TABLE `ebook_sales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2327;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `lessons_progress`
--
ALTER TABLE `lessons_progress`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `library`
--
ALTER TABLE `library`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `mailattachements`
--
ALTER TABLE `mailattachements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mails`
--
ALTER TABLE `mails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `mail_audiences`
--
ALTER TABLE `mail_audiences`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=287;

--
-- AUTO_INCREMENT for table `users_welcome_notes`
--
ALTER TABLE `users_welcome_notes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `welcome_notes`
--
ALTER TABLE `welcome_notes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
