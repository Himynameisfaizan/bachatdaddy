

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO contact_messages VALUES("2","Entertainment","1234567890","admin@gmail.com","sdfsdfsdfsdf","2024-11-30 11:20:27");
INSERT INTO contact_messages VALUES("4","Entertainment","1234567890","admin@gmail.com0","dsadafafa","2024-11-30 11:36:00");
INSERT INTO contact_messages VALUES("5","Electrical","08115582225","amitp917@gmail.com","njnj","2024-12-07 09:20:07");
INSERT INTO contact_messages VALUES("6","wahid","1234567890","admin@gmail.com","sdsadasdsada sdsadsadsaas","2024-12-11 06:39:59");
INSERT INTO contact_messages VALUES("7","Entertainment","1234567890","admin@gmail.com","gjghjghjgh","2024-12-11 07:04:40");
INSERT INTO contact_messages VALUES("8","Michael","Oliver","imteihen1999@gmail.com","Important information for the administrator of the website bachatdaddy.com.

If you are not the administrator of the website bachatdaddy.com, please forward this letter to the person who manages the website bachatdaddy.com.

Hello!

I noticed that your website bachatdaddy.com does not have Google AdSense ads. Perhaps you haven't used this tool, and it could be a great source of additional income for your site.

Instead of making changes to the content, you can simply set up AdSense, buy cheap traffic, and start generating stable income. I’ve created a detailed course that explains step by step how to easily set up AdSense and use it effectively for monetization.

If you're interested, I'm happy to answer any questions and assist with the setup.

Here’s the link to the course: https://pageadtracker.online

I’d be glad to help!

Best regards,  
Ethan","2025-03-26 07:28:50");



CREATE TABLE `industry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `active` tinyint(2) DEFAULT 1,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` text DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO industry VALUES("1","Hospitality","1","2024-11-25","2024-11-28 00:10:12");
INSERT INTO industry VALUES("2","Education","1","2024-11-25","2024-11-28 00:10:12");
INSERT INTO industry VALUES("3","Health","1","2024-11-25","2024-11-28 00:10:12");
INSERT INTO industry VALUES("4","Fashion & Grooming","1","2024-11-25","2024-11-28 00:10:12");
INSERT INTO industry VALUES("18","Entertainment ","1","2024-11-28","2024-11-28 15:11:04");
INSERT INTO industry VALUES("19","Real Estate","1","2024-12-07","2024-12-07 12:36:32");



CREATE TABLE `locations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO locations VALUES("2","SADSAD","Arunachal Pradesh","2024-11-30 13:16:01");
INSERT INTO locations VALUES("3","SAsASA","Bihar","2024-11-30 13:17:52");
INSERT INTO locations VALUES("4","Sdaas Dsfsd","Assam","2024-11-30 13:20:22");
INSERT INTO locations VALUES("5","Hello How Are You","Andaman and Nicobar Islands","2024-12-04 07:29:36");
INSERT INTO locations VALUES("6","Allahabad","Uttar Pradesh","2024-12-07 09:18:59");



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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO sub_industry VALUES("1","Waterparks","1732786962-expediav2-157523-04ea65-205744.jpg","1","18","2024-11-28","2024-11-28");
INSERT INTO sub_industry VALUES("2","Hotel","1732787010-hotel.jpg","1","1","2024-11-28","2024-11-28");
INSERT INTO sub_industry VALUES("3","College","1756214279-ChatGPT Image Aug 26, 2025, 06_38_23 PM.png","1","2","2024-11-28","2024-11-28");
INSERT INTO sub_industry VALUES("4","GYM","1732787122-gym.jpg","1","3","2024-11-28","2024-11-28");
INSERT INTO sub_industry VALUES("5","Jewelry","1732787193-jewelary.jpg","1","4","2024-11-28","2024-11-28");
INSERT INTO sub_industry VALUES("9","Property","1733555263-WhatsApp Image 2023-11-23 at 17.51.48.jpeg","1","19","2024-12-07","2024-12-07");



CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `adhar` varchar(15) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO users VALUES("5","Entertainment","0123456785","admin5@gmail.com","13579","","123456781234","2024-11-27","2024-11-21","fddsvsd","asad","123456","ddc xcvvxcvvxc","vvfdsvdfv","2024-11-29","2024-11-29");
INSERT INTO users VALUES("7","Avais","8006463635","avais.naqvi1@gmail.com","135791","1733835400-1.JPG","123456781234","2024-12-05","2024-12-07","Andaman and Nicobar Islands","Delhi","244222","Zakir Nagar","Ajmal","2024-12-04","2024-12-04");
INSERT INTO users VALUES("8","Avais","8006463634","admin@gmail.com","13579","1733834326-hotel.jpg","123456789123","2024-12-19","2024-12-12","Andaman and Nicobar Islands","asad","123456","sadasdsadsadsadsadsadsadasdsadsa","asSASa","2024-12-04","2024-12-04");
INSERT INTO users VALUES("9","Rahul","08115582225","amitp917@gmail.com","123456","","123456789123","2024-11-28","2024-12-08","Delhi","Delhi","123456","cvgcvgcg bhjbh","Avais","2024-12-07","2024-12-07");
INSERT INTO users VALUES("10","Avais","8006463633","admin1@gmail.com","123456","","","","","","","","","","2024-12-10","2024-12-10");
INSERT INTO users VALUES("11","Entertainment","0123454324","admin3@gmail.com","135791","","","","","","","","","","2024-12-11","2024-12-11");
INSERT INTO users VALUES("12","Entertainment","8006763635","admin@gmail.com5","123456","","","","","","","","","","2024-12-11","2024-12-11");
INSERT INTO users VALUES("13","Ajmal Alam In Aji","0123456789","admin@gmail.com4","135791","","","","","","","","","","2024-12-11","2024-12-11");
INSERT INTO users VALUES("14","Ajmal Alam In Aji","0123456788","adm4in@gmail.com","135791","","","","","","","","","","2024-12-11","2024-12-11");
INSERT INTO users VALUES("15","Hjk","08528576249","kaif8528576249@gmail.com","12345678","","","","","","","","","","2025-01-15","2025-01-15");
INSERT INTO users VALUES("16","Rachana nawaathna","+940704517510","rachananawarathna@gmail.com","Were33,**456#","","","","","","","","","","2025-08-07","2025-08-07");



CREATE TABLE `venderemail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor_id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `vendor_id` (`vendor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO venderemail VALUES("1","46","sadfsfsdfsd@emailxzczxczx","2024-12-05 14:55:55");
INSERT INTO venderemail VALUES("2","46","xczzxcxzcxzcxzcxzc@sasddsdas","2024-12-05 14:55:55");
INSERT INTO venderemail VALUES("3","47","sadfsfsdfsd@email","2024-12-05 15:19:01");
INSERT INTO venderemail VALUES("4","48","sadfsfsdfsd@email","2024-12-05 15:21:18");
INSERT INTO venderemail VALUES("5","49","sadfsfsdfsd@email","2024-12-05 15:22:07");
INSERT INTO venderemail VALUES("6","50","sadfsfsdfsd@email","2024-12-05 15:23:07");
INSERT INTO venderemail VALUES("7","39","sadfsfsdfsd@email","2024-12-09 12:40:08");
INSERT INTO venderemail VALUES("8","40","sadfsfsdfsd@email","2024-12-09 12:41:42");
INSERT INTO venderemail VALUES("9","41","sadfsfsdfsd@email","2024-12-09 12:54:39");
INSERT INTO venderemail VALUES("10","42","sadfsfsdfsd@email","2024-12-09 12:56:37");
INSERT INTO venderemail VALUES("11","43","sadfsfsdfsd@email","2024-12-09 12:59:15");
INSERT INTO venderemail VALUES("12","39","sadfsfsdfsd@email","2024-12-09 13:16:29");
INSERT INTO venderemail VALUES("13","40","sadfsfsdfsd@emailxzczxczx","2024-12-09 14:59:20");
INSERT INTO venderemail VALUES("14","41","sadfsfsdfsd@email","2024-12-09 15:01:02");
INSERT INTO venderemail VALUES("15","42","safdgfdggdfsfsdfsd@email","2024-12-09 15:42:06");
INSERT INTO venderemail VALUES("17","43","safdgfdggdfsfsdfsd@email","2024-12-09 15:57:19");
INSERT INTO venderemail VALUES("19","43","sadfsfsdffddfsd@emailxzczxczx","2024-12-09 18:13:18");
INSERT INTO venderemail VALUES("20","43","saertrdfsfsdfsd@email","2024-12-09 18:27:42");
INSERT INTO venderemail VALUES("22","44","sadfsfsdfsasdasd@emailxzczxczx","2024-12-09 19:04:54");
INSERT INTO venderemail VALUES("26","44","sadfsfsdfsd@email","2024-12-11 11:21:03");
INSERT INTO venderemail VALUES("27","45","sadfsfsasdsSadfsd@email","2024-12-11 11:33:12");
INSERT INTO venderemail VALUES("28","43","sadfsfsdssdfsd@emailxzczxczx","2024-12-11 11:41:33");
INSERT INTO venderemail VALUES("29","44","sadfsfsdfsd@email","2024-12-11 11:41:58");
INSERT INTO venderemail VALUES("30","44","sadfsfsdfsafdfdsdasd@emailxzczxczx","2024-12-11 11:44:33");



CREATE TABLE `vendergcondition` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor_id` int(11) NOT NULL,
  `condition` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `vendor_id` (`vendor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO vendergcondition VALUES("1","43","sdfsdfsdfsdf","2024-12-09 12:59:15");
INSERT INTO vendergcondition VALUES("2","39","sadasdsaadas","2024-12-09 13:16:29");
INSERT INTO vendergcondition VALUES("3","40","fdgdfgdfgdf","2024-12-09 14:59:20");
INSERT INTO vendergcondition VALUES("4","41","fdgfdgfdgfdgfdgfdgfd","2024-12-09 15:01:02");
INSERT INTO vendergcondition VALUES("5","42","sdfsdfsdsdfsdf","2024-12-09 15:42:06");
INSERT INTO vendergcondition VALUES("6","42","fdgfdgfdgfdgfdgfdgfdfsdfsd","2024-12-09 15:42:06");
INSERT INTO vendergcondition VALUES("7","42","fdsfsdfsdf","2024-12-09 15:42:06");
INSERT INTO vendergcondition VALUES("8","42","sdfserds","2024-12-09 15:42:06");
INSERT INTO vendergcondition VALUES("9","42","sdfsdfsdfsdfsd","2024-12-09 15:42:06");
INSERT INTO vendergcondition VALUES("10","42","sdffsdfsdfdsfsd","2024-12-09 15:42:06");
INSERT INTO vendergcondition VALUES("11","43","dassdasdasdsad","2024-12-09 15:57:19");
INSERT INTO vendergcondition VALUES("12","43","sadasdsaadas","2024-12-09 18:13:18");
INSERT INTO vendergcondition VALUES("13","43","sadasdsaadas","2024-12-09 18:27:42");
INSERT INTO vendergcondition VALUES("15","44","gfhfghgfh","2024-12-09 19:04:54");
INSERT INTO vendergcondition VALUES("17","44","sadasdsaadas","2024-12-10 10:08:42");
INSERT INTO vendergcondition VALUES("18","44","sadasdsaadasfdgfd","2024-12-10 10:09:17");
INSERT INTO vendergcondition VALUES("19","45","fdgfdgfdgfdgfdgfdgfd","2024-12-11 11:33:12");
INSERT INTO vendergcondition VALUES("20","44","sadasdsaadas","2024-12-11 11:45:50");



CREATE TABLE `vendermobile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor_id` int(11) NOT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `vendor_id` (`vendor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO vendermobile VALUES("1","50","sadsadsadasdasd","2024-12-05 15:23:07");
INSERT INTO vendermobile VALUES("2","39","111111111111111","2024-12-09 12:40:08");
INSERT INTO vendermobile VALUES("3","40","111111111111111","2024-12-09 12:41:42");
INSERT INTO vendermobile VALUES("4","41","111111111111111","2024-12-09 12:54:39");
INSERT INTO vendermobile VALUES("5","42","111111111111111","2024-12-09 12:56:37");
INSERT INTO vendermobile VALUES("6","43","111111111111111","2024-12-09 12:59:15");
INSERT INTO vendermobile VALUES("7","39","111111111111111","2024-12-09 13:16:29");
INSERT INTO vendermobile VALUES("8","40","111111111111111","2024-12-09 14:59:20");
INSERT INTO vendermobile VALUES("9","41","111111111111111","2024-12-09 15:01:02");
INSERT INTO vendermobile VALUES("10","42","111111111111111","2024-12-09 15:42:06");
INSERT INTO vendermobile VALUES("12","43","111111111211111","2024-12-09 15:57:19");
INSERT INTO vendermobile VALUES("15","43","111111119999999","2024-12-09 18:27:42");
INSERT INTO vendermobile VALUES("17","44","111111111111111","2024-12-09 19:04:54");
INSERT INTO vendermobile VALUES("21","44","111111111111111","2024-12-11 11:21:03");
INSERT INTO vendermobile VALUES("22","44","111111199999999","2024-12-11 11:21:25");
INSERT INTO vendermobile VALUES("23","45","111115555555111","2024-12-11 11:33:12");
INSERT INTO vendermobile VALUES("24","43","111111144499999","2024-12-11 11:41:33");
INSERT INTO vendermobile VALUES("25","44","111111111111111","2024-12-11 11:41:58");
INSERT INTO vendermobile VALUES("26","44","111111118888888","2024-12-11 11:44:33");



CREATE TABLE `venderoffer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor_id` int(11) NOT NULL,
  `offer` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `vendor_id` (`vendor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO venderoffer VALUES("1","43","gfhfghg","2024-12-09 12:59:15");
INSERT INTO venderoffer VALUES("2","39","sadsadsadasd","2024-12-09 13:16:29");
INSERT INTO venderoffer VALUES("3","40","fdgdfgfdg","2024-12-09 14:59:20");
INSERT INTO venderoffer VALUES("4","41","fdgfdgdfgfd","2024-12-09 15:01:02");
INSERT INTO venderoffer VALUES("5","42","gfhfghgfdsfsdf","2024-12-09 15:42:06");
INSERT INTO venderoffer VALUES("6","42","dsfsdfsd","2024-12-09 15:42:06");
INSERT INTO venderoffer VALUES("7","42","sdfsdfsdfsdsfdsdf","2024-12-09 15:42:06");
INSERT INTO venderoffer VALUES("8","42","dsfsdfsdfsdfsddfds","2024-12-09 15:42:06");
INSERT INTO venderoffer VALUES("9","42","dsfsdfsdfsdfsd","2024-12-09 15:42:06");
INSERT INTO venderoffer VALUES("10","42","dsfsdfsdfsdfsdfsdfds","2024-12-09 15:42:06");
INSERT INTO venderoffer VALUES("11","43","gfhfghg","2024-12-09 15:57:19");
INSERT INTO venderoffer VALUES("12","43","sadsadsadasd","2024-12-09 18:13:18");
INSERT INTO venderoffer VALUES("13","43","sadasdsadas","2024-12-09 18:27:42");
INSERT INTO venderoffer VALUES("15","44","gfhfghg","2024-12-09 19:04:54");
INSERT INTO venderoffer VALUES("17","44","gfhfghg","2024-12-10 10:08:42");
INSERT INTO venderoffer VALUES("18","44","sadsadsadasdcbb","2024-12-10 10:09:17");
INSERT INTO venderoffer VALUES("19","45","sadsadsadasd","2024-12-11 11:33:12");
INSERT INTO venderoffer VALUES("20","44","gfhfghg","2024-12-11 11:45:50");



CREATE TABLE `venderscondition` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor_id` int(11) NOT NULL,
  `condition` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `vendor_id` (`vendor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO venderscondition VALUES("1","43","sfdsdfsdfsd","2024-12-09 12:59:15");
INSERT INTO venderscondition VALUES("2","39","asdasdsadsad","2024-12-09 13:16:29");
INSERT INTO venderscondition VALUES("3","40","fgdgfdgfdgdf","2024-12-09 14:59:20");
INSERT INTO venderscondition VALUES("4","41","fdgfdgfdgfdgdfgdg","2024-12-09 15:01:02");
INSERT INTO venderscondition VALUES("5","42","sdfsdfsdfsd","2024-12-09 15:42:06");
INSERT INTO venderscondition VALUES("6","42","fgdgfdgfdgdf","2024-12-09 15:42:06");
INSERT INTO venderscondition VALUES("7","42","fgdgfdgfdgdfsdfsd","2024-12-09 15:42:06");
INSERT INTO venderscondition VALUES("8","42","asdasdsadsaddsfsdf","2024-12-09 15:42:06");
INSERT INTO venderscondition VALUES("9","42","fgdgfdgfdgdfdsffsd","2024-12-09 15:42:06");
INSERT INTO venderscondition VALUES("10","43","fdgfdgfdgfdgdfgdg","2024-12-09 15:57:19");
INSERT INTO venderscondition VALUES("11","43","asdasdsadsad","2024-12-09 18:13:18");
INSERT INTO venderscondition VALUES("12","43","asdasdsadsad","2024-12-09 18:27:42");
INSERT INTO venderscondition VALUES("14","44","fgfhfghfgh","2024-12-09 19:04:54");
INSERT INTO venderscondition VALUES("16","44","asdasdsadsad","2024-12-10 10:08:42");
INSERT INTO venderscondition VALUES("17","44","asdasdsadsadfdgfd","2024-12-10 10:09:17");
INSERT INTO venderscondition VALUES("18","45","sadasdsaasa","2024-12-11 11:33:12");
INSERT INTO venderscondition VALUES("19","44","asdasdsadsad","2024-12-11 11:45:50");



CREATE TABLE `vendor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(15) DEFAULT NULL,
  `offer` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `sdate` date DEFAULT NULL,
  `edate` date DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `fk_vendor_city` (`city_id`),
  KEY `fk_vendor_category_id` (`category_id`),
  CONSTRAINT `fk_vendor_category_id` FOREIGN KEY (`category_id`) REFERENCES `sub_industry` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO vendor VALUES("13","0","1","Entertainment ","","","0","sdsadas","1733150876-1732794817_674859c1cb55d.jpg","","","1","2024-12-02 20:17:56","2024-12-05 14:23:19");
INSERT INTO vendor VALUES("14","0","2","Entertainment ","","","0","xzczx","1733151029-1732253971_67401913ca571.jpg","","","1","2024-12-02 20:20:29","2024-12-05 14:23:25");
INSERT INTO vendor VALUES("20","4","3","Ajmal","admin@gmail.com","13579","0","dsfsdfsd","1733289459-1732794817_674859c1cb55d.jpg","","","1","2024-12-03 16:49:03","2024-12-05 14:23:30");
INSERT INTO vendor VALUES("29","0","","","admin@gmail.com","","0","","1733289116-","","","1","2024-12-04 10:41:56","2024-12-05 14:23:52");
INSERT INTO vendor VALUES("30","0","","","admin@gmail.com","","0","","1733289117-","","","1","2024-12-04 10:41:57","2024-12-05 14:23:58");
INSERT INTO vendor VALUES("31","0","","","admin@gmail.com","","0","","1733289120-","","","1","2024-12-04 10:42:00","2024-12-05 14:24:03");
INSERT INTO vendor VALUES("32","0","","","admin@gmail.com","","0","","1733289278-","","","1","2024-12-04 10:44:38","2024-12-05 14:24:08");
INSERT INTO vendor VALUES("33","5","4","Avais","admin@gmail.com","","0"," Zakir Nagar","1733297148-5.jpg","","","1","2024-12-04 10:57:32","2024-12-05 14:24:17");
INSERT INTO vendor VALUES("35","5","5","Entertainment ","office@ajinfotek.in","Gp@2185517","0","dsfsdfsd","1733304991-images.jpg","","","1","2024-12-04 15:06:31","2024-12-05 14:23:42");
INSERT INTO vendor VALUES("36","5","","Ajmal","Ajmal@ajmala.com","Gp@6403290","0","dasdasfdfasdasdassdasdas","1733430050-images.jpeg","","","1","2024-12-06 01:50:50","2024-12-06 01:50:50");
INSERT INTO vendor VALUES("37","2","5","Allu Arjun","allu@allu.com","Gp@1679246","0","asdasdasdasdasdasdasd","1733431418-images.jpeg","","","1","2024-12-06 02:13:38","2024-12-06 02:13:38");
INSERT INTO vendor VALUES("38","2","5","Rahul Jewllers","amitp917@gmail.com","Gp@5344111","0","125/1a CHAK daud nagar","1733555724-WhatsApp Image 2021-04-13 at 18.45.17.jpeg","","","1","2024-12-07 12:45:24","2024-12-07 12:46:52");
INSERT INTO vendor VALUES("40","5","9","Entertainment hfhgfgh","hellodfgfdw@gmail.com","Gp@1097564","0","fsdfsd","1733736560-download.jpg","","","1","2024-12-09 14:59:20","2024-12-09 14:59:20");
INSERT INTO vendor VALUES("41","5","1","Ajmalfgddfgf","agdfgfddmin@gmail.com","Gp@1690493","20% off in the name of the lord and savior","dsfsdfsd","1733736662-1732253971_67401913ca4b4.jpg","","","1","2024-12-09 15:01:02","2024-12-09 15:01:02");
INSERT INTO vendor VALUES("42","5","9","Entertainment yhgyhn","agdfgfddmin@gmail.com","Gp@5968081","hello 20% offdf fdsfsdfsdfsdfsdfsdfsdfsdf","fdgdfgfdgfd","1733739126-1732253971_67401913ca4b4.jpg","","","1","2024-12-09 15:42:06","2024-12-11 01:15:06");
INSERT INTO vendor VALUES("43","5","9","Entertainment AJI","agdfgfddmin@gmail.com","Gp@4232480","hello 20% off","dsfsdfsd","1733740039-college.jpg","2024-12-01","2024-12-28","1","2024-12-09 15:57:19","2024-12-11 01:15:09");
INSERT INTO vendor VALUES("44","5","9","Entertainment  Ajmal Aj","agdfgfddmin@gmail.com","Gp@6655346","hello 20% off","dsfsdfsd","1733751294-hotel.jpg","2024-12-01","2024-12-27","1","2024-12-09 19:04:54","2024-12-11 01:15:13");



CREATE TABLE `vendor_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor_id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `product_id` (`vendor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO vendor_images VALUES("1","0","adminuploads/images/vendors/1733150795-1732253971_67401913ca571.jpg","2024-12-02 20:16:35");
INSERT INTO vendor_images VALUES("2","0","adminuploads/images/vendors/1733150795-1732253971_67401913ca4b4.jpg","2024-12-02 20:16:35");
INSERT INTO vendor_images VALUES("3","0","adminuploads/images/vendors/1733150877-1732253971_67401913ca4b4.jpg","2024-12-02 20:17:57");
INSERT INTO vendor_images VALUES("4","0","adminuploads/images/vendors/1733150877-1732253971_67401913ca4b4.jpg","2024-12-02 20:17:57");
INSERT INTO vendor_images VALUES("5","0","adminuploads/images/vendors/1733150877-1732253971_67401913ca571.jpg","2024-12-02 20:17:57");
INSERT INTO vendor_images VALUES("6","14","adminuploads/images/vendors/1733151029-1732253971_67401913ca4b4.jpg","2024-12-02 20:20:29");
INSERT INTO vendor_images VALUES("7","14","adminuploads/images/vendors/1733151030-1732794817_674859c1cb55d.jpg","2024-12-02 20:20:30");
INSERT INTO vendor_images VALUES("8","14","adminuploads/images/vendors/1733151030-download.jpg","2024-12-02 20:20:30");
INSERT INTO vendor_images VALUES("10","17","1733216769-hotel.jpg","2024-12-03 14:36:09");
INSERT INTO vendor_images VALUES("11","17","1733216769-gym.jpg","2024-12-03 14:36:09");
INSERT INTO vendor_images VALUES("12","18","1733217590-1732253971_67401913ca4b4.jpg","2024-12-03 14:49:50");
INSERT INTO vendor_images VALUES("17","19","1733219212-1732253971_67401913ca4b4.jpg","2024-12-03 15:16:52");
INSERT INTO vendor_images VALUES("18","20","1733224743-1732253971_67401913ca4b4.jpg","2024-12-03 16:49:03");
INSERT INTO vendor_images VALUES("19","27","1733230085-1732534075_67445f3bd999a.png","2024-12-03 18:18:05");
INSERT INTO vendor_images VALUES("20","28","1733288290-1732534075_67445f3bd999a.png","2024-12-04 10:28:10");
INSERT INTO vendor_images VALUES("21","28","1733288290-1732253971_67401913ca571.jpg","2024-12-04 10:28:10");
INSERT INTO vendor_images VALUES("22","28","1733288290-jewelary.jpg","2024-12-04 10:28:10");
INSERT INTO vendor_images VALUES("24","31","1733289232-1732794817_674859c1cb55d.jpg","2024-12-04 10:43:52");
INSERT INTO vendor_images VALUES("25","32","1733289927-1732253971_67401913ca571.jpg","2024-12-04 10:55:27");
INSERT INTO vendor_images VALUES("26","32","1733289986-1732253971_67401913ca571.jpg","2024-12-04 10:56:26");
INSERT INTO vendor_images VALUES("27","33","1733290052-1732253971_67401913ca571.jpg","2024-12-04 10:57:32");
INSERT INTO vendor_images VALUES("30","33","1733290084-1732253971_67401913ca4b4.jpg","2024-12-04 10:58:04");
INSERT INTO vendor_images VALUES("31","33","1733290116-1732534075_67445f3bd999a.png","2024-12-04 10:58:36");
INSERT INTO vendor_images VALUES("32","34","1733290465-White and Black Modern Human Voiceover Service Facebook Cover (6) (1).jpg","2024-12-04 11:04:25");
INSERT INTO vendor_images VALUES("35","33","1733297264-IMG_8636.jpg","2024-12-04 12:57:44");
INSERT INTO vendor_images VALUES("36","42","1733739126-1732253971_67401913ca4b4.jpg","2024-12-09 15:42:06");
INSERT INTO vendor_images VALUES("37","43","1733740039-1732253971_67401913ca4b4.jpg","2024-12-09 15:57:19");
INSERT INTO vendor_images VALUES("38","45","1733896992-1732253971_67401913ca4b4.jpg","2024-12-11 11:33:12");
INSERT INTO vendor_images VALUES("39","45","1733896992-jewelary.jpg","2024-12-11 11:33:12");

