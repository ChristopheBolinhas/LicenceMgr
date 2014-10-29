SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `LicMgr` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `LicMgr` ;

-- -----------------------------------------------------
-- Table `LicMgr`.`companies`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `LicMgr`.`companies` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `Name_UNIQUE` (`name` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LicMgr`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `LicMgr`.`users` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `company_id` BIGINT(20) UNSIGNED NOT NULL,
  `fullname` VARCHAR(255) NOT NULL,
  `username` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `remember_token` VARCHAR(255) NOT NULL,
  `created_at` DATETIME(0) NOT NULL,
  `updated_at` DATETIME(0) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_User_Company1_idx` (`company_id` ASC),
  CONSTRAINT `fk_User_Company1`
    FOREIGN KEY (`company_id`)
    REFERENCES `LicMgr`.`companies` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LicMgr`.`editors`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `LicMgr`.`editors` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `company_id` BIGINT(20) UNSIGNED NULL,
  `name` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Editor_Company_idx` (`company_id` ASC),
  CONSTRAINT `fk_Editor_Company`
    FOREIGN KEY (`company_id`)
    REFERENCES `LicMgr`.`companies` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LicMgr`.`programs`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `LicMgr`.`programs` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `editor_id` BIGINT(20) UNSIGNED NOT NULL,
  `parent_id` BIGINT(20) UNSIGNED NULL,
  `company_id` BIGINT(20) UNSIGNED NULL,
  `name` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Program_Editor1_idx` (`editor_id` ASC),
  INDEX `fk_Program_Company1_idx` (`company_id` ASC),
  INDEX `fk_Program_Program1_idx` (`parent_id` ASC),
  CONSTRAINT `fk_Program_Editor1`
    FOREIGN KEY (`editor_id`)
    REFERENCES `LicMgr`.`editors` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Program_Company1`
    FOREIGN KEY (`company_id`)
    REFERENCES `LicMgr`.`companies` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Program_Program1`
    FOREIGN KEY (`parent_id`)
    REFERENCES `LicMgr`.`programs` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LicMgr`.`licences`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `LicMgr`.`licences` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `program_id` BIGINT(20) UNSIGNED NOT NULL,
  `company_id` BIGINT(20) UNSIGNED NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `value` VARCHAR(255) NOT NULL,
  `created_at` DATETIME(0) NOT NULL,
  `created_user_id` BIGINT(20) UNSIGNED NOT NULL,
  `updated_at` DATETIME(0) NOT NULL,
  `updated_user_id` BIGINT(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Licence_Company1_idx` (`company_id` ASC),
  INDEX `fk_Licence_Program1_idx` (`program_id` ASC),
  CONSTRAINT `fk_Licence_Company1`
    FOREIGN KEY (`company_id`)
    REFERENCES `LicMgr`.`companies` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Licence_Program1`
    FOREIGN KEY (`program_id`)
    REFERENCES `LicMgr`.`programs` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LicMgr`.`files`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `LicMgr`.`files` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `licence_id` BIGINT(20) UNSIGNED NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `value` LONGBLOB NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_File_Licence1_idx` (`licence_id` ASC),
  CONSTRAINT `fk_File_Licence1`
    FOREIGN KEY (`licence_id`)
    REFERENCES `LicMgr`.`licences` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LicMgr`.`roles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `LicMgr`.`roles` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` VARCHAR(5) NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `Code_UNIQUE` (`code` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LicMgr`.`user_roles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `LicMgr`.`user_roles` (
  `user_id` BIGINT(20) UNSIGNED NOT NULL,
  `role_id` BIGINT(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`user_id`, `role_id`),
  INDEX `fk_UserRole_Role1_idx` (`role_id` ASC),
  CONSTRAINT `fk_UserRole_User1`
    FOREIGN KEY (`user_id`)
    REFERENCES `LicMgr`.`users` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_UserRole_Role1`
    FOREIGN KEY (`role_id`)
    REFERENCES `LicMgr`.`roles` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
