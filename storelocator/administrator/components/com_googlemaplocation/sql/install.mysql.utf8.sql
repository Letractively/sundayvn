DROP TABLE IF EXISTS `#__gm_location`;
DROP TABLE IF EXISTS `#__gm_setting`;
DROP TABLE IF EXISTS `#__gm_type`;
DROP TABLE IF EXISTS `#__gm_zone`;
 
CREATE TABLE IF NOT EXISTS `#__gm_location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `zone_id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `postal_code` int(11) NOT NULL,
  `loc_x` varchar(255) NOT NULL,
  `loc_y` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `#__gm_setting` (
  `id` int(11) NOT NULL,
  `default_locx` varchar(255) NOT NULL,
  `default_locy` varchar(255) NOT NULL,
  `default_zoom` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

INSERT INTO `#__gm_setting` (`id`, `default_locx`, `default_locy`, `default_zoom`) VALUES
(1, '1.342612', '103.893534', 16);

CREATE TABLE IF NOT EXISTS `#__gm_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `images` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `#__gm_zone` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `loc_x` varchar(255) NOT NULL,
  `loc_y` varchar(255) NOT NULL,
  `zoom_rate` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `#__gm_location_service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `#__gm_service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service` varchar(255) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;