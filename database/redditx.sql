CREATE TABLE user (
  username VARCHAR PRIMARY KEY,
  password VARCHAR NOT NULL
);

CREATE TABLE story (
  story_id INTEGER PRIMARY KEY,
  story_tittle VARCHAR NOT NULL,
  story_text VARCHAR NOT NULL,
  username VARCHAR NOT NULL REFERENCES user
);

CREATE TABLE comment (
  comment_id INTEGER PRIMARY KEY,
   username VARCHAR NOT NULL REFERENCES user,
  story_id VARCHAR NOT NULL REFERENCES story,
  comment_text VARCHAR NOT NULL
);