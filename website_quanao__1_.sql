-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 12, 2024 lúc 12:54 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `website_quanao (1)`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id` int(6) NOT NULL,
  `iduser` int(6) NOT NULL,
  `madh` varchar(50) NOT NULL,
  `date` datetime NOT NULL,
  `hoten` varchar(50) NOT NULL,
  `sdt` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `diachi` varchar(100) NOT NULL,
  `ghichu` varchar(100) NOT NULL,
  `tongdonhang` int(9) NOT NULL,
  `ship` int(6) NOT NULL DEFAULT 0,
  `voucher` int(6) NOT NULL DEFAULT 0,
  `tongthanhtoan` int(9) NOT NULL,
  `pttt` int(6) NOT NULL DEFAULT 1,
  `trangthai` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`id`, `iduser`, `madh`, `date`, `hoten`, `sdt`, `email`, `diachi`, `ghichu`, `tongdonhang`, `ship`, `voucher`, `tongthanhtoan`, `pttt`, `trangthai`) VALUES
(160, 11, '835FSHOP_XYZ', '2024-03-08 17:58:30', 'uuu', '2147483647', 'thanhnhlps35203@fpt.edu.vn ', 'Phường Hiệp Thành, Quận 12, Ho Chi Minh', '', 500000, 30000, 0, 530000, 1, 0),
(161, 11, '989FSHOP_XYZ', '2024-03-08 18:01:22', 'uuu', '2147483647', 'thanhnhlps35203@fpt.edu.vn ', ', , ', '', 300000, 30000, 0, 330000, 1, 0),
(162, 11, '377FSHOP_XYZ', '2024-03-27 17:04:04', 'uuu', '2147483647', 'thanhnhlps35203@fpt.edu.vn ', ', , ', '', 300000, 30000, 0, 330000, 1, 0),
(163, 11, '794FSHOP_XYZ', '2024-03-29 16:50:53', 'uuu', '2147483647', 'thanhnhlps35203@fpt.edu.vn ', ', , ', '', 250000, 30000, 0, 280000, 1, 0),
(164, 11, '415FSHOP_XYZ', '2024-03-29 16:56:47', 'uuu', '2147483647', 'thanhnhlps35203@fpt.edu.vn ', ', , ', '', 450000, 30000, 0, 480000, 1, 0),
(165, 11, '64FSHOP_XYZ', '2024-03-29 17:15:41', 'uuu', '2147483647', 'thanhnhlps35203@fpt.edu.vn ', ', , ', '', 450000, 30000, 0, 480000, 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietbill`
--

