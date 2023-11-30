# ************************************************************
# Sequel Ace SQL dump
# Version 20039
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: localhost (MySQL 8.0.31)
# Database: management
# Generation Time: 2023-11-30 03:18:43 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE='NO_AUTO_VALUE_ON_ZERO', SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table failed_jobs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(1,'2014_10_12_000000_create_users_table',1),
	(2,'2014_10_12_100000_create_password_reset_tokens_table',1),
	(3,'2019_08_19_000000_create_failed_jobs_table',1),
	(4,'2019_12_14_000001_create_personal_access_tokens_table',1),
	(5,'2023_11_27_000202_create_tasks_table',1);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table password_reset_tokens
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_reset_tokens`;

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table personal_access_tokens
# ------------------------------------------------------------

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table tasks
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tasks`;

CREATE TABLE `tasks` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `user_assign_id` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `tasks` WRITE;
/*!40000 ALTER TABLE `tasks` DISABLE KEYS */;

INSERT INTO `tasks` (`id`, `title`, `description`, `status`, `user_assign_id`, `created_at`, `updated_at`)
VALUES
	(25,'Minus atque voluptat','<b>Cumque</b> nesciunt non',0,0,'2023-11-29 21:02:07',NULL),
	(27,'Distinctio Vel aut ','Nemo dolor natus in ',0,0,'2023-11-29 21:03:02',NULL),
	(34,'Best Tech Stack for Web App Development in 2023','This side of web development is what users interact with directly. It includes everything that users experience visually on the webpage: text, colors, styles, images, graphs, and more. Typically made up of HTML, CSS, and JavaScript, with frameworks like React or Vue.js enhancing interactivity.',1,0,'2023-11-30 10:51:52',NULL),
	(35,'Speed up your Laravel app up to 1000x (with FastCGI cache)','<p><b>Before proceeding</b></p><p>Besides being counterproductive to performance, installing FastCGI and hoping it will work right out of the box can cause serious security problems for your application.</p><p><br></p><p><b>Why you should use FastCGI Cache</b></p><ol><li>If your Laravel application is primarily designed for browsing by unregistered guests.</li><li>If your site needs to quickly climb search engine rankings.</li><li>If your site needs to cut down on server consumption.</li><li>Why you shouldn’t use FastCGI Cache</li><li>If your application is completely (or heavily) based on the use of authentication.</li><li>If your application is not public.</li></ol><div><br></div>',0,0,'2023-11-30 10:53:33',NULL),
	(36,'How the FastCGI Cache method works','<p><span style=\"font-weight: bolder;\"><u>Before proceeding</u></span></p><p>Besides being counterproductive to performance, installing FastCGI and hoping it will work right out of the box can cause serious security problems for your application.</p><p><br></p><p><span style=\"font-weight: bolder;\"><u>Why you should use FastCGI Cache</u></span></p><ul><li>If your Laravel application is primarily designed for browsing by unregistered guests.</li><li>If your site needs to quickly climb search engine rankings.</li><li>If your site needs to cut down on server consumption.</li><li>Why you shouldn’t use FastCGI Cache</li><li>If your application is completely (or heavily) based on the use of authentication.</li><li>If your application is not public.</li></ul><div><br></div>',1,2,'2023-11-30 10:55:06',NULL),
	(37,'How the FastCGI Cache method works','<p><span style=\"font-weight: bolder;\"><u>Before proceeding</u></span></p><p>Besides being counterproductive to performance, installing FastCGI and hoping it will work right out of the box can cause serious security problems for your application.</p><p><br></p><p><span style=\"font-weight: bolder;\"><u>Why you should use FastCGI Cache</u></span></p><ul><li>If your Laravel application is primarily designed for browsing by unregistered guests.</li><li>If your site needs to quickly climb search engine rankings.</li><li>If your site needs to cut down on server consumption.</li><li>Why you shouldn’t use FastCGI Cache</li><li>If your application is completely (or heavily) based on the use of authentication.</li><li>If your application is not public.</li></ul><div><br></div>',1,1,'2023-11-30 10:57:08',NULL);

/*!40000 ALTER TABLE `tasks` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(1,'ranj k','admin@gmail.com',NULL,'$2y$12$HCY591Oczwyz0qoIOBlituH.MuH5NH9iGE57pdk09aeDTivq5TEMW',NULL,'2023-11-27 10:18:45','2023-11-27 10:18:45'),
	(2,'john doe','John@gmail.com',NULL,'$2y$12$HCY591Oczwyz0qoIOBlituH.MuH5NH9iGE57pdk09aeDTivq5TEMW',NULL,'2023-11-27 10:18:45','2023-11-27 10:18:45'),
	(3,'Nick s','nick.doe@gmail.com',NULL,'$2y$12$HCY591Oczwyz0qoIOBlituH.MuH5NH9iGE57pdk09aeDTivq5TEMW',NULL,'2023-11-27 10:18:45','2023-11-27 10:18:45');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
