-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 18, 2017 at 05:46 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_dsd`
--

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `id` int(11) NOT NULL,
  `file_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อไฟล์',
  `file_type` varchar(15) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชนิดของไฟล์',
  `full_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ลักษณะเต็มของไฟล์',
  `full_path` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ที่อยู่ไฟล์แบบเต็ม',
  `raw_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อไฟล์',
  `orig_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อไฟล์เดิม',
  `client_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อไฟล์ใหม่',
  `file_ext` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'นามสกุลไฟล์',
  `file_size` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ขนาดไฟล์',
  `is_image` int(1) NOT NULL COMMENT 'เป็นรูปภาพ',
  `image_width` varchar(4) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ความกว้าง',
  `image_height` varchar(4) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ความสูง',
  `image_type` varchar(8) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชนิดรูปภาพ',
  `image_size_str` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ขนาดไฟล์แบบข้อความ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`id`, `file_name`, `file_type`, `full_type`, `full_path`, `raw_name`, `orig_name`, `client_name`, `file_ext`, `file_size`, `is_image`, `image_width`, `image_height`, `image_type`, `image_size_str`) VALUES
(1, '194568eced34c5b306876f5999430f34.jpg', 'image/jpeg', '', '/Applications/XAMPP/xamppfiles/htdocs/dsd/uploads/attachments/194568eced34c5b306876f5999430f34.jpg', '194568eced34c5b306876f5999430f34', '21192819_10203732376066715_661543635585608329_n.jpg', '21192819_10203732376066715_661543635585608329_n.jpg', '.jpg', '27.85', 1, '540', '303', 'jpeg', 'width=\"540\" height=\"303\"'),
(2, '94f8a446292ec24fff85904bb5f49dcb.jpg', 'image/jpeg', '', '/Applications/XAMPP/xamppfiles/htdocs/dsd/uploads/attachments/94f8a446292ec24fff85904bb5f49dcb.jpg', '94f8a446292ec24fff85904bb5f49dcb', 'test.jpg', 'test.jpg', '.jpg', '55.92', 1, '564', '448', 'jpeg', 'width=\"564\" height=\"448\"');

-- --------------------------------------------------------

--
-- Table structure for table `assets_by`
--

CREATE TABLE `assets_by` (
  `id` int(11) NOT NULL,
  `asset_id` int(11) NOT NULL COMMENT 'ไอดีไฟล์',
  `user_id` int(11) NOT NULL COMMENT 'ไอดีผู้อัพโหลด',
  `upload_date` varchar(11) COLLATE utf8_unicode_ci NOT NULL COMMENT 'วันที่อัพโหลด',
  `is_avatar` int(1) NOT NULL COMMENT 'เป็นรูปโปรไฟล์'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `assets_by`
--

INSERT INTO `assets_by` (`id`, `asset_id`, `user_id`, `upload_date`, `is_avatar`) VALUES
(1, 1, 4, '1508337502', 0),
(2, 2, 4, '1508340738', 0);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL COMMENT 'ชื่อกลุ่ม',
  `description` varchar(100) NOT NULL COMMENT 'คำอธิบายกลุ่ม'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL COMMENT 'ไอพีแอดเดรส',
  `login` varchar(100) NOT NULL COMMENT 'รหัสล็อกอิน',
  `time` int(11) UNSIGNED DEFAULT NULL COMMENT 'จำนวนครั้ง'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL COMMENT 'ไอดีผู้โพสต์',
  `date_create` varchar(11) NOT NULL COMMENT 'วันที่บันทึก',
  `date_update` varchar(11) DEFAULT NULL COMMENT 'วันที่แก้ไข',
  `title` varchar(255) NOT NULL COMMENT 'หัวข้อโพสต์',
  `detail` text NOT NULL COMMENT 'เนื้อหาโพสต์',
  `category` varchar(100) NOT NULL COMMENT 'หมวดหมู่โพสต์',
  `views` int(6) NOT NULL COMMENT 'จำนวนการคลิก',
  `pinned` int(1) NOT NULL COMMENT 'ตั้งค่าปักหมุด',
  `assets_id` text NOT NULL COMMENT 'ไอดีไฟล์เอกสาร'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `author_id`, `date_create`, `date_update`, `title`, `detail`, `category`, `views`, `pinned`, `assets_id`) VALUES
