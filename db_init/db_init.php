<?php
$servername = "localhost:3306";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password);
if (!$conn) {
    die("Kết nối không thành công: " . mysqli_connect_error());
}

// CREATE DATABASE,TABLES and INSERT DATA
// Password hashing
$password_1 = "truetruetrue"; // VINH DAO QUANG
$hashed_password_1 = password_hash($password_1, PASSWORD_DEFAULT);
$password_2 = "sadness"; // JOHN SMITH
$hashed_password_2 = password_hash($password_2, PASSWORD_DEFAULT);

$sql = "CREATE DATABASE cv_information;

USE cv_information;

CREATE TABLE users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    gender VARCHAR(255),
    address VARCHAR(255),
    email VARCHAR(255),
    phone VARCHAR(20),
    password VARCHAR(255),
    dob date,
    position VARCHAR(255),
    introduction TEXT
);

CREATE TABLE avatar (
    id INT(11) AUTO_INCREMENT PRIMARY KEY, 
    image_path VARCHAR(255),
    resume_id INT(11) 
);

CREATE TABLE resumes (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    update_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    user_id INT(11) 
);

CREATE TABLE projects (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    duration INT(11),
    web VARCHAR(255),
    field VARCHAR(255),
    description TEXT,
    technology VARCHAR(255),
    resume_id INT(11) 
);

CREATE TABLE education (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    uni_name VARCHAR(255),
    degree VARCHAR(255),
    major VARCHAR(255),
    grad_year INT(4),
    resume_id INT(11) 
);

CREATE TABLE skills (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    resume_id INT(11) 
);

CREATE TABLE experiences (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    duration INT(11),
    position VARCHAR(255),
    company VARCHAR(255),
    resume_id INT(11) 
);

-- ADD FOREIGN KEYS

ALTER TABLE resumes
    ADD FOREIGN KEY (user_id) REFERENCES users(id);
 
ALTER TABLE avatar 
    ADD FOREIGN KEY (resume_id) REFERENCES resumes(id);

ALTER TABLE projects
    ADD FOREIGN KEY (resume_id) REFERENCES resumes(id);

ALTER TABLE education
    ADD FOREIGN KEY (resume_id) REFERENCES resumes(id);

ALTER TABLE skills
    ADD FOREIGN KEY (resume_id) REFERENCES resumes(id);

ALTER TABLE experiences
    ADD FOREIGN KEY (resume_id) REFERENCES resumes(id);



