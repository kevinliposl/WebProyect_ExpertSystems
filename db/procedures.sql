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

DELIMITER $$
CREATE PROCEDURE sp_select_all_destination(
)
BEGIN
	SELECT destination_id id, destination_name name, destination_location location, destination_attraction_id attraction, destination_stars stars, type_name type,
	destination_description description, destination_url_video url_video, destination_url_photo url_photo, destination_latitude latitude, destination_longitude longitude,
    attraction_name
    FROM tb_destination INNER JOIN tb_type ON destination_type_id = type_id INNER JOIN tb_attraction ON attraction_id = destination_attraction_id
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
