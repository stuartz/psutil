-- MySQL dump 10.16  Distrib 10.1.24-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: invReq
-- ------------------------------------------------------
-- Server version	10.1.24-MariaDB-1~jessie

CREATE DATABASE `invReq`;
USE `invReq`;

DROP TABLE IF EXISTS `Companies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Companies` (
  `row_id` int(5) NOT NULL AUTO_INCREMENT,
  `entity` varchar(8) DEFAULT NULL COMMENT 'same as jde AN8 OR your system vendor id',
  `companyID` varchar(190) DEFAULT NULL,
  `companyName` varchar(190) DEFAULT NULL,
  `userName` varchar(150) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  `invUrl` varchar(190) DEFAULT NULL,
  `invEndPt` varchar(190) DEFAULT NULL,
  `invVersion` varchar(25) DEFAULT NULL COMMENT '1.0.0 depricated 1.2.1 adds filters',
  `statusUrl` varchar(190) DEFAULT NULL,
  `statusEndPt` varchar(190) DEFAULT NULL,
  `statusVersion` varchar(25) DEFAULT NULL,
  `productUrl` varchar(190) DEFAULT NULL,
  `productEndPt` varchar(190) DEFAULT NULL,
  `productVersion` varchar(5) DEFAULT NULL,
  `shippingUrl` varchar(190) DEFAULT NULL,
  `shippingVersion` varchar(5) DEFAULT NULL,
  `shippingEndPt` varchar(190) DEFAULT NULL,
  `mediaUrl` varchar(190) DEFAULT NULL,
  `mediaVersion` varchar(5) DEFAULT NULL,
  `mediaEndPt` varchar(190) DEFAULT NULL,
  `live_inv` tinyint(4) NOT NULL DEFAULT '0',
  `live_order_status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`row_id`),
  UNIQUE KEY `entity` (`entity`),
  UNIQUE KEY `companyID` (`companyID`)
) ENGINE=InnoDB AUTO_INCREMENT=246 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `change_log`
--

DROP TABLE IF EXISTS `change_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `change_log` (
  `row_id` int(11) NOT NULL AUTO_INCREMENT,
  `companyID` varchar(190) NOT NULL,
  `field` varchar(50) NOT NULL,
  `value` varchar(190) NOT NULL,
  `old_val` varchar(190) NOT NULL,
  `user` varchar(50) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`row_id`)
) ENGINE=InnoDB AUTO_INCREMENT=537 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `users`
--
DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `row_id` int(5) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(65) NOT NULL,
  `email` varchar(65) NOT NULL,
  `password` varchar(190) NOT NULL COMMENT 'encrypted password',
  `token` varchar(70),
  `admin` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`row_id`),
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `email_queue`
--

