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

/* USUARIOS */
CREATE TABLE tb_user(
	user_id INTEGER AUTO_INCREMENT,
	user_mail VARCHAR(255) UNIQUE NOT NULL,
    user_password VARCHAR(255)  NOT NULL,
    user_name VARCHAR(255) NOT NULL,
    user_lastname VARCHAR(255)  NOT NULL,
    user_style VARCHAR(255) NOT NULL,
	role_id INTEGER NOT NULL,
	CONSTRAINT PRIMARY KEY(user_id,role_id),
    CONSTRAINT FOREIGN KEY(role_id) REFERENCES tb_role(role_id)
);

INSERT INTO tb_user(user_mail,user_password,user_name,user_lastname,user_style,role_id) VALUES
	('adm@adm.com','1234','admin','admin','Aventurero',1),
	('pablo@pablo.com','1234','Pablo','Barrientos','Conservador',2),
	('kevinliposl@gmail.com','1234','Kevin','Sandoval','Investigador',2);

/*TIPO - GEOGRAFIA DONDE SE LOCALIZA*/
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

CREATE TABLE tb_destination(
	destination_id INTEGER AUTO_INCREMENT,
	destination_name VARCHAR(255),
	destination_description VARCHAR(1000) NOT NULL,
	destination_location VARCHAR(255) NOT NULL, 
	destination_url_video VARCHAR(255) NOT NULL,
    destination_url_photo VARCHAR(255),
	destination_latitude VARCHAR(20) NOT NULL,
	destination_longitude VARCHAR(20) NOT NULL,
	destination_views INTEGER NOT NULL,
	destination_votes INTEGER NOT NULL,
    destination_stars INTEGER NOT NULL,
    destination_price INTEGER NOT NULL,
	destination_type_id INTEGER NOT NULL,
    destination_attraction_id INTEGER NOT NULL,
	CONSTRAINT PRIMARY KEY (destination_id),
    CONSTRAINT FOREIGN KEY (destination_type_id) REFERENCES tb_type(type_id),
    CONSTRAINT FOREIGN KEY (destination_attraction_id) REFERENCES tb_attraction(attraction_id)
);

