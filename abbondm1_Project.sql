-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 18, 2022 at 10:03 AM
-- Server version: 5.7.40
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abbondm1_Project`
--

-- --------------------------------------------------------

--
-- Table structure for table `ADMIN`
--

CREATE TABLE `ADMIN` (
  `UserName` varchar(50) NOT NULL,
  `Pword` varchar(255) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ADMIN`
--

INSERT INTO `ADMIN` (`UserName`, `Pword`, `FirstName`, `LastName`, `Email`) VALUES
('dobroskokj1', '$2y$10$pv1whgEhA6m8mRhEBWVjduwPCoae1PF5LUNbMK8p4XghG4U0BYzX2', 'John', 'Dobroskok', 'dobroskokj1@montclair.edu'),
('mikeabb', '$2y$10$cMnx03jTM1zuBbEhK4tEVejnqperpee84X7iEz51EDTbYjvRRtgzS', 'Michael', 'Abbondandolo', 'test@test'),
('admin', '$2y$10$RMjkCPiIQpi6qRxGMn.MDeJwkcFo/2HWRgYWc1xNok3dYf3EnbR7m', 'Admin', 'Administrator', 'admin@test'),
('initial', '$2y$10$OMjURWT9eKsQSeGKt1nw0OLCpuN8xmq4OfA95NSFPjF8Bd07.U0/6', 'initial', 'initial', 'initial@test'),
('administrator', '$2y$10$K8FbLOLEFbkaOjleV1Ac0Ot5LwMjqkphdYHtcxARM4qemP8D7Wzuq', 'Administrator', 'Admin', 'admin@admin.org');

-- --------------------------------------------------------

--
-- Table structure for table `CATEGORY`
--

