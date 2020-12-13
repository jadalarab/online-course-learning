-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 22, 2020 at 06:24 PM
-- Server version: 5.7.26
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finaldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `role` varchar(200) NOT NULL,
  PRIMARY KEY (`email`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`, `password`, `name`, `role`) VALUES
('wassim', 'wassim', 'wassim', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `admin_chat_room_open`
--

DROP TABLE IF EXISTS `admin_chat_room_open`;
CREATE TABLE IF NOT EXISTS `admin_chat_room_open` (
  `id` int(250) NOT NULL AUTO_INCREMENT,
  `chat_room_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=87 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `chat_messages`
--

DROP TABLE IF EXISTS `chat_messages`;
CREATE TABLE IF NOT EXISTS `chat_messages` (
  `id` int(250) NOT NULL AUTO_INCREMENT,
  `chat_room_id` int(250) NOT NULL,
  `student_id` int(250) NOT NULL,
  `message` varchar(2500) NOT NULL,
  `seen_by_admin` tinyint(1) NOT NULL,
  `seen_by_user` tinyint(1) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=120 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat_messages`
--

INSERT INTO `chat_messages` (`id`, `chat_room_id`, `student_id`, `message`, `seen_by_admin`, `seen_by_user`, `date_time`) VALUES
(119, 2, 7, 'chu', 1, 1, '2020-04-22 21:14:09'),
(118, 2, 0, 'look', 1, 1, '2020-04-22 21:13:59'),
(117, 2, 7, 'lk', 1, 1, '2020-04-22 21:13:40'),
(116, 2, 0, 'tmm', 1, 1, '2020-04-22 21:13:21'),
(115, 2, 7, 'kifak', 1, 1, '2020-04-22 21:12:53'),
(114, 2, 7, 'hii', 1, 1, '2020-04-22 21:12:45');

-- --------------------------------------------------------

--
-- Table structure for table `chat_room`
--

DROP TABLE IF EXISTS `chat_room`;
CREATE TABLE IF NOT EXISTS `chat_room` (
  `chat_room_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(250) NOT NULL,
  PRIMARY KEY (`chat_room_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat_room`
--

INSERT INTO `chat_room` (`chat_room_id`, `student_id`) VALUES
(2, 7);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(250) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `author_name` varchar(100) NOT NULL,
  `cost` varchar(250) NOT NULL,
  `language` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=87 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `title`, `start_date`, `end_date`, `author_name`, `cost`, `language`) VALUES
(1, 'CMPS278', 'Computer Science 1', '2020-04-07', '2020-04-24', 'Bill Gates', '20', 'English'),
(2, 'CMPS 227', 'Programming', '2020-04-08', '2020-04-16', 'Bill Gates', '10', 'English'),
(86, 'CMPS 284', 'Programming 2', '2019-01-01', '2021-01-01', 'Bill Gates', '20', 'English');

-- --------------------------------------------------------

--
-- Table structure for table `courses_lectures`
--

DROP TABLE IF EXISTS `courses_lectures`;
CREATE TABLE IF NOT EXISTS `courses_lectures` (
  `id` int(250) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `course_id` varchar(250) NOT NULL,
  `path` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses_lectures`
--

INSERT INTO `courses_lectures` (`id`, `title`, `course_id`, `path`) VALUES
(1, 'addl', '1', 'lectures/lectures1/addl.php'),
(75, 'Lecture 2', '1', 'lectures/lectures1/sql');

-- --------------------------------------------------------

--
-- Table structure for table `course_enroll`
--

DROP TABLE IF EXISTS `course_enroll`;
CREATE TABLE IF NOT EXISTS `course_enroll` (
  `id` int(250) NOT NULL AUTO_INCREMENT,
  `course_id` varchar(250) NOT NULL,
  `student_id` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_enroll`
--

INSERT INTO `course_enroll` (`id`, `course_id`, `student_id`) VALUES
(40, '86', '7');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

DROP TABLE IF EXISTS `exams`;
CREATE TABLE IF NOT EXISTS `exams` (
  `exam_id` int(250) NOT NULL AUTO_INCREMENT,
  `lecture_id` varchar(250) NOT NULL,
  PRIMARY KEY (`exam_id`)
) ENGINE=MyISAM AUTO_INCREMENT=85 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`exam_id`, `lecture_id`) VALUES
(84, '1');

-- --------------------------------------------------------

--
-- Table structure for table `exam_questions`
--

DROP TABLE IF EXISTS `exam_questions`;
CREATE TABLE IF NOT EXISTS `exam_questions` (
  `id` int(250) NOT NULL AUTO_INCREMENT,
  `exam_id` varchar(250) NOT NULL,
  `question_id` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=86 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_questions`
--

INSERT INTO `exam_questions` (`id`, `exam_id`, `question_id`) VALUES
(85, '84', '65');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(250) NOT NULL AUTO_INCREMENT,
  `chat_room_id` int(250) NOT NULL,
  `sender_id` int(250) NOT NULL DEFAULT '0',
  `message` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

DROP TABLE IF EXISTS `profiles`;
CREATE TABLE IF NOT EXISTS `profiles` (
  `id` int(250) NOT NULL AUTO_INCREMENT,
  `student_id` int(200) NOT NULL,
  `picture` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `student_id`, `picture`) VALUES
(7, 7, '1587574717_ss.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(250) NOT NULL AUTO_INCREMENT,
  `description` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `answers` varchar(250) NOT NULL,
  `correct_answer` varchar(250) NOT NULL,
  `score` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `description`, `answers`, `correct_answer`, `score`) VALUES
(65, 'q1', 'a1,dwd', 'a1', '3');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `student_id` int(250) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id` varchar(100) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`student_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `username`, `email`, `password`, `id`, `status`) VALUES
(7, 'mohammadalloul', 'maa274@mail.aub.edu', '40700a8e80dc7ed630d4d9dd779d827b', '22222222', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

DROP TABLE IF EXISTS `tokens`;
CREATE TABLE IF NOT EXISTS `tokens` (
  `email` varchar(100) NOT NULL,
  `token` varchar(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`email`, `token`) VALUES
('maa274@mail.aub.edu', '27339');

-- --------------------------------------------------------

--
-- Table structure for table `user_chat_room_open`
--

DROP TABLE IF EXISTS `user_chat_room_open`;
CREATE TABLE IF NOT EXISTS `user_chat_room_open` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=123 DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
