CREATE DATABASE IF NOT EXISTS hopitalDB;

USE hopitalDB;

CREATE TABLE Specialities (
    id INT PRIMARY KEY AUTO_INCREMENT,
<<<<<<< HEAD
    name VARCHAR(255)
=======
    name VARCHAR(255),
>>>>>>> c0baa5df6f9bddbb3356289b999e851bbaa99306
);

CREATE TABLE Admins (
    id INT PRIMARY KEY AUTO_INCREMENT,
    full_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    photo VARCHAR(255)
);

CREATE TABLE Doctors (
    id INT PRIMARY KEY AUTO_INCREMENT,
    full_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    photo VARCHAR(255),
    speciality_id INT,
    FOREIGN KEY (speciality_id) REFERENCES Specialities(id) ON DELETE CASCADE
);

CREATE TABLE Patients (
    id INT PRIMARY KEY AUTO_INCREMENT,
    full_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    photo VARCHAR(255),
    cin VARCHAR(255) NOT NULL,
    birthday DATE NOT NULL
);

CREATE TABLE Sessions (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    start_time DATETIME NOT NULL,
    end_time DATETIME NOT NULL,
    max_num INT NOT NULL,
    doctor_id INT NOT NULL,
    FOREIGN KEY (doctor_id) REFERENCES Doctors(id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE Appointments (
    id INT PRIMARY KEY AUTO_INCREMENT,
    booking_date DATE NOT NULL,
    order_in_session INT NOT NULL,
    reference_number VARCHAR(255),
    patient_id INT NOT NULL,
    doctor_id INT NOT NULL,
    session_id INT NOT NULL,
    FOREIGN KEY (session_id) REFERENCES Sessions(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (patient_id) REFERENCES Patients(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (doctor_id) REFERENCES Doctors(id) ON DELETE CASCADE ON UPDATE CASCADE
);