CREATE TABLE `CATEGORY` (
  `Cname` varchar(50) NOT NULL,
  `Cnum` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `CATEGORY`
--

INSERT INTO `CATEGORY` (`Cname`, `Cnum`) VALUES
('Shirts', 1),
('Hoodies and Jackets', 2),
('Hats', 3),
('Plushies', 4),
('Accessories', 5),
('Pants', 6);

-- --------------------------------------------------------

--
-- Table structure for table `CREDENTIALS`
--

CREATE TABLE `CREDENTIALS` (
  `Fname` varchar(50) NOT NULL,
  `Lname` varchar(50) NOT NULL,
  `userName` varchar(25) NOT NULL,
  `pWord` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `CREDENTIALS`
--

INSERT INTO `CREDENTIALS` (`Fname`, `Lname`, `userName`, `pWord`) VALUES
('John', 'Dobroskok', 'dobroskokj1', '$2y$10$pv1whgEhA6m8mRhEBWVjduwPCoae1PF5LUNbMK8p4XghG4U0BYzX2'),
('Michael', 'Abbondandolo', 'mikeabb1', 'mikeabb1'),
('Michael', 'Abbondandolo', 'mikeabb', '$2y$10$cMnx03jTM1zuBbEhK4tEVejnqperpee84X7iEz51EDTbYjvRRtgzS'),
('Test', 'Employee', 'testemployee', '$2y$10$NUXKteKQqeRHko8paNs95eEymZ5v.yOLgCoTYoBKBcsGxtm/6XZhi'),
('New', 'Employee', 'test2', '$2y$10$FGH9FK6AEUUoGwFWu1QHiuyZ4skHVFxqICLTA9n7QAh/Su13R9dum'),
('Test', 'Employee', 'tester', '$2y$10$G7uFeow9CZJnzGlH6Ao0ze3U9tIwTwOe2IHi7vOYGjI.GQ4ZwUHxu');

-- --------------------------------------------------------

--
-- Table structure for table `CUSTOMER`
--

CREATE TABLE `CUSTOMER` (
  `Fname` varchar(50) NOT NULL,
  `Mname` varchar(50) DEFAULT NULL,
  `Lname` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Pword` varchar(255) NOT NULL,
  `UserName` varchar(25) NOT NULL,
  `PhoneNumber` varchar(14) NOT NULL,
  `CustID` int(11) NOT NULL,
  `StreetAddress` varchar(50) NOT NULL,
  `City` varchar(25) NOT NULL,
  `State` varchar(25) NOT NULL,
  `Zip` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `CUSTOMER`
--

INSERT INTO `CUSTOMER` (`Fname`, `Mname`, `Lname`, `Email`, `Pword`, `UserName`, `PhoneNumber`, `CustID`, `StreetAddress`, `City`, `State`, `Zip`) VALUES
('John', NULL, 'Dobroskok', 'dobroskokj1@montclair.edu', '$2y$10$moRL12aQNFshsm.pimImTepqv28jwXB/szrYdDXHY8jsAYY6DHvu6', 'dobroskokj1', '1234567890', 7, '1 Normal Ave', 'Montclair', 'NJ', '07043'),
('gabe', NULL, 'teves', 'tevesg1@gmail.com', '$2y$10$bd1NeGUFEhyqmqelUbQawepHt6/BH/vu0NRWHlAW2mNrZApEmnS/C', 'gabe', '123 456 7890\\', 9, '999 Eddie Street', 'Salt Lake', 'Utah', '8172'),
('mike', NULL, 'abbond', 'qwerty@gmail.com', '$2y$10$OkwSfHppuqWRAAYu/QiaoOe0XsJTYGRXiuEO1XA/nLByUpdsX5F/S', 'mikeabb', '6092244321', 10, '1 Normal Ave', 'Montclair', 'NJ', '08558'),
('Test', NULL, 'User', 'test@user.com', '$2y$10$nGfVheV0CoXwFSzayfs5ge.GNVw2WbWpoOekSM.gYJT8MHCm48PPG', 'testuser', '1234567890', 17, '1 Normal Ave', 'Montclair', 'NJ', '07043'),
('Customer', NULL, 'Test', 'customer@test.com', '$2y$10$ZELr3BxUP9n0V5WfuFokGu7toT1WDfBdgXkM02kf7hkt/Ov1SCQp6', 'customer', '1235558765', 18, '1 Normal Ave', 'Montclair', 'NJ', '07043');

-- --------------------------------------------------------

--
-- Table structure for table `EMPLOYEE`
--

CREATE TABLE `EMPLOYEE` (
  `Fname` varchar(50) NOT NULL,
  `Minit` char(1) DEFAULT NULL,
  `Lname` varchar(50) NOT NULL,
  `SSN` char(11) NOT NULL,
  `EmpID` int(11) NOT NULL,
  `Bdate` date DEFAULT NULL,
  `PhoneNumber` varchar(14) NOT NULL,
  `StreetAddress` varchar(50) NOT NULL,
  `City` varchar(25) NOT NULL,
  `State` varchar(2) NOT NULL,
  `Zip` varchar(5) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Sex` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `EMPLOYEE`
--

INSERT INTO `EMPLOYEE` (`Fname`, `Minit`, `Lname`, `SSN`, `EmpID`, `Bdate`, `PhoneNumber`, `StreetAddress`, `City`, `State`, `Zip`, `Email`, `Sex`) VALUES
('John', 'P', 'Dobroskok', '123-45-6789', 1, '2002-07-21', '1234567890', '1 Normal Ave', 'Montclair', 'NJ', '07043', 'dobroskokj1@montclair.edu', 'Male'),
('Michael', 'J', 'Abbond', '123453212', 4, NULL, '12345512', '1', '1', '1', '1', '1@gmail.com', 'male'),
('Michael', 'J', 'Abbondandolo', '111-11-1111', 5, '2022-11-28', '5555555555', '1 Normal Ave', 'Montclair', 'NJ', '08347', 'test@goggle.com', 'Male'),
('Test', 'E', 'Employee', '999-99-9999', 6, '1996-05-07', '4575551298', '1 Normal Ave', 'Montclair', 'NJ', '07043', 'testemployee@google.com', 'Male'),
('New', 'N', 'Employee', '983-21-3486', 7, '1968-10-22', '9085552387', '1 Normal Ave', 'Montclair', 'NJ', '07043', 'new@employee.com', 'Male'),
('Test', 'T', 'Employee', '000-00-0000', 8, '1965-01-05', '1234667890', '1 Normal Ave', 'Montclair', 'NJ', '07043', 'testemployee@email.com', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `ORDERS`
--

CREATE TABLE `ORDERS` (
  `OrderNum` int(11) NOT NULL,
  `OrderDate` varchar(75) NOT NULL,
  `Total` double NOT NULL,
  `Street` varchar(50) NOT NULL,
  `City` varchar(25) NOT NULL,
  `State` varchar(2) NOT NULL,
  `Zip` varchar(5) NOT NULL,
  `CustomerID` int(11) NOT NULL,
  `Fname` varchar(50) NOT NULL,
  `Lname` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ORDERS`
--

INSERT INTO `ORDERS` (`OrderNum`, `OrderDate`, `Total`, `Street`, `City`, `State`, `Zip`, `CustomerID`, `Fname`, `Lname`) VALUES
(5, '09:59, 9th December 2022', 136.77, '1 Normal Ave', 'Montclair', 'NJ', '07043', 7, 'John', 'Dobroskok'),
(6, '10:53, 9th December 2022', 47.97, '1', '1', '1', '1', 10, 'm', 'a'),
(7, '12:32, 9th December 2022', 115.91, 't', 't', 't', 't', 10, 't', 't'),
(8, '12:33, 9th December 2022', 12.99, 't', 't', 't', 't', 10, 't', 't'),
(9, '12:38, 14th December 2022', 214.95, '1 Normal Ave', 'Montclair', 'NJ', '07043', 17, 'Test', 'User'),
(10, '12:39, 14th December 2022', 90.98, '1 Normal Ave', 'Montclair', 'NJ', '07043', 17, 'Test', 'User'),
(11, '12:40, 14th December 2022', 133.98, '1 Normal Ave', 'Montclair', 'NJ', '07043', 17, 'Test', 'User'),
(12, '12:42, 14th December 2022', 103.95, '1 Normal Ave', 'Montclair', 'NJ', '07043', 18, 'Customer', 'Test'),
(13, '12:42, 14th December 2022', 14.99, '1 Normal Ave', 'Montclair', 'NJ', '07043', 18, 'Customer', 'Test'),
(14, '12:43, 14th December 2022', 119.98, '1 Normal Ave', 'Montclair', 'NJ', '07043', 18, 'Customer', 'Test'),
(15, '12:45, 14th December 2022', 21.99, '1 Normal Ave', 'Montclair', 'NJ', '07043', 18, 'Customer', 'Test'),
(16, '14:18, 16th December 2022', 22.99, '1 Normal Ave', 'Montclair', 'NJ', '07043', 7, 'John', 'Dobroskok'),
(17, '14:42, 16th December 2022', 42.98, '1 Normal Ave', 'Montclair', 'NJ', '07043', 7, 'John', 'Dobroskok');

-- --------------------------------------------------------

--
-- Table structure for table `ORDER_ITEMS`
--

CREATE TABLE `ORDER_ITEMS` (
  `OrderID` int(11) NOT NULL,
  `ProductName` varchar(50) NOT NULL,
  `ProductNum` int(11) NOT NULL,
  `Price` double NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ORDER_ITEMS`
--

INSERT INTO `ORDER_ITEMS` (`OrderID`, `ProductName`, `ProductNum`, `Price`, `Quantity`) VALUES
(5, 'Pokémon Pikachu Poke Ball Icon T-Shirt', 2, 12.99, 3),
(5, 'Pikachu Poké Plush Hat', 13, 19.99, 1),
(5, 'Pokémon Boys Pikachu Game Shirt', 1, 29.99, 1),
(5, 'Pokémon Pikachu Japanese Puzzle T-Shirt', 3, 19.95, 2),
(5, 'Jumping Hat Funny Bunny Plush Hat Cap', 18, 7.92, 1),
(6, 'Pokémon Christmas Merry Pika T-Shirt', 5, 22.99, 1),
(6, 'Pikachu Festive Winter Blue Touch Screen Gloves', 26, 14.99, 1),
(6, 'Pikachu Halloween Circus Poké Plush Key Chain', 27, 9.99, 1),
(7, 'Pikachu Balloon Adventure Flat-Bill Hat (One Size-', 15, 24.99, 1),
(7, 'Pikachu Large Microbead Plush - 13 ¾ In.', 19, 35.99, 1),
(7, 'Pokémon Pikachu Japanese Puzzle T-Shirt', 3, 19.95, 1),
(7, 'Pokémon Pikachu Poke Ball Icon T-Shirt', 2, 12.99, 1),
(7, 'Hybrid Apparel - Pokémon - Pikachu Checkers Shirt', 4, 21.99, 1),
(8, 'Pokémon Pikachu Poke Ball Icon T-Shirt', 2, 12.99, 1),
(9, 'Pikachu Pokémon Active Black Fitted Zip-Up Hoodie ', 10, 49.99, 1),
(9, 'Plush Doll with Smiling Face and Poncho Pillow', 22, 19.99, 1),
(9, 'Pokémon: Pikachu Puma Black & Purple Faux Jacket', 8, 99.99, 1),
(9, 'Pikachu Poké Plush Hat', 13, 19.99, 1),
(9, 'Pikachu Balloon Adventure Flat-Bill Hat (One Size-', 15, 24.99, 1),
(10, 'Pikachu Yellow French Terry Shorts', 37, 54.99, 1),
(10, 'Pikachu Large Microbead Plush - 13 ¾ In.', 19, 35.99, 1),
(11, 'Pokémon: Pikachu Puma Black & Purple Faux Jacket', 8, 99.99, 1),
(11, 'Pokémon Pikachu Poke Ball Icon T-Shirt', 2, 12.99, 1),
(11, 'Pokemon Cuffed Jogger Pant', 32, 21, 1),
(12, 'Pokémon Tropical Pikachu Lightning Blue Reversible', 16, 15.99, 1),
(12, 'Pikachu Balloon Adventure Flat-Bill Hat (One Size-', 15, 24.99, 1),
(12, 'Pokémon Boys Pikachu Game Shirt', 1, 29.99, 1),
(12, 'Pokémon Christmas Merry Pika T-Shirt', 5, 22.99, 1),
(12, 'Pikachu Halloween Circus Poké Plush Key Chain', 27, 9.99, 1),
(12, 'Graduation Pikachu 2022 14 oz. Mug', 28, 14.99, 1),
(14, 'Pikachu Poké Plush Hat', 13, 19.99, 1),
(14, 'Pikachu Pokémon Jackets Black Insulated Snap-Down ', 9, 99.99, 1),
(15, 'Hybrid Apparel - Pokémon - Pikachu Checkers Shirt', 4, 21.99, 1),
(16, 'Pokémon Christmas Merry Pika T-Shirt', 5, 22.99, 1),
(17, 'Pikachu Festive Winter Blue Knit Scarf', 25, 19.99, 1),
(17, 'Pokémon Christmas Merry Pika T-Shirt', 5, 22.99, 1);

-- --------------------------------------------------------

--
-- Table structure for table `PRODUCT`
--

CREATE TABLE `PRODUCT` (
  `CategoryNum` int(11) NOT NULL,
  `Price` decimal(4,2) NOT NULL,
  `ProductNum` int(11) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `SellerNum` int(11) NOT NULL,
  `InventoryLevel` int(11) NOT NULL,
  `ProductName` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `PRODUCT`
--

INSERT INTO `PRODUCT` (`CategoryNum`, `Price`, `ProductNum`, `Description`, `SellerNum`, `InventoryLevel`, `ProductName`) VALUES
(1, '29.99', 1, 'Short Sleeves: A classic crew cut neck and short sleeves make these comfortable graphic tee ones all will love to wear.', 1, 30, 'Pokémon Boys Pikachu Game Shirt'),
(1, '12.99', 2, 'Featuring a full color graphic print of the most popular Pokémon pikachu in front of a gold poke ball.', 2, 29, 'Pokémon Pikachu Poke Ball Icon T-Shirt'),
(1, '19.95', 3, 'Featuring a basic color graphic print of a trainers poké ball and vintage Pikachu.', 3, 30, 'Pokémon Pikachu Japanese Puzzle T-Shirt'),
(1, '21.99', 4, 'Our adult short sleeve t-shirt is lightweight, soft and durable; perfect for everyday wear.', 2, 29, 'Hybrid Apparel - Pokémon - Pikachu Checkers Shirt'),
(1, '22.99', 5, '100% Cotton; Heather Grey: 90% Cotton, 10% Polyester; All Other Heathers: 50% Cotton, 50% Polyester.', 3, 28, 'Pokémon Christmas Merry Pika T-Shirt'),
(1, '29.99', 6, 'Our adult short sleeve t-shirt is 100% Cotton.', 1, 30, 'Mad Engine Pokémon Pika Pikachu Adult T-Shirt'),
(2, '79.99', 7, 'PUMA x Pokémon collab has arrived! With a print of Pikachu in a fighting pose and the PUMA No. 1 logo on the front, plus a woven tag on the kangaroo pocket, this fleece hoodie offers streetwear vibes with a Pokémon twist.', 4, 30, 'Pikachu Puma Black Fleece Pullover Hoodie - Adult'),
(2, '99.99', 8, 'PUMA No.1 logo on the bottom left, this black and purple faux shearling jacket brings authentic Pokemon details and a contemporary streetwear vibe to your closet.', 4, 29, 'Pokémon: Pikachu Puma Black & Purple Faux Jacket'),
(2, '99.99', 9, 'It is all about the details with this black jacket that features a large outline of Pikachu on the back and a smaller silhouette on the chest.', 5, 29, 'Pikachu Pokémon Jackets Black Insulated Snap-Down '),
(2, '49.99', 10, 'Made from a warm cotton blend, it features a yellow-and-white screen print of Pikachu on the front and shoulder to get you pumped up.', 6, 29, 'Pikachu Pokémon Active Black Fitted Zip-Up Hoodie '),
(2, '49.99', 11, 'Stay warm and keep your spirit of adventure flying high at the same time!', 7, 30, 'Exploring with Pikachu Fitted Hoodie - Adult'),
(2, '37.80', 12, 'Look very stylish in this 3D Pikachu Printed Hoodie while also staying warm and comfortable', 6, 30, 'Casual Hoodie 3D Printing Anime Wizard Pikachu'),
(3, '19.99', 13, 'The electrifying Pikachu is finally available as a big-eared plush hat!', 7, 29, 'Pikachu Poké Plush Hat'),
(3, '24.99', 14, 'Gear up to hit a home run for the ages in this striped cap that mixes a classic baseball look with the fun of Pokémon!', 8, 30, 'Pikachu Navy & White Stripe Baseball Hat'),
(3, '24.99', 15, 'Pikachu is thrilled to be flying through the wide open sky along with Swablu and Altaria on this fun snapback cap!', 4, 29, 'Pikachu Balloon Adventure Flat-Bill Hat (One Size-'),
(3, '15.99', 16, 'When it comes to suiting up for fun in the sun, this Pikachu bucket hat has your fashion needs (and head!) covered.', 2, 30, 'Pokémon Tropical Pikachu Lightning Blue Reversible'),
(3, '11.00', 17, 'Join forces with Pikachu and get ready for your next winter escapade with the Pikachu beanie.', 1, 30, 'Pokemon Pikachu Cuffed Beanie - Yellow'),
(3, '7.92', 18, 'Movable Bunny Hat - Moving Bunny Ear Hat When Pressing The Paw, Very Funny.', 5, 30, 'Jumping Hat Funny Bunny Plush Hat Cap'),
(4, '35.99', 19, 'Just when you thought it was not possible, Pikachu has gotten even cuter than ever before!', 5, 29, 'Pikachu Large Microbead Plush - 13 ¾ In.'),
(4, '12.99', 20, 'Relaxed and cheerful, this absolute icon of the Pokémon world is the perfect gift for any Pokémon fan—whether they are an enthusiastic Youngster or an experienced Ace Trainer!', 6, 30, 'Sitting Pikachu Poké Plush - 8 In.'),
(4, '15.00', 21, 'Enjoy a very soft and relaxing pillow plushie of Pikachu!', 3, 30, 'Pikachu Very Soft Plush Pillow'),
(4, '19.99', 22, 'The small and interesting shape is suitable for people of all ages,and it can be your friend or good companion.', 1, 30, 'Plush Doll with Smiling Face and Poncho Pillow'),
(4, '17.99', 23, 'Pikachu is ready to graduate in cap and gown!', 3, 30, 'Pikachu Celebrations: Graduate Pikachu Poké Plush '),
(4, '19.99', 24, 'The Safari Pikachu Poké Plush is ready to go exploring with you!', 8, 30, 'Safari Pikachu Poké Plush - 8 In.'),
(5, '19.99', 25, 'Keep the warm in when you go out with a knit scarf featuring Pikachu!', 1, 29, 'Pikachu Festive Winter Blue Knit Scarf'),
(5, '14.99', 26, 'These Pikachu Festive Winter Blue Touch Screen Gloves keep your fingers nicely warm in winter weather!', 8, 30, 'Pikachu Festive Winter Blue Touch Screen Gloves'),
(5, '9.99', 27, 'This Halloween Circus Plush Keychain shows off Pikachus playful, colorful side!', 3, 29, 'Pikachu Halloween Circus Poké Plush Key Chain'),
(5, '14.99', 28, 'This Graduation Pikachu mug shows two Pikachu dressed in caps and gowns, ready to take their next steps into a wider world.', 5, 29, 'Graduation Pikachu 2022 14 oz. Mug'),
(5, '34.99', 29, 'No matter who you chose as your first partner Pokémon, if you have traveled through Alola or Galar!', 3, 30, 'Pikachu & Eevee Lanyard & Mini Pokémon Pins'),
(5, '49.99', 30, 'Carry your must-have cards—from your drivers license and work badge to your debit and credit cards!', 4, 30, 'Pokémon × Fossil: Pikachu Yellow Card Carrier'),
(5, '12.99', 31, 'The Pikachu & Raichu Pokémon Pixel Pins deliver these Electric-type Kanto Pokémon in their original form, with bright metal backing.', 5, 30, 'Pikachu & Raichu Pokémon Pixel Pins (2-Pack)'),
(6, '21.00', 32, 'Keep the warm in these comfortable Pikachu cuffed Joggers!', 5, 29, 'Pokemon Cuffed Jogger Pant'),
(6, '20.93', 33, 'Every Pokémon trainer wants to dress comfortably and relax after a long day of Pokémon training.', 3, 30, 'Pokémon Pikachu Electric Type Sleep Pants'),
(6, '29.90', 34, 'Plush jogger pants with elastic waistband and front adjustable drawstring. Front pockets and back label appliqué.', 3, 30, 'PIKACHU POKÉMON TM © NINTENDO PANTS'),
(6, '20.00', 35, 'These are very comfortable and stylish joggers to do anything in while showing off your Pikachu trainer side!', 2, 30, 'Pokemon Cuffed Jogger Pants'),
(6, '11.96', 36, 'These sleep pants with Pikachu print are an awesome addition to your sleepwear attire, Pokémon fans will love these lounge pants. These sleep pants with Pikachu print are an awesome addition to your sleepwear attire, Pokémon fans will love these lounge pants.', 6, 30, 'Pokémon Printed Pockets Elastic Waistband'),
(6, '54.99', 37, 'With a high-density print featuring the PUMA × Pokémon logo and a graphic of Pikachu in a fighting pose on the right, these yellow cotton shorts bring a streetwear vibe with authentic Pokémon details to your closet.', 7, 29, 'Pikachu Yellow French Terry Shorts');

-- --------------------------------------------------------

--
-- Table structure for table `SELLER`
--

CREATE TABLE `SELLER` (
  `Fname` varchar(50) NOT NULL,
  `Minit` varchar(50) DEFAULT NULL,
  `Lname` varchar(50) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `Pword` varchar(255) NOT NULL,
  `SellID` int(50) NOT NULL,
  `Email` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `SELLER`
--

INSERT INTO `SELLER` (`Fname`, `Minit`, `Lname`, `UserName`, `Pword`, `SellID`, `Email`) VALUES
('Michael', '', 'Abbondandolo', 'mikeabb', '$2y$10$/yLcsJfho5oKodG.quf7Pub8HMmx6i1qhyxWCWarGqxiZW4qRTIhC', 1, 'test@google.com'),
('John', '', 'Dobroskok', 'dobroskokj1', '$2y$10$x1Giq/.4Na65IxZza8iPOOjb2DQxRxAwGZDd78mKnDZ9b/hsQtW.y', 3, 'dobroskokj1@montclair.edu'),
('New', '', 'Seller', 'newseller', '$2y$10$Ng0aHXv0vqPzGsDbX9MJqO8a1KtwUMS4xbFZ2U5W1EWAyh1AAg8BW', 6, 'new@seller.com'),
('Pikachu', '', 'Seller', 'pikachu', '$2y$10$uh2AF36lNa1o1//5fPWMv.m.A3cl5X7vGjTv8Gze3B3Y34a7KpxYC', 7, 'pikachu@seller.com');

-- --------------------------------------------------------

--
-- Table structure for table `SHOPPING_CART`
--

CREATE TABLE `SHOPPING_CART` (
  `CustID` int(25) NOT NULL,
  `ProductName` varchar(50) NOT NULL,
  `ProductNum` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `ItemID` int(11) NOT NULL,
  `Price` double(4,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `SHOPPING_CART`
--

INSERT INTO `SHOPPING_CART` (`CustID`, `ProductName`, `ProductNum`, `Quantity`, `ItemID`, `Price`) VALUES
(9, 'Pokémon Boys Pikachu Game Shirt', 1, 1, 39, 29.99),
(9, 'Pokémon Pikachu Japanese Puzzle T-Shirt', 3, 2, 40, 19.95),
(9, 'Pikachu Pokémon Jackets Black Insulated Snap-Down ', 9, 1, 41, 99.99),
(9, 'Pikachu Festive Winter Blue Touch Screen Gloves', 26, 1, 87, 14.99),
(10, 'Pokémon Pikachu Poke Ball Icon T-Shirt', 2, 1, 86, 12.99),
(9, 'Pikachu Large Microbead Plush - 13 ¾ In.', 19, 1, 47, 35.99),
(9, 'Pikachu Festive Winter Blue Knit Scarf', 25, 1, 49, 19.99),
(9, 'Pikachu Pokémon Active Black Fitted Zip-Up Hoodie ', 10, 1, 88, 49.99),
(9, 'Exploring with Pikachu Fitted Hoodie - Adult', 11, 1, 53, 49.99),
(9, 'Pokemon Cuffed Jogger Pant', 32, 1, 58, 21.00),
(9, 'Sitting Pikachu Poké Plush - 8 In.', 20, 1, 59, 12.99),
(20, 'Pokémon Boys Pikachu Game Shirt', 1, 1, 104, 29.99);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ADMIN`
--
ALTER TABLE `ADMIN`
  ADD PRIMARY KEY (`UserName`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `CATEGORY`
--
ALTER TABLE `CATEGORY`
  ADD PRIMARY KEY (`Cnum`),
  ADD UNIQUE KEY `Cname` (`Cname`);

--
-- Indexes for table `CREDENTIALS`
--
ALTER TABLE `CREDENTIALS`
  ADD PRIMARY KEY (`userName`),
  ADD KEY `Fname` (`Fname`),
  ADD KEY `Lname` (`Lname`);

--
-- Indexes for table `CUSTOMER`
--
ALTER TABLE `CUSTOMER`
  ADD PRIMARY KEY (`CustID`),
  ADD UNIQUE KEY `UserName` (`UserName`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `EMPLOYEE`
--
ALTER TABLE `EMPLOYEE`
  ADD PRIMARY KEY (`EmpID`),
  ADD UNIQUE KEY `SSN` (`SSN`);

--
-- Indexes for table `ORDERS`
--
ALTER TABLE `ORDERS`
  ADD PRIMARY KEY (`OrderNum`),
  ADD KEY `Street` (`Street`),
  ADD KEY `STATE` (`State`),
  ADD KEY `City` (`City`),
  ADD KEY `Zip` (`Zip`),
  ADD KEY `CustomerID` (`CustomerID`);

--
-- Indexes for table `ORDER_ITEMS`
--
ALTER TABLE `ORDER_ITEMS`
  ADD PRIMARY KEY (`OrderID`,`ProductNum`);

--
-- Indexes for table `PRODUCT`
--
ALTER TABLE `PRODUCT`
  ADD PRIMARY KEY (`ProductNum`),
  ADD KEY `CategoryNum` (`CategoryNum`),
  ADD KEY `SellerNum` (`SellerNum`);

--
-- Indexes for table `SELLER`
--
ALTER TABLE `SELLER`
  ADD PRIMARY KEY (`SellID`),
  ADD UNIQUE KEY `UserName` (`UserName`);

--
-- Indexes for table `SHOPPING_CART`
--
ALTER TABLE `SHOPPING_CART`
  ADD PRIMARY KEY (`ItemID`),
  ADD KEY `ProductName` (`ProductName`),
  ADD KEY `ProductNum` (`ProductNum`),
  ADD KEY `CustID` (`CustID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `CATEGORY`
--
ALTER TABLE `CATEGORY`
  MODIFY `Cnum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `CUSTOMER`
--
ALTER TABLE `CUSTOMER`
  MODIFY `CustID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `EMPLOYEE`
--
ALTER TABLE `EMPLOYEE`
  MODIFY `EmpID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ORDERS`
--
ALTER TABLE `ORDERS`
  MODIFY `OrderNum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `PRODUCT`
--
ALTER TABLE `PRODUCT`
  MODIFY `ProductNum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `SELLER`
--
ALTER TABLE `SELLER`
  MODIFY `SellID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `SHOPPING_CART`
--
ALTER TABLE `SHOPPING_CART`
  MODIFY `ItemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
