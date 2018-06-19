DROP TABLE IF EXISTS `textio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `textio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` text DEFAULT NULL,
  `date_created` timestamp DEFAULT current_timestamp,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;