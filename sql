CREATE DATABASE furniture_db; 

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(50),
    lastname VARCHAR(50),
    username VARCHAR(50),
    email VARCHAR(100),
    role TINYINT CHECK (role IN (1, 2, 3)),
    password VARCHAR(255),
    repassword VARCHAR(255),
    phonenumber VARCHAR(20),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
