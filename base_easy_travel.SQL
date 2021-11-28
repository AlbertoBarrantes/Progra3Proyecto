













-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`user` ;

CREATE TABLE IF NOT EXISTS `mydb`.`user` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(20) NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `last_name1` VARCHAR(45) NOT NULL,
  `last_name2` VARCHAR(45) NOT NULL,
  `email` VARCHAR(75) NOT NULL,
  `birth_date` DATE NOT NULL,
  `password` VARCHAR(20) NOT NULL,
  `user_profile_picture` LONGBLOB NULL,
  `address` VARCHAR(100) NOT NULL,
  `work_phone` VARCHAR(45) NOT NULL,
  `personal_phone` VARCHAR(45) NOT NULL,
  `lastUser` VARCHAR(20) NULL,
  `lastModification` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`admin`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`admin` ;

CREATE TABLE IF NOT EXISTS `mydb`.`admin` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `admin_name` VARCHAR(255) NOT NULL,
  `admin_last_name1` VARCHAR(255) NOT NULL,
  `admin_last_name2` VARCHAR(255) NULL,
  `admin_password` VARCHAR(255) NOT NULL,
  `admin_login` VARCHAR(255) NOT NULL,
  `admin_email` VARCHAR(255) NOT NULL,
  `admin_profile_picture` LONGBLOB NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`discount`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`discount` ;

CREATE TABLE IF NOT EXISTS `mydb`.`discount` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `type` DECIMAL(5,2) NOT NULL,
  `description` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`city`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`city` ;

CREATE TABLE IF NOT EXISTS `mydb`.`city` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `city_name` VARCHAR(255) NOT NULL,
  `reference_hotel` VARCHAR(255) NULL,
  `discount_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_city_discount1_idx` (`discount_id` ASC) ,
  CONSTRAINT `fk_city_discount1`
    FOREIGN KEY (`discount_id`)
    REFERENCES `mydb`.`discount` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`state`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`state` ;

CREATE TABLE IF NOT EXISTS `mydb`.`state` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `state_name` VARCHAR(255) NOT NULL,
  `city_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_state_city_idx` (`city_id` ASC) ,
  CONSTRAINT `fk_state_city`
    FOREIGN KEY (`city_id`)
    REFERENCES `mydb`.`city` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`countries`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`countries` ;

CREATE TABLE IF NOT EXISTS `mydb`.`countries` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `country_name` VARCHAR(255) NOT NULL,
  `description` VARCHAR(255) NOT NULL,
  `state_id` INT NOT NULL,
  `image` LONGBLOB NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_countries_state1_idx` (`state_id` ASC) ,
  CONSTRAINT `fk_countries_state1`
    FOREIGN KEY (`state_id`)
    REFERENCES `mydb`.`state` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`travel`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`travel` ;

CREATE TABLE IF NOT EXISTS `mydb`.`travel` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT NOT NULL,
  `countries_id` INT NOT NULL,
  `type` VARCHAR(255) NOT NULL,
  `origen` VARCHAR(255) NOT NULL,
  `destiny` VARCHAR(255) NOT NULL,
  `date_go` DATETIME NOT NULL,
  `date_back` DATETIME NULL,
  `discount_id` INT NOT NULL,
  `date_requested` TIMESTAMP NOT NULL,
  `lastUser(20)` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_travel_discount1_idx` (`discount_id` ASC) ,
  INDEX `fk_travel_user1_idx` (`user_id` ASC) ,
  INDEX `fk_travel_countries1_idx` (`countries_id` ASC) ,
  CONSTRAINT `fk_travel_discount1`
    FOREIGN KEY (`discount_id`)
    REFERENCES `mydb`.`discount` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_travel_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `mydb`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_travel_countries1`
    FOREIGN KEY (`countries_id`)
    REFERENCES `mydb`.`countries` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`invoice`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`invoice` ;

CREATE TABLE IF NOT EXISTS `mydb`.`invoice` (
  `id` INT NOT NULL,
  `description` VARCHAR(45) NOT NULL,
  `travel_id` INT NOT NULL,
  `user_id` INT NOT NULL,
  `total` DECIMAL(10,3) NOT NULL,
  `discount_id` INT NOT NULL,
  `date` DATE NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_invoice_travel1_idx` (`travel_id` ASC) ,
  INDEX `fk_invoice_user1_idx` (`user_id` ASC) ,
  INDEX `fk_invoice_discount1_idx` (`discount_id` ASC) ,
  CONSTRAINT `fk_invoice_travel1`
    FOREIGN KEY (`travel_id`)
    REFERENCES `mydb`.`travel` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_invoice_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `mydb`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_invoice_discount1`
    FOREIGN KEY (`discount_id`)
    REFERENCES `mydb`.`discount` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`deafult_images`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`deafult_images` ;

CREATE TABLE IF NOT EXISTS `mydb`.`deafult_images` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `admin_default_picture` LONGBLOB NULL,
  `user_default_picture` LONGBLOB NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`airplane`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`airplane` ;

CREATE TABLE IF NOT EXISTS `mydb`.`airplane` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `year` DATE NOT NULL,
  `model` VARCHAR(255) NOT NULL,
  `brand` VARCHAR(255) NOT NULL,
  `#pasangers` INT(3) NOT NULL,
  `#rows` INT(1) NOT NULL,
  `sits_row` INT(1) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`check-in`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`check-in` ;

CREATE TABLE IF NOT EXISTS `mydb`.`check-in` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `travel_id` INT NOT NULL,
  `sit_number` VARCHAR(4) NOT NULL,
  `user_id` INT NOT NULL,
  `airplane_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_check-in_travel1_idx` (`travel_id` ASC) ,
  INDEX `fk_check-in_user1_idx` (`user_id` ASC) ,
  INDEX `fk_check-in_airplane1_idx` (`airplane_id` ASC) ,
  CONSTRAINT `fk_check-in_travel1`
    FOREIGN KEY (`travel_id`)
    REFERENCES `mydb`.`travel` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_check-in_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `mydb`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_check-in_airplane1`
    FOREIGN KEY (`airplane_id`)
    REFERENCES `mydb`.`airplane` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`routes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`routes` ;

CREATE TABLE IF NOT EXISTS `mydb`.`routes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `route_name` VARCHAR(255) NOT NULL,
  `airplane_id` INT NOT NULL,
  `countries_id` INT NOT NULL,
  `route_time` TIME NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_routes_airplane1_idx` (`airplane_id` ASC) ,
  INDEX `fk_routes_countries1_idx` (`countries_id` ASC) ,
  CONSTRAINT `fk_routes_airplane1`
    FOREIGN KEY (`airplane_id`)
    REFERENCES `mydb`.`airplane` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_routes_countries1`
    FOREIGN KEY (`countries_id`)
    REFERENCES `mydb`.`countries` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



-- -----------------------------------------------------
-- Table `mydb`.`sessions2`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`sessions2` ;
CREATE TABLE sessions2(
  sesskey VARCHAR( 64 ) NOT NULL DEFAULT '',
  expiry DATETIME NOT NULL ,
  expireref VARCHAR( 250 ) DEFAULT '',
  created DATETIME NOT NULL ,
  modified DATETIME NOT NULL ,
  sessdata LONGTEXT,
  PRIMARY KEY ( sesskey ) ,
  INDEX sess2_expiry( expiry ),
  INDEX sess2_expireref( expireref )
)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

