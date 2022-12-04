CREATE TABLE IF NOT EXISTS `books` (
    `id` INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `customer_id` INT(11) NOT NULL,
    `author_id`  INT(11) NOT NULL,
    `book_title` VARCHAR(255) DEFAULT NULL
    )
    ENGINE = innodb
    AUTO_INCREMENT = 1
    CHARACTER SET utf8
    COLLATE utf8_unicode_ci;