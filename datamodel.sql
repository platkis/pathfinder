CREATE TABLE `pathfinder`.`users` (
  `fname` VARCHAR(255) NOT NULL,
  `lname` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `password` VARCHAR(60) NOT NULL,
  `bday` DATE NOT NULL,
  PRIMARY KEY (`email`));

CREATE TABLE `pathfinder`.`paths` (
  `path_id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `longitude` DOUBLE NOT NULL,
  `latitude` DOUBLE NOT NULL,
  `avgRating` INT NOT NULL,
  `ground_type` VARCHAR(255) NOT NULL,
  `num_hills` VARCHAR(255) NOT NULL,
  `user_type` VARCHAR(255) NOT NULL,
  `season` VARCHAR(255) NOT NULL,
  `difficulty` INT NOT NULL,
  `img_add` VARCHAR(255),
  PRIMARY KEY (`path_id`));

  CREATE TABLE `pathfinder`.`reviews` (
  `user_id` VARCHAR(255) NOT NULL,
  `path_id` INT NOT NULL,
  `rating` INT NOT NULL,
  `review` VARCHAR(255) NOT NULL,
  INDEX `user_id_idx` (`user_id` ASC),
  INDEX `path_id_idx` (`path_id` ASC),
  CONSTRAINT `user_id`
    FOREIGN KEY (`user_id`)
    REFERENCES `pathfinder`.`users` (`email`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `path_id`
    FOREIGN KEY (`path_id`)
    REFERENCES `pathfinder`.`paths` (`path_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);