INSERT INTO tb_destination(destination_name, destination_description, destination_location, destination_url_video, destination_url_photo, destination_latitude,
    destination_longitude, destination_type_id, destination_views, destination_votes, destination_stars,destination_price,destination_attraction_id) VALUES
    ('Apartothel Tuanis',
    'Tuanis Hotel Jaco Beach es un lugar respetuoso de la Tierra y el medio ambiente.',
    'Puntarenas',
    'https://www.youtube.com/embed/OwEXqS5QvZY',
    'http://www.canatur.org/quimo/userfiles/FCKE/image/Apartothel%20Tuanis.png',
    '9.6099','-84.625446',2,0,0,5,20000,7),
    ('Arenal Observatory Lodge',
    'Este alojamiento tranquilo con un anexo se encuentra en una granja de 352 hectáreas rodeada de selva tropical en el parque nacional Volcán Arenal.',
    'Alajuela',
    'https://www.youtube.com/embed/22Dukg89YlY',
    'http://www.canatur.org/quimo/userfiles/FCKE/image/ARENAL%20OBSERVATORY%20LODGE.png',
    '10.4379798','-84.7101822',3,0,0,1,25000,6),
    ('Buena Vista Lodge y Aventura',
    'La esencia de Costa Rica en un solo lugar! naturaleza, cultura, aventura, bienestar & sostenibilidad. Una aventura que lo llevará a descubrir Costa Rica en los altos del Rincón de la Vieja.',
    'Guanacaste',
    'https://www.youtube.com/embed/-JmGTE2J8i4',
    'http://www.canatur.org/quimo/userfiles/FCKE/image/BuenaVistaLodge&Adventure.jpg',
    '10.7965365','-85.4043507',2,0,0,2,15000,5),
    ('Cañon de la Vieja Lodge',
    'Este alojamiento de aventuras informal está rodeado de un bosque tropical y se encuentra a 8 km del parque Mario Cañas Ruiz y a 9 km del museo de Guanacaste.',
    'Guanacaste',
    'https://www.youtube.com/embed/zJUl8GMSaek',
    'http://www.canatur.org/quimo/userfiles/FCKE/image/site/Canon_de_la_Vieja_Lodge.png',
    '10.6796248','-85.4562437',1,0,0,4,25000,4),
    ('Casa Donna Rosa B&B',
    'Casa Donna Rosa es un encantador B & B con todas las comodidades modernas. Ubicado en el corazón de Nuevo Arenal, cerca de todas las atracciones que el Parque Nacional Arenal tiene para ofrecer.',
    'Guanacaste',
    'https://www.youtube.com/embed/LMySsEA7i2A',
    'http://www.canatur.org/quimo/userfiles/FCKE/image/casa%20do%C3%B1a%20rosa.jpg',
    '10.544467','-84.898873',3,0,0,4,30000,3),
    ('Condovac La Costa, S.A',
    'Somos un club de playa recreacional para vacaciones familiares, sostenible, de excelente calidad, con instalaciones y servicios adecuados que llenen las expectativas del socio, el cliente y sus familias.',
    'Guanacaste',
    'https://www.youtube.com/embed/BiLX3ZaKADk',
    'http://www.canatur.org/quimo/userfiles/FCKE/image/site/Condovac_La_Costa_S_A_.png',
    '10.5806094','-85.6739873',2,0,0,2,35000,2),
	('Grupo Mawamba',
    'Grupo Mawamba, is a Costa Rican, family owned company with more than 30 years of experience in the hospitality business. The company is still run and operated by the Dada family, with the mission of sharing with our visitors the true tradition of Costa Rican Hospitality.',
    'Heredia',
    'https://www.youtube.com/embed/kJr8yBWO_6I',
    'http://www.canatur.org/quimo/userfiles/FCKE/image/Mawamba.jpg',
    '9.9879529','-84.169295',1,0,0,4,10000,1),
	('Puntarenas',
    'Monteverde Costa Rica is consolidated as one of the three most important tourist destinations of Costa Rica, and as an international symbol of the conservation of tropical forests.',
    'Puntarenas',
    'https://www.youtube.com/embed/y0Lq-sR-T4U',
    'http://www.canatur.org/quimo/userfiles/FCKE/image/Caribe%20Fun%20Turs.png',
    '10.313825','-84.81655',3,0,0,5,20000,7),
    ('Hotel Belmar',
    'Este hotel lujoso está situado en la reserva biológica Bosque Nuboso de Monteverde, a 1 km del zoológico The Bat Jungle y a 2 km del Jardín de Mariposas de Monteverde.',
    'Puntarenas',
    'https://www.youtube.com/embed/o1ikKvg4Dq0',
    'http://www.canatur.org/quimo/userfiles/FCKE/image/site/Hotel_Belmar.png',
    '10.312542','-84.811004',2,0,0,5,23000,5),
    ('Hotel Bosque del Mar',
    'Déjese atrapar por el encanto de nuestro hotel y rodéese de un paraíso natural que captura la tranquilidad del bosque y la mezcla con el fervor característico de la playa en una experiencia de perfecta armonía.',
    'Guanacaste',
    'https://www.youtube.com/embed/aSukc6XuRdE',
    'http://www.canatur.org/quimo/userfiles/FCKE/image/Hotel%20Bosque%20del%20Mar.png',
    '10.5711946','-85.6812948',3,0,0,1,27000,3),
	('Hotel Boutique Jade',
    'En 1972 Jürgen Mormels llegó a Costa Rica de vacaciones. Durante su estadía, la oportunidad de administrar el restaurante Le Bastille fue el primer paso para su "experiencia costarricense".',
    'San José',
    'https://www.youtube.com/embed/UTZ2krwRrIo',
    'http://www.canatur.org/quimo/userfiles/FCKE/image/Hotel%20Boutique%20Jade.png',
    '9.9340006','-84.0586767',1,0,0,3,35000,1),    
    ('Hotel Cacts',
    'El Hotel Cacts está situado a 1,7 km del parque central de San José y a 1 km del parque metropolitano La Sabana y alberga una bañera de hidromasaje y una piscina al aire libre. Además, hay conexión Wi-Fi gratuita en todas las instalaciones del hotel.',
    'San José',
    'https://www.youtube.com/embed/DTK0AUrmhVU',
    'http://www.canatur.org/quimo/userfiles/FCKE/image/Hotel%20cacts.jpg',
    '9.937762','-84.09208',1,0,0,3,33000,6),
    ('Hotel Cipreses Monteverde',
    'Este sencillo hotel, ubicado en construcciones de madera de poca altura y rodeado por los bosques montañosos de Monteverde, se encuentra a 2 km de la Reserva biológica Bosque Nuboso Monteverde y a 5 km del parque de aventuras Selvatura Park.',
    'Puntarenas',
    'https://www.youtube.com/embed/HjkvKIl2KEw',
    'http://www.canatur.org/quimo/userfiles/FCKE/image/cipreses.jpg',
    '10.3221559','-84.8237991',3,0,0,4,22000,4),
	('Hotel Colonial',
    'Este hotel exclusivo, situado en el Centro Cívico Nacional, se encuentra a 5 minutos a pie del Teatro Nacional de Costa Rica y a 6 minutos a pie del Museo del Oro Precolombino.',
    'San José',
    'https://www.youtube.com/embed/FXD3zIY5Go',
    'http://www.canatur.org/quimo/userfiles/FCKE/image/Hotel%20Colonial.jpg',
    '9.931431','-84.073935',1,0,0,5,30000,2),
	('Hotel & Country Club Suerre',
    'Este hotel de conferencias sencillo de estilo colonial con jardín tropical está situado a 3 km del Aeropuerto de Guapiles y a 30 km del Parque Nacional Braulio Carrillo',
    'Limón',
    'https://www.youtube.com/embed/2nkZWdYgaaU',
    'http://www.canatur.org/quimo/userfiles/FCKE/image/suere.png',
    '10.2166111','-83.7819816',1,0,0,3,20000,7),
	('Laguna Lodge Tortuguero',
    'Este hotel ecológico aislado, al que solamente se puede acceder en lancha, se encuentra en una península situada entre la Laguna Tortuguero y el mar Caribe y está situado entre la selva y los humedales del parque nacional Tortuguero.',
    'Limón',
    'https://www.youtube.com/embed/p5CfTZa349g',
    'http://www.canatur.org/quimo/userfiles/FCKE/image/Laguna%20Lodge%20Tortuguero.png',
    '10.5621043','-83.5133503',2,0,0,1,17000,6),
	('Samasati Retreat and Rainforest Sanctuary',
    'Este tranquilo resort de pintorescos bungalós de madera está situado en una reserva de selva tropical de 100 hectáreas. Se encuentra a 7 km de los sencillos restaurantes y el ocio nocturno de Puerto Viejo de Talamanca, así como a 11 km del Centro de Rescate Jaguar.',
    'Limón',
    'https://www.youtube.com/embed/9HUVInyO5qo',
    'http://www.canatur.org/quimo/userfiles/FCKE/image/site/Samasati_Retreat_and_Rainforest_Sanctuary.png',
    '9.6548232','-82.8061867',2,0,0,1,15000,5),
	('Product C',
    'Somos un restaurante a la carta de mariscos y pescados frescos. Contamos con un bar de cerveza artesanal, donde ofrecemos una gran variedad de cervezas.',
    'San José',
    'https://www.youtube.com/embed/PBsrdCVJ0nA',
    'http://www.canatur.org/quimo/userfiles/FCKE/image/Product%20c.jpg',
    '9.937386','-84.143354',1,0,0,3,12000,4),
	('Tortillería y Café',
    'Somos un restaurante a la carta de mariscos y pescados frescos. Contamos con un bar de cerveza artesanal, donde ofrecemos una gran variedad de cervezas.',
    'San José',
    'https://www.youtube.com/embed/A5wvEPusTpk',
    'http://www.canatur.org/quimo/userfiles/FCKE/image/tortiller%C3%ADa.jpg',
    '9.934928','-84.079237',1,0,0,2,19000,3),
    ('Rescate Animal Zooave',
    'En 1990 nació Rescate Animal Zooave bajo una nueva administración con una visión conservacionista y por el bienestar animal. El antiguo Zooave abrió sus puertas en los años 60. Fue un pequeño zoológico privado ubicado en la Garita de Alajuela.',
    'Alajuela',
    'https://www.youtube.com/embed/JcUfs9E7axY',
    'http://www.canatur.org/quimo/userfiles/FCKE/image/Logo-Zooave-1(1).jpg',
    '10.0123357','-84.2756121',1,0,0,5,11000,1);

