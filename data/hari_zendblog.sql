-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 16, 2009 at 07:46 PM
-- Server version: 5.1.37
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hari_zendblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `Description` varchar(300) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Email` varchar(250) NOT NULL,
  `Webpage` varchar(200) NOT NULL,
  `Postedon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `Description`, `Name`, `Email`, `Webpage`, `Postedon`) VALUES
(1, 1, 'Hello World comment also a hello world', 'Hari K T', 'test@example.com', 'http://harikt.com', '2009-08-27 12:33:05'),
(2, 1, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur,', 'Sarath Tomy', 'test@example.com', 'http://harikt.com', '2009-08-27 12:53:20'),
(3, 1, 'Contrary to popular belief, Lorem Ipsum is not simply random text. ', 'Sarath Tomy', 'test@example.com', 'http://harikt.com', '2009-08-27 12:53:47'),
(4, 1, 'My dummy comment', 'Dummy', 'test@example.com', 'http://harikt.com', '2009-08-27 14:53:25'),
(5, 1, 'My dummy comment', 'Dummy', 'test@example.com', 'http://harikt.com', '2009-08-27 14:54:05'),
(6, 1, 'Values are nice', 'Chris', 'test@example.com', 'http://harikt.com', '2009-08-27 14:55:30'),
(7, 1, 'Yes I am Mr Cool . ;)', 'Cool', 'test@example.com', 'http://harikt.com', '2009-08-27 15:09:26'),
(8, 1, 'Yes I am Mr Cool . ;)', 'Cool', 'test@example.com', 'http://harikt.com', '2009-08-27 15:15:59'),
(9, 1, 'Yes cool is my brother . But I am Mr cool not as cool as cool .', 'Mr Cool', 'test@example.com', 'http://harikt.com', '2009-08-27 15:20:26'),
(10, 1, 'Yes cool is my brother . But I am Mr cool not as cool as cool .', 'Mr Cool', 'test@example.com', 'http://harikt.com', '2009-08-27 15:21:18'),
(11, 1, 'Yes cool is my brother . But I am Mr cool not as cool as cool .', 'Mr Cool', 'test@example.com', 'http://harikt.com', '2009-08-27 15:22:38'),
(12, 1, 'Yes cool is my brother . But I am Mr cool not as cool as cool .', 'Mr Cool', 'test@example.com', 'http://harikt.com', '2009-08-27 15:23:50'),
(13, 1, 'Yes cool is my brother . But I am Mr cool not as cool as cool .\r\n\r\nNow I am rude ..', 'Mr Cool', 'test@example.com', 'http://harikt.com', '2009-08-27 15:24:35'),
(14, 1, 'Yes cool is my brother . But I am Mr cool not as cool as cool .\r\n\r\nNow I am rude ..\r\n\r\nFuck it man', 'Mr Cool', 'test@example.com', 'http://harikt.com', '2009-08-27 15:25:36'),
(15, 2, 'I am the first to post comments to this post .', 'Hari K T', 'test@example.com', 'http://harikt.com', '2009-08-27 15:38:08'),
(16, 2, 'I am simply Jack .', 'Jack', 'test@example.com', 'http://harikt.com', '2009-08-27 15:38:40'),
(17, 2, 'I am simply Jack .', 'Jack', 'test@example.com', 'http://harikt.com', '2009-08-27 15:40:03'),
(18, 3, 'Onam is a great and wonderful festival .', 'Sujith M S', 'test@example.com', 'http://harikt.com', '2009-08-27 15:40:43'),
(19, 4, 'I love X'' mas . We all get wonderful holidays in these days .', 'Ajith K D', 'test@example.com', 'http://harikt.com', '2009-08-27 15:41:43'),
(20, 3, 'Hello I am on leave for 2 days.\r\n\r\nThanks', 'Riyas K P', 'test@example.com', 'http://harikt.com', '2009-08-27 15:50:23'),
(21, 4, 'My Test', 'Your Name', 'test@example.com', 'http://harikt.com', '2009-08-27 15:59:25'),
(22, 5, 'Wow cool man . This is what I love.', 'Martin K Abraham', 'test@example.com', 'http://harikt.com', '2009-08-27 17:54:42'),
(23, 8, 'Lorem Ipsum is a dummy text .', 'Lorem Ipsum', 'test@example.com', 'http://harikt.com', '2009-08-28 09:15:19'),
(24, 7, 'We need dummy text :)', 'Hari K T', 'test@example.com', 'http://harikt.com', '2009-08-28 09:15:58'),
(25, 9, 'This is a great comment .\r\n\r\nI love this blog tutorial .\r\n\r\nThanks\r\n\r\nHari K T', 'Blogger', 'test@example.com', 'http://harikt.com', '2009-09-11 15:50:35');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(250) NOT NULL,
  `Description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `Title`, `Description`) VALUES
(1, 'Hello World', '<p>Hello World my first post . </p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>'),
(2, 'The next world', 'Yes next world is the next post after hello world'),
(3, 'Onam Celebration', 'Yes onam is here and we are about to celebrate this onam. \r\nCool'),
(4, 'Xmas is coming', 'Cool guys .'),
(9, 'Test can be updated', 'That''s great . I too love to update the test . \r\nCool .\r\nYes I am learning . \r\nNow Happy after implementing one . :)\r\nWow cool man you are a hard worker'),
(5, 'Where can I get some', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.'),
(6, 'Where does it comes from ?', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.\r\nWhere can I get some?\r\n\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.\r\n	\r\n	paragraphs\r\n	words\r\n	bytes\r\n	lists\r\n	\r\nStart with ''Lorem\r\nipsum dolor sit amet...'''),
(7, 'Why do we use it ?', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).'),
(8, 'What is Lorem Ipsum ?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(200) NOT NULL,
  `Password` varchar(250) NOT NULL,
  `Role` varchar(10) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Email` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Username`, `Password`, `Role`, `Name`, `Email`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin', 'Administrator', ''),
(2, 'user', 'e10adc3949ba59abbe56e057f20f883e', 'user', '', ''),
(3, 'blogger', 'e10adc3949ba59abbe56e057f20f883e', 'blogger', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
