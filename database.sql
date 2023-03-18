-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2022 at 06:36 AM
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
-- Database: `ntu`
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
  `moDau` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ketLuan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tongSoTC` int(11) DEFAULT NULL,
  `soTCDat` int(11) DEFAULT NULL,
  `trangThai` int(11) DEFAULT 0,
  `congKhai` bit(1) DEFAULT b'0',
  `nganh_id` int(11) NOT NULL,
  `tieuChi_id` int(11) NOT NULL,
  `tieuChuan_id` int(11) DEFAULT NULL,
  `dotDanhGia_id` int(11) DEFAULT NULL,
  `nguoiDung_id` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bao_caos`
--

INSERT INTO `bao_caos` (`id`, `moTa`, `diemManh`, `diemTonTai`, `keHoachHanhDong`, `diemTDG`, `moDau`, `ketLuan`, `tongSoTC`, `soTCDat`, `trangThai`, `congKhai`, `nganh_id`, `tieuChi_id`, `tieuChuan_id`, `dotDanhGia_id`, `nguoiDung_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 0, 0, b'1', 1, 55, 5, 1, 11, NULL, '2022-06-05 05:34:36', '2022-06-12 01:29:00'),
(10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, b'1', 1, 11, 5, 1, 11, NULL, '2022-06-05 05:34:42', '2022-06-12 01:29:00'),
(11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 0, 0, b'1', 1, 56, 6, 1, 11, NULL, '2022-06-05 05:34:47', '2022-06-12 01:29:00'),
(12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, b'1', 1, 14, 6, 1, 11, NULL, '2022-06-05 05:34:52', '2022-06-12 01:29:00'),
(13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 0, b'1', 1, 52, 2, 1, 5, NULL, '2022-06-05 05:35:21', '2022-06-12 01:29:00'),
(14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, b'1', 1, 5, 3, 1, 5, NULL, '2022-06-05 05:35:42', '2022-06-12 01:29:00'),
(15, '<p>M&ocirc; tả ti&ecirc;u ch&iacute; 2.2</p>', NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, 0, b'1', 1, 6, 3, 1, 5, NULL, '2022-06-05 05:35:50', '2022-06-12 01:29:00'),
(16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, b'1', 1, 9, 4, 1, 5, NULL, '2022-06-05 05:35:58', '2022-06-12 01:29:00'),
(17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 0, 0, b'1', 1, 58, 8, 1, 15, NULL, '2022-06-06 05:36:10', '2022-06-12 01:29:00'),
(18, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, b'1', 1, 26, 8, 1, 15, NULL, '2022-06-06 05:36:16', '2022-06-12 01:29:00'),
(25, NULL, NULL, NULL, NULL, NULL, '<p>Viện NTTS thuộc Trường Đại học Nha Trang l&agrave; một trong những cơ sở đ&agrave;o tạo h&agrave;ng đầu về lĩnh vực thủy sản, đặc biệt l&agrave; ng&agrave;nh NTTS, c&oacute; đội ngũ CB khoa học tr&igrave;nh độ cao. CTĐT kỹ sư ng&agrave;nh NTTS được x&acirc;y dựng tr&ecirc;n cơ sở chương tr&igrave;nh khung do Bộ GD&amp;ĐT ban h&agrave;nh v&agrave; c&aacute;c quy định, hướng dẫn của Trường, thể hiện được c&aacute;c CĐR d&agrave;nh cho SV tốt nghiệp v&agrave; bao tr&ugrave;m được c&aacute;c CĐR li&ecirc;n quan đến kiến thức v&agrave; kỹ năng chuy&ecirc;n ng&agrave;nh, nh&oacute;m ng&agrave;nh, khối ng&agrave;nh v&agrave; theo lĩnh vực. C&aacute;c mục ti&ecirc;u v&agrave; CĐR được x&acirc;y dựng phản &aacute;nh r&otilde; r&agrave;ng sứ mạng v&agrave; tầm nh&igrave;n, triết l&yacute; v&agrave; mục ti&ecirc;u gi&aacute;o dục của Trường.</p>', '<p>Mục ti&ecirc;u của CTĐT ng&agrave;nh NTTS được x&aacute;c định r&otilde; r&agrave;ng, ph&ugrave; hợp với sứ mạng v&agrave; tầm nh&igrave;n của Trường, ph&ugrave; hợp với mục ti&ecirc;u của GDĐH. CĐR của CTĐT được x&aacute;c định r&otilde; r&agrave;ng, bao qu&aacute;t được cả c&aacute;c y&ecirc;u cầu chung v&agrave; y&ecirc;u cầu chuy&ecirc;n biệt m&agrave; NH cần đạt. CĐR của CTĐT phản &aacute;nh được y&ecirc;u cầu của c&aacute;c b&ecirc;n li&ecirc;n quan, được định kỳ r&agrave; so&aacute;t, điều chỉnh v&agrave; được c&ocirc;ng bố c&ocirc;ng khai. Tuy nhi&ecirc;n, mục ti&ecirc;u v&agrave; CĐR của CTĐT ng&agrave;nh NTTS vẫn c&ograve;n một số tồn tại cần được khắc phục, bổ sung v&agrave; ho&agrave;n thiện.</p>', 3, 3, 1, b'1', 3, 52, 2, 3, 5, NULL, '2022-06-08 06:58:44', '2022-06-11 09:26:43'),
(26, '<p>Mục ti&ecirc;u của CTĐT <strong>nhằm đào tạo</strong> kỹ sư có đủ ph&acirc;̉m ch&acirc;́t, năng lực phục vụ cho sự phát tri&ecirc;̉n của ngành: tổ chức nghi&ecirc;n cứu và thực hiện c&aacute;c quy tr&igrave;nh c&ocirc;ng ngh&ecirc;̣ sản xuất giống thủy sản, NTTS thương phẩm, sản xuất thức ăn, quản l&yacute; m&ocirc;i trường c&aacute;c thủy vực, tổ chức thực hiện ph&ograve;ng, trị bệnh thủy sản, <strong>nghi&ecirc;n cứu</strong> v&agrave; <strong>chuyển giao c&ocirc;ng nghệ</strong> trong lĩnh vực đ&atilde; được đ&agrave;o tạo, tư vấn kỹ thuật trong quy hoạch v&agrave; thiết kế cơ sở NTTS, tổ chức thực hiện c&aacute;c dịch vụ li&ecirc;n quan đến NTTS, quản l&yacute; doanh nghiệp NTTS qui m&ocirc; vừa v&agrave; nhỏ. Mục ti&ecirc;u n&agrave;y được thể hiện r&otilde; trong CTĐT <a class=\"is-minhchung\" style=\"color: #000; font-weight: bold; text-decoration: none;\" href=\"/storage/minhchungs/5/08-Jun-2022-02-02-K60_28_CTDT Nuoi trong TS - K60.doc\" target=\"_blank\" rel=\"nofollow noopener\">[CTĐT ng&agrave;nh NTTS (2018)]</a>. Mục ti&ecirc;u của CTĐT đ&aacute;p ứng c&aacute;c quy định về x&acirc;y dựng v&agrave; ph&aacute;t triển CTĐT với c&aacute;c y&ecirc;u cầu về chuẩn kiến thức, kỹ năng, năng lực tự chủ <a class=\"is-minhchung\" style=\"color: #000; font-weight: bold; text-decoration: none;\" href=\"/storage/minhchungs/5/08-Jun-2022-02-05-07_2015_TT-BGDDT_8022.doc\" target=\"_blank\" rel=\"nofollow noopener\">[Quy định khối lượng kiến thức tối thiểu]</a> v&agrave; tr&aacute;ch nhiệm của đ&agrave;o tạo tr&igrave;nh độ đại học <a class=\"is-minhchung\" style=\"color: #000; font-weight: bold; text-decoration: none;\" href=\"/storage/minhchungs/5/08-Jun-2022-02-07-chien-luoc-phat-trien-2020-tam-nhin-2030.pdf\" target=\"_blank\" rel=\"nofollow noopener\">[Mục ti&ecirc;u của trường]</a>.</p>', '<p>Mục ti&ecirc;u của CTĐT được x&aacute;c định r&otilde; r&agrave;ng v&agrave; đ&aacute;p ứng Sứ mạng v&agrave; Tầm nh&igrave;n của Trường.</p>\r\n<p>Mục ti&ecirc;u của CTĐT được x&acirc;y dựng ph&ugrave; hợp với đa số c&aacute;c nội dung của mục ti&ecirc;u GDĐH quy định tại Luật GDĐH.&nbsp;</p>', '<p>Mục ti&ecirc;u của CTĐT chưa thể hiện r&otilde; mức độ đ&aacute;p ứng nhu cầu ở cấp độ khu vực, quốc tế. V&agrave;i nội dung li&ecirc;n quan đến sức khỏe, khả năng s&aacute;ng tạo v&agrave; th&iacute;ch nghi với m&ocirc;i trường l&agrave;m việc của mục ti&ecirc;u chưa thể hiện r&otilde;.</p>', '<p>Từ năm học 2021 - 2022, Viện NTTS tiếp tục cập nhật mục ti&ecirc;u CTĐT thể hiện r&otilde;: mức độ đ&aacute;p ứng nhu cầu ở cấp độ theo tầm nh&igrave;n của Trường; c&aacute;c nội dung về sức khỏe, khả năng s&aacute;ng tạo v&agrave; th&iacute;ch nghi với m&ocirc;i trường l&agrave;m việc quy định trong Luật GDĐH.</p>', 5, NULL, NULL, NULL, NULL, 1, b'1', 3, 2, 2, 3, 5, NULL, '2022-06-08 07:12:11', '2022-06-11 09:24:39'),
(27, '<p>CĐR của CTĐT ng&agrave;nh NTTS được m&ocirc; tả r&otilde; r&agrave;ng (ban h&agrave;nh v&agrave;o năm 2011) <a class=\"is-minhchung\" style=\"color: #000; font-weight: bold; text-decoration: none;\" href=\"/storage/minhchungs/5/08-Jun-2022-02-30-chien-luoc-phat-trien-2020-tam-nhin-2030.pdf\" target=\"_blank\" rel=\"nofollow noopener\">[Chuẩn đầu ra CTĐT ng&agrave;nh NTTS]</a> v&agrave; CĐR trong CTĐT được c&ocirc;ng bố gần đ&acirc;y (năm 2018) <a class=\"is-minhchung\" style=\"color: #000; font-weight: bold; text-decoration: none;\" href=\"/storage/minhchungs/5/08-Jun-2022-02-02-K60_28_CTDT Nuoi trong TS - K60.doc\" target=\"_blank\" rel=\"nofollow noopener\">[CTĐT ng&agrave;nh NTTS (2018)]</a>, phản &aacute;nh r&otilde; sứ mạng v&agrave; tầm nh&igrave;n của Trường với thế mạnh đ&agrave;o tạo chuy&ecirc;n s&acirc;u về NTTS. C&aacute;c chuẩn n&agrave;y được thể hiện th&ocirc;ng qua 3 nh&oacute;m: kiến thức (5 nội dung); kỹ năng (6 nội dung) v&agrave; phẩm chất đạo đức, nh&acirc;n văn v&agrave; sức khỏe (2 nội dung). CĐR được bố tr&iacute; khoa học, tr&igrave;nh b&agrave;y s&uacute;c t&iacute;ch, thể hiện trong CTĐT. Trong CTĐT, mỗi CĐR được đo lường v&agrave; đ&aacute;nh gi&aacute; bằng một hoặc một số học phần (HP) cụ thể, thể hiện ở mục IV.4 (Nội dung CTĐT) <a class=\"is-minhchung\" style=\"color: #000; font-weight: bold; text-decoration: none;\" href=\"/storage/minhchungs/5/08-Jun-2022-02-02-K60_28_CTDT Nuoi trong TS - K60.doc\" target=\"_blank\" rel=\"nofollow noopener\">[CTĐT ng&agrave;nh NTTS (2018)]</a>.</p>', '<p>CĐR của CTĐT ng&agrave;nh NTTS đ&atilde; được x&aacute;c định r&otilde; r&agrave;ng, cụ thể về kiến thức, kỹ năng, mức tự chủ v&agrave; tr&aacute;ch nhiệm đối với NH.</p>\r\n<p>CĐR của CTĐT ng&agrave;nh NTTS đ&atilde; bao qu&aacute;t c&aacute;c y&ecirc;u cầu chung v&agrave; y&ecirc;u cầu chuy&ecirc;n biệt đối với NH cần đạt được sau khi ho&agrave;n th&agrave;nh CTĐT.&nbsp;</p>', '<p>CĐR của CTĐT ng&agrave;nh NTTS chưa thể hiện r&otilde; y&ecirc;u cầu cho nh&oacute;m ng&agrave;nh thủy sản.&nbsp;</p>', '<p>Trong năm học 2021 - 2022, Viện NTTS cập nhật CĐR c&oacute; thể hiện r&otilde; y&ecirc;u cầu cho nh&oacute;m ng&agrave;nh thủy sản.</p>', 4, NULL, NULL, NULL, NULL, 1, b'1', 3, 3, 2, 3, 5, NULL, '2022-06-08 07:32:28', '2022-06-12 01:26:16'),
(28, '<p>CĐR của CTĐT ng&agrave;nh NTTS bao gồm c&aacute;c y&ecirc;u cầu m&agrave; NH cần đạt được để đ&aacute;p ứng nhu cầu x&atilde; hội n&oacute;i chung v&agrave; li&ecirc;n quan đến hoạt động nghề NTTS n&oacute;i ri&ecirc;ng <a class=\"is-minhchung\" style=\"color: #000; font-weight: bold; text-decoration: none;\" href=\"/storage/minhchungs/5/08-Jun-2022-02-02-K60_28_CTDT Nuoi trong TS - K60.doc\" target=\"_blank\" rel=\"nofollow noopener\">[CTĐT ng&agrave;nh NTTS (2018)]</a>. Viện NTTS khi cập nhật v&agrave; ph&aacute;t triển CĐR của CTĐT đều c&oacute; sự tham gia của c&aacute;c b&ecirc;n li&ecirc;n quan như NH, người dạy, cựu SV v&agrave; nh&agrave; tuyển dụng lao động. Trường đ&atilde; th&agrave;nh lập Ban Chủ nhiệm CTĐT c&oacute; nhiệm vụ cập nhật v&agrave; ph&aacute;t triển CTĐT (c&oacute; CĐR), th&agrave;nh phần c&oacute; đại diện của cựu SV, cơ quan nghi&ecirc;n cứu, cơ quan quản l&yacute; v&agrave; doanh nghiệp <a class=\"is-minhchung\" style=\"color: #000; font-weight: bold; text-decoration: none;\" href=\"/storage/minhchungs/5/08-Jun-2022-02-36-K60_28_CTDT Nuoi trong TS - K60.doc\" target=\"_blank\" rel=\"nofollow noopener\">[Th&agrave;nh lập Ban Chủ nhiệm CTĐT ng&agrave;nh NTTS]</a>. Trước khi tiến h&agrave;nh cập nhật v&agrave; ph&aacute;t triển CĐR, Ban Chủ nhiệm CTĐT đều tiến h&agrave;nh t&igrave;m hiểu v&agrave; khảo s&aacute;t nhu cầu của c&aacute;c b&ecirc;n li&ecirc;n quan th&ocirc;ng qua c&aacute;c phiếu khảo s&aacute;t <a class=\"is-minhchung\" style=\"color: #000; font-weight: bold; text-decoration: none;\" href=\"/storage/minhchungs/5/08-Jun-2022-02-37-07_2015_TT-BGDDT_8022.doc\" target=\"_blank\" rel=\"nofollow noopener\">[Phiếu khảo s&aacute;t c&aacute;c b&ecirc;n li&ecirc;n quan phục vụ cập nhật CĐR]</a> v&agrave; hội nghị lấy &yacute; kiến c&aacute;c b&ecirc;n li&ecirc;n quan <a class=\"is-minhchung\" style=\"color: #000; font-weight: bold; text-decoration: none;\" href=\"/storage/minhchungs/5/08-Jun-2022-02-37-chien-luoc-phat-trien-2020-tam-nhin-2030.pdf\" target=\"_blank\" rel=\"nofollow noopener\">[Bi&ecirc;n bản hội nghị lấy &yacute; kiến c&aacute;c b&ecirc;n li&ecirc;n quan phục vụ cập nhật CTĐT (c&oacute; CĐR)]</a>.</p>', '<p>CĐR của CTĐT ng&agrave;nh NTTS được c&ocirc;ng bố c&ocirc;ng khai tr&ecirc;n cổng th&ocirc;ng tin điện tử của Trường v&agrave; nhiều k&ecirc;nh kh&aacute;c; được thể hiện cụ thể trong CTĐT.</p>\r\n<p>CĐR của CTĐT ng&agrave;nh NTTS đ&atilde; phản &aacute;nh được y&ecirc;u cầu của c&aacute;c b&ecirc;n li&ecirc;n quan v&agrave; cập nhật định kỳ; định kỳ 2 năm cập nhật 1 lần.</p>', '<p>Số lượng CĐR của CTĐT ng&agrave;nh NTTS c&ograve;n nhiều (13 CĐR).</p>', '<p>Từ năm học 2021 &ndash; 2022, Viện NTTS sẽ cập nhật CĐR theo hướng tinh gọn hơn.</p>', 5, NULL, NULL, NULL, NULL, 1, b'1', 3, 4, 2, 3, 5, NULL, '2022-06-08 07:40:21', '2022-06-11 09:22:19'),
(29, NULL, NULL, NULL, NULL, NULL, '<p>Bản m&ocirc; tả CTĐT ng&agrave;nh NTTS hiện nay đ&atilde; được Hiệu trưởng ban h&agrave;nh c&ugrave;ng với c&aacute;c ng&agrave;nh kh&aacute;c trong to&agrave;n trường. Trường đ&atilde; thiết kế x&acirc;y dựng mẫu bản m&ocirc; tả CTĐT để c&aacute;c ng&agrave;nh học triển khai kế hoạch x&acirc;y dựng v&agrave; ph&aacute;t triển CTĐT. Trong bản m&ocirc; tả CTĐT đ&atilde; thể hiện đầy đủ c&aacute;c th&ocirc;ng tin cần thiết v&agrave; hữu &iacute;ch để phục vụ cho c&aacute;c b&ecirc;n li&ecirc;n quan, đặc biệt l&agrave; phục vụ cho NH. Tuy nhi&ecirc;n, mẫu chung cho bản m&ocirc; tả CTĐT vừa mới ban h&agrave;nh n&ecirc;n chưa kịp thời cập nhật n&ecirc;n c&ograve;n nhiều kh&oacute; khăn trong việc cung cấp, đồng bộ th&ocirc;ng tin v&agrave; cập nhật. Việc đ&aacute;nh gi&aacute; bản m&ocirc; tả CTĐT th&ocirc;ng qua lượng th&ocirc;ng tin được cung cấp v&agrave; t&iacute;nh cập nhật th&ocirc;ng tin của bản m&ocirc; tả, đề cương c&aacute;c HP; việc c&ocirc;ng bố c&ocirc;ng khai để c&aacute;c b&ecirc;n li&ecirc;n quan dễ d&agrave;ng tiếp cận bản m&ocirc; tả CTĐT v&agrave; đề cương c&aacute;c HP.</p>', '<p>Bản m&ocirc; tả CTĐT v&agrave; ĐCHP ng&agrave;nh NTTS l&agrave; sản phẩm tr&iacute; tuệ của tập thể c&aacute;c GV trong Viện được Viện v&agrave; c&aacute;c BM x&acirc;y dựng kh&aacute; chi tiết, thể hiện đầy đủ th&ocirc;ng tin cần thiết cho qu&aacute; tr&igrave;nh tổ chức đ&agrave;o tạo. Bản m&ocirc; tả CTĐT ng&agrave;nh NTTS được Trường ban h&agrave;nh đầy đủ th&ocirc;ng tin cốt l&otilde;i, cập nhật thường xuy&ecirc;n v&agrave; c&ocirc;ng bố c&ocirc;ng khai. ĐCHP cũng được x&acirc;y dựng theo mẫu chung, đầy đủ th&ocirc;ng tin, thường xuy&ecirc;n cập nhật v&agrave; được c&ocirc;ng bố c&ocirc;ng khai đến c&aacute;c b&ecirc;n li&ecirc;n quan v&agrave;o đầu mỗi HK dưới nhiều h&igrave;nh thức kh&aacute;c nhau, c&aacute;c b&ecirc;n li&ecirc;n quan dễ d&agrave;ng tiếp cận. Tuy nhi&ecirc;n, một số ĐCHP vẫn c&ograve;n một v&agrave;i tồn tại cần được khắc phục như cập nhật so với tốc độ ph&aacute;t triển khoa học v&agrave; c&ocirc;ng nghệ của ng&agrave;nh. Đồng thời tiến h&agrave;nh cập nhật th&ocirc;ng tin trong bản m&ocirc; tả CTĐT theo th&ocirc;ng b&aacute;o của Trường v&agrave;o HK II năm học 2020 - 2021, đặc biệt ch&uacute; trọng nh&oacute;m HP chưa được cập nhật ĐCHP đầy đủ; v&agrave; c&ocirc;ng khai to&agrave;n bộ c&aacute;c ĐCHP tr&ecirc;n website của Ph&ograve;ng ĐTĐH v&agrave; Viện/BM quản l&yacute; HP phong ph&uacute; v&agrave; ph&ugrave; hợp hơn.</p>', 3, 3, 1, b'1', 3, 53, 3, 3, 5, NULL, '2022-06-08 07:41:54', '2022-06-11 09:26:43'),
(30, '<p>Bản m&ocirc; tả CTĐT ng&agrave;nh NTTS hiện hành <a class=\"is-minhchung\" style=\"color: #000; font-weight: bold; text-decoration: none;\" href=\"/storage/minhchungs/5/08-Jun-2022-02-02-K60_28_CTDT Nuoi trong TS - K60.doc\" target=\"_blank\" rel=\"nofollow noopener\">[CTĐT ng&agrave;nh NTTS (2018)]</a> đ&atilde; đ&aacute;p ứng đ&uacute;ng y&ecirc;u cầu được Quy định của Bộ GD&amp;ĐT <a class=\"is-minhchung\" style=\"color: #000; font-weight: bold; text-decoration: none;\" href=\"/storage/minhchungs/5/08-Jun-2022-02-43-07_2015_TT-BGDDT_8022.doc\" target=\"_blank\" rel=\"nofollow noopener\">[Quy định/quy tr&igrave;nh x&acirc;y dựng CTĐT v&agrave; Quy định về ti&ecirc;u chuẩn đ&aacute;nh gi&aacute; chất lượng CTĐT]</a>. Trong bản m&ocirc; tả CTĐT đ&atilde; thể hiện đầy đủ th&ocirc;ng tin như: t&ecirc;n CSGD; giới thiệu chung về CTĐT (th&ocirc;ng tin chung về CTĐT, mục ti&ecirc;u đ&agrave;o tạo, th&ocirc;ng tin tuyển sinh, điều kiện nhập học, số t&iacute;n chỉ t&iacute;ch luỹ, điều kiện tốt nghiệp); CĐR của CTĐT (kiến thức, kỹ năng, phẩm chất đạo đức, c&aacute;c vị tr&iacute; c&ocirc;ng t&aacute;c c&oacute; thể đảm nhận sau khi tốt nghiệp); nội dung CTĐT (khung CTĐT, ma trận HP - CĐR, kế hoạch đ&agrave;o tạo theo thời gian, m&ocirc; tả HP, CĐR của từng HP, c&aacute;ch thức đ&aacute;nh gi&aacute; KQHT, điều kiện thực hiện chương tr&igrave;nh, hướng dẫn thực hiện v&agrave; tổ chức CTĐT, hoạt động hỗ trợ SV); t&agrave;i liệu phục vụ đ&agrave;o tạo; danh s&aacute;ch GV tham gia GD chương tr&igrave;nh. Bản m&ocirc; tả CTĐT n&agrave;y đ&atilde; được Hiệu trưởng Trường giao cho Viện NTTS quản l&yacute; <a class=\"is-minhchung\" style=\"color: #000; font-weight: bold; text-decoration: none;\" href=\"/storage/minhchungs/5/08-Jun-2022-02-44-chien-luoc-phat-trien-2020-tam-nhin-2030.pdf\" target=\"_blank\" rel=\"nofollow noopener\">[Giao quản l&yacute; ng&agrave;nh đ&agrave;o tạo]</a>.</p>', '<p>Bản m&ocirc; tả CTĐT thể hiện đầy đủ th&ocirc;ng tin cần thiết về CTĐT, hoạt động đ&agrave;o tạo, CSGD,&hellip; v&agrave; được cập nhật định kỳ theo quy định.</p>', '<p>Bản m&ocirc; tả CTĐT đ&atilde; ban h&agrave;nh mẫu chung theo quy định của Bộ GD&amp;ĐT gần đ&acirc;y nhưng Viện NTTS chưa kịp thời cập nhật theo mẫu mới n&agrave;y n&ecirc;n c&ograve;n nhiều kh&oacute; khăn trong việc cung cấp, đồng bộ th&ocirc;ng tin v&agrave; cập nhật.</p>', '<p>Hiện nay, Trường đ&atilde; ban h&agrave;nh mẫu bản m&ocirc; tả CTĐT ch&iacute;nh thức, trong năm học 2020-2021, Viện NTTS sẽ phối hợp với c&aacute;c Ph&ograve;ng ban chức năng ho&agrave;n thiện th&ocirc;ng tin theo mẫu nhằm cập nhật CTĐT của ng&agrave;nh NTTS đ&aacute;p ứng nhu cầu thực tiễn của NH.</p>', 4, NULL, NULL, NULL, NULL, 1, b'1', 3, 5, 3, 3, 5, NULL, '2022-06-08 07:46:42', '2022-06-11 09:22:19'),
(31, '<p>Đề cương c&aacute;c HP trong CTĐT ng&agrave;nh NTTS vừa đ&oacute;ng vai tr&ograve; l&agrave; bản m&ocirc; tả qu&aacute; tr&igrave;nh GD, vừa đ&oacute;ng vai tr&ograve; l&agrave; bản cam kết gi&uacute;p GV v&agrave; SV thực hiện đ&uacute;ng tr&aacute;ch nhiệm của m&igrave;nh v&agrave; được x&acirc;y dựng theo mẫu thống nhất chung cho c&aacute;c ng&agrave;nh đ&agrave;o tạo thuộc Trường <a class=\"is-minhchung\" style=\"color: #000; font-weight: bold; text-decoration: none;\" href=\"/storage/minhchungs/5/08-Jun-2022-02-43-07_2015_TT-BGDDT_8022.doc\" target=\"_blank\" rel=\"nofollow noopener\">[Quy định/quy tr&igrave;nh x&acirc;y dựng CTĐT v&agrave; Quy định về ti&ecirc;u chuẩn đ&aacute;nh gi&aacute; chất lượng CTĐT]</a>. 100% đề cương c&aacute;c HP trong CTĐT ng&agrave;nh NTTS đ&atilde; thể hiện đầy đủ c&aacute;c th&ocirc;ng tin quy định của Trường như th&ocirc;ng tin chung về HP (t&ecirc;n tiếng Việt, t&ecirc;n tiếng Anh, m&atilde; HP, số t&iacute;n chỉ,...); m&ocirc; tả t&oacute;m tắt HP, mục ti&ecirc;u v&agrave; KQHT mong đợi (CĐR) của HP; nội dung HP; t&agrave;i liệu dạy học; đ&aacute;nh gi&aacute; kết quả học tập (KQHT). Căn cứ v&agrave;o mẫu đề cương học phần (ĐCHP) th&igrave; phần nội dung trong đề cương c&aacute;c HP c&oacute; quy định r&otilde; nội dung GD (theo chủ đề hoặc theo chương/phần); số tiết l&yacute; thuyết v&agrave; TH tương ứng với từng nội dung; c&aacute;c nội dung đ&oacute; đ&aacute;p ứng c&aacute;c CĐR n&agrave;o. Phần đ&aacute;nh gi&aacute; KQHT cũng thể hiện đầy đủ c&aacute;c th&ocirc;ng tin về h&igrave;nh thức đ&aacute;nh gi&aacute;, CĐR tương ứng v&agrave; trọng số của từng nội dung đ&aacute;nh gi&aacute;. Ngo&agrave;i ĐCHP ra, mỗi HP c&ograve;n được m&ocirc; tả chi tiết về phương ph&aacute;p dạy &ndash; học, nội dung kiểm tra, đ&aacute;nh gi&aacute; k&egrave;m theo mẫu đề cương chi tiết học phần (ĐCCTHP) <a class=\"is-minhchung\" style=\"color: #000; font-weight: bold; text-decoration: none;\" href=\"/storage/minhchungs/5/08-Jun-2022-02-44-chien-luoc-phat-trien-2020-tam-nhin-2030.pdf\" target=\"_blank\" rel=\"nofollow noopener\">[Giao quản l&yacute; ng&agrave;nh đ&agrave;o tạo]</a> được ban h&agrave;nh c&ugrave;ng l&uacute;c với ĐCHP. ĐCCTHP l&agrave; bản hợp đồng ghi nhớ giữa GV v&agrave; SV, trong đ&oacute; thể hiện to&agrave;n bộ kế hoạch GD v&agrave; học tập HP c&oacute; &yacute; nghĩa rất quan trọng trong việc định hướng, đảm bảo qu&aacute; tr&igrave;nh dạy v&agrave; học được tiến h&agrave;nh theo đ&uacute;ng lộ tr&igrave;nh đ&atilde; được đặt ra, nhằm gi&uacute;p SV n&acirc;ng cao t&iacute;nh tự học v&agrave; tự nghi&ecirc;n cứu để đạt kết quả tốt nhất c&oacute; thể.</p>', '<p>ĐCHP trong CTĐT ng&agrave;nh NTTS cung cấp đầy đủ th&ocirc;ng tin về HP v&agrave; theo mẫu quy định chung. Đề cương c&aacute;c HP thường xuy&ecirc;n được cập nhật tr&ecirc;n cơ sở lấy &yacute; kiến c&aacute;c b&ecirc;n li&ecirc;n quan. B&ecirc;n cạnh ĐCHP c&ograve;n c&oacute; th&ecirc;m ĐCCTHP cho từng HP dựa tr&ecirc;n h&igrave;nh thức GD trực tiếp v&agrave; trực tuyến kết hợp với E-learning.</p>', '<p>Một số HP c&oacute; nội dung ĐCHP cập nhật c&ograve;n hạn chế vẫn chưa đ&aacute;p ứng ho&agrave;n to&agrave;n theo kịp sự tiến bộ khoa học v&agrave; c&ocirc;ng nghệ của ng&agrave;nh học.</p>', '<p>Từ học kỳ (HK) II năm học 2020 - 2021, Viện NTTS phối hợp với c&aacute;c BM c&oacute; quản l&yacute; HP trong CTĐT tiến h&agrave;nh r&agrave; so&aacute;t c&aacute;c ĐCHP với sự tham gia của nh&oacute;m GV bi&ecirc;n soạn HP li&ecirc;n quan nhằm n&acirc;ng cao hiệu quả cập nhật.</p>', 5, NULL, NULL, NULL, NULL, 1, b'1', 3, 6, 3, 3, 5, NULL, '2022-06-08 07:48:57', '2022-06-11 09:22:19'),
(32, '<p>Bản m&ocirc; tả CTĐT của ng&agrave;nh NTTS <a class=\"is-minhchung\" style=\"color: #000; font-weight: bold; text-decoration: none;\" href=\"/storage/minhchungs/5/08-Jun-2022-02-02-K60_28_CTDT Nuoi trong TS - K60.doc\" target=\"_blank\" rel=\"nofollow noopener\">[CTĐT ng&agrave;nh NTTS (2018)]</a> được Trường ban h&agrave;nh v&agrave; c&ocirc;ng bố c&ocirc;ng khai đến c&aacute;c b&ecirc;n li&ecirc;n quan. Việc c&ocirc;ng bố c&ocirc;ng khai được thực hiện dưới nhiều h&igrave;nh thức kh&aacute;c nhau như đưa l&ecirc;n website của Viện NTTS <a class=\"is-minhchung\" style=\"color: #000; font-weight: bold; text-decoration: none;\" href=\"/storage/minhchungs/5/08-Jun-2022-02-50-K60_28_CTDT Nuoi trong TS - K60.doc\" target=\"_blank\" rel=\"nofollow noopener\">[C&ocirc;ng bố CTĐT ng&agrave;nh NTTS tr&ecirc;n website đơn vị]</a>, website của Ph&ograve;ng Đ&agrave;o tạo Đại học (ĐTĐH), th&ocirc;ng qua đội ngũ gi&aacute;o vi&ecirc;n CVHT, giới thiệu trong HP nhập m&ocirc;n NTTS,&hellip; n&ecirc;n c&aacute;c b&ecirc;n li&ecirc;n quan dễ d&agrave;ng tiếp cận. Tuy nhi&ecirc;n, th&ocirc;ng tin về CTĐT c&ograve;n phải hướng đến c&aacute;c đối tượng l&agrave; học sinh trung học phổ th&ocirc;ng (THPT). Do đ&oacute;, CTĐT cần phải lồng gh&eacute;p v&agrave;o c&aacute;c t&agrave;i liệu quảng b&aacute; ng&agrave;nh như tờ rơi, video,&hellip;. 100% đề cương c&aacute;c HP trong CTĐT ng&agrave;nh NTTS được Ph&ograve;ng Đảm bảo Chất lượng v&agrave; Khảo th&iacute; (ĐBCL&amp;KT) gửi th&ocirc;ng b&aacute;o đến c&aacute;c Khoa/Viện sau khi điều chỉnh cập nhật được c&ocirc;ng bố c&ocirc;ng khai cho NH, cơ quan sử dụng lao động th&ocirc;ng qua website Ph&ograve;ng ĐTĐH. Đồng thời ĐCCTHP cũng được y&ecirc;u cầu c&ocirc;ng bố c&ocirc;ng khai tr&ecirc;n website Viện hoặc Bộ m&ocirc;n quản l&yacute; c&aacute;c HP trong hai tuần đầu ti&ecirc;n của mỗi HK. Bản cứng của ĐCHP v&agrave; ĐCCTHP c&ograve;n được lưu trữ tại Văn ph&ograve;ng BM quản l&yacute; HP. B&ecirc;n cạnh đ&oacute;, c&aacute;c GV phụ tr&aacute;ch GD HP c&ograve;n giới thiệu ĐCHP trực tiếp cho SV tại lớp trong tuần học đầu ti&ecirc;n. Đối với HP triển khai dạy E-learning th&igrave; được GV phụ tr&aacute;ch đưa ĐCHP v&agrave; ĐCCTHP l&ecirc;n trang E-learning. Nhờ đ&oacute;, SV dễ d&agrave;ng tiếp cận v&agrave; chủ động x&acirc;y dựng kế hoạch học tập cho cả HK. T&oacute;m lại, c&aacute;c b&ecirc;n li&ecirc;n quan c&oacute; thể dễ d&agrave;ng tiếp cận c&aacute;c văn bản v&agrave;o bất cứ thời điểm n&agrave;o từ c&aacute;c website. Đối với bản cứng của ĐCHP/ĐCCTHP, người quan t&acirc;m c&oacute; thể tiếp cận dễ d&agrave;ng tại VP Viện/VP BM được giao quản l&yacute; HP trong giờ l&agrave;m việc.</p>', '<p>Trường c&oacute; quy định đề việc c&ocirc;ng bố c&ocirc;ng khai ĐCHP v&agrave; ĐCCTHP v&agrave;o đầu mỗi HK học trực tiếp tr&ecirc;n lớp v&agrave; tuần đầu ti&ecirc;n tr&ecirc;n Elearning. CTĐT, ĐCHP v&agrave; ĐCCTHP ng&agrave;nh NTTS được c&ocirc;ng bố kịp thời dưới nhiều h&igrave;nh thức kh&aacute;c nhau n&ecirc;n SV đăng k&yacute; tham gia HP dễ d&agrave;ng tiếp cận.</p>', '<p>H&igrave;nh thức c&ocirc;ng bố c&ocirc;ng khai CTĐT v&agrave; ĐCHP vẫn c&ograve;n chưa đến phần lớn học sinh v&ugrave;ng s&acirc;u v&ugrave;ng xa. B&ecirc;n cạnh đ&oacute; CTĐT của ng&agrave;nh NTTS chưa được in tr&ecirc;n c&aacute;c tờ rơi, video,... quảng b&aacute; ng&agrave;nh nghề.</p>', '<p>Từ HK II năm học 2020 - 2021, Viện NTTS phối hợp với c&aacute;c Ph&ograve;ng ban chức năng triển khai h&igrave;nh thức c&ocirc;ng khai bản m&ocirc; tả CTĐT v&agrave; đề cương c&aacute;c HP cần phong ph&uacute; v&agrave; ph&ugrave; hợp hơn cho c&aacute;c đối tượng li&ecirc;n quan đặc biệt l&agrave; học sinh v&ugrave;ng s&acirc;u v&ugrave;ng xa. Đồng thời tăng cường c&ocirc;ng bố c&ocirc;ng khai bản m&ocirc; tả CTĐT v&agrave; ĐCHP kh&ocirc;ng những tr&ecirc;n trang website của Trường m&agrave; c&ograve;n tr&ecirc;n trang website v&agrave; trang mạng x&atilde; hội của Viện NTTS. &nbsp;</p>', 5, NULL, NULL, NULL, NULL, 1, b'1', 3, 7, 3, 3, 5, NULL, '2022-06-08 07:53:36', '2022-06-11 09:22:19'),
(33, NULL, NULL, NULL, NULL, NULL, '<p>L&agrave; một trong những ng&agrave;nh đ&agrave;o tạo truyền thống của Trường, CTDH ng&agrave;nh NTTS x&acirc;y dựng theo khung tr&igrave;nh độ quốc gia v&agrave; hướng dẫn x&acirc;y dựng CTĐT bậc Đại học của Trường theo hệ thống t&iacute;n chỉ, trong đ&oacute; c&oacute; quy định tỷ lệ giữa c&aacute;c khối kiến thức trong một CTĐT nhằm mục ti&ecirc;u đạt được CĐR. Thiết kế CTDH của ng&agrave;nh lu&ocirc;n được cập nhật li&ecirc;n tục đảm bảo sự ph&ugrave; hợp với thực tiễn cũng như để đ&aacute;p ứng với xu thế ph&aacute;t triển kinh tế biển trong thời kỳ mới theo Nghị quyết của Đảng v&agrave; Ch&iacute;nh phủ. B&ecirc;n cạnh đ&oacute;, ban bi&ecirc;n soạn CTĐT ng&agrave;nh NTTS cũng đ&atilde; c&oacute; tham khảo th&ecirc;m CTĐT ng&agrave;nh NTTS của c&aacute;c Trường đại học trong nước ph&ugrave; hợp với ng&agrave;nh, chủ yếu l&agrave; Trường Đại học Cần Thơ, Trường Đại học N&ocirc;ng L&acirc;m Hồ Ch&iacute; Minh, Học viện N&ocirc;ng nghiệp Việt Nam nhằm đảm bảo tỷ lệ c&acirc;n đối của c&aacute;c khối kiến thức v&agrave; kỹ năng trong một CTĐT đại học. CTDH của ng&agrave;nh c&oacute; cấu tr&uacute;c, tr&igrave;nh tự logic với đầy đủ c&aacute;c kiến thức li&ecirc;n quan đến đại cương, cơ sở ng&agrave;nh v&agrave; chuy&ecirc;n ng&agrave;nh. CTDH cũng ch&uacute; trọng việc lồng gh&eacute;p một số m&ocirc;n học cơ sở ng&agrave;nh, giới thiệu về ng&agrave;nh trong năm học đầu ti&ecirc;n c&ugrave;ng với phần gi&aacute;o dục đại cương để gi&uacute;p NH hiểu th&ecirc;m về ng&agrave;nh học, tăng sự hứng th&uacute; của NH.&nbsp;</p>', '<p>CTDH ng&agrave;nh NTTS được thiết kế r&otilde; r&agrave;ng, mạch lạc dựa tr&ecirc;n CĐR đ&atilde; được lấy &yacute; kiến đầy đủ từ c&aacute;c b&ecirc;n li&ecirc;n quan v&agrave; tham khảo CTĐT ti&ecirc;n tiến của một số trường đại học c&oacute; thế mạnh về NTTS ở trong nước, việc đ&oacute;ng g&oacute;p của mỗi HP trong việc đạt được CĐR l&agrave; r&otilde; r&agrave;ng, minh bạch, NH v&agrave; c&aacute;c b&ecirc;n li&ecirc;n quan c&oacute; thể kiểm tra dễ d&agrave;ng việc đ&aacute;p ứng CĐR của từng HP, trong đ&oacute; thể hiện đầy đủ cấu tr&uacute;c, tr&igrave;nh tự logic v&agrave; nội dung cập nhật cũng như t&iacute;nh t&iacute;ch hợp của nội dung c&aacute;c HP trong CTĐT. Tuy nhi&ecirc;n, CTDH cũng c&oacute; một số điểm tồn tại như nội dung một số HP c&ograve;n c&oacute; sự tr&ugrave;ng lặp, số lượng HP c&ograve;n nhiều, việc đ&aacute;nh gi&aacute; trực tiếp kỹ năng TH, thực tập &iacute;t được sử dụng. Việc bố tr&iacute; HP Thực tập gi&aacute;o tr&igrave;nh kỹ thuật nu&ocirc;i thủy sản nước ngọt chưa ph&ugrave; hợp với m&ugrave;a vụ sản xuất. Ngo&agrave;i ra, c&aacute;c ĐCHP cũng chưa thể hiện r&otilde; ma trận li&ecirc;n kết giữa CĐR của HP với CĐR của CTĐT. Những bất cập v&agrave; hạn chế n&agrave;y sẽ tiếp tục được Viện NTTS phối hợp với Ph&ograve;ng ĐTĐH khắc phục v&agrave; điều chỉnh trong thời gian tới.</p>', 3, 3, 1, b'1', 3, 54, 4, 3, 5, NULL, '2022-06-08 07:54:50', '2022-06-11 09:26:43'),
(34, '<p>CĐR của ng&agrave;nh NTTS đ&atilde; được Trường ph&ecirc; duyệt <a class=\"is-minhchung\" style=\"color: #000; font-weight: bold; text-decoration: none;\" href=\"/storage/minhchungs/5/08-Jun-2022-02-02-K60_28_CTDT Nuoi trong TS - K60.doc\" target=\"_blank\" rel=\"nofollow noopener\">[CTĐT ng&agrave;nh NTTS (2018)]</a>, từ đ&oacute; l&agrave;m cơ sở x&aacute;c định c&aacute;c HP nhằm đ&aacute;p ứng CĐR, trước khi bố tr&iacute; hợp l&yacute; c&aacute;c HP trong CTDH. Tr&ecirc;n cơ sở đ&oacute; CTDH ng&agrave;nh NTTS năm 2018 được thiết kế bao gồm 03 phần ch&iacute;nh l&agrave; khối kiến thức đại cương (gồm 62 t&iacute;n chỉ, chiếm 39,24%) bao gồm những HP cung cấp kiến thức về ch&iacute;nh trị, tự nhi&ecirc;n, khoa học x&atilde; hội v&agrave; nh&acirc;n văn, tin học, ngoại ngữ, thể chất v&agrave; quốc ph&ograve;ng an ninh nhằm đ&aacute;p ứng tốt c&aacute;c CĐR về phẩm chất đạo đức, sức khỏe v&agrave; c&aacute;c kiến thức nền tảng cơ bản. Khối kiến thức cơ sở ng&agrave;nh (gồm 34 t&iacute;n chỉ, chiếm 21,52,2%) bao gồm những HP cung cấp kiến thức v&agrave; kỹ năng về hệ sinh th&aacute;i, sinh l&yacute; v&agrave; dinh dưỡng của động vật thủy sản, vi sinh vật. Khối kiến thức chuy&ecirc;n ng&agrave;nh (gồm 62 t&iacute;n chỉ, chiếm 39,24%) bao gồm những kiến thức v&agrave; kỹ năng về sản xuất giống v&agrave; nu&ocirc;i c&aacute;c đối tượng thủy sản, sản xuất thức ăn thủy sản, thiết kế c&ocirc;ng tr&igrave;nh nu&ocirc;i, bệnh học thủy sản, quy hoạch v&agrave; quản l&yacute; hoạt động NTTS nhằm đ&aacute;p ứng CĐR kiến thức về hiểu v&agrave; vận dụng c&aacute;c kiến thức chuy&ecirc;n m&ocirc;n cũng như CĐR kỹ năng về tổ chức thực hiện c&aacute;c quy tr&igrave;nh kỹ thuật li&ecirc;n quan đến lĩnh vực NTTS <a class=\"is-minhchung\" style=\"color: #000; font-weight: bold; text-decoration: none;\" href=\"/storage/minhchungs/5/08-Jun-2022-02-02-K60_28_CTDT Nuoi trong TS - K60.doc\" target=\"_blank\" rel=\"nofollow noopener\">[CTĐT ng&agrave;nh NTTS (2018)]</a>.</p>\r\n<p>Dựa tr&ecirc;n CĐR, một hoặc một chuỗi c&aacute;c HP được thiết kế để đ&aacute;p ứng CĐR của CTĐT v&agrave; được thể hiện r&otilde; trong ma trận HP-CĐR [H1.01.01.01]. V&iacute; dụ, để đ&aacute;p ứng CĐR của CTĐT về kỹ năng tổ chức thực hiện c&aacute;c quy tr&igrave;nh kỹ thuật sản xuất giống thủy sản, NTTS thương phẩm, sản xuất thức ăn thủy sản. CTDH được thiết kế với một chuỗi c&aacute;c HP như: sản xuất giống v&agrave; nu&ocirc;i c&aacute; biển, sản xuất giống v&agrave; nu&ocirc;i gi&aacute;p x&aacute;c, sản xuất giống v&agrave; nu&ocirc;i thương phẩm c&aacute; nước ngọt, sản xuất giống v&agrave; nu&ocirc;i động vật th&acirc;n mềm, sản xuất giống v&agrave; trồng rong biển, thức ăn trong NTTS, c&ocirc;ng tr&igrave;nh NTTS. C&aacute;c HP n&agrave;y đều bao gồm phần TH hoặc tham quan thực tế để NH c&oacute; kiến thức v&agrave; kỹ năng cơ bản trong tổ chức c&aacute;c hoạt động sản xuất giống thủy sản <a class=\"is-minhchung\" style=\"color: #000; font-weight: bold; text-decoration: none;\" href=\"/storage/minhchungs/5/08-Jun-2022-02-02-K60_28_CTDT Nuoi trong TS - K60.doc\" target=\"_blank\" rel=\"nofollow noopener\">[CTĐT ng&agrave;nh NTTS (2018)]</a>.</p>', '<p>CTDH ng&agrave;nh NTTS được thiết kế ph&ugrave; hợp, dựa tr&ecirc;n bộ CĐR đ&atilde; được x&acirc;y dựng về kiến thức, kỹ năng, mức tự chủ v&agrave; tr&aacute;ch nhiệm.</p>', '<p>Việc sử dụng phương ph&aacute;p đ&aacute;nh gi&aacute; trực tiếp kỹ năng TH của NH trong c&aacute;c HP TH, thực tập c&ograve;n hạn chế.</p>', '<p>Từ HK II năm học 2020 - 2021, Viện NTTS y&ecirc;u cầu GV tăng cường việc sử dụng phương ph&aacute;p đ&aacute;nh gi&aacute; trực tiếp kỹ năng TH của NH trong c&aacute;c HP c&oacute; TH, thực tập.</p>', 4, NULL, NULL, NULL, NULL, 1, b'1', 3, 8, 4, 3, 5, NULL, '2022-06-08 07:56:54', '2022-06-11 09:22:19'),
(35, '<p>Tất cả c&aacute;c HP trong CTDH ng&agrave;nh NTTS <a class=\"is-minhchung\" style=\"color: #000; font-weight: bold; text-decoration: none;\" href=\"/storage/minhchungs/5/08-Jun-2022-02-02-K60_28_CTDT Nuoi trong TS - K60.doc\" target=\"_blank\" rel=\"nofollow noopener\">[CTĐT ng&agrave;nh NTTS (2018)]</a> đều c&oacute; mục ti&ecirc;u v&agrave; nội dung r&otilde; r&agrave;ng, tương th&iacute;ch về nội dung v&agrave; thể hiện được sự đ&oacute;ng g&oacute;p cụ thể của mỗi HP nhằm đạt được CĐR. Đ&oacute;ng g&oacute;p của từng HP cho việc đạt được c&aacute;c CĐR của CTDH được thể hiện r&otilde; trong ma trận HP - CĐR <a class=\"is-minhchung\" style=\"color: #000; font-weight: bold; text-decoration: none;\" href=\"/storage/minhchungs/5/08-Jun-2022-02-02-K60_28_CTDT Nuoi trong TS - K60.doc\" target=\"_blank\" rel=\"nofollow noopener\">[CTĐT ng&agrave;nh NTTS (2018)]</a>. Trong đ&oacute;, mỗi HP được thiết kế để c&oacute; thể đ&aacute;p ứng một hoặc nhiều CĐR. V&iacute; dụ HP Thức ăn trong NTTS được thiết kế để đ&aacute;p ứng CĐR về kỹ năng chuy&ecirc;n m&ocirc;n l&agrave; &ldquo;Khả năng vận h&agrave;nh hoặc điều h&agrave;nh qu&aacute; tr&igrave;nh sản xuất thức ăn c&ocirc;ng nghiệp quy m&ocirc; nhỏ&rdquo;. Để phục vụ CĐR n&agrave;y, ĐCHP Thức ăn trong NTTS được thiết kế với c&aacute;c chủ đề về &ldquo;c&aacute;c nguy&ecirc;n liệu để sản xuất thức ăn thủy sản; x&acirc;y dựng c&ocirc;ng thức thức ăn v&agrave; Sản xuất thức ăn thủy sản&rdquo; nhằm cung cấp c&aacute;c kiến thức về c&aacute;c c&ocirc;ng đoạn li&ecirc;n quan đến sản xuất thức ăn thủy sản. Tổ hợp phương ph&aacute;p dạy học gồm thuyết giảng, ph&aacute;t vấn, thuyết tr&igrave;nh được kết hợp để gi&uacute;p NH nắm vững kiến thức v&agrave; tạo sự hứng th&uacute; trong học tập. NH cũng được TH t&iacute;nh to&aacute;n x&acirc;y dựng c&ocirc;ng thức thức ăn tr&ecirc;n c&aacute;c phần mềm, c&ocirc;ng cụ chuy&ecirc;n dụng. Cuối c&ugrave;ng NH sẽ trực tiếp TH c&aacute;c bước trong quy tr&igrave;nh sản xuất thức ăn c&ocirc;ng nghiệp tại PTN Dinh dưỡng v&agrave; thức ăn. NH cũng sẽ c&oacute; cơ hội được tham quan trực tiếp d&acirc;y chuyền sản xuất thức ăn thủy sản qui m&ocirc; lớn tại một nh&agrave; m&aacute;y thức ăn, qua đ&oacute; c&oacute; được c&aacute;c kỹ năng cơ bản trong sản xuất thức ăn thủy sản. Trong qu&aacute; tr&igrave;nh học, SV được đ&aacute;nh gi&aacute; mức độ hiểu biết v&agrave; kỹ năng th&ocirc;ng qua b&aacute;o c&aacute;o TH, seminar, kiểm tra v&agrave; thi cuối kh&oacute;a để gi&uacute;p đ&aacute;nh gi&aacute; ch&iacute;nh x&aacute;c KQHT của NH.</p>', '<p>Mỗi HP của CTDH đều c&oacute; sự đ&oacute;ng g&oacute;p để đạt được CĐR, c&oacute; nội dung tương th&iacute;ch với CĐR. NH dễ d&agrave;ng quan s&aacute;t việc đ&aacute;p ứng CĐR của c&aacute;c HP th&ocirc;ng qua ma trận HP &ndash; CĐR của CTDH.</p>', '<p>C&aacute;c ĐCHP chưa thể hiện r&otilde; ma trận li&ecirc;n kết giữa CĐR của HP với CĐR của CTĐT.</p>', '<p>Trong năm 2021, Viện NTTS phối hợp với c&aacute;c BM quản l&yacute; c&aacute;c HP của ng&agrave;nh NTTS cập nhật lại ĐCCTHP để thể hiện r&otilde; ma trận li&ecirc;n kết giữa CĐR của HP với CĐR của CTĐT.</p>', 4, NULL, NULL, NULL, NULL, 1, b'1', 3, 9, 4, 3, 5, NULL, '2022-06-08 08:00:51', '2022-06-11 09:22:19'),
(36, '<p>Nội dung của CTDH ng&agrave;nh NTTS năm 2016 v&agrave; cập nhật năm 2018 được thiết kế rất chặt chẽ, đảm bảo sự gắn kết v&agrave; liền mạch giữa c&aacute;c HP đại cương, cơ sở ng&agrave;nh v&agrave; chuy&ecirc;n ng&agrave;nh, được bố tr&iacute; GD trong 04 năm học, tương ứng với 08 HK. Hai HK đầu ti&ecirc;n cung cấp c&aacute;c nh&oacute;m kiến thức trong khối kiến thức chung để gi&uacute;p NH h&igrave;nh th&agrave;nh nền tảng tư duy v&agrave; những hiểu biết về văn h&oacute;a, x&atilde; hội, ch&iacute;nh trị, sức khỏe. Một số m&ocirc;n cơ sở ng&agrave;nh như sinh học, thực vật ở nước, động vật kh&ocirc;ng xương sống ở nước, ph&acirc;n loại th&acirc;n mềm được lồng gh&eacute;p ở giai đoạn n&agrave;y gi&uacute;p tăng sự hiểu biết của NH về ng&agrave;nh NTTS. Ba HK tiếp theo cung cấp c&aacute;c kiến thức cần thiết về cơ sở ng&agrave;nh v&agrave; một số m&ocirc;n chuy&ecirc;n ng&agrave;nh gi&uacute;p NH h&igrave;nh th&agrave;nh kiến thức nền tảng để chuẩn bị cho việc tiếp nhận c&aacute;c HP chuy&ecirc;n m&ocirc;n. Hai HK tiếp theo chủ yếu d&agrave;nh cho c&aacute;c HP chuy&ecirc;n ng&agrave;nh, c&ograve;n HK cuối chỉ d&agrave;nh cho c&ocirc;ng t&aacute;c tốt nghiệp, SV hoặc l&agrave;m đồ &aacute;n tốt nghiệp (ĐATN) (10 t&iacute;n chỉ) hoặc l&agrave;m chuy&ecirc;n đề (CĐ) tốt nghiệp (6TC) v&agrave; Thực tập tốt nghiệp (4TC) trong HK n&agrave;y <a class=\"is-minhchung\" style=\"color: #000; font-weight: bold; text-decoration: none;\" href=\"/storage/minhchungs/5/08-Jun-2022-02-02-K60_28_CTDT Nuoi trong TS - K60.doc\" target=\"_blank\" rel=\"nofollow noopener\">[CTĐT ng&agrave;nh NTTS (2018)]</a>.</p>\r\n<table style=\"border-collapse: collapse; width: 100%; height: 140px;\" border=\"1\"><colgroup><col style=\"width: 33.2913%;\"><col style=\"width: 33.2913%;\"><col style=\"width: 33.2913%;\"></colgroup>\r\n<tbody>\r\n<tr style=\"height: 20px;\">\r\n<td style=\"height: 20px; text-align: center;\"><strong>Năm</strong></td>\r\n<td style=\"height: 20px; text-align: center;\"><strong>Nội dung điểu chỉnh</strong></td>\r\n<td style=\"height: 20px; text-align: center;\"><strong>L&yacute; do</strong></td>\r\n</tr>\r\n<tr style=\"height: 40px;\">\r\n<td style=\"height: 40px; text-align: center;\">2017</td>\r\n<td style=\"height: 40px;\">Chuyển 2 HP: Thực tập Kỹ thuật nu&ocirc;i thủy sản nước ngọt (4TC) v&agrave; Thực tập Kỹ thuật nu&ocirc;i nước mặn, lợ (4TC) từ tự chọn sang bắt buộc</td>\r\n<td style=\"height: 40px;\">Gi&uacute;p NH r&egrave;n luyện kỹ năng nghề, đ&aacute;p ứng y&ecirc;u cầu c&ocirc;ng việc</td>\r\n</tr>\r\n<tr style=\"height: 20px;\">\r\n<td style=\"height: 20px; text-align: center;\">2018</td>\r\n<td style=\"height: 20px;\">Tăng số TC trong CTĐT từ 155 l&ecirc;n 158</td>\r\n<td style=\"height: 20px;\">Gi&uacute;p bổ sung phẩm chất ch&iacute;nh trị, quốc ph&ograve;ng, an ninh</td>\r\n</tr>\r\n<tr style=\"height: 20px;\">\r\n<td style=\"height: 20px; text-align: center;\">2018</td>\r\n<td style=\"height: 20px;\">Tăng thời gian thực tập gi&aacute;o tr&igrave;nh Kỹ thuật nu&ocirc;i thủy sản nước ngọt v&agrave; Thực tập Kỹ thuật nu&ocirc;i nước mặn, lợ từ 6 tuần l&ecirc;n 8 tuần/HP</td>\r\n<td style=\"height: 20px;\">Gi&uacute;p NH nắm bắt r&otilde; một chu tr&igrave;nh sản xuất giống thủy sản</td>\r\n</tr>\r\n<tr style=\"height: 20px;\">\r\n<td style=\"height: 20px; text-align: center;\">2019</td>\r\n<td style=\"height: 20px;\">Chuyển HP thay thế ĐA/KL</td>\r\n<td style=\"height: 20px;\">Gi&uacute;p NH tăng kỹ năng nghề nghiệp</td>\r\n</tr>\r\n<tr style=\"height: 20px;\">\r\n<td style=\"height: 20px; text-align: center;\">2020</td>\r\n<td style=\"height: 20px;\">Điều chỉnh thời gian thực tập gi&aacute;o tr&igrave;nh nu&ocirc;i thủy sản nước mặn, lợ v&agrave;o cuối học kỳ II&nbsp;</td>\r\n<td style=\"height: 20px;\">Gi&uacute;p NH c&oacute; thể k&eacute;o d&agrave;i thời gian thực tập nghề nghiệp trong thời gian h&egrave;, r&egrave;n luyện tay nghề.</td>\r\n</tr>\r\n</tbody>\r\n</table>', '<p>CTDH được thiết kế với cấu tr&uacute;c chặt chẽ, tr&igrave;nh tự logic giữa c&aacute;c khối kiến thức v&agrave; thời gian đ&agrave;o tạo, đảm bảo c&acirc;n đối giữa c&aacute;c kiến thức l&yacute; thuyết, TH v&agrave; đồ &aacute;n.&nbsp;</p>', '<p>Nội dung trong một số HP c&ograve;n c&oacute; sự tr&ugrave;ng lặp, l&agrave;m tăng số lượng c&aacute;c HP v&agrave; thời lượng GD. HP thực tập gi&aacute;o tr&igrave;nh kỹ thuật nu&ocirc;i thủy sản nước ngọt bố tr&iacute; chưa ph&ugrave; hợp với m&ugrave;a vụ sản xuất.</p>', '<p>Trong HK II năm học 2020 - 2021, Viện NTTS tiếp tục cập nhật CTĐT ng&agrave;nh NTTS theo hướng t&iacute;ch hợp c&aacute;c HP c&oacute; nội dung gần nhau để giảm số lượng HP v&agrave; tr&aacute;nh sự tr&ugrave;ng lặp giữa c&aacute;c HP, đồng thời bố tr&iacute; lại thời gian thực tập gi&aacute;o tr&igrave;nh kỹ thuật nu&ocirc;i thủy sản nước ngọt v&agrave;o th&aacute;ng 3 đến th&aacute;ng 5 để ph&ugrave; hợp với m&ugrave;a vụ sản xuất.</p>', 4, NULL, NULL, NULL, NULL, 1, b'1', 3, 10, 4, 3, 5, NULL, '2022-06-08 08:09:41', '2022-06-11 09:22:19'),
(37, NULL, NULL, NULL, NULL, NULL, '<p>Với định hướng dạy học ph&aacute;t triển năng lực, ng&agrave;nh NTTS chọn c&aacute;ch tiếp cận lấy NH l&agrave;m trung t&acirc;m, ch&uacute; trọng ph&aacute;t triển khả năng giải quyết vấn đề của NH, từ đ&oacute; ph&aacute;t huy tối đa năng lực s&aacute;ng tạo v&agrave; tự học của NH. C&aacute;c hoạt động dạy v&agrave; học trong CTĐT ng&agrave;nh NTTS được thiết kế ph&ugrave; hợp để đạt CĐR của ng&agrave;nh đ&agrave;o tạo. C&aacute;c hoạt động dạy v&agrave; học th&uacute;c đẩy việc h&igrave;nh th&agrave;nh c&aacute;c phương ph&aacute;p học tập v&agrave; nghi&ecirc;n cứu để NH c&oacute; thể tự học tập, kh&ocirc;ng ngừng n&acirc;ng cao kiến thức v&agrave; kỹ năng nghề nghiệp, bước đầu h&igrave;nh th&agrave;nh tư duy v&agrave; năng lực NCKH trong lĩnh vực NTTS.</p>', '<p>Trường c&oacute; Triết l&yacute; v&agrave; Mục ti&ecirc;u gi&aacute;o dục r&otilde; r&agrave;ng v&agrave; được phổ biến đến c&aacute;c b&ecirc;n li&ecirc;n quan. CTĐT ng&agrave;nh NTTS v&agrave; CTDH của từng HP c&oacute; mục ti&ecirc;u ri&ecirc;ng v&agrave; được c&ocirc;ng khai qua nhiều k&ecirc;nh kh&aacute;c nhau. C&aacute;c hoạt động dạy v&agrave; học c&aacute;c HP được thiết kế đa dạng, tương th&iacute;ch với CĐR của từng HP, nhằm đạt CĐR của ng&agrave;nh đ&agrave;o tạo. Qu&aacute; tr&igrave;nh dạy - học hướng đến việc ph&aacute;t triển c&aacute;c kỹ năng, năng lực học tập, khả năng tự học, khả năng vận dụng kiến thức để giải quyết vấn đề, khả năng tổng hợp th&ocirc;ng tin, t&iacute;nh chủ động v&agrave; tinh thần học tập suốt đời cho NH.</p>\r\n<p>Tuy nhi&ecirc;n, Viện NTTS chưa tổ chức thường xuy&ecirc;n Hội nghị học tốt để trao đổi phương ph&aacute;p học tập v&agrave; r&egrave;n luyện cho NH. Một số HP chưa tổ chức c&aacute;c h&igrave;nh thức học tập linh hoạt nhằm tạo m&ocirc;i trường học tập đa dạng cho NH để đ&aacute;p ứng nhu cầu thực tiễn của NH. Viện đ&atilde; c&oacute; kế hoạch để khắc phục tồn tại n&agrave;y ngay trong năm học 2020 &ndash; 2021.</p>', 3, 3, 1, b'1', 3, 55, 5, 3, 5, NULL, '2022-06-08 08:15:37', '2022-06-12 03:56:53'),
(38, '<p>Trường c&oacute; Triết l&yacute; gi&aacute;o dục v&agrave; Mục ti&ecirc;u gi&aacute;o dục được tuy&ecirc;n bố ch&iacute;nh thức theo QĐ số 840/QĐ &ndash; ĐHNT, ng&agrave;y 25/07/2019. Triết l&yacute; gi&aacute;o dục của Trường l&agrave;: <em>&ldquo;Ch&uacute; trọng ph&aacute;t triển t&iacute;nh chuy&ecirc;n nghiệp, khả năng s&aacute;ng tạo v&agrave; &yacute; thức tr&aacute;ch nhiệm trong m&ocirc;i trường gi&aacute;o dục hội nhập, gắn kết với thực tiễn nghề nghiệp v&agrave; cộng đồng&rdquo;; </em>Mục ti&ecirc;u gi&aacute;o dục của Trường l&agrave;:<em> &ldquo;nhằm ph&aacute;t triển ở NH: Bản lĩnh ch&iacute;nh trị, &yacute; thức tr&aacute;ch nhiệm, đạo đức, thẩm mỹ v&agrave; sức khỏe, kiến thức nền tảng v&agrave; chuy&ecirc;n s&acirc;u về nghề nghiệp, kỹ năng mềm v&agrave; kỹ năng chuy&ecirc;n m&ocirc;n ph&ugrave; hợp với nghề nghiệp, khả năng nghi&ecirc;n cứu và ứng dụng khoa học - c&ocirc;ng ngh&ecirc;̣, tinh thần lập nghiệp, khả năng tự học, s&aacute;ng tạo v&agrave; th&iacute;ch ứng với m&ocirc;i trường hoạt động nghề nghiệp&rdquo;.</em><br>Triết l&yacute; v&agrave; Mục ti&ecirc;u gi&aacute;o dục của Trường được x&acirc;y dựng bởi tổ chuy&ecirc;n tr&aacute;ch của Trường tr&ecirc;n cơ sở tham vấn chuy&ecirc;n gia ng&ocirc;n ngữ, tổ chức hội thảo g&oacute;p &yacute;, c&aacute;c kết quả phỏng vấn, khảo s&aacute;t, lấy &yacute; kiến của l&atilde;nh đạo trường, CB chủ chốt, CBVC v&agrave; c&aacute;c doanh nghiệp.&nbsp;<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Triết l&yacute; v&agrave; Mục ti&ecirc;u gi&aacute;o dục của Trường được phổ biến rộng r&atilde;i tới c&aacute;c b&ecirc;n li&ecirc;n quan th&ocirc;ng qua cổng th&ocirc;ng tin điện tử của trường [H4.04.01.03]. Ngo&agrave;i ra, th&ocirc;ng qua Hội thảo khoa học nh&acirc;n dịp kỷ niệm 60 năm ng&agrave;y th&agrave;nh lập trường (được tổ chức ng&agrave;y 31/7/2019), Trường đ&atilde; phổ biến triết l&yacute; v&agrave; mục ti&ecirc;u gi&aacute;o dục đến CBVC trong trường, c&aacute;c nh&agrave; khoa học, c&aacute;c nh&agrave; quản l&yacute;, CB, GV ở c&aacute;c Viện nghi&ecirc;n cứu, c&aacute;c trường Đại học v&agrave; Cao đẳng trong nước.</p>', '<p>Triết l&yacute; v&agrave; Mục ti&ecirc;u gi&aacute;o dục của Trường được tuy&ecirc;n bố ch&iacute;nh thức, r&otilde; r&agrave;ng. Trường c&oacute; văn bản giới thiệu Triết l&yacute; gi&aacute;o dục của Trường v&agrave; được phổ biến đến c&aacute;c b&ecirc;n li&ecirc;n quan.</p>', '<p>Việc tiếp cận, thấu hiểu để thực hiện chuyển tải &yacute; nghĩa của Triết l&yacute; gi&aacute;o dục v&agrave;o trong một số &iacute;t HP vẫn c&ograve;n hạn chế.</p>', '<p>Từ năm học 2020 &ndash; 2021, Viện NTTS sẽ tăng cường c&ocirc;ng t&aacute;c truyền th&ocirc;ng, đẩy mạnh việc phổ biến &yacute; nghĩa của Triết l&yacute; gi&aacute;o dục đến CBVC, NH qua nhiều k&ecirc;nh (c&oacute; ĐCCTHP) v&agrave; h&igrave;nh thức đa dạng, phong ph&uacute; hơn.&nbsp;</p>', 4, NULL, NULL, NULL, NULL, 1, b'1', 3, 11, 5, 3, 5, NULL, '2022-06-08 08:17:39', '2022-06-11 09:22:19'),
(39, '<p>Chiến lược GD v&agrave; học tập ng&agrave;nh NTTS tiếp cận dựa tr&ecirc;n CĐR của CTĐT, từ CĐR của CTĐT thiết kế CĐR c&aacute;c HP, được thể hiện trong ĐCHP. Phương ph&aacute;p GD v&agrave; học tập trong CTĐT ng&agrave;nh NTTS đa dạng như: thuyết giảng, tham luận, thảo luận, dự &aacute;n, ph&aacute;t hiện v&agrave; giải quyết vấn đề, b&agrave;i tập, dạy học theo h&igrave;nh thức E-learning &hellip;v&agrave; được thiết kế ph&ugrave; hợp để đạt CĐR của c&aacute;c HP, từ đ&oacute; g&oacute;p phần đạt CĐR của CTĐT. Hoạt động dạy v&agrave; học từng HP được điều chỉnh, cập nhật thường xuy&ecirc;n để gi&uacute;p NH lĩnh hội c&aacute;c kiến thức mới, h&igrave;nh th&agrave;nh c&aacute;c kỹ năng để đạt CĐR, đ&aacute;p ứng nhu cầu thực tiễn của x&atilde; hội.</p>\r\n<p>Nhằm kh&ocirc;ng ngừng n&acirc;ng cao chất lượng GD, g&oacute;p phần thực hiện mục ti&ecirc;u đ&agrave;o tạo của ng&agrave;nh NTTS, Viện NTTS đ&atilde; tổ chức c&aacute;c hội nghị, sinh hoạt học thuật cấp Viện, cấp BM để thảo luận, trao đổi về phương ph&aacute;p giảng dạy (PPGD), đ&aacute;nh gi&aacute; cho từng nh&oacute;m HP. Trường đ&atilde; th&ocirc;ng b&aacute;o, hướng dẫn v&agrave; y&ecirc;u cầu tất cả GV đẩy mạnh ứng dụng c&ocirc;ng nghệ số trong dạy học, sử dụng hệ thống Nha Trang University (NTU) E-learning ở c&aacute;c mức độ kh&aacute;c nhau trong dạy học, tổ chức c&aacute;c hội thảo n&acirc;ng cao chất lượng đ&agrave;o tạo, tổ chức tập huấn PPGD cho GV trẻ. Ph&ograve;ng ĐBBCL&amp;KT x&acirc;y dựng &ldquo;Diễn đ&agrave;n đổi mới phương ph&aacute;p GD - đ&aacute;nh gi&aacute; v&agrave; quản l&yacute; đại học&rdquo; để GV v&agrave; CBVC c&oacute; thể chia sẻ t&agrave;i liệu, kinh nghiệm trong GD, hay thảo luận về PPGD.</p>', '<p>C&aacute;c hoạt động dạy v&agrave; học đa dạng v&agrave; được thiết kế ph&ugrave; hợp với đặc điểm kiến thức của từng HP để đạt CĐR. &nbsp;</p>', '<p>V&igrave; l&yacute; do m&ugrave;a vụ, một số HP cơ sở ng&agrave;nh v&agrave; chuy&ecirc;n ng&agrave;nh chưa tổ chức những h&igrave;nh thức học tập linh hoạt để tạo m&ocirc;i trường học tập đa dạng cho NH, như tổ chức học tập tại thực địa, cho NH đi thực tế, tham quan c&aacute;c cơ sở hoặc TH m&ocirc;n học tại cơ sở.</p>', '<p>Từ năm học 2020 - 2021, với c&aacute;c mối quan hệ hợp t&aacute;c ng&agrave;y c&agrave;ng mở rộng giữa Viện NTTS v&agrave; c&aacute;c viện nghi&ecirc;n cứu, c&aacute;c doanh nghiệp, tập đo&agrave;n thủy sản&hellip;Viện NTTS th&uacute;c đẩy v&agrave; tạo điều kiện để GV thiết kế chương tr&igrave;nh GD linh hoạt, tạo điều kiện tối đa cho NH tham gia c&aacute;c hoạt động trải nghiệm ngoại kh&oacute;a, được tiếp cận c&aacute;c vấn đề thực tiễn để h&igrave;nh th&agrave;nh khả năng tư duy, tự học để đ&aacute;p ứng tốt nhất với CĐR của ng&agrave;nh đ&agrave;o tạo.</p>', 5, NULL, NULL, NULL, NULL, 1, b'1', 3, 12, 5, 3, 5, NULL, '2022-06-08 08:22:26', '2022-06-11 09:22:19');
INSERT INTO `bao_caos` (`id`, `moTa`, `diemManh`, `diemTonTai`, `keHoachHanhDong`, `diemTDG`, `moDau`, `ketLuan`, `tongSoTC`, `soTCDat`, `trangThai`, `congKhai`, `nganh_id`, `tieuChi_id`, `tieuChuan_id`, `dotDanhGia_id`, `nguoiDung_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(40, '<p>Tất cả ĐCCTHP m&ocirc; tả r&otilde; việc sử dụng c&aacute;c phương ph&aacute;p GD, học tập ph&ugrave; hợp nhằm th&uacute;c đẩy việc r&egrave;n luyện c&aacute;c kỹ năng thiết yếu, kỹ năng mềm cho NH.</p>\r\n<p>Đối với c&aacute;c HP thuộc khối kiến thức gi&aacute;o dục đại cương, hoạt động dạy v&agrave; học của mỗi HP được thiết kế ph&ugrave; hợp nhằm cung cấp những kiến thức nền tảng, gi&uacute;p NH c&oacute; tư duy rộng để n&acirc;ng cao khả năng tự học.</p>\r\n<p>Hoạt động dạy v&agrave; học c&aacute;c HP cơ sở ng&agrave;nh v&agrave; chuy&ecirc;n ng&agrave;nh trong CTĐT được x&acirc;y dựng dựa tr&ecirc;n c&aacute;c chủ đề, c&aacute;c vấn đề gắn liền với thực tiễn của ng&agrave;nh. Trong qu&aacute; tr&igrave;nh GD, đặc biệt l&agrave; GD TH, thực tập chuy&ecirc;n ng&agrave;nh, thực tập tốt nghiệp, GV lu&ocirc;n gợi &yacute; để NH ph&aacute;t hiện c&aacute;c vấn đề nghi&ecirc;n cứu, c&aacute;c kỹ năng cần TH. NH được hướng dẫn để tự học, tự nghi&ecirc;n cứu, TH, viết v&agrave; tr&igrave;nh b&agrave;y b&aacute;o c&aacute;o. Th&ocirc;ng qua đ&oacute;, NH sẽ h&igrave;nh th&agrave;nh v&agrave; n&acirc;ng cao c&aacute;c kỹ năng nghề nghiệp v&agrave; kỹ năng mềm. Ngo&agrave;i ra, th&ocirc;ng qua c&aacute;c hoạt động dạy v&agrave; học c&aacute;c HP TH, thực tập tại c&aacute;c cơ sở sản xuất gi&uacute;p cho NH sớm tiếp cận với thực tế, tạo tiền đề để sau khi ra trường NH c&oacute; thể tiếp cận nhanh với c&ocirc;ng việc. H&agrave;ng năm, Trường tổ chức lấy &yacute; kiến cựu SV v&agrave; doanh nghiệp về mức độ đ&aacute;p ứng của c&aacute;c kỹ năng chuy&ecirc;n m&ocirc;n, kỹ năng mềm của NH sau khi tốt nghiệp l&agrave;m cơ sở để cập nhật CTĐT v&agrave; đổi mới PPGD.&nbsp;</p>', '<p>Th&ocirc;ng qua c&aacute;c hoạt động ngoại kh&oacute;a, NH được hướng dẫn phương ph&aacute;p học tập chủ động, tự học, tự nghi&ecirc;n cứu, từ đ&oacute; đạt được những kiến thức mới, kỹ năng mới, ph&aacute;t huy t&iacute;nh s&aacute;ng tạo. Viện NTTS lu&ocirc;n khuyến kh&iacute;ch, th&uacute;c đẩy v&agrave; tạo điều kiện thuận lợi để NH tham gia NCKH nhằm r&egrave;n luyện c&aacute;c kỹ năng, n&acirc;ng cao khả năng học tập suốt đời của NH.</p>', '<p>Viện NTTS chưa tổ chức thường xuy&ecirc;n c&aacute;c Hội nghị học tốt để GV, NH giao lưu, trao đổi về phương ph&aacute;p học tập, r&egrave;n luyện.</p>', '<p>Từ năm học 2020 - 2021, Đo&agrave;n Thanh ni&ecirc;n - Viện NTTS kết hợp với CVHT định kỳ tổ chức Hội nghị học tốt đầu mỗi năm học để GV v&agrave; NH trao đổi về phương ph&aacute;p học tập, r&egrave;n luyện.</p>', 5, NULL, NULL, NULL, NULL, 1, b'1', 3, 13, 5, 3, 5, NULL, '2022-06-08 08:24:23', '2022-06-11 09:22:19'),
(41, NULL, NULL, NULL, NULL, NULL, '<p>Đ&aacute;nh gi&aacute; KQHT của NH l&agrave; một trong những kh&acirc;u quan trọng trong gi&aacute;o dục n&oacute;i chung v&agrave; GDĐH n&oacute;i ri&ecirc;ng. Kết quả đ&aacute;nh gi&aacute; kh&ocirc;ng những c&oacute; ảnh hưởng trực tiếp đến qu&aacute; tr&igrave;nh học m&agrave; c&ograve;n ảnh hưởng đến c&ocirc;ng việc của NH sau khi ra trường. Việc đ&aacute;nh gi&aacute; KQHT của NH theo học CTĐT ng&agrave;nh NTTS được thiết kế tr&ecirc;n cơ sở ph&ugrave; hợp với mức độ đạt được của CĐR. Việc đ&aacute;nh gi&aacute; kh&ocirc;ng chỉ nhằm v&agrave;o kiến thức th&ocirc;ng qua qu&aacute; tr&igrave;nh kiểm tra, thi m&agrave; c&ograve;n bao gồm đ&aacute;nh gi&aacute; kỹ năng v&agrave; th&aacute;i độ của NH. Mỗi HP, GV phụ tr&aacute;ch HP phải d&agrave;nh thời gian cung cấp cho NH ĐCCTHP, lịch tr&igrave;nh v&agrave; c&aacute;ch thức đ&aacute;nh gi&aacute; KQHT của HP đ&oacute;. Đồng thời c&ocirc;ng khai l&ecirc;n trang website của c&aacute;c BM quản l&yacute; thuộc Viện NTTS. NH chủ động nắm được to&agrave;n bộ nội dung, lịch tr&igrave;nh, c&aacute;c h&igrave;nh thức đ&aacute;nh gi&aacute; HP th&ocirc;ng qua ĐCCTHP.</p>\r\n<p>Phương ph&aacute;p đ&aacute;nh gi&aacute; KQHT đa dạng, đảm bảo độ gi&aacute; trị, độ tin cậy v&agrave; sự c&ocirc;ng bằng. C&aacute;c quy định về đ&aacute;nh gi&aacute; KQHT đều được phổ biến đến NH khi vừa nhập học th&ocirc;ng qua sổ tay SV. Kết quả đ&aacute;nh gi&aacute; được phản hồi kịp thời đến NH th&ocirc;ng qua t&agrave;i khoản c&aacute; nh&acirc;n NH. Dựa tr&ecirc;n KQHT, NH chủ động kịp thời x&acirc;y dựng kế hoạch học cải thiện, học vượt hoặc học song ng&agrave;nh. Việc phản hồi nhanh ch&oacute;ng KQHT đến NH cũng gi&uacute;p NH tiếp cận dễ d&agrave;ng với quy tr&igrave;nh khiếu nại về KQHT với GV, thậm ch&iacute; khiếu nại l&ecirc;n Trường khi cần thiết.</p>', '<p>Việc đ&aacute;nh gi&aacute; KQHT NH theo CTĐT ng&agrave;nh NTTS được thực hiện theo đ&uacute;ng quy định của của Trường v&agrave; Bộ GD&amp;ĐT, ph&ugrave; hợp với CĐR của ng&agrave;nh NTTS. C&aacute;c quy định về đ&aacute;nh gi&aacute; KQHT của NH r&otilde; r&agrave;ng v&agrave; được th&ocirc;ng b&aacute;o c&ocirc;ng khai tới NH. C&aacute;c phương ph&aacute;p đ&aacute;nh gi&aacute; đa dạng, đảm bảo độ gi&aacute; trị, độ tin cậy, kh&aacute;ch quan v&agrave; c&ocirc;ng bằng. KQHT được th&ocirc;ng b&aacute;o kịp thời đến NH v&agrave; NH cũng dễ d&agrave;ng thực hiện việc khiếu nại. Tuy nhi&ecirc;n, việc hướng dẫn, tập huấn c&aacute;c phương ph&aacute;p đ&aacute;nh gi&aacute; ph&ugrave; hợp với HP v&agrave; CĐR chưa được thường xuy&ecirc;n đến GV. Những tồn tại n&agrave;y sẽ được Viện NTTS bắt đầu khắc phục từ năm học 2020 - 2021.</p>', 5, 5, 1, b'1', 3, 56, 6, 3, 12, NULL, '2022-06-08 08:26:47', '2022-06-11 09:26:43'),
(42, '<p>Việc đ&aacute;nh gi&aacute; KQHT của NH của ng&agrave;nh NTTS tại Trường được thực hiện theo quy định hiện h&agrave;nh v&agrave; Ph&ograve;ng ĐBCL&amp;KT chịu tr&aacute;ch nhiệm theo d&otilde;i, gi&aacute;m s&aacute;t v&agrave; đ&aacute;nh gi&aacute;. Việc đ&aacute;nh gi&aacute; KQHT của NH được thiết kế ph&ugrave; hợp với mức độ đạt được CĐR. SV được đ&aacute;nh gi&aacute; năng lực ngoại ngữ để xếp lớp học ngoại ngữ ph&ugrave; hợp với tr&igrave;nh độ của m&igrave;nh ngay sau khi nhập học.&nbsp;</p>', '<p>Trường c&oacute; c&aacute;c quy định r&otilde; r&agrave;ng về đ&aacute;nh gi&aacute; KQHT của NH. Các hình thức ki&ecirc;̉m tra, đánh giá và bài ki&ecirc;̉m tra, đánh giá đã xác định được mức đ&ocirc;̣ ki&ecirc;́n thức và kỹ năng NH c&acirc;̀n đạt. Ph&ugrave; hợp mục ti&ecirc;u, CĐR từng HP v&agrave; CTĐT.</p>', '<p>Việc hướng dẫn, tập huấn c&aacute;c phương ph&aacute;p đ&aacute;nh gi&aacute; ph&ugrave; hợp với HP v&agrave; CĐR chưa được thường xuy&ecirc;n đến GV.</p>', '<p>Từ năm học 2020 &ndash; 2021, Trường, Viện NTTS x&acirc;y dựng kế hoạch triển khai thường xuy&ecirc;n c&aacute;c kh&oacute;a tập huấn, hội thảo để hướng dẫn lựa chọn c&aacute;c phương ph&aacute;p đ&aacute;nh gi&aacute; HP.</p>', 4, NULL, NULL, NULL, NULL, 1, b'1', 3, 14, 6, 3, 12, NULL, '2022-06-08 08:28:37', '2022-06-11 09:22:19'),
(43, '<p>C&aacute;c quy định đ&aacute;nh gi&aacute; KQHT của NH được thể hiện cụ thể trong c&aacute;c quy định hiện h&agrave;nh của Trường (bao gồm thời gian, phương ph&aacute;p, ti&ecirc;u ch&iacute;, trọng số,...) được c&ocirc;ng bố c&ocirc;ng khai tr&ecirc;n website của Trường v&agrave; trong sổ tay SV, sổ tay ng&agrave;nh nghề đ&agrave;o tạo.</p>\r\n<p>C&aacute;c quy định đ&aacute;nh gi&aacute; KQHT của NH được thể hiện cụ thể trong c&aacute;c quy định v&agrave; Ph&ograve;ng ĐBCL&amp;KT chịu tr&aacute;ch nhiệm theo d&otilde;i, gi&aacute;m s&aacute;t v&agrave; đ&aacute;nh gi&aacute;. C&aacute;c quy định n&agrave;y được thể hiện r&otilde; thời gian (kiểm tra giữa kỳ, c&aacute;c b&agrave;i tập lớn, seminar,...), phương ph&aacute;p, ti&ecirc;u ch&iacute;, trọng số đ&aacute;nh gi&aacute; NH cho từng HP được thể hiện chi tiết trong ĐCCTHP được c&ocirc;ng bố c&ocirc;ng khai tr&ecirc;n website của c&aacute;c BM quản l&yacute; HP v&agrave; GV phụ tr&aacute;ch HP cũng phổ biến đến SV trong buổi đầu ti&ecirc;n l&ecirc;n lớp. Thời gian thi kết th&uacute;c HP do ph&ograve;ng ĐTĐH lập kế hoạch.</p>\r\n<p>Phương ph&aacute;p đ&aacute;nh gi&aacute; được thực hiện theo hai nội dung: đ&aacute;nh gi&aacute; qu&aacute; tr&igrave;nh v&agrave; thi kết th&uacute;c HP. Đ&aacute;nh gi&aacute; qu&aacute; tr&igrave;nh bao gồm nhiều cột điểm kh&aacute;c nhau như: kiểm tra giữa kỳ, chuy&ecirc;n cần, tham gia thảo luận bằng c&ocirc;ng cụ đ&aacute;nh gi&aacute; rubric. Thi kết th&uacute;c HP được thực hiện theo nhiều h&igrave;nh thức kh&aacute;c nhau như: tự luận, vấn đ&aacute;p, tiểu luận, hoặc kết hợp nhiều h&igrave;nh thức. Trọng số của điểm qu&aacute; tr&igrave;nh được quy định chiếm tối đa kh&ocirc;ng qu&aacute; 50% v&agrave; được c&ocirc;ng khai trong ĐCHP.&nbsp;</p>', '<p>Trường c&oacute; quy định cụ thể, r&otilde; r&agrave;ng về việc đ&aacute;nh gi&aacute; KQHT của NH v&agrave; được phổ biến c&ocirc;ng khai đến NH, đồng thời c&oacute; sự hợp t&aacute;c chặt chẽ của GV trong việc thực hiện quy định, đ&aacute;p ứng CĐR.</p>', '<p>GV chưa thường xuy&ecirc;n phổ biến c&aacute;c quy định về kiểm tra/đ&aacute;nh gi&aacute; KQHT do đ&oacute; một số SV chưa nắm r&otilde; c&aacute;c quy định kiểm tra/đ&aacute;nh gi&aacute;.</p>', '<p>Từ năm học 2020 - 2021, Ban l&atilde;nh đạo Viện NTTS, Trưởng BM, GV, CVHT tăng cường phổ biến c&aacute;c quy định kiểm tra/đ&aacute;nh gi&aacute; học tập th&ocirc;ng qua c&aacute;c buổi ch&agrave;o cờ SV, c&aacute;c buổi sinh hoạt lớp v&agrave; buổi đầu ti&ecirc;n GD của từng HP.</p>', 5, NULL, NULL, NULL, NULL, 1, b'1', 3, 15, 6, 3, 12, NULL, '2022-06-08 08:30:54', '2022-06-11 09:22:19'),
(44, '<p>Phương ph&aacute;p đ&aacute;nh gi&aacute; KQHT của NH được quy định r&otilde; r&agrave;ng v&agrave; được đưa v&agrave;o sổ tay SV, sổ tay ng&agrave;nh nghề đ&agrave;o tạo. Phương ph&aacute;p đ&aacute;nh gi&aacute; KQHT của NH đa dạng, được thể hiện ở th&agrave;nh phần đ&aacute;nh gi&aacute;: đ&aacute;nh gi&aacute; qu&aacute; tr&igrave;nh (chuy&ecirc;n cần, kiểm tra nhanh, thảo luận, seminar, TH, b&aacute;o c&aacute;o, kiểm tra viết&hellip;), thi kết th&uacute;c HP (vấn đ&aacute;p, trắc nghiệm, tự luận, tổng hợp (trắc nghiệm v&agrave; tự luận), tiểu luận&hellip;) v&agrave; c&aacute;c HP được qui định phương ph&aacute;p đ&aacute;nh gi&aacute; r&otilde; r&agrave;ng, cụ thể trong ĐCCTHP v&agrave; theo quy định số 586/QĐ-ĐHNT, ng&agrave;y 03/06/2019 (Quy tr&igrave;nh 3: quy tr&igrave;nh tổ chức đ&aacute;nh gi&aacute; kết th&uacute;c HP). Đề thi được thiết kế ở dạng đề mở hoặc đề đ&oacute;ng, được x&acirc;y dựng ở mức dộ cơ bản đến ứng dụng v&agrave; được Trưởng BM ph&ecirc; duyệt.</p>\r\n<p>Trường đ&atilde; ban h&agrave;nh văn bản ph&aacute;t triển ng&acirc;n h&agrave;ng đề thi kết th&uacute;c HP c&aacute;c HP gi&aacute;o dục đại cương, cơ sở v&agrave; ứng dụng rubric trong đ&aacute;nh gi&aacute; HP nhằm đảm bảo t&iacute;nh kh&aacute;ch quan, ch&iacute;nh x&aacute;c trong việc đ&aacute;nh gi&aacute; năng lực của NH, đ&aacute;p ứng CTĐT v&agrave; CĐR HP.</p>', '<p>GV sử dụng đa dạng phương ph&aacute;p đ&aacute;nh gi&aacute;. Đề thi bảo đảm bao phủ nội dung v&agrave; căn cứ theo ti&ecirc;u ch&iacute; đ&aacute;nh gi&aacute; đảm bảo t&iacute;nh kh&aacute;ch quan, c&ocirc;ng bằng cho SV. Việc đ&aacute;nh gi&aacute; KQHT ph&ugrave; hợp với h&igrave;nh thức đ&agrave;o tạo, mục ti&ecirc;u của từng HP v&agrave; CĐR của CTĐT.</p>\r\n<p>Đ&aacute;nh gi&aacute; KQHT đ&uacute;ng quy tr&igrave;nh, phương ph&aacute;p đa dạng, đảm bảo nghi&ecirc;m t&uacute;c, kh&aacute;ch quan, ch&iacute;nh x&aacute;c c&ocirc;ng bằng cho SV.&nbsp;</p>', '<p>Việc sử dụng c&ocirc;ng cụ hỗ trợ kiểm tra v&agrave; đ&aacute;nh gi&aacute; HP như rubric chưa được thực hiện trong tất cả c&aacute;c HP.</p>', '<p>Từ năm học 2020 - 2021, c&aacute;c BM tăng cường sử dụng rubric trong đ&aacute;nh gi&aacute; c&aacute;c HP.</p>', 4, NULL, NULL, NULL, NULL, 1, b'1', 3, 16, 6, 3, 12, NULL, '2022-06-08 08:32:28', '2022-06-11 09:22:19'),
(45, '<p>Kết quả đ&aacute;nh gi&aacute; của NH được phản hồi kịp thời, th&ocirc;ng qua c&aacute;c quy định chặt chẽ trong quy chế đ&agrave;o tạo. Đối với đ&aacute;nh gi&aacute; qu&aacute; tr&igrave;nh, GV phụ tr&aacute;ch HP c&oacute; tr&aacute;ch nhiệm sửa v&agrave; trả b&agrave;i cho SV trong thời gian GD HP. SV c&oacute; quyền phản hồi lại c&aacute;c kết quả kiểm tra v&agrave; đ&aacute;nh gi&aacute; để được giải đ&aacute;p. Điểm đ&aacute;nh gi&aacute; qu&aacute; tr&igrave;nh của c&aacute;c HP ng&agrave;nh NTTS đảm bảo được th&ocirc;ng b&aacute;o c&ocirc;ng khai đến NH trước khi thi kết th&uacute;c HP. Việc phản hồi điểm đ&aacute;nh gi&aacute; qu&aacute; tr&igrave;nh kịp thời gi&uacute;p SV c&oacute; điểm qu&aacute; tr&igrave;nh chưa đảm bảo chủ động điều chỉnh qu&aacute; tr&igrave;nh học tập, đầu tư th&ecirc;m thời gian v&agrave; t&igrave;m phương ph&aacute;p học th&iacute;ch hợp cho kỳ thi kết th&uacute;c HP đạt kết quả cao hơn.</p>', '<p>Trường c&oacute; quy định về thời gian v&agrave; quy tr&igrave;nh c&ocirc;ng khai đ&aacute;nh gi&aacute; NH v&agrave; được NH h&agrave;i l&ograve;ng. Trường c&oacute; quy định về thời gian c&ocirc;ng bố kết quả đ&aacute;nh gi&aacute; HP gi&uacute;p NH chủ động theo d&otilde;i - kiểm tra v&agrave; cải thiện KQHT.</p>', '<p>Một số &iacute;t HP gi&aacute;o dục đại cương c&ocirc;ng khai điểm qu&aacute; tr&igrave;nh s&aacute;t với thời gian thi cuối kỳ do GV GD khối lượng lớn.</p>', '<p>Trong năm học 2020 - 2021, Viện NTTS c&acirc;n đối khối lượng GD tr&ecirc;n từng GV để giảm khối lượng cho một số GV GD c&aacute;c HP gi&aacute;o dục đại cương.</p>', 5, NULL, NULL, NULL, NULL, 1, b'1', 3, 17, 6, 3, 12, NULL, '2022-06-08 08:33:32', '2022-06-11 09:22:19'),
(46, '<p>C&aacute;c quy định, quy tr&igrave;nh khiếu nại về KQHT của NH thể hiện trong c&aacute;c quy định đang được &aacute;p dụng tại Trường v&agrave; sổ tay SV. C&aacute;c quy tr&igrave;nh, biểu mẫu khiếu nại về KQHT được ph&ograve;ng ĐTĐH đưa l&ecirc;n website của ph&ograve;ng n&ecirc;n NH dễ d&agrave;ng tiếp cận v&agrave; thực hiện. Theo quy định của Trường, sau khi đ&aacute;nh gi&aacute; mỗi HP, GV c&ocirc;ng bố c&ocirc;ng khai kết quả điểm thi. Đối với những trường hợp c&oacute; sai s&oacute;t về điểm số th&igrave; NH c&oacute; thể khiếu nại trực tiếp với GV phụ tr&aacute;ch HP, hoặc phản &aacute;nh với Trưởng BM, Thư k&yacute; Viện NTTS trong v&ograve;ng 25 ng&agrave;y sau khi c&ocirc;ng bố điểm để c&oacute; sự điều chỉnh kịp thời. Trường hợp NH c&oacute; nhu cầu ph&uacute;c khảo b&agrave;i thi th&igrave; l&agrave;m đơn xin ph&uacute;c khảo [H5.05.05.03] gửi văn ph&ograve;ng Viện NTTS trong thời hạn 15 ng&agrave;y kể từ ng&agrave;y c&ocirc;ng bố điểm. Kết quả ph&uacute;c khảo phải c&ocirc;ng bố đến SV chậm nhất l&agrave; 10 ng&agrave;y kể từ ng&agrave;y SV nộp đơn ph&uacute;c khảo.</p>\r\n<p>C&aacute;c quy định, quy tr&igrave;nh, biểu mẫu về khiếu nại KQHT của NH c&ograve;n được phổ biến đến NH th&ocirc;ng qua đội ngũ CVHT v&agrave; sổ tay SV. Văn ph&ograve;ng Viện NTTS c&oacute; h&ograve;m thư g&oacute;p &yacute; v&agrave; GV lu&ocirc;n tạo điều kiện thuận lợi khi SV muốn khiếu nại về KQHT của m&igrave;nh. Tuy nhi&ecirc;n, trong giai đoạn 2015 - 2020, SV ng&agrave;nh NTTS kh&ocirc;ng c&oacute; khiếu nại về KQHT.</p>', '<p>Trường c&oacute; quy định, quy tr&igrave;nh khiếu nại về KQHT của NH. quy tr&igrave;nh khiếu nại về KQHT được c&ocirc;ng bố c&ocirc;ng khai v&agrave; NH dễ d&agrave;ng tiếp cận. Việc khiếu nại, ph&uacute;c khảo b&agrave;i thi,&hellip;đều được thực hiện theo mẫu c&oacute; sẵn v&agrave; được c&ocirc;ng bố tr&ecirc;n website của ph&ograve;ng ĐTĐH.</p>', '<p>Quy tr&igrave;nh điều chỉnh điểm thi, khiếu nại, ph&uacute;c khảo KQHT chưa được CVHT nhắc nhở thường xuy&ecirc;n trước c&aacute;c kỳ kiểm tra v&agrave; thi.</p>', '<p>Từ năm học 2020 - 2021, Viện NTTS th&ocirc;ng qua GV GD, CVHT v&agrave; hoạt động ch&agrave;o cờ SV đầu th&aacute;ng nhắc nhở SV về việc t&igrave;m hiểu c&aacute;c quy định của trường n&oacute;i chung v&agrave; quy định đ&aacute;nh gi&aacute; HP n&oacute;i ri&ecirc;ng th&ocirc;ng qua trang website của Trường trước c&aacute;c đợt thi kết th&uacute;c HK.</p>', 5, NULL, NULL, NULL, NULL, 1, b'1', 3, 18, 6, 3, 12, NULL, '2022-06-08 08:35:07', '2022-06-11 09:22:19'),
(47, NULL, NULL, NULL, NULL, NULL, '<p>Nh&acirc;n lực v&agrave; cơ sở hạ tầng l&agrave; 2 yếu tố then chốt quyết định đến chất lượng đ&agrave;o tạo của CSGD. &Yacute; thức được điều n&agrave;y, h&agrave;ng năm Trường v&agrave; Viện NTTS kh&ocirc;ng ngừng ph&aacute;t triển đội ngũ GV để đ&aacute;p ứng nhu cầu về đ&agrave;o tạo, NCKH v&agrave; phục vụ cộng đồng (PVCĐ). T&iacute;nh đến th&aacute;ng 12/2020 Viện NTTS hiện c&oacute; 40 GV cơ hữu, 01 CV v&agrave; 1 kh&aacute;c (thỉnh giảng: 1 PGS (03 PGS; 14 TS; 24 (nghi&ecirc;n cứu sinh - NCS v&agrave; ThS) v&agrave; 1 cử nh&acirc;n), được đ&agrave;o tạo đ&uacute;ng chuy&ecirc;n m&ocirc;n ở trong v&agrave; ngo&agrave;i nước, độ tuổi GV của Viện từ 36 - 42 chiếm tr&ecirc;n 80%, đ&atilde; tham gia c&aacute;c lớp tập huấn về PPGD, phương ph&aacute;p NCKH, n&acirc;ng hạng GV&hellip; v&igrave; vậy đảm bảo đủ năng lực để tổ chức triển khai CTĐT của ng&agrave;nh NTTS. &nbsp;</p>\r\n<p>Việc quy hoạch đội ngũ GV, NCV được thực hiện đ&aacute;p ứng nhu cầu về đ&agrave;o tạo, NCKH v&agrave; c&aacute;c hoạt động PVCĐ. Tỉ lệ GV/NH đều đạt y&ecirc;u cầu quy định của Bộ GD&amp;ĐT. Khối lượng c&ocirc;ng việc của đội ngũ GV, NCV được đo lường, gi&aacute;m s&aacute;t h&agrave;ng năm để l&agrave;m căn cứ cải tiến chất lượng.</p>\r\n<p>C&aacute;c ti&ecirc;u ch&iacute; tuyển dụng v&agrave; lựa chọn GV, NCV để bổ nhiệm, điều chuyển được x&aacute;c định v&agrave; phổ biến c&ocirc;ng khai. Năng lực của đội ngũ GV, NCV được x&aacute;c định v&agrave; được đ&aacute;nh gi&aacute; h&agrave;ng năm. Nhu cầu về đ&agrave;o tạo v&agrave; ph&aacute;t triển chuy&ecirc;n m&ocirc;n của đội ngũ GV, NCV được x&aacute;c định v&agrave; c&oacute; c&aacute;c hoạt động triển khai để đ&aacute;p ứng.</p>\r\n<p>Việc đ&aacute;nh gi&aacute;, quản trị, khen thưởng kết quả c&ocirc;ng việc của GV, NCV được triển khai để tạo động lực l&agrave;m việc. C&aacute;c loại h&igrave;nh v&agrave; số lượng c&aacute;c hoạt động nghi&ecirc;n cứu của GV v&agrave; NCV được x&aacute;c lập, gi&aacute;m s&aacute;t v&agrave; đối s&aacute;nh để cải tiến chất lượng.&nbsp;</p>', '<p>Viện c&oacute; kế hoạch chi tiết v&agrave; ph&ugrave; hợp nhằm quy hoạch đội ngũ GV để đ&aacute;p ứng nhu cầu về đ&agrave;o tạo, NCKH; ch&uacute; trọng mở c&aacute;c lớp bồi dưỡng kỹ năng NCKH, bồi dưỡng nghiệp vụ sư phạm cho c&aacute;n bộ GD hằng năm. Định hướng ph&aacute;t triển NCKH kết hợp n&acirc;ng cao chất lượng đội ngũ GV/NCV, thực hiện NCKH đ&oacute;n đầu nhu cầu ph&aacute;t triển của x&atilde; hội. C&oacute; nhiều hợp t&aacute;c v&agrave; kết nối NCKH với doanh nghiệp v&agrave; địa phương. Kết quả c&ocirc;ng việc đạt tốt so với c&aacute;c ng&agrave;nh kh&aacute;c v&agrave; c&oacute; những đ&oacute;ng g&oacute;p nổi bật được vinh danh trong ng&agrave;nh thủy sản v&agrave; to&agrave;n quốc. Tỷ lệ GV/NH v&agrave; khối lượng c&ocirc;ng việc của đội ngũ GV, NCV được đo lường, gi&aacute;m s&aacute;t đều đạt chuẩn theo Bộ GD&amp;ĐT v&agrave; Trường về số lượng v&agrave; chất lượng. Việc tuyển chọn GV được thực hiện theo ti&ecirc;u chuẩn năng lực GD th&ocirc;ng qua c&aacute;c kỳ thi tuyển GV c&ocirc;ng khai. Nhiệm vụ của GV được x&aacute;c định v&agrave; quy định r&otilde; r&agrave;ng, cụ thể. Mỗi năm đều đ&aacute;nh gi&aacute; chi tiết điểm mạnh, điểm yếu, ho&agrave;n th&agrave;nh v&agrave; chưa ho&agrave;n th&agrave;nh c&ocirc;ng việc chung của Viện v&agrave; của từng GV để c&oacute; kế hoạch triển khai trong năm sau.</p>\r\n<p>B&ecirc;n cạnh đ&oacute; vẫn c&ograve;n những tồn tại như: Viện NTTS chưa c&oacute; quy hoạch d&agrave;i hạn về số lượng đội ngũ GV; số lượng NCS qu&aacute; hạn vẫn c&ograve;n (03 NCS), chưa c&oacute; những dự &aacute;n lớn v&agrave; l&acirc;u d&agrave;i để từ đ&oacute; ph&aacute;t triển c&aacute;c hướng NC chuy&ecirc;n s&acirc;u. Một số hoạt động PVCĐ chưa được định lượng để đ&aacute;nh gi&aacute;, khen thưởng hiệu quả. Thực hiện đối s&aacute;nh về c&aacute;c loại h&igrave;nh NCKH chỉ dừng ở mức trong nội bộ Trường.</p>', 7, 7, 1, b'1', 3, 57, 7, 3, 12, NULL, '2022-06-08 08:36:57', '2022-06-11 09:26:43'),
(48, '<p>Việc quy hoạch đội ngũ GV dựa tr&ecirc;n c&aacute;c căn cứ nhu cầu đ&agrave;o tạo trong chiến lược ph&aacute;t triển đội ngũ GV v&agrave; NCV của Trường đến năm 2020 tầm nh&igrave;n đến năm 2030 v&agrave; quy hoạch ph&aacute;t triển chuy&ecirc;n m&ocirc;n của Viện NTTS c&ugrave;ng c&aacute;c định mức về giờ giảng, giờ NCKH, ph&aacute;t triển thương hiệu về gi&aacute;o dục, khoa học v&agrave; PVCĐ.</p>\r\n<p>H&agrave;ng năm, Viện NTTS c&oacute; kế hoạch chi tiết về c&ocirc;ng việc chung của to&agrave;n Viện về quy hoạch ph&aacute;t triển đội ngũ GV như: nhu cầu đ&agrave;o tạo v&agrave; kế hoạch đ&agrave;o tạo, c&aacute;c ch&iacute;nh s&aacute;ch về nh&acirc;n sự, đ&aacute;nh gi&aacute; kết quả thực hiện c&ocirc;ng việc của năm trước để điều chỉnh. Sau đ&oacute;, Viện x&acirc;y dựng kế hoạch trọng t&acirc;m của năm học để gửi l&ecirc;n Trường l&agrave;m cơ sở để đ&aacute;nh gi&aacute; c&ocirc;ng việc.</p>\r\n<p>Dựa tr&ecirc;n căn cứ thực hiện quy hoạch về chuy&ecirc;n m&ocirc;n, tr&igrave;nh độ, HP phụ tr&aacute;ch, giới t&iacute;nh của GV. Viện x&acirc;y dựng kế hoạch d&agrave;i hạn qui hoạch từ năm 2016-2021 sẽ c&oacute; th&ecirc;m &iacute;t nhất 5 TS v&agrave; 02 PGS. T&iacute;nh đến th&aacute;ng 12/2020, Viện NTTS c&oacute; 03 PGS, 14 TS v&agrave; 13 NCS trong, ngo&agrave;i nước v&agrave; 11 ThS v&agrave; 1 CV (cử nh&acirc;n). Kết quả thực hiện kế hoạch đ&agrave;o tạo bồi dưỡng GV của Viện t&iacute;nh đến năm 2020 đ&aacute;p ứng kế hoạch 2016 - 2021 của Viện.</p>', '<p>Đội ngũ GV được quy hoạch đ&aacute;p ứng tốt c&aacute;c nhiệm vụ về đ&agrave;o tạo, NCKH v&agrave; PVCĐ.</p>', '<p>Việc quy hoạch ph&aacute;t triển đội ngũ GV theo hướng tăng tỷ lệ TS, PGS vẫn c&ograve;n chậm do một số NCS qu&aacute; hạn.</p>', '<p>Từ năm học 2020 - 2021, Viện tăng cường đ&ocirc;n đốc, lập kế hoạch b&aacute;o c&aacute;o định kỳ tiến độ thực hiện c&ocirc;ng việc của c&aacute;c NCS. Viện tăng cường kết nối, t&igrave;m kiếm những nguồn kinh ph&iacute; th&ocirc;ng qua đề t&agrave;i, dự &aacute;n từ c&aacute;c địa chỉ kh&aacute;c nhau để đẩy mạnh ph&aacute;t triển c&aacute;c hướng nghi&ecirc;n cứu v&agrave; số lượng TS, PGS.</p>', 5, NULL, NULL, NULL, NULL, 1, b'1', 3, 19, 7, 3, 12, NULL, '2022-06-08 08:38:39', '2022-06-11 09:22:19'),
(49, '<p>Theo số liệu thống k&ecirc; đến th&aacute;ng 3/2020 của Ph&ograve;ng ĐTĐH, nhiều ng&agrave;nh c&oacute; tỷ lệ NH/GV thấp hơn hoặc tiệm cận với quy định của Bộ GD&amp;ĐT đối với nh&oacute;m ng&agrave;nh kinh tế, quản l&yacute; l&agrave; 25 SV/GV, nh&oacute;m ng&agrave;nh kỹ thuật, c&ocirc;ng nghệ l&agrave; 20 SV/GV).</p>\r\n<p>Đối với ng&agrave;nh NTTS, số liệu thống k&ecirc; về tỷ lệ SV/GV ở trong 5 năm gần đ&acirc;y cho thấy số lượng SV c&oacute; chiều hướng giảm trong 3 năm gần đ&acirc;y, tuy nhi&ecirc;n số lượng GV cũng giảm theo do một số GV đến tuổi nghỉ hưu theo chế độ, tỷ lệ SV/GV trong giai đoạn 2015 - 2020 thấp hơn quy định (20 SV/GV) n&ecirc;n ho&agrave;n to&agrave;n đảm bảo về chất lượng hoạt động GD, NCKH v&agrave; được thống k&ecirc; chi tiết ở Bảng 6.1.</p>', '<p>Tỷ lệ GV/NH được duy tr&igrave; ở mức tối ưu theo quy định, điều n&agrave;y lu&ocirc;n đảm bảo được chất lượng GD.</p>\r\n<p>C&ocirc;ng việc của GV được đo lường, gi&aacute;m s&aacute;t chặt chẽ g&oacute;p phần l&agrave;m tăng chất lượng đ&agrave;o tạo v&agrave; NCKH.</p>', '<p>Một số hoạt động PVCĐ chưa được định lượng để đ&aacute;nh gi&aacute; khối lượng v&agrave; chất lượng c&ocirc;ng việc của GV.</p>', '<p>Trong năm 2021, Viện sẽ x&acirc;y dựng danh mục c&aacute;c hoạt động PVCĐ v&agrave;o bản đ&aacute;nh gi&aacute; chất lượng v&agrave; định lượng c&ocirc;ng việc (l&agrave;m căn cứ t&iacute;nh giờ định mức) của GV.</p>', 4, NULL, NULL, NULL, NULL, 1, b'1', 3, 20, 7, 3, 12, NULL, '2022-06-08 08:40:24', '2022-06-11 09:22:19'),
(50, '<p class=\"MsoNormal\" style=\"text-align: justify; text-indent: 1.0cm; line-height: 150%; mso-hyphenate: none; margin: 2.5pt 0cm 0cm 0cm;\">Ti&ecirc;u chu&acirc;̉n v&agrave; ti&ecirc;u ch&iacute; tuy&ecirc;̉n chọn GV, quy tr&igrave;nh tuyển dụng được Nh&agrave; trường c&ocirc;ng b&ocirc;́ c&ocirc;ng khai bằng c&ocirc;ng văn, tr&ecirc;n website v&agrave; ni&ecirc;m y&ecirc;́t tại ph&ograve;ng TCHC dựa tr&ecirc;n căn cứ nhu cầu c&ocirc;ng việc từ Viện đề xuất l&ecirc;n. C&aacute;c th&ocirc;ng b&aacute;o tuyển dụng được th&ocirc;ng b&aacute;o c&ocirc;ng khai v&agrave; chi tiết cho từng vị tr&iacute; tuyển dụng.</p>\r\n<p class=\"MsoNormal\" style=\"text-align: justify; text-indent: 1.0cm; line-height: 150%; mso-hyphenate: none; margin: 2.5pt 0cm 0cm 0cm;\">Quy tr&igrave;nh tuyển dụng theo quy định bao gồm c&aacute;c bước: x&eacute;t duyệt sơ bộ hồ sơ ứng vi&ecirc;n qua Hội đồng, thi tuyển dụng vi&ecirc;n chức của trường (gồm ba m&ocirc;n thi l&yacute; thuyết, tin học v&agrave; vấn đ&aacute;p chuy&ecirc;n m&ocirc;n).</p>\r\n<p class=\"MsoNormal\" style=\"text-align: justify; text-indent: 1.0cm; line-height: 150%; mso-hyphenate: none; margin: 2.5pt 0cm 0cm 0cm;\">C&aacute;c c&aacute; nh&acirc;n khi đăng k&yacute; dự tuy&ecirc;̉n v&agrave;o l&agrave;m GV của Nh&agrave; trường phải đảm bảo c&aacute;c quy định chung quy định tại Đi&ecirc;̀u 22 của Luật Vi&ecirc;n chức năm 2010, Đi&ecirc;̀u 4 của Nghị định 29/2012/NĐ-CP v&agrave; Điều 5 Th&ocirc;ng tư 40/2020/TT-BGDĐT về ti&ecirc;u chuẩn GV v&ecirc;̀ tuy&ecirc;̉n dụng, sử dụng v&agrave; quản l&yacute; vi&ecirc;n chức, đ&oacute; l&agrave; c&oacute; đủ ti&ecirc;u chu&acirc;̉n v&ecirc;̀ ph&acirc;̉m ch&acirc;́t, chuy&ecirc;n m&ocirc;n nghiệp vụ, năng lực theo y&ecirc;u c&acirc;̀u của vị tr&iacute; việc l&agrave;m v&agrave; chức danh ngh&ecirc;̀ nghiệp, c&oacute; đủ c&aacute;c đi&ecirc;̀u kiện đăng k&yacute; dự tuy&ecirc;̉n v&agrave; c&aacute;c ti&ecirc;u chu&acirc;̉n cụ th&ecirc;̉ kh&aacute;c do Nh&agrave; trường v&agrave; Viện quy định.</p>', '<p>Vi&ecirc;c lựa chọn v&agrave; phổ biến tuyển dụng c&ocirc;ng khai đ&atilde; g&oacute;p phần lựa chọn được những GV c&oacute; năng lực, đạo đức tốt để phục vụ c&ocirc;ng việc.</p>\r\n<p>C&aacute;c ti&ecirc;u ch&iacute; tuyển chọn, bổ nghiệm c&aacute;n bộ quản l&yacute; lu&ocirc;n r&otilde; r&agrave;ng v&agrave; được thực hiện c&ocirc;ng khai.</p>', '<p>Tuyển chọn vị tr&iacute; NCV ở c&aacute;c trại thực nghiệm NTTS ở Cam Ranh v&agrave; Ninh Phụng kh&oacute; khăn v&igrave; c&aacute;c Trại thực nghiệm xa Trường, điều kiện sinh hoạt, l&agrave;m việc kh&oacute; khăn.</p>', '<p>Năm 2021, Viện sẽ x&acirc;y dựng kế hoạch hợp t&aacute;c với Tập đo&agrave;n CP để c&ugrave;ng ph&aacute;t triển Trại thực nghiệm NTTS v&agrave; hướng tới x&acirc;y dựng cơ chế hỗ trợ cho c&aacute;c NCV ở c&aacute;c Trại thực nghiệm. Bổ nhiệm GV ki&ecirc;m nhiệm quản l&yacute; Trại thực nghiệm NTTS v&agrave; gắn với hoạt động NCKH thường xuy&ecirc;n, thực hiện đề t&agrave;i c&aacute;c cấp.</p>', 4, NULL, NULL, NULL, NULL, 1, b'1', 3, 21, 7, 3, 12, NULL, '2022-06-08 08:42:20', '2022-06-11 09:22:19'),
(51, '<p class=\"MsoNormal\" style=\"text-align: justify; text-indent: 1.0cm; line-height: 150%; mso-hyphenate: none; margin: 1.0pt 0cm 0cm 0cm;\"><em><strong>C&aacute;c ti&ecirc;u ch&iacute; đ&aacute;nh gi&aacute; năng lực của đội ngũ</strong></em> được thể hiện ở c&aacute;c yếu tố bao gồm: tr&igrave;nh độ (ThS, TS, PGS, GS), c&aacute;c loại văn bằng, chứng chỉ hỗ trợ GD (ngoại ngữ, tin học, nghiệp vụ sư phạm&hellip;), c&aacute;c c&ocirc;ng tr&igrave;nh khoa học đ&atilde; c&ocirc;ng bố v&agrave; c&aacute;c kết quả đ&aacute;nh gi&aacute; hoạt động GD của GV hằng năm.<br>Ph&acirc;n loại của GV được đ&aacute;nh gi&aacute; hằng năm khi kết th&uacute;c năm học bằng c&aacute;c ti&ecirc;u ch&iacute; thi đua r&otilde; r&agrave;ng bao gồm kh&ocirc;ng ho&agrave;n th&agrave;nh nhiệm vụ, ho&agrave;n th&agrave;nh nhiệm vụ, ho&agrave;n th&agrave;nh tốt nhiệm vụ, v&agrave; ho&agrave;n th&agrave;nh xuất sắc nhiệm vụ, từ đ&oacute; b&igrave;nh chọn c&aacute;c danh hiệu thi đua gồm lao động ti&ecirc;n tiến v&agrave; chiến sĩ thi đua.</p>', '<p>Trường/Viện c&oacute; ban h&agrave;nh c&aacute;c quy định đ&aacute;nh gi&aacute; năng lực của đội ngũ GV, NCV kh&aacute;ch quan, đa chiều.&nbsp;</p>', '<p>Một số GV chưa ph&aacute;t huy được hết năng lực trong NCKH.&nbsp;</p>', '<p>Từ năm học 2020 &ndash; 2021, Trường sẽ x&acirc;y dựng ch&iacute;nh s&aacute;ch khuyến kh&iacute;ch GV thực hiện đề t&agrave;i cấp Trường. BM sẽ c&oacute; kế hoạch x&acirc;y dựng những nh&oacute;m chuy&ecirc;n m&ocirc;n để kết hợp, hỗ trợ c&aacute;c GV c&ugrave;ng tham gia thực hiện đề t&agrave;i.&nbsp;</p>', 5, NULL, NULL, NULL, NULL, 1, b'1', 3, 22, 7, 3, 12, NULL, '2022-06-08 08:44:14', '2022-06-11 09:22:19'),
(52, '<p><em><strong>Căn cứ v&agrave;o chiến lược ph&aacute;t triển, sứ mạng của Trường,</strong></em> căn cứ v&agrave;o nhu cầu của x&atilde; hội, xu hướng ph&aacute;t triển thế giới, Viện c&oacute; chiến lược ph&aacute;t triển đội ngũ GV theo từng giai đoạn ph&ugrave; hợp v&agrave; đặt ra những kết quả cụ thể về chỉ ti&ecirc;u đạt được như số lượng TS, số PGS, Đề t&agrave;i NCKH c&aacute;c cấp, kết nối Doanh nghiệp, chương tr&igrave;nh kết hợp đ&agrave;o tạo ngo&agrave;i nước&hellip;</p>\r\n<p>Từ năm 2016 đến nay, Viện ch&uacute; trọng n&acirc;ng cao đội ngũ GV hướng tới tăng cường ph&aacute;t triển NCKH đ&oacute;n đầu cho sự ph&aacute;t triển của x&atilde; hội.</p>\r\n<p>Dựa v&agrave;o chiến lược đ&oacute;, Viện c&ugrave;ng c&aacute;c BM l&ecirc;n định hướng v&agrave; kế hoạch ph&aacute;t triển chuy&ecirc;n m&ocirc;n cho từng GV. V&agrave;o đầu năm học, mỗi GV căn cứ v&agrave;o bản quy hoạch chuy&ecirc;n m&ocirc;n tổng thể để chủ động l&ecirc;n kế hoạch c&ocirc;ng t&aacute;c c&aacute; nh&acirc;n trong năm, BM xem x&eacute;t t&iacute;nh khả thi để c&oacute; kế hoạch tổng thể. Trường c&oacute; kế hoạch đ&agrave;o tạo v&agrave; bồi dưỡng cho CBVC chung cho to&agrave;n trường v&agrave;o đầu năm học. Theo quy định tất cả GV khi về Trường phải tham gia một kho&aacute; học về NVSP, đồng thời được khuyến kh&iacute;ch, hỗ trợ, thậm ch&iacute; bắt buộc đi học ngoại ngữ v&agrave; khuyến kh&iacute;ch học sau đại học ở nước ngo&agrave;i sau 2 đến 3 năm c&ocirc;ng t&aacute;c.</p>', '<p>Tổ chức nhiều lớp tập huấn, đ&agrave;o tạo bồi dưỡng, hội thảo khoa học để n&acirc;ng cao chất lượng đội ngũ GD, đ&aacute;p ứng đầy đủ những c&ocirc;ng việc cụ thể trong đ&agrave;o tạo.</p>', '<p>C&oacute; nhiều NCS qu&aacute; hạn v&igrave; kinh ph&iacute; thực hiện c&aacute;c th&iacute; nghiệm bị ph&aacute;t sinh, thời gian tập chung cho NCS bị chi phối.</p>', '<p>Năm 2020, Trường v&agrave; Viện đ&atilde; tổ chức họp c&aacute;c NCS qu&aacute; hạn để thảo luận giải quyết những kh&oacute; khăn như t&igrave;m nguồn kinh ph&iacute; thực hiện, giảm ph&acirc;n c&ocirc;ng những c&ocirc;ng việc chung, hỗ trợ kinh ph&iacute; xuất bản b&agrave;i b&aacute;o quốc tế, tăng kinh ph&iacute; cũng như số lượng đề t&agrave;i cấp Trường cho NCS.</p>', 4, NULL, NULL, NULL, NULL, 1, b'1', 3, 23, 7, 3, 12, NULL, '2022-06-08 08:45:56', '2022-06-11 09:22:19'),
(53, '<p>H&agrave;ng năm, Trường c&oacute; định mức, quy định cụ thể về khối lượng c&ocirc;ng việc (nghi&ecirc;n cứu, GD v&agrave; PVCĐ) cho từng loại đối tượng c&aacute;n bộ GD hay h&agrave;nh ch&iacute;nh. Dựa tr&ecirc;n định mức của Trường, c&aacute; nh&acirc;n tự x&acirc;y dựng kế hoạch thực hiện để đạt được định mức (GD, NCKH v&agrave; PVCĐ). BM v&agrave; Viện đ&aacute;nh gi&aacute; giữa năm - sơ kết c&aacute;c HK để kiểm tra, đ&ocirc;n đốc c&ocirc;ng việc được tốt hơn. Dựa tr&ecirc;n những tổng hợp c&ocirc;ng việc của từng c&aacute; nh&acirc;n được ho&agrave;n thiện theo mẫu, BM tổng hợp để b&aacute;o c&aacute;o đến Viện, từ đ&oacute; l&agrave;m MC đ&aacute;nh gi&aacute; kết quả hoạt động, ho&agrave;n th&agrave;nh c&ocirc;ng việc của GV/NCV h&agrave;ng năm bằng c&aacute;c b&aacute;o c&aacute;o tổng hợp chi tiết v&agrave; kế hoạch cho năm học sau. Dựa tr&ecirc;n c&aacute;c bản ph&acirc;n t&iacute;ch đ&aacute;nh gi&aacute; n&agrave;y, mỗi GV/NCV sẽ biết được hiệu quả c&ocirc;ng việc của m&igrave;nh trong năm cũ v&agrave; định hướng cho năm tiếp theo. Tiếp đ&oacute;, Viện sẽ tổng hợp v&agrave; l&agrave;m tờ tr&igrave;nh l&ecirc;n Trường để l&agrave;m căn cứ xin c&ocirc;ng nhận x&eacute;t danh hiệu thi đua theo quy định.</p>\r\n<p>Thống k&ecirc; c&aacute;c hoạt động NCKH v&agrave; PVCĐ của GV trong Viện cũng rất được ch&uacute; trọng bằng c&aacute;c b&aacute;o c&aacute;o tổng hợp h&agrave;ng năm. Từ đ&oacute; mỗi GV/NCV của Viện NTTS sẽ tự chủ l&ecirc;n kế hoạch c&ocirc;ng t&aacute;c c&aacute; nh&acirc;n v&agrave;o đầu mỗi năm học. BM hỗ trợ khắc phục những hạn chế cũng như th&uacute;c đẩy kế hoạch ph&aacute;t triển của c&aacute; nh&acirc;n. Việc ghi nhận đ&uacute;ng th&agrave;nh t&iacute;ch v&agrave; khen thưởng kịp thời cho c&aacute;n bộ tạo động lực cho c&aacute;n bộ ph&aacute;t huy hết khả năng trong GD, NCKH v&agrave; PVCĐ. Viện NTTS h&agrave;ng năm đều c&oacute; những đ&oacute;ng g&oacute;p nhất định cho địa phương v&agrave; được ghi nhận, khen thưởng cấp Bộ v&agrave; cấp Tỉnh. Số lượng GV đạt danh hiệu ho&agrave;n th&agrave;nh xuất sắc nhiệm vụ (HTXSNV) v&agrave; chiến sĩ thi đua (CSTĐ) tăng dần từ năm 2015 chỉ đạt 5 GV nhưng đến năm 2020 &nbsp;đạt 15 GVv&agrave; được tổng hợp ở Bảng 6.6.</p>', '<p>Trường c&oacute; c&aacute;c quy định tổ chức, triển khai v&agrave; đ&aacute;nh gi&aacute; hiệu quả hoạt động GD của GV gi&uacute;p ph&acirc;n loại được kết quả c&ocirc;ng việc của GV v&agrave; c&oacute; c&aacute;c h&igrave;nh thức khen thưởng, n&acirc;ng lương trước thời hạn tạo động lực cho GV, NCV trong GD v&agrave; NCKH. Việc ph&acirc;n loại lao động v&agrave; b&igrave;nh x&eacute;t danh hiệu thi đua được thực hiện theo quy tr&igrave;nh chặt chẽ.</p>', '<p>Trường chưa c&oacute; khảo s&aacute;t &yacute; kiến GV v&agrave; NCV về việc c&oacute; thực sự đồng &yacute;, h&agrave;i l&ograve;ng với việc quản trị theo kết quả c&ocirc;ng việc của GV h&agrave;ng năm.</p>', '<p>Từ năm học 2020-2021, Ph&ograve;ng TCHC x&acirc;y dựng mẫu phiếu khảo s&aacute;t v&agrave; triển khai thực hiện lấy &yacute; kiến GV v&agrave; NCV về sự h&agrave;i l&ograve;ng với việc quản trị theo kết quả c&ocirc;ng việc của GV h&agrave;ng năm.</p>', 4, NULL, NULL, NULL, NULL, 1, b'1', 3, 24, 7, 3, 12, NULL, '2022-06-08 08:47:49', '2022-06-11 09:22:19'),
(54, '<p>C&aacute;c hoạt động NCKH của GV v&agrave; NCV trong Trường v&agrave; Viện NTTS được thực hiện theo QĐ số 403/QĐ-ĐHNT ng&agrave;y 24/4/2015 quy định về hoạt động khoa học c&ocirc;ng nghệ (KHCN) tại Trường. Trong đ&oacute; c&aacute;c hoạt động KHCN của trường đ&atilde; được x&aacute;c lập với 10 hoạt động cụ thể hướng tới ph&aacute;t triển KHCN, cải tiến kỹ thuật, n&acirc;ng cao hoạt động NCKH cho GV, SV v&agrave; PVCĐ.</p>\r\n<p>GV b&ecirc;n cạnh việc giảng dạy th&igrave; phải ho&agrave;n th&agrave;nh c&aacute;c kh&ocirc;́i lượng giờ NCKH theo quy định của Trường. Hoạt động NCKH bao gồm c&aacute;c hoạt động: thực hiện đề t&agrave;i, dự &aacute;n c&aacute;c cấp, viết b&agrave;i b&aacute;o, hướng dẫn SV NCKH, tham gia c&aacute;c hội thảo khoa học trong v&agrave; ngo&agrave;i nước, tham gia c&aacute;c seminar học thuật, tham gia c&aacute;c lớp bồi dưỡng CĐ về NCKH, phản biện b&agrave;i b&aacute;o khoa học .....</p>\r\n<p>V&agrave;o cuối năm học, mỗi GV đều tập hợp c&aacute;c MC về b&agrave;i b&aacute;o được đăng (trong nước v&agrave; quốc tế), về c&aacute;c hội thảo tham dự hoặc tr&igrave;nh b&agrave;y, về c&aacute;c đề t&agrave;i c&aacute;c cấp thực hiện v&agrave; đ&atilde; nghiệm thu. Ph&ograve;ng KHCN tập hợp c&aacute;c MC của GV v&agrave; quy đổi ra giờ KH dựa theo quy chế CTNB, sau đ&oacute; GV kiểm tra lại v&agrave; c&oacute; thể điều chỉnh.&nbsp;</p>', '<p>C&aacute;c loại h&igrave;nh NCKH của GV đa dạng c&oacute; gi&aacute; trị cao, được x&aacute;c lập, gi&aacute;m s&aacute;t v&agrave; được đối s&aacute;nh trong Trường.</p>', '<p>Chưa thực hiện đối s&aacute;nh c&aacute;c loại h&igrave;nh NCKH của Viện NTTS với c&aacute;c trường uy t&iacute;n về đ&agrave;o tạo ng&agrave;nh thủy sản trong nước như Khoa Thủy sản &ndash; Trường ĐH Cần Thơ.</p>', '<p>Từ năm 2021, Viện thực hiện đối s&aacute;nh về c&aacute;c loại h&igrave;nh NCKH (số lượng đề t&agrave;i cấp Bộ v&agrave; cấp tỉnh; c&aacute;c b&agrave;i b&aacute;o đăng tr&ecirc;n tạp tr&iacute; quốc tế c&ugrave;ng chuy&ecirc;n ng&agrave;nh) với Khoa Thủy sản - Trường ĐH Cần Thơ v&agrave; Khoa Thủy sản &ndash; Trường ĐH N&ocirc;ng L&acirc;m Th&agrave;nh phố Hồ Ch&iacute; Minh với mục đ&iacute;ch học hỏi, quảng b&aacute;, chia sẻ v&agrave; hợp t&aacute;c.</p>', 5, NULL, NULL, NULL, NULL, 1, b'1', 3, 25, 7, 3, 12, NULL, '2022-06-08 08:51:23', '2022-06-11 09:22:19'),
(55, NULL, NULL, NULL, NULL, NULL, '<p>Đội ngũ nh&acirc;n vi&ecirc;n lu&ocirc;n l&agrave; nền tảng, l&agrave; đ&ograve;n bẩy để tạo ra sức mạnh, th&uacute;c đẩy sự ph&aacute;t triển của Trường. Đội ngũ nh&acirc;n vi&ecirc;n chuy&ecirc;n nghiệp, l&agrave;m việc hiệu quả, coi trọng kh&aacute;ch h&agrave;ng sẽ tạo ra năng suất lao động cao, mang tới lợi &iacute;ch to lớn. Ch&iacute;nh v&igrave; vậy việc n&acirc;ng tầm chất lượng của CBVC l&agrave; điều hết sức cần thiết. Nhận thức được tầm quan trọng trong việc n&acirc;ng cao tr&igrave;nh độ kiến thức một c&aacute;ch thường xuy&ecirc;n, li&ecirc;n tục, c&ugrave;ng với qu&aacute; tr&igrave;nh kiểm tra đ&aacute;nh gi&aacute; chất lượng h&agrave;ng năm sẽ tạo ra một đội ngũ chuy&ecirc;n nghiệp, c&oacute; chất lượng cao, đ&aacute;p ứng được sự ph&aacute;t triển ng&agrave;y c&agrave;ng lớn mạnh của Trường.</p>', '<p>Đội ngũ nh&acirc;n vi&ecirc;n hỗ trợ của Trường cơ bản đ&aacute;p ứng đủ về số lượng, tr&igrave;nh độ chuy&ecirc;n m&ocirc;n, khả năng phục vụ, hỗ trợ đ&agrave;o tạo, NCKH v&agrave; PVCĐ. C&aacute;c ti&ecirc;u ch&iacute; tuyển chọn nh&acirc;n vi&ecirc;n được x&aacute;c định v&agrave; c&ocirc;ng khai minh bạch. H&agrave;ng năm kết quả c&ocirc;ng việc của đội ngũ nh&acirc;n vi&ecirc;n đều được đ&aacute;nh gi&aacute; v&agrave; khen thưởng theo đ&uacute;ng quy chế của Trường, kết quả đ&aacute;nh gi&aacute; cũng được c&ocirc;ng khai trong to&agrave;n trường. Trường tạo nhiều điều kiện hỗ trợ v&agrave; khuyến kh&iacute;ch CBVC tham gia c&aacute;c kh&oacute;a đ&agrave;o tạo, bồi dưỡng nhằm n&acirc;ng cao tr&igrave;nh độ, kiến thức chuy&ecirc;n m&ocirc;n. C&aacute;c nh&acirc;n vi&ecirc;n đều h&agrave;i l&ograve;ng với quy tr&igrave;nh đ&aacute;nh gi&aacute; kết quả cuối năm học cũng như c&aacute;c chế độ khen thưởng ph&ugrave; hợp. Tuy nhi&ecirc;n trong thời gian tới cần triển khai v&agrave; x&acirc;y dựng c&ocirc;ng cụ theo d&otilde;i, gi&aacute;m s&aacute;t v&agrave; đ&aacute;nh gi&aacute; KPI&rsquo;s đến tất cả c&aacute;c đơn vị trong Trường.</p>', 5, 5, 1, b'1', 3, 58, 8, 3, 12, NULL, '2022-06-08 08:54:37', '2022-06-11 09:26:43'),
(56, '<p>Trường Đại học Nha Trang l&agrave; trường đại học đa ng&agrave;nh. Hiện nay trường c&oacute; 16 Khoa, Viện tổ chức đ&agrave;o tạo c&aacute;c chuy&ecirc;n ng&agrave;nh kh&aacute;c nhau, 13 đơn vị quản l&yacute;, phục vụ v&agrave; 03 đơn vị triển khai ứng dụng NCKH v&agrave; dịch vụ. Chiến lược ph&aacute;t triển Trường đến năm 2020, tầm nh&igrave;n đến năm 2030 đ&atilde; x&acirc;y dựng v&agrave; quy hoạch đội ngũ nh&acirc;n vi&ecirc;n, phục vụ cho qu&aacute; tr&igrave;nh đ&agrave;o tạo, NCKH v&agrave; phục vụ cộng đồng.Việc quy hoạch đội ngũ nh&acirc;n vi&ecirc;n l&agrave;m việc tại thư viện, ph&ograve;ng th&iacute; nghiệm, hệ thống thống tin v&agrave; c&aacute;c dịch vụ hỗ trợ theo đ&uacute;ng chuy&ecirc;n m&ocirc;n, năng lực đ&aacute;p ứng được mục ti&ecirc;u đ&agrave;o tạo, NCKH v&agrave; PVCĐ theo đề &aacute;n vị tr&iacute; việc l&agrave;m của Trường. Năm 2015, Trường đ&atilde; triển khai x&acirc;y dựng Đề &aacute;n vị tr&iacute; việc l&agrave;m v&agrave; đ&atilde; gửi b&aacute;o c&aacute;o Bộ GD&amp;ĐT. Trường đang triển khai r&agrave; so&aacute;t, điều chỉnh Đề &aacute;n vị tr&iacute; việc l&agrave;m đ&atilde; x&acirc;y dựng năm 2015 để tr&igrave;nh Hội đồng trường theo tinh thần c&aacute;c nội dung điều chỉnh của Luật GDĐH, đến nay đ&atilde; ho&agrave;n thiện bản dự thảo Đề &aacute;n vị tr&iacute; việc l&agrave;m trong Qu&yacute; III năm 2020.</p>', '<p>Việc quy hoạch đội ngũ nh&acirc;n vi&ecirc;n (l&agrave;m việc tại thư viện, ph&ograve;ng th&iacute; nghiệm, hệ thống c&ocirc;ng nghệ th&ocirc;ng tin v&agrave; c&aacute;c dịch vụ hỗ trợ kh&aacute;c) đ&aacute;p ứng đầy đủ về số lượng, lĩnh vực chuy&ecirc;n m&ocirc;n, kinh nghiệm để phục qu&aacute; tr&igrave;nh đ&agrave;o tạo, NCKH v&agrave; PVCĐ.</p>', '<p>Một v&agrave;i nh&acirc;n vi&ecirc;n của Trung t&acirc;m TNTH c&ograve;n yếu về kh&acirc;u bảo dưỡng, bảo tr&igrave; v&agrave; vận h&agrave;nh c&aacute;c trang thiết bị hiện đại.</p>', '<p>Trong năm 2020-2021, Ph&ograve;ng TC-HC lập kế hoạch cụ thể về việc bồi dưỡng nghiệp vụ chuy&ecirc;n m&ocirc;n cho CBVC, đặc biệt l&agrave; CBVC khối quản l&yacute; PTN TH.</p>', 5, NULL, NULL, NULL, NULL, 1, b'1', 3, 26, 8, 3, 12, NULL, '2022-06-08 08:57:25', '2022-06-11 09:22:19'),
(57, '<p>Trường thường xuy&ecirc;n tổ chức c&aacute;c đợt tuyển dụng h&agrave;ng năm để bổ sung th&ecirc;m lượng CBVC c&oacute; năng lực, c&oacute; chuy&ecirc;n m&ocirc;n ph&ugrave; hợp với chức năng, y&ecirc;u cầu nhiệm vụ đề ra theo lộ tr&igrave;nh ph&aacute;t triển của Trường th&ocirc;ng qua đề &aacute;n vị tr&iacute; việc l&agrave;m. Việc tuyển chọn nh&acirc;n vi&ecirc;n l&agrave; một nhiệm vụ quan trọng, quyết định đến chất lượng c&ocirc;ng việc cũng như tương lai ph&aacute;t triển của Trường sau n&agrave;y.</p>', '<p>C&aacute;c ti&ecirc;u ch&iacute; tuyển dụng v&agrave; lựa chọn nh&acirc;n vi&ecirc;n r&otilde; r&agrave;ng theo quy định chung của nh&agrave; nước, qu&aacute; tr&igrave;nh tuyển dụng để bổ nhiệm, điều chuyển c&ocirc;ng khai, minh bạch. C&aacute;c ti&ecirc;u ch&iacute; v&agrave; kết quả tuyển dụng được c&ocirc;ng khai tr&ecirc;n cổng th&ocirc;ng tin điện tử của trường.</p>', '<p>Cần mở rộng hơn nữa việc lấy &yacute; kiến g&oacute;p &yacute; của c&aacute;c b&ecirc;n li&ecirc;n quan về ti&ecirc;u ch&iacute; tuyển dụng, bổ nhiệm v&agrave; điều chuyển nh&acirc;n vi&ecirc;n.</p>', '<p>Năm 2020-2021, Ph&ograve;ng TC-HC lập kế hoạch việc lấy &yacute; kiến của c&aacute;c b&ecirc;n li&ecirc;n quan về c&aacute;c ti&ecirc;u ch&iacute; tuyển dụng, bổ nhiệm v&agrave; điều chuyển nh&acirc;n vi&ecirc;n.</p>', 4, NULL, NULL, NULL, NULL, 1, b'1', 3, 27, 8, 3, 12, NULL, '2022-06-08 08:58:20', '2022-06-11 09:22:19'),
(58, '<p>C&ocirc;ng t&aacute;c x&acirc;y dựng đội ngũ nh&acirc;n vi&ecirc;n c&oacute; chuy&ecirc;n m&ocirc;n cao được Trường x&aacute;c định l&agrave; nhiệm vụ h&agrave;ng đầu trong chiến lược ph&aacute;t triển. Định hướng của Trường với mục ti&ecirc;u số lượng nh&acirc;n vi&ecirc;n được tinh giản ở mức dưới 30% tổng số CBVC của Trường nhưng chất lượng nh&acirc;n vi&ecirc;n được bồi dưỡng n&acirc;ng cao. V&igrave; vậy việc đ&aacute;nh gi&aacute; năng lực của đội ngũ nh&acirc;n vi&ecirc;n l&agrave; việc l&agrave;m thường xuy&ecirc;n trong qu&aacute; tr&igrave;nh đ&aacute;nh gi&aacute; chất lượng đ&agrave;o tạo của Trường.</p>\r\n<p>Năng lực của đội ngũ nh&acirc;n vi&ecirc;n được x&aacute;c định ngay từ kh&acirc;u tuyển dụng VC. C&aacute;c ti&ecirc;u chuẩn để tuyển dụng theo từng vị tr&iacute; được x&aacute;c định ngay từ đầu th&ocirc;ng qua bằng cấp, lĩnh vực chuy&ecirc;n m&ocirc;n, tr&igrave;nh độ học vấn, kinh nghiệm l&agrave;m việc v&agrave; phỏng vấn trực tiếp. H&agrave;ng năm Trường đều tiến h&agrave;nh đ&aacute;nh gi&aacute; năng lực, kết quả lao động của CBVC theo Quy định về c&ocirc;ng t&aacute;c đ&aacute;nh gi&aacute;, ph&acirc;n loại VC; ph&acirc;n loại tập thể v&agrave; c&ocirc;ng t&aacute;c thi đua, khen thưởng đ&atilde; được ban h&agrave;nh.</p>\r\n<p>Kết quả lao động của CBVC đều được đ&aacute;nh gi&aacute; bởi ch&iacute;nh người lao động, bởi l&atilde;nh đạo đơn vị v&agrave; tập thể về năng lực chuy&ecirc;n m&ocirc;n, mức độ ho&agrave;n th&agrave;nh c&ocirc;ng việc v&agrave; sự h&agrave;i l&ograve;ng của c&aacute;c b&ecirc;n li&ecirc;n quan. Việc đ&aacute;nh gi&aacute; được thực hiện với c&aacute;c mức ph&acirc;n loại lao động như: ho&agrave;n th&agrave;nh nhiệm vụ, ho&agrave;n th&agrave;nh tốt nhiệm vụ, ho&agrave;n th&agrave;nh xuất sắc nhiệm vụ hoặc kh&ocirc;ng ho&agrave;n th&agrave;nh nhiệm vụ, ngo&agrave;i ra trong bảng đ&aacute;nh gi&aacute; cũng c&oacute; mục đề xuất danh hiệu lao động cho năm kế tiếp để c&oacute; sự phấn đấu v&agrave; ph&aacute;t huy tốt hơn. Kết quả ph&acirc;n loại đều được gi&aacute;m s&aacute;t, theo d&otilde;i bởi Ph&ograve;ng ĐBCL&amp;KT, kết quả ph&acirc;n loại sơ bộ sẽ được gửi cho to&agrave;n thể CBVC trong trường được biết, kiểm tra v&agrave; phản hồi nếu c&oacute; điều chỉnh trước khi ban h&agrave;nh quyết định c&ocirc;ng nhận danh hiệu thi đua của năm học.</p>', '<p>Việc đ&aacute;nh gi&aacute; năng lực của đội ngũ nh&acirc;n vi&ecirc;n được thực hiện thường xuy&ecirc;n v&agrave;o cuối năm học, kết quả l&agrave;m việc được ph&acirc;n loại được dựa tr&ecirc;n c&aacute;c ti&ecirc;u chuẩn, ti&ecirc;u ch&iacute; cụ thể theo kết quả c&ocirc;ng việc để đảm bảo t&iacute;nh ch&iacute;nh x&aacute;c v&agrave; c&ocirc;ng bằng. Kết quả đ&aacute;nh gi&aacute; được c&ocirc;ng bố minh bạch v&agrave; c&ocirc;ng khai.</p>', '<p>Việc đ&aacute;nh gi&aacute; mức độ phục vụ của đội ngũ nh&acirc;n vi&ecirc;n chưa được mở rộng đối với c&aacute;c b&ecirc;n li&ecirc;n quan như GV, phụ huynh SV, người b&ecirc;n ngo&agrave;i đến li&ecirc;n hệ c&ocirc;ng việc.</p>', '<p>Năm 2020 -2021, Ph&ograve;ng ĐBCL&amp;KT tiếp tục điều chỉnh bổ sung v&agrave; cập nhật c&aacute;c ti&ecirc;u ch&iacute; đ&aacute;nh gi&aacute; hoặc thay đổi c&aacute;c ti&ecirc;u ch&iacute; đ&aacute;nh gi&aacute; cho ph&ugrave; hợp, đặc biệt l&agrave; đ&aacute;nh gi&aacute; của c&aacute;c b&ecirc;n li&ecirc;n quan.</p>', 5, NULL, NULL, NULL, NULL, 1, b'1', 3, 28, 8, 3, 12, NULL, '2022-06-08 09:00:16', '2022-06-11 09:22:19'),
(59, '<p>Việc đ&agrave;o tạo v&agrave; ph&aacute;t triển nguồn nh&acirc;n lực thường xuy&ecirc;n v&agrave; li&ecirc;n tục l&agrave; điều kiện ti&ecirc;n quyết để n&acirc;ng cao chất lượng đội ngũ GV v&agrave; CBVC trong Trường, l&agrave; nền tảng v&agrave; l&agrave; đ&ograve;n bẩy để tạo ra sức mạnh, th&uacute;c đẩy sự ph&aacute;t triển của Trường. Vấn đề n&agrave;y được Trường quan t&acirc;m v&agrave; thực hiện theo đ&uacute;ng lộ tr&igrave;nh ph&aacute;t triển nh&acirc;n sự trong chiến lược ph&aacute;t triển chung của Trường.</p>', '<p>Trường c&oacute; nhiều kế hoạch đ&agrave;o tạo bồi dưỡng, triển khai c&aacute;c kế hoạch học tập nhằm n&acirc;ng cao tr&igrave;nh độ chuy&ecirc;n m&ocirc;n kh&ocirc;ng chỉ GV m&agrave; cả VC khối h&agrave;nh ch&iacute;nh. Từ c&aacute;c hoạt động đ&aacute;nh gi&aacute; năng lực h&agrave;ng năm, tham gia c&aacute;c lớp tập huấn n&acirc;ng cao nghiệp vụ, &nbsp;kỹ năng, kiến thức chuy&ecirc;n m&ocirc;n, năng lực, đ&aacute;p ứng được c&aacute;c nhiệm vụ được giao, đồng thời th&uacute;c đẩy sự ph&aacute;t triển của Trường.</p>', '<p>C&aacute;c đơn vị, ph&ograve;ng chức năng c&ograve;n hạn chế chủ động đề xuất c&aacute;c lớp đ&agrave;o tạo bồi dưỡng, c&aacute;c kế hoạch ph&aacute;t triển đội ngũ nh&acirc;n vi&ecirc;n theo kế hoạch l&acirc;u d&agrave;i.</p>', '<p>Năm 2021, c&aacute;c ph&ograve;ng ban chủ động đề xuất c&aacute;c lớp bồi dưỡng ph&ugrave; hợp l&ecirc;n Ph&ograve;ng TC-HC để lập kế hoạch bồi dưỡng, tăng cường khả năng chuy&ecirc;n m&ocirc;n cho đội ngũ nh&acirc;n vi&ecirc;n, n&acirc;ng cao chất lượng của đội ngũ nh&acirc;n vi&ecirc;n phục vụ.</p>', 4, NULL, NULL, NULL, NULL, 1, b'1', 3, 29, 8, 3, 12, NULL, '2022-06-08 09:01:30', '2022-06-11 09:22:19'),
(60, '<p>Trường đ&atilde; ban h&agrave;nh Quy định về chức năng nhiệm vụ của c&aacute;c đơn vị v&agrave; c&aacute; nh&acirc;n trong Trường. Chức năng, tr&aacute;ch nhiệm v&agrave; quyền hạn của c&aacute;c bộ phận, CB quản l&yacute;, GV v&agrave; nh&acirc;n vi&ecirc;n được ph&acirc;n định r&otilde; r&agrave;ng. Tất cả c&aacute;c nh&acirc;n vi&ecirc;n x&acirc;y dựng kế hoạch cụ thể để thực hiện c&aacute;c nhiệm vụ theo ph&acirc;n c&ocirc;ng v&agrave;o đầu HK (về khối lượng, tiến độ v&agrave; thời gian ho&agrave;n th&agrave;nh), c&aacute;c văn bản n&agrave;y sẽ được tập hợp cho l&atilde;nh đạo đơn vị xem x&eacute;t, điều n&agrave;y sẽ gi&uacute;p cho việc ph&acirc;n c&ocirc;ng, theo d&otilde;i, gi&aacute;m s&aacute;t v&agrave; hỗ trợ tốt hơn.</p>', '<p>Trường c&oacute; c&aacute;c danh mục ti&ecirc;u ch&iacute; đ&aacute;nh gi&aacute; hiệu quả c&ocirc;ng việc r&otilde; r&agrave;ng, cụ thể. To&agrave;n bộ nội dung c&ocirc;ng việc được đ&aacute;nh gi&aacute; v&agrave; được c&ocirc;ng khai theo quy chế chi ti&ecirc;u nội bộ, từ đ&oacute; việc theo d&otilde;i kết quả c&ocirc;ng việc của VC được minh bạch v&agrave; ch&iacute;nh x&aacute;c.</p>', '<p>C&ocirc;ng cụ đ&aacute;nh gi&aacute; c&ograve;n hạn chế dẫn đến một số c&aacute;c hoạt động phục vụ cộng đồng c&ograve;n chưa c&oacute; trong c&aacute;c ti&ecirc;u chuẩn đ&aacute;nh gi&aacute; để th&uacute;c đẩy v&agrave; khuyến kh&iacute;ch tập thể, VC v&agrave; người lao động thực hiện.</p>', '<p>Trong HK II năm 2020-2021, Trường tăng cường triển khai c&aacute;c c&ocirc;ng cụ theo d&otilde;i, gi&aacute;m s&aacute;t v&agrave; đ&aacute;nh gi&aacute; kết quả l&agrave;m việc KPI&rsquo;s đến tất cả c&aacute;c đơn vị.</p>', 5, NULL, NULL, NULL, NULL, 1, b'1', 3, 30, 8, 3, 12, NULL, '2022-06-08 09:03:06', '2022-06-11 09:22:19');
INSERT INTO `bao_caos` (`id`, `moTa`, `diemManh`, `diemTonTai`, `keHoachHanhDong`, `diemTDG`, `moDau`, `ketLuan`, `tongSoTC`, `soTCDat`, `trangThai`, `congKhai`, `nganh_id`, `tieuChi_id`, `tieuChuan_id`, `dotDanhGia_id`, `nguoiDung_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(61, NULL, NULL, NULL, NULL, NULL, '<p>NH vừa l&agrave; đối tượng, vừa l&agrave; chủ thể của qu&aacute; tr&igrave;nh gi&aacute;o dục. Do vậy, chất lượng NH đ&oacute;ng vai tr&ograve; quan trọng trong qu&aacute; tr&igrave;nh gi&aacute;o dục. Nhận thức việc hỗ trợ NH l&agrave; một trong những hoạt động quan trọng của qu&aacute; tr&igrave;nh gi&aacute;o dục, Trường v&agrave; Viện NTTS đ&atilde; nghi&ecirc;n cứu tổ chức c&aacute;c hoạt động nhằm hỗ trợ đắc lực cho NH như x&acirc;y dựng ch&iacute;nh s&aacute;ch, ti&ecirc;u ch&iacute; v&agrave; phương ph&aacute;p tuyển sinh; gi&aacute;m s&aacute;t qu&aacute; tr&igrave;nh học tập của NH; tổ chức c&aacute;c hoạt động tư vấn, hỗ trợ học tập, tạo m&ocirc;i trường t&acirc;m l&yacute;, x&atilde; hội v&agrave; cảnh quan trong Trường,&hellip;</p>', '<p>Trường v&agrave; Viện đ&atilde; lu&ocirc;n b&aacute;m s&aacute;t c&aacute;c ch&iacute;nh s&aacute;ch tuyển sinh v&agrave; qui định tuyển sinh đ&atilde; được Bộ GD &amp; ĐT cập nhật h&agrave;ng năm, đ&atilde; đề ra kế hoạch tuyển sinh h&agrave;ng năm ph&ugrave; hợp nhu cầu x&atilde; hội, đ&atilde; c&ocirc;ng khai chỉ ti&ecirc;u, điểm chuẩn v&agrave; kết quả tuyển sinh của ng&agrave;nh c&ugrave;ng với chế độ ưu ti&ecirc;n cho SV v&agrave;o học ng&agrave;nh tr&ecirc;n c&aacute;c phương tiện truyền th&ocirc;ng đại ch&uacute;ng.</p>\r\n<p>Trường tổ chức tuyển sinh nghi&ecirc;m t&uacute;c theo một quy tr&igrave;nh v&agrave; ti&ecirc;u ch&iacute; chặt chẽ, đ&uacute;ng qui định; đ&atilde; tổ chức đ&aacute;nh gi&aacute;, r&uacute;t kinh nghiệm về c&ocirc;ng t&aacute;c tuyển sinh sau khi kết th&uacute;c đợt tuyển sinh h&agrave;ng năm. Việc gi&aacute;m s&aacute;t tốt khối lượng học tập, KQHT v&agrave; r&egrave;n luyện của NH được thực hiện bởi nhiều đơn vị v&agrave; CV chuy&ecirc;n tr&aacute;ch. Đồng thời, sự hỗ trợ trực tiếp của CVHT đ&atilde; gi&uacute;p cho SV tiến bộ nhanh trong học tập v&agrave; r&egrave;n luyện.</p>\r\n<p>Hoạt động tư vấn học tập v&agrave; hướng nghiệp được Viện quan t&acirc;m v&agrave; tổ chức triển khai thường xuy&ecirc;n. C&aacute;c hoạt động ngoại kho&aacute; đ&atilde; thu h&uacute;t nhiều SV tham gia hăng say, củng cố l&ograve;ng y&ecirc;u nghề. Hệ thống GĐ, KTX, thư viện... được đầu tư x&acirc;y dựng v&agrave; quản l&yacute; chặt chẽ đảm bảo tiện nghi v&agrave; an to&agrave;n. Cảnh quan m&ocirc;i trường được Trường ch&uacute; &yacute; cải tạo, tạo khung cảnh thoải m&aacute;i cho NH. Khu&ocirc;n vi&ecirc;n Viện v&agrave; c&aacute;c cơ sở thực tập l&agrave; nơi l&yacute; tưởng để SV tham gia hoạt động ngoại kho&aacute;, chuẩn bị cho c&aacute;c hoạt động t&igrave;nh nguyện, trại h&egrave;.</p>\r\n<p>Chế độ miễn giảm học ph&iacute; d&agrave;nh cho con em ngư d&acirc;n chưa đủ &rdquo;mạnh&rdquo; để thu h&uacute;t &nbsp;NH v&agrave;o ng&agrave;nh NTTS. Ng&agrave;nh NTTS chưa c&oacute; ti&ecirc;u ch&iacute; v&agrave; phương &aacute;n tuyển sinh ri&ecirc;ng để cải thiện số lượng v&agrave; chất lượng SV, chưa tuyển sinh khối D01 l&agrave; khối c&oacute; đ&ocirc;ng đảo học sinh nhất.</p>\r\n<p>Sự quan t&acirc;m của CVHT đến KQHT v&agrave; r&egrave;n luyện của SV chưa được thường xuy&ecirc;n. Dự thảo qui định nhiệm vụ CVHT chưa được ban h&agrave;nh. Hệ thống CNTT phục vụ gi&aacute;m s&aacute;t KQHT v&agrave; sự tiến bộ trong học tập của SV chưa hoạt động tốt.</p>\r\n<p>Hoạt động ngoại kh&oacute;a ph&aacute;t triển kỹ năng mềm cho SV chưa được thường xuy&ecirc;n. Hoạt động thi đua trong SV chưa được quan t&acirc;m đ&uacute;ng mức. Gương &ldquo;người tốt, việc tốt&rdquo; chưa được triển khai đều đặn. Hoạt động nhắc nhở SV ch&uacute; &yacute; bảo vệ m&ocirc;i trường xanh, sạch, đẹp của trường chưa được quan t&acirc;m thường xuy&ecirc;n.</p>', 5, 5, 1, b'1', 3, 59, 9, 3, 12, NULL, '2022-06-08 09:05:25', '2022-06-11 09:26:43'),
(62, '<p>Ch&iacute;nh s&aacute;ch tuyển sinh của Trường n&oacute;i chung v&agrave; của ng&agrave;nh NTTS được x&aacute;c định cụ thể v&agrave; r&otilde; r&agrave;ng th&ocirc;ng qua việc thực hiện theo quy chế, kế hoạch tuyển sinh Đại học v&agrave; Cao đẳng của Bộ GD&amp;ĐT, của Trường được cập nhật h&agrave;ng năm. C&aacute;c ch&iacute;nh s&aacute;ch v&agrave; quy định tuyển sinh (đối tượng, quy tr&igrave;nh thi/x&eacute;t tuyển, đ&aacute;nh gi&aacute; đầu v&agrave;o; đối tượng thi tuyển, x&eacute;t tuyển; đối tượng ưu ti&ecirc;n...) được c&ocirc;ng bố c&ocirc;ng khai tr&ecirc;n trang tuyển sinh của Trường. Trong đ&oacute;, c&oacute; c&aacute;c tổ hợp x&eacute;t tuyển đ&uacute;ng quy định, ph&ugrave; hợp với ng&agrave;nh NTTS v&agrave; ch&iacute;nh s&aacute;ch miễn 100% ph&iacute; KTX cho th&iacute; sinh tr&uacute;ng tuyển một số ng&agrave;nh kỹ thuật [H8.08.01.05]. B&ecirc;n cạnh đ&oacute;, Trường tham gia c&aacute;c hoạt động tư vấn, hướng nghiệp v&agrave; quảng b&aacute; tuyển sinh tr&ecirc;n c&aacute;c b&aacute;o đ&agrave;i, tại c&aacute;c Trường THPT. Viện NTTS thường xuy&ecirc;n l&agrave;m c&ocirc;ng t&aacute;c tư vấn gi&uacute;p th&iacute; sinh nắm r&otilde; hơn về th&ocirc;ng tin/ch&iacute;nh s&aacute;ch tuyển sinh ng&agrave;nh NTTS th&ocirc;ng qua c&aacute;c tờ rơi, tổ chức ng&agrave;y Open Day.... H&agrave;ng năm, Trường ph&acirc;n t&iacute;ch dự b&aacute;o nguồn nh&acirc;n lực để x&aacute;c định chỉ ti&ecirc;u ph&ugrave; hợp cho c&aacute;c ng&agrave;nh n&oacute;i chung v&agrave; ng&agrave;nh NTTS n&oacute;i ri&ecirc;ng trong kế hoạch tuyển sinh h&agrave;ng năm của trường, từ đ&oacute; c&oacute; cập nhật về số lượng tuyển sinh, phương thức tuyển sinh v&agrave; c&aacute;c ch&iacute;nh s&aacute;ch tuyển sinh cho ph&ugrave; hợp.</p>', '<p>Trường v&agrave; Viện NTTS đ&atilde; lu&ocirc;n b&aacute;m s&aacute;t c&aacute;c ch&iacute;nh s&aacute;ch tuyển sinh v&agrave; qui định tuyển sinh đ&atilde; được Bộ GD&amp;ĐT cập nhật h&agrave;ng năm, đ&atilde; đề ra kế hoạch tuyển sinh h&agrave;ng năm ph&ugrave; hợp nhu cầu x&atilde; hội, đ&atilde; c&ocirc;ng khai chỉ ti&ecirc;u, điểm chuẩn v&agrave; kết quả tuyển sinh của ng&agrave;nh c&ugrave;ng với chế độ ưu ti&ecirc;n cho SV v&agrave;o học ng&agrave;nh tr&ecirc;n c&aacute;c phương tiện truyền th&ocirc;ng đại ch&uacute;ng.</p>', '<p>Chế độ miễn giảm học ph&iacute; d&agrave;nh cho con em ngư d&acirc;n chưa đủ &ldquo;mạnh&rdquo; để thu h&uacute;t &nbsp;NH v&agrave;o ng&agrave;nh NTTS.</p>', '<p>Từ năm học 2020- 2021, Viện NTTS sẽ phối hợp với Ph&ograve;ng Kế hoạch T&agrave;i ch&iacute;nh đề xuất cải tiến chế độ miễn giảm học ph&iacute; để thu h&uacute;t NH l&agrave; con em ngư d&acirc;n v&agrave;o học ng&agrave;nh NTTS. Viện NTTS tiếp tục tăng cường cấp học bổng cho SV ngh&egrave;o vượt kh&oacute; v&agrave; SV kh&aacute; giỏi.</p>', 5, NULL, NULL, NULL, NULL, 1, b'1', 3, 31, 9, 3, 12, NULL, '2022-06-08 09:07:02', '2022-06-11 09:22:19'),
(63, '<p>Từ năm 2015, Trường đ&atilde; lu&ocirc;n c&oacute; ti&ecirc;u ch&iacute; v&agrave; phương ph&aacute;p tuyển sinh/ tuyển chọn NH r&otilde; r&agrave;ng. Ti&ecirc;u ch&iacute; v&agrave; phương ph&aacute;p tuyển sinh/ tuyển chọn NH được r&agrave; so&aacute;t, đ&aacute;nh gi&aacute; h&agrave;ng năm.</p>', '<p>Trường tổ chức tuyển sinh nghi&ecirc;m t&uacute;c theo một quy tr&igrave;nh v&agrave; ti&ecirc;u ch&iacute; chặt chẽ, đ&uacute;ng quy định; đ&atilde; tổ chức đ&aacute;nh gi&aacute;, r&uacute;t kinh nghiệm về c&ocirc;ng t&aacute;c tuyển sinh sau khi kết th&uacute;c đợt tuyển sinh h&agrave;ng năm.&nbsp;</p>', '<p>Ng&agrave;nh NTTS chưa c&oacute; ti&ecirc;u ch&iacute; v&agrave; phương &aacute;n tuyển sinh ri&ecirc;ng để cải thiện số lượng v&agrave; chất lượng SV, chưa tuyển sinh khối D01 l&agrave; khối c&oacute; đ&ocirc;ng đảo học sinh nhất.</p>', '<p>Từ đợt tuyển sinh năm 2021, Viện NTTS phối hợp Ph&ograve;ng ĐTĐH đề xuất x&acirc;y dựng ti&ecirc;u ch&iacute; v&agrave; phương &aacute;n tuyển sinh ri&ecirc;ng cho ng&agrave;nh NTTS như ưu ti&ecirc;n cho khu vực huyện Ninh Ho&agrave;, Vạn Ninh của tỉnh Kh&aacute;nh Ho&agrave;. Đặc biệt, ng&agrave;nh NTTS sẽ &aacute;p dụng bổ sung phương ph&aacute;p x&eacute;t tuyển th&ecirc;m khối D01 v&agrave; đẩy mạnh việc tuyển sinh đ&agrave;o tạo theo đơn đặt h&agrave;ng của c&aacute;c doanh nghiệp, cơ sở hoạt động trong lĩnh vực thủy sản.</p>', 4, NULL, NULL, NULL, NULL, 1, b'1', 3, 32, 9, 3, 12, NULL, '2022-06-08 09:08:25', '2022-06-11 09:22:19'),
(64, '<p>V&igrave; nhiều l&yacute; do kh&aacute;c nhau n&ecirc;n sự quan t&acirc;m của CVHT đến KQHT v&agrave; r&egrave;n luyện của SV chưa được thường xuy&ecirc;n. Viện đ&atilde; họp g&oacute;p &yacute; cho dự thảo qui định nhiệm vụ CVHT năm 2019 của Trường nhưng đến nay qui định vẫn chưa được ban h&agrave;nh. Ngo&agrave;i ra, hệ thống CNTT phục vụ gi&aacute;m s&aacute;t KQHT v&agrave; sự tiến bộ trong học tập của SV chưa hoạt động tốt</p>', '<p>Việc gi&aacute;m s&aacute;t tốt khối lượng học tập, KQHT v&agrave; r&egrave;n luyện của NH được thực hiện bởi nhiều đơn vị v&agrave; CV chuy&ecirc;n tr&aacute;ch. Đồng thời, sự hỗ trợ trực tiếp của CVHT đ&atilde; gi&uacute;p cho SV tiến bộ nhanh trong học tập v&agrave; r&egrave;n luyện.</p>', '<p>Sự quan t&acirc;m của CVHT đến KQHT v&agrave; r&egrave;n luyện của SV chưa được thường xuy&ecirc;n. Hệ thống CNTT phục vụ gi&aacute;m s&aacute;t KQHT v&agrave; sự tiến bộ trong học tập của SV chưa hoạt động tốt.</p>', '<p>Từ năm học 2020- 2021, Viện sẽ tăng cường sự quan t&acirc;m của CVHT đến việc gi&aacute;m s&aacute;t KQHT v&agrave; r&egrave;n luyện của SV, tăng cường c&ocirc;ng t&aacute;c gi&aacute;m s&aacute;t c&aacute;c CVHT. Tổ CNTH sẽ ho&agrave;n thiện hệ thống CNTT để phục vụ gi&aacute;m s&aacute;t KQHT v&agrave; sự tiến bộ trong học tập của SV tốt hơn.</p>', 4, NULL, NULL, NULL, NULL, 1, b'1', 3, 33, 9, 3, 12, NULL, '2022-06-08 09:09:54', '2022-06-11 09:22:19'),
(65, '<p class=\"MsoNormal\" style=\"text-align: justify; text-indent: 1.0cm; line-height: 147%; margin: 0cm -.3pt 0cm 0cm;\">Hoạt động tư vấn học tập được Ph&ograve;ng CTCT&amp;SV c&ugrave;ng lực lượng GV thực hiện với vai tr&ograve; CVHT. Ngay từ khi bước v&agrave;o Trường cho đến khi tốt nghiệp, NH c&oacute; thể tiếp nhận đầy đủ th&ocirc;ng tin tư vấn, hỗ trợ học tập cần thiết qua sổ tay SV. Mỗi năm học, Ph&ograve;ng CTCT&amp;SV đều c&oacute; kế hoạch l&agrave;m việc để tư vấn cho SV chọn t&ecirc;n HP, khối lượng t&iacute;n chỉ... sao cho hiệu quả nhất. Trong qu&aacute; tr&igrave;nh học, SV c&oacute; thể nhận được đầy đủ th&ocirc;ng tin tư vấn, hỗ trợ học tập c&ugrave;ng với phương ph&aacute;p học tập hiệu quả từ lực lượng CVHT, GV dạy HP. CVHT l&agrave;m c&ocirc;ng việc cố vấn theo kế hoạch l&agrave;m việc của Ph&ograve;ng CTCT&amp;SV. Mỗi tuần, CVHT c&oacute; buổi &nbsp;sinh hoạt lớp v&agrave;o tiết cuối của ng&agrave;y thứ bảy để hỗ trợ SV đăng k&yacute; HP, lựa chọn hay hủy HP, thiết kế thời kh&oacute;a biểu, x&acirc;y dựng tiến độ v&agrave; kế hoạch học tập ph&ugrave; hợp &hellip; Ngo&agrave;i ra, SV ng&agrave;nh NTTS c&ograve;n được tham quan cơ sở vật chất của Trường, Viện để l&agrave;m quen với nghề nghiệp, tăng th&ecirc;m l&ograve;ng y&ecirc;u nghề; được tham gia c&aacute;c buổi tọa đ&agrave;m hướng nghiệp để được định hướng ng&agrave;nh nghề v&agrave; t&igrave;m kiếm cơ hội việc l&agrave;m sau khi ra Trường. Trong suốt qu&aacute; tr&igrave;nh học tập, SV đều c&oacute; thể gặp l&atilde;nh đạo Viện v&agrave;o bất cứ l&uacute;c n&agrave;o để xin &yacute; kiến tư vấn v&agrave; hỗ trợ học tập cần thiết. Ngo&agrave;i ra, c&aacute;c th&ocirc;ng tin tư vấn cũng được chuyển tải đến NH bằng nhiều h&igrave;nh thức kh&aacute;c nhau như tr&ecirc;n c&aacute;c bảng th&ocirc;ng tin chung, website của Viện&hellip; B&ecirc;n cạnh đ&oacute;, SV của Viện đều được tạo điều kiện để tiếp cận với thực tế sản xuất, cơ hội nghề nghiệp th&ocirc;ng qua c&aacute;c buổi tham quan thực tế, c&aacute;c đợt thực tập, gặp gỡ cựu SV th&agrave;nh đạt&hellip; k&yacute; kết văn bản hợp t&aacute;c với c&aacute;c doanh nghiệp. SV đam m&ecirc; NCKH c&oacute; thể tham gia v&agrave;o c&aacute;c seminar của Viện hoặc tham gia thực hiện đề t&agrave;i NCKH dưới sự hướng dẫn của GV, tham gia c&acirc;u lạc bộ ngoại ngữ của Trường để n&acirc;ng cao tr&igrave;nh độ tiếng anh.</p>', '<p>Hoạt động tư vấn học tập v&agrave; hướng nghiệp được Viện quan t&acirc;m v&agrave; tổ chức triển khai thường xuy&ecirc;n. C&aacute;c hoạt động ngoại kho&aacute; đ&atilde; thu h&uacute;t nhiều SV tham gia hăng say, củng cố l&ograve;ng y&ecirc;u nghề.</p>', '<p>Hoạt động ngoại kh&oacute;a ph&aacute;t triển kỹ năng mềm cho SV chưa được thường xuy&ecirc;n. Hoạt động thi đua trong SV chưa được quan t&acirc;m đ&uacute;ng mức. Gương &ldquo;người tốt, việc tốt&rdquo; chưa được triển khai đều đặn.</p>', '<p>Từ năm học 2021-2022, Viện sẽ tăng cường c&aacute;c hoạt động ngoại kh&oacute;a để ph&aacute;t triển kỹ năng mềm cho SV, c&oacute; biện ph&aacute;p hữu hiệu hơn nhằm thu h&uacute;t sự quan t&acirc;m hơn nữa của SV đối với hoạt động thi đua v&agrave; phong tr&agrave;o &ldquo;người tốt, việc tốt&rdquo;.</p>', 5, NULL, NULL, NULL, NULL, 1, b'1', 3, 34, 9, 3, 12, NULL, '2022-06-08 09:13:05', '2022-06-11 09:22:19'),
(66, '<p>C&ugrave;ng với việc đầu tư x&acirc;y dựng cơ sở vật chất theo hướng kh&eacute;p k&iacute;n (GĐ, PTN v&agrave; TH, thư viện, KTX, cơ sở y tế, c&ocirc;ng tr&igrave;nh thể thao&hellip;), Trường đ&atilde; ch&uacute; &yacute; cải tạo cảnh quan ng&agrave;y c&agrave;ng khang trang, đẹp đẽ, xanh m&aacute;t, trở th&agrave;nh một trong 15 ng&ocirc;i trường đại học đẹp nhất Việt Nam. Trường thực hiện những hoạt động thu thập &yacute; kiến phản hồi của NH, trong đ&oacute; c&oacute; hoạt động lấy &yacute; kiến của SV về m&ocirc;i trường t&acirc;m l&yacute;, cảnh quan, đối thoại giữa SV với l&atilde;nh đạo Viện, l&atilde;nh đạo Trường, thường xuy&ecirc;n tạo m&ocirc;i trường t&acirc;m l&yacute;, x&atilde; hội thoải m&aacute;i, an to&agrave;n, gi&uacute;p SV y&ecirc;n t&acirc;m học tập v&agrave; nghi&ecirc;n cứu cũng như sinh hoạt v&agrave; vui chơi giải tr&iacute;. Hệ thống c&aacute;c khu KTX (x&acirc;y dựng mới v&agrave; n&acirc;ng cấp) với c&aacute;c ph&ograve;ng ở khang trang, sạch sẽ v&agrave; kh&eacute;p k&iacute;n, đảm bảo chỗ ở cho 3.000 đến 4.000 SV c&oacute; nhu cầu nội tr&uacute;. Hoạt động quản l&yacute; KTX từng bước được cải tiến theo hướng coi SV vừa l&agrave; đối tượng được phục vụ vừa l&agrave; đối tượng cần được gi&aacute;o dục.&nbsp;</p>', '<p>Hệ thống GĐ, KTX, thư viện... được đầu tư x&acirc;y dựng v&agrave; quản l&yacute; chặt chẽ đảm bảo tiện nghi v&agrave; an to&agrave;n. Cảnh quan m&ocirc;i trường được Trường ch&uacute; &yacute; cải tạo, tạo khung cảnh thoải m&aacute;i cho NH. Khu&ocirc;n vi&ecirc;n Viện v&agrave; c&aacute;c cơ sở thực tập l&agrave; nơi l&yacute; tưởng để SV tham gia hoạt động ngoại kho&aacute;, chuẩn bị cho c&aacute;c hoạt động t&igrave;nh nguyện, trại h&egrave;...</p>', '<p>Hoạt động nhắc nhở SV ch&uacute; &yacute; bảo vệ m&ocirc;i trường xanh, sạch, đẹp của Trường chưa được quan t&acirc;m thường xuy&ecirc;n.</p>', '<p>Viện sẽ tăng cường c&aacute;c biện ph&aacute;p tuy&ecirc;n truyền rộng r&atilde;i đến SV nhằm n&acirc;ng cao &yacute; thức bảo vệ cảnh quan m&ocirc;i trường từ năm học 2021- 2022.</p>', 5, NULL, NULL, NULL, NULL, 1, b'1', 3, 35, 9, 3, 12, NULL, '2022-06-08 09:14:42', '2022-06-11 09:22:19'),
(67, NULL, NULL, NULL, NULL, NULL, '<p>Trong tổng thể ph&aacute;t triển một trường đại học đa ng&agrave;nh, việc x&acirc;y dựng v&agrave; ph&aacute;t triển cơ sở vật chất, bao gồm: diện t&iacute;ch mặt bằng, thư viện, PTN, GĐ, KTX, phương tiện kỹ thuật, hệ thống th&ocirc;ng tin, internet,... nhằm đ&aacute;p ứng y&ecirc;u cầu đ&agrave;o tạo, NCKH l&agrave; một trong những mối quan t&acirc;m h&agrave;ng đầu của l&atilde;nh đạo Trường. Qua qu&aacute; tr&igrave;nh triển khai kế hoạch đầu tư hiệu quả, đến nay Trường đ&atilde; c&oacute; hệ thống cơ sở vật chất v&agrave; thiết bị tương đối khang trang. Cơ sở ch&iacute;nh của Trường tọa lạc tr&ecirc;n đồi La San rộng hơn 23ha, nằm ở ph&iacute;a Bắc th&agrave;nh phố Nha Trang. Thư viện, ph&ograve;ng học, ph&ograve;ng TNTH, KTX kh&ocirc;ng ngừng được n&acirc;ng cấp, mở rộng. Nhiều thiết bị hiện đại đ&atilde; được trang bị cho c&aacute;c PTN TH, thư viện. M&ocirc;i trường l&agrave;m việc y&ecirc;n tĩnh, th&ocirc;ng tho&aacute;ng, th&acirc;n thiện. Cơ sở vật chất, thiết bị được khai th&aacute;c sử dụng hiệu quả đ&aacute;p ứng tốt c&aacute;c nhu cầu dạy-học, NCKH, sinh hoạt-r&egrave;n luyện. Trường cũng đ&atilde; triển khai c&aacute;c biện ph&aacute;p hữu hiệu để đảm bảo an to&agrave;n cho CBVC v&agrave; NH; an ninh ch&iacute;nh trị, trật tự an to&agrave;n trong Trường lu&ocirc;n được đảm bảo.</p>', '<p>Trường c&oacute; điều kiện cơ sở vật chất đảm bảo y&ecirc;u cầu đ&agrave;o tạo v&agrave; NCKH của GV v&agrave; SV. C&aacute;c điều kiện về ph&ograve;ng học, GĐ lớn, ph&ograve;ng TH v&agrave; c&aacute;c trang thiết bị dạy v&agrave; học để hỗ trợ cho c&aacute;c hoạt động đ&agrave;o tạo, NCKH v&agrave; quản l&yacute; đều đ&aacute;p ứng theo quy m&ocirc; v&agrave; y&ecirc;u cầu đ&agrave;o tạo của c&aacute;c chuy&ecirc;n ng&agrave;nh hiện nay. Tất cả c&aacute;c đơn vị, ph&ograve;ng ban, khoa, BM v&agrave; c&aacute;c GS, PGS đều c&oacute; văn ph&ograve;ng độc lập để l&agrave;m việc với đầy đủ c&aacute;c trang thiết bị. Thư viện Trường kh&ocirc;ng ngừng được hiện đại ho&aacute; v&agrave; c&oacute; nguồn th&ocirc;ng tin học liệu phong ph&uacute;, c&oacute; ch&iacute;nh s&aacute;ch phục vụ tốt, đảm bảo đ&aacute;p ứng nhu cầu của người d&ugrave;ng. Trường c&oacute; khu&ocirc;n vi&ecirc;n rộng r&atilde;i với hệ thống s&acirc;n b&atilde;i đảm bảo cho học tập, sinh hoạt, thể thao, văn nghệ v&agrave; c&aacute;c hoạt động ngoại kho&aacute; kh&aacute;c. &nbsp;KTX của Trường giải quyết được tr&ecirc;n 65% nhu cầu ở nội tr&uacute; trong SV. Trường đ&atilde; x&acirc;y dựng quy hoạch tổng thể về sử dụng v&agrave; ph&aacute;t triển cơ sở vật chất của trường đến năm 2020, tầm nh&igrave;n 2030. Tổ Bảo vệ chuy&ecirc;n tr&aacute;ch của Trường c&oacute; đủ số lượng, c&oacute; năng lực chuy&ecirc;n m&ocirc;n đảm bảo đ&aacute;p ứng y&ecirc;u cầu nhiệm vụ đảm bảo an ninh, an to&agrave;n về người v&agrave; t&agrave;i sản trong khu&ocirc;n vi&ecirc;n Trường.</p>', 5, 5, 1, b'1', 3, 60, 10, 3, 15, NULL, '2022-06-08 09:20:38', '2022-06-11 09:26:43'),
(68, '<p>Trải qua hơn 60 năm x&acirc;y dựng v&agrave; ph&aacute;t triển, nhất l&agrave; 20 năm gần đ&acirc;y, Trường đ&atilde; khai th&aacute;c từ nhiều nguồn lực để x&acirc;y dựng cơ sở vật chất, đặc biệt ch&uacute; trọng đến cơ sở vật chất nhằm phục vụ tốt cho c&ocirc;ng t&aacute;c đ&agrave;o tạo v&agrave; NCKH: ph&ograve;ng học, GĐ, PTN TH. Cơ sở vật chất hiện tại của Trường được ph&acirc;n bổ tại 05 địa điểm:</p>\r\n<p>- Cơ sở ch&iacute;nh (số 02 Nguyễn Đ&igrave;nh Chiểu, Tp. Nha Trang) l&agrave; nơi tập trung văn ph&ograve;ng l&agrave;m việc của: Ban gi&aacute;m hiệu, c&aacute;c ph&ograve;ng ban chức năng, văn ph&ograve;ng khoa, viện nghi&ecirc;n cứu, c&aacute;c trung t&acirc;m đ&agrave;o tạo, văn ph&ograve;ng GS v&agrave; PGS, c&aacute;c PTN, cở sở TH, ph&ograve;ng học, giảng đường, hội Trường, thư viện, khu KTX, nh&agrave; thi đấu đa năng, s&acirc;n vận động... &nbsp;Cơ sở n&agrave;y hiện c&oacute; 154 ph&ograve;ng l&agrave;m việc, cơ bản đ&aacute;p ứng chỗ l&agrave;m việc v&agrave; diện t&iacute;ch cho tất cả c&aacute;c tổ chức, đơn vị, BM.</p>\r\n<p>- Cơ sở ở H&ograve;n Rớ, x&atilde; Phước Đồng, Tp. Nha Trang l&agrave; trụ sở của Viện Nghi&ecirc;n cứu Chế tạo t&agrave;u thủy.</p>\r\n<p>- Cơ sở ở th&ocirc;n Đại C&aacute;t 2, x&atilde; Ninh Phụng, thị x&atilde; Ninh H&ograve;a l&agrave; Trại thực nghiệm thuộc Viện NTTS.</p>\r\n<p>- Cơ sở ở th&ocirc;n Hiệp Mỹ, x&atilde; Cam Thịnh Đ&ocirc;ng, th&agrave;nh phố Cam Ranh l&agrave; Trại thực nghiệm thuộc Viện NTTS.</p>\r\n<p>- Cơ sở ở th&ocirc;n Đồng Cau, x&atilde; Suối T&acirc;n, huyện Cam L&acirc;m l&agrave; địa điểm GD của Trung t&acirc;m Gi&aacute;o dục Quốc ph&ograve;ng.</p>\r\n<p>C&aacute;c hoạt động đ&agrave;o tạo l&yacute; thuyết của ng&agrave;nh NTTS tập trung chủ yếu tại cơ sở ch&iacute;nh v&agrave; thực tập tại 2 trại thực nghiệm ở Ninh H&ograve;a v&agrave; Cam Ranh.<br>&nbsp;</p>', '<p>Hệ thống ph&ograve;ng học của Trường được thiết kế ph&ugrave; hợp với số lượng SV kh&aacute;c nhau. C&aacute;c phương tiện phục vụ dạy v&agrave; học được trang bị tại c&aacute;c GĐ kh&aacute; đầy đủ. Viện NTTS c&oacute; 2 trại thực nghiệm đều c&oacute; c&aacute;c ph&ograve;ng học để phục vụ học tập cho SV trong thời gian thực tập.&nbsp;</p>', '<p>Một số trang thiết bị trong ph&ograve;ng học hoạt động thiếu ổn định, cần phải được thường xuy&ecirc;n sửa chữa v&agrave; thay mới.</p>', '<p>Từ HK 2 năm học 2020 - 2021, Trung t&acirc;m Phục vụ trường học v&agrave; Trung t&acirc;m TNTH tiếp tục khắc phục n&acirc;ng cấp kịp thời cơ sở vật chất tại c&aacute;c GĐ v&agrave; khu TNTH.&nbsp;</p>', 5, NULL, NULL, NULL, NULL, 1, b'1', 3, 36, 10, 3, 15, NULL, '2022-06-08 09:23:12', '2022-06-11 09:22:19'),
(69, '<p>Thư viện c&oacute; cảnh quan m&ocirc;i trường trong l&agrave;nh, y&ecirc;n tĩnh, ph&ugrave; hợp với nhu cầu học tập v&agrave; nghi&ecirc;n cứu của bạn đọc. C&aacute;c khu vực tự học được bố tr&iacute; xen kẽ ở trong nh&agrave; v&agrave; độc lập ngo&agrave;i khu&ocirc;n vi&ecirc;n thư viện, người d&ugrave;ng c&oacute; thể t&ugrave;y theo mục đ&iacute;ch để sử dụng, c&oacute; sơ đồ cụ thể. Thư viện Trường được bố tr&iacute; ở khu vực 5.000m2, y&ecirc;n tĩnh, tho&aacute;ng m&aacute;t, trang bị hiện đại, với gần 700 chỗ ngồi. Cổng th&ocirc;ng tin thư viện (http://thuvien.ntu.edu.vn) thường xuy&ecirc;n cập nhật c&aacute;c tin tức, ch&iacute;nh s&aacute;ch, nội quy, hướng dẫn sử dụng thư viện, gi&uacute;p bạn đọc tự kiểm tra t&agrave;i khoản hoạt động của c&aacute; nh&acirc;n, đồng thời tiếp nhận, trả lời c&aacute;c th&ocirc;ng tin phản hồi từ bạn đọc&hellip; Đ&acirc;y ch&iacute;nh l&agrave; cầu nối nhanh nhất giữa thư viện với bạn đọc. Thư viện c&oacute; nguồn t&agrave;i nguy&ecirc;n đa dạng v&agrave; phong ph&uacute; với nhiều chủ đề kh&aacute;c nhau, đ&aacute;p ứng nhu cầu đ&agrave;o tạo v&agrave; nghi&ecirc;n cứu cho c&aacute;c ng&agrave;nh đ&agrave;o tạo của Trường v&agrave; g&oacute;p phần n&acirc;ng cao tr&igrave;nh độ ch&iacute;nh trị, văn h&oacute;a, lịch sử v&agrave; kỹ năng mềm cho SV. T&iacute;nh đến th&aacute;ng 7/2020, Thư viện c&oacute; số lượng t&agrave;i liệu như sau: T&agrave;i liệu in với hơn 23.000 t&ecirc;n t&agrave;i liệu (s&aacute;ch tiếng việt: 12.900 đầu s&aacute;ch với 56.618 cuốn; s&aacute;ch tiếng nước &nbsp;ngo&agrave;i: 1.000 đầu s&aacute;ch với 2.024 cuốn; luận văn, luận &aacute;n, kh&oacute;a luận: 5.825 cuốn; b&aacute;o v&agrave; tạp ch&iacute;: khoảng gần 100 t&ecirc;n), t&agrave;i liệu số với hơn 117.141 t&ecirc;n t&agrave;i liệu (s&aacute;ch tiếng việt: &nbsp;6.638 t&ecirc;n; s&aacute;ch tiếng Anh: 8.694 t&ecirc;n; gi&aacute;o tr&igrave;nh, b&agrave;i giảng của Trường: 854 t&ecirc;n; kh&oacute;a luận, luận văn, luận &aacute;n: 3.530 t&ecirc;n; b&aacute;o ch&iacute;: 550 t&ecirc;n v&agrave; 94.768 b&agrave;i tr&iacute;ch tạp ch&iacute; tiếng Anh v&agrave; tiếng Việt; kết quả NCKH: 2.000 đề t&agrave;i với 192 t&ecirc;n đề t&agrave;i được chọn xử l&yacute; đưa v&agrave;o phục vụ trực tuyến, số c&ograve;n lại được lưu trữ tại thư viện). B&ecirc;n cạnh đ&oacute;, để tăng cường nguồn t&agrave;i nguy&ecirc;n, Thư viện lu&ocirc;n ch&uacute; &yacute; tổ chức khai th&aacute;c t&agrave;i liệu miễn ph&iacute; tr&ecirc;n mạng, giới thiệu c&aacute;c đường link hữu &iacute;ch hoặc t&igrave;m kiếm c&aacute;c nguồn t&agrave;i trợ từ nước ngo&agrave;i. Đến nay Thư viện đ&atilde; được cấp quyền truy cập v&agrave;o 20 trang cơ sở dữ liệu như Agora, Hinari, Oxford, Onlinelibrary. Wiley, IMF, OARE, &hellip; Đ&acirc;y l&agrave; nguồn t&agrave;i liệu rất bổ &iacute;ch cho người d&ugrave;ng. T&iacute;nh đến năm 2020, c&aacute;c HP của chuy&ecirc;n ng&agrave;nh NTTS c&oacute; khoảng 1.495 t&ecirc;n t&agrave;i liệu với khoảng 1.900 bản v&agrave; 1.200 t&agrave;i liệu số.&nbsp;</p>', '<p>CB, GV v&agrave; NH c&oacute; thể tiếp cận hầu hết c&aacute;c dịch vụ thư viện th&ocirc;ng qua cổng th&ocirc;ng tin điện tử v&agrave; Thư viện số của Thư viện.</p>\r\n<p>Thư viện đ&atilde; &aacute;p dụng c&aacute;c c&ocirc;ng nghệ hiện đại trong việc quản l&yacute; v&agrave; khai th&aacute;c c&aacute;c nguồn t&agrave;i nguy&ecirc;n.</p>\r\n<p>Nguồn t&agrave;i liệu của Thư viện phong ph&uacute;, đa dạng về loại h&igrave;nh; đ&aacute;p ứng tốt c&aacute;c y&ecirc;u cầu về đ&agrave;o tạo v&agrave; NCKH ng&agrave;nh NTTS.</p>\r\n<p>M&ocirc;i trường thư viện y&ecirc;n tĩnh, tho&aacute;ng m&aacute;t, đ&aacute;p ứng tốt c&aacute;c nhu cầu về tra cứu, tự học, trao đổi của bạn đọc.</p>', '<p>Chưa c&oacute; nhiều cơ sở dữ liệu số về c&aacute;c tạp ch&iacute; chuy&ecirc;n ng&agrave;nh quốc tế, khả năng cập nhật cơ sở dữ liệu số c&ograve;n chậm.&nbsp;</p>', '<p>Trong năm học 2020 - 2021, Trường ch&uacute; trọng mở rộng mối li&ecirc;n kết với c&aacute;c tạp ch&iacute; v&agrave; nh&agrave; ph&aacute;t h&agrave;nh ngo&agrave;i nước để c&oacute; nhiều ấn phẩm về ng&agrave;nh thủy sản n&oacute;i chung v&agrave; chuy&ecirc;n ng&agrave;nh NTTS n&oacute;i ri&ecirc;ng.</p>', 5, NULL, NULL, NULL, NULL, 1, b'1', 3, 37, 10, 3, 15, NULL, '2022-06-08 09:25:11', '2022-06-11 09:22:19'),
(70, '<p>Trung t&acirc;m TNTH của Trường hiện đang quản l&yacute; v&agrave; vận h&agrave;nh 45 PTN&nbsp; được x&acirc;y dựng tr&ecirc;n diện t&iacute;ch 4.932m2. Diện t&iacute;ch từng PTN cũng như bố tr&iacute; thiết bị được c&ocirc;ng khai tr&ecirc;n website của Trường. Trung t&acirc;m c&oacute; sơ đồ bố tr&iacute; cụ thể từng PTN, trong đ&oacute;, c&aacute;c PTN TH phục vụ cho đ&agrave;o tạo ng&agrave;nh NTTS được liệt k&ecirc; chi tiết tại phụ lục. C&aacute;c PTN được trang bị c&aacute;c vật tư v&agrave; thiết bị cần thiết với số lượng, diện t&iacute;ch v&agrave; c&aacute;c trang thiết bị, c&aacute;c PTN đ&atilde; đ&aacute;p ứng nhu cầu TH, thực tập, th&iacute; nghiệm v&agrave; NCKH cơ bản của đội ngũ GV v&agrave; SV to&agrave;n Trường n&oacute;i chung v&agrave; ng&agrave;nh NTTS n&oacute;i ri&ecirc;ng. Trung t&acirc;m TNTH cũng c&oacute; c&aacute;c quy định về quản l&yacute; c&aacute;c PTN v&agrave; mỗi ph&ograve;ng đều c&oacute; nhật k&yacute; TH thực tập.&nbsp;</p>', '<p>Hệ thống PTN đ&aacute;p ứng cơ bản nhu cầu học tập, nghi&ecirc;n cứu cho ng&agrave;nh NTTS. Viện NTTS c&oacute; 2 trại thực nghiệm đ&aacute;p ứng nhu cầu cho SV thực tập gi&aacute;o tr&igrave;nh, thực tập tốt nghiệp v&agrave; NCKH. C&aacute;c PTN v&agrave; c&aacute;c Trại thực nghiệm lu&ocirc;n c&oacute; CB hỗ trợ hướng dẫn c&aacute;ch sử dụng cho SV v&agrave; GV.</p>', '<p>Kinh ph&iacute; TH c&ograve;n thấp chưa đ&aacute;p ứng được nhu cầu ng&agrave;y c&agrave;ng cao của ng&agrave;nh nghề. C&aacute;c PTN thường xuy&ecirc;n bị qu&aacute; tải sử dụng v&agrave;o giai đoạn cuối HK v&agrave; sắp xếp trang thiết bị ở c&aacute;c ph&ograve;ng TN phục vụ TH thực tập chưa ph&ugrave; hợp, một số thiết bị đ&atilde; qu&aacute; hạn sử dụng v&agrave; chưa được hiệu chỉnh.</p>', '<p>Từ năm học 2020 - 2021, Trường sẽ điều chỉnh quy chế chi ti&ecirc;u nội bộ để tăng kinh ph&iacute; cho c&aacute;c HK TH thực tập. Đồng thời t&aacute;i bố tr&iacute; hệ thống c&aacute;c PTN, TH theo hướng l&acirc;u d&agrave;i, tạo thuận lợi cho hoạt động đ&agrave;o tạo, NCKH v&agrave; đ&aacute;p ứng c&aacute;c y&ecirc;u cầu về m&ocirc;i trường; tăng diện t&iacute;ch c&aacute;c PTN, TH c&oacute; mật độ SV sử dụng cao.</p>', 4, NULL, NULL, NULL, NULL, 1, b'1', 3, 38, 10, 3, 15, NULL, '2022-06-08 09:26:40', '2022-06-11 09:22:19'),
(71, '<p>T&iacute;nh đến th&aacute;ng 7/2020, Trường c&oacute; 420 bộ m&aacute;y t&iacute;nh b&agrave;n đang hoạt động tốt để phục vụ hoạt động dạy v&agrave; học, NCKH v&agrave; quản l&yacute;. Trong đ&oacute;, c&oacute; 320 bộ m&aacute;y t&iacute;nh được ph&acirc;n bố ở 09 ph&ograve;ng m&aacute;y phục vụ dạy v&agrave; học (Khoa CNTT c&oacute; 6 ph&ograve;ng với 200 m&aacute;y, trung t&acirc;m Nghi&ecirc;n cứu v&agrave; Ph&aacute;t triển C&ocirc;ng nghệ Phần mềm c&oacute; 2 ph&ograve;ng với 80 m&aacute;y, Khoa Ngoại ngữ c&oacute; 2 ph&ograve;ng với 40 m&aacute;y), 100 bộ m&aacute;y t&iacute;nh trang bị cho c&aacute;c văn ph&ograve;ng, khoa v&agrave; BM. Mỗi văn ph&ograve;ng, khoa, BM đồng thời được trang bị m&aacute;y in, m&aacute;y photocopy để phục vụ c&ocirc;ng t&aacute;c quản l&yacute;, chuy&ecirc;n m&ocirc;n. Tất cả m&aacute;y t&iacute;nh ở c&aacute;c ph&ograve;ng ban, khoa, trung t&acirc;m cũng như m&aacute;y t&iacute;nh học tập đều được kết nối mạng nội bộ v&agrave; kết nối Internet tốc độ cao, phục vụ 24/24 giờ, đảm bảo cho c&ocirc;ng t&aacute;c đ&agrave;o tạo, NCKH v&agrave; quản l&yacute;. Trường đ&atilde; tin học h&oacute;a c&ocirc;ng t&aacute;c quản l&yacute; th&ocirc;ng qua việc sử dụng c&aacute;c phần mềm chuy&ecirc;n d&ugrave;ng: quản l&yacute; đ&agrave;o tạo, quản l&yacute; thư viện, quản l&yacute; t&agrave;i sản, quản l&yacute; t&agrave;i ch&iacute;nh với c&aacute;c quy định cụ thể về sử dụng. &nbsp;</p>', '<p>Trường c&oacute; thiết lập sẵn c&aacute;c ph&ograve;ng m&aacute;y t&iacute;nh để phục vụ nhu cầu học tập của SV.</p>\r\n<p>Hệ thống wifi được trang bị đầy đủ tại c&aacute;c khu vực học tập v&agrave; l&agrave;m việc trong khu&ocirc;n vi&ecirc;n Trường.</p>', '<p>Thiếu một số phần mềm hỗ trợ cho nhu cầu dạy v&agrave; học.</p>', '<p>Từ năm 2021, Trường đầu tư mới, n&acirc;ng cấp ph&ograve;ng m&aacute;y t&iacute;nh chuy&ecirc;n ng&agrave;nh ở c&aacute;c khoa, hệ thống m&aacute;y chủ, tốc độ đường truyền internet để đ&aacute;p ứng nhu cầu của dạy v&agrave; học. Đồng thời ph&aacute;t triển th&ecirc;m một số phần mềm để hỗ trợ cho GV v&agrave; NH.</p>', 5, NULL, NULL, NULL, NULL, 1, b'1', 3, 39, 10, 3, 15, NULL, '2022-06-08 09:27:47', '2022-06-11 09:22:19'),
(72, '<p>Trường nằm trong top 3 trường đại học c&oacute; khu&ocirc;n vi&ecirc;n, m&ocirc;i trường, kh&ocirc;ng gian xanh v&agrave; đẹp nhất Việt Nam (theo Chương tr&igrave;nh Sống xanh 11/3/2017 của Đ&agrave;i PT&amp;TH Kh&aacute;nh H&ograve;a). Khu&ocirc;n vi&ecirc;n ch&iacute;nh của Trường nằm tr&ecirc;n khu đồi ph&iacute;a Bắc th&agrave;nh phố Nha Trang với tổng diện t&iacute;ch khoảng 24 ha. B&ecirc;n cạnh c&ocirc;ng t&aacute;c ph&aacute;t triển, x&acirc;y dựng cơ sở vật chất trong thời gian qua được thực hiện theo đ&uacute;ng chủ trương, định hướng ph&aacute;t triển của Trường; đ&aacute;p ứng y&ecirc;u cầu thực tế về c&ocirc;ng t&aacute;c đ&agrave;o tạo, NCKH, chuyển giao c&ocirc;ng nghệ của CB, GV, SV v&agrave; học vi&ecirc;n trong Trường. Từ cuối năm 2015, Trường lu&ocirc;n ch&uacute; trọng đến ph&aacute;t triển kh&ocirc;ng gian xanh sạch trong Trường, cải tạo v&agrave; trồng bổ sung c&aacute;c c&acirc;y cho b&oacute;ng m&aacute;t, c&acirc;y cảnh v&agrave; hoa. Quy hoạch lại c&aacute;c lối đi v&agrave; trồng hoa che phủ b&oacute;ng m&aacute;t, ph&aacute;t triển khu vực vườn sinh th&aacute;i trong Trường để tạo điều kiện cho SV TH.&nbsp;</p>', '<p>C&aacute;c quy định về an to&agrave;n, vệ sinh m&ocirc;i trường của Trường được thiết lập theo quy định của Nh&agrave; nước. Nội quy của c&aacute;c PTN được x&acirc;y dựng đầy đủ. Trường c&oacute; khu&ocirc;n vi&ecirc;n xanh sạch đẹp h&agrave;ng đầu trong c&aacute;c trường đại học Việt Nam.</p>', '<p>Chưa c&oacute; hệ thống nh&agrave; vệ sinh d&agrave;nh ri&ecirc;ng cho người khuyết tật tại c&aacute;c GĐ v&agrave; khu nh&agrave; l&agrave;m việc.</p>', '<p>Từ HK 2 năm học 2020 - 2021, Trường sẽ bố tr&iacute; x&acirc;y dựng th&ecirc;m c&aacute;c nh&agrave; về sinh v&agrave; cải thiện cơ sở vật chất đ&aacute;p ứng nhu cầu đặc th&ugrave; cho người khuyết tật.</p>', 4, NULL, NULL, NULL, NULL, 1, b'1', 3, 40, 10, 3, 15, NULL, '2022-06-08 09:28:54', '2022-06-11 09:22:19'),
(73, NULL, NULL, NULL, NULL, NULL, '<p>Hoạt động n&acirc;ng cao chất lượng l&agrave; một trong những yếu tố cốt l&otilde;i để ĐBCL đầu ra theo cam kết với x&atilde; hội, qua đ&oacute; đảm bảo uy t&iacute;n, cũng như sự tin tưởng của SV, c&aacute;c nh&agrave; tuyển dụng,&hellip; với Trường. Ban gi&aacute;m hiệu v&agrave; c&aacute;c ph&ograve;ng ban chức năng đ&atilde; tập trung chỉ đạo v&agrave; ưu ti&ecirc;n d&agrave;nh đ&aacute;ng kể mọi nguồn lực cho hoạt động li&ecirc;n quan đến n&acirc;ng cao chất lượng dạy học. Hoạt động đảm bảo v&agrave; cải tiến chất lượng dạy học được duy tr&igrave; thường xuy&ecirc;n trong c&aacute;c năm học qua. N&acirc;ng cao chất lượng trong GDĐH gắn liền với việc cải tiến v&agrave; n&acirc;ng cao c&aacute;c yếu tố như: chất lượng CTĐT; chất lượng hoạt động dạy, học v&agrave; kiểm tra đ&aacute;nh gi&aacute;; chất lượng đội ngũ; chất lượng NH v&agrave; c&ocirc;ng t&aacute;c hỗ trợ NH; chất lượng hệ thống trang thiết bị v&agrave; cơ sở hạ tầng.&nbsp;</p>', '<p>Trường, Khoa đ&atilde; thực hiện mọi hoạt động cần thiết để duy tr&igrave; v&agrave; n&acirc;ng cao chất lượng. Th&ocirc;ng qua việc thường xuy&ecirc;n thu thập th&ocirc;ng tin phản hồi từ c&aacute;c b&ecirc;n li&ecirc;n quan, CTĐT cũng như c&aacute;c hoạt động dạy v&agrave; học được điều chỉnh thường xuy&ecirc;n nhằm đảm bảo sự tương th&iacute;ch v&agrave; ph&ugrave; hợp với nhu cầu thực tiễn của x&atilde; hội. Trường cũng đ&atilde; thực hiện c&aacute;c chương tr&igrave;nh cụ thể để bồi dưỡng n&acirc;ng cao năng lực đội ngũ GV. C&ocirc;ng t&aacute;c NCKH cũng như đầu tư cơ sở vật chất phục vụ cho nghi&ecirc;n cứu v&agrave; đ&agrave;o tạo đ&atilde; được ch&uacute; trọng thực hiện. Trường cũng đ&atilde; x&acirc;y dựng cổng th&ocirc;ng tin điện tử để việc tiếp nhận th&ocirc;ng tin phản hồi nhanh ch&oacute;ng, đa dạng v&agrave; phong ph&uacute; hơn. Về những bất cập trong việc đầu tư cơ sở vật chất NCKH v&agrave; c&ocirc;ng t&aacute;c quản l&yacute; dữ liệu, c&aacute;c văn bản hướng dẫn về lấy &yacute; kiến c&aacute;c b&ecirc;n li&ecirc;n quan,&hellip; Trường, Khoa v&agrave; c&aacute;c đơn vị li&ecirc;n quan sẽ triển khai thực hiện từ năm học 2020 - 2021.&nbsp;</p>', 6, 6, 1, b'1', 3, 61, 11, 3, 15, NULL, '2022-06-08 09:29:55', '2022-06-11 09:26:43'),
(74, '<p>Mục ti&ecirc;u quan trọng trong ĐTĐH l&agrave; đảm bảo cung cấp nguồn nh&acirc;n lực cho x&atilde; hội, ở đ&acirc;y l&agrave; nguồn nh&acirc;n lực cho c&aacute;c hoạt động NTTS. Do đ&oacute;, c&aacute;c b&ecirc;n li&ecirc;n quan trong CTDH kh&ocirc;ng chỉ l&agrave; c&aacute;c nh&acirc;n tố nội bộ Trường như GV, NH m&agrave; c&ograve;n l&agrave; những đơn vị sử dụng lao động như c&aacute;c c&ocirc;ng ty, c&aacute;c viện nghi&ecirc;n cứu, c&aacute;c cơ quan quản l&yacute; v&agrave; c&aacute;c tổ chức nh&agrave; nước về quản l&yacute; nghề NTTS, nguồn lợi thủy sản, &hellip;<br>Nhận thức được mức độ li&ecirc;n quan, Trường c&oacute; hệ thống thu thập th&ocirc;ng tin về nhu cầu nguồn nh&acirc;n lực khi thiết kế CTDH v&agrave; thu thập th&ocirc;ng tin phản hồi từ c&aacute;c BLQ. Hoạt động thu thập, ph&acirc;n t&iacute;ch th&ocirc;ng tin phản hồi l&agrave; một phần nội dung quan trọng của c&ocirc;ng t&aacute;c n&acirc;ng cao chất lượng đ&agrave;o tạo. Hoạt động n&agrave;y được Trường tổ chức th&ocirc;ng qua sự phối hợp của c&aacute;c đơn vị kh&aacute;c nhau trong Trường như m&ocirc; tả trong Quy định lấy &yacute; kiến phản hồi c&aacute;c BLQ, Kế hoạch ĐBCL h&agrave;ng năm của Trường v&agrave; Quy tr&igrave;nh ph&aacute;t triển CTĐT tr&igrave;nh độ đại học v&agrave; cao đẳng của Trường. Cuối mỗi HK, Ph&ograve;ng ĐBCL&amp;KT tổ chức lấy &yacute; kiến của NH về hoạt động GD của GV sau khi kết th&uacute;c HP. Đồng thời, Viện NTTS cũng thu thập th&ocirc;ng tin phản hồi của NH th&ocirc;ng qua CVHT, c&aacute;c chương tr&igrave;nh tọa đ&agrave;m hướng nghiệp cho SV. Việc lấy &yacute; kiến nhận x&eacute;t về kh&oacute;a học được thực hiện h&agrave;ng năm đối với SV năm cuối. Ngo&agrave;i ra, Trung t&acirc;m QHDN&amp;HTSV l&agrave; đầu mối thu thập &yacute; kiến phản hồi từ NH đ&atilde; tốt nghiệp v&agrave; c&aacute;c đơn vị sử dụng lao động về mức độ đ&aacute;p ứng của hoạt động đ&agrave;o tạo của Trường đối với y&ecirc;u cầu c&ocirc;ng việc của c&aacute;c c&ocirc;ng ty, nhu cầu của c&aacute;c BLQ về những kiến thức v&agrave; kỹ năng m&agrave; SV của Trường cần được bồi dưỡng th&ecirc;m để đ&aacute;p ứng y&ecirc;u cầu c&ocirc;ng việc.&nbsp;</p>', '<p>Hệ thống thu thập th&ocirc;ng tin phản hồi c&aacute;c BLQ đến chất lượng CTDH của Trường rất b&agrave;i bản, do cơ quan chủ tr&igrave; l&agrave; Ph&ograve;ng ĐBCL&amp;KT phụ tr&aacute;ch. Do đ&oacute;, kết quả khảo s&aacute;t tương đối kh&aacute;ch quan, trung thực. Nhờ vậy, th&ocirc;ng tin phản hồi được sử dụng để cải tiến CTDH v&agrave; n&acirc;ng cao chất lượng đ&agrave;o tạo.</p>', '<p>Số lượng mẫu khảo s&aacute;t NH đ&atilde; tốt nghiệp v&agrave; nh&agrave; tuyển dụng c&ograve;n hạn chế, dẫn đến th&ocirc;ng tin thu được chưa thể phản &aacute;nh to&agrave;n diện, ở một mức độ n&agrave;o đ&oacute; c&oacute; ảnh hưởng đến việc cập nhật v&agrave; cải tiến CTDH.</p>', '<p>Trong năm học 2021 - 2022, Ph&ograve;ng ĐBCL&amp;KT, Viện NTTS sẽ tổ chức r&agrave; so&aacute;t đối tượng lấy &yacute; kiến; mở rộng c&aacute;c h&igrave;nh thức lấy &yacute; kiến từ c&aacute;c đơn vị tuyển dụng, NH tốt nghiệp (qua email, gửi phiếu điều tra) để thu thập th&ocirc;ng tin phản hồi của c&aacute;c b&ecirc;n li&ecirc;n quan hiệu quả hơn.</p>', 4, NULL, NULL, NULL, NULL, 1, b'1', 3, 41, 11, 3, 15, NULL, '2022-06-09 16:48:46', '2022-06-11 09:22:19'),
(75, '<p class=\"MsoListParagraph\" style=\"margin-top: 1.0pt; text-indent: 1.0cm; line-height: 150%;\">Đối với tất cả c&aacute;c HP của CTĐT ng&agrave;nh NTTS, trước khi tiến h&agrave;nh đưa v&agrave;o sử dụng, Viện NTTS v&agrave; Trường đều bắt đầu bằng việc thiết kế v&agrave; x&acirc;y dựng chương tr&igrave;nh, sau đ&oacute; tiến h&agrave;nh đ&aacute;nh gi&aacute; để nghiệm thu khi đạt y&ecirc;u cầu. Sau khi đưa chương tr&igrave;nh v&agrave;o sử dụng cho hoạt động đ&agrave;o tạo, chương tr&igrave;nh lại tiếp tục được đ&aacute;nh gi&aacute; lại để r&agrave; so&aacute;t những điểm c&ograve;n hạn chế v&agrave; cần khắc phục.&nbsp;</p>', '<p>Việc thiết kế v&agrave; ph&aacute;t triển CTDH ng&agrave;nh NTTS được Trường x&aacute;c lập, đ&aacute;nh gi&aacute; cải tiến định kỳ.</p>', '<p>Việc lấy &yacute; kiến c&aacute;c b&ecirc;n li&ecirc;n quan về quy tr&igrave;nh thiết kế v&agrave; ph&aacute;t triển CTDH chưa được đầy đủ.</p>', '<p>Năm học 2021 - 2022, Viện NTTS tiến h&agrave;nh lấy &yacute; kiến c&aacute;c BLQ để ph&aacute;t triển CTDH đ&aacute;p ứng với nhu cầu ph&aacute;t triển của Trường n&oacute;i chung v&agrave; Ng&agrave;nh NTTS n&oacute;i ri&ecirc;ng.</p>', 4, NULL, NULL, NULL, NULL, 1, b'1', 3, 42, 11, 3, 15, NULL, '2022-06-09 16:49:31', '2022-06-11 09:22:19'),
(76, '<p class=\"default\" style=\"text-indent: 1.0cm; line-height: 143%;\">Tại Trường ĐHNT, c&aacute;c CTĐT thường xuy&ecirc;n được cập nhật, qu&aacute; tr&igrave;nh dạy v&agrave; học thường xuy&ecirc;n kiểm tra v&agrave; gi&aacute;m s&aacute;t để đảm bảo sự tương th&iacute;ch v&agrave; ph&ugrave; hợp với CĐR. Trường đ&atilde; th&agrave;nh th&agrave;nh lập tổ cập nhật CTĐT v&agrave; tổ chuy&ecirc;n gia về chất lượng đ&agrave;o tạo nhằm ho&agrave;n thiện CĐR, nguy&ecirc;n tắc thiết kế CTĐT, nguy&ecirc;n tắc bi&ecirc;n soạn CTĐT v&agrave; đề xuất c&aacute;c phương ph&aacute;p đ&aacute;nh gi&aacute; ph&ugrave; hợp với đ&agrave;o tạo t&iacute;n chỉ.&nbsp;</p>', '<p>Qu&aacute; tr&igrave;nh dạy - học v&agrave; việc đ&aacute;nh gi&aacute; KQHT của NH được quan t&acirc;m r&agrave; so&aacute;t, cải tiến thường xuy&ecirc;n, tương th&iacute;ch v&agrave; ph&ugrave; hợp với CĐR.</p>', '<p>Mức độ đạt được CĐR của một số HP trong chương tr&igrave;nh chưa đo lường được ch&iacute;nh x&aacute;c.&nbsp;</p>', '<p>Từ năm học 2021-2022, Viện NTTS v&agrave; c&aacute;c BM tiếp tục r&agrave; so&aacute;t c&aacute;c phương thức được d&ugrave;ng để đ&aacute;nh gi&aacute; CĐR cho c&aacute;c HP trong CTĐT ng&agrave;nh NTTS, điều chỉnh cho ph&ugrave; hợp để việc đ&aacute;nh gi&aacute; KQHT của NH b&aacute;m s&aacute;t CĐR của HP.&nbsp;</p>', 4, NULL, NULL, NULL, NULL, 1, b'1', 3, 43, 11, 3, 15, NULL, '2022-06-09 16:50:00', '2022-06-11 09:22:19'),
(77, '<p>Đối với ng&agrave;nh NTTS l&yacute; thuyết v&agrave; TH lu&ocirc;n đi song h&agrave;nh c&ugrave;ng nhau, đặc biệt những kiến thức l&yacute; thuyết được t&iacute;ch lũy từ những nghi&ecirc;n cứu thực tế c&agrave;ng trở l&ecirc;n qu&yacute; b&aacute;u v&agrave; được NH tiếp thu, vận dụng hiệu quả hơn rất nhiều so với những kiến thức l&yacute; thuyết t&iacute;ch lũy tr&ecirc;n c&aacute;c t&agrave;i liệu tham khảo. Một trong những c&aacute;ch hiệu quả nhất để t&iacute;ch lũy những kiến thức qu&yacute; b&aacute;u n&agrave;y l&agrave; việc ph&aacute;t triển c&aacute;c NCKH của GV, sử dụng kết quả NCKH vận dụng v&agrave;o b&agrave;i giảng của GV. Mặt kh&aacute;c, đẩy mạnh việc khuyến kh&iacute;ch SV thực hiện NCKH cũng l&agrave; c&aacute;ch ph&aacute;t triển to&agrave;n diện cho SV từ l&yacute; thuyết đến thực tế. &Yacute; thức được điều n&agrave;y, Trường đ&atilde; định hướng ph&aacute;t triển KHCN v&agrave; &aacute;p dụng KHCN v&agrave;o GD đ&atilde; được n&ecirc;u r&otilde; trong Chiến lược ph&aacute;t triển chung của Trường. Trường c&oacute; những quy định cụ thể bằng văn bản để hướng dẫn, khuyến kh&iacute;ch SV thực hiện NCKH, SV l&agrave;m chủ nhiệm đề t&agrave;i v&agrave; GV c&oacute; chuy&ecirc;n m&ocirc;n về lĩnh vực nghi&ecirc;n cứu l&agrave;m GV hướng dẫn. Để thực hiện điều n&agrave;y, trong nhiều năm qua Viện NTTS đ&atilde; khuyến kh&iacute;ch GV ph&aacute;t triển NCKH c&aacute;c cấp v&agrave; c&aacute;c kết quả trong NCKH được vận dụng linh hoạt v&agrave;o c&aacute;c b&agrave;i giảng hoặc mời SV tham gia c&ugrave;ng thực hiện NCKH v&agrave; trở th&agrave;nh th&agrave;nh vi&ecirc;n của đề t&agrave;i. Số lượng SV l&agrave;m chủ nhiệm đề t&agrave;i gia tăng nhanh ch&oacute;ng trong những năm gần đ&acirc;y 2019 v&agrave; 2020, tổng số lượng SV Viện NTTS tham gia l&agrave;m chủ nhiệm đề t&agrave;i năm 2019 l&agrave; 7/27 chiếm 25,9% so với to&agrave;n trường, số liệu n&agrave;y năm 2020 l&agrave; 15,22%.</p>', '<p>Hoạt động NCKH của GV v&agrave; SV được quan t&acirc;m v&agrave; đ&atilde; c&oacute; nhiều đề t&agrave;i được thực hiện. Kết quả NCKH về chuy&ecirc;n m&ocirc;n đ&atilde; được đ&uacute;c kết v&agrave; đưa v&agrave;o t&agrave;i liệu tham khảo, gi&aacute;o tr&igrave;nh, b&agrave;i giảng để phục vụ hoạt động dạy &ndash; học.</p>', '<p>Hoạt động NCKH của GV v&agrave; SV được quan t&acirc;m v&agrave; đ&atilde; c&oacute; nhiều đề t&agrave;i được thực hiện. Kết quả NCKH về chuy&ecirc;n m&ocirc;n đ&atilde; được đ&uacute;c kết v&agrave; đưa v&agrave;o t&agrave;i liệu tham khảo, gi&aacute;o tr&igrave;nh, b&agrave;i giảng để phục vụ hoạt động dạy &ndash; học.</p>', '<p>Năm 2021, Trường thực hiện kế hoạch đơn giản h&oacute;a thủ tục h&agrave;nh ch&iacute;nh cho c&aacute;c NCKH do SV l&agrave;m chủ nhiệm.</p>', 5, NULL, NULL, NULL, NULL, 1, b'1', 3, 44, 11, 3, 15, NULL, '2022-06-09 16:50:30', '2022-06-11 09:22:19'),
(78, '<p>Trường đ&atilde; thiết lập hệ thống thu thập th&ocirc;ng tin phản hồi từ NH v&agrave; c&aacute;c b&ecirc;n li&ecirc;n quan. NH c&oacute; thể phản &aacute;nh &yacute; kiến trực tiếp với đơn vị quản l&yacute; c&aacute;c hoạt động dịch vụ hoặc th&ocirc;ng qua c&aacute;c buổi ch&agrave;o cờ SV, đối thoại SV hoặc th&ocirc;ng qua k&ecirc;nh CVHT/b&aacute;o c&aacute;o c&ocirc;ng t&aacute;c SV h&agrave;ng th&aacute;ng, cũng như th&ocirc;ng qua kết quả thu thập th&ocirc;ng tin phản hồi của SV năm cuối với c&aacute;c dịch vụ hỗ trợ như Thư viện, PTN, hệ thống CNTT v&agrave; c&aacute;c dịch vụ hỗ trợ kh&aacute;c.</p>', '<p>Trường c&oacute; đầy đủ cơ sở vật chất, dịch vụ hỗ trợ phục vụ cho hoạt động dạy-học, NCKH v&agrave; c&aacute;c tiện &iacute;ch phong ph&uacute; v&agrave; đa dạng, thường xuy&ecirc;n được cập nhật v&agrave; cải tiến. Chất lượng của c&aacute;c dịch vụ hỗ trợ ng&agrave;y c&agrave;ng được n&acirc;ng cao tr&ecirc;n cơ sở tiếp nhận c&aacute;c &yacute; kiến phản hồi của c&aacute;c b&ecirc;n li&ecirc;n quan.</p>', '<p>Một số th&ocirc;ng tin phản hồi về chất lượng dịch vụ chưa được giải quyết một c&aacute;ch nhanh ch&oacute;ng, đặc biệt l&agrave; c&aacute;c sự cố về đường truyền wifi.</p>', '<p>Từ năm 2021, Trường giao cho Tổ CNTT nghi&ecirc;n cứu c&aacute;ch cấp quyền truy cập wifi để c&oacute; thể kiểm so&aacute;t lượng truy cập mạng, gi&uacute;p cho việc sử dụng mạng wifi phục vụ hiệu quả việc học v&agrave; nghi&ecirc;n cứu cho GV v&agrave; SV trong trường.</p>', 4, NULL, NULL, NULL, NULL, 1, b'1', 3, 45, 11, 3, 15, NULL, '2022-06-09 16:51:00', '2022-06-11 09:22:19'),
(79, '<p>Cơ chế phản hồi c&aacute;c b&ecirc;n li&ecirc;n quan tại Trường được thực hiện c&oacute; hệ thống. Trường đ&atilde; ban h&agrave;nh c&aacute;c quy định lấy &yacute; kiến phản hồi c&aacute;c b&ecirc;n li&ecirc;n quan. Ph&ograve;ng ĐBCL&amp;KT l&agrave; đơn vị chịu tr&aacute;ch nhiệm quản l&yacute; chung hoạt động lấy &yacute; kiến c&aacute;c b&ecirc;n li&ecirc;n quan trong to&agrave;n trường v&agrave; thực hiện lấy &yacute; kiến phản hồi của SV về hoạt động GD cuối mỗi HK, lấy &yacute; kiến của SV năm cuối v&agrave;o cuối năm học. Ph&ograve;ng CTCT&amp;SV thực hiện lấy &yacute; kiến SV về đội ngũ CVHT v&agrave;o cuối năm học v&agrave; chủ tr&igrave; họp giao ban c&ocirc;ng t&aacute;c SV h&agrave;ng th&aacute;ng. Trung t&acirc;m QHDN&amp;HTSV thực hiện khảo s&aacute;t SV tốt nghiệp, khảo s&aacute;t doanh nghiệp về chất lượng SV tốt nghiệp v&agrave; nhu cầu tuyển dụng. Ph&ograve;ng TCHC tập hợp &yacute; kiến tại c&aacute;c buổi đối thoại giữa Hiệu trưởng v&agrave; CBVC được tổ chức định kỳ 6 th&aacute;ng/lần. Mọi SV, VC, người lao động trong Trường c&ograve;n c&oacute; thể gửi &yacute; kiến v&agrave;o hộp thư g&oacute;p &yacute; chung hoặc gửi thư điện tử trực tiếp cho Hiệu trưởng v&agrave; c&aacute;c đơn vị quản l&yacute;. Kết quả lấy &yacute; kiến phản hồi từ c&aacute;c b&ecirc;n li&ecirc;n quan đều được tổng hợp, ph&acirc;n t&iacute;ch l&agrave;m cơ sở điều chỉnh CTĐT.</p>', '<p>Cơ chế phản hồi của c&aacute;c b&ecirc;n li&ecirc;n quan đ&atilde; được thiết lập c&oacute; t&iacute;nh hệ thống, được thực hiện định kỳ v&agrave; li&ecirc;n tục được cải tiến.</p>', '<p>Vẫn c&ograve;n một số đối tượng v&agrave; hoạt động của Trường chưa được khảo s&aacute;t.</p>', '<p>Từ HK II, năm học 2020 - 2021, Trường sẽ thực hiện khảo s&aacute;t th&ecirc;m về đối tượng vi&ecirc;n chức h&agrave;nh ch&iacute;nh v&agrave; một số hoạt động của Trường.</p>', 5, NULL, NULL, NULL, NULL, 1, b'1', 3, 46, 11, 3, 15, NULL, '2022-06-09 16:51:32', '2022-06-11 09:22:19');
INSERT INTO `bao_caos` (`id`, `moTa`, `diemManh`, `diemTonTai`, `keHoachHanhDong`, `diemTDG`, `moDau`, `ketLuan`, `tongSoTC`, `soTCDat`, `trangThai`, `congKhai`, `nganh_id`, `tieuChi_id`, `tieuChuan_id`, `dotDanhGia_id`, `nguoiDung_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(80, NULL, NULL, NULL, NULL, NULL, '<p>L&agrave; một trong những ti&ecirc;u ch&iacute; quan trọng đ&aacute;nh gi&aacute; chất lượng của hoạt động ĐTĐH, kết quả đầu ra l&agrave; sản phẩm cuối c&ugrave;ng của qu&aacute; tr&igrave;nh đ&agrave;o tạo. Kết quả đầu ra l&agrave; cơ sở để đ&aacute;nh gi&aacute; hiệu quả của CTĐT v&agrave; khả năng đ&aacute;p ứng nhu cầu x&atilde; hội của ng&agrave;nh đ&agrave;o tạo. Do đ&oacute; Trường v&agrave; Viện NTTS lu&ocirc;n quan t&acirc;m, gi&aacute;m s&aacute;t chặt chẽ qu&aacute; tr&igrave;nh đ&agrave;o tạo, để c&oacute; những đ&aacute;nh gi&aacute;, so s&aacute;nh ch&iacute;nh x&aacute;c hiệu quả đ&agrave;o tạo, qua đ&oacute; điều chỉnh, bổ sung những bất cập trong qu&aacute; tr&igrave;nh đ&agrave;o tạo cho ph&ugrave; hợp. Để c&oacute; thể đ&aacute;nh gi&aacute; ch&iacute;nh x&aacute;c kết quả đầu ra của qu&aacute; tr&igrave;nh đ&agrave;o tạo, việc xem x&eacute;t c&aacute;c yếu tố li&ecirc;n quan như: tỷ lệ th&ocirc;i học, tốt nghiệp; thời gian tốt nghiệp trung b&igrave;nh; loại h&igrave;nh v&agrave; số lượng c&aacute;c hoạt động NCKH của NH cũng như tỷ lệ NH c&oacute; việc l&agrave;m sau khi tốt nghiệp v&agrave; khả năng đ&aacute;p ứng nhu cầu c&ocirc;ng việc cần phải được ch&uacute; trọng v&agrave; tiến h&agrave;nh thường xuy&ecirc;n. Việc đ&aacute;nh gi&aacute; ch&iacute;nh x&aacute;c những điểm mạnh, điểm tồn tại của mỗi ti&ecirc;u ch&iacute; l&agrave; rất cần thiết để Viện NTTS v&agrave; c&aacute;c BM chuy&ecirc;n ng&agrave;nh x&acirc;y dựng kế hoạch h&agrave;nh động ph&ugrave; hợp với nhu cầu thực tiễn của NH v&agrave; x&atilde; hội trong khi vẫn ĐBCL hoạt động đ&agrave;o tạo ng&agrave;nh NTTS.</p>', '<p>C&aacute;c hoạt động gi&aacute;m s&aacute;t, th&ocirc;ng b&aacute;o, cảnh b&aacute;o NH tại Trường diễn ra thường xuy&ecirc;n, kịp thời, với sự hỗ trợ của đội ngũ CVHT v&agrave; Ph&ograve;ng CTCT&amp;SV. Thời gian tốt nghiệp trung b&igrave;nh của NH được x&aacute;c lập v&agrave; gi&aacute;m s&aacute;t, qua đ&oacute; c&oacute; những điều chỉnh để cải tiến chất lượng đ&agrave;o tạo. Trong những năm gần đ&acirc;y, số lượng NH đăng k&yacute; c&aacute;c đề t&agrave;i NCKH cấp Trường v&agrave; tham gia c&aacute;c đề t&agrave;i NCKH c&aacute;c cấp đ&atilde; tăng l&ecirc;n. Viện NTTS cũng đ&atilde; t&iacute;ch cực t&igrave;m kiếm c&aacute;c nguồn t&agrave;i trợ từ c&aacute;c c&ocirc;ng ty, doanh nghiệp hoạt động trong lĩnh vực NTTS nhằm khuyến kh&iacute;ch NH năng động đăng k&yacute; đề t&agrave;i NCKH v&agrave; tham gia c&aacute;c hội thảo KH chuy&ecirc;n ng&agrave;nh. H&agrave;ng năm, số lượng SV ng&agrave;nh NTTS sau khi tốt nghiệp lu&ocirc;n thấp hơn nhu cầu sử dụng lao động của c&aacute;c doanh nghiệp, cơ sở li&ecirc;n quan đến NTTS. Viện NTTS cũng đ&atilde; k&yacute; kết nhiều hợp t&aacute;c với c&aacute;c c&ocirc;ng ty, doanh nghiệp về NTTS lớn trong cả nước để đảm bảo việc l&agrave;m cho SV sau khi tốt nghiệp. Tỷ lệ c&oacute; việc l&agrave;m của SV tốt nghiệp ng&agrave;nh NTTS lu&ocirc;n đạt tr&ecirc;n 92% v&agrave; cao nhất to&agrave;n Trường. Mức độ h&agrave;i l&ograve;ng của c&aacute;c b&ecirc;n li&ecirc;n quan như NH, cựu SV, doanh nghiệp, nh&agrave; tuyển dụng thường xuy&ecirc;n được x&aacute;c lập, gi&aacute;m s&aacute;t v&agrave; đối s&aacute;nh để l&agrave;m căn cứ cải tiến chất lượng đ&agrave;o tạo, đ&aacute;p ứng nhu cầu thực tiễn của x&atilde; hội. Mặc d&ugrave; vậy, việc đối s&aacute;nh c&aacute;c dữ liệu với c&aacute;c trường c&oacute; đ&agrave;o tạo về NTTS c&oacute; thế mạnh trong nước chưa được thực hiện triệt để, l&agrave;m căn cứ cải tiến chất lượng.</p>', 5, 5, 1, b'1', 3, 62, 12, 3, 15, NULL, '2022-06-09 16:52:04', '2022-06-11 09:26:43'),
(81, '<p>Tỷ lệ th&ocirc;i học, tốt nghiệp của SV được x&aacute;c lập, gi&aacute;m s&aacute;t v&agrave; đối s&aacute;nh để cải tiến chất lượng theo kế hoạch năm học chung của to&agrave;n trường n&oacute;i chung v&agrave; của Viện NTTS n&oacute;i ri&ecirc;ng. Viện v&agrave; c&aacute;c BM tạo mọi điều kiện để SV học tập c&oacute; chất lượng, c&ugrave;ng với sự quan t&acirc;m v&agrave; hỗ trợ tốt nhất n&ecirc;n theo số liệu thống k&ecirc; trong 5 năm gần đ&acirc;y, kh&ocirc;ng c&oacute; SV n&agrave;o của ng&agrave;nh NTTS bị buộc th&ocirc;i học do vi phạm c&aacute;c quy chế đ&agrave;o tạo. Một số SV, chủ yếu SV năm thứ nhất xin chuyển sang c&aacute;c Khoa Viện kh&aacute;c hoặc bỏ học v&igrave; l&iacute; do c&aacute; nh&acirc;n. Tỷ lệ SV th&ocirc;i học, tốt nghiệp được gi&aacute;m s&aacute;t qua số liệu thống k&ecirc; của Ph&ograve;ng ĐTĐH v&agrave; Ph&ograve;ng CTCT&amp;SV. V&agrave;o đầu mỗi HK, c&aacute;c SV c&oacute; KQHT v&agrave; r&egrave;n luyện đạt loại kh&aacute; trở l&ecirc;n v&agrave; đạt loại k&eacute;m được CVHT th&ocirc;ng b&aacute;o đến gia đ&igrave;nh SV qua đường bưu điện. Đồng thời, c&aacute;c SV thuộc diện cảnh b&aacute;o KQHT, bị buộc th&ocirc;i học v&agrave; dự kiến x&oacute;a t&ecirc;n được CVHT th&ocirc;ng b&aacute;o trực tiếp đến bản th&acirc;n SV. SV n&agrave;o c&oacute; nguyện vọng muốn xin học lại c&oacute; đơn v&agrave; bản cam kết, được CVHT, BM v&agrave; Viện x&aacute;c nhận v&agrave; Trường xem x&eacute;t cho học lại.&nbsp;</p>', '<p>Hoạt động đ&aacute;nh gi&aacute; v&agrave; gi&aacute;m s&aacute;t tỷ lệ th&ocirc;i học, tốt nghiệp của SV được thực hiện chặt chẽ, thường xuy&ecirc;n v&agrave; được đối chiếu, so s&aacute;nh với c&aacute;c năm học trước, kh&oacute;a trước l&agrave;m cơ sở để Trường c&oacute; giải ph&aacute;p cải thiện t&igrave;nh h&igrave;nh SV bỏ học v&agrave; bị buộc th&ocirc;i học, đồng thời định hướng thay đổi, điều chỉnh CTĐT cho ph&ugrave; hợp nhằm đ&aacute;p ứng nhu cầu ng&agrave;y c&agrave;ng cao của x&atilde; hội.&nbsp;</p>', '<p>Số liệu chưa được ph&acirc;n t&iacute;ch, đối chiếu triệt để tỷ lệ th&ocirc;i học, tốt nghiệp giữa c&aacute;c trường c&oacute; đ&agrave;o tạo ng&agrave;nh NTTS để l&agrave;m căn cứ cải tiến chất lượng cũng như đề xuất c&aacute;c biện ph&aacute;p khả thi để hỗ trợ NH tốt nghiệp đ&uacute;ng hạn v&agrave; đạt tỷ lệ cao hơn.</p>', '<p>Định kỳ h&agrave;ng năm, Ph&ograve;ng ĐTĐH, Ph&ograve;ng C&ocirc;ng t&aacute;c ch&iacute;nh trị v&agrave; SV v&agrave; BM sử dụng triệt để số liệu tổng hợp về tỷ lệ th&ocirc;i học, tốt nghiệp để đối chiếu giữa c&aacute;c trường c&oacute; đ&agrave;o tạo ng&agrave;nh NTTS nhằm l&agrave;m căn cứ cải tiến chất lượng v&agrave; từ đ&oacute; đề xuất c&aacute;c biện ph&aacute;p khả thi để hỗ trợ NH tốt nghiệp đ&uacute;ng hạn v&agrave; đạt tỷ lệ cao hơn.</p>', 4, NULL, NULL, NULL, NULL, 1, b'1', 3, 47, 12, 3, 15, NULL, '2022-06-09 16:52:29', '2022-06-11 09:22:19'),
(82, '<p>Thời gian tốt nghiệp trung b&igrave;nh của SV ng&agrave;nh NTTS được x&aacute;c lập, gi&aacute;m s&aacute;t v&agrave; đối chiếu th&ocirc;ng qua việc &aacute;p dụng Quy chế đ&agrave;o tạo theo h&igrave;nh thức t&iacute;n chỉ. Theo quy chế n&agrave;y, thời gian th&ocirc;ng thường để SV tốt nghiệp l&agrave; 4 năm, trong những trường hợp đặc biệt, SV c&oacute; thể chủ động lập kế hoạch học vượt để ho&agrave;n th&agrave;nh tốt nghiệp trước hạn (3 - 3,5 năm) hoặc gia hạn để k&eacute;o d&agrave;i thời gian tốt nghiệp nhưng kh&ocirc;ng qu&aacute; 8 năm để ho&agrave;n th&agrave;nh CTĐT. Theo đ&aacute;nh gi&aacute;, đối với ng&agrave;nh kỹ thuật như NTTS th&igrave; thời gian tốt nghiệp 4 năm l&agrave; hợp l&yacute; v&agrave; theo số liệu thống k&ecirc; 5 năm gần đ&acirc;y, hầu hết SV c&oacute; học lực từ trung b&igrave;nh kh&aacute; trở l&ecirc;n đều c&oacute; thể tốt nghiệp đ&uacute;ng thời hạn 4 năm. Thống k&ecirc; tỷ lệ SV tốt nghiệp đ&uacute;ng hạn được đối s&aacute;nh với c&aacute;c ng&agrave;nh kh&aacute;c v&agrave; đối với to&agrave;n trường. B&ecirc;n cạnh đ&oacute;, một v&agrave;i SV vẫn c&oacute; thể ho&agrave;n th&agrave;nh CTĐT ng&agrave;nh NTTS trước thời hạn được thể hiện th&ocirc;ng qua danh s&aacute;ch cung cấp từ Ph&ograve;ng ĐTĐH. <a class=\"is-minhchung\" style=\"color: #000; font-weight: bold; text-decoration: none;\" href=\"/minhchung/detailTP/16\" target=\"_blank\" rel=\"nofollow noopener\">[Minh chứng gộp]</a> Số SV ho&agrave;n th&agrave;nh chương tr&igrave;nh trước thời hạn l&agrave; rất &iacute;t, cho đến nay ng&agrave;nh NTTS chỉ c&oacute; 02 SV kh&oacute;a 55, 02 SV kh&oacute;a 56 v&agrave; 01 SV kh&oacute;a 58, SV n&agrave;y c&oacute; KQHT kh&aacute; v&agrave; đ&atilde; đăng k&yacute; học vượt một số HP để ho&agrave;n th&agrave;nh trước hạn l&agrave; 3 năm.</p>', '<p>Thời gian tốt nghiệp trung b&igrave;nh của SV ng&agrave;nh NTTS được x&aacute;c lập v&agrave; gi&aacute;m s&aacute;t một c&aacute;ch chặt chẽ, thường xuy&ecirc;n v&agrave; bằng phần mềm chuy&ecirc;n dụng. Hầu hết SV ng&agrave;nh NTTS c&oacute; học lực từ loại kh&aacute; trở l&ecirc;n đều tốt nghiệp đ&uacute;ng thời hạn.</p>\r\n<p>Thời gian tốt nghiệp trung b&igrave;nh của NH lu&ocirc;n được x&aacute;c lập, gi&aacute;m s&aacute;t v&agrave; đối s&aacute;nh th&ocirc;ng qua phần mềm quản l&yacute; đ&agrave;o tạo của Trường.</p>', '<p>Chưa ph&acirc;n t&iacute;ch, đối s&aacute;nh triệt để thời gian tốt nghiệp trung b&igrave;nh giữa c&aacute;c trường c&oacute; đ&agrave;o tạo ng&agrave;nh NTTS để l&agrave;m căn cứ cải tiến chất lượng.</p>\r\n<p>Việc thực hiện kế hoạch đ&agrave;o tạo (thời gian tốt nghiệp) chưa được gi&aacute;m s&aacute;t chặt chẽ; việc khai th&aacute;c cơ sở dữ liệu d&ugrave;ng để ph&acirc;n t&iacute;ch c&ograve;n hạn chế n&ecirc;n Viện/BM chưa kịp thời nắm được thời gian tốt nghiệp trung b&igrave;nh thực tế của SV ng&agrave;nh NTTS để đối s&aacute;nh, cải tiến chất lượng, cố vấn v&agrave; hỗ trợ SV đ&uacute;ng l&uacute;c.</p>', '<p>Định kỳ h&agrave;ng năm, Ph&ograve;ng ĐTĐH, CTCT&amp;SV v&agrave; BM sử dụng triệt để số liệu tổng hợp về thời gian tốt nghiệp trung b&igrave;nh để đối s&aacute;nh giữa c&aacute;c trường c&oacute; đ&agrave;o tạo ng&agrave;nh NTTS nhằm l&agrave;m căn cứ cải tiến chất lượng.</p>', 5, NULL, NULL, NULL, NULL, 1, b'1', 3, 48, 12, 3, 15, NULL, '2022-06-09 16:53:15', '2022-06-12 02:25:07'),
(83, '<p>Tỉ lệ SV c&oacute; việc l&agrave;m của Trường sau tốt nghiệp được x&aacute;c lập, gi&aacute;m s&aacute;t v&agrave; đối s&aacute;nh th&ocirc;ng qua nhiều hoạt động của Trường, trong đ&oacute; Trung t&acirc;m QHDN&amp;HTSV chịu tr&aacute;ch nhiệm ch&iacute;nh. Trường đ&atilde; c&oacute; QĐ số 1527 năm 2018 giao cho Trung t&acirc;m QHDN&amp;HTSV l&agrave; đơn vị ch&iacute;nh phối hợp với c&aacute;c khoa/viện thực hiện việc khảo s&aacute;t t&igrave;nh h&igrave;nh việc l&agrave;m v&agrave; thu nhập của SV sau 01 năm ra trường. Việc khảo s&aacute;t được tiến h&agrave;nh định kỳ mỗi 1 năm, nhằm x&acirc;y dựng căn cứ cải tiến chất lượng đ&agrave;o tạo.</p>\r\n<p>Theo kết quả khảo s&aacute;t, tỷ lệ SV ng&agrave;nh NTTS c&oacute; việc l&agrave;m sau khi tốt nghiệp giai đoạn 2016 &ndash; 2020 đạt tr&ecirc;n 92 % (H&igrave;nh 11.1), tương đương những ng&agrave;nh c&oacute; tỷ lệ việc l&agrave;m cao như Kế to&aacute;n, T&agrave;i ch&iacute;nh v&agrave; cao hơn c&aacute;c ng&agrave;nh thủy sản truyền thống như C&ocirc;ng nghệ thực phẩm, C&ocirc;ng nghệ sinh học. Trong năm 2020, tỷ lệ c&oacute; việc l&agrave;m của SV tốt nghiệp to&agrave;n Trường c&oacute; xu hướng giảm mạnh so với năm 2019 do ảnh hưởng của đại dịch Covid, tuy nhi&ecirc;n tỷ lệ c&oacute; việc l&agrave;m của SV ng&agrave;nh NTTS vẫn ổn định ở mức cao hơn so với c&aacute;c ng&agrave;nh kh&aacute;c.</p>\r\n<p>Kết quả việc l&agrave;m của SV ng&agrave;nh NTTS tương đương với tỷ lệ việc l&agrave;m của SV những CSGD c&oacute; đ&agrave;o tạo ng&agrave;nh NTTS tại trường ĐH N&ocirc;ng L&acirc;m th&agrave;nh phố Hồ Ch&iacute; Minh v&agrave; cao hơn so với tỷ lệ c&oacute; việc l&agrave;m của SV Học viện N&ocirc;ng nghiệp Việt Nam. Về cơ cấu việc l&agrave;m, theo kết quả khảo s&aacute;t cựu SV năm 2017 cho thấy SV tốt nghiệp chủ yếu l&agrave;m trong cơ quan nh&agrave; nước v&agrave; c&aacute;c doanh nghiệp c&oacute; vốn đầu tư nước ngo&agrave;i v&agrave; doanh nghiệp tư nh&acirc;n Việt Nam với tỷ lệ tương ứng l&agrave; 36,5, 25,6% v&agrave; 26,9%.</p>', '<p>Tỷ lệ SV của Trường n&oacute;i chung v&agrave; ng&agrave;nh NTTS n&oacute;i ri&ecirc;ng c&oacute; việc l&agrave;m sau tốt nghiệp được x&aacute;c lập, gi&aacute;m s&aacute;t v&agrave; đối s&aacute;nh do một Trung t&acirc;m chuy&ecirc;n tr&aacute;ch thực hiện. Trường c&oacute; nhiều hoạt động thiết thực để hỗ trợ SV c&oacute; việc l&agrave;m ngay khi nhận bằng tốt nghiệp. Tỷ lệ SV c&oacute; việc l&agrave;m sau tốt nghiệp của ng&agrave;nh NTTS kh&aacute; cao v&agrave; vị tr&iacute; l&agrave;m việc đa dạng.&nbsp;</p>', '<p>Trường chưa ph&acirc;n t&iacute;ch, đối s&aacute;nh triệt để tỉ lệ SV c&oacute; việc l&agrave;m sau tốt nghiệp giữa c&aacute;c ng&agrave;nh, mức trung b&igrave;nh giữa c&aacute;c trường để l&agrave;m căn cứ cải tiến chất lượng.&nbsp;</p>', '<p>Định kỳ h&agrave;ng năm, Ph&ograve;ng ĐTĐH, Ph&ograve;ng CTCT&amp;SV, Trung t&acirc;m QHDN&amp;HTSV v&agrave; BM tổng hợp số liệu về tỉ lệ SV c&oacute; việc l&agrave;m sau tốt nghiệp để đối s&aacute;nh giữa c&aacute;c ng&agrave;nh, mức trung b&igrave;nh giữa c&aacute;c trường nhằm l&agrave;m căn cứ cải tiến chất lượng.&nbsp;</p>', 5, NULL, NULL, NULL, NULL, 1, b'1', 3, 49, 12, 3, 15, NULL, '2022-06-09 16:53:55', '2022-06-11 09:22:19'),
(84, '<p>Để khuyến kh&iacute;ch v&agrave; hỗ trợ SV tham gia c&ocirc;ng t&aacute;c NCKH, Trường đ&atilde; x&acirc;y dựng Quy định về hoạt động NCKH của NH cũng như cơ chế khuyến kh&iacute;ch NH tham gia hoạt động NCKH. Theo đ&oacute;, SV tham gia NCKH sẽ được hưởng nhiều lợi &iacute;ch như được cấp kinh ph&iacute; nghi&ecirc;n cứu, được đăng b&agrave;i tr&ecirc;n tạp ch&iacute; chuy&ecirc;n ng&agrave;nh, tham dự c&aacute;c hội thảo khoa học d&agrave;nh cho SV, được cấp giấy chứng nhận v&agrave; khen thưởng. C&aacute;c biểu mẫu, qui định hướng dẫn viết thuyết minh, dự to&aacute;n kinh ph&iacute; rất cụ thể v&agrave; chi tiết. Theo kế hoạch hằng năm, ph&ograve;ng KHCN gửi th&ocirc;ng b&aacute;o đăng k&yacute; đề t&agrave;i NCKH d&agrave;nh cho SV đến c&aacute;c Khoa/Viện. Sau đ&oacute;, c&aacute;c SV gửi danh mục đề t&agrave;i để Hội đồng Khoa học &amp; Đ&agrave;o tạo của Khoa/Viện x&eacute;t chọn, ho&agrave;n thiện bản thuyết minh để tiếp tục gửi l&ecirc;n ph&ograve;ng KHCN để x&eacute;t chọn cấp Trường.</p>', '<p>Trường c&oacute; quy định cụ thể, r&otilde; r&agrave;ng v&agrave; chi tiết về hoạt động NCKH của SV. C&aacute;c GV của Viện NTTS lu&ocirc;n nhiệt t&igrave;nh hướng dẫn, hỗ trợ SV tham gia c&ocirc;ng t&aacute;c NCKH. Loại h&igrave;nh nghi&ecirc;n cứu kh&aacute; phong ph&uacute; v&agrave; hầu hết đề t&agrave;i NCKH của SV đều c&oacute; sản phẩm cụ thể v&agrave; mang &yacute; nghĩa khoa học, thực tiễn cao.&nbsp;</p>', '<p>Số lượng đề t&agrave;i chủ yếu tập trung v&agrave;o SV năm cuối, mức kinh ph&iacute; cấp cho c&aacute;c đề t&agrave;i vẫn c&ograve;n thấp. Chưa c&oacute; sự đối s&aacute;nh về loại h&igrave;nh, số lượng NCKH của NH ng&agrave;nh NTTS với c&aacute;c trường kh&aacute;c ở trong nước v&agrave; quốc tế.</p>', '<p>Định kỳ h&agrave;ng năm, Viện NTTS thực hiện đối s&aacute;nh về loại h&igrave;nh v&agrave; số lượng c&aacute;c hoạt động nghi&ecirc;n cứu của SV, đồng thời đề nghị Trường tăng số lượng đề t&agrave;i, kinh ph&iacute; v&agrave; cải thiện kh&acirc;u x&eacute;t duyệt để cải thiện cả về số lượng v&agrave; chất lượng NCKH.</p>', 5, NULL, NULL, NULL, NULL, 1, b'1', 3, 50, 12, 3, 15, NULL, '2022-06-09 16:54:27', '2022-06-11 09:22:19'),
(85, '<p>Sau mỗi HK, Ph&ograve;ng ĐBCL&amp;KT tổ chức lấy &yacute; kiến phản hồi của NH về hoạt động GD của GV trong to&agrave;n trường. Mức độ h&agrave;i l&ograve;ng của NH đối với hoạt động GD của GV được thể hiện qua kết quả xếp loại GV dựa tr&ecirc;n phiếu đ&aacute;nh gi&aacute; của NH. C&aacute;c kết quả khảo s&aacute;t được tổng hợp, xử l&yacute; v&agrave; chuyển đến từng GV để điều chỉnh v&agrave; cải tiến chất lượng.</p>\r\n<p>H&agrave;ng năm, Trường tổ chức khảo s&aacute;t nhận x&eacute;t kh&oacute;a học từ NH năm cuối của tất cả c&aacute;c ng&agrave;nh học, trong đ&oacute; c&oacute; ng&agrave;nh NTTS. C&aacute;c nh&oacute;m chỉ ti&ecirc;u khảo s&aacute;t gồm: mục ti&ecirc;u v&agrave; CTĐT, đội ngũ GV, đ&aacute;p ứng của kh&oacute;a học, quản l&yacute; v&agrave; phục vụ đ&agrave;o tạo, điều kiện sinh hoạt, đời sống v&agrave; đ&aacute;nh gi&aacute; chung của SV về chất lượng đ&agrave;o tạo v&agrave; m&ocirc;i trường sống, học tập tại Trường. Kết quả khảo s&aacute;t được tổng hợp, ph&acirc;n t&iacute;ch, mức độ h&agrave;i l&ograve;ng của NH đ&atilde; được x&aacute;c lập v&agrave; đối s&aacute;nh &nbsp;để l&agrave;m cơ sở cải tiến chất lượng đ&agrave;o tạo ng&agrave;nh NTTS.</p>', '<p>Việc lấy &yacute; kiến về mức độ h&agrave;i l&ograve;ng của c&aacute;c b&ecirc;n li&ecirc;n quan (SV, cựu SV, doanh nghiệp, nh&agrave; tuyển dụng&hellip;) lu&ocirc;n được Trường v&agrave; Viện NTTS quan t&acirc;m thực hiện để x&aacute;c lập, gi&aacute;m s&aacute;t, đối s&aacute;nh v&agrave; l&agrave;m cơ sở để cải tiến chất lượng đ&agrave;o tạo, đ&aacute;p ứng nhu cầu thực tiễn của x&atilde; hội.</p>\r\n<p>Nội dung, phương ph&aacute;p lấy &yacute; kiến c&aacute;c b&ecirc;n li&ecirc;n quan phản &aacute;nh đầy đủ, kh&aacute;ch quan về hoạt động được lấy &yacute; kiến.</p>\r\n<p>Th&ocirc;ng tin phản hồi từ c&aacute;c b&ecirc;n li&ecirc;n quan được tiếp thu đầy đủ, xử l&yacute; kh&aacute;ch quan, trung thực v&agrave; tin cậy.</p>', '<p>C&aacute;c &yacute; kiến phản phồi của c&aacute;c b&ecirc;n li&ecirc;n quan được x&aacute;c lập, đối s&aacute;nh nhưng chưa c&oacute; những điều chỉnh kịp thời để cải tiến chất lượng.</p>', '<p>Trong năm học 2020 &ndash; 2021, tổ cập nhật CTĐT của Viện NTTS sẽ dựa tr&ecirc;n c&aacute;c &yacute; kiến phản hồi của c&aacute;c b&ecirc;n li&ecirc;n quan (khảo s&aacute;t trong năm học 2019 &ndash; 2020) để điều chỉnh, cập nhật CTĐT để cải tiến chất lượng đ&agrave;o tạo, đ&aacute;p ứng nhu cầu thực tiến của x&atilde; hội.</p>', 4, NULL, NULL, NULL, NULL, 1, b'1', 3, 51, 12, 3, 15, NULL, '2022-06-09 16:55:08', '2022-06-11 09:22:19'),
(86, '<p>M&ocirc; tả ti&ecirc;u ch&iacute; 1.1</p>', NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, 1, b'1', 1, 2, 2, 1, 5, NULL, '2022-06-11 10:01:42', '2022-06-12 01:29:00');

-- --------------------------------------------------------

--
-- Table structure for table `bao_cao_minh_chungs`
--

CREATE TABLE `bao_cao_minh_chungs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `baoCao_id` int(11) NOT NULL,
  `minhChung_id` int(11) NOT NULL,
  `tieuChuan_id` int(11) NOT NULL,
  `tieuChi_id` int(11) NOT NULL,
  `nganh_id` int(11) NOT NULL,
  `dotDanhGia_id` int(11) NOT NULL,
  `maHMC` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bao_cao_minh_chungs`
--

INSERT INTO `bao_cao_minh_chungs` (`id`, `baoCao_id`, `minhChung_id`, `tieuChuan_id`, `tieuChi_id`, `nganh_id`, `dotDanhGia_id`, `maHMC`, `created_at`, `updated_at`) VALUES
(117, 26, 6, 2, 2, 3, 3, 'H1.01.01.01', '2022-06-12 03:57:18', '2022-06-12 03:57:18'),
(118, 26, 7, 2, 2, 3, 3, 'H1.01.01.02', '2022-06-12 03:57:18', '2022-06-12 03:57:18'),
(119, 26, 8, 2, 2, 3, 3, 'H1.01.01.03', '2022-06-12 03:57:18', '2022-06-12 03:57:18'),
(120, 27, 9, 2, 3, 3, 3, 'H1.01.02.01', '2022-06-12 03:57:18', '2022-06-12 03:57:18'),
(121, 27, 6, 2, 3, 3, 3, 'H1.01.01.01', '2022-06-12 03:57:18', '2022-06-12 03:57:18'),
(122, 27, 6, 2, 3, 3, 3, 'H1.01.01.01', '2022-06-12 03:57:18', '2022-06-12 03:57:18'),
(123, 28, 6, 2, 4, 3, 3, 'H1.01.01.01', '2022-06-12 03:57:18', '2022-06-12 03:57:18'),
(124, 28, 10, 2, 4, 3, 3, 'H1.01.03.01', '2022-06-12 03:57:18', '2022-06-12 03:57:18'),
(125, 28, 11, 2, 4, 3, 3, 'H1.01.03.02', '2022-06-12 03:57:18', '2022-06-12 03:57:18'),
(126, 28, 12, 2, 4, 3, 3, 'H1.01.03.03', '2022-06-12 03:57:18', '2022-06-12 03:57:18'),
(127, 30, 6, 3, 5, 3, 3, 'H1.01.01.01', '2022-06-12 03:57:18', '2022-06-12 03:57:18'),
(128, 30, 13, 3, 5, 3, 3, 'H2.02.01.01', '2022-06-12 03:57:18', '2022-06-12 03:57:18'),
(129, 30, 14, 3, 5, 3, 3, 'H2.02.01.02', '2022-06-12 03:57:18', '2022-06-12 03:57:18'),
(130, 31, 13, 3, 6, 3, 3, 'H2.02.01.01', '2022-06-12 03:57:18', '2022-06-12 03:57:18'),
(131, 31, 14, 3, 6, 3, 3, 'H2.02.01.02', '2022-06-12 03:57:18', '2022-06-12 03:57:18'),
(132, 32, 6, 3, 7, 3, 3, 'H1.01.01.01', '2022-06-12 03:57:18', '2022-06-12 03:57:18'),
(133, 32, 15, 3, 7, 3, 3, 'H2.02.03.01', '2022-06-12 03:57:18', '2022-06-12 03:57:18'),
(134, 34, 6, 4, 8, 3, 3, 'H1.01.01.01', '2022-06-12 03:57:18', '2022-06-12 03:57:18'),
(135, 34, 6, 4, 8, 3, 3, 'H1.01.01.01', '2022-06-12 03:57:18', '2022-06-12 03:57:18'),
(136, 34, 6, 4, 8, 3, 3, 'H1.01.01.01', '2022-06-12 03:57:18', '2022-06-12 03:57:18'),
(137, 35, 6, 4, 9, 3, 3, 'H1.01.01.01', '2022-06-12 03:57:18', '2022-06-12 03:57:18'),
(138, 35, 6, 4, 9, 3, 3, 'H1.01.01.01', '2022-06-12 03:57:18', '2022-06-12 03:57:18'),
(139, 36, 6, 4, 10, 3, 3, 'H1.01.01.01', '2022-06-12 03:57:18', '2022-06-12 03:57:18'),
(140, 82, 16, 12, 48, 3, 3, 'H11.11.02.01', '2022-06-12 03:57:18', '2022-06-12 03:57:18');

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
  `moDau` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ketLuan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `soTCDat` int(11) DEFAULT NULL,
  `nganh_id` int(11) NOT NULL,
  `tieuChi_id` int(11) NOT NULL,
  `tieuChuan_id` int(11) DEFAULT NULL,
  `dotDanhGia_id` int(11) DEFAULT NULL,
  `baoCao_id` int(11) NOT NULL,
  `nguoiDung_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

--
-- Dumping data for table `chi_tiet_minh_chungs`
--

INSERT INTO `chi_tiet_minh_chungs` (`id`, `ten`, `link`, `minhChung_id`, `created_at`, `updated_at`) VALUES
(1, 'Minh chứng thành phần 1', '/storage/minhchungs/5/08-Jun-2022-01-39-test (21).doc', 5, '2022-06-08 06:39:45', '2022-06-08 06:39:45'),
(2, 'Minh chứng thành phần 2', '/storage/minhchungs/5/08-Jun-2022-01-39-test (20).doc', 5, '2022-06-08 06:39:57', '2022-06-08 06:39:57'),
(3, 'Minh chứng thành phần 3', '/storage/minhchungs/5/08-Jun-2022-01-40-test (19).doc', 5, '2022-06-08 06:40:07', '2022-06-08 06:40:07'),
(5, 'Minh chứng thành phần 1', '/storage/minhchungs/5/12-Jun-2022-02-18-08-Jun-2022-02-02-K60_28_CTDT Nuoi trong TS - K60 (2).doc', 16, '2022-06-11 19:18:29', '2022-06-11 19:18:29'),
(6, 'Minh chứng thành phần 2', '/storage/minhchungs/5/12-Jun-2022-02-18-chien-luoc-phat-trien-2020-tam-nhin-2030.pdf', 16, '2022-06-11 19:18:48', '2022-06-11 19:18:48'),
(7, 'Minh chứng thành phần 3', '/storage/minhchungs/5/12-Jun-2022-02-19-blue-and-white-bird-stands-outdoors-within-lush-trees.jpg', 16, '2022-06-11 19:19:58', '2022-06-11 19:19:58');

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
(1, 'Khoa Công nghệ thông tin', '2022-06-01 06:42:15', '2022-06-01 06:42:15', NULL),
(2, 'Phòng Đảm bảo chất lượng và khảo thí', '2022-06-01 06:42:55', '2022-06-01 06:42:55', NULL),
(3, 'Phòng Đào tạo đại học', '2022-06-01 07:06:35', '2022-06-01 07:06:35', NULL),
(4, 'Phòng Tổ chức - Hành chính', '2022-06-01 07:23:32', '2022-06-01 07:23:32', NULL),
(5, 'Phòng Kế hoạch - Hành chính', '2022-06-01 07:23:41', '2022-06-01 07:23:41', NULL),
(6, 'Phòng Khoa Học - Công Nghệ', '2022-06-01 07:29:32', '2022-06-01 07:29:32', NULL),
(7, 'Phòng Công tác chính trị và sinh viên', '2022-06-01 07:33:58', '2022-06-01 07:33:58', NULL),
(8, 'Trung tâm Quan hệ doanh nghiệp và hỗ trợ sinh viên', '2022-06-01 07:36:14', '2022-06-01 07:36:23', NULL),
(9, 'Trung tâm Thí nghiệm và thực hành', '2022-06-01 07:43:42', '2022-06-01 07:43:42', NULL),
(10, 'Trung tâm Phục vụ trường học', '2022-06-01 07:46:45', '2022-06-01 07:46:45', NULL),
(11, 'Thư viện', '2022-06-01 07:48:42', '2022-06-01 07:48:42', NULL),
(12, 'Viện nuôi trồng thủy sản', '2022-06-07 09:37:11', '2022-06-07 09:37:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dot_danh_gias`
--

CREATE TABLE `dot_danh_gias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namHoc` int(11) NOT NULL,
  `trangThai` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dot_danh_gias`
--

INSERT INTO `dot_danh_gias` (`id`, `ten`, `namHoc`, `trangThai`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Đợt đánh giá chương trình đạo tạo khoa công nghệ thông tin', 2022, 0, '2022-06-01 06:46:13', '2022-06-07 07:10:16', NULL),
(3, 'Đợt đánh giá chương trình đạo tạo viện nuôi trồng thủy sản', 2021, 1, '2022-06-07 09:39:16', '2022-06-11 20:56:01', NULL);

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
(1, '2022-06-01 20:45:00', '2022-06-04 20:45:00', 1, 1, '2022-06-01 06:46:13', '2022-06-01 06:46:13'),
(2, '2022-06-05 20:45:00', '2022-06-07 20:45:00', 2, 1, '2022-06-01 06:46:13', '2022-06-01 06:46:13'),
(3, '2022-06-08 20:46:00', '2022-06-11 20:46:00', 3, 1, '2022-06-01 06:46:13', '2022-06-01 06:46:13'),
(4, '2022-06-04 11:22:00', '2022-06-07 11:22:00', 1, 2, '2022-06-03 21:22:41', '2022-06-03 21:22:41'),
(5, '2022-06-08 16:24:00', '2022-06-12 16:24:00', 1, 3, '2022-06-07 09:39:16', '2022-06-11 02:25:03'),
(6, '2022-06-11 16:57:00', '2022-06-14 16:58:00', 1, 1, '2022-06-09 09:45:58', '2022-06-11 02:58:06');

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
(3, 'Phản biện báo cáo', 'phan-bien-bao-cao', NULL, NULL);

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
(28, '2022_05_17_133727_create_minh_chungs_table', 1),
(29, '2022_05_26_094350_create_vai_tro_h_t_s_table', 1),
(30, '2022_05_26_094526_create_nguoi_dung_vai_tro_h_t_s_table', 1),
(31, '2022_05_26_094617_create_quyen_h_t_s_table', 1),
(32, '2022_05_26_094646_create_vai_tro_h_t_quyen_h_t_s_table', 1),
(33, '2022_05_27_104049_create_chi_tiet_minh_chungs_table', 1),
(36, '2014_10_12_000000_create_users_table', 1),
(37, '2014_10_12_100000_create_password_resets_table', 1),
(38, '2019_08_19_000000_create_failed_jobs_table', 1),
(39, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(40, '2022_04_23_103042_create_tieu_chuans_table', 1),
(41, '2022_04_23_174505_create_tieu_chis_table', 1),
(42, '2022_04_24_010926_create_yeu_caus_table', 1),
(43, '2022_04_24_011027_create_moc_chuans_table', 1),
(44, '2022_04_24_011226_create_tu_khoas_table', 1),
(45, '2022_04_24_011311_create_tieu_chi_tu_khoas_table', 1),
(46, '2022_04_24_124251_create_nganhs_table', 1),
(47, '2022_04_24_124309_create_nhoms_table', 1),
(48, '2022_04_24_124638_create_don_vis_table', 1),
(49, '2022_04_24_124747_create_dot_danh_gias_table', 1),
(50, '2022_04_24_124932_create_nganh_dot_danh_gias_table', 1),
(51, '2022_04_25_121709_create_quyen_nhoms_table', 1),
(52, '2022_04_25_122232_create_nhom_quyens_table', 1),
(53, '2022_05_03_125644_create_giai_doans_table', 1),
(54, '2022_05_03_125719_create_hoat_dongs_table', 1),
(55, '2022_05_09_153439_create_bao_caos_table', 1),
(56, '2022_05_11_160450_create_vai_tros_table', 1),
(57, '2022_05_11_160916_create_nhom_nguoi_dungs_table', 1),
(58, '2022_05_11_161044_create_quyen_nguoi_dungs_table', 1),
(59, '2022_05_11_161118_create_nguoi_dung_quyens_table', 1),
(60, '2022_05_15_075004_create_binh_luans_table', 1),
(61, '2022_05_16_131417_add_column_avatar_user', 1),
(62, '2022_05_16_155608_create_bao_cao_sao_luus_table', 1),
(63, '2022_05_17_133727_create_minh_chungs_table', 1),
(64, '2022_05_26_094350_create_vai_tro_h_t_s_table', 1),
(65, '2022_05_26_094526_create_nguoi_dung_vai_tro_h_t_s_table', 1),
(66, '2022_05_26_094617_create_quyen_h_t_s_table', 1),
(67, '2022_05_26_094646_create_vai_tro_h_t_quyen_h_t_s_table', 1),
(68, '2022_05_27_104049_create_chi_tiet_minh_chungs_table', 1),
(69, '2022_06_09_161331_create_bao_cao_minh_chungs_table', 1);

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
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `donVi_id` int(11) NOT NULL,
  `isMCGop` tinyint(1) NOT NULL DEFAULT 0,
  `nguoiDung_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `minh_chungs`
--

INSERT INTO `minh_chungs` (`id`, `ten`, `ngayKhaoSat`, `ngayBanHanh`, `noiBanHanh`, `link`, `donVi_id`, `isMCGop`, `nguoiDung_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, 'CTĐT ngành NTTS (2018)', '2021-01-01', '2018-01-01', 'Đại học Nha Trang', '/storage/minhchungs/5/08-Jun-2022-02-02-K60_28_CTDT Nuoi trong TS - K60.doc', 12, 0, 5, '2022-06-08 07:02:46', '2022-06-08 07:05:50', NULL),
(7, 'Quy định khối lượng kiến thức tối thiểu', '2021-01-01', '2015-01-07', 'Bộ GD&ĐT', '/storage/minhchungs/5/08-Jun-2022-02-05-07_2015_TT-BGDDT_8022.doc', 3, 0, 5, '2022-06-08 07:05:39', '2022-06-08 07:05:39', NULL),
(8, 'Mục tiêu của trường', '2021-01-01', '2020-01-01', 'Đại học Nha Trang', '/storage/minhchungs/5/08-Jun-2022-02-07-chien-luoc-phat-trien-2020-tam-nhin-2030.pdf', 3, 0, 5, '2022-06-08 07:07:37', '2022-06-08 07:07:37', NULL),
(9, 'Chuẩn đầu ra CTĐT ngành NTTS', '2021-01-01', '2011-01-01', 'Đại học Nha Trang', '/storage/minhchungs/5/08-Jun-2022-02-30-chien-luoc-phat-trien-2020-tam-nhin-2030.pdf', 3, 0, 5, '2022-06-08 07:30:25', '2022-06-08 07:30:25', NULL),
(10, 'Thành lập Ban Chủ nhiệm CTĐT ngành NTTS', '2021-01-01', '2019-01-01', 'Đại học Nha Trang', '/storage/minhchungs/5/08-Jun-2022-02-36-K60_28_CTDT Nuoi trong TS - K60.doc', 3, 0, 5, '2022-06-08 07:36:10', '2022-06-08 07:36:10', NULL),
(11, 'Phiếu khảo sát các bên liên quan phục vụ cập nhật CĐR', '2021-01-01', '2020-01-01', 'BCN CTĐT ngành NTTS', '/storage/minhchungs/5/08-Jun-2022-02-37-07_2015_TT-BGDDT_8022.doc', 12, 0, 5, '2022-06-08 07:37:08', '2022-06-08 07:37:08', NULL),
(12, 'Biên bản hội nghị lấy ý kiến các bên liên quan phục vụ cập nhật CTĐT (có CĐR)', '2021-01-01', '2020-01-01', 'BCN CTĐT ngành NTTS', '/storage/minhchungs/5/08-Jun-2022-02-37-chien-luoc-phat-trien-2020-tam-nhin-2030.pdf', 12, 0, 5, '2022-06-08 07:37:36', '2022-06-08 07:37:36', NULL),
(13, 'Quy định/quy trình xây dựng CTĐT và Quy định về tiêu chuẩn đánh giá chất lượng CTĐT', '2021-01-01', '2016-01-01', 'Bộ GD&ĐT', '/storage/minhchungs/5/08-Jun-2022-02-43-07_2015_TT-BGDDT_8022.doc', 3, 0, 5, '2022-06-08 07:43:35', '2022-06-08 07:43:35', NULL),
(14, 'Giao quản lý ngành đào tạo', '2021-01-02', '2018-01-01', 'Đại học Nha Trang', '/storage/minhchungs/5/08-Jun-2022-02-44-chien-luoc-phat-trien-2020-tam-nhin-2030.pdf', 3, 0, 5, '2022-06-08 07:44:29', '2022-06-08 07:44:40', NULL),
(15, 'Công bố CTĐT ngành NTTS trên website đơn vị', '2021-01-01', '2020-01-01', 'Đại học Nha Trang', '/storage/minhchungs/5/08-Jun-2022-02-50-K60_28_CTDT Nuoi trong TS - K60.doc', 12, 0, 5, '2022-06-08 07:50:59', '2022-06-08 07:50:59', NULL),
(16, 'Minh chứng gộp', '2020-01-01', '2019-01-01', 'Đại học Nha Trang', NULL, 6, 1, 5, '2022-06-11 19:17:47', '2022-06-11 19:17:47', NULL);

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
(1, 'Công nghệ thông tin', 1, '2022-06-01 06:44:52', '2022-06-01 06:44:52', NULL),
(2, 'Hệ thống thông tin quản lý', 1, '2022-06-01 06:46:29', '2022-06-01 06:46:29', NULL),
(3, 'Nuôi trồng thủy sản', 12, '2022-06-07 09:37:36', '2022-06-07 09:37:36', NULL);

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
(1, 1, 1, '2022-06-01 06:46:13', '2022-06-01 06:46:13'),
(2, 2, 1, '2022-06-01 06:46:35', '2022-06-01 06:46:35'),
(4, 3, 3, '2022-06-07 09:39:16', '2022-06-07 09:39:16');

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
(3, 6, 1, 13, '2022-06-05 05:50:32', '2022-06-05 05:50:32'),
(4, 6, 1, 14, '2022-06-05 05:50:32', '2022-06-05 05:50:32'),
(8, 6, 2, 9, '2022-06-06 04:40:52', '2022-06-06 04:40:52'),
(9, 6, 2, 10, '2022-06-06 04:40:52', '2022-06-06 04:40:52'),
(10, 1, 2, 11, '2022-06-06 04:43:59', '2022-06-06 04:43:59'),
(11, 1, 2, 12, '2022-06-06 04:43:59', '2022-06-06 04:43:59'),
(12, 1, 2, 10, '2022-06-06 04:43:59', '2022-06-06 04:43:59'),
(13, 6, 3, 17, '2022-06-06 05:36:40', '2022-06-06 05:36:40'),
(14, 6, 3, 18, '2022-06-06 05:36:40', '2022-06-06 05:36:40'),
(15, 35, 1, 25, '2022-06-08 07:17:01', '2022-06-08 07:17:01'),
(16, 35, 1, 26, '2022-06-08 07:17:01', '2022-06-08 07:17:01'),
(17, 35, 1, 27, '2022-06-08 08:11:39', '2022-06-08 08:11:39'),
(18, 35, 1, 28, '2022-06-08 08:11:39', '2022-06-08 08:11:39'),
(19, 35, 1, 29, '2022-06-08 08:11:39', '2022-06-08 08:11:39'),
(20, 35, 1, 30, '2022-06-08 08:11:39', '2022-06-08 08:11:39'),
(21, 36, 1, 31, '2022-06-08 08:11:58', '2022-06-08 08:11:58'),
(22, 36, 1, 32, '2022-06-08 08:11:58', '2022-06-08 08:11:58'),
(23, 36, 1, 33, '2022-06-08 08:11:58', '2022-06-08 08:11:58'),
(24, 36, 1, 34, '2022-06-08 08:11:58', '2022-06-08 08:11:58'),
(25, 36, 1, 35, '2022-06-08 08:11:58', '2022-06-08 08:11:58'),
(26, 36, 1, 36, '2022-06-08 08:11:58', '2022-06-08 08:11:58'),
(27, 35, 1, 37, '2022-06-08 08:24:52', '2022-06-08 08:24:52'),
(28, 35, 1, 38, '2022-06-08 08:24:52', '2022-06-08 08:24:52'),
(29, 36, 1, 39, '2022-06-08 08:25:03', '2022-06-08 08:25:03'),
(30, 36, 1, 40, '2022-06-08 08:25:03', '2022-06-08 08:25:03'),
(31, 38, 1, 41, '2022-06-08 09:16:03', '2022-06-08 09:16:03'),
(32, 38, 1, 42, '2022-06-08 09:16:03', '2022-06-08 09:16:03'),
(33, 38, 1, 43, '2022-06-08 09:16:03', '2022-06-08 09:16:03'),
(34, 38, 1, 44, '2022-06-08 09:16:03', '2022-06-08 09:16:03'),
(35, 38, 1, 45, '2022-06-08 09:16:03', '2022-06-08 09:16:03'),
(36, 38, 1, 46, '2022-06-08 09:16:03', '2022-06-08 09:16:03'),
(37, 38, 1, 55, '2022-06-08 09:16:03', '2022-06-08 09:16:03'),
(38, 38, 1, 56, '2022-06-08 09:16:03', '2022-06-08 09:16:03'),
(39, 38, 1, 57, '2022-06-08 09:16:03', '2022-06-08 09:16:03'),
(40, 38, 1, 58, '2022-06-08 09:16:03', '2022-06-08 09:16:03'),
(41, 38, 1, 59, '2022-06-08 09:16:03', '2022-06-08 09:16:03'),
(42, 38, 1, 60, '2022-06-08 09:16:03', '2022-06-08 09:16:03'),
(43, 37, 1, 47, '2022-06-08 09:16:55', '2022-06-08 09:16:55'),
(44, 37, 1, 48, '2022-06-08 09:16:55', '2022-06-08 09:16:55'),
(45, 37, 1, 49, '2022-06-08 09:16:55', '2022-06-08 09:16:55'),
(46, 37, 1, 50, '2022-06-08 09:16:55', '2022-06-08 09:16:55'),
(47, 37, 1, 51, '2022-06-08 09:16:55', '2022-06-08 09:16:55'),
(48, 37, 1, 52, '2022-06-08 09:16:55', '2022-06-08 09:16:55'),
(49, 37, 1, 53, '2022-06-08 09:16:55', '2022-06-08 09:16:55'),
(50, 37, 1, 54, '2022-06-08 09:16:55', '2022-06-08 09:16:55'),
(51, 37, 1, 61, '2022-06-08 09:16:55', '2022-06-08 09:16:55'),
(52, 37, 1, 62, '2022-06-08 09:16:55', '2022-06-08 09:16:55'),
(53, 37, 1, 63, '2022-06-08 09:16:55', '2022-06-08 09:16:55'),
(54, 37, 1, 64, '2022-06-08 09:16:55', '2022-06-08 09:16:55'),
(55, 37, 1, 65, '2022-06-08 09:16:55', '2022-06-08 09:16:55'),
(56, 37, 1, 66, '2022-06-08 09:16:55', '2022-06-08 09:16:55'),
(57, 39, 1, 67, '2022-06-09 09:56:45', '2022-06-09 09:56:45'),
(58, 39, 1, 68, '2022-06-09 09:56:45', '2022-06-09 09:56:45'),
(59, 39, 1, 69, '2022-06-09 09:56:45', '2022-06-09 09:56:45'),
(60, 39, 1, 70, '2022-06-09 09:56:45', '2022-06-09 09:56:45'),
(61, 39, 1, 71, '2022-06-09 09:56:45', '2022-06-09 09:56:45'),
(62, 39, 1, 72, '2022-06-09 09:56:45', '2022-06-09 09:56:45'),
(63, 39, 1, 73, '2022-06-09 09:56:45', '2022-06-09 09:56:45'),
(64, 39, 1, 74, '2022-06-09 09:56:45', '2022-06-09 09:56:45'),
(65, 39, 1, 75, '2022-06-09 09:56:45', '2022-06-09 09:56:45'),
(66, 39, 1, 76, '2022-06-09 09:56:45', '2022-06-09 09:56:45'),
(67, 39, 1, 77, '2022-06-09 09:56:45', '2022-06-09 09:56:45'),
(68, 39, 1, 78, '2022-06-09 09:56:45', '2022-06-09 09:56:45'),
(69, 39, 1, 79, '2022-06-09 09:56:45', '2022-06-09 09:56:45'),
(70, 40, 1, 80, '2022-06-09 09:57:09', '2022-06-09 09:57:09'),
(71, 40, 1, 81, '2022-06-09 09:57:09', '2022-06-09 09:57:09'),
(72, 40, 1, 82, '2022-06-09 09:57:09', '2022-06-09 09:57:09'),
(73, 40, 1, 83, '2022-06-09 09:57:09', '2022-06-09 09:57:09'),
(74, 40, 1, 84, '2022-06-09 09:57:09', '2022-06-09 09:57:09'),
(75, 40, 1, 85, '2022-06-09 09:57:09', '2022-06-09 09:57:09'),
(76, 1, 1, 15, '2022-06-11 02:58:48', '2022-06-11 02:58:48'),
(77, 1, 1, 16, '2022-06-11 02:58:48', '2022-06-11 02:58:48'),
(78, 1, 1, 86, '2022-06-11 03:09:53', '2022-06-11 03:09:53');

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
(1, 4, 1, '2022-06-01 06:42:23', '2022-06-01 06:42:23'),
(3, 5, 2, '2022-06-01 06:55:44', '2022-06-01 06:55:44'),
(4, 6, 2, '2022-06-01 06:59:09', '2022-06-01 06:59:09'),
(5, 7, 2, '2022-06-01 07:00:57', '2022-06-01 07:00:57'),
(6, 8, 2, '2022-06-01 07:09:18', '2022-06-01 07:09:18'),
(7, 9, 2, '2022-06-01 07:11:03', '2022-06-01 07:11:03'),
(8, 10, 2, '2022-06-01 07:12:36', '2022-06-01 07:12:36'),
(9, 11, 2, '2022-06-01 07:14:38', '2022-06-01 07:14:38'),
(10, 12, 2, '2022-06-01 07:17:18', '2022-06-01 07:17:18'),
(11, 13, 2, '2022-06-01 07:19:07', '2022-06-01 07:19:07'),
(12, 14, 2, '2022-06-01 07:20:27', '2022-06-01 07:20:27'),
(13, 15, 2, '2022-06-01 07:21:40', '2022-06-01 07:21:40'),
(14, 16, 2, '2022-06-01 07:26:45', '2022-06-01 07:26:45'),
(15, 17, 2, '2022-06-01 07:28:43', '2022-06-01 07:28:43'),
(16, 18, 2, '2022-06-01 07:31:30', '2022-06-01 07:31:30'),
(17, 19, 2, '2022-06-01 07:33:14', '2022-06-01 07:33:14'),
(18, 20, 2, '2022-06-01 07:35:08', '2022-06-01 07:35:08'),
(19, 21, 2, '2022-06-01 07:37:33', '2022-06-01 07:37:33'),
(20, 22, 2, '2022-06-01 07:39:08', '2022-06-01 07:39:08'),
(21, 23, 2, '2022-06-01 07:41:47', '2022-06-01 07:41:47'),
(22, 24, 2, '2022-06-01 07:44:50', '2022-06-01 07:44:50'),
(23, 25, 2, '2022-06-01 07:48:13', '2022-06-01 07:48:13'),
(24, 26, 2, '2022-06-01 07:50:04', '2022-06-01 07:50:04'),
(25, 27, 2, '2022-06-01 07:51:26', '2022-06-01 07:51:26'),
(26, 5, 4, '2022-06-07 08:08:33', '2022-06-07 08:08:33'),
(27, 4, 4, '2022-06-07 08:17:47', '2022-06-07 08:17:47');

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
(1, 'Nhóm 1', 1, '2022-06-01 06:47:45', '2022-06-01 06:47:45', NULL),
(2, 'Nhóm 2', 1, '2022-06-01 06:48:11', '2022-06-01 06:48:11', NULL),
(3, 'Nhóm 3', 1, '2022-06-01 06:48:27', '2022-06-01 06:48:27', NULL),
(4, 'Nhóm 4', 1, '2022-06-01 06:48:49', '2022-06-01 06:48:49', NULL),
(5, 'Nhóm 5', 1, '2022-06-01 06:49:06', '2022-06-01 06:49:06', NULL),
(6, 'Nhóm 1', 2, '2022-06-02 07:52:10', '2022-06-02 07:52:10', NULL),
(7, 'Nhóm 2', 2, '2022-06-02 08:06:44', '2022-06-02 08:06:44', NULL),
(8, 'Nhóm 1', 3, '2022-06-07 09:40:19', '2022-06-07 09:40:19', NULL),
(9, 'Nhóm 2', 3, '2022-06-07 09:40:56', '2022-06-07 09:40:56', NULL),
(10, 'Nhóm 3', 3, '2022-06-07 09:41:31', '2022-06-07 09:41:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nhom_nguoi_dungs`
--

CREATE TABLE `nhom_nguoi_dungs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nhom_id` int(11) NOT NULL,
  `nguoiDung_id` int(11) NOT NULL,
  `vaiTro_id` int(11) NOT NULL DEFAULT 1,
  `nganh_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nhom_nguoi_dungs`
--

INSERT INTO `nhom_nguoi_dungs` (`id`, `nhom_id`, `nguoiDung_id`, `vaiTro_id`, `nganh_id`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 2, 1, '2022-06-01 07:57:00', '2022-06-01 07:57:10'),
(2, 1, 6, 3, 1, '2022-06-01 07:57:00', '2022-06-01 07:57:59'),
(3, 1, 7, 1, 1, '2022-06-01 07:57:00', '2022-06-02 09:14:40'),
(4, 1, 8, 1, 1, '2022-06-01 07:57:00', '2022-06-01 07:57:00'),
(5, 1, 9, 1, 1, '2022-06-01 07:57:00', '2022-06-01 07:57:00'),
(6, 1, 10, 1, 1, '2022-06-01 07:57:00', '2022-06-01 07:57:00'),
(7, 2, 8, 1, 1, '2022-06-01 08:01:30', '2022-06-01 08:01:30'),
(8, 2, 10, 1, 1, '2022-06-01 08:01:30', '2022-06-01 08:01:30'),
(9, 2, 11, 2, 1, '2022-06-01 08:01:30', '2022-06-01 08:01:48'),
(10, 2, 12, 3, 1, '2022-06-01 08:01:30', '2022-06-01 08:02:03'),
(11, 2, 13, 1, 1, '2022-06-01 08:01:30', '2022-06-01 08:01:30'),
(12, 2, 14, 1, 1, '2022-06-01 08:01:30', '2022-06-01 08:01:30'),
(13, 3, 13, 1, 1, '2022-06-01 08:03:02', '2022-06-01 08:03:02'),
(14, 3, 15, 2, 1, '2022-06-01 08:03:02', '2022-06-01 08:03:14'),
(15, 3, 16, 3, 1, '2022-06-01 08:03:02', '2022-06-01 08:03:26'),
(16, 3, 17, 1, 1, '2022-06-01 08:03:02', '2022-06-01 08:03:02'),
(17, 3, 18, 1, 1, '2022-06-01 08:03:02', '2022-06-01 08:03:02'),
(18, 3, 19, 1, 1, '2022-06-01 08:03:02', '2022-06-01 08:03:02'),
(19, 4, 7, 3, 1, '2022-06-01 08:04:04', '2022-06-01 08:04:42'),
(20, 4, 12, 2, 1, '2022-06-01 08:04:04', '2022-06-01 08:04:31'),
(21, 4, 14, 1, 1, '2022-06-01 08:04:04', '2022-06-01 08:04:04'),
(22, 4, 20, 1, 1, '2022-06-01 08:04:04', '2022-06-01 08:04:04'),
(23, 4, 21, 1, 1, '2022-06-01 08:04:04', '2022-06-01 08:04:04'),
(24, 4, 22, 1, 1, '2022-06-01 08:04:04', '2022-06-01 08:04:04'),
(25, 5, 5, 1, 1, '2022-06-01 08:05:38', '2022-06-01 08:05:38'),
(26, 5, 6, 2, 1, '2022-06-01 08:05:38', '2022-06-01 08:05:52'),
(27, 5, 9, 1, 1, '2022-06-01 08:05:38', '2022-06-01 08:05:38'),
(28, 5, 23, 3, 1, '2022-06-01 08:05:38', '2022-06-01 08:06:03'),
(29, 5, 24, 1, 1, '2022-06-01 08:05:38', '2022-06-01 08:05:38'),
(30, 5, 25, 1, 1, '2022-06-01 08:05:38', '2022-06-01 08:05:38'),
(31, 5, 26, 1, 1, '2022-06-01 08:05:38', '2022-06-01 08:05:38'),
(32, 5, 27, 1, 1, '2022-06-01 08:05:38', '2022-06-01 08:05:38'),
(33, 6, 6, 2, 2, '2022-06-02 07:52:10', '2022-06-02 07:52:17'),
(34, 7, 5, 2, 2, '2022-06-02 08:06:44', '2022-06-02 08:11:51'),
(35, 8, 5, 2, 3, '2022-06-07 09:40:19', '2022-06-07 09:45:08'),
(36, 8, 6, 1, 3, '2022-06-07 09:40:19', '2022-06-07 09:40:19'),
(37, 9, 8, 1, 3, '2022-06-07 09:40:56', '2022-06-07 09:40:56'),
(38, 9, 12, 2, 3, '2022-06-07 09:40:56', '2022-06-07 09:45:22'),
(39, 10, 10, 1, 3, '2022-06-07 09:41:31', '2022-06-07 09:41:31'),
(40, 10, 15, 2, 3, '2022-06-07 09:41:31', '2022-06-07 09:45:32');

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
(1, 1, 1, 2, '2022-06-01 06:47:45', '2022-06-01 06:47:45'),
(2, 1, 1, 3, '2022-06-01 06:47:45', '2022-06-01 06:47:45'),
(3, 1, 1, 4, '2022-06-01 06:47:45', '2022-06-01 06:47:45'),
(4, 2, 1, 5, '2022-06-01 06:48:11', '2022-06-01 06:48:11'),
(5, 2, 1, 6, '2022-06-01 06:48:11', '2022-06-01 06:48:11'),
(6, 3, 1, 7, '2022-06-01 06:48:27', '2022-06-01 06:48:27'),
(7, 3, 1, 8, '2022-06-01 06:48:27', '2022-06-01 06:48:27'),
(8, 4, 1, 9, '2022-06-01 06:48:49', '2022-06-01 06:48:49'),
(9, 4, 1, 12, '2022-06-01 06:48:49', '2022-06-01 06:48:49'),
(10, 5, 1, 10, '2022-06-01 06:49:06', '2022-06-01 06:49:06'),
(11, 5, 1, 11, '2022-06-01 06:49:06', '2022-06-01 06:49:06'),
(12, 6, 1, 5, '2022-06-02 07:52:10', '2022-06-02 07:52:10'),
(13, 6, 1, 6, '2022-06-02 07:52:10', '2022-06-02 07:52:10'),
(14, 7, 1, 3, '2022-06-02 08:06:44', '2022-06-02 08:06:44'),
(15, 7, 1, 8, '2022-06-02 08:06:44', '2022-06-02 08:06:44'),
(16, 1, 2, 5, '2022-06-05 01:50:59', '2022-06-05 01:50:59'),
(17, 1, 2, 6, '2022-06-05 01:50:59', '2022-06-05 01:50:59'),
(18, 1, 3, 8, '2022-06-05 01:50:59', '2022-06-05 01:50:59'),
(19, 1, 3, 9, '2022-06-05 01:50:59', '2022-06-05 01:50:59'),
(20, 8, 1, 2, '2022-06-07 09:40:19', '2022-06-07 09:40:19'),
(21, 8, 1, 3, '2022-06-07 09:40:19', '2022-06-07 09:40:19'),
(22, 8, 1, 4, '2022-06-07 09:40:19', '2022-06-07 09:40:19'),
(23, 8, 1, 5, '2022-06-07 09:40:19', '2022-06-07 09:40:19'),
(24, 9, 1, 6, '2022-06-07 09:40:56', '2022-06-07 09:40:56'),
(25, 9, 1, 7, '2022-06-07 09:40:56', '2022-06-07 09:40:56'),
(26, 9, 1, 8, '2022-06-07 09:40:56', '2022-06-07 09:40:56'),
(27, 9, 1, 9, '2022-06-07 09:40:56', '2022-06-07 09:40:56'),
(28, 10, 1, 10, '2022-06-07 09:41:31', '2022-06-07 09:41:31'),
(29, 10, 1, 11, '2022-06-07 09:41:31', '2022-06-07 09:41:31'),
(30, 10, 1, 12, '2022-06-07 09:41:31', '2022-06-07 09:41:31');

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
(1, 'Quản lý đợt đánh giá', 'quan-ly-dot-danh-gia', 0, NULL, NULL),
(2, 'Xem danh sách đợt đánh giá', 'xem-danh-sach-dot-danh-gia', 1, NULL, NULL),
(3, 'Xem chi tiết đợt đánh giá', 'xem-chi-tiet-dot-danh-gia', 1, NULL, NULL),
(4, 'Thêm đợt đánh giá', 'them-dot-danh-gia', 1, NULL, NULL),
(5, 'Xóa đợt đánh giá', 'xoa-dot-danh-gia', 1, NULL, NULL),
(6, 'Sửa đợt đánh giá', 'sua-dot-danh-gia', 1, NULL, NULL),
(7, 'Quản lý tiêu chuẩn', 'quan-ly-tieu-chuan', 0, NULL, NULL),
(8, 'Xem danh sách tiêu chuẩn', 'xem-danh-sach-tieu-chuan', 7, NULL, NULL),
(9, 'Thêm tiêu chuẩn', 'them-tieu-chuan', 7, NULL, NULL),
(10, 'Xóa tiêu chuẩn', 'xoa-tieu-chuan', 7, NULL, NULL),
(11, 'Sửa tiêu chuẩn', 'sua-tieu-chuan', 7, NULL, NULL),
(12, 'Quản lý tiêu chí', 'quan-ly-tieu-chi', 0, NULL, NULL),
(13, 'Xem danh sách tiêu chí', 'xem-danh-sach-tieu-chi', 12, NULL, NULL),
(14, 'Xem chi tiết tiêu chí', 'xem-chi-tiet-tieu-chi', 12, NULL, NULL),
(15, 'Thêm tiêu chí', 'them-tieu-chi', 12, NULL, NULL),
(16, 'Xóa tiêu chí', 'xoa-tieu-chi', 12, NULL, NULL),
(17, 'Sửa tiêu chí', 'sua-tieu-chi', 12, NULL, NULL),
(18, 'Quản lý người dùng', 'quan-ly-nguoi-dung', 0, NULL, NULL),
(19, 'Xem danh sách người dùng', 'xem-danh-sach-nguoi-dung', 18, NULL, NULL),
(20, 'Xem chi tiết người dùng', 'xem-chi-tiet-nguoi-dung', 18, NULL, NULL),
(21, 'Thêm người dùng', 'them-nguoi-dung', 18, NULL, NULL),
(22, 'Xóa người dùng', 'xoa-nguoi-dung', 18, NULL, NULL),
(23, 'Sửa người dùng', 'sua-nguoi-dung', 18, NULL, NULL),
(24, 'Quản lý đơn vị', 'quan-ly-don-vi', 0, NULL, NULL),
(25, 'Xem danh sách đơn vị', 'xem-danh-sach-don-vi', 24, NULL, NULL),
(26, 'Thêm đơn vị', 'them-don-vi', 24, NULL, NULL),
(27, 'Xóa đơn vị', 'xoa-don-vi', 24, NULL, NULL),
(28, 'Sửa đơn vị', 'sua-don-vi', 24, NULL, NULL),
(29, 'Quản lý ngành', 'quan-ly-nganh', 0, NULL, NULL),
(30, 'Xem danh sách ngành', 'xem-danh-sach-nganh', 29, NULL, NULL),
(31, 'Thêm ngành', 'them-nganh', 29, NULL, NULL),
(32, 'Xóa ngành', 'xoa-nganh', 29, NULL, NULL),
(33, 'Sửa ngành', 'sua-nganh', 29, NULL, NULL),
(34, 'Quản lý nhóm', 'quan-ly-nhom', 0, NULL, NULL),
(35, 'Xem danh sách nhóm', 'xem-danh-sach-nhom', 34, NULL, NULL),
(36, 'Xem chi tiết nhóm', 'xem-chi-tiet-nhom', 34, NULL, NULL),
(37, 'Quản lý thành viên nhóm', 'quan-ly-thanh-vien-nhom', 34, NULL, NULL),
(38, 'Thêm nhóm', 'them-nhom', 34, NULL, NULL),
(39, 'Xóa nhóm', 'xoa-nhom', 34, NULL, NULL),
(40, 'Sửa nhóm', 'sua-nhom', 34, NULL, NULL),
(41, 'Quản lý minh chứng', 'quan-ly-minh-chung', 0, NULL, NULL),
(42, 'Xem danh sách minh chứng', 'xem-danh-sach-minh-chung', 41, NULL, NULL),
(43, 'Xem chi tiết minh chứng', 'xem-chi-tiet-minh-chung', 41, NULL, NULL),
(44, 'Thêm minh chứng', 'them-minh-chung', 41, NULL, NULL),
(45, 'Xóa minh chứng', 'xoa-minh-chung', 41, NULL, NULL),
(46, 'Quản lý minh chứng cá nhân', 'quan-ly-minh-chung-ca-nhan', 41, NULL, NULL),
(47, 'Quản lý vai trò hệ thống', 'quan-ly-vai-tro-he-thong', 0, NULL, NULL),
(48, 'Xem danh sách vai trò hệ thống', 'xem-danh-sach-vai-tro-he-thong', 47, NULL, NULL),
(49, 'Thêm vai trò hệ thống', 'them-vai-tro-he-thong', 47, NULL, NULL),
(50, 'Xóa vai trò hệ thống', 'xoa-vai-tro-he-thong', 47, NULL, NULL),
(51, 'Sửa vai trò hệ thống', 'sua-vai-tro-he-thong', 47, NULL, NULL),
(52, 'Điều khiển đợt đánh giá', 'dieu-khien-dot-danh-gia', 1, NULL, NULL),
(54, 'Quản lý tiến độ báo cáo', 'quan-ly-tien-do-bao-cao', 0, NULL, NULL);

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
(2, 1, 'Mục tiêu của chương trình đào tạo được xác định rõ ràng, phù hợp với sứ mạng và tầm nhìn của cơ sở giáo dục đại học, phù hợp với mục tiêu của giáo dục đại học quy định tại Luật Giáo dục Đại học', 2, '2022-05-25 18:49:27', '2022-05-25 18:49:27', NULL),
(3, 2, 'Chuẩn đầu ra của chương trình đào tạo được xác định rõ ràng, bao quát được cả các yêu cầu chung và yêu cầu chuyên biệt mà người học cần đạt được sau khi hoàn thành chương trình đào tạo', 2, '2022-05-25 18:49:53', '2022-05-25 18:49:53', NULL),
(4, 3, 'Chuẩn đầu ra của chương trình đào tạo phản ánh được yêu cầu của các bên liên quan, được định kỳ rà soát, điều chỉnh và được công bố công khai', 2, '2022-05-25 18:52:20', '2022-05-25 18:52:20', NULL),
(5, 1, 'Bản mô tả chương trình đào tạo đầy đủ thông tin và cập nhật', 3, '2022-05-25 18:52:51', '2022-05-25 18:52:51', NULL),
(6, 2, 'Đề cương các học phần đầy đủ thông tin và cập nhật', 3, '2022-05-25 18:53:01', '2022-05-25 18:53:01', NULL),
(7, 3, 'Bản mô tả chương trình đào tạo và đề cương các học phần được công bố công khai và các bên liên quan dễ dàng tiếp cận', 3, '2022-05-25 18:53:10', '2022-05-25 18:53:10', NULL),
(8, 1, 'Chương trình dạy học được thiết kế dựa trên chuẩn đầu ra', 4, '2022-05-25 18:53:30', '2022-05-25 18:53:30', NULL),
(9, 2, 'Đóng góp của mỗi học phần trong việc đạt được chuẩn đầu ra là rõ ràng', 4, '2022-05-25 18:53:45', '2022-05-25 18:53:45', NULL),
(10, 3, 'Chương trình dạy học có cấu trúc, trình tự logic; nội dung cập nhật và có tính tích hợp', 4, '2022-05-25 18:53:58', '2022-05-25 18:53:58', NULL),
(11, 1, 'Triết lý giáo dục hoặc mục tiêu giáo dục được tuyên bố rõ ràng và được phổ biến tới các bên liên quan', 5, '2022-05-25 18:54:17', '2022-05-25 18:54:17', NULL),
(12, 2, 'Các hoạt động dạy và học được thiết kế phù hợp để đạt được chuẩn đầu ra', 5, '2022-05-25 18:54:22', '2022-05-25 18:54:22', NULL),
(13, 3, 'Các hoạt động dạy và học thúc đẩy việc rèn luyện các kỹ năng, nâng cao khả năng học tập suốt đời của người học', 5, '2022-05-25 18:54:36', '2022-05-25 18:54:36', NULL),
(14, 1, 'Việc đánh giá kết quả học tập của người học được thiết kế phù hợp với mức độ đạt được chuẩn đầu ra', 6, '2022-05-25 18:54:48', '2022-05-25 18:54:48', NULL),
(15, 2, 'Các quy định về đánh giá kết quả học tập của người học (bao gồm thời gian, phương pháp, tiêu chí, trọng số, cơ chế phản hồi và các nội dung liên quan) rõ ràng và được thông báo công khai tới người học.', 6, '2022-05-25 18:54:59', '2022-05-25 18:54:59', NULL),
(16, 3, 'Phương pháp đánh giá kết quả học tập đa dạng, đảm bảo độ giá trị, độ tin cậy và sự công bằng', 6, '2022-05-25 18:55:09', '2022-05-25 18:55:09', NULL),
(17, 4, 'Kết quả đánh giá được phản hồi kịp thời để người học cải thiện việc học tập', 6, '2022-05-25 18:55:18', '2022-05-25 18:55:18', NULL),
(18, 5, 'Người học tiếp cận dễ dàng với quy trình khiếu nại về kết quả học tập', 6, '2022-05-25 18:55:29', '2022-05-25 18:55:29', NULL),
(19, 1, 'Việc quy hoạch đội ngũ giảng viên, nghiên cứu viên (bao gồm việc thu hút, tiếp nhận, bổ nhiệm, bố trí, chấm dứt hợp đồng và cho nghỉ hưu) được thực hiện đáp ứng nhu cầu về đào tạo, nghiên cứu khoa học và các hoạt động phục vụ cộng đồng', 7, '2022-05-25 18:55:40', '2022-05-25 18:55:40', NULL),
(20, 2, 'Tỉ lệ giảng viên/người học và khối lượng công việc của đội ngũ giảng viên, nghiên cứu viên được đo lường, giám sát làm căn cứ cải tiến chất lượng hoạt động đào tạo,  nghiên cứu khoa học và các hoạt động phục vụ cộng đồng', 7, '2022-05-25 18:55:49', '2022-05-25 18:55:49', NULL),
(21, 3, 'Các tiêu chí tuyển dụng và lựa chọn giảng viên, nghiên cứu viên (bao gồm cả đạo đức và năng lực học thuật) để bổ nhiệm, điều chuyển được xác định và phổ biến công khai', 7, '2022-05-25 18:55:59', '2022-05-25 18:55:59', NULL),
(22, 4, 'Năng lực của đội ngũ giảng viên, nghiên cứu viên được xác định và được đánh giá', 7, '2022-05-25 19:01:10', '2022-05-25 19:01:10', NULL),
(23, 5, 'Nhu cầu về đào tạo và phát triển chuyên môn của đội ngũ giảng viên, nghiên cứu viên được xác định và có các hoạt động triển khai để đáp ứng nhu cầu đó', 7, '2022-05-25 19:01:20', '2022-05-25 19:01:20', NULL),
(24, 6, 'Việc quản trị theo kết quả công việc của giảng viên, nghiên cứu viên (gồm cả khen thưởng và công nhận) được triển khai để tạo động lực và hỗ trợ cho đào tạo, nghiên cứu khoa học và các hoạt động phục vụ cộng đồng', 7, '2022-05-25 19:01:31', '2022-05-25 19:01:31', NULL),
(25, 7, 'Các loại hình và số lượng các hoạt động nghiên cứu của giảng viên, nghiên cứu viên được xác lập, giám sát và đối sánh để cải tiến chất lượng', 7, '2022-05-25 19:01:43', '2022-05-25 19:01:43', NULL),
(26, 1, 'Việc quy hoạch đội ngũ nhân viên (làm việc tại thư viện, phòng thí nghiệm, hệ thống công nghệ thông tin và các dịch vụ hỗ trợ khác) được thực hiện đáp ứng nhu cầu về đào tạo, nghiên cứu khoa học và các hoạt động phục vụ cộng đồng', 8, '2022-05-25 19:01:55', '2022-05-25 19:01:55', NULL),
(27, 2, 'Các tiêu chí tuyển dụng và lựa chọn nhân viên để bổ nhiệm, điều chuyển được xác định và phổ biến công khai', 8, '2022-05-25 19:02:08', '2022-05-25 19:02:08', NULL),
(28, 3, 'Năng lực của đội ngũ nhân viên được xác định và được đánh giá', 8, '2022-05-25 19:02:17', '2022-05-25 19:02:17', NULL),
(29, 4, 'Nhu cầu về đào tạo và phát triển chuyên môn, nghiệp vụ của nhân viên được xác định và có các hoạt động triển khai để đáp ứng nhu cầu đó', 8, '2022-05-25 19:02:28', '2022-05-25 19:02:28', NULL),
(30, 5, 'Việc quản trị theo kết quả công việc của nhân viên (gồm cả khen thưởng và công nhận) được triển khai để tạo động lực và hỗ trợ cho đào tạo, nghiên cứu khoa học và các hoạt động phục vụ cộng đồng', 8, '2022-05-25 19:02:38', '2022-05-25 19:02:38', NULL),
(31, 1, 'Chính sách tuyển sinh được xác định rõ ràng, được công bố công khai và được cập nhật', 9, '2022-05-25 19:02:48', '2022-05-25 19:02:48', NULL),
(32, 2, 'Tiêu chí và phương pháp tuyển chọn người học được xác định rõ ràng và được đánh giá', 9, '2022-05-25 19:02:58', '2022-05-25 19:02:58', NULL),
(33, 3, 'Có hệ thống giám sát phù hợp về sự tiến bộ trong học tập và rèn luyện, kết quả học tập, khối lượng học tập của người học', 9, '2022-05-25 19:03:11', '2022-05-25 19:03:11', NULL),
(34, 4, 'Có các hoạt động tư vấn học tập, hoạt động ngoại khóa, hoạt động thi đua và các dịch vụ hỗ trợ khác để giúp cải thiện việc học tập và khả năng có việc làm của người học', 9, '2022-05-25 19:03:20', '2022-05-25 19:03:20', NULL),
(35, 5, 'Môi trường tâm lý, xã hội và cảnh quan tạo thuận lợi cho hoạt động đào tạo, nghiên cứu và sự thoải mái cho cá nhân người học', 9, '2022-05-25 19:03:30', '2022-05-25 19:03:30', NULL),
(36, 1, 'Có hệ thống phòng làm việc, phòng học và các phòng chức năng với các trang thiết bị phù hợp để hỗ trợ các hoạt động đào tạo và nghiên cứu', 10, '2022-05-25 19:03:42', '2022-05-25 19:03:42', NULL),
(37, 2, 'Thư viện và các nguồn học liệu phù hợp và được cập nhật để hỗ trợ các hoạt động đào tạo và nghiên cứu', 10, '2022-05-25 19:03:51', '2022-05-25 19:03:51', NULL),
(38, 3, 'Phòng thí nghiệm, thực hành và trang thiết bị phù hợp và được cập nhật để hỗ trợ các hoạt động đào tạo và nghiên cứu', 10, '2022-05-25 19:04:00', '2022-05-25 19:04:00', NULL),
(39, 4, 'Hệ thống công nghệ thông tin (bao gồm cả hạ tầng cho học tập trực tuyến) phù hợp và được cập nhật để hỗ trợ các hoạt động đào tạo và nghiên cứu', 10, '2022-05-25 19:04:09', '2022-05-25 19:04:09', NULL),
(40, 5, 'Các tiêu chuẩn về môi trường, sức khỏe, an toàn được xác định và triển khai có lưu ý đến nhu cầu đặc thù của người khuyết tật', 10, '2022-05-25 19:04:20', '2022-05-25 19:04:20', NULL),
(41, 1, 'Thông tin phản hồi và nhu cầu của các bên liên quan được sử dụng làm căn cứ để thiết kế và phát triển chương trình dạy học', 11, '2022-05-25 19:04:36', '2022-05-25 19:04:36', NULL),
(42, 2, 'Việc thiết kế và phát triển chương trình dạy học được xác lập, được đánh giá và cải tiến', 11, '2022-05-25 19:04:47', '2022-05-25 19:04:47', NULL),
(43, 3, 'Quá trình dạy và học, việc đánh giá kết quả học tập của người học được rà soát và đánh giá thường xuyên để đảm bảo sự tương thích và phù hợp với chuẩn đầu ra', 11, '2022-05-25 19:04:56', '2022-05-25 19:04:56', NULL),
(44, 4, 'Các kết quả nghiên cứu khoa học được sử dụng để cải tiến việc dạy và học', 11, '2022-05-25 19:05:04', '2022-05-25 19:05:04', NULL),
(45, 5, 'Chất lượng các dịch vụ hỗ trợ và tiện ích (tại thư viện, phòng thí nghiệm, hệ thống công nghệ thông tin và các dịch vụ hỗ trợ khác) được đánh giá và cải tiến', 11, '2022-05-25 19:05:14', '2022-05-25 19:05:14', NULL),
(46, 6, 'Cơ chế phản hồi các bên liên quan có tính hệ thống, được đánh giá và cải tiến', 11, '2022-05-25 19:05:45', '2022-05-25 19:05:45', NULL),
(47, 1, 'Tỉ lệ thôi học, tốt nghiệp được xác lập, giám sát và đối sánh để cải tiến chất lượng', 12, '2022-05-25 19:06:00', '2022-05-25 19:06:00', NULL),
(48, 2, 'Thời gian tốt nghiệp trung bình được xác lập, giám sát và đối sánh để cải tiến chất lượng', 12, '2022-05-25 19:06:10', '2022-05-25 19:06:10', NULL),
(49, 3, 'Tỉ lệ có việc làm sau tốt nghiệp được xác lập, giám sát và đối sánh để cải tiến chất lượng', 12, '2022-05-25 19:06:18', '2022-05-25 19:06:18', NULL),
(50, 4, 'Loại hình và số lượng các hoạt động nghiên cứu của người học được xác lập, giám sát và đối sánh để cải tiến chất lượng', 12, '2022-05-25 19:06:34', '2022-05-25 19:06:34', NULL),
(51, 5, 'Mức độ hài lòng của các bên liên quan được xác lập, giám sát và đối sánh để cải tiến chất lượng', 12, '2022-05-25 19:06:40', '2022-05-25 19:06:40', NULL),
(52, 0, 'Tổng kết tiêu chuẩn 1', 2, '2022-06-04 02:07:59', '2022-06-04 02:07:59', NULL),
(53, 0, 'Tổng kết tiêu chuẩn 2', 3, '2022-06-04 02:08:19', '2022-06-04 02:08:19', NULL),
(54, 0, 'Tổng kết tiêu chuẩn 3', 4, '2022-06-04 02:08:36', '2022-06-04 02:08:36', NULL),
(55, 0, 'Tổng kết tiêu chuẩn 4', 5, '2022-06-04 02:08:49', '2022-06-04 02:08:49', NULL),
(56, 0, 'Tổng kết tiêu chuẩn 5', 6, '2022-06-04 02:09:04', '2022-06-04 02:09:04', NULL),
(57, 0, 'Tổng kết tiêu chuẩn 6', 7, '2022-06-04 02:09:22', '2022-06-04 02:09:22', NULL),
(58, 0, 'Tổng kết tiêu chuẩn 7', 8, '2022-06-04 02:10:00', '2022-06-04 02:10:00', NULL),
(59, 0, 'Tổng kết tiêu chuẩn 8', 9, '2022-06-04 02:10:14', '2022-06-04 02:10:14', NULL),
(60, 0, 'Tổng kết tiêu chuẩn 9', 10, '2022-06-04 02:10:32', '2022-06-04 02:10:32', NULL),
(61, 0, 'Tổng kết tiêu chuẩn 10', 11, '2022-06-04 02:10:55', '2022-06-04 02:10:55', NULL),
(62, 0, 'Tổng kết tiêu chuẩn 11', 12, '2022-06-04 02:11:08', '2022-06-04 02:11:08', NULL);

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
(2, 1, 'Mục tiêu và chuẩn đầu ra của chương trình đào tạo', '2022-05-25 18:44:48', '2022-05-25 18:44:48', NULL),
(3, 2, 'Bản mô tả chương trình đào tạo', '2022-05-25 18:45:12', '2022-05-25 18:45:12', NULL),
(4, 3, 'Cấu trúc và nội dung chương trình dạy học', '2022-05-25 18:45:32', '2022-05-25 18:45:32', NULL),
(5, 4, 'Phương pháp tiếp cận trong dạy và học', '2022-05-25 18:45:47', '2022-05-25 18:45:47', NULL),
(6, 5, 'Đánh giá kết quả học tập của người học', '2022-05-25 18:46:04', '2022-05-25 18:46:04', NULL),
(7, 6, 'Đội ngũ giảng viên, nghiên cứu viên', '2022-05-25 18:46:19', '2022-05-25 18:46:19', NULL),
(8, 7, 'Đội ngũ nhân viên', '2022-05-25 18:46:34', '2022-05-25 18:46:34', NULL),
(9, 8, 'Người học và hoạt động hỗ trợ người học', '2022-05-25 18:46:47', '2022-05-25 18:46:47', NULL),
(10, 9, 'Cơ sở vật chất và trang thiết bị', '2022-05-25 18:46:59', '2022-05-25 18:46:59', NULL),
(11, 10, 'Nâng cao chất lượng', '2022-05-25 18:47:15', '2022-05-25 18:47:15', NULL),
(12, 11, 'Kết quả đầu ra', '2022-05-25 18:47:27', '2022-05-25 18:47:27', NULL);

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
(3, 'Phan Thanh Hà 2', 1, '2000-03-08', '0334370811', 'Sinh Viên', 'ha.pt.60cntt@ntu.edu.vn', NULL, '$2y$10$r3WT6ccVNbVRXicurkxxzuYwoT3QSgtZerCnqjkWQcZzwF03okIH2', 1, NULL, '2022-05-25 20:25:47', '2022-05-31 23:52:24', '2022-05-31 23:52:24', '/storage/photos/1/26-May-2022-10-25-avatar.jpg'),
(4, 'Phan Thanh Hà', 1, '2000-03-08', '0334370822', 'Sinh Viên', 'hathanh.0113@gmail.com', NULL, '$2y$10$/4Wne/t8CJkSpQL2Ic1OQurUS0hvTLGIi3om/GrqaseJeO5NT.lvy', 1, 'JnTk5YfR1a0HIfseHsGlyWGCAtPD5C4EPsBD8qCsSxmvny3oqVvQPHEXBHfq', '2022-05-25 23:31:11', '2022-05-25 23:31:55', NULL, '/storage/photos/4/26-May-2022-01-31-avatar2.jpg'),
(5, 'Phạm Thị Thu Thúy', 0, '1978-06-24', '0901905679', 'Trưởng khoa CNTT', 'thuthuy@ntu.edu.vn', NULL, '$2y$10$9cTZjyUfONAdeL5iTGehK.ad9Tcmxm6Oe60WgnIf2gg5IEq5RGoYq', 1, 'ebWD5CjSAPDw5w9ayRP7GSvRvviD8ePLoii7Y6nwywm6zsxOS3GqraPBYbD3', '2022-05-31 23:54:26', '2022-05-31 23:54:26', NULL, '/img/girl-1.png'),
(6, 'Nguyễn Đức Thuần', 1, '1960-01-01', '0111111111', 'Trưởng BM HTTT', 'thuan.inf@ntu.edu.vn', NULL, '$2y$10$Qkb9TIVNx08g7PNCMgQk5.MjJ2Q2opjauZhlZRtAdpqV4StwucO36', 1, NULL, '2022-05-31 23:59:09', '2022-05-31 23:59:09', NULL, '/img/man-1.jpg'),
(7, 'Tô Văn Phương', 1, '1985-01-01', '0222222222', 'Trưởng phòng ĐTĐH', 'phuongtv@ntu.edu.vn', NULL, '$2y$10$KHCrVkBU5J/EatCHLjEjfeICvquXXxanjmRA8YcX7dZdH8q5W5zjG', 3, NULL, '2022-06-01 00:00:57', '2022-06-01 00:06:55', NULL, '/storage/photos/4/01-Jun-2022-02-00-342.jpg'),
(8, 'Nguyễn Thủy Đoan Trang', 0, '1977-01-01', '0982146557', 'Giảng viên chính BM HTTT', 'nguyenthuydoantrang@ntu.edu.vn', NULL, '$2y$10$XteHsW6ZrBxJ1Yh8C09AHeUvBXLek5YYPbrE9zORBTSTC/feM2xd6', 1, NULL, '2022-06-01 00:09:18', '2022-06-01 00:09:18', NULL, '/img/girl-1.png'),
(9, 'Cấn Thị Phượng', 0, '1987-01-01', '0333333333', 'Giảng viên BM M&TT', 'phuongct@ntu.edu.vn', NULL, '$2y$10$cgALpG3Yc66xORUQQf1k6e7Ywtv83/ecn7TC0fNsA0mqa07nX2446', 1, NULL, '2022-06-01 00:11:03', '2022-06-01 00:11:03', NULL, '/storage/photos/4/01-Jun-2022-02-11-Can-Thi-Phuong-anh-the-3x4.jpg'),
(10, 'Nguyễn Đình Hưng', 1, '1980-01-01', '0444444444', 'Giảng viên BM KTPM', 'hungnd@ntu.edu.vn', NULL, '$2y$10$B/ssTIF6MGOMNn4M5Vvkd.s7SgyKMVJlmfUh0T8JCtdWozJILYEqG', 1, NULL, '2022-06-01 00:12:36', '2022-06-01 00:12:36', NULL, '/img/man-1.jpg'),
(11, 'Bùi Chí Thành', 1, '1973-01-01', '0555555555', 'Phó trưởng khoa CNTT', 'thanhbc@ntu.edu.vn', NULL, '$2y$10$G4ysEhz42XXz6J7syH/JY.FVVba9ezOm94A1UDeWEWN/LM38DTODG', 1, NULL, '2022-06-01 00:14:38', '2022-06-01 00:14:38', NULL, '/img/man-1.jpg'),
(12, 'Phạm Thị Kim Ngoan', 0, '1977-01-01', '0985102114', 'Trưởng BM KTPM', 'ngoanptk@ntu.edu.vn', NULL, '$2y$10$NchBqY5kHOnoIJaP16ptl.XfUl5n/bm8IPUujWbjJxUTw5z6RGX/S', 1, NULL, '2022-06-01 00:17:18', '2022-06-01 00:17:18', NULL, '/img/girl-1.png'),
(13, 'Hà Thị Thanh Ngà', 0, '1987-01-01', '0666666666', 'Giảng viên BM HTTT', 'ngahtt@ntu.edu.vn', NULL, '$2y$10$Y8YNC0F4E13RMtj/ohOnpu3SVQADAEhRRxUDYJySZXrP6bvDXvBHm', 1, NULL, '2022-06-01 00:19:07', '2022-06-01 00:19:07', NULL, '/img/girl-1.png'),
(14, 'Đoàn Vũ Thịnh', 1, '1980-01-01', '0777777777', 'Giảng viên BM KTPM', 'thinhdv@ntu.edu.vn', NULL, '$2y$10$pIX4zEhFHFHqM6r2UAsz4ePgvN6E7s2CkBKCbe9Uop29yUxLWn512', 1, NULL, '2022-06-01 00:20:27', '2022-06-01 00:20:27', NULL, '/img/man-1.jpg'),
(15, 'Mai Cường Thọ', 1, '1973-01-01', '0888888888', 'Trưởng BM M&TT', 'thomc@ntu.edu.vn', NULL, '$2y$10$OBj7MdGhhyhI/1aX5RdukOhKyXnkiVL/t/qYMtHnaSlw/ujyBSsfS', 1, NULL, '2022-06-01 00:21:40', '2022-06-01 00:21:40', NULL, '/img/man-1.jpg'),
(16, 'Lê Việt Phương', 1, '1979-01-01', '0999999999', 'Phó trưởng phòng TC - HC', 'phuonglv@ntu.edu.vn', NULL, '$2y$10$Rqw/4E99gX061vgMfOsqZe7KF1PPSnVXPW8WePTR0BPooJ8URwEP.', 4, NULL, '2022-06-01 00:26:45', '2022-06-01 00:26:45', NULL, '/img/man-1.jpg'),
(17, 'Nguyễn Mai Trung', 1, '1980-01-01', '0121212121', 'Phó trưởng phòng KH -TC', 'trungnm@ntu.edu.vn', NULL, '$2y$10$.tfmr8jDYCO5Bj2d8fs9buaPbtV/rv8txpNOikLCZ8rOqgsDq/H8e', 5, NULL, '2022-06-01 00:28:43', '2022-06-01 00:28:43', NULL, '/img/man-1.jpg'),
(18, 'Trần Thị Mỹ Hạnh', 0, '1987-01-01', '02582220747', 'Phó trưởng phòng KH -CN', 'myhanhtt@ntu.edu.vn', NULL, '$2y$10$rn0ZxllZtwj/laq3A4D7Gu9y.OX4hyTLLNF3OhzIjJhRodYSQRibK', 6, NULL, '2022-06-01 00:31:30', '2022-06-01 00:31:30', NULL, '/img/girl-1.png'),
(19, 'Phạm Thị Thu', 0, '1988-01-01', '0326801929', 'Chuyên viên phòng TC - HC', 'thupt@ntu.edu.vn', NULL, '$2y$10$W7.n4XGxGuAaqfLZerNcluH5Hftwen/sF5DJDIhUVv3VZzXjc4BZ.', 4, NULL, '2022-06-01 00:33:14', '2022-06-01 00:33:14', NULL, '/img/girl-1.png'),
(20, 'Nguyễn Thế Hân', 1, '1983-01-01', '0343434343', 'Phó trưởng phòng CTCT&SV', 'hannt@ntu.edu.vn', NULL, '$2y$10$CjlWenLGnfm8Cf9VvadO/O3xU8SRdL2j15HMfCQsOPWmSuUN92Rhi', 7, NULL, '2022-06-01 00:35:08', '2022-06-01 00:35:08', NULL, '/storage/photos/4/01-Jun-2022-02-35-374.jpg'),
(21, 'Đỗ Quốc Việt', 1, '1985-01-01', '0941116886', 'Giám đốc TT QHDN&HTSV', 'vietdq@ntu.edu.vn', NULL, '$2y$10$8ebggFqU63y2MjpxaigbIO4nJ51ErJkcjcksro/Dnks2VZAsEKbVq', 8, NULL, '2022-06-01 00:37:33', '2022-06-01 00:37:33', NULL, '/img/man-1.jpg'),
(22, 'Vương Thị Bích Hảo', 0, '1982-01-01', '0454545454', 'Chuyên viên phòng ĐTĐH', 'haovtb@ntu.edu.vn', NULL, '$2y$10$8wvQ0OUpCnFqsEWULRezFej0vSWoTI/AS0aEEaP3PG0yOPn7qnEAq', 3, NULL, '2022-06-01 00:39:08', '2022-06-01 00:39:08', NULL, '/storage/photos/4/01-Jun-2022-02-39-739.jpg'),
(23, 'Nguyễn Vĩnh Trung', 1, '1968-01-01', '0583836128', 'Phó trưởng phòng ĐBCL&KT', 'trungnv@ntu.edu.vn', NULL, '$2y$10$nFJ7rcGU/jjbsVhsGqPS3u1t3MR5Vjt.uwwIPb8PIWkrC5YQ/yCpe', 2, NULL, '2022-06-01 00:41:47', '2022-06-01 00:41:47', NULL, '/img/man-1.jpg'),
(24, 'Nguyễn Văn Hòa', 1, '1979-01-01', '0966337972', 'Giám đốc TTTNTH', 'hoanv@ntu.edu.vn', NULL, '$2y$10$F2VapfFFMCj59A4SpuW.Du/VBrdKKssIK9Iu0jTxysFrbrBdhnG1O', 9, NULL, '2022-06-01 00:44:50', '2022-06-01 00:44:50', NULL, '/img/man-1.jpg'),
(25, 'Nguyễn Văn Hân', 1, '1980-01-01', '0565656565', 'Phó giám đốc TTPVTH', 'hannv1@ntu.edu.vn', NULL, '$2y$10$CsxQIox4lv0pWtVEB8XvB../DDBBM9YABq4SS0wZPjZ2ypN7.q9zy', 10, NULL, '2022-06-01 00:48:13', '2022-06-01 00:48:13', NULL, '/storage/photos/4/01-Jun-2022-02-48-603.jpg'),
(26, 'Vũ Thị Trang', 0, '1987-01-01', '0985857770', 'Phó giám đốc Thư viện', 'trangvt@ntu.edu.vn', NULL, '$2y$10$2lO99.j.tI8fLt/TIhcjkecXYnxNKz25kxBZOM1TCmTXA/JzBbBKC', 11, NULL, '2022-06-01 00:50:04', '2022-06-01 00:50:04', NULL, '/img/girl-1.png'),
(27, 'Nguyễn Thị Kim Vân', 0, '1972-01-01', '0676767676', 'CVC. Phòng ĐBCL&KT', 'kimvan@ntu.edu.vn', NULL, '$2y$10$MPnTXWsTGkmuixMKoKuZKefr2OgbH7AiUcYaGpPnMySkZkeeEnqXa', 2, NULL, '2022-06-01 00:51:26', '2022-06-01 00:51:26', NULL, '/storage/photos/4/01-Jun-2022-02-51-712.jpg');

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
  `nganh_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vai_tro_h_t_quyen_h_t_s`
--

INSERT INTO `vai_tro_h_t_quyen_h_t_s` (`id`, `vaiTroHT_id`, `quyenHT_id`, `nganh_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, NULL, '2022-05-31 23:41:04', '2022-05-31 23:41:04'),
(2, 1, 3, NULL, '2022-05-31 23:41:04', '2022-05-31 23:41:04'),
(3, 1, 4, NULL, '2022-05-31 23:41:04', '2022-05-31 23:41:04'),
(4, 1, 5, NULL, '2022-05-31 23:41:04', '2022-05-31 23:41:04'),
(5, 1, 6, NULL, '2022-05-31 23:41:04', '2022-05-31 23:41:04'),
(6, 1, 8, NULL, '2022-05-31 23:41:04', '2022-05-31 23:41:04'),
(7, 1, 9, NULL, '2022-05-31 23:41:04', '2022-05-31 23:41:04'),
(8, 1, 10, NULL, '2022-05-31 23:41:04', '2022-05-31 23:41:04'),
(9, 1, 11, NULL, '2022-05-31 23:41:04', '2022-05-31 23:41:04'),
(10, 1, 13, NULL, '2022-05-31 23:41:04', '2022-05-31 23:41:04'),
(11, 1, 14, NULL, '2022-05-31 23:41:04', '2022-05-31 23:41:04'),
(12, 1, 15, NULL, '2022-05-31 23:41:04', '2022-05-31 23:41:04'),
(13, 1, 16, NULL, '2022-05-31 23:41:04', '2022-05-31 23:41:04'),
(14, 1, 17, NULL, '2022-05-31 23:41:04', '2022-05-31 23:41:04'),
(15, 1, 19, NULL, '2022-05-31 23:41:04', '2022-05-31 23:41:04'),
(16, 1, 20, NULL, '2022-05-31 23:41:04', '2022-05-31 23:41:04'),
(17, 1, 21, NULL, '2022-05-31 23:41:04', '2022-05-31 23:41:04'),
(18, 1, 22, NULL, '2022-05-31 23:41:04', '2022-05-31 23:41:04'),
(19, 1, 23, NULL, '2022-05-31 23:41:04', '2022-05-31 23:41:04'),
(20, 1, 25, NULL, '2022-05-31 23:41:04', '2022-05-31 23:41:04'),
(21, 1, 26, NULL, '2022-05-31 23:41:04', '2022-05-31 23:41:04'),
(22, 1, 27, NULL, '2022-05-31 23:41:04', '2022-05-31 23:41:04'),
(23, 1, 28, NULL, '2022-05-31 23:41:04', '2022-05-31 23:41:04'),
(24, 1, 30, NULL, '2022-05-31 23:41:04', '2022-05-31 23:41:04'),
(25, 1, 31, NULL, '2022-05-31 23:41:04', '2022-05-31 23:41:04'),
(26, 1, 32, NULL, '2022-05-31 23:41:04', '2022-05-31 23:41:04'),
(27, 1, 33, NULL, '2022-05-31 23:41:04', '2022-05-31 23:41:04'),
(28, 1, 35, NULL, '2022-05-31 23:41:04', '2022-05-31 23:41:04'),
(29, 1, 36, NULL, '2022-05-31 23:41:04', '2022-05-31 23:41:04'),
(30, 1, 37, NULL, '2022-05-31 23:41:04', '2022-05-31 23:41:04'),
(31, 1, 38, NULL, '2022-05-31 23:41:04', '2022-05-31 23:41:04'),
(32, 1, 39, NULL, '2022-05-31 23:41:04', '2022-05-31 23:41:04'),
(33, 1, 40, NULL, '2022-05-31 23:41:04', '2022-05-31 23:41:04'),
(34, 1, 42, NULL, '2022-05-31 23:41:04', '2022-05-31 23:41:04'),
(35, 1, 43, NULL, '2022-05-31 23:41:04', '2022-05-31 23:41:04'),
(36, 1, 44, NULL, '2022-05-31 23:41:04', '2022-05-31 23:41:04'),
(39, 1, 48, NULL, '2022-05-31 23:41:04', '2022-05-31 23:41:04'),
(40, 1, 49, NULL, '2022-05-31 23:41:04', '2022-05-31 23:41:04'),
(41, 1, 50, NULL, '2022-05-31 23:41:04', '2022-05-31 23:41:04'),
(42, 1, 51, NULL, '2022-05-31 23:41:04', '2022-05-31 23:41:04'),
(43, 2, 2, NULL, '2022-05-31 23:55:32', '2022-05-31 23:55:32'),
(44, 2, 3, NULL, '2022-05-31 23:55:32', '2022-05-31 23:55:32'),
(45, 2, 8, NULL, '2022-05-31 23:55:32', '2022-05-31 23:55:32'),
(46, 2, 13, NULL, '2022-05-31 23:55:32', '2022-05-31 23:55:32'),
(47, 2, 14, NULL, '2022-05-31 23:55:32', '2022-05-31 23:55:32'),
(48, 2, 25, NULL, '2022-05-31 23:55:32', '2022-05-31 23:55:32'),
(49, 2, 30, NULL, '2022-05-31 23:55:32', '2022-05-31 23:55:32'),
(50, 2, 42, NULL, '2022-05-31 23:55:32', '2022-05-31 23:55:32'),
(51, 2, 43, NULL, '2022-05-31 23:55:32', '2022-05-31 23:55:32'),
(52, 2, 44, NULL, '2022-05-31 23:55:32', '2022-05-31 23:55:32'),
(55, 1, 52, NULL, '2022-06-03 13:04:19', '2022-06-03 13:04:19'),
(56, 1, 53, NULL, '2022-06-04 08:39:47', '2022-06-04 08:39:47'),
(58, 1, 45, NULL, '2022-06-04 09:37:58', '2022-06-04 09:37:58'),
(59, 1, 46, NULL, '2022-06-04 09:37:58', '2022-06-04 09:37:58'),
(85, 4, 54, 1, '2022-06-07 03:31:29', '2022-06-07 03:31:29'),
(86, 4, 54, 2, '2022-06-07 03:31:29', '2022-06-07 03:31:29'),
(87, 4, 54, 3, '2022-06-07 03:31:29', '2022-06-07 03:31:29'),
(88, 2, 46, NULL, '2022-06-07 23:34:14', '2022-06-07 23:34:14');

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
(1, 'Quản trị hệ thống', 'quan-tri-he-thong', '2022-05-31 23:41:04', '2022-05-31 23:41:04', NULL),
(2, 'Người dùng', 'nguoi-dung', '2022-05-31 23:55:32', '2022-05-31 23:55:32', NULL),
(4, 'Trưởng khoa CNTT', 'truong-khoa-cntt', '2022-06-07 00:45:46', '2022-06-07 00:45:46', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bao_caos`
--
ALTER TABLE `bao_caos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bao_cao_minh_chungs`
--
ALTER TABLE `bao_cao_minh_chungs`
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
-- Indexes for table `tieu_chuans`
--
ALTER TABLE `tieu_chuans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_sdt_unique` (`sdt`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bao_caos`
--
ALTER TABLE `bao_caos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `bao_cao_minh_chungs`
--
ALTER TABLE `bao_cao_minh_chungs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `bao_cao_sao_luus`
--
ALTER TABLE `bao_cao_sao_luus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `binh_luans`
--
ALTER TABLE `binh_luans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chi_tiet_minh_chungs`
--
ALTER TABLE `chi_tiet_minh_chungs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `don_vis`
--
ALTER TABLE `don_vis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `dot_danh_gias`
--
ALTER TABLE `dot_danh_gias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `giai_doans`
--
ALTER TABLE `giai_doans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hoat_dongs`
--
ALTER TABLE `hoat_dongs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `minh_chungs`
--
ALTER TABLE `minh_chungs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `moc_chuans`
--
ALTER TABLE `moc_chuans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `nganhs`
--
ALTER TABLE `nganhs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nganh_dot_danh_gias`
--
ALTER TABLE `nganh_dot_danh_gias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nguoi_dung_quyens`
--
ALTER TABLE `nguoi_dung_quyens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `nguoi_dung_vai_tro_h_t_s`
--
ALTER TABLE `nguoi_dung_vai_tro_h_t_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `nhoms`
--
ALTER TABLE `nhoms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `nhom_nguoi_dungs`
--
ALTER TABLE `nhom_nguoi_dungs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
