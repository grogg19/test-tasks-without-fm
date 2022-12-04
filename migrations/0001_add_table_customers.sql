CREATE TABLE IF NOT EXISTS `customers` (
    `id` INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `first_name` VARCHAR(255) NULL,
    `last_name` VARCHAR(255) NULL,
    `gender` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 – пол не указан, 1 - юноша, 2 - девушка.',
    `birth_date` timestamp NULL COMMENT 'День рождения в Unix Time Stamp.'
    )
    ENGINE = innodb
    AUTO_INCREMENT = 1
    CHARACTER SET utf8
    COLLATE utf8_unicode_ci;