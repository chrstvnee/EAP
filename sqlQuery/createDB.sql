-- Step 1: Create the Database
CREATE DATABASE StaffManagement;

-- Step 2: Use the Database
USE StaffManagement;

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