-- MySQL dump 10.13  Distrib 5.6.27, for Linux (i686)
--
-- Host: localhost    Database: cul_business
-- ------------------------------------------------------
-- Server version	5.6.27

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `ba_action`
--

DROP TABLE IF EXISTS `ba_action`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ba_action` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '权限名称',
  `intro` varchar(255) DEFAULT NULL COMMENT '权限说明',
  `namespace` varchar(255) NOT NULL COMMENT '命名空间',
  `controller_prefix` varchar(255) NOT NULL DEFAULT '' COMMENT '控制器名称',
  `url` varchar(255) NOT NULL COMMENT '访问路径的部分 url',
  `action` varchar(255) NOT NULL COMMENT '操作方法名称',
  `style_class` varchar(255) DEFAULT NULL COMMENT 'class样式名称',
  `pid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上级ID',
  `created_at` date NOT NULL DEFAULT '0000-00-00' COMMENT '创建时间',
  `updated_at` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ba_action`
--

LOCK TABLES `ba_action` WRITE;
/*!40000 ALTER TABLE `ba_action` DISABLE KEYS */;
INSERT INTO `ba_action` VALUES (1,'首页','','App\\Http\\Controllers\\Admin','Home','home','index','am-cf',0,'2016-01-09','0000-00-00'),(2,'权限管理','','App\\Http\\Controllers\\Admin','Action','action','index','am-cf',0,'2016-01-09','0000-00-00'),(3,'操作管理','','App\\Http\\Controllers\\Admin','Action','action','index','am-cf',2,'2016-01-10','2016-01-12'),(4,'资料审核','','App\\Http\\Controllers\\Admin','Action','action','index','am-cf',0,'0000-00-00','2016-01-10'),(5,'供求管理','','App\\Http\\Controllers\\Admin','Action','action','index','am-cf',0,'0000-00-00','2016-01-12'),(6,'角色管理','','App\\Http\\Controllers\\Admin','Role','role','index','am-cf',2,'0000-00-00','2016-01-12'),(7,'管理员管理','','App\\Http\\Controllers\\Admin','Admin','admin','index','am-cf',2,'2016-01-12','2016-01-12'),(8,'产品管理','','App\\Http\\Controllers\\Admin','Product','action','index','am-cf',0,'2016-01-12','2016-02-16'),(9,'租赁管理','','App\\Http\\Controllers\\Admin','Action','action','index','am-cf',0,'2016-01-12','0000-00-00'),(10,'娱乐管理','','App\\Http\\Controllers\\Admin','Action','action','index','am-cf',0,'2016-01-12','0000-00-00'),(11,'设计管理','','App\\Http\\Controllers\\Admin','Action','action','index','am-cf',0,'2016-01-12','0000-00-00'),(12,'消息管理','','App\\Http\\Controllers\\Admin','Action','action','index','am-cf',0,'2016-01-12','0000-00-00'),(13,'消息管理','','App\\Http\\Controllers\\Admin','Message','message','index','am-cf',12,'2016-01-12','0000-00-00'),(14,'链接管理','','App\\Http\\Controllers\\Admin','Link','link','index','am-cf',12,'2016-01-12','0000-00-00'),(15,'心声管理','','App\\Http\\Controllers\\Admin','Voice','voice','index','am-cf',12,'2016-01-12','0000-00-00'),(16,'类型管理','','App\\Http\\Controllers\\Admin','Type','type','index','am-cf',1,'2016-01-13','0000-00-00'),(17,'图片管理','','App\\Http\\Controllers\\Admin','Pic','pic','index','am-cf',1,'2016-01-13','0000-00-00'),(18,'广告管理','','App\\Http\\Controllers\\Admin','Ad','ad','index','am-cf',0,'2016-02-15','0000-00-00'),(19,'广告管理','','App\\Http\\Controllers\\Admin','Ad','ad','index','am-cf',18,'2016-02-15','0000-00-00'),(20,'广告位管理','','App\\Http\\Controllers\\Admin','AdPlace','place','index','am-cf',18,'2016-02-15','0000-00-00'),(21,'内部产品','','App\\Http\\Controllers\\Admin','Product','product','index','',8,'2016-02-16','2016-02-16'),(22,'产品属性','','App\\Http\\Controllers\\Admin','ProductAttr','productattr','index','',8,'2016-02-16','0000-00-00'),(23,'视频管理','','App\\Http\\Controllers\\Admin','Video','video','index','',8,'2016-02-16','0000-00-00'),(24,'视频类型','','App\\Http\\Controllers\\Admin','VideoCategory','videocate','index','',8,'2016-02-16','2016-02-16');
/*!40000 ALTER TABLE `ba_action` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ba_admin`
--

