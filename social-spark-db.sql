-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2019 at 09:45 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social-spark-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `RelatingUserEmail` varchar(50) NOT NULL,
  `RelatedUserEmail` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`RelatingUserEmail`, `RelatedUserEmail`, `status`) VALUES
('arun@gmail.com', 'hanhao@gmail.com', 1),
('davindersharma@gmail.com', 'kanwarpal@gmail.com', 1),
('davindersharma@gmail.com', 'roneetparida@gmail.com', 1),
('davindersharma@gmail.com', 'rupindervirdi@gmail.com', 1),
('davindersharma@gmail.com', 'vinayrao@gmail.com', 0),
('hanhao@gmail.com', 'arun@gmail.com', 1),
('kanwarpal@gmail.com', 'davindersharma@gmail.com', 1),
('lijijiji@gmail.com', 'roneetparida@gmail.com', 1),
('nitin@gmail.com', 'roneetparida@gmail.com', 1),
('roneetparida@gmail.com', 'davindersharma@gmail.com', 1),
('roneetparida@gmail.com', 'lijijiji@gmail.com', 1),
('roneetparida@gmail.com', 'nitin@gmail.com', 1),
('roneetparida@gmail.com', 'shivampatel@gmail.com', 1),
('rupindervirdi@gmail.com', 'davindersharma@gmail.com', 1),
('shivampatel@gmail.com', 'roneetparida@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `postID` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`postID`, `email`) VALUES
('23104', 'hanhao@gmail.com'),
('26395', 'davindersharma@gmail.com'),
('26395', 'hanhao@gmail.com'),
('26395', 'roneetparida@gmail.com'),
('34164', 's@gmail.com'),
('36263', 'hanhao@gmail.com'),
('40173', 'davindersharma@gmail.com'),
('40173', 'roneetparida@gmail.com'),
('40173', 'rupindervirdi@gmail.com'),
('40173', 's@gmail.com'),
('40197', 'hanhao@gmail.com'),
('40197', 'roneetparida@gmail.com'),
('44828', 'kanwarpal@gmail.com'),
('51103', 'hanhao@gmail.com'),
('65322', 'davindersharma@gmail.com'),
('65322', 'roneetparida@gmail.com'),
('65322', 'rupindervirdi@gmail.com'),
('70266', 'davindersharma@gmail.com'),
('70266', 'hanhao@gmail.com'),
('70266', 'roneetparida@gmail.com'),
('70266', 'shivampatel@gmail.com'),
('81122', 'davindersharma@gmail.com'),
('88130', 'hanhao@gmail.com'),
('90295', 'lijijiji@gmail.com'),
('90295', 'roneetparida@gmail.com'),
('90527', 'hanhao@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `fromUser` varchar(50) NOT NULL,
  `toUser` varchar(50) NOT NULL,
  `message` varchar(50) NOT NULL,
  `date` datetime NOT NULL,
  `seen` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`fromUser`, `toUser`, `message`, `date`, `seen`) VALUES
('davindersharma@gmail.com', 'rupindervirdi@gmail.com', '        oye', '2019-12-03 01:02:14', 1),
('davindersharma@gmail.com', 'rupindervirdi@gmail.com', '        kuj ni', '2019-12-03 01:03:11', 1),
('davindersharma@gmail.com', 'rupindervirdi@gmail.com', '        hello', '2019-12-03 02:44:50', 1),
('rupindervirdi@gmail.com', 'davindersharma@gmail.com', '        han ki ae', '2019-12-03 01:02:54', 1),
('rupindervirdi@gmail.com', 'davindersharma@gmail.com', '        fer kyu dimaag khada', '2019-12-03 01:03:40', 1),
('rupindervirdi@gmail.com', 'davindersharma@gmail.com', '        hi', '2019-12-03 02:45:23', 0);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `email` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`email`, `type`, `date`) VALUES
('davindersharma@gmail.com', 'like81683', '2019-12-03 07:48:42'),
('davindersharma@gmail.com', 'requestSent,vinayrao@gmail.com', '2019-12-03 07:49:48'),
('lijijiji@gmail.com', 'like71253', '2019-12-03 01:09:25'),
('rupindervirdi@gmail.com', 'requestSent,dara@gmail.com', '2019-12-03 02:45:33');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `postID` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`postID`, `email`, `content`, `image`, `date`) VALUES
('23104', 'vinayrao@gmail.com', 'new', '', '2019-11-22 06:06:02'),
('26395', 'davindersharma@gmail.com', 'why so serious??', '', '2019-11-21 08:50:30'),
('28918', 'johndoe@gmail.com', 'hello', '', '2019-11-30 06:47:37'),
('31732', 'roneetparida@gmail.com', 'hello', '', '2019-11-30 10:42:37'),
('34164', 's@gmail.com', 'hello', '', '2019-11-28 08:18:46'),
('36263', 'vinayrao@gmail.com', 'seconf post', '', '2019-11-22 06:04:26'),
('40173', 'roneetparida@gmail.com', 'javascipt is awesome', '', '2019-11-21 00:00:00'),
('40197', 'vinayrao@gmail.com', 'old', '', '2019-11-22 06:07:29'),
('44828', 'kanwarpal@gmail.com', 'yaaay!', '', '2019-11-21 06:21:38'),
('51103', 'davindersharma@gmail.com', 'hello ', '', '2019-11-22 11:08:39'),
('62674', 'lijijiji@gmail.com', 'hello', '', '2019-12-03 01:12:10'),
('65322', 'rupindervirdi@gmail.com', 'hail hydra', '', '2019-11-21 00:00:00'),
('70266', 'shivampatel@gmail.com', 'jai modi', '', '2019-11-22 12:34:32'),
('81122', 'davindersharma@gmail.com', 'new date', '', '2019-11-21 08:26:20'),
('81683', 'davindersharma@gmail.com', 'new post again', '', '2019-12-03 05:11:24'),
('88130', 'hanhao@gmail.com', 'echo', '', '2019-11-22 01:43:19'),
('90295', 'lijijiji@gmail.com', 'HAII', '', '2019-11-28 09:30:31'),
('90527', 'vinayrao@gmail.com', 'this is my first post', '', '2019-11-22 05:58:27');

