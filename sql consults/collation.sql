
SELECT * FROM PRODUCT WHERE UPPER(NAME) LIKE UPPER("%ño%")

SHOW VARIABLES LIKE '%collation%';



GRANT ALL PRIVILEGES ON inventiolite. * TO 'root'@'localhost';
FLUSH PRIVILEGES;

-- Change database collation
ALTER DATABASE `inventiolite` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;

-- or change table collation
ALTER TABLE `product` CONVERT TO CHARACTER SET utf8 COLLATE utf8_bin;

-- or change column collation
ALTER TABLE `table` CHANGE `Value` 
    `Value` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_bin;