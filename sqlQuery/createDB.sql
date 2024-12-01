-- Copy paste this code in phpMyAdmin SQL to create the database and insert test values

-- Step 1: Create the Database
CREATE DATABASE StaffManagement;

-- Step 2: Use the Database
USE StaffManagement;

DROP TABLE IF EXISTS Staff

-- Main table
CREATE TABLE Staff (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    Image_URL VARCHAR(255),
    Name VARCHAR(100) NOT NULL,
    Email VARCHAR(100) NOT NULL UNIQUE,
    Department VARCHAR(50) CHECK (Department IN ('CBHTM/BSBMA', 'CEITE', 'ASCERT', 'BASIC ED', 'CRIMINAL INJUSTICE','COA')),
    Role VARCHAR(50) CHECK (Role IN ('Head Dean', 'Faculty')),
    Contract VARCHAR(20) CHECK (Contract IN ('Full Time', 'Part Time')),
    Date DATE
);

-- Insert test values
INSERT INTO Staff (Image_URL, Name, Email, Department, Role, Contract, Date)
VALUES
    ('https://example.com/image1.jpg', 'John Doe', 'john.doe@example.com', 'CBHTM/BSBMA', 'Faculty', 'Full Time', '2024-01-15'),
    ('https://example.com/image2.jpg', 'Jane Smith', 'jane.smith@example.com', 'CEITE', 'Head Dean', 'Part Time', '2023-12-10'),
    ('https://example.com/image3.jpg', 'Alice Johnson', 'alice.j@example.com', 'ASCERT', 'Faculty', 'Full Time', '2024-03-20'),
    ('https://example.com/image4.jpg', 'Robert Brown', 'robert.brown@example.com', 'BASIC ED', 'Head Dean', 'Part Time', '2024-02-01'),
    ('https://example.com/image5.jpg', 'Michael White', 'michael.white@example.com', 'CRIMINAL INJUSTICE', 'Faculty', 'Full Time', '2023-11-25'),
    ('https://example.com/image6.jpg', 'Emily Davis', 'emily.d@example.com', 'COA', 'Faculty', 'Part Time', '2024-04-10'),
    ('https://example.com/image7.jpg', 'Chris Wilson', 'chris.wilson@example.com', 'CBHTM/BSBMA', 'Head Dean', 'Full Time', '2024-05-30'),
    ('https://example.com/image8.jpg', 'Sophia Taylor', 'sophia.taylor@example.com', 'CEITE', 'Faculty', 'Full Time', '2023-09-18'),
    ('https://example.com/image9.jpg', 'Daniel Moore', 'daniel.moore@example.com', 'ASCERT', 'Head Dean', 'Part Time', '2023-10-10'),
    ('https://example.com/image10.jpg', 'Olivia Brown', 'olivia.brown@example.com', 'BASIC ED', 'Faculty', 'Full Time', '2024-06-15');
