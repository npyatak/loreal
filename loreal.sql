-- MySQL dump 10.16  Distrib 10.1.26-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: loreal
-- ------------------------------------------------------
-- Server version	10.1.26-MariaDB-0+deb9u1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'admin','sdsadasd','$2y$13$p/KNFsvgjgMnX1HyfdDj6.HlC3Ud29sEQ6kDPYiiBRbIKvgHrhjOq',NULL,'',10,1520319601,1520319601);
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `answer`
--

DROP TABLE IF EXISTS `answer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `answer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_right` int(1) DEFAULT NULL,
  `score` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `{answer}_question_id_fkey` (`question_id`),
  CONSTRAINT `{answer}_question_id_fkey` FOREIGN KEY (`question_id`) REFERENCES `question` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answer`
--

LOCK TABLES `answer` WRITE;
/*!40000 ALTER TABLE `answer` DISABLE KEYS */;
INSERT INTO `answer` VALUES (1,1,'Нет, настоящая женщина должна блистать всегда!',NULL,NULL,'И мы тебя понимаем! Нужно всегда быть готовой – как минимум, к неожиданной фотосессии для Instagram.',1,3),(2,1,'Я и дома всегда использую косметику',NULL,NULL,'И мы тебя понимаем! Нужно всегда быть готовой – как минимум, к неожиданной фотосессии для Instagram.',NULL,4),(3,1,'Это зависит от того, куда и зачем я иду. Тратить дорогой хайлайтер, чтобы ослепить кассиршу в супермаркете – это не мое!',NULL,NULL,'Осторожно! А вдруг за углом бывший – а ты не готова к встрече?',NULL,2),(4,1,'Да, чаще всего так и выхожу, а крашусь только по особым случаям: на выпускной, на свадьбу и на юбилей свекрови',NULL,NULL,'Осторожно! А вдруг за углом бывший – а ты не готова к встрече?',NULL,1),(5,2,'Это мейкап-техника выделения контуров лица с помощью хайлайтера без использования бронзера',NULL,NULL,'100%-ное попадание! Ты действительно профессионал в этом!',1,4),(6,2,'У вас слишком сложные вопросы, я к такому не готовилась!',NULL,NULL,'Ну, не знаешь, так не знаешь. Не расстраивайся. В Гугле все есть.',NULL,1),(7,2,'Это когда добывают биткоины и зарабатывают много денег',NULL,NULL,'Ну, не знаешь, так не знаешь. Не расстраивайся. В Гугле все есть.',NULL,1),(8,2,'Я знаю – это макияж, при котором можно подчеркнуть контуры лица с помощью бронзера и хайлайтера',NULL,NULL,'Почти получилось, но нужно еще чуточку подучить',NULL,3),(9,3,'Pierre BALMAIN',NULL,NULL,'Нет, давай попробуем еще раз. Это действительно сложный вопрос.',1,2),(10,3,'Olivier Rousteing',NULL,NULL,'Абсолютно верно! Это Olivier Rousteing. Идем дальше?',NULL,4),(11,3,'Пэрис Хилтон',NULL,NULL,'Вполне могла бы, но не в этом случае.',NULL,1),(12,3,'Какой-то модный обозреватель',NULL,NULL,'Давай попробуем еще раз? Это действительно сложный вопрос.',NULL,1),(13,4,'Аэрограф',NULL,NULL,'Молодец! Это правильный ответ!',1,4),(14,4,'Прибор для удаления акне',NULL,NULL,'Интересное предположение, но нет. Это аэрограф.',NULL,1),(15,4,'Пистолет для прокола ушей',NULL,NULL,'Интересное предположение, но нет. Это аэрограф.',NULL,1),(16,4,'Ирригатор, что бы это ни значило',NULL,NULL,'Интересное предположение, но нет. Это аэрограф.',NULL,1),(17,5,'Блистать всегда!',NULL,NULL,'И мы тебя понимаем и полностью поддерживаем!',1,4),(18,5,'Встречают по одежке',NULL,NULL,'И мы тебя понимаем и полностью поддерживаем!',NULL,2),(19,5,'Красота спасет мир',NULL,NULL,'И мы тебя понимаем и полностью поддерживаем!',NULL,3),(20,5,'Никогда не отказывайтесь от своей мечты',NULL,NULL,'И мы тебя понимаем и полностью поддерживаем!',NULL,4),(21,6,'Это кисти-щетки для нанесения макияжа',NULL,NULL,'Идеально! Признайся, ты профессиональный мейкапер?',1,4),(22,6,'Это щетки для котов и мелких пород собак',NULL,NULL,'Хороший вариант… Но это щетки для макияжа.',NULL,1),(23,6,'Это массажные щетки',NULL,NULL,'Хороший вариант… Но это щетки для макияжа.',NULL,1),(24,6,'Это щетки для прочистки сопел в карбюраторе',NULL,NULL,'Нет, они совсем не для этого, мы пошутили. Не надо так делать, лучше сразу обратиться к профессиональной бригаде.',NULL,0),(25,7,'Мультимаскинг',NULL,NULL,'Нет, все проще. Это всего лишь дрейпинг',1,1),(26,7,'Мультитаскинг',NULL,NULL,'Это дрейпинг. Может быть ты подрабатываешь менеджером в свободное время?',NULL,3),(27,7,'Дрейпинг',NULL,NULL,'Точно! Ты права, это дрейпинг.',NULL,4),(28,7,'Фризинг',NULL,NULL,'«Тепло ли тебе, девица?» Нет, фризинг – это японская манга о недалеком будущем человечества.',NULL,2),(29,8,'Тушь для ресниц Paradise',NULL,NULL,'Ты, конечно, права! Но оставь место и для спичек, палатки и аккумулятора для смартфона.',1,4),(30,8,'Палетка теней La Petite Palette',NULL,NULL,'Ты, конечно, права! Но оставь место и для спичек, палатки и аккумулятора для смартфона.',NULL,4),(31,8,'Матовая помада Color Riche из коллекции Balmain',NULL,NULL,'Ты, конечно, права! Но оставь место и для спичек, палатки и аккумулятора для смартфона.',NULL,4),(32,8,'Консилер для лица Alliance Perfect',NULL,NULL,'Ты, конечно, права! Но оставь место и для спичек, палатки и аккумулятора для смартфона.',NULL,4),(33,8,'Жидкий хайлайтер Glow Mon Amour',NULL,NULL,'Ты, конечно, права! Но оставь место и для спичек, палатки и аккумулятора для смартфона.',NULL,4);
/*!40000 ALTER TABLE `answer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ig_parse_data`
--

DROP TABLE IF EXISTS `ig_parse_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ig_parse_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ig_user_id` bigint(20) NOT NULL,
  `ig_post_id` bigint(20) NOT NULL,
  `ig_caption` text COLLATE utf8_unicode_ci,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ig_post_id` (`ig_post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ig_parse_data`
--

LOCK TABLES `ig_parse_data` WRITE;
/*!40000 ALTER TABLE `ig_parse_data` DISABLE KEYS */;
INSERT INTO `ig_parse_data` VALUES (1,23812623,1729174571720655837,NULL,'https://scontent-frx5-1.cdninstagram.com/vp/41792e71ff731b38bd8d195def950f2e/5B38F65D/t51.2885-15/e35/28754517_566164680413752_1558156067030958080_n.jpg',5,1520354098,1520354103),(2,3124657614,1729167602692360888,NULL,'https://scontent-frx5-1.cdninstagram.com/vp/8a2e16c8d3646e8368def9cdf78354fe/5B46C1C1/t51.2885-15/e35/28753179_196925967559795_4435150802293620736_n.jpg',5,1520354098,1520354104),(3,181454237,1729164992432891731,NULL,'https://scontent-frx5-1.cdninstagram.com/vp/1cc01fdbecf2c0f2c2ca4b2368c2894e/5B27A4AF/t51.2885-15/e35/28156933_412158012563410_8792983057863802880_n.jpg',5,1520354098,1520354104),(4,1393503791,1729159647136507848,NULL,'https://scontent-frx5-1.cdninstagram.com/vp/7ac6894c0a71d48167678c4c9061ae3f/5B4BB11F/t51.2885-15/e35/28428773_159993031370823_2151637504145489920_n.jpg',5,1520354098,1520354104),(5,197226503,1729159137160828339,NULL,'https://scontent-frx5-1.cdninstagram.com/vp/525ea52f7158cd291c1297837785a9ce/5B28CD69/t51.2885-15/e35/28430684_228398664391160_3851851104845299712_n.jpg',5,1520354098,1520354105),(6,1997779385,1729159111339622987,NULL,'https://scontent-frx5-1.cdninstagram.com/vp/cbdf3b687f7e709c8ccdafdf7c325f88/5B3AF923/t51.2885-15/e35/28428209_959672097525536_2922773717928902656_n.jpg',5,1520354098,1520354105),(7,6084092101,1729158973732737353,NULL,'https://scontent-frx5-1.cdninstagram.com/vp/437d72db44a21cda766c77fbf52e9a09/5B4DC460/t51.2885-15/e35/28158542_150392952324557_1706943088603168768_n.jpg',5,1520354098,1520354105),(8,181849806,1729149452588713277,NULL,'https://scontent-frx5-1.cdninstagram.com/vp/5f84a2a37580a37d444cf60a2c45d475/5B38D854/t51.2885-15/e35/28427210_351869598646291_6643844889677135872_n.jpg',5,1520354098,1520354105),(9,4216408770,1729144900392075847,NULL,'https://scontent-frx5-1.cdninstagram.com/vp/57ac949b5feff3899b8cb1063fe4d19d/5B31F3A0/t51.2885-15/e35/28430844_1870771729844813_5222332760491819008_n.jpg',5,1520354098,1520354106),(10,368931401,1729142804415706993,NULL,'https://scontent-frx5-1.cdninstagram.com/vp/4c9b72c2a96fd03562987d690353bdf7/5B496D31/t51.2885-15/e35/28158650_1221242524676118_6245064958724276224_n.jpg',5,1520354098,1520354106),(11,5976370244,1729142362252199088,NULL,'https://scontent-frx5-1.cdninstagram.com/vp/a3c27ea7af5713b6b4e8b7dc77444f89/5B467737/t51.2885-15/e35/28430331_2058650367725172_5596218545600987136_n.jpg',5,1520354098,1520354108),(12,5532641932,1729141671414989760,NULL,'https://scontent-frx5-1.cdninstagram.com/vp/af93e9e0e6de16d0bb4c861cfe0c325d/5B2AA688/t51.2885-15/e35/28156321_785426701667275_7871323105237401600_n.jpg',5,1520354098,1520354108),(13,6989524659,1729141368376644393,NULL,'https://scontent-frx5-1.cdninstagram.com/vp/96b0a2fddf4cdac1b1ebde929baef21b/5B34FBFC/t51.2885-15/e35/28429148_1209679629168203_3231784116521271296_n.jpg',5,1520354098,1520354109),(14,4831060356,1729139424854140468,NULL,'https://scontent-frx5-1.cdninstagram.com/vp/44ad4dcd1642a28b632465b16a4d1432/5B35EE28/t51.2885-15/e35/28158721_2063017257279812_7519868912113025024_n.jpg',5,1520354098,1520354109),(15,5999978900,1729000422315634894,NULL,'https://scontent-frx5-1.cdninstagram.com/vp/00c5bf4694fecae0a278415d6cbe41e1/5AA15820/t51.2885-15/e15/28157700_2157140517847814_7505107586258042880_n.jpg',5,1520354098,1520354109),(16,4141074461,1729137460023540241,NULL,'https://scontent-frx5-1.cdninstagram.com/vp/3e36c4d461d14ba9b033ed46ebe565b6/5B2F21B1/t51.2885-15/e35/28430478_952461608243492_3916237109903491072_n.jpg',5,1520354098,1520354110),(17,5563117145,1729133339548605553,NULL,'https://scontent-frx5-1.cdninstagram.com/vp/859a15e8a2b2cdb35b33f2dd2e1c5bb6/5B29B963/t51.2885-15/e35/28427939_1658165397601912_934367502429847552_n.jpg',5,1520354098,1520354110),(18,3959202839,1729128054273289068,NULL,'https://scontent-frx5-1.cdninstagram.com/vp/ab7987ca36fc12a41ff41373e3016233/5B2DF35B/t51.2885-15/e35/28158207_158495021518041_2029889848617205760_n.jpg',5,1520354098,1520354110),(19,3959202839,1729127380550647789,NULL,'https://scontent-frx5-1.cdninstagram.com/vp/65746d6d82216dac33411912124e07b6/5B374A8A/t51.2885-15/e35/28428289_163194694255762_3627171250943557632_n.jpg',5,1520354098,1520354110),(20,2126695042,1729125370605950748,NULL,'https://scontent-frx5-1.cdninstagram.com/vp/a38b2e76a588d660a0750208dff37310/5B32BDD2/t51.2885-15/e35/28157234_155610701811406_17950343367229440_n.jpg',5,1520354098,1520354110),(21,427506656,1729120157338339757,NULL,'https://scontent-frx5-1.cdninstagram.com/vp/d93383720765c7d9ec80e0084a6f5ed1/5B27327F/t51.2885-15/e35/28763984_1951469355170498_5605741810946146304_n.jpg',5,1520354098,1520402210),(22,4141074461,1729120027841898730,NULL,'https://scontent-frx5-1.cdninstagram.com/vp/30a69e2ebb9ad4b694a0cbf843cf8dce/5AA1AA34/t51.2885-15/e15/28430758_1552127721532062_8091721112968232960_n.jpg',5,1520354098,1520402210),(23,337919805,1729118058054076534,NULL,'https://scontent-frx5-1.cdninstagram.com/vp/a4e1604284603bcebc6406dfc81a0d6c/5B49227E/t51.2885-15/e35/28754590_1877301532280114_5450029609875668992_n.jpg',5,1520354098,1520402210),(24,4144666688,1729113153897296444,NULL,'https://scontent-frx5-1.cdninstagram.com/vp/3474d120222ae73f6dd7ddfa73d2f08d/5B405F18/t51.2885-15/e35/28427563_171250846836854_5319005383333773312_n.jpg',5,1520354098,1520402211),(25,3115159721,1729111402022251091,NULL,'https://scontent-frx5-1.cdninstagram.com/vp/2237926ba3b309509517a9525da9fda2/5B29540E/t51.2885-15/e35/28427777_1937485229898381_1385435816943157248_n.jpg',5,1520354098,1520402211),(26,4785307045,1729109350050796404,NULL,'https://scontent-frx5-1.cdninstagram.com/vp/b33e6499351dce6609ad18cb95194875/5B43F14B/t51.2885-15/e35/28436150_894981587340177_4834278956309938176_n.jpg',5,1520354098,1520402211),(27,5433641387,1729107583844957640,NULL,'https://scontent-frx5-1.cdninstagram.com/vp/5358ef426c2c766e510c8e309d595584/5B360014/t51.2885-15/e35/28156785_772283516294033_3782359556198236160_n.jpg',5,1520354098,1520402211),(28,6077563800,1729104242731222777,NULL,'https://scontent-frx5-1.cdninstagram.com/vp/3f0d7d8e3b676c901bf64f28116f60b0/5B3551C9/t51.2885-15/e35/28429005_182990775820204_7629506812860956672_n.jpg',5,1520354098,1520402211),(29,2108433648,1729103910096176676,NULL,'https://scontent-frx5-1.cdninstagram.com/vp/dfeba2cc8f02bdcdf19ad8a17eb5e593/5B2D5F28/t51.2885-15/e35/28764850_156810408355610_7083674533202231296_n.jpg',5,1520354098,1520402211),(30,4946491526,1729091953345139157,NULL,'https://scontent-frx5-1.cdninstagram.com/vp/17571ca005124044f7c522b77b215060/5B40C823/t51.2885-15/e35/28751283_1463442580452035_8109719993760874496_n.jpg',5,1520354098,1520402212),(31,5865768578,1729087616273476537,NULL,'https://scontent-frx5-1.cdninstagram.com/vp/bbcde370f436dc344f480803aacb6a3e/5B2CEF3D/t51.2885-15/e35/28158482_333669890461010_3798477846905618432_n.jpg',5,1520354098,1520402215),(32,2108433648,1729083653033974117,NULL,'https://scontent-frx5-1.cdninstagram.com/vp/f644f6e901c5cf2c52e8323103214e72/5B359369/t51.2885-15/e35/28765735_547499692288086_4990423299809869824_n.jpg',5,1520354098,1520402215),(33,2714130383,1729082790827735794,NULL,'https://scontent-frx5-1.cdninstagram.com/vp/503a6ccd9466484a7f77ba26c2721289/5B43410D/t51.2885-15/e35/28436264_309204579605599_3275879407582969856_n.jpg',5,1520354098,1520402215),(34,2129075687,1729075998412880555,NULL,'https://scontent-frx5-1.cdninstagram.com/vp/2d2d4e6301bb349b985b7fa0e269ef8f/5B342935/t51.2885-15/e35/28428969_194526274477069_3352635455324553216_n.jpg',5,1520354098,1520402215),(35,190269265,1729074360830844810,NULL,'https://scontent-frx5-1.cdninstagram.com/vp/b14b7c7e803d75d1529e8eb00ad48132/5B486EBE/t51.2885-15/e35/28156347_923176954508851_1724231087883812864_n.jpg',5,1520354098,1520402216),(36,3447798969,1729071500692509687,NULL,'https://scontent-frx5-1.cdninstagram.com/vp/2ab9fd447c2df9acdfae9588a8f617f1/5B375E7C/t51.2885-15/e35/28156926_143730196453318_835525470131847168_n.jpg',5,1520354098,1520402216),(37,2253091588,1729070307807618043,NULL,'https://scontent-frx5-1.cdninstagram.com/vp/47917c6224abf5a4ab13bea07320031c/5B3E529C/t51.2885-15/e35/28429680_1752180588168089_3061643483920990208_n.jpg',5,1520354098,1520402216),(38,1389268183,1729070045479253941,NULL,'https://scontent-frx5-1.cdninstagram.com/vp/205966c50cf2c0e6f3f675a0a276338f/5B43B5CB/t51.2885-15/e35/28432631_1829549693785900_4082729859275554816_n.jpg',5,1520354098,1520402216),(39,7028104469,1729068320656636028,NULL,'https://scontent-frx5-1.cdninstagram.com/vp/ff3c78585e24f948bd4d5b276c8decca/5B4C41C9/t51.2885-15/e35/28433503_1702065336499312_256083649747746816_n.jpg',5,1520354098,1520402216),(40,6988921737,1729066021362465411,NULL,'https://scontent-frx5-1.cdninstagram.com/vp/1c368afa67f0309b6f241c7221a7319d/5B30A4EB/t51.2885-15/e35/28433326_175481003072033_7445219704743919616_n.jpg',5,1520354098,1520402216),(41,1389268183,1729064224707997913,NULL,'https://scontent-frx5-1.cdninstagram.com/vp/868abb690e4cb04a38e4fbd0b5eac114/5B3493D0/t51.2885-15/e35/28158773_468403186891305_4854375847022297088_n.jpg',1,1520354098,1520354098),(42,1431768360,1729063528964495666,NULL,'https://scontent-frx5-1.cdninstagram.com/vp/0db4b768a1d6f6689bd33b993edf1c53/5AA1264F/t51.2885-15/e15/28159008_1877037199036803_5027320715309744128_n.jpg',1,1520354098,1520354098),(43,1738332392,1729063215600338942,NULL,'https://scontent-frx5-1.cdninstagram.com/vp/7adc3a81d555a050bd4dc205b78e6955/5B428ECA/t51.2885-15/e35/28751840_560393841006270_7252230924165709824_n.jpg',1,1520354098,1520354098),(44,248972054,1729060150285009202,NULL,'https://scontent-frx5-1.cdninstagram.com/vp/94a8d6b2d4ae329aa9cdd8011f8635b9/5B4935E4/t51.2885-15/e35/28428536_339642819881569_7391734446942060544_n.jpg',1,1520354098,1520354098),(45,7230912799,1729057615172842587,NULL,'https://scontent-frx5-1.cdninstagram.com/vp/74f9479b669725d194bf227b5252009f/5B2A8202/t51.2885-15/e35/28429663_1719659488093240_6038708341545369600_n.jpg',1,1520354098,1520354098),(46,3817309842,1729053816072815418,NULL,'https://scontent-frx5-1.cdninstagram.com/vp/6a151affb5bdd33350c2856e6e526c64/5B275F38/t51.2885-15/e35/28435713_205332200048664_9055639377668997120_n.jpg',1,1520354098,1520354098),(47,1393503791,1729051007205339558,NULL,'https://scontent-frx5-1.cdninstagram.com/vp/6449f02e037b9561d3d3b146e204b4ed/5B2F8B62/t51.2885-15/e35/28158043_170342757093422_4859105868735578112_n.jpg',1,1520354098,1520354098),(48,2130192334,1729047868297538289,NULL,'https://scontent-frx5-1.cdninstagram.com/vp/8f71d1939c79ea36cafc91318c01cb27/5B4C862E/t51.2885-15/e35/28427214_1574108276029515_9155868284971646976_n.jpg',1,1520354098,1520354098),(49,6524234474,1729039909681632648,NULL,'https://scontent-frx5-1.cdninstagram.com/vp/de7339f557c9ff3946f6fba5b14ba7b9/5B4E0EFF/t51.2885-15/e35/28156134_2060086620900762_1023061364526022656_n.jpg',1,1520354098,1520354098),(50,494814692,1729039123635107485,NULL,'https://scontent-frx5-1.cdninstagram.com/vp/8b4ecd00debf73bd15f967f08fa7bda2/5B31CE9B/t51.2885-15/e35/28159045_1995589017122075_1902985273101254656_n.jpg',1,1520354098,1520354098),(51,1389857897,1729032430280970179,NULL,'https://scontent-frx5-1.cdninstagram.com/vp/bdeb45e89ac130c29aff5e960ef3f9d8/5AA1C894/t51.2885-15/e15/28428939_215890179148364_240816548543987712_n.jpg',1,1520354098,1520354098),(52,5846549752,1729028173029207908,NULL,'https://scontent-frx5-1.cdninstagram.com/vp/6220622d905b334c577eea541c457b05/5B2D6C9E/t51.2885-15/e35/28763797_354647248367734_855701916523429888_n.jpg',1,1520354098,1520354098),(53,5846549752,1729027494164346122,NULL,'https://scontent-frx5-1.cdninstagram.com/vp/3cc15476c19c45900a7a7661f372b63b/5B4CF90A/t51.2885-15/e35/28432641_592701887743944_2343647629180665856_n.jpg',1,1520354098,1520354098),(54,3655526214,1729011003461435187,NULL,'https://scontent-frx5-1.cdninstagram.com/vp/1ee4e6123b99e1c93da5481e871f0e31/5B4C74BA/t51.2885-15/e35/28430145_493933424336705_1739725199584002048_n.jpg',1,1520354098,1520354098),(55,5829751,1728367865906414893,NULL,'https://scontent-frx5-1.cdninstagram.com/vp/417858654f80161c404e5b532995bc5b/5B32AE4B/t51.2885-15/e35/28156178_450987921984120_7774669032359198720_n.jpg',1,1520354098,1520354098),(56,427506656,1727724689965909977,NULL,'https://scontent-frx5-1.cdninstagram.com/vp/0ae6b155c0209da1edb9229636a502a9/5B32520A/t51.2885-15/e35/28156847_134498694043311_1948929465979502592_n.jpg',1,1520354098,1520354098);
/*!40000 ALTER TABLE `ig_parse_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migration`
--

DROP TABLE IF EXISTS `migration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration`
--

LOCK TABLES `migration` WRITE;
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` VALUES ('m000000_000000_base',1520319600),('m180119_105335_create_table_admin',1520319601),('m180119_115335_create_table_user',1520319601),('m180119_135335_create_table_question',1520319601),('m180119_145335_create_table_answer',1520319602),('m180208_115337_create_table_ig_parse_data',1520319602),('m180208_135336_create_table_week',1520319602),('m180208_155340_create_table_post',1520319603),('m180220_115935_create_table_test_result',1520319603),('m180220_120248_create_table_video',1520319603),('m180221_100248_create_table_product',1520319603),('m180227_155340_create_table_product_link',1520319604),('m180228_115935_create_table_share',1520319604),('m180305_115345_create_table_post_action',1520319604),('m180306_132754_alter_table_post',1520354158),('m180307_155340_create_table_product_gallery',1520435078);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `week_id` int(11) NOT NULL,
  `ig_parse_data_id` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `score` int(11) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  `is_from_ig` int(1) DEFAULT NULL,
  `image_orientation` int(1) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `type` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `{post}_user_id_fkey` (`user_id`),
  KEY `{post}_week_id_fkey` (`week_id`),
  KEY `{post}_ig_parse_data_id_fkey` (`ig_parse_data_id`),
  CONSTRAINT `{post}_ig_parse_data_id_fkey` FOREIGN KEY (`ig_parse_data_id`) REFERENCES `ig_parse_data` (`id`),
  CONSTRAINT `{post}_user_id_fkey` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `{post}_week_id_fkey` FOREIGN KEY (`week_id`) REFERENCES `week` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post`
--

LOCK TABLES `post` WRITE;
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` VALUES (21,22,1,21,'8a0acf91ddde4512da29cdc5a67d29c5.jpg',0,1,1,1,1520402210,1520402221,NULL),(22,17,1,22,'8a0acf91ddde4512da29cdc5a67d29c5.jpg',1,1,1,1,1520402210,1520402222,NULL),(23,23,1,23,'8a0acf91ddde4512da29cdc5a67d29c5.jpg',0,1,1,1,1520402210,1520402223,NULL),(24,24,1,24,'8a0acf91ddde4512da29cdc5a67d29c5.jpg',0,1,1,1,1520402210,1520402225,NULL),(25,25,1,25,'81e05df15676b0ba6b812426fa80765d.jpg',1,1,1,1,1520402211,1520402226,NULL),(26,26,1,26,'81e05df15676b0ba6b812426fa80765d.jpg',0,1,1,1,1520402211,1520402227,NULL),(27,27,1,27,'81e05df15676b0ba6b812426fa80765d.jpg',1,1,1,1,1520402211,1520402228,NULL),(28,28,1,28,'81e05df15676b0ba6b812426fa80765d.jpg',0,1,1,1,1520402211,1520402229,NULL),(29,29,1,29,'81e05df15676b0ba6b812426fa80765d.jpg',0,1,1,1,1520402211,1520402231,NULL),(30,30,1,30,'81e05df15676b0ba6b812426fa80765d.jpg',0,1,1,1,1520402211,1520402231,NULL),(31,31,1,31,'b64ecaa2fe0e32134de2b982daa2c5ee.jpg',1,1,1,1,1520402214,1520402232,NULL),(32,29,1,32,'520ab72f86f5b99623d4ff89ac4a9081.jpg',0,1,1,1,1520402215,1520402234,NULL),(33,32,1,33,'520ab72f86f5b99623d4ff89ac4a9081.jpg',1,1,1,1,1520402215,1520402235,NULL),(34,33,1,34,'520ab72f86f5b99623d4ff89ac4a9081.jpg',0,1,1,1,1520402215,1520402235,NULL),(35,34,1,35,'520ab72f86f5b99623d4ff89ac4a9081.jpg',0,1,1,1,1520402215,1520402237,NULL),(36,35,1,36,'0d7ea787e2d4464cbfc84fd754edda58.jpg',0,1,1,1,1520402216,1520402238,NULL),(37,36,1,37,'0d7ea787e2d4464cbfc84fd754edda58.jpg',1,1,1,1,1520402216,1520402242,NULL),(38,37,1,38,'0d7ea787e2d4464cbfc84fd754edda58.jpg',1,1,1,1,1520402216,1520402241,NULL),(39,38,1,39,'0d7ea787e2d4464cbfc84fd754edda58.jpg',0,1,1,1,1520402216,1520402243,NULL),(40,39,1,40,'0d7ea787e2d4464cbfc84fd754edda58.jpg',1,1,1,1,1520402216,1520402245,NULL),(41,40,1,NULL,'408bc49675cc44b31e42b1d947980a57.jpg',0,0,0,NULL,1520446872,1520446872,1);
/*!40000 ALTER TABLE `post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_action`
--

DROP TABLE IF EXISTS `post_action`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post_action` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `type` int(1) NOT NULL,
  `score` int(11) NOT NULL DEFAULT '0',
  `created_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `{post_action}_user_id_fkey` (`user_id`),
  KEY `{post_action}_post_id_fkey` (`post_id`),
  CONSTRAINT `{post_action}_post_id_fkey` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `{post_action}_user_id_fkey` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_action`
--

LOCK TABLES `post_action` WRITE;
/*!40000 ALTER TABLE `post_action` DISABLE KEYS */;
INSERT INTO `post_action` VALUES (1,40,37,1,1,1520403774),(2,40,38,1,1,1520403776),(3,40,27,1,1,1520403780),(4,40,22,1,1,1520403783),(5,40,31,1,1,1520404124),(6,40,25,1,1,1520407749),(7,40,33,1,1,1520408605),(8,40,40,1,1,1520416963);
/*!40000 ALTER TABLE `post_action` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `show_on_main` int(1) NOT NULL DEFAULT '1',
  `test` int(11) DEFAULT NULL,
  `ga_param` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,'Гель-крем для бровей','/images/loreal_paradise_extatic.png','Paradise Pomade Extatic',1,NULL,'buy-paradise-extatic'),(2,'Тени для век','/images/loreal_eye_paint.png','Infaillible, Eye paint',1,NULL,'buy-eye-pait'),(3,'Карандаш для контура губ','/images/loreal_Infaillible.png','Infaillible',1,NULL,'buy-infaillible-lips'),(4,'Подводка для контура век','/images/loreal_tatoo.png','Tattoo Signature by Superliner',1,NULL,'buy-tattoo'),(5,'Тональный крем','/images/loreal_alper.png','Alliance Perfect, Совершенное слияние',1,NULL,'buy-alliance'),(6,'Гелевый лайнер для глаз','/images/loreal_gel_intensa.png','Gel Intenza',1,NULL,'buy-gel-intenza'),(7,'Губная помада','/images/loreal_domination.png','L\'Oréal Paris x Balmain от Color Riche',1,NULL,'buy-balman-domin');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_gallery`
--

DROP TABLE IF EXISTS `product_gallery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `gallery` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `{product_gallery}_product_id_fkey` (`product_id`),
  CONSTRAINT `{product_gallery}_product_id_fkey` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_gallery`
--

LOCK TABLES `product_gallery` WRITE;
/*!40000 ALTER TABLE `product_gallery` DISABLE KEYS */;
INSERT INTO `product_gallery` VALUES (25,2,1),(26,2,2),(38,1,1),(39,1,2),(42,3,1),(43,3,2),(44,3,3),(45,4,1),(46,4,2),(47,4,3),(50,5,1),(51,5,3),(56,7,1),(57,7,3),(58,6,1),(59,6,3);
/*!40000 ALTER TABLE `product_gallery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_link`
--

DROP TABLE IF EXISTS `product_link`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_link` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ga_param` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `{product_link}_product_id_fkey` (`product_id`),
  CONSTRAINT `{product_link}_product_id_fkey` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_link`
--

LOCK TABLES `product_link` WRITE;
/*!40000 ALTER TABLE `product_link` DISABLE KEYS */;
INSERT INTO `product_link` VALUES (1,1,'https://www.wildberries.ru/catalog/4594755/detail.aspx?targetUrl=ES','wildberries.ru','buy-paradise-extatic-wildberries','/images/wb_logo_lp.png'),(2,1,'https://shop.rivegauche.ru/newstore/ru/%D0%91%D1%80%D0%B5%D0%BD%D0%B4%D1%8B/%D0%92%D1%81%D0%B5-%D0%91%D1%80%D0%B5%D0%BD%D0%B4%D1%8B/L%27OREAL-PARIS/L%27Oreal-Paradise-Pomade-Extatic/p/873115','rivegauche.ru','buy-paradise-extatic-rivegauche','/images/rg_logo_lp.png'),(3,1,'https://pudra.ru/loreal/paradise-pomade-extatic-102-79134.html?collection_product_id=79131','pudra.ru','buy-paradise-extatic-pudra','/images/pudra_logo_lp.png'),(4,1,'https://www.ozon.ru/context/detail/id/142924781/','ozon.ru','buy-paradise-extatic-ozon','/images/ozon_logo_lp.png'),(5,1,'https://www.lamoda.ru/p/lo006lwztn27/beauty_accs-lorealparis-gel-dlya-brovey/','lamoda.ru','buy-paradise-extatic-lamoda','/images/lamoda_logo_lp.png'),(6,1,'https://www.letu.ru/makiyazh/dlya-glaz/dlya-brovei/l-oreal-gel-krem-dlya-brovei-paradise-pomade-extatic/59100030','letu.ru','buy-paradise-extatic-letu','/images/letu_logo_lp.png'),(7,2,'https://www.wildberries.ru/catalog/4102070/detail.aspx?targetUrl=ES','','buy-eye-pait-wildberries','/images/wb_logo_lp.png'),(8,2,'https://pudra.ru/loreal/infallible-eye-paints-205-72956.html?collection_product_id=72950','','buy-eye-pait-pudra','/images/pudra_logo_lp.png'),(9,2,'https://www.ozon.ru/context/detail/id/140959047/','','buy-eye-pait-ozon','/images/ozon_logo_lp.png'),(10,2,'https://www.lamoda.ru/p/lo006lwzje53/beauty_accs-lorealparis-teni-dlya-vek/','','buy-eye-pait-lamoda','/images/lamoda_logo_lp.png'),(11,2,'https://www.letu.ru/makiyazh/dlya-glaz/konturnye-karandashi-i-podvodka/l-oreal-gelevyi-lainer-dlya-glaz-gel-intenza/59100029','','buy-eye-pait-letu','/images/letu_logo_lp.png'),(12,2,'https://www.podrygka.ru/catalog/makiyazh/glaza/teni/143395-teni_dlya_vek_loreal_eye_paint_by_infaillible_ton_205_shampan_zhidkie_vodostoykie/','','buy-eye-pait-podrygka','/images/podruzka_logo_lp.png'),(13,3,'https://www.wildberries.ru/catalog/5066580/detail.aspx?targetUrl=ES','','buy-infaillible-lips-wildberries','/images/wb_logo_lp.png'),(14,3,'https://pudra.ru/loreal/tattoo-signature-by-superliner-01-85734.html','','buy-infaillible-lips-pudra','/images/pudra_logo_lp.png'),(15,3,'https://www.ozon.ru/context/detail/id/144085256/','','buy-infaillible-lips-ozon','/images/ozon_logo_lp.png'),(16,3,'https://www.lamoda.ru/p/lo006lwatkk2/beauty_accs-lorealparis-karandash-dlya-gub/','','buy-infaillible-lips-lamoda','/images/lamoda_logo_lp.png'),(17,3,'https://www.letu.ru/makiyazh/dlya-gub/konturnye-karandashi/l-oreal--karandash-dlya-kontura-gub--infaillible-/62000102','','buy-infaillible-lips-letu','/images/letu_logo_lp.png'),(18,4,'https://www.wildberries.ru/catalog/5066590/detail.aspx?targetUrl=ES','','buy-tattoo-wildberries','/images/wb_logo_lp.png'),(19,4,'https://pudra.ru/loreal/tattoo-signature-by-superliner-01-85734.html','','buy-tattoo-pudra','/images/pudra_logo_lp.png'),(20,4,'https://www.ozon.ru/context/detail/id/144085256/','','buy-tattoo-ozon','/images/ozon_logo_lp.png'),(21,4,'https://www.lamoda.ru/p/lo006lwatkl4/beauty_accs-lorealparis-podvodka-dlya-glaz/','','buy-tattoo-lamoda','/images/lamoda_logo_lp.png'),(22,4,'https://www.letu.ru/makiyazh/dlya-glaz/konturnye-karandashi-i-podvodka/l-oreal-vodostoikaya-podvodka-dlya-kontura-vek--tattoo-signature-by-superliner-/62000107','','buy-tattoo-letu','/images/letu_logo_lp.png'),(23,4,'https://www.podrygka.ru/catalog/makiyazh/glaza/podvodki/153629-layner_dlya_glaz_loreal_super_liner_tattoo_signature_chernyiy/','','buy-tattoo-podrygka','/images/podruzka_logo_lp.png'),(24,5,'https://www.wildberries.ru/catalog/1696402/detail.aspx?targetUrl=ES','','buy-alliance-wildberries','/images/wb_logo_lp.png'),(25,5,'https://shop.rivegauche.ru/newstore/ru/%D0%91%D1%80%D0%B5%D0%BD%D0%B4%D1%8B/%D0%92%D1%81%D0%B5-%D0%91%D1%80%D0%B5%D0%BD%D0%B4%D1%8B/L%27OREAL-PARIS/L%27Oreal-Alliance-Perfect/p/572234','','buy-alliance-rivegauche','/images/rg_logo_lp.png'),(26,5,'https://pudra.ru/loreal/paradise-pomade-extatic-102-79134.html?collection_product_id=79131','','buy-alliance-pudra','/images/pudra_logo_lp.png'),(27,5,'https://www.ozon.ru/context/detail/id/33323427/','','buy-alliance-ozon','/images/ozon_logo_lp.png'),(28,5,'https://www.lamoda.ru/p/lo006lwfjw33/beauty_accs-lorealparis-tonalnyy-krem/','','buy-alliance-lamoda','/images/lamoda_logo_lp.png'),(29,5,'https://www.letu.ru/makiyazh/dlya-litsa/tonalnye-sredstva/l-oreal-tonalnyi-krem-alliance-perfect-sovershennoe-sliyanie-vyravnivayushchii-i-uvlazhnyayushchii/3288','','buy-alliance-letu','/images/letu_logo_lp.png'),(30,5,'https://www.podrygka.ru/catalog/makiyazh/litso-1/tonalnye_sredstva/34364-krem_tonalnyy_dlya_litsa_loreal_alliance_perfect_ton_n2_vanil/','','buy-alliance-podrygka','/images/podruzka_logo_lp.png'),(31,6,'https://www.wildberries.ru/catalog/4594752/detail.aspx?targetUrl=ES','','buy-gel-intenza-wildberries','/images/wb_logo_lp.png'),(32,6,'https://shop.rivegauche.ru/newstore/ru/%D0%91%D1%80%D0%B5%D0%BD%D0%B4%D1%8B/%D0%92%D1%81%D0%B5-%D0%91%D1%80%D0%B5%D0%BD%D0%B4%D1%8B/L%27OREAL-PARIS/L%27Oreal-Gel-Intenza/p/873575','','buy-gel-intenza-rivegauche','/images/rg_logo_lp.png'),(33,6,'https://pudra.ru/loreal/superliner-gel-intenza-79130.html?collection_product_id=79129','','buy-gel-intenza-pudra','/images/pudra_logo_lp.png'),(34,6,'https://www.ozon.ru/context/detail/id/142924777/','','buy-gel-intenza-ozon','/images/ozon_logo_lp.png'),(35,6,'https://www.lamoda.ru/p/lo006lwatkh3/beauty_accs-lorealparis-podvodka-dlya-glaz/','','buy-gel-intenza-lamoda','/images/lamoda_logo_lp.png'),(36,6,'https://www.letu.ru/makiyazh/dlya-glaz/konturnye-karandashi-i-podvodka/l-oreal-gelevyi-lainer-dlya-glaz-gel-intenza/59100029','','buy-gel-intenza-letu','/images/letu_logo_lp.png'),(37,6,'https://www.podrygka.ru/catalog/makiyazh/glaza/podvodki/147045-podvodka_dlya_glaz_loreal_gel_intenza_gelevaya_chernaya_/','','buy-gel-intenza-podrygka','/images/podruzka_logo_lp.png'),(38,7,'https://www.wildberries.ru/catalog/4858313/detail.aspx?targetUrl=ES','','buy-balman-domin-wildberries','/images/wb_logo_lp.png'),(39,7,'https://shop.rivegauche.ru/newstore/ru/%D0%91%D1%80%D0%B5%D0%BD%D0%B4%D1%8B/%D0%92%D1%81%D0%B5-%D0%91%D1%80%D0%B5%D0%BD%D0%B4%D1%8B/L%27OREAL-PARIS/L%27Oreal-Color-Riche-Balmain/p/877526','','buy-balman-domin-rivegauche','/images/rg_logo_lp.png'),(40,7,'https://pudra.ru/loreal/loreal-paris-x-balmain-color-riche-lipstick-902-80993.html?collection_product_id=80984','','buy-balman-domin-pudra','/images/pudra_logo_lp.png'),(41,7,'https://www.ozon.ru/context/detail/id/143414988/','','buy-balman-domin-ozon','/images/ozon_logo_lp.png'),(42,7,'https://www.podrygka.ru/catalog/makiyazh/guby/pomada/150233-pomada_dlya_gub_loreal_color_riche_x_balmain_ton_dominirovanie/','','buy-balman-domin-podrygka','/images/podruzka_logo_lp.png');
/*!40000 ALTER TABLE `product_link` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `question`
--

LOCK TABLES `question` WRITE;
/*!40000 ALTER TABLE `question` DISABLE KEYS */;
INSERT INTO `question` VALUES (1,'Выходишь ли ты из дома без макияжа?','',NULL),(2,'Что такое стробинг?','',NULL),(3,'Кто создал оттенки помад для коллаборации L’Oreal Paris x Balmain?','',NULL),(4,'Что держит в руках эта девушка?','',NULL),(5,'КАКОЙ ТВОЙ ДЕВИЗ ПО ЖИЗНИ?','',NULL),(6,'Для чего эти предметы?','/images/qimg-6.png',NULL),(7,'Контуринг с помощью румян и хайлайтера родом из 70х это:','/images/qimg-7.png',NULL),(8,'Что бы ты взяла с собой на необитаемый остров?','',NULL);
/*!40000 ALTER TABLE `question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `share`
--

DROP TABLE IF EXISTS `share`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `share` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `text` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `share`
--

LOCK TABLES `share` WRITE;
/*!40000 ALTER TABLE `share` DISABLE KEYS */;
INSERT INTO `share` VALUES (1,'/?res=1','результат 1',NULL,NULL,NULL),(2,'/?res=2','результат 2',NULL,NULL,NULL),(3,'/?res=3','результат 3',NULL,NULL,NULL),(4,'/?res=4','результат 4',NULL,NULL,NULL);
/*!40000 ALTER TABLE `share` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `test_result`
--

DROP TABLE IF EXISTS `test_result`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `test_result` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `range_start` int(11) NOT NULL,
  `range_end` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test_result`
--

LOCK TABLES `test_result` WRITE;
/*!40000 ALTER TABLE `test_result` DISABLE KEYS */;
INSERT INTO `test_result` VALUES (1,7,12,'Ты – Мейкап-нигилист','Ты считаешь, что отлично выглядеть можно и без макияжа. Естественность и чувство юмора – твои сильные стороны.<br/>Но яркая помада и стрелки могут сделать этот день особенным.<br/>Не стоит отказывать себе в таком удовольствии!<br/>А мы подскажем как – смотри видео-уроки на канале L’Oreal Paris.',NULL,NULL),(2,13,18,'Ты – Мейкап-амазонка','Ты прагматична и эффективна. Ты не любишь проводить много времени у зеркала,<br/> пробуя новые тренды мейкапа. Тем не менее, когда тебе нужно, ты отлично<br/>справляешься с макияжем, а для ответственных случаев существуют визажисты.<br/>Пусть они и учат все эти непонятные слова, а для тебя важен результат! Будь в курсе<br/> последних событий, смотри наши уроки от L’ORÉAL PARIS',NULL,NULL),(3,19,23,'Ты Мейкап-джедай','Когда галактика в опасности, ты достаешь красную помаду... и уже никто не может<br/>тебе противостоять. Ты умело подчеркиваешь свои сильные стороны и не боишься<br/> смелых решений и экспериментов. И только ты решаешь, на какой стороне силы ты<br/>будешь сегодня.Участвуй в нашем конкурсе и покажи, на что ты способна!',NULL,NULL),(4,24,28,'Ты – Тру Мейкапер','Свотчинг, скульптуринг, хайлайтинг - многим эти слова непонятны, но не тебе - ты в<br/> курсе всех модных тенденций и первая осваиваешь новые техники макияжа, опережая<br/>всех своих подруг. В твоей косметичке мгновенно появляются лучшие продукты из<br/>лимитированных линеек, ведь ты знаешь о них все еще до лонча. Продолжай держать<br/>марку и  покажи, на что ты способна в конкурсе от L’ORÉAL PARIS.',NULL,NULL);
/*!40000 ALTER TABLE `test_result` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `soc` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sid` bigint(20) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `surname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `browser` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ig_id` bigint(20) DEFAULT NULL,
  `ig_username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,NULL,NULL,'ivan','ivanov',NULL,1,NULL,NULL,NULL,NULL,1520319601,1520319601),(2,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,23812623,NULL,1520354103,1520354103),(3,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,3124657614,NULL,1520354103,1520354103),(4,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,181454237,NULL,1520354104,1520354104),(5,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,1393503791,NULL,1520354104,1520354104),(6,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,197226503,NULL,1520354104,1520354104),(7,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,1997779385,NULL,1520354105,1520354105),(8,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,6084092101,NULL,1520354105,1520354105),(9,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,181849806,NULL,1520354105,1520354105),(10,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,4216408770,NULL,1520354105,1520354105),(11,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,368931401,NULL,1520354106,1520354106),(12,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,5976370244,NULL,1520354108,1520354108),(13,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,5532641932,NULL,1520354108,1520354108),(14,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,6989524659,NULL,1520354108,1520354108),(15,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,4831060356,NULL,1520354109,1520354109),(16,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,5999978900,NULL,1520354109,1520354109),(17,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,4141074461,NULL,1520354109,1520354109),(18,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,5563117145,NULL,1520354110,1520354110),(19,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,3959202839,NULL,1520354110,1520354110),(20,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,3959202839,NULL,1520354110,1520354110),(21,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,2126695042,NULL,1520354110,1520354110),(22,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,427506656,NULL,1520402210,1520402210),(23,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,337919805,NULL,1520402210,1520402210),(24,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,4144666688,NULL,1520402210,1520402210),(25,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,3115159721,NULL,1520402211,1520402211),(26,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,4785307045,NULL,1520402211,1520402211),(27,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,5433641387,NULL,1520402211,1520402211),(28,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,6077563800,NULL,1520402211,1520402211),(29,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,2108433648,NULL,1520402211,1520402211),(30,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,4946491526,NULL,1520402211,1520402211),(31,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,5865768578,NULL,1520402214,1520402214),(32,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,2714130383,NULL,1520402215,1520402215),(33,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,2129075687,NULL,1520402215,1520402215),(34,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,190269265,NULL,1520402215,1520402215),(35,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,3447798969,NULL,1520402216,1520402216),(36,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,2253091588,NULL,1520402216,1520402216),(37,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,1389268183,NULL,1520402216,1520402216),(38,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,7028104469,NULL,1520402216,1520402216),(39,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,6988921737,NULL,1520402216,1520402216),(40,'vk',3057152,'Николай','Пятак','https://pp.userapi.com/c637731/v637731152/64ab/n8ejMDpAst0.jpg',1,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.168 Safari/537.36 OPR/51.0.2830.40',NULL,NULL,1520403766,1520403766),(41,'vk',5051523,'Сергей','Темненко','https://pp.userapi.com/c837528/v837528523/237e2/HfdVJSUF7Zo.jpg',1,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.168 Safari/537.36 OPR/51.0.2830.40',NULL,NULL,1520411278,1520411278);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `video`
--

DROP TABLE IF EXISTS `video`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` int(1) NOT NULL DEFAULT '1',
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gallery` int(1) NOT NULL DEFAULT '1',
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `video`
--

LOCK TABLES `video` WRITE;
/*!40000 ALTER TABLE `video` DISABLE KEYS */;
INSERT INTO `video` VALUES (1,1,'zFw3lUtfU5g',1,NULL);
/*!40000 ALTER TABLE `video` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `week`
--

DROP TABLE IF EXISTS `week`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `week` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_1` text COLLATE utf8_unicode_ci,
  `description_2` text COLLATE utf8_unicode_ci,
  `date_start` int(11) NOT NULL,
  `date_end` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `number` (`number`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `week`
--

LOCK TABLES `week` WRITE;
/*!40000 ALTER TABLE `week` DISABLE KEYS */;
INSERT INTO `week` VALUES (1,1,'foodporn','','<p>С 15 по 22 сентября</p>','<p>С 15 по 22 сентября 2</p>',1520287200,1520892000),(2,2,'beauty','','<p>С 23 по 30 сентября</p>','<p>С 23 по 30 сентября 2</p>',1520892000,1521496800),(3,3,'wellness','','<p>С 1 по 8 октября</p>','<p>С 1 по 8 октября 2</p>',1521496800,1522098000),(4,4,'moms&kids','','<p>С 9 по 16 октября</p>','<p>С 9 по 16 октября 2</p>',1522098000,1522702800);
/*!40000 ALTER TABLE `week` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-03-07 21:00:14
