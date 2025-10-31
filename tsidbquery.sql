DROP DATABASE IF EXISTS tsidb_Registration;
CREATE DATABASE tsidb_Registration;
USE tsidb_Registration;
CREATE TABLE tsi_User_Registrations
(
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    user_name VARCHAR(255) NOT NULL,
    user_email VARCHAR(255) NOT NULL UNIQUE,
    user_password VARCHAR(255) UNIQUE,
    pwd_confirm VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);