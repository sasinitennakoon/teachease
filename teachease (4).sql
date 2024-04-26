-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2024 at 06:52 AM
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
(10, 5, 10, 11),
(11, 5, 11, 11),
(12, 4, 14, 11);

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
(11, 'teacher/uploads/5042_File.pdf', '2024-04-15 00:39:36', 'Term 1 Results', 5, 9, 'Grade 10', 'aaa bbb');

-- --------------------------------------------------------

--
-- Table structure for table `flashcards`
--

CREATE TABLE `flashcards` (
  `id` int(11) NOT NULL,
  `bundle_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `flashcards`
--

INSERT INTO `flashcards` (`id`, `bundle_id`, `question`, `answer`, `created_at`) VALUES
(1, 1, '5+5', '10', '2024-04-24 17:50:18'),
(2, 2, '10+5', '15', '2024-04-24 17:52:21'),
(3, 2, '2+2', '4', '2024-04-24 17:52:21'),
(4, 2, '5+8', '13', '2024-04-24 17:52:21'),
(5, 2, '13+8', '21', '2024-04-24 17:52:21'),
(9, 4, 'edm2ji', 'di2jid', '2024-04-26 04:49:35');

-- --------------------------------------------------------

--
-- Table structure for table `flashcard_bundles`
--

CREATE TABLE `flashcard_bundles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `bundle_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `flashcard_bundles`
--

INSERT INTO `flashcard_bundles` (`id`, `user_id`, `subject`, `bundle_name`, `created_at`) VALUES
(1, 1, 'Shared Flashcards', 'gggg', '2024-04-24 17:50:18'),
(2, 1, 'Shared Flashcards', 'Logarithms', '2024-04-24 17:52:21'),
(4, 1, 'Shared Flashcards', 'vjivvij', '2024-04-26 04:49:35');

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
(3, 47, 2, 5, '2024-04-23', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `marks_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `term_id` int(11) NOT NULL,
  `marks` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`marks_id`, `student_id`, `subject_id`, `term_id`, `marks`) VALUES
(85, 11, 14, 1, 45),
(86, 11, 9, 1, 90),
(87, 11, 12, 1, 60),
(88, 11, 11, 1, 67),
(89, 11, 16, 1, 50),
(90, 11, 15, 1, 79),
(91, 4, 14, 1, 45),
(92, 4, 9, 1, 34),
(93, 4, 12, 1, 10),
(94, 4, 11, 1, 67),
(95, 4, 16, 1, 39),
(96, 4, 15, 1, 51),
(103, 7, 14, 1, 33),
(104, 7, 9, 1, 66),
(105, 7, 12, 1, 77),
(106, 7, 11, 1, 88),
(107, 7, 16, 1, 22),
(108, 7, 15, 1, 11),
(115, 2, 14, 1, 80),
(116, 2, 9, 1, 66),
(117, 2, 12, 1, 77),
(118, 2, 11, 1, 67),
(119, 2, 16, 1, 90),
(120, 2, 15, 1, 87),
(121, 2, 14, 2, 45),
(122, 2, 9, 2, 57),
(123, 2, 12, 2, 10),
(124, 2, 11, 2, 67),
(125, 2, 16, 2, 90),
(126, 2, 15, 2, 45),
(127, 2, 14, 3, 60),
(128, 2, 9, 3, 60),
(129, 2, 12, 3, 60),
(130, 2, 11, 3, 79),
(131, 2, 16, 3, 22),
(132, 2, 15, 3, 11);

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
(23, 'www', 'vvv', 'Colombo', 'bbb', 'anurajselvasothy@gmail.com', '123456', 'registered', 'english', '../uploads/2502_File.gif');

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
-- Table structure for table `result_files`
--

