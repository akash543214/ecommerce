-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2022 at 12:18 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_name` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_name`, `password`) VALUES
('akash', 'akansha');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `s.no` int(11) NOT NULL,
  `user_id` int(12) NOT NULL,
  `product_id` int(12) NOT NULL,
  `product_title` varchar(256) NOT NULL,
  `product_description` varchar(500) NOT NULL,
  `product_price` float NOT NULL,
  `product_quantity` int(12) NOT NULL,
  `product_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`s.no`, `user_id`, `product_id`, `product_title`, `product_description`, `product_price`, `product_quantity`, `product_image`) VALUES
(29, 3, 3, 'iphone 12', '6.1-inch (15.5 cm diagonal) Super Retina XDR display\r\nCeramic Shield, tougher than any smartphone glass\r\nA14 Bionic chip, the fastest chip ever in a smartphone\r\nAdvanced dual-camera system with 12MP Ultra Wide and Wide cameras; Night mode, Deep Fusion, Smart HDR 3, 4K Dolby Vision HDR recording\r\n12MP TrueDepth front camera with Night mode, 4K Dolby Vision HDR recording\r\nIndustry-leading IP68 water resistance\r\nSupports MagSafe accessories for easy attach and faster wireless charging\r\niOS with red', 45000, 1, '71cQWYVtcBL._SL1500_.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(15) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Top Deals'),
(2, 'mobile phones'),
(3, 'Laptops'),
(4, 'Electronics'),
(5, 'Fashion'),
(6, 'Utility'),
(7, 'watches'),
(8, 'Video Games'),
(9, 'Books'),
(10, 'Travel'),
(11, 'Home'),
(12, 'Beauty'),
(13, 'Toys');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `s.no` int(12) NOT NULL,
  `order_id` varchar(12) NOT NULL,
  `product_id` int(12) NOT NULL,
  `user_id` int(12) NOT NULL,
  `order_amount` float NOT NULL,
  `txn_id` varchar(256) NOT NULL,
  `transaction_status` varchar(256) NOT NULL,
  `order_quantity` int(12) NOT NULL,
  `order_status` tinyint(1) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`s.no`, `order_id`, `product_id`, `user_id`, `order_amount`, `txn_id`, `transaction_status`, `order_quantity`, `order_status`, `order_date`) VALUES
(3, 'ORDS45634212', 1, 3, 22, '20220918111212800110168415404068505', 'TXN_SUCCESS', 1, 0, '2022-09-23 15:38:27');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(12) NOT NULL,
  `product_title` varchar(256) NOT NULL,
  `product_category_id` int(12) NOT NULL,
  `product_price` float NOT NULL,
  `product_quantity` int(12) NOT NULL,
  `product_description` varchar(1000) NOT NULL,
  `product_image` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_category_id`, `product_price`, `product_quantity`, `product_description`, `product_image`) VALUES
