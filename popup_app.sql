-- admins table
CREATE TABLE `admins` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(50) NOT NULL UNIQUE,
  `password_hash` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- popups table
CREATE TABLE `popups` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(100),
  `message` TEXT,
  `is_active` TINYINT(1) DEFAULT 1,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO admins (username, password_hash)
VALUES (
  'admin',
  '$2y$10$6at4o1jXkwyLuh78qjQap.FAknByyw14bchCPMLZGHs2IUd2EMrAW'
);

