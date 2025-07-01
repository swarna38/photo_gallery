
-- check database EXISTS or not 
-- create database 

CREATE DATABASE IF NOT EXISTS photo_gallery;

use photo_gallery;

-- table create 
CREATE TABLE images (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    filename VARCHAR(255) NOT NULL,
    upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

