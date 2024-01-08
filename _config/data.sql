CREATE TABLE Roles (
id INT AUTO_INCREMENT PRIMARY KEY,
 name VARCHAR(255) NOT NULL
);

CREATE TABLE User (
user_id INT PRIMARY KEY,
username VARCHAR(255),
email VARCHAR(255),
password VARCHAR(255),
role_id INT,
FOREIGN KEY (role_id) REFERENCES Roles(id)
);

CREATE TABLE Categorier (
id_Categories INT PRIMARY KEY,
 name VARCHAR(255)
);

CREATE TABLE Tag (
tag_id INT PRIMARY KEY,
 tag_name VARCHAR(255)
);

CREATE TABLE Wiki (
 id INT PRIMARY KEY,
 title VARCHAR(255),
 content TEXT,
 date_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
 date_edit DATETIME ON UPDATE CURRENT_TIMESTAMP,
 user_id INT,
 id_Categories  INT,
 FOREIGN KEY (user_id) REFERENCES User(user_id),
 FOREIGN KEY (id_Categories) REFERENCES Categorier(id_Categories)
);

CREATE TABLE Wiki_Tag (
  wiki_id INT,
  tag_id INT,
  PRIMARY KEY (wiki_id, tag_id),
  FOREIGN KEY (wiki_id) REFERENCES Wiki(id),
  FOREIGN KEY (tag_id) REFERENCES Tag(tag_id)
);
