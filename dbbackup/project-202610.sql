-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2026-11-25 09:01:42
-- 伺服器版本： 10.4.32-MariaDB
-- PHP 版本： 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `project-202610`
--

-- --------------------------------------------------------

--
-- 資料表結構 `manager`
--

DROP TABLE IF EXISTS `manager`;
CREATE TABLE `manager` (
  `id` int(11) NOT NULL,
  `userId` varchar(10) DEFAULT NULL COMMENT '帳號',
  `pwd` varchar(10) DEFAULT NULL COMMENT '密碼'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `manager`
--

INSERT INTO `manager` (`id`, `userId`, `pwd`) VALUES
(1, 'amy', 'amy456'),
(2, 'eric', 'eric789'),
(3, 'lisa', 'lisa456');

-- --------------------------------------------------------

--
-- 資料表結構 `milestone`
--

DROP TABLE IF EXISTS `milestone`;
CREATE TABLE `milestone` (
  `id` int(11) NOT NULL,
  `typeId` int(11) NOT NULL COMMENT '類別代碼',
  `years` char(4) NOT NULL COMMENT '年',
  `months` char(2) NOT NULL COMMENT '月',
  `title` varchar(200) NOT NULL COMMENT '標題',
  `content` varchar(500) NOT NULL COMMENT '內容',
  `point` char(1) DEFAULT NULL COMMENT '重點事件(Y/N)',
  `createTime` timestamp NOT NULL DEFAULT current_timestamp() COMMENT '建立時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='大事記';

--
-- 傾印資料表的資料 `milestone`
--

INSERT INTO `milestone` (`id`, `typeId`, `years`, `months`, `title`, `content`, `point`, `createTime`) VALUES
(1, 1, '2025', '11', '年度客戶感謝活動圓滿落幕', '年度客戶感謝活動圓滿落幕', NULL, '2026-11-04 07:22:39'),
(2, 3, '2026', '01', '獲獎', '獲獎...\r\n恭喜...', NULL, '2026-11-11 02:56:59'),
(3, 4, '2022', '04', '新產品 ...', '產品內容 ....\r\n...', 'Y', '2026-11-11 02:57:36'),
(5, 1, '2026', '04', '里程碑 ...', '一二三四五六七', NULL, '2026-11-11 07:26:25');

-- --------------------------------------------------------

--
-- 資料表結構 `milestone_type`
--

DROP TABLE IF EXISTS `milestone_type`;
CREATE TABLE `milestone_type` (
  `id` int(11) NOT NULL,
  `label` varchar(10) NOT NULL COMMENT '顏色標籤',
  `title` varchar(10) NOT NULL COMMENT '類別名稱'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='大事記類別';

--
-- 傾印資料表的資料 `milestone_type`
--

INSERT INTO `milestone_type` (`id`, `label`, `title`) VALUES
(1, 'milestone', '里程碑'),
(3, 'award', '獲獎/認證'),
(4, 'product', '產品');

-- --------------------------------------------------------

--
-- 資料表結構 `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `labelId` int(11) DEFAULT NULL,
  `typeId` int(11) DEFAULT NULL,
  `productName` varchar(100) DEFAULT NULL COMMENT '品名',
  `title` varchar(200) DEFAULT NULL COMMENT '標題',
  `productNo` varchar(30) DEFAULT NULL COMMENT '產品編號',
  `price` int(11) DEFAULT NULL COMMENT '定價',
  `salePrice` int(11) DEFAULT NULL COMMENT '售價',
  `qty` int(11) DEFAULT NULL COMMENT '數量',
  `content` text DEFAULT NULL COMMENT '產品內容',
  `createTime` timestamp NOT NULL DEFAULT current_timestamp() COMMENT '建立時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='產品資料表';

--
-- 傾印資料表的資料 `product`
--

INSERT INTO `product` (`id`, `labelId`, `typeId`, `productName`, `title`, `productNo`, `price`, `salePrice`, `qty`, `content`, `createTime`) VALUES
(1, 1, 1, '紅茶拿鐵', '濃郁紅茶香與奶香交織的順口拿鐵', 'A-00001', 70, 60, NULL, '一口入口，即被紅茶的自然甘醇與濃郁奶香環繞，香氣層層展開，讓人瞬間感受到茶與咖啡的完美平衡。每一口都像是在品味手工調配的藝術。\r\n絲滑的奶泡覆蓋在熱騰騰的茶湯上，口感柔順不苦澀，適合早晨提神、午後小憩，亦是與朋友共享的甜美時光。\r\n採用密封瓶裝設計，保存茶香新鮮，隨時隨地只需搖勻即可享受，讓忙碌的生活多一份悠閒與暖心。', '2026-11-25 01:51:51'),
(2, 1, 1, '烏龍拿鐵', '烏龍茶香融合咖啡醇厚，雙重風味的烏龍拿鐵', 'A-00002', 70, 60, NULL, '烏龍拿鐵將清新的烏龍茶香與醇厚的咖啡結合，創造出獨特的層次感，讓每一口都充滿驚喜。\r\n選用頂級烏龍茶葉與新鮮研磨咖啡豆，搭配細緻奶泡，口感柔順不苦澀，適合想要換換口味的咖啡愛好者。\r\n低糖配方保留天然甘甜，提神又不易上火，無論是晨間提神或午後小憩，都能帶來舒適的暖意。\r\n方便即飲包裝，隨時隨地沖泡，讓你在忙碌生活中也能輕鬆享受精品咖啡與烏龍的雙重滋味。', '2026-11-25 02:38:32');

-- --------------------------------------------------------

--
-- 資料表結構 `product_label`
--

DROP TABLE IF EXISTS `product_label`;
CREATE TABLE `product_label` (
  `id` int(11) NOT NULL,
  `label` varchar(10) NOT NULL COMMENT '標籤名稱'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='產品標籤';

--
-- 傾印資料表的資料 `product_label`
--

INSERT INTO `product_label` (`id`, `label`) VALUES
(1, '新品'),
(2, '暢銷品');

-- --------------------------------------------------------

--
-- 資料表結構 `product_photo`
--

DROP TABLE IF EXISTS `product_photo`;
CREATE TABLE `product_photo` (
  `id` int(11) NOT NULL,
  `productId` int(11) DEFAULT NULL,
  `photo` varchar(30) DEFAULT NULL COMMENT '產品圖',
  `createTime` timestamp NOT NULL DEFAULT current_timestamp() COMMENT '建立時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='產品圖';

--
-- 傾印資料表的資料 `product_photo`
--

INSERT INTO `product_photo` (`id`, `productId`, `photo`, `createTime`) VALUES
(5, 1, '20261125_6b068c679ecac.jpg', '2026-11-25 07:21:11'),
(6, 1, '20261125_6b068c67a9acd.jpg', '2026-11-25 07:21:11');

-- --------------------------------------------------------

--
-- 資料表結構 `product_spec`
--

DROP TABLE IF EXISTS `product_spec`;
CREATE TABLE `product_spec` (
  `id` int(11) NOT NULL,
  `productId` int(11) DEFAULT NULL,
  `title` varchar(30) DEFAULT NULL COMMENT '規格名稱',
  `content` varchar(100) DEFAULT NULL COMMENT '規格內容',
  `createTime` timestamp NULL DEFAULT current_timestamp() COMMENT '建立時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='產品規格';

--
-- 傾印資料表的資料 `product_spec`
--

INSERT INTO `product_spec` (`id`, `productId`, `title`, `content`, `createTime`) VALUES
(1, 1, '規格', '123', '2026-11-25 07:19:15'),
(2, 1, 'asd', 'ko', '2026-11-25 07:20:38');

-- --------------------------------------------------------

--
-- 資料表結構 `product_type`
--

DROP TABLE IF EXISTS `product_type`;
CREATE TABLE `product_type` (
  `id` int(11) NOT NULL,
  `title` varchar(20) DEFAULT NULL COMMENT '系列名稱'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='產品分類';

--
-- 傾印資料表的資料 `product_type`
--

INSERT INTO `product_type` (`id`, `title`) VALUES
(1, '類別一'),
(3, '類別二'),
(4, '類別三');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `milestone`
--
ALTER TABLE `milestone`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `milestone_type`
--
ALTER TABLE `milestone_type`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `product_label`
--
ALTER TABLE `product_label`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `product_photo`
--
ALTER TABLE `product_photo`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `product_spec`
--
ALTER TABLE `product_spec`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `manager`
--
ALTER TABLE `manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `milestone`
--
ALTER TABLE `milestone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `milestone_type`
--
ALTER TABLE `milestone_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product_label`
--
ALTER TABLE `product_label`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product_photo`
--
ALTER TABLE `product_photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product_spec`
--
ALTER TABLE `product_spec`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product_type`
--
ALTER TABLE `product_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
