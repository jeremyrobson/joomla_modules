DROP TABLE IF EXISTS `#__registration`;

CREATE TABLE `#__registration` (
	`id`       INT(11)          NOT NULL AUTO_INCREMENT,
    `user_id`  INT(11)          NOT NULL,
	`first_name` VARCHAR(255)   NOT NULL,
	`last_name` VARCHAR(255)    NOT NULL,
	PRIMARY KEY (`id`)
)
	ENGINE =MyISAM
	AUTO_INCREMENT =0
	DEFAULT CHARSET =utf8;