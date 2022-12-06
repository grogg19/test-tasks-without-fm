ALTER TABLE customers
    ADD CONSTRAINT customers_genders_fk
        FOREIGN KEY (gender_id) REFERENCES genders(code);