(1, 4, '1505057539', '1508336440', 'Lorem Ipsum คือ เนื้อหาจำลองแบบเรียบๆ ที่ใช้กันในธุรกิจงานพิมพ์หรืองานเรียงพิมพ์', '<p></p><div><h2>Lorem Ipsum คืออะไร?</h2><p>Lorem Ipsum คือ เนื้อหาจำลองแบบเรียบๆ ที่ใช้กันในธุรกิจงานพิมพ์หรืองานเรียงพิมพ์ มันได้กลายมาเป็นเนื้อหาจำลองมาตรฐานของธุรกิจดังกล่าวมาตั้งแต่ศตวรรษที่ 16 เมื่อเครื่องพิมพ์โนเนมเครื่องหนึ่งนำรางตัวพิมพ์มาสลับสับตำแหน่งตัวอักษรเพื่อทำหนังสือตัวอย่าง Lorem Ipsum อยู่ยงคงกระพันมาไม่ใช่แค่เพียงห้าศตวรรษ แต่อยู่มาจนถึงยุคที่พลิกโฉมเข้าสู่งานเรียงพิมพ์ด้วยวิธีทางอิเล็กทรอนิกส์ และยังคงสภาพเดิมไว้อย่างไม่มีการเปลี่ยนแปลง มันได้รับความนิยมมากขึ้นในยุค ค.ศ. 1960 เมื่อแผ่น Letraset วางจำหน่ายโดยมีข้อความบนนั้นเป็น Lorem Ipsum และล่าสุดกว่านั้น คือเมื่อซอฟท์แวร์การทำสื่อสิ่งพิมพ์ (Desktop Publishing) อย่าง Aldus PageMaker ได้รวมเอา Lorem Ipsum เวอร์ชั่นต่างๆ เข้าไว้ในซอฟท์แวร์ด้วย</p><p><br></p><p><img alt=\"\" src=\"https://i.pinimg.com/564x/fb/f4/c4/fbf4c4bb17f645819fd2ac072b7423fb.jpg\"><br></p><p><br></p></div><div><h2>ทำไมจึงต้องนำมาใช้?</h2><p>มีหลักฐานที่เป็นข้อเท็จจริงยืนยันมานานแล้ว ว่าเนื้อหาที่อ่านรู้เรื่องนั้นจะไปกวนสมาธิของคนอ่านให้เขวไปจากส่วนที้เป็น Layout เรานำ Lorem Ipsum มาใช้เพราะความที่มันมีการกระจายของตัวอักษรธรรมดาๆ แบบพอประมาณ ซึ่งเอามาใช้แทนการเขียนว่า ‘ตรงนี้เป็นเนื้อหา, ตรงนี้เป็นเนื้อหา\' ได้ และยังทำให้มองดูเหมือนกับภาษาอังกฤษที่อ่านได้ปกติ ปัจจุบันมีแพ็กเกจของซอฟท์แวร์การทำสื่อสิ่งพิมพ์ และซอฟท์แวร์การสร้างเว็บเพจ (Web Page Editor) หลายตัวที่ใช้ Lorem Ipsum เป็นแบบจำลองเนื้อหาที่เป็นค่าตั้งต้น และเวลาที่เสิร์ชด้วยคำว่า \'lorem ipsum\' ผลการเสิร์ชที่ได้ก็จะไม่พบบรรดาเว็บไซต์ที่ยังคงอยู่ในช่วงเริ่มสร้างด้วย โดยหลายปีที่ผ่านมาก็มีการคิดค้นเวอร์ชั่นต่างๆ ของ Lorem Ipsum ขึ้นมาใช้ บ้างก็เป็นความบังเอิญ บ้างก็เป็นความตั้งใจ (เช่น การแอบแทรกมุกตลก)</p></div><br><div><h2>มันมีที่มาอย่างไร?</h2><p>ตรงกันข้ามกับความเชื่อที่นิยมกัน Lorem Ipsum ไม่ได้เป็นเพียงแค่ชุดตัวอักษรที่สุ่มขึ้นมามั่วๆ แต่หากมีที่มาจากวรรณกรรมละตินคลาสสิกชิ้นหนึ่งในยุค 45 ปีก่อนคริสตศักราช ทำให้มันมีอายุถึงกว่า 2000 ปีเลยทีเดียว ริชาร์ด แมคคลินท็อค ศาสตราจารย์ชาวละติน จากวิทยาลัยแฮมพ์เด็น-ซิดนีย์ ในรัฐเวอร์จิเนียร์ นำคำภาษาละตินคำว่า consectetur ซึ่งหาคำแปลไม่ได้จาก Lorem Ipsum ตอนหนึ่งมาค้นเพิ่มเติม โดยตรวจเทียบกับแหล่งอ้างอิงต่างๆ ในวรรณกรรมคลาสสิก และค้นพบแหล่งข้อมูลที่ไร้ข้อกังขาว่า Lorem Ipsum นั้นมาจากตอนที่ 1.10.32 และ 1.10.33 ของเรื่อง \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) ของ ซิเซโร ที่แต่งไว้เมื่อ 45 ปีก่อนคริสตศักราช หนังสือเล่มนี้เป็นเรื่องราวที่ว่าด้วยทฤษฎีแห่งจริยศาสตร์ ซึ่งเป็นที่นิยมมากในยุคเรเนสซองส์ บรรทัดแรกของ Lorem Ipsum \"Lorem ipsum dolor sit amet..\" ก็มาจากบรรทัดหนึ่งในตอนที่ 1.10.32 นั่นเอง</p><p>ด้านล่างของหน้านี้คือท่อนมาตรฐานของ Lorem Ipsum ที่ใช้กันมาตั้งแต่คริสตศตวรรษที่ 16ที่ได้รับการสร้างขึ้นใหม่สำหรับผู้ที่สนใจ ประกอบไปด้วย ตอนที่ 1.10.32 และ 1.10.33 จากเรื่อง \"de Finibus Bonorum et Malorum\" โดยซิเซโร ก็ได้รับการผลิตขึ้นใหม่ด้วยเช่นกันในรูปแบบที่ตรงกับต้นฉบับ ตามมาด้วยเวอร์ชั่นภาษาอังกฤษจากการแปลของ เอช แร็คแคม เมื่อปี ค.ศ. 1914</p></div><div><h2>จะนำมาใช้ได้จากที่ไหน?</h2><p>มีท่อนต่างๆ ของ Lorem Ipsum ให้หยิบมาใช้งานได้มากมาย แต่ส่วนใหญ่แล้วจะถูกนำไปปรับให้เป็นรูปแบบอื่นๆ อาจจะด้วยการสอดแทรกมุกตลก หรือด้วยคำที่มั่วขึ้นมาซึ่งถึงอย่างไรก็ไม่มีทางเป็นเรื่องจริงได้เลยแม้แต่น้อย ถ้าคุณกำลังคิดจะใช้ Lorem Ipsum สักท่อนหนึ่ง คุณจำเป็นจะต้องตรวจให้แน่ใจว่าไม่มีอะไรน่าอับอายซ่อนอยู่ภายในท่อนนั้นๆ ตัวสร้าง Lorem Ipsum บนอินเทอร์เน็ตทุกตัวมักจะเอาท่อนที่แน่ใจแล้วมาใช้ซ้ำๆ ทำให้กลายเป็นที่มาของตัวสร้างที่แท้จริงบนอินเทอร์เน็ต ในการสร้าง Lorem Ipsum ที่ดูเข้าท่า ต้องใช้คำจากพจนานุกรมภาษาละตินถึงกว่า 200 คำ ผสมกับรูปแบบโครงสร้างประโยคอีกจำนวนหนึ่ง เพราะฉะนั้น Lorem Ipsum ที่ถูกสร้างขึ้นใหม่นี้ก็จะไม่ซ้ำไปซ้ำมา ไม่มีมุกตลกซุกแฝงไว้ภายใน หรือไม่มีคำใดๆ ที่ไม่บ่งบอกความหมาย</p></div><p></p>', 'ประชาสัมพันธ์', 65, 0, ''),
(3, 4, '1505058251', '1505108198', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit', '<p></p><div><h2>Lorem Ipsum คืออะไร?</h2><p>Lorem Ipsum คือ เนื้อหาจำลองแบบเรียบๆ ที่ใช้กันในธุรกิจงานพิมพ์หรืองานเรียงพิมพ์ มันได้กลายมาเป็นเนื้อหาจำลองมาตรฐานของธุรกิจดังกล่าวมาตั้งแต่ศตวรรษที่ 16 เมื่อเครื่องพิมพ์โนเนมเครื่องหนึ่งนำรางตัวพิมพ์มาสลับสับตำแหน่งตัวอักษรเพื่อทำหนังสือตัวอย่าง Lorem Ipsum อยู่ยงคงกระพันมาไม่ใช่แค่เพียงห้าศตวรรษ แต่อยู่มาจนถึงยุคที่พลิกโฉมเข้าสู่งานเรียงพิมพ์ด้วยวิธีทางอิเล็กทรอนิกส์ และยังคงสภาพเดิมไว้อย่างไม่มีการเปลี่ยนแปลง มันได้รับความนิยมมากขึ้นในยุค ค.ศ. 1960 เมื่อแผ่น Letraset วางจำหน่ายโดยมีข้อความบนนั้นเป็น Lorem Ipsum และล่าสุดกว่านั้น คือเมื่อซอฟท์แวร์การทำสื่อสิ่งพิมพ์ (Desktop Publishing) อย่าง Aldus PageMaker ได้รวมเอา Lorem Ipsum เวอร์ชั่นต่างๆ เข้าไว้ในซอฟท์แวร์ด้วย</p></div><div><h2>ทำไมจึงต้องนำมาใช้?</h2><p>มีหลักฐานที่เป็นข้อเท็จจริงยืนยันมานานแล้ว ว่าเนื้อหาที่อ่านรู้เรื่องนั้นจะไปกวนสมาธิของคนอ่านให้เขวไปจากส่วนที้เป็น Layout เรานำ Lorem Ipsum มาใช้เพราะความที่มันมีการกระจายของตัวอักษรธรรมดาๆ แบบพอประมาณ ซึ่งเอามาใช้แทนการเขียนว่า ‘ตรงนี้เป็นเนื้อหา, ตรงนี้เป็นเนื้อหา\' ได้ และยังทำให้มองดูเหมือนกับภาษาอังกฤษที่อ่านได้ปกติ ปัจจุบันมีแพ็กเกจของซอฟท์แวร์การทำสื่อสิ่งพิมพ์ และซอฟท์แวร์การสร้างเว็บเพจ (Web Page Editor) หลายตัวที่ใช้ Lorem Ipsum เป็นแบบจำลองเนื้อหาที่เป็นค่าตั้งต้น และเวลาที่เสิร์ชด้วยคำว่า \'lorem ipsum\' ผลการเสิร์ชที่ได้ก็จะไม่พบบรรดาเว็บไซต์ที่ยังคงอยู่ในช่วงเริ่มสร้างด้วย โดยหลายปีที่ผ่านมาก็มีการคิดค้นเวอร์ชั่นต่างๆ ของ Lorem Ipsum ขึ้นมาใช้ บ้างก็เป็นความบังเอิญ บ้างก็เป็นความตั้งใจ (เช่น การแอบแทรกมุกตลก)</p></div><br><div><h2>มันมีที่มาอย่างไร?</h2><p>ตรงกันข้ามกับความเชื่อที่นิยมกัน Lorem Ipsum ไม่ได้เป็นเพียงแค่ชุดตัวอักษรที่สุ่มขึ้นมามั่วๆ แต่หากมีที่มาจากวรรณกรรมละตินคลาสสิกชิ้นหนึ่งในยุค 45 ปีก่อนคริสตศักราช ทำให้มันมีอายุถึงกว่า 2000 ปีเลยทีเดียว ริชาร์ด แมคคลินท็อค ศาสตราจารย์ชาวละติน จากวิทยาลัยแฮมพ์เด็น-ซิดนีย์ ในรัฐเวอร์จิเนียร์ นำคำภาษาละตินคำว่า consectetur ซึ่งหาคำแปลไม่ได้จาก Lorem Ipsum ตอนหนึ่งมาค้นเพิ่มเติม โดยตรวจเทียบกับแหล่งอ้างอิงต่างๆ ในวรรณกรรมคลาสสิก และค้นพบแหล่งข้อมูลที่ไร้ข้อกังขาว่า Lorem Ipsum นั้นมาจากตอนที่ 1.10.32 และ 1.10.33 ของเรื่อง \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) ของ ซิเซโร ที่แต่งไว้เมื่อ 45 ปีก่อนคริสตศักราช หนังสือเล่มนี้เป็นเรื่องราวที่ว่าด้วยทฤษฎีแห่งจริยศาสตร์ ซึ่งเป็นที่นิยมมากในยุคเรเนสซองส์ บรรทัดแรกของ Lorem Ipsum \"Lorem ipsum dolor sit amet..\" ก็มาจากบรรทัดหนึ่งในตอนที่ 1.10.32 นั่นเอง</p><p>ด้านล่างของหน้านี้คือท่อนมาตรฐานของ Lorem Ipsum ที่ใช้กันมาตั้งแต่คริสตศตวรรษที่ 16ที่ได้รับการสร้างขึ้นใหม่สำหรับผู้ที่สนใจ ประกอบไปด้วย ตอนที่ 1.10.32 และ 1.10.33 จากเรื่อง \"de Finibus Bonorum et Malorum\" โดยซิเซโร ก็ได้รับการผลิตขึ้นใหม่ด้วยเช่นกันในรูปแบบที่ตรงกับต้นฉบับ ตามมาด้วยเวอร์ชั่นภาษาอังกฤษจากการแปลของ เอช แร็คแคม เมื่อปี ค.ศ. 1914</p></div><div><h2>จะนำมาใช้ได้จากที่ไหน?</h2><p>มีท่อนต่างๆ ของ Lorem Ipsum ให้หยิบมาใช้งานได้มากมาย แต่ส่วนใหญ่แล้วจะถูกนำไปปรับให้เป็นรูปแบบอื่นๆ อาจจะด้วยการสอดแทรกมุกตลก หรือด้วยคำที่มั่วขึ้นมาซึ่งถึงอย่างไรก็ไม่มีทางเป็นเรื่องจริงได้เลยแม้แต่น้อย ถ้าคุณกำลังคิดจะใช้ Lorem Ipsum สักท่อนหนึ่ง คุณจำเป็นจะต้องตรวจให้แน่ใจว่าไม่มีอะไรน่าอับอายซ่อนอยู่ภายในท่อนนั้นๆ ตัวสร้าง Lorem Ipsum บนอินเทอร์เน็ตทุกตัวมักจะเอาท่อนที่แน่ใจแล้วมาใช้ซ้ำๆ ทำให้กลายเป็นที่มาของตัวสร้างที่แท้จริงบนอินเทอร์เน็ต ในการสร้าง Lorem Ipsum ที่ดูเข้าท่า ต้องใช้คำจากพจนานุกรมภาษาละตินถึงกว่า 200 คำ ผสมกับรูปแบบโครงสร้างประโยคอีกจำนวนหนึ่ง เพราะฉะนั้น Lorem Ipsum ที่ถูกสร้างขึ้นใหม่นี้ก็จะไม่ซ้ำไปซ้ำมา ไม่มีมุกตลกซุกแฝงไว้ภายใน หรือไม่มีคำใดๆ ที่ไม่บ่งบอกความหมาย</p></div><p></p>', 'ข่าวสารทั่วไป', 4, 0, ''),
(4, 4, '1505108225', NULL, 'ไม่มีผู้ใดที่สมัครรักใคร่ในความเจ็บปวด หรือเสาะแสวงหาและปรารถนาจะครอบครองความเจ็บปวด', '<p></p><div><h2>Lorem Ipsum คืออะไร?</h2><p>Lorem Ipsum คือ เนื้อหาจำลองแบบเรียบๆ ที่ใช้กันในธุรกิจงานพิมพ์หรืองานเรียงพิมพ์ มันได้กลายมาเป็นเนื้อหาจำลองมาตรฐานของธุรกิจดังกล่าวมาตั้งแต่ศตวรรษที่ 16 เมื่อเครื่องพิมพ์โนเนมเครื่องหนึ่งนำรางตัวพิมพ์มาสลับสับตำแหน่งตัวอักษรเพื่อทำหนังสือตัวอย่าง Lorem Ipsum อยู่ยงคงกระพันมาไม่ใช่แค่เพียงห้าศตวรรษ แต่อยู่มาจนถึงยุคที่พลิกโฉมเข้าสู่งานเรียงพิมพ์ด้วยวิธีทางอิเล็กทรอนิกส์ และยังคงสภาพเดิมไว้อย่างไม่มีการเปลี่ยนแปลง มันได้รับความนิยมมากขึ้นในยุค ค.ศ. 1960 เมื่อแผ่น Letraset วางจำหน่ายโดยมีข้อความบนนั้นเป็น Lorem Ipsum และล่าสุดกว่านั้น คือเมื่อซอฟท์แวร์การทำสื่อสิ่งพิมพ์ (Desktop Publishing) อย่าง Aldus PageMaker ได้รวมเอา Lorem Ipsum เวอร์ชั่นต่างๆ เข้าไว้ในซอฟท์แวร์ด้วย</p></div><div><h2>ทำไมจึงต้องนำมาใช้?</h2><p>มีหลักฐานที่เป็นข้อเท็จจริงยืนยันมานานแล้ว ว่าเนื้อหาที่อ่านรู้เรื่องนั้นจะไปกวนสมาธิของคนอ่านให้เขวไปจากส่วนที้เป็น Layout เรานำ Lorem Ipsum มาใช้เพราะความที่มันมีการกระจายของตัวอักษรธรรมดาๆ แบบพอประมาณ ซึ่งเอามาใช้แทนการเขียนว่า ‘ตรงนี้เป็นเนื้อหา, ตรงนี้เป็นเนื้อหา\' ได้ และยังทำให้มองดูเหมือนกับภาษาอังกฤษที่อ่านได้ปกติ ปัจจุบันมีแพ็กเกจของซอฟท์แวร์การทำสื่อสิ่งพิมพ์ และซอฟท์แวร์การสร้างเว็บเพจ (Web Page Editor) หลายตัวที่ใช้ Lorem Ipsum เป็นแบบจำลองเนื้อหาที่เป็นค่าตั้งต้น และเวลาที่เสิร์ชด้วยคำว่า \'lorem ipsum\' ผลการเสิร์ชที่ได้ก็จะไม่พบบรรดาเว็บไซต์ที่ยังคงอยู่ในช่วงเริ่มสร้างด้วย โดยหลายปีที่ผ่านมาก็มีการคิดค้นเวอร์ชั่นต่างๆ ของ Lorem Ipsum ขึ้นมาใช้ บ้างก็เป็นความบังเอิญ บ้างก็เป็นความตั้งใจ (เช่น การแอบแทรกมุกตลก)</p></div><br><div><h2>มันมีที่มาอย่างไร?</h2><p>ตรงกันข้ามกับความเชื่อที่นิยมกัน Lorem Ipsum ไม่ได้เป็นเพียงแค่ชุดตัวอักษรที่สุ่มขึ้นมามั่วๆ แต่หากมีที่มาจากวรรณกรรมละตินคลาสสิกชิ้นหนึ่งในยุค 45 ปีก่อนคริสตศักราช ทำให้มันมีอายุถึงกว่า 2000 ปีเลยทีเดียว ริชาร์ด แมคคลินท็อค ศาสตราจารย์ชาวละติน จากวิทยาลัยแฮมพ์เด็น-ซิดนีย์ ในรัฐเวอร์จิเนียร์ นำคำภาษาละตินคำว่า consectetur ซึ่งหาคำแปลไม่ได้จาก Lorem Ipsum ตอนหนึ่งมาค้นเพิ่มเติม โดยตรวจเทียบกับแหล่งอ้างอิงต่างๆ ในวรรณกรรมคลาสสิก และค้นพบแหล่งข้อมูลที่ไร้ข้อกังขาว่า Lorem Ipsum นั้นมาจากตอนที่ 1.10.32 และ 1.10.33 ของเรื่อง \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) ของ ซิเซโร ที่แต่งไว้เมื่อ 45 ปีก่อนคริสตศักราช หนังสือเล่มนี้เป็นเรื่องราวที่ว่าด้วยทฤษฎีแห่งจริยศาสตร์ ซึ่งเป็นที่นิยมมากในยุคเรเนสซองส์ บรรทัดแรกของ Lorem Ipsum \"Lorem ipsum dolor sit amet..\" ก็มาจากบรรทัดหนึ่งในตอนที่ 1.10.32 นั่นเอง</p><p>ด้านล่างของหน้านี้คือท่อนมาตรฐานของ Lorem Ipsum ที่ใช้กันมาตั้งแต่คริสตศตวรรษที่ 16ที่ได้รับการสร้างขึ้นใหม่สำหรับผู้ที่สนใจ ประกอบไปด้วย ตอนที่ 1.10.32 และ 1.10.33 จากเรื่อง \"de Finibus Bonorum et Malorum\" โดยซิเซโร ก็ได้รับการผลิตขึ้นใหม่ด้วยเช่นกันในรูปแบบที่ตรงกับต้นฉบับ ตามมาด้วยเวอร์ชั่นภาษาอังกฤษจากการแปลของ เอช แร็คแคม เมื่อปี ค.ศ. 1914</p></div><div><h2>จะนำมาใช้ได้จากที่ไหน?</h2><p>มีท่อนต่างๆ ของ Lorem Ipsum ให้หยิบมาใช้งานได้มากมาย แต่ส่วนใหญ่แล้วจะถูกนำไปปรับให้เป็นรูปแบบอื่นๆ อาจจะด้วยการสอดแทรกมุกตลก หรือด้วยคำที่มั่วขึ้นมาซึ่งถึงอย่างไรก็ไม่มีทางเป็นเรื่องจริงได้เลยแม้แต่น้อย ถ้าคุณกำลังคิดจะใช้ Lorem Ipsum สักท่อนหนึ่ง คุณจำเป็นจะต้องตรวจให้แน่ใจว่าไม่มีอะไรน่าอับอายซ่อนอยู่ภายในท่อนนั้นๆ ตัวสร้าง Lorem Ipsum บนอินเทอร์เน็ตทุกตัวมักจะเอาท่อนที่แน่ใจแล้วมาใช้ซ้ำๆ ทำให้กลายเป็นที่มาของตัวสร้างที่แท้จริงบนอินเทอร์เน็ต ในการสร้าง Lorem Ipsum ที่ดูเข้าท่า ต้องใช้คำจากพจนานุกรมภาษาละตินถึงกว่า 200 คำ ผสมกับรูปแบบโครงสร้างประโยคอีกจำนวนหนึ่ง เพราะฉะนั้น Lorem Ipsum ที่ถูกสร้างขึ้นใหม่นี้ก็จะไม่ซ้ำไปซ้ำมา ไม่มีมุกตลกซุกแฝงไว้ภายใน หรือไม่มีคำใดๆ ที่ไม่บ่งบอกความหมาย</p></div><br><p></p>', 'ประกาศผลการสอบ', 2, 0, ''),
(5, 4, '1505110838', NULL, 'ด้านล่างของหน้านี้คือท่อนมาตรฐานของ Lorem Ipsum ที่ใช้กันมาตั้งแต่คริสตศตวรรษที่ 16', '<p></p><div><h2>Lorem Ipsum คืออะไร?</h2><p>Lorem Ipsum คือ เนื้อหาจำลองแบบเรียบๆ ที่ใช้กันในธุรกิจงานพิมพ์หรืองานเรียงพิมพ์ มันได้กลายมาเป็นเนื้อหาจำลองมาตรฐานของธุรกิจดังกล่าวมาตั้งแต่ศตวรรษที่ 16 เมื่อเครื่องพิมพ์โนเนมเครื่องหนึ่งนำรางตัวพิมพ์มาสลับสับตำแหน่งตัวอักษรเพื่อทำหนังสือตัวอย่าง Lorem Ipsum อยู่ยงคงกระพันมาไม่ใช่แค่เพียงห้าศตวรรษ แต่อยู่มาจนถึงยุคที่พลิกโฉมเข้าสู่งานเรียงพิมพ์ด้วยวิธีทางอิเล็กทรอนิกส์ และยังคงสภาพเดิมไว้อย่างไม่มีการเปลี่ยนแปลง มันได้รับความนิยมมากขึ้นในยุค ค.ศ. 1960 เมื่อแผ่น Letraset วางจำหน่ายโดยมีข้อความบนนั้นเป็น Lorem Ipsum และล่าสุดกว่านั้น คือเมื่อซอฟท์แวร์การทำสื่อสิ่งพิมพ์ (Desktop Publishing) อย่าง Aldus PageMaker ได้รวมเอา Lorem Ipsum เวอร์ชั่นต่างๆ เข้าไว้ในซอฟท์แวร์ด้วย</p></div><div><h2>ทำไมจึงต้องนำมาใช้?</h2><p>มีหลักฐานที่เป็นข้อเท็จจริงยืนยันมานานแล้ว ว่าเนื้อหาที่อ่านรู้เรื่องนั้นจะไปกวนสมาธิของคนอ่านให้เขวไปจากส่วนที้เป็น Layout เรานำ Lorem Ipsum มาใช้เพราะความที่มันมีการกระจายของตัวอักษรธรรมดาๆ แบบพอประมาณ ซึ่งเอามาใช้แทนการเขียนว่า ‘ตรงนี้เป็นเนื้อหา, ตรงนี้เป็นเนื้อหา\' ได้ และยังทำให้มองดูเหมือนกับภาษาอังกฤษที่อ่านได้ปกติ ปัจจุบันมีแพ็กเกจของซอฟท์แวร์การทำสื่อสิ่งพิมพ์ และซอฟท์แวร์การสร้างเว็บเพจ (Web Page Editor) หลายตัวที่ใช้ Lorem Ipsum เป็นแบบจำลองเนื้อหาที่เป็นค่าตั้งต้น และเวลาที่เสิร์ชด้วยคำว่า \'lorem ipsum\' ผลการเสิร์ชที่ได้ก็จะไม่พบบรรดาเว็บไซต์ที่ยังคงอยู่ในช่วงเริ่มสร้างด้วย โดยหลายปีที่ผ่านมาก็มีการคิดค้นเวอร์ชั่นต่างๆ ของ Lorem Ipsum ขึ้นมาใช้ บ้างก็เป็นความบังเอิญ บ้างก็เป็นความตั้งใจ (เช่น การแอบแทรกมุกตลก)</p></div><br><div><h2>มันมีที่มาอย่างไร?</h2><p>ตรงกันข้ามกับความเชื่อที่นิยมกัน Lorem Ipsum ไม่ได้เป็นเพียงแค่ชุดตัวอักษรที่สุ่มขึ้นมามั่วๆ แต่หากมีที่มาจากวรรณกรรมละตินคลาสสิกชิ้นหนึ่งในยุค 45 ปีก่อนคริสตศักราช ทำให้มันมีอายุถึงกว่า 2000 ปีเลยทีเดียว ริชาร์ด แมคคลินท็อค ศาสตราจารย์ชาวละติน จากวิทยาลัยแฮมพ์เด็น-ซิดนีย์ ในรัฐเวอร์จิเนียร์ นำคำภาษาละตินคำว่า consectetur ซึ่งหาคำแปลไม่ได้จาก Lorem Ipsum ตอนหนึ่งมาค้นเพิ่มเติม โดยตรวจเทียบกับแหล่งอ้างอิงต่างๆ ในวรรณกรรมคลาสสิก และค้นพบแหล่งข้อมูลที่ไร้ข้อกังขาว่า Lorem Ipsum นั้นมาจากตอนที่ 1.10.32 และ 1.10.33 ของเรื่อง \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) ของ ซิเซโร ที่แต่งไว้เมื่อ 45 ปีก่อนคริสตศักราช หนังสือเล่มนี้เป็นเรื่องราวที่ว่าด้วยทฤษฎีแห่งจริยศาสตร์ ซึ่งเป็นที่นิยมมากในยุคเรเนสซองส์ บรรทัดแรกของ Lorem Ipsum \"Lorem ipsum dolor sit amet..\" ก็มาจากบรรทัดหนึ่งในตอนที่ 1.10.32 นั่นเอง</p><p>ด้านล่างของหน้านี้คือท่อนมาตรฐานของ Lorem Ipsum ที่ใช้กันมาตั้งแต่คริสตศตวรรษที่ 16ที่ได้รับการสร้างขึ้นใหม่สำหรับผู้ที่สนใจ ประกอบไปด้วย ตอนที่ 1.10.32 และ 1.10.33 จากเรื่อง \"de Finibus Bonorum et Malorum\" โดยซิเซโร ก็ได้รับการผลิตขึ้นใหม่ด้วยเช่นกันในรูปแบบที่ตรงกับต้นฉบับ ตามมาด้วยเวอร์ชั่นภาษาอังกฤษจากการแปลของ เอช แร็คแคม เมื่อปี ค.ศ. 1914</p></div><div><h2>จะนำมาใช้ได้จากที่ไหน?</h2><p>มีท่อนต่างๆ ของ Lorem Ipsum ให้หยิบมาใช้งานได้มากมาย แต่ส่วนใหญ่แล้วจะถูกนำไปปรับให้เป็นรูปแบบอื่นๆ อาจจะด้วยการสอดแทรกมุกตลก หรือด้วยคำที่มั่วขึ้นมาซึ่งถึงอย่างไรก็ไม่มีทางเป็นเรื่องจริงได้เลยแม้แต่น้อย ถ้าคุณกำลังคิดจะใช้ Lorem Ipsum สักท่อนหนึ่ง คุณจำเป็นจะต้องตรวจให้แน่ใจว่าไม่มีอะไรน่าอับอายซ่อนอยู่ภายในท่อนนั้นๆ ตัวสร้าง Lorem Ipsum บนอินเทอร์เน็ตทุกตัวมักจะเอาท่อนที่แน่ใจแล้วมาใช้ซ้ำๆ ทำให้กลายเป็นที่มาของตัวสร้างที่แท้จริงบนอินเทอร์เน็ต ในการสร้าง Lorem Ipsum ที่ดูเข้าท่า ต้องใช้คำจากพจนานุกรมภาษาละตินถึงกว่า 200 คำ ผสมกับรูปแบบโครงสร้างประโยคอีกจำนวนหนึ่ง เพราะฉะนั้น Lorem Ipsum ที่ถูกสร้างขึ้นใหม่นี้ก็จะไม่ซ้ำไปซ้ำมา ไม่มีมุกตลกซุกแฝงไว้ภายใน หรือไม่มีคำใดๆ ที่ไม่บ่งบอกความหมาย</p></div><br><p></p>', 'ข่าวสารทั่วไป', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ไอพีแอดเดรส',
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'เวลาล็อกอิน',
  `data` blob NOT NULL COMMENT 'รหัสล็อกอิน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('0id8kav5c8f00cbq0htmpuoik9q6bjcp', '::1', 1508336142, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383333353935323b6964656e746974797c733a31353a2261646d696e40656d61696c2e636f6d223b656d61696c7c733a31353a2261646d696e40656d61696c2e636f6d223b757365725f69647c733a313a2234223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353038333238343634223b6c6173745f636865636b7c693a313530383333343633313b7761726e696e677c733a303a22223b5f5f63695f766172737c613a313a7b733a373a227761726e696e67223b733a333a226f6c64223b7d),
('14gdtntf6fg8eu7b1dv4gg0g5jdqb32b', '::1', 1508332388, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383333323235303b6964656e746974797c733a31353a2261646d696e40656d61696c2e636f6d223b656d61696c7c733a31353a2261646d696e40656d61696c2e636f6d223b757365725f69647c733a313a2234223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353038333234313733223b6c6173745f636865636b7c693a313530383332383436343b7761726e696e677c733a303a22223b5f5f63695f766172737c613a313a7b733a373a227761726e696e67223b733a333a226e6577223b7d),
('3vfef4sqef723bt19ppbekcet5aa22rp', '::1', 1508335905, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383333353633363b6964656e746974797c733a31353a2261646d696e40656d61696c2e636f6d223b656d61696c7c733a31353a2261646d696e40656d61696c2e636f6d223b757365725f69647c733a313a2234223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353038333238343634223b6c6173745f636865636b7c693a313530383333343633313b),
('4lpmcb2gge1qir3frbs3ri1ce0bkbar0', '::1', 1508335283, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383333343939363b6964656e746974797c733a31353a2261646d696e40656d61696c2e636f6d223b656d61696c7c733a31353a2261646d696e40656d61696c2e636f6d223b757365725f69647c733a313a2234223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353038333238343634223b6c6173745f636865636b7c693a313530383333343633313b5f5f63695f766172737c613a323a7b733a373a2273756363657373223b733a333a226f6c64223b733a373a227761726e696e67223b733a333a226e6577223b7d737563636573737c733a35343a22e0b89ae0b8b1e0b899e0b897e0b8b6e0b881e0b882e0b989e0b8ade0b8a1e0b8b9e0b8a5e0b8aae0b8b3e0b980e0b8a3e0b987e0b888223b7761726e696e677c733a303a22223b),
('7tvf33fqb6dir70gibmj99sa9c3kj8ic', '::1', 1508333881, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383333333636303b6964656e746974797c733a31343a226e6f746540656d61696c2e636f6d223b656d61696c7c733a31343a226e6f746540656d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353038333232353635223b6c6173745f636865636b7c693a313530383333333636373b),
('8jrcdavpt7b1458cag8jolh8epm9u4od', '::1', 1508341231, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383334303939383b6964656e746974797c733a31353a2261646d696e40656d61696c2e636f6d223b656d61696c7c733a31353a2261646d696e40656d61696c2e636f6d223b757365725f69647c733a313a2234223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353038333238343634223b6c6173745f636865636b7c693a313530383333343633313b),
('97vvts7fbr9q003enmcmveq7smnq2v14', '::1', 1508336442, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383333363336383b6964656e746974797c733a31353a2261646d696e40656d61696c2e636f6d223b656d61696c7c733a31353a2261646d696e40656d61696c2e636f6d223b757365725f69647c733a313a2234223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353038333238343634223b6c6173745f636865636b7c693a313530383333343633313b7761726e696e677c733a303a22223b5f5f63695f766172737c613a313a7b733a373a227761726e696e67223b733a333a226e6577223b7d),
('9tjrav1epmjliih0evjrk3fb52j4k6qb', '::1', 1508339540, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383333393234373b6964656e746974797c733a31353a2261646d696e40656d61696c2e636f6d223b656d61696c7c733a31353a2261646d696e40656d61696c2e636f6d223b757365725f69647c733a313a2234223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353038333238343634223b6c6173745f636865636b7c693a313530383333343633313b),
('bmfpns80acf8oa4bmn12nfg3uet8inhb', '::1', 1508334871, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383333343632363b6964656e746974797c733a31353a2261646d696e40656d61696c2e636f6d223b656d61696c7c733a31353a2261646d696e40656d61696c2e636f6d223b757365725f69647c733a313a2234223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353038333238343634223b6c6173745f636865636b7c693a313530383333343633313b5f5f63695f766172737c613a323a7b733a373a2273756363657373223b733a333a226f6c64223b733a373a227761726e696e67223b733a333a226e6577223b7d737563636573737c733a35343a22e0b89ae0b8b1e0b899e0b897e0b8b6e0b881e0b882e0b989e0b8ade0b8a1e0b8b9e0b8a5e0b8aae0b8b3e0b980e0b8a3e0b987e0b888223b7761726e696e677c733a303a22223b),
('degiklcef3atjfab4rgede5h14elmru7', '::1', 1508341566, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383334313436393b6964656e746974797c733a31353a2261646d696e40656d61696c2e636f6d223b656d61696c7c733a31353a2261646d696e40656d61696c2e636f6d223b757365725f69647c733a313a2234223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353038333238343634223b6c6173745f636865636b7c693a313530383333343633313b),
('e8qurku0b5aakv9i1fhl2g77jgb4f0jf', '::1', 1508340743, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383334303530343b6964656e746974797c733a31353a2261646d696e40656d61696c2e636f6d223b656d61696c7c733a31353a2261646d696e40656d61696c2e636f6d223b757365725f69647c733a313a2234223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353038333238343634223b6c6173745f636865636b7c693a313530383333343633313b7761726e696e677c733a303a22223b5f5f63695f766172737c613a313a7b733a373a227761726e696e67223b733a333a226e6577223b7d),
('fg2gfof3r44agi1qeld2ahv2iiulcuci', '::1', 1508338054, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383333383031313b6964656e746974797c733a31353a2261646d696e40656d61696c2e636f6d223b656d61696c7c733a31353a2261646d696e40656d61696c2e636f6d223b757365725f69647c733a313a2234223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353038333238343634223b6c6173745f636865636b7c693a313530383333343633313b),
('h37g675kr48j9gp0eoqpnl6bt1ur20o9', '::1', 1508331259, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383333313234323b6964656e746974797c733a31353a2261646d696e40656d61696c2e636f6d223b656d61696c7c733a31353a2261646d696e40656d61696c2e636f6d223b757365725f69647c733a313a2234223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353038333234313733223b6c6173745f636865636b7c693a313530383332383436343b7761726e696e677c733a303a22223b5f5f63695f766172737c613a313a7b733a373a227761726e696e67223b733a333a226f6c64223b7d),
('i3ntrcs0dh54uipqvqu2enom2dk8mlpj', '::1', 1508339852, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383333393638303b6964656e746974797c733a31353a2261646d696e40656d61696c2e636f6d223b656d61696c7c733a31353a2261646d696e40656d61696c2e636f6d223b757365725f69647c733a313a2234223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353038333238343634223b6c6173745f636865636b7c693a313530383333343633313b),
('none1aafakevqfjusntn41a99o9469f1', '::1', 1508333657, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383333323737393b6964656e746974797c733a31353a2261646d696e40656d61696c2e636f6d223b656d61696c7c733a31353a2261646d696e40656d61696c2e636f6d223b757365725f69647c733a313a2234223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353038333234313733223b6c6173745f636865636b7c693a313530383332383436343b7761726e696e677c733a303a22223b5f5f63695f766172737c613a313a7b733a373a227761726e696e67223b733a333a226f6c64223b7d),
('o4gcj3abiiom3etgff346r2on9s51e02', '::1', 1508337566, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383333373337353b6964656e746974797c733a31353a2261646d696e40656d61696c2e636f6d223b656d61696c7c733a31353a2261646d696e40656d61696c2e636f6d223b757365725f69647c733a313a2234223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353038333238343634223b6c6173745f636865636b7c693a313530383333343633313b),
('vo6bf15fq8cgbsf6pidcdhqi498l3a6p', '::1', 1508335610, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383333353333353b6964656e746974797c733a31353a2261646d696e40656d61696c2e636f6d223b656d61696c7c733a31353a2261646d696e40656d61696c2e636f6d223b757365725f69647c733a313a2234223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353038333238343634223b6c6173745f636865636b7c693a313530383333343633313b7761726e696e677c733a3233313a223c703ee0b882e0b989e0b8ade0b8a1e0b8b9e0b8a52020e0b8aae0b896e0b8b2e0b899e0b8b0e0b881e0b8b2e0b8a3e0b895e0b8ade0b89ae0b8a3e0b8b1e0b89a2020e0b888e0b8b0e0b895e0b989e0b8ade0b887e0b980e0b89be0b987e0b899e0b8abe0b899e0b8b6e0b988e0b887e0b983e0b899e0b8a3e0b8b2e0b8a2e0b881e0b8b2e0b8a3e0b895e0b988e0b8ade0b984e0b89be0b899e0b8b5e0b989e0b980e0b897e0b988e0b8b2e0b899e0b8b1e0b989e0b8993a2020e0b895e0b8ade0b89ae0b8a3e0b8b1e0b89a2ce0b89be0b88fe0b8b4e0b980e0b8aae0b898202e3c2f703e0a223b5f5f63695f766172737c613a313a7b733a373a227761726e696e67223b733a333a226e6577223b7d);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'ไอดีผู้สมัคร',
  `admin_id` int(11) DEFAULT NULL COMMENT 'ไอดีผู้อนุมัติ',
  `approve_date` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'วันที่อนุมัติ',
  `approve_schedule` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'วันที่กำหนดการสอบ',
  `approve_status` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'สถานะการอนุมัติ',
  `approve_remark` text COLLATE utf8_unicode_ci COMMENT 'หมายเหตุ',
  `date_create` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'วันที่ยื่นคำร้อง',
  `date_update` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'วันที่อัพเดท',
  `status` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'สถานะการสอบ',
  `profile` text COLLATE utf8_unicode_ci COMMENT 'ข้อมูลผู้สมัคร',
  `address` text COLLATE utf8_unicode_ci COMMENT 'ข้อมูลที่อยู่และการติดต่อ',
  `address_current` text COLLATE utf8_unicode_ci COMMENT 'ข้อมูลที่อยู่ปัจจุบัน',
  `education` text COLLATE utf8_unicode_ci COMMENT 'ข้อมูลการศึกษา',
  `work` text COLLATE utf8_unicode_ci COMMENT 'ข้อมูลการทำงาน',
  `career1` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'สาขาอาชีพที่ขอรับ',
  `schedule1` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'กำหนดวันประเมิน	',
  `career2` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'สาขาอาชีพที่ขอรับ',
  `schedule2` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'กำหนดวันประเมิน	',
  `career3` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'สาขาอาชีพที่ขอรับ',
  `schedule3` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'กำหนดวันประเมิน',
  `career4` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'สาขาอาชีพที่ขอรับ',
  `schedule4` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'กำหนดวันประเมิน',
  `career5` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'สาขาอาชีพที่ขอรับ',
  `schedule5` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'กำหนดวันประเมิน',
  `reference` text COLLATE utf8_unicode_ci COMMENT 'หลักฐานประกอบการสมัคร',
  `assets_id` text COLLATE utf8_unicode_ci COMMENT 'ไอดีไฟล์เอกสาร'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `user_id`, `admin_id`, `approve_date`, `approve_schedule`, `approve_status`, `approve_remark`, `date_create`, `date_update`, `status`, `profile`, `address`, `address_current`, `education`, `work`, `career1`, `schedule1`, `career2`, `schedule2`, `career3`, `schedule3`, `career4`, `schedule4`, `career5`, `schedule5`, `reference`, `assets_id`) VALUES
