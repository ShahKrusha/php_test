-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2023 at 11:43 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `category_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `category_name` varchar(30) NOT NULL,
  `category_description` varchar(500) NOT NULL,
  `status` varchar(6) NOT NULL,
  `added_datetime` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `category_name`, `category_description`, `status`, `added_datetime`) VALUES
(89, 0, 'App Development', 'Mobile application development is the process of creating software applications that run on a mobile', 'Active', '2023-03-14 06:43:49.310986'),
(90, 0, 'Web Designing', 'Web designers plan, create and code internet sites and web pages, many of which combine text with so', 'Active', '2023-02-23 07:39:17.417870'),
(91, 0, 'Web Development', 'Web development is the work involved in developing a website for the Internet (World Wide Web) or an', 'Active', '2023-02-23 07:40:01.834890'),
(92, 89, 'Android Development', 'Android software development is the process by which applications are created for devices running th', 'Active', '2023-02-23 07:45:23.059143'),
(93, 90, 'HTML', 'HTML stands for Hyper Text Markup Language. HTML is the standard markup language for creating Web pages. HTML describes the structure of a Web page. HTML consists of a series of elements. HTML elements tell the browser how to display the content.', 'Active', '2023-02-23 07:49:54.618384'),
(94, 90, 'CSS', 'Cascading Style Sheets (CSS) is a stylesheet language used to describe the presentation of a document written in HTML or XML ', 'Active', '2023-02-23 07:51:08.595552'),
(95, 91, 'PHP', 'PHP is a server side scripting language that is embedded in HTML. It is used to manage dynamic content, databases, session tracking, even build entire e-commerce sites. It is integrated with a number of popular databases, including MySQL, PostgreSQL, Oracle, Sybase, Informix, and Microsoft SQL Serve', 'Active', '2023-02-23 07:51:46.685501'),
(100, 91, 'Ruby', 'ruby, gemstone composed of transparent red corundum (q.v.), a mineral form of aluminum oxide, Al2O3.', 'Active', '2023-02-23 08:11:07.002155'),
(101, 91, 'Python', 'Python is a computer programming language often used to build websites and software, automate tasks, and conduct data analysis.', 'Active', '2023-02-23 08:10:48.226666'),
(102, 91, 'Nodejs', 'Node. js is an open-source, cross-platform JavaScript runtime environment. Developers use Node.', 'Active', '2023-02-23 08:07:59.966635'),
(103, 0, 'Nodejs Intro', 'Node. js is an open-source, cross-platform JavaScript runtime environment. Developers use Node.', 'Active', '2023-02-27 04:45:59.490669'),
(104, 100, 'Ruby Intro', 'Ruby is a pure Object-Oriented language developed by Yukihiro Matsumoto.', 'Active', '2023-02-23 08:09:39.517649'),
(158, 0, 'xyz', 'xyz', 'Active', '2023-03-15 09:20:55.577576'),
(162, 0, 'krusha', 'shah', 'Active', '2023-03-15 09:18:57.329344'),
(163, 0, 'abc', 'aaa', 'Active', '2023-03-15 09:18:15.399561'),
(171, 162, 'kk1806', 'kk1806', 'Active', '2023-03-15 09:22:11.901181');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
