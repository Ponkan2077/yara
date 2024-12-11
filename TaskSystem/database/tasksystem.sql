-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2024 at 03:19 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tasksystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `action`
--

CREATE TABLE `action` (
  `action_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `action` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `action_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `action`
--

INSERT INTO `action` (`action_id`, `user_id`, `action`, `created_at`, `action_title`) VALUES
(1, 23, 'Add Task', '2024-12-06 08:39:06', '123'),
(2, 23, 'Add Task', '2024-12-08 06:19:06', 'hello'),
(3, 23, 'Completed Task', '2024-12-08 06:31:11', ''),
(4, 23, 'Completed Task', '2024-12-08 11:06:37', ''),
(5, 23, 'Delete Task', '2024-12-08 11:06:44', ''),
(6, 23, 'Edited Task', '2024-12-08 11:36:55', ''),
(7, 23, 'Edited Task', '2024-12-08 11:37:02', ''),
(8, 23, 'Edited Task', '2024-12-08 11:55:33', '');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `name`, `user_id`) VALUES
(1, 'hello', 0),
(2, 'hello', 0),
(3, 'rey', 0),
(4, 'rey', 0),
(5, 'z', 0),
(6, 'z', 0),
(7, '123123', 0),
(8, '123123', 0),
(9, '123123', 0),
(10, '123123', 0),
(11, '123123', 0),
(12, 'hello', 0),
(13, 'a', 0),
(14, '123', 11),
(15, '22', 11),
(16, '33', 11),
(17, '44', 11),
(18, '66', 11),
(19, '35', 11),
(20, '123', 11),
(21, 'llq', 11),
(22, '123', 8),
(23, 'bombastic', 14),
(24, 'hello', 23);

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `image_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`image_id`, `user_id`, `image_path`, `role`, `created_at`) VALUES
(1, 12, '/yara/TaskSystem/uploads/user_67387859de2be.png', 'profile', '2024-11-16 10:47:53'),
(2, 8, '', 'profile', '2024-11-16 11:39:08'),
(3, 13, '/yara/TaskSystem/uploads/user_673894c0be2bd.png', 'profile', '2024-11-16 12:49:04'),
(4, 14, '/yara/TaskSystem/assets/uploads/user_6739d9205c3d2.png', 'profile', '2024-11-16 12:57:24');

-- --------------------------------------------------------

--
-- Table structure for table `leaderboard`
--

CREATE TABLE `leaderboard` (
  `leaderboard_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `score` int(255) NOT NULL,
  `rank` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notificaiton`
--

CREATE TABLE `notificaiton` (
  `notificaiton` int(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `type` int(11) NOT NULL,
  `is_read` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `priority`
--

CREATE TABLE `priority` (
  `priority_id` int(255) NOT NULL,
  `level` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `report_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `report_title` varchar(255) NOT NULL,
  `updated-_at` date NOT NULL,
  `description` text NOT NULL,
  `generated_at` date NOT NULL,
  `status` enum('pending','solved') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`report_id`, `user_id`, `report_title`, `updated-_at`, `description`, `generated_at`, `status`) VALUES
