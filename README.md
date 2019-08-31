# Interact
An attempt to build Twitter

I made this project to implement my knowledge in Advance PHP and Basics of Internet Security.

This website includes a DB
  Write the code given below in MySQL to create DB and tables necessary for the website.

==For XAMPP only==
Open localhost/phpmyadmin then go to SQL sub-section then copy this code:
  
    CREATE DATABASE Interact;
    USE Interact;
    CREATE TABLE posts(
	  id bigint(20) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    author varchar(50) NOT NULL,
    keywords varchar(50) NOT NULL,
    title tinytext NOT NULL,
    content mediumtext NOT NULL,
    published datetime NOT NULL
    );
    CREATE TABLE users(
	  id bigint(20) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username varchar(50) NOT NULL,
    email varchar(50) NOT NULL,
    pwd mediumtext NOT NULL
    );
    
==============

I used Prepared Statements to curb SQL Injection 

I sanitized and Validated each and every field input from User.

I encrypted the passwords so as to eliminate any possibility of Identity Theft.
Hence the passwords are not comprehendable in DB.

Users can Create a Public Post
After a secure Login.
