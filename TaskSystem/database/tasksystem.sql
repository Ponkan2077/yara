-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2025 at 01:55 PM
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
-- Database: `chatapp`
--
CREATE DATABASE IF NOT EXISTS `chatapp` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `chatapp`;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('knHoE9D1eTpBxyk7REX4rumH60N2Gdbs2YYzpyD3', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRnExcjFiM3J2bUl6dURCTDl2c3duWUNQOEFqT0Y1MHJEMk5EaktyYiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1733403453),
('xZtwFTKpy9qILFGOb93z7CLO5IX8MwfgEXQPn563', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaEhDVkxQU25ta3FmV3NiU1czSmxjSVBKUnc3NEdqVlFmbnNuVWFjaSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1734613497);

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Test User', 'test@example.com', '2024-12-05 04:57:15', '$2y$12$TexH7v5F0gii18amnfRw5uWmYflE/GLLeiZIrqsaGBk/ni9vNLDhS', 'DqedychLL2', '2024-12-05 04:57:16', '2024-12-05 04:57:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Database: `flores_library`
--
CREATE DATABASE IF NOT EXISTS `flores_library` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `flores_library`;

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `author_id` int(11) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`author_id`, `first_name`, `last_name`) VALUES
(1, 'F. Scott', 'Fitzgerald'),
(2, 'George', 'Orwell'),
(3, 'Harper', 'Lee'),
(4, 'Stephen', 'Hawking'),
(5, 'J.K.', 'Rowling');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `genre` varchar(50) DEFAULT NULL,
  `publication_year` year(4) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `title`, `genre`, `publication_year`, `price`) VALUES
(1, 'The Great Gatsby', 'Fiction', '1925', 10.99),
(2, '1984', 'Dystopian', '1949', 9.99),
(3, 'To Kill a Mockingbird', 'Drama', '1960', 12.49),
(4, 'A Brief History of Time', 'Non-fiction', '1988', 15.99),
(5, 'Harry Potter and Sorcerer\'s Stone', 'Fantasy', '1997', 8.99);

-- --------------------------------------------------------

--
-- Table structure for table `book_authors`
--

