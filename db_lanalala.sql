-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2019 at 03:43 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_lanalala`
--

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_customer` int(11) DEFAULT NULL,
  `date_order` date DEFAULT NULL,
  `total` float DEFAULT NULL COMMENT 'tổng tiền',
  `payment` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'hình thức thanh toán',
  `note` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bill_detail`
--

CREATE TABLE `bill_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_bill` int(10) NOT NULL,
  `id_product` int(10) NOT NULL,
  `quantity` int(11) NOT NULL COMMENT 'số lượng',
  `unit_price` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `gender`, `email`, `address`, `phone_number`, `note`, `created_at`, `updated_at`) VALUES
(6, 'Hồ Thanh Vũ', 'Nam', 'htv1997@gmail.com', 'le thi rieng', '55555555', '55555555555555', '2019-07-21 18:39:37', '2019-07-21 18:39:37');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(10) NOT NULL,
  `title` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'tiêu đề',
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'nội dung',
  `image` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'hình',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `image`, `create_at`, `update_at`) VALUES
(1, 'Soi gu thời trang hai nàng mẫu béo hot nhất The Face', 'Thí sinh cá tính của team Hồ Ngọc Hà trong cuộc thi The Face Việt Nam mùa đầu tiên là người có phong cách ăn mặc sexy. Dù sở hữu thân hình thừa cân, hơi đầy người nhưng Huyền Thanh lại cực kì tinh tế trong việc lựa chọn trang phục.\r\n\r\nSoi gu thời trang hai nàng mẫu béo hot nhất The Face - 1\r\n\r\n\r\nChúng Huyền Thanh cá tinh với phong cách menswear độc đáo, mạnh mẽ.\r\n\r\nSoi gu thời trang hai nàng mẫu béo hot nhất The Face - 2\r\n\r\nCô nàng khéo léo kết hợp những tông màu trầm tính, đơn giản để ăn gian hình thế, chê khuất những khuyết điểm xấu xí trên cơ thể.\r\n\r\nSoi gu thời trang hai nàng mẫu béo hot nhất The Face - 3\r\n\r\nCô cũng không ngại mặc mốt quần lưng cao nhưng xếp pli ở thân trước đã che khuẩ vòng 2 có phần tròn đầy của cô nàng.\r\n\r\nSoi gu thời trang hai nàng mẫu béo hot nhất The Face - 4\r\n\r\nNgười đẹp cũng khéo léo chạy theo xu hướng với mốt trang phục áo khoác thêu cùng chiếc túi Chanel làm điểm nhấn.\r\n\r\nSoi gu thời trang hai nàng mẫu béo hot nhất The Face - 5\r\n\r\nSau cuộc thi, cô đã có những nỗ lực đáng khâm phục để giảm cân, giữ dáng.\r\n\r\nSoi gu thời trang hai nàng mẫu béo hot nhất The Face - 6\r\n\r\nTạo hình chững chạc, chín chắn của cô được đông đảo người yêu thích The Face ngưỡng mộ.\r\n\r\nSoi gu thời trang hai nàng mẫu béo hot nhất The Face - 7\r\n\r\nThời thượng và xinh đẹp không kém gì HLV Hồ Ngọc Hà với quần cullotes và áo khoét ngực khoe vòng 1 đẫy đà.\r\n\r\nMai Ngô\r\n\r\nCứ nhắc đến Mai Ngô, nhiều người sẽ nhún vai trước gu ăn mặc có phần thảm họa. Từ sau chương trình The Face, Mai Ngô dần tụt hậu với gu thời trang sên sẩm, lối makeup hơi \"dừ\" cùng việc không sáng suốt khi lựa chọn phong cách phù hợp với cân nặng của bản thân. Bù lại, cái tên cô vẫn vô cùng hot trong làng Mốt. \r\n\r\nSoi gu thời trang hai nàng mẫu béo hot nhất The Face - 8\r\n\r\nMai Ngô xem chừng là tín đồ của lễ hóa trang Halloween quanh năm khi liên tục chọn cho mình những trang phục như cosplay những mụ phù thủy trong truyện cổ tích.\r\n\r\nSoi gu thời trang hai nàng mẫu béo hot nhất The Face - 9\r\n\r\nNgười đep cũng chẳng ngần ngại diện mốt denim-on-denim với cả quần ngắn cũn khoe chân cơ múi đồ sộ, lực điền.\r\n\r\nSoi gu thời trang hai nàng mẫu béo hot nhất The Face - 10\r\n\r\nThương hiệu không lông mày của Mai Ngô đã đi vào lịch sử làng thời trang. Hiểu điều đó, Mai Ngô hầu như không cần chì kẻ lông mày khi makeup.\r\n\r\nSoi gu thời trang hai nàng mẫu béo hot nhất The Face - 11\r\n\r\nTrong chuyến đi Seoul vừa qua tham dự tuần lễ thời trang, cô trông không khác gì mẹ của HLV Lan Khuê với set đồ đen tuyền một màu.\r\n\r\nSoi gu thời trang hai nàng mẫu béo hot nhất The Face - 12\r\n\r\nRất đỗi chân quê, mộc mạc với cả set đồ chắp vá cùng mốt bralette mà hiển nhiên không phù hợp với thân hình đồ sộ của Mai Ngô.\r\n\r\nSoi gu thời trang hai nàng mẫu béo hot nhất The Face - 13\r\n\r\nHình ảnh đẹp hiếm hoi của Mai Ngô sau chặng đường rời khỏi cuộc thi The Face.\r\n\r\nSoi gu thời trang hai nàng mẫu béo hot nhất The Face - 14\r\n\r\nNhững hình ảnh thời trầng chỉn chu sẽ khó lòng quay lại với một Mai Ngô ở thời điểm hiện tại.\r\n\r\nSoi gu thời trang hai nàng mẫu béo hot nhất The Face - 15\r\n\r\nDù biết vóc dáng là chuyện khó lòng thay đổi nhưng gu thời trang của cô thật sự cần một stylist giúp đỡ.', 'Soi gu thời trang hai nàng mẫu béo hot nhất The Face-1.jpg', '2019-07-19 17:00:00', '0000-00-00 00:00:00'),
(2, 'Mỹ Ngọc Bolero gợi ý váy dạ hội cho cô nàng \'nấm lùn\'', 'Nữ ca sĩ cho rằng những bộ váy đơn sắc, ít hoạ tiết kết hợp với giày cao gót sẽ che lấp khuyết điểm về chiều cao cho người mặc.', 'My-Ngoc.webp', '2019-07-21 02:07:14', '0000-00-00 00:00:00'),
(3, 'Phạm Băng Băng đã có tuần lễ thời trang của riêng mình', 'Đồ gỗ nội thất ngày càng được sử dụng phổ biến nhờ vào hiệu quả mà nó mang lại cho không gian kiến trúc. Xu thế của các gia đình hiện nay là muốn đem thiên nhiên vào nhà ', 'Pham-Bang-Bang.jpg', '2019-07-21 17:28:27', '0000-00-00 00:00:00'),
(4, 'Bộ ảnh Trần Kiều Ân trên tạp chí thời trang mùa hè mới', 'Bộ ảnh Trần Kiều Ân trên tạp chí thời trang mùa hè mới', 'tran-kieu-an.jpg', '2019-07-21 17:40:40', '0000-00-00 00:00:00'),
(5, '20 kiểu trang phục “thừa độ sang, dư độ sáng” giúp bạn thật nổi bật và cuốn hút', 'Không cần những món đồ và phụ kiện đắt tiền, chỉ cần làm theo những cách mix&match dưới đây, bạn sẽ trông sành điệu và sang chảnh tức thì luôn nè !!!\r\n\r\nKhông cần phải chi quá nhiều tiền cho việc mix đồ sao cho thật sang chảnh và cuốn hút, chỉ với những item sẵn có và cực dễ tìm, mix&match sao cho thật phù hợp. Bạn đã có set đồ không những đơn giản mà còn quá sành điệu rồi!!!', 'tin-do-thoi-trang.jpg', '2019-07-21 17:43:01', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_type` int(10) UNSIGNED DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `unit_price` float DEFAULT NULL,
  `promotion_price` float DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unit` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `feature` int(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `id_type`, `description`, `unit_price`, `promotion_price`, `image`, `unit`, `feature`, `created_at`, `updated_at`) VALUES
(63, 'Áo 1', 1, 'Lanala luôn đem đến cho chị em những mẫu áo sơ mi nữ đẹp với nhiều phong cách và kiểu dáng khác nhau: áo sơ mi nữ hàn quốc, áo sơ mi nữ công sở, áo sơ mi nữ thiết kế, áo sơ mi nữ dự tiệc... Mỗi một mẫu áo mang một nét riêng và có thể phối được với nhiều loại quần và chân váy. Ngoài ra thời trang GUMAC cũng phù hợp với nhiều độ tuổi như: áo sơ mi nữ tuổi 35, áo sơ mi nữ tuổi 40, áo sơ mi nữ tuổi 50... Và khi đến với bộ sưu tập áo sơ mi nữ của nhà Gu, bạn không cần phải băn khoăn, lo lắng vì sợ không tìm được trang phục thích hợp cho mình nữa nhé!', 250000, 220000, 'ao-1.jpg', 'cái', 0, NULL, NULL),
(64, 'Áo 2', 1, 'Lanala luôn đem đến cho chị em những mẫu áo sơ mi nữ đẹp với nhiều phong cách và kiểu dáng khác nhau: áo sơ mi nữ hàn quốc, áo sơ mi nữ công sở, áo sơ mi nữ thiết kế, áo sơ mi nữ dự tiệc... Mỗi một mẫu áo mang một nét riêng và có thể phối được với nhiều loại quần và chân váy. Ngoài ra thời trang GUMAC cũng phù hợp với nhiều độ tuổi như: áo sơ mi nữ tuổi 35, áo sơ mi nữ tuổi 40, áo sơ mi nữ tuổi 50... Và khi đến với bộ sưu tập áo sơ mi nữ của nhà Gu, bạn không cần phải băn khoăn, lo lắng vì sợ không tìm được trang phục thích hợp cho mình nữa nhé!', 300000, NULL, 'ao-2.jpg', NULL, 1, '2019-07-21 18:27:37', NULL),
(65, 'Áo 2', 1, 'Lanala luôn đem đến cho chị em những mẫu áo sơ mi nữ đẹp với nhiều phong cách và kiểu dáng khác nhau: áo sơ mi nữ hàn quốc, áo sơ mi nữ công sở, áo sơ mi nữ thiết kế, áo sơ mi nữ dự tiệc... Mỗi một mẫu áo mang một nét riêng và có thể phối được với nhiều loại quần và chân váy. Ngoài ra thời trang GUMAC cũng phù hợp với nhiều độ tuổi như: áo sơ mi nữ tuổi 35, áo sơ mi nữ tuổi 40, áo sơ mi nữ tuổi 50... Và khi đến với bộ sưu tập áo sơ mi nữ của nhà Gu, bạn không cần phải băn khoăn, lo lắng vì sợ không tìm được trang phục thích hợp cho mình nữa nhé!', 300000, NULL, 'ao-2.jpg', NULL, 0, '2019-07-21 18:30:32', NULL),
(66, 'Áo 3', 1, 'Lanala luôn đem đến cho chị em những mẫu áo sơ mi nữ đẹp với nhiều phong cách và kiểu dáng khác nhau: áo sơ mi nữ hàn quốc, áo sơ mi nữ công sở, áo sơ mi nữ thiết kế, áo sơ mi nữ dự tiệc... Mỗi một mẫu áo mang một nét riêng và có thể phối được với nhiều loại quần và chân váy. Ngoài ra thời trang GUMAC cũng phù hợp với nhiều độ tuổi như: áo sơ mi nữ tuổi 35, áo sơ mi nữ tuổi 40, áo sơ mi nữ tuổi 50... Và khi đến với bộ sưu tập áo sơ mi nữ của nhà Gu, bạn không cần phải băn khoăn, lo lắng vì sợ không tìm được trang phục thích hợp cho mình nữa nhé!', 300000, 100000, 'ao-3.jpg', NULL, 0, '2019-07-21 18:30:32', NULL),
(67, 'Áo 4', 1, 'Lanala luôn đem đến cho chị em những mẫu áo sơ mi nữ đẹp với nhiều phong cách và kiểu dáng khác nhau: áo sơ mi nữ hàn quốc, áo sơ mi nữ công sở, áo sơ mi nữ thiết kế, áo sơ mi nữ dự tiệc... Mỗi một mẫu áo mang một nét riêng và có thể phối được với nhiều loại quần và chân váy. Ngoài ra thời trang GUMAC cũng phù hợp với nhiều độ tuổi như: áo sơ mi nữ tuổi 35, áo sơ mi nữ tuổi 40, áo sơ mi nữ tuổi 50... Và khi đến với bộ sưu tập áo sơ mi nữ của nhà Gu, bạn không cần phải băn khoăn, lo lắng vì sợ không tìm được trang phục thích hợp cho mình nữa nhé!', 300000, NULL, 'ao-4.jpg', NULL, 0, '2019-07-21 18:30:32', NULL),
(68, 'Áo 5', 1, 'Lanala luôn đem đến cho chị em những mẫu áo sơ mi nữ đẹp với nhiều phong cách và kiểu dáng khác nhau: áo sơ mi nữ hàn quốc, áo sơ mi nữ công sở, áo sơ mi nữ thiết kế, áo sơ mi nữ dự tiệc... Mỗi một mẫu áo mang một nét riêng và có thể phối được với nhiều loại quần và chân váy. Ngoài ra thời trang GUMAC cũng phù hợp với nhiều độ tuổi như: áo sơ mi nữ tuổi 35, áo sơ mi nữ tuổi 40, áo sơ mi nữ tuổi 50... Và khi đến với bộ sưu tập áo sơ mi nữ của nhà Gu, bạn không cần phải băn khoăn, lo lắng vì sợ không tìm được trang phục thích hợp cho mình nữa nhé!', 300000, NULL, 'ao-5.jpg', NULL, 0, '2019-07-21 18:30:32', NULL),
(69, 'Áo 6', 1, 'Lanala luôn đem đến cho chị em những mẫu áo sơ mi nữ đẹp với nhiều phong cách và kiểu dáng khác nhau: áo sơ mi nữ hàn quốc, áo sơ mi nữ công sở, áo sơ mi nữ thiết kế, áo sơ mi nữ dự tiệc... Mỗi một mẫu áo mang một nét riêng và có thể phối được với nhiều loại quần và chân váy. Ngoài ra thời trang GUMAC cũng phù hợp với nhiều độ tuổi như: áo sơ mi nữ tuổi 35, áo sơ mi nữ tuổi 40, áo sơ mi nữ tuổi 50... Và khi đến với bộ sưu tập áo sơ mi nữ của nhà Gu, bạn không cần phải băn khoăn, lo lắng vì sợ không tìm được trang phục thích hợp cho mình nữa nhé!', 300000, 300000, 'ao-6.jpg', NULL, 1, '2019-07-21 18:30:32', NULL),
(70, 'Áo 7', 1, 'Lanala luôn đem đến cho chị em những mẫu áo sơ mi nữ đẹp với nhiều phong cách và kiểu dáng khác nhau: áo sơ mi nữ hàn quốc, áo sơ mi nữ công sở, áo sơ mi nữ thiết kế, áo sơ mi nữ dự tiệc... Mỗi một mẫu áo mang một nét riêng và có thể phối được với nhiều loại quần và chân váy. Ngoài ra thời trang GUMAC cũng phù hợp với nhiều độ tuổi như: áo sơ mi nữ tuổi 35, áo sơ mi nữ tuổi 40, áo sơ mi nữ tuổi 50... Và khi đến với bộ sưu tập áo sơ mi nữ của nhà Gu, bạn không cần phải băn khoăn, lo lắng vì sợ không tìm được trang phục thích hợp cho mình nữa nhé!', 300000, NULL, 'ao-7.jpg', NULL, 0, '2019-07-21 18:30:32', NULL),
(71, 'Áo 8', 1, 'Lanala luôn đem đến cho chị em những mẫu áo sơ mi nữ đẹp với nhiều phong cách và kiểu dáng khác nhau: áo sơ mi nữ hàn quốc, áo sơ mi nữ công sở, áo sơ mi nữ thiết kế, áo sơ mi nữ dự tiệc... Mỗi một mẫu áo mang một nét riêng và có thể phối được với nhiều loại quần và chân váy. Ngoài ra thời trang GUMAC cũng phù hợp với nhiều độ tuổi như: áo sơ mi nữ tuổi 35, áo sơ mi nữ tuổi 40, áo sơ mi nữ tuổi 50... Và khi đến với bộ sưu tập áo sơ mi nữ của nhà Gu, bạn không cần phải băn khoăn, lo lắng vì sợ không tìm được trang phục thích hợp cho mình nữa nhé!', 300000, NULL, 'ao-8.jpg', NULL, 1, '2019-07-21 18:30:32', NULL),
(72, 'Áo 9', 1, 'Lanala luôn đem đến cho chị em những mẫu áo sơ mi nữ đẹp với nhiều phong cách và kiểu dáng khác nhau: áo sơ mi nữ hàn quốc, áo sơ mi nữ công sở, áo sơ mi nữ thiết kế, áo sơ mi nữ dự tiệc... Mỗi một mẫu áo mang một nét riêng và có thể phối được với nhiều loại quần và chân váy. Ngoài ra thời trang GUMAC cũng phù hợp với nhiều độ tuổi như: áo sơ mi nữ tuổi 35, áo sơ mi nữ tuổi 40, áo sơ mi nữ tuổi 50... Và khi đến với bộ sưu tập áo sơ mi nữ của nhà Gu, bạn không cần phải băn khoăn, lo lắng vì sợ không tìm được trang phục thích hợp cho mình nữa nhé!', 300000, NULL, 'ao-9.png', NULL, 1, '2019-07-21 18:30:32', NULL),
(73, 'Áo 10', 1, 'Lanala luôn đem đến cho chị em những mẫu áo sơ mi nữ đẹp với nhiều phong cách và kiểu dáng khác nhau: áo sơ mi nữ hàn quốc, áo sơ mi nữ công sở, áo sơ mi nữ thiết kế, áo sơ mi nữ dự tiệc... Mỗi một mẫu áo mang một nét riêng và có thể phối được với nhiều loại quần và chân váy. Ngoài ra thời trang GUMAC cũng phù hợp với nhiều độ tuổi như: áo sơ mi nữ tuổi 35, áo sơ mi nữ tuổi 40, áo sơ mi nữ tuổi 50... Và khi đến với bộ sưu tập áo sơ mi nữ của nhà Gu, bạn không cần phải băn khoăn, lo lắng vì sợ không tìm được trang phục thích hợp cho mình nữa nhé!', 300000, NULL, 'ao-10.jpg', NULL, 0, '2019-07-21 18:30:32', NULL),
(74, 'Quần 1', 3, 'Lanala luôn đem đến cho chị em những mẫu áo sơ mi nữ đẹp với nhiều phong cách và kiểu dáng khác nhau: áo sơ mi nữ hàn quốc, áo sơ mi nữ công sở, áo sơ mi nữ thiết kế, áo sơ mi nữ dự tiệc... Mỗi một mẫu áo mang một nét riêng và có thể phối được với nhiều loại quần và chân váy. Ngoài ra thời trang GUMAC cũng phù hợp với nhiều độ tuổi như: áo sơ mi nữ tuổi 35, áo sơ mi nữ tuổi 40, áo sơ mi nữ tuổi 50... Và khi đến với bộ sưu tập áo sơ mi nữ của nhà Gu, bạn không cần phải băn khoăn, lo lắng vì sợ không tìm được trang phục thích hợp cho mình nữa nhé!', 300000, NULL, 'quan-1.jpg', NULL, 1, '2019-07-21 18:34:08', NULL),
(75, 'Quần 2', 3, 'Lanala luôn đem đến cho chị em những mẫu áo sơ mi nữ đẹp với nhiều phong cách và kiểu dáng khác nhau: áo sơ mi nữ hàn quốc, áo sơ mi nữ công sở, áo sơ mi nữ thiết kế, áo sơ mi nữ dự tiệc... Mỗi một mẫu áo mang một nét riêng và có thể phối được với nhiều loại quần và chân váy. Ngoài ra thời trang GUMAC cũng phù hợp với nhiều độ tuổi như: áo sơ mi nữ tuổi 35, áo sơ mi nữ tuổi 40, áo sơ mi nữ tuổi 50... Và khi đến với bộ sưu tập áo sơ mi nữ của nhà Gu, bạn không cần phải băn khoăn, lo lắng vì sợ không tìm được trang phục thích hợp cho mình nữa nhé!', 300000, NULL, 'quan-2.jpg', NULL, 0, '2019-07-21 18:34:08', NULL),
(76, 'Quần 3', 3, 'Lanala luôn đem đến cho chị em những mẫu áo sơ mi nữ đẹp với nhiều phong cách và kiểu dáng khác nhau: áo sơ mi nữ hàn quốc, áo sơ mi nữ công sở, áo sơ mi nữ thiết kế, áo sơ mi nữ dự tiệc... Mỗi một mẫu áo mang một nét riêng và có thể phối được với nhiều loại quần và chân váy. Ngoài ra thời trang GUMAC cũng phù hợp với nhiều độ tuổi như: áo sơ mi nữ tuổi 35, áo sơ mi nữ tuổi 40, áo sơ mi nữ tuổi 50... Và khi đến với bộ sưu tập áo sơ mi nữ của nhà Gu, bạn không cần phải băn khoăn, lo lắng vì sợ không tìm được trang phục thích hợp cho mình nữa nhé!', 300000, NULL, 'quan-3.jpg', NULL, 0, '2019-07-21 18:34:08', NULL),
(77, 'Quần 4', 3, 'Lanala luôn đem đến cho chị em những mẫu áo sơ mi nữ đẹp với nhiều phong cách và kiểu dáng khác nhau: áo sơ mi nữ hàn quốc, áo sơ mi nữ công sở, áo sơ mi nữ thiết kế, áo sơ mi nữ dự tiệc... Mỗi một mẫu áo mang một nét riêng và có thể phối được với nhiều loại quần và chân váy. Ngoài ra thời trang GUMAC cũng phù hợp với nhiều độ tuổi như: áo sơ mi nữ tuổi 35, áo sơ mi nữ tuổi 40, áo sơ mi nữ tuổi 50... Và khi đến với bộ sưu tập áo sơ mi nữ của nhà Gu, bạn không cần phải băn khoăn, lo lắng vì sợ không tìm được trang phục thích hợp cho mình nữa nhé!', 300000, NULL, 'quan-4.jpg', NULL, 0, '2019-07-21 18:34:08', NULL),
(78, 'Quần 5', 3, 'Lanala luôn đem đến cho chị em những mẫu áo sơ mi nữ đẹp với nhiều phong cách và kiểu dáng khác nhau: áo sơ mi nữ hàn quốc, áo sơ mi nữ công sở, áo sơ mi nữ thiết kế, áo sơ mi nữ dự tiệc... Mỗi một mẫu áo mang một nét riêng và có thể phối được với nhiều loại quần và chân váy. Ngoài ra thời trang GUMAC cũng phù hợp với nhiều độ tuổi như: áo sơ mi nữ tuổi 35, áo sơ mi nữ tuổi 40, áo sơ mi nữ tuổi 50... Và khi đến với bộ sưu tập áo sơ mi nữ của nhà Gu, bạn không cần phải băn khoăn, lo lắng vì sợ không tìm được trang phục thích hợp cho mình nữa nhé!', 300000, 200000, 'quan-5.jpg', NULL, 0, '2019-07-21 18:34:08', NULL),
(79, 'Quần 6', 3, 'Lanala luôn đem đến cho chị em những mẫu áo sơ mi nữ đẹp với nhiều phong cách và kiểu dáng khác nhau: áo sơ mi nữ hàn quốc, áo sơ mi nữ công sở, áo sơ mi nữ thiết kế, áo sơ mi nữ dự tiệc... Mỗi một mẫu áo mang một nét riêng và có thể phối được với nhiều loại quần và chân váy. Ngoài ra thời trang GUMAC cũng phù hợp với nhiều độ tuổi như: áo sơ mi nữ tuổi 35, áo sơ mi nữ tuổi 40, áo sơ mi nữ tuổi 50... Và khi đến với bộ sưu tập áo sơ mi nữ của nhà Gu, bạn không cần phải băn khoăn, lo lắng vì sợ không tìm được trang phục thích hợp cho mình nữa nhé!', 300000, NULL, 'quan-6.jpg', NULL, 0, '2019-07-21 18:34:08', NULL),
(80, 'Quần 7', 3, 'Lanala luôn đem đến cho chị em những mẫu áo sơ mi nữ đẹp với nhiều phong cách và kiểu dáng khác nhau: áo sơ mi nữ hàn quốc, áo sơ mi nữ công sở, áo sơ mi nữ thiết kế, áo sơ mi nữ dự tiệc... Mỗi một mẫu áo mang một nét riêng và có thể phối được với nhiều loại quần và chân váy. Ngoài ra thời trang GUMAC cũng phù hợp với nhiều độ tuổi như: áo sơ mi nữ tuổi 35, áo sơ mi nữ tuổi 40, áo sơ mi nữ tuổi 50... Và khi đến với bộ sưu tập áo sơ mi nữ của nhà Gu, bạn không cần phải băn khoăn, lo lắng vì sợ không tìm được trang phục thích hợp cho mình nữa nhé!', 300000, NULL, 'quan-7.jpg', NULL, 1, '2019-07-21 18:34:08', NULL),
(81, 'Quần 8', 3, 'Lanala luôn đem đến cho chị em những mẫu áo sơ mi nữ đẹp với nhiều phong cách và kiểu dáng khác nhau: áo sơ mi nữ hàn quốc, áo sơ mi nữ công sở, áo sơ mi nữ thiết kế, áo sơ mi nữ dự tiệc... Mỗi một mẫu áo mang một nét riêng và có thể phối được với nhiều loại quần và chân váy. Ngoài ra thời trang GUMAC cũng phù hợp với nhiều độ tuổi như: áo sơ mi nữ tuổi 35, áo sơ mi nữ tuổi 40, áo sơ mi nữ tuổi 50... Và khi đến với bộ sưu tập áo sơ mi nữ của nhà Gu, bạn không cần phải băn khoăn, lo lắng vì sợ không tìm được trang phục thích hợp cho mình nữa nhé!', 300000, NULL, 'quan-8.jpg', NULL, 0, '2019-07-21 18:34:08', NULL),
(82, 'Quần 9', 3, 'Lanala luôn đem đến cho chị em những mẫu áo sơ mi nữ đẹp với nhiều phong cách và kiểu dáng khác nhau: áo sơ mi nữ hàn quốc, áo sơ mi nữ công sở, áo sơ mi nữ thiết kế, áo sơ mi nữ dự tiệc... Mỗi một mẫu áo mang một nét riêng và có thể phối được với nhiều loại quần và chân váy. Ngoài ra thời trang GUMAC cũng phù hợp với nhiều độ tuổi như: áo sơ mi nữ tuổi 35, áo sơ mi nữ tuổi 40, áo sơ mi nữ tuổi 50... Và khi đến với bộ sưu tập áo sơ mi nữ của nhà Gu, bạn không cần phải băn khoăn, lo lắng vì sợ không tìm được trang phục thích hợp cho mình nữa nhé!', 300000, NULL, 'quan-9.jpg', NULL, 1, '2019-07-21 18:34:08', NULL),
(83, 'Quần 10', 3, 'Lanala luôn đem đến cho chị em những mẫu áo sơ mi nữ đẹp với nhiều phong cách và kiểu dáng khác nhau: áo sơ mi nữ hàn quốc, áo sơ mi nữ công sở, áo sơ mi nữ thiết kế, áo sơ mi nữ dự tiệc... Mỗi một mẫu áo mang một nét riêng và có thể phối được với nhiều loại quần và chân váy. Ngoài ra thời trang GUMAC cũng phù hợp với nhiều độ tuổi như: áo sơ mi nữ tuổi 35, áo sơ mi nữ tuổi 40, áo sơ mi nữ tuổi 50... Và khi đến với bộ sưu tập áo sơ mi nữ của nhà Gu, bạn không cần phải băn khoăn, lo lắng vì sợ không tìm được trang phục thích hợp cho mình nữa nhé!', 300000, NULL, 'quan-10.jpg', NULL, 0, '2019-07-21 18:34:08', NULL),
(84, 'Váy 1', 2, 'Lanala luôn đem đến cho chị em những mẫu áo sơ mi nữ đẹp với nhiều phong cách và kiểu dáng khác nhau: áo sơ mi nữ hàn quốc, áo sơ mi nữ công sở, áo sơ mi nữ thiết kế, áo sơ mi nữ dự tiệc... Mỗi một mẫu áo mang một nét riêng và có thể phối được với nhiều loại quần và chân váy. Ngoài ra thời trang GUMAC cũng phù hợp với nhiều độ tuổi như: áo sơ mi nữ tuổi 35, áo sơ mi nữ tuổi 40, áo sơ mi nữ tuổi 50... Và khi đến với bộ sưu tập áo sơ mi nữ của nhà Gu, bạn không cần phải băn khoăn, lo lắng vì sợ không tìm được trang phục thích hợp cho mình nữa nhé!', 300000, NULL, 'vay-1.jpg', NULL, 0, '2019-07-21 18:35:04', NULL),
(85, 'Váy 2', 2, 'Lanala luôn đem đến cho chị em những mẫu áo sơ mi nữ đẹp với nhiều phong cách và kiểu dáng khác nhau: áo sơ mi nữ hàn quốc, áo sơ mi nữ công sở, áo sơ mi nữ thiết kế, áo sơ mi nữ dự tiệc... Mỗi một mẫu áo mang một nét riêng và có thể phối được với nhiều loại quần và chân váy. Ngoài ra thời trang GUMAC cũng phù hợp với nhiều độ tuổi như: áo sơ mi nữ tuổi 35, áo sơ mi nữ tuổi 40, áo sơ mi nữ tuổi 50... Và khi đến với bộ sưu tập áo sơ mi nữ của nhà Gu, bạn không cần phải băn khoăn, lo lắng vì sợ không tìm được trang phục thích hợp cho mình nữa nhé!', 300000, NULL, 'vay-2.jpg', NULL, 0, '2019-07-21 18:35:04', NULL),
(86, 'Váy 3', 2, 'Lanala luôn đem đến cho chị em những mẫu áo sơ mi nữ đẹp với nhiều phong cách và kiểu dáng khác nhau: áo sơ mi nữ hàn quốc, áo sơ mi nữ công sở, áo sơ mi nữ thiết kế, áo sơ mi nữ dự tiệc... Mỗi một mẫu áo mang một nét riêng và có thể phối được với nhiều loại quần và chân váy. Ngoài ra thời trang GUMAC cũng phù hợp với nhiều độ tuổi như: áo sơ mi nữ tuổi 35, áo sơ mi nữ tuổi 40, áo sơ mi nữ tuổi 50... Và khi đến với bộ sưu tập áo sơ mi nữ của nhà Gu, bạn không cần phải băn khoăn, lo lắng vì sợ không tìm được trang phục thích hợp cho mình nữa nhé!', 300000, 150000, 'vay-3.jpg', NULL, 1, '2019-07-21 18:35:04', NULL),
(87, 'Váy 4', 2, 'Lanala luôn đem đến cho chị em những mẫu áo sơ mi nữ đẹp với nhiều phong cách và kiểu dáng khác nhau: áo sơ mi nữ hàn quốc, áo sơ mi nữ công sở, áo sơ mi nữ thiết kế, áo sơ mi nữ dự tiệc... Mỗi một mẫu áo mang một nét riêng và có thể phối được với nhiều loại quần và chân váy. Ngoài ra thời trang GUMAC cũng phù hợp với nhiều độ tuổi như: áo sơ mi nữ tuổi 35, áo sơ mi nữ tuổi 40, áo sơ mi nữ tuổi 50... Và khi đến với bộ sưu tập áo sơ mi nữ của nhà Gu, bạn không cần phải băn khoăn, lo lắng vì sợ không tìm được trang phục thích hợp cho mình nữa nhé!', 300000, NULL, 'vay-4.jpg', NULL, 0, '2019-07-21 18:35:04', NULL),
(88, 'Váy 5', 2, 'Lanala luôn đem đến cho chị em những mẫu áo sơ mi nữ đẹp với nhiều phong cách và kiểu dáng khác nhau: áo sơ mi nữ hàn quốc, áo sơ mi nữ công sở, áo sơ mi nữ thiết kế, áo sơ mi nữ dự tiệc... Mỗi một mẫu áo mang một nét riêng và có thể phối được với nhiều loại quần và chân váy. Ngoài ra thời trang GUMAC cũng phù hợp với nhiều độ tuổi như: áo sơ mi nữ tuổi 35, áo sơ mi nữ tuổi 40, áo sơ mi nữ tuổi 50... Và khi đến với bộ sưu tập áo sơ mi nữ của nhà Gu, bạn không cần phải băn khoăn, lo lắng vì sợ không tìm được trang phục thích hợp cho mình nữa nhé!', 300000, NULL, 'vay-5.jpg', NULL, 1, '2019-07-21 18:35:04', NULL),
(89, 'Váy 6', 2, 'Lanala luôn đem đến cho chị em những mẫu áo sơ mi nữ đẹp với nhiều phong cách và kiểu dáng khác nhau: áo sơ mi nữ hàn quốc, áo sơ mi nữ công sở, áo sơ mi nữ thiết kế, áo sơ mi nữ dự tiệc... Mỗi một mẫu áo mang một nét riêng và có thể phối được với nhiều loại quần và chân váy. Ngoài ra thời trang GUMAC cũng phù hợp với nhiều độ tuổi như: áo sơ mi nữ tuổi 35, áo sơ mi nữ tuổi 40, áo sơ mi nữ tuổi 50... Và khi đến với bộ sưu tập áo sơ mi nữ của nhà Gu, bạn không cần phải băn khoăn, lo lắng vì sợ không tìm được trang phục thích hợp cho mình nữa nhé!', 300000, 120000, 'vay-6.jpg', NULL, 0, '2019-07-21 18:35:04', NULL),
(90, 'Váy 7', 2, 'Lanala luôn đem đến cho chị em những mẫu áo sơ mi nữ đẹp với nhiều phong cách và kiểu dáng khác nhau: áo sơ mi nữ hàn quốc, áo sơ mi nữ công sở, áo sơ mi nữ thiết kế, áo sơ mi nữ dự tiệc... Mỗi một mẫu áo mang một nét riêng và có thể phối được với nhiều loại quần và chân váy. Ngoài ra thời trang GUMAC cũng phù hợp với nhiều độ tuổi như: áo sơ mi nữ tuổi 35, áo sơ mi nữ tuổi 40, áo sơ mi nữ tuổi 50... Và khi đến với bộ sưu tập áo sơ mi nữ của nhà Gu, bạn không cần phải băn khoăn, lo lắng vì sợ không tìm được trang phục thích hợp cho mình nữa nhé!', 300000, NULL, 'vay-7.jpg', NULL, 0, '2019-07-21 18:35:04', NULL),
(91, 'Váy 8', 2, 'Lanala luôn đem đến cho chị em những mẫu áo sơ mi nữ đẹp với nhiều phong cách và kiểu dáng khác nhau: áo sơ mi nữ hàn quốc, áo sơ mi nữ công sở, áo sơ mi nữ thiết kế, áo sơ mi nữ dự tiệc... Mỗi một mẫu áo mang một nét riêng và có thể phối được với nhiều loại quần và chân váy. Ngoài ra thời trang GUMAC cũng phù hợp với nhiều độ tuổi như: áo sơ mi nữ tuổi 35, áo sơ mi nữ tuổi 40, áo sơ mi nữ tuổi 50... Và khi đến với bộ sưu tập áo sơ mi nữ của nhà Gu, bạn không cần phải băn khoăn, lo lắng vì sợ không tìm được trang phục thích hợp cho mình nữa nhé!', 300000, NULL, 'vay-8.jpg', NULL, 0, '2019-07-21 18:35:04', NULL),
(92, 'Váy 9', 2, 'Lanala luôn đem đến cho chị em những mẫu áo sơ mi nữ đẹp với nhiều phong cách và kiểu dáng khác nhau: áo sơ mi nữ hàn quốc, áo sơ mi nữ công sở, áo sơ mi nữ thiết kế, áo sơ mi nữ dự tiệc... Mỗi một mẫu áo mang một nét riêng và có thể phối được với nhiều loại quần và chân váy. Ngoài ra thời trang GUMAC cũng phù hợp với nhiều độ tuổi như: áo sơ mi nữ tuổi 35, áo sơ mi nữ tuổi 40, áo sơ mi nữ tuổi 50... Và khi đến với bộ sưu tập áo sơ mi nữ của nhà Gu, bạn không cần phải băn khoăn, lo lắng vì sợ không tìm được trang phục thích hợp cho mình nữa nhé!', 300000, NULL, 'vay-9.jpg', NULL, 0, '2019-07-21 18:35:04', NULL),
(93, 'Váy 10', 2, 'Lanala luôn đem đến cho chị em những mẫu áo sơ mi nữ đẹp với nhiều phong cách và kiểu dáng khác nhau: áo sơ mi nữ hàn quốc, áo sơ mi nữ công sở, áo sơ mi nữ thiết kế, áo sơ mi nữ dự tiệc... Mỗi một mẫu áo mang một nét riêng và có thể phối được với nhiều loại quần và chân váy. Ngoài ra thời trang GUMAC cũng phù hợp với nhiều độ tuổi như: áo sơ mi nữ tuổi 35, áo sơ mi nữ tuổi 40, áo sơ mi nữ tuổi 50... Và khi đến với bộ sưu tập áo sơ mi nữ của nhà Gu, bạn không cần phải băn khoăn, lo lắng vì sợ không tìm được trang phục thích hợp cho mình nữa nhé!', 300000, 250000, 'vay-10.jpg', NULL, 0, '2019-07-21 18:35:04', NULL),
(94, 'Đầm 1', 4, 'Lanala luôn đem đến cho chị em những mẫu áo sơ mi nữ đẹp với nhiều phong cách và kiểu dáng khác nhau: áo sơ mi nữ hàn quốc, áo sơ mi nữ công sở, áo sơ mi nữ thiết kế, áo sơ mi nữ dự tiệc... Mỗi một mẫu áo mang một nét riêng và có thể phối được với nhiều loại quần và chân váy. Ngoài ra thời trang GUMAC cũng phù hợp với nhiều độ tuổi như: áo sơ mi nữ tuổi 35, áo sơ mi nữ tuổi 40, áo sơ mi nữ tuổi 50... Và khi đến với bộ sưu tập áo sơ mi nữ của nhà Gu, bạn không cần phải băn khoăn, lo lắng vì sợ không tìm được trang phục thích hợp cho mình nữa nhé!', 300000, NULL, 'dam-1.jpg', NULL, 1, '2019-07-21 18:35:42', NULL),
(95, 'Đầm 2', 4, 'Lanala luôn đem đến cho chị em những mẫu áo sơ mi nữ đẹp với nhiều phong cách và kiểu dáng khác nhau: áo sơ mi nữ hàn quốc, áo sơ mi nữ công sở, áo sơ mi nữ thiết kế, áo sơ mi nữ dự tiệc... Mỗi một mẫu áo mang một nét riêng và có thể phối được với nhiều loại quần và chân váy. Ngoài ra thời trang GUMAC cũng phù hợp với nhiều độ tuổi như: áo sơ mi nữ tuổi 35, áo sơ mi nữ tuổi 40, áo sơ mi nữ tuổi 50... Và khi đến với bộ sưu tập áo sơ mi nữ của nhà Gu, bạn không cần phải băn khoăn, lo lắng vì sợ không tìm được trang phục thích hợp cho mình nữa nhé!', 300000, NULL, 'dam-2.jpg', NULL, 0, '2019-07-21 18:35:42', NULL),
(96, 'Đầm 3', 4, 'Lanala luôn đem đến cho chị em những mẫu áo sơ mi nữ đẹp với nhiều phong cách và kiểu dáng khác nhau: áo sơ mi nữ hàn quốc, áo sơ mi nữ công sở, áo sơ mi nữ thiết kế, áo sơ mi nữ dự tiệc... Mỗi một mẫu áo mang một nét riêng và có thể phối được với nhiều loại quần và chân váy. Ngoài ra thời trang GUMAC cũng phù hợp với nhiều độ tuổi như: áo sơ mi nữ tuổi 35, áo sơ mi nữ tuổi 40, áo sơ mi nữ tuổi 50... Và khi đến với bộ sưu tập áo sơ mi nữ của nhà Gu, bạn không cần phải băn khoăn, lo lắng vì sợ không tìm được trang phục thích hợp cho mình nữa nhé!', 300000, 180000, 'dam-3.jpg', NULL, 0, '2019-07-21 18:35:42', NULL),
(97, 'Đầm 4', 4, 'Lanala luôn đem đến cho chị em những mẫu áo sơ mi nữ đẹp với nhiều phong cách và kiểu dáng khác nhau: áo sơ mi nữ hàn quốc, áo sơ mi nữ công sở, áo sơ mi nữ thiết kế, áo sơ mi nữ dự tiệc... Mỗi một mẫu áo mang một nét riêng và có thể phối được với nhiều loại quần và chân váy. Ngoài ra thời trang GUMAC cũng phù hợp với nhiều độ tuổi như: áo sơ mi nữ tuổi 35, áo sơ mi nữ tuổi 40, áo sơ mi nữ tuổi 50... Và khi đến với bộ sưu tập áo sơ mi nữ của nhà Gu, bạn không cần phải băn khoăn, lo lắng vì sợ không tìm được trang phục thích hợp cho mình nữa nhé!', 300000, NULL, 'dam-4.jpg', NULL, 0, '2019-07-21 18:35:42', NULL),
(98, 'Đầm 5', 4, 'Lanala luôn đem đến cho chị em những mẫu áo sơ mi nữ đẹp với nhiều phong cách và kiểu dáng khác nhau: áo sơ mi nữ hàn quốc, áo sơ mi nữ công sở, áo sơ mi nữ thiết kế, áo sơ mi nữ dự tiệc... Mỗi một mẫu áo mang một nét riêng và có thể phối được với nhiều loại quần và chân váy. Ngoài ra thời trang GUMAC cũng phù hợp với nhiều độ tuổi như: áo sơ mi nữ tuổi 35, áo sơ mi nữ tuổi 40, áo sơ mi nữ tuổi 50... Và khi đến với bộ sưu tập áo sơ mi nữ của nhà Gu, bạn không cần phải băn khoăn, lo lắng vì sợ không tìm được trang phục thích hợp cho mình nữa nhé!', 300000, NULL, 'dam-5.jpg', NULL, 1, '2019-07-21 18:35:42', NULL),
(99, 'Đầm 6', 4, 'Lanala luôn đem đến cho chị em những mẫu áo sơ mi nữ đẹp với nhiều phong cách và kiểu dáng khác nhau: áo sơ mi nữ hàn quốc, áo sơ mi nữ công sở, áo sơ mi nữ thiết kế, áo sơ mi nữ dự tiệc... Mỗi một mẫu áo mang một nét riêng và có thể phối được với nhiều loại quần và chân váy. Ngoài ra thời trang GUMAC cũng phù hợp với nhiều độ tuổi như: áo sơ mi nữ tuổi 35, áo sơ mi nữ tuổi 40, áo sơ mi nữ tuổi 50... Và khi đến với bộ sưu tập áo sơ mi nữ của nhà Gu, bạn không cần phải băn khoăn, lo lắng vì sợ không tìm được trang phục thích hợp cho mình nữa nhé!', 300000, NULL, 'dam-6.jpg', NULL, 0, '2019-07-21 18:35:42', NULL),
(100, 'Đầm 7', 4, 'Lanala luôn đem đến cho chị em những mẫu áo sơ mi nữ đẹp với nhiều phong cách và kiểu dáng khác nhau: áo sơ mi nữ hàn quốc, áo sơ mi nữ công sở, áo sơ mi nữ thiết kế, áo sơ mi nữ dự tiệc... Mỗi một mẫu áo mang một nét riêng và có thể phối được với nhiều loại quần và chân váy. Ngoài ra thời trang GUMAC cũng phù hợp với nhiều độ tuổi như: áo sơ mi nữ tuổi 35, áo sơ mi nữ tuổi 40, áo sơ mi nữ tuổi 50... Và khi đến với bộ sưu tập áo sơ mi nữ của nhà Gu, bạn không cần phải băn khoăn, lo lắng vì sợ không tìm được trang phục thích hợp cho mình nữa nhé!', 300000, NULL, 'dam-7.jpg', NULL, 0, '2019-07-21 18:35:42', NULL),
(101, 'Đầm 8', 4, 'Lanala luôn đem đến cho chị em những mẫu áo sơ mi nữ đẹp với nhiều phong cách và kiểu dáng khác nhau: áo sơ mi nữ hàn quốc, áo sơ mi nữ công sở, áo sơ mi nữ thiết kế, áo sơ mi nữ dự tiệc... Mỗi một mẫu áo mang một nét riêng và có thể phối được với nhiều loại quần và chân váy. Ngoài ra thời trang GUMAC cũng phù hợp với nhiều độ tuổi như: áo sơ mi nữ tuổi 35, áo sơ mi nữ tuổi 40, áo sơ mi nữ tuổi 50... Và khi đến với bộ sưu tập áo sơ mi nữ của nhà Gu, bạn không cần phải băn khoăn, lo lắng vì sợ không tìm được trang phục thích hợp cho mình nữa nhé!', 300000, NULL, 'dam-8.jpg', NULL, 0, '2019-07-21 18:35:42', NULL),
(102, 'Đầm 9', 4, 'Lanala luôn đem đến cho chị em những mẫu áo sơ mi nữ đẹp với nhiều phong cách và kiểu dáng khác nhau: áo sơ mi nữ hàn quốc, áo sơ mi nữ công sở, áo sơ mi nữ thiết kế, áo sơ mi nữ dự tiệc... Mỗi một mẫu áo mang một nét riêng và có thể phối được với nhiều loại quần và chân váy. Ngoài ra thời trang GUMAC cũng phù hợp với nhiều độ tuổi như: áo sơ mi nữ tuổi 35, áo sơ mi nữ tuổi 40, áo sơ mi nữ tuổi 50... Và khi đến với bộ sưu tập áo sơ mi nữ của nhà Gu, bạn không cần phải băn khoăn, lo lắng vì sợ không tìm được trang phục thích hợp cho mình nữa nhé!', 300000, NULL, 'dam-9.jpg', NULL, 0, '2019-07-21 18:35:42', NULL),
(103, 'Đầm 10', 4, 'Lanala luôn đem đến cho chị em những mẫu áo sơ mi nữ đẹp với nhiều phong cách và kiểu dáng khác nhau: áo sơ mi nữ hàn quốc, áo sơ mi nữ công sở, áo sơ mi nữ thiết kế, áo sơ mi nữ dự tiệc... Mỗi một mẫu áo mang một nét riêng và có thể phối được với nhiều loại quần và chân váy. Ngoài ra thời trang GUMAC cũng phù hợp với nhiều độ tuổi như: áo sơ mi nữ tuổi 35, áo sơ mi nữ tuổi 40, áo sơ mi nữ tuổi 50... Và khi đến với bộ sưu tập áo sơ mi nữ của nhà Gu, bạn không cần phải băn khoăn, lo lắng vì sợ không tìm được trang phục thích hợp cho mình nữa nhé!', 300000, NULL, 'dam-10.jpg', NULL, 1, '2019-07-21 18:35:42', NULL),
(104, 'Outfit 1', 5, 'Lanala luôn đem đến cho chị em những mẫu áo sơ mi nữ đẹp với nhiều phong cách và kiểu dáng khác nhau: áo sơ mi nữ hàn quốc, áo sơ mi nữ công sở, áo sơ mi nữ thiết kế, áo sơ mi nữ dự tiệc... Mỗi một mẫu áo mang một nét riêng và có thể phối được với nhiều loại quần và chân váy. Ngoài ra thời trang GUMAC cũng phù hợp với nhiều độ tuổi như: áo sơ mi nữ tuổi 35, áo sơ mi nữ tuổi 40, áo sơ mi nữ tuổi 50... Và khi đến với bộ sưu tập áo sơ mi nữ của nhà Gu, bạn không cần phải băn khoăn, lo lắng vì sợ không tìm được trang phục thích hợp cho mình nữa nhé!', 300000, NULL, 'outfit-1.jpg', NULL, 0, '2019-07-21 18:36:24', NULL),
(105, 'Outfit 2', 5, 'Lanala luôn đem đến cho chị em những mẫu áo sơ mi nữ đẹp với nhiều phong cách và kiểu dáng khác nhau: áo sơ mi nữ hàn quốc, áo sơ mi nữ công sở, áo sơ mi nữ thiết kế, áo sơ mi nữ dự tiệc... Mỗi một mẫu áo mang một nét riêng và có thể phối được với nhiều loại quần và chân váy. Ngoài ra thời trang GUMAC cũng phù hợp với nhiều độ tuổi như: áo sơ mi nữ tuổi 35, áo sơ mi nữ tuổi 40, áo sơ mi nữ tuổi 50... Và khi đến với bộ sưu tập áo sơ mi nữ của nhà Gu, bạn không cần phải băn khoăn, lo lắng vì sợ không tìm được trang phục thích hợp cho mình nữa nhé!', 300000, NULL, 'outfit-2.jpg', NULL, 1, '2019-07-21 18:36:24', NULL),
(106, 'Outfit 3', 5, 'Lanala luôn đem đến cho chị em những mẫu áo sơ mi nữ đẹp với nhiều phong cách và kiểu dáng khác nhau: áo sơ mi nữ hàn quốc, áo sơ mi nữ công sở, áo sơ mi nữ thiết kế, áo sơ mi nữ dự tiệc... Mỗi một mẫu áo mang một nét riêng và có thể phối được với nhiều loại quần và chân váy. Ngoài ra thời trang GUMAC cũng phù hợp với nhiều độ tuổi như: áo sơ mi nữ tuổi 35, áo sơ mi nữ tuổi 40, áo sơ mi nữ tuổi 50... Và khi đến với bộ sưu tập áo sơ mi nữ của nhà Gu, bạn không cần phải băn khoăn, lo lắng vì sợ không tìm được trang phục thích hợp cho mình nữa nhé!', 300000, NULL, 'outfit-3.jpg', NULL, 0, '2019-07-21 18:36:24', NULL),
(107, 'Outfit 4', 5, 'Lanala luôn đem đến cho chị em những mẫu áo sơ mi nữ đẹp với nhiều phong cách và kiểu dáng khác nhau: áo sơ mi nữ hàn quốc, áo sơ mi nữ công sở, áo sơ mi nữ thiết kế, áo sơ mi nữ dự tiệc... Mỗi một mẫu áo mang một nét riêng và có thể phối được với nhiều loại quần và chân váy. Ngoài ra thời trang GUMAC cũng phù hợp với nhiều độ tuổi như: áo sơ mi nữ tuổi 35, áo sơ mi nữ tuổi 40, áo sơ mi nữ tuổi 50... Và khi đến với bộ sưu tập áo sơ mi nữ của nhà Gu, bạn không cần phải băn khoăn, lo lắng vì sợ không tìm được trang phục thích hợp cho mình nữa nhé!', 300000, 120000, 'outfit-4.jpg', NULL, 1, '2019-07-21 18:36:24', NULL),
(108, 'Outfit 5', 5, 'Lanala luôn đem đến cho chị em những mẫu áo sơ mi nữ đẹp với nhiều phong cách và kiểu dáng khác nhau: áo sơ mi nữ hàn quốc, áo sơ mi nữ công sở, áo sơ mi nữ thiết kế, áo sơ mi nữ dự tiệc... Mỗi một mẫu áo mang một nét riêng và có thể phối được với nhiều loại quần và chân váy. Ngoài ra thời trang GUMAC cũng phù hợp với nhiều độ tuổi như: áo sơ mi nữ tuổi 35, áo sơ mi nữ tuổi 40, áo sơ mi nữ tuổi 50... Và khi đến với bộ sưu tập áo sơ mi nữ của nhà Gu, bạn không cần phải băn khoăn, lo lắng vì sợ không tìm được trang phục thích hợp cho mình nữa nhé!', 300000, NULL, 'outfit-5.jpg', NULL, 1, '2019-07-21 18:36:24', NULL),
(109, 'Outfit 6', 5, 'Lanala luôn đem đến cho chị em những mẫu áo sơ mi nữ đẹp với nhiều phong cách và kiểu dáng khác nhau: áo sơ mi nữ hàn quốc, áo sơ mi nữ công sở, áo sơ mi nữ thiết kế, áo sơ mi nữ dự tiệc... Mỗi một mẫu áo mang một nét riêng và có thể phối được với nhiều loại quần và chân váy. Ngoài ra thời trang GUMAC cũng phù hợp với nhiều độ tuổi như: áo sơ mi nữ tuổi 35, áo sơ mi nữ tuổi 40, áo sơ mi nữ tuổi 50... Và khi đến với bộ sưu tập áo sơ mi nữ của nhà Gu, bạn không cần phải băn khoăn, lo lắng vì sợ không tìm được trang phục thích hợp cho mình nữa nhé!', 300000, NULL, 'outfit-6.jpg', NULL, 0, '2019-07-21 18:36:24', NULL),
(110, 'Outfit 7', 5, 'Lanala luôn đem đến cho chị em những mẫu áo sơ mi nữ đẹp với nhiều phong cách và kiểu dáng khác nhau: áo sơ mi nữ hàn quốc, áo sơ mi nữ công sở, áo sơ mi nữ thiết kế, áo sơ mi nữ dự tiệc... Mỗi một mẫu áo mang một nét riêng và có thể phối được với nhiều loại quần và chân váy. Ngoài ra thời trang GUMAC cũng phù hợp với nhiều độ tuổi như: áo sơ mi nữ tuổi 35, áo sơ mi nữ tuổi 40, áo sơ mi nữ tuổi 50... Và khi đến với bộ sưu tập áo sơ mi nữ của nhà Gu, bạn không cần phải băn khoăn, lo lắng vì sợ không tìm được trang phục thích hợp cho mình nữa nhé!', 300000, NULL, 'outfit-7.jpg', NULL, 0, '2019-07-21 18:36:24', NULL),
(111, 'Outfit 8', 5, 'Lanala luôn đem đến cho chị em những mẫu áo sơ mi nữ đẹp với nhiều phong cách và kiểu dáng khác nhau: áo sơ mi nữ hàn quốc, áo sơ mi nữ công sở, áo sơ mi nữ thiết kế, áo sơ mi nữ dự tiệc... Mỗi một mẫu áo mang một nét riêng và có thể phối được với nhiều loại quần và chân váy. Ngoài ra thời trang GUMAC cũng phù hợp với nhiều độ tuổi như: áo sơ mi nữ tuổi 35, áo sơ mi nữ tuổi 40, áo sơ mi nữ tuổi 50... Và khi đến với bộ sưu tập áo sơ mi nữ của nhà Gu, bạn không cần phải băn khoăn, lo lắng vì sợ không tìm được trang phục thích hợp cho mình nữa nhé!', 300000, 190000, 'outfit-8.jpg', NULL, 1, '2019-07-21 18:36:24', NULL),
(112, 'Outfit 9', 5, 'Lanala luôn đem đến cho chị em những mẫu áo sơ mi nữ đẹp với nhiều phong cách và kiểu dáng khác nhau: áo sơ mi nữ hàn quốc, áo sơ mi nữ công sở, áo sơ mi nữ thiết kế, áo sơ mi nữ dự tiệc... Mỗi một mẫu áo mang một nét riêng và có thể phối được với nhiều loại quần và chân váy. Ngoài ra thời trang GUMAC cũng phù hợp với nhiều độ tuổi như: áo sơ mi nữ tuổi 35, áo sơ mi nữ tuổi 40, áo sơ mi nữ tuổi 50... Và khi đến với bộ sưu tập áo sơ mi nữ của nhà Gu, bạn không cần phải băn khoăn, lo lắng vì sợ không tìm được trang phục thích hợp cho mình nữa nhé!', 300000, NULL, 'outfit-9.jpg', NULL, 1, '2019-07-21 18:36:24', NULL),
(113, 'Outfit 10', 5, 'Lanala luôn đem đến cho chị em những mẫu áo sơ mi nữ đẹp với nhiều phong cách và kiểu dáng khác nhau: áo sơ mi nữ hàn quốc, áo sơ mi nữ công sở, áo sơ mi nữ thiết kế, áo sơ mi nữ dự tiệc... Mỗi một mẫu áo mang một nét riêng và có thể phối được với nhiều loại quần và chân váy. Ngoài ra thời trang GUMAC cũng phù hợp với nhiều độ tuổi như: áo sơ mi nữ tuổi 35, áo sơ mi nữ tuổi 40, áo sơ mi nữ tuổi 50... Và khi đến với bộ sưu tập áo sơ mi nữ của nhà Gu, bạn không cần phải băn khoăn, lo lắng vì sợ không tìm được trang phục thích hợp cho mình nữa nhé!', 300000, NULL, 'outfit-10.jpg', NULL, 0, '2019-07-21 18:36:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` int(11) NOT NULL,
  `link` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `link`, `image`) VALUES
(1, '', 'news-1.jpg'),
(2, '', 'news-2.jpg'),
(3, '', 'news-3.jpg'),
(4, '', 'news-4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `type_products`
--

CREATE TABLE `type_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `type_products`
--

INSERT INTO `type_products` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Áo', 'ao.jpg', NULL, NULL),
(2, 'Váy', 'vay.jpg', '2019-07-21 17:52:38', '2019-07-21 17:52:38'),
(3, 'Quần', 'quan.jpg', '2019-07-21 17:52:38', '2019-07-21 17:52:38'),
(4, 'Đầm', 'dam.jpg', '2019-07-21 17:54:06', '2019-07-21 17:54:06'),
(5, 'Outfit', 'outfit.jpg', '2019-07-21 17:54:38', '2019-07-21 17:54:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bills_ibfk_1` (`id_customer`);

--
-- Indexes for table `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill_detail_ibfk_2` (`id_product`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_id_type_foreign` (`id_type`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_products`
--
ALTER TABLE `type_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `type_products`
--
ALTER TABLE `type_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_id_type_foreign` FOREIGN KEY (`id_type`) REFERENCES `type_products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
