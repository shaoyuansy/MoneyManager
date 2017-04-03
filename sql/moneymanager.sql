/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : moneymanager

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2017-04-03 13:46:49
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for account
-- ----------------------------
DROP TABLE IF EXISTS `account`;
CREATE TABLE `account` (
  `aid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `a_type` varchar(255) DEFAULT NULL,
  `a_money` varchar(255) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `a_remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of account
-- ----------------------------
INSERT INTO `account` VALUES ('1', '现金账户', '0.00', '4', '我的现金账户');
INSERT INTO `account` VALUES ('2', '虚拟账户', '0.00', '4', '我的虚拟账户');
INSERT INTO `account` VALUES ('3', '债权账户', '100.00', '4', '我的债权账户');
INSERT INTO `account` VALUES ('4', '债务账户', '200.00', '4', '我的债务账户');
INSERT INTO `account` VALUES ('5', '信用卡账户', '2700.01', '4', '我的信用卡账户');

-- ----------------------------
-- Table structure for budget
-- ----------------------------
DROP TABLE IF EXISTS `budget`;
CREATE TABLE `budget` (
  `bid` int(11) NOT NULL AUTO_INCREMENT,
  `b_time` datetime DEFAULT NULL COMMENT '预算时间',
  `b_term` varchar(255) DEFAULT NULL COMMENT '预算期限',
  `b_money` varchar(255) DEFAULT NULL,
  `b_remark` varchar(255) DEFAULT NULL COMMENT '备注',
  `uid` int(11) DEFAULT NULL,
  PRIMARY KEY (`bid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of budget
-- ----------------------------

-- ----------------------------
-- Table structure for debtee
-- ----------------------------
DROP TABLE IF EXISTS `debtee`;
CREATE TABLE `debtee` (
  `eid` int(11) NOT NULL AUTO_INCREMENT,
  `e_time` datetime DEFAULT NULL,
  `e_debtee` varchar(255) DEFAULT NULL,
  `e_debtor` varchar(255) DEFAULT NULL,
  `e_money` varchar(255) DEFAULT NULL,
  `e_remark` varchar(255) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  PRIMARY KEY (`eid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of debtee
-- ----------------------------
INSERT INTO `debtee` VALUES ('1', '2017-03-26 15:42:33', '本人', '李四', '200.00', null, '4');

-- ----------------------------
-- Table structure for debtor
-- ----------------------------
DROP TABLE IF EXISTS `debtor`;
CREATE TABLE `debtor` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `r_time` datetime DEFAULT NULL,
  `r_debtee` varchar(255) DEFAULT NULL,
  `r_debtor` varchar(255) DEFAULT NULL,
  `r_money` varchar(255) DEFAULT NULL,
  `r_remark` varchar(255) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of debtor
-- ----------------------------
INSERT INTO `debtor` VALUES ('1', '2017-03-26 15:42:37', '张三', '本人', '100.00', null, '4');

-- ----------------------------
-- Table structure for income
-- ----------------------------
DROP TABLE IF EXISTS `income`;
CREATE TABLE `income` (
  `iid` int(11) NOT NULL AUTO_INCREMENT,
  `i_time` datetime DEFAULT NULL,
  `i_type` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `i_account` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `i_money` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `i_member` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `i_remark` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  PRIMARY KEY (`iid`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf32;

-- ----------------------------
-- Records of income
-- ----------------------------
INSERT INTO `income` VALUES ('1', '2017-01-27 09:23:02', '工资收入', '信用卡', '100', null, null, '4');
INSERT INTO `income` VALUES ('2', '2017-02-27 09:23:04', '工资收入', '现金', '100', null, null, '4');
INSERT INTO `income` VALUES ('3', '2017-03-27 09:23:06', '工资收入', '信用卡', '100', null, null, '4');
INSERT INTO `income` VALUES ('4', '2016-12-27 09:23:54', '工资收入', '信用卡', '100', null, null, '4');
INSERT INTO `income` VALUES ('5', '2016-11-27 09:23:55', '工资收入', '信用卡', '100', null, null, '4');
INSERT INTO `income` VALUES ('6', '2016-10-27 09:23:55', null, null, '100', null, null, '4');
INSERT INTO `income` VALUES ('7', '2017-01-24 09:23:02', null, null, '100', null, null, '4');
INSERT INTO `income` VALUES ('8', '2016-09-27 09:23:55', null, null, '100', null, null, '4');
INSERT INTO `income` VALUES ('11', '2017-04-02 20:32:00', '职业收入', '信用卡', '200', '本人', '你好', '4');
INSERT INTO `income` VALUES ('12', '2017-04-02 20:38:00', '职业收入', '信用卡', '250', '本人', '', '4');
INSERT INTO `income` VALUES ('13', '2017-04-03 13:46:00', '职业收入', '信用卡', '123', '本人', '', '4');

-- ----------------------------
-- Table structure for outgo
-- ----------------------------
DROP TABLE IF EXISTS `outgo`;
CREATE TABLE `outgo` (
  `oid` int(11) NOT NULL AUTO_INCREMENT,
  `o_time` datetime DEFAULT NULL,
  `o_type` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `o_account` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `o_money` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `o_member` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `o_remark` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  PRIMARY KEY (`oid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf32;

-- ----------------------------
-- Records of outgo
-- ----------------------------
INSERT INTO `outgo` VALUES ('1', '2017-03-26 15:14:42', '衣物服饰', '信用卡', '300', '本人', null, '4');
INSERT INTO `outgo` VALUES ('2', '2017-02-26 15:14:42', '衣物服饰', '信用卡', '1000', '本人', null, '4');
INSERT INTO `outgo` VALUES ('3', '2017-03-10 15:14:42', '衣物服饰', '信用卡', '1000', '本人', null, '4');

-- ----------------------------
-- Table structure for sign
-- ----------------------------
DROP TABLE IF EXISTS `sign`;
CREATE TABLE `sign` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `count` int(11) DEFAULT '0',
  `sign_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sign
-- ----------------------------
INSERT INTO `sign` VALUES ('15', '4', '1', '2017-04-02 15:38:10');

-- ----------------------------
-- Table structure for t_account
-- ----------------------------
DROP TABLE IF EXISTS `t_account`;
CREATE TABLE `t_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_account
-- ----------------------------
INSERT INTO `t_account` VALUES ('1', '{\"type\":[\"信用卡\",\"虚拟\",\"现金\",\"债权\",\"债务\"]}', '4');

-- ----------------------------
-- Table structure for t_in
-- ----------------------------
DROP TABLE IF EXISTS `t_in`;
CREATE TABLE `t_in` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_in
-- ----------------------------
INSERT INTO `t_in` VALUES ('1', '{\"type\":[\"职业收入\",\"其他收入\"]}', '4');

-- ----------------------------
-- Table structure for t_member
-- ----------------------------
DROP TABLE IF EXISTS `t_member`;
CREATE TABLE `t_member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf32;

-- ----------------------------
-- Records of t_member
-- ----------------------------
INSERT INTO `t_member` VALUES ('1', '{\"type\":[\"本人\",\"丈夫\",\"妻子\",\"子女\",\"父母\",\"家庭公用\"]}', '4');

-- ----------------------------
-- Table structure for t_out
-- ----------------------------
DROP TABLE IF EXISTS `t_out`;
CREATE TABLE `t_out` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf32;

-- ----------------------------
-- Records of t_out
-- ----------------------------
INSERT INTO `t_out` VALUES ('1', '{\"type\":[\"衣服饰品\",\"食品酒水\",\"居家物业\",\"行车交通\",\"交流通讯\",\"休闲娱乐\",\"学习进修\",\"人情往来\",\"医疗保健\",\"金融保险\",\"其他款项\"]}', '4');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `uid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL COMMENT '账号',
  `password` varchar(255) DEFAULT NULL COMMENT '密码',
  `email` varchar(255) DEFAULT NULL COMMENT '邮箱',
  `sex` varchar(255) DEFAULT NULL COMMENT '性别',
  `phone` varchar(255) DEFAULT NULL COMMENT '手机号',
  `icon` varchar(255) DEFAULT NULL COMMENT '头像',
  `nikename` varchar(255) DEFAULT NULL COMMENT '昵称',
  `last_login_time` datetime DEFAULT NULL COMMENT '最后登陆时间',
  `login_count` int(11) DEFAULT '0' COMMENT '登陆次数',
  `registered_time` datetime DEFAULT NULL COMMENT '注册时间',
  `realname` varchar(255) DEFAULT NULL COMMENT '真实姓名',
  `safe_q_1` varchar(255) DEFAULT NULL COMMENT '安全问题1',
  `safe_q_2` varchar(255) DEFAULT NULL COMMENT '安全问题2',
  `safe_q_3` varchar(255) DEFAULT NULL COMMENT '安全问题3',
  `safe_a_1` varchar(255) DEFAULT NULL COMMENT '答案1',
  `safe_a_2` varchar(255) DEFAULT NULL COMMENT '答案2',
  `safe_a_3` varchar(255) DEFAULT NULL COMMENT '答案3',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('4', 'admin', '89f0b495890138511edbca8d446aa63e', '123@123.COM', null, '', null, null, '2017-04-03 13:26:24', '17', '2017-03-26 20:27:18', null, null, null, null, null, null, null);
