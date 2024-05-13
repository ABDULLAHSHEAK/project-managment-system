-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2024 at 10:17 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mas_project_managment`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `gender` varchar(255) NOT NULL,
  `note` text DEFAULT NULL,
  `img` varchar(255) DEFAULT 'demo.webp',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `email`, `phone`, `address`, `gender`, `note`, `img`, `created_at`, `updated_at`) VALUES
(1, 'Garrett Martinez', 'kafyhacofi@mailinator.com', '+1 (182) 513-8601', 'Eius sunt autem vel', 'other', 'Occaecat est numquam', '1714962041.jpg', '2024-05-05 20:20:41', '2024-05-05 20:20:41'),
(3, 'Orlando Mccarty', 'rivodin@mailinator.com', '+1 (938) 926-4287', 'Occaecat cum qui sed', 'male', NULL, '1714963856.jpg', '2024-05-05 20:33:41', '2024-05-05 20:50:56'),
(4, 'Mason Caldwell', 'qetaxe@mailinator.com', '+1 (166) 581-4869', 'Sint distinctio Ut', 'other', NULL, '1714962842.png', '2024-05-05 20:34:02', '2024-05-05 20:34:02'),
(6, 'Caesar Bradford', 'mera@mailinator.com', '+1 (303) 572-6636', 'Non maxime expedita', 'male', NULL, 'demo.webp', '2024-05-05 21:05:12', '2024-05-05 21:05:12'),
(9, 'Jerry Lee', 'bahomowut@mailinator.com', '+1 (879) 983-1792', 'Culpa commodi qui re', 'other', 'Quaerat culpa aute u', 'demo.webp', '2024-05-09 11:06:29', '2024-05-09 11:06:29'),
(10, 'Jerry Lee', 'bahomowut@mailinator.com', '+1 (879) 983-1792', 'Culpa commodi qui re', 'other', 'Quaerat culpa aute u', 'demo.webp', '2024-05-09 11:06:30', '2024-05-09 11:06:30'),
(11, 'Cara Hudson', 'gece@mailinator.com', '+1 (233) 932-7771', 'Tempora atque cupidi', 'male', 'Rerum velit in quia', 'demo.webp', '2024-05-09 11:07:48', '2024-05-09 11:07:48');

-- --------------------------------------------------------

--
-- Table structure for table `collections`
--

CREATE TABLE `collections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `collect` varchar(255) NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(250) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `collections`
--

INSERT INTO `collections` (`id`, `collect`, `project_id`, `date`, `created_at`, `updated_at`) VALUES
(11, '5', 30, '2024-05-30', '2024-05-11 23:04:26', '2024-05-11 23:15:38'),
(12, '54', 6, '2015-03-11', '2024-05-11 23:37:56', '2024-05-11 23:37:56'),
(13, '43', 6, '1993-12-18', '2024-05-11 23:38:19', '2024-05-11 23:38:19'),
(14, '47', 31, '2006-06-19', '2024-05-12 05:04:43', '2024-05-12 05:04:43'),
(15, '96', 32, '2014-01-11', '2024-05-12 05:16:45', '2024-05-12 05:16:45');

-- --------------------------------------------------------

--
-- Table structure for table `employers`
--

CREATE TABLE `employers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `note` text DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `img` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employers`
--

INSERT INTO `employers` (`id`, `name`, `email`, `phone`, `address`, `note`, `category_id`, `img`, `created_at`, `updated_at`) VALUES
(1, 'Tobias Parks', 'qepoxed@mailinator.com', '+1 (616) 475-1488', 'Magnam praesentium o', NULL, 1, '1714987658.png', '2024-05-06 03:27:38', '2024-05-06 03:27:38'),
(2, 'Kelly Roth', 'bulefute@mailinator.com', '+1 (648) 393-5657', 'Aut ut iusto in volu', NULL, 4, 'demo.webp', '2024-05-06 03:36:24', '2024-05-06 03:36:24'),
(4, 'Jenette Colon', 'gehuc@mailinator.com', '+1 (149) 454-8387', 'Sunt dolore architec', NULL, 4, '1714988400.jpg', '2024-05-06 03:40:00', '2024-05-06 03:40:00'),
(5, 'Deborah Foreman a', 'fycojunum@mailinator.com', '+1 (255) 944-4917', 'Aliquip animi duis', 'Sequi ea nisi assume', 4, '1714989464.jpg', '2024-05-06 03:47:17', '2024-05-06 03:57:44'),
(19, 'Henry Bartlett', 'fuwifi@mailinator.com', '+1 (971) 465-6574', 'Qui sit culpa est al', 'Earum veniam nulla', 5, 'demo.webp', '2024-05-09 10:25:15', '2024-05-09 10:25:15'),
(20, 'Pamela Cain', 'dypune@mailinator.com', '+1 (708) 459-6567', 'Totam tempor ut quia', 'Vero obcaecati accus', 4, 'demo.webp', '2024-05-09 10:26:02', '2024-05-09 10:26:02'),
(21, 'Alyssa Navarro', 'pyhem@mailinator.com', '+1 (786) 359-6311', 'Deleniti animi id', 'Vel nulla asperiores', 2, 'demo.webp', '2024-05-09 10:59:59', '2024-05-09 10:59:59'),
(22, 'It Plan Bd', 'itplan@gmail.com', '017484552', 'sirajganj', 'no', 2, 'demo.webp', '2024-05-12 04:00:32', '2024-05-12 04:00:32');

