CREATE TABLE IF NOT EXISTS `genders` (
    `id` int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `code` tinyint(1) UNIQUE NOT NULL,
    `description` varchar(100) NOT NULL
)
    ENGINE = innodb
    AUTO_INCREMENT = 1
    CHARACTER SET utf8
    COLLATE utf8_unicode_ci;