CREATE TABLE `result_files` (
  `exam_id` int(11) NOT NULL,
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
-- Dumping data for table `result_files`
--

INSERT INTO `result_files` (`exam_id`, `file_id`, `floc`, `fdatein`, `fdesc`, `teacher_id`, `class_id`, `fname`, `uploaded_by`) VALUES
(10, 9, 'teacher/uploads/6429_File.xlsx', '2024-04-22 00:23:05', 'Lesson 1', 5, 10, 'Grade 10', 'aaa bbb'),
(10, 10, 'teacher/uploads/7833_File.xlsx', '2024-04-22 00:26:34', 'Term 1 Results', 5, 10, 'Grade 10', 'aaa bbb'),
(10, 11, 'teacher/uploads/4707_File.xlsx', '2024-04-22 00:28:34', 'Term 1 Results', 5, 10, 'Grade 10', 'aaa bbb'),
(10, 12, 'teacher/uploads/5723_File.xlsx', '2024-04-22 00:59:20', 'Session 1', 5, 10, 'Nethma k', 'aaa bbb');

-- --------------------------------------------------------

--
-- Table structure for table `result_file_marks`
--

CREATE TABLE `result_file_marks` (
  `student_id` int(11) NOT NULL,
  `teacher_class_id` int(11) NOT NULL,
  `marks` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `grade` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(9, 5, 11, 10, 'Monday', '15:00'),
(10, 5, 11, 12, 'Tuesday', '18:00'),
(11, 4, 11, 14, 'Wednesday', '12:00:00'),
(12, 4, 11, 13, 'Saturday', '08:30:00'),
(13, 9, 12, 16, 'Tuesday', '09:00:00');

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
(11, 'Anuraj', 'Selvasothy', 'male', 'anuraj@gmail.com', '111111', 'Tamil', '11', 'registered', '../uploads/1999_File.jpg');

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
(1, 2, 5, 12, '2024-04-30', 'present'),
(2, 2, 5, 12, '2024-04-23', 'present');

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
(51, 2, 10, 12, 'leave'),
(52, 2, 10, 12, 'joined');

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
(12, 'History', 5, 101, 11),
(13, 'History1', 4, 101, 11),
(14, 'History 10A', 4, 101, 11),
(15, 'Maths 101', 3, 101, 9),
(16, 'English 01', 9, 102, 12),
(17, 'English 02', 9, 101, 12);

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
('www', 'vvv', 'parent', 'registered', 24, 'anurajselvasothy@gmail.com', '123456', NULL);

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
  ADD PRIMARY KEY (`exam_id`),
  ADD UNIQUE KEY `unique_subject_class_exam` (`subject_id`,`class_id`);

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
-- Indexes for table `flashcards`
--
ALTER TABLE `flashcards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bundle_id` (`bundle_id`);

--
-- Indexes for table `flashcard_bundles`
--
ALTER TABLE `flashcard_bundles`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `result_files`
--
ALTER TABLE `result_files`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`schedule_id`);

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
  MODIFY `exam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `flashcards`
--
ALTER TABLE `flashcards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `flashcard_bundles`
--
ALTER TABLE `flashcard_bundles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `leaverequests`
--
ALTER TABLE `leaverequests`
  MODIFY `leaverequest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `marks_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `parent`
--
ALTER TABLE `parent`
  MODIFY `parent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

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
-- AUTO_INCREMENT for table `result_files`
--
ALTER TABLE `result_files`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `student_attendance`
--
ALTER TABLE `student_attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_class`
--
ALTER TABLE `student_class`
  MODIFY `student_schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

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
  MODIFY `teacher_class_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
  MODIFY `userlistid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `flashcards`
--
ALTER TABLE `flashcards`
  ADD CONSTRAINT `flashcards_ibfk_1` FOREIGN KEY (`bundle_id`) REFERENCES `flashcard_bundles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `flashcard_bundles`
--
ALTER TABLE `flashcard_bundles`
  ADD CONSTRAINT `flashcard_bundles_ibfk_1` FOREIGN KEY (`id`) REFERENCES `userlist` (`userlistid`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
