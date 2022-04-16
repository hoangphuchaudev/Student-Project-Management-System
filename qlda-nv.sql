-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 29, 2021 lúc 05:42 PM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlda-nv`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dangkidetai`
--

CREATE TABLE `dangkidetai` (
  `MaDK` int(11) NOT NULL,
  `MaDT` int(11) NOT NULL,
  `MaSV` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dangkidetai`
--

INSERT INTO `dangkidetai` (`MaDK`, `MaDT`, `MaSV`) VALUES
(51, 3, 17004061),
(64, 4, 17004062),
(79, 1, 17004060),
(81, 4, 17004064);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dangkidoan`
--

CREATE TABLE `dangkidoan` (
  `Ma_` int(11) NOT NULL,
  `MaDA` int(11) NOT NULL,
  `MaSV` int(11) NOT NULL,
  `MaHK` int(11) NOT NULL,
  `MaGV` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dangkidoan`
--

INSERT INTO `dangkidoan` (`Ma_`, `MaDA`, `MaSV`, `MaHK`, `MaGV`) VALUES
(20, 1, 17004062, 5, 4),
(31, 1, 17004064, 5, 4),
(32, 1, 17004060, 5, 4),
(33, 2, 17004060, 5, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhsachgv`
--

CREATE TABLE `danhsachgv` (
  `id` int(11) NOT NULL,
  `MaGV` int(11) NOT NULL,
  `MaHK` int(11) NOT NULL,
  `MaDA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `detai`
--

CREATE TABLE `detai` (
  `MaDT` int(11) NOT NULL,
  `TenDT` text COLLATE utf8_unicode_ci NOT NULL,
  `SoluongSV` int(11) NOT NULL,
  `MaLVNC` int(11) NOT NULL,
  `MaDA` int(11) NOT NULL,
  `MaHK` int(11) NOT NULL,
  `MaGV` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `detai`
--

INSERT INTO `detai` (`MaDT`, `TenDT`, `SoluongSV`, `MaLVNC`, `MaDA`, `MaHK`, `MaGV`) VALUES
(1, 'Quản lý quá trình thực hiện đồ án của sinh viên khoa CNTT\r\n', 2, 3, 1, 5, 4),
(2, 'Xây dựng Hệ thống trực tuyến Quản lý ký túc xá Đại học SPKT Vĩnh Long', 2, 2, 2, 5, 4),
(3, 'Xây dựng Hệ thống trực tuyến quản lý đăng ký thời khóa biểu thực hành dành cho sinh viên khoa CNTT - VLUTE', 1, 2, 2, 5, 4),
(4, 'Xây dựng Hệ thống trực tuyến Quản lý nhật ký hoạt động các phòng thực hành\r\nchuyên môn khoa Công nghệ thông tin - VLUTE', 10, 1, 1, 5, 4),
(5, 'Xây dựng Hệ thống trực tuyến Quản lý sinh viên trong công tác quản sinh', 2, 3, 3, 5, 1),
(100, 'defaut', 2, 1, 3, 2, 1),
(102, 'tìm hiểu Corel x6', 2, 1, 3, 2, 4),
(103, 'Tìm hiểu Photoshop CS6', 1, 1, 1, 2, 4),
(107, 'Đồ án 2 học kỳ hiện tại', 5, 1, 2, 5, 1),
(108, 'Đồ án 2 học kỳ hiện tại', 5, 1, 2, 5, 1),
(109, 'Đồ án 2 học kỳ hiện tại A', 5, 1, 2, 5, 1),
(110, 'Đồ án 2 học kỳ hiện tại B', 5, 1, 2, 5, 1),
(111, 'Đồ án 2 học kỳ hiện tại C', 5, 1, 2, 5, 1),
(112, 'Đồ án I học kỳ hiện tại', 5, 1, 1, 5, 2),
(113, 'Đồ án I học kỳ hiện tại A', 5, 1, 1, 5, 2),
(114, 'Đồ án I học kỳ hiện tại B', 5, 1, 1, 5, 2),
(115, 'Đồ án I học kỳ hiện tại C', 5, 1, 1, 5, 2),
(116, 'Đồ án 3 học kỳ hiện tại', 5, 1, 3, 5, 2),
(117, 'Đồ án 3 học kỳ hiện tại A', 5, 1, 3, 5, 2),
(118, 'Đồ án 3 học kỳ hiện tại B', 5, 1, 3, 5, 2),
(119, 'Đồ án 3 học kỳ hiện tại C', 5, 1, 3, 5, 2),
(129, 'Đề tài đề xuất BC', 2, 1, 1, 5, 4),
(130, 'Đề tài đề xuất', 90, 1, 1, 5, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dexuatdetai`
--

CREATE TABLE `dexuatdetai` (
  `id` int(10) NOT NULL,
  `TenDT` text COLLATE utf8_unicode_ci NOT NULL,
  `MaLVNC` int(11) NOT NULL,
  `MaDA` int(11) NOT NULL,
  `MaHK` int(11) NOT NULL,
  `MaGV` int(11) NOT NULL,
  `SoluongSV` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dexuatdetai`
--

INSERT INTO `dexuatdetai` (`id`, `TenDT`, `MaLVNC`, `MaDA`, `MaHK`, `MaGV`, `SoluongSV`) VALUES
(5, 'saadasd', 2, 1, 5, 2, 3),
(8, 'sdadaasd', 1, 1, 5, 4, 2),
(9, 'Đề tài đề xuất B', 2, 1, 5, 4, 20),
(11, 'dfasdasd', 1, 1, 5, 4, 90);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diem`
--

CREATE TABLE `diem` (
  `MaD` int(11) NOT NULL,
  `Diem` float NOT NULL,
  `MaSV` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `diem`
--

INSERT INTO `diem` (`MaD`, `Diem`, `MaSV`) VALUES
(1, 10, 17004060),
(2, 2.5, 17004062);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `doan`
--

CREATE TABLE `doan` (
  `MaDA` int(11) NOT NULL,
  `TenDA` text COLLATE utf8_unicode_ci NOT NULL,
  `LoaiDA` int(11) NOT NULL,
  `Mota` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `doan`
--

INSERT INTO `doan` (`MaDA`, `TenDA`, `LoaiDA`, `Mota`) VALUES
(1, 'Đồ án CNTT1', 1, 'Các chủ đề liên quan đến tìm hiểu các mô hình các công nghệ, dịch thuật, triễn khai các module cơ bản\r\n '),
(2, 'Đồ án CNTT2', 2, 'Lập trình ứng dụng thiết bị di động, lập trình website, triển khai hệ thống mạng, nghiên cứu ứng dụng thuật toán có liên quan đến khoa học máy tính như SVM, LSTM, RNN,...   '),
(3, 'Luận văn', 3, 'Nghiên cứu khoa học máy tính, nghiên cứu về công nghệ mới hiện nay và ứng dụng, triễn khai hệ thống vào công tác học tập của khoa\r\n');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gvhd`
--

CREATE TABLE `gvhd` (
  `MaGV` int(11) NOT NULL,
  `HotenGV` text COLLATE utf8_unicode_ci NOT NULL,
  `SdtGV` int(11) NOT NULL,
  `Email` text COLLATE utf8_unicode_ci NOT NULL,
  `Hocvi` text COLLATE utf8_unicode_ci NOT NULL,
  `Chuyenmon` text COLLATE utf8_unicode_ci NOT NULL,
  `MaUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `gvhd`
--

INSERT INTO `gvhd` (`MaGV`, `HotenGV`, `SdtGV`, `Email`, `Hocvi`, `Chuyenmon`, `MaUS`) VALUES
(1, 'Trần Hồ Đạt', 123456789, 'datth@vlute.edu.vn', 'Thạc sĩ', 'Mạng máy tính', 8),
(2, 'Lê Hoàng An', 123456789, 'anlh@vlute.edu.vn', 'Thạc sĩ', 'Mạng máy tính', 6),
(3, 'Trần Thái Bảo', 123456789, 'baott@vlute.edu.vn', 'Thạc sĩ', 'Mạng máy tính', 7),
(4, 'Nguyễn Ngọc Nga', 123456789, 'ngannn@vlute.edu.vn', 'Thạc sĩ', 'Công nghệ phần mềm', 9);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hocky`
--

CREATE TABLE `hocky` (
  `MaHK` int(11) NOT NULL,
  `TenHK` text COLLATE utf8_unicode_ci NOT NULL,
  `NienkhoaHK` text COLLATE utf8_unicode_ci NOT NULL,
  `ThoigianBDHK` date NOT NULL,
  `ThoigianKTHK` date NOT NULL,
  `Tuanhoc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hocky`
--

INSERT INTO `hocky` (`MaHK`, `TenHK`, `NienkhoaHK`, `ThoigianBDHK`, `ThoigianKTHK`, `Tuanhoc`) VALUES
(2, 'Học kỳ II', '2020 - 2021', '2020-08-24', '2020-12-25', 35),
(3, 'Học kỳ II', '2019 - 2020', '2020-03-09', '2020-05-23', 11),
(4, 'Học kỳ III', '2019 - 2020', '2019-09-02', '2019-12-14', 36),
(5, 'Học kỳ II', '2020 - 2021', '2021-03-15', '2021-06-30', 12);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kehoachthuchien`
--

CREATE TABLE `kehoachthuchien` (
  `MaKHTH` int(11) NOT NULL,
  `MaDT` int(11) NOT NULL,
  `Noidungthuchien` text COLLATE utf8_unicode_ci NOT NULL,
  `NgayBD` date NOT NULL,
  `NgayKT` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `kehoachthuchien`
--

INSERT INTO `kehoachthuchien` (`MaKHTH`, `MaDT`, `Noidungthuchien`, `NgayBD`, `NgayKT`) VALUES
(2, 1, '- Xếp lịch báo cáo/bảo vệ', '2021-06-29', '2021-06-30'),
(5, 1, '- Tìm hiểu khảo sát hệ thống\r\n- Phân tích các yêu cầu của đề tài\r\n- Thu thập các thông tin có liên quan\r\n', '2021-04-02', '2021-04-28'),
(6, 1, '- Các kiến thức cần có để phục vụ\r\nnghiên cứu đề tài\r\n- Phân tích thiết kế hệ thống', '2021-04-29', '2021-05-06'),
(19, 1, 'hoàn chỉnh mô hình', '2021-05-07', '2021-05-14'),
(20, 1, '', '2021-04-13', '2021-04-14'),
(21, 1, '<p>sd</p>\r\n', '2021-05-29', '2021-05-30'),
(22, 4, '<p>sds</p>\r\n', '2021-06-02', '2021-06-04'),
(23, 1, '', '2021-06-03', '2021-06-05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichbaocao`
--

CREATE TABLE `lichbaocao` (
  `MaLBC` int(11) NOT NULL,
  `NoidungLBC` text COLLATE utf8_unicode_ci NOT NULL,
  `NgayBC` date NOT NULL,
  `MaPhong` int(11) NOT NULL,
  `MaDT` int(11) NOT NULL,
  `MaGV` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lichbaocao`
--

INSERT INTO `lichbaocao` (`MaLBC`, `NoidungLBC`, `NgayBC`, `MaPhong`, `MaDT`, `MaGV`) VALUES
(3, 'Gặp gỡ trao đổi', '2021-06-04', 5, 1, 1),
(4, 'Báo cáo tiến độ', '2021-04-16', 1, 4, 1),
(5, 'Báo cáo khảo sát KTX', '2021-04-16', 4, 2, 1),
(7, 'Báo cáo tiến độ', '2021-06-29', 1, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `linhvucnghiencuu`
--

CREATE TABLE `linhvucnghiencuu` (
  `MaLVNC` int(11) NOT NULL,
  `TenLVNC` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `linhvucnghiencuu`
--

INSERT INTO `linhvucnghiencuu` (`MaLVNC`, `TenLVNC`) VALUES
(1, 'Công nghệ phần mềm'),
(2, 'Mạng máy tính'),
(3, 'Cơ sở ngành');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lop`
--

CREATE TABLE `lop` (
  `Malop` int(11) NOT NULL,
  `Tenlop` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lop`
--

INSERT INTO `lop` (`Malop`, `Tenlop`) VALUES
(1, 'CNTT2017 - 1CTT17A1'),
(2, 'CNTT2017 - 1CTT17A2'),
(3, 'CNTT2018 - 1CTT18A1'),
(4, 'CNTT2018 - 1CTT18A2');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2021_04_15_101459_create_admin_table', 1),
(4, '2021_05_03_143517_create_users_table', 2),
(5, '2021_05_03_161820_create_users_table', 3),
(6, '2021_05_03_181219_create_users_table', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phong`
--

CREATE TABLE `phong` (
  `maphong` int(11) NOT NULL,
  `tenphong` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phong`
--

INSERT INTO `phong` (`maphong`, `tenphong`) VALUES
(1, 'C0602'),
(2, 'C0603'),
(3, 'C0604'),
(4, 'C0605'),
(5, 'C0606');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `MaSP` int(11) NOT NULL,
  `Sanpham` text COLLATE utf8_unicode_ci NOT NULL,
  `TenSP` text COLLATE utf8_unicode_ci NOT NULL,
  `MaKHTH` int(11) NOT NULL,
  `MotaSP` text COLLATE utf8_unicode_ci NOT NULL,
  `Danhgia` int(11) NOT NULL,
  `Chuthich` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`MaSP`, `Sanpham`, `TenSP`, `MaKHTH`, `MotaSP`, `Danhgia`, `Chuthich`) VALUES
(43, '2018 embc tahmina.pdf', '2018_embc_tahminapdf', 2, '', 0, ''),
(44, 'Bài-Tập.pdf', 'bai-tappdf', 23, '', 0, ''),
(46, 'tailieuxanh_tr_30082016_tieu_luan_ppdh_1459.pdf', 'tailieuxanhtr30082016tieuluanppdh1459pdf', 5, '', 0, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sinhvien`
--

CREATE TABLE `sinhvien` (
  `MaSV` int(11) NOT NULL,
  `HotenSV` text COLLATE utf8_unicode_ci NOT NULL,
  `Malop` int(11) NOT NULL,
  `Khoahoc` text COLLATE utf8_unicode_ci NOT NULL,
  `SdtSV` int(11) NOT NULL,
  `EmailSV` text COLLATE utf8_unicode_ci NOT NULL,
  `MaUS` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sinhvien`
--

INSERT INTO `sinhvien` (`MaSV`, `HotenSV`, `Malop`, `Khoahoc`, `SdtSV`, `EmailSV`, `MaUS`) VALUES
(17004060, 'Hoàng Phúc Hậu', 1, '42', 778183202, '17004060@student.vlute.edu.vn', 1),
(17004061, 'Tạ Thanh Binh', 1, '42', 123456789, '17004015@student.vlute.edu.vn', 2),
(17004062, 'Huỳnh Thị Bé Diệu', 1, '42', 123456789, '17004031@student.vlute.edu.vn', 3),
(17004063, 'Nguyễn Thành Đông', 1, '42', 123456789, '17004033@student.vlute.edu.vn', 4),
(17004064, 'Lâm Khả Hân', 1, '42', 123456789, '17004055@student.vlute.edu.vn', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tailieuthamkhao`
--

CREATE TABLE `tailieuthamkhao` (
  `MaTL` int(11) NOT NULL,
  `TenTL` text COLLATE utf8_unicode_ci NOT NULL,
  `FileTL` text COLLATE utf8_unicode_ci NOT NULL,
  `MaDT` int(11) NOT NULL,
  `MaGV` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tailieuthamkhao`
--

INSERT INTO `tailieuthamkhao` (`MaTL`, `TenTL`, `FileTL`, `MaDT`, `MaGV`) VALUES
(14, 'tailieu', 'tailieu1.pdf', 1, 4),
(15, 'xử lý ảnh', 'XLA Lecture.pdf', 1, 4),
(16, 'rnu linux', 'ls.pdf', 1, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `MaUS` int(10) NOT NULL,
  `Email` text COLLATE utf8_unicode_ci NOT NULL,
  `LoaiUS` int(11) NOT NULL,
  `Matkhau` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`MaUS`, `Email`, `LoaiUS`, `Matkhau`) VALUES
(1, 'hau@gmail.com', 2, 'dcf9bc63a140e745d10a28e5b3557423'),
(2, '17004015@student.vlute.edu.vn', 2, 'e10adc3949ba59abbe56e057f20f883e'),
(3, '17004031@student.vlute.edu.vn', 2, '123456'),
(4, '17004033@student.vlute.edu.vn', 2, '202cb962ac59075b964b07152d234b70'),
(5, '17004055@student.vlute.edu.vn', 2, 'e10adc3949ba59abbe56e057f20f883e'),
(6, 'anlh@vlute.edu.vn', 1, '202cb962ac59075b964b07152d234b70'),
(7, 'baott@vlute.edu.vn', 1, '202cb962ac59075b964b07152d234b70'),
(8, 'datth@vlute.edu.vn', 1, '202cb962ac59075b964b07152d234b70'),
(9, 'ngann@vlute.edu.vn', 1, 'e10adc3949ba59abbe56e057f20f883e'),
(12, 'dauphainguoitot@gmail.com', 1, 'dcf9bc63a140e745d10a28e5b3557423');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `dangkidetai`
--
ALTER TABLE `dangkidetai`
  ADD PRIMARY KEY (`MaDK`),
  ADD KEY `fk_dtT` (`MaDT`),
  ADD KEY `fk_SVv` (`MaSV`);

--
-- Chỉ mục cho bảng `dangkidoan`
--
ALTER TABLE `dangkidoan`
  ADD PRIMARY KEY (`Ma_`),
  ADD KEY `fk_DA11` (`MaDA`),
  ADD KEY `fk_SV11` (`MaSV`),
  ADD KEY `fk_HK11` (`MaHK`),
  ADD KEY `fk_GV11` (`MaGV`);

--
-- Chỉ mục cho bảng `danhsachgv`
--
ALTER TABLE `danhsachgv`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_MaGV` (`MaGV`),
  ADD KEY `fk_MaHK2` (`MaHK`),
  ADD KEY `fk_MaDA` (`MaDA`);

--
-- Chỉ mục cho bảng `detai`
--
ALTER TABLE `detai`
  ADD PRIMARY KEY (`MaDT`),
  ADD KEY `fk_LVNC` (`MaLVNC`),
  ADD KEY `fk_DA2` (`MaDA`),
  ADD KEY `fk_HK` (`MaHK`),
  ADD KEY `fk_GVHD12` (`MaGV`);

--
-- Chỉ mục cho bảng `dexuatdetai`
--
ALTER TABLE `dexuatdetai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dk_MaLVNC2` (`MaLVNC`),
  ADD KEY `fk_MaDA12` (`MaDA`),
  ADD KEY `fk_HK12` (`MaHK`),
  ADD KEY `fk_MaGV12` (`MaGV`);

--
-- Chỉ mục cho bảng `diem`
--
ALTER TABLE `diem`
  ADD PRIMARY KEY (`MaD`),
  ADD KEY `FK_MaSV` (`MaSV`);

--
-- Chỉ mục cho bảng `doan`
--
ALTER TABLE `doan`
  ADD PRIMARY KEY (`MaDA`);

--
-- Chỉ mục cho bảng `gvhd`
--
ALTER TABLE `gvhd`
  ADD PRIMARY KEY (`MaGV`),
  ADD KEY `fk_US2` (`MaUS`);

--
-- Chỉ mục cho bảng `hocky`
--
ALTER TABLE `hocky`
  ADD PRIMARY KEY (`MaHK`);

--
-- Chỉ mục cho bảng `kehoachthuchien`
--
ALTER TABLE `kehoachthuchien`
  ADD PRIMARY KEY (`MaKHTH`),
  ADD KEY `fk_DT3` (`MaDT`);

--
-- Chỉ mục cho bảng `lichbaocao`
--
ALTER TABLE `lichbaocao`
  ADD PRIMARY KEY (`MaLBC`),
  ADD KEY `fk_Phong` (`MaPhong`),
  ADD KEY `fk_DT5` (`MaDT`),
  ADD KEY `fk_GV3` (`MaGV`);

--
-- Chỉ mục cho bảng `linhvucnghiencuu`
--
ALTER TABLE `linhvucnghiencuu`
  ADD PRIMARY KEY (`MaLVNC`);

--
-- Chỉ mục cho bảng `lop`
--
ALTER TABLE `lop`
  ADD PRIMARY KEY (`Malop`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `phong`
--
ALTER TABLE `phong`
  ADD PRIMARY KEY (`maphong`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MaSP`),
  ADD KEY `fk_KHTH` (`MaKHTH`);

--
-- Chỉ mục cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD PRIMARY KEY (`MaSV`),
  ADD KEY `fk_malop` (`Malop`),
  ADD KEY `fk_US2a` (`MaUS`);

--
-- Chỉ mục cho bảng `tailieuthamkhao`
--
ALTER TABLE `tailieuthamkhao`
  ADD PRIMARY KEY (`MaTL`),
  ADD KEY `fk_TL3` (`MaDT`),
  ADD KEY `fk_GV4` (`MaGV`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`MaUS`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `dangkidetai`
--
ALTER TABLE `dangkidetai`
  MODIFY `MaDK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT cho bảng `dangkidoan`
--
ALTER TABLE `dangkidoan`
  MODIFY `Ma_` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `danhsachgv`
--
ALTER TABLE `danhsachgv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `detai`
--
ALTER TABLE `detai`
  MODIFY `MaDT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT cho bảng `dexuatdetai`
--
ALTER TABLE `dexuatdetai`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `diem`
--
ALTER TABLE `diem`
  MODIFY `MaD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `doan`
--
ALTER TABLE `doan`
  MODIFY `MaDA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `gvhd`
--
ALTER TABLE `gvhd`
  MODIFY `MaGV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `hocky`
--
ALTER TABLE `hocky`
  MODIFY `MaHK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT cho bảng `kehoachthuchien`
--
ALTER TABLE `kehoachthuchien`
  MODIFY `MaKHTH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `lichbaocao`
--
ALTER TABLE `lichbaocao`
  MODIFY `MaLBC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `linhvucnghiencuu`
--
ALTER TABLE `linhvucnghiencuu`
  MODIFY `MaLVNC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `lop`
--
ALTER TABLE `lop`
  MODIFY `Malop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `phong`
--
ALTER TABLE `phong`
  MODIFY `maphong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `MaSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  MODIFY `MaSV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17004069;

--
-- AUTO_INCREMENT cho bảng `tailieuthamkhao`
--
ALTER TABLE `tailieuthamkhao`
  MODIFY `MaTL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `MaUS` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `dangkidetai`
--
ALTER TABLE `dangkidetai`
  ADD CONSTRAINT `fk_SVv` FOREIGN KEY (`MaSV`) REFERENCES `sinhvien` (`MaSV`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_dtT` FOREIGN KEY (`MaDT`) REFERENCES `detai` (`MaDT`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `dangkidoan`
--
ALTER TABLE `dangkidoan`
  ADD CONSTRAINT `fk_DA11` FOREIGN KEY (`MaDA`) REFERENCES `doan` (`MaDA`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_GV11` FOREIGN KEY (`MaGV`) REFERENCES `gvhd` (`MaGV`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_HK11` FOREIGN KEY (`MaHK`) REFERENCES `hocky` (`MaHK`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_SV11` FOREIGN KEY (`MaSV`) REFERENCES `sinhvien` (`MaSV`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `danhsachgv`
--
ALTER TABLE `danhsachgv`
  ADD CONSTRAINT `fk_MaDA` FOREIGN KEY (`MaDA`) REFERENCES `doan` (`MaDA`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_MaGV` FOREIGN KEY (`MaGV`) REFERENCES `gvhd` (`MaGV`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_MaHK2` FOREIGN KEY (`MaHK`) REFERENCES `hocky` (`MaHK`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `detai`
--
ALTER TABLE `detai`
  ADD CONSTRAINT `fk_DA2` FOREIGN KEY (`MaDA`) REFERENCES `doan` (`MaDA`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_GVHD12` FOREIGN KEY (`MaGV`) REFERENCES `gvhd` (`MaGV`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_HK` FOREIGN KEY (`MaHK`) REFERENCES `hocky` (`MaHK`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_LVNC` FOREIGN KEY (`MaLVNC`) REFERENCES `linhvucnghiencuu` (`MaLVNC`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `dexuatdetai`
--
ALTER TABLE `dexuatdetai`
  ADD CONSTRAINT `dk_MaLVNC2` FOREIGN KEY (`MaLVNC`) REFERENCES `linhvucnghiencuu` (`MaLVNC`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_HK12` FOREIGN KEY (`MaHK`) REFERENCES `hocky` (`MaHK`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_MaDA12` FOREIGN KEY (`MaDA`) REFERENCES `doan` (`MaDA`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_MaGV12` FOREIGN KEY (`MaGV`) REFERENCES `gvhd` (`MaGV`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `diem`
--
ALTER TABLE `diem`
  ADD CONSTRAINT `FK_MaSV` FOREIGN KEY (`MaSV`) REFERENCES `sinhvien` (`MaSV`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `gvhd`
--
ALTER TABLE `gvhd`
  ADD CONSTRAINT `fk_US2` FOREIGN KEY (`MaUS`) REFERENCES `user` (`MaUS`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `kehoachthuchien`
--
ALTER TABLE `kehoachthuchien`
  ADD CONSTRAINT `fk_DT3` FOREIGN KEY (`MaDT`) REFERENCES `detai` (`MaDT`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `lichbaocao`
--
ALTER TABLE `lichbaocao`
  ADD CONSTRAINT `fk_DT5` FOREIGN KEY (`MaDT`) REFERENCES `detai` (`MaDT`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_GV3` FOREIGN KEY (`MaGV`) REFERENCES `gvhd` (`MaGV`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Phong` FOREIGN KEY (`MaPhong`) REFERENCES `phong` (`maphong`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `fk_KHTH` FOREIGN KEY (`MaKHTH`) REFERENCES `kehoachthuchien` (`MaKHTH`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD CONSTRAINT `fk_US2a` FOREIGN KEY (`MaUS`) REFERENCES `user` (`MaUS`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_malop` FOREIGN KEY (`Malop`) REFERENCES `lop` (`Malop`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tailieuthamkhao`
--
ALTER TABLE `tailieuthamkhao`
  ADD CONSTRAINT `fk_GV4` FOREIGN KEY (`MaGV`) REFERENCES `gvhd` (`MaGV`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_TL3` FOREIGN KEY (`MaDT`) REFERENCES `detai` (`MaDT`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
