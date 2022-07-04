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

/*Table structure for table `alamat_pengiriman` */

DROP TABLE IF EXISTS `alamat_pengiriman`;

CREATE TABLE `alamat_pengiriman` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_penerima` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_tlp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelurahan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kodepos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `alamat_pengiriman` */

/*Table structure for table `cart` */

DROP TABLE IF EXISTS `cart`;

CREATE TABLE `cart` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `no_invoice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_cart` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_pengiriman` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_resi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ekspedisi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtotal` double(12,2) NOT NULL DEFAULT '0.00',
  `ongkir` double(12,2) NOT NULL DEFAULT '0.00',
  `total` double(12,2) NOT NULL DEFAULT '0.00',
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `cart` */

/*Table structure for table `cart_detail` */

DROP TABLE IF EXISTS `cart_detail`;

CREATE TABLE `cart_detail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `qty` double(12,2) NOT NULL DEFAULT '0.00',
  `harga` double(12,2) NOT NULL DEFAULT '0.00',
  `subtotal` double(12,2) NOT NULL DEFAULT '0.00',
  `cart_id` bigint(20) unsigned NOT NULL,
  `product_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `cart_detail` */

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `categories` */

insert  into `categories`(`id`,`name`,`slug`,`created_at`,`updated_at`) values 
(1,'Dapur','dapur','2022-07-04 09:41:30','2022-07-04 09:41:30'),
(2,'Ruang Tengah','ruang-tengah','2022-07-04 09:41:30','2022-07-04 09:41:30'),
(3,'Personal','personal','2022-07-04 09:41:30','2022-07-04 09:41:30');

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2019_08_19_000000_create_failed_jobs_table',1),
(4,'2019_12_14_000001_create_personal_access_tokens_table',1),
(5,'2022_04_21_132956_create_products_table',1),
(6,'2022_04_22_040852_create_categories_table',1),
(7,'2022_06_22_083845_add_to_users_table',1),
(8,'2022_07_03_150129_create_carts_table',1),
(9,'2022_07_03_162924_create_cart_details_table',1),
(10,'2022_07_03_164915_create_alamat_pengirimen_table',1),
(11,'2022_07_04_030653_create_orders_table',1);

/*Table structure for table `orders` */

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cart_id` int(10) unsigned NOT NULL,
  `nama_penerima` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_cart_id_foreign` (`cart_id`),
  CONSTRAINT `orders_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `orders` */

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
  `price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `products` */

insert  into `products`(`id`,`category_id`,`title`,`slug`,`excerpt`,`stock`,`image`,`body`,`price`,`created_at`,`updated_at`) values 
(1,1,'Velit blanditiis nihil nostrum.','et-dolor-sed-est-aut','Et facere vero culpa porro nihil cupiditate et aliquam modi omnis pariatur et nemo veritatis et velit eum sed temporibus.',19,NULL,'Eum officia occaecati beatae optio esse tempora. Rerum perferendis in vel placeat. Nisi pariatur enim deleniti ut at amet hic maxime. Aspernatur quas est non sit. Nemo illum autem placeat perferendis et vel. Recusandae autem deleniti nihil.',13240,'2022-07-04 09:41:30','2022-07-04 09:41:30'),
(2,3,'Accusamus ducimus ex vel voluptas.','a-quia-esse-eligendi-repudiandae-accusamus-ullam','Delectus rem omnis consequatur sint vel vel iure sed ducimus minima rerum temporibus ducimus.',10,NULL,'Non molestias tenetur qui sed quasi et. Ad culpa ut aut unde. Velit incidunt vel cupiditate dolor neque et. Voluptatem est sed qui modi eius et. Sit voluptatem vel eos aut sint. Libero quia vitae sint rem architecto. Sit et quia corporis.',12217,'2022-07-04 09:41:30','2022-07-04 09:41:30'),
(3,1,'Incidunt velit praesentium et impedit.','eos-dolor-est-et-fuga','Autem voluptatem neque mollitia sed odio nesciunt debitis distinctio.',4,NULL,'Eaque explicabo velit delectus sed. Ad at itaque deserunt inventore voluptatem sit. Eos eum ea earum mollitia explicabo. Praesentium quae libero rerum porro deserunt. Quidem dolore beatae assumenda ullam reprehenderit dolorum distinctio. Autem aut velit dolores quia voluptatem esse.',12623,'2022-07-04 09:41:30','2022-07-04 09:41:30'),
(4,3,'Ipsa facere.','non-inventore-nam-quo-molestiae','Occaecati accusantium omnis ut error ea perferendis consequatur tempore dolorum molestiae quisquam deleniti.',4,NULL,'Laboriosam illum voluptas sit repellat. Ut optio quo dolores est corporis provident voluptatum voluptas. Quidem distinctio omnis qui consequatur. Iste omnis quos tempore. Odit ut est in. Qui repudiandae ipsa voluptas enim animi sint placeat. Et repudiandae hic et quam tenetur.',19250,'2022-07-04 09:41:30','2022-07-04 09:41:30'),
(5,2,'Quis numquam autem ipsam ut.','autem-sit-vitae-nesciunt-sit','Sunt et minima qui ea dolores non et repellat perspiciatis cumque quo natus.',3,NULL,'Similique velit deleniti voluptatem cupiditate sint est. Perspiciatis enim sint illo veniam dicta natus cupiditate non. Consequatur necessitatibus iste quibusdam alias eos. Asperiores ut enim quo eos libero libero. Perferendis ut quos iste asperiores. Ex officia sint cumque delectus culpa harum. Quo est ratione soluta illum alias asperiores. Architecto ea neque cupiditate cupiditate. Quidem veniam voluptatem hic voluptates nisi officiis. Eius eum aut velit labore commodi sed tenetur nihil.',14243,'2022-07-04 09:41:30','2022-07-04 09:41:30'),
(6,3,'Placeat placeat officiis quo accusamus iure.','nobis-dignissimos-harum-quia-et-deleniti-deserunt-atque-et','Molestias assumenda aut aut ipsam debitis ut officiis consequatur officia consequatur ipsam.',15,NULL,'Rerum optio sapiente magnam nisi mollitia sunt voluptas rerum. Qui ipsa voluptatibus quia sit. Soluta ab incidunt earum ut nostrum deleniti perspiciatis. Et cum dolor perferendis provident voluptas provident quo fugiat. Officiis non voluptas perspiciatis laboriosam. Maiores est voluptatem voluptatem autem modi minus dolores. Est nam eum voluptas nihil fugit rerum voluptas. Et voluptas corporis in ut. Molestiae doloremque deserunt molestiae ipsum. Molestiae dolores temporibus sed libero.',18158,'2022-07-04 09:41:30','2022-07-04 09:41:30'),
(7,2,'Eos ipsam ad quibusdam.','quis-sit-ratione-hic-porro-voluptatibus','Ut beatae reiciendis nesciunt unde mollitia ut quo aut similique dolores aut possimus.',1,NULL,'Omnis incidunt nobis corrupti velit qui voluptatem nihil occaecati. Adipisci mollitia et aliquid autem tempore sequi illo. Inventore ad dignissimos quia tempore beatae et alias. Minus dolore sit minima est quidem. Sit est corporis consectetur nesciunt. Illo rerum expedita enim est totam quos molestiae.',14651,'2022-07-04 09:41:30','2022-07-04 09:41:30'),
(8,3,'Illum ea nam numquam molestiae.','rerum-earum-blanditiis-tempore','Tenetur rerum fuga dicta sit id itaque aliquam eius quia quos molestias occaecati voluptatem consectetur sit voluptatem et tempora quo.',1,NULL,'Placeat sequi occaecati aut aut. Accusantium maiores nihil sunt illo aut quaerat autem. Vero earum similique iusto deleniti sit sint. Soluta voluptatibus est voluptatem ea. A et accusantium saepe et. Quisquam ex optio maxime eos deserunt quos. Omnis accusamus adipisci earum ipsum ut a. Quaerat laudantium unde et est exercitationem nihil. Accusamus vel velit veniam eveniet. Laboriosam et laborum reiciendis officiis odit tempora. Et harum perferendis molestiae nobis aut. Magnam facilis velit sunt aliquid. Dignissimos sit ut quia sit deserunt.',17770,'2022-07-04 09:41:30','2022-07-04 09:41:30'),
(9,3,'Tempore dicta autem animi molestiae pariatur.','qui-quod-et-eveniet','Aut doloribus aut enim et laborum facilis rerum dolorem aperiam iusto asperiores vel.',11,NULL,'Et eum est qui et aut est. Illum vitae quia minus cum voluptatem ex dolores. Quam dolor enim dolor ab. Praesentium autem laboriosam eveniet ipsa. Perferendis ipsum cum voluptatum dicta et aut repellat ab. Minus voluptatem repudiandae illo aut. Nobis illum consequatur laudantium aut similique nulla sequi. Ipsam asperiores optio harum ut in.',12587,'2022-07-04 09:41:30','2022-07-04 09:41:30'),
(10,2,'Quo repudiandae repellendus quos.','est-fugit-omnis-animi-esse-quos-asperiores','Dolorum facere aspernatur omnis facilis nisi dolorum nihil ab doloremque rem qui tempore possimus qui.',18,NULL,'Voluptatibus reiciendis necessitatibus qui voluptatem. Cum est ipsum quis fugit expedita rerum. Voluptates sed qui debitis. Voluptas adipisci id aspernatur expedita. Atque nulla aut aliquam commodi velit. Dignissimos iste iusto quia sapiente asperiores sint non. Porro voluptate perspiciatis quas quia excepturi. Perspiciatis ut et ipsum inventore. Qui ea ab voluptatem neque veniam fugiat. Eveniet necessitatibus dignissimos voluptatibus non repudiandae.',14609,'2022-07-04 09:41:30','2022-07-04 09:41:30'),
(11,2,'Cumque sed qui quia laboriosam corrupti.','accusamus-non-autem-dolores-dolores-sit','Nostrum dicta atque non repellat tempore et eos distinctio perspiciatis dolore.',15,NULL,'Illo ipsam provident optio eaque. Amet ut reprehenderit voluptatem voluptas quia. Unde deleniti perspiciatis eum eveniet. Consectetur aut atque repudiandae ullam. Ea quia voluptatem quaerat.',13549,'2022-07-04 09:41:30','2022-07-04 09:41:30'),
(12,3,'Minima ad porro maxime voluptas perspiciatis.','non-unde-at-quod-blanditiis-corrupti-ducimus-rerum','Sint praesentium et nihil rerum dolores voluptatem rerum sint beatae praesentium quod et.',4,NULL,'Ut doloribus omnis recusandae voluptatem exercitationem accusantium ut. Atque omnis nam voluptatem veritatis. Optio inventore ratione iure rerum ipsam magnam facere quas. Ea et voluptatem eos ullam ut iure.',17283,'2022-07-04 09:41:30','2022-07-04 09:41:30');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`isAdmin`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`,`address`,`number`,`image`) values 
(1,'ikhsan','ikhsan@mail.com',1,NULL,'$2y$10$VycxB7ImpSFF7wojrw/OXOkX/XbXgPSIw7zST9uzGyWZB20qOoWDO',NULL,'2022-07-04 09:41:30','2022-07-04 09:41:30',NULL,NULL,NULL),
(2,'wahyu','wahyu@mail.com',0,NULL,'$2y$10$mIt7hznO53AHK2yARZKQd.ORiS10eF1aUil0gF6qUcGSo00HJlUrG',NULL,'2022-07-04 09:41:30','2022-07-04 09:41:30',NULL,NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
