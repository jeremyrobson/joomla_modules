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
    `status`            INT(11)         NOT NULL,
    PRIMARY KEY (`id`)
)
    ENGINE = MyISAM
    AUTO_INCREMENT = 0
    DEFAULT CHARSET = utf8;