-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2014 at 08:54 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(3) NOT NULL,
  `firstName` varchar(15) NOT NULL,
  `lastName` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phoneNumber` int(11) NOT NULL,
  `addressLine1` varchar(30) NOT NULL,
  `addressLine2` varchar(30) NOT NULL,
  `addressCity` varchar(15) NOT NULL,
  `addressPostal` varchar(6) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `picturearrays`
--

CREATE TABLE IF NOT EXISTS `picturearrays` (
  `productID` int(11) NOT NULL,
  `pictureLink` varchar(60) NOT NULL,
  `pictureNum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `picturearrays`
--

INSERT INTO `picturearrays` (`productID`, `pictureLink`, `pictureNum`) VALUES
(1, 'http://i.ebayimg.com/t/Makita-', 0);

-- --------------------------------------------------------

--
-- Table structure for table `productorders`
--

CREATE TABLE IF NOT EXISTS `productorders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `productIDArray` text NOT NULL,
  `productQuantityArray` text NOT NULL,
  `customerID` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `authorisationString` text NOT NULL,
  `totalPrice` decimal(10,2) NOT NULL,
  `statusID` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `manufacturer` varchar(15) NOT NULL,
  `description` text NOT NULL,
  `categoryID` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `specification` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `manufacturer`, `description`, `categoryID`, `price`, `specification`) VALUES
(1, ' Makita HP457DWEX2 18V Li-Ion ', 'Makita', '  Description test  ', 2, '130.00', '  Spec Test'),
(2, ' Dewalt 18v Li-ion Cordless Ha', 'Dewalt', '  Dewalt Desc  ', 1, '70.00', '  Dewalt Spec'),
(3, 'STANLEY Cushion Grip Screwdriv', ' STANLEY ', '   Cushion grip screwdriver set with corrosion resistant, high grade chrome plated steel bars - reduces the chance of tip breakage.\r\nLarge diameter soft-grip handles with smooth domed end for excellent torque, fast spinning action and comfort in use. Tip identification in the handle to match the right screwdriver to screw type.\r\nMagnetic tips for easy pick-up and screw location.    ', 2, '7.00', '   4 Piece set\r\nParallel \r\n6.5 mm x 100 mm\r\nFlared \r\n5.5 mm x 100 mm\r\nPhillips \r\nPH.1 x 100 mm\r\nPH.2 x 150 mm'),
(4, '   MENS REDHAWK WORK WEAR   ', '   DICKIES  ', '    Mens Dickies Heavy Duty Work Trousers In Black, Navy Blue and Grey. \r\nZip + Button Front Fastening.\r\nZipped Hand Pockets and Back Pockets\r\nZipped Thigh Pocket\r\nKnee Pad Pouches\r\n\r\nLeg lengths are measured down the inside leg.\r\n\r\nThe are shown on the product as the following:\r\nS = 30"\r\nR = 32"\r\nT = 34"       ', 4, '15.00', '    Waist Sizes\r\n30" = 76.2cm\r\n32" = 81.2cm\r\n34" = 86.4cm\r\n36" = 91.5cm\r\n38" = 96.5cm\r\n40" = 101.6cm\r\n42" = 106.7cm\r\n44" = 111.8cm\r\n46" = 116.8'),
(5, '  DEWALT DCS391 XR 18V 18VOLT ', ' Dewalt ', '   Scale for precise cutting depth setting to 67 mm\r\nGeneral purpose ripping, cross-cutting and bevelling circular saw for wood and other construction materials\r\nHigh torque motor for durability and power for cutting job site and joinery materials\r\nStable block construction for low vibration running and long service life\r\nAdditional handle for safe two-handed work\r\nVariable adjustment of the bevel angle to 57 degrees\r\nOptimum balance for safe, fatigue-free operation\r\nProtection hood for up to 95% sawdust extraction    ', 1, '80.00', '   Power Input: 1600 Watts\r\nPower Output: 1000 Watts\r\nNo Load Speed: 5200 rpm\r\nBlade Diameter: 190 mm\r\nBlade Bore: 30 mm\r\nBevel Capacity: 57 °\r\nMax. Depth of Cut at 90º: 67 mm\r\nMax. Depth of Cut at 45º: 49 mm\r\nWeight: 4.0 kg\r\nLength: 355 mm\r\nHeight: 245 mm\r\nTotal Shipping Weight: 6kg'),
(10, '240v Drill', 'Makita', 'Excellent drill. Really fast.', 1, '60.00', ' 300mmx200mm');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
  `productID` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `reviewTitle` varchar(15) NOT NULL,
  `reviewBody` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