-- INSERT USERS 1 - VINH DAO QUANG ------------------------------------------------------------------------------------------------------
INSERT INTO users (name, gender, address, email, phone, password, dob, position, introduction) VALUES 
('VINH DAO QUANG', 'Male', 'HCMC', 'vinhdao@gmail.com', '0909002123', '$hashed_password_1', '2002-06-10', 'Front-end Developer',
'I am junior in Computer Science at Ho Chi Minh University of Technology. As a self-awareness and self-discipline person, I am able to handle my jobs at a considerate level. 
To be honest, I am really dedicated to improve myself and I am keen on coding, especially with Javascript. I like to work with team because I am willing to listen every comments which is highly contributed to projects as well as myself. In addition, I am able to conduct research and learn new knowledge in a short period (usually in about two weeks) as well as learning from persons who are likely to make me closer to perfection.
To tell about my further wishes, working as a software developer in about 5 - 8 years will be enough for me before deciding to face new challenges in coding and creating applications in both mobile and web field.');

-- INSERT RESUMES 1 - BEGIN ------------------------------------------------------------------------
INSERT INTO resumes (title, created_at, update_at, user_id) VALUES 
('Application for web developers 1', '2023-12-01', '2023-12-02 18:31', 1);
    -- Insert projects
INSERT INTO projects (name, duration, web, technology, field, description, resume_id) VALUES 
('Alimac Shopping - Shirt shopping website', '3', 'www.alimac.com', 'ReactJs, NextJs, Bootstrap, VueJS', 'Front-end, Back-end', 'This is a description for cv 1', 1);
INSERT INTO projects (name, duration, web, technology, field, description, resume_id) VALUES 
('Cat Tinder - Where cats can find true love', '3', 'www.cattinder.com', 'ReactJs, NextJs, Bootstrap, VueJS', 'Front-end, Back-end', 'This is a description for cv 1', 1);
INSERT INTO projects (name, duration, web, technology, field, description, resume_id) VALUES 
('Travel No Price - Booking tickets website', '3', 'www.travelnoprice.com', 'ReactJs, NextJs, Bootstrap, VueJS', 'Front-end, Back-end', 'This is a description for cv 1', 1);

    -- Insert skills
INSERT INTO skills (name, resume_id) VALUES ('JavaScript', 1);
INSERT INTO skills (name, resume_id) VALUES ('C++', 1);
INSERT INTO skills (name, resume_id) VALUES ('PHP', 1);
INSERT INTO skills (name, resume_id) VALUES ('Python', 1);

    -- Insert education
INSERT INTO education (uni_name, degree, major, grad_year, resume_id) VALUES 
(' Hochiminh University of Technology', 'Bachelor', 'Computer Science', '2020', 1);

    -- Insert experiences
INSERT INTO experiences (duration, position, company, resume_id) VALUES 
('24', 'Senior Front-end Developer', 'Bee Solution Ltd.', 1);
INSERT INTO experiences (duration, position, company, resume_id) VALUES 
('12', 'Senior Front-end Developer', 'VNG', 1);

INSERT INTO avatar (image_path, resume_id) VALUES
('../db_init/ava2.jpg', 1);


-- INSERT RESUMES 2 - BEGIN ------------------------------------------------------------------------
INSERT INTO resumes (title, created_at, update_at, user_id) VALUES 
('Application for web developers 2', '2023-12-01', '2023-12-02 16:03', 1);
    -- Insert projects
INSERT INTO projects (name, duration, web, technology, field, description, resume_id) VALUES 
('Alimac Shopping - Shirt shopping website', '3', 'www.alimac.com', 'HTML, CSS, Javascript, PHP', 'Front-end, Back-end', 'This is a description for cv 2', 2);
INSERT INTO projects (name, duration, web, technology, field, description, resume_id) VALUES 
('Cat Tinder - Where cats can find true love', '3', 'www.cattinder.com', 'HTML, CSS, Javascript, PHP', 'Front-end, Back-end', 'This is another description for cv 2', 2);
INSERT INTO projects (name, duration, web, technology, field, description, resume_id) VALUES 
('Travel No Price - Booking tickets website', '3', 'www.travelnoprice.com', 'HTML, CSS, Javascript, PHP', 'Front-end, Back-end', 'This is another description for cv 2', 2);

    -- Insert skills
INSERT INTO skills (name, resume_id) VALUES ('JavaScript', 2);
INSERT INTO skills (name, resume_id) VALUES ('C++', 2);
INSERT INTO skills (name, resume_id) VALUES ('PHP', 2);
INSERT INTO skills (name, resume_id) VALUES ('Python', 2);

    -- Insert education
INSERT INTO education (uni_name, degree, major, grad_year, resume_id) VALUES 
(' Hochiminh University of Technology', 'Bachelor', 'Computer Science', '2020', 2);

    -- Insert experiences
INSERT INTO experiences (duration, position, company, resume_id) VALUES 
('24', 'Senior Front-end Developer', 'Bee Solution Ltd.', 2);
INSERT INTO experiences (duration, position, company, resume_id) VALUES 
('12', 'Senior Front-end Developer', 'VNG', 2);

INSERT INTO avatar (image_path, resume_id) VALUES
('../db_init/ava1.jpg', 2);



-- INSERT RESUMES 3 - BEGIN ------------------------------------------------------------------------
INSERT INTO resumes (title, created_at, update_at, user_id) VALUES 
('Application for web developers 3', '2023-12-01', '2023-12-02 18:31', 1);

INSERT INTO avatar (image_path, resume_id) VALUES
('../db_init/ava2.jpg', 3);

-- INSERT RESUMES 4 - BEGIN ------------------------------------------------------------------------
INSERT INTO resumes (title, created_at, update_at, user_id) VALUES 
('Application for web developers 4', '2023-12-01', '2023-12-02 18:31', 1);

INSERT INTO avatar (image_path, resume_id) VALUES
('../db_init/ava3.jpg', 4);

-- INSERT RESUMES 5 - BEGIN ------------------------------------------------------------------------
INSERT INTO resumes (title, created_at, update_at, user_id) VALUES 
('Application for web developers 5', '2023-12-01', '2023-12-02 18:31', 1);

INSERT INTO avatar (image_path, resume_id) VALUES
('../db_init/ava4.jpg', 5);

-- INSERT RESUMES 6 - BEGIN ------------------------------------------------------------------------
INSERT INTO resumes (title, created_at, update_at, user_id) VALUES 
('Application for web developers 6', '2023-12-01', '2023-12-02 18:31', 1);

INSERT INTO avatar (image_path, resume_id) VALUES
('../db_init/ava4.jpg', 6);

-- INSERT RESUMES 7 - BEGIN ------------------------------------------------------------------------
INSERT INTO resumes (title, created_at, update_at, user_id) VALUES 
('Application for web developers 7', '2023-12-01', '2023-12-02 18:31', 1);

INSERT INTO avatar (image_path, resume_id) VALUES
('../db_init/ava4.jpg', 7);

-- INSERT RESUMES 8 - BEGIN ------------------------------------------------------------------------
INSERT INTO resumes (title, created_at, update_at, user_id) VALUES 
('Application for web developers 8', '2023-12-01', '2023-12-02 18:31', 1);

INSERT INTO avatar (image_path, resume_id) VALUES
('../db_init/ava4.jpg', 8);

-- INSERT RESUMES 9 - BEGIN ------------------------------------------------------------------------
INSERT INTO resumes (title, created_at, update_at, user_id) VALUES 
('Application for web developers 9', '2023-12-01', '2023-12-02 18:31', 1);

INSERT INTO avatar (image_path, resume_id) VALUES
('../db_init/ava4.jpg', 9);

-- INSERT RESUMES 10 - BEGIN ------------------------------------------------------------------------
INSERT INTO resumes (title, created_at, update_at, user_id) VALUES 
('Application for web developers 10', '2023-12-01', '2023-12-02 18:31', 1);

INSERT INTO avatar (image_path, resume_id) VALUES
('../db_init/ava4.jpg', 10);

-- INSERT RESUMES 11 - BEGIN ------------------------------------------------------------------------
INSERT INTO resumes (title, created_at, update_at, user_id) VALUES 
('Application for web developers 11', '2023-12-01', '2023-12-02 18:31', 1);

INSERT INTO avatar (image_path, resume_id) VALUES
('../db_init/ava4.jpg', 11);



-- INSERT USERS 2 - JOHN SMITH ---------------------------------------------------------------------------------------------------------------
INSERT INTO users (name, gender, address, email, phone, password, dob, position, introduction) VALUES 
('JOHN SMITH', 'Male', 'London', 'johnsmith@gmail.com', '091999323', '$hashed_password_2', '1988-02-03', 'Fullstack Developer',
'I am junior in Computer Science at Standford University. As a self-awareness and self-discipline person, I am able to handle my jobs at a considerate level. 
To be honest, I am really dedicated to improve myself and I am keen on coding, especially with Javascript. I like to work with team because I am willing to listen every comments which is highly contributed to projects as well as myself. In addition, I am able to conduct research and learn new knowledge in a short period (usually in about two weeks) as well as learning from persons who are likely to make me closer to perfection.
To tell about my further wishes, working as a software developer in about 5 - 8 years will be enough for me before deciding to face new challenges in coding and creating applications in both mobile and web field.');

-- INSERT RESUMES 3 - BEGIN ------------------------------------------------------------------------
INSERT INTO resumes (title, created_at, update_at, user_id) VALUES 
('Application for fullstack developers', '2023-12-01', '2023-12-03 12:03', 2);

    -- Insert projects
INSERT INTO projects (name, duration, web, technology, field, description, resume_id) VALUES 
('Travel No Price - Booking tickets website', '4','www.travelnoprice.com', 'ReactJs, NextJs, Bootstrap, VueJS', 'Front-end, Back-end', 'This is a description for cv 3', 12);
INSERT INTO projects (name, duration, web, technology, field, description, resume_id) VALUES 
('Alimac Shopping - Shirt shopping website', '3', 'www.alimac.com', 'ReactJs, NextJs, Bootstrap, VueJS', 'Front-end, Back-end', 'This is a description for cv 3', 12);
INSERT INTO projects (name, duration, web, technology, field, description, resume_id) VALUES 
('Cat Tinder - Where cats can find true love', '3', 'www.cattinder.com', 'ReactJs, NextJs, Bootstrap, VueJS', 'Front-end, Back-end', 'This is a description for cv 3', 12);

    -- Insert skills
INSERT INTO skills (name, resume_id) VALUES ('PHP', 12);
INSERT INTO skills (name, resume_id) VALUES ('JavaScript', 12);
INSERT INTO skills (name, resume_id) VALUES ('C#', 12);
INSERT INTO skills (name, resume_id) VALUES ('Ruby', 12);

    -- Insert education
INSERT INTO education (uni_name, degree, major, grad_year, resume_id) VALUES 
('Standford University', 'Master', 'Computer Engineering', '2010', 12);

    -- Insert experiences
INSERT INTO experiences (duration, position, company, resume_id) VALUES 
('36', 'Senior Back-end Developer', 'Google', 12);
INSERT INTO experiences (duration, position, company, resume_id) VALUES 
('24', 'Senior Fullstack Developer', 'Youtube', 12);

INSERT INTO avatar (image_path, resume_id) VALUES
('../db_init/ava2.jpg', 12)";;


if ($conn->multi_query($sql) === TRUE) {
    echo "Multi query executed successfully";
} else {
    echo "Error executing multi query: " . $conn->error;
}
?>