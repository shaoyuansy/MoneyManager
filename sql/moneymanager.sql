/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : moneymanager

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2017-04-28 21:07:48
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of account
-- ----------------------------
INSERT INTO `account` VALUES ('1', '现金账户', '500', '1', null);
INSERT INTO `account` VALUES ('2', '虚拟账户', '0', '1', null);
INSERT INTO `account` VALUES ('3', '债权账户', '0', '1', null);
INSERT INTO `account` VALUES ('4', '债务账户', '-500', '1', null);
INSERT INTO `account` VALUES ('5', '信用卡账户', '0', '1', null);
INSERT INTO `account` VALUES ('6', '银行卡账户', '113199', '1', null);

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
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of books
-- ----------------------------
INSERT INTO `books` VALUES ('00000000001', '本人工资', '1488643200', '1493123133', null, '1', 'in', '6000', 'month');
INSERT INTO `books` VALUES ('00000000002', '本人工资', '1491321600', '1493123133', null, '1', 'in', '6000', 'month');
INSERT INTO `books` VALUES ('00000000003', '本人工资', '1493913600', '1493123133', null, '1', 'in', '6000', 'month');
INSERT INTO `books` VALUES ('00000000004', '本人工资', '1496592000', '1493123133', null, '1', 'in', '6000', 'month');
INSERT INTO `books` VALUES ('00000000005', '本人工资', '1499184000', '1493123133', null, '1', 'in', '6000', 'month');
INSERT INTO `books` VALUES ('00000000006', '本人工资', '1501862400', '1493123133', null, '1', 'in', '6000', 'month');
INSERT INTO `books` VALUES ('00000000007', '本人工资', '1504540800', '1493123133', null, '1', 'in', '6000', 'month');
INSERT INTO `books` VALUES ('00000000008', '本人工资', '1507132800', '1493123133', null, '1', 'in', '6000', 'month');
INSERT INTO `books` VALUES ('00000000009', '本人工资', '1509811200', '1493123133', null, '1', 'in', '6000', 'month');
INSERT INTO `books` VALUES ('00000000010', '本人工资', '1512403200', '1493123133', null, '1', 'in', '6000', 'month');
INSERT INTO `books` VALUES ('00000000011', '本人工资', '1515081600', '1493123133', null, '1', 'in', '6000', 'month');
INSERT INTO `books` VALUES ('00000000012', '本人工资', '1517760000', '1493123133', null, '1', 'in', '6000', 'month');
INSERT INTO `books` VALUES ('00000000013', '本人工资', '1520179200', '1493123133', null, '1', 'in', '6000', 'month');
INSERT INTO `books` VALUES ('00000000014', '本人工资', '1522857600', '1493123133', null, '1', 'in', '6000', 'month');
INSERT INTO `books` VALUES ('00000000015', '本人工资', '1525449600', '1493123133', null, '1', 'in', '6000', 'month');
INSERT INTO `books` VALUES ('00000000016', '本人工资', '1528128000', '1493123133', null, '1', 'in', '6000', 'month');
INSERT INTO `books` VALUES ('00000000017', '本人工资', '1530720000', '1493123133', null, '1', 'in', '6000', 'month');
INSERT INTO `books` VALUES ('00000000018', '本人工资', '1533398400', '1493123133', null, '1', 'in', '6000', 'month');
INSERT INTO `books` VALUES ('00000000019', '本人工资', '1536076800', '1493123133', null, '1', 'in', '6000', 'month');
INSERT INTO `books` VALUES ('00000000020', '本人工资', '1538668800', '1493123133', null, '1', 'in', '6000', 'month');
INSERT INTO `books` VALUES ('00000000021', '本人工资', '1541347200', '1493123133', null, '1', 'in', '6000', 'month');
INSERT INTO `books` VALUES ('00000000022', '本人工资', '1543939200', '1493123133', null, '1', 'in', '6000', 'month');
INSERT INTO `books` VALUES ('00000000023', '本人工资', '1546617600', '1493123133', null, '1', 'in', '6000', 'month');
INSERT INTO `books` VALUES ('00000000024', '本人工资', '1549296000', '1493123133', null, '1', 'in', '6000', 'month');
INSERT INTO `books` VALUES ('00000000025', '本人工资', '1551715200', '1493123133', null, '1', 'in', '6000', 'month');
INSERT INTO `books` VALUES ('00000000032', '丈夫工资', '1488729600', '1493123170', null, '1', 'in', '9000', 'month');
INSERT INTO `books` VALUES ('00000000033', '丈夫工资', '1491408000', '1493123170', null, '1', 'in', '9000', 'month');
INSERT INTO `books` VALUES ('00000000034', '丈夫工资', '1494000000', '1493123170', null, '1', 'in', '9000', 'month');
INSERT INTO `books` VALUES ('00000000035', '丈夫工资', '1496678400', '1493123170', null, '1', 'in', '9000', 'month');
INSERT INTO `books` VALUES ('00000000036', '丈夫工资', '1499270400', '1493123170', null, '1', 'in', '9000', 'month');
INSERT INTO `books` VALUES ('00000000037', '丈夫工资', '1501948800', '1493123170', null, '1', 'in', '9000', 'month');
INSERT INTO `books` VALUES ('00000000038', '丈夫工资', '1504627200', '1493123170', null, '1', 'in', '9000', 'month');
INSERT INTO `books` VALUES ('00000000039', '丈夫工资', '1507219200', '1493123170', null, '1', 'in', '9000', 'month');
INSERT INTO `books` VALUES ('00000000040', '丈夫工资', '1509897600', '1493123170', null, '1', 'in', '9000', 'month');
INSERT INTO `books` VALUES ('00000000041', '丈夫工资', '1512489600', '1493123170', null, '1', 'in', '9000', 'month');
INSERT INTO `books` VALUES ('00000000042', '丈夫工资', '1515168000', '1493123170', null, '1', 'in', '9000', 'month');
INSERT INTO `books` VALUES ('00000000043', '丈夫工资', '1517846400', '1493123170', null, '1', 'in', '9000', 'month');
INSERT INTO `books` VALUES ('00000000044', '丈夫工资', '1520265600', '1493123170', null, '1', 'in', '9000', 'month');
INSERT INTO `books` VALUES ('00000000045', '丈夫工资', '1522944000', '1493123170', null, '1', 'in', '9000', 'month');
INSERT INTO `books` VALUES ('00000000046', '丈夫工资', '1525536000', '1493123170', null, '1', 'in', '9000', 'month');
INSERT INTO `books` VALUES ('00000000047', '丈夫工资', '1528214400', '1493123170', null, '1', 'in', '9000', 'month');
INSERT INTO `books` VALUES ('00000000048', '丈夫工资', '1530806400', '1493123170', null, '1', 'in', '9000', 'month');
INSERT INTO `books` VALUES ('00000000049', '丈夫工资', '1533484800', '1493123170', null, '1', 'in', '9000', 'month');
INSERT INTO `books` VALUES ('00000000050', '丈夫工资', '1536163200', '1493123170', null, '1', 'in', '9000', 'month');
INSERT INTO `books` VALUES ('00000000051', '丈夫工资', '1538755200', '1493123170', null, '1', 'in', '9000', 'month');
INSERT INTO `books` VALUES ('00000000052', '丈夫工资', '1541433600', '1493123170', null, '1', 'in', '9000', 'month');
INSERT INTO `books` VALUES ('00000000053', '丈夫工资', '1544025600', '1493123170', null, '1', 'in', '9000', 'month');
INSERT INTO `books` VALUES ('00000000054', '丈夫工资', '1546704000', '1493123170', null, '1', 'in', '9000', 'month');
INSERT INTO `books` VALUES ('00000000055', '丈夫工资', '1549382400', '1493123170', null, '1', 'in', '9000', 'month');
INSERT INTO `books` VALUES ('00000000056', '丈夫工资', '1551801600', '1493123170', null, '1', 'in', '9000', 'month');
INSERT INTO `books` VALUES ('00000000063', '交房租', '1489766400', '1493123191', null, '1', 'out', '1060', 'month');
INSERT INTO `books` VALUES ('00000000064', '交房租', '1492444800', '1493123191', null, '1', 'out', '1060', 'month');
INSERT INTO `books` VALUES ('00000000065', '交房租', '1495036800', '1493123191', null, '1', 'out', '1060', 'month');
INSERT INTO `books` VALUES ('00000000066', '交房租', '1497715200', '1493123191', null, '1', 'out', '1060', 'month');
INSERT INTO `books` VALUES ('00000000067', '交房租', '1500307200', '1493123191', null, '1', 'out', '1060', 'month');
INSERT INTO `books` VALUES ('00000000068', '交房租', '1502985600', '1493123191', null, '1', 'out', '1060', 'month');
INSERT INTO `books` VALUES ('00000000069', '交房租', '1505664000', '1493123191', null, '1', 'out', '1060', 'month');
INSERT INTO `books` VALUES ('00000000070', '交房租', '1508256000', '1493123191', null, '1', 'out', '1060', 'month');
INSERT INTO `books` VALUES ('00000000071', '交房租', '1510934400', '1493123191', null, '1', 'out', '1060', 'month');
INSERT INTO `books` VALUES ('00000000072', '交房租', '1513526400', '1493123191', null, '1', 'out', '1060', 'month');
INSERT INTO `books` VALUES ('00000000073', '交房租', '1516204800', '1493123191', null, '1', 'out', '1060', 'month');
INSERT INTO `books` VALUES ('00000000074', '交房租', '1518883200', '1493123191', null, '1', 'out', '1060', 'month');
INSERT INTO `books` VALUES ('00000000075', '交房租', '1521302400', '1493123191', null, '1', 'out', '1060', 'month');
INSERT INTO `books` VALUES ('00000000076', '交房租', '1523980800', '1493123191', null, '1', 'out', '1060', 'month');
INSERT INTO `books` VALUES ('00000000077', '交房租', '1526572800', '1493123191', null, '1', 'out', '1060', 'month');
INSERT INTO `books` VALUES ('00000000078', '交房租', '1529251200', '1493123191', null, '1', 'out', '1060', 'month');
INSERT INTO `books` VALUES ('00000000079', '交房租', '1531843200', '1493123191', null, '1', 'out', '1060', 'month');
INSERT INTO `books` VALUES ('00000000080', '交房租', '1534521600', '1493123191', null, '1', 'out', '1060', 'month');
INSERT INTO `books` VALUES ('00000000081', '交房租', '1537200000', '1493123191', null, '1', 'out', '1060', 'month');
INSERT INTO `books` VALUES ('00000000082', '交房租', '1539792000', '1493123191', null, '1', 'out', '1060', 'month');
INSERT INTO `books` VALUES ('00000000083', '交房租', '1542470400', '1493123191', null, '1', 'out', '1060', 'month');
INSERT INTO `books` VALUES ('00000000084', '交房租', '1545062400', '1493123191', null, '1', 'out', '1060', 'month');
INSERT INTO `books` VALUES ('00000000085', '交房租', '1547740800', '1493123191', null, '1', 'out', '1060', 'month');
INSERT INTO `books` VALUES ('00000000086', '交房租', '1550419200', '1493123191', null, '1', 'out', '1060', 'month');
INSERT INTO `books` VALUES ('00000000087', '交房租', '1552838400', '1493123191', null, '1', 'out', '1060', 'month');
INSERT INTO `books` VALUES ('00000000094', '房补', '1489507200', '1493123213', null, '1', 'in', '1500', 'quarter');
INSERT INTO `books` VALUES ('00000000095', '房补', '1497456000', '1493123213', null, '1', 'in', '1500', 'quarter');
INSERT INTO `books` VALUES ('00000000096', '房补', '1505404800', '1493123213', null, '1', 'in', '1500', 'quarter');
INSERT INTO `books` VALUES ('00000000097', '房补', '1513267200', '1493123213', null, '1', 'in', '1500', 'quarter');
INSERT INTO `books` VALUES ('00000000098', '房补', '1521043200', '1493123213', null, '1', 'in', '1500', 'quarter');
INSERT INTO `books` VALUES ('00000000099', '房补', '1528992000', '1493123213', null, '1', 'in', '1500', 'quarter');
INSERT INTO `books` VALUES ('00000000100', '房补', '1536940800', '1493123213', null, '1', 'in', '1500', 'quarter');
INSERT INTO `books` VALUES ('00000000101', '房补', '1544803200', '1493123213', null, '1', 'in', '1500', 'quarter');
INSERT INTO `books` VALUES ('00000000102', '房补', '1552579200', '1493123213', null, '1', 'in', '1500', 'quarter');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of budget
-- ----------------------------
INSERT INTO `budget` VALUES ('1', '2017-01-01', '1', '3500', '', '1');
INSERT INTO `budget` VALUES ('2', '2017-02-01', '2', '4000', '', '1');
INSERT INTO `budget` VALUES ('3', '2017-03-01', '3', '3500', '', '1');
INSERT INTO `budget` VALUES ('4', '2017-04-01', '4', '3500', '', '1');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of debtee
-- ----------------------------
INSERT INTO `debtee` VALUES ('1', '2017-04-06 14:00:00', '丈夫', '小吴', '500', '', '1');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of debtor
-- ----------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of diary
-- ----------------------------
INSERT INTO `diary` VALUES ('1', '					<p>通过记录收支，感觉节省了一大笔不必要的支出，开心，再接再厉</p>', '1', '2017-01-29', '一月理财总结');
INSERT INTO `diary` VALUES ('2', '					<p style=\"text-align: center; \">通过记录收支，感觉<u>二月份</u>又节省了一大笔不必要的支出，开心，再接再厉！</p><p style=\"text-align: center; \"><br></p>', '1', '2017-02-25', '二月理财总结');
INSERT INTO `diary` VALUES ('3', '					<p>通过记录收支，三月份虽然买了新手机，但是手头还有结余，开心，<u>再接再厉！</u></p><p><br></p>', '1', '2017-03-28', '三月理财总结');
INSERT INTO `diary` VALUES ('4', '					<p>通过记录收支，感觉节省了一大笔不必要的支出，再接再厉！马上就累积更多财富了</p><p><br></p>', '1', '2017-04-26', '四月理财总结');

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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf32;

