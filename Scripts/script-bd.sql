-- -----------------------------------------------------
-- Table `companies`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `companies` ;

CREATE TABLE IF NOT EXISTS `companies` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `description` VARCHAR(60) NOT NULL,
  `country` VARCHAR(60) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `heroes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `heroes` ;

CREATE TABLE IF NOT EXISTS `heroes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `company_id` INT NOT NULL,
  `image` VARCHAR(100) NULL,
  `hero_name` VARCHAR(100) NOT NULL,
  `actor_name` VARCHAR(100) NOT NULL,
  `nation` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_heroes_companies1`
    FOREIGN KEY (`company_id`)
    REFERENCES `companies` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_heroes_companies1_idx` ON `heroes` (`company_id` ASC) ;


-- -----------------------------------------------------
-- Table `skills`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `skills` ;

CREATE TABLE IF NOT EXISTS `skills` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `description` VARCHAR(60) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hero_skill`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hero_skill` ;

CREATE TABLE IF NOT EXISTS `hero_skill` (
  `hero_id` INT NOT NULL,
  `skill_id` INT NOT NULL,
  PRIMARY KEY (`hero_id`, `skill_id`),
  CONSTRAINT `fk_heroes_skills_heroes`
    FOREIGN KEY (`hero_id`)
    REFERENCES `heroes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_heroes_skills_skills1`
    FOREIGN KEY (`skill_id`)
    REFERENCES `skills` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_heroes_skills_skills1_idx` ON `hero_skill` (`skill_id` ASC) ;


-- -----------------------------------------------------
-- Table `stats`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `stats` ;

CREATE TABLE IF NOT EXISTS `stats` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `description` VARCHAR(60) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hero_stat`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hero_stat` ;

CREATE TABLE IF NOT EXISTS `hero_stat` (
  `hero_id` INT NOT NULL,
  `stat_id` INT NOT NULL,
  `level` INT NOT NULL,
  PRIMARY KEY (`hero_id`, `stat_id`),
  CONSTRAINT `fk_heroes_stats_heroes1`
    FOREIGN KEY (`hero_id`)
    REFERENCES `heroes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_heroes_stats_stats1`
    FOREIGN KEY (`stat_id`)
    REFERENCES `stats` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_heroes_stats_stats1_idx` ON `hero_stat` (`stat_id` ASC) ;