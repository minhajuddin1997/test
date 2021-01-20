-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2020 at 05:00 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dynisty`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `client_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `client_name` varchar(150) NOT NULL,
  `client_email` varchar(150) NOT NULL,
  `client_phone_number` varchar(30) NOT NULL,
  `client_company` varchar(300) DEFAULT NULL,
  `client_website` varchar(300) DEFAULT NULL,
  `client_address` varchar(300) DEFAULT NULL,
  `client_image` varchar(300) DEFAULT NULL,
  `client_city` varchar(300) DEFAULT NULL,
  `client_state` varchar(300) DEFAULT NULL,
  `client_country` varchar(300) DEFAULT NULL,
  `client_password` varchar(300) NOT NULL,
  `forgot_password_token` varchar(300) NOT NULL,
  `pass_change_notification` varchar(100) NOT NULL DEFAULT 'Please change your password if you are logged in for first time',
  `client_status` tinyint(1) NOT NULL DEFAULT 0,
  `client_login_detail` enum('enable','disable') NOT NULL DEFAULT 'enable',
  `last_login` datetime NOT NULL DEFAULT current_timestamp(),
  `online_status` enum('yes','no') DEFAULT NULL,
  `client_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `role_id`, `client_name`, `client_email`, `client_phone_number`, `client_company`, `client_website`, `client_address`, `client_image`, `client_city`, `client_state`, `client_country`, `client_password`, `forgot_password_token`, `pass_change_notification`, `client_status`, `client_login_detail`, `last_login`, `online_status`, `client_date`) VALUES
(1, 5, 'Usman ', 'usman@outsourceinpakistan.com', '987654321', 'Pakistan', 'http://outsourceinpakistan.com/', 'Gulistan-e-Jauhar', '780929_-_Pluto_Pet_Robot_Mascot.png', 'Karachi', 'Sindh', 'Pakistan', '123', '', 'Please change your password if you are logged in for first time', 0, 'enable', '2020-11-23 13:20:05', 'no', '2020-07-07 23:33:17'),
(2, 0, 'Sasha Johnson', 'sashafergusonatc@gmail.com', '(242) 425-2139', 'Game Plan Sports Medicine Services.', '', '', 'WhatsApp_Image_2020-07-09_at_9_04_48_PM.jpeg', 'Nassau', 'NP', 'Bahamas', 'a4750d1ef932f67f9ca82c642cc418ed291030ccdbb3b20537f49cf8cb277af38e76b0dd748d5b90cdcf23d4cbc56c8f7a4f6497f9d09878896de0aa234dce0bEBJTOmwlUzrPsIasWQjcIG7M0UMJECGqmS38SlOYUqw=', '', 'Please change your password if you are logged in for first time', 1, 'enable', '2020-07-14 03:25:24', NULL, '2020-07-14 03:25:24'),
(3, 0, 'Jumping Jack', 'jack@plutoprojects.net', '13477219117', 'United States of America', 'https://www.jumpingjacktaxes.com/', '3877 Dungan Street', 'blank-profile-picture-973460_960_720.png', 'Philadelphia', 'PA', 'United States of America', 'ed8f48b9eec81dc2d069266c72fd01a3a889967e971aa2b2ecfc31e1f03d45cb27b8c574359427671432a23248eedac1cbee542b5b0ffa99bef997c1a78bd265bi7xBUCVbWSaNl5wl+iTmfVEOsapcEc+EqS9On95gCw=', '', 'Please change your password if you are logged in for first time', 1, 'enable', '2020-07-23 05:05:52', '', '2020-07-16 03:11:57'),
(4, 0, 'Latisha McKellar', 'lmckellar@taxontrac.com', '6468688834', 'United States of America', 'https://taxontrac.com', '693 E. 236th Street STR 2', '780929_-_Pluto_Pet_Robot_Mascot.png', 'Bronx', 'New York', 'United States of America', 'acdd65f4a8b795aaee857cbc22075c32fcf79f2276b4d6e6ca181b070f7dc8945954a0c1133beaadfd7e45a0ad5caa2108d68683d7a62abe39750127a92c3d90sSKeLnkT20nEJ/w9LzXSvpqD3K23QWtQ+YrfcEdRelA=', '', 'Please change your password if you are logged in for first time', 0, 'enable', '2020-08-21 18:46:53', '', '2020-07-28 22:36:10'),
(5, 0, 'Daprof Shakur', 'contact@shotsbydmp.info', '9294547664', 'DaProf’s Media Productions', 'https://shotsbydmp.com/', '', '780929_-_Pluto_Pet_Robot_Mascot.png', 'Bronx', 'New York', 'United States of America', 'fc1173c9198bdd36ddfe17ffac6f81c6a02be9c906ab70f3af383b26f22b95686a6f7a92f9f0ecb93c61d4de1aa9e3801de2c0177d5d97d99a1caf9bc5abae57layr1hLrRa7oQtdovhblzqnMyjw7vLdwLmZNkHNIvGk=', '', 'Please change your password if you are logged in for first time', 0, 'enable', '2020-07-29 19:05:14', '', '2020-07-28 23:31:59'),
(6, 0, 'Stephanie Joyner', 'brighterdaytaxes.financial@gmail.com', '2679780138', 'United States of America', 'brighterdayfinancials.com', '2534 N, Broad Street & Huntingdon, Suite 30, Philadelphia, ', '780929_-_Pluto_Pet_Robot_Mascot.png', 'Philadelphia', 'Pennsylvania', 'United States of America', 'd9e4eead2b56fc42ca71777e50afe9b695d3417caa211b7a59092c977ed61447f99d4d82cc2b19a53f5727a8dcd43e8e2a67eba9a75e4b78097a2633436bbfdfABYYm9k6CXSSUjaECx7ZMUb+Q7a0Wz9SB+a/jScp07E=', '', 'Please change your password if you are logged in for first time', 0, 'enable', '2020-07-31 14:58:19', '', '2020-07-29 02:32:30'),
(7, 0, 'Tiffany Woodson', 'twoodson82@gmail.com', '1234567890', 'Woodson Management', '', '', '780929_-_Pluto_Pet_Robot_Mascot.png', '', '', 'United States of America', '1ae6706ad42b7a80bbb95f32d70375154296bf2ab0c075fc451e85ab0d8d2e7e3689142bcc3e78cb7e27046c61f7d76055c784e943f70ab8834c5ce72e9ecc62Lgnkqyy+0TjIX93eRvqMKsb6TCyNFz2gAVRLodzlgu0=', '', 'Please change your password if you are logged in for first time', 0, 'enable', '2020-07-29 06:32:49', NULL, '2020-07-29 06:32:49'),
(8, 0, 'Keith Thompson', 'keith@atltaxman.tax', '1234567890', '', 'atltaxman.tax', '', '780929_-_Pluto_Pet_Robot_Mascot.png', '', '', 'United States of America', '125718a312a5fd009c15323d6af53a27ea21763e8e26a2dd0bcc48caa560e6936e310f94a2eadcad79d1382fe0cdf893f80a18ec42c1e2cb037d1f423999c4f1OqC21p4OkuxUs4/8AiymjrrX7Ldkn+L4gMSpO2odtfM=', '', 'Please change your password if you are logged in for first time', 0, 'enable', '2020-08-05 22:34:55', '', '2020-07-29 06:34:40'),
(9, 0, 'Treyvion Webb', 'webbtrey2@gmail.com', '1234567890', 'Prime Start Taxes', 'primestarttaxes.com', '', '780929_-_Pluto_Pet_Robot_Mascot.png', '', '', 'United States of America', 'ef5ce65e1ee97dc866f9485d8b33a7a5f9d823960dd606b7c48457548192892f4c66d80285f4ca3637131df360f4f84fc890677db527a6f53657caea58a949b9+20eH0mnvUbOHmOzlpiDZO7AuT0EkFJOfQPwpidUvSA=', '', 'Please change your password if you are logged in for first time', 0, 'enable', '2020-07-29 06:41:22', NULL, '2020-07-29 06:41:22'),
(10, 0, 'Mike Soyfer', 'mike@soyfer.com', '1234567890', 'NY Landlords', 'nylandlords.com', '', '780929_-_Pluto_Pet_Robot_Mascot.png', '', '', 'United States of America', '2fe884fdc5deb5a9384007ea108f1e088313dd5de72bd32833d8fa439f55e19b10612592b7ed2289ddb97f4abb9c09b5eed140cf2828ecfe94e722b922dec4edVh/C3sxlJ1eRte6QJ5nmSnuKmaNCrdJDJkGe1kGT54g=', '', 'Please change your password if you are logged in for first time', 0, 'enable', '2020-07-29 07:04:52', NULL, '2020-07-29 07:04:52'),
(11, 0, 'Jumping Jack', 'don@jacktaxes.com', '1234567890', 'Jumping Jack Tax', 'https://www.jumpingjacktaxes.com/', '3877 Dungan Street', 'favicon.png', 'Philadelphia', 'Pennsylvania', 'United States of America', 'd2caed9447511c69a0c7fa5fe8d9c798f7d61be52d8837385e4057637d9bcb139aa3b430ead0bcb6f37b31df09e5677282ca2915b3e8be6ed35622b9effee4a4cx3+Ce72McCrBizXosj/u6jP/4rISFZ5xD0oGmj8zCw=', '', 'Please change your password if you are logged in for first time', 0, 'enable', '2020-08-27 13:58:12', '', '2020-07-29 07:16:22'),
(12, 0, 'Keith Thompson', 'zar.huss786@gmail.com', '7185507179', '', '', '', 'blank-profile-picture-973460_960_720.png', '', '', 'United States of America', 'a53c388589d065022bdb2b99a82b339b4ff9c963c4bcca3076a2ef7708602330faddf3e56504856d6512c610e1412fc13932b0eb456131339db9ffdd868b0a79E8aEnYhn/hsh6Uv3WpLH3B2dSg3FC2z7RUExBtScJlQ=', '', 'Please change your password if you are logged in for first time', 1, 'enable', '2020-08-05 22:32:35', NULL, '2020-08-05 22:32:35'),
(13, 0, 'Cariann Marie', 'Cariannx806@gmail.com', '3476714706', '', '', '', 'blank-profile-picture-973460_960_720.png', '', '', 'United States of America', 'ada3c42b128a1d0838eaedb974bf0ba05c8aa20ea60a41a1f76e11046550864f0102975edb59bf2e5f8bf04c34bce752039210cbceb914d62d698cbfb3561644IAOago/f5jTDDtkhAcSrWgoY4tHhmwzGUaI4XMeskB0=', '', 'Please change your password if you are logged in for first time', 1, 'enable', '2020-08-14 01:26:48', '', '2020-08-14 01:22:14'),
(14, 0, 'Zar Test', 'Yolo123@yahoo.com', '2345678901', '', '', '', 'blank-profile-picture-973460_960_720.png', '', '', 'United States of America', '3dadd910df8ff574be1ccd1cedc7534b49313e181db4c1c8da1a66a3ffd2e4dbb89335f1faceb746ca2aef8cfa4b88b414e5b9c30e7df4982e046606bb08b2fe+vwGMBK/OKoVh0pbqGUJyIBycuNgl4TQJAs5pcKJdyQ=', '', 'Please change your password if you are logged in for first time', 1, 'enable', '2020-08-17 17:11:11', '', '2020-08-17 17:10:14'),
(15, 0, 'Robyia Spriggins', 'robyia@elitefinancial.solutions', '9732074060', 'Elite Financial Solutions', 'elitefinancial.solutions', '', '780929_-_Pluto_Pet_Robot_Mascot.png', 'Clark', 'New Jersey', 'United States of America', '9644472639c14591ec1f8ea39a74a41bae55c7ec094380f777939211fe611f62c92643117e2cb331982fe633c66770c1e37c4928a36ed8bac7c931b8ed6621d1tAI9NX6Xk+DKkrILaED1bT89ts9LBvSRDI7A+Gbwlos=', '', 'Please change your password if you are logged in for first time', 0, 'enable', '2020-08-21 20:36:50', '', '2020-08-21 20:17:41'),
(16, 0, 'Aqiyla McLean', 'info@aplusstaxes.com', '7185179212', 'United States of America', 'https://www.aplusstaxes.com/', 'Brooklyn, NY', '780929_-_Pluto_Pet_Robot_Mascot.png', 'Brooklyn', 'New York', 'United States of America', '7162c2fc986b698cb4b576dfd86a3c2d448a8bb7d03687d6e5d844a145a1d94f0056dcd9bbbf0202291dd2c43f5a41516e5e55878ed6fbb3fa4623658a6c9375ZEbisXUks+c2zg1eHukfwhODlkMFzRSADF4QND3oDWY=', '', 'Please change your password if you are logged in for first time', 0, 'enable', '2020-08-26 19:17:00', '', '2020-08-25 01:29:12'),
(18, 0, 'Nabeel Baig', 'nabeel.baig@technado.co', '03333906233', 'plutoprojects', 'https://plutoprojects.net/', 'H-104, Rufi Green City, Block-18, Gulistan-e-Jauhar', 'blank-profile-picture-973460_960_720.png', 'Karachi', 'Sindh', 'Pakistan', 'f216a9e0b86921373f71734bb792cd997bdcbc93130f67df6e8aad2e2dd052ade39d9500337c734c3615e5e3cb5f9941a1f25a597165ea76925088b072ef178ej5yRLPqvmSgMU19BV1fHwRblDaSKmJWJ53aPGn5iH1o=', '', 'Please change your password if you are logged in for first time', 0, 'enable', '2020-08-26 18:10:44', '', '2020-08-26 18:07:48'),
(19, 5, 'umar arain', 'umer.mansoor@technado.co', '9999999999', '', '', '76Street, 13', 'blank-profile-picture-973460_960_720.png', 'calforonia', 'Alaska', 'Pakistan', 'e9e1b75eb55ce4a1d4fcbe36722dbbb14e55226594b19be2f5f5e8d6c1efe5c7b79829de16132e477c60dcfd247c434fe6253beecf99acb75e50f074a58eb5c9z9CnvkAWDTd8rAHyWXPN8mAdyLa+HuQQu644sh173eM=', '', 'Please change your password if you are logged in for first time', 0, 'enable', '2020-11-16 21:00:23', '', '2020-08-27 16:16:36'),
(20, 0, 'Changeies khan', 'uarain229@gmail.com', '23213232', 'tech', '', 'mangolia street 8', 'blank-profile-picture-973460_960_720.png', 'kkirea', 'olpio', 'Mongolia', 'e9e1b75eb55ce4a1d4fcbe36722dbbb14e55226594b19be2f5f5e8d6c1efe5c7b79829de16132e477c60dcfd247c434fe6253beecf99acb75e50f074a58eb5c9z9CnvkAWDTd8rAHyWXPN8mAdyLa+HuQQu644sh173eM=', '', 'Please change your password if you are logged in for first time', 0, 'enable', '2020-08-27 22:25:41', '', '2020-08-27 20:05:09');

-- --------------------------------------------------------

--
-- Table structure for table `client_projects`
--

CREATE TABLE `client_projects` (
  `client_projects_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `project_name` varchar(300) NOT NULL,
  `project_type` varchar(300) NOT NULL,
  `project_summary` text NOT NULL,
  `project_price` double(10,2) DEFAULT 0.00,
  `project_paid` double(10,2) NOT NULL,
  `project_balance` double(10,2) NOT NULL,
  `delivery_status` varchar(50) DEFAULT NULL,
  `payment_due` enum('Yes','No') NOT NULL DEFAULT 'No',
  `website_url` varchar(300) DEFAULT '#',
  `uploaded_month` int(3) NOT NULL,
  `uploaded_year` varchar(300) NOT NULL DEFAULT '2020',
  `summary_file` varchar(300) DEFAULT NULL,
  `ip_address` varchar(191) DEFAULT NULL,
  `browser` varchar(100) DEFAULT NULL,
  `os` varchar(100) DEFAULT NULL,
  `server_time` varchar(191) DEFAULT NULL,
  `complete_status` enum('completed','pending') NOT NULL DEFAULT 'pending',
  `client_projects_status` tinyint(1) NOT NULL DEFAULT 0,
  `client_projects_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `signature_path` text DEFAULT NULL,
  `perioty_status` enum('high','low','medium','critical','low') DEFAULT NULL,
  `duration_plan` varchar(255) DEFAULT NULL,
  `subscr_plan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_projects`
--

INSERT INTO `client_projects` (`client_projects_id`, `client_id`, `project_name`, `project_type`, `project_summary`, `project_price`, `project_paid`, `project_balance`, `delivery_status`, `payment_due`, `website_url`, `uploaded_month`, `uploaded_year`, `summary_file`, `ip_address`, `browser`, `os`, `server_time`, `complete_status`, `client_projects_status`, `client_projects_date`, `signature_path`, `perioty_status`, `duration_plan`, `subscr_plan`) VALUES
(4, 1, 'trest', '1', '<p>test</p>\r\n', 0.00, 0.00, 0.00, 'Final Delivery', 'No', '#', 7, '2020', NULL, NULL, NULL, NULL, NULL, 'pending', 0, '2020-07-14 23:48:06', NULL, NULL, '', ''),
(29, 4, 'Business Budgeting Series 1: e-Learning', '4', '<p>All necessary files can be found by <a href=\"https://drive.google.com/drive/folders/1_0vbmAg4QNbJB1p2P6S7VuqqK-bbG9Qw?usp=sharing\">clicking here.</a></p>\r\n', 1000.00, 0.00, 1000.00, 'Brief', 'No', '#', 8, '2020', NULL, NULL, NULL, NULL, NULL, 'pending', 0, '2020-08-01 01:03:41', NULL, NULL, '', ''),
(30, 4, 'Credit Repair Page Updates', '4', '<p>These are the plans and pricing to add to the credit repair page.</p>\r\n', 0.00, 0.00, 0.00, 'In-Progress', 'No', '#', 8, '2020', 'Credit_Repair_Page.pdf', NULL, NULL, NULL, NULL, 'pending', 0, '2020-08-03 18:56:23', NULL, NULL, '', ''),
(70, 1, 'test', '16', 'dasda', 23.00, 123.00, 12333.00, 'Brief', 'No', '#', 11, '2020', NULL, NULL, NULL, NULL, NULL, 'pending', 0, '2020-11-20 23:13:15', NULL, NULL, '12', NULL),
(71, 4, 'fffffffff', '17', '111111111111111111111', 99999999.99, 99999999.99, 99999999.99, 'Brief', 'No', '#', 11, '2020', NULL, NULL, NULL, NULL, NULL, 'pending', 0, '2020-11-20 23:13:31', NULL, NULL, '12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `client_project_brief`
--

CREATE TABLE `client_project_brief` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `project_brief_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_project_brief`
--

INSERT INTO `client_project_brief` (`id`, `client_id`, `project_brief_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `client_stage`
--

