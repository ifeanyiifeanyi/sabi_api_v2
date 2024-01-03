-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2023 at 03:36 PM
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
-- Database: `sabi`
--

-- --------------------------------------------------------

--
-- Table structure for table `active_plans`
--

CREATE TABLE `active_plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userId` bigint(20) UNSIGNED NOT NULL,
  `paymentPlanId` bigint(20) UNSIGNED NOT NULL,
  `duration` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expired_at` tinyint(4) DEFAULT NULL,
  `transaction_reference` varchar(255) DEFAULT NULL,
  `payment_type` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `active_plans`
--

INSERT INTO `active_plans` (`id`, `userId`, `paymentPlanId`, `duration`, `created_at`, `updated_at`, `expired_at`, `transaction_reference`, `payment_type`, `amount`) VALUES
(1, 1, 3, 365, '2023-01-17 17:56:00', '2023-01-17 17:56:00', 1, 'T306252727124895', 'OnlinePayment', '15000'),
(2, 2, 3, 365, '2023-03-28 10:46:08', '2023-03-28 10:46:08', 1, 'T149145121857870', 'OnlinePayment', '15000');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `author` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `likes` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `author`, `title`, `slug`, `description`, `views`, `likes`, `created_at`, `updated_at`, `thumbnail`) VALUES
(1, 'Evangelist Peter Okafor', 'Saints and Sinners Part II', 'saints-and-sinners-part-ii', 'Lorem delectus nobi, t is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 0, 0, '2023-03-29 10:01:52', '2023-05-04 13:53:14', 'uploads/blogs/1683211994.jpg'),
(2, 'Mr. Charles Kene', 'Saints and Sinners', 'saints-and-sinners', 'Inventore debitis no, t is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 0, 0, '2023-03-29 10:02:05', '2023-05-04 13:52:12', 'uploads/blogs/1683211932.jpg'),
(3, 'Bro. Matthew Colts', 'Catholic Culture', 'catholic-culture', 'Dolore quibusdam sun, t is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 0, 0, '2023-03-29 10:02:24', '2023-05-04 13:51:26', 'uploads/blogs/1683211886.jpg'),
(5, 'Rev. Sr. Martha Stones', 'Faithfully Catholic', 'faithfully-catholic', 'Veniam ullam aute sIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like.\r\nFaithfully Catholic, It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like', 0, 0, '2023-05-04 12:47:27', '2023-05-04 13:49:50', 'uploads/blogs/1683211790.jpg'),
(7, 'Rev. John Doe', 'Catholic Corner', 'catholic-corner', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like', 0, 0, '2023-05-04 13:41:08', '2023-05-04 13:41:08', 'uploads/blogs/1683211268.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` tinytext NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Catechism', '<p>Catechism</p>', 'Catechism', '2023-01-16 17:35:34', '2023-01-16 17:35:34'),
(2, 'Baptism', '<p>Baptism</p>', 'Baptism', '2023-01-16 17:35:54', '2023-01-16 17:35:54'),
(3, 'Communion', '<p>Communion</p>', 'Communion', '2023-01-16 17:36:32', '2023-01-16 17:36:32');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment` text NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `blog_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `user_id`, `blog_id`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Another comment stored ...', 1, 5, '2023-05-24 10:42:43', '2023-06-02 13:53:30', 1),
(2, 'Love this content', 1, 3, '2023-05-24 10:43:16', '2023-05-25 11:33:12', 1),
(3, 'Another content. I love', 1, 2, '2023-05-24 10:43:42', '2023-06-02 13:53:19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comment_replies`
--

CREATE TABLE `comment_replies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reply` text NOT NULL,
  `comment_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comment_replies`
--

INSERT INTO `comment_replies` (`id`, `reply`, `comment_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'We appreciate your comment', 2, 1, '2023-05-25 12:29:22', '2023-05-25 12:29:22'),
(2, 'Please read the new article written by Fr. John Doe', 2, 1, '2023-05-25 12:30:08', '2023-05-25 12:30:08');

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
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `name`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Religion', 'religion', '<p>religion</p>', '2023-01-16 17:52:13', '2023-01-16 17:52:13'),
(2, 'Afro', 'afro', '<p>tell us about afro genre</p>', '2023-05-25 13:34:01', '2023-05-25 13:34:01');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `video_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(83, '2023_01_16_162745_create_user_verifies_table', 5),
(98, '2014_10_12_000000_create_users_table', 6),
(99, '2014_10_12_100000_create_password_resets_table', 6),
(100, '2019_08_19_000000_create_failed_jobs_table', 6),
(101, '2019_12_14_000001_create_personal_access_tokens_table', 6),
(102, '2022_11_14_181243_create_categories_table', 6),
(103, '2022_11_17_131311_create_payment_plans_table', 6),
(104, '2022_11_23_150102_create_genres_table', 6),
(105, '2022_11_29_121353_create_ratings_table', 6),
(106, '2022_11_29_121708_create_parent_controls_table', 6),
(107, '2022_11_29_121709_create_videos_table', 6),
(108, '2023_01_07_112904_add_views_likes_to_video_table', 6),
(109, '2023_01_07_113247_create_active_plans_table', 6),
(110, '2023_01_09_145411_add_expire_status_and_transaction_refno_and_amount_to_active_plans', 6),
(111, '2023_01_14_214207_likes_video_table', 6),
(112, '2023_01_16_181020_add_token_to_users_table', 6),
(113, '2023_03_29_091258_create_blogs_table', 7),
(114, '2023_04_19_145553_add_thumbnail_to_blog', 8),
(115, '2023_05_11_141155_create_comments_table', 9),
(116, '2023_05_23_105353_add_comment_status_to_comment_table', 10),
(117, '2023_05_25_114814_create_comment_replies_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `parent_controls`
--

CREATE TABLE `parent_controls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parent_controls`
--

INSERT INTO `parent_controls` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'PG13', '2023-01-16 17:52:46', '2023-01-16 17:52:46');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('John500@gmail.com', '$2y$10$rNgMtz1phuYUo5doLTc4pe9yyYeRLezXbsM6.gFOWfBYl8QOSJdU2', '2023-04-05 13:19:42');

-- --------------------------------------------------------

--
-- Table structure for table `payment_plans`
--

CREATE TABLE `payment_plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `amount` double NOT NULL,
  `duration_in_name` varchar(255) NOT NULL,
  `duration_in_number` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_plans`
--

INSERT INTO `payment_plans` (`id`, `name`, `amount`, `duration_in_name`, `duration_in_number`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Standard Plan', 5000, '3 Months', 92, 1, '2023-01-16 17:37:16', '2023-01-16 17:37:16'),
(2, 'Plantinum Plan', 10000, '6 Months', 182, 1, '2023-01-16 17:38:02', '2023-01-16 17:38:02'),
(3, 'Economy Plan', 15000, '12 Months', 365, 1, '2023-01-16 17:39:11', '2023-01-16 17:39:11'),
(4, 'Per Day', 600, '24 hours', 2, 1, '2023-05-30 20:27:29', '2023-05-30 20:27:29');

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

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'M2003J15SC', 'ced19db174a0095a3a4d379ab22f53d4fbc1df306cbbc58d5ed32dcf37b8f9c7', '[\"*\"]', NULL, NULL, '2023-01-24 18:48:12', '2023-01-24 18:48:12'),
(2, 'App\\Models\\User', 1, 'M2003J15SC', '68af4a1c1e126c781210b89d050c93115c1d107316e46d1ae6e4620836346e4b', '[\"*\"]', NULL, NULL, '2023-01-24 18:59:04', '2023-01-24 18:59:04'),
(3, 'App\\Models\\User', 1, 'M2003J15SC', '4277c14f21bcf66ab7f0c6d0445d976769de6981a80411cadb4dbc54df747ca8', '[\"*\"]', NULL, NULL, '2023-01-25 18:41:18', '2023-01-25 18:41:18'),
(4, 'App\\Models\\User', 1, 'M2003J15SC', 'a0790686e0d28cafb28d598b89c115af34ffbb89b20d9da3a05deee4a171d154', '[\"*\"]', NULL, NULL, '2023-01-25 18:41:51', '2023-01-25 18:41:51'),
(5, 'App\\Models\\User', 1, 'M2003J15SC', '366b4e8ec72c70952d0575e628851f6dcc931448cc80b3c9eeec735c658f2f21', '[\"*\"]', NULL, NULL, '2023-01-27 09:56:22', '2023-01-27 09:56:22'),
(6, 'App\\Models\\User', 1, 'M2003J15SC', '775500f3595ecbdfc2465c36f192283c4bdfe2a641cd6145736740ed011b5601', '[\"*\"]', NULL, NULL, '2023-01-27 13:58:10', '2023-01-27 13:58:10'),
(7, 'App\\Models\\User', 1, 'M2003J15SC', '7df989d4e29640b5052c3b2bf9ae3af41ca07724600e7703da78065d509eefba', '[\"*\"]', NULL, NULL, '2023-01-27 13:59:23', '2023-01-27 13:59:23'),
(8, 'App\\Models\\User', 4, 'M2003J15SC', '51785286a0e0a0b14b7192836991b9a190efba7180981665e1da2eea51f1faba', '[\"*\"]', NULL, NULL, '2023-03-28 11:04:13', '2023-03-28 11:04:13'),
(9, 'App\\Models\\User', 5, 'M2003J15SC', '36b85feeb67f8c55fd89978e2060987b76ed119d6fdb5866f56038aecbdb2894', '[\"*\"]', NULL, NULL, '2023-03-28 12:25:06', '2023-03-28 12:25:06'),
(10, 'App\\Models\\User', 6, 'M2003J15SC', 'dcb6c698d637ce1201e41a304844945201eade1802c2dfadb289d8ae85cbccee', '[\"*\"]', NULL, NULL, '2023-03-28 12:49:16', '2023-03-28 12:49:16'),
(11, 'App\\Models\\User', 7, 'M2003J15SC', '5f500ca24029d5f6784a7b08992ccd4c893b29449e6014ac6fe549f71f71e1fa', '[\"*\"]', NULL, NULL, '2023-03-28 12:58:43', '2023-03-28 12:58:43'),
(12, 'App\\Models\\User', 8, 'M2003J15SC', '39965477017d351d969d9ca764e7f04969bd163834b7d65ea58d4a0e86a8fb6e', '[\"*\"]', NULL, NULL, '2023-04-04 08:30:10', '2023-04-04 08:30:10'),
(13, 'App\\Models\\User', 9, 'M2003J15SC', '1dae709be6e4c59851d58487683adf405afa971348506c74e1bd8b13517f8457', '[\"*\"]', NULL, NULL, '2023-04-04 08:31:50', '2023-04-04 08:31:50'),
(14, 'App\\Models\\User', 10, 'Simulator iOS', '1135689cbfb3bdc5422c3768c5c284765badff85938d7aa882499325036f4721', '[\"*\"]', NULL, NULL, '2023-09-15 06:48:57', '2023-09-15 06:48:57'),
(15, 'App\\Models\\User', 11, 'Simulator iOS', 'a335bf65b1d0f5a41aad29b0385533e6e4bb864b2b77161b1077a31ebcae410a', '[\"*\"]', NULL, NULL, '2023-09-15 20:31:41', '2023-09-15 20:31:41');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'New', '2023-01-16 17:52:35', '2023-01-16 17:52:35'),
(2, 'In Demand', '2023-01-17 17:29:51', '2023-01-17 17:29:51'),
(3, 'Faith', '2023-01-17 17:30:12', '2023-01-17 17:30:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userid` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `role_as` tinyint(4) NOT NULL DEFAULT 0,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `subscription_id` int(11) DEFAULT NULL,
  `subcribe_date` date DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userid`, `username`, `name`, `image`, `status`, `role_as`, `email`, `email_verified_at`, `password`, `subscription_id`, `subcribe_date`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `token`) VALUES
(1, '7999', 'Admin', 'Admin User', NULL, 1, 1, 'admin@admin.com', '2023-01-17 18:10:03', '$2y$10$88HvytldbNPS8n9CBOfRuu15ZBEzSSpvZmWOeipibudo4ZcSJTIcS', 3, '2023-01-17', NULL, '2023-01-16 17:32:16', '2023-01-17 17:56:00', NULL, 'Xg4t2uVXyr3mMlDwJTRR27kmf45kEiRyCkcFUQ9Pcz2X5LT0F8UYybMMWryb67cw'),
(2, '8171', 'John123', 'John Doe', NULL, 1, 0, 'John@gmail.com', '2023-01-17 18:10:03', '$2y$10$78IcJElh73oOqktaJ8nIR.hjWpdarKAzwKNhe.EogfDLBdiCPdtDy', 3, '2023-03-28', 'BOj02iihAaym68oDXDa70HJCh5cJtMU8nOd2I8fNpEeGIFckcJJMqlXPc2ow', '2023-01-17 18:06:33', '2023-04-18 11:47:25', NULL, 'Xg4t2uVXyr3mMlDwJTRR27kmf45kEiRyCkcFUQ9Pcz2X5LT0F8UYybMMWryb67cw'),
(3, '2513', 'Jack123', 'Jack Reacher', NULL, 1, 0, 'Jack@mail.com', NULL, '$2y$10$7GrIy2BzPSlbCwQ20AgO2ejZ/Yeqdu1UbTAvN5E2n4ee7Nh54YChi', NULL, NULL, NULL, '2023-01-23 21:05:17', '2023-06-02 08:03:01', NULL, 'huniK0KyRb7GptzGZvY1ifozZfZ5tvwbyupA0HZQ7K8mDZlpajvVsTSGAL8kae44'),
(7, '9065', 'John500', 'Afkin John', NULL, 1, 0, 'John500@gmail.com', '2023-03-28 12:59:38', '$2y$10$0szziVFlUpUFjBX2x.PFYeNWim.Qsdq6l7J/cjzjLNJZUhgfBkc1K', NULL, NULL, NULL, '2023-03-28 12:58:43', '2023-06-02 08:03:00', NULL, 'Pzct2dkaYvsSJ1XeGUKfWaiu3nqNcjm02f3FbJzLF5YwF7t5ta4odYjpJCzjAIYy'),
(9, '3870', 'Test500', 'Test500', NULL, 1, 0, 'Test500@mail.com', '2023-04-04 08:32:38', '$2y$10$A9UikZfWwGUiy7tW6N9T1.JQnXy7VgCkJ5QcAzk23ifWeB7Bg0mIe', NULL, NULL, NULL, '2023-04-04 08:31:50', '2023-09-05 09:07:33', NULL, 'PtzDflMpeik8Od5NDpdRQMqVHihRWH3txlXiJsB2JkCSdvvxKgnvekvJlivdVDnw'),
(10, '9040', '@philcollins', 'Phil Collins', NULL, 0, 0, 'phil@truefile.org', NULL, '$2y$10$ckMBYpXjvRbWeUpCuBWXouubscsDnbE/ONV2QqpJAWe6M9OvQ//gK', NULL, NULL, NULL, '2023-09-15 06:48:57', '2023-09-15 06:48:57', NULL, 'CC0l4n52VCFgzw5FxpXOqmr84fUcJ9xSsNzAQPZ5I0YePyoraLs1Pst3dvuWTDlG'),
(11, '3825', '@Ebube_ihediwa', 'Ebubechi Ihediwa', NULL, 0, 0, 'ebube2003nice@gmail.com', NULL, '$2y$10$WT3p/GOaweJ1.UO6p8A55Ojr83fv75yXV7pGo/SA6l8gdLuhiJKbC', NULL, NULL, NULL, '2023-09-15 20:31:39', '2023-09-15 20:31:41', NULL, 'yihJZp8YzyfC92ORQuVYMDwcqt0MKkrylf0aSerZmkzvuvbYj1oZfx0BbqkltkDz');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `genres_id` bigint(20) UNSIGNED NOT NULL,
  `short_description` tinytext NOT NULL,
  `long_description` text DEFAULT NULL,
  `length` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `video` varchar(255) NOT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `rating_id` smallint(6) NOT NULL,
  `parent_control_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `likes` int(11) NOT NULL DEFAULT 0,
  `views` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `title`, `slug`, `category_id`, `genres_id`, `short_description`, `long_description`, `length`, `status`, `video`, `thumbnail`, `rating_id`, `parent_control_id`, `deleted_at`, `created_at`, `updated_at`, `likes`, `views`) VALUES
(1, 'Theology of Catholic Catechism', 'theology-of-catholic-catechism', 1, 1, 'Theology of Catholic Catechism: Exploring Sacred Doctrine', 'Theology of Catholic Catechism: Exploring Sacred Doctrine', '1 hours 67 seconds', 1, 'uploads/videos/1679984249.mp4', 'uploads/thumbnails/1679984249.jpg', 3, 1, NULL, '2023-03-28 05:17:29', '2023-09-05 19:12:49', 1, 12),
(2, 'Deep Dive into Catholic Catechism', 'deep-dive-into-catholic-catechism', 2, 1, 'Deep Dive into Catholic Catechism: Faith Formation Series', 'Deep Dive into Catholic Catechism: Faith Formation Series', '1 hours 67 seconds', 1, 'uploads/videos/1679984371.mp4', 'uploads/thumbnails/1679984371.jpg', 2, 1, NULL, '2023-03-28 05:19:31', '2023-09-05 19:11:12', 0, 7),
(3, 'Catholic Catechism Unveiled', 'catholic-catechism-unveiled', 2, 1, 'Catholic Catechism Unveiled: Your Roadmap to Spiritual Knowledge', 'Catholic Catechism Unveiled: Your Roadmap to Spiritual Knowledge', '2 hours 23 seconds', 1, 'uploads/videos/1679984461.mp4', 'uploads/thumbnails/1679984461.jpg', 2, 1, NULL, '2023-03-28 05:21:01', '2023-09-05 19:10:07', 2, 47),
(4, 'Foundations of Catholic Faith', 'foundations-of-catholic-faith', 3, 1, 'Foundations of Catholic Faith: Exploring Catechism Principles', 'Foundations of Catholic Faith: Exploring Catechism Principles', '1 hours 67 seconds', 0, 'uploads/videos/1679984530.mp4', 'uploads/thumbnails/1679984530.jpeg', 3, 1, NULL, '2023-03-28 05:22:10', '2023-09-05 19:07:49', 0, 0),
(5, 'Journey Through Catholic Catechism', 'Journey Through Catholic Catechism', 3, 1, 'Journey Through Catholic Catechism: Faith, Doctrine, and Tradition', 'Journey Through Catholic Catechism: Faith, Doctrine, and Tradition', '1 hours 67 seconds', 1, 'uploads/videos/1679984585.mp4', 'uploads/thumbnails/1679984585.jpeg', 3, 1, NULL, '2023-03-28 05:23:05', '2023-09-05 18:45:07', 1, 5),
(6, 'Understanding Catholic Catechism', 'understanding-catholic-catechism', 1, 1, 'Understanding Catholic Catechism: A Comprehensive Guide', 'Understanding Catholic Catechism: A Comprehensive Guide', '2 hours 23 seconds', 1, 'uploads/videos/1679984630.mp4', 'uploads/thumbnails/1679984630.jpg', 2, 1, NULL, '2023-03-28 05:23:50', '2023-09-05 19:04:47', 1, 12),
(7, 'Catechism for Catholics', 'catechism-for-catholics', 1, 1, 'Catechism for Catholics: Navigating Your Faith Journey', 'Catechism for Catholics: Navigating Your Faith Journey', '59 mins', 1, 'uploads/videos/1693947247.mp4', 'uploads/thumbnails/1693947247.jpg', 1, 1, NULL, '2023-09-05 19:54:07', '2023-09-05 19:54:07', 0, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `active_plans`
--
ALTER TABLE `active_plans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `active_plans_userid_foreign` (`userId`),
  ADD KEY `active_plans_paymentplanid_foreign` (`paymentPlanId`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blogs_title_unique` (`title`),
  ADD UNIQUE KEY `blogs_slug_unique` (`slug`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_replies`
--
ALTER TABLE `comment_replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_replies_comment_id_foreign` (`comment_id`),
  ADD KEY `comment_replies_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parent_controls`
--
ALTER TABLE `parent_controls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_plans`
--
ALTER TABLE `payment_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_userid_unique` (`userid`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `videos_category_id_foreign` (`category_id`),
  ADD KEY `videos_genres_id_foreign` (`genres_id`),
  ADD KEY `videos_parent_control_id_foreign` (`parent_control_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `active_plans`
--
ALTER TABLE `active_plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comment_replies`
--
ALTER TABLE `comment_replies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `parent_controls`
--
ALTER TABLE `parent_controls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment_plans`
--
ALTER TABLE `payment_plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `active_plans`
--
ALTER TABLE `active_plans`
  ADD CONSTRAINT `active_plans_paymentplanid_foreign` FOREIGN KEY (`paymentPlanId`) REFERENCES `payment_plans` (`id`),
  ADD CONSTRAINT `active_plans_userid_foreign` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);

--
-- Constraints for table `comment_replies`
--
ALTER TABLE `comment_replies`
  ADD CONSTRAINT `comment_replies_comment_id_foreign` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comment_replies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `videos_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `videos_genres_id_foreign` FOREIGN KEY (`genres_id`) REFERENCES `genres` (`id`),
  ADD CONSTRAINT `videos_parent_control_id_foreign` FOREIGN KEY (`parent_control_id`) REFERENCES `parent_controls` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
