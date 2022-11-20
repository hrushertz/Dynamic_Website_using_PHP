-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2021 at 04:37 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `best_places_india`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `comment` varchar(100) NOT NULL,
  `is_deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `image_gallery`
--

CREATE TABLE `image_gallery` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image_gallery`
--

INSERT INTO `image_gallery` (`id`, `name`, `image`) VALUES
(1, 'ausa', 'images/6.jpg'),
(2, 'ausa', 'images/4.jpg'),
(3, '2', 'images/6.jpg'),
(4, '2', 'images/6.jpg'),
(5, '', 'images/6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `master_banner`
--

CREATE TABLE `master_banner` (
  `id` int(11) NOT NULL,
  `image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_banner`
--

INSERT INTO `master_banner` (`id`, `image`) VALUES
(1, 'images/18.jpg'),
(2, 'images/7.jpg'),
(3, 'images/9.jpg'),
(4, 'images/4.jpg'),
(5, 'images/40.jpg'),
(6, 'images/22.jpg'),
(7, 'images/47.jpg'),
(8, 'images/41.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `master_places`
--

CREATE TABLE `master_places` (
  `id` int(11) NOT NULL,
  `place_name` varchar(1000) NOT NULL,
  `place_desc` varchar(10000) NOT NULL,
  `image` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `opentime` varchar(100) NOT NULL,
  `heights` varchar(100) NOT NULL,
  `floors` varchar(100) NOT NULL,
  `Alt_names` varchar(1000) NOT NULL,
  `architect` varchar(1000) NOT NULL,
  `contractor` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_places`
--

INSERT INTO `master_places` (`id`, `place_name`, `place_desc`, `image`, `location`, `address`, `opentime`, `heights`, `floors`, `Alt_names`, `architect`, `contractor`) VALUES
(1, 'Vijaya Stambha', 'The Vijaya Stambha is an imposing victory monument located within Chittor Fort in Chittorgarh, Rajasthan, India. The tower was constructed by the Hindu king Rana Kumbha of Mewar in 1448.\r\nThe Vijaya Stambha is an imposing victory monument located within Chittor Fort in Chittorgarh, Rajasthan, India. The tower was constructed by the Hindu king Rana Kumbha of Mewar in 1448 to commemorate his victory over the combined armies of Malwa and Gujarat sultanates led by Mahmud Khilji\r\n', 'images/3.jpg', 'Chittorgarh Fort', 'Chittorgarh Fort Village, Chittorgarh, Rajasthan 312001', ' Open 8AM ? Closes 6PM', '37 m', '9', 'Victory Tower', 'Sutradhar Jaita', 'MOHAMMAD ALI'),
(2, 'Narayaneshwar Mahadev Mandir', 'Narayaneshwar Mahadev Mandir and Puneshwar were two temples in Pune that were demolished under the rule of the Delhi sultanate led by Nizamuddin and other.\r\nThe Narayaneshwar Mahadev temple in Maharashtra. It is around 35kms from Pune and near to Purandar Fort.\r\nNarayaneshwar Mahadev Mandir and Puneshwar were two temples in Pune that were demolished under the rule of the Delhi sultanate led by Nizamuddin and other.\r\n', 'images/9.jpg', 'Pune', 'Darga, apte ghat shaniwar peth opposite shaniwar wada next to badi, Pune, Maharashtra 411030', 'Open 24 Hours', 'NA', 'NA', 'NA', 'NA', 'NA'),
(3, 'BAPS YOGI SMRUTI TEMPLE', 'The new, single-shrine mandir is built of Jaisalmer stone and embellished with beautiful intricately carved designs and statues.\r\nHis Holiness Mahant Swami Maharaj performed the murti-pratishtha ceremony of the new Yogi Smruti Mandir, rebuilt over the sacred spot where the final rites of Brahmaswarup Yogiji Maharaj were performed in January 1971.\r\nThe original memorial in honour of Brahmaswarup Yogiji Maharaj was inaugurated in 1975 by Brahmaswarup Pramukh Swami Maharaj, and as per his wish the new memorial mandir has been built.\r\n', 'images/8.jpg', 'Gujrat', 'XRG2+HJ2, Yogi Nagar, Gondal, Gujarat 360311', 'Open 24 Hours', 'NA', 'NA', 'NA', 'NA', 'NA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_gallery`
--
ALTER TABLE `image_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_banner`
--
ALTER TABLE `master_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_places`
--
ALTER TABLE `master_places`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `image_gallery`
--
ALTER TABLE `image_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `master_banner`
--
ALTER TABLE `master_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `master_places`
--
ALTER TABLE `master_places`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
