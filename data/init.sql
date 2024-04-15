USE beansdb;
CREATE TABLE IF NOT EXISTS products (
                          id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                          productName VARCHAR(30) NOT NULL,
                          productDesc VARCHAR(50) NOT NULL,
                          productAge VARCHAR(3) NOT NULL,
                          productVendor VARCHAR(30),
                          productPrice VARCHAR(10)
);

CREATE TABLE IF NOT EXISTS users (
    id INT(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(30) NOT NULL
);