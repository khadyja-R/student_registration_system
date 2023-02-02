-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2022 at 05:05 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inscription`
--

-- --------------------------------------------------------

--
-- Table structure for table `admn`
--

CREATE TABLE `admn` (
  `id` int(11) NOT NULL,
  `password` varchar(40) DEFAULT NULL,
  `email` varchar(55) NOT NULL,
  `confirm_pass` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admn`
--

INSERT INTO `admn` (`id`, `password`, `email`, `confirm_pass`) VALUES
(1, '1234', 'khadyja@gmail.com', '1234'),
(2, '123', 'ramii.khadyja@gmail.com', '123'),
(3, 'rm', 'khadyjarm@gmail.com', 'rm');

-- --------------------------------------------------------

--
-- Table structure for table `bac_type`
--

CREATE TABLE `bac_type` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bac_type`
--

INSERT INTO `bac_type` (`id`, `name`) VALUES
(3, 'science agronomique '),
(12, 'science math A'),
(1, 'science math B '),
(14, 'science physique'),
(15, 'SVT');

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `page_content` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `language_type` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `page_content`, `language_type`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas at suscipit urna. Mauris ac lectus aliquet, lobortis massa ac, eleifend risus. Donec sit amet libero et nisi venenatis laoreet nec at tortor. Sed dictum, est at varius convallis, justo mi bibendum nulla, eget finibus arcu ipsum in tortor. Nullam pulvinar varius egestas. Aliquam vel euismod quam, ut suscipit lacus. Suspendisse turpis enim, lobortis sit amet consectetur vitae, euismod et turpis.', 'en'),
(2, 'लचकनहि क्षमता। जनित खरिदे रचना देखने सोफ़्टवेर विश्वव्यापि माहितीवानीज्य व्याख्या पुष्टिकर्ता माहितीवानीज्य समजते कलइस जानकारी प्राथमिक सकते संदेश बहुत कराना तकरीबन विभाजन तकनिकल दिनांक संपुर्ण जिसे पहोच। अत्यंत परस्पर संसाध जोवे नाकर सहायता विभाजनक्षमता बलवान विकास यधपि सारांश भारतीय सीमित करती जिम्मे व्यवहार प्राण सकता अंतर्गत पुर्णता दारी भारतीय हुएआदि समस्याए पुर्व सुचना जागरुक संस्थान विभाजनक्षमता पढाए बढाता ।क ऎसाजीस अन्तरराष्ट्रीयकरन', 'fr');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `bac_year` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `sector_id1` int(11) DEFAULT NULL,
  `sector_id2` int(11) DEFAULT NULL,
  `bac_type_id` int(11) DEFAULT NULL,
  `school_year` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `bac_year`, `student_id`, `sector_id1`, `sector_id2`, `bac_type_id`, `school_year`) VALUES
(48, 2018, 378, 31, 37, 14, 2022),
(49, 2020, 379, 35, 37, 14, 2022),
(50, 2021, 380, 35, 37, 14, 2022);

-- --------------------------------------------------------

--
-- Table structure for table `sector`
--

CREATE TABLE `sector` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sector`
--

INSERT INTO `sector` (`id`, `name`) VALUES
(31, 'Génie Industriel et Maintenance'),
(35, 'Génie Informatique\r\n'),
(37, 'Techniques de Management\r\n\r\n '),
(36, 'Techniques Instrumentales et Management de Qualité\r\n\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `limite` int(50) NOT NULL DEFAULT 0,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `cin` varchar(50) NOT NULL,
  `cne` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `adress` varchar(55) NOT NULL,
  `nationality` varchar(55) NOT NULL DEFAULT 'Moroccan',
  `birthday` date NOT NULL,
  `confirm_password` varchar(155) NOT NULL,
  `password` varchar(55) NOT NULL,
  `bac_note` varchar(50) NOT NULL,
  `situation` varchar(55) DEFAULT NULL,
  `personal_picture` varchar(255) NOT NULL,
  `bac_recto` varchar(255) NOT NULL,
  `bac_verso` varchar(255) NOT NULL,
  `Cin_Verso` varchar(255) DEFAULT NULL,
  `Cin_Recto` varchar(255) DEFAULT NULL,
  `releve_bac` varchar(255) DEFAULT NULL,
  `gender` varchar(55) NOT NULL,
  `last_update` date DEFAULT NULL,
  `can_update` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `limite`, `first_name`, `last_name`, `cin`, `cne`, `email`, `phone`, `adress`, `nationality`, `birthday`, `confirm_password`, `password`, `bac_note`, `situation`, `personal_picture`, `bac_recto`, `bac_verso`, `Cin_Verso`, `Cin_Recto`, `releve_bac`, `gender`, `last_update`, `can_update`) VALUES
(378, 0, 'amal', 'najimi', 'mc3456', 'l6789543', 'amal@gmail.com', '0698456789', 'oulad taima', 'MAR', '2001-02-13', 'amal', 'amal', '14', 'marié(e)', 'personal_images/1671254963WhatsApp Image 2022-12-17 at 6.28.39 AM.jpeg', 'bac_images/index.png', 'bac_images/login.png', 'cin_images/Screenshot 2022-12-17 004936.png', 'cin_images/index.png', 'bac_images/Screenshot 2022-12-17 004936.png', 'féminin', '2022-12-17', 0),
(379, 0, 'Khadyja', 'Rami', 'MC308684', 'k110101587', 'rami.khadyja@gmail.com', '0682503737', 'SIDI BENNEUR', 'MAR', '2003-02-10', 'ramirami', 'ramirami', '16.89', 'Célibataire', 'personal_images/1671256507WhatsApp Image 2022-12-17 at 6.28.39 AM.jpeg', 'bac_images/footer.png', 'bac_images/login.png', 'cin_images/tele.png', 'cin_images/Screenshot 2022-12-17 010511.png', 'bac_images/index.png', 'féminin', '2022-12-17', 1),
(380, 0, 'hassna', 'rami', 'MC34567', 'k6785432', 'hassna@gmail.com', '07989545', 'SIDI BENNEUR', 'MAR', '2003-02-06', 'rami123', 'rami123', '14', 'Célibataire', 'personal_images/1671258110WhatsApp Image 2022-12-17 at 6.29.43 AM.jpeg', 'bac_images/footer.png', 'bac_images/login.png', 'cin_images/tele.png', 'cin_images/Screenshot 2022-12-17 010511.png', 'bac_images/index.png', 'féminin', '2022-12-17', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admn`
--
ALTER TABLE `admn`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `bac_type`
--
ALTER TABLE `bac_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bac_type_id` (`bac_type_id`),
  ADD KEY `sector_id1` (`sector_id1`,`sector_id2`);

--
-- Indexes for table `sector`
--
ALTER TABLE `sector`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `cne` (`cne`),
  ADD UNIQUE KEY `cin` (`cin`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admn`
--
ALTER TABLE `admn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bac_type`
--
ALTER TABLE `bac_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `sector`
--
ALTER TABLE `sector`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=382;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
