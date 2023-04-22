-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2023 at 04:25 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookmate`
--

-- --------------------------------------------------------

--
-- Table structure for table `bm_book_category`
--

CREATE TABLE `bm_book_category` (
  `book_category_id` int(10) NOT NULL,
  `book_category_name` varchar(20) NOT NULL,
  `book_privilage_status` int(1) NOT NULL DEFAULT 1 COMMENT '1=common, 2=special',
  `book_category_status` int(1) NOT NULL DEFAULT 1 COMMENT '0=inactive,1=active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bm_book_category`
--

INSERT INTO `bm_book_category` (`book_category_id`, `book_category_name`, `book_privilage_status`, `book_category_status`) VALUES
(1, 'Featured Product', 2, 1),
(2, 'Thrillers', 1, 1),
(3, 'SCI-FI', 2, 1),
(4, 'Comics', 1, 1),
(5, 'History & Civics', 1, 1),
(6, 'Politics', 1, 1),
(7, 'Artificial Intellige', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `bm_book_store`
--

CREATE TABLE `bm_book_store` (
  `book_id` int(11) NOT NULL,
  `book_name` varchar(50) NOT NULL,
  `book_author` varchar(15) NOT NULL,
  `book_catogory_id` int(10) NOT NULL,
  `book_store_image` text DEFAULT NULL,
  `book_description` text NOT NULL,
  `book_publish_date` date NOT NULL,
  `book_review` text DEFAULT NULL,
  `book_status` int(1) NOT NULL DEFAULT 1 COMMENT '0=inactive,1=published,2=pending published'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bm_book_store`
--

INSERT INTO `bm_book_store` (`book_id`, `book_name`, `book_author`, `book_catogory_id`, `book_store_image`, `book_description`, `book_publish_date`, `book_review`, `book_status`) VALUES
(1, 'Harry Porter: Prisoners of Azkhaban', 'JK Rowling', 4, 'product-1-720x4801.jpg', 'Harry porter wizarding world. Join us.', '2023-04-17', NULL, 1),
(2, 'Book Thriller2', 'Lawrence Henry', 2, 'blog-1-720x4801.jpg', 'Thriller BOOK', '2023-04-18', NULL, 1),
(3, 'Book Thriller1', 'Thriller Author', 2, 'blog-2-720x4801.jpg', 'thriller books', '2023-04-18', NULL, 1),
(4, 'Book Thriller3', 'Thriller Author', 2, 'blog-3-720x4801.jpg', 'Thriller book 3', '2023-04-18', NULL, 1),
(5, 'Thriller Book4', 'Thriller Author', 2, 'product-2-720x4801.jpg', 'Thriller 4', '2023-04-18', NULL, 1),
(6, 'Book Thriller5', 'Thriller Author', 2, 'product-3-720x4801.jpg', 'thriller5 book', '2023-04-18', NULL, 1),
(7, 'Thriller Book6', 'Thriller Author', 2, 'product-6-720x4801.jpg', 'thriller 6 book', '2023-04-18', NULL, 1),
(8, 'Featured book1', 'author1', 1, 'product-4-720x4801.jpg', 'description goes here', '2023-04-18', NULL, 1),
(9, 'Featured book2', 'author2', 1, 'blog-1-720x4802.jpg', 'TEST DESC', '2023-04-18', NULL, 1),
(10, 'Featured book3', 'author3', 1, 'blog-2-720x4802.jpg', 'test', '2023-04-18', NULL, 1),
(11, 'SCIFI BOOK1', 'author1', 3, 'product-5-720x4801.jpg', 'EEEE', '2023-04-18', NULL, 1),
(12, 'SCIFI BOOK2', 'AUTHOR 5', 3, 'blog-3-720x4802.jpg', 'TEST', '2023-04-18', NULL, 1),
(13, 'Thriller Book(7)', 'Lawrence Henry', 2, 'product-2-720x4802.jpg', 'test details1', '2023-04-14', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `bm_user`
--

CREATE TABLE `bm_user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(15) NOT NULL,
  `last_name` varchar(15) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `user_role_id` int(10) NOT NULL COMMENT 'id from user role',
  `user_email` varchar(25) DEFAULT NULL,
  `user_active` int(1) NOT NULL DEFAULT 1 COMMENT '1=active; 0= deactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bm_user`
--

INSERT INTO `bm_user` (`user_id`, `first_name`, `last_name`, `user_name`, `password`, `user_role_id`, `user_email`, `user_active`) VALUES
(1, 'Master', 'Admin', 'admin', 'admin123', 1, 'info@bookmate.com', 1),
(2, 'Tom', 'dcruz', 'tomdcruz', 'tom123', 3, 'tomdcruz@gmail.com', 1),
(3, 'Jim', 'Cabot', 'jimcabot', 'jim123', 2, 'jimcabot@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bm_user_registration`
--

CREATE TABLE `bm_user_registration` (
  `user_reg_id` int(10) NOT NULL,
  `user_reg_userid` int(10) NOT NULL,
  `user_contact_number` varchar(15) DEFAULT NULL,
  `user_address` text DEFAULT NULL,
  `user_created_date` date NOT NULL DEFAULT current_timestamp(),
  `user_reg_status` int(1) NOT NULL DEFAULT 1 COMMENT '0=inactive,1=approve,2=pending approve'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bm_user_registration`
--

INSERT INTO `bm_user_registration` (`user_reg_id`, `user_reg_userid`, `user_contact_number`, `user_address`, `user_created_date`, `user_reg_status`) VALUES
(1, 2, '121238834', 'rreree', '2023-04-15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bm_user_role`
--

CREATE TABLE `bm_user_role` (
  `user_role_id` int(11) NOT NULL,
  `user_role_name` varchar(20) NOT NULL,
  `user_role_active` int(1) NOT NULL DEFAULT 1 COMMENT '1=active,0=deactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bm_user_role`
--

INSERT INTO `bm_user_role` (`user_role_id`, `user_role_name`, `user_role_active`) VALUES
(1, 'Admin', 1),
(2, 'Staff', 1),
(3, 'Registered User', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bm_book_category`
--
ALTER TABLE `bm_book_category`
  ADD PRIMARY KEY (`book_category_id`);

--
-- Indexes for table `bm_book_store`
--
ALTER TABLE `bm_book_store`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `bm_user`
--
ALTER TABLE `bm_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `bm_user_registration`
--
ALTER TABLE `bm_user_registration`
  ADD PRIMARY KEY (`user_reg_id`);

--
-- Indexes for table `bm_user_role`
--
ALTER TABLE `bm_user_role`
  ADD PRIMARY KEY (`user_role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bm_book_category`
--
ALTER TABLE `bm_book_category`
  MODIFY `book_category_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `bm_book_store`
--
ALTER TABLE `bm_book_store`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `bm_user`
--
ALTER TABLE `bm_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bm_user_registration`
--
ALTER TABLE `bm_user_registration`
  MODIFY `user_reg_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bm_user_role`
--
ALTER TABLE `bm_user_role`
  MODIFY `user_role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
