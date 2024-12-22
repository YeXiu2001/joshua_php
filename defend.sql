-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2024 at 08:36 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `defend`
--

-- --------------------------------------------------------

--
-- Table structure for table `cate_medic`
--

CREATE TABLE `cate_medic` (
  `id` int(11) NOT NULL,
  `cate_name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cate_medic`
--

INSERT INTO `cate_medic` (`id`, `cate_name`) VALUES
(1, 'Pain Reliever'),
(2, 'Anti-inflammatory'),
(3, 'Antibiotic'),
(4, 'Antacid'),
(5, 'Antidiabetic'),
(6, 'Bronchodilator'),
(7, 'Corticosteroid'),
(8, 'Alpha-blocker'),
(9, 'Anticoagulant'),
(10, 'Antiplatelet'),
(11, 'Anxiolytic'),
(12, 'Antidepressant'),
(13, 'Diuretic'),
(14, 'Erectile Dysfunction'),
(15, 'Hair Growth Treatment'),
(16, 'Sleep Aid'),
(17, 'Immunosuppressant'),
(18, 'Osteoporosis Treatment'),
(19, 'Antifungal'),
(20, 'Supplement'),
(21, 'Anticholinergic'),
(22, 'Muscle Relaxant'),
(23, 'Antihistamine'),
(24, 'Cholesterol Reducer'),
(25, 'Beta-blocker');

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `id` int(11) NOT NULL,
  `med_name` varchar(255) DEFAULT NULL,
  `cate_id` int(11) DEFAULT NULL,
  `stock_num` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`id`, `med_name`, `cate_id`, `stock_num`, `price`) VALUES
