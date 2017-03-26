/*
Navicat MySQL Data Transfer

Source Server         : php
Source Server Version : 50617
Source Host           : 127.0.0.1:3306
Source Database       : moneymanger

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2017-03-26 13:15:41
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for account
-- ----------------------------
DROP TABLE IF EXISTS `account`;
CREATE TABLE `account` (
  `aid` int(11) NOT NULL,
  `a_type` varchar(255) DEFAULT NULL,
  `a_money` varchar(255) DEFAULT NULL,
  `a_uid` int(11) DEFAULT NULL,
  `a_remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of account
-- ----------------------------

-- ----------------------------
-- Table structure for budget
-- ----------------------------
DROP TABLE IF EXISTS `budget`;
CREATE TABLE `budget` (
  `bid` int(11) NOT NULL,
  `b_time` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '预算时间',
  `b_term` varchar(255) DEFAULT NULL COMMENT '预算期限',
  `b_money` varchar(255) DEFAULT NULL,
  `b_remark` varchar(255) DEFAULT NULL COMMENT '备注'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of budget
-- ----------------------------

-- ----------------------------
-- Table structure for debtee
-- ----------------------------
DROP TABLE IF EXISTS `debtee`;
CREATE TABLE `debtee` (
  `eid` int(11) NOT NULL,
  `e_time` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `e_debtee` varchar(255) DEFAULT NULL,
  `e_debtor` varchar(255) DEFAULT NULL,
  `e_money` varchar(255) DEFAULT NULL,
  `e_remark` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of debtee
-- ----------------------------

-- ----------------------------
-- Table structure for debtor
-- ----------------------------
DROP TABLE IF EXISTS `debtor`;
CREATE TABLE `debtor` (
  `rid` int(11) NOT NULL,
  `r_time` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `r_debtee` varchar(255) DEFAULT NULL,
  `r_debtor` varchar(255) DEFAULT NULL,
  `r_money` varchar(255) DEFAULT NULL,
  `r_remark` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of debtor
-- ----------------------------

-- ----------------------------
-- Table structure for in
-- ----------------------------
DROP TABLE IF EXISTS `in`;
CREATE TABLE `in` (
  `iid` int(11) NOT NULL,
  `i_time` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `i_type` varchar(255) DEFAULT NULL,
  `i_account` varchar(255) DEFAULT NULL,
  `i_money` varchar(255) DEFAULT NULL,
  `i_member` varchar(255) DEFAULT NULL,
  `i_remark` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- ----------------------------
-- Records of in
-- ----------------------------

-- ----------------------------
-- Table structure for member
-- ----------------------------
DROP TABLE IF EXISTS `member`;
CREATE TABLE `member` (
  `mid` int(11) NOT NULL,
  `m_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- ----------------------------
-- Records of member
-- ----------------------------
INSERT INTO `member` VALUES ('1', '本人');
INSERT INTO `member` VALUES ('2', '老公');
INSERT INTO `member` VALUES ('3', '老婆');
INSERT INTO `member` VALUES ('4', '子女');
INSERT INTO `member` VALUES ('5', '父母');
INSERT INTO `member` VALUES ('6', '家庭公用');

-- ----------------------------
-- Table structure for out
-- ----------------------------
DROP TABLE IF EXISTS `out`;
CREATE TABLE `out` (
  `oid` int(11) NOT NULL,
  `o_time` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `o_sort` varchar(255) DEFAULT NULL,
  `o_account` varchar(255) DEFAULT NULL,
  `o_money` varchar(255) NOT NULL,
  `o_member` varchar(255) DEFAULT NULL,
  `o_remark` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- ----------------------------
-- Records of out
-- ----------------------------

-- ----------------------------
-- Table structure for t_in
-- ----------------------------
DROP TABLE IF EXISTS `t_in`;
CREATE TABLE `t_in` (
  `tiid` int(11) NOT NULL,
  `ti_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_in
-- ----------------------------
INSERT INTO `t_in` VALUES ('1', '职业收入');
INSERT INTO `t_in` VALUES ('2', '其他收入');

-- ----------------------------
-- Table structure for t_out
-- ----------------------------
DROP TABLE IF EXISTS `t_out`;
CREATE TABLE `t_out` (
  `toid` int(11) NOT NULL,
  `to_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- ----------------------------
-- Records of t_out
-- ----------------------------
INSERT INTO `t_out` VALUES ('1', '衣服饰品');
INSERT INTO `t_out` VALUES ('2', '食品酒水');
INSERT INTO `t_out` VALUES ('3', '居家物业');
INSERT INTO `t_out` VALUES ('4', '行车交通');
INSERT INTO `t_out` VALUES ('5', '交流通讯');
INSERT INTO `t_out` VALUES ('6', '休闲娱乐');
INSERT INTO `t_out` VALUES ('7', '学习进修');
INSERT INTO `t_out` VALUES ('8', '人情往来');
INSERT INTO `t_out` VALUES ('9', '医疗保健');
INSERT INTO `t_out` VALUES ('10', '金融保险');
INSERT INTO `t_out` VALUES ('11', '其他款项');

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
  `last_login_time` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '最后登陆时间',
  `login_count` int(11) DEFAULT '0' COMMENT '登陆次数',
  `registered_time` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '注册时间',
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
INSERT INTO `user` VALUES ('3', 'root', 'be57c7cee28c3f1354d1e4f3734c34ce', 'shaoyuansy@126.com', null, '', null, null, '2017-03-22 22:16:17', '8', '2017-03-22 22:16:17', null, null, null, null, null, null, null);
INSERT INTO `user` VALUES ('4', 'admin', '89f0b495890138511edbca8d446aa63e', '123@123.COM', null, '', null, null, '2017-03-23 21:02:48', '1', '2017-03-23 21:02:48', null, null, null, null, null, null, null);
