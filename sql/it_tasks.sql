-- phpMyAdmin SQL Dump
-- version 3.5.3
-- http://www.phpmyadmin.net
--
-- Host: localhost:8080
-- Generation Time: Nov 14, 2012 at 01:59 PM
-- Server version: 5.5.28-0ubuntu0.12.04.2
-- PHP Version: 5.3.10-1ubuntu3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `work_alloc`
--

-- --------------------------------------------------------

--
-- Table structure for table `it_tasks`
--

CREATE TABLE IF NOT EXISTS `it_tasks` (
  `t_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_id` int(11) NOT NULL,
  `t_title` varchar(255) NOT NULL,
  `t_desc` text NOT NULL,
  `t_priority` int(11) NOT NULL,
  `t_due` varchar(10) NOT NULL,
  `t_comp` varchar(10) NOT NULL,
  `t_status` varchar(255) NOT NULL,
  `t_comments` text NOT NULL,
  `t_set_by` varchar(255) NOT NULL,
  `t_week_com` varchar(10) NOT NULL,
  PRIMARY KEY (`t_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `tasks`
--

INSERT INTO `it_tasks` (`t_id`, `u_id`, `t_title`, `t_desc`, `t_priority`, `t_due`, `t_comp`, `t_status`, `t_comments`, `t_set_by`, `t_week_com`) VALUES
(1, 1, 'Jamie Oliver amends', 'Amends for the Jamie Oliver campaign ', 0, '27/10/2012', '23/10/2012', 'Complete', '', 'Claire Sutton', '22/10/2012'),
(2, 1, 'Mobile re-direct fix', 'Fix the redirects on the mobile pages from Stu', 0, '22/10/2012', '22/10/2012', 'Complete', '', 'Stuart Clarke', '22/10/2012'),
(3, 1, 'Mobile loading page', 'Loading page for mobile app', 0, '27/10/2012', '22/10/2012', 'Complete', '', 'Alicia Howard', '22/10/2012'),
(4, 1, 'Wellwoman - Contact us', 'To cover for Matt''s holiday week', 0, '27/10/2012', '27/10/2012', 'Complete', 'Amends sent back to Matt on the 29/10/2012', 'Tamsin Boarland', '22/10/2012'),
(5, 1, 'Wellwoman - Product information', 'To cover for Matt''s holiday week', 0, '27/10/2012', '27/10/2012', 'Complete', 'Sent back to Matt on the 29/10/2012', 'Tamsin Boarland', '22/10/2012'),
(6, 1, 'Wellwoman - Emotional support', 'To cover for Matt''s week holiday', 0, '27/10/2012', '27/10/2012', 'Complete', '', 'Tamsin Boarland', '22/10/2012'),
(7, 1, 'Wellwoman - FAQ', 'To cover for Matt''s week off ', 0, '27/10/2012', '27/10/2012', 'Complete', '', 'Tamsin Boarland', '22/10/2012'),
(8, 1, 'Wellwoman - Testimonials', 'To cover for Matt''s holiday week', 0, '27/10/2012', '27/10/2012', 'Complete', '', 'Tamsin Boarland', '22/10/2012'),
(9, 1, 'Endecca - Travel health link', 'Change the travel health link in supermenu', 0, '27/10/2012', '22/10/2012', 'Complete', '', 'Ken Scott', '22/10/2012'),
(10, 1, 'Testing batch 1', '', 0, '27/10/2012', '25/10/2012', 'Complete', '', 'Dee Truong', '22/10/2012'),
(11, 1, 'Health & Beauty - Get the cover look', '', 0, '27/10/2012', '26/10/2012', 'Complete', '', 'Sukhi Kang', '22/10/2012'),
(12, 1, 'Health & Beauty - Editors letter', '', 0, '27/10/2012', '26/10/2012', 'Complete', '', 'Sukhi Kang', '22/10/2012'),
(13, 1, 'Health & Beauty - Competition', '', 0, '27/10/2012', '26/10/2012', 'Complete', '', 'Sukhi Kang', '22/10/2012'),
(14, 1, 'E-mail Kerry Lee about bootsbeauty.co.uk', '', 0, '27/10/2012', '24/10/2012', 'Complete', '', 'Sarah McGuinness', '22/10/2012'),
(15, 1, 'Christmas fragrance video page', '', 0, '02/11/2012', '25/10/2012', 'Complete', '', 'Stuart Clarke', '22/10/2012'),
(16, 1, 'Beauty Blog - Tuesday for Wednesday', '', 0, '23/10/2012', '23/10/2012', 'Complete', '', 'Laura Armstrong', '22/10/2012'),
(17, 1, 'Beauty Blog - Wednesday for Thursday', '', 0, '24/10/2012', '24/10/2012', 'Complete', '', 'Emile Poole', '22/10/2012'),
(18, 1, 'Beauty Blog - Thursday for Friday', '', 0, '25/10/2012', '25/10/2012', 'Complete', '', 'Laura Armstrong', '22/10/2012'),
(19, 1, 'Interview Lisa Innes', '10:30am', 0, '23/10/2012', '23/10/2012', 'Complete', '#interview failed', 'Sarah McGuinness', '22/10/2012'),
(20, 1, 'Book template meeting with Amanda Howard', 'Wednesday next week', 0, '25/10/2012', '23/10/2012', 'Complete', '', 'Sarah McGuinness', '22/10/2012'),
(21, 1, 'Beauty blog fix override', '', 0, '23/10/2012', '24/10/2012', 'Complete', 'I overrode Tom''s code, then he overrode mine', 'Emily Poole', '22/10/2012'),
(22, 1, 'Convert kiosk videos', 'For Stu', 0, '24/10/2012', '24/10/2012', 'Complete', '', 'Stuart Clarke', '22/10/2012'),
(23, 1, 'Children in Need button', 'Waiting for the BBC', 0, '27/10/2012', '05/11/2012', 'Complete', 'Late coming from the BBC', 'Claire Sutton', '22/10/2012'),
(24, 1, 'Crop and format images for Heather Yates', 'She didn''t say thank you... rude', 0, '22/10/2012', '22/10/2012', 'Complete', '', 'Heather Yates', '22/10/2012'),
(25, 1, 'Test bar code scanner', 'For the Christmas app', 0, '25/10/2012', '25/10/2012', 'Complete', '', 'Alicia Howard', '22/10/2012'),
(26, 1, 'Health & Beauty amends', '', 0, '25/10/2012', '25/10/2012', 'Complete', '', 'Emily Poole', '22/10/2012'),
(27, 1, 'Book meeting with Paul Kellsall', 'About server changes etc with Tom and Matt', 0, '22/10/2012', '', 'Incomplete', '', 'Ewan Valentine', '22/10/2012'),
(28, 1, 'Send Wellwoman screenshots to Sharon', 'For the Wellwoman pages', 0, '27/10/2012', '27/10/2012', 'Complete', '', 'Sharon Cotterill', '22/10/2012'),
(29, 1, 'Android app testing in-store', 'For the Christmas app', 0, '26/10/2012', '26/10/2012', 'Complete', '', 'Alicia Howard', '22/10/2012'),
(30, 1, 'Send all Wellwoman features to Matt', '', 0, '29/10/2012', '29/10/2012', 'Complete', '', 'Ewan Valentine', '27/10/2012'),
(31, 1, 'Beauty Blog - Tuesday for Wednesday (Halloween post)', '', 0, '31/10/2012', '01/11/2012', 'Complete', '', 'Emily Poole', '27/10/2012'),
(32, 1, 'Health & Beauty amends', 'Second lot', 0, '', '', '', '', '', ''),
(33, 1, 'Time to sparkle - After work', '', 0, '31/10/2012', '02/11/2012', 'Complete', '', 'Sukhi Kang', '27/10/2012'),
(34, 1, 'Time to Sparkle - Christmas party', '', 0, '31/10/2012', '02/11/2012', 'Complete', '', 'Sukhi Kang', '29/10/2012'),
(35, 1, 'Time to Sparkle - Christmas day', '', 0, '31/10/2012', '02/11/2012', 'Complete', '', 'Sukhi Kang', '29/10/2012'),
(36, 1, 'Time to Sparkle - Shopping trip', '', 0, '31/10/2012', '02/11/2012', 'Complete', '', 'Sukhi Kang', '29/10/2012'),
(37, 1, 'Time to Sparkle - Beauty update ', '', 0, '31/10/2012', '02/11/2012', 'Complete', '', 'Sukhi Kang', '29/10/2012'),
(38, 1, 'AdCard spelling change', '', 0, '02/11/2012', '', 'Incomplete', '', 'Rebecca Jane', '29/10/2012'),
(39, 1, 'Chase Alliance helpdesk about bootsbeauty.com', '', 0, '02/11/2012', '31/10/2012', 'Comlete', '', 'Sarah McGuinness', '29/10/2012'),
(40, 1, 'Template, components and layouts catalogue for Amanda ', '', 0, '07/11/2012', '06/11/2012', 'Complete', 'Postponed ', 'Sarah McGuinness', '29/10/2012'),
(41, 1, 'Semd ''best of British'' to Sukhi', '', 0, '31/10/2012', '06/11/2012', 'Complete', '', 'Sukhi Kang', '29/10/2012'),
(42, 1, 'Shopping events page', '1238391', 0, '02/11/2012', '06/11/2012', 'Complete', '', 'Laura Armstrong', '29/10/2012'),
(43, 1, 'Time to Sparkle - Amends part 2', '', 0, '02/11/2012', '02/11/2012', 'Complete', '', 'Sukhi Kang', '29/10/2012'),
(44, 1, 'Supermenu changeover', '', 0, '31/10/2012', '31/10/2012', 'Complete', '', 'Sukhi Kang', '29/10/2012'),
(45, 1, 'Review CMS process sheet', 'For Amanda', 0, '10/11/2012', '', 'Incomplete', '', 'Amanda Howard', '29/10/2012'),
(46, 1, 'Christmas shopping event', 'Sent late from PR', 0, '02/11/2012', '06/11/2012', 'Complete', 'Conflict with PR (LB)', 'Laura Armstrong', '29/10/2012'),
(47, 1, 'Add Hayley Johnson credit to ''Time to Sparkle'' pages', '', 0, '02/11/2012', '02/11/2012', 'Complete', '', 'Sukhi Kang', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