CREATE TABLE `book_authors` (
  `book_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book_authors`
--

INSERT INTO `book_authors` (`book_id`, `author_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `book_publishers`
--

CREATE TABLE `book_publishers` (
  `book_id` int(11) NOT NULL,
  `publisher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book_publishers`
--

INSERT INTO `book_publishers` (`book_id`, `publisher_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `borrow_items`
--

CREATE TABLE `borrow_items` (
  `borrow_item_id` int(11) NOT NULL,
  `borrow_id` int(11) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `borrow_items`
--

INSERT INTO `borrow_items` (`borrow_item_id`, `borrow_id`, `book_id`, `quantity`) VALUES
(1, 1, 1, 1),
(2, 2, 2, 1),
(3, 3, 3, 2),
(4, 4, 4, 1),
(5, 5, 5, 3),
(6, 1, 1, 1),
(7, 2, 2, 1),
(8, 3, 3, 2),
(9, 4, 4, 1),
(10, 5, 5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `borrow_records`
--

CREATE TABLE `borrow_records` (
  `borrow_id` int(11) NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `borrow_date` date DEFAULT NULL,
  `return_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `borrow_records`
--

INSERT INTO `borrow_records` (`borrow_id`, `member_id`, `borrow_date`, `return_date`) VALUES
(1, 1, '2024-10-01', '2024-10-15'),
(2, 2, '2024-10-05', '2024-10-20'),
(3, 3, '2024-10-10', '2024-10-25'),
(4, 4, '2024-10-12', '2024-10-22'),
(5, 5, '2024-10-15', '2024-10-30');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `member_id` int(11) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `first_name`, `last_name`, `email`) VALUES
(1, 'Alice', 'Johnson', 'alice.johnson@example.com'),
(2, 'Bob', 'Smith', 'bob.smith@example.com'),
(3, 'Charlie', 'Brown', 'charlie.brown@example.com'),
(4, 'David', 'Williams', 'david.williams@example.com'),
(5, 'Eve', 'Davis', 'eve.davis@example.com');

-- --------------------------------------------------------

--
-- Table structure for table `publishers`
--

CREATE TABLE `publishers` (
  `publisher_id` int(11) NOT NULL,
  `publisher_name` varchar(255) DEFAULT NULL,
  `contact_email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `publishers`
--

INSERT INTO `publishers` (`publisher_id`, `publisher_name`, `contact_email`) VALUES
(1, 'Scribner', 'contact@scribner.com'),
(2, 'Secker & Warburg', 'contact@seckerwarburg.com'),
(3, 'J.B. Lippincott & Co.', 'contact@lippincott.com'),
(4, 'Bantam Books', 'contact@bantambooks.com'),
(5, 'Bloomsbury Publishing', 'contact@bloomsbury.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `book_authors`
--
ALTER TABLE `book_authors`
  ADD PRIMARY KEY (`book_id`,`author_id`),
  ADD KEY `author_id` (`author_id`);

--
-- Indexes for table `book_publishers`
--
ALTER TABLE `book_publishers`
  ADD PRIMARY KEY (`book_id`,`publisher_id`),
  ADD KEY `publisher_id` (`publisher_id`);

--
-- Indexes for table `borrow_items`
--
ALTER TABLE `borrow_items`
  ADD PRIMARY KEY (`borrow_item_id`),
  ADD KEY `borrow_id` (`borrow_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `borrow_records`
--
ALTER TABLE `borrow_records`
  ADD PRIMARY KEY (`borrow_id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `publishers`
--
ALTER TABLE `publishers`
  ADD PRIMARY KEY (`publisher_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `borrow_items`
--
ALTER TABLE `borrow_items`
  MODIFY `borrow_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `borrow_records`
--
ALTER TABLE `borrow_records`
  MODIFY `borrow_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `publishers`
--
ALTER TABLE `publishers`
  MODIFY `publisher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book_authors`
--
ALTER TABLE `book_authors`
  ADD CONSTRAINT `book_authors_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`),
  ADD CONSTRAINT `book_authors_ibfk_2` FOREIGN KEY (`author_id`) REFERENCES `authors` (`author_id`);

--
-- Constraints for table `book_publishers`
--
ALTER TABLE `book_publishers`
  ADD CONSTRAINT `book_publishers_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`),
  ADD CONSTRAINT `book_publishers_ibfk_2` FOREIGN KEY (`publisher_id`) REFERENCES `publishers` (`publisher_id`);

--
-- Constraints for table `borrow_items`
--
ALTER TABLE `borrow_items`
  ADD CONSTRAINT `borrow_items_ibfk_1` FOREIGN KEY (`borrow_id`) REFERENCES `borrow_records` (`borrow_id`),
  ADD CONSTRAINT `borrow_items_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`);

--
-- Constraints for table `borrow_records`
--
ALTER TABLE `borrow_records`
  ADD CONSTRAINT `borrow_records_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `members` (`member_id`);
--
-- Database: `mchat`
--
CREATE DATABASE IF NOT EXISTS `mchat` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `mchat`;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT;
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) NOT NULL DEFAULT '',
  `user` varchar(255) NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `query` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) NOT NULL,
  `col_name` varchar(64) NOT NULL,
  `col_type` varchar(64) NOT NULL,
  `col_length` text DEFAULT NULL,
  `col_collation` varchar(64) NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) DEFAULT '',
  `col_default` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `column_name` varchar(64) NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `transformation` varchar(255) NOT NULL DEFAULT '',
  `transformation_options` varchar(255) NOT NULL DEFAULT '',
  `input_transformation` varchar(255) NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) NOT NULL,
  `settings_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL,
  `export_type` varchar(10) NOT NULL,
  `template_name` varchar(64) NOT NULL,
  `template_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db` varchar(64) NOT NULL DEFAULT '',
  `table` varchar(64) NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) NOT NULL,
  `item_name` varchar(64) NOT NULL,
  `item_type` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"tasksystem\",\"table\":\"task\"},{\"db\":\"tasksystem\",\"table\":\"category\"},{\"db\":\"tasksystem\",\"table\":\"user\"},{\"db\":\"tasksystem\",\"table\":\"image\"},{\"db\":\"tasksystem\",\"table\":\"leaderboard\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) NOT NULL DEFAULT '',
  `master_table` varchar(64) NOT NULL DEFAULT '',
  `master_field` varchar(64) NOT NULL DEFAULT '',
  `foreign_db` varchar(64) NOT NULL DEFAULT '',
  `foreign_table` varchar(64) NOT NULL DEFAULT '',
  `foreign_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `search_name` varchar(64) NOT NULL DEFAULT '',
  `search_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `display_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `prefs` text NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

--
-- Dumping data for table `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'tasksystem', 'task', '{\"sorted_col\":\"`task`.`action` ASC\"}', '2024-11-21 10:50:34');

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text NOT NULL,
  `schema_sql` text DEFAULT NULL,
  `data_sql` longtext DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2024-11-21 05:43:51', '{\"Console\\/Mode\":\"collapse\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) NOT NULL,
  `tab` varchar(64) NOT NULL,
  `allowed` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) NOT NULL,
  `usergroup` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `tasksystem`
--
CREATE DATABASE IF NOT EXISTS `tasksystem` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `tasksystem`;

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
(23, '3333', 'reyflores12380@gmail.com', '$2y$10$yb8v6Zlsc5nsEctf0zf1EeqwZKYfn0/d3.A8lFEMfkkOfrzhlHimW', 1, 0, '2024-12-11 10:52:24', '2024-12-11', '', '', 0, 0, 0),
(24, 'kraz', 'kraz123@gmail.com', '$2y$10$ODqP9xrME/PPGospg/J3JOQ.5SWwnDpVG5r0aicQL4YsCaqScxn5a', 1, 0, '2025-01-07 12:50:55', '2025-01-07', '', '', 0, 0, 0);

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
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `task_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
