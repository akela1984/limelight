-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 13, 2022 at 02:57 PM
-- Server version: 5.5.29
-- PHP Version: 5.3.10-1ubuntu3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `HNDWEBMR3`
--

-- --------------------------------------------------------

--
-- Table structure for table `limelightcinema_film`
--

CREATE TABLE IF NOT EXISTS `limelightcinema_film` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(40) NOT NULL,
  `genre` varchar(40) NOT NULL,
  `director` varchar(200) NOT NULL,
  `cast` varchar(200) NOT NULL,
  `trailer` varchar(2000) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `restriction` varchar(20) NOT NULL,
  `description` text CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `ticket` int(10) NOT NULL,
  `showDate` date NOT NULL,
  `img` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=99 ;

--
-- Dumping data for table `limelightcinema_film`
--

INSERT INTO `limelightcinema_film` (`ID`, `title`, `genre`, `director`, `cast`, `trailer`, `restriction`, `description`, `ticket`, `showDate`, `img`) VALUES
(77, 'James Bond - No time to Die', 'Action', 'Cary Joji Fukunaga', 'Daniel Craig, Ana de Armas, Rami Malek', '<iframe width="560" height="315" src="https://www.youtube.com/embed/BIhNsAtPbPI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>', '18', 'Bond has left active service and is enjoying a tranquil life in Jamaica. His peace is short-lived when his old friend Felix Leiter from the CIA turns up asking for help. The mission to rescue a kidnapped scientist turns out to be far more treacherous than expected, leading Bond onto the trail of a mysterious villain armed with dangerous new technology', 0, '2021-07-07', 'james_bond_poster.webp'),
(81, 'Ghostbusters: Afterlife', 'Adventure', 'Jason Reitman', 'Carrie Coon, Paul Rudd, Finn Wolfhard', '<iframe width="560" height="315" src="https://www.youtube.com/embed/ahZFCF--uRY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>', '15', 'When a single mom and her two kids arrive in a small town, they begin to discover their connection to the original Ghostbusters and the secret legacy their grandfather left behind.', 10, '2021-11-05', 'ghostbusters_afterlife.webp'),
(84, 'The Boss Baby 2: Family Business', 'Animation', 'Tom McGrath', 'Alec Baldwin (voice), James Marsden (voice), Amy Sedaris (voice)', '<iframe width="560" height="315" src="https://www.youtube.com/embed/EWizz52lZvw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>', '12', 'In the sequel to DreamWorks Animation''s Oscar-nominated blockbuster comedy, the Templeton brothers--Tim (James Marsden, X-Men franchise) and his Boss Baby little bro Ted (Alec Baldwin)--have become adults and drifted away from each other. Tim is now a married stay-at-home dad. Ted is a hedge fund CEO. But a new boss baby with a cutting-edge approach and a can-do attitude is about to bring them together again.. and inspire a new family business.', 32, '2021-11-10', 'baby_bos_2.webp'),
(85, 'The Addams Family 2', 'Animation', 'Greg Tiernan, Conrad Vernon, Laura Brousseau', 'Oscar Isaac (voice), Charlize Theron (voice), Chloï¿½ Grace Moretz (voice)', '<iframe width="560" height="315" src="https://www.youtube.com/embed/946LiJiMQrQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>', '12A', 'Everyone''s favorite spooky family is back in the animated comedy sequel, The Addams Family 2. In this all new movie we find Morticia and Gomez distraught that their children are growing up, skipping family dinners, and totally consumed with "scream time." To reclaim their bond they decide to cram Wednesday, Pugsley, Uncle Fester and the crew into their haunted camper and hit the road for one last miserable family vacation. Their adventure across America takes them out of their element and into hilarious run-ins with their iconic cousin, It, as well as many new kooky characters. What could possibly go wrong? ', 55, '2021-11-11', 'adams_family.webp'),
(89, 'Venom: Let There Be Carnage', 'Action, Adventure, Sci-Fi, Thriller', 'Andy Serkis', 'Tom Hardy, Woody Harrelson, Michelle Williams', '<iframe width="560" height="315" src="https://www.youtube.com/embed/-FmWuCgJmxo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>', '15', '                                    Eddie Brock struggles to adjust to his new life as the host of the alien symbiote Venom, which grants him super-human abilities in order to be a lethal vigilante. Brock attempts to reignite his career by interviewing serial killer Cletus Kasady, who becomes the host of the symbiote Carnage and escapes prison after a failed execution.', 97, '2022-01-30', 'venom.jpg'),
(90, 'The Matrix Resurrections', 'Action, Sci-Fi', 'Lana Wachowski', 'Keanu Reeves, Carrie-Anne Moss, Yahya Abdul-Mateen II', '<iframe width="560" height="315" src="https://www.youtube.com/embed/9ix7TUGVYIo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>', '15', 'Return to a world of two realities: one, everyday life; the other, what lies behind it. To find out if his reality is a construct, to truly know himself, Mr. Anderson will have to choose to follow the white rabbit once more.', 150, '2022-02-04', 'matrix.jpg'),
(91, 'Clifford the Big Red Dog', ' Adventure, Comedy, Family, Fantasy', 'Walt Becker', 'Darby Camp, Jack Whitehall, Izaac Wang', '<iframe width="560" height="315" src="https://www.youtube.com/embed/tkAJ2yVT9AE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>', 'PG', '                                    As middle schooler Emily Elizabeth struggles to fit in at home and at school, she discovers a small red puppy who is destined to become her best friend from a magical animal rescuer. When Clifford becomes a gigantic red dog in her New York City apartment and attracts the attention of a genetics company who wish to supersize animals, Emily and her clueless Uncle Casey have to fight the forces of greed as they go on the run across New York City and take a bite out of the Big Apple. Along the way, Clifford affects the lives of everyone around him and teaches Emily and her uncle the true meaning of acceptance and unconditional love. Based on the beloved Scholastic character, Clifford will teach the world how to love big.', 44, '2022-02-18', 'clifford.jpg'),
(97, 'Studio 666', 'Horror', 'BJ McDonnell', 'Dave Grohl, Foo Fighters ', '<iframe width="560" height="315" src="https://www.youtube.com/embed/u2TpdIfiYGM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>', '18', 'Legendary rock band Foo Fighters move into an Encino mansion steeped in grisly rock and roll history to record their much anticipated 10th album. Once in the house, Dave Grohl finds himself grappling with supernatural forces that threaten both the completion of the album and the lives of the band.', 100, '2022-02-23', 'studio666.jpg'),
(98, 'Scream', 'Horror, Mystery, Thriller', 'Matt Bettinelli-Olpin, Tyler Gillett', 'Neve Campbell, Courteney Cox, David Arquette', '<iframe width="560" height="315" src="https://www.youtube.com/embed/beToTslH17s" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>', '18', 'Twenty-five years after the original series of murders in Woodsboro, a new Ghostface emerges, and Sidney Prescott must return to uncover the truth.', 30, '2022-02-01', 'scream.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `limelightcinema_orders`
--

CREATE TABLE IF NOT EXISTS `limelightcinema_orders` (
  `order_ID` int(11) NOT NULL AUTO_INCREMENT,
  `user_ID` int(10) NOT NULL,
  `order_date` datetime NOT NULL,
  `movie_title` varchar(40) NOT NULL,
  `order_show_date` date NOT NULL,
  `order_ticket` int(11) NOT NULL,
  PRIMARY KEY (`order_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=66 ;

--
-- Dumping data for table `limelightcinema_orders`
--

INSERT INTO `limelightcinema_orders` (`order_ID`, `user_ID`, `order_date`, `movie_title`, `order_show_date`, `order_ticket`) VALUES
(48, 93, '2021-12-29 10:09:35', 'James Bond - No time to Die', '2021-07-07', 2),
(49, 93, '2021-12-29 10:14:07', 'Ghostbusters: Afterlife', '2021-11-05', 2),
(50, 91, '2021-12-29 10:22:23', 'James Bond - No time to Die', '2021-07-07', 1),
(51, 91, '2021-12-29 10:23:01', 'James Bond - No time to Die', '2021-07-07', 1),
(52, 91, '2021-12-29 10:23:48', 'James Bond - No time to Die', '2021-07-07', 1),
(53, 91, '2021-12-29 10:27:15', 'James Bond - No time to Die', '2021-07-07', 1),
(54, 91, '2021-12-29 10:28:48', 'James Bond - No time to Die', '2021-07-07', 1),
(55, 91, '2021-12-29 11:02:15', 'James Bond - No time to Die', '2021-07-07', 0),
(56, 93, '2021-12-29 12:59:46', 'The Boss Baby 2: Family Business', '2021-11-10', 1),
(57, 93, '2021-12-29 13:00:36', 'James Bond - No time to Die', '2021-07-07', 1),
(59, 91, '2022-01-11 12:26:46', 'Clifford the Big Red Dog', '2022-02-18', 2),
(60, 91, '2022-01-11 12:27:51', 'Clifford the Big Red Dog', '2022-02-18', 2),
(61, 91, '2022-01-11 12:29:57', 'Ghostbusters: Afterlife', '2021-11-05', 2),
(62, 93, '2022-01-12 15:37:38', 'Venom: Let There Be Carnage', '2022-01-30', 3),
(64, 126, '2022-01-13 13:06:54', 'James Bond - No time to Die', '2021-07-07', 2),
(65, 126, '2022-01-13 13:07:56', 'Ghostbusters: Afterlife', '2021-11-05', 3);

-- --------------------------------------------------------

--
-- Table structure for table `limelightcinema_user`
--

CREATE TABLE IF NOT EXISTS `limelightcinema_user` (
  `email` varchar(100) NOT NULL,
  `name` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `permission` varchar(5) NOT NULL DEFAULT 'no',
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=127 ;

--
-- Dumping data for table `limelightcinema_user`
--

INSERT INTO `limelightcinema_user` (`email`, `name`, `password`, `dob`, `permission`, `ID`) VALUES
('admin@test.com', 'Admin Test', 'test', '1984-10-06', 'yes', 91),
('junior@test.com', 'Junior Test', 'test', '2011-12-28', 'no', 92),
('adult@test.com', 'Adult Test', 'test', '1987-11-01', 'no', 93),
('azgajdos@gmail.com', 'Attila-Zoltan Gajdos', 'test', '1988-01-05', 'yes', 123),
('junior@junior.com', 'junior@junior.com', 'junior@junior.com', '2013-01-01', 'yes', 125);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
