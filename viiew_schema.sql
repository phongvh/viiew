/*
Navicat MySQL Data Transfer

Source Server         : localprice
Source Server Version : 50625
Source Host           : localhost:3306
Source Database       : viiew

Target Server Type    : MYSQL
Target Server Version : 50625
File Encoding         : 65001

Date: 2017-04-01 10:03:50
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `places`
-- ----------------------------
DROP TABLE IF EXISTS `places`;
CREATE TABLE `places` (
`id`  int(11) NOT NULL ,
`place_id`  varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`name`  varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`types`  text CHARACTER SET utf8 COLLATE utf8_general_ci NULL ,
`adr_address`  varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`formatted_address`  varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`formatted_phone_number`  varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`address_components`  text CHARACTER SET utf8 COLLATE utf8_general_ci NULL ,
`geometry`  text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`lat`  double NOT NULL ,
`lng`  double NOT NULL ,
`html_attributions`  text CHARACTER SET utf8 COLLATE utf8_general_ci NULL ,
`icon`  varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`international_phone_number`  varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`opening_hours`  text CHARACTER SET utf8 COLLATE utf8_general_ci NULL ,
`photos`  text CHARACTER SET utf8 COLLATE utf8_general_ci NULL ,
`rating`  float NULL DEFAULT NULL ,
`reviews`  longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL ,
`scope`  varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`tz`  varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`url`  varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`user_ratings_total`  int(11) NULL DEFAULT NULL ,
`utc_offset`  int(11) NULL DEFAULT NULL ,
`vicinity`  varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`website`  varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`source`  varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`created`  timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ,
`updated`  timestamp NULL DEFAULT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci

;

-- ----------------------------
-- Table structure for `places_plans`
-- ----------------------------
DROP TABLE IF EXISTS `places_plans`;
CREATE TABLE `places_plans` (
`id`  int(11) NOT NULL ,
`plan_id`  int(11) NOT NULL ,
`place_id`  int(11) NOT NULL ,
`order`  tinyint(4) NOT NULL ,
`visited`  tinyint(1) NOT NULL DEFAULT 0 ,
`visited_date`  datetime NULL DEFAULT NULL ,
`created`  timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ,
`updated`  timestamp NULL DEFAULT NULL ,
PRIMARY KEY (`id`),
FOREIGN KEY (`place_id`) REFERENCES `places` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci

;

-- ----------------------------
-- Table structure for `plans`
-- ----------------------------
DROP TABLE IF EXISTS `plans`;
CREATE TABLE `plans` (
`id`  int(11) NOT NULL ,
`name`  varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`long_id`  varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`short_id`  varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`description`  varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`created`  timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ,
`updated`  timestamp NULL DEFAULT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci

;

-- ----------------------------
-- Table structure for `records`
-- ----------------------------
DROP TABLE IF EXISTS `records`;
CREATE TABLE `records` (
`id`  int(10) UNSIGNED NOT NULL ,
`longid`  varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`name`  varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`privateid`  varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`timezone`  varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Asia/Saigon' ,
`time`  varchar(13) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`longitude`  double NULL DEFAULT NULL ,
`latitude`  double NULL DEFAULT NULL ,
`user_agent`  varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`ipaddress`  varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`answer`  varchar(3) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`user_position`  varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci

;

-- ----------------------------
-- Table structure for `showme`
-- ----------------------------
DROP TABLE IF EXISTS `showme`;
CREATE TABLE `showme` (
`id`  int(10) UNSIGNED NOT NULL ,
`rid`  int(10) UNSIGNED NOT NULL ,
`time`  varchar(13) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
`longitude`  double NULL DEFAULT NULL ,
`latitude`  double NULL DEFAULT NULL ,
`user_agent`  varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL ,
`ipaddress`  varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL ,
`clicks`  int(5) UNSIGNED NULL DEFAULT 1 ,
PRIMARY KEY (`id`),
FOREIGN KEY (`rid`) REFERENCES `records` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_unicode_ci

;

-- ----------------------------
-- Indexes structure for table `places`
-- ----------------------------
CREATE UNIQUE INDEX `place_id` ON `places`(`place_id`) USING BTREE ;

-- ----------------------------
-- Indexes structure for table `places_plans`
-- ----------------------------
CREATE INDEX `fk_pp_place_id` ON `places_plans`(`place_id`) USING BTREE ;
CREATE INDEX `fk_pp_plan_id` ON `places_plans`(`plan_id`) USING BTREE ;

-- ----------------------------
-- Indexes structure for table `plans`
-- ----------------------------
CREATE UNIQUE INDEX `pl_short_id` ON `plans`(`short_id`) USING BTREE ;
CREATE UNIQUE INDEX `pl_long_id` ON `plans`(`long_id`) USING BTREE ;

-- ----------------------------
-- Indexes structure for table `records`
-- ----------------------------
CREATE UNIQUE INDEX `id` ON `records`(`id`) USING BTREE ;
CREATE UNIQUE INDEX `longid` ON `records`(`longid`) USING BTREE ;

-- ----------------------------
-- Indexes structure for table `showme`
-- ----------------------------
CREATE INDEX `id` ON `showme`(`id`) USING BTREE ;
CREATE INDEX `rid` ON `showme`(`rid`) USING BTREE ;
