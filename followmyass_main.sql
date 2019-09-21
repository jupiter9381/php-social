-- Adminer 4.6.2 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(255) CHARACTER SET latin1 NOT NULL,
  `first_name` varchar(200) COLLATE utf8_bin NOT NULL,
  `last_name` varchar(200) COLLATE utf8_bin NOT NULL,
  `phone` varchar(255) COLLATE utf8_bin NOT NULL,
  `gender` varchar(200) COLLATE utf8_bin NOT NULL,
  `birthday` varchar(200) COLLATE utf8_bin NOT NULL,
  `username` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(200) COLLATE utf8_bin NOT NULL,
  `password` varchar(200) COLLATE utf8_bin NOT NULL,
  `street` varchar(250) COLLATE utf8_bin NOT NULL,
  `city` varchar(250) COLLATE utf8_bin NOT NULL,
  `state` varchar(250) COLLATE utf8_bin NOT NULL,
  `zip` varchar(250) COLLATE utf8_bin NOT NULL,
  `role` varchar(255) COLLATE utf8_bin NOT NULL,
  `status` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `admin` (`id`, `img`, `first_name`, `last_name`, `phone`, `gender`, `birthday`, `username`, `email`, `password`, `street`, `city`, `state`, `zip`, `role`, `status`) VALUES
(55,	'',	'',	'',	'',	'',	'',	'admin',	'',	'2d412712213b11ebdfc86bf6952c61e0',	'',	'',	'',	'',	'admin',	'Unblocked');

