CREATE TABLE IF NOT EXISTS `authors` (
    `id` INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `last_name` VARCHAR(255) NOT NULL,
    `first_name` VARCHAR(255) NOT NULL,
    `second_name` VARCHAR(255) NOT NULL
)
    ENGINE = innodb
    AUTO_INCREMENT = 1
    CHARACTER SET utf8
    COLLATE utf8_unicode_ci;