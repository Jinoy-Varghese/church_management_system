-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2020 at 03:43 PM
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
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `birth`
--

CREATE TABLE `birth` (
  `num` int(6) NOT NULL,
  `bname` varchar(20) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `so` varchar(20) DEFAULT NULL,
  `id` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `birth`
--

INSERT INTO `birth` (`num`, `bname`, `date`, `so`, `id`) VALUES
(9, 'jinoy', '2000-06-05', 'varghese', 24),
(10, 'jijoy', '2000-08-18', 'parayil', 24),
(12, 'albin', '2003-01-03', 'binoy', 25);

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `num` int(6) NOT NULL,
  `chat` varchar(400) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`num`, `chat`, `name`) VALUES
(13, 'jinoy', 'USER NAME'),
(14, 'hellooo', 'USER NAME'),
(15, 'this is aaaaaaaaaaaaaaaaaaaaa sssssssssssssssssssss', 'USER NAME'),
(16, 'jinoy', 'USER NAME'),
(17, 'jinoy', 'USER NAME'),
(23, 'test1', 'USER NAME'),
(24, 'jinoy', 'USER NAME'),
(25, 'test1', 'USER NAME'),
(26, 'hellooo', 'USER NAME'),
(27, 'test123', 'USER NAME'),
(28, 'jinoy', 'USER NAME'),
(29, 'test1sssddddd', 'USER NAME'),
(30, 'nganond', 'demo'),
(31, 'sugam', 'demo'),
(32, '', 'demo'),
(33, 'fine', 'demo'),
(34, 'none', 'USER NAME'),
(35, 'hi', 'USER NAME'),
(36, 'jinoy', 'USER NAME'),
(37, 'hi', 'demo@gmail.com'),
(38, 'hi', 'admin@eparish.com'),
(39, 'hello', 'admin@eparish.com'),
(40, 'jj', 'demo@gmail.com'),
(41, 'hellooo', 'demo@gmail.com'),
(42, 'uffgeifgif', 'admin@eparish.com'),
(43, 'hiii', 'admin@eparish.com'),
(44, 'i need one help', 'arunayyappan20@gmail'),
(45, 'i can help you', 'cspsycoo@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `death`
--

CREATE TABLE `death` (
  `num` int(6) NOT NULL,
  `dname` varchar(20) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `so` varchar(20) DEFAULT NULL,
  `id` int(6) DEFAULT NULL,
  `age` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `death`
--

INSERT INTO `death` (`num`, `dname`, `date`, `so`, `id`, `age`) VALUES
(6, 'mariamma', '2000-08-03', 'shoshamma', 25, 66),
(8, 'chako', '2020-02-01', 'williams', 24, 80),
(11, 'alex', '2020-02-05', 'alexander', 24, 33);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `num` int(6) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `value` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`num`, `name`, `value`) VALUES
(1, 'bible1', 'mathew 2:20-30'),
(2, 'bible2', 'luke 3:40-45'),
(3, 'song1', '10'),
(4, 'song2', '44'),
(5, 'song3', '26'),
(6, 'speech', 'samuel 20:15'),
(7, 'msg', 'Rev Varghese N Thomas will be in charge of the special service'),
(8, 'song4', '73');

-- --------------------------------------------------------

--
-- Table structure for table `family`
--

CREATE TABLE `family` (
  `num` int(6) NOT NULL,
  `family` varchar(30) DEFAULT NULL,
  `members` int(6) DEFAULT 0,
  `membername` varchar(30) DEFAULT NULL,
  `phno` bigint(20) DEFAULT NULL,
  `owner` varchar(20) DEFAULT NULL,
  `tax` int(6) DEFAULT 0,
  `due` int(6) DEFAULT 0,
  `donation` int(6) DEFAULT 0,
  `extra` int(6) DEFAULT 0,
  `user` varchar(20) DEFAULT NULL,
  `total` int(6) GENERATED ALWAYS AS (`extra` + `tax` + `donation` + `due`) VIRTUAL,
  `jd1` date DEFAULT NULL,
  `christmas` int(6) DEFAULT NULL,
  `diocese` int(6) DEFAULT NULL,
  `convention` int(6) DEFAULT NULL,
  `treatment` int(6) DEFAULT NULL,
  `gospel` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `family`
--

INSERT INTO `family` (`num`, `family`, `members`, `membername`, `phno`, `owner`, `tax`, `due`, `donation`, `extra`, `user`, `jd1`, `christmas`, `diocese`, `convention`, `treatment`, `gospel`) VALUES
(24, 'parayil', 4, 'jijo,jino.jiji,varghese', 9207224063, 'varghese', 150, 0, 0, 0, 'demo@gmail.com', '2020-02-18', 57, 0, 0, 0, 200),
(25, 'parayil', 5, 'albin,ashly,george,binoy,sibi', 9526838116, 'binoy', 234, 11, 23, 45, 'demo1@gmail.com', '2019-12-16', 7, 6, 5, 4, 3),
(26, 'parayil', 3, 'renu,robin,rajan\r\n', 9895650935, 'rajan', 144, 0, 0, 0, 'rajan@gmail.com', '2020-03-03', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `num` int(6) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `phno` bigint(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `msg` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`num`, `name`, `phno`, `email`, `msg`) VALUES
(1, 'vivek', 9895650935, 'vivek@gmail.com', 'nice web design'),
(2, 'Rijo', 8848978410, 'rijo1997@gmail.com', 'I is an attractive website with nice and latest user interface.All the needed facilities are provided in this website.Thank You'),
(3, 'Jijo', 9947563876, 'jijoy1997@gmail.com', 'Classic style!'),
(4, 'Renu', 8943176508, 'renurajan@gmail.com', 'AWESOME!');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(6) NOT NULL,
  `image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `image`) VALUES
(14, 'IMG_20191217_212945.jpg'),
(15, 'IMG_20191217_105122.jpg'),
(16, 'IMG_20191217_124929.jpg'),
(17, 'IMG_20191217_185032.jpg'),
(18, 'IMG_20191217_134611_1.jpg'),
(37, '918547475760_status_b2791f689ab742bea1f26d83890391da.jpg'),
(43, 'IMG_20191217_181548.jpg'),
(44, 'IMG_20191217_182214.jpg'),
(45, 'IMG_20191217_105753_11.jpg'),
(46, 'IMG_20191217_182208.jpg'),
(47, 'IMG_20191217_175830_1.jpg'),
(48, '');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `num` int(6) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` char(32) DEFAULT NULL,
  `type` varchar(20) DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`num`, `username`, `password`, `type`) VALUES
(14, 'admin@eparish.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'admin'),
(27, 'demo@gmail.com', '62cc2d8b4bf2d8728120d052163a77df', 'user'),
(28, 'sub@gmail.com', '969c7b23afead937f4497e49a2cfed90', 'sub'),
(30, 'demo1@gmail.com', 'd54bb7c79d9cbae990935202a6f90b0f', 'user'),
(31, 'cspsycoo@gmail.com', 'a7e2d20d4821109687dcdff0d352fc8f', 'sub'),
(38, 'jinoy2000@gmail.com', 'd200eaf92e8debcbaa47efe06d2fa12b', 'sub'),
(39, 'rajan@gmail.com', 'f6565efd42846497a538b4d08a84bca8', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `num` int(6) NOT NULL,
  `des` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `ldate` date DEFAULT NULL,
  `id` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`num`, `des`, `status`, `ldate`, `id`) VALUES
(15, 'death', 'approved', '2020-02-14', 6),
(17, 'birth', 'approved', '2020-02-14', 9),
(18, 'death', 'approved', '2020-02-14', 11),
(19, 'wedding', 'approved', '2020-02-14', 6),
(20, 'death', 'approved', '2020-02-18', 8),
(21, 'birth', 'approved', '2020-03-02', 10),
(22, 'birth', 'rejected', '2020-03-02', 9),
(23, 'birth', 'processing', '2020-03-22', 9),
(24, 'death', 'processing', '2020-03-22', 8),
(25, 'wedding', 'processing', '2020-03-22', 6),
(26, 'birth', 'processing', '2020-03-22', 12),
(27, 'death', 'rejected', '2020-03-22', 6);

-- --------------------------------------------------------

--
-- Table structure for table `priest`
--

CREATE TABLE `priest` (
  `username` varchar(20) NOT NULL,
  `jd` date DEFAULT NULL,
  `cbefore` varchar(30) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `experience` int(6) DEFAULT NULL,
  `tfd` varchar(100) DEFAULT NULL,
  `flag` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `priest`
--

INSERT INTO `priest` (`username`, `jd`, `cbefore`, `dob`, `image`, `experience`, `tfd`, `flag`) VALUES
('ALEXANDER THARAKAN', '2018-08-05', 'Bedhel Marthoma Church', '1968-11-10', 'vicar.jpg', 4, 'I LOVE the Lord, because He has heard my voice and my supplications.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `name` varchar(20) DEFAULT NULL,
  `credit` int(6) DEFAULT NULL,
  `debit` int(6) DEFAULT NULL,
  `total` int(6) GENERATED ALWAYS AS (`credit` - `debit`) VIRTUAL,
  `num` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`name`, `credit`, `debit`, `num`) VALUES
('sunday school', 200, 200, 1),
('yuvajana sakhyam', 800, 700, 2),
('idavaka mission', 400, 300, 3),
('choir', 500, 400, 4),
('prayer group', 300, 200, 5),
('vbs', 200, 100, 6),
('donation', 132, 0, 7);

-- --------------------------------------------------------

--
-- Table structure for table `wedding`
--

CREATE TABLE `wedding` (
  `bride` varchar(20) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `groom` varchar(20) DEFAULT NULL,
  `id` int(6) NOT NULL,
  `so` varchar(20) DEFAULT NULL,
  `wid` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wedding`
--

INSERT INTO `wedding` (`bride`, `date`, `groom`, `id`, `so`, `wid`) VALUES
('jack', '1912-03-15', 'rose', 6, 'titanic', 25),
('akhila', '2020-01-01', 'arun', 31, 'ayyappan', 30);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `birth`
--
ALTER TABLE `birth`
  ADD PRIMARY KEY (`num`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`num`);

--
-- Indexes for table `death`
--
ALTER TABLE `death`
  ADD PRIMARY KEY (`num`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`num`);

--
-- Indexes for table `family`
--
ALTER TABLE `family`
  ADD PRIMARY KEY (`num`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`num`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`num`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`num`);

--
-- Indexes for table `priest`
--
ALTER TABLE `priest`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`num`);

--
-- Indexes for table `wedding`
--
ALTER TABLE `wedding`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `birth`
--
ALTER TABLE `birth`
  MODIFY `num` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `num` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `death`
--
ALTER TABLE `death`
  MODIFY `num` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `num` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `family`
--
ALTER TABLE `family`
  MODIFY `num` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `num` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `num` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `num` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `num` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `wedding`
--
ALTER TABLE `wedding`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
