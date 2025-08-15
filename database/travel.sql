-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Oct 14, 2021 at 03:21 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travel`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(10) NOT NULL,
  `ffirst` varchar(20) NOT NULL,
  `flast` varchar(20) NOT NULL,
  `femail` varchar(30) NOT NULL,
  `city` varchar(20) NOT NULL,
  `fphone` int(15) NOT NULL,
  `fdesti` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `ffirst`, `flast`, `femail`, `city`, `fphone`, `fdesti`) VALUES
(1, 'Ganesh', 'Naik', 'ganeshravinaik2001@gmail.com', 'Honnavar', 2147483647, 'Goa'),
(2, 'kiran', 'Naik', 'kirannaik1@gmail.com', 'Honnavar', 845868956, 'Mumbai'),
(7, 'Ganesh', 'Naik', 'ganeshravinaik2001@gmail.com', 'Honnavar', 2147483647, 'Mysore'),
(8, 'Hitesh', 'HT', 'hitesh45jk@gmail.com', 'Udupi', 458696561, 'Kerala'),
(9, 'Ganesh', 'Naik', 'ganeshravinaik2001@gmail.com', 'Honnavar', 2147483647, 'Kerala'),
(10, 'Ganesh', 'Naik', 'ganeshravinaik2001@gmail.com', 'Honnavar', 2147483647, 'India Gate'),
(11, 'Gajanan', 'Bhat', 'gajabhat@gmail.com', 'Kumta', 2147483647, 'Mysore'),
(12, 'Ganesh', 'Naik', 'ganeshravinaik2001@gmail.com', 'Honnavar', 2147483647, 'Kerala');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(10) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `city` varchar(10) NOT NULL,
  `phone` bigint(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `fname`, `password`, `email`, `city`, `phone`) VALUES
(34, 'admin', 'Adm12345', 'admintms@gmail.com', 'Honnavar', 8971046276),
(51, 'Ganesh', 'Gane1234', 'ganeshravinaik2001@gmail.com', 'Honnavar', 8971046276),
(72, 'Aditya', 'Adi12389', 'adityag45@gmail.com', 'Manglore', 8574968283),
(73, 'Gajanan', 'GAjju700', 'gajabhat@gmail.com', 'Kumta', 7984768581),
(74, 'Kiran', 'AJkiran1', 'kiranaj56@gmail.com', 'Honnavar', 7586949199),
(75, 'Prasad', 'Pra23444', 'prasad24@gmail.com', 'Honnavar', 7485961256),
(76, 'Mahesh', 'Mahi1233', 'maheshmm@gmail.com', 'Kumta', 9978488656),
(78, 'Nishchay', 'Nishi789', 'nishibhatt234@gmail.com', 'Udupi', 7485961236);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `feedbk` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `feedbk`) VALUES
(1, 'joy', 'joy123@gmail.com', 'good website'),
(2, 'amar', 'amar56@gmail.com', 'nice website'),
(3, 'adam', 'adamgray@gmail.com', 'your website looks good and nice user interface'),
(4, 'adam', 'adamgray@gmail.com', 'your website looks good and nice user interface'),
(5, 'arjun', 'arjun45@gmal.com', 'good website'),
(6, 'Hitesh', 'hitesh43jk@gmai.com', 'its good website nice user interface'),
(7, 'kiran', 'kiran35@gmail.com', 'this is a good website');

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `hid` int(10) NOT NULL,
  `hname` varchar(20) NOT NULL,
  `hphone` varchar(15) NOT NULL,
  `hcity` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`hid`, `hname`, `hphone`, `hcity`) VALUES
(1, 'Taj Hotel', '78869565', 'Mumbai'),
(2, 'Hotel High', '78869565', 'Benglore');

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE `information` (
  `pname` varchar(30) NOT NULL,
  `pdescription` varchar(10000) NOT NULL,
  `pi_main` varchar(1000) NOT NULL,
  `pi1` varchar(1000) NOT NULL,
  `pi2` varchar(1000) NOT NULL,
  `pi3` varchar(1000) NOT NULL,
  `package` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`pname`, `pdescription`, `pi_main`, `pi1`, `pi2`, `pi3`, `package`) VALUES
('Amboli', 'Amboli lies in the Sahyadri hills in the Sindhudurg district of Maharashtra. It is the last hill station of Maharashtra before the plains of Goa begin and is a relatively unexplored one.Amboli receives the highest rainfalls in Maharashtra and thus remains pleasant all round the year. It attracts a lot of weekend visitors from Goa and Belgaum.', 'images//destination//Amboli1.jpg', 'images//destination//Amboli2.jpg', 'images//destination//Amboli3.jpg', 'images//destination//Amboli4.jpg', 15000),
('Ratnagiri', 'Situated in pretty surroundings, Ratnagiri is blessed with hills, sea shores, creeks, beautiful rivers, hot water springs, forests and water falls and offers a rejuvenating experience to travelers.Ratnagiri is a travelers dream come true destination with its majestic Sahyadri range and Arabian sea with virginal white beaches, cascading waterfalls, hot water springs palm groves, majestic monuments and the most famous, Alphonso mangoes. Ratnagiri has some of the magnificent forts built during the Shivaji period. Ratnagiri is also famous as the birthplace of Lokmanya Bal Gangadhar Tilak who was one-third of the famous trio of "Lal Bal Pal". One of the gems in Konkan region, Ratnagiri is now a big district comprising of several touristy small villages and towns and it forms for a brilliant weekend getaway from the cities of Maharashtra including Mumbai.', 'images//destination//kerala1.jpg', 'images//destination//kerala2.jpg', 'images//destination//kerala3.jpg', 'images//destination//kerala4.jpg', 10000),
('Sawantwadi', ' Sawantwadi is a small picturesque town amidst the Sahyadri Hills and the Arabian Sea. Housed in the Sindhudurg district of Maharashtra, it holds unique due to the centuries-old traditional art of making wooden toys, Ganjifas ( the name given to an ancient card game), and more. Some part of the town is now converted into a museum. It showcases lacquer artefacts, the Ganjifas, some stone images and also showcases a history of ancestors. The community of Sawantwadi specialises in the art of making toys out of wood. To buy wooden toys as well as other handicraft items including jewellery boxes, Ganjifa cards, popular exotic lacquer ware, hand-knit bags, purses, bamboo craft and earthen pottery, you can visit Chitarali.', 'images//destination//Sawantwadi1.jpg', 'images//destination//Sawantwadi2.jpg', 'images//destination//Sawantwadi3.jpg', 'images//destination//Sawantwadi4.jpg', 9000),
('Malvan', 'Malvan is a culturally and historically important town in the Sindhudurg district of Maharashtra. It is well known historically for the Sindhudurg Fort of Chatrapati Shivajiraje. Culturally, it is famous for its mouth-watering Malvani sea-food and sweets.Malvan is also known for its beaches that are clean, refreshing and less crowded. People can have wide spread-out sunset views. Water sports are also available for fun.Fishing is the main occupation of the region, which generally sees a hot and humid climate because of its proximity to the sea. Malvan attracts a lot of tourists because of its minimal human penetration.Boat rides in Karli backwaters are also enjoyed by visitors. Visit Sindhudurg Fort, Rock Garden and the temples Nearby. Try the famous coconut, rice and fish dishes of Malvani cuisine along With Malvani Sweets and Sokadi - A drink made from the kokum fruit. Malvan is perfect for Scuba Diving and Snorkeling.', 'images//destination//Malvan1.jpg', 'images//destination//Malvan2.jpg', 'images//destination//Malvan3.jpg', 'images//destination//Malvan4.jpg', 20000),
('Redi', 'BEST TIME TO VISIT REDI : With a tropical monsoon climate, the region in and around Redi experiences a hot and humid weather most of the time in a year. Hence, it is advisable to avoid visiting it during the summer season when the atmosphere is extremely humid and hot. The appropriate time when the beauty of Redi is at its summit and when it maintains a cool and pleasant environment is from November until the end of February.', 'images//destination//Redi1.jpg', 'images//destination//Redi2.jpg', 'images//destination//Redi3.jpg', 'images//destination//Redi4.jpg', 19000),
('Kunkeshwar', 'Kunkeshwar Tourism : Kunkeshwar is a village on the bank of the Arabian Sea. The village is known for Kunkeshwar Temple which is dedicated to Lord Shiva. Kunkeshwar is also famous for producing Alphonso mangoes.Known to be a perfectly peaceful and tranquil place, the highlight of the hamlet is the revered Shiva temple. Besides, the chiming of the temple bells along with the crashing of waves on the golden sunlit shores makes the place even more enticing, even more meditative. People visit here mostly to pay respect to the gods but other than that, you can also find tourists..', 'images//destination//Kunkeshwar1.jpg', 'images//destination//Kunkeshwar2.jpg', 'images//destination//Kunkeshwar3.jpg', 'images//destination//Kunkeshwar4.jpg', 10000),
('Dodamarg', 'Travel and tourism in Dodamarg, a peaceful town in Maharashtras Sindhudurg district, provide access to untouched natural beauty and cultural richness. Set against the backdrop of the Sahyadri mountain range and bordering the majestic state of Goa, Dodamarg offers a unique blend of tranquility, history, and local traditions. As travelers explore this region, they will come across lush hills, deep forests, and tranquil rivers that provide a magnificent canvas for outdoor enthusiasts and environment lovers. Dodamarg s cultural fabric is woven with Maharashtrian and Goan influences, which are visible in festivals, cuisine, and traditions. Dodamarg encourages guests to discover a region where tradition meets pristine landscapes, thanks to its potential for eco-tourism, historical landmarks, and a quiet environment.', 'images//destination//Dodamarg1.jpg', 'images//destination//Dodamarg2.jpg', 'images//destination//Dodamarg3.jpg', 'images//destination//Dodamarg4.jpg', 5000),
('Vengurla', 'Vengurla are stretches of clear white sand accentuated by rugged cliffs and lush green hills. Some of the best beaches in Maharashtra are found here! Which we will discuss in this article. The town also has a deep-seated culture and rich heritage that boasts of religious temples such as Sateri Devi Temple, Shri Mauli Temple, Shri Ravalnath Temple and Shri Vithoba Temple. Along with fresh ocean catch and delectable seafood, Vengurla is also famous for its coconut, cashew, mango and kokum trees (and products made from them!). ', 'images//destination//Vengurla1.jpg', 'images//destination//Vengurla2.jpg', 'images//destination//Vengurla3.jpg', 'images//destination//Vengurla4.jpg', 16000);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `user` varchar(10) NOT NULL,
  `pass` varchar(10) NOT NULL,
  `date_time` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user`, `pass`, `date_time`) VALUES
