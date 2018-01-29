/*
Navicat MySQL Data Transfer

Source Server         : My
Source Server Version : 50018
Source Host           : 127.0.0.1:3306
Source Database       : exam

Target Server Type    : MYSQL
Target Server Version : 50018
File Encoding         : 65001

Date: 2017-08-25 17:16:00
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for put_prog
-- ----------------------------
DROP TABLE IF EXISTS `put_prog`;
CREATE TABLE `put_prog` (
  `prog_id` int(11) NOT NULL auto_increment,
  `works_id` int(11) default NULL,
  `type_id` int(11) default NULL,
  PRIMARY KEY  (`prog_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of put_prog
-- ----------------------------
INSERT INTO `put_prog` VALUES ('1', '16', '6');
INSERT INTO `put_prog` VALUES ('2', '14', '6');
INSERT INTO `put_prog` VALUES ('3', '11', '6');
INSERT INTO `put_prog` VALUES ('4', '9', '6');
INSERT INTO `put_prog` VALUES ('5', '7', '3');
INSERT INTO `put_prog` VALUES ('6', '5', '6');
INSERT INTO `put_prog` VALUES ('7', '1', '2');
INSERT INTO `put_prog` VALUES ('8', '3', '5');
INSERT INTO `put_prog` VALUES ('9', '2', '3');
INSERT INTO `put_prog` VALUES ('10', '16', '6');
INSERT INTO `put_prog` VALUES ('11', '14', '6');
INSERT INTO `put_prog` VALUES ('12', '11', '6');
INSERT INTO `put_prog` VALUES ('13', '9', '6');
INSERT INTO `put_prog` VALUES ('14', '7', '3');

-- ----------------------------
-- Table structure for put_role
-- ----------------------------
DROP TABLE IF EXISTS `put_role`;
CREATE TABLE `put_role` (
  `role_id` int(11) NOT NULL auto_increment,
  `role_name` varchar(30) default NULL,
  PRIMARY KEY  (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of put_role
-- ----------------------------
INSERT INTO `put_role` VALUES ('1', '总导演');
INSERT INTO `put_role` VALUES ('2', '匿名导演');

-- ----------------------------
-- Table structure for put_role_url
-- ----------------------------
DROP TABLE IF EXISTS `put_role_url`;
CREATE TABLE `put_role_url` (
  `role_id` int(11) NOT NULL,
  `url_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of put_role_url
-- ----------------------------
INSERT INTO `put_role_url` VALUES ('2', '2');
INSERT INTO `put_role_url` VALUES ('2', '3');
INSERT INTO `put_role_url` VALUES ('2', '4');
INSERT INTO `put_role_url` VALUES ('2', '5');
INSERT INTO `put_role_url` VALUES ('2', '6');

-- ----------------------------
-- Table structure for put_type
-- ----------------------------
DROP TABLE IF EXISTS `put_type`;
CREATE TABLE `put_type` (
  `type_id` int(11) NOT NULL auto_increment,
  `type_name` varchar(255) default NULL,
  `parent_id` int(11) default NULL,
  PRIMARY KEY  (`type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of put_type
-- ----------------------------
INSERT INTO `put_type` VALUES ('1', '娱乐', '0');
INSERT INTO `put_type` VALUES ('2', '小品', '1');
INSERT INTO `put_type` VALUES ('3', '相声', '1');
INSERT INTO `put_type` VALUES ('4', '杂技', '0');
INSERT INTO `put_type` VALUES ('5', '空中飞人', '4');
INSERT INTO `put_type` VALUES ('6', '飞', '4');

-- ----------------------------
-- Table structure for put_url
-- ----------------------------
DROP TABLE IF EXISTS `put_url`;
CREATE TABLE `put_url` (
  `url_id` int(11) NOT NULL auto_increment,
  `url_name` varchar(30) default NULL,
  `url` varchar(30) default NULL,
  PRIMARY KEY  (`url_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of put_url
-- ----------------------------
INSERT INTO `put_url` VALUES ('1', '审核列表', 'index_c/audit');
INSERT INTO `put_url` VALUES ('2', '节目清单', 'index_c/show');
INSERT INTO `put_url` VALUES ('3', '节目发布', 'index_c/add');
INSERT INTO `put_url` VALUES ('4', '节目列表', 'index_c/user_show');
INSERT INTO `put_url` VALUES ('5', '节目发布执行', 'index_c/add_do');

-- ----------------------------
-- Table structure for put_user
-- ----------------------------
DROP TABLE IF EXISTS `put_user`;
CREATE TABLE `put_user` (
  `user_id` int(11) NOT NULL auto_increment,
  `user_name` varchar(30) default NULL,
  `user_pwd` char(32) default NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of put_user
-- ----------------------------
INSERT INTO `put_user` VALUES ('1', 'zhangsan', '96e79218965eb72c92a549dd5a330112');
INSERT INTO `put_user` VALUES ('2', 'lisi', '96e79218965eb72c92a549dd5a330112');

-- ----------------------------
-- Table structure for put_user_role
-- ----------------------------
DROP TABLE IF EXISTS `put_user_role`;
CREATE TABLE `put_user_role` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of put_user_role
-- ----------------------------
INSERT INTO `put_user_role` VALUES ('1', '1');
INSERT INTO `put_user_role` VALUES ('2', '2');

-- ----------------------------
-- Table structure for put_works
-- ----------------------------
DROP TABLE IF EXISTS `put_works`;
CREATE TABLE `put_works` (
  `works_id` int(11) NOT NULL auto_increment,
  `works_name` varchar(30) default NULL,
  `works_time` varchar(30) default NULL,
  `works_member` varchar(30) default NULL,
  `works_audit` int(1) default '0' COMMENT '0代表未审核1代表审核',
  `user_id` int(11) default NULL,
  `type_id` int(11) default NULL,
  `works_sort` int(11) default '10',
  PRIMARY KEY  (`works_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of put_works
-- ----------------------------
INSERT INTO `put_works` VALUES ('1', '影视', '2017-7-28', '王宝,小花', '1', '1', '2', '1');
INSERT INTO `put_works` VALUES ('2', '小说', '2018-7-28', '嘻哈,小白', '1', '1', '3', '2');
INSERT INTO `put_works` VALUES ('3', '大冒险', '2017-7-30', '小红,小子', '1', '1', '5', '3');
INSERT INTO `put_works` VALUES ('5', '快板', '2017-7-28', '小白,小许', '1', '1', '6', '4');
INSERT INTO `put_works` VALUES ('7', '唐人', '2017-7-28', '小紫', '1', '1', '3', '13');
INSERT INTO `put_works` VALUES ('8', '京剧', '2018-7-28', '啊哈', '0', null, '2', '100');
INSERT INTO `put_works` VALUES ('9', '动画', '2017-7-28', '哈哈', '1', '1', '6', '9');
INSERT INTO `put_works` VALUES ('11', '影视', '2017-7-28', '王宝', '1', '1', '6', '9');
INSERT INTO `put_works` VALUES ('12', '小说', '2017-7-29', '嘻哈', '0', '1', '6', '8');
INSERT INTO `put_works` VALUES ('13', '大冒险', '2017-7-27', '小红', '0', null, '6', '7');
INSERT INTO `put_works` VALUES ('14', '笑话', '2017-7-28', '小明', '1', '1', '6', '11');
INSERT INTO `put_works` VALUES ('15', '快板', '2017-7-28', '小白', '0', null, '3', '4');
INSERT INTO `put_works` VALUES ('16', '口技', '2017-7-28', '小黑', '1', '1', '6', '100');
