CREATE DATABASE IF NOT EXISTS GPTest3;
USE GPTest3;

-- Example table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL
);

INSERT INTO users (name, email, password) VALUES
('Admin', 'admin@example.com', 'admin');
