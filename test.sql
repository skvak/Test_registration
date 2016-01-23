-- Valentina Studio --
-- MySQL dump --
-- ---------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
-- ---------------------------------------------------------


-- CREATE TABLE "Cities" -----------------------------------
CREATE TABLE `Cities` ( 
	`id_city` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`id_country` Int( 11 ) NOT NULL,
	`city_name` VarChar( 30 ) NOT NULL,
	PRIMARY KEY ( `id_city` ) )
ENGINE = InnoDB
AUTO_INCREMENT = 10;
-- ---------------------------------------------------------


-- CREATE TABLE "Countries" --------------------------------
CREATE TABLE `Countries` ( 
	`id_country` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`country_name` VarChar( 30 ) NOT NULL,
	PRIMARY KEY ( `id_country` ) )
ENGINE = InnoDB
AUTO_INCREMENT = 6;
-- ---------------------------------------------------------


-- CREATE TABLE "Invites" ----------------------------------
CREATE TABLE `Invites` ( 
	`invite` Int( 6 ) NOT NULL,
	`status` Int( 1 ) NOT NULL,
	`date_status` Timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY ( `invite` ) )
ENGINE = InnoDB;
-- ---------------------------------------------------------


-- CREATE TABLE "users" ------------------------------------
CREATE TABLE `users` ( 
	`id_user` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`login` VarChar( 20 ) NOT NULL,
	`password` VarChar( 20 ) NOT NULL,
	`phone` VarChar( 15 ) NOT NULL,
	`id_city` Int( 11 ) NULL,
	`invite` Int( 6 ) NOT NULL,
	PRIMARY KEY ( `id_user` ),
	CONSTRAINT `invite` UNIQUE( `invite` ),
	CONSTRAINT `login` UNIQUE( `login` ) )
ENGINE = InnoDB
AUTO_INCREMENT = 18;
-- ---------------------------------------------------------


-- Dump data of "Cities" -----------------------------------
INSERT INTO `Cities`(`id_city`,`id_country`,`city_name`) VALUES ( '1', '5', 'London' );
INSERT INTO `Cities`(`id_city`,`id_country`,`city_name`) VALUES ( '4', '1', 'Lvov' );
INSERT INTO `Cities`(`id_city`,`id_country`,`city_name`) VALUES ( '7', '4', 'Tokio' );
INSERT INTO `Cities`(`id_city`,`id_country`,`city_name`) VALUES ( '10', '1', 'Kharkov' );
INSERT INTO `Cities`(`id_city`,`id_country`,`city_name`) VALUES ( '11', '2', 'Berlin' );
INSERT INTO `Cities`(`id_city`,`id_country`,`city_name`) VALUES ( '12', '3', 'Paris' );
-- ---------------------------------------------------------


-- Dump data of "Countries" --------------------------------
INSERT INTO `Countries`(`id_country`,`country_name`) VALUES ( '1', 'Ukraine' );
INSERT INTO `Countries`(`id_country`,`country_name`) VALUES ( '2', 'Germany' );
INSERT INTO `Countries`(`id_country`,`country_name`) VALUES ( '3', 'France' );
INSERT INTO `Countries`(`id_country`,`country_name`) VALUES ( '4', 'Japan' );
INSERT INTO `Countries`(`id_country`,`country_name`) VALUES ( '5', 'Great Britain' );
-- ---------------------------------------------------------


-- Dump data of "Invites" ----------------------------------
INSERT INTO `Invites`(`invite`,`status`,`date_status`) VALUES ( '111111', '1', '2016-01-23 10:36:25' );
INSERT INTO `Invites`(`invite`,`status`,`date_status`) VALUES ( '123456', '0', '2016-01-22 23:04:13' );
INSERT INTO `Invites`(`invite`,`status`,`date_status`) VALUES ( '222221', '0', '2016-01-23 10:32:38' );
INSERT INTO `Invites`(`invite`,`status`,`date_status`) VALUES ( '654321', '0', '2016-01-23 10:32:38' );
-- ---------------------------------------------------------


-- Dump data of "users" ------------------------------------
INSERT INTO `users`(`id_user`,`login`,`password`,`phone`,`id_city`,`invite`) VALUES ( '21', 'login', 'password', '0777766555', '11', '111111' );
-- ---------------------------------------------------------


-- CREATE INDEX "lnk_Cities_Countries" ---------------------
CREATE INDEX `lnk_Cities_Countries` USING BTREE ON `Cities`( `id_country` );
-- ---------------------------------------------------------


-- CREATE INDEX "lnk_users_Cities" -------------------------
CREATE INDEX `lnk_users_Cities` USING BTREE ON `users`( `id_city` );
-- ---------------------------------------------------------


-- CREATE TRIGGER "inv" ------------------------------------

delimiter $$$ 
CREATE DEFINER=`root`@`%` TRIGGER inv AFTER INSERT ON users
FOR EACH ROW
UPDATE invites SET status = 1 WHERE invites.invite = NEW.invite;

$$$ delimiter ;
-- ---------------------------------------------------------


-- CREATE LINK "lnk_Cities_Countries" ----------------------
ALTER TABLE `Cities`
	ADD CONSTRAINT `lnk_Cities_Countries` FOREIGN KEY ( `id_country` )
	REFERENCES `Countries`( `id_country` )
	ON DELETE Cascade
	ON UPDATE Cascade;
-- ---------------------------------------------------------


-- CREATE LINK "lnk_users_Cities" --------------------------
ALTER TABLE `users`
	ADD CONSTRAINT `lnk_users_Cities` FOREIGN KEY ( `id_city` )
	REFERENCES `Cities`( `id_city` )
	ON DELETE Cascade
	ON UPDATE Cascade;
-- ---------------------------------------------------------


-- CREATE LINK "lnk_Users_Invites" -------------------------
ALTER TABLE `users`
	ADD CONSTRAINT `lnk_Users_Invites` FOREIGN KEY ( `invite` )
	REFERENCES `Invites`( `invite` )
	ON DELETE Cascade
	ON UPDATE Cascade;
-- ---------------------------------------------------------


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- ---------------------------------------------------------


