ALTER TABLE posts
ADD COLUMN user_id INT NOT NULL,
ADD FOREIGN KEY (user_id) REFERENCES accounts(user_id);

ALTER TABLE comments
ADD COLUMN post_id INT NOT NULL,
ADD COLUMN user_id INT NOT NULL,
ADD FOREIGN KEY (post_id) REFERENCES posts(post_id),
ADD FOREIGN KEY (user_id) REFERENCES accounts(user_id);

ALTER TABLE replies
ADD COLUMN post_id INT NOT NULL,
ADD COLUMN comment_id INT NOT NULL,
ADD COLUMN user_id INT NOT NULL,
ADD FOREIGN KEY (post_id) REFERENCES posts(post_id),
ADD FOREIGN KEY (comment_id) REFERENCES comments(comment_id),
ADD FOREIGN KEY (user_id) REFERENCES accounts(user_id);

ALTER TABLE metadata
ADD COLUMN post_id INT NOT NULL,
ADD FOREIGN KEY (post_id) REFERENCES posts(post_id);
