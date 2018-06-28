DELIMITER $$
CREATE PROCEDURE sp_save_all_naive_bayes_data(
  _event_name VARCHAR(255),
  classProbability JSON,
  chanceClassFrequency JSON
)
BEGIN
	DELETE FROM tb_training_set WHERE event_name = _event_name;
    INSERT INTO tb_training_set
    VALUES(_event_name, classProbability, chanceClassFrequency);
END $$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE sp_get_two_destination(
  id_attraction_one INTEGER,
  id_attraction_two INTEGER
)
BEGIN
	SELECT *
    FROM tb_destination
    WHERE destination_attraction_id = id_attraction_one OR destination_attraction_id = id_attraction_two;
END $$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE sp_get_all_naive_bayes_data(
  _event_name VARCHAR(255)
)
BEGIN
    SELECT *
    FROM tb_training_set
    WHERE event_name = _event_name;
END $$
DELIMITER ; 

-- CALL sp_sign_in_user('kevinliposl@gmail.com','1234');

DELIMITER $$
CREATE PROCEDURE sp_sign_in_user(
mail_tmp VARCHAR(255),
password_tmp VARCHAR(255)
)
BEGIN
	IF EXISTS(SELECT * FROM tb_user WHERE trim(user_mail) = trim(mail_tmp) AND trim(user_password) = trim(password_tmp))THEN
		SELECT 1 as result, r.role_name as role, s.user_id as id, s.user_name as name, s.user_lastname as lastname, st.style_name as style 
        FROM tb_user s 
        INNER JOIN tb_role r ON s.role_id= r.role_id 
        INNER JOIN tb_style st ON st.style_id = s.user_style
        WHERE s.user_mail= mail_tmp AND s.user_password = password_tmp; 
    ELSE
		SELECT 0 as result, '' as role;
    END IF;
END $$
DELIMITER ;

-- CALL sp_sign_up_user('bbbbarrientos@hotmail.com','1234','Pablo','Barrientos Brenes','Conservador');

DELIMITER $$
CREATE PROCEDURE sp_sign_up_user(
mail_tmp VARCHAR(255),
password_tmp VARCHAR(255),
name_tmp VARCHAR(255),
lastname_tmp VARCHAR (255),
style_tmp VARCHAR(255)
)
BEGIN
	IF NOT EXISTS(SELECT * FROM tb_user WHERE user_mail = mail_tmp)THEN
		SET @tmp = (SELECT style_id FROM tb_style WHERE LOWER(style_name) = LOWER(style_tmp));
        INSERT INTO tb_user(user_mail, user_password, user_name, user_lastname, user_style,role_id) 
        VALUES (mail_tmp, password_tmp,name_tmp, lastname_tmp,@tmp,2);
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
	SELECT 1 as result, user_id as id, user_mail as mail, user_name as name, user_lastname as lastname, style_name as style
    FROM tb_user
    INNER JOIN tb_style ON style_id = user_style
    WHERE user_mail = mail_tmp;
ELSE
	SELECT 0 as result;
END IF;
END $$
DELIMITER ;

-- CALL sp_remember_password('kevinliposl@gmail.com');

DELIMITER $$
CREATE PROCEDURE sp_remember_password(
mail_tmp VARCHAR(255)
)
BEGIN
	IF EXISTS(SELECT user_mail FROM tb_user WHERE user_mail = mail_tmp)THEN 
		SELECT 1 as result, user_password as password
		FROM tb_user
		WHERE user_mail = mail_tmp;
	ELSE
		SELECT 0 as result;
	END IF;
END $$
DELIMITER ;

-- CALL sp_update_user('bbbbarrientos@hotmail.com','4321','Osvaldo','Loaiza','Conservador');

