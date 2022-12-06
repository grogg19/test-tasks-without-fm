CREATE TABLE IF NOT EXISTS `owners` (
    `id` INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `customer_id` INT(11) UNSIGNED NOT NULL,
    `book_id` INT(11) UNSIGNED NOT NULL,
    CONSTRAINT owners_customers_fk
        FOREIGN KEY (customer_id) REFERENCES customers(id),
    CONSTRAINT owners_books_fk
        FOREIGN KEY (book_id) REFERENCES books(id)
)
    ENGINE = innodb
    AUTO_INCREMENT = 1
    CHARACTER SET utf8
    COLLATE utf8_unicode_ci;