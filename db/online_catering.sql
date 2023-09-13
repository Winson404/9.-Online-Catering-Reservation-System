-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2023 at 08:18 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `online_catering`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`admin_Id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `suffix` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date_registered` date NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'Admin'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_Id`, `firstname`, `middlename`, `lastname`, `suffix`, `gender`, `dob`, `age`, `address`, `email`, `contact`, `password`, `image`, `date_registered`, `user_type`) VALUES
(1, 'Erwins', 'Cabag', 'Son', '', 'Male', '2022-04-06', 23, 'Purok San Isidro, Sitio Upper Landing, Daanlungsod, Medellin, Cebu', 'admin@gmail.com', '09359428963', '21232f297a57a5a743894a0e4a801fc3', 'art-hauntington-jzY0KRJopEI-unsplash.jpg', '2022-04-17', 'Admin'),
(2, 'dgdgf', 'fsgfd', 'Nuena', 'gdfh', 'Female', '2022-05-31', 342, 'bbv', 'joper@gmail.com', '543645764', '0192023a7bbd73250516f069df18b500', 'wp4813161-simple-minimalist-wallpapers.jpg', '2022-06-30', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
`cart_Id` int(11) NOT NULL,
  `cart_menu_Id` int(11) NOT NULL,
  `cart_user_Id` int(11) NOT NULL,
  `cart_quantity` varchar(255) NOT NULL,
  `cart_total` varchar(255) NOT NULL,
  `cart_status` varchar(255) NOT NULL DEFAULT 'Pending',
  `checkOut` int(11) NOT NULL DEFAULT '0' COMMENT '0=Not checked out yet, 1=Checked out',
  `Paid` int(11) NOT NULL DEFAULT '0' COMMENT '0=Unpaid, 1=Paid'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=59 ;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_Id`, `cart_menu_Id`, `cart_user_Id`, `cart_quantity`, `cart_total`, `cart_status`, `checkOut`, `Paid`) VALUES
(55, 15, 48, '1', '65', 'Confirmed', 1, 1),
(56, 4, 48, '3', '90', 'Confirmed', 1, 1),
(57, 7, 48, '2', '400', 'Confirmed', 1, 1),
(58, 3, 48, '4', '1728', 'Confirmed', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
`cat_Id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `cat_description` varchar(255) NOT NULL,
  `date_created` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_Id`, `cat_name`, `cat_description`, `date_created`) VALUES
(2, 'Drinks', 'Drinks description', '2022-06-28'),
(3, 'Meats', 'Meats Description', '2022-06-28'),
(4, 'Vegetables', 'Vegetable Description', '2022-06-28'),
(5, 'Sandwiches', 'Sandwiches Description', '2022-06-28'),
(6, 'Chicken', 'Chicken Description', '2022-06-28'),
(8, 'gdhfhfhg', 'hgfjfjghjgjghjg', '2022-06-30'),
(9, 'teteter', 'hhfhfghfg', '2022-06-30');

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE IF NOT EXISTS `checkout` (
`checkout_Id` int(11) NOT NULL,
  `checkout_user_Id` int(11) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `event_venue` varchar(255) NOT NULL,
  `event_date` varchar(255) NOT NULL,
  `event_time` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  `Paid` int(11) NOT NULL DEFAULT '0' COMMENT '0=Unpaid, 1=Paid',
  `totalAmount` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`checkout_Id`, `checkout_user_Id`, `event_name`, `event_venue`, `event_date`, `event_time`, `status`, `Paid`, `totalAmount`) VALUES
(23, 48, 'ss', 'ss', '2023-01-13', '02:18', 'Confirmed', 1, '155'),
(24, 48, 'fdsfds', 'fdsfsd', '2023-01-12', '03:20', 'Confirmed', 1, '2,128');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
`menu_Id` int(11) NOT NULL,
  `menu_cat_Id` int(11) NOT NULL,
  `menu_sub_cat_Id` int(11) NOT NULL,
  `menu_name` varchar(255) NOT NULL,
  `menu_description` varchar(255) NOT NULL,
  `menu_price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_Id`, `menu_cat_Id`, `menu_sub_cat_Id`, `menu_name`, `menu_description`, `menu_price`, `image`) VALUES
