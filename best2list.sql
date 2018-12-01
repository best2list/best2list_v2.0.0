-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2018 at 08:09 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `best2list`
--

-- --------------------------------------------------------

--
-- Table structure for table `businesses`
--

CREATE TABLE `businesses` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip_code` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fax` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('passive','active') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `country` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `image_path` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `businesses`
--

INSERT INTO `businesses` (`id`, `user_id`, `title`, `summary`, `description`, `email`, `zip_code`, `phone`, `fax`, `website`, `address`, `city`, `location`, `type`, `status`, `country`, `parent_id`, `image_path`, `created_at`, `updated_at`) VALUES
(1, 1, 'James Foden Attorney At Law Probate, Wills & Trusts', 'انجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرس', 'انجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرس', 'raminfaramarzi93@gmail.com', '212554', '22121586652', '22121586652', 'www.kizhan.com', 'تهران - میدان نوبنیاد - خ کوهستان سوم', 'esfahan', '3687346374674663743846', 'active', 0, 1, NULL, NULL, '2018-11-05 07:06:13', '2018-11-13 06:12:10'),
(2, 1, 'Attorney Ann Gottesman DUI & Criminal Defense', 'انجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرس', 'انجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرس', 'kamran@gmail.com', '212554', '22121586652', '22121586652', 'www.kizhan.com', 'تهران - میدان نوبنیاد - خ کوهستان سوم', 'kabul', '3687346374674663743846', 'passive', 0, 5, NULL, NULL, '2018-11-11 08:15:23', '2018-11-13 06:12:26'),
(3, 1, 'Law Office of Richard Cherry', 'انجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرس', 'انجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرس', 'kamran@gmail.com', '212554', '22121586652', '22121586652', 'www.kizhan.com', 'تهران - میدان نوبنیاد - خ کوهستان سوم', 'tabriz', '3687346374674663743846', 'active', 0, 1, NULL, NULL, '2018-11-11 08:15:50', '2018-11-13 06:12:46'),
(4, 1, 'UPRIGHT LAW - BANKRUPTCY ATTORNEYS', 'انجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرس', 'انجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرس', 'kamran@gmail.com', '212554', '22121586652', '22121586652', 'www.kizhan.com', 'تهران - میدان نوبنیاد - خ کوهستان سوم', 'najaf', 'تهران', 'active', 0, 4, NULL, NULL, '2018-11-11 08:16:48', '2018-11-13 06:13:09'),
(5, 1, 'UPRIGHT LAW - BANKRUPTCY ATTORNEYS', 'انجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرس', 'انجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرس', 'kamran@gmail.com', '212554', '22121586652', '22121586652', 'www.kizhan.com', 'تهران - میدان نوبنیاد - خ کوهستان سوم', 'mashhad', '3687346374674663743846', 'active', 0, 1, NULL, NULL, '2018-11-12 04:14:09', '2018-11-13 06:13:30'),
(6, 1, 'UPRIGHT LAW - BANKRUPTCY ATTORNEYS', 'انجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرس', 'انجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرس', 'kamran@gmail.com', '212554', '22121586652', '22121586652', 'www.kizhan.com', 'تهران - میدان نوبنیاد - خ کوهستان سوم', 'harat', '3687346374674663743846', 'passive', 0, 5, NULL, NULL, '2018-11-12 04:19:19', '2018-11-13 06:13:46'),
(7, 1, 'Lemon Law Associates Of California', 'انجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرس', 'انجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرس', 'kamran@gmail.com', '212554', '22121586652', '22121586652', 'www.kizhan.com', 'تهران - میدان نوبنیاد - خ کوهستان سوم', 'shiraz', '3687346374674663743846', 'active', 0, 1, NULL, NULL, '2018-11-12 05:42:49', '2018-11-13 06:14:13'),
(8, 1, 'Carlin & Buchsbaum LLP', 'انجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرس', 'انجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرس', 'kamran@gmail.com', 'kamran@gmail.com', '22121586652', '22121586652', 'www.kizhan.com', 'تهران - میدان نوبنیاد - خ کوهستان سوم', 'krakow', '3687346374674663743846', 'active', 0, 2, 7, NULL, '2018-11-12 06:51:34', '2018-11-13 06:14:28'),
(9, 1, 'Lawyer Information & Referral', 'انجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرس', 'انجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرس', 'kamran@gmail.com', '212554', '22121586652', '22121586652', 'www.kizhan.com', 'تهران - میدان نوبنیاد - خ کوهستان سوم', 'poznan', '3687346374674663743846', 'active', 0, 2, 1, NULL, '2018-11-12 06:57:31', '2018-11-13 06:14:43'),
(10, 1, 'Law Office of Richard Cherry', 'انجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرس', 'انجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرس', 'kamran@gmail.com', '212554', '22121586652', '22121586652', 'www.kizhan.com', 'تهران - میدان نوبنیاد - خ کوهستان سوم', 'todz', '3687346374674663743846', 'active', 0, 2, NULL, NULL, '2018-11-12 06:58:43', '2018-11-13 06:15:17'),
(11, 1, 'Law Offices of Gerald L. Marcus', 'انجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرس', 'انجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرس', 'kamran@gmail.com', '212554', '22121586652', '22121586652', 'www.kizhan.com', 'تهران - میدان نوبنیاد - خ کوهستان سوم', 'ghandahar', '3687346374674663743846', 'passive', 0, 5, 1, NULL, '2018-11-12 07:03:12', '2018-11-13 06:15:40'),
(12, 1, 'Financial Counseling Center', 'انجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرس', 'انجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرس', 'kamran@gmail.com', '212554', '22121586652', '22121586652', 'www.kizhan.com', 'تهران - میدان نوبنیاد - خ کوهستان سوم', 'karbala', '3687346374674663743846', 'active', 0, 4, NULL, NULL, '2018-11-12 07:11:33', '2018-11-13 06:15:58'),
(13, 1, 'dominguez firm', 'انجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرس', 'انجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرس', 'kamran@gmail.com', '212554', '22121586652', '22121586652', 'www.kizhan.com', 'تهران - میدان نوبنیاد - خ کوهستان سوم', 'mousel', 'تهران', 'active', 0, 4, NULL, NULL, '2018-11-12 07:18:38', '2018-11-13 06:16:13'),
(14, 2, 'armani', 'انجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرس', 'انجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرس', 'kamran@gmail.com', '212554', '22121586652', '22121586652', 'www.kizhan.com', 'تهران - میدان نوبنیاد - خ کوهستان سوم', 'baghdad', '3687346374674663743846', 'active', 0, 4, NULL, NULL, '2018-11-13 03:50:27', '2018-11-13 06:02:49'),
(15, 2, 'test 3', 'انجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرس', 'انجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرسانجمن تنیس روی میز قبرس', 'kamran@gmail.com', '212554', '22121586652', '22121586652', 'www.kizhan.com', 'تهران - میدان نوبنیاد - خ کوهستان سوم', 'warsaw', '3687346374674663743846', 'active', 0, 2, NULL, NULL, '2018-11-13 03:51:34', '2018-11-13 06:04:43');

