-- database.sql
-- Run this in phpMyAdmin or your MySQL client to set up the database

CREATE DATABASE IF NOT EXISTS abrovia_db_2;
USE abrovia_db_2;

-- 1. Users Table (Authentication)
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    role ENUM('user', 'admin') DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 2. Applications Table (User Applications)
CREATE TABLE IF NOT EXISTS applications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    university_name VARCHAR(255) NOT NULL,
    program_name VARCHAR(255) NOT NULL,
    status ENUM('pending', 'accepted', 'rejected', 'in_progress') DEFAULT 'pending',
    applied_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- 3. Notifications Table (User Notifications)
CREATE TABLE IF NOT EXISTS notifications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    message TEXT NOT NULL,
    is_read BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- 4. Scholarships Table
CREATE TABLE IF NOT EXISTS scholarships (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    provider VARCHAR(255) NOT NULL,
    amount VARCHAR(100),
    deadline DATE,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert a default admin account (Password is 'admin123' hashed with BCRYPT)
-- Only use this for initial setup, then change the password
INSERT IGNORE INTO users (full_name, email, password_hash, role) VALUES 
('System Admin', 'admin@abrovia.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin');

-- 5. Saved Items Table
CREATE TABLE IF NOT EXISTS saved_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    item_type VARCHAR(50) NOT NULL,
    item_title VARCHAR(255) NOT NULL,
    item_url VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);
