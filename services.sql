-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2021 at 11:12 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `services`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `image`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '1592241470admin1.png', NULL, '$2y$10$B2OZJr4LqL3JCMfBN9qxEea9nqVuUv3RVmM3DPRkRkwydZRp5oxqK', NULL, '2020-06-14 12:16:41', '2020-12-29 02:24:39');

-- --------------------------------------------------------

--
-- Table structure for table `available_ons`
--

CREATE TABLE `available_ons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` bigint(20) UNSIGNED NOT NULL,
  `monday_opening_time` time DEFAULT NULL,
  `monday_closing_time` time DEFAULT NULL,
  `monday_status` tinyint(1) NOT NULL DEFAULT 1,
  `tuesday_opening_time` time DEFAULT NULL,
  `tuesday_closing_time` time DEFAULT NULL,
  `tuesday_status` tinyint(1) NOT NULL DEFAULT 1,
  `wednesday_opening_time` time DEFAULT NULL,
  `wednesday_closing_time` time DEFAULT NULL,
  `wednesday_status` tinyint(1) NOT NULL DEFAULT 1,
  `thursday_opening_time` time DEFAULT NULL,
  `thursday_closing_time` time DEFAULT NULL,
  `thursday_status` tinyint(1) NOT NULL DEFAULT 1,
  `friday_opening_time` time DEFAULT NULL,
  `friday_closing_time` time DEFAULT NULL,
  `friday_status` tinyint(1) NOT NULL DEFAULT 1,
  `saturday_opening_time` time DEFAULT NULL,
  `saturday_closing_time` time DEFAULT NULL,
  `saturday_status` tinyint(1) NOT NULL DEFAULT 1,
  `sunday_opening_time` time DEFAULT NULL,
  `sunday_closing_time` time DEFAULT NULL,
  `sunday_status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `available_ons`
--

INSERT INTO `available_ons` (`id`, `vendor_id`, `monday_opening_time`, `monday_closing_time`, `monday_status`, `tuesday_opening_time`, `tuesday_closing_time`, `tuesday_status`, `wednesday_opening_time`, `wednesday_closing_time`, `wednesday_status`, `thursday_opening_time`, `thursday_closing_time`, `thursday_status`, `friday_opening_time`, `friday_closing_time`, `friday_status`, `saturday_opening_time`, `saturday_closing_time`, `saturday_status`, `sunday_opening_time`, `sunday_closing_time`, `sunday_status`, `created_at`, `updated_at`) VALUES
(5, 138, NULL, NULL, 1, NULL, NULL, 1, NULL, NULL, 1, NULL, NULL, 1, NULL, NULL, 1, NULL, NULL, 1, NULL, NULL, 1, '2021-06-04 06:41:57', '2021-06-04 06:42:05');

-- --------------------------------------------------------

--
-- Table structure for table `check_fields`
--

CREATE TABLE `check_fields` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `label_for_form` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label_for_invoice` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `check_fields`
--

INSERT INTO `check_fields` (`id`, `service_id`, `label_for_form`, `label_for_invoice`, `created_at`, `updated_at`) VALUES
(6, 82, 'Will you require any of the following?', 'Requires', '2021-04-29 00:01:06', '2021-04-29 00:01:06'),
(7, 82, 'What cuisines would you like to serve your guests?', 'Cuisines', '2021-04-29 00:11:40', '2021-04-29 00:11:40');

-- --------------------------------------------------------

--
-- Table structure for table `check_field_with_charges`
--

CREATE TABLE `check_field_with_charges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `label_for_form` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label_for_invoice` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `check_options`
--

CREATE TABLE `check_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `check_field_id` bigint(20) UNSIGNED NOT NULL,
  `option` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `check_options`
--

INSERT INTO `check_options` (`id`, `check_field_id`, `option`, `created_at`, `updated_at`) VALUES
(13, 6, 'Waiters/Staff/Hostess', '2021-04-29 00:01:06', '2021-04-29 00:01:06'),
(14, 6, 'Cutlery', '2021-04-29 00:01:06', '2021-04-29 00:01:06'),
(15, 6, 'Lighting', '2021-04-29 00:01:06', '2021-04-29 00:01:06'),
(16, 6, 'Chairs and tables', '2021-04-29 00:01:06', '2021-04-29 00:01:06'),
(17, 6, 'Floral arrangements', '2021-04-29 00:01:06', '2021-04-29 00:01:06'),
(18, 7, 'Arabic', '2021-04-29 00:11:40', '2021-04-29 00:11:40'),
(19, 7, 'BBQs', '2021-04-29 00:11:40', '2021-04-29 00:11:40'),
(20, 7, 'Brunch/ Lunch/ Afternoon Tea', '2021-04-29 00:11:40', '2021-04-29 00:11:40'),
(21, 7, 'Canapes', '2021-04-29 00:11:40', '2021-04-29 00:11:40'),
(22, 7, 'Children\'s Menu', '2021-04-29 00:11:40', '2021-04-29 00:11:40'),
(23, 7, 'Chinese', '2021-04-29 00:11:40', '2021-04-29 00:11:40'),
(24, 7, 'Cocktails', '2021-04-29 00:11:40', '2021-04-29 00:11:40'),
(25, 7, 'Continental', '2021-04-29 00:11:40', '2021-04-29 00:11:40'),
(26, 7, 'Dessert', '2021-04-29 00:11:40', '2021-04-29 00:11:40'),
(27, 7, 'Festive Food', '2021-04-29 00:11:40', '2021-04-29 00:11:40'),
(28, 7, 'Filipino', '2021-04-29 00:11:40', '2021-04-29 00:11:40'),
(29, 7, 'Fusion', '2021-04-29 00:11:40', '2021-04-29 00:11:40'),
(30, 7, 'Healthy Food', '2021-04-29 00:11:40', '2021-04-29 00:11:40'),
(31, 7, 'Indian / Pakistani', '2021-04-29 00:11:40', '2021-04-29 00:11:40'),
(32, 7, 'Italian', '2021-04-29 00:11:40', '2021-04-29 00:11:40'),
(33, 7, 'Japanese', '2021-04-29 00:11:40', '2021-04-29 00:11:40'),
(34, 7, 'Mediterranean', '2021-04-29 00:11:40', '2021-04-29 00:11:40'),
(35, 7, 'Mexican', '2021-04-29 00:11:40', '2021-04-29 00:11:40'),
(36, 7, 'Persian', '2021-04-29 00:11:40', '2021-04-29 00:11:40'),
(37, 7, 'Thai', '2021-04-29 00:11:40', '2021-04-29 00:11:40'),
(38, 7, 'Vegetarian', '2021-04-29 00:11:40', '2021-04-29 00:11:40'),
(39, 7, 'Seafood', '2021-04-29 00:11:40', '2021-04-29 00:11:40');

-- --------------------------------------------------------

--
-- Table structure for table `check_option_with_charges`
--

CREATE TABLE `check_option_with_charges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `check_field_with_charge_id` bigint(20) UNSIGNED NOT NULL,
  `option` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `charge` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `check_values`
--

CREATE TABLE `check_values` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `field_id` bigint(20) UNSIGNED NOT NULL,
  `option_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `check_with_charge_values`
--

CREATE TABLE `check_with_charge_values` (
  `id` bigint(20) NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `field_id` bigint(20) UNSIGNED NOT NULL,
  `option_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `state`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'DUBAI', NULL, NULL, NULL, NULL),
(2, 'ABU DHABI', NULL, NULL, NULL, NULL),
(3, 'SHARJAH', NULL, NULL, NULL, NULL),
(4, 'AJMAN', NULL, NULL, NULL, NULL),
(14, NULL, 'Al Manama', 4, '2021-02-13 18:13:58', '2021-02-13 18:13:58'),
(17, NULL, 'Al Aryam', 2, '2021-02-13 18:15:50', '2021-02-13 18:15:50'),
(18, NULL, 'Dalma', 2, '2021-02-13 18:16:12', '2021-02-13 18:16:12'),
(21, 'RAS AL KHAIMAH', NULL, NULL, '2021-02-19 12:43:28', '2021-02-19 12:43:28'),
(22, 'UMM AL QUWAIN', NULL, NULL, '2021-02-19 12:44:14', '2021-02-19 12:44:14'),
(23, 'FUJAIRAH', NULL, NULL, '2021-02-19 12:44:28', '2021-02-19 12:44:28'),
(24, 'AL AIN', NULL, NULL, '2021-02-19 12:44:43', '2021-02-19 12:44:43'),
(28, NULL, 'Abu Dhabi Gate City', 2, '2021-02-19 13:10:28', '2021-02-19 13:10:28'),
(29, NULL, 'Abu Dhabi Island', 2, '2021-02-19 13:11:07', '2021-02-19 13:11:07'),
(30, NULL, 'Abu Dhabi National Exhibition Centre', 2, '2021-02-19 13:11:20', '2021-02-19 13:11:20'),
(31, NULL, 'Abu Dhabi Univercity', 2, '2021-02-19 13:11:32', '2021-02-19 13:11:32'),
(33, NULL, 'AL_ Aman', 2, '2021-02-19 13:12:14', '2021-02-19 13:12:14'),
(34, NULL, 'Al Bahia Park', 2, '2021-02-19 13:12:27', '2021-02-19 13:12:27'),
(35, NULL, 'AL Bateen', 2, '2021-02-19 13:14:02', '2021-02-19 13:14:02'),
(36, NULL, 'AI Bahia Park', 2, '2021-02-19 13:14:56', '2021-02-19 13:14:56'),
(37, NULL, 'Al Danah', 2, '2021-02-19 13:15:13', '2021-02-19 13:15:13'),
(38, NULL, 'AI Danah', 2, '2021-02-19 13:15:45', '2021-02-19 13:15:45'),
(39, NULL, 'AI Dhafrah', 2, '2021-02-19 13:16:11', '2021-02-19 13:16:11'),
(40, NULL, 'Al Fahid', 2, '2021-02-19 13:16:25', '2021-02-19 13:16:25'),
(41, NULL, 'AI Falah', 2, '2021-02-19 13:16:44', '2021-02-19 13:16:44'),
(42, NULL, 'Al Falah City', 2, '2021-02-19 13:16:56', '2021-02-19 13:16:56'),
(43, NULL, 'Al Falah Street', 2, '2021-02-19 13:21:34', '2021-02-19 13:21:34'),
(44, NULL, 'Al Faqa', 2, '2021-02-19 13:22:10', '2021-02-19 13:22:10'),
(45, NULL, 'Al Ghadeer', 2, '2021-02-19 13:22:30', '2021-02-19 13:22:30'),
(46, NULL, 'Al Ghaf Park', 2, '2021-02-19 13:22:54', '2021-02-19 13:22:54'),
(47, NULL, 'Al Hosn', 2, '2021-02-19 13:23:14', '2021-02-19 13:23:14'),
(48, NULL, 'Al Hudayriat Island', 2, '2021-02-19 13:23:25', '2021-02-19 13:23:25'),
(49, NULL, 'Al Jurf', 2, '2021-02-19 13:23:38', '2021-02-19 13:23:38'),
(50, NULL, 'AI Karama', 2, '2021-02-19 13:24:10', '2021-02-19 13:24:10'),
(51, NULL, 'AI Kalidyah', 2, '2021-02-19 13:24:40', '2021-02-19 13:24:40'),
(52, NULL, 'AI Kuberaih', 2, '2021-02-19 13:24:59', '2021-02-19 13:24:59'),
(53, NULL, 'AI Lulu Island', 2, '2021-02-19 13:25:23', '2021-02-19 13:25:23'),
(54, NULL, 'AI Madina', 2, '2021-02-19 13:25:42', '2021-02-19 13:25:42'),
(55, NULL, 'Al Mafraq', 2, '2021-02-19 13:26:05', '2021-02-19 13:26:05'),
(56, NULL, 'Al Manaseer', 2, '2021-02-19 13:26:21', '2021-02-19 13:26:21'),
(57, NULL, 'Al Manhal', 2, '2021-02-19 13:26:43', '2021-02-19 13:26:43'),
(58, NULL, 'Al Maqtaa', 2, '2021-02-19 13:27:07', '2021-02-19 13:27:07'),
(59, NULL, 'Al Markaz', 2, '2021-02-19 13:27:21', '2021-02-19 13:27:21'),
(60, NULL, 'Al Markaziyah', 2, '2021-02-19 13:27:46', '2021-02-19 13:27:46'),
(61, NULL, 'Al Maryah Island', 2, '2021-02-19 13:28:14', '2021-02-19 13:28:14'),
(62, NULL, 'Al Matar', 2, '2021-02-19 13:28:33', '2021-02-19 13:28:33'),
(63, NULL, 'Al Matar', 2, '2021-02-19 13:29:06', '2021-02-19 13:29:06'),
(64, NULL, 'Al Meena', 2, '2021-02-19 13:31:28', '2021-02-19 13:31:28'),
(65, NULL, 'Al Mirfa', 2, '2021-02-19 13:31:55', '2021-02-19 13:31:55'),
(66, NULL, 'Al Moroor', 2, '2021-02-19 13:32:16', '2021-02-19 13:32:16'),
(67, NULL, 'Al Muroor', 2, '2021-02-19 13:32:47', '2021-02-19 13:32:47'),
(68, NULL, 'Al Mushrif', 2, '2021-02-19 13:33:08', '2021-02-19 13:33:08'),
(69, NULL, 'Al Muzoon', 2, '2021-02-19 13:33:35', '2021-02-19 13:33:35'),
(70, NULL, 'Al Nahyan neighbourhood', 2, '2021-02-19 13:34:15', '2021-02-19 13:34:15'),
(71, NULL, 'Al Nasr Street', 2, '2021-02-19 13:34:29', '2021-02-19 13:34:29'),
(72, NULL, 'Al Qubesat', 2, '2021-02-19 13:34:55', '2021-02-19 13:34:55'),
(73, NULL, 'Al Qurayyah Island', 2, '2021-02-19 13:35:16', '2021-02-19 13:35:16'),
(74, NULL, 'Al Qurm', 2, '2021-02-19 13:35:30', '2021-02-19 13:35:30'),
(75, NULL, 'Al Raha Gardens', 2, '2021-02-19 13:35:46', '2021-02-19 13:35:46'),
(76, NULL, 'Al Raha Golf Gardens', 2, '2021-02-19 13:35:59', '2021-02-19 13:35:59'),
(77, NULL, 'Al Ras Al Akhdar', 2, '2021-02-19 13:36:22', '2021-02-19 13:36:22'),
(78, NULL, 'Al Reef', 2, '2021-02-19 13:36:47', '2021-02-19 13:36:47'),
(79, NULL, 'Al Reef 2', 2, '2021-02-19 13:37:52', '2021-02-19 13:37:52'),
(80, NULL, 'Al Reef Villas', 2, '2021-02-19 13:39:27', '2021-02-19 13:39:27'),
(81, NULL, 'Al Reem Island', 2, '2021-02-19 13:39:47', '2021-02-19 13:39:47'),
(82, NULL, 'Al Rehhan', 2, '2021-02-19 13:43:12', '2021-02-19 13:43:12'),
(83, NULL, 'Al Rowdah', 2, '2021-02-19 13:44:08', '2021-02-19 13:44:08'),
(84, NULL, 'Al Ruwais', 2, '2021-02-19 13:44:29', '2021-02-19 13:44:29'),
(85, NULL, 'Al Safarat', 2, '2021-02-19 13:45:08', '2021-02-19 13:45:08'),
(86, NULL, 'Al Samha', 2, '2021-02-19 13:45:26', '2021-02-19 13:45:26'),
(87, NULL, 'Al Shahama', 2, '2021-02-19 13:47:02', '2021-02-19 13:47:02'),
(88, NULL, 'Al Shamkha', 2, '2021-02-19 13:49:24', '2021-02-19 13:49:24'),
(89, NULL, 'Al Shatie', 2, '2021-02-19 13:49:35', '2021-02-19 13:49:35'),
(90, NULL, 'Al Wathba', 2, '2021-02-19 13:49:47', '2021-02-19 13:49:47'),
(91, NULL, 'Al Zaab', 2, '2021-02-19 13:50:14', '2021-02-19 13:50:14'),
(92, NULL, 'Al Zahiyah', 2, '2021-02-19 13:51:02', '2021-02-19 13:51:02'),
(93, NULL, 'Al Zahraa', 2, '2021-02-19 13:51:31', '2021-02-19 13:51:31'),
(94, NULL, 'Ba Al Ghaylam Island', 2, '2021-02-19 13:51:44', '2021-02-19 13:51:44'),
(95, NULL, 'Bain Al Jisrain', 2, '2021-02-19 13:52:03', '2021-02-19 13:52:03'),
(96, NULL, 'Bal Rumaid Island', 2, '2021-02-19 13:52:16', '2021-02-19 13:52:16'),
(97, NULL, 'Bani Yas', 2, '2021-02-19 13:53:09', '2021-02-19 13:53:09'),
(98, NULL, 'Baniyas', 2, '2021-02-19 13:54:37', '2021-02-19 13:54:37'),
(99, NULL, 'Bisrat Al Fahid', 2, '2021-02-19 13:55:16', '2021-02-19 13:55:16'),
(100, NULL, 'Bloom Gardens', 2, '2021-02-19 13:55:27', '2021-02-19 13:55:27'),
(101, NULL, 'Capital Centre', 2, '2021-02-19 13:55:38', '2021-02-19 13:55:38'),
(102, NULL, 'City Of Lights', 2, '2021-02-19 13:55:52', '2021-02-19 13:55:52'),
(103, NULL, 'Danet', 2, '2021-02-19 13:56:04', '2021-02-19 13:56:04'),
(104, NULL, 'Electra Street', 2, '2021-02-19 13:56:16', '2021-02-19 13:56:16'),
(105, NULL, 'Emirates Palace', 2, '2021-02-19 13:56:26', '2021-02-19 13:56:26'),
(106, NULL, 'Etihad Towers', 2, '2021-02-19 13:56:37', '2021-02-19 13:56:37'),
(107, NULL, 'Fairmont Marina Residences', 2, '2021-02-19 13:56:47', '2021-02-19 13:56:47'),
(108, NULL, 'Futaysi Island', 2, '2021-02-19 13:57:24', '2021-02-19 13:57:24'),
(109, NULL, 'Ghantoot', 2, '2021-02-19 13:57:38', '2021-02-19 13:57:38'),
(110, NULL, 'Ghayathi', 2, '2021-02-19 13:57:53', '2021-02-19 13:57:53'),
(111, NULL, 'Hamdan Centre', 2, '2021-02-19 13:58:11', '2021-02-19 13:58:11'),
(112, NULL, 'Hideriyyat', 2, '2021-02-19 13:59:10', '2021-02-19 13:59:10'),
(113, NULL, 'ICAD Main Gate', 2, '2021-02-19 14:00:15', '2021-02-19 14:00:15'),
(114, NULL, 'Khalifa City', 2, '2021-02-19 14:01:12', '2021-02-19 14:01:12'),
(115, NULL, 'Khalifa City A', 2, '2021-02-19 14:01:29', '2021-02-19 14:01:29'),
(116, NULL, 'Khalifa City A', 2, '2021-02-19 14:01:49', '2021-02-19 14:01:49'),
(117, NULL, 'Khalifa City B', 2, '2021-02-19 14:02:07', '2021-02-19 14:02:07'),
(118, NULL, 'Khalifa City C', 2, '2021-02-19 14:02:20', '2021-02-19 14:02:20'),
(119, NULL, 'Khor Al Raha', 2, '2021-02-19 14:02:33', '2021-02-19 14:02:33'),
(120, NULL, 'Liwa', 2, '2021-02-19 14:02:49', '2021-02-19 14:02:49'),
(121, NULL, 'Liwa Village', 2, '2021-02-19 14:03:00', '2021-02-19 14:03:00'),
(122, NULL, 'Lulu Island', 2, '2021-02-19 14:04:00', '2021-02-19 14:04:00'),
(123, NULL, 'Madinat Zayed', 2, '2021-02-19 14:09:50', '2021-02-19 14:09:50'),
(124, NULL, 'Madinat Zayed City', 2, '2021-02-19 14:10:15', '2021-02-19 14:10:15'),
(125, NULL, 'Marina Heights', 2, '2021-02-19 14:10:27', '2021-02-19 14:10:27'),
(126, NULL, 'Marina Square', 2, '2021-02-19 14:10:38', '2021-02-19 14:10:38'),
(127, NULL, 'Marina Village (Abu Dhabi)', 2, '2021-02-19 14:10:54', '2021-02-19 14:10:54'),
(128, NULL, 'Abu Hail', 1, '2021-02-23 18:08:07', '2021-02-23 18:08:07'),
(129, NULL, 'Academic City', 1, '2021-02-23 18:09:07', '2021-02-23 18:09:07'),
(130, NULL, 'Akoya Oxygen', 1, '2021-02-23 18:09:27', '2021-02-23 18:09:27'),
(131, NULL, 'Al Awir', 1, '2021-02-23 18:10:19', '2021-02-23 18:10:19'),
(132, NULL, 'Al Badaa', 1, '2021-02-23 18:28:57', '2021-02-23 18:28:57'),
(133, NULL, 'Al Badia Hillside Village', 1, '2021-02-23 18:29:22', '2021-02-23 18:29:22'),
(134, NULL, 'Al Baraha', 1, '2021-02-23 18:30:06', '2021-02-23 18:30:06'),
(135, NULL, 'Al Barari', 1, '2021-02-23 18:30:17', '2021-02-23 18:30:17'),
(136, NULL, 'Al Barsha South 1', 1, '2021-02-23 18:30:35', '2021-02-23 18:30:35'),
(137, NULL, 'Al Barsha South 2', 1, '2021-02-23 18:30:55', '2021-02-23 18:30:55'),
(138, NULL, 'Al Barsha South 3', 1, '2021-02-23 18:31:13', '2021-02-23 18:31:13'),
(139, NULL, 'Al Furjan', 1, '2021-02-23 18:31:42', '2021-02-23 18:31:42'),
(140, NULL, 'Al Garhood', 1, '2021-02-23 18:32:06', '2021-02-23 18:32:06'),
(141, NULL, 'Al Ghusais - Al Qusais', 1, '2021-02-23 18:32:24', '2021-02-23 18:32:24'),
(142, NULL, 'Al Hudaiba', 1, '2021-02-23 18:32:43', '2021-02-23 18:32:43'),
(143, NULL, 'Al Jadaf', 1, '2021-02-23 18:32:57', '2021-02-23 18:32:57'),
(144, NULL, 'Al Jafiliya', 1, '2021-02-23 18:33:21', '2021-02-23 18:33:21'),
(145, NULL, 'Al Karama', 1, '2021-02-23 18:33:36', '2021-02-23 18:33:36'),
(146, NULL, 'Al Khabasi', 1, '2021-02-23 18:33:51', '2021-02-23 18:33:51'),
(147, NULL, 'Al Khail Gate Residential', 1, '2021-02-23 18:34:10', '2021-02-23 18:34:10'),
(148, NULL, 'Al Khawaneej 1', 1, '2021-02-23 18:35:20', '2021-02-23 18:35:20'),
(149, NULL, 'Al Khawaneej 2', 1, '2021-02-23 18:35:49', '2021-02-23 18:35:49'),
(150, NULL, 'Al Majara', 1, '2021-02-23 18:37:53', '2021-02-23 18:37:53'),
(151, NULL, 'Al Mamzar', 1, '2021-02-23 18:38:13', '2021-02-23 18:38:13'),
(152, NULL, 'Al Manara', 1, '2021-02-23 18:38:32', '2021-02-23 18:38:32'),
(153, NULL, 'Al Mankhool', 1, '2021-02-23 18:38:52', '2021-02-23 18:38:52'),
(154, NULL, 'Al Mina', 1, '2021-02-23 18:39:05', '2021-02-23 18:39:05'),
(155, NULL, 'Al Mizhar', 1, '2021-02-23 18:39:33', '2021-02-23 18:39:33'),
(156, NULL, 'Al Muraqqabat', 1, '2021-02-23 18:39:55', '2021-02-23 18:39:55'),
(157, NULL, 'Al Murar', 1, '2021-02-23 18:40:08', '2021-02-23 18:40:08'),
(158, NULL, 'Al Muteena', 1, '2021-02-23 18:40:21', '2021-02-23 18:40:21'),
(159, NULL, 'Al Nada 1', 1, '2021-02-23 18:40:36', '2021-02-23 18:40:36'),
(160, NULL, 'Al Nahda', 1, '2021-02-23 18:41:31', '2021-02-23 18:41:31'),
(161, NULL, 'Al Nahda 2', 1, '2021-02-23 18:41:42', '2021-02-23 18:41:42'),
(162, NULL, 'Al Nakheel', 1, '2021-02-23 18:41:54', '2021-02-23 18:41:54'),
(163, NULL, 'Al Quoz', 1, '2021-02-23 18:42:05', '2021-02-23 18:42:05'),
(164, NULL, 'Al Quoz Industrial Area 1', 1, '2021-02-23 18:42:17', '2021-02-23 18:42:17'),
(165, NULL, 'Al Quoz Industrial Area 2', 1, '2021-02-23 18:42:28', '2021-02-23 18:42:28'),
(166, NULL, 'Al Quoz Industrial Area 3', 1, '2021-02-23 18:42:39', '2021-02-23 18:42:39'),
(167, NULL, 'Al Quoz Industrial Area 4', 1, '2021-02-23 18:42:52', '2021-02-23 18:42:52'),
(168, NULL, 'Al Qusais', 1, '2021-02-23 18:43:06', '2021-02-23 18:43:06'),
(169, NULL, 'Al Qusais Industrial Area 1', 1, '2021-02-23 18:43:22', '2021-02-23 18:43:22'),
(170, NULL, 'Al Qusais Industrial Area 2', 1, '2021-02-23 18:43:34', '2021-02-23 18:43:34'),
(171, NULL, 'Al Qusais Industrial Area 4', 1, '2021-02-23 18:43:49', '2021-02-23 18:43:49'),
(172, NULL, 'Al Qusais Industrial Area 5', 1, '2021-02-23 18:44:01', '2021-02-23 18:44:01'),
(173, NULL, 'Al Ras', 1, '2021-02-23 18:44:14', '2021-02-23 18:44:14'),
(174, NULL, 'Al Rashidiya', 1, '2021-02-23 18:45:03', '2021-02-23 18:45:03'),
(175, NULL, 'Al Sabkha', 1, '2021-02-23 18:45:17', '2021-02-23 18:45:17'),
(176, NULL, 'Al Safa', 1, '2021-02-23 18:46:06', '2021-02-23 18:46:06'),
(177, NULL, 'Al Sufouh 1', 1, '2021-02-23 18:46:17', '2021-02-23 18:46:17'),
(178, NULL, 'Al Sufouh 2', 1, '2021-02-23 18:46:28', '2021-02-23 18:46:28'),
(179, NULL, 'Al Twar', 1, '2021-02-23 18:46:40', '2021-02-23 18:46:40'),
(180, NULL, 'Al Waheda', 1, '2021-02-23 18:46:52', '2021-02-23 18:46:52'),
(181, NULL, 'Al Warqaa', 1, '2021-02-23 18:47:01', '2021-02-23 18:47:01'),
(182, NULL, 'Al Warsan', 1, '2021-02-23 18:47:13', '2021-02-23 18:47:13'),
(183, NULL, 'Al Wasl', 1, '2021-02-23 18:47:23', '2021-02-23 18:47:23'),
(184, NULL, 'Arabian Ranches', 1, '2021-02-23 18:47:33', '2021-02-23 18:47:33'),
(185, NULL, 'Arizona', 1, '2021-02-23 18:47:44', '2021-02-23 18:47:44'),
(186, NULL, 'Arjan', 1, '2021-02-23 18:47:54', '2021-02-23 18:47:54'),
(187, NULL, 'Arno', 1, '2021-02-23 18:48:03', '2021-02-23 18:48:03'),
(188, NULL, 'Barsha Heights (Tecom)', 1, '2021-02-23 18:48:13', '2021-02-23 18:48:13'),
(189, NULL, 'Bay Central', 1, '2021-02-23 18:48:23', '2021-02-23 18:48:23'),
(190, NULL, 'Bella Casa', 1, '2021-02-23 18:48:33', '2021-02-23 18:48:33'),
(191, NULL, 'Bliss', 1, '2021-02-23 18:48:43', '2021-02-23 18:48:43'),
(192, NULL, 'Bluewaters Island', 1, '2021-02-23 18:48:54', '2021-02-23 18:48:54'),
(193, NULL, 'Boulevard Plaza Tower', 1, '2021-02-23 18:49:09', '2021-02-23 18:49:09'),
(194, NULL, 'Bristol Towers', 1, '2021-02-23 18:49:19', '2021-02-23 18:49:19'),
(195, NULL, 'Bukadra', 1, '2021-02-23 18:49:31', '2021-02-23 18:49:31'),
(196, NULL, 'Bur Dubai', 1, '2021-02-23 18:49:42', '2021-02-23 18:49:42'),
(197, NULL, 'Burj Khalifa Tower', 1, '2021-02-23 18:49:54', '2021-02-23 18:49:54'),
(198, NULL, 'Business Bay', 1, '2021-02-23 18:50:06', '2021-02-23 18:50:06'),
(199, NULL, 'Century Mall', 1, '2021-02-23 18:50:16', '2021-02-23 18:50:16'),
(200, NULL, 'City Walk', 1, '2021-02-23 18:50:27', '2021-02-23 18:50:27'),
(201, NULL, 'Corniche', 1, '2021-02-23 18:51:46', '2021-02-23 18:51:46'),
(202, NULL, 'Damac Hills', 1, '2021-02-23 18:51:58', '2021-02-23 18:51:58'),
(203, NULL, 'Daria Island', 1, '2021-02-23 18:52:10', '2021-02-23 18:52:10'),
(204, NULL, 'Deira', 1, '2021-02-23 18:52:20', '2021-02-23 18:52:20'),
(205, NULL, 'Deira Fish Market', 1, '2021-02-23 18:52:32', '2021-02-23 18:52:32'),
(206, NULL, 'DIFC', 1, '2021-02-23 18:52:43', '2021-02-23 18:52:43'),
(207, NULL, 'Discovery Gardens', 1, '2021-02-23 18:52:56', '2021-02-23 18:52:56'),
(208, NULL, 'DMC, DIC & KV Freezones', 1, '2021-02-23 18:53:06', '2021-02-23 18:53:06'),
(209, NULL, 'Downtown Dubai', 1, '2021-02-23 18:53:20', '2021-02-23 18:53:20'),
(210, NULL, 'Downtown Jebel Ali', 1, '2021-02-23 18:53:30', '2021-02-23 18:53:30'),
(211, NULL, 'Dubai Academic City', 1, '2021-02-23 18:53:42', '2021-02-23 18:53:42'),
(212, NULL, 'Dubai Airport', 1, '2021-02-23 18:54:08', '2021-02-23 18:54:08'),
(213, NULL, 'Dubai Airport Free Zone', 1, '2021-02-23 18:54:37', '2021-02-23 18:54:37'),
(214, NULL, 'Dubai Autodrome', 1, '2021-02-23 18:55:23', '2021-02-23 18:55:23'),
(215, NULL, 'Dubai Festival City', 1, '2021-02-23 18:55:45', '2021-02-23 18:55:45'),
(216, NULL, 'Dubai Golf City', 1, '2021-02-23 18:55:59', '2021-02-23 18:55:59'),
(217, NULL, 'Dubai Healthcare City (DHCC)', 1, '2021-02-23 18:56:14', '2021-02-23 18:56:14'),
(218, NULL, 'Dubai Hills Estate', 1, '2021-02-23 18:56:25', '2021-02-23 18:56:25'),
(219, NULL, 'Dubai Hills Estate', 1, '2021-02-23 18:57:28', '2021-02-23 18:57:28'),
(220, NULL, 'Dubai Hills Estate', 1, '2021-02-23 18:57:29', '2021-02-23 18:57:29'),
(221, NULL, 'Dubai Industrial Park', 1, '2021-02-23 18:57:50', '2021-02-23 18:57:50'),
(222, NULL, 'Dubai International Academic City', 1, '2021-02-23 18:58:03', '2021-02-23 18:58:03'),
(223, NULL, 'Dubai International Airport', 1, '2021-02-23 18:58:15', '2021-02-23 18:58:15'),
(224, NULL, 'Dubai International Financial Center', 1, '2021-02-23 18:58:26', '2021-02-23 18:58:26'),
(225, NULL, 'Dubai International Financial Center (DIFC)', 1, '2021-02-23 18:59:30', '2021-02-23 18:59:30'),
(226, NULL, 'Dubai Internet City', 1, '2021-02-23 18:59:47', '2021-02-23 18:59:47'),
(227, NULL, 'Dubai Investment Park (DIP)', 1, '2021-02-23 19:00:00', '2021-02-23 19:00:00'),
(228, NULL, 'Dubai Investments Park', 1, '2021-02-23 19:00:15', '2021-02-23 19:00:15'),
(229, NULL, 'Dubai Marina', 1, '2021-02-23 19:00:26', '2021-02-23 19:00:26'),
(230, NULL, 'Dubai Marina Walk', 1, '2021-02-23 19:00:37', '2021-02-23 19:00:37'),
(231, NULL, 'Dubai Media City', 1, '2021-02-23 19:00:48', '2021-02-23 19:00:48'),
(232, NULL, 'Dubai Media City 2', 1, '2021-02-23 19:01:25', '2021-02-23 19:01:25'),
(233, NULL, 'Dubai Outsource Zone', 1, '2021-02-23 19:01:34', '2021-02-23 19:01:34'),
(234, NULL, 'Dubai Production City', 1, '2021-02-23 19:01:43', '2021-02-23 19:01:43'),
(235, NULL, 'Dubai Silicon Oasis', 1, '2021-02-23 19:01:52', '2021-02-23 19:01:52'),
(236, NULL, 'Dubai South', 1, '2021-02-23 19:02:01', '2021-02-23 19:02:01'),
(237, NULL, 'Dubai Sports City', 1, '2021-02-23 19:02:10', '2021-02-23 19:02:10'),
(238, NULL, 'Dubai Studio City', 1, '2021-02-23 19:02:22', '2021-02-23 19:02:22'),
(239, NULL, 'Dubailand', 1, '2021-02-23 19:02:39', '2021-02-23 19:02:39'),
(240, NULL, 'Dubiotech', 1, '2021-02-23 19:02:50', '2021-02-23 19:02:50'),
(241, NULL, 'Dubiotech', 1, '2021-02-23 19:02:51', '2021-02-23 19:02:51'),
(242, NULL, 'Emaar Business Park', 1, '2021-02-23 19:03:02', '2021-02-23 19:03:02'),
(243, NULL, 'Emirates Golf Club', 1, '2021-02-23 19:04:29', '2021-02-23 19:04:29'),
(244, NULL, 'Emirates Hills', 1, '2021-02-23 19:04:41', '2021-02-23 19:04:41'),
(245, NULL, 'Falcon City of Wonders', 1, '2021-02-23 19:04:51', '2021-02-23 19:04:51'),
(246, NULL, 'Garhoud', 1, '2021-02-23 19:05:02', '2021-02-23 19:05:02'),
(247, NULL, 'Green Community', 1, '2021-02-23 19:05:13', '2021-02-23 19:05:13'),
(248, NULL, 'Green Community East', 1, '2021-02-23 19:05:23', '2021-02-23 19:05:23'),
(249, NULL, 'Green Community West', 1, '2021-02-23 19:05:35', '2021-02-23 19:05:35'),
(250, NULL, 'Hartland', 1, '2021-02-23 19:05:44', '2021-02-23 19:05:44'),
(251, NULL, 'Hartland', 1, '2021-02-23 19:05:45', '2021-02-23 19:05:45'),
(252, NULL, 'Hattan', 1, '2021-02-23 19:05:56', '2021-02-23 19:05:56'),
(253, NULL, 'Hefair', 1, '2021-02-23 19:06:08', '2021-02-23 19:06:08'),
(254, NULL, 'Hefair', 1, '2021-02-23 19:06:10', '2021-02-23 19:06:10'),
(255, NULL, 'Hor Al Anz', 1, '2021-02-23 19:06:18', '2021-02-23 19:06:18'),
(256, NULL, 'Hyatt', 1, '2021-02-23 19:06:27', '2021-02-23 19:06:27'),
(257, NULL, 'Hyatt', 1, '2021-02-23 19:06:27', '2021-02-23 19:06:27'),
(258, NULL, 'International City', 1, '2021-02-23 19:06:37', '2021-02-23 19:06:37'),
(259, NULL, 'Ivory Coast', 1, '2021-02-23 19:06:47', '2021-02-23 19:06:47'),
(260, NULL, 'Jebel Ali Free Zone', 1, '2021-02-23 19:06:57', '2021-02-23 19:06:57'),
(261, NULL, 'Jebel Ali Gardens', 1, '2021-02-23 19:07:15', '2021-02-23 19:07:15'),
(262, NULL, 'Jebel Ali Hills', 1, '2021-02-23 19:07:56', '2021-02-23 19:07:56'),
(263, NULL, 'Jebel Ali Industrial Area', 1, '2021-02-23 19:08:08', '2021-02-23 19:08:08'),
(264, NULL, 'Jebel Ali Industrial Area', 1, '2021-02-23 19:08:09', '2021-02-23 19:08:09'),
(265, NULL, 'Jebel Ali Industrial Area 1', 1, '2021-02-23 19:08:22', '2021-02-23 19:08:22'),
(266, NULL, 'Jebel Ali Industrial Area 3', 1, '2021-02-23 19:08:32', '2021-02-23 19:08:32'),
(267, NULL, 'Jebel Ali North Free Zone', 1, '2021-02-23 19:08:41', '2021-02-23 19:08:41'),
(268, NULL, 'Jebel Ali Port', 1, '2021-02-23 19:08:51', '2021-02-23 19:08:51'),
(269, NULL, 'Jebel Ali Village', 1, '2021-02-23 19:09:03', '2021-02-23 19:09:03'),
(270, NULL, 'Jumeirah', 1, '2021-02-23 19:09:14', '2021-02-23 19:09:14'),
(271, NULL, 'Jumeirah 1', 1, '2021-02-23 19:09:30', '2021-02-23 19:09:30'),
(272, NULL, 'Jumeirah 2', 1, '2021-02-23 19:09:40', '2021-02-23 19:09:40'),
(273, NULL, 'Jumeirah 3', 1, '2021-02-23 19:09:51', '2021-02-23 19:09:51'),
(274, NULL, 'Jumeirah Bay Island', 1, '2021-02-23 19:10:01', '2021-02-23 19:10:01'),
(275, NULL, 'Jumeirah Beach Residence (JBR)', 1, '2021-02-23 19:10:10', '2021-02-23 19:10:10'),
(276, NULL, 'Jumeirah Golf Estate', 1, '2021-02-23 19:10:19', '2021-02-23 19:10:19'),
(277, NULL, 'Jumeirah Heights', 1, '2021-02-23 19:10:49', '2021-02-23 19:10:49'),
(278, NULL, 'Jumeirah Islands', 1, '2021-02-23 19:11:01', '2021-02-23 19:11:01'),
(279, NULL, 'Jumeirah Lake Towers (JLT)', 1, '2021-02-23 19:11:13', '2021-02-23 19:11:13'),
(280, NULL, 'Jumeirah Park', 1, '2021-02-23 19:11:24', '2021-02-23 19:11:24'),
(281, NULL, 'Jumeirah Village', 1, '2021-02-23 19:11:34', '2021-02-23 19:11:34'),
(282, NULL, 'Jumeirah Village Circle', 1, '2021-02-23 19:11:44', '2021-02-23 19:11:44'),
(283, NULL, 'Jumeirah Village Circle', 1, '2021-02-23 19:11:45', '2021-02-23 19:11:45'),
(284, NULL, 'Jumeirah Village Triangle (JVT)', 1, '2021-02-23 19:11:56', '2021-02-23 19:11:56'),
(285, NULL, 'Knowledge Village', 1, '2021-02-23 19:12:06', '2021-02-23 19:12:06'),
(286, NULL, 'Madinat Jumeirah', 1, '2021-02-23 19:12:19', '2021-02-23 19:12:19'),
(287, NULL, 'Mall of the Emirates', 1, '2021-02-23 19:12:29', '2021-02-23 19:12:29'),
(288, NULL, 'Meadows Town Centre', 1, '2021-02-23 19:12:39', '2021-02-23 19:12:39'),
(289, NULL, 'Media City', 1, '2021-02-23 19:12:48', '2021-02-23 19:12:48'),
(290, NULL, 'Meydan', 1, '2021-02-23 19:12:57', '2021-02-23 19:12:57'),
(291, NULL, 'Mina Rashid', 1, '2021-02-23 19:13:06', '2021-02-23 19:13:06'),
(292, NULL, 'Mirdif', 1, '2021-02-23 19:13:16', '2021-02-23 19:13:16'),
(293, NULL, 'Mohammad Bin Rashid City', 1, '2021-02-23 19:13:24', '2021-02-23 19:13:24'),
(294, NULL, 'Montgomerie Golf Club', 1, '2021-02-23 19:13:34', '2021-02-23 19:13:34'),
(295, NULL, 'Motor City', 1, '2021-02-23 19:13:44', '2021-02-23 19:13:44'),
(296, NULL, 'Mudon', 1, '2021-02-23 19:13:54', '2021-02-23 19:13:54'),
(297, NULL, 'Muhaisnah', 1, '2021-02-23 19:14:02', '2021-02-23 19:14:02'),
(298, NULL, 'Nad Al Hamar', 1, '2021-02-23 19:14:11', '2021-02-23 19:14:11'),
(299, NULL, 'Nad Al Sheba', 1, '2021-02-23 19:14:20', '2021-02-23 19:14:20'),
(300, NULL, 'Nevada', 1, '2021-02-23 19:14:30', '2021-02-23 19:14:30'),
(301, NULL, 'New Mexico', 1, '2021-02-23 19:14:39', '2021-02-23 19:14:39'),
(302, NULL, 'Oasis Towers', 1, '2021-02-23 19:14:47', '2021-02-23 19:14:47'),
(303, NULL, 'Old Town Dubai', 1, '2021-02-23 19:14:57', '2021-02-23 19:14:57'),
(304, NULL, 'Oud Al Muteena 1', 1, '2021-02-23 19:15:07', '2021-02-23 19:15:07'),
(305, NULL, 'Oud Al Muteena 2', 1, '2021-02-23 19:15:18', '2021-02-23 19:15:18'),
(306, NULL, 'Oud Metha', 1, '2021-02-23 19:15:28', '2021-02-23 19:15:28'),
(307, NULL, 'Palm Deira', 1, '2021-02-23 19:15:38', '2021-02-23 19:15:38'),
(308, NULL, 'Palm Jebel Ali', 1, '2021-02-23 19:15:46', '2021-02-23 19:15:46'),
(309, NULL, 'Palm Jumeirah', 1, '2021-02-23 19:15:59', '2021-02-23 19:15:59'),
(310, NULL, 'Pearl Jumeirah', 1, '2021-02-23 19:16:09', '2021-02-23 19:16:09'),
(311, NULL, 'Ras Al Khor', 1, '2021-02-23 19:16:19', '2021-02-23 19:16:19'),
(312, NULL, 'Rashidiyah', 1, '2021-02-23 19:16:29', '2021-02-23 19:16:29'),
(313, NULL, 'Reem', 1, '2021-02-23 19:16:41', '2021-02-23 19:16:41'),
(314, NULL, 'Remraam', 1, '2021-02-23 19:16:50', '2021-02-23 19:16:50'),
(315, NULL, 'Saih Al Dahal', 1, '2021-02-23 19:17:00', '2021-02-23 19:17:00'),
(316, NULL, 'Saih Shua\'Alah', 1, '2021-02-23 19:17:09', '2021-02-23 19:17:09'),
(317, NULL, 'Satwa', 1, '2021-02-23 19:17:18', '2021-02-23 19:17:18'),
(318, NULL, 'Sheikh Zayed Road', 1, '2021-02-23 19:17:27', '2021-02-23 19:17:27'),
(319, NULL, 'Silicon Oasis', 1, '2021-02-23 19:17:41', '2021-02-23 19:17:41'),
(320, NULL, 'Sobha Hartland', 1, '2021-02-23 19:17:53', '2021-02-23 19:17:53'),
(321, NULL, 'The Greens', 1, '2021-02-23 19:18:01', '2021-02-23 19:18:01'),
(322, NULL, 'The Hills', 1, '2021-02-23 19:18:10', '2021-02-23 19:18:10'),
(323, NULL, 'The Lagoons', 1, '2021-02-23 19:18:21', '2021-02-23 19:18:21'),
(324, NULL, 'The Lakes', 1, '2021-02-23 19:18:30', '2021-02-23 19:18:30'),
(325, NULL, 'The Lakes', 1, '2021-02-23 19:18:40', '2021-02-23 19:18:40'),
(326, NULL, 'The Meadows', 1, '2021-02-23 19:18:46', '2021-02-23 19:18:46'),
(327, NULL, 'The Springs', 1, '2021-02-23 19:18:57', '2021-02-23 19:18:57'),
(328, NULL, 'The Sustainable City', 1, '2021-02-23 19:19:11', '2021-02-23 19:19:11'),
(329, NULL, 'The Views', 1, '2021-02-23 19:19:20', '2021-02-23 19:19:20'),
(330, NULL, 'The World', 1, '2021-02-23 19:19:30', '2021-02-23 19:19:30'),
(331, NULL, 'Town Square', 1, '2021-02-23 19:19:39', '2021-02-23 19:19:39'),
(332, NULL, 'Umm Al Sheif', 1, '2021-02-23 19:19:48', '2021-02-23 19:19:48'),
(333, NULL, 'Umm Hurair', 1, '2021-02-23 19:19:58', '2021-02-23 19:19:58'),
(334, NULL, 'Umm Hurair', 1, '2021-02-23 19:20:07', '2021-02-23 19:20:07'),
(335, NULL, 'Umm Ramool', 1, '2021-02-23 19:20:11', '2021-02-23 19:20:11'),
(336, NULL, 'Umm Suqiem', 1, '2021-02-23 19:20:23', '2021-02-23 19:20:23'),
(337, NULL, 'Wadi Al Safa', 1, '2021-02-23 19:20:33', '2021-02-23 19:20:33'),
(338, NULL, 'Waterfront Jebel Ali', 1, '2021-02-23 19:20:42', '2021-02-23 19:20:42'),
(339, NULL, 'World Trade Center', 1, '2021-02-23 19:20:51', '2021-02-23 19:20:51'),
(340, NULL, 'Zabeel', 1, '2021-02-23 19:21:01', '2021-02-23 19:21:01'),
(386, NULL, 'Abu Shagara', 3, '2021-02-23 20:14:33', '2021-02-23 20:14:33'),
(388, NULL, 'Al Abar', 3, '2021-02-23 20:16:39', '2021-02-23 20:16:39'),
(389, NULL, 'Al Atain', 3, '2021-02-23 20:18:00', '2021-02-23 20:18:00'),
(390, NULL, 'Al Azra', 3, '2021-02-23 20:18:17', '2021-02-23 20:18:17'),
(391, NULL, 'Al Barashi', 3, '2021-02-23 20:19:03', '2021-02-23 20:19:03'),
(392, NULL, 'Al Bu Daniq', 3, '2021-02-23 20:19:17', '2021-02-23 20:19:17'),
(393, NULL, 'Al Buhaira', 3, '2021-02-23 20:19:29', '2021-02-23 20:19:29'),
(394, NULL, 'Al Darari', 3, '2021-02-23 20:19:44', '2021-02-23 20:19:44'),
(395, NULL, 'Al Dhaid', 3, '2021-02-23 20:19:58', '2021-02-23 20:19:58'),
(396, NULL, 'Al Falaj', 3, '2021-02-23 20:20:12', '2021-02-23 20:20:12'),
(397, NULL, 'Al Fayha', 3, '2021-02-23 20:20:28', '2021-02-23 20:20:28'),
(398, NULL, 'Al Fisht', 3, '2021-02-23 20:20:49', '2021-02-23 20:20:49'),
(399, NULL, 'Al Ghafia', 3, '2021-02-23 20:21:01', '2021-02-23 20:21:01'),
(400, NULL, 'Al Gharayan', 3, '2021-02-23 20:21:13', '2021-02-23 20:21:13'),
(401, NULL, 'Al Gharb', 3, '2021-02-23 20:21:26', '2021-02-23 20:21:26'),
(402, NULL, 'Al Ghubaiba', 3, '2021-02-23 20:22:03', '2021-02-23 20:22:03'),
(403, NULL, 'Al Ghuwair', 3, '2021-02-23 20:22:21', '2021-02-23 20:22:21'),
(404, NULL, 'Al Goaz', 3, '2021-02-23 20:22:55', '2021-02-23 20:22:55'),
(405, NULL, 'Al Hamriyah', 3, '2021-02-23 20:23:07', '2021-02-23 20:23:07'),
(406, NULL, 'Al Hazannah', 3, '2021-02-23 20:23:20', '2021-02-23 20:23:20'),
(408, NULL, 'Al Heerah Suburb', 3, '2021-02-23 20:23:45', '2021-02-23 20:23:45'),
(411, NULL, 'Al Jazzat', 3, '2021-02-23 20:24:19', '2021-02-23 20:24:19'),
(412, NULL, 'Al Jazzat', 3, '2021-02-23 20:24:29', '2021-02-23 20:24:29'),
(413, NULL, 'Al Jubail', 3, '2021-02-23 20:24:39', '2021-02-23 20:24:39'),
(414, NULL, 'Al Juraina', 3, '2021-02-23 20:24:53', '2021-02-23 20:24:53'),
(415, NULL, 'Al Khaledia', 3, '2021-02-23 20:25:04', '2021-02-23 20:25:04'),
(416, NULL, 'Al Khalid Lake Trail', 3, '2021-02-23 20:25:26', '2021-02-23 20:25:26'),
(417, NULL, 'Al Khan', 3, '2021-02-23 20:25:43', '2021-02-23 20:25:43'),
(418, NULL, 'Al Khezamia', 3, '2021-02-23 20:26:07', '2021-02-23 20:26:07'),
(419, NULL, 'Al Layyeh', 3, '2021-02-23 20:28:33', '2021-02-23 20:28:33'),
(420, NULL, 'Al Madam', 3, '2021-02-23 20:28:47', '2021-02-23 20:28:47'),
(421, NULL, 'Al Majaz 1', 3, '2021-02-23 20:29:04', '2021-02-23 20:29:04'),
(422, NULL, 'Al Majaz 2', 3, '2021-02-23 20:29:15', '2021-02-23 20:29:15'),
(423, NULL, 'Al Majaz 3', 3, '2021-02-23 20:29:26', '2021-02-23 20:29:26'),
(424, NULL, 'Al Mamzar', 3, '2021-02-23 20:29:40', '2021-02-23 20:29:40'),
(425, NULL, 'Al Manakh', 3, '2021-02-23 20:29:52', '2021-02-23 20:29:52'),
(426, NULL, 'Al Mansura', 3, '2021-02-23 20:30:05', '2021-02-23 20:30:05'),
(427, NULL, 'Al Mareija', 3, '2021-02-23 20:30:18', '2021-02-23 20:30:18'),
(428, NULL, 'Al Mujarrah', 3, '2021-02-23 20:31:09', '2021-02-23 20:31:09'),
(429, NULL, 'Al Muntazah', 3, '2021-02-23 20:31:23', '2021-02-23 20:31:23'),
(431, NULL, 'Al Mussalla', 3, '2021-02-23 20:31:41', '2021-02-23 20:31:41'),
(432, NULL, 'Al Muwafjah', 3, '2021-02-23 20:31:53', '2021-02-23 20:31:53'),
(433, NULL, 'Al Nabba', 3, '2021-02-23 20:32:05', '2021-02-23 20:32:05'),
(436, NULL, 'Al Nahda', 3, '2021-02-23 20:33:34', '2021-02-23 20:33:34'),
(437, NULL, 'Al Nahda', 3, '2021-02-23 20:33:41', '2021-02-23 20:33:41'),
(438, NULL, 'Al Nasserya', 3, '2021-02-23 20:33:57', '2021-02-23 20:33:57'),
(439, NULL, 'Al Nishama', 3, '2021-02-23 20:34:10', '2021-02-23 20:34:10'),
(440, NULL, 'Al Nouf', 3, '2021-02-23 20:34:24', '2021-02-23 20:34:24'),
(441, NULL, 'Al Nouf 1', 3, '2021-02-23 20:34:41', '2021-02-23 20:34:41'),
(442, NULL, 'Al Nud', 3, '2021-02-23 20:35:10', '2021-02-23 20:35:10'),
(443, NULL, 'Al Qadisia', 3, '2021-02-23 20:35:46', '2021-02-23 20:35:46'),
(444, NULL, 'Al Qarrayen', 3, '2021-02-23 20:36:02', '2021-02-23 20:36:02'),
(445, NULL, 'Al Qasba', 3, '2021-02-23 20:36:19', '2021-02-23 20:36:19'),
(446, NULL, 'Al Qasimia', 3, '2021-02-23 20:36:31', '2021-02-23 20:36:31'),
(447, NULL, 'Al Qulayaah', 3, '2021-02-23 20:36:44', '2021-02-23 20:36:44'),
(448, NULL, 'Al Rahmaniya', 3, '2021-02-23 20:36:57', '2021-02-23 20:36:57'),
(449, NULL, 'Al Ramla', 3, '2021-02-23 20:37:32', '2021-02-23 20:37:32'),
(450, NULL, 'Al Ramla East', 3, '2021-02-23 20:37:45', '2021-02-23 20:37:45'),
(451, NULL, 'Al Ramla West', 3, '2021-02-23 20:37:58', '2021-02-23 20:37:58'),
(452, NULL, 'Al Ramtha', 3, '2021-02-23 20:38:11', '2021-02-23 20:38:11'),
(453, NULL, 'Al Rifah', 3, '2021-02-23 20:38:24', '2021-02-23 20:38:24'),
(454, NULL, 'Al Riqa Suburb', 3, '2021-02-23 20:38:39', '2021-02-23 20:38:39'),
(455, NULL, 'Al Sabkha', 3, '2021-02-23 20:38:53', '2021-02-23 20:38:53'),
(456, NULL, 'Al Sajja', 3, '2021-02-23 20:39:06', '2021-02-23 20:39:06'),
(457, NULL, 'Al Seef', 3, '2021-02-23 20:39:25', '2021-02-23 20:39:25'),
(458, NULL, 'Al Shahba', 3, '2021-02-23 20:39:41', '2021-02-23 20:39:41'),
(459, NULL, 'Al Shuwaihean', 3, '2021-02-23 20:39:56', '2021-02-23 20:39:56'),
(460, NULL, 'Al Soor', 3, '2021-02-23 20:40:08', '2021-02-23 20:40:08'),
(462, NULL, 'Al Suyoh', 3, '2021-02-23 20:40:33', '2021-02-23 20:40:33'),
(463, NULL, 'Al Suyoh 1', 3, '2021-02-23 20:40:47', '2021-02-23 20:40:47'),
(464, NULL, 'Al Suyoh 2', 3, '2021-02-23 20:41:00', '2021-02-23 20:41:00'),
(465, NULL, 'Al Suyoh 3', 3, '2021-02-23 20:41:15', '2021-02-23 20:41:15'),
(466, NULL, 'Al Suyoh 4', 3, '2021-02-23 20:41:29', '2021-02-23 20:41:29'),
(467, NULL, 'Al Suyoh 5', 3, '2021-02-23 20:41:42', '2021-02-23 20:41:42'),
(468, NULL, 'Al Suyoh 6', 3, '2021-02-23 20:41:56', '2021-02-23 20:41:56'),
(469, NULL, 'Al Suyoh 7', 3, '2021-02-23 20:42:11', '2021-02-23 20:42:11'),
(470, NULL, 'Al Sweihat', 3, '2021-02-23 20:42:24', '2021-02-23 20:42:24'),
(471, NULL, 'Al Taawun', 3, '2021-02-23 20:42:37', '2021-02-23 20:42:37'),
(472, NULL, 'Al Tai', 3, '2021-02-23 20:42:48', '2021-02-23 20:42:48'),
(473, NULL, 'Al Talae', 3, '2021-02-23 20:45:02', '2021-02-23 20:45:02'),
(474, NULL, 'Al Tayy Suburb', 3, '2021-02-23 20:45:23', '2021-02-23 20:45:23'),
(475, NULL, 'Al Wahda Street', 3, '2021-02-23 20:45:43', '2021-02-23 20:45:43'),
(476, NULL, 'Al Yarmook', 3, '2021-02-23 20:45:55', '2021-02-23 20:45:55'),
(477, NULL, 'Al Yash', 3, '2021-02-23 20:46:15', '2021-02-23 20:46:15'),
(478, NULL, 'Al Zubair', 3, '2021-02-23 20:46:28', '2021-02-23 20:46:28'),
(480, NULL, 'Barashi', 3, '2021-02-23 20:47:00', '2021-02-23 20:47:00'),
(481, NULL, 'Batayeh', 3, '2021-02-23 20:47:11', '2021-02-23 20:47:11'),
(482, NULL, 'Bu Tina', 3, '2021-02-23 20:47:22', '2021-02-23 20:47:22'),
(484, NULL, 'Corniche Al Buhaira', 3, '2021-02-23 20:48:12', '2021-02-23 20:48:12'),
(485, NULL, 'Dasman', 3, '2021-02-23 20:48:23', '2021-02-23 20:48:23'),
(487, NULL, 'Emirates Industrial City', 3, '2021-02-23 20:48:52', '2021-02-23 20:48:52'),
(488, NULL, 'Halwan Suburb', 3, '2021-02-23 20:49:03', '2021-02-23 20:49:03'),
(489, NULL, 'Hamriyah', 3, '2021-02-23 20:49:26', '2021-02-23 20:49:26'),
(491, NULL, 'Industrial Area', 3, '2021-02-23 20:50:02', '2021-02-23 20:50:02'),
(492, NULL, 'Industrial Area 1', 3, '2021-02-23 20:50:13', '2021-02-23 20:50:13'),
(493, NULL, 'Industrial Area 2', 3, '2021-02-23 20:51:08', '2021-02-23 20:51:08'),
(494, NULL, 'Industrial Area 3', 3, '2021-02-23 20:51:20', '2021-02-23 20:51:20'),
(495, NULL, 'Industrial Area 4', 3, '2021-02-23 20:51:31', '2021-02-23 20:51:31'),
(496, NULL, 'Industrial Area 5', 3, '2021-02-23 20:51:43', '2021-02-23 20:51:43'),
(497, NULL, 'Industrial Area 6', 3, '2021-02-23 20:51:54', '2021-02-23 20:51:54'),
(498, NULL, 'Industrial Area 7', 3, '2021-02-23 20:52:04', '2021-02-23 20:52:04'),
(500, NULL, 'Industrial Area 8', 3, '2021-02-23 20:53:02', '2021-02-23 20:53:02'),
(501, NULL, 'Industrial Area 9', 3, '2021-02-23 20:53:25', '2021-02-23 20:53:25'),
(502, NULL, 'Industrial Area 10', 3, '2021-02-23 20:53:37', '2021-02-23 20:53:37'),
(503, NULL, 'Industrial Area 11', 3, '2021-02-23 20:53:55', '2021-02-23 20:53:55'),
(504, NULL, 'Industrial Area 12', 3, '2021-02-23 20:54:05', '2021-02-23 20:54:05'),
(505, NULL, 'Industrial Area 13', 3, '2021-02-23 20:54:16', '2021-02-23 20:54:16'),
(506, NULL, 'Industrial Area 14', 3, '2021-02-23 20:54:27', '2021-02-23 20:54:27'),
(507, NULL, 'Industrial Area 15', 3, '2021-02-23 20:54:38', '2021-02-23 20:54:38'),
(508, NULL, 'Industrial Area 16', 3, '2021-02-23 20:54:48', '2021-02-23 20:54:48'),
(509, NULL, 'Industrial Area 17', 3, '2021-02-23 20:54:59', '2021-02-23 20:54:59'),
(510, NULL, 'Industrial Area 18', 3, '2021-02-23 20:55:09', '2021-02-23 20:55:09'),
(511, NULL, 'Juwaiza', 3, '2021-02-23 20:56:41', '2021-02-23 20:56:41'),
(513, NULL, 'Kalbah', 3, '2021-02-23 20:56:53', '2021-02-23 20:56:53'),
(514, NULL, 'Khorfakhan', 3, '2021-02-23 20:57:03', '2021-02-23 20:57:03'),
(515, NULL, 'King Faisal Square', 3, '2021-02-23 20:57:15', '2021-02-23 20:57:15'),
(516, NULL, 'Maleha', 3, '2021-02-23 20:57:25', '2021-02-23 20:57:25'),
(517, NULL, 'Maryam Island', 3, '2021-02-23 20:57:38', '2021-02-23 20:57:38'),
(518, NULL, 'Maysaloon', 3, '2021-02-23 20:57:50', '2021-02-23 20:57:50'),
(519, NULL, 'Mughaidir Suburb', 3, '2021-02-23 20:58:00', '2021-02-23 20:58:00'),
(520, NULL, 'Muwafjah', 3, '2021-02-23 20:58:13', '2021-02-23 20:58:13'),
(521, NULL, 'Muwaileh', 3, '2021-02-23 20:58:23', '2021-02-23 20:58:23'),
(522, NULL, 'Nasma Residences', 3, '2021-02-23 20:58:37', '2021-02-23 20:58:37'),
(523, NULL, 'Rolla Square', 3, '2021-02-23 20:58:49', '2021-02-23 20:58:49'),
(524, NULL, 'Sahara Towers', 3, '2021-02-23 20:59:01', '2021-02-23 20:59:01'),
(525, NULL, 'Saif Zone', 3, '2021-02-23 20:59:19', '2021-02-23 20:59:19'),
(526, NULL, 'Samnan', 3, '2021-02-23 20:59:27', '2021-02-23 20:59:27'),
(527, NULL, 'Sharjah Airport International Free Zone (SAIF Zone)', 3, '2021-02-23 20:59:42', '2021-02-23 20:59:42'),
(528, NULL, 'Sharjah Industrial Area', 3, '2021-02-23 20:59:59', '2021-02-23 20:59:59'),
(529, NULL, 'Sharjah Investment Centre', 3, '2021-02-23 21:00:15', '2021-02-23 21:00:15'),
(530, NULL, 'Sharjah Sustainable City', 3, '2021-02-23 21:00:56', '2021-02-23 21:00:56'),
(531, NULL, 'Sharjah Waterfront City', 3, '2021-02-23 21:01:09', '2021-02-23 21:01:09'),
(532, NULL, 'Sharqan', 3, '2021-02-23 21:01:20', '2021-02-23 21:01:20'),
(533, NULL, 'Tasjeel Village', 3, '2021-02-23 21:01:33', '2021-02-23 21:01:33'),
(534, NULL, 'Tilal City', 3, '2021-02-23 21:01:44', '2021-02-23 21:01:44'),
(536, NULL, 'Um Tarrafa', 3, '2021-02-23 21:02:10', '2021-02-23 21:02:10'),
(537, NULL, 'University City', 3, '2021-02-23 21:02:25', '2021-02-23 21:02:25'),
(538, NULL, 'Wasit Suburb', 3, '2021-02-23 21:02:39', '2021-02-23 21:02:39'),
(539, NULL, 'Ajman Downtown', 4, '2021-02-23 21:28:42', '2021-02-23 21:28:42'),
(540, NULL, 'Ajman Global City', 4, '2021-02-23 21:28:57', '2021-02-23 21:28:57'),
(541, NULL, 'Ajman Industrial Area', 4, '2021-02-23 21:29:15', '2021-02-23 21:29:15'),
(542, NULL, 'Ajman Industrial Area 1', 4, '2021-02-23 21:29:29', '2021-02-23 21:29:29'),
(543, NULL, 'Ajman Marina', 4, '2021-02-23 21:29:41', '2021-02-23 21:29:41'),
(544, NULL, 'Ajman Uptown', 4, '2021-02-23 21:29:58', '2021-02-23 21:29:58'),
(545, NULL, 'Al Alia', 4, '2021-02-23 21:30:34', '2021-02-23 21:30:34'),
(546, NULL, 'Al Ameera Village', 4, '2021-02-23 21:31:48', '2021-02-23 21:31:48'),
(547, NULL, 'Al Bustan', 4, '2021-02-23 21:31:56', '2021-02-23 21:31:56'),
(548, NULL, 'Al Bustan', 4, '2021-02-23 21:31:57', '2021-02-23 21:31:57'),
(549, NULL, 'Al Butain', 4, '2021-02-23 21:32:11', '2021-02-23 21:32:11'),
(554, NULL, 'Al Hamidiyah', 4, '2021-02-23 21:35:15', '2021-02-23 21:35:15'),
(559, NULL, 'Al Helio', 4, '2021-02-23 21:36:33', '2021-02-23 21:36:33'),
(560, NULL, 'Al Helio 1', 4, '2021-02-23 21:36:49', '2021-02-23 21:36:49'),
(561, NULL, 'Al Helio 2', 4, '2021-02-23 21:37:02', '2021-02-23 21:37:02'),
(563, NULL, 'Al Jurf', 4, '2021-02-23 21:37:27', '2021-02-23 21:37:27'),
(564, NULL, 'Al Jurf Industrial', 4, '2021-02-23 21:37:39', '2021-02-23 21:37:39'),
(565, NULL, 'Al Karama Ajman', 4, '2021-02-23 21:37:54', '2021-02-23 21:37:54'),
(568, NULL, 'Al Mowaihat', 4, '2021-02-23 21:38:29', '2021-02-23 21:38:29'),
(569, NULL, 'Al Mowaihat', 4, '2021-02-23 21:38:39', '2021-02-23 21:38:39'),
(570, NULL, 'Al Mowaihat 1', 4, '2021-02-23 21:38:52', '2021-02-23 21:38:52'),
(571, NULL, 'Al Mowaihat 2', 4, '2021-02-23 21:39:06', '2021-02-23 21:39:06'),
(572, NULL, 'Al Mowaihat 3', 4, '2021-02-23 21:39:24', '2021-02-23 21:39:24'),
(573, NULL, 'Al Nakhil', 4, '2021-02-23 21:40:01', '2021-02-23 21:40:01'),
(575, NULL, 'Al Nuaimiya', 4, '2021-02-23 21:41:04', '2021-02-23 21:41:04'),
(576, NULL, 'Al Nuaimiya 1', 4, '2021-02-23 21:41:15', '2021-02-23 21:41:15'),
(577, NULL, 'Al Nuaimiya 2', 4, '2021-02-23 21:41:28', '2021-02-23 21:41:28'),
(578, NULL, 'Al Nuaimiya 3', 4, '2021-02-23 21:41:45', '2021-02-23 21:41:45'),
(579, NULL, 'Al Owan', 4, '2021-02-23 21:41:58', '2021-02-23 21:41:58'),
(582, NULL, 'Al Raqaib', 4, '2021-02-23 21:42:49', '2021-02-23 21:42:49'),
(583, NULL, 'Al Rashidiyah', 4, '2021-02-23 21:43:08', '2021-02-23 21:43:08'),
(584, NULL, 'Al Rashidiya 2', 4, '2021-02-23 21:43:22', '2021-02-23 21:43:22'),
(585, NULL, 'Al Rawda 1', 4, '2021-02-23 21:43:36', '2021-02-23 21:43:36'),
(586, NULL, 'Al Rawda 2', 4, '2021-02-23 21:43:47', '2021-02-23 21:43:47'),
(587, NULL, 'Al Rawda 3', 4, '2021-02-23 21:43:59', '2021-02-23 21:43:59'),
(588, NULL, 'Al Rifa\'ah', 4, '2021-02-23 21:44:21', '2021-02-23 21:44:21'),
(589, NULL, 'Al Rumailah', 4, '2021-02-23 21:44:35', '2021-02-23 21:44:35'),
(590, NULL, 'Al Sawan', 4, '2021-02-23 21:44:47', '2021-02-23 21:44:47'),
(592, NULL, 'Al Yasmeen', 4, '2021-02-23 21:45:11', '2021-02-23 21:45:11'),
(593, NULL, 'Al Zahra', 4, '2021-02-23 21:45:24', '2021-02-23 21:45:24'),
(595, NULL, 'Al Zorah', 4, '2021-02-23 21:45:53', '2021-02-23 21:45:53'),
(596, NULL, 'Corniche Ajman', 4, '2021-02-23 21:46:05', '2021-02-23 21:46:05'),
(597, NULL, 'Emirates City', 4, '2021-02-23 21:46:18', '2021-02-23 21:46:18'),
(598, NULL, 'Garden City Al Jurf', 4, '2021-02-23 21:46:31', '2021-02-23 21:46:31'),
(599, NULL, 'King Faisal Street', 4, '2021-02-23 21:46:46', '2021-02-23 21:46:46'),
(600, NULL, 'Mantiza', 4, '2021-02-23 21:46:58', '2021-02-23 21:46:58'),
(601, NULL, 'Masfout', 4, '2021-02-23 21:47:18', '2021-02-23 21:47:18'),
(602, NULL, 'Musherief', 4, '2021-02-23 21:47:26', '2021-02-23 21:47:26'),
(603, NULL, 'New Industrial City', 4, '2021-02-23 21:47:38', '2021-02-23 21:47:38'),
(605, NULL, 'Al Dar Al Baida B', 22, '2021-02-23 22:18:28', '2021-02-23 22:18:28'),
(606, NULL, 'Al Dar Al Baida', 22, '2021-02-23 22:18:51', '2021-02-23 22:18:51'),
(608, NULL, 'Al Humrah A', 22, '2021-02-23 22:19:40', '2021-02-23 22:19:40'),
(609, NULL, 'Al Humrah', 22, '2021-02-23 22:19:55', '2021-02-23 22:19:55'),
(611, NULL, 'Al Maidan', 22, '2021-02-23 22:20:11', '2021-02-23 22:20:11'),
(612, NULL, 'Al Maqtaa', 22, '2021-02-23 22:20:29', '2021-02-23 22:20:29'),
(613, NULL, 'Al Ramlah', 22, '2021-02-23 22:20:47', '2021-02-23 22:20:47'),
(614, NULL, 'Al Ramlah B', 22, '2021-02-23 22:21:11', '2021-02-23 22:21:11'),
(615, NULL, 'Al Rass', 22, '2021-02-23 22:21:32', '2021-02-23 22:21:32'),
(616, NULL, 'Al Rass A', 22, '2021-02-23 22:21:48', '2021-02-23 22:21:48'),
(617, NULL, 'Al Rass D', 22, '2021-02-23 22:22:06', '2021-02-23 22:22:06'),
(618, NULL, 'Al Raudah', 22, '2021-02-23 22:22:23', '2021-02-23 22:22:23'),
(619, NULL, 'Al Riqqah', 22, '2021-02-23 22:22:43', '2021-02-23 22:22:43'),
(620, NULL, 'Al Salamah', 22, '2021-02-23 22:23:06', '2021-02-23 22:23:06'),
(623, NULL, 'Emirates Modern Industrial Area', 22, '2021-02-23 22:24:04', '2021-02-23 22:24:04'),
(624, NULL, 'Falaj Al Mualla', 22, '2021-02-23 22:24:20', '2021-02-23 22:24:20'),
(625, NULL, 'Industrial Area', 22, '2021-02-23 22:24:40', '2021-02-23 22:24:40'),
(626, NULL, 'King Faisal Street', 22, '2021-02-23 22:24:55', '2021-02-23 22:24:55'),
(628, NULL, 'Old Town Area', 22, '2021-02-23 22:25:29', '2021-02-23 22:25:29'),
(629, NULL, 'Umm Al Quwain Marina', 22, '2021-02-23 22:25:43', '2021-02-23 22:25:43'),
(630, NULL, 'Al Aahad', 22, '2021-02-24 00:49:31', '2021-02-24 00:49:31'),
(631, NULL, 'Al Abraq', 22, '2021-02-24 00:49:56', '2021-02-24 00:49:56'),
(632, NULL, 'Al Haditha', 22, '2021-02-24 00:50:12', '2021-02-24 00:50:12'),
(633, NULL, 'Biyatah', 22, '2021-02-24 00:50:33', '2021-02-24 00:50:33'),
(634, NULL, 'Al Hawiyah', 22, '2021-02-24 00:50:51', '2021-02-24 00:50:51'),
(635, NULL, 'Al Rafaah', 22, '2021-02-24 00:51:13', '2021-02-24 00:51:13'),
(636, NULL, 'Afarah', 23, '2021-02-24 00:58:57', '2021-02-24 00:58:57'),
(637, NULL, 'Al Aqqa', 23, '2021-02-24 00:59:36', '2021-02-24 00:59:36'),
(638, NULL, 'Al Badiyah', 23, '2021-02-24 01:00:01', '2021-02-24 01:00:01'),
(639, NULL, 'Al Fanar 1', 23, '2021-02-24 01:00:59', '2021-02-24 01:00:59'),
(640, NULL, 'Al Fanar 2', 23, '2021-02-24 01:03:03', '2021-02-24 01:03:03'),
(642, NULL, 'Al Farfar', 23, '2021-02-24 01:03:50', '2021-02-24 01:03:50'),
(643, NULL, 'Al Faseel', 23, '2021-02-24 01:04:08', '2021-02-24 01:04:08'),
(644, NULL, 'Al Fuqait', 23, '2021-02-24 01:04:23', '2021-02-24 01:04:23'),
(645, NULL, 'Al Halah', 23, '2021-02-24 01:04:43', '2021-02-24 01:04:43'),
(646, NULL, 'Al Manama', 23, '2021-02-24 01:05:06', '2021-02-24 01:05:06'),
(647, NULL, 'Al Theeb', 23, '2021-02-24 01:05:22', '2021-02-24 01:05:22'),
(648, NULL, 'Dibba', 23, '2021-02-24 01:05:37', '2021-02-24 01:05:37'),
(649, NULL, 'Fujairah Freezone', 23, '2021-02-24 01:06:05', '2021-02-24 01:06:05'),
(650, NULL, 'Gurfah', 23, '2021-02-24 01:06:21', '2021-02-24 01:06:21'),
(651, NULL, 'Hayl', 23, '2021-02-24 01:06:35', '2021-02-24 01:06:35'),
(652, NULL, 'Kalba', 23, '2021-02-24 01:06:51', '2021-02-24 01:06:51'),
(653, NULL, 'Khor Fakkan', 23, '2021-02-24 01:07:06', '2021-02-24 01:07:06'),
(654, NULL, 'Merashid', 23, '2021-02-24 01:07:20', '2021-02-24 01:07:20'),
(655, NULL, 'Sakamkam', 23, '2021-02-24 01:07:35', '2021-02-24 01:07:35'),
(656, NULL, 'Saniaya', 23, '2021-02-24 01:07:57', '2021-02-24 01:07:57'),
(657, NULL, 'Abu Huraybah', 24, '2021-02-24 01:08:47', '2021-02-24 01:08:47'),
(658, NULL, 'Abu Krayyah', 24, '2021-02-24 01:09:03', '2021-02-24 01:09:03'),
(659, NULL, 'Abu Samrah', 24, '2021-02-24 01:09:20', '2021-02-24 01:09:20'),
(660, NULL, 'Al Agabiyya', 24, '2021-02-24 01:09:35', '2021-02-24 01:09:35'),
(661, NULL, 'Al Ain Industrial Area', 24, '2021-02-24 01:09:48', '2021-02-24 01:09:48'),
(662, NULL, 'Al Bateen', 24, '2021-02-24 01:10:02', '2021-02-24 01:10:02'),
(663, NULL, 'Al Dhahir', 24, '2021-02-24 01:10:20', '2021-02-24 01:10:20'),
(664, NULL, 'Al Falaj Hazzaa', 24, '2021-02-24 01:10:34', '2021-02-24 01:10:34'),
(667, NULL, 'Al Faqa', 24, '2021-02-24 01:10:51', '2021-02-24 01:10:51'),
(668, NULL, 'Al Foah', 24, '2021-02-24 01:11:04', '2021-02-24 01:11:04'),
(669, NULL, 'Al Grayyeh', 24, '2021-02-24 01:11:16', '2021-02-24 01:11:16'),
(670, NULL, 'Al Haiyir', 24, '2021-02-24 01:11:35', '2021-02-24 01:11:35'),
(671, NULL, 'Al Hili', 24, '2021-02-24 01:11:56', '2021-02-24 01:11:56'),
(672, NULL, 'Al Jaheli', 24, '2021-02-24 01:12:11', '2021-02-24 01:12:11'),
(674, NULL, 'Al Jimi', 24, '2021-02-24 01:12:25', '2021-02-24 01:12:25'),
(675, NULL, 'Al Khabisi', 24, '2021-02-24 01:12:38', '2021-02-24 01:12:38'),
(676, NULL, 'Al Khalidiya', 24, '2021-02-24 01:12:50', '2021-02-24 01:12:50'),
(677, NULL, 'Al Khazna', 24, '2021-02-24 01:13:09', '2021-02-24 01:13:09'),
(678, NULL, 'Al Maqam', 24, '2021-02-24 01:13:22', '2021-02-24 01:13:22'),
(679, NULL, 'Al Marakhaniya', 24, '2021-02-24 01:13:36', '2021-02-24 01:13:36'),
(680, NULL, 'Al Masoudi', 24, '2021-02-24 01:13:49', '2021-02-24 01:13:49'),
(681, NULL, 'Al Murabaa', 24, '2021-02-24 01:14:11', '2021-02-24 01:14:11'),
(682, NULL, 'Al Mutarad', 24, '2021-02-24 01:14:43', '2021-02-24 01:14:43'),
(683, NULL, 'Al Mutawaa', 24, '2021-02-24 01:14:57', '2021-02-24 01:14:57'),
(684, NULL, 'Al Muwaiji', 24, '2021-02-24 01:15:13', '2021-02-24 01:15:13'),
(685, NULL, 'Al Nahil', 24, '2021-02-24 01:15:34', '2021-02-24 01:15:34'),
(686, NULL, 'Al Niyadat', 24, '2021-02-24 01:15:47', '2021-02-24 01:15:47'),
(687, NULL, 'Al Oyoun Village', 24, '2021-02-24 01:16:02', '2021-02-24 01:16:02'),
(688, NULL, 'Al Qattara', 24, '2021-02-24 01:16:14', '2021-02-24 01:16:14'),
(689, NULL, 'Al Quaa', 24, '2021-02-24 01:16:26', '2021-02-24 01:16:26'),
(690, NULL, 'Al Rawdha', 24, '2021-02-24 01:16:38', '2021-02-24 01:16:38'),
(691, NULL, 'Al Salamat', 24, '2021-02-24 01:16:51', '2021-02-24 01:16:51'),
(692, NULL, 'Al Sarouj', 24, '2021-02-24 01:17:09', '2021-02-24 01:17:09'),
(694, NULL, 'Al Sinaiyah', 24, '2021-02-24 01:17:23', '2021-02-24 01:17:23'),
(695, NULL, 'Al Tawayya', 24, '2021-02-24 01:17:37', '2021-02-24 01:17:37'),
(696, NULL, 'Al Wagan', 24, '2021-02-24 01:17:54', '2021-02-24 01:17:54'),
(697, NULL, 'Al Yahar', 24, '2021-02-24 01:18:11', '2021-02-24 01:18:11'),
(698, NULL, 'Al Zahir', 24, '2021-02-24 01:18:24', '2021-02-24 01:18:24'),
(699, NULL, 'Asharij Al Muwaiji', 24, '2021-02-24 01:18:42', '2021-02-24 01:18:42'),
(701, NULL, 'Gafat Al Nayyar', 24, '2021-02-24 01:19:09', '2021-02-24 01:19:09'),
(702, NULL, 'Jabel Al Hafeet', 24, '2021-02-24 01:19:23', '2021-02-24 01:19:23'),
(703, NULL, 'Mazyad', 24, '2021-02-24 01:19:36', '2021-02-24 01:19:36'),
(704, NULL, 'Mohammed Bin Rashid City (MBR CITY)', 24, '2021-02-24 01:19:51', '2021-02-24 01:19:51'),
(705, NULL, 'Remah', 24, '2021-02-24 01:20:03', '2021-02-24 01:20:03'),
(706, NULL, 'Shab Al Ashkar', 24, '2021-02-24 01:20:16', '2021-02-24 01:20:16'),
(707, NULL, 'Um El Zumool', 24, '2021-02-24 01:20:32', '2021-02-24 01:20:32'),
(708, NULL, 'Um Ghafa', 24, '2021-02-24 01:20:46', '2021-02-24 01:20:46'),
(709, NULL, 'Wahat Al Zaweya', 24, '2021-02-24 01:21:02', '2021-02-24 01:21:02'),
(710, NULL, 'Zakher', 24, '2021-02-24 01:21:17', '2021-02-24 01:21:17'),
(712, NULL, 'Al Darbijaniyah', 21, '2021-02-24 01:22:27', '2021-02-24 01:22:27'),
(713, NULL, 'Al Dhait', 21, '2021-02-24 01:30:37', '2021-02-24 01:30:37'),
(714, NULL, 'Al Dhait North', 21, '2021-02-24 01:30:59', '2021-02-24 01:30:59'),
(715, NULL, 'Al Dhait South', 21, '2021-02-24 01:31:14', '2021-02-24 01:31:14'),
(716, NULL, 'Al Duhaisah', 21, '2021-02-24 01:31:25', '2021-02-24 01:31:25'),
(717, NULL, 'Al Faslayn', 21, '2021-02-24 01:31:37', '2021-02-24 01:31:37'),
(718, NULL, 'Al Ghail Industrial Area', 21, '2021-02-24 01:31:51', '2021-02-24 01:31:51'),
(720, NULL, 'Al Ghubb', 21, '2021-02-24 01:32:09', '2021-02-24 01:32:09'),
(722, NULL, 'Al Hamra', 21, '2021-02-24 01:32:22', '2021-02-24 01:32:22'),
(723, NULL, 'Al Hamra Village', 21, '2021-02-24 01:32:34', '2021-02-24 01:32:34'),
(725, NULL, 'Al Hamraniyah', 21, '2021-02-24 01:32:49', '2021-02-24 01:32:49'),
(726, NULL, 'Al Hudaibah', 21, '2021-02-24 01:33:01', '2021-02-24 01:33:01'),
(727, NULL, 'Al Jazeera', 21, '2021-02-24 01:33:14', '2021-02-24 01:33:14'),
(728, NULL, 'Al Jeer', 21, '2021-02-24 01:33:29', '2021-02-24 01:33:29'),
(730, NULL, 'Al Juwais', 21, '2021-02-24 01:33:43', '2021-02-24 01:33:43'),
(731, NULL, 'Al Kharran', 21, '2021-02-24 01:33:56', '2021-02-24 01:33:56'),
(732, NULL, 'Al Mairid', 21, '2021-02-24 01:34:16', '2021-02-24 01:34:16'),
(733, NULL, 'Al Mamourah', 21, '2021-02-24 01:34:31', '2021-02-24 01:34:31'),
(734, NULL, 'Al Marjan Island', 21, '2021-02-24 01:34:42', '2021-02-24 01:34:42'),
(735, NULL, 'Al Marsa', 21, '2021-02-24 01:34:53', '2021-02-24 01:34:53'),
(736, NULL, 'AL Mataf', 21, '2021-02-24 01:35:05', '2021-02-24 01:35:05'),
(737, NULL, 'Al Nadiyah', 21, '2021-02-24 01:35:16', '2021-02-24 01:35:16'),
(738, NULL, 'Al Nakheel', 21, '2021-02-24 01:35:49', '2021-02-24 01:35:49'),
(739, NULL, 'Al Nudood', 21, '2021-02-24 01:35:57', '2021-02-24 01:35:57'),
(740, NULL, 'Al Qurm', 21, '2021-02-24 01:36:09', '2021-02-24 01:36:09'),
(741, NULL, 'Al Qusaidat', 21, '2021-02-24 01:36:23', '2021-02-24 01:36:23'),
(742, NULL, 'Al Rams', 21, '2021-02-24 01:36:36', '2021-02-24 01:36:36'),
(743, NULL, 'Al Riffa', 21, '2021-02-24 01:36:49', '2021-02-24 01:36:49'),
(745, NULL, 'Al Sahab', 21, '2021-02-24 01:37:03', '2021-02-24 01:37:03'),
(746, NULL, 'Al Saih', 21, '2021-02-24 01:37:15', '2021-02-24 01:37:15'),
(747, NULL, 'Al Seer', 21, '2021-02-24 01:37:26', '2021-02-24 01:37:26'),
(748, NULL, 'Al Soor', 21, '2021-02-24 01:37:37', '2021-02-24 01:37:37'),
(749, NULL, 'Al Thaid', 21, '2021-02-24 01:37:52', '2021-02-24 01:37:52'),
(750, NULL, 'Al Turfa', 21, '2021-02-24 01:38:09', '2021-02-24 01:38:09'),
(751, NULL, 'Al Uraibi', 21, '2021-02-24 01:38:21', '2021-02-24 01:38:21'),
(752, NULL, 'Al Zahra', 21, '2021-02-24 01:38:31', '2021-02-24 01:38:31'),
(753, NULL, 'Al Zaith', 21, '2021-02-24 01:38:42', '2021-02-24 01:38:42'),
(755, NULL, 'Amwaj', 21, '2021-02-24 01:38:54', '2021-02-24 01:38:54'),
(756, NULL, 'Bab Al Bahr', 21, '2021-02-24 01:39:08', '2021-02-24 01:39:08'),
(757, NULL, 'Cornich Ras Al Khaimah', 21, '2021-02-24 01:39:19', '2021-02-24 01:39:19'),
(758, NULL, 'Dahan', 21, '2021-02-24 01:39:32', '2021-02-24 01:39:32'),
(760, NULL, 'Falcon Island', 21, '2021-02-24 01:39:44', '2021-02-24 01:39:44'),
(761, NULL, 'Flamingo', 21, '2021-02-24 01:39:57', '2021-02-24 01:39:57'),
(762, NULL, 'Ghalilah', 21, '2021-02-24 01:40:15', '2021-02-24 01:40:15'),
(763, NULL, 'Global Sea View', 21, '2021-02-24 01:40:27', '2021-02-24 01:40:27'),
(764, NULL, 'Granada', 21, '2021-02-24 01:40:39', '2021-02-24 01:40:39'),
(765, NULL, 'Huwaylat', 21, '2021-02-24 01:40:51', '2021-02-24 01:40:51'),
(766, NULL, 'Julan', 21, '2021-02-24 01:41:04', '2021-02-24 01:41:04'),
(767, NULL, 'Julfar', 21, '2021-02-24 01:41:16', '2021-02-24 01:41:16'),
(768, NULL, 'Khuzam', 21, '2021-02-24 01:41:30', '2021-02-24 01:41:30');
INSERT INTO `cities` (`id`, `name`, `state`, `parent_id`, `created_at`, `updated_at`) VALUES
(769, NULL, 'Maareed', 21, '2021-02-24 01:41:45', '2021-02-24 01:41:45'),
(770, NULL, 'Mamourah', 21, '2021-02-24 01:42:00', '2021-02-24 01:42:00'),
(771, NULL, 'Masafi', 21, '2021-02-24 01:42:12', '2021-02-24 01:42:12'),
(772, NULL, 'Mina Al Arab', 21, '2021-02-24 01:42:22', '2021-02-24 01:42:22'),
(773, NULL, 'Old Town RAK', 21, '2021-02-24 01:42:34', '2021-02-24 01:42:34'),
(774, NULL, 'RAK Media City', 21, '2021-02-24 01:42:45', '2021-02-24 01:42:45'),
(775, NULL, 'Ras Al Khaimah Waterfront', 21, '2021-02-24 01:43:01', '2021-02-24 01:43:01'),
(776, NULL, 'Ras Al Selaab', 21, '2021-02-24 01:43:12', '2021-02-24 01:43:12'),
(777, NULL, 'Saraya Islands', 21, '2021-02-24 01:43:25', '2021-02-24 01:43:25'),
(778, NULL, 'Seih Al Burairat', 21, '2021-02-24 01:43:37', '2021-02-24 01:43:37'),
(782, NULL, 'Seih Al Qusaidat', 21, '2021-02-24 01:44:25', '2021-02-24 01:44:25'),
(784, NULL, 'Shamal Haqueel', 21, '2021-02-24 01:44:53', '2021-02-24 01:44:53'),
(786, NULL, 'Shamal Julphar', 21, '2021-02-24 01:45:05', '2021-02-24 01:45:05'),
(787, NULL, 'Shams', 21, '2021-02-24 01:45:15', '2021-02-24 01:45:15'),
(788, NULL, 'Sidroh', 21, '2021-02-24 01:45:25', '2021-02-24 01:45:25'),
(789, NULL, 'Suhaim', 21, '2021-02-24 01:45:39', '2021-02-24 01:45:39'),
(790, NULL, 'The Cove', 21, '2021-02-24 01:45:55', '2021-02-24 01:45:55'),
(792, NULL, 'Wadi Shah', 21, '2021-02-24 01:46:17', '2021-02-24 01:46:17'),
(793, NULL, 'Yasmin Village', 21, '2021-02-24 01:46:25', '2021-02-24 01:46:25');

-- --------------------------------------------------------

--
-- Table structure for table `date_fields`
--

CREATE TABLE `date_fields` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `label_for_form` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label_for_invoice` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `date_fields`
--

INSERT INTO `date_fields` (`id`, `service_id`, `label_for_form`, `label_for_invoice`, `created_at`, `updated_at`) VALUES
(4, 57, 'Pick your day', 'Date', '2021-01-26 00:05:31', '2021-01-26 00:05:31'),
(6, 54, 'Pick your day', 'Date', '2021-01-26 00:24:54', '2021-01-26 00:24:54'),
(10, 60, 'Pick your day', 'Date', '2021-01-28 23:41:39', '2021-01-28 23:41:39'),
(11, 63, 'Pick your day', 'Date', '2021-03-17 01:00:17', '2021-03-17 01:00:17'),
(12, 65, 'When do you want service to be done ?', 'Service Done In Date', '2021-03-31 03:56:41', '2021-03-31 03:56:41'),
(14, 80, 'When do you need the service?', 'Date for service', '2021-04-28 04:25:12', '2021-04-28 04:25:12'),
(15, 81, 'When do you need the service?', 'Date  for Service', '2021-04-28 04:43:53', '2021-04-28 04:43:53'),
(16, 82, 'When will the event take place?', 'Date for Event', '2021-04-28 23:51:49', '2021-04-28 23:51:49'),
(17, 88, 'When do you need the service?', 'Date', '2021-05-01 10:54:14', '2021-05-01 10:54:14'),
(18, 46, 'When do you need the service?', 'Date', '2021-05-02 00:58:18', '2021-05-02 00:58:18'),
(19, 89, 'When do you need the service?', 'Date', '2021-05-02 01:55:42', '2021-05-02 01:55:42'),
(20, 92, 'When do you need the service?', 'Date', '2021-05-02 03:00:36', '2021-05-02 03:00:36'),
(21, 68, 'When do you need the service?', 'Date', '2021-06-17 20:07:11', '2021-06-17 20:07:11'),
(22, 83, 'When do you need the service?', 'Date', '2021-06-17 20:08:52', '2021-06-17 20:08:52'),
(23, 45, 'When do you need the service?', 'Date', '2021-06-17 20:09:58', '2021-06-17 20:09:58'),
(24, 69, 'When do you need the service?', 'Date', '2021-06-17 20:10:50', '2021-06-17 20:10:50');

-- --------------------------------------------------------

--
-- Table structure for table `date_values`
--

CREATE TABLE `date_values` (
  `id` bigint(20) NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `field_id` bigint(20) UNSIGNED NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deepcleaning_orders`
--

CREATE TABLE `deepcleaning_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `premises_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `home_type` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_size` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `office_size` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_of_cabin` int(11) DEFAULT NULL,
  `number_of_desk` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(1, 'What is ServiceOnUs Services?', '<p>ServiceOnUs is the leading online marketplace for home services in the United Arab Emirates that helps residents book over 50 different services online as well as compare quotes. On Serviceonus Services, you can also compare ratings and read customer reviews of each service provider to make an informed decision.</p>\r\n<p>&nbsp;</p>', '2020-07-24 01:31:35', '2020-12-29 16:12:29'),
(2, 'Who will come to my home?', '<p>Service On Us only partners with reputable service providers who follow industry standards when training their staff. This means that qualified professionals will carry out the service at your home. Not only do they have the know-how to take care of the required task properly but will also be able to bring the necessary supplies and equipment if requested.</p>\r\n<p>&nbsp;</p>', '2020-07-24 01:32:01', '2020-12-29 16:13:11'),
(3, 'How do I pay for the service?', '<p>You can choose to pay for the service using a credit card online or with cash once the task has been completed. If you opt to pay with a credit card, you will only be charged after the service has been carried out. We will also notify you through the app and via email.</p>', '2020-07-24 01:32:20', '2020-09-30 18:29:29');

-- --------------------------------------------------------

--
-- Table structure for table `general_enquiries`
--

CREATE TABLE `general_enquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_enquiries`
--

INSERT INTO `general_enquiries` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(2, 'Rylee Baird', 'wuqoqyt@mailinator.com', 'Tenetur nulla except', 'Consequatur Nobis u', '2020-07-22 13:11:03', '2020-07-22 13:11:03'),
(3, 'Eric Jones', 'eric@talkwithwebvisitor.com', 'Your site – more leads?', 'Hey, this is Eric and I ran across gggservices.com a few minutes ago.\r\n\r\nLooks great… but now what?\r\n\r\nBy that I mean, when someone like me finds your website – either through Search or just bouncing around – what happens next?  Do you get a lot of leads from your site, or at least enough to make you happy?\r\n\r\nHonestly, most business websites fall a bit short when it comes to generating paying customers. Studies show that 70% of a site’s visitors disappear and are gone forever after just a moment.\r\n\r\nHere’s an idea…\r\n \r\nHow about making it really EASY for every visitor who shows up to get a personal phone call you as soon as they hit your site…\r\n \r\nYou can –\r\n  \r\nTalk With Web Visitor is a software widget that’s works on your site, ready to capture any visitor’s Name, Email address and Phone Number.  It signals you the moment they let you know they’re interested – so that you can talk to that lead while they’re literally looking over your site.\r\n\r\nCLICK HERE http://www.talkwithwebvisitors.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works.\r\n\r\nYou’ll be amazed - the difference between contacting someone within 5 minutes versus a half-hour or more later could increase your results 100-fold.\r\n\r\nIt gets even better… once you’ve captured their phone number, with our new SMS Text With Lead feature, you can automatically start a text (SMS) conversation.\r\n  \r\nThat way, even if you don’t close a deal right away, you can follow up with text messages for new offers, content links, even just “how you doing?” notes to build a relationship.\r\n\r\nPretty sweet – AND effective.\r\n\r\nCLICK HERE http://www.talkwithwebvisitors.com to discover what Talk With Web Visitor can do for your business.\r\n\r\nYou could be converting up to 100X more leads today!\r\n\r\nEric\r\nPS: Talk With Web Visitor offers a FREE 14 days trial – and it even includes International Long Distance Calling. \r\nYou have customers waiting to talk with you right now… don’t keep them waiting. \r\nCLICK HERE http://www.talkwithwebvisitors.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithwebvisitors.com/unsubscribe.aspx?d=gggservices.com', '2020-09-23 18:55:49', '2020-09-23 18:55:49'),
(4, 'Joe Miller', 'info@domainworld.com', 'C04VQC3', 'IMPORTANCE NOTICE\r\n\r\n\r\n\r\nNotice#: 491343\r\n\r\nDate: 2020-10-16    \r\n\r\n\r\n\r\nExpiration message of your gggservices.com\r\n\r\n\r\n\r\nEXPIRATION NOTIFICATION\r\n\r\n\r\n\r\nCLICK HERE FOR SECURE ONLINE PAYMENT: http://gomydomains.xyz/?n=gggservices.com&r=a&t=1602763459&p=v1\r\n\r\n\r\n\r\nThis purchase expiration notification gggservices.com advises you about the submission expiration of domain gggservices.com for your e-book submission. \r\n\r\nThe information in this purchase expiration notification gggservices.com may contains CONFIDENTIAL AND/OR LEGALLY PRIVILEGED INFORMATION from the processing department from the processing department to purchase our e-book submission. NON-COMPLETION of your submission by the given expiration date may result in CANCELLATION of the purchase.\r\n\r\n\r\n\r\nCLICK HERE FOR SECURE ONLINE PAYMENT: http://gomydomains.xyz/?n=gggservices.com&r=a&t=1602763459&p=v1\r\n\r\n\r\n\r\nACT IMMEDIATELY. The submission notification gggservices.com for your e-book will EXPIRE WITHIN 2 DAYS after reception of this email\r\n\r\n\r\n\r\nThis notification is intended only for the use of the individual(s) having received this message. \r\n\r\n\r\n\r\nPLEASE CLICK ON SECURE ONLINE PAYMENT TO COMPLETE YOUR PAYMENT\r\n\r\n\r\n\r\nSECURE ONLINE PAYMENT: http://gomydomains.xyz/?n=gggservices.com&r=a&t=1602763459&p=v1\r\n\r\n\r\n\r\nNon-completion of your submission by given expiration date may result in cancellation.\r\n\r\n\r\n\r\nAll online services will be restored automatically upon confirmation of payment. Delivery will be completed within 24 hours. \r\n\r\n\r\n\r\nCLICK UNDERNEATH FOR IMMEDIATE PAYMENT:\r\n\r\n\r\n\r\nSECURE ONLINE PAYMENT: http://gomydomains.xyz/?n=gggservices.com&r=a&t=1602763459&p=v1', '2020-10-15 17:04:22', '2020-10-15 17:04:22'),
(5, 'Eric Jones', 'eric@talkwithwebvisitor.com', 'Try this, get more leads', 'Hi, my name is Eric and I’m betting you’d like your website gggservices.com to generate more leads.\r\n\r\nHere’s how:\r\nTalk With Web Visitor is a software widget that’s works on your site, ready to capture any visitor’s Name, Email address and Phone Number.  It signals you as soon as they say they’re interested – so that you can talk to that lead while they’re still there at gggservices.com.\r\n\r\nTalk With Web Visitor – CLICK HERE http://www.talkwithcustomer.com for a live demo now.\r\n\r\nAnd now that you’ve got their phone number, our new SMS Text With Lead feature enables you to start a text (SMS) conversation – answer questions, provide more info, and close a deal that way.\r\n\r\nIf they don’t take you up on your offer then, just follow up with text messages for new offers, content links, even just “how you doing?” notes to build a relationship.\r\n\r\nCLICK HERE http://www.talkwithcustomer.com to discover what Talk With Web Visitor can do for your business.\r\n\r\nThe difference between contacting someone within 5 minutes versus a half-hour means you could be converting up to 100X more leads today!\r\n\r\nTry Talk With Web Visitor and get more leads now.\r\n\r\nEric\r\nPS: The studies show 7 out of 10 visitors don’t hang around – you can’t afford to lose them!\r\nTalk With Web Visitor offers a FREE 14 days trial – and it even includes International Long Distance Calling. \r\nYou have customers waiting to talk with you right now… don’t keep them waiting. \r\nCLICK HERE http://www.talkwithcustomer.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithcustomer.com/unsubscribe.aspx?d=gggservices.com', '2020-11-01 19:28:31', '2020-11-01 19:28:31'),
(6, 'Eric Jones', 'eric@talkwithwebvisitor.com', 'Why not TALK with your leads?', 'My name’s Eric and I just found your site gggservices.com.\r\n\r\nIt’s got a lot going for it, but here’s an idea to make it even MORE effective.\r\n\r\nTalk With Web Visitor – CLICK HERE http://www.talkwithwebvisitors.com for a live demo now.\r\n\r\nTalk With Web Visitor is a software widget that’s works on your site, ready to capture any visitor’s Name, Email address and Phone Number.  It signals you the moment they let you know they’re interested – so that you can talk to that lead while they’re literally looking over your site.\r\n\r\nAnd once you’ve captured their phone number, with our new SMS Text With Lead feature, you can automatically start a text (SMS) conversation… and if they don’t take you up on your offer then, you can follow up with text messages for new offers, content links, even just “how you doing?” notes to build a relationship.\r\n\r\nCLICK HERE http://www.talkwithwebvisitors.com to discover what Talk With Web Visitor can do for your business.\r\n\r\nThe difference between contacting someone within 5 minutes versus a half-hour means you could be converting up to 100X more leads today!\r\n\r\nEric\r\nPS: Studies show that 70% of a site’s visitors disappear and are gone forever after just a moment. Don’t keep losing them. \r\nTalk With Web Visitor offers a FREE 14 days trial – and it even includes International Long Distance Calling. \r\nYou have customers waiting to talk with you right now… don’t keep them waiting. \r\nCLICK HERE http://www.talkwithwebvisitors.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithwebvisitors.com/unsubscribe.aspx?d=gggservices.com', '2020-11-02 11:29:26', '2020-11-02 11:29:26'),
(7, 'Eric Jones', 'ericjonesonline@outlook.com', 'Strike when the iron’s hot', 'Hey there, I just found your site, quick question…\r\n\r\nMy name’s Eric, I found gggservices.com after doing a quick search – you showed up near the top of the rankings, so whatever you’re doing for SEO, looks like it’s working well.\r\n\r\nSo here’s my question – what happens AFTER someone lands on your site?  Anything?\r\n\r\nResearch tells us at least 70% of the people who find your site, after a quick once-over, they disappear… forever.\r\n\r\nThat means that all the work and effort you put into getting them to show up, goes down the tubes.\r\n\r\nWhy would you want all that good work – and the great site you’ve built – go to waste?\r\n\r\nBecause the odds are they’ll just skip over calling or even grabbing their phone, leaving you high and dry.\r\n\r\nBut here’s a thought… what if you could make it super-simple for someone to raise their hand, say, “okay, let’s talk” without requiring them to even pull their cell phone from their pocket?\r\n  \r\nYou can – thanks to revolutionary new software that can literally make that first call happen NOW.\r\n\r\nTalk With Web Visitor is a software widget that sits on your site, ready and waiting to capture any visitor’s Name, Email address and Phone Number.  It lets you know IMMEDIATELY – so that you can talk to that lead while they’re still there at your site.\r\n  \r\nYou know, strike when the iron’s hot!\r\n\r\nCLICK HERE http://www.talkwithcustomer.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works.\r\n\r\nWhen targeting leads, you HAVE to act fast – the difference between contacting someone within 5 minutes versus 30 minutes later is huge – like 100 times better!\r\n\r\nThat’s why you should check out our new SMS Text With Lead feature as well… once you’ve captured the phone number of the website visitor, you can automatically kick off a text message (SMS) conversation with them. \r\n \r\nImagine how powerful this could be – even if they don’t take you up on your offer immediately, you can stay in touch with them using text messages to make new offers, provide links to great content, and build your credibility.\r\n\r\nJust this alone could be a game changer to make your website even more effective.\r\n\r\nStrike when  the iron’s hot!\r\n\r\nCLICK HERE http://www.talkwithcustomer.com to learn more about everything Talk With Web Visitor can do for your business – you’ll be amazed.\r\n\r\nThanks and keep up the great work!\r\n\r\nEric\r\nPS: Talk With Web Visitor offers a FREE 14 days trial – you could be converting up to 100x more leads immediately!   \r\nIt even includes International Long Distance Calling. \r\nStop wasting money chasing eyeballs that don’t turn into paying customers. \r\nCLICK HERE http://www.talkwithcustomer.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithcustomer.com/unsubscribe.aspx?d=gggservices.com', '2020-11-10 04:05:39', '2020-11-10 04:05:39'),
(8, 'Ronaldtut', 'yourmail@gmail.com', 'hydra Зеркало', '<a href=\"https://hydraruzxpnew4af.sayt-7.com\" title=\"гидра официальный сайт\">гидра официальный сайт</a>, разумеется, гарантирует секретность в сети интернет, но тем не менее, данной защиты мало и работать с проектом с обычного браузера нереально. При входе на вебсайт используя обычный для вас браузер провайдер проследит все проекты, на которые вы заходили, и столь подозрительная активность может заинтересовать органы правопорядка. Потому требуется задуматься о особой безопасности.', '2020-11-11 19:19:58', '2020-11-11 19:19:58'),
(9, 'Eric Jones', 'ericjonesonline@outlook.com', 'Try this, get more leads', 'Hi, my name is Eric and I’m betting you’d like your website gggservices.com to generate more leads.\r\n\r\nHere’s how:\r\nTalk With Web Visitor is a software widget that’s works on your site, ready to capture any visitor’s Name, Email address and Phone Number.  It signals you as soon as they say they’re interested – so that you can talk to that lead while they’re still there at gggservices.com.\r\n\r\nTalk With Web Visitor – CLICK HERE http://www.talkwithcustomer.com for a live demo now.\r\n\r\nAnd now that you’ve got their phone number, our new SMS Text With Lead feature enables you to start a text (SMS) conversation – answer questions, provide more info, and close a deal that way.\r\n\r\nIf they don’t take you up on your offer then, just follow up with text messages for new offers, content links, even just “how you doing?” notes to build a relationship.\r\n\r\nCLICK HERE http://www.talkwithcustomer.com to discover what Talk With Web Visitor can do for your business.\r\n\r\nThe difference between contacting someone within 5 minutes versus a half-hour means you could be converting up to 100X more leads today!\r\n\r\nTry Talk With Web Visitor and get more leads now.\r\n\r\nEric\r\nPS: The studies show 7 out of 10 visitors don’t hang around – you can’t afford to lose them!\r\nTalk With Web Visitor offers a FREE 14 days trial – and it even includes International Long Distance Calling. \r\nYou have customers waiting to talk with you right now… don’t keep them waiting. \r\nCLICK HERE http://www.talkwithcustomer.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithcustomer.com/unsubscribe.aspx?d=gggservices.com', '2020-11-16 17:26:56', '2020-11-16 17:26:56'),
(10, 'Steve Wilson', 'steve@backlinkpro.club', 'DA 96 Do-follow Backlink from Amazon', 'Hi, We are wondering if you would be interested in our service, where we can provide you with a dofollow link from Amazon (DA 96) back to gggservices.com?\r\n\r\nThe price is just $77 per link.\r\n\r\nTo explain what DA is and the benefit for your website, along with a sample of an existing link, please read here: https://pastelink.net/1nm60\r\n\r\nIf you\'d be interested in learning more, reply to this email but please make sure you include the word INTERESTED in the subject line field.\r\n\r\nAlternatively, check out the frequently asked questions and complete the form here: https://backlinkpro.club/amazon-backlink/\r\n\r\nKind Regards,\r\nSteve', '2020-11-19 13:59:00', '2020-11-19 13:59:00'),
(11, 'Carole Lindon', 'gggservices.com@gggservices.com', 'gggservices.com', 'Your domain name: gggservices.com\r\n\r\nGGG Services\r\n\r\nThis announcement  RUNS OUT ON: Nov 19, 2020.\r\n\r\n\r\nWe have not received a settlement from you.\r\nWe  have actually tried to contact you but were incapable to reach you.\r\n\r\n\r\nPlease Visit:  https://cutt.ly/ZhqbphA\r\n\r\n\r\nFor info and also to make a discretionary payment for solutions.\r\n\r\n\r\n11192020043010', '2020-11-19 15:30:20', '2020-11-19 15:30:20'),
(12, 'Eric Jones', 'ericjonesonline@outlook.com', 'Why not TALK with your leads?', 'My name’s Eric and I just found your site gggservices.com.\r\n\r\nIt’s got a lot going for it, but here’s an idea to make it even MORE effective.\r\n\r\nTalk With Web Visitor – CLICK HERE http://www.talkwithwebvisitors.com for a live demo now.\r\n\r\nTalk With Web Visitor is a software widget that’s works on your site, ready to capture any visitor’s Name, Email address and Phone Number.  It signals you the moment they let you know they’re interested – so that you can talk to that lead while they’re literally looking over your site.\r\n\r\nAnd once you’ve captured their phone number, with our new SMS Text With Lead feature, you can automatically start a text (SMS) conversation… and if they don’t take you up on your offer then, you can follow up with text messages for new offers, content links, even just “how you doing?” notes to build a relationship.\r\n\r\nCLICK HERE http://www.talkwithwebvisitors.com to discover what Talk With Web Visitor can do for your business.\r\n\r\nThe difference between contacting someone within 5 minutes versus a half-hour means you could be converting up to 100X more leads today!\r\n\r\nEric\r\nPS: Studies show that 70% of a site’s visitors disappear and are gone forever after just a moment. Don’t keep losing them. \r\nTalk With Web Visitor offers a FREE 14 days trial – and it even includes International Long Distance Calling. \r\nYou have customers waiting to talk with you right now… don’t keep them waiting. \r\nCLICK HERE http://www.talkwithwebvisitors.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithwebvisitors.com/unsubscribe.aspx?d=gggservices.com', '2020-11-23 19:48:04', '2020-11-23 19:48:04'),
(13, 'Eric Jones', 'ericjonesonline@outlook.com', 'Try this, get more leads', 'Hi, my name is Eric and I’m betting you’d like your website gggservices.com to generate more leads.\r\n\r\nHere’s how:\r\nTalk With Web Visitor is a software widget that’s works on your site, ready to capture any visitor’s Name, Email address and Phone Number.  It signals you as soon as they say they’re interested – so that you can talk to that lead while they’re still there at gggservices.com.\r\n\r\nTalk With Web Visitor – CLICK HERE http://www.talkwithcustomer.com for a live demo now.\r\n\r\nAnd now that you’ve got their phone number, our new SMS Text With Lead feature enables you to start a text (SMS) conversation – answer questions, provide more info, and close a deal that way.\r\n\r\nIf they don’t take you up on your offer then, just follow up with text messages for new offers, content links, even just “how you doing?” notes to build a relationship.\r\n\r\nCLICK HERE http://www.talkwithcustomer.com to discover what Talk With Web Visitor can do for your business.\r\n\r\nThe difference between contacting someone within 5 minutes versus a half-hour means you could be converting up to 100X more leads today!\r\n\r\nTry Talk With Web Visitor and get more leads now.\r\n\r\nEric\r\nPS: The studies show 7 out of 10 visitors don’t hang around – you can’t afford to lose them!\r\nTalk With Web Visitor offers a FREE 14 days trial – and it even includes International Long Distance Calling. \r\nYou have customers waiting to talk with you right now… don’t keep them waiting. \r\nCLICK HERE http://www.talkwithcustomer.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithcustomer.com/unsubscribe.aspx?d=gggservices.com', '2020-12-02 21:49:20', '2020-12-02 21:49:20'),
(14, 'Erica Jackson', 'ericajacksonmi0@yahoo.com', 'DA50 Backlink to gggservices.com', 'Hi, \r\n\r\nWe\'re wondering if you\'d be interested in a \'dofollow\' backlink to gggservices.com from our DA50 website?\r\n\r\nOur website is dedicated to facts/education, and so can host articles on pretty much any topic.\r\n\r\nYou can either write a new article yourself, or we can link from existing content. The price is just $45 and you can pay once the article/link has been published. This is a one-time fee, so there are no extra charges.\r\n\r\nAlso: Once the article has been published, and your backlink has been added, it will be shared out to over 2.8 million social media followers (if it\'s educationally based). This means you aren\'t just getting the high valued backlink, you\'re also getting the potential of more traffic to your site.\r\n\r\nIf you\'re interested, please reply to this email, including the word \'interested\' in the Subject Field.\r\n\r\nKind Regards,\r\nErica', '2020-12-12 21:40:36', '2020-12-12 21:40:36'),
(15, 'Latasha Hobbs', 'hobbs.latasha@googlemail.com', 'How To Get More Traffic to gggservices.com in 2021', 'Hi,\r\n\r\nWe\'re wondering if you\'ve considered taking the written content from gggservices.com and converting it into videos to promote on Youtube? It\'s another method of generating traffic.\r\n\r\nThere\'s a 14 day free trial available to you at the following link: https://www.vidnami.com/c/TonyS-vn-freetrial\r\n\r\nRegards,\r\nLatasha', '2020-12-20 06:14:07', '2020-12-20 06:14:07'),
(16, 'Eric Jones', 'ericjonesonline@outlook.com', 'Cool website!', 'Cool website!\r\n\r\nMy name’s Eric, and I just found your site - gggservices.com - while surfing the net. You showed up at the top of the search results, so I checked you out. Looks like what you’re doing is pretty cool.\r\n \r\nBut if you don’t mind me asking – after someone like me stumbles across gggservices.com, what usually happens?\r\n\r\nIs your site generating leads for your business? \r\n \r\nI’m guessing some, but I also bet you’d like more… studies show that 7 out 10 who land on a site wind up leaving without a trace.\r\n\r\nNot good.\r\n\r\nHere’s a thought – what if there was an easy way for every visitor to “raise their hand” to get a phone call from you INSTANTLY… the second they hit your site and said, “call me now.”\r\n\r\nYou can –\r\n  \r\nTalk With Web Visitor is a software widget that’s works on your site, ready to capture any visitor’s Name, Email address and Phone Number.  It lets you know IMMEDIATELY – so that you can talk to that lead while they’re literally looking over your site.\r\n\r\nCLICK HERE http://www.talkwithwebvisitors.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works.\r\n\r\nTime is money when it comes to connecting with leads – the difference between contacting someone within 5 minutes versus 30 minutes later can be huge – like 100 times better!\r\n\r\nThat’s why we built out our new SMS Text With Lead feature… because once you’ve captured the visitor’s phone number, you can automatically start a text message (SMS) conversation.\r\n  \r\nThink about the possibilities – even if you don’t close a deal then and there, you can follow up with text messages for new offers, content links, even just “how you doing?” notes to build a relationship.\r\n\r\nWouldn’t that be cool?\r\n\r\nCLICK HERE http://www.talkwithwebvisitors.com to discover what Talk With Web Visitor can do for your business.\r\n\r\nYou could be converting up to 100X more leads today!\r\nEric\r\n\r\nPS: Talk With Web Visitor offers a FREE 14 days trial – and it even includes International Long Distance Calling. \r\nYou have customers waiting to talk with you right now… don’t keep them waiting. \r\nCLICK HERE http://www.talkwithwebvisitors.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithwebvisitors.com/unsubscribe.aspx?d=gggservices.com', '2020-12-20 12:54:27', '2020-12-20 12:54:27'),
(17, 'Eric Jones', 'eric.jones.z.mail@gmail.com', 'Turn Surf-Surf-Surf into Talk Talk Talk', 'Hello, my name’s Eric and I just ran across your website at serviceonus.com...\r\n\r\nI found it after a quick search, so your SEO’s working out…\r\n\r\nContent looks pretty good…\r\n\r\nOne thing’s missing though…\r\n\r\nA QUICK, EASY way to connect with you NOW.\r\n\r\nBecause studies show that a web lead like me will only hang out a few seconds – 7 out of 10 disappear almost instantly, Surf Surf Surf… then gone forever.\r\n\r\nI have the solution:\r\n\r\nTalk With Web Visitor is a software widget that’s works on your site, ready to capture any visitor’s Name, Email address and Phone Number.  You’ll know immediately they’re interested and you can call them directly to TALK with them - literally while they’re still on the web looking at your site.\r\n\r\nCLICK HERE https://talkwithwebvisitors.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works and even give it a try… it could be huge for your business.\r\n\r\nPlus, now that you’ve got that phone number, with our new SMS Text With Lead feature, you can automatically start a text (SMS) conversation pronto… which is so powerful, because connecting with someone within the first 5 minutes is 100 times more effective than waiting 30 minutes or more later.\r\n\r\nThe new text messaging feature lets you follow up regularly with new offers, content links, even just follow up notes to build a relationship.\r\n\r\nEverything I’ve just described is extremely simple to implement, cost-effective, and profitable.\r\n \r\nCLICK HERE https://talkwithwebvisitors.com to discover what Talk With Web Visitor can do for your business, potentially converting up to 100X more eyeballs into leads today!\r\n\r\nEric\r\nPS: Talk With Web Visitor offers a FREE 14 days trial – and it even includes International Long Distance Calling. \r\nYou have customers waiting to talk with you right now… don’t keep them waiting. \r\nCLICK HERE https://talkwithwebvisitors.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithwebvisitors.com/unsubscribe.aspx?d=serviceonus.com', '2021-02-04 11:33:05', '2021-02-04 11:33:05'),
(18, 'Winston', 'fisherejlv84@thefirstpageplan.com', 'Nice site, quick question...', 'Hey guys, I just wanted to see if you need anything in the way of site editing/code fixing/programming, unique blog post material, extra traffic by getting others to start sharing your site across their own social media accounts, social media management, optimizing the site, monetizing the site, etc.  I have quite a few ways I can set all of this and do this for you.  Don\'t mean to impose, was just curious, I\'ve been doing this for some time and was just curious if you needed an extra hand. I can even do Wordpress and other related tasks (you name it).\r\n\r\nStay Safe,\r\n\r\nWinston\r\n1.708.320.3171', '2021-02-12 21:15:33', '2021-02-12 21:15:33'),
(19, 'Eric Jones', 'eric.jones.z.mail@gmail.com', 'instead, congrats', 'Good day, \r\n\r\nMy name is Eric and unlike a lot of emails you might get, I wanted to instead provide you with a word of encouragement – Congratulations\r\n\r\nWhat for?  \r\n\r\nPart of my job is to check out websites and the work you’ve done with serviceonus.com definitely stands out. \r\n\r\nIt’s clear you took building a website seriously and made a real investment of time and resources into making it top quality.\r\n\r\nThere is, however, a catch… more accurately, a question…\r\n\r\nSo when someone like me happens to find your site – maybe at the top of the search results (nice job BTW) or just through a random link, how do you know? \r\n\r\nMore importantly, how do you make a connection with that person?\r\n\r\nStudies show that 7 out of 10 visitors don’t stick around – they’re there one second and then gone with the wind.\r\n\r\nHere’s a way to create INSTANT engagement that you may not have known about… \r\n\r\nTalk With Web Visitor is a software widget that’s works on your site, ready to capture any visitor’s Name, Email address and Phone Number.  It lets you know INSTANTLY that they’re interested – so that you can talk to that lead while they’re literally checking out serviceonus.com.\r\n\r\nCLICK HERE http://talkwithcustomer.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works.\r\n\r\nIt could be a game-changer for your business – and it gets even better… once you’ve captured their phone number, with our new SMS Text With Lead feature, you can automatically start a text (SMS) conversation – immediately (and there’s literally a 100X difference between contacting someone within 5 minutes versus 30 minutes.)\r\n\r\nPlus then, even if you don’t close a deal right away, you can connect later on with text messages for new offers, content links, even just follow up notes to build a relationship.\r\n\r\nEverything I’ve just described is simple, easy, and effective. \r\n\r\nCLICK HERE http://talkwithcustomer.com to discover what Talk With Web Visitor can do for your business.\r\n\r\nYou could be converting up to 100X more leads today!\r\n\r\nEric\r\nPS: Talk With Web Visitor offers a FREE 14 days trial – and it even includes International Long Distance Calling. \r\nYou have customers waiting to talk with you right now… don’t keep them waiting. \r\nCLICK HERE http://talkwithcustomer.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithcustomer.com/unsubscribe.aspx?d=serviceonus.com', '2021-02-19 18:27:01', '2021-02-19 18:27:01'),
(20, 'Eric Jones', 'eric.jones.z.mail@gmail.com', 'Turn Surf-Surf-Surf into Talk Talk Talk', 'Hello, my name’s Eric and I just ran across your website at serviceonus.com...\r\n\r\nI found it after a quick search, so your SEO’s working out…\r\n\r\nContent looks pretty good…\r\n\r\nOne thing’s missing though…\r\n\r\nA QUICK, EASY way to connect with you NOW.\r\n\r\nBecause studies show that a web lead like me will only hang out a few seconds – 7 out of 10 disappear almost instantly, Surf Surf Surf… then gone forever.\r\n\r\nI have the solution:\r\n\r\nTalk With Web Visitor is a software widget that’s works on your site, ready to capture any visitor’s Name, Email address and Phone Number.  You’ll know immediately they’re interested and you can call them directly to TALK with them - literally while they’re still on the web looking at your site.\r\n\r\nCLICK HERE https://talkwithwebvisitors.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works and even give it a try… it could be huge for your business.\r\n\r\nPlus, now that you’ve got that phone number, with our new SMS Text With Lead feature, you can automatically start a text (SMS) conversation pronto… which is so powerful, because connecting with someone within the first 5 minutes is 100 times more effective than waiting 30 minutes or more later.\r\n\r\nThe new text messaging feature lets you follow up regularly with new offers, content links, even just follow up notes to build a relationship.\r\n\r\nEverything I’ve just described is extremely simple to implement, cost-effective, and profitable.\r\n \r\nCLICK HERE https://talkwithwebvisitors.com to discover what Talk With Web Visitor can do for your business, potentially converting up to 100X more eyeballs into leads today!\r\n\r\nEric\r\nPS: Talk With Web Visitor offers a FREE 14 days trial – and it even includes International Long Distance Calling. \r\nYou have customers waiting to talk with you right now… don’t keep them waiting. \r\nCLICK HERE https://talkwithwebvisitors.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithwebvisitors.com/unsubscribe.aspx?d=serviceonus.com', '2021-02-26 07:20:36', '2021-02-26 07:20:36'),
(21, 'Mike Lewis', 'mike@quickcapitallenders.xyz', 'Hello', 'Hello again,\r\nI hope you are having a good day!\r\n\r\nWe both know how hard it is for small businesses to get the financing they need \r\nto build and grow their businesses.\r\n\r\nWhat would you say if I told you we could offer you an approval in less than 30 seconds \r\nand fund your business the very next day? All without submitting a single document. \r\n\r\nWe offer an amazing 95% approval rate and would like to offer you some funding as well. \r\n\r\nOur loans do NOT require excellent credit or collateral like most lenders.\r\n \r\nThe process is simple. Just visit www.quickcapitallenders.xyz and see how much you qualify for right now. \r\n\r\nApplying does not affect your credit.\r\n\r\nThanks again and I look forward to funding you soon.\r\n\r\n\r\n\r\nWarm Regards,\r\n\r\nMike Lewis\r\nQuick Capital Lenders\r\nwww.quickcapitallenders.xyz', '2021-03-02 16:01:04', '2021-03-02 16:01:04'),
(22, 'Deanna Beer', 'street.bernadine@mail.ru', 'Question', 'Hello,\r\n\r\nAre you presently using Wordpress/Woocommerce or perhaps do you actually want to work with it as time goes on ? We provide more than 2500 premium plugins but also themes to download : http://shortbg.buzz/fwzHI\r\n\r\nRegards,\r\n\r\nDeanna', '2021-05-04 17:36:23', '2021-05-04 17:36:23'),
(23, 'Kavita', 'k@gmail.com', NULL, 'Hello', '2021-05-07 14:59:02', '2021-05-07 14:59:02'),
(24, 'Gary Young', 'gary@bizcapitalloans1.xyz', 'Hello', 'Hello,\r\n\r\nI hope life is treating you kind and business is AWESOME!\r\n\r\nI just have one quick question for you.\r\n\r\nWould you consider a Working Capital Loan for your Business if the price and terms were acceptable?\r\n\r\nIf so, we can provide you with a funding decision is less than 30 seconds \r\nwithout pulling your credit or submitting a single document. \r\n\r\nJust click on the link to INSTANTLY see how much you qualify for www.bizcapitalloans1.xyz\r\n\r\nAlso, please check out this video to see how our program works, and all the funding options we have available for you.  www.bizcapitalloans1.xyz/video\r\n\r\n\r\n\r\nWarm Regards,\r\n\r\nGary Young\r\nBiz Capital Loans\r\nwww.bizcapitalloans1.xyz\r\n\r\n\r\n\r\n\r\nThis is an Advertisement.\r\nTo unsubscribe, click here www.bizcapitalloans1.xyz/unsubscribe,\r\n\r\nor write to:\r\n\r\nBiz Capital Loans\r\n9169 W State St #3242\r\nGarden City, ID 83714', '2021-05-21 07:41:49', '2021-05-21 07:41:49'),
(25, 'Eric Jones', 'eric.jones.z.mail@gmail.com', 'Who needs eyeballs, you need BUSINESS', 'My name’s Eric and I just came across your website - serviceonus.com - in the search results.\r\n\r\nHere’s what that means to me…\r\n\r\nYour SEO’s working.\r\n\r\nYou’re getting eyeballs – mine at least.\r\n\r\nYour content’s pretty good, wouldn’t change a thing.\r\n\r\nBUT…\r\n\r\nEyeballs don’t pay the bills.\r\n\r\nCUSTOMERS do.\r\n\r\nAnd studies show that 7 out of 10 visitors to a site like serviceonus.com will drop by, take a gander, and then head for the hills without doing anything else.\r\n\r\nIt’s like they never were even there.\r\n\r\nYou can fix this.\r\n\r\nYou can make it super-simple for them to raise their hand, say, “okay, let’s talk” without requiring them to even pull their cell phone from their pocket… thanks to Talk With Web Visitor.\r\n\r\nTalk With Web Visitor is a software widget that sits on your site, ready and waiting to capture any visitor’s Name, Email address and Phone Number.  It lets you know immediately – so you can talk to that lead immediately… without delay… BEFORE they head for those hills.\r\n  \r\nCLICK HERE http://talkwithcustomer.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works.\r\n\r\nNow it’s also true that when reaching out to hot leads, you MUST act fast – the difference between contacting someone within 5 minutes versus 30 minutes later is huge – like 100 times better!\r\n\r\nThat’s what makes our new SMS Text With Lead feature so powerful… you’ve got their phone number, so now you can start a text message (SMS) conversation with them… so even if they don’t take you up on your offer right away, you continue to text them new offers, new content, and new reasons to do business with you.\r\n\r\nThis could change everything for you and your business.\r\n\r\nCLICK HERE http://talkwithcustomer.com to learn more about everything Talk With Web Visitor can do and start turing eyeballs into money.\r\n\r\nEric\r\nPS: Talk With Web Visitor offers a FREE 14 days trial – you could be converting up to 100x more leads immediately!   \r\nIt even includes International Long Distance Calling. \r\nPaying customers are out there waiting. \r\nStarting connecting today by CLICKING HERE http://talkwithcustomer.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithcustomer.com/unsubscribe.aspx?d=serviceonus.com', '2021-05-22 03:02:14', '2021-05-22 03:02:14'),
(26, 'Kurtis', 'info@serviceonus.com', 'serviceonus.com', 'Hey \r\n \r\nCAREDOGBEST™ - Personalized Dog Harness. All sizes from XS to XXL.  Easy ON/OFF in just 2 seconds.  LIFETIME WARRANTY.\r\n\r\nClick here: caredogbest.online\r\n \r\nCheers, \r\n \r\nKurtis\r\nSERVICE ON US- PRODUCT BEHIND THE SERVICE', '2021-05-23 21:03:27', '2021-05-23 21:03:27'),
(27, 'Eric Jones', 'eric.jones.z.mail@gmail.com', 'Who needs eyeballs, you need BUSINESS', 'My name’s Eric and I just came across your website - serviceonus.com - in the search results.\r\n\r\nHere’s what that means to me…\r\n\r\nYour SEO’s working.\r\n\r\nYou’re getting eyeballs – mine at least.\r\n\r\nYour content’s pretty good, wouldn’t change a thing.\r\n\r\nBUT…\r\n\r\nEyeballs don’t pay the bills.\r\n\r\nCUSTOMERS do.\r\n\r\nAnd studies show that 7 out of 10 visitors to a site like serviceonus.com will drop by, take a gander, and then head for the hills without doing anything else.\r\n\r\nIt’s like they never were even there.\r\n\r\nYou can fix this.\r\n\r\nYou can make it super-simple for them to raise their hand, say, “okay, let’s talk” without requiring them to even pull their cell phone from their pocket… thanks to Talk With Web Visitor.\r\n\r\nTalk With Web Visitor is a software widget that sits on your site, ready and waiting to capture any visitor’s Name, Email address and Phone Number.  It lets you know immediately – so you can talk to that lead immediately… without delay… BEFORE they head for those hills.\r\n  \r\nCLICK HERE http://talkwithcustomer.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works.\r\n\r\nNow it’s also true that when reaching out to hot leads, you MUST act fast – the difference between contacting someone within 5 minutes versus 30 minutes later is huge – like 100 times better!\r\n\r\nThat’s what makes our new SMS Text With Lead feature so powerful… you’ve got their phone number, so now you can start a text message (SMS) conversation with them… so even if they don’t take you up on your offer right away, you continue to text them new offers, new content, and new reasons to do business with you.\r\n\r\nThis could change everything for you and your business.\r\n\r\nCLICK HERE http://talkwithcustomer.com to learn more about everything Talk With Web Visitor can do and start turing eyeballs into money.\r\n\r\nEric\r\nPS: Talk With Web Visitor offers a FREE 14 days trial – you could be converting up to 100x more leads immediately!   \r\nIt even includes International Long Distance Calling. \r\nPaying customers are out there waiting. \r\nStarting connecting today by CLICKING HERE http://talkwithcustomer.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithcustomer.com/unsubscribe.aspx?d=serviceonus.com', '2021-05-27 16:29:27', '2021-05-27 16:29:27'),
(28, 'Eric Jones', 'eric.jones.z.mail@gmail.com', 'Try this, get more leads', 'Hi, my name is Eric and I’m betting you’d like your website serviceonus.com to generate more leads.\r\n\r\nHere’s how:\r\nTalk With Web Visitor is a software widget that’s works on your site, ready to capture any visitor’s Name, Email address and Phone Number.  It signals you as soon as they say they’re interested – so that you can talk to that lead while they’re still there at serviceonus.com.\r\n\r\nTalk With Web Visitor – CLICK HERE https://talkwithwebvisitors.com for a live demo now.\r\n\r\nAnd now that you’ve got their phone number, our new SMS Text With Lead feature enables you to start a text (SMS) conversation – answer questions, provide more info, and close a deal that way.\r\n\r\nIf they don’t take you up on your offer then, just follow up with text messages for new offers, content links, even just “how you doing?” notes to build a relationship.\r\n\r\nCLICK HERE https://talkwithwebvisitors.com to discover what Talk With Web Visitor can do for your business.\r\n\r\nThe difference between contacting someone within 5 minutes versus a half-hour means you could be converting up to 100X more leads today!\r\n\r\nTry Talk With Web Visitor and get more leads now.\r\n\r\nEric\r\nPS: The studies show 7 out of 10 visitors don’t hang around – you can’t afford to lose them!\r\nTalk With Web Visitor offers a FREE 14 days trial – and it even includes International Long Distance Calling. \r\nYou have customers waiting to talk with you right now… don’t keep them waiting. \r\nCLICK HERE https://talkwithwebvisitors.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithwebvisitors.com/unsubscribe.aspx?d=serviceonus.com', '2021-05-28 04:19:26', '2021-05-28 04:19:26'),
(29, 'Mike Lewis', 'mike@quickcapitallenders1.xyz', 'Hello', 'Hello,\r\n\r\nI hope life is treating you kind and business is AWESOME!\r\n\r\nI just have one quick question for you.\r\n\r\nWould you consider a Working Capital Loan for your Business if the price and terms were acceptable?\r\n\r\nIf so, we can provide you with a funding decision is less than 30 seconds \r\nwithout pulling your credit or submitting a single document. \r\n\r\nJust click on the link to INSTANTLY see how much you qualify for www.quickcapitallenders1.xyz\r\n\r\nAlso, please check out this video to see how our program works, and all the funding options we have available for you.  www.quickcapitallenders1.xyz/video\r\n\r\n\r\n\r\nWarm Regards,\r\n\r\nMike Lewis\r\nQuick Capital Lenders\r\nwww.quickcapitallenders1.xyz\r\n\r\n\r\n\r\n\r\nThis is an Advertisement.\r\nTo unsubscribe, click here www.quickcapitallenders1.xyz/unsubscribe,\r\n\r\nor write to:\r\n\r\nQuick Capital Lenders\r\n9169 W State St #3242\r\nGarden City, ID 83714', '2021-06-03 02:11:26', '2021-06-03 02:11:26'),
(30, 'Eric Jones', 'eric.jones.z.mail@gmail.com', 'Who needs eyeballs, you need BUSINESS', 'My name’s Eric and I just came across your website - serviceonus.com - in the search results.\r\n\r\nHere’s what that means to me…\r\n\r\nYour SEO’s working.\r\n\r\nYou’re getting eyeballs – mine at least.\r\n\r\nYour content’s pretty good, wouldn’t change a thing.\r\n\r\nBUT…\r\n\r\nEyeballs don’t pay the bills.\r\n\r\nCUSTOMERS do.\r\n\r\nAnd studies show that 7 out of 10 visitors to a site like serviceonus.com will drop by, take a gander, and then head for the hills without doing anything else.\r\n\r\nIt’s like they never were even there.\r\n\r\nYou can fix this.\r\n\r\nYou can make it super-simple for them to raise their hand, say, “okay, let’s talk” without requiring them to even pull their cell phone from their pocket… thanks to Talk With Web Visitor.\r\n\r\nTalk With Web Visitor is a software widget that sits on your site, ready and waiting to capture any visitor’s Name, Email address and Phone Number.  It lets you know immediately – so you can talk to that lead immediately… without delay… BEFORE they head for those hills.\r\n  \r\nCLICK HERE http://talkwithcustomer.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works.\r\n\r\nNow it’s also true that when reaching out to hot leads, you MUST act fast – the difference between contacting someone within 5 minutes versus 30 minutes later is huge – like 100 times better!\r\n\r\nThat’s what makes our new SMS Text With Lead feature so powerful… you’ve got their phone number, so now you can start a text message (SMS) conversation with them… so even if they don’t take you up on your offer right away, you continue to text them new offers, new content, and new reasons to do business with you.\r\n\r\nThis could change everything for you and your business.\r\n\r\nCLICK HERE http://talkwithcustomer.com to learn more about everything Talk With Web Visitor can do and start turing eyeballs into money.\r\n\r\nEric\r\nPS: Talk With Web Visitor offers a FREE 14 days trial – you could be converting up to 100x more leads immediately!   \r\nIt even includes International Long Distance Calling. \r\nPaying customers are out there waiting. \r\nStarting connecting today by CLICKING HERE http://talkwithcustomer.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithcustomer.com/unsubscribe.aspx?d=serviceonus.com', '2021-06-23 18:33:09', '2021-06-23 18:33:09'),
(31, 'Eric Jones', 'eric.jones.z.mail@gmail.com', 'Who needs eyeballs, you need BUSINESS', 'My name’s Eric and I just came across your website - serviceonus.com - in the search results.\r\n\r\nHere’s what that means to me…\r\n\r\nYour SEO’s working.\r\n\r\nYou’re getting eyeballs – mine at least.\r\n\r\nYour content’s pretty good, wouldn’t change a thing.\r\n\r\nBUT…\r\n\r\nEyeballs don’t pay the bills.\r\n\r\nCUSTOMERS do.\r\n\r\nAnd studies show that 7 out of 10 visitors to a site like serviceonus.com will drop by, take a gander, and then head for the hills without doing anything else.\r\n\r\nIt’s like they never were even there.\r\n\r\nYou can fix this.\r\n\r\nYou can make it super-simple for them to raise their hand, say, “okay, let’s talk” without requiring them to even pull their cell phone from their pocket… thanks to Talk With Web Visitor.\r\n\r\nTalk With Web Visitor is a software widget that sits on your site, ready and waiting to capture any visitor’s Name, Email address and Phone Number.  It lets you know immediately – so you can talk to that lead immediately… without delay… BEFORE they head for those hills.\r\n  \r\nCLICK HERE http://talkwithcustomer.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works.\r\n\r\nNow it’s also true that when reaching out to hot leads, you MUST act fast – the difference between contacting someone within 5 minutes versus 30 minutes later is huge – like 100 times better!\r\n\r\nThat’s what makes our new SMS Text With Lead feature so powerful… you’ve got their phone number, so now you can start a text message (SMS) conversation with them… so even if they don’t take you up on your offer right away, you continue to text them new offers, new content, and new reasons to do business with you.\r\n\r\nThis could change everything for you and your business.\r\n\r\nCLICK HERE http://talkwithcustomer.com to learn more about everything Talk With Web Visitor can do and start turing eyeballs into money.\r\n\r\nEric\r\nPS: Talk With Web Visitor offers a FREE 14 days trial – you could be converting up to 100x more leads immediately!   \r\nIt even includes International Long Distance Calling. \r\nPaying customers are out there waiting. \r\nStarting connecting today by CLICKING HERE http://talkwithcustomer.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithcustomer.com/unsubscribe.aspx?d=serviceonus.com', '2021-06-30 04:03:08', '2021-06-30 04:03:08'),
(32, 'Mike Lewis', 'mike@quickcapitallenders1.xyz', 'Hello', 'Hello,\r\n\r\nI hope life is treating you kind and business is AWESOME!\r\n\r\nI just have one quick question for you.\r\n\r\nWould you consider a Working Capital Loan for your business if the price and terms were acceptable?\r\n\r\nWe offer loans from 10k to 500k regardless of credit or collateral, and will give you a funding decision in less than 30 seconds \r\nwithout pulling your credit or submitting a single document. \r\n\r\nJust click on the link to INSTANTLY see how much you qualify for www.quickcapitallenders1.xyz\r\n\r\n\r\n\r\nWarm Regards,\r\n\r\nMike Lewis\r\nQuick Capital Lenders\r\nwww.quickcapitallenders1.xyz\r\n\r\n\r\n\r\n\r\nThis is an Advertisement.\r\nTo unsubscribe, click here www.quickcapitallenders1.xyz/unsubscribe,\r\n\r\nor write to:\r\n\r\nQuick Capital Lenders\r\n9169 W State St #3242\r\nGarden City, ID 83714', '2021-07-08 00:03:53', '2021-07-08 00:03:53'),
(33, 'Kristen', 'info@serviceonus.com', 'serviceonus.com', 'Hello \r\n\r\nEnjoy the best experiences in using cell phones/tablet to watch the video, play games, facetime, live stream, read, and more with Flexible Adjustable Tablet Holder. Make your life easier at any place, anywhere, anytime. \r\n\r\nShop now with 50% OFF at: universalholder.online\r\n\r\nMany Thanks, \r\n\r\nKristen\r\nContact Us', '2021-07-15 19:55:20', '2021-07-15 19:55:20'),
(34, 'Erica Jackson', 'ericajacksonmi0@yahoo.com', 'DA50 Backlink to serviceonus.com', 'Hi, \r\n\r\nWe\'re wondering if you\'d be interested in a \'dofollow\' backlink to serviceonus.com from our website that has a Moz Domain Authority of 50?\r\n\r\nOur website is dedicated to facts/education, and so can host articles on pretty much any topic.\r\n\r\nYou can either write a new article yourself, or we can link from existing content. The price is just $40 to be paid via Paypal. This is a one-time fee, so there are no extra charges.\r\n\r\nIf you\'re interested, please reply to this email, including the word \'interested\' in the Subject Field.\r\n\r\nKind Regards,\r\nErica', '2021-07-16 22:28:10', '2021-07-16 22:28:10'),
(35, 'Berniece Perro', 'CarterArsham@yahoo.com', 'Scott Tjelmeland', 'Here are 18 free traffic sources you should be using: https://bit.ly/18-free-traffic-sources', '2021-07-20 09:36:57', '2021-07-20 09:36:57'),
(36, 'Ed Harris', 'ed@fastbusinessloans.xyz', 'Hello', 'Hello,\r\n\r\nI hope life is treating you kind and business is AWESOME!\r\n\r\nI just have one quick question for you.\r\n\r\nWould you consider a Working Capital Loan for your business if the price and terms were acceptable?\r\n\r\nWe offer loans from 10k to 500k regardless of credit or collateral, and will give you a funding decision in less than 30 seconds \r\nwithout pulling your credit or submitting a single document. \r\n\r\nJust click on the link to INSTANTLY see how much you qualify for www.fastbusinessloans.xyz\r\n\r\n\r\nWarm Regards,\r\n\r\nEd Harris\r\nFast Business Loans\r\nwww.fastbusinessloans.xyz\r\n\r\n\r\n\r\n\r\nThis is an Advertisement.\r\nTo unsubscribe, click here www.fastbusinessloans.xyz/unsubscribe,\r\n\r\nor write to:\r\n\r\nFast Business Loans\r\n9169 W State St #3242\r\nGarden City, ID 83714', '2021-07-22 00:39:02', '2021-07-22 00:39:02'),
(37, 'Jarvis Seacrist', 'ShantelleBuker@yahoo.com', 'Arden Wettach', 'Pros don\'t pay for ads. Here\'s 18 free traffic sources you should be using: https://bit.ly/18-free-traffic-sources', '2021-07-24 08:50:55', '2021-07-24 08:50:55');
INSERT INTO `general_enquiries` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(38, 'Eric Jones', 'eric.jones.z.mail@gmail.com', 'Try this, get more leads', 'Hi, my name is Eric and I’m betting you’d like your website serviceonus.com to generate more leads.\r\n\r\nHere’s how:\r\nTalk With Web Visitor is a software widget that’s works on your site, ready to capture any visitor’s Name, Email address and Phone Number.  It signals you as soon as they say they’re interested – so that you can talk to that lead while they’re still there at serviceonus.com.\r\n\r\nTalk With Web Visitor – CLICK HERE https://talkwithwebvisitors.com for a live demo now.\r\n\r\nAnd now that you’ve got their phone number, our new SMS Text With Lead feature enables you to start a text (SMS) conversation – answer questions, provide more info, and close a deal that way.\r\n\r\nIf they don’t take you up on your offer then, just follow up with text messages for new offers, content links, even just “how you doing?” notes to build a relationship.\r\n\r\nCLICK HERE https://talkwithwebvisitors.com to discover what Talk With Web Visitor can do for your business.\r\n\r\nThe difference between contacting someone within 5 minutes versus a half-hour means you could be converting up to 100X more leads today!\r\n\r\nTry Talk With Web Visitor and get more leads now.\r\n\r\nEric\r\nPS: The studies show 7 out of 10 visitors don’t hang around – you can’t afford to lose them!\r\nTalk With Web Visitor offers a FREE 14 days trial – and it even includes International Long Distance Calling. \r\nYou have customers waiting to talk with you right now… don’t keep them waiting. \r\nCLICK HERE https://talkwithwebvisitors.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithwebvisitors.com/unsubscribe.aspx?d=serviceonus.com', '2021-07-28 14:23:13', '2021-07-28 14:23:13'),
(39, 'Eric Jones', 'eric.jones.z.mail@gmail.com', 'how to turn eyeballs into phone calls', 'Hi, Eric here with a quick thought about your website serviceonus.com...\r\n\r\nI’m on the internet a lot and I look at a lot of business websites.\r\n\r\nLike yours, many of them have great content. \r\n\r\nBut all too often, they come up short when it comes to engaging and connecting with anyone who visits.\r\n\r\nI get it – it’s hard.  Studies show 7 out of 10 people who land on a site, abandon it in moments without leaving even a trace.  You got the eyeball, but nothing else.\r\n\r\nHere’s a solution for you…\r\n\r\nTalk With Web Visitor is a software widget that’s works on your site, ready to capture any visitor’s Name, Email address and Phone Number.  You’ll know immediately they’re interested and you can call them directly to talk with them literally while they’re still on the web looking at your site.\r\n\r\nCLICK HERE https://talkwithwebvisitors.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works.\r\n\r\nIt could be huge for your business – and because you’ve got that phone number, with our new SMS Text With Lead feature, you can automatically start a text (SMS) conversation – immediately… and contacting someone in that 5 minute window is 100 times more powerful than reaching out 30 minutes or more later.\r\n\r\nPlus, with text messaging you can follow up later with new offers, content links, even just follow up notes to keep the conversation going.\r\n\r\nEverything I’ve just described is extremely simple to implement, cost-effective, and profitable. \r\n \r\nCLICK HERE https://talkwithwebvisitors.com to discover what Talk With Web Visitor can do for your business.\r\n\r\nYou could be converting up to 100X more eyeballs into leads today!\r\n\r\nEric\r\nPS: Talk With Web Visitor offers a FREE 14 days trial – and it even includes International Long Distance Calling. \r\nYou have customers waiting to talk with you right now… don’t keep them waiting. \r\nCLICK HERE https://talkwithwebvisitors.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithwebvisitors.com/unsubscribe.aspx?d=serviceonus.com', '2021-07-31 10:37:29', '2021-07-31 10:37:29'),
(40, 'Olivia Pointon', 'avaolivia2747@gmail.com', 'Explainer Video for serviceonus.com?', 'Hi,\r\n\r\nWe\'d like to introduce to you our explainer video service which we feel can benefit your site serviceonus.com.\r\n\r\nCheck out some of our existing videos here:\r\nhttps://www.youtube.com/watch?v=ivTmAwuli14\r\nhttps://www.youtube.com/watch?v=uywKJQvfeAM\r\nhttps://www.youtube.com/watch?v=oPNdmMo40pI\r\nhttps://www.youtube.com/watch?v=6gRb-HPo_ck\r\n\r\nAll of our videos are in a similar animated format as the above examples and we have voice over artists with US/UK/Australian accents.\r\n\r\nThey can show a solution to a problem or simply promote one of your products or services. They are concise, can be uploaded to video such as Youtube, and can be embedded into your website or featured on landing pages.\r\n\r\nOur prices are as follows depending on video length:\r\n1 minute = $239\r\n1-2 minutes = $339\r\n2-3 minutes = $439\r\n\r\n*All prices above are in USD and include an engaging, captivating video with full script and voice-over.\r\n\r\nIf this is something you would like to discuss further, don\'t hesitate to get in touch.\r\n\r\nKind Regards,\r\nOlivia', '2021-07-31 15:36:14', '2021-07-31 15:36:14'),
(41, 'Jean Shrefler', 'DawneSchronce@gmail.com', 'Norberto Bublitz', '7 Ways To Promote Your Business Online For Free : https://bit.ly/free-ads-here', '2021-08-02 22:24:12', '2021-08-02 22:24:12'),
(42, 'Eric Jones', 'eric.jones.z.mail@gmail.com', 'Try this, get more leads', 'Hi, my name is Eric and I’m betting you’d like your website serviceonus.com to generate more leads.\r\n\r\nHere’s how:\r\nTalk With Web Visitor is a software widget that’s works on your site, ready to capture any visitor’s Name, Email address and Phone Number.  It signals you as soon as they say they’re interested – so that you can talk to that lead while they’re still there at serviceonus.com.\r\n\r\nTalk With Web Visitor – CLICK HERE https://talkwithwebvisitors.com for a live demo now.\r\n\r\nAnd now that you’ve got their phone number, our new SMS Text With Lead feature enables you to start a text (SMS) conversation – answer questions, provide more info, and close a deal that way.\r\n\r\nIf they don’t take you up on your offer then, just follow up with text messages for new offers, content links, even just “how you doing?” notes to build a relationship.\r\n\r\nCLICK HERE https://talkwithwebvisitors.com to discover what Talk With Web Visitor can do for your business.\r\n\r\nThe difference between contacting someone within 5 minutes versus a half-hour means you could be converting up to 100X more leads today!\r\n\r\nTry Talk With Web Visitor and get more leads now.\r\n\r\nEric\r\nPS: The studies show 7 out of 10 visitors don’t hang around – you can’t afford to lose them!\r\nTalk With Web Visitor offers a FREE 14 days trial – and it even includes International Long Distance Calling. \r\nYou have customers waiting to talk with you right now… don’t keep them waiting. \r\nCLICK HERE https://talkwithwebvisitors.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithwebvisitors.com/unsubscribe.aspx?d=serviceonus.com', '2021-08-19 20:20:22', '2021-08-19 20:20:22'),
(43, 'Eric Jones', 'eric.jones.z.mail@gmail.com', 'Try this, get more leads', 'Hi, my name is Eric and I’m betting you’d like your website serviceonus.com to generate more leads.\r\n\r\nHere’s how:\r\nTalk With Web Visitor is a software widget that’s works on your site, ready to capture any visitor’s Name, Email address and Phone Number.  It signals you as soon as they say they’re interested – so that you can talk to that lead while they’re still there at serviceonus.com.\r\n\r\nTalk With Web Visitor – CLICK HERE https://talkwithwebvisitors.com for a live demo now.\r\n\r\nAnd now that you’ve got their phone number, our new SMS Text With Lead feature enables you to start a text (SMS) conversation – answer questions, provide more info, and close a deal that way.\r\n\r\nIf they don’t take you up on your offer then, just follow up with text messages for new offers, content links, even just “how you doing?” notes to build a relationship.\r\n\r\nCLICK HERE https://talkwithwebvisitors.com to discover what Talk With Web Visitor can do for your business.\r\n\r\nThe difference between contacting someone within 5 minutes versus a half-hour means you could be converting up to 100X more leads today!\r\n\r\nTry Talk With Web Visitor and get more leads now.\r\n\r\nEric\r\nPS: The studies show 7 out of 10 visitors don’t hang around – you can’t afford to lose them!\r\nTalk With Web Visitor offers a FREE 14 days trial – and it even includes International Long Distance Calling. \r\nYou have customers waiting to talk with you right now… don’t keep them waiting. \r\nCLICK HERE https://talkwithwebvisitors.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithwebvisitors.com/unsubscribe.aspx?d=serviceonus.com', '2021-08-19 20:52:42', '2021-08-19 20:52:42'),
(44, 'Ed Harris', 'ed@fastbusinessloans.xyz', 'Hello', 'Hello,\r\n\r\nI hope life is treating you kind and business is AWESOME!\r\n\r\nI just have one quick question for you.\r\n\r\nWould you consider a Working Capital Loan for your business if the price and terms were acceptable?\r\n\r\nWe offer loans from 10k to 500k regardless of credit or collateral, and will give you a funding decision in less than 30 seconds \r\nwithout pulling your credit or submitting a single document. \r\n\r\nJust click on the link to INSTANTLY see how much you qualify for www.fastbusinessloans.xyz\r\n\r\n\r\nWarm Regards,\r\n\r\nEd Harris\r\nFast Business Loans\r\nwww.fastbusinessloans.xyz\r\n\r\n\r\n\r\n\r\nThis is an Advertisement.\r\nTo unsubscribe, click here www.fastbusinessloans.xyz/unsubscribe,\r\n\r\nor write to:\r\n\r\nFast Business Loans\r\n9169 W State St #3242\r\nGarden City, ID 83714', '2021-08-21 04:14:47', '2021-08-21 04:14:47'),
(45, 'Lashawn Anthony', 'lashawn@sundatagroup.one', '366,295,395 Companies / Executives. SunDataGroup.one', 'Hello.\r\n\r\nIt is with sad regret to inform you we are shutting down.\r\n\r\nWe are selling our entire leads database 366,295,395 Companies / Executives. for $179\r\n\r\nAll countries are $99 and you can buy the entire world 165 countries for $179.\r\n\r\nwww.SunDataGroup.one', '2021-08-30 21:09:35', '2021-08-30 21:09:35');

-- --------------------------------------------------------

--
-- Table structure for table `how_it_work`
--

CREATE TABLE `how_it_work` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `how_it_work`
--

INSERT INTO `how_it_work` (`id`, `image`, `title`, `description`, `icon_name`, `created_at`, `updated_at`) VALUES
(1, '1595395536day53-farm-removebg-preview.png', 'Tell Us What You Need', '<p>Let us know what service you are looking for. We offer more than 100 different services, and we are here to help.</p>', 'live_help', NULL, '2020-07-21 23:40:36'),
(2, '15953951552747193.png', 'We Will Find The Right Professional', '<p>Book your service directly with us online, or request quotes from our Wide Range of Licensed service partners.</p>', 'psychology', NULL, '2020-07-21 23:34:15'),
(3, '15953952302427279-removebg-preview.png', 'Sit Back And Relax', '<p>Let our professionals do the work while you focus on doing what you love. Our contact center is open 7 days a week to help you along the way.</p>', 'whatshot', NULL, '2020-07-21 23:35:30');

-- --------------------------------------------------------

--
-- Table structure for table `label_for_multiple_inputs`
--

CREATE TABLE `label_for_multiple_inputs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `label_for_form` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label_for_invoice` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `label_for_multiple_inputs`
--

INSERT INTO `label_for_multiple_inputs` (`id`, `service_id`, `label_for_form`, `label_for_invoice`, `created_at`, `updated_at`) VALUES
(1, 63, 'Office Specification', 'Office Specification', '2021-04-15 01:17:08', '2021-04-15 01:17:08'),
(2, 63, 'Paint Specification', 'Paint Specification', '2021-04-15 02:09:00', '2021-04-15 02:09:00'),
(3, 69, 'Office Specification', 'Office Specification', '2021-04-15 04:04:14', '2021-04-15 04:04:14');

-- --------------------------------------------------------

--
-- Table structure for table `logos`
--

CREATE TABLE `logos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logos`
--

INSERT INTO `logos` (`id`, `logo`, `created_at`, `updated_at`) VALUES
(8, '1622564919hillwhite.png', '2021-06-01 21:28:39', '2021-06-01 21:28:39'),
(9, '1622565778rasha.png', '2021-06-01 21:42:58', '2021-06-01 21:42:58'),
(11, '1622566011aaaa.png', '2021-06-01 21:46:51', '2021-06-01 21:46:51'),
(12, '1622566067Logo.png', '2021-06-01 21:47:47', '2021-06-01 21:47:47'),
(13, '1622566221LV-LOGO-5.png', '2021-06-01 21:50:21', '2021-06-01 21:50:21'),
(14, '1622566409111.png', '2021-06-01 21:53:29', '2021-06-01 21:53:29');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2020_05_28_162802_create_categories_table', 1),
(4, '2020_05_28_163011_create_input_types_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 2),
(6, '2020_06_14_162749_create_admins_table', 3),
(7, '2020_06_15_183857_create_websites_table', 4),
(8, '2020_06_16_120500_create_pages_table', 5),
(9, '2020_06_18_190851_create_websites_table', 6),
(10, '2020_06_22_080408_create_testimonials_table', 7),
(11, '2020_06_25_010249_create_input_tpyes_table', 8),
(12, '2020_06_25_064429_create_service_fields_table', 8),
(13, '2020_07_09_170250_create_service_provider_details_table', 9),
(14, '2020_07_09_170527_create_cities_table', 10),
(15, '2020_07_09_171103_create_user_city_table', 11),
(16, '2020_07_09_171408_create_user_service_table', 11),
(17, '2020_07_21_170946_create_service_enquiries_table', 12),
(18, '2020_07_21_182236_create_how_it_work_table', 13),
(19, '2020_07_22_060004_create_sliders_table', 14),
(20, '2020_07_22_060034_create_slider_texts_table', 14),
(21, '2020_07_22_184037_create_general_enquiries_table', 15),
(22, '2020_07_24_001942_create_our_missions_table', 16),
(23, '2020_07_24_011156_create_faqs_table', 17),
(24, '2016_06_01_000001_create_oauth_auth_codes_table', 18),
(25, '2016_06_01_000002_create_oauth_access_tokens_table', 18),
(26, '2016_06_01_000003_create_oauth_refresh_tokens_table', 18),
(27, '2016_06_01_000004_create_oauth_clients_table', 18),
(28, '2016_06_01_000005_create_oauth_personal_access_clients_table', 18),
(29, '2020_07_27_005716_add_other_field_to_user_table', 19),
(30, '2020_07_28_165530_create_services_table', 20),
(31, '2020_07_28_173119_create_service_text_fields_table', 21),
(32, '2020_07_28_174252_create_services_table', 22),
(33, '2020_07_28_181924_create_service_text_fields_table', 23),
(34, '2020_07_29_094252_create_service_textarea_fields_table', 24),
(35, '2020_08_01_203206_create_service_date_fields_table', 25),
(36, '2020_08_01_204459_create_service_checkoption_fields_table', 26),
(37, '2020_08_01_204641_create_checkoption_values_table', 27),
(38, '2020_08_02_104837_create_service_time_fields_table', 28),
(39, '2020_08_02_104911_create_service_time_values_table', 28),
(40, '2020_08_05_090027_create_service_select_fields_table', 29),
(41, '2020_08_05_090848_create_service_select_field_options_table', 29),
(42, '2020_08_10_201227_create_user_service_table', 30),
(43, '2020_08_11_080131_create_user_other_details_table', 31),
(44, '2020_08_12_005947_create_orders_table', 32),
(45, '2020_08_12_043542_create_check_field_values_table', 33),
(46, '2020_08_12_045424_create_service_radio_fields_table', 34),
(47, '2020_08_12_045912_create_servie_radio_options_table', 35),
(48, '2020_08_12_070421_create_select_field_values_table', 36),
(49, '2020_08_12_072313_create_text_field_values_table', 37),
(50, '2020_08_12_080109_create_textarea_field_values_table', 38),
(51, '2020_08_12_081220_create_time_field_values_table', 39),
(52, '2020_08_12_083123_create_date_field_values_table', 40),
(53, '2020_08_14_101321_create_notifications_table', 41),
(54, '2020_08_16_165329_create_service_check2_fields_table', 42),
(55, '2020_08_16_165518_create_service_check2_options_table', 42),
(56, '2020_08_16_184301_create_radio_field_values_table', 43),
(57, '2020_08_16_185245_create_check2_field_values_table', 43),
(58, '2020_08_18_205029_create_check_field_values_table', 44),
(59, '2020_08_18_212001_create_check_field_values_table', 45),
(60, '2020_08_18_213411_create_radio_field_values_table', 46),
(61, '2021_01_10_081445_create_text_fields_table', 47),
(62, '2021_01_11_045349_create_textarea_fields_table', 48),
(65, '2021_01_11_051651_create_time_fields_table', 49),
(66, '2021_01_11_054750_create_time_field_options_table', 49),
(67, '2021_01_11_072342_create_date_fields_table', 50),
(68, '2021_01_11_094050_create_check_field_with_charges_table', 51),
(69, '2021_01_11_094239_create_check_option_with_charges_table', 51),
(70, '2021_01_11_100735_create_check_fields_table', 52),
(71, '2021_01_11_100834_create_check_options_table', 52),
(72, '2021_01_11_110226_create_radio_field_with_charges_table', 53),
(73, '2021_01_11_110345_create_radio_option_with_charges_table', 53),
(74, '2021_01_11_175525_create_radio_fields_table', 54),
(75, '2021_01_11_175953_create_radio_options_table', 54),
(76, '2021_01_11_184141_create_select_field_with_charges_table', 55),
(77, '2021_01_11_184223_create_select_option_with_charges_table', 55),
(78, '2021_01_11_185722_create_select_fields_table', 56),
(79, '2021_01_11_190006_create_select_options_table', 56),
(80, '2021_01_17_061328_create_vendor_check_field_charges_table', 57),
(81, '2021_01_17_071151_create_vendor_check_field_charges_table', 58),
(82, '2021_01_18_075055_create_vendor_radio_field_charges_table', 59),
(83, '2021_01_18_075343_create_vendor_select_field_charges_table', 60),
(84, '2021_01_19_054121_create_radio_with_charge_values_table', 61),
(85, '2021_01_19_063456_create_radio_values_table', 62),
(86, '2021_01_19_073325_create_check_with_charge_values_table', 63),
(87, '2021_01_19_073632_create_check_values_table', 64),
(88, '2021_01_19_083232_create_select_with_charge_values_table', 65),
(89, '2021_01_19_084259_create_select_values_table', 66),
(90, '2021_01_19_085300_create_text_values_table', 67),
(91, '2021_01_19_090247_create_textarea_values_table', 68),
(92, '2021_01_19_091724_create_date_values_table', 69),
(93, '2021_01_19_093240_create_time_values_table', 70),
(94, '2021_02_13_223512_add_fields_in_cities', 71),
(95, '2021_02_28_234333_create_available_ons_table', 72),
(96, '2021_03_08_110442_create_subscribtion_plans_table', 73),
(97, '2021_03_08_110932_create_subscribplans_table', 74),
(98, '2021_03_08_111104_create_subscribeplan_users_table', 74),
(99, '2021_03_19_062844_create_wallets_table', 75),
(100, '2021_03_19_063714_create_wallet_debit_credits_table', 76),
(101, '2021_03_19_103826_create_refers_table', 77),
(102, '2021_03_21_093104_create_telr_transactions_table', 78),
(103, '2021_04_01_073840_create_user_refercode_statuses_table', 79),
(104, '2021_04_03_151300_create_logos_table', 80),
(105, '2021_04_06_055741_create_pest_control_orders_table', 81),
(106, '2021_04_15_050926_create_label_for_multiple_inputs_table', 82),
(107, '2021_04_15_051157_create_multiple_input_fields_table', 82),
(108, '2021_04_15_051228_create_multiple_input_values_table', 82),
(109, '2021_04_15_064542_add_column_in_label_for_multiple_inputs_table', 83),
(110, '2021_04_15_065012_add_column_in_label_for_multiple_inputs_table', 84),
(111, '2021_04_28_052106_create_time2_fields_table', 85),
(112, '2021_04_28_052453_create_time2_values_table', 85),
(113, '2021_04_30_053830_create_deepcleaning_orders_table', 86),
(114, '2021_04_30_065524_create_sanitization_orders_table', 87),
(115, '2021_04_30_075319_create_painting_orders_table', 88),
(116, '2021_06_04_111044_create_pest_control_treatment_types_table', 89),
(117, '2021_06_05_154818_create_residential_pest_controls_table', 90),
(120, '2021_06_07_005600_create_office_pest_controls_table', 91),
(121, '2021_06_07_053000_create_office_pest_controls_table', 92),
(122, '2021_06_07_060402_create_vendor_office_p_c_s_table', 92),
(123, '2021_06_07_061244_create_vendor_residential_p_c_s_table', 93),
(124, '2021_06_14_101039_add_column_in_user_service_table', 94);

-- --------------------------------------------------------

--
-- Table structure for table `multiple_input_fields`
--

CREATE TABLE `multiple_input_fields` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `label_for_multiple_input_id` bigint(20) UNSIGNED NOT NULL,
  `input_field_label` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `multiple_input_fields`
--

INSERT INTO `multiple_input_fields` (`id`, `label_for_multiple_input_id`, `input_field_label`, `created_at`, `updated_at`) VALUES
(1, 1, 'Office size (sq ft)', '2021-04-15 01:17:08', '2021-04-15 01:17:08'),
(2, 1, 'Number of Cabin', '2021-04-15 01:17:08', '2021-04-15 01:17:08'),
(3, 1, 'Number of Desk', '2021-04-15 01:17:08', '2021-04-15 01:17:08'),
(4, 2, 'Color', '2021-04-15 02:09:00', '2021-04-15 02:09:00'),
(5, 2, 'Number of walls', '2021-04-15 02:09:00', '2021-04-15 02:09:00'),
(6, 2, 'Number of painter required', '2021-04-15 02:09:00', '2021-04-15 02:09:00'),
(7, 3, 'Office size (sq ft)', '2021-04-15 04:04:14', '2021-04-15 04:04:14'),
(8, 3, 'Number of Cabin', '2021-04-15 04:04:14', '2021-04-15 04:04:14'),
(9, 3, 'Number of Desk', '2021-04-15 04:04:14', '2021-04-15 04:04:14');

-- --------------------------------------------------------

--
-- Table structure for table `multiple_input_values`
--

CREATE TABLE `multiple_input_values` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `label_for_multiple_input_id` bigint(20) UNSIGNED NOT NULL,
  `multiple_input_field_id` bigint(20) UNSIGNED NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('04b001d15967685e934bfc8954be84c2e2bfadbfa8d46cf937f6ea401af7eda5ff7c403289e832e5', 37, 1, 'authToken', '[]', 0, '2020-07-30 17:40:38', '2020-07-30 17:40:38', '2021-07-30 23:25:38'),
('05a52b7b2229171ba223e25f3b3d08721adb62c18e32aead90ceece9c8197316f3aa8e3d78bc4eb3', 94, 1, 'Access Token', '[\"*\"]', 0, '2021-01-21 02:34:52', '2021-01-21 02:34:52', '2022-01-21 08:19:52'),
('06e93df7aae78a40a383a703757b1ca1110899a30f14ac2cd8b0a425cbc500a4222800e1d4753637', 17, 1, 'authToken', '[]', 0, '2020-07-27 11:10:07', '2020-07-27 11:10:07', '2021-07-27 16:55:07'),
('0717eb1dc5b659000cbe3d1609b1e9b7f07141fa879eb4d726ad65235b752707cec34ec0fe4bd2ab', 36, 1, 'authToken', '[]', 0, '2020-07-30 06:28:19', '2020-07-30 06:28:19', '2021-07-30 12:13:19'),
('07c796a589917215ce888f57e503c0f5d45d0c7364127ba63e3f28d6b17bd8648edb65bc15582ba3', 106, 1, 'Access Token', '[\"*\"]', 0, '2021-02-24 01:49:10', '2021-02-24 01:49:10', '2022-02-23 19:49:10'),
('09512d30925c3f9c180831c7861f594b8bf68256372fdc86cc9629925f757fab5cc91e195bee2e6c', 95, 1, 'authToken', '[]', 0, '2021-01-27 04:26:45', '2021-01-27 04:26:45', '2022-01-27 10:11:45'),
('0c7721c8db2daa1ed52a803b603b3d5cc02d7bcf77efd7252503f647fecbff25e0cd0560f8a13898', 136, 1, 'authToken', '[]', 0, '2021-05-24 12:03:25', '2021-05-24 12:03:25', '2022-05-24 07:03:25'),
('0d592936b413dd239808e491b43a4956818f1fce0717f1435f4ea123f348a96abd8bea43002b56e7', 55, 1, 'authToken', '[]', 0, '2020-09-02 06:19:28', '2020-09-02 06:19:28', '2021-09-02 12:04:28'),
('0ec9f0ef4a5814504725c692032b2ed2378217b0a19c2829c8c643469f44b9bd3089e0ace46e9902', 54, 1, 'Access Token', '[\"*\"]', 0, '2020-08-16 02:39:22', '2020-08-16 02:39:22', '2021-08-16 08:24:22'),
('15491647edef86b086132956acf9ba68062b83533166b210e5452c8749bd5c3aaa06839d54e75fc9', 54, 1, 'Access Token', '[\"*\"]', 0, '2020-08-16 03:28:24', '2020-08-16 03:28:24', '2021-08-16 09:13:24'),
('1bbe48b0a5d03b7af5ab2822b33f83828691f1e80ab28b4df197dea71589b52b4137abdd26c7d8d9', 145, 1, 'Access Token', '[\"*\"]', 0, '2021-06-15 22:14:14', '2021-06-15 22:14:14', '2022-06-15 17:14:14'),
('1d32d70d19c73378bce377c18ea3720800ddb69772b45b825ee71c8f7171bff63104e34a0a829f07', 70, 1, 'Access Token', '[\"*\"]', 0, '2020-12-13 04:39:41', '2020-12-13 04:39:41', '2021-12-13 10:24:41'),
('1e6f91573f01f113471b093d865525b2c96be40f3a80c92435115939a41ae981bd1103b92461e585', 61, 1, 'authToken', '[]', 0, '2020-09-26 15:52:53', '2020-09-26 15:52:53', '2021-09-26 10:52:53'),
('1f109ae886cfbb52b40cf419d90aac8b439a34e3c4ecd9aead707822597a62d5aed20af63e924b2a', 45, 1, 'authToken', '[]', 0, '2020-07-30 17:53:37', '2020-07-30 17:53:37', '2021-07-30 23:38:37'),
('2031cf182c13bbdabf9de441f751d6f2dc3910de2aa53121b2a09c325f5b7ca0d638fd696919983e', 24, 1, 'authToken', '[]', 0, '2020-07-27 11:27:04', '2020-07-27 11:27:04', '2021-07-27 17:12:04'),
('2152b0352dbc26919e65567aa4bb2fe21b4c89d785d818ce1eafedb2544471e1346c38cbf7ab4aed', 19, 1, 'authToken', '[]', 0, '2020-07-27 11:11:41', '2020-07-27 11:11:41', '2021-07-27 16:56:41'),
('2783aa30731e5b25f49a72916506818e01cb1c94cb50cf90e19c84f2ef2898a42c684d803f586159', 97, 1, 'Access Token', '[\"*\"]', 0, '2021-02-11 22:37:11', '2021-02-11 22:37:11', '2022-02-11 16:37:11'),
('288e36a59faf89fee38087972c94d77bc6d32f561a60fd384b03787eb39fe33a303aa4a3165b4af6', 70, 1, 'Access Token', '[\"*\"]', 0, '2020-12-13 04:39:35', '2020-12-13 04:39:35', '2021-12-13 10:24:35'),
('2d31ff70321804306e36d6060f2d5b0519c88c6f065bac6da83908591dcf50e8fec368742570b901', 70, 1, 'Access Token', '[\"*\"]', 0, '2020-12-13 04:38:37', '2020-12-13 04:38:37', '2021-12-13 10:23:37'),
('2e880a84bb6a5289e68fa7bbc969307781e3681786af5c00b42dae899c145bea684db6f7c8cc296a', 54, 1, 'Access Token', '[\"*\"]', 0, '2020-08-16 02:00:15', '2020-08-16 02:00:15', '2021-08-16 07:45:15'),
('2f45f9030038e5ebf97b1c02d577d6d1c8f2c94a3997eeefa6aed79c43f907aa7d255a2092988296', 70, 1, 'Access Token', '[\"*\"]', 0, '2020-12-13 04:40:23', '2020-12-13 04:40:23', '2021-12-13 10:25:23'),
('39d2b7db14bd92b62ab9d97aed6f8be734bb0704171ca8dfc9bfa9e80839c2bfd3f16c4aeb7aeb58', 70, 1, 'Access Token', '[\"*\"]', 0, '2020-12-13 04:39:30', '2020-12-13 04:39:30', '2021-12-13 10:24:30'),
('3a9891a1a162bbaeda139773dba7728c7f488ee8b4630f3d004a878c72916533af6a357b7e62f342', 120, 1, 'authToken', '[]', 0, '2021-03-18 00:52:33', '2021-03-18 00:52:33', '2022-03-18 06:37:33'),
('3b415f1d7b41369f589d19f5956c2969cd8c4c193ef44bbc8ffdb6a21a11ddc0ba3551df5916996a', 54, 1, 'Access Token', '[\"*\"]', 0, '2020-08-16 01:55:18', '2020-08-16 01:55:18', '2021-08-16 07:40:18'),
('3c07bdb957dbc585f7776b62dba4481d1b4cd7717c36c865655d4bcbbe5971c685e9c8213dfd5f53', 104, 1, 'Access Token', '[\"*\"]', 0, '2021-02-23 09:48:34', '2021-02-23 09:48:34', '2022-02-23 03:48:34'),
('3c38cb1c23f10a0f0d20b837c90176b96624af748f129a9f8424391e1802d21094244ba8668e2563', 54, 1, 'Access Token', '[\"*\"]', 0, '2020-08-16 03:34:11', '2020-08-16 03:34:11', '2021-08-16 09:19:11'),
('3f016621c5bfee0cd4bfce43747cd33451e8fd9c9b1cfd19a20c80d814ca94b16f585a41f55cb9e8', 54, 1, 'Access Token', '[\"*\"]', 0, '2020-08-16 01:40:08', '2020-08-16 01:40:08', '2021-08-16 07:25:08'),
('3f991d7beae0821d9fb51faec8bae6b11a476523dee59e589de9625825ef9f2b73ce4203c3ac5522', 104, 1, 'Access Token', '[\"*\"]', 0, '2021-02-23 21:11:09', '2021-02-23 21:11:09', '2022-02-23 15:11:09'),
('3fec9155f1aae65beb0462e88a4313f2950d7601ef827c641aff35aa1aa057af86f8b755dc301af5', 2, 1, 'authToken', '[]', 0, '2020-07-27 12:39:47', '2020-07-27 12:39:47', '2021-07-27 18:24:47'),
('40b494b1d9fb05537cbab1a89a35e1539219e2aa354d3c5549fd74e54a32db42927456bbdc026389', 70, 1, 'Access Token', '[\"*\"]', 0, '2020-12-13 04:40:48', '2020-12-13 04:40:48', '2021-12-13 10:25:48'),
('44a15ee93f8bb36b4e0328ac6616f6051b2b70ba2762a9361f52f84bffaf0d3362307a024322f5b5', 127, 1, 'authToken', '[]', 0, '2021-05-01 08:33:50', '2021-05-01 08:33:50', '2022-05-01 14:18:50'),
('4a9833bb85a051b78a1810ef1ca3a52828d14d0aebeea80a063cf4ecf9e57a5e38e0f79e869cd177', 54, 1, 'Access Token', '[\"*\"]', 0, '2020-08-16 01:51:32', '2020-08-16 01:51:32', '2021-08-16 07:36:32'),
('5337e7e7c8781aadd2bc83068f5c7aef57c9c347de263e7d5761220beea0cc4409a673472be28c6e', 56, 1, 'authToken', '[]', 0, '2020-09-02 06:22:32', '2020-09-02 06:22:32', '2021-09-02 12:07:32'),
('55683e13818a65afa827581fc444193d9fda3ef81d498dcbb7593ebfba06350139e5512b2c8cf5b6', 30, 1, 'authToken', '[]', 0, '2020-07-27 11:46:59', '2020-07-27 11:46:59', '2021-07-27 17:31:59'),
('565acdb809a12e52d35c6be2a708cc4acc893f5163f85c5e4ae53b6bfdac01860f918652dccc5053', 54, 1, 'Access Token', '[\"*\"]', 0, '2020-08-16 03:12:19', '2020-08-16 03:12:19', '2021-08-16 08:57:19'),
('58cfd8be1e226b70722199613b226ae32471e478d67f210fd4063639615e3ca066aa6887b6fc3353', 54, 1, 'Access Token', '[\"*\"]', 0, '2020-08-16 01:48:40', '2020-08-16 01:48:40', '2021-08-16 07:33:40'),
('5ad5bd044e61938ad2e0fb1fd61ae305507fc70025444548f9b300daaec23f6bf169db931021d314', 70, 1, 'Access Token', '[\"*\"]', 0, '2020-12-13 04:40:29', '2020-12-13 04:40:29', '2021-12-13 10:25:29'),
('5f4826fa47f93b280a5b6a666add69f0eaac7e520e5d6fad021aeb754e40f3eaec99d82aee22e876', 29, 1, 'authToken', '[]', 0, '2020-07-27 11:33:02', '2020-07-27 11:33:02', '2021-07-27 17:18:02'),
('611ae91c171c7b29db9d221838d5e4e9405d6a1653adccbf929509de79bfbc3afd67f38db12d5d76', 13, 1, 'authToken', '[]', 0, '2020-07-27 11:01:25', '2020-07-27 11:01:25', '2021-07-27 16:46:25'),
('66356099027bf20613dd00fcb87667f0b20cd8959751bb71c70f0baef35f68d9864f451b15f3b883', 51, 1, 'Access Token', '[\"*\"]', 0, '2021-01-18 04:47:37', '2021-01-18 04:47:37', '2022-01-18 10:32:37'),
('67e74a0288f01d85dc774daebc0eb7ccf58f8fce6e440451ead813b638a0182a4d3285e6345dee38', 89, 1, 'Access Token', '[\"*\"]', 0, '2021-01-18 04:49:01', '2021-01-18 04:49:01', '2022-01-18 10:34:01'),
('68c068876379df43274ce97090e2097bab7e190bfd93acbe3c12a1bae9e919794b08b1d4897b8200', 99, 1, 'authToken', '[]', 0, '2021-03-16 23:50:55', '2021-03-16 23:50:55', '2022-03-17 05:35:55'),
('6aedde7d83b908d52be60f75bf3f112ea109f065ab36d8a5c8c389fbd875fa28a31daeab70bae8e1', 70, 1, 'Access Token', '[\"*\"]', 0, '2020-12-13 04:39:59', '2020-12-13 04:39:59', '2021-12-13 10:24:59'),
('70211d02ee089cfb984170461ed77e96a42813b5a84c05732195e8987a1104a1b381b2495c1da199', 70, 1, 'Access Token', '[\"*\"]', 0, '2020-12-13 04:39:53', '2020-12-13 04:39:53', '2021-12-13 10:24:53'),
('70b0ad7a52a60ce9fd0f4e9db36cbf571ef0d93505cd60475dc91df78ca54349658e927819b5077e', 70, 1, 'Access Token', '[\"*\"]', 0, '2020-12-13 04:41:01', '2020-12-13 04:41:01', '2021-12-13 10:26:01'),
('731ef0b6b40f3a5d2eaf94a4bfb288a27272507f50dbcbb92c49ab18943651f38474a43d8e977554', 70, 1, 'Access Token', '[\"*\"]', 0, '2020-12-13 04:40:35', '2020-12-13 04:40:35', '2021-12-13 10:25:35'),
('733463bb12eef3a5ad5ed82d462b1ba28b0fba02b6cc36a6d03430a00d952af8fe651f048fbd5e12', 70, 1, 'Access Token', '[\"*\"]', 0, '2020-12-13 04:40:11', '2020-12-13 04:40:11', '2021-12-13 10:25:11'),
('747ad5f39e25a26e09321a2fe8298fd0b4648547b291e7ff1b7850e075020ba7b172a5edfb5dff57', 54, 1, 'Access Token', '[\"*\"]', 0, '2020-08-16 01:43:05', '2020-08-16 01:43:05', '2021-08-16 07:28:05'),
('750e371529b03990c195e06614a15cdb5764384c7241e8099a2e0cd7dfea91ed14758a0b9fe8c37d', 54, 1, 'Access Token', '[\"*\"]', 0, '2020-08-16 01:58:00', '2020-08-16 01:58:00', '2021-08-16 07:43:00'),
('7d3c9dd67115ef4fada29f0c420fe2c505c2e1e001e32a459337733e41c03bce839beb91762b697f', 58, 1, 'authToken', '[]', 0, '2020-09-20 09:36:03', '2020-09-20 09:36:03', '2021-09-20 04:36:03'),
('7ebf53bac2542442b6ee92496691686a031e75ef1ef4efbd15cf03ed1aa51bcb676c1e9736b9c773', 138, 1, 'Access Token', '[\"*\"]', 0, '2021-06-03 14:08:57', '2021-06-03 14:08:57', '2022-06-03 09:08:57'),
('80880780acb9fae162a787314dec28d1c6e3dbc3522f189f782a14b87ed2c50c5906a47964a5680f', 104, 1, 'Access Token', '[\"*\"]', 0, '2021-02-23 09:50:17', '2021-02-23 09:50:17', '2022-02-23 03:50:17'),
('819868e5efe5efa5817ec28ea92904f5db40fab1326c2313d1678ffba8bfebdeca897a62d787b9d5', 31, 1, 'authToken', '[]', 0, '2020-07-27 11:48:22', '2020-07-27 11:48:22', '2021-07-27 17:33:22'),
('81f9fb18114e17ec4b3b288a9e622febf6e09a9b083c7b0d029261331693fd518163b5d33fcca03e', 41, 1, 'authToken', '[]', 0, '2020-07-30 17:46:47', '2020-07-30 17:46:47', '2021-07-30 23:31:47'),
('8616134bb4d4621abe24186c6649c2225588fcd64f1bd0d1b1619d7637c10ecdf8e908f2fec5e9e7', 39, 1, 'authToken', '[]', 0, '2020-07-30 17:43:21', '2020-07-30 17:43:21', '2021-07-30 23:28:21'),
('8db2a3fcd234834eedf22a027db2f1249c61ca2e4635f6ca9cce259615e18f68263e7ee29b73622a', 112, 1, 'Access Token', '[\"*\"]', 0, '2021-03-03 08:17:49', '2021-03-03 08:17:49', '2022-03-03 02:17:49'),
('8def9719d3b7599b676d30fa8da5fbd454a3894ff510dbc3f84c3b164ed57bd6e3bfec51bf2848da', 102, 1, 'Access Token', '[\"*\"]', 0, '2021-02-17 22:10:09', '2021-02-17 22:10:09', '2022-02-17 16:10:09'),
('97f9904da275c2c2fe0bb060725e7d26cab3ec52f8fe66086d9b529e5b812bd8cccadf56710b31bf', 133, 1, 'authToken', '[]', 0, '2021-05-24 10:58:23', '2021-05-24 10:58:23', '2022-05-24 05:58:23'),
('9a2940d421c33f6912f72983af13b812e5a291254ad66dee8cf0a3ef82f3282c0d3a3c325d32580c', 22, 1, 'authToken', '[]', 0, '2020-07-27 11:24:27', '2020-07-27 11:24:27', '2021-07-27 17:09:27'),
('9d826cad55a80a91770728ddfa7356f084f225472e75158c399423ad71c934ba6c6e54b9ddf2f8bd', 57, 1, 'authToken', '[]', 0, '2020-09-07 04:05:02', '2020-09-07 04:05:02', '2021-09-07 09:50:02'),
('a82102eba0ddd12fc9861584ca817ac419e115c41dd054996a19eceb8de8cba7cd2059d7576efb12', 32, 1, 'authToken', '[]', 0, '2020-07-30 05:23:21', '2020-07-30 05:23:21', '2021-07-30 11:08:21'),
('ab934598104a90465f99d3af983e87a2f419fb255992884b5af2d6e088dad52991d7162fb2288e9d', 104, 1, 'Access Token', '[\"*\"]', 0, '2021-02-23 03:09:51', '2021-02-23 03:09:51', '2022-02-23 08:54:51'),
('b3f601311f1e97a7ec431d67b631bda00384eee593154e87427323a3d5ec481e9d2834bc096726cd', 134, 1, 'authToken', '[]', 0, '2021-05-24 11:48:07', '2021-05-24 11:48:07', '2022-05-24 06:48:07'),
('b661c219eb9932d458bb1510b01b5578d38edb96f643128de2c5cedc6bc0c2eab954e40e0e1ae0ac', 63, 1, 'authToken', '[]', 0, '2020-10-29 04:45:09', '2020-10-29 04:45:09', '2021-10-28 23:45:09'),
('b816b696ad04908bf661e7e3c30ac5d33ed299d40938c99cf2c898c6c5317fb78297e716be3d5466', 42, 1, 'authToken', '[]', 0, '2020-07-30 17:47:52', '2020-07-30 17:47:52', '2021-07-30 23:32:52'),
('b8f69e385a9d29ddb5be16d98f3c957c7d5badd5f603b8c9b104650c88542ff91d71bcc873478e49', 40, 1, 'authToken', '[]', 0, '2020-07-30 17:44:44', '2020-07-30 17:44:44', '2021-07-30 23:29:44'),
('b9442d0942315b2505ccd5281f826cbb416876829c94716c45ff8ba9d0d4a541b40985bd098e6830', 54, 1, 'Access Token', '[\"*\"]', 0, '2020-08-16 01:29:29', '2020-08-16 01:29:29', '2021-08-16 07:14:29'),
('b95f7947273e0a04c3d7adcccdfea6e87de8a729c885b814e669531cf7c433027a8cc87144f29d48', 70, 1, 'Access Token', '[\"*\"]', 0, '2020-12-13 04:38:54', '2020-12-13 04:38:54', '2021-12-13 10:23:54'),
('b97bd100246c0a0a8f87354186195a81262345310a9db4f1d85166080cc1ea71da3bd7ff5b9d25fe', 44, 1, 'authToken', '[]', 0, '2020-07-30 17:51:28', '2020-07-30 17:51:28', '2021-07-30 23:36:28'),
('ba09efb6a8b7bfbbd66c4757fee47404c06795a176704ec93b3bafba6167e775b2f1f4bf9b197c54', 92, 1, 'authToken', '[]', 0, '2021-01-28 19:13:26', '2021-01-28 19:13:26', '2022-01-29 00:58:26'),
('bfc21129f2e6793e2baf492c13bd3e894cc82afff34283971f67d4ca459ae1236f85b5d2324880ca', 70, 1, 'Access Token', '[\"*\"]', 0, '2020-12-13 04:40:41', '2020-12-13 04:40:41', '2021-12-13 10:25:41'),
('c0c098fe2199e85981ce2d8b2f81e6875aee591da24073137faab5b19caf2449c378e695ee20561c', 131, 1, 'Access Token', '[\"*\"]', 0, '2021-05-05 21:43:38', '2021-05-05 21:43:38', '2022-05-05 16:43:38'),
('c5d818f6981311fb6ed88aa73723852323ea2158927a2e70d399e65d44bb2ec839df22093dfd5dad', 70, 1, 'Access Token', '[\"*\"]', 0, '2020-12-13 04:40:17', '2020-12-13 04:40:17', '2021-12-13 10:25:17'),
('c85ffa6bd956528da3dde097d20ead3f710c4ace06e7252197173e514b9d9a19b275f157d0557c77', 70, 1, 'Access Token', '[\"*\"]', 0, '2020-12-13 04:40:55', '2020-12-13 04:40:55', '2021-12-13 10:25:55'),
('c88a9b51f77a6605121cd365217352499706e79c6ae95b4853ab5c8fb768bd868139e6967a45b709', 104, 1, 'Access Token', '[\"*\"]', 0, '2021-02-23 09:50:05', '2021-02-23 09:50:05', '2022-02-23 03:50:05'),
('c9c6cab61b0ccdad14ac7d39c20bf34362e113e077e2e3e9bf6f650081133cc972c70dd021fd595b', 12, 1, 'authToken', '[]', 0, '2020-07-27 10:50:09', '2020-07-27 10:50:09', '2021-07-27 16:35:09'),
('cb920ba876b1be1c08b91072538057b75ae82143c347813a405d862cf9d777efb2838fdea42bb5bf', 93, 1, 'Access Token', '[\"*\"]', 0, '2021-02-23 21:02:37', '2021-02-23 21:02:37', '2022-02-23 15:02:37'),
('ccfe5ca1a2f641ee8252d34934f9fb376defb5a8290504cbc19fc293fa6c42ae9064cd5703d653b2', 15, 1, 'authToken', '[]', 0, '2020-07-27 11:08:20', '2020-07-27 11:08:20', '2021-07-27 16:53:20'),
('cfda9b924a6be5d895cf93593d34409c9a70516ab0e8a01f1a158713687060e91dbf86226c02008c', 54, 1, 'Access Token', '[\"*\"]', 0, '2020-08-16 01:35:24', '2020-08-16 01:35:24', '2021-08-16 07:20:24'),
('d0c522cf7605a7154b9ed13c7ae2625331b0b2f02f876d37d43ff69b5b6b3388fad68bee927e84d2', 71, 1, 'authToken', '[]', 0, '2020-12-21 11:20:46', '2020-12-21 11:20:46', '2021-12-21 05:20:46'),
('d59a292b07b80e1be54d8fe6876e44e6279b1db020c24221ba006e5930c15255a87fdf5b2a3c4dc0', 70, 1, 'Access Token', '[\"*\"]', 0, '2020-12-13 04:39:11', '2020-12-13 04:39:11', '2021-12-13 10:24:11'),
('d710acae7fc90fd278f1f2b7fd31476bfe2b1334d76e70940711f1ca05200003270274363cd4281a', 93, 1, 'Access Token', '[\"*\"]', 0, '2021-01-21 02:34:31', '2021-01-21 02:34:31', '2022-01-21 08:19:31'),
('d754e69fce0f059edba3f6593b6ac50f85a07392ffd12fec1fe9319d3efa52c2e3ef18bfae7534e2', 20, 1, 'authToken', '[]', 0, '2020-07-27 11:12:10', '2020-07-27 11:12:10', '2021-07-27 16:57:10'),
('dde6a695ebef76443209ae167a2a7fb40710d7243211babe614d2299fcbdc79274d1318295ecd274', 23, 1, 'authToken', '[]', 0, '2020-07-27 11:26:00', '2020-07-27 11:26:00', '2021-07-27 17:11:00'),
('def5029986a9929a28f4ed10a7b1d674dade3a3a0a916ff7e31e87035945eb66a0b00918704c4534', 70, 1, 'Access Token', '[\"*\"]', 0, '2020-12-13 04:39:48', '2020-12-13 04:39:48', '2021-12-13 10:24:48'),
('e188221e27d32abcef498fd1487d2cf3c65a62b586a0e4c632ee1a0e5a5f1d2ea093ca482ea03358', 60, 1, 'authToken', '[]', 0, '2020-09-21 16:30:00', '2020-09-21 16:30:00', '2021-09-21 11:30:00'),
('e2f8a7c0925e609d89d4fda3cbf8af78a95a34d38618477a347b3aae3e15fccd93d9bc8ba482a072', 54, 1, 'Access Token', '[\"*\"]', 0, '2020-08-16 01:37:00', '2020-08-16 01:37:00', '2021-08-16 07:22:00'),
('e8b03d0baf7f96faed3e66c48da0bbded8ad3961d080776e4e393aa4221e7885cb3191b1fb60cec0', 70, 1, 'Access Token', '[\"*\"]', 0, '2020-12-13 04:40:05', '2020-12-13 04:40:05', '2021-12-13 10:25:05'),
('f33313882b399f5f4e9d24f93756b33e25e83244203d884169d8e10aebd70ca789e15908f67fa89b', 18, 1, 'authToken', '[]', 0, '2020-07-27 11:10:33', '2020-07-27 11:10:33', '2021-07-27 16:55:33'),
('f4e403257aa446129dd41a6ebcfabad671ab6fddf2a03835782b77b02bb0bf80cd0298e94123bfab', 59, 1, 'authToken', '[]', 0, '2020-09-20 09:36:14', '2020-09-20 09:36:14', '2021-09-20 04:36:14'),
('fa74a19245cdc67bae15514c22ed30a3a7a670973112526ad3c5b8bf0642f42d3b7bf01ea17f8687', 25, 1, 'authToken', '[]', 0, '2020-07-27 11:27:57', '2020-07-27 11:27:57', '2021-07-27 17:12:57'),
('ff30e31bf86de296397f6a0d2b9a0cff4f73411ab9809a508cac2ccde3e8170df50756f9e68c47f8', 135, 1, 'authToken', '[]', 0, '2021-05-24 11:53:45', '2021-05-24 11:53:45', '2022-05-24 06:53:45');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', '9E1xkxRDJNeph5inwIYiymLcCDPU1oYosIvFlZro', NULL, 'http://localhost', 1, 0, 0, '2020-07-26 05:18:08', '2020-07-26 05:18:08'),
(2, NULL, 'Laravel Password Grant Client', 'fcTyLdoKG8U2inugghWRFSUqBud1WEW2ih1xxbAp', 'users', 'http://localhost', 0, 1, 0, '2020-07-26 05:18:08', '2020-07-26 05:18:08');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-07-26 05:18:08', '2020-07-26 05:18:08');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `office_pest_controls`
--

CREATE TABLE `office_pest_controls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pest_control_treatment_type_id` bigint(20) UNSIGNED NOT NULL,
  `home_size1` decimal(9,2) NOT NULL,
  `home_size2` decimal(9,2) NOT NULL,
  `home_size3` decimal(9,2) NOT NULL,
  `home_size4` decimal(9,2) NOT NULL,
  `other` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `office_pest_controls`
--

INSERT INTO `office_pest_controls` (`id`, `pest_control_treatment_type_id`, `home_size1`, `home_size2`, `home_size3`, `home_size4`, `other`, `created_at`, `updated_at`) VALUES
(1, 1, '350.00', '450.00', '550.00', '650.00', 'Quotation', NULL, NULL),
(2, 2, '250.00', '350.00', '450.00', '550.00', 'Quotation', NULL, NULL),
(3, 3, '250.00', '350.00', '450.00', '550.00', 'Quotation', NULL, NULL),
(4, 4, '350.00', '450.00', '550.00', '650.00', 'Quotation', NULL, NULL),
(5, 5, '0.00', '0.00', '0.00', '0.00', 'Quotation', NULL, NULL),
(6, 6, '0.00', '0.00', '0.00', '0.00', 'Quotation', NULL, NULL),
(7, 7, '250.00', '350.00', '450.00', '550.00', 'Quotation', NULL, NULL),
(8, 8, '0.00', '0.00', '0.00', '0.00', 'Quotation', NULL, NULL),
(9, 10, '250.00', '350.00', '450.00', '550.00', 'Quotation', NULL, NULL),
(10, 12, '0.00', '0.00', '0.00', '0.00', 'Quotation', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `provider_id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `suggest_vendor` tinyint(1) DEFAULT 0,
  `service_done_in` enum('vendor','customer') COLLATE utf8mb4_unicode_ci DEFAULT 'customer',
  `payment_info` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `our_missions`
--

CREATE TABLE `our_missions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `our_missions`
--

INSERT INTO `our_missions` (`id`, `text`, `created_at`, `updated_at`) VALUES
(1, '<p>A Better Way To Keep Moving</p>', '2020-07-23 18:51:43', '2020-07-23 18:51:43'),
(2, '<p>Fast. Certified &amp; Felxible Solution</p>', '2020-07-23 18:52:24', '2020-07-23 18:52:24'),
(3, '<p>Reducing the time spent researching different companies and comparing their prices</p>', '2020-07-23 18:53:08', '2020-07-23 18:53:08'),
(4, '<p>Using technology to improve lives</p>', '2020-07-23 18:53:36', '2020-07-23 18:53:36'),
(5, '<p>Provide online marketplace of service</p>', '2020-07-23 18:53:52', '2020-07-23 18:53:52'),
(6, '<p>Redefining the Middle East&rsquo;s service provider industry&nbsp;</p>', '2020-07-23 18:54:05', '2020-07-23 19:10:39');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `image`, `description`, `created_at`, `updated_at`) VALUES
(3, 'About Us', 'about-us', '1597406127kendall-henderson-Pj6TgpS_Vt4-unsplash.jpg', '<p>ServiceOnUs provides a platform that allows skilled and experienced professionals to connect with users looking for specific services. All the professionals, though experienced and skilled, undergo intensive training modules before being allowed to list their services on the platform. Once on the platform, our match-making algorithm identifies professionals who are closest to the users&rsquo; requirements and available at the requested time and date.<br />\r\n</p>', '2020-08-14 06:10:27', '2021-05-31 23:04:40'),
(4, 'Privacy Policy', 'privacy-policy', NULL, '<span>\r\n                                            <div class=\"ideas\" style=\"text-align: justify\">\r\n\r\n                                <p>Our Privacy and Cookies Policy was last updated and posted on 10/31/2020. It governs the privacy terms of our website, <span style=\"color: #ff6600;\"><strong><a style=\"color: #ff6600;\">https://serviceonus.com </a></strong></span>(the \"<em>Website</em>\"), owned and operated by SERVICEONUS (<em>“we” or “our” or “Company”</em>).</p>\r\n<p>Your privacy is very important to us. Accordingly, we have developed this Policy in order for you to understand how we collect, use, communicate and disclose and make use of your personal information. We use your Personal Information only for providing and improving the Website. By using the Website, you agree to the collection and use of information in accordance with this policy. The following outlines our Privacy Policy.</p>\r\n<ul>\r\n<li>Before or at the time of collecting personal information, we will identify the purposes for which information is being collected.</li>\r\n<li>We will collect and use personal information solely with the objective of fulfilling those purposes specified by us and for other compatible purposes, unless we obtain the consent of the individual concerned or as required by law.</li>\r\n<li>We will collect personal information by lawful and fair means and, where appropriate, with the knowledge or consent of the individual concerned.</li>\r\n<li>Personal data should be relevant to the purposes for which it is to be used, and, to the extent necessary for those purposes, should be accurate, complete, and up-to-date.</li>\r\n<li>We will make readily available to customers information about our policies and practices relating to the management of personal information.<br><br></li>\r\n</ul>\r\n<ol>\r\n<li><strong>YOUR PRIVACY<br><br></strong>We follow all legal requirements to protect your privacy. Our Privacy Policy is a legal statement that explains how we may collect information from you, how we may share your information, and how you can limit our sharing of your information. We utilise the personal data you offer in a way that is consistent with this Privacy Policy. If you provide personal data for a particular reason, we could make use of the personal data in connection with the reason for which it was provided. For example, registration information sent when creating your account, might be used to suggest products to you based on past acquisitions. We might use your personal data to offer access to services on the Website and monitor your use of such services. We may also utilise your personal data and various other personally non-identifiable information gathered through the Website to assist us with improving the material and functionality of the Website, to much better comprehend our users, and to improve our services. You will see terms in our Privacy Policy that are capitalised. These terms have meanings as described in the Definitions section below.<br><br></li>\r\n<li><strong>DEFINITIONS<br><br></strong>\"<em>Non Personal Information</em>\" is information that is not personally identifiable to you and that we automatically collect when you access our Website with a web browser. It may also include publicly available information that is shared between you and others.<br><br>\"<em>Personally Identifiable Information</em>\" is non-public information that is personally identifiable to you and obtained in order for us to provide you within our Website. Personally Identifiable Information may include information such as your name, email address, and other related information that you provide to us or that we obtain about you.</li>\r\n</ol>\r\n<ol start=\"3\">\r\n<li><strong>OUR COMMITMENT<br><br></strong>We are committed to protecting your personal information, and ensuring its privacy, accuracy and security. We handle your information in a responsible manner in accordance with the Privacy laws. By using any of our services, using our website/app or giving us your information, you agree that your information being collected, stored, used and disclosed as set out in this Policy. The User is advised to read carefully this Privacy Policy before using and/or utilizing the services of Company specifically its: website, e-mail notifications, Short Message Service (“SMS”) notifications, call logs, mobile applications, social media accounts, and all of its other online services.</li>\r\n</ol>\r\n<ol start=\"4\">\r\n<li><strong>INFORMATION WE COLLECT<br><br></strong>Generally, you control the amount and type of information you provide to us when using our Website. As a User, you can browse our website to find out more about our Website.</li>\r\n</ol>\r\n\r\n\r\n\r\n                                            </div>\r\n                                        </span>\r\n\r\n', NULL, NULL),
(5, 'Terms & Conditions', 'terms-and-conditions', NULL, '<div class=\"et_pb_text_inner\">\r\n                                        <h2>1.&nbsp;Applicability</h2>\r\n                                        <p>1.1 The General Terms and Conditions below apply to all offers and transactions of SERVICEONUS. Prices are subject to change.<br>\r\n                                            1.2 By accepting an offer or making an order, the consumer expressly accepts the applicability of these General Terms and Conditions.<br>\r\n                                            1.3 Deviations from that stipulated in these Terms and Conditions are only valid when they are confirmed in writing by the management.<br>\r\n                                            1.4 All rights and entitlements stipulated for SERVICEONUS&nbsp;in these General Terms and Conditions and any further agreements will also apply for intermediaries and other third parties deployed by SERVICEONUS.</p>\r\n                                        <h2>2. Quality</h2>\r\n                                        <p>The restaurant guarantees that all the products offered meet the standards of the concept.<br>\r\n                                            If there are any complaints the management needs to be informed immediately. Appropriate actions will be taken as soon as possible.</p>\r\n                                        <h2>3. Prices/offers</h2>\r\n                                        <p>3.1 All offers made by SERVICEONUS&nbsp;are without obligation and SERVICEONUS &nbsp;expressly reserves the right to change the prices, in particular if this is necessary as a result of statutory or other regulations.<br>\r\n                                            3.1&nbsp;All prices are indicated in euros, including VAT.<br>\r\n                                            3.3 In certain cases, promotional prices apply. These prices are valid only during a specific period as long as stocks last. No entitlement to these prices may be invoked before or after the specific period.<br>\r\n                                            3.4 SERVICEONUS &nbsp;cannot be held to any price indications that are clearly incorrect, for example as a result of obvious typesetting or printing errors. No rights may be derived from incorrect price information.</p>\r\n                                        <h2>4. Cancellations</h2>\r\n                                        <p>4.1 SERVICEONUS &nbsp;is entitled to cancel or change the date of an event. Should this happen, SERVICEONUS &nbsp;will attempt to provide a suitable solution. If an event is cancelled or postponed, SERVICEONUS &nbsp;will do its utmost to inform you as soon as possible. However, SERVICEONUS cannot guarantee it is possible to inform you timely of any change or cancellation of an event or be held responsible for refunds, compensations or for any resulting costs you may incur, for example for travel, accommodation and/or any other related goods or service.<br>\r\n                                            4.2 Before confirming your reservation, always check carefully that you have reserved&nbsp;the correct (number of) persons. Wrongfully ordered (numbers of) persons&nbsp;are not refundable.<br>\r\n                                            4.3. All purchases are final. The dinner cruise tickets bought here cannot be returned for any refunds whatsoever; group bookings paid for on the website likewise cannot be cancelled by the purchaser and refunds claimed for any reason whatsoever.</p>\r\n                                        <h2>5. Payments</h2>\r\n                                        <p>5.1 All prices are including VAT.<br>\r\n                                            5.2&nbsp;Methods of payment we accept: Cash, iDeal, Mr. Cash, Maestro, Visa, Mastercard and American Express.<br>\r\n                                            5.3&nbsp;You will not receive confirmation of your definitive booking until your payment has been approved.</p>\r\n                                        <h2>6. Other provisions</h2>\r\n                                        <p>6.1 &nbsp;If one or more of the provisions in these Terms and Conditions or any other agreement with SERVICEONUS &nbsp;are in conflict with any applicable legal regulation, the provision in question will lapse and be replaced by a new comparable stipulation admissible by law to be determined by SERVICEONUS.<br>\r\n                                            6.2 &nbsp;The law of the Netherlands applies to all agreements entered into with or concluded by SERVICEONUS. Any disputes arising directly or indirectly from these agreements will be exclusively settled by the Court of Amsterdam.</p></div>', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `painting_orders`
--

CREATE TABLE `painting_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `premises_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `home_type` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_size` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paint_type1` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paint_type2` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_color` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `furnished` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ceiling_paint` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `office_size` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_of_cabin` int(11) DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_of_desk` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('naina2aryal@gmail.com', '$2y$10$71KuR2N64DzpOdFI3nlnI.uiG1sPHI9uW83awYHxznx5K/PUbsU9C', '2021-02-23 20:56:10'),
('rahulthejaisi@gmail.com', '$2y$10$mqf/47h/DDoQVi6/Bm0LH.YKXMBFixXzOkKzV4L7ysr4hAMkn3ePK', '2021-02-24 01:09:01');

-- --------------------------------------------------------

--
-- Table structure for table `pest_control_orders`
--

CREATE TABLE `pest_control_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `premises_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `home_type` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_size` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `treatment_for` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `time` time NOT NULL,
  `date` datetime NOT NULL,
  `office_size` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_of_cabin` int(11) DEFAULT NULL,
  `number_of_desk` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pest_control_treatment_types`
--

CREATE TABLE `pest_control_treatment_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pest_control_treatment_types`
--

INSERT INTO `pest_control_treatment_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Bed Bugs', NULL, NULL),
(2, 'Flies', NULL, NULL),
(3, 'Bees', NULL, NULL),
(4, 'Cockroaches', NULL, NULL),
(5, 'Snake Control', NULL, NULL),
(6, 'Termites', NULL, NULL),
(7, 'Ants', NULL, NULL),
(8, 'Rodents', NULL, NULL),
(9, 'Rats', NULL, NULL),
(10, 'Mosquitoes', NULL, NULL),
(11, 'Ticks', NULL, NULL),
(12, 'Birds Control', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `radio_fields`
--

CREATE TABLE `radio_fields` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `label_for_form` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label_for_invoice` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `radio_fields`
--

INSERT INTO `radio_fields` (`id`, `service_id`, `label_for_form`, `label_for_invoice`, `created_at`, `updated_at`) VALUES
(5, 60, 'Where do you service require ?', 'Place for Service', '2021-01-28 23:41:39', '2021-01-28 23:41:39'),
(6, 60, 'Radio Without Charge', 'Radio Field', '2021-01-28 23:47:15', '2021-01-28 23:47:15'),
(7, 63, 'What is your gender', 'Gender', '2021-03-17 01:00:17', '2021-03-17 01:00:17'),
(8, 65, 'What is your flat size ?', 'Flat size', '2021-03-31 03:56:41', '2021-03-31 03:56:41'),
(10, 68, 'Your Home Type', 'Home Type', '2021-04-03 13:35:45', '2021-04-03 13:35:45'),
(11, 68, 'How long time need for the cleaning  ?', 'Time need for the cleaning', '2021-04-03 13:42:56', '2021-04-03 13:42:56'),
(12, 68, 'How many cleaner do you need ?', 'Number of cleaner', '2021-04-03 13:44:26', '2021-04-03 13:44:26'),
(13, 68, 'Do you need cleaning Materials ?', 'Need Clening Material', '2021-04-03 13:45:02', '2021-04-03 13:45:02'),
(14, 69, 'How long time need for the cleaning', 'Time need for the cleaning', '2021-04-03 13:56:12', '2021-04-03 13:56:12'),
(15, 69, 'How many cleaner do you need ?', 'Number of cleaner required', '2021-04-03 13:57:35', '2021-04-03 13:57:35'),
(19, 80, 'What type of AC do you have ?', 'Type of AC', '2021-04-28 04:23:39', '2021-04-28 04:23:39'),
(20, 81, 'What service do you require?', 'Service Require', '2021-04-28 04:43:53', '2021-04-28 04:43:53'),
(21, 82, 'What is your Requirment ?', 'Requirement', '2021-04-28 23:50:31', '2021-04-28 23:50:31'),
(22, 82, 'What\'s your food & drinks budget per guest?', 'Budget per guest', '2021-04-29 00:15:44', '2021-04-29 00:15:44'),
(23, 83, 'Please describe the mattresses you want cleaned  & Quantity', 'Mattress Description', '2021-04-29 01:09:03', '2021-04-29 01:09:03'),
(24, 83, 'Cleaning Method', 'Cleaning Method', '2021-04-29 01:09:37', '2021-04-29 01:09:37'),
(25, 88, 'What type of AC do you have?', 'Type of AC', '2021-05-01 10:52:16', '2021-05-01 10:52:16'),
(26, 88, 'What type of AC cleaning do you want?', 'Type of  AC cleaning', '2021-05-01 10:54:14', '2021-05-01 10:54:14'),
(28, 46, 'Primices Type', 'Primices Type', '2021-05-02 01:18:01', '2021-05-02 01:18:01'),
(29, 46, 'Plumbing Services', 'Plumbing Services', '2021-05-02 01:22:15', '2021-05-02 01:22:15'),
(30, 89, 'Primices Type', 'Primices Type', '2021-05-02 01:47:56', '2021-05-02 01:47:56'),
(31, 89, 'Carpentry Services', 'Carpentry Services', '2021-05-02 01:54:56', '2021-05-02 01:54:56'),
(32, 92, 'What is your Requirment ?', 'Requirement', '2021-05-02 02:50:42', '2021-05-02 02:50:42'),
(33, 92, 'What type of photography service are you looking for?', 'Type of photography required', '2021-05-02 02:53:30', '2021-05-02 02:53:30'),
(34, 92, 'How long the event will take place ?', 'How long for photography required', '2021-05-02 02:55:45', '2021-05-02 02:55:45'),
(35, 92, 'Where do you need the service?', 'Place where service required', '2021-05-02 02:58:58', '2021-05-02 02:58:58'),
(36, 91, 'Select Size', 'Size', '2021-05-26 00:29:20', '2021-05-26 00:29:20'),
(37, 91, 'Select Printing Details', 'Select Printing Details', '2021-05-26 00:41:26', '2021-05-26 00:41:26'),
(38, 91, 'Select Required Quantity', 'Quantity', '2021-05-26 00:43:00', '2021-05-26 00:43:00'),
(39, 98, 'Vehicle Color', 'Vehicle Color', '2021-05-26 05:48:03', '2021-05-26 05:48:03');

-- --------------------------------------------------------

--
-- Table structure for table `radio_field_with_charges`
--

CREATE TABLE `radio_field_with_charges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `label_for_form` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label_for_invoice` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `radio_field_with_charges`
--

INSERT INTO `radio_field_with_charges` (`id`, `service_id`, `label_for_form`, `label_for_invoice`, `created_at`, `updated_at`) VALUES
(6, 57, 'Couple Message', 'Couple Message', '2021-01-26 00:00:54', '2021-01-26 00:00:54'),
(7, 57, 'THERAPEUTIC MASSAGES', 'THERAPEUTIC MASSAGES', '2021-01-26 00:03:26', '2021-01-26 00:03:26'),
(9, 54, 'Types Of Hair Cuts', 'Types Of Hair Cuts', '2021-01-26 00:24:54', '2021-01-26 00:24:54'),
(13, 60, 'Does another service required ?', 'Other service', '2021-01-28 23:41:39', '2021-01-28 23:41:39'),
(14, 60, 'Radio With Charge Applied', 'Radio With Charge', '2021-01-28 23:47:15', '2021-01-28 23:47:15'),
(15, 61, 'Print Business Card', 'Business Card', '2021-02-14 15:43:22', '2021-02-14 15:43:22'),
(16, 63, 'No of rooms in flat', 'Flat No', '2021-03-17 01:00:17', '2021-03-17 01:00:17'),
(17, 68, 'Home Size', 'Home Size', '2021-04-03 13:40:32', '2021-04-03 13:40:32');

-- --------------------------------------------------------

--
-- Table structure for table `radio_options`
--

CREATE TABLE `radio_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `radio_field_id` bigint(20) UNSIGNED NOT NULL,
  `option` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `radio_options`
--

INSERT INTO `radio_options` (`id`, `radio_field_id`, `option`, `created_at`, `updated_at`) VALUES
(11, 5, 'Customer/Your  Place', '2021-01-28 23:41:39', '2021-01-28 23:41:39'),
(12, 5, 'Vendor Place', '2021-01-28 23:41:39', '2021-01-28 23:41:39'),
(13, 6, 'Radio Option 1', '2021-01-28 23:47:15', '2021-01-28 23:47:15'),
(14, 6, 'Radio Option 2', '2021-01-28 23:47:15', '2021-01-28 23:47:15'),
(15, 7, 'Male', '2021-03-17 01:00:17', '2021-03-17 01:00:17'),
(16, 7, 'Female', '2021-03-17 01:00:17', '2021-03-17 01:00:17'),
(17, 8, '2BHK', '2021-03-31 03:56:41', '2021-03-31 03:56:41'),
(18, 8, '3BHK', '2021-03-31 03:56:41', '2021-03-31 03:56:41'),
(19, 8, '4BHK', '2021-03-31 03:56:41', '2021-03-31 03:56:41'),
(22, 10, 'Apartment', '2021-04-03 13:35:45', '2021-04-03 13:35:45'),
(23, 10, 'Villa', '2021-04-03 13:35:45', '2021-04-03 13:35:45'),
(24, 11, '1 Hour', '2021-04-03 13:42:56', '2021-04-03 13:42:56'),
(25, 11, '2 Hour', '2021-04-03 13:42:56', '2021-04-03 13:42:56'),
(26, 11, '4 Hour', '2021-04-03 13:42:56', '2021-04-03 13:42:56'),
(27, 11, '8 Hour', '2021-04-03 13:42:56', '2021-04-03 13:42:56'),
(28, 12, '1 Cleaner', '2021-04-03 13:44:26', '2021-04-03 13:44:26'),
(29, 12, '2 Cleaner', '2021-04-03 13:44:26', '2021-04-03 13:44:26'),
(30, 12, '3 Cleaner', '2021-04-03 13:44:26', '2021-04-03 13:44:26'),
(31, 12, '4 Cleaner', '2021-04-03 13:44:26', '2021-04-03 13:44:26'),
(32, 13, 'Yes', '2021-04-03 13:45:02', '2021-04-03 13:45:02'),
(33, 13, 'No', '2021-04-03 13:45:02', '2021-04-03 13:45:02'),
(34, 14, '1 Hour', '2021-04-03 13:56:12', '2021-04-03 13:56:12'),
(35, 14, '2 Hour', '2021-04-03 13:56:12', '2021-04-03 13:56:12'),
(36, 14, '4 Hour', '2021-04-03 13:56:12', '2021-04-03 13:56:12'),
(37, 14, '8 Hour', '2021-04-03 13:56:12', '2021-04-03 13:56:12'),
(38, 15, '1 Cleaner', '2021-04-03 13:57:35', '2021-04-03 13:57:35'),
(39, 15, '2 Cleaner', '2021-04-03 13:57:35', '2021-04-03 13:57:35'),
(40, 15, '3 Cleaner', '2021-04-03 13:57:35', '2021-04-03 13:57:35'),
(41, 15, '4 Cleaner', '2021-04-03 13:57:35', '2021-04-03 13:57:35'),
(52, 19, 'Window AC', '2021-04-28 04:23:39', '2021-04-28 04:23:39'),
(53, 19, 'Split AC', '2021-04-28 04:23:39', '2021-04-28 04:23:39'),
(54, 19, 'Central AC', '2021-04-28 04:23:39', '2021-04-28 04:23:39'),
(55, 20, 'LED Lighting', '2021-04-28 04:43:53', '2021-04-28 04:43:53'),
(56, 20, 'CCTV Installation', '2021-04-28 04:43:53', '2021-04-28 04:43:53'),
(57, 20, 'Light Control System', '2021-04-28 04:43:53', '2021-04-28 04:43:53'),
(58, 20, 'Fuse boxes replacement', '2021-04-28 04:43:53', '2021-04-28 04:43:53'),
(59, 20, 'Hanging lights & lamps', '2021-04-28 04:43:53', '2021-04-28 04:43:53'),
(60, 20, 'Outdoor and garden lights', '2021-04-28 04:43:53', '2021-04-28 04:43:53'),
(61, 20, 'Fire & Intruder Alarms & Testing', '2021-04-28 04:43:53', '2021-04-28 04:43:53'),
(62, 20, 'Doorbell installationn and repair', '2021-04-28 04:43:53', '2021-04-28 04:43:53'),
(63, 20, 'Light fixture repair & replacement', '2021-04-28 04:43:53', '2021-04-28 04:43:53'),
(64, 20, 'General electical installations and rewiring', '2021-04-28 04:43:53', '2021-04-28 04:43:53'),
(65, 20, 'Dimmer switches and modules replacement', '2021-04-28 04:43:53', '2021-04-28 04:43:53'),
(66, 20, 'Switches, sockets and transformers instalation', '2021-04-28 04:43:53', '2021-04-28 04:43:53'),
(67, 21, 'Event Planner', '2021-04-28 23:50:31', '2021-04-28 23:50:31'),
(68, 21, 'Catering', '2021-04-28 23:50:31', '2021-04-28 23:50:31'),
(69, 21, 'Both', '2021-04-28 23:50:31', '2021-04-28 23:50:31'),
(70, 22, 'up to AED 100 per guest', '2021-04-29 00:15:44', '2021-04-29 00:15:44'),
(71, 22, 'up to AED 150 per guest', '2021-04-29 00:15:44', '2021-04-29 00:15:44'),
(72, 22, 'up to AED 200 per guest', '2021-04-29 00:15:44', '2021-04-29 00:15:44'),
(73, 22, 'up to AED 250 per guest', '2021-04-29 00:15:44', '2021-04-29 00:15:44'),
(74, 22, 'up to AED 300 per guest', '2021-04-29 00:15:44', '2021-04-29 00:15:44'),
(75, 22, 'Above Aed 350', '2021-04-29 00:15:44', '2021-04-29 00:15:44'),
(76, 23, 'Single Size', '2021-04-29 01:09:03', '2021-04-29 01:09:03'),
(77, 23, 'Queen Size', '2021-04-29 01:09:03', '2021-04-29 01:09:03'),
(78, 23, 'King Size', '2021-04-29 01:09:03', '2021-04-29 01:09:03'),
(79, 23, 'Pillow/ Cushions', '2021-04-29 01:09:03', '2021-04-29 01:09:03'),
(80, 24, 'Steam Cleaning', '2021-04-29 01:09:37', '2021-04-29 01:09:37'),
(81, 24, 'Shampoo Cleaning', '2021-04-29 01:09:37', '2021-04-29 01:09:37'),
(82, 25, 'Window AC', '2021-05-01 10:52:16', '2021-05-01 10:52:16'),
(83, 25, 'Split AC', '2021-05-01 10:52:16', '2021-05-01 10:52:16'),
(84, 25, 'Central AC', '2021-05-01 10:52:16', '2021-05-01 10:52:16'),
(85, 26, 'Regular AC cleaning', '2021-05-01 10:54:14', '2021-05-01 10:54:14'),
(86, 26, 'AC Duct Cleaning and Sanitization', '2021-05-01 10:54:14', '2021-05-01 10:54:14'),
(87, 26, 'AC Deep Coil Cleaning', '2021-05-01 10:54:14', '2021-05-01 10:54:14'),
(90, 28, 'Residential', '2021-05-02 01:18:01', '2021-05-02 01:18:01'),
(91, 28, 'Commercial', '2021-05-02 01:18:01', '2021-05-02 01:18:01'),
(92, 29, 'Water Leak', '2021-05-02 01:22:15', '2021-05-02 01:22:15'),
(93, 29, 'Water Heater', '2021-05-02 01:22:15', '2021-05-02 01:22:15'),
(94, 29, 'Leaking Sink', '2021-05-02 01:22:15', '2021-05-02 01:22:15'),
(95, 29, 'Leaking Bathtub', '2021-05-02 01:22:15', '2021-05-02 01:22:15'),
(96, 29, 'Water drain blockeg solution', '2021-05-02 01:22:15', '2021-05-02 01:22:15'),
(97, 29, 'Overflows', '2021-05-02 01:22:15', '2021-05-02 01:22:15'),
(98, 29, 'Sump Pump', '2021-05-02 01:22:15', '2021-05-02 01:22:15'),
(99, 29, 'Drainage Line', '2021-05-02 01:22:15', '2021-05-02 01:22:15'),
(100, 29, 'Water Pressure Tank', '2021-05-02 01:22:15', '2021-05-02 01:22:15'),
(101, 29, 'Burst pipes repair & replacement', '2021-05-02 01:22:15', '2021-05-02 01:22:15'),
(102, 30, 'Residential', '2021-05-02 01:47:56', '2021-05-02 01:47:56'),
(103, 30, 'Commercial', '2021-05-02 01:47:56', '2021-05-02 01:47:56'),
(104, 31, 'Gypsum Repair', '2021-05-02 01:54:56', '2021-05-02 01:54:56'),
(105, 31, 'Ceiling Repair', '2021-05-02 01:54:56', '2021-05-02 01:54:56'),
(106, 31, 'Install Carpet tile', '2021-05-02 01:54:56', '2021-05-02 01:54:56'),
(107, 31, 'Cabinets & Shelf works', '2021-05-02 01:54:56', '2021-05-02 01:54:56'),
(108, 31, 'Install flooring', '2021-05-02 01:54:56', '2021-05-02 01:54:56'),
(109, 31, 'Minor Wall Partition', '2021-05-02 01:54:56', '2021-05-02 01:54:56'),
(110, 31, 'Furniture Repair', '2021-05-02 01:54:56', '2021-05-02 01:54:56'),
(111, 31, 'Door Repair', '2021-05-02 01:54:56', '2021-05-02 01:54:56'),
(112, 31, 'Kitchen Cupboards', '2021-05-02 01:54:56', '2021-05-02 01:54:56'),
(113, 31, 'Fencing', '2021-05-02 01:54:56', '2021-05-02 01:54:56'),
(114, 31, 'Assemble furniture', '2021-05-02 01:54:56', '2021-05-02 01:54:56'),
(115, 32, 'Only photography', '2021-05-02 02:50:42', '2021-05-02 02:50:42'),
(116, 32, 'VideoGraphy', '2021-05-02 02:50:42', '2021-05-02 02:50:42'),
(117, 32, 'Both', '2021-05-02 02:50:42', '2021-05-02 02:50:42'),
(118, 33, 'Wedding photography', '2021-05-02 02:53:30', '2021-05-02 02:53:30'),
(119, 33, 'New born & children photography', '2021-05-02 02:53:30', '2021-05-02 02:53:30'),
(120, 33, 'Commercial photography', '2021-05-02 02:53:30', '2021-05-02 02:53:30'),
(121, 33, 'Event photography', '2021-05-02 02:53:30', '2021-05-02 02:53:30'),
(122, 33, 'Maternity portraits', '2021-05-02 02:53:30', '2021-05-02 02:53:30'),
(123, 33, 'Portrait photography', '2021-05-02 02:53:30', '2021-05-02 02:53:30'),
(124, 33, 'Professional headshots', '2021-05-02 02:53:30', '2021-05-02 02:53:30'),
(125, 33, 'Other photography', '2021-05-02 02:53:30', '2021-05-02 02:53:30'),
(126, 34, '1 Hour', '2021-05-02 02:55:45', '2021-05-02 02:55:45'),
(127, 34, '2 Hour', '2021-05-02 02:55:45', '2021-05-02 02:55:45'),
(128, 34, '3 Hour', '2021-05-02 02:55:45', '2021-05-02 02:55:45'),
(129, 34, '4 Hour', '2021-05-02 02:55:45', '2021-05-02 02:55:45'),
(130, 34, '5  Hour', '2021-05-02 02:55:45', '2021-05-02 02:55:45'),
(131, 34, 'More than 5 Hours', '2021-05-02 02:55:45', '2021-05-02 02:55:45'),
(132, 35, 'Dubai', '2021-05-02 02:58:58', '2021-05-02 02:58:58'),
(133, 35, 'Sharjah', '2021-05-02 02:58:58', '2021-05-02 02:58:58'),
(134, 35, 'Ajman', '2021-05-02 02:58:58', '2021-05-02 02:58:58'),
(135, 35, 'Umm Al Quwain', '2021-05-02 02:58:58', '2021-05-02 02:58:58'),
(136, 35, 'Ras Al Khaimah', '2021-05-02 02:58:58', '2021-05-02 02:58:58'),
(137, 35, 'Fujairah', '2021-05-02 02:58:58', '2021-05-02 02:58:58'),
(138, 35, 'Abu Dhabi', '2021-05-02 02:58:58', '2021-05-02 02:58:58'),
(139, 36, 'Custom Size', '2021-05-26 00:29:20', '2021-05-26 00:29:20'),
(140, 36, '21 x 29.7cm (A4)', '2021-05-26 00:29:20', '2021-05-26 00:29:20'),
(141, 36, '14.8 X 21cm (A5)', '2021-05-26 00:29:20', '2021-05-26 00:29:20'),
(142, 37, '1 Side', '2021-05-26 00:41:26', '2021-05-26 00:41:26'),
(143, 37, 'Both Side', '2021-05-26 00:41:26', '2021-05-26 00:41:26'),
(144, 38, '500', '2021-05-26 00:43:00', '2021-05-26 00:43:00'),
(145, 38, '1000', '2021-05-26 00:43:00', '2021-05-26 00:43:00'),
(146, 38, '2000', '2021-05-26 00:43:00', '2021-05-26 00:43:00'),
(147, 38, 'More', '2021-05-26 00:43:00', '2021-05-26 00:43:00'),
(148, 39, 'White', '2021-05-26 05:48:03', '2021-05-26 05:48:03'),
(149, 39, 'Black', '2021-05-26 05:48:03', '2021-05-26 05:48:03'),
(150, 39, 'Silver', '2021-05-26 05:48:04', '2021-05-26 05:48:04'),
(151, 39, 'Other', '2021-05-26 05:48:04', '2021-05-26 05:48:04');

-- --------------------------------------------------------

--
-- Table structure for table `radio_option_with_charges`
--

CREATE TABLE `radio_option_with_charges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `radio_field_with_charge_id` bigint(20) UNSIGNED NOT NULL,
  `option` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `charge` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `radio_option_with_charges`
--

INSERT INTO `radio_option_with_charges` (`id`, `radio_field_with_charge_id`, `option`, `charge`, `created_at`, `updated_at`) VALUES
(11, 6, 'Couples Aromatherapy (60 Mins)', '600', '2021-01-26 00:00:54', '2021-01-26 00:00:54'),
(12, 6, 'Couples Swedish Massage (60 mins)', '550', '2021-01-26 00:00:54', '2021-01-26 00:00:54'),
(13, 6, 'Couples Thai Massage (60 Mins)', '500', '2021-01-26 00:00:54', '2021-01-26 00:00:54'),
(14, 7, 'Aromatherapy', '300', '2021-01-26 00:03:26', '2021-01-26 00:03:26'),
(15, 7, 'Aromatherapy (90 mins)', '424', '2021-01-26 00:03:26', '2021-01-26 00:03:26'),
(16, 7, 'Chair Massage', '115', '2021-01-26 00:03:27', '2021-01-26 00:03:27'),
(17, 7, 'Deep Tissue Massage', '325', '2021-01-26 00:03:27', '2021-01-26 00:03:27'),
(18, 7, 'Deep Tissue Massage (90 Mins)', '400', '2021-01-26 00:03:27', '2021-01-26 00:03:27'),
(19, 7, 'Swedish Massage (90 Mins)', '300', '2021-01-26 00:03:27', '2021-01-26 00:03:27'),
(23, 9, 'Baby Cut', '80', '2021-01-26 00:24:54', '2021-01-26 00:24:54'),
(24, 9, 'Fringe Cut', '40', '2021-01-26 00:24:54', '2021-01-26 00:24:54'),
(25, 9, 'Hair Cut With Blow Dry', '310', '2021-01-26 00:24:54', '2021-01-26 00:24:54'),
(26, 9, 'Hair Trim', '130', '2021-01-26 00:24:54', '2021-01-26 00:24:54'),
(27, 9, 'Reshape Hair Cut', '150', '2021-01-26 00:24:54', '2021-01-26 00:24:54'),
(28, 9, 'Hair Cut', '180', '2021-01-26 00:24:54', '2021-01-26 00:24:54'),
(41, 13, 'Fixing Light', '100', '2021-01-28 23:41:39', '2021-01-28 23:41:39'),
(42, 13, 'Fixing Ceiling', '200', '2021-01-28 23:41:39', '2021-01-28 23:41:39'),
(43, 14, 'Option 1', '100', '2021-01-28 23:47:15', '2021-01-28 23:47:15'),
(44, 14, 'Option 2', '200', '2021-01-28 23:47:15', '2021-01-28 23:47:15'),
(45, 15, '500 Pcs', '49', '2021-02-14 15:43:22', '2021-02-14 15:43:22'),
(46, 16, '2 Bedroom Flat', '40', '2021-03-17 01:00:17', '2021-03-17 01:00:17'),
(47, 16, '3 Bedroom Flat', '60', NULL, NULL),
(48, 16, '4 Bedroom Flat', '80', NULL, NULL),
(49, 17, 'Studio', '0', '2021-04-03 13:40:32', '2021-04-03 13:40:32'),
(50, 17, '1 BHK', '0', '2021-04-03 13:40:32', '2021-04-03 13:40:32'),
(51, 17, '2 BHK', '0', '2021-04-03 13:40:32', '2021-04-03 13:40:32'),
(52, 17, '3 BHK', '0', '2021-04-03 13:40:32', '2021-04-03 13:40:32'),
(53, 17, '4 BHK', '0', '2021-04-03 13:40:32', '2021-04-03 13:40:32'),
(54, 17, '5 BHK', '0', '2021-04-03 13:40:32', '2021-04-03 13:40:32');

-- --------------------------------------------------------

--
-- Table structure for table `radio_values`
--

CREATE TABLE `radio_values` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `field_id` bigint(20) UNSIGNED NOT NULL,
  `option_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `radio_with_charge_values`
--

CREATE TABLE `radio_with_charge_values` (
  `id` bigint(20) NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `field_id` bigint(20) UNSIGNED NOT NULL,
  `option_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `refers`
--

CREATE TABLE `refers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `refer_by_user` bigint(20) UNSIGNED NOT NULL,
  `refercode` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `used_by_user` bigint(20) UNSIGNED NOT NULL,
  `used` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `residential_pest_controls`
--

CREATE TABLE `residential_pest_controls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `home_type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pest_control_treatment_type_id` bigint(20) UNSIGNED NOT NULL,
  `studio` decimal(9,2) NOT NULL,
  `bhk1` decimal(9,2) NOT NULL,
  `bhk2` decimal(9,2) NOT NULL,
  `bhk3` decimal(9,2) NOT NULL,
  `bhk4` decimal(9,2) NOT NULL,
  `bhk5` decimal(9,2) NOT NULL,
  `other` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `residential_pest_controls`
--

INSERT INTO `residential_pest_controls` (`id`, `home_type`, `pest_control_treatment_type_id`, `studio`, `bhk1`, `bhk2`, `bhk3`, `bhk4`, `bhk5`, `other`, `created_at`, `updated_at`) VALUES
(1, 'Apartment', 1, '200.00', '250.00', '300.00', '400.00', '450.00', '500.00', 'Quatation', NULL, '2021-06-06 18:02:52'),
(2, 'Apartment', 2, '150.00', '200.00', '250.00', '300.00', '350.00', '400.00', 'Quatation', NULL, NULL),
(3, 'Apartment', 3, '150.00', '230.00', '250.00', '300.00', '350.00', '400.00', 'Quatation', NULL, NULL),
(4, 'Apartment', 4, '150.00', '200.00', '250.00', '350.00', '400.00', '450.00', 'Quatation', NULL, NULL),
(5, 'Apartment', 5, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 'Quatation', NULL, NULL),
(6, 'Apartment', 6, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 'Quatation', NULL, NULL),
(7, 'Apartment', 7, '150.00', '200.00', '250.00', '300.00', '350.00', '400.00', 'Quatation', NULL, NULL),
(8, 'Apartment', 8, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 'Quatation', NULL, NULL),
(9, 'Apartment', 10, '500.00', '600.00', '700.00', '800.00', '900.00', '1000.00', 'Quatation', NULL, NULL),
(10, 'Apartment', 12, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 'Quatation', NULL, NULL),
(11, 'Villa', 1, '500.00', '500.00', '500.00', '650.00', '750.00', '850.00', 'Quatation', NULL, '2021-06-06 18:12:26'),
(12, 'Villa', 2, '500.00', '500.00', '500.00', '600.00', '700.00', '800.00', 'Quatation', NULL, NULL),
(13, 'Villa', 3, '350.00', '350.00', '350.00', '450.00', '550.00', '650.00', 'Quatation', NULL, NULL),
(14, 'Villa', 4, '300.00', '300.00', '300.00', '400.00', '500.00', '600.00', 'Quatation', NULL, NULL),
(15, 'Villa', 5, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 'Quatation', NULL, NULL),
(16, 'Villa', 6, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 'Quatation', NULL, NULL),
(17, 'Villa', 7, '300.00', '300.00', '300.00', '350.00', '400.00', '450.00', 'Quatation', NULL, NULL),
(18, 'Villa', 8, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 'Quatation', NULL, NULL),
(19, 'Villa', 10, '900.00', '900.00', '900.00', '1000.00', '1100.00', '1200.00', 'Quatation', NULL, NULL),
(20, 'Villa', 12, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 'Quatation', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sanitization_orders`
--

CREATE TABLE `sanitization_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `premises_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `home_type` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_size` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `office_size` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_of_cabin` int(11) DEFAULT NULL,
  `number_of_desk` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `select_fields`
--

CREATE TABLE `select_fields` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `label_for_form` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label_for_invoice` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `select_fields`
--

INSERT INTO `select_fields` (`id`, `service_id`, `label_for_form`, `label_for_invoice`, `created_at`, `updated_at`) VALUES
(8, 60, 'Is your home in dubai  (s-no-p)?', 'Is home in Dubai', '2021-01-28 23:41:39', '2021-01-28 23:41:39'),
(9, 63, 'Do you like ice cream ?', 'Like Ice cream', '2021-03-17 01:00:17', '2021-03-17 01:00:17'),
(10, 65, 'Do you require any of these ?', 'Other requirement', '2021-03-31 03:56:41', '2021-03-31 03:56:41'),
(12, 69, 'Do you need cleaning Materials ?', 'Need Cleaning Materials', '2021-04-03 13:59:03', '2021-04-03 13:59:03'),
(13, 45, 'Fabric of Sofa', 'Fabric of Sofa', '2021-04-03 14:22:20', '2021-04-03 14:22:20'),
(14, 45, 'Cleaning Method', 'Cleaning Method', '2021-04-03 14:23:01', '2021-04-03 14:23:01'),
(15, 45, 'Do you need cleaning Materials ?', 'Need Cleaning Materials', '2021-04-03 14:23:23', '2021-04-03 14:23:23'),
(22, 81, 'What is your premises type?', 'Premises Type', '2021-04-28 04:39:57', '2021-04-28 04:39:57'),
(23, 82, 'Please select the occasion you require catering for ?', 'Occasion', '2021-04-29 00:28:30', '2021-04-29 00:28:30'),
(24, 91, 'Select Paper Type', 'Paper Type', '2021-05-26 00:34:09', '2021-05-26 00:34:09'),
(25, 91, 'Select Paper', 'Select Paper', '2021-05-26 00:35:24', '2021-05-26 00:35:24'),
(26, 91, 'Select Colors:', 'Select Color', '2021-05-26 00:36:49', '2021-05-26 00:36:49'),
(27, 93, 'Select Required Service', 'Service Required', '2021-05-26 01:35:49', '2021-05-26 01:35:49'),
(28, 93, 'Select Car Make:', 'Car Make', '2021-05-26 02:06:56', '2021-05-26 02:06:56'),
(29, 93, 'Select Transmission', 'Select Transmission:', '2021-05-26 02:09:59', '2021-05-26 02:09:59'),
(30, 93, 'Select Body Type', 'Body Type', '2021-05-26 02:13:36', '2021-05-26 02:13:36'),
(31, 93, 'Specs', 'Specs', '2021-05-26 02:15:41', '2021-05-26 02:15:41'),
(32, 94, 'Select Required Service', 'Required Service', '2021-05-26 02:49:26', '2021-05-26 02:49:26'),
(33, 94, 'Select Car Make', 'Select Car Make', '2021-05-26 03:20:13', '2021-05-26 03:20:13'),
(34, 94, 'Select Transmission', 'Select Transmission', '2021-05-26 03:21:41', '2021-05-26 03:21:41'),
(35, 94, 'Select Body Type', 'Select Body Type', '2021-05-26 03:42:26', '2021-05-26 03:42:26'),
(36, 94, 'Specs', 'Specs', '2021-05-26 03:44:00', '2021-05-26 03:44:00'),
(37, 95, 'Select Required Service', 'Required Service', '2021-05-26 03:55:32', '2021-05-26 03:55:32'),
(38, 95, 'Select Car Make', 'Car Make', '2021-05-26 04:13:43', '2021-05-26 04:13:43'),
(39, 95, 'Select Transmission', 'Select Transmission', '2021-05-26 04:16:03', '2021-05-26 04:16:03'),
(40, 95, 'Select Body Type', 'Select Body Type', '2021-05-26 04:18:09', '2021-05-26 04:18:09'),
(41, 95, 'Specs', 'Specs', '2021-05-26 04:20:44', '2021-05-26 04:20:44'),
(42, 96, 'Select Required Service', 'Select Required Service', '2021-05-26 04:34:05', '2021-05-26 04:34:05'),
(43, 96, 'Select Car Make', 'Select Car Make', '2021-05-26 04:49:53', '2021-05-26 04:49:53'),
(44, 96, 'Select Transmission', 'Select Transmission', '2021-05-26 04:56:37', '2021-05-26 04:56:37'),
(45, 96, 'Select Body Type', 'Select Body Type', '2021-05-26 05:00:25', '2021-05-26 05:00:25'),
(46, 96, 'Specs', 'Specs', '2021-05-26 05:01:42', '2021-05-26 05:01:42'),
(47, 97, 'Select Required Service', 'Required Service', '2021-05-26 05:19:47', '2021-05-26 05:19:47'),
(48, 97, 'Select Car Make', 'Select Car Make', '2021-05-26 05:33:34', '2021-05-26 05:33:34'),
(49, 97, 'Select Transmission', 'Select Transmission', '2021-05-26 05:34:44', '2021-05-26 05:34:44'),
(50, 97, 'Select Body Type', 'Select Body Type', '2021-05-26 05:36:55', '2021-05-26 05:36:55'),
(51, 97, 'Specs', 'Specs', '2021-05-26 05:37:49', '2021-05-26 05:37:49'),
(52, 98, 'Select Required Service', 'Required Service', '2021-05-26 05:48:03', '2021-05-26 05:48:03'),
(53, 98, 'Plate Source (Emirate)', 'Plate Source (Emirate)', '2021-05-26 05:49:49', '2021-05-26 05:49:49');

-- --------------------------------------------------------

--
-- Table structure for table `select_field_with_charges`
--

CREATE TABLE `select_field_with_charges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `label_for_form` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label_for_invoice` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `select_field_with_charges`
--

INSERT INTO `select_field_with_charges` (`id`, `service_id`, `label_for_form`, `label_for_invoice`, `created_at`, `updated_at`) VALUES
(7, 60, 'D you require any of these (s-w-p) ?', 'Requirement', '2021-01-28 23:41:39', '2021-01-28 23:41:39'),
(8, 63, 'D you require any of these (s-w-p) ?', 'Other service', '2021-03-17 01:00:17', '2021-03-17 01:00:17'),
(9, 70, 'Your Device or Appliance', 'Your Device or Appliance', '2021-04-03 14:42:22', '2021-04-03 14:42:22'),
(10, 71, 'Your Device or Appliance', 'Your Device or Appliance', '2021-04-03 15:03:49', '2021-04-03 15:03:49'),
(11, 74, 'Choose Required Service', 'Required Service', '2021-04-15 04:34:51', '2021-04-15 04:34:51'),
(12, 75, 'Choose Required Services', 'Choose Required Services', '2021-04-15 04:42:21', '2021-04-15 04:42:21'),
(13, 76, 'Choose Required Services', 'Choose Required Services', '2021-04-15 05:19:38', '2021-04-15 05:19:38'),
(14, 77, 'Choose Required Services', 'Choose Required Services', '2021-04-15 05:37:59', '2021-04-15 05:37:59'),
(15, 78, 'Choose Required Services', 'Choose Required Services', '2021-04-15 05:50:21', '2021-04-15 05:50:21');

-- --------------------------------------------------------

--
-- Table structure for table `select_options`
--

CREATE TABLE `select_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `select_field_id` bigint(20) UNSIGNED NOT NULL,
  `option` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `select_options`
--

INSERT INTO `select_options` (`id`, `select_field_id`, `option`, `created_at`, `updated_at`) VALUES
(15, 8, 'Yes', '2021-01-28 23:41:39', '2021-01-28 23:41:39'),
(16, 8, 'No', '2021-01-28 23:41:39', '2021-01-28 23:41:39'),
(17, 9, 'Yes', '2021-03-17 01:00:17', '2021-03-17 01:00:17'),
(18, 9, 'No', '2021-03-17 01:00:17', '2021-03-17 01:00:17'),
(19, 10, 'Fencing', '2021-03-31 03:56:41', '2021-03-31 03:56:41'),
(20, 10, 'Fertilizer', '2021-03-31 03:56:41', '2021-03-31 03:56:41'),
(23, 12, 'Yes', '2021-04-03 13:59:03', '2021-04-03 13:59:03'),
(24, 12, 'No', '2021-04-03 13:59:03', '2021-04-03 13:59:03'),
(25, 13, 'Suede', '2021-04-03 14:22:20', '2021-04-03 14:22:20'),
(26, 13, 'Leather', '2021-04-03 14:22:20', '2021-04-03 14:22:20'),
(27, 13, 'Textile', '2021-04-03 14:22:20', '2021-04-03 14:22:20'),
(28, 14, 'Steam Cleaning', '2021-04-03 14:23:01', '2021-04-03 14:23:01'),
(29, 14, 'Shampoo Cleaning', '2021-04-03 14:23:01', '2021-04-03 14:23:01'),
(30, 15, 'Yes', '2021-04-03 14:23:23', '2021-04-03 14:23:23'),
(31, 15, 'No', '2021-04-03 14:23:23', '2021-04-03 14:23:23'),
(48, 22, 'Residencial', '2021-04-28 04:39:57', '2021-04-28 04:39:57'),
(49, 22, 'Commercial', '2021-04-28 04:39:57', '2021-04-28 04:39:57'),
(50, 22, 'Industrial', '2021-04-28 04:39:57', '2021-04-28 04:39:57'),
(51, 23, 'Wedding', '2021-04-29 00:28:30', '2021-04-29 00:28:30'),
(52, 23, 'Suhoor or iftar', '2021-04-29 00:28:30', '2021-04-29 00:28:30'),
(53, 23, 'Kids birthday party', '2021-04-29 00:28:30', '2021-04-29 00:28:30'),
(54, 23, 'Private party / dinner party', '2021-04-29 00:28:30', '2021-04-29 00:28:30'),
(55, 23, 'Yacht party', '2021-04-29 00:28:30', '2021-04-29 00:28:30'),
(56, 23, 'Religious event', '2021-04-29 00:28:30', '2021-04-29 00:28:30'),
(57, 23, 'Meeting / conference', '2021-04-29 00:28:30', '2021-04-29 00:28:30'),
(58, 23, 'Catering for institutions / industries', '2021-04-29 00:28:30', '2021-04-29 00:28:30'),
(59, 23, 'Anniversary', '2021-04-29 00:28:30', '2021-04-29 00:28:30'),
(60, 23, 'Corporate event', '2021-04-29 00:28:30', '2021-04-29 00:28:30'),
(61, 23, 'Christmas / thanksgiving', '2021-04-29 00:28:30', '2021-04-29 00:28:30'),
(62, 23, 'Catering for cafes / canteen', '2021-04-29 00:28:30', '2021-04-29 00:28:30'),
(63, 23, 'Birthday party', '2021-04-29 00:28:30', '2021-04-29 00:28:30'),
(64, 23, 'Cocktail reception', '2021-04-29 00:28:30', '2021-04-29 00:28:30'),
(65, 23, 'Bridal / baby shower', '2021-04-29 00:28:30', '2021-04-29 00:28:30'),
(66, 23, 'Catering for camps / staff accommodations', '2021-04-29 00:28:30', '2021-04-29 00:28:30'),
(67, 24, 'Standard', '2021-05-26 00:34:09', '2021-05-26 00:34:09'),
(68, 25, 'Wood Free120 gsm', '2021-05-26 00:35:24', '2021-05-26 00:35:24'),
(69, 26, 'White', '2021-05-26 00:36:49', '2021-05-26 00:36:49'),
(70, 26, 'Yellow', '2021-05-26 00:36:49', '2021-05-26 00:36:49'),
(71, 27, 'AC Repair Service', '2021-05-26 01:35:49', '2021-05-26 01:35:49'),
(72, 27, 'Brake Repair Service', '2021-05-26 01:35:49', '2021-05-26 01:35:49'),
(73, 27, 'Transmission repair and rebuild', '2021-05-26 01:35:49', '2021-05-26 01:35:49'),
(74, 27, 'Steering & Suspension Repair', '2021-05-26 01:35:49', '2021-05-26 01:35:49'),
(75, 27, 'Engine Repair or Rebuild', '2021-05-26 01:35:49', '2021-05-26 01:35:49'),
(76, 27, 'Windscreen Repair and Replace', '2021-05-26 01:35:49', '2021-05-26 01:35:49'),
(77, 27, 'Denting & Body Repair Service', '2021-05-26 01:35:49', '2021-05-26 01:35:49'),
(78, 27, 'Rim Repair', '2021-05-26 01:35:49', '2021-05-26 01:35:49'),
(79, 27, 'Safety Components', '2021-05-26 01:35:49', '2021-05-26 01:35:49'),
(80, 27, 'Key Programming & Coades', '2021-05-26 01:35:49', '2021-05-26 01:35:49'),
(81, 27, 'Electrical Repairs', '2021-05-26 01:35:49', '2021-05-26 01:35:49'),
(82, 27, 'Mechanical Repairs', '2021-05-26 01:35:49', '2021-05-26 01:35:49'),
(83, 27, 'Heating & Cooling Services', '2021-05-26 01:35:49', '2021-05-26 01:35:49'),
(84, 27, 'Engine Noise repair', '2021-05-26 01:35:49', '2021-05-26 01:35:49'),
(85, 27, 'Bumper Repair', '2021-05-26 01:35:49', '2021-05-26 01:35:49'),
(86, 28, 'Acura', '2021-05-26 02:06:56', '2021-05-26 02:06:56'),
(87, 28, 'Alfa-Romeo', '2021-05-26 02:06:56', '2021-05-26 02:06:56'),
(88, 28, 'Aston-Martin', '2021-05-26 02:06:56', '2021-05-26 02:06:56'),
(89, 28, 'Audi', '2021-05-26 02:06:56', '2021-05-26 02:06:56'),
(90, 28, 'Bentley', '2021-05-26 02:06:56', '2021-05-26 02:06:56'),
(91, 28, 'BMW', '2021-05-26 02:06:56', '2021-05-26 02:06:56'),
(92, 28, 'Bugatti', '2021-05-26 02:06:56', '2021-05-26 02:06:56'),
(93, 28, 'Buick', '2021-05-26 02:06:56', '2021-05-26 02:06:56'),
(94, 28, 'Cadillac', '2021-05-26 02:06:56', '2021-05-26 02:06:56'),
(95, 28, 'Chevrolet', '2021-05-26 02:06:56', '2021-05-26 02:06:56'),
(96, 28, 'Chrysler', '2021-05-26 02:06:56', '2021-05-26 02:06:56'),
(97, 28, 'Citroen', '2021-05-26 02:06:56', '2021-05-26 02:06:56'),
(98, 28, 'Dodge', '2021-05-26 02:06:56', '2021-05-26 02:06:56'),
(99, 28, 'Ferrari', '2021-05-26 02:06:56', '2021-05-26 02:06:56'),
(100, 28, 'Fiat', '2021-05-26 02:06:56', '2021-05-26 02:06:56'),
(101, 28, 'Ford', '2021-05-26 02:06:56', '2021-05-26 02:06:56'),
(102, 28, 'Geely', '2021-05-26 02:06:56', '2021-05-26 02:06:56'),
(103, 28, 'Genesis', '2021-05-26 02:06:56', '2021-05-26 02:06:56'),
(104, 28, 'GMC', '2021-05-26 02:06:56', '2021-05-26 02:06:56'),
(105, 28, 'Honda', '2021-05-26 02:06:56', '2021-05-26 02:06:56'),
(106, 28, 'Hyundai', '2021-05-26 02:06:56', '2021-05-26 02:06:56'),
(107, 28, 'Infiniti', '2021-05-26 02:06:56', '2021-05-26 02:06:56'),
(108, 28, 'Jaguar', '2021-05-26 02:06:56', '2021-05-26 02:06:56'),
(109, 28, 'Jeep', '2021-05-26 02:06:56', '2021-05-26 02:06:56'),
(110, 28, 'Kia', '2021-05-26 02:06:56', '2021-05-26 02:06:56'),
(111, 28, 'Koenigsegg', '2021-05-26 02:06:56', '2021-05-26 02:06:56'),
(112, 28, 'Lamborghini', '2021-05-26 02:06:56', '2021-05-26 02:06:56'),
(113, 28, 'Lancia', '2021-05-26 02:06:56', '2021-05-26 02:06:56'),
(114, 28, 'Land Rover', '2021-05-26 02:06:56', '2021-05-26 02:06:56'),
(115, 28, 'Lexus', '2021-05-26 02:06:56', '2021-05-26 02:06:56'),
(116, 28, 'Lincoln', '2021-05-26 02:06:56', '2021-05-26 02:06:56'),
(117, 28, 'Lotus', '2021-05-26 02:06:56', '2021-05-26 02:06:56'),
(118, 28, 'Maserati', '2021-05-26 02:06:56', '2021-05-26 02:06:56'),
(119, 28, 'Maybach', '2021-05-26 02:06:56', '2021-05-26 02:06:56'),
(120, 28, 'Mazda', '2021-05-26 02:06:56', '2021-05-26 02:06:56'),
(121, 28, 'McLaren', '2021-05-26 02:06:56', '2021-05-26 02:06:56'),
(122, 28, 'Mercedes', '2021-05-26 02:06:56', '2021-05-26 02:06:56'),
(123, 28, 'Mini', '2021-05-26 02:06:56', '2021-05-26 02:06:56'),
(124, 28, 'Mitsubishi', '2021-05-26 02:06:56', '2021-05-26 02:06:56'),
(125, 28, 'Nissan', '2021-05-26 02:06:56', '2021-05-26 02:06:56'),
(126, 28, 'Opel', '2021-05-26 02:06:56', '2021-05-26 02:06:56'),
(127, 28, 'Pagani', '2021-05-26 02:06:56', '2021-05-26 02:06:56'),
(128, 28, 'Peugeot', '2021-05-26 02:06:56', '2021-05-26 02:06:56'),
(129, 28, 'Pontiac', '2021-05-26 02:06:56', '2021-05-26 02:06:56'),
(130, 28, 'Porsche', '2021-05-26 02:06:56', '2021-05-26 02:06:56'),
(131, 28, 'Ram', '2021-05-26 02:06:56', '2021-05-26 02:06:56'),
(132, 28, 'Renault', '2021-05-26 02:06:56', '2021-05-26 02:06:56'),
(133, 28, 'Rolls-Royce', '2021-05-26 02:06:56', '2021-05-26 02:06:56'),
(134, 28, 'Skoda', '2021-05-26 02:06:56', '2021-05-26 02:06:56'),
(135, 28, 'Smart', '2021-05-26 02:06:56', '2021-05-26 02:06:56'),
(136, 28, 'Subaru', '2021-05-26 02:06:56', '2021-05-26 02:06:56'),
(137, 28, 'Suzuki', '2021-05-26 02:06:56', '2021-05-26 02:06:56'),
(138, 28, 'Tesla', '2021-05-26 02:06:56', '2021-05-26 02:06:56'),
(139, 28, 'Toyota', '2021-05-26 02:06:56', '2021-05-26 02:06:56'),
(140, 28, 'Volkswagen', '2021-05-26 02:06:56', '2021-05-26 02:06:56'),
(141, 28, 'Volvo', '2021-05-26 02:06:56', '2021-05-26 02:06:56'),
(142, 29, 'Automatic', '2021-05-26 02:09:59', '2021-05-26 02:09:59'),
(143, 29, 'Mannual', '2021-05-26 02:09:59', '2021-05-26 02:09:59'),
(144, 30, 'Coupe', '2021-05-26 02:13:36', '2021-05-26 02:13:36'),
(145, 30, 'Hatchback', '2021-05-26 02:13:36', '2021-05-26 02:13:36'),
(146, 30, 'Sports Car', '2021-05-26 02:13:36', '2021-05-26 02:13:36'),
(147, 30, 'SUV', '2021-05-26 02:13:36', '2021-05-26 02:13:36'),
(148, 30, 'Crossover', '2021-05-26 02:13:36', '2021-05-26 02:13:36'),
(149, 30, 'Liftback', '2021-05-26 02:13:36', '2021-05-26 02:13:36'),
(150, 30, 'Soft top Convertible', '2021-05-26 02:13:36', '2021-05-26 02:13:36'),
(151, 30, 'Van', '2021-05-26 02:13:36', '2021-05-26 02:13:36'),
(152, 30, 'Hard top Convertible', '2021-05-26 02:13:36', '2021-05-26 02:13:36'),
(153, 30, 'Pick up truck', '2021-05-26 02:13:36', '2021-05-26 02:13:36'),
(154, 30, 'Sedan', '2021-05-26 02:13:36', '2021-05-26 02:13:36'),
(155, 30, 'Wagon', '2021-05-26 02:13:36', '2021-05-26 02:13:36'),
(156, 31, 'GCC', '2021-05-26 02:15:41', '2021-05-26 02:15:41'),
(157, 31, 'US/Canada', '2021-05-26 02:15:41', '2021-05-26 02:15:41'),
(158, 31, 'Japan', '2021-05-26 02:15:41', '2021-05-26 02:15:41'),
(159, 31, 'European', '2021-05-26 02:15:41', '2021-05-26 02:15:41'),
(160, 31, 'Other', '2021-05-26 02:15:41', '2021-05-26 02:15:41'),
(161, 32, 'Oil Change Service', '2021-05-26 02:49:26', '2021-05-26 02:49:26'),
(162, 32, 'Restoration Service', '2021-05-26 02:49:26', '2021-05-26 02:49:26'),
(163, 32, 'Battery Service', '2021-05-26 02:49:26', '2021-05-26 02:49:26'),
(164, 32, 'Tyre Change Service', '2021-05-26 02:49:26', '2021-05-26 02:49:26'),
(165, 32, 'Body Paint Service', '2021-05-26 02:49:26', '2021-05-26 02:49:26'),
(166, 32, 'Nano Ceramic Coating Service', '2021-05-26 02:49:26', '2021-05-26 02:49:26'),
(167, 32, 'Wrapping Service', '2021-05-26 02:49:26', '2021-05-26 02:49:26'),
(168, 32, 'Car Maintenance', '2021-05-26 02:49:26', '2021-05-26 02:49:26'),
(169, 32, 'Fuel Injector Cleaning and Flushing', '2021-05-26 02:49:26', '2021-05-26 02:49:26'),
(170, 32, 'Suspension Alignments', '2021-05-26 02:49:26', '2021-05-26 02:49:26'),
(171, 32, 'Brakes inspection', '2021-05-26 02:49:26', '2021-05-26 02:49:26'),
(172, 32, 'Replace Spark Plugs', '2021-05-26 02:49:26', '2021-05-26 02:49:26'),
(173, 32, 'Air Filter Replacement', '2021-05-26 02:49:26', '2021-05-26 02:49:26'),
(174, 32, 'AC-Compressor Repair & Installation', '2021-05-26 02:49:26', '2021-05-26 02:49:26'),
(175, 32, 'Polishing  Scratch re-fill', '2021-05-26 02:49:26', '2021-05-26 02:49:26'),
(176, 33, 'Acura', '2021-05-26 03:20:13', '2021-05-26 03:20:13'),
(177, 33, 'Alfa-Romeo', '2021-05-26 03:20:13', '2021-05-26 03:20:13'),
(178, 33, 'Aston-Martin', '2021-05-26 03:20:13', '2021-05-26 03:20:13'),
(179, 33, 'Audi', '2021-05-26 03:20:13', '2021-05-26 03:20:13'),
(180, 33, 'Bentley', '2021-05-26 03:20:13', '2021-05-26 03:20:13'),
(181, 33, 'BMW', '2021-05-26 03:20:13', '2021-05-26 03:20:13'),
(182, 33, 'Bugatti', '2021-05-26 03:20:13', '2021-05-26 03:20:13'),
(183, 33, 'Buick', '2021-05-26 03:20:13', '2021-05-26 03:20:13'),
(184, 33, 'Cadillac', '2021-05-26 03:20:13', '2021-05-26 03:20:13'),
(185, 33, 'Chevrolet', '2021-05-26 03:20:13', '2021-05-26 03:20:13'),
(186, 33, 'Chrysler', '2021-05-26 03:20:13', '2021-05-26 03:20:13'),
(187, 33, 'Citroen', '2021-05-26 03:20:13', '2021-05-26 03:20:13'),
(188, 33, 'Dodge', '2021-05-26 03:20:13', '2021-05-26 03:20:13'),
(189, 33, 'Ferrari', '2021-05-26 03:20:13', '2021-05-26 03:20:13'),
(190, 33, 'Fiat', '2021-05-26 03:20:13', '2021-05-26 03:20:13'),
(191, 33, 'Ford', '2021-05-26 03:20:13', '2021-05-26 03:20:13'),
(192, 33, 'Geely', '2021-05-26 03:20:13', '2021-05-26 03:20:13'),
(193, 33, 'Genesis', '2021-05-26 03:20:13', '2021-05-26 03:20:13'),
(194, 33, 'GMC', '2021-05-26 03:20:13', '2021-05-26 03:20:13'),
(195, 33, 'Honda', '2021-05-26 03:20:13', '2021-05-26 03:20:13'),
(196, 33, 'Hyundai', '2021-05-26 03:20:13', '2021-05-26 03:20:13'),
(197, 33, 'Infiniti', '2021-05-26 03:20:13', '2021-05-26 03:20:13'),
(198, 33, 'Jaguar', '2021-05-26 03:20:13', '2021-05-26 03:20:13'),
(199, 33, 'Jeep', '2021-05-26 03:20:13', '2021-05-26 03:20:13'),
(200, 33, 'Kia', '2021-05-26 03:20:13', '2021-05-26 03:20:13'),
(201, 33, 'Koenigsegg', '2021-05-26 03:20:13', '2021-05-26 03:20:13'),
(202, 33, 'Lamborghini', '2021-05-26 03:20:13', '2021-05-26 03:20:13'),
(203, 33, 'Lancia', '2021-05-26 03:20:13', '2021-05-26 03:20:13'),
(204, 33, 'Land Rover', '2021-05-26 03:20:13', '2021-05-26 03:20:13'),
(205, 33, 'Lexus', '2021-05-26 03:20:13', '2021-05-26 03:20:13'),
(206, 33, 'Lincoln', '2021-05-26 03:20:13', '2021-05-26 03:20:13'),
(207, 33, 'Lotus', '2021-05-26 03:20:13', '2021-05-26 03:20:13'),
(208, 33, 'Maserati', '2021-05-26 03:20:13', '2021-05-26 03:20:13'),
(209, 33, 'Maybach', '2021-05-26 03:20:13', '2021-05-26 03:20:13'),
(210, 33, 'Mazda', '2021-05-26 03:20:13', '2021-05-26 03:20:13'),
(211, 33, 'McLaren', '2021-05-26 03:20:13', '2021-05-26 03:20:13'),
(212, 33, 'Mercedes', '2021-05-26 03:20:13', '2021-05-26 03:20:13'),
(213, 33, 'Mini', '2021-05-26 03:20:13', '2021-05-26 03:20:13'),
(214, 33, 'Mitsubishi', '2021-05-26 03:20:13', '2021-05-26 03:20:13'),
(215, 33, 'Nissan', '2021-05-26 03:20:13', '2021-05-26 03:20:13'),
(216, 33, 'Opel', '2021-05-26 03:20:13', '2021-05-26 03:20:13'),
(217, 33, 'Pagani', '2021-05-26 03:20:13', '2021-05-26 03:20:13'),
(218, 33, 'Peugeot', '2021-05-26 03:20:13', '2021-05-26 03:20:13'),
(219, 33, 'Pontiac', '2021-05-26 03:20:13', '2021-05-26 03:20:13'),
(220, 33, 'Porsche', '2021-05-26 03:20:13', '2021-05-26 03:20:13'),
(221, 33, 'Ram', '2021-05-26 03:20:13', '2021-05-26 03:20:13'),
(222, 33, 'Renault', '2021-05-26 03:20:13', '2021-05-26 03:20:13'),
(223, 33, 'Rolls-Royce', '2021-05-26 03:20:13', '2021-05-26 03:20:13'),
(224, 33, 'Skoda', '2021-05-26 03:20:13', '2021-05-26 03:20:13'),
(225, 33, 'Smart', '2021-05-26 03:20:13', '2021-05-26 03:20:13'),
(226, 33, 'Subaru', '2021-05-26 03:20:13', '2021-05-26 03:20:13'),
(227, 33, 'Suzuki', '2021-05-26 03:20:13', '2021-05-26 03:20:13'),
(228, 33, 'Tesla', '2021-05-26 03:20:13', '2021-05-26 03:20:13'),
(229, 33, 'Toyota', '2021-05-26 03:20:13', '2021-05-26 03:20:13'),
(230, 33, 'Volkswagen', '2021-05-26 03:20:13', '2021-05-26 03:20:13'),
(231, 33, 'Volvo', '2021-05-26 03:20:13', '2021-05-26 03:20:13'),
(232, 34, 'Automatic', '2021-05-26 03:21:41', '2021-05-26 03:21:41'),
(233, 34, 'Mannual', '2021-05-26 03:21:41', '2021-05-26 03:21:41'),
(234, 35, 'Coupe', '2021-05-26 03:42:26', '2021-05-26 03:42:26'),
(235, 35, 'Hatchback', '2021-05-26 03:42:26', '2021-05-26 03:42:26'),
(236, 35, 'Sports Car', '2021-05-26 03:42:26', '2021-05-26 03:42:26'),
(237, 35, 'SUV', '2021-05-26 03:42:26', '2021-05-26 03:42:26'),
(238, 35, 'Crossover', '2021-05-26 03:42:26', '2021-05-26 03:42:26'),
(239, 35, 'Liftback', '2021-05-26 03:42:26', '2021-05-26 03:42:26'),
(240, 35, 'Soft top Convertible', '2021-05-26 03:42:26', '2021-05-26 03:42:26'),
(241, 35, 'Van', '2021-05-26 03:42:26', '2021-05-26 03:42:26'),
(242, 35, 'Hard top Convertible', '2021-05-26 03:42:26', '2021-05-26 03:42:26'),
(243, 35, 'Pick up truck', '2021-05-26 03:42:26', '2021-05-26 03:42:26'),
(244, 35, 'Sedan', '2021-05-26 03:42:26', '2021-05-26 03:42:26'),
(245, 35, 'Wagon', '2021-05-26 03:42:26', '2021-05-26 03:42:26'),
(246, 36, 'GCC', '2021-05-26 03:44:00', '2021-05-26 03:44:00'),
(247, 36, 'US/Canada', '2021-05-26 03:44:00', '2021-05-26 03:44:00'),
(248, 36, 'Japan', '2021-05-26 03:44:00', '2021-05-26 03:44:00'),
(249, 36, 'European', '2021-05-26 03:44:00', '2021-05-26 03:44:00'),
(250, 36, 'Other', '2021-05-26 03:44:00', '2021-05-26 03:44:00'),
(251, 37, 'Towing', '2021-05-26 03:55:32', '2021-05-26 03:55:32'),
(252, 37, 'Battery services', '2021-05-26 03:55:32', '2021-05-26 03:55:32'),
(253, 37, 'Flat tire replacements', '2021-05-26 03:55:32', '2021-05-26 03:55:32'),
(254, 37, 'Lockout services', '2021-05-26 03:55:32', '2021-05-26 03:55:32'),
(255, 37, 'jump-starting', '2021-05-26 03:55:32', '2021-05-26 03:55:32'),
(256, 37, 'Fuel delivery', '2021-05-26 03:55:32', '2021-05-26 03:55:32'),
(257, 37, 'winching service', '2021-05-26 03:55:32', '2021-05-26 03:55:32'),
(258, 37, 'Mechanical failure', '2021-05-26 03:55:32', '2021-05-26 03:55:32'),
(259, 38, 'Acura', '2021-05-26 04:13:43', '2021-05-26 04:13:43'),
(260, 38, 'Alfa-Romeo', '2021-05-26 04:13:43', '2021-05-26 04:13:43'),
(261, 38, 'Aston-Martin', '2021-05-26 04:13:43', '2021-05-26 04:13:43'),
(262, 38, 'Audi', '2021-05-26 04:13:43', '2021-05-26 04:13:43'),
(263, 38, 'Bentley', '2021-05-26 04:13:43', '2021-05-26 04:13:43'),
(264, 38, 'BMW', '2021-05-26 04:13:43', '2021-05-26 04:13:43'),
(265, 38, 'Bugatti', '2021-05-26 04:13:43', '2021-05-26 04:13:43'),
(266, 38, 'Buick', '2021-05-26 04:13:43', '2021-05-26 04:13:43'),
(267, 38, 'Cadillac', '2021-05-26 04:13:43', '2021-05-26 04:13:43'),
(268, 38, 'Chevrolet', '2021-05-26 04:13:43', '2021-05-26 04:13:43'),
(269, 38, 'Chrysler', '2021-05-26 04:13:43', '2021-05-26 04:13:43'),
(270, 38, 'Citroen', '2021-05-26 04:13:43', '2021-05-26 04:13:43'),
(271, 38, 'Dodge', '2021-05-26 04:13:43', '2021-05-26 04:13:43'),
(272, 38, 'Ferrari', '2021-05-26 04:13:43', '2021-05-26 04:13:43'),
(273, 38, 'Fiat', '2021-05-26 04:13:43', '2021-05-26 04:13:43'),
(274, 38, 'Ford', '2021-05-26 04:13:43', '2021-05-26 04:13:43'),
(275, 38, 'Geely', '2021-05-26 04:13:43', '2021-05-26 04:13:43'),
(276, 38, 'Genesis', '2021-05-26 04:13:43', '2021-05-26 04:13:43'),
(277, 38, 'GMC', '2021-05-26 04:13:43', '2021-05-26 04:13:43'),
(278, 38, 'Honda', '2021-05-26 04:13:43', '2021-05-26 04:13:43'),
(279, 38, 'Hyundai', '2021-05-26 04:13:43', '2021-05-26 04:13:43'),
(280, 38, 'Infiniti', '2021-05-26 04:13:43', '2021-05-26 04:13:43'),
(281, 38, 'Jaguar', '2021-05-26 04:13:43', '2021-05-26 04:13:43'),
(282, 38, 'Jeep', '2021-05-26 04:13:43', '2021-05-26 04:13:43'),
(283, 38, 'Kia', '2021-05-26 04:13:43', '2021-05-26 04:13:43'),
(284, 38, 'Koenigsegg', '2021-05-26 04:13:43', '2021-05-26 04:13:43'),
(285, 38, 'Lamborghini', '2021-05-26 04:13:43', '2021-05-26 04:13:43'),
(286, 38, 'Lancia', '2021-05-26 04:13:43', '2021-05-26 04:13:43'),
(287, 38, 'Land Rover', '2021-05-26 04:13:43', '2021-05-26 04:13:43'),
(288, 38, 'Lexus', '2021-05-26 04:13:43', '2021-05-26 04:13:43'),
(289, 38, 'Lincoln', '2021-05-26 04:13:43', '2021-05-26 04:13:43'),
(290, 38, 'Lotus', '2021-05-26 04:13:43', '2021-05-26 04:13:43'),
(291, 38, 'Maserati', '2021-05-26 04:13:43', '2021-05-26 04:13:43'),
(292, 38, 'Maybach', '2021-05-26 04:13:43', '2021-05-26 04:13:43'),
(293, 38, 'Mazda', '2021-05-26 04:13:43', '2021-05-26 04:13:43'),
(294, 38, 'McLaren', '2021-05-26 04:13:43', '2021-05-26 04:13:43'),
(295, 38, 'Mercedes', '2021-05-26 04:13:43', '2021-05-26 04:13:43'),
(296, 38, 'Mini', '2021-05-26 04:13:43', '2021-05-26 04:13:43'),
(297, 38, 'Mitsubishi', '2021-05-26 04:13:43', '2021-05-26 04:13:43'),
(298, 38, 'Nissan', '2021-05-26 04:13:43', '2021-05-26 04:13:43'),
(299, 38, 'Opel', '2021-05-26 04:13:43', '2021-05-26 04:13:43'),
(300, 38, 'Pagani', '2021-05-26 04:13:43', '2021-05-26 04:13:43'),
(301, 38, 'Peugeot', '2021-05-26 04:13:43', '2021-05-26 04:13:43'),
(302, 38, 'Pontiac', '2021-05-26 04:13:43', '2021-05-26 04:13:43'),
(303, 38, 'Porsche', '2021-05-26 04:13:43', '2021-05-26 04:13:43'),
(304, 38, 'Ram', '2021-05-26 04:13:43', '2021-05-26 04:13:43'),
(305, 38, 'Renault', '2021-05-26 04:13:43', '2021-05-26 04:13:43'),
(306, 38, 'Rolls-Royce', '2021-05-26 04:13:43', '2021-05-26 04:13:43'),
(307, 38, 'Skoda', '2021-05-26 04:13:43', '2021-05-26 04:13:43'),
(308, 38, 'Smart', '2021-05-26 04:13:43', '2021-05-26 04:13:43'),
(309, 38, 'Subaru', '2021-05-26 04:13:43', '2021-05-26 04:13:43'),
(310, 38, 'Suzuki', '2021-05-26 04:13:43', '2021-05-26 04:13:43'),
(311, 38, 'Tesla', '2021-05-26 04:13:43', '2021-05-26 04:13:43'),
(312, 38, 'Toyota', '2021-05-26 04:13:43', '2021-05-26 04:13:43'),
(313, 38, 'Volkswagen', '2021-05-26 04:13:43', '2021-05-26 04:13:43'),
(314, 38, 'Volvo', '2021-05-26 04:13:43', '2021-05-26 04:13:43'),
(315, 39, 'Automatic', '2021-05-26 04:16:03', '2021-05-26 04:16:03'),
(316, 39, 'Mannual', '2021-05-26 04:16:03', '2021-05-26 04:16:03'),
(317, 40, 'Coupe', '2021-05-26 04:18:09', '2021-05-26 04:18:09'),
(318, 40, 'Crossover', '2021-05-26 04:18:09', '2021-05-26 04:18:09'),
(319, 40, 'Hard top Convertible', '2021-05-26 04:18:09', '2021-05-26 04:18:09'),
(320, 40, 'Hatchback', '2021-05-26 04:18:09', '2021-05-26 04:18:09'),
(321, 40, 'Liftback', '2021-05-26 04:18:09', '2021-05-26 04:18:09'),
(322, 40, 'Pick up truck', '2021-05-26 04:18:09', '2021-05-26 04:18:09'),
(323, 40, 'Sports Car', '2021-05-26 04:18:09', '2021-05-26 04:18:09'),
(324, 40, 'Soft top Convertible', '2021-05-26 04:18:09', '2021-05-26 04:18:09'),
(325, 40, 'Sedan', '2021-05-26 04:18:09', '2021-05-26 04:18:09'),
(326, 40, 'SUV', '2021-05-26 04:18:09', '2021-05-26 04:18:09'),
(327, 40, 'Van', '2021-05-26 04:18:09', '2021-05-26 04:18:09'),
(328, 40, 'Wagon', '2021-05-26 04:18:09', '2021-05-26 04:18:09'),
(329, 41, 'GCC', '2021-05-26 04:20:44', '2021-05-26 04:20:44'),
(330, 41, 'European', '2021-05-26 04:20:44', '2021-05-26 04:20:44'),
(331, 41, 'US/Canada', '2021-05-26 04:20:44', '2021-05-26 04:20:44'),
(332, 41, 'Japan', '2021-05-26 04:20:44', '2021-05-26 04:20:44'),
(333, 41, 'Other', '2021-05-26 04:20:44', '2021-05-26 04:20:44'),
(334, 42, 'Oil/oil filter changed', '2021-05-26 04:34:05', '2021-05-26 04:34:05'),
(335, 42, 'Engine tune-up', '2021-05-26 04:34:05', '2021-05-26 04:34:05'),
(336, 42, 'Battery replacement', '2021-05-26 04:34:05', '2021-05-26 04:34:05'),
(337, 42, 'Replace air filter', '2021-05-26 04:34:05', '2021-05-26 04:34:05'),
(338, 42, 'Brake work', '2021-05-26 04:34:05', '2021-05-26 04:34:05'),
(339, 42, 'Tire replacement', '2021-05-26 04:34:05', '2021-05-26 04:34:05'),
(340, 42, 'Wheels aligned/balanced', '2021-05-26 04:34:05', '2021-05-26 04:34:05'),
(341, 42, 'Wiper blades replacement', '2021-05-26 04:34:05', '2021-05-26 04:34:05'),
(342, 42, 'AC gas top up or AC sanitization', '2021-05-26 04:34:05', '2021-05-26 04:34:05'),
(343, 42, 'Bulb replacements', '2021-05-26 04:34:05', '2021-05-26 04:34:05'),
(344, 43, 'Acura', '2021-05-26 04:49:53', '2021-05-26 04:49:53'),
(345, 43, 'Alfa-Romeo', '2021-05-26 04:49:53', '2021-05-26 04:49:53'),
(346, 43, 'Aston-Martin', '2021-05-26 04:49:53', '2021-05-26 04:49:53'),
(347, 43, 'Audi', '2021-05-26 04:49:53', '2021-05-26 04:49:53'),
(348, 43, 'Bentley', '2021-05-26 04:49:53', '2021-05-26 04:49:53'),
(349, 43, 'BMW', '2021-05-26 04:49:53', '2021-05-26 04:49:53'),
(350, 43, 'Bugatti', '2021-05-26 04:49:53', '2021-05-26 04:49:53'),
(351, 43, 'Buick', '2021-05-26 04:49:53', '2021-05-26 04:49:53'),
(352, 43, 'Cadillac', '2021-05-26 04:49:53', '2021-05-26 04:49:53'),
(353, 43, 'Chevrolet', '2021-05-26 04:49:53', '2021-05-26 04:49:53'),
(354, 43, 'Chrysler', '2021-05-26 04:49:53', '2021-05-26 04:49:53'),
(355, 43, 'Citroen', '2021-05-26 04:49:53', '2021-05-26 04:49:53'),
(356, 43, 'Dodge', '2021-05-26 04:49:53', '2021-05-26 04:49:53'),
(357, 43, 'Ferrari', '2021-05-26 04:49:53', '2021-05-26 04:49:53'),
(358, 43, 'Fiat', '2021-05-26 04:49:53', '2021-05-26 04:49:53'),
(359, 43, 'Ford', '2021-05-26 04:49:53', '2021-05-26 04:49:53'),
(360, 43, 'Geely', '2021-05-26 04:49:53', '2021-05-26 04:49:53'),
(361, 43, 'Genesis', '2021-05-26 04:49:53', '2021-05-26 04:49:53'),
(362, 43, 'GMC', '2021-05-26 04:49:53', '2021-05-26 04:49:53'),
(363, 43, 'Honda', '2021-05-26 04:49:53', '2021-05-26 04:49:53'),
(364, 43, 'Hyundai', '2021-05-26 04:49:53', '2021-05-26 04:49:53'),
(365, 43, 'Infiniti', '2021-05-26 04:49:53', '2021-05-26 04:49:53'),
(366, 43, 'Jaguar', '2021-05-26 04:49:53', '2021-05-26 04:49:53'),
(367, 43, 'Jeep', '2021-05-26 04:49:53', '2021-05-26 04:49:53'),
(368, 43, 'Kia', '2021-05-26 04:49:53', '2021-05-26 04:49:53'),
(369, 43, 'Koenigsegg', '2021-05-26 04:49:53', '2021-05-26 04:49:53'),
(370, 43, 'Lamborghini', '2021-05-26 04:49:53', '2021-05-26 04:49:53'),
(371, 43, 'Lancia', '2021-05-26 04:49:53', '2021-05-26 04:49:53'),
(372, 43, 'Land Rover', '2021-05-26 04:49:53', '2021-05-26 04:49:53'),
(373, 43, 'Lexus', '2021-05-26 04:49:53', '2021-05-26 04:49:53'),
(374, 43, 'Lincoln', '2021-05-26 04:49:53', '2021-05-26 04:49:53'),
(375, 43, 'Lotus', '2021-05-26 04:49:53', '2021-05-26 04:49:53'),
(376, 43, 'Maserati', '2021-05-26 04:49:53', '2021-05-26 04:49:53'),
(377, 43, 'Maybach', '2021-05-26 04:49:53', '2021-05-26 04:49:53'),
(378, 43, 'Mazda', '2021-05-26 04:49:53', '2021-05-26 04:49:53'),
(379, 43, 'McLaren', '2021-05-26 04:49:53', '2021-05-26 04:49:53'),
(380, 43, 'Mercedes', '2021-05-26 04:49:53', '2021-05-26 04:49:53'),
(381, 43, 'Mini', '2021-05-26 04:49:53', '2021-05-26 04:49:53'),
(382, 43, 'Mitsubishi', '2021-05-26 04:49:53', '2021-05-26 04:49:53'),
(383, 43, 'Nissan', '2021-05-26 04:49:53', '2021-05-26 04:49:53'),
(384, 43, 'Opel', '2021-05-26 04:49:53', '2021-05-26 04:49:53'),
(385, 43, 'Pagani', '2021-05-26 04:49:53', '2021-05-26 04:49:53'),
(386, 43, 'Peugeot', '2021-05-26 04:49:53', '2021-05-26 04:49:53'),
(387, 43, 'Pontiac', '2021-05-26 04:49:53', '2021-05-26 04:49:53'),
(388, 43, 'Porsche', '2021-05-26 04:49:53', '2021-05-26 04:49:53'),
(389, 43, 'Ram', '2021-05-26 04:49:53', '2021-05-26 04:49:53'),
(390, 43, 'Renault', '2021-05-26 04:49:53', '2021-05-26 04:49:53'),
(391, 43, 'Rolls-Royce', '2021-05-26 04:49:53', '2021-05-26 04:49:53'),
(392, 43, 'Skoda', '2021-05-26 04:49:53', '2021-05-26 04:49:53'),
(393, 43, 'Smart', '2021-05-26 04:49:53', '2021-05-26 04:49:53'),
(394, 43, 'Subaru', '2021-05-26 04:49:53', '2021-05-26 04:49:53'),
(395, 43, 'Suzuki', '2021-05-26 04:49:53', '2021-05-26 04:49:53'),
(396, 43, 'Tesla', '2021-05-26 04:49:53', '2021-05-26 04:49:53'),
(397, 43, 'Toyota', '2021-05-26 04:49:53', '2021-05-26 04:49:53'),
(398, 43, 'Volkswagen', '2021-05-26 04:49:53', '2021-05-26 04:49:53'),
(399, 43, 'Volvo', '2021-05-26 04:49:53', '2021-05-26 04:49:53'),
(400, 44, 'Automatic', '2021-05-26 04:56:37', '2021-05-26 04:56:37'),
(401, 44, 'Mannual', '2021-05-26 04:56:37', '2021-05-26 04:56:37'),
(402, 45, 'Coupe', '2021-05-26 05:00:25', '2021-05-26 05:00:25'),
(403, 45, 'Hatchback', '2021-05-26 05:00:25', '2021-05-26 05:00:25'),
(404, 45, 'Sports Car', '2021-05-26 05:00:25', '2021-05-26 05:00:25'),
(405, 45, 'SUV', '2021-05-26 05:00:25', '2021-05-26 05:00:25'),
(406, 45, 'Crossover', '2021-05-26 05:00:25', '2021-05-26 05:00:25'),
(407, 45, 'Liftback', '2021-05-26 05:00:25', '2021-05-26 05:00:25'),
(408, 45, 'Soft top Convertible', '2021-05-26 05:00:25', '2021-05-26 05:00:25'),
(409, 45, 'Van', '2021-05-26 05:00:25', '2021-05-26 05:00:25'),
(410, 45, 'Hard top Convertible', '2021-05-26 05:00:25', '2021-05-26 05:00:25'),
(411, 45, 'Pick up truck', '2021-05-26 05:00:25', '2021-05-26 05:00:25'),
(412, 45, 'Sedan', '2021-05-26 05:00:25', '2021-05-26 05:00:25'),
(413, 45, 'Wagon', '2021-05-26 05:00:25', '2021-05-26 05:00:25'),
(414, 46, 'GCC', '2021-05-26 05:01:42', '2021-05-26 05:01:42'),
(415, 46, 'US/Canada', '2021-05-26 05:01:42', '2021-05-26 05:01:42'),
(416, 46, 'Japan', '2021-05-26 05:01:42', '2021-05-26 05:01:42'),
(417, 46, 'European', '2021-05-26 05:01:42', '2021-05-26 05:01:42'),
(418, 46, 'Other', '2021-05-26 05:01:42', '2021-05-26 05:01:42'),
(419, 47, 'Engine diagnostics', '2021-05-26 05:19:47', '2021-05-26 05:19:47'),
(420, 47, 'gearbox diagnostics', '2021-05-26 05:19:47', '2021-05-26 05:19:47'),
(421, 47, 'Complete Car diagnostics', '2021-05-26 05:19:47', '2021-05-26 05:19:47'),
(422, 47, 'suspension diagnostics', '2021-05-26 05:19:47', '2021-05-26 05:19:47'),
(423, 47, 'ABS/SRS Diagnostics', '2021-05-26 05:19:47', '2021-05-26 05:19:47'),
(424, 47, 'AC-Diagnosis and Leak Test', '2021-05-26 05:19:47', '2021-05-26 05:19:47'),
(425, 47, 'Check emissions readiness', '2021-05-26 05:19:47', '2021-05-26 05:19:47'),
(426, 47, 'Computer scan and Diagnostics', '2021-05-26 05:19:47', '2021-05-26 05:19:47'),
(427, 47, 'Analyze & solve engine misfires', '2021-05-26 05:19:47', '2021-05-26 05:19:47'),
(428, 48, 'Acura', '2021-05-26 05:33:34', '2021-05-26 05:33:34'),
(429, 48, 'Alfa-Romeo', '2021-05-26 05:33:34', '2021-05-26 05:33:34'),
(430, 48, 'Aston-Martin', '2021-05-26 05:33:34', '2021-05-26 05:33:34'),
(431, 48, 'Audi', '2021-05-26 05:33:34', '2021-05-26 05:33:34'),
(432, 48, 'Bentley', '2021-05-26 05:33:34', '2021-05-26 05:33:34'),
(433, 48, 'BMW', '2021-05-26 05:33:34', '2021-05-26 05:33:34'),
(434, 48, 'Bugatti', '2021-05-26 05:33:34', '2021-05-26 05:33:34'),
(435, 48, 'Buick', '2021-05-26 05:33:34', '2021-05-26 05:33:34'),
(436, 48, 'Cadillac', '2021-05-26 05:33:34', '2021-05-26 05:33:34'),
(437, 48, 'Chevrolet', '2021-05-26 05:33:34', '2021-05-26 05:33:34'),
(438, 48, 'Chrysler', '2021-05-26 05:33:34', '2021-05-26 05:33:34'),
(439, 48, 'Citroen', '2021-05-26 05:33:34', '2021-05-26 05:33:34'),
(440, 48, 'Dodge', '2021-05-26 05:33:34', '2021-05-26 05:33:34'),
(441, 48, 'Ferrari', '2021-05-26 05:33:34', '2021-05-26 05:33:34'),
(442, 48, 'Fiat', '2021-05-26 05:33:34', '2021-05-26 05:33:34'),
(443, 48, 'Ford', '2021-05-26 05:33:34', '2021-05-26 05:33:34'),
(444, 48, 'Geely', '2021-05-26 05:33:34', '2021-05-26 05:33:34'),
(445, 48, 'Genesis', '2021-05-26 05:33:34', '2021-05-26 05:33:34'),
(446, 48, 'GMC', '2021-05-26 05:33:34', '2021-05-26 05:33:34'),
(447, 48, 'Honda', '2021-05-26 05:33:34', '2021-05-26 05:33:34'),
(448, 48, 'Hyundai', '2021-05-26 05:33:34', '2021-05-26 05:33:34'),
(449, 48, 'Infiniti', '2021-05-26 05:33:34', '2021-05-26 05:33:34'),
(450, 48, 'Jaguar', '2021-05-26 05:33:34', '2021-05-26 05:33:34'),
(451, 48, 'Jeep', '2021-05-26 05:33:34', '2021-05-26 05:33:34'),
(452, 48, 'Kia', '2021-05-26 05:33:34', '2021-05-26 05:33:34'),
(453, 48, 'Koenigsegg', '2021-05-26 05:33:34', '2021-05-26 05:33:34'),
(454, 48, 'Lamborghini', '2021-05-26 05:33:34', '2021-05-26 05:33:34'),
(455, 48, 'Lancia', '2021-05-26 05:33:34', '2021-05-26 05:33:34'),
(456, 48, 'Land Rover', '2021-05-26 05:33:34', '2021-05-26 05:33:34'),
(457, 48, 'Lexus', '2021-05-26 05:33:34', '2021-05-26 05:33:34'),
(458, 48, 'Lincoln', '2021-05-26 05:33:34', '2021-05-26 05:33:34'),
(459, 48, 'Lotus', '2021-05-26 05:33:34', '2021-05-26 05:33:34'),
(460, 48, 'Maserati', '2021-05-26 05:33:34', '2021-05-26 05:33:34'),
(461, 48, 'Maybach', '2021-05-26 05:33:34', '2021-05-26 05:33:34'),
(462, 48, 'Mazda', '2021-05-26 05:33:34', '2021-05-26 05:33:34'),
(463, 48, 'McLaren', '2021-05-26 05:33:34', '2021-05-26 05:33:34'),
(464, 48, 'Mercedes', '2021-05-26 05:33:34', '2021-05-26 05:33:34'),
(465, 48, 'Mini', '2021-05-26 05:33:34', '2021-05-26 05:33:34'),
(466, 48, 'Mitsubishi', '2021-05-26 05:33:34', '2021-05-26 05:33:34'),
(467, 48, 'Nissan', '2021-05-26 05:33:34', '2021-05-26 05:33:34'),
(468, 48, 'Opel', '2021-05-26 05:33:34', '2021-05-26 05:33:34'),
(469, 48, 'Pagani', '2021-05-26 05:33:34', '2021-05-26 05:33:34'),
(470, 48, 'Peugeot', '2021-05-26 05:33:34', '2021-05-26 05:33:34'),
(471, 48, 'Pontiac', '2021-05-26 05:33:34', '2021-05-26 05:33:34'),
(472, 48, 'Porsche', '2021-05-26 05:33:34', '2021-05-26 05:33:34'),
(473, 48, 'Ram', '2021-05-26 05:33:34', '2021-05-26 05:33:34'),
(474, 48, 'Renault', '2021-05-26 05:33:34', '2021-05-26 05:33:34'),
(475, 48, 'Rolls-Royce', '2021-05-26 05:33:34', '2021-05-26 05:33:34'),
(476, 48, 'Skoda', '2021-05-26 05:33:34', '2021-05-26 05:33:34'),
(477, 48, 'Smart', '2021-05-26 05:33:34', '2021-05-26 05:33:34'),
(478, 48, 'Subaru', '2021-05-26 05:33:34', '2021-05-26 05:33:34'),
(479, 48, 'Suzuki', '2021-05-26 05:33:34', '2021-05-26 05:33:34'),
(480, 48, 'Tesla', '2021-05-26 05:33:34', '2021-05-26 05:33:34'),
(481, 48, 'Toyota', '2021-05-26 05:33:34', '2021-05-26 05:33:34'),
(482, 48, 'Volkswagen', '2021-05-26 05:33:34', '2021-05-26 05:33:34'),
(483, 48, 'Volvo', '2021-05-26 05:33:34', '2021-05-26 05:33:34'),
(484, 49, 'Automatic', '2021-05-26 05:34:44', '2021-05-26 05:34:44'),
(485, 49, 'Mannual', '2021-05-26 05:34:44', '2021-05-26 05:34:44'),
(486, 50, 'Coupe', '2021-05-26 05:36:55', '2021-05-26 05:36:55'),
(487, 50, 'Hatchback', '2021-05-26 05:36:55', '2021-05-26 05:36:55'),
(488, 50, 'Sports Car', '2021-05-26 05:36:55', '2021-05-26 05:36:55'),
(489, 50, 'SUV', '2021-05-26 05:36:55', '2021-05-26 05:36:55'),
(490, 50, 'Crossover', '2021-05-26 05:36:55', '2021-05-26 05:36:55'),
(491, 50, 'Liftback', '2021-05-26 05:36:55', '2021-05-26 05:36:55'),
(492, 50, 'Soft top Convertible', '2021-05-26 05:36:55', '2021-05-26 05:36:55'),
(493, 50, 'Van', '2021-05-26 05:36:55', '2021-05-26 05:36:55'),
(494, 50, 'Hard top Convertible', '2021-05-26 05:36:55', '2021-05-26 05:36:55'),
(495, 50, 'Pick up truck', '2021-05-26 05:36:55', '2021-05-26 05:36:55'),
(496, 50, 'Sedan', '2021-05-26 05:36:55', '2021-05-26 05:36:55'),
(497, 50, 'Wagon', '2021-05-26 05:36:56', '2021-05-26 05:36:56'),
(498, 51, 'GCC', '2021-05-26 05:37:49', '2021-05-26 05:37:49'),
(499, 51, 'US/Canada', '2021-05-26 05:37:49', '2021-05-26 05:37:49'),
(500, 51, 'Japan', '2021-05-26 05:37:49', '2021-05-26 05:37:49'),
(501, 51, 'European', '2021-05-26 05:37:49', '2021-05-26 05:37:49'),
(502, 51, 'Other', '2021-05-26 05:37:49', '2021-05-26 05:37:49'),
(503, 52, 'Exterior/Interior wash', '2021-05-26 05:48:03', '2021-05-26 05:48:03'),
(504, 52, 'Steam Wash', '2021-05-26 05:48:03', '2021-05-26 05:48:03'),
(505, 52, 'Steam Wash & Wax', '2021-05-26 05:48:03', '2021-05-26 05:48:03'),
(506, 52, 'Express Polish', '2021-05-26 05:48:03', '2021-05-26 05:48:03'),
(507, 52, 'Car Wrapping', '2021-05-26 05:48:03', '2021-05-26 05:48:03'),
(508, 52, 'AC Santization', '2021-05-26 05:48:03', '2021-05-26 05:48:03'),
(509, 52, 'vehicle sanitization and wash', '2021-05-26 05:48:03', '2021-05-26 05:48:03'),
(510, 52, 'Extreme Body Wash', '2021-05-26 05:48:03', '2021-05-26 05:48:03'),
(511, 52, 'Super Shine Wash', '2021-05-26 05:48:03', '2021-05-26 05:48:03'),
(512, 52, 'Interior Detailing', '2021-05-26 05:48:03', '2021-05-26 05:48:03'),
(513, 53, 'Dubai', '2021-05-26 05:49:49', '2021-05-26 05:49:49'),
(514, 53, 'Sharjah', '2021-05-26 05:49:49', '2021-05-26 05:49:49'),
(515, 53, 'Ajman', '2021-05-26 05:49:49', '2021-05-26 05:49:49'),
(516, 10, 'Pest control', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `select_option_with_charges`
--

CREATE TABLE `select_option_with_charges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `select_field_with_charge_id` bigint(20) UNSIGNED NOT NULL,
  `option` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `charge` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `select_option_with_charges`
--

INSERT INTO `select_option_with_charges` (`id`, `select_field_with_charge_id`, `option`, `charge`, `created_at`, `updated_at`) VALUES
(15, 7, 'Window Shed', '20', '2021-01-28 23:41:39', '2021-01-28 23:41:39'),
(16, 7, 'Car Freshner', '40', '2021-01-28 23:41:39', '2021-01-28 23:41:39'),
(17, 8, 'Kitchen Cleaning', '200', '2021-03-17 01:00:17', '2021-03-17 01:00:17'),
(18, 8, 'Bathroom cleaning', '100', '2021-03-17 01:00:17', '2021-03-17 01:00:17'),
(19, 9, 'Mobile Repairing', '0', '2021-04-03 14:42:22', '2021-04-03 14:42:22'),
(20, 9, 'Tablet Repairing', '0', '2021-04-03 14:42:22', '2021-04-03 14:42:22'),
(21, 9, 'Laptop Repairing', '0', '2021-04-03 14:42:22', '2021-04-03 14:42:22'),
(22, 9, 'Printer Repairing', '0', '2021-04-03 14:42:22', '2021-04-03 14:42:22'),
(23, 9, 'Desktop Repairing', '0', '2021-04-03 14:42:22', '2021-04-03 14:42:22'),
(24, 9, 'Dishwasher Repairing', '0', '2021-04-03 14:42:22', '2021-04-03 14:42:22'),
(25, 9, 'LCD or LED Repairing', '0', '2021-04-03 14:42:22', '2021-04-03 14:42:22'),
(26, 9, 'Water Heater Repairing', '0', '2021-04-03 14:42:22', '2021-04-03 14:42:22'),
(27, 9, 'Cooking Range Repairing', '0', '2021-04-03 14:42:22', '2021-04-03 14:42:22'),
(28, 9, 'Refrigerator Repairing', '0', '2021-04-03 14:42:22', '2021-04-03 14:42:22'),
(29, 9, 'Washing Machine Repairing', '0', '2021-04-03 14:42:22', '2021-04-03 14:42:22'),
(30, 9, 'Microwave Over Repairing', '0', '2021-04-03 14:42:22', '2021-04-03 14:42:22'),
(31, 10, 'TV Installation', '0', '2021-04-03 15:03:49', '2021-04-03 15:03:49'),
(32, 10, 'Water Heater Installation', '0', '2021-04-03 15:03:49', '2021-04-03 15:03:49'),
(33, 10, 'Printer Installation', '0', '2021-04-03 15:03:49', '2021-04-03 15:03:49'),
(34, 10, 'Wash basin Installation', '0', '2021-04-03 15:03:49', '2021-04-03 15:03:49'),
(35, 10, 'Washing Machine Installation', '0', '2021-04-03 15:03:49', '2021-04-03 15:03:49'),
(36, 11, 'Face Bleach', '0.00', '2021-04-15 04:34:51', '2021-04-15 04:34:51'),
(37, 11, 'Deep Cleaning', '0.00', '2021-04-15 04:34:51', '2021-04-15 04:34:51'),
(38, 11, 'Herbal Facial', '0.00', '2021-04-15 04:34:51', '2021-04-15 04:34:51'),
(39, 11, 'Whiting Facial', '0.00', '2021-04-15 04:34:51', '2021-04-15 04:34:51'),
(40, 11, 'Papaya Facial', '0.00', '2021-04-15 04:34:51', '2021-04-15 04:34:51'),
(41, 11, 'Gold Facial with polishing', '0.00', '2021-04-15 04:34:51', '2021-04-15 04:34:51'),
(42, 11, 'Fruits Facial with Polishing', '0.00', '2021-04-15 04:34:51', '2021-04-15 04:34:51'),
(43, 11, 'Diamond Facial', '0.00', '2021-04-15 04:34:51', '2021-04-15 04:34:51'),
(44, 11, 'Face Polishing', '0.00', '2021-04-15 04:34:51', '2021-04-15 04:34:51'),
(45, 12, 'Eyebrow Threading', '0.00', '2021-04-15 04:42:21', '2021-04-15 04:42:21'),
(46, 12, 'Upper Lip Threading', '0.00', '2021-04-15 04:42:21', '2021-04-15 04:42:21'),
(47, 12, 'Forehead Threading', '0.00', '2021-04-15 04:42:21', '2021-04-15 04:42:21'),
(48, 12, 'Chin Threading', '0.00', '2021-04-15 04:42:21', '2021-04-15 04:42:21'),
(49, 12, 'Full Face Threading', '0.00', '2021-04-15 04:42:21', '2021-04-15 04:42:21'),
(50, 13, 'Full Body Stone Massage (60 Min)', '0.00', '2021-04-15 05:19:38', '2021-04-15 05:19:38'),
(51, 13, 'Full Body Bleach', '0.00', '2021-04-15 05:19:38', '2021-04-15 05:19:38'),
(52, 13, 'Full Body Polish', '0.00', '2021-04-15 05:19:38', '2021-04-15 05:19:38'),
(53, 13, 'Full Body Scrub with Stone', '0.00', '2021-04-15 05:19:38', '2021-04-15 05:19:38'),
(54, 13, 'Full Body Massage (30 Min)', '0.00', '2021-04-15 05:19:38', '2021-04-15 05:19:38'),
(55, 13, 'Full Body Massage (60 Min)', '0.00', '2021-04-15 05:19:38', '2021-04-15 05:19:38'),
(56, 13, 'Back & Shoulder Massage', '0.00', '2021-04-15 05:19:38', '2021-04-15 05:19:38'),
(57, 13, 'Foot & Leg Massage (15 Min)', '0.00', '2021-04-15 05:19:38', '2021-04-15 05:19:38'),
(58, 13, 'Foot & Leg Massage (30 Min)', '0.00', '2021-04-15 05:19:38', '2021-04-15 05:19:38'),
(59, 13, 'Face & Neck Massage (15 Min)', '0.00', '2021-04-15 05:19:38', '2021-04-15 05:19:38'),
(60, 13, 'Face & Neck Massage (30 Min)', '0.00', '2021-04-15 05:19:38', '2021-04-15 05:19:38'),
(61, 14, 'Hair Wash', '0.00', '2021-04-15 05:37:59', '2021-04-15 05:37:59'),
(62, 14, 'Hair Wash with Blow Dry', '0.00', '2021-04-15 05:37:59', '2021-04-15 05:37:59'),
(63, 14, 'Hair Cut', '0.00', '2021-04-15 05:37:59', '2021-04-15 05:37:59'),
(64, 14, 'Hot Oil Massage', '0.00', '2021-04-15 05:37:59', '2021-04-15 05:37:59'),
(65, 14, 'Hair Spa', '0.00', '2021-04-15 05:37:59', '2021-04-15 05:37:59'),
(66, 14, 'Keratin Starting', '0.00', '2021-04-15 05:37:59', '2021-04-15 05:37:59'),
(67, 14, 'Protein Starting', '0.00', '2021-04-15 05:37:59', '2021-04-15 05:37:59'),
(68, 14, 'Botox Starting', '0.00', '2021-04-15 05:37:59', '2021-04-15 05:37:59'),
(69, 14, 'Roots Touch', '0.00', '2021-04-15 05:37:59', '2021-04-15 05:37:59'),
(70, 14, 'Full Hair Coloring Starting', '0.00', '2021-04-15 05:37:59', '2021-04-15 05:37:59'),
(71, 14, 'Cellophane Hair Treatment', '0.00', '2021-04-15 05:37:59', '2021-04-15 05:37:59'),
(72, 14, 'Crown Highlight', '0.00', '2021-04-15 05:37:59', '2021-04-15 05:37:59'),
(73, 14, 'Full Highlight Starting', '0.00', '2021-04-15 05:37:59', '2021-04-15 05:37:59'),
(74, 14, 'Blow Dry', '0.00', '2021-04-15 05:37:59', '2021-04-15 05:37:59'),
(75, 15, 'Full Body Waxing', '0.00', '2021-04-15 05:50:21', '2021-04-15 05:50:21'),
(76, 15, 'Full Face Waxing', '0.00', '2021-04-15 05:50:21', '2021-04-15 05:50:21'),
(77, 15, 'Full Bikini Waxing', '0.00', '2021-04-15 05:50:21', '2021-04-15 05:50:21'),
(78, 15, 'Full Legs Waxing', '0.00', '2021-04-15 05:50:21', '2021-04-15 05:50:21'),
(79, 15, 'Full Arms Waxing', '0.00', '2021-04-15 05:50:21', '2021-04-15 05:50:21'),
(80, 15, 'Under Arm Waxing', '0.00', '2021-04-15 05:50:21', '2021-04-15 05:50:21'),
(81, 15, 'Half Leg Waxing', '0.00', '2021-04-15 05:50:21', '2021-04-15 05:50:21'),
(82, 15, 'Half Hands Waxing', '0.00', '2021-04-15 05:50:21', '2021-04-15 05:50:21'),
(83, 15, 'Chest Waxing', '0.00', '2021-04-15 05:50:21', '2021-04-15 05:50:21'),
(84, 15, 'Stomach Waxing', '0.00', '2021-04-15 05:50:21', '2021-04-15 05:50:21'),
(85, 15, 'Back Waxing', '0.00', '2021-04-15 05:50:22', '2021-04-15 05:50:22'),
(86, 15, 'Upper Lips Waxing', '0.00', '2021-04-15 05:50:22', '2021-04-15 05:50:22'),
(87, 15, 'Side Lock Waxing', '0.00', '2021-04-15 05:50:22', '2021-04-15 05:50:22'),
(88, 15, 'Forehead Waxing', '0.00', '2021-04-15 05:50:22', '2021-04-15 05:50:22');

-- --------------------------------------------------------

--
-- Table structure for table `select_values`
--

CREATE TABLE `select_values` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `field_id` bigint(20) UNSIGNED NOT NULL,
  `option_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `select_with_charge_values`
--

CREATE TABLE `select_with_charge_values` (
  `id` bigint(20) NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `field_id` bigint(20) UNSIGNED NOT NULL,
  `option_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `priority` int(255) DEFAULT NULL,
  `service_category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `terms_and_conditions` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whats_included` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'on',
  `trending` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'off',
  `min_service_charge` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quotable_service` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `priority`, `service_category_id`, `name`, `slug`, `image`, `short_description`, `terms_and_conditions`, `whats_included`, `feature`, `trending`, `min_service_charge`, `quotable_service`, `created_at`, `updated_at`) VALUES
(43, NULL, 55, 'Bathroom Cleaning Services', 'bathroom-cleaning-services', '1603021397Bathroom-Cleaning-Services.jpg', '<p>When it comes to&nbsp;Bathroom cleaning services in Dubai. Not to mention you can count on GGG&nbsp;Cleaning Service for the spotless&nbsp;Bathroom cleaning. Our professional cleaners take care of the stress and clean the most frequently and cleaning the room that is the Bathroom without hassle and to make in shine and clear in no time.</p>', '<p>Our Terms &amp; Conditions</p>', '<p>Its include all bathroom cleaning service</p>', 'off', 'off', '200', 0, '2020-10-18 16:43:17', '2021-04-03 14:31:40'),
(45, 5, 55, 'Sofa Cleaning Services', 'sofa-cleaning-services', '1603021687sofa.jpg', '<p>GGG Service offers a unique carbonating-cleaning process that provides clean and dry upholstery&nbsp;in hours instead of days. We offer best and professional sofa cleaning in Dubai. Our upholstery furniture cleaning services are strong enough to clean the deepest stains, gentle enough not to damage furniture and safe for your entire family.</p>', '<p>Our Terms &amp; Conditions</p>', '<p>Its include sofa cleaning</p>', 'on', 'off', NULL, 0, '2020-10-18 16:48:07', '2021-06-19 16:18:23'),
(46, NULL, 45, 'Plumbing', 'plumbing', '1603021926plumbing.jpg', '<p>Our&nbsp; plumbers are known across Dubai for providing a phenomenal level of customer service for Residential and commercial units&nbsp; . &nbsp;GGG Service plumbers are committed to providing 100% customer satisfied service with the highest standards of quality and care. We only use the best equipment and each one of our plumbers are equipped with the latest tools&nbsp;and technology to ensure that our plumbers are able to get the job done right the first time.</p>', NULL, NULL, 'on', 'off', NULL, 0, '2020-10-18 16:52:06', '2021-05-02 01:13:41'),
(47, NULL, 45, 'Carpentery', 'carpentery', '1603022016carpentrywork.jpg', '<p>Our group specialises in all carpentry and construction works, such as floorboards, framing, roofing, eves and gutters, pergolas, kitchens, wardrobes, cupboards, door installation, skirting, garages, carports, fencing, window installation and much more.&nbsp;</p>\r\n<p>Please feel free to contact us for a no obligation free quote via the phone or email if you wish to hire a carpenter for your project. We are available for an onsite quote at no cost to you.GET A FREE QUOTE</p>', NULL, NULL, 'off', 'off', NULL, 0, '2020-10-18 16:53:36', '2021-04-03 14:33:19'),
(48, NULL, 45, 'Electrical Work', 'electrical-work', '1603022116electricboard.jpg', '<p>Electrical installation projects can already be stressful, but it will be more troublesome to handle especially when they are not done correctly. As homes usually have plenty of&nbsp;electrical&nbsp;appliances and electrical fixtures, you&rsquo;re better off having them installed correctly in order to avoid future problems.</p>\r\n\r\n<p>At Service On Us , we help you handle any electrical services from electrical installations of lighting fixtures to hanging lights to installation and repair of water heaters. We can take care of your electrical installation projects for a new home or business renovation. No matter what your needs are, we are confident of providing you with affordable pricing and timely electrical installation services.</p>', NULL, NULL, 'on', 'on', '200', 0, '2020-10-18 16:55:16', '2021-06-01 21:44:13'),
(54, NULL, 41, 'Hair', 'hair', '1603023410hair.jpg', '<p>The best hair salon in Dubai is the one that comes to your doorstep. We do just that. Qualified hairdressers and stylists will turn your hair into an artwork of beauty&mdash;all from the comfort of your own home. Whether you are in need of a wash and blow dry, a simple trim, or an entirely new hairstyle, our mobile hair salon will deliver. Naturally, we also offer coloring and highlights.</p>', NULL, NULL, 'on', 'off', NULL, 0, '2020-10-18 17:16:50', '2020-10-18 17:16:50'),
(57, NULL, 41, 'Massage', 'massage', '1603188113message.jpg', '<p>A massage is one of the oldest, yet incredibly unique therapies that exist today. It&rsquo;s not very common to find an activity that is therapeutic and relaxing at the same time.</p>', NULL, NULL, 'on', 'off', NULL, 0, '2020-10-20 15:01:53', '2020-10-20 15:01:53'),
(60, NULL, 46, 'Car Maintenance', 'car-maintenance', '1611897023CAR.jpg', '<p>Car maintenance</p>', NULL, NULL, 'on', 'off', NULL, 0, '2021-01-28 23:25:23', '2021-01-28 23:25:23'),
(61, NULL, 49, 'Business Cards', 'business-cards', '1613295610businesscard.jpg', '<p>Business cards are cards bearing business information about a company or individual.&nbsp;</p>', '<p>Admin terms and conditions</p>', '<p>Whats included by admin</p>', 'on', 'on', NULL, 0, '2021-02-14 15:40:10', '2021-03-08 02:18:36'),
(63, NULL, 22, 'Test Service', 'test-service', '1616633400img2.jpg', '<p>Servce description</p>', '<p>Terms $condition</p>', '<p>hghhjmh</p>', 'off', 'off', '5000', 0, '2021-03-16 05:00:31', '2021-06-01 21:28:38'),
(64, NULL, 38, 'Insurance Policy', 'insurance-policy', '1616633379default logo.jpg', '<p>Descrip</p>', '<p>confit</p>', '<p>nchulkd</p>', 'on', 'off', '200', 1, '2021-03-18 02:25:42', '2021-06-12 16:30:51'),
(65, NULL, 54, 'General Pest Control', 'general-pest-control', '1622563848pest-control.jpg', '<p>To protect you and your family from some of the common pests like ants, bed bugs, cockroaches, and rats, serviceonus offers various&nbsp;<em>pest control</em>&nbsp;service</p>', '<p>Our terms and conditions</p>', '<p>We uses best euipment&nbsp; and have best pest control</p>', 'off', 'off', '200', 1, '2021-03-30 05:07:38', '2021-06-12 19:10:48'),
(68, 1, 55, 'Home Cleaning', 'home-cleaning', '1617477532Home cleaning.jpg', '<p>Home cleaning service</p>', '<p>Our terms &amp; Conditions</p>', '<p>Its include</p>', 'on', 'off', '200', 0, '2021-04-03 13:33:52', '2021-06-16 07:16:04'),
(69, 2, 55, 'Office Cleaning', 'office-cleaning', '1617478768office_leaning.jpg', '<p>Service Description</p>', '<p>Terms &amp; Conditions</p>', '<p>It include all office clening service</p>', 'on', 'off', '300', 0, '2021-04-03 13:54:28', '2021-06-19 16:16:53'),
(70, NULL, 45, 'Repairing Device or Appliance', 'repairing-device-or-appliance', '1617481306repair.jpg', '<p>Service&nbsp; Description</p>', '<p>Terms and Conditions</p>', '<p>It include ...</p>', 'on', 'off', '50', 0, '2021-04-03 14:36:46', '2021-04-03 14:36:46'),
(71, NULL, 45, 'Installation Devices', 'installation-devices', '1617482840installation.png', '<p>Service Desciption</p>', '<p>Our terms and conditions</p>', '<p>It included...</p>', 'on', 'off', '50', 0, '2021-04-03 15:02:20', '2021-06-12 15:02:54'),
(72, NULL, 54, 'Pest Control', 'pest-control', '1617599108pestcontro;.jpg', '<p>The General&nbsp;<em>pest control service</em>&nbsp;includes spraying pesticide in the entire premises and surroundings where&nbsp;<em>pests</em>&nbsp;thrive in the places such as Bathroom , Kitchen, Pantries, Drainage, Toilets, and other vulnerable areas.</p>', '<p>Our terms and conditions</p>', '<p>We use organic chemicals which is hazard free and we have over the years debunked the common myth which is often associated with pests that they are harmless during the winter season as they go for hibernation which is not true. Insectile pests such as Cockroaches give birth during the winter season and they pose a serious threat to people and during this season our services are in even higher demand.</p>', 'on', 'off', '300', 0, '2021-04-04 23:20:08', '2021-06-12 17:20:08'),
(74, NULL, 41, 'Skin Care', 'skin-care', '1618481822skin_care.jpg', '<p>Skin care service</p>', '<p>Our terms and conditions</p>', '<p>Included......</p>', 'on', 'off', '23.00', 0, '2021-04-15 04:32:02', '2021-04-15 04:32:02'),
(75, NULL, 41, 'Threading', 'threading', '1618482321thread.jpg', '<p>Threading Service</p>', '<p>Our terms and conditions</p>', '<p>Included.....</p>', 'on', 'off', '20.00', 0, '2021-04-15 04:40:21', '2021-04-15 04:40:21'),
(76, NULL, 41, 'Body Care', 'body-care', '1618482766body_care.jpg', '<p>Service Description</p>', '<p>Terms and conditions</p>', '<p>Included...</p>', 'on', 'off', '40', 0, '2021-04-15 04:47:46', '2021-04-15 04:47:46'),
(77, NULL, 41, 'Hair Care', 'hair-care', '1618485472hair_care.jpg', '<p>Hair Care Service</p>', '<p>Our terms and conditions</p>', '<p>Included......</p>', 'on', 'off', '20', 0, '2021-04-15 05:32:52', '2021-04-15 05:32:52'),
(78, NULL, 41, 'Waxing', 'waxing', '1618486321wax.jpg', '<p>Waxing Service</p>', '<p>Our terms and conditions</p>', '<p>Included.....</p>', 'on', 'off', '20', 0, '2021-04-15 05:47:01', '2021-04-15 05:47:01'),
(80, NULL, 45, 'AC Maintenance', 'ac-maintenance', '1619604407acmaintainace.jpg', '<p>Service Description</p>', '<p>Our Terms and conditions</p>', '<p>This service&nbsp; included</p>', 'on', 'off', '100', 1, '2021-04-28 04:21:47', '2021-06-12 15:03:39'),
(81, NULL, 46, 'Electrical Services', 'electrical-services', '1619605161electrical.jpg', '<p>Service Description</p>', '<p>Our terms and conditions</p>', '<p>Included....</p>', 'on', 'off', '100', 1, '2021-04-28 04:34:21', '2021-04-28 04:34:21'),
(82, NULL, 22, 'Events & Catering', 'events-catering', '1619674287catering.png', '<p>Service Description</p>', '<p>Our&nbsp; terms and conditions</p>', '<p>Included....</p>', 'on', 'off', '100', 1, '2021-04-28 23:46:27', '2021-04-28 23:46:27'),
(83, 4, 55, 'Mattress Cleaning', 'mattress-cleaning', '1619677366mat.jpg', '<p>Service Description</p>', '<p>Our terms and conditions</p>', '<p>Included....</p>', 'on', 'off', '100', 0, '2021-04-29 00:37:46', '2021-06-19 16:18:07'),
(84, 3, 55, 'Deep Cleaning', 'deep-cleaning', '1619760991deep.jpg', '<p>We are a cutting-edge technology company, which focuses on disinfection solutions&nbsp;<em>services</em>. Eliminates up to 99.99% of microorganisms, viruses, bacteria, fungi, algae and spores.</p>', '<p>Our Terms and conditions</p>', '<p>We are a cutting-edge technology company, which focuses on disinfection solutions&nbsp;<em>services</em>. Eliminates up to 99.99% of microorganisms, viruses, bacteria, fungi, algae and spores.</p>', 'on', 'off', '100', 1, '2021-04-29 23:51:31', '2021-06-19 16:18:01'),
(85, NULL, 54, 'Sanitization', 'sanitization', '1619765664sanitization.png', '<p>Call a professional virus disinfection company today. Our experts are trained to follow CDC guidelines to get the job done quickly.&nbsp;<em>Services</em>: Basements, Kitchens, Bathrooms, Attics, Offices, Buildings.</p>', '<p>Our terms and conditins</p>', '<p>Call a professional virus disinfection company today. Our experts are trained to follow CDC guidelines to get the job done quickly.&nbsp;<em>Services</em>: Basements, Kitchens, Bathrooms, Attics, Offices, Buildings.</p>', 'on', 'off', '100', 1, '2021-04-30 01:09:24', '2021-06-01 21:41:34'),
(86, NULL, 45, 'Painting', 'painting', '1619883835paiting.jpg', '<p>Now you can enjoy a very good quality&nbsp;<em>Paint</em>&nbsp;By Number kits with a very good price. You can find any image you want on our website. Great Quallity. Money Back Guaranteed.Now you can enjoy a very good quality&nbsp;<em>Paint</em>&nbsp;By Number kits with a very good price. You can find any image you want on our website. Great Quallity. Money Back Guaranteed.</p>', '<p>Our terms and conditions</p>', '<p>Now you can enjoy a very good quality&nbsp;<em>Paint</em>&nbsp;By Number kits with a very good price. You can find any image you want on our website. Great Quallity. Money Back Guaranteed.</p>', 'on', 'off', '100', 1, '2021-04-30 15:01:47', '2021-05-01 09:58:55'),
(88, NULL, 45, 'AC Cleaning', 'ac-cleaning', '1619884550clean.jpg', '<p><em>Clean</em>&nbsp;or replace your&nbsp;<em>air conditioning</em>&nbsp;system&#39;s filter or filters every month or two during the cooling season.</p>', '<p>Our terms and conditions</p>', '<p><em>Clean</em>&nbsp;or replace your&nbsp;<em>air conditioning</em>&nbsp;system&#39;s filter or filters every month or two during the cooling season.</p>', 'on', 'off', '100', 1, '2021-05-01 10:10:50', '2021-05-02 01:12:53'),
(89, NULL, 45, 'Carpentry', 'carpentry', '1619940412carpentry.jpg', '<p><strong><strong>Carpentry Services</strong></strong></p>\r\n\r\n<ul>\r\n	<li>Interior and exterior door installation or replacement.</li>\r\n	<li>Interior and exterior trim installation or replacement.</li>\r\n	<li>Base trim and crown molding installation.</li>\r\n	<li>Beadboard and wainscoting installation.</li>\r\n	<li>Adding pet doors and storm doors.</li>\r\n	<li>Complete cabinet repairs or replacement.</li>\r\n	<li>Window installation or replacement.</li>\r\n</ul>', '<p>Terms and conditions</p>', '<p>Included...</p>', 'off', 'off', '100', 1, '2021-05-02 01:41:52', '2021-06-01 21:02:17'),
(90, NULL, 49, 'Flyer', 'flyer', '1619942922flyer.jpg', '<p>Service Description...........</p>', '<p>Our terms and conditions</p>', '<p>Included...</p>', 'on', 'off', '100', 1, '2021-05-02 02:23:42', '2021-06-01 21:02:16'),
(91, NULL, 49, 'Letterhead', 'letterhead', '1619943380letterhead.jpg', '<p>Service Description</p>', '<p>Our terms and conditions</p>', '<p>Included...</p>', 'on', 'off', '100', 1, '2021-05-02 02:31:20', '2021-05-26 00:43:40'),
(92, NULL, 22, 'Photo Studios or Photographers', 'photo-studios-or-photographers', '1619944278photo.jpg', '<p>A&nbsp;<em>photographic studio</em>&nbsp;is often a business owned and represented by one or more&nbsp;<em>photographers</em>, possibly accompanied by assistants and pupils</p>', '<p>Our terms and conditions</p>', '<p>A&nbsp;<em>photographic studio</em>&nbsp;is often a business owned and represented by one or more&nbsp;<em>photographers</em>, possibly accompanied by assistants and pupils</p>', 'on', 'off', '100', 1, '2021-05-02 02:46:18', '2021-05-05 21:47:51'),
(93, NULL, 56, 'Auto Repair', 'auto-repair', '1622012532auto-repair.jpg', '<p>An&nbsp;<em>automobile repair</em>&nbsp;shop is an establishment where automobiles are repaired by&nbsp;<em>auto mechanics</em>&nbsp;and technicians.</p>', '<p>Terms &amp; Conditions&nbsp;</p>', '<p>Included</p>', 'on', 'off', '100', 1, '2021-05-26 01:17:12', '2021-06-01 21:52:04'),
(94, NULL, 56, 'Auto Service', 'auto-service', '1622017796suto-service.jpg', '<p>A&nbsp;<strong>car service</strong>&nbsp;is a maintenance check-up that&#39;s carried out at set time intervals (at least every year) or after the&nbsp;<strong>vehicle</strong>&nbsp;has travelled a certain number of miles. The&nbsp;<strong>car</strong>&nbsp;manufacturer specifies the&nbsp;<strong>service</strong>&nbsp;intervals by creating a&nbsp;<strong>service</strong>&nbsp;schedule that you should aim to follow.</p>\r\n\r\n<p>From oil changes to new tires, we offer&nbsp;<em>services</em>&nbsp;and products to help keep your&nbsp;<em>vehicle</em>&nbsp;going strong.</p>', '<p>Our terms &amp; Conditions</p>', '<p>Included</p>', 'on', 'off', '100', 1, '2021-05-26 02:44:56', '2021-06-01 21:52:03'),
(95, NULL, 56, 'Road Side Assistance', 'road-side-assistance', '1622021829road-assistance.jpg', '<p><strong>Roadside assistance</strong>&nbsp;and&nbsp;<strong>breakdown coverage</strong>&nbsp;are services that assist motorists, or bicyclists, whose vehicles have suffered a mechanical failure that leaves the operator stranded.</p>', '<p>Our terms and condition</p>', '<p>Included</p>', 'on', 'off', '100', 1, '2021-05-26 03:52:09', '2021-06-01 21:52:02'),
(96, NULL, 56, 'Mobile Services', 'mobile-services', '1622024028mobile-service.jpg', '<p>Wrench offers a convenient way to get great&nbsp;<em>auto</em>&nbsp;repair near me, diagnostic&nbsp;<em>service</em>&nbsp;and oil changes. Our&nbsp;<em>mobile</em>&nbsp;mechanics will come to you!</p>\r\n\r\n<p>Lube&nbsp;<em>Mobile</em>&nbsp;mechanic&nbsp;<em>services</em>&nbsp;are a convenient way to keep your motor running at peak performance and save on precious time.</p>', '<p>Terms &amp; Conditions</p>', '<p>Included</p>', 'on', 'off', '100', 1, '2021-05-26 04:28:48', '2021-06-01 21:52:01'),
(97, NULL, 56, 'Diagnostics', 'diagnostics', '1622026657diagno.png', '<p><em>Diagnostic</em>&nbsp;technologies enable the access to ECUs in the vehicle. Standards like ODX, OTX, MVCI, UDS, KWP200, J1939 and SAE will be used.</p>\r\n\r\n<p>&nbsp;</p>', '<p>Our Terms &amp; Conditions</p>', '<p>Included</p>', 'on', 'off', '100', 1, '2021-05-26 05:12:37', '2021-06-01 21:52:01'),
(98, NULL, 56, 'Car Wash', 'car-wash', '1622028439car-wash.png', '<p>A&nbsp;<strong>car wash&nbsp;</strong>or&nbsp;<strong>auto wash</strong>&nbsp;is a facility used to clean the exterior&nbsp;&nbsp;and, in some cases, the interior of&nbsp;<a href=\"https://en.wikipedia.org/wiki/Motor_vehicle\">motor vehicles</a>. Car washes can be self-serve, fully automated, or full-service with attendants who wash the vehicle.</p>\r\n\r\n<p>Car washes may also be events where people pay to have their cars washed by volunteers as a method to raise money for some purpose.</p>', '<p>Our terms and conditions</p>', '<p>included</p>', 'on', 'off', '100', 1, '2021-05-26 05:42:19', '2021-05-26 05:42:19');

-- --------------------------------------------------------

--
-- Table structure for table `service_categories`
--

CREATE TABLE `service_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_text` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `parent` tinyint(1) NOT NULL DEFAULT 0,
  `priority` int(11) DEFAULT NULL,
  `feature` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'on',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_categories`
--

INSERT INTO `service_categories` (`id`, `name`, `sub_text`, `slug`, `image`, `parent_id`, `parent`, `priority`, `feature`, `created_at`, `updated_at`) VALUES
(22, 'Events & Catering', 'Celebrated in gracious settings among family and friends.', 'events-and-catering-', '15946630844.png', NULL, 0, 11, 'on', '2020-07-13 12:13:04', '2020-08-07 02:44:05'),
(35, 'Pet Care', NULL, 'pet-care', '1594833617pet.jpg', NULL, 0, 23, 'off', '2020-07-15 11:35:17', '2021-06-01 21:38:19'),
(37, 'Home', 'Amazing Things Are Happening Here.', 'home', '1596787722homeservice.jpg', NULL, 0, 5, 'on', '2020-08-07 02:23:42', '2020-08-07 02:24:21'),
(38, 'Insurance', NULL, 'insurance', '1596787823insure.jpg', NULL, 0, 6, 'off', '2020-08-07 02:25:23', '2020-08-07 02:25:23'),
(39, 'Moving & Storage', ' When the occasion calls for moving, call Us.', 'moving-and-storage', '1596787932moving.jpg', NULL, 0, 7, 'on', '2020-08-07 02:27:12', '2021-06-01 21:05:32'),
(41, 'Beauty & Skin Care Services', 'Because being beautiful should never harm you.', 'beauty-and-skin-care-services', '1596788255beauty.jpg', NULL, 0, 9, 'on', '2020-08-07 02:32:35', '2021-06-01 21:48:40'),
(45, 'Painting & Handyman', NULL, 'painting-and-handyman', '1597574055david-pisnoy-46juD4zY1XA-unsplash.jpg', NULL, 0, 3, 'on', '2020-08-16 04:49:15', '2021-06-01 21:38:33'),
(46, 'Electrician', NULL, 'electrician', '1601897257elc.png', NULL, 0, 13, 'off', '2020-09-20 06:32:09', '2021-06-01 21:04:21'),
(49, 'Printing & Publishing Services', NULL, 'printing-and-publishing-services', '1612913630Best-Printing-Services.png', NULL, 0, 4, 'on', '2021-02-10 05:33:50', '2021-06-01 21:36:19'),
(54, 'Disinfection & Pest Control', NULL, 'disinfection-and-pest-control', '1617101183garden.jpg', NULL, 0, 2, 'on', '2021-03-30 05:01:23', '2021-06-04 03:43:51'),
(55, 'Cleaning Service', NULL, 'cleaning-service', '1617101888cleaningservice.jpg', NULL, 0, 1, 'on', '2021-03-30 05:13:08', '2021-06-04 03:42:41'),
(56, 'Auto Care Services', NULL, 'auto-care-services', '1622011977auto-care.png', NULL, 0, 20, 'on', '2021-05-26 01:07:57', '2021-06-01 21:49:33');

-- --------------------------------------------------------

--
-- Table structure for table `service_enquiries`
--

CREATE TABLE `service_enquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phn_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `looking_for` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_enquiries`
--

INSERT INTO `service_enquiries` (`id`, `name`, `email`, `phn_no`, `company_name`, `from`, `looking_for`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Garrett Lowe', 'zurum@mailinator.com', '+1 (387) 944-5609', 'Waters and Baxter Traders', 'Jeddah', 'Pet Care', 'Exercitationem cupid', '2020-07-21 12:05:16', '2020-07-21 12:05:16'),
(2, 'Steel Walton', 'cumib@mailinator.com', '+1 (216) 145-5767', 'Lara Russo Plc', 'Dubai', 'Pet Care', 'Qui eu proident ten', '2020-07-21 12:06:33', '2020-07-21 12:06:33'),
(3, 'Kellie Bradford', 'vacati@mailinator.com', '+1 (124) 432-2802', 'Hodges Cain Co', 'Abu Dubai', 'Home Care', 'Fuga Facere omnis e', '2020-07-21 12:07:24', '2020-07-21 12:07:24'),
(4, 'Neville Pitts', 'petibojo@mailinator.com', '+1 (186) 159-5478', 'Stuart Cantrell Associates', 'Muscat', 'Electronic Services and Repair', 'Eligendi magnam offi', '2020-07-21 12:11:17', '2020-07-21 12:11:17'),
(5, 'Latifah Parker', 'kewaqy@mailinator.com', '+1 (611) 549-9226', 'Porter and Raymond Inc', 'Riyadh', 'Electronic Services and Repair', 'Sequi nemo dicta ut', '2020-07-21 12:12:30', '2020-07-21 12:12:30'),
(6, 'Delilah Parsons', 'senusihun@mailinator.com', '+1 (316) 403-5597', 'Turner and Wiley LLC', 'Riyadh', 'Home Care', 'Consequatur volupta', '2020-07-21 12:17:21', '2020-07-21 12:17:21'),
(7, 'Terra Lira', 'info@gggservices.com', '0950-8950001', 'Terra Lira', 'Kuwait', 'Painting &amp; Handyman', 'Hey there\r\n\r\nBe Buzz Free! The Original Mosquito Trap.\r\n60% OFF for the next 24 Hours ONLY + FREE Worldwide Shipping\r\n\r\n✔️LED Bionic Wave Technology\r\n✔️Eco-Friendly\r\n✔️15 Day Money-Back Guarantee\r\n\r\nShop Now: mosquitotrap.online\r\n\r\nSincerely,\r\n\r\nGGG Services', '2020-09-26 11:48:43', '2020-09-26 11:48:43');

-- --------------------------------------------------------

--
-- Table structure for table `service_provider_details`
--

CREATE TABLE `service_provider_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `number_of_employ` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_person` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_provider_details`
--

INSERT INTO `service_provider_details` (`id`, `user_id`, `number_of_employ`, `contact_person`, `contact_number`, `website`, `message`, `created_at`, `updated_at`) VALUES
(40, 131, '1-10', 'Dev Gautam', '551570656', 'https://www.trustgenic.com/', 'Lets do the best business', '2021-05-04 23:52:22', '2021-05-04 23:52:22'),
(41, 138, '1-10', 'Rahul Jaisi', '0559323087', 'https://www.longvisionuae.com/', NULL, '2021-06-03 14:02:17', '2021-06-03 14:02:17'),
(43, 145, '1-10', 'Sita G', '559323087', 'www.beautiful.com', NULL, '2021-06-15 22:13:44', '2021-06-15 22:13:44');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `image`, `title`, `created_at`, `updated_at`) VALUES
(1, '15954393283298067-png.png', 'What we Do ?', NULL, '2020-09-30 18:21:21');

-- --------------------------------------------------------

--
-- Table structure for table `slider_texts`
--

CREATE TABLE `slider_texts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slider_texts`
--

INSERT INTO `slider_texts` (`id`, `text`, `created_at`, `updated_at`) VALUES
(1, 'House Cleaning', NULL, '2020-09-30 18:20:38'),
(2, 'Beauty Services', NULL, '2020-09-30 18:20:38'),
(3, 'Laundry Services', NULL, '2020-09-30 18:21:21');

-- --------------------------------------------------------

--
-- Table structure for table `subscribeplan_user`
--

CREATE TABLE `subscribeplan_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `subscribplan_id` bigint(20) UNSIGNED NOT NULL,
  `active_from_date` date DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'off',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscribplans`
--

CREATE TABLE `subscribplans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribplans`
--

INSERT INTO `subscribplans` (`id`, `name`, `slug`, `price`, `description`, `created_at`, `updated_at`) VALUES
(1, 'One Month Plan', 'one-month-plan', '150.00', '<p>Subscription plan description plan for one month.</p>', '2021-03-08 17:14:51', '2021-03-09 01:25:34'),
(2, 'Annual Plan', 'annual-plan', '1000.00', '<p>Annual Subscription plan .</p>', '2021-03-08 17:15:27', '2021-03-09 01:24:34');

-- --------------------------------------------------------

--
-- Table structure for table `subscribtion_plans`
--

CREATE TABLE `subscribtion_plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `image`, `title`, `description`, `created_at`, `updated_at`) VALUES
(2, 'Sofiya', '1595336919michael-dam-mEZ3PoFGs_k-unsplash-min.jpg', 'Excellence Service', '<p>Storage keys team was very professional and great job done, have taken super care and been very polite and nice did not see the time and was focused on their task. I highly recommend them a great job.</p>', '2020-07-21 07:23:39', '2020-10-20 17:22:03'),
(3, 'Saurav', '1595336957marius-ciocirlan-vMV6r4VRhJ8-unsplash-min.jpg', 'Excellence Service', '<p>Storage keys team was very professional and great job done, have taken super care and been very polite and nice did not see the time and was focused on their task. I highly recommend them a great job.</p>', '2020-07-21 07:24:17', '2020-10-20 17:22:29');

-- --------------------------------------------------------

--
-- Table structure for table `textarea_fields`
--

CREATE TABLE `textarea_fields` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `label_for_form` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label_for_invoice` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `textarea_fields`
--

INSERT INTO `textarea_fields` (`id`, `service_id`, `label_for_form`, `label_for_invoice`, `created_at`, `updated_at`) VALUES
(3, 57, 'Any Comments', 'Comments', '2021-01-13 05:01:56', '2021-01-13 05:01:56'),
(9, 60, 'Any Comment', 'Comment', '2021-01-28 23:41:39', '2021-01-28 23:41:39'),
(10, 60, 'Any special instructions', 'Special Instructions', '2021-01-28 23:41:39', '2021-01-28 23:41:39'),
(11, 61, 'Any special  additional details ?', 'Additional Details', '2021-02-14 15:44:53', '2021-02-14 15:44:53'),
(12, 63, 'Any Comment', 'Comment', '2021-03-16 05:01:00', '2021-03-16 05:01:00'),
(13, 64, 'Any special instructions', 'Special Requirements', '2021-03-18 02:26:24', '2021-03-18 02:26:24'),
(14, 65, 'Please describe the job in as much detail as possible', 'Describtion for service', '2021-03-30 05:27:50', '2021-03-30 05:27:50'),
(17, 70, 'Write about the problem with your device or Appliance', 'Problem with your device or Appliance', '2021-04-03 14:53:34', '2021-04-03 14:53:34'),
(18, 70, 'Your comment on issues', 'Your comment on issues', '2021-04-03 14:54:13', '2021-04-03 14:54:13'),
(19, 71, 'You may write about the problem with your device or Appliance.', 'Problem with  device or Appliance', '2021-04-03 15:04:49', '2021-04-03 15:04:49'),
(20, 71, 'Any special instructions or additional details', 'Comment', '2021-04-03 15:05:13', '2021-04-03 15:05:13'),
(21, 74, 'Any special instructions or additional details', 'Any special instructions or additional details', '2021-04-15 04:35:42', '2021-04-15 04:35:42'),
(22, 75, 'Any special instructions or additional details', 'Any special instructions or additional details', '2021-04-15 04:42:21', '2021-04-15 04:42:21'),
(23, 76, 'Any special instructions or additional details', 'Any special instructions or additional details', '2021-04-15 05:19:38', '2021-04-15 05:19:38'),
(24, 77, 'Any special instructions or additional details', 'Any special instructions or additional details', '2021-04-15 05:37:59', '2021-04-15 05:37:59'),
(25, 78, 'Any special instructions or additional details', 'Any special instructions or additional details', '2021-04-15 05:50:22', '2021-04-15 05:50:22'),
(27, 80, 'What kind of problem you are experiencing ?', 'Problem Detail', '2021-04-28 04:26:34', '2021-04-28 04:26:34'),
(28, 80, 'Any special instructions or additional details?', 'Special Instructions', '2021-04-28 04:26:34', '2021-04-28 04:26:34'),
(29, 81, 'Any special instructions or additional details', 'Comment', '2021-04-28 04:43:53', '2021-04-28 04:43:53'),
(30, 82, 'Do you have any special requirements?', 'Special Requirements', '2021-04-28 23:50:31', '2021-04-28 23:50:31'),
(31, 88, 'Any special instructions or additional details ?', 'Special instructions', '2021-05-01 10:52:16', '2021-05-01 10:52:16'),
(32, 46, 'Any special Instrustions or Additional details', 'Any special Instrustions or Additional details', '2021-05-02 01:24:43', '2021-05-02 01:24:43'),
(33, 89, 'Any special Instrustions or Additional details', 'Any special Instrustions or Additional details', '2021-05-02 01:56:08', '2021-05-02 01:56:08'),
(34, 92, 'Do you have any special instructions or additional detail?', 'Comments or Any Special Instruction', '2021-05-02 03:00:08', '2021-05-02 03:00:08'),
(35, 91, 'Do You have any additional Requiremnets ?', 'Additional Details', '2021-05-26 00:43:32', '2021-05-26 00:43:32'),
(36, 93, 'Enter Description', 'Description', '2021-05-26 02:09:59', '2021-05-26 02:09:59'),
(37, 94, 'Enter Description', 'Enter Description', '2021-05-26 02:49:26', '2021-05-26 02:49:26'),
(38, 95, 'Enter Description', 'Description', '2021-05-26 03:55:32', '2021-05-26 03:55:32'),
(39, 96, 'Enter Description', 'Enter Description', '2021-05-26 04:56:37', '2021-05-26 04:56:37'),
(40, 97, 'Enter Description', 'Enter Description', '2021-05-26 05:19:47', '2021-05-26 05:19:47'),
(41, 98, 'Description', 'Description', '2021-05-26 05:50:51', '2021-05-26 05:50:51'),
(42, 68, 'Any special instructions or additional details ?', 'Any special instructions or additional details', '2021-06-17 20:07:11', '2021-06-17 20:07:11'),
(43, 83, 'Any special instructions or additional details ?', 'Any special instructions or additional details', '2021-06-17 20:08:52', '2021-06-17 20:08:52'),
(44, 45, 'Any special instructions or additional details', 'Any special instructions or additional details', '2021-06-17 20:09:58', '2021-06-17 20:09:58'),
(45, 69, 'Any special instructions or additional details', 'Any special instructions or additional details', '2021-06-17 20:10:50', '2021-06-17 20:10:50');

-- --------------------------------------------------------

--
-- Table structure for table `textarea_values`
--

CREATE TABLE `textarea_values` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `field_id` bigint(20) UNSIGNED NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `text_fields`
--

CREATE TABLE `text_fields` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `label_for_form` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label_for_invoice` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `text_fields`
--

INSERT INTO `text_fields` (`id`, `service_id`, `label_for_form`, `label_for_invoice`, `created_at`, `updated_at`) VALUES
(6, 60, 'What is name Name ??', 'Name', '2021-01-28 23:41:39', '2021-01-28 23:41:39'),
(7, 63, 'What is expected no of guest ?', 'No of guest', '2021-03-17 00:57:15', '2021-03-17 00:57:15'),
(8, 65, 'What is the area of your garden ?', 'Area of garden', '2021-03-31 03:56:41', '2021-03-31 03:56:41'),
(9, 45, 'Number of Sofa’s', 'Number of Sofa’s', '2021-04-03 14:21:25', '2021-04-03 14:21:25'),
(10, 45, 'Total seats of the Sofas', 'Total seats of the Sofas', '2021-04-03 14:21:25', '2021-04-03 14:21:25'),
(11, 70, 'Brand of your device/Appliance', 'Brand of your device/Appliance', '2021-04-03 14:50:37', '2021-04-03 14:50:37'),
(12, 71, 'Brand of your device/Appliance', 'Brand of your device/Appliance', '2021-04-03 15:04:06', '2021-04-03 15:04:06'),
(15, 82, 'How many guests will attend this event?', 'Number of Guest', '2021-04-29 00:16:18', '2021-04-29 00:16:18'),
(16, 88, 'How many AC units do you want to clean?', 'Number of AC Units', '2021-05-01 10:52:16', '2021-05-01 10:52:16'),
(17, 93, 'Year', 'Year', '2021-05-26 02:09:59', '2021-05-26 02:09:59'),
(18, 93, 'Made in', 'Made in', '2021-05-26 02:13:36', '2021-05-26 02:13:36'),
(19, 93, 'Chassis / Vin Number:', 'Chassis / Vin Number:', '2021-05-26 02:15:41', '2021-05-26 02:15:41'),
(20, 94, 'Year', 'Year', '2021-05-26 02:49:26', '2021-05-26 02:49:26'),
(21, 94, 'Made in', 'Made in', '2021-05-26 03:20:13', '2021-05-26 03:20:13'),
(22, 94, 'Chassis / Vin Number', 'Chassis / Vin Number', '2021-05-26 03:21:41', '2021-05-26 03:21:41'),
(23, 95, 'Year', 'Year', '2021-05-26 03:55:32', '2021-05-26 03:55:32'),
(24, 95, 'Made in', 'Made in', '2021-05-26 04:13:43', '2021-05-26 04:13:43'),
(25, 95, 'Chassis / Vin Number', 'Chassis / Vin Number', '2021-05-26 04:16:03', '2021-05-26 04:16:03'),
(26, 96, 'Year', 'Year', '2021-05-26 04:34:05', '2021-05-26 04:34:05'),
(27, 96, 'Made in', 'Made in', '2021-05-26 04:56:37', '2021-05-26 04:56:37'),
(28, 96, 'Chassis / Vin Number', 'Chassis / Vin Number', '2021-05-26 05:00:25', '2021-05-26 05:00:25'),
(29, 97, 'Year', 'Year', '2021-05-26 05:19:47', '2021-05-26 05:19:47'),
(30, 97, 'Made in', 'Made in', '2021-05-26 05:33:34', '2021-05-26 05:33:34'),
(31, 97, 'Chassis / Vin Number', 'Chassis / Vin Number', '2021-05-26 05:34:44', '2021-05-26 05:34:44'),
(32, 98, 'Vehicle Make  (Please enter your vehicle make)', 'Vehicle Make', '2021-05-26 05:48:04', '2021-05-26 05:48:04'),
(33, 98, 'Plate code & number (Please insert your plate & code number. ex. H81965)', 'Plate code & number (Please insert your plate & code number. ex. H81965)', '2021-05-26 05:50:51', '2021-05-26 05:50:51');

-- --------------------------------------------------------

--
-- Table structure for table `text_values`
--

CREATE TABLE `text_values` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `field_id` bigint(20) UNSIGNED NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `time2_fields`
--

CREATE TABLE `time2_fields` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `label_for_form` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label_for_invoice` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `time2_fields`
--

INSERT INTO `time2_fields` (`id`, `service_id`, `label_for_form`, `label_for_invoice`, `created_at`, `updated_at`) VALUES
(2, 80, 'What time do you want service ?', 'Time for service', '2021-04-28 04:25:12', '2021-04-28 04:25:12'),
(3, 81, 'What time do you need the service?', 'Time for service', '2021-04-28 04:43:53', '2021-04-28 04:43:53'),
(4, 88, 'What time do you want service ?', 'Time for Service', '2021-05-01 10:54:14', '2021-05-01 10:54:14'),
(5, 46, 'What time do you want service ?', 'Time', '2021-05-02 00:58:18', '2021-05-02 00:58:18'),
(6, 89, 'What time do you want service ?', 'Time', '2021-05-02 01:55:42', '2021-05-02 01:55:42'),
(7, 92, 'What time do you want service ?', 'Time', '2021-05-02 03:00:36', '2021-05-02 03:00:36'),
(8, 68, 'Pick your time', 'Time', '2021-06-17 20:07:11', '2021-06-17 20:07:11'),
(9, 83, 'Pick your time', 'Time', '2021-06-17 20:08:52', '2021-06-17 20:08:52'),
(10, 45, 'Pick your time', 'Time', '2021-06-17 20:09:58', '2021-06-17 20:09:58'),
(11, 69, 'Pick your time', 'Time', '2021-06-17 20:10:50', '2021-06-17 20:10:50');

-- --------------------------------------------------------

--
-- Table structure for table `time2_values`
--

CREATE TABLE `time2_values` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `field_id` bigint(20) UNSIGNED NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `time_fields`
--

CREATE TABLE `time_fields` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `label_for_form` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label_for_invoice` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `time_fields`
--

INSERT INTO `time_fields` (`id`, `service_id`, `label_for_form`, `label_for_invoice`, `created_at`, `updated_at`) VALUES
(11, 57, 'Pick your time', 'Time', '2021-01-26 00:04:49', '2021-01-26 00:04:49'),
(13, 54, 'Pick your service time', 'Time', '2021-01-26 00:24:54', '2021-01-26 00:24:54'),
(15, 60, 'Pick your service time', 'Time', '2021-01-28 23:41:39', '2021-01-28 23:41:39'),
(16, 63, 'Pick your service time', 'Time', '2021-03-17 01:00:17', '2021-03-17 01:00:17');

-- --------------------------------------------------------

--
-- Table structure for table `time_field_options`
--

CREATE TABLE `time_field_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `time_field_id` bigint(20) UNSIGNED NOT NULL,
  `time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `time_field_options`
--

INSERT INTO `time_field_options` (`id`, `time_field_id`, `time`, `created_at`, `updated_at`) VALUES
(5, 11, '9:00 Am - 10:00 Am', '2021-01-26 00:04:49', '2021-01-26 00:04:49'),
(6, 11, '10:00 Am - 11:00 Am', '2021-01-26 00:04:49', '2021-01-26 00:04:49'),
(7, 11, '11:00 Am - 12:00 Am', '2021-01-26 00:04:49', '2021-01-26 00:04:49'),
(11, 13, '9:00 Am- 10:00 Am', '2021-01-26 00:24:54', '2021-01-26 00:24:54'),
(12, 13, '10:00 Am - 11:00 Am', '2021-01-26 00:24:54', '2021-01-26 00:24:54'),
(13, 13, '11:00 Am - 12:00 Am', '2021-01-26 00:24:54', '2021-01-26 00:24:54'),
(18, 15, '9:00 Am', '2021-01-28 23:41:39', '2021-01-28 23:41:39'),
(19, 15, '10:00 Am', '2021-01-28 23:41:39', '2021-01-28 23:41:39'),
(20, 15, '11:00 Am', '2021-01-28 23:41:39', '2021-01-28 23:41:39'),
(21, 16, '9:00 Am', '2021-03-17 01:00:17', '2021-03-17 01:00:17'),
(22, 16, '10:00 Am', '2021-03-17 01:00:17', '2021-03-17 01:00:17'),
(23, 16, '11:00 Am', '2021-03-17 01:00:17', '2021-03-17 01:00:17');

-- --------------------------------------------------------

--
-- Table structure for table `time_values`
--

CREATE TABLE `time_values` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `field_id` bigint(20) UNSIGNED NOT NULL,
  `option_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `cart_id` varchar(63) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The unique cart id to be submit for telr',
  `order_id` int(11) DEFAULT NULL COMMENT 'Should be the foreign key for items',
  `store_id` int(11) NOT NULL COMMENT 'Map to ivp_store',
  `test_mode` tinyint(1) NOT NULL DEFAULT 0,
  `amount` decimal(8,2) NOT NULL COMMENT 'Map to ivp_amount the total or purchase',
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Description should be limit to 64',
  `success_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The success URL',
  `canceled_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The canceled URL',
  `declined_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The declined URL',
  `billing_fname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Billing first name',
  `billing_sname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Billing sur name',
  `billing_address_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Billing address 1',
  `billing_address_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Billing address 2',
  `billing_city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Billing city',
  `billing_region` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Billing region',
  `billing_zip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Billing zip',
  `billing_country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Billing country',
  `billing_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Billing email',
  `lang_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Transaction Request lang',
  `trx_reference` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'The transaction reference',
  `approved` tinyint(1) DEFAULT NULL COMMENT 'The transaction status is approved or failed',
  `response` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'The transaction response',
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'The transaction status is updated or not',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`cart_id`, `order_id`, `store_id`, `test_mode`, `amount`, `description`, `success_url`, `canceled_url`, `declined_url`, `billing_fname`, `billing_sname`, `billing_address_1`, `billing_address_2`, `billing_city`, `billing_region`, `billing_zip`, `billing_country`, `billing_email`, `lang_code`, `trx_reference`, `approved`, `response`, `status`, `created_at`, `updated_at`) VALUES
('05c6aa80-ad22-482d-9598-937676080d32-1618479691', 110, 25064, 0, '342.00', 'Test Service', 'http://localhost:8080/handle-payment/success?cart_id=05c6aa80-ad22-482d-9598-937676080d32-1618479691', 'http://localhost:8080/handle-payment/cancel?cart_id=05c6aa80-ad22-482d-9598-937676080d32-1618479691', 'http://localhost:8080/handle-payment/declined?cart_id=05c6aa80-ad22-482d-9598-937676080d32-1618479691', 'Adarsh Acharya', 'Surname', 'Gnaklis', 'Gnaklis 2', 'Alexandria', 'San Stefano', '000000', 'ARE', 'naina2aryal@gmail.com', 'en', '9EBB07C6E1DC2E72F7F2F604569440C82911A8D5BD095B9C82B57EE00F02C7BD', NULL, NULL, 0, '2021-04-15 03:56:35', '2021-04-15 03:56:35'),
('07f67285-24b0-4b1e-a24e-25aedbe242d3-1619411148', 111, 25064, 0, '342.00', 'Business Cards', 'http://localhost:8000/handle-payment/success?cart_id=07f67285-24b0-4b1e-a24e-25aedbe242d3-1619411148', 'http://localhost:8000/handle-payment/cancel?cart_id=07f67285-24b0-4b1e-a24e-25aedbe242d3-1619411148', 'http://localhost:8000/handle-payment/declined?cart_id=07f67285-24b0-4b1e-a24e-25aedbe242d3-1619411148', 'Adarsh Acharya', 'Surname', 'Gnaklis', 'Gnaklis 2', 'Alexandria', 'San Stefano', '000000', 'ARE', 'naina2aryal@gmail.com', 'en', 'A08E9D0FC79D4713AB80BD95B5AF68A85CEA5AF367065C2558B6BB73A563B0DA', NULL, NULL, 0, '2021-04-25 22:40:49', '2021-04-25 22:40:49'),
('11c7d52c-1089-4a7b-973f-076f4db04097-1620066165', 136, 25064, 0, '342.00', 'Business Cards', 'http://localhost:8000/handle-payment/success?cart_id=11c7d52c-1089-4a7b-973f-076f4db04097-1620066165', 'http://localhost:8000/handle-payment/cancel?cart_id=11c7d52c-1089-4a7b-973f-076f4db04097-1620066165', 'http://localhost:8000/handle-payment/declined?cart_id=11c7d52c-1089-4a7b-973f-076f4db04097-1620066165', 'Kavita Aryal', 'Surname', 'Gnaklis', 'Gnaklis 2', 'Alexandria', 'San Stefano', '000000', 'ARE', 'kavita@gmail.com', 'en', 'DC9EDCE59A43C4C16FF7D3F43BB5529DCA9143E3ADF93EF60FD2B6D0319BA58A', NULL, NULL, 0, '2021-05-03 12:37:48', '2021-05-03 12:37:48'),
('12cd6437-ea26-4232-b764-8fccb5b33c83-1616686311', 82, 25064, 0, '342.00', 'Business Cards', 'http://localhost:8000/handle-payment/success?cart_id=12cd6437-ea26-4232-b764-8fccb5b33c83-1616686311', 'http://localhost:8000/handle-payment/cancel?cart_id=12cd6437-ea26-4232-b764-8fccb5b33c83-1616686311', 'http://localhost:8000/handle-payment/declined?cart_id=12cd6437-ea26-4232-b764-8fccb5b33c83-1616686311', 'Moustafa Goudas', 'Bafis', 'Gnaklis', 'Gnaklis 2', 'Alexandria', 'San Stefano', '000000', 'ARE', 'kavita2aryal@gmail.com', 'en', '3405C1284B00541E5C83BC24666F33C9E5989EE1A3DADFD31BA672630EED3D28', NULL, NULL, 0, '2021-03-25 09:46:55', '2021-03-25 09:46:55'),
('1c532608-4fec-4c59-bd4d-229883928f6a-1616670186', 3, 25064, 0, '5.00', 'DESCRIPTION ...', 'http://localhost:8000/handle-payment/success?cart_id=1c532608-4fec-4c59-bd4d-229883928f6a-1616670186', 'http://localhost:8000/handle-payment/cancel?cart_id=1c532608-4fec-4c59-bd4d-229883928f6a-1616670186', 'http://localhost:8000/handle-payment/declined?cart_id=1c532608-4fec-4c59-bd4d-229883928f6a-1616670186', 'Moustafa Goudas', 'Bafis', 'Gnaklis', 'Gnaklis 2', 'Alexandria', 'San Stefano', '000000', 'ARE', 'kavita2aryal@gmail.com', 'en', 'DA9BB13A9CD7214179201C3827A01649712E54E1868DB858CD53599EFB508560', NULL, NULL, 0, '2021-03-25 05:18:07', '2021-03-25 05:18:07'),
('21d7c758-a626-4317-9b97-1bb55968a41c-1620117587', 139, 25064, 0, '342.00', 'Business Cards', 'http://localhost:8000/handle-payment/success?cart_id=21d7c758-a626-4317-9b97-1bb55968a41c-1620117587', 'http://localhost:8000/handle-payment/cancel?cart_id=21d7c758-a626-4317-9b97-1bb55968a41c-1620117587', 'http://localhost:8000/handle-payment/declined?cart_id=21d7c758-a626-4317-9b97-1bb55968a41c-1620117587', 'Abc Company', 'Surname', 'Gnaklis', 'Gnaklis 2', 'Alexandria', 'San Stefano', '000000', 'ARE', 'naina2aryal@gmail.com', 'en', '078EA0484FA5BCF328A9A49C5C6F0675662BAB964ACEB34942C9818E827FDBF9', NULL, NULL, 0, '2021-05-04 02:54:49', '2021-05-04 02:54:49'),
('29692267-0603-4414-b7f6-a66d662d714e-1617617928', 95, 25064, 0, '342.00', 'Test Service', 'http://localhost:8000/handle-payment/success?cart_id=29692267-0603-4414-b7f6-a66d662d714e-1617617928', 'http://localhost:8000/handle-payment/cancel?cart_id=29692267-0603-4414-b7f6-a66d662d714e-1617617928', 'http://localhost:8000/handle-payment/declined?cart_id=29692267-0603-4414-b7f6-a66d662d714e-1617617928', 'Moustafa Goudas', 'Bafis', 'Gnaklis', 'Gnaklis 2', 'Alexandria', 'San Stefano', '000000', 'ARE', 'kavita2aryal@gmail.com', 'en', '97C2CDD6BF3CEDC835D93E0FF1D5296D6A2817502E16AF07D182CCCA2FCDFC78', NULL, NULL, 0, '2021-04-05 04:33:53', '2021-04-05 04:33:53'),
('2bcf7e37-74ec-4fda-ab2d-6d04e6e4c05f-1616669081', 3, 25064, 0, '5.00', 'DESCRIPTION ...', 'http://localhost:8000/handle-payment/success?cart_id=2bcf7e37-74ec-4fda-ab2d-6d04e6e4c05f-1616669081', 'http://localhost:8000/handle-payment/cancel?cart_id=2bcf7e37-74ec-4fda-ab2d-6d04e6e4c05f-1616669081', 'http://localhost:8000/handle-payment/declined?cart_id=2bcf7e37-74ec-4fda-ab2d-6d04e6e4c05f-1616669081', 'Moustafa Goudas', 'Bafis', 'Gnaklis', 'Gnaklis 2', 'Alexandria', 'San Stefano', '000000', 'ARE', 'kavita2aryal@gmail.com', 'en', 'C032550D177CE7A60D740020554E54E0BD871E06704EABC63F36041A8708A127', NULL, NULL, 0, '2021-03-25 04:59:42', '2021-03-25 04:59:42'),
('3001a161-06a8-45ff-b7fa-e952c5e274f0-1623111444', 156, 25064, 0, '480.00', 'Pest Control', 'http://localhost:8000/handle-payment/success?cart_id=3001a161-06a8-45ff-b7fa-e952c5e274f0-1623111444', 'http://localhost:8000/handle-payment/cancel?cart_id=3001a161-06a8-45ff-b7fa-e952c5e274f0-1623111444', 'http://localhost:8000/handle-payment/declined?cart_id=3001a161-06a8-45ff-b7fa-e952c5e274f0-1623111444', 'Kavita Aryal', 'Surname', 'Gnaklis', 'Gnaklis 2', 'Alexandria', 'San Stefano', '000000', 'ARE', 'kavita2aryal@gmail.com', 'en', 'B89A5BB6386613E973E0056B8A9CC745EDE70E36CA3C359B4D3BDA83BE078DAE', NULL, NULL, 0, '2021-06-07 18:32:25', '2021-06-07 18:32:25'),
('35bcc12a-a521-4729-8040-f3c5861350c7-1620069130', 138, 25064, 0, '342.00', 'Business Cards', 'http://localhost:8000/handle-payment/success?cart_id=35bcc12a-a521-4729-8040-f3c5861350c7-1620069130', 'http://localhost:8000/handle-payment/cancel?cart_id=35bcc12a-a521-4729-8040-f3c5861350c7-1620069130', 'http://localhost:8000/handle-payment/declined?cart_id=35bcc12a-a521-4729-8040-f3c5861350c7-1620069130', 'Kavita Aryal', 'Surname', 'Gnaklis', 'Gnaklis 2', 'Alexandria', 'San Stefano', '000000', 'ARE', 'naina2aryal@gmail.com', 'en', '0D6FED2BED1E1F20D895936442C852B25E4384D75894172B4C45AF3F46AED644', NULL, NULL, 0, '2021-05-03 13:27:11', '2021-05-03 13:27:11'),
('36d016c4-3264-427e-b9c9-c8b9c7115807-1620121823', 140, 25064, 0, '342.00', 'Business Cards', 'http://localhost:8000/handle-payment/success?cart_id=36d016c4-3264-427e-b9c9-c8b9c7115807-1620121823', 'http://localhost:8000/handle-payment/cancel?cart_id=36d016c4-3264-427e-b9c9-c8b9c7115807-1620121823', 'http://localhost:8000/handle-payment/declined?cart_id=36d016c4-3264-427e-b9c9-c8b9c7115807-1620121823', 'Kavita Aryal', 'Surname', 'Gnaklis', 'Gnaklis 2', 'Alexandria', 'San Stefano', '000000', 'ARE', 'kavita2aryal@gmail.com', 'en', '55CA7AB9F8A0784EB2337825CEC3DE2A030F2D4C5F851956F0E817004E2D39D1', NULL, NULL, 0, '2021-05-04 04:05:26', '2021-05-04 04:05:26'),
('47727935-9789-48d4-ad75-2b6ebc947e0c-1620025438', 129, 25064, 0, '342.00', 'Photo Studios or Photographers', 'http://localhost:8000/handle-payment/success?cart_id=47727935-9789-48d4-ad75-2b6ebc947e0c-1620025438', 'http://localhost:8000/handle-payment/cancel?cart_id=47727935-9789-48d4-ad75-2b6ebc947e0c-1620025438', 'http://localhost:8000/handle-payment/declined?cart_id=47727935-9789-48d4-ad75-2b6ebc947e0c-1620025438', 'Kavita Aryal', 'Surname', 'Gnaklis', 'Gnaklis 2', 'Alexandria', 'San Stefano', '000000', 'ARE', 'kavita@gmail.com', 'en', 'B62EFA79F9B783B54B16CDE922BCC486CB5312F518D57CEF054EAEAB85C0EBE5', NULL, NULL, 0, '2021-05-03 01:19:03', '2021-05-03 01:19:03'),
('4f340c1f-3e0d-4f04-8a22-f5f8d02b6658-1617620125', 102, 25064, 0, '342.00', 'Business Cards', 'http://localhost:8000/handle-payment/success?cart_id=4f340c1f-3e0d-4f04-8a22-f5f8d02b6658-1617620125', 'http://localhost:8000/handle-payment/cancel?cart_id=4f340c1f-3e0d-4f04-8a22-f5f8d02b6658-1617620125', 'http://localhost:8000/handle-payment/declined?cart_id=4f340c1f-3e0d-4f04-8a22-f5f8d02b6658-1617620125', 'Adarsh Acharya', 'Surname', 'Gnaklis', 'Gnaklis 2', 'Alexandria', 'San Stefano', '000000', 'ARE', 'adarsh@gmail.com', 'en', '519EBAA1B2A8E22E2B202A9F4EF6DF5BA9115E9CFF857C60899C4031E5BFD1C2', NULL, NULL, 0, '2021-04-05 05:10:29', '2021-04-05 05:10:29'),
('57a34bfd-e0a3-4e4e-9e41-d65e3f5fdd86-1619412595', 112, 25064, 0, '342.00', 'Business Cards', 'http://localhost:8000/handle-payment/success?cart_id=57a34bfd-e0a3-4e4e-9e41-d65e3f5fdd86-1619412595', 'http://localhost:8000/handle-payment/cancel?cart_id=57a34bfd-e0a3-4e4e-9e41-d65e3f5fdd86-1619412595', 'http://localhost:8000/handle-payment/declined?cart_id=57a34bfd-e0a3-4e4e-9e41-d65e3f5fdd86-1619412595', 'Adarsh Acharya', 'Surname', 'Gnaklis', 'Gnaklis 2', 'Alexandria', 'San Stefano', '000000', 'ARE', 'naina2aryal@gmail.com', 'en', 'C7CA5A7B8E10CDBCEFBE00056A234827C8F4B25A766164CAD51EAFB944E5BA34', NULL, NULL, 0, '2021-04-25 23:04:58', '2021-04-25 23:04:58'),
('6046ca09-dec9-4aaa-86db-5472c03ac28c-1616669179', 3, 25064, 0, '5.00', 'DESCRIPTION ...', 'http://localhost:8000/handle-payment/success?cart_id=6046ca09-dec9-4aaa-86db-5472c03ac28c-1616669179', 'http://localhost:8000/handle-payment/cancel?cart_id=6046ca09-dec9-4aaa-86db-5472c03ac28c-1616669179', 'http://localhost:8000/handle-payment/declined?cart_id=6046ca09-dec9-4aaa-86db-5472c03ac28c-1616669179', 'Moustafa Goudas', 'Bafis', 'Gnaklis', 'Gnaklis 2', 'Alexandria', 'San Stefano', '000000', 'ARE', 'kavita2aryal@gmail.com', 'en', '1B221808BFE0CC74047DB291E25B9CAA562BE57C349709532379E0F3FC5C4067', NULL, NULL, 0, '2021-03-25 05:01:20', '2021-03-25 05:01:20'),
('7269c105-ee73-4a2c-bccf-483a99d28348-1623104393', 150, 25064, 0, '198.00', 'Pest Control', 'http://localhost:8000/handle-payment/success?cart_id=7269c105-ee73-4a2c-bccf-483a99d28348-1623104393', 'http://localhost:8000/handle-payment/cancel?cart_id=7269c105-ee73-4a2c-bccf-483a99d28348-1623104393', 'http://localhost:8000/handle-payment/declined?cart_id=7269c105-ee73-4a2c-bccf-483a99d28348-1623104393', 'Kavita Aryal', 'Surname', 'Gnaklis', 'Gnaklis 2', 'Alexandria', 'San Stefano', '000000', 'ARE', 'kavita2aryal@gmail.com', 'en', '83B6A9D46B6D95E604F163424B8C9B387D6349817CFEF7E9715F0443AB9863AB', NULL, NULL, 0, '2021-06-07 16:34:53', '2021-06-07 16:34:53'),
('746a59bd-4917-4419-8193-67e7acb943ca-1623104229', 149, 25064, 0, '198.00', 'Pest Control', 'http://localhost:8000/handle-payment/success?cart_id=746a59bd-4917-4419-8193-67e7acb943ca-1623104229', 'http://localhost:8000/handle-payment/cancel?cart_id=746a59bd-4917-4419-8193-67e7acb943ca-1623104229', 'http://localhost:8000/handle-payment/declined?cart_id=746a59bd-4917-4419-8193-67e7acb943ca-1623104229', 'Kavita Aryal', 'Surname', 'Gnaklis', 'Gnaklis 2', 'Alexandria', 'San Stefano', '000000', 'ARE', 'kavita2aryal@gmail.com', 'en', '2F95BF51A4AFD383441CBD7FDF007D244EC0FC6B6C173BD1B8A0A1A94AB46E88', NULL, NULL, 0, '2021-06-07 16:32:09', '2021-06-07 16:32:09'),
('784b7701-c2d4-4947-b3c0-5de2f9488d9e-1620122509', 141, 25064, 0, '150.00', 'Business Cards', 'http://localhost:8000/handle-payment/success?cart_id=784b7701-c2d4-4947-b3c0-5de2f9488d9e-1620122509', 'http://localhost:8000/handle-payment/cancel?cart_id=784b7701-c2d4-4947-b3c0-5de2f9488d9e-1620122509', 'http://localhost:8000/handle-payment/declined?cart_id=784b7701-c2d4-4947-b3c0-5de2f9488d9e-1620122509', 'Kavita Aryal', 'Surname', 'Gnaklis', 'Gnaklis 2', 'Alexandria', 'San Stefano', '000000', 'ARE', 'kavita2aryal@gmail.com', 'en', '4F7C689D54559C0ADE40CF23E7374981EA31852269C9A519CC75241CC29099EA', NULL, NULL, 0, '2021-05-04 04:16:51', '2021-05-04 04:16:51'),
('78cfd870-6bbd-4d24-8cae-4388b2bf88e6-1620023569', 128, 25064, 0, '342.00', 'Pest Control', 'http://localhost:8000/handle-payment/success?cart_id=78cfd870-6bbd-4d24-8cae-4388b2bf88e6-1620023569', 'http://localhost:8000/handle-payment/cancel?cart_id=78cfd870-6bbd-4d24-8cae-4388b2bf88e6-1620023569', 'http://localhost:8000/handle-payment/declined?cart_id=78cfd870-6bbd-4d24-8cae-4388b2bf88e6-1620023569', 'Kavita Aryal', 'Surname', 'Gnaklis', 'Gnaklis 2', 'Alexandria', 'San Stefano', '000000', 'ARE', 'kavita@gmail.com', 'en', 'B674829C8C1FD5C6C82D170B0578B84690157A0E0426143B23A1B3C07DC71208', NULL, NULL, 0, '2021-05-03 00:47:54', '2021-05-03 00:47:54'),
('7a414dd2-59cb-4079-9788-8221dc755ebe-1616686828', 85, 25064, 0, '342.00', 'Business Cards', 'http://localhost:8000/handle-payment/success?cart_id=7a414dd2-59cb-4079-9788-8221dc755ebe-1616686828', 'http://localhost:8000/handle-payment/cancel?cart_id=7a414dd2-59cb-4079-9788-8221dc755ebe-1616686828', 'http://localhost:8000/handle-payment/declined?cart_id=7a414dd2-59cb-4079-9788-8221dc755ebe-1616686828', 'Moustafa Goudas', 'Bafis', 'Gnaklis', 'Gnaklis 2', 'Alexandria', 'San Stefano', '000000', 'ARE', 'kavita2aryal@gmail.com', 'en', 'B739B2E5509A3B87AE157E12AB1BC75C614019BFD7F69BB4AF7398EF80915216', NULL, NULL, 0, '2021-03-25 09:55:29', '2021-03-25 09:55:29'),
('7f72919d-9085-4f98-858e-4b24506b0420-1623109774', 155, 25064, 0, '56.00', 'Pest Control', 'http://localhost:8000/handle-payment/success?cart_id=7f72919d-9085-4f98-858e-4b24506b0420-1623109774', 'http://localhost:8000/handle-payment/cancel?cart_id=7f72919d-9085-4f98-858e-4b24506b0420-1623109774', 'http://localhost:8000/handle-payment/declined?cart_id=7f72919d-9085-4f98-858e-4b24506b0420-1623109774', 'Kavita Aryal', 'Surname', 'Gnaklis', 'Gnaklis 2', 'Alexandria', 'San Stefano', '000000', 'ARE', 'kavita2aryal@gmail.com', 'en', 'EFCC5107FAA5EA511ECE9DAC6393D97591BFEC5809779B6502E3FAF3EC596175', NULL, NULL, 0, '2021-06-07 18:04:34', '2021-06-07 18:04:34'),
('8ac60313-29b9-4888-8620-f3f96553b6b7-1616686489', 83, 25064, 0, '342.00', 'Business Cards', 'http://localhost:8000/handle-payment/success?cart_id=8ac60313-29b9-4888-8620-f3f96553b6b7-1616686489', 'http://localhost:8000/handle-payment/cancel?cart_id=8ac60313-29b9-4888-8620-f3f96553b6b7-1616686489', 'http://localhost:8000/handle-payment/declined?cart_id=8ac60313-29b9-4888-8620-f3f96553b6b7-1616686489', 'Moustafa Goudas', 'Bafis', 'Gnaklis', 'Gnaklis 2', 'Alexandria', 'San Stefano', '000000', 'ARE', 'kavita2aryal@gmail.com', 'en', 'FB1851FCDA94C59FF399F8DBF4DBD84AE79FF31D51BB553FD4A4D4837CDB2A09', NULL, NULL, 0, '2021-03-25 09:49:49', '2021-03-25 09:49:49'),
('9209a5cb-72f9-4ac0-95e2-f0852148c5cc-1617620407', 103, 25064, 0, '342.00', 'Business Cards', 'http://localhost:8000/handle-payment/success?cart_id=9209a5cb-72f9-4ac0-95e2-f0852148c5cc-1617620407', 'http://localhost:8000/handle-payment/cancel?cart_id=9209a5cb-72f9-4ac0-95e2-f0852148c5cc-1617620407', 'http://localhost:8000/handle-payment/declined?cart_id=9209a5cb-72f9-4ac0-95e2-f0852148c5cc-1617620407', 'Adarsh Acharya', 'Surname', 'Gnaklis', 'Gnaklis 2', 'Alexandria', 'San Stefano', '000000', 'ARE', 'naina2aryal@gmail.com', 'en', '157CA68F5DCA10BD59C98D223BC361422A3C2B616A6ED823081D5322086A7B8F', NULL, NULL, 0, '2021-04-05 05:15:26', '2021-04-05 05:15:26'),
('95ca47f9-7b4d-43c1-912b-3ca5e54b8139-1619763861', 114, 25064, 0, '342.00', 'Deep Cleaning', 'http://localhost:8000/handle-payment/success?cart_id=95ca47f9-7b4d-43c1-912b-3ca5e54b8139-1619763861', 'http://localhost:8000/handle-payment/cancel?cart_id=95ca47f9-7b4d-43c1-912b-3ca5e54b8139-1619763861', 'http://localhost:8000/handle-payment/declined?cart_id=95ca47f9-7b4d-43c1-912b-3ca5e54b8139-1619763861', 'Adarsh Acharya', 'Surname', 'Gnaklis', 'Gnaklis 2', 'Alexandria', 'San Stefano', '000000', 'ARE', 'naina2aryal@gmail.com', 'en', 'CFBBE6CA64251413CF89DBA460E3AAC22C3B19DF997D17F7D39A01BFE0BE94F0', NULL, NULL, 0, '2021-04-30 00:39:23', '2021-04-30 00:39:23'),
('9b0b0238-29e9-4688-bae8-76b5976de7c2-1617618752', 101, 25064, 0, '342.00', 'Test Service', 'http://localhost:8000/handle-payment/success?cart_id=9b0b0238-29e9-4688-bae8-76b5976de7c2-1617618752', 'http://localhost:8000/handle-payment/cancel?cart_id=9b0b0238-29e9-4688-bae8-76b5976de7c2-1617618752', 'http://localhost:8000/handle-payment/declined?cart_id=9b0b0238-29e9-4688-bae8-76b5976de7c2-1617618752', 'Moustafa Goudas', 'Bafis', 'Gnaklis', 'Gnaklis 2', 'Alexandria', 'San Stefano', '000000', 'ARE', 'kavita2aryal@gmail.com', 'en', '5C823D2A1D1AD2799155AB215873E5AA99FF7EA19775463A95F10D811F099143', NULL, NULL, 0, '2021-04-05 04:47:36', '2021-04-05 04:47:36'),
('ae136b5c-e039-4e0a-8857-30f24c966595-1616742165', 86, 25064, 0, '342.00', 'Business Cards', 'http://localhost:8000/handle-payment/success?cart_id=ae136b5c-e039-4e0a-8857-30f24c966595-1616742165', 'http://localhost:8000/handle-payment/cancel?cart_id=ae136b5c-e039-4e0a-8857-30f24c966595-1616742165', 'http://localhost:8000/handle-payment/declined?cart_id=ae136b5c-e039-4e0a-8857-30f24c966595-1616742165', 'Moustafa Goudas', 'Bafis', 'Gnaklis', 'Gnaklis 2', 'Alexandria', 'San Stefano', '000000', 'ARE', 'kavita2aryal@gmail.com', 'en', 'F6D61994C23E6593CB52786A9E76E7F6D89D266A87C6614A1BDB4C3A211BAEB0', NULL, NULL, 0, '2021-03-26 01:17:47', '2021-03-26 01:17:47'),
('aea2b505-412d-4edf-a831-2fa265165131-1620066825', 137, 25064, 0, '342.00', 'Business Cards', 'http://localhost:8000/handle-payment/success?cart_id=aea2b505-412d-4edf-a831-2fa265165131-1620066825', 'http://localhost:8000/handle-payment/cancel?cart_id=aea2b505-412d-4edf-a831-2fa265165131-1620066825', 'http://localhost:8000/handle-payment/declined?cart_id=aea2b505-412d-4edf-a831-2fa265165131-1620066825', 'Kavita Aryal', 'Surname', 'Gnaklis', 'Gnaklis 2', 'Alexandria', 'San Stefano', '000000', 'ARE', 'kavita@gmail.com', 'en', 'B162BA4D568534820BD931BD63309863F82FD0E82EC0628DE537718A0DC1B21D', NULL, NULL, 0, '2021-05-03 12:48:46', '2021-05-03 12:48:46'),
('b1cd29a1-188a-4599-9a5d-a42f7816b710-1616686754', 84, 25064, 0, '342.00', 'Business Cards', 'http://localhost:8000/handle-payment/success?cart_id=b1cd29a1-188a-4599-9a5d-a42f7816b710-1616686754', 'http://localhost:8000/handle-payment/cancel?cart_id=b1cd29a1-188a-4599-9a5d-a42f7816b710-1616686754', 'http://localhost:8000/handle-payment/declined?cart_id=b1cd29a1-188a-4599-9a5d-a42f7816b710-1616686754', 'Moustafa Goudas', 'Bafis', 'Gnaklis', 'Gnaklis 2', 'Alexandria', 'San Stefano', '000000', 'ARE', 'kavita2aryal@gmail.com', 'en', '256BCB1F20459D8298DF770328555B2C08B61C2AF9EE67358C636A66D5035E25', NULL, NULL, 0, '2021-03-25 09:54:14', '2021-03-25 09:54:14'),
('b1e87d83-4d4a-467b-afc9-4d80003ff45a-1623105835', 152, 25064, 0, '56.00', 'Pest Control', 'http://localhost:8000/handle-payment/success?cart_id=b1e87d83-4d4a-467b-afc9-4d80003ff45a-1623105835', 'http://localhost:8000/handle-payment/cancel?cart_id=b1e87d83-4d4a-467b-afc9-4d80003ff45a-1623105835', 'http://localhost:8000/handle-payment/declined?cart_id=b1e87d83-4d4a-467b-afc9-4d80003ff45a-1623105835', 'Kavita Aryal', 'Surname', 'Gnaklis', 'Gnaklis 2', 'Alexandria', 'San Stefano', '000000', 'ARE', 'kavita2aryal@gmail.com', 'en', '10E2436938E692291CF794C6066D0992C278CFFF82C945B705526F5777519AD3', NULL, NULL, 0, '2021-06-07 16:58:55', '2021-06-07 16:58:55'),
('cce63bb6-606a-4a97-b4a9-e7141f1c6fc8-1617616070', 92, 25064, 0, '342.00', 'Test Service', 'http://localhost:8000/handle-payment/success?cart_id=cce63bb6-606a-4a97-b4a9-e7141f1c6fc8-1617616070', 'http://localhost:8000/handle-payment/cancel?cart_id=cce63bb6-606a-4a97-b4a9-e7141f1c6fc8-1617616070', 'http://localhost:8000/handle-payment/declined?cart_id=cce63bb6-606a-4a97-b4a9-e7141f1c6fc8-1617616070', 'Moustafa Goudas', 'Bafis', 'Gnaklis', 'Gnaklis 2', 'Alexandria', 'San Stefano', '000000', 'ARE', 'kavita2aryal@gmail.com', 'en', 'C5F372BF0A0894252BB3DB68AF24E57BB26099754DA2DB39AD11A34D06C2B706', NULL, NULL, 0, '2021-04-05 04:02:56', '2021-04-05 04:02:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `priority` int(11) DEFAULT NULL,
  `refer_code` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `feature_in_homepage` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'on',
  `user_type` int(11) NOT NULL DEFAULT 0,
  `license` varchar(259) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_token` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `access_token` varchar(1500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `refresh_token` varchar(1500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_from` enum('facebook','google','normal') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'normal',
  `social_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `priority`, `refer_code`, `name`, `email`, `email_verified_at`, `password`, `status`, `feature_in_homepage`, `user_type`, `license`, `remember_token`, `created_at`, `updated_at`, `image`, `phone`, `email_token`, `access_token`, `refresh_token`, `social_from`, `social_id`) VALUES
(131, 1, NULL, 'Rasha Wahda Pest Control', 'khimgautam11@gmail.com', NULL, '$2y$10$XKLWJY7ky2IROvYfYNGwY.IF0FbLoqR1Q8pfgaI0ShR16fvfMzLWe', 1, 'on', 1, '1620154342Rasha Al Wadha license.pdf', NULL, '2021-05-04 23:52:22', '2021-05-05 21:55:05', '1620154342Rasha Al Wahda.pdf', NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiYzBjMDk4ZmUyMTk5ZTg1OTgxY2UyZDhiMmY4MWU2ODc1YWVlNTkxZGEyNDA3MzEzN2ZhYWI1YjE5Y2FmMjQ0OWMzNzhlNjk1ZWUyMDU2MWMiLCJpYXQiOjE2MjAyMzMwMTgsIm5iZiI6MTYyMDIzMzAxOCwiZXhwIjoxNjUxNzY5MDE4LCJzdWIiOiIxMzEiLCJzY29wZXMiOlsiKiJdfQ.to6x-Bp78fgSyuWXh-9y9upbXwahaWi3lQs-gi6t9yrCPANgtGL9MD3kJwtAq35SgbWjxapyR8cYnEXA74hxAjizE747Yc0RVo4wqcGbIpp4mdbEVepKDa3IGK4fWC8T4LtTDi60amd4XVz8b4HGX4rpyE7-hfG8MMLsAz6b9hVdKwwRxLVNSu1XIVv_R--KRJf23uJmxTEwk9R99sCwMtPnPs2NTqpSHkVKkSrCEVPqKG4jyQgeWtzwQ6XA71NTlufWcq96SfLVLuDxroy31jelZUpZwDqTmpfdcAhno6wXmsaHyfH-d0kW7zlQ8Zr3ll1C_ywzHjtTyGmu4YW7HFUb7yMoVUKLLeRiu2TAVwbVqhr8eQWvZ0jsaaXpuIvITtiMUeB4Bxtx3GzDdOLYgt9NOTz1Fav13mEb9Npn7pqAq4LVKPbJe6sMznxHQzwlpBBEVWBenRnoVFNM8kVyVpA4HLaFxgmIGXikGCrh4cfRuuL4yVLkoXY1wf_jAtiZuDm2iPiX4Vm3Iih8gJX9SeYc2QRIGwTDTD4Q-aLCXYzGM79GKb6yzSGo8DDk_3zBU93ujxsfpzzdEtpvmz9MZAkyPtuGjEtzjLzos-J5emy_sMC3nCfun-qqrZBKnX_NdM8gDxBtd3E_cSsHKuJBoII9BFwk2ddJubSHsRcKTYQ', NULL, NULL, 'normal', NULL),
(132, NULL, 'SOU132&60927bebb1224', 'AL AMEEN COMPUTER TRADING LLC', 'alameencomputertrading@gmail.com', NULL, '$2y$10$8QNpz487JGxIbFjDHAXBj.vmmMz5SfeP1kN6eo9CQjhNoiCkA7yXe', 0, 'on', 0, NULL, NULL, '2021-05-05 16:05:15', '2021-05-05 16:05:15', NULL, NULL, NULL, NULL, NULL, 'normal', NULL),
(136, NULL, NULL, 'Krishna', 'krishnaxyz@gmail.com', NULL, '$2y$10$hRzWot5MJC6RhDNwMFWe3OugVNpVgbCA0dBSx7f.WMY1DZGK4lfXm', 0, 'on', 0, NULL, NULL, '2021-05-24 12:03:25', '2021-06-03 12:04:38', NULL, '8877662424', NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiMGM3NzIxYzhkYjJkYWExZWQ1MmE4MDNiNjAzYjNkNWNjMDJkN2JjZjc3ZWZkNzI1MjUwM2Y2NDdmZWNiZmYyNWUwY2QwNTYwZjhhMTM4OTgiLCJpYXQiOjE2MjE4Mzk4MDUsIm5iZiI6MTYyMTgzOTgwNSwiZXhwIjoxNjUzMzc1ODA1LCJzdWIiOiIxMzYiLCJzY29wZXMiOltdfQ.G3YXThemoYqH6aQv3RFaIioInGeUWrxViS8X2MVAYiMUz0-bfiKWWQxc4Ig8v1bB--vAvIauu0_q_qizBH8AnQy-D5SjYM0E90mNcU9k6_w3bJtzXmhysLre3CLQ0wD0a1kNmqC8XaHOCE9RN7haVg0E8U9Nq9p-bLY2wSLBAyn5Lci499KuKhU9XlKIe8vq5GT8HYZO43XTHTkxH--CxEpiFYWyPHBqIjSue3yR7jNeWbdPHmAW5Tqvejq3qwAUfvEQcsG6pdAafzxKPX1KzAXJxth9zq_PEjwlgT-TNKkA2qKtHzafRZzV1dmD6Lfj-MTJEutAiMYDWEuyI-CCpm4WP0L26lcYm9NkZmJmk2U1iGQJXFHSvJLNRLkOrK6Ir2JNsN_XbzEnXdqY-qHP62dWz2-J66URR24Ia-hx0rzf_-zmn3REmSuOCNgpS7EYn3t4PSKipOA65osStAqKhNPy-ijAeS-GwkQ-oSk7F1Pim3MVzL5C5pdLKGur_Cx-7BPwUH98Lyi_MLu7p5-55tPNbOJd7RxqRHN_gISV8_Mk2riufrIkv0hAjgd4l10uiG8r9fhNDS1YvqAggHZE_nUXfcv0igVrIfx9W4Hg3ayWXmwkOZ3WNDZWMJdQq3v5KZp2aKiVv6U0Sb7ki2G2IfvINJ6r75DKgqk7bEIGSQQ', NULL, 'normal', NULL),
(137, NULL, 'SOU137&60b661bbd1858', 'dAi', 'oihem77@gmail.com', NULL, '$2y$10$Ll30NRD.p3IOw3UTRa/Bl.hMnJOKAZACuk1i4LLRfWK/fWDFgsqea', 0, 'on', 0, NULL, NULL, '2021-06-01 21:35:07', '2021-06-01 21:35:07', NULL, NULL, NULL, NULL, NULL, 'normal', NULL),
(138, NULL, NULL, 'Long Vision Technical Service', 'service1@varietymomo.com', NULL, '$2y$10$zLaJnCDryWK/HSnMQl1jqeJT4AKb5t.1ukUa8H6h6fN9PQOZM/V1i', 1, 'on', 1, '1622710937MIN BAHADUR eVisa.pdf', 'UIfpcd9mkN15pbgvZxAwgG2FBBVUwNBFmcgoui1D5lTNSA1fZVIgljKhE1Uc', '2021-06-03 14:02:17', '2021-06-12 15:16:55', '1623493015logo2.jpg', NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiN2ViZjUzYmFjMjU0MjQ0MmI2ZWU5MjQ5NjY5MTY4NmEwMzFlNzVlZjFlZjRlZmJkMTVjZjAzZWQxYWE1MWJjYjY3NmMxZTk3MzZiOWM3NzMiLCJpYXQiOjE2MjI3MTEzMzcsIm5iZiI6MTYyMjcxMTMzNywiZXhwIjoxNjU0MjQ3MzM3LCJzdWIiOiIxMzgiLCJzY29wZXMiOlsiKiJdfQ.3AOpPkOe8dNkY5JnNARIygQOg1DjJRF2l5DeBbCBYkoYVRlPvuIzhJS9kfRp8hdlje_hFT_Dtl21nbvMTdk7V-esyUBDPGzWlBihiG0Z3kz4j1jeppMLUI7BdoYSuaghzrXOTcBus8nIeafTrZiMlINnI6JOFMVsFIxWAV6VLWNyCF6cbFATF96lHJLxJl4zToK8D48YjPEnmuHWqeIdZELSjHWbYNOZL9i0wE_NCsvM9APpRWiyVXKzW0-CwTYLz8s8s-oFssaFK9haj_ZG8Z7ep3aPEDvXzC5mMrepSJy3SFp6ogUq_SLRlXE_T_eXFtczGlU8g7CqtsF9kigCs1cjNBmIDcXsqtkE9Xy9lLeXUBYF8iSbaIf6mfuTxzq0zzHXoUqL_gwKviaLLbVPbKmLM_yMFlGafYwIm37sstLGDZl3XZcsp7D7fGgXKbVfKB5ZSTrGx2QJmhWyTIz4POpq2AOYHFBpugjCIHDUgqd4_cIMZMVIjYLAokQ3xYaxgGOY1KBcd7k7vJKWPfSIeiNkpbWuMcmczVvVQ4vH1Qjva0OANZ6xAOn0TkDguTg4bx4H5VsLfSsCMKKW9fYBkEidiBIdk7BZI9ZzYVZngBEsmf0qNmOzlEw2JUyScv4HLEdsFLqBIsTLVempmp2FFYUe-Ah9PfZ5VjMYA8-CpBo', NULL, NULL, 'normal', NULL),
(140, NULL, 'SOU140&60c7222e4b39a', 'Rahul Jaisi', 'rahulthejaisi@gmail.com', NULL, NULL, 0, 'on', 0, NULL, NULL, '2021-06-12 14:50:11', '2021-06-12 14:50:11', NULL, NULL, NULL, NULL, NULL, 'google', '105375501515795976501'),
(145, NULL, NULL, 'Beautiful Ladies Saloon', 'service2@varietymomo.com', NULL, '$2y$10$fyUWqZDgchiuamfX7stOSOSRpy9gSdsDNlTrNhq.oLs0c.mV92R6O', 1, 'on', 1, '1623777224IFI License.pdf', NULL, '2021-06-15 22:13:44', '2021-06-15 22:15:34', '1623777224121 Merchant.png', NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiMWJiZTQ4YjBhNWQwM2I3YWY1YWIyODIyYjMzZjgzODI4NjkxZjFlODBhYjI4YjRkZjE5N2RlYTcxNTg5YjUyYjQxMzdhYmRkMjZjN2Q4ZDkiLCJpYXQiOjE2MjM3NzcyNTQsIm5iZiI6MTYyMzc3NzI1NCwiZXhwIjoxNjU1MzEzMjU0LCJzdWIiOiIxNDUiLCJzY29wZXMiOlsiKiJdfQ.RhIhFtDKRegYcCz_UYIxurKl5Uoo-3rNKuhDXfwBrE3azlytnINwEI0mYmC_4_xD5OryJgqijFYLAhpP_2V6Sb9AhlBskZjQ0XEyT2GBuHK7yZhSBIN84kH198SlUJtF7OrAjULqxFl6EDX9CQP_e_xUQr5a_5VU1moe6kBA8idRik2kvZS6GYm9HwgcbJtJfPms2fmxAWEh-aER5tNoGy12OBii7cOq3uT3O5Kr5yPzc34P8pmQKik9QEWEZv3iks4ec3OvKSJFDxE_7J4gzq2ukil4yKTNXytXVPzl6LWZ2xsCmijJq0oLHkHxRBTc5K8uYbraCy1uvjz0O_sESYOkm9BGV5osD22hxvpruWUsylpeQPIgpJi89Bc1G21Nah3gm05mz8YdyTPJZwaeolBxJIFNw9PosY5_wHo1Tb-SRhO-cXlFQ2vJ2xnGlGviB9byEN4EE8u1nPvcP8OxUuP_lA0APzQjkPf4KDP8zfx33Fhme0Y7ngcahpOtiuSfPaOWBTxKT34k6mAjOvHMIYVcEVsDqZdbWPqjzmO3nIMuPpgLU8TRi6j18mY9n99eLHOPtKaBudH9WZXbMKuZVG_9lhDlf9LbjEQjSbCOiyexUt-hlyFj0RyPIH9xNX7EFpTI9hbPINhtWMphIiXjPNzZt1Lqu8Uiq6xWrny2S_c', NULL, NULL, 'normal', NULL),
(146, NULL, 'SOU146&60d0398770e16', 'dor', 'ddorothywisemanwitz@gmail.com', NULL, '$2y$10$7Hq379OfTazF0AHdLC27Ou6MkdxC1DbVRBtHgKFZGe3jWNh40LKpO', 0, 'on', 0, NULL, NULL, '2021-06-21 12:02:31', '2021-06-21 12:02:31', NULL, NULL, NULL, NULL, NULL, 'normal', NULL),
(147, NULL, 'SOU147&60fa170350349', 'fbhfh xcxbch', 'cbsaencuce_1576842610@tfbnw.net', NULL, '$2y$10$s/nooKESRTN00Hag/lg6eezmI1FKkDVMSlboSJRANnr9E4NbsgfMK', 0, 'on', 0, NULL, NULL, '2021-07-23 06:10:27', '2021-07-23 06:10:27', NULL, NULL, NULL, NULL, NULL, 'normal', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_city`
--

CREATE TABLE `user_city` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_city`
--

INSERT INTO `user_city` (`id`, `user_id`, `city_id`, `created_at`, `updated_at`) VALUES
(94, 131, 1, NULL, NULL),
(95, 131, 3, NULL, NULL),
(96, 131, 4, NULL, NULL),
(97, 131, 21, NULL, NULL),
(98, 131, 22, NULL, NULL),
(99, 131, 23, NULL, NULL),
(107, 145, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_other_details`
--

CREATE TABLE `user_other_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `fulladdress` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_latitude` decimal(10,0) DEFAULT NULL,
  `address_longitude` decimal(10,0) DEFAULT NULL,
  `street` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `building` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flat_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `addtional_direction` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_other_details`
--

INSERT INTO `user_other_details` (`id`, `user_id`, `fulladdress`, `address_latitude`, `address_longitude`, `street`, `building`, `flat_number`, `addtional_direction`, `country_code`, `created_at`, `updated_at`) VALUES
(67, 131, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-04 23:52:22', '2021-05-04 23:52:22'),
(68, 132, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-05 16:05:15', '2021-05-05 16:05:15'),
(72, 136, 'Lazimpat Nava Marg', NULL, NULL, 'Street 1', 'Building No 5', '434-A', 'Opposite Sunshine Clinic', NULL, '2021-05-24 12:03:25', '2021-05-25 12:16:59'),
(73, 137, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-06-01 21:35:07', '2021-06-01 21:35:07'),
(74, 138, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-06-03 14:02:17', '2021-06-03 14:02:17'),
(76, 140, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-06-12 14:50:11', '2021-06-12 14:50:11'),
(81, 145, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-06-15 22:13:44', '2021-06-15 22:13:44'),
(82, 146, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-06-21 12:02:31', '2021-06-21 12:02:31'),
(83, 147, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-23 06:10:27', '2021-07-23 06:10:27');

-- --------------------------------------------------------

--
-- Table structure for table `user_refercode_status`
--

CREATE TABLE `user_refercode_status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `refer_by_user` bigint(20) UNSIGNED NOT NULL,
  `refer_to_user` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_service`
--

CREATE TABLE `user_service` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `service_category_id` bigint(20) UNSIGNED NOT NULL DEFAULT 22,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `state` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT 'pending',
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_min_service_charge` decimal(10,2) DEFAULT 0.00,
  `profit_in_percentage` int(11) DEFAULT 0,
  `whats_included` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `terms_and_conditions` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_service`
--

INSERT INTO `user_service` (`id`, `user_id`, `service_category_id`, `service_id`, `created_at`, `updated_at`, `state`, `message`, `document`, `vendor_min_service_charge`, `profit_in_percentage`, `whats_included`, `terms_and_conditions`, `feature`) VALUES
(120, 131, 54, 65, '2021-05-04 23:52:22', '2021-05-05 21:43:10', 'approved', NULL, NULL, '0.00', 0, NULL, NULL, 0),
(122, 131, 55, 84, NULL, '2021-06-01 21:42:14', 'approved', NULL, NULL, '10.00', 0, NULL, NULL, 0),
(123, 131, 54, 72, NULL, NULL, 'approved', NULL, NULL, '20.00', 0, NULL, NULL, 1),
(124, 131, 54, 85, NULL, NULL, 'approved', NULL, NULL, '0.00', 0, NULL, NULL, 1),
(125, 131, 45, 86, NULL, NULL, 'approved', NULL, NULL, '0.00', 0, NULL, NULL, 1),
(126, 131, 49, 91, NULL, NULL, 'approved', NULL, NULL, '0.00', 0, NULL, NULL, 1),
(127, 131, 56, 93, NULL, NULL, 'approved', NULL, NULL, '0.00', 0, NULL, NULL, 1),
(128, 131, 56, 94, NULL, NULL, 'approved', NULL, NULL, '0.00', 0, NULL, NULL, 1),
(129, 131, 56, 95, NULL, NULL, 'approved', NULL, NULL, '0.00', 0, NULL, NULL, 1),
(130, 131, 56, 96, NULL, NULL, 'approved', NULL, NULL, '0.00', 0, NULL, NULL, 1),
(131, 131, 56, 97, NULL, NULL, 'approved', NULL, NULL, '0.00', 0, NULL, NULL, 1),
(132, 131, 56, 98, NULL, NULL, 'approved', NULL, NULL, '0.00', 0, NULL, NULL, 1),
(133, 138, 45, 46, '2021-06-03 14:02:17', '2021-06-03 15:17:05', 'approved', NULL, NULL, '0.00', 0, NULL, NULL, 1),
(134, 138, 45, 48, '2021-06-03 14:02:17', '2021-06-03 16:07:06', 'approved', NULL, NULL, '0.00', 0, NULL, NULL, 1),
(137, 138, 45, 80, '2021-06-03 14:02:17', '2021-06-03 16:07:20', 'approved', NULL, NULL, '0.00', 0, NULL, NULL, 1),
(138, 138, 45, 86, '2021-06-03 14:02:17', '2021-06-03 16:07:37', 'approved', NULL, NULL, '0.00', 0, NULL, NULL, 1),
(139, 138, 55, 88, '2021-06-03 14:02:17', '2021-06-03 16:07:52', 'approved', NULL, NULL, '0.00', 0, NULL, NULL, 1),
(140, 138, 55, 45, '2021-06-03 14:02:17', '2021-06-03 16:08:13', 'approved', NULL, NULL, '0.00', 0, NULL, NULL, 1),
(141, 138, 55, 68, '2021-06-03 14:02:17', '2021-06-03 16:08:29', 'approved', NULL, NULL, '0.00', 0, NULL, NULL, 1),
(142, 138, 55, 69, '2021-06-03 14:02:17', '2021-06-03 16:08:43', 'approved', NULL, NULL, '0.00', 0, NULL, NULL, 1),
(143, 138, 55, 83, '2021-06-03 14:02:17', '2021-06-03 16:08:56', 'approved', NULL, NULL, '0.00', 0, NULL, NULL, 1),
(144, 138, 55, 84, '2021-06-03 14:02:17', '2021-06-03 16:09:07', 'approved', NULL, NULL, '0.00', 0, NULL, NULL, 1),
(146, 138, 54, 72, NULL, NULL, 'approved', NULL, '', '0.00', 0, NULL, NULL, 1),
(149, 145, 41, 54, '2021-06-15 22:13:44', '2021-06-19 16:26:09', 'approved', NULL, NULL, '0.00', 0, NULL, NULL, 1),
(150, 145, 41, 57, '2021-06-15 22:13:44', '2021-06-19 16:26:28', 'approved', NULL, NULL, '0.00', 0, NULL, NULL, 1),
(151, 145, 41, 74, '2021-06-15 22:13:44', '2021-06-19 16:26:48', 'approved', NULL, NULL, '0.00', 0, NULL, NULL, 1),
(152, 145, 41, 75, '2021-06-15 22:13:44', '2021-06-19 16:27:05', 'approved', NULL, NULL, '0.00', 0, NULL, NULL, 1),
(153, 145, 41, 76, '2021-06-15 22:13:44', '2021-06-19 16:27:21', 'approved', NULL, NULL, '0.00', 0, NULL, NULL, 1),
(154, 145, 41, 77, '2021-06-15 22:13:44', '2021-06-19 16:27:36', 'approved', NULL, NULL, '0.00', 0, NULL, NULL, 1),
(155, 145, 41, 78, '2021-06-15 22:13:44', '2021-06-15 22:17:39', 'approved', NULL, NULL, '0.00', 0, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vendor_check_field_charges`
--

CREATE TABLE `vendor_check_field_charges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_provider_id` bigint(20) UNSIGNED NOT NULL,
  `field_id` bigint(20) UNSIGNED NOT NULL,
  `option_id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `charge` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vendor_office_p_c`
--

CREATE TABLE `vendor_office_p_c` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `treatment_type_id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` bigint(20) UNSIGNED NOT NULL,
  `home_size1` decimal(9,2) NOT NULL,
  `home_size2` decimal(9,2) NOT NULL,
  `home_size3` decimal(9,2) NOT NULL,
  `home_size4` decimal(9,2) NOT NULL,
  `other` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Quotation',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_office_p_c`
--

INSERT INTO `vendor_office_p_c` (`id`, `treatment_type_id`, `vendor_id`, `home_size1`, `home_size2`, `home_size3`, `home_size4`, `other`, `created_at`, `updated_at`) VALUES
(2, 1, 138, '351.00', '451.00', '551.00', '651.00', 'Quotation', '2021-06-07 16:02:37', '2021-06-07 16:02:37');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_radio_field_charges`
--

CREATE TABLE `vendor_radio_field_charges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_provider_id` bigint(20) UNSIGNED NOT NULL,
  `field_id` bigint(20) UNSIGNED NOT NULL,
  `option_id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `charge` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vendor_residential_p_c`
--

CREATE TABLE `vendor_residential_p_c` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `home_type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_id` bigint(20) UNSIGNED NOT NULL,
  `treatment_type_id` bigint(20) UNSIGNED NOT NULL,
  `studio` decimal(9,2) NOT NULL,
  `bhk1` decimal(9,2) NOT NULL,
  `bhk2` decimal(9,2) NOT NULL,
  `bhk3` decimal(9,2) NOT NULL,
  `bhk4` decimal(9,2) NOT NULL,
  `bhk5` decimal(9,2) NOT NULL,
  `other` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Quotation',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_residential_p_c`
--

INSERT INTO `vendor_residential_p_c` (`id`, `home_type`, `vendor_id`, `treatment_type_id`, `studio`, `bhk1`, `bhk2`, `bhk3`, `bhk4`, `bhk5`, `other`, `created_at`, `updated_at`) VALUES
(1, 'Apartment', 138, 1, '230.00', '280.00', '330.00', '480.00', '480.00', '530.00', 'Quotation', '2021-06-07 05:44:28', '2021-06-07 06:03:30'),
(2, 'Apartment', 138, 4, '150.00', '200.00', '250.00', '350.00', '400.00', '450.00', 'Quotation', '2021-06-07 05:46:22', '2021-06-07 05:46:34'),
(4, 'Villa', 138, 1, '501.00', '502.00', '5003.00', '654.00', '755.00', '856.00', 'Quotation', '2021-06-07 06:24:11', '2021-06-07 06:24:11');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_select_field_charges`
--

CREATE TABLE `vendor_select_field_charges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_provider_id` bigint(20) UNSIGNED NOT NULL,
  `field_id` bigint(20) UNSIGNED NOT NULL,
  `option_id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `charge` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `point` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wallets`
--

INSERT INTO `wallets` (`id`, `user_id`, `point`, `created_at`, `updated_at`) VALUES
(9, 132, 0, '2021-05-05 16:05:15', '2021-05-05 16:05:15'),
(10, 137, 0, '2021-06-01 21:35:07', '2021-06-01 21:35:07'),
(13, 140, 0, '2021-06-14 14:32:30', '2021-06-14 14:32:30'),
(14, 146, 0, '2021-06-21 12:02:31', '2021-06-21 12:02:31'),
(15, 147, 0, '2021-07-23 06:10:27', '2021-07-23 06:10:27');

-- --------------------------------------------------------

--
-- Table structure for table `wallet_debit_credits`
--

CREATE TABLE `wallet_debit_credits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `wallet_credit` int(11) DEFAULT NULL,
  `wallet_debit` int(11) DEFAULT NULL,
  `remark` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `websites`
--

CREATE TABLE `websites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_line_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_line_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `establish_at` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fb_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `playstore_url` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appstore_url` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `points_per_currency` int(11) DEFAULT NULL,
  `points_for_referrer` int(11) NOT NULL DEFAULT 0,
  `points_for_refercode_user` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `websites`
--

INSERT INTO `websites` (`id`, `name`, `email_1`, `email_2`, `logo`, `phone_1`, `phone_2`, `address_line_1`, `address_line_2`, `establish_at`, `fb_url`, `twitter_url`, `instagram_url`, `youtube_url`, `map_url`, `playstore_url`, `appstore_url`, `currency`, `points_per_currency`, `points_for_referrer`, `points_for_refercode_user`, `created_at`, `updated_at`) VALUES
(1, 'Serviceon Us', 'info@serviceonus.com', 'booking@serviceonus.com', '1609154658serviceonus.png', '+971543713132', NULL, 'Office No. 110, Atrium Center, Bur Dubai', 'Dubai', '2 Feb 2020', 'https://www.facebook.com/serviceonus', 'https://www.twitter.com/serviceonus', 'https://www.instragram.com/serviceonus', NULL, 'this is map url', 'http://play.google.com/store/apps/details?id=sunbi121.serviceonus', NULL, 'AED', 10, 15, 10, NULL, '2021-04-01 17:44:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `available_ons`
--
ALTER TABLE `available_ons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `available_ons_vendor_id_foreign` (`vendor_id`);

--
-- Indexes for table `check_fields`
--
ALTER TABLE `check_fields`
  ADD PRIMARY KEY (`id`),
  ADD KEY `check_fields_service_id_foreign` (`service_id`);

--
-- Indexes for table `check_field_with_charges`
--
ALTER TABLE `check_field_with_charges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `check_field_with_charges_service_id_foreign` (`service_id`);

--
-- Indexes for table `check_options`
--
ALTER TABLE `check_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `check_options_check_field_id_foreign` (`check_field_id`);

--
-- Indexes for table `check_option_with_charges`
--
ALTER TABLE `check_option_with_charges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `check_option_with_charges_check_field_with_charge_id_foreign` (`check_field_with_charge_id`);

--
-- Indexes for table `check_values`
--
ALTER TABLE `check_values`
  ADD KEY `check_values_order_id_foreign` (`order_id`),
  ADD KEY `check_values_field_id_foreign` (`field_id`),
  ADD KEY `check_values_option_id_foreign` (`option_id`);

--
-- Indexes for table `check_with_charge_values`
--
ALTER TABLE `check_with_charge_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `check_with_charge_values_order_id_foreign` (`order_id`),
  ADD KEY `check_with_charge_values_field_id_foreign` (`field_id`),
  ADD KEY `check_with_charge_values_option_id_foreign` (`option_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `date_fields`
--
ALTER TABLE `date_fields`
  ADD PRIMARY KEY (`id`),
  ADD KEY `date_fields_service_id_foreign` (`service_id`);

--
-- Indexes for table `date_values`
--
ALTER TABLE `date_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `date_values_order_id_foreign` (`order_id`),
  ADD KEY `date_values_field_id_foreign` (`field_id`);

--
-- Indexes for table `deepcleaning_orders`
--
ALTER TABLE `deepcleaning_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `deepcleaning_orders_order_id_foreign` (`order_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_enquiries`
--
ALTER TABLE `general_enquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `how_it_work`
--
ALTER TABLE `how_it_work`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `label_for_multiple_inputs`
--
ALTER TABLE `label_for_multiple_inputs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `label_for_multiple_inputs_service_id_foreign` (`service_id`);

--
-- Indexes for table `logos`
--
ALTER TABLE `logos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `multiple_input_fields`
--
ALTER TABLE `multiple_input_fields`
  ADD PRIMARY KEY (`id`),
  ADD KEY `multiple_input_fields_label_for_multiple_input_id_foreign` (`label_for_multiple_input_id`);

--
-- Indexes for table `multiple_input_values`
--
ALTER TABLE `multiple_input_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `multiple_input_values_order_id_foreign` (`order_id`),
  ADD KEY `multiple_input_values_label_for_multiple_input_id_foreign` (`label_for_multiple_input_id`),
  ADD KEY `multiple_input_values_multiple_input_field_id_foreign` (`multiple_input_field_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `office_pest_controls`
--
ALTER TABLE `office_pest_controls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `office_pest_controls_pest_control_treatment_type_id_foreign` (`pest_control_treatment_type_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_provider_id_foreign` (`provider_id`),
  ADD KEY `orders_service_id_foreign` (`service_id`),
  ADD KEY `orders_status_index` (`status`);

--
-- Indexes for table `our_missions`
--
ALTER TABLE `our_missions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `painting_orders`
--
ALTER TABLE `painting_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `painting_orders_order_id_foreign` (`order_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pest_control_orders`
--
ALTER TABLE `pest_control_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pest_control_orders_order_id_foreign` (`order_id`);

--
-- Indexes for table `pest_control_treatment_types`
--
ALTER TABLE `pest_control_treatment_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `radio_fields`
--
ALTER TABLE `radio_fields`
  ADD PRIMARY KEY (`id`),
  ADD KEY `radio_fields_service_id_foreign` (`service_id`);

--
-- Indexes for table `radio_field_with_charges`
--
ALTER TABLE `radio_field_with_charges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `radio_field_with_charges_service_id_foreign` (`service_id`);

--
-- Indexes for table `radio_options`
--
ALTER TABLE `radio_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `radio_options_radio_field_id_foreign` (`radio_field_id`);

--
-- Indexes for table `radio_option_with_charges`
--
ALTER TABLE `radio_option_with_charges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `radio_option_with_charges_radio_field_with_charge_id_foreign` (`radio_field_with_charge_id`);

--
-- Indexes for table `radio_values`
--
ALTER TABLE `radio_values`
  ADD KEY `radio_values_order_id_foreign` (`order_id`),
  ADD KEY `radio_values_field_id_foreign` (`field_id`),
  ADD KEY `radio_values_option_id_foreign` (`option_id`);

--
-- Indexes for table `radio_with_charge_values`
--
ALTER TABLE `radio_with_charge_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `radio_with_charge_values_order_id_foreign` (`order_id`),
  ADD KEY `radio_with_charge_values_field_id_foreign` (`field_id`),
  ADD KEY `radio_with_charge_values_option_id_foreign` (`option_id`);

--
-- Indexes for table `refers`
--
ALTER TABLE `refers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `refers_refer_by_user_foreign` (`refer_by_user`),
  ADD KEY `refers_used_by_user_foreign` (`used_by_user`);

--
-- Indexes for table `residential_pest_controls`
--
ALTER TABLE `residential_pest_controls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `residential_pest_controls_pest_control_treatment_type_id_foreign` (`pest_control_treatment_type_id`);

--
-- Indexes for table `sanitization_orders`
--
ALTER TABLE `sanitization_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sanitization_orders_order_id_foreign` (`order_id`);

--
-- Indexes for table `select_fields`
--
ALTER TABLE `select_fields`
  ADD PRIMARY KEY (`id`),
  ADD KEY `select_fields_service_id_foreign` (`service_id`);

--
-- Indexes for table `select_field_with_charges`
--
ALTER TABLE `select_field_with_charges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `select_field_with_charges_service_id_foreign` (`service_id`);

--
-- Indexes for table `select_options`
--
ALTER TABLE `select_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `select_options_select_field_id_foreign` (`select_field_id`);

--
-- Indexes for table `select_option_with_charges`
--
ALTER TABLE `select_option_with_charges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `select_option_with_charges_select_field_with_charge_id_foreign` (`select_field_with_charge_id`);

--
-- Indexes for table `select_values`
--
ALTER TABLE `select_values`
  ADD KEY `select_values_order_id_foreign` (`order_id`),
  ADD KEY `select_values_field_id_foreign` (`field_id`),
  ADD KEY `select_values_option_id_foreign` (`option_id`);

--
-- Indexes for table `select_with_charge_values`
--
ALTER TABLE `select_with_charge_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `select_with_charge_values_order_id_foreign` (`order_id`),
  ADD KEY `select_with_charge_values_field_id_foreign` (`field_id`),
  ADD KEY `select_with_charge_values_option_id_foreign` (`option_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_service_category_id_foreign` (`service_category_id`);

--
-- Indexes for table `service_categories`
--
ALTER TABLE `service_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_enquiries`
--
ALTER TABLE `service_enquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_provider_details`
--
ALTER TABLE `service_provider_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_provider_details_user_id_foreign` (`user_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider_texts`
--
ALTER TABLE `slider_texts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribeplan_user`
--
ALTER TABLE `subscribeplan_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscribeplan_user_user_id_foreign` (`user_id`),
  ADD KEY `subscribeplan_user_subscribplan_id_foreign` (`subscribplan_id`);

--
-- Indexes for table `subscribplans`
--
ALTER TABLE `subscribplans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribtion_plans`
--
ALTER TABLE `subscribtion_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `textarea_fields`
--
ALTER TABLE `textarea_fields`
  ADD PRIMARY KEY (`id`),
  ADD KEY `textarea_fields_service_id_foreign` (`service_id`);

--
-- Indexes for table `textarea_values`
--
ALTER TABLE `textarea_values`
  ADD KEY `textarea_values_order_id_foreign` (`order_id`),
  ADD KEY `textarea_values_field_id_foreign` (`field_id`);

--
-- Indexes for table `text_fields`
--
ALTER TABLE `text_fields`
  ADD PRIMARY KEY (`id`),
  ADD KEY `text_fields_service_id_foreign` (`service_id`);

--
-- Indexes for table `text_values`
--
ALTER TABLE `text_values`
  ADD KEY `text_values_order_id_foreign` (`order_id`),
  ADD KEY `text_values_field_id_foreign` (`field_id`);

--
-- Indexes for table `time2_fields`
--
ALTER TABLE `time2_fields`
  ADD PRIMARY KEY (`id`),
  ADD KEY `time2_fields_service_id_foreign` (`service_id`);

--
-- Indexes for table `time2_values`
--
ALTER TABLE `time2_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `time2_values_order_id_foreign` (`order_id`),
  ADD KEY `time2_values_field_id_foreign` (`field_id`);

--
-- Indexes for table `time_fields`
--
ALTER TABLE `time_fields`
  ADD PRIMARY KEY (`id`),
  ADD KEY `time_fields_service_id_foreign` (`service_id`);

--
-- Indexes for table `time_field_options`
--
ALTER TABLE `time_field_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `time_field_options_time_field_id_foreign` (`time_field_id`);

--
-- Indexes for table `time_values`
--
ALTER TABLE `time_values`
  ADD KEY `time_values_order_id_foreign` (`order_id`),
  ADD KEY `time_values_field_id_foreign` (`field_id`),
  ADD KEY `time_values_option_id_foreign` (`option_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_city`
--
ALTER TABLE `user_city`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_city_user_id_foreign` (`user_id`),
  ADD KEY `user_city_city_id_foreign` (`city_id`);

--
-- Indexes for table `user_other_details`
--
ALTER TABLE `user_other_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_other_details_user_id_foreign` (`user_id`);

--
-- Indexes for table `user_refercode_status`
--
ALTER TABLE `user_refercode_status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_refercode_status_refer_by_user_foreign` (`refer_by_user`),
  ADD KEY `user_refercode_status_refer_to_user_foreign` (`refer_to_user`);

--
-- Indexes for table `user_service`
--
ALTER TABLE `user_service`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_service_user_id_foreign` (`user_id`),
  ADD KEY `user_service_service_id_foreign` (`service_id`),
  ADD KEY `user_service_service_category_id_foreign` (`service_category_id`);

--
-- Indexes for table `vendor_check_field_charges`
--
ALTER TABLE `vendor_check_field_charges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendor_check_field_charges_service_provider_id_foreign` (`service_provider_id`),
  ADD KEY `vendor_check_field_charges_option_id_foreign` (`option_id`),
  ADD KEY `vendor_check_field_charges_field_id_foreign` (`field_id`),
  ADD KEY `vendor_check_field_charges_service_id_foreign` (`service_id`);

--
-- Indexes for table `vendor_office_p_c`
--
ALTER TABLE `vendor_office_p_c`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendor_office_p_c_vendor_id_foreign` (`vendor_id`);

--
-- Indexes for table `vendor_radio_field_charges`
--
ALTER TABLE `vendor_radio_field_charges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendor_radio_field_charges_service_provider_id_foreign` (`service_provider_id`),
  ADD KEY `vendor_radio_field_charges_option_id_foreign` (`option_id`),
  ADD KEY `vendor_radio_field_charges_field_id_foreign` (`field_id`),
  ADD KEY `vendor_radio_field_charges_service_id_foreign` (`service_id`);

--
-- Indexes for table `vendor_residential_p_c`
--
ALTER TABLE `vendor_residential_p_c`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendor_residential_p_c_treatment_type_id_foreign` (`treatment_type_id`),
  ADD KEY `vendor_residential_p_c_vendor_id_foreign` (`vendor_id`);

--
-- Indexes for table `vendor_select_field_charges`
--
ALTER TABLE `vendor_select_field_charges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendor_select_field_charges_service_provider_id_foreign` (`service_provider_id`),
  ADD KEY `vendor_select_field_charges_option_id_foreign` (`option_id`),
  ADD KEY `vendor_select_field_charges_field_id_foreign` (`field_id`),
  ADD KEY `vendor_select_field_charges_service_id_foreign` (`service_id`);

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wallets_user_id_foreign` (`user_id`);

--
-- Indexes for table `wallet_debit_credits`
--
ALTER TABLE `wallet_debit_credits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wallet_debit_credits_user_id_foreign` (`user_id`);

--
-- Indexes for table `websites`
--
ALTER TABLE `websites`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `available_ons`
--
ALTER TABLE `available_ons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `check_fields`
--
ALTER TABLE `check_fields`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `check_field_with_charges`
--
ALTER TABLE `check_field_with_charges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `check_options`
--
ALTER TABLE `check_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `check_option_with_charges`
--
ALTER TABLE `check_option_with_charges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `check_with_charge_values`
--
ALTER TABLE `check_with_charge_values`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=794;

--
-- AUTO_INCREMENT for table `date_fields`
--
ALTER TABLE `date_fields`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `date_values`
--
ALTER TABLE `date_values`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `deepcleaning_orders`
--
ALTER TABLE `deepcleaning_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `general_enquiries`
--
ALTER TABLE `general_enquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `how_it_work`
--
ALTER TABLE `how_it_work`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `label_for_multiple_inputs`
--
ALTER TABLE `label_for_multiple_inputs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `logos`
--
ALTER TABLE `logos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `multiple_input_fields`
--
ALTER TABLE `multiple_input_fields`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `multiple_input_values`
--
ALTER TABLE `multiple_input_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `office_pest_controls`
--
ALTER TABLE `office_pest_controls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT for table `our_missions`
--
ALTER TABLE `our_missions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `painting_orders`
--
ALTER TABLE `painting_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pest_control_orders`
--
ALTER TABLE `pest_control_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pest_control_treatment_types`
--
ALTER TABLE `pest_control_treatment_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `radio_fields`
--
ALTER TABLE `radio_fields`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `radio_field_with_charges`
--
ALTER TABLE `radio_field_with_charges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `radio_options`
--
ALTER TABLE `radio_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `radio_option_with_charges`
--
ALTER TABLE `radio_option_with_charges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `radio_with_charge_values`
--
ALTER TABLE `radio_with_charge_values`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `refers`
--
ALTER TABLE `refers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `residential_pest_controls`
--
ALTER TABLE `residential_pest_controls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `sanitization_orders`
--
ALTER TABLE `sanitization_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `select_fields`
--
ALTER TABLE `select_fields`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `select_field_with_charges`
--
ALTER TABLE `select_field_with_charges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `select_options`
--
ALTER TABLE `select_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=517;

--
-- AUTO_INCREMENT for table `select_option_with_charges`
--
ALTER TABLE `select_option_with_charges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `select_with_charge_values`
--
ALTER TABLE `select_with_charge_values`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `service_categories`
--
ALTER TABLE `service_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `service_enquiries`
--
ALTER TABLE `service_enquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `service_provider_details`
--
ALTER TABLE `service_provider_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `slider_texts`
--
ALTER TABLE `slider_texts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subscribeplan_user`
--
ALTER TABLE `subscribeplan_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subscribplans`
--
ALTER TABLE `subscribplans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subscribtion_plans`
--
ALTER TABLE `subscribtion_plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `textarea_fields`
--
ALTER TABLE `textarea_fields`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `text_fields`
--
ALTER TABLE `text_fields`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `time2_fields`
--
ALTER TABLE `time2_fields`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `time2_values`
--
ALTER TABLE `time2_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `time_fields`
--
ALTER TABLE `time_fields`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `time_field_options`
--
ALTER TABLE `time_field_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `user_city`
--
ALTER TABLE `user_city`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `user_other_details`
--
ALTER TABLE `user_other_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `user_refercode_status`
--
ALTER TABLE `user_refercode_status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_service`
--
ALTER TABLE `user_service`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT for table `vendor_check_field_charges`
--
ALTER TABLE `vendor_check_field_charges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `vendor_office_p_c`
--
ALTER TABLE `vendor_office_p_c`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vendor_radio_field_charges`
--
ALTER TABLE `vendor_radio_field_charges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `vendor_residential_p_c`
--
ALTER TABLE `vendor_residential_p_c`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vendor_select_field_charges`
--
ALTER TABLE `vendor_select_field_charges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `wallet_debit_credits`
--
ALTER TABLE `wallet_debit_credits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `websites`
--
ALTER TABLE `websites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `available_ons`
--
ALTER TABLE `available_ons`
  ADD CONSTRAINT `available_ons_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `check_fields`
--
ALTER TABLE `check_fields`
  ADD CONSTRAINT `check_fields_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `check_field_with_charges`
--
ALTER TABLE `check_field_with_charges`
  ADD CONSTRAINT `check_field_with_charges_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `check_options`
--
ALTER TABLE `check_options`
  ADD CONSTRAINT `check_options_check_field_id_foreign` FOREIGN KEY (`check_field_id`) REFERENCES `check_fields` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `check_option_with_charges`
--
ALTER TABLE `check_option_with_charges`
  ADD CONSTRAINT `check_option_with_charges_check_field_with_charge_id_foreign` FOREIGN KEY (`check_field_with_charge_id`) REFERENCES `check_field_with_charges` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `check_values`
--
ALTER TABLE `check_values`
  ADD CONSTRAINT `check_values_field_id_foreign` FOREIGN KEY (`field_id`) REFERENCES `check_fields` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `check_values_option_id_foreign` FOREIGN KEY (`option_id`) REFERENCES `check_options` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `check_values_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `check_with_charge_values`
--
ALTER TABLE `check_with_charge_values`
  ADD CONSTRAINT `check_with_charge_values_field_id_foreign` FOREIGN KEY (`field_id`) REFERENCES `check_field_with_charges` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `check_with_charge_values_option_id_foreign` FOREIGN KEY (`option_id`) REFERENCES `check_option_with_charges` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `check_with_charge_values_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `date_fields`
--
ALTER TABLE `date_fields`
  ADD CONSTRAINT `date_fields_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `date_values`
--
ALTER TABLE `date_values`
  ADD CONSTRAINT `date_values_field_id_foreign` FOREIGN KEY (`field_id`) REFERENCES `date_fields` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `date_values_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `deepcleaning_orders`
--
ALTER TABLE `deepcleaning_orders`
  ADD CONSTRAINT `deepcleaning_orders_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `label_for_multiple_inputs`
--
ALTER TABLE `label_for_multiple_inputs`
  ADD CONSTRAINT `label_for_multiple_inputs_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `multiple_input_fields`
--
ALTER TABLE `multiple_input_fields`
  ADD CONSTRAINT `multiple_input_fields_label_for_multiple_input_id_foreign` FOREIGN KEY (`label_for_multiple_input_id`) REFERENCES `label_for_multiple_inputs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `multiple_input_values`
--
ALTER TABLE `multiple_input_values`
  ADD CONSTRAINT `multiple_input_values_label_for_multiple_input_id_foreign` FOREIGN KEY (`label_for_multiple_input_id`) REFERENCES `label_for_multiple_inputs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `multiple_input_values_multiple_input_field_id_foreign` FOREIGN KEY (`multiple_input_field_id`) REFERENCES `multiple_input_fields` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `multiple_input_values_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `office_pest_controls`
--
ALTER TABLE `office_pest_controls`
  ADD CONSTRAINT `office_pest_controls_pest_control_treatment_type_id_foreign` FOREIGN KEY (`pest_control_treatment_type_id`) REFERENCES `pest_control_treatment_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_provider_id_foreign` FOREIGN KEY (`provider_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `painting_orders`
--
ALTER TABLE `painting_orders`
  ADD CONSTRAINT `painting_orders_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pest_control_orders`
--
ALTER TABLE `pest_control_orders`
  ADD CONSTRAINT `pest_control_orders_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `radio_fields`
--
ALTER TABLE `radio_fields`
  ADD CONSTRAINT `radio_fields_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `radio_field_with_charges`
--
ALTER TABLE `radio_field_with_charges`
  ADD CONSTRAINT `radio_field_with_charges_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `radio_options`
--
ALTER TABLE `radio_options`
  ADD CONSTRAINT `radio_options_radio_field_id_foreign` FOREIGN KEY (`radio_field_id`) REFERENCES `radio_fields` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `radio_option_with_charges`
--
ALTER TABLE `radio_option_with_charges`
  ADD CONSTRAINT `radio_option_with_charges_radio_field_with_charge_id_foreign` FOREIGN KEY (`radio_field_with_charge_id`) REFERENCES `radio_field_with_charges` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `radio_values`
--
ALTER TABLE `radio_values`
  ADD CONSTRAINT `radio_values_field_id_foreign` FOREIGN KEY (`field_id`) REFERENCES `radio_fields` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `radio_values_option_id_foreign` FOREIGN KEY (`option_id`) REFERENCES `radio_options` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `radio_values_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `radio_with_charge_values`
--
ALTER TABLE `radio_with_charge_values`
  ADD CONSTRAINT `radio_with_charge_values_field_id_foreign` FOREIGN KEY (`field_id`) REFERENCES `radio_field_with_charges` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `radio_with_charge_values_option_id_foreign` FOREIGN KEY (`option_id`) REFERENCES `radio_option_with_charges` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `radio_with_charge_values_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `refers`
--
ALTER TABLE `refers`
  ADD CONSTRAINT `refers_refer_by_user_foreign` FOREIGN KEY (`refer_by_user`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `refers_used_by_user_foreign` FOREIGN KEY (`used_by_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `residential_pest_controls`
--
ALTER TABLE `residential_pest_controls`
  ADD CONSTRAINT `residential_pest_controls_pest_control_treatment_type_id_foreign` FOREIGN KEY (`pest_control_treatment_type_id`) REFERENCES `pest_control_treatment_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sanitization_orders`
--
ALTER TABLE `sanitization_orders`
  ADD CONSTRAINT `sanitization_orders_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `select_fields`
--
ALTER TABLE `select_fields`
  ADD CONSTRAINT `select_fields_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `select_field_with_charges`
--
ALTER TABLE `select_field_with_charges`
  ADD CONSTRAINT `select_field_with_charges_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `select_options`
--
ALTER TABLE `select_options`
  ADD CONSTRAINT `select_options_select_field_id_foreign` FOREIGN KEY (`select_field_id`) REFERENCES `select_fields` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `select_option_with_charges`
--
ALTER TABLE `select_option_with_charges`
  ADD CONSTRAINT `select_option_with_charges_select_field_with_charge_id_foreign` FOREIGN KEY (`select_field_with_charge_id`) REFERENCES `select_field_with_charges` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `select_values`
--
ALTER TABLE `select_values`
  ADD CONSTRAINT `select_values_field_id_foreign` FOREIGN KEY (`field_id`) REFERENCES `select_fields` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `select_values_option_id_foreign` FOREIGN KEY (`option_id`) REFERENCES `select_options` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `select_values_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `select_with_charge_values`
--
ALTER TABLE `select_with_charge_values`
  ADD CONSTRAINT `select_with_charge_values_field_id_foreign` FOREIGN KEY (`field_id`) REFERENCES `select_field_with_charges` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `select_with_charge_values_option_id_foreign` FOREIGN KEY (`option_id`) REFERENCES `select_option_with_charges` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `select_with_charge_values_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_service_category_id_foreign` FOREIGN KEY (`service_category_id`) REFERENCES `service_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `service_provider_details`
--
ALTER TABLE `service_provider_details`
  ADD CONSTRAINT `service_provider_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subscribeplan_user`
--
ALTER TABLE `subscribeplan_user`
  ADD CONSTRAINT `subscribeplan_user_subscribplan_id_foreign` FOREIGN KEY (`subscribplan_id`) REFERENCES `subscribplans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subscribeplan_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `textarea_fields`
--
ALTER TABLE `textarea_fields`
  ADD CONSTRAINT `textarea_fields_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `textarea_values`
--
ALTER TABLE `textarea_values`
  ADD CONSTRAINT `textarea_values_field_id_foreign` FOREIGN KEY (`field_id`) REFERENCES `textarea_fields` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `textarea_values_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `text_fields`
--
ALTER TABLE `text_fields`
  ADD CONSTRAINT `text_fields_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `text_values`
--
ALTER TABLE `text_values`
  ADD CONSTRAINT `text_values_field_id_foreign` FOREIGN KEY (`field_id`) REFERENCES `text_fields` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `text_values_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `time2_fields`
--
ALTER TABLE `time2_fields`
  ADD CONSTRAINT `time2_fields_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `time2_values`
--
ALTER TABLE `time2_values`
  ADD CONSTRAINT `time2_values_field_id_foreign` FOREIGN KEY (`field_id`) REFERENCES `time2_fields` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `time2_values_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `time_fields`
--
ALTER TABLE `time_fields`
  ADD CONSTRAINT `time_fields_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `time_field_options`
--
ALTER TABLE `time_field_options`
  ADD CONSTRAINT `time_field_options_time_field_id_foreign` FOREIGN KEY (`time_field_id`) REFERENCES `time_fields` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `time_values`
--
ALTER TABLE `time_values`
  ADD CONSTRAINT `time_values_field_id_foreign` FOREIGN KEY (`field_id`) REFERENCES `time_fields` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `time_values_option_id_foreign` FOREIGN KEY (`option_id`) REFERENCES `time_field_options` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `time_values_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_city`
--
ALTER TABLE `user_city`
  ADD CONSTRAINT `user_city_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_city_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_other_details`
--
ALTER TABLE `user_other_details`
  ADD CONSTRAINT `user_other_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_refercode_status`
--
ALTER TABLE `user_refercode_status`
  ADD CONSTRAINT `user_refercode_status_refer_by_user_foreign` FOREIGN KEY (`refer_by_user`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_refercode_status_refer_to_user_foreign` FOREIGN KEY (`refer_to_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_service`
--
ALTER TABLE `user_service`
  ADD CONSTRAINT `user_service_service_category_id_foreign` FOREIGN KEY (`service_category_id`) REFERENCES `service_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_service_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_service_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `vendor_check_field_charges`
--
ALTER TABLE `vendor_check_field_charges`
  ADD CONSTRAINT `vendor_check_field_charges_field_id_foreign` FOREIGN KEY (`field_id`) REFERENCES `check_field_with_charges` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `vendor_check_field_charges_option_id_foreign` FOREIGN KEY (`option_id`) REFERENCES `check_option_with_charges` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `vendor_check_field_charges_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `vendor_check_field_charges_service_provider_id_foreign` FOREIGN KEY (`service_provider_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `vendor_office_p_c`
--
ALTER TABLE `vendor_office_p_c`
  ADD CONSTRAINT `vendor_office_p_c_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `vendor_radio_field_charges`
--
ALTER TABLE `vendor_radio_field_charges`
  ADD CONSTRAINT `vendor_radio_field_charges_field_id_foreign` FOREIGN KEY (`field_id`) REFERENCES `radio_field_with_charges` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `vendor_radio_field_charges_option_id_foreign` FOREIGN KEY (`option_id`) REFERENCES `radio_option_with_charges` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `vendor_radio_field_charges_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `vendor_radio_field_charges_service_provider_id_foreign` FOREIGN KEY (`service_provider_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `vendor_residential_p_c`
--
ALTER TABLE `vendor_residential_p_c`
  ADD CONSTRAINT `vendor_residential_p_c_treatment_type_id_foreign` FOREIGN KEY (`treatment_type_id`) REFERENCES `pest_control_treatment_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `vendor_residential_p_c_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `vendor_select_field_charges`
--
ALTER TABLE `vendor_select_field_charges`
  ADD CONSTRAINT `vendor_select_field_charges_field_id_foreign` FOREIGN KEY (`field_id`) REFERENCES `select_field_with_charges` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `vendor_select_field_charges_option_id_foreign` FOREIGN KEY (`option_id`) REFERENCES `select_option_with_charges` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `vendor_select_field_charges_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `vendor_select_field_charges_service_provider_id_foreign` FOREIGN KEY (`service_provider_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wallets`
--
ALTER TABLE `wallets`
  ADD CONSTRAINT `wallets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wallet_debit_credits`
--
ALTER TABLE `wallet_debit_credits`
  ADD CONSTRAINT `wallet_debit_credits_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
