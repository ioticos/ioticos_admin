
# Dump of table data
# ------------------------------------------------------------

CREATE TABLE `data` (
  `data_id` int(11) NOT NULL AUTO_INCREMENT,
  `data_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_temp` float(4,2) NOT NULL,
  `data_hum` int(3) NOT NULL,
  `data_device_sn` varchar(10) NOT NULL,
  PRIMARY KEY (`data_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table devices
# ------------------------------------------------------------

CREATE TABLE `devices` (
  `device_id` int(7) unsigned NOT NULL AUTO_INCREMENT,
  `device_user_id` int(7) DEFAULT NULL,
  `device_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `device_alias` varchar(50) DEFAULT '',
  `device_sn` int(7) DEFAULT NULL,
  `device_topic` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`device_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;






# Dump of table users
# ------------------------------------------------------------

CREATE TABLE `users` (
  `user_id` int(7) NOT NULL AUTO_INCREMENT,
  `fb_user` varchar(100) DEFAULT NULL,
  `user_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(60) NOT NULL,
  `user_image` varchar(200) NOT NULL DEFAULT 'https://cdn1.iconfinder.com/data/icons/avatars-vol-2/140/_robocop-512.png',
  `user_selected_device` int(7) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;







CREATE OR REPLACE VIEW `devices_full`
AS SELECT
   `data`.`data_id` AS `data_id`,
   `data`.`data_date` AS `data_date`,
   `data`.`data_temp` AS `data_temp`,
   `data`.`data_hum` AS `data_hum`,
   `data`.`data_device_sn` AS `data_device_sn`,
   `devices`.`device_id` AS `device_id`
FROM (`data` join `devices`) where (`devices`.`device_sn` = `data`.`data_device_sn`);