DELIMITER $$
CREATE PROCEDURE sp_update_user(
mail_tmp VARCHAR(255),
password_tmp VARCHAR(255),
name_tmp VARCHAR(255),
lastname_tmp VARCHAR (255),
style_tmp VARCHAR(255)
)
BEGIN
	IF EXISTS(SELECT * FROM tb_user WHERE user_mail = mail_tmp)THEN
		SET @tmp =(SELECT style_id FROM tb_style WHERE style_name = style_tmp); 
		UPDATE tb_user 
        SET 
        user_password = password_tmp,
        user_name = name_tmp,
        user_lastname = lastname_tmp,
        user_style = @tmp
        WHERE user_mail = mail_tmp;
        SELECT 1 as result;
    ELSE
		SELECT 0 as result;
    END IF;
END $$
DELIMITER ;

DELIMITER $$
CREATE FUNCTION myrandom(
    pmin INTEGER,
    pmax INTEGER
)
RETURNS INTEGER(11)
DETERMINISTIC
NO SQL
SQL SECURITY DEFINER
BEGIN
  RETURN floor(pmin+RAND()*(pmax-pmin));
END $$
DELIMITER ; 

-- DROP PROCEDURE sp_select_all_destination;

DELIMITER $$
CREATE PROCEDURE sp_select_all_destination(
)
BEGIN
	SELECT destination_id id, destination_name name, location_name location, location_id, 
    attraction_name attraction, attraction_id, destination_stars stars, type_name type, type_id,
    destination_style_id style, style_name, destination_price price,
	destination_description description, destination_url_video url_video, 
    destination_url_photo url_photo, destination_latitude latitude, 
    destination_longitude longitude
    FROM tb_destination 
    INNER JOIN tb_type ON destination_type_id = type_id 
    INNER JOIN tb_attraction ON attraction_id = destination_attraction_id
    INNER JOIN tb_location ON location_id = destination_location
    INNER JOIN tb_style ON style_id = destination_style_id
    ORDER BY destination_id asc;
END $$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE sp_select_all_destination_basic_training(
)
BEGIN
	SELECT location_id, attraction_id, type_id, destination_stars stars,
    destination_style_id style_id
    FROM tb_destination 
    INNER JOIN tb_type ON destination_type_id = type_id 
    INNER JOIN tb_attraction ON attraction_id = destination_attraction_id
    INNER JOIN tb_location ON location_id = destination_location
    INNER JOIN tb_style ON style_id = destination_style_id
    ORDER BY destination_id asc;
END $$
DELIMITER ;

-- CALL sp_select_facilities(1);
-- DROP PROCEDURE sp_select_facilities;


DELIMITER $$
CREATE PROCEDURE sp_select_facilities(
id_tmp INTEGER
)
BEGIN
	SELECT facilities_name facilities
    FROM tb_facilities f 
    INNER JOIN tb_destination_facilities df ON f.facilities_id = df.facilities_id
    INNER JOIN tb_destination d ON df.destination_id = d.destination_id
    WHERE d.destination_id = id_tmp;
END $$
DELIMITER ;


DELIMITER $$ 
CREATE PROCEDURE sp_select_all_attraction()
BEGIN
	SELECT attraction_name name, attraction_id id FROM tb_attraction;
END $$
DELIMITER ;

DELIMITER $$ 
CREATE PROCEDURE sp_select_all_location()
BEGIN
	SELECT location_name name, location_id id FROM tb_location;
END $$
DELIMITER ;

DELIMITER $$ 
CREATE PROCEDURE sp_select_all_facilities()
BEGIN
	SELECT facilities_name name, facilities_id id FROM tb_facilities;
END $$
DELIMITER ;

DELIMITER $$ 
CREATE PROCEDURE sp_select_all_type()
BEGIN
	SELECT type_name name, type_id id FROM tb_type;
END $$
DELIMITER ;


DELETE FROM tb_destination
WHERE destination_id = 205;

DELETE FROM tb_destination_facilities
WHERE destination_id = 205;

DELIMITER $$ 
CREATE PROCEDURE sp_insert_facility(
id_tmp INTEGER,
id_facility INTEGER
)
BEGIN
	INSERT INTO tb_destination_facilities(destination_id,facilities_id)
    VALUES(id_tmp,id_facility);
