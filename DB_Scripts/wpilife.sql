
-- phpMyAdmin SQL Dump
-- version 2.11.11.3
-- http://www.phpmyadmin.net
--
-- Host: 68.178.142.191
-- Generation Time: Sep 25, 2013 at 01:10 PM
-- Server version: 5.0.96
-- PHP Version: 5.1.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wpilife`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `blogs_id` int(11) NOT NULL auto_increment,
  `blogs_type` varchar(32) character set utf8 NOT NULL default '',
  `blogs_title` varchar(128) character set utf8 NOT NULL default '',
  `blogs_image_cover` varchar(140) character set utf8 NOT NULL default 'default_cover.jpg',
  `blogs_price` varchar(32) character set utf8 NOT NULL default 'N/A',
  `blogs_content` text character set utf8 NOT NULL,
  `blogs_author` int(11) NOT NULL,
  `blogs_year` int(4) NOT NULL default '2013',
  `blogs_month` varchar(32) character set utf8 NOT NULL default 'August',
  `blogs_day` int(2) NOT NULL default '0',
  `blogs_date` datetime NOT NULL default '0001-01-01 00:00:00',
  `blogs_view_times` int(11) NOT NULL default '0',
  `blogs_up_time` int(11) NOT NULL default '0',
  `blogs_down_time` int(11) NOT NULL default '0',
  `blogs_allow_comment` tinyint(1) NOT NULL default '1',
  `blogs_available` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`blogs_id`),
  KEY `blogs_view_time` (`blogs_view_times`),
  KEY `blogs_author` (`blogs_author`),
  KEY `blogs_type` (`blogs_type`),
  KEY `blog_month` (`blogs_month`),
  KEY `blogs_year` (`blogs_year`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=11 ;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` VALUES(1, 'SELL', 'Sale for test (Not take it serious)', 'wpilife.jpg', '$1000', 'It is just for test (Not take it serious)', 2, 2013, 'August', 27, '2013-08-27 09:27:57', 0, 0, 0, 1, 1);
