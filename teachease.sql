-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2024 at 01:07 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

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
(101, 'Grade 10', 20),
(102, 'Grade 11', 20);

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
(8, 5, 8, 9),
(9, 5, 9, 9);

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
(6, 'aaa', 'bbb', 'ccc', 'anu', 'anurajselvasoth', '234', 'unregistered', '', ''),
(18, 'Selvasothy', 'Selva', 'Jaffna', 'anu', 'anuraj', '234', 'unregistered', '', ''),
(19, 'www', 'abc', 'colombo', 'anu', 'www@gmail.com', '123', 'unregistered', '', ''),
(22, 'Selvasothy', 'Thangarajah', 'Jaffna', 'Anuraj', 'selva@gmail.com', '123', 'unregistered', 'Tamil', 'uploads/4783_File.png');

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

INSERT INTO `result_files` (`file_id`, `floc`, `fdatein`, `fdesc`, `teacher_id`, `class_id`, `fname`, `uploaded_by`) VALUES
(2, 'teacher/uploads/8955_File.xlsx', '2024-04-15 01:26:18', 'Lesson 1', 5, 8, 'Grade 10', 'aaa bbb');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `schedule_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `date` varchar(8) NOT NULL,
  `time` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`schedule_id`, `teacher_id`, `class_id`, `subject_id`, `date`, `time`) VALUES
(3, 5, 9, 9, 'Tuesday', '14:00:00');

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
(2, 'bbb', 'ccc', 'male', 'eee@gmail.com', '123', 'sinhala', '11', 'unregistered', ''),
(4, 'Anu', 'Raj', 'male', 'anurajselvasothy@gmail.com', 'anu', 'Tamil', '11', 'unregistered', ''),
(7, 'abc', 'def', 'male', 'anu@gmail.com', '111', 'Tamil', '10', 'unregistered', ''),
(11, 'Anuraj', 'Selvasothy', 'male', 'anuraj@gmail.com', '2601', 'Tamil', '11', 'unregistered', 'uploads/1999_File.jpg');

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
(9, '1001', 'Mathematics', '<p>This subject for Ordinary Level Maths</p>\r\n');

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
(3, 'aaaa', 'bbb', 'aaaa@gmail.com', '123', 'Maths', 'unregistered', '', ''),
(4, 'Anuraj', 'Selvasothy', 'anuraj@gmail.com', '2601', 'History', 'unregistered', 'Tamil', ''),
(5, 'aaa', 'bbb', 'aaa@gmail.com', '111', 'History', 'unregistered', 'Tamil', 'uploads/1629_File.png');

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
(8, 'Mathematics', 5, 102, 9),
(9, 'New Class', 5, 101, 9);

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
-- Table structure for table `userlist`
--

CREATE TABLE `userlist` (
  `firstname` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `role` varchar(10) NOT NULL,
  `status` varchar(15) NOT NULL,
  `userlistid` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userlist`
--

INSERT INTO `userlist` (`firstname`, `lastname`, `role`, `status`, `userlistid`, `username`, `password`) VALUES
('bbb', 'ccc', 'student', 'unregistered', 1, 'eee@gmail.com', '123'),
('aaa', 'bbb', 'teacher', 'unregistered', 2, 'aaa@gmail.com', '111'),
('Anuraj', 'yyy', 'parent', 'unregistered', 3, 'anurajselvasothy@gmail.com', '234'),
('admin', 'admin', 'admin', 'registered', 4, 'admin@gmail.com', '1111'),
('aaa', 'bbbb', 'teacher', 'unregistered', 5, 'aaa', '1233'),
('SELVACHOTHY', 'ANURAJ', 'teacher', 'unregistered', 6, 'anu', '123'),
('Selvasothy', 'Selva', 'teacher', 'unregistered', 7, 'anuraj', '234'),
('abc', 'def', 'teacher', 'unregistered', 8, 'anu@gmail.com', '111'),
('www', 'abc', 'teacher', 'unregistered', 9, 'www@gmail.com', '123'),
('aaaa', 'bbb', 'teacher', 'unregistered', 10, 'aaaa@gmail.com', '123'),
('Anuraj', 'Selvasothy', 'teacher', 'unregistered', 11, 'anuraj@gmail.com', '2601'),
('Anuraj', 'Selvasothy', 'teacher', 'unregistered', 12, 'anuraj@gmail.com', '2601'),
('Selvasothy', 'Thangarajah', 'teacher', 'unregistered', 13, 'anuraj@gmail.com', '2601'),
('Anuraj', 'Selvasothy', 'teacher', 'unregistered', 14, 'anuraj@gmail.com', '2601'),
('Selvasothy', 'Thangarajah', 'teacher', 'unregistered', 15, 'selva@gmail.com', '123'),
('Anuraj', 'Selvasothy', 'teacher', 'unregistered', 16, 'anuraj@gmail.com', '2601'),
('Selvasothy', 'Thangarajah', '', 'unregistered', 17, 'selva@gmail.com', '123'),
('aaa', 'bbb', 'teacher', 'unregistered', 18, 'aaa@gmail.com', '111');

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
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`answer_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`grade_id`);

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
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`file_id`);

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
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `exam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `parent`
--
ALTER TABLE `parent`
  MODIFY `parent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `student_class_quiz`
--
ALTER TABLE `student_class_quiz`
  MODIFY `student_class_quiz_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teacher_class`
--
ALTER TABLE `teacher_class`
  MODIFY `teacher_class_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `teacher_class_student`
--
ALTER TABLE `teacher_class_student`
  MODIFY `teacher_class_student_id` int(7) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userlist`
--
ALTER TABLE `userlist`
  MODIFY `userlistid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