(1, 'Cypress, Arizona Pollen', 18, 74, 302.48),
(2, 'Rhustoxoforce', 16, 78, 1534.28),
(3, 'House Dust Mite, Dermatophagoides pteronyssinus', 12, 85, 958.99),
(4, 'good sense tussin', 6, 41, 534.31),
(5, 'Naprelan', 16, 13, 1646.12),
(6, 'Diazepam', 22, 60, 144.42),
(7, 'Common Sagebrush', 25, 57, 9.88),
(8, 'Mustela', 23, 90, 1824.72),
(9, 'CRH Medsense Simethicone 125mg Antigas', 3, 10, 32.44),
(10, 'Jute', 10, 47, 627.49),
(11, 'TYVASO', 15, 43, 1458.55),
(12, 'DYNACIN', 10, 66, 1578.69),
(13, 'Sunmark Hemorrhoidal', 10, 91, 1753.22),
(14, 'Hemorrhoid Relief', 6, 29, 731.68),
(15, 'ULTRA HYDRA', 14, 2, 1237.43),
(16, 'Escitalopram Oxalate', 19, 8, 499.43),
(17, 'Pseudoephedrine hydrochloride', 20, 36, 1675.70),
(18, 'JASMINE 3D WATERFUL CC', 4, 59, 1064.98),
(19, 'Rocky Mountain Juniper', 24, 92, 833.39),
(20, 'Sodium Bicarbonate', 18, 9, 1195.35),
(21, 'Benztropine Mesylate', 20, 76, 873.85),
(22, 'Olanzapine', 20, 27, 1722.83),
(23, 'Lidocaine Hydrochloride and Epinephrine', 11, 99, 995.26),
(24, 'Pearl White', 5, 99, 1919.59),
(25, 'Flomax', 11, 2, 94.86),
(26, 'Benazepril Hydrochloride', 12, 4, 915.34),
(27, 'Being Well Heartburn Relief', 22, 26, 1856.81),
(28, 'ENALAPRIL MALEATE', 4, 52, 1831.74),
(29, 'cisatracurium besylate', 24, 45, 1838.52),
(30, 'Theracodophen-750', 11, 33, 1458.72),
(31, 'Treatment Set TS350257', 3, 37, 1526.70),
(32, 'DayTime NightTime Cold/Flu', 3, 38, 544.59),
(33, 'Mountain Cedar', 23, 35, 1989.54),
(34, 'Zosyn', 23, 87, 1793.57),
(35, 'Cymbalta', 17, 62, 1911.27),
(36, 'Tylenol PM', 25, 41, 747.92),
(37, 'Gabapentin', 16, 16, 1169.06),
(38, 'Tramadol Hydrochloride and Acetaminophen', 15, 19, 1370.84),
(39, 'Smelt', 17, 73, 1591.93),
(40, 'AntiGas', 7, 45, 1235.27),
(41, 'BACTEX Antiseptic Hand Sanitizer', 2, 70, 1589.91),
(42, 'BeneFIX', 23, 79, 773.49),
(43, 'Flawless Effect Liquid Foundation SPF 15', 21, 77, 580.56),
(44, 'Folic Acid', 17, 1, 1818.86),
(45, 'Listerine FreshBurst Antiseptic', 21, 10, 421.57),
(46, 'Metoprolol Tartrate', 5, 41, 275.98),
(47, 'Potassium Chloride', 5, 38, 1118.02),
(48, 'Simvastatin', 25, 78, 808.03),
(49, 'Cover Tint', 3, 13, 707.35),
(50, 'COLGATE PROCLINICAL - Sparkling Mint', 15, 37, 733.03),
(51, 'Hydrocortisone', 8, 49, 1088.54),
(52, 'Colgate', 15, 20, 921.31),
(53, 'Oral Antivavity', 22, 39, 1905.82),
(54, 'NO-AD Dark Tanning SPF 4', 10, 8, 1605.65),
(55, 'Clearskin Blackhead Eliminating', 4, 9, 1241.21),
(56, 'Sulfamethoxazole and Trimethoprim', 4, 91, 1075.08),
(57, 'Sterile Water', 6, 18, 1728.13),
(58, 'Diltiazem Hydrochloride', 5, 27, 1091.13),
(59, 'LBEL', 8, 6, 1865.68),
(60, 'Stavudine', 19, 24, 1203.47),
(61, 'Chrysosplenium Chamomilla', 8, 69, 452.83),
(62, 'Baclezene', 2, 77, 1397.55),
(63, 'Fluconazole', 2, 31, 578.16),
(64, 'Triple Antibiotic', 9, 72, 1500.08),
(65, 'TIMENTIN', 1, 33, 286.32),
(66, 'Hydralazine Hydrochloride', 14, 8, 311.22),
(67, 'EQUATE', 19, 22, 207.76),
(68, 'Doxycyclate Hyclate', 16, 28, 1072.33),
(69, 'CPDA-1', 11, 35, 1846.80),
(70, 'Family Wellness Maximum Strength Hydrocortisone', 23, 13, 538.72),
(71, 'Allergy', 1, 26, 203.23),
(72, 'Amoxicillin and Clavulanate Potassium', 4, 52, 1547.69),
(73, 'Naproxen', 24, 35, 767.24),
(74, 'Rabbit Epithelium', 25, 62, 1924.02),
(75, 'Kenalog', 24, 21, 298.89),
(76, 'ATACAND', 4, 53, 1442.55),
(77, 'Good Neighbor Pharmacy Gas Relief', 15, 24, 1115.56),
(78, 'Remedy Phytoplex Z-Guard', 6, 30, 1213.01),
(79, 'Retin-A', 20, 82, 423.21),
(80, 'Benzonatate', 10, 8, 1176.18),
(81, 'Hydrating Instant Hand Sanitizer', 12, 16, 1658.50),
(82, 'Amlodipine besylate', 5, 77, 1960.90),
(83, 'Clonidine Hydrochloride', 1, 47, 196.94),
(84, 'Midodrine Hydrochloride', 7, 33, 577.63),
(85, 'Leg Cramp Relief', 12, 25, 961.14),
(86, 'Tobramycin', 18, 43, 454.57),
(87, 'ibuprofen', 7, 2, 597.54),
(88, 'IQUIX', 11, 62, 1815.23),
(89, 'cephalexin', 24, 87, 971.58),
(90, 'Hydrocodone Bitartrate and Acetaminophen Tablets', 17, 74, 1579.24),
(91, 'Nabumetone', 23, 48, 1188.95),
(92, 'Instant Hand Sanitizer', 22, 84, 822.27),
(93, 'EQUALINE', 13, 12, 1135.71),
(94, 'Ranitidine HYdrochloride', 16, 9, 1329.47),
(95, 'Ropinirole Hydrochloride', 15, 71, 1247.21),
(96, 'Anastrozole', 8, 76, 1782.78),
(97, 'ISOVUE', 22, 57, 1271.85),
(98, 'Beefwood/Australian Pine', 18, 76, 758.07),
(99, 'Diltiazem Hydrochloride', 12, 75, 1243.00),
(100, 'GABAPENTIN', 5, 81, 1704.26);

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` int(11) NOT NULL,
  `prem_cus_id` int(11) DEFAULT NULL,
  `med_id` int(11) DEFAULT NULL,
  `num_purchase` int(11) DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `p_customers`
--

CREATE TABLE `p_customers` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(45) DEFAULT NULL,
  `privilege_name` varchar(45) DEFAULT NULL,
  `discount` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `p_customers`
--

INSERT INTO `p_customers` (`id`, `customer_name`, `privilege_name`, `discount`) VALUES
(1, 'Jessie Wisher', 'senior', 15.00),
(2, 'Kendrick McKeveney', 'medprof', 5.00),
(3, 'Hasty Loffhead', 'pwd', 20.00),
(4, 'Alli Clare', 'pwd', 20.00),
(5, 'Katie Scipsey', 'senior', 15.00),
(6, 'Caritta Racher', 'senior', 15.00),
(7, 'Bambie Porter', 'pwd', 20.00),
(8, 'Mehetabel Silver', 'medprof', 5.00),
(9, 'Shay Simonin', 'senior', 15.00),
(10, 'Scott Splevin', 'pregnant', 10.00),
(11, 'Chariot Murcutt', 'pwd', 20.00),
(12, 'Elmo Asipenko', 'medprof', 5.00),
(13, 'Othilia Ortega', 'medprof', 5.00),
(14, 'Opal Bradman', 'senior', 15.00),
(15, 'Chandler Ourry', 'pregnant', 10.00),
(16, 'Angelina Shilton', 'senior', 15.00),
(17, 'Tarra Broadley', 'pwd', 20.00),
(18, 'Abba Onions', 'pwd', 20.00),
(19, 'Nehemiah Steers', 'pwd', 20.00),
(20, 'Edmon Lanfer', 'pwd', 20.00),
(21, 'Ruttger Widdop', 'pwd', 20.00),
(22, 'Evaleen Baumford', 'pregnant', 10.00),
(23, 'Daryle Spellworth', 'pregnant', 10.00),
(24, 'Carlos Roycraft', 'pregnant', 10.00),
(25, 'Bibbie Avrahm', 'senior', 15.00),
(26, 'Babara Lamcken', 'pwd', 20.00),
(27, 'Bliss Sproson', 'medprof', 5.00),
(28, 'Valentine Gully', 'senior', 15.00),
(29, 'Nissy Jeeks', 'medprof', 5.00),
(30, 'Modestia Marginson', 'pwd', 20.00),
(31, 'Blakeley Joinsey', 'senior', 15.00),
(32, 'Aleksandr Chamney', 'senior', 15.00),
(33, 'Sarita Fay', 'medprof', 5.00),
(34, 'Maddie Elphick', 'pwd', 20.00),
(35, 'Rita Corneljes', 'senior', 15.00),
(36, 'Ida Langan', 'pwd', 20.00),
(37, 'Myrtia Brew', 'senior', 15.00),
(38, 'Roderick Clapperton', 'medprof', 5.00),
(39, 'Batsheva Brigman', 'senior', 15.00),
(40, 'Leighton Davers', 'medprof', 5.00),
(41, 'Fancie Ludmann', 'senior', 15.00),
(42, 'Dame Rundall', 'medprof', 5.00),
(43, 'Joyan Boughtwood', 'pregnant', 10.00),
(44, 'Hamilton Illston', 'medprof', 5.00),
(45, 'Emory Szymanek', 'pwd', 20.00),
(46, 'Jorie Gregg', 'medprof', 5.00),
(47, 'Melamie Jachimak', 'senior', 15.00),
(48, 'Robinett Vecard', 'pregnant', 10.00),
(49, 'Hashim Camolli', 'pregnant', 10.00),
(50, 'Flossy Von Der Empten', 'medprof', 5.00),
(51, 'Tod McKenney', 'pregnant', 10.00),
(52, 'Vinni Polleye', 'senior', 15.00),
(53, 'Kimbell Sneddon', 'medprof', 5.00),
(54, 'Royal McGillreich', 'pregnant', 10.00),
(55, 'Modestine Bisset', 'pregnant', 10.00),
(56, 'Simone Chidler', 'pwd', 20.00),
(57, 'Shandra Withringten', 'pwd', 20.00),
(58, 'Aprilette Workman', 'pregnant', 10.00),
(59, 'Jewell McAllister', 'pregnant', 10.00),
(60, 'Haleigh Muckley', 'pwd', 20.00),
(61, 'Levey McKane', 'medprof', 5.00),
(62, 'Lisabeth Fergyson', 'senior', 15.00),
(63, 'Inge Roocroft', 'pwd', 20.00),
(64, 'Issie Jertz', 'pwd', 20.00),
(65, 'Lacie O\' Flaherty', 'pwd', 20.00),
(66, 'Flor Jennery', 'pwd', 20.00),
(67, 'Abagael Hallowell', 'pwd', 20.00),
(68, 'Taryn Goodanew', 'pwd', 20.00),
(69, 'Dollie Degoy', 'pregnant', 10.00),
(70, 'Gaylene Bassilashvili', 'pregnant', 10.00),
(71, 'Jemimah Gniewosz', 'pwd', 20.00),
(72, 'Buck Kellington', 'senior', 15.00),
(73, 'Ruby Dubble', 'medprof', 5.00),
(74, 'Wilbert Leband', 'medprof', 5.00),
(75, 'Sabra Drains', 'medprof', 5.00),
(76, 'Randie Skitterel', 'medprof', 5.00),
(77, 'Yevette Dainton', 'pwd', 20.00),
(78, 'Sherrie Hallworth', 'pregnant', 10.00),
(79, 'Jeralee Manterfield', 'pregnant', 10.00),
(80, 'Giusto Cauley', 'medprof', 5.00),
(81, 'Adamo Golledge', 'senior', 15.00),
(82, 'Far Chapling', 'pwd', 20.00),
(83, 'Filmore Atkyns', 'pregnant', 10.00),
(84, 'Della Kleinert', 'pregnant', 10.00),
(85, 'Pepe Sloper', 'senior', 15.00),
(86, 'Terza Such', 'senior', 15.00),
(87, 'Vaclav Di Boldi', 'pregnant', 10.00),
(88, 'Daron Kalisch', 'senior', 15.00),
(89, 'Lucita Brookson', 'pregnant', 10.00),
(90, 'Julia Coneybeer', 'senior', 15.00),
(91, 'Luis Ecob', 'pregnant', 10.00),
(92, 'Elena Podbury', 'senior', 15.00),
(93, 'Pietrek Pillifant', 'medprof', 5.00),
(94, 'Amii Bruford', 'senior', 15.00),
(95, 'Brigit Janouch', 'senior', 15.00),
(96, 'Spense Caunter', 'pregnant', 10.00),
(97, 'Isacco Prandi', 'pregnant', 10.00),
(98, 'Aldric Park', 'senior', 15.00),
(99, 'Gratia Illiston', 'medprof', 5.00),
(100, 'Bartie Greally', 'senior', 15.00);

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `id` int(11) NOT NULL,
  `staff_name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`id`, `staff_name`) VALUES
