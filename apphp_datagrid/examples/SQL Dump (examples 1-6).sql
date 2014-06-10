-- --------------------------------------------------------

--
-- Table structure for table `demo_countries`
--

CREATE TABLE IF NOT EXISTS `demo_countries` (
  `id` tinyint(3) unsigned NOT NULL auto_increment,
  `region_id` tinyint(3) unsigned NOT NULL default '0',
  `name` varchar(50) NOT NULL default '',
  `description` varchar(255) NOT NULL default '',
  `population` double unsigned NOT NULL default '0',
  `picture_url` varchar(100) NOT NULL default '',
  `is_democracy` int(10) unsigned NOT NULL default '0',
  `independent_date` datetime default '0000-00-00 00:00:00',
  `independent_time` time NOT NULL default '00:00:00',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=240 ;

--
-- Dumping data for table `demo_countries`
--

INSERT INTO `demo_countries` (`id`, `region_id`, `name`, `description`, `population`, `picture_url`, `is_democracy`, `independent_date`, `independent_time`) VALUES
(2, 1, 'Angola', '', 0, '', 0, NULL, '00:00:00'),
(3, 1, 'Benin', '', 0, '', 0, NULL, '00:00:00'),
(4, 1, 'Botswana', '', 0, '', 0, NULL, '00:00:00'),
(5, 1, 'Burkina Faso', '', 0, '', 0, NULL, '00:00:00'),
(6, 1, 'Burundi', '', 0, '', 0, NULL, '00:00:00'),
(7, 1, 'Cameroon', '', 0, '', 0, NULL, '00:00:00'),
(8, 1, 'Cape Verde', '', 0, '', 0, NULL, '00:00:00'),
(9, 1, 'Central African Republic', '', 0, '', 0, NULL, '00:00:00'),
(10, 1, 'Chad', '', 0, '', 0, NULL, '00:00:00'),
(11, 1, 'Comoros', '', 10000, '', 0, '2007-10-26 00:00:00', '00:00:00'),
(12, 1, 'Cote d-Ivoire', '', 0, '', 0, NULL, '00:00:00'),
(13, 1, 'Democratic Republic of the Congo', '', 0, '', 0, NULL, '00:00:00'),
(14, 1, 'Djibouti', '', 0, '', 0, NULL, '00:00:00'),
(16, 1, 'Equatorial Guinea', '', 0, '', 0, NULL, '00:00:00'),
(17, 1, 'Eritrea', '', 0, '', 0, NULL, '00:00:00'),
(18, 1, 'Ethiopia', '', 0, '', 0, NULL, '00:00:00'),
(19, 1, 'Gabon', '', 0, '', 0, NULL, '00:00:00'),
(20, 1, 'Gambia', '', 0, '', 0, NULL, '00:00:00'),
(21, 1, 'Ghana', '', 0, '', 0, NULL, '00:00:00'),
(22, 1, 'Guinea', '', 0, '', 0, NULL, '00:00:00'),
(23, 1, 'Guinea-Bissau', '', 0, '', 0, NULL, '00:00:00'),
(24, 1, 'Kenya', '', 0, '', 0, NULL, '00:00:00'),
(25, 1, 'Lesotho', '', 0, '', 0, NULL, '00:00:00'),
(26, 1, 'Liberia', '', 0, '', 0, NULL, '00:00:00'),
(27, 1, 'Libya', '', 0, '', 0, NULL, '00:00:00'),
(28, 1, 'Madagascar', '', 0, '', 0, NULL, '00:00:00'),
(29, 1, 'Malawi', '', 0, '', 0, NULL, '00:00:00'),
(54, 1, 'Mali', '', 0, '', 0, NULL, '00:00:00'),
(67, 1, 'Sierra Leone', '', 0, '', 0, NULL, '00:00:00'),
(68, 1, 'Somalia', '', 0, '', 0, NULL, '00:00:00'),
(66, 1, 'Seychelles', '', 0, '', 0, NULL, '00:00:00'),
(65, 1, 'Senegal', '', 0, '', 0, NULL, '00:00:00'),
(55, 1, 'Mauritania', '', 0, '', 0, NULL, '00:00:00'),
(56, 1, 'Mauritius', '', 0, '', 0, NULL, '00:00:00'),
(57, 1, 'Morocco', '', 0, '', 0, NULL, '00:00:00'),
(58, 1, 'Mozambique', '', 0, '', 0, NULL, '00:00:00'),
(59, 1, 'Namibia', '', 0, '', 0, NULL, '00:00:00'),
(60, 1, 'Niger', '', 0, '', 0, NULL, '00:00:00'),
(61, 1, 'Nigeria', '', 0, '', 0, NULL, '00:00:00'),
(62, 1, 'Republic of the Congo', '', 0, '', 0, NULL, '00:00:00'),
(63, 1, 'Rwanda', '', 0, '', 0, NULL, '00:00:00'),
(64, 1, 'Sao Tome and Principe', '', 0, '', 0, NULL, '00:00:00'),
(69, 1, 'South Africa', '', 0, '', 0, NULL, '00:00:00'),
(70, 1, 'Sudan', '', 0, '', 0, NULL, '00:00:00'),
(71, 1, 'Swaziland', '', 0, '', 0, NULL, '00:00:00'),
(72, 1, 'Tanzania', '', 0, '', 0, NULL, '00:00:00'),
(73, 1, 'Togo', '', 0, '', 0, NULL, '00:00:00'),
(74, 1, 'Tunisia', '', 0, '', 0, NULL, '00:00:00'),
(75, 1, 'Uganda', '', 0, 'bcs_vision_hero710x200.jpg', 0, NULL, '00:00:00'),
(76, 1, 'Western Sahara', '', 0, '', 0, NULL, '00:00:00'),
(77, 1, 'Zambia', '', 0, '', 0, NULL, '00:00:00'),
(78, 1, 'Zimbabwe', '', 0, '', 0, NULL, '00:00:00'),
(80, 2, 'Bangladesh', '', 0, '', 0, NULL, '00:00:00'),
(81, 2, 'Bhutan', '', 0, '', 0, NULL, '00:00:00'),
(82, 2, 'Brunei', '', 0, '', 0, NULL, '00:00:00'),
(83, 2, 'Cambodia', '', 0, '', 0, NULL, '00:00:00'),
(84, 2, 'China', '', 0, '', 0, NULL, '00:00:00'),
(85, 2, 'Hong Kong', '', 0, '', 0, NULL, '00:00:00'),
(86, 2, 'India', '', 0, '', 0, NULL, '00:00:00'),
(87, 2, 'Indonesia', '', 0, '', 0, NULL, '00:00:00'),
(88, 2, 'Japan', '', 0, '', 0, NULL, '00:00:00'),
(89, 2, 'Kazakhstan', '', 0, '', 0, NULL, '00:00:00'),
(90, 2, 'Laos', '', 0, '', 0, NULL, '00:00:00'),
(91, 2, 'Macao', '', 0, '', 0, NULL, '00:00:00'),
(92, 2, 'Malaysia', '', 0, '', 0, NULL, '00:00:00'),
(93, 2, 'Maldives', '', 0, '', 0, NULL, '00:00:00'),
(94, 2, 'Mongolia', '', 0, '', 0, NULL, '00:00:00'),
(95, 2, 'Myanmar', '', 0, '', 0, NULL, '00:00:00'),
(96, 2, 'Nepal', '', 0, '', 0, NULL, '00:00:00'),
(97, 2, 'North Korea', '', 0, '', 0, NULL, '00:00:00'),
(98, 2, 'Pakistan', '', 0, '', 0, NULL, '00:00:00'),
(99, 2, 'Philippines', '', 0, '', 0, NULL, '00:00:00'),
(100, 2, 'Singapore', '', 0, '', 0, NULL, '00:00:00'),
(101, 2, 'South Korea', '', 0, '', 0, NULL, '00:00:00'),
(102, 2, 'Sri Lanka', '', 0, '', 0, NULL, '00:00:00'),
(103, 2, 'Taiwan', '', 0, '', 0, NULL, '00:00:00'),
(104, 2, 'Tajikistan', '', 0, '', 0, NULL, '00:00:00'),
(105, 2, 'Thailand', '', 0, '', 0, NULL, '00:00:00'),
(106, 2, 'Vietnam', '', 0, '', 0, NULL, '00:00:00'),
(108, 3, 'Antigua', '', 0, '', 0, NULL, '00:00:00'),
(109, 3, 'Bahamas', '', 0, '', 0, NULL, '00:00:00'),
(110, 3, 'Barbados', '', 0, '', 0, NULL, '00:00:00'),
(111, 3, 'Dominica', '', 0, '', 0, NULL, '00:00:00'),
(112, 3, 'Grenada', '', 0, '', 0, NULL, '00:00:00'),
(113, 3, 'St.Kitts & Nevis', '', 0, '', 0, NULL, '00:00:00'),
(114, 3, 'St.Lucia', '', 0, '', 0, NULL, '00:00:00'),
(115, 3, 'St.Vincent & the Grenadines', '', 0, '', 0, NULL, '00:00:00'),
(116, 3, 'Trinidad & Tobago', '', 0, '', 0, NULL, '00:00:00'),
(118, 4, 'Andorra', 'test', 0, 'PortableApps.comInstaller.bmp', 0, '2007-09-21 16:34:54', '00:00:00'),
(119, 4, 'Armenia', '', 0, '', 0, NULL, '00:00:00'),
(120, 4, 'Austria', '', 0, '', 0, NULL, '00:00:00'),
(121, 4, 'Azerbaijan', '', 0, '', 0, NULL, '00:00:00'),
(122, 4, 'Belarus', '', 0, '', 0, NULL, '00:00:00'),
(123, 4, 'Belgium', '', 0, '', 0, NULL, '00:00:00'),
(124, 4, 'Bosnia and Herzegovina', '', 0, '17968452.jpg', 0, NULL, '00:00:00'),
(125, 4, 'Bulgaria', '', 0, '', 0, NULL, '00:00:00'),
(126, 4, 'Croatia', '', 0, '', 0, NULL, '00:00:00'),
(127, 4, 'Czech Republic', '', 0, '', 0, NULL, '00:00:00'),
(128, 4, 'Denmark', '', 0, '', 0, NULL, '00:00:00'),
(129, 4, 'Estonia', '', 0, '', 0, NULL, '00:00:00'),
(130, 4, 'Finland', '', 0, '', 0, NULL, '00:00:00'),
(131, 4, 'France', '', 0, '', 0, NULL, '00:00:00'),
(132, 4, 'Georgia', '', 0, '', 0, NULL, '00:00:00'),
(133, 4, 'Germany', '', 0, '', 0, NULL, '00:00:00'),
(134, 4, 'Greece', '', 0, '', 0, NULL, '00:00:00'),
(135, 4, 'Hungary', '', 0, '', 0, NULL, '00:00:00'),
(136, 4, 'Iceland', '', 0, '', 0, NULL, '00:00:00'),
(137, 4, 'Ireland', '', 0, '', 0, NULL, '00:00:00'),
(138, 4, 'Italy', '', 0, '', 0, NULL, '00:00:00'),
(139, 4, 'Latvia', '', 0, '', 0, NULL, '00:00:00'),
(140, 4, 'Liechtenstein', '', 0, '', 0, NULL, '00:00:00'),
(141, 4, 'Lithuania', '', 0, '', 0, NULL, '00:00:00'),
(142, 4, 'Luxembourg', '', 0, '', 0, NULL, '00:00:00'),
(143, 4, 'Macedonia', '', 0, '', 0, NULL, '00:00:00'),
(144, 4, 'Malta', '', 0, '', 0, NULL, '00:00:00'),
(145, 4, 'Moldova', '', 0, '', 0, NULL, '00:00:00'),
(146, 4, 'Monaco', '', 0, '', 0, NULL, '00:00:00'),
(147, 4, 'Netherlands', '', 0, '', 0, NULL, '00:00:00'),
(148, 4, 'Norway', '', 0, '', 0, NULL, '00:00:00'),
(149, 4, 'Poland', '', 0, '', 0, NULL, '00:00:00'),
(150, 4, 'Portugal', '', 0, '', 0, NULL, '00:00:00'),
(151, 4, 'Romania', '', 0, '', 0, NULL, '00:00:00'),
(152, 4, 'Russian Federation', '', 0, '', 0, NULL, '00:00:00'),
(153, 4, 'San Marino', '', 0, '', 0, NULL, '00:00:00'),
(154, 4, 'Slovakia', '', 0, '', 0, NULL, '00:00:00'),
(155, 4, 'Slovenia', '', 0, '', 0, NULL, '00:00:00'),
(156, 4, 'Spain', '', 0, '', 0, NULL, '00:00:00'),
(157, 4, 'Sweden', '', 0, '', 0, NULL, '00:00:00'),
(158, 4, 'Switzerland', '', 0, '', 0, NULL, '00:00:00'),
(159, 4, 'Turkey', '', 0, '', 0, NULL, '00:00:00'),
(160, 4, 'Ukraine', '', 0, '', 0, NULL, '00:00:00'),
(161, 4, 'United Kingdom', '', 0, '', 0, NULL, '00:00:00'),
(162, 4, 'Yugoslavia', '', 0, '', 0, NULL, '00:00:00'),
(163, 5, 'Bahrain', '', 0, '', 0, NULL, '00:00:00'),
(164, 5, 'Cyprus', '', 0, '', 0, NULL, '00:00:00'),
(165, 5, 'Egypt', '', 0, '', 0, NULL, '00:00:00'),
(166, 5, 'Iran', '', 0, '', 0, NULL, '00:00:00'),
(167, 5, 'Iraq', '', 0, '', 0, NULL, '00:00:00'),
(168, 5, 'Israel', '', 0, '', 0, NULL, '00:00:00'),
(169, 5, 'Jordan', '', 0, '', 0, NULL, '00:00:00'),
(170, 5, 'Kuwait', '', 0, '', 0, NULL, '00:00:00'),
(171, 5, 'Lebanon', '', 0, '', 0, NULL, '00:00:00'),
(172, 5, 'Oman', '', 0, '', 0, NULL, '00:00:00'),
(173, 5, 'Qatar', 'test test test', 0, '', 0, '2007-02-02 00:00:00', '00:00:00'),
(174, 5, 'Saudi Arabia', '', 0, '', 0, NULL, '00:00:00'),
(175, 5, 'Syria', '', 0, '', 0, NULL, '00:00:00'),
(176, 5, 'Turkey', '', 0, '', 0, NULL, '00:00:00'),
(177, 5, 'United Arab Emirates', '', 0, '', 0, NULL, '00:00:00'),
(178, 5, 'Yemen', '', 0, '', 0, NULL, '00:00:00'),
(179, 6, 'Belize', '', 0, '', 0, NULL, '00:00:00'),
(180, 6, 'Canada', '', 0, '', 0, NULL, '00:00:00'),
(181, 6, 'Costa Rica', '', 0, '', 0, NULL, '00:00:00'),
(182, 6, 'Cuba', '', 0, '', 0, NULL, '00:00:00'),
(183, 6, 'Dominican Republic', '', 0, '', 0, NULL, '00:00:00'),
(184, 6, 'El Salvador', '', 0, '', 0, NULL, '00:00:00'),
(185, 6, 'Guatemala', '', 0, '', 0, NULL, '00:00:00'),
(186, 6, 'Haiti', '', 0, '', 0, NULL, '00:00:00'),
(195, 6, 'Nicaragua', '', 0, '', 0, NULL, '00:00:00'),
(192, 6, 'Honduras', '', 0, '', 0, NULL, '00:00:00'),
(193, 6, 'Jamaica', '', 0, '', 0, NULL, '00:00:00'),
(194, 6, 'Mexico', '', 0, '', 0, NULL, '00:00:00'),
(196, 6, 'Panama', '', 0, '', 0, NULL, '00:00:00'),
(197, 6, 'United States of America', '', 0, '', 0, NULL, '00:00:00'),
(198, 7, 'Australia', '', 0, '', 0, NULL, '00:00:00'),
(199, 7, 'Federated States of Micronesia', '', 0, '', 0, NULL, '00:00:00'),
(200, 7, 'Fiji', '', 0, '', 0, NULL, '00:00:00'),
(201, 7, 'Kiribati', '', 0, '', 0, NULL, '00:00:00'),
(202, 7, 'Marshall Islands', '', 0, '', 0, NULL, '00:00:00'),
(203, 7, 'Nauru', '', 0, '', 0, NULL, '00:00:00'),
(204, 7, 'New Zealand', '', 0, '', 0, NULL, '00:00:00'),
(205, 7, 'Palau', '', 0, '', 0, NULL, '00:00:00'),
(206, 7, 'Papua New Guinea', '', 0, '', 0, NULL, '00:00:00'),
(207, 7, 'Samoa', '', 0, '', 0, NULL, '00:00:00'),
(208, 7, 'Solomon Islands', '', 0, '', 0, NULL, '00:00:00'),
(209, 7, 'Tonga', '', 0, '', 0, NULL, '00:00:00'),
(210, 7, 'Tuvalu', '', 0, '', 0, NULL, '00:00:00'),
(211, 7, 'Vanuatu', '', 0, '', 0, NULL, '00:00:00'),
(212, 8, 'Argentina', '', 0, '', 0, NULL, '00:00:00'),
(213, 8, 'Bolivia', '', 0, '', 0, NULL, '00:00:00'),
(214, 8, 'Brazil', '', 0, '', 0, NULL, '00:00:00'),
(215, 8, 'Chile', '', 0, '', 0, NULL, '00:00:00'),
(216, 8, 'Colombia', '', 0, '', 0, NULL, '00:00:00'),
(217, 8, 'Ecuador', '', 0, 'winxp.gif', 0, NULL, '00:00:00'),
(218, 8, 'French Guiana', '', 0, '', 0, NULL, '00:00:00'),
(219, 8, 'Guyana', 'ryry', 10000, '', 0, '2007-09-21 00:00:00', '00:00:00'),
(220, 8, 'Paraguay', '', 10000, '01.jpg', 0, '2007-09-21 00:00:00', '00:00:00'),
(222, 8, 'Suriname', '', 10000, '', 0, '2007-09-21 00:00:00', '00:00:00'),
(223, 8, 'Urugvay', '', 250000, 'Sample.jpg', 1, '2007-09-21 00:00:00', '00:00:00'),
(226, 9, 'Antarctica', 'Donec neque mauris.', 10000, '', 0, '2007-02-21 00:00:00', '00:00:00'),
(227, 9, 'Arctic', 'Lorem ipsum dolor.', 10000, '', 0, '2007-10-02 00:00:00', '12:13:00');

-- --------------------------------------------------------

--
-- Table structure for table `demo_democracy`
--

CREATE TABLE IF NOT EXISTS `demo_democracy` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `description` varchar(20) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `demo_democracy`
--

INSERT INTO `demo_democracy` (`id`, `description`) VALUES
(1, 'Yes'),
(2, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `demo_presidents`
--

CREATE TABLE IF NOT EXISTS `demo_presidents` (
  `id` int(11) NOT NULL auto_increment,
  `country_id` int(11) unsigned NOT NULL default '0',
  `name` varchar(50) default NULL,
  `birth_date` date default NULL,
  `status` enum('Candidate','Vice','Current') default 'Candidate',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `demo_presidents`
--

INSERT INTO `demo_presidents` (`id`, `country_id`, `name`, `birth_date`, `status`) VALUES
(1, 1, 'Mombo', '1995-02-14', 'Candidate'),
(2, 2, 'Rombo', '1965-11-08', 'Candidate'),
(3, 173, 'mr. Portos', '2007-02-23', 'Candidate'),
(5, 160, 'Kuchma', '2007-02-06', 'Vice'),
(6, 227, 'Rondo', '1952-02-14', 'Candidate'),
(7, 225, 'Poro', '2007-02-19', 'Candidate');

-- --------------------------------------------------------

--
-- Table structure for table `demo_products`
--

CREATE TABLE IF NOT EXISTS `demo_products` (
  `id` int(11) NOT NULL auto_increment,
  `supplier_id` tinyint(3) NOT NULL,
  `name` varchar(125) NOT NULL,
  `short_description` varchar(255) NOT NULL,
  `long_description` text NOT NULL,
  `image_thumb` varchar(50) NOT NULL,
  `image_big` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL default '0.00',
  `date_added` datetime NOT NULL,
  `last_updated` datetime NOT NULL,
  `available_from` datetime NOT NULL,
  `statistics` smallint(6) NOT NULL default '0',
  `subscribe` tinyint(1) NOT NULL default '0',
  `is_featured` enum('No','Yes') NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `demo_products`
--

INSERT INTO `demo_products` (`id`, `supplier_id`, `name`, `short_description`, `long_description`, `image_thumb`, `image_big`, `price`, `date_added`, `last_updated`, `available_from`, `statistics`, `subscribe`, `is_featured`) VALUES
(3, 3, 'Ligth-Box XRT-345', 'Duis a sapien. Integer quis lorem. Nam varius leo in eros. Nullam urna felis, eleifend sed, ornare id, rutrum quis, mauris. Pellentesque sodales. Vivamus fringilla. Sed pulvinar', '<P>Duis a sapien. Integer quis lorem. Nam varius leo in eros. Nullam urna felis, eleifend sed, ornare id, rutrum quis, mauris. Pellentesque sodales. Vivamus fringilla. Sed pulvinar. Morbi sagittis dapibus diam. Sed euismod, nibh quis tincidunt lobortis, magna turpis dictum mi, scelerisque molestie dui felis non turpis. Curabitur sollicitudin erat vel erat. Nulla lacinia dolor vel lectus. Sed lacinia tincidunt orci. Sed vel tellus. Vestibulum consequat elit accumsan orci. Mauris ac dolor a mauris consectetur blandit. In blandit, massa vitae bibendum convallis, ante tellus lobortis nunc, a aliquet tortor velit quis nulla. In non ipsum sed nunc dapibus tristique. Sed est erat, mollis eget, tincidunt at, sagittis eu, velit. Praesent porta diam ac urna. Donec lectus enim, pellentesque et, lobortis nec, lacinia vitae, neque. </P>', 'img_t5y9oy3o3d.jpg', 'img_wkq7vm5gjp.jpg', '125.90', '2008-12-06 01:30:37', '2008-12-06 01:30:37', '2008-12-06 01:30:37', 26, 0, 'No'),
(2, 4, 'Model X-234VT', 'Curabitur consequat lobortis diam. Vivamus non quam. Mauris eu erat. Quisque hendrerit, dui vel dapibus ultrices, nunc nulla egestas nulla, id gravida lectus dui ut felis. Phasellus pretium.', '<P>Curabitur consequat lobortis diam. Vivamus non quam. Mauris eu erat. Quisque hendrerit, dui vel dapibus ultrices, nunc nulla egestas nulla, id gravida lectus dui ut felis. Phasellus pretium. Cras tellus. Mauris cursus mauris ut sem. Aenean non est. Nullam at ante at mi adipiscing pulvinar. Cras risus dolor, rutrum ac, feugiat eu, tempus id, magna. Ut nec neque vitae eros porttitor tempus. Quisque varius tincidunt urna. Duis vulputate, tellus vitae rutrum eleifend, nisi mauris pretium urna, eleifend scelerisque dui ipsum et elit. In enim lacus, consequat a, egestas vel, rutrum et, nulla. Nullam tincidunt velit ac magna. Curabitur est leo, blandit ac, sodales aliquam, vestibulum nec, tortor. Nulla tempus mauris ut sem. Maecenas laoreet sodales purus. </P>', 'img_2.jpg', 'img_kstaapr6fc.jpg', '99.99', '2009-01-03 01:35:00', '2008-12-06 01:35:00', '2008-12-06 01:35:00', 95, 1, 'Yes'),
(4, 1, 'WTS: Nopoa N95 (8GB)', 'Aenean dignissim porttitor urna. Sed malesuada, odio non pulvinar lobortis, arcu eros consequat arcu, et sodales leo libero in lectus. In lacus ligula, convallis sit amet, tristique a, varius id, neque.', '<P>Aenean dignissim porttitor urna. Sed malesuada, odio non pulvinar lobortis, arcu eros consequat arcu, et sodales leo libero in lectus. In lacus ligula, convallis sit amet, tristique a, varius id, neque. Morbi quis enim. Morbi ipsum ipsum, congue et, consectetur viverra, blandit eu, mi. Etiam feugiat sem auctor magna. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris quis lacus blandit erat bibendum elementum. Nulla facilisi. Etiam ac eros. Mauris malesuada, turpis nec tempor gravida, orci erat laoreet velit, non pretium enim velit ac metus. Vivamus congue, nulla sed facilisis interdum, sapien dui vehicula erat, sit amet auctor lacus ipsum eget metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Phasellus sem velit, suscipit in, pretium sed, dapibus ut, risus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Integer eget dui. Pellentesque volutpat rhoncus nunc. Sed tristique justo at felis. Nam consequat placerat massa. </P>', 'img_nnk9tfkl3q.jpg', 'img_hntijyk1rb.gif', '319.00', '2008-11-06 01:37:15', '2008-12-06 01:37:15', '2009-01-02 01:37:15', 33, 0, 'No'),
(5, 5, 'XPERIA X1,HTC', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris adipiscing lacus ac odio. Nulla facilisi.', '<P>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris adipiscing lacus ac odio. Nulla facilisi. Morbi pretium, nibh vitae convallis hendrerit, orci mi auctor tortor, vel sollicitudin nibh lectus pharetra turpis. Praesent vitae ante a pede congue dictum. Curabitur placerat, urna vel mattis sollicitudin, magna augue venenatis orci, et euismod diam neque eget quam. Proin vitae odio. Quisque vel eros nec mi porttitor hendrerit. Suspendisse a urna. Mauris in est. Quisque viverra velit ullamcorper elit. Donec rhoncus mi vel urna convallis auctor. Integer faucibus lectus in magna. Integer commodo, est nec auctor iaculis, ligula urna rutrum augue, non congue mi risus tincidunt pede. Aliquam erat volutpat. Proin quis dui. Aliquam erat volutpat. Curabitur leo mauris, sodales sed, aliquet id, laoreet ac, sem. Integer aliquam, est ut scelerisque pharetra, justo lorem feugiat odio, vel tempus massa diam et lectus. Nullam consequat ligula in erat. Proin lacinia euismod lacus. </P>', 'img_ndbyh2yp4x.jpg', 'img_bbn6o7tdnv.jpg', '289.00', '2008-12-06 01:38:35', '2008-12-06 01:38:35', '2008-12-31 01:38:35', 47, 0, 'No'),
(6, 7, 'iPod Video.KIA', 'Integer hendrerit gravida sem. Nullam molestie felis eu sapien. Ut luctus est. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.', '<P>Integer hendrerit gravida sem. Nullam molestie felis eu sapien. Ut luctus est. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nullam diam metus, feugiat ac, sodales a, tincidunt sed, mauris. Nunc fermentum odio sed enim. Pellentesque elementum massa tincidunt urna. Fusce pellentesque. Maecenas fringilla tempus risus. Suspendisse sit amet arcu. Ut fringilla, diam et fermentum ornare, neque elit elementum felis, in luctus lectus nisi sit amet lorem. Nulla pretium tincidunt lectus. </P>', 'img_qjztlykao2.jpg', 'img_nn65p17hnm.jpg', '344.00', '2008-12-06 01:28:40', '2008-12-06 01:28:40', '2007-09-27 21:00:00', 16, 0, 'No'),
(7, 8, 'XPERT-345', 'Duis quis nunc. Vestibulum tortor lectus, dignissim et, ultricies in, tempus ac, libero.', '<P>Duis quis nunc. Vestibulum tortor lectus, dignissim et, ultricies in, tempus ac, libero. Maecenas urna justo, placerat vitae, pellentesque sit amet, ultrices et, dolor. In posuere quam in risus. Pellentesque at tortor vitae lectus mollis vestibulum. Aenean orci metus, bibendum a, pretium non, sagittis id, nulla. Vivamus vitae risus. Vivamus risus ipsum, scelerisque at, mattis ac, sollicitudin vel, mauris. Phasellus feugiat est id erat. Sed sed tellus sit amet magna auctor congue. Vivamus et mi sed eros laoreet laoreet. Aliquam et risus quis erat condimentum sagittis. Vestibulum congue tempus tortor. Mauris fermentum commodo risus. </P>', 'img_l1ogmx3t9n.jpg', 'img_y5livbdsdi.jpg', '230.00', '2008-12-06 01:39:13', '2008-12-06 01:39:13', '2008-07-16 01:39:13', 98, 0, 'No'),
(8, 6, 'Rondo-Nint VT46', 'Duis non arcu. Sed interdum nisi sit amet massa. Fusce dolor quam, rhoncus a, porta id, mattis id, nisi.', '<P>Duis non arcu. Sed interdum nisi sit amet massa. Fusce dolor quam, rhoncus a, porta id, mattis id, nisi. Nunc at neque id nulla pharetra imperdiet. Nullam a lorem. Proin ut lorem sed libero sollicitudin pulvinar. Vivamus imperdiet. Mauris odio. Suspendisse est metus, ornare et, pretium nec, commodo ut, tortor. Aenean sed velit a turpis iaculis vestibulum. </P>', 'img_m1mc3tb4il.jpg', 'img_jpu0tpk508.jpg', '175.00', '2008-12-06 01:38:51', '2008-12-06 01:38:51', '2010-05-30 01:38:51', 7, 0, 'No'),
(9, 8, 'OPAL-XRT44', 'Proin arcu. Nam tempus enim sed mauris. Quisque magna. Sed hendrerit erat in leo. Nulla in mi.', '<P>Proin arcu. Nam tempus enim sed mauris. Quisque magna. Sed hendrerit erat in leo. Nulla in mi. Quisque in sem. Praesent lobortis cursus nisi. Maecenas mattis. Aliquam rhoncus dictum lacus. Maecenas turpis. Mauris tincidunt consequat sapien. Sed ornare orci at pede. Sed a risus sit amet elit interdum viverra. </P>', 'img_avnxlcjm96.jpg', 'img_n2xpeyh0vv.jpg', '155.00', '2009-01-26 01:35:23', '2008-12-06 01:35:23', '2008-12-06 01:35:23', 82, 0, 'No'),
(10, 3, 'Mario-S X43', 'Pellentesque egestas blandit mauris. Donec luctus augue quis massa. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nunc imperdiet.', '<P>Pellentesque egestas blandit mauris. Donec luctus augue quis massa. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nunc imperdiet. Donec porta, mauris non fermentum rutrum, metus ipsum suscipit enim, in cursus tortor nunc sed metus. Donec justo erat, consequat at, congue quis, congue non, lorem. Fusce libero. Nulla justo velit, sodales vel, varius eget, volutpat ac, est. Morbi mattis. Pellentesque lobortis, magna a cursus malesuada, felis turpis porttitor sem, sed hendrerit enim augue quis purus. Vivamus porttitor, libero sit amet elementum facilisis, lectus quam feugiat elit, lobortis suscipit libero augue sed orci. </P>', 'img_kr6z08gg71.jpg', 'img_hxjwu8ghda.jpg', '233.50', '2008-12-13 01:34:40', '2008-12-06 01:34:40', '2008-12-06 01:34:40', 53, 0, 'No'),
(11, 5, 'PalmoRR-32', 'Quisque nisi risus, fermentum non, venenatis fringilla, mollis vel, dolor. Nam quam neque, pellentesque non, lacinia imperdiet, rhoncus id, libero. Morbi dui.', '<P>Quisque nisi risus, fermentum non, venenatis fringilla, mollis vel, dolor. Nam quam neque, pellentesque non, lacinia imperdiet, rhoncus id, libero. Morbi dui. Sed consequat, massa sit amet pharetra aliquet, libero tortor facilisis quam, id iaculis ante nulla eu nisi. Fusce placerat. Ut suscipit suscipit purus. Duis dolor tellus, tempus et, mollis eu, aliquam accumsan, est. Phasellus odio. Duis elementum mollis orci. Cras fringilla ante non est. Nam ornare feugiat mauris. </P>', 'img_sabyctzf0a.jpg', 'img_ytlxwdr27d.jpg', '82.50', '2008-12-06 01:36:19', '2008-12-06 01:36:19', '2008-12-06 01:36:19', 65, 0, 'No'),
(12, 4, 'TornadoXZ-3', 'Donec elementum varius purus. Fusce tempor massa et sapien aliquet pretium.', '<P>Donec elementum varius purus. Fusce tempor massa et sapien aliquet pretium. Aenean magna ipsum, molestie non, blandit at, blandit quis, enim. Suspendisse dolor. Maecenas non risus. Duis auctor dolor non lectus interdum blandit. Sed varius aliquet arcu. In vitae augue in quam sollicitudin rhoncus. Proin sed mauris. Donec vulputate vestibulum nibh. Integer convallis, tortor id vehicula facilisis, sem dui eleifend massa, at tempus erat quam suscipit tellus. Morbi hendrerit. </P>', 'img_dfv86uru84.jpg', 'img_esgz4eky2s.jpg', '250.00', '2015-10-27 00:00:00', '2008-12-06 01:36:39', '2008-12-06 01:36:39', 52, 0, 'No'),
(13, 1, 'OrbitonCV-4', 'Quisque lectus velit, volutpat at, consequat quis, elementum eu, erat. Morbi ut diam. Fusce imperdiet. Suspendisse convallis pulvinar libero. Sed ut nunc. Etiam luctus', '<P>Quisque lectus velit, volutpat at, consequat quis, elementum eu, erat. Morbi ut diam. Fusce imperdiet. Suspendisse convallis pulvinar libero. Sed ut nunc. Etiam luctus. Vestibulum id eros. Sed accumsan, mi a tincidunt aliquam, eros magna mollis elit, quis sodales orci magna nec nulla. Sed tincidunt feugiat ante. Nullam posuere dui. Donec interdum, tellus placerat euismod suscipit, risus nulla commodo dolor, a porta pede nibh id nulla. Vivamus ipsum arcu, volutpat ac, volutpat vitae, scelerisque eu, ipsum. Maecenas sagittis luctus odio. In hac habitasse platea dictumst. Vestibulum dolor dolor, suscipit vitae, interdum sit amet, viverra sit amet, libero. In iaculis libero vitae velit. Mauris enim urna, ultricies nec, vehicula vel, posuere nec, neque. Cras arcu diam, fermentum ullamcorper, molestie sit amet, blandit sit amet, magna. Duis quis justo. </P>', 'img_gx056xce04.jpg', 'img_fikdao0lqz.jpg', '200.00', '2009-02-09 01:35:49', '2008-12-06 01:35:49', '2008-12-06 01:35:49', 72, 0, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `demo_regions`
--

CREATE TABLE IF NOT EXISTS `demo_regions` (
  `id` tinyint(3) unsigned NOT NULL auto_increment,
  `name` varchar(20) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `demo_regions`
--

INSERT INTO `demo_regions` (`id`, `name`) VALUES
(1, 'Africa'),
(2, 'Asia'),
(3, 'Caribbean'),
(4, 'Europe'),
(5, 'Middle East'),
(6, 'North America'),
(7, 'Oceania'),
(8, 'South America'),
(9, 'North & South Poles');

-- --------------------------------------------------------

--
-- Table structure for table `demo_suppliers`
--

CREATE TABLE IF NOT EXISTS `demo_suppliers` (
  `id` tinyint(3) NOT NULL auto_increment,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `demo_suppliers`
--

INSERT INTO `demo_suppliers` (`id`, `name`) VALUES
(1, 'Nokia'),
(2, 'Motorola'),
(3, 'Apple iPhone '),
(4, 'BenQ-Siemens'),
(5, 'Palm/palmOne'),
(6, 'Philips'),
(7, 'Sony Ericsson'),
(8, 'VK Mobile ');
