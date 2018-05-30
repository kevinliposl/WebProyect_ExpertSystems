DROP DATABASE expert_systems_b40920_b46549;
CREATE DATABASE expert_systems_b40920_b46549;

USE expert_systems_b40920_b46549;

CREATE TABLE tb_role(
	role_id INTEGER AUTO_INCREMENT,
	role_name VARCHAR(20) NOT NULL,
	CONSTRAINT PRIMARY KEY(role_id)
);

CREATE TABLE tb_user(
	user_id INTEGER AUTO_INCREMENT,
	user_mail VARCHAR(255) NOT NULL,
    user_password VARCHAR(255)NOT NULL,
	role_id INTEGER NOT NULL,
	CONSTRAINT PRIMARY KEY(user_id,role_id),
    CONSTRAINT FOREIGN KEY(role_id) REFERENCES tb_role(role_id)
);
/*
Parques nacionales
Ruinas y lugares históricos.
Galerías y museos.
Jardines botánicos y zoológicos.
Parques temáticos.
Miradores.
*/
CREATE TABLE tb_category(
	category_id INTEGER AUTO_INCREMENT,
	category_name VARCHAR(255),
	CONSTRAINT PRIMARY KEY(category_id)
);

CREATE TABLE tb_facilities(
	facilities_id INTEGER AUTO_INCREMENT,
	facilities_name VARCHAR(255) NOT NULL,
	CONSTRAINT PRIMARY KEY(facilities_id)
);

CREATE TABLE tb_destination(
	destination_id INTEGER AUTO_INCREMENT,
	destination_name VARCHAR(255),
	destination_description VARCHAR(255) NOT NULL,
	destination_location VARCHAR(255) NOT NULL, 
	destination_url_video VARCHAR(255) NOT NULL,
    destination_url_photo VARCHAR(255),
	destination_latitude INTEGER NOT NULL,
	destination_longitude INTEGER NOT NULL,
	destination_views INTEGER NOT NULL,
	destination_votes INTEGER NOT NULL,
    destination_stars INTEGER NOT NULL,
	CONSTRAINT PRIMARY KEY (destination_id)
);

CREATE TABLE tb_destination_facilities(
	destination_id INTEGER,
	facilities_id INTEGER,
	CONSTRAINT PRIMARY KEY(destination_id,facilities_id),
    CONSTRAINT FOREIGN KEY(destination_id) REFERENCES tb_destination(destination_id),
    CONSTRAINT FOREIGN KEY(facilities_id) REFERENCES tb_facilities(facilities_id)
);

CREATE TABLE tb_destination_category(
	destination_id INTEGER NOT NULL,
	category_id INTEGER NOT NULL,
	CONSTRAINT PRIMARY KEY(destination_id,category_id),
    CONSTRAINT FOREIGN KEY(destination_id) REFERENCES tb_destination(destination_id),
    CONSTRAINT FOREIGN KEY(category_id) REFERENCES tb_category(category_id)
);


-- SE PUEDE CAMBIAR, ES SOLO PARA PRESERVAR LA IDEA
CREATE TABLE tb_user_vote(
	destination_id INTEGER AUTO_INCREMENT,
	user_id INTEGER NOT NULL,
	CONSTRAINT PRIMARY KEY (destination_id, user_id),
	CONSTRAINT FOREIGN KEY (destination_id) REFERENCES tb_destination(destination_id),
	CONSTRAINT FOREIGN KEY (user_id) REFERENCES tb_user(user_id)
);


/* ROLES */
INSERT INTO tb_role (role_name)
VALUES('adm');
INSERT INTO tb_role (role_name)
VALUES('usr');

/* USERS */
INSERT INTO tb_user(user_mail,user_password,role_id)
VALUES('adm@adm.com','1234',1);

INSERT INTO tb_user(user_mail,user_password,role_id)
VALUES('usr@usr.com','1234',2);

-- CALL sp_sign_in_user('usr@usr.com','1234');
-- CALL sp_sign_in_user('adm@adm.com','1234');

-- DROP PROCEDURE sp_sign_in_user;

DELIMITER $$
CREATE PROCEDURE sp_sign_in_user(
mail_tmp VARCHAR(255),
password_tmp VARCHAR(255)
)
BEGIN
	IF EXISTS(SELECT * FROM tb_user WHERE user_mail = mail_tmp AND user_password = password_tmp)THEN
		SELECT 1 as result, r.role_name as role 
        FROM tb_user s INNER JOIN tb_role r ON s.role_id= r.role_id 
        WHERE s.user_mail= mail_tmp AND s.user_password = password_tmp; 
    ELSE
		SELECT 0 as result, '' as role;
    END IF;
END $$
DELIMITER ;