(3, 2, 4, '1508335991', '', 'reject', '', '1505757378', '1506972998', '', 'a:7:{s:5:\"title\";s:9:\"นาย\";s:9:\"firstname\";s:4:\"Udom\";s:8:\"lastname\";s:9:\"Taepanich\";s:11:\"nationality\";s:4:\"Thai\";s:5:\"blood\";s:1:\"O\";s:7:\"id_card\";s:13:\"1000000000000\";s:9:\"birthdate\";i:-252486000;}', 'a:11:{s:7:\"address\";s:2:\"10\";s:6:\"street\";s:2:\"10\";s:6:\"tambon\";s:2:\"10\";s:3:\"moo\";s:2:\"10\";s:3:\"soi\";s:2:\"10\";s:6:\"amphur\";s:2:\"10\";s:8:\"province\";s:2:\"10\";s:3:\"zip\";s:5:\"10000\";s:5:\"phone\";s:10:\"0000000000\";s:3:\"fax\";s:10:\"0000000000\";s:5:\"email\";s:14:\"note@email.com\";}', 'a:11:{s:7:\"address\";s:2:\"10\";s:6:\"street\";s:2:\"10\";s:6:\"tambon\";s:2:\"10\";s:3:\"moo\";s:2:\"10\";s:3:\"soi\";s:2:\"10\";s:6:\"amphur\";s:2:\"10\";s:8:\"province\";s:2:\"10\";s:3:\"zip\";s:5:\"10000\";s:5:\"phone\";s:10:\"1000000000\";s:3:\"fax\";s:10:\"1000000000\";s:5:\"email\";s:14:\"test@email.com\";}', 'a:3:{s:6:\"degree\";s:2:\"no\";s:6:\"branch\";s:2:\"no\";s:5:\"place\";s:2:\"no\";}', 'a:2:{s:6:\"career\";s:2:\"no\";s:5:\"place\";s:2:\"no\";}', 'c1', NULL, 'c2', NULL, 'c3', NULL, NULL, NULL, NULL, NULL, 'a:2:{s:7:\"picture\";s:7:\"picture\";s:3:\"etc\";s:4:\"none\";}', 'a:3:{i:0;s:2:\"11\";i:1;s:2:\"12\";i:2;s:2:\"13\";}'),
(4, 2, 0, '', '', '', '', '1505844769', '1507996697', '', 'a:7:{s:5:\"title\";s:9:\"นาย\";s:9:\"firstname\";s:4:\"Udom\";s:8:\"lastname\";s:9:\"Taepanich\";s:11:\"nationality\";s:4:\"Thai\";s:5:\"blood\";s:0:\"\";s:7:\"id_card\";s:13:\"0000000000000\";s:9:\"birthdate\";i:-252486000;}', 'a:11:{s:7:\"address\";s:1:\"*\";s:6:\"street\";s:1:\"*\";s:6:\"tambon\";s:1:\"*\";s:3:\"moo\";s:1:\"*\";s:3:\"soi\";s:1:\"*\";s:6:\"amphur\";s:1:\"*\";s:8:\"province\";s:0:\"\";s:3:\"zip\";s:5:\"11111\";s:5:\"phone\";s:0:\"\";s:3:\"fax\";s:0:\"\";s:5:\"email\";s:14:\"note@email.com\";}', 'a:11:{s:7:\"address\";s:1:\"+\";s:6:\"street\";s:1:\"+\";s:6:\"tambon\";s:1:\"+\";s:3:\"moo\";s:1:\"+\";s:3:\"soi\";s:1:\"+\";s:6:\"amphur\";s:1:\"+\";s:8:\"province\";s:1:\"+\";s:3:\"zip\";s:5:\"22222\";s:5:\"phone\";s:0:\"\";s:3:\"fax\";s:0:\"\";s:5:\"email\";s:14:\"note@email.com\";}', 'a:3:{s:6:\"degree\";s:0:\"\";s:6:\"branch\";s:0:\"\";s:5:\"place\";s:0:\"\";}', 'a:2:{s:6:\"career\";s:0:\"\";s:5:\"place\";s:0:\"\";}', 'c4', NULL, 'c5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a:2:{s:4:\"copy\";s:4:\"copy\";s:3:\"etc\";s:0:\"\";}', 'a:3:{i:0;s:2:\"41\";i:1;s:2:\"42\";i:2;s:2:\"43\";}');

