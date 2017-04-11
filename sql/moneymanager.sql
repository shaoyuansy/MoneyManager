/*
Navicat MySQL Data Transfer

Source Server         : 本地local
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : moneymanager

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2017-04-11 17:03:44
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for account
-- ----------------------------
DROP TABLE IF EXISTS `account`;
CREATE TABLE `account` (
  `aid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `a_type` varchar(255) DEFAULT NULL,
  `a_money` float(255,0) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `a_remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of account
-- ----------------------------
INSERT INTO `account` VALUES ('1', '现金账户', '100', '4', '我的现金账户');
INSERT INTO `account` VALUES ('2', '虚拟账户', '0', '4', '我的虚拟账户');
INSERT INTO `account` VALUES ('3', '债权账户', '100', '4', '我的债权账户');
INSERT INTO `account` VALUES ('4', '债务账户', '100', '4', '我的债务账户');
INSERT INTO `account` VALUES ('5', '信用卡账户', '5400', '4', '我的信用卡账户');
INSERT INTO `account` VALUES ('6', '现金账户', '0', '5', null);
INSERT INTO `account` VALUES ('7', '虚拟账户', '0', '5', null);
INSERT INTO `account` VALUES ('8', '债权账户', '0', '5', null);
INSERT INTO `account` VALUES ('9', '债务账户', '0', '5', null);
INSERT INTO `account` VALUES ('10', '信用卡账户', '0', '5', null);
INSERT INTO `account` VALUES ('11', '银行卡账户', '0', '5', null);
INSERT INTO `account` VALUES ('20', '银行卡账户', '100', '4', null);

-- ----------------------------
-- Table structure for books
-- ----------------------------
DROP TABLE IF EXISTS `books`;
CREATE TABLE `books` (
  `id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `start` varchar(255) DEFAULT NULL,
  `delmark` varchar(255) DEFAULT NULL,
  `end` varchar(255) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `money` float DEFAULT NULL,
  `round` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=260 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of books
-- ----------------------------
INSERT INTO `books` VALUES ('00000000167', '发工资了今天开心', '1491321600', '1491897235', null, '4', 'in', '4000', 'month');
INSERT INTO `books` VALUES ('00000000168', '发工资了今天开心', '1493913600', '1491897235', null, '4', 'in', '4000', 'month');
INSERT INTO `books` VALUES ('00000000169', '发工资了今天开心', '1496592000', '1491897235', null, '4', 'in', '4000', 'month');
INSERT INTO `books` VALUES ('00000000170', '发工资了今天开心', '1499184000', '1491897235', null, '4', 'in', '4000', 'month');
INSERT INTO `books` VALUES ('00000000171', '发工资了今天开心', '1501862400', '1491897235', null, '4', 'in', '4000', 'month');
INSERT INTO `books` VALUES ('00000000172', '发工资了今天开心', '1504540800', '1491897235', null, '4', 'in', '4000', 'month');
INSERT INTO `books` VALUES ('00000000173', '发工资了今天开心', '1507132800', '1491897235', null, '4', 'in', '4000', 'month');
INSERT INTO `books` VALUES ('00000000174', '发工资了今天开心', '1509811200', '1491897235', null, '4', 'in', '4000', 'month');
INSERT INTO `books` VALUES ('00000000175', '发工资了今天开心', '1512403200', '1491897235', null, '4', 'in', '4000', 'month');
INSERT INTO `books` VALUES ('00000000176', '发工资了今天开心', '1515081600', '1491897235', null, '4', 'in', '4000', 'month');
INSERT INTO `books` VALUES ('00000000177', '发工资了今天开心', '1517760000', '1491897235', null, '4', 'in', '4000', 'month');
INSERT INTO `books` VALUES ('00000000178', '发工资了今天开心', '1520179200', '1491897235', null, '4', 'in', '4000', 'month');
INSERT INTO `books` VALUES ('00000000179', '发工资了今天开心', '1522857600', '1491897235', null, '4', 'in', '4000', 'month');
INSERT INTO `books` VALUES ('00000000180', '发工资了今天开心', '1525449600', '1491897235', null, '4', 'in', '4000', 'month');
INSERT INTO `books` VALUES ('00000000181', '发工资了今天开心', '1528128000', '1491897235', null, '4', 'in', '4000', 'month');
INSERT INTO `books` VALUES ('00000000182', '发工资了今天开心', '1530720000', '1491897235', null, '4', 'in', '4000', 'month');
INSERT INTO `books` VALUES ('00000000183', '发工资了今天开心', '1533398400', '1491897235', null, '4', 'in', '4000', 'month');
INSERT INTO `books` VALUES ('00000000184', '发工资了今天开心', '1536076800', '1491897235', null, '4', 'in', '4000', 'month');
INSERT INTO `books` VALUES ('00000000185', '发工资了今天开心', '1538668800', '1491897235', null, '4', 'in', '4000', 'month');
INSERT INTO `books` VALUES ('00000000186', '发工资了今天开心', '1541347200', '1491897235', null, '4', 'in', '4000', 'month');
INSERT INTO `books` VALUES ('00000000187', '发工资了今天开心', '1543939200', '1491897235', null, '4', 'in', '4000', 'month');
INSERT INTO `books` VALUES ('00000000188', '发工资了今天开心', '1546617600', '1491897235', null, '4', 'in', '4000', 'month');
INSERT INTO `books` VALUES ('00000000189', '发工资了今天开心', '1549296000', '1491897235', null, '4', 'in', '4000', 'month');
INSERT INTO `books` VALUES ('00000000190', '发工资了今天开心', '1551715200', '1491897235', null, '4', 'in', '4000', 'month');
INSERT INTO `books` VALUES ('00000000191', '发工资了今天开心', '1554393600', '1491897235', null, '4', 'in', '4000', 'month');
INSERT INTO `books` VALUES ('00000000198', '交房租了卧槽难过', '1492444800', '1491897270', null, '4', 'out', '1060', 'month');
INSERT INTO `books` VALUES ('00000000199', '交房租了卧槽难过', '1495036800', '1491897270', null, '4', 'out', '1060', 'month');
INSERT INTO `books` VALUES ('00000000200', '交房租了卧槽难过', '1497715200', '1491897270', null, '4', 'out', '1060', 'month');
INSERT INTO `books` VALUES ('00000000201', '交房租了卧槽难过', '1500307200', '1491897270', null, '4', 'out', '1060', 'month');
INSERT INTO `books` VALUES ('00000000202', '交房租了卧槽难过', '1502985600', '1491897270', null, '4', 'out', '1060', 'month');
INSERT INTO `books` VALUES ('00000000203', '交房租了卧槽难过', '1505664000', '1491897270', null, '4', 'out', '1060', 'month');
INSERT INTO `books` VALUES ('00000000204', '交房租了卧槽难过', '1508256000', '1491897270', null, '4', 'out', '1060', 'month');
INSERT INTO `books` VALUES ('00000000205', '交房租了卧槽难过', '1510934400', '1491897270', null, '4', 'out', '1060', 'month');
INSERT INTO `books` VALUES ('00000000206', '交房租了卧槽难过', '1513526400', '1491897270', null, '4', 'out', '1060', 'month');
INSERT INTO `books` VALUES ('00000000207', '交房租了卧槽难过', '1516204800', '1491897270', null, '4', 'out', '1060', 'month');
INSERT INTO `books` VALUES ('00000000208', '交房租了卧槽难过', '1518883200', '1491897270', null, '4', 'out', '1060', 'month');
INSERT INTO `books` VALUES ('00000000209', '交房租了卧槽难过', '1521302400', '1491897270', null, '4', 'out', '1060', 'month');
INSERT INTO `books` VALUES ('00000000210', '交房租了卧槽难过', '1523980800', '1491897270', null, '4', 'out', '1060', 'month');
INSERT INTO `books` VALUES ('00000000211', '交房租了卧槽难过', '1526572800', '1491897270', null, '4', 'out', '1060', 'month');
INSERT INTO `books` VALUES ('00000000212', '交房租了卧槽难过', '1529251200', '1491897270', null, '4', 'out', '1060', 'month');
INSERT INTO `books` VALUES ('00000000213', '交房租了卧槽难过', '1531843200', '1491897270', null, '4', 'out', '1060', 'month');
INSERT INTO `books` VALUES ('00000000214', '交房租了卧槽难过', '1534521600', '1491897270', null, '4', 'out', '1060', 'month');
INSERT INTO `books` VALUES ('00000000215', '交房租了卧槽难过', '1537200000', '1491897270', null, '4', 'out', '1060', 'month');
INSERT INTO `books` VALUES ('00000000216', '交房租了卧槽难过', '1539792000', '1491897270', null, '4', 'out', '1060', 'month');
INSERT INTO `books` VALUES ('00000000217', '交房租了卧槽难过', '1542470400', '1491897270', null, '4', 'out', '1060', 'month');
INSERT INTO `books` VALUES ('00000000218', '交房租了卧槽难过', '1545062400', '1491897270', null, '4', 'out', '1060', 'month');
INSERT INTO `books` VALUES ('00000000219', '交房租了卧槽难过', '1547740800', '1491897270', null, '4', 'out', '1060', 'month');
INSERT INTO `books` VALUES ('00000000220', '交房租了卧槽难过', '1550419200', '1491897270', null, '4', 'out', '1060', 'month');
INSERT INTO `books` VALUES ('00000000221', '交房租了卧槽难过', '1552838400', '1491897270', null, '4', 'out', '1060', 'month');
INSERT INTO `books` VALUES ('00000000222', '交房租了卧槽难过', '1555516800', '1491897270', null, '4', 'out', '1060', 'month');
INSERT INTO `books` VALUES ('00000000229', '还花呗', '1491667200', '1491900997', null, '4', 'er', '1000', 'month');
INSERT INTO `books` VALUES ('00000000230', '还花呗', '1494259200', '1491900997', null, '4', 'er', '1000', 'month');
INSERT INTO `books` VALUES ('00000000231', '还花呗', '1496937600', '1491900997', null, '4', 'er', '1000', 'month');
INSERT INTO `books` VALUES ('00000000232', '还花呗', '1499529600', '1491900997', null, '4', 'er', '1000', 'month');
INSERT INTO `books` VALUES ('00000000233', '还花呗', '1502208000', '1491900997', null, '4', 'er', '1000', 'month');
INSERT INTO `books` VALUES ('00000000234', '还花呗', '1504886400', '1491900997', null, '4', 'er', '1000', 'month');
INSERT INTO `books` VALUES ('00000000235', '还花呗', '1507478400', '1491900997', null, '4', 'er', '1000', 'month');
INSERT INTO `books` VALUES ('00000000236', '还花呗', '1510156800', '1491900997', null, '4', 'er', '1000', 'month');
INSERT INTO `books` VALUES ('00000000237', '还花呗', '1512748800', '1491900997', null, '4', 'er', '1000', 'month');
INSERT INTO `books` VALUES ('00000000238', '还花呗', '1515427200', '1491900997', null, '4', 'er', '1000', 'month');
INSERT INTO `books` VALUES ('00000000239', '还花呗', '1518105600', '1491900997', null, '4', 'er', '1000', 'month');
INSERT INTO `books` VALUES ('00000000240', '还花呗', '1520524800', '1491900997', null, '4', 'er', '1000', 'month');
INSERT INTO `books` VALUES ('00000000241', '还花呗', '1523203200', '1491900997', null, '4', 'er', '1000', 'month');
INSERT INTO `books` VALUES ('00000000242', '还花呗', '1525795200', '1491900997', null, '4', 'er', '1000', 'month');
INSERT INTO `books` VALUES ('00000000243', '还花呗', '1528473600', '1491900997', null, '4', 'er', '1000', 'month');
INSERT INTO `books` VALUES ('00000000244', '还花呗', '1531065600', '1491900997', null, '4', 'er', '1000', 'month');
INSERT INTO `books` VALUES ('00000000245', '还花呗', '1533744000', '1491900997', null, '4', 'er', '1000', 'month');
INSERT INTO `books` VALUES ('00000000246', '还花呗', '1536422400', '1491900997', null, '4', 'er', '1000', 'month');
INSERT INTO `books` VALUES ('00000000247', '还花呗', '1539014400', '1491900997', null, '4', 'er', '1000', 'month');
INSERT INTO `books` VALUES ('00000000248', '还花呗', '1541692800', '1491900997', null, '4', 'er', '1000', 'month');
INSERT INTO `books` VALUES ('00000000249', '还花呗', '1544284800', '1491900997', null, '4', 'er', '1000', 'month');
INSERT INTO `books` VALUES ('00000000250', '还花呗', '1546963200', '1491900997', null, '4', 'er', '1000', 'month');
INSERT INTO `books` VALUES ('00000000251', '还花呗', '1549641600', '1491900997', null, '4', 'er', '1000', 'month');
INSERT INTO `books` VALUES ('00000000252', '还花呗', '1552060800', '1491900997', null, '4', 'er', '1000', 'month');
INSERT INTO `books` VALUES ('00000000253', '还花呗', '1554739200', '1491900997', null, '4', 'er', '1000', 'month');

-- ----------------------------
-- Table structure for budget
-- ----------------------------
DROP TABLE IF EXISTS `budget`;
CREATE TABLE `budget` (
  `bid` int(11) NOT NULL AUTO_INCREMENT,
  `b_time` date DEFAULT NULL COMMENT '预算时间',
  `b_month` varchar(255) DEFAULT NULL COMMENT '预算期限',
  `b_money` float(255,0) DEFAULT NULL,
  `b_remark` varchar(255) DEFAULT NULL COMMENT '备注',
  `uid` int(11) DEFAULT NULL,
  PRIMARY KEY (`bid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of budget
-- ----------------------------
INSERT INTO `budget` VALUES ('3', '2017-04-05', '1', '300', '', '4');
INSERT INTO `budget` VALUES ('4', '2017-04-05', '2', '300', '', '4');
INSERT INTO `budget` VALUES ('5', '2017-04-06', '3', '500', '', '4');
INSERT INTO `budget` VALUES ('6', '2017-04-06', '4', '600', null, '4');
INSERT INTO `budget` VALUES ('7', '2017-04-06', '5', '300', null, '4');

-- ----------------------------
-- Table structure for debtee
-- ----------------------------
DROP TABLE IF EXISTS `debtee`;
CREATE TABLE `debtee` (
  `eid` int(11) NOT NULL AUTO_INCREMENT,
  `e_time` datetime DEFAULT NULL,
  `e_debtee` varchar(255) DEFAULT NULL,
  `e_debtor` varchar(255) DEFAULT NULL,
  `e_money` float(255,0) DEFAULT NULL,
  `e_remark` varchar(255) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  PRIMARY KEY (`eid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of debtee
-- ----------------------------
INSERT INTO `debtee` VALUES ('1', '2017-03-26 15:42:33', '本人', '李四', '200', null, '4');
INSERT INTO `debtee` VALUES ('2', '2017-04-05 20:59:00', '本人', '张三', '100', '还了，当面还的', '4');
INSERT INTO `debtee` VALUES ('3', '2017-04-05 21:01:00', '本人', '我妈', '100', '', '4');
INSERT INTO `debtee` VALUES ('4', '2017-04-05 21:01:00', '丈夫', '我爸', '200', '', '4');

-- ----------------------------
-- Table structure for debtor
-- ----------------------------
DROP TABLE IF EXISTS `debtor`;
CREATE TABLE `debtor` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `r_time` datetime DEFAULT NULL,
  `r_debtee` varchar(255) DEFAULT NULL,
  `r_debtor` varchar(255) DEFAULT NULL,
  `r_money` float(255,0) DEFAULT NULL,
  `r_remark` varchar(255) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of debtor
-- ----------------------------
INSERT INTO `debtor` VALUES ('1', '2017-03-26 15:42:37', '张三', '本人', '100', null, '4');
INSERT INTO `debtor` VALUES ('2', '2017-04-05 21:08:00', '王五', '本人', '50', '收钱了', '4');
INSERT INTO `debtor` VALUES ('3', '2017-04-05 21:09:00', '溜溜', '本人', '50', '', '4');

-- ----------------------------
-- Table structure for diary
-- ----------------------------
DROP TABLE IF EXISTS `diary`;
CREATE TABLE `diary` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `content` text CHARACTER SET utf8,
  `uid` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of diary
-- ----------------------------
INSERT INTO `diary` VALUES ('2', '					<p>哈哈哈哈，测试啦。存个图</p><p><img src=\"../../uploads/20170404\\d9bfba99446fd68d52d8ab6ebed4c509.jpg\" alt=\"zy\" style=\"max-width: 100%; width: 249px; height: 334px;\" class=\"\"><br></p><p><br></p>', '4', '2017-04-04', '测试日记1');
INSERT INTO `diary` VALUES ('88', '123123', '4', '2017-04-04', '2017-04-04');
INSERT INTO `diary` VALUES ('89', '<p>123123132112313</p>', '4', '2017-04-04', '123');
INSERT INTO `diary` VALUES ('91', '					<p><font color=\"#00ffff\">哈哈哈哈</font></p><p><img src=\"../../uploads/20170404\\fb535fde8aaa8d1c664261e851de8a62.jpg\" alt=\"20161125\" style=\"max-width: 100%; width: 303px; height: 296px;\" class=\"\"><br></p><p>哎呀 羞羞 &nbsp;[嘻嘻] &nbsp;66666 &nbsp;我媳妇儿说的</p><p><br></p>', '4', '2017-04-04', '你好啊');
INSERT INTO `diary` VALUES ('92', '					<p>呜哈哈哈哈</p>', '4', '2017-04-04', '2017-04-04');

-- ----------------------------
-- Table structure for income
-- ----------------------------
DROP TABLE IF EXISTS `income`;
CREATE TABLE `income` (
  `iid` int(11) NOT NULL AUTO_INCREMENT,
  `i_time` datetime DEFAULT NULL,
  `i_type` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `i_account` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `i_money` float(255,0) DEFAULT NULL,
  `i_member` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `i_remark` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  PRIMARY KEY (`iid`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf32;

-- ----------------------------
-- Records of income
-- ----------------------------
INSERT INTO `income` VALUES ('31', '2017-04-04 17:40:00', '职业收入', '信用卡账户', '100', '本人', '', '4');
INSERT INTO `income` VALUES ('32', '2017-04-07 17:40:00', '职业收入', '信用卡账户', '200', '丈夫', '', '4');
INSERT INTO `income` VALUES ('33', '2017-04-05 18:02:00', '职业收入', '信用卡账户', '200', '父母', '', '4');
INSERT INTO `income` VALUES ('34', '2017-04-05 18:02:00', '职业收入', '信用卡账户', '200', '子女', '', '4');
INSERT INTO `income` VALUES ('58', '2017-04-05 18:25:00', '职业收入', '现金账户', '100', '家庭公用', '', '4');
INSERT INTO `income` VALUES ('59', '2017-04-05 20:44:00', '其他收入', '债务账户', '300', '本人', '', '4');
INSERT INTO `income` VALUES ('60', '2017-02-08 15:10:00', '职业收入', '信用卡账户', '600', '本人', '', '4');
INSERT INTO `income` VALUES ('61', '2017-01-03 14:25:00', '职业收入', '信用卡账户', '3000', '本人', '', '4');
INSERT INTO `income` VALUES ('62', '2017-03-15 18:35:00', '职业收入', '信用卡账户', '600', '本人', '', '4');

-- ----------------------------
-- Table structure for outgo
-- ----------------------------
DROP TABLE IF EXISTS `outgo`;
CREATE TABLE `outgo` (
  `oid` int(11) NOT NULL AUTO_INCREMENT,
  `o_time` datetime DEFAULT NULL,
  `o_type` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `o_account` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `o_money` float(255,0) DEFAULT NULL,
  `o_member` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `o_remark` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  PRIMARY KEY (`oid`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf32;

-- ----------------------------
-- Records of outgo
-- ----------------------------
INSERT INTO `outgo` VALUES ('1', '2017-03-26 15:14:42', '衣物服饰', '信用卡', '300', '父母', null, '4');
INSERT INTO `outgo` VALUES ('2', '2017-02-26 15:14:42', '食品酒水', '信用卡', '1000', '妻子', null, '4');
INSERT INTO `outgo` VALUES ('3', '2017-03-10 15:14:42', '居家物业', '信用卡', '500', '子女', null, '4');
INSERT INTO `outgo` VALUES ('4', '2017-04-05 14:34:28', '行车交通', '现金', '10', '丈夫', null, '4');
INSERT INTO `outgo` VALUES ('5', '2017-04-03 14:34:54', '交流通讯', '虚拟', '20', '本人', null, '4');
INSERT INTO `outgo` VALUES ('6', '2017-04-01 14:35:22', '休闲娱乐', '现金', '300', '家庭共用', null, '4');
INSERT INTO `outgo` VALUES ('7', '2017-03-29 14:35:42', '学习进修', '信用卡', '500', '妻子', null, '4');
INSERT INTO `outgo` VALUES ('8', '2017-04-04 14:35:59', '医疗保健', '现金', '999', '本人', null, '4');
INSERT INTO `outgo` VALUES ('9', '2017-04-05 14:40:03', '行车交通', '现金', '30', '妻子', null, '4');
INSERT INTO `outgo` VALUES ('10', '2017-04-05 20:25:00', '居家物业', '信用卡账户', '100', '本人', '', '4');
INSERT INTO `outgo` VALUES ('11', '2017-04-04 18:40:00', '衣服饰品', '债权账户', '200', '妻子', '', '4');
INSERT INTO `outgo` VALUES ('12', '2017-04-05 20:43:00', '其他款项', '债权账户', '300', '本人', '', '4');
INSERT INTO `outgo` VALUES ('13', '2017-02-22 14:20:00', '衣服饰品', '信用卡账户', '900', '子女', '', '4');
INSERT INTO `outgo` VALUES ('14', '2017-01-19 23:30:00', '衣服饰品', '信用卡账户', '500', '子女', '', '4');

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sign
-- ----------------------------
INSERT INTO `sign` VALUES ('15', '4', '1', '2017-04-10 15:19:30');
INSERT INTO `sign` VALUES ('16', '5', '1', '2017-04-10 20:36:38');

-- ----------------------------
-- Table structure for t_account
-- ----------------------------
DROP TABLE IF EXISTS `t_account`;
CREATE TABLE `t_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_account
-- ----------------------------
INSERT INTO `t_account` VALUES ('1', '{\"type\":[\"银行卡账户\",\"信用卡账户\",\"虚拟账户\",\"现金账户\",\"债权账户\",\"债务账户\"]}', '4');
INSERT INTO `t_account` VALUES ('2', '{\"type\":[\"信用卡账户\",\"银行卡账户\",\"虚拟账户\",\"现金账户\",\"债权账户\",\"债务账户\"]}', '5');

-- ----------------------------
-- Table structure for t_in
-- ----------------------------
DROP TABLE IF EXISTS `t_in`;
CREATE TABLE `t_in` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_in
-- ----------------------------
INSERT INTO `t_in` VALUES ('1', '{\"type\":[\"职业收入\",\"其他收入\"]}', '4');
INSERT INTO `t_in` VALUES ('2', '{\"type\":[\"工作收入\",\"其他收入\"]}', '5');

-- ----------------------------
-- Table structure for t_member
-- ----------------------------
DROP TABLE IF EXISTS `t_member`;
CREATE TABLE `t_member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf32;

-- ----------------------------
-- Records of t_member
-- ----------------------------
INSERT INTO `t_member` VALUES ('1', '{\"type\":[\"本人\",\"丈夫\",\"妻子\",\"子女\",\"父母\",\"家庭公用\"]}', '4');
INSERT INTO `t_member` VALUES ('2', '{\"type\":[\"本人\",\"丈夫\",\"妻子\",\"子女\",\"父母\",\"家庭公用\"]}', '5');

-- ----------------------------
-- Table structure for t_out
-- ----------------------------
DROP TABLE IF EXISTS `t_out`;
CREATE TABLE `t_out` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf32;

-- ----------------------------
-- Records of t_out
-- ----------------------------
INSERT INTO `t_out` VALUES ('1', '{\"type\":[\"衣服饰品\",\"食品酒水\",\"居家物业\",\"行车交通\",\"交流通讯\",\"休闲娱乐\",\"学习进修\",\"人情往来\",\"医疗保健\",\"金融保险\",\"其他款项\"]}', '4');
INSERT INTO `t_out` VALUES ('2', '{\"type\":[\"衣服饰品\",\"食品酒水\",\"居家物业\",\"行车交通\",\"交流通讯\",\"休闲娱乐\",\"学习进修\",\"人情往来\",\"医疗保健\",\"金融保险\",\"其他款项\"]}', '5');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('4', 'admin', '89f0b495890138511edbca8d446aa63e', '123@123.COM', null, '', '../../uploads/20170410\\f573d9b701ab2fedab612739704e780f.png', null, '2017-04-11 14:21:39', '44', '2017-03-26 20:27:18', null, '', '', '', '', '', '');
INSERT INTO `user` VALUES ('5', 'shaoyuan', '89f0b495890138511edbca8d446aa63e', '492843280@qq.com', null, '', '/static/img/no-icon.jpg', 'shaoyuan', '2017-04-10 16:04:33', '2', '2017-04-10 13:45:22', null, null, null, null, null, null, null);

-- ----------------------------
-- Procedure structure for register
-- ----------------------------
DROP PROCEDURE IF EXISTS `register`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `register`(IN `idnum` int)
BEGIN
	declare v1 int;
	set v1 = idnum;
	insert into account(uid,a_type,a_money) values(v1,"现金账户",0.00);
	insert into account(uid,a_type,a_money) values(v1,"虚拟账户",0.00);
	insert into account(uid,a_type,a_money) values(v1,"债权账户",0.00);
	insert into account(uid,a_type,a_money) values(v1,"债务账户",0.00);
	insert into account(uid,a_type,a_money) values(v1,"信用卡账户",0.00);
	insert into account(uid,a_type,a_money) values(v1,"银行卡账户",0.00);
	insert into t_account(uid,type) values(v1,'{"type":["银行卡账户","信用卡账户","现金账户","虚拟账户","债权账户","债务账户"]}');
	insert into t_out(uid,type) values(v1,'{"type":["衣服饰品","食品酒水","居家物业","行车交通","交流通讯","休闲娱乐","学习进修","人情往来","医疗保健","金融保险","其他款项"]}');
	insert into t_in(uid,type) values(v1,'{"type":["工作收入","其他收入"]}');
	insert into t_member(uid,type) values(v1,'{"type":["丈夫","妻子","子女","父母","家庭公用","本人"]}');
END
;;
DELIMITER ;
