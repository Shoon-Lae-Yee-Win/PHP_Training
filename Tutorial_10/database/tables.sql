DROP TABLE users;
DROP TABLE token;

CREATE TABLE users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE token(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    token VARCHAR(100) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO users (username,password,email) VALUES ('admin','admin12345',"admin@gmail.com");
INSERT INTO users (username,password,email) VALUES ('Ko Ko','koko@12345',"koko@gmail.com");
INSERT INTO users (username,password,email) VALUES ('Mg Mg','mgmg@12345',"mgmg@gmail.com");
