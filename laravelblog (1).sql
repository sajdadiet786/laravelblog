-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2023 at 08:32 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravelblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `navbar_status` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `image`, `title`, `navbar_status`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', '<p>ajfjals</p>', '1676227483-p1.jpg', 'HELLO', 1, 0, 1, '2023-02-12 13:14:43', '2023-02-12 13:14:43'),
(3, 'php', 'php', '<p>this is a function</p>', '1676265751-p1.jpg', 'HELLO', 1, 0, 1, '2023-02-12 23:52:31', '2023-02-12 23:52:31'),
(4, 'laravel', 'laravel', '<div style=\"color: rgb(212, 212, 212); background-color: rgb(30, 30, 30); font-family: Consolas, &quot;Courier New&quot;, monospace; font-size: 14px; line-height: 19px; white-space: pre;\"><span style=\"color: #ce9178;\">tutorial.category_name.post_name</span></div>', '1676282536-Rangamati.png', 'HELLO', 1, 0, 1, '2023-02-13 04:32:16', '2023-02-13 04:32:16'),
(6, 'how to learn laravel', 'how-to-learn-laravel', '<p>how to learn laravel<br></p>', '1676361522-p2.jpg', 'sajda', 1, 0, 1, '2023-02-14 02:27:44', '2023-02-14 02:28:42'),
(7, 'django', 'django', '<p>django is a one of the popular framework..</p>', '1676461345-p1.jpg', 'title1', 1, 0, 1, '2023-02-15 06:12:25', '2023-02-15 06:12:25');

-- --------------------------------------------------------

--
-- Table structure for table `categories_posts`
--

CREATE TABLE `categories_posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories_posts`
--

