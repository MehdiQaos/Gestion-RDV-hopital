CREATE DATABASE IF NOT EXISTS hopitalDB;

USE hopitalDB;

CREATE TABLE Specialities (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255)
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















CREATE TABLE Categories (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    category VARCHAR(255)
);

CREATE TABLE Roles (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    role VARCHAR(255)
);

CREATE TABLE Users (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    user_name VARCHAR(255) NOT NULL,
    role_id INT(11),
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(255),
    address TEXT,
    FOREIGN KEY (role_id) REFERENCES Roles(id) ON DELETE CASCADE
);

CREATE TABLE Books (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    author VARCHAR(255) NOT NULL,
    category_id INT(11) NOT NULL,
    publisher VARCHAR(255) NOT NULL,
    isbn VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    quantity INT(11) NOT NULL,
    requested BOOLEAN NOT NULL,
    FOREIGN KEY (category_id) REFERENCES Categories(id) ON DELETE CASCADE
);

CREATE TABLE IsuedBooks (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    book_id INT(11),
    user_id INT(11),
    take_date DATETIME NOT NULL,
    return_date DATETIME NOT NULL,
    FOREIGN KEY (book_id) REFERENCES Books(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES Users(id) ON DELETE CASCADE
);

INSERT INTO Categories (category)
VALUES ("Computer science"),
       ("Mathematics"),
       ("Physics"),
       ("Fantasy"),
       ("Science fiction"),
       ("Others");

INSERT INTO Roles (role)
VALUES ("Super admin"),
       ("admin"),
       ("first year"),
       ("second year");