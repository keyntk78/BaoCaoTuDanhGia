-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2022 at 02:46 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `baocaotudanhgia`
--

-- --------------------------------------------------------

--
-- Table structure for table `bao_caos`
--

CREATE TABLE `bao_caos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `moTa` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diemManh` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diemTonTai` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keHoachHanhDong` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diemTDG` int(11) DEFAULT NULL,
  `trangThai` int(11) DEFAULT NULL,
  `nganh_id` int(11) NOT NULL,
  `tieuChi_id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bao_caos`
--

INSERT INTO `bao_caos` (`id`, `moTa`, `diemManh`, `diemTonTai`, `keHoachHanhDong`, `diemTDG`, `trangThai`, `nganh_id`, `tieuChi_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, '<p><span style=\"font-size: 12.0pt; font-family: \'Times New Roman\',serif; mso-fareast-font-family: \'Times New Roman\'; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA; mso-bidi-font-weight: bold;\">Tỷ lệ th&ocirc;i học v&agrave; tỷ lệ SV tốt nghiệp của ng&agrave;nh CNTT được theo d&otilde;i bởi c&aacute;c ph&ograve;ng chức năng (Ph&ograve;ng ĐTĐH, Ph&ograve;ng CTCT&amp;SV), Khoa CNTT. Số liệu được thống k&ecirc; bởi Ph&ograve;ng CTCT&amp;SV v&agrave; được c&ocirc;ng bố v&agrave;o đầu năm học mới cũng như được b&aacute;o c&aacute;o trong bản b&aacute;o c&aacute;o tổng kết cuối năm</span><strong style=\"mso-bidi-font-weight: normal;\"><span style=\"font-size: 12.0pt; font-family: \'Times New Roman\',serif; mso-fareast-font-family: \'Times New Roman\'; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA;\"> <a class=\"is-minhchung\" href=\"/storage/minhchungs/1/26-May-2022-01-08-QD-566-31.5.21-HDTDG-CNTT.pdf\" target=\"_blank\" rel=\"nofollow noopener\">[Tỷ lệ SV th&ocirc;i học, tốt nghiệp]</a></span></strong><span style=\"font-size: 12.0pt; font-family: \'Times New Roman\',serif; mso-fareast-font-family: \'Times New Roman\'; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA; mso-bidi-font-weight: bold;\">. Danh s&aacute;ch c&aacute;c SV thuộc diện cảnh b&aacute;o buộc th&ocirc;i học đều được th&ocirc;ng b&aacute;o đến SV v&agrave; gia đ&igrave;nh. Những SV c&oacute; KQHT v&agrave; r&egrave;n luyện yếu đều được tạo điều kiện l&agrave;m bản cam kết c&oacute; x&aacute;c nhận của CVHT, gia đ&igrave;nh v&agrave; Khoa CNTT để tiếp tục tạo điều kiện học lại hoặc kịp thời điều chỉnh th&aacute;i độ, phương ph&aacute;p học tập đ&uacute;ng đắn <a class=\"is-minhchung\" href=\"/storage/minhchungs/1/26-May-2022-01-09-2b-TL-hướng-dẫn-k&egrave;m-CV-1669-thay-thế-CV-769-31.12.2019.pdf\" target=\"_blank\" rel=\"nofollow noopener\">[Gặp mặt SV yếu k&eacute;m của Khoa CNTT]</a></span></p>\r\n<p class=\"MsoNormal\" style=\"margin-top: 0cm; line-height: normal; mso-pagination: none;\"><span style=\"font-size: 12.0pt; mso-ansi-language: EN-US; mso-bidi-font-weight: bold;\">V&agrave;o đầu mỗi học kỳ GVCV sẽ thống k&ecirc; kết quả học tập của SV để c&oacute; thể đưa ra c&aacute;c cảnh b&aacute;o cũng như c&oacute; được định hướng giải quyết kịp thời chấn chỉnh việc học tập của SV. Ngo&agrave;i GVCV, BCS lớp, Đo&agrave;n Khoa CNTT lu&ocirc;n c&oacute; c&aacute;c c&acirc;u lạc bộ, nh&oacute;m học tập (<em style=\"mso-bidi-font-style: normal;\"><span style=\"color: #0070c0;\">https://www.facebook.com/groups/clb.tinhoc.ntu</span></em>) để hỗ trợ SV trong việc &ocirc;n tập nắm vững kiến thức cũng như c&aacute;c định hướng trong việc học tập. B&ecirc;n cạnh đ&oacute;, hội nghị học tốt của SV được tổ chức h&agrave;ng năm l&agrave; dịp để c&aacute;c SV chia sẻ kỹ năng học tập ở bậc ĐH, l&agrave; cơ hội cho c&aacute;c bạn SV c&oacute; th&agrave;nh t&iacute;ch học tập yếu k&eacute;m được học tập th&ecirc;m kỹ năng nhằm n&acirc;ng cao kết quả học tập của bản th&acirc;n. <span style=\"background: yellow; mso-highlight: yellow;\">Nhờ vậy m&agrave; tỷ lệ SV thuộc diện cảnh b&aacute;o v&agrave; buộc th&ocirc;i học c&oacute; xu hướng giảm dần qua c&aacute;c năm &ndash; cần ph&acirc;n t&iacute;ch</span>. <a class=\"is-minhchung\" href=\"/storage/minhchungs/1/26-May-2022-01-09-2b-TL-hướng-dẫn-k&egrave;m-CV-1669-thay-thế-CV-769-31.12.2019.pdf\" target=\"_blank\" rel=\"nofollow noopener\">[Gặp mặt SV yếu k&eacute;m của Khoa CNTT]</a></span></p>\r\n<p><span style=\"font-size: 12.0pt; font-family: \'Times New Roman\',serif; mso-fareast-font-family: \'Times New Roman\'; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA; mso-bidi-font-weight: bold;\">Ngo&agrave;i c&aacute;c hoạt động tr&ecirc;n, sự quan t&acirc;m của c&aacute;c cấp đối với t&igrave;nh h&igrave;nh học tập cũng như r&egrave;n luyện của sinh vi&ecirc;n được b&aacute;o c&aacute;o h&agrave;ng th&aacute;ng </span><span style=\"font-family: \'Times New Roman\', serif; font-size: 12pt;\">nhằm th&aacute;o gỡ c&aacute;c vướng mắc kịp thời, gi&uacute;p SV y&ecirc;n t&acirc;m học tập, t&igrave;m được phương ph&aacute;p học tập &ndash; r&egrave;n luyện ph&ugrave; hợp </span><span style=\"background: yellow; mso-highlight: yellow;\">n&ecirc;n số SV yếu k&eacute;m bị buộc th&ocirc;i học giảm, tỷ lệ tốt nghiệp trong c&aacute;c năm gần đ&acirc;y lu&ocirc;n tăng (ph&acirc;n t&iacute;ch với Bảng biểu).</span><span style=\"font-family: \'Times New Roman\', serif; font-size: 12pt;\"> B&ecirc;n cạnh đ&oacute;, Trung t&acirc;m QHDN&amp;HTSV đ&atilde; tổ chức hoạt động khảo s&aacute;t số sinh vi&ecirc;n sau khi tốt nghiệp gi&uacute;p Nh&agrave; trường v&agrave; Khoa CNTT ph&acirc;n t&iacute;ch, đối chiếu l&agrave;m căn cứ cải tiến chất lượng đ&agrave;o tạo cho ng&agrave;nh v&agrave; cho Trường</span></p>', '<p><span style=\"font-size: 12.0pt; font-family: \'Times New Roman\',serif; mso-fareast-font-family: \'Times New Roman\'; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA; mso-bidi-font-weight: bold;\">Việc thống k&ecirc;, gi&aacute;m s&aacute;t tỷ lệ th&ocirc;i học/tỷ lệ tốt nghiệp được quan t&acirc;m thực hiện thường xuy&ecirc;n v&agrave; được đối chiếu, so s&aacute;nh với c&aacute;c năm học trước, kh&oacute;a trước l&agrave;m cơ sở để Nh&agrave; trường c&oacute; giải ph&aacute;p cải thiện t&igrave;nh h&igrave;nh SV bỏ học v&agrave; bị buộc th&ocirc;i học, đồng thời c&oacute; định hướng thay đổi, điều chỉnh CTĐT cho ph&ugrave; hợp nhằm đ&aacute;p ứng nhu cầu x&atilde; hội.</span></p>', '<p><span style=\"font-size: 12.0pt; font-family: \'Times New Roman\',serif; mso-fareast-font-family: \'Times New Roman\'; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA; mso-bidi-font-weight: bold;\">Số liệu về tỷ lệ tốt nghiệp chưa được ph&acirc;n t&iacute;ch, chưa c&oacute; sự đối s&aacute;nh với c&aacute;c Ng&agrave;nh, c&aacute;c Trường kh&aacute;c, để c&oacute; thể đề xuất c&aacute;c biện ph&aacute;p khả thi để hỗ trợ người học tốt nghiệp nhiều hơn.</span></p>', '<p><span style=\"font-size: 12.0pt; font-family: \'Times New Roman\',serif; mso-fareast-font-family: \'Times New Roman\'; color: black; mso-themecolor: text1; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA; mso-bidi-font-weight: bold;\">Từ học kỳ 1 năm học 2020 - 2021, việc cảnh b&aacute;o sớm kết quả học tập của sinh vi&ecirc;n được giao cho CVHT, qua đ&oacute; gi&uacute;p CVHT v&agrave; BCS lớp nắm được t&igrave;nh h&igrave;nh học tập v&agrave; r&egrave;n luyện sớm hơn. Từ đ&oacute;, c&oacute; thể c&oacute; c&aacute;c giải ph&aacute;p kịp thời hỗ trợ c&aacute;c SV kh&oacute; khăn, tr&aacute;nh t&igrave;nh trạng bị động khi x&eacute;t cảnh b&aacute;o v&agrave;o đầu mỗi năm học. </span></p>', 4, NULL, 1, 2, NULL, '2022-05-26 06:12:07', '2022-05-26 07:15:20');

