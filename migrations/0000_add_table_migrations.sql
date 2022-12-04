CREATE TABLE IF NOT EXISTS `migrations` (
    `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` varchar(255) NOT NULL ,
    `created` timestamp DEFAULT current_timestamp
    )
    ENGINE = innodb
    AUTO_INCREMENT = 1
    CHARACTER SET utf8
    COLLATE utf8_unicode_ci;