DROP TABLE IF EXISTS `email_queue`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `email_queue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `send_to` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cc` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bcc` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sent_from` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'noreply@Yourcompany.com',
  `subject` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `sent` tinyint(2) DEFAULT NULL COMMENT 'sent=1',
  `html` tinyint(2) DEFAULT NULL COMMENT 'html=1, no html=0',
  `reply_to` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'noreply@Yourcompany.com',
  `error_msg` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sent` (`sent`)
) ENGINE=InnoDB AUTO_INCREMENT=309157 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='used for queueing emails';
/*!40101 SET character_set_client = @saved_cs_client */;


INSERT INTO `Companies` (`row_id`, `entity`, `companyID`, `companyName`, `userName`, `password`, `invUrl`, `invEndPt`, `invVersion`, `statusUrl`, `statusEndPt`, `statusVersion`, `productUrl`, `productEndPt`, `productVersion`, `shippingUrl`, `shippingVersion`, `shippingEndPt`, `mediaUrl`, `mediaVersion`, `mediaEndPt`, `live_inv`, `live_order_status`) VALUES
(1,	NULL,	'AIA',	'AIA Corporation',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(2,	NULL,	'ALL',	'All In One',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(3,	NULL,	'alphabroder',	'Alphabroder',	NULL,	NULL,	'https://services.alphabroder.com/inventory/WSDL/v1/InventoryService.wsdl',	'https://services.alphabroder.com/InventoryService/1.2.1/InventoryService.wsdl',	'1.2.1',	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(4,	NULL,	'AdBag',	'American Ad Bag',	NULL,	NULL,	'http://services.adbag.com/InventoryService.svc',	'http://services.adbag.com/InventoryService/1.2.1/InventoryService.wsdl',	'1.2.1',	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(5,	NULL,	'Any',	'Anypromo',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(6,	NULL,	'Ariel',	'Ariel Premium Supply',	NULL,	NULL,	'http://www.arielpremium.com/WS/inventory.php?wsdl',	'http://www.arielpremium.com/InventoryService/1.2.1/InventoryService.wsdl',	'1.2.1',	'http://www.arielpremium.com/WS/order-status-api/order_status.php?wsdl',	'http://www.arielpremium.com/WS/order-status-api/order_status.php?wsdl',	'1.0.0',	'',	'',	'',	'https://www.arielpremium.com/WS/shipment-notification-api/shipment_notification_status.php?wsdl',	'1.0.0',	'https://www.arielpremium.com/WS/shipment-notification-api/shipment_notification_status.php?wsdl',	'',	'',	'',	1,	1),
(7,	NULL,	'Axis',	'Axis Promo',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(8,	NULL,	'BagMakers',	'Bag Makers',	NULL,  NULL,	'http://psinv.bagmakersinc.com/BMIInventory.svc?wsdl',	'http://psinv.bagmakersinc.com/InventoryService/1.2.1/InventoryService.wsdl',	'1.2.1',	'',	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	1,	0),
(9,	NULL,	'Baudville',	'Baudville',	NULL,	NULL,	'https://service.baystate.com/baystateinventoryservice.svc',	'https://service.baystate.com/InventoryService/1.2.1/InventoryService.wsdl',	'1.2.1',	'https://service.baystate.com/BayStateOrderStatusService.svc',	'https://service.baystate.com/Order StatusService/1.0.0/Order StatusService.wsdl',	'1.0.0',	'',	'',	'',	'https://service.baystate.com/BayStateOrderShipmentService.svc',	'1.0.0',	'https://service.baystate.com/Order Shipment NotificationService/1.0.0/Order Shipment NotificationService.wsdl',	'',	'',	'',	0,	0),
(10,  NULL,	'Beacon',	'Beacon Promotions',	NULL, NULL,	'https://ordertrax.essent.com/sites/beaconpromotions/inventory/WSDL/InventoryService.wsdl',	'https://ordertrax.essent.com/InventoryService/1.2.1/InventoryService.wsdl',	'1.2.1',	'',	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	1,	0),
(11,  NULL,	'BIC',	'BIC Graphic',	NULL,  NULL,	'https://services.bicgraphic.com/soa-infra/services/default/InventoryService/InventoryService?WSDL',	'https://services.bicgraphic.com/InventoryService/1.0.0/InventoryService.wsdl',	'1.0.0',	'https://services.bicgraphic.com/soa-infra/services/external/OrderStatus_v1_0_0/orderstatusService?WSDL',	'https://services.bicgraphic.com/Order StatusService/1.0.0/Order StatusService.wsdl',	'1.0.0',	'',	'',	'',	'https://services.bicgraphic.com/soa-infra/services/external/OrderShipmentNotificationService/OrderShipmentNotificationService?WSDL',	'1.0.0',	'https://services.bicgraphic.com/Order Shipment NotificationService/1.0.0/Order Shipment NotificationService.wsdl',	'',	'',	'',	1,	1),
(12,  NULL,	'bob',	'Bob Levitt Company',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(13,	NULL,	'boundless',	'Boundless Network',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(14,	NULL,	'Bright',	'Bright Stores',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(15,	NULL,	'CAP',	'Cap America',	NULL,  NULL,	'http://capamericawcf.cwwws.com/WSDL/InventoryService.wsdl',	'http://capamericawcf.cwwws.com/InventoryService/1.0.0/InventoryService.wsdl',	'1.0.0',	'',	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	1,	0),
(16,	NULL,	'CSKU',	'CommonSku',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(17,	NULL,	'Crown',	'Crown Products',	NULL, NULL,	'https://webapi.crownprod.com:449/ws/inventory?WSDL',	'http://webapi.crownprod.com/InventoryService/1.2.1/InventoryService.wsdl',	'1.2.1',	'https://webapi.crownprod.com:449/ws/orderstatus?WSDL',	'http://webapi.crownprod.com/Order StatusService/1.0.0/Order StatusService.wsdl',	'1.0.0',	'',	'',	'',	'https://webapi.crownprod.com:449/ws/shipnotice?WSDL',	'1.0.0',	'http://webapi.crownprod.com/Order Shipment NotificationService/1.0.0/Order Shipment NotificationService.wsdl',	'',	'',	'',	0,	1),
(18,	NULL,	'Cutter',	'Cutter & Buck',	NULL,	NULL,	'http://www.cbcorporate.com/wmtsiteclient/webservices/inventoryservice.asmx',	'http://www.cbcorporate.com/InventoryService/1.2.1/InventoryService.wsdl',	'1.2.1',	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(19,	NULL,	'CUTTINGEDGE',	'Cutting Edge Promotions',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(20,	NULL,	'DOY',	'Designs On You',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(21,	NULL,	'DC',	'Distributor Central',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(22,	NULL,	'EVANS',	'Evans Manufacturing',	NULL,    NULL,	'https://services.evans-mfg.com/InventoryWebService/inventoryService.svc?wsdl',	'https://services.evans-mfg.com/InventoryService/1.0.0/InventoryService.wsdl',	'1.0.0',	'https://services.evans-mfg.com/SalesOrderWebService/OrderStatusService.svc?wsdl',	'https://services.evans-mfg.com/Order StatusService/1.0.0/Order StatusService.wsdl',	'1.0.0',	'',	'',	'',	'',	'',	'',	'',	'',	'',	1,	1),
(23,	NULL,	'FAC',	'Facilis',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(24,	NULL,	'fields',	'Fields Manufacturing',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(25,	NULL,	'Gary',	'Garyline',	NULL,    NULL,	'http://webapi.garyline.com/api/inventory/WSDL/InventoryService.wsdl',	'http://services.garyline.com/InventoryService/1.2.1/InventoryService.wsdl',	'1.2.1',	'http://webapi.garyline.com/orderstatusv1.0.0/OrderStatusService.svc?wsdl',	'http://webapi.garyline.com/orderstatusv1.0.0/OrderStatusService.svc?wsdl',	'1.0.0',	'',	'',	'',	'http://webapi.garyline.com/ordershipment/service1.svc?wsdl',	'1.0.0',	'http://webapi.garyline.com/ordershipment/WSDL/OrderShipmentNotificationService.wsdl',	'',	'',	'',	0,	1),
(26,	NULL,	'Gateway',	'Gateway CDI',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(27,	NULL,	'Geiger',	'Geiger',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(28,	NULL,	'GEM',	'Gemline',	NULL, NULL,	'https://wsp.gemline.com/GemlineWebService/Inventory/v1/wsdl/InventoryService.wsdl',	'https://wsp.gemline.com/InventoryService/1.2.1/InventoryService.wsdl',	'1.2.1',	'https://wsp.gemline.com/GemlineWebService/OrderStatus/v1/wsdl/OrderStatusService.wsdl',	'https://wsp.gemline.com/Order StatusService/1.0.0/Order StatusService.wsdl',	'1.0.0',	'',	'',	'',	'https://wsp.gemline.com/GemlineWebService/OrderShipmentNotification/v1/wsdl/OrderShipmentNotificationService.wsdl',	'1.0.0',	'https://wsp.gemline.com/Order Shipment NotificationService/1.0.0/Order Shipment NotificationService.wsdl',	'',	'',	'',	1,	1),
(29,	NULL,	'Gold',	'Gold Bond World Wide',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(31,	NULL,	'Gordon',	'Gordon Sinclair',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(32,	NULL,	'Halo',	'Halo',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(33,	NULL,	'HIT',	'HIT Promotional Products',	NULL, NULL,	'https://ppds.hitpromo.net/inventory',	'https://ppds.hitpromo.net/InventoryService/1.2.1/InventoryService.wsdl',	'1.2.1',	'https://ppds.hitpromo.net/orderStatus',	'https://ppds.hitpromo.net/Order StatusService/1.0.0/Order StatusService.wsdl',	'1.0.0',	'https://ppds.hitpromo.net/productData',	'https://ppds.hitpromo.net/Product DataService/1.0.0/Product DataService.wsdl',	'1.0.0',	'https://ppds.hitpromo.net/orderShipmentNotification',	'1.0.0',	'https://ppds.hitpromo.net/Order Shipment NotificationService/1.0.0/Order Shipment NotificationService.wsdl',	'https://ppds.hitpromo.net/productMedia',	'1.0.0',	'https://ppds.hitpromo.net/Media ContentService/1.0.0/Media ContentService.wsdl',	1,	1),
(34,	NULL,	'Hub',	'Hub Pen',	NULL,  NULL,	'http://services.hubpen.biz/PromoStandardsInventoryService/wsdl/InventoryService.wsdl',	'http://services.hubpen.biz/InventoryService/1.2.1/InventoryService.wsdl',	'1.2.1',	'http://services.hubpen.biz/PromoStandardsOrderStatusService/wsdl/OrderStatusService.wsdl',	'http://services.hubpen.biz/Order StatusService/1.0.0/Order StatusService.wsdl',	'1.0.0',	'',	'',	'',	'http://services.hubpen.biz/PromoStandardsOrderShipNotification/wsdl/OrderShipmentNotificationService.wsdl',	'1.0.0',	'http://services.hubpen.biz/PromoStandardsOrderShipNotification/wsdl/OrderShipmentNotificationService.wsdl',	'',	'',	'',	1,	1),
(35,	NULL,	'InDepth',	'Indepth Graphics',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(36,	NULL,	'JET',	'Jetline',	NULL,  NULL,	'https://api.jetlinepromo.com/soap/WSDL/1.0.0/InventoryService.wsdl',	'https://api.jetlinepromo.com/InventoryService/1.2.1/InventoryService.wsdl',	'1.2.1',	'https://api.jetlinepromo.com/orderstatus/WSDL/1.0.0/OrderStatusService.wsdl',	'https://api.jetlinepromo.com/Order StatusService/1.0.0/Order StatusService.wsdl',	'1.0.0',	'',	'',	'',	'https://api.jetlinepromo.com/ordershipmentnotification/WSDL/1.0.0/OrderShipmentNotificationService.wsdl',	'1.0.0',	'https://api.jetlinepromo.com/ordershipmentnotification/WSDL/1.0.0/OrderShipmentNotificationService.wsdl',	'',	'',	'',	1,	1),
(37,	NULL,	'KB',	'Kaeser & Blair',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(38,	NULL,	'LANCO',	'Lanco',	NULL,  NULL,	'http://services.lancopromo.com/inventory/InventoryService.wsdl',	'http://services.lancopromo.com/InventoryService/1.2.1/InventoryService.wsdl',	'1.2.1',	'',	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	1,	0),
(39,	NULL,	'LMRK',	'Logomark',	NULL, NULL,	'https://psapi.logomark.com/Inventory/WSDL/1.2.1/InventoryService/InventoryService.wsdl',	'https://psapi.logomark.com/InventoryService/1.2.1/InventoryService.wsdl',	'1.2.1',	'https://psorderstatus.logomark.com/WSDL/1.0.0/OrderStatusService/OrderStatusService.wsdl',	'https://psorderstatus.logomark.com/Order StatusService/1.0.0/Order StatusService.wsdl',	'1.0.0',	'',	'',	'',	'https://psapi.logomark.com/OrderShipmentNotification/WSDL/v1_0_0/OrderShipmentNotificationService.wsdl',	'1.0.0',	'https://psapi.logomark.com/Order Shipment NotificationService/1.0.0/Order Shipment NotificationService.wsdl',	'',	'',	'',	1,	1),
(40,	NULL,	'MAG',	'Magnet LLC',	NULL,   NULL,	'https://api.themagnetgroup.com/inventory/InventoryService.svc?wsdl',	'https://api.themagnetgroup.com/InventoryService/1.2.1/InventoryService.wsdl',	'1.2.1',	'https://api.themagnetgroup.com/orderstatus/PSOrderStatusService.svc?wsdl',	'https://api.themagnetgroup.com/Order StatusService/1.0.0/Order StatusService.wsdl',	'1.0.0',	'',	'',	'',	'',	'1.0.0',	':///Order Shipment NotificationService/1.0.0/Order Shipment NotificationService.wsdl',	'',	'',	'',	1,	1),
(41,	NULL,	'MD',	'Meyer Dunlap',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(42,	NULL,	'Glass',	'Moderne Glass',	NULL,  NULL,	'http://servicesproxy.glassamerica.com/wsdl/InventoryService.wsdl',	'http://servicesproxy.glassamerica.com/InventoryService/1.0.0/InventoryService.wsdl',	'1.0.0',	'',	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	1,	0),
(43,	NULL,	'Myron',	'Myron',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(44,	NULL,	'NA',	'Not Listed',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(46,	NULL,	'Peerless',	'Peerless Umbrella',	NULL,	NULL,	'http://www.peerlessumbrellamedia.com/WS/inventory.php',	'http://www.peerlessumbrellamedia.com/InventoryService/1.2.1/InventoryService.wsdl',	'1.2.1',	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(47,	NULL,	'PIN',	'Pinnacle Promotions',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(48,	NULL,	'PRIME',	'Primeline',	NULL,	NULL,	'http://services.primeline.com/PS/inv/InventoryService.svc',	'http://services.primeline.com/InventoryService/1.2.1/InventoryService.wsdl',	'1.2.1',	'http://services.primeline.com/PS/ordStatus/orderstatusservice.svc',	'http://services.primeline.com/Order StatusService/1.0.0/Order StatusService.wsdl',	'1.0.0',	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(49,	NULL,	'promoshop',	'Promo Shop',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(50,	NULL,	'PWS',	'PWS',	NULL,	NULL,	'https://A0FB37F3-C7AE-11D3-896A-00105A7027AA.ps.ppapi.io/DCInventoryService.svc?wsdl',	'https://A0FB37F3-C7AE-11D3-896A-00105A7027AA.ps.ppapi.io/InventoryService/1.2.1/InventoryService.wsdl',	'1.2.1',	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(51,	NULL,	'SanMar',	'SanMar',	NULL,    NULL,	'https://ws.sanmar.com:8080/promostandards/InventoryServiceBinding?wsdl',	'http://ws.sanmar.com/InventoryService/1.2.1/InventoryService.wsdl',	'1.2.1',	'',	NULL,	NULL,	'',	'',	'',	'https://ws.sanmar.com:8080/promostandards/OrderShipmentNotificationServiceBinding?wsdl',	'1.0.0',	'https://ws.sanmar.com:8080/promostandards/OrderShipmentNotificationServiceBinding?wsdl',	'',	'',	'',	1,	1),
(52,	NULL,	'seville',	'Seville Gear',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(53,	NULL,	'sign',	'Sign-Zone',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(54,	NULL,	'Southern',	'Southern Plus',	NULL,	NULL,	'http://inventory.southernplus.com:8080/CustomerInventoryService.svc',	'http://inventory.southernplus.com/InventoryService/1.0.0/InventoryService.wsdl',	'1.0.0',	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(55,	NULL,	'STAR',	'Starline',	NULL,    NULL,	'https://services.starline.com/InventoryService/WSDL/1.0.0/InventoryService.wsdl',	'https://services.starline.com/InventoryService/1.2.1/InventoryService.wsdl',	'1.2.1',	'https://services.starline.com/OrderStatusService/WSDL/1.0.0/OrderStatusService.wsdl',	'https://services.starline.com/orderstatusservice/CustomerOrderStatusService.svc',	'1.0.0',	'https://services.starline.com/OrderShipmentNotificationService/WSDL/1.0.0/OrderShipmentNotificationService.wsdl',	'https://services.starline.com/Product DataService/1.0.0/Product DataService.wsdl',	'1.0.0',	'https://services.starline.com/OrderShipmentNotificationService/CustomerOrderShipmentNotificationService.svc',	'1.0.0',	'https://services.starline.com/Order Shipment NotificationService/1.0.0/Order Shipment NotificationService.wsdl',	'http://services.starline.com/MediaContentService/MediaContentService.svc',	'1.0.0',	'http://services.starline.com/Media ContentService/1.0.0/Media ContentService.wsdl',	1,	1),
(56,	NULL,	'Summit',	'Summit Group',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(57,	NULL,	'Sun',	'Sunscope',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(58,	NULL,	'suntext',	'Suntex',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(59,	NULL,	'Sweda',	'Sweda',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(60,	NULL,	'tag',	'Tagmaster',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(61,	NULL,	'Target',	'Target Marketing',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(62,	NULL,	'TeeShirt',	'Tee Shirt Bakery',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(63,	NULL,	'vantage',	'Vantage Apparel',	NULL,  NULL,	'http://brandedpromoapparel.com/WebServices/WSDL/InventoryService.wsdl',	'http://brandedpromoapparel.com/InventoryService/1.2.1/InventoryService.wsdl',	'1.2.1',	'http://brandedpromoapparel.com/WebServices/WSDL/OrderStatusService.wsdl',	'http://brandedpromoapparel.com/Order StatusService/1.0.0/Order StatusService.wsdl',	'1.0.0',	'',	'',	'',	'',	'',	'',	'',	'',	'',	1,	1),
(64,	NULL,	'Vernon',	'Vernon',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(65,	NULL,	'Jag',	'Web Jaguar',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(66,	NULL,	'WOW',	'WOWLine',	NULL,  NULL,	'https://api.wowline.com/WSDL/InventoryService.wsdl',	'https://api.wowline.com/InventoryService/1.0.0/InventoryService.wsdl',	'1.0.0',	'',	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	1,	0),
(67,	NULL,	'ZOOM',	'Zoom Catalog',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(68,	NULL,	'4AllPromos',	'4AllPromos',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(69,	NULL,	'ASI',	'Advertising Specialty Institute (ASI)',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(70,	NULL,	'Apli',	'Alpi',	NULL,	NULL,	'http://a0fb3a88-c7ae-11d3-896a-00105a7027aa.dcinventory.com/DCInventoryService.svc',	'http://a0fb3a88-c7ae-11d3-896a-00105a7027aa.dcinventory.com/InventoryService/1.2.1/InventoryService.wsdl',	'1.2.1',	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(71,	NULL,	'Antera',	'Antera Software',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(72,	NULL,	'Athena',	'Athena Promo',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(73,	NULL,	'ACC',	'Atlantic Coast Cotton',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(74,	NULL,	'augusta',	'Augusta Sportswear',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(75,	NULL,	'Brilliant',	'Brilliant Marketing Ideas',	NULL,	NULL,	'https://A0FB3AA4-C7AE-11D3-896A-00105A7027AA.ps.ppapi.io/DCInventoryService.svc?wsdl',	'https://A0FB3AA4-C7AE-11D3-896A-00105A7027AA.ps.ppapi.io/InventoryService/1.2.1/InventoryService.wsdl',	'1.2.1',	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(76,	NULL,	'Charles',	'Charles River Apparel',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(77,	NULL,	'deco',	'DecoNetwork',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(78,	NULL,	'Deluxe',	'Deluxe',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(79,	NULL,	'dunbrooke',	'Dunbrooke',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(80,	NULL,	'ecompanystore',	'ecompanystore',	NULL,	NULL,	'https://epic.picbusiness.com/7529/Utilities/API/InventoryService/index.pic\\',	'https://epic.picbusiness.com/InventoryService/1.2.1/InventoryService.wsdl',	'1.2.1',	'https://epic.picbusiness.com/7529/Utilities/API/OrderStatus/index.pic\\',	'https://epic.picbusiness.com/Order StatusService/1.0.0/Order StatusService.wsdl',	'1.0.0',	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(81,	NULL,	'epromo',	'epromos',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(82,	NULL,	'Essent',	'Essent',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(83,	NULL,	'fan',	'Fanfare Promotions',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(84,	NULL,	'baystate',	'Bay State',	NULL,   NULL,	'https://service.baystate.com/BayStateInventoryService.svc?wsdl',	'https://service.baystate.com/BayStateInventoryService.svc?wsdl',	'1.2.1',	'https://service.baystate.com/BayStateOrderStatusService.svc?wsdl',	'https://service.baystate.com/BayStateOrderStatusService.svc?wsdl',	'1.0.0',	'',	'',	'',	'https://service.baystate.com/BayStateOrderShipmentService.svc?wsdl',	'1.0.0',	'https://service.baystate.com/BayStateOrderShipmentService.svc?wsdl',	'https://service.baystate.com/BayStateMediaContentService.svc?wsdl',	'1.0.0',	'https://service.baystate.com/BayStateMediaContentService.svc?wsdl',	1,	1),
(85,	NULL,	'Gill',	'Gill Line',	NULL,   NULL,	'https://wspub02.gill-line.com/Inventory.svc?wsdl',	'https://wspub.gill-line.com/InventoryService/1.0.0/InventoryService.wsdl',	'1.0.0',	'https://wspub02.gill-line.com/OrderStatus.svc?wsdl',	NULL,	'1.0.0',	'',	'',	'',	'https://wspub02.gill-line.com/ShippingNotification.svc?wsdl',	'1.0.0',	'',	'',	'',	'',	1,	1),
(86,	NULL,	'mints',	'Hospitality Mints',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(87,	NULL,	'ink',	'Inkhead',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(88,	NULL,	'Inksoft',	'Inksoft',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(89,	NULL,	'iPROMOTEu',	'iPROMOTEu',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(90,	NULL,	'kotis',	'Kotisdesign',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(91,	NULL,	'mccabe',	'McCabe Promotional',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(92,	NULL,	'ping',	'Pingline',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(93,	NULL,	'promolocker',	'Promolocker',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(94,	NULL,	'Stadium',	'PromoStadium',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(95,	NULL,	'PConsult',	'Promotional Consultants',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(96,	NULL,	'gpromo',	'Promotional Gifts USA',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(97,	NULL,	'SS',	'S&S Activewear',	NULL,    NULL,	'https://promostandards.ssactivewear.com/Inventory/v1/WSDL/InventoryService.wsdl',	'https://promostandards.ssactivewear.com/InventoryService/1.2.1/InventoryService.wsdl',	'1.2.1',	'https://promostandards.ssactivewear.com/orderstatus/v1/wsdl/orderstatusservice.wsdl',	'https://promostandards.ssactivewear.com/OrderStatus/v1/OrderStatusService.svc',	'1.0.0',	'https://promostandards.ssactivewear.com/productdata/v1/wsdl/productdataservice.wsdl',	'https://promostandards.ssactivewear.com/Product DataService/1.0.0/Product DataService.wsdl',	'1.0.0',	'https://promostandards.ssactivewear.com/ordershipmentnotification/v1/wsdl/ordershipmentnotificationservice.wsdl',	'1.0.0',	'https://promostandards.ssactivewear.com/Order Shipment NotificationService/1.0.0/Order Shipment NotificationService.wsdl',	'',	'',	'',	1,	1),
(98,	NULL,	'snugz',	'Snugz',	NULL,  NULL,	'https://api.snugzusa.com:7443/SnugzWcf_Inventory/InventoryService.wsdl',	'https://api.snugzusa.com/InventoryService/1.0.0/InventoryService.wsdl',	'1.0.0',	'https://api.snugzusa.com:7443/SnugzWcf_OrderStatus/OrderStatusService.wsdl',	'https://api.snugzusa.com/Order StatusService/1.0.0/Order StatusService.wsdl',	'1.0.0',	'',	'',	'',	'https://api.snugzusa.com:7443/SnugzWcf_ShipStatus/OrderShipmentNotificationService.wsdl',	'1.0.0',	'https://api.snugzusa.com/Order Shipment NotificationService/1.0.0/Order Shipment NotificationService.wsdl',	'',	'',	'',	1,	0),
(99,	NULL,	'StInk',	'Standard Ink',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(100,	NULL,	'Trade',	'Trademarks',	NULL,	NULL,	'https://2fc923ff-a906-11d3-8967-00105a7027aa.ps.ppapi.io/DCInventoryService.svc?wsdl',	'https://2fc923ff-a906-11d3-8967-00105a7027aa.ps.ppapi.io/InventoryService/1.2.1/InventoryService.wsdl',	'1.2.1',	'https://2FC923FF-A906-11D3-8967-00105A7027AA.ps.ppapi.io/DCOrderStatusService.svc?wsdl',	'https://2FC923FF-A906-11D3-8967-00105A7027AA.ps.ppapi.io/Order StatusService/1.0.0/Order StatusService.wsdl',	'1.0.0',	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(101,	NULL,	'Tri',	'Tri-Mountain',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(102,	NULL,	'xebra',	'xebra',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(104,	NULL,	'1DayPromos',	'1 Day Promos',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(107,	NULL,	'Aakron',	'Aakron Line',	NULL,  NULL,	'https://services.aakronline.com/inventoryservice/Inventoryservice.svc?wsdl',	'https://services.aakronline.com/inventoryservice/Inventoryservice.svc?wsdl',	'1.2.1',	'https://services.aakronline.com/OrderStatusService/OrderStatusService.svc?wsdl',	'https://services.aakronline.com/OrderStatusService/OrderStatusService.svc?wsdl',	'1.0.0',	'',	'',	'',	'https://services.aakronline.com/OrderShipmentNotificationService/OrderShipmentNotificationService.svc?wsdl',	'1.0.0',	'https://services.aakronline.com/OrderShipmentNotificationService/OrderShipmentNotificationService.svc?wsdl',	'',	'',	'',	0,	1),
(110,	NULL,	'HiCaliber',	'Calibre International',	NULL, NULL,	'http://208.82.136.120/API/InventoryService/WSDL/InventoryService.wsdl',	'http://216.174.118.142/InventoryService/1.2.1/InventoryService.wsdl',	'1.2.1',	'http://208.82.136.120/API/OrderStatusService/WSDL/OrderStatusService.wsdl',	'http://216.174.118.142/Order StatusService/1.0.0/Order StatusService.wsdl',	'1.0.0',	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(113,	NULL,	'Compass',	'Compass',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(116,	NULL,	'create',	'CreateCo',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(119,	NULL,	'sam',	'eXtendTech',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(122,	NULL,	'Gempire',	'Gempire',	NULL,   NULL,	'http://gempirewcf.cwwws.com/WSDL/InventoryService.wsdl',	'http://gempirewcf.cwwws.com/InventoryService/1.0.0/InventoryService.wsdl',	'1.0.0',	'',	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(125,	NULL,	'iClick',	'iClick',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(128,	NULL,	'Imagen',	'Imagen Brands',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(131,	NULL,	'JMA',	'JMA Logos',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(134,	NULL,	'keystone',	'Keystone',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(137,	NULL,	'LogoExpressions',	'Logo Expressions',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(140,	NULL,	'Motivators',	'Motivators',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(143,	NULL,	'Pens',	'National Pen',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(146,	NULL,	'OMNI',	'Omni/Zorrel',	NULL,	NULL,	'http://17D8A274-20C7-49AC-B08B-57D29CD57C5D.dcinventory.com/DCInventoryService.svc',	'http://17D8A274-20C7-49AC-B08B-57D29CD57C5D.dcinventory.com/InventoryService/1.2.1/InventoryService.wsdl',	'1.2.1',	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(149,	NULL,	'Straub',	'PAW Marketing',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(152,	NULL,	'Perfect',	'Perfect Imprints',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(155,	NULL,	'PIC',	'PIC Business Systems',	NULL, NULL,	'https://7529.picbusiness.com/Utilities/API/InventoryService/index.pic',	NULL,	'1.2.1',	'https://7529.picbusiness.com/Utilities/API/OrderStatus/index.pic',	'https://7529.picbusiness.com/Utilities/API/OrderStatus/index.pic\\',	'1.0.0',	'',	'',	'',	'',	'',	'',	'',	'',	'',	1,	0),
(158,	NULL,	'PlanetLogo',	'Planet Logo',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(161,	NULL,	'PromoDealer',	'Promodealer',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(164,	NULL,	'PromoEQP',	'PromoEQP',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(167,	NULL,	'PG',	'PromoGroup',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(170,	NULL,	'ProTowels',	'ProTowels',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(173,	NULL,	'Staples',	'Staples',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(176,	NULL,	'HB',	'The HB Group',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(179,	NULL,	'McGee',	'The McGee Company',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(182,	NULL,	'promodept',	'The Promotions Dept',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(185,	NULL,	'Twin',	'Twintech Industry',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(188,	NULL,	'Vitronic',	'Vitronic',	NULL,   NULL,	'https://webapi.vitronicpromotional.com/ws/inventory/?WSDL',	'https://webapi.vitronicpromotional.com/InventoryService/1.2.1/InventoryService.wsdl',	'1.2.1',	'https://webapi.vitronicpromotional.com:447/ws/orderstatus/?WSDL',	'https://webapi.vitronicpromotional.com/Order StatusService/1.0.0/Order StatusService.wsdl',	'1.0.0',	'',	'',	'',	'https://webapi.vitronicpromotional.com:447/ws/shipnotice/?WSDL',	'1.0.0',	'https://webapi.vitronicpromotional.com/Order Shipment NotificationService/1.0.0/Order Shipment NotificationService.wsdl',	'',	'',	'',	1,	1),
(191,	NULL,	'Whoop',	'WhoopTee',	NULL,	NULL,	'',	'',	'1.2.1',	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(194,	NULL,	'WC',	'Windy City Novelties',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(197,	NULL,	'Winning',	'Winning Streak',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(224,	NULL,	'NOR',	'Norwood',	NULL, NULL,	'https://services.bicgraphic.com/soa-infra/services/default/InventoryService/InventoryService?WSDL',	'https://services.bicgraphic.com/InventoryService/1.0.0/InventoryService.wsdl',	'1.0.0',	'https://services.bicgraphic.com/soa-infra/services/external/OrderStatus_v1_0_0/orderstatusService?WSDL',	'https://services.bicgraphic.com/Order StatusService/1.0.0/Order StatusService.wsdl',	'1.0.0',	'',	'',	'',	'https://services.bicgraphic.com/soa-infra/services/external/OrderShipmentNotificationService/OrderShipmentNotificationService?WSDL',	'1.0.0',	'https://services.bicgraphic.com/Order Shipment NotificationService/1.0.0/Order Shipment NotificationService.wsdl',	'',	'',	'',	1,	1),
(230,	NULL,	'TPH',	'Triumph',	NULL, NULL,	'https://services.bicgraphic.com/soa-infra/services/default/InventoryService/InventoryService?WSDL',	'https://services.bicgraphic.com/InventoryService/1.0.0/InventoryService.wsdl',	'1.0.0',	'https://services.bicgraphic.com/soa-infra/services/external/OrderStatus_v1_0_0/orderstatusService?WSDL',	'https://services.bicgraphic.com/Order StatusService/1.0.0/Order StatusService.wsdl',	'1.0.0',	'',	'',	'',	'https://services.bicgraphic.com/soa-infra/services/external/OrderShipmentNotificationService/OrderShipmentNotificationService?WSDL',	'1.0.0',	'https://services.bicgraphic.com/Order Shipment NotificationService/1.0.0/Order Shipment NotificationService.wsdl',	'',	'',	'',	1,	1),
(239,	NULL,	'vantage2',	'Vantage Apparel',	NULL,    NULL,	'http://brandedpromoapparel.com/WebServices/WSDL/InventoryService.wsdl',	'http://brandedpromoapparel.com/InventoryService/1.2.1/InventoryService.wsdl',	'1.2.1',	'http://brandedpromoapparel.com/WebServices/WSDL/OrderStatusService.wsdl',	'http://brandedpromoapparel.com/Order StatusService/1.0.0/Order StatusService.wsdl',	'1.0.0',	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0),
(242,	NULL,	'PCNA',	'PCNA(Leeds/Bullet/Trimark)',	NULL,   NULL,	'https://gateway.pcna.com/psInventory/v121/InventoryService.svc?wsdl',	'https://gateway.pcna.com/psInventory/v121/',	'1.2.1',	'https://gateway.pcna.com/psOrderStatus/v100/OrderStatus.svc?wsdl',	'https://gateway.pcna.com/psOrderStatus/v100/',	'1.0.0',	'https://gateway.pcna.com/psProductData/v100/ProductData.svc?wsdl',	'https://gateway.pcna.com/psProductData/v100/',	'1.0.0',	'https://gateway.pcna.com/psOsn/v100/Osn.svc?wsdl',	'1.0.0',	'https://gateway.pcna.com/psOsn/v100/',	'https://gateway.pcna.com/psMediaContent/v100/MediaContentService.svc?wsdl',	'1.0.0',	'https://gateway.pcna.com/psMediaContent/v100/',	1,	1),
(257,	NULL,	'edwards',	'Edwards Garment',	NULL, NULL,	'https://7529.picbusiness.com/Utilities/API/InventoryService/index.pic',	NULL,	'1.2.1',	'https://7529.picbusiness.com/Utilities/API/OrderStatus/index.pic',	'https://7529.picbusiness.com/Utilities/API/OrderStatus/index.pic\\',	'1.0.0',	'',	'',	'',	'',	'',	'',	'',	'',	'',	1,	1);