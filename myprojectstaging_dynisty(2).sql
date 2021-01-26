-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2021 at 02:48 AM
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
-- Database: `myprojectstaging_dynisty`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment_type`
--

CREATE TABLE `appointment_type` (
  `appointment_type_id` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_projects_id` int(11) DEFAULT NULL,
  `app_depart` varchar(191) NOT NULL,
  `app_type` varchar(191) NOT NULL,
  `app_description` text NOT NULL,
  `app_time` varchar(191) NOT NULL,
  `appointment_type_status` enum('0','1') DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment_type`
--

INSERT INTO `appointment_type` (`appointment_type_id`, `user_id`, `client_projects_id`, `app_depart`, `app_type`, `app_description`, `app_time`, `appointment_type_status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 5, 0, '9', 'consulting', 'dasdasdasdsa                               ', '30 mins', '0', '2020-09-22 14:02:01', NULL, '2020-09-22 14:02:28', NULL),
(2, 5, 0, '18', 'Consultant', 'Testing                            ', '09:10', '0', '2020-10-28 23:32:40', NULL, '0000-00-00 00:00:00', NULL),
(3, 5, 0, '4', 'TEST', 'TEST', '09:00', '0', '2020-11-06 19:50:07', NULL, '0000-00-00 00:00:00', NULL),
(4, 5, 0, '6', 'consultant', 'Testing                            ', '09:00-05:00', '0', '2020-11-06 21:23:05', NULL, '0000-00-00 00:00:00', NULL),
(5, 5, 0, '30', 'Eviction Attorney', 'Test                            ', '10:00 pm', '0', '2020-12-19 19:56:10', NULL, '0000-00-00 00:00:00', NULL);

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
  `client_cover_image` text DEFAULT NULL,
  `client_city` varchar(300) DEFAULT NULL,
  `client_state` varchar(300) DEFAULT NULL,
  `client_country` varchar(300) DEFAULT NULL,
  `client_password` varchar(300) NOT NULL,
  `forgot_password_token` varchar(300) DEFAULT NULL,
  `pass_change_notification` varchar(100) NOT NULL DEFAULT 'Please change your password if you are logged in for first time',
  `client_status` tinyint(1) NOT NULL DEFAULT 1,
  `client_login_detail` enum('enable','disable') NOT NULL DEFAULT 'enable',
  `last_login` datetime DEFAULT current_timestamp(),
  `online_status` enum('yes','no') DEFAULT NULL,
  `client_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `login_times` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `role_id`, `client_name`, `client_email`, `client_phone_number`, `client_company`, `client_website`, `client_address`, `client_image`, `client_cover_image`, `client_city`, `client_state`, `client_country`, `client_password`, `forgot_password_token`, `pass_change_notification`, `client_status`, `client_login_detail`, `last_login`, `online_status`, `client_date`, `login_times`) VALUES
(1, 2, 'Usman', 'muhammad.minhaj@technado.co', '987654321', 'Pakistan', 'http://outsourceinpakistan.com/', 'Gulistan-e-Jauhar', 'image.png', 'cover1.jpg', 'Karachi', 'Sindh', 'Pakistan', '123', '', 'Please change your password if you are logged in for first time', 0, 'enable', '2021-01-25 14:59:26', 'yes', '2020-07-07 23:33:17', 86),
(2, 2, 'Sasha Johnson', 'sashafergusonatc@gmail.com', '(242) 425-2139', 'Game Plan Sports Medicine Services.', '', '', 'WhatsApp_Image_2020-07-09_at_9_04_48_PM.jpeg', '', 'Nassau', 'NP', 'Bahamas', 'a4750d1ef932f67f9ca82c642cc418ed291030ccdbb3b20537f49cf8cb277af38e76b0dd748d5b90cdcf23d4cbc56c8f7a4f6497f9d09878896de0aa234dce0bEBJTOmwlUzrPsIasWQjcIG7M0UMJECGqmS38SlOYUqw=', '', 'Please change your password if you are logged in for first time', 1, 'enable', '2020-07-14 03:25:24', NULL, '2020-07-14 03:25:24', 0),
(3, 4, 'Jumping Jack', 'jack@plutoprojects.net', '13477219117', 'United States of America', 'https://www.jumpingjacktaxes.com/', '3877 Dungan Street', 'blank-profile-picture-973460_960_720.png', '', 'Philadelphia', 'PA', 'United States of America', '123', '', 'Please change your password if you are logged in for first time', 1, 'enable', '2020-12-09 02:55:11', 'no', '2020-07-16 03:11:57', 2),
(4, 4, 'Latisha McKellar', 'lmckellar@taxontrac.com', '6468688834', 'United States of America', 'https://taxontrac.com', '693 E. 236th Street STR 2', 'online_icon.png', '', 'Bronx', 'New York', 'United States of America', 'acdd65f4a8b795aaee857cbc22075c32fcf79f2276b4d6e6ca181b070f7dc8945954a0c1133beaadfd7e45a0ad5caa2108d68683d7a62abe39750127a92c3d90sSKeLnkT20nEJ/w9LzXSvpqD3K23QWtQ+YrfcEdRelA=', '', 'Please change your password if you are logged in for first time', 1, 'enable', '2020-08-21 18:46:53', '', '2020-07-28 22:36:10', 0),
(5, 0, 'Daprof Shakur', 'contact@shotsbydmp.info', '9294547664', 'DaProf’s Media Productions', 'https://shotsbydmp.com/', '', '780929_-_Pluto_Pet_Robot_Mascot.png', '', 'Bronx', 'New York', 'United States of America', 'fc1173c9198bdd36ddfe17ffac6f81c6a02be9c906ab70f3af383b26f22b95686a6f7a92f9f0ecb93c61d4de1aa9e3801de2c0177d5d97d99a1caf9bc5abae57layr1hLrRa7oQtdovhblzqnMyjw7vLdwLmZNkHNIvGk=', '', 'Please change your password if you are logged in for first time', 0, 'enable', '2020-07-29 19:05:14', '', '2020-07-28 23:31:59', 0),
(6, 0, 'Stephanie Joyner', 'brighterdaytaxes.financial@gmail.com', '2679780138', 'United States of America', 'brighterdayfinancials.com', '2534 N, Broad Street & Huntingdon, Suite 30, Philadelphia, ', '780929_-_Pluto_Pet_Robot_Mascot.png', '', 'Philadelphia', 'Pennsylvania', 'United States of America', 'd9e4eead2b56fc42ca71777e50afe9b695d3417caa211b7a59092c977ed61447f99d4d82cc2b19a53f5727a8dcd43e8e2a67eba9a75e4b78097a2633436bbfdfABYYm9k6CXSSUjaECx7ZMUb+Q7a0Wz9SB+a/jScp07E=', '', 'Please change your password if you are logged in for first time', 0, 'enable', '2020-07-31 14:58:19', '', '2020-07-29 02:32:30', 0),
(7, 0, 'Tiffany Woodson', 'twoodson82@gmail.com', '1234567890', 'Woodson Management', '', '', '780929_-_Pluto_Pet_Robot_Mascot.png', '', '', '', 'United States of America', '1ae6706ad42b7a80bbb95f32d70375154296bf2ab0c075fc451e85ab0d8d2e7e3689142bcc3e78cb7e27046c61f7d76055c784e943f70ab8834c5ce72e9ecc62Lgnkqyy+0TjIX93eRvqMKsb6TCyNFz2gAVRLodzlgu0=', '', 'Please change your password if you are logged in for first time', 0, 'enable', '2020-07-29 06:32:49', NULL, '2020-07-29 06:32:49', 0),
(8, 0, 'Keith Thompson', 'keith@atltaxman.tax', '1234567890', '', 'atltaxman.tax', '', '780929_-_Pluto_Pet_Robot_Mascot.png', '', '', '', 'United States of America', '125718a312a5fd009c15323d6af53a27ea21763e8e26a2dd0bcc48caa560e6936e310f94a2eadcad79d1382fe0cdf893f80a18ec42c1e2cb037d1f423999c4f1OqC21p4OkuxUs4/8AiymjrrX7Ldkn+L4gMSpO2odtfM=', '', 'Please change your password if you are logged in for first time', 0, 'enable', '2020-08-05 22:34:55', '', '2020-07-29 06:34:40', 0),
(9, 0, 'Treyvion Webb', 'webbtrey2@gmail.com', '1234567890', 'Prime Start Taxes', 'primestarttaxes.com', '', '780929_-_Pluto_Pet_Robot_Mascot.png', '', '', '', 'United States of America', 'ef5ce65e1ee97dc866f9485d8b33a7a5f9d823960dd606b7c48457548192892f4c66d80285f4ca3637131df360f4f84fc890677db527a6f53657caea58a949b9+20eH0mnvUbOHmOzlpiDZO7AuT0EkFJOfQPwpidUvSA=', '', 'Please change your password if you are logged in for first time', 0, 'enable', '2020-07-29 06:41:22', NULL, '2020-07-29 06:41:22', 0),
(10, 0, 'Mike Soyfer', 'mike@soyfer.com', '1234567890', 'NY Landlords', 'nylandlords.com', '', '780929_-_Pluto_Pet_Robot_Mascot.png', '', '', '', 'United States of America', '2fe884fdc5deb5a9384007ea108f1e088313dd5de72bd32833d8fa439f55e19b10612592b7ed2289ddb97f4abb9c09b5eed140cf2828ecfe94e722b922dec4edVh/C3sxlJ1eRte6QJ5nmSnuKmaNCrdJDJkGe1kGT54g=', '', 'Please change your password if you are logged in for first time', 0, 'enable', '2020-07-29 07:04:52', NULL, '2020-07-29 07:04:52', 0),
(11, 0, 'Jumping Jack', 'don@jacktaxes.com', '1234567890', 'Jumping Jack Tax', 'https://www.jumpingjacktaxes.com/', '3877 Dungan Street', 'favicon.png', '', 'Philadelphia', 'Pennsylvania', 'United States of America', 'd2caed9447511c69a0c7fa5fe8d9c798f7d61be52d8837385e4057637d9bcb139aa3b430ead0bcb6f37b31df09e5677282ca2915b3e8be6ed35622b9effee4a4cx3+Ce72McCrBizXosj/u6jP/4rISFZ5xD0oGmj8zCw=', '', 'Please change your password if you are logged in for first time', 0, 'enable', '2020-08-27 13:58:12', '', '2020-07-29 07:16:22', 0),
(12, 0, 'Keith Thompson', 'zar.huss786@gmail.com', '7185507179', '', '', '', 'blank-profile-picture-973460_960_720.png', '', '', '', 'United States of America', 'a53c388589d065022bdb2b99a82b339b4ff9c963c4bcca3076a2ef7708602330faddf3e56504856d6512c610e1412fc13932b0eb456131339db9ffdd868b0a79E8aEnYhn/hsh6Uv3WpLH3B2dSg3FC2z7RUExBtScJlQ=', '', 'Please change your password if you are logged in for first time', 1, 'enable', '2020-08-05 22:32:35', NULL, '2020-08-05 22:32:35', 0),
(13, 0, 'Cariann Marie', 'Cariannx806@gmail.com', '3476714706', '', '', '', 'blank-profile-picture-973460_960_720.png', '', '', '', 'United States of America', 'ada3c42b128a1d0838eaedb974bf0ba05c8aa20ea60a41a1f76e11046550864f0102975edb59bf2e5f8bf04c34bce752039210cbceb914d62d698cbfb3561644IAOago/f5jTDDtkhAcSrWgoY4tHhmwzGUaI4XMeskB0=', '', 'Please change your password if you are logged in for first time', 1, 'enable', '2020-08-14 01:26:48', '', '2020-08-14 01:22:14', 0),
(14, 0, 'Zar Test', 'Yolo123@yahoo.com', '2345678901', '', '', '', 'blank-profile-picture-973460_960_720.png', '', '', '', 'United States of America', '3dadd910df8ff574be1ccd1cedc7534b49313e181db4c1c8da1a66a3ffd2e4dbb89335f1faceb746ca2aef8cfa4b88b414e5b9c30e7df4982e046606bb08b2fe+vwGMBK/OKoVh0pbqGUJyIBycuNgl4TQJAs5pcKJdyQ=', '', 'Please change your password if you are logged in for first time', 1, 'enable', '2020-08-17 17:11:11', '', '2020-08-17 17:10:14', 0),
(15, 0, 'Robyia Spriggins', 'robyia@elitefinancial.solutions', '9732074060', 'Elite Financial Solutions', 'elitefinancial.solutions', '', '780929_-_Pluto_Pet_Robot_Mascot.png', '', 'Clark', 'New Jersey', 'United States of America', '9644472639c14591ec1f8ea39a74a41bae55c7ec094380f777939211fe611f62c92643117e2cb331982fe633c66770c1e37c4928a36ed8bac7c931b8ed6621d1tAI9NX6Xk+DKkrILaED1bT89ts9LBvSRDI7A+Gbwlos=', '', 'Please change your password if you are logged in for first time', 0, 'enable', '2020-08-21 20:36:50', '', '2020-08-21 20:17:41', 0),
(16, 0, 'Aqiyla McLean', 'info@aplusstaxes.com', '7185179212', 'United States of America', 'https://www.aplusstaxes.com/', 'Brooklyn, NY', '780929_-_Pluto_Pet_Robot_Mascot.png', '', 'Brooklyn', 'New York', 'United States of America', '7162c2fc986b698cb4b576dfd86a3c2d448a8bb7d03687d6e5d844a145a1d94f0056dcd9bbbf0202291dd2c43f5a41516e5e55878ed6fbb3fa4623658a6c9375ZEbisXUks+c2zg1eHukfwhODlkMFzRSADF4QND3oDWY=', '', 'Please change your password if you are logged in for first time', 0, 'enable', '2020-08-26 19:17:00', '', '2020-08-25 01:29:12', 0),
(18, 0, 'Nabeel Baig', 'nabeel.baig@technado.co', '03333906233', 'plutoprojects', 'https://plutoprojects.net/', 'H-104, Rufi Green City, Block-18, Gulistan-e-Jauhar', 'blank-profile-picture-973460_960_720.png', '', 'Karachi', 'Sindh', 'Pakistan', 'f216a9e0b86921373f71734bb792cd997bdcbc93130f67df6e8aad2e2dd052ade39d9500337c734c3615e5e3cb5f9941a1f25a597165ea76925088b072ef178ej5yRLPqvmSgMU19BV1fHwRblDaSKmJWJ53aPGn5iH1o=', '', 'Please change your password if you are logged in for first time', 0, 'enable', '2020-08-26 18:10:44', '', '2020-08-26 18:07:48', 0),
(19, 5, 'umar arain', 'umer.mansoor@technado.co', '9999999999', '', '', '76Street, 13', 'blank-profile-picture-973460_960_720.png', '', 'calforonia', 'Alaska', 'Pakistan', 'e9e1b75eb55ce4a1d4fcbe36722dbbb14e55226594b19be2f5f5e8d6c1efe5c7b79829de16132e477c60dcfd247c434fe6253beecf99acb75e50f074a58eb5c9z9CnvkAWDTd8rAHyWXPN8mAdyLa+HuQQu644sh173eM=', '', 'Please change your password if you are logged in for first time', 0, 'enable', '2020-11-16 21:00:23', '', '2020-08-27 16:16:36', 0),
(20, 0, 'Changeies khan', 'uarain229@gmail.com', '23213232', 'tech', '', 'mangolia street 8', 'blank-profile-picture-973460_960_720.png', '', 'kkirea', 'olpio', 'Mongolia', 'e9e1b75eb55ce4a1d4fcbe36722dbbb14e55226594b19be2f5f5e8d6c1efe5c7b79829de16132e477c60dcfd247c434fe6253beecf99acb75e50f074a58eb5c9z9CnvkAWDTd8rAHyWXPN8mAdyLa+HuQQu644sh173eM=', '', 'Please change your password if you are logged in for first time', 0, 'enable', '2020-08-27 22:25:41', '', '2020-08-27 20:05:09', 0),
(143, 0, 'test', 'uzair.haseeb@outsourceinpakistan.com', '', 'test', 'https://test.com', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 'Please change your password if you are logged in for first time', 1, 'disable', '2020-12-31 03:02:08', NULL, '2020-12-31 03:02:08', 0),
(144, 2, 'test', 'minhajchamp@gmail.com', '123', 'test', 'https://test.com', 'muhammad.minhaj@technado.co', NULL, NULL, NULL, NULL, 'Afghanistan', '123', NULL, 'Please change your password if you are logged in for first time', 1, 'enable', '2021-01-04 13:40:40', 'no', '2021-01-04 10:12:42', 1);

-- --------------------------------------------------------

--
-- Table structure for table `client_intake_payments`
--

CREATE TABLE `client_intake_payments` (
  `client_payments_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `payment_no` varchar(50) NOT NULL,
  `client_payments_amount` double(10,2) NOT NULL,
  `client_payments_pay_status` enum('Paid','Unpaid','Hold') NOT NULL,
  `uploaded_month` int(3) NOT NULL,
  `year` text NOT NULL,
  `client_payments_status` tinyint(1) NOT NULL DEFAULT 0,
  `client_payments_type` varchar(255) NOT NULL,
  `client_payments_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_intake_payments`
