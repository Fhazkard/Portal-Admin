-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Oct 26, 2016 at 01:51 PM
-- Server version: 10.0.27-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bimbelwi_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE IF NOT EXISTS `galeri` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `file` varchar(200) NOT NULL,
  `kategori` int(2) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `oleh` int(2) NOT NULL,
  `tgl` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id`, `file`, `kategori`, `keterangan`, `oleh`, `tgl`) VALUES
(11, 'no (4).jpg', 2, 'Wisdom', 0, '2016-05-23 10:01:55'),
(12, 'no (1).jpg', 2, 'w', 0, '2016-05-23 10:02:21'),
(13, '1.jpg', 3, 'Wisdom', 0, '2016-05-23 10:24:53'),
(14, '2.jpg', 3, 'Wisdom', 0, '2016-05-23 10:25:17'),
(15, 'wisdom.jpg', 3, 'Wisdom', 0, '2016-05-23 10:25:34'),
(16, 'no (3).jpg', 2, 'Wisdom', 0, '2016-05-23 10:26:37'),
(17, '16-04-29-18-09-23-838_photo.jpg', 2, 'Murid Wisdom', 0, '2016-10-14 13:38:53');

-- --------------------------------------------------------

--
-- Table structure for table `galerikategori`
--

CREATE TABLE IF NOT EXISTS `galerikategori` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `galerikategori`
--

INSERT INTO `galerikategori` (`id`, `nama`) VALUES
(2, 'Kegiatan Wisdom'),
(3, 'Wisdom');

-- --------------------------------------------------------

--
-- Table structure for table `postingan`
--

CREATE TABLE IF NOT EXISTS `postingan` (
  `ID_postingan` int(255) NOT NULL AUTO_INCREMENT,
  `Judul` varchar(500) NOT NULL,
  `Postingan` text NOT NULL,
  `Tanggal` datetime NOT NULL,
  `Gambar` varchar(500) NOT NULL,
  PRIMARY KEY (`ID_postingan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `postingan`
--

