create database contacts_app;
use contacts_app;

create table users (
sno int not null unique auto_increment,
user_email varchar(50) not null unique,
user_password varchar(128) not null,
secrect_code varchar(128) not null,
primary key (user_email)
) ENGINE=INNODB;

create table contacts (
sno int not null unique auto_increment,
u_email varchar(50) not null,
contact_fname varchar(15) not null,
contact_lname varchar(15) not null,
contact_number varchar(14) not null,
contact_email varchar(50) not null,
FOREIGN KEY (u_email) REFERENCES users(user_email)
) ENGINE=INNODB;