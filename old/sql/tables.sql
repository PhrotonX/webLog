CREATE TABLE posts(
    post_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    content LONGTEXT,
    category VARCHAR(255),
    likes INT,
    dislikes INT,
    view INT,
    date_created DATETIME,
    date_modified DATETIME
);

CREATE TABLE comments(
    comment_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    content LONGTEXT,
    likes INT,
    dislikes INT,
    view INT,
    date_created DATETIME,
    date_modified DATETIME
);

CREATE TABLE replies(
    reply_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    content LONGTEXT,
    likes INT,
    dislikes INT,
    view INT,
    date_created DATETIME,
    date_modified DATETIME
);

CREATE TABLE metadata(
    metadata_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    revision BIGINT,
    tags VARCHAR(255),
    metadata VARCHAR(65535)
);

-- Posts:
-- -postid
-- -title
-- -content
-- -user_id
-- -likes
-- -dislikes
-- -views
-- -datecreated
-- -datemodified

-- Comments:
-- -foreign key postid
-- -content
-- -author
-- -datecreated
-- -datemodified
-- -likes
-- -dislikes
-- -views

-- Replies:
-- -postid
-- -commentid
-- -content
-- -author
-- -datecreated
-- -datemodified
-- -likes
-- -dislikes
-- -views

-- Metadata:
-- -postid
-- -metadata
-- -tags