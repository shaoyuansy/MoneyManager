/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : moneymanager

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2017-03-24 18:48:59
*/

SET FOREIGN_KEY_CHECKS=0;

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
-- Table structure for c_sort
-- ----------------------------
DROP TABLE IF EXISTS `c_sort`;
CREATE TABLE `c_sort` (
  `csid` int(11) NOT NULL,
  `c_sort` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- ----------------------------
-- Records of c_sort
-- ----------------------------
INSERT INTO `c_sort` VALUES ('1', '衣服饰品');
INSERT INTO `c_sort` VALUES ('2', '食品酒水');
INSERT INTO `c_sort` VALUES ('3', '居家物业');
INSERT INTO `c_sort` VALUES ('4', '行车交通');
INSERT INTO `c_sort` VALUES ('5', '交流通讯');
INSERT INTO `c_sort` VALUES ('6', '休闲娱乐');
INSERT INTO `c_sort` VALUES ('7', '学习进修');
INSERT INTO `c_sort` VALUES ('8', '人情往来');
INSERT INTO `c_sort` VALUES ('9', '医疗保健');
INSERT INTO `c_sort` VALUES ('10', '金融保险');
INSERT INTO `c_sort` VALUES ('11', '其他款项');

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
-- Table structure for i_sort
-- ----------------------------
DROP TABLE IF EXISTS `i_sort`;
CREATE TABLE `i_sort` (
  `isid` int(11) NOT NULL,
  `work` varchar(255) DEFAULT NULL,
  `i_other` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- ----------------------------
-- Records of i_sort
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
