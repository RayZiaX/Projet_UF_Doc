SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


-- création de la base de donnée
DROP DATABASE IF EXISTS `stephiPlace_data`;
CREATE DATABASE IF NOT EXISTS `stephiPlace_data`;
-- création des table
USE `stephiPlace_data`;
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users`
(
    `user_id` SMALLINT,
    `user_name` VARCHAR(65),
    `user_firstName` VARCHAR(65),
    `user_mail` VARCHAR(65),
    `user_pseudo` VARCHAR(65),
    `user_password` VARCHAR(255),
    `user_age` INT,
    `user_genre` VARCHAR(5)
);