-- --------------------------------------------------------

--
-- Table structure for table `bao_cao_sao_luus`
--

CREATE TABLE `bao_cao_sao_luus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `moTa` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diemManh` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diemTonTai` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keHoachHanhDong` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diemTDG` int(11) DEFAULT NULL,
  `nganh_id` int(11) NOT NULL,
  `tieuChi_id` int(11) NOT NULL,
  `baoCao_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bao_cao_sao_luus`
--

INSERT INTO `bao_cao_sao_luus` (`id`, `moTa`, `diemManh`, `diemTonTai`, `keHoachHanhDong`, `diemTDG`, `nganh_id`, `tieuChi_id`, `baoCao_id`, `created_at`, `updated_at`) VALUES
(6, '<p><span style=\"font-size: 12.0pt; font-family: \'Times New Roman\',serif; mso-fareast-font-family: \'Times New Roman\'; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA; mso-bidi-font-weight: bold;\">Tỷ lệ th&ocirc;i học v&agrave; tỷ lệ SV tốt nghiệp của ng&agrave;nh CNTT được theo d&otilde;i bởi c&aacute;c ph&ograve;ng chức năng (Ph&ograve;ng ĐTĐH, Ph&ograve;ng CTCT&amp;SV), Khoa CNTT. Số liệu được thống k&ecirc; bởi Ph&ograve;ng CTCT&amp;SV v&agrave; được c&ocirc;ng bố v&agrave;o đầu năm học mới cũng như được b&aacute;o c&aacute;o trong bản b&aacute;o c&aacute;o tổng kết cuối năm</span><strong style=\"mso-bidi-font-weight: normal;\"><span style=\"font-size: 12.0pt; font-family: \'Times New Roman\',serif; mso-fareast-font-family: \'Times New Roman\'; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA;\"> <a class=\"is-minhchung\" href=\"/storage/minhchungs/1/26-May-2022-01-08-QD-566-31.5.21-HDTDG-CNTT.pdf\" target=\"_blank\" rel=\"nofollow noopener\">[Tỷ lệ SV th&ocirc;i học, tốt nghiệp]</a></span></strong><span style=\"font-size: 12.0pt; font-family: \'Times New Roman\',serif; mso-fareast-font-family: \'Times New Roman\'; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA; mso-bidi-font-weight: bold;\">. Danh s&aacute;ch c&aacute;c SV thuộc diện cảnh b&aacute;o buộc th&ocirc;i học đều được th&ocirc;ng b&aacute;o đến SV v&agrave; gia đ&igrave;nh. Những SV c&oacute; KQHT v&agrave; r&egrave;n luyện yếu đều được tạo điều kiện l&agrave;m bản cam kết c&oacute; x&aacute;c nhận của CVHT, gia đ&igrave;nh v&agrave; Khoa CNTT để tiếp tục tạo điều kiện học lại hoặc kịp thời điều chỉnh th&aacute;i độ, phương ph&aacute;p học tập đ&uacute;ng đắn <a class=\"is-minhchung\" href=\"/storage/minhchungs/1/26-May-2022-01-09-2b-TL-hướng-dẫn-k&egrave;m-CV-1669-thay-thế-CV-769-31.12.2019.pdf\" target=\"_blank\" rel=\"nofollow noopener\">[Gặp mặt SV yếu k&eacute;m của Khoa CNTT]</a></span></p>\r\n<p class=\"MsoNormal\" style=\"margin-top: 0cm; line-height: normal; mso-pagination: none;\"><span style=\"font-size: 12.0pt; mso-ansi-language: EN-US; mso-bidi-font-weight: bold;\">V&agrave;o đầu mỗi học kỳ GVCV sẽ thống k&ecirc; kết quả học tập của SV để c&oacute; thể đưa ra c&aacute;c cảnh b&aacute;o cũng như c&oacute; được định hướng giải quyết kịp thời chấn chỉnh việc học tập của SV. Ngo&agrave;i GVCV, BCS lớp, Đo&agrave;n Khoa CNTT lu&ocirc;n c&oacute; c&aacute;c c&acirc;u lạc bộ, nh&oacute;m học tập (<em style=\"mso-bidi-font-style: normal;\"><span style=\"color: #0070c0;\">https://www.facebook.com/groups/clb.tinhoc.ntu</span></em>) để hỗ trợ SV trong việc &ocirc;n tập nắm vững kiến thức cũng như c&aacute;c định hướng trong việc học tập. B&ecirc;n cạnh đ&oacute;, hội nghị học tốt của SV được tổ chức h&agrave;ng năm l&agrave; dịp để c&aacute;c SV chia sẻ kỹ năng học tập ở bậc ĐH, l&agrave; cơ hội cho c&aacute;c bạn SV c&oacute; th&agrave;nh t&iacute;ch học tập yếu k&eacute;m được học tập th&ecirc;m kỹ năng nhằm n&acirc;ng cao kết quả học tập của bản th&acirc;n. <span style=\"background: yellow; mso-highlight: yellow;\">Nhờ vậy m&agrave; tỷ lệ SV thuộc diện cảnh b&aacute;o v&agrave; buộc th&ocirc;i học c&oacute; xu hướng giảm dần qua c&aacute;c năm &ndash; cần ph&acirc;n t&iacute;ch</span>. <a class=\"is-minhchung\" href=\"/storage/minhchungs/1/26-May-2022-01-09-2b-TL-hướng-dẫn-k&egrave;m-CV-1669-thay-thế-CV-769-31.12.2019.pdf\" target=\"_blank\" rel=\"nofollow noopener\">[Gặp mặt SV yếu k&eacute;m của Khoa CNTT]</a></span></p>\r\n<p><span style=\"font-size: 12.0pt; font-family: \'Times New Roman\',serif; mso-fareast-font-family: \'Times New Roman\'; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA; mso-bidi-font-weight: bold;\">Ngo&agrave;i c&aacute;c hoạt động tr&ecirc;n, sự quan t&acirc;m của c&aacute;c cấp đối với t&igrave;nh h&igrave;nh học tập cũng như r&egrave;n luyện của sinh vi&ecirc;n được b&aacute;o c&aacute;o h&agrave;ng th&aacute;ng </span><span style=\"font-family: \'Times New Roman\', serif; font-size: 12pt;\">nhằm th&aacute;o gỡ c&aacute;c vướng mắc kịp thời, gi&uacute;p SV y&ecirc;n t&acirc;m học tập, t&igrave;m được phương ph&aacute;p học tập &ndash; r&egrave;n luyện ph&ugrave; hợp </span><span style=\"background: yellow; mso-highlight: yellow;\">n&ecirc;n số SV yếu k&eacute;m bị buộc th&ocirc;i học giảm, tỷ lệ tốt nghiệp trong c&aacute;c năm gần đ&acirc;y lu&ocirc;n tăng (ph&acirc;n t&iacute;ch với Bảng biểu).</span><span style=\"font-family: \'Times New Roman\', serif; font-size: 12pt;\"> B&ecirc;n cạnh đ&oacute;, Trung t&acirc;m QHDN&amp;HTSV đ&atilde; tổ chức hoạt động khảo s&aacute;t số sinh vi&ecirc;n sau khi tốt nghiệp gi&uacute;p Nh&agrave; trường v&agrave; Khoa CNTT ph&acirc;n t&iacute;ch, đối chiếu l&agrave;m căn cứ cải tiến chất lượng đ&agrave;o tạo cho ng&agrave;nh v&agrave; cho Trường</span></p>', '<p><span style=\"font-size: 12.0pt; font-family: \'Times New Roman\',serif; mso-fareast-font-family: \'Times New Roman\'; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA; mso-bidi-font-weight: bold;\">Việc thống k&ecirc;, gi&aacute;m s&aacute;t tỷ lệ th&ocirc;i học/tỷ lệ tốt nghiệp được quan t&acirc;m thực hiện thường xuy&ecirc;n v&agrave; được đối chiếu, so s&aacute;nh với c&aacute;c năm học trước, kh&oacute;a trước l&agrave;m cơ sở để Nh&agrave; trường c&oacute; giải ph&aacute;p cải thiện t&igrave;nh h&igrave;nh SV bỏ học v&agrave; bị buộc th&ocirc;i học, đồng thời c&oacute; định hướng thay đổi, điều chỉnh CTĐT cho ph&ugrave; hợp nhằm đ&aacute;p ứng nhu cầu x&atilde; hội.</span></p>', '<p><span style=\"font-size: 12.0pt; font-family: \'Times New Roman\',serif; mso-fareast-font-family: \'Times New Roman\'; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA; mso-bidi-font-weight: bold;\">Số liệu về tỷ lệ tốt nghiệp chưa được ph&acirc;n t&iacute;ch, chưa c&oacute; sự đối s&aacute;nh với c&aacute;c Ng&agrave;nh, c&aacute;c Trường kh&aacute;c, để c&oacute; thể đề xuất c&aacute;c biện ph&aacute;p khả thi để hỗ trợ người học tốt nghiệp nhiều hơn.</span></p>', '<p><span style=\"font-size: 12.0pt; font-family: \'Times New Roman\',serif; mso-fareast-font-family: \'Times New Roman\'; color: black; mso-themecolor: text1; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA; mso-bidi-font-weight: bold;\">Từ học kỳ 1 năm học 2020 - 2021, việc cảnh b&aacute;o sớm kết quả học tập của sinh vi&ecirc;n được giao cho CVHT, qua đ&oacute; gi&uacute;p CVHT v&agrave; BCS lớp nắm được t&igrave;nh h&igrave;nh học tập v&agrave; r&egrave;n luyện sớm hơn. Từ đ&oacute;, c&oacute; thể c&oacute; c&aacute;c giải ph&aacute;p kịp thời hỗ trợ c&aacute;c SV kh&oacute; khăn, tr&aacute;nh t&igrave;nh trạng bị động khi x&eacute;t cảnh b&aacute;o v&agrave;o đầu mỗi năm học. </span></p>', 4, 1, 2, 2, '2022-05-26 07:13:57', '2022-05-26 07:13:57');

-- --------------------------------------------------------

--
-- Table structure for table `binh_luans`
--

CREATE TABLE `binh_luans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `noiDung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nguoiDung_id` int(11) NOT NULL,
  `baoCao_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `binh_luans`
--

INSERT INTO `binh_luans` (`id`, `noiDung`, `nguoiDung_id`, `baoCao_id`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'hallo', 1, 1, 0, '2022-05-17 08:06:54', '2022-05-17 08:06:54'),
(2, 'hallo', 1, 1, 0, '2022-05-18 05:31:08', '2022-05-18 05:31:08'),
(3, 'hà lú', 1, 1, 1, '2022-05-18 05:53:23', '2022-05-18 05:53:23'),
(4, 'hihi', 1, 1, 0, '2022-05-18 05:53:57', '2022-05-18 05:53:57'),
(5, 'phản hồi nè', 1, 1, 1, '2022-05-18 05:56:58', '2022-05-18 05:56:58'),
(6, 'phản hồi nữa nè', 1, 1, 4, '2022-05-18 05:57:12', '2022-05-18 05:57:12'),
(7, 'haha', 1, 1, 0, '2022-05-18 05:57:18', '2022-05-18 05:57:18'),
(8, 'ha', 1, 1, 0, '2022-05-18 05:58:10', '2022-05-18 05:58:10'),
(9, 'huhu', 1, 1, 0, '2022-05-18 06:01:02', '2022-05-18 06:01:02'),
(10, 'hello', 1, 1, 0, '2022-05-18 06:01:15', '2022-05-18 06:01:15'),
(11, 'haha', 1, 1, 4, '2022-05-18 06:13:04', '2022-05-18 06:13:04'),
(12, 'hí', 1, 1, 0, '2022-05-18 06:13:14', '2022-05-18 06:13:14'),
(13, 'hi', 1, 1, 0, '2022-05-24 06:05:04', '2022-05-24 06:05:04'),
(14, 'xin chào', 3, 2, 0, '2022-05-26 07:19:26', '2022-05-26 07:19:26'),
(15, 'hi', 4, 2, 14, '2022-05-26 07:19:36', '2022-05-26 07:19:36');

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_minh_chungs`
--

