CREATE DATABASE online_seed_marketplace;

USE online_seed_marketplace;

CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    phone_number VARCHAR(20),
    address TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE seeds (
    seed_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    category VARCHAR(50),
    price DECIMAL(10, 2) NOT NULL,
    season VARCHAR(50),
    soil_condition VARCHAR(50),
    description TEXT,
    image_url VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE seed_varieties (
    variety_id INT AUTO_INCREMENT PRIMARY KEY,
    seed_id INT,
    variety_name VARCHAR(100),
    FOREIGN KEY (seed_id) REFERENCES seeds(seed_id) ON DELETE CASCADE
);

CREATE TABLE seed_climatic_requirements (
    requirement_id INT AUTO_INCREMENT PRIMARY KEY,
    seed_id INT,
    description TEXT,
    FOREIGN KEY (seed_id) REFERENCES seeds(seed_id) ON DELETE CASCADE
);

CREATE TABLE seed_soil_requirements (
    requirement_id INT AUTO_INCREMENT PRIMARY KEY,
    seed_id INT,
    description TEXT,
    FOREIGN KEY (seed_id) REFERENCES seeds(seed_id) ON DELETE CASCADE
);

CREATE TABLE seed_planting_instructions (
    instruction_id INT AUTO_INCREMENT PRIMARY KEY,
    seed_id INT,
    description TEXT,
    FOREIGN KEY (seed_id) REFERENCES seeds(seed_id) ON DELETE CASCADE
);

CREATE TABLE seed_fertilizer_application (
    application_id INT AUTO_INCREMENT PRIMARY KEY,
    seed_id INT,
    fertilizer_name VARCHAR(100),
    basal_kg_per_hectare DECIMAL(10, 2),
    top_dressing_kg_per_hectare DECIMAL(10, 2),
    timing_of_application VARCHAR(100),
    FOREIGN KEY (seed_id) REFERENCES seeds(seed_id) ON DELETE CASCADE
);

CREATE TABLE farmer_preferences (
    preference_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    season VARCHAR(50),
    land_area DECIMAL(10, 2),
    location VARCHAR(100),
    soil_condition VARCHAR(50),
    crop_type VARCHAR(50),
    quantity DECIMAL(10, 2),
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
);

CREATE TABLE orders (
    order_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    total_amount DECIMAL(10, 2),
    status VARCHAR(50),
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
);

CREATE TABLE order_items (
    order_item_id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT,
    seed_id INT,
    quantity DECIMAL(10, 2),
    price DECIMAL(10, 2),
    total_price DECIMAL(10, 2),
    FOREIGN KEY (order_id) REFERENCES orders(order_id) ON DELETE CASCADE,
    FOREIGN KEY (seed_id) REFERENCES seeds(seed_id) ON DELETE CASCADE
);
