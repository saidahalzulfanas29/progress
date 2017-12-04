-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2015 at 04:25 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_septi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `id_admin` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(40) COLLATE latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(35) COLLATE latin1_general_ci NOT NULL,
  `jenis_kelamin` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `level` varchar(10) COLLATE latin1_general_ci NOT NULL DEFAULT 'sekolah',
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=105 ;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `username`, `password`, `nama_lengkap`, `jenis_kelamin`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'Laki-laki', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_berita`
--

CREATE TABLE IF NOT EXISTS `tbl_berita` (
  `id_berita` int(5) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id_berita`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_berita`
--

INSERT INTO `tbl_berita` (`id_berita`, `judul`, `isi`, `tanggal`) VALUES
(1, 'Manny Pacman Pacquiao, From Nothing to Somethingggg', 'Manny Pacquiao bukanlah siapa-siapa. Ia datang ke Amerika, tepatnya ke kota San Fransisco, California, Amerika Serikat, sama dengan kebanyakan migran Filipina lain; ingin mencari pekerjaan dan kehidupan lebih baik.\r\n\r\nTapi, sama dengan migran-migran itu, semua impian tak mudah diraih, maka ia pun terkatung-katung tanpa pekerjaan yang pasti. Meski ia adalah seorang petinju dan mantan juara dunia kelas terbang WBC serta masih memegang gelar juara WBC Internasional Super Bantam, di negeri Paman Sam itu, terlalu banyak petinju seperti dirinya.\r\n\r\nSiang itu, tepatnya minggu ketiga Mei 2001, Pacquiao menggunakan bus antarkota dari San Fransisco menuju Los Angeles. Menurut pengakuannya, sepanjang perjalanan, Pacquiao sama sekali tak pernah berpikir untuk menjadi seperti hari ini. Hatinya hanya ingin melepas rasa penasaran sambil meminta nasihat jika memungkinkan dari seorang pelatih besar, Freddie Roach.', '2015-05-02'),
(2, 'Ditabrak Mobil, Alfin Tuasalamony Kemungkinan Absen 1 Tahun', 'Usai mengalami kecelakaan, Alfin langsung dilarikan ke RSCM, Salemba, Jakpus untuk mendapat perawatan intensif. Sebagai tindakan pertama, tim dokter yang menangani pemain tim nasional U-23 itu memutuskan untuk melakukan operasi.\r\n\r\nOperasi tahap pertama sudah, tapi setahu saya kalau patah itu butuh 3 tahap, karena Alfin juga mengalami luka luar. Waktu pemulihan agak lama kira-kira 1 tahun, kata pelatih Persija, Rahmad Darmawan saat dihubungi VIVA.co.id. \r\n\r\nRahmad mengatakan saat ini kondisi psikologis Alfin tidak terlalu bermasalah. Dia terus mendapat dukungan moril dari rekan-rekannya di Macan Kemayoran dan juga dari pemain klub QNB League lainnya.\r\n\r\nAlfin sih baik saja, hanya memang tugas tim pelatih untuk suport dia. Yang jelas buat saya sekarang memotivasi dia saja. Banyak pemain yang datang ke sini. Kebetulan sekarang ada juga pemain-pemain PBR, ungkap pelatih yang akrab disapa RD itu. \r\n', '2015-05-02'),
(3, 'Alasan Rossi Melempem di Dua FP Pembuka MotoGP Spanyol', 'Valentino Rossi gagal menunjukkan performa terbaik kala melakoni free practice 1 dan 2 MotoGP Spanyol di Sirkuit Jerez, Jumat 1 Mei 2015. Menurutnya, urusan pemilihan ban menjadi salah satu kendala yang dihadapinya pada dua sesi pembuka tersebut.\r\n\r\nPada FP1, Rossi menduduki peringkat 6 dengan catatan waktu 1 menit 39,782 detik, namun kemudian merosot tajam ke posisi 13 pada FP2, dengan 1 menit 40,394 detik. Adapun rekannya, Jorge Lorenzo menjadi yang tercepat pada dua sesi tersebut.\r\n\r\nRossi juga mengakui bahwa dia dan tim belum mendapat formula terbaik untuk menaklukkan Jerez kali ini. Dan, pembalap gaek asal Italia tersebut siap bekerja keras untuk meraih hasil-hasil yang lebih baik pada hari kedua dan balapan di Jerez. ', '2015-05-02'),
(5, 'Partai Demokrat Dikritik Mantan Kader Tak Lagi Demokratis', 'Mantan Ketua DPC Partai Demokrat dari Surabaya, Dadik Risdariyanto, mengeluhkan kondisi partainya yang tidak lagi demokratis. Ia mencontohkan pemecatan sewenang-wenang terhadap 161 ketua dewan pimpinan cabang (DPC).\r\n\r\nMenurutnya, pemecatan tersebut hanya demi kepentingan segelintir elite Partai yang membawa-bawa nama Susilo Bambang Yudhoyono.\r\n\r\nDeklarasi ini didukung oleh 161 DPC yang di-plt-kan (dipecat dan diganti pelaksana tugas) secara tidak demokratis. Saya juga telah di-plt dengan cara yang juga tidak demokratis, kata Dadik dalam acara deklarasi Kaukus Penyelamat Partai Demokrat di Jakarta, Kamis, 30 April 2015.\r\n\r\nMenurut Dadik, figur utama Partai Demokrat, yakni SBY adalah seorang kader terbaik yang bisa memberi contoh kepada kader-kader lain. Tapi jelang kongres, malah ada yang belum demokrasi di Partai Demokrat, ujarnya.', '2015-05-02'),
(6, 'Jembatan Soekarno di Sulut Bisa Rampung Tahun Ini', 'Setelah mengalami banyak kendala, pembangunan jembatan Dr.Ir.Soekarno di Manado, Sulawesi Utara (Sulut) bisa segera dirampungkan tahun ini. Jembatan yang dicanangkan sejak 2013, sempat menghadapi banyak kendala, baik anggaran dan teknis.\r\n\r\nAnggota Komisi V DPR RI Yasti Soepredjo Mokoagow (dapil Sulut), menyampaikan hal tersebut di Manado, Sulut, Selasa 28 April 2015. \r\n\r\nYasti mengungkapkan, kendala yang meghadang pembangunan jembatan Soekarno seperti beruntun tak ada habisnya. Kendala pertama yang dihadapi adalah soal anggaran dari Anggaran Pendapatan dan Belanja Negara (APBN). \r\n\r\nPemerintah, nilai Yasti, tidak serius menganggarkan jembatan tersebut. Dari ratusan miliar anggaran yang disetujui dalam APBN, hanya lima miliar per tahun diberikan. Penyicilan anggaran tersebut, tentu menyulitkan pembangunan. Sejak diresmikan pembangunannya pada era Presiden Megawati hingga sekarang, jembatan Soekarno terbengkalai. Kini, ketika Komisi V terus mendorong lewat politik anggaran, jembatan itu segera bisa diselesaikan.', '2015-05-02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

CREATE TABLE IF NOT EXISTS `tbl_gallery` (
  `id_gallery` int(5) NOT NULL AUTO_INCREMENT,
  `judul_foto` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal` datetime NOT NULL,
  PRIMARY KEY (`id_gallery`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_gallery`
--

INSERT INTO `tbl_gallery` (`id_gallery`, `judul_foto`, `foto`, `keterangan`, `tanggal`) VALUES
(1, 'Foto 1', 'foto.jpg', '', '2015-11-01 00:00:00'),
(2, 'Foto 2', 'foto.jpg', '', '2015-11-14 10:00:00'),
(3, 'Foto 2', 'foto.jpg', '', '2015-11-12 00:21:35'),
(4, 'Foto 3', 'foto.jpg', '', '2015-11-15 07:20:27'),
(5, 'Foto 3', 'foto.jpg', 'Setelah Meraih Sarjana Ekonomi Universitas Bina Nusantara Jakarta, Mila Fokus Pada Kariernya. Aku Ingin Fokus Berkarier Dulu. Sambil Mengumpulkan Modal, Inginnya Nanti Bisnis. Antara Bisnis Kuliner Dan Bisnis Salon, Beri Tahu Mila.', '2015-11-21 00:00:00'),
(6, 'Foto 4', 'foto.jpg', '', '1899-11-30 19:22:52'),
(8, 'Foto Kegiatan sekolah ', 'Penguins.jpg', 'Foto Kegiatan sekolah Foto Kegiatan sekolah Foto Kegiatan sekolah Foto Kegiatan sekolah Foto Kegiatan sekolah Foto Kegiatan sekolah Foto Kegiatan sekolah Foto Kegiatan sekolah Foto Kegiatan sekolah Foto Kegiatan sekolah ', '2015-05-02 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_guru`
--

CREATE TABLE IF NOT EXISTS `tbl_guru` (
  `nip` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nm_guru` varchar(40) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` varchar(13) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `foto` varchar(40) NOT NULL,
  `telpon` varchar(12) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `jabatan` varchar(40) NOT NULL,
  `gol` varchar(7) NOT NULL,
  `tamatan` varchar(150) NOT NULL,
  `level` varchar(10) NOT NULL DEFAULT 'guru',
  PRIMARY KEY (`nip`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_guru`
--

INSERT INTO `tbl_guru` (`nip`, `password`, `nm_guru`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `foto`, `telpon`, `agama`, `jabatan`, `gol`, `tamatan`, `level`) VALUES
('198510102007011009', '', 'ERMAN.S.Pdd', 'JL.Padang Kajai NO.03 Sungai Limau', 'Pariaman', '1985-09-09', 'Perempaun', 'IMG_7619.JPG', '08123459888', 'Islam', 'Guru Penjaskes', 'III/A', '', 'guru'),
('195503231992031006', '', 'NUR EVANITA,S.Pd', 'JL.Kresnami NO.8 Pasar Sungai Geringging', 'Pariaman', '1955-05-20', 'Perempuan', 'mama.jpg', '081363478370', 'Islam', 'Kepala Sekolah', 'IV/B', '', 'guru'),
('197003231992031006', '', 'KADRIZAL.S.Pd ', 'JL.Batu Gadang NO.5 Sungai Geringging', 'padang', '1970-09-08', 'Laki-laki', 'IMG_7617.JPG', '0812345678', 'Islam', 'Guru kelas', 'III/B', '', 'guru'),
('19710151999082001', '', 'EFRILISNAWATI.S,Pd', 'JL.Pasar Bawah NO.02 Sunggai Geringging', 'padang', '1971-10-15', 'Perempuan', 'IMG_7649.JPG', '0812345677', 'Islam', 'Guru kelas', 'III/B', '', 'guru'),
('97307242007012005', '234123dfsd', 'RITA.B,SP dI', 'JL.Sudirman NO.10 Pariaman', 'Payakumbuh', '1975-07-08', 'Perempuan', 'IMG_7651.JPG', '0812345677', 'Islam', 'Guru Agama', 'III/B', '', 'guru'),
('197307242007012005', '12345', 'MARDIANIS, S.Pd', 'Batu Mengaum Sunggai Geringging', 'Pariaman', '1980-09-07', 'Perempuan', 'IMG_7653.JPG', '0812345670', 'Islam', 'Guru kelas', 'III/A', '', 'guru'),
('196807242007012005', '12345678', 'PETMAWATI, S.Pd', 'Simpang Jati Pariaman', 'Pariaman', '1968-10-08', 'Perempuan', 'IMG_7655.JPG', '08123459889', 'Islam', 'Guru kelas', 'III/C', '', 'guru'),
('198807242007012005', '', 'NOLPIANDRI, S.Pd', 'JL Durian Lilin NO.12 Sungai Geringging', 'Sungai Geringging', '1988-02-20', 'Laki-laki', 'IMG_7663.JPG', '0812345609', 'Islam', 'Guru kelas', 'III/A', '', 'guru'),
('197807242007012005', '', 'MARIA, S.Pd', 'JL.Baypas NO.04 Pariaman', 'padang', '1978-09-29', 'Perempuan', 'IMG_7649.JPG', '085272622257', 'Islam', 'Guru kelas', 'III/B', '', 'guru'),
('1988707242007012005', '12345', 'SUSI SUSANTI, S.Pd', 'Jati Pariaman', 'Solok', '1988-12-23', 'Perempuan', 'guru.jpg', '08123456781', 'Islam', 'Guru Bhs Inggris', 'III/A', '', 'guru'),
('197607242007012005', '12345', 'SAMSURIZAL, S.Pd', 'Simpang Tinju Padang', 'padang', '1976-07-07', 'Laki-laki', 'IMG_7665.JPG', '081234567790', 'Islam', 'Guru BAM', 'III/B', '', 'guru'),
('923480923784', '12345', 'ROBBY PRIHANDAYAA', 'Tunggul Hitam, Padang', 'Padang', '1989-05-06', 'Laki-laki', 'Desert.jpg', '081267771344', 'Islam', 'Keuangan', 'VII A', 'Universitas Putra Indonesia YPTK Padang', 'guru');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jadwal_pelajaran`
--

CREATE TABLE IF NOT EXISTS `tbl_jadwal_pelajaran` (
  `id_jadwal_pelajaran` int(11) NOT NULL AUTO_INCREMENT,
  `kd_kelas` varchar(11) NOT NULL,
  `kd_pelajaran` varchar(11) NOT NULL,
  `hari` varchar(20) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  PRIMARY KEY (`id_jadwal_pelajaran`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tbl_jadwal_pelajaran`
--

INSERT INTO `tbl_jadwal_pelajaran` (`id_jadwal_pelajaran`, `kd_kelas`, `kd_pelajaran`, `hari`, `jam_mulai`, `jam_selesai`) VALUES
(5, 'K01', 'MP01', 'Senin', '08:00:00', '10:00:00'),
(6, 'K02', 'MP02', 'Selasa', '08:00:00', '11:00:00'),
(7, 'K01', 'MP02', 'Senin', '10:00:00', '12:00:00'),
(8, 'K01', 'MP03', 'Selesa', '10:00:00', '12:00:00'),
(9, 'K02', 'MP04', 'Senin', '12:00:32', '14:30:00'),
(10, 'K03', 'MP01', 'Selesa', '12:00:32', '14:30:00'),
(11, 'K08', 'MP01', 'Selesa', '12:00:32', '14:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kelas`
--

CREATE TABLE IF NOT EXISTS `tbl_kelas` (
  `kd_kelas` varchar(4) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nm_kelas` varchar(20) NOT NULL,
  `kapasitas` int(3) NOT NULL,
  PRIMARY KEY (`kd_kelas`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kelas`
--

INSERT INTO `tbl_kelas` (`kd_kelas`, `nip`, `nm_kelas`, `kapasitas`) VALUES
('K03', '196807242007012005', '3', 40),
('K02', '19710151999082001', '2', 40),
('K01', '197003231992031006', '1', 35),
('K04', '197307242007012005', '4', 38),
('K05', '198807242007012005', '5', 40),
('K06', '197807242007012005', '6', 45),
('K07', '97307242007012005', '3 ', 32),
('K08', '1988707242007012005', '2 IPA', 43);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kepsek`
--

CREATE TABLE IF NOT EXISTS `tbl_kepsek` (
  `id_kepsek` int(5) NOT NULL AUTO_INCREMENT,
  `nip` varchar(40) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(40) COLLATE latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(35) COLLATE latin1_general_ci NOT NULL,
  `jenis_kelamin` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `alamat` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `tmpt_lahir` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `tgl_lahir` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `foto` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `no_telp` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `agama` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `jabatan` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `gol` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `lulusan` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `level` varchar(10) COLLATE latin1_general_ci NOT NULL DEFAULT 'sekolah',
  PRIMARY KEY (`id_kepsek`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=105 ;

--
-- Dumping data for table `tbl_kepsek`
--

INSERT INTO `tbl_kepsek` (`id_kepsek`, `nip`, `password`, `nama_lengkap`, `jenis_kelamin`, `alamat`, `tmpt_lahir`, `tgl_lahir`, `foto`, `no_telp`, `agama`, `jabatan`, `gol`, `lulusan`, `level`) VALUES
(1, 'kepala', '870f669e4bbbfa8a6fde65549826d1c4', 'Udin Sedunia', 'Laki-laki', 'Tunggul Hitam, Padang', 'padang', '1976-07-21', 'kepsek.jpg', '081267771344', 'Islam', 'Kepala Sekolah', 'VII A', 'Universitas Indonesia', 'kepsek');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mata_pelajaran`
--

CREATE TABLE IF NOT EXISTS `tbl_mata_pelajaran` (
  `kd_pelajaran` varchar(20) NOT NULL,
  `nm_mapel` varchar(150) NOT NULL,
  `nip` varchar(20) NOT NULL,
  PRIMARY KEY (`kd_pelajaran`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mata_pelajaran`
--

INSERT INTO `tbl_mata_pelajaran` (`kd_pelajaran`, `nm_mapel`, `nip`) VALUES
('MP01', 'Matematika', '197607242007012005'),
('MP02', 'Agama', '1988707242007012005'),
('MP03', 'Bahasa Indonesia', '197807242007012005'),
('MP04', 'Bahasa Ingris', '196807242007012005'),
('MP05', 'IPA', '197307242007012005'),
('MP06', 'IPS', '97307242007012005'),
('MP07', 'Penjas', '19710151999082001'),
('MP08', 'PPKN', '197003231992031006'),
('MP09', 'BAM', '195503231992031006'),
('MP11', 'Bahasa Jawa', '198510102007011009'),
('MP12', 'Bahasa Germany', '198807242007012005');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_materi_ajar`
--

CREATE TABLE IF NOT EXISTS `tbl_materi_ajar` (
  `id_materi_ajar` int(5) NOT NULL AUTO_INCREMENT,
  `kd_pelajaran` varchar(5) NOT NULL,
  `kd_kelas` varchar(5) NOT NULL,
  `keterangan` text NOT NULL,
  `file_materi_ajar` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id_materi_ajar`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_materi_ajar`
--

INSERT INTO `tbl_materi_ajar` (`id_materi_ajar`, `kd_pelajaran`, `kd_kelas`, `keterangan`, `file_materi_ajar`, `tanggal`) VALUES
(1, 'MP01', 'K01', 'bahan Ajar no 1', 'Maskapai.txt', '2015-05-07'),
(2, 'MP01', 'K01', 'bahan Ajar no 2', 'duplikasi_data.txt', '2015-05-07'),
(3, 'MP02', 'K01', 'bahan Pelajaran Agama 1', 'anak_kursus.txt', '2015-05-07'),
(4, 'MP02', 'K02', 'Bahan Ajar No 2', 'BAB II Selesai.docx', '2015-05-07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_page`
--

CREATE TABLE IF NOT EXISTS `tbl_page` (
  `id_page` int(5) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  PRIMARY KEY (`id_page`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_page`
--

INSERT INTO `tbl_page` (`id_page`, `judul`, `isi`) VALUES
(1, 'Selamat datang di sisfo SMP N 7 Lubuk basunggg', 'Setelah Meraih Sarjana Ekonomi Universitas Bina Nusantara Jakarta, Mila Fokus Pada Kariernya. "Aku Ingin Fokus Berkarier Dulu. Sambil Mengumpulkan Modal, Inginnya Nanti Bisnis. Antara Bisnis Kuliner Dan Bisnis Salon," Beri Tahu Mila.\r\n\r\nSetelah Meraih Sarjana Ekonomi Universitas Bina Nusantara Jakarta, Mila Fokus Pada Kariernya. "Aku Ingin Fokus Berkarier Dulu. Sambil Mengumpulkan Modal, Inginnya Nanti Bisnis. Antara Bisnis Kuliner Dan Bisnis Salon," Beri Tahu Mila.\r\n\r\nSetelah Meraih Sarjana Ekonomi Universitas Bina Nusantara Jakarta, Mila Fokus Pada Kariernya. "Aku Ingin Fokus Berkarier Dulu. Sambil Mengumpulkan Modal, Inginnya Nanti Bisnis. Antara Bisnis Kuliner Dan Bisnis Salon," Beri Tahu Mila.\r\n\r\nSetelah Meraih Sarjana Ekonomi Universitas Bina Nusantara Jakarta, Mila Fokus Pada Kariernya. "Aku Ingin Fokus Berkarier Dulu. Sambil Mengumpulkan Modal, Inginnya Nanti Bisnis. Antara Bisnis Kuliner Dan Bisnis Salon," Beri Tahu Mila.\r\n\r\nSetelah Meraih Sarjana Ekonomi Universitas Bina Nusantara Jakarta, Mila Fokus Pada Kariernya. "Aku Ingin Fokus Berkarier Dulu. Sambil Mengumpulkan Modal, Inginnya Nanti Bisnis. Antara Bisnis Kuliner Dan Bisnis Salon," Beri Tahu Mila.'),
(2, 'Profile SMP N 7 Lubuk basungeee', 'Setelah Meraih Sarjana Ekonomi Universitas Bina Nusantara Jakarta, Mila Fokus Pada Kariernya. "Aku Ingin Fokus Berkarier Dulu. Sambil Mengumpulkan Modal, Inginnya Nanti Bisnis. Antara Bisnis Kuliner Dan Bisnis Salon," Beri Tahu Mila.\r\n\r\nSetelah Meraih Sarjana Ekonomi Universitas Bina Nusantara Jakarta, Mila Fokus Pada Kariernya. "Aku Ingin Fokus Berkarier Dulu. Sambil Mengumpulkan Modal, Inginnya Nanti Bisnis. Antara Bisnis Kuliner Dan Bisnis Salon," Beri Tahu Mila.\r\n\r\nSetelah Meraih Sarjana Ekonomi Universitas Bina Nusantara Jakarta, Mila Fokus Pada Kariernya. "Aku Ingin Fokus Berkarier Dulu. Sambil Mengumpulkan Modal, Inginnya Nanti Bisnis. Antara Bisnis Kuliner Dan Bisnis Salon," Beri Tahu Mila.\r\n\r\nSetelah Meraih Sarjana Ekonomi Universitas Bina Nusantara Jakarta, Mila Fokus Pada Kariernya. "Aku Ingin Fokus Berkarier Dulu. Sambil Mengumpulkan Modal, Inginnya Nanti Bisnis. Antara Bisnis Kuliner Dan Bisnis Salon," Beri Tahu Mila.\r\n\r\nSetelah Meraih Sarjana Ekonomi Universitas Bina Nusantara Jakarta, Mila Fokus Pada Kariernya. "Aku Ingin Fokus Berkarier Dulu. Sambil Mengumpulkan Modal, Inginnya Nanti Bisnis. Antara Bisnis Kuliner Dan Bisnis Salon," Beri Tahu Mila.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siswa`
--

CREATE TABLE IF NOT EXISTS `tbl_siswa` (
  `no_induk` varchar(10) NOT NULL,
  `password` varchar(40) NOT NULL,
  `nm_siswa` varchar(40) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` varchar(15) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `sekolah_asal` varchar(90) NOT NULL,
  `nm_ortu` varchar(40) NOT NULL,
  `pekerjaan` varchar(40) NOT NULL,
  `kd_kelas` varchar(5) NOT NULL,
  `level` varchar(10) DEFAULT 'siswa',
  PRIMARY KEY (`no_induk`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`no_induk`, `password`, `nm_siswa`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `jk`, `agama`, `foto`, `sekolah_asal`, `nm_ortu`, `pekerjaan`, `kd_kelas`, `level`) VALUES
('111007', '123456', 'Revalina', 'Pariaman', 'Pariaman', '1999-03-03', 'Perempaun', 'Islam', 'siswa.jpg', 'Tk Harapan Bunda', 'Suheri', 'PNS', 'K01', 'siswa'),
('111008', '111008', 'Ahmad', 'JL.Padang Kajai Sungai Geringging', 'Sungai Geringging', '1999-08-27', 'Laki-laki', 'Islam', '', 'TK Bunga', 'Buyung', 'Wirausaha', 'K01', 'siswa'),
('111010', '111010', 'Zulva Suhendro', 'JL.Baru Pasar Sunggai Geringging', 'Pariaman', '1999-09-08', 'Laki-laki', 'Islam', 'IMG_7690.JPG', 'Tk Harapan Bunda', 'Nurevanita', 'PNS', 'K01', 'siswa'),
('111009', '111009', 'Aldo Pratama', 'JL.Patimura Pariaman', 'Padang', '0198-01-12', 'Laki-laki', 'Islam', 'IMG_7691.JPG', 'TK Melati', 'Sudarsono', 'petani', 'K01', 'siswa'),
('111006', '111006', 'Cicilia Simorangkir', 'JL.Durian ajung no.01 Sunggai Geringging', 'Medan', '1998-02-10', 'Perempuan', 'Islam', 'IMG_7736.JPG', '-', 'Suardi', 'petani', 'K01', 'siswa'),
('111005', '111005', 'Ayu Anisa', 'JL.Durian ajung no.01 Sunggai Geringging', 'Sungai Geringging', '1999-09-09', 'Perempuan', 'Islam', 'IMG00523-20120321-1409.jpg', '-', 'Ramzi', 'petani', 'K01', 'siswa'),
('111004', '111004', 'Anisa Tiara', 'JL.Durian Lilin no.04 Sunggai Geringging', 'Sungai Geringging', '1998-12-15', 'Perempuan', 'Islam', '', 'Tk Harapan Bunda', 'Suardi', 'PNS', 'K01', 'siswa'),
('111003', '111003', 'Desrizal', 'JL.Durian ajung no.07 Sunggai Geringging', 'Sungai Geringging', '1999-05-09', 'Laki-laki', 'Islam', 'IMG00483-20120321-1347.jpg', 'TK Bunga', 'Afrizal', 'Wirausaha', 'K01', 'siswa'),
('111002', '111002', 'Roni tanjung', 'JL.Durian Bukur no.01 Sunggai Geringging', 'Sungai Geringging', '1998-09-28', 'Laki-laki', 'Islam', '', 'Islam', '-', 'petani', 'K01', 'siswa'),
('111001', '111001', 'Elvi Hidayati', 'JL.Kresnami no.01 Sunggai Geringging', 'Pariaman', '1999-07-24', 'Laki-laki', 'Islam', 'IMG00526-20120321-1409.jpg', 'Tk Harapan Bunda', 'Rahmita', 'PNS', 'K01', 'siswa'),
('111020', '111020', 'Fauzan Suardi', 'JL.Kresnami No.09 Sungai Geringging', 'Sungai Geringging', '2007-09-09', 'Laki-laki', 'Islam', 'IMG00476-20120321-1341.jpg', 'TK Melati', 'Suardi', 'PNS', 'K02', 'siswa'),
('111019', '111019', 'Rifqi Riadi', 'JL.Kresnami No.10 Sungai Geringging', 'Pariaman', '2007-08-07', 'Laki-laki', 'Islam', 'IMG00928-20120411-1452.jpg', '-', 'Perianto', 'PNS', 'K04', 'siswa'),
('111018', '111018', 'Yudi Sudarsono', 'JL.Mawar No.09 Sungai Geringging', 'Padang', '2006-12-25', 'Laki-laki', 'Islam', 'IMG00927-20120411-1452.jpg', 'TK Bunga', 'Sudarsono', 'PNS', 'K03', 'siswa'),
('111017', '111017', 'Ade Yuhelmi', 'JL.Kresnami No.19 Sungai Geringging', 'Padang', '2007-10-07', 'Laki-laki', 'Islam', '', 'Tk Nurul ', 'Sumarno', 'petani', 'K01', 'siswa'),
('111016', '111016', 'Ahara Putra', 'JL.Anggrek No.09 Sungai Geringging', 'Sungai Geringging', '2006-08-12', 'Laki-laki', 'Islam', 'IMG00952-20120411-1503.jpg', 'Tk Harapan Bunda', 'Junaidi', 'petani', 'K02', 'siswa'),
('111015', '111015', 'Rahmi Putri', 'JL.Kresnami No.24 Sungai Geringging', 'Pariaman', '2007-12-08', 'Perempuan', 'Islam', 'IMG00930-20120411-1453.jpg', '-', 'Yunarni', 'petani', 'K02', 'siswa'),
('111014', '111014', 'Indah Sari', 'JL.Mawar No.01 Sungai Geringging', 'Sungai Geringging', '2007-05-17', 'Perempuan', 'Islam', 'IMG00940-20120411-1457.jpg', 'TK Bunga', 'Wandi', 'Wirausaha', 'K02', 'siswa'),
('111013', '111013', 'Mela Sonia', 'JL.Kresnami No.28 Sungai Geringging', 'Pariaman', '2006-12-19', 'Perempuan', 'Islam', 'IMG00942-20120411-1459.jpg', '-', 'farizal', 'petani', 'K02', 'siswa'),
('111012', '111012', 'Raviana', 'JL.Melati No.09 Sungai Geringging', 'Padang', '2007-06-12', 'Perempuan', 'Islam', 'IMG00959-20120411-1505.jpg', 'Tk Harapan Bunda', 'Surahman', 'Wirausaha', 'K02', 'siswa'),
('111011', '111011', 'Mutiara', 'JL.Anggrek No.09 Sungai Geringging', 'Pariaman', '2007-09-14', 'Perempuan', 'Islam', 'IMG00911-20120411-1056.jpg', 'TK Bunga', 'Zulihardi', 'PNS', 'K02', 'siswa'),
('111030', '111030', 'Sulis', 'JL.Mawar No.55 Sungai Geringging', 'Pariaman', '2006-12-12', 'Perempuan', 'Islam', 'Foto0416.jpg', 'Tk Nurul ', 'Buyung', 'petani', 'K03', 'siswa'),
('111029', '111029', 'Dara Maria', 'JL.Mawar No.15 Sungai Geringging', 'Padang', '2005-02-27', 'Perempuan', 'Islam', 'Foto-0354.jpg', '-', 'Nuwarman', 'Wirausaha', 'K03', 'siswa'),
('111028', '111028', 'Dela Sari', 'JL.Melatir No.55 Sungai Geringging', 'Sungai Geringging', '2006-03-04', 'Perempuan', 'Islam', 'Padang Barat-20130717-02347.jpg', 'Tk Nurul ', 'Ruslan', 'PNS', 'K03', 'siswa'),
('111027', '111027', 'Reska Diana', 'JL.Mawar No.25 Sungai Geringging', 'Pariaman', '2005-07-17', 'Perempuan', 'Islam', '', 'Tk Harapan Bunda', 'satria', 'petani', 'K03', 'siswa'),
('111026', '111026', 'Risa Rusda', 'JL.Mawar No.19 Sungai Geringging', 'Padang', '2006-05-12', 'Perempuan', 'Islam', 'Padang Barat-20130717-02280.jpg', '-', 'Marjohan', 'petani', 'K03', 'siswa'),
('111025', '111025', 'Joni Alvira', 'JL.Kresnami No.56 Sungai Geringging', 'Sungai Geringging', '2005-12-03', 'Laki-laki', 'Islam', 'Padang Barat-20130717-02385.jpg', '-', 'Samsir', 'PNS', 'K03', 'siswa'),
('111024', '111024', 'Teguh Putra', 'JL.Mawar No.23 Sungai Geringging', 'Pariaman', '2005-08-05', 'Laki-laki', 'Islam', 'IMG_1350.JPG', 'Tk Harapan Bunda', 'Putra', 'PNS', 'K03', 'siswa'),
('111023', '111023', 'Alek Pratama', 'JL.Mawar No.05 Sungai Geringging', 'Padang', '2006-11-11', 'Laki-laki', 'Islam', 'IMG_1376.JPG', 'TK Bunga', 'Salim', 'Wirausaha', 'K03', 'siswa'),
('111022', '111022', 'Noval Andes', 'JL.Anggrek No.14 Sungai Geringging', 'Sungai Geringging', '2005-07-12', 'Laki-laki', 'Islam', 'IMG_1328.JPG', '-', 'Sahrial', 'PNS', 'K03', 'siswa'),
('111021', '111021', 'Ruslianto', 'JL.Mawar No.29 Sungai Geringging', 'Pariaman', '2006-02-18', 'Laki-laki', 'Islam', '', 'TK Bunga', 'Sabarudin', 'Wirausaha', 'K03', 'siswa'),
('111040', '111040', 'Romi Candra', 'JL.Kresnami No.19 Sungai Geringging', 'Pariaman', '2004-09-07', 'Laki-laki', 'Islam', 'ghfdg.JPG', 'Tk Harapan Bunda', 'Samsir Alim', 'petani', 'K04', 'siswa'),
('111039', '111039', 'Deli Saputra', 'JL.Kresnami No.10 Sungai Geringging', 'Sungai Geringging', '2003-07-16', 'Laki-laki', 'Islam', 'IMG_1333.JPG', 'TK Bunga', 'Juanda', 'PNS', 'K04', 'siswa'),
('111038', '111038', 'Dino Alfian', 'JL.Kresnami No.33 Sungai Geringging', 'Padang', '2004-12-29', 'Laki-laki', 'Islam', '', 'Tk Nurul ', 'Norian', 'petani', 'K04', 'siswa'),
('111037', '111037', 'Alfian Putra', 'JL.Baltu Gadang No.19 Sungai Geringging', 'Pariaman', '2003-08-13', 'Laki-laki', 'Islam', '', '-', 'Asdian', 'PNS', 'K04', 'siswa'),
('111036', '111036', 'Hengki Pernando', 'JL.Anggrek No.55 Sungai Geringging', 'Sungai Geringging', '2004-03-31', 'Laki-laki', 'Islam', 'IMG_1348.JPG', 'Tk Nurul ', 'Amarzuki', 'Wirausaha', 'K04', 'siswa'),
('111035', '111035', 'Lola Febria', 'JL.Kresnami No.17 Sungai Geringging', 'Pariaman', '2004-02-05', 'Perempuan', 'Islam', 'IMG_1458.JPG', 'TK Melati', 'Martin ', 'Wirausaha', 'K04', 'siswa'),
('111034', '111034', 'Winda Arianti', 'JL.Padang Kajai No.16 Sungai Geringging', 'Sungai Geringging', '2004-05-05', 'Perempuan', 'Islam', 'IMG_1352.JPG', 'Tk Harapan Bunda', 'Doni Asri', 'PNS', 'K04', 'siswa'),
('111033', '111033', 'Nurul Huda', 'JL.Mawar No.31 Sungai Geringging', 'Pariaman', '2004-07-08', 'Perempuan', 'Islam', 'IMG_1368.JPG', '-', 'Fakhrul', 'Wirausaha', 'K04', 'siswa'),
('111032', '111032', 'Novita Dewi', 'JL.Kresnami No.04 Sungai Geringging', 'Sungai Geringging', '2004-10-17', 'Perempuan', 'Islam', 'IMG_1409.JPG', 'Tk Harapan Bunda', 'Andi Saputra', 'PNS', 'K04', 'siswa'),
('111031', '111031', 'Lara Sati', 'JL.Mawar No.11 Sungai Geringging', 'Sungai Geringging', '2004-04-14', 'Perempuan', 'Islam', 'IMG_1426.JPG', 'TK Bunga', 'Junaidi', 'Wirausaha', 'K04', 'siswa'),
('111050', '111050', 'Ali Imran', 'JL.Anggrek No.09 Sungai Geringging', 'Pariaman', '2003-12-12', 'Laki-laki', 'Islam', 'DSC07402.JPG', 'Tk Harapan Bunda', 'Zulmaedi', 'PNS', 'K05', 'siswa'),
('111049', '111049', 'Soni Saputra', 'JL.Anggrek No.49 Sungai Geringging', 'Sungai Geringging', '2002-08-16', 'Laki-laki', 'Islam', 'DSC07403.JPG', 'Tk Harapan Bunda', 'Boni Suli', 'petani', 'K05', 'siswa'),
('111048', '111048', 'Galng Ramadan', 'JL.Anggrek No.44 Sungai Geringging', 'Padang', '2003-09-12', 'Laki-laki', 'Islam', 'DSC07437.JPG', 'TK Bunga', 'Jamaludin', 'petani', 'K05', 'siswa'),
('111047', '111047', 'Akhyar Dinanda', 'JL.Kresnami No.66 Sungai Geringging', 'Sungai Geringging', '2002-12-31', 'Laki-laki', 'Islam', '', 'TK Melati', 'Harimulia', 'PNS', 'K05', 'siswa'),
('111046', '111046', 'aliando', 'JL.Anggrek No.49 Sungai Geringging', 'Sungai Geringging', '2003-01-30', 'Laki-laki', 'Islam', 'DSC07464.JPG', 'TK Bunga', 'Sudarsono', 'petani', 'K05', 'siswa'),
('111045', '111045', 'Sisi Prisilia', 'JL.Mawar No.19 Sungai Geringging', 'Sungai Geringging', '2003-09-09', 'Perempuan', 'Islam', 'DSC07448.JPG', 'Tk Harapan Bunda', 'Nurevanita', 'PNS', 'K05', 'siswa'),
('111044', '111044', 'Pitaloka', 'JL.Anggrek No.61 Sungai Geringging', 'Pariaman', '2003-12-13', 'Perempuan', 'Islam', 'DSC07438.JPG', 'Tk Harapan Bunda', 'Sopian', 'Wirausaha', 'K05', 'siswa'),
('111043', '111043', 'Karina', 'JL.Kresnami No.17 Sungai Geringging', 'Sungai Geringging', '2002-10-10', 'Perempuan', 'Islam', 'DSC07545.JPG', '-', 'Samsuardi', 'Wirausaha', 'K05', 'siswa'),
('111042', '111042', 'Ratna Sari', 'JL.Anggrek No.60 Sungai Geringging', 'Pariaman', '2003-05-08', 'Perempuan', 'Islam', '', 'TK Bunga', 'Buyung Ismu', 'PNS', 'K05', 'siswa'),
('111041', '111041', 'Denada', 'JL.Melati No.11 Sungai Geringging', 'Sungai Geringging', '2003-03-15', 'Perempuan', 'Islam', 'DSC07412.JPG', 'Tk Harapan Bunda', 'Wardian', 'petani', 'K05', 'siswa'),
('111060', '111060', 'Robi Siswanto', 'JL.Melati No.22 Sungga Gerinnging', 'Sungai Geringging', '2002-09-09', 'Laki-laki', 'Islam', 'no-image.jpg', 'Tk Harapan Bunda', 'Kamirsah', 'petani', 'K06', 'siswa'),
('111059', '111059', 'Jandia Putra', 'JL.Melati No.27 Sungga Gerinnging', 'Pariaman', '2001-12-23', 'Laki-laki', 'Islam', 'DSC07499.JPG', 'TK Bunga', 'Jalius', 'PNS', 'K06', 'siswa'),
('111058', '111058', 'Tristan', 'JL.Melati No.20 Sungga Gerinnging', 'Sungai Geringging', '2002-08-31', 'Laki-laki', 'Islam', 'DSC07453.JPG', 'TK Melati', 'Nurevanita', 'PNS', 'K06', 'siswa'),
('111057', '111057', 'Rafael', 'JL.Melati No.02 Sungga Gerinnging', 'Pariaman', '2002-11-11', 'Laki-laki', 'Islam', 'DSC07402.JPG', '-', 'Fatimah', 'Wirausaha', 'K06', 'siswa'),
('111056', '111056', 'Rifqi Putra', 'JL.Mawar No.10 Sungga Gerinnging', 'Sungai Geringging', '2002-02-22', 'Laki-laki', 'Islam', '', '-', 'Sopian Hadi', 'PNS', 'K06', 'siswa'),
('111055', '111055', 'Rani Wati', 'JL.Mawar No.89 Sungga Gerinnging', 'Pariaman', '2002-06-08', 'Perempuan', 'Islam', 'DSC07444.JPG', 'Tk Harapan Bunda', 'Susi', 'PNS', 'K06', 'siswa'),
('111054', '111054', 'Lili Putri', 'JL.Mawar No.15 Sungga Gerinnging', 'Pariaman', '2001-04-07', 'Perempuan', 'Islam', 'DSC07450.JPG', 'TK Melati', 'Dilawati', 'Wirausaha', 'K06', 'siswa'),
('111053', '111053', 'Dini Aminarti', 'JL.Kresnami No.76 Sungga Gerinnging', 'Padang', '2002-09-09', 'Perempuan', 'Islam', 'DSC07561.JPG', 'Tk Nurul ', 'Amarzoni', 'petani', 'K06', 'siswa'),
('111052', '111052', 'Dika Utari', 'JL.Kresnami No.70 Sungga Gerinnging', 'Sungai Geringging', '2002-07-23', 'Perempuan', 'Islam', 'DSC07538.JPG', 'Tk Harapan Bunda', 'Andi Kajai', 'petani', 'K06', 'siswa'),
('111051', '111051', 'Siska Waluya', 'JL.Kresnami No.46 Sungga Gerinnging', 'Padang', '', 'Perempuan', 'Islam', 'DSC07536.JPG', 'TK Bunga', 'Rina Nose', 'PNS', 'K06', 'siswa');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