-- --------------------------------------------------------

--
-- Table structure for table `employer_categories`
--

CREATE TABLE `employer_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employer_categories`
--

INSERT INTO `employer_categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'Web Design', '2024-05-05 06:10:45', '2024-05-05 06:10:45'),
(2, 'Graphics Design', '2024-05-05 07:03:35', '2024-05-05 07:03:35'),
(4, 'web design', '2024-05-05 10:26:05', '2024-05-05 10:29:18'),
(5, 'App Developer', '2024-05-06 04:20:36', '2024-05-06 04:20:36'),
(6, 'web design', '2024-05-13 01:00:18', '2024-05-13 01:00:18');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `note` text NOT NULL,
  `amount` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `note`, `amount`, `category_id`, `date`, `created_at`, `updated_at`) VALUES
(1, 'Cillum obcaecati lib', '38', 1, '1972-08-29', '2024-05-12 03:17:45', '2024-05-12 03:17:45'),
(2, 'In laboriosam et in a', '40', 2, '1994-09-07', '2024-05-12 03:18:00', '2024-05-12 03:27:34'),
(3, 'Qui quas minus labor', '5', 2, '1971-03-20', '2024-05-12 03:27:41', '2024-05-12 03:27:41'),
(4, 'Rerum sit sed commod', '96', 2, '2016-12-22', '2024-05-12 03:27:50', '2024-05-12 03:27:50');

-- --------------------------------------------------------

--
-- Table structure for table `expense_categories`
--

CREATE TABLE `expense_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expense_categories`
--

INSERT INTO `expense_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Leigh Oneil', '2024-05-12 02:25:14', '2024-05-12 02:25:14'),
(2, 'Sydnee Brown', '2024-05-12 02:27:36', '2024-05-12 02:27:36'),
(4, 'Lillith Mcdowell', '2024-05-12 03:39:12', '2024-05-12 03:39:12');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 2),
(6, '2024_04_01_050538_create_shifts_table', 2),
(7, '2024_04_01_094848_create_trainers_table', 3),
(8, '2024_04_07_092558_create_packages_table', 4),
(9, '2024_04_07_170752_create_members_table', 5),
(10, '2024_04_08_034836_create_healths_table', 6),
(11, '2024_04_20_033913_create_transactions_table', 7),
(12, '2024_05_05_112923_create_employer_categories_table', 8),
(13, '2024_05_05_163920_create_project_categories_table', 9),
(14, '2024_05_05_170359_create_clients_table', 10),
(15, '2024_05_06_033148_create_employers_table', 11),
(18, '2024_05_06_131816_create_projects_table', 12),
(19, '2024_05_06_131902_create_notes_table', 12),
(20, '2024_05_07_103233_create_project_members_table', 13),
(21, '2024_05_08_035520_create_tasks_table', 14),
(22, '2024_05_12_035638_create_collections_table', 15),
(23, '2024_05_12_064723_create_expense_categories_table', 16),
(25, '2024_05_12_084939_create_expenses_table', 17);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `note` text DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `note`, `file`, `project_id`, `created_at`, `updated_at`) VALUES
(11, 'Ipsum optio aliquid', '1715578222.jpg', 5, '2024-05-12 23:30:23', '2024-05-12 23:30:23'),
(12, 'this is emplyer note', NULL, 32, '2024-05-12 23:32:33', '2024-05-12 23:32:33');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('abir@gmail.com', '$2y$12$ZGBM8FU0knCqVCYrQuFq9uPoIJz6NZ0AEleS3iqWOILjr13pD8kC.', '2024-03-30 09:22:46');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `deadline` varchar(255) NOT NULL,
  `summary` text NOT NULL,
  `status` enum('not_started','running','canceled','completed') NOT NULL,
  `amount` varchar(250) NOT NULL,
  `completion_status` varchar(255) NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `start_date`, `deadline`, `summary`, `status`, `amount`, `completion_status`, `client_id`, `category_id`, `created_at`, `updated_at`) VALUES