DROP TABLE IF EXISTS `cashout_fee`;
CREATE TABLE `cashout_fee` (
  `id` int(244) NOT NULL AUTO_INCREMENT,
  `cashout_fee` varchar(5000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `cashout_fee` (`id`, `cashout_fee`) VALUES
(1,	'5');

DROP TABLE IF EXISTS `followers_fee`;
CREATE TABLE `followers_fee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `buy_follower_fee` float NOT NULL,
  `follow_follower_fee` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `followers_fee` (`id`, `buy_follower_fee`, `follow_follower_fee`) VALUES
(1,	20,	5);

DROP TABLE IF EXISTS `gift_cards`;
CREATE TABLE `gift_cards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `card_type` enum('Paypal','Amazon','Steam','EDF') NOT NULL,
  `amount` float NOT NULL,
  `card_code` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `status` enum('New','Used') NOT NULL,
  `is_locked` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `gift_cards` (`id`, `card_type`, `amount`, `card_code`, `user_id`, `user_email`, `status`, `is_locked`) VALUES
(4,	'Paypal',	10,	'asdasd cadasdasd',	38,	'jafaraliwork14@gmail.com',	'Used',	0),
(5,	'Amazon',	30,	'asdalkjsdajsdlaksjkdjaklsd',	38,	'jafaraliwork14@gmail.com',	'Used',	0),
(8,	'Paypal',	5,	'jhinrtgbkj',	36,	'rocketleaguecompp@gmail.com',	'Used',	0),
(7,	'Paypal',	10,	'test',	38,	'jafaraliwork14@gmail.com',	'Used',	0),
(9,	'Paypal',	5,	'test',	38,	'jafaraliwork14@gmail.com',	'Used',	0),
(10,	'Amazon',	10,	'test',	38,	'jafaraliwork14@gmail.com',	'Used',	0),
(11,	'Paypal',	5,	'12321',	36,	'rocketleaguecompp@gmail.com',	'Used',	0);

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `platform_id` enum('Instagram','Discord','Facebook','Youtube') NOT NULL,
  `platform_item` enum('Post Likes','Page Likes','Followers','Views','Members','Likes') NOT NULL,
  `offer_image` varchar(50) DEFAULT NULL,
  `followers` int(11) NOT NULL,
  `followers_got` int(11) NOT NULL,
  `follower_per_amount` float NOT NULL,
  `final_cost` decimal(10,2) NOT NULL,
  `buy_follower_fee_per` float NOT NULL,
  `total_fees` decimal(10,2) NOT NULL,
  `grand_total` decimal(10,2) NOT NULL,
  `username` varchar(255) NOT NULL,
  `payment_gateway` enum('Free','Paypal','Stripe','Bitcoin') NOT NULL,
  `order_status` enum('Pending','In Process','Completed','Deleted') NOT NULL,
  `is_manual` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `orders` (`id`, `user_id`, `platform_id`, `platform_item`, `offer_image`, `followers`, `followers_got`, `follower_per_amount`, `final_cost`, `buy_follower_fee_per`, `total_fees`, `grand_total`, `username`, `payment_gateway`, `order_status`, `is_manual`, `created_at`) VALUES
(89,	36,	'Instagram',	'Followers',	NULL,	1000,	2,	0.02,	20.00,	0,	0.00,	20.00,	'queenlatifah',	'Free',	'In Process',	1,	'2019-09-03 02:22:35'),
(27,	36,	'Youtube',	'Followers',	NULL,	100,	1,	0.03,	3.00,	0,	0.00,	3.00,	'V? Hung',	'Free',	'In Process',	1,	'2019-08-22 02:29:29'),
(26,	36,	'Youtube',	'Views',	NULL,	100,	2,	0.01,	1.00,	0,	0.00,	1.00,	'Impaulsive',	'Free',	'In Process',	1,	'2019-08-22 02:28:24'),
(86,	36,	'Instagram',	'Followers',	NULL,	1000,	0,	0.02,	20.00,	0,	0.00,	20.00,	'bhytes',	'Free',	'In Process',	1,	'2019-09-03 02:17:19'),
(87,	36,	'Instagram',	'Post Likes',	NULL,	1000,	0,	0.04,	40.00,	0,	0.00,	40.00,	'infobmkg',	'Free',	'In Process',	1,	'2019-09-03 02:18:30'),
(88,	36,	'Instagram',	'Post Likes',	NULL,	750,	0,	0.02,	15.00,	0,	0.00,	15.00,	'porsha4real',	'Free',	'In Process',	1,	'2019-09-03 02:19:51'),
(85,	36,	'Instagram',	'Followers',	NULL,	500,	0,	0.03,	15.00,	0,	0.00,	15.00,	'fashiondads_',	'Free',	'In Process',	1,	'2019-09-03 02:11:40'),
(29,	38,	'Youtube',	'Likes',	NULL,	50,	2,	0.98,	49.00,	20,	9.80,	58.80,	'maknojiya440',	'Paypal',	'In Process',	0,	'2019-08-22 04:45:23'),
(22,	36,	'Youtube',	'Likes',	NULL,	100,	0,	0.8,	80.00,	0,	0.00,	80.00,	'admin',	'Free',	'Deleted',	1,	'2019-08-21 17:51:53'),
(31,	41,	'Discord',	'Members',	NULL,	250,	0,	0.8,	200.00,	0,	0.00,	200.00,	'admin',	'Free',	'Deleted',	1,	'2019-08-22 13:35:37'),
(32,	48,	'Youtube',	'Followers',	NULL,	250,	0,	0.8,	200.00,	0,	0.00,	200.00,	'SchoolNav',	'Free',	'Deleted',	1,	'2019-08-22 13:36:18'),
(33,	36,	'Facebook',	'Views',	NULL,	250,	0,	0.8,	200.00,	0,	0.00,	200.00,	'SchoolNav',	'Free',	'In Process',	1,	'2019-08-22 16:29:34'),
(34,	36,	'Youtube',	'Likes',	NULL,	100,	0,	0.01,	1.00,	20,	0.20,	1.20,	'Pewdiepie',	'Paypal',	'Pending',	0,	'2019-08-22 23:01:51'),
(35,	67,	'Discord',	'Members',	NULL,	50,	0,	0.01,	0.50,	20,	0.10,	0.60,	'My Hero Academia Official',	'Paypal',	'Pending',	0,	'2019-08-23 05:05:49'),
(36,	36,	'Discord',	'Members',	NULL,	5000,	2,	0.02,	100.00,	0,	0.00,	100.00,	'Followmyass.com',	'Free',	'In Process',	1,	'2019-08-23 05:41:49'),
(37,	36,	'Discord',	'Members',	NULL,	1000,	1,	0.03,	30.00,	0,	0.00,	30.00,	'Hypixel',	'Free',	'In Process',	1,	'2019-08-23 05:44:14'),
(38,	36,	'Discord',	'Members',	NULL,	1000,	2,	0.05,	50.00,	0,	0.00,	50.00,	'Product Testing',	'Free',	'In Process',	1,	'2019-08-23 05:48:00'),
(39,	36,	'Discord',	'Members',	NULL,	4000,	1,	0.02,	80.00,	0,	0.00,	80.00,	'Rocket League',	'Free',	'In Process',	1,	'2019-08-23 05:55:18'),
(84,	36,	'Instagram',	'Followers',	NULL,	1000,	0,	0.02,	20.00,	0,	0.00,	20.00,	'steveyeun',	'Free',	'In Process',	1,	'2019-09-03 01:54:44'),
(83,	60,	'Instagram',	'Post Likes',	NULL,	100,	0,	0.04,	4.00,	20,	0.80,	4.80,	'cristiano',	'Paypal',	'Pending',	0,	'2019-09-02 13:33:46'),
(82,	36,	'Instagram',	'Post Likes',	NULL,	100,	0,	0.05,	5.00,	20,	1.00,	6.00,	'pewdiepie',	'Paypal',	'Pending',	0,	'2019-09-01 18:52:34'),
(80,	60,	'Instagram',	'Post Likes',	NULL,	50,	0,	0.06,	3.00,	20,	0.60,	3.60,	'cristiano',	'Paypal',	'In Process',	0,	'2019-09-01 16:57:22'),
(46,	38,	'Youtube',	'Views',	NULL,	250,	1,	0.8,	200.00,	20,	40.00,	240.00,	'maknojiya440',	'Paypal',	'In Process',	0,	'2019-08-23 15:09:39'),
(79,	36,	'Discord',	'Members',	NULL,	500,	0,	0.02,	10.00,	0,	0.00,	10.00,	'Anti-Social Society',	'Free',	'In Process',	1,	'2019-09-01 16:26:56'),
(78,	36,	'Discord',	'Members',	NULL,	250,	0,	0.02,	5.00,	0,	0.00,	5.00,	'Animekos',	'Free',	'In Process',	1,	'2019-09-01 16:25:29'),
(77,	36,	'Discord',	'Members',	NULL,	500,	0,	0.02,	10.00,	0,	0.00,	10.00,	'Anarchy',	'Free',	'In Process',	1,	'2019-09-01 16:24:14'),
(76,	36,	'Discord',	'Members',	NULL,	1000,	4,	0.02,	20.00,	0,	0.00,	20.00,	'Discordservers.me',	'Free',	'In Process',	1,	'2019-09-01 16:22:59'),
(75,	36,	'Discord',	'Members',	NULL,	1000,	0,	0.02,	20.00,	0,	0.00,	20.00,	'Roblox Central',	'Free',	'In Process',	1,	'2019-09-01 16:19:59'),
(74,	36,	'Discord',	'Members',	NULL,	1000,	0,	0.04,	40.00,	0,	0.00,	40.00,	'Cosmic Oasis',	'Free',	'In Process',	1,	'2019-09-01 16:17:14'),
(73,	36,	'Discord',	'Members',	NULL,	2500,	0,	0.03,	75.00,	0,	0.00,	75.00,	'TeGriAi',	'Free',	'In Process',	1,	'2019-09-01 16:12:40'),
(72,	36,	'Discord',	'Members',	NULL,	1000,	0,	0.02,	20.00,	0,	0.00,	20.00,	'Kouhai ???? Paradise',	'Free',	'In Process',	1,	'2019-09-01 16:02:22'),
(71,	36,	'Discord',	'Members',	NULL,	1000,	0,	0.03,	30.00,	0,	0.00,	30.00,	'Midas.Investments',	'Free',	'In Process',	1,	'2019-09-01 16:00:22'),
(81,	36,	'Instagram',	'Followers',	NULL,	100,	0,	0.05,	5.00,	20,	1.00,	6.00,	'pewdiepie',	'Paypal',	'Pending',	0,	'2019-09-01 18:41:37'),
(70,	36,	'Discord',	'Members',	NULL,	500,	0,	0.02,	10.00,	0,	0.00,	10.00,	'The Grim Reaper',	'Free',	'In Process',	1,	'2019-09-01 15:58:28'),
(63,	36,	'Youtube',	'Views',	NULL,	100,	0,	0.01,	1.00,	20,	0.20,	1.20,	'Jakecx MSP',	'Paypal',	'In Process',	0,	'2019-08-29 04:21:04'),
(64,	38,	'Discord',	'Members',	NULL,	10,	1,	0.8,	8.00,	20,	1.60,	9.60,	'chirag',	'Paypal',	'In Process',	0,	'2019-08-29 14:21:18'),
(65,	38,	'Youtube',	'Followers',	NULL,	10,	0,	0.8,	8.00,	20,	1.60,	9.60,	'maknojiya440',	'Paypal',	'In Process',	0,	'2019-08-29 14:26:36'),
(66,	38,	'Youtube',	'Views',	NULL,	10,	0,	0.8,	8.00,	20,	1.60,	9.60,	'maknojiya440',	'Paypal',	'In Process',	0,	'2019-08-29 14:27:32'),
(90,	36,	'Instagram',	'Followers',	NULL,	800,	1,	0.03,	24.00,	0,	0.00,	24.00,	'yahea_xx',	'Free',	'In Process',	1,	'2019-09-03 02:24:12'),
(91,	36,	'Instagram',	'Post Likes',	NULL,	250,	0,	0.03,	7.50,	0,	0.00,	7.50,	'yessirdaysband',	'Free',	'In Process',	1,	'2019-09-03 02:26:09'),
(92,	60,	'Instagram',	'Post Likes',	NULL,	50,	0,	0.05,	2.50,	20,	0.50,	3.00,	'cristiano',	'Paypal',	'Pending',	0,	'2019-09-03 04:36:35'),
(93,	36,	'Instagram',	'Views',	NULL,	500,	1,	0.07,	35.00,	0,	0.00,	35.00,	'Henry',	'Free',	'In Process',	1,	'2019-09-03 21:47:40');

DROP TABLE IF EXISTS `orders_posts`;
CREATE TABLE `orders_posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `post_image` text NOT NULL,
  `post_url` text NOT NULL,
  `post_id` text CHARACTER SET utf8,
  `followers` int(11) NOT NULL,
  `followers_got` int(11) NOT NULL,
  `status` enum('In Process','Completed') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `orders_posts` (`id`, `order_id`, `post_image`, `post_url`, `post_id`, `followers`, `followers_got`, `status`) VALUES
(68,	76,	'raw97goias9ni185lm51ho68r4ulqa.png',	'https://discord.gg/ZnwusVc',	NULL,	1000,	4,	'In Process'),
(69,	77,	'dzmnu68dvoo9ysmgx8wogltzof5uns.png',	'https://discordapp.com/invite/wj6xBb7',	NULL,	500,	0,	'In Process'),
(65,	73,	'bdlwwjx69j5158423q2vvgs8fzzcfv.png',	'https://discordapp.com/invite/wrSfFX7',	NULL,	2500,	0,	'In Process'),
(66,	74,	'97mpn84f53qynsippi1ay51ivh5m44.png',	'https://discordapp.com/invite/pyMpSAW',	NULL,	1000,	0,	'In Process'),
(67,	75,	'w2czwy3azj6ypj57pmvlijhqmwfu2o.png',	'https://discordapp.com/invite/QQMNctQ',	NULL,	1000,	0,	'In Process'),
(3,	12,	'https://cdn.discordapp.com/icons/612473340610740258/f22bdcc1929faa4d34bc1f760b1bd864',	'https://discord.gg/KRvNva',	NULL,	250,	0,	'In Process'),
(4,	13,	'https://i.ytimg.com/vi/va1xuligSik/hqdefault.jpg',	'https://www.youtube.com/watch?v=va1xuligSik',	NULL,	250,	0,	'In Process'),
(63,	71,	'56k2ol4jd3t4baugjhhrrimyzeitg7.png',	'https://discordapp.com/invite/6Rcp2EN',	NULL,	1000,	0,	'In Process'),
(64,	72,	'8de9slfudvugyaslt8tjcwk5zhsrj8.png',	'https://discordapp.com/invite/Qyhb983',	NULL,	1000,	0,	'In Process'),
(6,	15,	'https://i.ytimg.com/vi/va1xuligSik/hqdefault.jpg',	'https://www.youtube.com/watch?v=va1xuligSik',	NULL,	250,	0,	'In Process'),
(9,	18,	'https://i.ytimg.com/vi/va1xuligSik/hqdefault.jpg',	'https://www.youtube.com/watch?v=va1xuligSik',	NULL,	250,	0,	'In Process'),
(62,	70,	'ojl5bve27n4j8cpx4xa9jg3rwzupkr.png',	'https://discordapp.com/invite/9ZFCQw4',	NULL,	500,	0,	'In Process'),
(12,	22,	'd3xfikypxq3rxdpnforbnymzz1owbz.jpg',	'https://instagram.com/jafar440/?hl=en',	NULL,	100,	0,	'In Process'),
(13,	23,	'https://i.ytimg.com/vi/va1xuligSik/hqdefault.jpg',	'https://www.youtube.com/watch?v=va1xuligSik',	NULL,	250,	0,	'In Process'),
(16,	26,	'13o2lvz923nps2s2xr15kwg3dhzfdo.png',	'https://www.youtube.com/watch?v=iW6t5-lc0Gg',	NULL,	100,	2,	'In Process'),
(17,	27,	'c51noa5nwgd57mqhe97mqxdye7fioh.png',	'https://www.youtube.com/channel/UCDwG_T55vWFDkSWoqhcktPQ',	NULL,	100,	1,	'In Process'),
(18,	28,	'https://i.ytimg.com/vi/va1xuligSik/hqdefault.jpg',	'https://www.youtube.com/watch?v=va1xuligSik',	NULL,	250,	0,	'In Process'),
(19,	29,	'https://i.ytimg.com/vi/va1xuligSik/hqdefault.jpg',	'https://www.youtube.com/watch?v=va1xuligSik',	NULL,	50,	2,	'In Process'),
(61,	69,	'https://scontent-iad3-1.cdninstagram.com/vp/2b12f9002d3e94eb6fe29ea512a56092/5DF46A6A/t51.2885-15/e35/67750209_866243237094710_1501622749162890965_n.jpg?_nc_ht=scontent-iad3-1.cdninstagram.com',	'https://www.instagram.com/p/B1oJmbbgI2A',	NULL,	100,	0,	'In Process'),
(21,	31,	'rbbzmx5tjdr9ndde5zxtj7ipt9dpar.jpg',	'https://discord.gg/QtKFZA',	NULL,	250,	0,	'In Process'),
(22,	32,	'f23n18troq3cl3ghgw3p8ahx79q5ke.jpg',	'www.facebook.com',	NULL,	250,	0,	'In Process'),
(23,	33,	'u4emkrlb9p52jxtj2nxvijghcqjvzd.jpg',	'www.facebook.com',	NULL,	250,	0,	'In Process'),
(24,	34,	'https://i.ytimg.com/vi/GYpOapkr5MA/hqdefault.jpg',	'https://www.youtube.com/watch?v=GYpOapkr5MA',	NULL,	100,	0,	'In Process'),
(25,	35,	'https://cdn.discordapp.com/icons/414234792121597953/a_871d40047fef94cdb0fc61cad9c29737',	'https://discord.gg/myheroacademia',	NULL,	50,	0,	'In Process'),
(26,	36,	'k4f4656una7xeykniuxs24msxi8393.png',	'https://discord.gg/kSCMB44',	NULL,	5000,	2,	'In Process'),
(27,	37,	'bh8257jr5qqshmldlp83npauyqlotd.png',	'https://discord.gg/hypixel',	NULL,	1000,	1,	'In Process'),
(28,	38,	'b4dalgbmnfsrxbx1won8foyi9orzev.jpg',	'https://discord.gg/W5t5vCW',	NULL,	1000,	2,	'In Process'),
(29,	39,	'fxp7w2dltkf3nael3fu7gx33jshkdb.png',	'https://discord.gg/YKTkuQz',	NULL,	4000,	1,	'In Process'),
(36,	46,	'https://i.ytimg.com/vi/Okqm6jbUMLI/hqdefault.jpg',	'https://www.youtube.com/watch?v=Okqm6jbUMLI',	NULL,	250,	1,	'In Process'),
(86,	93,	'n341xjoe2ln2fvuxbmy981wfik1kr6.jpg',	'https://www.instagram.com/p/B1sAWDCDf8b/?utm_source=ig_web_copy_link',	NULL,	500,	1,	'In Process'),
(84,	91,	'iocpnah92f91bh3ubd6hnrfcn7dm1a.jpg',	'https://www.instagram.com/p/B1bdVjQBpzP=2115413474288245967',	NULL,	250,	0,	'In Process'),
(85,	92,	'https://scontent-iad3-1.cdninstagram.com/vp/b86fd3432d51025d72ad0c4db3a0d9ae/5DF30AD5/t51.2885-15/e35/s1080x1080/69720309_389503051724789_6567411646542037069_n.jpg?_nc_ht=scontent-iad3-1.cdninstagram.com',	'https://www.instagram.com/p/B17QuvoAh_d=2124365230212521949',	NULL,	50,	0,	'In Process'),
(82,	89,	'2ov9u18pwfarib7mymt1hmpym7c2p2.jpg',	'queenlatifah',	NULL,	1000,	2,	'In Process'),
(83,	90,	'up8eau5tu7zuh5jt1f3twc9jjiiu4c.jpg',	'yahea_xx',	NULL,	800,	1,	'In Process'),
(79,	86,	'ydapa4tfd9m22vvp97rzaj9papznyv.jpg',	'bhytes',	NULL,	1000,	0,	'In Process'),
(80,	87,	'rgzdgorr6jjqe5437b7ptdfs2yb6tt.jpg',	'https://www.instagram.com/p/B13McUIhkXF=2123220471649813957',	NULL,	1000,	0,	'In Process'),
(81,	88,	'lne1yvouhjr9xsgul4f6a32te6wlqs.jpg',	'https://www.instagram.com/p/B1ys3NoHzHI=2121955682694410696',	NULL,	750,	0,	'In Process'),
(77,	84,	'iwgsn89kp4q8y2uhpuwqejtbflj273.jpg',	'steveyeun',	NULL,	1000,	0,	'In Process'),
(78,	85,	'jop3rs18nhqwqfarbzfzydbr95orut.jpg',	'fashiondads_',	NULL,	500,	0,	'In Process'),
(76,	83,	'https://scontent-iad3-1.cdninstagram.com/vp/09db0dc40a6e943a906dc28300228fdc/5E06614C/t51.2885-15/e35/67586682_2241574199301685_5924755212080235718_n.jpg?_nc_ht=scontent-iad3-1.cdninstagram.com',	'https://www.instagram.com/p/B1lkGTTABb1=2118257962458814197',	NULL,	50,	0,	'In Process'),
(75,	83,	'https://scontent-iad3-1.cdninstagram.com/vp/267306201b75caa12b8a52ec7e106f61/5DF648B7/t51.2885-15/fr/e15/s1080x1080/67479185_468937573657733_3950757086819867743_n.jpg?_nc_ht=scontent-iad3-1.cdninstagram.com',	'https://www.instagram.com/p/B1t_cLBjAvz=2120630012474035187',	NULL,	50,	0,	'In Process'),
(74,	82,	'https://scontent-iad3-1.cdninstagram.com/vp/2b12f9002d3e94eb6fe29ea512a56092/5DF46A6A/t51.2885-15/e35/67750209_866243237094710_1501622749162890965_n.jpg?_nc_ht=scontent-iad3-1.cdninstagram.com',	'https://www.instagram.com/p/B1oJmbbgI2A=2118985847888973184',	NULL,	100,	0,	'In Process'),
(73,	81,	'https://scontent-iad3-1.cdninstagram.com/vp/ac0815f67ef6decc64a115e73f967a2a/5DFFE7D5/t51.2885-19/s150x150/42802192_2147517745488519_3436095027892191232_n.jpg?_nc_ht=scontent-iad3-1.cdninstagram.com',	'pewdiepie',	NULL,	100,	0,	'In Process'),
(72,	80,	'https://scontent-iad3-1.cdninstagram.com/vp/267306201b75caa12b8a52ec7e106f61/5DF648B7/t51.2885-15/fr/e15/s1080x1080/67479185_468937573657733_3950757086819867743_n.jpg?_nc_ht=scontent-iad3-1.cdninstagram.com',	'https://www.instagram.com/p/B1t_cLBjAvz=2120630012474035187',	NULL,	50,	0,	'In Process'),
(70,	78,	'r2crlfefkls2zvu52vayvh5eagdzbn.png',	'https://discordapp.com/invite/CmyGems',	NULL,	250,	0,	'In Process'),
(71,	79,	'tjj1uviyupz5v6pr8e6qcrk5y2yu7v.png',	'https://discordapp.com/invite/EJA2vXY',	NULL,	500,	0,	'In Process');

DROP TABLE IF EXISTS `paypal_stripe_fee`;
CREATE TABLE `paypal_stripe_fee` (
  `id` int(244) NOT NULL AUTO_INCREMENT,
  `fee` varchar(5000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `paypal_stripe_fee` (`id`, `fee`) VALUES
(1,	'10');

DROP TABLE IF EXISTS `posts_followers`;
CREATE TABLE `posts_followers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_posts_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `socialmedia_id` varchar(255) DEFAULT NULL,
  `profile_pic_url` text,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

INSERT INTO `posts_followers` (`id`, `order_posts_id`, `user_id`, `username`, `socialmedia_id`, `profile_pic_url`, `created_at`) VALUES
(7,	26,	36,	'Henry',	'165939947457478656',	'https://cdn.discordapp.com/avatars/165939947457478656/a_c4e20a7c41d0ced24e8ed402550c8f1c.jpg',	'2019-08-24 03:09:04'),
(8,	27,	36,	'Henry',	'165939947457478656',	'https://cdn.discordapp.com/avatars/165939947457478656/a_c4e20a7c41d0ced24e8ed402550c8f1c.jpg',	'2019-08-24 03:09:04'),
(9,	28,	36,	'Henry',	'165939947457478656',	'https://cdn.discordapp.com/avatars/165939947457478656/a_c4e20a7c41d0ced24e8ed402550c8f1c.jpg',	'2019-08-24 03:09:05'),
(10,	29,	36,	'Henry',	'165939947457478656',	'https://cdn.discordapp.com/avatars/165939947457478656/a_c4e20a7c41d0ced24e8ed402550c8f1c.jpg',	'2019-08-24 03:09:05'),
(11,	17,	36,	'Crimson Gaming',	'105112304660952549319',	'https://lh3.googleusercontent.com/a-/AAuE7mB1yci_78P9HtB9t_d9retL4iVN21h6nr-QazuHHA',	'2019-08-24 03:11:19'),
(12,	19,	36,	'Crimson Gaming',	'105112304660952549319',	'https://lh3.googleusercontent.com/a-/AAuE7mB1yci_78P9HtB9t_d9retL4iVN21h6nr-QazuHHA',	'2019-08-24 03:11:19'),
(13,	17,	61,	'Han Xiuna',	'106317181223055072792',	'https://lh3.googleusercontent.com/a-/AAuE7mCl-KMI4oN6wcV8zgScs7jHI4U5MwKzIlT6DkvdOQ',	'2019-08-24 05:28:25'),
(14,	19,	61,	'Han Xiuna',	'106317181223055072792',	'https://lh3.googleusercontent.com/a-/AAuE7mCl-KMI4oN6wcV8zgScs7jHI4U5MwKzIlT6DkvdOQ',	'2019-08-24 05:28:25'),
(15,	26,	61,	'hgh141592_71',	'611633925521145906',	'https://cdn.discordapp.com/avatars/611633925521145906/fde3514c78d622cd7d962afb51274a83.jpg',	'2019-08-24 06:36:06'),
(16,	27,	61,	'hgh141592_71',	'611633925521145906',	'https://cdn.discordapp.com/avatars/611633925521145906/fde3514c78d622cd7d962afb51274a83.jpg',	'2019-08-24 06:36:06'),
(17,	29,	38,	'jafarali14',	'597275974530498570',	'https://cdn.discordapp.com/avatars/597275974530498570/b80be2a253aad19a0ed0ddc1f461955b.jpg',	'2019-08-24 10:50:20'),
(18,	36,	61,	'Han Xiuna',	'106317181223055072792',	'https://lh3.googleusercontent.com/a-/AAuE7mCl-KMI4oN6wcV8zgScs7jHI4U5MwKzIlT6DkvdOQ',	'2019-08-24 08:14:58'),
(19,	29,	61,	'hgh141592_71',	'611633925521145906',	'https://cdn.discordapp.com/avatars/611633925521145906/fde3514c78d622cd7d962afb51274a83.jpg',	'2019-08-24 08:15:46'),
(20,	16,	38,	'Jafarali Maknojiya',	'114933009100316848215',	'https://lh6.googleusercontent.com/-Hx7Q2KHRB5o/AAAAAAAAAAI/AAAAAAAAAAA/ACHi3re6eWjaeVJpMhMOgsRs8qnUsBmMCg/photo.jpg',	'2019-08-26 04:12:25'),
(21,	36,	38,	'Jafarali Maknojiya',	'114933009100316848215',	'https://lh6.googleusercontent.com/-Hx7Q2KHRB5o/AAAAAAAAAAI/AAAAAAAAAAA/ACHi3re6eWjaeVJpMhMOgsRs8qnUsBmMCg/photo.jpg',	'2019-08-26 04:12:25'),
(22,	26,	71,	'Prizafal',	'129308185629687809',	'https://cdn.discordapp.com/avatars/129308185629687809/cb3c921ff88424c35eb736c03f3634cb.jpg',	'2019-08-26 02:07:00'),
(23,	16,	38,	'Jafarali Maknojiya',	'102053403201514016926',	'https://lh6.googleusercontent.com/-P3KrM0f7BpY/AAAAAAAAAAI/AAAAAAAAAAA/ACHi3rcGWfa-5vs82hkZgTgtZ9f2yptwGg/photo.jpg',	'2019-08-28 04:45:38'),
(24,	17,	38,	'Jafarali Maknojiya',	'102053403201514016926',	'https://lh6.googleusercontent.com/-P3KrM0f7BpY/AAAAAAAAAAI/AAAAAAAAAAA/ACHi3rcGWfa-5vs82hkZgTgtZ9f2yptwGg/photo.jpg',	'2019-08-28 04:46:09'),
(25,	26,	36,	'Yep',	'268194373655592960',	'https://cdn.discordapp.com/avatars/268194373655592960/f7a975e92b5154b66213013f3e441e9b.jpg',	'2019-08-29 12:45:52'),
(26,	28,	36,	'Yep',	'268194373655592960',	'https://cdn.discordapp.com/avatars/268194373655592960/f7a975e92b5154b66213013f3e441e9b.jpg',	'2019-08-29 12:45:52'),
(27,	29,	36,	'Yep',	'268194373655592960',	'https://cdn.discordapp.com/avatars/268194373655592960/f7a975e92b5154b66213013f3e441e9b.jpg',	'2019-08-29 12:45:52'),
(28,	19,	71,	'Ethan Waldenstrom',	'108695022023863296754',	'https://lh3.googleusercontent.com/a-/AAuE7mC0NbXVh0sAygM21Own0RWfTzTv_STvgOB-DqXOcg',	'2019-08-29 11:36:37'),
(29,	56,	53,	'jafarali14',	'597275974530498570',	'https://cdn.discordapp.com/avatars/597275974530498570/b80be2a253aad19a0ed0ddc1f461955b.jpg',	'2019-08-29 02:23:28'),
(30,	16,	53,	'jafar ali',	'107622561619737124040',	'https://lh6.googleusercontent.com/-GtsErdWf7J4/AAAAAAAAAAI/AAAAAAAAAAA/ACHi3re8gnEwNh6F8JQjzNQUsvPyn8yDgg/photo.jpg',	'2019-08-29 02:24:20'),
(31,	36,	53,	'jafar ali',	'107622561619737124040',	'https://lh6.googleusercontent.com/-GtsErdWf7J4/AAAAAAAAAAI/AAAAAAAAAAA/ACHi3re8gnEwNh6F8JQjzNQUsvPyn8yDgg/photo.jpg',	'2019-08-29 02:24:20'),
(32,	26,	60,	'filipnikifirov',	'607447722433314838',	'',	'2019-08-31 05:21:44'),
(33,	27,	60,	'filipnikifirov',	'607447722433314838',	'',	'2019-08-31 05:23:22'),
(34,	19,	60,	'Filip Nikiforov',	'108745422291094869420',	'https://lh6.googleusercontent.com/-5tIVl1hV0Fo/AAAAAAAAAAI/AAAAAAAAAAA/ACHi3rcQWhyijP6e32hw7lOWFq5kug4vHQ/photo.jpg',	'2019-08-31 05:25:38'),
(35,	68,	38,	'jafarali14',	'597275974530498570',	'https://cdn.discordapp.com/avatars/597275974530498570/b80be2a253aad19a0ed0ddc1f461955b.jpg',	'2019-09-01 06:46:17'),
(36,	68,	36,	'Henry',	'165939947457478656',	'https://cdn.discordapp.com/avatars/165939947457478656/a_c4e20a7c41d0ced24e8ed402550c8f1c.jpg',	'2019-09-01 09:05:12'),
(37,	68,	36,	'Yep',	'268194373655592960',	'https://cdn.discordapp.com/avatars/268194373655592960/f7a975e92b5154b66213013f3e441e9b.jpg',	'2019-09-03 03:58:32'),
(38,	82,	60,	'',	'17799331919',	'https://instagram.fmex6-1.fna.fbcdn.net/vp/07243f9b67dc89802e1a5cb3304f0496/5DF2B4F1/t51.2885-19/44884218_345707102882519_2446069589734326272_n.jpg?_nc_ht=instagram.fmex6-1.fna.fbcdn.net',	'2019-09-03 04:11:42'),
(39,	83,	60,	'',	'17799331919',	'https://scontent.cdninstagram.com/vp/1b87ddc4074a8872bf54cb74040d778d/5DF2B4F1/t51.2885-19/44884218_345707102882519_2446069589734326272_n.jpg?_nc_ht=scontent.cdninstagram.com',	'2019-09-03 04:13:23'),
(40,	82,	36,	'',	'18266483593',	'https://scontent-frx5-1.cdninstagram.com/vp/fdf3c817b6106d7a01a3622405bd6ffb/5DF2B4F1/t51.2885-19/44884218_345707102882519_2446069589734326272_n.jpg?_nc_ht=scontent-frx5-1.cdninstagram.com',	'2019-09-03 09:43:33'),
(41,	86,	36,	'',	'18266483593',	'https://scontent-ams4-1.cdninstagram.com/vp/fb34eb8356ceabac010ffabeb86c66da/5DF2B4F1/t51.2885-19/44884218_345707102882519_2446069589734326272_n.jpg?_nc_ht=scontent-ams4-1.cdninstagram.com',	'2019-09-03 09:48:21'),
(42,	68,	99,	'Yep',	'268194373655592960',	'https://cdn.discordapp.com/avatars/268194373655592960/f7a975e92b5154b66213013f3e441e9b.jpg',	'2019-09-04 01:04:27'),
(43,	28,	99,	'Yep',	'268194373655592960',	'https://cdn.discordapp.com/avatars/268194373655592960/f7a975e92b5154b66213013f3e441e9b.jpg',	'2019-09-04 01:04:27');

DROP TABLE IF EXISTS `referral_setting`;
CREATE TABLE `referral_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `setting_key` varchar(255) NOT NULL,
  `setting_value` text NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `referral_setting` (`id`, `title`, `setting_key`, `setting_value`, `description`) VALUES
(1,	'1st tier referral',	'FIRST_TIER_REF',	'40',	'1st tier referral'),
(2,	'2nd tier referral',	'SECOND_TIER_REF',	'20',	'2nd tier referral'),
(3,	'3rd tier referral',	'THIRD_TIER_REF',	'4',	'3rd tier referral'),
(4,	'4th tier referral',	'FORTH_TIER_REF',	'4',	'4th tier referral'),
(6,	'Share referral message',	'SHARE_REF_MESSAGE',	'Buy Real Followers or Likes to up your Clout at %REF_URL% Don’t have tons of cash? Don’t worry, the %REF_URL% marketplace lets you gain hundreds of legit followers for a few bucks. Go to %REF_URL% right now!',	''),
(5,	'Referral percentage from order profit',	'REF_PER_FROM_ORDER_PROFIT',	'25',	'');

DROP TABLE IF EXISTS `transaction`;
CREATE TABLE `transaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `order_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `item_price` decimal(10,2) NOT NULL,
  `currency` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'usd',
  `total_paid_amount` decimal(10,2) NOT NULL,
  `txn_id` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `paymentToken` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `orderID` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payerID` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `response` text COLLATE utf8_unicode_ci,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `transaction` (`id`, `user_id`, `order_id`, `email`, `item_price`, `currency`, `total_paid_amount`, `txn_id`, `paymentToken`, `orderID`, `payerID`, `payment_status`, `response`, `created`, `modified`) VALUES
(1,	38,	'15',	'marywandy@yahoo.com',	240.00,	'usd',	240.00,	'txn_1F9Xi3FtMvsLnTJwExe65t0c',	NULL,	NULL,	NULL,	'succeeded',	'O:13:\"Stripe\\Charge\":8:{s:14:\"saveWithParent\";b:0;s:8:\"\0*\0_opts\";O:26:\"Stripe\\Util\\RequestOptions\":2:{s:7:\"headers\";a:0:{}s:6:\"apiKey\";s:42:\"sk_test_ZeRRSEJlUQwoYTZpVmtQIWRY00C7INIBiH\";}s:18:\"\0*\0_originalValues\";a:43:{s:2:\"id\";s:27:\"ch_1F9Xi3FtMvsLnTJw80uSJibK\";s:6:\"object\";s:6:\"charge\";s:6:\"amount\";i:24000;s:15:\"amount_refunded\";i:0;s:11:\"application\";N;s:15:\"application_fee\";N;s:22:\"application_fee_amount\";N;s:19:\"balance_transaction\";s:28:\"txn_1F9Xi3FtMvsLnTJwExe65t0c\";s:15:\"billing_details\";a:4:{s:7:\"address\";a:6:{s:4:\"city\";N;s:7:\"country\";N;s:5:\"line1\";N;s:5:\"line2\";N;s:11:\"postal_code\";N;s:5:\"state\";N;}s:5:\"email\";N;s:4:\"name\";s:19:\"marywandy@yahoo.com\";s:5:\"phone\";N;}s:8:\"captured\";b:1;s:7:\"created\";i:1566308955;s:8:\"currency\";s:3:\"usd\";s:8:\"customer\";N;s:11:\"description\";N;s:11:\"destination\";N;s:7:\"dispute\";N;s:12:\"failure_code\";N;s:15:\"failure_message\";N;s:13:\"fraud_details\";a:0:{}s:7:\"invoice\";N;s:8:\"livemode\";b:0;s:8:\"metadata\";a:0:{}s:12:\"on_behalf_of\";N;s:5:\"order\";N;s:7:\"outcome\";a:6:{s:14:\"network_status\";s:19:\"approved_by_network\";s:6:\"reason\";N;s:10:\"risk_level\";s:6:\"normal\";s:10:\"risk_score\";i:34;s:14:\"seller_message\";s:17:\"Payment complete.\";s:4:\"type\";s:10:\"authorized\";}s:4:\"paid\";b:1;s:14:\"payment_intent\";N;s:14:\"payment_method\";s:29:\"card_1F9XhzFtMvsLnTJwjSAYNJTl\";s:22:\"payment_method_details\";a:2:{s:4:\"card\";a:10:{s:5:\"brand\";s:4:\"visa\";s:6:\"checks\";a:3:{s:19:\"address_line1_check\";N;s:25:\"address_postal_code_check\";N;s:9:\"cvc_check\";s:4:\"pass\";}s:7:\"country\";s:2:\"US\";s:9:\"exp_month\";i:11;s:8:\"exp_year\";i:2035;s:11:\"fingerprint\";s:16:\"5D6oBWpS44LLEnnJ\";s:7:\"funding\";s:7:\"unknown\";s:5:\"last4\";s:4:\"1111\";s:14:\"three_d_secure\";N;s:6:\"wallet\";N;}s:4:\"type\";s:4:\"card\";}s:13:\"receipt_email\";N;s:14:\"receipt_number\";N;s:11:\"receipt_url\";s:118:\"https://pay.stripe.com/receipts/acct_1F3A0fFtMvsLnTJw/ch_1F9Xi3FtMvsLnTJw80uSJibK/rcpt_FerQovHpAhAIKf9x7P65r7bi4WVmTxF\";s:8:\"refunded\";b:0;s:7:\"refunds\";a:5:{s:6:\"object\";s:4:\"list\";s:4:\"data\";a:0:{}s:8:\"has_more\";b:0;s:11:\"total_count\";i:0;s:3:\"url\";s:47:\"/v1/charges/ch_1F9Xi3FtMvsLnTJw80uSJibK/refunds\";}s:6:\"review\";N;s:8:\"shipping\";N;s:6:\"source\";a:23:{s:2:\"id\";s:29:\"card_1F9XhzFtMvsLnTJwjSAYNJTl\";s:6:\"object\";s:4:\"card\";s:12:\"address_city\";N;s:15:\"address_country\";N;s:13:\"address_line1\";N;s:19:\"address_line1_check\";N;s:13:\"address_line2\";N;s:13:\"address_state\";N;s:11:\"address_zip\";N;s:17:\"address_zip_check\";N;s:5:\"brand\";s:4:\"Visa\";s:7:\"country\";s:2:\"US\";s:8:\"customer\";N;s:9:\"cvc_check\";s:4:\"pass\";s:13:\"dynamic_last4\";N;s:9:\"exp_month\";i:11;s:8:\"exp_year\";i:2035;s:11:\"fingerprint\";s:16:\"5D6oBWpS44LLEnnJ\";s:7:\"funding\";s:7:\"unknown\";s:5:\"last4\";s:4:\"1111\";s:8:\"metadata\";a:0:{}s:4:\"name\";s:19:\"marywandy@yahoo.com\";s:19:\"tokenization_method\";N;}s:15:\"source_transfer\";N;s:20:\"statement_descriptor\";N;s:27:\"statement_descriptor_suffix\";N;s:6:\"status\";s:9:\"succeeded\";s:13:\"transfer_data\";N;s:14:\"transfer_group\";N;}s:10:\"\0*\0_values\";a:43:{s:2:\"id\";s:27:\"ch_1F9Xi3FtMvsLnTJw80uSJibK\";s:6:\"object\";s:6:\"charge\";s:6:\"amount\";i:24000;s:15:\"amount_refunded\";i:0;s:11:\"application\";N;s:15:\"application_fee\";N;s:22:\"application_fee_amount\";N;s:19:\"balance_transaction\";s:28:\"txn_1F9Xi3FtMvsLnTJwExe65t0c\";s:15:\"billing_details\";O:19:\"Stripe\\StripeObject\":7:{s:8:\"\0*\0_opts\";r:3;s:18:\"\0*\0_originalValues\";a:4:{s:7:\"address\";a:6:{s:4:\"city\";N;s:7:\"country\";N;s:5:\"line1\";N;s:5:\"line2\";N;s:11:\"postal_code\";N;s:5:\"state\";N;}s:5:\"email\";N;s:4:\"name\";s:19:\"marywandy@yahoo.com\";s:5:\"phone\";N;}s:10:\"\0*\0_values\";a:4:{s:7:\"address\";O:19:\"Stripe\\StripeObject\":7:{s:8:\"\0*\0_opts\";r:3;s:18:\"\0*\0_originalValues\";a:6:{s:4:\"city\";N;s:7:\"country\";N;s:5:\"line1\";N;s:5:\"line2\";N;s:11:\"postal_code\";N;s:5:\"state\";N;}s:10:\"\0*\0_values\";a:6:{s:4:\"city\";N;s:7:\"country\";N;s:5:\"line1\";N;s:5:\"line2\";N;s:11:\"postal_code\";N;s:5:\"state\";N;}s:17:\"\0*\0_unsavedValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_transientValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_retrieveOptions\";a:0:{}s:16:\"\0*\0_lastResponse\";N;}s:5:\"email\";N;s:4:\"name\";s:19:\"marywandy@yahoo.com\";s:5:\"phone\";N;}s:17:\"\0*\0_unsavedValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_transientValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_retrieveOptions\";a:0:{}s:16:\"\0*\0_lastResponse\";N;}s:8:\"captured\";b:1;s:7:\"created\";i:1566308955;s:8:\"currency\";s:3:\"usd\";s:8:\"customer\";N;s:11:\"description\";N;s:11:\"destination\";N;s:7:\"dispute\";N;s:12:\"failure_code\";N;s:15:\"failure_message\";N;s:13:\"fraud_details\";a:0:{}s:7:\"invoice\";N;s:8:\"livemode\";b:0;s:8:\"metadata\";O:19:\"Stripe\\StripeObject\":7:{s:8:\"\0*\0_opts\";r:3;s:18:\"\0*\0_originalValues\";a:0:{}s:10:\"\0*\0_values\";a:0:{}s:17:\"\0*\0_unsavedValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_transientValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_retrieveOptions\";a:0:{}s:16:\"\0*\0_lastResponse\";N;}s:12:\"on_behalf_of\";N;s:5:\"order\";N;s:7:\"outcome\";O:19:\"Stripe\\StripeObject\":7:{s:8:\"\0*\0_opts\";r:3;s:18:\"\0*\0_originalValues\";a:6:{s:14:\"network_status\";s:19:\"approved_by_network\";s:6:\"reason\";N;s:10:\"risk_level\";s:6:\"normal\";s:10:\"risk_score\";i:34;s:14:\"seller_message\";s:17:\"Payment complete.\";s:4:\"type\";s:10:\"authorized\";}s:10:\"\0*\0_values\";a:6:{s:14:\"network_status\";s:19:\"approved_by_network\";s:6:\"reason\";N;s:10:\"risk_level\";s:6:\"normal\";s:10:\"risk_score\";i:34;s:14:\"seller_message\";s:17:\"Payment complete.\";s:4:\"type\";s:10:\"authorized\";}s:17:\"\0*\0_unsavedValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_transientValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_retrieveOptions\";a:0:{}s:16:\"\0*\0_lastResponse\";N;}s:4:\"paid\";b:1;s:14:\"payment_intent\";N;s:14:\"payment_method\";s:29:\"card_1F9XhzFtMvsLnTJwjSAYNJTl\";s:22:\"payment_method_details\";O:19:\"Stripe\\StripeObject\":7:{s:8:\"\0*\0_opts\";r:3;s:18:\"\0*\0_originalValues\";a:2:{s:4:\"card\";a:10:{s:5:\"brand\";s:4:\"visa\";s:6:\"checks\";a:3:{s:19:\"address_line1_check\";N;s:25:\"address_postal_code_check\";N;s:9:\"cvc_check\";s:4:\"pass\";}s:7:\"country\";s:2:\"US\";s:9:\"exp_month\";i:11;s:8:\"exp_year\";i:2035;s:11:\"fingerprint\";s:16:\"5D6oBWpS44LLEnnJ\";s:7:\"funding\";s:7:\"unknown\";s:5:\"last4\";s:4:\"1111\";s:14:\"three_d_secure\";N;s:6:\"wallet\";N;}s:4:\"type\";s:4:\"card\";}s:10:\"\0*\0_values\";a:2:{s:4:\"card\";O:19:\"Stripe\\StripeObject\":7:{s:8:\"\0*\0_opts\";r:3;s:18:\"\0*\0_originalValues\";a:10:{s:5:\"brand\";s:4:\"visa\";s:6:\"checks\";a:3:{s:19:\"address_line1_check\";N;s:25:\"address_postal_code_check\";N;s:9:\"cvc_check\";s:4:\"pass\";}s:7:\"country\";s:2:\"US\";s:9:\"exp_month\";i:11;s:8:\"exp_year\";i:2035;s:11:\"fingerprint\";s:16:\"5D6oBWpS44LLEnnJ\";s:7:\"funding\";s:7:\"unknown\";s:5:\"last4\";s:4:\"1111\";s:14:\"three_d_secure\";N;s:6:\"wallet\";N;}s:10:\"\0*\0_values\";a:10:{s:5:\"brand\";s:4:\"visa\";s:6:\"checks\";O:19:\"Stripe\\StripeObject\":7:{s:8:\"\0*\0_opts\";r:3;s:18:\"\0*\0_originalValues\";a:3:{s:19:\"address_line1_check\";N;s:25:\"address_postal_code_check\";N;s:9:\"cvc_check\";s:4:\"pass\";}s:10:\"\0*\0_values\";a:3:{s:19:\"address_line1_check\";N;s:25:\"address_postal_code_check\";N;s:9:\"cvc_check\";s:4:\"pass\";}s:17:\"\0*\0_unsavedValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_transientValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_retrieveOptions\";a:0:{}s:16:\"\0*\0_lastResponse\";N;}s:7:\"country\";s:2:\"US\";s:9:\"exp_month\";i:11;s:8:\"exp_year\";i:2035;s:11:\"fingerprint\";s:16:\"5D6oBWpS44LLEnnJ\";s:7:\"funding\";s:7:\"unknown\";s:5:\"last4\";s:4:\"1111\";s:14:\"three_d_secure\";N;s:6:\"wallet\";N;}s:17:\"\0*\0_unsavedValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_transientValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_retrieveOptions\";a:0:{}s:16:\"\0*\0_lastResponse\";N;}s:4:\"type\";s:4:\"card\";}s:17:\"\0*\0_unsavedValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_transientValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_retrieveOptions\";a:0:{}s:16:\"\0*\0_lastResponse\";N;}s:13:\"receipt_email\";N;s:14:\"receipt_number\";N;s:11:\"receipt_url\";s:118:\"https://pay.stripe.com/receipts/acct_1F3A0fFtMvsLnTJw/ch_1F9Xi3FtMvsLnTJw80uSJibK/rcpt_FerQovHpAhAIKf9x7P65r7bi4WVmTxF\";s:8:\"refunded\";b:0;s:7:\"refunds\";O:17:\"Stripe\\Collection\":8:{s:17:\"\0*\0_requestParams\";a:0:{}s:8:\"\0*\0_opts\";r:3;s:18:\"\0*\0_originalValues\";a:5:{s:6:\"object\";s:4:\"list\";s:4:\"data\";a:0:{}s:8:\"has_more\";b:0;s:11:\"total_count\";i:0;s:3:\"url\";s:47:\"/v1/charges/ch_1F9Xi3FtMvsLnTJw80uSJibK/refunds\";}s:10:\"\0*\0_values\";a:5:{s:6:\"object\";s:4:\"list\";s:4:\"data\";a:0:{}s:8:\"has_more\";b:0;s:11:\"total_count\";i:0;s:3:\"url\";s:47:\"/v1/charges/ch_1F9Xi3FtMvsLnTJw80uSJibK/refunds\";}s:17:\"\0*\0_unsavedValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_transientValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_retrieveOptions\";a:0:{}s:16:\"\0*\0_lastResponse\";N;}s:6:\"review\";N;s:8:\"shipping\";N;s:6:\"source\";O:11:\"Stripe\\Card\":8:{s:14:\"saveWithParent\";b:0;s:8:\"\0*\0_opts\";r:3;s:18:\"\0*\0_originalValues\";a:23:{s:2:\"id\";s:29:\"card_1F9XhzFtMvsLnTJwjSAYNJTl\";s:6:\"object\";s:4:\"card\";s:12:\"address_city\";N;s:15:\"address_country\";N;s:13:\"address_line1\";N;s:19:\"address_line1_check\";N;s:13:\"address_line2\";N;s:13:\"address_state\";N;s:11:\"address_zip\";N;s:17:\"address_zip_check\";N;s:5:\"brand\";s:4:\"Visa\";s:7:\"country\";s:2:\"US\";s:8:\"customer\";N;s:9:\"cvc_check\";s:4:\"pass\";s:13:\"dynamic_last4\";N;s:9:\"exp_month\";i:11;s:8:\"exp_year\";i:2035;s:11:\"fingerprint\";s:16:\"5D6oBWpS44LLEnnJ\";s:7:\"funding\";s:7:\"unknown\";s:5:\"last4\";s:4:\"1111\";s:8:\"metadata\";a:0:{}s:4:\"name\";s:19:\"marywandy@yahoo.com\";s:19:\"tokenization_method\";N;}s:10:\"\0*\0_values\";a:23:{s:2:\"id\";s:29:\"card_1F9XhzFtMvsLnTJwjSAYNJTl\";s:6:\"object\";s:4:\"card\";s:12:\"address_city\";N;s:15:\"address_country\";N;s:13:\"address_line1\";N;s:19:\"address_line1_check\";N;s:13:\"address_line2\";N;s:13:\"address_state\";N;s:11:\"address_zip\";N;s:17:\"address_zip_check\";N;s:5:\"brand\";s:4:\"Visa\";s:7:\"country\";s:2:\"US\";s:8:\"customer\";N;s:9:\"cvc_check\";s:4:\"pass\";s:13:\"dynamic_last4\";N;s:9:\"exp_month\";i:11;s:8:\"exp_year\";i:2035;s:11:\"fingerprint\";s:16:\"5D6oBWpS44LLEnnJ\";s:7:\"funding\";s:7:\"unknown\";s:5:\"last4\";s:4:\"1111\";s:8:\"metadata\";O:19:\"Stripe\\StripeObject\":7:{s:8:\"\0*\0_opts\";r:3;s:18:\"\0*\0_originalValues\";a:0:{}s:10:\"\0*\0_values\";a:0:{}s:17:\"\0*\0_unsavedValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_transientValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_retrieveOptions\";a:0:{}s:16:\"\0*\0_lastResponse\";N;}s:4:\"name\";s:19:\"marywandy@yahoo.com\";s:19:\"tokenization_method\";N;}s:17:\"\0*\0_unsavedValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_transientValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_retrieveOptions\";a:0:{}s:16:\"\0*\0_lastResponse\";N;}s:15:\"source_transfer\";N;s:20:\"statement_descriptor\";N;s:27:\"statement_descriptor_suffix\";N;s:6:\"status\";s:9:\"succeeded\";s:13:\"transfer_data\";N;s:14:\"transfer_group\";N;}s:17:\"\0*\0_unsavedValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_transientValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_retrieveOptions\";a:0:{}s:16:\"\0*\0_lastResponse\";O:18:\"Stripe\\ApiResponse\":4:{s:7:\"headers\";a:14:{s:6:\"Server\";s:5:\"nginx\";s:4:\"Date\";s:29:\"Tue, 20 Aug 2019 13:49:15 GMT\";s:12:\"Content-Type\";s:16:\"application/json\";s:14:\"Content-Length\";s:4:\"2817\";s:10:\"Connection\";s:10:\"keep-alive\";s:32:\"access-control-allow-credentials\";s:4:\"true\";s:28:\"access-control-allow-methods\";s:32:\"GET, POST, HEAD, OPTIONS, DELETE\";s:27:\"access-control-allow-origin\";s:1:\"*\";s:29:\"access-control-expose-headers\";s:104:\"Request-Id, Stripe-Manage-Version, X-Stripe-External-Auth-Required, X-Stripe-Privileged-Session-Required\";s:22:\"access-control-max-age\";s:3:\"300\";s:13:\"cache-control\";s:18:\"no-cache, no-store\";s:10:\"request-id\";s:18:\"req_C8KVHyvXI6OEJg\";s:14:\"stripe-version\";s:10:\"2019-05-16\";s:25:\"Strict-Transport-Security\";s:44:\"max-age=31556926; includeSubDomains; preload\";}s:4:\"body\";s:2817:\"{\n  \"id\": \"ch_1F9Xi3FtMvsLnTJw80uSJibK\",\n  \"object\": \"charge\",\n  \"amount\": 24000,\n  \"amount_refunded\": 0,\n  \"application\": null,\n  \"application_fee\": null,\n  \"application_fee_amount\": null,\n  \"balance_transaction\": \"txn_1F9Xi3FtMvsLnTJwExe65t0c\",\n  \"billing_details\": {\n    \"address\": {\n      \"city\": null,\n      \"country\": null,\n      \"line1\": null,\n      \"line2\": null,\n      \"postal_code\": null,\n      \"state\": null\n    },\n    \"email\": null,\n    \"name\": \"marywandy@yahoo.com\",\n    \"phone\": null\n  },\n  \"captured\": true,\n  \"created\": 1566308955,\n  \"currency\": \"usd\",\n  \"customer\": null,\n  \"description\": null,\n  \"destination\": null,\n  \"dispute\": null,\n  \"failure_code\": null,\n  \"failure_message\": null,\n  \"fraud_details\": {\n  },\n  \"invoice\": null,\n  \"livemode\": false,\n  \"metadata\": {\n  },\n  \"on_behalf_of\": null,\n  \"order\": null,\n  \"outcome\": {\n    \"network_status\": \"approved_by_network\",\n    \"reason\": null,\n    \"risk_level\": \"normal\",\n    \"risk_score\": 34,\n    \"seller_message\": \"Payment complete.\",\n    \"type\": \"authorized\"\n  },\n  \"paid\": true,\n  \"payment_intent\": null,\n  \"payment_method\": \"card_1F9XhzFtMvsLnTJwjSAYNJTl\",\n  \"payment_method_details\": {\n    \"card\": {\n      \"brand\": \"visa\",\n      \"checks\": {\n        \"address_line1_check\": null,\n        \"address_postal_code_check\": null,\n        \"cvc_check\": \"pass\"\n      },\n      \"country\": \"US\",\n      \"exp_month\": 11,\n      \"exp_year\": 2035,\n      \"fingerprint\": \"5D6oBWpS44LLEnnJ\",\n      \"funding\": \"unknown\",\n      \"last4\": \"1111\",\n      \"three_d_secure\": null,\n      \"wallet\": null\n    },\n    \"type\": \"card\"\n  },\n  \"receipt_email\": null,\n  \"receipt_number\": null,\n  \"receipt_url\": \"https://pay.stripe.com/receipts/acct_1F3A0fFtMvsLnTJw/ch_1F9Xi3FtMvsLnTJw80uSJibK/rcpt_FerQovHpAhAIKf9x7P65r7bi4WVmTxF\",\n  \"refunded\": false,\n  \"refunds\": {\n    \"object\": \"list\",\n    \"data\": [\n\n    ],\n    \"has_more\": false,\n    \"total_count\": 0,\n    \"url\": \"/v1/charges/ch_1F9Xi3FtMvsLnTJw80uSJibK/refunds\"\n  },\n  \"review\": null,\n  \"shipping\": null,\n  \"source\": {\n    \"id\": \"card_1F9XhzFtMvsLnTJwjSAYNJTl\",\n    \"object\": \"card\",\n    \"address_city\": null,\n    \"address_country\": null,\n    \"address_line1\": null,\n    \"address_line1_check\": null,\n    \"address_line2\": null,\n    \"address_state\": null,\n    \"address_zip\": null,\n    \"address_zip_check\": null,\n    \"brand\": \"Visa\",\n    \"country\": \"US\",\n    \"customer\": null,\n    \"cvc_check\": \"pass\",\n    \"dynamic_last4\": null,\n    \"exp_month\": 11,\n    \"exp_year\": 2035,\n    \"fingerprint\": \"5D6oBWpS44LLEnnJ\",\n    \"funding\": \"unknown\",\n    \"last4\": \"1111\",\n    \"metadata\": {\n    },\n    \"name\": \"marywandy@yahoo.com\",\n    \"tokenization_method\": null\n  },\n  \"source_transfer\": null,\n  \"statement_descriptor\": null,\n  \"statement_descriptor_suffix\": null,\n  \"status\": \"succeeded\",\n  \"transfer_data\": null,\n  \"transfer_group\": null\n}\n\";s:4:\"json\";a:43:{s:2:\"id\";s:27:\"ch_1F9Xi3FtMvsLnTJw80uSJibK\";s:6:\"object\";s:6:\"charge\";s:6:\"amount\";i:24000;s:15:\"amount_refunded\";i:0;s:11:\"application\";N;s:15:\"application_fee\";N;s:22:\"application_fee_amount\";N;s:19:\"balance_transaction\";s:28:\"txn_1F9Xi3FtMvsLnTJwExe65t0c\";s:15:\"billing_details\";a:4:{s:7:\"address\";a:6:{s:4:\"city\";N;s:7:\"country\";N;s:5:\"line1\";N;s:5:\"line2\";N;s:11:\"postal_code\";N;s:5:\"state\";N;}s:5:\"email\";N;s:4:\"name\";s:19:\"marywandy@yahoo.com\";s:5:\"phone\";N;}s:8:\"captured\";b:1;s:7:\"created\";i:1566308955;s:8:\"currency\";s:3:\"usd\";s:8:\"customer\";N;s:11:\"description\";N;s:11:\"destination\";N;s:7:\"dispute\";N;s:12:\"failure_code\";N;s:15:\"failure_message\";N;s:13:\"fraud_details\";a:0:{}s:7:\"invoice\";N;s:8:\"livemode\";b:0;s:8:\"metadata\";a:0:{}s:12:\"on_behalf_of\";N;s:5:\"order\";N;s:7:\"outcome\";a:6:{s:14:\"network_status\";s:19:\"approved_by_network\";s:6:\"reason\";N;s:10:\"risk_level\";s:6:\"normal\";s:10:\"risk_score\";i:34;s:14:\"seller_message\";s:17:\"Payment complete.\";s:4:\"type\";s:10:\"authorized\";}s:4:\"paid\";b:1;s:14:\"payment_intent\";N;s:14:\"payment_method\";s:29:\"card_1F9XhzFtMvsLnTJwjSAYNJTl\";s:22:\"payment_method_details\";a:2:{s:4:\"card\";a:10:{s:5:\"brand\";s:4:\"visa\";s:6:\"checks\";a:3:{s:19:\"address_line1_check\";N;s:25:\"address_postal_code_check\";N;s:9:\"cvc_check\";s:4:\"pass\";}s:7:\"country\";s:2:\"US\";s:9:\"exp_month\";i:11;s:8:\"exp_year\";i:2035;s:11:\"fingerprint\";s:16:\"5D6oBWpS44LLEnnJ\";s:7:\"funding\";s:7:\"unknown\";s:5:\"last4\";s:4:\"1111\";s:14:\"three_d_secure\";N;s:6:\"wallet\";N;}s:4:\"type\";s:4:\"card\";}s:13:\"receipt_email\";N;s:14:\"receipt_number\";N;s:11:\"receipt_url\";s:118:\"https://pay.stripe.com/receipts/acct_1F3A0fFtMvsLnTJw/ch_1F9Xi3FtMvsLnTJw80uSJibK/rcpt_FerQovHpAhAIKf9x7P65r7bi4WVmTxF\";s:8:\"refunded\";b:0;s:7:\"refunds\";a:5:{s:6:\"object\";s:4:\"list\";s:4:\"data\";a:0:{}s:8:\"has_more\";b:0;s:11:\"total_count\";i:0;s:3:\"url\";s:47:\"/v1/charges/ch_1F9Xi3FtMvsLnTJw80uSJibK/refunds\";}s:6:\"review\";N;s:8:\"shipping\";N;s:6:\"source\";a:23:{s:2:\"id\";s:29:\"card_1F9XhzFtMvsLnTJwjSAYNJTl\";s:6:\"object\";s:4:\"card\";s:12:\"address_city\";N;s:15:\"address_country\";N;s:13:\"address_line1\";N;s:19:\"address_line1_check\";N;s:13:\"address_line2\";N;s:13:\"address_state\";N;s:11:\"address_zip\";N;s:17:\"address_zip_check\";N;s:5:\"brand\";s:4:\"Visa\";s:7:\"country\";s:2:\"US\";s:8:\"customer\";N;s:9:\"cvc_check\";s:4:\"pass\";s:13:\"dynamic_last4\";N;s:9:\"exp_month\";i:11;s:8:\"exp_year\";i:2035;s:11:\"fingerprint\";s:16:\"5D6oBWpS44LLEnnJ\";s:7:\"funding\";s:7:\"unknown\";s:5:\"last4\";s:4:\"1111\";s:8:\"metadata\";a:0:{}s:4:\"name\";s:19:\"marywandy@yahoo.com\";s:19:\"tokenization_method\";N;}s:15:\"source_transfer\";N;s:20:\"statement_descriptor\";N;s:27:\"statement_descriptor_suffix\";N;s:6:\"status\";s:9:\"succeeded\";s:13:\"transfer_data\";N;s:14:\"transfer_group\";N;}s:4:\"code\";i:200;}}',	'2019-08-20 13:49:15',	'2019-08-20 13:49:15'),
(2,	38,	'21',	'',	6.00,	'USD',	6.00,	'PAYID-LVOX5KI0CJ619338N522164B',	'EC-4SN79480D6551820Y',	'EC-4SN79480D6551820Y',	'UU68VPHBMHC3E',	'succeeded',	'',	'2019-08-21 17:27:04',	'2019-08-21 17:27:04'),
(3,	38,	'23',	'',	240.00,	'USD',	240.00,	'PAYID-LVOYJXY0L766572KV1894711',	'EC-1BK57038VD3629451',	'EC-1BK57038VD3629451',	'UU68VPHBMHC3E',	'succeeded',	'',	'2019-08-21 17:53:01',	'2019-08-21 17:53:01'),
(4,	38,	'24',	'',	60.00,	'USD',	60.00,	'PAYID-LVOYKOY89867214RU396041L',	'EC-8V410676R9890352R',	'EC-8V410676R9890352R',	'UU68VPHBMHC3E',	'succeeded',	'',	'2019-08-21 17:54:37',	'2019-08-21 17:54:37'),
(5,	38,	'28',	'',	150.00,	'USD',	150.00,	'PAYID-LVPB2NI9L703295BP3457418',	'EC-0WM771474V808743G',	'EC-0WM771474V808743G',	'UU68VPHBMHC3E',	'succeeded',	'',	'2019-08-22 04:43:15',	'2019-08-22 04:43:15'),
(6,	38,	'29',	'',	58.80,	'USD',	58.80,	'PAYID-LVPB32Y426985709C370502F',	'EC-8FE154510G512904G',	'EC-8FE154510G512904G',	'UU68VPHBMHC3E',	'succeeded',	'',	'2019-08-22 04:46:10',	'2019-08-22 04:46:10'),
(7,	38,	'46',	'',	240.00,	'USD',	240.00,	'PAYID-LVQADRY5PA81350635182739',	'EC-9P64692762515441C',	'EC-9P64692762515441C',	'UU68VPHBMHC3E',	'succeeded',	'',	'2019-08-23 15:10:46',	'2019-08-23 15:10:46'),
(8,	36,	'63',	'',	1.20,	'USD',	1.20,	'PAYID-LVTVFWQ14V22457SB940361N',	'EC-8PM80273HH719910P',	'EC-8PM80273HH719910P',	'W79Z4TTPL3NS8',	'succeeded',	'',	'2019-08-29 04:23:59',	'2019-08-29 04:23:59'),
(9,	38,	'64',	'',	9.60,	'USD',	9.60,	'PAYID-LVT562I2WC38074BB1726717',	'EC-74U813466W2544459',	'EC-74U813466W2544459',	'UU68VPHBMHC3E',	'succeeded',	'',	'2019-08-29 14:22:23',	'2019-08-29 14:22:23'),
(10,	38,	'68',	NULL,	9.60,	'usd',	9.60,	'txn_1FDq92FtMvsLnTJwcGQ6ONDi',	NULL,	NULL,	'syndeyuche@yahoo.com',	'succeeded',	'O:13:\"Stripe\\Charge\":8:{s:14:\"saveWithParent\";b:0;s:8:\"\0*\0_opts\";O:26:\"Stripe\\Util\\RequestOptions\":2:{s:7:\"headers\";a:0:{}s:6:\"apiKey\";s:42:\"sk_test_ZeRRSEJlUQwoYTZpVmtQIWRY00C7INIBiH\";}s:18:\"\0*\0_originalValues\";a:43:{s:2:\"id\";s:27:\"ch_1FDq91FtMvsLnTJwoOTnCSkI\";s:6:\"object\";s:6:\"charge\";s:6:\"amount\";i:960;s:15:\"amount_refunded\";i:0;s:11:\"application\";N;s:15:\"application_fee\";N;s:22:\"application_fee_amount\";N;s:19:\"balance_transaction\";s:28:\"txn_1FDq92FtMvsLnTJwcGQ6ONDi\";s:15:\"billing_details\";a:4:{s:7:\"address\";a:6:{s:4:\"city\";N;s:7:\"country\";N;s:5:\"line1\";N;s:5:\"line2\";N;s:11:\"postal_code\";N;s:5:\"state\";N;}s:5:\"email\";N;s:4:\"name\";s:20:\"syndeyuche@yahoo.com\";s:5:\"phone\";N;}s:8:\"captured\";b:1;s:7:\"created\";i:1567333131;s:8:\"currency\";s:3:\"usd\";s:8:\"customer\";N;s:11:\"description\";N;s:11:\"destination\";N;s:7:\"dispute\";N;s:12:\"failure_code\";N;s:15:\"failure_message\";N;s:13:\"fraud_details\";a:0:{}s:7:\"invoice\";N;s:8:\"livemode\";b:0;s:8:\"metadata\";a:0:{}s:12:\"on_behalf_of\";N;s:5:\"order\";N;s:7:\"outcome\";a:6:{s:14:\"network_status\";s:19:\"approved_by_network\";s:6:\"reason\";N;s:10:\"risk_level\";s:6:\"normal\";s:10:\"risk_score\";i:59;s:14:\"seller_message\";s:17:\"Payment complete.\";s:4:\"type\";s:10:\"authorized\";}s:4:\"paid\";b:1;s:14:\"payment_intent\";N;s:14:\"payment_method\";s:29:\"card_1FDq8yFtMvsLnTJwhw84dyT9\";s:22:\"payment_method_details\";a:2:{s:4:\"card\";a:10:{s:5:\"brand\";s:4:\"visa\";s:6:\"checks\";a:3:{s:19:\"address_line1_check\";N;s:25:\"address_postal_code_check\";N;s:9:\"cvc_check\";s:4:\"pass\";}s:7:\"country\";s:2:\"US\";s:9:\"exp_month\";i:11;s:8:\"exp_year\";i:2035;s:11:\"fingerprint\";s:16:\"5D6oBWpS44LLEnnJ\";s:7:\"funding\";s:7:\"unknown\";s:5:\"last4\";s:4:\"1111\";s:14:\"three_d_secure\";N;s:6:\"wallet\";N;}s:4:\"type\";s:4:\"card\";}s:13:\"receipt_email\";N;s:14:\"receipt_number\";N;s:11:\"receipt_url\";s:118:\"https://pay.stripe.com/receipts/acct_1F3A0fFtMvsLnTJw/ch_1FDq91FtMvsLnTJwoOTnCSkI/rcpt_FjIkMUtAVvx7jpjffh6Uh32BwlevCrs\";s:8:\"refunded\";b:0;s:7:\"refunds\";a:5:{s:6:\"object\";s:4:\"list\";s:4:\"data\";a:0:{}s:8:\"has_more\";b:0;s:11:\"total_count\";i:0;s:3:\"url\";s:47:\"/v1/charges/ch_1FDq91FtMvsLnTJwoOTnCSkI/refunds\";}s:6:\"review\";N;s:8:\"shipping\";N;s:6:\"source\";a:23:{s:2:\"id\";s:29:\"card_1FDq8yFtMvsLnTJwhw84dyT9\";s:6:\"object\";s:4:\"card\";s:12:\"address_city\";N;s:15:\"address_country\";N;s:13:\"address_line1\";N;s:19:\"address_line1_check\";N;s:13:\"address_line2\";N;s:13:\"address_state\";N;s:11:\"address_zip\";N;s:17:\"address_zip_check\";N;s:5:\"brand\";s:4:\"Visa\";s:7:\"country\";s:2:\"US\";s:8:\"customer\";N;s:9:\"cvc_check\";s:4:\"pass\";s:13:\"dynamic_last4\";N;s:9:\"exp_month\";i:11;s:8:\"exp_year\";i:2035;s:11:\"fingerprint\";s:16:\"5D6oBWpS44LLEnnJ\";s:7:\"funding\";s:7:\"unknown\";s:5:\"last4\";s:4:\"1111\";s:8:\"metadata\";a:0:{}s:4:\"name\";s:20:\"syndeyuche@yahoo.com\";s:19:\"tokenization_method\";N;}s:15:\"source_transfer\";N;s:20:\"statement_descriptor\";N;s:27:\"statement_descriptor_suffix\";N;s:6:\"status\";s:9:\"succeeded\";s:13:\"transfer_data\";N;s:14:\"transfer_group\";N;}s:10:\"\0*\0_values\";a:43:{s:2:\"id\";s:27:\"ch_1FDq91FtMvsLnTJwoOTnCSkI\";s:6:\"object\";s:6:\"charge\";s:6:\"amount\";i:960;s:15:\"amount_refunded\";i:0;s:11:\"application\";N;s:15:\"application_fee\";N;s:22:\"application_fee_amount\";N;s:19:\"balance_transaction\";s:28:\"txn_1FDq92FtMvsLnTJwcGQ6ONDi\";s:15:\"billing_details\";O:19:\"Stripe\\StripeObject\":7:{s:8:\"\0*\0_opts\";r:3;s:18:\"\0*\0_originalValues\";a:4:{s:7:\"address\";a:6:{s:4:\"city\";N;s:7:\"country\";N;s:5:\"line1\";N;s:5:\"line2\";N;s:11:\"postal_code\";N;s:5:\"state\";N;}s:5:\"email\";N;s:4:\"name\";s:20:\"syndeyuche@yahoo.com\";s:5:\"phone\";N;}s:10:\"\0*\0_values\";a:4:{s:7:\"address\";O:19:\"Stripe\\StripeObject\":7:{s:8:\"\0*\0_opts\";r:3;s:18:\"\0*\0_originalValues\";a:6:{s:4:\"city\";N;s:7:\"country\";N;s:5:\"line1\";N;s:5:\"line2\";N;s:11:\"postal_code\";N;s:5:\"state\";N;}s:10:\"\0*\0_values\";a:6:{s:4:\"city\";N;s:7:\"country\";N;s:5:\"line1\";N;s:5:\"line2\";N;s:11:\"postal_code\";N;s:5:\"state\";N;}s:17:\"\0*\0_unsavedValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_transientValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_retrieveOptions\";a:0:{}s:16:\"\0*\0_lastResponse\";N;}s:5:\"email\";N;s:4:\"name\";s:20:\"syndeyuche@yahoo.com\";s:5:\"phone\";N;}s:17:\"\0*\0_unsavedValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_transientValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_retrieveOptions\";a:0:{}s:16:\"\0*\0_lastResponse\";N;}s:8:\"captured\";b:1;s:7:\"created\";i:1567333131;s:8:\"currency\";s:3:\"usd\";s:8:\"customer\";N;s:11:\"description\";N;s:11:\"destination\";N;s:7:\"dispute\";N;s:12:\"failure_code\";N;s:15:\"failure_message\";N;s:13:\"fraud_details\";a:0:{}s:7:\"invoice\";N;s:8:\"livemode\";b:0;s:8:\"metadata\";O:19:\"Stripe\\StripeObject\":7:{s:8:\"\0*\0_opts\";r:3;s:18:\"\0*\0_originalValues\";a:0:{}s:10:\"\0*\0_values\";a:0:{}s:17:\"\0*\0_unsavedValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_transientValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_retrieveOptions\";a:0:{}s:16:\"\0*\0_lastResponse\";N;}s:12:\"on_behalf_of\";N;s:5:\"order\";N;s:7:\"outcome\";O:19:\"Stripe\\StripeObject\":7:{s:8:\"\0*\0_opts\";r:3;s:18:\"\0*\0_originalValues\";a:6:{s:14:\"network_status\";s:19:\"approved_by_network\";s:6:\"reason\";N;s:10:\"risk_level\";s:6:\"normal\";s:10:\"risk_score\";i:59;s:14:\"seller_message\";s:17:\"Payment complete.\";s:4:\"type\";s:10:\"authorized\";}s:10:\"\0*\0_values\";a:6:{s:14:\"network_status\";s:19:\"approved_by_network\";s:6:\"reason\";N;s:10:\"risk_level\";s:6:\"normal\";s:10:\"risk_score\";i:59;s:14:\"seller_message\";s:17:\"Payment complete.\";s:4:\"type\";s:10:\"authorized\";}s:17:\"\0*\0_unsavedValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_transientValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_retrieveOptions\";a:0:{}s:16:\"\0*\0_lastResponse\";N;}s:4:\"paid\";b:1;s:14:\"payment_intent\";N;s:14:\"payment_method\";s:29:\"card_1FDq8yFtMvsLnTJwhw84dyT9\";s:22:\"payment_method_details\";O:19:\"Stripe\\StripeObject\":7:{s:8:\"\0*\0_opts\";r:3;s:18:\"\0*\0_originalValues\";a:2:{s:4:\"card\";a:10:{s:5:\"brand\";s:4:\"visa\";s:6:\"checks\";a:3:{s:19:\"address_line1_check\";N;s:25:\"address_postal_code_check\";N;s:9:\"cvc_check\";s:4:\"pass\";}s:7:\"country\";s:2:\"US\";s:9:\"exp_month\";i:11;s:8:\"exp_year\";i:2035;s:11:\"fingerprint\";s:16:\"5D6oBWpS44LLEnnJ\";s:7:\"funding\";s:7:\"unknown\";s:5:\"last4\";s:4:\"1111\";s:14:\"three_d_secure\";N;s:6:\"wallet\";N;}s:4:\"type\";s:4:\"card\";}s:10:\"\0*\0_values\";a:2:{s:4:\"card\";O:19:\"Stripe\\StripeObject\":7:{s:8:\"\0*\0_opts\";r:3;s:18:\"\0*\0_originalValues\";a:10:{s:5:\"brand\";s:4:\"visa\";s:6:\"checks\";a:3:{s:19:\"address_line1_check\";N;s:25:\"address_postal_code_check\";N;s:9:\"cvc_check\";s:4:\"pass\";}s:7:\"country\";s:2:\"US\";s:9:\"exp_month\";i:11;s:8:\"exp_year\";i:2035;s:11:\"fingerprint\";s:16:\"5D6oBWpS44LLEnnJ\";s:7:\"funding\";s:7:\"unknown\";s:5:\"last4\";s:4:\"1111\";s:14:\"three_d_secure\";N;s:6:\"wallet\";N;}s:10:\"\0*\0_values\";a:10:{s:5:\"brand\";s:4:\"visa\";s:6:\"checks\";O:19:\"Stripe\\StripeObject\":7:{s:8:\"\0*\0_opts\";r:3;s:18:\"\0*\0_originalValues\";a:3:{s:19:\"address_line1_check\";N;s:25:\"address_postal_code_check\";N;s:9:\"cvc_check\";s:4:\"pass\";}s:10:\"\0*\0_values\";a:3:{s:19:\"address_line1_check\";N;s:25:\"address_postal_code_check\";N;s:9:\"cvc_check\";s:4:\"pass\";}s:17:\"\0*\0_unsavedValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_transientValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_retrieveOptions\";a:0:{}s:16:\"\0*\0_lastResponse\";N;}s:7:\"country\";s:2:\"US\";s:9:\"exp_month\";i:11;s:8:\"exp_year\";i:2035;s:11:\"fingerprint\";s:16:\"5D6oBWpS44LLEnnJ\";s:7:\"funding\";s:7:\"unknown\";s:5:\"last4\";s:4:\"1111\";s:14:\"three_d_secure\";N;s:6:\"wallet\";N;}s:17:\"\0*\0_unsavedValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_transientValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_retrieveOptions\";a:0:{}s:16:\"\0*\0_lastResponse\";N;}s:4:\"type\";s:4:\"card\";}s:17:\"\0*\0_unsavedValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_transientValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_retrieveOptions\";a:0:{}s:16:\"\0*\0_lastResponse\";N;}s:13:\"receipt_email\";N;s:14:\"receipt_number\";N;s:11:\"receipt_url\";s:118:\"https://pay.stripe.com/receipts/acct_1F3A0fFtMvsLnTJw/ch_1FDq91FtMvsLnTJwoOTnCSkI/rcpt_FjIkMUtAVvx7jpjffh6Uh32BwlevCrs\";s:8:\"refunded\";b:0;s:7:\"refunds\";O:17:\"Stripe\\Collection\":8:{s:17:\"\0*\0_requestParams\";a:0:{}s:8:\"\0*\0_opts\";r:3;s:18:\"\0*\0_originalValues\";a:5:{s:6:\"object\";s:4:\"list\";s:4:\"data\";a:0:{}s:8:\"has_more\";b:0;s:11:\"total_count\";i:0;s:3:\"url\";s:47:\"/v1/charges/ch_1FDq91FtMvsLnTJwoOTnCSkI/refunds\";}s:10:\"\0*\0_values\";a:5:{s:6:\"object\";s:4:\"list\";s:4:\"data\";a:0:{}s:8:\"has_more\";b:0;s:11:\"total_count\";i:0;s:3:\"url\";s:47:\"/v1/charges/ch_1FDq91FtMvsLnTJwoOTnCSkI/refunds\";}s:17:\"\0*\0_unsavedValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_transientValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_retrieveOptions\";a:0:{}s:16:\"\0*\0_lastResponse\";N;}s:6:\"review\";N;s:8:\"shipping\";N;s:6:\"source\";O:11:\"Stripe\\Card\":8:{s:14:\"saveWithParent\";b:0;s:8:\"\0*\0_opts\";r:3;s:18:\"\0*\0_originalValues\";a:23:{s:2:\"id\";s:29:\"card_1FDq8yFtMvsLnTJwhw84dyT9\";s:6:\"object\";s:4:\"card\";s:12:\"address_city\";N;s:15:\"address_country\";N;s:13:\"address_line1\";N;s:19:\"address_line1_check\";N;s:13:\"address_line2\";N;s:13:\"address_state\";N;s:11:\"address_zip\";N;s:17:\"address_zip_check\";N;s:5:\"brand\";s:4:\"Visa\";s:7:\"country\";s:2:\"US\";s:8:\"customer\";N;s:9:\"cvc_check\";s:4:\"pass\";s:13:\"dynamic_last4\";N;s:9:\"exp_month\";i:11;s:8:\"exp_year\";i:2035;s:11:\"fingerprint\";s:16:\"5D6oBWpS44LLEnnJ\";s:7:\"funding\";s:7:\"unknown\";s:5:\"last4\";s:4:\"1111\";s:8:\"metadata\";a:0:{}s:4:\"name\";s:20:\"syndeyuche@yahoo.com\";s:19:\"tokenization_method\";N;}s:10:\"\0*\0_values\";a:23:{s:2:\"id\";s:29:\"card_1FDq8yFtMvsLnTJwhw84dyT9\";s:6:\"object\";s:4:\"card\";s:12:\"address_city\";N;s:15:\"address_country\";N;s:13:\"address_line1\";N;s:19:\"address_line1_check\";N;s:13:\"address_line2\";N;s:13:\"address_state\";N;s:11:\"address_zip\";N;s:17:\"address_zip_check\";N;s:5:\"brand\";s:4:\"Visa\";s:7:\"country\";s:2:\"US\";s:8:\"customer\";N;s:9:\"cvc_check\";s:4:\"pass\";s:13:\"dynamic_last4\";N;s:9:\"exp_month\";i:11;s:8:\"exp_year\";i:2035;s:11:\"fingerprint\";s:16:\"5D6oBWpS44LLEnnJ\";s:7:\"funding\";s:7:\"unknown\";s:5:\"last4\";s:4:\"1111\";s:8:\"metadata\";O:19:\"Stripe\\StripeObject\":7:{s:8:\"\0*\0_opts\";r:3;s:18:\"\0*\0_originalValues\";a:0:{}s:10:\"\0*\0_values\";a:0:{}s:17:\"\0*\0_unsavedValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_transientValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_retrieveOptions\";a:0:{}s:16:\"\0*\0_lastResponse\";N;}s:4:\"name\";s:20:\"syndeyuche@yahoo.com\";s:19:\"tokenization_method\";N;}s:17:\"\0*\0_unsavedValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_transientValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_retrieveOptions\";a:0:{}s:16:\"\0*\0_lastResponse\";N;}s:15:\"source_transfer\";N;s:20:\"statement_descriptor\";N;s:27:\"statement_descriptor_suffix\";N;s:6:\"status\";s:9:\"succeeded\";s:13:\"transfer_data\";N;s:14:\"transfer_group\";N;}s:17:\"\0*\0_unsavedValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_transientValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_retrieveOptions\";a:0:{}s:16:\"\0*\0_lastResponse\";O:18:\"Stripe\\ApiResponse\":4:{s:7:\"headers\";a:14:{s:6:\"Server\";s:5:\"nginx\";s:4:\"Date\";s:29:\"Sun, 01 Sep 2019 10:18:52 GMT\";s:12:\"Content-Type\";s:16:\"application/json\";s:14:\"Content-Length\";s:4:\"2817\";s:10:\"Connection\";s:10:\"keep-alive\";s:32:\"access-control-allow-credentials\";s:4:\"true\";s:28:\"access-control-allow-methods\";s:32:\"GET, POST, HEAD, OPTIONS, DELETE\";s:27:\"access-control-allow-origin\";s:1:\"*\";s:29:\"access-control-expose-headers\";s:104:\"Request-Id, Stripe-Manage-Version, X-Stripe-External-Auth-Required, X-Stripe-Privileged-Session-Required\";s:22:\"access-control-max-age\";s:3:\"300\";s:13:\"cache-control\";s:18:\"no-cache, no-store\";s:10:\"request-id\";s:18:\"req_U2Z3DQbcJrBQOr\";s:14:\"stripe-version\";s:10:\"2019-05-16\";s:25:\"Strict-Transport-Security\";s:44:\"max-age=31556926; includeSubDomains; preload\";}s:4:\"body\";s:2817:\"{\n  \"id\": \"ch_1FDq91FtMvsLnTJwoOTnCSkI\",\n  \"object\": \"charge\",\n  \"amount\": 960,\n  \"amount_refunded\": 0,\n  \"application\": null,\n  \"application_fee\": null,\n  \"application_fee_amount\": null,\n  \"balance_transaction\": \"txn_1FDq92FtMvsLnTJwcGQ6ONDi\",\n  \"billing_details\": {\n    \"address\": {\n      \"city\": null,\n      \"country\": null,\n      \"line1\": null,\n      \"line2\": null,\n      \"postal_code\": null,\n      \"state\": null\n    },\n    \"email\": null,\n    \"name\": \"syndeyuche@yahoo.com\",\n    \"phone\": null\n  },\n  \"captured\": true,\n  \"created\": 1567333131,\n  \"currency\": \"usd\",\n  \"customer\": null,\n  \"description\": null,\n  \"destination\": null,\n  \"dispute\": null,\n  \"failure_code\": null,\n  \"failure_message\": null,\n  \"fraud_details\": {\n  },\n  \"invoice\": null,\n  \"livemode\": false,\n  \"metadata\": {\n  },\n  \"on_behalf_of\": null,\n  \"order\": null,\n  \"outcome\": {\n    \"network_status\": \"approved_by_network\",\n    \"reason\": null,\n    \"risk_level\": \"normal\",\n    \"risk_score\": 59,\n    \"seller_message\": \"Payment complete.\",\n    \"type\": \"authorized\"\n  },\n  \"paid\": true,\n  \"payment_intent\": null,\n  \"payment_method\": \"card_1FDq8yFtMvsLnTJwhw84dyT9\",\n  \"payment_method_details\": {\n    \"card\": {\n      \"brand\": \"visa\",\n      \"checks\": {\n        \"address_line1_check\": null,\n        \"address_postal_code_check\": null,\n        \"cvc_check\": \"pass\"\n      },\n      \"country\": \"US\",\n      \"exp_month\": 11,\n      \"exp_year\": 2035,\n      \"fingerprint\": \"5D6oBWpS44LLEnnJ\",\n      \"funding\": \"unknown\",\n      \"last4\": \"1111\",\n      \"three_d_secure\": null,\n      \"wallet\": null\n    },\n    \"type\": \"card\"\n  },\n  \"receipt_email\": null,\n  \"receipt_number\": null,\n  \"receipt_url\": \"https://pay.stripe.com/receipts/acct_1F3A0fFtMvsLnTJw/ch_1FDq91FtMvsLnTJwoOTnCSkI/rcpt_FjIkMUtAVvx7jpjffh6Uh32BwlevCrs\",\n  \"refunded\": false,\n  \"refunds\": {\n    \"object\": \"list\",\n    \"data\": [\n\n    ],\n    \"has_more\": false,\n    \"total_count\": 0,\n    \"url\": \"/v1/charges/ch_1FDq91FtMvsLnTJwoOTnCSkI/refunds\"\n  },\n  \"review\": null,\n  \"shipping\": null,\n  \"source\": {\n    \"id\": \"card_1FDq8yFtMvsLnTJwhw84dyT9\",\n    \"object\": \"card\",\n    \"address_city\": null,\n    \"address_country\": null,\n    \"address_line1\": null,\n    \"address_line1_check\": null,\n    \"address_line2\": null,\n    \"address_state\": null,\n    \"address_zip\": null,\n    \"address_zip_check\": null,\n    \"brand\": \"Visa\",\n    \"country\": \"US\",\n    \"customer\": null,\n    \"cvc_check\": \"pass\",\n    \"dynamic_last4\": null,\n    \"exp_month\": 11,\n    \"exp_year\": 2035,\n    \"fingerprint\": \"5D6oBWpS44LLEnnJ\",\n    \"funding\": \"unknown\",\n    \"last4\": \"1111\",\n    \"metadata\": {\n    },\n    \"name\": \"syndeyuche@yahoo.com\",\n    \"tokenization_method\": null\n  },\n  \"source_transfer\": null,\n  \"statement_descriptor\": null,\n  \"statement_descriptor_suffix\": null,\n  \"status\": \"succeeded\",\n  \"transfer_data\": null,\n  \"transfer_group\": null\n}\n\";s:4:\"json\";a:43:{s:2:\"id\";s:27:\"ch_1FDq91FtMvsLnTJwoOTnCSkI\";s:6:\"object\";s:6:\"charge\";s:6:\"amount\";i:960;s:15:\"amount_refunded\";i:0;s:11:\"application\";N;s:15:\"application_fee\";N;s:22:\"application_fee_amount\";N;s:19:\"balance_transaction\";s:28:\"txn_1FDq92FtMvsLnTJwcGQ6ONDi\";s:15:\"billing_details\";a:4:{s:7:\"address\";a:6:{s:4:\"city\";N;s:7:\"country\";N;s:5:\"line1\";N;s:5:\"line2\";N;s:11:\"postal_code\";N;s:5:\"state\";N;}s:5:\"email\";N;s:4:\"name\";s:20:\"syndeyuche@yahoo.com\";s:5:\"phone\";N;}s:8:\"captured\";b:1;s:7:\"created\";i:1567333131;s:8:\"currency\";s:3:\"usd\";s:8:\"customer\";N;s:11:\"description\";N;s:11:\"destination\";N;s:7:\"dispute\";N;s:12:\"failure_code\";N;s:15:\"failure_message\";N;s:13:\"fraud_details\";a:0:{}s:7:\"invoice\";N;s:8:\"livemode\";b:0;s:8:\"metadata\";a:0:{}s:12:\"on_behalf_of\";N;s:5:\"order\";N;s:7:\"outcome\";a:6:{s:14:\"network_status\";s:19:\"approved_by_network\";s:6:\"reason\";N;s:10:\"risk_level\";s:6:\"normal\";s:10:\"risk_score\";i:59;s:14:\"seller_message\";s:17:\"Payment complete.\";s:4:\"type\";s:10:\"authorized\";}s:4:\"paid\";b:1;s:14:\"payment_intent\";N;s:14:\"payment_method\";s:29:\"card_1FDq8yFtMvsLnTJwhw84dyT9\";s:22:\"payment_method_details\";a:2:{s:4:\"card\";a:10:{s:5:\"brand\";s:4:\"visa\";s:6:\"checks\";a:3:{s:19:\"address_line1_check\";N;s:25:\"address_postal_code_check\";N;s:9:\"cvc_check\";s:4:\"pass\";}s:7:\"country\";s:2:\"US\";s:9:\"exp_month\";i:11;s:8:\"exp_year\";i:2035;s:11:\"fingerprint\";s:16:\"5D6oBWpS44LLEnnJ\";s:7:\"funding\";s:7:\"unknown\";s:5:\"last4\";s:4:\"1111\";s:14:\"three_d_secure\";N;s:6:\"wallet\";N;}s:4:\"type\";s:4:\"card\";}s:13:\"receipt_email\";N;s:14:\"receipt_number\";N;s:11:\"receipt_url\";s:118:\"https://pay.stripe.com/receipts/acct_1F3A0fFtMvsLnTJw/ch_1FDq91FtMvsLnTJwoOTnCSkI/rcpt_FjIkMUtAVvx7jpjffh6Uh32BwlevCrs\";s:8:\"refunded\";b:0;s:7:\"refunds\";a:5:{s:6:\"object\";s:4:\"list\";s:4:\"data\";a:0:{}s:8:\"has_more\";b:0;s:11:\"total_count\";i:0;s:3:\"url\";s:47:\"/v1/charges/ch_1FDq91FtMvsLnTJwoOTnCSkI/refunds\";}s:6:\"review\";N;s:8:\"shipping\";N;s:6:\"source\";a:23:{s:2:\"id\";s:29:\"card_1FDq8yFtMvsLnTJwhw84dyT9\";s:6:\"object\";s:4:\"card\";s:12:\"address_city\";N;s:15:\"address_country\";N;s:13:\"address_line1\";N;s:19:\"address_line1_check\";N;s:13:\"address_line2\";N;s:13:\"address_state\";N;s:11:\"address_zip\";N;s:17:\"address_zip_check\";N;s:5:\"brand\";s:4:\"Visa\";s:7:\"country\";s:2:\"US\";s:8:\"customer\";N;s:9:\"cvc_check\";s:4:\"pass\";s:13:\"dynamic_last4\";N;s:9:\"exp_month\";i:11;s:8:\"exp_year\";i:2035;s:11:\"fingerprint\";s:16:\"5D6oBWpS44LLEnnJ\";s:7:\"funding\";s:7:\"unknown\";s:5:\"last4\";s:4:\"1111\";s:8:\"metadata\";a:0:{}s:4:\"name\";s:20:\"syndeyuche@yahoo.com\";s:19:\"tokenization_method\";N;}s:15:\"source_transfer\";N;s:20:\"statement_descriptor\";N;s:27:\"statement_descriptor_suffix\";N;s:6:\"status\";s:9:\"succeeded\";s:13:\"transfer_data\";N;s:14:\"transfer_group\";N;}s:4:\"code\";i:200;}}',	'2019-09-01 10:18:52',	'2019-09-01 10:18:52');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(30) NOT NULL,
  `mobile` varchar(100) DEFAULT NULL,
  `b_month` varchar(500) DEFAULT NULL,
  `b_year` varchar(500) DEFAULT NULL,
  `gender` varchar(500) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `userEmail` varchar(60) NOT NULL,
  `userPass` varchar(500) NOT NULL,
  `referral_code` varchar(255) DEFAULT NULL,
  `rand_number` varchar(255) NOT NULL,
  `user_status` varchar(100) NOT NULL,
  `tos_buy` varchar(100) DEFAULT NULL,
  `tos_follow` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`userId`),
  UNIQUE KEY `userEmail` (`userEmail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users` (`userId`, `userName`, `mobile`, `b_month`, `b_year`, `gender`, `city`, `country`, `userEmail`, `userPass`, `referral_code`, `rand_number`, `user_status`, `tos_buy`, `tos_follow`) VALUES
(24,	'Hassan Zaidi',	'03445141413',	'November',	'1986',	'Male',	'Rawalpindi',	'Pakistan',	'hassanzaidiksa@gmail.com',	'e10adc3949ba59abbe56e057f20f883e',	'',	'1',	'Active',	NULL,	NULL),
(25,	'Ali Akbar',	'03445141412',	'',	'',	'',	'',	'',	'aliakbar@gmail.com',	'e10adc3949ba59abbe56e057f20f883e',	'',	'1',	'Active',	NULL,	NULL),
(33,	'Syed Hassan Mujtaba Zaidi',	'+923445141413',	'November',	'1986',	'Male',	'Rawalpindi',	'Pakistan',	'chunjzaidi@gmail.com',	'96e79218965eb72c92a549dd5a330112',	'',	'1',	'Active',	NULL,	NULL),
(35,	'testing',	'',	'',	'',	'',	'',	'',	'email@gmail.com',	'ee3edeab2d3a8eafa67fbc373fb4e36b',	NULL,	'5353',	'Active',	NULL,	NULL),
(38,	'Jafarali',	'',	'March',	'1993',	'Male',	'',	'India',	'jafaraliwork14@gmail.com',	'b3eda933fc59195e9677c232d200a43c',	'IMOMUE3WVH',	'1',	'Active',	'1',	'1'),
(41,	'Sidney  Biodun Okoli',	'',	'',	'',	'',	'',	'',	'sidney@gmail.com',	'4c8d0de9b085bc008f2a2235918b63ae',	NULL,	'3849',	'Active',	NULL,	NULL),
(42,	'test test',	'',	'',	'',	'',	'',	'',	'test@gmail.com',	'e10adc3949ba59abbe56e057f20f883e',	NULL,	'6200',	'Active',	NULL,	NULL),
(43,	'test developer',	'',	'',	'',	'',	'',	'',	'developer3236@gmail.com',	'3ea1d7abbca2b03d2ef5b295244eeebb',	NULL,	'1',	'Active',	NULL,	NULL),
(44,	'sv sfg',	'',	'',	'',	'',	'',	'',	'agb@gmail.com',	'e86fdc2283aff4717103f2d44d0610f7',	NULL,	'6721',	'Active',	NULL,	NULL),
(45,	'testing',	'',	'',	'',	'',	'',	'',	'xip2me@gmail.com',	'1f0b539445c675b0551acb9b284e40f8',	'AYR02X77FR',	'1',	'Active',	NULL,	NULL),
(46,	'test',	'',	'',	'',	'',	'',	'',	'brightprogrammers786@gmail.com',	'e10adc3949ba59abbe56e057f20f883e',	'L30QFI3XF8',	'1421',	'Active',	NULL,	NULL),
(49,	'zeus',	'',	'',	'',	'',	'',	'',	'zeus_hx@outlook.com',	'67f36e1520d8c9c2555e62e6f8fb207a',	NULL,	'4012',	'Active',	NULL,	NULL),
(50,	'starking',	'',	'',	'',	'',	'',	'',	'star_king19990603@outlook.com',	'b3089cdb9f6efc79d6d407a0f6a53d20',	'ITPHVQQQ5U',	'1',	'Active',	NULL,	NULL),
(51,	'Jafarali Maknojiya',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'maknojiya440@gmail.com',	'edd0148259f6c80396515003f3406d9d',	NULL,	'1',	'Active',	NULL,	NULL),
(52,	'Ali',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'ali1@gmail.com',	'b3eda933fc59195e9677c232d200a43c',	'XSC4NXYCPY',	'1',	'Active',	NULL,	NULL),
(53,	'Ali Two',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'ali2@gmail.com',	'a66cfcd2a94f880617c9cfebb24c484a',	'2CL1LWJLRP',	'1',	'Active',	NULL,	'1'),
(54,	'Ali Three',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'ali3@gmail.com',	'c2241d72635ed55436b2c57633e34e80',	'41F46BNIG7',	'1',	'Active',	NULL,	NULL),
(55,	'Ali Four',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'ali4@gmail.com',	'79943da6befaa601afa7d79c6686a1fa',	'T0RFDCO0SS',	'1',	'Active',	NULL,	NULL),
(56,	'manar nasser',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'manarabonasser19982018@gmail.com',	'370fcd9273bb9535ca65cd7755a1bc15',	NULL,	'5176',	'Active',	NULL,	NULL),
(57,	'Manar',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'manarabunasser19982018@gmail.com',	'25f9e794323b453885f5181f1b624d0b',	'D5UL6SWXHK',	'1',	'Active',	NULL,	NULL),
(58,	'Henry',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'followmyass.com@gmail.com',	'2e185c971648859f0e65745d289c9d8c',	NULL,	'363',	'Active',	NULL,	NULL),
(60,	'MingYi',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'filipnikifirov001@gmail.com',	'709b96261757e8f819ca78653caf1a56',	'LGSX6SISK1',	'1',	'Active',	'1',	'1'),
(61,	'Xiuna',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'hgh141592_71@outlook.com',	'1aa2f2ac3376aba3a09714abc1b1c3e8',	'3QJZFYU9M0',	'1',	'Active',	NULL,	'1'),
(63,	'Jafarali Maknojiya',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'devalimail14@gmail.com',	'b3eda933fc59195e9677c232d200a43c',	NULL,	'1',	'Active',	NULL,	NULL),
(64,	'Jafar',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'jafaralideveloper@gmail.com',	'acee238592f099f0615a22935c84e1f9',	NULL,	'2322',	'Active',	NULL,	NULL),
(65,	'test',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'mail@yacine.com',	'e10adc3949ba59abbe56e057f20f883e',	NULL,	'9792',	'Active',	NULL,	NULL),
(66,	'Testx',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'text@maul.com',	'e10adc3949ba59abbe56e057f20f883e',	NULL,	'5445',	'Active',	NULL,	NULL),
(67,	'Tommy foxy',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'TommyQuickk@gmail.com',	'8bbb0b70ff148c08315dbed913e9ff2f',	'IT0QJQJYR6',	'1',	'Active',	NULL,	NULL),
(68,	'test',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'mirimabog@it-simple.net',	'e10adc3949ba59abbe56e057f20f883e',	NULL,	'1969',	'Active',	NULL,	NULL),
(69,	'testing',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'wefer@amail3.com',	'e10adc3949ba59abbe56e057f20f883e',	NULL,	'6479',	'Active',	NULL,	NULL),
(71,	'Prizafal',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'prizafal@gmail.com',	'c818542178c4aef9519fa78774778077',	'S17FFQZC7A',	'1',	'Active',	NULL,	'1'),
(72,	'curt F',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'cxfox@godaddy.com',	'722eda2d1e71efafa5ebc4158ddde65b',	NULL,	'7203',	'Active',	NULL,	NULL),
(74,	'free',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'pavel.kus1993@mail.ru',	'98a9c12a85dc1dfe303bb0c000855e97',	NULL,	'5396',	'Active',	NULL,	NULL),
(75,	'admin',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'henrylipscombplayz3@gmail.com',	'2e185c971648859f0e65745d289c9d8c',	NULL,	'9349',	'Active',	NULL,	NULL),
(103,	'Henry',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'rocketleaguecompp@gmail.com',	'2e185c971648859f0e65745d289c9d8c',	NULL,	'5975',	'Active',	NULL,	NULL),
(104,	'Henry',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'henrylipscomb@gmail.com',	'2e185c971648859f0e65745d289c9d8c',	NULL,	'7160',	'Active',	NULL,	NULL),
(105,	'henryyyy',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'henrylipscombplayz4@gmail.com',	'2e185c971648859f0e65745d289c9d8c',	NULL,	'8262',	'Active',	NULL,	NULL);

DROP TABLE IF EXISTS `user_sponsors`;
CREATE TABLE `user_sponsors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `sponsor_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `user_sponsors` (`id`, `userId`, `sponsor_id`) VALUES
(1,	51,	38),
(2,	52,	38),
(3,	55,	54);

DROP TABLE IF EXISTS `wallet`;
CREATE TABLE `wallet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `wallet` (`id`, `userId`, `amount`) VALUES
(10,	38,	303.91),
(11,	0,	0.13),
(12,	36,	57.97),
(13,	54,	1.20),
(14,	61,	0.38),
(15,	71,	0.93),
(16,	53,	1.53),
(17,	60,	1.03),
(18,	99,	0.07);

DROP TABLE IF EXISTS `wallet_history`;
CREATE TABLE `wallet_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `amount_type` enum('Credit','Debit') NOT NULL,
  `added_at` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `wallet_history` (`id`, `userId`, `title`, `amount`, `total_amount`, `amount_type`, `added_at`) VALUES
(25,	38,	'This is temp follow for money.',	5.00,	13.00,	'Credit',	'2019-07-22 08:19:46'),
(24,	36,	'This is temp follow for money.',	0.01,	0.02,	'Credit',	'2019-07-22 02:26:04'),
(23,	36,	'This is temp follow for money.',	0.01,	0.01,	'Credit',	'2019-07-21 17:54:16'),
(22,	0,	'This is temp follow for money.',	0.05,	0.06,	'Credit',	'2019-07-20 15:27:26'),
(21,	0,	'This is temp follow for money.',	0.01,	0.01,	'Credit',	'2019-07-20 15:12:48'),
(20,	38,	'This is temp follow for money.',	3.00,	8.00,	'Credit',	'2019-07-18 16:13:15'),
(19,	38,	'This is temp follow for money.',	5.00,	5.00,	'Credit',	'2019-07-19 16:13:08'),
(26,	36,	'This is temp follow for money.',	0.01,	0.03,	'Credit',	'2019-07-22 15:49:14'),
(27,	38,	'This is temp follow for money.',	3.00,	16.00,	'Credit',	'2019-07-23 04:06:08'),
(28,	38,	'This is temp follow for money.',	5.00,	21.00,	'Credit',	'2019-07-24 13:19:34'),
(29,	38,	'This is temp follow for money.',	5.00,	26.00,	'Credit',	'2019-07-24 13:21:14'),
(30,	38,	'This is temp follow for money.',	5.00,	31.00,	'Credit',	'2019-07-24 13:21:42'),
(31,	38,	'Paypal gift card sent of 10',	10.00,	11.00,	'Debit',	'2019-07-25 04:36:27'),
(32,	38,	'Paypal gift card sent on email of $10',	10.00,	1.00,	'Debit',	'2019-07-25 04:38:37'),
(33,	38,	'This is temp follow for money.',	15.00,	16.00,	'Credit',	'2019-07-25 17:25:22'),
(34,	38,	'This is temp follow for money.',	30.00,	46.00,	'Credit',	'2019-07-25 17:25:30'),
(35,	38,	'Paypal gift card sent on email of $10',	10.00,	36.00,	'Debit',	'2019-07-25 17:33:49'),
(36,	38,	'Paypal gift card sent on email of $10',	10.00,	26.00,	'Debit',	'2019-07-25 17:34:55'),
(37,	38,	'Paypal gift card sent on email of $10',	10.00,	16.00,	'Debit',	'2019-07-25 17:36:10'),
(38,	38,	'Paypal gift card sent on email of $10',	10.00,	6.00,	'Debit',	'2019-07-25 17:36:27'),
(39,	38,	'This is temp follow for money.',	30.00,	36.00,	'Credit',	'2019-07-25 17:37:01'),
(40,	38,	'Paypal gift card sent on email of $10',	10.00,	26.00,	'Debit',	'2019-07-25 17:56:20'),
(41,	38,	'Paypal gift card sent on email of $10',	10.00,	16.00,	'Debit',	'2019-07-26 03:22:45'),
(42,	38,	'Paypal gift card sent on email of $10',	10.00,	6.00,	'Debit',	'2019-07-26 03:26:02'),
(43,	38,	'This is temp follow for money.',	30.00,	36.00,	'Credit',	'2019-07-26 03:29:29'),
(44,	38,	'Amazon gift card sent on email of $30',	30.00,	6.00,	'Debit',	'2019-07-26 03:30:25'),
(45,	38,	'This is temp follow for money.',	30.00,	36.00,	'Credit',	'2019-07-26 13:43:53'),
(46,	38,	'Paypal gift card sent on email of $10',	10.00,	26.00,	'Debit',	'2019-07-26 13:58:08'),
(47,	38,	'Paypal gift card sent on email of $10',	10.00,	16.00,	'Debit',	'2019-07-26 14:01:26'),
(48,	38,	'Paypal gift card sent on email of $10',	10.00,	6.00,	'Debit',	'2019-07-26 14:06:28'),
(49,	38,	'This is temp follow for money.',	30.00,	36.00,	'Credit',	'2019-07-26 14:08:39'),
(50,	38,	'Paypal gift card sent on email of $10',	10.00,	26.00,	'Debit',	'2019-07-26 14:08:43'),
(51,	36,	'This is temp follow for money.',	30.00,	30.03,	'Credit',	'2019-07-26 16:42:10'),
(52,	36,	'This is temp follow for money.',	30.00,	60.03,	'Credit',	'2019-07-26 16:42:14'),
(53,	36,	'Paypal gift card sent on email of $5',	5.00,	55.03,	'Debit',	'2019-07-26 16:42:58'),
(54,	36,	'This is temp follow for money.',	3.00,	58.03,	'Credit',	'2019-07-26 16:56:47'),
(55,	38,	'Paypal gift card sent on email of $5',	5.00,	21.00,	'Debit',	'2019-07-26 16:58:52'),
(56,	38,	'This is temp follow for money.',	5.00,	26.00,	'Credit',	'2019-07-27 06:05:27'),
(57,	38,	'This is temp follow for money.',	5.00,	31.00,	'Credit',	'2019-07-27 06:05:33'),
(58,	38,	'Amazon gift card sent on email of $10',	10.00,	21.00,	'Debit',	'2019-07-27 06:21:01'),
(59,	38,	'This is temp follow for money.',	30.00,	51.00,	'Credit',	'2019-07-27 08:22:15'),
(60,	38,	'This is temp follow for money.',	50.00,	101.00,	'Credit',	'2019-07-27 13:51:28'),
(61,	38,	'This is temp follow for money.',	50.00,	151.00,	'Credit',	'2019-07-27 13:51:41'),
(62,	38,	'This is temp follow for money.',	50.00,	201.00,	'Credit',	'2019-07-27 13:51:48'),
(63,	38,	'This is temp follow for money.',	50.00,	251.00,	'Credit',	'2019-07-27 13:51:55'),
(64,	38,	'This is temp follow for money.',	50.00,	301.00,	'Credit',	'2019-07-27 13:52:01'),
(65,	36,	'This is temp follow for money.',	3.00,	61.03,	'Credit',	'2019-07-30 23:44:18'),
(66,	36,	'Paypal gift card sent on email of $5',	5.00,	56.03,	'Debit',	'2019-07-30 23:45:09'),
(67,	0,	'This is temp follow for money.',	0.01,	0.07,	'Credit',	'2019-08-03 15:21:26'),
(68,	0,	'This is temp follow for money.',	0.05,	0.12,	'Credit',	'2019-08-03 15:35:58'),
(69,	0,	'This is temp follow for money.',	0.01,	0.13,	'Credit',	'2019-08-04 04:42:11'),
(70,	36,	'This is temp follow for money.',	0.01,	56.04,	'Credit',	'2019-08-04 04:55:54'),
(71,	38,	'You earn $0.95 money from admin Profile',	0.95,	301.95,	'Credit',	'2019-08-13 14:50:39'),
(72,	38,	'You earn $0.95 money from admin Profile',	0.95,	302.90,	'Credit',	'2019-08-13 14:57:33'),
(73,	54,	'You just get bonud $1.2 from your follower by completing his order.',	1.20,	1.20,	'Credit',	'2019-08-13 14:57:33'),
(74,	36,	'You earn $0.95 money from jafar Profile',	0.95,	56.99,	'Credit',	'2019-08-15 20:45:50'),
(75,	38,	'You earn $0.95 money from Crypto jebb Profile',	0.95,	303.85,	'Credit',	'2019-08-17 06:57:01'),
(76,	61,	'You earn $0.19 money from Crypto Jebb Profile',	0.19,	0.19,	'Credit',	'2019-08-17 10:01:13'),
(77,	61,	'You earn $0.19 money from Crypto Jebb Profile',	0.19,	0.38,	'Credit',	'2019-08-17 10:01:36'),
(78,	36,	'You earn $0.76 money from jafar440 Profile',	0.76,	57.75,	'Credit',	'2019-08-18 16:52:00'),
(79,	38,	'You earn $0.0095 money from Impaulsive Profile',	0.01,	303.86,	'Credit',	'2019-08-28 04:45:38'),
(80,	38,	'You earn $0.0285 money from V? Hung Profile',	0.03,	303.89,	'Credit',	'2019-08-28 04:46:09'),
(81,	36,	'You earn $0.019 money from Followmyass.com Profile',	0.02,	57.77,	'Credit',	'2019-08-29 00:45:52'),
(82,	36,	'You earn $0.0475 money from Product Testing Profile',	0.05,	57.82,	'Credit',	'2019-08-29 00:45:52'),
(83,	36,	'You earn $0.019 money from Rocket League Profile',	0.02,	57.84,	'Credit',	'2019-08-29 00:45:52'),
(84,	71,	'You earn $0.931 money from maknojiya440 Profile',	0.93,	0.93,	'Credit',	'2019-08-29 11:36:37'),
(85,	53,	'You earn $0.76 money from chirag Profile',	0.76,	0.76,	'Credit',	'2019-08-29 14:23:28'),
(86,	53,	'You earn $0.0095 money from Impaulsive Profile',	0.01,	0.77,	'Credit',	'2019-08-29 14:24:20'),
(87,	53,	'You earn $0.76 money from maknojiya440 Profile',	0.76,	1.53,	'Credit',	'2019-08-29 14:24:20'),
(88,	60,	'You earn $0.019 money from Followmyass.com Profile',	0.02,	0.02,	'Credit',	'2019-08-31 17:21:44'),
(89,	60,	'You earn $0.0285 money from Hypixel Profile',	0.03,	0.05,	'Credit',	'2019-08-31 17:23:22'),
(90,	60,	'You earn $0.931 money from maknojiya440 Profile',	0.93,	0.98,	'Credit',	'2019-08-31 17:25:38'),
(91,	38,	'You earn $0.019 money from Discordservers.me Profile',	0.02,	303.91,	'Credit',	'2019-09-01 18:46:17'),
(92,	36,	'You earn $0.019 money from Discordservers.me Profile',	0.02,	57.86,	'Credit',	'2019-09-01 21:05:12'),
(93,	36,	'You earn $0.019 money from Discordservers.me Profile',	0.02,	57.88,	'Credit',	'2019-09-03 03:58:32'),
(94,	60,	'You earn $0.019 money from queenlatifah Profile',	0.02,	1.00,	'Credit',	'2019-09-03 04:11:42'),
(95,	60,	'You earn $0.0285 money from yahea_xx Profile',	0.03,	1.03,	'Credit',	'2019-09-03 04:13:23'),
(96,	36,	'You earn $0.019 money from queenlatifah Profile',	0.02,	57.90,	'Credit',	'2019-09-03 21:43:33'),
(97,	36,	'You earn $0.0665 money from Henry Profile',	0.07,	57.97,	'Credit',	'2019-09-03 21:48:21'),
(98,	99,	'You earn $0.019 money from Discordservers.me Profile',	0.02,	0.02,	'Credit',	'2019-09-04 01:04:27'),
(99,	99,	'You earn $0.0475 money from Product Testing Profile',	0.05,	0.07,	'Credit',	'2019-09-04 01:04:27');

-- 2019-09-04 05:06:07
