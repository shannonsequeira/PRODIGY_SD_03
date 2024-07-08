-- contacts.sql

CREATE DATABASE IF NOT EXISTS contact_manager;

USE contact_manager;

CREATE TABLE IF NOT EXISTS contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    email VARCHAR(100) NOT NULL
);

-- Create a trigger to enforce the maximum limit
DELIMITER //
CREATE TRIGGER before_insert_contacts
BEFORE INSERT ON contacts
FOR EACH ROW
BEGIN
    DECLARE contact_count INT;
    SELECT COUNT(*) INTO contact_count FROM contacts;
    
    IF contact_count >= 100 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Maximum number of contacts reached. Cannot add more.';
    END IF;
END;
//
DELIMITER ;
