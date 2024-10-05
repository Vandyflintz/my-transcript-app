-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 10, 2022 at 06:20 AM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `transcript_proj`
--
CREATE DATABASE IF NOT EXISTS `transcript_proj` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `transcript_proj`;

-- --------------------------------------------------------

--
-- Table structure for table `academic_year_tab`
--

DROP TABLE IF EXISTS `academic_year_tab`;
CREATE TABLE IF NOT EXISTS `academic_year_tab` (
  `id` int NOT NULL AUTO_INCREMENT,
  `academic_year` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ay_id` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `academic_year_tab`
--

INSERT INTO `academic_year_tab` (`id`, `academic_year`, `ay_id`) VALUES
(2, 'ufCUNiqb2kt0vQVobQaTlQ==', 'wUJ4VOl8SzDp9GPYRHKUHirYSbHauL8Tq4j8uXxeQcQ=');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user_id`, `password`, `role`) VALUES
(1, 'gRe8kGiNzyDfO2apF9UH5Q==', '+lc/nMf4uJtezbEWPPs3aQ==', 'mgyIT4UHoxvE2+4sxQocnw==');

-- --------------------------------------------------------

--
-- Table structure for table `admission_basis`
--

DROP TABLE IF EXISTS `admission_basis`;
CREATE TABLE IF NOT EXISTS `admission_basis` (
  `id` int NOT NULL AUTO_INCREMENT,
  `admission_basis_id` varchar(500) NOT NULL,
  `admission_basis_name` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admission_basis`
--

INSERT INTO `admission_basis` (`id`, `admission_basis_id`, `admission_basis_name`) VALUES
(1, 'eXw6gN1FddwYpbKhmnn4QDWg/RiluJmfF6yHw+otHls=', '0MkmJ7fhPLhKSJMmg12FrQ=='),
(5, 'yay1hjzUYn3CP9vQA1RjSsnYHcMH2BpTw+ksNObdyNo=', 'iZme14deA5bxwRSyA0xkog=='),
(11, 'vVCjp8IcmuCDRxCi6s5qKqJ80oEP0qyBn/vnL2QM+k8=', 'e/O4qiikNLzm5/+BQwlhYA==');

-- --------------------------------------------------------

--
-- Table structure for table `assessments`
--

DROP TABLE IF EXISTS `assessments`;
CREATE TABLE IF NOT EXISTS `assessments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `assessment_name` varchar(100) NOT NULL,
  `assessment_id` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `class_tab`
--

DROP TABLE IF EXISTS `class_tab`;
CREATE TABLE IF NOT EXISTS `class_tab` (
  `id` int NOT NULL AUTO_INCREMENT,
  `course_id` varchar(100) NOT NULL,
  `section_id` varchar(100) NOT NULL,
  `time_id` varchar(100) NOT NULL,
  `lecturer_id` varchar(100) NOT NULL,
  `lecture_hall_id` varchar(100) NOT NULL,
  `class_id` varchar(100) NOT NULL,
  `day` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ay_id` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `class_tab`
--

INSERT INTO `class_tab` (`id`, `course_id`, `section_id`, `time_id`, `lecturer_id`, `lecture_hall_id`, `class_id`, `day`, `ay_id`) VALUES
(1, 'iDrTyGBF8biqkIMch0OSFA==', 'Y3r8mb9y3yqIR7Gc751g5VNv7gALgQtVMugdmaTPufg=', 'tWW1aHqsqbiIjRumnuCXfB+J+UuWvSwuhUQUsyzfMuU=', 'YRv8yCnti7py72MyGv6baw==', 'ahbvzuF38Cj6vgUmiEu98MDB3ssLP7wvK/3Qbo4KEDw=', 'wGqcyava+q9gVQL+pvK4yjVopVjmPi3HpbHX5lWobKU=', 'ue9c1RdqeiQmA3Xs/QfEIA==', 'REMTTdfUN5WO22BXS450/i3bCCSgyA9lHIeq8LgeNF8='),
(2, 'OoYF+l5bG9aJbOM+g8i1yw==', 'Y3r8mb9y3yqIR7Gc751g5VvE6Fa/VbuxGnnf4yJRIA8=', 'tWW1aHqsqbiIjRumnuCXfLE3UWojlMCM0FrMQ4l0Ets=', 'BRS9fSswkYZI2ts7ldQ8CQ==', 'JekTZUiBUluhGROTLnY3juRsq37bP5ubHh5Z/mGySYI=', 'THCDFYih4YDDyzatu/PUyBxEgbeSaV/1TymFiVTyakY=', 'sXc+nAvsS1eZMD30og/pMA==', 'REMTTdfUN5WO22BXS450/i3bCCSgyA9lHIeq8LgeNF8='),
(3, 'iDrTyGBF8biqkIMch0OSFA==', 'Y3r8mb9y3yqIR7Gc751g5bG+o2L+EYKScPIGNi8zs5c=', 'tWW1aHqsqbiIjRumnuCXfAVkcz9rExTrIpl0F1nGfuk=', 'MZSBZlb0tMXkGyK10k3qgw==', 'ahbvzuF38Cj6vgUmiEu98MDB3ssLP7wvK/3Qbo4KEDw=', '9xqJAxVpy7+r2zw8W51TAy3c2XZkfztYNkh+9pE0fB4=', '2prJwm+qA7yYbgYSS40rlw==', 'wUJ4VOl8SzDp9GPYRHKUHirYSbHauL8Tq4j8uXxeQcQ='),
(4, 'OoYF+l5bG9aJbOM+g8i1yw==', 'Y3r8mb9y3yqIR7Gc751g5VNv7gALgQtVMugdmaTPufg=', 'tWW1aHqsqbiIjRumnuCXfLE3UWojlMCM0FrMQ4l0Ets=', 'MZSBZlb0tMXkGyK10k3qgw==', 'ahbvzuF38Cj6vgUmiEu98MDB3ssLP7wvK/3Qbo4KEDw=', 'wGqcyava+q9gVQL+pvK4ys5/xKwgVAzsvBV6q4SyAiQ=', 'ue9c1RdqeiQmA3Xs/QfEIA==', 'wUJ4VOl8SzDp9GPYRHKUHirYSbHauL8Tq4j8uXxeQcQ='),
(5, 'seEL99iYrn1igdiP2/M55w==', 'Y3r8mb9y3yqIR7Gc751g5VvE6Fa/VbuxGnnf4yJRIA8=', 'tWW1aHqsqbiIjRumnuCXfB+J+UuWvSwuhUQUsyzfMuU=', 'MZSBZlb0tMXkGyK10k3qgw==', 'ahbvzuF38Cj6vgUmiEu98MDB3ssLP7wvK/3Qbo4KEDw=', 'wGqcyava+q9gVQL+pvK4yqDL7outVFcWRPkJZhzIJ1M=', 'ue9c1RdqeiQmA3Xs/QfEIA==', 'wUJ4VOl8SzDp9GPYRHKUHirYSbHauL8Tq4j8uXxeQcQ='),
(6, '8cQ3u1rT4JVkJHYWQsWMBg==', 'Y3r8mb9y3yqIR7Gc751g5VNv7gALgQtVMugdmaTPufg=', 'tWW1aHqsqbiIjRumnuCXfB+J+UuWvSwuhUQUsyzfMuU=', 'MZSBZlb0tMXkGyK10k3qgw==', 'ahbvzuF38Cj6vgUmiEu98MDB3ssLP7wvK/3Qbo4KEDw=', 'OlfeAccKOG835WRAJKzwh7+PfB4014EUyyYqFFWbb10=', 'DrJJppfdomIwR5NEX1dvjQ==', 'wUJ4VOl8SzDp9GPYRHKUHirYSbHauL8Tq4j8uXxeQcQ='),
(7, 'jFPHZ7DmnDDEdqpS0V/lEw==', 'Y3r8mb9y3yqIR7Gc751g5bG+o2L+EYKScPIGNi8zs5c=', 'tWW1aHqsqbiIjRumnuCXfLE3UWojlMCM0FrMQ4l0Ets=', 'BRS9fSswkYZI2ts7ldQ8CQ==', 'JekTZUiBUluhGROTLnY3juRsq37bP5ubHh5Z/mGySYI=', '9xqJAxVpy7+r2zw8W51TA0bufNeEpIoskSvWGee2HaM=', '2prJwm+qA7yYbgYSS40rlw==', 'wUJ4VOl8SzDp9GPYRHKUHirYSbHauL8Tq4j8uXxeQcQ='),
(8, '8qaviqMP3pDbrJTCO5PWWA==', 'Y3r8mb9y3yqIR7Gc751g5VNv7gALgQtVMugdmaTPufg=', 'tWW1aHqsqbiIjRumnuCXfLE3UWojlMCM0FrMQ4l0Ets=', 'BRS9fSswkYZI2ts7ldQ8CQ==', 'JekTZUiBUluhGROTLnY3juRsq37bP5ubHh5Z/mGySYI=', 'THCDFYih4YDDyzatu/PUyFup7jyCtfMoOD4geryufMo=', 'sXc+nAvsS1eZMD30og/pMA==', 'wUJ4VOl8SzDp9GPYRHKUHirYSbHauL8Tq4j8uXxeQcQ='),
(9, 'b78L8fK/9drrlKdQ0JcL3w==', 'Y3r8mb9y3yqIR7Gc751g5bG+o2L+EYKScPIGNi8zs5c=', 'tWW1aHqsqbiIjRumnuCXfLE3UWojlMCM0FrMQ4l0Ets=', 'BRS9fSswkYZI2ts7ldQ8CQ==', 'JekTZUiBUluhGROTLnY3juRsq37bP5ubHh5Z/mGySYI=', 'PsK2Rf6NcKMstfx9Y4jRBU+WH3PvcVeOGaX5rj1wxuQ=', 'v4KT7MiyKZvZjJr6YzT04Q==', 'wUJ4VOl8SzDp9GPYRHKUHirYSbHauL8Tq4j8uXxeQcQ='),
(10, '3JLubwo5sqQYwSMlsTy0qw==', 'Y3r8mb9y3yqIR7Gc751g5VNv7gALgQtVMugdmaTPufg=', 'tWW1aHqsqbiIjRumnuCXfAVkcz9rExTrIpl0F1nGfuk=', 'BRS9fSswkYZI2ts7ldQ8CQ==', 'JekTZUiBUluhGROTLnY3juRsq37bP5ubHh5Z/mGySYI=', 'vx/040y3SkIOjSe8OOFmFjTz6qK9JTyKILpuelWCHHk=', 'ogsyuqLRdyNTxI0pEToNDw==', 'wUJ4VOl8SzDp9GPYRHKUHirYSbHauL8Tq4j8uXxeQcQ='),
(11, 'A6o6jHEUoKPyJAFmOey/aQ==', 'Y3r8mb9y3yqIR7Gc751g5VvE6Fa/VbuxGnnf4yJRIA8=', 'tWW1aHqsqbiIjRumnuCXfAVkcz9rExTrIpl0F1nGfuk=', 'BRS9fSswkYZI2ts7ldQ8CQ==', 'JekTZUiBUluhGROTLnY3juRsq37bP5ubHh5Z/mGySYI=', 'PsK2Rf6NcKMstfx9Y4jRBVshfJukOIrhl3AUiuJqlNE=', 'v4KT7MiyKZvZjJr6YzT04Q==', 'wUJ4VOl8SzDp9GPYRHKUHirYSbHauL8Tq4j8uXxeQcQ='),
(12, '4NIifapsA9XudIGpCYeIdQ==', 'Y3r8mb9y3yqIR7Gc751g5VNv7gALgQtVMugdmaTPufg=', 'tWW1aHqsqbiIjRumnuCXfB+J+UuWvSwuhUQUsyzfMuU=', 'BRS9fSswkYZI2ts7ldQ8CQ==', 'JekTZUiBUluhGROTLnY3juRsq37bP5ubHh5Z/mGySYI=', 'SL0qOGKKP4uZUE2i+ZnxgW0wvtiGQt6F9GPLuLn68TA=', 'nWcYptsjyoDGqTvTyrdLQg==', 'wUJ4VOl8SzDp9GPYRHKUHirYSbHauL8Tq4j8uXxeQcQ='),
(13, 'MaRxoGMJ8+Rs1UCX8lAV1Q==', 'Y3r8mb9y3yqIR7Gc751g5bG+o2L+EYKScPIGNi8zs5c=', 'tWW1aHqsqbiIjRumnuCXfLE3UWojlMCM0FrMQ4l0Ets=', 'YRv8yCnti7py72MyGv6baw==', 'ahbvzuF38Cj6vgUmiEu98MDB3ssLP7wvK/3Qbo4KEDw=', 'wGqcyava+q9gVQL+pvK4yvKkVL6SIgJsT4gFNmkV6wU=', 'ue9c1RdqeiQmA3Xs/QfEIA==', 'wUJ4VOl8SzDp9GPYRHKUHirYSbHauL8Tq4j8uXxeQcQ='),
(14, '2Yuw7q9mc6mF/NVVlM4QMQ==', 'Y3r8mb9y3yqIR7Gc751g5bG+o2L+EYKScPIGNi8zs5c=', 'tWW1aHqsqbiIjRumnuCXfLE3UWojlMCM0FrMQ4l0Ets=', 'YRv8yCnti7py72MyGv6baw==', 'JekTZUiBUluhGROTLnY3juRsq37bP5ubHh5Z/mGySYI=', 'THCDFYih4YDDyzatu/PUyJvsXR8WH2hd0O/viwvb7NA=', 'sXc+nAvsS1eZMD30og/pMA==', 'wUJ4VOl8SzDp9GPYRHKUHirYSbHauL8Tq4j8uXxeQcQ='),
(15, 'Y0zhIYnXvx/UTfeNkBbcyw==', 'Y3r8mb9y3yqIR7Gc751g5bG+o2L+EYKScPIGNi8zs5c=', 'tWW1aHqsqbiIjRumnuCXfAVkcz9rExTrIpl0F1nGfuk=', 'YRv8yCnti7py72MyGv6baw==', 'JekTZUiBUluhGROTLnY3juRsq37bP5ubHh5Z/mGySYI=', 'THCDFYih4YDDyzatu/PUyHjMaxh7ZJ9tWn7hZihHWQ8=', 'sXc+nAvsS1eZMD30og/pMA==', 'wUJ4VOl8SzDp9GPYRHKUHirYSbHauL8Tq4j8uXxeQcQ='),
(16, 'zOOxRYNUkrsEf8OSD3eTHA==', 'Y3r8mb9y3yqIR7Gc751g5bG+o2L+EYKScPIGNi8zs5c=', 'tWW1aHqsqbiIjRumnuCXfB+J+UuWvSwuhUQUsyzfMuU=', 'YRv8yCnti7py72MyGv6baw==', 'ahbvzuF38Cj6vgUmiEu98MDB3ssLP7wvK/3Qbo4KEDw=', 'wGqcyava+q9gVQL+pvK4yjs834ysbjwCjP78s8XPP6Q=', 'ue9c1RdqeiQmA3Xs/QfEIA==', 'wUJ4VOl8SzDp9GPYRHKUHirYSbHauL8Tq4j8uXxeQcQ='),
(17, 'j+l9EZBowfknmumrHNEGEQ==', 'Y3r8mb9y3yqIR7Gc751g5VvE6Fa/VbuxGnnf4yJRIA8=', 'tWW1aHqsqbiIjRumnuCXfAVkcz9rExTrIpl0F1nGfuk=', 'YRv8yCnti7py72MyGv6baw==', 'JekTZUiBUluhGROTLnY3juRsq37bP5ubHh5Z/mGySYI=', 'THCDFYih4YDDyzatu/PUyCpzct5gRvTgaV4R0Y4PFDU=', 'sXc+nAvsS1eZMD30og/pMA==', 'wUJ4VOl8SzDp9GPYRHKUHirYSbHauL8Tq4j8uXxeQcQ='),
(18, 'LHU7ybK8mjdFCZ/X+ErgCQ==', 'Y3r8mb9y3yqIR7Gc751g5bG+o2L+EYKScPIGNi8zs5c=', 'tWW1aHqsqbiIjRumnuCXfAVkcz9rExTrIpl0F1nGfuk=', 'YRv8yCnti7py72MyGv6baw==', 'JekTZUiBUluhGROTLnY3juRsq37bP5ubHh5Z/mGySYI=', '9xqJAxVpy7+r2zw8W51TA2tofaj8nI26cM3yRB47z6g=', '2prJwm+qA7yYbgYSS40rlw==', 'wUJ4VOl8SzDp9GPYRHKUHirYSbHauL8Tq4j8uXxeQcQ='),
(19, 'gAkrc90nOoqJOaC1Y7WN7w==', 'Y3r8mb9y3yqIR7Gc751g5bG+o2L+EYKScPIGNi8zs5c=', 'tWW1aHqsqbiIjRumnuCXfAVkcz9rExTrIpl0F1nGfuk=', 'YRv8yCnti7py72MyGv6baw==', 'JekTZUiBUluhGROTLnY3juRsq37bP5ubHh5Z/mGySYI=', 'THCDFYih4YDDyzatu/PUyL1feubVUyuBPYkrijiVed4=', 'sXc+nAvsS1eZMD30og/pMA==', 'wUJ4VOl8SzDp9GPYRHKUHirYSbHauL8Tq4j8uXxeQcQ=');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name_of_course` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `course_id` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `credit_hours` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '1LN0ecnjrLzgYvYCwvZAXQ==',
  PRIMARY KEY (`id`),
  UNIQUE KEY `course_id` (`course_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name_of_course`, `course_id`, `credit_hours`) VALUES
(1, 'u+mp2ibDSwSQQWH6dQJYCNHZkRbhyvWgm/zTlxzaFbA=', 'iDrTyGBF8biqkIMch0OSFA==', '1LN0ecnjrLzgYvYCwvZAXQ=='),
(3, 'l04HjtHwC6pCKj/zIseYKrNA9GZVvYYqcYkeZ/MjrYI=', 'OoYF+l5bG9aJbOM+g8i1yw==', '1LN0ecnjrLzgYvYCwvZAXQ=='),
(4, 'NE8INDY1LDvT4C4bfdrtaoXOTHqLzMPsHAxhl3KgkDDSJ0wpLf6xlBAp4SdcSA1L', 'seEL99iYrn1igdiP2/M55w==', '1LN0ecnjrLzgYvYCwvZAXQ=='),
(5, 'NE8INDY1LDvT4C4bfdrtaoXOTHqLzMPsHAxhl3KgkDC4M4j+kUHl3uFNbJG5QPxf', '8cQ3u1rT4JVkJHYWQsWMBg==', '1LN0ecnjrLzgYvYCwvZAXQ=='),
(6, 'KfMewvzPV0qZTyb8oytwg+e7svbKFeyibUYZu6mccLk=', 'jFPHZ7DmnDDEdqpS0V/lEw==', '1LN0ecnjrLzgYvYCwvZAXQ=='),
(7, '0RWQE0P2Cc9bLeB8kQ4evAPhPc59R1BmD+5AeBbr59k=', '8qaviqMP3pDbrJTCO5PWWA==', '1LN0ecnjrLzgYvYCwvZAXQ=='),
(8, '1E7u6HH6caXdA3rg2z43wUm5jc+Jbxpiqt/+UjbrAnk=', 'b78L8fK/9drrlKdQ0JcL3w==', '1LN0ecnjrLzgYvYCwvZAXQ=='),
(9, 'Z4Q1gg4SgmiwfaFdvlvgAauLo+mIwQA8ip7qIqhlltvKPhVOFGBxuukUeHveZ3RD', '3JLubwo5sqQYwSMlsTy0qw==', '1LN0ecnjrLzgYvYCwvZAXQ=='),
(10, 'ady6CD5OACfUJI31TV5oOA4txHwHLphD3GPsI2hg8Sl+SXwhsvLYcqR3cxG8qW2X', 'A6o6jHEUoKPyJAFmOey/aQ==', '1LN0ecnjrLzgYvYCwvZAXQ=='),
(11, 'O+W6Ne+yx/njjVdpbQgWuUhPbVl6GfZLaSpgm1DaP50=', '4NIifapsA9XudIGpCYeIdQ==', '1LN0ecnjrLzgYvYCwvZAXQ=='),
(12, 'VvfZEs6H1Svi+KIJz67H5kNVDmWA5ysK6HkkzT6dpII=', 'MaRxoGMJ8+Rs1UCX8lAV1Q==', '1LN0ecnjrLzgYvYCwvZAXQ=='),
(13, 'oYmLeREKADfSlmMQh5rJKTPU4+1CFjb0vWo//uzrwTo=', '2Yuw7q9mc6mF/NVVlM4QMQ==', '1LN0ecnjrLzgYvYCwvZAXQ=='),
(14, 'oYmLeREKADfSlmMQh5rJKcEP25Y3V4jExAnGjBQCkWE=', 'Y0zhIYnXvx/UTfeNkBbcyw==', '1LN0ecnjrLzgYvYCwvZAXQ=='),
(15, 'GghLwNPStO9DSw7is947y5p7xx4Gjw+V7DRjGUBaNP4=', 'zOOxRYNUkrsEf8OSD3eTHA==', '1LN0ecnjrLzgYvYCwvZAXQ=='),
(16, 'ZLnmPDUrY1nnVp3BVB+nvA==', 'j+l9EZBowfknmumrHNEGEQ==', '1LN0ecnjrLzgYvYCwvZAXQ=='),
(17, 'cGZUKvuvyGN4VUCsk8TbDA==', 'LHU7ybK8mjdFCZ/X+ErgCQ==', '1LN0ecnjrLzgYvYCwvZAXQ=='),
(18, '6n0wT3QacmuTXqF1+OosVQ==', 'gAkrc90nOoqJOaC1Y7WN7w==', '1LN0ecnjrLzgYvYCwvZAXQ==');

-- --------------------------------------------------------

--
-- Table structure for table `current_academic_year`
--

DROP TABLE IF EXISTS `current_academic_year`;
CREATE TABLE IF NOT EXISTS `current_academic_year` (
  `id` int NOT NULL AUTO_INCREMENT,
  `academic_year` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `current_academic_year`
--

INSERT INTO `current_academic_year` (`id`, `academic_year`) VALUES
(1, 'ufCUNiqb2kt0vQVobQaTlQ==');

-- --------------------------------------------------------

--
-- Table structure for table `days_tab`
--

DROP TABLE IF EXISTS `days_tab`;
CREATE TABLE IF NOT EXISTS `days_tab` (
  `id` int NOT NULL AUTO_INCREMENT,
  `day_name` varchar(500) NOT NULL,
  `day_id` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `debit_and_credit`
--

DROP TABLE IF EXISTS `debit_and_credit`;
CREATE TABLE IF NOT EXISTS `debit_and_credit` (
  `id` int NOT NULL AUTO_INCREMENT,
  `student_id` varchar(500) NOT NULL,
  `date_of_activity` varchar(500) NOT NULL,
  `reason` varchar(500) NOT NULL,
  `amount` varchar(500) NOT NULL,
  `transaction_type` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `debit_and_credit`
--

INSERT INTO `debit_and_credit` (`id`, `student_id`, `date_of_activity`, `reason`, `amount`, `transaction_type`) VALUES
(2, 'rRB/Mgb0SflEMdoNY2cSig==', 'JqNrYUoytX+FtGNigSuXXg==', 'OCIVJNCXXppRgLUFQJJKPA==', '8BDSkU8S82z/RDlXeJESwA==', 'i3OIPOaR7sNt/ZX9n3QFgw=='),
(3, 'rRB/Mgb0SflEMdoNY2cSig==', 'JqNrYUoytX+FtGNigSuXXg==', 'WXc2D51CuBOHdr4m4LgP2g==', 'N/FOF+2wXcVSSjA2wABWGA==', 'LVc+9/tYyWB9Mw8AlB7K1A=='),
(4, 'rRB/Mgb0SflEMdoNY2cSig==', 'JqNrYUoytX+FtGNigSuXXg==', 'cEDtMqpoiyqmObDHVV6miOXZ8XSkV4bWFxACbUAgDis=', 'yaR+F8nIKGGBxOnZfbLaMA==', 'LVc+9/tYyWB9Mw8AlB7K1A==');

-- --------------------------------------------------------

--
-- Table structure for table `departments_tab`
--

DROP TABLE IF EXISTS `departments_tab`;
CREATE TABLE IF NOT EXISTS `departments_tab` (
  `id` int NOT NULL AUTO_INCREMENT,
  `department_name` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `department_id` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `departments_tab`
--

INSERT INTO `departments_tab` (`id`, `department_name`, `department_id`) VALUES
(1, 'B4cjxI0kTCE394w3ikSEymiYU4h5zzhbsa2aduVJDYk=', '0XpMISM75gMVG8KFoCvzXaOzLuhS4dGTsUi5FHGMoSQ='),
(5, 'FA8n8Ptu1qI57jEGq+O83xwDSkR2RsGLdRs8l2vNEPQ=', 'IxovWQ9eHysFxF+ZS2VHQ/UwfVro559v2LykCzYCnqo='),
(6, 'AsyqFSzcbHxUeFp0hW7E5RPh7ByzZtujlOrtyd5sTas=', 's6IIg8t++639zA75JlSQyiCXab4k2ydJ9+Iy9Lwt/8o='),
(7, 'K9TwKzbM2HppOx0Wbt4qqEm5jc+Jbxpiqt/+UjbrAnk=', 'h/ghhMqr202a1xU49lw6eqbpPOtLDw2l/2kNL2F0mq4=');

-- --------------------------------------------------------

--
-- Table structure for table `lecturer_tab`
--

DROP TABLE IF EXISTS `lecturer_tab`;
CREATE TABLE IF NOT EXISTS `lecturer_tab` (
  `id` int NOT NULL AUTO_INCREMENT,
  `lec_fname` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `lec_lname` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `lec_title` varchar(100) NOT NULL,
  `dob` varchar(500) NOT NULL,
  `lec_id` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `lec_depid` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `lec_img` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `lec_email_address` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `lec_phonenum` varchar(100) NOT NULL,
  `lec_password` varchar(500) NOT NULL,
  `role` varchar(500) NOT NULL DEFAULT 'VD0wR8iUEUD/Sqvy+Tq+pA==',
  `status` varchar(500) NOT NULL,
  `userpin` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `lecturer_tab`
--

INSERT INTO `lecturer_tab` (`id`, `lec_fname`, `lec_lname`, `lec_title`, `dob`, `lec_id`, `lec_depid`, `lec_img`, `lec_email_address`, `lec_phonenum`, `lec_password`, `role`, `status`, `userpin`) VALUES
(1, '6G6gaq3RonO05l1O/84H/g==', 'w385Pjab9H+1+ZqLyHp1OQ==', 'mzrbhhklCfB4JgRWSuJ7RQ==', 'nbIjDB29WPXq13CqXUZXhg==', 'BRS9fSswkYZI2ts7ldQ8CQ==', '0XpMISM75gMVG8KFoCvzXaOzLuhS4dGTsUi5FHGMoSQ=', '7RdUhRkWNgOBNG0xwq6zEJXzouK/fAz/U+dAIfMHRSAbuf1hNA4TyNZ0QaiY7npf', '0ZS6FrPjDf88/PmxNTzf+w==', '0idMKS3+sZQQKeEnXEgNSw==', 'xbp1+yxq8xwGYYZrVIwB/Q==', 'VD0wR8iUEUD/Sqvy+Tq+pA==', '2M5J2U6FpMQhGEPyBHHyKw==', ''),
(2, 'ISwSw/BI7USq7wIrHJZdUg==', '9xmYP958xeGZC2aJtOMsCA==', 'LuzGxojXATphtAgnzRXJJQ==', 'xoJgfcNtxux2K4rMXqaKOg==', 'YRv8yCnti7py72MyGv6baw==', 'IxovWQ9eHysFxF+ZS2VHQ/UwfVro559v2LykCzYCnqo=', 'mqx1DDChSBSFXHea9WrKF/SgflUhv4myVMIKvYNSqWobuf1hNA4TyNZ0QaiY7npf', 'qDxHlV5M7CnWEgHzmbQesoQCQebwIPJvM5xWzovYZxU=', '0idMKS3+sZQQKeEnXEgNSw==', 'xbp1+yxq8xwGYYZrVIwB/Q==', 'VD0wR8iUEUD/Sqvy+Tq+pA==', '2M5J2U6FpMQhGEPyBHHyKw==', ''),
(3, '9emqonqLmILgXUyatCOhbQ==', 'r821YIU/Ea7tSkdeP1Tl/Q==', 'zWjG1Zv6ThjkzUg/CenEng==', 'JYFDMD7MNwV2vGaOkhLw+A==', 'MZSBZlb0tMXkGyK10k3qgw==', 's6IIg8t++639zA75JlSQyiCXab4k2ydJ9+Iy9Lwt/8o=', 'Lup7+6CCmqG4lCf4XwBbS5q01j8G2qc65EUQbp6Mwxobuf1hNA4TyNZ0QaiY7npf', 'CHBWfRk3acqY03LJIgtFwQ==', '0idMKS3+sZQQKeEnXEgNSw==', 'vPS0+M35Zrk+b0A+e5A1TQ==', 'VD0wR8iUEUD/Sqvy+Tq+pA==', '2M5J2U6FpMQhGEPyBHHyKw==', 'aXU7nSfq72AaF+ZQ7hz4zg==');

-- --------------------------------------------------------

--
-- Table structure for table `lecture_hall_tab`
--

DROP TABLE IF EXISTS `lecture_hall_tab`;
CREATE TABLE IF NOT EXISTS `lecture_hall_tab` (
  `id` int NOT NULL AUTO_INCREMENT,
  `lecture_hall_name` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `lecture_hall_id` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `lecture_hall_tab`
--

INSERT INTO `lecture_hall_tab` (`id`, `lecture_hall_name`, `lecture_hall_id`) VALUES
(1, 'jII/t0XTHoie31gdRGxX/w==', 'ahbvzuF38Cj6vgUmiEu98MDB3ssLP7wvK/3Qbo4KEDw='),
(2, 'GW7cck+gVuVmzYvb6PRC7Q==', 'JekTZUiBUluhGROTLnY3juRsq37bP5ubHh5Z/mGySYI=');

-- --------------------------------------------------------

--
-- Table structure for table `level_tab`
--

DROP TABLE IF EXISTS `level_tab`;
CREATE TABLE IF NOT EXISTS `level_tab` (
  `id` int NOT NULL AUTO_INCREMENT,
  `level_name` varchar(100) NOT NULL,
  `level_id` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

DROP TABLE IF EXISTS `marks`;
CREATE TABLE IF NOT EXISTS `marks` (
  `id` int NOT NULL AUTO_INCREMENT,
  `assessment` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `student_id` varchar(100) NOT NULL,
  `marks_got` varchar(100) NOT NULL,
  `total_marks` varchar(500) NOT NULL,
  `class_id` varchar(100) NOT NULL,
  `level` varchar(500) NOT NULL,
  `semester` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`id`, `assessment`, `student_id`, `marks_got`, `total_marks`, `class_id`, `level`, `semester`) VALUES
(1, 'Quiz', 'mMSZ2cbCvU5pkijO99CaLQ==', '8', '10', '9xqJAxVpy7+r2zw8W51TAy3c2XZkfztYNkh+9pE0fB4=', '100', 'First'),
(2, 'Quiz', 'mMSZ2cbCvU5pkijO99CaLQ==', '9', '10', '9xqJAxVpy7+r2zw8W51TAy3c2XZkfztYNkh+9pE0fB4=', '100', 'First'),
(3, 'Project Work', 'mMSZ2cbCvU5pkijO99CaLQ==', '25', '30', '9xqJAxVpy7+r2zw8W51TAy3c2XZkfztYNkh+9pE0fB4=', '100', 'First'),
(4, 'Mid Semester Exams', 'mMSZ2cbCvU5pkijO99CaLQ==', '32', '40', '9xqJAxVpy7+r2zw8W51TAy3c2XZkfztYNkh+9pE0fB4=', '100', 'First'),
(5, 'End of Semester Exams', 'mMSZ2cbCvU5pkijO99CaLQ==', '78', '100', '9xqJAxVpy7+r2zw8W51TAy3c2XZkfztYNkh+9pE0fB4=', '100', 'First'),
(6, 'Quiz', 'mMSZ2cbCvU5pkijO99CaLQ==', '10', '10', 'wGqcyava+q9gVQL+pvK4ys5/xKwgVAzsvBV6q4SyAiQ=', '100', 'First'),
(7, 'Quiz', 'mMSZ2cbCvU5pkijO99CaLQ==', '8', '10', 'wGqcyava+q9gVQL+pvK4ys5/xKwgVAzsvBV6q4SyAiQ=', '100', 'First'),
(8, 'Group Work', 'mMSZ2cbCvU5pkijO99CaLQ==', '16', '20', 'wGqcyava+q9gVQL+pvK4ys5/xKwgVAzsvBV6q4SyAiQ=', '100', 'First'),
(9, 'Mid Semester Exams', 'mMSZ2cbCvU5pkijO99CaLQ==', '35', '40', 'wGqcyava+q9gVQL+pvK4ys5/xKwgVAzsvBV6q4SyAiQ=', '100', 'First'),
(10, 'End of Semester Exams', 'mMSZ2cbCvU5pkijO99CaLQ==', '80', '100', 'wGqcyava+q9gVQL+pvK4ys5/xKwgVAzsvBV6q4SyAiQ=', '100', 'First'),
(11, 'Quiz', 'mMSZ2cbCvU5pkijO99CaLQ==', '6', '10', 'wGqcyava+q9gVQL+pvK4yqDL7outVFcWRPkJZhzIJ1M=', '100', 'Second'),
(12, 'Quiz', 'mMSZ2cbCvU5pkijO99CaLQ==', '8', '10', 'wGqcyava+q9gVQL+pvK4yqDL7outVFcWRPkJZhzIJ1M=', '100', 'Second'),
(13, 'Mid Semester Exams', 'mMSZ2cbCvU5pkijO99CaLQ==', '22', '40', 'wGqcyava+q9gVQL+pvK4yqDL7outVFcWRPkJZhzIJ1M=', '100', 'Second'),
(14, 'End of Semester Exams', 'mMSZ2cbCvU5pkijO99CaLQ==', '78', '100', 'wGqcyava+q9gVQL+pvK4yqDL7outVFcWRPkJZhzIJ1M=', '100', 'Second'),
(15, 'Quiz', 'mMSZ2cbCvU5pkijO99CaLQ==', '9', '10', 'OlfeAccKOG835WRAJKzwh7+PfB4014EUyyYqFFWbb10=', '100', 'Second'),
(16, 'Quiz', 'mMSZ2cbCvU5pkijO99CaLQ==', '10', '10', 'OlfeAccKOG835WRAJKzwh7+PfB4014EUyyYqFFWbb10=', '100', 'Second'),
(17, 'Quiz', 'mMSZ2cbCvU5pkijO99CaLQ==', '15', '40', 'OlfeAccKOG835WRAJKzwh7+PfB4014EUyyYqFFWbb10=', '100', 'Second'),
(18, 'End of Semester Exams', 'mMSZ2cbCvU5pkijO99CaLQ==', '85', '100', 'OlfeAccKOG835WRAJKzwh7+PfB4014EUyyYqFFWbb10=', '100', 'Second');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sender` varchar(1000) NOT NULL,
  `receipient` varchar(1000) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `messagetype` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'tV39VJ6QhTo+2084WRfVlA==',
  `submessage` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `rec_status` varchar(1000) NOT NULL,
  `send_status` varchar(1000) NOT NULL,
  `timeofmsg` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender`, `receipient`, `message`, `messagetype`, `submessage`, `rec_status`, `send_status`, `timeofmsg`) VALUES
(4, 'mMSZ2cbCvU5pkijO99CaLQ==', 'rlN6h91v3gwVvFoeGiipTA==', 'ZxFCSEpm8b8SxSMvzlw+8g==', 'tV39VJ6QhTo+2084WRfVlA==', '', 'GTQbS0gGRDCjXnLgBavPPw==', '2M5J2U6FpMQhGEPyBHHyKw==', '2022-06-09 09:38:53'),
(5, 'mMSZ2cbCvU5pkijO99CaLQ==', 'EbCKJLzu9Gn8a3wnOL685w==', '5DdAr06jPCjI9Hj5HS5n6w==', 'tV39VJ6QhTo+2084WRfVlA==', '', '2M5J2U6FpMQhGEPyBHHyKw==', '2M5J2U6FpMQhGEPyBHHyKw==', '2022-06-09 21:19:40'),
(6, 'EbCKJLzu9Gn8a3wnOL685w==', 'mMSZ2cbCvU5pkijO99CaLQ==', 'hN9ivHgEvYT4zTthHTWqSg==', 'tV39VJ6QhTo+2084WRfVlA==', '', 'GTQbS0gGRDCjXnLgBavPPw==', '2M5J2U6FpMQhGEPyBHHyKw==', '2022-06-09 22:52:55'),
(7, 'EbCKJLzu9Gn8a3wnOL685w==', 'mMSZ2cbCvU5pkijO99CaLQ==', 'lhSKIDGTqAl5UfBNtW4XqfJoAj8m0QEysC123zPcdxs=', 'tV39VJ6QhTo+2084WRfVlA==', '0idMKS3+sZQQKeEnXEgNSw==', 'GTQbS0gGRDCjXnLgBavPPw==', '', '2022-06-10 06:10:53'),
(8, '0idMKS3+sZQQKeEnXEgNSw==', 'mMSZ2cbCvU5pkijO99CaLQ==', 'lhSKIDGTqAl5UfBNtW4XqfJoAj8m0QEysC123zPcdxs=', 'tV39VJ6QhTo+2084WRfVlA==', '0idMKS3+sZQQKeEnXEgNSw==', 'GTQbS0gGRDCjXnLgBavPPw==', '', '2022-06-10 06:17:02');

-- --------------------------------------------------------

--
-- Table structure for table `programme`
--

DROP TABLE IF EXISTS `programme`;
CREATE TABLE IF NOT EXISTS `programme` (
  `id` int NOT NULL AUTO_INCREMENT,
  `programme_name` varchar(500) NOT NULL,
  `programme_code` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `programme`
--

INSERT INTO `programme` (`id`, `programme_name`, `programme_code`) VALUES
(8, 'jzHafC77VimwIBu6CL5lQi8MiK4bDIYmWhPUkAX8d8M=', 'nyuOqHaL+oV+ASs3+7ZK6QiJz11PAbbbdhZl6kwv2Oc='),
(9, '4AePXTLUiOCirA43QXCK8w==', 'BPFJZcWjNaXoIqem6bOG0ijDvaPrb8Uy65aJ4Xzs30U=');

-- --------------------------------------------------------

--
-- Table structure for table `programme_type`
--

DROP TABLE IF EXISTS `programme_type`;
CREATE TABLE IF NOT EXISTS `programme_type` (
  `id` int NOT NULL AUTO_INCREMENT,
  `programme_type_id` varchar(500) NOT NULL,
  `programme_type_name` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `programme_type`
--

INSERT INTO `programme_type` (`id`, `programme_type_id`, `programme_type_name`) VALUES
(1, 'j4eipMemgfopNbngoqs6dA==', '5AZnByaWG6AoEeoBOjlp8AjB8QcCLQ22pBsRwqjEWsA='),
(2, 'Yq94wR82K9856PcVYjOWhA==', 'j+uy7dGU6AWVbSIgKiT6sQ=='),
(3, 'jyarUycMdvj+vozgvpxEuQ==', '6yPsvKFVh/sVDEOgosEy4Q==');

-- --------------------------------------------------------

--
-- Table structure for table `registration_table`
--

DROP TABLE IF EXISTS `registration_table`;
CREATE TABLE IF NOT EXISTS `registration_table` (
  `id` int NOT NULL AUTO_INCREMENT,
  `student_id` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `level_id` varchar(100) NOT NULL,
  `semester_id` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `class_id` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `section_tab`
--

DROP TABLE IF EXISTS `section_tab`;
CREATE TABLE IF NOT EXISTS `section_tab` (
  `id` int NOT NULL AUTO_INCREMENT,
  `section_name` varchar(100) NOT NULL,
  `section_id` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `section_name` (`section_name`),
  UNIQUE KEY `section_name_2` (`section_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `section_tab`
--

INSERT INTO `section_tab` (`id`, `section_name`, `section_id`) VALUES
(1, '1JHK3gdITogobgaD5pljpw==', 'Y3r8mb9y3yqIR7Gc751g5VNv7gALgQtVMugdmaTPufg='),
(2, 'lQ4AIyOwnFdGOSFl3PJU9Q==', 'Y3r8mb9y3yqIR7Gc751g5bG+o2L+EYKScPIGNi8zs5c='),
(3, 'CMAlVJzH8baYFGIZXI3BwA==', 'Y3r8mb9y3yqIR7Gc751g5VvE6Fa/VbuxGnnf4yJRIA8=');

-- --------------------------------------------------------

--
-- Table structure for table `semester_tab`
--

DROP TABLE IF EXISTS `semester_tab`;
CREATE TABLE IF NOT EXISTS `semester_tab` (
  `id` int NOT NULL AUTO_INCREMENT,
  `semester_id` varchar(100) NOT NULL,
  `semester_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `semester_tab`
--

INSERT INTO `semester_tab` (`id`, `semester_id`, `semester_name`) VALUES
(1, 'mcgfaSTXq8mR2fs/NrZBLDIxgePuEcwH+LveFxxulWU=', 'HWJihLjQiQw2PCB7ElpnoA=='),
(2, 'qISnVtWABtkqfHwJBRdsXTIxgePuEcwH+LveFxxulWU=', '2sb6VyaiEKeMjuoAsRfsDg==');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` int NOT NULL AUTO_INCREMENT,
  `service` varchar(500) NOT NULL,
  `cost` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service`, `cost`) VALUES
(1, 'hk9KtoeK4qVjgcqlUfMuAA==', 'b/Z28yiR4ZtarY7q5U886g==');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(500) NOT NULL,
  `lastname` varchar(500) NOT NULL,
  `title` varchar(500) NOT NULL,
  `dob` varchar(500) NOT NULL,
  `date_of_admission` varchar(500) NOT NULL,
  `name_and_address_of_parent_or_guardian` varchar(500) NOT NULL,
  `gender` varchar(500) NOT NULL,
  `image` varchar(500) NOT NULL,
  `basis_of_admission` varchar(500) NOT NULL,
  `programme_type` varchar(500) NOT NULL,
  `major_prog` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `department` varchar(500) NOT NULL,
  `minor_prog` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `date_of_qualification_conferred` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `student_id` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `status` varchar(500) NOT NULL,
  `grole` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '2Pno/mfWLM5ZUOoct1WOoQ==',
  `userpin` varchar(500) NOT NULL,
  `ay_id` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `firstname`, `lastname`, `title`, `dob`, `date_of_admission`, `name_and_address_of_parent_or_guardian`, `gender`, `image`, `basis_of_admission`, `programme_type`, `major_prog`, `department`, `minor_prog`, `date_of_qualification_conferred`, `student_id`, `password`, `status`, `grole`, `userpin`, `ay_id`) VALUES
(1, 'bP4GBK3CfIa1d/gKc3tHpg==', '6iui2ZtmmQsxf0JNiMLQyg==', 'mzrbhhklCfB4JgRWSuJ7RQ==', '48C8LlN/Ogq6Cm4VEE4vlw==', 'iUKhW0o16g+OtWHKkTDrHg==', 'ui4tUg6qiJl+urpYRyAHbBUQiQyLT1c0XctD+d4O7gZDer+EVbEOlSPbC3q2eHp9UJtQmMWUoHincFI2bYCaiQ==', 'f+OMMvxGfLRNvNaTDHrHog==', 'HjD1qz0cKTSWWcu0hO18AnP71CeDuZ7z/vg6WNLRy8Mbuf1hNA4TyNZ0QaiY7npf', 'eXw6gN1FddwYpbKhmnn4QDWg/RiluJmfF6yHw+otHls=', 'j4eipMemgfopNbngoqs6dA==', 'nyuOqHaL+oV+ASs3+7ZK6QiJz11PAbbbdhZl6kwv2Oc=', '', '0idMKS3+sZQQKeEnXEgNSw==', '', 'mMSZ2cbCvU5pkijO99CaLQ==', 'z1pbHwkbaf/XouBczas8ww==', '2M5J2U6FpMQhGEPyBHHyKw==', '2Pno/mfWLM5ZUOoct1WOoQ==', 'A5DJwxP9kFZn9LO3WnKkww==', ''),
(2, 'glfbbQMNhbqpDBwrxKeIrA==', 'QZCMVB6NhQqcNm5GK1R5uw==', 'LuzGxojXATphtAgnzRXJJQ==', 'mDe+E0W+hQuaGK8i3NuckQ==', 'bam5XA8F4OFL9Q8EvNmjHQ==', 'LKpWuvMFQLHULrLcow5xd4BH6m+NzGR45NKJhMWe6NblCv4sdSC1DPRstwj7si2A', '+bm7qZ5Adm8WgewBf00+2w==', 'qaDDz1DEW/TaOjL/FZAWiIDQ3iUOe5AnqYHHxP6EWr4buf1hNA4TyNZ0QaiY7npf', 'eXw6gN1FddwYpbKhmnn4QDWg/RiluJmfF6yHw+otHls=', 'jyarUycMdvj+vozgvpxEuQ==', 'BPFJZcWjNaXoIqem6bOG0ijDvaPrb8Uy65aJ4Xzs30U=', '', '0idMKS3+sZQQKeEnXEgNSw==', '', 'rRB/Mgb0SflEMdoNY2cSig==', 'zw4wjJ7uilF0ULQMOQ/kZQ==', '2M5J2U6FpMQhGEPyBHHyKw==', '2Pno/mfWLM5ZUOoct1WOoQ==', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `student_finance`
--

DROP TABLE IF EXISTS `student_finance`;
CREATE TABLE IF NOT EXISTS `student_finance` (
  `id` int NOT NULL AUTO_INCREMENT,
  `student_id` varchar(100) NOT NULL,
  `amt_remaining` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `student_finance`
--

INSERT INTO `student_finance` (`id`, `student_id`, `amt_remaining`) VALUES
(2, 'rRB/Mgb0SflEMdoNY2cSig==', 'BPGN/SqCNjbCrDRRKjW/PA=='),
(3, 'mMSZ2cbCvU5pkijO99CaLQ==', 'APQTszbSfdf+djHDkQFHPw==');

-- --------------------------------------------------------

--
-- Table structure for table `time_tab`
--

DROP TABLE IF EXISTS `time_tab`;
CREATE TABLE IF NOT EXISTS `time_tab` (
  `id` int NOT NULL AUTO_INCREMENT,
  `time_interval` varchar(100) NOT NULL,
  `time_id` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `time_tab`
--

INSERT INTO `time_tab` (`id`, `time_interval`, `time_id`) VALUES
(1, 'dTaL9A0SV7afJrpQ+gjTpNInTCkt/rGUECnhJ1xIDUs=', 'tWW1aHqsqbiIjRumnuCXfAVkcz9rExTrIpl0F1nGfuk='),
(2, 'LxvS4BR/HuDmnBHjnAsjBg==', 'tWW1aHqsqbiIjRumnuCXfB+J+UuWvSwuhUQUsyzfMuU='),
(3, 'qZqvwVm/RKQpTSradJxo1g==', 'tWW1aHqsqbiIjRumnuCXfLE3UWojlMCM0FrMQ4l0Ets=');

-- --------------------------------------------------------

--
-- Table structure for table `transcript_requests`
--

DROP TABLE IF EXISTS `transcript_requests`;
CREATE TABLE IF NOT EXISTS `transcript_requests` (
  `id` int NOT NULL AUTO_INCREMENT,
  `student_id` varchar(100) NOT NULL,
  `date_applied` varchar(500) NOT NULL,
  `status` varchar(100) NOT NULL,
  `tfile` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transcript_requests`
--

INSERT INTO `transcript_requests` (`id`, `student_id`, `date_applied`, `status`, `tfile`) VALUES
(2, 'mMSZ2cbCvU5pkijO99CaLQ==', 'EQC/hDxEz/juV1rO+qbMyw==', 'KHc3yo6Uyv1eXdpJSTCkuA==', 'nlTtUr1VJBJmKCCO7Fv60B9bo4W8QsRoo/uf718USp0='),
(9, 'mMSZ2cbCvU5pkijO99CaLQ==', 'CrodVnORn93d8HnM0LIzxw==', 'KHc3yo6Uyv1eXdpJSTCkuA==', 'nlTtUr1VJBJmKCCO7Fv60B9bo4W8QsRoo/uf718USp0='),
(10, 'mMSZ2cbCvU5pkijO99CaLQ==', 'CrodVnORn93d8HnM0LIzxw==', 'KHc3yo6Uyv1eXdpJSTCkuA==', 'nlTtUr1VJBJmKCCO7Fv60B9bo4W8QsRoo/uf718USp0=');

-- --------------------------------------------------------

--
-- Table structure for table `work_admins`
--

DROP TABLE IF EXISTS `work_admins`;
CREATE TABLE IF NOT EXISTS `work_admins` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `lastname` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `title` varchar(100) NOT NULL,
  `admin_id` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `image` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `role` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'KKSsj5UVbb6y++e5sI40ZA==',
  `email_address` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `contact` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `grole` varchar(100) NOT NULL,
  `userpin` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `work_admins`
--

INSERT INTO `work_admins` (`id`, `firstname`, `lastname`, `title`, `admin_id`, `password`, `image`, `role`, `email_address`, `contact`, `status`, `grole`, `userpin`) VALUES
(1, 'b1NV/PX/FTdi7HJQQbBesg==', 'gzslknabRVcCjTL26UzvNg==', 'SfsaasOVu49J1Syf0AuOSw==', 'EbCKJLzu9Gn8a3wnOL685w==', 'z1pbHwkbaf/XouBczas8ww==', 'fKYE5CN+5PvQPlvOuCkWyyWt9orC9R8o5so2hYWkcO4buf1hNA4TyNZ0QaiY7npf', 'KKSsj5UVbb6y++e5sI40ZA==', 'MSenAtthqU6fgfMigsK8F921NsFDUAjmK+yuVCUMIUQ=', 'kT2FWlqslCm43ji5pppmFA==', '2M5J2U6FpMQhGEPyBHHyKw==', '', 'L28cloVNxE57UBAcH2yKNQ=='),
(2, 'Kebew50ojCKdJ8HwVexEGw==', 'w6WIeFbRRIxc3nd6fEmAvg==', 'LuzGxojXATphtAgnzRXJJQ==', '8EaKpwRFU9oAzn8VNeYvlw==', 'kjgxyok17jCB4pOk2eVGIw==', 'Ryj/i2JoTnWSSUm4iBanRl5CW+GXFGgdTwn1I5sh7VAbuf1hNA4TyNZ0QaiY7npf', 'KKSsj5UVbb6y++e5sI40ZA==', '7NqSTl40PZYdIQUrfkssRw==', 'lQ14GFbXE1ZmzlCKsCXm4A==', '2M5J2U6FpMQhGEPyBHHyKw==', '', ''),
(3, 'ifNi5cDGb+mFqXakayP9JQ==', 'YZ03oX9ohQDdb2fwSJfx9Q==', 'mzrbhhklCfB4JgRWSuJ7RQ==', 'DEA+lNd9OVVyx3Zi7cEUPg==', 'kjgxyok17jCB4pOk2eVGIw==', 'SLgAt4BUCf72oowQ6gU88CaiGKlr7I84sfZ4mTmkHyIbuf1hNA4TyNZ0QaiY7npf', 'KKSsj5UVbb6y++e5sI40ZA==', 'wgt2olh1Mc6BPb1x0Fpf/g==', '3jGvUXT0AHjKJt32SBsBiQ==', '2M5J2U6FpMQhGEPyBHHyKw==', '', ''),
(4, '3fHUx8OSEimfA9hMkAZgiw==', 'Ob7cJ+F2djvcus/TA2Y3rg==', 'mzrbhhklCfB4JgRWSuJ7RQ==', 'CqAQgqV4ffd0RULDWz2QHg==', 'kjgxyok17jCB4pOk2eVGIw==', 'X0tyeOJ4nP8x4PKZO4PAhOhlYJan3eEL8xFgwhOBDpQbuf1hNA4TyNZ0QaiY7npf', 'KKSsj5UVbb6y++e5sI40ZA==', 'vqaDRlsEBy4JPzxeRlsxdA==', '66g93/b3H66hYivpyhpQuQ==', '2M5J2U6FpMQhGEPyBHHyKw==', '', ''),
(5, 'LWizv41MSzWQA/0HwtRJCA==', '0brpnyG3aX5OCu7EI+C3Xw==', 'mzrbhhklCfB4JgRWSuJ7RQ==', 'kquySCczsUqS8CPPS/4y9g==', 'kjgxyok17jCB4pOk2eVGIw==', 'DEyaDSS9EGzpuhQFLgfBWQ88+45/TbKm/Y6Wzzcrc6gbuf1hNA4TyNZ0QaiY7npf', 'KKSsj5UVbb6y++e5sI40ZA==', '9SjtSjFFdKAYbsDM/pXCog==', 'nYY56Kc0Bd9M2GYMX+vakg==', '2M5J2U6FpMQhGEPyBHHyKw==', '', ''),
(6, 'rujAdT+03X9E9Ac2I2tq3w==', 'y3evkyZQGs615qe89w3I+w==', 'zWjG1Zv6ThjkzUg/CenEng==', 'rlN6h91v3gwVvFoeGiipTA==', 'kjgxyok17jCB4pOk2eVGIw==', 'oGxqHtZgAnEz7lsU/C1tITLknQNTSJLh2KlwHAbM7iIbuf1hNA4TyNZ0QaiY7npf', 'KKSsj5UVbb6y++e5sI40ZA==', 'Sh1ssIifZ4MTvcb8K3NxUQ==', 'lw8NJgkHIXuHgmbzvG47tQ==', '2M5J2U6FpMQhGEPyBHHyKw==', '', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