(2, 'Web Development for store aa', '2024-05-29', '2024-05-15', 'dfsdf', 'not_started', '', '5', 6, 4, NULL, '2024-05-07 07:36:55'),
(3, 'Louis Estes', '1994-03-17', '1992-12-22', 'Sequi aut sapiente e', 'canceled', '', '82', 6, 1, '2024-05-07 04:50:11', '2024-05-07 04:50:11'),
(4, 'Jakeem Wolfe', '2000-04-26', '2012-03-26', 'Commodi sed nulla ne', 'running', '', '0', 11, 4, '2024-05-07 04:50:37', '2024-05-12 04:49:07'),
(5, 'Jakeem Wolfe aa', '2000-04-26', '2012-03-26', 'Commodi sed nulla ne', 'running', '', '0', 6, 4, '2024-05-07 07:22:42', '2024-05-07 07:22:42'),
(6, 'Jakeem Wolfe aa', '2000-04-26', '2012-03-26', 'Commodi sed nulla ne', 'completed', '2500', '25', 6, 4, '2024-05-07 07:22:59', '2024-05-07 21:09:31'),
(29, 'Sharon Hays', '1985-02-05', '1981-01-11', 'Fuga Voluptatem fug', 'completed', '42', '22', 3, 1, '2024-05-11 22:49:35', '2024-05-11 22:49:35'),
(30, 'Gail Burnett', '2006-11-03', '2022-06-01', 'Quam voluptatem por', 'completed', '19', '83', 1, 1, '2024-05-11 22:50:04', '2024-05-11 22:50:04'),
(31, 'Kenneth Padilla', '2006-06-19', '2024-11-16', 'Pariatur Corporis v', 'canceled', '80', '62', 10, 3, '2024-05-12 05:04:43', '2024-05-12 05:04:43'),
(32, 'Donovan Hardin', '2014-01-11', '1984-03-10', 'Commodi cillum est q', 'completed', '14', '99', 6, 4, '2024-05-12 05:16:45', '2024-05-12 05:16:45');

-- --------------------------------------------------------

--
-- Table structure for table `project_categories`
--

CREATE TABLE `project_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_categories`
--

