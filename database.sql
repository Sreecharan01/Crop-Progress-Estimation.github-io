CREATE DATABASE IF NOT EXISTS crop_estimation;
USE crop_estimation;

CREATE TABLE IF NOT EXISTS crops (
    id INT AUTO_INCREMENT PRIMARY KEY,
    crop_name VARCHAR(255) NOT NULL,
    sowing_date DATE NOT NULL,
    growth_duration INT NOT NULL,
    estimated_harvest DATE NOT NULL
);