DROP TABLE IF EXISTS `ba_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ba_admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '管理员名称',
  `password` varchar(255) NOT NULL COMMENT '登陆密码',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ba_admin`
--

LOCK TABLES `ba_admin` WRITE;
/*!40000 ALTER TABLE `ba_admin` DISABLE KEYS */;
/*!40000 ALTER TABLE `ba_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ba_role`
--

DROP TABLE IF EXISTS `ba_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ba_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '角色名称',
  `password` varchar(255) NOT NULL COMMENT '登陆密码',
  `admin_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '管理员ID，关联管理员表ba_admin',
  `created_at` date NOT NULL DEFAULT '0000-00-00' COMMENT '创建时间',
  `updated_at` date NOT NULL DEFAULT '0000-00-00' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ba_role`
--

LOCK TABLES `ba_role` WRITE;
/*!40000 ALTER TABLE `ba_role` DISABLE KEYS */;
/*!40000 ALTER TABLE `ba_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ba_role_action`
--

DROP TABLE IF EXISTS `ba_role_action`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ba_role_action` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '角色ID',
  `action_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '权限ID',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ba_role_action`
--

LOCK TABLES `ba_role_action` WRITE;
/*!40000 ALTER TABLE `ba_role_action` DISABLE KEYS */;
/*!40000 ALTER TABLE `ba_role_action` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bs_actor_pic`
--

DROP TABLE IF EXISTS `bs_actor_pic`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bs_actor_pic` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `actor_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '演员id',
  `pic_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '图片id',
  `created_at` date NOT NULL DEFAULT '0000-00-00' COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='演员图片关联表 bs_actor_pic';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bs_actor_pic`
--

LOCK TABLES `bs_actor_pic` WRITE;
/*!40000 ALTER TABLE `bs_actor_pic` DISABLE KEYS */;
/*!40000 ALTER TABLE `bs_actor_pic` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bs_actors`
--

DROP TABLE IF EXISTS `bs_actors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bs_actors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '演员名称',
  `sex` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '性别：1男，2女',
  `realname` varchar(255) DEFAULT NULL COMMENT '真实名字',
  `origin` varchar(255) DEFAULT NULL COMMENT '籍贯',
  `education` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '学历',
  `school` varchar(255) DEFAULT NULL COMMENT '毕业学校',
  `hobby` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '爱好',
  `job` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '职业',
  `area` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '所在地',
  `height` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '身高，单位cm',
  `work` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '作品',
  `created_at` date NOT NULL DEFAULT '0000-00-00' COMMENT '创建时间',
  `updated_at` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='演员表 bs_actors';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bs_actors`
--

LOCK TABLES `bs_actors` WRITE;
/*!40000 ALTER TABLE `bs_actors` DISABLE KEYS */;
/*!40000 ALTER TABLE `bs_actors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bs_ad_places`
--

DROP TABLE IF EXISTS `bs_ad_places`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bs_ad_places` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '广告位名称',
  `intro` varchar(500) DEFAULT NULL COMMENT '广告位简介 ',
  `type_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '广告位类型，关联bs_types',
  `uid` int(10) unsigned DEFAULT '0' COMMENT '用户id',
  `width` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '广告位宽度，单位px',
  `height` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '广告位高度，单位px',
  `price` decimal(10,0) unsigned NOT NULL DEFAULT '0' COMMENT '广告位价格，单位元/月',
  `number` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '广告数量',
  `del` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '回收站功能：0不放入回收站，1放入回收站',
  `created_at` date NOT NULL DEFAULT '0000-00-00' COMMENT '创建时间',
  `updated_at` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='类型表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bs_ad_places`
--

LOCK TABLES `bs_ad_places` WRITE;
/*!40000 ALTER TABLE `bs_ad_places` DISABLE KEYS */;
/*!40000 ALTER TABLE `bs_ad_places` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bs_ads`
--

DROP TABLE IF EXISTS `bs_ads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bs_ads` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '广告名称',
  `ad_place_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '广告位id，关联bs_ad_place',
  `intro` varchar(500) DEFAULT NULL COMMENT '广告内容',
  `pic_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '图片链接id，关联bs_pics',
  `link` varchar(255) NOT NULL COMMENT '广告链接',
  `fromtime` int(10) unsigned NOT NULL COMMENT '投放开始时间',
  `totime` int(10) unsigned NOT NULL COMMENT '投放结束时间',
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '发布会员id',
  `uname` varchar(255) NOT NULL COMMENT '用户名称',
  `auth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '审核状态：0未审核，1未通过审核，2通过审核',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '投放状态：0未投放，1已过期，2投放中',
  `del` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '回收站功能：0不放入回收站，1放入回收站',
  `created_at` date NOT NULL DEFAULT '0000-00-00' COMMENT '创建时间',
  `updated_at` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='类型表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bs_ads`
--

LOCK TABLES `bs_ads` WRITE;
/*!40000 ALTER TABLE `bs_ads` DISABLE KEYS */;
/*!40000 ALTER TABLE `bs_ads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bs_entertain_actor`
--

DROP TABLE IF EXISTS `bs_entertain_actor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bs_entertain_actor` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `entertain_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '娱乐id',
  `actor_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '演员id',
  `created_at` date NOT NULL DEFAULT '0000-00-00' COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='娱乐演员关联表 bs_entertain_actor';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bs_entertain_actor`
--

LOCK TABLES `bs_entertain_actor` WRITE;
/*!40000 ALTER TABLE `bs_entertain_actor` DISABLE KEYS */;
/*!40000 ALTER TABLE `bs_entertain_actor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bs_entertain_pic`
--

DROP TABLE IF EXISTS `bs_entertain_pic`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bs_entertain_pic` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `entertain_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '娱乐id',
  `pic_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '图片id',
  `created_at` date NOT NULL DEFAULT '0000-00-00' COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='娱乐图片关联表 bs_entertain_pic';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bs_entertain_pic`
--

LOCK TABLES `bs_entertain_pic` WRITE;
/*!40000 ALTER TABLE `bs_entertain_pic` DISABLE KEYS */;
/*!40000 ALTER TABLE `bs_entertain_pic` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bs_entertains`
--

DROP TABLE IF EXISTS `bs_entertains`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bs_entertains` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL COMMENT '娱乐标题',
  `content` varchar(500) NOT NULL COMMENT '内容',
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '发布方id',
  `created_at` date NOT NULL DEFAULT '0000-00-00' COMMENT '创建时间',
  `updated_at` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='娱乐表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bs_entertains`
--

LOCK TABLES `bs_entertains` WRITE;
/*!40000 ALTER TABLE `bs_entertains` DISABLE KEYS */;
/*!40000 ALTER TABLE `bs_entertains` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bs_links`
--

DROP TABLE IF EXISTS `bs_links`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bs_links` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '链接名称',
  `title` varchar(255) DEFAULT NULL COMMENT '鼠标移动的提示文字',
  `type_id` int(10) unsigned NOT NULL DEFAULT '1' COMMENT '类型id，关联bs_types',
  `pic_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '图片id，关联bs_pics',
  `intro` varchar(500) DEFAULT NULL COMMENT '链接介绍',
  `link` varchar(255) NOT NULL COMMENT '访问地址链接',
  `display_way` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '显示方式：1文字链接，2图片链接',
  `isshow` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '在前台页面是否显示：0不显示，1显示',
  `pid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '父id',
  `created_at` date NOT NULL DEFAULT '0000-00-00' COMMENT '创建时间',
  `updated_at` date NOT NULL DEFAULT '0000-00-00' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='网站链接表：包含header头部链接、navigate菜单导航栏链接、footer脚部链接等';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bs_links`
--

LOCK TABLES `bs_links` WRITE;
/*!40000 ALTER TABLE `bs_links` DISABLE KEYS */;
INSERT INTO `bs_links` VALUES (1,'首页','',1,0,'','/#',1,1,0,'2016-01-13','0000-00-00');
/*!40000 ALTER TABLE `bs_links` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bs_message`
--

DROP TABLE IF EXISTS `bs_message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bs_message` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL COMMENT '消息标题',
  `genre` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '消息主体：1个人消息，2企业消息',
  `type` tinyint(3) unsigned NOT NULL DEFAULT '2' COMMENT '消息类型：1在线消息，2离线消息',
  `content` varchar(500) DEFAULT NULL COMMENT '消息内容',
  `sender` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '发件人id',
  `sender_time` int(20) unsigned NOT NULL DEFAULT '0' COMMENT '发送时间',
  `accept` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '收件人id',
  `accept_time` int(20) unsigned NOT NULL DEFAULT '0' COMMENT '收件时间',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '消息状态：1未发送，2已发送未接收，3已接收未读，4已读',
  `del` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '回收站功能：0不放入回收站，1放入回收站',
  `created_at` date NOT NULL DEFAULT '0000-00-00' COMMENT '创建时间',
  `updated_at` date NOT NULL DEFAULT '0000-00-00' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='消息表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bs_message`
--

LOCK TABLES `bs_message` WRITE;
/*!40000 ALTER TABLE `bs_message` DISABLE KEYS */;
/*!40000 ALTER TABLE `bs_message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bs_orders`
--

DROP TABLE IF EXISTS `bs_orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bs_orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '订单名称',
  `serial` int(20) unsigned NOT NULL DEFAULT '0' COMMENT '订单编号',
  `seller` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '卖家id ',
  `seller_name` varchar(255) NOT NULL COMMENT '卖家名称',
  `buyer` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '买家id',
  `buyer_name` varchar(255) NOT NULL COMMENT '买家名称',
  `number` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '数量',
  `status` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '订单状态：申请，协商，确定，交易，结果',
  `created_at` date NOT NULL DEFAULT '0000-00-00' COMMENT '创建时间',
  `updated_at` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='订单表 bs_orders';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bs_orders`
--

LOCK TABLES `bs_orders` WRITE;
/*!40000 ALTER TABLE `bs_orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `bs_orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bs_pics`
--

DROP TABLE IF EXISTS `bs_pics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bs_pics` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '图片名称',
  `type_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '类型id：关联bs_types',
  `url` varchar(255) NOT NULL COMMENT '图片路径',
  `intro` varchar(500) DEFAULT NULL COMMENT '图片介绍',
  `created_at` date NOT NULL DEFAULT '0000-00-00' COMMENT '创建时间',
  `updated_at` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='图片表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bs_pics`
--

LOCK TABLES `bs_pics` WRITE;
/*!40000 ALTER TABLE `bs_pics` DISABLE KEYS */;
/*!40000 ALTER TABLE `bs_pics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bs_products`
--

DROP TABLE IF EXISTS `bs_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bs_products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '视频名称',
  `intro` varchar(1000) DEFAULT NULL COMMENT '视频简介',
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '提供者：需求用户，设计师，公司',
  `uname` varchar(255) DEFAULT NULL COMMENT '提供者名称',
  `css_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'css样式id',
  `js_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'js文件id',
  `del` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '回收站功能：0不放入回收站，1放入回收站',
  `created_at` date NOT NULL DEFAULT '0000-00-00' COMMENT '创建时间',
  `updated_at` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='在线视频表：在线写的模板';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bs_products`
--

LOCK TABLES `bs_products` WRITE;
/*!40000 ALTER TABLE `bs_products` DISABLE KEYS */;
/*!40000 ALTER TABLE `bs_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bs_products_attr`
--

DROP TABLE IF EXISTS `bs_products_attr`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bs_products_attr` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '属性名称',
  `type_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '属性类型：css样式文件，js文件',
  `url` varchar(255) NOT NULL COMMENT '属性文件路径',
  `intro` varchar(1000) DEFAULT NULL COMMENT '属性简介',
  `created_at` date NOT NULL DEFAULT '0000-00-00' COMMENT '创建时间',
  `updated_at` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='在线视频属性表：在线写的属性模板';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bs_products_attr`
--

LOCK TABLES `bs_products_attr` WRITE;
/*!40000 ALTER TABLE `bs_products_attr` DISABLE KEYS */;
/*!40000 ALTER TABLE `bs_products_attr` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bs_rent_pic`
--

DROP TABLE IF EXISTS `bs_rent_pic`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bs_rent_pic` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rent_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '租赁id',
  `pic_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '图片id',
  `created_at` date NOT NULL DEFAULT '0000-00-00' COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='租赁图片关联表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bs_rent_pic`
--

LOCK TABLES `bs_rent_pic` WRITE;
/*!40000 ALTER TABLE `bs_rent_pic` DISABLE KEYS */;
/*!40000 ALTER TABLE `bs_rent_pic` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bs_rents`
--

DROP TABLE IF EXISTS `bs_rents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bs_rents` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '设备名称',
  `genre` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '类型：1供应，2需求',
  `intro` varchar(500) NOT NULL COMMENT '设备介绍',
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '发布者id',
  `price` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '价格，单位元',
  `del` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '回收站功能：0不放入回收站，1放入回收站',
  `created_at` date NOT NULL DEFAULT '0000-00-00' COMMENT '创建时间',
  `updated_at` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='租赁表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bs_rents`
--

LOCK TABLES `bs_rents` WRITE;
/*!40000 ALTER TABLE `bs_rents` DISABLE KEYS */;
/*!40000 ALTER TABLE `bs_rents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bs_types`
--

DROP TABLE IF EXISTS `bs_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bs_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '类型名称',
  `intro` varchar(500) DEFAULT NULL COMMENT '类型说明',
  `table_id` int(10) unsigned NOT NULL COMMENT '所在表id',
  `table_name` varchar(255) NOT NULL COMMENT '所在表名称',
  `field` varchar(255) NOT NULL COMMENT '字段名',
  `del` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '回收站功能：0不放入回收站，1放入回收站',
  `created_at` date NOT NULL DEFAULT '0000-00-00' COMMENT '创建时间',
  `updated_at` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COMMENT='类型表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bs_types`
--

LOCK TABLES `bs_types` WRITE;
/*!40000 ALTER TABLE `bs_types` DISABLE KEYS */;
INSERT INTO `bs_types` VALUES (1,'header头链接','bs_links网站头部链接',1,'网站链接','type_id',0,'2016-01-13','2016-01-13'),(2,'navigate菜单导航栏链接','bs_links',1,'网站链接','type_id',0,'2016-01-13','0000-00-00'),(3,'footer脚部链接','bs_links',1,'网站链接','type_id',0,'2016-01-13','0000-00-00'),(4,'行业','bs_videos_category视频类型表的类型划分依据',2,'视频类别','type_id',0,'2016-02-16','2016-02-16'),(5,'地区','bs_videos_category视频类别表',2,'视频类别','type_id',0,'2016-02-16','0000-00-00'),(6,'人群','bs_videos_category视频类别表',2,'视频类别','type_id',0,'2016-02-16','0000-00-00'),(7,'行为','bs_videos_category视频类别表',2,'视频类别','type_id',0,'2016-02-16','0000-00-00'),(8,'内容','bs_videos_category视频类别表',2,'视频类别','type_id',0,'2016-02-16','0000-00-00'),(9,'幻灯片','bs_ad_places广告位表\r\n用于前台页面广告展示的位置',3,'广告位','type_id',0,'2016-02-16','0000-00-00'),(10,'图片','bs_ad_places广告位表\r\n前台页面广告展示的位置',3,'广告位','type_id',0,'2016-02-16','0000-00-00'),(11,'悬浮','bs_ad_places广告位表\r\n前台页面广告展示的位置',3,'广告位','type_id',0,'2016-02-16','0000-00-00'),(12,'赞助商','bs_ad_places广告位表\r\n前台页面广告展示的位置',3,'广告位','type_id',0,'2016-02-16','0000-00-00'),(13,'文字','bs_ad_places广告位表\r\n前台页面广告展示的位置',3,'广告位','type_id',0,'2016-02-16','0000-00-00');
/*!40000 ALTER TABLE `bs_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bs_user_voice`
--

DROP TABLE IF EXISTS `bs_user_voice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bs_user_voice` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL COMMENT '心声标题',
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户id',
  `content` varchar(500) NOT NULL COMMENT '心声内容',
  `issow` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '在前台页面是否显示：0不显示，1显示',
  `created_at` date NOT NULL DEFAULT '0000-00-00' COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户心声表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bs_user_voice`
--

LOCK TABLES `bs_user_voice` WRITE;
/*!40000 ALTER TABLE `bs_user_voice` DISABLE KEYS */;
/*!40000 ALTER TABLE `bs_user_voice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bs_videos`
--

DROP TABLE IF EXISTS `bs_videos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bs_videos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '视频名称',
  `cate_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '视频分类：关联bs_videos_category',
  `intro` varchar(1000) DEFAULT NULL COMMENT '视频简介',
  `link` varchar(255) NOT NULL COMMENT '视频链接地址',
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '提供者：需求用户，设计师，公司',
  `uname` varchar(255) NOT NULL COMMENT '提供者名称',
  `del` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '回收站功能：0不放入回收站，1放入回收站',
  `created_at` date NOT NULL DEFAULT '0000-00-00' COMMENT '创建时间',
  `updated_at` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='上传的视频表：供应方提供的产品、需求方提供的需求样片';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bs_videos`
--

LOCK TABLES `bs_videos` WRITE;
/*!40000 ALTER TABLE `bs_videos` DISABLE KEYS */;
/*!40000 ALTER TABLE `bs_videos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bs_videos_category`
--

DROP TABLE IF EXISTS `bs_videos_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bs_videos_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '视频分类名称',
  `type_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '类型划分依据，关联bs_types',
  `pid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '父id',
  `intro` varchar(1000) DEFAULT NULL COMMENT '分类简介',
  `created_at` date NOT NULL DEFAULT '0000-00-00' COMMENT '创建时间',
  `updated_at` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='视频分类表bs_videos_category';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bs_videos_category`
--

LOCK TABLES `bs_videos_category` WRITE;
/*!40000 ALTER TABLE `bs_videos_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `bs_videos_category` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-02-17  3:06:35