(1, 14, '123', '0000-00-00', '123', '0000-00-00', 'solved'),
(2, 14, '123', '0000-00-00', '123', '0000-00-00', 'pending'),
(3, 23, '123', '0000-00-00', '123', '0000-00-00', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `task_id` int(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `priority_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `due_date` datetime NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL,
  `completion_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `estimated_hour` int(50) NOT NULL,
  `is_completed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`task_id`, `user_id`, `category_id`, `priority_id`, `title`, `description`, `due_date`, `created_at`, `updated_at`, `completion_date`, `status`, `estimated_hour`, `is_completed`) VALUES
(9, 8, 1, 0, '123', '123', '2024-10-14 19:10:09', '2024-10-15 01:10:33', '2024-10-14 19:10:09', '2024-10-14 19:10:09', '', 0, 1),
(10, 8, 1, 0, 'asdf', 'asdf', '2024-10-14 19:10:49', '2024-10-15 01:11:05', '2024-10-14 19:10:49', '2024-10-08 19:10:49', '', 0, 0),
(11, 8, 1, 1, 'asdf', 'asdf', '2024-10-14 19:10:49', '2024-10-15 01:11:59', '2024-10-14 19:10:49', '2024-10-14 19:10:49', '0', 0, 0),
(15, 8, 2, 0, 'asdfasdf', 'asdfads', '2024-11-09 01:24:00', '2024-10-15 01:18:09', '0000-00-00 00:00:00', '2025-10-31 21:49:39', '', 0, 1),
(16, 8, 0, 0, '75', '75', '2024-10-16 16:01:00', '2024-10-16 16:58:25', '0000-00-00 00:00:00', '2025-10-17 21:50:46', '', 0, 0),
(17, 8, 0, 0, 'zxc', 'zxc', '2024-10-16 17:01:00', '2024-10-16 17:01:25', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0),
(18, 8, 0, 0, 'zxc', 'zxc', '2024-10-16 17:01:00', '2024-10-16 17:06:20', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0),
(19, 8, 0, 0, 'zxc', 'zxc', '2024-10-16 17:01:00', '2024-10-16 17:06:22', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0),
(20, 8, 0, 0, 'zxc', 'zxc', '2024-10-16 17:01:00', '2024-10-16 17:06:22', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0),
(21, 8, 0, 0, 'zxc', 'zxc', '2024-10-16 17:01:00', '2024-10-16 17:06:23', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0),
(22, 8, 0, 0, 'zxc', 'zxc', '2024-10-16 17:01:00', '2024-10-16 17:06:24', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0),
(23, 8, 0, 0, 'asdfasdfasdfasdfasdf', 'asdf', '2024-10-16 17:12:00', '2024-10-16 17:07:15', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0),
(24, 8, 0, 0, '1234', '124', '2024-10-16 17:10:00', '2024-10-16 17:09:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0),
(25, 8, 0, 0, '1234', '124', '2024-10-16 17:10:00', '2024-10-16 17:10:12', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0),
(26, 8, 0, 0, '1234', '124', '2024-10-16 17:10:00', '2024-10-16 17:10:13', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0),
(27, 8, 0, 0, '1234', '124', '2024-10-16 17:10:00', '2024-10-16 17:10:14', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0),
(28, 8, 0, 0, '1234', '124', '2024-10-16 17:10:00', '2024-10-16 17:10:15', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0),
(29, 8, 0, 0, '1234', '124', '2024-10-16 17:10:00', '2024-10-16 17:10:15', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0),
(30, 8, 0, 0, '1234', '124', '2024-10-16 17:10:00', '2024-10-16 17:10:16', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0),
(31, 8, 0, 0, '1234', '124', '2024-10-16 17:10:00', '2024-10-16 17:10:16', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0),
(32, 8, 0, 0, '1234', '124', '2024-10-16 17:10:00', '2024-10-16 17:11:44', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0),
(33, 8, 0, 0, '1234', '124', '2024-10-16 17:10:00', '2024-10-16 17:12:07', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0),
(34, 8, 0, 0, '1234', '124', '2024-10-16 17:10:00', '2024-10-16 17:12:09', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0),
(35, 8, 0, 0, '1234', '124', '2024-10-16 17:10:00', '2024-10-16 17:12:09', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0),
(36, 8, 0, 0, '1234', '124', '2024-10-16 17:10:00', '2024-10-16 17:12:10', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0),
(37, 8, 0, 0, 'hello123', 'tyu', '0022-02-02 14:22:00', '2024-10-16 17:13:05', '0000-00-00 00:00:00', '2024-10-10 21:47:36', '', 0, 0),
(38, 8, 0, 0, 'neg', 'asd', '2024-10-16 19:04:00', '2024-10-16 19:04:05', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0),
(39, 8, 0, 0, 'jjk', '123', '2024-10-16 19:04:00', '2024-10-16 19:04:52', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0),
(40, 8, 0, 0, 'asdfasdfasdfasdf', 'asdfasdf', '2024-10-24 19:08:00', '2024-10-16 19:08:35', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0),
(41, 8, 0, 0, '123', '123123123', '2024-11-02 19:09:00', '2024-10-16 19:09:23', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0),
(42, 8, 0, 0, '123123123', '1231313123123', '2024-10-17 19:11:00', '2024-10-16 19:11:48', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0),
(43, 8, 0, 0, 'crazy123', '123123', '2024-10-17 19:30:00', '2024-10-16 19:30:25', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0),
(44, 8, 0, 0, 'gegege', 'gegege', '0000-00-00 00:00:00', '2024-10-16 19:38:06', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0),
(45, 8, 0, 0, '1123123', '123', '2024-10-17 19:42:00', '2024-10-16 19:42:11', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0),
(46, 8, 0, 0, 'hello', 'yer', '2024-10-18 20:03:00', '2024-10-16 20:03:58', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0),
(47, 8, 4, 0, 'qwe', 'asdfa', '2024-10-16 20:13:00', '2024-10-16 20:13:46', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0),
(48, 8, 2, 0, 'wert', 'werwer', '2024-10-16 20:19:00', '2024-10-16 20:14:52', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0),
(49, 14, 2, 1, '123', '2', '2024-11-30 12:13:08', '2024-11-30 19:13:53', '2024-11-30 12:13:08', '2024-11-30 12:13:08', '2', 3, 3),
(50, 14, 2, 1, '123', '2', '2024-11-30 12:13:08', '2024-11-30 19:14:00', '2024-11-30 12:13:08', '2024-11-30 12:13:08', '2', 3, 3),
(51, 23, 24, 0, '123', '554789', '2024-12-14 13:19:00', '2024-12-06 16:39:06', '2024-12-08 19:55:32', '2024-12-08 19:06:37', '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_user` tinyint(1) NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `loggedin_at` date DEFAULT NULL,
  `address` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `contact` int(20) NOT NULL,
  `age` int(10) NOT NULL,
  `is_banned` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `email`, `password`, `is_user`, `is_admin`, `created_at`, `loggedin_at`, `address`, `gender`, `contact`, `age`, `is_banned`) VALUES
(8, '333', '333@gmail.com', '$2y$10$xNjA3vPEebW623LheC7iD.gVdzcb2LwkLf4wQJrzfen', 1, 0, '2024-12-02 11:21:49', NULL, '5', '', 0, 0, 1),
(9, '333', '333@gmail.com', '$2y$10$AtAFrvvINsTRNQIhFBTv5eod5Pv7/0De4jR5rdd1gfb', 1, 0, '2024-12-02 11:48:15', NULL, '5', '', 0, 0, 1),
(10, '333', '333@gmail.com', '$2y$10$Q8S69ZmcUfYljVJtcJiJ7.WcI516DWuaw/Gx7yd8AY0', 1, 0, '2024-12-02 11:48:31', NULL, '5', '', 0, 0, 1),
(11, '333', '333@gmail.com', '$2y$10$AZiCy50WAcqwEZQ61fSB3u934ZFJjqDTSWj2KBEdDui', 1, 0, '2024-12-02 11:48:38', NULL, '5', '', 0, 0, 1),
(12, '333', '333@gmail.com', '$2y$10$YmQZ2GHfYvoqKooZ5fs4nuZkmRHEqwPcEMeMCjv20fz', 1, 0, '2024-12-02 11:48:41', NULL, '5', '', 0, 0, 1),
(13, '333', '333@gmail.com', '$2y$10$aQtW9EbVBSVIZHNDE7OpkOUs6C89gXJEjMr9GI9lJrr', 1, 0, '2024-12-02 11:49:08', NULL, '5', '', 0, 0, 1),
(14, '444', 'reyflores12380@gmail.com', '$2y$10$NQGt6zZv9W4w56r.7xaWxeBKL/9v6Xyw.khkAR1z8sA', 1, 0, '2024-12-02 13:31:50', NULL, '6', '', 0, 0, 1),
(15, '555', '555@gmail.com', '$2y$10$DxaalgvClzi94u3/Btpt6ep6LIoBgqQeCxEetHmBJh5', 1, 0, '2024-11-17 11:26:28', NULL, '', '', 0, 0, 0),
(16, '777', '777@gmail.com', '$2y$10$KOSFZFqMQ5A9KFfuLKo.V.Wv4fDXn0ggOjIun06ebb4', 1, 0, '2024-12-04 05:00:34', NULL, '', '', 0, 0, 0),
(17, 'glock', 'reyflores12380@gmail.com', '$2y$10$.2O2bwgBGPyRP5WbeQnyBOTfAn5dZ42qC/.mQkfAmEA', 1, 0, '2024-12-04 05:22:09', NULL, '', '', 0, 0, 0),
(18, '888', 'reyflores12380@gmail.com', '$2y$10$wZ5gdRZBE.62Kvvy67u0Z.w2kc4zqxIlHP.6KzqBx.H', 1, 0, '2024-12-04 06:58:38', '2024-12-04', '', '', 0, 0, 0),
(19, '999', 'reyflores12380@gmail.com', '$2y$10$k6EKYtSP1JmICqvQrbGTE.NnFEtYpy1sYgPl3pL30FH', 1, 0, '2024-12-04 07:14:18', NULL, '', '', 0, 0, 0),
(20, '1000', 'reyflores12380@gmail.com', '$2y$10$3E.hIYLxFd5o0tbb/2d6LerLjYpj2dZ5VvFJYIyCOpT', 1, 0, '2024-12-04 07:22:16', NULL, '', '', 0, 0, 0),
(21, '1111', 'reyflores12380@gmail.com', '$2y$10$YwzQ4BdWim8pGuiIqEJdu.aSz6B65.SmmY4HTumfPFj', 1, 0, '2024-12-04 07:29:02', NULL, '', '', 0, 0, 0),
(22, '2222', 'reyflores12380@gmail.com', '$2y$10$5iRdGFGBUSuvHM7H9wlXIOX9i1zKlcTCwU04zOvl9Mt2KkRwj.3E2', 1, 0, '2024-12-04 07:30:45', '2024-12-04', '', '', 0, 0, 0),
(23, '3333', 'reyflores12380@gmail.com', '$2y$10$yb8v6Zlsc5nsEctf0zf1EeqwZKYfn0/d3.A8lFEMfkkOfrzhlHimW', 1, 0, '2024-12-11 10:52:24', '2024-12-11', '', '', 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `action`
--
ALTER TABLE `action`
  ADD PRIMARY KEY (`action_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `leaderboard`
--
ALTER TABLE `leaderboard`
  ADD PRIMARY KEY (`leaderboard_id`);

--
-- Indexes for table `notificaiton`
--
ALTER TABLE `notificaiton`
  ADD PRIMARY KEY (`notificaiton`);

--
-- Indexes for table `priority`
--
ALTER TABLE `priority`
  ADD PRIMARY KEY (`priority_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`task_id`),
  ADD KEY `user_id` (`user_id`,`category_id`,`priority_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `action`
--
ALTER TABLE `action`
  MODIFY `action_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `leaderboard`
--
ALTER TABLE `leaderboard`
  MODIFY `leaderboard_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notificaiton`
--
ALTER TABLE `notificaiton`
  MODIFY `notificaiton` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `priority`
--
ALTER TABLE `priority`
  MODIFY `priority_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `task_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `task_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
