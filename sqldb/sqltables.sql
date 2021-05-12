create table posts (
	id int(11) not null PRIMARY KEY AUTO_INCREMENT,
    subject varchar(128) not null,
    content varchar(1000) not null,
    date datetime not null 
);



INSERT INTO usernames (loginname, pw, date) values ();