-- --------------------------------------------------------

--
-- Table structure for table `businesses_to_categories`
--

CREATE TABLE `businesses_to_categories` (
  `business_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `businesses_to_categories`
--

INSERT INTO `businesses_to_categories` (`business_id`, `category_id`) VALUES
(1, 5),
(2, 2),
(2, 3),
(5, 1),
(5, 5),
(6, 1),
(6, 3),
(6, 4),
(6, 5),
(7, 1),
(7, 4),
(7, 5),
(8, 1),
(8, 2),
(8, 3),
(8, 4),
(9, 1),
(9, 2),
(9, 3),
(10, 1),
(10, 2),
(10, 3),
(11, 1),
(12, 1),
(12, 2),
(12, 3),
(13, 2),
(14, 1),
(15, 1),
(15, 2),
(15, 3);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'sport', NULL, '2018-11-14 20:30:00', '2018-11-14 20:30:00'),
(2, 'colture', NULL, '2018-11-29 20:30:00', '2018-11-29 20:30:00'),
(3, 'business', NULL, '2018-11-11 06:54:14', '2018-11-11 06:54:14'),
(4, 'football', 1, '2018-11-11 06:54:34', '2018-11-11 06:54:34'),
(5, 'tourism', NULL, '2018-11-11 06:56:35', '2018-11-11 06:56:35'),
(6, 'bascketball', 1, '2018-11-15 05:10:59', '2018-11-15 05:10:59'),
(7, 'handball', 1, '2018-11-15 05:11:20', '2018-11-15 05:11:20');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `status` enum('passive','active') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `business_id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'hello', 1, 1, 'passive', '2018-11-15 03:26:59', '2018-11-15 04:09:38'),
(2, 'great!', 1, 1, 'active', '2018-11-15 03:27:10', '2018-11-15 04:09:33'),
(3, 'like!', 1, 2, 'active', '2018-11-15 03:27:50', '2018-11-15 04:09:41');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `country` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flag` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country`, `flag`, `created_at`, `updated_at`) VALUES
(1, 'iran', 'iran', '2018-11-14 20:30:00', '2018-11-28 20:30:00'),
(2, 'poland', 'poland', '2018-11-15 20:30:00', '2018-11-15 20:30:00'),
(4, 'iraq', 'iraq', '2018-11-11 06:38:28', '2018-11-11 06:38:28'),
(5, 'afghanestan', 'afghanestan', '2018-11-11 06:39:07', '2018-11-11 06:39:07');

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
(1, '2018_10_29_092627_create_countries_table', 1),
(2, '2018_10_29_092628_create_users_table', 1),
(3, '2018_10_29_092629_create_businesses_table', 1),
(4, '2018_10_29_092755_create_categories_table', 1),
(5, '2018_10_29_093058_create_comments_table', 1),
(6, '2018_10_29_093423_create_business_categories_table', 1),
(7, '2018_11_11_135013_create_business_categories_table', 2),
(8, '2018_11_12_063003_create_businesses_to_categories', 3),
(9, '2018_11_14_090511_create_comments_table', 4),
(10, '2018_11_15_064405_create_comments_table', 5),
(11, '2018_11_15_065521_create_comments_table', 6),
(12, '2014_10_12_100000_create_password_resets_table', 7);

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `status` enum('active','passive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'passive',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `first_name`, `last_name`, `email`, `phone`, `password`, `access`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'kamran', 'kamran', 'kami', 'kamran@gmail.com', '09364526912', '$2y$10$VqY4cGjHEZSPDYNReewyF.0UkjAEohWQ4QGAgnqegBhVGZqSriyjy', 'user', 'passive', 'y8ViD3JCOn9j3ALHZaNgoH1wlAINwiG4Pvyrz0ZMafXevV7HW75ofZZvXNhI', '2018-11-05 07:00:17', '2018-11-05 07:00:17'),
(2, 'arman', 'arman', 'armani', 'arman@gmail.com', '0935852741', '$2y$10$0VqvU5mLpqzyYqCNMtb9Xewy2Pe/ioSNdBF3MxIFQmE2Vwsh1Y1Ri', 'user', 'passive', 'BpZ0jbSBncXCsXL5Aj6omXS048As2EVnSPfPikYmj6qOEBwWZ95WqjBpkPh1', '2018-11-13 03:48:30', '2018-11-13 03:48:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `businesses`
--
ALTER TABLE `businesses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `businesses_id_unique` (`id`),
  ADD KEY `businesses_user_id_foreign` (`user_id`),
  ADD KEY `businesses_parent_id_foreign` (`parent_id`),
  ADD KEY `businesses_country_foreign` (`country`);

--
-- Indexes for table `businesses_to_categories`
--
ALTER TABLE `businesses_to_categories`
  ADD UNIQUE KEY `businesses_to_categories_business_id_category_id_unique` (`business_id`,`category_id`),
  ADD KEY `businesses_to_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_id_unique` (`id`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `comments_id_unique` (`id`),
  ADD KEY `comments_business_id_foreign` (`business_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `countries_id_unique` (`id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_id_unique` (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `businesses`
--
ALTER TABLE `businesses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `businesses`
--
ALTER TABLE `businesses`
  ADD CONSTRAINT `businesses_country_foreign` FOREIGN KEY (`country`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `businesses_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `businesses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `businesses_to_categories`
--
ALTER TABLE `businesses_to_categories`
  ADD CONSTRAINT `businesses_to_categories_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `businesses_to_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
