CREATE TABLE `wsAdvancedChat` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `user` varchar(20) NOT NULL,
  `msg` varchar(100) NOT NULL,
  `type` varchar(10) NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `posted` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;
