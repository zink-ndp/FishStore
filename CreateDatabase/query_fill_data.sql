-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 08, 2023 lúc 11:41 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shop_db`
--

--
-- Đang đổ dữ liệu cho bảng `chitiet_hd`
--

INSERT INTO `chitiet_hd` (`SP_ID`, `HD_ID`, `SP_SOLUONG`) VALUES
(1, 1, 2),
(2, 1, 1),
(1, 2, 2),
(2, 2, 2),
(4, 3, 1),
(5, 3, 1),
(7, 3, 1),
(4, 4, 1),
(5, 4, 1),
(7, 4, 1),
(4, 5, 1),
(5, 5, 1),
(7, 5, 1),
(1, 6, 2),
(3, 6, 1),
(1, 7, 2),
(3, 7, 1),
(2, 7, 2),
(1, 8, 2),
(2, 8, 1),
(3, 8, 3),
(1, 9, 1),
(4, 9, 2),
(6, 9, 3),
(7, 10, 9),
(1, 11, 1),
(2, 11, 2),
(3, 11, 1),
(2, 12, 1),
(3, 12, 2),
(4, 13, 1),
(5, 13, 1),
(6, 13, 3),
(6, 14, 2),
(7, 14, 1),
(1, 15, 1),
(6, 15, 2),
(6, 16, 1),
(1, 16, 1),
(7, 16, 1),
(4, 17, 1),
(5, 17, 2),
(6, 17, 2),
(1, 18, 1),
(2, 18, 1),
(3, 18, 1),
(6, 18, 1),
(1, 19, 3),
(4, 19, 1),
(6, 20, 2),
(1, 21, 2),
(7, 21, 1),
(5, 22, 1),
(6, 22, 4),
(1, 23, 2),
(2, 23, 3),
(4, 23, 1),
(1, 24, 1),
(3, 24, 4),
(5, 24, 2),
(2, 25, 5),
(4, 25, 2),
(6, 26, 10),
(7, 26, 5),
(2, 27, 2),
(3, 27, 3),
(4, 27, 4),
(5, 28, 1),
(6, 29, 4),
(1, 30, 2),
(3, 30, 1),
(5, 30, 3),
(7, 31, 2),
(1, 32, 1),
(2, 32, 2),
(5, 32, 3),
(1, 33, 2),
(2, 33, 1),
(4, 34, 1),
(5, 34, 1),
(7, 34, 1),
(1, 35, 1),
(2, 35, 2),
(3, 35, 1);
--
-- Đang đổ dữ liệu cho bảng `chitiet_nhap`
--

INSERT INTO `chitiet_nhap` (`SP_ID`, `NH_ID`, `NV_ID`, `NH_NGAYNHAP`, `SP_SOLUONG`) VALUES
(1, 1, 1, '2023-03-13', 20),
(2, 2, 1, '2023-03-19', 50),
(3, 2, 1, '2023-03-19', 15),
(4, 3, 1, '2023-03-16', 4),
(5, 1, 1, '2023-03-19', 11),
(6, 1, 1, '2023-03-19', 14),
(7, 3, 1, '2023-03-19', 50),
(8, 1, 1, '2023-04-19', 20),
(9, 1, 1, '2023-04-23', 40),
(10, 2, 1, '2023-04-23', 10),
(11, 3, 1, '2023-04-23', 10),
(12, 1, 1, '2023-04-23', 20),
(13, 1, 1, '2023-04-23', 15),
(14, 1, 1, '2023-04-23', 5),
(15, 1, 1, '2023-04-23', 25),
(16, 1, 1, '2023-04-23', 50),
(17, 2, 1, '2023-04-23', 70),
(18, 2, 1, '2023-04-23', 30),
(19, 2, 1, '2023-04-23', 200),
(20, 2, 1, '2023-04-23', 100),
(21, 2, 1, '2023-04-23', 30),
(22, 2, 1, '2023-04-23', 15),
(23, 2, 1, '2023-04-23', 12),
(24, 3, 1, '2023-04-23', 20),
(25, 3, 1, '2023-04-23', 200),
(26, 3, 1, '2023-04-23', 20),
(27, 3, 1, '2023-04-23', 30),
(28, 3, 1, '2023-04-23', 30),
(29, 4, 1, '2023-04-23', 20),
(30, 4, 1, '2023-04-23', 200),
(31, 4, 1, '2023-04-23', 18),
(32, 4, 1, '2023-04-23', 200);

--
-- Đang đổ dữ liệu cho bảng `don_van_chuyen`
--

INSERT INTO `don_van_chuyen` (`DVC_ID`, `NVC_ID`, `DVC_DIACHI`, `DVC_TGBATDAU`, `DVC_TGHOANTHANH`) VALUES
(1, 2, 'A, đường A, huyện A, tỉnh A', '2022-03-16', '2022-05-13'),
(2, 1, 'B, đường B, huyện B, tỉnh B', '2022-03-15', '2022-05-12');

--
-- Đang đổ dữ liệu cho bảng `hoa_don`
--

INSERT INTO `hoa_don` (`HD_ID`, `DVC_ID`, `TT_ID`, `NV_ID`, `KM_ID`, `PTTT_ID`, `KH_ID`, `HD_TONGTIEN`, `HD_NGAYDAT`, `HD_LIDOHUY`) VALUES
(1, 1, 3, 1, NULL, 2, 1, 500000, '2022-03-12', 'Lí do huỷ đơn'),
(2, 2, 3, 1, NULL, 1, 2, 600000, '2022-02-14', 'Lí do huỷ đơn'),
(3, 2, 3, 1, NULL, 1, 3, 450000, '2022-01-02', 'Lí do huỷ đơn'),
(4, 2, 3, 1, NULL, 1, 2, 450000, '2022-05-02', 'Lí do huỷ đơn'),
(5, 2, 3, 1, NULL, 1, 2, 450000, '2022-06-02', 'Lí do huỷ đơn'),
(6, 1, 3, 1, NULL, 3, 4, 520000, '2022-07-29', 'Lí do huỷ đơn'),
(7, 1, 3, 1, NULL, 3, 3, 720000, '2022-09-11', 'Lí do huỷ đơn'),
(8, 1, 3, 1, NULL, 2, 3, 860000, '2022-08-28', 'Lí do huỷ đơn'),
(9, 2, 3, 1, NULL, 3, 2, 745000, '2022-11-29', 'Lí do huỷ đơn'),
(10, 1, 3, 1, NULL, 1, 4, 450000, '2022-12-13', 'Lí do huỷ đơn'),
(11, 1, 3, 1, NULL, 2, 1, 520000, '2022-06-01', 'Lí do huỷ đơn'),
(12, 1, 0, 1, NULL, 3, 4, 340000, '2022-12-15', 'Thiếu hàng'),
(13, 1, 1, NULL, NULL, 2, 5, 445000, '2022-01-20', NULL),
(14, 1, 3, 1, NULL, 3, 7, 80000, '2022-03-05', 'Lí do huỷ đơn'),
(15, 1, 1, NULL, NULL, 1, 6, 260000, '2022-03-08', NULL),
(16, 2, 0, 1, NULL, 2, 8, 265000, '2022-07-03', 'Huỷ cho vui'),
(17, 2, 2, 1, NULL, 1, 6, 1200000, '2023-03-10', 'Lí do huỷ đơn'),
(18, 1, 1, NULL, NULL, 2, 5, 300000, '2023-01-25', NULL),
(19, 2, 3, 1, NULL, 3, 4, 850000, '2023-02-22', 'Lí do huỷ đơn'),
(20, 2, 2, 1, NULL, 2, 2, 180000, '2023-03-14', 'Lí do huỷ đơn'),
(21, 1, 3, 1, NULL, 1, 1, 450000, '2023-02-01', 'Lí do huỷ đơn'),
(22, 1, 3, 1, NULL, 2, 7, 210000, '2023-01-12', 'Lí do huỷ đơn'),
(23, 2, 3, 1, NULL, 1, 5, 950000, '2022-01-01', 'Lí do huỷ đơn'),
(24, 1, 3, 1, NULL, 2, 4, 980000, '2022-02-15', 'Lí do huỷ đơn'),
(25, 1, 3, 1, NULL, 3, 6, 1000000, '2022-03-20', 'Lí do huỷ đơn'),
(26, 2, 3, 1, NULL, 1, 3, 400000, '2022-04-12', 'Lí do huỷ đơn'),
(27, 1, 3, 1, NULL, 2, 8, 1560000, '2022-05-05', 'Lí do huỷ đơn'),
(28, 2, 3, 1, NULL, 1, 5, 150000, '2022-06-10', 'Lí do huỷ đơn'),
(29, 1, 1, NULL, NULL, 3, 1, 60000, '2022-07-22', NULL),
(30, 1, 1, NULL, NULL, 2, 3, 970000, '2022-08-11', NULL),
(31, 2, 3, 1, NULL, 2, 5, 100000, '2022-09-09', 'Lí do huỷ đơn'),
(32, 1, 3, 1, NULL, 1, 4, 850000, '2022-10-27', 'Lí do huỷ đơn'),
(33, 1, 3, 1, NULL, 2, 1, 500000, '2023-03-12', NULL),
(34, 2, 3, 1, NULL, 1, 2, 450000, '2023-04-02', NULL),
(35, 1, 1, NULL, NULL, 2, 1, 520000, '2023-04-01', NULL);

--
-- Đang đổ dữ liệu cho bảng `khach_hang`
--

INSERT INTO `khach_hang` (`KH_ID`, `TK_ID`, `KH_HOTEN`, `KH_SDT`, `KH_EMAIL`, `KH_NGAYSINH`, `KH_DIACHI`, `KH_GIOITINH`, `KH_NGAYDK`) VALUES
(1, 8, 'Nguyễn Văn Khách', '0972666533', 'toilakhach@gmail.com', '2001-04-17', 'A123, Đường A, huyện AA, tỉnh AAA', 'm', '2022-03-16'),
(2, 9, 'Trần Thị Khách', '0972636534', 'toicunglakhach@gmail.com', '2001-04-17', 'B123, Đường B, huyện BB, tỉnh BBB', 'm', '2022-03-16'),
(3, 10, 'Quynh Quý Phi', '0891864273', 'quysphi@gmail.com', '1999-12-15', 'Số 10, đường Trần Phú, quận Hoàn Kiếm, Hà Nội', 'f', '2022-09-03'),
(4, 11, 'Trần Hạo Nam', '0823564275', 'haonam9x@gmail.com', '1998-04-25', '27, đường Lý Tự Trọng, quận 1, TP.HCM', 'm', '2022-02-13'),
(5, 12, 'Nguyễn Văn A', '0987654321', 'nguyenvana@gmail.com', '1990-01-01', '123 Đường số 1, Quận 1, TP.HCM', 'm', '2020-01-01'),
(6, 13, 'Lê Thị B', '0123456789', 'lethib@gmail.com', '1995-02-15', '456 Đường số 2, Quận 2, TP.HCM', 'f', '2020-01-01'),
(7, 14, 'Phạm Thị C', '0909123456', 'phamthic@gmail.com', '1993-05-20', '789 Đường số 3, Quận 3, TP.HCM', 'f', '2021-05-01'),
(8, 15, 'Trần Văn D', '0918123456', 'tranvand@gmail.com', '1985-12-31', '101 Đường số 4, Quận 4, TP.HCM', 'm', '2021-06-01');

--
-- Đang đổ dữ liệu cho bảng `khuyen_mai`
--

INSERT INTO `khuyen_mai` (`KM_ID`, `KM_TGBATDAU`, `KM_TGKETTHUC`, `KM_GIATRI`) VALUES
(1, '2022-04-01', '2022-05-01', 0.1);

--
-- Đang đổ dữ liệu cho bảng `loai_sp`
--

INSERT INTO `loai_sp` (`LSP_ID`, `LSP_TEN`) VALUES
(1, 'Cá kiểng'),
(2, 'Thức ăn'),
(3, 'Trang trí'),
(4, 'Khác');

--
-- Đang đổ dữ liệu cho bảng `nguon_hang`
--

INSERT INTO `nguon_hang` (`NH_ID`, `NH_TENNGUON`, `NH_MOTA`) VALUES
(1, 'Công ty Aqua One', 'Chuyên cung cấp sản phẩm thuỷ sinh đến từ Châu Âu'),
(2, 'Công ty Ocean Nutrition', 'Nhà phân phối chính hãng sản phẩm cá cảnh Anh Quốc'),
(3, 'Công ty Tetra', 'Chuyên cung cấp đồ trang trí nhỏ đến lớn cho cửa hàng'),
(4, 'Tập đoàn Fisher', 'Cung cấp các sản phẩm cho người chơi hệ cá');

--
-- Đang đổ dữ liệu cho bảng `nhan_vien`
--

INSERT INTO `nhan_vien` (`NV_ID`, `TK_ID`, `NV_HOTEN`, `NV_SDT`, `NV_EMAIL`, `NV_NGAYSINH`, `NV_GIOITINH`, `NV_NGAYTUYEN`) VALUES
(1, 1, 'Nguyễn Đỗ Phúc Vinh', '0377899959', 'admin@gmail.com', '2002-11-01', 'm', '2020-11-14'),
(2, 2, 'Nguyễn Tuấn Hoàng', '0976768965', 'nthoang@gmail.com', '1999-10-13', 'm', '2019-10-03'),
(3, 4, 'Trần Văn Sơn', '0377811142', 'son.son95@gmail.com', '1995-10-13', 'm', '2018-09-02'),
(4, 5, 'Lê Trúc Yên', '0978623123', 'yyen@gmail.com', '1996-11-09', 'f', '2020-11-14'),
(5, 6, 'Trần Thị Lan', '0379816362', 'tranlan97@gmail.com', '1998-03-14', 'm', '2023-03-13'),
(6, 7, 'Lê Văn Lai', '0379816362', 'lailv@gmail.com', '1987-04-14', 'm', '2023-03-16');

--
-- Đang đổ dữ liệu cho bảng `nha_van_chuyen`
--

INSERT INTO `nha_van_chuyen` (`NVC_ID`, `NVC_TEN`) VALUES
(1, 'J&T Express'),
(2, 'Giao hàng tiết kiệm'),
(3, 'Giao hàng nhanh'),
(4, 'EMS Express');

--
-- Đang đổ dữ liệu cho bảng `pt_thanhtoan`
--

INSERT INTO `pt_thanhtoan` (`PTTT_ID`, `PTTT_TEN`) VALUES
(1, 'Tiền mặt'),
(2, 'Chuyển khoản ngân hàng'),
(3, 'Visa/Mastercard');

--
-- Đang đổ dữ liệu cho bảng `san_pham`
--

INSERT INTO `san_pham` (`SP_ID`, `LSP_ID`, `SP_TEN`, `SP_MOTA`, `SP_GIA`, `SP_HINHANH`, `SP_SOLUONG`, `SP_DVT`) VALUES
(1, 1, 'Cá hề', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque feugiat sapien auctor auctor egestas. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Inter', 200000, 'untitled-1-1.jpg', 46, 'Con'),
(2, 2, 'Aquamaster Wheat Gerrm', 'Thức ăn cho cá Koi vào mùa đông\r\nThức ăn cho cá Koi vào mùa đông\r\nThức ăn cho cá Koi vào mùa đông', 100000, '0-Thức ăn mùa đông cho cá Koi Aquamaster Aqua Master Wheat Germ Koi Food.jpg', 15, 'Gói'),
(3, 2, 'Tôm sấy khô cho cá hộp 85g', 'Tôm sấy khô cho cá hộp 85gTôm sấy khô cho cá hộp 85gTôm sấy khô cho cá hộp 85g', 120000, 'ff4dde06ff158a22744a1663aa69c74e.jpg', 38, 'Hộp'),
(4, 3, 'Tượng đá phục sinh', 'Tượng đá phục sinh\r\nTượng đá phục sinh\r\nTượng đá phục sinh, Tượng đá phục sinh', 250000, '27044915_318094348699756_72419214_n.jpg', 6, 'Cái'),
(5, 3, 'Bể cá mini', 'Bể cá mini kích thước 20x20x20cm, có thể đặt trên bàn làm việc', 150000, 'mau-be-ca-de-ban-lam-viec-1.jpg', 4, 'Cái'),
(6, 1, 'Cá chép vàng', 'Cá chép vàng có kích thước từ 5-7cm, phù hợp để nuôi trong bể nhỏ Cá chép vàng có kích thước từ 5-7cm, phù hợp để nuôi trong bể nhỏ', 15000, 'ca-chep-canh-hellothucung-1.jpg', 57, 'Con'),
(7, 3, 'Thảm cỏ hồ cá', 'Thảm cỏ giả kích thước 30x30cm, giúp tạo cảnh quan tự nhiên cho bể', 50000, 'tham-co-nhan-tao-be-ca-chat-luong.jpg', 20, 'm2'),
(8, 1, 'Ali Thái - Kadango Cichlid', 'song theo dang, ca san moi', 60000, 'ali-fish.png', 20, 'Con'),
(9, 1, 'Cá Nẻ Xanh ( Dory ) – Blue Tang', '\r\nMức Độ Chăm Sóc	Trung Bình\r\nTính Cách	Bán tích cực , có tính lãnh thổ với các cá thể cùng loài ( Semi-aggressive )\r\nMàu sắc	Màu xanh da trời\r\nChế độ ăn	Thực vật\r\nThân thiện với rạn san hô (Reef Comp', 750000, 'lg_73746_Blue_Tang.jpg', 40, 'Con'),
(10, 1, 'Cá Axolotl', 'Cá axolotl có nguồn gốc từ Mexico. Chúng thường sống ở tầng đáy, nơi rất ít ánh sáng nên gần như mắt của chúng bị mù, không thể nhìn thấy được. Để tìm thức ăn, chúng đánh hơi bằng mũi và ăn các loại c', 500000, 'ky-nhong-o-dau-e1633279267534.jpg', 10, 'Con'),
(11, 4, 'Horned Nerite Snail', 'Ốc táo có tên khoa học là Pomacea bridgesi, có nhiều màu sắc. Và đặc biệt loài ốc táo rất được yêu thích vì rất đẹp, kích thước khoảng 6,5cm với 2 hệ hô hấp song song là phổi và chi. Ốc Táo hiện nay đ', 110000, 'images.jpg', 10, 'Con'),
(12, 1, 'Cá thần tiên', 'Cá Thần Tiên hay còn có tên tiếng Anh là ANGELFISH là dòng cá có kiểu bơi đặc biệt, bơi theo chiều dọc. Có dáng tròn (gần giống với cá dĩa), vây lưng, vây ngực, và vây bụng dài khiến cho dáng bơi của', 250000, '3ec1525f-3668-4e42-8402-db9e67a819c5.jpg', 20, 'Con'),
(13, 1, 'CÁ MÓ', 'Carpenter’s Flasher Warasse thuộc hộ Labbridae có nguồn gốc Cebu,Sumatra khi trưởng thành có kích thước tối đa 3inch( 7,62cm) hay còn được biết đến với tên gọi Carpenter’s Wrasse hoặc Redfin Flasher W', 500000, '20190618_PToVn2jfDbtwFdQ7tUYIUQN2.jpg', 15, 'Con'),
(14, 1, 'CÁ THIÊN THẦN LƯNG CAM - FLAMEBACK ANGELFISH', 'Họ: Pomacanthidae\r\nNguồn gốc: Afica\r\nKích thước tối đa: 3 inch\r\nMức độ chăm sóc: Trung bình', 1200000, 'lg36855FlamebackAngel.jpg', 5, 'Con'),
(15, 1, 'CÁ BỐNG MIDAS-MIDAS BLENNY', 'Họ:Blenniidae\r\nNguồn gốc: Africa, Fiji, Indonesia, Maldives\r\nKích thước tối đa: 6 inch( 15,24cm)\r\nMức độ chăm sóc: Dễ', 120000, '20190618_65EEmTUcUUFpISh5ZW7hag8k.jpg', 25, 'Con'),
(16, 1, 'Cá Betta', 'Cá Betta là một loài cá ăn thịt, do đó chúng chủ yếu ăn các loài phiêu sinh, bọ gậy hoặc những ấu trùng. Khi được cung cấp thức ăn và môi trường sống trong lành, giống cá này có thể sinh tồn và phát t', 90000, 'ca-betta2.jpg', 50, 'Con'),
(17, 2, 'Artemia', 'Artemia là một dòng thức ăn được rất nhiều người chơi sử dụng đặc biệt là các trại cá cảnh lớn nuôi với số lượng nhiều. Dòng thức ăn này có thể phù hợp cho cá cảnh từ nhỏ cho đến lớn với hàm lượng din', 700000, 'Artemia (1).jpg', 70, 'Hộp'),
(18, 2, 'Giun, Trùn chỉ, Trùn huyết', 'Tuy là dòng thực phẩm cho cá cảnh cực tốt, nhưng phần lớn dạng thực phẩm này được khai thác tự nhiên ở những khu vực không quá sạch sẽ nên rất dễ mang mần bệnh và khiến cá nhiễm bệnh nếu không biết cá', 80000, 'thuc-an-ca-trun-chi.jpg', 30, 'Kg'),
(19, 2, 'Tim bò kích đỏ', 'Thức ăn tim bò kích đỏ gần đây được nhiều người chơi cá cảnh thủy sinh sử dụng. Phần lớn người sử dụng dòng thức ăn này là dành cho những cho cá cảnh có kích thước lớn và có màu đỏ như: cá Dĩa, cá Cầu', 30000, 'Thuc-an-tim-bo-kich-do-dong-lanh-1024x1024.jpg', 200, 'Gói'),
(20, 2, 'Cám thái Inve -50g', 'Nhắc đến thức ăn cá cảnh dạng cám mà không nhắc đến cám thái Inve thì quả thật là thiếu sót, đây là dòng cám được rất nhiều người chơi cá cảnh sử dụng vì giá thành rẻ và giá trị dinh dưỡng khá tốt. Ba', 15000, 'Cam-thai-inve.jpg', 100, 'Hộp'),
(21, 2, 'Thức ăn Tetra -75g', 'Thức ăn cá cảnh TetraColor được thiết kế cho các loài cá lớn hơn như cá dĩa và cá thần tiên. Ngoài ra, những hạt chìm chậm này mang lại dinh dưỡng tăng cường màu sắc cho cá tầng trung và ăn đáy. Tăng', 70000, 'Thuc-an-Tetra-Color.jpg', 30, 'Hộp'),
(22, 2, 'Thức ăn Tropical&Color -50g', 'Tropical Vitality & Color là thức ăn dạng viên nén hoàn chỉnh, đặc biệt có giá trị dinh dưỡng cao, tăng cường màu sắc cho tất cả các loài cá cảnh. Hàm lượng lecithin và vitamin E kích thích sinh sản v', 60000, 'cam-dan-Tropical-Vitality-color-300x300.jpg', 15, 'Hộp'),
(23, 2, 'Thức ăn JBL -160g', 'Sử dụng protein nguyên chất, không sử dụng bột cá giá rẻ.\r\nTỷ lệ protein/chất béo tối ưu.\r\nChủ yếu là protein từ động vật sống trong nước.\r\nGiảm sự phát triển của tảo và tăng trưởng cá tối ưu nhờ hàm', 160000, 'Thuc-an-ca-canh-JBL-Novo-Tab-160g-250ml.jpg', 12, 'Hộp'),
(24, 3, 'Cây nhựa trang trí hồ cá cảnh, hòn non bộ nhiều mẫ', 'Cây nhựa trang trí hồ cá cảnh, hòn non bộ nhiều mẫu mã.\r\nSử dụng làm nơi vui chơi cho cá cảnh, giúp cá giảm stress và có nơi trú ngụ.\r\nCây được làm bằng nhựa, không bay màu, không gây hại cho cá cảnh.', 8000, 'tải xuống.jpg', 20, 'Cái'),
(25, 3, 'Tượng gốm tháp chùa và mô hình ngôi nhà sàn, nhà r', '- Chúng ta thường bắt gặp hình ảnh những ngôi nhà sàn, nhà rơm trong chuyện cổ tích quen thuộc, ở quê rơm là của thân các loại cây lúa (lúa nước, lúa mì, lúa mạch) đã gặt và đập hết hạt, hoặc là các l', 30000, 'vn-11134207-23030-gb0xpvnvamov9b.jpg', 200, 'Cái'),
(26, 3, 'Sỏi Sạn Suối 1kg Trải Nền Trang Trí Bể Cá, Bể Thủy', 'Sỏi sạn suối được chọn lọc sử dụng setup và trang trí bể của bạn. Bể cá của bạn sẽ trông tự nhiên và đẹp hơn với sỏi sạn suối.\r\nLƯU Ý: Tùy từng đơt hàng mà màu sắc và kích thước viên sạn suối khác nha', 15000, 'tải xuống.png', 20, 'Gói'),
(27, 3, 'Ráy Nana Tàu Cây Thủy Sinh Gắn Đá Lũa Không Cần CO', '-Cây  thủy sinh ráy nana có lá nhỏ xanh đẹp nên xử lý gắn giá thể có dinh dưỡng hoặc không có dinh dưỡng, không cắm xuống nền phân\r\n- Ráy nana được sử dụng làm điểm hoặc trọng tâm của các bố cục. Cây', 35000, 'tải xuống (1).png', 30, 'Cây'),
(28, 3, 'Set Đá Dạ Quang Trang Trí Bể Cá', 'Mô tả:\r\nNhững gì mà viên đá dạ quang này có thể cung cấp cho bạn là nó thân thiện với môi trường, an toàn và sẽ không ảnh hưởng đến sức khỏe của cuộc sống thủy sinh. Ngay cả khi ngâm trong nước lâu cũ', 45000, 'đá dạ quang.jpg', 30, 'Gói'),
(29, 4, 'La Hán xanh', 'Tên gọi khác: rong đuôi chồn.\r\nƯu điểm: dễ trồng, dễ chăm sóc, không đòi hỏi dinh dưỡng cao.\r\nNhược điểm: cây phát triển nhanh nên cần phải cắt tỉa thường xuyên, cần phải có dòng chảy nhẹ trong bể thủ', 30000, 'la-han-xanh.jpg', 20, 'Cây'),
(30, 4, 'Cỏ thìa', 'Ưu điểm: dễ trồng, dễ chăm sóc, không đòi hỏi dinh dưỡng cao, tốc độ sinh trưởng nhanh.\r\nNhược điểm: bộ rễ phát triển khá nhanh và mạnh nên chú ý khi setup lại tránh làm động nền.\r\nCách bố trí: Làm ti', 7000, 'co-thia.jpg', 200, 'Cây'),
(31, 4, 'Thủy cúc', 'Tên gọi khác: Thủy yêu.\r\nƯu điểm: dễ trồng, dễ chăm sóc, phát triển nhanh.\r\nNhược điểm: bộ rễ phát triển khá nhanh, mạnh, ăn sâu vào nền nên chú ý khi setup lại tránh làm động nền.\r\nMuốn cây đẹp nên t', 12000, 'thuy-cuc.jpg', 18, 'cây'),
(32, 4, 'Tép dọn bể', 'Tép sẽ giúp bể cá của bạn sạch sẽ hơn. Bản chất của tép là loài ăn xác thối và tảo thực vật, chúng cũng sẽ ăn thức ăn thừa và một số chất hữu cơ khác lắng động trong bể. Ngoài ra thì bạn cũng có thể b', 6000, 'Tep.jpg', 200, 'Con');

--
-- Đang đổ dữ liệu cho bảng `tai_khoan`
--

INSERT INTO `tai_khoan` (`TK_ID`, `TK_TENDANGNHAP`, `TK_MATKHAU`, `TK_AVATAR`, `TK_VAITRO`) VALUES
(1, 'ad', 'ad', 'avatar.jpg', 'admin'),
(2, 'nv1', 'nv1', 'bruce-mars.jpg', 'staff'),
(3, 'nv2', 'nv2', 'team-4.jpg', 'admin'),
(4, 'ad3', 'ad3', 'team-4.jpg', 'admin'),
(5, 'nv3', 'nv3', 'kal-visuals-square.jpg', 'staff'),
(6, 'ad1', 'ad1', 'marie.jpg', 'admin'),
(7, 'nv9', 'nv9', 'team-2.jpg', 'staff'),
(8, 'kh1', 'kh1', 'macdinh.jpg', 'custommer'),
(9, 'kh2', 'khh2', 'team-2.jpg', 'custommer'),
(10, 'kh3', 'kh3', 'team-1.jpg', 'custommer'),
(11, 'kh4', 'kh4', 'macdinh.jpg', 'custommer'),
(12, 'nguyenvanA', '123456', 'macdinh.jpg', 'custommer'),
(13, 'lethiB', 'abcdef', 'macdinh.jpg', 'custommer'),
(14, 'phamc', 'phamc', 'macdinh.jpg', 'custommer'),
(15, 'trand', 'trand', 'macdinh.jpg', 'custommer');

--
-- Đang đổ dữ liệu cho bảng `trangthai_hd`
--

INSERT INTO `trangthai_hd` (`TT_ID`, `TT_TEN`) VALUES
(0, 'Đã huỷ'),
(1, 'Đợi xác nhận'),
(2, 'Đang giao hàng'),
(3, 'Hoàn thành');

INSERT INTO `tin_tuc` (`TTC_ID`,`TTC_TITLE`,`TTC_MOTA`, `TTC_ANH`, `TTC_HIENTHI`, `NV_ID`, `TTC_LINK`) VALUES
(1,'Khuyến mãi tháng 4','Hãy thanh toán giỏ hàng của bạn và nhận ngay ưu đãi 20%!!!','news1.png',true,1,'../index.php'),
(2,'Khuyến mãi tháng 5','Hãy thanh toán giỏ hàng của bạn và nhận ngay ưu đãi 10%!!!','news2.png',false,1,'../index.php'),
(3,'Hướng dẫn trang trí hồ cá đẹp','Tìm hiểu làm sao để hồ cá của bạn thật đẹp!','news3.png',true,1,'../index.php');

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
