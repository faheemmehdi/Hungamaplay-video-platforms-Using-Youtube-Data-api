-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2021 at 07:21 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hungamap_u_play`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` int(11) NOT NULL,
  `header_ad` varchar(1000) NOT NULL,
  `mobile_header_ad` varchar(1000) NOT NULL,
  `footer_ad` varchar(1000) NOT NULL,
  `homepage_ad` varchar(1000) NOT NULL,
  `search_ad` varchar(1000) NOT NULL,
  `category_ad` varchar(1000) NOT NULL,
  `channel_ad` varchar(1000) NOT NULL,
  `player_popup` varchar(1000) NOT NULL,
  `player_ad` varchar(1000) NOT NULL,
  `player_mid_ad` varchar(1000) NOT NULL,
  `player_post_ad` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `header_ad`, `mobile_header_ad`, `footer_ad`, `homepage_ad`, `search_ad`, `category_ad`, `channel_ad`, `player_popup`, `player_ad`, `player_mid_ad`, `player_post_ad`) VALUES
(1, '<script type=\"text/javascript\">\r\n	atOptions = {\r\n		\'key\' : \'e0c8302db7875571fa45be5c736d0f6b\',\r\n		\'format\' : \'iframe\',\r\n		\'height\' : 60,\r\n		\'width\' : 468,\r\n		\'params\' : {}\r\n	};\r\n	document.write(\'<scr\' + \'ipt type=\"text/javascript\" src=\"http\' + (location.protocol === \'https:\' ? \'s\' : \'\') + \'://www.displayformatrevenue.com/e0c8302db7875571fa45be5c736d0f6b/invoke.js\"></scr\' + \'ipt>\');\r\n</script>', ' <script type=\"text/javascript\">\r\n  atOptions = {\r\n    \'key\' : \'e0c8302db7875571fa45be5c736d0f6b\',\r\n    \'format\' : \'iframe\',\r\n    \'height\' : 60,\r\n    \'width\' : 468,\r\n    \'params\' : {}\r\n  };\r\n  document.write(\'<scr\' + \'ipt type=\"text/javascript\" src=\"http\' + (location.protocol === \'https:\' ? \'s\' : \'\') + \'://www.displayformatrevenue.com/e0c8302db7875571fa45be5c736d0f6b/invoke.js\"></scr\' + \'ipt>\');\r\n</script>', '<script type=\"text/javascript\">\r\n	atOptions = {\r\n		\'key\' : \'0187c8e0375a1cb45ffc3fb29eccf829\',\r\n		\'format\' : \'iframe\',\r\n		\'height\' : 90,\r\n		\'width\' : 728,\r\n		\'params\' : {}\r\n	};\r\n	document.write(\'<scr\' + \'ipt type=\"text/javascript\" src=\"http\' + (location.protocol === \'https:\' ? \'s\' : \'\') + \'://www.displayformatrevenue.com/0187c8e0375a1cb45ffc3fb29eccf829/invoke.js\"></scr\' + \'ipt>\');\r\n</script>', '<script type=\"text/javascript\"> 	atOptions = { 		\'key\' : \'7cf81ff215de6839a0c5f83a9cb8f075\', 		\'format\' : \'iframe\', 		\'height\' : 250, 		\'width\' : 300, 		\'params\' : {} 	}; 	document.write(\'<scr\' + \'ipt type=\"text/javascript\" src=\"http\' + (location.protocol === \'https:\' ? \'s\' : \'\') + \'://www.displayformatrevenue.com/7cf81ff215de6839a0c5f83a9cb8f075/invoke.js\"></scr\' + \'ipt>\'); </script>', '<script type=\"text/javascript\"> 	atOptions = { 		\'key\' : \'d63bcde38c43a22bfaf93e191701fb55\', 		\'format\' : \'iframe\', 		\'height\' : 600, 		\'width\' : 160, 		\'params\' : {} 	}; 	document.write(\'<scr\' + \'ipt type=\"text/javascript\" src=\"http\' + (location.protocol === \'https:\' ? \'s\' : \'\') + \'://www.displayformatrevenue.com/d63bcde38c43a22bfaf93e191701fb55/invoke.js\"></scr\' + \'ipt>\'); </script>', '<script type=\"text/javascript\"> 	atOptions = { 		\'key\' : \'4692130c7f3dafaed491a543a7367196\', 		\'format\' : \'iframe\', 		\'height\' : 300, 		\'width\' : 160, 		\'params\' : {} 	}; 	document.write(\'<scr\' + \'ipt type=\"text/javascript\" src=\"http\' + (location.protocol === \'https:\' ? \'s\' : \'\') + \'://www.displayformatrevenue.com/4692130c7f3dafaed491a543a7367196/invoke.js\"></scr\' + \'ipt>\'); </script>', '<script type=\"text/javascript\"> 	atOptions = { 		\'key\' : \'4692130c7f3dafaed491a543a7367196\', 		\'format\' : \'iframe\', 		\'height\' : 300, 		\'width\' : 160, 		\'params\' : {} 	}; 	document.write(\'<scr\' + \'ipt type=\"text/javascript\" src=\"http\' + (location.protocol === \'https:\' ? \'s\' : \'\') + \'://www.displayformatrevenue.com/4692130c7f3dafaed491a543a7367196/invoke.js\"></scr\' + \'ipt>\'); </script>', '<script type=\"text/javascript\">   atOptions = {     \'key\' : \'da46a915028b101035c1fa16a9a850d8\',     \'format\' : \'iframe\',     \'height\' : 50,     \'width\' : 320,     \'params\' : {}   };   document.write(\'<scr\' + \'ipt type=\"text/javascript\" src=\"http\' + (location.protocol === \'https:\' ? \'s\' : \'\') + \'://www.displayformatrevenue.com/da46a915028b101035c1fa16a9a850d8/invoke.js\"></scr\' + \'ipt>\'); </script>', 'https://www.videosprofitnetwork.com/watch.xml?key=3c531afa5152c5f70cfb892c2ebac513', 'https://www.videosprofitnetwork.com/watch.xml?key=3c531afa5152c5f70cfb892c2ebac513', 'https://www.videosprofitnetwork.com/watch.xml?key=3c531afa5152c5f70cfb892c2ebac513');

