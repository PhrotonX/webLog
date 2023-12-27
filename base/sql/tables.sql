CREATE TABLE posts(
    post_id INT PRIMARY KEY NOT NULL,
    title VARCHAR(255) NOT NULL,
    content LONGTEXT,
    -- FOREIGN KEY (user_id) REFERENCES accounts(user_id),
    category VARCHAR(255),
    likes INT,
    dislikes INT,
    view INT,
    date_created DATETIME,
    date_modified DATETIME
);

CREATE TABLE comments(
    comment_id INT PRIMARY KEY NOT NULL,
    -- FOREIGN KEY (post_id) REFERENCES posts(post_id),
    title VARCHAR(255) NOT NULL,
    content LONGTEXT,
    -- FOREIGN KEY (user_id) REFERENCES accounts(user_id),
    likes INT,
    dislikes INT,
    view INT,
    date_created DATETIME,
    date_modified DATETIME
);

CREATE TABLE replies(
    reply_id INT PRIMARY KEY NOT NULL,
    -- FOREIGN KEY (post_id) REFERENCES posts(post_id),
    -- FOREIGN KEY (comment_id) REFERENCES comments(comment_id),
    title VARCHAR(255) NOT NULL,
    content LONGTEXT,
    -- FOREIGN KEY (user_id) REFERENCES accounts(user_id),
    likes INT,
    dislikes INT,
    view INT,
    date_created DATETIME,
    date_modified DATETIME
);

CREATE TABLE metadata(
    metadata_id INT PRIMARY KEY NOT NULL,
    -- FOREIGN KEY (post_id) REFERENCES posts(post_id),
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