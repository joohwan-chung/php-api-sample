create database ci_rest_api default character set = 'utf8mb4';


create table ci_rest_api.student (
  id int not null primary key auto_increment,
  name varchar(255),
  age varchar(255),
  country varchar(255)
) default charset = 'utf8mb4';