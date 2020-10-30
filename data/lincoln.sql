-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2018 at 11:00 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lincoln`
--

-- --------------------------------------------------------

--
-- Table structure for table `academics`
--

CREATE TABLE `academics` (
  `academic_id` int(10) UNSIGNED NOT NULL,
  `academic_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `academics`
--

INSERT INTO `academics` (`academic_id`, `academic_name`, `created_at`, `updated_at`) VALUES
(1, '2018-2019', '2018-07-14 19:57:28', '2018-07-14 19:57:28'),
(2, '2019-2020', '2018-07-21 21:10:46', '2018-07-21 21:10:46'),
(3, '2020-2021', '2018-07-24 16:32:39', '2018-07-24 16:32:39');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picturefile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `picturefile`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Amos', 'Amos', '31599_2018-07-13_1531492486.jpg', 'amoschihi@gmail.com', '$2y$10$Ix5YVhRuLg0MJvLc5o9kbutDdV/MaKqJweV6GQqAQsX1OXig0Dh7a', 'HPlAEP7oix', NULL, '2018-07-13 11:34:48'),
(2, 'Code Doctor', 'Codedoctor', '58272_2018-07-13_1531494172.jpg', 'amoschihi@yahoo.com', '$2y$10$RYHg6A7FSuuUw1OHx2XxLe8YI2QzrpfhPkUTOfkKyeckyc.U20RLu', 'mH0TAK2QA5', NULL, '2018-07-13 12:02:52');

-- --------------------------------------------------------

--
-- Table structure for table `admin_roles`
--

CREATE TABLE `admin_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_roles`
--

