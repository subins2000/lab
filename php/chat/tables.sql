-- Set MySQL timezone to UTC
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET GLOBAL time_zone = "+00:00";
-- Table structure for table `chatters2`
CREATE TABLE IF NOT EXISTS `chatters2` (
  `name` varchar(20) NOT NULL,
  `seen` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
-- Table structure for table `messages2`
CREATE TABLE IF NOT EXISTS `messages2` (
  `name` varchar(20) NOT NULL,
  `msg` text NOT NULL,
  `posted` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
