CREATE TABLE user (
  username VARCHAR PRIMARY KEY,
  password VARCHAR NOT NULL
);

CREATE TABLE animal (
  animal_id INTEGER PRIMARY KEY,
  animal_name VARCHAR NOT NULL,
  species VARCHAR NOT NULL,
  breed VARCHAR NOT NULL,
  age INTEGER NOT NULL CHECK (age > 0),
  gender VARCHAR NOT NULL,  
  size VARCHAR NOT NULL
);

INSERT INTO user VALUES ('Tiago Saramago', 'vskinaprozis');

INSERT INTO animal VALUES(1, 'dog', 'golden retriever', 3, male, 'small');