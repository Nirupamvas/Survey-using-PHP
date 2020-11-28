-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2020 at 06:23 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lion`
--

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `username`, `email`, `password`) VALUES
(1, 'abc', 'abc@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `surveyposts`
--

CREATE TABLE `surveyposts` (
  `q_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `optionA` varchar(225) NOT NULL,
  `optionB` varchar(225) NOT NULL,
  `optionC` varchar(225) NOT NULL,
  `optionD` varchar(225) NOT NULL,
  `votedA` int(11) NOT NULL,
  `votedB` int(11) NOT NULL,
  `votedC` int(11) NOT NULL,
  `votedD` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surveyposts`
--

INSERT INTO `surveyposts` (`q_id`, `question`, `optionA`, `optionB`, `optionC`, `optionD`, `votedA`, `votedB`, `votedC`, `votedD`) VALUES
(1, 'Do you like Xampp server?', 'Yes, I do', 'No, I don\'t', 'Partially', 'others', 20, 50, 10, 2),
(2, 'How many lights do you have in your room?', '1', '2', '3', '4', 60, 10, 40, 30),
(3, 'How many birds you have seen today', '10', '50', '40', 'more than 60', 10, 20, 30, 10),
(4, 'Which restaurent you prefer for a party with friends?', 'Hotel Taj', 'Subramanyam', 'Amrutha villas', 'Birds Hotel', 30, 20, 100, 40),
(5, 'How many wonders are there?', '20', '0', '4', '7', 40, 50, 10, 25),
(7, 'How many coins do you have?', '100', '200', '1000', '300', 100, 70, 85, 50),
(9, 'Have you seen a superhero?', 'YES', 'NO', 'Onces', 'Not\'yet', 20, 10, 40, 30);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surveyposts`
--
ALTER TABLE `surveyposts`
  ADD PRIMARY KEY (`q_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `surveyposts`
--
ALTER TABLE `surveyposts`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