-- --------------------------------------------------------

--
-- Table structure for table `standards`
--

CREATE TABLE `standards` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'ไอดีผู้สมัคร',
  `admin_id` int(11) DEFAULT NULL COMMENT 'ไอดีผู้อนุมัติ',
  `approve_date` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'วันที่อนุมัติ',
  `approve_schedule` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'วันที่กำหนดการสอบ',
  `approve_status` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'สถานะการอนุมัติ',
  `approve_remark` text COLLATE utf8_unicode_ci COMMENT 'หมายเหตุ',
  `date_create` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'วันที่ยื่นคำร้อง',
  `date_update` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'วันที่แก้ไขคำร้อง',
  `status` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'สถานะการสอบ',
  `department` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'หน่วยงาน',
  `branch` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'สาขาอาชีพ',
  `level` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ระดับ',
  `category` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ประเภทการสอบ',
  `profile` text COLLATE utf8_unicode_ci COMMENT 'ข้อมูลผู้สมัคร',
  `address` text COLLATE utf8_unicode_ci COMMENT 'ข้อมูลที่อยู่และการติดต่อ',
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ประเภทผู้สมัคร',
  `health` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'สถานะสภาพร่างกาย',
  `health_status` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'คำอธิบายสภาพร่างกาย',
  `education` text COLLATE utf8_unicode_ci COMMENT 'ข้อมูลการศึกษา',
  `work_status` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'สถานภาพการทำงาน',
  `work_yes` text COLLATE utf8_unicode_ci COMMENT 'ข้อมูลการทำงาน',
  `work_no` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ข้อมูลการว่างงาน',
  `used` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ประวัติการเข้ารับการทดสอบ',
  `used_place` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'สถานที่เข้ารับการทดสอบ',
  `need_work_status` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ความต้องการหางาน',
  `need_work_position` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ตำแหน่ง/อาชีพ',
  `need_work_group` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'กลุ่มอุตสาหกรรม',
  `need_work_country` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ประเทศที่ต้องการทำงาน',
  `work_abroad` text COLLATE utf8_unicode_ci COMMENT 'ข้อมูลกรณีไปทำงานต่างประเทศ',
  `reason` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'เหตุผลในการสมัครเข้ารับการทดสอบ',
  `source` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'แหล่งทราบข้อมูลการเปิดรับสมัคร',
  `allow` int(1) DEFAULT NULL COMMENT 'ยินยอมให้เปิดเผยข้อมูล',
  `reference` text COLLATE utf8_unicode_ci COMMENT 'หลักฐานประกอบการสมัคร',
  `assets_id` text COLLATE utf8_unicode_ci COMMENT 'ไอดีไฟล์เอกสาร'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `standards`
