create database kawauso default character set utf8 collate utf8_general_ci;
drop user if exists 'drotter'@'localhost';
create user 'drotter'@'localhost' identified by 'aka1373X';
grant all on kawauso.* to 'drotter'@'localhost';
use kawauso;

create table names (
	id int auto_increment primary key, 
	name varchar(200) not null, 
);

CREATE TABLE animals (
    id int primary key,
    last_login datetime,
    created_at datetime default current_timestamp
);
ALTER TABLE animals
ADD COLUMN money INT NOT NULL DEFAULT 0;
ADD COLUMN total_spend INT NOT NULL DEFAULT 0;
ADD COLUMN has_bed TINYINT(1) NOT NULL DEFAULT 0;
ADD COLUMN hunger INT NOT NULL DEFAULT 100;

ADD CONSTRAINT chk_hunger
CHECK (hunger >= 0 AND hunger <= 240);