END $$
DELIMITER ;

-- $result = $model->insert($_POST['name'], $_POST['description'], $_POST['attraction'], $_POST['type'], $_POST['location'], $_POST['$price']
--                    , $_POST['latitude'], $_POST['logitude'], $_POST['video'], $_POST['image'], rand(1, 5), rand(1, 3)




CALL sp_insert_destination('prueba','descripción',1,1,1,200,'lati','long123123','videovideo','photo',3,2);

DELIMITER $$ 
CREATE PROCEDURE sp_insert_destination(
	name_tmp VARCHAR(255),
	description_tmp VARCHAR(1000),
	attraction_tmp INTEGER,
	type_tmp INTEGER,
	location_tmp INTEGER,
	price_tmp INTEGER,
	latitude_tmp VARCHAR(20),
	logitude_tmp VARCHAR(20),
	video_tmp VARCHAR(255),
	photo_tmp VARCHAR(255),
	star_tmp INTEGER,
	style_tmp INTEGER
)
BEGIN
	INSERT INTO tb_destination(destination_name, destination_description, destination_location, destination_url_video,destination_url_photo,
	destination_latitude, destination_longitude, destination_stars, destination_price, destination_type_id,destination_attraction_id, destination_style_id)
	VALUES(name_tmp,description_tmp,location_tmp,video_tmp,photo_tmp,latitude_tmp,logitude_tmp,star_tmp,price_tmp, type_tmp,attraction_tmp,style_tmp);
	SET @i= (last_insert_id());
	IF EXISTS(SELECT * FROM tb_destination WHERE destination_id = @i)THEN 
		SELECT 1 as result, @i as id;  
	ELSE
		SELECT 0 as result;
    END IF;
END $$
DELIMITER ;

-- DROP PROCEDURE sp_select_destination

call sp_select_facilities(10);

DELIMITER $$ 
CREATE PROCEDURE sp_select_destination(
id_tmp INTEGER
)
BEGIN
	IF EXISTS(SELECT * FROM tb_destination WHERE destination_id = id_tmp)THEN 
		SELECT *, 1 as result 
        FROM tb_destination
        WHERE destination_id = id_tmp;
	ELSE
		SELECT 0 as result;
    END IF;
END $$
DELIMITER ;

DELIMITER $$ 
CREATE PROCEDURE sp_delete_destination(
id_tmp INTEGER
)
BEGIN
	IF EXISTS(SELECT * FROM tb_destination WHERE destination_id = id_tmp)THEN 
		DELETE FROM tb_destination_facilities
        WHERE facilities_id = id_tmp;
        DELETE FROM tb_destination
        WHERE destination_id = id_tmp;
        SELECT 1 as result;
	ELSE
		SELECT 0 as result;
    END IF;
END $$
DELIMITER ;

DROP PROCEDURE sp_insert_facilities;

DELIMITER $$
CREATE PROCEDURE sp_insert_facilities()
BEGIN
	SET @c = (SELECT COUNT(*) FROM tb_destination); 
    SET @d = (SELECT COUNT(*) FROM tb_facilities);
    SET @i = (SELECT COUNT(*) FROM tb_destination_facilities)+1;
    
    WHILE @i <= @c DO
		SET@j = (SELECT myRandom(1,3));
		SET@tmp = 0;
        WHILE @tmp <= @j DO
			SET @idfacilities = (SELECT myRandom(1,@d));
			IF NOT EXISTS(SELECT * FROM tb_destination_facilities WHERE facilities_id = @idfacilities AND destination_id= @i)THEN
				IF EXISTS(SELECT * FROM tb_destination WHERE destination_id = @i)THEN
				INSERT INTO tb_destination_facilities (destination_id,facilities_id)
                VALUES (@i, @idfacilities);
                END IF;
                SET @tmp = @tmp+1;
            END IF;
		END WHILE;
        SET @i= @i+1;
    END WHILE;
    SELECT @i;
END $$
DELIMITER ;

CALL sp_insert_facilities();
