

CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(44) NOT NULL,
  `username` varchar(44) NOT NULL,
  `password` varchar(44) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO admin VALUES("1","admin@gmail.com","admin@gmail.com","13579","2023-08-14");



CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO contact_messages VALUES("2","Entertainment","1234567890","admin@gmail.com","sdfsdfsdfsdf","2024-11-30 04:20:27");
INSERT INTO contact_messages VALUES("4","Entertainment","1234567890","admin@gmail.com0","dsadafafa","2024-11-30 04:36:00");



CREATE TABLE `industry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `active` tinyint(2) DEFAULT 1,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` text DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO industry VALUES("1","Hospitality","1","2024-11-25","2024-11-28 00:10:12");
INSERT INTO industry VALUES("2","Education","1","2024-11-25","2024-11-28 00:10:12");
INSERT INTO industry VALUES("3","Health","1","2024-11-25","2024-11-28 00:10:12");
INSERT INTO industry VALUES("4","Fashion & Grooming","1","2024-11-25","2024-11-28 00:10:12");
INSERT INTO industry VALUES("18","Entertainment ","1","2024-11-28","2024-11-28 15:11:04");



CREATE TABLE `locations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO locations VALUES("2","SADSAD","Arunachal Pradesh","2024-11-30 06:16:01");
INSERT INTO locations VALUES("3","SAsASA","Bihar","2024-11-30 06:17:52");
INSERT INTO locations VALUES("4","Sdaas Dsfsd","Assam","2024-11-30 06:20:22");



CREATE TABLE `sub_industry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `active` tinyint(2) DEFAULT 0,
  `industry_id` int(11) DEFAULT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `industry_id` (`industry_id`),
  CONSTRAINT `sub_industry_ibfk_1` FOREIGN KEY (`industry_id`) REFERENCES `industry` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO sub_industry VALUES("1","Waterpark","1732786962-expediav2-157523-04ea65-205744.jpg","1","18","2024-11-28","2024-11-28");
INSERT INTO sub_industry VALUES("2","Hotel","1732787010-hotel.jpg","1","1","2024-11-28","2024-11-28");
INSERT INTO sub_industry VALUES("3","College","1732787070-college.jpg","1","2","2024-11-28","2024-11-28");
INSERT INTO sub_industry VALUES("4","GYM","1732787122-gym.jpg","1","3","2024-11-28","2024-11-28");
INSERT INTO sub_industry VALUES("5","Jewelry","1732787193-jewelary.jpg","0","4","2024-11-28","2024-11-28");



CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `anniversary` date DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `pincode` varchar(15) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `representative_name` varchar(255) DEFAULT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO users VALUES("3","Entertainment","0123456789","admin@gmail.com","13579","2024-11-12","2024-11-16","fddsvsd","asad","sdas","sdaas","asSASa","2024-11-29","2024-11-29");
INSERT INTO users VALUES("5","Entertainment","0123456785","admin5@gmail.com","13579","2024-11-27","2024-11-21","fddsvsd","asad","123456","ddc xcvvxcvvxc","vvfdsvdfv","2024-11-29","2024-11-29");

