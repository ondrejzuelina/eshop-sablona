CREATE TABLE IF NOT EXISTS `test_table` (
`id` bigint(20) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
`proid` TEXT NOT NULL DEFAULT '',
`imagelist` TEXT NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO test_table (proid, imagelist) VALUES
