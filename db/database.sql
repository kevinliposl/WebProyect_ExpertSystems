CREATE DATABASE expert_systems_b40920_b46549;

USE expert_systems_b40920_b46549;

CREATE TABLE tb_role(
	id INTEGER AUTO_INCREMENT,
	role VARCHAR(20),
	CONSTRAINT PRIMARY KEY(id)
);

CREATE TABLE tb_user(
	id INTEGER AUTO_INCREMENT,
	mail VARCHAR(255) NOT NULL,
    password VARCHAR(255)NOT NULL,
	id_role INTEGER NOT NULL,
	CONSTRAINT PRIMARY KEY(id,id_role)
);

/* ROLES */
INSERT INTO tb_role (role)
VALUES('adm');
INSERT INTO tb_role (role)
VALUES('usr');

/* USERS */
INSERT INTO tb_user(mail,password,id_role)
VALUES('adm@adm.com','1234',1);

INSERT INTO tb_user(mail,password,id_role)
VALUES('usr@usr.com','1234',2);

-- CALL sp_sign_in_user('usr@usr.com','1234');
-- DROP PROCEDURE sp_sign_in_user;

CALL sp_sign_in_user('adm@adm.com','1234');

DELIMITER $$
CREATE PROCEDURE sp_sign_in_user(
mail_tmp VARCHAR(255),
password_tmp VARCHAR(255)
)
BEGIN
	IF EXISTS(SELECT * FROM tb_user WHERE mail = mail_tmp AND password = password_tmp)THEN
		SELECT 1 as result, r.role as role FROM tb_user s INNER JOIN tb_role r ON s.id_role= r.id WHERE mail= mail_tmp AND password= password_tmp; 
    ELSE
		SELECT 0 as result, '' as role;
    END IF;
END $$
DELIMITER ;
