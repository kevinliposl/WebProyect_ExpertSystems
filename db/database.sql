DROP DATABASE expert_systems_b40920_b46549;
CREATE DATABASE expert_systems_b40920_b46549;

USE expert_systems_b40920_b46549;

/* ROLES */
CREATE TABLE tb_role(
	role_id INTEGER AUTO_INCREMENT,
	role_name VARCHAR(20) CHARSET utf8 COLLATE utf8_unicode_ci NOT NULL,
	CONSTRAINT PRIMARY KEY(role_id)
);

INSERT INTO tb_role (role_name)
VALUES('adm');
INSERT INTO tb_role (role_name)
VALUES('usr');

/* ESTILO */
CREATE TABLE tb_style(
	style_id INTEGER AUTO_INCREMENT,
	style_name VARCHAR(255) UNIQUE NOT NULL,
	CONSTRAINT PRIMARY KEY(style_id)
);

INSERT INTO tb_style(style_name) VALUES
	('Conservador'),
	('Investigador'),
	('Aventurero');

/* USUARIOS */
CREATE TABLE tb_user(
	user_id INTEGER AUTO_INCREMENT,
	user_mail VARCHAR(255) UNIQUE NOT NULL,
    user_password VARCHAR(255)  NOT NULL,
    user_name VARCHAR(255) NOT NULL,
    user_lastname VARCHAR(255)  NOT NULL,
    user_style INTEGER NOT NULL,
	role_id INTEGER NOT NULL,
	CONSTRAINT PRIMARY KEY(user_id,role_id),
    CONSTRAINT FOREIGN KEY(user_style) REFERENCES tb_style(style_id),
    CONSTRAINT FOREIGN KEY(role_id) REFERENCES tb_role(role_id)
);

INSERT INTO tb_user(user_mail,user_password,user_name,user_lastname,user_style,role_id) VALUES
	('adm@adm.com','1234','admin','admin',3,1),
	('pablo@pablo.com','1234','Pablo','Barrientos',1,2),
	('kevinliposl@gmail.com','1234','Kevin','Sandoval',2,2);

/*TIPO - GEOGRAFIA*/
CREATE TABLE tb_type(
	type_id INTEGER AUTO_INCREMENT,
	type_name VARCHAR(255) NOT NULL,
	CONSTRAINT PRIMARY KEY(type_id)
);

INSERT INTO tb_type(type_name) VALUES
	('Urbano'),
	('Costera'),
	('De Montaña');

/*ATRACCIÓN*/
CREATE TABLE tb_attraction(
	attraction_id INTEGER AUTO_INCREMENT,
	attraction_name VARCHAR(255) NOT NULL,
	CONSTRAINT PRIMARY KEY(attraction_id)
);

INSERT INTO tb_attraction(attraction_name) VALUES
	('Parques Nacionales'),
	('Ruinas y Lugares Históricos'),
	('Galerías y Museos'),
	('Jardines botánicos y zoológicos'),
	('Miradores'),
	('Hotel'),
	('Restaurante');

/*FACILIDADES*/
CREATE TABLE tb_facilities(
	facilities_id INTEGER AUTO_INCREMENT,
	facilities_name VARCHAR(255) NOT NULL ,
	CONSTRAINT PRIMARY KEY(facilities_id)
);

INSERT INTO tb_facilities(facilities_name) VALUES
	('Internet'),
	('Bar'),
	('Transporte'),
	('Restaurante'),
	('Hospedaje'),
	('Espacio para niños'),
	('Asistencia');
    
    /*LOCALIZACION*/
CREATE TABLE tb_location(
	location_id INTEGER AUTO_INCREMENT,
	location_name VARCHAR(255) NOT NULL ,
	CONSTRAINT PRIMARY KEY(location_id)
);

INSERT INTO tb_location(location_name) VALUES
	('San José'),
	('Alajuela'),
	('Cartago'),
	('Heredia'),
	('Puntarenas'),
	('Guanacaste'),
	('Limón');

CREATE TABLE tb_destination(
	destination_id INTEGER AUTO_INCREMENT,
	destination_name VARCHAR(255),
	destination_description VARCHAR(1000) NOT NULL,
	destination_location INTEGER NOT NULL, 
	destination_url_video VARCHAR(255) NOT NULL,
    destination_url_photo VARCHAR(255),
	destination_latitude VARCHAR(20) NOT NULL,
	destination_longitude VARCHAR(20) NOT NULL,
	destination_views INTEGER,
	destination_votes INTEGER,
    destination_stars INTEGER NOT NULL,
    destination_price INTEGER NOT NULL,
	destination_type_id INTEGER NOT NULL,
    destination_attraction_id INTEGER NOT NULL,
    destination_style_id INTEGER NOT NULL,
	CONSTRAINT PRIMARY KEY (destination_id),
    CONSTRAINT FOREIGN KEY (destination_type_id) REFERENCES tb_type(type_id),
    CONSTRAINT FOREIGN KEY (destination_style_id) REFERENCES tb_type(type_id),
    CONSTRAINT FOREIGN KEY (destination_location) REFERENCES tb_location(location_id),
    CONSTRAINT FOREIGN KEY (destination_attraction_id) REFERENCES tb_attraction(attraction_id)
);

CREATE TABLE tb_destination_facilities(
	destination_id INTEGER,
	facilities_id INTEGER,
	CONSTRAINT PRIMARY KEY(destination_id,facilities_id),
    CONSTRAINT FOREIGN KEY(destination_id) REFERENCES tb_destination(destination_id),
    CONSTRAINT FOREIGN KEY(facilities_id) REFERENCES tb_facilities(facilities_id)
);

/*
CREATE TABLE tb_user_vote(
	destination_id INTEGER AUTO_INCREMENT,
	user_id INTEGER NOT NULL,
	CONSTRAINT PRIMARY KEY (destination_id, user_id),
	CONSTRAINT FOREIGN KEY (destination_id) REFERENCES tb_destination(destination_id),
	CONSTRAINT FOREIGN KEY (user_id) REFERENCES tb_user(user_id)
);
*/

CREATE TABLE tb_training_set (
  id INTEGER,
  event_name VARCHAR(255),
  data_training json,
  CONSTRAINT pk_tb_training_set_id PRIMARY KEY(id)

) ENGINE=InnoDB;