-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 22, 2014 at 11:32 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS myvideos;
USE myvideos;
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `myvideos`
--

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE IF NOT EXISTS `favorites` (
  `userName` varchar(30) DEFAULT NULL,
  `vId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fun_video`
--

CREATE TABLE IF NOT EXISTS `fun_video` (
`id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `videolink` text COLLATE utf8_unicode_ci NOT NULL,
  `videolength` int(6) NOT NULL,
  `highestresolution` enum('144','240','360','480','720','1080') COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `language` enum('English','Non-English') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'English',
  `viewcount` int(8) NOT NULL,
  `videotype` set('Tutorial','Entertainment','Application','Weapon','Group demo','Others') COLLATE utf8_unicode_ci NOT NULL,
  `iconimage` text COLLATE utf8_unicode_ci NOT NULL,
  `tag` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=50 ;

--
-- Dumping data for table `fun_video`
--

INSERT INTO `fun_video` (`id`, `title`, `videolink`, `videolength`, `highestresolution`, `description`, `language`, `viewcount`, `videotype`, `iconimage`, `tag`) VALUES
(1, 'Wudang KungFu-Sword Fight @SaltLake ,Utah, USA', 'http://i.ytimg.com/vi_webp/fOP4NBgYq6I/mqdefault.webp', 3, '360', 'Breath-taking kung-fu sword fight between Wudang Master Bing and his student .Superb sword skills and display of "guts" and ...', 'English', 64773, 'Tutorial', 'http://i.ytimg.com/vi_webp/fOP4NBgYq6I/mqdefault.webp', 'sport'),
(2, 'Wu Style Taiji Quan Circle Form 吳式太極拳圓拳(1/3)', 'http://www.youtube.com/watch?v=-E0XNRawUYw', 9, '360', 'Wu Style Taiji Circle Form 1/3, is taken from Sifu Edward Mak''s tutorial VCD set.', 'Non-English', 153848, '', 'http://i.ytimg.com/vi/-E0XNRawUYw/mqdefault.jpg', 'sport'),
(3, 'Meditation: Taiji Meditation for self-healing', 'http://www.youtube.com/watch?v=-lba30NLsMM', 2, '360', 'Visit http://www.taichihealthways.com for more videos of Master Jesse Tsao on Yang, Chen, Wu, Sun tai chi tyle and Tai Chi sword ...', 'Non-English', 54881, '', 'http://i.ytimg.com/vi/-lba30NLsMM/mqdefault.jpg', 'sport'),
(4, ' wu vs chan 1954 (taichi versus white crane)', 'http://www.youtube.com/watch?v=2FsZyPjsjTA', 11, '480', '\r\n\r\nChan Hak Fu (é™³å…‹å¤«) from White Crane style (Pak Hok Pai) vs Wu Gongyi ( å³å…¬å„€) from Wu Tai Chi Ch''uan. This was a major event in the kung fu world and was held in Macao.\r\n', 'Non-English', 78036, 'Entertainment,Application', 'http://i.ytimg.com/vi/2FsZyPjsjTA/mqdefault.jpg', 'wu style, tai chi, fight, cantonese'),
(5, 'tai chi fighting', 'http://www.youtube.com/watch?v=2kSM7rEbDk4', 3, '480', 'Videos of Sifu Longs Master, Grand Master Zhang Bo fourth generation of Wu style Taiji Chuan\r\n', 'English', 172122, 'Application,Group demo', 'http://i.ytimg.com/vi/2kSM7rEbDk4/mqdefault.jpg', 'fight, demo, application, tai chi, taiji'),
(6, 'Tai Chi Taiji Application for Self-defense in Form', 'http://www.youtube.com/watch?v=3vKLmTNYr_E', 3, '480', 'Visit http://www.taichihealthways.com for more videos of Master Jesse Tsao on Yang, Chen, Wu, Sun tai chi tyle and Tai Chi sword ...', 'English', 154588, '', 'http://i.ytimg.com/vi/3vKLmTNYr_E/mqdefault.jpg', 'sport'),
(7, 'Tai Chi Fundamentals for Taiji Beginners', 'http://www.youtube.com/watch?v=7WA4V5RE8As', 6, '360', 'Visit http://www.taichihealthways.com for more videos of Master Jesse Tsao on Yang, Chen, Wu, Sun tai chi tyle and Tai Chi sword ...', 'Non-English', 360145, '', 'http://i.ytimg.com/vi/7WA4V5RE8As/mqdefault.jpg', 'sport'),
(8, ' Master Wang hao da Wu taichi fast form', 'http://www.youtube.com/watch?v=9QqUGNjMuZw', 5, '144', '\r\n\r\nMaster Wang hao da, an indoors student of master Mah Yueh Liang\r\n', 'English', 50338, 'Tutorial', 'http://i.ytimg.com/vi/9QqUGNjMuZw/mqdefault.jpg', 'wu style, tai chi, taiji, demo'),
(9, 'Wudang Sword 武當劍 Wudang Taoist Sword Form', 'http://www.youtube.com/watch?v=a6l0BL6s2y8', 10, '360', 'Wudang Taoist Sword （Wudang Taiyi Xuan Men Jian）instructional DVD available at： http://www.wudangdao.com/store/#!', 'Non-English', 74299, 'Tutorial', 'http://i.ytimg.com/vi/a6l0BL6s2y8/mqdefault.jpg', 'sport'),
(10, 'Wudang style Tai Chi Chuan', 'http://www.youtube.com/watch?v=aIwv-XLG58A', 5, '360', 'Belgian TV-special about the ancient Chinese art of tai chi chuan. All aspects of this martial art are covered here. Strong emphasis ', 'English', 82004, 'Tutorial', 'http://i.ytimg.com/vi/aIwv-XLG58A/mqdefault.jpg', 'sport'),
(11, ' Wu Tai Chi Taiji 1', 'http://www.youtube.com/watch?v=cnMf-g-YpG0', 6, '240', 'Visit http://www.taichihealthways.com for more videos of Master Jesse Tsao on Yang, Chen, Wu, Sun tai chi tyle and Tai Chi sword, broadsword, qigong (Chi gong)for internal energy healing, bio-energy, Shaolin and Wudang Kung-fu martial arts. Tai Chi Health Ways host annual workshop with the top masters. See photos or videos of Chen Zhenglei, Li Deyin, Zhu Tiancai, Chen Xiaowang, Dan Lee, Su Zifang, Abraham Liu ...', 'English', 50844, 'Tutorial', 'http://i.ytimg.com/vi/cnMf-g-YpG0/mqdefault.jpg', 'wu style, tai chi, taiji, demo'),
(12, ' Master Wu Tunan: Tai Chi Chuan', 'http://www.youtube.com/watch?v=CXZwVLjTzC0', 1, '240', '\r\n\r\n100 year old Master Wu Tunan demonstrated tai chi chuan at the opening ceremony of the First International Tai Chi Chuan Competition in Wuhan, China, in April 1984.\r\n', 'Non-English', 67371, 'Tutorial', 'http://i.ytimg.com/vi/CXZwVLjTzC0/mqdefault.jpg', 'tai chi, mandarin, taiji, performance'),
(13, ' Wu Tai Chi Chuan Pushhands Seminar å´å¼å¤ªæžæ‹', 'http://www.youtube.com/watch?v=DUmaFgzD2nk', 9, '360', 'Clip about the Wu Tai Chi Chuan Pushhands Seminar in Willich/Germany Summer 2008 with Ma Jiangbao and Martin Boedicker.\r\nThis is pushhands in the tradition of Ma Yueliang and Wu Yinghua', 'English', 100366, 'Tutorial,Group demo', 'http://i.ytimg.com/vi/DUmaFgzD2nk/mqdefault.jpg', 'wu style, tai chi, taiji, demo, group demo, application'),
(14, 'a Wudang Qigong Chi gong Tai Chi', 'http://www.youtube.com/watch?v=Efez8VJ7-Ks', 4, '360', 'Wudang Qigong DVD bought from www.wudanglongmen.com DVD tour', 'Non-English', 62569, 'Tutorial', 'http://i.ytimg.com/vi/Efez8VJ7-Ks/mqdefault.jpg', 'sport'),
(15, 'wudang tai chi', 'http://www.youtube.com/watch?v=EFWADipYEqU', 6, '360', 'a kind of tai chi.', 'Non-English', 67438, 'Tutorial', 'http://i.ytimg.com/vi/EFWADipYEqU/mqdefault.jpg', 'sport'),
(16, 'Wudang Kung Fu Wu Xing Quan Wudang Tai Yi Five ele', 'http://www.youtube.com/watch?v=GhQieDy99zs', 3, '360', 'Wudang Kung Fu Wu Xing Quan, also known as Wudang Kung Fu Taiyi Five-element Chuan.Performed by master Chen Shi-Yu ...', 'Non-English', 134649, 'Tutorial', 'http://i.ytimg.com/vi/GhQieDy99zs/mqdefault.jpg', 'sport'),
(17, ' Wu Style Tai Chi Chuan Fast (Round) Form', 'http://www.youtube.com/watch?v=Gmf0FB1kxBg', 8, '480', 'Sifu Lenny Aaron performing the the Wu Style fast (round) form as taught to him by Grandmaster Leung Shum who learned Wu Style Tai Chi Chuan from his godfather Ng Wai Nung who had two major instructors; Chui Sau Chun and Lau Bin Hun. Two very famous sifus ', 'English', 53851, 'Tutorial', 'http://i.ytimg.com/vi/Gmf0FB1kxBg/mqdefault.jpg', 'wu style, tai chi, taiji, demo'),
(18, ' Wu Style Tai Chi ( å³å¼å¤ªæ¥µæ‹³) - é„­æ¦®å…‰å­', 'http://www.youtube.com/watch?v=GnqRzVNu8nw', 13, '480', '\r\n\r\næŽæ™¯å—ï¼ˆé„­æ¦®å…‰æ—©æœŸå­¸ç”Ÿï¼‰\r\n', 'Non-English', 42931, 'Tutorial', 'http://i.ytimg.com/vi/GnqRzVNu8nw/mqdefault.jpg', 'wu style, tai chi, taiji, demo'),
(19, ' Applying Wu Style Tai Chi', 'http://www.youtube.com/watch?v=gzeiVQ3WEoM', 2, '240', '\r\n\r\nSome demo of the use of Wu Style Tai Chi. In a real fight, one will of course apply the power to destruct, and not to push. The target area is very much different. Timing and thus experience is really important in applying Internal Martial Arts in a real fight.\r\n', 'English', 48239, 'Tutorial,Application,Group demo', 'http://i.ytimg.com/vi/gzeiVQ3WEoM/mqdefault.jpg', 'wu style, tai chi, taiji, demo, group demo, application'),
(20, 'Wudang Kung Fu Tai Chi Quan 28 Form', 'http://www.youtube.com/watch?v=h5dgR2N3inA', 7, '360', 'Wudang Kung Fu Tai Chi Quan 28 Form performed by master Chen Shi-Yu. Found on and permitted to post by: ...', 'Non-English', 7, 'Tutorial', 'http://i.ytimg.com/vi/h5dgR2N3inA/mqdefault.jpg', 'sport'),
(21, 'Wu Style Taiji Quan Square Form 吳式太極拳方拳 (2/6)', 'http://www.youtube.com/watch?v=I0GryEo1By8', 5, '360', 'Wu Style Taiji Square Form Section 2 is taken from Sifu Edward Mak''s tutorial DVD. 吳式太極方拳第二段，節錄自麥永聰師傅的DVD ...', 'Non-English', 65777, 'Tutorial', 'http://i.ytimg.com/vi/I0GryEo1By8/mqdefault.jpg', 'sport'),
(22, ' Wu Style Taiji Quan Square Form å³å¼å¤ªæ¥µæ‹³æ–', 'http://www.youtube.com/watch?v=JRtp99gPM0w', 6, '240', 'Wu Style Taiji Square Form Section 1 is taken from Sifu Edward Mak''s tutorial VCD set.\r\n', 'Non-English', 142276, 'Tutorial', 'http://i.ytimg.com/vi/JRtp99gPM0w/mqdefault.jpg', 'Wu style, taichi, taiji, cantonese, demo'),
(23, 'Authentic wudang tai chi 36 froms by master chenli', 'http://www.youtube.com/watch?v=Jvre6uCHb8o', 18, '360', 'e-mail：294571951@qq.com 师傅亲自教学.', 'Non-English', 70719, 'Tutorial', 'http://i.ytimg.com/vi_webp/Jvre6uCHb8o/mqdefault.webp', 'sport'),
(24, 'wu style taiji', 'http://www.youtube.com/watch?v=LqNw2p3K-pM', 1, '360', 'chi is a metaphor? well, watch his fist from 53seconds on. btw, this is ma hailong, son of ma yueliang.', 'Non-English', 55895, 'Tutorial', 'http://i.ytimg.com/vi/LqNw2p3K-pM/mqdefault.jpg', 'sport'),
(25, ' PUSH HANDS WITH MASTER BENJAMIN WU OF WU STYLE TA', 'http://www.youtube.com/watch?v=lxF-Q3oSx4E', 7, '240', 'BT 411 MASTER WU OF WU STYLE TAI CHI SHARE SOME OF HIS PUSH HANDS SKILLS.\r\nPUSH HANDS WITH MASTER BENJAMIN WU OF WU STYLE TAI JI QUAN-Interested in Wu Style Tai Chi lessons contact Master Benjamin Wu at:\r\nChengiei60@hotmail.com or call (347) 843-5195', 'English', 51464, 'Tutorial,Application,Group demo', 'http://i.ytimg.com/vi/lxF-Q3oSx4E/mqdefault.jpg', 'wu style, tai chi, taiji, demo, application'),
(26, 'China Wudang Light-Body Kungfu - Qing Gong - Maste', 'http://www.youtube.com/watch?v=m6QUWLMQ8AY', 3, '360', 'http://www.daoistkungfu.com This video shows Master Chen Shixing, top master in China today. His school, China Wudang ...', 'Non-English', 65818, 'Group demo', 'http://i.ytimg.com/vi/m6QUWLMQ8AY/mqdefault.jpg', 'sport'),
(27, 'WuDang Taoist Qi gong / Tai Chi Master You Xuan de', 'http://www.youtube.com/watch?v=m86QhcK5psw', 3, '360', '玄武派内家拳掌门人游玄德道长.', 'Non-English', 175568, 'Entertainment', 'http://i.ytimg.com/vi_webp/m86QhcK5psw/mqdefault.webp', 'sport'),
(28, ' Tai Chi Sword Form 32 Yang Taiji Jian', 'http://www.youtube.com/watch?v=MxhAjv3YneM', 5, '240', 'Visit http://www.taichihealthways.com for more videos of Master Jesse Tsao on Yang, Chen, Wu, Sun tai chi tyle and Tai Chi sword, broadsword, qigong (Chi gong)for internal energy healing, bio-energy, Shaolin and Wudang Kung-fu martial arts. Tai Chi Health Ways host annual workshop with the top masters. ', 'English', 634459, 'Tutorial', 'http://i.ytimg.com/vi/MxhAjv3YneM/mqdefault.jpg', 'sword, tai chi, taiji, demo'),
(29, ' Wu Style Tai Chi Short Form Demonstrated by Bruce', 'http://www.youtube.com/watch?v=ocHe6dbR4ig', 5, '1080', 'Lineage Holder Bruce Frantzis demonstrates the small frame Wu Style Tai Chi Short Form.\r\n\r\nThis video was shot in Crete, Greece in 2010 during Bruce''s Longevity Breathing Instructor Training.\r\n\r\nYou can find out more about Tai Chi at http://www.energyarts.com/', 'English', 97414, 'Tutorial', 'http://i.ytimg.com/vi/ocHe6dbR4ig/mqdefault.jpg', 'wu style, tai chi, taiji, demo'),
(30, 'Wudang Tai Chi Quan', 'http://www.youtube.com/watch?v=oX6rZ5qGq3c', 4, '360', 'Wudang Tai Chi Quan. There are many Wudang tai chi quan. Wudang tai chi 28 is a short form of Wudang tai chi 108. Wudang tai ...', 'Non-English', 105523, '', 'http://i.ytimg.com/vi/oX6rZ5qGq3c/mqdefault.jpg', 'sport'),
(31, ' An Interview with Ma Yueh Liang', 'http://www.youtube.com/watch?v=qaYrNNkeyq8', 2, '240', 'A short inteview with Ma Yueh Liang, 2nd generation Wu style Taiji successor. Ma Yueh Liang was a student of Wu Jiang Quan and was a major influence in spreading Wu Taiji to Shanghai, China. ', 'English', 75071, 'Tutorial,Entertainment', 'http://i.ytimg.com/vi/qaYrNNkeyq8/mqdefault.jpg', 'tai chi, interview, wu style'),
(32, ' Wu Tai Chi Taiji', 'http://www.youtube.com/watch?v=QSqfKRJotW4', 6, '240', '\r\n\r\nVisit http://www.taichihealthways.com for more videos of Master Jesse Tsao on Yang, Chen, Wu, Sun tai chi tyle and Tai Chi sword, broadsword, qigong (Chi gong)for internal energy healing, bio-energy, Shaolin and Wudang Kung-fu martial arts. Tai Chi Health Ways host annual workshop with the top masters. See photos or videos of Chen Zhenglei, Li Deyin, Zhu Tiancai, Chen Xiaowang, Dan Lee, Su Zifang, Abraham Liu ... Master Tsao teaches the original Wu Style, from the Beijing area, also known as the Northern (Bei) Wu. He teaches step-by-step with full front and back view demonstrations. For higher-quality downloads and more videos, please see www.taichihealthways.com.\r\n', 'English', 405451, 'Tutorial', 'http://i.ytimg.com/vi/QSqfKRJotW4/mqdefault.jpg', 'wu style, tai chi, taiji, demo'),
(33, 'tai chi', 'http://www.youtube.com/watch?v=r9SRS_z67nI', 9, '240', 'lady prefoming tai chi\r\n', 'English', 402721, 'Tutorial', 'http://i.ytimg.com/vi/r9SRS_z67nI/mqdefault.jpg', 'tai chi, taiji, demo'),
(34, ' Ma Yueh Liang (1901-1998)', 'http://www.youtube.com/watch?v=RHQv6fLpIoI', 2, '240', '\r\n\r\n2nd generation Wu style Taiji successor, Ma Yueh Liang, pushes hands at a demo. Ma Yueh Liang was a student of Wu Jiang Quan and was a major influence in spreading Wu Taiji to Shanghai, China.\r\n', 'English', 117945, 'Tutorial,Group demo', 'http://i.ytimg.com/vi/RHQv6fLpIoI/mqdefault.jpg', 'wu style, tai chi, taiji, demo, group demo, application'),
(35, 'Wu Tunan 吴图南 (Full Video)', 'http://www.youtube.com/watch?v=SVfkZ7YVrpg', 7, '360', 'Great Grand Master Wu Tunan discussing and demonstrating his "Yong Jia" Yang Tai Chi sequence(1885-1988). Gran Maestro .', 'Non-English', 282682, 'Entertainment', 'http://i.ytimg.com/vi/SVfkZ7YVrpg/mqdefault.jpg', 'sport, video'),
(36, 'WUDANG TAICHI Quan 64 Forms by Master Tian Liyang', 'http://www.youtube.com/watch?v=UiIT2UEpYN0', 10, '360', 'This Wudang TaiChi (64 Forms) goes so well with is so so calming and soothing relaxing music of Merlin''s Magic-The Heart of ...', 'Non-English', 102575, 'Tutorial', 'http://i.ytimg.com/vi_webp/UiIT2UEpYN0/mqdefault.webp', 'sport'),
(37, 'Tai Chi Taiji Warm-up 18 Forms', 'http://www.youtube.com/watch?v=uZ0Wi-OAB4g', 3, '360', 'Visit http://www.taichihealthways.com for more videos of Master Jesse Tsao on Yang, Chen, Wu, Sun tai chi tyle and Tai Chi sword ...', 'Non-English', 79386, 'Tutorial', 'http://i.ytimg.com/vi/uZ0Wi-OAB4g/mqdefault.jpg', 'sport'),
(38, 'Wudang San Feng Tai Chi Sword 武當太极劍', 'http://www.youtube.com/watch?v=vtDF8W6wy-U', 1, '360', 'http://wudangdao.com Wudang San Feng Tai Chi Sword.', 'Non-English', 52790, 'Tutorial', 'http://i.ytimg.com/vi/vtDF8W6wy-U/mqdefault.jpg', 'sport'),
(39, ' Tai Chi - Wu Style by Fei Guo Qing!', 'http://www.youtube.com/watch?v=W-YV1IQX75U', 9, '240', 'Master Fei Guo Qing Where a student of Grandmaster Ma Yueh Liang (Ma yueh Liang 1901-1998)\r\nI recorded this video, on one of my trips to china. (more specific Shanghai 2001)', 'English', 89137, 'Tutorial', 'http://i.ytimg.com/vi/W-YV1IQX75U/mqdefault.jpg', 'wu style, tai chi, taiji, demo'),
(40, ' DVD- Wu style Taiji Quan Short Form- Free Lesson:', 'http://www.youtube.com/watch?v=wUq9K7SXFAg', 10, '360', 'Thank you for watching this video. These clips are from an instructional DVD that I made for some students. I have put the instructional clips up so that anyone who might benefit can. ', 'English', 102011, 'Tutorial', 'http://i.ytimg.com/vi/wUq9K7SXFAg/mqdefault.jpg', 'wu style, tai chi, taiji, demo, english'),
(41, 'Wudang Tai Chi 28 太極拳 Tai Chi for Health', 'http://www.youtube.com/watch?v=x-jXJv0TDRU', 6, '360', 'Tai Chi -- The Supreme Ultimate. Wudang is the home of tai chi. Wudang tai chi quan movement is from Zhang Shan Feng.', 'Non-English', 112523, 'Tutorial', 'http://i.ytimg.com/vi_webp/x-jXJv0TDRU/mqdefault.webp', 'sport'),
(42, 'Wudang Tai Chi Sword', 'http://www.youtube.com/watch?v=XQGvm-7WYFY', 5, '360', 'Visit http://www.taichihealthways.com for more videos of Master Jesse Tsao on Yang, Chen, Wu, Sun tai chi tyle and Tai Chi sword ...', 'Non-English', 557915, 'Tutorial', 'http://i.ytimg.com/vi/XQGvm-7WYFY/mqdefault.jpg', 'sport'),
(43, 'Wudang Sword - Tai Yi Daoist Form and Applications', 'http://www.youtube.com/watch?v=xrtfH_VgGZ0', 3, '360', 'http://ymaa.com/publishing/internal/wudang_sword Since ancient times, Wudang martial artists have earned prestige for their ...', 'Non-English', 158620, 'Tutorial,Weapon', 'http://i.ytimg.com/vi/xrtfH_VgGZ0/mqdefault.jpg', 'sport'),
(44, ' Wu Ying Hwa Wu taichi long form', 'http://www.youtube.com/watch?v=Y18sTuexaTo', 11, '144', 'Master Wu Jian Quan''s daughter Wu Ying Hwa.\r\nWu style taichi long form.', 'English', 126343, 'Tutorial', 'http://i.ytimg.com/vi/Y18sTuexaTo/mqdefault.jpg', 'wu style, tai chi, taiji, demo'),
(45, ' Early Wu style Taijiquan (1937)', 'http://www.youtube.com/watch?v=yDaV9C0ERP8', 9, '240', '\r\n\r\nPossibly the earliest Wu style Taijiquan video with Chu Minyi, disciple of Wu Jianquan, recorded in 1937 in Shanghai. The video shows the Wu style set, tuishou and even Chu''s ''modern and scientific'' approach including his ''stick'' and ''ball'' system. A piece of history\r\n', 'Non-English', 154237, 'Tutorial,Group demo', 'http://i.ytimg.com/vi/yDaV9C0ERP8/mqdefault.jpg', 'wu style, tai chi, taiji, demo, mandarin'),
(46, ' Wu Style Tai Chi Taiji : Push hands & Force Skill', 'http://www.youtube.com/watch?v=YK1ExXfMEKE', 2, '480', '\r\n\r\nWu Style Tai Chi Taiji : Push hands & Force Skill KF694-3coo\r\n', 'English', 50026, 'Tutorial,Application,Group demo', 'http://i.ytimg.com/vi/YK1ExXfMEKE/mqdefault.jpg', 'wu style, tai chi, taiji, demo, group demo, application'),
(47, 'Wudang Taiji 13 (武当太极13势) - Master Yuan Xiu Gang (', 'http://www.youtube.com/watch?v=yktUHOiweHw', 8, '360', 'http://www.wudanggongfu.com. Wudang Taoist Traditional Kung Fu Academy Master Yuan Xiu Gang performing the wudang TaiJi ...', 'Non-English', 137665, 'Tutorial', 'http://i.ytimg.com/vi/yktUHOiweHw/mqdefault.jpg', 'sport'),
(48, 'Zhu Tiancai Tai_Chi & Push hands taichihealthways.', 'http://www.youtube.com/watch?v=YQjnvPUdOSQ', 7, '360', 'Visit http://www.taichihealthways.com for more videos of Master Jesse Tsao on Yang, Chen, Wu, Sun tai chi tyle and Tai Chi sword ...', 'English', 72899, 'Tutorial', 'http://i.ytimg.com/vi/YQjnvPUdOSQ/mqdefault.jpg', 'sport'),
(49, ' Wu Style Tai Chi Chuan - Vol 1 - 108 Standard For', 'http://www.youtube.com/watch?v=yZpuC6hWZy4', 1, '240', '\r\n\r\nA preview of Wu Style DVD Vol 1, featuring the 108 standard form performed by Grand Master Eddie Wu Kwong Yu, 5th generation head of the Wu family. http://www.wustyle.com\r\n', 'English', 99131, 'Tutorial', 'http://i.ytimg.com/vi/yZpuC6hWZy4/mqdefault.jpg', 'wu style, tai chi, taiji, demo');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userName` varchar(30) NOT NULL DEFAULT '',
  `passWord` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
 ADD KEY `userName` (`userName`), ADD KEY `vId` (`vId`);

--
-- Indexes for table `fun_video`
--
ALTER TABLE `fun_video`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`userName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fun_video`
--
ALTER TABLE `fun_video`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=50;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
ADD CONSTRAINT `favorites_ibfk_1` FOREIGN KEY (`userName`) REFERENCES `users` (`userName`),
ADD CONSTRAINT `favorites_ibfk_2` FOREIGN KEY (`vId`) REFERENCES `fun_video` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
