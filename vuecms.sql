/*
Navicat MySQL Data Transfer

Source Server         : 11
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : vuecms

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2017-05-14 12:04:24
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `cms_admin_article`
-- ----------------------------
DROP TABLE IF EXISTS `cms_admin_article`;
CREATE TABLE `cms_admin_article` (
  `id` char(32) NOT NULL,
  `title` varchar(64) NOT NULL DEFAULT '' COMMENT '文章名称',
  `keyword` varchar(64) DEFAULT NULL COMMENT '关键字',
  `istop` tinyint(1) DEFAULT '0' COMMENT '是否置顶',
  `author` varchar(16) DEFAULT '',
  `img` varchar(64) DEFAULT NULL COMMENT '缩略图',
  `content` text COMMENT '内容',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  `status` tinyint(2) DEFAULT '1' COMMENT '0隐藏1显示2回收',
  `mid` char(32) NOT NULL DEFAULT '0' COMMENT '所属菜单',
  `uid` char(32) DEFAULT '0' COMMENT '创建人',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cms_admin_article
-- ----------------------------
INSERT INTO `cms_admin_article` VALUES ('05c06795f6a8c6678861751ab24fb60d', '123123', '123', '0', '213', null, '', '1494732217', '1494732217', '1', 'c7c2cd24dc9881a11a06016c13d31f34', '0');
INSERT INTO `cms_admin_article` VALUES ('0fefeecebae830c568c548deffcbc3fd', '123213', '123', '0', '3123', null, '', '1494729023', '1494729023', '1', 'c7c2cd24dc9881a11a06016c13d31f34', '0');
INSERT INTO `cms_admin_article` VALUES ('31b7cc8454505b809f5a1124faf6d11f', '123213', '123', '0', '123213', '123213', '123123123', '123213213', '123213213', '1', '2a205eecf9e4e2ebcbc878f0ed3a4db2', '0');
INSERT INTO `cms_admin_article` VALUES ('35e987acd15de3df79941fd928d4d210', '测试文章', '123', '0', '123', '20170514\\371f0687578486af3e4c87b73653f3d2.jpg', '&lt;p&gt;123213213213&lt;/p&gt;', '1494728231', '1494728231', '1', '0', '0');
INSERT INTO `cms_admin_article` VALUES ('44dee2e539f0a95d625bd29fd8c117b1', '123123213', '12312', '0', '3123', null, '', '1494728859', '1494728859', '1', '2a205eecf9e4e2ebcbc878f0ed3a4db2', '0');
INSERT INTO `cms_admin_article` VALUES ('4d8db461cac5c191011ba2e4555e546e', '123123213', '12312', '1', '3123', null, '', '1494728880', '1494728880', '1', '2a205eecf9e4e2ebcbc878f0ed3a4db2', '0');
INSERT INTO `cms_admin_article` VALUES ('593baf7a67d251c6dac7ddeddfcbe28a', '123213', '123', '0', '123', null, '', '1494729004', '1494729004', '1', 'c7c2cd24dc9881a11a06016c13d31f34', '0');
INSERT INTO `cms_admin_article` VALUES ('9e43b8fd676822dac0d856c7e8ba3c6e', '123', '123', '0', '123', null, '', '1494728970', '1494728970', '1', 'c7c2cd24dc9881a11a06016c13d31f34', '0');
INSERT INTO `cms_admin_article` VALUES ('aed6d5a4967852c63a9979607c7b9436', '123123', '123', '0', '123', null, '', '1494728942', '1494728942', '1', 'c7c2cd24dc9881a11a06016c13d31f34', '0');
INSERT INTO `cms_admin_article` VALUES ('c6c2df34aabe183ac02b9c0dd6c04308', '42134213213', '123', '0', '213213', null, '', '1494732225', '1494732225', '1', '2a205eecf9e4e2ebcbc878f0ed3a4db2', '0');
INSERT INTO `cms_admin_article` VALUES ('e5c7d9d33629085688252c5a9466b84e', '123123', '123', '0', '123', null, '', '1494728574', '1494728574', '1', 'c7c2cd24dc9881a11a06016c13d31f34', '0');

-- ----------------------------
-- Table structure for `cms_admin_group`
-- ----------------------------
DROP TABLE IF EXISTS `cms_admin_group`;
CREATE TABLE `cms_admin_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `rules` varchar(4000) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `remark` varchar(100) DEFAULT NULL,
  `status` tinyint(3) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cms_admin_group
-- ----------------------------

-- ----------------------------
-- Table structure for `cms_admin_menu`
-- ----------------------------
DROP TABLE IF EXISTS `cms_admin_menu`;
CREATE TABLE `cms_admin_menu` (
  `id` char(32) NOT NULL COMMENT '菜单ID',
  `pid` char(32) DEFAULT '0' COMMENT '上级菜单ID',
  `title` varchar(32) DEFAULT '' COMMENT '菜单名称',
  `url` varchar(127) DEFAULT '' COMMENT '链接地址',
  `icon` varchar(64) DEFAULT '' COMMENT '图标',
  `menu_type` tinyint(4) DEFAULT NULL COMMENT '菜单类型',
  `sort` tinyint(4) unsigned DEFAULT '0' COMMENT '排序（同级有效）',
  `status` tinyint(4) DEFAULT '1' COMMENT '状态',
  `rule_id` int(11) DEFAULT NULL COMMENT '权限id',
  `module` varchar(50) DEFAULT NULL,
  `menu` varchar(50) DEFAULT NULL COMMENT '三级菜单吗',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='【配置】后台菜单表';

-- ----------------------------
-- Records of cms_admin_menu
-- ----------------------------
INSERT INTO `cms_admin_menu` VALUES ('2a205eecf9e4e2ebcbc878f0ed3a4db2', 'c7c2cd24dc9881a11a06016c13d31f34', '324324', '', '', null, '1', '1', null, null, null);
INSERT INTO `cms_admin_menu` VALUES ('31b7cc8454505b809f5a1124faf6d11f', 'c7c2cd24dc9881a11a06016c13d31f34', '1234', '', '', '0', '11', '0', '0', '', '');
INSERT INTO `cms_admin_menu` VALUES ('55c12f9f2c64707fa335d4df4cb254a7', '0', '11111', '', '', '0', '0', '1', '0', '', '');
INSERT INTO `cms_admin_menu` VALUES ('c7c2cd24dc9881a11a06016c13d31f34', '55c12f9f2c64707fa335d4df4cb254a7', '11111', '', '', null, '0', '1', null, null, null);
INSERT INTO `cms_admin_menu` VALUES ('d8dc8094b6362842a9f992bea7c1e9b2', '73c58eb8991d1faa255d9a8a4a8c3811', '123123', '', '', null, '1', '1', null, null, null);

-- ----------------------------
-- Table structure for `cms_admin_user`
-- ----------------------------
DROP TABLE IF EXISTS `cms_admin_user`;
CREATE TABLE `cms_admin_user` (
  `id` char(32) NOT NULL COMMENT '主键',
  `username` varchar(100) DEFAULT NULL COMMENT '管理后台账号',
  `password` varchar(100) DEFAULT NULL COMMENT '管理后台密码',
  `remark` varchar(100) DEFAULT NULL COMMENT '用户备注',
  `create_time` int(11) DEFAULT NULL,
  `realname` varchar(100) DEFAULT NULL COMMENT '真实姓名',
  `structure_id` int(11) DEFAULT NULL COMMENT '部门',
  `post_id` int(11) DEFAULT NULL COMMENT '岗位',
  `status` tinyint(3) DEFAULT NULL COMMENT '状态,1启用0禁用',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cms_admin_user
-- ----------------------------
INSERT INTO `cms_admin_user` VALUES ('12321fcdssc21', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '12213', '123213', null, null, null, '1');
