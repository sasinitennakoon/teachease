-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2024 at 02:18 PM
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
-- Database: `teachease`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `announcement_id` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `type` varchar(50) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`announcement_id`, `content`, `type`, `date`) VALUES
(1, '<p>There will be a system maintenance today</p>\r\n', 'For All', '2024-04-20 22:09:10'),
(2, '<p>Please make sure to submit the final grades by tomorrow</p>\r\n', 'For Teachers', '2024-04-20 20:21:05'),
(3, '<p>Please make course payments by tomorrow</p>\r\n', 'For Parents', '2024-04-20 20:21:36'),
(4, '<p>Please submit final assignment tomorrow</p>\r\n', 'For Students', '2024-04-20 20:22:13');

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `answer_id` int(11) NOT NULL,
  `quiz_question_id` int(10) NOT NULL,
  `answer_text` varchar(500) NOT NULL,
  `choices` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`answer_id`, `quiz_question_id`, `answer_text`, `choices`) VALUES
(1, 4, '3', 'A'),
(2, 4, '1', 'B'),
(3, 4, '2', 'C'),
(4, 4, '4', 'D');

-- --------------------------------------------------------

--
-- Table structure for table `average`
--

CREATE TABLE `average` (
  `average_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `average_marks` int(11) NOT NULL,
  `term_id` int(11) NOT NULL,
  `rank` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `average`
--

INSERT INTO `average` (`average_id`, `student_id`, `average_marks`, `term_id`, `rank`) VALUES
(8, 11, 65, 1, 2),
(11, 7, 50, 1, 3),
(13, 2, 78, 1, 1),
(14, 2, 52, 2, 1),
(15, 2, 49, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `grade_id` int(11) NOT NULL,
  `grade_name` varchar(30) NOT NULL,
  `noofparticipant` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`grade_id`, `grade_name`, `noofparticipant`) VALUES
(101, '10', 20),
(102, '11', 20);

-- --------------------------------------------------------

--
-- Table structure for table `class_announcements`
--

CREATE TABLE `class_announcements` (
  `class_announcement_id` int(11) NOT NULL,
  `teacher_class_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `type` varchar(40) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `class_quiz`
--

CREATE TABLE `class_quiz` (
  `class_quiz_id` int(11) NOT NULL,
  `teacher_class_id` int(11) NOT NULL,
  `quiz_start_time` varchar(8) NOT NULL,
  `quiz_end_time` varchar(8) NOT NULL,
  `quiz_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class_quiz`
--

INSERT INTO `class_quiz` (`class_quiz_id`, `teacher_class_id`, `quiz_start_time`, `quiz_end_time`, `quiz_id`) VALUES
(3, 5, '08:30:00', '09:30:00', 9);

-- --------------------------------------------------------

--
-- Table structure for table `class_subject_overview`
--

CREATE TABLE `class_subject_overview` (
  `class_subject_overview_id` int(11) NOT NULL,
  `teacher_class_id` int(11) NOT NULL,
  `content` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exam_results`
--

CREATE TABLE `exam_results` (
  `exam_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exam_results`
--

INSERT INTO `exam_results` (`exam_id`, `teacher_id`, `class_id`, `subject_id`) VALUES
(4, 5, 10, 11),
(5, 5, 11, 11),
(6, 5, 10, 11),
(7, 5, 12, 11),
(8, 5, 12, 11),
(9, 3, 15, 9),
(10, 8, 20, 16),
(11, 9, 16, 12),
(12, 7, 19, 15),
(13, 6, 18, 14);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `class_rating` int(11) NOT NULL,
  `teacher_rating` varchar(255) NOT NULL,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `student_id`, `subject`, `class_rating`, `teacher_rating`, `comment`, `created_at`) VALUES
(6, 2, 'Buddhism', 3, 'satisfied', 'test', '2024-04-24 10:37:58'),
(7, 2, 'Buddhism', 3, 'satisfied', 'test', '2024-04-24 10:55:48'),
(8, 2, 'History', 5, 'highly-satisfied', 'Very Happy with the class. The teacher teaches very well', '2024-04-24 13:55:29'),
(9, 2, 'History', 4, 'satisfied', 'Teacher was good', '2024-04-25 06:24:52'),
(10, 2, 'History', 4, 'satisfied', 'teacher was good', '2024-04-25 06:25:14');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `file_id` int(11) NOT NULL,
  `floc` varchar(500) NOT NULL,
  `fdatein` varchar(200) NOT NULL,
  `fdesc` varchar(100) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `uploaded_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`file_id`, `floc`, `fdatein`, `fdesc`, `teacher_id`, `class_id`, `fname`, `uploaded_by`) VALUES
(11, 'teacher/uploads/5042_File.pdf', '2024-04-15 00:39:36', 'Term 1 Results', 5, 9, 'Grade 10', 'aaa bbb'),
(12, 'teacher/uploads/1102_File.pdf', '2024-04-27 03:15:05', 'Lecture 1 slides', 5, 10, 'Lecture 1', 'aaa bbb');

-- --------------------------------------------------------

--
-- Table structure for table `leaverequests`
--

CREATE TABLE `leaverequests` (
  `leaverequest_id` int(11) NOT NULL,
  `student_schedule_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `request_date` date NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'PENDING'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leaverequests`
--

INSERT INTO `leaverequests` (`leaverequest_id`, `student_schedule_id`, `student_id`, `teacher_id`, `request_date`, `status`) VALUES
(3, 47, 2, 5, '2024-04-23', 'approved'),
(4, 52, 2, 5, '2024-04-26', 'approved'),
(5, 51, 2, 5, '2024-04-26', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `marks_id` int(11) NOT NULL,
  `student_id` varchar(11) NOT NULL,
  `subject_id` varchar(11) NOT NULL,
  `term_id` varchar(11) NOT NULL,
  `marks` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`marks_id`, `student_id`, `subject_id`, `term_id`, `marks`) VALUES
(85, '11', '14', '1', '45'),
(86, '11', '9', '1', '90'),
(87, '11', '12', '1', '60'),
(88, '11', '11', '1', '67'),
(89, '11', '16', '1', '50'),
(90, '11', '15', '1', '79'),
(91, '4', '14', '1', '45'),
(92, '4', '9', '1', '34'),
(93, '4', '12', '1', '10'),
(94, '4', '11', '1', '67'),
(95, '4', '16', '1', '39'),
(96, '4', '15', '1', '51'),
(103, '7', '14', '1', '33'),
(104, '7', '9', '1', '66'),
(105, '7', '12', '1', '77'),
(106, '7', '11', '1', '88'),
(107, '7', '16', '1', '22'),
(108, '7', '15', '1', '11'),
(115, '2', '14', '1', '80'),
(116, '2', '9', '1', '66'),
(117, '2', '12', '1', '77'),
(118, '2', '11', '1', '67'),
(119, '2', '16', '1', '90'),
(120, '2', '15', '1', '87'),
(121, '2', '14', '2', '45'),
(122, '2', '9', '2', '57'),
(123, '2', '12', '2', '10'),
(124, '2', '11', '2', '67'),
(125, '2', '16', '2', '90'),
(126, '2', '15', '2', '45'),
(127, '2', '14', '3', '60'),
(128, '2', '9', '3', '60'),
(129, '2', '12', '3', '60'),
(130, '2', '11', '3', '79'),
(131, '2', '16', '3', '22'),
(132, '2', '15', '3', '11'),
(133, '2', '11', '1', '82'),
(134, '3', '11', '1', '90'),
(135, '7', '11', '1', '40'),
(136, '2', '11', '1', '82'),
(137, '3', '11', '1', '90'),
(138, '7', '11', '1', '40'),
(139, '2', '11', '1', '82'),
(140, '3', '11', '1', '90'),
(141, '7', '11', '1', '40'),
(142, '2', '11', '1', '82'),
(143, '3', '11', '1', '90'),
(144, '7', '11', '1', '40'),
(145, '2', '11', '1', '82'),
(146, '3', '11', '1', '90'),
(147, '7', '11', '1', '40'),
(148, '2', '11', '1', '82'),
(149, '3', '11', '1', '90'),
(150, '7', '11', '1', '40');

-- --------------------------------------------------------

--
-- Table structure for table `marks_new`
--

CREATE TABLE `marks_new` (
  `marks_id` int(11) NOT NULL,
  `student_id` varchar(11) NOT NULL,
  `subject_id` varchar(11) NOT NULL,
  `term_id` varchar(11) NOT NULL,
  `marks` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marks_new`
--

INSERT INTO `marks_new` (`marks_id`, `student_id`, `subject_id`, `term_id`, `marks`) VALUES
(1, '2', '11', '1', '91'),
(2, '7', '11', '1', '23'),
(3, '11', '11', '1', '67'),
(4, '13', '11', '1', '77'),
(5, '12', '11', '1', '54'),
(6, '14', '11', '1', '87'),
(7, '2', '11', '2', '97'),
(8, '7', '11', '2', '44'),
(9, '11', '11', '2', '68'),
(10, '13', '11', '2', '77'),
(11, '12', '11', '2', '65'),
(12, '14', '11', '2', '89'),
(19, '2', '9', '1', '56'),
(20, '7', '9', '1', '78'),
(21, '11', '9', '1', '90'),
(22, '12', '9', '1', '34'),
(23, '13', '9', '1', '67'),
(24, '14', '9', '1', '87'),
(25, '2', '16', '1', '69'),
(26, '7', '16', '1', '78'),
(27, '11', '16', '1', '64'),
(28, '13', '16', '1', '83'),
(29, '14', '16', '1', '92'),
(30, '12', '16', '1', '100'),
(31, '2', '12', '1', '90'),
(32, '7', '12', '1', '89'),
(33, '11', '12', '1', '76'),
(34, '13', '12', '1', '54'),
(35, '14', '12', '1', '32'),
(36, '12', '12', '1', '67'),
(37, '2', '15', '1', '54'),
(38, '7', '15', '1', '68'),
(39, '11', '15', '1', '98'),
(40, '13', '15', '1', '23'),
(41, '14', '15', '1', '43'),
(42, '12', '15', '1', '90'),
(43, '2', '14', '1', '42'),
(44, '7', '14', '1', '51'),
(45, '11', '14', '1', '60'),
(46, '13', '14', '1', '74'),
(47, '14', '14', '1', '85'),
(48, '12', '14', '1', '12');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notification_id` int(11) NOT NULL,
  `teacher_class_id` int(11) NOT NULL,
  `notification` varchar(100) NOT NULL,
  `date_of_notification` varchar(50) NOT NULL,
  `link` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notification_id`, `teacher_class_id`, `notification`, `date_of_notification`, `link`) VALUES
(1, 1, 'Add Practice Quiz file', '2024-02-20 21:35:28', 'student_quiz_list.php'),
(2, 5, 'Add Practice Quiz file', '2024-03-05 08:45:57', 'student_quiz_list.php'),
(3, 5, 'Add Practice Quiz file', '2024-03-05 08:58:56', 'student_quiz_list.php');

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE `parent` (
  `parent_id` int(11) NOT NULL,
  `firstname` varchar(15) NOT NULL,
  `lastname` varchar(15) NOT NULL,
  `city` varchar(30) NOT NULL,
  `childrenname` varchar(100) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(10) NOT NULL,
  `status` varchar(15) NOT NULL,
  `language` varchar(10) NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`parent_id`, `firstname`, `lastname`, `city`, `childrenname`, `username`, `password`, `status`, `language`, `image`) VALUES
(22, 'Selvasothy', 'Thangarajah', 'Jaffna', 'Anuraj', 'selva@gmail.com', '123', 'registered', 'Tamil', '../uploads/4783_File.png'),
(23, 'www', 'vvv', 'Colombo', 'bbb', 'anurajselvasothy@gmail.com', '123456', 'registered', 'english', '../uploads/2502_File.gif'),
(24, 'Amal', 'Perera', 'Kandy', 'Nethuni', 'Amal@gmail.com', '123456', 'registered', 'english', '../uploads/8872_File.png'),
(25, 'Gayani', 'Jayaratne', 'Galle', 'Amali', 'Gayani@gmail.com', '123456', 'registered', 'english', '../uploads/7864_File.png'),
(26, 'Jayantha', 'Silva', 'Colombo', 'Saman ', 'Jayantha@gmail.com', '123456', 'registered', 'english', '../uploads/3145_File.png');

-- --------------------------------------------------------

--
-- Table structure for table `pastpapers`
--

CREATE TABLE `pastpapers` (
  `file_id` int(11) NOT NULL,
  `floc` varchar(500) NOT NULL,
  `fdatein` varchar(200) NOT NULL,
  `fdesc` varchar(100) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `uploaded_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` varchar(30) NOT NULL,
  `price_id` varchar(30) NOT NULL,
  `quantity` int(50) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_purchase_id` int(7) NOT NULL,
  `price` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `price_id`, `quantity`, `product_name`, `product_purchase_id`, `price`) VALUES
('prod_PSjchcVgqGl8kt', 'price_1On2snLgktCwXblBpndwtq5f', 1, 'Maths', 8, 1000),
('prod_PSjchcVgqGl8kt', 'price_1OqTzfLgktCwXblBu2TNb7QK', 1, 'Maths', 9, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `question_type`
--

CREATE TABLE `question_type` (
  `question_type_id` int(11) NOT NULL,
  `question_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `question_type`
--

INSERT INTO `question_type` (`question_type_id`, `question_type`) VALUES
(1, 'Multiple Choice'),
(2, 'True or False');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `quiz_id` int(11) NOT NULL,
  `quiz_title` varchar(50) NOT NULL,
  `quiz_description` varchar(150) NOT NULL,
  `date_added` datetime NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`quiz_id`, `quiz_title`, `quiz_description`, `date_added`, `teacher_id`) VALUES
(7, 'Quiz 1', 'Introduction about Mathematics', '2024-02-15 11:35:47', 1),
(8, 'Quiz 2', 'Algorithms', '2024-02-15 11:44:36', 1),
(9, 'Quiz 1', 'About Mathematics', '2024-03-04 10:21:21', 5),
(10, 'j', 'ee', '2024-04-14 23:58:41', 5);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_question`
--

CREATE TABLE `quiz_question` (
  `quiz_question_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `question_text` varchar(1000) NOT NULL,
  `question_type_id` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  `date_added` datetime NOT NULL,
  `answer` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz_question`
--

INSERT INTO `quiz_question` (`quiz_question_id`, `quiz_id`, `question_text`, `question_type_id`, `points`, `date_added`, `answer`) VALUES
(1, 4, '<p>Is 1 + 1 = 3?</p>\r\n', 2, 0, '2024-02-14 09:23:13', 'false'),
(2, 4, '<p>What 2 + 3 - 1 = ?</p>\r\n', 1, 0, '2024-02-14 09:25:36', 'C'),
(3, 7, '<p>Is 1+1 =2&nbsp;?</p>\r\n', 2, 0, '2024-02-15 11:44:02', 'true'),
(4, 9, '<p>Is&nbsp; 1 + 1 = ?</p>\r\n', 1, 0, '2024-03-04 10:28:53', 'C');

-- --------------------------------------------------------

--
-- Table structure for table `rankfiles`
--

CREATE TABLE `rankfiles` (
  `id` int(11) NOT NULL,
  `fdesc` varchar(100) NOT NULL,
  `floc` varchar(500) NOT NULL,
  `fdatein` varchar(500) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `uploaded_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `result_files`
--

CREATE TABLE `result_files` (
  `exam_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL,
  `floc` varchar(500) NOT NULL,
  `fdatein` varchar(200) NOT NULL,
  `fdesc` varchar(100) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `uploaded_by` varchar(100) NOT NULL,
  `class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `result_files`
--

INSERT INTO `result_files` (`exam_id`, `file_id`, `floc`, `fdatein`, `fdesc`, `teacher_id`, `fname`, `uploaded_by`, `class_id`) VALUES
(7, 4, 'teacher/uploads/7179_File.xlsx', '2024-04-28 15:53:36', '11C Term Test', 5, '11C Term 1 History Results.xlsx', 'aaa bbb', 12),
(8, 5, 'teacher/uploads/6989_File.xlsx', '2024-04-28 15:55:26', '11C Term Test', 5, '11C Term 2 History Results.xlsx', 'aaa bbb', 12),
(9, 6, 'teacher/uploads/9701_File.xlsx', '2024-04-28 16:31:45', 'Term 1 maths marks', 3, 'Maths.xlsx', 'aaaa bbb', 15),
(9, 7, 'teacher/uploads/4372_File.xlsx', '2024-04-28 16:33:11', 'Term 1 maths marks', 3, 'Maths.xlsx', 'aaaa bbb', 15),
(9, 8, 'teacher/uploads/3170_File.xlsx', '2024-04-28 16:38:56', 'Term 1 maths marks', 3, 'Maths.xlsx', 'aaaa bbb', 15),
(10, 9, 'teacher/uploads/6603_File.xlsx', '2024-04-28 16:54:24', 'Students marks for Term 1 Sinhala', 8, 'Sinhala.xlsx', 'ccc ddd', 20),
(11, 10, 'teacher/uploads/9445_File.xlsx', '2024-04-28 16:55:52', 'Students marks for Term 1 English', 9, 'English.xlsx', 'ddd eee', 16),
(12, 11, 'teacher/uploads/7326_File.xlsx', '2024-04-28 17:01:08', 'Student Term1 Buddhism Subject marks', 7, 'Buddhism.xlsx', 'bbb ccc', 19),
(13, 12, 'teacher/uploads/9026_File.xlsx', '2024-04-28 17:02:55', 'Students marks for Term 1', 6, 'Science.xlsx', 'rrr qqq', 18);

-- --------------------------------------------------------

--
-- Table structure for table `result_file_marks`
--

CREATE TABLE `result_file_marks` (
  `result_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `teacher_class_id` varchar(11) NOT NULL,
  `marks` varchar(11) NOT NULL,
  `grade` varchar(100) NOT NULL,
  `exam_id` varchar(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `result_file_marks`
--

INSERT INTO `result_file_marks` (`result_id`, `student_id`, `teacher_class_id`, `marks`, `grade`, `exam_id`, `date`) VALUES
(1, 2, '12', '91', 'A', '7', '2024-03-12'),
(2, 7, '12', '23', 'W', '7', '2024-03-12'),
(3, 11, '12', '67', 'B', '7', '2024-03-12'),
(4, 13, '12', '77', 'A', '7', '2024-03-12'),
(5, 12, '12', '54', 'C', '7', '2024-03-12'),
(6, 14, '12', '87', 'A', '7', '2024-03-12'),
(7, 2, '12', '97', 'A', '8', '2024-04-28'),
(8, 7, '12', '44', 'S', '8', '2024-04-28'),
(9, 11, '12', '68', 'B', '8', '2024-04-28'),
(10, 13, '12', '77', 'A', '8', '2024-04-28'),
(11, 12, '12', '65', 'B', '8', '2024-04-28'),
(12, 14, '12', '89', 'A', '8', '2024-04-28'),
(20, 2, '15', '56', 'C', '9', '2024-04-28'),
(21, 7, '15', '78', 'A', '9', '2024-04-28'),
(22, 11, '15', '90', 'A', '9', '2024-04-28'),
(23, 12, '15', '34', 'S', '9', '2024-04-28'),
(24, 13, '15', '67', 'B', '9', '2024-04-28'),
(25, 14, '15', '87', 'A', '9', '2024-04-28'),
(26, 2, '20', '69', 'B', '10', '2024-04-28'),
(27, 7, '20', '78', 'A', '10', '2024-04-28'),
(28, 11, '20', '64', 'B', '10', '2024-04-28'),
(29, 13, '20', '83', 'A', '10', '2024-04-28'),
(30, 14, '20', '92', 'A', '10', '2024-04-28'),
(31, 12, '20', '100', 'A', '10', '2024-04-28'),
(32, 2, '16', '90', 'A', '11', '2024-04-28'),
(33, 7, '16', '89', 'A', '11', '2024-04-28'),
(34, 11, '16', '76', 'A', '11', '2024-04-28'),
(35, 13, '16', '54', 'C', '11', '2024-04-28'),
(36, 14, '16', '32', 'W', '11', '2024-04-28'),
(37, 12, '16', '67', 'B', '11', '2024-04-28'),
(38, 2, '19', '54', 'C', '12', '2024-04-28'),
(39, 7, '19', '68', 'B', '12', '2024-04-28'),
(40, 11, '19', '98', 'A', '12', '2024-04-28'),
(41, 13, '19', '23', 'W', '12', '2024-04-28'),
(42, 14, '19', '43', 'S', '12', '2024-04-28'),
(43, 12, '19', '90', 'A', '12', '2024-04-28'),
(44, 2, '18', '42', 'S', '13', '2024-04-28'),
(45, 7, '18', '51', 'C', '13', '2024-04-28'),
(46, 11, '18', '60', 'B', '13', '2024-04-28'),
(47, 13, '18', '74', 'B', '13', '2024-04-28'),
(48, 14, '18', '85', 'A', '13', '2024-04-28'),
(49, 12, '18', '12', 'W', '13', '2024-04-28');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `schedule_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `date` varchar(15) NOT NULL,
  `time` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`schedule_id`, `teacher_id`, `subject_id`, `class_id`, `date`, `time`) VALUES
(10, 5, 11, 12, 'Tuesday', '18:00'),
(11, 4, 11, 14, 'Wednesday', '12:00:00'),
(12, 4, 11, 13, 'Saturday', '08:30:00'),
(13, 9, 12, 16, 'Tuesday', '09:00:00'),
(14, 3, 9, 15, 'Tuesday', '08:30:00'),
(15, 6, 14, 18, 'Sunday', '15:00:00'),
(16, 7, 15, 19, 'Monday', '09:00:00'),
(17, 8, 16, 20, 'Wednesday', '12:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `scienceflashcrd`
--

CREATE TABLE `scienceflashcrd` (
  `id` int(11) NOT NULL,
  `bundle_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `scienceflashcrd`
--

INSERT INTO `scienceflashcrd` (`id`, `bundle_id`, `question`, `answer`, `created_at`) VALUES
(1, 0, 'aaaa', 'drfrf', '2024-04-27 07:15:15'),
(2, 2, 'asa', 'ada', '2024-04-27 07:21:47'),
(3, 2, 'fgd', 'dfgfd', '2024-04-27 07:21:47'),
(4, 3, 'what is the power', 'power is the strength that someone has', '2024-04-27 07:30:07'),
(5, 4, 'definition', 'asd', '2024-04-27 07:40:03'),
(6, 5, '', '', '2024-04-27 07:53:24'),
(7, 6, '', '', '2024-04-27 07:55:29'),
(8, 7, 'Zsdsd', 'qqwq', '2024-04-27 08:15:17'),
(9, 8, 'qqq', 'dsds', '2024-04-27 08:16:55');

-- --------------------------------------------------------

--
-- Table structure for table `scienceflashcrd_bundle`
--

CREATE TABLE `scienceflashcrd_bundle` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `subject` text NOT NULL,
  `bundle_name` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `scienceflashcrd_bundle`
--

INSERT INTO `scienceflashcrd_bundle` (`id`, `user_id`, `subject`, `bundle_name`, `created_at`) VALUES
(1, 1, 'Shared Flashcards', '', '2024-04-27 07:15:15'),
(2, 0, 'Shared Flashcards', '', '2024-04-27 07:21:47'),
(3, 0, 'Science', '', '2024-04-27 07:30:07'),
(4, 0, 'Science', '', '2024-04-27 07:40:03'),
(5, 0, 'Science', '', '2024-04-27 07:53:24'),
(6, 0, 'Science', '', '2024-04-27 07:55:29'),
(7, 0, 'History', '', '2024-04-27 08:15:17'),
(8, 0, 'Science', 'aasa', '2024-04-27 08:16:55');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `firstname` varchar(15) NOT NULL,
  `lastname` varchar(15) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(15) NOT NULL,
  `language` varchar(10) NOT NULL,
  `grade` varchar(8) NOT NULL,
  `status` varchar(15) NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `firstname`, `lastname`, `gender`, `username`, `password`, `language`, `grade`, `status`, `image`) VALUES
(2, 'bbb', 'ccc', 'male', 'eee@gmail.com', '123', 'sinhala', '11', 'registered', '../uploads/5555_File.jpg'),
(7, 'abc', 'def', 'male', 'anu@gmail.com', '111', 'Tamil', '10', 'registered', '../uploads/4444_File.jpg'),
(11, 'Anuraj', 'Selvasothy', 'male', 'anuraj@gmail.com', '111111', 'Tamil', '11', 'registered', '../uploads/1999_File.jpg'),
(12, 'Nethuni', 'Perera', 'female', 'nethuni@gmail.com', '123456', 'english', '10', 'registered', '../uploads/4546_File.png'),
(13, 'Amali', 'Jayaratne', 'female', 'amali@gmail.com', '123456', 'english', '10', 'registered', '../uploads/8780_File.png'),
(14, 'Saman', 'Silva', 'male', 'saman@gmail.com', '123456', 'english', '10', 'registered', '../uploads/6915_File.png');

-- --------------------------------------------------------

--
-- Table structure for table `student_attendance`
--

CREATE TABLE `student_attendance` (
  `attendance_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `date` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_attendance`
--

INSERT INTO `student_attendance` (`attendance_id`, `student_id`, `teacher_id`, `class_id`, `date`, `status`) VALUES
(1, 0, 5, 12, '2024-05-07', 'absent'),
(2, 2, 5, 12, '2024-04-16', 'present'),
(3, 7, 5, 12, '2024-04-16', 'present'),
(4, 11, 5, 12, '2024-04-16', 'present'),
(5, 2, 5, 12, '2024-04-23', 'present'),
(6, 7, 5, 12, '2024-04-23', 'absent'),
(7, 11, 5, 12, '2024-04-23', 'present'),
(8, 2, 5, 12, '2024-04-09', 'present'),
(9, 7, 5, 12, '2024-04-09', 'absent'),
(10, 11, 5, 12, '2024-04-09', 'absent');

-- --------------------------------------------------------

--
-- Table structure for table `student_class`
--

CREATE TABLE `student_class` (
  `student_schedule_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'unregistered'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_class`
--

INSERT INTO `student_class` (`student_schedule_id`, `student_id`, `schedule_id`, `class_id`, `status`) VALUES
(46, 2, 7, 8, 'joined'),
(48, 2, 10, 12, 'leave'),
(49, 2, 12, 13, 'joined'),
(50, 2, 12, 13, 'joined'),
(53, 2, 10, 12, 'joined'),
(54, 7, 10, 12, 'joined'),
(55, 11, 10, 12, 'joined'),
(56, 13, 10, 12, 'joined'),
(57, 12, 10, 12, 'joined'),
(58, 14, 10, 12, 'joined'),
(59, 2, 15, 18, 'joined'),
(60, 2, 14, 15, 'joined'),
(61, 2, 13, 16, 'joined'),
(62, 2, 17, 20, 'joined'),
(63, 2, 16, 19, 'joined');

-- --------------------------------------------------------

--
-- Table structure for table `student_class_quiz`
--

CREATE TABLE `student_class_quiz` (
  `student_class_quiz_id` int(11) NOT NULL,
  `class_quiz_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `student_quiz_time` varchar(100) NOT NULL,
  `grade` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` int(11) NOT NULL,
  `subject_code` varchar(8) NOT NULL,
  `subject_title` varchar(20) NOT NULL,
  `description` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `subject_code`, `subject_title`, `description`) VALUES
(9, '1001', 'Maths', '<p>This subject for Ordinary Level Maths</p>\r\n'),
(11, '1002', 'History', '<p>O/Level History</p>\r\n'),
(12, '1003', 'English', '<p>This is English subject</p>\r\n'),
(14, '1005', 'Science', '<p>This is for Science Subject</p>\r\n'),
(15, '1004', 'Buddhism', '<p>This is for Buddhism Subject</p>\r\n'),
(16, '1006', 'Sinhala', '<p>This is Sinhala Subject</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(11) NOT NULL,
  `firstname` varchar(15) NOT NULL,
  `lastname` varchar(15) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(10) NOT NULL,
  `subject` varchar(10) NOT NULL,
  `status` varchar(15) NOT NULL,
  `language` varchar(10) NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `firstname`, `lastname`, `username`, `password`, `subject`, `status`, `language`, `image`) VALUES
(3, 'aaaa', 'bbb', 'aaaa@gmail.com', '123', 'Maths', 'registered', 'English', '../uploads/2222_File.jpeg'),
(5, 'aaa', 'bbb', 'aaa@gmail.com', '111', 'History', 'registered', 'english', '../uploads/3528_File.png'),
(6, 'rrr', 'qqq', 'rrr@gmail.com', '000000', 'Science', 'registered', 'english', '../uploads/3443_File.png'),
(7, 'bbb', 'ccc', 'bbb@gmail.com', '111111', 'Buddhism', 'registered', 'sinhala', '../uploads/1053_File.png'),
(8, 'ccc', 'ddd', 'ccc@gmail.com', '222222', 'Sinhala', 'registered', 'sinhala', '../uploads/1476_File.jpeg'),
(9, 'ddd', 'eee', 'ddd@gmail.com', '333333', 'English', 'registered', 'english', '../uploads/6806_File.png');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_class`
--

CREATE TABLE `teacher_class` (
  `teacher_class_id` int(7) NOT NULL,
  `class_name` varchar(30) NOT NULL,
  `teacher_id` int(7) NOT NULL,
  `grade_id` int(7) NOT NULL,
  `subject_id` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher_class`
--

INSERT INTO `teacher_class` (`teacher_class_id`, `class_name`, `teacher_id`, `grade_id`, `subject_id`) VALUES
(10, '11A', 5, 102, 11),
(11, '11B', 5, 102, 11),
(12, '11C', 5, 101, 11),
(13, 'History1', 4, 101, 11),
(14, 'History 10A', 4, 101, 11),
(15, 'Maths 101', 3, 101, 9),
(16, 'English 01', 9, 102, 12),
(17, 'English 02', 9, 101, 12),
(18, 'Science 101', 6, 101, 14),
(19, 'Buddhism 01', 7, 101, 15),
(20, 'Sinhala 101', 8, 101, 16);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_class_student`
--

CREATE TABLE `teacher_class_student` (
  `teacher_class_student_id` int(7) NOT NULL,
  `teacher_class_id` int(7) NOT NULL,
  `teacher_id` int(7) NOT NULL,
  `student_id` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `term`
--

CREATE TABLE `term` (
  `term_id` int(11) NOT NULL,
  `term_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `term`
--

INSERT INTO `term` (`term_id`, `term_name`) VALUES
(1, 'Term 1'),
(2, 'Term 2'),
(3, 'Term 3');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `fullname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `course` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`fullname`, `email`, `phone`, `course`) VALUES
('a', 'a@gmai.com', '12345', 'mba'),
('b', 'b@gmail.com', '12345', 'mba'),
('c', 'c@gmail.com', '12345', 'mba');

-- --------------------------------------------------------

--
-- Table structure for table `userlist`
--

CREATE TABLE `userlist` (
  `firstname` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `role` varchar(10) NOT NULL,
  `status` varchar(15) NOT NULL,
  `userlistid` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(30) NOT NULL,
  `reset_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userlist`
--

INSERT INTO `userlist` (`firstname`, `lastname`, `role`, `status`, `userlistid`, `username`, `password`, `reset_token`) VALUES
('bbb', 'ccc', 'student', 'registered', 1, 'eee@gmail.com', '123', NULL),
('aaa', 'bbb', 'teacher', 'registered', 2, 'aaa@gmail.com', '111', NULL),
('admin', 'admin', 'admin', 'registered', 4, 'admin@gmail.com', '1111', NULL),
('abc', 'def', 'student', 'registered', 8, 'anu@gmail.com', '111', NULL),
('www', 'abc', 'parent', 'registered', 9, 'www@gmail.com', '123', NULL),
('aaaa', 'bbb', 'teacher', 'registered', 10, 'aaaa@gmail.com', '123', NULL),
('Selvasothy', 'Thangarajah', 'parent', 'registered', 17, 'selva@gmail.com', '123', NULL),
('rrr', 'qqq', 'teacher', 'registered', 19, 'rrr@gmail.com', '000000', NULL),
('bbb', 'ccc', 'teacher', 'registered', 20, 'bbb@gmail.com', '111111', NULL),
('ccc', 'ddd', 'teacher', 'registered', 21, 'ccc@gmail.com', '222222', NULL),
('ddd', 'eee', 'teacher', 'registered', 22, 'ddd@gmail.com', '333333', NULL),
('Anuraj', 'Selvasothy', 'student', 'registered', 23, 'anuraj@gmail.com', '111111', NULL),
('www', 'vvv', 'parent', 'registered', 24, 'anurajselvasothy@gmail.com', '123456', NULL),
('Nethuni', 'Perera', 'student', 'registered', 25, 'nethuni@gmail.com', '123456', NULL),
('Amal', 'Perera', 'parent', 'registered', 26, 'Amal@gmail.com', '123456', NULL),
('Amali', 'Jayaratne', 'student', 'registered', 27, 'amali@gmail.com', '123456', NULL),
('Gayani', 'Jayaratne', 'parent', 'registered', 28, 'Gayani@gmail.com', '123456', NULL),
('Saman', 'Silva', 'student', 'registered', 29, 'saman@gmail.com', '123456', NULL),
('Jayantha', 'Silva', 'parent', 'registered', 30, 'Jayantha@gmail.com', '123456', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(10) NOT NULL,
  `firstname` varchar(15) NOT NULL,
  `lastname` varchar(15) NOT NULL,
  `image` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `firstname`, `lastname`, `image`) VALUES
(1, 'admin@gmail.com', '1111', 'admin', 'admin', ''),
(2, 'teph@gmail.com', '111', 'Stephen', 'john', ''),
(3, 'john@gmail.com', '1234', 'john', 'doe', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`announcement_id`);

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`answer_id`);

--
-- Indexes for table `average`
--
ALTER TABLE `average`
  ADD PRIMARY KEY (`average_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`grade_id`);

--
-- Indexes for table `class_announcements`
--
ALTER TABLE `class_announcements`
  ADD PRIMARY KEY (`class_announcement_id`);

--
-- Indexes for table `class_quiz`
--
ALTER TABLE `class_quiz`
  ADD PRIMARY KEY (`class_quiz_id`);

--
-- Indexes for table `class_subject_overview`
--
ALTER TABLE `class_subject_overview`
  ADD PRIMARY KEY (`class_subject_overview_id`);

--
-- Indexes for table `exam_results`
--
ALTER TABLE `exam_results`
  ADD PRIMARY KEY (`exam_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `leaverequests`
--
ALTER TABLE `leaverequests`
  ADD PRIMARY KEY (`leaverequest_id`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`marks_id`);

--
-- Indexes for table `marks_new`
--
ALTER TABLE `marks_new`
  ADD PRIMARY KEY (`marks_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`parent_id`);

--
-- Indexes for table `pastpapers`
--
ALTER TABLE `pastpapers`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_purchase_id`);

--
-- Indexes for table `question_type`
--
ALTER TABLE `question_type`
  ADD PRIMARY KEY (`question_type_id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`quiz_id`);

--
-- Indexes for table `quiz_question`
--
ALTER TABLE `quiz_question`
  ADD PRIMARY KEY (`quiz_question_id`);

--
-- Indexes for table `rankfiles`
--
ALTER TABLE `rankfiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result_files`
--
ALTER TABLE `result_files`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `result_file_marks`
--
ALTER TABLE `result_file_marks`
  ADD PRIMARY KEY (`result_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `scienceflashcrd`
--
ALTER TABLE `scienceflashcrd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scienceflashcrd_bundle`
--
ALTER TABLE `scienceflashcrd_bundle`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `student_attendance`
--
ALTER TABLE `student_attendance`
  ADD PRIMARY KEY (`attendance_id`);

--
-- Indexes for table `student_class`
--
ALTER TABLE `student_class`
  ADD PRIMARY KEY (`student_schedule_id`);

--
-- Indexes for table `student_class_quiz`
--
ALTER TABLE `student_class_quiz`
  ADD PRIMARY KEY (`student_class_quiz_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `teacher_class`
--
ALTER TABLE `teacher_class`
  ADD PRIMARY KEY (`teacher_class_id`);

--
-- Indexes for table `teacher_class_student`
--
ALTER TABLE `teacher_class_student`
  ADD PRIMARY KEY (`teacher_class_student_id`);

--
-- Indexes for table `term`
--
ALTER TABLE `term`
  ADD PRIMARY KEY (`term_id`);

--
-- Indexes for table `userlist`
--
ALTER TABLE `userlist`
  ADD PRIMARY KEY (`userlistid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `announcement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `average`
--
ALTER TABLE `average`
  MODIFY `average_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `class_announcements`
--
ALTER TABLE `class_announcements`
  MODIFY `class_announcement_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `class_quiz`
--
ALTER TABLE `class_quiz`
  MODIFY `class_quiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `class_subject_overview`
--
ALTER TABLE `class_subject_overview`
  MODIFY `class_subject_overview_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exam_results`
--
ALTER TABLE `exam_results`
  MODIFY `exam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `leaverequests`
--
ALTER TABLE `leaverequests`
  MODIFY `leaverequest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `marks_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `marks_new`
--
ALTER TABLE `marks_new`
  MODIFY `marks_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `parent`
--
ALTER TABLE `parent`
  MODIFY `parent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `pastpapers`
--
ALTER TABLE `pastpapers`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_purchase_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `question_type`
--
ALTER TABLE `question_type`
  MODIFY `question_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `quiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `quiz_question`
--
ALTER TABLE `quiz_question`
  MODIFY `quiz_question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rankfiles`
--
ALTER TABLE `rankfiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `result_files`
--
ALTER TABLE `result_files`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `result_file_marks`
--
ALTER TABLE `result_file_marks`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `scienceflashcrd`
--
ALTER TABLE `scienceflashcrd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `scienceflashcrd_bundle`
--
ALTER TABLE `scienceflashcrd_bundle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `student_attendance`
--
ALTER TABLE `student_attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `student_class`
--
ALTER TABLE `student_class`
  MODIFY `student_schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `student_class_quiz`
--
ALTER TABLE `student_class_quiz`
  MODIFY `student_class_quiz_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `teacher_class`
--
ALTER TABLE `teacher_class`
  MODIFY `teacher_class_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `teacher_class_student`
--
ALTER TABLE `teacher_class_student`
  MODIFY `teacher_class_student_id` int(7) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `term`
--
ALTER TABLE `term`
  MODIFY `term_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `userlist`
--
ALTER TABLE `userlist`
  MODIFY `userlistid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
