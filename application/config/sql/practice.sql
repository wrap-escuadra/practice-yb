/*
Navicat MySQL Data Transfer

Source Server         : MYSQL_LOCAL
Source Server Version : 50524
Source Host           : localhost:3306
Source Database       : practice

Target Server Type    : MYSQL
Target Server Version : 50524
File Encoding         : 65001

Date: 2018-05-09 05:01:45
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `lu_school_batches`
-- ----------------------------
DROP TABLE IF EXISTS `lu_school_batches`;
CREATE TABLE `lu_school_batches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `school_id` bigint(20) NOT NULL,
  `batch_year` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lu_school_batches
-- ----------------------------

-- ----------------------------
-- Table structure for `lu_school_status`
-- ----------------------------
DROP TABLE IF EXISTS `lu_school_status`;
CREATE TABLE `lu_school_status` (
  `id` smallint(6) NOT NULL DEFAULT '0',
  `status_desc` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lu_school_status
-- ----------------------------
INSERT INTO `lu_school_status` VALUES ('0', 'Inactive');
INSERT INTO `lu_school_status` VALUES ('1', 'Active');

-- ----------------------------
-- Table structure for `lu_student_awards`
-- ----------------------------
DROP TABLE IF EXISTS `lu_student_awards`;
CREATE TABLE `lu_student_awards` (
  `award_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `award_description` varchar(100) DEFAULT NULL,
  `student_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`award_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lu_student_awards
-- ----------------------------
INSERT INTO `lu_student_awards` VALUES ('1', 'fsdf', '1');
INSERT INTO `lu_student_awards` VALUES ('2', 'award', '1');
INSERT INTO `lu_student_awards` VALUES ('3', 'award2', '1');
INSERT INTO `lu_student_awards` VALUES ('4', 'rwtert', '3');
INSERT INTO `lu_student_awards` VALUES ('5', 'first honor', '11');
INSERT INTO `lu_student_awards` VALUES ('6', 'best in math', '11');
INSERT INTO `lu_student_awards` VALUES ('7', 'CumLaude', '12');
INSERT INTO `lu_student_awards` VALUES ('8', '1st honor', '0');
INSERT INTO `lu_student_awards` VALUES ('9', 'best in english', '0');
INSERT INTO `lu_student_awards` VALUES ('10', 'one award', '0');
INSERT INTO `lu_student_awards` VALUES ('11', 'two award', '0');
INSERT INTO `lu_student_awards` VALUES ('12', 'test award one', '26');
INSERT INTO `lu_student_awards` VALUES ('13', 'test award two', '26');
INSERT INTO `lu_student_awards` VALUES ('14', 'test awrd three', '26');
INSERT INTO `lu_student_awards` VALUES ('15', 'test pic award 1', '27');
INSERT INTO `lu_student_awards` VALUES ('16', 'test pic award2', '27');
INSERT INTO `lu_student_awards` VALUES ('17', 'katokon of the year`', '28');
INSERT INTO `lu_student_awards` VALUES ('18', 'valedictorian', '43');
INSERT INTO `lu_student_awards` VALUES ('19', 'best in late', '47');

-- ----------------------------
-- Table structure for `lu_user_roles`
-- ----------------------------
DROP TABLE IF EXISTS `lu_user_roles`;
CREATE TABLE `lu_user_roles` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_desc` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lu_user_roles
-- ----------------------------
INSERT INTO `lu_user_roles` VALUES ('1', 'Admin');
INSERT INTO `lu_user_roles` VALUES ('2', 'School Admin');
INSERT INTO `lu_user_roles` VALUES ('3', 'School Encoder');
INSERT INTO `lu_user_roles` VALUES ('4', 'Student');

-- ----------------------------
-- Table structure for `lu_yb_images`
-- ----------------------------
DROP TABLE IF EXISTS `lu_yb_images`;
CREATE TABLE `lu_yb_images` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `student_id` bigint(20) DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lu_yb_images
-- ----------------------------
INSERT INTO `lu_yb_images` VALUES ('1', '1', 'dust sprite-totoro.jpg');
INSERT INTO `lu_yb_images` VALUES ('2', '11', 'IMG_0539.JPG');
INSERT INTO `lu_yb_images` VALUES ('3', '11', 'IMG_0540.JPG');
INSERT INTO `lu_yb_images` VALUES ('4', '12', 'IMG_05391.JPG');
INSERT INTO `lu_yb_images` VALUES ('5', '12', 'IMG_05401.JPG');
INSERT INTO `lu_yb_images` VALUES ('6', '0', 'IMG_05392.JPG');
INSERT INTO `lu_yb_images` VALUES ('7', '0', 'IMG_05402.JPG');
INSERT INTO `lu_yb_images` VALUES ('8', '0', 'IMG_0542.JPG');
INSERT INTO `lu_yb_images` VALUES ('9', '27', 'IMG_05393.JPG');
INSERT INTO `lu_yb_images` VALUES ('10', '27', 'IMG_05403.JPG');
INSERT INTO `lu_yb_images` VALUES ('11', '27', 'IMG_05421.JPG');
INSERT INTO `lu_yb_images` VALUES ('12', '45', 'minimal1.jpg');
INSERT INTO `lu_yb_images` VALUES ('13', '45', 'minimal2.jpg');
INSERT INTO `lu_yb_images` VALUES ('14', '46', 'minimal11.jpg');
INSERT INTO `lu_yb_images` VALUES ('15', '46', 'minimal21.jpg');
INSERT INTO `lu_yb_images` VALUES ('16', '47', 'ERR_GEN_DTR_S.JPG');
INSERT INTO `lu_yb_images` VALUES ('17', '47', 'GENERATE_AR_AP_error.PNG');
INSERT INTO `lu_yb_images` VALUES ('18', '47', 'report_structure.JPG');

-- ----------------------------
-- Table structure for `mt_courses`
-- ----------------------------
DROP TABLE IF EXISTS `mt_courses`;
CREATE TABLE `mt_courses` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_code` varchar(20) DEFAULT NULL,
  `course_desc` varchar(100) DEFAULT NULL,
  `school_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mt_courses
-- ----------------------------
INSERT INTO `mt_courses` VALUES ('1', 'BSN', 'Bachelor of Science in Nursing', '23');
INSERT INTO `mt_courses` VALUES ('2', 'BSIT', 'Bachelor of Science in Information Technology', '23');
INSERT INTO `mt_courses` VALUES ('3', 'SAD', 'sasdasd', '23');
INSERT INTO `mt_courses` VALUES ('4', 'KMAF', 'afdsdf', '23');
INSERT INTO `mt_courses` VALUES ('5', 'ASDF', 'asdf', '23');
INSERT INTO `mt_courses` VALUES ('6', 'A', 'a', '23');
INSERT INTO `mt_courses` VALUES ('7', 'ABCDA', 'abcda', '23');
INSERT INTO `mt_courses` VALUES ('8', 'S', 's', '23');
INSERT INTO `mt_courses` VALUES ('9', 'AAA', 'aaa', '23');

-- ----------------------------
-- Table structure for `mt_faculties`
-- ----------------------------
DROP TABLE IF EXISTS `mt_faculties`;
CREATE TABLE `mt_faculties` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `school_id` bigint(20) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `mobile` varchar(11) DEFAULT NULL,
  `landline` varchar(11) DEFAULT NULL,
  `user_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mt_faculties
-- ----------------------------
INSERT INTO `mt_faculties` VALUES ('9', '23', 'admin', 'school', 'one', 'sa@mail.com', '2017-06-19 15:27:56', '415452222', '4542222222', '12');
INSERT INTO `mt_faculties` VALUES ('10', '26', 'Roxas', 'Radmin', '', 'tihs@mail.com', '2017-11-02 18:27:04', '1234567980', '', '32');

-- ----------------------------
-- Table structure for `mt_schools`
-- ----------------------------
DROP TABLE IF EXISTS `mt_schools`;
CREATE TABLE `mt_schools` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `school_name` varchar(100) DEFAULT NULL,
  `school_abbr` varchar(10) DEFAULT NULL,
  `school_address` varchar(150) DEFAULT NULL,
  `school_city` varchar(50) DEFAULT NULL,
  `school_region` varchar(50) DEFAULT NULL,
  `school_country` varchar(50) DEFAULT NULL,
  `school_description` text,
  `school_logo` varchar(100) DEFAULT NULL,
  `school_banner` varchar(100) DEFAULT NULL,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` smallint(6) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mt_schools
-- ----------------------------
INSERT INTO `mt_schools` VALUES ('23', 'TESTING SCHOOL', 'TS', 'Jaro Iloilo City', 'Iloilo', 'Region IV', 'Philippines', '', null, null, '2017-11-04 17:27:12', '0');
INSERT INTO `mt_schools` VALUES ('26', 'Test I High School', 'TIHS', 'addres test', 'Roxas Capiz', 'Region VI', 'Philippines', '', null, null, '2017-11-02 20:01:19', '0');
INSERT INTO `mt_schools` VALUES ('27', 'Antiqui Elementary School', 'AES', 'San Jose St, San Jose', 'San Jose', 'Region VII', 'Philippines', 'School Mission\r\nThe quick brown Fox\r\nSchool Vision\r\nJumps over the lazy dog', null, null, '2017-11-02 19:39:38', '1');
INSERT INTO `mt_schools` VALUES ('28', 'school one school', 'SOS', 'test address', 'Cebu', '', 'Philippines', '', null, null, '2018-02-06 15:10:40', '1');

-- ----------------------------
-- Table structure for `mt_school_levels`
-- ----------------------------
DROP TABLE IF EXISTS `mt_school_levels`;
CREATE TABLE `mt_school_levels` (
  `sch_level_id` int(11) NOT NULL AUTO_INCREMENT,
  `sch_level_desc` varchar(70) NOT NULL,
  PRIMARY KEY (`sch_level_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mt_school_levels
-- ----------------------------
INSERT INTO `mt_school_levels` VALUES ('1', 'Kindergarten');
INSERT INTO `mt_school_levels` VALUES ('2', 'Elementary');
INSERT INTO `mt_school_levels` VALUES ('3', 'High School');
INSERT INTO `mt_school_levels` VALUES ('4', 'Associate');
INSERT INTO `mt_school_levels` VALUES ('5', 'Bachelor');
INSERT INTO `mt_school_levels` VALUES ('6', 'Masters');
INSERT INTO `mt_school_levels` VALUES ('7', 'Doctoral');
INSERT INTO `mt_school_levels` VALUES ('8', 'Others');

-- ----------------------------
-- Table structure for `mt_students`
-- ----------------------------
DROP TABLE IF EXISTS `mt_students`;
CREATE TABLE `mt_students` (
  `profile_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `school_id` bigint(20) NOT NULL,
  `batch_year` varchar(9) DEFAULT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `user_id` bigint(20) NOT NULL,
  `course_id` bigint(20) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `last_update` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`profile_id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mt_students
-- ----------------------------
INSERT INTO `mt_students` VALUES ('15', '23', '2017', 'Juan', 'Cruz', 'de la', '2017-07-05', '18', '1', '4', '', null);
INSERT INTO `mt_students` VALUES ('16', '23', '2017', 'Juan', 'cruz', 'de la', '2017-07-12', '19', '1', '4', '', null);
INSERT INTO `mt_students` VALUES ('17', '23', '2017', 'Juan', 'cruz', 'le la', '2017-07-11', '20', '1', '4', '', null);
INSERT INTO `mt_students` VALUES ('18', '23', '2017', 'Juan', 'Cruz', 'de la', '2017-07-07', '21', '1', '4', '', null);
INSERT INTO `mt_students` VALUES ('19', '23', '2017', 'Juan', 'Cruz', 'de la', '2017-07-07', '22', '1', '4', '', null);
INSERT INTO `mt_students` VALUES ('20', '23', '2017', 'Juan', 'Cruz', 'de la', '2017-07-06', '23', '1', '4', '', null);
INSERT INTO `mt_students` VALUES ('21', '23', '2017', 'first', 'test', 'midale', '2017-07-14', '24', '1', '4', '', null);
INSERT INTO `mt_students` VALUES ('22', '23', '2017', 'user', 'name', 'm', '2017-07-11', '25', '1', '4', 'mail@mail.com', null);
INSERT INTO `mt_students` VALUES ('23', '23', '2017', 'user', 'name', '', '2017-07-06', '26', '1', '4', 'mail@sjdfl.com', null);
INSERT INTO `mt_students` VALUES ('24', '23', '2017', 'user', 'test', '', '2017-07-14', '27', '1', '4', '', null);
INSERT INTO `mt_students` VALUES ('25', '23', '2017', 'award', 'test', 'midelle', '2017-07-14', '28', '1', '4', '', null);
INSERT INTO `mt_students` VALUES ('26', '23', '2017', 'award', 'test', '', '2017-07-15', '29', '1', '4', '', null);
INSERT INTO `mt_students` VALUES ('27', '23', '2017', 'gradpic', 'test', '', '1998-12-31', '30', '1', '4', 'myemail@mail.com', null);
INSERT INTO `mt_students` VALUES ('28', '23', '2012', 'sfd', 'asdf', 'sfad', '2017-10-06', '31', '1', '4', 'test@mail.com', null);
INSERT INTO `mt_students` VALUES ('46', '26', '2017', 'firstname', 'Roxas', 'mname', '2017-11-02', '50', '1', '4', 'test@mail.com', '2017-11-02 19:28:53');
INSERT INTO `mt_students` VALUES ('47', '23', '2018', 'asdf', 'asdf', 'asdf', '2000-10-05', '51', '2', '4', 'test@mail.com', '2018-02-06 14:53:32');

-- ----------------------------
-- Table structure for `mt_users`
-- ----------------------------
DROP TABLE IF EXISTS `mt_users`;
CREATE TABLE `mt_users` (
  `user_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_role` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mt_users
-- ----------------------------
INSERT INTO `mt_users` VALUES ('1', 'admin', 'dc766ef5454d29c977f611312301bd4c', '1');
INSERT INTO `mt_users` VALUES ('12', 'schooladmin', '6ce7e0f9cb84c0ccf426acb9dccc914e', '2');
INSERT INTO `mt_users` VALUES ('18', 'JuanCruz', 'bd85e13582fa795ad001ecaf80e19e5a', '4');
INSERT INTO `mt_users` VALUES ('19', 'juancruz_1', 'b4f83a452e46667020079b3bf693ea71', '4');
INSERT INTO `mt_users` VALUES ('20', 'juancruz_2', '671fb463939413f4355fa44015d4a818', '4');
INSERT INTO `mt_users` VALUES ('21', 'juancruz_3', '18d2063f6b06fb860bf238abc2ffcedd', '4');
INSERT INTO `mt_users` VALUES ('22', 'juancruz_4', 'f49f27e95c74e251fb2720a7ce820009', '4');
INSERT INTO `mt_users` VALUES ('23', 'juancruz_5', '52427f36eedec2e09cf104fddcd323c2', '4');
INSERT INTO `mt_users` VALUES ('24', 'firsttest', '0de00fa286f94f448b4048b17a283eb7', '4');
INSERT INTO `mt_users` VALUES ('25', 'username', '14c4b06b824ec593239362517f538b29', '4');
INSERT INTO `mt_users` VALUES ('26', 'username_1', 'a405068e65505ade0506aced16afc56c', '4');
INSERT INTO `mt_users` VALUES ('27', 'usertest', '806b2af4633e64af88d33fbe4165a06a', '4');
INSERT INTO `mt_users` VALUES ('28', 'awardtest', '4b6372a786ead4aafb2206d4b350887c', '4');
INSERT INTO `mt_users` VALUES ('29', 'awardtest_1', 'ce3065a9e8408a652bb42076427f48ba', '4');
INSERT INTO `mt_users` VALUES ('30', 'gradpictest', 'b1e1b7b4e5026b7ed61dcc2e34ef8899', '4');
INSERT INTO `mt_users` VALUES ('31', 'sfdasdf', 'd258400afa1b2446ddc3ac5711de0922', '4');
INSERT INTO `mt_users` VALUES ('32', 'roxasadmin', '597cd59266df3c8cad6141801ec41498', '2');
INSERT INTO `mt_users` VALUES ('50', 'firstnameroxas_1', '0916d716cb6d8345c8bd4da24358171a', '4');
INSERT INTO `mt_users` VALUES ('51', 'asdfasdf', '6a204bd89f3c8348afd5c77c717a097a', '4');

-- ----------------------------
-- Table structure for `mt_yearbooks`
-- ----------------------------
DROP TABLE IF EXISTS `mt_yearbooks`;
CREATE TABLE `mt_yearbooks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `schoolid_and_year` int(11) NOT NULL COMMENT 'school_id + school year',
  `school_id` bigint(20) NOT NULL,
  `school_year` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'should be activated to 1 by system admin',
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mt_yearbooks
-- ----------------------------
INSERT INTO `mt_yearbooks` VALUES ('2', '232017', '23', '2017', '0', '2017-07-16 12:17:29', '12');
INSERT INTO `mt_yearbooks` VALUES ('3', '232012', '23', '2012', '0', '2017-10-15 11:47:28', '12');
INSERT INTO `mt_yearbooks` VALUES ('4', '262011', '26', '2011', '0', '2017-11-02 18:53:33', '32');
INSERT INTO `mt_yearbooks` VALUES ('5', '262017', '26', '2017', '0', '2017-11-02 19:25:15', '32');
INSERT INTO `mt_yearbooks` VALUES ('6', '232018', '23', '2018', '0', '2018-02-06 14:53:32', '12');

-- ----------------------------
-- View structure for `vw_faculties`
-- ----------------------------
DROP VIEW IF EXISTS `vw_faculties`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_faculties` AS select `fac`.`id` AS `id`,`fac`.`school_id` AS `school_id`,`fac`.`first_name` AS `first_name`,`fac`.`last_name` AS `last_name`,`fac`.`middle_name` AS `middle_name`,`fac`.`email` AS `email`,`fac`.`last_updated` AS `last_updated`,`fac`.`mobile` AS `mobile`,`fac`.`landline` AS `landline`,`fac`.`user_id` AS `user_id`,`users`.`username` AS `username`,`users`.`user_role` AS `user_role`,`ur`.`role_desc` AS `role_desc` from ((`mt_faculties` `fac` left join `mt_users` `users` on((`fac`.`user_id` = `users`.`user_id`))) left join `lu_user_roles` `ur` on((`ur`.`role_id` = `users`.`user_role`))) ;

-- ----------------------------
-- View structure for `vw_schools`
-- ----------------------------
DROP VIEW IF EXISTS `vw_schools`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_schools` AS select `sch`.`id` AS `id`,`sch`.`school_name` AS `school_name`,`sch`.`school_abbr` AS `school_abbr`,`sch`.`school_address` AS `school_address`,`sch`.`school_city` AS `school_city`,`sch`.`school_region` AS `school_region`,`sch`.`school_country` AS `school_country`,`sch`.`school_description` AS `school_description`,`sch`.`school_logo` AS `school_logo`,`sch`.`school_banner` AS `school_banner`,`sch`.`last_updated` AS `last_updated`,`sch`.`status` AS `status`,`stat`.`status_desc` AS `status_desc` from (`mt_schools` `sch` left join `lu_school_status` `stat` on((`sch`.`status` = `stat`.`id`))) ;

-- ----------------------------
-- View structure for `vw_students`
-- ----------------------------
DROP VIEW IF EXISTS `vw_students`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_students` AS select `st`.`profile_id` AS `profile_id`,`st`.`school_id` AS `school_id`,`st`.`batch_year` AS `batch_year`,`st`.`first_name` AS `first_name`,`st`.`last_name` AS `last_name`,`st`.`middle_name` AS `middle_name`,`st`.`birth_date` AS `birth_date`,`st`.`course_id` AS `course_id`,`st`.`role_id` AS `role_id`,`st`.`email` AS `email`,`sc`.`school_name` AS `school_name`,`sc`.`school_abbr` AS `school_abbr`,`sc`.`school_address` AS `school_address`,`sc`.`school_city` AS `school_city`,`sc`.`school_region` AS `school_region`,`sc`.`school_country` AS `school_country`,`sc`.`school_description` AS `school_description`,`sc`.`status` AS `status`,`course`.`course_code` AS `course_code`,`course`.`course_desc` AS `course_desc`,`u`.`username` AS `username`,`u`.`user_id` AS `user_id` from (((`mt_students` `st` left join `mt_schools` `sc` on((`st`.`school_id` = `sc`.`id`))) left join `mt_courses` `course` on((`st`.`course_id` = `course`.`course_id`))) left join `mt_users` `u` on((`u`.`user_id` = `st`.`user_id`))) ;

-- ----------------------------
-- View structure for `vw_yearbook`
-- ----------------------------
DROP VIEW IF EXISTS `vw_yearbook`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_yearbook` AS select `y`.`id` AS `yearbook_id`,`y`.`schoolid_and_year` AS `schoolid_and_year`,`y`.`school_id` AS `school_id`,`y`.`status` AS `yearbook_status`,`y`.`created_by` AS `created_by`,`y`.`school_year` AS `school_year`,`s`.`id` AS `id`,`s`.`school_name` AS `school_name`,`s`.`school_abbr` AS `school_abbr`,`s`.`school_address` AS `school_address`,`s`.`school_city` AS `school_city`,`s`.`school_region` AS `school_region`,`s`.`school_country` AS `school_country`,`s`.`school_description` AS `school_description`,`s`.`school_logo` AS `school_logo`,`s`.`school_banner` AS `school_banner`,`s`.`last_updated` AS `last_updated`,`s`.`status` AS `status` from (`mt_yearbooks` `y` left join `mt_schools` `s` on((`y`.`school_id` = `s`.`id`))) ;
