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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `categories` */

insert  into `categories`(`id`,`name`,`slug`,`created_at`,`updated_at`) values 
(1,'Dapur','dapur','2022-04-22 14:56:30','2022-04-22 14:56:30'),
(2,'Ruang Tengah','ruang-tengah','2022-04-22 14:56:30','2022-04-22 14:56:30'),
(3,'Personal','personal','2022-04-22 14:56:30','2022-04-22 14:56:30');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2019_08_19_000000_create_failed_jobs_table',1),
(4,'2019_12_14_000001_create_personal_access_tokens_table',1),
(5,'2022_04_21_132956_create_products_table',1),
(6,'2022_04_22_040852_create_categories_table',1);

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
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `products` */

insert  into `products`(`id`,`category_id`,`title`,`slug`,`excerpt`,`body`,`price`,`created_at`,`updated_at`) values 
(1,3,'Smartphone','sit-et-amet-animi','Aut sed non soluta aliquid assumenda architecto libero vel nisi odio deserunt non ad quod.','Animi fuga aperiam voluptas quasi amet voluptatem aut. Mollitia commodi quia possimus aut molestias. Error harum sunt in facilis nihil doloribus quis iusto. Tempore quidem eum tenetur odit et. Libero ullam doloribus repudiandae hic quo officia. Harum non nulla itaque non ex totam. Temporibus et molestiae veritatis voluptatum.',15019.00,'2022-04-22 14:56:30','2022-04-22 14:56:30'),
(2,3,'Laptop','et-odio-fuga-similique-libero-quia-omnis','Autem magnam illum aut vel laboriosam iure numquam ut nihil veritatis.','Assumenda excepturi dolor cum est sed repellendus architecto rerum. Ea ullam commodi et placeat numquam ea placeat. Fugit ut voluptas voluptatem quo corporis quia. Atque molestiae exercitationem eligendi. Quod magnam dolore vel quaerat in tempore. Blanditiis earum quia id nemo consequuntur est soluta. Qui est hic accusamus autem totam.',10146.00,'2022-04-22 14:56:30','2022-04-22 14:56:30'),
(3,2,'TV','enim-occaecati-est-animi-animi-praesentium-a-sit','Aliquid tempore impedit fuga sit explicabo distinctio molestiae tempore voluptas laboriosam voluptas omnis quia reiciendis accusamus dolores.','Praesentium ea ut dolor voluptas voluptatibus. Sunt asperiores est aliquam. Sequi aut a ducimus non aut aliquid ut voluptas. Dolorum minima distinctio eos aut voluptas autem. Voluptas inventore qui est nostrum quisquam. Minima laborum sunt ut officiis natus magni autem.',12747.00,'2022-04-22 14:56:30','2022-04-22 14:56:30'),
(4,3,'Headset','libero-ut-repellendus-quos-nostrum-eveniet-facere-voluptatum','Corporis qui ut beatae voluptatibus possimus ut minus consectetur impedit maxime amet reiciendis ratione.','Aliquam sed tempora animi qui dolor aliquid occaecati doloribus. Ratione velit tempore sint autem ea eum laudantium. Qui at harum hic sit. Deserunt alias sit autem aliquam. Ducimus sequi consequatur tempore et debitis et. Est non ea officiis nulla. Quo minus harum dolores consequatur. Similique voluptas laboriosam ipsa itaque tempora qui aut. Qui et eum aut est dolor numquam qui. Iusto accusantium libero aspernatur asperiores consequuntur. Qui ut ut qui possimus dolor. Quae amet expedita dolor debitis.',19491.00,'2022-04-22 14:56:30','2022-04-22 14:56:30'),
(5,3,'Quasi aliquam est eum neque.','quisquam-dignissimos-ut-et-sint','Et nobis hic repudiandae reprehenderit laboriosam id tenetur qui quae aperiam dolor amet eos iusto libero.','Qui est id odit a id. Est architecto ipsum quis vel. Quia sunt numquam consectetur eum eius aut quaerat. Maxime autem blanditiis eum sequi esse illo totam temporibus. Non autem sunt suscipit ad molestiae eaque possimus eius. Rerum voluptatum deleniti rerum. Ut cupiditate ea sit aliquid et eveniet possimus sunt. Ratione iste deleniti dolorem tenetur consequatur. Et omnis est nihil provident. Sint temporibus non et non occaecati vel enim. Expedita perferendis esse autem dicta.',19367.00,'2022-04-22 14:56:30','2022-04-22 14:56:30'),
(6,3,'Assumenda et possimus harum.','accusamus-aliquid-dicta-sapiente-hic','Illum fuga repellendus rerum alias totam aliquam expedita accusantium quo quia eos temporibus ad deserunt nesciunt molestias neque adipisci.','Aut quia perspiciatis amet quasi eius voluptas sequi suscipit. Et magnam ea amet nobis quaerat. Ullam odit necessitatibus debitis ratione sint aut totam. Dolorem qui recusandae impedit recusandae neque culpa deserunt. Alias quia rerum qui et non expedita qui dolores. Facere omnis illo deserunt mollitia similique. Et omnis ipsum voluptatem voluptatem excepturi. Vitae quam placeat qui enim aliquam at eum. Maxime aut quis numquam.',11087.00,'2022-04-22 14:56:30','2022-04-22 14:56:30'),
(7,2,'Lampu','facilis-quia-sunt-mollitia-illum-sed-aut-eligendi','Ea ut suscipit sint quae odit tenetur enim voluptatem harum quis nam quos eos quia aspernatur et ut.','Et et cupiditate tempora et iusto eos. Qui et velit culpa tempore facere. Ab iusto ipsum cumque ducimus praesentium voluptate et architecto. Iusto dolorem id et qui sint. Et accusantium aliquam consectetur aliquam voluptas ut. Inventore et repellat sint numquam. Repudiandae repudiandae eos natus molestiae dolores.',12664.00,'2022-04-25 14:50:00','2022-04-22 14:56:30'),
(8,3,'Voluptatibus veritatis eligendi eaque suscipit.','ipsa-at-ea-ut-dignissimos-aut-rerum','Illum ut ut molestias voluptatem commodi molestiae animi eos sit et quia in et nisi non accusamus.','Voluptatum in cum libero sequi. Id voluptatem est illo voluptatem est et. Nemo ipsum soluta rem maiores voluptas sunt. Consectetur ad id voluptates repudiandae hic voluptates aliquam. Eveniet mollitia recusandae asperiores praesentium facilis similique hic. Sed iusto consequuntur veniam omnis sit. Eos corporis sit ipsam placeat repellendus omnis ex. Sit ab dolore sed et deserunt. Dolorem consequatur ratione laborum praesentium.',19126.00,'2022-04-22 14:56:30','2022-04-22 14:56:30'),
(9,2,'Kipas','ab-quia-quia-voluptates-hic-laudantium-ut-ea','Magnam eveniet necessitatibus temporibus id minus sit repellat incidunt repellat omnis architecto.','Qui unde temporibus laborum velit quis nobis facilis quia. Sed eum dolores natus voluptatem totam eveniet aliquam natus. Exercitationem quaerat velit est itaque est. Odio architecto commodi ad recusandae dignissimos unde odio. Possimus officiis ab rerum quia rerum nobis culpa. Vel sit voluptatem ut a culpa.',14221.00,'2022-04-22 14:56:30','2022-04-22 14:56:30'),
(10,3,'Maxime voluptatem id blanditiis aliquam est.','id-nobis-autem-dignissimos-et','Deleniti et quas qui deserunt rerum omnis accusantium maxime magnam quae vel placeat doloremque in quia id sunt.','Quasi distinctio mollitia excepturi earum quo recusandae optio dolorum. Itaque soluta maiores qui aspernatur. Porro sit molestias suscipit. Vero ad repudiandae eligendi est porro iusto consequuntur. Ut minus accusamus minima odit. Voluptatem optio sint quod. Hic saepe rerum soluta excepturi vero officiis earum. Nobis aut eos necessitatibus fugit nam. Expedita sint ut sequi. Labore tempore fugiat et.',16829.00,'2022-04-22 14:56:30','2022-04-22 14:56:30'),
(11,3,'Possimus nemo molestiae enim.','aut-neque-est-sunt-et-labore-pariatur-suscipit','Fugiat ipsa modi quibusdam rem voluptatem laborum eum soluta id.','Omnis dignissimos et repellat iusto provident in cum quidem. Amet eligendi culpa porro cum assumenda repellat. Pariatur accusantium eaque alias ut at sed nobis. Eligendi at nisi assumenda eaque aut. Repellendus iusto suscipit magnam. Autem explicabo error illum soluta natus quia. Iure unde eum sunt in aliquam ut ut.',15520.00,'2022-04-22 14:56:30','2022-04-22 14:56:30'),
(12,1,'Dispenser','dolor-soluta-officiis-quia-laudantium-maiores-vel','Eum esse pariatur ut error qui modi sit atque optio dignissimos qui error officia consequatur molestias quidem velit.','Dolorem reiciendis quae maiores recusandae illo voluptatibus voluptas et. Qui odio eos quia corrupti aliquam. Earum corporis ipsam ipsum a a aperiam. Doloribus voluptatem voluptatem autem qui sint maxime. Est totam nihil totam repellendus repellat in. Accusamus cumque exercitationem distinctio quis placeat fuga facere. Adipisci illo aut quia sint quos molestiae illum.',16540.00,'2022-04-22 14:56:30','2022-04-22 14:56:30'),
(13,1,'Kulkas','hai-hai','hai hai ini excerpt\r\n','hai hai ini body nya',13409.00,'2022-04-25 14:47:03','2022-04-25 14:47:06'),
(14,1,'Blender','hai-hai2','ini excerpt dapur 2\r\n','ini body dapur 2\r\n',12482.00,'2022-04-25 14:48:12','2022-04-25 14:48:15');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
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

/*Data for the table `users` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
