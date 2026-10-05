CREATE TABLE faculty (
    faculty_id INT AUTO_INCREMENT PRIMARY KEY,
    faculty_fname VARCHAR(100) NOT NULL,
    faculty_mname VARCHAR(100) DEFAULT NULL,
    faculty_lname VARCHAR(100) NOT NULL,
    faculty_age INT NOT NULL,
    faculty_gender ENUM('Male', 'Female', 'Other') NOT NULL,
    faculty_address VARCHAR(255) NOT NULL,
    faculty_position VARCHAR(100) NOT NULL,
    faculty_salary DECIMAL(10,2) NOT NULL
);