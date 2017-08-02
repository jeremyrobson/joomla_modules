DROP TABLE IF EXISTS `#__booklist`;

CREATE TABLE `#__booklist` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `cover_image_url` VARCHAR(255),
    `url` VARCHAR(255),
    `title` VARCHAR(255),
    `edition` VARCHAR(255),
    `publish_year` INT(4),
    `authors` VARCHAR(255),
    PRIMARY KEY (`id`)
)
    ENGINE = MyISAM
    AUTO_INCREMENT = 0
    DEFAULT CHARSET = utf8;

INSERT INTO `#__booklist` (`cover_image_url`,`url`,`title`,`edition`,`publish_year`,`authors`) VALUES
('#','#',"Test Book","First Edition","2017","Jeremy Robson");