/*
Created		17/12/2019
Modified		17/12/2019
Project		
Model		
Company		
Author		
Version		
Database		mySQL 5 
*/







drop table IF EXISTS docs;
drop table IF EXISTS area;
drop table IF EXISTS movements;
drop table IF EXISTS type_doc;
drop table IF EXISTS status_doc;
drop table IF EXISTS users;
drop table IF EXISTS history_access;
drop table IF EXISTS status_user;
drop table IF EXISTS priveleges;




Create table priveleges (
	id_priv Int NOT NULL AUTO_INCREMENT,
	privelege Varchar(80),
	status_priv Enum('0','1'),
 Primary Key (id_priv)) ENGINE = MyISAM;

Create table status_user (
	id_status_user Int NOT NULL AUTO_INCREMENT,
	desc_status_user Varchar(50),
 Primary Key (id_status_user)) ENGINE = MyISAM;

Create table history_access (
	id_history Int NOT NULL AUTO_INCREMENT,
	ip Varchar(20),
	date_access Date,
	time_in Time,
	time_out Time,
 Primary Key (id_history)) ENGINE = MyISAM;

Create table users (
	id_user Int NOT NULL AUTO_INCREMENT,
	id_priv Int NOT NULL,
	id_status_user Int NOT NULL,
	id_history Int NOT NULL,
	name Varchar(200),
	user Varchar(60),
	pass Varchar(120),
	tel Varchar(11),
	email Varchar(80),
	position Varchar(40),
	online Enum('0','1'),
 Primary Key (id_user)) ENGINE = MyISAM;

Create table status_doc (
	id_status_doc Int NOT NULL AUTO_INCREMENT,
	desc_status_doc Varchar(50),
 Primary Key (id_status_doc)) ENGINE = MyISAM;

Create table type_doc (
	id_type_doc Int NOT NULL AUTO_INCREMENT,
	desc_type_doc Varchar(50),
 Primary Key (id_type_doc)) ENGINE = MyISAM;

Create table movements (
	id_movement Int NOT NULL AUTO_INCREMENT,
	carpeta Int,
	folio Varchar(80),
	observ Text,
 Primary Key (id_movement)) ENGINE = MyISAM;

Create table area (
	id_area Int NOT NULL AUTO_INCREMENT,
	desc_area Varchar(250),
 Primary Key (id_area)) ENGINE = MyISAM;

Create table docs (
	id_doc Int NOT NULL AUTO_INCREMENT,
	id_status_doc Int NOT NULL,
	id_type_doc Int NOT NULL,
	id_movement Int NOT NULL,
	id_area Int NOT NULL,
	id_user Int NOT NULL,
	num_exp Varchar(50),
	date_sol Date,
	name_sol Varchar(200),
	date_dev Date,
	post_doc Varchar(200),
	get_doc Varchar(200),
 Primary Key (id_doc)) ENGINE = MyISAM;









Alter table users add Foreign Key (id_priv) references priveleges (id_priv) on delete  restrict on update  restrict;
Alter table users add Foreign Key (id_status_user) references status_user (id_status_user) on delete  restrict on update  restrict;
Alter table users add Foreign Key (id_history) references history_access (id_history) on delete  restrict on update  restrict;
Alter table docs add Foreign Key (id_user) references users (id_user) on delete  restrict on update  restrict;
Alter table docs add Foreign Key (id_status_doc) references status_doc (id_status_doc) on delete  restrict on update  restrict;
Alter table docs add Foreign Key (id_type_doc) references type_doc (id_type_doc) on delete  restrict on update  restrict;
Alter table docs add Foreign Key (id_movement) references movements (id_movement) on delete  restrict on update  restrict;
Alter table docs add Foreign Key (id_area) references area (id_area) on delete  restrict on update  restrict;






