#create database
CREATE DATABASE phplogin;

#create account table

CREATE TABLE accounts (
    id int NOT NULL AUTO_INCREMENT,
    username varchar(255) NOT NULL,
    password varchar(255) NOT NULL,
    email varchar(255) NOT NULL,
    PRIMARY KEY (id)
    );


#create bookmarks table

CREATE TABLE bookmarks (
	bookmarkId int NOT NULL AUTO_INCREMENT,
	name varchar(255) NOT NULL,
	url varchar(255) NOT NULL,
	id int NOT NULL,
	PRIMARY KEY (bookmarkId),
	FOREIGN KEY (id) REFERENCES accounts(id)
);