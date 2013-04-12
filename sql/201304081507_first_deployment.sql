CREATE TABLE photos
(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    title VARCHAR(255),
    filename VARCHAR(255) NOT NULL,
    created DATETIME NOT NULL,
    updated DATETIME NOT NULL,
    origin_width INT NOT NULL,
    origin_height INT NOT NULL,
    type VARCHAR(5) NOT NULL,
    r INT,
    g INT,
    b INT
);
CREATE TABLE prints
(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    created DATETIME NOT NULL,
    updated DATETIME NOT NULL,
    photo_id INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    article LONGTEXT NOT NULL,
    language VARCHAR(100) NOT NULL,
    published BOOLEAN NOT NULL,
    position INT
);
CREATE TABLE prints_tags
(
    print_id INT NOT NULL,
    tag_id INT NOT NULL,
    PRIMARY KEY ( print_id, tag_id )
);
CREATE TABLE tags
(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    tag VARCHAR(255) NOT NULL,
    created DATETIME NOT NULL
);
CREATE TABLE users
(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    encrypted_password VARCHAR(255) NOT NULL,
    reset_password_token VARCHAR(255),
    reset_password_sent_at DATETIME,
    sign_in_count INT DEFAULT 0,
    current_sign_in_at DATETIME,
    last_sign_in_at DATETIME,
    current_sign_in_ip VARCHAR(255),
    last_sign_in_ip VARCHAR(255),
    created DATETIME NOT NULL,
    updated DATETIME NOT NULL
);
CREATE TABLE videos
(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    created DATETIME NOT NULL,
    updated DATETIME NOT NULL,
    title VARCHAR(250),
    url TEXT NOT NULL,
    photo_id INT,
    header BOOLEAN,
    position INT NOT NULL,
    language VARCHAR(100) NOT NULL,
    description LONGTEXT,
    thumbnail VARCHAR(255),
    r INT,
    g INT,
    b INT,
    embed LONGTEXT,
    published BOOLEAN DEFAULT 1 NOT NULL
);
CREATE TABLE videos_tags
(
    video_id INT NOT NULL,
    tag_id INT NOT NULL,
    PRIMARY KEY ( video_id, tag_id )
);
CREATE UNIQUE INDEX unique_id ON prints ( id );
CREATE UNIQUE INDEX unique_print_id ON prints_tags ( print_id );
CREATE UNIQUE INDEX unique_tag_id ON prints_tags ( tag_id );
CREATE UNIQUE INDEX unique_id ON tags ( id );
CREATE UNIQUE INDEX unique_video_id ON videos_tags ( video_id );
CREATE UNIQUE INDEX unique_tag_id ON videos_tags ( tag_id );