-- ----------------------------
-- Records of income
-- ----------------------------
INSERT INTO `income` VALUES ('1', '2017-03-05 14:00:00', '职业收入', '银行卡账户', '6000', '本人', '本人工资', '1');
INSERT INTO `income` VALUES ('4', '2017-04-05 14:30:00', '职业收入', '银行卡账户', '6000', '本人', '本人工资', '1');
INSERT INTO `income` VALUES ('6', '2017-04-16 12:00:00', '兼职收入', '现金账户', '500', '本人', '写稿所得', '1');
INSERT INTO `income` VALUES ('7', '2017-01-05 17:05:00', '职业收入', '银行卡账户', '6000', '本人', '', '1');
INSERT INTO `income` VALUES ('9', '2017-02-05 13:00:00', '职业收入', '银行卡账户', '6800', '本人', '', '1');
INSERT INTO `income` VALUES ('11', '2017-01-06 17:00:00', '职业收入', '银行卡账户', '9000', '丈夫', '', '1');
INSERT INTO `income` VALUES ('12', '2017-02-06 13:00:00', '职业收入', '银行卡账户', '9800', '丈夫', '工资+奖金', '1');
INSERT INTO `income` VALUES ('14', '2017-03-06 13:00:00', '职业收入', '银行卡账户', '9500', '丈夫', '工资+奖金', '1');
INSERT INTO `income` VALUES ('17', '2017-04-06 13:00:00', '职业收入', '银行卡账户', '9300', '丈夫', '', '1');
INSERT INTO `income` VALUES ('18', '2017-03-23 17:00:00', '兼职收入', '银行卡账户', '550', '本人', '写稿', '1');
INSERT INTO `income` VALUES ('19', '2017-01-19 13:00:00', '兼职收入', '银行卡账户', '300', '本人', '稿子', '1');
INSERT INTO `income` VALUES ('22', '2017-02-22 13:00:00', '兼职收入', '银行卡账户', '320', '本人', '写稿', '1');

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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf32;