CREATE TABLE tb_destination_facilities(
	destination_id INTEGER,
	facilities_id INTEGER,
	CONSTRAINT PRIMARY KEY(destination_id,facilities_id),
    CONSTRAINT FOREIGN KEY(destination_id) REFERENCES tb_destination(destination_id),
    CONSTRAINT FOREIGN KEY(facilities_id) REFERENCES tb_facilities(facilities_id)
);

INSERT INTO tb_destination_facilities VALUES
(1,2),
(1,6),
(1,4); 
INSERT INTO tb_destination_facilities VALUES
(2,3),
(2,4),
(2,5); 
INSERT INTO tb_destination_facilities VALUES
(3,1); 
INSERT INTO tb_destination_facilities VALUES
(4,2),
(4,4);
INSERT INTO tb_destination_facilities VALUES
(5,5); 
INSERT INTO tb_destination_facilities VALUES
(6,7); 
INSERT INTO tb_destination_facilities VALUES
(7,2),
(7,3); 
INSERT INTO tb_destination_facilities VALUES
(8,3),
(8,5); 
INSERT INTO tb_destination_facilities VALUES
(9,1),
(9,3); 
INSERT INTO tb_destination_facilities VALUES
(10,3),
(10,7); 
INSERT INTO tb_destination_facilities VALUES
(11,2),
(11,5),
(11,4); 
INSERT INTO tb_destination_facilities VALUES
(12,3),
(12,4),
(12,5); 
INSERT INTO tb_destination_facilities VALUES
(13,1); 
INSERT INTO tb_destination_facilities VALUES
(14,2),
(14,4);
INSERT INTO tb_destination_facilities VALUES
(15,5); 
INSERT INTO tb_destination_facilities VALUES
(16,7); 
INSERT INTO tb_destination_facilities VALUES
(17,2),
(17,3); 
INSERT INTO tb_destination_facilities VALUES
(18,3),
(18,5); 
INSERT INTO tb_destination_facilities VALUES
(19,1),
(19,3); 
INSERT INTO tb_destination_facilities VALUES
(20,3),
(20,7); 

