DROP TABLE IF EXISTS `#__booklist`;

CREATE TABLE `#__booklist` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `cover_image` VARCHAR(255),
    `content_id` INT(11),
    `title` VARCHAR(255),
    `edition` VARCHAR(255),
    `publish_year` INT(4),
    `authors` VARCHAR(255),
    `published` TINYINT(4) NOT NULL DEFAULT '1',
    PRIMARY KEY (`id`)
)
    ENGINE = MyISAM
    AUTO_INCREMENT = 0
    DEFAULT CHARSET = utf8;

INSERT INTO `#__booklist` (`cover_image`,`content_id`,`title`,`edition`,`publish_year`,`authors`) VALUES
('test.jpg',"1","Title goes here","First Edition","2017","Jeremy Robson");