-- ----------------------------
-- Records of outgo
-- ----------------------------
INSERT INTO `outgo` VALUES ('1', '2017-03-11 13:00:00', '衣服饰品', '银行卡账户', '200', '本人', '买新外套啦', '1');
INSERT INTO `outgo` VALUES ('2', '2017-03-12 13:00:00', '食品酒水', '银行卡账户', '87', '本人', '买良品铺子零食啦', '1');
INSERT INTO `outgo` VALUES ('3', '2017-03-15 13:00:00', '交流通讯', '银行卡账户', '50', '本人', '本人交话费', '1');
INSERT INTO `outgo` VALUES ('5', '2017-04-15 08:00:00', '人情往来', '银行卡账户', '500', '本人', '小吴结婚份子钱', '1');
INSERT INTO `outgo` VALUES ('6', '2017-03-16 13:00:00', '交流通讯', '银行卡账户', '60', '丈夫', '交话费', '1');
INSERT INTO `outgo` VALUES ('7', '2017-03-18 13:00:00', '医疗保健', '银行卡账户', '300', '本人', '检查身体', '1');
INSERT INTO `outgo` VALUES ('8', '2017-03-20 21:00:00', '休闲娱乐', '银行卡账户', '50', '本人', 'ktv嗨皮', '1');
INSERT INTO `outgo` VALUES ('9', '2017-03-23 17:00:00', '学习进修', '银行卡账户', '68', '本人', '买书-PHP高级教程', '1');
INSERT INTO `outgo` VALUES ('10', '2017-01-21 13:00:00', '衣服饰品', '银行卡账户', '200', '丈夫', '', '1');
INSERT INTO `outgo` VALUES ('11', '2017-01-18 13:00:00', '居家物业', '银行卡账户', '1060', '家庭公用', '交房租', '1');
INSERT INTO `outgo` VALUES ('12', '2017-02-18 13:00:00', '居家物业', '银行卡账户', '1060', '家庭公用', '交房租', '1');
INSERT INTO `outgo` VALUES ('13', '2017-01-14 09:00:00', '食品酒水', '银行卡账户', '30', '家庭公用', '买菜', '1');
INSERT INTO `outgo` VALUES ('14', '2017-03-19 13:00:00', '数码产品', '银行卡账户', '5388', '丈夫', '买iPhone7', '1');
INSERT INTO `outgo` VALUES ('15', '2017-01-26 17:00:00', '食品酒水', '银行卡账户', '500', '家庭公用', '日常吃喝', '1');
INSERT INTO `outgo` VALUES ('16', '2017-01-30 00:00:00', '食品酒水', '银行卡账户', '500', '家庭公用', '日常吃喝', '1');
INSERT INTO `outgo` VALUES ('17', '2017-01-21 13:00:00', '衣服饰品', '银行卡账户', '300', '丈夫', '买新衣服啦', '1');
INSERT INTO `outgo` VALUES ('18', '2017-01-22 17:00:00', '衣服饰品', '银行卡账户', '300', '本人', '买新衣服', '1');
INSERT INTO `outgo` VALUES ('19', '2017-01-29 12:00:00', '食品酒水', '银行卡账户', '128', '本人', '吃肉蟹煲', '1');
INSERT INTO `outgo` VALUES ('20', '2017-02-04 15:00:00', '衣服饰品', '银行卡账户', '400', '本人', '买包包衣服化妆品', '1');
INSERT INTO `outgo` VALUES ('21', '2017-02-11 18:00:00', '衣服饰品', '银行卡账户', '200', '丈夫', '买包包腰带', '1');
INSERT INTO `outgo` VALUES ('22', '2017-03-18 21:00:00', '居家物业', '银行卡账户', '1060', '家庭公用', '房租', '1');
INSERT INTO `outgo` VALUES ('23', '2017-04-18 17:00:00', '居家物业', '银行卡账户', '1060', '家庭公用', '房租', '1');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sign
-- ----------------------------
INSERT INTO `sign` VALUES ('1', '1', '30', '2017-04-25 21:34:27');

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
INSERT INTO `t_account` VALUES ('1', '{\"type\":[\"银行卡账户\",\"信用卡账户\",\"虚拟账户\",\"现金账户\",\"债权账户\",\"债务账户\"]}', '1');

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
INSERT INTO `t_in` VALUES ('1', '{\"type\":[\"职业收入\",\"其他收入\",\"兼职收入\"]}', '1');

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
INSERT INTO `t_member` VALUES ('1', '{\"type\":[\"本人\",\"丈夫\",\"妻子\",\"子女\",\"父母\",\"家庭公用\"]}', '1');

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
INSERT INTO `t_out` VALUES ('1', '{\"type\":[\"衣服饰品\",\"食品酒水\",\"居家物业\",\"行车交通\",\"交流通讯\",\"休闲娱乐\",\"学习进修\",\"人情往来\",\"医疗保健\",\"金融保险\",\"其他款项\",\"数码产品\"]}', '1');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'Elean', '89f0b495890138511edbca8d446aa63e', '456321@126.com', '女', '15766666666', '/static/img/no-icon.jpg', 'Elean', '2017-04-25 20:22:49', '3', '2017-01-01 20:17:23', '', '你父亲的名字', '你就读过的学校', '你的生日', 'Jack', '郑州大学', '1994/12/04');

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
