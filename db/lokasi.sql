CREATE TABLE `lokasi` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`latlong` CHAR(50) NULL DEFAULT NULL COLLATE 'latin1_swedish_ci',
	`nama` CHAR(50) NULL DEFAULT NULL COLLATE 'latin1_swedish_ci',
	`no_kontak` CHAR(50) NULL DEFAULT NULL COLLATE 'latin1_swedish_ci',
	`kategori` TEXT NULL DEFAULT NULL COLLATE 'latin1_swedish_ci',
	`keterangan` TEXT NULL DEFAULT NULL COLLATE 'latin1_swedish_ci',
	`created_at` TIMESTAMP NULL DEFAULT NULL,
	PRIMARY KEY (`id`) USING BTREE
)
COLLATE='latin1_swedish_ci'
ENGINE=InnoDB
;
