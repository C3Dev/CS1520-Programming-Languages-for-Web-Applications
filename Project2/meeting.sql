

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `meeting`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(30) NOT NULL,
  `user_password` varchar(30) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_id`, `user_name`, `user_password`, `user_email`) VALUES
(1, 'demo', 'demo', 'demo@gmail.com'),
(2, 'ccc35', '1234', 'ccc35@pitt.edu'),
(3, 'demo2', 'demo2', 'demo2@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE IF NOT EXISTS `schedule` (
  `user_id` int(11) DEFAULT NULL,
  `schedule_id` int(11) NOT NULL,
  `sc_name` varchar(50) NOT NULL,
  `sc_dt` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`user_id`, `schedule_id`, `sc_name`, `sc_dt`) VALUES
(1, 1, 'Demo Schedule', '2013-09-23^11:00|13:00|14:00'),
(1, 1, 'Demo Schedule', '2013-09-25^10:00|15:00|16:00|17:00'),
(1, 1, 'Demo Schedule', '2013-09-26^13:00|14:00'),
(2, 3, 'Demo Schedule', '2013-09-09^2:00|5:00|7:00'),
(2, 3, 'Demo Schedule', '2013-08-07^3:00|2:00|4:00');

-- --------------------------------------------------------

--
-- Table structure for table `schedule_count`
--

CREATE TABLE IF NOT EXISTS `schedule_count` (
  `sc_id` int(11) NOT NULL,
  `sc_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule_count`
--

INSERT INTO `schedule_count` (`sc_id`, `sc_count`) VALUES
(1, 9),
(2, 20),
(3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `sc_user`
--

CREATE TABLE IF NOT EXISTS `sc_user` (
  `sc_user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `schedule_id` int(11) NOT NULL,
  `sc_user` varchar(50) DEFAULT NULL,
  `sc_email` varchar(100) DEFAULT NULL,
  `sc_user_schedule` varchar(100) NOT NULL,
  PRIMARY KEY (`sc_user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `sc_user`
--

INSERT INTO `sc_user` (`sc_user_id`, `user_id`, `schedule_id`, `sc_user`, `sc_email`, `sc_user_schedule`) VALUES
(1, 1, 1, 'Count Rugen', 'count.crugen@gmail.com', 'Count Rugen^1'),
(2, 1, 1, 'Man in Black', 'maninblack@gmail.com', 'Man in Black^0|1|3|6'),
(3, 1, 1, 'Inigo Montoya', 'inigomontoya@gmail.com', 'Inigo Montoya^1|2|3'),
(5, 1, 2, 'Demo', 'demo@gmail.com', '\nDemo^2|4'),
(6, 1, 2, 'Demo1', 'demo1@gmail.com', 'Demo1'),
(7, 1, 2, 'demo2', 'demo2@gmail.com', 'demo2'),
(8, 1, 2, 'demo3', 'demo3@gmail.com', 'demo3'),
(12, 2, 3, 'Demo', 'demo@gmail.com', '\nDemo^3|4');
