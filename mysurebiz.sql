-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 07, 2018 at 06:34 PM
-- Server version: 5.7.23-0ubuntu0.16.04.1
-- PHP Version: 7.1.17-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mysurebiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `users_id` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `function` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`users_id`, `function`, `created_at`, `updated_at`) VALUES
('12', 'employee', '2018-10-07 16:33:17', '2018-10-07 16:33:17'),
('28', 'artisan', '2018-10-07 16:33:59', '2018-10-07 16:33:59'),
('32', 'student', '2018-10-07 16:33:59', '2018-10-07 16:33:59'),
('36', 'superAdmin', '2018-10-07 16:34:00', '2018-10-07 16:34:00'),
('4', 'superAdmin', '2018-10-07 16:33:17', '2018-10-07 16:33:17'),
('8', 'employee', '2018-10-07 16:33:17', '2018-10-07 16:33:17');

-- --------------------------------------------------------

--
-- Table structure for table `artisans`
--

CREATE TABLE `artisans` (
  `users_id` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trade` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trade_acquisition_period` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `daily_penny_wise` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `artisans`
--

INSERT INTO `artisans` (`users_id`, `trade`, `trade_acquisition_period`, `daily_penny_wise`, `created_at`, `updated_at`) VALUES
('10', 'Iot', '10', '500', '2018-10-07 16:33:17', '2018-10-07 16:33:17'),
('14', 'Iot', '5', '400', '2018-10-07 16:33:18', '2018-10-07 16:33:18'),
('17', 'production', '8', '1000', '2018-10-07 16:33:18', '2018-10-07 16:33:18'),
('2', 'agriculture', '6', '300', '2018-10-07 16:33:16', '2018-10-07 16:33:16'),
('20', 'production', '7', '1000', '2018-10-07 16:33:18', '2018-10-07 16:33:18'),
('23', 'production', '5', '1000', '2018-10-07 16:33:19', '2018-10-07 16:33:19'),
('26', 'Iot', '2', '1000', '2018-10-07 16:33:59', '2018-10-07 16:33:59'),
('30', 'production', '2', '300', '2018-10-07 16:33:59', '2018-10-07 16:33:59'),
('34', 'Iot', '9', '700', '2018-10-07 16:34:00', '2018-10-07 16:34:00'),
('38', 'agriculture', '4', '600', '2018-10-07 16:34:00', '2018-10-07 16:34:00'),
('41', 'Iot', '9', '900', '2018-10-07 16:34:01', '2018-10-07 16:34:01'),
('44', 'agriculture', '2', '200', '2018-10-07 16:34:01', '2018-10-07 16:34:01'),
('47', 'agriculture', '1', '1000', '2018-10-07 16:34:01', '2018-10-07 16:34:01'),
('6', 'production', '3', '1000', '2018-10-07 16:33:17', '2018-10-07 16:33:17');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(10) UNSIGNED NOT NULL,
  `users_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `audience` tinyint(4) NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `cover_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video` char(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `assignment_note` text COLLATE utf8mb4_unicode_ci,
  `assignment_doc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `users_id` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_of_job` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position_at_job` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penny_wise` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `existing_business` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `period` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`users_id`, `name_of_job`, `position_at_job`, `penny_wise`, `existing_business`, `period`, `created_at`, `updated_at`) VALUES
('11', 'Morton Schoen plc', 'Specialist', '80000', '10000', '6', '2018-10-07 16:33:17', '2018-10-07 16:33:17'),
('15', 'Randi Hane Production', 'seller', '10000', '10000', '6', '2018-10-07 16:33:18', '2018-10-07 16:33:18'),
('18', 'Baby Ortiz Production', 'Engineer', '40000', '80000', '30', '2018-10-07 16:33:18', '2018-10-07 16:33:18'),
('21', 'Prof. Margarete Wyman V Company', 'manager', '50000', '40000', '18', '2018-10-07 16:33:18', '2018-10-07 16:33:18'),
('24', 'Herman Volkman Production', 'Engineer', '30000', '80000', '12', '2018-10-07 16:33:19', '2018-10-07 16:33:19'),
('27', 'Adele Boyle plc', 'seller', '70000', '70000', '30', '2018-10-07 16:33:59', '2018-10-07 16:33:59'),
('3', 'Timothy Hermann Production', 'Secretary', '90000', '40000', '6', '2018-10-07 16:33:16', '2018-10-07 16:33:16'),
('31', 'Regan Doyle Production', 'Specialist', '60000', '80000', '6', '2018-10-07 16:33:59', '2018-10-07 16:33:59'),
('35', 'Adaline Goldner Production', 'manager', '20000', '90000', '6', '2018-10-07 16:34:00', '2018-10-07 16:34:00'),
('39', 'Jerrell Quigley Company', 'Specialist', '30000', '90000', '24', '2018-10-07 16:34:00', '2018-10-07 16:34:00'),
('42', 'Foster DuBuque Company', 'Engineer', '90000', '100000', '24', '2018-10-07 16:34:01', '2018-10-07 16:34:01'),
('45', 'Vidal Gottlieb Company', 'seller', '100000', '60000', '18', '2018-10-07 16:34:01', '2018-10-07 16:34:01'),
('48', 'Electa Connelly Production', 'seller', '40000', '40000', '18', '2018-10-07 16:34:01', '2018-10-07 16:34:01'),
('7', 'Timothy Greenholt limited', 'Engineer', '80000', '50000', '12', '2018-10-07 16:33:17', '2018-10-07 16:33:17');

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `id` int(10) UNSIGNED NOT NULL,
  `users_id` int(11) NOT NULL,
  `course_id` tinyint(4) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video` char(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `assignment_note` text COLLATE utf8mb4_unicode_ci,
  `assignment_doc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `library`
--

CREATE TABLE `library` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `lesson_id` int(11) DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(6, '2018_09_29_145239_create_admins_table', 1),
(93, '2014_10_12_000000_create_users_table', 2),
(94, '2014_10_12_100000_create_password_resets_table', 2),
(95, '2018_09_30_140210_create_students_table', 2),
(96, '2018_09_30_140857_create_artisans_table', 2),
(97, '2018_09_30_141303_create_employees_table', 2),
(98, '2018_09_30_171442_create_admins_table', 2),
(99, '2018_10_02_092933_create_courses_table', 2),
(100, '2018_10_02_102431_create_library_table', 2),
(101, '2018_10_02_103239_create_lessons_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `users_id` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_of_school` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state_of_school` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pennywise_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_guardian_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`users_id`, `name_of_school`, `state_of_school`, `level`, `course`, `pennywise_category`, `parent_guardian_phone`, `created_at`, `updated_at`) VALUES
('1', 'Sydnie Bins University', 'Wisconsin', '200', 'Information Technology', 'Premiun', '949.258.1806', '2018-10-07 16:33:16', '2018-10-07 16:33:16'),
('13', 'Dr. Koby Waelchi University', 'South Carolina', '300', 'Mass communication', 'Amicable', '352.337.4915', '2018-10-07 16:33:18', '2018-10-07 16:33:18'),
('16', 'Miss Georgiana Parker University', 'Wyoming', '500', 'Engineering', 'Amicable', '+1.206.389.8671', '2018-10-07 16:33:18', '2018-10-07 16:33:18'),
('19', 'Mr. Spencer Dooley University', 'Florida', '600', 'Mass communication', 'Premiun', '+1.228.616.7111', '2018-10-07 16:33:18', '2018-10-07 16:33:18'),
('22', 'Madisyn Padberg University', 'New Mexico', '600', 'Mass communication', 'Premiun', '(364) 764-7879', '2018-10-07 16:33:19', '2018-10-07 16:33:19'),
('25', 'Rachel Schmeler University', 'Wyoming', '200', 'Mass communication', 'Premiun', '690-498-5053 x1413', '2018-10-07 16:33:58', '2018-10-07 16:33:58'),
('29', 'Dax Schneider University', 'South Dakota', '400', 'Mass communication', 'Amicable', '+1 (769) 701-2998', '2018-10-07 16:33:59', '2018-10-07 16:33:59'),
('33', 'Verner Christiansen University', 'Washington', '600', 'Information Technology', 'Amicable', '570.916.9519', '2018-10-07 16:33:59', '2018-10-07 16:33:59'),
('37', 'Mrs. Ivy Considine I University', 'Oklahoma', '500', 'Engineering', 'Premiun', '+1 (805) 429-7562', '2018-10-07 16:34:00', '2018-10-07 16:34:00'),
('40', 'Wendell Lesch University', 'South Carolina', '500', 'Engineering', 'Amicable', '890.524.1454 x5961', '2018-10-07 16:34:00', '2018-10-07 16:34:00'),
('43', 'Clyde Bayer University', 'Ohio', '600', 'Information Technology', 'Premiun', '(390) 869-6756 x7637', '2018-10-07 16:34:01', '2018-10-07 16:34:01'),
('46', 'Augustine Conn II University', 'District of Columbia', '400', 'Information Technology', 'Amicable', '443-632-5039', '2018-10-07 16:34:01', '2018-10-07 16:34:01'),
('5', 'Sibyl Ferry University', 'Massachusetts', '400', 'Engineering', 'Premiun', '830.853.1184 x1136', '2018-10-07 16:33:17', '2018-10-07 16:33:17'),
('9', 'Dr. Dion Ortiz II University', 'District of Columbia', '500', 'Information Technology', 'Premiun', '735.249.3150', '2018-10-07 16:33:17', '2018-10-07 16:33:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `home_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `state_of_origin` char(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_next_of_kin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_next_of_kin` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state_next_of_kin` char(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bussiness_category` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_of_interest` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resident_state` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `home_address`, `dob`, `state_of_origin`, `phone`, `name_next_of_kin`, `phone_next_of_kin`, `state_next_of_kin`, `bussiness_category`, `business_of_interest`, `resident_state`, `gender`, `image`, `role`, `status`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Jamarcus', 'Quigley', 'harrison.mann@example.com', '60727 Sawayn Mall Suite 982\nEast Alexie, WI 91043-5628', '1979-10-14', 'Missouri', '613-966-5266', 'Linda Cremin', '+1-554-852-6295', 'Vermont', 'Mining', 'Buying & Selling', 'New York', 'male', 'face3.jpg', 1, 1, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', '3VDj7yRfa2', '2018-10-07 16:33:16', '2018-10-07 16:33:16'),
(2, 'Beulah', 'Leuschke', 'kyla37@example.net', '98443 Swift Shoal\nSouth Johnathanfurt, FL 60504', '1998-07-31', 'Alabama', '769.306.7480', 'Dane Kuhic', '+1 (695) 998-5454', 'Maine', 'Mining', 'Mining', 'South Dakota', 'male', 'face1.jpg', 2, 0, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'VPS3pvsHpI', '2018-10-07 16:33:16', '2018-10-07 16:33:16'),
(3, 'Mariam', 'Jones', 'alvis52@example.net', '767 Ethan Dam\nLake Justen, MT 37938', '1995-11-07', 'West Virginia', '+1.726.724.9225', 'Simeon Hill', '+1-283-520-7242', 'Wisconsin', 'Mining', 'Construction', 'Pennsylvania', 'female', 'face2.jpg', 3, 2, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'ycjUAY5dmX', '2018-10-07 16:33:16', '2018-10-07 16:33:16'),
(4, 'Alford', 'Kemmer', 'brandon63@example.org', '5557 Marilyne Estate Apt. 562\nNorth Sandyburgh, VT 24610', '1995-03-07', 'California', '764.399.5177 x451', 'Ms. Ashly Tremblay PhD', '834-282-1182 x781', 'Florida', 'Production', 'Agriculture', 'Idaho', 'male', 'face4.jpg', 4, 0, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'qpEVnyRZiz', '2018-10-07 16:33:16', '2018-10-07 16:33:16'),
(5, 'Frances', 'D\'Amore', 'senger.rodrigo@example.net', '119 Connelly Vista Apt. 338\nDelltown, KS 88317-3137', '1993-02-10', 'Connecticut', '(284) 323-7278', 'Taurean Stroman', '535-954-3051 x529', 'New Jersey', 'Service', 'Construction', 'Michigan', 'male', 'face4.jpg', 1, 0, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'jkVfboA1Uy', '2018-10-07 16:33:17', '2018-10-07 16:33:17'),
(6, 'Domenick', 'Corkery', 'maximus95@example.com', '4180 Kunde Hill Suite 243\nArvillaland, WY 52088-1856', '2002-08-03', 'North Carolina', '656-949-6907', 'Furman Rodriguez II', '(978) 295-8487 x3309', 'Nebraska', 'Buying & Selling', 'Mining', 'Arkansas', 'female', 'face4.jpg', 2, 2, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'n7pMClB0ws', '2018-10-07 16:33:17', '2018-10-07 16:33:17'),
(7, 'Maximillia', 'Lemke', 'gracie16@example.com', '7536 Jaron Burgs Suite 025\nPeggiebury, MS 83977', '1978-11-11', 'South Dakota', '(308) 770-2484', 'Elbert Nitzsche', '416-302-1688 x03864', 'Massachusetts', 'Construction', 'Service', 'Maryland', 'female', 'face4.jpg', 3, 1, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'DCuOL9N5Zy', '2018-10-07 16:33:17', '2018-10-07 16:33:17'),
(8, 'Vernice', 'Stiedemann', 'schamberger.citlalli@example.org', '1879 Karelle Village\nWest Yasmeenmouth, MI 02739-7304', '1996-04-21', 'Missouri', '356.850.6467 x88269', 'Elliot Lynch Jr.', '+1-987-938-7019', 'South Dakota', 'Service', 'Service', 'Minnesota', 'female', 'face4.jpg', 4, 1, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'YW58QL2pEQ', '2018-10-07 16:33:17', '2018-10-07 16:33:17'),
(9, 'Davin', 'Senger', 'schultz.noble@example.com', '507 Melisa Estates Apt. 764\nDevynfort, TN 90201-7152', '2013-12-24', 'Texas', '561-977-9858 x28521', 'Quentin Haag', '1-675-768-2642 x880', 'New Jersey', 'Agriculture', 'Service', 'Delaware', 'male', 'face2.jpg', 1, 1, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'hznnsUBlMX', '2018-10-07 16:33:17', '2018-10-07 16:33:17'),
(10, 'Clint', 'Rosenbaum', 'sam03@example.org', '6680 Robel Pass\nHickleton, KS 14991', '1975-07-21', 'Pennsylvania', '1-725-454-9538', 'Prof. Jackeline Hills MD', '705-499-8259 x7588', 'Connecticut', 'Agriculture', 'Agriculture', 'New York', 'male', 'face3.jpg', 2, 2, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'g41PZ7j2ox', '2018-10-07 16:33:17', '2018-10-07 16:33:17'),
(11, 'Rodger', 'Gulgowski', 'isabelle55@example.net', '91060 Ankunding Fork\nWisozkmouth, ND 17218-1670', '2000-11-30', 'Georgia', '432-315-9460', 'Elisha Veum I', '436.509.3419', 'North Carolina', 'Production', 'Production', 'Oregon', 'female', 'face1.jpg', 3, 0, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', '4ropUnVXDB', '2018-10-07 16:33:17', '2018-10-07 16:33:17'),
(12, 'Jamison', 'McGlynn', 'frances37@example.com', '310 Nasir Pike\nPort Hope, AL 99311-4782', '2017-08-14', 'North Dakota', '1-862-434-5176', 'Taya Skiles', '1-815-944-8010 x57597', 'Idaho', 'Production', 'Mining', 'Minnesota', 'female', 'face1.jpg', 4, 2, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', '1HNGubmQ4f', '2018-10-07 16:33:17', '2018-10-07 16:33:17'),
(13, 'Caterina', 'Lubowitz', 'kiehn.edythe@example.net', '715 Daniel Club\nLake Rex, CO 24240-1470', '2002-12-14', 'Oregon', '1-303-714-2916 x097', 'Mr. Benny White DVM', '+1.958.665.4176', 'North Carolina', 'Production', 'Service', 'Wyoming', 'male', 'face3.jpg', 1, 1, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', '0z9GYYjamQ', '2018-10-07 16:33:18', '2018-10-07 16:33:18'),
(14, 'Evelyn', 'Mann', 'rbergstrom@example.net', '191 Claudia Fords\nLake Vella, RI 20315-6866', '2013-04-27', 'Alaska', '469.584.5874', 'Dr. Kaycee Jacobson IV', '1-346-660-7046 x9382', 'Tennessee', 'Buying & Selling', 'Construction', 'Illinois', 'male', 'face2.jpg', 2, 0, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', '2CM5TPuM1P', '2018-10-07 16:33:18', '2018-10-07 16:33:18'),
(15, 'Toni', 'Bartoletti', 'schneider.general@example.com', '545 Harvey Run\nBrucechester, MD 11814-8894', '2008-01-19', 'North Dakota', '559.999.4709', 'Ms. Nyah Stiedemann', '874-368-3677', 'Oregon', 'Construction', 'Mining', 'Texas', 'female', 'face2.jpg', 3, 2, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'f05q8mEzc2', '2018-10-07 16:33:18', '2018-10-07 16:33:18'),
(16, 'Brionna', 'Wuckert', 'harris.sunny@example.net', '452 Damion Keys\nNaderport, NM 53808-5117', '1974-06-21', 'Virginia', '1-408-879-0507 x8862', 'Miss Elinor Hand', '946-424-8074 x117', 'Kentucky', 'Production', 'Mining', 'Mississippi', 'female', 'face3.jpg', 1, 1, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'busIlmA2uE', '2018-10-07 16:33:18', '2018-10-07 16:33:18'),
(17, 'Sabrina', 'Marvin', 'royce.jones@example.com', '8495 Wolff Mission Suite 082\nMireillefurt, MA 58771', '2010-05-22', 'Oregon', '(663) 269-9748 x5771', 'Prof. Tara Sauer MD', '+15028433755', 'Colorado', 'Agriculture', 'Service', 'Utah', 'male', 'face4.jpg', 2, 1, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'qnWcz0ElUn', '2018-10-07 16:33:18', '2018-10-07 16:33:18'),
(18, 'Lysanne', 'Lesch', 'hoberbrunner@example.org', '86487 Tom Meadow\nBernitaland, FL 99438-4562', '1973-04-04', 'Virginia', '+1.662.260.1357', 'Marianne Toy', '1-676-550-7081 x89679', 'Delaware', 'Production', 'Service', 'Connecticut', 'female', 'face4.jpg', 3, 1, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'j1aQR58oGQ', '2018-10-07 16:33:18', '2018-10-07 16:33:18'),
(19, 'Manuela', 'Nienow', 'eleazar03@example.net', '596 Pat Light\nLake Abetown, LA 03765', '1994-08-10', 'New Hampshire', '+1-585-589-2191', 'Mr. Arvel Greenfelder Jr.', '730.738.8270', 'Wyoming', 'Mining', 'Production', 'Ohio', 'female', 'face4.jpg', 1, 2, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'VWg9JQ30fz', '2018-10-07 16:33:18', '2018-10-07 16:33:18'),
(20, 'Jerrod', 'Waters', 'nmarquardt@example.org', '59522 Dejah Cove Apt. 560\nKosston, NC 26327', '2009-04-28', 'Idaho', '624.856.3424 x5045', 'Prof. Enrico Jerde', '+18407732441', 'Texas', 'Construction', 'Construction', 'Texas', 'male', 'face3.jpg', 2, 2, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'zSABmEEJw6', '2018-10-07 16:33:18', '2018-10-07 16:33:18'),
(21, 'Edythe', 'Kohler', 'oren.dickinson@example.org', '47277 Rempel Streets Apt. 108\nSchuppeport, NE 14417-2423', '1987-02-13', 'New Hampshire', '1-296-937-2663', 'Dr. Cyril Haley', '(646) 451-7637 x4477', 'Montana', 'Buying & Selling', 'Production', 'Missouri', 'male', 'face4.jpg', 3, 0, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'jGdBeiA8lv', '2018-10-07 16:33:18', '2018-10-07 16:33:18'),
(22, 'Hollie', 'Schroeder', 'emilio.bayer@example.net', '7920 Langworth Springs\nNew Johnnie, HI 62019', '1983-04-05', 'Alabama', '598-262-7889', 'Walton Feeney', '221-530-5544 x636', 'New York', 'Agriculture', 'Mining', 'South Carolina', 'male', 'face1.jpg', 1, 0, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'pAOauuuP2F', '2018-10-07 16:33:18', '2018-10-07 16:33:18'),
(23, 'Beryl', 'Vandervort', 'kian58@example.org', '2469 Claudine Harbor\nWiegandtown, MT 42372', '1987-03-24', 'Ohio', '739.536.2642 x242', 'Zakary Reinger', '1-738-887-5255 x2915', 'Idaho', 'Mining', 'Production', 'Kentucky', 'female', 'face4.jpg', 2, 2, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'IC2O0HYRaX', '2018-10-07 16:33:19', '2018-10-07 16:33:19'),
(24, 'Lance', 'Adams', 'alexandria64@example.org', '48288 West Camp\nAbbottchester, MN 07405-5844', '2003-08-06', 'New York', '1-546-762-0296 x844', 'Jaiden Watsica', '367.630.4139', 'Vermont', 'Production', 'Construction', 'Maryland', 'male', 'face1.jpg', 3, 1, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'DbBMVbfPPT', '2018-10-07 16:33:19', '2018-10-07 16:33:19'),
(25, 'Allen', 'Hagenes', 'plangosh@example.net', '76299 Amy Row Suite 508\nKurtshire, MD 09653', '1977-07-13', 'Kentucky', '906.750.4416 x17356', 'Prof. Eusebio Hackett III', '+16076709479', 'New York', 'Mining', 'Buying & Selling', 'Kentucky', 'male', 'face2.jpg', 1, 2, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'oe2pBoTfod', '2018-10-07 16:33:58', '2018-10-07 16:33:58'),
(26, 'Rae', 'Mertz', 'doug30@example.net', '6512 Adams Station Apt. 923\nWest Cristinaberg, VA 14002-6947', '1990-07-16', 'Utah', '1-698-322-3342', 'Miss Yazmin White Sr.', '1-946-347-7814 x46221', 'District of Columbia', 'Mining', 'Service', 'Arizona', 'male', 'face1.jpg', 2, 2, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'q6FVnXA4k4', '2018-10-07 16:33:58', '2018-10-07 16:33:58'),
(27, 'Jessie', 'Nienow', 'jerad.reynolds@example.net', '158 Crona Court\nZulaufmouth, TX 57266-6324', '1978-01-15', 'Iowa', '556-523-6901 x4477', 'Prof. Eryn Rutherford', '640-991-9732 x466', 'Montana', 'Mining', 'Mining', 'Tennessee', 'male', 'face3.jpg', 3, 1, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'n5CvypXQko', '2018-10-07 16:33:59', '2018-10-07 16:33:59'),
(28, 'Agustin', 'Bergnaum', 'lynn.goodwin@example.org', '8676 Nicolas Plains\nLake Hal, WI 51677-9734', '2014-12-12', 'Kansas', '(981) 974-9202 x65266', 'Haven Cole DDS', '+1.795.459.4294', 'Oregon', 'Buying & Selling', 'Agriculture', 'Illinois', 'male', 'face2.jpg', 4, 0, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'rRuZoWl405', '2018-10-07 16:33:59', '2018-10-07 16:33:59'),
(29, 'Vivienne', 'Fay', 'bettie.koss@example.com', '125 Ashleigh Plaza Suite 454\nPriscillastad, CO 78985', '1983-01-02', 'Minnesota', '(868) 895-6861 x6797', 'Torrance Considine', '(603) 814-0984 x166', 'Illinois', 'Agriculture', 'Service', 'West Virginia', 'male', 'face2.jpg', 1, 0, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Ph6oF2Yif9', '2018-10-07 16:33:59', '2018-10-07 16:33:59'),
(30, 'Lorna', 'Stanton', 'gerhold.rhianna@example.net', '89778 Dedrick Island Apt. 389\nPort Sedrick, ID 96337-2697', '1998-04-30', 'New Mexico', '(762) 955-4635 x9935', 'Mrs. Lesly Lockman I', '839.518.8847', 'Michigan', 'Mining', 'Agriculture', 'Utah', 'female', 'face2.jpg', 2, 0, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'HmO5Gjfupx', '2018-10-07 16:33:59', '2018-10-07 16:33:59'),
(31, 'Deon', 'Jaskolski', 'frank43@example.org', '2906 O\'Kon Locks\nStoltenbergfurt, IN 33252', '1972-03-27', 'Kansas', '728.777.4747 x13567', 'Eliezer Kautzer PhD', '+1.882.284.2682', 'Georgia', 'Construction', 'Construction', 'Iowa', 'male', 'face1.jpg', 3, 1, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Q5gBnbSRZl', '2018-10-07 16:33:59', '2018-10-07 16:33:59'),
(32, 'Marilou', 'Hoeger', 'orrin66@example.org', '497 Jillian Ways\nAdellaberg, KY 34875-6645', '1982-12-23', 'District of Columbia', '(228) 559-2804 x689', 'Perry Medhurst', '+1-901-829-0605', 'Oregon', 'Construction', 'Buying & Selling', 'Rhode Island', 'male', 'face4.jpg', 4, 0, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 's5O0r8dK2D', '2018-10-07 16:33:59', '2018-10-07 16:33:59'),
(33, 'Carter', 'Dach', 'lzemlak@example.net', '541 Edna Mews\nPfefferside, WA 61571-4891', '2015-08-19', 'North Dakota', '934.275.2543 x0674', 'Dr. Gregg Kunze', '693-381-8040', 'South Carolina', 'Agriculture', 'Construction', 'Arizona', 'female', 'face4.jpg', 1, 0, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'i0BGrgSEO3', '2018-10-07 16:33:59', '2018-10-07 16:33:59'),
(34, 'Ima', 'Hagenes', 'camron.hills@example.org', '2061 Madaline Via\nNorth Annetteport, TX 79453-5237', '1989-01-29', 'California', '+1-292-830-1336', 'Dianna Ferry IV', '753.540.8565 x124', 'Indiana', 'Service', 'Buying & Selling', 'Colorado', 'female', 'face4.jpg', 2, 1, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'D18bMunUJX', '2018-10-07 16:34:00', '2018-10-07 16:34:00'),
(35, 'Marianna', 'Hahn', 'jast.erling@example.com', '966 Dorris Parks Suite 968\nGreenfelderfort, IN 24898-2431', '1975-02-19', 'North Carolina', '524-854-3915', 'Della Quigley', '1-870-624-4303', 'Pennsylvania', 'Production', 'Service', 'District of Columbia', 'male', 'face2.jpg', 3, 2, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'alDXQlsVSG', '2018-10-07 16:34:00', '2018-10-07 16:34:00'),
(36, 'Luz', 'Turcotte', 'dare.bert@example.com', '9501 Hane Mount\nCarrollmouth, UT 68981-8063', '1995-01-18', 'Nebraska', '1-489-812-8201 x582', 'Sanford Ullrich Jr.', '+1-684-393-3802', 'Ohio', 'Mining', 'Mining', 'New Jersey', 'female', 'face1.jpg', 4, 1, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'R8vRpeWWY0', '2018-10-07 16:34:00', '2018-10-07 16:34:00'),
(37, 'Dave', 'Cronin', 'predovic.eleonore@example.org', '76678 Vidal Track Suite 768\nClarabelleborough, WY 16803', '2005-10-04', 'Nebraska', '1-754-364-6804', 'Mireille Fritsch', '890.287.0274', 'Wyoming', 'Construction', 'Construction', 'Montana', 'male', 'face1.jpg', 1, 0, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'tzR2EoYpTS', '2018-10-07 16:34:00', '2018-10-07 16:34:00'),
(38, 'Jordy', 'West', 'mcglynn.santa@example.com', '410 Kaya Divide Suite 725\nCreminberg, NE 94813', '2017-07-30', 'Rhode Island', '685-355-3871 x99775', 'Helen Schinner', '+1 (571) 228-9190', 'Mississippi', 'Buying & Selling', 'Agriculture', 'Oregon', 'female', 'face2.jpg', 2, 0, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'A6RhcoituY', '2018-10-07 16:34:00', '2018-10-07 16:34:00'),
(39, 'Gillian', 'Blick', 'jayce.simonis@example.org', '933 Declan Walks Apt. 159\nKatelynnhaven, RI 22124', '1980-08-11', 'Pennsylvania', '401-445-7073 x526', 'Isom Wilkinson', '391-205-6906 x782', 'Tennessee', 'Service', 'Construction', 'Oregon', 'male', 'face3.jpg', 3, 0, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'DwZLcMHb2z', '2018-10-07 16:34:00', '2018-10-07 16:34:00'),
(40, 'Hester', 'Gulgowski', 'zula19@example.net', '27113 Jovany Brooks Suite 440\nSouth Dora, NH 37772-5354', '1979-08-30', 'Vermont', '(889) 958-8564 x72413', 'Dr. Nathanial Johnson', '(349) 832-4934', 'Alabama', 'Agriculture', 'Production', 'Maine', 'female', 'face4.jpg', 1, 0, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Zd7YNRLcHy', '2018-10-07 16:34:00', '2018-10-07 16:34:00'),
(41, 'Brenden', 'Lehner', 'bechtelar.devon@example.com', '62508 Hackett Plain Apt. 819\nWestleybury, MO 05647', '2016-11-11', 'California', '+1 (674) 842-0570', 'Allison Cronin', '+1-594-695-2868', 'Nevada', 'Production', 'Agriculture', 'Kentucky', 'male', 'face2.jpg', 2, 0, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', '0bNzanntnT', '2018-10-07 16:34:01', '2018-10-07 16:34:01'),
(42, 'Verona', 'Rodriguez', 'aquigley@example.org', '531 Schinner Cliff\nWatersside, OK 40539-1687', '1977-03-10', 'Minnesota', '+1.692.320.4577', 'Pinkie Howell DVM', '+1.738.954.7817', 'Connecticut', 'Mining', 'Production', 'North Dakota', 'female', 'face2.jpg', 3, 1, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'OPnyajbMQN', '2018-10-07 16:34:01', '2018-10-07 16:34:01'),
(43, 'Eleonore', 'Bergnaum', 'delilah.powlowski@example.net', '7321 Myrl Mountain Apt. 479\nTreutelland, KS 41132', '1991-11-04', 'Maryland', '704.495.6088 x086', 'Estel Larkin', '(762) 862-3042 x945', 'Alaska', 'Agriculture', 'Buying & Selling', 'West Virginia', 'male', 'face1.jpg', 1, 2, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'aUw25eWCuX', '2018-10-07 16:34:01', '2018-10-07 16:34:01'),
(44, 'Alyce', 'Tremblay', 'gorczany.rosalind@example.org', '642 Kuhic Ridge Apt. 120\nRogahnchester, RI 61743-5992', '1992-05-12', 'Tennessee', '(786) 771-7576', 'Leonard Ondricka', '729-639-1229 x8371', 'Hawaii', 'Mining', 'Buying & Selling', 'South Carolina', 'male', 'face3.jpg', 2, 1, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'FVg4EyN124', '2018-10-07 16:34:01', '2018-10-07 16:34:01'),
(45, 'Jaylen', 'Toy', 'fhudson@example.net', '44652 Leopoldo Cliff Apt. 612\nErnafurt, DC 81994-1820', '1982-08-13', 'Kentucky', '+1 (824) 818-2027', 'Miss Rose Marks', '(405) 658-7333', 'Ohio', 'Buying & Selling', 'Agriculture', 'Texas', 'male', 'face1.jpg', 3, 2, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Q1Mf8fFeJI', '2018-10-07 16:34:01', '2018-10-07 16:34:01'),
(46, 'Mathias', 'Stokes', 'csteuber@example.net', '110 Sigurd Courts Apt. 003\nNorth Sylvia, HI 32785-7619', '2007-09-19', 'Virginia', '1-827-652-7228', 'Emery Bins', '(712) 292-0260 x786', 'Louisiana', 'Agriculture', 'Construction', 'Wyoming', 'male', 'face2.jpg', 1, 2, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'VvnOfh4EHg', '2018-10-07 16:34:01', '2018-10-07 16:34:01'),
(47, 'Ozella', 'Vandervort', 'bogisich.rhea@example.com', '481 Legros Branch\nKrajcikton, RI 51766', '1979-02-04', 'Hawaii', '996.320.2685', 'Mr. Kenneth Waelchi', '808-572-1120', 'Wisconsin', 'Mining', 'Agriculture', 'Michigan', 'male', 'face4.jpg', 2, 2, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', '3z9UQVfuNh', '2018-10-07 16:34:01', '2018-10-07 16:34:01'),
(48, 'Edgardo', 'Wyman', 'murray.antone@example.com', '3123 Beier Station\nNaderton, IA 30160', '1995-03-14', 'Mississippi', '+1-426-697-6125', 'Rosamond Legros', '235.400.2109', 'Missouri', 'Construction', 'Service', 'Pennsylvania', 'female', 'face2.jpg', 3, 0, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'amrNn2UrfS', '2018-10-07 16:34:01', '2018-10-07 16:34:01');

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
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD UNIQUE KEY `employees_users_id_unique` (`users_id`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `library`
--
ALTER TABLE `library`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD UNIQUE KEY `students_users_id_unique` (`users_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `library`
--
ALTER TABLE `library`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
