-- Customer Table
CREATE TABLE Customer (
    customer_id INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    Email VARCHAR(255) NOT NULL,
    Username VARCHAR(255) NOT NULL,
    Password VARCHAR(255) NOT NULL,
    Phone_number VARCHAR(15),
    Address_line VARCHAR(255),
    Country VARCHAR(255),
    City VARCHAR(255),
    Acc_no VARCHAR(20),
    Bank_Name VARCHAR(255),
    Branch VARCHAR(255),
    Ifsc_Code VARCHAR(20),
    Registration_date DATE,
    Pan_Card VARCHAR(20)
);

-- Seller Table
CREATE TABLE Seller (
    seller_id INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    Email VARCHAR(255) NOT NULL,
    Username VARCHAR(255) NOT NULL,
    Password VARCHAR(255) NOT NULL,
    Phone_number VARCHAR(15),
    Address_line1 VARCHAR(255),
    Address_line2 VARCHAR(255),
    Acc_no VARCHAR(20),
    Bank_Name VARCHAR(255),
    Branch VARCHAR(255),
    Ifsc_Code VARCHAR(20),
    Registration_date DATE,
    Pancard VARCHAR(20)
);

-- Admin Table
CREATE TABLE Admin (
    admin_id INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    Email VARCHAR(255) NOT NULL,
    Username VARCHAR(255) NOT NULL,
    Password VARCHAR(255) NOT NULL,
    Phone_number VARCHAR(15),
    Country VARCHAR(255),
    City VARCHAR(255),
    Address VARCHAR(255),
    Acc_no VARCHAR(20),
    Bank_Name VARCHAR(255),
    Branch VARCHAR(255),
    Ifsc_Code VARCHAR(20),
    Registration_date DATE
);