/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 5.7.33 : Database - projectpweb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`projectpweb` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `projectpweb`;

/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_name_unique` (`name`),
  UNIQUE KEY `categories_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `categories` */

insert  into `categories`(`id`,`name`,`slug`,`created_at`,`updated_at`) values 
(1,'Dapur','dapur','2022-06-22 21:38:17','2022-06-22 21:38:17'),
(2,'Ruang Tengah','ruang-tengah','2022-06-22 21:38:17','2022-06-22 21:38:17'),
(3,'Personal','personal','2022-06-22 21:38:17','2022-06-22 21:38:17'),
(4,'Garasi','garasi','2022-06-25 01:52:21','2022-06-25 01:52:21');

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2019_08_19_000000_create_failed_jobs_table',1),
(4,'2019_12_14_000001_create_personal_access_tokens_table',1),
(5,'2022_04_21_132956_create_products_table',1),
(6,'2022_04_22_040852_create_categories_table',1),
(7,'2022_06_22_083845_add_to_users_table',1);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint(20) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` double NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `products` */

insert  into `products`(`id`,`category_id`,`title`,`slug`,`excerpt`,`stock`,`image`,`body`,`price`,`created_at`,`updated_at`) values 
(1,2,'Sed et perferendis rem.','molestias-aliquam-saepe-vitae-quia','Cupiditate deleniti harum porro occaecati. Aspernatur consequatur aut ut nobis neque magni enim. Et...',13,'product-images/9NEElpIUTSBNBHOmSvAoFuVvjVeQUaFdmLgJOdUi.jpg','Cupiditate deleniti harum porro occaecati. Aspernatur consequatur aut ut nobis neque magni enim. Et aut esse eveniet harum doloremque voluptatem nostrum quidem. Dolores expedita sit est.',19245.00,'2022-06-22 21:38:18','2022-06-22 22:22:16'),
(2,3,'Quo quasi ut cum.','beatae-pariatur-a-quia-suscipit-voluptatem','Voluptatem magnam quaerat fugit excepturi reiciendis non in molestiae adipisci omnis qui cum.',12,NULL,'Cumque ut ut officia. Optio laudantium qui iure qui modi similique. Vel voluptas adipisci consequatur eum. Assumenda sint eos aut et dicta. Eius quaerat enim in. Impedit amet sed voluptatibus sunt quidem. Dolorum fugit neque non omnis ipsam dolor quae. Et id assumenda libero. Reprehenderit illum et voluptatibus adipisci ullam. Excepturi enim cumque quaerat atque odit consequatur. Et id placeat consequatur quam et libero aliquid.',10716.00,'2022-06-22 21:38:18','2022-06-22 21:38:18'),
(3,2,'Repellendus ducimus dolorum porro quidem.','veniam-et-quod-et-et','Consequatur quia harum illo sapiente suscipit sunt laborum architecto rerum doloribus dolorum et sed numquam dolor quibusdam.',9,NULL,'Molestiae omnis commodi nostrum temporibus. Temporibus odit nobis veritatis veritatis voluptas est voluptatem placeat. Eligendi voluptas voluptas odit deleniti consequatur iure. Veniam harum illum maiores magnam recusandae voluptatem. Sit earum hic debitis repellendus. Ut non aut aliquam et voluptatibus qui incidunt. Nemo numquam necessitatibus et qui autem nulla. Pariatur doloremque animi voluptate facilis id quo. Consequuntur non vero voluptatem quaerat. Dolore et enim quo ut fugiat quia.',16713.00,'2022-06-22 21:38:18','2022-06-22 21:38:18'),
(4,2,'Consequuntur qui earum dolor.','deleniti-suscipit-dolore-omnis-et','Quis consectetur aut laboriosam magni dolor ab voluptates ut est officia aut nisi qui ut provident aspernatur.',20,NULL,'Suscipit repellat est suscipit aut. Nesciunt deleniti excepturi vel sunt et magnam temporibus. Aut cumque provident eaque. Incidunt rem corrupti placeat reprehenderit sit sit sequi. Distinctio similique rerum ducimus consequatur explicabo quae. Tempore qui rerum aperiam doloremque. Eum temporibus omnis aliquam non. Ut et ut sint dolorem deserunt quo. Quas ab nesciunt doloribus doloremque. Aperiam ut adipisci porro placeat cupiditate sed est.',12964.00,'2022-06-22 21:38:18','2022-06-22 21:38:18'),
(5,1,'Quia est sit.','eos-aut-repudiandae-eos-dolorem-optio','Quasi animi tenetur sint aut quia eaque aut ut sunt quibusdam maiores molestiae quo aut accusantium quisquam.',5,NULL,'Minima laborum consequuntur perferendis assumenda asperiores pariatur et. Quia est ipsam cumque labore a quia praesentium. Explicabo a aut earum pariatur cumque. Commodi sit voluptatem consequatur consequatur sint eaque consectetur. Non quam consequatur ullam quia.',15993.00,'2022-06-22 21:38:18','2022-06-22 21:38:18'),
(6,2,'Maxime nihil quis sit vel.','est-et-quae-rerum-eos','Ipsa ut voluptatibus ad quidem eum est id non at esse debitis hic.',14,NULL,'Deleniti distinctio saepe voluptates amet. Ut eum voluptatem exercitationem quo quae. Harum a adipisci deleniti eveniet quo aut. Cupiditate sunt enim quia fugiat eius omnis. Sit voluptates qui facere harum itaque minus. Modi saepe qui error quia fugiat voluptas. Ex sint in quos omnis.',11097.00,'2022-06-22 21:38:18','2022-06-22 21:38:18'),
(7,2,'Veritatis commodi et quia.','inventore-et-tenetur-rerum-modi-expedita','Voluptatibus vel dolor fugit qui laboriosam et aut recusandae animi sit et unde.',5,NULL,'Repellendus enim eligendi molestiae inventore qui voluptas nam. Voluptates et et corrupti ipsa. Atque maiores rerum non. Commodi autem doloribus qui natus dolorem harum earum. Rem tempore perferendis magni ut similique. Est dolorem soluta aut at in ut. Voluptatem voluptatem repellendus et omnis vel autem autem. Libero nihil eum magni dolorem nihil. Adipisci ut excepturi voluptates illum. Voluptas totam eos reiciendis odio temporibus laudantium molestiae quia. Sit quaerat sint eos optio dolorem dicta natus.',15774.00,'2022-06-22 21:38:18','2022-06-22 21:38:18'),
(8,2,'Et distinctio esse repudiandae.','voluptatibus-mollitia-et-odit-doloremque-vitae','Iusto non quod minima aut accusamus mollitia cupiditate aut minus quia doloribus dignissimos dolorum dolores.',13,NULL,'Ut ea ut architecto. Molestiae voluptate facilis ab qui ea dignissimos. Voluptatem rem culpa repudiandae ut sunt nihil. Quaerat qui ut labore. Est minima quibusdam et vel aut illo. Exercitationem cumque rerum asperiores illum. Quis harum mollitia vitae omnis voluptas.',14484.00,'2022-06-22 21:38:18','2022-06-22 21:38:18'),
(9,1,'Inventore ipsum et.','deserunt-repudiandae-totam-voluptas-minus-non-omnis-quia-quaerat','Sint est aliquid aut distinctio sed quia illum est labore rerum voluptates exercitationem et quas.',15,NULL,'Aut eum quas expedita qui rerum similique. Iste tenetur ea et illo dolores voluptatibus et. Libero molestias aut explicabo vero sed. Inventore ea nihil repellendus delectus. Praesentium cum quae iure labore.',11456.00,'2022-06-22 21:38:18','2022-06-22 21:38:18'),
(10,3,'Illo aut necessitatibus.','enim-qui-magnam-doloremque-itaque-ea-qui','Voluptatem dolore modi aut commodi consequatur at vel ea doloribus pariatur ipsam ratione tenetur et repellat omnis sed.',1,NULL,'Est eum quas rerum odio magni repellat rem. Ut vel consequatur quod. Asperiores maxime recusandae quaerat id illum deleniti dolor. Vel dolores omnis quia necessitatibus quis excepturi dolorem. Et dolores nostrum veniam cumque tenetur est ipsam nemo. In sit velit dolorem temporibus et dolores quae aut. Eos magnam accusantium libero optio quia et nisi. Et dolore similique deserunt autem. Corporis et earum velit quisquam quo voluptatem. Dolorem reprehenderit repellendus vero rerum. Itaque in voluptatibus culpa non harum. Tenetur dolor eos cupiditate ut tenetur.',16885.00,'2022-06-22 21:38:18','2022-06-22 21:38:18'),
(11,3,'Recusandae deserunt provident iusto.','non-ut-est-cum-perspiciatis','Corporis est repellat sint exercitationem tempore dolor illum qui eligendi libero atque amet ratione earum debitis enim sit aut ab.',10,NULL,'Assumenda quis saepe dolores. Ut quod ut et repellat fugit aut eaque. Sed dolor veniam veniam doloribus. Sed aut sunt deleniti autem magnam sunt blanditiis. Amet omnis repudiandae officia cum ut nisi aliquam dicta. Ea repudiandae excepturi vel. Modi enim est tempora. Aut laboriosam non perferendis assumenda qui praesentium in. Et facere rerum ex dicta dolor itaque dolor veritatis. Laborum ipsum officia sint molestias et cumque consequatur. Harum ut cum velit itaque eligendi quis ipsam minima. Rerum eligendi aliquam est dolore.',15152.00,'2022-06-22 21:38:18','2022-06-22 21:38:18'),
(12,3,'Et enim aut ea et.','labore-quidem-modi-illum','Quidem repellat necessitatibus voluptatum praesentium hic aut nihil non tempore assumenda.',11,NULL,'Quia assumenda odio ut eaque culpa numquam cupiditate. Est et facilis minus sint. Quaerat aliquid alias iure qui quas. Est qui nulla porro nobis. Qui omnis quasi officia mollitia. Sed nisi sit sunt nisi. Non quibusdam quisquam ducimus. Vitae quis tempora non consequatur. Sed deserunt ea qui aliquid labore est asperiores.',17201.00,'2022-06-22 21:38:18','2022-06-22 21:38:18');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isAdmin` int(11) NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`isAdmin`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`,`address`,`number`,`image`) values 
(1,'ikhsan','ikhsan@mail.com',1,NULL,'$2y$10$L.AzADNwzjdf82y9hNmXHOl7BDnX/BRl0A8brveBvA8hRgdZ/hf/y',NULL,'2022-06-22 21:38:17','2022-06-23 16:25:50','Jalan Keputih No 1',NULL,'profile-images/9MzLKF9HClujJHrG60eERTqOeuSFAoyff2Ea33Sy.jpg'),
(2,'Auliyaaaa','aul@mail.com',0,NULL,'$2y$10$.T69b7vMcVzWSKa/W3PTEe5RlA9jAwahDzHsFe7gVZ9BrRNzaT41.',NULL,'2022-06-22 21:38:43','2022-06-24 00:35:08',NULL,'08212831741','profile-images/sGjlrlDgAYf9BfopeSNnsqTAPoSF76ztasl7fa9l.jpg'),
(4,'Auliyaz','auliya@mail.com',1,NULL,'$2y$10$2uLHQ.wtA8Vo8om1895.oOtsR8If6fAdFkK6gePPRUFWcBMZGnJf.',NULL,'2022-06-23 14:40:09','2022-06-23 14:40:09','Jalan Surabaya No 1','081234567890',NULL),
(5,'ikh','ikh@mail.com',0,NULL,'$2y$10$hLqkywPzlAFdudYetnpqgO8hb31tWz4y8CgY44hcXm09ucGr3DJ0y',NULL,'2022-06-25 01:13:04','2022-06-25 01:13:04',NULL,NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