('adii', '784596', '2021-01-20 05:56:33am'),
('anusha', '45789656', '2021-01-20 06:06:24am'),
('adii', '123456', '2021-01-20 08:15:18am'),
('gaja', '12356', '2021-01-22 10:13:22am'),
('gaja', '123456', '2021-01-24 06:40:56am'),
('nishchay', 'nishi123', '2021-01-24 07:09:22am'),
('mahesh', '12345mn', '2021-01-24 07:10:00am'),
('admin', 'ad123', '2021-01-24 07:10:24am'),
('admin', 'ad123', '2021-01-25 05:54:18am'),
('admin', 'ad123', '2021-01-25 06:07:10am'),
('admin', 'ad123', '2021-01-25 06:09:19am'),
('admin', 'ad123', '2021-01-27 01:30:47pm'),
('admin', 'ad123', '2021-01-29 09:23:58am'),
('Gajanan', 'GAjju700', '2021-01-30 06:13:16pm'),
('Ganesh', 'Gane1234', '2021-01-30 06:24:15pm'),
('admin', 'ad123', '2021-06-08 04:11:53pm'),
('admin', 'ad123', '2021-09-19 03:24:26pm'),
('admin', 'ad123', '2021-09-19 04:41:06pm');

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE `places` (
  `pid` int(10) NOT NULL,
  `pname` varchar(20) NOT NULL,
  `pcity` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`pid`, `pname`, `pcity`) VALUES