INSERT INTO `project_categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'Web Design', '2024-05-05 10:48:19', '2024-05-05 10:48:19'),
(3, 'Marketing', '2024-05-05 10:53:37', '2024-05-05 10:53:37'),
(4, 'Apps Development', '2024-05-06 10:53:50', '2024-05-06 10:53:50'),
(5, 'Marketing', '2024-05-13 01:00:38', '2024-05-13 01:00:38');

-- --------------------------------------------------------

--
-- Table structure for table `project_members`
--

CREATE TABLE `project_members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_members`
--

INSERT INTO `project_members` (`id`, `project_id`, `member_id`, `created_at`, `updated_at`) VALUES
(2, 15, 1, '2024-05-11 21:32:43', '2024-05-11 21:32:43'),
(3, 15, 2, '2024-05-11 21:32:43', '2024-05-11 21:32:43'),
(27, 25, 2, '2024-05-11 22:32:58', '2024-05-11 22:32:58'),
(28, 25, 4, '2024-05-11 22:32:58', '2024-05-11 22:32:58'),
(29, 25, 5, '2024-05-11 22:32:58', '2024-05-11 22:32:58'),
(30, 25, 19, '2024-05-11 22:32:58', '2024-05-11 22:32:58'),
(31, 25, 20, '2024-05-11 22:32:58', '2024-05-11 22:32:58'),
(32, 26, 1, '2024-05-11 22:33:33', '2024-05-11 22:33:33'),
(33, 26, 5, '2024-05-11 22:33:33', '2024-05-11 22:33:33'),
(34, 26, 19, '2024-05-11 22:33:33', '2024-05-11 22:33:33'),
(35, 26, 20, '2024-05-11 22:33:33', '2024-05-11 22:33:33'),
(36, 27, 1, '2024-05-11 22:36:13', '2024-05-11 22:36:13'),
(37, 27, 19, '2024-05-11 22:36:13', '2024-05-11 22:36:13'),
(38, 27, 22, '2024-05-11 22:36:13', '2024-05-11 22:36:13'),
(39, 27, 21, '2024-05-11 22:36:13', '2024-05-11 22:36:13'),
(40, 28, 1, '2024-05-11 22:47:52', '2024-05-11 22:47:52'),
(41, 28, 4, '2024-05-11 22:47:52', '2024-05-11 22:47:52'),
(42, 28, 5, '2024-05-11 22:47:52', '2024-05-11 22:47:52'),
(43, 28, 21, '2024-05-11 22:47:53', '2024-05-11 22:47:53'),
(44, 29, 1, '2024-05-11 22:49:35', '2024-05-11 22:49:35'),
(45, 29, 4, '2024-05-11 22:49:35', '2024-05-11 22:49:35'),
(46, 29, 5, '2024-05-11 22:49:35', '2024-05-11 22:49:35'),
(47, 29, 20, '2024-05-11 22:49:35', '2024-05-11 22:49:35'),
(48, 30, 4, '2024-05-11 22:50:04', '2024-05-11 22:50:04'),
(49, 30, 5, '2024-05-11 22:50:04', '2024-05-11 22:50:04'),
(50, 30, 19, '2024-05-11 22:50:04', '2024-05-11 22:50:04'),
(51, 30, 20, '2024-05-11 22:50:04', '2024-05-11 22:50:04'),
(52, 31, 1, '2024-05-12 05:04:43', '2024-05-12 05:04:43'),
(53, 31, 2, '2024-05-12 05:04:43', '2024-05-12 05:04:43'),
(54, 31, 4, '2024-05-12 05:04:43', '2024-05-12 05:04:43'),
(55, 31, 5, '2024-05-12 05:04:43', '2024-05-12 05:04:43'),
(56, 31, 19, '2024-05-12 05:04:43', '2024-05-12 05:04:43'),
(57, 31, 20, '2024-05-12 05:04:43', '2024-05-12 05:04:43'),
(58, 31, 21, '2024-05-12 05:04:43', '2024-05-12 05:04:43'),
(59, 31, 22, '2024-05-12 05:04:43', '2024-05-12 05:04:43'),
(60, 32, 1, '2024-05-12 05:16:45', '2024-05-12 05:16:45'),
(61, 32, 4, '2024-05-12 05:16:45', '2024-05-12 05:16:45'),
(62, 32, 5, '2024-05-12 05:16:45', '2024-05-12 05:16:45'),
(63, 32, 20, '2024-05-12 05:16:45', '2024-05-12 05:16:45'),
(64, 32, 21, '2024-05-12 05:16:45', '2024-05-12 05:16:45'),
(65, 32, 22, '2024-05-12 05:16:45', '2024-05-12 05:16:45');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `deadline` varchar(255) NOT NULL,
  `summary` text NOT NULL,
  `status` enum('not_started','running','canceled','completed') NOT NULL,
  `completion_status` varchar(255) NOT NULL,
  `employer_id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `start_date`, `deadline`, `summary`, `status`, `completion_status`, `employer_id`, `project_id`, `file`, `created_at`, `updated_at`) VALUES