(1, 'Wendall Burfoot'),
(2, 'Hank Litel'),
(3, 'Norry Maypother'),
(4, 'Quint Smewing'),
(5, 'Neill Garrould'),
(6, 'Binnie Langmead'),
(7, 'Chelsae Anlay'),
(8, 'Erin Tungate'),
(9, 'Tine Clinkard'),
(10, 'Marcela Booley'),
(11, 'Francklyn Yedy'),
(12, 'Robby Rodd'),
(13, 'Alphard Bosnell'),
(14, 'Jo-ann Hurlin'),
(15, 'Isabel Bayle'),
(16, 'Hillier Celier'),
(17, 'Ginny Franchyonok'),
(18, 'Gregorius Cloney'),
(19, 'Doria Boat'),
(20, 'Maximo Shellcross'),
(21, 'Cammy Geall'),
(22, 'Gail Wearne'),
(23, 'Willey Garnsworthy'),
(24, 'Burch Faivre'),
(25, 'Saraann Katt'),
(26, 'Levy Derr'),
(27, 'Berenice Carme'),
(28, 'Jocelyne Andersen'),
(29, 'Ursala Tothacot'),
(30, 'Osgood Donovin'),
(31, 'Cozmo Seczyk'),
(32, 'Jolene McMenamy'),
(33, 'Estelle Heikkinen'),
(34, 'Dorthy Greatbank'),
(35, 'Meade Quoit'),
(36, 'Cam Chatell'),
(37, 'Marjie Yurinov'),
(38, 'Aleen Kingzett'),
(39, 'Hillie Coltart'),
(40, 'Renie Flanigan'),
(41, 'Kellsie Vaughan'),
(42, 'Holli Smorthit'),
(43, 'Kiri Orys'),
(44, 'Madison Bickardike'),
(45, 'Saunder Truter'),
(46, 'Salome Arias'),
(47, 'Orbadiah Paskerful'),
(48, 'Sharity Commin'),
(49, 'Tallia MacMenamin'),
(50, 'Iggy Hacquard'),
(51, 'Fair Hallan'),
(52, 'Jenelle Hyndley'),
(53, 'Quinn Woolsey'),
(54, 'Lana Setford'),
(55, 'Ruthie Barnish'),
(56, 'Catrina Robb'),
(57, 'Yurik Self'),
(58, 'Sarita Gimber'),
(59, 'Quentin Gretham'),
(60, 'Wylie Shipsey'),
(61, 'Yehudit Attenborrow'),
(62, 'Patsy Gruszecki'),
(63, 'Clem Riddington'),
(64, 'Sonnie Osban'),
(65, 'Cull Wynne'),
(66, 'Rafaelita Livesey'),
(67, 'Antonin Girt'),
(68, 'Gardner Driffield'),
(69, 'Nerita Zorn'),
(70, 'Brand Geffinger'),
(71, 'Felice Juza'),
(72, 'Base Ellerker'),
(73, 'Katinka Bayns'),
(74, 'Edith Bignell'),
(75, 'Candie McAsgill'),
(76, 'Charlena Pecht'),
(77, 'Sigmund Marchenko'),
(78, 'Lotti Lambertson'),
(79, 'Jacquelin Delacoste'),
(80, 'Rena Stannion'),
(81, 'Bruce Bridgewood'),
(82, 'Del Folley'),
(83, 'Brandi Mankor'),
(84, 'Betsy Blain'),
(85, 'Lynnett Jacks'),
(86, 'Matty Ivachyov'),
(87, 'Brandea Ding'),
(88, 'Ario Westrope'),
(89, 'Dalston Ullyatt'),
(90, 'Abra McGeneay'),
(91, 'Bryana Johns'),
(92, 'Barde Canfer'),
(93, 'Craggie Ambrus'),
(94, 'Catherin Bernetti'),
(95, 'Ax Sebrook'),
(96, 'Caryn Lappine'),
(97, 'Opal Mistry'),
(98, 'Edy Vasile'),
(99, 'Dimitry Hughlock'),
(100, 'Nollie Norcliffe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cate_medic`
--
ALTER TABLE `cate_medic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `p_customers`
--
ALTER TABLE `p_customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cate_medic`
--
ALTER TABLE `cate_medic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `p_customers`
--
ALTER TABLE `p_customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
