-- Copy paste this code in phpMyAdmin SQL to create the database and insert test values

-- Step 1: Create the Database
CREATE DATABASE IF NOT EXISTS StaffManagement;

-- Step 2: Use the Database
USE StaffManagement;

DROP TABLE IF EXISTS Appraisal;
DROP TABLE IF EXISTS Staff;

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

CREATE TABLE Appraisal(
    ID INT PRIMARY KEY AUTO_INCREMENT,
    Staff_ID INT,
    Total INT NOT NULL DEFAULT 0,
    Doctorate_Degree BOOLEAN,
    Masters_Degree BOOLEAN,
    Bachelors_Degree BOOLEAN,
    Special_Course BOOLEAN,
    License_Examination BOOLEAN,
    Additional_Units  INT NOT NULL DEFAULT 0,
    Service_Years_Other_School  BOOLEAN,
    Service_Years_Asiatech  BOOLEAN,
    Service_Years_Industry  BOOLEAN,
    Service_Years_Role_A  BOOLEAN,
    Service_Years_Role_B  BOOLEAN,
    Works_Original_Author BOOLEAN,
    Works_Co_Author BOOLEAN,
    Works_Reviewer BOOLEAN,
    Works_Editor BOOLEAN,
    Works_Compiler BOOLEAN,
    Works_Encoder BOOLEAN,
    Works_Programmer BOOLEAN,
    Paper_Publish_Count_International  BOOLEAN,
    Paper_Publish_Count_National  BOOLEAN,
    Paper_Publish_Count_Local  BOOLEAN,
    Training_Course_Years_International BOOLEAN,
    Training_Course_Years_National BOOLEAN,
    Training_Course_Years_Local BOOLEAN,
    Resource_Person_International BOOLEAN,
    Resource_Person_National BOOLEAN,
    Resource_Person_Local BOOLEAN,
    Seminar_International BOOLEAN,
    Seminar_National BOOLEAN,
    Seminar_Local BOOLEAN,
    Membership_Learned_Society BOOLEAN,
    Membership_Professional_Organization BOOLEAN,
    Membership_Civic_Social_Economic_Organization BOOLEAN,
    Honors_Summa_Cum_Laude BOOLEAN,
    Honors_Cum_Laude BOOLEAN,
    Honors_Honorable_Mention BOOLEAN,
    Civic_Service_First_level BOOLEAN,
    Civic_Service_Second_level BOOLEAN,
    Civic_Service_Third_level BOOLEAN,
    Performance_Rating INT NOT NULL DEFAULT 0,
    FOREIGN KEY (Staff_ID) REFERENCES Staff(ID)
);