(7, 'Jane Hodges', '1995-11-01', '2006-08-07', 'Nisi libero et recus', 'running', '48', 19, 30, NULL, '2024-05-12 03:56:15', '2024-05-12 03:56:15'),
(8, 'Mari Mcgowan', '1972-03-10', '1990-10-09', 'Accusamus consectetu', 'running', '33', 22, 32, NULL, '2024-05-12 05:18:16', '2024-05-12 21:44:06'),
(9, 'Quail Hester', '1996-01-25', '1971-10-15', 'Nisi labore possimus', 'running', '53', 22, 30, NULL, '2024-05-12 05:38:34', '2024-05-12 05:38:34'),
(10, 'it plan task', '2019-04-22', '1977-04-20', 'Ipsum et qui sed eum', 'completed', '10', 22, 32, NULL, '2024-05-12 05:40:10', '2024-05-13 00:53:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `user_type` enum('admin','employer','client') NOT NULL DEFAULT 'employer',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `employer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `number`, `img`, `user_type`, `email_verified_at`, `password`, `remember_token`, `employer_id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 'Lana', 'abir2@gmail.com', '803', NULL, 'admin', NULL, 'abir@gmail.com', NULL, NULL, NULL, '2024-03-30 04:17:03', '2024-03-30 04:17:03'),
(2, 'Md Abdullah', 'abir@gmail.com', '0174488745', NULL, 'admin', NULL, '$2y$12$bznkrXpn7f3q2iTGs11/WOHRlbTG5Rk9CT8eHyzHIIEvpLgHU34li', NULL, NULL, NULL, '2024-03-30 04:28:25', '2024-03-30 04:28:25'),
(3, 'Abdullah', 'abdullahshake911@gmail.com', '017889515', NULL, 'client', NULL, '$2y$12$9BNDvw7ky5Umsdb/6vm92OJfepKXdvC2MsJa36VzTbHiVwMnnZi6u', 'cgdCvRtAUegzAKoFET0FkVLk3sNZUigVQDmpD8oGNzEE0ggNKe2XqlX3w3NS', NULL, NULL, '2024-03-30 09:24:58', '2024-03-30 09:29:20'),
(7, 'Employer a', 'mdabdullahshake12@gmail.com', '01744197982', '1715185085.jpg', 'admin', NULL, '$2y$12$p2toOSBAUNyDcMkPFeF3AeWIp/XnLB.x1A2LwWgHcJ47ypcxBfGVy', NULL, NULL, NULL, '2024-05-08 10:18:05', '2024-05-09 08:08:15'),
(8, 'Sydnee', 'nuxy@mailinator.com', '29', '1715185145.jpg', 'admin', NULL, '$2y$12$a4m.zeJPfr63baxMpjaz1uEjBvW4Z.7B2WIFqu8HH1X116XXdnQri', NULL, NULL, NULL, '2024-05-08 10:19:05', '2024-05-09 09:55:07'),
(28, 'It Plan Bd', 'itplan@gmail.com', '017484552', NULL, 'employer', NULL, '$2y$12$bT6mmtqfZ7Lr04ItDADd/.o5YQKtMK7WQPa/zgrjHe6Uv2lW0WaFq', NULL, 22, NULL, '2024-05-12 04:00:33', '2024-05-12 04:00:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collections`
--
ALTER TABLE `collections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `collections_project_id_foreign` (`project_id`);

--
-- Indexes for table `employers`
--
ALTER TABLE `employers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employers_category_id_foreign` (`category_id`);

--
-- Indexes for table `employer_categories`
--
ALTER TABLE `employer_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_categories`
--
ALTER TABLE `expense_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notes_project_id_foreign` (`project_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projects_client_id_foreign` (`client_id`),
  ADD KEY `projects_category_id_foreign` (`category_id`);

--
-- Indexes for table `project_categories`
--
ALTER TABLE `project_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_members`
--
ALTER TABLE `project_members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_members_project_id_foreign` (`project_id`),
  ADD KEY `member)id` (`member_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tasks_employer_id_foreign` (`employer_id`),
  ADD KEY `tasks_project_id_foreign` (`project_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member` (`employer_id`),
  ADD KEY `client` (`client_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `collections`
--
ALTER TABLE `collections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `employers`
--
ALTER TABLE `employers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `employer_categories`
--
ALTER TABLE `employer_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `expense_categories`
--
ALTER TABLE `expense_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `project_categories`
--
ALTER TABLE `project_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `project_members`
--
ALTER TABLE `project_members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `collections`
--
ALTER TABLE `collections`
  ADD CONSTRAINT `collections_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`);

--
-- Constraints for table `employers`
--
ALTER TABLE `employers`
  ADD CONSTRAINT `employers_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `employer_categories` (`id`);

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`);

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `project_categories` (`id`),
  ADD CONSTRAINT `projects_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`);

--
-- Constraints for table `project_members`
--
ALTER TABLE `project_members`
  ADD CONSTRAINT `member)id` FOREIGN KEY (`member_id`) REFERENCES `employers` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `project_members_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_employer_id_foreign` FOREIGN KEY (`employer_id`) REFERENCES `employers` (`id`),
  ADD CONSTRAINT `tasks_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `client` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `member` FOREIGN KEY (`employer_id`) REFERENCES `employers` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
