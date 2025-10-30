DROP DATABASE IF EXISTS myfirstdatadase;
CREATE DATABASE myfirstdatadase;
USE myfirstdatadase;
CREATE TABLE login_system_users(
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    user_name VARCHAR(255) NOT NULL,
    user_email VARCHAR(255) NOT NULL UNIQUE,
    user_password VARCHAR(255) NOT NULL UNIQUE,
    time_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);