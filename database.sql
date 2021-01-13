-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 29, 2020 at 04:38 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ribbbon`
--

-- --------------------------------------------------------

--
-- Table structure for table `beta`
--

CREATE TABLE `beta` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `phone_number` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `point_of_contact` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `user_id`, `name`, `created_at`, `updated_at`, `phone_number`, `point_of_contact`, `email`) VALUES
(1, 1, 'Mr. Cleo O\'Connell V', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1-55-555-555', 'Dr. Francesca Wisoky', 'test@test.com'),
(2, 3, 'badarawuhi', '2020-10-07 03:20:01', '2020-10-07 03:20:01', '123', '123', 'badarawuhi@gmail.com'),
(3, 3, 'bada 2', '2020-10-07 05:47:49', '2020-10-07 05:47:49', '', '', 'badarawuhi@gmail.com'),
(5, 6, 'Pak Galih', '2020-10-18 07:40:32', '2020-10-18 07:40:32', '', '', 'galih@gmail.com'),
(6, 2, 'test', '2020-10-18 07:47:59', '2020-10-18 07:47:59', '', '', ''),
(7, 2, 'rerere', '2020-10-18 08:22:02', '2020-10-18 08:22:02', '', '', ''),
(8, 6, 'Pak Oding', '2020-10-18 09:05:42', '2020-10-18 09:05:42', '', '', ''),
(9, 2, 'sdfsdf', '2020-10-18 09:19:28', '2020-10-18 09:19:28', '', '', ''),
(10, 2, 'sdfsdf', '2020-10-18 09:19:33', '2020-10-18 09:19:33', '', '', ''),
(11, 7, 'steessdfssdfsdfs', '2020-10-18 09:24:03', '2020-10-18 09:24:13', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `credentials`
--

CREATE TABLE `credentials` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hostname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `port` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_08_09_052124_create_clients_table', 1),
('2014_08_09_063112_create_users_table', 1),
('2014_08_28_023252_add_phone_number_to_clients_table', 1),
('2014_08_28_023852_add_point_of_contact_to_clients_table', 1),
('2014_08_28_230406_add_email_to_clients_table', 1),
('2014_08_30_065400_create_projects_table', 1),
('2014_09_08_015054_create_tasks_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2014_11_10_020932_create_beta_table', 1),
('2014_11_14_024037_add_urls_to_projects_table', 1),
('2014_11_15_040228_create_credentials_table', 1),
('2014_12_04_060354_create_project_user_table', 1),
('2015_02_27_031522_create_files_table', 1),
('2015_08_04_005928_addDescriptionAndWishColumnsToTasks', 1),
('2015_11_04_030315_add_extra_task-columns', 1),
('2016_01_15_011034_new_user_columns', 1),
('2016_02_29_031524_add_priority_column_to_tasks', 1),
('2016_05_09_005222_drop_wish_column', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `production` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `stage` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dev` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `github` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `user_id`, `client_id`, `name`, `description`, `created_at`, `updated_at`, `production`, `stage`, `dev`, `github`) VALUES
(1, 1, 1, 'First Project', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', ''),
(2, 3, 2, 'task 1', 'huhuhu', '2020-10-07 03:20:08', '2020-10-07 05:45:04', 'sdfadf', '', 'asdfasd', 'github.com/test'),
(5, 6, 5, 'Pemograman Mobile', '', '2020-10-18 07:40:54', '2020-10-18 07:40:54', '', '', '', ''),
(6, 2, 6, 'tests', '', '2020-10-18 07:48:10', '2020-10-18 07:48:10', '', '', '', ''),
(7, 2, 6, 'jhjhk', '', '2020-10-18 08:22:21', '2020-10-18 08:22:21', '', '', '', ''),
(8, 2, 7, 'klklkl', '', '2020-10-18 09:19:13', '2020-10-18 09:19:13', '', '', '', ''),
(9, 7, 11, 'sdfsd', '', '2020-10-18 09:24:24', '2020-10-18 09:24:24', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `project_user`
--

CREATE TABLE `project_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `project_user`
--

INSERT INTO `project_user` (`id`, `project_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 2, 2, '2020-10-07 03:23:40', '2020-10-07 03:23:40'),
(2, 2, 1, '2020-10-18 02:02:54', '2020-10-18 02:02:54'),
(3, 2, 5, '2020-10-18 02:03:25', '2020-10-18 02:03:25'),
(4, 2, 3, '2020-10-18 02:03:55', '2020-10-18 02:03:55'),
(8, 5, 2, '2020-10-18 07:45:49', '2020-10-18 07:45:49'),
(9, 6, 6, '2020-10-18 07:48:22', '2020-10-18 07:48:22');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `weight` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `due_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `priority` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `user_id`, `project_id`, `name`, `state`, `weight`, `created_at`, `updated_at`, `description`, `due_date`, `priority`) VALUES
(1, 1, 1, 'First Task', 'incomplete', '2', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', ''),
(2, 2, 2, 'bada', 'complete', '1', '2020-10-07 05:43:25', '2020-10-07 05:43:59', 'ini adalah bada', '', 'normal'),
(4, 2, 2, 'ini task ku', 'complete', '1', '2020-10-18 02:01:20', '2020-10-18 08:23:29', 'ini adalah task yang sangat penting', '', 'normal'),
(10, 2, 6, 'fgdfgfdg', 'backlog', '1', '2020-10-27 00:57:16', '2020-10-27 01:15:40', '', '', 'normal'),
(11, 2, 7, 'dsfd', 'progress', '1', '2020-10-27 07:39:16', '2020-10-27 07:39:16', '', '', 'normal'),
(12, 6, 5, 'trrtgrtg', 'progress', '1', '2020-10-28 00:08:23', '2020-10-28 00:08:23', '', '', 'normal');

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nim` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tasks_created` int(11) NOT NULL,
  `tasks_completed` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bio` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `linkedin` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `nim`, `password`, `avatar`, `tasks_created`, `tasks_completed`, `remember_token`, `created_at`, `updated_at`, `title`, `bio`, `link`, `twitter`, `facebook`, `linkedin`) VALUES
