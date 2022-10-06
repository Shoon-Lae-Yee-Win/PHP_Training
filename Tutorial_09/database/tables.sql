DROP TABLE student;

CREATE TABLE student (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    student_name VARCHAR(100) NOT NULL,
    address VARCHAR(255) NOT NULL,
    age INT(10) NOT NULL,
    major VARCHAR(255),
    gender VARCHAR(255) NOT NULL
);

INSERT INTO student (student_name,address,age,major,gender) VALUES ('Mg Mg','Mandalay',20,"Civil","Male");
INSERT INTO student (student_name,address,age,major,gender) VALUES ('Hla Hla','Mandalay',23,"Civil","Female");
INSERT INTO student (student_name,address,age,major,gender) VALUES ('Ko Ko','Yangon',20,"EC","Male");
INSERT INTO student (student_name,address,age,major,,gender) VALUES ('Mya Mya','Lashio',21,"EC","Female");
INSERT INTO student (student_name,address,age,major,gender) VALUES ('Sai Sai','Mandalay',20,"IT","Male");
INSERT INTO student (student_name,address,age,major,gender) VALUES ('Sai Ko','Zioa',18,"EP","Male");