INSERT INTO `admin_roles` (`id`, `role_id`, `admin_id`) VALUES
(1, 1, 1),
(2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `admission_types`
--

CREATE TABLE `admission_types` (
  `admissiontype_id` int(10) UNSIGNED NOT NULL,
  `mode_id` int(10) UNSIGNED NOT NULL,
  `admissiontype_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admissiontype_description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admission_types`
--

INSERT INTO `admission_types` (`admissiontype_id`, `mode_id`, `admissiontype_name`, `admissiontype_description`, `created_at`, `updated_at`) VALUES
(1, 1, 'JAB', 'JOINT ADMISSION BOARD', '2018-07-14 19:57:05', '2018-07-14 19:57:05');

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `national_id` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `colleges`
--

CREATE TABLE `colleges` (
  `college_id` int(10) UNSIGNED NOT NULL,
  `college_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `college_location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colleges`
--

INSERT INTO `colleges` (`college_id`, `college_name`, `college_location`, `created_at`, `updated_at`) VALUES
(1, 'Narok', 'Narok', '2018-07-14 19:54:26', '2018-07-14 19:54:26');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(10) UNSIGNED NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `admin_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(10) UNSIGNED NOT NULL,
  `department_id` int(10) UNSIGNED NOT NULL,
  `course_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_length` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `department_id`, `course_name`, `course_length`, `course_description`, `created_at`, `updated_at`) VALUES
(1, 1, 'Bachelor of science in computer science', '4', NULL, '2018-07-14 19:55:57', '2018-07-14 19:55:57'),
(2, 1, 'Bachelor of science in information science', '4', NULL, '2018-07-20 19:16:50', '2018-07-20 19:16:50'),
(3, 2, 'Bachelor of science in chemistry', '4', NULL, '2018-07-20 19:18:46', '2018-07-20 19:18:46');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `department_id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `department_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`department_id`, `school_id`, `department_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Computing & Information science', '2018-07-14 19:55:08', '2018-07-14 19:55:08'),
(2, 1, 'Biological & physical sciences', '2018-07-20 19:18:22', '2018-07-20 19:18:22');

-- --------------------------------------------------------

--
-- Table structure for table `displinaries`
--

CREATE TABLE `displinaries` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `victim` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `referrer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `action_taken` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `fee_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `academic_id` int(10) UNSIGNED NOT NULL,
  `semester_id` int(10) UNSIGNED NOT NULL,
  `fee_outstandingbalance` double(8,2) DEFAULT NULL,
  `fee_prepaidlastsem` double(8,2) DEFAULT NULL,
  `fee_no_of_units` int(10) UNSIGNED NOT NULL,
  `fee_currenttuition` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fee_acommodation` double(8,2) DEFAULT NULL,
  `fee_aftercharges` double(8,2) DEFAULT NULL,
  `fee_paid` double(8,2) NOT NULL,
  `fee_helb` double(8,2) DEFAULT NULL,
  `fee_workstudy` double(8,2) DEFAULT NULL,
  `fee_scholarship` double(8,2) DEFAULT NULL,
  `fee_bursary` double(8,2) DEFAULT NULL,
  `fee_cdf` double(8,2) DEFAULT NULL,
  `fee_prepaid` double(8,2) DEFAULT NULL,
  `updated_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fee_finance_details`
--

CREATE TABLE `fee_finance_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `fee_id` int(10) UNSIGNED DEFAULT NULL,
  `student_id` int(10) UNSIGNED DEFAULT NULL,
  `level_id` int(10) UNSIGNED NOT NULL,
  `mode_id` int(10) UNSIGNED NOT NULL,
  `fee_paydate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fee_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fee_detail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fee_amount` double(8,2) NOT NULL,
  `updated_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fee_finance_details`
--

INSERT INTO `fee_finance_details` (`id`, `fee_id`, `student_id`, `level_id`, `mode_id`, `fee_paydate`, `fee_description`, `fee_detail`, `fee_amount`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 1, 1, '09/04/2018', 'sem 1 fees', 'Tuition', 14650.00, 'Code Doctor', '2018-07-20 19:11:00', '2018-07-20 19:11:00');

-- --------------------------------------------------------

--
-- Table structure for table `icons`
--

CREATE TABLE `icons` (
  `id` int(10) UNSIGNED NOT NULL,
  `icon_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `icons`
--

INSERT INTO `icons` (`id`, `icon_name`, `icon_path`, `created_at`, `updated_at`) VALUES
(1, '500px', 'fa fa-500px', NULL, NULL),
(2, 'address-book', 'fa fa-address-book', NULL, NULL),
(3, 'address-book-o', 'fa fa-address-book-o', NULL, NULL),
(4, 'address-card', 'fa fa-address-card', NULL, NULL),
(5, 'address-card-o', 'fa fa-address-card-o', NULL, NULL),
(6, 'adjust', 'fa fa-adjust', NULL, NULL),
(7, 'adn', 'fa fa-adn', NULL, NULL),
(8, 'align-center', 'fa fa-align-center', NULL, NULL),
(9, 'align-justify', 'fa fa-align-justify', NULL, NULL),
(10, 'align-left', 'fa fa-align-left', NULL, NULL),
(11, 'align-right', 'fa fa-align-right', NULL, NULL),
(12, 'amazon', 'fa fa-amazon', NULL, NULL),
(13, 'ambulance', 'fa fa-ambulance', NULL, NULL),
(14, 'american-sign-language-interpreting', 'fa fa-american-sign-language-interpreting', NULL, NULL),
(15, 'anchor', 'fa fa-anchor', NULL, NULL),
(16, 'android', 'fa fa-android', NULL, NULL),
(17, 'angellist', 'fa fa-angellist', NULL, NULL),
(18, 'angle-double-down', 'fa fa-angle-double-down', NULL, NULL),
(19, 'angle-double-left', 'fa fa-angle-double-left', NULL, NULL),
(20, 'angle-double-right', 'fa fa-angle-double-right', NULL, NULL),
(21, 'angle-double-up', 'fa fa-angle-double-up', NULL, NULL),
(22, 'angle-down', 'fa fa-angle-down', NULL, NULL),
(23, 'angle-left', 'fa fa-angle-left', NULL, NULL),
(24, 'angle-right', 'fa fa-angle-right', NULL, NULL),
(25, 'angle-up', 'fa fa-angle-up', NULL, NULL),
(26, 'apple', 'fa fa-apple', NULL, NULL),
(27, 'archive', 'fa fa-archive', NULL, NULL),
(28, 'area-chart', 'fa fa-area-chart', NULL, NULL),
(29, 'arrow-circle-down', 'fa fa-arrow-circle-down', NULL, NULL),
(30, 'arrow-circle-left', 'fa fa-arrow-circle-left', NULL, NULL),
(31, 'arrow-circle-o-down', 'fa fa-arrow-circle-o-down', NULL, NULL),
(32, 'arrow-circle-o-left', 'fa fa-arrow-circle-o-left', NULL, NULL),
(33, 'arrow-circle-o-right', 'fa fa-arrow-circle-o-right', NULL, NULL),
(34, 'arrow-circle-o-up', 'fa fa-arrow-circle-o-up', NULL, NULL),
(35, 'arrow-circle-right', 'fa fa-arrow-circle-right', NULL, NULL),
(36, 'arrow-circle-up', 'fa fa-arrow-circle-up', NULL, NULL),
(37, 'arrow-down', 'fa fa-arrow-down', NULL, NULL),
(38, 'arrow-left', 'fa fa-arrow-left', NULL, NULL),
(39, 'arrow-right', 'fa fa-arrow-right', NULL, NULL),
(40, 'arrow-up', 'fa fa-arrow-up', NULL, NULL),
(41, 'arrows', 'fa fa-arrows', NULL, NULL),
(42, 'arrows-alt', 'fa fa-arrows-alt', NULL, NULL),
(43, 'arrows-h', 'fa fa-arrows-h', NULL, NULL),
(44, 'arrows-v', 'fa fa-arrows-v', NULL, NULL),
(45, 'asl-interpreting', 'fa fa-asl-interpreting', NULL, NULL),
(46, 'assistive-listening-systems', 'fa fa-assistive-listening-systems', NULL, NULL),
(47, 'asterisk', 'fa fa-asterisk', NULL, NULL),
(48, 'at', 'fa fa-at', NULL, NULL),
(49, 'audio-description', 'fa fa-audio-description', NULL, NULL),
(50, 'automobile', 'fa fa-automobile', NULL, NULL),
(51, 'backward', 'fa fa-backward', NULL, NULL),
(52, 'balance-scale', 'fa fa-balance-scale', NULL, NULL),
(53, 'ban', 'fa fa-ban', NULL, NULL),
(54, 'bandcamp', 'fa fa-bandcamp', NULL, NULL),
(55, 'bank', 'fa fa-bank', NULL, NULL),
(56, 'bar-chart', 'fa fa-bar-chart', NULL, NULL),
(57, 'bar-chart-o', 'fa fa-bar-chart-o', NULL, NULL),
(58, 'barcode', 'fa fa-barcode', NULL, NULL),
(59, 'bars', 'fa fa-bars', NULL, NULL),
(60, 'bath', 'fa fa-bath', NULL, NULL),
(61, 'bathtub', 'fa fa-bathtub', NULL, NULL),
(62, 'battery-0', 'fa fa-battery-0', NULL, NULL),
(63, 'battery-1', 'fa fa-battery-1', NULL, NULL),
(64, 'battery-2', 'fa fa-battery-2', NULL, NULL),
(65, 'battery-3', 'fa fa-battery-3', NULL, NULL),
(66, 'battery-4', 'fa fa-battery-4', NULL, NULL),
(67, 'battery-empty', 'fa fa-battery-empty', NULL, NULL),
(68, 'battery-full', 'fa fa-battery-full', NULL, NULL),
(69, 'battery-half', 'fa fa-battery-half', NULL, NULL),
(70, 'battery-quarter', 'fa fa-battery-quarter', NULL, NULL),
(71, 'battery-three-quarters', 'fa fa-battery-three-quarters', NULL, NULL),
(72, 'bed', 'fa fa-bed', NULL, NULL),
(73, 'beer', 'fa fa-beer', NULL, NULL),
(74, 'behance', 'fa fa-behance', NULL, NULL),
(75, 'behance-square', 'fa fa-behance-square', NULL, NULL),
(76, 'bell', 'fa fa-bell', NULL, NULL),
(77, 'bell-o', 'fa fa-bell-o', NULL, NULL),
(78, 'bell-slash', 'fa fa-bell-slash', NULL, NULL),
(79, 'bell-slash-o', 'fa fa-bell-slash-o', NULL, NULL),
(80, 'bicycle', 'fa fa-bicycle', NULL, NULL),
(81, 'binoculars', 'fa fa-binoculars', NULL, NULL),
(82, 'birthday-cake', 'fa fa-birthday-cake', NULL, NULL),
(83, 'bitbucket', 'fa fa-bitbucket', NULL, NULL),
(84, 'bitbucket-square', 'fa fa-bitbucket-square', NULL, NULL),
(85, 'bitcoin', 'fa fa-bitcoin', NULL, NULL),
(86, 'black-tie', 'fa fa-black-tie', NULL, NULL),
(87, 'blind', 'fa fa-blind', NULL, NULL),
(88, 'bluetooth', 'fa fa-bluetooth', NULL, NULL),
(89, 'bluetooth-b', 'fa fa-bluetooth-b', NULL, NULL),
(90, 'bold', 'fa fa-bold', NULL, NULL),
(91, 'bolt', 'fa fa-bolt', NULL, NULL),
(92, 'bomb', 'fa fa-bomb', NULL, NULL),
(93, 'book', 'fa fa-book', NULL, NULL),
(94, 'bookmark', 'fa fa-bookmark', NULL, NULL),
(95, 'bookmark-o', 'fa fa-bookmark-o', NULL, NULL),
(96, 'braille', 'fa fa-braille', NULL, NULL),
(97, 'briefcase', 'fa fa-briefcase', NULL, NULL),
(98, 'btc', 'fa fa-btc', NULL, NULL),
(99, 'bug', 'fa fa-bug', NULL, NULL),
(100, 'building', 'fa fa-building', NULL, NULL),
(101, 'building-o', 'fa fa-building-o', NULL, NULL),
(102, 'bullhorn', 'fa fa-bullhorn', NULL, NULL),
(103, 'bullseye', 'fa fa-bullseye', NULL, NULL),
(104, 'bus', 'fa fa-bus', NULL, NULL),
(105, 'buysellads', 'fa fa-buysellads', NULL, NULL),
(106, 'cab', 'fa fa-cab', NULL, NULL),
(107, 'calculator', 'fa fa-calculator', NULL, NULL),
(108, 'calendar', 'fa fa-calendar', NULL, NULL),
(109, 'calendar-check-o', 'fa fa-calendar-check-o', NULL, NULL),
(110, 'calendar-minus-o', 'fa fa-calendar-minus-o', NULL, NULL),
(111, 'calendar-o', 'fa fa-calendar-o', NULL, NULL),
(112, 'calendar-plus-o', 'fa fa-calendar-plus-o', NULL, NULL),
(113, 'calendar-times-o', 'fa fa-calendar-times-o', NULL, NULL),
(114, 'camera', 'fa fa-camera', NULL, NULL),
(115, 'camera-retro', 'fa fa-camera-retro', NULL, NULL),
(116, 'car', 'fa fa-car', NULL, NULL),
(117, 'caret-down', 'fa fa-caret-down', NULL, NULL),
(118, 'caret-left', 'fa fa-caret-left', NULL, NULL),
(119, 'caret-right', 'fa fa-caret-right', NULL, NULL),
(120, 'caret-square-o-down', 'fa fa-caret-square-o-down', NULL, NULL),
(121, 'caret-square-o-left', 'fa fa-caret-square-o-left', NULL, NULL),
(122, 'caret-square-o-right', 'fa fa-caret-square-o-right', NULL, NULL),
(123, 'caret-square-o-up', 'fa fa-caret-square-o-up', NULL, NULL),
(124, 'caret-up', 'fa fa-caret-up', NULL, NULL),
(125, 'cart-arrow-down', 'fa fa-cart-arrow-down', NULL, NULL),
(126, 'cart-plus', 'fa fa-cart-plus', NULL, NULL),
(127, 'cc', 'fa fa-cc', NULL, NULL),
(128, 'cc-amex', 'fa fa-cc-amex', NULL, NULL),
(129, 'cc-diners-club', 'fa fa-cc-diners-club', NULL, NULL),
(130, 'cc-discover', 'fa fa-cc-discover', NULL, NULL),
(131, 'cc-jcb', 'fa fa-cc-jcb', NULL, NULL),
(132, 'cc-mastercard', 'fa fa-cc-mastercard', NULL, NULL),
(133, 'cc-paypal', 'fa fa-cc-paypal', NULL, NULL),
(134, 'cc-stripe', 'fa fa-cc-stripe', NULL, NULL),
(135, 'cc-visa', 'fa fa-cc-visa', NULL, NULL),
(136, 'certificate', 'fa fa-certificate', NULL, NULL),
(137, 'chain', 'fa fa-chain', NULL, NULL),
(138, 'chain-broken', 'fa fa-chain-broken', NULL, NULL),
(139, 'check', 'fa fa-check', NULL, NULL),
(140, 'check-circle', 'fa fa-check-circle', NULL, NULL),
(141, 'check-circle-o', 'fa fa-check-circle-o', NULL, NULL),
(142, 'check-square', 'fa fa-check-square', NULL, NULL),
(143, 'check-square-o', 'fa fa-check-square-o', NULL, NULL),
(144, 'chevron-circle-down', 'fa fa-chevron-circle-down', NULL, NULL),
(145, 'chevron-circle-left', 'fa fa-chevron-circle-left', NULL, NULL),
(146, 'chevron-circle-right', 'fa fa-chevron-circle-right', NULL, NULL),
(147, 'chevron-circle-up', 'fa fa-chevron-circle-up', NULL, NULL),
(148, 'chevron-down', 'fa fa-chevron-down', NULL, NULL),
(149, 'chevron-left', 'fa fa-chevron-left', NULL, NULL),
(150, 'chevron-right', 'fa fa-chevron-right', NULL, NULL),
(151, 'chevron-up', 'fa fa-chevron-up', NULL, NULL),
(152, 'child', 'fa fa-child', NULL, NULL),
(153, 'chrome', 'fa fa-chrome', NULL, NULL),
(154, 'circle', 'fa fa-circle', NULL, NULL),
(155, 'circle-o', 'fa fa-circle-o', NULL, NULL),
(156, 'circle-o-notch', 'fa fa-circle-o-notch', NULL, NULL),
(157, 'circle-thin', 'fa fa-circle-thin', NULL, NULL),
(158, 'clipboard', 'fa fa-clipboard', NULL, NULL),
(159, 'clock-o', 'fa fa-clock-o', NULL, NULL),
(160, 'clone', 'fa fa-clone', NULL, NULL),
(161, 'close', 'fa fa-close', NULL, NULL),
(162, 'cloud', 'fa fa-cloud-download', NULL, NULL),
(163, 'cloud-upload', 'fa fa-cloud-upload', NULL, NULL),
(164, 'cny', 'fa fa-cny', NULL, NULL),
(165, 'code', 'fa fa-code', NULL, NULL),
(166, 'code-fork', 'fa fa-code-fork', NULL, NULL),
(167, 'codepen', 'fa fa-codepen', NULL, NULL),
(168, 'codiepie', 'fa fa-codiepie', NULL, NULL),
(169, 'coffee', 'fa fa-coffee', NULL, NULL),
(170, 'cog', 'fa fa-cog', NULL, NULL),
(171, 'cogs', 'fa fa-cogs', NULL, NULL),
(172, 'columns', 'fa fa-columns', NULL, NULL),
(173, 'comment', 'fa fa-comment', NULL, NULL),
(174, 'comment-o', 'fa fa-comment-o', NULL, NULL),
(175, 'commenting', 'fa fa-commenting', NULL, NULL),
(176, 'commenting-o', 'fa fa-commenting-o', NULL, NULL),
(177, 'comments', 'fa fa-comments', NULL, NULL),
(178, 'comments-o', 'fa fa-comments-o', NULL, NULL),
(179, 'compass', 'fa fa-compass', NULL, NULL),
(180, 'compress', 'fa fa-compress', NULL, NULL),
(181, 'connectdevelop', 'fa fa-connectdevelop', NULL, NULL),
(182, 'contao', 'fa fa-contao', NULL, NULL),
(183, 'copy', 'fa fa-copy', NULL, NULL),
(184, 'copyright', 'fa fa-copyright', NULL, NULL),
(185, 'creative-commons', 'fa fa-creative-commons', NULL, NULL),
(186, 'credit-card', 'fa fa-credit-card', NULL, NULL),
(187, 'credit-card-alt', 'fa fa-credit-card-alt', NULL, NULL),
(188, 'crop', 'fa fa-crop', NULL, NULL),
(189, 'crosshairs', 'fa fa-crosshairs', NULL, NULL),
(190, 'css3', 'fa fa-css3', NULL, NULL),
(191, 'cube', 'fa fa-cube', NULL, NULL),
(192, 'cubes', 'fa fa-cubes', NULL, NULL),
(193, 'cut', 'fa fa-cut', NULL, NULL),
(194, 'dashboard', 'fa fa-dashboard', NULL, NULL),
(195, 'dashcube', 'fa fa-dashcube', NULL, NULL),
(196, 'deaf', 'fa fa-deaf', NULL, NULL),
(197, 'deafness', 'fa fa-deafness', NULL, NULL),
(198, 'dedent', 'fa fa-dedent', NULL, NULL),
(199, 'delicious', 'fa fa-delicious', NULL, NULL),
(200, 'desktop', 'fa fa-desktop', NULL, NULL),
(201, 'deviantart', 'fa fa-deviantart', NULL, NULL),
(202, 'diamond', 'fa fa-diamond', NULL, NULL),
(203, 'digg', 'fa fa-digg', NULL, NULL),
(204, 'dollar', 'fa fa-dollar', NULL, NULL),
(205, 'dot-circle-o', 'fa fa-dot-circle-o', NULL, NULL),
(206, 'download', 'fa fa-download', NULL, NULL),
(207, 'dribbble', 'fa fa-dribbble', NULL, NULL),
(208, 'drivers-license', 'fa fa-drivers-license', NULL, NULL),
(209, 'drivers-license-o', 'fa fa-drivers-license-o', NULL, NULL),
(210, 'dropbox', 'fa fa-dropbox', NULL, NULL),
(211, 'drupal', 'fa fa-drupal', NULL, NULL),
(212, 'edge', 'fa fa-edge', NULL, NULL),
(213, 'edit', 'fa fa-edit', NULL, NULL),
(214, 'eercast', 'fa fa-eercast', NULL, NULL),
(215, 'eject', 'fa fa-eject', NULL, NULL),
(216, 'ellipsis-h', 'fa fa-ellipsis-h', NULL, NULL),
(217, 'ellipsis-v', 'fa fa-ellipsis-v', NULL, NULL),
(218, 'empire', 'fa fa-empire', NULL, NULL),
(219, 'envelope', 'fa fa-envelope', NULL, NULL),
(220, 'envelope-o', 'fa fa-envelope-o', NULL, NULL),
(221, 'envelope-open', 'fa fa-envelope-open', NULL, NULL),
(222, 'envelope-open-o', 'fa fa-envelope-open-o', NULL, NULL),
(223, 'envelope-square', 'fa fa-envelope-square', NULL, NULL),
(224, 'envira', 'fa fa-envira', NULL, NULL),
(225, 'eraser', 'fa fa-eraser', NULL, NULL),
(226, 'etsy', 'fa fa-etsy', NULL, NULL),
(227, 'eur', 'fa fa-eur', NULL, NULL),
(228, 'euro', 'fa fa-euro', NULL, NULL),
(229, 'exchange', 'fa fa-exchange', NULL, NULL),
(230, 'exclamation', 'fa fa-exclamation', NULL, NULL),
(231, 'exclamation-circle', 'fa fa-exclamation-circle', NULL, NULL),
(232, 'exclamation-triangle', 'fa fa-exclamation-triangle', NULL, NULL),
(233, 'expand', 'fa fa-expand', NULL, NULL),
(234, 'expeditedssl', 'fa fa-expeditedssl', NULL, NULL),
(235, 'external-link', 'fa fa-external-link', NULL, NULL),
(236, 'external-link-square', 'fa fa-external-link-square', NULL, NULL),
(237, 'eye', 'fa fa-eye', NULL, NULL),
(238, 'eye-slash', 'fa fa-eye-slash', NULL, NULL),
(239, 'eyedropper', 'fa fa-eyedropper', NULL, NULL),
(240, 'fa', 'fa fa-font-awesome', NULL, NULL),
(241, 'facebook', 'fa fa-facebook', NULL, NULL),
(242, 'facebook-f', 'fa fa-facebook-f', NULL, NULL),
(243, 'facebook-official', 'fa fa-facebook-official', NULL, NULL),
(244, 'facebook-square', 'fa fa-facebook-square', NULL, NULL),
(245, 'fast-backward', 'fa fa-fast-backward', NULL, NULL),
(246, 'fast-forward', 'fa fa-fast-forward', NULL, NULL),
(247, 'fax', 'fa fa-fax', NULL, NULL),
(248, 'feed', 'fa fa-feed', NULL, NULL),
(249, 'female', 'fa fa-female', NULL, NULL),
(250, 'fighter-jet', 'fa fa-fighter-jet', NULL, NULL),
(251, 'file', 'fa fa-file', NULL, NULL),
(252, 'file-archive-o', 'fa fa-file-archive-o', NULL, NULL),
(253, 'file-audio-o', 'fa fa-file-audio-o', NULL, NULL),
(254, 'file-code-o', 'fa fa-file-code-o', NULL, NULL),
(255, 'file-excel-o', 'fa fa-file-excel-o', NULL, NULL),
(256, 'file-image-o', 'fa fa-file-image-o', NULL, NULL),
(257, 'file-movie-o', 'fa fa-file-movie-o', NULL, NULL),
(258, 'file-o', 'fa fa-file-o', NULL, NULL),
(259, 'file-pdf-o', 'fa fa-file-pdf-o', NULL, NULL),
(260, 'file-powerpoint-o', 'fa fa-file-powerpoint-o', NULL, NULL),
(261, 'file-sound-o', 'fa fa-file-sound-o', NULL, NULL),
(262, 'file-text', 'fa fa-file-text', NULL, NULL),
(263, 'file-text-o', 'fa fa-file-text-o', NULL, NULL),
(264, 'file-word-o', 'fa fa-file-word-o', NULL, NULL),
(265, 'file-zip-o', 'fa fa-file-zip-o', NULL, NULL),
(266, 'files-o', 'fa fa-files-o', NULL, NULL),
(267, 'film', 'fa fa-film', NULL, NULL),
(268, 'filter', 'fa fa-filter', NULL, NULL),
(269, 'fire', 'fa fa-fire', NULL, NULL),
(270, 'fire-extinguisher', 'fa fa-fire-extinguisher', NULL, NULL),
(271, 'firefox', 'fa fa-firefox', NULL, NULL),
(272, 'first-order', 'fa fa-first-order', NULL, NULL),
(273, 'flag', 'fa fa-flag', NULL, NULL),
(274, 'flag-checkered', 'fa fa-flag-checkered', NULL, NULL),
(275, 'flag-o', 'fa fa-flag-o', NULL, NULL),
(276, 'flash', 'fa fa-flash', NULL, NULL),
(277, 'flask', 'fa fa-flask', NULL, NULL),
(278, 'flickr', 'fa fa-flickr', NULL, NULL),
(279, 'floppy-o', 'fa fa-floppy-o', NULL, NULL),
(280, 'folder', 'fa fa-folder', NULL, NULL),
(281, 'folder-o', 'fa fa-folder-o', NULL, NULL),
(282, 'folder-open', 'fa fa-folder-open', NULL, NULL),
(283, 'folder-open-o', 'fa fa-folder-open-o', NULL, NULL),
(284, 'font', 'fa fa-font', NULL, NULL),
(285, 'fonticons', 'fa fa-fonticons', NULL, NULL),
(286, 'fort-awesome', 'fa fa-fort-awesome', NULL, NULL),
(287, 'forumbee', 'fa fa-forumbee', NULL, NULL),
(288, 'forward', 'fa fa-forward', NULL, NULL),
(289, 'foursquare', 'fa fa-foursquare', NULL, NULL),
(290, 'free-code-camp', 'fa fa-free-code-camp', NULL, NULL),
(291, 'frown-o', 'fa fa-frown-o', NULL, NULL),
(292, 'futbol-o', 'fa fa-futbol-o', NULL, NULL),
(293, 'gamepad', 'fa fa-gamepad', NULL, NULL),
(294, 'gavel', 'fa fa-gavel', NULL, NULL),
(295, 'gbp', 'fa fa-gbp', NULL, NULL),
(296, 'ge', 'fa fa-ge', NULL, NULL),
(297, 'gear', 'fa fa-gear', NULL, NULL),
(298, 'gears', 'fa fa-gears', NULL, NULL),
(299, 'genderless', 'fa fa-genderless', NULL, NULL),
(300, 'get-pocket', 'fa fa-get-pocket', NULL, NULL),
(301, 'gg', 'fa fa-gg', NULL, NULL),
(302, 'gg-circle', 'fa fa-gg-circle', NULL, NULL),
(303, 'gift', 'fa fa-gift', NULL, NULL),
(304, 'git', 'fa fa-git', NULL, NULL),
(305, 'git-square', 'fa fa-git-square', NULL, NULL),
(306, 'github', 'fa fa-github', NULL, NULL),
(307, 'github-alt', 'fa fa-github-alt', NULL, NULL),
(308, 'github-square', 'fa fa-github-square', NULL, NULL),
(309, 'gitlab', 'fa fa-gitlab', NULL, NULL),
(310, 'gittip', 'fa fa-gittip', NULL, NULL),
(311, 'glass', 'fa fa-glass', NULL, NULL),
(312, 'glide', 'fa fa-glide', NULL, NULL),
(313, 'glide-g', 'fa fa-glide-g', NULL, NULL),
(314, 'globe', 'fa fa-globe', NULL, NULL),
(315, 'google', 'fa fa-google', NULL, NULL),
(316, 'google-plus', 'fa fa-google-plus', NULL, NULL),
(317, 'google-plus-circle', 'fa fa-google-plus-circle', NULL, NULL),
(318, 'google-plus-official', 'fa fa-google-plus-official', NULL, NULL),
(319, 'google-plus-square', 'fa fa-google-plus-square', NULL, NULL),
(320, 'google-wallet', 'fa fa-google-wallet', NULL, NULL),
(321, 'graduation-cap', 'fa fa-graduation-cap', NULL, NULL),
(322, 'gratipay', 'fa fa-gratipay', NULL, NULL),
(323, 'grav', 'fa fa-grav', NULL, NULL),
(324, 'group', 'fa fa-group', NULL, NULL),
(325, 'h-square', 'fa fa-h-square', NULL, NULL),
(326, 'hacker-news', 'fa fa-hacker-news', NULL, NULL),
(327, 'hand-grab-o', 'fa fa-hand-grab-o', NULL, NULL),
(328, 'hand-lizard-o', 'fa fa-hand-lizard-o', NULL, NULL),
(329, 'hand-o-down', 'fa fa-hand-o-down', NULL, NULL),
(330, 'hand-o-left', 'fa fa-hand-o-left', NULL, NULL),
(331, 'hand-o-right', 'fa fa-hand-o-right', NULL, NULL),
(332, 'hand-o-up', 'fa fa-hand-o-up', NULL, NULL),
(333, 'hand-paper-o', 'fa fa-hand-paper-o', NULL, NULL),
(334, 'hand-peace-o', 'fa fa-hand-peace-o', NULL, NULL),
(335, 'hand-pointer-o', 'fa fa-hand-pointer-o', NULL, NULL),
(336, 'hand-rock-o', 'fa fa-hand-rock-o', NULL, NULL),
(337, 'hand-scissors-o', 'fa fa-hand-scissors-o', NULL, NULL),
(338, 'hand-spock-o', 'fa fa-hand-spock-o', NULL, NULL),
(339, 'hand-stop-o', 'fa fa-hand-stop-o', NULL, NULL),
(340, 'handshake-o', 'fa fa-handshake-o', NULL, NULL),
(341, 'hard-of-hearing', 'fa fa-hand-of-hearing', NULL, NULL),
(342, 'hashtag', 'fa fa-hashtag', NULL, NULL),
(343, 'hdd-o', 'fa fa-hdd-o', NULL, NULL),
(344, 'header', 'fa fa-header', NULL, NULL),
(345, 'headphones', 'fa fa-headphones', NULL, NULL),
(346, 'heart', 'fa fa-heart', NULL, NULL),
(347, 'heart-o', 'fa fa-heart-o', NULL, NULL),
(348, 'heartbeat', 'fa fa-heartbeat', NULL, NULL),
(349, 'history', 'fa fa-history', NULL, NULL),
(350, 'home', 'fa fa-home', NULL, NULL),
(351, 'hospital-o', 'fa fa-hospital-o', NULL, NULL),
(352, 'hotel', 'fa fa-hotel', NULL, NULL),
(353, 'hourglass', 'fa fa-hourglass', NULL, NULL),
(354, 'hourglass-1', 'fa fa-hourglass-1', NULL, NULL),
(355, 'hourglass-2', 'fa fa-hourglass-2', NULL, NULL),
(356, 'hourglass-3', 'fa fa-hourglass-3', NULL, NULL),
(357, 'hourglass-end', 'fa fa-hourglass-end', NULL, NULL),
(358, 'houzz', 'fa fa-houzz', NULL, NULL),
(359, 'html5', 'fa fa-html5', NULL, NULL),
(360, 'i-cursor', 'fa fa-i-cursor', NULL, NULL),
(361, 'id-badge', 'fa fa-id-badge', NULL, NULL),
(362, 'id-card', 'fa fa-id-card', NULL, NULL),
(363, 'id-card-o', 'fa fa-id-card-o', NULL, NULL),
(364, 'ils', 'fa fa-ils', NULL, NULL),
(365, 'imdb', 'fa fa-imdb', NULL, NULL),
(366, 'inbox', 'fa fa-inbox', NULL, NULL),
(367, 'indent', 'fa fa-indent', NULL, NULL),
(368, 'industry', 'fa fa-industry', NULL, NULL),
(369, 'info', 'fa fa-info', NULL, NULL),
(370, 'info-circle', 'fa fa-info-circle', NULL, NULL),
(371, 'inr', 'fa fa-inr', NULL, NULL),
(372, 'instagram', 'fa fa-instagram', NULL, NULL),
(373, 'institution', 'fa fa-institution', NULL, NULL),
(374, 'internet-explorer', 'fa fa-internet-explorer', NULL, NULL),
(375, 'intersex', 'fa fa-intersex', NULL, NULL),
(376, 'ioxhost', 'fa fa-ioxhost', NULL, NULL),
(377, 'italic', 'fa fa-italic', NULL, NULL),
(378, 'joomla', 'fa fa-joomla', NULL, NULL),
(379, 'jpy', 'fa fa-jpy', NULL, NULL),
(380, 'jsfiddle', 'fa fa-jsfiddle', NULL, NULL),
(381, 'key', 'fa fa-key', NULL, NULL),
(382, 'keyboard-o', 'fa fa-keyboard-o', NULL, NULL),
(383, 'krw', 'fa fa-krw', NULL, NULL),
(384, 'language', 'fa fa-language', NULL, NULL),
(385, 'laptop', 'fa fa-laptop', NULL, NULL),
(386, 'lastfm', 'fa fa-lastfm', NULL, NULL),
(387, 'lastfm-square', 'fa fa-lastfm-square', NULL, NULL),
(388, 'leaf', 'fa fa-leaf', NULL, NULL),
(389, 'leanpub', 'fa fa-leanpub', NULL, NULL),
(390, 'lemon-o', 'fa fa-lemon-o', NULL, NULL),
(391, 'level-down', 'fa fa-level-down', NULL, NULL),
(392, 'level-up', 'fa fa-level-up', NULL, NULL),
(393, 'life-saver', 'fa fa-life-saver', NULL, NULL),
(394, 'lightbulb-o', 'fa fa-lightbulb-o', NULL, NULL),
(395, 'line-chart', 'fa fa-line-chart', NULL, NULL),
(396, 'link', 'fa fa-link', NULL, NULL),
(397, 'linkedin', 'fa fa-linkedin', NULL, NULL),
(398, 'linkedin-square', 'fa fa-linkedin-square', NULL, NULL),
(399, 'linode', 'fa fa-linode', NULL, NULL),
(400, 'linux', 'fa fa-linux', NULL, NULL),
(401, 'list', 'fa fa-list', NULL, NULL),
(402, 'list-alt', 'fa fa-list-alt', NULL, NULL),
(403, 'list-ol', 'fa fa-list-ol', NULL, NULL),
(404, 'list-ul', 'fa fa-list-ul', NULL, NULL),
(405, 'location-arrow', 'fa fa-location-arrow', NULL, NULL),
(406, 'lock', 'fa fa-lock', NULL, NULL),
(407, 'long-arrow-down', 'fa fa-long-arrow-down', NULL, NULL),
(408, 'long-arrow-left', 'fa fa-long-arrow-left', NULL, NULL),
(409, 'long-arrow-right', 'fa fa-long-arrow-right', NULL, NULL),
(410, 'long-arrow-up', 'fa fa-long-arrow-up', NULL, NULL),
(411, 'low-vision', 'fa fa-low-vision', NULL, NULL),
(412, 'magic', 'fa fa-magic', NULL, NULL),
(413, 'magnet', 'fa fa-magnet', NULL, NULL),
(414, 'mail-forward', 'fa fa-mail-forward', NULL, NULL),
(415, 'mail-reply', 'fa fa-mail-reply', NULL, NULL),
(416, 'mail-reply-all', 'fa fa-mail-reply-all', NULL, NULL),
(417, 'male', 'fa fa-male', NULL, NULL),
(418, 'map', 'fa fa-map', NULL, NULL),
(419, 'map-marker', 'fa fa-map-marker', NULL, NULL),
(420, 'map-o', 'fa fa-map-o', NULL, NULL),
(421, 'map-pin', 'fa fa-map-pin', NULL, NULL),
(422, 'map-signs', 'fa fa-map-signs', NULL, NULL),
(423, 'mars', 'fa fa-mars', NULL, NULL),
(424, 'mars-double', 'fa fa-mars-double', NULL, NULL),
(425, 'mars-stroke', 'fa fa-mars-stroke', NULL, NULL),
(426, 'mars-stroke-h', 'fa fa-mars-stroke-h', NULL, NULL),
(427, 'mars-stroke-v', 'fa fa-mars-stroke-v', NULL, NULL),
(428, 'maxcdn', 'fa fa-maxcdn', NULL, NULL),
(429, 'meanpath', 'fa fa-meanpath', NULL, NULL),
(430, 'medium', 'fa fa-medium', NULL, NULL),
(431, 'medkit', 'fa fa-medkit', NULL, NULL),
(432, 'meetup', 'fa fa-meetup', NULL, NULL),
(433, 'meh-o', 'fa fa-meh-o', NULL, NULL),
(434, 'mercury', 'fa fa-mercury', NULL, NULL),
(435, 'microchip', 'fa fa-microchip', NULL, NULL),
(436, 'microphone', 'fa fa-microphone', NULL, NULL),
(437, 'microphone-slash', 'fa fa-microphone-slash', NULL, NULL),
(438, 'minus', 'fa fa-minus', NULL, NULL),
(439, 'minus-circle', 'fa fa-minus-circle', NULL, NULL),
(440, 'minus-square', 'fa fa-minus-square', NULL, NULL),
(441, 'minus-square-o', 'fa fa-minus-square-o', NULL, NULL),
(442, 'mixcloud', 'fa fa-mixcloud', NULL, NULL),
(443, 'mobile', 'fa fa-mobile', NULL, NULL),
(444, 'mobile-phone', 'fa fa-mobile-phone', NULL, NULL),
(445, 'modx', 'fa fa-modx', NULL, NULL),
(446, 'money', 'fa fa-money', NULL, NULL),
(447, 'moon-o', 'fa fa-moon-o', NULL, NULL),
(448, 'mortar-board', 'fa fa-mortar-board', NULL, NULL),
(449, 'motorcycle', 'fa fa-motorcycle', NULL, NULL),
(450, 'mouse-pointer', 'fa fa-mouse-pointer', NULL, NULL),
(451, 'navicon', 'fa fa-navicon', NULL, NULL),
(452, 'neuter', 'fa fa-neuter', NULL, NULL),
(453, 'newspaper-o', 'fa fa-newspaper-o', NULL, NULL),
(454, 'object-group', 'fa fa-object-group', NULL, NULL),
(455, 'object-ungroup', 'fa fa-object-ungroup', NULL, NULL),
(456, 'odnoklassniki', 'fa fa-odnoklassniki', NULL, NULL),
(457, 'odnoklassniki-square', 'fa fa-odnoklassniki-square', NULL, NULL),
(458, 'opencart', 'fa fa-opencart', NULL, NULL),
(459, 'openid', 'fa fa-openid', NULL, NULL),
(460, 'opera', 'fa fa-opera', NULL, NULL),
(461, 'optin-monster', 'fa fa-optin-monster', NULL, NULL),
(462, 'outdent', 'fa fa-outdent', NULL, NULL),
(463, 'pagelines', 'fa fa-pagelines', NULL, NULL),
(464, 'paint-brush', 'fa fa-paint-brush', NULL, NULL),
(465, 'paper-plane', 'fa fa-paper-plane', NULL, NULL),
(466, 'paper-plane-o', 'fa fa-paper-plane-o', NULL, NULL),
(467, 'paperclip', 'fa fa-paperclip', NULL, NULL),
(468, 'paragraph', 'fa fa-paragraph', NULL, NULL),
(469, 'paste', 'fa fa-paste', NULL, NULL),
(470, 'pause', 'fa fa-pause', NULL, NULL),
(471, 'pause-circle', 'fa fa-pause-circle', NULL, NULL),
(472, 'pause-circle-o', 'fa fa-pause-circle-o', NULL, NULL),
(473, 'paw', 'fa fa-paw', NULL, NULL),
(474, 'paypal', 'fa fa-paypal', NULL, NULL),
(475, 'pencil', 'fa fa-pencil', NULL, NULL),
(476, 'pencil-square', 'fa fa-pencil-square', NULL, NULL),
(477, 'pencil-square-o', 'fa fa-pencil-square-o', NULL, NULL),
(478, 'percent', 'fa fa-percent', NULL, NULL),
(479, 'phone', 'fa fa-phone', NULL, NULL),
(480, 'phone-square', 'fa fa-phone-square', NULL, NULL),
(481, 'photo', 'fa fa-photo', NULL, NULL),
(482, 'pie-chart', 'fa fa-pie-chart', NULL, NULL),
(483, 'pied-piper', 'fa fa-pied-piper', NULL, NULL),
(484, 'pied-piper-alt', 'fa fa-pied-piper-alt', NULL, NULL),
(485, 'pied-piper-pp', 'fa fa-pied-piper-pp', NULL, NULL),
(486, 'pinterest', 'fa fa-pinterest', NULL, NULL),
(487, 'pinterest-p', 'fa fa-pinterest-p', NULL, NULL),
(488, 'pinterest-square', 'fa fa-pinterest-square', NULL, NULL),
(489, 'plane', 'fa fa-plane', NULL, NULL),
(490, 'play', 'fa fa-play', NULL, NULL),
(491, 'play-circle', 'fa fa-play-circle', NULL, NULL),
(492, 'play-circle-o', 'fa fa-play-circle-o', NULL, NULL),
(493, 'plug', 'fa fa-plug', NULL, NULL),
(494, 'plus', 'fa fa-plus', NULL, NULL),
(495, 'plus-circle', 'fa fa-plus-circle', NULL, NULL),
(496, 'plus-square', 'fa fa-plus-square', NULL, NULL),
(497, 'plus-square-o', 'fa fa-plus-square-o', NULL, NULL),
(498, 'podcast', 'fa fa-podcast', NULL, NULL),
(499, 'power-off', 'fa fa-power-off', NULL, NULL),
(500, 'print', 'fa fa-print', NULL, NULL),
(501, 'product-hunt', 'fa fa-product-hunt', NULL, NULL),
(502, 'puzzle-piece', 'fa fa-puzzle-piece', NULL, NULL),
(503, 'qq', 'fa fa-qq', NULL, NULL),
(504, 'qrcode', 'fa fa-qrcode', NULL, NULL),
(505, 'question', 'fa fa-question', NULL, NULL),
(506, 'question-circle', 'fa fa-question-circle', NULL, NULL),
(507, 'question-circle-o', 'fa fa-question-circle-o', NULL, NULL),
(508, 'quora', 'fa fa-quora', NULL, NULL),
(509, 'quote-left', 'fa fa-quote-left', NULL, NULL),
(510, 'quote-right', 'fa fa-quote-right', NULL, NULL),
(511, 'ra', 'fa fa-ra', NULL, NULL),
(512, 'random', 'fa fa-random', NULL, NULL),
(513, 'ravelry', 'fa fa-ravelry', NULL, NULL),
(514, 'rebel', 'fa fa-rebel', NULL, NULL),
(515, 'recycle', 'fa fa-recycle', NULL, NULL),
(516, 'reddit', 'fa fa-reddit', NULL, NULL),
(517, 'reddit-alien', 'fa fa-reddit-alien', NULL, NULL),
(518, 'reddit-square', 'fa fa-reddit-square', NULL, NULL),
(519, 'refresh', 'fa fa-refresh', NULL, NULL),
(520, 'registered', 'fa fa-registered', NULL, NULL),
(521, 'remove', 'fa fa-remove', NULL, NULL),
(522, 'renren', 'fa fa-renren', NULL, NULL),
(523, 'repeat', 'fa fa-repeat', NULL, NULL),
(524, 'reply', 'fa fa-reply', NULL, NULL),
(525, 'reply-all', 'fa fa-reply-all', NULL, NULL),
(526, 'resistance', 'fa fa-resistance', NULL, NULL),
(527, 'retweet', 'fa fa-retweet', NULL, NULL),
(528, 'rmb', 'fa fa-rmb', NULL, NULL),
(529, 'road', 'fa fa-road', NULL, NULL),
(530, 'rocket', 'fa fa-rocket', NULL, NULL),
(531, 'rotate-left', 'fa fa-rotate-left', NULL, NULL),
(532, 'rotate-right', 'fa fa-rotate-right', NULL, NULL),
(533, 'rouble', 'fa fa-rouble', NULL, NULL),
(534, 'rss', 'fa fa-rss', NULL, NULL),
(535, 'rss-square', 'fa fa-rss-square', NULL, NULL),
(536, 'rub', 'fa fa-rub', NULL, NULL),
(537, 'ruble', 'fa fa-ruble', NULL, NULL),
(538, 'rupee', 'fa fa-rupee', NULL, NULL),
(539, 's15', 'fa fa-s15', NULL, NULL),
(540, 'safari', 'fa fa-safari', NULL, NULL),
(541, 'save', 'fa fa-save', NULL, NULL),
(542, 'scissors', 'fa fa-scissors', NULL, NULL),
(543, 'scribd', 'fa fa-scribd', NULL, NULL),
(544, 'search', 'fa fa-search', NULL, NULL),
(545, 'search-minus', 'fa fa-search-minus', NULL, NULL),
(546, 'search-plus', 'fa fa-search-plus', NULL, NULL),
(547, 'sellsy', 'fa fa-sellsy', NULL, NULL),
(548, 'send', 'fa fa-send', NULL, NULL),
(549, 'send-o', 'fa fa-send-o', NULL, NULL),
(550, 'server', 'fa fa-server', NULL, NULL),
(551, 'share', 'fa fa-share', NULL, NULL),
(552, 'share-alt', 'fa fa-share-alt', NULL, NULL),
(553, 'share-alt-square', 'fa fa-share-alt-square', NULL, NULL),
(554, 'share-square', 'fa fa-share-square', NULL, NULL),
(555, 'share-square-o', 'fa fa-share-square-o', NULL, NULL),
(556, 'shekel', 'fa fa-shekel', NULL, NULL),
(557, 'sheqel', 'fa fa-sheqel', NULL, NULL),
(558, 'shield', 'fa fa-shield', NULL, NULL),
(559, 'ship', 'fa fa-ship', NULL, NULL),
(560, 'shirtsinbulk', 'fa fa-shirtsinbulk', NULL, NULL),
(561, 'shopping-bag', 'fa fa-shopping-bag', NULL, NULL),
(562, 'shopping-basket', 'fa fa-shopping-basket', NULL, NULL),
(563, 'shopping-cart', 'fa fa-shopping-cart', NULL, NULL),
(564, 'shower', 'fa fa-shower', NULL, NULL),
(565, 'sign-in', 'fa fa-sign-in', NULL, NULL),
(566, 'sign-language', 'fa fa-sign-language', NULL, NULL),
(567, 'sign-out', 'fa fa-sign-out', NULL, NULL),
(568, 'signal', 'fa fa-signal', NULL, NULL),
(569, 'simplybuilt', 'fa fa-simplybuilt', NULL, NULL),
(570, 'sitemap', 'fa fa-sitemap', NULL, NULL),
(571, 'skyatlas', 'fa fa-skyatlas', NULL, NULL),
(572, 'skype', 'fa fa-skype', NULL, NULL),
(573, 'slack', 'fa fa-slack', NULL, NULL),
(574, 'sliders', 'fa fa-sliders', NULL, NULL),
(575, 'slideshare', 'fa fa-slideshare', NULL, NULL),
(576, 'smile-o', 'fa fa-smile-o', NULL, NULL),
(577, 'snapchat', 'fa fa-snapchat', NULL, NULL),
(578, 'snapchat-ghost', 'fa fa-snapchat-ghost', NULL, NULL),
(579, 'snapchat-square', 'fa fa-snapchat-square', NULL, NULL),
(580, 'snowflake-o', 'fa fa-snowflake-o', NULL, NULL),
(581, 'soccer-ball-o', 'fa fa-soccer-ball-o', NULL, NULL),
(582, 'sort', 'fa fa-sort', NULL, NULL),
(583, 'sort-alpha-asc', 'fa fa-sort-alpha-asc', NULL, NULL),
(584, 'sort-alpha-desc', 'fa fa-sort-alpha-desc', NULL, NULL),
(585, 'sort-amount-asc', 'fa fa-sort-amount-asc', NULL, NULL),
(586, 'sort-amount-desc', 'fa fa-sort-amount-desc', NULL, NULL),
(587, 'sort-asc', 'fa fa-sort-asc', NULL, NULL),
(588, 'sort-desc', 'fa fa-sort-desc', NULL, NULL),
(589, 'sort-down', 'fa fa-sort-down', NULL, NULL),
(590, 'sort-numeric-asc', 'fa fa-sort-numeric-asc', NULL, NULL),
(591, 'sort-numeric-desc', 'fa fa-sort-numeric-desc', NULL, NULL),
(592, 'soundcloud', 'fa fa-soundcloud', NULL, NULL),
(593, 'space-shuttle', 'fa fa-space-shuttle', NULL, NULL),
(594, 'spinner', 'fa fa-spinner', NULL, NULL),
(595, 'spoon', 'fa fa-spoon', NULL, NULL),
(596, 'spotify', 'fa fa-spotify', NULL, NULL),
(597, 'square', 'fa fa-square', NULL, NULL),
(598, 'square-o', 'fa fa-square-o', NULL, NULL),
(599, 'stack-exchange', 'fa fa-stack-exchange', NULL, NULL),
(600, 'stack-overflow', 'fa fa-stack-overflow', NULL, NULL),
(601, 'star', 'fa fa-star', NULL, NULL),
(602, 'star-half', 'fa fa-star-half', NULL, NULL),
(603, 'star-half-empty', 'fa fa-star-half-empty', NULL, NULL),
(604, 'star-half-full', 'fa fa-star-half-full', NULL, NULL),
(605, 'star-half-o', 'fa fa-star-half-o', NULL, NULL),
(606, 'star-o', 'fa fa-star-o', NULL, NULL),
(607, 'steam', 'fa fa-steam', NULL, NULL),
(608, 'steam-square', 'fa fa-steam-square', NULL, NULL),
(609, 'step-backward', 'fa fa-step-backward', NULL, NULL),
(610, 'step-forward', 'fa fa-step-forward', NULL, NULL),
(611, 'stethoscope', 'fa fa-stethoscope', NULL, NULL),
(612, 'sticky-note', 'fa fa-sticky-note', NULL, NULL),
(613, 'sticky-note-o', 'fa fa-sticky-note-o', NULL, NULL),
(614, 'stop', 'fa fa-stop', NULL, NULL),
(615, 'stop-circle', 'fa fa-stop-circle', NULL, NULL),
(616, 'stop-circle-o', 'fa fa-stop-circle-o', NULL, NULL),
(617, 'street-view', 'fa fa-street-view', NULL, NULL),
(618, 'strikethrough', 'fa fa-strikethrough', NULL, NULL),
(619, 'stumbleupon', 'fa fa-stumbleupon', NULL, NULL),
(620, 'stumbleupon-circle', 'fa fa-stumbleupon-circle', NULL, NULL),
(621, 'subscript', 'fa fa-subscript', NULL, NULL),
(622, 'subway', 'fa fa-subway', NULL, NULL),
(623, 'suitcase', 'fa fa-suitcase', NULL, NULL),
(624, 'sun-o', 'fa fa-sun-o', NULL, NULL),
(625, 'superpowers', 'fa fa-superpowers', NULL, NULL),
(626, 'superscript', 'fa fa-superscript', NULL, NULL),
(627, 'support', 'fa fa-support', NULL, NULL),
(628, 'table', 'fa fa-table', NULL, NULL),
(629, 'tablet', 'fa fa-tablet', NULL, NULL),
(630, 'tachometer', 'fa fa-tachometer', NULL, NULL),
(631, 'tag', 'fa fa-tag', NULL, NULL),
(632, 'tags', 'fa fa-tags', NULL, NULL),
(633, 'tasks', 'fa fa-tasks', NULL, NULL),
(634, 'taxi', 'fa fa-taxi', NULL, NULL),
(635, 'telegram', 'fa fa-telegram', NULL, NULL),
(636, 'television', 'fa fa-television', NULL, NULL),
(637, 'tencent-weibo', 'fa fa-tencent-weibo', NULL, NULL),
(638, 'terminal', 'fa fa-terminal', NULL, NULL),
(639, 'text-height', 'fa fa-text-height', NULL, NULL),
(640, 'text-width', 'fa fa-text-width', NULL, NULL),
(641, 'th', 'fa fa-th', NULL, NULL),
(642, 'th-large', 'fa fa-th-large', NULL, NULL),
(643, 'th-list', 'fa fa-th-list', NULL, NULL),
(644, 'themeisle', 'fa fa-themeisle', NULL, NULL),
(645, 'thermometer', 'fa fa-thermometer', NULL, NULL),
(646, 'thermometer-0', 'fa fa-thermometer-0', NULL, NULL),
(647, 'thermometer-1', 'fa fa-thermometer-1', NULL, NULL),
(648, 'thermometer-2', 'fa fa-thermometer-2', NULL, NULL),
(649, 'thermometer-3', 'fa fa-thermometer-3', NULL, NULL),
(650, 'thermometer-4', 'fa fa-thermometer-4', NULL, NULL),
(651, 'thermometer-empty', 'fa fa-thermometer-empty', NULL, NULL),
(652, 'thermometer-full', 'fa fa-thermometer-full', NULL, NULL),
(653, 'thermometer-half', 'fa fa-thermometer-half', NULL, NULL),
(654, 'thermometer-quarter', 'fa fa-thermometer-quarter', NULL, NULL),
(655, 'thermometer-three-quarters', 'fa fa-thermometer-three-quarters', NULL, NULL),
(656, 'thumb-tack', 'fa fa-thumb-tack', NULL, NULL),
(657, 'thumbs-down', 'fa fa-thumbs-down', NULL, NULL),
(658, 'thumbs-o-down', 'fa fa-thumbs-o-down', NULL, NULL),
(659, 'thumbs-o-up', 'fa fa-thumbs-o-up', NULL, NULL),
(660, 'ticket', 'fa fa-ticket', NULL, NULL),
(661, 'times', 'fa fa-times', NULL, NULL),
(662, 'times-circle-o', 'fa fa-times-circle-o', NULL, NULL),
(663, 'times-rectangle', 'fa fa-times-rectangle', NULL, NULL),
(664, 'times-rectangle-o', 'fa fa-times-rectangle-o', NULL, NULL),
(665, 'tint', 'fa fa-tint', NULL, NULL),
(666, 'toggle-down', 'fa fa-toggle-down', NULL, NULL),
(667, 'toggle-left', 'fa fa-toggle-left', NULL, NULL),
(668, 'toggle-off', 'fa fa-toggle-off', NULL, NULL),
(669, 'toggle-on', 'fa fa-toggle-on', NULL, NULL),
(670, 'toggle-right', 'fa fa-toggle-right', NULL, NULL),
(671, 'toggle-up', 'fa fa-toggle-up', NULL, NULL),
(672, 'trademark', 'fa fa-trademark', NULL, NULL),
(673, 'transgender', 'fa fa-transgender', NULL, NULL),
(674, 'transgender-alt', 'fa fa-transgender-alt', NULL, NULL),
(675, 'trash', 'fa fa-trash', NULL, NULL),
(676, 'trash-o', 'fa fa-trash-o', NULL, NULL),
(677, 'tree', 'fa fa-tree', NULL, NULL),
(678, 'trello', 'fa fa-trello', NULL, NULL),
(679, 'tripadvisor', 'fa fa-tripadvisor', NULL, NULL),
(680, 'trophy', 'fa fa-trophy', NULL, NULL),
(681, 'truck', 'fa fa-truck', NULL, NULL),
(682, 'try', 'fa fa-try', NULL, NULL),
(683, 'tty', 'fa fa-tty', NULL, NULL),
(684, 'tumblr', 'fa fa-tumblr', NULL, NULL),
(685, 'tumblr-square', 'fa fa-tumblr-square', NULL, NULL),
(686, 'turkish-lira', 'fa fa-turkish-lira', NULL, NULL),
(687, 'tv', 'fa fa-tv', NULL, NULL),
(688, 'twitch', 'fa fa-twitch', NULL, NULL),
(689, 'twitter', 'fa fa-twitter', NULL, NULL),
(690, 'twitter-square', 'fa fa-twitter-square', NULL, NULL),
(691, 'umbrella', 'fa fa-umbrella', NULL, NULL),
(692, 'underline', 'fa fa-underline', NULL, NULL),
(693, 'undo', 'fa fa-undo', NULL, NULL),
(694, 'universal-access', 'fa fa-universal-access', NULL, NULL),
(695, 'university', 'fa fa-university', NULL, NULL),
(696, 'unlink', 'fa fa-unlink', NULL, NULL),
(697, 'unlock', 'fa fa-unlock', NULL, NULL),
(698, 'unlock-alt', 'fa fa-unlock-alt', NULL, NULL),
(699, 'unsorted', 'fa fa-unsorted', NULL, NULL),
(700, 'upload', 'fa fa-upload', NULL, NULL),
(701, 'usb', 'fa fa-usb', NULL, NULL),
(702, 'usd', 'fa fa-usd', NULL, NULL),
(703, 'user-circle', 'fa fa-user-circle', NULL, NULL),
(704, 'user-circle-o', 'fa fa-user-circle-o', NULL, NULL),
(705, 'user-md', 'fa fa-user-md', NULL, NULL),
(706, 'user-o', 'fa fa-user-o', NULL, NULL),
(707, 'user-plus', 'fa fa-user-plus', NULL, NULL),
(708, 'user-secret', 'fa fa-user-secret', NULL, NULL),
(709, 'user-times', 'fa fa-user-times', NULL, NULL),
(710, 'users', 'fa fa-users', NULL, NULL),
(711, 'vcard', 'fa fa-vcard', NULL, NULL),
(712, 'vcard-o', 'fa fa-vcard-o', NULL, NULL),
(713, 'venus', 'fa fa-venus', NULL, NULL),
(714, 'venus-double', 'fa fa-venus-double', NULL, NULL),
(715, 'venus-mars', 'fa fa-venus-mars', NULL, NULL),
(716, 'viacoin', 'fa fa-viacoin', NULL, NULL),
(717, 'viadeo', 'fa fa-viadeo', NULL, NULL),
(718, 'viadeo-square', 'fa fa-viadeo-square', NULL, NULL),
(719, 'video-camera', 'fa fa-video-camera', NULL, NULL),
(720, 'vimeo', 'fa fa-vimeo', NULL, NULL),
(721, 'vimeo-square', 'fa fa-vimeo-square', NULL, NULL),
(722, 'vine', 'fa fa-vine', NULL, NULL),
(723, 'vk', 'fa fa-vk', NULL, NULL),
(724, 'volume-control-phone', 'fa fa-volume-control-phone', NULL, NULL),
(725, 'volume-down', 'fa fa-volume-down', NULL, NULL),
(726, 'volume-off', 'fa fa-volume-off', NULL, NULL),
(727, 'volume-up', 'fa fa-volume-up', NULL, NULL),
(728, 'warning', 'fa fa-warning', NULL, NULL),
(729, 'wechat', 'fa fa-wechat', NULL, NULL),
(730, 'weibo', 'fa fa-weibo', NULL, NULL),
(731, 'weixin', 'fa fa-weixin', NULL, NULL),
(732, 'whatsapp', 'fa fa-whatsapp', NULL, NULL),
(733, 'wheelchair', 'fa fa-wheelchair', NULL, NULL),
(734, 'wheelchair-alt', 'fa fa-wheelchair-alt', NULL, NULL),
(735, 'wifi', 'fa fa-wifi', NULL, NULL),
(736, 'wikipedia-w', 'fa fa-wikipedia-w', NULL, NULL),
(737, 'window-close', 'fa fa-window-close', NULL, NULL),
(738, 'window-close-o', 'fa fa-window-close-o', NULL, NULL),
(739, 'window-maximize', 'fa fa-window-maximize', NULL, NULL),
(740, 'window-minimize', 'fa fa-window-minimize', NULL, NULL),
(741, 'window-restore', 'fa fa-window-restore', NULL, NULL),
(742, 'windows', 'fa fa-windows', NULL, NULL),
(743, 'won', 'fa fa-won', NULL, NULL),
(744, 'wordpress', 'fa fa-wordpress', NULL, NULL),
(745, 'wpbeginner', 'fa fa-wpbeginner', NULL, NULL),
(746, 'wpexplorer', 'fa fa-wpexplorer', NULL, NULL),
(747, 'wpforms', 'fa fa-wpforms', NULL, NULL),
(748, 'wrench', 'fa fa-wrench', NULL, NULL),
(749, 'xing', 'fa fa-xing', NULL, NULL),
(750, 'xing-square', 'fa fa-xing-square', NULL, NULL),
(751, 'y-combinator', 'fa fa-y-combinator', NULL, NULL),
(752, 'y-combinator-square', 'fa fa-y-combinator-square', NULL, NULL),
(753, 'yahoo', 'fa fa-yahoo', NULL, NULL),
(754, 'yc', 'fa fa-yc', NULL, NULL),
(755, 'yc-square', 'fa fa-yc-square', NULL, NULL),
(756, 'yelp', 'fa fa-yelp', NULL, NULL),
(757, 'yen', 'fa fa-yen', NULL, NULL),
(758, 'yoast', 'fa fa-yoast', NULL, NULL),
(759, 'youtube', 'fa fa-youtube', NULL, NULL),
(760, 'youtube-play', 'fa fa-youtube-play', NULL, NULL),
(761, 'youtube-square', 'fa fa-youtube-square', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lecturers`
--

CREATE TABLE `lecturers` (
  `lecturer_id` int(10) UNSIGNED NOT NULL,
  `l_surname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `l_othernames` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `l_contacts` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `level_id` int(10) UNSIGNED NOT NULL,
  `year_id` int(10) UNSIGNED NOT NULL,
  `semester_id` int(10) UNSIGNED NOT NULL,
  `level_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`level_id`, `year_id`, `semester_id`, `level_name`, `level_description`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '1^1', 'Year 1 Sem 1', '2018-07-14 19:55:36', '2018-07-14 19:55:36'),
(2, 1, 2, '1^2', 'Year 1 Sem 2', '2018-07-17 09:33:36', '2018-07-17 09:33:36'),
(3, 2, 1, '2^1', 'Year 2 Sem 1', '2018-07-21 20:28:44', '2018-07-21 20:28:44'),
(4, 2, 2, '2^2', 'Year 2 Sem 2', '2018-07-21 20:30:33', '2018-07-21 20:30:33');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `rep_status` tinyint(1) NOT NULL DEFAULT '0',
  `unit_id` int(10) UNSIGNED NOT NULL,
  `academic_id` int(10) UNSIGNED NOT NULL,
  `level_id` int(10) UNSIGNED NOT NULL,
  `m_assignment` int(10) UNSIGNED NOT NULL,
  `m_cat` int(10) UNSIGNED NOT NULL,
  `m_exam` int(10) UNSIGNED NOT NULL,
  `m_total_marks` int(10) UNSIGNED NOT NULL,
  `m_grade` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `m_gp` int(10) UNSIGNED NOT NULL,
  `m_term_hours` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`id`, `student_id`, `rep_status`, `unit_id`, `academic_id`, `level_id`, `m_assignment`, `m_cat`, `m_exam`, `m_total_marks`, `m_grade`, `m_gp`, `m_term_hours`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 7, 0, 1, 1, 1, 25, 10, 45, 63, 'B', 4, NULL, NULL, '2018-07-20 18:53:31', '2018-07-20 18:53:31'),
(2, 7, 0, 2, 1, 1, 15, 19, 51, 68, 'B', 4, NULL, NULL, '2018-07-20 18:54:13', '2018-07-20 18:54:13'),
(4, 7, 0, 3, 1, 1, 16, 20, 41, 59, 'C', 3, NULL, NULL, '2018-07-20 18:56:42', '2018-07-20 18:56:42'),
(5, 7, 0, 4, 1, 1, 14, 28, 40, 61, 'B', 4, NULL, NULL, '2018-07-20 18:57:12', '2018-07-20 18:57:12'),
(7, 7, 0, 5, 1, 1, 24, 20, 48, 70, 'A', 5, NULL, NULL, '2018-07-20 18:58:23', '2018-07-20 18:58:23'),
(8, 7, 0, 6, 1, 1, 18, 24, 56, 77, 'A', 5, NULL, NULL, '2018-07-20 18:58:57', '2018-07-20 18:58:57'),
(9, 7, 0, 7, 1, 1, 15, 21, 43, 61, 'B', 4, NULL, NULL, '2018-07-20 18:59:36', '2018-07-20 18:59:36'),
(10, 1, 0, 1, 1, 1, 10, 15, 47, 60, 'B', 4, NULL, NULL, '2018-07-21 16:18:10', '2018-07-21 16:18:10'),
(11, 1, 0, 2, 1, 1, 10, 21, 50, 66, 'B', 4, NULL, NULL, '2018-07-21 16:39:52', '2018-07-21 16:39:52'),
(12, 1, 0, 3, 1, 1, 20, 14, 43, 60, 'B', 4, NULL, NULL, '2018-07-21 16:43:39', '2018-07-21 16:43:39'),
(13, 1, 0, 4, 1, 1, 20, 29, 50, 75, 'A', 5, NULL, NULL, '2018-07-21 16:46:44', '2018-07-21 16:46:44'),
(14, 1, 0, 5, 1, 1, 10, 18, 38, 52, 'C', 3, NULL, NULL, '2018-07-21 16:47:56', '2018-07-21 16:47:56'),
(15, 1, 0, 6, 1, 1, 20, 15, 36, 54, 'C', 3, NULL, NULL, '2018-07-21 16:51:55', '2018-07-21 16:51:55'),
(16, 1, 0, 7, 1, 1, 14, 18, 49, 65, 'B', 4, NULL, NULL, '2018-07-21 16:52:53', '2018-07-21 16:52:53'),
(17, 6, 0, 1, 1, 1, 10, 25, 44, 62, 'B', 4, NULL, NULL, '2018-07-21 16:57:26', '2018-07-21 16:57:26'),
(18, 6, 0, 2, 1, 1, 25, 21, 54, 77, 'A', 5, NULL, NULL, '2018-07-21 16:58:23', '2018-07-21 16:58:23'),
(19, 6, 0, 3, 1, 1, 24, 21, 51, 74, 'A', 5, NULL, NULL, '2018-07-21 17:01:21', '2018-07-21 17:01:21'),
(20, 6, 0, 4, 1, 1, 23, 24, 50, 74, 'A', 5, NULL, NULL, '2018-07-21 17:02:12', '2018-07-21 17:02:12'),
(21, 6, 0, 5, 1, 1, 24, 20, 44, 66, 'B', 4, NULL, NULL, '2018-07-21 17:04:00', '2018-07-21 17:04:00'),
(22, 6, 0, 6, 1, 1, 23, 20, 45, 67, 'B', 4, NULL, NULL, '2018-07-21 17:05:36', '2018-07-21 17:05:36'),
(23, 6, 0, 7, 1, 1, 23, 24, 48, 72, 'A', 5, NULL, NULL, '2018-07-21 17:07:17', '2018-07-21 17:07:17'),
(24, 1, 0, 8, 1, 2, 18, 25, 57, 79, 'A', 5, NULL, NULL, '2018-07-23 13:53:52', '2018-07-23 13:53:52'),
(25, 1, 0, 9, 1, 2, 10, 22, 40, 56, 'C', 3, NULL, NULL, '2018-07-23 13:54:14', '2018-07-23 13:54:14'),
(26, 1, 0, 10, 1, 2, 28, 17, 43, 66, 'B', 4, NULL, NULL, '2018-07-23 13:54:51', '2018-07-23 13:54:51'),
(27, 1, 0, 11, 1, 2, 23, 24, 49, 73, 'A', 5, NULL, NULL, '2018-07-23 13:55:09', '2018-07-23 13:55:09'),
(28, 1, 0, 12, 1, 2, 21, 10, 35, 51, 'C', 3, NULL, NULL, '2018-07-23 13:55:23', '2018-07-23 13:55:23'),
(29, 1, 0, 13, 1, 2, 12, 21, 40, 57, 'C', 3, NULL, NULL, '2018-07-23 13:55:37', '2018-07-23 13:55:37'),
(30, 1, 0, 14, 2, 3, 13, 20, 60, 77, 'A', 5, NULL, NULL, '2018-07-24 14:40:50', '2018-07-24 14:40:50'),
(31, 1, 0, 15, 2, 3, 14, 22, 34, 52, 'C', 3, NULL, NULL, '2018-07-24 14:41:48', '2018-07-24 14:41:48'),
(32, 1, 0, 16, 2, 3, 18, 26, 45, 67, 'B', 4, NULL, NULL, '2018-07-24 14:42:07', '2018-07-24 14:42:07'),
(33, 1, 0, 17, 2, 3, 20, 15, 21, 39, 'F', 1, NULL, NULL, '2018-07-24 14:42:23', '2018-07-24 14:42:23'),
(34, 1, 0, 18, 2, 3, 16, 20, 44, 62, 'B', 4, NULL, NULL, '2018-07-24 14:42:55', '2018-07-24 14:42:55'),
(35, 1, 0, 19, 2, 3, 30, 30, 61, 91, 'A', 5, NULL, NULL, '2018-07-24 14:43:22', '2018-07-24 14:43:22'),
(36, 1, 0, 20, 2, 3, 12, 15, 37, 50, 'C', 3, NULL, NULL, '2018-07-24 14:43:45', '2018-07-24 14:43:45');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon_id` int(10) UNSIGNED DEFAULT NULL,
  `position` int(10) UNSIGNED NOT NULL,
  `visible` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `menu_name`, `icon_id`, `position`, `visible`) VALUES
(1, 'Browse Categories', 544, 1, 1),
(2, 'User Options', 507, 3, 1),
(3, 'Control Panel', 298, 1, 1),
(4, 'Version', 506, 2, 1),
(5, 'Reports', 263, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu_roles`
--

CREATE TABLE `menu_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_roles`
--

INSERT INTO `menu_roles` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 3),
(2, 1, 4),
(3, 2, 1),
(4, 2, 2),
(5, 2, 5);

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
(2, '2014_10_12_000001_create_password_resets_table', 1),
(3, '2016_12_22_171531_CreateAdminTable', 1),
(4, '2018_01_31_000002_create_parents_table', 1),
(5, '2018_01_31_000003_create_agents_table', 1),
(6, '2018_01_31_000004_create_applicants_table', 1),
(7, '2018_01_31_000005_create_colleges_table', 1),
(8, '2018_01_31_000006_create_schools_table', 1),
(9, '2018_01_31_000007_create_departments_table', 1),
(10, '2018_01_31_000008_create_courses_table', 1),
(11, '2018_01_31_000009_create_academics_table', 1),
(12, '2018_01_31_000010_create_modes_table', 1),
(13, '2018_01_31_000011_create_admission_types_table', 1),
(14, '2018_01_31_000012_create_semesters_table', 1),
(15, '2018_01_31_000012_create_years_table', 1),
(16, '2018_01_31_000013_create_levels_table', 1),
(17, '2018_01_31_000014_create_units_table', 1),
(18, '2018_01_31_000015_create_programs_table', 1),
(19, '2018_01_31_000016_create_lecturers_table', 1),
(20, '2018_01_31_000017_create_terms_table', 1),
(21, '2018_01_31_000018_create_statuses_table', 1),
(22, '2018_01_31_085737_create_marks_table', 1),
(23, '2018_01_31_085789_create_fees_table', 1),
(24, '2018_01_31_085826_create_fee_finance_details_table', 1),
(25, '2018_01_31_085938_create_payments_table', 1),
(26, '2018_01_31_090111_create_unit_registereds_table', 1),
(27, '2018_01_31_091243_create_staff_table', 1),
(28, '2018_03_23_093614_create_receipts_table', 1),
(29, '2018_03_23_102359_create_displinaries_table', 1),
(30, '2018_03_23_110700_create_transactions_table', 1),
(31, '2018_03_23_110702_create_receipt_details_table', 1),
(32, '2018_06_08_071605_create_comments_table', 1),
(33, '2018_06_09_101809_create_notifications_table', 1),
(34, '2018_12_13_143300_create_settings_table', 1),
(35, '2018_12_22_221944_create_roles_table', 1),
(36, '2018_12_22_222208_create_admin_roles_table', 1),
(37, '2018_12_22_222646_create_user_roles_table', 1),
(38, '2018_12_29_140814_create_icons_table', 1),
(39, '2018_12_29_140818_create_menus_table', 1),
(40, '2018_12_29_141941_create_menu_roles_table', 1),
(41, '2018_12_30_155531_create_submenus_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `modes`
--

CREATE TABLE `modes` (
  `mode_id` int(10) UNSIGNED NOT NULL,
  `mode_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modes`
--

INSERT INTO `modes` (`mode_id`, `mode_name`, `created_at`, `updated_at`) VALUES
(1, 'REGULAR', '2018-07-14 19:56:18', '2018-07-14 19:56:18');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` int(10) UNSIGNED NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `parent_id` int(10) UNSIGNED NOT NULL,
  `parentfullname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_contacts` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parents`
--

INSERT INTO `parents` (`parent_id`, `parentfullname`, `p_contacts`, `created_at`, `updated_at`) VALUES
(1, 'test parent', '0728520544', '2018-07-14 19:59:59', '2018-07-14 19:59:59'),
(2, 'Joseph Chihi', '0729953466', '2018-07-14 19:55:45', '2018-07-14 19:55:45'),
(3, 'Joseph Chihi', '0729953466', '2018-07-14 19:57:49', '2018-07-14 19:57:49'),
(4, 'Peter Clakci', '0725055021', '2018-07-14 20:14:36', '2018-07-14 20:14:36'),
(5, 'JOS', '07', '2018-07-17 01:54:15', '2018-07-17 01:54:15'),
(6, 'k', 'sdk', '2018-07-17 01:55:27', '2018-07-17 01:55:27'),
(7, 'k', 'sdk', '2018-07-17 01:55:49', '2018-07-17 01:55:49'),
(8, 'k', 'sdk', '2018-07-17 01:56:26', '2018-07-17 01:56:26'),
(9, 'Cornelius Bii', '0752120120', '2018-07-20 18:38:34', '2018-07-20 18:38:34'),
(10, 'Peter Gatheri', '0720443280', '2018-07-21 12:53:21', '2018-07-21 12:53:21'),
(11, 'Mary Waithera', '0701524020', '2018-07-21 14:08:35', '2018-07-21 14:08:35');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `level_id` int(10) UNSIGNED NOT NULL,
  `fee_finance_detail_id` int(10) UNSIGNED NOT NULL,
  `payment_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_amount` double(8,2) NOT NULL,
  `amount_due` double(8,2) NOT NULL,
  `remark` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `program_id` int(10) UNSIGNED NOT NULL,
  `academic_id` int(10) UNSIGNED NOT NULL,
  `level_id` int(10) UNSIGNED NOT NULL,
  `course_id` int(10) UNSIGNED NOT NULL,
  `admissiontype_id` int(10) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`program_id`, `academic_id`, `level_id`, `course_id`, `admissiontype_id`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, '2018-06-10', '2018-08-24', '2018-07-14 19:58:14', '2018-07-21 20:23:49'),
(2, 1, 1, 2, 1, '2018-07-04', '2018-10-17', '2018-07-20 19:17:26', '2018-07-20 19:17:26'),
(3, 1, 1, 3, 1, '2018-07-04', '2018-10-22', '2018-07-20 19:19:11', '2018-07-20 19:19:11'),
(4, 1, 2, 2, 1, '2019-01-07', '2019-04-25', '2018-07-20 19:22:59', '2018-07-20 19:22:59'),
(5, 1, 2, 1, 1, '2018-09-04', '2018-12-19', '2018-07-21 20:24:59', '2018-07-21 20:24:59'),
(6, 2, 3, 2, 1, '2019-09-03', '2019-12-20', '2018-07-21 20:58:15', '2018-07-21 21:11:57'),
(7, 1, 2, 3, 1, '2019-01-08', '2019-04-19', '2018-07-21 21:09:09', '2018-07-21 21:09:09'),
(8, 2, 3, 3, 1, '2019-09-09', '2019-12-20', '2018-07-21 21:11:09', '2018-07-21 21:11:09'),
(9, 2, 4, 2, 1, '2020-01-08', '2020-04-17', '2018-07-21 21:13:42', '2018-07-21 21:13:42'),
(10, 2, 3, 1, 1, '2020-05-12', '2020-08-28', '2018-07-21 21:20:30', '2018-07-21 21:20:30'),
(11, 2, 4, 3, 1, '2020-01-07', '2020-04-24', '2018-07-21 21:24:19', '2018-07-21 21:24:19');

-- --------------------------------------------------------

--
-- Table structure for table `receipts`
--

CREATE TABLE `receipts` (
  `id` int(10) UNSIGNED NOT NULL,
  `receipt_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `receipt_details`
--

CREATE TABLE `receipt_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `receipt_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `transaction_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'instructor');

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `school_id` int(10) UNSIGNED NOT NULL,
  `college_id` int(10) UNSIGNED NOT NULL,
  `school_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_director` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`school_id`, `college_id`, `school_name`, `school_director`, `created_at`, `updated_at`) VALUES
(1, 1, 'School of science', 'Matuya', '2018-07-14 19:54:51', '2018-07-14 19:54:51');

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `id` int(10) UNSIGNED NOT NULL,
  `semester` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`id`, `semester`, `s_description`, `created_at`, `updated_at`) VALUES
(1, '1', 'sem 1', '2018-07-14 19:55:29', '2018-07-14 19:55:29'),
(2, '2', 'sem 2', '2018-07-17 09:32:19', '2018-07-17 09:32:19'),
(3, '3', 'sem 3', '2018-07-17 09:33:20', '2018-07-17 09:33:20');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `appname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `favicon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifications` tinyint(1) NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `appname`, `content`, `favicon`, `notifications`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'Lincoln Schools', '', 'FLbHd2oOTW8UBAEFXGb41Pa2a4jYKH0YudffNtaZ.jpeg', 1, '57RaseTp8FNqYYmEk17YKDjIKORKUzZSS3zj2eNc.jpeg', '2018-07-13 11:24:48', '2018-07-13 11:41:11');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(10) UNSIGNED NOT NULL,
  `s_employee_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` int(10) UNSIGNED NOT NULL,
  `department_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_surname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_othernames` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_contacts` int(10) UNSIGNED NOT NULL,
  `picturefile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass_key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `national_id` int(10) UNSIGNED NOT NULL,
  `s_gender` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_dob` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_marital_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `status_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `program_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`status_id`, `student_id`, `program_id`, `created_at`, `updated_at`) VALUES
(1, 1, 10, '2018-07-14 19:57:49', '2018-07-24 14:02:56'),
(2, 2, 3, '2018-07-14 20:14:36', '2018-07-20 19:19:42'),
(3, 3, 1, '2018-07-17 01:54:15', '2018-07-17 01:54:15'),
(4, 6, 1, '2018-07-17 01:56:26', '2018-07-17 01:56:26'),
(5, 4, 1, '2018-07-17 01:56:26', '2018-07-17 01:56:26'),
(6, 7, 4, '2018-07-20 18:38:34', '2018-07-20 19:23:31'),
(7, 8, 1, '2018-07-21 12:53:23', '2018-07-21 12:53:23'),
(8, 9, 1, '2018-07-21 14:08:39', '2018-07-21 14:08:39');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(10) UNSIGNED NOT NULL,
  `s_othernames` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_surname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_gender` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_contacts` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_dob` date NOT NULL,
  `s_nationalid` int(10) UNSIGNED NOT NULL,
  `s_denomination` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_admdate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_graddate` date DEFAULT NULL,
  `s_homeaddress` text COLLATE utf8mb4_unicode_ci,
  `s_district` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_area` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL,
  `agent_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `s_approved` tinyint(1) NOT NULL DEFAULT '0',
  `is_classrep` tinyint(1) NOT NULL DEFAULT '0',
  `s_emailaddress` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_applicationno` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_applied` datetime NOT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `s_othernames`, `s_surname`, `s_gender`, `s_contacts`, `s_dob`, `s_nationalid`, `s_denomination`, `s_admdate`, `s_graddate`, `s_homeaddress`, `s_district`, `s_area`, `s_country`, `s_photo`, `parent_id`, `agent_id`, `user_id`, `s_approved`, `is_classrep`, `s_emailaddress`, `s_applicationno`, `date_applied`, `remarks`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Amos Kuria', 'Chihi', 'M', '0725044135', '1995-01-24', 32520054, 'Christian', '21-07-2018 00:39:01', '2022-06-21', 'Kiambu', 'Gatundu', NULL, 'Kenya', '60728_2018-07-14_1531609069.jpg', 3, NULL, 2, 1, 0, 'amoschihi@gmail.com', 'BS02/038/2018', '2018-07-14 22:54:45', 'Approved.', NULL, '2018-07-14 19:57:49', '2018-07-20 18:39:53'),
(2, 'Francis Ng\'ang\'a', 'Kamau', 'M', '0724897696', '2018-07-03', 32510447, 'Muslim', '20-07-2018 22:15:11', '2022-06-20', 'Juja', 'Juja', NULL, 'Kenya', NULL, 4, NULL, 2, 1, 0, 'Fnganga204@gmail.com', 'BS01/204/2018', '2018-07-14 23:05:01', 'Approved.', NULL, '2018-07-14 20:14:36', '2018-07-20 16:15:17'),
(3, 'Joseph Ndung\'u', 'Mumbi', 'M', '0701386318', '2018-07-03', 29851265, 'Muslim', NULL, NULL, 'Ruiru', 'Gatundu', NULL, 'Kenya', NULL, 5, NULL, 2, 0, 0, 'josephmajoez@gmail.com', '6ZQK', '2018-07-11 16:30:26', NULL, NULL, '2018-07-17 01:54:15', '2018-07-20 19:32:26'),
(4, 'Kelly Nthenya', 'Mutua', 'F', '0726565225', '2018-07-11', 33513584, 'Christian', NULL, NULL, 'Machakos', 'Machakos', NULL, 'Kenya', NULL, 6, NULL, 2, 0, 0, 'kelmutua@gmail.com', 'ETUT', '2018-07-11 16:47:59', NULL, NULL, '2018-07-17 01:55:27', '2018-07-20 19:32:26'),
(6, 'Sharon', 'Musawa', 'F', '0704532366', '2018-07-11', 35842510, 'Christian', '20-07-2018 21:19:42', '2022-06-20', 'Bungoma', 'Kimilili', NULL, 'Uganda', NULL, 8, NULL, 2, 1, 0, 'xawntrinnie@gmail.com', 'BS02/083/2018', '2018-07-11 16:47:59', 'Approved.', NULL, '2018-07-17 01:56:26', '2018-07-20 15:20:15'),
(7, 'Joash', 'Bii', 'M', '0721584445', '1982-03-18', 25872103, 'Christian', '21-07-2018 00:40:35', '2022-06-21', 'Eldoret', 'Musoriot', NULL, 'Kenya', NULL, 9, NULL, 2, 1, 0, 'kbjoash@gmail.com', 'BS02/002/2018', '2018-07-20 21:31:35', 'Approved.', NULL, '2018-07-20 18:38:34', '2018-07-20 18:41:00'),
(8, 'Dennis Wambui', 'Gatheri', 'M', '0720443280', '1992-02-12', 31250220, 'Christian', NULL, NULL, 'Naivasha', 'Kinangop', NULL, 'Kenya', '23974_2018-07-21_1532188402.jpg', 10, NULL, 2, 0, 0, 'dgatheriwambui@gmail.com', '9VJG', '2018-07-21 15:47:06', NULL, NULL, '2018-07-21 12:53:23', '2018-07-21 12:53:23'),
(9, 'Waithera Edwin', 'Mwangi', 'M', '0724477841', '1996-01-03', 34256305, 'Christian', NULL, NULL, 'Murang\'a', 'Makuyu', NULL, 'Kenya', '57699_2018-07-21_1532192916.jpg', 11, NULL, 2, 0, 0, 'edwinquintana3@gmail.com', 'AEPR', '2018-07-21 17:02:49', NULL, NULL, '2018-07-21 14:08:39', '2018-07-21 14:08:39');

-- --------------------------------------------------------

--
-- Table structure for table `submenus`
--

CREATE TABLE `submenus` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED NOT NULL,
  `icon_id` int(10) UNSIGNED DEFAULT NULL,
  `menu_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` int(10) UNSIGNED NOT NULL,
  `visible` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `submenus`
--

INSERT INTO `submenus` (`id`, `menu_id`, `icon_id`, `menu_name`, `link`, `position`, `visible`) VALUES
(1, 3, 451, 'Menu Management', 'admin/menu_management', 1, 1),
(2, 1, 324, 'Applicants/Admissions', 'admin/applicants', 1, 1),
(3, 1, 321, 'Classes', 'admin/academics', 3, 1),
(4, 1, 704, 'Student Base', 'admin/students', 2, 1),
(5, 4, 297, 'Settings', 'admin/settings', 2, 1),
(6, 1, 97, 'Marketers/Agents', 'admin/agents', 4, 1),
(7, 1, 446, 'Fees Management', 'admin/fees_management', 5, 1),
(8, 3, 406, 'Roles/Privileges', 'admin/roles_privileges', 2, 1),
(9, 2, 381, 'Change Password', 'admin/change_password', 1, 1),
(10, 4, 381, 'Change Password', 'admin/change_password', 1, 1),
(11, 2, 177, 'Comments', 'admin/comments', 2, 1),
(12, 2, 505, 'About', 'admin/about', 3, 1),
(13, 4, 505, 'About', 'admin/about', 3, 1),
(14, 5, 262, 'Students List', 'admin/students_list', 1, 1),
(15, 5, 204, 'Fees Report', 'admin/fees_report', 2, 1),
(16, 4, 220, 'Messaging', 'admin/messaging', 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `term_id` int(10) UNSIGNED NOT NULL,
  `term_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `term_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int(10) UNSIGNED NOT NULL,
  `transaction_date` datetime NOT NULL,
  `payment_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `fee_finance_detail_id` int(10) UNSIGNED NOT NULL,
  `amount_paid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `unit_id` int(10) UNSIGNED NOT NULL,
  `course_id` int(10) UNSIGNED NOT NULL,
  `level_id` int(10) UNSIGNED NOT NULL,
  `unit_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_hours` int(10) UNSIGNED NOT NULL,
  `unit_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`unit_id`, `course_id`, `level_id`, `unit_code`, `unit_name`, `unit_hours`, `unit_description`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'MAT 110', 'Basic Calculus', 4, NULL, '2018-07-20 18:49:10', '2018-07-20 18:49:10'),
(2, 1, 1, 'PHY 110', 'Basic Physics', 3, NULL, '2018-07-20 18:49:38', '2018-07-20 18:49:38'),
(3, 1, 1, 'IRD 100', 'Communication Skills', 3, NULL, '2018-07-20 18:50:03', '2018-07-20 18:50:03'),
(4, 1, 1, 'IRD 101', 'Quantitative Skills I', 3, NULL, '2018-07-20 18:50:45', '2018-07-20 18:50:45'),
(5, 1, 1, 'COM 113', 'Mathematics for computer science I', 4, NULL, '2018-07-20 18:51:08', '2018-07-20 18:51:08'),
(6, 1, 1, 'COM 110', 'Introduction to computers & computing', 3, NULL, '2018-07-20 18:51:58', '2018-07-20 18:51:58'),
(7, 1, 1, 'COM 111', 'Computer applications I', 4, NULL, '2018-07-20 18:52:33', '2018-07-20 18:52:33'),
(8, 1, 2, 'COM 120', 'System hardware', 4, NULL, '2018-07-21 21:37:02', '2018-07-21 21:37:02'),
(9, 1, 2, 'COM 121', 'Procedural Programming II', 4, NULL, '2018-07-21 21:37:28', '2018-07-21 21:37:28'),
(10, 1, 2, 'COM 123', 'Mathematics for computer science II', 4, NULL, '2018-07-21 21:37:55', '2018-07-21 21:37:55'),
(11, 1, 2, 'PHY 111', 'Basic Physics II', 3, NULL, '2018-07-21 21:38:25', '2018-07-21 21:38:25'),
(12, 1, 2, 'MAT 111', 'Geometry & Applied Mathematics', 4, NULL, '2018-07-21 21:39:17', '2018-07-21 21:39:17'),
(13, 1, 2, 'IRD 102', 'Communication skills II', 3, NULL, '2018-07-21 21:40:12', '2018-07-21 21:40:12'),
(14, 1, 3, 'COM 211', 'System Software', 3, NULL, '2018-07-24 14:27:39', '2018-07-24 14:27:39'),
(15, 1, 3, 'COM 210', 'Procedural programming', 3, NULL, '2018-07-24 14:28:19', '2018-07-24 14:28:19'),
(16, 1, 3, 'COM 217', 'Electronics I', 4, NULL, '2018-07-24 14:33:29', '2018-07-24 14:33:29'),
(17, 1, 3, 'COM 215', 'Electric circuits', 3, NULL, '2018-07-24 14:33:57', '2018-07-24 14:33:57'),
(18, 1, 3, 'COM 212', 'Digital electronics I', 4, NULL, '2018-07-24 14:34:37', '2018-07-24 14:34:37'),
(19, 1, 3, 'COM 216', 'Internet fundamentals', 3, NULL, '2018-07-24 14:35:03', '2018-07-24 14:35:03'),
(20, 1, 3, 'IRD 104', 'Quantitative skills II', 3, NULL, '2018-07-24 14:35:37', '2018-07-24 14:35:37');

-- --------------------------------------------------------

--
-- Table structure for table `unit_registereds`
--

CREATE TABLE `unit_registereds` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `unit_id` int(10) UNSIGNED NOT NULL,
  `academic_id` int(10) UNSIGNED NOT NULL,
  `lecturer_id` int(10) UNSIGNED DEFAULT NULL,
  `term_id` int(10) UNSIGNED DEFAULT NULL,
  `level_id` int(10) UNSIGNED NOT NULL,
  `course_id` int(10) UNSIGNED NOT NULL,
  `college_id` int(10) UNSIGNED NOT NULL,
  `mode_id` int(10) UNSIGNED DEFAULT NULL,
  `u_cost` double(8,2) DEFAULT NULL,
  `updated_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unit_registereds`
--

INSERT INTO `unit_registereds` (`id`, `student_id`, `unit_id`, `academic_id`, `lecturer_id`, `term_id`, `level_id`, `course_id`, `college_id`, `mode_id`, `u_cost`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 7, 1, 1, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, '2018-07-20 18:53:31', '2018-07-20 18:53:31'),
(2, 7, 2, 1, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, '2018-07-20 18:54:13', '2018-07-20 18:54:13'),
(3, 7, 3, 1, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, '2018-07-20 18:56:42', '2018-07-20 18:56:42'),
(4, 7, 4, 1, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, '2018-07-20 18:57:12', '2018-07-20 18:57:12'),
(6, 7, 5, 1, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, '2018-07-20 18:58:23', '2018-07-20 18:58:23'),
(7, 7, 6, 1, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, '2018-07-20 18:58:57', '2018-07-20 18:58:57'),
(8, 7, 7, 1, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, '2018-07-20 18:59:36', '2018-07-20 18:59:36'),
(9, 1, 1, 1, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, '2018-07-21 16:18:11', '2018-07-21 16:18:11'),
(10, 1, 2, 1, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, '2018-07-21 16:39:52', '2018-07-21 16:39:52'),
(11, 1, 3, 1, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, '2018-07-21 16:43:39', '2018-07-21 16:43:39'),
(12, 1, 4, 1, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, '2018-07-21 16:46:44', '2018-07-21 16:46:44'),
(13, 1, 5, 1, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, '2018-07-21 16:47:56', '2018-07-21 16:47:56'),
(14, 1, 6, 1, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, '2018-07-21 16:51:55', '2018-07-21 16:51:55'),
(15, 1, 7, 1, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, '2018-07-21 16:52:53', '2018-07-21 16:52:53'),
(16, 6, 1, 1, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, '2018-07-21 16:57:26', '2018-07-21 16:57:26'),
(17, 6, 2, 1, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, '2018-07-21 16:58:23', '2018-07-21 16:58:23'),
(18, 6, 3, 1, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, '2018-07-21 17:01:22', '2018-07-21 17:01:22'),
(19, 6, 4, 1, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, '2018-07-21 17:02:12', '2018-07-21 17:02:12'),
(20, 6, 5, 1, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, '2018-07-21 17:04:01', '2018-07-21 17:04:01'),
(21, 6, 6, 1, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, '2018-07-21 17:05:37', '2018-07-21 17:05:37'),
(22, 6, 7, 1, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, '2018-07-21 17:07:18', '2018-07-21 17:07:18'),
(23, 1, 8, 1, NULL, NULL, 2, 1, 1, NULL, NULL, NULL, '2018-07-23 13:53:52', '2018-07-23 13:53:52'),
(24, 1, 9, 1, NULL, NULL, 2, 1, 1, NULL, NULL, NULL, '2018-07-23 13:54:14', '2018-07-23 13:54:14'),
(25, 1, 10, 1, NULL, NULL, 2, 1, 1, NULL, NULL, NULL, '2018-07-23 13:54:51', '2018-07-23 13:54:51'),
(26, 1, 11, 1, NULL, NULL, 2, 1, 1, NULL, NULL, NULL, '2018-07-23 13:55:09', '2018-07-23 13:55:09'),
(27, 1, 12, 1, NULL, NULL, 2, 1, 1, NULL, NULL, NULL, '2018-07-23 13:55:23', '2018-07-23 13:55:23'),
(28, 1, 13, 1, NULL, NULL, 2, 1, 1, NULL, NULL, NULL, '2018-07-23 13:55:37', '2018-07-23 13:55:37'),
(29, 1, 14, 2, NULL, NULL, 3, 1, 1, NULL, NULL, NULL, '2018-07-24 14:40:50', '2018-07-24 14:40:50'),
(30, 1, 15, 2, NULL, NULL, 3, 1, 1, NULL, NULL, NULL, '2018-07-24 14:41:48', '2018-07-24 14:41:48'),
(31, 1, 16, 2, NULL, NULL, 3, 1, 1, NULL, NULL, NULL, '2018-07-24 14:42:07', '2018-07-24 14:42:07'),
(32, 1, 17, 2, NULL, NULL, 3, 1, 1, NULL, NULL, NULL, '2018-07-24 14:42:23', '2018-07-24 14:42:23'),
(33, 1, 18, 2, NULL, NULL, 3, 1, 1, NULL, NULL, NULL, '2018-07-24 14:42:55', '2018-07-24 14:42:55'),
(34, 1, 19, 2, NULL, NULL, 3, 1, 1, NULL, NULL, NULL, '2018-07-24 14:43:22', '2018-07-24 14:43:22'),
(35, 1, 20, 2, NULL, NULL, 3, 1, 1, NULL, NULL, NULL, '2018-07-24 14:43:45', '2018-07-24 14:43:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verifyToken` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `status`, `email`, `password`, `verifyToken`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Amos', 1, 'amoschihi@gmail.com', '$2y$10$jTL9/Jw9QvBgCZnNz/LWDOwtDl1CqWWYC7rnd2USDW5FiKQqW/ttW', NULL, 'bywLqhnLw0SVFAWX1x7WestwnuGPDysuvS8e7psKy8Xj5ePrGUVViSQLEpS2', '2018-07-19 12:24:59', '2018-07-19 12:26:31'),
(2, 'code doctor', 1, 'amoschihi@yahoo.com', '$2y$10$F4mJkyJHNk33H/Iho6Mkre9diwlGJnngyL/3TxP47ONX47EzRpAry', NULL, NULL, '2018-07-19 12:27:58', '2018-07-19 12:33:23');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `years`
--

CREATE TABLE `years` (
  `id` int(10) UNSIGNED NOT NULL,
  `year` int(10) UNSIGNED NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `years`
--

INSERT INTO `years` (`id`, `year`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'Year 1', '2018-07-14 19:55:18', '2018-07-14 19:55:18'),
(2, 2, 'Year 2', '2018-07-17 09:32:06', '2018-07-17 09:32:06'),
(3, 3, 'Year 3', '2018-07-17 09:33:05', '2018-07-17 09:33:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academics`
--
ALTER TABLE `academics`
  ADD PRIMARY KEY (`academic_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `admin_roles`
--
ALTER TABLE `admin_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admission_types`
--
ALTER TABLE `admission_types`
  ADD PRIMARY KEY (`admissiontype_id`),
  ADD KEY `admission_types_mode_id_foreign` (`mode_id`);

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colleges`
--
ALTER TABLE `colleges`
  ADD PRIMARY KEY (`college_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `courses_department_id_foreign` (`department_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`department_id`),
  ADD KEY `departments_school_id_foreign` (`school_id`);

--
-- Indexes for table `displinaries`
--
ALTER TABLE `displinaries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `displinaries_student_id_foreign` (`student_id`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`fee_id`),
  ADD KEY `fees_student_id_foreign` (`student_id`),
  ADD KEY `fees_academic_id_foreign` (`academic_id`),
  ADD KEY `fees_semester_id_foreign` (`semester_id`);

--
-- Indexes for table `fee_finance_details`
--
ALTER TABLE `fee_finance_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fee_finance_details_fee_id_foreign` (`fee_id`),
  ADD KEY `fee_finance_details_student_id_foreign` (`student_id`),
  ADD KEY `fee_finance_details_level_id_foreign` (`level_id`),
  ADD KEY `fee_finance_details_mode_id_foreign` (`mode_id`);

--
-- Indexes for table `icons`
--
ALTER TABLE `icons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lecturers`
--
ALTER TABLE `lecturers`
  ADD PRIMARY KEY (`lecturer_id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`level_id`),
  ADD KEY `levels_semester_id_foreign` (`semester_id`),
  ADD KEY `levels_year_id_foreign` (`year_id`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `marks_unit_id_foreign` (`unit_id`),
  ADD KEY `marks_student_id_foreign` (`student_id`),
  ADD KEY `marks_level_id_foreign` (`level_id`),
  ADD KEY `marks_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menus_icon_id_foreign` (`icon_id`);

--
-- Indexes for table `menu_roles`
--
ALTER TABLE `menu_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modes`
--
ALTER TABLE `modes`
  ADD PRIMARY KEY (`mode_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_id_notifiable_type_index` (`notifiable_id`,`notifiable_type`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`parent_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `payments_level_id_foreign` (`level_id`),
  ADD KEY `payments_fee_finance_detail_id_foreign` (`fee_finance_detail_id`),
  ADD KEY `payments_student_id_foreign` (`student_id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`program_id`),
  ADD KEY `programs_academic_id_foreign` (`academic_id`),
  ADD KEY `programs_level_id_foreign` (`level_id`),
  ADD KEY `programs_course_id_foreign` (`course_id`),
  ADD KEY `programs_admissiontype_id_foreign` (`admissiontype_id`);

--
-- Indexes for table `receipts`
--
ALTER TABLE `receipts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receipt_details`
--
ALTER TABLE `receipt_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `receipt_details_receipt_id_foreign` (`receipt_id`),
  ADD KEY `receipt_details_student_id_foreign` (`student_id`),
  ADD KEY `receipt_details_transaction_id_foreign` (`transaction_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`school_id`),
  ADD KEY `schools_college_id_foreign` (`college_id`);

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`),
  ADD KEY `staff_department_id_foreign` (`department_id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`status_id`),
  ADD KEY `statuses_student_id_foreign` (`student_id`),
  ADD KEY `statuses_program_id_foreign` (`program_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `students_s_emailaddress_unique` (`s_emailaddress`),
  ADD UNIQUE KEY `students_s_applicationno_unique` (`s_applicationno`),
  ADD KEY `students_parent_id_foreign` (`parent_id`),
  ADD KEY `students_agent_id_foreign` (`agent_id`),
  ADD KEY `students_user_id_foreign` (`user_id`);

--
-- Indexes for table `submenus`
--
ALTER TABLE `submenus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `submenus_menu_id_foreign` (`menu_id`),
  ADD KEY `submenus_icon_id_foreign` (`icon_id`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`term_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `transactions_user_id_foreign` (`user_id`),
  ADD KEY `transactions_payment_id_foreign` (`payment_id`),
  ADD KEY `transactions_student_id_foreign` (`student_id`),
  ADD KEY `transactions_fee_finance_detail_id_foreign` (`fee_finance_detail_id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`unit_id`),
  ADD KEY `units_course_id_foreign` (`course_id`),
  ADD KEY `units_level_id_foreign` (`level_id`);

--
-- Indexes for table `unit_registereds`
--
ALTER TABLE `unit_registereds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `unit_registereds_lecturer_id_foreign` (`lecturer_id`),
  ADD KEY `unit_registereds_term_id_foreign` (`term_id`),
  ADD KEY `unit_registereds_course_id_foreign` (`course_id`),
  ADD KEY `unit_registereds_college_id_foreign` (`college_id`),
  ADD KEY `unit_registereds_student_id_foreign` (`student_id`),
  ADD KEY `unit_registereds_academic_id_foreign` (`academic_id`),
  ADD KEY `unit_registereds_mode_id_foreign` (`mode_id`),
  ADD KEY `unit_registereds_level_id_foreign` (`level_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `years`
--
ALTER TABLE `years`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academics`
--
ALTER TABLE `academics`
  MODIFY `academic_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_roles`
--
ALTER TABLE `admin_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admission_types`
--
ALTER TABLE `admission_types`
  MODIFY `admissiontype_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `colleges`
--
ALTER TABLE `colleges`
  MODIFY `college_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `department_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `displinaries`
--
ALTER TABLE `displinaries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `fee_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fee_finance_details`
--
ALTER TABLE `fee_finance_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `icons`
--
ALTER TABLE `icons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=762;

--
-- AUTO_INCREMENT for table `lecturers`
--
ALTER TABLE `lecturers`
  MODIFY `lecturer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `level_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `menu_roles`
--
ALTER TABLE `menu_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `modes`
--
ALTER TABLE `modes`
  MODIFY `mode_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `parents`
--
ALTER TABLE `parents`
  MODIFY `parent_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `program_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `receipts`
--
ALTER TABLE `receipts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `receipt_details`
--
ALTER TABLE `receipt_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `school_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `status_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `submenus`
--
ALTER TABLE `submenus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `term_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `unit_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `unit_registereds`
--
ALTER TABLE `unit_registereds`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `years`
--
ALTER TABLE `years`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admission_types`
--
ALTER TABLE `admission_types`
  ADD CONSTRAINT `admission_types_mode_id_foreign` FOREIGN KEY (`mode_id`) REFERENCES `modes` (`mode_id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`department_id`);

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `departments_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `schools` (`school_id`);

--
-- Constraints for table `displinaries`
--
ALTER TABLE `displinaries`
  ADD CONSTRAINT `displinaries_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`);

--
-- Constraints for table `fees`
--
ALTER TABLE `fees`
  ADD CONSTRAINT `fees_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `academics` (`academic_id`),
  ADD CONSTRAINT `fees_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`),
  ADD CONSTRAINT `fees_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`);

--
-- Constraints for table `fee_finance_details`
--
ALTER TABLE `fee_finance_details`
  ADD CONSTRAINT `fee_finance_details_fee_id_foreign` FOREIGN KEY (`fee_id`) REFERENCES `fees` (`fee_id`),
  ADD CONSTRAINT `fee_finance_details_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`level_id`),
  ADD CONSTRAINT `fee_finance_details_mode_id_foreign` FOREIGN KEY (`mode_id`) REFERENCES `modes` (`mode_id`),
  ADD CONSTRAINT `fee_finance_details_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`);

--
-- Constraints for table `levels`
--
ALTER TABLE `levels`
  ADD CONSTRAINT `levels_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`),
  ADD CONSTRAINT `levels_year_id_foreign` FOREIGN KEY (`year_id`) REFERENCES `years` (`id`);

--
-- Constraints for table `marks`
--
ALTER TABLE `marks`
  ADD CONSTRAINT `marks_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `academics` (`academic_id`),
  ADD CONSTRAINT `marks_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`level_id`),
  ADD CONSTRAINT `marks_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`),
  ADD CONSTRAINT `marks_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`unit_id`);

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_icon_id_foreign` FOREIGN KEY (`icon_id`) REFERENCES `icons` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_fee_finance_detail_id_foreign` FOREIGN KEY (`fee_finance_detail_id`) REFERENCES `fee_finance_details` (`id`),
  ADD CONSTRAINT `payments_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`level_id`),
  ADD CONSTRAINT `payments_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`);

--
-- Constraints for table `programs`
--
ALTER TABLE `programs`
  ADD CONSTRAINT `programs_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `academics` (`academic_id`),
  ADD CONSTRAINT `programs_admissiontype_id_foreign` FOREIGN KEY (`admissiontype_id`) REFERENCES `admission_types` (`admissiontype_id`),
  ADD CONSTRAINT `programs_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`),
  ADD CONSTRAINT `programs_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`level_id`);

--
-- Constraints for table `receipt_details`
--
ALTER TABLE `receipt_details`
  ADD CONSTRAINT `receipt_details_receipt_id_foreign` FOREIGN KEY (`receipt_id`) REFERENCES `receipts` (`id`),
  ADD CONSTRAINT `receipt_details_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`),
  ADD CONSTRAINT `receipt_details_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`transaction_id`);