(1, 'Hayden Mayert', 'test@ribbbon.com', NULL, '$2y$10$e1EJ8sq8jyZin3PcXp/7KesLPvXhGwBLejxvyk1Cu.h3w4EY/dpT2', '', 1, 0, '77lY6LY0LNSbUd8vA9hiwso8txCL1UwvKKNZryZEZNhlnhIZGQM60Qu2Sk2o', '0000-00-00 00:00:00', '2020-10-07 06:00:06', '', '', '', '', '', ''),
(2, 'badarawuhi', 'badarawuhi@gmail.com', '2016150036', '$2y$10$Q1drBUBvof213zbrSxmUXuM1qbezY4FtjMFnkkBfOal9N0oj0OYuq', '', 0, 0, '4hCgR7sgheZfNOlDtWrpgQfypDoz1kAZ5YjC30Xi14MHuJeWAK8nGo2ZzDC3', '2020-10-07 03:15:21', '2020-10-29 05:10:05', '', '', 'badarawuhi', '', '', ''),
(3, 'hadi', 'hadi270797@gmail.com', NULL, '$2y$10$DWDslzyWrQU6O2pjwh3Ajugcwd1IK.n/kUrRRsu1DP9hO56ePts3S', '', 0, 0, '1746HjlV4EsWHaAo8NtcuPQhI87B9po2zPGkM5bINi0oK8eEopK6VwfSjaMu', '2020-10-07 03:19:26', '2020-10-07 07:29:35', '', '', '', '', '', ''),
(5, 'cesss', 'ceesco53@gmail.com', NULL, '$2y$10$/cTW.IOyJVCAqR9VTvdhF.Lb.W5in/LRXiIWADcVPz59KTaQoTsRW', '', 0, 0, '1M8mnEFS2V1dwcWSAE0X4Yn3YOSmM3AGFnd6rSieZXU7USabT4z0MX5lWIFh', '2020-10-07 07:55:07', '2020-10-07 08:25:40', '', '', '', '', '', ''),
(6, 'admin', 'admin@admin.com', '2016150034', '$2y$10$u9U4PFPwPY3KREJZyTamuOjBdEAwsJPazzuilIqkpBz.PTVscVvOu', '', 0, 0, 'npPku18NeuiLgKOSOyZmSVteHXeiEAt19c0wfUVqibTJx2aTupfPCvceFfDv', '2020-10-18 07:31:14', '2020-10-29 05:07:57', 'Teknik Informatika', 'how about me', 'admin', '', '', ''),
(7, 'testtest', 'test1@test.com', '2016150012', '$2y$10$4Kn4mAdFoGHuMwMsJvmCZecMjxmS8GjFR.b/UExoJFh4IA5Z6VOnW', '', 0, 0, 'K7WuurAWtQaRFYhk0oeChTG6d2zSQBvUypLdEbcy9qKwZerTYqNFAafaJMKY', '2020-10-18 09:16:36', '2020-10-29 05:17:01', 'Ti', '', '', '', '', ''),
(8, 'nana na na na', '123@email.com', '123123123', '$2y$10$uxYO4qZUM8CPhTdLj1DcEu7.nVS354km2IcCYndcKF6Pmxy/8ptQK', '', 0, 0, NULL, '2020-10-29 05:18:26', '2020-10-29 05:18:35', 'Ti', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beta`
--
ALTER TABLE `beta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `credentials`
--
ALTER TABLE `credentials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_user`
--
ALTER TABLE `project_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_user_project_id_index` (`project_id`),
  ADD KEY `project_user_user_id_index` (`user_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uploads_user_id_foreign` (`user_id`),
  ADD KEY `uploads_project_id_foreign` (`project_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `nomor_induk` (`nim`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beta`
--
ALTER TABLE `beta`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `credentials`
--
ALTER TABLE `credentials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `project_user`
--
ALTER TABLE `project_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `project_user`
--
ALTER TABLE `project_user`
  ADD CONSTRAINT `project_user_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `project_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `uploads`
--
ALTER TABLE `uploads`
  ADD CONSTRAINT `uploads_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `uploads_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