--

INSERT INTO `client_intake_payments` (`client_payments_id`, `client_id`, `payment_no`, `client_payments_amount`, `client_payments_pay_status`, `uploaded_month`, `year`, `client_payments_status`, `client_payments_type`, `client_payments_date`) VALUES
(56, 141, 'F6557', 33.00, 'Unpaid', 12, '20', 0, '', '2020-12-28 16:43:08'),
(57, 142, '541A2', 22.00, 'Hold', 12, '20', 0, '', '2020-12-30 04:58:39'),
(58, 142, '4BABB', 125.00, 'Paid', 12, '20', 0, '', '2020-12-30 05:22:01'),
(59, 142, '4CED8', 125.00, 'Paid', 12, '20', 0, '', '2020-12-30 10:36:21'),
(60, 142, '1F181', 147.00, 'Paid', 12, '20', 0, '', '2020-12-30 10:38:34'),
(61, 142, '42281', 147.00, 'Paid', 12, '20', 0, '', '2020-12-30 10:39:38'),
(62, 144, '16EDC', 22.00, 'Hold', 1, '21', 0, '', '2021-01-04 10:41:56'),
(63, 144, '3A485', 125.00, 'Paid', 1, '21', 0, '', '2021-01-04 13:37:35');

-- --------------------------------------------------------