CREATE TABLE `chi_tiet_minh_chungs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `minhChung_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `don_vis`
--

CREATE TABLE `don_vis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `don_vis`
--

INSERT INTO `don_vis` (`id`, `ten`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Khoa Công nghệ thông tin', '2022-05-17 05:16:55', '2022-05-17 05:16:55', NULL),
(2, 'Phòng Đảm bảo chất lượng và khảo thí', '2022-05-26 02:26:31', '2022-05-26 02:26:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dot_danh_gias`
--

CREATE TABLE `dot_danh_gias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namHoc` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dot_danh_gias`
--

INSERT INTO `dot_danh_gias` (`id`, `ten`, `namHoc`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Đợt đánh giá chương trình đạo tạo khoa công nghệ thông tin', 2022, '2022-05-26 02:24:46', '2022-05-26 02:24:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `giai_doans`
--

CREATE TABLE `giai_doans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ngayBD` datetime NOT NULL,
  `ngayKT` datetime NOT NULL,
  `hoatDong_id` int(11) NOT NULL,
  `dotDanhGia_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `giai_doans`
--

INSERT INTO `giai_doans` (`id`, `ngayBD`, `ngayKT`, `hoatDong_id`, `dotDanhGia_id`, `created_at`, `updated_at`) VALUES
(1, '2022-05-26 00:01:00', '2022-06-02 23:59:00', 1, 1, '2022-05-26 02:24:46', '2022-05-26 02:24:46'),
(2, '2022-06-03 00:01:00', '2022-06-05 23:59:00', 2, 1, '2022-05-26 02:28:04', '2022-05-26 02:28:04'),
(3, '2022-06-06 00:01:00', '2022-06-08 23:59:00', 3, 1, '2022-05-26 02:28:04', '2022-05-26 02:28:04');

-- --------------------------------------------------------

--
-- Table structure for table `hoat_dongs`
--

CREATE TABLE `hoat_dongs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hoat_dongs`
--

