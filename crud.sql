-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 15, 2020 lúc 10:32 PM
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
-- Cơ sở dữ liệu: `crud`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `crud`
--

CREATE TABLE `crud` (
  `id` int(11) NOT NULL,
  `ten_gv` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `ngaysinh_gv` date NOT NULL,
  `lop_day` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `mon_day` text COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `crud`
--

INSERT INTO `crud` (`id`, `ten_gv`, `ngaysinh_gv`, `lop_day`, `mon_day`) VALUES
(3, 'Phạm Anh Tuấn', '2001-04-04', '5', 'Vật Lý'),
(5, 'Trường Đẹp Zai', '1995-02-02', '2', 'Hóa'),
(6, 'Nguyễn Đức Long', '1997-12-23', '3', 'Âm Nhạc'),
(7, 'Phạm Phương Hoa', '2000-02-02', '4', 'Văn'),
(8, 'Phường Thị Phếnh', '3123-03-22', '2', 'Lịch Sử'),
(9, 'Lò Căn Có', '2020-02-16', '123', 'Lú'),
(10, 'Phường Thị Phếnh', '2020-02-13', '123', 'Lịch Sử'),
(11, 'Phạm Anh Tuấn', '2001-02-02', '4', 'Thể Dục'),
(12, 'Bùi Tiến Xuân', '2020-02-23', '2', 'Anh'),
(13, 'Bùi Toàn Long', '2020-02-22', '6', 'Lịch Sử'),
(14, 'Bùi Toàn Thắng', '2020-02-22', '6', 'Lịch Sử'),
(15, 'Phường Thị Phếnh', '2020-02-14', '123', 'Toán'),
(26, 'Châu Việt Cường', '2020-02-14', '6', 'Sinh Học'),
(27, 'Bùi Anh Tuấn', '2020-02-14', '11', 'Sinh Học'),
(28, 'Mạc Văn Khoa', '2020-02-21', '123', 'Hài'),
(29, 'Bùi Anh Tuấn', '2020-02-09', '123', 'Sinh Học'),
(30, 'Phường Thị Phếnh', '2020-02-14', '22', 'Sinh Học'),
(31, 'Bùi Anh Tuấn', '2020-02-16', '22', 'Âm Nhạc'),
(32, 'Mạc Văn Khoa', '2020-02-08', '123', 'Sinh Học'),
(33, 'Châu Việt Cường', '2020-02-15', '22', 'Sinh Học');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diem`
--

CREATE TABLE `diem` (
  `id` int(11) NOT NULL,
  `ten_hs` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `lop_hoc` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `mon_hoc` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `mieng` int(11) NOT NULL,
  `muoi_nam_phut` int(11) NOT NULL,
  `mot_tiet` int(11) NOT NULL,
  `hoc_ki` int(11) NOT NULL,
  `ten_gv` text COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `diem`
--

INSERT INTO `diem` (`id`, `ten_hs`, `lop_hoc`, `mon_hoc`, `mieng`, `muoi_nam_phut`, `mot_tiet`, `hoc_ki`, `ten_gv`) VALUES
(0, 'Bùi Anh Trường', '10', 'Toán', 10, 10, 10, 10, 'Ngô Bảo Châu');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hocsinh`
--

CREATE TABLE `hocsinh` (
  `id` int(11) NOT NULL,
  `ten_hs` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `ngaysinh_hs` date NOT NULL,
  `hoc_lop` varchar(11) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `gv_day` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `hocsinh`
--

INSERT INTO `hocsinh` (`id`, `ten_hs`, `ngaysinh_hs`, `hoc_lop`, `gv_day`) VALUES
(1, 'Bùi Anh Trường', '2020-02-08', '12', 'Lê Thẩm Dương'),
(2, 'Phạm Anh Tuấn', '2020-02-09', '11', 'Nguyễn Hữu Hoàng Tùng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lop_hoc`
--

CREATE TABLE `lop_hoc` (
  `id` int(11) NOT NULL,
  `ten_lop` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `si_so` int(11) NOT NULL,
  `lop_truong` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `gv_day` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `lop_hoc`
--

INSERT INTO `lop_hoc` (`id`, `ten_lop`, `si_so`, `lop_truong`, `gv_day`) VALUES
(1, '12', 34, 'Bùi Anh Trường', 'Lê Thẩm Dương'),
(2, '11', 33, 'Bùi Anh Trường', 'Nguyễn Hữu Hoàng Tùng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `monhoc`
--

CREATE TABLE `monhoc` (
  `id` int(11) NOT NULL,
  `ten_mh` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `lop_hoc` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `tiet_day` int(11) NOT NULL,
  `gv_day` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `monhoc`
--

INSERT INTO `monhoc` (`id`, `ten_mh`, `lop_hoc`, `tiet_day`, `gv_day`) VALUES
(1, 'Hóa', '3', 45, 'Lê Thẩm Dương');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `crud`
--
ALTER TABLE `crud`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hocsinh`
--
ALTER TABLE `hocsinh`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `lop_hoc`
--
ALTER TABLE `lop_hoc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `monhoc`
--
ALTER TABLE `monhoc`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `crud`
--
ALTER TABLE `crud`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `hocsinh`
--
ALTER TABLE `hocsinh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `lop_hoc`
--
ALTER TABLE `lop_hoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `monhoc`
--
ALTER TABLE `monhoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
