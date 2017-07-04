/*
Navicat MySQL Data Transfer

Source Server         : 周天野主机
Source Server Version : 50636
Source Host           : 106.14.191.110:3306
Source Database       : bbs

Target Server Type    : MYSQL
Target Server Version : 50636
File Encoding         : 65001

Date: 2017-07-04 16:01:34
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for Advertisement
-- ----------------------------
DROP TABLE IF EXISTS `Advertisement`;
CREATE TABLE `Advertisement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL,
  `details` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `adclass` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of Advertisement
-- ----------------------------
INSERT INTO `Advertisement` VALUES ('34', '丰田公司', '2017-12-12', '车到山前必有路，有路必有丰田车', './uploads_ad/2017/06/30/201706305955f24fe0942.jpg', 'www.fengtian.com', '0');
INSERT INTO `Advertisement` VALUES ('32', '钓鱼线', '2018-04-03', '用我们的钓线，你可以在鱼儿发现你之前先找到它', './uploads_ad/2017/06/30/201706305955f1605c397.jpg', 'www.diaoyu.com/', '0');
INSERT INTO `Advertisement` VALUES ('33', '钻石', '2020-04-01', '钻石恒久远，一颗永流传', './uploads_ad/2017/06/30/201706305955f1f9eb44e.jpg', 'www.zuanshi.com', '0');
INSERT INTO `Advertisement` VALUES ('35', 'heiheihei', '0232-02-23', '这车不错啊', './uploads_ad/2017/07/04/20170704595a6caf23d6a.jpg', 'www.121212.com', '0');
INSERT INTO `Advertisement` VALUES ('36', '7/4最后一次测试广告模块', '2018-04-02', 'test 7/4最后一次测试广告模块', './uploads_ad/2017/07/04/20170704595aed7e938dc.jpg', 'www.asas.com', '0');

-- ----------------------------
-- Table structure for bbs_astore
-- ----------------------------
DROP TABLE IF EXISTS `bbs_astore`;
CREATE TABLE `bbs_astore` (
  `uid` int(11) NOT NULL COMMENT '用户id',
  `thid` int(11) NOT NULL COMMENT '帖子id',
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bbs_astore
-- ----------------------------
INSERT INTO `bbs_astore` VALUES ('18', '55', '1499076295');
INSERT INTO `bbs_astore` VALUES ('30', '27', '1499146663');
INSERT INTO `bbs_astore` VALUES ('32', '103', '1499150581');

-- ----------------------------
-- Table structure for bbs_auth_group
-- ----------------------------
DROP TABLE IF EXISTS `bbs_auth_group`;
CREATE TABLE `bbs_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` char(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bbs_auth_group
-- ----------------------------
INSERT INTO `bbs_auth_group` VALUES ('2', '管理员', '1', '1,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,20,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64');
INSERT INTO `bbs_auth_group` VALUES ('20', '超管', '1', '4,5,6,7,8,9,10,12,13,14,15,16,17,11,18,20,22,23,24,25');
INSERT INTO `bbs_auth_group` VALUES ('21', '测试', '1', '12,13,14,15,16,17,11,18,20,22,23,24,25');

-- ----------------------------
-- Table structure for bbs_auth_group_access
-- ----------------------------
DROP TABLE IF EXISTS `bbs_auth_group_access`;
CREATE TABLE `bbs_auth_group_access` (
  `uid` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bbs_auth_group_access
-- ----------------------------
INSERT INTO `bbs_auth_group_access` VALUES ('2', '2');
INSERT INTO `bbs_auth_group_access` VALUES ('7', '2');
INSERT INTO `bbs_auth_group_access` VALUES ('9', '2');
INSERT INTO `bbs_auth_group_access` VALUES ('9', '18');
INSERT INTO `bbs_auth_group_access` VALUES ('10', '2');
INSERT INTO `bbs_auth_group_access` VALUES ('30', '21');

-- ----------------------------
-- Table structure for bbs_auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `bbs_auth_rule`;
CREATE TABLE `bbs_auth_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(80) NOT NULL DEFAULT '',
  `title` char(20) NOT NULL DEFAULT '',
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `sort` tinyint(6) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `condition` char(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=101 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bbs_auth_rule
-- ----------------------------
INSERT INTO `bbs_auth_rule` VALUES ('1', 'admin\\IndexController@person', '后台个人中心', '1', '1', '1', '');
INSERT INTO `bbs_auth_rule` VALUES ('4', 'admin\\UserController@index', '查看用户', '1', '2', '1', '');
INSERT INTO `bbs_auth_rule` VALUES ('5', 'admin\\UserController@add', '添加用户页面', '1', '2', '1', '');
INSERT INTO `bbs_auth_rule` VALUES ('6', 'admin\\UserController@store', '执行添加用户', '1', '2', '1', '');
INSERT INTO `bbs_auth_rule` VALUES ('7', 'admin\\UserController@userUpdate', '用户修改页面', '1', '2', '1', '');
INSERT INTO `bbs_auth_rule` VALUES ('8', 'admin\\UserController@update', '执行用户修改', '1', '2', '1', '');
INSERT INTO `bbs_auth_rule` VALUES ('9', 'admin\\UserController@destroy', '删除用户', '1', '2', '1', '');
INSERT INTO `bbs_auth_rule` VALUES ('10', 'admin\\UserController@updategroup', '执行修改用户组', '1', '2', '1', '');
INSERT INTO `bbs_auth_rule` VALUES ('12', 'admin\\UserGroupController@member', '查看会员组权限', '1', '3', '1', '');
INSERT INTO `bbs_auth_rule` VALUES ('13', 'admin\\UserGroupController@defaults', '查看默认组权限', '1', '3', '1', '');
INSERT INTO `bbs_auth_rule` VALUES ('14', 'admin\\UserGroupController@system', '查看管理组权限', '1', '3', '1', '');
INSERT INTO `bbs_auth_rule` VALUES ('15', 'admin\\UserGroupController@insert', '添加会员组权限', '1', '3', '1', '');
INSERT INTO `bbs_auth_rule` VALUES ('16', 'admin\\UserGroupController@mod', '用户组权限页面', '1', '3', '1', '');
INSERT INTO `bbs_auth_rule` VALUES ('17', 'admin\\UserGroupController@update', '执行用户组权限修改', '1', '3', '1', '');
INSERT INTO `bbs_auth_rule` VALUES ('18', 'admin\\AuthGroupController@index', '查看管理组列表', '1', '4', '1', '');
INSERT INTO `bbs_auth_rule` VALUES ('20', 'admin\\AuthGroupController@insert', '执行添加管理组', '1', '4', '1', '');
INSERT INTO `bbs_auth_rule` VALUES ('11', 'admin\\UserGroupController@delete', '普通用户权限删除', '1', '3', '1', '');
INSERT INTO `bbs_auth_rule` VALUES ('22', 'admin\\AuthGroupController@update', '执行修改管理组', '1', '4', '1', '');
INSERT INTO `bbs_auth_rule` VALUES ('23', 'admin\\AuthGroupController@delete', '删除管理组', '1', '4', '1', '');
INSERT INTO `bbs_auth_rule` VALUES ('24', 'admin\\AuthRuleController@index', '添加规则列表页面', '1', '5', '1', '');
INSERT INTO `bbs_auth_rule` VALUES ('25', 'admin\\AuthRuleController@insert', '执行添加规则', '1', '5', '1', '');
INSERT INTO `bbs_auth_rule` VALUES ('26', 'Nav/index', '导航栏目浏览', '1', '6', '1', '');
INSERT INTO `bbs_auth_rule` VALUES ('27', 'Nav/add', '添加导航栏目页面', '1', '6', '1', '');
INSERT INTO `bbs_auth_rule` VALUES ('28', 'Nav/insert', '执行添加导航栏目', '1', '6', '1', '');
INSERT INTO `bbs_auth_rule` VALUES ('29', 'Nav/mod', '修改导航栏目页面', '1', '6', '1', '');
INSERT INTO `bbs_auth_rule` VALUES ('30', 'Nav/update', '执行修改导航栏目', '1', '6', '1', '');
INSERT INTO `bbs_auth_rule` VALUES ('31', 'Nav/del', '删除导航栏目', '1', '6', '1', '');
INSERT INTO `bbs_auth_rule` VALUES ('32', 'Type/index', '版块列表页', '1', '7', '1', '');
INSERT INTO `bbs_auth_rule` VALUES ('33', 'Type/add1', '添加根版块页面', '1', '7', '1', '');
INSERT INTO `bbs_auth_rule` VALUES ('34', 'Type/add2', '添加子版块页面', '1', '7', '1', '');
INSERT INTO `bbs_auth_rule` VALUES ('35', 'Type/insert1', '执行添加根版块', '1', '7', '1', '');
INSERT INTO `bbs_auth_rule` VALUES ('36', 'Type/insert2', '执行添加子版块', '1', '7', '1', '');
INSERT INTO `bbs_auth_rule` VALUES ('37', 'Type/mod', '修改版块页面', '1', '7', '1', '');
INSERT INTO `bbs_auth_rule` VALUES ('38', 'Type/update', '执行修改版块', '1', '7', '1', '');
INSERT INTO `bbs_auth_rule` VALUES ('39', 'Type/del', '删除板块', '1', '7', '1', '');
INSERT INTO `bbs_auth_rule` VALUES ('40', 'Card/index', '帖子列表页', '1', '8', '1', '');
INSERT INTO `bbs_auth_rule` VALUES ('41', 'Card/mod', '修改帖子页面', '1', '8', '1', '');
INSERT INTO `bbs_auth_rule` VALUES ('42', 'Card/update', '执行修改帖子状态', '1', '8', '1', '');
INSERT INTO `bbs_auth_rule` VALUES ('43', 'Card/del', '删除帖子', '1', '8', '1', '');
INSERT INTO `bbs_auth_rule` VALUES ('44', 'Comment/index', '浏览回复信息页', '1', '9', '1', '');
INSERT INTO `bbs_auth_rule` VALUES ('45', 'Comment/mod', '修改回复信息页面', '1', '9', '1', '');
INSERT INTO `bbs_auth_rule` VALUES ('46', 'Comment/update', '执行修改回复', '1', '9', '1', '');
INSERT INTO `bbs_auth_rule` VALUES ('47', 'Comment/del', '删除回复', '1', '9', '1', '');
INSERT INTO `bbs_auth_rule` VALUES ('48', 'Verify/index', '查看帖子主题信息', '1', '10', '1', '');
INSERT INTO `bbs_auth_rule` VALUES ('49', 'Verify/mod', '处理帖子页面', '1', '10', '1', '');
INSERT INTO `bbs_auth_rule` VALUES ('50', 'Verify/update', '执行处理帖子', '1', '10', '1', '');
INSERT INTO `bbs_auth_rule` VALUES ('51', 'Total/index', '浏览数据信息页面', '1', '11', '1', '');
INSERT INTO `bbs_auth_rule` VALUES ('52', 'Filter/index', '浏览敏感词信息页面', '1', '12', '1', '');
INSERT INTO `bbs_auth_rule` VALUES ('53', 'Filter/mod', '修改敏感词页面', '1', '12', '1', '');
INSERT INTO `bbs_auth_rule` VALUES ('54', 'Filter/add', '添加敏感词页面', '1', '12', '1', '');
INSERT INTO `bbs_auth_rule` VALUES ('55', 'Filter/insert', '执行添加敏感词', '1', '12', '1', '');
INSERT INTO `bbs_auth_rule` VALUES ('56', 'Filter/update', '执行修改敏感词', '1', '12', '1', '');
INSERT INTO `bbs_auth_rule` VALUES ('57', 'Filter/del', '删除敏感词', '1', '12', '1', '');
INSERT INTO `bbs_auth_rule` VALUES ('58', 'Inform/index1', '浏览举报帖子页面', '1', '13', '1', '');
INSERT INTO `bbs_auth_rule` VALUES ('59', 'Inform/index2', '浏览举报评论页面', '1', '13', '1', '');
INSERT INTO `bbs_auth_rule` VALUES ('60', 'Inform/editCard', '修改被举报的帖子', '1', '13', '1', '');
INSERT INTO `bbs_auth_rule` VALUES ('61', 'Cardtop/index', '浏览置顶信息页面', '1', '14', '1', '');
INSERT INTO `bbs_auth_rule` VALUES ('62', 'Cardtop/update', '撤销置顶操作流程', '1', '14', '1', '');
INSERT INTO `bbs_auth_rule` VALUES ('63', 'Essence/index', '浏览精华信息页面', '1', '15', '1', '');
INSERT INTO `bbs_auth_rule` VALUES ('64', 'Essence/update', '撤销精华操作流程', '1', '15', '1', '');

-- ----------------------------
-- Table structure for bbs_blogroll
-- ----------------------------
DROP TABLE IF EXISTS `bbs_blogroll`;
CREATE TABLE `bbs_blogroll` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `url` varchar(100) NOT NULL,
  `details` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bbs_blogroll
-- ----------------------------
INSERT INTO `bbs_blogroll` VALUES ('1', '百度', 'www.baidu.com', '百度（纳斯达克：BIDU），全球最大的中文搜索引擎、最大的中文网站。1999年底,身在美国硅谷的李彦宏看到了中国互联网及中文搜索引擎服务的巨大发展潜力，抱着技术改变世界的梦想，他毅然辞掉硅谷的高薪工作，携搜索引擎专利技术，于 2000年1月1日在中关村创建了百度公司');
INSERT INTO `bbs_blogroll` VALUES ('2', '小米科技', 'www.mi.com', '北京小米科技有限责任公司成立2010年4月，是一家专注于智能硬件和电子产品研发的移动互联网公司。“为发烧而生”是小米的产品概念。小米公司首创了用互联网模式开发手机操作系统、发烧友参与开发改进的模式。');

-- ----------------------------
-- Table structure for bbs_bstore
-- ----------------------------
DROP TABLE IF EXISTS `bbs_bstore`;
CREATE TABLE `bbs_bstore` (
  `uid` int(11) NOT NULL COMMENT '用户id',
  `fid` int(11) NOT NULL COMMENT '论坛id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bbs_bstore
-- ----------------------------
INSERT INTO `bbs_bstore` VALUES ('18', '9');

-- ----------------------------
-- Table structure for bbs_carousel
-- ----------------------------
DROP TABLE IF EXISTS `bbs_carousel`;
CREATE TABLE `bbs_carousel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `details` varchar(20) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `uptime` varchar(100) NOT NULL,
  `display` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bbs_carousel
-- ----------------------------
INSERT INTO `bbs_carousel` VALUES ('13', '5', './uploads_carousel/2017/06/29/2017062959550a7c6b554.jpg', '2017-06-29  22:06', '0');
INSERT INTO `bbs_carousel` VALUES ('12', '4', './uploads_carousel/2017/06/29/2017062959550a6ebc0f3.jpg', '2017-06-29  22:06', '0');
INSERT INTO `bbs_carousel` VALUES ('15', '222', './uploads_carousel/2017/07/04/20170704595b2f180310f.jpg', '2017-07-04  14:07', '0');
INSERT INTO `bbs_carousel` VALUES ('10', '2', './uploads_carousel/2017/06/29/2017062959550a4b9ae0b.jpg', '2017-06-29  22:06', '0');
INSERT INTO `bbs_carousel` VALUES ('9', '1', './uploads_carousel/2017/06/29/2017062959550a3513fc7.jpg', '2017-06-29  22:06', '0');

-- ----------------------------
-- Table structure for bbs_friend
-- ----------------------------
DROP TABLE IF EXISTS `bbs_friend`;
CREATE TABLE `bbs_friend` (
  `uid` int(11) NOT NULL COMMENT '用户id',
  `fid` int(11) NOT NULL COMMENT '好友id',
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bbs_friend
-- ----------------------------
INSERT INTO `bbs_friend` VALUES ('12', '2', '1498663714');
INSERT INTO `bbs_friend` VALUES ('18', '2', '1498931447');
INSERT INTO `bbs_friend` VALUES ('2', '18', '1498983587');
INSERT INTO `bbs_friend` VALUES ('9', '10', '1499050016');
INSERT INTO `bbs_friend` VALUES ('18', '29', '1499084187');
INSERT INTO `bbs_friend` VALUES ('29', '28', '1499092918');
INSERT INTO `bbs_friend` VALUES ('29', '2', '1499092925');
INSERT INTO `bbs_friend` VALUES ('9', '2', '1499095585');
INSERT INTO `bbs_friend` VALUES ('2', '9', '1499134063');
INSERT INTO `bbs_friend` VALUES ('2', '12', '1499134842');
INSERT INTO `bbs_friend` VALUES ('2', '10', '1499140776');
INSERT INTO `bbs_friend` VALUES ('2', '13', '1499151993');

-- ----------------------------
-- Table structure for bbs_mark
-- ----------------------------
DROP TABLE IF EXISTS `bbs_mark`;
CREATE TABLE `bbs_mark` (
  `uid` int(11) NOT NULL COMMENT '用户id',
  `days` int(11) NOT NULL DEFAULT '0' COMMENT '连续签到时间',
  `time` varchar(255) NOT NULL COMMENT '签到时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bbs_mark
-- ----------------------------
INSERT INTO `bbs_mark` VALUES ('2', '1', '1499151806');

-- ----------------------------
-- Table structure for bbs_medleinfo
-- ----------------------------
DROP TABLE IF EXISTS `bbs_medleinfo`;
CREATE TABLE `bbs_medleinfo` (
  `medal_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `points` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `descrip` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`medal_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of bbs_medleinfo
-- ----------------------------
INSERT INTO `bbs_medleinfo` VALUES ('1', '荣誉会员', '20000', './uploads/big/rongyuhuiyuan.gif', '为网站的发展做出卓越贡献的会员（2000积分可得）');
INSERT INTO `bbs_medleinfo` VALUES ('2', '社区居民', '0', './uploads/big/shequjumin.gif', '注册用户登录后领取即可获得此勋章（0积分获得）');
INSERT INTO `bbs_medleinfo` VALUES ('3', '社区明星', '100', './uploads/big/shequmingxing.gif', '提高自身活跃度，增加到100点积分即可获得此勋章');
INSERT INTO `bbs_medleinfo` VALUES ('4', '最爱沙发', '200', './uploads/big/zuiaishafa.gif', '坐沙发什么的最爽，赶紧去获得100点积分吧（200点积分它就是你的了）');
INSERT INTO `bbs_medleinfo` VALUES ('5', '喜欢达人', '300', './uploads/big/xihuandaren.gif', '努力发好帖，再获得100点积分。（300点积分可得）');
INSERT INTO `bbs_medleinfo` VALUES ('6', '社区劳模', '400', './uploads/big/shequlaomo.gif', '劳动最光荣，努力当劳模！（400点积分，我一直在等你啊）');
INSERT INTO `bbs_medleinfo` VALUES ('7', '原创写手', '500', './uploads/big/yuanchuangxieshou.gif', '做人就要做自己，500积分即可获得此勋章');
INSERT INTO `bbs_medleinfo` VALUES ('8', 'VIP会员', '1000', './uploads/big/viphuiyuan.gif', '尊贵的身份象征，网站高级会员(1000积分可获得)');
INSERT INTO `bbs_medleinfo` VALUES ('9', '忠实会员', '600', './uploads/big/zhongshihuiyuan.gif', '会员中的战斗机，600积分可得');
INSERT INTO `bbs_medleinfo` VALUES ('10', '追星一族', '600', './uploads/big/zhuixingyizu.gif', '狂热的追星一族，600点积分即可获得');
INSERT INTO `bbs_medleinfo` VALUES ('12', '荣誉会员', '2000', './uploads/big/youxiubanzhu.gif', '为网站的发展做出卓越贡献的会员（2000积分可得）');
INSERT INTO `bbs_medleinfo` VALUES ('13', 'ceshi', '2000', './uploads/big/20170704595b3b589d7c8.jpg', '11111');

-- ----------------------------
-- Table structure for bbs_message
-- ----------------------------
DROP TABLE IF EXISTS `bbs_message`;
CREATE TABLE `bbs_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `head` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `reuid` int(11) NOT NULL,
  `seuid` int(11) NOT NULL,
  `time` varchar(20) NOT NULL,
  `seperson` varchar(20) NOT NULL,
  `reperson` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bbs_message
-- ----------------------------
INSERT INTO `bbs_message` VALUES ('36', '你好', '7/4 最后一次测试', '2', '9', '2017-07-04 10:07', '张伟康', 'admin');
INSERT INTO `bbs_message` VALUES ('33', '你好啊', '你好啊', '10', '9', '2017-07-03 10:07', '张伟康', 'lcc');
INSERT INTO `bbs_message` VALUES ('38', '111', '1111', '9', '2', '2017-07-04 10:07', 'admin', '张伟康');
INSERT INTO `bbs_message` VALUES ('39', '内好啊', '今天吃啥', '9', '2', '2017-07-04 11:07', 'admin', '张伟康');

-- ----------------------------
-- Table structure for bbs_notice
-- ----------------------------
DROP TABLE IF EXISTS `bbs_notice`;
CREATE TABLE `bbs_notice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL,
  `details` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0' COMMENT '0 未发布 1 已发布',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bbs_notice
-- ----------------------------
INSERT INTO `bbs_notice` VALUES ('5', '刘超超升级ceo', '2017-02-22', '因巴结lm 副总 被升级未ceo', '1');
INSERT INTO `bbs_notice` VALUES ('4', '周天野降薪公告', '2017-02-02', '因周天野 挑衅张伟康老总 扣除一半工资', '1');
INSERT INTO `bbs_notice` VALUES ('6', '从今天开始大家放假三天', '2017-07-04', '从今天开始大家放假三天', '0');
INSERT INTO `bbs_notice` VALUES ('7', '111', '2017-07-04', 'carhome 小组二期项目完成', '1');
INSERT INTO `bbs_notice` VALUES ('8', '张伟康最帅', '2017-04-02', '张伟康最帅', '1');

-- ----------------------------
-- Table structure for bbs_photo
-- ----------------------------
DROP TABLE IF EXISTS `bbs_photo`;
CREATE TABLE `bbs_photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `picture` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `uptime` varchar(20) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `details` varchar(255) NOT NULL,
  `class` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=79 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bbs_photo
-- ----------------------------
INSERT INTO `bbs_photo` VALUES ('68', './uploads_photo/2017/06/28/20170628595371143bde9.jpg', '精美图片', '2017-06-28  17:06', '0', '精美图片', '174');
INSERT INTO `bbs_photo` VALUES ('41', './uploads_photo/2017/06/28/2017062859535984b67f6.jpg', '兰博基尼哦', '2017-06-28  15:06', '0', '666', '167');
INSERT INTO `bbs_photo` VALUES ('42', './uploads_photo/2017/06/28/20170628595359a03a983.jpg', '宝马', '2017-06-28  15:06', '0', '这车s帅的不行啊', '167');
INSERT INTO `bbs_photo` VALUES ('43', './uploads_photo/2017/06/28/20170628595359adca4bd.jpg', '法拉利', '2017-06-28  15:06', '0', '这车s帅的不行啊', '167');
INSERT INTO `bbs_photo` VALUES ('44', './uploads_photo/2017/06/28/20170628595359d1833d5.jpg', '法拉利', '2017-06-28  15:06', '0', '这车s帅的不行啊', '167');
INSERT INTO `bbs_photo` VALUES ('45', './uploads_photo/2017/06/28/20170628595359e06a0e5.jpg', '法拉利', '2017-06-28  15:06', '0', '这车s帅的不行啊', '167');
INSERT INTO `bbs_photo` VALUES ('46', './uploads_photo/2017/06/28/20170628595359f1099fc.jpg', '法拉利', '2017-06-28  15:06', '0', '这车s帅的不行啊', '167');
INSERT INTO `bbs_photo` VALUES ('47', './uploads_photo/2017/06/28/2017062859535a0297be3.jpg', '宝马', '2017-06-28  15:06', '0', '这车s帅的不行啊', '167');
INSERT INTO `bbs_photo` VALUES ('48', './uploads_photo/2017/06/28/2017062859535a16ce397.jpg', '款炫', '2017-06-28  15:06', '0', '这车s帅的不行啊', '167');
INSERT INTO `bbs_photo` VALUES ('49', './uploads_photo/2017/06/28/2017062859535a2c05463.jpg', '豪车', '2017-06-28  15:06', '0', '这车s帅的不行啊', '167');
INSERT INTO `bbs_photo` VALUES ('50', './uploads_photo/2017/06/28/2017062859535a3ef2f9a.jpg', '奔驰概念车', '2017-06-28  15:06', '0', '这车s帅的不行啊', '167');
INSERT INTO `bbs_photo` VALUES ('51', './uploads_photo/2017/06/28/2017062859535a59e9641.jpg', '精美照片', '2017-06-28  15:06', '0', '精美照片', '167');
INSERT INTO `bbs_photo` VALUES ('52', './uploads_photo/2017/06/28/2017062859535a7320a6c.jpg', '精美照片', '2017-06-28  15:06', '0', '精美照片', '172');
INSERT INTO `bbs_photo` VALUES ('53', './uploads_photo/2017/06/28/2017062859535a80b685b.jpg', '精美照片', '2017-06-28  15:06', '0', '精美照片', '167');
INSERT INTO `bbs_photo` VALUES ('54', './uploads_photo/2017/06/28/2017062859535aa1362f5.jpg', '精美照片', '2017-06-28  15:06', '0', '精美照片', '172');
INSERT INTO `bbs_photo` VALUES ('55', './uploads_photo/2017/06/28/2017062859535aae4b4e2.jpg', '精美照片', '2017-06-28  15:06', '0', '精美照片', '172');
INSERT INTO `bbs_photo` VALUES ('56', './uploads_photo/2017/06/28/2017062859535abdae490.jpg', '精美照片', '2017-06-28  15:06', '0', '精美照片', '174');
INSERT INTO `bbs_photo` VALUES ('57', './uploads_photo/2017/06/28/2017062859535acdc430b.jpg', '精美照片', '2017-06-28  15:06', '0', '精美照片', '172');
INSERT INTO `bbs_photo` VALUES ('58', './uploads_photo/2017/06/28/2017062859535adba3b78.jpg', '精美照片', '2017-06-28  15:06', '0', '精美照片', '174');
INSERT INTO `bbs_photo` VALUES ('59', './uploads_photo/2017/06/28/2017062859535aeb7ff46.jpg', '精美照片', '2017-06-28  15:06', '0', '精美照片', '174');
INSERT INTO `bbs_photo` VALUES ('60', './uploads_photo/2017/06/28/2017062859535af962a18.jpg', '精美照片', '2017-06-28  15:06', '0', '精美照片', '167');
INSERT INTO `bbs_photo` VALUES ('61', './uploads_photo/2017/06/28/2017062859535b0d6ad6c.jpg', '精美照片', '2017-06-28  15:06', '0', '精美照片', '174');
INSERT INTO `bbs_photo` VALUES ('62', './uploads_photo/2017/06/28/2017062859535b1bb7947.jpg', '精美照片', '2017-06-28  15:06', '0', '精美照片', '174');
INSERT INTO `bbs_photo` VALUES ('65', './uploads_photo/2017/06/28/2017062859535b63029ce.jpg', '精美照片', '2017-06-28  15:06', '0', '精美照片', '172');
INSERT INTO `bbs_photo` VALUES ('66', './uploads_photo/2017/06/28/2017062859535b7048838.jpg', '精美照片', '2017-06-28  15:06', '0', '精美照片', '152');
INSERT INTO `bbs_photo` VALUES ('67', './uploads_photo/2017/06/28/2017062859535b8142e2e.jpg', '精美照片', '2017-06-28  15:06', '0', '精美照片', '172');
INSERT INTO `bbs_photo` VALUES ('70', './uploads_photo/2017/06/28/20170628595371b9606c7.jpg', '精美图片', '2017-06-28  17:06', '0', '精美图片', '152');
INSERT INTO `bbs_photo` VALUES ('71', './uploads_photo/2017/06/28/20170628595371c3a0366.jpg', '精美图片', '2017-06-28  17:06', '0', '精美图片', '174');
INSERT INTO `bbs_photo` VALUES ('72', './uploads_photo/2017/06/28/20170628595371ddc7a17.jpg', '精美图片', '2017-06-28  17:06', '0', '精美图片', '173');
INSERT INTO `bbs_photo` VALUES ('73', './uploads_photo/2017/06/28/201706285953720576f71.jpg', '精美图片', '2017-06-28  17:06', '0', '精美图片', '173');
INSERT INTO `bbs_photo` VALUES ('74', './uploads_photo/2017/06/28/201706285953720f90906.jpg', '精美图片', '2017-06-28  17:06', '0', '精美图片', '173');
INSERT INTO `bbs_photo` VALUES ('75', './uploads_photo/2017/06/28/201706285953721b4a57c.jpg', '精美图片', '2017-06-28  17:06', '0', '精美图片', '173');
INSERT INTO `bbs_photo` VALUES ('76', './uploads_photo/2017/06/28/201706285953722cc7094.jpg', '精美图片', '2017-06-28  17:06', '0', '精美图片', '167');
INSERT INTO `bbs_photo` VALUES ('77', './uploads_photo/2017/07/04/20170704595aecc3bd8f1.jpg', '测试', '2017-07-04  09:07', '0', '测试', '175');
INSERT INTO `bbs_photo` VALUES ('78', './uploads_photo/2017/07/04/20170704595b3c29d620c.jpg', '美女', '2017-07-04  14:07', '0', '哈哈哈', '176');

-- ----------------------------
-- Table structure for bbs_point
-- ----------------------------
DROP TABLE IF EXISTS `bbs_point`;
CREATE TABLE `bbs_point` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL DEFAULT '0',
  `typeid` int(11) NOT NULL DEFAULT '0',
  `point` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=377 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of bbs_point
-- ----------------------------
INSERT INTO `bbs_point` VALUES ('1', '2', '1', '20');
INSERT INTO `bbs_point` VALUES ('2', '1', '2', '90');
INSERT INTO `bbs_point` VALUES ('3', '1', '3', '200');
INSERT INTO `bbs_point` VALUES ('4', '1', '4', '150');
INSERT INTO `bbs_point` VALUES ('5', '1', '1', '100');
INSERT INTO `bbs_point` VALUES ('6', '1', '2', '30');
INSERT INTO `bbs_point` VALUES ('7', '6', '1', '40');
INSERT INTO `bbs_point` VALUES ('8', '1', '1', '80');
INSERT INTO `bbs_point` VALUES ('9', '1', '2', '20');
INSERT INTO `bbs_point` VALUES ('10', '5', '1', '20');
INSERT INTO `bbs_point` VALUES ('11', '15', '1', '20');
INSERT INTO `bbs_point` VALUES ('12', '6', '1', '20');
INSERT INTO `bbs_point` VALUES ('13', '6', '2', '10');
INSERT INTO `bbs_point` VALUES ('279', '2', '3', '30');
INSERT INTO `bbs_point` VALUES ('280', '2', '3', '30');
INSERT INTO `bbs_point` VALUES ('281', '2', '1', '30');
INSERT INTO `bbs_point` VALUES ('282', '2', '1', '30');
INSERT INTO `bbs_point` VALUES ('283', '2', '1', '30');
INSERT INTO `bbs_point` VALUES ('284', '2', '1', '30');
INSERT INTO `bbs_point` VALUES ('304', '2', '1', '30');
INSERT INTO `bbs_point` VALUES ('305', '2', '1', '30');
INSERT INTO `bbs_point` VALUES ('306', '10', '1', '30');
INSERT INTO `bbs_point` VALUES ('307', '2', '1', '30');
INSERT INTO `bbs_point` VALUES ('308', '9', '1', '30');
INSERT INTO `bbs_point` VALUES ('309', '2', '1', '30');
INSERT INTO `bbs_point` VALUES ('310', '2', '1', '18000');
INSERT INTO `bbs_point` VALUES ('311', '2', '1', '30');
INSERT INTO `bbs_point` VALUES ('312', '2', '1', '30');
INSERT INTO `bbs_point` VALUES ('313', '2', '1', '30');
INSERT INTO `bbs_point` VALUES ('314', '2', '1', '30');
INSERT INTO `bbs_point` VALUES ('315', '2', '1', '30');
INSERT INTO `bbs_point` VALUES ('316', '2', '1', '30');
INSERT INTO `bbs_point` VALUES ('317', '2', '1', '30');
INSERT INTO `bbs_point` VALUES ('318', '2', '1', '30');
INSERT INTO `bbs_point` VALUES ('319', '2', '1', '30');
INSERT INTO `bbs_point` VALUES ('320', '2', '3', '30');
INSERT INTO `bbs_point` VALUES ('321', '2', '3', '30');
INSERT INTO `bbs_point` VALUES ('322', '2', '3', '30');
INSERT INTO `bbs_point` VALUES ('323', '2', '2', '20');
INSERT INTO `bbs_point` VALUES ('324', '2', '2', '20');
INSERT INTO `bbs_point` VALUES ('325', '2', '2', '20');
INSERT INTO `bbs_point` VALUES ('326', '2', '2', '20');
INSERT INTO `bbs_point` VALUES ('327', '9', '1', '30');
INSERT INTO `bbs_point` VALUES ('328', '2', '3', '30');
INSERT INTO `bbs_point` VALUES ('329', '2', '1', '30');
INSERT INTO `bbs_point` VALUES ('330', '2', '3', '30');
INSERT INTO `bbs_point` VALUES ('331', '2', '3', '30');
INSERT INTO `bbs_point` VALUES ('332', '2', '2', '20');
INSERT INTO `bbs_point` VALUES ('333', '2', '2', '20000');
INSERT INTO `bbs_point` VALUES ('334', '9', '1', '30');
INSERT INTO `bbs_point` VALUES ('335', '30', '1', '30');
INSERT INTO `bbs_point` VALUES ('336', '30', '1', '30');
INSERT INTO `bbs_point` VALUES ('337', '2', '1', '30');
INSERT INTO `bbs_point` VALUES ('338', '30', '2', '20');
INSERT INTO `bbs_point` VALUES ('339', '30', '2', '20');
INSERT INTO `bbs_point` VALUES ('340', '30', '3', '30');
INSERT INTO `bbs_point` VALUES ('341', '2', '1', '30');
INSERT INTO `bbs_point` VALUES ('342', '2', '3', '30');
INSERT INTO `bbs_point` VALUES ('343', '30', '3', '30');
INSERT INTO `bbs_point` VALUES ('344', '2', '3', '30');
INSERT INTO `bbs_point` VALUES ('345', '30', '3', '30');
INSERT INTO `bbs_point` VALUES ('346', '30', '3', '30');
INSERT INTO `bbs_point` VALUES ('347', '2', '1', '30');
INSERT INTO `bbs_point` VALUES ('348', '2', '3', '30');
INSERT INTO `bbs_point` VALUES ('349', '30', '1', '30');
INSERT INTO `bbs_point` VALUES ('350', '2', '1', '30');
INSERT INTO `bbs_point` VALUES ('351', '9', '1', '30');
INSERT INTO `bbs_point` VALUES ('352', '2', '1', '30');
INSERT INTO `bbs_point` VALUES ('353', '2', '1', '30');
INSERT INTO `bbs_point` VALUES ('354', '2', '3', '30');
INSERT INTO `bbs_point` VALUES ('355', '2', '2', '20');
INSERT INTO `bbs_point` VALUES ('356', '2', '2', '20');
INSERT INTO `bbs_point` VALUES ('357', '2', '2', '20');
INSERT INTO `bbs_point` VALUES ('358', '9', '1', '30');
INSERT INTO `bbs_point` VALUES ('359', '2', '1', '30');
INSERT INTO `bbs_point` VALUES ('360', '32', '1', '30');
INSERT INTO `bbs_point` VALUES ('361', '32', '2', '20');
INSERT INTO `bbs_point` VALUES ('362', '32', '2', '20');
INSERT INTO `bbs_point` VALUES ('363', '32', '2', '20');
INSERT INTO `bbs_point` VALUES ('364', '32', '2', '20');
INSERT INTO `bbs_point` VALUES ('365', '32', '3', '30');
INSERT INTO `bbs_point` VALUES ('366', '32', '3', '130');
INSERT INTO `bbs_point` VALUES ('367', '32', '2', '20');
INSERT INTO `bbs_point` VALUES ('368', '33', '1', '30');
INSERT INTO `bbs_point` VALUES ('369', '33', '2', '0');
INSERT INTO `bbs_point` VALUES ('370', '33', '3', '0');
INSERT INTO `bbs_point` VALUES ('371', '33', '4', '0');
INSERT INTO `bbs_point` VALUES ('372', '2', '1', '30');
INSERT INTO `bbs_point` VALUES ('373', '9', '1', '30');
INSERT INTO `bbs_point` VALUES ('374', '2', '1', '30');
INSERT INTO `bbs_point` VALUES ('375', '2', '1', '30');
INSERT INTO `bbs_point` VALUES ('376', '2', '1', '30');

-- ----------------------------
-- Table structure for bbs_pointrule
-- ----------------------------
DROP TABLE IF EXISTS `bbs_pointrule`;
CREATE TABLE `bbs_pointrule` (
  `typeid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `value` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`typeid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of bbs_pointrule
-- ----------------------------
INSERT INTO `bbs_pointrule` VALUES ('1', '注册/登录', '30');
INSERT INTO `bbs_pointrule` VALUES ('2', '回帖', '20');
INSERT INTO `bbs_pointrule` VALUES ('3', '发帖', '130');
INSERT INTO `bbs_pointrule` VALUES ('4', '打卡签到', '10');
INSERT INTO `bbs_pointrule` VALUES ('5', '5', '200');

-- ----------------------------
-- Table structure for bbs_Topic
-- ----------------------------
DROP TABLE IF EXISTS `bbs_Topic`;
CREATE TABLE `bbs_Topic` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '主贴id',
  `fid` int(10) DEFAULT NULL COMMENT '板块id',
  `uid` int(10) NOT NULL COMMENT '用户id',
  `topic` varchar(255) NOT NULL COMMENT '帖子主题',
  `contents` text NOT NULL COMMENT '帖子内容',
  `replycount` int(11) NOT NULL COMMENT '帖子回复次数',
  `clickcount` int(11) NOT NULL COMMENT '帖子点击次数',
  `ftime` datetime NOT NULL COMMENT '发帖时间',
  `ltime` datetime NOT NULL COMMENT '最后点击时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bbs_Topic
-- ----------------------------
INSERT INTO `bbs_Topic` VALUES ('1', '1', '2', '名字1', '内容ffffffffffffffea后加U盾回复hi爱好if和为uhiuahiuhfiahsidhif阿尔发放', '0', '0', '2017-06-21 14:57:23', '2017-06-21 14:57:34');
INSERT INTO `bbs_Topic` VALUES ('5', null, '2', '名字2', '内容1阿尔额啊法尔发二娃发esfaefafawerafaafaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa和哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊 ', '0', '0', '2017-06-21 15:55:38', '2017-06-21 15:55:42');

-- ----------------------------
-- Table structure for bbs_type
-- ----------------------------
DROP TABLE IF EXISTS `bbs_type`;
CREATE TABLE `bbs_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `pid` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `path` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0,',
  `display` tinyint(2) NOT NULL DEFAULT '0',
  `uid` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `path` (`path`,`uid`),
  KEY `uid` (`uid`),
  KEY `uid_2` (`uid`),
  KEY `pid` (`pid`),
  KEY `name` (`name`),
  KEY `number` (`display`)
) ENGINE=InnoDB AUTO_INCREMENT=177 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of bbs_type
-- ----------------------------
INSERT INTO `bbs_type` VALUES ('152', '美女', '0', '0,', '0', null);
INSERT INTO `bbs_type` VALUES ('167', '汽车', '0', '0,', '0', null);
INSERT INTO `bbs_type` VALUES ('172', '绚丽景色', '0', '0,', '0', null);
INSERT INTO `bbs_type` VALUES ('173', '灿烂星空', '0', '0,', '0', null);
INSERT INTO `bbs_type` VALUES ('174', '游戏CG', '0', '0,', '0', null);
INSERT INTO `bbs_type` VALUES ('176', '测试', '0', '0,', '0', null);

-- ----------------------------
-- Table structure for bbs_user_group
-- ----------------------------
DROP TABLE IF EXISTS `bbs_user_group`;
CREATE TABLE `bbs_user_group` (
  `gid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `groupname` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `grouptype` enum('default','system','member') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'member',
  `groupicon` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `points` int(11) NOT NULL DEFAULT '0',
  `allow_add_vote` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `allow_download` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `allow_participate_vote` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `allow_upload` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `allow_visit` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `look_user_ip` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `message_allow_send` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `message_max_send` int(6) NOT NULL DEFAULT '10',
  `remind_open` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `use_inform` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `tag_allow_add` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `allow_read` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `allow_post` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `allow_reply` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `post_check` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `post_max_num` int(11) NOT NULL DEFAULT '10',
  PRIMARY KEY (`gid`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of bbs_user_group
-- ----------------------------
INSERT INTO `bbs_user_group` VALUES ('1', '会员', 'default', './uploads/level/1.gif', '0', '1', '0', '0', '1', '1', '0', '1', '10', '1', '1', '1', '1', '0', '1', '0', '10');
INSERT INTO `bbs_user_group` VALUES ('2', '游客', 'default', './uploads/level/0.gif', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0');
INSERT INTO `bbs_user_group` VALUES ('3', '管理员', 'system', './uploads/level/20.gif', '0', '1', '1', '1', '1', '1', '1', '1', '500', '1', '1', '1', '1', '1', '1', '1', '500');
INSERT INTO `bbs_user_group` VALUES ('4', '版主', 'system', './uploads/level/19.gif', '0', '1', '1', '1', '1', '1', '0', '1', '200', '1', '1', '1', '1', '1', '1', '1', '200');
INSERT INTO `bbs_user_group` VALUES ('5', '禁言会员', 'default', './uploads/level/1.gif', '0', '0', '0', '0', '0', '1', '0', '1', '10', '1', '0', '0', '1', '0', '0', '0', '0');
INSERT INTO `bbs_user_group` VALUES ('6', '英勇青铜', 'member', './uploads/level/3.gif', '100', '0', '0', '0', '0', '1', '0', '1', '10', '1', '0', '0', '1', '1', '0', '0', '10');
INSERT INTO `bbs_user_group` VALUES ('7', '不屈白银', 'member', './uploads/level/4.gif', '200', '0', '0', '1', '0', '1', '0', '1', '20', '1', '0', '0', '1', '0', '1', '1', '10');
INSERT INTO `bbs_user_group` VALUES ('8', '荣耀黄金', 'member', './uploads/level/7.gif', '500', '1', '1', '1', '0', '1', '0', '1', '50', '1', '0', '1', '1', '0', '1', '0', '50');
INSERT INTO `bbs_user_group` VALUES ('9', '华贵铂金', 'member', './uploads/level/10.gif', '1000', '1', '1', '1', '1', '1', '0', '1', '100', '1', '1', '1', '1', '1', '1', '0', '100');
INSERT INTO `bbs_user_group` VALUES ('10', '璀璨钻石', 'member', './uploads/level/13.gif', '5000', '1', '1', '1', '1', '1', '0', '1', '120', '1', '1', '1', '1', '1', '1', '0', '120');
INSERT INTO `bbs_user_group` VALUES ('11', '超凡大师', 'member', './uploads/level/16.gif', '10000', '1', '1', '1', '1', '1', '0', '1', '150', '1', '0', '1', '1', '1', '1', '0', '150');
INSERT INTO `bbs_user_group` VALUES ('12', '最强王者', 'member', './uploads/level/18.gif', '50000', '0', '0', '0', '0', '1', '0', '1', '500', '1', '1', '1', '1', '1', '1', '1', '500');

-- ----------------------------
-- Table structure for bbs_user_info
-- ----------------------------
DROP TABLE IF EXISTS `bbs_user_info`;
CREATE TABLE `bbs_user_info` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `pwd` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(40) COLLATE utf8_unicode_ci DEFAULT '',
  `status` tinyint(3) NOT NULL DEFAULT '1',
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `sex` tinyint(3) DEFAULT '0',
  `grouppower` tinyint(3) DEFAULT '1',
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adminid` tinyint(3) DEFAULT '1',
  `phone` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci DEFAULT '',
  `birthday` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `userdetails` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `credits` int(11) DEFAULT '0',
  `regdate` int(10) DEFAULT NULL,
  `fans` int(10) DEFAULT '0',
  `views` int(10) DEFAULT '0',
  `secret` tinyint(1) DEFAULT '1' COMMENT '私信隐私 1-都可发送 2-仅好友(相互关注)',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `unique1` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of bbs_user_info
-- ----------------------------
INSERT INTO `bbs_user_info` VALUES ('2', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '45454229@qq.com', '1', 'uploads/2017/07/04/20170704595b3df9dc9a8.jpg', '1', '1', '2', '1', '18068842595', '上海市', '2018-06-22', '活色生香..', '39410', '1497943994', '4', '5', '1');
INSERT INTO `bbs_user_info` VALUES ('7', '周天野', '210e2400875b8cf33989857f32515131', '454542297@qq.com', '1', './uploads/2017/06/21/300_201706215949d46ee3652.jpg', '1', '1', '1', '1', '18068842595', '上海市', '2017-06-06', '2311', '20', '1497967970', '0', '1', '1');
INSERT INTO `bbs_user_info` VALUES ('8', 'Long', '0cdef010e0248f6db3c4f74ec520294e', '454542297@qq.com', '1', './uploads/2017/06/21/300_201706215949d46ee3652.jpg', '1', '1', '3', '1', '18068842595', '北京', '2017-06-02', '2112113131', '0', '1498007982', '0', '0', '1');
INSERT INTO `bbs_user_info` VALUES ('9', '张伟康', '41d688211294ef06f7fa2a90e5600cee', '', '1', '', '1', '1', '1', '1', null, '', null, '', '440', '1498007982', '2', '2', '1');
INSERT INTO `bbs_user_info` VALUES ('10', 'lcc', 'e10adc3949ba59abbe56e057f20f883e', '', '1', '', '0', '1', '1', '1', null, '', null, '', '90', '1498816454', '2', '0', '2');
INSERT INTO `bbs_user_info` VALUES ('11', 'u', '7b774effe4a349c6dd82ad4f4f21d34c', '', '1', '', '0', '1', '1', '1', null, '', null, '', '0', '1498816454', '2', '0', '1');
INSERT INTO `bbs_user_info` VALUES ('12', '45', '6c8349cc7260ae62e3b1396831a8398f', '', '1', '', '0', '1', '1', '1', null, '', null, '', '0', '1498816454', '1', '0', '2');
INSERT INTO `bbs_user_info` VALUES ('13', 'ert', '9990775155c3518a0d7917f7780b24aa', '', '1', '', '1', '1', '2', '1', null, '', null, '', '0', '1498816454', '1', '0', '1');
INSERT INTO `bbs_user_info` VALUES ('16', '55', 'accc9105df5383111407fd5b41255e23', '', '1', '', '1', '1', null, '1', null, '', null, '', '0', '1498816454', '0', '0', '1');
INSERT INTO `bbs_user_info` VALUES ('17', 'Long6218344', '210e2400875b8cf33989857f32515131', '454542297@qq.com', '1', './uploads/2017/06/26/201706265950b75abad6a.jpg', '1', '1', '1', '1', '18068842595', '', '2017-06-13', '21321', '0', '1498462042', '0', '0', '1');
INSERT INTO `bbs_user_info` VALUES ('18', 'zty', 'e10adc3949ba59abbe56e057f20f883e', '867699851@qq.com', '1', '', '2', '1', null, '1', null, '山东省 台湾市', '2018-02-08', '人艰不拆', '1230', '1498816454', '1', '2', '1');
INSERT INTO `bbs_user_info` VALUES ('19', 'zty2', 'ad57484016654da87125db86f4227ea3', '', '1', '', null, '1', null, '1', null, '', null, '', '0', '1498816454', '0', '0', '1');
INSERT INTO `bbs_user_info` VALUES ('20', 'zty3', '099b3b060154898840f0ebdfb46ec78f', '', '1', '', null, '1', null, '1', null, '', null, '', '0', '1498816454', '0', '0', '2');
INSERT INTO `bbs_user_info` VALUES ('24', 'admin1', 'e10adc3949ba59abbe56e057f20f883e', '', '1', '', '1', '1', null, '1', null, '', null, '', '0', '1498816454', '0', '0', '1');
INSERT INTO `bbs_user_info` VALUES ('25', 'admin2', 'e10adc3949ba59abbe56e057f20f883e', '', '1', '', '1', '1', null, '1', null, '', null, '', '0', '1498816454', '0', '0', '1');
INSERT INTO `bbs_user_info` VALUES ('26', 'admin3', 'e10adc3949ba59abbe56e057f20f883e', '', '1', '', '1', '1', null, '1', null, '', null, '', '0', '1498816454', '0', '0', '1');
INSERT INTO `bbs_user_info` VALUES ('27', '3214121', '210e2400875b8cf33989857f32515131', '454542297@qq.com', '1', './uploads/2017/06/30/2017063059561fc69f94e.jpg', '1', '1', null, '1', '18068842595', '', '2017-06-13', '哈哈哈哈哈', '0', '1498816454', '1', '0', '1');
INSERT INTO `bbs_user_info` VALUES ('28', 's62', 'e10adc3949ba59abbe56e057f20f883e', '', '1', '', '1', '1', null, '1', null, '', null, '', '30', '1498895760', '1', '0', '1');
INSERT INTO `bbs_user_info` VALUES ('29', '张伟康小号', '41d688211294ef06f7fa2a90e5600cee', '', '1', '', '1', '1', null, '1', null, '', null, '', '210', '1499063420', '1', '2', '1');
INSERT INTO `bbs_user_info` VALUES ('30', 'long1', 'e10adc3949ba59abbe56e057f20f883e', '454542297@qq.com', '1', '', '1', '1', null, '1', '18068842595', '', '2017-07-03', '测试小号1', '250', '1499063804', '0', '0', '1');
INSERT INTO `bbs_user_info` VALUES ('32', 'long2', '571a7ab66895c4d7ad7d733d5976a881', '46586786@qq.com', '1', './uploads/2017/07/04/20170704595b389b7d5d0.jpg', '1', '1', null, '1', '13162180862', '', '2017-07-02', '321', '290', '1499150491', '0', '0', '1');
INSERT INTO `bbs_user_info` VALUES ('33', '张伟小号', 'a046280b841fde31952595f1e26c92eb', '', '1', '', '1', '1', null, '1', null, '', null, '', '30', '1499151292', '0', '0', '1');

-- ----------------------------
-- Table structure for bbs_user_medle
-- ----------------------------
DROP TABLE IF EXISTS `bbs_user_medle`;
CREATE TABLE `bbs_user_medle` (
  `uid` int(11) NOT NULL,
  `medal_id` int(11) NOT NULL,
  `statues` int(11) NOT NULL DEFAULT '1',
  KEY `uid` (`uid`),
  KEY `medalid` (`medal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of bbs_user_medle
-- ----------------------------
INSERT INTO `bbs_user_medle` VALUES ('2', '1', '1');
INSERT INTO `bbs_user_medle` VALUES ('2', '2', '1');
INSERT INTO `bbs_user_medle` VALUES ('2', '3', '1');
INSERT INTO `bbs_user_medle` VALUES ('2', '4', '1');
INSERT INTO `bbs_user_medle` VALUES ('2', '5', '1');
INSERT INTO `bbs_user_medle` VALUES ('18', '1', '1');
INSERT INTO `bbs_user_medle` VALUES ('18', '2', '1');
INSERT INTO `bbs_user_medle` VALUES ('18', '3', '1');
INSERT INTO `bbs_user_medle` VALUES ('18', '4', '1');
INSERT INTO `bbs_user_medle` VALUES ('18', '5', '1');
INSERT INTO `bbs_user_medle` VALUES ('18', '6', '1');
INSERT INTO `bbs_user_medle` VALUES ('18', '7', '1');
INSERT INTO `bbs_user_medle` VALUES ('18', '8', '1');
INSERT INTO `bbs_user_medle` VALUES ('18', '9', '1');
INSERT INTO `bbs_user_medle` VALUES ('18', '10', '1');
INSERT INTO `bbs_user_medle` VALUES ('18', '12', '1');
INSERT INTO `bbs_user_medle` VALUES ('2', '6', '1');
INSERT INTO `bbs_user_medle` VALUES ('32', '2', '1');
INSERT INTO `bbs_user_medle` VALUES ('32', '3', '1');

-- ----------------------------
-- Table structure for forum
-- ----------------------------
DROP TABLE IF EXISTS `forum`;
CREATE TABLE `forum` (
  `fid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(100) NOT NULL DEFAULT '',
  `fstatus` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `boutique` mediumint(12) unsigned NOT NULL DEFAULT '0',
  `posts` mediumint(12) unsigned NOT NULL DEFAULT '0',
  `todayposts` mediumint(12) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`fid`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of forum
-- ----------------------------
INSERT INTO `forum` VALUES ('2', '奥迪', '1', '0', '13', '1');
INSERT INTO `forum` VALUES ('3', '阿尔法罗密欧', '2', '0', '1', '0');
INSERT INTO `forum` VALUES ('4', '阿斯顿马丁', '1', '2', '38', '5');
INSERT INTO `forum` VALUES ('5', '艾康尼克', '1', '0', '4', '0');
INSERT INTO `forum` VALUES ('6', '奔驰', '1', '0', '4', '0');
INSERT INTO `forum` VALUES ('7', '本田', '1', '1', '9', '0');
INSERT INTO `forum` VALUES ('8', '别克', '1', '0', '1', '0');
INSERT INTO `forum` VALUES ('9', '宝马', '1', '0', '3', '2');
INSERT INTO `forum` VALUES ('10', '宝骏', '1', '0', '3', '3');
INSERT INTO `forum` VALUES ('11', '比亚迪', '1', '0', '6', '1');
INSERT INTO `forum` VALUES ('13', '保时捷', '1', '0', '0', '0');
INSERT INTO `forum` VALUES ('15', '巴博斯', '1', '0', '2', '0');
INSERT INTO `forum` VALUES ('16', '布加迪', '1', '0', '0', '0');
INSERT INTO `forum` VALUES ('17', '长安', '1', '0', '0', '0');
INSERT INTO `forum` VALUES ('18', '长城', '1', '0', '4', '0');
INSERT INTO `forum` VALUES ('20', '宾利', '1', '0', '0', '0');
INSERT INTO `forum` VALUES ('21', '标志', '1', '0', '1', '1');
INSERT INTO `forum` VALUES ('22', 'test', '1', '0', '2', '2');
INSERT INTO `forum` VALUES ('23', 'test2', '1', '0', '0', '0');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------

-- ----------------------------
-- Table structure for post
-- ----------------------------
DROP TABLE IF EXISTS `post`;
CREATE TABLE `post` (
  `pid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `fid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `tid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `pauthor` char(100) NOT NULL DEFAULT '',
  `pauthorid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `ptitle` varchar(300) NOT NULL,
  `pdateline` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `pmessage` mediumtext NOT NULL,
  `pauthorip` varchar(15) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of post
-- ----------------------------
INSERT INTO `post` VALUES ('20', '4', '24', 'zty', '18', 'qweqwe', '2017-06-28 22:37:38', 'qweqwasdxsad', '::1');
INSERT INTO `post` VALUES ('22', '7', '26', 'zty', '18', 'dfef', '2017-06-28 22:38:39', 'ewrdwerfrwfwear', '::1');
INSERT INTO `post` VALUES ('23', '4', '27', 'zty', '7', 'qwe', '2017-06-29 11:43:41', 'sdfsdf', '::1');
INSERT INTO `post` VALUES ('24', '7', '28', 'zty', '7', 'yuthth', '2017-06-29 15:41:18', 'tyhbdrtfbvrtvf', '::1');
INSERT INTO `post` VALUES ('25', '7', '29', 'zty', '7', 'hrtgt', '2017-06-29 15:48:30', 'rtheagesfgefg', '::1');
INSERT INTO `post` VALUES ('32', '4', '36', 'admin', '2', '222222222', '2017-06-29 20:53:31', 'fdgdsfgsdfgsedfgv', '127.0.0.1');
INSERT INTO `post` VALUES ('36', '9', '40', 'zty', '18', 'qwec', '2017-06-30 17:59:45', 'qw cxs', '::1');
INSERT INTO `post` VALUES ('37', '4', '41', 'admin', '2', '321', '2017-06-30 21:10:49', '实打实', '127.0.0.1');
INSERT INTO `post` VALUES ('40', '4', '44', 'admin', '2', '234', '2017-07-01 22:19:49', '433reer', '::1');
INSERT INTO `post` VALUES ('41', '4', '45', 'admin', '2', '34ref', '2017-07-01 22:19:57', '45erferf', '::1');
INSERT INTO `post` VALUES ('42', '4', '46', 'admin', '2', 'retg', '2017-07-01 22:20:03', 'referfd', '::1');
INSERT INTO `post` VALUES ('43', '4', '47', 'admin', '2', '二', '2017-07-02 01:16:17', 'refdersfd', '::1');
INSERT INTO `post` VALUES ('44', '3', '48', 'admin', '2', 'ytrg', '2017-07-03 09:50:33', 'htrgtyegrt', '::1');
INSERT INTO `post` VALUES ('45', '6', '49', 'admin', '2', 'rt', '2017-07-03 10:41:48', 'rtetrtg', '::1');
INSERT INTO `post` VALUES ('46', '5', '50', 'admin', '2', 'ret', '2017-07-03 12:18:02', 'trsydgre', '::1');
INSERT INTO `post` VALUES ('47', '8', '51', 'admin', '2', 'tyd', '2017-07-03 14:23:57', 'tydhgf', '::1');
INSERT INTO `post` VALUES ('48', '4', '52', 'admin', '2', '今天  我', '2017-07-03 14:24:59', '今天买了一辆车 不知道是不是真的', '211.161.196.173');
INSERT INTO `post` VALUES ('49', '2', '53', 'admin', '2', 'iu', '2017-07-03 14:43:25', 'yufjhg', '::1');
INSERT INTO `post` VALUES ('50', '2', '54', 'admin', '2', 'erf', '2017-07-03 16:19:07', 'erfrwtegfvwrtegf', '::1');
INSERT INTO `post` VALUES ('51', '2', '55', 'admin', '2', 'retfewr', '2017-07-03 16:19:14', 'trwegfwerfd', '::1');
INSERT INTO `post` VALUES ('52', '4', '56', 'admin', '2', '第九个', '2017-07-03 18:47:58', '哈哈哈', '127.0.0.1');
INSERT INTO `post` VALUES ('53', '4', '57', 'admin', '2', '第十个', '2017-07-03 18:48:44', '快了', '127.0.0.1');
INSERT INTO `post` VALUES ('54', '4', '58', 'long1', '30', '21', '2017-07-03 19:10:42', '21', '127.0.0.1');
INSERT INTO `post` VALUES ('55', '4', '59', 'long1', '30', '阿达', '2017-07-03 19:10:52', 'sad', '127.0.0.1');
INSERT INTO `post` VALUES ('56', '4', '60', 'long1', '30', '第三个测试', '2017-07-03 19:23:45', '快成功了', '127.0.0.1');
INSERT INTO `post` VALUES ('57', '4', '61', 'long1', '30', '第一个', '2017-07-03 19:34:22', '打按', '127.0.0.1');
INSERT INTO `post` VALUES ('58', '18', '62', 'admin', '2', 'yujh', '2017-07-03 22:03:03', 'yujgh', '::1');
INSERT INTO `post` VALUES ('59', '18', '63', 'admin', '2', 'tryhg', '2017-07-03 22:05:26', 'rtsgrstgfd', '::1');
INSERT INTO `post` VALUES ('60', '15', '64', 'admin', '2', 'tyh', '2017-07-03 22:07:07', 'terhgfregfd', '::1');
INSERT INTO `post` VALUES ('61', '15', '65', 'admin', '2', 'ther', '2017-07-03 22:07:22', 'rtgregfes', '::1');
INSERT INTO `post` VALUES ('62', '11', '66', 'admin', '2', 'asdasd', '2017-07-03 22:34:06', 'qwe周天野周天野asdqdas习近平sadasd周asd', '::1');
INSERT INTO `post` VALUES ('63', '11', '67', 'admin', '2', 'asd', '2017-07-03 22:40:26', 'qwe周天野周天野asdqdas习近平sadasd周asd', '::1');
INSERT INTO `post` VALUES ('64', '11', '68', 'admin', '2', 'qefrwef', '2017-07-03 22:41:23', 'qwe************************************asdqdas******************sadasd******asd', '::1');
INSERT INTO `post` VALUES ('65', '4', '69', '张伟康小号', '29', '张伟康12', '2017-07-03 22:40:34', '12341551', '127.0.0.1');
INSERT INTO `post` VALUES ('66', '4', '70', '张伟康小号', '29', '张vs龙', '2017-07-03 22:40:49', '2131', '127.0.0.1');
INSERT INTO `post` VALUES ('67', '11', '71', 'admin', '2', 'yth', '2017-07-03 23:26:39', 'trgfytr', '211.161.196.173');
INSERT INTO `post` VALUES ('68', '11', '72', 'admin', '2', 'yu', '2017-07-03 23:33:58', 'fyutuf', '::1');
INSERT INTO `post` VALUES ('69', '2', '73', 'admin', '2', 'qwed', '2017-07-04 00:01:48', 'sad', '::1');
INSERT INTO `post` VALUES ('70', '2', '76', 'admin', '2', 'sd', '2017-07-04 00:31:58', 'sdf', '211.161.196.173');
INSERT INTO `post` VALUES ('71', '2', '78', 'admin', '2', 'ew', '2017-07-04 00:33:05', 'ewfds', '211.161.196.173');
INSERT INTO `post` VALUES ('72', '2', '79', 'admin', '2', 'we', '2017-07-04 00:33:21', 'sdf是的', '211.161.196.173');
INSERT INTO `post` VALUES ('73', '7', '81', 'admin', '2', 'qwedqwe', '2017-07-04 09:07:39', 'asdwq', '::1');
INSERT INTO `post` VALUES ('74', '6', '84', 'admin', '2', '4ter', '2017-07-04 09:27:56', 'erfer', '::1');
INSERT INTO `post` VALUES ('75', '5', '89', 'admin', '2', '体育', '2017-07-04 09:42:05', '太弱', '::1');
INSERT INTO `post` VALUES ('76', '7', '90', 'admin', '2', '二头', '2017-07-04 09:43:03', '而特发', '::1');
INSERT INTO `post` VALUES ('77', '5', '91', 'admin', '2', '人头', '2017-07-04 09:45:23', '太弱', '::1');
INSERT INTO `post` VALUES ('78', '5', '92', 'admin', '2', '太弱54', '2017-07-04 09:45:50', '热特特', '::1');
INSERT INTO `post` VALUES ('79', '10', '93', 'admin', '2', 'rtge', '2017-07-04 10:56:12', 'trgefre', '211.161.196.173');
INSERT INTO `post` VALUES ('80', '10', '95', 'admin', '2', '让他', '2017-07-04 10:57:59', '恶突然', '211.161.196.173');
INSERT INTO `post` VALUES ('81', '22', '96', 'admin', '2', '1', '2017-07-04 11:10:59', '1', '211.161.196.173');
INSERT INTO `post` VALUES ('82', '22', '97', 'admin', '2', '2', '2017-07-04 11:18:15', 'tr', '211.161.196.173');
INSERT INTO `post` VALUES ('83', '21', '98', 'admin', '2', 'ruyt', '2017-07-04 11:18:47', 'tyr', '211.161.196.173');
INSERT INTO `post` VALUES ('84', '9', '100', 'admin', '2', 'ther', '2017-07-04 13:49:35', 'tdeydryfh', '211.161.196.173');
INSERT INTO `post` VALUES ('85', '4', '101', 'long1', '30', '7.4', '2017-07-04 13:50:08', '', '211.161.196.173');
INSERT INTO `post` VALUES ('86', '4', '103', 'long1', '30', 'da a a', '2017-07-04 13:51:05', 'a ad sa a', '211.161.196.173');
INSERT INTO `post` VALUES ('87', '4', '104', 'long1', '30', 'w我无法大卫杜夫', '2017-07-04 13:55:14', '沃尔访问的舒服', '211.161.196.173');
INSERT INTO `post` VALUES ('88', '11', '105', 'admin', '2', '的舒服参数', '2017-07-04 13:56:04', '热而过', '211.161.196.173');
INSERT INTO `post` VALUES ('89', '2', '106', 'admin', '2', 'sdfsd', '2017-07-04 14:26:44', 'wedswdsadas', '211.161.196.173');
INSERT INTO `post` VALUES ('90', '4', '107', 'long2', '32', 'hjhjhj', '2017-07-04 14:45:49', 'hgghgh', '211.161.196.173');
INSERT INTO `post` VALUES ('91', '4', '108', 'long2', '32', 'ceshi', '2017-07-04 14:47:38', '123', '211.161.196.173');

-- ----------------------------
-- Table structure for reply
-- ----------------------------
DROP TABLE IF EXISTS `reply`;
CREATE TABLE `reply` (
  `pid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `fid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `tid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `rid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `rauthor` char(100) NOT NULL DEFAULT '',
  `rauthorid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `rdateline` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `rmessage` mediumtext NOT NULL,
  `rauthorip` varchar(15) NOT NULL,
  `rtype` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `target` mediumint(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB AUTO_INCREMENT=119 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of reply
-- ----------------------------
INSERT INTO `reply` VALUES ('20', '4', '24', '15', 'zty', '18', '2017-06-28 22:37:58', 'qwesdwesad', '::1', '0', '0');
INSERT INTO `reply` VALUES ('20', '4', '24', '16', 'zty', '18', '2017-06-28 22:38:07', 'qwesdwesad4terfersdferafgderf', '::1', '0', '0');
INSERT INTO `reply` VALUES ('20', '4', '24', '17', 'zty', '18', '2017-06-29 14:53:19', 'rtgrg', '::1', '0', '0');
INSERT INTO `reply` VALUES ('20', '4', '24', '18', 'zty', '18', '2017-06-29 14:53:24', 'rtgrgtrhgrdtgr', '::1', '0', '0');
INSERT INTO `reply` VALUES ('20', '4', '24', '19', 'zty', '18', '2017-06-29 14:55:23', 'rtgrgtrhgrdtgr我发的行为违法而非', '::1', '0', '0');
INSERT INTO `reply` VALUES ('20', '4', '24', '22', 'zty', '18', '2017-06-29 14:58:27', 'rtgrgtrhgrdtgr我发的行为违法而非thrtg太热非人防', '::1', '0', '0');
INSERT INTO `reply` VALUES ('20', '4', '24', '23', 'zty', '18', '2017-06-29 14:59:37', 'rtgrgtrhgrdtgr我发的行为违法而非thrtg太热非人防rg', '::1', '0', '0');
INSERT INTO `reply` VALUES ('20', '4', '24', '24', 'zty', '18', '2017-06-29 15:00:07', 'rtgrgtrhgrdtgr我发的行为违法而非thrtg太热非人防rgtgt', '::1', '0', '0');
INSERT INTO `reply` VALUES ('20', '4', '24', '25', 'zty', '18', '2017-06-29 15:03:20', 'rtgrgtrhgrdtgr我发的行为违法而非thrtg太热非人防rgtgttgrfthyg天涯海阁', '::1', '0', '0');
INSERT INTO `reply` VALUES ('20', '4', '24', '26', 'zty', '18', '2017-06-29 15:04:11', 'rtgrgtrhgrdtgr我发的行为违法而非thrtg太热非人防rgtgttgrfthyg天rgr涯海阁', '::1', '0', '0');
INSERT INTO `reply` VALUES ('20', '4', '24', '27', 'zty', '18', '2017-06-29 15:04:22', 'fewwe', '::1', '0', '0');
INSERT INTO `reply` VALUES ('20', '4', '24', '28', 'zty', '18', '2017-06-29 15:05:13', 'fewwey', '::1', '0', '0');
INSERT INTO `reply` VALUES ('20', '4', '24', '29', 'zty', '18', '2017-06-29 15:06:19', 'fewweyrtgesrge', '::1', '0', '0');
INSERT INTO `reply` VALUES ('20', '4', '24', '30', 'zty', '18', '2017-06-29 15:06:30', 'rfsedfsaed', '::1', '0', '0');
INSERT INTO `reply` VALUES ('20', '4', '24', '31', 'zty', '18', '2017-06-29 15:06:52', 'wedwd', '::1', '0', '0');
INSERT INTO `reply` VALUES ('20', '4', '24', '32', 'zty', '18', '2017-06-29 15:07:56', '111111111111111111', '::1', '0', '0');
INSERT INTO `reply` VALUES ('21', '4', '25', '33', 'zty', '18', '2017-06-29 15:09:01', 'ujh', '::1', '0', '0');
INSERT INTO `reply` VALUES ('20', '4', '24', '35', 'zty', '7', '2017-06-29 16:37:04', 'yui', '::1', '0', '0');
INSERT INTO `reply` VALUES ('20', '4', '24', '36', 'zty', '7', '2017-06-29 16:37:11', 'yui', '::1', '0', '0');
INSERT INTO `reply` VALUES ('20', '4', '24', '37', 'zty', '7', '2017-06-29 16:39:09', '5yetrge', '::1', '0', '0');
INSERT INTO `reply` VALUES ('20', '4', '24', '38', 'zty', '7', '2017-06-29 16:43:43', 'trgreg', '::1', '0', '0');
INSERT INTO `reply` VALUES ('20', '4', '24', '39', 'zty', '7', '2017-06-29 16:43:52', 'trgreggretreg', '::1', '0', '0');
INSERT INTO `reply` VALUES ('20', '4', '24', '40', 'zty', '7', '2017-06-29 16:43:58', 'trbfgrdfg', '::1', '0', '0');
INSERT INTO `reply` VALUES ('20', '4', '24', '41', 'zty', '7', '2017-06-29 16:44:59', 'j5yehrt', '::1', '0', '0');
INSERT INTO `reply` VALUES ('20', '4', '24', '42', 'zty', '7', '2017-06-29 16:45:19', 'thertgr', '::1', '0', '0');
INSERT INTO `reply` VALUES ('20', '4', '24', '43', 'zty', '7', '2017-06-29 16:45:33', 'thertgr', '::1', '0', '0');
INSERT INTO `reply` VALUES ('20', '4', '24', '44', 'zty', '7', '2017-06-29 16:46:19', 'egrwerf', '::1', '0', '0');
INSERT INTO `reply` VALUES ('20', '4', '24', '45', 'zty', '7', '2017-06-29 16:47:35', 'erter', '::1', '0', '0');
INSERT INTO `reply` VALUES ('20', '4', '24', '46', 'zty', '7', '2017-06-29 16:47:54', 'ertertrererf', '::1', '0', '0');
INSERT INTO `reply` VALUES ('20', '4', '24', '47', 'zty', '7', '2017-06-29 16:48:08', 'grgrt', '::1', '0', '0');
INSERT INTO `reply` VALUES ('20', '4', '24', '48', 'zty', '7', '2017-06-29 16:49:30', 'tregfewrf', '::1', '0', '0');
INSERT INTO `reply` VALUES ('20', '4', '24', '49', 'zty', '7', '2017-06-29 16:50:06', 'g4werfwerfd', '::1', '0', '0');
INSERT INTO `reply` VALUES ('20', '4', '24', '50', 'zty', '7', '2017-06-29 16:50:42', 'rtgretger', '::1', '0', '0');
INSERT INTO `reply` VALUES ('20', '4', '24', '51', 'zty', '7', '2017-06-29 16:52:21', '4ytwertf', '::1', '0', '0');
INSERT INTO `reply` VALUES ('20', '4', '24', '52', 'zty', '7', '2017-06-29 16:53:44', '4ytwertf5tf', '::1', '0', '0');
INSERT INTO `reply` VALUES ('20', '4', '24', '53', 'zty', '7', '2017-06-29 16:53:49', '43rtr', '::1', '0', '0');
INSERT INTO `reply` VALUES ('20', '4', '24', '54', 'zty', '7', '2017-06-29 16:54:50', 'ukiu', '::1', '0', '0');
INSERT INTO `reply` VALUES ('23', '4', '27', '55', 'zty', '7', '2017-06-29 16:58:53', 'eyhtyh', '::1', '0', '0');
INSERT INTO `reply` VALUES ('20', '4', '24', '58', 'zty', '18', '2017-06-30 15:04:20', '666', '::1', '0', '0');
INSERT INTO `reply` VALUES ('36', '9', '40', '59', 'zty', '18', '2017-06-30 19:01:58', 'rtesrgfer', '::1', '0', '0');
INSERT INTO `reply` VALUES ('22', '7', '26', '60', 'zty', '18', '2017-06-30 19:03:29', 'qwdsqwdasqwasdqwdsax', '::1', '0', '0');
INSERT INTO `reply` VALUES ('22', '7', '26', '61', 'admin', '2', '2017-06-30 19:11:27', 'tyre他', '127.0.0.1', '0', '0');
INSERT INTO `reply` VALUES ('22', '7', '26', '62', 'admin', '2', '2017-06-30 19:11:43', 'wwwwwwwwwwwwwww', '127.0.0.1', '0', '0');
INSERT INTO `reply` VALUES ('20', '4', '24', '63', 'admin', '2', '2017-06-30 23:17:27', '32131', '127.0.0.1', '0', '0');
INSERT INTO `reply` VALUES ('20', '4', '24', '64', 'admin', '2', '2017-06-30 23:17:48', '就哈哈哈哈哈', '127.0.0.1', '0', '0');
INSERT INTO `reply` VALUES ('20', '4', '24', '65', 'admin', '2', '2017-06-30 23:27:55', '阿打算撒打啊撒打死谁ad', '127.0.0.1', '0', '0');
INSERT INTO `reply` VALUES ('20', '4', '24', '66', 'admin', '2', '2017-06-30 23:28:38', '3211', '127.0.0.1', '0', '0');
INSERT INTO `reply` VALUES ('20', '4', '24', '67', 'admin', '2', '2017-06-30 23:28:48', '3211', '127.0.0.1', '0', '0');
INSERT INTO `reply` VALUES ('20', '4', '24', '68', 'admin', '2', '2017-06-30 23:29:04', '3211', '127.0.0.1', '0', '0');
INSERT INTO `reply` VALUES ('20', '4', '24', '69', 'admin', '2', '2017-06-30 23:30:01', '3211321阿达sad', '127.0.0.1', '0', '0');
INSERT INTO `reply` VALUES ('20', '4', '24', '70', 'admin', '2', '2017-06-30 23:30:16', '3211321阿达sad', '127.0.0.1', '0', '0');
INSERT INTO `reply` VALUES ('20', '4', '24', '71', 'admin', '2', '2017-06-30 23:43:03', '3211321阿达sad', '127.0.0.1', '0', '0');
INSERT INTO `reply` VALUES ('20', '4', '24', '72', 'admin', '2', '2017-06-30 23:43:10', '3213啊实打实打的啊', '127.0.0.1', '0', '0');
INSERT INTO `reply` VALUES ('20', '4', '24', '73', 'admin', '2', '2017-06-30 23:44:33', '三大as的在查询', '127.0.0.1', '0', '0');
INSERT INTO `reply` VALUES ('20', '4', '24', '74', 'admin', '2', '2017-07-01 00:01:42', '三大打的as大神as啊', '127.0.0.1', '0', '0');
INSERT INTO `reply` VALUES ('23', '4', '27', '75', 'admin', '2', '2017-07-01 22:50:35', '而发的所谓', '::1', '0', '0');
INSERT INTO `reply` VALUES ('45', '6', '49', '77', 'admin', '2', '2017-07-03 10:42:17', 'rtegerf', '::1', '0', '0');
INSERT INTO `reply` VALUES ('45', '6', '49', '78', 'admin', '2', '2017-07-03 10:42:26', 'rtfesd', '::1', '0', '0');
INSERT INTO `reply` VALUES ('45', '6', '49', '79', 'admin', '2', '2017-07-03 11:38:51', 'trefd', '::1', '1', '0');
INSERT INTO `reply` VALUES ('45', '6', '49', '80', 'admin', '2', '2017-07-03 11:47:15', 'trgre', '::1', '1', '78');
INSERT INTO `reply` VALUES ('45', '6', '49', '81', 'admin', '2', '2017-07-03 12:03:29', 'rtgerfd', '::1', '1', '78');
INSERT INTO `reply` VALUES ('46', '5', '50', '82', 'admin', '2', '2017-07-03 12:26:45', 'tehgrt', '::1', '0', '0');
INSERT INTO `reply` VALUES ('46', '5', '50', '83', 'admin', '2', '2017-07-03 12:26:52', 'etrysetdfg', '::1', '0', '0');
INSERT INTO `reply` VALUES ('46', '5', '50', '84', 'admin', '2', '2017-07-03 12:26:59', 'tyrstdgf', '::1', '1', '83');
INSERT INTO `reply` VALUES ('48', '4', '52', '86', 'admin', '2', '2017-07-03 14:25:11', '哇 大大你好帅哦', '211.161.196.173', '0', '0');
INSERT INTO `reply` VALUES ('48', '4', '52', '87', 'admin', '2', '2017-07-03 14:25:26', '哇 大大你好坚挺哦', '211.161.196.173', '0', '0');
INSERT INTO `reply` VALUES ('49', '2', '53', '88', 'admin', '2', '2017-07-03 14:58:15', 'trgfd', '::1', '0', '0');
INSERT INTO `reply` VALUES ('51', '2', '55', '89', 'admin', '2', '2017-07-03 19:54:09', 'drthfg', '::1', '0', '0');
INSERT INTO `reply` VALUES ('23', '4', '27', '90', '张伟康', '9', '2017-07-03 20:02:54', '66666', '211.161.196.173', '0', '0');
INSERT INTO `reply` VALUES ('61', '15', '65', '91', 'admin', '2', '2017-07-03 22:07:33', 'tregret', '::1', '0', '0');
INSERT INTO `reply` VALUES ('61', '15', '65', '92', 'admin', '2', '2017-07-03 22:07:42', 'trgertg', '::1', '1', '91');
INSERT INTO `reply` VALUES ('60', '15', '64', '93', 'admin', '2', '2017-07-03 22:09:46', 'tyh', '::1', '0', '0');
INSERT INTO `reply` VALUES ('60', '15', '64', '95', 'admin', '2', '2017-07-03 22:10:02', 'ythgrt', '::1', '1', '93');
INSERT INTO `reply` VALUES ('60', '15', '64', '96', 'admin', '2', '2017-07-03 22:10:12', 'tryhg', '::1', '0', '0');
INSERT INTO `reply` VALUES ('60', '15', '64', '97', 'admin', '2', '2017-07-03 22:10:23', 'trhy', '::1', '1', '96');
INSERT INTO `reply` VALUES ('23', '4', '27', '98', 'admin', '2', '2017-07-03 22:32:48', '7月3日最后一次测试', '127.0.0.1', '0', '0');
INSERT INTO `reply` VALUES ('67', '11', '71', '99', 'admin', '2', '2017-07-03 23:26:47', 'ythg', '211.161.196.173', '0', '0');
INSERT INTO `reply` VALUES ('67', '11', '71', '100', 'admin', '2', '2017-07-03 23:26:52', 'uythgythg', '211.161.196.173', '0', '0');
INSERT INTO `reply` VALUES ('67', '11', '71', '101', 'admin', '2', '2017-07-03 23:27:00', 'yuhytryhgtyg', '211.161.196.173', '1', '99');
INSERT INTO `reply` VALUES ('67', '11', '71', '102', 'admin', '2', '2017-07-03 23:27:05', 'yhtgrtyrg', '211.161.196.173', '1', '99');
INSERT INTO `reply` VALUES ('80', '10', '95', '103', 'admin', '2', '2017-07-04 10:58:52', '56号', '211.161.196.173', '0', '0');
INSERT INTO `reply` VALUES ('80', '10', '95', '104', 'admin', '2', '2017-07-04 10:58:58', '45他', '211.161.196.173', '0', '0');
INSERT INTO `reply` VALUES ('80', '10', '95', '105', 'admin', '2', '2017-07-04 10:59:03', '太热', '211.161.196.173', '1', '103');
INSERT INTO `reply` VALUES ('80', '10', '95', '106', 'admin', '2', '2017-07-04 10:59:10', '544他', '211.161.196.173', '1', '103');
INSERT INTO `reply` VALUES ('23', '4', '27', '107', 'admin', '2', '2017-07-04 11:31:27', 'sadas da打 大神', '211.161.196.173', '0', '0');
INSERT INTO `reply` VALUES ('23', '4', '27', '108', 'admin', '2', '2017-07-04 11:44:35', '哈哈啊哈哈哈哈哈哈哈', '211.161.196.173', '0', '0');
INSERT INTO `reply` VALUES ('23', '4', '27', '109', 'long1', '30', '2017-07-04 13:15:39', 'hahaha DS哇', '211.161.196.173', '0', '0');
INSERT INTO `reply` VALUES ('23', '4', '27', '110', 'long1', '30', '2017-07-04 13:37:24', '阿萨德啊', '211.161.196.173', '0', '0');
INSERT INTO `reply` VALUES ('89', '2', '106', '111', 'admin', '2', '2017-07-04 14:27:44', 'adsdassadads', '211.161.196.173', '0', '0');
INSERT INTO `reply` VALUES ('89', '2', '106', '112', 'admin', '2', '2017-07-04 14:27:59', 'qwedssda', '211.161.196.173', '1', '111');
INSERT INTO `reply` VALUES ('89', '2', '106', '113', 'admin', '2', '2017-07-04 14:28:08', 'qwedasd', '211.161.196.173', '0', '0');
INSERT INTO `reply` VALUES ('86', '4', '103', '114', 'long2', '32', '2017-07-04 14:43:05', 'hhfgg', '211.161.196.173', '0', '0');
INSERT INTO `reply` VALUES ('85', '4', '101', '115', 'long2', '32', '2017-07-04 14:44:35', 'hghfh', '211.161.196.173', '0', '0');
INSERT INTO `reply` VALUES ('85', '4', '101', '116', 'long2', '32', '2017-07-04 14:44:42', 'hggfhgh', '211.161.196.173', '0', '0');
INSERT INTO `reply` VALUES ('82', '22', '97', '117', 'long2', '32', '2017-07-04 14:45:07', 'jghghg', '211.161.196.173', '0', '0');
INSERT INTO `reply` VALUES ('91', '4', '108', '118', 'long2', '32', '2017-07-04 14:47:48', 'gfg', '211.161.196.173', '0', '0');

-- ----------------------------
-- Table structure for thread
-- ----------------------------
DROP TABLE IF EXISTS `thread`;
CREATE TABLE `thread` (
  `tid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `fid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `tauthor` char(100) NOT NULL DEFAULT '',
  `tauthorid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `title` varchar(300) NOT NULL DEFAULT '',
  `tdateline` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `replies` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tstatus` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `best` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `top` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `renumber` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `clicknumber` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `black` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `affix` varchar(200) NOT NULL DEFAULT 'null',
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of thread
-- ----------------------------
INSERT INTO `thread` VALUES ('24', '4', 'zty', '18', 'qweqwe', '2017-06-28 22:37:38', '2017-07-01 00:01:42', '0', '0', '0', '49', '541', '0', 'null');
INSERT INTO `thread` VALUES ('26', '7', 'zty', '18', 'dfef', '2017-06-28 22:38:39', '2017-06-30 19:11:43', '0', '0', '0', '3', '59', '0', 'null');
INSERT INTO `thread` VALUES ('27', '4', 'zty', '7', 'qwe', '2017-06-29 11:43:41', '2017-07-04 13:37:24', '1', '0', '1', '8', '191', '1', 'null');
INSERT INTO `thread` VALUES ('28', '7', 'zty', '7', 'yuthth', '2017-06-29 15:41:18', '2017-06-29 15:41:18', '1', '1', '0', '0', '10', '0', 'null');
INSERT INTO `thread` VALUES ('29', '7', 'zty', '7', 'hrtgt', '2017-06-29 15:48:30', '2017-06-29 15:48:30', '0', '0', '0', '0', '9', '0', 'null');
INSERT INTO `thread` VALUES ('36', '4', 'admin', '2', '222222222', '2017-06-29 20:53:31', '2017-06-29 20:53:31', '0', '0', '0', '0', '14', '0', 'null');
INSERT INTO `thread` VALUES ('40', '9', 'zty', '18', 'qwec', '2017-06-30 17:59:45', '2017-06-30 19:01:58', '0', '0', '0', '1', '26', '0', 'null');
INSERT INTO `thread` VALUES ('41', '4', 'admin', '2', '321', '2017-06-30 21:10:49', '2017-06-30 21:10:49', '1', '0', '0', '0', '7', '0', 'null');
INSERT INTO `thread` VALUES ('44', '4', 'admin', '2', '234', '2017-07-01 22:19:49', '2017-07-01 22:19:49', '0', '0', '0', '0', '0', '0', 'null');
INSERT INTO `thread` VALUES ('45', '4', 'admin', '2', '34ref', '2017-07-01 22:19:57', '2017-07-01 22:19:57', '0', '0', '0', '0', '4', '0', 'null');
INSERT INTO `thread` VALUES ('46', '4', 'admin', '2', 'retg', '2017-07-01 22:20:03', '2017-07-01 22:20:03', '1', '0', '0', '0', '1', '0', 'null');
INSERT INTO `thread` VALUES ('47', '4', 'admin', '2', '二', '2017-07-02 01:16:17', '2017-07-02 01:16:17', '0', '0', '0', '0', '0', '0', 'null');
INSERT INTO `thread` VALUES ('48', '3', 'admin', '2', 'ytrg', '2017-07-03 09:50:33', '2017-07-03 09:50:33', '0', '0', '0', '0', '1', '0', 'null');
INSERT INTO `thread` VALUES ('49', '6', 'admin', '2', 'rt', '2017-07-03 10:41:48', '2017-07-03 12:03:29', '0', '0', '0', '5', '110', '0', 'null');
INSERT INTO `thread` VALUES ('50', '5', 'admin', '2', 'ret', '2017-07-03 12:18:02', '2017-07-03 12:27:17', '0', '0', '0', '4', '25', '0', 'null');
INSERT INTO `thread` VALUES ('51', '8', 'admin', '2', 'tyd', '2017-07-03 14:23:57', '2017-07-03 14:23:57', '0', '0', '0', '0', '2', '0', 'null');
INSERT INTO `thread` VALUES ('52', '4', 'admin', '2', '今天  我', '2017-07-03 14:24:59', '2017-07-03 14:25:26', '0', '0', '0', '2', '5', '0', 'null');
INSERT INTO `thread` VALUES ('53', '2', 'admin', '2', 'iu', '2017-07-03 14:43:25', '2017-07-03 14:58:15', '0', '0', '0', '1', '30', '0', 'null');
INSERT INTO `thread` VALUES ('54', '2', 'admin', '2', 'erf', '2017-07-03 16:19:07', '2017-07-03 16:19:07', '0', '0', '0', '0', '2', '0', 'null');
INSERT INTO `thread` VALUES ('55', '2', 'admin', '2', 'retfewr', '2017-07-03 16:19:14', '2017-07-03 19:54:09', '0', '0', '0', '1', '16', '0', 'null');
INSERT INTO `thread` VALUES ('56', '4', 'admin', '2', '第九个', '2017-07-03 18:47:58', '2017-07-03 18:47:58', '0', '0', '0', '0', '0', '0', 'null');
INSERT INTO `thread` VALUES ('57', '4', 'admin', '2', '第十个', '2017-07-03 18:48:44', '2017-07-03 18:48:44', '0', '0', '0', '0', '0', '0', 'null');
INSERT INTO `thread` VALUES ('58', '4', 'long1', '30', '21', '2017-07-03 19:10:42', '2017-07-03 19:10:42', '0', '0', '0', '0', '0', '0', 'null');
INSERT INTO `thread` VALUES ('59', '4', 'long1', '30', '阿达', '2017-07-03 19:10:52', '2017-07-03 19:10:52', '0', '0', '0', '0', '0', '0', 'null');
INSERT INTO `thread` VALUES ('60', '4', 'long1', '30', '第三个测试', '2017-07-03 19:23:45', '2017-07-03 19:23:45', '0', '0', '0', '0', '0', '0', 'null');
INSERT INTO `thread` VALUES ('61', '4', 'long1', '30', '第一个', '2017-07-03 19:34:22', '2017-07-03 19:34:22', '0', '0', '0', '0', '0', '0', 'null');
INSERT INTO `thread` VALUES ('62', '18', 'admin', '2', 'yujh', '2017-07-03 22:03:03', '2017-07-03 22:03:03', '0', '0', '0', '0', '4', '0', './ztyuploads//2017/07/03/20170703595a4e983161a.jpg');
INSERT INTO `thread` VALUES ('63', '18', 'admin', '2', 'tryhg', '2017-07-03 22:05:26', '2017-07-03 22:05:26', '0', '0', '0', '0', '2', '0', 'null');
INSERT INTO `thread` VALUES ('64', '15', 'admin', '2', 'tyh', '2017-07-03 22:07:07', '2017-07-03 22:10:23', '0', '0', '0', '4', '20', '0', 'null');
INSERT INTO `thread` VALUES ('65', '15', 'admin', '2', 'ther', '2017-07-03 22:07:22', '2017-07-03 22:07:42', '0', '0', '0', '2', '6', '0', './ztyuploads//2017/07/03/20170703595a4f9a3083d.jpg');
INSERT INTO `thread` VALUES ('66', '11', 'admin', '2', 'asdasd', '2017-07-03 22:34:06', '2017-07-03 22:34:06', '0', '0', '0', '0', '2', '0', 'null');
INSERT INTO `thread` VALUES ('67', '11', 'admin', '2', 'asd', '2017-07-03 22:40:26', '2017-07-03 22:40:26', '0', '0', '0', '0', '1', '0', 'null');
INSERT INTO `thread` VALUES ('68', '11', 'admin', '2', 'qefrwef', '2017-07-03 22:41:23', '2017-07-03 22:41:23', '0', '0', '0', '0', '1', '0', 'null');
INSERT INTO `thread` VALUES ('71', '11', 'admin', '2', 'yth', '2017-07-03 23:26:39', '2017-07-03 23:27:05', '0', '0', '0', '4', '34', '1', 'null');
INSERT INTO `thread` VALUES ('72', '11', 'admin', '2', 'yu', '2017-07-03 23:33:58', '2017-07-03 23:33:58', '0', '0', '0', '0', '4', '0', './ztyuploads//2017/07/03/20170703595a63e6c409d.jpg');
INSERT INTO `thread` VALUES ('73', '2', 'admin', '2', 'qwed', '2017-07-04 00:01:48', '2017-07-04 00:01:48', '0', '0', '0', '0', '2', '0', './ztyuploads//2017/07/04/20170704595a6a6ccb958.jpg');
INSERT INTO `thread` VALUES ('76', '2', 'admin', '2', 'sd', '2017-07-04 00:31:58', '2017-07-04 00:31:58', '0', '0', '0', '0', '6', '0', './ztyuploads/2017/07/04/20170704595a717e75954.jpg');
INSERT INTO `thread` VALUES ('77', '2', 'admin', '2', 'asd', '2017-07-04 00:32:49', '2017-07-04 00:32:49', '0', '0', '0', '0', '0', '0', './ztyuploads/2017/07/04/20170704595a71b182ffa.jpg');
INSERT INTO `thread` VALUES ('78', '2', 'admin', '2', 'ew', '2017-07-04 00:33:05', '2017-07-04 00:33:05', '0', '0', '0', '0', '2', '0', './ztyuploads/2017/07/04/20170704595a71c14c650.jpg');
INSERT INTO `thread` VALUES ('79', '2', 'admin', '2', 'we', '2017-07-04 00:33:21', '2017-07-04 00:33:21', '0', '0', '0', '0', '2', '0', './ztyuploads/2017/07/04/20170704595a71d134c4a.jpg');
INSERT INTO `thread` VALUES ('80', '2', 'admin', '2', '玩儿', '2017-07-04 00:33:46', '2017-07-04 00:33:46', '0', '0', '0', '0', '0', '0', './ztyuploads/2017/07/04/20170704595a71ea11138.png');
INSERT INTO `thread` VALUES ('81', '7', 'admin', '2', 'qwedqwe', '2017-07-04 09:07:39', '2017-07-04 09:07:39', '0', '0', '0', '0', '5', '0', 'null');
INSERT INTO `thread` VALUES ('82', '7', 'admin', '2', 'iklm,', '2017-07-04 09:10:03', '2017-07-04 09:10:03', '0', '0', '0', '0', '0', '0', './ztyuploads/2017/07/04/20170704595aeaebddf86.jpg');
INSERT INTO `thread` VALUES ('83', '6', 'admin', '2', 'rte', '2017-07-04 09:27:05', '2017-07-04 09:27:05', '0', '0', '0', '0', '0', '0', 'null');
INSERT INTO `thread` VALUES ('84', '6', 'admin', '2', '4ter', '2017-07-04 09:27:56', '2017-07-04 09:27:56', '0', '0', '0', '0', '4', '0', 'null');
INSERT INTO `thread` VALUES ('85', '6', 'admin', '2', 'rte', '2017-07-04 09:32:36', '2017-07-04 09:32:36', '0', '0', '0', '0', '0', '0', 'null');
INSERT INTO `thread` VALUES ('93', '10', 'admin', '2', 'rtge', '2017-07-04 10:56:12', '2017-07-04 10:56:12', '0', '0', '0', '0', '0', '0', 'null');
INSERT INTO `thread` VALUES ('96', '22', 'admin', '2', '1', '2017-07-04 11:10:59', '2017-07-04 11:10:59', '0', '0', '0', '0', '61', '0', './ztyuploads/2017/07/04/20170704595b074326d3e.jpg');
INSERT INTO `thread` VALUES ('97', '22', 'admin', '2', '2', '2017-07-04 11:18:15', '2017-07-04 14:45:07', '0', '0', '1', '1', '63', '1', 'null');
INSERT INTO `thread` VALUES ('98', '21', 'admin', '2', 'ruyt', '2017-07-04 11:18:47', '2017-07-04 11:18:47', '0', '0', '0', '0', '0', '0', 'null');
INSERT INTO `thread` VALUES ('100', '9', 'admin', '2', 'ther', '2017-07-04 13:49:35', '2017-07-04 13:49:35', '0', '0', '0', '0', '2', '0', 'null');
INSERT INTO `thread` VALUES ('101', '4', 'long1', '30', '7.4', '2017-07-04 13:50:08', '2017-07-04 14:44:42', '0', '0', '0', '2', '16', '0', 'null');
INSERT INTO `thread` VALUES ('103', '4', 'long1', '30', 'da a a', '2017-07-04 13:51:05', '2017-07-04 14:43:05', '0', '0', '0', '1', '14', '0', 'null');
INSERT INTO `thread` VALUES ('104', '4', 'long1', '30', 'w我无法大卫杜夫', '2017-07-04 13:55:14', '2017-07-04 13:55:14', '1', '1', '0', '0', '8', '1', 'null');
INSERT INTO `thread` VALUES ('105', '11', 'admin', '2', '的舒服参数', '2017-07-04 13:56:04', '2017-07-04 13:56:04', '0', '0', '0', '0', '4', '0', './ztyuploads/2017/07/04/20170704595b2df4e0037.jpg');
INSERT INTO `thread` VALUES ('106', '2', 'admin', '2', 'sdfsd', '2017-07-04 14:26:44', '2017-07-04 14:28:08', '0', '0', '0', '3', '24', '0', './ztyuploads/2017/07/04/20170704595b352442d0c.jpg');
INSERT INTO `thread` VALUES ('107', '4', 'long2', '32', 'hjhjhj', '2017-07-04 14:45:49', '2017-07-04 14:45:49', '0', '0', '0', '0', '0', '0', 'null');
INSERT INTO `thread` VALUES ('108', '4', 'long2', '32', 'ceshi', '2017-07-04 14:47:38', '2017-07-04 14:47:48', '0', '0', '0', '1', '6', '0', 'null');
SET FOREIGN_KEY_CHECKS=1;
