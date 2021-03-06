CREATE TABLE Project (
    id INT AUTO_INCREMENT NOT NULL,
    title VARCHAR(1024) NOT NULL,
    description TEXT NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE Article (
    id INT AUTO_INCREMENT NOT NULL,
    title VARCHAR(1024) NOT NULL,
    date DATETIME NOT NULL,
    content MEDIUMTEXT NOT NULL,
    project_id INT NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (project_id) REFERENCES Project(id)
);

CREATE TABLE Subscriber (
    id INT AUTO_INCREMENT NOT NULL,
    email VARCHAR(128) NOT NULL,
    PRIMARY KEY (id)
);
