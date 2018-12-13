CREATE TABLE user (
  user_id INTEGER PRIMARY KEY,
  username VARCHAR NOT NULL,
  password VARCHAR NOT NULL
);

CREATE TABLE story (
  story_id INTEGER PRIMARY KEY,
  story_title VARCHAR NOT NULL,
  story_text VARCHAR NOT NULL,
  user_id INTEGER REFERENCES user,
  timestamp TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE comment (
  comment_id INTEGER PRIMARY KEY,
  comment_text VARCHAR NOT NULL,
  user_id INTEGER REFERENCES user,
  story_id VARCHAR NOT NULL REFERENCES story,
  timestamp TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO user (
  1,
  "redditx",
  "password"
);

INSERT INTO story (
  1,
  "1st Story",
  "First Story",
  1
);

INSERT INTO comment (
  1,
  "1st Comment",
  1,
  1
);

