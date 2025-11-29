-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2021 at 08:02 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fighter`
--

-- --------------------------------------------------------

--
-- Table structure for table `auto_counters`
--

CREATE TABLE `auto_counters` (
  `id` int(10) NOT NULL,
  `title` varchar(200) NOT NULL,
  `value` int(100) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `added_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `auto_counters`
--

INSERT INTO `auto_counters` (`id`, `title`, `value`, `logo`, `status`, `added_by`, `created_at`) VALUES
(1, 'Running Project', 80, 'ti-ruler-pencil', 2, 2, '2021-07-14 19:26:17'),
(2, 'Happy Client', 60, 'ti-user', 1, 2, '2021-07-14 19:32:04'),
(3, 'Cup Of Cofee', 70, 'ti-package', 2, 2, '2021-07-14 19:32:22'),
(4, 'Project Done', 100, 'ti-settings', 1, 2, '2021-07-14 19:32:37');

-- --------------------------------------------------------

--
-- Table structure for table `auto_writes`
--

CREATE TABLE `auto_writes` (
  `id` int(10) NOT NULL,
  `auto_write_title` varchar(200) NOT NULL,
  `added_by` int(10) NOT NULL,
  `created_at` datetime NOT NULL,
  `status` int(10) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `auto_writes`
--

INSERT INTO `auto_writes` (`id`, `auto_write_title`, `added_by`, `created_at`, `status`) VALUES
(3, 'programmer', 1, '2021-07-13 11:39:53', 2),
(4, 'fg', 1, '2021-08-01 22:27:35', 1),
(5, 'Professional Web Developer', 1, '2021-08-01 22:27:45', 1),
(6, 'Lives In US', 1, '2021-08-01 22:27:55', 1),
(7, 'dfg', 1, '2021-08-01 22:28:56', 1);

-- --------------------------------------------------------

--
-- Table structure for table `portfolios`
--

CREATE TABLE `portfolios` (
  `id` int(10) NOT NULL,
  `img` varchar(200) NOT NULL,
  `category_id` int(10) NOT NULL,
  `added_by` int(10) NOT NULL,
  `created_at` datetime NOT NULL,
  `status` int(10) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_categories`
--

CREATE TABLE `portfolio_categories` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `added_by` int(10) NOT NULL,
  `created_at` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `portfolio_categories`
--

INSERT INTO `portfolio_categories` (`id`, `name`, `added_by`, `created_at`, `status`) VALUES
(2, 'web design', 1, '2021-07-26 10:29:28', 1),
(3, 'Creative', 1, '2021-07-26 10:51:08', 1),
(4, 'app design', 1, '2021-07-26 16:04:42', 1);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `service_title` varchar(255) NOT NULL,
  `service_description` varchar(255) NOT NULL,
  `service_icon` varchar(200) NOT NULL,
  `status` int(10) NOT NULL DEFAULT 1,
  `added_by` int(10) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_title`, `service_description`, `service_icon`, `status`, `added_by`, `created_at`) VALUES
(1, 'WEB DESIGN', 'Lorem ipsum dolor sit amet, conse adipisicing elit, sed do eiusmod te incididunt ut labore et', 'ti-desktop', 1, 1, '2021-07-08 11:01:39'),
(2, 'Grafic DESIGN', 'bangladesh is not bad . you can come here for see.', 'ti-package', 1, 1, '2021-07-08 11:12:12');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) NOT NULL,
  `item` varchar(100) NOT NULL,
  `val` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `item`, `val`) VALUES
(1, 'name', 'figter'),
(2, 'banner', 'banner.jpg'),
(3, 'about_img', 'about.jpg'),
(4, 'about_des', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit se do eiusmod tempor incididunt ut labore et dolore mag nasaaliqua.Ut enim ad minim veniam, quis nostrud exe rcitation ullamco laboris\r\n\r\nin voluptate velit esse cillum dolore eu fugiat nulla pariatu Excepteur sint occaecat cupidatat non proident,'),
(5, 'footer_des', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exerc\r\nas'),
(6, 'facebook', 'www.facebook.com/sahosridoy'),
(7, 'twitter', 'www.twitter.com/sa'),
(8, 'tumblr', 'www.tumblr.com/bangladesh'),
(9, 'linkedin', 'www.linkedin.com');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `skill_title` varchar(100) NOT NULL,
  `skill_value` int(10) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `img` varchar(200) NOT NULL,
  `facebook` varchar(200) NOT NULL,
  `twitter` varchar(200) DEFAULT NULL,
  `tumblr` varchar(200) DEFAULT NULL,
  `linkedin` varchar(200) DEFAULT NULL,
  `added_by` int(10) NOT NULL,
  `created_at` datetime NOT NULL,
  `status` int(10) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `title`, `img`, `facebook`, `twitter`, `tumblr`, `linkedin`, `added_by`, `created_at`, `status`) VALUES
(9, 'gh', 'fghj', '9.jpg', 'hgj', NULL, NULL, NULL, 1, '2021-08-01 16:31:47', 1),
(10, 'gh', 'fghj', '10.jpg', 'hgj', NULL, NULL, NULL, 1, '2021-08-01 16:32:09', 1),
(11, 'gh', 'fghj', '11.jpg', 'hgj', 'gh', NULL, NULL, 1, '2021-08-01 21:55:43', 2),
(12, 'gh', 'fghj', '12.jpg', 'hgj', 'gh', NULL, NULL, 1, '2021-08-01 22:29:54', 1),
(13, 'gh', 'fghj', '13.jpg', 'hgj', NULL, NULL, NULL, 1, '2021-08-01 23:09:18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id` int(10) NOT NULL,
  `first` varchar(200) NOT NULL,
  `secound` varchar(200) NOT NULL,
  `img` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`id`, `first`, `secound`, `img`) VALUES
(1, 'sahos', 'ridoy', NULL),
(2, 'sahos', 'ridoy', NULL),
(3, 'sahos', 'ridoy', NULL),
(4, 'sahos', 'ridoy', NULL),
(5, 'sahos', 'ridoy', NULL),
(6, 'sahos', 'ridoy', NULL),
(7, 'sahos', 'ridoy', NULL),
(8, 'sahos', 'ridoy', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'Admin1', 'admin1@gmail.com', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'sahos', 'sahos@email.com', 'c4ca4238a0b923820dcc509a6f75849b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auto_counters`
--
ALTER TABLE `auto_counters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auto_writes`
--
ALTER TABLE `auto_writes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolio_categories`
--
ALTER TABLE `portfolio_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auto_counters`
--
ALTER TABLE `auto_counters`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `auto_writes`
--
ALTER TABLE `auto_writes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `portfolio_categories`
--
ALTER TABLE `portfolio_categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