CREATE TABLE `chitietbill` (
  `id` int(6) NOT NULL,
  `idsp` int(6) NOT NULL,
  `idbill` int(6) NOT NULL,
  `img` varchar(200) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(6) NOT NULL,
  `soluong` int(3) NOT NULL,
  `thanhtien` int(10) NOT NULL,
  `trangthai` int(11) NOT NULL COMMENT '0: Đang chờ xử lí \r\n1:Đang soạn hàng\r\n2:Đã Vận Chuyển\r\n3: Đã Giao\r\n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietbill`
--

INSERT INTO `chitietbill` (`id`, `idsp`, `idbill`, `img`, `name`, `price`, `soluong`, `thanhtien`, `trangthai`) VALUES
(57, 43, 160, 'pk5.jpeg', 'DÂY NỊT NAM ', 285, 2, 570000, 0),
(58, 32, 161, 'nam8.jpeg', 'ÁO POLO NAM ', 324, 1, 324000, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int(6) NOT NULL,
  `iduser` int(6) NOT NULL,
  `name` varchar(20) NOT NULL,
  `idsp` int(6) NOT NULL,
  `tensp` varchar(50) NOT NULL,
  `noidung` text NOT NULL,
  `ngaybl` varchar(30) NOT NULL,
  `trangthai` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(6) NOT NULL,
  `tendm` varchar(50) NOT NULL,
  `noidung` varchar(100) NOT NULL,
  `hinhanh` varchar(200) NOT NULL,
  `parent` int(6) NOT NULL,
  `hienthi` int(6) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `tendm`, `noidung`, `hinhanh`, `parent`, `hienthi`) VALUES
(1, 'Áo Khoác ', 'Áo khoác thời trang Nam/Nữ', 'aokhoac.png', 1, 6),
(2, 'Đồ Nam', 'Áo thun, sơ mi, quần dài, sort...', 'aonam.png ', 2, 6),
(3, 'Đồ Nữ', 'Áo quần, chân váy, đầm, yếm...', 'aonu.png', 3, 6),
(4, 'Đồ Unisex', 'Áo thun, sơ mi, áo khoác UNISEX', 'uniset.png', 4, 6),
(5, 'Phụ Kiện', 'Balo, túi xách, nón, thắt lưng, ví...', 'phukien.png', 5, 6),
(6, 'TOTODAY', 'Sản phẩm được TOTODAY đề xuất', 'goiy.png', 0, 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(6) NOT NULL,
  `tensp` varchar(100) NOT NULL,
  `hinhanh` varchar(200) NOT NULL,
  `variant` longtext NOT NULL,
  `giasp` float NOT NULL,
  `khuyenmai` int(6) NOT NULL,
  `view` int(10) NOT NULL,
  `trangthai` int(6) NOT NULL DEFAULT 0 COMMENT ' 0= sản phẩm thường ;\r\n1=best seler;\r\n 2=new  ;\r\n',
  `mota` varchar(300) NOT NULL,
  `size` varchar(10) NOT NULL COMMENT 'S,M,XL,XXL',
  `mausac` varchar(6) NOT NULL DEFAULT '0',
  `iddm` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `tensp`, `hinhanh`, `variant`, `giasp`, `khuyenmai`, `view`, `trangthai`, `mota`, `size`, `mausac`, `iddm`) VALUES
(1, 'ÁO KHOÁC HOODIE UNISEX', 'k1.jpeg', '[\"k41.jpeg\", \"k42.jpeg\" , \"k43.jpeg\" ,\"k44.jpeg\"]', 420000, 400000, 10, 2, 'Bộ sưu tập ENOUGHISM lấy cảm hứng niềm hạnh phúc khi bạn biết đủ và hài lòng với những gì mà mình đang có. Bạn sẽ tìm thấy sự hạnh phúc khi tập trung vào việc tận hưởng và trân trọng những thành tựu, mối quan hệ và trạng thái mà bạn đang có trong cuộc sống. Một chiếc áo Hoodie đang được các FRIENDs ', 'M', 'Đỏ', 1),
(2, 'ÁO THUN NAM - YOUTHFUL', 'nam1.jpeg', '[\"vnam11.jpeg\", \"vnam12.jpeg\", \"vnam13.jpeg\", \"vnam14.jpeg\"]', 200000, 189000, 1300, 1, 'Áo thun là một item khá phổ mang tính ứng dụng cao, thường được sử dụng trong thời trang thường ngày. Đặc biệt ở chiếc áo này được sử dụng công nghệ in IN CAO hiện đại theo trend chữ to in đầy áo.', 'S', 'Xanh', 2),
(3, 'CHÂN VÁY NỮ - FLAP POCKE', 'nu1.jpeg ', '[\"nu11.jpeg\", \"nu12.jpeg\", \"nu13.jpeg\", \"vnam14.jpeg\"]', 275000, 0, 450, 0, 'Chân váy túi hộp được xem là một trong những cực phẩm quốc dân, người người nhà nhà yêu thích. Với thiết kế đơn giản cùng tính ứng dụng cao sản phẩm có khả năng mix-match đa dạng tạo nên phong cách thời trang đầy cá tính. ', 'S', 'Đen', 3),
(4, 'ÁO SWEATER', 'u1.jpeg', '[\"u11.jpeg\",\"u12.jpeg\",\"u13.jpeg\"]', 300000, 200000, 300, 0, '', 'M', '0', 4),
(5, 'NÓN LƯỠI TRAI UNISEX ', 'pk1.jpeg', '[\"pk11.jpeg\",\"pk12.jpeg\",\"pk13.jpeg\"]', 200000, 185000, 34, 1, '', '', 'Đen', 5),
(11, 'ÁO KHOÁC VARSITY UNISEX ', 'k2.jpeg', '[\"k41.jpeg\", \"k42.jpeg\" , \"k43.jpeg\" ,\"k44.jpeg\"]', 680000, 0, 1203, 0, 'Áo khoác Varsity với thiết kế trẻ trung, hiện đại đem đến cảm giác hài hòa, tinh tế cho người mặc. Đặc biệt với chất vải nhung gân mềm mịn, có khả năng giữ ấm cao cũng như bề mặt được bao phủ bởi một với lông mịn màng. Chiếc áo mang đến vẻ ngoài năng động thích hợp với những bạn theo đuổi phong cách', 'M', 'Tím', 1),
(12, 'ÁO KHOÁC HODDIE', 'k3.jpeg', '[\"k31.jpeg\",\"k32.jpeg\",\"k33.jpeg\"]', 400000, 0, 1203, 3, 'Bộ sưu tập ENOUGHISM lấy cảm hứng niềm hạnh phúc khi bạn biết đủ và hài lòng với những gì mà mình đang có. Bạn sẽ tìm thấy sự hạnh phúc khi tập trung vào việc tận hưởng và trân trọng những thành tựu, mối quan hệ và trạng thái mà bạn đang có trong cuộc sống. Một chiếc áo Hoodie đang được các FRIENDs ', 'M', '0', 1),
(13, 'ÁO KHOÁC KAKI UNISEX ', 'k4.jpeg', '[\"k41.jpeg\", \"k42.jpeg\" , \"k43.jpeg\" ,\"k44.jpeg\"]', 450000, 0, 2093, 2, '\"Học nhất - Mặc chất\" cùng TOTODAY với item áo khoác CREWMATE nhé!\r\nVới hoạ tiết được thêu chắc chắn cùng với các gam màu trung tín vừa đảm bảo được xu hướng thời trang nhưng vẫn giữ được tính tiện lợi khi mặc.\r\n', 'M', 'Vàng', 1),
(14, 'ÁO KHOÁC THUN NỮ ', 'k5.jpeg', '[\"k41.jpeg\", \"k42.jpeg\" , \"k43.jpeg\" ,\"k44.jpeg\"]', 420000, 0, 10, 0, 'New Arrival từ nhà TOTODAY với kỹ thuật in decal không thể bỏ qua. Item giúp bạn có thể kết hợp với mọi loại phong cách, tự tin thể hiện cá tính của mình với thiết kế form dáng croptop tinh tế giúp tôn lên dáng của Friends.', 'M', 'Xanh', 1),
(15, 'ÁO KHOÁC KAKI UNISEX', 'k6.jpeg', '[\"k41.jpeg\", \"k42.jpeg\" , \"k43.jpeg\" ,\"k44.jpeg\"]', 415000, 0, 18, 2, 'Phiên bản Áo Khoác bảo vệ FRIENDs khỏi các yếu tố thời tiết chính thức lên kệ từ TOTODAY. Với chất kaki cotton dễ sử dụng và dễ kết hợp cùng các items khác bên trong.\r\n', 'M', 'ĐEN XA', 1),
(16, 'ÁO KHOÁC KAKI UNISEX', 'k7.jpeg', '[\"k41.jpeg\", \"k42.jpeg\" , \"k43.jpeg\" ,\"k44.jpeg\"]', 465000, 0, 29, 0, '\r\nLà item được ưa chuộng bởi tính tiện dụng và đơn giản của nó. Áo sơ mi từ TOTODAY với thiết kế tay Raglan độc đáo mới lạ, tạo nên điểm nhấn cho chiếc áo vẫn giữ được sự thanh lịch.\r\n', 'M', 'Đen Hồ', 1),
(17, 'ÁO KHOÁC THUN NỮ', 'k8.jpeg', '[\"k41.jpeg\", \"k42.jpeg\" , \"k43.jpeg\" ,\"k44.jpeg\"]', 375000, 0, 3, 0, '\r\nVới các tone màu cực kì ngọt ngào dành cho các nàng thì áo khoác với form dáng croptop này chắc chắn sẽ là items hot hit và được ưa chuộng nhất dành cho FRIENDs GIRL.', 'M', 'Xám', 1),
(21, 'ÁO THUN - RETRO DENIM\r\n', 'nam2.jpeg', '[\"nam21.jpeg\" , \"nam22.jpeg\" , \"nam3.jpeg\"]', 285000, 0, 234, 2, 'Sản phẩm được lấy cảm hứng từ những năm thập niên 90 và được biến tấu lại theo phong cách trẻ trung và hiện đại của giới trẻ hiện nay. Đây chính là một sự kết hợp hoàn hảo của hơi thở cổ điển với xu thế hiện đại tạo nên một sản phẩm trendy.\r\n', 'S', '0', 2),
(22, 'ÁO SƠ MI NAM - ENOUGHISM ', 'nam3.jpeg', '[\"nam31.jpeg\" , \"nam32.jpeg\" , \"nam33.jpeg\"]', 315000, 300000, 2000, 1, 'Bộ sưu tập ENOUGHISM lấy cảm hứng niềm hạnh phúc khi bạn biết đủ và hài lòng với những gì mà mình đang có. Bạn sẽ tìm thấy sự hạnh phúc khi tập trung vào việc tận hưởng và trân trọng những thành tựu, mối quan hệ và trạng thái mà bạn đang có trong cuộc sống. Chiếc sơ mi nằm trong BST này là một sản p', '', '0', 2),
(28, 'QUẦN TÂY NAM - WAISTBAND\r\n', 'nam4.jpeg', '[\"nam41.jpeg\",\"nam42.jpeg\",\"nam43.jpeg\"]', 400000, 395000, 1000, 3, 'Bộ sưu tập ENOUGHISM lấy cảm hứng niềm hạnh phúc khi bạn biết đủ và hài lòng với những gì mà mình đang có. Bạn sẽ tìm thấy sự hạnh phúc khi tập trung vào việc tận hưởng và trân trọng những thành tựu, mối quan hệ và trạng thái mà bạn đang có trong cuộc sống. Những chiếc quần tây sẽ là sự lựa chọn hàn', 'M', '0', 2),
(29, 'QUẦN TÂY NAM - BAGGY ', 'nam5.jpeg\r\n\r\n', '[\"nam51.jpeg\",\"nam52.jpeg\",\"nam53.jpeg\"]', 415000, 0, 2134, 2, 'Bộ sưu tập ENOUGHISM lấy cảm hứng niềm hạnh phúc khi bạn biết đủ và hài lòng với những gì mà mình đang có. Bạn sẽ tìm thấy sự hạnh phúc khi tập trung vào việc tận hưởng và trân trọng những thành tựu, mối quan hệ và trạng thái mà bạn đang có trong cuộc sống. Những chiếc quần tây sẽ là sự lựa chọn hàn', 'M', '0', 2),
(30, 'QUẦN JEANS NAM', 'nam6.jpeg', '[\"nam61.jpeg\",\"nam62.jpeg\",\"nam63.jpeg\"]', 400000, 0, 3, 3, 'Bộ sưu tập ENOUGHISM lấy cảm hứng niềm hạnh phúc khi bạn biết đủ và hài lòng với những gì mà mình đang có. Bạn sẽ tìm thấy sự hạnh phúc khi tập trung vào việc tận hưởng và trân trọng những thành tựu, mối quan hệ và trạng thái mà bạn đang có trong cuộc sống. Những chiếc quần tây sẽ là sự lựa chọn hàn', '', '0', 2),
(31, 'QUẦN JEANS NAM', 'nam7.jpeg', '[\"nam71.jpeg\",\"nam72.jpeg\",\"nam73.jpeg\"]', 350000, 300000, 457, 1, 'Bộ sưu tập ENOUGHISM lấy cảm hứng niềm hạnh phúc khi bạn biết đủ và hài lòng với những gì mà mình đang có. Bạn sẽ tìm thấy sự hạnh phúc khi tập trung vào việc tận hưởng và trân trọng những thành tựu, mối quan hệ và trạng thái mà bạn đang có trong cuộc sống. Sử dụng chất liệu cá sấu CVC cao cấp 2 chi', 'M', 'Đo', 2),
(32, 'ÁO POLO NAM ', 'nam8.jpeg', '[\"nam81.jpeg\",\"nam82.jpeg\",\"nam83.jpeg\"]', 324000, 300000, 20000, 1, 'Bộ sưu tập ENOUGHISM lấy cảm hứng niềm hạnh phúc khi bạn biết đủ và hài lòng với những gì mà mình đang có. Bạn sẽ tìm thấy sự hạnh phúc khi tập trung vào việc tận hưởng và trân trọng những thành tựu, mối quan hệ và trạng thái mà bạn đang có trong cuộc sống. Sử dụng chất liệu cá sấu CVC cao cấp 2 chi', 'M', 'ĐEN XA', 2),
(33, 'CHÂN VÁY NỮ', 'nu2.jpeg', '[\"nu21.jpeg\",\"nu22.jpeg\",\"nu23.jpeg\"]', 300000, 200000, 3092, 3, 'Chân váy túi hộp được xem là một trong những cực phẩm quốc dân, người người nhà nhà yêu thích. Với thiết kế đơn giản cùng tính ứng dụng cao sản phẩm có khả năng mix-match đa dạng tạo nên phong cách thời trang đầy cá tính. ', 'm', 'Trắng', 3),
(34, 'ÁO THUN NỮ', 'nu3.jpeg', '[\"nu31.jpeg\",\"nu32.jpeg\",\"3.jpeg\"]', 235000, 0, 102, 0, 'Bộ sưu tập ENOUGHISM lấy cảm hứng niềm hạnh phúc khi bạn biết đủ và hài lòng với những gì mà mình đang có. Bạn sẽ tìm thấy sự hạnh phúc khi tập trung vào việc tận hưởng và trân trọng những thành tựu, mối quan hệ và trạng thái mà bạn đang có trong cuộc sống. Áo baby tee ENOUGHism dành riêng cho các F', 'M', '0', 3),
(35, 'ÁO THUN NỮ -  EXPRESS YOURSELF', 'nu4.jpeg', '[\"nu41.jpeg\",\"nu42.jpeg\",\"nu43.jpeg\"]', 235000, 0, 100, 2, 'Áo thun là một item khá phổ biến mang tính ứng dụng cao, thường được sử dụng trong thời trang thường ngày. Sản phẩm được thiết kế nổi bật cùng với thông điệp ý nghĩa \"Express yourself\" hãy là chính mình, tự tin thể hiện bản thân và thoải mái trong việc bày tỏ những sở thích, cảm xúc của chính mình. ', 'M', 'Đen', 3),
(36, 'CHÂN VÁY JEAN NỮ ', 'nu5.jpeg', '[\"nu51.jpeg\",\"nu52.jpeg\",\"nu53.jpeg\"]', 350000, 30000, 1000, 1, 'Bộ sưu tập ENOUGHISM lấy cảm hứng niềm hạnh phúc khi bạn biết đủ và hài lòng với những gì mà mình đang có. Bạn sẽ tìm thấy sự hạnh phúc khi tập trung vào việc tận hưởng và trân trọng những thành tựu, mối quan hệ và trạng thái mà bạn đang có trong cuộc sống. Chân váy jean dài là mẫu chân váy đươ', 'M', '0', 3),
(37, 'ÁO THUN -THOSE LITTLE BUNNY', 'nu6.jpeg', '[\"nu61.jpeg\",\"nu62.jpeg\",\"nu63.jpeg\"]', 245000, 0, 213, 0, 'Áo thun là một item khá phổ biến mang tính ứng dụng cao, thường được sử dụng trong thời trang thường ngày. Đặc biệt ở chiếc áo này được sử dụng công nghệ in IN DECAL hiện đại theo trend. ', 'M', '0', 3),
(38, 'ÁO THUN - MYSTIC DESERT', 'nu7.jpeg', '[\"nu71.jpeg\",\"nu72.jpeg\",\"nu73.jpeg\"]', 235000, 0, 3423, 2, 'Đây Items không thể thiếu trong tủ đồ của các FRIENDs GIRL bởi tính tiện dụng của nó, có thể phối với bất kì items nào đi cùng mà không kén chọn. Đặc Biệt với kĩ thuật in decal làm nổi bật lên hoạ tiết, tạo điểm nhấn cho chiếc áo trở nên ấn tượng hơn', 'M', '0', 3),
(39, 'ÁO THUN - NY CITY', 'nu8.jpeg', '[\"nu81.jpeg\",\"nu82.jpeg\",\"nu83.jpeg\"]', 215000, 0, 2323, 0, 'Áo thun nữ tay ngắn với hoạ tiết đơn giản là kiểu áo thun luôn nhận được nhiều sự ưu chuộng của phái đẹp. Nhờ vào thiết kế đơn giản, vô cùng dễ mix&match cho các nàng có thể thoải mái sáng tạo phối ra những outfit đẹp và phù hợp với mình nhất.\r\n', 'M', '0', 3),
(40, 'NÓN BUCKET JEAN', 'pk2.jpeg', '[\"pk22.jpeg\",\"pk23.jpeg\"]', 160000, 0, 741, 2, '\"Xanh & Đen\", 2 gam màu đầy cá tính dành cho các FRIENDs năng động. Chiếc nón Unisex vừa cập bến nhà TOTODAY chắc chắn sẽ không khiến các FRIENDs thất vọng. Thiết kế sở hữu chất liệu Jean  thoáng mát, thoải mái nhưng lại không lỗi thời, chắc chắn sẽ là một item không thể thiếu trong tủ đồ của các FR', 'M', '0', 5),
(41, 'NÓN BUCKET UNISEX', 'pk3.jpeg', '[\"pk32.jpeg\",\"pk33.jpeg\"]', 180000, 130000, 647, 2, 'Chiếc nón có họa tiết thêu thủ công tinh xảo với những đường may chắc chắn, chất liệu nhung gân mềm mịn kết hợp với bảng màu được phối đậm chất vintage. Món phụ kiện này chắc chắn sẽ trở thành trợ thủ đắc lực cho mọi set đồ của bạn trong những dịp đầu năm mới.', 'M', '0', 5),
(42, 'DÂY NỊT NAM', 'pk4.jpeg', '[\"pk32.jpeg\",\"pk33.jpeg\"]', 285000, 250000, 80, 3, 'Thiết kế với chất liệu da tổng hợp cùng tone màu đen quyền lực sẵn sàng giúp bạn chinh phục mọi outfits khó nhằn nhất. \r\n\r\n', 'M', '0', 5),
(43, 'DÂY NỊT NAM ', 'pk5.jpeg', '[\"pk5.jpeg\"]', 285000, 250000, 3000, 1, 'Thiết kế với chất liệu da tổng hợp cùng tone màu đen quyền lực sẵn sàng giúp bạn chinh phục mọi outfits khó nhằn nhất. \r\n\r\n', 'M', '0', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(6) NOT NULL,
  `hoten` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `diachi` varchar(200) NOT NULL,
  `ghichu` varchar(200) NOT NULL,
  `dienthoai` int(11) NOT NULL,
  `role` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `hoten`, `username`, `password`, `email`, `diachi`, `ghichu`, `dienthoai`, `role`) VALUES
(11, 'uuu', 'admin', '123', 'thanhnhlps35203@fpt.edu.vn ', '', '', 2147483647, 1),
(12, 'abc', 'nguyen van a', '123', 'thanhnhlps35203@fpt.edu.vn ', 'q12', '', 192834, 0),
(13, 'thanh', 'thanh', '123', 'thanhnhlps35203@fpt.edu.vn ', '', '', 12345568, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_bill_user` (`iduser`);

--
-- Chỉ mục cho bảng `chitietbill`
--
ALTER TABLE `chitietbill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cart_bill` (`idbill`),
  ADD KEY `fk_cart_sanpham` (`idsp`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_comment_sanpham` (`idsp`),
  ADD KEY `fk_binhluan_user` (`iduser`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sanpham_danhmuc` (`iddm`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT cho bảng `chitietbill`
--
ALTER TABLE `chitietbill`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `fk_bill_user` FOREIGN KEY (`iduser`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `chitietbill`
--
ALTER TABLE `chitietbill`
  ADD CONSTRAINT `fk_cart_bill` FOREIGN KEY (`idbill`) REFERENCES `bill` (`id`),
  ADD CONSTRAINT `fk_cart_sanpham` FOREIGN KEY (`idsp`) REFERENCES `sanpham` (`id`);

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_binhluan_user` FOREIGN KEY (`iduser`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `fk_comment_sanpham` FOREIGN KEY (`idsp`) REFERENCES `sanpham` (`id`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `fk_sanpham_danhmuc` FOREIGN KEY (`iddm`) REFERENCES `danhmuc` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