INSERT INTO `categories_posts` (`id`, `category_id`, `post_id`, `created_at`, `updated_at`) VALUES
(1, 1, 3, NULL, NULL),
(7, 1, 1, NULL, NULL),
(8, 3, 1, NULL, NULL),
(11, 4, 7, NULL, NULL),
(12, 3, 9, NULL, NULL),
(13, 6, 9, NULL, NULL),
(14, 3, 10, NULL, NULL),
(15, 6, 10, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment_body` text NOT NULL,
  `status` enum('pending','approve') DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `user_id`, `comment_body`, `status`, `created_at`, `updated_at`) VALUES
(5, 1, 3, 'sdfdgffg', 'approve', '2023-02-14 05:18:29', '2023-02-14 23:23:05'),
(6, 3, 3, 'dsfggfhghgh', 'approve', '2023-02-14 05:39:22', '2023-02-14 23:23:47'),
(7, 3, 3, 'dfgdsgf', 'approve', '2023-02-14 06:15:31', '2023-05-20 04:10:25'),
(8, 7, 3, 'hello every one', 'approve', '2023-02-14 06:21:51', '2023-05-20 04:10:21'),
(9, 7, 3, 'nice information', 'approve', '2023-02-14 06:48:26', '2023-02-15 01:19:38'),
(10, 9, 4, 'hello everyone', 'approve', '2023-02-14 07:22:02', '2023-02-15 00:12:17'),
(29, 1, 1, 'sfgsfd', 'approve', '2023-02-15 01:29:14', '2023-02-15 11:51:10'),
(30, 1, 1, 'fdf', 'approve', '2023-02-15 01:30:32', '2023-02-15 11:50:45'),
(31, 1, 1, 'fdsfdsf', 'approve', '2023-02-15 01:33:10', '2023-02-15 11:50:58'),
(32, 1, 1, 'hiii', 'approve', '2023-02-15 02:57:20', '2023-02-15 11:51:27'),
(33, 10, 3, 'nice information', 'approve', '2023-02-15 11:48:54', '2023-02-15 11:51:56');

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
(7, '2014_10_12_000000_create_users_table', 1),
(8, '2014_10_12_100000_create_password_resets_table', 1),
(9, '2019_08_19_000000_create_failed_jobs_table', 1),
(10, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(11, '2023_02_03_094800_add_role_as_to_users_table', 1),
(12, '2023_02_03_104618_create_categories_table', 1),
(26, '2023_02_04_104050_create_posts_table', 2),
(27, '2023_02_04_124912_create_categories_table', 2),
(28, '2023_02_08_125554_create_comments_table', 2),
(29, '2023_02_10_051146_create_categories_posts_table', 2);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `name`, `slug`, `description`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'sajda perween', 'sajda-perween', '<p>sajda perween<br></p>', 0, 1, '2023-02-12 23:15:02', '2023-02-12 23:15:02'),
(3, 'Admin', 'admin', '<div style=\"color: rgb(212, 212, 212); background-color: rgb(30, 30, 30); font-family: Consolas, &quot;Courier New&quot;, monospace; font-size: 14px; line-height: 19px; white-space: pre;\"><span style=\"color: #6a9955;\">$request-&gt;categories</span></div>', 0, 1, '2023-02-12 23:16:38', '2023-02-12 23:16:38'),
(7, 'how to learn laravel', 'how-to-learn-laravel', '<p>how to learn laravel&nbsp;how to learn laravel&nbsp;how to learn laravel&nbsp;<br></p>', 0, 1, '2023-02-14 00:52:26', '2023-02-14 00:52:26'),
(9, 'mohan', 'mohan', '<div style=\"color: rgb(212, 212, 212); background-color: rgb(30, 30, 30); font-family: Consolas, &quot;Courier New&quot;, monospace; font-size: 14px; line-height: 19px; white-space: pre;\"><span style=\"color: #dcdcaa;\">posts1</span></div>', 0, 1, '2023-02-14 02:46:44', '2023-02-14 02:46:44'),
(10, 'how to define this languages.', 'how-to-define-this-languages', '<p style=\"color: rgb(51, 51, 51); font-family: inter-regular, system-ui, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; text-align: justify;\">Django Tutorial provides basic and advanced concepts of Django. Our Django Tutorial is designed for beginners and professionals both.</p><p style=\"color: rgb(51, 51, 51); font-family: inter-regular, system-ui, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; text-align: justify;\">Django is a Web Application Framework which is used to develop web applications.</p><p style=\"color: rgb(51, 51, 51); font-family: inter-regular, system-ui, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; text-align: justify;\">Our Django Tutorial includes all topics of Django such as introduction, features, installation, environment setup, admin interface, cookie, form validation, Model, Template Engine, Migration, MVT etc. All the topics are explained in detail so that reader can get enought knowledge of Django.</p>', 0, 1, '2023-02-15 06:14:41', '2023-02-15 06:14:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_as` int(11) NOT NULL DEFAULT 0,
  `auth_type` varchar(11) DEFAULT 'email'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role_as`, `auth_type`) VALUES
(1, 'Admin', 'admin@admin.com', NULL, '$2y$10$xcfACf9ROtDgZG6Sv90ZN.llotF.Nv/HyzLGtWNhWoUWvvqNjsod2', NULL, '2023-02-04 01:05:29', '2023-02-06 01:38:59', 1, 'email'),
(2, 'test', 'test@gmail.com', NULL, '$2y$10$yRk8wVFbA0yTaRyRfeVxEeW/3HfpbCwoOvAG3HCcgXjFYHM2w9OIa', NULL, '2023-02-04 01:06:08', '2023-02-06 01:40:52', 0, 'email'),
(3, 'sajda', 'sajda123@gmail.com', NULL, '$2y$10$wC8Lp9lqGHuCAfVBbtC4heSg61gmL5jiAFJSLIaGigKiUkrJ1sPd6', NULL, '2023-02-06 02:39:20', '2023-02-06 02:39:20', 0, 'email'),
(4, 'muskan', 'muskan@gmail.com', NULL, '$2y$10$e.gb7VlJdOjK/FfJiREHaOX2qgjQZ0UNn0X2n6ruY1l1ks1RSpkwi', NULL, '2023-02-14 07:06:02', '2023-02-14 07:06:02', 0, 'email'),
(5, 'sajda perween', 'sajda.diet@gmail.com', NULL, '$2y$10$LRC.mzR92qGQ69.B98u66ujaOj/vdBmnuOrERI1WAzZB1IL6kTS4O', NULL, '2023-02-21 06:42:48', '2023-02-21 06:42:48', 0, 'github'),
(6, 'Sajda Perween', 'sajdap651@gmail.com', NULL, '$2y$10$PdAysciBfmf8du2zTYa02uLIYDFd6Pkg/I65zbWTdVoj9vgk7pXTS', NULL, '2023-02-21 07:15:23', '2023-02-21 07:15:23', 0, 'google'),
(7, 'Sajda Perween', 'sajdaperween.liangtuang@gmail.com', NULL, '$2y$10$CXWIMo61VmmycXrdPSNrHeJTUMRbWEOV/EyE3tjoeVIlFBr8fbRJq', NULL, '2023-02-21 07:43:32', '2023-02-21 07:43:32', 1, 'google');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `categories_posts`
--
ALTER TABLE `categories_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_posts_category_id_foreign` (`category_id`),
  ADD KEY `categories_posts_post_id_foreign` (`post_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories_posts`
--
ALTER TABLE `categories_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories_posts`
--
ALTER TABLE `categories_posts`
  ADD CONSTRAINT `categories_posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `categories_posts_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
