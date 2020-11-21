CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(45) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `type` enum('student','professor','administrator') NOT NULL DEFAULT 'student',
  `update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `phone` varchar(20) DEFAULT NULL,
  `state` varchar(2) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `specialty` varchar(255) DEFAULT NULL,
  `path` varchar(500) DEFAULT NULL,
  `token` varchar(100) NOT NULL DEFAULT '-1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;