/*
 Navicat MySQL Data Transfer

 Source Server         :  本地
 Source Server Version : 50711
 Source Host           : localhost
 Source Database       : vuecms

 Target Server Version : 50711
 File Encoding         : utf-8

 Date: 05/12/2017 18:07:29 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `cms_admin_group`
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
--  Table structure for `cms_admin_menu`
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
--  Records of `cms_admin_menu`
-- ----------------------------
BEGIN;
INSERT INTO `cms_admin_menu` VALUES ('10870559f6b4e76530ec7a602cceac9c', '0', '123213', '', '', null, '1', '1', null, null, null), ('55c12f9f2c64707fa335d4df4cb254a7', '0', '11111', '', '', null, '0', '1', null, null, null), ('a1ddf9d4d58b92388c2ff6f5410fc73b', '0', '12', '', '', null, '0', '1', null, null, null), ('a943051309b67ab66b8e6ca1f4fd6564', 'a1ddf9d4d58b92388c2ff6f5410fc73b', '14', '', '', null, '0', '1', null, null, null), ('c7c2cd24dc9881a11a06016c13d31f34', '55c12f9f2c64707fa335d4df4cb254a7', '11111', '', '', null, '0', '1', null, null, null), ('d4ac8f3ab70974ffed1780a4e35da705', '0', '2222', '', '', null, '1', '1', null, null, null);
COMMIT;

-- ----------------------------
--  Table structure for `cms_admin_user`
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
--  Records of `cms_admin_user`
-- ----------------------------
BEGIN;
INSERT INTO `cms_admin_user` VALUES ('12321fcdssc21', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '12213', '123213', null, null, null, '1');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
