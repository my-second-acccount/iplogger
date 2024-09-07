USE ip_grabber;

CREATE USER 'admin'@'%' IDENTIFIED BY 'pass'; -- change to correct db password!
GRANT ALL PRIVILEGES ON ip_grabber.*  TO 'admin'@'%';

DROP TABLE IF EXISTS visitor;
CREATE Table visitor (
    `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `ip` VARCHAR(39) NULL,
    `isp` VARCHAR(32) NULL,
    `country` VARCHAR(32) NULL,
    `timezone` VARCHAR(32) NULL,
    `datetime` TIMESTAMP NOT NULL DEFAULT NOW()
);

