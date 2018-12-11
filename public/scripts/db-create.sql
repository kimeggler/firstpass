create schema firstpass;
use firstpass;

create table users (
	id int auto_increment unique,
    username varchar(50),
    userpassword varchar(255),
    primary key(id)
);

create table logins (
	id int auto_increment unique,
    appname varchar(50),
    username varchar(50),
    useremail varchar(100);
    userpassword varchar(255),
    userid int,
    primary key(id),
    foreign key(userid) references users(id)
);

show tables;

explain logins;
explain users;