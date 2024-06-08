-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2024 at 08:00 AM
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
-- Database: `21464_abdul_salam_qambrani`
--
CREATE DATABASE IF NOT EXISTS `21464_abdul_salam_qambrani` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `21464_abdul_salam_qambrani`;

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `blog_title` varchar(200) DEFAULT NULL,
  `post_per_page` int(11) DEFAULT NULL,
  `blog_background_image` text DEFAULT NULL,
  `blog_status` enum('Active','InActive') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_id`, `user_id`, `blog_title`, `post_per_page`, `blog_background_image`, `blog_status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Blog One', 4, 'post_1.jpg', 'Active', '2024-05-25 18:48:47', '2024-05-25 18:42:06'),
(2, 1, 'Blog Two', 4, 'banner-img-2.jpg', 'Active', '2024-05-25 18:48:53', '2024-05-25 18:42:42'),
(3, 1, 'Blog Three', 5, 'post_1.jpg', 'Active', '2024-05-25 18:48:56', '2024-05-25 18:47:06'),
(4, 1, 'Blog Four W', 4, 'b1.jpg', 'InActive', '2024-05-26 21:05:16', '2024-05-26 21:04:45');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(100) DEFAULT NULL,
  `category_description` text DEFAULT NULL,
  `category_status` enum('Active','InActive') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_title`, `category_description`, `category_status`, `created_at`, `updated_at`) VALUES
(1, 'Education', 'Education is important for our genration..', 'Active', '2024-05-25 18:54:03', NULL),
(2, 'Health', 'The greatest wealth is health', 'Active', '2024-05-25 19:38:38', NULL),
(3, 'Humain Right', 'To deny people their human rights is to challenge their very humanity. \"Nelson Mandela\"', 'Active', '2024-05-25 18:54:06', NULL),
(4, 'Minority', 'The test of courage comes when we are in the minority. The test of tolerance comes when we are in the majority.\"\r\n— Ralph W. Sockman', 'Active', '2024-05-25 18:54:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `following_blog`
--

CREATE TABLE `following_blog` (
  `follow_id` int(11) NOT NULL,
  `follower_id` int(11) DEFAULT NULL,
  `blog_following_id` int(11) DEFAULT NULL,
  `status` enum('Followed','Unfollowed') DEFAULT 'Followed',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `following_blog`
--

INSERT INTO `following_blog` (`follow_id`, `follower_id`, `blog_following_id`, `status`, `created_at`, `updated_at`) VALUES
(2, 8, 1, 'Followed', '2024-05-26 17:10:05', '2024-05-26 17:10:05');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `blog_id` int(11) DEFAULT NULL,
  `post_title` varchar(200) NOT NULL,
  `post_summary` text NOT NULL,
  `post_description` longtext NOT NULL,
  `featured_image` text DEFAULT NULL,
  `post_status` enum('Active','InActive') DEFAULT NULL,
  `is_comment_allowed` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `blog_id`, `post_title`, `post_summary`, `post_description`, `featured_image`, `post_status`, `is_comment_allowed`, `created_at`, `updated_at`) VALUES
(1, 1, 'The Power of Education: ', 'The Power of Education: A Pathway to a Brighter Future', 'Education is the cornerstone of personal and societal development. It empowers individuals with knowledge, skills, and critical thinking abilities, paving the way for innovation and progress. As Nelson Mandela once said, \"Education is the most powerful weapon which you can use to change the world.\"', 'Last.jpg', 'Active', 1, '2024-05-25 19:08:31', NULL),
(2, 1, 'Personal Growth and Development', 'Education is not just about acquiring facts;', 'Education is not just about acquiring facts; it’s about developing the ability to think independently, understand complex issues, and make informed decisions. It fosters personal growth by enhancing self-awareness, building self-esteem, and promoting lifelong learning.', 'OPD.jpeg', 'Active', 1, '2024-05-25 19:08:21', NULL),
(3, 1, 'Economic Empowerment', 'Education is a powerful tool for economic empowerment. It opens doors to better job opportunities, ', 'Education is a powerful tool for economic empowerment. It opens doors to better job opportunities, higher salaries, and improved standards of living. Educated individuals are better equipped to adapt to changing job markets and technological advancements, reducing the risk of unemployment.', 'blog-img1.jpg', 'Active', 0, '2024-05-26 05:43:14', NULL),
(4, 2, 'Embracing a Healthy Lifestyle:', 'Health is the foundation of a fulfilling and productive life.', 'Health is the foundation of a fulfilling and productive life. It\'s not just the absence of disease but a state of complete physical, mental, and social well-being. As the ancient proverb goes, \"Health is wealth.\" Embracing a healthy lifestyle is crucial for enhancing the quality of life and achieving long-term happiness.', 'blog-img1.jpg', 'Active', 1, '2024-05-26 03:27:35', NULL),
(5, 2, 'The Importance of a Healthy Lifestyle', 'Physical Health', 'Maintaining physical health through regular exercise, a balanced diet, and adequate sleep is essential. Regular physical activity strengthens the heart, muscles, and bones, while a nutritious diet provides the body with necessary vitamins and minerals. Adequate sleep is crucial for recovery and overall well-being.', 'client.jpg', 'Active', 1, '2024-05-26 03:27:31', NULL),
(6, 2, 'Mental Health', 'Mental health is equally important as physical health.', 'Mental health is equally important as physical health. Managing stress, staying mentally active, and seeking help when needed can prevent mental health issues such as depression and anxiety. Practices like mindfulness, meditation, and staying connected with loved ones contribute to mental well-being.', 'b1.jpg', 'Active', 1, '2024-05-26 03:27:29', NULL),
(7, 2, 'Preventive Care', 'Preventive care, including regular check-ups and screenings,', 'Preventive care, including regular check-ups and screenings, helps detect potential health issues early. Vaccinations and timely medical interventions can prevent diseases and ensure long-term health. Adopting healthy habits, like avoiding tobacco and limiting alcohol consumption, further reduces health risks.', 'b3.jpg', 'Active', 1, '2024-05-26 03:27:26', NULL),
(8, 3, 'The Essence of Human Rights:', 'Ensuring Dignity and Equality for All', 'Human rights are the fundamental rights and freedoms that every person is entitled to simply by virtue of being human. They are universal and inalienable, safeguarding the dignity and equality of every individual. As Eleanor Roosevelt, a key figure in drafting the Universal Declaration of Human Rights, eloquently put it, \"Where, after all, do universal human rights begin? In small places, close to home.\"', 'b2.jpg', 'Active', 1, '2024-05-26 03:27:21', NULL),
(9, 3, 'The Importance of Human Rights', 'Dignity and Equality', 'At the heart of human rights is the principle that every person deserves to live with dignity and equality. These rights ensure that all individuals are treated with respect, irrespective of their race, gender, nationality, religion, or any other status.\r\n\r\n', 'b2.jpg', 'Active', 1, '2024-05-27 05:26:05', NULL),
(10, 4, 'Freedom and Autonomy', 'Human rights protect the freedoms and autonomy of individuals.', 'Human rights protect the freedoms and autonomy of individuals. This includes the freedom of speech, freedom of religion, and the right to privacy. These rights enable people to express themselves, make personal choices, and live without undue interference.', 'slider-bg.jpg', 'Active', 1, '2024-05-26 03:27:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `post_atachment`
--

CREATE TABLE `post_atachment` (
  `post_atachment_id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `post_attachment_title` varchar(200) DEFAULT NULL,
  `post_attachment_path` text DEFAULT NULL,
  `is_active` enum('Active','InActive') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_category`
--

CREATE TABLE `post_category` (
  `post_category_id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post_category`
--

INSERT INTO `post_category` (`post_category_id`, `post_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2024-05-25 18:56:56', NULL),
(2, 2, 1, '2024-05-25 18:59:10', NULL),
(4, 4, 2, '2024-05-25 19:26:56', NULL),
(5, 5, 2, '2024-05-25 19:30:26', NULL),
(6, 6, 2, '2024-05-25 19:32:06', NULL),
(7, 7, 2, '2024-05-25 19:33:12', NULL),
(8, 8, 3, '2024-05-25 19:34:34', NULL),
(9, 9, 3, '2024-05-25 19:36:08', NULL),
(10, 10, 3, '2024-05-25 19:37:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `post_comment`
--

CREATE TABLE `post_comment` (
  `post_comment_id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `is_active` enum('Active','InActive') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_type` varchar(50) NOT NULL,
  `is_active` enum('Active','InActive') DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_type`, `is_active`) VALUES
(1, 'admin', 'Active'),
(2, 'user', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `setting_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `setting_key` varchar(100) DEFAULT NULL,
  `setting_value` varchar(100) DEFAULT NULL,
  `setting_status` enum('Active','InActive') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` text NOT NULL,
  `gender` enum('Male','Female') DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `user_image` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `is_approved` enum('Pending','Approved','Rejected') DEFAULT 'Pending',
  `is_active` enum('Active','InActive') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `role_id`, `first_name`, `last_name`, `email`, `password`, `gender`, `date_of_birth`, `user_image`, `address`, `is_approved`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 'Abdul', 'Salam', 'hafizabsalam4040@gmail.com', '12345', 'Male', '1995-04-01', 'ABC.jpg', 'Badin', 'Approved', 'Active', '2024-05-21 09:58:35', NULL),
(2, 1, 'Kashif', 'Ahmed', 'kashif123@gmail.com', '12345', 'Male', '1998-01-17', 'Blog_2.jpg', 'Badin', 'Approved', 'InActive', '2024-05-25 16:42:51', '0000-00-00 00:00:00'),
(3, 2, 'Sahil', 'Raza', 'sahilali123@gmail.com', '12345', 'Male', '2014-04-18', '_98ff6e14-a00f-4f52-8085-fd4a89fa6090.jpeg', 'Badin', 'Approved', 'Active', '2024-05-25 08:56:31', NULL),
(4, 2, 'Mehtab', 'Raza', 'mehtab123@gmail.com', '12345', 'Male', '2024-05-18', 'dev_09.jpg', 'Karachi', 'Approved', 'Active', '2024-05-26 21:02:39', '0000-00-00 00:00:00'),
(5, 1, 'Mehtab', 'Ali', 'mehtab123@gmail.com', '12345', 'Male', '2024-05-18', 'dev_09.jpg', 'Karachi', 'Approved', 'Active', '2024-05-25 16:59:55', NULL),
(6, 2, 'Manzoor', 'Ali', 'manzoor@gmail.com', '12345', 'Male', '2024-05-18', 'dev_06.jpg', 'Karachi', 'Rejected', NULL, '2024-05-21 04:02:32', NULL),
(8, 2, 'Samin', 'Raza', 'samina123@gmail.com', '12345', 'Female', '2016-02-02', 'dev_02.png', 'Hyderbad', 'Approved', 'Active', '2024-05-25 05:14:35', '0000-00-00 00:00:00'),
(9, 2, 'Adil 2', 'Salam', 'hafizabsalam3030@gmail.com', '12345', 'Male', '2020-12-28', 'dev_06.jpg', 'Badin', 'Approved', 'InActive', '2024-05-25 05:18:16', NULL),
(10, 2, 'Adilraza', 'Abbas', 'hafizabsalam4040@gmail.com', '12345', '', '2020-12-28', 'dev_06.jpg', 'Badin', 'Approved', 'InActive', '2024-05-27 04:54:02', '2024-05-27 04:54:02'),
(11, 1, 'Lariab', 'Khan', 'laraibkhan123@gmail.com', 'Badin1234', '', '2015-03-18', 'dev_05.jpg', 'Karachi', 'Approved', 'Active', '2024-05-26 20:06:30', '2024-05-26 20:02:41'),
(13, 2, 'Jamshed', 'Ali', 'jamshedali@gmail.com', 'abc12345', 'Male', '2009-04-27', 'user.png', 'Badin', 'Pending', NULL, '2024-05-26 20:44:01', NULL),
(14, 2, 'Dua', 'Ajmal', 'duaajmal@gmail.com', 'abc12345', 'Female', '2018-04-27', 'user.png', 'Karachi', 'Approved', 'Active', '2024-05-26 20:59:29', NULL),
(15, 2, 'Malik', 'Rihan', 'insharihan123@gmail.com', 'abc1234', 'Male', '2024-05-27', 'user.png', 'Badin', 'Approved', 'Active', '2024-05-26 21:03:57', '2024-05-26 21:03:57');

-- --------------------------------------------------------

--
-- Table structure for table `user_feedback`
--

CREATE TABLE `user_feedback` (
  `feedback_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `feedback` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_feedback`
--

INSERT INTO `user_feedback` (`feedback_id`, `user_id`, `user_name`, `user_email`, `feedback`, `created_at`) VALUES
(1, NULL, 'Rihaan T', 'Rihan@gmail.com', 'This is my fifth testing text......', '2024-05-19 17:08:26'),
(2, NULL, 'Abdul Salam', 'absalam123@gmail.com', 'This is my testin message', '2024-05-27 05:43:56'),
(3, 1, 'Jamal', 'jamalKhan@gmail.com', 'this is my testing message..............', '2024-05-27 05:47:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `following_blog`
--
ALTER TABLE `following_blog`
  ADD PRIMARY KEY (`follow_id`),
  ADD KEY `blog_following_id` (`blog_following_id`),
  ADD KEY `follower_id` (`follower_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `blog_id` (`blog_id`);

--
-- Indexes for table `post_atachment`
--
ALTER TABLE `post_atachment`
  ADD PRIMARY KEY (`post_atachment_id`),
  ADD KEY `fk1` (`post_id`);

--
-- Indexes for table `post_category`
--
ALTER TABLE `post_category`
  ADD PRIMARY KEY (`post_category_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `post_comment`
--
ALTER TABLE `post_comment`
  ADD PRIMARY KEY (`post_comment_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`setting_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `user_feedback`
--
ALTER TABLE `user_feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `following_blog`
--
ALTER TABLE `following_blog`
  MODIFY `follow_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `post_atachment`
--
ALTER TABLE `post_atachment`
  MODIFY `post_atachment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_category`
--
ALTER TABLE `post_category`
  MODIFY `post_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `post_comment`
--
ALTER TABLE `post_comment`
  MODIFY `post_comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_feedback`
--
ALTER TABLE `user_feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `following_blog`
--
ALTER TABLE `following_blog`
  ADD CONSTRAINT `following_blog_ibfk_1` FOREIGN KEY (`blog_following_id`) REFERENCES `blog` (`blog_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `following_blog_ibfk_2` FOREIGN KEY (`follower_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`blog_id`) REFERENCES `blog` (`blog_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post_atachment`
--
ALTER TABLE `post_atachment`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post_category`
--
ALTER TABLE `post_category`
  ADD CONSTRAINT `post_category_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_category_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post_comment`
--
ALTER TABLE `post_comment`
  ADD CONSTRAINT `post_comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_comment_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `setting`
--
ALTER TABLE `setting`
  ADD CONSTRAINT `setting_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_feedback`
--
ALTER TABLE `user_feedback`
  ADD CONSTRAINT `user_feedback_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
