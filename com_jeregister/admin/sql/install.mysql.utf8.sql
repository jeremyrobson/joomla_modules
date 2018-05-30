DROP TABLE IF EXISTS `#__registration`;

CREATE TABLE `#__registration` (
    `id`            INT(11)         NOT NULL AUTO_INCREMENT,
    `user_id`       INT(11)         NOT NULL,
    `json`          BLOB            NOT NULL,
    `create_date`   VARCHAR(255)    NOT NULL,
    PRIMARY KEY (`id`)
)
    ENGINE = MyISAM
    AUTO_INCREMENT = 0
    DEFAULT CHARSET = utf8;
    
DROP TABLE IF EXISTS `#__transaction`;

CREATE TABLE `#__transaction` (
    `id`                INT(11)         NOT NULL AUTO_INCREMENT,
    `user_id`           INT(11)         NOT NULL,
    `registration_id`   INT(11)         NOT NULL,
    `json`              BLOB            NOT NULL,
    `date`              DATETIME        NOT NULL,
    `status`            VARCHAR(255)    NOT NULL,
    PRIMARY KEY (`id`)
)
    ENGINE = MyISAM
    AUTO_INCREMENT = 0
    DEFAULT CHARSET = utf8;

DROP TABLE IF EXISTS `#__farm_profile`;

CREATE TABLE `#__farm_profile` (
	`id`			INT(11)		NOT NULL,
	`farm_name`		VARCHAR(255)	NOT NULL,
	`address`		VARCHAR(255)	NOT NULL,
	`city`			VARCHAR(255)	NOT NULL,
	`province`		VARCHAR(255)	NOT NULL,
	`postal_code`		VARCHAR(255)	NOT NULL,
	`contact`		VARCHAR(255)	NOT NULL,
	`telephone`		VARCHAR(255)	NOT NULL,
	`email`			VARCHAR(255)	NOT NULL,
	`website`		VARCHAR(255)	NOT NULL,
	`acres_strawberry`	INT(11)		NULL,
	`acres_raspberry`	INT(11)		NULL,
	`acres_blueberry`	INT(11)		NULL,
	`acres_fall_strawberry`	INT(11)		NULL,
	`acres_fall_raspberry`	INT(11)		NULL,
	`other_crops`		VARCHAR(255)	NULL,
	`description`		VARCHAR(255)	NULL,
	`latitude`		DECIMAL(10,8)	NOT NULL,
	`longitude`		DECIMAL(11,8)	NOT NULL,
	`facebook`		VARCHAR(255)	NULL,
	`profile_tags`			VARCHAR(255)	NULL,		
	`published`		INT(1)		NOT NULL DEFAULT 1
)
    ENGINE = MyISAM
    DEFAULT CHARSET = utf8;