--

INSERT INTO `standards` (`id`, `user_id`, `admin_id`, `approve_date`, `approve_schedule`, `approve_status`, `approve_remark`, `date_create`, `date_update`, `status`, `department`, `branch`, `level`, `category`, `profile`, `address`, `type`, `health`, `health_status`, `education`, `work_status`, `work_yes`, `work_no`, `used`, `used_place`, `need_work_status`, `need_work_position`, `need_work_group`, `need_work_country`, `work_abroad`, `reason`, `source`, `allow`, `reference`, `assets_id`) VALUES
(1, 2, 0, '', '', '', '', '1504460010', '', '', '', '', '', 'ทดสอบมาตรฐานฝีมือแรงงานแห่งชาติ', 'a:7:{s:5:\"title\";s:9:\"นาย\";s:9:\"firstname\";s:4:\"Udom\";s:8:\"lastname\";s:9:\"Taepanich\";s:8:\"fullname\";s:0:\"\";s:8:\"religion\";s:8:\"Buddhism\";s:11:\"nationality\";s:8:\"Thailand\";s:9:\"birthdate\";i:226170000;}', 'a:9:{s:7:\"address\";s:0:\"\";s:6:\"street\";s:0:\"\";s:6:\"tambon\";s:0:\"\";s:6:\"amphur\";s:0:\"\";s:8:\"province\";s:0:\"\";s:3:\"zip\";s:0:\"\";s:5:\"email\";s:14:\"note@email.com\";s:5:\"phone\";s:10:\"0000000000\";s:3:\"fax\";s:10:\"0000000000\";}', 'standards', 'ปกติ', '', 'a:5:{s:6:\"degree\";s:0:\"\";s:6:\"branch\";s:0:\"\";s:5:\"place\";s:0:\"\";s:8:\"province\";s:0:\"\";s:4:\"year\";s:0:\"\";}', '0', NULL, NULL, '', '', '0', '', '', '', 'a:11:{s:5:\"agent\";s:0:\"\";s:7:\"company\";s:0:\"\";s:7:\"address\";s:0:\"\";s:6:\"street\";s:0:\"\";s:6:\"tambon\";s:0:\"\";s:6:\"amphur\";s:0:\"\";s:8:\"province\";s:0:\"\";s:3:\"zip\";s:0:\"\";s:5:\"phone\";s:0:\"\";s:7:\"country\";s:0:\"\";s:8:\"duration\";s:0:\"\";}', '', '', 0, 'a:1:{i:0;s:0:\"\";}', 'a:2:{i:0;s:2:\"11\";i:1;s:2:\"14\";}'),
(2, 2, 4, '1508335988', '', 'accept', '', '1505758663', '1507742273', '', 'หน่วยงานพิเศษ', 'อาชีพพิเศษ', 'ระดับชำนาญการพิเศษ', 'ทดสอบมาตรฐานฝีมือแรงงานแห่งชาติ', 'a:8:{s:5:\"title\";s:9:\"นาย\";s:9:\"firstname\";s:4:\"Udom\";s:8:\"lastname\";s:9:\"Taepanich\";s:8:\"fullname\";s:8:\"Udom TPN\";s:8:\"religion\";s:2:\"No\";s:11:\"nationality\";s:4:\"Thai\";s:7:\"id_card\";s:13:\"1000000000000\";s:9:\"birthdate\";i:-252486000;}', 'a:9:{s:7:\"address\";s:2:\"10\";s:6:\"street\";s:2:\"10\";s:6:\"tambon\";s:2:\"10\";s:6:\"amphur\";s:2:\"10\";s:8:\"province\";s:2:\"10\";s:3:\"zip\";s:5:\"10000\";s:5:\"email\";s:14:\"note@email.com\";s:5:\"phone\";s:10:\"1000000000\";s:3:\"fax\";s:10:\"1000000000\";}', 'standards', 'ปกติ', '', 'a:5:{s:6:\"degree\";s:30:\"ประถมศึกษา\";s:6:\"branch\";s:2:\"no\";s:5:\"place\";s:2:\"no\";s:8:\"province\";s:2:\"no\";s:4:\"year\";s:4:\"2540\";}', 'ผู้ไม่มีงานทำ', NULL, 'อยู่ระหว่างหางาน', 'เคย', 'ในสถานประกอบกิจการ', 'ต้องการจัดหางานในประเทศ', 'ลูกจ้าง', 'เฟอร์นิเจอร์', '', NULL, '', '', 1, 'a:3:{s:5:\"refer\";s:126:\"สำเนาวุฒิการศึกษาหรือหนังสือรับรองการทำงาน\";s:4:\"copy\";s:132:\"สำเนาบัตรประจำตัวประชาชนหรือสำเนาทะเบียนบ้าน\";s:3:\"etc\";s:0:\"\";}', 'a:3:{i:0;s:2:\"40\";i:1;s:2:\"43\";i:2;s:2:\"45\";}'),
(3, 2, 4, '1508336078', '', 'accept', '', '1505844725', '1507749184', '', 'tewre', 'resrtse', 'tertert', 'ทดสอบฝีมือคนหางานเพื่อไปทำงานในต่างประเทศ', 'a:8:{s:5:\"title\";s:9:\"นาย\";s:9:\"firstname\";s:4:\"Udom\";s:8:\"lastname\";s:9:\"Taepanich\";s:8:\"fullname\";s:0:\"\";s:8:\"religion\";s:2:\"No\";s:11:\"nationality\";s:4:\"Thai\";s:7:\"id_card\";s:13:\"0000000000000\";s:9:\"birthdate\";i:-252486000;}', 'a:9:{s:7:\"address\";s:0:\"\";s:6:\"street\";s:0:\"\";s:6:\"tambon\";s:0:\"\";s:6:\"amphur\";s:0:\"\";s:8:\"province\";s:0:\"\";s:3:\"zip\";s:0:\"\";s:5:\"email\";s:14:\"note@email.com\";s:5:\"phone\";s:0:\"\";s:3:\"fax\";s:0:\"\";}', 'standards', 'ปกติ', '', 'a:5:{s:6:\"degree\";s:0:\"\";s:6:\"branch\";s:0:\"\";s:5:\"place\";s:0:\"\";s:8:\"province\";s:0:\"\";s:4:\"year\";s:0:\"\";}', '', NULL, NULL, '', '', 'ไม่ต้องการ', '', '', '', NULL, '', '', 1, 'a:1:{s:3:\"etc\";s:0:\"\";}', ''),
(4, 2, NULL, NULL, NULL, NULL, NULL, '1507977052', NULL, NULL, 'test', 'test', 'test', 'ทดสอบมาตรฐานฝีมือแรงงานแห่งชาติ', 'a:8:{s:5:\"title\";s:9:\"นาย\";s:9:\"firstname\";s:4:\"Udom\";s:8:\"lastname\";s:9:\"Taepanich\";s:8:\"fullname\";s:0:\"\";s:8:\"religion\";s:2:\"No\";s:11:\"nationality\";s:4:\"Thai\";s:7:\"id_card\";s:13:\"0000000000000\";s:9:\"birthdate\";i:-252486000;}', 'a:9:{s:7:\"address\";s:0:\"\";s:6:\"street\";s:0:\"\";s:6:\"tambon\";s:0:\"\";s:6:\"amphur\";s:0:\"\";s:8:\"province\";s:0:\"\";s:3:\"zip\";s:0:\"\";s:5:\"email\";s:14:\"note@email.com\";s:5:\"phone\";s:0:\"\";s:3:\"fax\";s:0:\"\";}', 'จากภาครัฐ', 'ปกติ', NULL, 'a:5:{s:6:\"degree\";s:0:\"\";s:6:\"branch\";s:0:\"\";s:5:\"place\";s:0:\"\";s:8:\"province\";s:0:\"\";s:4:\"year\";s:0:\"\";}', '', NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a:1:{i:0;s:0:\"\";}', NULL),
(5, 2, NULL, NULL, NULL, NULL, NULL, '1508135593', '1508154370', NULL, 'test', 'test', 'test', 'ทดสอบมาตรฐานฝีมือแรงงานแห่งชาติ', 'a:8:{s:5:\"title\";s:9:\"นาย\";s:9:\"firstname\";s:4:\"Udom\";s:8:\"lastname\";s:9:\"Taepanich\";s:8:\"fullname\";s:8:\"Udom TPN\";s:8:\"religion\";s:2:\"No\";s:11:\"nationality\";s:4:\"Thai\";s:7:\"id_card\";s:13:\"0000000000000\";s:9:\"birthdate\";i:-252486000;}', 'a:9:{s:7:\"address\";s:0:\"\";s:6:\"street\";s:0:\"\";s:6:\"tambon\";s:0:\"\";s:6:\"amphur\";s:0:\"\";s:8:\"province\";s:0:\"\";s:3:\"zip\";s:0:\"\";s:5:\"email\";s:14:\"note@email.com\";s:5:\"phone\";s:0:\"\";s:3:\"fax\";s:0:\"\";}', 'standards', 'พิการ', 'การมองเห็น', 'a:5:{s:6:\"degree\";s:0:\"\";s:6:\"branch\";s:0:\"\";s:5:\"place\";s:0:\"\";s:8:\"province\";s:0:\"\";s:4:\"year\";s:0:\"\";}', '', NULL, NULL, 'เคย', 'ในสถานประกอบกิจการ', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'a:1:{s:3:\"etc\";s:0:\"\";}', 'a:2:{i:0;s:2:\"41\";i:1;s:2:\"42\";}');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL COMMENT 'ไอพีแอดเดรส',
  `username` varchar(100) DEFAULT NULL COMMENT 'ชื่อล็อกอิน',
  `password` varchar(255) NOT NULL COMMENT 'รหัสผ่าน',
  `title` varchar(20) NOT NULL COMMENT 'คำนำหน้า',
  `firstname` varchar(10) NOT NULL COMMENT 'ชื่อ',
  `lastname` varchar(100) NOT NULL COMMENT 'นามสกุล',
  `religion` varchar(100) NOT NULL COMMENT 'ศาสนา',
  `nationality` varchar(100) NOT NULL COMMENT 'เชื้อชาติ',
  `id_card` varchar(13) NOT NULL COMMENT 'เลขบัตรประชาชน',
  `birthdate` varchar(11) NOT NULL COMMENT 'วันเกิด',
  `address` text NOT NULL COMMENT 'ที่อยู่',
  `address_current` text NOT NULL COMMENT 'ที่อยู่ปัจจุบัน',
  `phone` varchar(10) NOT NULL COMMENT 'โทรศัพท์',
  `fax` varchar(10) NOT NULL COMMENT 'โทรศัพท์',
  `salt` varchar(255) DEFAULT NULL COMMENT 'คีย์เวิร์ดรหัสผ่าน',
  `email` varchar(100) NOT NULL COMMENT 'อีเมล์',
  `activation_code` varchar(40) DEFAULT NULL COMMENT 'รหัสยืนยันการลงทะเบียน',
  `forgotten_password_code` varchar(40) DEFAULT NULL COMMENT 'รหัสยืนยันการลืมรหัสผ่าน',
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL COMMENT 'เวลายืนยันการลืมรหัสผ่าน',
  `remember_code` varchar(40) DEFAULT NULL COMMENT 'การจดจำ',
  `created_on` int(11) UNSIGNED NOT NULL COMMENT 'วันที่สมัคร',
  `last_login` int(11) UNSIGNED DEFAULT NULL COMMENT 'วันที่ล็อกอิน',
  `active` tinyint(1) UNSIGNED DEFAULT NULL COMMENT 'สถานะ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `title`, `firstname`, `lastname`, `religion`, `nationality`, `id_card`, `birthdate`, `address`, `address_current`, `phone`, `fax`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`) VALUES
(2, '::1', 'note@email.com', '$2y$08$HE.moGh00E8Y1ETaGqN.2eUyCoLYOp/ls0iFwiSsG.i9gvw.LWuJa', 'นาย', 'Udom', 'Taepanich', 'No', 'Thai', '0000000000000', '-252486000', 'a:6:{s:7:\"address\";s:0:\"\";s:6:\"street\";s:0:\"\";s:6:\"tambon\";s:0:\"\";s:6:\"amphur\";s:0:\"\";s:8:\"province\";s:0:\"\";s:3:\"zip\";s:0:\"\";}', 'a:6:{s:7:\"address\";s:0:\"\";s:6:\"street\";s:0:\"\";s:6:\"tambon\";s:0:\"\";s:6:\"amphur\";s:0:\"\";s:8:\"province\";s:0:\"\";s:3:\"zip\";s:0:\"\";}', '', '', NULL, 'note@email.com', NULL, NULL, NULL, NULL, 1503303079, 1508333667, 1),
(3, '::1', 'pop@email.com', '$2y$08$j12Y8j/o3PFiiheN.wyO9O4SSMEUQytEk0sucl4gBqRXphof8XxnW', '', '', '', '', '', '', '', '', '', '', '', NULL, 'pop@email.com', NULL, NULL, NULL, NULL, 1503303097, 1507738671, 1),
(4, '::1', 'admin@email.com', '$2y$08$RI5YYa/PZj7F52e119k8fu/QzxCqET/IYf6z9mduWx/I1MIktFXS.', 'นาย', 'Admin', 'Istrator', 'World', 'World', '0000000000001', '-410252400', 'a:6:{s:7:\"address\";s:3:\"000\";s:6:\"street\";s:3:\"000\";s:6:\"tambon\";s:3:\"000\";s:6:\"amphur\";s:3:\"000\";s:8:\"province\";s:3:\"000\";s:3:\"zip\";s:5:\"00000\";}', 'a:6:{s:7:\"address\";s:3:\"000\";s:6:\"street\";s:3:\"000\";s:6:\"tambon\";s:3:\"000\";s:6:\"amphur\";s:3:\"000\";s:8:\"province\";s:3:\"000\";s:3:\"zip\";s:5:\"00000\";}', '0000000000', '0000000000', NULL, 'admin@email.com', NULL, NULL, NULL, NULL, 1503325808, 1508334631, 1),
(5, '::1', 'test@email.com', '$2y$08$o9qzcV33MS09e4QlfvkmaOXbmBpdTjlrGJaCDyNGaD0RHu5T..3XS', '', '', '', '', '', '', '', '', '', '0000000000', '0000000000', NULL, 'test@email.com', NULL, NULL, NULL, NULL, 1505060447, 1508327868, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL COMMENT 'ไอดีผู้ใช้',
  `group_id` mediumint(8) UNSIGNED NOT NULL COMMENT 'ไอดีกลุ่ม'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(3, 2, 2),
(14, 3, 2),
(5, 4, 1),
(19, 5, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assets_by`
--
ALTER TABLE `assets_by`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`,`ip_address`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `standards`
--
ALTER TABLE `standards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `assets_by`
--
ALTER TABLE `assets_by`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `standards`
--
ALTER TABLE `standards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