INSERT INTO `hoat_dongs` (`id`, `ten`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Viết báo cáo', 'viet-bao-cao', NULL, NULL),
(2, 'Nhận xét báo cáo', 'nhan-xet-bao-cao', NULL, NULL),
(3, 'Phản biện báo cáo', 'phan-bien-bao-cao', NULL, NULL),
(4, 'Viết báo cáo', 'viet-bao-cao', NULL, NULL),
(5, 'Nhận xét báo cáo', 'nhan-xet-bao-cao', NULL, NULL),
(6, 'Phản biện báo cáo', 'phan-bien-bao-cao', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_04_23_103042_create_tieu_chuans_table', 1),
(6, '2022_04_23_174505_create_tieu_chis_table', 1),
(7, '2022_04_24_010926_create_yeu_caus_table', 1),
(8, '2022_04_24_011027_create_moc_chuans_table', 1),
(9, '2022_04_24_011226_create_tu_khoas_table', 1),
(10, '2022_04_24_011311_create_tieu_chi_tu_khoas_table', 1),
(11, '2022_04_24_124251_create_nganhs_table', 1),
(12, '2022_04_24_124309_create_nhoms_table', 1),
(13, '2022_04_24_124638_create_don_vis_table', 1),
(14, '2022_04_24_124747_create_dot_danh_gias_table', 1),
(15, '2022_04_24_124932_create_nganh_dot_danh_gias_table', 1),
(16, '2022_04_25_121709_create_quyen_nhoms_table', 1),
(17, '2022_04_25_122232_create_nhom_quyens_table', 1),
(18, '2022_05_03_125644_create_giai_doans_table', 1),
(19, '2022_05_03_125719_create_hoat_dongs_table', 1),
(20, '2022_05_09_153439_create_bao_caos_table', 1),
(21, '2022_05_11_160450_create_vai_tros_table', 1),
(22, '2022_05_11_160916_create_nhom_nguoi_dungs_table', 1),
(23, '2022_05_11_161044_create_quyen_nguoi_dungs_table', 1),
(24, '2022_05_11_161118_create_nguoi_dung_quyens_table', 1),
(25, '2022_05_15_075004_create_binh_luans_table', 1),
(26, '2022_05_16_131417_add_column_avatar_user', 1),
(27, '2022_05_16_155608_create_bao_cao_sao_luus_table', 1),
(28, '2022_05_17_133727_create_minh_chungs_table', 2),
(41, '2022_05_26_094350_create_vai_tro_h_t_s_table', 3),
(42, '2022_05_26_094526_create_nguoi_dung_vai_tro_h_t_s_table', 3),
(43, '2022_05_26_094617_create_quyen_h_t_s_table', 3),
(44, '2022_05_26_094646_create_vai_tro_h_t_quyen_h_t_s_table', 3),
(46, '2022_05_27_104049_create_chi_tiet_minh_chungs_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `minh_chungs`
--

CREATE TABLE `minh_chungs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngayKhaoSat` date DEFAULT NULL,
  `ngayBanHanh` date DEFAULT NULL,
  `noiBanHanh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `donVi_id` int(11) NOT NULL,
  `isMCGOP` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `minh_chungs`
--

INSERT INTO `minh_chungs` (`id`, `ten`, `ngayKhaoSat`, `ngayBanHanh`, `noiBanHanh`, `link`, `donVi_id`, `isMCGOP`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'Tỷ lệ SV thôi học, tốt nghiệp', '2020-03-01', '2020-01-02', 'Đại học Nha Trang', '/storage/minhchungs/1/26-May-2022-01-08-QD-566-31.5.21-HDTDG-CNTT.pdf', 1, 0, '2022-05-26 06:08:29', '2022-05-26 06:08:29', NULL),
(4, 'Gặp mặt SV yếu kém của Khoa CNTT', '2020-03-03', '2020-02-03', 'Đại học Nha Trang', '/storage/minhchungs/1/26-May-2022-01-09-2b-TL-hướng-dẫn-kèm-CV-1669-thay-thế-CV-769-31.12.2019.pdf', 1, 0, '2022-05-26 06:09:03', '2022-05-26 06:09:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `moc_chuans`
--

CREATE TABLE `moc_chuans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `noiDung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tieuChi_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `moc_chuans`
--

INSERT INTO `moc_chuans` (`id`, `noiDung`, `tieuChi_id`, `created_at`, `updated_at`) VALUES
(1, 'Tỷ lệ thôi học, tốt nghiệp đúng hạn (không kể thời gian kéo dài) được xác lập. Danh sách thôi học, tốt nghiệp được cập nhật hằng năm', 47, '2022-05-26 02:09:47', '2022-05-26 02:09:47'),
(2, 'Tỷ lệ thôi học, tốt nghiệp được đánh giá, phân tích, giám sát', 47, '2022-05-26 02:09:47', '2022-05-26 02:09:47'),
(3, 'Đối sánh hằng năm về tỉ lệ thôi học, tỉ lệ tốt nghiệp để cải tiến chất lượng CTĐT', 47, '2022-05-26 02:09:47', '2022-05-26 02:09:47'),
(4, 'Thời gian tốt nghiệp trung bình trong cùng CTĐT được tính toán đối với tất cả các hệ/hình thức đào tạo trong chu kỳ đánh giá', 48, '2022-05-26 02:10:56', '2022-05-26 02:10:56'),
(5, 'Tìm hiểu, phân tích nguyên nhân NH tốt nghiệp muộn để đề xuất các biện pháp hỗ trợ NH giảm tối đa thời lượng học tập', 48, '2022-05-26 02:10:56', '2022-05-26 02:10:56'),
(6, 'Có tổ chức tổng kết/đánh giá hiệu quả các biện pháp hỗ trợ NH rút ngắn thời gian tốt nghiệp', 48, '2022-05-26 02:10:56', '2022-05-26 02:10:56'),
(7, 'Có bộ phận/quy trình thống kê/lưu trữ danh sách NH tốt nghiệp có việc làm, vị trí làm việc, mức thu nhập bình quân, đơn vị công tác trong thời gian đánh giá', 49, '2022-05-26 02:11:59', '2022-05-26 02:11:59'),
(8, 'Có số liệu tin cậy về tỉ lệ NH có việc làm trong vòng 6 tháng hoặc 12 tháng sau khi tốt nghiệp', 49, '2022-05-26 02:11:59', '2022-05-26 02:11:59'),
(9, 'Tổ chức thực hiện đối sánh tỉ lệ NH tốt nghiệp có việc làm giữa các CTĐT trong CSGD với cùng hình thức đào tạo, đối sánh cùng ngành/chuyên ngành đào tạo trong nước/quốc tế', 49, '2022-05-26 02:11:59', '2022-05-26 02:11:59'),
(10, 'Tổ chức thảo luận, phân tích nguyên nhân, đề xuất các biện pháp khắc phục; thực hiện các phương án hỗ trợ NH tốt nghiệp có việc làm', 49, '2022-05-26 02:11:59', '2022-05-26 02:11:59'),
(11, 'Loại hình và số lượng các hoạt động nghiên cứu của NH được xác lập', 50, '2022-05-26 02:13:21', '2022-05-26 02:13:21'),
(12, 'Loại hình và số lượng các hoạt động nghiên cứu của NH được giám sát', 50, '2022-05-26 02:13:21', '2022-05-26 02:13:21'),
(13, 'Có hệ thống theo dõi, giám sát loại hình nghiên cứu và các hoạt động NCKH của NH', 50, '2022-05-26 02:13:21', '2022-05-26 02:13:21'),
(14, 'Có thực hiện việc đối sánh loại hình và số lượng các hoạt động nghiên cứu của NH giữa các CTĐT trong cùng CSGD, giữa các CSGD khác nhau', 50, '2022-05-26 02:13:21', '2022-05-26 02:13:21'),
(15, 'Có các đề xuất/đầu tư NCKH phù hợp với xu thế phát triển của thời đại, phù hợp với khả năng của NH', 50, '2022-05-26 02:13:21', '2022-05-26 02:13:21'),
(16, 'Thực hiện thống kê, phân tích, đánh giá mức độ hài lòng của các bên liên quan (cán bộ nhân viên, GV, NH, NH đã tốt nghiệp, nhà tuyển dụng) về hoạt động NCKH, dịch vụ hỗ trợ GV, NH, cơ sở vật chất,…', 51, '2022-05-26 02:14:21', '2022-05-26 02:14:21'),
(17, 'Mức độ hài lòng được so sánh với kết quả khảo sát mức độ hài lòng trước đó của chính CTĐT hoặc của các CTĐT khác trong và ngoài CSGD', 51, '2022-05-26 02:14:21', '2022-05-26 02:14:21'),
(18, 'Kết quả khảo sát mức độ hài lòng và đối sánh được sử dụng làm căn cứ lập kế hoạch cải tiến chất lượng', 51, '2022-05-26 02:14:21', '2022-05-26 02:14:21');

-- --------------------------------------------------------

--
-- Table structure for table `nganhs`
--

CREATE TABLE `nganhs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `donVi_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nganhs`
--

INSERT INTO `nganhs` (`id`, `ten`, `donVi_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Công nghệ thông tin', 1, '2022-05-17 07:56:17', '2022-05-26 02:40:25', NULL),
(2, 'Hệ thống thông tin quản lý', 1, '2022-05-26 02:26:48', '2022-05-26 02:41:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nganh_dot_danh_gias`
--

CREATE TABLE `nganh_dot_danh_gias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nganh_id` int(11) NOT NULL,
  `dotDanhGia_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nganh_dot_danh_gias`
--

INSERT INTO `nganh_dot_danh_gias` (`id`, `nganh_id`, `dotDanhGia_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-05-26 02:24:46', '2022-05-26 02:24:46'),
(2, 2, 1, '2022-05-26 02:28:04', '2022-05-26 02:28:04');

-- --------------------------------------------------------

--
-- Table structure for table `nguoi_dung_quyens`
--

CREATE TABLE `nguoi_dung_quyens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nhomNguoiDung_id` int(11) NOT NULL,
  `quyenNguoiDung_id` int(11) NOT NULL,
  `baoCao_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nguoi_dung_quyens`
--

INSERT INTO `nguoi_dung_quyens` (`id`, `nhomNguoiDung_id`, `quyenNguoiDung_id`, `baoCao_id`, `created_at`, `updated_at`) VALUES
(6, 1, 1, 1, '2022-05-24 06:01:24', '2022-05-24 06:01:24'),
(7, 1, 2, 1, '2022-05-24 06:01:35', '2022-05-24 06:01:35'),
(8, 1, 3, 1, '2022-05-24 06:01:35', '2022-05-24 06:01:35');

-- --------------------------------------------------------

--
-- Table structure for table `nguoi_dung_vai_tro_h_t_s`
--

CREATE TABLE `nguoi_dung_vai_tro_h_t_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nguoiDung_id` int(11) NOT NULL,
  `vaiTroHT_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nguoi_dung_vai_tro_h_t_s`
--

INSERT INTO `nguoi_dung_vai_tro_h_t_s` (`id`, `nguoiDung_id`, `vaiTroHT_id`, `created_at`, `updated_at`) VALUES
(2, 1, 8, '2022-05-26 05:36:05', '2022-05-26 05:36:05'),
(3, 3, 7, '2022-05-26 05:36:13', '2022-05-26 05:36:13'),
(4, 4, 8, '2022-05-26 06:31:11', '2022-05-26 06:31:11');

-- --------------------------------------------------------

--
-- Table structure for table `nhoms`
--

CREATE TABLE `nhoms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nganh_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nhoms`
--

INSERT INTO `nhoms` (`id`, `ten`, `nganh_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Nhóm 1', 1, '2022-05-26 06:10:09', '2022-05-26 06:34:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nhom_nguoi_dungs`
--

CREATE TABLE `nhom_nguoi_dungs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nhom_id` int(11) NOT NULL,
  `nguoiDung_id` int(11) NOT NULL,
  `vaiTro_id` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nhom_nguoi_dungs`
--

INSERT INTO `nhom_nguoi_dungs` (`id`, `nhom_id`, `nguoiDung_id`, `vaiTro_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 3, '2022-05-24 05:22:15', '2022-05-24 05:40:25'),
(3, 2, 4, 1, '2022-05-26 06:34:14', '2022-05-26 06:34:14');

-- --------------------------------------------------------

--
-- Table structure for table `nhom_quyens`
--

CREATE TABLE `nhom_quyens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nhom_id` int(11) NOT NULL,
  `quyenNhom_id` int(11) NOT NULL,
  `tieuChuan_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nhom_quyens`
--

INSERT INTO `nhom_quyens` (`id`, `nhom_id`, `quyenNhom_id`, `tieuChuan_id`, `created_at`, `updated_at`) VALUES
(2, 2, 1, 2, '2022-05-26 06:10:09', '2022-05-26 06:10:09'),
(3, 2, 1, 3, '2022-05-26 06:10:09', '2022-05-26 06:10:09'),
(4, 2, 1, 4, '2022-05-26 06:10:09', '2022-05-26 06:10:09'),
(5, 2, 2, 5, '2022-05-26 06:10:09', '2022-05-26 06:10:09'),
(6, 2, 2, 6, '2022-05-26 06:10:09', '2022-05-26 06:10:09');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quyen_h_t_s`
--

CREATE TABLE `quyen_h_t_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quyen_h_t_s`
--

INSERT INTO `quyen_h_t_s` (`id`, `ten`, `slug`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Quản lý tiêu chuẩn', 'quan-ly-tieu-chuan', 0, NULL, NULL),
(2, 'Xem danh sách tiêu chuẩn', 'xem-danh-sach-tieu-chuan', 1, NULL, NULL),
(3, 'Xem chi tiết tiêu chuẩn', 'xem-chi-tiet-tieu-chuan', 1, NULL, NULL),
(4, 'Thêm tiêu chuẩn', 'them-tieu-chuan', 1, NULL, NULL),
(5, 'Xóa tiêu chuẩn', 'xoa-tieu-chuan', 1, NULL, NULL),
(6, 'Sửa tiêu chuẩn', 'sua-tieu-chuan', 1, NULL, NULL),
(7, 'Quản lý tiêu chí', 'quan-ly-tieu-chi', 0, NULL, NULL),
(8, 'Xem danh sách tiêu chí', 'xem-danh-sach-tieu-chi', 7, NULL, NULL),
(9, 'Xem chi tiết tiêu chí', 'xem-chi-tiet-tieu-chi', 7, NULL, NULL),
(10, 'Thêm tiêu chí', 'them-tieu-chi', 7, NULL, NULL),
(11, 'Xóa tiêu chí', 'xoa-tieu-chi', 7, NULL, NULL),
(12, 'Sửa tiêu chí', 'sua-tieu-chi', 7, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quyen_nguoi_dungs`
--

CREATE TABLE `quyen_nguoi_dungs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quyen_nguoi_dungs`
--

INSERT INTO `quyen_nguoi_dungs` (`id`, `ten`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Viết báo cáo', 'viet-bao-cao', NULL, NULL),
(2, 'Nhận xét báo cáo', 'nhan-xet-bao-cao', NULL, NULL),
(3, 'Phản biện báo cáo', 'phan-bien-bao-cao', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quyen_nhoms`
--

CREATE TABLE `quyen_nhoms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quyen_nhoms`
--

INSERT INTO `quyen_nhoms` (`id`, `ten`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Viết báo cáo', 'viet-bao-cao', NULL, NULL),
(2, 'Nhận xét báo cáo', 'nhan-xet-bao-cao', NULL, NULL),
(3, 'Phản biện báo cáo', 'phan-bien-bao-cao', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tieu_chis`
--

CREATE TABLE `tieu_chis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stt` int(11) NOT NULL,
  `ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tieuChuan_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tieu_chis`
--

INSERT INTO `tieu_chis` (`id`, `stt`, `ten`, `tieuChuan_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 1, 'Mục tiêu của chương trình đào tạo được xác định rõ ràng, phù hợp với sứ mạng và tầm nhìn của cơ sở giáo dục đại học, phù hợp với mục tiêu của giáo dục đại học quy định tại Luật Giáo dục Đại học', 2, '2022-05-26 01:49:27', '2022-05-26 01:49:27', NULL),
(3, 2, 'Chuẩn đầu ra của chương trình đào tạo được xác định rõ ràng, bao quát được cả các yêu cầu chung và yêu cầu chuyên biệt mà người học cần đạt được sau khi hoàn thành chương trình đào tạo', 2, '2022-05-26 01:49:53', '2022-05-26 01:49:53', NULL),
(4, 3, 'Chuẩn đầu ra của chương trình đào tạo phản ánh được yêu cầu của các bên liên quan, được định kỳ rà soát, điều chỉnh và được công bố công khai', 2, '2022-05-26 01:52:20', '2022-05-26 01:52:20', NULL),
(5, 1, 'Bản mô tả chương trình đào tạo đầy đủ thông tin và cập nhật', 3, '2022-05-26 01:52:51', '2022-05-26 01:52:51', NULL),
(6, 2, 'Đề cương các học phần đầy đủ thông tin và cập nhật', 3, '2022-05-26 01:53:01', '2022-05-26 01:53:01', NULL),
(7, 3, 'Bản mô tả chương trình đào tạo và đề cương các học phần được công bố công khai và các bên liên quan dễ dàng tiếp cận', 3, '2022-05-26 01:53:10', '2022-05-26 01:53:10', NULL),
(8, 1, 'Chương trình dạy học được thiết kế dựa trên chuẩn đầu ra', 4, '2022-05-26 01:53:30', '2022-05-26 01:53:30', NULL),
(9, 2, 'Đóng góp của mỗi học phần trong việc đạt được chuẩn đầu ra là rõ ràng', 4, '2022-05-26 01:53:45', '2022-05-26 01:53:45', NULL),
(10, 3, 'Chương trình dạy học có cấu trúc, trình tự logic; nội dung cập nhật và có tính tích hợp', 4, '2022-05-26 01:53:58', '2022-05-26 01:53:58', NULL),
(11, 1, 'Triết lý giáo dục hoặc mục tiêu giáo dục được tuyên bố rõ ràng và được phổ biến tới các bên liên quan', 5, '2022-05-26 01:54:17', '2022-05-26 01:54:17', NULL),
(12, 2, 'Các hoạt động dạy và học được thiết kế phù hợp để đạt được chuẩn đầu ra', 5, '2022-05-26 01:54:22', '2022-05-26 01:54:22', NULL),
(13, 3, 'Các hoạt động dạy và học thúc đẩy việc rèn luyện các kỹ năng, nâng cao khả năng học tập suốt đời của người học', 5, '2022-05-26 01:54:36', '2022-05-26 01:54:36', NULL),
(14, 1, 'Việc đánh giá kết quả học tập của người học được thiết kế phù hợp với mức độ đạt được chuẩn đầu ra', 6, '2022-05-26 01:54:48', '2022-05-26 01:54:48', NULL),
(15, 2, 'Các quy định về đánh giá kết quả học tập của người học (bao gồm thời gian, phương pháp, tiêu chí, trọng số, cơ chế phản hồi và các nội dung liên quan) rõ ràng và được thông báo công khai tới người học.', 6, '2022-05-26 01:54:59', '2022-05-26 01:54:59', NULL),
(16, 3, 'Phương pháp đánh giá kết quả học tập đa dạng, đảm bảo độ giá trị, độ tin cậy và sự công bằng', 6, '2022-05-26 01:55:09', '2022-05-26 01:55:09', NULL),
(17, 4, 'Kết quả đánh giá được phản hồi kịp thời để người học cải thiện việc học tập', 6, '2022-05-26 01:55:18', '2022-05-26 01:55:18', NULL),
(18, 5, 'Người học tiếp cận dễ dàng với quy trình khiếu nại về kết quả học tập', 6, '2022-05-26 01:55:29', '2022-05-26 01:55:29', NULL),
(19, 1, 'Việc quy hoạch đội ngũ giảng viên, nghiên cứu viên (bao gồm việc thu hút, tiếp nhận, bổ nhiệm, bố trí, chấm dứt hợp đồng và cho nghỉ hưu) được thực hiện đáp ứng nhu cầu về đào tạo, nghiên cứu khoa học và các hoạt động phục vụ cộng đồng', 7, '2022-05-26 01:55:40', '2022-05-26 01:55:40', NULL),
(20, 2, 'Tỉ lệ giảng viên/người học và khối lượng công việc của đội ngũ giảng viên, nghiên cứu viên được đo lường, giám sát làm căn cứ cải tiến chất lượng hoạt động đào tạo,  nghiên cứu khoa học và các hoạt động phục vụ cộng đồng', 7, '2022-05-26 01:55:49', '2022-05-26 01:55:49', NULL),
(21, 3, 'Các tiêu chí tuyển dụng và lựa chọn giảng viên, nghiên cứu viên (bao gồm cả đạo đức và năng lực học thuật) để bổ nhiệm, điều chuyển được xác định và phổ biến công khai', 7, '2022-05-26 01:55:59', '2022-05-26 01:55:59', NULL),
(22, 4, 'Năng lực của đội ngũ giảng viên, nghiên cứu viên được xác định và được đánh giá', 7, '2022-05-26 02:01:10', '2022-05-26 02:01:10', NULL),
(23, 5, 'Nhu cầu về đào tạo và phát triển chuyên môn của đội ngũ giảng viên, nghiên cứu viên được xác định và có các hoạt động triển khai để đáp ứng nhu cầu đó', 7, '2022-05-26 02:01:20', '2022-05-26 02:01:20', NULL),
(24, 6, 'Việc quản trị theo kết quả công việc của giảng viên, nghiên cứu viên (gồm cả khen thưởng và công nhận) được triển khai để tạo động lực và hỗ trợ cho đào tạo, nghiên cứu khoa học và các hoạt động phục vụ cộng đồng', 7, '2022-05-26 02:01:31', '2022-05-26 02:01:31', NULL),
(25, 7, 'Các loại hình và số lượng các hoạt động nghiên cứu của giảng viên, nghiên cứu viên được xác lập, giám sát và đối sánh để cải tiến chất lượng', 7, '2022-05-26 02:01:43', '2022-05-26 02:01:43', NULL),
(26, 1, 'Việc quy hoạch đội ngũ nhân viên (làm việc tại thư viện, phòng thí nghiệm, hệ thống công nghệ thông tin và các dịch vụ hỗ trợ khác) được thực hiện đáp ứng nhu cầu về đào tạo, nghiên cứu khoa học và các hoạt động phục vụ cộng đồng', 8, '2022-05-26 02:01:55', '2022-05-26 02:01:55', NULL),
(27, 2, 'Các tiêu chí tuyển dụng và lựa chọn nhân viên để bổ nhiệm, điều chuyển được xác định và phổ biến công khai', 8, '2022-05-26 02:02:08', '2022-05-26 02:02:08', NULL),
(28, 3, 'Năng lực của đội ngũ nhân viên được xác định và được đánh giá', 8, '2022-05-26 02:02:17', '2022-05-26 02:02:17', NULL),
(29, 4, 'Nhu cầu về đào tạo và phát triển chuyên môn, nghiệp vụ của nhân viên được xác định và có các hoạt động triển khai để đáp ứng nhu cầu đó', 8, '2022-05-26 02:02:28', '2022-05-26 02:02:28', NULL),
(30, 5, 'Việc quản trị theo kết quả công việc của nhân viên (gồm cả khen thưởng và công nhận) được triển khai để tạo động lực và hỗ trợ cho đào tạo, nghiên cứu khoa học và các hoạt động phục vụ cộng đồng', 8, '2022-05-26 02:02:38', '2022-05-26 02:02:38', NULL),
(31, 1, 'Chính sách tuyển sinh được xác định rõ ràng, được công bố công khai và được cập nhật', 9, '2022-05-26 02:02:48', '2022-05-26 02:02:48', NULL),
(32, 2, 'Tiêu chí và phương pháp tuyển chọn người học được xác định rõ ràng và được đánh giá', 9, '2022-05-26 02:02:58', '2022-05-26 02:02:58', NULL),
(33, 3, 'Có hệ thống giám sát phù hợp về sự tiến bộ trong học tập và rèn luyện, kết quả học tập, khối lượng học tập của người học', 9, '2022-05-26 02:03:11', '2022-05-26 02:03:11', NULL),
(34, 4, 'Có các hoạt động tư vấn học tập, hoạt động ngoại khóa, hoạt động thi đua và các dịch vụ hỗ trợ khác để giúp cải thiện việc học tập và khả năng có việc làm của người học', 9, '2022-05-26 02:03:20', '2022-05-26 02:03:20', NULL),
(35, 5, 'Môi trường tâm lý, xã hội và cảnh quan tạo thuận lợi cho hoạt động đào tạo, nghiên cứu và sự thoải mái cho cá nhân người học', 9, '2022-05-26 02:03:30', '2022-05-26 02:03:30', NULL),
(36, 1, 'Có hệ thống phòng làm việc, phòng học và các phòng chức năng với các trang thiết bị phù hợp để hỗ trợ các hoạt động đào tạo và nghiên cứu', 10, '2022-05-26 02:03:42', '2022-05-26 02:03:42', NULL),
(37, 2, 'Thư viện và các nguồn học liệu phù hợp và được cập nhật để hỗ trợ các hoạt động đào tạo và nghiên cứu', 10, '2022-05-26 02:03:51', '2022-05-26 02:03:51', NULL),
(38, 3, 'Phòng thí nghiệm, thực hành và trang thiết bị phù hợp và được cập nhật để hỗ trợ các hoạt động đào tạo và nghiên cứu', 10, '2022-05-26 02:04:00', '2022-05-26 02:04:00', NULL),
(39, 4, 'Hệ thống công nghệ thông tin (bao gồm cả hạ tầng cho học tập trực tuyến) phù hợp và được cập nhật để hỗ trợ các hoạt động đào tạo và nghiên cứu', 10, '2022-05-26 02:04:09', '2022-05-26 02:04:09', NULL),
(40, 5, 'Các tiêu chuẩn về môi trường, sức khỏe, an toàn được xác định và triển khai có lưu ý đến nhu cầu đặc thù của người khuyết tật', 10, '2022-05-26 02:04:20', '2022-05-26 02:04:20', NULL),
(41, 1, 'Thông tin phản hồi và nhu cầu của các bên liên quan được sử dụng làm căn cứ để thiết kế và phát triển chương trình dạy học', 11, '2022-05-26 02:04:36', '2022-05-26 02:04:36', NULL),
(42, 2, 'Việc thiết kế và phát triển chương trình dạy học được xác lập, được đánh giá và cải tiến', 11, '2022-05-26 02:04:47', '2022-05-26 02:04:47', NULL),
(43, 3, 'Quá trình dạy và học, việc đánh giá kết quả học tập của người học được rà soát và đánh giá thường xuyên để đảm bảo sự tương thích và phù hợp với chuẩn đầu ra', 11, '2022-05-26 02:04:56', '2022-05-26 02:04:56', NULL),
(44, 4, 'Các kết quả nghiên cứu khoa học được sử dụng để cải tiến việc dạy và học', 11, '2022-05-26 02:05:04', '2022-05-26 02:05:04', NULL),
(45, 5, 'Chất lượng các dịch vụ hỗ trợ và tiện ích (tại thư viện, phòng thí nghiệm, hệ thống công nghệ thông tin và các dịch vụ hỗ trợ khác) được đánh giá và cải tiến', 11, '2022-05-26 02:05:14', '2022-05-26 02:05:14', NULL),
(46, 6, 'Cơ chế phản hồi các bên liên quan có tính hệ thống, được đánh giá và cải tiến', 11, '2022-05-26 02:05:45', '2022-05-26 02:05:45', NULL),
(47, 1, 'Tỉ lệ thôi học, tốt nghiệp được xác lập, giám sát và đối sánh để cải tiến chất lượng', 12, '2022-05-26 02:06:00', '2022-05-26 02:06:00', NULL),
(48, 2, 'Thời gian tốt nghiệp trung bình được xác lập, giám sát và đối sánh để cải tiến chất lượng', 12, '2022-05-26 02:06:10', '2022-05-26 02:06:10', NULL),
(49, 3, 'Tỉ lệ có việc làm sau tốt nghiệp được xác lập, giám sát và đối sánh để cải tiến chất lượng', 12, '2022-05-26 02:06:18', '2022-05-26 02:06:18', NULL),
(50, 4, 'Loại hình và số lượng các hoạt động nghiên cứu của người học được xác lập, giám sát và đối sánh để cải tiến chất lượng', 12, '2022-05-26 02:06:34', '2022-05-26 02:06:34', NULL),
(51, 5, 'Mức độ hài lòng của các bên liên quan được xác lập, giám sát và đối sánh để cải tiến chất lượng', 12, '2022-05-26 02:06:40', '2022-05-26 02:06:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tieu_chi_tu_khoas`
--

CREATE TABLE `tieu_chi_tu_khoas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tieuChi_id` int(11) NOT NULL,
  `tuKhoa_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tieu_chi_tu_khoas`
--

INSERT INTO `tieu_chi_tu_khoas` (`id`, `tieuChi_id`, `tuKhoa_id`, `created_at`, `updated_at`) VALUES
(4, 48, 1, '2022-05-26 02:10:56', '2022-05-26 02:10:56'),
(5, 48, 2, '2022-05-26 02:10:56', '2022-05-26 02:10:56'),
(6, 48, 3, '2022-05-26 02:10:56', '2022-05-26 02:10:56'),
(7, 49, 1, '2022-05-26 02:11:59', '2022-05-26 02:11:59'),
(8, 49, 2, '2022-05-26 02:11:59', '2022-05-26 02:11:59'),
(9, 49, 3, '2022-05-26 02:11:59', '2022-05-26 02:11:59'),
(10, 50, 1, '2022-05-26 02:13:21', '2022-05-26 02:13:21'),
(11, 50, 2, '2022-05-26 02:13:21', '2022-05-26 02:13:21'),
(12, 50, 3, '2022-05-26 02:13:21', '2022-05-26 02:13:21'),
(13, 51, 1, '2022-05-26 02:14:21', '2022-05-26 02:14:21'),
(14, 51, 2, '2022-05-26 02:14:21', '2022-05-26 02:14:21'),
(15, 51, 3, '2022-05-26 02:14:21', '2022-05-26 02:14:21'),
(16, 47, 1, '2022-05-27 03:12:59', '2022-05-27 03:12:59'),
(17, 47, 3, '2022-05-27 03:13:14', '2022-05-27 03:13:14'),
(18, 47, 2, '2022-05-27 03:13:14', '2022-05-27 03:13:14');

-- --------------------------------------------------------

--
-- Table structure for table `tieu_chuans`
--

CREATE TABLE `tieu_chuans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stt` int(11) NOT NULL,
  `ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tieu_chuans`
--

INSERT INTO `tieu_chuans` (`id`, `stt`, `ten`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 1, 'Mục tiêu và chuẩn đầu ra của chương trình đào tạo', '2022-05-26 01:44:48', '2022-05-26 01:44:48', NULL),
(3, 2, 'Bản mô tả chương trình đào tạo', '2022-05-26 01:45:12', '2022-05-26 01:45:12', NULL),
(4, 3, 'Cấu trúc và nội dung chương trình dạy học', '2022-05-26 01:45:32', '2022-05-26 01:45:32', NULL),
(5, 4, 'Phương pháp tiếp cận trong dạy và học', '2022-05-26 01:45:47', '2022-05-26 01:45:47', NULL),
(6, 5, 'Đánh giá kết quả học tập của người học', '2022-05-26 01:46:04', '2022-05-26 01:46:04', NULL),
(7, 6, 'Đội ngũ giảng viên, nghiên cứu viên', '2022-05-26 01:46:19', '2022-05-26 01:46:19', NULL),
(8, 7, 'Đội ngũ nhân viên', '2022-05-26 01:46:34', '2022-05-26 01:46:34', NULL),
(9, 8, 'Người học và hoạt động hỗ trợ người học', '2022-05-26 01:46:47', '2022-05-26 01:46:47', NULL),
(10, 9, 'Cơ sở vật chất và trang thiết bị', '2022-05-26 01:46:59', '2022-05-26 01:46:59', NULL),
(11, 10, 'Nâng cao chất lượng', '2022-05-26 01:47:15', '2022-05-26 01:47:15', NULL),
(12, 11, 'Kết quả đầu ra', '2022-05-26 01:47:27', '2022-05-26 01:47:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tu_khoas`
--

CREATE TABLE `tu_khoas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `noiDung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tu_khoas`
--

INSERT INTO `tu_khoas` (`id`, `noiDung`, `created_at`, `updated_at`) VALUES
(1, 'xác lập', '2022-05-26 02:09:47', '2022-05-26 02:09:47'),
(2, 'giám sát', '2022-05-26 02:09:47', '2022-05-26 02:09:47'),
(3, 'đối sánh', '2022-05-26 02:09:47', '2022-05-26 02:09:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hoTen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gioiTinh` tinyint(1) NOT NULL,
  `ngaySinh` date NOT NULL,
  `sdt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chucVu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `donVi_id` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `hinhAnh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `hoTen`, `gioiTinh`, `ngaySinh`, `sdt`, `chucVu`, `email`, `email_verified_at`, `password`, `donVi_id`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `hinhAnh`) VALUES
(3, 'Phan Thanh Hà 2', 1, '2000-03-08', '0334370811', 'Sinh Viên', 'ha.pt.60cntt@ntu.edu.vn', NULL, '$2y$10$r3WT6ccVNbVRXicurkxxzuYwoT3QSgtZerCnqjkWQcZzwF03okIH2', 1, NULL, '2022-05-26 03:25:47', '2022-05-26 06:15:07', NULL, '/storage/photos/1/26-May-2022-10-25-avatar.jpg'),
(4, 'Phan Thanh Hà', 1, '2000-03-08', '0334370822', 'Sinh Viên', 'hathanh.0113@gmail.com', NULL, '$2y$10$/4Wne/t8CJkSpQL2Ic1OQurUS0hvTLGIi3om/GrqaseJeO5NT.lvy', 1, 'fmTu8cGth2uIYQ0Qo4W3UWld75noaEDzy0VhF1KGZ4nYPCKOqubYcnxFMsuD', '2022-05-26 06:31:11', '2022-05-26 06:31:55', NULL, '/storage/photos/4/26-May-2022-01-31-avatar2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `vai_tros`
--

CREATE TABLE `vai_tros` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vai_tros`
--

INSERT INTO `vai_tros` (`id`, `ten`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Thành viên', 'thanh-vien', NULL, NULL),
(2, 'Tổ trưởng', 'to-truong', NULL, NULL),
(3, 'Tổ phó', 'to-pho', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vai_tro_h_t_quyen_h_t_s`
--

CREATE TABLE `vai_tro_h_t_quyen_h_t_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vaiTroHT_id` int(11) NOT NULL,
  `quyenHT_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vai_tro_h_t_quyen_h_t_s`
--

INSERT INTO `vai_tro_h_t_quyen_h_t_s` (`id`, `vaiTroHT_id`, `quyenHT_id`, `created_at`, `updated_at`) VALUES
(1, 6, 2, '2022-05-26 04:51:05', '2022-05-26 04:51:05'),
(2, 6, 3, '2022-05-26 04:51:05', '2022-05-26 04:51:05'),
(3, 6, 4, '2022-05-26 04:51:05', '2022-05-26 04:51:05'),
(4, 6, 5, '2022-05-26 04:51:05', '2022-05-26 04:51:05'),
(5, 6, 6, '2022-05-26 04:51:05', '2022-05-26 04:51:05'),
(6, 6, 8, '2022-05-26 04:51:05', '2022-05-26 04:51:05'),
(7, 6, 9, '2022-05-26 04:51:05', '2022-05-26 04:51:05'),
(8, 6, 10, '2022-05-26 04:51:05', '2022-05-26 04:51:05'),
(9, 6, 11, '2022-05-26 04:51:05', '2022-05-26 04:51:05'),
(10, 6, 12, '2022-05-26 04:51:05', '2022-05-26 04:51:05'),
(11, 7, 2, '2022-05-26 05:35:06', '2022-05-26 05:35:06'),
(12, 7, 3, '2022-05-26 05:35:06', '2022-05-26 05:35:06'),
(13, 7, 8, '2022-05-26 05:35:06', '2022-05-26 05:35:06'),
(14, 7, 9, '2022-05-26 05:35:06', '2022-05-26 05:35:06'),
(15, 8, 2, '2022-05-26 05:35:53', '2022-05-26 05:35:53'),
(16, 8, 3, '2022-05-26 05:35:53', '2022-05-26 05:35:53'),
(17, 8, 4, '2022-05-26 05:35:53', '2022-05-26 05:35:53'),
(18, 8, 5, '2022-05-26 05:35:53', '2022-05-26 05:35:53'),
(19, 8, 6, '2022-05-26 05:35:53', '2022-05-26 05:35:53'),
(20, 8, 8, '2022-05-26 05:35:53', '2022-05-26 05:35:53'),
(21, 8, 9, '2022-05-26 05:35:53', '2022-05-26 05:35:53'),
(22, 8, 10, '2022-05-26 05:35:53', '2022-05-26 05:35:53'),
(23, 8, 11, '2022-05-26 05:35:53', '2022-05-26 05:35:53'),
(24, 8, 12, '2022-05-26 05:35:53', '2022-05-26 05:35:53');

-- --------------------------------------------------------

--
-- Table structure for table `vai_tro_h_t_s`
--

CREATE TABLE `vai_tro_h_t_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vai_tro_h_t_s`
--

INSERT INTO `vai_tro_h_t_s` (`id`, `ten`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, 'Người dùng', 'nguoi-dung', '2022-05-26 05:35:06', '2022-05-26 05:35:06', NULL),
(8, 'Quản trị hệ thống', 'quan-tri-he-thong', '2022-05-26 05:35:53', '2022-05-26 05:35:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `yeu_caus`
--

CREATE TABLE `yeu_caus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `noiDung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tieuChi_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `yeu_caus`
--

INSERT INTO `yeu_caus` (`id`, `noiDung`, `tieuChi_id`, `created_at`, `updated_at`) VALUES
(1, 'Tỷ lệ thôi học, tốt nghiệp được xác lập', 47, '2022-05-26 02:09:47', '2022-05-26 02:09:47'),
(2, 'Tỷ lệ thôi học, tốt nghiệp được giám sát', 47, '2022-05-26 02:09:47', '2022-05-26 02:09:47'),
(3, 'Tỷ lệ thôi học, tốt nghiệp được đối sánh để cải tiến chất lượng', 47, '2022-05-26 02:09:47', '2022-05-26 02:09:47'),
(4, 'Thời gian tốt nghiệp trung bình được xác lập', 48, '2022-05-26 02:10:56', '2022-05-26 02:10:56'),
(5, 'Thời gian tốt nghiệp trung bình được giám sát', 48, '2022-05-26 02:10:56', '2022-05-26 02:10:56'),
(6, 'Thời gian tốt nghiệp trung bình được đối sánh để cải tiến chất lượng', 48, '2022-05-26 02:10:56', '2022-05-26 02:10:56'),
(7, 'Tỉ lệ có việc làm sau tốt nghiệp được xác lập', 49, '2022-05-26 02:11:59', '2022-05-26 02:11:59'),
(8, 'Tỉ lệ có việc làm sau tốt nghiệp được giám sát', 49, '2022-05-26 02:11:59', '2022-05-26 02:11:59'),
(9, 'Tỉ lệ có việc làm sau tốt nghiệp được đối sánh để cải tiến chất lượng', 49, '2022-05-26 02:11:59', '2022-05-26 02:11:59'),
(10, 'Loại hình và số lượng các hoạt động nghiên cứu của NH được xác lập', 50, '2022-05-26 02:13:21', '2022-05-26 02:13:21'),
(11, 'Loại hình và số lượng các hoạt động nghiên cứu của NH được giám sát', 50, '2022-05-26 02:13:21', '2022-05-26 02:13:21'),
(12, 'Loại hình và số lượng các hoạt động nghiên cứu của NH được đối sánh để cải tiến chất lượng', 50, '2022-05-26 02:13:21', '2022-05-26 02:13:21'),
(13, 'Mức độ hài lòng của các bên liên quan được xác lập', 51, '2022-05-26 02:14:21', '2022-05-26 02:14:21'),
(14, 'Mức độ hài lòng của các bên liên quan được giám sát', 51, '2022-05-26 02:14:21', '2022-05-26 02:14:21'),
(15, 'Mức độ hài lòng của các bên liên quan được đối sánh để cải tiến chất lượng', 51, '2022-05-26 02:14:21', '2022-05-26 02:14:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bao_caos`
--
ALTER TABLE `bao_caos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bao_cao_sao_luus`
--
ALTER TABLE `bao_cao_sao_luus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `binh_luans`
--
ALTER TABLE `binh_luans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chi_tiet_minh_chungs`
--
ALTER TABLE `chi_tiet_minh_chungs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `don_vis`
--
ALTER TABLE `don_vis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dot_danh_gias`
--
ALTER TABLE `dot_danh_gias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `giai_doans`
--
ALTER TABLE `giai_doans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hoat_dongs`
--
ALTER TABLE `hoat_dongs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `minh_chungs`
--
ALTER TABLE `minh_chungs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `moc_chuans`
--
ALTER TABLE `moc_chuans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nganhs`
--
ALTER TABLE `nganhs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nganh_dot_danh_gias`
--
ALTER TABLE `nganh_dot_danh_gias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nguoi_dung_quyens`
--
ALTER TABLE `nguoi_dung_quyens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nguoi_dung_vai_tro_h_t_s`
--
ALTER TABLE `nguoi_dung_vai_tro_h_t_s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nhoms`
--
ALTER TABLE `nhoms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nhom_nguoi_dungs`
--
ALTER TABLE `nhom_nguoi_dungs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nhom_quyens`
--
ALTER TABLE `nhom_quyens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `quyen_h_t_s`
--
ALTER TABLE `quyen_h_t_s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quyen_nguoi_dungs`
--
ALTER TABLE `quyen_nguoi_dungs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quyen_nhoms`
--
ALTER TABLE `quyen_nhoms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tieu_chis`
--
ALTER TABLE `tieu_chis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tieu_chi_tu_khoas`
--
ALTER TABLE `tieu_chi_tu_khoas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tieu_chuans`
--
ALTER TABLE `tieu_chuans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tu_khoas`
--
ALTER TABLE `tu_khoas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_sdt_unique` (`sdt`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vai_tros`
--
ALTER TABLE `vai_tros`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vai_tro_h_t_quyen_h_t_s`
--
ALTER TABLE `vai_tro_h_t_quyen_h_t_s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vai_tro_h_t_s`
--
ALTER TABLE `vai_tro_h_t_s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yeu_caus`
--
ALTER TABLE `yeu_caus`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bao_caos`
--
ALTER TABLE `bao_caos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bao_cao_sao_luus`
--
ALTER TABLE `bao_cao_sao_luus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `binh_luans`
--
ALTER TABLE `binh_luans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `chi_tiet_minh_chungs`
--
ALTER TABLE `chi_tiet_minh_chungs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `don_vis`
--
ALTER TABLE `don_vis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dot_danh_gias`
--
ALTER TABLE `dot_danh_gias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `giai_doans`
--
ALTER TABLE `giai_doans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hoat_dongs`
--
ALTER TABLE `hoat_dongs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `minh_chungs`
--
ALTER TABLE `minh_chungs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `moc_chuans`
--
ALTER TABLE `moc_chuans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `nganhs`
--
ALTER TABLE `nganhs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nganh_dot_danh_gias`
--
ALTER TABLE `nganh_dot_danh_gias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nguoi_dung_quyens`
--
ALTER TABLE `nguoi_dung_quyens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `nguoi_dung_vai_tro_h_t_s`
--
ALTER TABLE `nguoi_dung_vai_tro_h_t_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nhoms`
--
ALTER TABLE `nhoms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nhom_nguoi_dungs`
--
ALTER TABLE `nhom_nguoi_dungs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nhom_quyens`
--
ALTER TABLE `nhom_quyens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quyen_h_t_s`
--
ALTER TABLE `quyen_h_t_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `quyen_nguoi_dungs`
--
ALTER TABLE `quyen_nguoi_dungs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `quyen_nhoms`
--
ALTER TABLE `quyen_nhoms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tieu_chis`
--
ALTER TABLE `tieu_chis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `tieu_chi_tu_khoas`
--
ALTER TABLE `tieu_chi_tu_khoas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tieu_chuans`
--
ALTER TABLE `tieu_chuans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tu_khoas`
--
ALTER TABLE `tu_khoas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vai_tros`
--
ALTER TABLE `vai_tros`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vai_tro_h_t_quyen_h_t_s`
--
ALTER TABLE `vai_tro_h_t_quyen_h_t_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `vai_tro_h_t_s`
--
ALTER TABLE `vai_tro_h_t_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `yeu_caus`
--
ALTER TABLE `yeu_caus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
