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

-- CALL sp_select_user('bbbbarrientos@hotmail.com');

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

-- CALL sp_select_facilities(1);
-- DROP PROCEDURE sp_select_facilities;


DELIMITER $$
CREATE PROCEDURE sp_select_facilities(
id_tmp INTEGER
)
BEGIN
	SELECT facilities_name facilities
    FROM tb_facilities f INNER JOIN tb_destination_facilities df ON f.facilities_id = df.facilities_id
    INNER JOIN tb_destination d ON df.destination_id = d.destination_id
    WHERE d.destination_id = id_tmp;
END $$
DELIMITER ;

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
				INSERT INTO tb_destination_facilities (destination_id,facilities_id)
                VALUES (@i, @idfacilities);
                SET @tmp = @tmp+1;
            END IF;
		END WHILE;
        SET @i= @i+1;
    END WHILE;
    SELECT @i;
END $$
DELIMITER ;

CALL sp_insert_facilities();