-- --------------------------------------------------------

--
-- Table structure for table `savedposts`
--

CREATE TABLE `savedposts` (
  `postID` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `savedposts`
--

INSERT INTO `savedposts` (`postID`, `email`) VALUES
('40197', 'davindersharma@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `FirstName` varchar(20) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `theme` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`FirstName`, `LastName`, `Email`, `Password`, `theme`) VALUES
('Arun', 'Reddy', 'arun@gmail.com', 'b59c67bf196a4758191e42f76670ceba', ''),
('Davinder', 'Sharma', 'davindersharma@gmail.com', 'b59c67bf196a4758191e42f76670ceba', ''),
('Emad', 'Mohammad', 'emad@gmail.com', 'b59c67bf196a4758191e42f76670ceba', ''),
('Gaurav', 'Kumar', 'gauravkumar@gmail.com', 'b59c67bf196a4758191e42f76670ceba', ''),
('han', 'hao', 'hanhao@gmail.com', 'b59c67bf196a4758191e42f76670ceba', ''),
('Jane', 'Doe', 'jane@gmail.com', 'b59c67bf196a4758191e42f76670ceba', ''),
('John ', 'Joe', 'johndoe@gmail.com', 'b59c67bf196a4758191e42f76670ceba', ''),
('Kanwar', 'Pal Singh', 'kanwarpal@gmail.com', 'b59c67bf196a4758191e42f76670ceba', ''),
('Liji', 'Anna Jiji', 'lijijiji@gmail.com', 'b59c67bf196a4758191e42f76670ceba', ''),
('Nitin', 'Joy', 'nitin@gmail.com', 'b59c67bf196a4758191e42f76670ceba', ''),
('Nitisha', 'Kalra', 'nitisha@gmail.com', 'b59c67bf196a4758191e42f76670ceba', ''),
('Ravinder', 'Pal Singh', 'rav@gmail.com', 'b59c67bf196a4758191e42f76670ceba', ''),
('Roneet', 'Kumar', 'roneetparida@gmail.com', 'b59c67bf196a4758191e42f76670ceba', ''),
('Rupinder', 'Virdi', 'rupindervirdi@gmail.com', 'b59c67bf196a4758191e42f76670ceba', ''),
('karan', 'sood', 's@gmail.com', '202cb962ac59075b964b07152d234b70', ''),
('Shivam', 'Patel', 'shivampatel@gmail.com', 'b59c67bf196a4758191e42f76670ceba', ''),
('Sumit', 'Parida', 'sumitparida@gmail.com', 'b59c67bf196a4758191e42f76670ceba', ''),
('Sunil', 'Chatla', 'sunilchatla@gmail.com', 'b59c67bf196a4758191e42f76670ceba', ''),
('Vinay', 'Rao', 'vinayrao@gmail.com', 'b59c67bf196a4758191e42f76670ceba', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`RelatingUserEmail`,`RelatedUserEmail`),
  ADD KEY `RelatedUserEmail` (`RelatedUserEmail`),
  ADD KEY `RelatingUserEmail` (`RelatingUserEmail`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`postID`,`email`),
  ADD KEY `likes_ibfk_2` (`email`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`fromUser`,`toUser`,`date`),
  ADD KEY `toUser` (`toUser`),
  ADD KEY `fromUser` (`fromUser`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`email`,`type`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`postID`),
  ADD KEY `posts_ibfk_1` (`email`);

--
-- Indexes for table `savedposts`
--
ALTER TABLE `savedposts`
  ADD PRIMARY KEY (`postID`,`email`),
  ADD KEY `email` (`email`),
  ADD KEY `postID` (`postID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Email`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `friends`
--
ALTER TABLE `friends`
  ADD CONSTRAINT `friends_ibfk_1` FOREIGN KEY (`RelatedUserEmail`) REFERENCES `user` (`Email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `friends_ibfk_2` FOREIGN KEY (`RelatingUserEmail`) REFERENCES `user` (`Email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`email`) REFERENCES `user` (`Email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `likes_ibfk_3` FOREIGN KEY (`postID`) REFERENCES `posts` (`postID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`fromUser`) REFERENCES `user` (`Email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`toUser`) REFERENCES `user` (`Email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`email`) REFERENCES `user` (`Email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`email`) REFERENCES `user` (`Email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `savedposts`
--
ALTER TABLE `savedposts`
  ADD CONSTRAINT `savedposts_ibfk_1` FOREIGN KEY (`email`) REFERENCES `user` (`Email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `savedposts_ibfk_2` FOREIGN KEY (`postID`) REFERENCES `posts` (`postID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
