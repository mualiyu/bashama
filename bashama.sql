-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2020 at 12:28 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bashama`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'Admin', 'admin@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `short_desc` varchar(250) NOT NULL,
  `long_desc` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `short_desc`, `long_desc`) VALUES
(8, 'Chinese', 'Chinese cuisine is an important part of Chinese culture, which includes cuisine originating from the diverse regions of China.', 'A number of different styles contribute to Chinese cuisine but perhaps the best known and most influential are Cantonese cuisine, Shandong cuisine, Jiangsu cuisine (specifically Huaiyang cuisine) and Sichuan cuisine.'),
(9, 'South Indian', 'South Indian cuisine includes the cuisines of the five southern states of India Andhra Pradesh, Karnataka, Kerala, Tamil Nadu and Telangana.', 'The cuisines of Andhra Pradesh are the spiciest in all of India. Generous use of chili and tamarind make the dishes tangy and hot. The majority of dishes are vegetable or lentil-based.'),
(10, 'Snacks', ' A snack is a small portion of food eaten between meals.', 'A snack is a small portion of food eaten between meals. This may be a snack food, such as potato chips or baby carrots, but can also simply be a small amount of any food.');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `comment` longtext NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `comment`, `timestamp`) VALUES
(6, 'Muktar usman', 'i love this shop', '2020-07-07 15:18:54'),
(7, 'muktar', 'i like it', '2020-07-07 15:31:54'),
(8, 'muktar', 'it is amazing in this restaurant', '2020-07-07 15:32:44'),
(9, 'Mubarak', 'A restaurant on the moon could not have had less atmosphere', '2020-07-07 15:37:26'),
(10, 'muktar', 'sdsthgdvd h', '2020-07-07 18:44:34'),
(11, 'muktar', 'sfsdvd dggfgd', '2020-07-07 18:45:07'),
(12, 'mubarak', 'i love ', '2020-07-07 18:47:33'),
(13, 'mubarrakk', 'i really enjoyed yo foods, keep it up guys.. cant wait to be back', '2020-07-07 19:06:12'),
(14, 'mubarak', 'wassup', '2020-07-07 19:11:47');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` int(11) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `cat_id`, `fname`, `description`) VALUES
(1, 9, 'Dosa', 'I love Dosa very much. Its a South Indian Food and Everybody loves it!'),
(7, 7, 'Egg Role', 'This is a North Indian Pop Food. Everybody likes it so damn very much.'),
(8, 8, 'Chowmin', 'This is a Chinese Pop Food. Everybody likes it so damn very much.'),
(9, 10, 'French Fries', 'This is a Snacks Food. Everybody likes it so damn very much with Tea or Coffee.'),
(10, 11, 'Momos', 'This is a Himalayan Pop Food. Everybody likes it so damn very much. Its comes with different flavors!'),
(11, 8, 'Hakka Noodles', 'This food is so much popular even in India. It tastes like Chowmein but with Gravy. ');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_id` varchar(20) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `food_id` varchar(10) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `timestamp` varchar(50) NOT NULL,
  `delivery_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `user_id`, `food_id`, `user_name`, `timestamp`, `delivery_status`) VALUES
(7, 'BSHM471077', '4', '7', 'muktar', '06:07:2020 09:13:09pm', 1),
(8, 'BSHM272100', '4', '1', 'muktar', '06:07:2020 08:14:01pm', 1),
(9, 'BSHM744191', '6', '1', 'mubarak', '07:07:2020 08:49:31pm', 0),
(12, 'BSHM618349', '4', '10', 'muktar', '08:07:2020 12:17:43am', 0),
(13, 'BSHM619700', '5', '11', 'Mubarak', '08:07:2020 12:28:21am', 0),
(14, 'BSHM907317', '4', '11', 'muktar', '08:07:2020 12:48:40am', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `timestamp` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `timestamp`) VALUES
(8, 'Test test', 'test1@gmail.com', '9f17936180d596912a9a9559443d8e31', '08:07:2020 10:02:58am');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
