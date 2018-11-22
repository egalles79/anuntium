SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';


-- -----------------------------------------------------
-- Table `anuntium`.`grades`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `anuntium`.`grades` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NULL ,
  `created` DATETIME NULL ,
  `modified` DATETIME NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `anuntium`.`groups`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `anuntium`.`groups` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NULL ,
  `created` DATETIME NULL ,
  `modified` DATETIME NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `anuntium`.`users`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `anuntium`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NULL ,
  `username` VARCHAR(45) NULL ,
  `password` VARCHAR(150) NULL ,
  `token` VARCHAR(250) NULL ,
  `created` DATETIME NULL ,
  `modified` DATETIME NULL ,
  `group_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_users_groups1_idx` (`group_id` ASC) ,
  CONSTRAINT `fk_users_groups1`
    FOREIGN KEY (`group_id` )
    REFERENCES `anuntium`.`groups` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `anuntium`.`students`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `anuntium`.`students` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NULL ,
  `grade_id` INT NOT NULL ,
  `created` DATETIME NULL ,
  `modified` DATETIME NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_students_classes1_idx` (`grade_id` ASC) ,
  CONSTRAINT `fk_students_classes1`
    FOREIGN KEY (`grade_id` )
    REFERENCES `anuntium`.`grades` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `anuntium`.`users_students`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `anuntium`.`users_students` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `user_id` INT NOT NULL ,
  `student_id` INT NOT NULL ,
  `created` DATETIME NULL ,
  `modified` DATETIME NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_users_students_users1_idx` (`user_id` ASC) ,
  INDEX `fk_users_students_students1_idx` (`student_id` ASC) ,
  CONSTRAINT `fk_users_students_users1`
    FOREIGN KEY (`user_id` )
    REFERENCES `anuntium`.`users` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_students_students1`
    FOREIGN KEY (`student_id` )
    REFERENCES `anuntium`.`students` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `anuntium`.`grades_teachers`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `anuntium`.`grades_teachers` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `grade_id` INT NOT NULL ,
  `user_id` INT NOT NULL ,
  `created` DATETIME NULL ,
  `modified` DATETIME NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_classes_teachers_classes1_idx` (`grade_id` ASC) ,
  INDEX `fk_classes_teachers_users1_idx` (`user_id` ASC) ,
  CONSTRAINT `fk_classes_teachers_classes1`
    FOREIGN KEY (`grade_id` )
    REFERENCES `anuntium`.`grades` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_classes_teachers_users1`
    FOREIGN KEY (`user_id` )
    REFERENCES `anuntium`.`users` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `anuntium`.`messages`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `anuntium`.`messages` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NULL ,
  `description` VARCHAR(250) NULL ,
  `user_id` INT NOT NULL ,
  `created` DATETIME NULL ,
  `modified` DATETIME NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_messages_users1_idx` (`user_id` ASC) ,
  CONSTRAINT `fk_messages_users1`
    FOREIGN KEY (`user_id` )
    REFERENCES `anuntium`.`users` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `anuntium`.`messages_files`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `anuntium`.`messages_files` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `message_id` INT NOT NULL ,
  `file` VARCHAR(45) NULL ,
  `created` DATETIME NULL ,
  `modified` DATETIME NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_messages_files_messages1_idx` (`message_id` ASC) ,
  CONSTRAINT `fk_messages_files_messages1`
    FOREIGN KEY (`message_id` )
    REFERENCES `anuntium`.`messages` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `anuntium`.`messages_users`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `anuntium`.`messages_users` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `message_id` INT NOT NULL ,
  `user_id` INT NOT NULL ,
  `sent` TINYINT(1) NULL ,
  `open` TINYINT(1) NULL ,
  `send_date` DATETIME NULL ,
  `opening_date` DATETIME NULL ,
  `created` DATETIME NULL ,
  `modified` DATETIME NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_messages_users_messages1_idx` (`message_id` ASC) ,
  INDEX `fk_messages_users_users1_idx` (`user_id` ASC) ,
  CONSTRAINT `fk_messages_users_messages1`
    FOREIGN KEY (`message_id` )
    REFERENCES `anuntium`.`messages` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_messages_users_users1`
    FOREIGN KEY (`user_id` )
    REFERENCES `anuntium`.`users` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `anuntium`.`acos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `anuntium`.`acos` (
  `id` INT(10) NOT NULL ,
  `parent_id` INT(10) NULL DEFAULT NULL ,
  `model` VARCHAR(255) NULL DEFAULT NULL ,
  `foreign_key` INT(10) NULL DEFAULT NULL ,
  `alias` VARCHAR(255) NULL DEFAULT NULL ,
  `lft` INT(10) NULL DEFAULT NULL ,
  `rght` INT(10) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `idx_acos_lft_rght` (`lft` ASC, `rght` ASC) ,
  INDEX `idx_acos_alias` (`alias` ASC) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `anuntium`.`aros`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `anuntium`.`aros` (
  `id` INT(10) NOT NULL ,
  `parent_id` INT(10) NULL DEFAULT NULL ,
  `model` VARCHAR(255) NULL DEFAULT NULL ,
  `foreign_key` INT(10) NULL DEFAULT NULL ,
  `alias` VARCHAR(255) NULL DEFAULT NULL ,
  `lft` INT(10) NULL DEFAULT NULL ,
  `rght` INT(10) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `idx_aros_lft_rght` (`lft` ASC, `rght` ASC) ,
  INDEX `idx_aros_alias` (`alias` ASC) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `anuntium`.`aros_acos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `anuntium`.`aros_acos` (
  `id` INT(10) NOT NULL ,
  `aro_id` INT(10) NOT NULL ,
  `aco_id` INT(10) NOT NULL ,
  `_create` VARCHAR(2) NOT NULL DEFAULT '0' ,
  `_read` VARCHAR(2) NOT NULL DEFAULT '0' ,
  `_update` VARCHAR(2) NOT NULL DEFAULT '0' ,
  `_delete` VARCHAR(2) NOT NULL DEFAULT '0' ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `ARO_ACO_KEY` (`aro_id` ASC, `aco_id` ASC) ,
  INDEX `idx_aco_id` (`aco_id` ASC) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `anuntium`.`schools`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `anuntium`.`schools` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NULL ,
  `created` DATETIME NULL ,
  `modified` DATETIME NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `anuntium`.`users_schools`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `anuntium`.`users_schools` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `school_id` INT NOT NULL ,
  `user_id` INT NOT NULL ,
  `created` DATETIME NULL ,
  `modified` DATETIME NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_users_schools_schools1_idx` (`school_id` ASC) ,
  INDEX `fk_users_schools_users1_idx` (`user_id` ASC) ,
  CONSTRAINT `fk_users_schools_schools1`
    FOREIGN KEY (`school_id` )
    REFERENCES `anuntium`.`schools` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_schools_users1`
    FOREIGN KEY (`user_id` )
    REFERENCES `anuntium`.`users` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
