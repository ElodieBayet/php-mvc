--
-- MySQL
-- Schema
-- Exécution : 1
--


CREATE TABLE `period` (
    `id` SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
    `begin` SMALLINT UNSIGNED NOT NULL,
    `end` SMALLINT UNSIGNED,
    --
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `fr_period` (
    `id` SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(32) NOT NULL,
    `description` VARCHAR(1024),
    `route` VARCHAR(32) NOT NULL,
    `period_id` SMALLINT UNSIGNED NOT NULL UNIQUE,
    --
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `en_period` (
    `id` SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(32) NOT NULL,
    `description` VARCHAR(1024),
    `route` VARCHAR(32) NOT NULL,
    `period_id` SMALLINT UNSIGNED NOT NULL UNIQUE,
    --
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `compositor` (
    `id` SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
    `lastname` VARCHAR(32) NOT NULL,
    `firstname` VARCHAR(32) NOT NULL,
    `birth` DATE NOT NULL,
    `death` DATE NOT NULL,
    `origin` VARCHAR(32),
    `figure` VARCHAR(512),
    `route` VARCHAR(32) NOT NULL,
    --
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `period_compositor` (
    `period_id` SMALLINT UNSIGNED NOT NULL,
    `compositor_id` SMALLINT UNSIGNED NOT NULL,
    --
    UNIQUE KEY `UQ_period_compositor__ids` (`period_id`, `compositor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



ALTER TABLE `fr_period`
    ADD CONSTRAINT `FK_fr_period__period_id` FOREIGN KEY (`period_id`) REFERENCES `period`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `en_period`
    ADD CONSTRAINT `FK_en_period__period_id` FOREIGN KEY (`period_id`) REFERENCES `period`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;

