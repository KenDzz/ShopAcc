-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 18, 2023 lúc 06:54 PM
-- Phiên bản máy phục vụ: 10.4.8-MariaDB
-- Phiên bản PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shop_nick_game`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shop_admin`
--

CREATE TABLE `shop_admin` (
  `id` int(11) NOT NULL,
  `user` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `author` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `shop_admin`
--

INSERT INTO `shop_admin` (`id`, `user`, `password`, `author`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shop_category`
--

CREATE TABLE `shop_category` (
  `id` int(11) NOT NULL,
  `name` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(256) NOT NULL,
  `image` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `shop_category`
--

INSERT INTO `shop_category` (`id`, `name`, `url`, `image`) VALUES
(1, 'Thẻ Cào', '#', 'img/1607928490_503106.jpg'),
(2, 'Nick Game', '#', 'img/3nRdwuuw4A_1601866584.jpg'),
(3, 'Trang Cá Nhân', 'user', 'img/f0IJ9RUs8U_1601866637.jpg'),
(4, 'Dịch Vụ', '#', 'img/MNBO6bOMbg_1601866691.jpg'),
(5, 'Vòng quay may mắn', '#', 'img/1623940667_455113.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shop_config`
--

CREATE TABLE `shop_config` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `content` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `shop_config`
--

INSERT INTO `shop_config` (`id`, `name`, `content`) VALUES
(1, 'title', 'Shop360Game.VN - Website bán nick game uy tín - hàng đầu'),
(2, 'contact', '0773344373'),
(3, 'logo', 'img/1608542020_689454.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shop_footer`
--

CREATE TABLE `shop_footer` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `content` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `shop_footer`
--

INSERT INTO `shop_footer` (`id`, `name`, `content`) VALUES
(1, 'address', 'Ngũ Hành Sơn - Đà Nẵng '),
(3, 'introduce', 'Website bán nick game hàng đầy GIÁ RẺ - UY TÍN - CHẤT LƯỢNG hàng đầu VIỆT NAM. Tin cậy nhanh chóng. Giao dịch tự động 24/24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shop_img_nick`
--

CREATE TABLE `shop_img_nick` (
  `id` int(11) NOT NULL,
  `idinfo` int(11) NOT NULL,
  `img_path` varchar(1256) NOT NULL,
  `img_type` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shop_info_payment`
--

CREATE TABLE `shop_info_payment` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `category` varchar(256) NOT NULL,
  `stk` varchar(11) NOT NULL,
  `branch` varchar(256) NOT NULL,
  `name_bank` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `shop_info_payment`
--

INSERT INTO `shop_info_payment` (`id`, `name`, `category`, `stk`, `branch`, `name_bank`) VALUES
(1, 'Võ Văn Quá', 'atm', '2147483647', 'Quảng Nam', 'Vietcombank'),
(2, 'Võ Văn Quá', 'atm', '2147483647', 'Quảng Nam', 'Vietcombank'),
(3, 'Võ Văn Quá', 'atm', '2147483647', 'Quảng Nam', 'Vietcombank'),
(4, 'Võ Văn Quá', 'atm', '2147483647', 'Quảng Nam', 'Vietcombank'),
(5, 'Võ Văn Quá', 'momo', '0346228281', 'Quảng Nam', 'Momo');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shop_list_game`
--

CREATE TABLE `shop_list_game` (
  `idLG` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `image` mediumtext NOT NULL,
  `url` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `shop_list_game`
--

INSERT INTO `shop_list_game` (`idLG`, `name`, `image`, `url`) VALUES
(2, 'GAME LIÊN MINH', 'img/9yo1Cj2u59_1602239743.gif', 'nick-lien-minh'),
(3, 'GAME FREE FIRE', 'img/vEZyIqI36J_1602239726.gif', 'nick-free-fire'),
(4, 'GAME LIÊN QUÂN', 'img/97lwAXu2zb_1602239712.gif', 'nick-lien-quan'),
(5, 'GAME NGỌC RỒNG', 'img/mKysNqCK9W_1602239760.gif', 'nick-ngoc-rong'),
(6, 'GAME PUBG MOBILE', 'img/FkQEiTFiR5_1602239802.gif', 'nick-pubg-mobile'),
(7, 'GAME ZINGSPEED MOBILE', 'img/XBrNzMKmKk_1602239827.gif', 'nick-zingspeed-mobile'),
(8, 'GAME FO4', 'img/STeYIBtINZ_1602239838.gif', 'nick-fo4'),
(9, 'GAME ĐỘT KÍCH', 'img/U7rte20EoG_1602239872.gif', 'nick-dot-kich'),
(10, 'GAME NINJA SCHOOL', 'img/UxKhianLYP_1602240276.gif', 'nick-ninja-school'),
(11, 'GAME HIỆP SĨ ONLINE', 'img/XjCA6CGq1h_1602240303.gif', 'nick-hiep-si');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shop_list_luckey_wheel`
--

CREATE TABLE `shop_list_luckey_wheel` (
  `idLuckey` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `image` mediumtext NOT NULL,
  `url` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `shop_list_luckey_wheel`
--

INSERT INTO `shop_list_luckey_wheel` (`idLuckey`, `name`, `image`, `url`) VALUES
(1, 'VÒNG QUAY LIÊN MINH V.I.P 200K', 'img/1608991359_996054.gif', '?page=vong-quay-lien-minh-VIP'),
(2, 'VÒNG QUAY MAY MẮN NỔ HŨ 20K', 'img/wTm7CLi8ML_1602317233.gif', '#'),
(3, 'VÒNG QUAY RP CỦA ĐẤNG 17K', 'img/fgkhIjuQe5_1602317252.gif', '#'),
(4, 'VÒNG QUAY LIÊN QUÂN ( SƠ CẤP ) 20K', 'img/0llxp2amnw_1602317387.gif', '#'),
(5, 'VÒNG QUAY LIÊN QUÂN ( CAO CẤP ) 32K', 'img/leTmGfEfub_1602144378.gif', '#');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shop_log_buy`
--

CREATE TABLE `shop_log_buy` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idLG` int(11) NOT NULL,
  `idnick` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `datetime` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `shop_log_buy`
--

INSERT INTO `shop_log_buy` (`id`, `idUser`, `idLG`, `idnick`, `price`, `datetime`) VALUES
(45, 13, 2, 1, 480000, '11/28/2020 16:41:30'),
(46, 13, 2, 2, 630000, '11/28/2020 20:36:02'),
(47, 13, 2, 1, 480000, '11/30/2020 14:45:35'),
(48, 13, 2, 2, 630000, '12/23/2020 15:31:35'),
(49, 13, 2, 1, 480000, '12/23/2020 15:37:59'),
(50, 13, 2, 1, 480000, '12/23/2020 15:39:14'),
(51, 13, 2, 1, 480000, '01/13/2021 17:09:37'),
(52, 13, 2, 1, 480000, '01/13/2021 17:13:18'),
(53, 13, 2, 2, 630000, '01/13/2021 17:27:59'),
(54, 13, 2, 1, 480000, '01/22/2021 20:23:31'),
(55, 13, 2, 1, 480000, '01/24/2021 16:28:00'),
(56, 13, 2, 1, 570000, '01/24/2021 16:34:00'),
(57, 13, 2, 1, 570000, '01/24/2021 16:42:02'),
(58, 13, 2, 1, 60000, '01/24/2021 16:43:03'),
(59, 13, 2, 1, 60000, '01/24/2021 16:44:43'),
(60, 13, 2, 1, 60000, '01/24/2021 16:58:43'),
(61, 13, 2, 1, 570000, '03/03/2021 10:09:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shop_log_payment`
--

CREATE TABLE `shop_log_payment` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `money` int(11) NOT NULL,
  `id_type_payment` int(11) NOT NULL,
  `idcard` varchar(256) NOT NULL,
  `sericard` varchar(256) NOT NULL,
  `datetime` varchar(256) NOT NULL,
  `type_card` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `shop_log_payment`
--

INSERT INTO `shop_log_payment` (`id`, `idUser`, `money`, `id_type_payment`, `idcard`, `sericard`, `datetime`, `type_card`) VALUES
(1, 14, 10000, 1, '999999999', '999999999', '12/18/2020 18:54:41', 0),
(2, 14, 10000, 1, '999999999', '999999999', '12/18/2020 18:55:01', 0),
(3, 14, 10000, 1, '999999999', '999999999', '12/18/2020 19:27:51', 0),
(4, 14, 10000, 1, '999999999', '999999999', '12/18/2020 19:28:00', 0),
(5, 14, 10000, 1, '999999999', '999999999', '12/21/2020 9:27:03', 0),
(6, 14, 50000, 1, '999999999', '999999999', '12/21/2020 9:41:55', 0),
(7, 14, 100000, 3, '999999999', '999999999', '12/21/2020 9:43:23', 0),
(8, 13, 100000, 1, '999999999', '999999999', '12/23/2020 15:40:05', 0),
(9, 13, 9999, 1, '999999999', '999999999', '01/16/2021 8:15:53', 0),
(10, 13, 1111111111, 1, '999999999', '999999999', '01/16/2021 8:16:15', 0),
(11, 13, 2147483647, 2, '999999999', '999999999', '01/16/2021 8:17:01', 0),
(12, 13, 2147483647, 2, '999999999', '999999999', '01/16/2021 8:21:10', 0),
(13, 13, 100000000, 2, '999999999', '999999999', '01/21/2021 10:24:21', 0),
(14, 13, 100000000, 2, '999999999', '999999999', '01/21/2021 10:26:43', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shop_menu`
--

CREATE TABLE `shop_menu` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `parent_id` int(10) NOT NULL,
  `url` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `shop_menu`
--

INSERT INTO `shop_menu` (`id`, `name`, `parent_id`, `url`) VALUES
(1, 'Trang Chủ', 0, 'http://localhost:8080/'),
(2, 'Nạp Tiền', 0, 'nap-tien'),
(3, 'Nick Game', 3, '#'),
(4, 'Vòng Quay May Mắn', 3, '#lucky'),
(5, 'Liên Minh Huyền Thoại', 3, '#'),
(6, 'Đột Kích', 3, '#'),
(7, 'ZingSpeed', 3, '#'),
(8, 'Liên Quân', 3, '#'),
(9, 'PUBG Mobile', 3, '#');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shop_nick_game`
--

CREATE TABLE `shop_nick_game` (
  `id` int(11) NOT NULL,
  `idinfo` int(11) NOT NULL,
  `idLG` int(11) NOT NULL,
  `user` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `shop_nick_game`
--

INSERT INTO `shop_nick_game` (`id`, `idinfo`, `idLG`, `user`, `password`) VALUES
(1, 1, 2, 'test', 'test'),
(2, 2, 2, 'test2', 'test'),
(12, 3, 2, '123', '123'),
(18, 21, 2, '123123', '123213'),
(21, 24, 2, '123123', '123213');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shop_nick_info`
--

CREATE TABLE `shop_nick_info` (
  `id` int(11) NOT NULL,
  `idLG` int(11) NOT NULL,
  `rank` varchar(256) NOT NULL,
  `tuong` varchar(256) NOT NULL,
  `skin` int(11) NOT NULL,
  `trang_thai` int(11) NOT NULL,
  `bang_ngoc` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `note` text NOT NULL,
  `discount` int(11) NOT NULL,
  `img_1` varchar(256) NOT NULL,
  `img_2` varchar(256) NOT NULL,
  `img_3` varchar(256) NOT NULL,
  `img_4` varchar(256) NOT NULL,
  `img_5` varchar(256) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `shop_nick_info`
--

INSERT INTO `shop_nick_info` (`id`, `idLG`, `rank`, `tuong`, `skin`, `trang_thai`, `bang_ngoc`, `rate`, `note`, `discount`, `img_1`, `img_2`, `img_3`, `img_4`, `img_5`, `content`) VALUES
(1, 2, 'Đồng', '136', 110, 1, 9, 600000, '', 5, 'img/aVVIs7R88m_1560913251.jpg', 'img/ORB6J1BQyP_1560913251.jpg', 'img/rOKULGOO2x_1560913251.jpg', 'img/3gWhHqiJKs_1560913252.jpg', '', 'hi'),
(2, 2, 'Bạc', '136', 110, 1, 9, 700000, '', 10, 'img/aVVIs7R88m_1560913251.jpg', 'img/ORB6J1BQyP_1560913251.jpg', 'img/rOKULGOO2x_1560913251.jpg', 'img/3gWhHqiJKs_1560913252.jpg', '', ''),
(3, 2, 'Vàng', '136', 110, 1, 9, 500000, '', 0, 'img/aVVIs7R88m_1560913251.jpg', 'img/ORB6J1BQyP_1560913251.jpg', 'img/rOKULGOO2x_1560913251.jpg', 'img/3gWhHqiJKs_1560913252.jpg', '', ''),
(4, 2, 'Kim Cương', '136', 110, 1, 9, 400000, '', 0, 'img/aVVIs7R88m_1560913251.jpg', 'img/ORB6J1BQyP_1560913251.jpg', 'img/rOKULGOO2x_1560913251.jpg', 'img/3gWhHqiJKs_1560913252.jpg', '', ''),
(5, 2, 'Đồng', '136', 110, 1, 9, 450000, '', 0, 'img/aVVIs7R88m_1560913251.jpg', 'img/ORB6J1BQyP_1560913251.jpg', 'img/rOKULGOO2x_1560913251.jpg', 'img/3gWhHqiJKs_1560913252.jpg', '', ''),
(21, 2, 'Đồng', '12', 12, 1, 12, 5000000, '', 10, 'img/1623815088_303042.jpg', 'img/1623815088_945843.jpg', 'img/1623815088_911915.jpg', 'img/1623815088_753211.jpg', 'img/1623815088_730570.jpg', '<h2>Giới thiệu tổng quan về Ba chỉ bò Úc Kiaora cắt lát 400g.</h2><p>Ba chỉ bò Úc Kiaora cắt lát 400g&nbsp;được chế biến và sản xuất bởi thương hiệu&nbsp;Kiaora&nbsp;- là một thương hiệu thuộc công ty Cổ phần Sản phẩm New Zealand. Với các cổ đông của công ty đa phần là các doanh nhân có nhiều kinh nghiệm trong các lĩnh vực sản xuất, phân phối và bán buôn, bán lẻ các loại thực phẩm được nhập khẩu từ New Zealand.&nbsp;Với định hướng chỉ bán các sản phẩm “Made in New Zealand” – công ty hy vọng sẽ tạo được niềm tin nơi khách hàng trong một thị trường còn thiếu minh bạch về nguồn gốc và chất lượng sản phẩm ở Việt Nam.</p><figure class=\"image image_resized\" style=\"width:17.44%;\"><img src=\"data:image/jpeg;base64,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\"></figure><p><br>&nbsp;</p><p>Ba chỉ bò Úc Kiaora cắt lát 400g&nbsp;là phần thịt được lấy từ phần bụng của con bò, đây là phần thịt với những dải thịt nạc và thịt mỡ xen kẽ nhau tạo nên độ mềm, ngậy, ngọt nhưng hoàn toàn không ngấy. Thịt&nbsp;được cắt lát chuyên nghiệp đảm bảo độ mỏng, mềm và ngọt khi khách hàng sử dụng.</p><p>Ba chỉ bò Úc Kiaora cắt lát 400g&nbsp;thích hợp sử dụng cho các món nướng, BBQ, áp chảo, với độ dày miếng thịt hoàn hảo khi đem nướng ở nhiệt độ 200 độ mặt ngoài vừa đạt chín vàng thì thịt bên trong cũng vừa chín tới, giữ được nước ngọt bên trong khiến miếng thịt thơm ngon, mềm ngọt mà vẫn đượm vị thơm lừng của món bò nướng BBQ.</p><p>Lưu ý:</p><p>- Hạn sử dụng thực tế quý khách vui lòng xem trên bao bì.</p><p>- Hình sản phẩm chỉ mang tính chất minh họa, hình thực tế bao bì của sản phẩm tùy thời điểm sẽ khác so với thực tế.</p><p>&nbsp;</p><figure class=\"image\"><img src=\"http://orgavina.com/Admin/public/img/products/bo,P20vien,P201.jpg.pagespeed.ce.PrlJju7p2T.jpg\"></figure>'),
(24, 2, 'Đồng', '12', 12, 1, 12, 5000000, '', 10, 'img/1623815302_23323.jpg', 'img/1623815302_817546.jpg', 'img/1623815302_259839.jpg', 'img/1623815302_716795.jpg', 'img/1623815302_221599.jpg', '&lt;h2 style=&quot;text-align: center;&quot;&gt;Giới thiệu tổng quan về Ba chỉ b&amp;ograve; &amp;Uacute;c Kiaora cắt l&amp;aacute;t 400g.&lt;/h2&gt;\r\n&lt;p style=&quot;text-align: center;&quot;&gt;Ba chỉ b&amp;ograve; &amp;Uacute;c Kiaora cắt l&amp;aacute;t 400g&amp;nbsp;được chế biến v&amp;agrave; sản xuất bởi thương hiệu&amp;nbsp;Kiaora&amp;nbsp;- l&amp;agrave; một thương hiệu thuộc c&amp;ocirc;ng ty Cổ phần Sản phẩm New Zealand. Với c&amp;aacute;c cổ đ&amp;ocirc;ng của c&amp;ocirc;ng ty đa phần l&amp;agrave; c&amp;aacute;c doanh nh&amp;acirc;n c&amp;oacute; nhiều kinh nghiệm trong c&amp;aacute;c lĩnh vực sản xuất, ph&amp;acirc;n phối v&amp;agrave; b&amp;aacute;n bu&amp;ocirc;n, b&amp;aacute;n lẻ c&amp;aacute;c loại thực phẩm được nhập khẩu từ New Zealand.&amp;nbsp;Với định hướng chỉ b&amp;aacute;n c&amp;aacute;c sản phẩm &amp;ldquo;Made in New Zealand&amp;rdquo; &amp;ndash; c&amp;ocirc;ng ty hy vọng sẽ tạo được niềm tin nơi kh&amp;aacute;ch h&amp;agrave;ng trong một thị trường c&amp;ograve;n thiếu minh bạch về nguồn gốc v&amp;agrave; chất lượng sản phẩm ở Việt Nam.&lt;/p&gt;\r\n&lt;figure class=&quot;image image_resized align-center&quot; style=&quot;width: 17.44%; text-align: center;&quot;&gt;&lt;img src=&quot;data:image/jpeg;base64,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&quot; /&gt;&lt;/figure&gt;\r\n&lt;p style=&quot;text-align: center;&quot;&gt;&lt;br /&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;p style=&quot;text-align: center;&quot;&gt;Ba chỉ b&amp;ograve; &amp;Uacute;c Kiaora cắt l&amp;aacute;t 400g&amp;nbsp;l&amp;agrave; phần thịt được lấy từ phần bụng của con b&amp;ograve;, đ&amp;acirc;y l&amp;agrave; phần thịt với những dải thịt nạc v&amp;agrave; thịt mỡ xen kẽ nhau tạo n&amp;ecirc;n độ mềm, ngậy, ngọt nhưng ho&amp;agrave;n to&amp;agrave;n kh&amp;ocirc;ng ngấy. Thịt&amp;nbsp;được cắt l&amp;aacute;t chuy&amp;ecirc;n nghiệp đảm bảo độ mỏng, mềm v&amp;agrave; ngọt khi kh&amp;aacute;ch h&amp;agrave;ng sử dụng.&lt;/p&gt;\r\n&lt;p style=&quot;text-align: center;&quot;&gt;Ba chỉ b&amp;ograve; &amp;Uacute;c Kiaora cắt l&amp;aacute;t 400g&amp;nbsp;th&amp;iacute;ch hợp sử dụng cho c&amp;aacute;c m&amp;oacute;n nướng, BBQ, &amp;aacute;p chảo, với độ d&amp;agrave;y miếng thịt ho&amp;agrave;n hảo khi đem nướng ở nhiệt độ 200 độ mặt ngo&amp;agrave;i vừa đạt ch&amp;iacute;n v&amp;agrave;ng th&amp;igrave; thịt b&amp;ecirc;n trong cũng vừa ch&amp;iacute;n tới, giữ được nước ngọt b&amp;ecirc;n trong khiến miếng thịt thơm ngon, mềm ngọt m&amp;agrave; vẫn đượm vị thơm lừng của m&amp;oacute;n b&amp;ograve; nướng BBQ.&lt;/p&gt;\r\n&lt;p style=&quot;text-align: center;&quot;&gt;Lưu &amp;yacute;:&lt;/p&gt;\r\n&lt;p style=&quot;text-align: center;&quot;&gt;- Hạn sử dụng thực tế qu&amp;yacute; kh&amp;aacute;ch vui l&amp;ograve;ng xem tr&amp;ecirc;n bao b&amp;igrave;.&lt;/p&gt;\r\n&lt;p style=&quot;text-align: center;&quot;&gt;- H&amp;igrave;nh sản phẩm chỉ mang t&amp;iacute;nh chất minh họa, h&amp;igrave;nh thực tế bao b&amp;igrave; của sản phẩm t&amp;ugrave;y thời điểm sẽ kh&amp;aacute;c so với thực tế.&lt;/p&gt;\r\n&lt;p style=&quot;text-align: center;&quot;&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;figure class=&quot;image&quot; style=&quot;text-align: center;&quot;&gt;&lt;img src=&quot;http://orgavina.com/Admin/public/img/products/bo,P20vien,P201.jpg.pagespeed.ce.PrlJju7p2T.jpg&quot; /&gt;&lt;/figure&gt;');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shop_sale_timer`
--

CREATE TABLE `shop_sale_timer` (
  `id` int(11) NOT NULL,
  `idinfo` int(11) NOT NULL,
  `discount_sale` int(11) NOT NULL,
  `date` date NOT NULL,
  `h` int(50) NOT NULL,
  `m` int(50) NOT NULL,
  `s` int(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `shop_sale_timer`
--

INSERT INTO `shop_sale_timer` (`id`, `idinfo`, `discount_sale`, `date`, `h`, `m`, `s`, `status`) VALUES
(1, 1, 90, '2021-06-21', 17, 4, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shop_type_payment`
--

CREATE TABLE `shop_type_payment` (
  `id` int(11) NOT NULL,
  `type` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `shop_type_payment`
--

INSERT INTO `shop_type_payment` (`id`, `type`) VALUES
(1, 'Card'),
(2, 'ATM'),
(3, 'MOMO');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shop_user`
--

CREATE TABLE `shop_user` (
  `id` int(10) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `sdt` int(10) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `money` decimal(15,2) NOT NULL,
  `status` int(11) NOT NULL,
  `verified` int(11) NOT NULL,
  `verification_code` varchar(256) NOT NULL,
  `oauth_provider` enum('facebook','google','twitter','') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `oauth_token` mediumtext NOT NULL,
  `oauth_name` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `shop_user`
--

INSERT INTO `shop_user` (`id`, `user`, `pass`, `sdt`, `email`, `money`, `status`, `verified`, `verification_code`, `oauth_provider`, `oauth_token`, `oauth_name`) VALUES
(13, 'quapro83', '4633f9e447169279012b24be09f1a31c', 822431739, 'ngatu9x@gmail.com', '2244633647.00', 1, 1, '3By1MUTMLSD3oDdTuY6qZ0RL1ig4GDMkURwwsHoU9A7EASIfcd3CV7KxTAOq0gVRVlzvLvLUWjnr7FLRGxyL8uNx0EXI1c2QQsTdFDh56XYlEcxdH02YpynC', '', '', '');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `shop_admin`
--
ALTER TABLE `shop_admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `shop_category`
--
ALTER TABLE `shop_category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `shop_config`
--
ALTER TABLE `shop_config`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `shop_footer`
--
ALTER TABLE `shop_footer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `shop_img_nick`
--
ALTER TABLE `shop_img_nick`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `shop_info_payment`
--
ALTER TABLE `shop_info_payment`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `shop_list_game`
--
ALTER TABLE `shop_list_game`
  ADD PRIMARY KEY (`idLG`);

--
-- Chỉ mục cho bảng `shop_list_luckey_wheel`
--
ALTER TABLE `shop_list_luckey_wheel`
  ADD PRIMARY KEY (`idLuckey`);

--
-- Chỉ mục cho bảng `shop_log_buy`
--
ALTER TABLE `shop_log_buy`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `shop_log_payment`
--
ALTER TABLE `shop_log_payment`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `shop_menu`
--
ALTER TABLE `shop_menu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `shop_nick_game`
--
ALTER TABLE `shop_nick_game`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `shop_nick_info`
--
ALTER TABLE `shop_nick_info`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `shop_sale_timer`
--
ALTER TABLE `shop_sale_timer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `shop_type_payment`
--
ALTER TABLE `shop_type_payment`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `shop_user`
--
ALTER TABLE `shop_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `shop_admin`
--
ALTER TABLE `shop_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `shop_category`
--
ALTER TABLE `shop_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `shop_config`
--
ALTER TABLE `shop_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `shop_footer`
--
ALTER TABLE `shop_footer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `shop_img_nick`
--
ALTER TABLE `shop_img_nick`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `shop_info_payment`
--
ALTER TABLE `shop_info_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `shop_list_game`
--
ALTER TABLE `shop_list_game`
  MODIFY `idLG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT cho bảng `shop_list_luckey_wheel`
--
ALTER TABLE `shop_list_luckey_wheel`
  MODIFY `idLuckey` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `shop_log_buy`
--
ALTER TABLE `shop_log_buy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT cho bảng `shop_log_payment`
--
ALTER TABLE `shop_log_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `shop_menu`
--
ALTER TABLE `shop_menu`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `shop_nick_game`
--
ALTER TABLE `shop_nick_game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `shop_nick_info`
--
ALTER TABLE `shop_nick_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `shop_sale_timer`
--
ALTER TABLE `shop_sale_timer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `shop_user`
--
ALTER TABLE `shop_user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
