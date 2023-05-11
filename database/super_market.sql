-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 11, 2023 at 01:09 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `super_market`
--

-- --------------------------------------------------------

--
-- Table structure for table `daily`
--

DROP TABLE IF EXISTS `daily`;
CREATE TABLE IF NOT EXISTS `daily` (
  `id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

DROP TABLE IF EXISTS `discount`;
CREATE TABLE IF NOT EXISTS `discount` (
  `id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `new_arrivals`
--

DROP TABLE IF EXISTS `new_arrivals`;
CREATE TABLE IF NOT EXISTS `new_arrivals` (
  `id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `category` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `subcategory` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `img_uri` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `id_2` (`id`),
  KEY `id_3` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `category`, `subcategory`, `description`, `price`, `img_uri`) VALUES
(3, 'HP envy x360', 'electronics', 'laptop', 'Display size 15.60-inch. \r\nDis', '58996.55', 'hp_envy_x360.jpg'),
(5, 'Samsung S23 ultra', 'electronics', 'phone', '6.8” Edge QHD+ Dynamic AMOLED ', '120000.00', 'Samsung-Galaxy-S23-Ultra.jpg'),
(7, 'Lifebuoy ', 'sanitary', 'soup', 'Lifebuoy Total 10 Germ Protect', '45.50', 'Lifebuoy_soup.png'),
(9, 'Banana', 'foods', 'cultural', 'Banana 1KG organic', '44.99', 'banana.jpg'),
(10, 'Samsung S10', 'electronics', 'laptop', 'Samsung 64GB ROM, 6GB RAM', '50245.00', 'samsung-galaxy-s10-phone.jpeg'),
(11, 'Nail polish', 'beauty', 'women', 'Beetles gel nail polish 23 pcs', '540.20', 'beetles-gel-nail-polish-23-pcs.jpeg'),
(12, 'Zenbook pro', 'electronics', 'laptop', 'Asus zenbook pro 15', '940.62', 'asus-zenbook-pro-15.jpeg'),
(13, 'Auafine water', 'beverages', 'softdrink', 'Aquafine purified bottle water', '25.00', 'aquafine-purified-bottle-water.jpeg'),
(14, 'Axe prespirant', 'beauty', 'men', 'Axe dry ani prespirant anarchy', '210.40', 'axe-dry-anti-perspirant-anarchy.jpeg'),
(15, 'Asus Laptop', 'electronics', 'laptop', 'Asus ROG R7 Laptop', '56000.00', 'ASUS-ROG-R7-Laptop.jpeg'),
(16, 'Axe deodorant', 'beauty', 'men', 'Axe fine frogronce deodorant', '355.00', 'axe-fine-fragronce-deodorant.jpeg'),
(17, 'Belks Food Oil', 'foods', 'cultural', 'Belkis food oil 5L', '1200.00', 'belkis-food-oil.jpg'),
(18, 'Bic pen', 'Stationary', 'pen', 'Bic pen 12 pics', '150.00', 'bic-pens.jpeg'),
(19, 'Bic pen pack', 'Stationary', 'pen', 'Bix round stick xtra pen', '300.00', 'bic-round-stic-xtra-pen.jpeg'),
(20, 'Black powder', 'beauty', 'women', 'Black radiance loose setting powder', '450.22', 'black-radiance-loose-setting-powder.jpeg'),
(21, 'Botan rice', 'foods', 'modern', 'Botan extra fancy calorose rice', '540.87', 'botan-extra-fancy-calorose-rice.jpeg'),
(22, 'Bread', 'foods', 'modern', 'Bread slice', '50.00', 'bread.jpg'),
(23, 'Britannia cheese', 'foods', 'modern', 'Britannia cheese 20 pic', '780.50', 'britannia-cheese.jpg'),
(24, 'Calvin perfume', 'beauty', 'men', 'Calvin klein men perfume', '3200.90', 'calvin-klein-men.jpeg'),
(25, 'Candy', 'foods', 'modern', 'Candy pack 40 pices', '220.00', 'candy.jpg'),
(26, 'Coca cola', 'beverages', 'softdrink', 'Coca cola 2 litter bottle', '63.03', 'coca-cola-2-litter-bottle.jpeg'),
(27, 'Cosco table set', 'furniture', 'home', 'Cosco 5 piece card table set', '5392.82', 'cosco-5-piece-card-table-set.jpeg'),
(28, 'Cosco table', 'furniture', 'home', 'Cosco 6 foot folding table', '540.21', 'cosco-6-foot-folding-table.jpeg'),
(29, 'Diary milk chocolate', 'foods', 'modern', 'Diary milk chocolate', '48.83', 'diary-milk-chocolate.jpg'),
(30, 'Doritos chips', 'foods', 'modern', 'Doritos nacho cheese flavored chips', '35.29', 'doritos-nacho-cheese-flavered-chips.jpeg'),
(31, 'Dove moisture', 'beauty', 'women', 'Dove deep mosture', '179.00', 'dove-deep-moisture.jpeg'),
(32, 'Easyfashion sofa', 'furniture', 'home', 'Easyfashion modern cupholder, pillow bla', '4500.00', 'easyfashion-modern-fabric-cupholder-and-pillows-black-sofa.png'),
(33, 'Egg', 'foods', 'cultural', 'Single', '13.00', 'egg.jpg'),
(34, 'Broccoli', 'foods', 'cultural', 'Fresh broccoli crowns', '65.00', 'fresh-broccoli-crowns.jpeg'),
(35, 'Cucumber', 'foods', 'cultural', 'Fresh cucumber', '34.99', 'fresh-cucumber.jpeg'),
(36, 'Gree pepper', 'foods', 'cultural', 'Fresh green bell pepper', '20.00', 'fresh-green-bell-pepper.jpeg'),
(37, 'Cabbage', 'foods', 'cultural', 'Fresh green cabbage', '35.00', 'fresh-green-cabbage.png'),
(38, 'Red onions', 'foods', 'cultural', 'Fresh red onions', '40.00', 'fresh-red-onions.jpeg'),
(40, 'Yellow onions', 'foods', 'cultural', 'Fresh yellow onions', '44.00', 'fresh-yello-onions.jpeg'),
(41, 'Gain detergent', 'sanitary', 'detergents', 'Gain flings laundry detergent', '280.00', 'gain-flings-laundry-detergent.jpeg'),
(42, 'George belt', 'cloth', 'men', 'George men revisable black belt', '140.00', 'george-men-reversable-black-belt.jpeg'),
(43, 'Goya beans', 'foods', 'modern', 'Goya black beans', '340.00', 'goya-black-beans.jpeg'),
(44, 'Gymax sofa', 'furniture', 'home', 'Gymax modern fabric sofa', '2999.99', 'Gymax-modern-fabric-sofa.jpeg'),
(45, 'Organic egg', 'foods', 'cultural', 'Happy egg organic large brown egg', '160.00', 'happy-egg-organic-large-brown-egg.jpeg'),
(46, 'Head and shoulder shampoo', 'beauty', 'men', 'Head and shoulder shampoo and conditione', '240.00', 'hean-and-shoulder-shampoo-and-conditioner.jpeg'),
(47, 'Heineken beer', 'beverages', 'alcholic', 'Heineken beer 12 pack', '300.00', 'heineken-beer-12-pack.jpeg'),
(48, 'Herman mayonnaise', 'foods', 'modern', 'Herman mayonnaise 1kG', '290.00', 'herman-mayonnaise.jpg'),
(49, 'Herman boots', 'cloth', 'men', 'Herman survivor men steel work boots', '2690.50', 'herman-survivors-men-steel-toe-work-boots.jpeg'),
(50, 'HOMCOM sofa', 'furniture', 'office', 'HOMCOM modern upholstered sofa', '11300.00', 'HOMCOM-modern-upholstered-sofa.jpeg'),
(51, 'HP pavilion laptop', 'electronics', 'laptop', 'HP pavilion 16 RAM, 1TB ssd', '68200.00', 'hp-pavilion-laptop.jpeg'),
(52, 'Injera', 'foods', 'cultural', 'Injera white', '18.00', 'injera.jpg'),
(53, 'Kitfo', 'foods', 'cultural', 'Kitfo 1KG', '670.00', 'kitfo.jpg'),
(54, 'Koroneiki oil', 'foods', 'modern', 'Koroneiki olive oil 1.5 litter', '400.00', 'koroneiki-olive-oil.jpg'),
(55, 'Kraft macaroni', 'foods', 'modern', 'Kraft macaroni 2KG', '330.00', 'kraft-macaroni.jpg'),
(56, 'Laco sofo', 'furniture', 'home', 'Laco mid century loveseat sofa', '8800.00', 'Laco-mid-centrury-loveseat-sofa.jpeg'),
(57, 'Lenovo laptop', 'electronics', 'laptop', 'Lenovo ideapad laptop 8GB RAM, 1TB HDD, Core i5-1000U', '41200.50', 'lenovo-ideapad-laptop.jpeg'),
(58, 'LG phone', 'electronics', 'laptop', 'LG G8X ThinQ 128GB storage, 4GB RAM', '26000.00', 'LG-G8X-thinQ-128GB-phone.jpeg'),
(59, 'LG phone', 'electronics', 'laptop', 'LG stylo 6 32GB storage phone', '18000.00', 'LG-stylo-6-32GB-phone.jpeg'),
(60, 'Lifebuay soap', 'sanitary', 'soap', 'Lifebuay total handwash soap', '130.00', 'lifebuoy-total-handwash-soup.jpeg'),
(61, 'Madden shoes', 'cloth', 'women', 'Madden NYC little girl sneakers shoes', '1450.00', 'madden-NYC-little-girl-sneakers-shoes.jpeg'),
(62, 'Mainstay table', 'furniture', 'office', 'Mainstay 4 foot fold table', '2300.00', 'mainstay-4-foot-fold-table.jpeg'),
(63, 'Maya coconut', 'foods', 'modern', 'Maya kamil organic cocunt 1.5KG', '530.00', 'maya-kamil-organic-coconut.jpeg'),
(64, 'Microsoft laptop', 'electronics', 'laptop', 'Microsoft surface laptop', '78000.00', 'microsoft-surface-laptop.jpeg'),
(65, 'Microsoft laptop', 'electronics', 'laptop', 'Microsoft surface pro 4 laptop', '80500.00', 'microsoft-surface-pro-4-laptop.jpeg'),
(66, 'Milka chocolate', 'foods', 'modern', 'Milka chocolate', '56.00', 'milka-chocolate.jpg'),
(67, 'Milky way chocolate', 'foods', 'modern', 'Milky way milk chocolate', '70.00', 'milky-way-milk-chocolate.jpeg'),
(68, 'Strew hat', 'cloth', 'women', 'Mnycxen stew women hat', '440.00', 'mnycxen-strew-women-hat.jpeg'),
(69, 'Mustrad', 'foods', 'modern', 'Ivish yellow mustrad', '330.00', 'mustard.jpg'),
(70, 'My mochi ice cream', 'foods', 'modern', 'My mochi ice cream sweet mango pieces', '540.00', 'my-mochi-ice-cream-sweet-mango-pieces.jpeg'),
(71, 'Nautica perfume', 'beauty', 'men', 'Nautica voyage cologne fragrance men perfume', '7489.00', 'nautica-voyage-cologne-fragrance-for-men.jpeg'),
(72, 'Neutrogena sunscreen', 'beauty', 'women', 'Neutrogena age shield sunscreen', '2830.00', 'neutrogena-age-shield-sunscreen.jpeg'),
(73, 'Nobel sofa', 'furniture', 'home', 'Nobel house nickolas sofa', '6300.99', 'noble-house-nickolas-sofa.jpeg'),
(74, 'Paris age lipstick', 'beauty', 'women', 'Paris age perfect luminous lipstick', '560.00', 'paris-age-perfect-luminous-lipstick.jpeg'),
(75, 'Pantinum alchohol', 'beverages', 'alcholic', 'Platinum distilled extra smooth vodka', '900.00', 'platinum-distilled-extra-smooth-vodka-alchohol.jpeg'),
(76, 'Red cabbage', 'foods', 'cultural', 'Red cabbage 1KG', '45.00', 'red-cabbage.jpeg'),
(77, 'Reebox shoes', 'cloth', 'men', 'Reebox NFX men shoes', '3800.00', 'reebox-NFX-men-shoes.jpeg'),
(78, 'Rugged shoes', 'cloth', 'men', 'Rugged bear toddler bay sandals shoes', '789.00', 'rugged-bear-toddler-boy-sandals-shoes.jpeg'),
(79, 'Russell husky', 'cloth', 'men', 'Russell bay round short 4 pack size husky', '432.33', 'russell-bay-round-short-4-packsize-husky.jpeg'),
(80, 'Samsung laptop', 'electronics', 'laptop', 'Samsung galaxy book pro laptop', '53000.00', 'samsung-galaxy-book-pro-laptop.jpeg'),
(81, 'Samsung note 20', 'electronics', 'laptop', 'Samsung galaxy note 20 5G 128GB phone', '46000.00', 'samsung-galaxy-note-20-5g-128GB-phone.jpeg'),
(82, 'Samsung s10S', 'electronics', 'laptop', 'Samsung galaxy s10S 128GB phone', '45000.00', 'samsung-galaxy-s10E-128GB-phone.jpeg'),
(83, 'Scarleton bag', 'cloth', 'women', 'Scarleton small crossbody women bag', '644.22', 'scarleton-small-crossbody-women-bag.jpeg'),
(84, 'Seagram vodka', 'beverages', 'alcholic', 'Seagram extra smooth vodka', '1300.00', 'seagram-extra-smooth-vodka.jpeg'),
(85, 'Oreo cookies', 'foods', 'modern', 'Oreo chocolate sandwich cookies', '55.67', 'oreo-chocolate-sandwich-cookies.jpeg'),
(86, 'Quaker grits', 'foods', 'modern', 'Quaker instance grits value pack butter', '350.96', 'Quaker-instance-grits-value-pack-butter.jpeg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
