create schema firstpass;
use firstpass;

create table users (
	id int auto_increment unique,
    username text,
    userpassword text,
    primary key(id)
);

create table logins (
	id int auto_increment unique,
    appname text,
    username text,
    userpassword text,
    userid int,
    primary key(id),
    foreign key(userid) references users(id)
);

show tables;

explain logins;
explain users;