--
-- Table structure for table `client_package`
--

CREATE TABLE `client_package` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `package_id` text NOT NULL,
  `status` enum('Paid','Unpaid','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client_package`
--

INSERT INTO `client_package` (`id`, `client_id`, `package_id`, `status`) VALUES
(61, 142, '4BABB', 'Paid'),
(62, 142, '4CED8', 'Paid'),
(63, 142, '1F181', 'Paid'),
(64, 142, '42281', 'Paid'),
(65, 144, '3A485', 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `client_projects`
--

CREATE TABLE `client_projects` (
  `client_projects_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `project_brief_id` int(11) DEFAULT NULL,
  `package_id` int(11) DEFAULT NULL,
  `project_name` varchar(300) NOT NULL,
  `project_type` varchar(300) NOT NULL,
  `project_summary` text NOT NULL,
  `delivery_status` varchar(50) DEFAULT NULL,
  `payment_due` enum('Yes','No') NOT NULL DEFAULT 'Yes',
  `website_url` varchar(300) DEFAULT '#',
  `uploaded_month` int(3) NOT NULL,
  `uploaded_year` varchar(300) NOT NULL DEFAULT '2020',
  `summary_file` varchar(300) DEFAULT NULL,
  `ip_address` varchar(191) DEFAULT NULL,
  `browser` varchar(100) DEFAULT NULL,
  `os` varchar(100) DEFAULT NULL,
  `server_time` varchar(191) DEFAULT NULL,
  `complete_status` enum('completed','pending','stopped') NOT NULL DEFAULT 'pending',
  `client_projects_status` tinyint(1) NOT NULL DEFAULT 1,
  `client_projects_start_date` text DEFAULT NULL,
  `client_projects_due_date` text DEFAULT NULL,
  `client_projects_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `client_project_members` text NOT NULL,
  `project_manager_id` int(11) NOT NULL,
  `signature_path` text DEFAULT NULL,
  `perioty_status` enum('high','low','medium','critical','low') DEFAULT NULL,
  `duration_plan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_projects`
--

INSERT INTO `client_projects` (`client_projects_id`, `client_id`, `project_brief_id`, `package_id`, `project_name`, `project_type`, `project_summary`, `delivery_status`, `payment_due`, `website_url`, `uploaded_month`, `uploaded_year`, `summary_file`, `ip_address`, `browser`, `os`, `server_time`, `complete_status`, `client_projects_status`, `client_projects_start_date`, `client_projects_due_date`, `client_projects_date`, `client_project_members`, `project_manager_id`, `signature_path`, `perioty_status`, `duration_plan`) VALUES
(312, 1, NULL, NULL, 'test', '4', 'test', 'Brief', 'Yes', '#', 12, '2020', NULL, NULL, NULL, NULL, NULL, 'pending', 1, NULL, '0000-00-00', '2020-12-30 04:46:12', 'null', 0, 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAfQAAABkCAYAAABwx8J9AAAFNklEQVR4Xu3YTWoUURSG4Xu1I/4MepB5D2qQtbga15P9CM6EXkHNXYPilfyBiDFgVSD3O09mIemiznNOeNHefBEgQIAAAQLTC/TpJzAAAQIECBAg0ATdERAgQIAAgQABQQ9YohEIECBAgICguwECBAgQIBAgIOgBSzQCAQIECBAQdDdAgAABAgQCBAQ9YIlGIECAAAECgu4GCBAgQIBAgICgByzRCAQIECBAQNDdAAECBAgQCBAQ9IAlGoEAAQIECAi6GyBAgAABAgECgh6wRCMQIECAAAFBdwMECBAgQCBAQNADlmgEAgQIECAg6G6AAAECBAgECAh6wBKNQIAAAQIEBN0NECBAgACBAAFBD1iiEQgQIECAgKC7AQIECBAgECAg6AFLNAIBAgQIEBB0N0CAAAECBAIEBD1giUYgQIAAAQKC7gYIECBAgECAgKAHLNEIBAgQIEBA0N0AAQIECBAIEBD0gCUagQABAgQICLobIECAAAECAQKCHrBEIxAgQIAAAUF3AwQIECBAIEBA0AOWaAQCBAgQICDoboAAAQIECAQICHrAEo1AgAABAgQE3Q0QIECAAIEAAUEPWKIRCBAgQICAoLsBAgQIECAQICDoAUs0AgECBAgQEHQ3QIAAAQIEAgQEPWCJRiBAgAABAoLuBggQIECAQICAoAcs0QgECBAgQEDQ3QABAgQIEAgQEPSAJRqBAAECBAgIuhsgQIAAAQIBAoIesEQjECBAgAABQXcDBAgQIEAgQEDQA5ZoBAIECBAgIOhugAABAgQIBAgIesASjUCAAAECBATdDRAgQIAAgQABQQ9YohEIECBAgICguwECBAgQIBAgIOgBSzQCAQIECBAQdDdAgAABAgQCBAQ9YIlGIECAAAECgu4GCBAgQIBAgICgByzRCAQIECBAQNDdAAECBAgQCBAQ9IAlGoEAAQIECAi6G2jLsny+Zzg+xdF7//DU7zz28zHGu//97NbP9d7fbH3GH5+/2OF538cY38YYX4/H4/X5fP6ywzM9ggCBogKCXnTxv4+9LMvA8PIFxhgPexq99x+ttdvv13V9+/Lf3hsSIPDcAoL+3MITPF/QJ1jSP15xXdfXrbWfc0/h7QkQ2Cog6FsFAz4v6HMvUdDn3p+3J7CXgKDvJTnxcwR94uXd/Ze7f6HPvUJvT2AXAUHfhdFDCGwXOJ1Onw6Hw8fW2lVr7bK19n6McRPrVzdP773/9e9V0LfbewKBBAFBT9iiGQgQIECgvICglz8BAAQIECCQICDoCVs0AwECBAiUFxD08icAgAABAgQSBAQ9YYtmIECAAIHyAoJe/gQAECBAgECCgKAnbNEMBAgQIFBeQNDLnwAAAgQIEEgQEPSELZqBAAECBMoLCHr5EwBAgAABAgkCgp6wRTMQIECAQHkBQS9/AgAIECBAIEFA0BO2aAYCBAgQKC8g6OVPAAABAgQIJAgIesIWzUCAAAEC5QUEvfwJACBAgACBBAFBT9iiGQgQIECgvICglz8BAAQIECCQICDoCVs0AwECBAiUFxD08icAgAABAgQSBAQ9YYtmIECAAIHyAoJe/gQAECBAgECCgKAnbNEMBAgQIFBeQNDLnwAAAgQIEEgQEPSELZqBAAECBMoLCHr5EwBAgAABAgkCgp6wRTMQIECAQHkBQS9/AgAIECBAIEFA0BO2aAYCBAgQKC8g6OVPAAABAgQIJAgIesIWzUCAAAEC5QUEvfwJACBAgACBBAFBT9iiGQgQIECgvICglz8BAAQIECCQIPALnHMzZcVVNz0AAAAASUVORK5CYII=', NULL, NULL),
(313, 142, 105, NULL, 'test', '7', '', 'In-Progress', 'No', '#', 0, '2020', NULL, NULL, NULL, NULL, NULL, 'pending', 1, NULL, NULL, '2020-12-30 04:56:18', '', 0, NULL, NULL, NULL),
(314, 143, NULL, NULL, 'tss', '4', '', 'In-Progress', 'Yes', '#', 0, '2020', NULL, NULL, NULL, NULL, NULL, 'pending', 1, NULL, NULL, '2020-12-31 03:03:16', '', 0, NULL, NULL, NULL),
(315, 143, NULL, NULL, 'tss', '4', '', 'In-Progress', 'Yes', '#', 0, '2020', NULL, NULL, NULL, NULL, NULL, 'pending', 1, NULL, NULL, '2020-12-31 03:03:21', '', 0, NULL, NULL, NULL),
(316, 143, NULL, NULL, 'tss', '4', '', 'In-Progress', 'Yes', '#', 0, '2020', NULL, NULL, NULL, NULL, NULL, 'pending', 1, NULL, NULL, '2020-12-31 03:03:57', '', 0, NULL, NULL, NULL),
(317, 143, NULL, NULL, 's', '2', '', 'In-Progress', 'Yes', '#', 0, '2020', NULL, NULL, NULL, NULL, NULL, 'pending', 1, NULL, NULL, '2020-12-31 03:09:00', '', 0, NULL, NULL, NULL),
(318, 143, NULL, NULL, 'TTT', '4', '', 'In-Progress', 'Yes', '#', 0, '2020', NULL, NULL, NULL, NULL, NULL, 'pending', 1, NULL, NULL, '2020-12-31 03:09:56', '', 0, NULL, NULL, NULL),
(319, 143, NULL, NULL, 'T', '2', '', 'In-Progress', 'Yes', '#', 0, '2020', NULL, NULL, NULL, NULL, NULL, 'pending', 1, NULL, NULL, '2020-12-31 03:16:28', '', 0, NULL, NULL, NULL),
(320, 144, NULL, NULL, 'test', '16', '', 'In-Progress', 'Yes', '#', 0, '2020', NULL, NULL, NULL, NULL, NULL, 'pending', 1, NULL, NULL, '2021-01-04 10:22:56', '', 0, NULL, NULL, NULL),
(321, 144, NULL, NULL, 'test', '16', '', 'In-Progress', 'Yes', '#', 0, '2020', NULL, NULL, NULL, NULL, NULL, 'pending', 1, NULL, NULL, '2021-01-04 10:23:23', '', 0, NULL, NULL, NULL),
(322, 144, 123, NULL, 'test', '16', '', 'In-Progress', 'Yes', '#', 0, '2020', NULL, NULL, NULL, NULL, NULL, 'pending', 1, NULL, NULL, '2021-01-04 10:25:31', '', 0, NULL, NULL, NULL),
(323, 144, 124, NULL, 't', '1', '', 'In-Progress', 'Yes', '#', 0, '2020', NULL, NULL, NULL, NULL, NULL, 'pending', 1, NULL, NULL, '2021-01-04 10:37:05', '', 0, NULL, NULL, NULL),
(324, 1, NULL, NULL, 'tes', '4', 'test', 'Brief', 'Yes', '#', 1, '2020', NULL, NULL, NULL, NULL, NULL, 'pending', 1, NULL, NULL, '2021-01-22 07:41:19', 'null', 0, '', NULL, NULL),
(325, 1, NULL, NULL, 'test', '4', 'test', 'Brief', 'Yes', '#', 1, '2020', NULL, NULL, NULL, NULL, NULL, 'pending', 1, NULL, NULL, '2021-01-22 08:03:40', 'null', 0, 'data:image/png;base64,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', NULL, NULL),
(326, 1, NULL, NULL, 'dsadas', '5', 'dss', 'Brief', 'Yes', '#', 1, '2020', NULL, NULL, NULL, NULL, NULL, 'pending', 1, NULL, NULL, '2021-01-22 08:19:36', '', 0, 'data:image/png;base64,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', NULL, NULL),
(327, 1, NULL, NULL, 'dsadas', '5', 'dss', 'Brief', 'Yes', '#', 1, '2020', NULL, NULL, NULL, NULL, NULL, 'pending', 1, NULL, NULL, '2021-01-22 08:21:11', '', 0, 'data:image/png;base64,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', NULL, NULL),
(328, 1, NULL, NULL, 'dsadas', '5', 'dss', 'Brief', 'Yes', '#', 1, '2020', NULL, NULL, NULL, NULL, NULL, 'pending', 1, NULL, NULL, '2021-01-22 08:21:30', '', 0, 'data:image/png;base64,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', NULL, NULL),
(329, 1, NULL, NULL, 'dsadas', '5', 'dss', 'Brief', 'Yes', '#', 1, '2020', NULL, NULL, NULL, NULL, NULL, 'pending', 1, NULL, '01/15/2021', '2021-01-22 08:21:53', '', 0, 'data:image/png;base64,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', NULL, NULL),
(330, 1, NULL, NULL, 'dsadas', '5', 'dss', 'Brief', 'Yes', '#', 1, '2020', NULL, NULL, NULL, NULL, NULL, 'pending', 1, NULL, '01/15/2021', '2021-01-22 08:23:25', '', 0, '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `client_project_brief`
--

CREATE TABLE `client_project_brief` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `client_project_id` int(11) DEFAULT NULL,
  `data` text NOT NULL,
  `type` enum('wb','lb','cb','sb') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_project_brief`
--

INSERT INTO `client_project_brief` (`id`, `client_id`, `client_project_id`, `data`, `type`) VALUES
(121, 143, 1, '{\"client_id\":\"143\",\"project_name\":\"T\",\"project_type\":\"2\",\"content_tone\":\"Warm and accessible\",\"content_manner\":\"Helpful\",\"business_objectives\":\"T\",\"business_description\":\"T\",\"testimonials\":\"T\",\"target_of_audience\":\"T\",\"unique_selling_point\":\"T\",\"word_count\":\"T\",\"upload_brief\":{\"name\":\"WEBSITE BRIEF FORM.DOCX\",\"type\":\"application\\/vnd.openxmlformats-officedocument.wordprocessingml.document\",\"tmp_name\":\"\\/tmp\\/phpIHpPaF\",\"error\":0,\"size\":13839},\"upload_brief_file\":{\"name\":\"WEBSITE BRIEF FORM.DOCX\",\"type\":\"application\\/vnd.openxmlformats-officedocument.wordprocessingml.document\",\"tmp_name\":\"\\/tmp\\/phpIHpPaF\",\"error\":0,\"size\":13839}}', 'cb'),
(122, 144, 321, '{\"client_id\":\"144\",\"logo_name\":\"dasd\",\"slogan\":\"d\",\"logo_style\":\"Modern\",\"look_and_feel\":\"dasd\",\"additional_comments\":\"dasdas\",\"upload_brief_file\":\"NEPHROLITHIASIS 2 final.docx\"}', 'lb'),
(123, 144, 322, '{\"client_id\":\"144\",\"logo_name\":\"dasd\",\"slogan\":\"d\",\"logo_style\":\"Modern\",\"look_and_feel\":\"dasd\",\"additional_comments\":\"dasdasdasdas\",\"upload_brief_file\":\"NEPHROLITHIASIS 2 final.docx\"}', 'lb'),
(124, 144, 323, '{\"client_id\":\"144\",\"content_tone\":\"Authoritative\",\"content_manner\":\"Friendly\",\"business_objectives\":\"d\",\"business_description\":\"d\",\"testimonials\":\"d\",\"target_of_audience\":\"d\",\"unique_selling_point\":\"d\",\"word_count\":\"\",\"upload_brief\":\"ACETIC ACID.docx\"}', 'cb');

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
(78, 312, 1, 'dadsad', 'unread', 'unread', 0, '2021-01-11 12:12:27'),
(79, 312, 1, 'test', 'unread', 'unread', 0, '2021-01-19 11:03:41');

-- --------------------------------------------------------

--
-- Table structure for table `comments_files`
--

CREATE TABLE `comments_files` (
  `comments_files_id` int(11) NOT NULL,
  `comments_files_file` varchar(300) NOT NULL,
  `extension` varchar(10) NOT NULL,
  `comments_id` int(11) NOT NULL,
  `comments_files_status` tinyint(1) NOT NULL DEFAULT 0,
  `comments_files_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comments_images`
--

CREATE TABLE `comments_images` (
  `comments_images_id` int(11) NOT NULL,
  `comments_id` int(11) NOT NULL,
  `comments_images_img` varchar(300) NOT NULL,
  `comments_images_status` tinyint(1) NOT NULL DEFAULT 0,
  `comments_images_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `crm_contacts`
--

CREATE TABLE `crm_contacts` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `company` varchar(100) DEFAULT NULL,
  `website` text DEFAULT NULL,
  `circle_id` int(11) NOT NULL,
  `display_picture` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `default_available`
--

CREATE TABLE `default_available` (
  `default_available_id` bigint(20) NOT NULL,
  `to_date` date NOT NULL,
  `from_date` date NOT NULL,
  `to_time` varchar(100) NOT NULL,
  `from_time` varchar(100) NOT NULL,
  `default_available_status` enum('0','1') NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `default_available`
--

INSERT INTO `default_available` (`default_available_id`, `to_date`, `from_date`, `to_time`, `from_time`, `default_available_status`, `user_id`, `created_at`, `created_by`, `updated_by`, `updated_at`) VALUES
(1, '2020-10-14', '2020-10-20', '09:58', '18:58', '0', 5, '2020-09-22 13:57:48', NULL, NULL, NULL);

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
(15, 'Maintenance', 0, '2020-08-26 00:43:28');

-- --------------------------------------------------------

--
-- Table structure for table `developer`
--

CREATE TABLE `developer` (
  `developer_id` int(11) NOT NULL,
  `developer_content_image` varchar(300) NOT NULL,
  `site_logo` text NOT NULL,
  `developer_nav_image` varchar(300) NOT NULL,
  `developer_login_background` varchar(300) DEFAULT NULL,
  `developer_nav_gradient` varchar(50) NOT NULL,
  `developer_nav_color` varchar(50) NOT NULL,
  `front_content_image` varchar(300) NOT NULL,
  `front_login_back` varchar(300) NOT NULL,
  `front_nav_image` varchar(300) NOT NULL,
  `front_nav_gradient` varchar(300) NOT NULL,
  `front_nav_color` varchar(300) NOT NULL,
  `default_status` enum('1','0','','') NOT NULL DEFAULT '0',
  `developer_status` tinyint(1) NOT NULL DEFAULT 0,
  `developer_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `developer`
--

INSERT INTO `developer` (`developer_id`, `developer_content_image`, `site_logo`, `developer_nav_image`, `developer_login_background`, `developer_nav_gradient`, `developer_nav_color`, `front_content_image`, `front_login_back`, `front_nav_image`, `front_nav_gradient`, `front_nav_color`, `default_status`, `developer_status`, `developer_date`) VALUES
(1, 'blank-white-image-1024x576.png', 'Dynisty-PNG8.png', 'blank-white-image-1024x576.png', 'photo-1549286942-e6b84b2db18d.jpg', '', '', 'logo3.png', 'BG.png', 'blank-white-image-1024x576.png', '', '', '1', 0, '2020-12-30 10:18:54');

-- --------------------------------------------------------

--
-- Table structure for table `kanban`
--

CREATE TABLE `kanban` (
  `id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `task_name` varchar(120) NOT NULL,
  `description` text DEFAULT NULL,
  `status` text NOT NULL,
  `priority` enum('true','false','','') NOT NULL DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kanban`
--

INSERT INTO `kanban` (`id`, `task_id`, `task_name`, `description`, `status`, `priority`) VALUES
(1, 1, 'test', '', 'red', 'false'),
(2, 2, 'dasd', '', 'blue', 'false'),
(3, 3, 'dasdas', '', 'blue', 'false'),
(4, 4, 'dd', '', 'green', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

CREATE TABLE `leads` (
  `id` int(11) NOT NULL,
  `lead_name` varchar(50) NOT NULL,
  `lead_type` varchar(255) DEFAULT NULL,
  `status` enum('0','1','','') DEFAULT '1',
  `upload_year` text NOT NULL,
  `upload_month` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leads`
--

INSERT INTO `leads` (`id`, `lead_name`, `lead_type`, `status`, `upload_year`, `upload_month`) VALUES
(1, 'test', 'logo', '1', '2021', '12'),
(2, 'test2', 'web', '1', '2021', '11'),
(3, 'tess', 'logo', '1', '2021', '12'),
(4, 'dsd', 'web', '1', '2021', '12'),
(5, 'dsd', 'web', '1', '2021', '12'),
(15, 'test', 'web', '1', '2021', '01'),
(16, 'creative', 'creative', '1', '2021', '01'),
(17, 'seo', 'seo', '1', '2021', '01');

-- --------------------------------------------------------

--
-- Table structure for table `main_department`
--

CREATE TABLE `main_department` (
  `department_id` int(11) NOT NULL,
  `department_name` varchar(300) NOT NULL,
  `sub_department` text NOT NULL,
  `department_status` tinyint(1) NOT NULL DEFAULT 0,
  `department_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `market`
--

CREATE TABLE `market` (
  `id` int(11) NOT NULL,
  `lead_name` varchar(50) NOT NULL,
  `lead_type` text DEFAULT NULL,
  `status` enum('On','Off','','') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `market`
--

INSERT INTO `market` (`id`, `lead_name`, `lead_type`, `status`) VALUES
(1, 'Lash Empire Starter Kit', '0', NULL),
(2, 'Professional Business Cards', '95', ''),
(3, 'E-Gift Card', '25', ''),
(4, 'Custom Planner Design', '799', ''),
(5, 'Custom Scratch Cards', '109', ''),
(6, 'Image Based Logo', '175', ''),
(7, 'Standard Website - Design Only', '499', ''),
(8, 'Premium Website Package', '899', ''),
(9, 'Online Store Website', '615', ''),
(10, 'Online Booking Website', '615', ''),
(11, 'TEST', '22', '');

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
  `package_type` enum('wb','lb','cb','sb','addon') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `package_name`, `package_features`, `package_price`, `package_type`) VALUES
(1, 'Starter', '[\"Free Revision\", \"Conversion\", \"All Formats\"]', 125, 'lb'),
(2, 'Business', '[\"Free Revision\", \"Conversion\", \"All Formats\"]', 22, 'lb'),
(3, 'Web', '[\"Web Hosting\", \"Domain\", \"CRM\", \"ERP\"]', 20, 'wb'),
(4, 'Creative', 'CREATIVE', 44, 'cb'),
(5, 'Beginner', 'SEO PACKAGE', 33, 'sb'),
(6, 'Corporate', '[\"Free Revision\", \"Conversion\", \"All Formats\"]', 22, 'lb'),
(7, 'Professional', '[\"Free Revision\", \"Conversion\", \"All Formats\"]', 22, 'lb'),
(8, 'Addon 1', '', 22, 'addon'),
(9, 'Addon 2', '', 15, 'addon');

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
-- Table structure for table `projects_files`
--

CREATE TABLE `projects_files` (
  `projects_files_id` int(11) NOT NULL,
  `projects_files_file` varchar(300) NOT NULL,
  `extension` varchar(10) NOT NULL,
  `client_projects_id` int(11) NOT NULL,
  `projects_files_status` tinyint(1) NOT NULL DEFAULT 0,
  `projects_files_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `projects_tasks`
--

CREATE TABLE `projects_tasks` (
  `projects_tasks_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `client_projects_id` int(11) NOT NULL,
  `task_name` varchar(100) NOT NULL,
  `priority` enum('High','Medium','Low','') NOT NULL,
  `description` text NOT NULL,
  `status` enum('Pending','Completed','Stopped','') NOT NULL,
  `phase_id` int(11) DEFAULT NULL,
  `start_date` date NOT NULL,
  `due_date` date DEFAULT NULL,
  `ip_address` varchar(191) DEFAULT NULL,
  `browser` varchar(100) DEFAULT NULL,
  `os` varchar(100) DEFAULT NULL,
  `server_time` varchar(191) DEFAULT NULL,
  `task_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `project_additional`
--

CREATE TABLE `project_additional` (
  `project_additional_id` int(11) NOT NULL,
  `client_projects_id` int(11) NOT NULL,
  `project_additional_feature_name` varchar(255) NOT NULL,
  `project_additional_feature_price` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_additional`
--

INSERT INTO `project_additional` (`project_additional_id`, `client_projects_id`, `project_additional_feature_name`, `project_additional_feature_price`) VALUES
(2, 235, 'rush', '22'),
(3, 270, 'rush', '22'),
(4, 293, 'rush', '22'),
(5, 294, 'rush', '22'),
(6, 295, 'rush', '22'),
(7, 312, 'rush', '22'),
(8, 324, 'rush', '22'),
(9, 325, 'rush', '22'),
(10, 0, 'rush', '22'),
(11, 0, 'rush', '22'),
(12, 0, 'rush', '22');

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
(1, 'Admin', '[\"viewUser\",\"createRoles\",\"editRoles\",\"viewRoles\",\"deleteRoles\",\"createClient\",\"updateClient\",\"viewClient\",\"deleteClient\",\"viewCRM\",\"viewCircle\",\"viewMarketPlace\",\"viewMarketAnalytics\",\"createFileManagement\",\"updateFileManagement\",\"viewFileManagement\",\"deleteFileManagement\",\"createClientProjects\",\"updateClientProjects\",\"viewClientProjects\",\"deleteClientProjects\",\"createAssignProjects\",\"updateAssignProjects\",\"viewAssignProjects\",\"deleteAssignProjects\",\"createAssignResources\",\"updateAssignResources\",\"viewAssignResources\",\"deleteAssignResources\",\"createPayment\",\"viewPayment\",\"viewSupport\",\"deleteSupport\",\"updateProfile\",\"viewProfile\",\"viewAnalytics\"]', 'enable', '2020-12-04 03:24:26', 1, '2020-10-20 22:50:57', 1),
(2, 'Client', '[\"createUser\",\"updateUser\",\"viewUser\",\"deleteUser\",\"createClient\",\"updateClient\",\"viewClient\",\"deleteClient\",\"createCRM\",\"updateCRM\",\"viewCRM\",\"deleteCRM\",\"createCircle\",\"updateCircle\",\"viewCircle\",\"deleteCircle\",\"viewMarketAnalytics\",\"createFileManagement\",\"updateFileManagement\",\"viewFileManagement\",\"deleteFileManagement\",\"createClientProjects\",\"updateClientProjects\",\"viewClientProjects\",\"deleteClientProjects\",\"createAssignProjects\",\"updateAssignProjects\",\"viewAssignProjects\",\"deleteAssignProjects\",\"createAssignResources\",\"updateAssignResources\",\"viewAssignResources\",\"deleteAssignResources\",\"createPayment\",\"viewPayment\",\"viewSupport\",\"deleteSupport\",\"updateProfile\",\"viewProfile\",\"viewAnalytics\"]', 'enable', '2020-12-30 11:14:25', 1, '2020-10-20 22:53:28', 1),
(3, 'Prospect', '[\"updateUser\"]', 'enable', '2020-11-26 10:54:39', NULL, '2020-11-26 05:01:36', NULL),
(4, 'Project Manager', '[\"updateUser\",\"updateClientProjects\",\"viewClientProjects\"]', 'enable', '2020-12-09 02:53:06', NULL, '2020-11-23 20:37:19', NULL),
(16, 'test', '[\"createUser\",\"updateUser\",\"createRoles\",\"editRoles\",\"viewRoles\",\"deleteRoles\",\"createClient\",\"updateClient\"]', 'enable', '2020-12-18 03:13:27', NULL, '2020-12-03 07:51:13', NULL);

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
(1, 'Dynisty', 'support@dynistybranding.com', 'support@dynistybranding.com', 'support@dynistybranding.com', '(100) 030-0800', '', 'fev-icon.png', 'logo.png', 200, 900, 0.00, 'Mon to Fri : 9:00am to 6:00pm', 'bg-02.jpg', 'enable', 1, '2019-05-20 09:55:42', 1, '2020-10-07 14:35:39');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `ticket_no` text NOT NULL,
  `subject` varchar(70) NOT NULL,
  `department` varchar(40) NOT NULL,
  `message` text NOT NULL,
  `attachment_file` text DEFAULT NULL,
  `status` enum('Open','Answered','','') NOT NULL DEFAULT 'Open',
  `generated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `generated_by` int(11) NOT NULL,
  `answered_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(12, 1, 'muhammad.minhaj@technado.co', 'photo-1490131784822-b4626a8ec96a1.jpg', '1234562', '4k-ultra-hd-background-road-mountains-trees-autumn-leaves-ye1.jpg', 'Minhaj', NULL, NULL, 'admin', NULL, '12345', '', 0, '2020-10-07 18:42:27', 'Yes', '2021-01-19 11:05:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment_type`
--
ALTER TABLE `appointment_type`
  ADD PRIMARY KEY (`appointment_type_id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `client_intake_payments`
--
ALTER TABLE `client_intake_payments`
  ADD PRIMARY KEY (`client_payments_id`);

--
-- Indexes for table `client_package`
--
ALTER TABLE `client_package`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comments_id`);

--
-- Indexes for table `comments_files`
--
ALTER TABLE `comments_files`
  ADD PRIMARY KEY (`comments_files_id`);

--
-- Indexes for table `comments_images`
--
ALTER TABLE `comments_images`
  ADD PRIMARY KEY (`comments_images_id`);

--
-- Indexes for table `crm_contacts`
--
ALTER TABLE `crm_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `default_available`
--
ALTER TABLE `default_available`
  ADD PRIMARY KEY (`default_available_id`);

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
-- Indexes for table `kanban`
--
ALTER TABLE `kanban`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_department`
--
ALTER TABLE `main_department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `market`
--
ALTER TABLE `market`
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
-- Indexes for table `projects_files`
--
ALTER TABLE `projects_files`
  ADD PRIMARY KEY (`projects_files_id`);

--
-- Indexes for table `projects_tasks`
--
ALTER TABLE `projects_tasks`
  ADD PRIMARY KEY (`projects_tasks_id`);

--
-- Indexes for table `project_additional`
--
ALTER TABLE `project_additional`
  ADD PRIMARY KEY (`project_additional_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
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
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment_type`
--
ALTER TABLE `appointment_type`
  MODIFY `appointment_type_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `client_intake_payments`
--
ALTER TABLE `client_intake_payments`
  MODIFY `client_payments_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `client_package`
--
ALTER TABLE `client_package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `client_projects`
--
ALTER TABLE `client_projects`
  MODIFY `client_projects_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=331;

--
-- AUTO_INCREMENT for table `client_project_brief`
--
ALTER TABLE `client_project_brief`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comments_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `comments_files`
--
ALTER TABLE `comments_files`
  MODIFY `comments_files_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments_images`
--
ALTER TABLE `comments_images`
  MODIFY `comments_images_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `crm_contacts`
--
ALTER TABLE `crm_contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `default_available`
--
ALTER TABLE `default_available`
  MODIFY `default_available_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- AUTO_INCREMENT for table `kanban`
--
ALTER TABLE `kanban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `main_department`
--
ALTER TABLE `main_department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `market`
--
ALTER TABLE `market`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `master_admin`
--
ALTER TABLE `master_admin`
  MODIFY `master_admin_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `projects_files`
--
ALTER TABLE `projects_files`
  MODIFY `projects_files_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects_tasks`
--
ALTER TABLE `projects_tasks`
  MODIFY `projects_tasks_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_additional`
--
ALTER TABLE `project_additional`
  MODIFY `project_additional_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
