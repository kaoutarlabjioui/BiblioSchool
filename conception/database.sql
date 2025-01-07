-- Active: 1735497149371@@127.0.0.1@3306@bibliotheque
CREATE DATABASE bibliotheque;


CREATE TABLE Roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    role VARCHAR(255) NOT NULL
);


create table Tags (

id int primary key AUTO_INCREMENT,
tag_name varchar(50)


);



create table Categories (
 id int primary key AUTO_INCREMENT,
categorie_name varchar(50)

);


create table TagsLivres(
    id  int PRIMARY key auto_increment ,
   id_livre int ,
   id_tag int ,
Foreign Key (id_livre) REFERENCES Livres (id),
Foreign Key (id_tag) REFERENCES Tags(id)
);
drop table tgslivres;

CREATE TABLE Users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    prenom VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(100) NOT NULL,
    id_role INT ,
    Foreign Key (id_role) REFERENCES Roles (id)

);

