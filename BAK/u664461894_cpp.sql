-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 18, 2020 at 08:08 AM
-- Server version: 10.4.15-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u664461894_cpp`
--

-- --------------------------------------------------------

--
-- Table structure for table `Accounts`
--

CREATE TABLE `Accounts` (
  `ID` varchar(16) NOT NULL,
  `Username` varchar(16) NOT NULL,
  `Password` varchar(128) NOT NULL,
  `Email` varchar(24) NOT NULL,
  `Privilege` enum('Admin','Tutor','Student','') NOT NULL DEFAULT 'Student'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Accounts`
--

INSERT INTO `Accounts` (`ID`, `Username`, `Password`, `Email`, `Privilege`) VALUES
('b4e8885219723c18', 'Ratman', '$argon2id$v=19$m=65536,t=4,p=1$SlExektiVTNKVjVlVjRQbg$jFIGCoSlH8Myhz0ek2NMOq1PRvJH31xGPR01xKVYSCI', 'mpartri2@kent.edu', 'Student'),
('decafc0ffeec0dee', 'Lmarchan', '$argon2id$v=19$m=65536,t=4,p=1$MHpuV1h4LnFVRTE2aHQvUw$pkURAiQwLyq60PXqT1VnyowgKC6t+Lnd8ruopa/puY8', 'lmarchan@kent.edu', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `Articles`
--

CREATE TABLE `Articles` (
  `Title` varchar(64) NOT NULL,
  `ArticleID` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Articles`
--

INSERT INTO `Articles` (`Title`, `ArticleID`) VALUES
('OpPrec and OrdOfEval', '470647ae7fceca44');

-- --------------------------------------------------------

--
-- Table structure for table `Comments`
--

CREATE TABLE `Comments` (
  `ID` varchar(16) NOT NULL,
  `ArticleID` varchar(16) NOT NULL,
  `EntryNum` int(11) NOT NULL,
  `ParentEntryNum` int(11) DEFAULT NULL,
  `Text` varchar(4096) NOT NULL,
  `Time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Comments`
--

INSERT INTO `Comments` (`ID`, `ArticleID`, `EntryNum`, `ParentEntryNum`, `Text`, `Time`) VALUES
('decafc0ffeec0dee', '470647ae7fceca44', 1, NULL, 'k', '2020-08-19 12:27:31'),
('decafc0ffeec0dee', '470647ae7fceca44', 16, NULL, 'Paragraph\r\n```#include <iostream>\r\nusing namespace std;\r\n\r\nint main()\r\n{\r\n    cout << \\\\\\\"Hello World\\\\\\\\n\\\\\\\" << \\\\\\\'C\\\\\\\' << endl; $var\r\n}', '2020-08-20 09:41:51'),
('decafc0ffeec0dee', '470647ae7fceca44', 17, NULL, 'Paragraph\r\n```#include <iostream>\r\nusing namespace std;\r\n\r\nint main()\r\n{\r\n    cout << \\\"Hello World\\\\n\\\" << \\\'C\\\' << endl; <p class=\\\'co-m\\\'>TEXT<p>\r\n}```', '2020-08-20 09:58:03'),
('decafc0ffeec0dee', '470647ae7fceca44', 18, NULL, '```#include <iostream>\r\nusing namespace std;\r\nint main() \r\n{\r\n    int x = 100;\r\n    cout << x << endl;\r\n    cout << \\\"Hello\\\" << $variable;\r\n}``` PARAGRAPH', '2020-08-20 23:13:39'),
('decafc0ffeec0dee', '470647ae7fceca44', 19, NULL, '```/* Check to ensure there are an even emount of opening and closing backticks (multiples of 2) */\r\nfunction checkBackticks($comment)\r\n{\r\n	$numOfBackticks = substr_count($comment, \\\"~~~\\\");\r\n	if($numOfBackticks % 2 === 0 && $numOfBackticks !== 0)\r\n		return TRUE;\r\n	else\r\n		return FALSE;\r\n}```', '2020-08-21 02:33:52'),
('decafc0ffeec0dee', '470647ae7fceca44', 20, NULL, '```$(\\\'textarea\\\').on(\\\'input\\\', function() {\r\n    $(this).css(\\\'height\\\', \\\"45px\\\");\r\n    $(this).css(\\\'height\\\', this.scrollHeight + \\\"px\\\");\r\n});```', '2020-08-21 10:08:13'),
('decafc0ffeec0dee', '470647ae7fceca44', 21, NULL, 'Database Entry', '2020-08-22 02:45:27'),
('decafc0ffeec0dee', '470647ae7fceca44', 28, 21, 'hi', '2020-08-22 23:47:51'),
('decafc0ffeec0dee', '470647ae7fceca44', 29, NULL, 'www', '2020-08-22 23:52:37'),
('decafc0ffeec0dee', '470647ae7fceca44', 30, 21, 'Another', '2020-08-23 00:43:48'),
('decafc0ffeec0dee', '470647ae7fceca44', 31, 30, 'Reply to Another', '2020-08-23 00:56:07'),
('decafc0ffeec0dee', '470647ae7fceca44', 32, 28, 'Reply to hi', '2020-08-23 00:56:21'),
('decafc0ffeec0dee', '470647ae7fceca44', 33, 28, 'Reply to hi', '2020-08-23 00:56:29'),
('decafc0ffeec0dee', '470647ae7fceca44', 34, 32, 'Reply to Reply to hi 32', '2020-08-23 00:56:44'),
('decafc0ffeec0dee', '470647ae7fceca44', 35, 31, '```ghytg```', '2020-08-23 01:58:09'),
('decafc0ffeec0dee', '470647ae7fceca44', 36, 35, 'Time Test', '2020-08-22 17:19:18'),
('b4e8885219723c18', '470647ae7fceca44', 37, 34, 'Reply to hi 34', '2020-08-23 00:02:02'),
('b4e8885219723c18', '470647ae7fceca44', 38, NULL, 'Is the quiz multiple choice? lol', '2020-08-23 00:03:43'),
('decafc0ffeec0dee', '470647ae7fceca44', 39, 29, 'Safari', '2020-08-23 15:00:04'),
('decafc0ffeec0dee', '470647ae7fceca44', 40, 16, 'Reply', '2020-08-23 15:29:17'),
('decafc0ffeec0dee', '470647ae7fceca44', 41, 38, 'Yes, Ratman. The quiz will be multiple choice to start out and I will add fill-ins at a later date.', '2020-09-08 19:28:45'),
('decafc0ffeec0dee', '470647ae7fceca44', 42, NULL, '<p>This should be text and NOT rendered HTML</p>\r\n<a href=\\\"www.google.com\\\">GOOGLE></a>\r\n<textarea placeholder=\\\"Enter bad HTML\\\"> </textarea>', '2020-11-07 18:41:09'),
('decafc0ffeec0dee', '470647ae7fceca44', 43, 17, 'Duplicate Comment Fail\r\n```\r\nensure code still works\r\n```', '2020-11-15 04:35:06');

-- --------------------------------------------------------

--
-- Table structure for table `ForgotPass`
--

CREATE TABLE `ForgotPass` (
  `ID` varchar(16) NOT NULL,
  `ResetExt` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Headers`
--

CREATE TABLE `Headers` (
  `Title` varchar(64) NOT NULL,
  `Description` varchar(128) NOT NULL,
  `Path` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Headers`
--

INSERT INTO `Headers` (`Title`, `Description`, `Path`) VALUES
('Code Generator', 'C++ Code Generator', '../'),
('CSI Topics', 'CSI Topics: Kent State Stark', '../'),
('Kpp Forgot PW', 'Kent State Stark Kpp Forgot Password', '../'),
('Kpp Login', 'Kent State Stark Kpp Login', '../'),
('Kpp Logout', 'Kent State Stark Kpp', '../'),
('Kpp Main Page', 'Kent State Stark Computer Science Supplement for C++', './'),
('Kpp Reset PW', 'Kent State Stark Kpp Reset PW', '../'),
('Kpp Signup', 'Kent State Stark Kpp Signup', '../'),
('OpPrec and OrdOfEval', 'C++ Operator Precedence and Order of Evaluation', '../');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Accounts`
--
ALTER TABLE `Accounts`
  ADD PRIMARY KEY (`ID`) USING BTREE,
  ADD UNIQUE KEY `Username` (`Username`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `Articles`
--
ALTER TABLE `Articles`
  ADD PRIMARY KEY (`ArticleID`),
  ADD KEY `Title` (`Title`);

--
-- Indexes for table `Comments`
--
ALTER TABLE `Comments`
  ADD PRIMARY KEY (`ArticleID`,`EntryNum`),
  ADD KEY `ID` (`ID`);

--
-- Indexes for table `ForgotPass`
--
ALTER TABLE `ForgotPass`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ResetExt` (`ResetExt`);

--
-- Indexes for table `Headers`
--
ALTER TABLE `Headers`
  ADD PRIMARY KEY (`Title`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Articles`
--
ALTER TABLE `Articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`Title`) REFERENCES `Headers` (`Title`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Comments`
--
ALTER TABLE `Comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `Accounts` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ForgotPass`
--
ALTER TABLE `ForgotPass`
  ADD CONSTRAINT `forgotpass_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `Accounts` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
