/*
Navicat MySQL Data Transfer

Source Server         : php
Source Server Version : 50617
Source Host           : 127.0.0.1:3306
Source Database       : moneymanger

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2017-03-24 22:30:45
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for bank
-- ----------------------------
DROP TABLE IF EXISTS `bank`;
CREATE TABLE `bank` (
  `bank_id` int(11) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `bank_remark` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bank
-- ----------------------------
INSERT INTO `bank` VALUES ('1', '中国银行', null);
INSERT INTO `bank` VALUES ('2', '中国建设银行', null);
INSERT INTO `bank` VALUES ('3', '中国农业银行', null);
INSERT INTO `bank` VALUES ('4', '中国邮政储蓄银行', null);
INSERT INTO `bank` VALUES ('5', '招商银行', null);
INSERT INTO `bank` VALUES ('6', '中国光大银行', null);
INSERT INTO `bank` VALUES ('7', '中国工商银行', null);
INSERT INTO `bank` VALUES ('8', '浦发银行', null);
INSERT INTO `bank` VALUES ('9', '交通银行', null);
INSERT INTO `bank` VALUES ('10', '广发银行', null);
INSERT INTO `bank` VALUES ('11', '平安银行', null);
INSERT INTO `bank` VALUES ('12', '民生银行', null);
INSERT INTO `bank` VALUES ('13', '其他银行', null);

-- ----------------------------
-- Table structure for budget
-- ----------------------------
DROP TABLE IF EXISTS `budget`;
CREATE TABLE `budget` (
  `bid` int(11) NOT NULL,
  `b_time` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `b_term` varchar(255) DEFAULT NULL,
  `b_money` varchar(255) DEFAULT NULL,
  `b_remark` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of budget
-- ----------------------------

-- ----------------------------
-- Table structure for card
-- ----------------------------
DROP TABLE IF EXISTS `card`;
CREATE TABLE `card` (
  `cardid` int(11) NOT NULL,
  `c_bank` varchar(255) DEFAULT NULL,
  `c_limit` varchar(255) DEFAULT NULL,
  `zd_date` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `hk_date` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `c_days` int(255) DEFAULT NULL,
  `deadline` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of card
-- ----------------------------

-- ----------------------------
-- Table structure for card_account
-- ----------------------------
DROP TABLE IF EXISTS `card_account`;
CREATE TABLE `card_account` (
  `caid` int(11) NOT NULL,
  `ca_time` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `ca_operation` varchar(255) DEFAULT NULL,
  `ca_sort` varchar(255) DEFAULT NULL,
  `ca_money` varchar(255) DEFAULT NULL,
  `ca_remark` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of card_account
-- ----------------------------

-- ----------------------------
-- Table structure for cost
-- ----------------------------
DROP TABLE IF EXISTS `cost`;
CREATE TABLE `cost` (
  `cid` int(11) NOT NULL,
  `c_time` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `c_sort` varchar(255) DEFAULT NULL,
  `c_account` varchar(255) DEFAULT NULL,
  `c_money` varchar(255) NOT NULL,
  `c_member` varchar(255) DEFAULT NULL,
  `c_remark` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- ----------------------------
-- Records of cost
-- ----------------------------

-- ----------------------------
-- Table structure for csort
-- ----------------------------
DROP TABLE IF EXISTS `csort`;
CREATE TABLE `csort` (
  `csid` int(11) NOT NULL,
  `c_sort` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- ----------------------------
-- Records of csort
-- ----------------------------
INSERT INTO `csort` VALUES ('1', '衣服饰品');
INSERT INTO `csort` VALUES ('2', '食品酒水');
INSERT INTO `csort` VALUES ('3', '居家物业');
INSERT INTO `csort` VALUES ('4', '行车交通');
INSERT INTO `csort` VALUES ('5', '交流通讯');
INSERT INTO `csort` VALUES ('6', '休闲娱乐');
INSERT INTO `csort` VALUES ('7', '学习进修');
INSERT INTO `csort` VALUES ('8', '人情往来');
INSERT INTO `csort` VALUES ('9', '医疗保健');
INSERT INTO `csort` VALUES ('10', '金融保险');
INSERT INTO `csort` VALUES ('11', '其他款项');

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
-- Table structure for income
-- ----------------------------
DROP TABLE IF EXISTS `income`;
CREATE TABLE `income` (
  `iid` int(11) NOT NULL,
  `i_time` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `i_sort` varchar(255) DEFAULT NULL,
  `i_account` varchar(255) DEFAULT NULL,
  `i_money` varchar(255) DEFAULT NULL,
  `i_member` varchar(255) DEFAULT NULL,
  `i_remark` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- ----------------------------
-- Records of income
-- ----------------------------

-- ----------------------------
-- Table structure for isort
-- ----------------------------
DROP TABLE IF EXISTS `isort`;
CREATE TABLE `isort` (
  `isid` int(11) NOT NULL,
  `i_sort` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of isort
-- ----------------------------
INSERT INTO `isort` VALUES ('1', '职业收入');
INSERT INTO `isort` VALUES ('2', '其他收入');

-- ----------------------------
-- Table structure for loan
-- ----------------------------
DROP TABLE IF EXISTS `loan`;
CREATE TABLE `loan` (
  `lid` int(11) NOT NULL,
  `l_time` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `l_name` varchar(255) DEFAULT NULL,
  `l_sort` varchar(255) DEFAULT NULL,
  `l_money` varchar(255) DEFAULT NULL,
  `l_lilv` varchar(255) DEFAULT NULL,
  `l_method` varchar(255) DEFAULT NULL,
  `l_bank` varchar(255) DEFAULT NULL,
  `l_remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`lid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of loan
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
-- Table structure for shares
-- ----------------------------
DROP TABLE IF EXISTS `shares`;
CREATE TABLE `shares` (
  `sid` int(11) DEFAULT NULL,
  `s_code` varchar(255) DEFAULT NULL,
  `s_time` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `s_price` varchar(255) DEFAULT NULL,
  `s_num` varchar(255) DEFAULT NULL,
  `s_yongjin` varchar(255) DEFAULT NULL COMMENT '佣金',
  `s_yhs` varchar(255) DEFAULT NULL COMMENT '印花税',
  `s_ghs` varchar(255) DEFAULT NULL COMMENT '过户税',
  `s_money` varchar(255) DEFAULT NULL,
  `s_remark` varchar(255) DEFAULT NULL COMMENT '备注'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shares
-- ----------------------------

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
