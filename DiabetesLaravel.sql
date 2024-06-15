-- -------------------------------------------------------------
-- TablePlus 6.0.0(550)
--
-- https://tableplus.com/
--
-- Database: DiabetesLaravel
-- Generation Time: 2024-06-11 18:55:07.4140
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `citas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `clinica` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `consulta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sala` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observaciones` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `citas_user_id_foreign` (`user_id`),
  CONSTRAINT `citas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `controls` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `horario_id` bigint unsigned NOT NULL,
  `comentario_hora` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `glucemia` int NOT NULL,
  `observaciones` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `controls_horario_id_foreign` (`horario_id`),
  KEY `controls_user_id_foreign` (`user_id`),
  CONSTRAINT `controls_horario_id_foreign` FOREIGN KEY (`horario_id`) REFERENCES `horarios` (`id`) ON DELETE CASCADE,
  CONSTRAINT `controls_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

CREATE TABLE `generos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `genero` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `historials` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genero_id` bigint unsigned NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `peso` int NOT NULL,
  `estatura` int NOT NULL,
  `alergias` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `antecedentes_familiares` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `enfermedades_cronicas` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `procedimientos_quirurgicos` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `condiciones_pasadas` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clinica` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observaciones` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `historials_genero_id_foreign` (`genero_id`),
  KEY `historials_user_id_foreign` (`user_id`),
  CONSTRAINT `historials_genero_id_foreign` FOREIGN KEY (`genero_id`) REFERENCES `generos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `historials_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `horarios` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `horario` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `informations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genero_id` bigint unsigned NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `peso` int NOT NULL,
  `estatura` int NOT NULL,
  `alergias` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `antecedentes_familiares` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enfermedades_cronicas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `procedimientos_quirurgicos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `condiciones_pasadas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clinica` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observaciones` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `informations_genero_id_foreign` (`genero_id`),
  KEY `informations_user_id_foreign` (`user_id`),
  CONSTRAINT `informations_genero_id_foreign` FOREIGN KEY (`genero_id`) REFERENCES `generos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `informations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `tratamientos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `hora` time NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gramos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cantidad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recetado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cuando` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observaciones` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tratamientos_user_id_foreign` (`user_id`),
  CONSTRAINT `tratamientos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('356a192b7913b04c54574d18c28d46e6395428ab', 'i:1;', 1717100009),
('356a192b7913b04c54574d18c28d46e6395428ab:timer', 'i:1717100009;', 1717100009);

INSERT INTO `citas` (`id`, `fecha`, `hora`, `clinica`, `consulta`, `doctor`, `sala`, `observaciones`, `user_id`, `created_at`, `updated_at`) VALUES
(8, '2024-06-03', '10:00:00', 'Clinica Marcial Fallas', 'Cardiólogo', 'Drª Estefania Gallardo', 'Sala 4', '', 1, '2024-05-30 20:18:18', '2024-05-30 20:18:18');

INSERT INTO `controls` (`id`, `fecha`, `hora`, `horario_id`, `comentario_hora`, `glucemia`, `observaciones`, `user_id`, `created_at`, `updated_at`) VALUES
(15, '2024-05-01', '10:00:00', 3, '2 horas', 127, '', 1, '2024-05-30 20:25:57', '2024-05-30 20:25:57');

INSERT INTO `generos` (`id`, `genero`, `created_at`, `updated_at`) VALUES
(1, 'Prefiero no decirlo', '2024-05-23 00:20:57', '2024-05-23 00:20:57'),
(2, 'Masculino', '2024-05-23 00:20:57', '2024-05-23 00:20:57'),
(3, 'Femenino', '2024-05-23 00:20:57', '2024-05-23 00:20:57');

INSERT INTO `historials` (`id`, `nombre`, `imagen`, `genero_id`, `fecha_nacimiento`, `peso`, `estatura`, `alergias`, `antecedentes_familiares`, `enfermedades_cronicas`, `procedimientos_quirurgicos`, `condiciones_pasadas`, `doctor`, `clinica`, `observaciones`, `user_id`, `created_at`, `updated_at`) VALUES
(3, 'Domingo Curbeira García', 'Up1UXgwJLQb2iqhmKCuu5yznOxlO8yypDGXCou9F.png', 2, '1979-06-28', 131, 181, 'Penicilina', 'Mi madre fue diabética', '', 'Operación de fimosis, año 1990', '', 'Dr. Rafael Tasende Areosa', 'Clínica Moreno Cañas', '', 1, '2024-05-30 00:14:15', '2024-05-30 00:14:15');

INSERT INTO `horarios` (`id`, `horario`, `created_at`, `updated_at`) VALUES
(1, 'al levantarse', '2024-05-23 00:20:57', '2024-05-23 00:20:57'),
(2, 'antes de desayunar', '2024-05-23 00:20:57', '2024-05-23 00:20:57'),
(3, 'después de desayunar', '2024-05-23 00:20:57', '2024-05-23 00:20:57'),
(4, 'antes de almorzar', '2024-05-23 00:20:57', '2024-05-23 00:20:57'),
(5, 'después de almorzar', '2024-05-23 00:20:57', '2024-05-23 00:20:57'),
(6, 'antes de cenar', '2024-05-23 00:20:57', '2024-05-23 00:20:57'),
(7, 'después de cenar ', '2024-05-23 00:20:57', '2024-05-23 00:20:57'),
(8, 'antes de acostarse', '2024-05-23 00:20:57', '2024-05-23 00:20:57');

INSERT INTO `informations` (`id`, `nombre`, `imagen`, `genero_id`, `fecha_nacimiento`, `peso`, `estatura`, `alergias`, `antecedentes_familiares`, `enfermedades_cronicas`, `procedimientos_quirurgicos`, `condiciones_pasadas`, `doctor`, `clinica`, `observaciones`, `user_id`, `created_at`, `updated_at`) VALUES
(4, 'Domingo Curbeira García', 'U8Vb4Q2X9TqrbRZeeggPc0875EJVTA1oh4RoXbxl.jpg', 2, '1979-06-28', 131, 181, 'Penicilina', '', '', '', '', 'Dr. Rafael Tasende Areosa', 'Clínica Moreno Cañas', '', 1, '2024-05-24 18:27:18', '2024-05-24 18:27:18');

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(14, '2024_05_03_204620_create_horarios_table', 2),
(15, '2024_05_03_222841_create_controles_table', 2),
(16, '2024_05_22_215610_create_generos_table', 2),
(19, '2024_05_23_131324_create_informations_table', 3),
(27, '2024_05_26_150434_create_historial_table', 4),
(28, '2024_05_26_225928_create_citas_table', 5),
(29, '2024_05_28_000922_create_tratamientos_table', 6);

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('i2vktZJ1wyrNkYW4l0YZklbiL3M2Hrl0VdEwHkH6', 1, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoibFd3RWpLR3M4d0pXUVNwZDNoVUNvbUY5eEFMMENXUGM4UXRoWHdCTyI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMxOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvY29udHJvbGVzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1717100822),
('p56GxzYGWkp0kov148EGijcXVOBR7JowQgAVSKMi', 1, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZmZDbXF6VkpmZjRQYllDZU5EUW5WcE5QcnFrdnROOTBXNmVZV1FqbyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jb250cm9sZXMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1718055726);

INSERT INTO `tratamientos` (`id`, `hora`, `nombre`, `gramos`, `imagen`, `cantidad`, `recetado`, `cuando`, `observaciones`, `user_id`, `created_at`, `updated_at`) VALUES
(5, '07:00:00', 'Gelocatil', '1 gr', 'I45hAeonaBZxeYYA93j09YemfV5WJfhwasFr03Da.jpg', '1 pastilla', 'para dolores', 'Antes del desayuno', '', 1, '2024-05-29 22:56:19', '2024-05-29 22:56:19');

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Domingo Curbeira', 'domingocurbeira@gmail.com', NULL, '$2y$12$Rp8rxZqxGxs7R1SVvZHQs.1nuTPp.lLgVk9l1/XE37XkhHJ/9kB.O', NULL, '2024-05-04 02:13:18', '2024-05-04 02:13:18'),
(2, 'Lidia Cordero Rojas', 'lidia@lidia.com', NULL, '$2y$12$wmC.KFpnR9ekzSv9Iq7jSuqX32eMoxfesQJ/yVqgnjUSCAYQRfjA6', NULL, '2024-05-30 00:17:11', '2024-05-30 00:17:11');



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;