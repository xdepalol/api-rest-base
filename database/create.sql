CREATE DATABASE api_rest_base CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER 'apiuser'@'localhost' IDENTIFIED BY 'qGsuYZnP44CoLb';
GRANT ALL PRIVILEGES ON api_rest_base.* TO 'apiuser'@'localhost';
FLUSH PRIVILEGES;

USE  api_rest_base;

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO products (name, price)
VALUES
    ('Wireless Mouse', 19.99),
    ('Mechanical Keyboard', 79.50),
    ('USB-C Charger', 24.90),
    ('Laptop Stand', 34.95),
    ('Noise-Cancelling Headphones', 129.99),
    ('Webcam 1080p', 49.99),
    ('Portable SSD 1TB', 89.00),
    ('Bluetooth Speaker', 39.95),
    ('Gaming Headset', 59.90),
    ('Smart LED Bulb', 12.49);