INSERT INTO `blogs` VALUES(5, 'SELL', 'Book for Sale or exchange', 'DBMS.jpg', '$13', '<p>\n	I have a book:&nbsp;<strong>Database Management Systems [International version]</strong>, which will be used for a CS class.&nbsp;Now it is for sale of $13, or you can exchange it with a WPI Flash Disk(4g or 8g).\n</p>\n<p>\n	<br />\n</p>\n<p>\n	Amazon Link here:&nbsp;<a href="http://www.amazon.com/Database-Management-Systems-Johannes-Ramakrishnan/dp/007123151X/ref=sr_1_2?ie=UTF8&qid=1377726430&sr=8-2&keywords=database+management+system">http://www.amazon.com/Database-Management-Systems-Johannes-Ramakrishnan/dp/007123151X/ref=sr_1_2?ie=UTF8&amp;qid=1377726430&amp;sr=8-2&amp;keywords=database+management+system</a> \n</p>\n<p>\n	<br />\n</p>\n<p>\n	This is not a test! And you can take it serious!\n</p>\n<p>\n	Thanks\n</p>', 2, 2013, 'August', 27, '2013-08-27 15:23:03', 0, 0, 0, 1, 0);
INSERT INTO `blogs` VALUES(3, 'BUY', 'Chair Needed', 'default_cover.jpg', 'N/A', '<p>\n	Chair NeededChair Nee<span style="background-color:#FFE500;">dedCha</span>ir Needed\n</p>\n<h1>\n	<span style="color:#E53333;">test</span> \n</h1>', 2, 2013, 'August', 27, '2013-08-27 12:20:00', 0, 0, 0, 1, 1);
INSERT INTO `blogs` VALUES(4, 'BUY', 'Second test of something I want to buy', 'default_cover.jpg', 'N/A', '<p>\n	Second test of something I want to buy\n</p>\n<p>\n	Second test of something I want to buySecond test of something I want to buySecond test of something I want to buySecond test of something I want to buy\n</p>', 2, 2013, 'August', 27, '2013-08-27 12:41:48', 0, 0, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `blog_tags`
--

CREATE TABLE `blog_tags` (
  `tags_id` int(11) NOT NULL auto_increment,
  `tags_name` varchar(32) character set utf8 NOT NULL default '',
  `blogs_id` int(11) NOT NULL,
  PRIMARY KEY  (`tags_id`),
  KEY `blogs_id` (`blogs_id`),
  KEY `tags_name` (`tags_name`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk AUTO_INCREMENT=1 ;

--
-- Dumping data for table `blog_tags`
--


-- --------------------------------------------------------

--
-- Table structure for table `blog_types`
--

CREATE TABLE `blog_types` (
  `types_id` int(11) NOT NULL auto_increment,
  `types_name` varchar(32) character set utf8 NOT NULL default '',
  `types_status` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`types_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=5 ;

--
-- Dumping data for table `blog_types`
--

INSERT INTO `blog_types` VALUES(1, 'Want to Sell', 1);
INSERT INTO `blog_types` VALUES(2, 'Want to Buy', 1);
INSERT INTO `blog_types` VALUES(3, 'Restaurant Recommendation', 1);
INSERT INTO `blog_types` VALUES(4, 'Share Experience', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL default '0',
  `ip_address` varchar(45) NOT NULL default '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL default '0',
  `user_data` text NOT NULL,
  PRIMARY KEY  (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_sessions`
--


-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comments_id` int(11) NOT NULL auto_increment,
  `blogs_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `comments_poster` int(11) NOT NULL,
  `comments` varchar(280) NOT NULL default '',
  `comments_date` datetime NOT NULL default '0001-01-01 00:00:00',
  PRIMARY KEY  (`comments_id`),
  KEY `blogs_id` (`blogs_id`,`parent_id`,`comments_poster`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk AUTO_INCREMENT=1 ;

--
-- Dumping data for table `comments`
--


-- --------------------------------------------------------

--
-- Table structure for table `contact_archive`
--

CREATE TABLE `contact_archive` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(32) default NULL,
  `email` varchar(64) NOT NULL,
  `comment` text NOT NULL,
  `date` datetime NOT NULL,
  `status` int(3) NOT NULL default '1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `contact_archive`
--

INSERT INTO `contact_archive` VALUES(5, 'Hao ', 'hzhou@wpi.edu', 'IIIIIIIIIIIIIIIII am Zhou Hao!!!!!', '2013-08-05 18:02:39', 1);
INSERT INTO `contact_archive` VALUES(6, 'Hao', 'hzhou@wpi.edu', 'Hey, I am Hao, and I have a better idea! Let''s rock', '2013-08-21 21:48:31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `countries_id` int(11) NOT NULL auto_increment,
  `countries_name` varchar(64) NOT NULL default '',
  `countries_iso_code_2` char(2) NOT NULL default '',
  `countries_iso_code_3` char(3) NOT NULL default '',
  PRIMARY KEY  (`countries_id`),
  KEY `idx_countries_name` (`countries_name`),
  KEY `idx_iso_2` (`countries_iso_code_2`),
  KEY `idx_iso_3` (`countries_iso_code_3`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=246 ;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` VALUES(240, 'Aaland Islands', 'AX', 'ALA');
INSERT INTO `countries` VALUES(1, 'Afghanistan', 'AF', 'AFG');
INSERT INTO `countries` VALUES(2, 'Albania', 'AL', 'ALB');
INSERT INTO `countries` VALUES(3, 'Algeria', 'DZ', 'DZA');
INSERT INTO `countries` VALUES(4, 'American Samoa', 'AS', 'ASM');
INSERT INTO `countries` VALUES(5, 'Andorra', 'AD', 'AND');
INSERT INTO `countries` VALUES(6, 'Angola', 'AO', 'AGO');
INSERT INTO `countries` VALUES(7, 'Anguilla', 'AI', 'AIA');
INSERT INTO `countries` VALUES(8, 'Antarctica', 'AQ', 'ATA');
INSERT INTO `countries` VALUES(9, 'Antigua and Barbuda', 'AG', 'ATG');
INSERT INTO `countries` VALUES(10, 'Argentina', 'AR', 'ARG');
INSERT INTO `countries` VALUES(11, 'Armenia', 'AM', 'ARM');
INSERT INTO `countries` VALUES(12, 'Aruba', 'AW', 'ABW');
INSERT INTO `countries` VALUES(13, 'Australia', 'AU', 'AUS');
INSERT INTO `countries` VALUES(14, 'Austria', 'AT', 'AUT');
INSERT INTO `countries` VALUES(15, 'Azerbaijan', 'AZ', 'AZE');
INSERT INTO `countries` VALUES(16, 'Bahamas', 'BS', 'BHS');
INSERT INTO `countries` VALUES(17, 'Bahrain', 'BH', 'BHR');
INSERT INTO `countries` VALUES(18, 'Bangladesh', 'BD', 'BGD');
INSERT INTO `countries` VALUES(19, 'Barbados', 'BB', 'BRB');
INSERT INTO `countries` VALUES(20, 'Belarus', 'BY', 'BLR');
INSERT INTO `countries` VALUES(21, 'Belgium', 'BE', 'BEL');
INSERT INTO `countries` VALUES(22, 'Belize', 'BZ', 'BLZ');
INSERT INTO `countries` VALUES(23, 'Benin', 'BJ', 'BEN');
INSERT INTO `countries` VALUES(24, 'Bermuda', 'BM', 'BMU');
INSERT INTO `countries` VALUES(25, 'Bhutan', 'BT', 'BTN');
INSERT INTO `countries` VALUES(26, 'Bolivia', 'BO', 'BOL');
INSERT INTO `countries` VALUES(27, 'Bosnia and Herzegowina', 'BA', 'BIH');
INSERT INTO `countries` VALUES(28, 'Botswana', 'BW', 'BWA');
INSERT INTO `countries` VALUES(29, 'Bouvet Island', 'BV', 'BVT');
INSERT INTO `countries` VALUES(30, 'Brazil', 'BR', 'BRA');
INSERT INTO `countries` VALUES(31, 'British Indian Ocean Territory', 'IO', 'IOT');
INSERT INTO `countries` VALUES(32, 'Brunei Darussalam', 'BN', 'BRN');
INSERT INTO `countries` VALUES(33, 'Bulgaria', 'BG', 'BGR');
INSERT INTO `countries` VALUES(34, 'Burkina Faso', 'BF', 'BFA');
INSERT INTO `countries` VALUES(35, 'Burundi', 'BI', 'BDI');
INSERT INTO `countries` VALUES(36, 'Cambodia', 'KH', 'KHM');
INSERT INTO `countries` VALUES(37, 'Cameroon', 'CM', 'CMR');
INSERT INTO `countries` VALUES(38, 'Canada', 'CA', 'CAN');
INSERT INTO `countries` VALUES(39, 'Cape Verde', 'CV', 'CPV');
INSERT INTO `countries` VALUES(40, 'Cayman Islands', 'KY', 'CYM');
INSERT INTO `countries` VALUES(41, 'Central African Republic', 'CF', 'CAF');
INSERT INTO `countries` VALUES(42, 'Chad', 'TD', 'TCD');
INSERT INTO `countries` VALUES(43, 'Chile', 'CL', 'CHL');
INSERT INTO `countries` VALUES(44, 'China', 'CN', 'CHN');
INSERT INTO `countries` VALUES(45, 'Christmas Island', 'CX', 'CXR');
INSERT INTO `countries` VALUES(46, 'Cocos (Keeling) Islands', 'CC', 'CCK');
INSERT INTO `countries` VALUES(47, 'Colombia', 'CO', 'COL');
INSERT INTO `countries` VALUES(48, 'Comoros', 'KM', 'COM');
INSERT INTO `countries` VALUES(49, 'Congo', 'CG', 'COG');
INSERT INTO `countries` VALUES(50, 'Cook Islands', 'CK', 'COK');
INSERT INTO `countries` VALUES(51, 'Costa Rica', 'CR', 'CRI');
INSERT INTO `countries` VALUES(52, 'Cote D''Ivoire', 'CI', 'CIV');
INSERT INTO `countries` VALUES(53, 'Croatia', 'HR', 'HRV');
INSERT INTO `countries` VALUES(54, 'Cuba', 'CU', 'CUB');
INSERT INTO `countries` VALUES(55, 'Cyprus', 'CY', 'CYP');
INSERT INTO `countries` VALUES(56, 'Czech Republic', 'CZ', 'CZE');
INSERT INTO `countries` VALUES(57, 'Denmark', 'DK', 'DNK');
INSERT INTO `countries` VALUES(58, 'Djibouti', 'DJ', 'DJI');
INSERT INTO `countries` VALUES(59, 'Dominica', 'DM', 'DMA');
INSERT INTO `countries` VALUES(60, 'Dominican Republic', 'DO', 'DOM');
INSERT INTO `countries` VALUES(61, 'Timor-Leste', 'TL', 'TLS');
INSERT INTO `countries` VALUES(62, 'Ecuador', 'EC', 'ECU');
INSERT INTO `countries` VALUES(63, 'Egypt', 'EG', 'EGY');
INSERT INTO `countries` VALUES(64, 'El Salvador', 'SV', 'SLV');
INSERT INTO `countries` VALUES(65, 'Equatorial Guinea', 'GQ', 'GNQ');
INSERT INTO `countries` VALUES(66, 'Eritrea', 'ER', 'ERI');
INSERT INTO `countries` VALUES(67, 'Estonia', 'EE', 'EST');
INSERT INTO `countries` VALUES(68, 'Ethiopia', 'ET', 'ETH');
INSERT INTO `countries` VALUES(69, 'Falkland Islands (Malvinas)', 'FK', 'FLK');
INSERT INTO `countries` VALUES(70, 'Faroe Islands', 'FO', 'FRO');
INSERT INTO `countries` VALUES(71, 'Fiji', 'FJ', 'FJI');
INSERT INTO `countries` VALUES(72, 'Finland', 'FI', 'FIN');
INSERT INTO `countries` VALUES(73, 'France', 'FR', 'FRA');
INSERT INTO `countries` VALUES(75, 'French Guiana', 'GF', 'GUF');
INSERT INTO `countries` VALUES(76, 'French Polynesia', 'PF', 'PYF');
INSERT INTO `countries` VALUES(77, 'French Southern Territories', 'TF', 'ATF');
INSERT INTO `countries` VALUES(78, 'Gabon', 'GA', 'GAB');
INSERT INTO `countries` VALUES(79, 'Gambia', 'GM', 'GMB');
INSERT INTO `countries` VALUES(80, 'Georgia', 'GE', 'GEO');
INSERT INTO `countries` VALUES(81, 'Germany', 'DE', 'DEU');
INSERT INTO `countries` VALUES(82, 'Ghana', 'GH', 'GHA');
INSERT INTO `countries` VALUES(83, 'Gibraltar', 'GI', 'GIB');
INSERT INTO `countries` VALUES(84, 'Greece', 'GR', 'GRC');
INSERT INTO `countries` VALUES(85, 'Greenland', 'GL', 'GRL');
INSERT INTO `countries` VALUES(86, 'Grenada', 'GD', 'GRD');
INSERT INTO `countries` VALUES(87, 'Guadeloupe', 'GP', 'GLP');
INSERT INTO `countries` VALUES(88, 'Guam', 'GU', 'GUM');
INSERT INTO `countries` VALUES(89, 'Guatemala', 'GT', 'GTM');
INSERT INTO `countries` VALUES(90, 'Guinea', 'GN', 'GIN');
INSERT INTO `countries` VALUES(91, 'Guinea-bissau', 'GW', 'GNB');
INSERT INTO `countries` VALUES(92, 'Guyana', 'GY', 'GUY');
INSERT INTO `countries` VALUES(93, 'Haiti', 'HT', 'HTI');
INSERT INTO `countries` VALUES(94, 'Heard and Mc Donald Islands', 'HM', 'HMD');
INSERT INTO `countries` VALUES(95, 'Honduras', 'HN', 'HND');
INSERT INTO `countries` VALUES(96, 'Hong Kong', 'HK', 'HKG');
INSERT INTO `countries` VALUES(97, 'Hungary', 'HU', 'HUN');
INSERT INTO `countries` VALUES(98, 'Iceland', 'IS', 'ISL');
INSERT INTO `countries` VALUES(99, 'India', 'IN', 'IND');
INSERT INTO `countries` VALUES(100, 'Indonesia', 'ID', 'IDN');
INSERT INTO `countries` VALUES(101, 'Iran (Islamic Republic of)', 'IR', 'IRN');
INSERT INTO `countries` VALUES(102, 'Iraq', 'IQ', 'IRQ');
INSERT INTO `countries` VALUES(103, 'Ireland', 'IE', 'IRL');
INSERT INTO `countries` VALUES(104, 'Israel', 'IL', 'ISR');
INSERT INTO `countries` VALUES(105, 'Italy', 'IT', 'ITA');
INSERT INTO `countries` VALUES(106, 'Jamaica', 'JM', 'JAM');
INSERT INTO `countries` VALUES(107, 'Japan', 'JP', 'JPN');
INSERT INTO `countries` VALUES(108, 'Jordan', 'JO', 'JOR');
INSERT INTO `countries` VALUES(109, 'Kazakhstan', 'KZ', 'KAZ');
INSERT INTO `countries` VALUES(110, 'Kenya', 'KE', 'KEN');
INSERT INTO `countries` VALUES(111, 'Kiribati', 'KI', 'KIR');
INSERT INTO `countries` VALUES(112, 'Korea, Democratic People''s Republic of', 'KP', 'PRK');
INSERT INTO `countries` VALUES(113, 'Korea, Republic of', 'KR', 'KOR');
INSERT INTO `countries` VALUES(114, 'Kuwait', 'KW', 'KWT');
INSERT INTO `countries` VALUES(115, 'Kyrgyzstan', 'KG', 'KGZ');
INSERT INTO `countries` VALUES(116, 'Lao People''s Democratic Republic', 'LA', 'LAO');
INSERT INTO `countries` VALUES(117, 'Latvia', 'LV', 'LVA');
INSERT INTO `countries` VALUES(118, 'Lebanon', 'LB', 'LBN');
INSERT INTO `countries` VALUES(119, 'Lesotho', 'LS', 'LSO');
INSERT INTO `countries` VALUES(120, 'Liberia', 'LR', 'LBR');
INSERT INTO `countries` VALUES(121, 'Libyan Arab Jamahiriya', 'LY', 'LBY');
INSERT INTO `countries` VALUES(122, 'Liechtenstein', 'LI', 'LIE');
INSERT INTO `countries` VALUES(123, 'Lithuania', 'LT', 'LTU');
INSERT INTO `countries` VALUES(124, 'Luxembourg', 'LU', 'LUX');
INSERT INTO `countries` VALUES(125, 'Macao', 'MO', 'MAC');
INSERT INTO `countries` VALUES(126, 'Macedonia, The Former Yugoslav Republic of', 'MK', 'MKD');
INSERT INTO `countries` VALUES(127, 'Madagascar', 'MG', 'MDG');
INSERT INTO `countries` VALUES(128, 'Malawi', 'MW', 'MWI');
INSERT INTO `countries` VALUES(129, 'Malaysia', 'MY', 'MYS');
INSERT INTO `countries` VALUES(130, 'Maldives', 'MV', 'MDV');
INSERT INTO `countries` VALUES(131, 'Mali', 'ML', 'MLI');
INSERT INTO `countries` VALUES(132, 'Malta', 'MT', 'MLT');
INSERT INTO `countries` VALUES(133, 'Marshall Islands', 'MH', 'MHL');
INSERT INTO `countries` VALUES(134, 'Martinique', 'MQ', 'MTQ');
INSERT INTO `countries` VALUES(135, 'Mauritania', 'MR', 'MRT');
INSERT INTO `countries` VALUES(136, 'Mauritius', 'MU', 'MUS');
INSERT INTO `countries` VALUES(137, 'Mayotte', 'YT', 'MYT');
INSERT INTO `countries` VALUES(138, 'Mexico', 'MX', 'MEX');
INSERT INTO `countries` VALUES(139, 'Micronesia, Federated States of', 'FM', 'FSM');
INSERT INTO `countries` VALUES(140, 'Moldova', 'MD', 'MDA');
INSERT INTO `countries` VALUES(141, 'Monaco', 'MC', 'MCO');
INSERT INTO `countries` VALUES(142, 'Mongolia', 'MN', 'MNG');
INSERT INTO `countries` VALUES(143, 'Montserrat', 'MS', 'MSR');
INSERT INTO `countries` VALUES(144, 'Morocco', 'MA', 'MAR');
INSERT INTO `countries` VALUES(145, 'Mozambique', 'MZ', 'MOZ');
INSERT INTO `countries` VALUES(146, 'Myanmar', 'MM', 'MMR');
INSERT INTO `countries` VALUES(147, 'Namibia', 'NA', 'NAM');
INSERT INTO `countries` VALUES(148, 'Nauru', 'NR', 'NRU');
INSERT INTO `countries` VALUES(149, 'Nepal', 'NP', 'NPL');
INSERT INTO `countries` VALUES(150, 'Netherlands', 'NL', 'NLD');
INSERT INTO `countries` VALUES(151, 'Netherlands Antilles', 'AN', 'ANT');
INSERT INTO `countries` VALUES(152, 'New Caledonia', 'NC', 'NCL');
INSERT INTO `countries` VALUES(153, 'New Zealand', 'NZ', 'NZL');
INSERT INTO `countries` VALUES(154, 'Nicaragua', 'NI', 'NIC');
INSERT INTO `countries` VALUES(155, 'Niger', 'NE', 'NER');
INSERT INTO `countries` VALUES(156, 'Nigeria', 'NG', 'NGA');
INSERT INTO `countries` VALUES(157, 'Niue', 'NU', 'NIU');
INSERT INTO `countries` VALUES(158, 'Norfolk Island', 'NF', 'NFK');
INSERT INTO `countries` VALUES(159, 'Northern Mariana Islands', 'MP', 'MNP');
INSERT INTO `countries` VALUES(160, 'Norway', 'NO', 'NOR');
INSERT INTO `countries` VALUES(161, 'Oman', 'OM', 'OMN');
INSERT INTO `countries` VALUES(162, 'Pakistan', 'PK', 'PAK');
INSERT INTO `countries` VALUES(163, 'Palau', 'PW', 'PLW');
INSERT INTO `countries` VALUES(164, 'Panama', 'PA', 'PAN');
INSERT INTO `countries` VALUES(165, 'Papua New Guinea', 'PG', 'PNG');
INSERT INTO `countries` VALUES(166, 'Paraguay', 'PY', 'PRY');
INSERT INTO `countries` VALUES(167, 'Peru', 'PE', 'PER');
INSERT INTO `countries` VALUES(168, 'Philippines', 'PH', 'PHL');
INSERT INTO `countries` VALUES(169, 'Pitcairn', 'PN', 'PCN');
INSERT INTO `countries` VALUES(170, 'Poland', 'PL', 'POL');
INSERT INTO `countries` VALUES(171, 'Portugal', 'PT', 'PRT');
INSERT INTO `countries` VALUES(172, 'Puerto Rico', 'PR', 'PRI');
INSERT INTO `countries` VALUES(173, 'Qatar', 'QA', 'QAT');
INSERT INTO `countries` VALUES(174, 'Reunion', 'RE', 'REU');
INSERT INTO `countries` VALUES(175, 'Romania', 'RO', 'ROU');
INSERT INTO `countries` VALUES(176, 'Russian Federation', 'RU', 'RUS');
INSERT INTO `countries` VALUES(177, 'Rwanda', 'RW', 'RWA');
INSERT INTO `countries` VALUES(178, 'Saint Kitts and Nevis', 'KN', 'KNA');
INSERT INTO `countries` VALUES(179, 'Saint Lucia', 'LC', 'LCA');
INSERT INTO `countries` VALUES(180, 'Saint Vincent and the Grenadines', 'VC', 'VCT');
INSERT INTO `countries` VALUES(181, 'Samoa', 'WS', 'WSM');
INSERT INTO `countries` VALUES(182, 'San Marino', 'SM', 'SMR');
INSERT INTO `countries` VALUES(183, 'Sao Tome and Principe', 'ST', 'STP');
INSERT INTO `countries` VALUES(184, 'Saudi Arabia', 'SA', 'SAU');
INSERT INTO `countries` VALUES(185, 'Senegal', 'SN', 'SEN');
INSERT INTO `countries` VALUES(186, 'Seychelles', 'SC', 'SYC');
INSERT INTO `countries` VALUES(187, 'Sierra Leone', 'SL', 'SLE');
INSERT INTO `countries` VALUES(188, 'Singapore', 'SG', 'SGP');
INSERT INTO `countries` VALUES(189, 'Slovakia (Slovak Republic)', 'SK', 'SVK');
INSERT INTO `countries` VALUES(190, 'Slovenia', 'SI', 'SVN');
INSERT INTO `countries` VALUES(191, 'Solomon Islands', 'SB', 'SLB');
INSERT INTO `countries` VALUES(192, 'Somalia', 'SO', 'SOM');
INSERT INTO `countries` VALUES(193, 'South Africa', 'ZA', 'ZAF');
INSERT INTO `countries` VALUES(194, 'South Georgia and the South Sandwich Islands', 'GS', 'SGS');
INSERT INTO `countries` VALUES(195, 'Spain', 'ES', 'ESP');
INSERT INTO `countries` VALUES(196, 'Sri Lanka', 'LK', 'LKA');
INSERT INTO `countries` VALUES(197, 'St. Helena', 'SH', 'SHN');
INSERT INTO `countries` VALUES(198, 'St. Pierre and Miquelon', 'PM', 'SPM');
INSERT INTO `countries` VALUES(199, 'Sudan', 'SD', 'SDN');
INSERT INTO `countries` VALUES(200, 'Suriname', 'SR', 'SUR');
INSERT INTO `countries` VALUES(201, 'Svalbard and Jan Mayen Islands', 'SJ', 'SJM');
INSERT INTO `countries` VALUES(202, 'Swaziland', 'SZ', 'SWZ');
INSERT INTO `countries` VALUES(203, 'Sweden', 'SE', 'SWE');
INSERT INTO `countries` VALUES(204, 'Switzerland', 'CH', 'CHE');
INSERT INTO `countries` VALUES(205, 'Syrian Arab Republic', 'SY', 'SYR');
INSERT INTO `countries` VALUES(206, 'Taiwan', 'TW', 'TWN');
INSERT INTO `countries` VALUES(207, 'Tajikistan', 'TJ', 'TJK');
INSERT INTO `countries` VALUES(208, 'Tanzania, United Republic of', 'TZ', 'TZA');
INSERT INTO `countries` VALUES(209, 'Thailand', 'TH', 'THA');
INSERT INTO `countries` VALUES(210, 'Togo', 'TG', 'TGO');
INSERT INTO `countries` VALUES(211, 'Tokelau', 'TK', 'TKL');
INSERT INTO `countries` VALUES(212, 'Tonga', 'TO', 'TON');
INSERT INTO `countries` VALUES(213, 'Trinidad and Tobago', 'TT', 'TTO');
INSERT INTO `countries` VALUES(214, 'Tunisia', 'TN', 'TUN');
INSERT INTO `countries` VALUES(215, 'Turkey', 'TR', 'TUR');
INSERT INTO `countries` VALUES(216, 'Turkmenistan', 'TM', 'TKM');
INSERT INTO `countries` VALUES(217, 'Turks and Caicos Islands', 'TC', 'TCA');
INSERT INTO `countries` VALUES(218, 'Tuvalu', 'TV', 'TUV');
INSERT INTO `countries` VALUES(219, 'Uganda', 'UG', 'UGA');
INSERT INTO `countries` VALUES(220, 'Ukraine', 'UA', 'UKR');
INSERT INTO `countries` VALUES(221, 'United Arab Emirates', 'AE', 'ARE');
INSERT INTO `countries` VALUES(222, 'United Kingdom', 'GB', 'GBR');
INSERT INTO `countries` VALUES(223, 'United States', 'US', 'USA');
INSERT INTO `countries` VALUES(224, 'United States Minor Outlying Islands', 'UM', 'UMI');
INSERT INTO `countries` VALUES(225, 'Uruguay', 'UY', 'URY');
INSERT INTO `countries` VALUES(226, 'Uzbekistan', 'UZ', 'UZB');
INSERT INTO `countries` VALUES(227, 'Vanuatu', 'VU', 'VUT');
INSERT INTO `countries` VALUES(228, 'Vatican City State (Holy See)', 'VA', 'VAT');
INSERT INTO `countries` VALUES(229, 'Venezuela', 'VE', 'VEN');
INSERT INTO `countries` VALUES(230, 'Viet Nam', 'VN', 'VNM');
INSERT INTO `countries` VALUES(231, 'Virgin Islands (British)', 'VG', 'VGB');
INSERT INTO `countries` VALUES(232, 'Virgin Islands (U.S.)', 'VI', 'VIR');
INSERT INTO `countries` VALUES(233, 'Wallis and Futuna Islands', 'WF', 'WLF');
INSERT INTO `countries` VALUES(234, 'Western Sahara', 'EH', 'ESH');
INSERT INTO `countries` VALUES(235, 'Yemen', 'YE', 'YEM');
INSERT INTO `countries` VALUES(236, 'Serbia', 'RS', 'SRB');
INSERT INTO `countries` VALUES(238, 'Zambia', 'ZM', 'ZMB');
INSERT INTO `countries` VALUES(239, 'Zimbabwe', 'ZW', 'ZWE');
INSERT INTO `countries` VALUES(241, 'Palestinian Territory', 'PS', 'PSE');
INSERT INTO `countries` VALUES(242, 'Montenegro', 'ME', 'MNE');
INSERT INTO `countries` VALUES(243, 'Guernsey', 'GG', 'GGY');
INSERT INTO `countries` VALUES(244, 'Isle of Man', 'IM', 'IMN');
INSERT INTO `countries` VALUES(245, 'Jersey', 'JE', 'JEY');

-- --------------------------------------------------------

--
-- Table structure for table `cssa_activities`
--

CREATE TABLE `cssa_activities` (
  `activities_id` int(11) NOT NULL auto_increment,
  `activities_title` varchar(128) NOT NULL default '',
  `activities_content` text NOT NULL,
  `activities_author` int(11) NOT NULL,
  `activities_year` int(4) NOT NULL default '2013',
  `activities_month` varchar(32) NOT NULL default 'August',
  `activities_day` int(2) NOT NULL default '0',
  `activities_date` datetime NOT NULL default '0001-01-01 00:00:00',
  `activities_view_times` int(11) NOT NULL default '0',
  `activities_up_time` int(11) NOT NULL default '0',
  `activities_down_time` int(11) NOT NULL default '0',
  `activities_allow_comment` tinyint(1) NOT NULL default '1',
  `type` varchar(12) NOT NULL default 'activity',
  PRIMARY KEY  (`activities_id`),
  KEY `activities_view_time` (`activities_view_times`),
  KEY `activities_author` (`activities_author`),
  KEY `activities_year` (`activities_year`),
  KEY `activities_month` (`activities_month`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `cssa_activities`
--

INSERT INTO `cssa_activities` VALUES(1, 'Activity Title for test', '<p>\n Activity Content for test\n</p>\n<p>\n <span><em>Activity<span> Content for test</span></em></span> \n</p>\n<h1>\n <span>Activity C<span >o</span><span><span >ntent</span> for tes</span>t</span> \n</h1>\n<p>\n <span><strong>Activity Content for test</strong></span><span><strong></strong></span> \n</p>', 2, 2013, 'August', 25, '2013-08-25 12:25:34', 0, 0, 0, 1, 'activity');
INSERT INTO `cssa_activities` VALUES(2, 'Activity 222 for test', '<p>\n Activity 222 for test\n</p>\n<p>\n Activity 2<span >2  for test</span><span >Activity 22</span>2 for testActivity 222 for testActivity 222 for test\n</p>\n<p>\n Activity 222 for test\n</p>', 2, 2013, 'August', 25, '2013-08-25 14:58:04', 0, 0, 0, 1, 'activity');
INSERT INTO `cssa_activities` VALUES(3, 'Activity test in Sep', '<p>\n Activity test in Sep\n</p>\n<p>\n <br />\n</p>\n<p>\n <img src="/kindeditor/attached/image/20130904/20130904115716_25514.jpg" alt="" />\n</p>', 2, 2013, 'September', 4, '2013-09-04 11:57:18', 0, 0, 0, 1, 'activity');

-- --------------------------------------------------------

--
-- Table structure for table `cssa_album`
--

CREATE TABLE `cssa_album` (
  `album_id` int(11) NOT NULL auto_increment,
  `album_name` varchar(140) NOT NULL,
  `album_description` varchar(500) NOT NULL,
  `album_cover` varchar(140) NOT NULL default 'default.png',
  PRIMARY KEY  (`album_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `cssa_album`
--


-- --------------------------------------------------------

--
-- Table structure for table `cssa_blogs`
--

CREATE TABLE `cssa_blogs` (
  `blogs_id` int(11) NOT NULL auto_increment,
  `blogs_title` varchar(128) NOT NULL default '',
  `blogs_content` text NOT NULL,
  `blogs_author` int(11) NOT NULL,
  `blogs_year` int(4) NOT NULL default '2013',
  `blogs_month` varchar(32) NOT NULL default 'August',
  `blogs_day` int(2) NOT NULL default '0',
  `blogs_date` datetime NOT NULL default '0001-01-01 00:00:00',
  `blogs_view_times` int(11) NOT NULL default '0',
  `blogs_up_time` int(11) NOT NULL default '0',
  `blogs_down_time` int(11) NOT NULL default '0',
  `blogs_allow_comment` tinyint(1) NOT NULL default '1',
  `type` varchar(12) NOT NULL default 'blog',
  PRIMARY KEY  (`blogs_id`),
  KEY `blogs_view_time` (`blogs_view_times`),
  KEY `blogs_author` (`blogs_author`),
  KEY `blogs_year` (`blogs_year`),
  KEY `blog_month` (`blogs_month`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `cssa_blogs`
--

INSERT INTO `cssa_blogs` VALUES(1, '2013 MIT-CSSA中秋Heat on Water游船舞会', '<p>\n 想体验热力四射的水上舞会？曾憧憬在游轮上意外的邂逅？盼望与数百人热闹喧哗共同赏明月，庆中秋？那么请随我们登上Provincetown II号——2013 MIT-CSSA中秋游船派对欢迎你！中秋游船是MIT-CSSA的传统活动，已经有近的历史，今年我们诚挚的邀请你加入年度波士顿华人社区最为激动人心的巨型Heat on  water游船舞会！在这里，你将在超大型三层华丽游船上结交大波士顿地区各路同胞，共享受良辰美景，庆祝中秋之夜，并在露天平台之上欣赏波士顿港湾的夕阳月色。甲板上由靓丽劲爆舞团和专业DJ引领激情澎湃夜晚！当然，月光音乐海景一定缺不了美酒了。我们还会提供酒精饮品，供你尽兴！&nbsp;\n</p>\n<p>\n 俊男美女，泛舟明月；劲爆舞会，点燃中秋。如果你心动了，还不赶快加入我们，船票有限！&nbsp;\n</p>\n<p>\n 时间: 2013年9月15日 (星期日) ，晚6:30-10:00 (6:30登船，7:00起航)&nbsp;\n</p>\n<p>\n 登船地点: 200 Seaport Blvd. Suite 50, Boston, MA 02210, Pronvincetown II号邮轮&nbsp;\n</p>\n<p>\n 交通：MBTA乘坐silver line到World Trade Center 下车，步行可到游船码头。&nbsp;\n</p>\n<p>\n 售票信息：&nbsp;\n</p>\n<p>\n 第一季(08/17-09/04，限购450张)  MIT: $22  Guests: $28&nbsp;\n</p>\n<p>\n 第二季(09/05-09/14)  MIT: $32  Guests: $38&nbsp;\n</p>\n<p>\n 当日现场购票：$50 （只收现金）&nbsp;\n</p>\n<p>\n 支持团队购票(上限5人)！&nbsp;\n</p>\n<p>\n 购票方式: 请猛击这里！\n</p>\n<p>\n &nbsp;注：门票包含限量晚餐，不包含酒类。请携带现金用于购买船上酒类及额外餐点。本次游船活动仅对21周岁以上同胞开放，请持政府发放的有效证件登船。&nbsp;\n</p>\n<p>\n 详情请浏览 http://cssa.mit.edu/ 或邮件咨询cssa-cruise-exec@mit.edu&nbsp;\n</p>\n<p>\n 主办方：MIT-CSSA，浮云相声社&nbsp;\n</p>\n<p>\n 赞助方：感谢 CORT 和牛牛收书的大力支持与赞助!\nCORT (家具租借公司) fills your space with great looking furniture from bed for bedroom to cookware for kitchen and help you get acclimated to the area quickly so you focus on your studies.&nbsp;\n</p>\n<p>\n 牛牛收书：现金收书,，预约上门！闲置的书籍要处理吗? 回收价格根据书本质量和需求程度有不同，有的高达70%。\n</p>\n<p>\n 微信公共主页ID：newnewshoushu 邮箱：book@newnewinc.com.&nbsp;\n</p>\n<p>\n 麻省理工学院中国学生学者联合会 (MIT-CSSA)&nbsp;\n</p>\n<p>\n 2013年8月17日\n</p>', 1, 2013, 'August', 24, '2013-08-25 15:22:20', 0, 0, 0, 1, 'blog');
INSERT INTO `cssa_blogs` VALUES(2, 'WPI CSSA Maillist 文明使用章程 （最终版）', '<p>\n 首先，介绍一下Maillist 的作用，在WPI，它是快速快速，使用方便，有效的通讯工具。能够即使与WPI社区内所有学生、老师、团体、组织进行沟通，保持联系的有效平台。常用邮件群包括本科生、研究生、教职工等邮件列表群，这些邮件群是为讨论或通知、官方公布校内新闻、活动消息、课程通知等而设立的。访问这些邮件群是一种特权，伍斯特理工很乐意将这种特权提供给其成员。但任何特权，它带有责任。&nbsp;\n</p>\n<p>\n WPI CSSA Mail list 是WPI邮件列表群的其中一员，因此我们严格遵守学校邮件群的使用守则（详细请见：https://www.wpi.edu/Academics/CCC/Help/Email/etiquette.html，请使用自己WPI 账户的账号和密码登陆）。此外，CSSA 作为学校最大的中国学生学者组织，一直致力于促进为在伍斯特理工学生学者提供生活学习的便利，促进知识和文化交流活动，为留学生之间的信息交换提供平台，并在校园和美国维护其成员的权利，机会和利益。&nbsp;\n</p>\n<p>\n 随着新来的中国留学生与日俱增，邮件群的管理任务也越来越繁重，我们每天都有专人负责邮件的管理，但是对于邮件群内容我们无权进行手动滤过，这是我们无法触及的管理范围。我们因此也正在建立WPI CSSA BBS论坛，专门用于商品交易买卖、租房、学术工作交流、CSSA公共讨论等。CSSA Maillist将专门用于各类学术、文艺、社交等活动的信息发布，以及各位同学学者提供交流、娱乐、学习、成长，和求职的机会。我们相信这样能更好的服务于WPI的华人社区，也能对CSSA MAILLIST进行更好的质量管理。\n在此，请大家严格遵循WPI  CSSA 文明使用章程，我们呼吁每一位邮件订阅者能自觉做到一下守则，为干净的网络环境共同努力。我们将采取更加严格的邮件审查制度，同时对某些邮箱进行屏蔽和清理。&nbsp;\n</p>\n<p>\n 使用须知：&nbsp;\n</p>\n<p>\n 1、  加入或退出邮件群，或要变更邮件群地址，请发邮件至：<a href="mailto:zhuang@wpi.edu" target="_blank">zhuang@wpi.edu&nbsp;</a>\n</p>\n<p>\n 2、  请不要发送大量重复邮件。如果对学习、生活上出现的问题要寻求帮助，可以先qq群里询问（2012 WPICSSA qq群号：218715001，2013 WPICSSA qq群号：234016698），如实在需紧急帮助，再选择在mail list上发布。&nbsp;\n</p>\n<p>\n 3、  不得发布商业广告或带以个人名利目的的言论；&nbsp;\n</p>\n<p>\n 4、  不得发布损害CSSA声誉及成员个人声誉的言论；&nbsp;\n</p>\n<p>\n 5、  不得在群内吵架、对骂，不得发布嘲笑、讽刺、抵毁他人以及有可能引起他人不安、影响团结的言论；严禁随意攻击他人扰乱群内秩序。\n</p>\n<p>\n 6、  邮件名称与言论不得涉及政治、宗教、商业以及地域敏感性、或其他引起争议性的各方面问题;&nbsp;\n</p>\n<p>\n 7、  请不要发任何涉及暴力，色情，种族歧视等不良内容的邮件，发现一次我们将会直接屏蔽邮箱。&nbsp;\n</p>\n<p>\n 8、 如果违反以上规则成员，CSSA有权清除出群。\n</p>\n<p>\n &nbsp;CSSA保留对Maillist的管理权和解释权。\n</p>\n<p>\n &nbsp;如有带来的不便，尽请谅解，按章程办事才能建立一个纯净、和谐的交流平台。因此恳请大家遵守Maillist文明使用章程。希望这个平台继续为各位学生学者提供服务和便利！多谢大家配合：）&nbsp;\n</p>\n<p>\n WPI-CSSA\n</p>', 1, 2013, 'August', 24, '2013-08-25 13:30:21', 0, 0, 0, 1, 'blog');
INSERT INTO `cssa_blogs` VALUES(3, '2013-2014 WPI-CSSA招新', '<span >又值一年招贤纳士之际，WPI-CSSA诚挚渴求新鲜的血液来为我们新学年的活动出谋划策。</span><br />\n为了更加高效和顺利的为WPI CSSA中国学生学者服务，提高CSSA的组织力和执行力，加强WPI和其他学校、组织、企业之间的联系，并给中国学生学者提供一个锻炼领导力和展示自我的平台，现WPI CSSA特面向全校中国学生学者招纳新成员。<br />\n如果你是自带犀利brainstorm属性的鬼才、霸气侧漏的策划能手，如果你多才多艺，擅于组织策划各类精彩绝伦的晚会活动，或者你享受与校外商家的对弈，擅长与商家建立良好合作关系，又或者你有着一颗服务大众的心，想为各类活动出一份力，那就不要再等了，加入我们吧！WPI-CSSA将给予大家充分展示自己才华的平台！<br />\n一、招聘条件<br />\n现就读于WPI的中国学生、学者；<br />\n热心学生工作，乐意为学校、为同学服务，有奉献精神；<br />\n严于律己，有责任心，有一定的工作能力和组织协调的能力；<br />\n工作主动，勤于思考，善于开拓，注重团队精神。<br />\n<br />\n二、招新职位和部门介绍<br />\n<br />\nl &nbsp; 秘书<br />\n职责：<br />\n1、协助主席、副主席开展工作，管理好学生会各类文档资料。<br />\n<br />\n2、撰写活动文字材料,包括CSSA各项活动记录，及活动后的总结。起草会议文件、作会议纪要等。落实、通知学生会会议和活动时间、地点。<br />\n3、负责各项报销事宜，并和财务部直接沟通。<br />\n<br />\n要求：<br />\n文笔较好，工作严谨踏实负责。<br />\n<br />\n<br />\nl &nbsp; 文体部<br />\n职责：<br />\n1、组织、策划各大晚会和活动，活跃校园文化气氛，丰富广大同学业余文化生活。<br />\n2、筹划各类体育比赛，增进友谊，增强身体素质。<br />\n3、开发新颖且积极的文艺活动方案，联谊交流活动。<br />\n<br />\n要求：<br />\n积极、活泼。较强的组织和交流能力，有领导/策划/组织过大型活动经验的，或有特长才艺的优先考虑。<br />\n<br />\n<br />\nl &nbsp; 宣传部<br />\n职责：<br />\n1、负责CSSA所有活动和项目的推广，包括校内宣传和网络宣传。渠道包括人人，微博，Facebook，Linkedin，邮件，网站，论坛等等。推广方式包括文字，图片，视频，和其他创意类方式。<br />\n2、负责学生会网络管理与信息更新，以及学生会在网络媒体中形象的维护。<br />\n3、为各类活动提供宣传支持, 负责活动宣传材料（如宣传海报、传单、照片拍摄、视频制作等），维护学生会，网络平台的活动推广。<br />\n4、协助技术部、新闻创意部共同维护WPI CSSA网站，发布最新消息和热点新闻。<br />\n与各个部门及当地媒体协作，通过网络平台充分展现 CSSA 特色。<br />\n<br />\n要求：<br />\n积极主动，认真负责，善于交流，有团队意识，创新意识。对设计、制图有浓厚兴趣爱好者、具有平面设计、多媒体设计经验者优先考虑。<br />\n<br />\n<br />\n<br />\nl &nbsp; 新闻创意部<br />\n职责：<br />\n1、是学生会的新闻平台，负责所有活动的文字编辑工作。包括具体的准备，操作形式等等。策划各类具有新意的校园活动吸引同学们的眼球，丰富大家的课余生活。<br />\n2、对CSSA各项活动与宣传部部共同进行前期宣传推广，中期跟进采访，及后期总结报导。协助技术部共同维护WPI CSSA网站，发布最新消息和热点新闻。与各个部门及当地媒体协作，通过网络平台充分展现 CSSA 特色。<br />\n3、积极关注校园热点问题，向学生征集、向相关部门反映有关广大学生在生活中遇到的问题。对其它相关学生活动进行采访报导。<br />\n4、负责活动摄影与摄像。<br />\n<br />\n要求：<br />\n思维活跃，勇于创新。对新闻采写、摄影摄像或编排设计有一定的兴趣或能力。有制作视频（构思，拍摄，编辑）的兴趣或者经验者优先考虑。<br />\n<br />\n<br />\n<br />\nl &nbsp; 外联部<br />\n职责：<br />\n1、拓宽校际交流，增进学生-企业合作关系，提高CSSA在社会上的知名度，为CSSA各项活动筹集资金。<br />\n2、负责学生会与外界组织及学校内部管理人员接洽商谈，公共部是CSSA的外事部门，负责学生会的各项对外工作接洽商谈；<br />\n3、负责与各兄弟院校的联络与交流，促进与各兄弟学院多层次，多渠道的合作。<br />\n<br />\n要求：<br />\n有较好的语言表达能力和说服力，人际沟通能力较强，并对社会的一些情况有很好的了解，比如广告效应和运营模式等。要有较强的团队合作精神及团队责任感。<br />\n<br />\n<br />\nl &nbsp; IT技术部<br />\n职责：<br />\n1、负责CSSA所有技术方面的工作，同时涉及新系统的设计，比如说接机系统，找房系统，买卖论坛等。 <br />\n2、建设维护WPI-CSSA网站（目前还在初期设计阶段），对CSSA网站和论坛进行日常管理、更新及维护。<br />\n3、协助新闻创意部制作、整理晚会及活动视频。<br />\n<br />\n要求：<br />\n有责任心，有设计制作网页，网站开发管理经验的同学优先考虑。<br />\n<br />\n<br />\nl &nbsp; 生活组织部<br />\n职责：<br />\n1、学生会的内部建设中心，与各大部门互相配合，负责和协助其他部门，布置活动场地，丰富学生文化生活，如定期组织聚餐、游玩等。<br />\n2、负责学生会各类活动的后勤工作，采购活动用品及食品。<br />\n3、负责接待新生的各项事宜，包括临时住房、家具行、买菜购物活动等。<br />\n<br />\n要求：<br />\n主动积极，踏实肯干。善良、热情、真诚，需要有吃苦耐劳的精神。愿意为CSSA付出。<br />\n<br />\n三、招新方式<br />\n所有职位面向新老会员开放。请有意报名的同学请点击以下链接填写报名表格：https://docs.google.com/forms/d/1Mzb5F4rjMTBXnIlLhFfUUMWJJPqEAv2Xpn1gbDCv0Ks/edit<br />\n报名截止时间：2013年9月8日12:00pm<br />\n希望各位能够积极从速报名，以便CSSA各项工作的迅速和高效开展！同时，如若您对WPI CSSA的建设和活动有任何的建议和意见，也请发送邮件到 zhuang@wpi.edu&lt;mailto:zhuang@wpi.edu&gt;。您的建议将是我们前进的方向和动力！<br />\n<br />\n青春岁月，摆脱不了的回肠荡气；超越自我，从昨天延伸到今天，CSSA永远不变的本色！CSSA诚挚期待你的加入！<br />', 1, 2013, 'August', 27, '2013-08-27 21:08:05', 0, 0, 0, 1, 'blog');

-- --------------------------------------------------------

--
-- Table structure for table `cssa_manager_list`
--

CREATE TABLE `cssa_manager_list` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `user_title` varchar(64) NOT NULL default 'no title',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `cssa_manager_list`
--

INSERT INTO `cssa_manager_list` VALUES(4, 1, 'Administrator');
INSERT INTO `cssa_manager_list` VALUES(3, 2, 'Header of IT technology team');
INSERT INTO `cssa_manager_list` VALUES(6, 9, 'Handsome Guy');

-- --------------------------------------------------------

--
-- Table structure for table `cssa_photograph`
--

CREATE TABLE `cssa_photograph` (
  `photo_id` int(11) NOT NULL auto_increment,
  `album_id` int(11) NOT NULL,
  `photo_url` varchar(140) NOT NULL,
  `photo_description` varchar(500) NOT NULL,
  `photo_date` datetime NOT NULL default '0001-01-01 00:00:00',
  PRIMARY KEY  (`photo_id`),
  KEY `album_id` (`album_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `cssa_photograph`
--


-- --------------------------------------------------------

--
-- Table structure for table `cssa_photograph_type`
--

CREATE TABLE `cssa_photograph_type` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(32) NOT NULL,
  `sort` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `sort` (`sort`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `cssa_photograph_type`
--

INSERT INTO `cssa_photograph_type` VALUES(1, 'stillLife', 0);
INSERT INTO `cssa_photograph_type` VALUES(2, 'LandScape ', 0);
INSERT INTO `cssa_photograph_type` VALUES(3, 'Animal', 0);
INSERT INTO `cssa_photograph_type` VALUES(4, 'People', 0);
INSERT INTO `cssa_photograph_type` VALUES(5, 'Activity', 0);

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `faq_id` int(11) NOT NULL auto_increment,
  `faq_type` varchar(32) character set utf8 NOT NULL,
  `faq_questions` varchar(500) character set utf8 NOT NULL,
  `faq_answers` text character set utf8 NOT NULL,
  `faq_helpful` int(11) NOT NULL default '0',
  `faq_shit` int(11) NOT NULL default '0',
  `faq_date` datetime NOT NULL default '0001-01-01 00:00:00',
  `faq_status` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`faq_id`),
  KEY `faq_type` (`faq_type`),
  KEY `faq_helpful` (`faq_helpful`,`faq_shit`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=4 ;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` VALUES(1, 'School Life', 'Who am I?', 'I am Crazy Egg! Haha', 0, 0, '0001-01-01 00:00:00', 1);
INSERT INTO `faq` VALUES(3, 'Daily Life', 'Do you believe that I am a FAQ?', 'Sure, I believe you are!', 0, 0, '0001-01-01 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `faq_type`
--

CREATE TABLE `faq_type` (
  `id` int(11) NOT NULL auto_increment,
  `type` varchar(64) NOT NULL,
  `status` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `faq_type`
--

INSERT INTO `faq_type` VALUES(1, 'Daily Life', 1);
INSERT INTO `faq_type` VALUES(2, 'School Life', 1);

-- --------------------------------------------------------

--
-- Table structure for table `house_properties`
--

CREATE TABLE `house_properties` (
  `properties_id` int(11) NOT NULL auto_increment,
  `blogs_id` int(11) NOT NULL,
  `bedrooms_count` int(3) NOT NULL,
  `month_rent` decimal(15,4) NOT NULL default '0.0000',
  `water_included` tinyint(1) NOT NULL default '1',
  `electricity_included` tinyint(1) NOT NULL default '0',
  `heat_included` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`properties_id`),
  KEY `blogs_id` (`blogs_id`,`bedrooms_count`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk AUTO_INCREMENT=1 ;

--
-- Dumping data for table `house_properties`
--


-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id` int(11) NOT NULL auto_increment,
  `status_name` varchar(64) NOT NULL default '',
  `is_active` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`status_id`),
  KEY `idx_status_name` (`status_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `status`
--


-- --------------------------------------------------------

--
-- Table structure for table `suvival_guide`
--

CREATE TABLE `suvival_guide` (
  `id` int(11) NOT NULL auto_increment,
  `index` varchar(140) NOT NULL default '',
  `parent_id` int(11) NOT NULL default '0',
  `content` text NOT NULL,
  `sort` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `parent_id` (`parent_id`),
  KEY `sort` (`sort`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `suvival_guide`
--

INSERT INTO `suvival_guide` VALUES(1, '前言', 0, '<h1>\n	<span style="color:#E53333;">前言 </span> \n</h1>\n<hr />\n<p>\n	亲爱的<span>同学</span><span style="color:;">:</span>\n</p>\n<p>\n	<span style="font-size:12px;font-weight:normal;line-height:1.5;">你好!</span> \n</p>\n<p class="normal">\n	首先我们代表WPI中国学生学者联谊会Chinese Students &amp; Scholars Association(CSSA)欢迎您来WPI学习深造! WPI地处美国历史最悠久的马萨诸塞州,不仅人文气息浓厚,而且高科技产业由于众多大学的支撑而非常发达。对于WPI的同学来说,无论理工文商,这里都是学习和工作的理想地点。\n</p>\n<p class="normal">\n	WPI CSSA主要是由来自中国的学生和学者组成的志愿性组织。目前我们已有超过300名成 员,其中包括学生、教授、访问学者及家属等。CSSA的主要任务是为中国学生学者提供一些生活 和学习上的帮助,包括接新生、帮助新生安顿和适应这里的生活、举办中秋晚会、春节晚会等具有中国特色的活动等等。\n</p>\n<p class="normal">\n	这本新生手册主要是为了帮助刚来到美国,来到Worcester的新同学、朋友们尽快地适应这 里的生活、和学习、工作。本手册经过WPI中国学生学者联谊会成员们的共同努力制作而成。这 里,我们向所有参与编写和校正的同学们表示深深的感谢!\n</p>\n<p class="normal">\n	本手册中不足之处恳请大家及时指正,我们会不断地更新和完善。本手册中出现的一些网 上购物地点或者订机票代理等的电话,完全是同学们平时积累的经验所得,不存在任何商业广告 行为。\n</p>\n<p class="normal">\n	我们也真诚地希望能有更多热心的同学、朋友们加入WPI中国学生学者联谊会,互相帮助,共同努力,更好地为这里的中国学生学者们服务!\n</p>\n<p class="normal">\n	最后,祝大家在WPI过得愉快、充实!\n</p>\n<p class="normal">\n	<br />\n</p>\n<p class="normal">\n	CSSA敬上2013年夏\n</p>\n<h1>\n	<span style="color:#E53333;">新生必读</span> \n	<hr />\n</h1>\n<p class="normal">\n	<b>(1) 2013FALL QQ</b><b>群:218715001</b> \n</p>\n<blockquote>\n	<p class="normal">\n		此群为<span style="background-color:#FFE500;">实名制</span>,请同学们把群名片改为:<span style="background-color:#FFE500;">中文姓名/专业/入学年份/籍贯</span>。定时清理人员,请及时更改<b>。</b> \n	</p>\n</blockquote>\n<p class="normal">\n	<b>(2) CSSA Mail List(CSSA</b><b>发布各种校内或校外活动,二手信息发布平台)加入方法:</b> \n</p>\n<blockquote>\n	<p class="normal">\n		请发邮件到:<a href="mailto:zhuang@wpi.edu">zhuang@wpi.edu</a>;\n	</p>\n	<p class="normal">\n		标题写为:加入Mail List;\n	</p>\n	<p class="normal">\n		内容写为:[发件人姓名]和[专业],发件人的[<span style="background-color:#FFE500;">邮箱地址</span>]。\n	</p>\n</blockquote>\n<p class="normal">\n	<b>(3)</b><b>对新生手册的意见与建议:</b> \n</p>\n<blockquote>\n	<p class="normal">\n		请发邮件到:<a href="mailto:slai@wpi.edu">slai@wpi.edu</a>;\n	</p>\n	<p class="normal">\n		标题为:新生手册建议。\n	</p>\n</blockquote>', 0);
INSERT INTO `suvival_guide` VALUES(2, '简介', 0, '<h1>\n	<span style="color:#E53333;">简介\n	<hr />\n	</span> \n</h1>\n<p class="normal">\n	<span style="line-height:1.5;"></span><span style="line-height:1.5;">Chinese Students &amp; Scholars Association (CSSA),即中国学者联谊会:</span> \n</p>\n<p class="normal">\n	Email:<a href="mailto:cssa@wpi.edu">cssa@wpi.edu</a>\n</p>\n<p class="normal">\n	<br />\n</p>\n<p class="normal">\n	Chinese Student Association (CSA),即中国学生会:\n</p>\n<p class="normal">\n	Email:<a href="mailto:csa@wpi.edu">csa@wpi.edu</a>\n</p>\n<p class="normal">\n	<br />\n</p>\n<p class="normal">\n	International House (IH),即WPI的国际学生管理部门:\n</p>\n<p class="normal">\n	Phone: +1-508-831-6030\n</p>\n<p class="normal">\n	Fax: +1-508-831-6032\n</p>\n<p class="normal">\n	Email: ih@wpi.edu\n</p>\n<p class="normal">\n	Webpage:<a href="http://www.wpi.edu/offices/ih/">http://www.wpi.edu/offices/ih/</a> \n</p>', 0);
INSERT INTO `suvival_guide` VALUES(3, '行前准备', 0, '<h1>\n	<span class="Heading1Char" style="color:#E53333;">行前准备</span> \n</h1>\n<h2 id="签证">\n	<hr />\n	1.签证\n</h2>\n<p class="normal">\n	网上的签经有很多,这里就不多说了。附上几个国内比较有名的留学论坛的签证版网址。\n</p>\n<p class="normal">\n	○寄托家园:<a href="http://bbs.gter.net/bbs/forum-61-1.html">http://bbs.gter.net/bbs/forum-61-1.html</a> \n</p>\n<p class="normal">\n	○太傻:<a href="http://bbs.gter.net/bbs/forum-61-1.html">http://bbs.taisha.org/forum-73-1.html</a> \n</p>\n<p class="normal">\n	○CD:<a href="http://bbs.gter.net/bbs/forum-61-1.html">http://www.chasedream.com/list.aspx?cid=7</a> \n</p>\n<p class="normal">\n	关于签证,这里要解释一下。你在美国能够呆多久不是签证官决定的,而是你刚进入美国的机场的入境官决定的。他会根据你的签证和I-20来判断你在美国能呆多久。一般都是D/S。意味这只要你不出美国,你可以一直待到结束学业。从大陆来的同学签证一般都是1年期的,意思是你可以在1年内无限次进出美国。但是如果你在签证过期后出了美国国境,再次回到美国就需要重新签证。(一般即将过期的话最好也重新签,以免出问题;比如签证6、18到期,你打算6月1号的飞机回美国,就最好去重新签一个)International House的回复是一般WPI的学生签证过期又不想回家的,可以去墨西哥或者加拿大去重新签证。为什么不能在美国本土重新签证呢?因为管签证的是美国大使馆。在美国本土怎么可能有美国大使馆呢?(我觉得挺扯淡的。。其他国家都行。。) (如果签证过期之后,只要不出美国是没有问题的。因为签证代表的是你合法进入美国的期限,跟出去没有关系。)\n</p>\n<h2  id="订机票">\n	2.订机票\n</h2>\n<p class="normal">\n	可以找当地的机票代理,但因为是单程会比较贵。买的早可能更便宜,买的迟就贵。当然也看地区,一般从北京,上海,香港可能相对便宜;经停点越多越便宜。定机票后请将航程信息填入CSSA接机表,等统计完成后会放出统计结果,具体链接请见群分享或询问CSSA。\n</p>\n<h2   id="找飞友&订limo">\n	3.找飞友&amp;订limo\n</h2>\n<p class="normal">\n	首先,limo不是加长凯迪拉克,她就是叫limo而已......一般也就是轿车或者van。\n</p>\n<p class="normal">\n	当大家签证办好之后请到新生群里询问一下在同一地区的同学,大家尽量约好一起飞。一是一路上互相有个照应,一起聊个天吃个饭什么的,等待时间长的话还可以轮流睡觉;二来是到伍斯特之后可以大家一起订limo去学校。学长姐们毕竟有限,他们也都有自己的事情要忙。\n</p>\n<p class="normal">\n	订limo的网站:\n</p>\n<p class="normal">\n	○Knight Limo:<a href="http://www.knightlimo.com/">www.knightlimo.com</a> \n</p>\n<p class="normal">\n	○Worcester Limo:<a href="http://www.wlimo.com/">www.wlimo.com</a> \n</p>\n<p class="normal">\n	<br />\n</p>\n<p class="normal">\n	注意,一辆车好像只能指定送到一个地点,这是规定,你可以试着跟司机说好话让他多送几个地点。成功率好像不高,成功的话记得多给小费,不然可能没有下次了。\n</p>\n<p class="normal">\n	订limo流程:订车的时候选择付现金,这样如果司机服务态度不好,比如不帮你提箱子之类的就少给点小费。小费一般10%。\n</p>\n<h2 id="体检和疫苗">\n	4.体检和疫苗\n</h2>\n<p class="normal">\n	大家拿到offer的时候应该也同时看到学校要求要寄体检单子和疫苗注射的单子,如果没有请到此处下载(<a href="http://www.wpi.edu/Admin/Health/forms.html">http://www.wpi.edu/Admin/Health/forms.html</a>)。在国内一般都是去各地的国际旅行卫生保健中心去体检(还有些同学去大医院也行,主要就是让他们填单子盖章)。带着身份证、体检表、2张二寸证件照、小时候的疫苗记录本、1000元人民币(其实用不了这么多)去就好了。\n</p>\n<p class="normal">\n	因为可能要做一个TB皮试,有些地方不是每天可以做,所以去之前大家可以打个电话去问一下一周哪几天可以做TB皮试;不然可能就要多跑一趟。然后,如果疫苗本找不到了也没关系,大不了多扎几针。\n</p>\n<p class="normal">\n	体检和疫苗两个部分哪个先做都可以,完了会给一本黄色的体检证和一本深红疫苗证。这两个如果你去其他国家也会认,因为上面盖着中国国家检疫检验局的大章。虽然学校让把体检表寄回来,其实也可以来了以后再交。期间你的账号会被hold而已,大概就是不能自己在网上注课。学校网站上的四份表都要下载填写。体检要尽早,很多疫苗要打多次,然后其间要隔三四个星期,所以体检越早越好。\n</p>\n<p class="normal">\n	体检表格指南请见附录。\n</p>\n<p class="normal">\n	另外请参考CD(有分地区介绍):<a href="http://www.chasedream.com/list.aspx?cid=36">http://www.chasedream.com/list.aspx?cid=36</a> \n</p>\n<p class="normal">\n	(武汉:<a href="http://parents.tiandaoedu.com/ready/17271.html%20">http://parents.tiandaoedu.com/ready/17271.html</a>)\n</p>\n<h2 id="住房">\n	5.住房\n</h2>\n<p class="normal">\n	(1)临时住房\n</p>\n<p class="normal">\n	a. 想要来之后再看房子的同学可以暂时住在International House一个星期,需要提前申请;租金是20美元/天/人。房子很紧,越早申请越好。\n</p>\n<p class="normal">\n	b. 租不到International House住房的同学,可以找老生帮忙,借住几晚,按天付房租;一般15美元/天/人。这个钱是帮老生付你居住期间的水费电费网费等等。\n</p>\n<p class="normal">\n	<br />\n</p>\n<p class="normal">\n	(2)关于房子\n</p>\n<p class="normal">\n	首先,美国的房子分House和Apartment。House就比较有乡村风情,一幢一幢的房子;整幢租给你的话,可能就是大家公用一楼的厨房客厅,二楼各睡各屋;另一种就是House里两层或三层,每层住3个人,然后厨房客厅卧室都在一层。Apartment就是公寓了,公寓一般比较现代化,房子也会新一点。\n</p>\n<p class="normal">\n	新生可以在来之前就找好房子,如果你想亲自看看这边住房的条件再决定,也可以来了以后再找。 按照所有权,房子大概分为以下两类:\n</p>\n<p class="normal">\n	<b>a. On-Campus</b> \n</p>\n<p class="normal">\n	On-campus的房子是学校的,分部在学校周围比较近的区域。月租500-600美元,包热水包电,(美国这边未加热的水是免费的);有家具(furnished) (一般有twin size的 床,桌子,椅子等)。500美元的是三个人share一层,3个bedroom,一个卫生间,一个厨房,1-2个living room;600美元的是三个人share整个两层的house,一楼是厨房客厅,二楼是bedrooms。\n</p>\n<p class="normal">\n	学校的房子都有洗衣机和烘干机,免费无限量使用。 除了设备齐全、空间 大之外,学校的房子不需要deposit,lease也比较灵活(每个月一签)。如果想搬走,大概 提前1个半月通知管理员就可以。另外,学校还有专门的服务人员负责维修,如果是下水道堵了之类的小事情,一般都是免费的。\n</p>\n<p class="normal">\n	申请学校的房子,请联系Residential Services: Amy Beth Polonsky Phone: +1 508-831-5130;Email: apolonsky@wpi.edu遇到高峰期,可能要排上比较久时间。(运气好的话一般可以排到)注意:申请学校的房子不需要提前找好roommate,都是学校安排。\n</p>\n<p class="normal">\n	<b>b. Off-Campus</b> \n</p>\n<p class="normal">\n	Off-campus的房子一般是owner的,也有个别是中介公司旗下的,有的距离学校很 近,像weststreet,隔条institute road就是学校;有的则比较远,像William street, etc,走路大概需要10几分钟。\n</p>\n<p class="normal">\n	房子一层3-4个bedroom是最普遍的房型,有的房子两层4-5个bedroom,很多把livingroom改造成bedroom。很多时候是整体出租,需要大家租房之前自己找好室友。月租350-600美元不等。房租低的一般不包括任何Utilities,像电和气都得自己付。暖气分三种,烧油的,烧气的和电暖。\n</p>\n<p class="normal">\n	烧油的,油大概570美元150 gallon,可以用一个多月;电暖大约30美元/月/人;气暖暂时不了解。一般烧油和气的不给力还贵。然后,如果是包水电暖的房子,注意问一下房东是不是有限制:比如暖气是不是随便开之类的。\n</p>\n<p class="normal">\n	还有一点就是有的房子是带家具的,价格会高点,便宜的很多基本是没有家具的。 对新生来说,住furnished apartment会方便一点,毕竟第一年来什么都没有,要一样一样家具买起来还是挺累人的。如果找的是Unfurnished apartment,那么来了以后可以买点家具,例如Wal-Mart, Target, IKEA, Home Depot等。 如果想找价廉物美的家具,可以去yard sale看看,会比店里 便宜不少,或者去上面的那个craigslist上去淘,经常能遇见比较便宜的。旧家具还可以去Park Ave的Good Will,和Chandler Street上面的旧家具店买。(如果早点儿来,还可以捡到路边的椅子,桌子之类的家具。床垫沙发之类的不要轻易往家里搬,容易藏匿bad bug)校外的房子,一般都要签一年或者至少9个月的lease,还要交safety deposit,第一个月和最后一 个月的房租,在这里必须要提醒大家的是,一定要考虑清楚以后,才能慎重地签下你的lease。一不经意就可能碰到恶房东,可别小看这房东的作用,一个可怕的房东,会给你带来一年阴沉的心情,最后还可能拿不回押金。Nice的房东会很体贴,例如帮你修东西,整理草坪,放置家具等等。找房子最好自己看个仔细清楚明白。想买车的同学还要看租住的房子有没有停车位置,或者周围 是否适合街边停车。冬天的时候路边有雪,街边停车位比较难找,有个固定车位还是挺方便的。\n</p>\n<p class="normal">\n	房子的位置也要考虑,尽量离学校近一点。第一年没有车,住的远会比较麻烦。下图是我们总结的所谓安全区,供参考。\n</p>\n<p class="normal">\n	<img src="/kindeditor/attached/image/20130821/20130821124622_59100.png" alt="" /> \n</p>\n<p class="normal">\n	一般在学校附近域内的房子综合条件比较理想,无论远近、 安全、安静程度都比较好。总体来说,住房的综合条件由西向东,由北向南逐渐递减。Park Ave以西是一个山坡,也 是可以考虑的。Highland以南的地区,在Dix street和Bowdoin street上现在也有很多中国学 生租住。\n</p>\n<p class="normal">\n	网上在线找房子有两个地方:\n</p>\n<p class="normal">\n	○WPI Apartment Finder System:\n</p>\n<p class="normal">\n	<a href="http://www.wpi.edu/offices/rso/aptfinder.html">http://www.wpi.edu/offices/rso/aptfinder.html</a> \n</p>\n<p class="normal">\n	<br />\n</p>\n<p class="normal">\n	○Craigslist网站Worcester地区WPI附近:\n</p>\n<p class="normal">\n	<a href="http://worcester.craigslist.org/search/apa?query=WPI">http://worcester.craigslist.org/search/apa?query=WPI</a> \n</p>\n<p class="normal">\n	<br />\n</p>\n<p class="normal">\n	前者信息更新较慢,但是集中,都是针对WPI的。后者更新极其迅速,但是未必有很近的房子,而且很多重复的。在使用后面这个叫做craigslist的网站的时候,注意在搜索里打WPI,这样你不至于找到走一天也到不了WPI的房子了。\n</p>\n<p class="normal">\n	总而言之,不能简单比较房租,要比较加上各种因素以后的价钱和综合性能。\n</p>\n<h2 id="行李">\n	6.行李\n</h2>\n<p class="normal">\n	a.限重及规定\n</p>\n<p class="normal">\n	每个航空公司的限重是不同的,所以不在这里一一列出。所有情况可以在航空公司的官方网站找到。之前很多航空公司可以免费托运2个23KG的箱子;好像现在有规定只能带一个箱子了;托运箱子一般是30寸的。由于大家顶的航空公司都不一样,而且是新规定,所以具体要求请同学们自行与航空公司确认。\n</p>\n<p class="normal">\n	绝对不要超重。一般超过1-2KG不算超重。超重的话国内会罚500RMB。不要带任何肉类食品、土壤,植物,种子。真空包装的肉类(如烤鸭,临武鸭,绝味......怎么全都是鸭......)之类通常也会被没收。带太多的话,可能罚款;听说过罚款300美元的,但不确定罚款会不会视情况而定。进入美国的托运行李是不能上锁的,除非是TSA(transit security authority,美国国土安全部下面的一个部门)同意的锁子。这些锁淘宝上有卖,不过建议一点都不锁。由于有开箱检查的可能性,因此这种情况下上了锁可能会被直接撬开。可以用打包带捆好箱子,上面贴上个人信息。贵重物品请务必随身携带,谨防丢失。\n</p>\n<p class="normal">\n	b.书本\n</p>\n<p class="normal">\n	教材可以通过以下链接找到,因为每门课每一届用的书可能不一样,请务必先查证后再买:\n</p>\n<p class="normal">\n	<a href="http://wpi.bncollege.com/webapp/wcs/stores/servlet/TBWizardView?catalogId=10001&storeId=32554&langId=-1">http://wpi.bncollege.com/webapp/wcs/stores/servlet/TBWizardView?catalogId=10001&amp;storeId=32554&amp;langId=-1</a> \n</p>\n<p class="normal">\n	来之前问问这边的师兄师姐需要什么教科书,看看国内是否有影印版。否则这边教材很贵,国内人民币76元的书,这里可以卖122美元。不过如果你的行李超重就算了,还有其他办法省教材费。非要带的话,可以通过海运提前一两个月把一些你觉得很有用的但是又不能托运的书寄过来,让这边的师兄姐们代为接收。也可以在国内的当当网订购直接海运过来,每本书的运费是书价的一半\n</p>\n<p class="normal">\n	常用买书网址:\n</p>\n<p class="normal">\n	○<a href="http://www.bestwebbuys.com/books/index.html">www.bestwebbuys.com/books/index.html</a> \n</p>\n<p class="normal">\n	○<a href="http://www.half.com/">www.half.com</a> \n</p>\n<p class="normal">\n	○<a href="http://www.thecheapestbook.com/">www.thecheapestbook.com</a> \n</p>\n<p class="normal">\n	○<a href="http://www.amazon.com/">www.amazon.com</a> \n</p>\n<p class="normal">\n	○<a href="http://www.weikeg.com.tw/">www.weikeg.com.tw/</a> \n</p>\n<p class="normal">\n	○<a href="http://www.fetchbook.info/">www.fetchbook.info</a> \n</p>\n<p class="normal">\n	○<a href="http://www.dangdang.com.cn/">www.dangdang.com.cn</a> \n</p>\n<p class="normal">\n	○<a href="http://www.docin.com/">www.docin.com</a> \n</p>\n<p class="normal">\n	c.衣物服饰\n</p>\n<p class="normal">\n	如果是夏天过来,T恤要多带一些,因为会换的比较勤快。但是T恤这边卖的很便宜,所以也要酌量携带。这里的夏天相对来说凉快一点,不过也有三十几度高温的日子。另外,需要带一些常用的大衣和外套;这里冬天经常下雪,室内外温差又大,可以买比较长,可以把膝盖都包住的羽绒服,这样在外面走的时候就不会太冷。不过羽绒服也可以在这儿买,价格可以接受,到了第二年打折也非常多,买了屯着很划算。只是可能款式没有很好看。太长的羽绒服男生穿有点奇怪,不太建议。女生或者买比较好的长大衣;这边也比较普遍,国内的样式就是稍微好看一些。总之,原则就是外面要够厚,里面可以少穿一些,到了屋里把外套脱了也不会太热。另外对于女生来说,可以考虑在国内买一些小饰品,比较便宜好看,比如围巾,手套,毛袜什么的。然后就是这边都是人字拖比较多,喜欢传统拖鞋滴同学们可以从国内带过来。最后,衣服鞋子等在过节的时候打折很厉害,可以很便宜的价格买到不错的。例如感恩节,圣诞节和独立日等。总之,不建议带太多的衣物过来。不过这边穿衣服的风格跟国内不一样,喜欢日韩系的同学就多带几件喜欢的吧;喜欢T-shirt,牛仔,欧美风的就随意啦。\n</p>\n<p class="normal">\n	<b>正装:</b>对于男生,带几件好点的衬衫加一套完整的西服西裤领带就好了。女生除了上述西装(西裤可由西装裙代替),还要1-2件中/西式晚礼服。西装人手一套一定要的,参加各种面试没有正装是不会有开始的。有时会有什么晚宴之类的,或者有比较正式的场合,这种时候男生很简单,继续西装就可以了,女生就要穿礼服了。嫌麻烦的也可以来这边再买,美国正装礼服很多的,知名品牌也不会太贵。\n</p>\n<p class="normal">\n	Business casual:指的是衬衫或者polo式样的有领tshirt+高尔夫球裤。\n</p>\n<p class="normal">\n	Business attire:指的是一整套西装,但是有时候也可以衬衫+西裤。\n</p>\n<p class="normal">\n	<b>泳装</b>:喜欢游泳的人可以买了带过来,国内式样花纹都漂亮很多,我指的是女式。<b>男式的要买肥大,裤腿长一点的,紧身的那种老美会觉得你怪怪的。</b>游泳眼镜最好也从国内带,特别是需要近视的那种的。\n</p>\n<p class="normal">\n	d.居家用品\n</p>\n<p class="normal">\n	对于某些对被子要求比较高的,可以带上一条国内高档被褥,比如蚕丝被,鸭绒被,确实不用太厚,室内都挺暖和的。倒是这边的被子又贵又很普通。还有这边的被单也是非 常丑,质量平平,价格昂贵,喜欢漂亮的同学建议自己从国内带过来。另外可以带一些对你个人意义比较大的东西,比如男女朋友照片,各类定情信物,父母照片等等。\n</p>\n<p class="normal">\n	Worcester有半年是冬天,所以保暖很重要。不过北方的同学应该知道,北方的冬天虽然冷,但是暖气一开,屋 子里还是很暖和的。同样, Worcester的冬天虽然有时会达到零下二十度的低温,但在房 间里还是够暖和的。除非你不幸地碰到了一个吝啬的房东,而你们家暖气的控制开关又掌 握在房东手里。非常怕冷的同学 可以带一个电热毯过来。(电热毯美国也有卖,不知道好不好用,叫heated pad。打算住在学校公寓的就不用 担心了,暖气都很足的。\n</p>\n<p class="normal">\n	衣架、洗发水、各种护肤品啊,在美国都是很便宜的;但这边配眼镜很贵,所 以最好在国内配个两副带过来。 最好再带些常用感冒药,止痛药(牙疼,智齿),退烧药,消炎药,抗生素,胃药等,自己吃习惯了的药。女生的卫生用品这边都有卖,只是样式不多;月经止疼药也可以带一点,红糖这边买得到。\n</p>\n<p class="normal">\n	e.电子产品\n</p>\n<p class="normal">\n	1)笔记本电脑:\n</p>\n<p class="normal">\n	个人建议是,如果还没买的话就来美国买。这种电子产品美国的价格 一般会比国内便宜很多。如果自己已经有了笔记本,配置又还可以的话可以带过来,毕竟刚来的时候家里没有电脑可以上网,还是会有不少不方便的地方。\n</p>\n<p class="normal">\n	2)手机:\n</p>\n<p class="normal">\n	国内的手机也可以带过来,来之前确认一下你的那款手机可不可以在美国用。来这边新版一个手机也不贵,美国电话公司一般可以签两年合同免费拿手机。相对于这边的消费水平,这里手机话费是比较便宜的。很多人用包月服务随便打电话;短信偏贵,包月也不如国内划算。办了手机以后可以买国际电话卡,从美国达到中国一两美分一分钟;比如一种叫ecallchina的卡(www.ecallchina.com), 20刀能打1200分钟。\n</p>\n<p class="normal">\n	3)相机,优盘和移动硬盘\n</p>\n<p class="normal">\n	:一般都是来了这边再买。网上有便宜的Deal,例如<a href="http://www.dealsea.com/">www.dealsea.com</a>。国内有了就自己带过来吧。(小提示,买了Mac PRO的同学们,苹果的移动硬盘和Windows不兼容,需要装一个APP,不需要重新买一个Apple的移动硬盘。)\n</p>\n<p class="normal">\n	<br />\n</p>\n<p class="normal">\n	f.家用电器\n</p>\n<p class="normal">\n	只要是电器,大部分都不用带,包括插座,一是电压和频率不一样,上面提到的电热毯,因为是电阻丝发热。倒是影响不太大,功率低点而已。 二是只要你想得到的,在国内看到过的,这边基本都有,而且都很便宜!例如男生的刮胡刀,甚至包括女生用的卷头发器和直发器......满店都是。特别的,就是有人带国内的豆浆机过来,这个记得要和厂家说好换成美式的电插头。不过现在豆浆机这边也有卖。变压器记得带一个,如果是带自己在中国买的电脑来,一般需要变压器。\n</p>\n<p class="normal">\n	g.厨房用品\n</p>\n<p class="normal">\n	1)锅:\n</p>\n<p class="normal">\n	基本有都有,就是换成RMB贵点。高压锅是个累赘不用带,这边在Wal-Mart和亚马逊可以买得到,比较便宜。还要根据住处的炉子情况来决定用什么锅,比如电炉子,用平底锅比较好。美国的火都不是很旺。这边煮牛肉要去血水,肉很难煮软。有了高压锅就 方便很多了,红烧肉20分钟柔软无比。还可以压土豆泥~凹形铁锅这边的没有国内的好,不怕麻烦的可以带一只不粘锅过来。但其实这边也有卖。电饭锅,千万不用带,这边又便宜又好用,网购店购皆可。\n</p>\n<p class="normal">\n	2)菜刀:\n</p>\n<p class="normal">\n	好的大菜刀和砍 骨头的刀可以带。这边很少卖宽刀的,有也不好用。买把好的过来。案板不用带。带个两三块钱的小磨刀石,可能有用。\n</p>\n<p class="normal">\n	3)餐具:\n</p>\n<p class="normal">\n	如果对碗有偏好,可以带一两只自己很喜欢的碗过来。还有筷子,可以带几根。没有要求的话,中国/亚洲超市一般也都买得到。\n</p>\n<p class="normal">\n	4)友情提示:\n</p>\n<p class="normal">\n	压蒜器,刨皮刀这种小东西可以考虑带一个好用的。这边有卖就是不太好用。\n</p>\n<p class="normal">\n	5)调料:\n</p>\n<p class="normal">\n	这边中国店调料还是很全的,基本应有尽有不用自带调料。\n</p>\n<p class="normal">\n	h.护肤用品\n</p>\n<p class="normal">\n	关于平时的生活用品卫生用品,比如,洗发水、沐浴露之类的就别带了,这里超市里 卖得很便宜。喜欢护肤品的,那你来到美国就来对地方了,就算没有sale的时候,价格也 比国内便宜很多,所以你的瓶瓶罐罐甚至都不用带了。这边只是亚洲牌子的比较少,不过 也可以网购。而如果你喜欢的是欧洲的牌子,比如Clarins啊Nuxe之类的,美国价格和国 内差不多,但是如果你喜欢Clinique, EsteeLauder或者Lancome等的话,那你完全可以把 现在用的东西送人了,一身轻松地来到美国开始新的shopping历程吧,这边真是既便宜小 样又多。\n</p>\n<p class="normal">\n	i.文具\n</p>\n<p class="normal">\n	美国人用黑色圆珠笔和铅笔的比较多,习惯用水性笔的同学可以自己带几只;带自动铅笔的记得多带几盒笔芯。美国人习惯用大本子,A4纸那么大的,喜欢小本子的同学也请自备。然后,剪刀,美工刀,尺子等等都是有的,只是不漂亮,价格比起国内稍微贵一点点。文具这些其实用的不多,现在基本都电子化了,所以按自己喜欢带吧。\n</p>\n<p class="normal">\n	j.小礼品\n</p>\n<p class="normal">\n	可以带一点中国结之类由中国特色的小礼物,可以送给喜欢的朋友和老师。7.手机/电话卡国内手机卡有两种选择,一是停机,二是开国际漫游。建议至少开一个月的国际漫游,这样到了美国之后方便与接机的人联络,也便于给家人报平安。彻底停掉手机的同学可以先买Prepaid电话卡(淘宝上有卖),过来之后可以用别人的手机或者公用电话联络.\n</p>', 0);
INSERT INTO `suvival_guide` VALUES(4, '签证', 3, '', 0);
INSERT INTO `suvival_guide` VALUES(5, '订机票', 3, '', 0);
INSERT INTO `suvival_guide` VALUES(6, '找飞友&订limo', 3, '', 0);
INSERT INTO `suvival_guide` VALUES(7, '体检和疫苗', 3, '', 0);
INSERT INTO `suvival_guide` VALUES(8, '住房', 3, '', 0);
INSERT INTO `suvival_guide` VALUES(9, '行李', 3, '', 0);
INSERT INTO `suvival_guide` VALUES(10, '从中国到美国', 0, '<h1>\n	<span style="color:#E53333;">从中国到美国</span>\n</h1>\n<h2 id="登机前准备">\n	<hr />\n	1.登机前准备\n</h2>\n<p class="normal">\n	确保护照,i-20,钱,手机(联络工具)务必带好,其他关系不大。\n</p>\n<h2 id="飞行及过境">\n	2.飞行及过境\n</h2>\n<p class="normal">\n	从起飞机场开始,流程是这样的:\n</p>\n<p class="normal">\n	a.国内机场换票托运登机\n</p>\n<p class="normal">\n	b.在飞行途中填i-94\n</p>\n<p class="normal">\n	c.到美国后第一个降落点下飞机,过海关交i-94;取行李,行李抽查,交行李\n</p>\n<p class="normal">\n	d.到达或继续飞往目的地\n</p>\n<p class="normal">\n	在飞机上面空姐会分发进入美国移民局的I-94表格(十分重要)和美国海关的申报表格。如果大家有什么不会填,也可以找空姐MM们帮忙。对于美国公民、持美国绿卡的居民和美国护照的居民,可以不用填写I-94表格。按照美国规定,任何人通过飞机进入美国境内,其第一个降落点就是入境处。比如,从北京飞西雅图再转机到波士顿,西雅图就是入境口岸。下了飞机便是美国移民局(好像还有国土安全局)的检查点,就是边防。在这里他们会对你的I-94、护照、签证、I-20(对学生)进行检查。在排队的时候,会有一个人来检查你的文件,看东西填好没,还要填什 么。这个地方的人很多,如果你搭乘下一班航班的时间很紧,你可以跟前面的人说,然后 先走。过边检的时候,移民局的人会问你一些问题,比如说你叫什么?来美国干什么?去哪个学校?专业是什么?为什么学这个专业?之类的问题。有点类似于签证的时候签证官的 问题。因为这个不是签证,基本不会影响你入境。所以不需要回答的特别详细,大概一两 句就好了。只要你不是在移民局的黑名单或者不受欢迎的人名单里面的人,大概10-15分 钟就可以过去。然后是照相,按手印。在护照、签证、I-20、I-94上面盖章。然后会把I-94用订书机订在护照上面。I-94很重要,因为你出境要上缴I-94。而且上面也明确写着,如果 你丢失了I-94,会对你下次进入美国造成一定的麻烦。还有,要注意在你的护照还有I20上写的留美时间是不是D/S。\n</p>\n<p class="normal">\n	<br />\n</p>\n<p class="normal">\n	下面就是提行李了。无论你是否转机,都要自己带着行李过海关。在海关的时候,和 国内一样,有两条通道。绿色的无申报通道和红色的申报通道。只要你说没有食物(主要是不要有肉)、土壤、植物,就有40%的几率不被打开行李。但是如果你说你没有以上东西在行李里面,却碰到了那60%的几率被要求打开行李,被发现了是要罚款的。\n</p>\n<p class="normal">\n	出来海关,就有专门的工 作人员负责转运行李。交了行李就轻松了。然后进入转机大厅,要安检这里。脱鞋、脱皮带、从电脑包/书包拿出电脑(电脑要单独放一个小篮)。如果时间很急,可以跟保安说,然后走优 先通道。\n</p>\n<p class="normal">\n	如果你带的现金或者汇票(银行卡不算)价值超过1W美金,需要在海关填个表,然后就能过。希望大家在填写报关单的时候尽量实事求是,不懂可以问。美国的法制比国内健全,如果发现瞒报或者漏报,查出来会很麻烦的。\n</p>\n<p class="normal">\n	TIPs:随身带1-2支笔一路填表会方便很多。护照和I-20一定要放在容易拿出来的地方以便于入关检查。推荐立式的行李箱,这样可以一手拉两个另一手拉随身行李。到达波士顿以后手推车是收费的(小的5 USD,大的10 USD,最好身上备有零钱),只有在入境过海关的时候手推车免费。\n</p>\n<p class="normal">\n	出来海关,就有专门的工作人员负责转运行李。交了行李就轻松了。然后进入转机大厅,要安检这里。脱鞋、脱皮 带、打开电脑(只是打开翻开,不用开电源)。如果时间很急,可以跟保安说,然后走优 先通道。\n</p>\n<p class="normal">\n	然后就是转航班了。如果在加拿大转机,不在机场过夜不需要办理过境签证,不需要自己拿行李转机。建议大家都带上航程票,以免出现意外。如果你误机了,航空公司会为你免费安排一架新航班。(这个貌似是在买机票的时候要买误机保险的)不要着急。如果出现紧急情况当场无法处理,请与中国学生会联系。\n</p>\n<p class="normal">\n	祝大家飞行顺利!\n</p>\n<h2 id="中转站">\n	3.中转站\n</h2>\n<p class="normal">\n	由于大家机票中转站遍布各地,大家出发之前可以稍微查一下各个机场的地图,方便自己转机。这里列几个大的国际机场:\n</p>\n<p class="normal">\n	a. Chicago O’Hare International Airport\n</p>\n<p class="normal">\n	<a href="http://www.ohare.com/PassengerInformation/AirportMaps.aspx">http://www.ohare.com/PassengerInformation/AirportMaps.aspx</a> \n</p>\n<p class="normal">\n	b. Los Angeles World Airports (LAX)\n</p>\n<p class="normal">\n	<a href="http://www.lawa.org/welcome_lax.aspx?id=256">http://www.lawa.org/welcome_lax.aspx?id=256</a> \n</p>\n<p class="normal">\n	c. San Francisco International Airport\n</p>\n<p class="normal">\n	<a href="http://www.flysfo.com/web/page/atsfo/airport-maps/#">http://www.flysfo.com/web/page/atsfo/airport-maps/#</a> \n</p>\n<p class="normal">\n	d. Boston Logan International Airport\n</p>\n<p class="normal">\n	<a href="http://www.massport.com/logan-airport/Pages/LoganAirportMaps.aspx">http://www.massport.com/logan-airport/Pages/LoganAirportMaps.aspx</a> \n</p>\n<p class="normal">\n	e. New York John F. Kennedy International Airport\n</p>\n<p class="normal">\n	<a href="http://www.panynj.gov/airports/jfk-airport-map.html">http://www.panynj.gov/airports/jfk-airport-map.html</a> \n</p>\n<h2 id="到达">\n	4.到达\n</h2>\n<p class="normal">\n	订了limo的联系limo,或到指定地方等待;订了学长姐接送的联系学长姐,或到指定地方等待。突发情况请联系CSSA。\n</p>\n<p class="normal">\n	如果是到波士顿Logan机场的同学可以打开无线,上网联系家人朋友。Logan机场的无线是免费的;一般美国机场没有免费无线。\n</p>', 0);
INSERT INTO `suvival_guide` VALUES(11, '登机前准备', 10, '', 0);
INSERT INTO `suvival_guide` VALUES(12, '飞行及过境', 10, '', 0);
INSERT INTO `suvival_guide` VALUES(13, '中转站', 10, '', 0);
INSERT INTO `suvival_guide` VALUES(14, '到达', 10, '', 0);
INSERT INTO `suvival_guide` VALUES(15, '开学前', 0, '<h1>\n	<span style="color:#E53333;">开学前</span> \n</h1>\n<h2 id="注册&amp;选课">\n	<hr />\n	1.注册&amp;选课\n</h2>\n<p class="normal">\n	○新生的I-20或者DS2019表格上会有明确的开学日期。 到WPI后请务必尽快到International House的Janice处报道,见Tom。\n</p>\n<p class="normal">\n	○去Health Center交体检表,工作人员会检查一下你填的表,她说ok你就可以走了;或者她会告诉你等邮件通知,也许需要补充资料。\n</p>\n<p class="normal">\n	○去East Hall一楼ID Office办ID。去之前可以洗漱打扮一下,美国都是当场拍照制卡的。所以想要ID照片美丽帅气,请打扮一下。\n</p>\n<p class="normal">\n	○去图书馆Help Desk(二楼进门右侧)注册电脑,否则你的电脑将无法连接学校无线网络。\n</p>\n<p class="normal">\n	○开通WPI邮箱:\n</p>\n<p class="normal">\n	<a href="http://www.wpi.edu/Academics/CCC/Help/Audiences/incomingstudents.html">http://www.wpi.edu/Academics/CCC/Help/Audiences/incomingstudents.html</a> \n</p>\n<p class="normal">\n	○去自己系里报道,跟项目主管报个到,拿一张Degree/Study Plan,上面有学校官方推荐的选课目录。你可以根据自己的想法选课,但正式注课之前记得和项目主管或者到时讨论一下,咨询一下意见。\n</p>\n<p class="normal">\n	○注课有两种方式,去Registrar填表;网上注册。有些课程还必须亲自到学校的Registry (在Denials Hall)手动选,例如PhD的research学分。其他研究生课程网上注册就好,注册Banner地址:<br />\n<a href="https://banner-as4.admin.wpi.edu/pls/prod/twbkwbis.P_WWWLogin">https://banner-as4.admin.wpi.edu/pls/prod/twbkwbis.P_WWWLogin</a> \n</p>\n<p class="normal">\n	另外,如果有些课程已经选满,需要直接联系教授,请他亲自把你加到他的课程里。<span style="line-height:18px;">这个每个系的热门课不一样,可以先咨询一下到时或者老生们。</span> \n</p>\n<h2 id="ESL(English as Second Language)">\n	2. ESL (English as Second Language)\n</h2>\n<p class="normal">\n	ESL好像不是每个院系都要上的,大家可以咨询一下老生。一般考试应该会在录取通知书上写。\n</p>\n<p class="normal">\n	需要参加语言测试,特别是有GA,TA工作的同学。去International House报道的时候,Janice会让你登记什么时候考试;记得准时去考试。\n</p>\n<h2 id="保险&amp;SSN">\n	3.保险&amp;SSN\n</h2>\n<p class="normal">\n	A.保险\n</p>\n<p class="normal">\n	保险有两种:(1)学校统一办的保险;(2)纽约大使馆旗下的保险。\n</p>\n<p class="normal">\n	学校的保险好处在于出问题之后兑付有保障,速度比较快;不过比较贵。2011年秋季大约是1,100美元一年。大使馆的保险就比较便宜一点;不过可能因为中间隔着一个大使馆,程序上多一\n</p>\n<p class="normal">\n	步对付速度就慢一点。大使馆的保险因为是近两年才出现的,所以暂时不确定到底他与学校保险\n</p>\n<p class="normal">\n	的区别。我们在此也只是提供两种选择,请同学们自己斟酌购买。\n</p>\n<p class="normal">\n	B. SSN\n</p>\n<p class="normal">\n	凡是有GA,TA的同学都需要办SSN。刚开学的时候International House开一个SSN介绍会,教你怎么填申请表。之后需要你自己去SSA楼(Main Street附近)办理。\n</p>\n<h2 id="银行开户">\n	4.银行开户\n</h2>\n<p class="normal">\n	Worcester这边主要的储蓄银行有Bank of America, Citi Bank, TD bank north, Sovereign Bank,Chase Bank等。储蓄利息稍有差别,不过由于金融危机,存款利率现在几乎为零。美国的银行一般分为全国性银行(如Bank of America,Citi Bank和chase bank)和地方性银行(TD bank north,Sovereign Bank等)。TD bank north,Sovereign Bank主要服务于美国东北部,办理他们的帐户和debit card一般只能在东北部使用。\n</p>\n<p class="normal">\n	新生一般都去Park Ave上那家Bank of America开户(255 Park Ave, Worcester, MA),办借记卡(Debit Card,暂时也只能办借记卡);带着I-20,护照,学生ID就可以了。进去找客户经理办理,一人在一个小单间里的;Assistant manager相当热情,会给你把业务介绍个遍。然后BOA的卡你可以选择要不要把自己的照片放在借记卡上。填写收卡地址的时候如果还没有找到房子的同学,可以填学长学姐的地址,留好联系方式。\n</p>\n<p class="normal">\n	BOA不收服务费有两种选择,一是永远保证savings account里面有300刀;第二种就是每个月在你指定的那一天从Checking Account转25美元刀Savings Account(你可以选择自动转,比较省心)。没满足这两点之一的话,服务费好像是6美元一个月;你下个月又满足条件了,服务费也不会收了。\n</p>\n<p class="normal">\n	然后就是借记卡不要透支,透支一次扣至少35美元服务费。\n</p>\n<p class="normal">\n	办卡整个过程非常轻松愉悦,就是时间有点长;过程中你只要输入密码和签名就可以了,申请材料什么的你就让他们填写。当没收到卡之前她会提供一个Temporary card,记住这个卡一样要个带VISA功能的,这样就不用每次都输入密码而是签名了(可以用中文签名,一样没问题)。祝大家办卡办得开心。\n</p>\n<p class="normal">\n	刚刚办好的借记卡一般由eBanking Checking Account和Regular Saving Account组成,这是两种最初级的BOA账户.存款超过2000刀的还可以要求升级为Enhanced Checking Account,可以向银行免费要支票,方便付房租和学费.超过2500刀可以升级为Money Market Saving Account,每个月可以免费转账提款6次.\n</p>\n<h2 id="汇款&amp;工资">\n	5.汇款&amp;工资\n</h2>\n<p class="normal">\n	A.汇款\n</p>\n<p class="normal">\n	开好银行账户之后就可以汇款交学费了。首先,你需要提供给家人的信息有(以上面说的\n</p>\n<p class="normal">\n	BOA, Park Ave为例):\n</p>\n<p class="normal">\n	○银行名:Park View, Bank of America\n</p>\n<p class="normal">\n	○开户地:255 Park Avenue, Worcester, MA, 01609\n</p>\n<p class="normal">\n	○户主:San Zhang (张三)\n</p>\n<p class="normal">\n	○账号:1234 5678 9012(你的Checking或Savings的16位账号)\n</p>\n<p class="normal">\n	○户主地址:900 West St, Worcester, MA 01609(你开户时的地址)\n</p>\n<p class="normal">\n	○ Routing number: 123 456 789(这个问银行要)\n</p>\n<p class="normal">\n	○ Swift Code:xxxxxxxx (问银行要)\n</p>\n<p class="normal">\n	<br />\n</p>\n<p class="normal">\n	交学费的时候这样交就可以了。今年学校信息有所更新,请提交表单的时候拿着学校网站上的汇款帮助信息向银行确认。(注意,表单上的学校地址也不正确,要以学校网站上的信息为准)学校网站可以提供电子支票的支付方式,当你来到美国,办理了借记卡后,可以通过美国银行的电子支票进行支付,也可以买银行的纸质支票进行支付。钱可以自己带一部分,然后从国内汇款到你在美国的银行账户里,也可以在国内银行开好汇票,带过来给银行,一般当天会到账一小部分,剩下的部分5个工作日左右到账,好处就是万一汇票丢失的话可以挂失。\n</p>\n<p class="normal">\n	<br />\n</p>\n<p class="normal">\n	据我们所知,可以办建设银行的龙卡,好像是无年费的。中国建设银行是和美国银行(Bank ofAmerica)有友好关系的,于是建行用户如果向BOA电汇(wireless transfer)是免手续费的。这种方法需要你先有美国BOA的账户,因此此法可能不适用于第一次交学费。请不要小看手续费。两头都扣个百分之几是会造成很大的损失的。这种汇款之迅速, 1天之内就可以收到。缺点就是每天汇不能大于2000美元,所以可以分几天汇,然后写一张支票交到Accounting Office,或者网上填写电子支票就可以教学费了。除此之外,建行龙卡在BOA的提款机提款500美金一下是无手续费的,必要时可以应急。据说成都建行没有汇款服务,但是有龙卡提款政策。所以各地同学请务必咨询当地建行政策。如果没有免收手续费政策,请不要在建设银行汇款而在中国 银行。因为中国银行的汇率通常比建行低$0.005-0.006。\n</p>\n<p class="normal">\n	各大城市建行都有这个服务,问一下建行网点就行了,也不必要非得龙卡,具体是每个月每个BOA账号可汇4,000美元,每笔上限2,000美元,如果用钱多的可以让家长一人开一个建行再拿自己身份证开个一共三个账号,12,000美元怎么都够用了。\n</p>\n<p class="normal">\n	为了保险,各位同学请亲自打电话或者去建行分行核实以上信息!!!\n</p>\n<p class="normal">\n	B.工资\n</p>\n<p class="normal">\n	有Graduate Assistant, Teaching Assistant的同学,带上I-20,学生ID,SSN,和银行账号去\n</p>\n<p class="normal">\n	Human Resource(Boynton Hall二楼)填表,建立工资账户。记得添一张Direct Deposit的单子,这样以后学校发的工资就可以之家打到你的银行账户里了。\n</p>\n<h2 id="手机入网及电话">\n	6.手机入网及电话\n</h2>\n<p class="normal">\n	千里传佳音,打电话是必不可少的。美国有AT&amp;T, Verizon, T-Mobile, Sprint等几家大的 电信运营商。具体资费少有不同。对于酷爱旅游的同学们来说,外出游玩时一个可以上网的手机是十分必要的,以上几大运营商都提供可以上网的手机和plan,可以自行选择。\n</p>\n<p class="normal">\n	选好了公司下一步是选择plan。新来的同学通常没有SSN和信用记录,如果新开一个 帐户的话,要交比较高的deposit,大概每个人500美元。不过开手机帐户可以增加信用记录,这是一个好处。如果为了省钱,那么最好的办法就是加入老生的Family Plan。Family Plan的意思是,老生作为户主拥有账户,然后多申请一个号码给新生。Family Plan的费用大概是20-30美元/人(用智能手机的话大概40-50美元/人);新开账户的话要40-50美元/人。不过具体也要看你办的Family Plan里面人越多约便宜。\n</p>\n<p class="normal">\n	办好了手机就可以享受美国无比自由的通信了。美国没有漫游,所以在全国各地打电 话是一样的。 另外,大部分手机的plan,在晚上9点以后到第二天早上6点之前是免费的,周 六周日也是免费。所以用手机,可以在晚间和周末跟美国其他地方的朋友煲电话粥,联络感 情。\n</p>\n<p class="normal">\n	要打电话到国内的话,一般都是买电话卡,在<a href="http://www.firstphonecard.com/">www.firstphonecard.com</a>,<a href="http://www.ecallchina.com/">www.ecallchina.com</a>,<a href="http://abcalling.com/">http://abcalling.com</a>,<a href="http://www.88card.com/">www.88card.com</a>,<a href="http://www.loudclear.com/">www.loudclear.com</a>上都可以 买到。也可以到Worcester城区的一个中国超市—family 88(Clark U附近)店(877 Main St, Worcester, MA - (508) 753-9988)去买一种俗称“小红卡”的电话卡,用该卡向国内打电 话,一分钟1cent,相当便宜。联系国内最常用的还是QQ,Skype视频;相比起来Skype会更流畅一些。\n</p>\n<h2 id="信用卡">\n	7.信用卡\n</h2>\n<p class="normal">\n	美国的消费基本是用信用卡结算的,先刷卡,再还款。这样做的好处有几点:\n</p>\n<p class="normal">\n	A.安全。因为你并没有把钱存在信用卡里,所以一旦有人盗用,你可以通知银行,waive掉 不属于你的花费。如果借记卡被盗用,就会损失很大了。\n</p>\n<p class="normal">\n	B.信用卡通常有很多种优惠措施,有的会有折扣,比如有些学生信用卡开始六个月有5%的折扣,cash back,还有的可以积分换东西等等。\n</p>\n<p class="normal">\n	C.积攒信用值,方便自己以后在美国贷款买东西(笔记本电脑,车,房子等)。\n</p>\n<p class="normal">\n	当然信用卡也有问题,就是不容易控制自己的购买欲望。因为刷卡和支付现金的感觉 很不一样,\n</p>\n<p class="normal">\n	通常有了高额度的信用卡之后,花钱的速度会变快很多。\n</p>\n<p class="normal">\n	言归正传,美国的信用卡种类实在太多,很难总结出最适合的一种,通常每个人有两 三张卡,一张有购物优惠,一张有加油或者吃饭优惠(一般会有1%-5%的cash back)等 等。大多数好的信用卡要等到有SSN之后,甚至要积累一定信用记录之后才可以申请的到。\n</p>\n<p class="normal">\n	刚拿到SSN的同学可以去申请Bank of America的学生信用卡,在Park Ave上的那家支行就可以办理,这张信用卡申请的门槛比较低,限额不高。\n</p>\n<p class="normal">\n	当自己的信用值逐渐积累起来后,可以申请一些比较好的信用卡,比如American Express的Bluecash,Discover的More card等,这些信用卡除了cash back外,一般还有 一些其他服务,比如说垫付航空保险,部分租车保险或者积分赠送机票等\n</p>\n<p class="normal">\n	但是要注意的是American Express和Discover的卡好多地方不收,所以申请一张master或者visa卡是很有必要的。\n</p>\n<p class="normal">\n	美国的金融体系十分发达,有很多理财的技巧,比如申请不同的信用卡组合使用。我 推荐MITBBS的Money板,里面有不少有用的信息,<a href="http://www.mitbbs.com/bbsdoc/Money.html">http://www.mitbbs.com/bbsdoc/Money.html</a> \n</p>', 0);
INSERT INTO `suvival_guide` VALUES(16, '注册&选课', 15, '', 0);
INSERT INTO `suvival_guide` VALUES(17, 'ESL(English as Second Language)', 15, '', 0);
INSERT INTO `suvival_guide` VALUES(18, '保险&SSN', 15, '', 0);
INSERT INTO `suvival_guide` VALUES(19, '银行开户', 15, '', 0);
INSERT INTO `suvival_guide` VALUES(20, '汇款&工资', 15, '', 0);
INSERT INTO `suvival_guide` VALUES(21, '手机入网及电话', 15, '', 0);
INSERT INTO `suvival_guide` VALUES(22, '信用卡', 15, '', 0);
INSERT INTO `suvival_guide` VALUES(23, '生活', 0, '<h1>\n	<span style="color:#E53333;">生活</span> \n</h1>\n<h2 id="学校设施">\n	<hr />\n	1.学校设施\n</h2>\n<p class="normal">\n	a) SNAP\n</p>\n<p class="normal">\n	SNAP全称Security Night Assistance Patrol,是由学生驾驶学校汽车,在晚间提供住处 和学校之间通行的免费服务。简单的说,就是免费出租车。这项服务可以提供学校范围内1英里内任意住宅区和学校的接送服务。通常不提供包含商业地点(比如餐厅超市商场)的接送。除了1英里内的住宅区和学校内,还可以从Union Station接你回来,也可以送你 去那里。他们的工作时间是,冬季16点到凌晨4点,夏季18点到凌晨6点,具体时间会 可能有所变化,学校放假期间基本不工作。具体安排注意查收邮件,WPI邮箱。\n</p>\n<p class="normal">\n	在校园内的紧急电话终端、校内分机上拨打6111或者用手机拨打508-831-6111,可以联通他们的“总台”。通常你会听到:”SNAP, your call has been recorded.”这时候你可以 说”Hi, I need a ride from Union Station to Founder’s Hall”\n</p>\n<p class="normal">\n	b)餐厅\n</p>\n<p class="normal">\n	研究生一般会在campus center解决:二楼有Dunkin’ Donuts,主要吃甜甜圈,咖啡饮料;一楼有一些自助的西式餐饮。本科生餐厅在Morgan Hall,也是吃自助大约10刀一个人。最后Founder’s Hall有一个学校的Pub,提供美式dishes.\n</p>\n<p class="normal">\n	c)体育健身\n</p>\n<p class="normal">\n	学校体育设施开放时间:\n</p>\n<p class="normal">\n	<a href="http://wpi.prestosports.com/navbar_white/facilities/11_12_Facility_Hours_C_and_D_Terms.pdf">http://wpi.prestosports.com/navbar_white/facilities/11_12_Facility_Hours_C_and_D_Terms.pdf</a> \n</p>\n<p class="normal">\n	学校体育馆有时会有校队练习以及各个社团的预约,比如校篮球队预约了场地的话,我们是不能在那个时间段打篮球的。CSSA每学期会预约Harrington Court,届时会以群邮件形式通知大家。\n</p>\n<p class="normal">\n	学校体育设施预约查询:\n</p>\n<p class="normal">\n	<a href="http://wpi.prestosports.com/navbar_white/facilities/index%20">http://wpi.prestosports.com/navbar_white/facilities/index</a> \n</p>\n<p class="normal">\n	<i>To view the scheduled events</i>底下的四个选项就是各个场馆的具体预约信息。\n</p>\n<p class="normal">\n	<br />\n</p>\n<p class="normal">\n	Harrington Auditorium内有:\n</p>\n<p class="normal">\n	○乒乓球台四个(篮球场的一侧,移动看台后面)\n</p>\n<p class="normal">\n	○羽毛球场四个(在篮球场两侧,羽毛球网在移动看台后面,得自己搬运和架设)○壁球馆一个(从篮球馆侧面可以下去)\n</p>\n<p class="normal">\n	○健身房在Alumni Gym下面,半地下然门口写着请出示id,其实没人管。你要是真给他秀一下学生ID,那小孩还会特受宠若惊。 气氛跟国内健身房差不多 。\n</p>\n<p class="normal">\n	常用句式:\n</p>\n<p class="normal">\n	Could you spot me?给我保护一下?\n</p>\n<p class="normal">\n	Are you still using this?\n</p>\n<p class="normal">\n	I have one last set.我还有一组?\n</p>\n<p class="normal">\n	○游泳池在健身房对面,也可以从更衣室进。更衣室在健身房楼上对面。游泳池只有四道,长度60英尺 。游泳池旁边的有用板,脚蹼等都可以随便用。\n</p>\n<p class="normal">\n	○网球场 。Salisbury St北面有一块,三片场子,地裂网塌。Park Ave西面,就是学校体育场的对面再往右一点有一块,六片场,地平网挺,而且这块场子是属于WPI,门口写着WPI学生教师优先 。网<span style="line-height:1.5;">球场有小半年都不开,因为下雪 。A/D term下午会有WPI网球课占用场地</span> \n</p>\n<p class="normal">\n	○保龄球馆Gompei''s Gutters。在体育馆背面,朝着Campus Center,一个小门。好像可以要免费券更衣室和浴室 。更衣室的衣橱(locker)可以申请,要一个密码锁(Combination Lock)。申请的地方就在更衣室的Harrington Auditorium那面的出口附近,不太好找。研究生申请得等一阵子才有消息。 浴室有冷热水,有浴液。(最好自己带浴液,这里的浴液不太好用)\n</p>\n<p class="normal">\n	d)学生社团\n</p>\n<p class="normal">\n	<a href="http://www.wpi.edu/campuslife/clubs.html">http://www.wpi.edu/campuslife/clubs.html</a> \n</p>\n<p class="normal">\n	e)学生活动\n</p>\n<p class="normal">\n	○ Student Government Association (SGA)活动表:\n</p>\n<p class="normal">\n	<a href="https://scheduling.wpi.edu/wv3/wv3_servlet/urd/run/wv_event.DayList?evdt=20130509,evfilter=%0d%0a737296,ebdviewmode=list">https://scheduling.wpi.edu/wv3/wv3_servlet/urd/run/wv_event.DayList?evdt=20130509,evfilter=</a> \n</p>\n<p class="normal">\n	<a href="https://scheduling.wpi.edu/wv3/wv3_servlet/urd/run/wv_event.DayList?evdt=20130509,evfilter=%0d%0a737296,ebdviewmode=list">737296,ebdviewmode=list</a> \n</p>\n<p class="normal">\n	○ Graduate Student Government (GSG)活动表:\n</p>\n<p class="normal">\n	<a href="https://orgsync.com/43823/events">https://orgsync.com/43823/events</a> \n</p>\n<p class="normal">\n	f)关于WPI邮箱\n</p>\n<p class="normal">\n	美国的习惯是用电子邮件联络,所以大家要养成查看自己邮箱的习惯。老师的通知,学校的活动,小组项目的进程可能都在你邮箱里;不要错过了!!!另外,收到重要邮件尽量回复一下,以表示你收到了。\n</p>\n<h2 id="饮食">\n	2.饮食\n</h2>\n<p class="normal">\n	WPI附近唯一的中餐馆——龙升(dragon dynasty)是大家经常去吃饭的地方。Highland上Boynton是美式餐厅,Soul是吃海鲜的,这两家都算是高级一点的。沿街还有一家披萨店,West Street上也有一家。然后还有Subway,很健康哦。校园北边一点Park Ave上有一家西餐馆Boston Market,价格也比较便宜。这是学校周围步行可到达的区域内大家比较常去的餐馆。南边920 main street上有新华灯,老 板和服务员会说普通话,感觉比较亲切,而且有许多克拉克大学的女生会去那里吃饭。另外新华灯接受外卖(龙升没有),10美元起送;最好提前一小时订,因为会等很久。\n</p>\n<p class="normal">\n	如果认识有车的学长或者自己以后有车,可以偶尔去比较远的地方吃饭,会有一些质 量不错的中餐馆,例如老四川,重庆食府,韩国烧烤店,越南米线店,Boston和Quincy还 有唐人街的各种餐馆等等。\n</p>\n<p class="normal">\n	<img src="/kindeditor/attached/image/20130821/20130821132352_27841.png" width="192" height="532" align="left" alt="" />另外,西餐也有不错的,例如牛排店ruby Tuesday,快餐burger king等等.中餐想吃过瘾,还有imperial buffet之类的中餐自助。还有个Minado,在九号路 上,是日本料理自助,稍微贵一些,但物有所值。\n</p>\n<p class="normal">\n	除此之外重点推荐一家附近新开的中餐馆香格里拉。香格里拉是新开的华人餐厅，在RMV旁边。比新华灯略近，菜色也非常多，店内环境比较宽敞，可以办婚宴和大型聚会，每周六还有卡拉OK唱。老板Jenny很热情，每隔一阵就会去法拉盛进货，如果有需要的话可以让老板去法拉盛顺带一点特色菜回来，逢年过节老板也可以带一点月饼青团的回来，法拉盛的月饼青团比较便宜地道。\n</p>\n<p class="normal">\n	香格里拉除了有地道的寿司以外，还有一些新菜可以点，菜单上暂时还没有更新，比如水煮辣鱼，非常推荐，只要14刀。香格里拉的西湖牛肉羹还有炸酱面也是在美国吃到过的里面比较地道的了。菜色比较全，粤菜和川菜尤其原汁原味，很少会有失望的。中午的盖浇饭combo在7刀左右，每周四和周五的中午还有经济实惠的buffet，7.95刀一个人。另外，在香格里拉，出示学生证可以打九折。\n</p>\n<p class="normal">\n	菜单在官网上有：<a href="http://www.shangri-lama.com/">http://www.shangri-lama.com/</a> \n</p>\n<p class="normal">\n	地址：60 Madison St. Worcester, Massachusetts 01608\n</p>\n<p class="normal">\n	电话：(508) 798-0888\n</p>\n<p class="normal">\n	<br />\n</p>\n<p class="normal">\n	下面是其他附近一些常去的餐馆的地址。\n</p>\n<p class="normal">\n	◇老四川: 271 Worcester RD. Framingham, MA\n</p>\n<p class="normal">\n	◇重庆食府: 17 Edgell Road, Framingham, MA\n</p>\n<p class="normal">\n	◇韩国料理(Korean restaurant Westborough): 5 E Main St. # A, Westborough, MA\n</p>\n<p class="normal">\n	◇越南米线(Pho Dako):\n</p>\n<p class="normal">\n	◇ Ruby Tuesday:537 Lincoln St, Worcester, MA\n</p>\n<p class="normal">\n	◇ Boston market :14 Park Avenue, Worcester, MA 01605\n</p>\n<p class="normal">\n	Boston的中餐馆参见:<a href="http://www.mitbbs.com/article1/Boston/12569286_0_1.html">http://www.mitbbs.com/article1/Boston/12569286_0_1.html</a> \n</p>\n<p class="normal">\n	特别推荐:美国中餐馆分布图<a href="http://chinesefoodmap.com/">http://chinesefoodmap.com/</a> \n</p>\n<h2 id="购物">\n	<a name="undefined"></a>3.购物\n</h2>\n<p class="normal">\n	(1)家具及日常用品\n</p>\n<p class="normal">\n	A.床:美国这边的床一般由Frame,Box和Mattress三部分组成,可以单独买,大小分为twin、\n</p>\n<p class="normal">\n	full、queen和king size四种。Twin size为单人床;queen为双人床,full介于twin和queen size之间,king size最大(差不多就是Twin的一米一,Full的一米三,queen的一米五,king的一米八)。床这边卖的比较贵,一套queen size的床在Giant Mattress一般会买到1000刀左右。在Ikea会买到比较便宜的床,大概100-200刀之间。 运费一般在50-100刀之间。\n</p>\n<p class="normal">\n	在giant mattress有时候也可以买到比较便宜的床,而且那的床比较好,250-350的床是可以买到的,在blackstone和不经常去的那个沃尔玛有这家店,但是建议去不经常去的沃尔玛那,因为那个收货员原来在伍斯特工作,可以和她砍砍价,家具target有时候也有免费送货的,而且质量还不错,建议到target的官网上看看。\n</p>\n<p class="normal">\n	B.家具:家具一般在专门的家具超市Ikea购买。Wal-Mart和Target这样的综合超市也有便宜的家具出售。\n</p>\n<p class="normal">\n	C.日常用品:其他一些日常用品,比如厨房用具、洗衣用具、卫生间用具、卧室用具、体育用具等 等都在可以在Wal-Mart和Target这样的综合超市买到;或者网购。一些五金器具之类的Home Depot和Wal-Mart也可以买到。\n</p>\n<p class="normal">\n	D.二手货:如果想找价廉物美的二手家具和日常用品,可以去yard sale或者moving sale看看,\n</p>\n<p class="normal">\n	会比店里便宜不少。或者去上面的那个craigslist上去淘,经常能遇见比较便宜的,\n</p>\n<p class="normal">\n	worcester.craigslist.org。有时候WPI的老生搬家也会卖家具,请加入我们的mail list并时刻 注意这方面的信息。旧家具还可以去25 Park Ave的Good Will 508 752 4042,和166 Chandler Street 508 795\n</p>\n<p class="normal">\n	7400上面的旧家具店买。\n</p>\n<p class="normal">\n	E.附近超市:\n</p>\n<p class="normal">\n	○IKEA:IKEA Way, Stoughton, MA 02072\n</p>\n<p class="normal">\n	○Wal-Mart:11 Jungle Rd, Leominster, MA 01453\n</p>\n<p class="normal">\n	○Target:529 Lincoln St, Worcester, MA 01605\n</p>\n<p class="normal">\n	○Home Depot:130 Gold Star Blvd, Worcester, MA 01606\n</p>\n<p class="normal">\n	(2)买菜\n</p>\n<p class="normal">\n	○Price Chopper:离学校最近的美式超市 在美国常见的蔬菜水果之类都能在这里找到。肉类鱼类 鸡蛋面包牛奶还有各种熟食也不错。主要面向美国人 但是最近也开始有一些诸如 方便面豆腐 大白菜之类的中式食品出现。质量好但是价格较高。优点是24小时营业,且质量不错。 地址:221 Park Ave, Worcester, MA -\n</p>\n<p class="normal">\n	(508) 798-5178\n</p>\n<p class="normal">\n	○Price Rite:大型美式超市距离稍远但是尚可步行达到商品种类较Chopper更多 以西方以及南美消费习惯为主。价格十分厚道,由于销售量挺大,所以十分新鲜。在这里主要买些蔬菜、肉类、水果、饮料和牛奶 等。此外还有一些廉价衣物鞋帽出售。\n</p>\n<p class="normal">\n	地址:117 Gold Star Blvd, Worcester, MA (508) 853-7443\n</p>\n<p class="normal">\n	○Mekong Supermarket:越南超市。以亚洲顾客为主,常见的中餐用料可以在这里找 到:泰国香米、普通稻米、苋菜、白菜等美式超市难见到的这里都有。此外还有牛杂、鸡杂、肝、猪蹄等亚洲特色肉制品。店内有新鲜海鱼出售。此外还有一些诸如脸盆、暖壶 、 中式菜刀、 砂锅等生活用具。店内还提供配钥匙的服务。价格中等。火锅用品在这里基本上都可以找得到。晚上8点关门。\n</p>\n<p class="normal">\n	地址:747 Main St, Worcester, MA - (508) 304-1437\n</p>\n<p class="normal">\n	○Family 88:中国超市。经营范围和Mekong类似规模较小。老板是中国人很热情。如果有什么酱汁调料别处找不见可以在这里碰碰运气。店内还有便宜的IP电话卡出售。虽然店面小,但是东西齐全,还有一些淡水鱼虾都买得到。买鱼的话还会帮你剖开洗净,十分厚道。许多东西比Mekong便宜,晚上9点半左右关门。\n</p>\n<p class="normal">\n	地址:877 Main St, Worcester, MA - (508) 753-9988\n</p>\n<p class="normal">\n	○亚洲超市:在Westborough,距离较远,约20分钟车程。中日韩三国的调味品这里十分 齐全。火锅料火锅用的薄片牛羊肉也很不错。此外还有一些药膳食材,对食疗有研究的同学可以去找找。\n</p>\n<p class="normal">\n	地址:229 Turnpike Rd,\n</p>\n<p class="normal">\n	Westborough, MA - (508) 898-0066\n</p>\n<p class="normal">\n	○Twin''s Oriental Market:韩国超市。知道的人不 是很多;有日韩风格的零食出售 还有一些装饰\n</p>\n<p class="normal">\n	用品。此外也有著名的韩国泡菜。旁边有一 家小的韩国餐厅 但是似乎评价一般。\n</p>\n<p class="normal">\n	地址:118 Cambridge St # 5, Worcester, MA\n</p>\n<p class="normal">\n	○金门超市:在Boston Quincy地区 开车1.5小时左右。Boston Area最大最齐全的中国超市。只要国内有的这里差不多都有。还能买到新鲜的淡水鱼类。有中式熟食出售。\n</p>\n<p class="normal">\n	地址: 219 Quincy Ave., Quincy, MA - (617) 328-1533\n</p>\n<p class="normal">\n	(3)买衣服及化妆品\n</p>\n<p class="normal">\n	○Greendale Mall有TJ.MAX, TJ.MAX有的时候能淘到比较好的大牌。但是大多 数时候都是一些中低档的衣服 装饰品 以及简单的化妆品(EA最多,有时会有EL)。Best Buy就不用细说了,电子产品专卖店。此外Greendale Mall还有一些中低端的品牌如old navy,AE,RUE21等,东西比较便宜,有时候会有大的折扣。<a href="http://www.simon.com/mall/default.aspx?id=336">http://www.simon.com/mall/default.aspx?id=336</a> \n</p>\n<p class="normal">\n	○Solomon Pond驾车20分钟左右,档次比Geendale Mall好,内有MACY’S百货和一些 常见品牌:FOREVER21,AF,AE,VS,EXPRESS, FINISH LINE, FOOT LOCKER等。附近也有Best buy。Food count还不错。有电影院。<a href="http://www.simon.com/mall/default.aspx?id=339">http://www.simon.com/mall/default.aspx?ID=339</a> \n</p>\n<p class="normal">\n	○Wrentham Village Premium Outlets, MA最大的outlet。 服装鞋帽装饰品家具食品等各大品 牌应有尽有,重大节日常常有大的deal凭学生证可以去custom service center拿到VIP member折扣单。有很多大牌比如GUCII,DIOR,PRADA之类常年有折扣,black friday折扣很多不过人也是不一般的多。学校International House每年秋季开学还会组织去采购。<a href="http://www.premiumoutlets.com/outlets/outlet.asp?id=10">http://www.premiumoutlets.com/outlets/outlet.asp?id=10</a> \n</p>\n<p class="normal">\n	○Natick Mall在Natick,离Worcester大概30分钟车程 比较好的mall。服饰化妆品家具 用品品牌多档次好 当然价格也不一般。具体的品牌列表也请参考网站。留心关注各种折扣信息的话会物超所值 附近还有Dick''s,Staples,cheese cake factory等店面。Minado Restaurant就在对面。是一家比较大的日式自助,晚餐还会有生蚝,刺身。<a href="http://www.natickcollection.com/">www.natickcollection.com</a> \n</p>\n<p class="normal">\n	○Newbury Street ,Boston: Boston的奢侈品牌一条街,有一些比较贵的牌子比如Armani,Ernenegildo Zegna, Chanel, Cartier, Loro Piana等。<a href="http://www.newbury-st.com/">www.newbury-st.com</a> \n</p>\n<p class="normal">\n	<br />\n</p>\n<p class="normal">\n	◇购物指导网\n</p>\n<p class="normal">\n	○<a href="http://www.huaren.us/">www.huaren.us</a> \n</p>\n<p class="normal">\n	○<a href="http://www.dealsea.com/">www.dealsea.com</a> \n</p>\n<p class="normal">\n	○<a href="http://www.dealslist.com/">www.dealslist.com</a> \n</p>\n<p class="normal">\n	○可以关注 北美省钱快报 的官方微博,有很多折扣提供。<a href="http://www.dealmoon.com/">www.dealmoon.com</a> \n</p>\n<p class="normal">\n	◇品牌官方网站:\n</p>\n<p class="normal">\n	○AE: American Eagle Outfitters,<a href="http://www.ae.com/">www.ae.com</a>,休闲装为主\n</p>\n<p class="normal">\n	○AF: Abercrombie&amp;Fitch,<a href="http://www.abercrombie.com%20/">www.abercrombie.com</a>(Abercrombie是其junior品牌,更加年轻海滩风情的Hollister和更高端一些的RUEHL no.928也是这家公司的) ,休闲装为主,香水也不错。\n</p>\n<p class="normal">\n	○AN/安家:Anthropologie,<a href="http://www.anthropologie.com/">www.anthropologie.com</a>(a retailer of high-end casual clothing andother merchandise run by Urban Outfitters)\n</p>\n<p class="normal">\n	○AT / ATloft: Ann Taylor/Ann Taylor Loft,<a href="http://www.anntaylor.com/">www.anntaylor.com</a>,<a href="http://www.anntaylorloft.com/">www.anntaylorloft.com</a> \n</p>\n<p class="normal">\n	○AX: Amarniexchange,<a href="http://www.amarniexchange.com/">www.amarniexchange.com</a> \n</p>\n<p class="normal">\n	○BR/香蕉/香蕉共和国: Banana Republic。与其低端old navy和中低端gap是一家公司)<a href="http://www.amarniexchange.com/">www.bananarepublic.com</a>,<a href="http://www.gap.com/">www.gap.com</a>,<a href="http://www.gap.com/">www.oldnavy.com</a> \n</p>\n<p class="normal">\n	○BBB: Bed, Bath &amp; Beyond,<a href="http://www.bedbathandbeyond.com/">www.bedbathandbeyond.com</a>,居家用品\n</p>\n<p class="normal">\n	○BBW: Bath&amp; Body Works,<a href="http://www.bathandbodyworks.com/">www.bathandbodyworks.com</a>,护肤用品\n</p>\n<p class="normal">\n	○Bloomies: bloomingdales (中高档百货店)<a href="http://www.bloomingdales.com/">www.bloomingdales.com</a> \n</p>\n<p class="normal">\n	○CC: Casual Corner,<a href="http://www.casualcorner.com/">www.casualcorner.com</a>(See PS,一家的,不同size)\n</p>\n<p class="normal">\n	○CK: Calvin Klein<a href="http://www.calvinklein.com/">www.calvinklein.com</a>,各种休闲装为主,也有西装,男女用香水也不错\n</p>\n<p class="normal">\n	○CD: Christian Dior,<a href="http://www.dior.com/">www.dior.com</a>,高档品牌\n</p>\n<p class="normal">\n	○D&amp;G:<a href="http://www.dkny.com/">http://www.dkny.com/</a> \n</p>\n<p class="normal">\n	○Diesel:<a href="http://store.diesel.com/">http://store.diesel.com</a>,意大利休闲装\n</p>\n<p class="normal">\n	○DKNY/DKNY Jeans:<a href="http://www.dkny.com/">http://www.dkny.com/</a> \n</p>\n<p class="normal">\n	○CM: Club Monaco<a href="http://www.clubmonaco.com/">www.clubmonaco.com</a> \n</p>\n<p class="normal">\n	○FB: Filenes’ basement (较高档的折价店)<a href="http://www.filenesbasement.com/">www.filenesbasement.com</a> \n</p>\n<p class="normal">\n	○FCUK: French Connection UK,<a href="http://www.fcuk.com/">www.fcuk.com</a> \n</p>\n<p class="normal">\n	○FP: Free people,<a href="http://www.freepeople.com/">www.freepeople.com</a> \n</p>\n<p class="normal">\n	○F21/21: Forever21,<a href="http://www.forever21.com/">www.forever21.com</a> \n</p>\n<p class="normal">\n	○HM: H&amp;M,<a href="http://www.hm.com/">www.hm.com</a>,欧洲品牌\n</p>\n<p class="normal">\n	○贼酷/XX:Jcrew,<a href="http://www.jcrew.com/">www.jcrew.com</a>他家的衬衣质量很不错\n</p>\n<p class="normal">\n	○JC: Juicy Couture,<a href="http://www.juicycouture.com/">www.juicycouture.com</a> \n</p>\n<p class="normal">\n	○Liz: Liz Clairborne,<a href="http://www.lizclairborne.com/">www.lizclairborne.com</a> \n</p>\n<p class="normal">\n	○捞面:loehmann''s(中高档的折价店),<a href="http://www.smartbargains.com/">www.smartbargains.com</a> \n</p>\n<p class="normal">\n	○马哨/马勺:Marshall''s,<a href="http://www.marshalls.com/">www.marshalls.com</a> \n</p>\n<p class="normal">\n	○MJ: Marc Jacobs,<a href="http://www.marcjacobs.com/">www.marcjacobs.com</a> \n</p>\n<p class="normal">\n	○MS/60: Miss Sixty(与energie一家公司),<a href="http://www.misssixty.com/">www.misssixty.com</a>(也可指Max Studio啊好像,呵呵,<a href="http://www.maxstudio.com/">www.maxstudio.com</a>) Nautica:<a href="http://www.nautica.com/">www.nautica.com</a> \n</p>\n<p class="normal">\n	○NM: Neiman Marcus(高级百货店,其折价店为neiman marcus last call),<a href="http://www.neimanmarcus.com/">www.neimanmarcus.com</a> \n</p>\n<p class="normal">\n	○NW: Nine West,<a href="http://www.ninewest.com/">www.ninewest.com</a> \n</p>\n<p class="normal">\n	○Nordie: nordstrom (中高档百货店,折价店为nordstrom rack)<a href="http://www.nordstrom.com/">www.nordstrom.com</a> \n</p>\n<p class="normal">\n	○老海军:Old Navy,<a href="http://www.oldnavy.com/">www.oldnavy.com</a>,比较便宜的牌子\n</p>\n<p class="normal">\n	○PF: Paul Frank,<a href="http://www.paulfrank.com/">www.paulfrank.com</a>,<a href="http://www.juliusandfriends.com/">www.juliusandfriends.com</a> \n</p>\n<p class="normal">\n	○PS: Petite Sophisticate,<a href="http://www.petitesophisticate.com%20/">www.petitesophisticate.com</a>(See CC)\n</p>\n<p class="normal">\n	○Saks: Saks Fifth Avenue,<a href="http://www.saksfifthavenue.com/">www.saksfifthavenue.com</a>,各种高档品牌的集中销售商\n</p>\n<p class="normal">\n	○Off 5th (off 5th avenue,高级百货店saks 5th avenue的折价店)<a href="http://www.saks.com/">www.saks.com</a> \n</p>\n<p class="normal">\n	○seven for all mankind: (较高档牛仔裤品牌,裤兜和纽扣均有标志。express出的一款牛仔裤只叫seven,又混淆视听之嫌)<a href="http://www.sevenforallmankind.com/">www.sevenforallmankind.com</a> \n</p>\n<p class="normal">\n	○Tommy Hilfiger:<a href="http://www.shoptommy.com/tommy/">http://www.shoptommy.com/tommy/</a> \n</p>\n<p class="normal">\n	○UO: Urban Outfitters(学生品牌为主杂货店,和年龄层更大些的anthropologie,纯女装的free people是一家),<a href="http://www.urbanoutfitters.com/">www.urbanoutfitters.com</a> \n</p>\n<p class="normal">\n	○VS: Victoria''s Secret(和express, the limited, new york &amp; co.是一家公司) ,主营女士内衣<a href="http://www.victoriassecret.com/">www.victoriassecret.com</a> \n</p>\n<p class="normal">\n	○Zegna:<a href="http://www.zegna.com/">http://www.zegna.com/</a> \n</p>\n<p class="normal">\n	(4)买药\n</p>\n<p class="normal">\n	一些常见的非处方药,如感冒药、止疼药、治过敏药、维生素营养品、眼药水等等,可以在一些药品超市买到,比如CVS和Walgreen。WPI附近Park Ave上有一家CVS和一 家Walgreen,都是24小时营业。地址为\n</p>\n<p class="normal">\n	○ CVS:283 Park Avenue, Worcester, MA - (508) 792-3866\n</p>\n<p class="normal">\n	○ Walgreen:320 Park Ave, Worcester, MA - (508) 767-1732\n</p>\n<h2 id="出行">\n	4.出行\n</h2>\n<p class="normal">\n	a)本地\n</p>\n<p class="normal">\n	Worcester市内内公交车极为稀少,不方便。一个小时一趟。出租车也不多,有两个 出租车公司,一个red cab和yellow cab.出租车都要打电话预约,大约5-10分钟后会有车 到你的地址。如果提前预订的话,一般会准时到你指定的地方。从学校到火车站的话要大概8块钱,加小费。到Boston可以坐火车,一趟单程也是7.75美元,灰狗或者彼得潘的大巴单程需要10美元左右。火车和大巴一般都有wifi可以使用。火车和大巴均到boston的south station站,该站就在boston chinatown附 近。大巴上下车地点可能不同,大家注意查网站。\n</p>\n<p class="normal">\n	如需到walmart购物或者去price rite或者越南店/中国店买菜,可以几个人一起,请 有车的学长们帮忙。\n</p>\n<p class="normal">\n	○麻州公共交通:上面可以找到往返麻州各大城市的火车时刻表,波士顿地 区的 地铁图,还有波士顿地区的公共汽车线路图。<a href="http://www.mbta.com/">http://www.mbta.com/</a> \n</p>\n<p class="normal">\n	○Peterpan:上面可以找到peterpan的往返全美各个城市的时刻表还有在全美各个 城市的车站地址。同时,你还可以在上面直接订票。有时会有打折,订的早也会有优惠。<a href="http://www.peterpanbus.com/">http://www.peterpanbus.com/</a> \n</p>\n<p class="normal">\n	○往返波士顿和纽约的大巴:往返波士顿和纽约的中国城大巴主要有两家,一家是 风华(Fung\n</p>\n<p class="normal">\n	Wah Bus)还有一家是Lucky Star。因为和peterpan比,两家的价格较低,单 程只要$15(2.00am是25刀),所以是去纽约的主要选择。请注意,Peterpan和Feng Wah Bus在波士顿都是从south station的busterminal上车。但是到纽约不是在同一个地 方下车,Feng Wah是在Chinatown下车,Peterpan是在downtown附近的PABT(曼哈顿 岛上)。上下车地点可能不同,请在出发前了解清楚。\n</p>\n<p class="normal">\n	Feng Wah(风华):<a href="https://www.fungwahbus.com/default.aspx">https://www.fungwahbus.com/default.aspx</a>;\n</p>\n<p class="normal">\n	Lucky Star:<a href="http://www.luckystarbus.com/">http://www.luckystarbus.com/</a> \n</p>\n<p class="normal">\n	○再介绍一个很好的大巴,叫做MegaBus.网上订票地址是http://www.megabus.com/us/这大巴定得越早,价格越便宜,够早的话还有免费的甚至1块钱的。还有一个好处,就是 这大巴上不出意外有无线网络(WiFi),速度还算很可以,不过也不是每次都能用的。但 是看在早买票比中国大巴还便宜的面子上,在这里还是很推荐大家用这个大巴。还有一个是boltbus,跟megabus一样。而且上车的地方在south station .\n</p>\n<p class="normal">\n	○波士顿机场到学校的limo:以下是各个service的网站:\n</p>\n<p class="normal">\n	<a href="http://www.massport.com/Logan/getti_typeo_share.html">http://www.massport.com/Logan/getti_typeo_share.html</a> \n</p>\n<p class="normal">\n	其中包括了所有的limo和shared van.非常全。建议大家及早预订并且做好准备。\n</p>\n<p class="normal">\n	○两个比较受欢迎的limo公司:\n</p>\n<p class="normal">\n	(1)<a href="http://knightlimo.com/">http://knightlimo.com</a>对WPI的学生有优惠。\n</p>\n<p class="normal">\n	(2)<a href="http://www.wlimo.com/">http://www.wlimo.com</a> \n</p>\n<p class="normal">\n	<br />\n</p>\n<p class="normal">\n	b)美国其他地区旅游\n</p>\n<p class="normal">\n	国外的学习生活有时候会让人觉得有些单调,外出旅游不失为放松心情的好方法,尤其对于喜\n</p>\n<p class="normal">\n	欢背包旅行的人来说更是如此。美国国土广大,地貌丰富,各种自然人文历史经 典可以说应有尽有,\n</p>\n<p class="normal">\n	尤其是自然风光。中国地理学会编撰的一本书《世界上最美丽的100个地方》,其中有18处位于\n</p>\n<p class="normal">\n	美国。黄石公园、大峡谷、尼亚加拉瀑布等都是我们耳熟能 详的名字。这里我们主要集中介绍一下Worcester周围比较有名的景点。对于新生来说,这些地 方自己有了车之后基本上都可以去,或者可以和老生一起拼车去,一起摊点油费过路费啥 的。美国这边出行非常方便,景点基本上不收费,宾馆机票的预订也非常方便。\n</p>\n<p class="normal">\n	(1)城市游\n</p>\n<p class="normal">\n	A.纽约:\n</p>\n<p class="normal">\n	距离Worcester大约4小时车程。美国最繁华的城市,主要景点有自由女神像(Statue of Liberty),华尔街(Wall Street),帝国大厦(Empire State Building),时代广场(Times Square),洛克菲勒中心(Rockefeller Center),大都会博物馆(Metropolitan Museum),中央公园(Central Park),第五大道(the FifthAve),哥伦比亚大学(Columbia University),杜莎夫人蜡像馆(Madame Tussaud''s Wax Museum)、布鲁克林大桥(Brooklyn Bridge)等等。也可以到Flushing中国城吃非常正宗的中国菜和各种小吃:油条、豆腐脑、贵州米粉、兰州拉面、羊肉泡馍等应有尽有。\n</p>\n<p class="normal">\n	想要观光的同学可以到<a href="http://www.citypass.com/new-york%20">http://www.citypass.com/new-york</a>买city pass;有点类似游乐园通票,\n</p>\n<p class="normal">\n	以折扣价买N个景点的票(景点中有一些是自选的)。这个好像是要在1周内用完,所以不想一次\n</p>\n<p class="normal">\n	去很多经典的同学就单独买票吧。\n</p>\n<p class="normal">\n	B.波士顿:\n</p>\n<p class="normal">\n	距离Worcester大概一小时车程。麻州首府,美国最古老的城市之一,有很多殖民地时期古老的建筑。主要景点有Freedom Trail(沿途经过波士顿的一些古老建筑),Boston Museum of Fine\n</p>\n<p class="normal">\n	Art,Charles River等。当然,哈佛大学和MIT是一定要去看看的。每年的 独立日(7月4号),波士顿都会举行一场大型的音乐会和焰火表演,这个也不要错过。\n</p>\n<p class="normal">\n	C. Salem:\n</p>\n<p class="normal">\n	距离Worcester约1.5小时。Salem是波士顿北边非常美丽的一个海滨小镇,有一个巫 师博物馆,每年的万圣节(Halloween)小镇热闹非凡。室内的Peabody and Essex Museum保存了一栋完整的徽南民居,是Boston附近不多的中国元素。\n</p>\n<p class="normal">\n	D.费城:\n</p>\n<p class="normal">\n	距离Worcester大约5小时车程。费城是美国的发源地,《独立宣言》和美国第一部 联邦《宪法》的诞生地。市区内与之有关的相关景点有Liberty Bell,Independence Hall等。\n</p>\n<p class="normal">\n	E.普林斯顿:\n</p>\n<p class="normal">\n	距离Worcester大约4小时车程,介于费城和纽约城之间,Princeton University所在 地。Princeton University的校园非常古老幽静,是美国最美丽的校园之一。\n</p>\n<p class="normal">\n	F.华盛顿\n</p>\n<p class="normal">\n	距离Worcester大约8小时车程,美国首都。主要景点有白宫(White House)、国会山(CapitolHill)、林肯纪念堂(Lincoln Memorial)、华盛顿纪念碑(Washington Monument)、富兰克林罗斯福主题公园(Franklin D Roosevelt Memorial),National Mall及两边的很多博物馆 等。\n</p>\n<p class="normal">\n	(2)自然风光\n</p>\n<p class="normal">\n	A. Acadia National Park:\n</p>\n<p class="normal">\n	距离Worcester大约5小时车程。美国东北部唯一的国家公园,位于Maine州境内,依山傍海。公园内海岸、悬崖、沙滩、港湾、高山、湖泊、森林、海岛交相辉映,还可以 品尝Maine龙虾。<a href="http://www.acadiamagic.com/">http://www.acadiamagic.com/</a> \n</p>\n<p class="normal">\n	B. Niagara Falls(尼亚加拉瀑布):\n</p>\n<p class="normal">\n	距离Worcester大约7小时车程。世界上最著名的瀑布之一,位于美加边境,瀑布水量充沛,气势\n</p>\n<p class="normal">\n	宏大。<a href="http://www.tourismniagara.com/">http://www.tourismniagara.com/</a> \n</p>\n<p class="normal">\n	C. Cape Cod海滩:\n</p>\n<p class="normal">\n	距离Worcester大约2小时车程。夏天的避暑胜地,以海滩而闻名。<a href="http://www.capecodtravel.com/">http://www.capecodtravel.com/</a> \n</p>\n<p class="normal">\n	D. White Mountains:\n</p>\n<p class="normal">\n	距离Worcester约4小时车程,由多个山峰组成,其中Mt Washington为美国东北部最高的山峰,海拔近2000米,是hiking的理想去处。也非常适合秋天(11月中下旬)去 看枫叶。<a href="http://www.visitwhitemountains.com/">www.visitwhitemountains.com</a> \n</p>\n<p class="normal">\n	E.佛蒙特森林(Vermont Forest):\n</p>\n<p class="normal">\n	Vermont是美国东北部一个州,距离Worcester最近约2小时车程。全州95%地域为森林所覆盖,以秋天的红叶最为出名,为世界上最美丽的地方之一。每年的11月里,枫 树叶子逐渐由绿转黄、再变橙黄、鲜 红、深红,最后变成褐红才掉落。北部靠近加拿大边 境的地方,气温低,海拔高,枫叶最早变红,此后,红色差不多每天向南延伸10英里。 因此人们就有幸看到这番人间的奇景:北方的枫叶已然红透,南方还是全黄,南北交界处 的色彩最为丰富,从最深的紫红,到火把一样的赤红,明明暗暗的金黄,点缀着松树的 绿、木屋的白,这满山遍野的锦绣,浓烈得象最华丽的印象派画布,一派如火如荼的生机 勃勃,所谓悲秋之气荡然无存。佛蒙特除了枫叶,还有红色谷仓,白色尖顶小教堂,廊 桥,奶牛场,小镇,丘陵„„青山山脉如同脊骨,贯穿整个州,不是很高,缓缓起伏连绵 不止,处处是最典型的美国田园风光\n</p>\n<p class="normal">\n	F. Wachusett Mountain:\n</p>\n<p class="normal">\n	距离Worcester最近的一座山,大约20分钟车程,可以hiking,冬天也可以滑雪。\n</p>\n<p class="normal">\n	G. Marthas Vineyland Island:\n</p>\n<p class="normal">\n	麻州cape cod外海的一小岛,只能乘船或飞机抵达,为美国最著名的夏日度假胜地之 一(summercolony)。<a href="http://www.marthas-vineyard-vacation-tips.com/">http://www.marthas-vineyard-vacation-tips.com/</a> \n</p>\n<p class="normal">\n	(3)人文景观及其他\n</p>\n<p class="normal">\n	A. Newport Mansion:\n</p>\n<p class="normal">\n	Newport距离Worcester大约1.5小时车程。市区内有很多幢100-250年前修建的豪宅,从中可以了解到美国以及欧洲上流贵族社会的奢侈生活。另外,Newport每年的七月 或八月份会有飞行表演。<a href="http://www.newportmansions.org/%20">http://www.newportmansions.org/</a> \n</p>\n<p class="normal">\n	B. Six Flags (六旗公园)\n</p>\n<p class="normal">\n	美国最著名的全国连锁游乐园,以各种刺激的过山车和水上乐园而闻名。 距离Worcester最近的six flags在麻州的springfield,大约1小时车程。New Jersey的six flags最为出名,有世界上最高的过山车。<a href="http://www.sixflags.com/">http://www.sixflags.com</a> \n</p>\n<p class="normal">\n	(4)订宾馆\n</p>\n<p class="normal">\n	这里强烈推荐大家使用priceline:<a href="http://www.priceline.com/">www.priceline.com</a>。通过该网站可以竞价Bid到非 常便宜的星级宾馆。方法是:点击hotel—bid now,然后输入你的各种信息(入住时间,天数,房间数,宾馆星级,区域等)并出价(比如40刀),然后系统会制动搜寻符合条 件的宾馆,看有没有哪家宾馆愿意按照你的出价提供房间。使用这个网站经常可以得到70%以上的折扣。注意:这个方法也有风险,最后可能订到的酒店不完全如意。\n</p>\n<h2 id="买车">\n	5.买车\n</h2>\n<p class="normal">\n	有些同学会买新车,当然更多的同学可能会选择买二手车。这里重点说说如何买二手车:二手车一般比较便宜,当然,根据 车的不同价格差别很大。常用的一个买二手车的地方是一个叫Craigslist的网站:<a href="http://www.craigslist.org/cta/">http://www.craigslist.org/cta/</a>(这个网站,请大家小心,因为是person toperson的交易,有些人品不怎么样的卖家时不时刊登卖车信息,劝大家联系懂车的学长学姐去亲自试驾和商量价钱。。。);www.cars.com这里有很多二手车的信息,有些是private owner posted,也有 些是dealer posted。大家可以在Worcester版选择,但是一般车源数目较少,也可以到Boston版选择,那里的车源比较多。\n</p>\n<p class="normal">\n	买二手车的一般程序:\n</p>\n<p class="normal">\n	a)看到你觉得满意的车型信息后,到一个被普遍认可的查询车子参考价格的网站kbb.com的usedcar里输入车子的信息: year,model,mileage等等\n</p>\n<p class="normal">\n	(<a href="http://www.kbb.com/kbb/UsedCars/default.aspx">http://www.kbb.com/kbb/UsedCars/default.aspx</a>)。 选择condition后,网站会给出这个 车子的参考价格,人称KBB value。如果对方要价跟这个车子的KBB value基本吻合,说明 这个车子可以作为考虑的对象;如果要价高于KBB值很多,可能不合算;如果低于KBB值 很多,你也要当心,可能这个车子是有什么问题,或者出过车祸之类的,总之,没有掉下 来的馅饼,不要贪便宜!\n</p>\n<p class="normal">\n	b)看好KBB值以后,觉得不错,就也可以发email或者打电话给卖主,索要这个车子的VINnumber, VIN number相当于这个车子的“身份证号”,是官方注册用的不变的一个号 码(好像17位),有了这个VIN number,你就可以到carfax.com上去查这个车子的所有history了,在这个history里面,可以看到,这个车子前面有过几任车主,有没有车祸等 的记录,还有每个车主对车做的保养service等等,都能看到。 当然,这个carfax上查history是要买一个账号的,一般是一个账号$40,以前是一个月内有效,可以查无限次,据 说现在只能查5次。很多同学share一个账号,也有不少同学直接到mit bbs的汽车版 上,请求专人帮忙查carfax,那里好像是有一个管理员专门管一个carfax账号,为大家服务,你查完以后,如果想表示感谢,可以给mitbbs donate一点小费,用于下一个账号的购买,为后来者服务。\n</p>\n<p class="normal">\n	Carfax好像也就6美元查一个VIN,自己买一下也非常方便。\n</p>\n<p class="normal">\n	c)查完carfax以后,觉得不错,就可以联系到现场看车了,可以请一个比较懂车的同学一 起去看看,测试那个车子。如果不错,再谈价格啊,条件啊,等等。如果都还不错,最后 把车子开过去做一个mechanic check, $70~$100,如果没有检查出大的毛病,就可以拍板买 了。\n</p>\n<p class="normal">\n	d)付完钱以后,就是要做车子的title transfer了,卖主会把车子的title签字以后给你,让 你到RMV去办理过户手续。\n</p>\n<p class="normal">\n	e)在办理title transfer之前,你要为这个车子买保险,二手车一般买半保险,每半年购买 一次,保险费根据你的驾龄、年龄、车况等有些不同,但一般在每半年几百美元左右。保 险公司有好多家,如果是一辆二手车,买保险的原则通常是挑选最便宜的。可以先在不同 的保险公司网站,如<a href="http://www.geico.com/">http://www.geico.com/</a>上做一个Quote,比较价格。需要注意的是,如果在买车的时候还没有拿到正式的驾照,只有Learner Permit的话,有些保险公司是不提供保险的。网上买保险,当天能拿到,print出来以后,直接拿到RMV,去办理title transfer。需要的证件:passport,卖主签过字的title, SSN,insurance等。\n</p>\n<p class="normal">\n	f)在办完title transfer以后,同时车子的registration应该就有了,RMV会给你两个车牌car plate。他们会告诉你,在registration以后的10天内,local还需要在Auto Servicedealer的任何一家 或者 处做一个car safety inspection。找一个好一点的dealer,不 会让你换这换那的,省心一些。 过了safetyinspection,你就成为有车族了!\n</p>\n<p class="normal">\n	g)同私人买二手车是一件麻烦的事情,有些时候可能看了好几辆却总是无法满意。购买二 手车还可以在localdealer的 处购买,优点是通常会提供一定时间的保修,并且车在卖出之 前都会保养得dealer比较好,也会将所有的手续办理好。缺点是dealer的二手车通常比 私人卖出的价格高一些。\n</p>\n<h2 id="考驾照">\n	6.考驾照\n</h2>\n<p>\n	先阅读交通法规手册后至RMV(Registry of Motor Vehicles)考笔试,地址是611 Main Street,Worcester, MA。笔试通过后即可取得学习驾照(learner’spermit),之后和RMV约时间考路考。考前请教有经验人士会有所帮助。\n</p>\n<p class="normal">\n	笔试时需带上以下证件:\n</p>\n<p class="normal">\n	i. Passport;\n</p>\n<p class="normal">\n	ii. I-20;\n</p>\n<p class="normal">\n	iii. Bank Statement;\n</p>\n<p class="normal">\n	iv.租房的Lease或者任何寄到你当前住址的账单(银行,水电),以证明自己是MA resident\n</p>\n<p class="normal">\n	v. SSN(没有SSN的同学 需要到SSN管理处办理SSN denial letter来证明你不具备申领SSN的条件,考驾照时需一 并出示。)\n</p>\n<p class="normal">\n	vi.近视的同学记得带眼镜或者隐形\n</p>\n<p class="normal">\n	路考的地点一般选择在Worcester的RMV,其他常去的考点包括Southbridge的RMV以及Framingham的RMV。\n</p>\n<p class="normal">\n	RMV的URL:<a href="http://www.mass.gov/rmv/">http://www.mass.gov/rmv/</a>。 可查到各RMV的地址、电话、下载申请表 和读交通法规。RMV网上服务一般只能让拥有SSN的人员使用,而且仅在正常工作时间 才会开通。\n</p>\n<h2 id="美国国内国际机票">\n	7.美国国内国际机票\n</h2>\n<p>\n	在美国,很多同学要出门旅游,订机票是一个经常碰到的事情。如果是在美国国内旅 行,机票一般在网上定比较方便,电子票e-ticket,一般提前一个月左右便宜,提前越早越 便宜。订机票的网站一般有:\n</p>\n<p class="normal">\n	<a href="http://www.orbitz.com/">www.orbitz.com</a>,<a href="http://www.priceline.com/">www.priceline.com</a>,<a href="http://www.expedia.com%20/">www.expedia.com</a>,<a href="http://flyithaca.com/">http://flyithaca.com/</a> \n</p>\n<p class="normal">\n	如果你想回国,一般找代理订机票会比网上买便宜100~200美元。可以在<a href="http://www.iflychina.net/airfare/agents/us">www.iflychina.net/airfare/agents/us</a>上找一些代理的电话,一个一个询问,比较价格等等,很多都是讲中文的代理。\n</p>\n<p class="normal">\n	还有几个比较有用的网站,可以比较或者直接购买回国的机票。\n</p>\n<p class="normal">\n	<a href="http://backchina.travelsuperlink.com/">http://backchina.travelsuperlink.com/</a> \n</p>\n<p class="normal">\n	<a href="http://www.studentuniverse.com/">http://www.studentuniverse.com/</a> \n</p>\n<p class="normal">\n	<a href="http://www.kingsvacation.com/result.aspx">http://www.kingsvacation.com/result.aspx</a> \n</p>\n<p class="normal">\n	<a href="http://www.iflychina.net/">http://www.iflychina.net/</a> \n</p>\n<p class="normal">\n	<a href="http://www.travelsuperlink.com/index_cn.php">http://www.travelsuperlink.com/index_cn.php</a> \n</p>\n<p class="normal">\n	我之前用过studentuniverse,这个网站需要注册用户,还需要就读学校的一些信息,具 体不记得了,价钱比较便宜。最后的网站travelsuperlink聚集了很多代理,在特价消息 栏,罗列着最新的特价机票。信息,可以去寻找符合自己情况的信息并联系相关的代理;在 讨论论坛,先注册一个账户,然后就可以在上面发布自己的信息,比如从哪里到哪里几号 的飞机,各个代理的人看到后就会给你发邮件提供他们符合要求的最低报价。\n</p>\n<h2 id="体育健身">\n	8.体育健身\n</h2>\n<p class="normal">\n	学校周围体育设施\n</p>\n<p class="normal">\n	○滑冰\n</p>\n<p class="normal">\n	网址:<a href="http://www.fmcicesports.com/public/locations/worcester/index.htm">http://www.fmcicesports.com/public/locations/worcester/index.htm</a>这个是在Worcester的,开车15分钟。稍微远点Auburn也有一个,\n</p>\n<p class="normal">\n	<a href="http://www.fmcicesports.com/public/locations/auburn/index.htm">http://www.fmcicesports.com/public/locations/auburn/index.htm</a>,差不多大,开车25分钟。看网页上的Public Sessions Schedule有开放时间。看网页上Public Skating一栏有租鞋费和入场费。都是$4,一场两个小时。 。周五晚上那场有DJ放歌,所以人很多,去晚了会没有冰鞋租。\n</p>\n<p class="normal">\n	○划船\n</p>\n<p class="normal">\n	在route 9和N Lake Ave交叉口那里有个Regatta Point Park,可以租船网址:<a href="http://www.regattapoint.org/rentals.html">http://www.regattapoint.org/rentals.html</a>。还有在Hopkinton State Park也可以租船网址:<a href="http://www.outdoorrec.com/hopkinton-state-park.html">http://www.outdoorrec.com/hopkinton-state-park.html</a> \n</p>\n<p class="normal">\n	○滑雪\n</p>\n<p class="normal">\n	最近的是Wachusett Mountain,网址:\n</p>\n<p class="normal">\n	<a href="http://www.wachusett.com/MountainsideSkiSports/tabid/176/Default.aspx">http://www.wachusett.com/MountainsideSkiSports/tabid/176/Default.aspx</a>。有吃有喝有租装备有缆车(Lift),雪道难度有绿道有蓝道有Black Diamond道缆车票价:\n</p>\n<p class="normal">\n	<a href="http://www.wachusett.com/TicketsPasses/DailyPackages/LiftTicketRates/tabid/101/Default.aspx">http://www.wachusett.com/TicketsPasses/DailyPackages/LiftTicketRates/tabid/101/Default.aspx</a> \n</p>\n<p class="normal">\n	租装备价格:<a href="https://www.wachusett.com/TicketsPasses/DailyPasses/Rentals/tabid/167/Default.aspx">https://www.wachusett.com/TicketsPasses/DailyPasses/Rentals/tabid/167/Default.aspx</a> \n</p>\n<p class="normal">\n	滑雪请注意安全 学校周围也有些其他的网球场篮球场,可以用google map找找\n</p>\n<p class="normal">\n	○ Hiking\n</p>\n<p class="normal">\n	Wachusett Mountain State Reservation。网址:<a href="http://www.mass.gov/dcr/parks/central/wach.htm">http://www.mass.gov/dcr/parks/central/wach.htm</a>。\n</p>\n<p class="normal">\n	上面这个网页里有Trail Map。Purgatory Chasm State Reservation。网址:\n</p>\n<p class="normal">\n	<a href="http://www.mass.gov/dcr/parks/central/purg.htm">http://www.mass.gov/dcr/parks/central/purg.htm</a> \n</p>\n<h2 id="网络资源">\n	9.网络资源\n</h2>\n<p class="MsoNormal">\n	1.好用的微博推荐：@北美省钱快报, @Lobsboston【这是上届学长学姐的推荐，但是冥冥之中我觉得应该是个学姐】\n</p>\n<p class="MsoNormal">\n	2.如果你被生活打击了，可以看看@疯狂de咸蛋，领略一下悲剧屌丝的苦逼生活----没错，这是广告！\n</p>\n<p class="MsoNormal">\n	3.其他可以在QQ群里问~\n</p>\n<p class="MsoNormal">\n	<span style="line-height:1.5;">4.Google（Google在美国的速度可是非常的快的，强烈建议你熟悉一下的服务）</span>\n</p>\n<p class="MsoNormal">\n	○建议大家都去申请一个Google Account（我觉得地球人都应该有个，至于那些火星人还是回火星吧，地球太危险了）；\n</p>\n<p class="MsoNormal">\n	○熟练使用<b>Google</b>的搜索引擎查找自己需要的信息（建议多用用英文关键字）；\n</p>\n<p class="MsoNormal">\n	○邮箱可以用<b>Gmail</b>（当然WPI的邮箱是最重要的）；\n</p>\n<p class="MsoNormal">\n	○聊天工具可以使用<b>Gtalk</b>（国人还是QQ居多，GEEK的选择）；<br />\n我不是Geek，我还是用QQ，当然更多的时候我会用邮件\n</p>\n<p class="MsoNormal">\n	○查找地址以及出游线路可以用<b>Google Map</b>（不想喷苹果手机地图了，上次去波士顿面试坑死我了）；\n</p>\n<p class="MsoNormal">\n	○<s>管理自己的日常安排可以用</s><b><s>Google Calendar</s></b>；<br />\n我先在改用wunderlist了，下载地址<a href="http://www.6wunderkinder.com/wunderlist">http://www.6wunderkinder.com/wunderlist</a> \n</p>\n<p class="MsoNormal">\n	○查找论文可以用<b>Google Scholar</b>（我更喜欢直接Google）；\n</p>\n<p class="MsoNormal">\n	○上传照片可以用<b>Google Photos</b>；\n</p>\n<p class="MsoNormal">\n	○网上建立文档并共享可以用<b>Google Drive</b>。\n</p>\n<p class="MsoNormal">\n	7.网上购物常用网站\n</p>\n<p class="MsoNormal">\n	<a href="http://www.amazon.com/">www.amazon.com</a>著名的购物网站,尤以图书种类齐全著称；\n</p>\n<p class="MsoNormal">\n	<a href="http://www.dealsea.com/">www.dealsea.com</a>查询deal(优惠打折商品)的著名网站；\n</p>\n<p class="MsoNormal">\n	<a href="http://www.ebay.com/">www.ebay.com</a>全球最大的竞拍网站,可以找到任何东西；\n</p>\n<p class="MsoNormal">\n	<a href="http://www.tigercool.com/">www.tigercool.com</a>北美中文网站,主营图书、音像、电话卡。\n</p>\n<p class="MsoNormal">\n	8.小组project会很多，<a href="http://www.when2meet.com/">www.when2meet.com</a>方便大家定小组会议时间。\n</p>\n<p class="MsoNormal">\n	9.其他网站：\n</p>\n<p class="MsoNormal">\n	<a href="http://www.linkedin.com/">http://www.linkedin.com</a>说白了就是在线简历网站，想在美国有所发展，就建个吧\n</p>\n<p class="MsoNormal">\n	<a href="https://github.com/">https://github.com/</a> 程序员都懂的，不懂得学妹请联系XXX-XXX-XXXX\n</p>\n<p class="MsoNormal">\n	<a href="http://prezi.com/">http://prezi.com/</a> 学长推荐！！！学会这个，PPT就可以放一边去了；\n</p>\n<p class="MsoNormal">\n	<a href="http://www.flickr.com/">http://www.flickr.com/</a>貌似国外的家伙喜欢用这个管理照片，学长我很丑，我不拍照，没用过。\n</p>\n<p class="MsoNormal">\n	<br />\n</p>\n<p class="MsoNormal">\n	<b>友情提示：</b> \n</p>\n<p class="MsoNormal">\n	○国内的听歌软件：酷我，酷狗之类的在美国不能用了。百度在这也不能下载音乐。貌似现在QQ音乐还可以用，豆瓣电台也很稳定。\n</p>\n<p class="MsoNormal">\n	○优酷视频看不了的可以用chrome内核浏览器，然后安装Unblock Youku插件即可。\n</p>\n<p class="MsoNormal">\n	○<b>越界提示</b>：报道那天穿的帅气好看点，因为那天会办学生卡，要拍照的。但是没注意到，悔恨哪！屌丝的命。\n</p>\n<p class="MsoNormal">\n	<br />\n</p>\n<h2 id="小费">\n	10.小费\n</h2>\n<p class="normal">\n	餐馆一般中午10-15%,晚上15-20%。伍斯特出租车刷卡的话最少的选项是15%。住酒店门口帮你提行李的最好每人给1美元消费一次;酒店房间也是每天要放1-2美元消费的。\n</p>\n<p class="normal">\n	这里有一些各行业小费信息供参考:<a href="http://blog.sina.com.cn/s/blog_5944c8bc0100ylsp.html%20">http://blog.sina.com.cn/s/blog_5944c8bc0100ylsp.html</a>,\n</p>\n<p class="normal">\n	<a href="http://www.hjenglish.com/new/p112932/#504322-tsina-1-92320-0fa197972dc516aee81146c0e0">http://www.hjenglish.com/new/p112932/#504322-tsina-1-92320-0fa197972dc516aee81146c0e0</a> \n</p>\n<h2 id="诈骗,安全及法律">\n	11.诈骗,安全及法律\n</h2>\n<p class="normal">\n	<br />\n</p>\n<p class="normal">\n	最近通过QQ诈骗的事件越来越多,每年都有同学被盗号,骗子让家人汇钱之类的事情发生,损失达到数十万,因此让你自身和你的监护人了解一下有关于诈骗的特征,防范于未然是十分有必要的.\n</p>\n<p class="normal">\n	骗子通常会在qq群内以及群邮件发布房屋招租或者卖家具物件的广告并且给一个介绍链接,而这个链接会指向一个一摸一样的伪装qq空间登陆界面让你输qq号和密码,等你输入相关信息后骗子就得到了你的qq账号的控制权.随后骗子会假扮你向你的好友发送类似的链接,并且寻找和你关系较为密切的人,找借口让他们把钱打到骗子的账户里.以下是这个手法显而易见的特征:\n</p>\n<p class="normal">\n	(1)正确的qq空间的地址为<a href="http://user.qzone.qq.com/">user.qzone.qq.com</a>,而骗子给的地址往往是毫不相干或者带qq字眼的其他网址.比如说<a href="http://user.qzone.qq.com/">user.qzone.qq.lier.com</a>.识别方法是看这一段地址是否是以qq.com结尾.不是的话那该地址指向的页面就不属于腾讯.\n</p>\n<p class="normal">\n	(2)在开着qq的情况下去看别人的空间,一般不会出现还需要你登陆qq空间的情况.看到登陆ｑｑ空间这界面的时候你就要提高警觉了.\n</p>\n<p class="normal">\n	(3)从出租房或卖东西一方的角度考虑,他的发帖目的是要展示自己想要交易的东西,很难想象他会把这些需要展示的信息发在他的私人空间里,而不是以更直观能让人轻易看见的方式.更正常的租房卖物信息一般是以图片和附件的形式出现.\n</p>\n<p class="normal">\n	如果不幸的是你已经手滑把信息填进去了,那么至少把补救措施做好:首先火速把你的qq密码改掉,然后直接联系你的监护人，询问并警告他们不要在没听到你亲口声音的情况下向陌生账户打钱。\n</p>\n<p class="normal">\n	然后对除了经常和家人联系之外,建议最好给家人留一个同学的联系方式,以防万一,在家人感到异常的情况下能和你本人核对状况.另外,出门在外多张个心眼,别让家人担心;按时打个电话,报个平安宿舍门窗,电源炉子注意关好。\n</p>\n<p class="normal">\n	最后,想提醒大家的是,美国是一个法规很多的国家,虽然平时我们不会遇到什么大问题,但毕竟是在别人的国家,不明白的地方多问问,违法乱纪的事情,比如未满21岁喝酒啊(在室外喝酒也是不允许的),抄作业啊,咱就别做了。毕竟最后丢的是中国的脸,更重要的是,轻则开除学籍,重则就可能就把你遣送回国了。\n</p>', 0);
INSERT INTO `suvival_guide` VALUES(24, '学校设施', 23, '', 0);
INSERT INTO `suvival_guide` VALUES(25, '饮食', 23, '', 0);
INSERT INTO `suvival_guide` VALUES(26, '购物', 23, '', 0);
INSERT INTO `suvival_guide` VALUES(27, '出行', 23, '', 0);
INSERT INTO `suvival_guide` VALUES(28, '买车', 23, '', 0);
INSERT INTO `suvival_guide` VALUES(29, '考驾照', 23, '', 0);
INSERT INTO `suvival_guide` VALUES(30, '美国国内国际机票', 23, '', 0);
INSERT INTO `suvival_guide` VALUES(31, '体育健身', 23, '', 0);
INSERT INTO `suvival_guide` VALUES(32, '网络资源', 23, '', 0);
INSERT INTO `suvival_guide` VALUES(33, '消费', 23, '', 0);
INSERT INTO `suvival_guide` VALUES(34, '诈骗，安全及法律', 23, '', 0);
INSERT INTO `suvival_guide` VALUES(35, '回国', 0, '<h1>\n	<span style="color:#E53333;">回国</span>\n</h1>\n<h2 id="订机票">\n	<hr />\n	1.订机票\n</h2>\n<p class="normal">\n	请见上一章,7.美国国内国际机票。\n</p>\n<h2 id="返签准备">\n	2.返签准备\n</h2>\n<p class="normal">\n	回国之前(1)拿I-20去IH签字;(2)跟IH要一份“Certificate of Attendance”,(这个要申请两天后才能拿到);(3)去Registrar申请要官方成绩单(official transcript)。\n</p>\n<h2 id="返签">\n	3.返签\n</h2>\n<p class="normal">\n	续签的同学可以找中信银行代办签证,其实就是你把资料都给他,钱都交好,他帮你寄去大使馆。办好了就寄给你,省了你去排队了。\n</p>', 0);
INSERT INTO `suvival_guide` VALUES(36, '订机票', 35, '', 0);
INSERT INTO `suvival_guide` VALUES(37, '返签准备', 35, '', 0);
INSERT INTO `suvival_guide` VALUES(38, '返签', 35, '', 0);
INSERT INTO `suvival_guide` VALUES(39, '后记', 0, '<h1>\n	<span style="color:#E53333;">后记</span>\n</h1>\n<p class="normal">\n	<hr />\n	首先,再次恭喜大家千辛万苦终于即将开始梦寐以求美国生活!美国没有电视电影里的那 么奢华,也不至于像某些人描述的那么苦不堪言。远离家人朋友,自己的文化以及熟悉的环境,陌生害怕寂寞总还是有的;同时也伴随着新鲜激动,一些常常在电视电影小说里出现的场景也将 真实的重现在你眼前,怎会不有趣呢。\n</p>\n<p class="normal">\n	然后,WPI可能不是中国人民眼中的世界名校,但基于美国的教育方式和整体教育质量水 平比较高,只要你愿意学习,一定可以受益匪浅。伍斯特虽然不是纽约洛杉矶那样的大城市,但 他绝对不是真的美国农村(美国的小镇真的只有一个沃尔玛,几千的人口和大片的牛羊)。所以 大家大可不必抱怨。\n</p>\n<p class="normal">\n	最后,看到大片大片的华人,你可能也觉得不爽,但别忘了正是因为华人多,你才能得到 很多帮助。我们才有资源来帮助大家适应新环境。现在CSSA工作人员并不多,如有不足之处,希 望大家提出意见和建议,我们将做得更好!如果有想和我们一样为其他华人同学提供帮助的同学,欢迎加入我们!\n</p>\n<p class="normal">\n	<br />\n</p>\n<p class="normal">\n	2013-2014新生手册编译完毕,CSSA祝大家在伍村儿生活愉快!!!\n</p>\n<p class="normal">\n	CSSA敬上2013年\n</p>', 0);
INSERT INTO `suvival_guide` VALUES(40, '附录', 0, '<h1>\n	<span style="color:#E53333;">附录</span>\n</h1>\n<p class="normal">\n	<hr />\n	<h2>\n		附录一 体检表格指南\n	</h2>\n</p>\n<h3>\n	一 、下载\n</h3>\n<p class="normal">\n	学校要求填写的体检表格可以在<a href="http://www.wpi.edu/Admin/Health/forms.html">http://www.wpi.edu/Admin/Health/forms.html</a>中下载到。\n</p>\n<p class="normal">\n	打开网页以后可以发现7张pdf格式的文件。\n</p>\n<h3>\n	二 、填写:\n</h3>\n<p class="normal">\n	第一张“Health Form Letter”和第七张“Health Report and Deadlines”文件均为通知。\n</p>\n<p class="normal">\n	第二张“Request for Immunization Exemption”是说如果你对某种要求接种的疫苗是过敏等不能接 种的,要填写此表格,一般不会用到。\n</p>\n<p class="normal">\n	第三张表格“TB Risk Questionnaire”是关于肺结核的,非常容易填写,而且貌似不是必填的表格,在此不做赘述。\n</p>\n<p class="normal">\n	第四章表格“Information &amp; Waiver”是说脑膜炎疫苗的,如果你是在学校宿舍住的话,按照麻省 法律建议你注射脑膜炎疫苗。而这张表格的用途是,你决定不注射次疫苗的话,就要签写这张表 格。\n</p>\n<p class="normal">\n	第五,第六张表格为必填表格,非常重要。在此做详细介绍:\n</p>\n<p class="normal">\n	第五张表格“Immunizations Form”上面列举了各种WPI要求注射的疫苗。\n</p>\n<p class="normal">\n	第六张表格“Demographics, Confidential Health Record, and Physical Exam”则是各种健康信息。\n</p>\n<h3>\n	三、 表单\n</h3>\n<p class="normal">\n	1.<a href="http://www.wpi.edu/Images/CMS/Health/Immunizationupdate.pdf">Immunizations Form</a> \n</p>\n<p class="normal">\n	<img src="/kindeditor/attached/image/20130821/20130821133558_88763.png" alt="" />\n</p>\n<p class="normal">\n	<img src="/kindeditor/attached/image/20130821/20130821133612_90547.png" alt="" />\n</p>\n<p class="normal">\n	<img src="/kindeditor/attached/image/20130821/20130821133627_47984.png" alt="" />\n</p>\n<p class="normal">\n	<img src="/kindeditor/attached/image/20130821/20130821133636_99480.png" alt="" />\n</p>\n<p class="normal">\n	<img src="/kindeditor/attached/image/20130821/20130821133648_20970.png" alt="" />\n</p>\n<p class="normal">\n	◇友情提示:\n</p>\n<p class="normal">\n	1.上述两张表格都能带去体检处让医生填,但是,因为每个学校要求不一样,那里的医生也不可 能全都懂,所以你们自己还是得先看一下,毕竟是自己的事情。\n</p>\n<p class="normal">\n	2.乙肝3针要打一年,推荐把以前的记录带着,让那里的医生转抄;另外有些疫苗不是同时能打 的,要错开时间,所以请大家尽量早去体检。\n</p>\n<p class="normal">\n	3.关于7月1号之前要把这些表格寄给WPI的规定可以无视,你什么时候到伍村,什么时候给就 行,但是不能太晚,一定要在开学前。\n</p>', 0);
INSERT INTO `suvival_guide` VALUES(41, '鸣谢', 0, '<h1 align="center">\n	<span style="color:#E53333;">鸣 谢</span>\n</h1>\n<p class="normal" align="center">\n	(感谢各届为新生手册出力的同学们,排名不分先后)\n</p>\n<p class="normal" align="center">\n	陈斯&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;李明\n</p>\n<p class="normal" align="center">\n	沈晨&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;张凯\n</p>\n<p class="normal" align="center">\n	袁丽丽&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;葛阳\n</p>\n<p class="normal" align="center">\n	&nbsp;欧昕瑶&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;申宸\n</p>\n<p class="normal" align="center">\n	&nbsp;要志昊&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;应忞\n</p>\n<p class="normal" align="center">\n	&nbsp;黄哲&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;徐玮\n</p>\n<p class="normal" align="center">\n	&nbsp;周浩&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;赖舒圆\n</p>\n<p class="normal" align="center">\n	&nbsp;夏阳&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;张亚菲\n</p>\n<p class="normal" align="center">\n	&nbsp;郑嬗&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;魏天宇\n</p>\n<p class="normal" align="center">\n	&nbsp;\n</p>\n<p class="normal" align="center">\n	还没写完\n</p>', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int(11) NOT NULL auto_increment,
  `users_gender` char(1) NOT NULL default '',
  `users_firstname` varchar(32) NOT NULL default 'member',
  `users_lastname` varchar(32) NOT NULL default 'WPILIFE',
  `users_photo` varchar(128) NOT NULL default '1_120.jpg',
  `users_educational_background` varchar(32) NOT NULL,
  `users_major` varchar(32) NOT NULL default '',
  `users_graduate_university` varchar(64) NOT NULL,
  `users_status` varchar(32) NOT NULL default '',
  `users_address` varchar(100) NOT NULL default '',
  `users_country` varchar(32) NOT NULL default 'China',
  `users_province` varchar(32) NOT NULL,
  `users_city` varchar(32) NOT NULL,
  `users_county` varchar(32) NOT NULL,
  `users_dob` varchar(11) NOT NULL default '0001-01-01',
  `users_email_address` varchar(96) NOT NULL default '',
  `users_nick` varchar(96) NOT NULL default '',
  `users_telephone` varchar(32) NOT NULL default '',
  `users_qq` varchar(24) NOT NULL,
  `users_password` varchar(32) NOT NULL,
  `users_description` varchar(500) NOT NULL,
  `users_newsletter` tinyint(1) NOT NULL default '0',
  `users_activated` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`users_id`),
  UNIQUE KEY `users_email_address` (`users_email_address`),
  KEY `users_province` (`users_province`,`users_city`,`users_county`),
  KEY `users_graduate_university` (`users_graduate_university`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` VALUES(1, 'm', 'CSSA', 'WPI', '', '', 'CS', '', '', '100 Institute Rode, Worcester, MA', '', '', 'Yancheng', '', '0001-01-01 ', 'wpilife@gmail.com', 'WPILIFE', '', '0', '81e2db0f6139ff8b05c4a7062fcef090', 'Just Do It!', 0, 1);
INSERT INTO `users` VALUES(2, 'm', 'Hao', 'Zhou', 'wpilife_2.jpg', '', 'CS', '大连理工大学', '', '80 Park Ave, Worcester, MA', '', '', '中国江苏省盐城', '', '0001-01-01 ', 'hzhou@wpi.edu', '', '5083359815', '137044237', '81e2db0f6139ff8b05c4a7062fcef090', '   I AM HAO! HAHA~', 0, 1);