--
-- Constraints for table `schools`
--
ALTER TABLE `schools`
  ADD CONSTRAINT `schools_college_id_foreign` FOREIGN KEY (`college_id`) REFERENCES `colleges` (`college_id`);

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`department_id`);

--
-- Constraints for table `statuses`
--
ALTER TABLE `statuses`
  ADD CONSTRAINT `statuses_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`program_id`),
  ADD CONSTRAINT `statuses_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_agent_id_foreign` FOREIGN KEY (`agent_id`) REFERENCES `agents` (`id`),
  ADD CONSTRAINT `students_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `parents` (`parent_id`),
  ADD CONSTRAINT `students_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `admins` (`id`);

--
-- Constraints for table `submenus`
--
ALTER TABLE `submenus`
  ADD CONSTRAINT `submenus_icon_id_foreign` FOREIGN KEY (`icon_id`) REFERENCES `icons` (`id`),
  ADD CONSTRAINT `submenus_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_fee_finance_detail_id_foreign` FOREIGN KEY (`fee_finance_detail_id`) REFERENCES `fee_finance_details` (`id`),
  ADD CONSTRAINT `transactions_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`payment_id`),
  ADD CONSTRAINT `transactions_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`),
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `admins` (`id`);

--
-- Constraints for table `units`
--
ALTER TABLE `units`
  ADD CONSTRAINT `units_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`),
  ADD CONSTRAINT `units_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`level_id`);

--
-- Constraints for table `unit_registereds`
--
ALTER TABLE `unit_registereds`
  ADD CONSTRAINT `unit_registereds_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `academics` (`academic_id`),
  ADD CONSTRAINT `unit_registereds_college_id_foreign` FOREIGN KEY (`college_id`) REFERENCES `colleges` (`college_id`),
  ADD CONSTRAINT `unit_registereds_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`),
  ADD CONSTRAINT `unit_registereds_lecturer_id_foreign` FOREIGN KEY (`lecturer_id`) REFERENCES `lecturers` (`lecturer_id`),
  ADD CONSTRAINT `unit_registereds_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`level_id`),
  ADD CONSTRAINT `unit_registereds_mode_id_foreign` FOREIGN KEY (`mode_id`) REFERENCES `modes` (`mode_id`),
  ADD CONSTRAINT `unit_registereds_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`),
  ADD CONSTRAINT `unit_registereds_term_id_foreign` FOREIGN KEY (`term_id`) REFERENCES `terms` (`term_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
