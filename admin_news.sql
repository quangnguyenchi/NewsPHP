-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 04, 2020 lúc 07:00 AM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `admin_news`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaitin`
--

CREATE TABLE `loaitin` (
  `id` int(11) NOT NULL,
  `Ten` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `TenKhongDau` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `idTheLoai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaitin`
--

INSERT INTO `loaitin` (`id`, `Ten`, `TenKhongDau`, `idTheLoai`) VALUES
(47, 'Sao Việt', 'Sao Viet', 74),
(48, 'Sao Châu Á', 'Sao Chau A', 74),
(49, 'Sao HOLLYWOOD', 'Sao HOLLYWOOD', 74),
(50, 'Quân sự', 'Quan su', 81),
(51, 'Tư liệu', 'Tu lieu', 81),
(52, 'Phân tích', 'Phan tich', 81),
(53, 'Mobile', 'Mobile', 82),
(54, 'Internet', 'Internet', 82),
(55, 'Esports', 'Esports', 82),
(56, 'Bóng đá Việt Nam', 'Bong da Viet Nam', 83),
(57, 'Bóng đá Anh', 'Bong da Anh', 83),
(58, 'Võ thuật', 'Vo thuat', 83);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quangcao`
--

CREATE TABLE `quangcao` (
  `id` int(11) NOT NULL,
  `Ten` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `NoiDung` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `HinhAnh` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `TrangThai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `quangcao`
--

INSERT INTO `quangcao` (`id`, `Ten`, `NoiDung`, `HinhAnh`, `TrangThai`) VALUES
(2, 'test quang cao', '', '444444.jpg.jpg', 2),
(3, 'test quang cao2', '', '12.jpg', 3),
(8, 'milk', '', 'maxresdefault.jpg', 1),
(9, 'milk', '', 'maxresdefault.jpg', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `theloai`
--

CREATE TABLE `theloai` (
  `id` int(11) NOT NULL,
  `Ten` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `TenKhongDau` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `theloai`
--

INSERT INTO `theloai` (`id`, `Ten`, `TenKhongDau`) VALUES
(74, 'Giải trí', 'Giai tri'),
(81, 'Thế giới', 'The gioi'),
(82, 'Công nghệ', 'Cong nghe'),
(83, 'Thể thao', 'The thao');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tintuc`
--

CREATE TABLE `tintuc` (
  `idTinTuc` int(11) NOT NULL,
  `TieuDe` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `TieuDeKhongDau` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `TomTat` text COLLATE utf8_unicode_ci NOT NULL,
  `NoiDung` text COLLATE utf8_unicode_ci NOT NULL,
  `HinhAnh` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `NoiBat` int(11) NOT NULL,
  `idLoaiTin` int(11) NOT NULL,
  `idTacGia` int(11) NOT NULL,
  `NgayDang` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tintuc`
--

INSERT INTO `tintuc` (`idTinTuc`, `TieuDe`, `TieuDeKhongDau`, `TomTat`, `NoiDung`, `HinhAnh`, `NoiBat`, `idLoaiTin`, `idTacGia`, `NgayDang`) VALUES
(39, 'Bạn trai về Đắk Lắk cùng H\'Hen Niê', 'Ban trai ve Dak Lak cung H\'Hen Nie', 'Hôm 17/3, trên Instagram, Hoa hậu H\'Hen Niê đăng ảnh mặc trang phục giản dị, đội nón lá ra thăm cánh đồng ở quê Đắk Lắk. Cô viết: \"Chiều hoàng hôn nắng chiếu lung linh\".\r\n', 'Hôm 17/3, trên Instagram, Hoa hậu H\'Hen Niê đăng ảnh mặc trang phục giản dị, đội nón lá ra thăm cánh đồng ở quê Đắk Lắk. Cô viết: \"Chiều hoàng hôn nắng chiếu lung linh\".\r\n\r\nCùng thời điểm, tài khoản mạng xã hội của bạn trai tin đồn H\'Hen Niê cũng check-in ở Đắk Lắk. Anh chia sẻ khoảnh khắc tại một cánh đồng và người hâm mộ phát hiện H\'Hen Niê cũng có mặt trong ảnh vì sự trùng khớp về trang phục, dép và nón.\r\n\r\nTài khoản nt.clothing124 bình luận: \"Chị đội nón lá sao giống chị Hen vậy ta\". Thành viên t.duythanh cho biết: \"Thấy người quen trong ảnh nha\".', 'Hne.jpg', 1, 47, 1, '2020-03-19'),
(40, 'Trấn Thành viết về danh ca Thái Thanh: \'Huyền thoại lẫy lừng\'', 'Tran Thanh viet ve danh ca Thai Thanh: \'Huyen thoai lay lung\'', 'Theo giọng ca Còn ta với nồng nàn, tiếng hát của Thái Thanh đặc biệt, vang mãi với thời gian. \"Thái Thanh - Tiếng hát quê hương. Xin chia buồn cùng chị Ý Lan và gia đình\", nam ca sĩ nói với giọng trầm buồn.', 'Theo giọng ca Còn ta với nồng nàn, tiếng hát của Thái Thanh đặc biệt, vang mãi với thời gian. \"Thái Thanh - Tiếng hát quê hương. Xin chia buồn cùng chị Ý Lan và gia đình\", nam ca sĩ nói với giọng trầm buồn.\r\n\r\nNghe tin bậc tiền bối qua đời, danh ca Hương Lan chia sẻ trên trang cá nhân: \"Vô cùng thương Tiếc. Vĩnh biệt nữ danh ca Thái Thanh\".\r\n\r\nThừa nhận hâm mộ giọng hát bất hủ của danh ca Thái Thanh, MC Trấn Thành bùi ngùi khi biết tin bà qua đời. Anh chia sẻ: “86 xuân một đời người. Vẻ vang và lộng lẫy ngần ấy lâu, chắc cũng đã mệt mỏi. Nghỉ ngơi cụ nhé! Con cháu kiếp kiếp, đời đời luôn dõi theo hào quang của cụ”.\r\n\r\nTrấn Thành cho rằng dù nữ danh ca ra đi, nhưng tâm hồn và tiếng hát sẽ ở lại. “Về sau và nhiều năm sau, mọi người vẫn sẽ kể nhau nghe về một huyền thoại lẫy lừng mang tên Thái Thanh”, anh nhấn mạnh.\r\n\r\nCuối cùng, anh viết: “Xin cúi đầu, tay chắp, đặt nhẹ cành hoa tạ từ lên mộ \'người hát tình ca\' với tất cả lòng biết ơn, để \'kiếp nào có yêu nhau, thì xin tìm đến mai sau\'\".', 'ThaiThanhHuyen.jpg', 1, 47, 1, '2020-03-19'),
(41, 'Thanh Hằng và các sao Việt quyên góp chống dịch Covid19', 'Thanh Hang va cac sao Viet quyen gop chong dich Covid19', 'Hôm 17/3, trên trang cá nhân, ca sĩ Tùng Dương cho biết anh vừa nhận được sự ủng hộ của MC Thảo Vân, Diệp Chi trong chương trình đồng hành cùng Chính phủ và cộng đồng để phòng chống dịch Covid-19.\r\n', 'Hôm 17/3, trên trang cá nhân, ca sĩ Tùng Dương cho biết anh vừa nhận được sự ủng hộ của MC Thảo Vân, Diệp Chi trong chương trình đồng hành cùng Chính phủ và cộng đồng để phòng chống dịch Covid-19.\r\n\r\nCụ thể, MC Diệp Chi quyên góp 500 bộ quần áo chống dịch và 2.500 khẩu trang y tế, Hoa hậu biển Ngô Lan Anh đóng góp 5.000 khẩu trang, MC Thảo Vân cũng gửi một số tiền để ủng hộ chương trình.\r\nChia sẻ với Zing.vn, diễn viên Thanh Hằng cho biết cô đã trích một số tiền nhỏ gửi đến Ủy ban Trung ương Mặt trận Tổ quốc Việt Nam để hỗ trợ Chính phủ trong công tác phòng, chống dịch Covid-19.\r\n\r\n\"Tôi luôn cập nhật tình hình phòng chống dịch Covid-19 của Việt Nam. Bản thân tôi thấy Chính phủ và các cơ quan, ban, ngành đang làm rất tốt để đảm bảo sự an toàn và sức khỏe của người dân. Tôi chỉ đóng góp một số tiền nhỏ vào công tác đẩy lùi dịch bệnh\", diễn viên Chị chị em em bày tỏ.', 'Chongdich.jpg', 1, 47, 1, '2020-03-19'),
(42, 'Hồ Ngọc Hà quyên góp 2 phòng cách ly cho bệnh nhân Covid19', 'tieudeSlug', '', 'Ngày 17/3, Hồ Ngọc Hà có cuộc họp với Sở Y tế TP.HCM và đại diện các tỉnh miền Tây. Kết quả cuộc họp, nữ ca sĩ quyết định lắp đặt 2 phòng cách ly áp lực âm.\r\n\r\nNữ ca sĩ thông báo: “Sau 2 cuộc họp chiều nay, chúng tôi quyết định thay vì gửi một tỷ đồng tiền mặt cho Sở Y tế thì được các anh chị tư vấn là mua trang thiết bị thiết thực hơn. Vì thế tôi quyết định lắp đặt 2 phòng cách ly (là một trong những giải pháp tối ưu nhất cho tới hiện giờ). Mỗi phòng trị giá hơn 650 triệu đồng\".\r\n“Chúng tôi đang nghiên cứu giá cả máy lọc nước để lắp đặt cho bà con miền Tây. Chiều nay, chúng tôi đã nắm được những địa bàn cần giúp đỡ rồi. Giờ tôi phải lựa chọn máy lọc để họ có thể uống, tắm giặt, nấu nướng chứ không chỉ tưới cây nên giá thành khá cao, mỗi máy khoảng 500 triệu. Trước mắt cố lắm là được 4 máy. Tôi sẽ cố xin thêm một số bạn bè thân hữu nữa”, cô chia sẻ thêm.', 'HNHchongdich.jpg', 2, 47, 1, '0000-00-00'),
(43, 'Hari Won trao 1.610 bình nước cho người dân Tiền Giang', 'tieudeSlug', '', 'Ngày 17/3, Hari Won, Tuấn Trần cùng các thành viên trong ê-kíp tới Tiền Giang trao 1.610 bình nước và 100 phần quà cho bà con. Hai nghệ sĩ tận tay trao cho người dân những bình nước ngọt. Trên trang cá nhân, giọng ca Hương đêm bay xa hạnh phúc khi thực hiện hành động ý nghĩa. Cô viết: “Góp phần nhỏ thôi nhưng vẫn rất vui. Chúng ta mỗi người một tay thì sẽ thành gió lớn nhé”.\r\n\r\nTrong khi đó, diễn viên Tuấn Trần bày tỏ: “Hôm nay vui quá. Cùng mọi người tập thể dục. Một phần nhỏ tấm lòng. Mong bà con mau vượt qua đợt hạn hán này”. Trước Hari Won, Tuấn Trần, nhiều nghệ sĩ góp tiền của, công sức để chung tay đẩy lùi dịch bệnh và giúp đỡ người dân miền Tây trước tình trạng hạn mặn.\r\nTheo thông báo mới nhất trên trang cá nhân, Thủy Tiên cho biết cô đã kêu gọi quyên góp được 10 tỷ đồng. Trong đó, nữ ca sĩ quyết định góp 50 triệu đồng. Ngày16/3, cô và Công Vinh cũng có chuyến khảo sát tại Tiền Giang.\r\n\r\n“Đến một điểm khảo sát ở nhà văn hoá ấp 4, có một bà ngoại 82 tuổi ra ngồi chờ đoàn mình từ trưa đến chiều tối. Ngoại và người dân chờ chỉ để cảm ơn rối rít, ngoại nghe nói có nước ngọt nên mừng lắm ra ngồi mong với chính quyền xã. Người dân cảm ơn cho mình trái mít chín cây, mình mừng ghê vì anh Vinh thích ăn mít”, nữ ca sĩ chia sẻ kỷ niệm khi về Tiền Giang khảo sát.\r\n\r\nVợ chồng Ông Cao Thắng, Đông Nhi cũng chuyển 50 triệu đồng vào tài khoản của đàn chị để chung tay.', '89665669_3038863732823999_1116719852334088192_o.jpg', 2, 47, 1, '0000-00-00'),
(44, 'Cổ Cự Cơ và vợ tiêu tốn 130.000 USD để có con', 'tieudeSlug', '', 'Hôm 15/3, nam diễn viên Hong Kong Cổ Cự Cơ thông báo anh và vợ Trần Anh Tuyết đã đón con đầu lòng sau 5 năm kết hôn. Chia sẻ của tài tử Tân dòng sông ly biệt nhận được nhiều lời chúc mừng từ công chúng.\r\n\r\nMới đây, Sina dẫn lời truyền thông Hong Kong cho hay Cổ Cự Cơ và bà xã kể từ lúc kết hôn đến nay đã tiêu tốn không ít tiền của, công sức để thực hiện ước mong được làm cha mẹ.\r\nVì thời điểm kết hôn Trần Anh Tuyết đã 46 tuổi nên việc có con của cặp đôi gặp nhiều khó khăn, cho nên vợ của nam diễn viên phải tiến hành đông lạnh trứng nhằm đảm bảo khả năng sinh sản.\r\n\r\nSau đó, vợ chồng tài tử Bao thanh thiên còn phải tiến hành điều trị đông lẫn tây y trong một thời gian dài. Mãi đến đầu năm 2019, cả hai mới nhận được tin vui thụ tinh nhân tạo thành công. Chi phí Cổ Cự Cơ và vợ phải trả là gần 130.000 USD.\r\n\r\nTheo Oriental Daily do vợ là sản phụ cao tuổi, nên nam diễn viên tỏ ra rất căng thẳng cũng như đặc biệt cẩn trọng đối với vấn đề sức khỏe của hai mẹ con.\r\n\r\nTừ đầu năm 2019, sau khi hoàn thành tour lưu diễn ở Las Vegas, Cổ Cự Cơ gần như vắng bóng trong showbiz. Anh dành toàn bộ thời gian để ở bên và chăm lo vợ trong suốt giai đoạn thai kỳ. Đến khi Trần Anh Tuyết bí mật sang Mỹ sinh con an toàn vào cuối năm, nam nghệ sĩ mới quay trở lại hoạt động nghệ thuật.\r\n\r\n\"Về việc vui của gia đình, tôi dự định thông báo tới mọi người vào dịp Tết Nguyên đán vừa qua. Nhưng vì tình hình dịch bệnh bùng phát, ai cũng lao vào cuộc chiến chống dịch Covid-19 nên tôi nghĩ để sau này chia sẻ tâm tình với mọi người sẽ thích hợp hơn.\r\n\r\nTôi cũng định vào dịp đặc biệt 4/4 (ngày thiếu nhi Trung Quốc) sẽ chính thức công bố. Nhưng đêm nay nhận được nhiều tin nhắn chúc mừng từ bạn bè, vì vậy, cảm ơn tấm lòng của mọi người. Tôi sẽ tiếp tục làm một người cha và người chồng tốt\", Cổ Cự Cơ chia sẻ lý do anh giấu việc vợ sinh con.', 'middle_631x462_155945_v2_11651447228785704_e8b46fe9f4acf30e640fd5f7eb399bd9.jpg', 1, 48, 1, '0000-00-00'),
(45, 'Nam ca sĩ Trung Quốc lừa bán khẩu trang bị phạt 3 năm tù', 'tieudeSlug', '', 'Ngày 17/3, trang Sina đưa tin phiên tòa xét xử nam ca sĩ trẻ Hoàng Trí Bác với tội danh lừa đảo tiền qua mạng, buôn bán khẩu trang, vi phạm luật cấm của chính quyền Trung Quốc. Theo phán quyết của tòa án, Hoàng Trí Bác bị phạt 3 năm 3 tháng tù giam và 1.400 USD.\r\n\"Tôi đã cố gắng thu thập khẩu trang y tế để trả hàng cho người mua nhưng không được. Lúc đó tôi đã nhận biết được hành vi phi pháp của mình, vì vậy muốn hoàn lại tiền nhưng chưa kịp trả đã bị bắt. Tôi xin nhận lỗi, tôi chỉ lo lắng cho sức khỏe của cha mẹ mình\", Hoàng Trí Bác nói.\r\n\r\nTrước đó, nam nghệ sĩ này đã rao bán khẩu trang trên mạng nhưng khi nhận được tiền của khách hàng trị giá 16.700 USD thì biến mất. Luật sư bào chữa cho biết đây là lần đầu Hoàng Trí Bác phạm tội.\r\n\r\nSau khi Hoàng Trí Bác bị bắt, chị gái đã viết tâm thư chia sẻ gia đình cô là một hộ nông dân bình thường, thu nhập thấp, cha mẹ từng rất vất vả để lo cho hai chị em ăn học. Nhưng khi cha bị bệnh tim, cả hai chị em đã phải bỏ học để kiếm tiền.', 'hoangg.jpg', 1, 48, 1, '0000-00-00'),
(46, 'Đôi chân đắt giá của Dương Mịch', 'tieudeSlug', '', 'Ngày 17/3, trang Sina đưa tin Dương Mịch trở thành người mẫu quảng cáo của một nhãn hiệu thời trang. Nữ diễn viên sinh năm 1986 là ngôi sao hạng A của giới giải trí Hoa ngữ và được các nhãn hàng săn đón vì ngoại hình sáng giá và khả năng thúc đẩy việc công chúng mua hàng.\r\nTrong loạt ảnh, Dương Mịch khoe đôi chân dài, thon gọn. Nữ diễn viên sở hữu đôi chân đắt giá bậc nhất tại Trung Quốc với gần 10 hợp đồng quảng cáo từ các thương hiệu giày cao gót đến giày thể thao, tất chân, dép, sandal, dép đi trong nhà, váy ngắn...', 'dm5.jpg', 2, 48, 1, '0000-00-00'),
(47, 'G-Dragon bị chỉ trích vì đăng hình ảnh liên quan đến ma tuý', 'tieudeSlug', '', 'Trang Allkpop đưa tin, mới đây, G-Dragon gây tranh cãi với công chúng sau khi đăng tải một bức ảnh dễ liên tưởng tới ma tuý trên Instagram cá nhân.\r\n\r\nCụ thể, vào ngày 15/03, nam thần tượng đăng một bộ ảnh về các phụ kiện khác nhau như túi xách, giày dép và đồng hồ. Tuy nhiên, điều khiến dân mạng xôn xao nằm ở bức ảnh trắng đen có hình mặt cười màu vàng trên lưỡi. Hình ảnh này khiến mọi người gợi nhớ đến loại ma túy gây ảo giác LSD.', 'Untitled2.jpg', 1, 48, 1, '0000-00-00'),
(48, 'Daniel Radcliffe: \'Harry Potter đã biến tôi thành kẻ nghiện rượu\'', 'tieudeSlu', '', 'Theo Mirror, Daniel Radcliffe đã thừa nhận trên chương trình Desert Island Discs rằng anh bị áp lực vì nổi tiếng quá sớm khi thủ vai Harry Potter. Việc này khiến anh phải làm bạn với rượu trong một thời gian dài và trở thành kẻ nghiện rượu lúc nào không biết.\r\n\r\nSao nam 31 tuổi nói rằng anh cảm thấy tồi tệ sau khi kết thúc 8 phần của phim Harry Potter. Radcliffe không biết mình phải làm gì tiếp theo để vượt qua cái bóng quá lớn của chính mình.\r\nAnh tìm đến rượu như liều thuốc giúp quên đi mình là Harry Potter. Diễn viên Jungle chia sẻ anh sẽ càng uống nhiều hơn nếu những người xung quanh bàn tán: “Ồ, là Harry Potter đi uống rượu trong quán bar”.\r\n\r\nKhi được hỏi làm thế nào để đối mặt với những ánh mắt xung quanh, Daniel Radcliffe nói: “Ban đầu tôi nghĩ điều này rất tồi tệ. Nếu đi ra ngoài và say khướt, đột nhiên tôi nhận ra điều này khiến mình hứng thú hơn nhiều vì tôi không chỉ là một gã nghiện rượu mà là Harry Potter trong quán bar”.\r\n\r\n“Có lẽ việc nhìn thấy tôi uống rượu mang lại sự thú vị cho mọi người. Và thậm chí có một số người chế giễu tôi. Nhưng không sao, nó vốn dĩ rất buồn cười đối với mọi người. Cách tôi phản ứng lại là uống nhiều hơn và say hơn. Vì vậy tôi đã làm như thế trong vài năm”, Radcliffe không thích cảm giác bị nhìn ngó nhưng anh không thích phản ứng lại.', '3.jpg', 1, 49, 1, '0000-00-00'),
(49, 'Sao nhí 13 tuổi lo lắng khi em trai không được xét nghiệm', '', '', 'Trên trang cá nhân, diễn viên nhí August Maturo bày tỏ sự lo lắng khi em trai bị ốm nhưng không được xét nghiệm.\r\nHôm 12/3, trên trang cá nhân, August Maturo đăng tải thông tin em trai của diễn viên nhí là Ocean đang bị ốm, nghi nhiễm virus corona nhưng không được xét nghiệm.\r\n\r\n\"Em trai tôi đã xét nghiệm và âm tính với cúm A, B. Chúng tôi đề nghị xét nghiệm Covid-19 nhưng không được chấp thuận. Gia đình tôi đang sống ở quận Ventura County, nơi có gần 1 triệu dân nhưng chỉ 77 người được xét nghiệm. Điều này dường như vô nghĩa\", sao nhí Hollywood chia sẻ.', 'sao.jpg', 1, 49, 1, '0000-00-00'),
(50, 'Lý do Meghan Markle không đưa con trai đến London', 'tieudeSlug', '', 'Hoàng tử Harry và Meghan Markle đang hoàn thành những cuộc họp cuối cùng của hoàng gia tại London, Anh. Một số người hỏi bé Archie Harrison ở đâu khi vợ chồng công tước đang bận rộn công việc của hoàng gia.\r\n\r\nTheo The Telegraph, vợ chồng Công tước Harry đã không mang theo con trai đến London vì lo ngại trước tình hình dịch Covid-19 bùng phát dữ dội.\r\n\r\nMột nguồn tin xác nhận với People rằng bộ đôi luôn gọi điện về nhà mỗi ngày để nói chuyện với con trai 10 tháng tuổi. “Archie đang lớn lên từng ngày. Cậu bé đã bắt đầu biết cầm nắm đồ vật. Archie cũng biết tạo những biểu cảm đáng yêu, điều này thật sự thú vị”, người này tiết lộ.', '12.jpg', 1, 49, 1, '0000-00-00'),
(51, 'Mỹ tấn công trả đũa tại Iraq sau vụ nã rocket', '', '', 'Lầu Năm Góc hôm 12/3 xác nhận Mỹ đã tấn công 5 cơ sở của lực lượng dân quân được Iran hậu thuẫn tại Iraq, để đáp trả vụ tấn công nhằm vào căn cứ có lính Mỹ đồn trú ở phía bắc Baghdad hôm 11/3.\r\n\r\n\"Mỹ đã tiến hành các cuộc tấn công tự vệ chính xác nhằm vào các cơ sở của Kataib Hezbollah trên khắp Iraq\", Reuters dẫn thông cáo của Bộ Quốc phòng Mỹ. \"Những cơ sở chứa vũ khí này bao gồm những nơi chứa vũ khí được sử dụng để nhắm vào binh lính Mỹ và liên quân\".\r\n\r\nCác cuộc tấn công này mang tính \"tự vệ, tương xứng và trực tiếp đáp trả mối đe dọa từ các nhóm dân quân Shiite do Iran chống lưng\", thông cáo nêu.', 'esper.jpg', 1, 50, 1, '0000-00-00'),
(52, 'Căn cứ quân đội Mỹ ở Iraq bị nã rocket, 3 người thiệt mạng', '', '', 'Vụ tấn công xảy ra vào khoảng 19h30 tối 11/3, 3 nhân viên đồn trú tại Trại Taji đã thiệt mạng, trong đó 2 người Mỹ và một người Anh, 12 người khác bị thương, Sputnik dẫn lời quan chức Mỹ cho biết. Chưa có bên nào nhận trách nhiệm về vụ tấn công.\r\n\r\nĐại tá Myles Caggins III, phát ngôn viên chiến dịch Operation Inherent Resolve, đã đăng một thông báo trên Twitter xác nhận vụ tấn công bởi 15 rocket nhỏ, tuy nhiên, bản cập nhật sau đó nói rằng căn cứ đã bị tấn công bằng 18 rocket Katyusha.\r\nBáo cáo trước đó của truyền thông Iraq nói rằng không ai bị thương trong vụ tấn công. Những bức ảnh được chia sẻ trực tuyến bởi cơ quan truyền thông an ninh Iraq cho thấy 3 quả rocket chưa được phóng trong dàn phóng được lắp phía sau xe tải thông thường.\r\n\r\nCuộc tấn công diễn ra khi có tin tức nói rằng Mỹ sẽ chuyển hệ thống phòng không vào Iraq để bảo vệ các căn cứ quân sự Mỹ, chống lại mối đe dọa từ tên lửa đạn đạo và máy bay không người lái.', 'z_iraq_1.jpg', 2, 50, 1, '0000-00-00'),
(53, 'Quân đội Mỹ dừng di chuyển binh sĩ trong 60 ngày để tránh virus corona', 'tieudeSlug', '', 'Các hoạt động luân chuyển binh sĩ và gia đình dự kiến trước đây trong vùng bị ảnh hưởng bởi đại dịch Covid-19 sẽ tạm dừng trong 60 ngày, CNN dẫn lời một quan chức quốc phòng cho biết.\r\n\r\nLầu Năm Góc cũng xem xét liệu có nên tiếp tục các hoạt động tập trận trên toàn thế giới theo kế hoạch đã lên trước đó hay không, nguồn tin cho biết.\r\n\r\nThông báo được đưa ra sau khi các quan chức quân sự tuyên bố thu nhỏ quy mô cuộc tập trận chung ở châu Phi, để bảo vệ binh sĩ Mỹ khỏi nguy cơ lây nhiễm virus corona.\r\nBộ trưởng Quốc phòng Mark Esper đã được thông báo về kế hoạch tạm dừng luân chuyển binh sĩ. Lệnh này sẽ tác động đến hoạt động được gọi là “thay đổi nơi đóng quân thường xuyên” đối với quân đội Mỹ, khi binh sĩ và gia đình chuyển đến nơi đóng quân khác trên khắp thế giới theo lệnh của quân đội Mỹ.\r\n\r\nTuy vậy, việc tạm dừng luân chuyển binh sĩ trước mắt chỉ áp dụng đối với quân đội Mỹ đồn trú ở Italy và Hàn Quốc, những nơi đang bị virus corona tấn công dữ dội. Hàn Quốc có hơn 7.500 ca nhiễm Covid-19, trong đó có 54 ca tử vong. Italy có hơn 10.000 ca nhiễm và 631 người tử vong.', 'z_us_2.jpeg', 2, 50, 1, '0000-00-00'),
(54, 'Khỉ nhiễm Covid-19 tự tạo miễn dịch - thêm hy vọng cho vắc-xin', '', '', 'Giới khoa học trên toàn thế giới đang chạy đua với thời gian để bào chế vắc-xin phòng Covid-19, và thử nghiệm lâm sàng có thể được bắt đầu ở Trung Quốc và Mỹ trong vòng một tháng.\r\n\r\nNhưng các nhà nghiên cứu cũng phát hiện ra động vật có thể nhiễm Covid-19 qua đường mắt, một điều đáng lo ngại vì đồng nghĩa với việc đeo khẩu trang không hoàn toàn bảo vệ được con người, theo South China Morning Post.\r\n\r\nTrước đó, đã có một số lo ngại sau khi có những ca âm tính với virus corona, được ra viện để rồi lại dương tính chỉ vài ngày sau. Tỷ lệ đó là khoảng 0,1-1% trên toàn Trung Quốc, theo truyền thông nhà nước, nhưng ở một số nơi như Quảng Đông, có tới 14% số bệnh nhân ra viện sau đó lại dương tính.\r\n\r\nLo ngại nằm ở chỗ nếu đúng là các bệnh nhân trên bị nhiễm lại cùng chủng virus corona ban đầu, thì vắc-xin có thể sẽ không hiệu quả. Nhưng nghiên cứu của Học viện Y học Trung Quốc trên khỉ, công bố ngày 14/3 trên trang bioRxiv, dành cho các nghiên cứu đang chờ bình duyệt (peer-reviewed), có thể làm giảm đi nỗi lo này.\r\nNhóm nghiên cứu cho bốn con khỉ rezut nhiễm Covid-19. Ba ngày sau chúng bị sốt, khó thở, chán ăn, sụt cân. Đến ngày thứ 7, virus đã lan toàn thân và phá hoại mô phổi đối với một con khỉ.\r\n\r\nNhưng các con khỉ còn lại dần bình phục, hết triệu chứng. Một tháng sau, sau khi chúng xét nghiệm âm tính, hai con khỉ này lại bị cho nhiễm virus trong cả tháng. Thân nhiệt của chúng chỉ tăng nhẹ, mọi thứ khác bình thường.\r\n\r\nHai tuần sau, các nhà khoa học không tìm thấy dấu hiệu virus trong cơ thể chúng, nhưng mức kháng thể khá cao, cho thấy hệ miễn dịch đã sẵn sàng chống lại bệnh.', '9e54c948_677f_11ea_9de8_4adc9756b5c3_image_hires_212102_AFP.jpg', 2, 51, 1, '0000-00-00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `email`, `level`) VALUES
(1, 'quang', 'e10adc3949ba59abbe56e057f20f883e', 'quang@email.com', 1),
(2, 'quang2', 'e10adc3949ba59abbe56e057f20f883e', 'quang2@email.com', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `loaitin`
--
ALTER TABLE `loaitin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idTheLoai` (`idTheLoai`);

--
-- Chỉ mục cho bảng `quangcao`
--
ALTER TABLE `quangcao`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`idTinTuc`),
  ADD KEY `idLoaiTin` (`idLoaiTin`),
  ADD KEY `idTacGia` (`idTacGia`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `loaitin`
--
ALTER TABLE `loaitin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT cho bảng `quangcao`
--
ALTER TABLE `quangcao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `theloai`
--
ALTER TABLE `theloai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `idTinTuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `loaitin`
--
ALTER TABLE `loaitin`
  ADD CONSTRAINT `loaitin_ibfk_1` FOREIGN KEY (`idTheLoai`) REFERENCES `theloai` (`id`);

--
-- Các ràng buộc cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  ADD CONSTRAINT `tintuc_ibfk_1` FOREIGN KEY (`idLoaiTin`) REFERENCES `loaitin` (`id`),
  ADD CONSTRAINT `tintuc_ibfk_2` FOREIGN KEY (`idTacGia`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