(1, 2, 7, 'sda123', 'fs123', '2222', 'Screenshot (158).png'),
(3, 3, 6, 'sdagfdgd', 'gfdfd', '432', 'rUPmy8.jpg'),
(4, 4, 10, 'Coke', 'Good for 30 people', '30', 'coke.jpg'),
(5, 5, 11, 'Merinda', 'Good for 50 people', '30', 'fizzy-drinks-orange-drink-carbonated-water-juice-mirinda-png-favpng-Rmk4GHsALdMd2L4wLrhy0KHRT.jpg'),
(6, 2, 12, 'Royal', 'Good for 30 people', '25', 'PIC9104881.png'),
(7, 2, 13, 'Pork Chop', 'Good for 60 people', '200', 'p.jpg'),
(8, 2, 14, 'Beef', 'Good for 20 people', '150', 'dsfs.jpg'),
(9, 2, 15, 'Sotanghon', 'Good for 15 people', '60', 'sotanghon.png'),
(10, 2, 16, 'Holiday Roasted Butternut Squash', 'Good for 40 people', '65', 'Cooking-Matters-Recipe-HolidayButternutSquash.png'),
(11, 2, 17, 'Miso soup Eggplant Braising Cooking Stir frying', 'Good for 60 people', '40', 'png-clipart-miso-soup-eggplant-braising-cooking-stir-frying-tempting-braised-eggplant-soup-food.png'),
(12, 2, 18, 'Spicy Chicken Sandwich', 'Good for 20 people', '200', 'spicy-crispy-chicken-sandwich-11549663243blu5lqepri.png'),
(13, 2, 19, 'Fried Egg bacon ', 'Good for 15 people', '35', 'fried-egg-bacon-shashlik-ham-scrambled-eggs-png-favpng-tWjCQUhNKstE5tpvTmC0RMCi4.jpg'),
(14, 2, 20, 'Roast Beef Sandwich', 'Good for 10 people', '50', '97-977800_roast-beef-sandwich-png-transparent-png.png'),
(15, 2, 21, 'Chicken Wings', 'Good for 10 people', '65', 'pngtree-fried-chicken-wings-png-image_2133872.jpg'),
(16, 2, 22, 'Juice', 'Good for 35 people', '20', '6207ad7e34af5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE IF NOT EXISTS `sub_category` (
`sub_category_Id` int(11) NOT NULL,
  `sub_cat_Id` int(11) NOT NULL,
  `sub_cat_name` varchar(255) NOT NULL,
  `sub_description` varchar(255) NOT NULL,
  `sub_date_added` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`sub_category_Id`, `sub_cat_Id`, `sub_cat_name`, `sub_description`, `sub_date_added`) VALUES
(10, 2, 'Coke', 'Coke Description', '2022-06-28'),
(11, 2, 'Merinda', 'Merinda Description', '2022-06-28'),
(12, 2, 'Royal', 'Royal Description', '2022-06-28'),
(13, 3, 'Porkchop', 'Porkchop Description', '2022-06-28'),
(14, 3, 'Beef', 'Beef Description', '2022-06-28'),
(15, 4, 'Malunggay', 'Malunggay Description', '2022-06-28'),
(16, 4, 'Kalabasa', 'Kalabasa Description', '2022-06-28'),
(17, 4, 'Talong', 'Talong Description', '2022-06-28'),
(18, 5, 'Chicken Sandwich', 'Chicken Sandwich Description', '2022-06-28'),
(19, 5, 'Egg Sandwich', 'Egg Sandwich Description', '2022-06-28'),
(20, 5, 'Roast Beef Sandwich', 'Roast Beef Sandwich Description', '2022-06-28'),
(21, 6, 'Wings', 'Wings Description', '2022-06-28'),
(22, 2, 'Juice', 'Juice gfdhhgfhf', '2022-06-30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`user_Id` int(11) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_middlename` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_suffix` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date_registered` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_Id`, `user_firstname`, `user_middlename`, `user_lastname`, `user_suffix`, `gender`, `address`, `email`, `contact`, `password`, `image`, `date_registered`) VALUES
(48, 'Erwin', 'Cabag', 'Son', '', 'Male', 'Purok San Isidro, Sitio Upper Landing, Daanlungsod, Medellin, Cebu', 'sonerwin12@gmail.com', '9359428963', '21232f297a57a5a743894a0e4a801fc3', 'pngtree-fried-chicken-wings-png-image_2133872.jpg', '2022-06-28'),
(49, 'firstname', 'firstname', 'firstname', 'firstname', 'Male', 'firstname', 'firstname@gmail.com', '9123456789', '342f5c77ed008542e78094607ce1f7f3', 'wp4813161-simple-minimalist-wallpapers.jpg', '2023-01-27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`admin_Id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
 ADD PRIMARY KEY (`cart_Id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`cat_Id`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
 ADD PRIMARY KEY (`checkout_Id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
 ADD PRIMARY KEY (`menu_Id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
 ADD PRIMARY KEY (`sub_category_Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`user_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `admin_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
MODIFY `cart_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
MODIFY `cat_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
MODIFY `checkout_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
MODIFY `menu_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
MODIFY `sub_category_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=50;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