INSERT INTO `postingan` (`ID_postingan`, `Judul`, `Postingan`, `Tanggal`, `Gambar`) VALUES
(15, 'ABOUT WISDOM', 'Lembaga Bimbingan Belajar Wisdom berada di Komplek Baloi Abadi Blok A No. 1 dan 2. Bimbingan Belajar Wisdom didirikan pada tahun 2010 bulan Mei, Bimbingan Belajar Wisdom bergerak dibidang pendidikan non formal dengan menyediakan jasa bimbingan belajar mata pelajaran sekolah bagi murid-murid Playgroup, TK (Taman kanak-kanak), dan SD (sekolah dasar), serta menyediakan jasa kursus Mandarin dan kursus bahasa Inggris.\r\nPada hari Senin hingga hari Jumat, Bimbingan Belajar Wisdom mengajar anak-anak Playgroup, TK (Taman kanak-kanak), dan SD (Sekolah dasar) dari jam 08.00 WIB hingga jam 18.30 WIB dan pada hari Sabtu dan Minggu dikhususkan untuk bimbingan belajar bahasa Mandarin dan bahasa Inggris dimana waktu kerja dari jam 12.00 WIB hingga jam 16.00 WIB.\r\n', '2016-04-18 00:00:00', 'upload/about.png'),
(22, '13 tips dan cara mendidik anak yang baik, benar dan efektif di usia dini', '<p>Tak dapat dipungkiri lagi bahwa anak adalah merupakan harapan dan tumpuan orang tua kelak di kemudian hari. Oleh karenanya, sebagai orang tua tentu harus dapat memberikan bimbingan serta arahan yang tepat agar ia menjadi manusia yang baik dan berakhlak mulia sebagaimana yang kita inginkan kelak saat mereka telah dewasa. Usia 0 tahun merupakan masa-masa yang kritis bagi perkembangan otak sang anak. Pada tahap inilah anak mengalami masa-masa keemasan dimana perkembangan otaknya terjadi dengan cepat dan pesat. Pada masa ini bahkan otak anak memiliki kemampuan untuk menyerap pengalaman-pengalaman baru lebih cepat dari anak yang berusia 3 tahun. Oleh sebabnya, Anda jangan sampai salah dalam mendidik maupun memberikan contoh-contoh bagi putra-putri Anda. Tips sukses cara mendidik anak yang baik memiliki banyak metode. Seberapa besar tingkat kesuksesan dari metode yang diterapkan tentu tergantung dari seberapa efektif masing-masing orang tua dalam memberikan kontribusi kepada anak-anaknya. Agar Anda tak bingung dalam memberikan arahan untuk anak, berikut ini adalah beberapa cara mendidik anak yang baik, benar dan bijak yang bisa Anda coba.</p>\r\n<ol>\r\n<li>Bersikap lembut dan tunjukkan kasih sayang yang tulus Sebagai orang tua, selalu bersikap lembut kepada anak adalah hal mutlak yang harus dilakukan. Sebab hanya dengan tutur kata yang lembut, seorang anak akan mendengarkan perkataan dari orang tuanya. Selain dituntut untuk bersikap lembut kepada anak, orang tua juga selayaknya memberikan kasih sayang yang tulus dan utuh kepada anak. Salah satu contohnya adalah dengan mengatakan kepada anak bahwa Anda sangat menyayanginya. Pelukan atau ciuman juga bisa menjadi penyemangat tersendiri bagi jiwa sang anak yang bisa Anda lakukan.</li>\r\n<li>Jadilah pendengar yang baik dan berikan dukungan Mungkin anak Anda pernah merasakan di olok-olok oleh teman sebayanya. Sebagai orang tua yang baik, cobalah untuk melakukan pendekatan agar si anak mau bercerita. Di saat seperti itu Anda dituntut untuk menjadi pendengar yang baik dan mampu mendengarkan semua keluh dan kesah si kecil. Ini adalah kunci sukses dalam membangun rasa percaya diri sang anak. Berikanlah dukungan yang positif dan bekalilah ia dengan skill untuk menghindari olokan temannya serta kemampuan untuk bisa bersosialisasi dengan baik. Sebagai contoh Anda dapat mengajarkan anak Anda untuk menghindari sebuah ejekan dari temannya. Misalnya jika ada temannya yang mengatakan "Kamu jelek", lantas jawaban yang paling tepat adalah "Biarin yang penting pinter". Anak yang terbiasa mengolok-olok pasti akan merasa bosan dengan jawaban yang demikian karena ejekannya tidak ditanggapi dengan serius serta tidak mendapatkan feedback sesuai dengan yang ia inginkan, misalnya dengan menangis, mengadu atau marah.</li>\r\n<li>Bangun kreatifitas dengan bermain bersama Mengajarkan anak bukan berarti harus selalu membuat "peraturan-peraturan baru" yang tidak menyenangkan baginya, akan tetapi juga bisa dengan cara bermain bersama. Biarkan ia mempelajari sesuatu dari Anda dengan cara-cara yang jauh lebih menyenangkan seperti bermain, menari atau bermain musik bersama.</li>\r\n<li>Hindari menggunakan kata "Jangan" Inilah salah satu kesalahan yang kerap dilakukan oleh orang tua. Di saat anak tengah bereksperimen yang mungkin sedikit membahayakan, orang tua umumnya berkata "jangan" kepada anaknya. Sesungguhnya kata ini apabila terlalu sering diucapkan oleh orang tua kepada anaknya justru dapat berakibat negatif yang menyebabkan sang anak tidak berkembang kreatifitasnya. Untuk mengganti kata "jangan", Anda sebaiknya menggunakan kata lain yang bermakna lebih positif. Contoh kasusnya seperti misalnya ada anak yang berlari, lalu bundanya berkata "Jangan lari!". Sesungguhnya yang dimaksud sang bunda adalah "berjalan" saja akan tetapi sang anak tidak menangkap maksud ini. Jadi kalimat yang sebaiknya digunakan adalah "Berjalan saja" atau "Pelan-pelan saja" dan lain sebagainya.</li>\r\n<li>Jadilah panutan dan idola untuk anak Anda Pada umumnya setiap anak memiliki idola "superhero" di dunia imajinasinya. Namun di dunia yang sesungguhnya, ia juga pasti ingin memilikinya. Anda sebagai orang tua sebisa mungkin mencoba untuk menjadi apa yang diinginkan sang anak dan selalu bisa diandalkan. Salah satunya adalah dengan melakukan apa pun yang menurut Anda terbaik untuk bisa diberikan kepada putra-putri Anda.</li>\r\n<li>Berikan rasa nyaman Tumbuhkanlah rasa nyaman saat anak sedang bersama dengan Anda. Ajaklah untuk berdiskusi kecil di sela-sela kebersamaan Anda. Agar anak merasa nyaman, sebaiknya jangan menjadi yang merasa paling tahu segalanya sehingga membuat Anda terkesan mendominasi pembicaraan. Jadikan ia seperti seorang teman yang juga perlu untuk Anda dengarkan dengan baik dan penuh rasa simpati.</li>\r\n<li>Tumbuhkan sikap menghormati Ajarkan ia untuk selalu menghormati siapa pun orangnya, baik orang yang lebih tua maupun teman sebayanya. Hal ini penting untuk ditumbuhkan semenjak usia dini karena di kemudian hari saat ia dewasa ia dapat berlaku hormat kepada semua orang.</li>\r\n<li>Ajarkan rasa tanggung jawab Ajarkan dan ingatkan anak Anda untuk selalu memiliki rasa tanggung jawab terhadap dirinya. Misalnya jika telah tiba waktunya untuk sekolah, ia harus berangkat. Jika ia bertanya mengapa harus demikian. Berikanlah alasan yang bisa dipahami olehnya.</li>\r\n<li>Ajarkan untuk meminta maaf Meminta maaf atas sebuah kesalahan adalah tindakan yang mulia dan kesatria. Ajarkanlah anak Anda untuk mau meminta maaf untuk kesalahan yang mungkin ia lakukan terhadap teman sebayanya agar ia menyadari bahwa perbuatan yang dilakukannya adalah tindakan yang kurang terpuji.</li>\r\n<li>Jangan ditakut-takuti Orang tua biasanya cenderung mengambil "jalan pintas" yang mudah. Selain berbohong, orang tua juga biasanya kerap menakut-nakuti anak agar anaknya mau menurut dengan segera. Ini adalah perilaku orang tua yang keliru karena selain bisa menjadi semacam trauma saat ia dewasa, hal ini juga mengakibatkan anak menjadi tidak mandiri sehingga dapat mengurung kreatifitasnya.</li>\r\n<li>Jangan dibohongi Sama halnya dengan ditakut-takuti, anak yang kerap dibohongi saat masih kecil akan menjadi terbiasa dengan kebohongan-kebohongan yang ditanamkan oleh orang tuanya. Saat nanti ia sudah besar, ia tentu akan menganggap berbohong adalah hal yang wajar untuk dilakukan karena semua orang termasuk orang tuanya juga melakukannya.</li>\r\n<li>Jangan berkata keras dan mengancam Banyak orang bilang anak itu tidak bedanya seperti kertas putih yang kosong. Baik atau tidaknya anak juga tergantung dari yang diajarkan orang tua kepadanya. Oleh sebabnya cobalah untuk sebisa mungkin menghindari perkataan yang keras, mengancam atau bahkan meneriaki sang anak. Apabila perilaku anak mungkin terkesan nakal atau bandel, cobalah untuk menahan emosi Anda dan katakan dengan lembut serta bijaksana.</li>\r\n<li>Ajarkan keterbukaan Disaat Anda memiliki waktu luang bersama dengan sang buah hati. Ajaklah berbincang dan cobalah untuk mencari tahu mengenai kesehariannya. Apa saja yang ia lakukan, apa yang membuat ia senang, apa yang membuatnya sedih atau bahkan yang membuatnya bersemangat. Dengan terbukanya sang anak, Anda juga bisa mencari mencari celah untuk dapat mengetahui sifat sang anak sekaligus menjadi inspirasi bagi orang tua. Orang tua yang baik dan bijak adalah orang tua yang dapat mengambil pengalaman dan pelajaran dari siapa pun termasuk dari anaknya sendiri.</li>\r\n</ol>', '2016-04-29 21:07:07', 'upload/cara mendidik anak yang baik.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_about`
--

CREATE TABLE IF NOT EXISTS `tbl_about` (
  `id_about` int(255) NOT NULL AUTO_INCREMENT,
  `bg_isi` text NOT NULL,
  `Gambar` varchar(500) NOT NULL,
  PRIMARY KEY (`id_about`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_about`
--

INSERT INTO `tbl_about` (`id_about`, `bg_isi`, `Gambar`) VALUES
(1, 'Bimbingan Belajar Wisdom didirikan pada tahun 2010 bulan Mei dengan nama mula-mula yaitu Wisdom Tuition.\r\n\r\nPemilik mendapatkan bahwa belum banyak orang tua yang mengetahui arti “tuition” yang artinya les/ bimbingan belajar.\r\n\r\nOleh karena itu agar produk dapat dikenali langsung oleh konsumen, maka Wisdom Tuition digantikan dengan Bimbingan Belajar Wisdom.\r\n\r\nBimbingan belajar Wisdom beralamat di Komplek Ruko Baloi Abadi Blok A No 1 dan 2.\r\n\r\nBimbingan Belajar Wisdom bergerak dibidang pendidikan non formal dengan menyediakan jasa bimbingan belajar mata pelajaran sekolah bagi murid-murid PG, TK dan SD, serta menyediakan jasa kursus Mandarin dan kursus Inggris.\r\n\r\nHingga saat ini, jumlah anak didik Bimbingan Belajar Wisdom telah mencapai lebih dari 130 murid dengan tenaga pengajar sebanyak 7 orang termasuk pemilik.', 'upload2/3.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_video`
--

CREATE TABLE IF NOT EXISTS `tbl_video` (
  `id_video` int(255) NOT NULL AUTO_INCREMENT,
  `jdl_video` varchar(255) NOT NULL,
  `link_video` varchar(255) NOT NULL,
  `tanggal_up` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_video`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_video`
--

INSERT INTO `tbl_video` (`id_video`, `jdl_video`, `link_video`, `tanggal_up`) VALUES
(1, 'Welcome to Rainbow Kids', 'http://www.youtube.com/embed/cGIvQJmLxMQ?rel=0&amp;autoplay=0', '2016-04-26 04:04:04'),
(2, 'Yell yell Rainbow Kids', 'http://www.youtube.com/embed/juTDXlxd7Go?rel=0&amp;autoplay=0', '2016-04-25 20:21:29'),
(3, 'Birthday Celebration with my lovely students', 'http://www.youtube.com/embed/u6nreP6SOAY?rel=0&amp;autoplay=0', '2016-04-25 20:21:29'),
(4, 'Rainbow persekutuan doa', 'http://www.youtube.com/embed/dNj7d1Fo2cc?rel=0&amp;autoplay=0', '2016-04-25 20:22:23');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `fullname`) VALUES
(3, 'adminwisdom', 'QWERTY2016', 'administrator Wisdom');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
