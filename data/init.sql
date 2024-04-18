CREATE DATABASE IF NOT EXISTS beansdb;
# dump query
USE beansdb;
CREATE TABLE IF NOT EXISTS products (
                          id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                          productName VARCHAR(30) NOT NULL,
                          productDesc VARCHAR(50) NOT NULL,
                          productAge VARCHAR(3) NOT NULL,
                          productVendor VARCHAR(30) NOT NULL,
                          productPrice VARCHAR(10) NOT NULL
);

CREATE TABLE IF NOT EXISTS users (
    userID INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(30) NOT NULL,
    email VARCHAR(50) NOT NULL,
    phoneNum VARCHAR(20) NOT NULL,
    isAdmin BOOLEAN
);

CREATE TABLE IF NOT EXISTS paymentInfo (
    cardNumber INT(16) PRIMARY KEY
);