CREATE TABLE `client_stage` (
  `client_id` int(11) NOT NULL,
  `client_name` varchar(150) NOT NULL,
  `client_email` varchar(150) NOT NULL,
  `client_token` text NOT NULL,
  `client_status` enum('Confirmed','Unconfirmed','','') DEFAULT NULL,
  `client_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_stage`
--

INSERT INTO `client_stage` (`client_id`, `client_name`, `client_email`, `client_token`, `client_status`, `client_date`) VALUES
(1, 'Minhaj', 'minhajchamp@gmail.com', '', 'Unconfirmed', '2020-11-21 19:00:00'),
(2, 'ttttttt', 'test@gmail.com', '', 'Unconfirmed', '2020-11-21 19:00:00'),
(4, 'test', 'themariamfatima.2001@gmail.com', '59303119200', 'Unconfirmed', '2020-11-21 19:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comments_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `comments_text` text NOT NULL,
  `comments_read_admin` enum('read','unread') DEFAULT 'unread',
  `comments_read_client` enum('read','unread') NOT NULL DEFAULT 'unread',
  `comments_status` tinyint(1) NOT NULL DEFAULT 0,
  `comments_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comments_id`, `project_id`, `sender_id`, `comments_text`, `comments_read_admin`, `comments_read_client`, `comments_status`, `comments_date`) VALUES
(1, 31, 5, '<p>Client submitted their documents and client intake form. Schedule C paperwork is needed, client needs to organize their books.</p>\r\n', 'read', 'read', 0, '2020-08-05 21:39:36'),
(2, 31, 8, '<p>Emailed necessary docs</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'read', 'read', 0, '2020-08-05 21:41:07'),
(3, 31, 8, '', 'read', 'read', 0, '2020-08-05 21:41:29'),
(4, 35, 5, '', 'read', 'read', 0, '2020-08-17 17:14:28'),
(5, 35, 5, '<p>Client called today at 8/17/2020 informing about a letter from the USA government and the IRS.<br />\r\nClient stated that the government requested accounting records for their business.<br />\r\nClient was given Profit &amp; Loss statement, and Balance Sheet for the inquiry.</p>\r\n', 'read', 'unread', 0, '2020-08-17 17:32:53'),
(6, 43, 5, '', 'read', 'unread', 0, '2020-08-26 00:37:02'),
(7, 45, 5, '', 'read', 'read', 0, '2020-08-26 00:40:43'),
(8, 51, 5, '<p>Website is awaiting on feedback from client as well as website content.<br />\r\nWebsite mock-up can be found by <a href=\"https://myprojectstaging.com/design/theshift/v3.jpg\">clicking here.</a></p>\r\n\r\n<p>Development is on standby for the website content.<br />\r\nFees can apply if website content requires copywriting services.</p>\r\n', 'read', 'unread', 0, '2020-08-26 01:08:14'),
(9, 56, 5, '<p>test tsset</p>\r\n', 'read', 'read', 0, '2020-08-27 16:22:43'),
(10, 60, 19, '', 'unread', 'read', 0, '2020-11-06 20:00:58'),
(11, 60, 19, '', 'unread', 'read', 0, '2020-11-06 20:03:28'),
(12, 60, 19, '', 'unread', 'read', 0, '2020-11-06 20:07:57'),
(13, 60, 19, '', 'unread', 'read', 0, '2020-11-06 20:08:45'),
(14, 60, 19, '<p>dasdas</p>\r\n', 'unread', 'read', 0, '2020-11-06 20:09:57');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(11) NOT NULL,
  `department_name` varchar(300) NOT NULL,
  `department_status` tinyint(1) NOT NULL DEFAULT 0,
  `department_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_name`, `department_status`, `department_date`) VALUES
(1, 'Project Management', 1, '2020-06-23 05:37:47'),
(2, 'Account Management', 1, '2020-06-23 05:38:08'),
(3, 'Branding & Design', 0, '2020-07-29 07:20:31'),
(4, 'Web Development', 0, '2020-07-29 07:20:39'),
(5, 'App Development', 0, '2020-07-29 07:20:50'),
(6, 'SEO Services', 0, '2020-07-29 07:21:07'),
(7, 'Social Media Marketing', 0, '2020-07-29 07:21:17'),
(8, 'Lead Generation', 0, '2020-07-29 07:21:22'),
(9, 'Content Writing', 0, '2020-07-29 07:21:28'),
(10, 'Video Animation', 0, '2020-07-29 07:21:35'),
(11, 'Online Course', 1, '2020-08-02 00:42:05'),
(12, 'Web Hosting', 0, '2020-08-26 00:41:50'),
(13, 'Business Workshop', 0, '2020-08-26 00:42:17'),
(14, 'Agile Workshop', 0, '2020-08-26 00:42:55'),
(15, 'Maintenance', 0, '2020-08-26 00:43:28'),
(16, 'Test', 0, '2020-08-26 18:18:00'),
(17, 'Yolo', 0, '2020-08-27 16:15:59'),
(18, 'test department', 0, '2020-09-22 17:07:22'),
(19, 'oneagainc test', 0, '2020-09-22 17:21:00');

-- --------------------------------------------------------

--
-- Table structure for table `developer`
--

CREATE TABLE `developer` (
  `developer_id` int(11) NOT NULL,
  `developer_content_image` varchar(300) NOT NULL,
  `developer_nav_image` varchar(300) NOT NULL,
  `developer_login_background` varchar(300) DEFAULT NULL,
  `developer_nav_gradient` varchar(50) NOT NULL,
  `developer_nav_color` varchar(50) NOT NULL,
  `front_content_image` varchar(300) NOT NULL,
  `front_login_back` varchar(300) NOT NULL,
  `front_nav_image` varchar(300) NOT NULL,
  `front_nav_gradient` varchar(300) NOT NULL,
  `front_nav_color` varchar(300) NOT NULL,
  `developer_status` tinyint(1) NOT NULL DEFAULT 0,
  `developer_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `developer`
--

INSERT INTO `developer` (`developer_id`, `developer_content_image`, `developer_nav_image`, `developer_login_background`, `developer_nav_gradient`, `developer_nav_color`, `front_content_image`, `front_login_back`, `front_nav_image`, `front_nav_gradient`, `front_nav_color`, `developer_status`, `developer_date`) VALUES
(1, 'blank-white-image-1024x576.png', 'blank-white-image-1024x576.png', 'BG.png', '#4f8816', '#977d97', 'blank-white-image-1024x576.png', 'BG.png', 'blank-white-image-1024x576.png', '#454545', '#672867', 0, '2020-11-20 23:31:02');

-- --------------------------------------------------------

--
-- Table structure for table `logo_project_brief`
--

CREATE TABLE `logo_project_brief` (
  `id` int(11) NOT NULL,
  `logo_name` varchar(100) NOT NULL,
  `slogan` text NOT NULL,
  `logo_style` varchar(50) NOT NULL,
  `look_and_feel` text NOT NULL,
  `additional_comments` text NOT NULL,
  `upload_brief_file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_admin`
--

CREATE TABLE `master_admin` (
  `master_admin_id` int(11) UNSIGNED NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `master_admin_name` varchar(50) DEFAULT NULL,
  `master_admin_email` varchar(50) DEFAULT NULL,
  `master_admin_phone` varchar(50) DEFAULT NULL,
  `master_admin_designation` varchar(50) DEFAULT NULL,
  `master_admin_password` varchar(255) DEFAULT NULL,
  `master_admin_rest_token` varchar(255) NOT NULL,
  `master_admin_address` varchar(255) DEFAULT NULL,
  `master_admin_image` varchar(255) DEFAULT NULL,
  `master_admin_status` enum('enable','disable') DEFAULT NULL,
  `master_admin_created_by` int(11) DEFAULT NULL,
  `master_admin_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `master_admin_updated_by` int(11) DEFAULT NULL,
  `master_admin_updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `master_admin`
--

INSERT INTO `master_admin` (`master_admin_id`, `role_id`, `master_admin_name`, `master_admin_email`, `master_admin_phone`, `master_admin_designation`, `master_admin_password`, `master_admin_rest_token`, `master_admin_address`, `master_admin_image`, `master_admin_status`, `master_admin_created_by`, `master_admin_created_at`, `master_admin_updated_by`, `master_admin_updated_at`) VALUES
(1, 1, 'Arsalan', 'admin@admin.com', '(222) 222-2222', 'CEO', '44f707cd808af092016f063dae2789b96695dd0be082ab3a98a6eaec0569e0d48f60cffa44e014f2877be12431d91987336014495732a828104d735ec4327e6fIqK5HQs1QdyaZ2EgMrwoisa1hgRnJGti1Zxq6DGIa7c=', '201805312F017A74C0F9A14CE8D666058C35742503C4B5705B0F46C27E976', 'RJ Shopping Mall, Karachi', 'avatar04.png', 'enable', 1, '2019-05-20 20:25:50', 1, '2019-05-25 23:11:52'),
(6, 5, 'Hassan', 'hassan@vendor.com', '(000) 000-0000', 'test designation', '44f707cd808af092016f063dae2789b96695dd0be082ab3a98a6eaec0569e0d48f60cffa44e014f2877be12431d91987336014495732a828104d735ec4327e6fIqK5HQs1QdyaZ2EgMrwoisa1hgRnJGti1Zxq6DGIa7c=', '', 'test', 'user.png', 'enable', 1, '2020-10-13 20:18:35', 1, '2020-10-14 05:22:35'),
(7, 5, 'Ali', 'ali@vendor.com', '03495956432', 'abc designation', '13890c9b34f77aa53bbe9acf47030a8385cedcc5342a4a1f47a30c63fd1bccac5feee7e892305ebab81938d6993af21ac001cad536688a49f4c5ab5f1e5cdf19X493cnHjkxGd7QvApTeHqsGPL12ZKg106p8xpHKX1vY=', '', 'testtest', NULL, 'enable', 1, '2020-10-14 01:52:28', NULL, '0000-00-00 00:00:00'),
(8, 5, 'Muhammad Hassan', 'altaf@vendor.com', '03495656565', 'test', '085908d2b0d2e3f260c1c7030863f479ae2e2fa77815e656c5b5fbaa8c12216e019df28cb60759b07fd403dba2283b063ecd11f9d39d5c42a024b48c0c4ab791rzYACZyxTGDj6NJhsAsl8C9LmDCRgAj5aJ4y4JOd/QI=', '', '`testtest', NULL, 'disable', 1, '2020-10-14 01:55:05', NULL, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `package_name` varchar(20) NOT NULL,
  `package_features` text NOT NULL,
  `package_price` double NOT NULL,
  `package_type` enum('wb','lb','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `package_name`, `package_features`, `package_price`, `package_type`) VALUES
(2, 'Web Ecommerce', 'ECOMMERCE\r\nCONTENT\r\nWA', 120, 'wb');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`) VALUES
(1, '[\"createUser\",\"updateUser\",\"viewUser\",\"deleteUser\",\"createRole\",\"updateRole\",\"viewRole\",\"deleteRole\",\"createClient\",\"updateClient\",\"viewClient\",\"deleteClient\",\"createDepartment\",\"updateDepartment\",\"viewDepartment\",\"deleteDepartment\",\"createDesignation\",\"updateDesignation\",\"viewDesignation\",\"deleteDesignation\",\"createDevelopmentStatus\",\"updateDevelopmentStatus\",\"viewDevelopmentStatus\",\"deleteDevelopmentStatus\",\"createClientProjects\",\"updateClientProjects\",\"viewClientProjects\",\"deleteClientProjects\",\"createAssignProjects\",\"updateAssignProjects\",\"viewAssignProjects\",\"deleteAssignProjects\",\"createAssignResources\",\"updateAssignResources\",\"viewAssignResources\",\"deleteAssignResources\",\"createKpi\",\"updateKpi\",\"viewKpi\",\"deleteKpi\",\"createDomain\",\"updateDomain\",\"viewDomain\",\"deleteDomain\",\"createDomainTarget\",\"updateDomainTarget\",\"viewDomainTarget\",\"deleteDomainTarget\",\"createPayment\",\"viewPayment\",\"createRefund\",\"viewSupport\",\"deleteSupport\",\"viewApp\",\"createBoard\",\"createBoard\",\"viewBoard\",\"deleteBoard\",\"createTemplate\",\"createTemplate\",\"viewTemplate\",\"deleteTemplate\",\"viewClientFile\",\"deleteClientFile\",\"updateDeveloper\",\"updateSetting\",\"updateProfile\",\"viewAnalytics\",\"chat\"]'),
(2, '[\"viewClient\",\"updateClientProjects\",\"viewClientProjects\",\"createAssignProjects\",\"updateAssignProjects\",\"viewAssignProjects\",\"createAssignResources\",\"updateAssignResources\",\"viewAssignResources\",\"createKpi\",\"updateKpi\",\"viewKpi\",\"createPayment\",\"viewPayment\",\"viewSupport\",\"updateProfile\"]'),
(3, '[\"viewClient\"]');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL,
  `role_permission` text NOT NULL,
  `role_status` enum('enable','disable') DEFAULT 'enable',
  `role_created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `role_created_by` int(11) DEFAULT NULL,
  `role_updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `role_updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`, `role_permission`, `role_status`, `role_created_at`, `role_created_by`, `role_updated_at`, `role_updated_by`) VALUES
(1, 'Admin', '[\"createRole\",\"updateRole\",\"viewRole\",\"deleteRole\",\"createUser\",\"updateUser\",\"viewUser\",\"deleteUser\",\"viewCustomer\",\"deleteCustomer\",\"updateSetting\",\"createMake\",\"updateMake\",\"viewMake\",\"deleteMake\",\"createModel\",\"updateModel\",\"viewModel\",\"deleteModel\",\"createProduct\",\"updateProduct\",\"viewProduct\",\"deleteProduct\",\"createNewsletter\",\"viewNewsletter\",\"deleteNewsletter\",\"createTestimonials\",\"updateTestimonials\",\"viewTestimonials\",\"deleteTestimonials\",\"createMessage\",\"viewMessage\",\"deleteMessage\",\"createContact\",\"viewContact\",\"deleteContact\",\"updateSocial\",\"viewSocial\",\"deleteSocial\"]', 'enable', '2020-10-20 22:50:57', 1, '2020-10-20 22:50:57', 1),
(5, 'Client', '[\"createMake\",\"updateMake\",\"viewMake\",\"deleteMake\",\"createModel\",\"updateModel\",\"viewModel\",\"deleteModel\",\"createProduct\",\"updateProduct\",\"viewProduct\",\"deleteProduct\",\"viewNewsletter\",\"deleteNewsletter\"]', 'enable', '2020-11-23 11:41:19', 1, '2020-10-20 22:53:28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) UNSIGNED NOT NULL,
  `role_permission` text NOT NULL,
  `role_name` varchar(50) NOT NULL,
  `role_status` tinyint(1) NOT NULL DEFAULT 0,
  `role_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_permission`, `role_name`, `role_status`, `role_date`) VALUES
(1, '[\"createUser\",\"updateUser\",\"viewUser\",\"deleteUser\",\"createRole\",\"updateRole\",\"viewRole\",\"deleteRole\",\"createClient\",\"updateClient\",\"viewClient\",\"deleteClient\",\"createDepartment\",\"updateDepartment\",\"viewDepartment\",\"deleteDepartment\",\"createDesignation\",\"updateDesignation\",\"viewDesignation\",\"deleteDesignation\",\"createDevelopmentStatus\",\"updateDevelopmentStatus\",\"viewDevelopmentStatus\",\"deleteDevelopmentStatus\",\"createClientProjects\",\"updateClientProjects\",\"viewClientProjects\",\"deleteClientProjects\",\"createAssignProjects\",\"updateAssignProjects\",\"viewAssignProjects\",\"deleteAssignProjects\",\"createAssignResources\",\"updateAssignResources\",\"viewAssignResources\",\"deleteAssignResources\",\"createKpi\",\"updateKpi\",\"viewKpi\",\"deleteKpi\",\"createDomain\",\"updateDomain\",\"viewDomain\",\"deleteDomain\",\"createDomainTarget\",\"updateDomainTarget\",\"viewDomainTarget\",\"deleteDomainTarget\",\"createPayment\",\"viewPayment\",\"createRefund\",\"viewSupport\",\"deleteSupport\",\"viewApp\",\"createBoard\",\"createBoard\",\"viewBoard\",\"deleteBoard\",\"createTemplate\",\"createTemplate\",\"viewTemplate\",\"deleteTemplate\",\"viewClientFile\",\"deleteClientFile\",\"updateDeveloper\",\"updateSetting\",\"updateProfile\",\"viewAnalytics\"]', 'admin', 0, '2020-10-08 12:52:49'),
(7, '[\"viewClient\",\"createClientProjects\",\"updateClientProjects\",\"viewClientProjects\",\"createAssignProjects\",\"updateAssignProjects\",\"viewAssignProjects\",\"createAssignResources\",\"updateAssignResources\",\"viewAssignResources\",\"createKpi\",\"updateKpi\",\"viewKpi\",\"createPayment\",\"viewPayment\",\"viewSupport\",\"updateProfile\"]', 'Account Management', 0, '2020-07-24 20:17:58'),
(8, '[\"viewClient\"]', 'test', 0, '2020-04-22 17:12:31'),
(9, '[\"updateAssignProjects\",\"viewAssignProjects\",\"updateAssignResources\",\"viewAssignResources\",\"createKpi\",\"updateKpi\",\"viewKpi\",\"updateProfile\"]', 'Production', 0, '2020-07-13 20:58:49'),
(10, '[\"createClient\",\"updateClient\",\"viewClient\",\"createClientProjects\",\"updateClientProjects\",\"viewClientProjects\",\"createAssignProjects\",\"updateAssignProjects\",\"viewAssignProjects\",\"createPayment\",\"viewPayment\",\"viewSupport\",\"updateProfile\"]', 'Sales', 0, '2020-07-24 20:18:05'),
(11, '[\"viewAnalytics\"]', 'Management', 0, '2020-05-29 22:03:14'),
(12, '[\"updateAssignProjects\",\"viewAssignProjects\",\"updateProfile\"]', 'SMM', 0, '2020-06-30 22:01:17'),
(13, '[\"updateAssignResources\",\"viewAssignResources\",\"createKpi\",\"updateKpi\",\"viewKpi\",\"updateProfile\"]', 'Outstaffing Only', 0, '2020-07-13 20:57:49'),
(14, '[\"createClient\",\"updateClient\",\"viewClient\",\"createDevelopmentStatus\",\"updateDevelopmentStatus\",\"viewDevelopmentStatus\",\"createClientProjects\",\"updateClientProjects\",\"viewClientProjects\",\"createAssignProjects\",\"updateAssignProjects\",\"viewAssignProjects\",\"createAssignResources\",\"updateAssignResources\",\"viewAssignResources\",\"createKpi\",\"updateKpi\",\"viewKpi\",\"createPayment\",\"viewPayment\",\"viewSupport\",\"updateProfile\"]', 'Sales & Account Management', 0, '2020-07-24 20:18:42'),
(15, '[\"createUser\",\"updateUser\",\"updateSetting\",\"updateProfile\",\"viewAnalytics\"]', 'test role', 0, '2020-08-25 00:56:44');

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role_permissions`
--

INSERT INTO `role_permissions` (`id`, `role_id`, `permission_id`) VALUES
(1, 1, 1),
(2, 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `settings_id` int(11) UNSIGNED NOT NULL,
  `settings_site_title` varchar(50) NOT NULL,
  `settings_email` varchar(50) NOT NULL,
  `settings_email_from` varchar(300) NOT NULL,
  `settings_email_to` varchar(300) DEFAULT NULL,
  `settings_phone` varchar(50) NOT NULL,
  `settings_address` varchar(300) NOT NULL,
  `settings_favicon` varchar(50) DEFAULT NULL,
  `settings_logo` varchar(50) DEFAULT NULL,
  `settings_shipping_flat` int(11) DEFAULT NULL,
  `settings_shipping_free` int(11) DEFAULT NULL,
  `settings_tax` double(8,2) DEFAULT NULL,
  `settings_header` varchar(300) NOT NULL,
  `settings_background` varchar(300) DEFAULT NULL,
  `settings_status` enum('enable','disable') DEFAULT NULL,
  `settings_created_by` int(11) DEFAULT NULL,
  `settings_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `settings_updated_by` int(11) DEFAULT NULL,
  `settings_updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`settings_id`, `settings_site_title`, `settings_email`, `settings_email_from`, `settings_email_to`, `settings_phone`, `settings_address`, `settings_favicon`, `settings_logo`, `settings_shipping_flat`, `settings_shipping_free`, `settings_tax`, `settings_header`, `settings_background`, `settings_status`, `settings_created_by`, `settings_created_at`, `settings_updated_by`, `settings_updated_at`) VALUES
(1, 'carrosy / USED-CARS', 'support@carrosytrokas.com', 'support@carrosytrokas.com', 'info@numberthreeclothing.com', '(100) 030-0800', 'Fairview Ave, El Monte, CA 91732', 'fev-icon.png', 'logo.png', 200, 900, 0.00, 'Mon to Fri : 9:00am to 6:00pm', 'bg-02.jpg', 'enable', 1, '2019-05-20 09:55:42', 1, '2020-10-07 14:35:39');

-- --------------------------------------------------------

--
-- Table structure for table `staging_users`
--

CREATE TABLE `staging_users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(55) NOT NULL,
  `status` enum('0','1','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staging_users`
--

INSERT INTO `staging_users` (`id`, `name`, `email`, `status`) VALUES
(1, 'TEST', 'muhammad.minhaj@technado.co', ''),
(2, 'TEST', 'muhammad.minhaj@technado.co', ''),
(3, 'TEST', 'muhammad.minhaj@technado.co', ''),
(4, 'TEST', 'muhammad.minhaj@technado.co', ''),
(5, 'TEST', 'muhammad.minhaj@technado.co', ''),
(6, 'DASDADAS', 'umer.mansoor@technado.co', ''),
(7, 'DASDADAS', 'umer.mansoor@technado.co', ''),
(8, 'DASDADAS', 'umer.mansoor@technado.co', ''),
(9, 'DASDADAS', 'umer.mansoor@technado.co', ''),
(10, 'DASDADAS', 'umer.mansoor@technado.co', ''),
(11, 'dasdasdsadsa', 'umer.mansoor@technado.co', ''),
(12, 'dasdsadasdsadasdas', 'john@yahoo.com', ''),
(13, 'dasdsadsadasdasdsadsa', 'muhammad.minhaj@technado.co', ''),
(14, 'dsadsadsa', 'muhammad.minhaj@technado.co', ''),
(15, 'dsadsadsa', 'muhammad.minhaj@technado.co', ''),
(16, 'dsadsadsa', 'muhammad.minhaj@technado.co', ''),
(17, 'dsadsadsa', 'muhammad.minhaj@technado.co', ''),
(18, 'dsadsadsa', 'muhammad.minhaj@technado.co', ''),
(19, 'dsadsadsa', 'muhammad.minhaj@technado.co', ''),
(20, 'dsadsadsa', 'muhammad.minhaj@technado.co', ''),
(21, 'DASDADAS', 'umer.mansoor@technado.co', ''),
(22, 'DASDADASdsdsdsdsdsdsds', 'umer.mansoor@technado.co', ''),
(23, 'DASDADASdsdsdsdsdsdsds', 'umer.mansoor@technado.co', ''),
(24, 'DASDADAS', 'john@yahoo.com', ''),
(25, 'DASDADAS', 'umer.mansoor@technado.co', ''),
(26, 'TTTTTTTTTTTTTTTTTT', 'test@gmail.com', ''),
(27, 'TTTTTTTTTTTTTTTTTT', 'test@gmail.com', ''),
(28, 'TTTTTTTTTTTTTTTTTT', 'test@gmail.com', ''),
(29, 'TTTTTTTTTTTTTTTTTT', 'test@gmail.com', ''),
(30, 'TTTTTTTTTTTTTTTTTT', 'test@gmail.com', ''),
(31, 'TTTTTTTTTTTTTTTTTT', 'test@gmail.com', ''),
(32, 'TTTTTTTTTTTTTTTTTT', 'test@gmail.com', ''),
(33, 'TTTTTTTTTTTTTTTTTT', 'test@gmail.com', ''),
(34, 'TTTTTTTTTTTTTTTTTT', 'test@gmail.com', ''),
(35, 'TTTTTTTTTTTTTTTTTT', 'test@gmail.com', ''),
(36, 'TTTTTTTTTTTTTTTTTT', 'test@gmail.com', ''),
(37, 'TTTTTTTTTTTTTTTTTT', 'test@gmail.com', ''),
(38, 'TTTTTTTTTTTTTTTTTT', 'test@gmail.com', ''),
(39, 'TTTTTTTTTTTTTTTTTT', 'test@gmail.com', ''),
(40, 'TTTTTTTTTTTTTTTTTT', 'test@gmail.com', ''),
(41, 'TTTTTTTTTTTTTTTTTT', 'test@gmail.com', ''),
(42, 'TTTTTTTTTTTTTTTTTT', 'test@gmail.com', ''),
(43, 'TTTTTTTTTTTTTTTTTT', 'test@gmail.com', ''),
(44, 'TTTTTTTTTTTTTTTTTT', 'test@gmail.com', ''),
(45, 'TTTTTTTTTTTTTTTTTT', 'test@gmail.com', ''),
(46, 'test', 'test@gmail.com', ''),
(47, 'test', 'test@gmail.com', ''),
(48, 'test', 'test@gmail.com', ''),
(49, 'TEST', 'test@gmail.com', ''),
(50, 'dasdasdasdsad', 'dd@g.com', ''),
(51, 'Minhaj', 'minhajchamp@gmail.com', ''),
(52, 'Minhaj', 'minhajchamp@gmail.com', ''),
(53, 'Minhaj', 'minhajchamp@gmail.com', ''),
(54, 'ttttttt', 'test@gmail.com', ''),
(55, 'TEST', 'themariamfatima.2001@gmail.com', ''),
(56, 'TEST', 'themariamfatima.2001@gmail.com', ''),
(57, 'test', 'themariamfatima.2001@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `user_email` varchar(300) NOT NULL,
  `user_image` varchar(300) NOT NULL,
  `user_phone` varchar(20) NOT NULL,
  `user_cover_image` varchar(300) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `admin_bussniess` varchar(300) DEFAULT NULL,
  `user_address` varchar(300) DEFAULT NULL,
  `user_type` enum('admin','wordpress','wp-html','custom','designer','other') NOT NULL DEFAULT 'admin',
  `designation_id` text DEFAULT NULL,
  `user_pass` varchar(300) NOT NULL,
  `forgot_password_token` varchar(300) NOT NULL,
  `user_status` tinyint(1) NOT NULL DEFAULT 0,
  `user_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `online_status` enum('Yes','No','','') NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `role_id`, `user_email`, `user_image`, `user_phone`, `user_cover_image`, `user_name`, `admin_bussniess`, `user_address`, `user_type`, `designation_id`, `user_pass`, `forgot_password_token`, `user_status`, `user_date`, `online_status`, `last_login`) VALUES
(5, 1, 'zar@plutoprojects.net', 'zvr786_14_04_17_22_21.png', '9179631984', 'cover.jpg', 'Zar786', 'Pluto Projects LLC', 'https://plutoprojects.net/', 'admin', NULL, '95b8601890eb8cb98d31dd0532838baa9e717455683c72a9abc7e0f14b070e816a5085790172e580c26501247775752b9f475c887a3bb5a7da81c60bb5161871dMBv/DbuIHAiX9GIJMKM9Wu3/AWM8uitvPe/DrYH5T7ySJ7h6layNwD2iZkzXsTG', '201904016472A050110E9D68009729D6627C25C0CFDC9B2B5CA1C0AB45FD9', 0, '2017-12-29 12:39:28', 'Yes', '2020-11-21 07:52:42'),
(6, 0, 'admin@outsourceinpakistan.com', '56153781_325577931461520_868313323483955200_n.jpg', '16092815203', '', 'Admin', NULL, NULL, 'admin', NULL, '0c39effa6515a85c42846f17ccb31de38e233d2a1e5d4bb90c3a3d9c490dc42e1e2d201bf2a2892639b0edd9edc5160697f269e04a908cf96882e91bba08e3ecWCLEjB2MbPgnZXKb//+iomXiulfzLYj4vWWLTJxI3gY=', '', 0, '2020-07-22 14:37:20', 'No', '2020-11-16 20:07:53'),
(8, 1, 'uarain229@gmail.com', 'images_(2).jpg', '21321322', '', 'umar Mansoor Arain', NULL, NULL, 'admin', NULL, 'da19d2da8c6d32eb994b1a949c5bd72981b411119c5838ddc07afd56842bddc47f0a1f7f10e6fe8cf0e907e0265567350bc938eb080ba30b885ce4a53951157e5vfWCoRx1a/2lxsIr6EGrJ8K4CNHRrVh8WRaUbFuUjc=', '', 0, '2020-08-27 18:37:21', 'No', '2020-11-16 20:07:53'),
(9, 7, 'tanveer.ahmed@technado.co', 'gerlly-01.jpg', '0465456436', '', 'TanveerKanband', NULL, NULL, 'admin', '[\"13\",\"14\"]', '59fe884c20f9420d83f86c5bc641cda70ac8a0f2b3cecc834b9d60ed05c92db5219fe5d28410e7c151207135b8090dae8eec28d73ee1b6b26cc9815c55ad39fcXqmtjsHa7MHs/hrHr1QlyrI6kfC+xA6ZdXkDCq8S46g=', '', 0, '2020-10-01 12:38:46', 'No', '2020-11-16 20:07:53'),
(11, 7, 'altaf@demo.co', 'download1.jpg', '465456435', '', 'altaf', NULL, NULL, 'admin', '[\"13\",\"14\"]', '5924362da3bc9dcf73dbff55744a19faa751085bcfac5b5353577c01074eba900619bd16bc8cdba0b213cd52aff007543dc5cc68901f82d5c89030a1c4a71a1c/WOeft6FrTsJ8/CveZ2mQuonK9cb6UxqUxCLQKYOKJ8=', '', 0, '2020-10-06 12:49:07', 'No', '2020-11-16 20:07:53'),
(12, 1, 'afshal@gmail.com', 'test01.png', '1234562', '', 'afshal', NULL, NULL, 'admin', NULL, '123', '', 0, '2020-10-07 18:42:27', 'No', '2020-11-23 08:17:40');

-- --------------------------------------------------------

--
-- Table structure for table `users_roles`
--

CREATE TABLE `users_roles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `website_project_brief`
--

CREATE TABLE `website_project_brief` (
  `id` int(11) NOT NULL,
  `logo_name` varchar(100) NOT NULL,
  `slogan` text NOT NULL,
  `logo_style` varchar(50) NOT NULL,
  `look_and_feel` text NOT NULL,
  `additional_comments` text NOT NULL,
  `upload_brief_file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `client_projects`
--
ALTER TABLE `client_projects`
  ADD PRIMARY KEY (`client_projects_id`);

--
-- Indexes for table `client_project_brief`
--
ALTER TABLE `client_project_brief`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_stage`
--
ALTER TABLE `client_stage`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comments_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `developer`
--
ALTER TABLE `developer`
  ADD PRIMARY KEY (`developer_id`);

--
-- Indexes for table `logo_project_brief`
--
ALTER TABLE `logo_project_brief`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_admin`
--
ALTER TABLE `master_admin`
  ADD PRIMARY KEY (`master_admin_id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`settings_id`);

--
-- Indexes for table `staging_users`
--
ALTER TABLE `staging_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users_roles`
--
ALTER TABLE `users_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `website_project_brief`
--
ALTER TABLE `website_project_brief`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `client_projects`
--
ALTER TABLE `client_projects`
  MODIFY `client_projects_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `client_project_brief`
--
ALTER TABLE `client_project_brief`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `client_stage`
--
ALTER TABLE `client_stage`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comments_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `developer`
--
ALTER TABLE `developer`
  MODIFY `developer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `logo_project_brief`
--
ALTER TABLE `logo_project_brief`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_admin`
--
ALTER TABLE `master_admin`
  MODIFY `master_admin_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `role_permissions`
--
ALTER TABLE `role_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `settings_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `staging_users`
--
ALTER TABLE `staging_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users_roles`
--
ALTER TABLE `users_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `website_project_brief`
--
ALTER TABLE `website_project_brief`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
