CREATE TABLE IF NOT EXISTS `books` (
    `id` INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `author_id` INT(11) UNSIGNED NOT NULL,
    `book_title` VARCHAR(255) DEFAULT NULL,
    CONSTRAINT books_authors_fk
        FOREIGN KEY (author_id) REFERENCES authors(id)
)
    ENGINE = innodb
    AUTO_INCREMENT = 1
    CHARACTER SET utf8
    COLLATE utf8_unicode_ci;