(3, 'iphone 12', 2, 45000, 6, '6.1-inch (15.5 cm diagonal) Super Retina XDR display\r\nCeramic Shield, tougher than any smartphone glass\r\nA14 Bionic chip, the fastest chip ever in a smartphone\r\nAdvanced dual-camera system with 12MP Ultra Wide and Wide cameras; Night mode, Deep Fusion, Smart HDR 3, 4K Dolby Vision HDR recording\r\n12MP TrueDepth front camera with Night mode, 4K Dolby Vision HDR recording\r\nIndustry-leading IP68 water resistance\r\nSupports MagSafe accessories for easy attach and faster wireless charging\r\niOS with redesigned widgets on the Home screen, all-new App Library, App Clips and more', '71cQWYVtcBL._SL1500_.jpg'),
(4, '2022 Apple iPad Air with Apple M1 Chip (10.9-inch/27.69 cm, Wi-Fi, 64GB) - Space Gray (5th Generation)', 4, 55000, 4, '27.69 cm (10.9-inch) Liquid Retina display1 with True Tone, P3 wide colour and an anti-reflective coating\r\nApple M1 chip with Neural Engine\r\n12MP Wide camera\r\n12MP Ultra Wide front camera with Center Stage\r\nUp to 256GB of storage\r\nAvailable in blue, purple, pink, starlight, and space gray\r\nStereo landscape speakers', '61XZQXFQeVL._SL1500_.jpg'),
(10, '2020 Apple MacBook Air Laptop', 3, 90000, 4, 'All-Day Battery Life – Go longer than ever with up to 18 hours of battery life.\r\nPowerful Performance – Take on everything from professional-quality editing to action-packed gaming with ease. The Apple M1 chip with an 8-core CPU delivers up to 3.5x faster performance than the previous generation while using way less power.\r\nSuperfast Memory – 8GB of unified memory makes your entire system speedy and responsive. That way it can support tasks like memory-hogging multitab browsing and opening a huge graphic file quickly and easily.', '71jG+e7roXL._SL1500_.jpg'),
(11, 'smart watch', 4, 45000, 4, 'Metalfit, which is a quality product from the TIMEX group, comes with a sleek and stylish full metal body and ultra light weight. It has a full capacitive touch display with tap to wake feature for easy access.\r\n[Complete Health Suite]: It has a built in SPO2 monitor, Heart rate monitor and female health tracking. Also keeps track of Sleep patterns by detecting deep & light sleep, off bedtime and awake time in sleep mode', '61PlmUoXQXL._UL1500_.jpg'),
(12, 'OnePlus Nord Buds True Wireless', 4, 4500, 4, 'The OnePlus Nord Buds will be music to your ears with big 12.4 mm dynamic drivers for deeper bass & crisp clear sound.\r\nFor the OnePlus Nord Buds, you get to choose how heavy or light you want your sound with the help of sound master equalizer’s 3 unique audio profiles - Bold, Bass & Serenade.\r\nThe flagship-level battery life for the all-new OnePlus Nord Buds delivers up to 30 hrs of non-stop music on a single charge.\r\nAI Noise Cancellation audio algorithm delivers precisely calibrated voice isolation during calls in the all-new OnePlus Nord Buds.\r\nEnjoy Ultra-Fast Charing in the latest OnePlus Nord Buds. From 10mins of charging you get power of 5 hours.', '514NPRZ1AQL._SL1500_.jpg'),
(13, 'Sony WH-1000XM4 Industry Leading Wireless Noise Cancellation Bluetooth Headphones with Mic, 30 Hrs Battery, Multi Point ', 4, 23000, 4, 'Digital noise cancelling: Industry leading Active Noise Cancellation (ANC) lends a personalized, virtually soundproof experience at any situation;Voice assistant: Alexa, Google Assistant & Siri enabled (In-built) for voice access to music, information and more. Activate with a simple touch\r\nSpeak-to-chat: Headphones use an array of smart technologies to create a seamless, hands-free listening experience. For eg, simply start speaking to automatically pause your music in Speak-to-Chat;Wearing Detection: Proximity sensor and two acceleration sensors in your headphones can detect whether you\'re wearing them or not, then adapt playback accordingly to help save battery power', '71o8Q5XJS5L._SL1500_.jpg'),
(14, 'Zebronics ZEB-COUNTY 3W Wireless Bluetooth Portable Speaker With Supporting Carry Handle, USB, SD Card, AUX, FM & Call Function. (Black)', 4, 4500, 3, 'Zeb-county is a compact and handy portable speaker that comes with multi-connectivity options like wireless BT/USB/micro SD and AUX\r\nThe speaker comes with a call function along with a built-in fm radio too\r\nSpeaker impedance 4Ω\r\nFrequency response 120hz-15khz\r\nCharging time 2.5H\r\nPlayback time approx. 10 hrs\r\n1 Year warranty-from the date of purchase\r\nTo connect to FM: Switch the speaker ', '81v-h4I5CCL._SL1500_.jpg'),
(15, 'Nikon D3500 with AF-P DX Nikkor 18-55mm f/3.5-5.6G VR Lens Digital SLR Camera', 4, 45999, 4, 'Sensor: APS-C CMOS Sensor with 24.2 MP (high resolution for large prints and image cropping)\r\nISO: 100-25600 sensitivity range (critical for obtaining grain-free pictures, especially in low light)\r\nImage Processor: Expeed 4 with 11 autofocus points (important for speed and accuracy of autofocus and burst photography)\r\nVideo Resolution: Full HD video with fully manual control and selectable frame rates (great for precision and high-quality video work)\r\nConnectivity: Built-in Bluetooth (useful for remotely controlling your camera and transferring pictures wirelessly as you sho', '71TSinb4usL._SL1500_.jpg'),
(16, 'ASUS TUF Gaming A15', 3, 80000, 2, 'Processor: AMD Ryzen 7 4800H Mobile Processor (8-core/16-thread, 12MB Cache, 4.2 GHz max boost)\r\nPlay over 100 high-quality PC games, plus new and upcoming blockbusters on day one like Halo Infinite, Forza Horizon 5, and Age of Empires IV with your newFA506ICB-HN005Wand one month of Game Pass-including EA Play.\r\nWith new games added all the time, there’s always something new to play. Age of Empires IV, Back 4 Blood, Battlefield V, Forza Horizon 5, Halo Infinite*, Knockout City, Microsoft Flight Simulator, Minecraft PC Bundle, Need for Speed Heat, Psychonauts2, The Sims 4, Titanfall 2, 12 Minutes', '91zVSkGGZbS._SL1500_.jpg'),
(17, 'Samsung 146 cm (58 inches) Crystal 4K Pro Series Ultra HD Smart LED TV UA58AUE70AKLXL (Black)', 4, 79999, 6, 'esolution : Crystal 4K Pro UHD (3840 x 2160) resolution | Refresh Rate : 60 Hertz\r\nConnectivity: 3 HDMI ports to connect set top box, Blu-ray speakers or a gaming console | 1 USB ports to connect hard drives or other USB devices\r\nDisplay: Ultra HD (4k) LED Panel | One Billion Colors | Air Slim Design | Supports HDR 10+ | PurColor | Mega Contarst | UHD Dimming | Auto Game Mode\r\nSound: 20 Watts Output | Powerful Speakers with Dolby Digital Plus | Q Symphony\r\nSmart TV Features : Prime Video, Hotstar, Netflix, Zee5 and more | Voice Assistant - Bixby & Alexa | Tap View | PC Mode | Universal Guid', '71DT3qZJsOL._SL1500_.jpg'),
(18, 'Samsung 870 EVO 500GB SATA 6.35 cm (2.5\") Internal Solid State Drive (SSD) (MZ-77E500)', 4, 5999, 55, 'Sequential Read/Write speeds up to 560/530 MB/s respectively. Performance varies based on system hardware configuration\r\nInterface : SATA 6Gb/s, compatible with SATA 3Gb/s and SATA 1.5Gb/s interfaces. Form Factor : 2.5 inches\r\nCache Memory: Samsung 512 MB DDR4 SDRAM\r\n5 Years Limited Warranty or 300 TBW Limited Warranty. Contact :1800 30 7267864\r\nDesigned for mainstream PCs and laptops for personal, gaming, and business use. Check out the SSD buying guide by Amazon in Videos Section', '911ujeCkGfL._SL1500_.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `s.no` int(12) NOT NULL,
  `product_id` int(12) NOT NULL,
  `user_name` varchar(15) NOT NULL,
  `review` varchar(256) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`s.no`, `product_id`, `user_name`, `review`, `time`) VALUES
(1, 3, 'akash', 'nice', '2022-09-21 07:52:55'),
(2, 17, 'akash', 'hj', '2022-09-23 18:05:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(12) NOT NULL,
  `username` varchar(15) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`) VALUES
(3, 'akash', 'akash@gmail.com', 'akansha');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`s.no`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`s.no`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`s.no`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `s.no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `s.no` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `s.no` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