-- --------------------------------------------------------

--
-- Table structure for table `api`
--

CREATE TABLE `api` (
  `id` int(11) NOT NULL,
  `api_key` varchar(500) NOT NULL,
  `api_key2` varchar(500) NOT NULL,
  `api_key3` varchar(500) NOT NULL,
  `api_key4` varchar(500) NOT NULL,
  `api_key5` varchar(500) NOT NULL,
  `api_key6` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `api`
--

INSERT INTO `api` (`id`, `api_key`, `api_key2`, `api_key3`, `api_key4`, `api_key5`, `api_key6`) VALUES
(1, 'AIzaSyAYAnx2ppiJQrpO767FQi3L95TwYl4RXnc', 'AIzaSyAYAnx2ppiJQrpO767FQi3L95TwYl4RXnc', '3', '4', '5', '6');

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `id` int(11) NOT NULL,
  `clr` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`id`, `clr`) VALUES
(1, '#d93636');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_subject` varchar(255) NOT NULL,
  `user_msg` varchar(1000) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `user_name`, `user_email`, `user_subject`, `user_msg`, `date_time`) VALUES
(7, 'testing', 'testing@gmail.com', 'Bug Report', 'hello testing', '2020-12-18 08:45:15'),
(9, 'faheem mehdi', 'bc.oyee@gmail.com', 'Advertise', 'hello sir ', '2020-12-20 08:39:51');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `name`, `email`) VALUES
(1, 'admin', 'de20f43e34ce2c3d24acc6302f428c20cc6c4ae6', 'faheem', 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `visit`
--

CREATE TABLE `visit` (
  `id` int(11) NOT NULL,
  `total_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visit`
--

INSERT INTO `visit` (`id`, `total_count`) VALUES
(1, 14);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `api`
--
ALTER TABLE `api`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visit`
--
ALTER TABLE `visit`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `api`
--
ALTER TABLE `api`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `visit`
--
ALTER TABLE `visit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
