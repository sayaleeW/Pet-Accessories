-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2017 at 04:06 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pet`
--

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `add` text NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `pid` int(11) NOT NULL,
  `date` date NOT NULL,
  `quantity` int(11) NOT NULL,
  `stat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `name`, `add`, `mobile`, `pid`, `date`, `quantity`, `stat`) VALUES
(1, 'one', 'sdsad', '123243', 1, '2017-02-19', 2, 0),
(2, 'jjjjj', 'vhvhbih', '1111111111', 1, '2017-03-10', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pet`
--

CREATE TABLE `pet` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `descr` text NOT NULL,
  `price` int(11) NOT NULL,
  `img` text NOT NULL,
  `info1` text NOT NULL,
  `info2` text NOT NULL,
  `info3` text NOT NULL,
  `sid` int(11) NOT NULL,
  `category` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pet`
--

INSERT INTO `pet` (`id`, `name`, `descr`, `price`, `img`, `info1`, `info2`, `info3`, `sid`, `category`) VALUES
(1, 'one', 'asd', 120, 'img/one.jpg', 'sda', 'asd', 'asd', 1, 'seafish'),
(2, 'DROOLS ADULT CHICKEN & EGG DOG FOOD', 'Brand: DROOLS', 1230, 'img/DROOLS ADULT CHICKEN & EGG DOG FOOD.jpg', 'Stage - Adult', 'Type - Non-Veg', 'Quantity - 10 kg', 5, 'Food'),
(3, 'jkancms', 'svkkmsm', 51, 'img/jkancms.jpg', 'kkjk', 'jkkssks', 'dkfdld', 5, 'Ornamental'),
(4, 'Dog Bone Ornament ', 'Blue Colour', 500, 'img/Dog Bone Ornament .jpg', 'Handmade item', 'Materials: clay, glaze, Rope', 'Personalized with Dogs Name  with stamped Paw Prints', 5, 'Ornamental'),
(5, 'Custom Dog Ornament', 'Handmade item', 1000, 'img/Custom Dog Ornament.jpg', 'Materials: wood, recycled material, bottle caps, paint, faux fur', 'Item details 5 out of 5 stars.      (829) reviews Shipping & Policies Customize your favorite pup with his or her own ornament.', 'All ornaments are approximately 6" in height, hand cut, painted and created with mostly recycled products.', 5, 'Ornamental'),
(6, 'Pug Ornament', 'Pug Gifts - Pug Art - Pug Lover - Pug Memorial - Pug Ornaments - Pug Gift - Personalized Free', 480, 'img/Pug Ornament.jpg', 'Handmade item', 'Materials: Birch Wood', 'Each ornament is engraved in our South Carolina studio ', 5, 'Ornamental'),
(7, 'Pet Litter Scoop', 'Used For: Cleaning up', 70, 'img/Pet Litter Scoop.jpg', 'Features: Sure-grip handle makes clean up easier', 'The Litter Scoop is the ideal size for getting into difficult-to-reach areas, with a convenient hang-tab.', 'Use only a pet-safe cleaner. Wash and rinse after every use.', 5, 'Cleaning'),
(8, 'Small Pet Cage Cleaner & Deodorizer', 'sjdfjh', 54, 'img/Small Pet Cage Cleaner & Deodorizer.jpg', 'vhj', 'bjj', '55', 5, 'Cleaning'),
(9, 'Small Pet Scrubber Sponge', 'Durable, easy-grip design', 50, 'img/Small Pet Scrubber Sponge.jpg', 'Used For: Clean up', 'Use only a pet-safe cleaner. Wash and rinse after every use', ' Air dry.', 5, 'Cleaning'),
(10, 'Food', 'Food demo', 150, 'img/Food.jpg', 'good product', 'panvel', '500', 5, 'Food');

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `add` text NOT NULL,
  `pan` text NOT NULL,
  `pass` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`id`, `name`, `email`, `add`, `pan`, `pass`) VALUES
(1, 'one', 'one@gmail.com', '', '123456789', 'abc'),
(2, 'pradeep', 'pradeep@hot.com', '', '007007007', '123456'),
(3, 'charuta', 'charutaa@gmail.com', '', '123123123123', 'zxcvbnm1'),
(4, 'vaidehi', 'vaidehi@patkar', '', '1233', 'zxcvbnm'),
(5, 'pranali', 'pranalidesai97@gmail.com', '', '20019384737', 'pranjal1234');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `address` text NOT NULL,
  `name` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `address`, `name`, `password`) VALUES
(1, 'divekar244', '', 'MANGESH', '123456'),
(2, 'j@gmail.com', '', 'jjjjj', 'zxcvbnm1'),
(3, 'kshitij@abc.com', '', 'kshitij', 'abcdefgh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pet`
--
ALTER TABLE `pet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