-- Insert test values
INSERT INTO Staff (Image_URL, Name, Email, Department, Role, Contract, Date)
VALUES
('https://example.com/image1.jpg', 'John Doe', 'john.doe@example.com', 'CBHTM/BSBMA', 'Head Dean', 'Full Time', '2020-06-15'),
('https://example.com/image2.jpg', 'Jane Smith', 'jane.smith@example.com', 'CEITE', 'Faculty', 'Part Time', '2018-08-25'),
('https://example.com/image3.jpg', 'Mark Johnson', 'mark.johnson@example.com', 'ASCERT', 'Faculty', 'Full Time', '2021-09-12'),
('https://example.com/image4.jpg', 'Emily Davis', 'emily.davis@example.com', 'BASIC ED', 'Head Dean', 'Full Time', '2015-03-07'),
('https://example.com/image5.jpg', 'Michael Brown', 'michael.brown@example.com', 'CBHTM/BSBMA', 'Faculty', 'Part Time', '2010-01-05'),
('https://example.com/image6.jpg', 'Sarah Wilson', 'sarah.wilson@example.com', 'CRIMINAL INJUSTICE', 'Faculty', 'Full Time', '2019-05-14'),
('https://example.com/image7.jpg', 'David Martinez', 'david.martinez@example.com', 'CEITE', 'Head Dean', 'Full Time', '2017-02-22'),
('https://example.com/image8.jpg', 'Jessica Taylor', 'jessica.taylor@example.com', 'ASCERT', 'Faculty', 'Part Time', '2022-03-03'),
('https://example.com/image9.jpg', 'James Anderson', 'james.anderson@example.com', 'BASIC ED', 'Faculty', 'Full Time', '2016-07-19'),
('https://example.com/image10.jpg', 'Patricia Thomas', 'patricia.thomas@example.com', 'CRIMINAL INJUSTICE', 'Head Dean', 'Full Time', '2009-10-14'),
('https://example.com/image11.jpg', 'Daniel Jackson', 'daniel.jackson@example.com', 'CBHTM/BSBMA', 'Faculty', 'Full Time', '2021-11-02'),
('https://example.com/image12.jpg', 'Elizabeth Moore', 'elizabeth.moore@example.com', 'CEITE', 'Faculty', 'Part Time', '2020-04-18'),
('https://example.com/image13.jpg', 'Joseph Lee', 'joseph.lee@example.com', 'ASCERT', 'Faculty', 'Full Time', '2018-01-10'),
('https://example.com/image14.jpg', 'Karen Harris', 'karen.harris@example.com', 'BASIC ED', 'Faculty', 'Part Time', '2014-08-30'),
('https://example.com/image15.jpg', 'Charles Clark', 'charles.clark@example.com', 'CRIMINAL INJUSTICE', 'Head Dean', 'Full Time', '2022-01-21'),
('https://example.com/image16.jpg', 'Lisa Lewis', 'lisa.lewis@example.com', 'CBHTM/BSBMA', 'Faculty', 'Part Time', '2016-12-12'),
('https://example.com/image17.jpg', 'Steven Walker', 'steven.walker@example.com', 'CEITE', 'Faculty', 'Full Time', '2011-11-15'),
('https://example.com/image18.jpg', 'Mary Hall', 'mary.hall@example.com', 'ASCERT', 'Head Dean', 'Full Time', '2019-07-22'),
('https://example.com/image19.jpg', 'Brian Allen', 'brian.allen@example.com', 'BASIC ED', 'Faculty', 'Part Time', '2020-10-10'),
('https://example.com/image20.jpg', 'Nancy Young', 'nancy.young@example.com', 'CRIMINAL INJUSTICE', 'Head Dean', 'Full Time', '2014-04-25'),
('https://example.com/image21.jpg', 'Kevin King', 'kevin.king@example.com', 'CBHTM/BSBMA', 'Faculty', 'Full Time', '2017-02-08'),
('https://example.com/image22.jpg', 'Dorothy Wright', 'dorothy.wright@example.com', 'CEITE', 'Faculty', 'Part Time', '2013-06-01'),
('https://example.com/image23.jpg', 'Thomas Scott', 'thomas.scott@example.com', 'ASCERT', 'Faculty', 'Full Time', '2015-09-03'),
('https://example.com/image24.jpg', 'Margaret Adams', 'margaret.adams@example.com', 'BASIC ED', 'Faculty', 'Part Time', '2021-01-15'),
('https://example.com/image25.jpg', 'Frank Nelson', 'frank.nelson@example.com', 'CRIMINAL INJUSTICE', 'Head Dean', 'Full Time', '2010-12-17'),
('https://example.com/image26.jpg', 'Laura Carter', 'laura.carter@example.com', 'CBHTM/BSBMA', 'Faculty', 'Part Time', '2019-02-07'),
('https://example.com/image27.jpg', 'Robert Mitchell', 'robert.mitchell@example.com', 'CEITE', 'Faculty', 'Full Time', '2021-05-25'),
('https://example.com/image28.jpg', 'Helen Perez', 'helen.perez@example.com', 'ASCERT', 'Faculty', 'Full Time', '2022-08-13'),
('https://example.com/image29.jpg', 'George Roberts', 'george.roberts@example.com', 'BASIC ED', 'Head Dean', 'Full Time', '2008-04-11'),
('https://example.com/image30.jpg', 'Susan Green', 'susan.green@example.com', 'CRIMINAL INJUSTICE', 'Faculty', 'Part Time', '2017-08-05'),
('https://example.com/image31.jpg', 'Paul Evans', 'paul.evans@example.com', 'CBHTM/BSBMA', 'Faculty', 'Full Time', '2020-03-25'),
('https://example.com/image32.jpg', 'Sandra Turner', 'sandra.turner@example.com', 'CEITE', 'Faculty', 'Full Time', '2018-07-18'),
('https://example.com/image33.jpg', 'Brian Phillips', 'brian.phillips@example.com', 'ASCERT', 'Faculty', 'Part Time', '2015-01-23'),
('https://example.com/image34.jpg', 'Joyce Campbell', 'joyce.campbell@example.com', 'BASIC ED', 'Head Dean', 'Full Time', '2012-06-27'),
('https://example.com/image35.jpg', 'Eric Parker', 'eric.parker@example.com', 'CRIMINAL INJUSTICE', 'Faculty', 'Full Time', '2021-09-09'),
('https://example.com/image36.jpg', 'Jennifer Morris', 'jennifer.morris@example.com', 'CBHTM/BSBMA', 'Faculty', 'Part Time', '2016-01-03'),
('https://example.com/image37.jpg', 'Anthony Rogers', 'anthony.rogers@example.com', 'CEITE', 'Faculty', 'Full Time', '2020-06-06'),
('https://example.com/image38.jpg', 'Rebecca Reed', 'rebecca.reed@example.com', 'ASCERT', 'Faculty', 'Full Time', '2019-03-14'),
('https://example.com/image39.jpg', 'Gary Cook', 'gary.cook@example.com', 'BASIC ED', 'Head Dean', 'Full Time', '2013-11-04'),
('https://example.com/image40.jpg', 'Melissa Bailey', 'melissa.bailey@example.com', 'CRIMINAL INJUSTICE', 'Faculty', 'Part Time', '2020-07-19'),
('https://example.com/image41.jpg', 'Joseph Gonzalez', 'joseph.gonzalez@example.com', 'CBHTM/BSBMA', 'Faculty', 'Full Time', '2021-12-01'),
('https://example.com/image42.jpg', 'Dorothy Collins', 'dorothy.collins@example.com', 'CEITE', 'Faculty', 'Part Time', '2018-02-14'),
('https://example.com/image43.jpg', 'David Stewart', 'david.stewart@example.com', 'ASCERT', 'Faculty', 'Full Time', '2017-08-27'),
('https://example.com/image44.jpg', 'Carol Morris', 'carol.morris@example.com', 'BASIC ED', 'Faculty', 'Part Time', '2020-11-30'),
('https://example.com/image45.jpg', 'William Richardson', 'william.richardson@example.com', 'CRIMINAL INJUSTICE', 'Head Dean', 'Full Time', '2007-12-09'),
('https://example.com/image46.jpg', 'Betty Watson', 'betty.watson@example.com', 'CBHTM/BSBMA', 'Faculty', 'Full Time', '2013-09-17'),
('https://example.com/image47.jpg', 'Brian Brooks', 'brian.brooks@example.com', 'CEITE', 'Faculty', 'Part Time', '2019-06-21'),
('https://example.com/image48.jpg', 'Jennifer James', 'jennifer.james@example.com', 'ASCERT', 'Faculty', 'Full Time', '2015-01-23'),
('https://example.com/image49.jpg', 'John Allen', 'john.allen@example.com', 'BASIC ED', 'Head Dean', 'Full Time', '2012-07-19'),
('https://example.com/image50.jpg', 'Lisa Harris', 'lisa.harris@example.com', 'CRIMINAL INJUSTICE', 'Faculty', 'Part Time', '2018-02-17'),
('https://example.com/image51.jpg', 'Richard Clark', 'richard.clark@example.com', 'CEITE', 'Faculty', 'Full Time', '2022-04-20'),
('https://example.com/image52.jpg', 'Barbara Moore', 'barbara.moore@example.com', 'ASCERT', 'Faculty', 'Part Time', '2021-09-04'),
('https://example.com/image53.jpg', 'Andrew Ward', 'andrew.ward@example.com', 'BASIC ED', 'Faculty', 'Full Time', '2015-06-22'),
('https://example.com/image54.jpg', 'Nancy Taylor', 'nancy.taylor@example.com', 'CRIMINAL INJUSTICE', 'Head Dean', 'Full Time', '2016-12-03'),
('https://example.com/image55.jpg', 'Edward Adams', 'edward.adams@example.com', 'CBHTM/BSBMA', 'Faculty', 'Full Time', '2019-07-22'),
('https://example.com/image56.jpg', 'Helen Mitchell', 'helen.mitchell@example.com', 'CEITE', 'Faculty', 'Part Time', '2016-04-10'),
('https://example.com/image57.jpg', 'Isaac Edwards', 'isaac.edwards@example.com', 'ASCERT', 'Faculty', 'Full Time', '2020-11-15'),
('https://example.com/image58.jpg', 'Amy Cook', 'amy.cook@example.com', 'BASIC ED', 'Faculty', 'Part Time', '2021-02-04'),
('https://example.com/image59.jpg', 'Daniel Bell', 'daniel.bell@example.com', 'CRIMINAL INJUSTICE', 'Head Dean', 'Full Time', '2014-01-19'),
('https://example.com/image60.jpg', 'Mark Young', 'mark.young@example.com', 'CBHTM/BSBMA', 'Faculty', 'Part Time', '2022-05-29'),
('https://example.com/image61.jpg', 'Thomas Walker', 'thomas.walker@example.com', 'CEITE', 'Faculty', 'Full Time', '2009-03-18'),
('https://example.com/image62.jpg', 'Deborah Campbell', 'deborah.campbell@example.com', 'ASCERT', 'Faculty', 'Part Time', '2017-08-27'),
('https://example.com/image63.jpg', 'Richard Collins', 'richard.collins@example.com', 'BASIC ED', 'Faculty', 'Full Time', '2015-11-16'),
('https://example.com/image64.jpg', 'Amanda Jenkins', 'amanda.jenkins@example.com', 'CRIMINAL INJUSTICE', 'Head Dean', 'Full Time', '2020-02-07'),
('https://example.com/image65.jpg', 'John Perry', 'john.perry@example.com', 'CBHTM/BSBMA', 'Faculty', 'Part Time', '2013-01-21'),
('https://example.com/image66.jpg', 'Patricia Cruz', 'patricia.cruz@example.com', 'CEITE', 'Faculty', 'Full Time', '2020-12-01'),
('https://example.com/image67.jpg', 'Rachel Morgan', 'rachel.morgan@example.com', 'ASCERT', 'Faculty', 'Full Time', '2021-09-15'),
('https://example.com/image69.jpg', 'James Perry', 'james.perry@example.com', 'CRIMINAL INJUSTICE', 'Head Dean', 'Full Time', '2016-12-03'),
('https://example.com/image70.jpg', 'Linda Rogers', 'linda.rogers@example.com', 'CBHTM/BSBMA', 'Faculty', 'Part Time', '2011-11-02'),
('https://example.com/image71.jpg', 'William Foster', 'william.foster@example.com', 'CEITE', 'Faculty', 'Full Time', '2019-03-15'),
('https://example.com/image72.jpg', 'Ruth Warren', 'ruth.warren@example.com', 'ASCERT', 'Faculty', 'Full Time', '2020-09-04'),
('https://example.com/image73.jpg', 'David Simmons', 'david.simmons@example.com', 'BASIC ED', 'Faculty', 'Part Time', '2019-01-13'),
('https://example.com/image74.jpg', 'Edward Butler', 'edward.butler@example.com', 'CRIMINAL INJUSTICE', 'Head Dean', 'Full Time', '2014-10-28'),
('https://example.com/image75.jpg', 'Charles Bennett', 'charles.bennett@example.com', 'CBHTM/BSBMA', 'Faculty', 'Full Time', '2022-06-10'),
('https://example.com/image76.jpg', 'Michael Gray', 'michael.gray@example.com', 'CEITE', 'Faculty', 'Part Time', '2017-10-20'),
('https://example.com/image77.jpg', 'Evelyn Long', 'evelyn.long@example.com', 'ASCERT', 'Faculty', 'Full Time', '2012-02-12'),
('https://example.com/image78.jpg', 'Benjamin Lee', 'benjamin.lee@example.com', 'BASIC ED', 'Faculty', 'Full Time', '2021-07-25'),
('https://example.com/image79.jpg', 'Janet King', 'janet.king@example.com', 'CRIMINAL INJUSTICE', 'Head Dean', 'Full Time', '2016-12-03'),
('https://example.com/image80.jpg', 'Martin Evans', 'martin.evans@example.com', 'CBHTM/BSBMA', 'Faculty', 'Full Time', '2011-08-06'),
('https://example.com/image81.jpg', 'Dorothy Scott', 'dorothy.scott@example.com', 'CEITE', 'Faculty', 'Part Time', '2018-04-18'),
('https://example.com/image82.jpg', 'Charles Wright', 'charles.wright@example.com', 'ASCERT', 'Faculty', 'Full Time', '2017-01-17'),
('https://example.com/image83.jpg', 'Dorothy Moore', 'dorothy.moore@example.com', 'BASIC ED', 'Faculty', 'Full Time', '2019-03-06'),
('https://example.com/image84.jpg', 'Patrick Green', 'patrick.green@example.com', 'CRIMINAL INJUSTICE', 'Head Dean', 'Full Time', '2014-12-02'),
('https://example.com/image85.jpg', 'Frank Hill', 'frank.hill@example.com', 'CBHTM/BSBMA', 'Faculty', 'Full Time', '2013-11-18'),
('https://example.com/image86.jpg', 'Jerry Jackson', 'jerry.jackson@example.com', 'CEITE', 'Faculty', 'Part Time', '2020-06-03'),
('https://example.com/image87.jpg', 'Rachel Martinez', 'rachel.martinez@example.com', 'ASCERT', 'Faculty', 'Full Time', '2021-09-15'),
('https://example.com/image88.jpg', 'Laura Williams', 'laura.williams@example.com', 'BASIC ED', 'Faculty', 'Part Time', '2019-01-30'),
('https://example.com/image89.jpg', 'Benjamin Turner', 'benjamin.turner@example.com', 'CRIMINAL INJUSTICE', 'Faculty', 'Full Time', '2020-11-14'),
('https://example.com/image90.jpg', 'Angela Robinson', 'angela.robinson@example.com', 'CBHTM/BSBMA', 'Faculty', 'Full Time', '2019-03-09'),
('https://example.com/image91.jpg', 'Martin Howard', 'martin.howard@example.com', 'CEITE', 'Faculty', 'Full Time', '2015-06-02'),
('https://example.com/image92.jpg', 'Joseph Gray', 'joseph.gray@example.com', 'ASCERT', 'Faculty', 'Part Time', '2021-07-22'),
('https://example.com/image93.jpg', 'Rachel Jenkins', 'rachel.jenkins@example.com', 'BASIC ED', 'Faculty', 'Full Time', '2018-09-04'),
('https://example.com/image94.jpg', 'Walter Matthews', 'walter.matthews@example.com', 'CRIMINAL INJUSTICE', 'Faculty', 'Part Time', '2016-11-21'),
('https://example.com/image95.jpg', 'Clara Wilson', 'clara.wilson@example.com', 'CBHTM/BSBMA', 'Faculty', 'Full Time', '2013-05-17'),
('https://example.com/image96.jpg', 'James Carter', 'james.carter@example.com', 'CEITE', 'Faculty', 'Full Time', '2017-03-01'),
('https://example.com/image97.jpg', 'Linda Harris', 'linda.harris@example.com', 'ASCERT', 'Faculty', 'Full Time', '2015-09-08'),
('https://example.com/image98.jpg', 'Mark Parker', 'mark.parker@example.com', 'BASIC ED', 'Faculty', 'Part Time', '2017-06-19'),
('https://example.com/image99.jpg', 'Deborah Lewis', 'deborah.lewis@example.com', 'CRIMINAL INJUSTICE', 'Head Dean', 'Full Time', '2012-08-11'),
('https://example.com/image100.jpg', 'Gary Mitchell', 'gary.mitchell@example.com', 'CBHTM/BSBMA', 'Faculty', 'Part Time', '2021-04-17');