-- SE PUEDE CAMBIAR, ES SOLO PARA PRESERVAR LA IDEA
/*CREATE TABLE tb_user_vote(
	destination_id INTEGER AUTO_INCREMENT,
	user_id INTEGER NOT NULL,
	CONSTRAINT PRIMARY KEY (destination_id, user_id),
	CONSTRAINT FOREIGN KEY (destination_id) REFERENCES tb_destination(destination_id),
	CONSTRAINT FOREIGN KEY (user_id) REFERENCES tb_user(user_id)
);
*/
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
		SELECT 1 as result, r.role_name as role, s.user_id as id, s.user_name as name, s.user_lastname as lastname, s.user_style as style 
        FROM tb_user s INNER JOIN tb_role r ON s.role_id= r.role_id 
        WHERE s.user_mail= mail_tmp AND s.user_password = password_tmp; 
    ELSE
		SELECT 0 as result, '' as role;
    END IF;
END $$
DELIMITER ;

-- CALL sp_sign_up_user('kevin_dmsk8@hotmail.com','Kevin','Sandoval','1234','Conservador');

DELIMITER $$
CREATE PROCEDURE sp_sign_up_user(
mail_tmp VARCHAR(255),
name_tmp VARCHAR(255),
lastname_tmp VARCHAR (255),
password_tmp VARCHAR(255),
style_tmp VARCHAR(255)
)
BEGIN
	IF NOT EXISTS(SELECT * FROM tb_user WHERE user_mail = mail_tmp)THEN
		INSERT INTO tb_user(user_mail,user_password,user_name,user_lastname,user_style,role_id) VALUES
		(mail_tmp,password_tmp,name_tmp,lastname_tmp,style_tmp,2);
        SELECT 1 as result;
    ELSE
		SELECT 0 as result;
    END IF;
END $$
DELIMITER ;

-- CALL sp_select_user('kevinliposl@gmail.com');

DELIMITER $$
CREATE PROCEDURE sp_select_user(
mail_tmp VARCHAR(255)
)
BEGIN
IF EXISTS(SELECT user_mail FROM tb_user WHERE user_mail = mail_tmp)THEN 
	SELECT 1 as result, user_id as id, user_mail as mail, user_name as name, user_lastname as lastname, user_style as style 
    FROM tb_user 
    WHERE user_mail = mail_tmp;
ELSE
	SELECT 0 as result;
END IF;
END $$
DELIMITER ;

-- CALL sp_update_user('kevinliposl@gmail.com','Osvaldo','Loaiza','4321','Conservador');

DELIMITER $$
CREATE PROCEDURE sp_update_user(
mail_tmp VARCHAR(255),
name_tmp VARCHAR(255),
lastname_tmp VARCHAR (255),
password_tmp VARCHAR(255),
style_tmp VARCHAR(255)
)
BEGIN
	IF EXISTS(SELECT * FROM tb_user WHERE user_mail = mail_tmp)THEN
		UPDATE tb_user 
        SET 
        user_password = password_tmp,
        user_name = name_tmp,
        user_lastname = lastname_tmp,
        user_style = style_tmp
        WHERE user_mail = mail_tmp;
        SELECT 1 as result;
    ELSE
		SELECT 0 as result;
    END IF;
END $$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE sp_select_all_destination(
)
BEGIN
	SELECT destination_id id, destination_name name, destination_location location, destination_attraction_id attraction, destination_stars stars, type_name type,
	destination_description description, destination_url_video url_video, destination_url_photo url_photo, destination_latitude latitude, destination_longitude longitude,
    attraction_name
    FROM tb_destination INNER JOIN tb_type ON destination_type_id = type_id INNER JOIN tb_attraction ON attraction_id = destination_attraction_id;
END $$
DELIMITER ;