(1, 'Tajmahal', 'Agra'),
(2, 'Beach', 'Goa'),
(3, 'India Gate', 'Delhi'),
(4, 'Kerala Beach', 'Kerala'),
(5, 'Mysore Palace', 'Mysore'),
(6, 'Ladakh', 'Ladakh India');

-- --------------------------------------------------------

--
-- Table structure for table `travel_agent`
--

CREATE TABLE `travel_agent` (
  `aid` int(10) NOT NULL,
  `afname` varchar(20) NOT NULL,
  `aemail` varchar(30) NOT NULL,
  `aphone` int(15) NOT NULL,
  `acity` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `travel_agent`
--

INSERT INTO `travel_agent` (`aid`, `afname`, `aemail`, `aphone`, `acity`) VALUES
(1, 'amar', 'amarraj123@gmail.com', 85749646, 'Mandya'),
(2, 'akhil', 'akhil23@gmai.com', 45968678, 'Manglore'),
(3, 'kiran', 'kiru34@gmail.com', 78969665, 'Mysore');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fname` (`fname`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`hid`);

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `travel_agent`
--
ALTER TABLE `travel_agent`
  ADD PRIMARY KEY (`aid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `hid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `pid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `travel_agent`
--
ALTER TABLE `travel_agent`
  MODIFY `aid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

CREATE TABLE `contacts` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(200) DEFAULT NULL,
  `message` text NOT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--


--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;


-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE IF NOT EXISTS `admin_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`username`, `password`, `email`) 
VALUES ('admin', '$2y$10$NlY5MDExYmQyYjE0MjAwMuGQ0ZTRmZjYyZDRiYzVhZTMxYjQ3YzJi', 'admin@example.com');

-- --------------------------------------------------------

--
-- Indexes for dumped tables
--