-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.4.3 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Volcando datos para la tabla integrando_salud.cache: ~0 rows (aproximadamente)

-- Volcando datos para la tabla integrando_salud.cache_locks: ~0 rows (aproximadamente)

-- Volcando datos para la tabla integrando_salud.failed_jobs: ~0 rows (aproximadamente)

-- Volcando datos para la tabla integrando_salud.jobs: ~0 rows (aproximadamente)

-- Volcando datos para la tabla integrando_salud.job_batches: ~0 rows (aproximadamente)

-- Volcando datos para la tabla integrando_salud.migrations: ~0 rows (aproximadamente)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2025_09_16_120424_create_tipo_pets_table', 1),
	(5, '2025_09_17_120424_create_pacientes_table', 1),
	(6, '2025_09_18_120425_create_tratamientos_table', 1);

-- Volcando datos para la tabla integrando_salud.pacientes: ~6 rows (aproximadamente)
INSERT INTO `pacientes` (`id`, `nombre`, `apellido`, `sexo`, `dni`, `fecha_nacimiento`, `created_at`, `updated_at`) VALUES
	(1, 'Jorge', 'Rambo', 'M', '123', '1992-05-02', '2025-09-19 22:14:23', '2025-09-19 22:14:23'),
	(2, 'Sandra', 'Lopez', 'F', '333', '1992-04-21', '2025-09-19 22:14:35', '2025-09-19 22:14:35'),
	(3, 'Jose', 'Perez', 'M', '444', '1995-05-13', '2025-09-19 22:14:51', '2025-09-19 22:14:51'),
	(4, 'Lucia', 'Suarez', 'F', '111', '2000-06-04', '2025-09-19 22:15:29', '2025-09-19 22:15:29'),
	(5, 'pepe', 'tarno', 'M', '12333', '1993-04-23', '2025-09-20 23:44:53', '2025-09-20 23:44:53'),
	(7, 'monito', 'fernandez', 'M', '1233345', '2001-12-24', '2025-09-20 23:48:48', '2025-09-20 23:48:48'),
	(8, 'julia', 'benitez', 'F', '44445', '1992-06-05', '2025-09-20 23:49:54', '2025-09-20 23:49:54');

-- Volcando datos para la tabla integrando_salud.password_reset_tokens: ~0 rows (aproximadamente)

-- Volcando datos para la tabla integrando_salud.sessions: ~3 rows (aproximadamente)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('rjbnvnW1j2mJgkTEpKUQfBHBT6sEmvMsPCIFfIiD', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoia29Nak96MkFzTUNqbjc2bEtielBEekRUTDFBNEYyMHVja3V4WlFwNSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wZXQvbGlzdGEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1758475117),
	('tnqkwJiAX5WqflBfe7i8OT9a0lYTN14HBRRuqMw5', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQzZnelA2bThmMFZGMXJYbkZ6VXJkYzhSWnMzaGpwTk85RUVTQ0V4TyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1758411772),
	('Xu8o6CXjaNJcsy7FXgHstPuMR2TJu8EuxuQeCmZu', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZ2h3WlVjbkJ6U2Fzc1MxS3pxWGlYeVFFbERJeEhBR1E0SDBZN0NVVSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wYWNpZW50ZXMvbnVldm8iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1758401394);

-- Volcando datos para la tabla integrando_salud.tipo_pets: ~4 rows (aproximadamente)
INSERT INTO `tipo_pets` (`id`, `nombre`, `color`, `intensidad`, `duracion_min`, `requiere_ayuno`, `observaciones`, `estado`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Higado', 'verde', 5, 50, 1, 'no jugar futbol', 1, '2025-09-20 16:42:02', '2025-09-21 19:59:54', NULL),
	(2, 'pancreas', 'amarillo', 5, 50, 1, 'no jugar futbol', 0, '2025-09-20 16:50:26', '2025-09-21 20:18:35', NULL),
	(5, 'Pulmon', 'ambar', 7, 23, 1, 'no coca', 1, '2025-09-20 17:28:04', '2025-09-20 17:28:04', NULL),
	(6, 'Prostata', 'rojo', 8, 12, 1, 'no sex', 1, '2025-09-20 21:16:52', '2025-09-20 21:16:52', NULL);

-- Volcando datos para la tabla integrando_salud.tratamientos: ~1 rows (aproximadamente)
INSERT INTO `tratamientos` (`id`, `paciente_id`, `tipo_pet_id`, `fecha_inicio`, `created_at`, `updated_at`) VALUES
	(6, 2, 1, '2025-09-20', '2025-09-20 23:02:38', '2025-09-20 23:02:38');

-- Volcando datos para la tabla integrando_salud.users: ~0 rows (aproximadamente)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
