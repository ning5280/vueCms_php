  Navicat MySQL Data Transfer

 Source Server         :  本地
 Source Server Version : 50711
 Source Host           : localhost
 Source Database       : vuecms

 Target Server Version : 50711
 File Encoding         : utf-8

 Date: 05/16/2017 12:07:49 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `cms_admin_article`
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
--  Records of `cms_admin_article`
-- ----------------------------
BEGIN;
INSERT INTO `cms_admin_article` VALUES ('05c06795f6a8c6678861751ab24fb60d', '123123', '123', '0', '213', null, '', '1494732217', '1494732217', '1', 'c7c2cd24dc9881a11a06016c13d31f34', '0'), ('0fefeecebae830c568c548deffcbc3fd', '123213', '123', '0', '3123', null, '', '1494729023', '1494729023', '1', 'c7c2cd24dc9881a11a06016c13d31f34', '0'), ('31b7cc8454505b809f5a1124faf6d11f', '123213', '123', '0', '123213', '123213', '123123123', '123213213', '123213213', '1', '2a205eecf9e4e2ebcbc878f0ed3a4db2', '0'), ('35e987acd15de3df79941fd928d4d210', '测试文章', '123', '0', '123', '20170514\\371f0687578486af3e4c87b73653f3d2.jpg', '&lt;p&gt;123213213213&lt;/p&gt;', '1494728231', '1494728231', '1', '0', '0'), ('44dee2e539f0a95d625bd29fd8c117b1', '123123213', '12312', '0', '3123', null, '', '1494728859', '1494728859', '1', '2a205eecf9e4e2ebcbc878f0ed3a4db2', '0'), ('4d8db461cac5c191011ba2e4555e546e', '123123213', '12312', '1', '3123', null, '', '1494728880', '1494728880', '1', '2a205eecf9e4e2ebcbc878f0ed3a4db2', '0'), ('593baf7a67d251c6dac7ddeddfcbe28a', '123213', '123', '0', '123', null, '', '1494729004', '1494729004', '1', 'c7c2cd24dc9881a11a06016c13d31f34', '0'), ('9e43b8fd676822dac0d856c7e8ba3c6e', '123', '123', '0', '123', null, '', '1494728970', '1494728970', '1', 'c7c2cd24dc9881a11a06016c13d31f34', '0'), ('aed6d5a4967852c63a9979607c7b9436', '123123', '123', '0', '123', null, '', '1494728942', '1494728942', '1', 'c7c2cd24dc9881a11a06016c13d31f34', '0'), ('c6c2df34aabe183ac02b9c0dd6c04308', '42134213213', '123', '0', '213213', null, '', '1494732225', '1494732225', '1', '2a205eecf9e4e2ebcbc878f0ed3a4db2', '0'), ('e5c7d9d33629085688252c5a9466b84e', '123123', '123', '0', '123', null, '', '1494728574', '1494728574', '1', 'c7c2cd24dc9881a11a06016c13d31f34', '0');
COMMIT;

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
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='【配置】后台菜单表';

-- ----------------------------
--  Records of `cms_admin_menu`
-- ----------------------------
BEGIN;
INSERT INTO `cms_admin_menu` VALUES ('2a205eecf9e4e2ebcbc878f0ed3a4db2', 'c7c2cd24dc9881a11a06016c13d31f34', '324324', '', '', null, '1', '1', null, null, null, null, null), ('31b7cc8454505b809f5a1124faf6d11f', 'c7c2cd24dc9881a11a06016c13d31f34', '1234', '', '', '0', '11', '1', '0', '', '', null, null), ('55c12f9f2c64707fa335d4df4cb254a7', '0', '11111', '', '', '0', '0', '1', '0', '', '', null, null), ('b8ffec782b87f0d1bde79508aee8a4eb', '0', '123213', '', '', null, '1', '1', null, null, null, '1494857270', '1494857270'), ('c7c2cd24dc9881a11a06016c13d31f34', '55c12f9f2c64707fa335d4df4cb254a7', '11111', '', '', null, '0', '1', null, null, null, null, null), ('d8dc8094b6362842a9f992bea7c1e9b2', '73c58eb8991d1faa255d9a8a4a8c3811', '123123', '', '', null, '1', '1', null, null, null, null, null);
COMMIT;

-- ----------------------------
--  Table structure for `cms_admin_role`
-- ----------------------------
DROP TABLE IF EXISTS `cms_admin_role`;
CREATE TABLE `cms_admin_role` (
  `id` char(32) NOT NULL,
  `name` varchar(32) DEFAULT NULL,
  `rules` varchar(1024) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `sort` tinyint(4) DEFAULT '1',
  `remark` varchar(100) DEFAULT NULL,
  `status` tinyint(3) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `cms_admin_role`
-- ----------------------------
BEGIN;
INSERT INTO `cms_admin_role` VALUES ('0', '超级管理员', null, '0', '123213213', '213213213', '0', '123213213', '1'), ('510179841dfcbd0bb85710d48bfb1730', '普通会员', '4,5', '0', '1494906943', '1494907581', '1', '123123213', '1');
COMMIT;

-- ----------------------------
--  Table structure for `cms_admin_rule`
-- ----------------------------
DROP TABLE IF EXISTS `cms_admin_rule`;
CREATE TABLE `cms_admin_rule` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(64) NOT NULL DEFAULT '' COMMENT '名称',
  `name` varchar(64) NOT NULL DEFAULT '' COMMENT '定义名',
  `type` tinyint(5) NOT NULL DEFAULT '1' COMMENT '级别。1模块,2控制器,3操作',
  `pid` char(32) DEFAULT '0' COMMENT '父级id 默认0',
  `status` tinyint(3) DEFAULT '1' COMMENT '状态 默认为1 开启 0关闭',
  `sort` tinyint(3) DEFAULT '1',
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `cms_admin_rule`
-- ----------------------------
BEGIN;
INSERT INTO `cms_admin_rule` VALUES ('1', '后台管理模块', 'admin', '1', '0', '1', '1', '1494857329', '1494857329'), ('2', '菜单管理', 'menu', '2', '1', '1', '1', '1494857363', '1494857363'), ('3', '添加菜单', 'add', '3', '2', '1', '1', '1494857388', '1494857388'), ('4', '菜单编辑', 'edit', '3', '2', '1', '2', '1494899487', '1494899487'), ('5', '菜单删除', 'del', '3', '2', '1', '3', '1494899548', '1494899548'), ('6', '文章管理', 'article', '2', '1', '1', '2', '1494899584', '1494899584'), ('7', '添加文章', 'add', '3', '6', '1', '1', '1494899622', '1494899622'), ('8', '文章编辑', 'edit', '3', '6', '1', '2', '1494899640', '1494899640'), ('9', '文章删除', 'del', '3', '6', '1', '3', '1494899654', '1494899654');
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
  `update_time` int(11) DEFAULT NULL,
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
INSERT INTO `cms_admin_user` VALUES ('12321fcdssc21', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '12213', '123213', null, null, null, null, '1');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
