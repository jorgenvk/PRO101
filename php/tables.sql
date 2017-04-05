CREATE TABLE `Kategori` (
	`id` INT NOT NULL AUTO_INCREMENT, 
	`Kategori_navn` VARCHAR(255) NOT NULL, 
	`Beskrivelse` VARCHAR(255),
	`Icon_url` TEXT,
PRIMARY KEY (`id`));


CREATE TABLE `Bedrifter` (
	`id` INT NOT NULL AUTO_INCREMENT, 
	`Bedrift_navn` VARCHAR(255) NOT NULL, 
	`Kategori_id` INT,
	`Adresse` VARCHAR(255), 
	`Telefon` INT, 
	`Beskrivelse` VARCHAR(255), 
	`Åpningstider` VARCHAR(255),
	`Nettside` VARCHAR(255), 
PRIMARY KEY(`id`), 
FOREIGN KEY(`Kategori_id`) 
REFERENCES `Kategori`(`id`));

CREATE TABLE `Bilde`(
`id` INT NOT NULL AUTO_INCREMENT,
`Bilde` VARCHAR(255) NOT NULL,
`Bedrift_id` INT,
`created_at` DATETIME,
`updated_at` DATETIME,
PRIMARY KEY (`id`),
FOREIGN KEY (`Bedrift_id`)
REFERENCES `Bedrifter`(`id`));