CREATE TABLE `Kategori` (`Kategori_navn` VARCHAR(128) NOT NULL, `Beskrivelse` VARCHAR(128),
PRIMARY KEY (`Kategori_navn`));

CREATE TABLE `Bedrifter` (`Bedrift_navn` VARCHAR(128) NOT NULL, `Kategori_navn` VARCHAR(128),
`Adresse` VARCHAR(128), `Telefon` INT, `Beskrivelse` VARCHAR(128), `Åpningstider` VARCHAR(128),
`Nettside` VARCHAR(128), PRIMARY KEY(`Bedrift_navn`), 
FOREIGN KEY(`Kategori_navn`) REFERENCES `Kategori`(`Kategori_navn`));
