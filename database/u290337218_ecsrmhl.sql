-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 23, 2026 at 01:23 PM
-- Server version: 11.8.6-MariaDB-log
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u290337218_ecsrmhl`
--

-- --------------------------------------------------------

--
-- Table structure for table `aksi`
--

CREATE TABLE `aksi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_kegiatan` int(11) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `desa` varchar(255) NOT NULL,
  `target` text NOT NULL,
  `realisasi_fisik` text NOT NULL,
  `realisasi_uang` text NOT NULL,
  `tanggal` date NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nominalpagu` bigint(20) NOT NULL,
  `idbidang` varchar(255) NOT NULL,
  `idperusahaan` varchar(255) NOT NULL,
  `output` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `lampiran` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `tahun` varchar(255) NOT NULL,
  `catatan` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aksi`
--

INSERT INTO `aksi` (`id`, `id_kegiatan`, `kecamatan`, `desa`, `target`, `realisasi_fisik`, `realisasi_uang`, `tanggal`, `nama`, `nominalpagu`, `idbidang`, `idperusahaan`, `output`, `deskripsi`, `lampiran`, `lokasi`, `tahun`, `catatan`, `status`, `created_at`, `updated_at`) VALUES
(21, 21, '', '', 'uang', '', '4000000', '0000-00-00', 'Bantuan dana acara Natal Tahun 2024 Kampung Mamahak Besar Kec. Long Bagun', 4000000, '4', '9', 'uang', '-', '-', 'Kec. Long Bagun', '2025', '-', 'tayang', '2025-01-20 00:00:00', '2025-01-20 00:00:00'),
(22, 22, '', '', 'uang', '', '1500000', '0000-00-00', 'Bantuan Dana Acara Paskah Kampung Long Hurai', 1500000, '4', '9', 'uang', '-', '-', 'Kampung Long Hurai', '2025', '-', 'tayang', '2025-05-02 00:00:00', '2025-05-02 00:00:00'),
(23, 23, '', '', 'uang', '', '1500000', '0000-00-00', 'Bantuan dana acara Paskah Gereja Paroki Santa Maria Long Hubung', 1500000, '4', '9', 'uang', '-', '-', 'Long Hubung', '2025', '-', 'tayang', '2025-05-02 00:00:00', '2025-05-02 00:00:00'),
(24, 24, '', '', 'uang', '', '14779866', '0000-00-00', 'Bantuan Sekolah dan Pendidikan', 14779866, '1', '9', 'uang', '-', '-', 'Mahakam Ulu', '2025', '-', 'tayang', '2025-01-01 00:00:00', '2025-01-01 00:00:00'),
(25, 24, '', '', 'uang', '', '14779866', '0000-00-00', 'Bantuan Sekolah dan Pendidikan', 14779866, '1', '9', 'uang', '-', '-', 'Mahakam Ulu', '2025', '-', 'tayang', '2025-02-01 00:00:00', '2025-02-01 00:00:00'),
(26, 24, '', '', 'uang', '', '14779866', '0000-00-00', 'Bantuan Sekolah dan Pendidikan', 14779866, '1', '9', 'uang', '-', '-', 'Mahakam Ulu', '2025', '-', 'tayang', '2025-03-01 00:00:00', '2025-03-01 00:00:00'),
(27, 24, '', '', 'uang', '', '14779866', '0000-00-00', 'Bantuan Sekolah dan Pendidikan', 14779866, '1', '9', 'uang', '-', '-', 'Mahakam Ulu', '2025', '-', 'tayang', '2025-04-01 00:00:00', '2025-04-01 00:00:00'),
(28, 24, '', '', 'uang', '', '14779866', '0000-00-00', 'Bantuan Sekolah dan Pendidikan', 14779866, '1', '9', 'uang', '-', '-', 'Mahakam Ulu', '2025', '-', 'tayang', '2025-05-01 00:00:00', '2025-05-01 00:00:00'),
(29, 24, '', '', 'uang', '', '14779866', '0000-00-00', 'Bantuan Sekolah dan Pendidikan', 14779866, '1', '9', 'uang', '-', '-', 'Mahakam Ulu', '2025', '-', 'tayang', '2025-06-01 00:00:00', '2025-06-01 00:00:00'),
(30, 30, '', '', 'uang', '', '4000000', '0000-00-00', 'Bantuan dana acara Natal Tahun 2024 Kampung Mamahak Besar Kec. Long Bagun', 4000000, '4', '10', 'uang', '-', '-', 'Kampung Mamahak Besar Kec. Long Bagun', '2025', '-', 'tayang', '2025-01-20 00:00:00', '2025-01-20 00:00:00'),
(31, 31, '', '', 'uang', '', '7000000', '0000-00-00', 'Biaya perayaan Natal Sempekat Tonyooi Benuaq (STB) sesuai dengan hasil rapat dengan Bupati Kubar tanggal 8 Januari 2025', 7000000, '4', '10', 'uang', '-', '-', 'Tonyooi Benuaq', '2025', '-', 'tayang', '2025-01-20 00:00:00', '2025-01-20 00:00:00'),
(32, 32, '', '', 'uang', '', '1000000', '0000-00-00', 'Bantuan Dana Perayaan Paskah Tahun 2025 Gereja Katolik Paroki Keluarga Suci Tering Kec. Tering', 1000000, '4', '10', 'uang', '-', '-', 'Kec. Tering', '2025', '-', 'tayang', '2025-03-17 00:00:00', '2025-03-17 00:00:00'),
(33, 33, '', '', 'uang', '', '2000000', '0000-00-00', 'Bantuan Dana Perbaikan Jalan Poros PU Kamp. Suko Mulyo Kec. Long Iram', 2000000, '2', '10', 'uang', '-', '-', 'Kec. Long Iram', '2025', '-', 'tayang', '2025-03-17 00:00:00', '2025-03-17 00:00:00'),
(34, 34, '', '', 'uang', '', '1000000', '0000-00-00', 'Bantuan Dana Acara Paskah Gereja ST. Mikael', 1000000, '4', '10', 'uang', '-', '-', '-', '2025', '-', 'tayang', '2025-04-15 00:00:00', '2025-04-15 00:00:00'),
(35, 35, '', '', 'uang', '', '1000000', '0000-00-00', 'Bantuan Dana Acara Paskah Jemaat GKE \"SION\" Tukul (Resort GKE Mahakam) Kamp. Tukul', 1000000, '4', '10', 'uang', '-', '-', 'Kamp. Tukul', '2025', '-', 'tayang', '2025-04-15 00:00:00', '2025-04-15 00:00:00'),
(36, 36, '', '', 'meteran', '', '48000000', '0000-00-00', 'Bantuan Pemasangan Kwh Listrik PLN Kampung Tukul MCA3, 12 KWH (Meteran)', 48000000, '2', '10', 'meteran', '-', '-', 'Kamp. Tukul', '2025', '-', 'tayang', '2025-04-30 00:00:00', '2025-04-30 00:00:00'),
(37, 37, '', '', 'uang', '', '15000000', '0000-00-00', 'Bantuan Biaya Partisipasi Kegiatan Pekan Daerah XI Petani Nelayan Provinsi Kalimantan Timur yang dilaksanakan di Kutai Barat hasil rapat dengan Bupati Kutai Barat tanggal 09 Mei 2025', 15000000, '7', '10', 'uang', '-', '-', 'Mahakam Ulu', '2025', '-', 'tayang', '2025-05-22 00:00:00', '2025-05-22 00:00:00'),
(38, 38, '', '', 'sapi', '', '25000000', '0000-00-00', 'Bantuan CSR Sapi Kurban Idul Adha 1446 H di Kamp. Long Gelawang PT MCA 1', 25000000, '4', '10', 'sapi', '-', '-', 'Kamp. Long Gelawang', '2025', '-', 'tayang', '2025-06-03 00:00:00', '2025-06-03 00:00:00'),
(39, 39, '', '', 'sapi', '', '25000000', '0000-00-00', 'Bantuan CSR Sapi Kurban Idul Adha 1446 H di Kamp. Mamahak Ulu PT MCA 1', 25000000, '4', '10', 'sapi', '-', '-', 'Kamp. Mamahak Ulu', '2025', '-', 'tayang', '2025-06-03 00:00:00', '2025-06-03 00:00:00'),
(40, 40, '', '', 'Pemeriksaan Kesehatan', '', '39592961', '0000-00-00', 'Baksos Sunatan Massal dan Pemeriksaan Kesehatan Gratis FAPA Kaltim', 39592961, '2', '10', 'Pemeriksaan Kesehatan', '-', '-', 'Mahakam Ulu', '2025', '-', 'tayang', '2025-06-30 00:00:00', '2025-06-30 00:00:00'),
(41, 41, '', '', 'uang', '', '33071350', '0000-00-00', 'Bantuan Sekolah dan Pendidikan', 33071350, '1', '10', 'uang', '-', '-', 'Mahakam Ulu', '2025', '-', 'tayang', '2025-01-01 00:00:00', '2025-01-01 00:00:00'),
(42, 41, '', '', 'uang', '', '33071350', '0000-00-00', 'Bantuan Sekolah dan Pendidikan', 33071350, '1', '10', 'uang', '-', '-', 'Mahakam Ulu', '2025', '-', 'tayang', '2025-02-01 00:00:00', '2025-02-01 00:00:00'),
(43, 41, '', '', 'uang', '', '33071350', '0000-00-00', 'Bantuan Sekolah dan Pendidikan', 33071350, '1', '10', 'uang', '-', '-', 'Mahakam Ulu', '2025', '-', 'tayang', '2025-03-01 00:00:00', '2025-03-01 00:00:00'),
(44, 41, '', '', 'uang', '', '33071350', '0000-00-00', 'Bantuan Sekolah dan Pendidikan', 33071350, '1', '10', 'uang', '-', '-', 'Mahakam Ulu', '2025', '-', 'tayang', '2025-04-01 00:00:00', '2025-04-01 00:00:00'),
(45, 41, '', '', 'uang', '', '33071350', '0000-00-00', 'Bantuan Sekolah dan Pendidikan', 33071350, '1', '10', 'uang', '-', '-', 'Mahakam Ulu', '2025', '-', 'tayang', '2025-05-01 00:00:00', '2025-05-01 00:00:00'),
(46, 41, '', '', 'uang', '', '33071350', '0000-00-00', 'Bantuan Sekolah dan Pendidikan', 33071350, '1', '10', 'uang', '-', '-', 'Mahakam Ulu', '2025', '-', 'tayang', '2025-06-01 00:00:00', '2025-06-01 00:00:00'),
(47, 47, '', '', 'uang', '', '4000000', '0000-00-00', 'Bantuan dana acara Natal Tahun 2024 Kampung Mamahak Besar Kec. Long Bagun', 4000000, '4', '11', 'uang', '-', '-', 'Kec. Long Bagun', '2025', '-', 'tayang', '2025-01-20 00:00:00', '2025-01-20 00:00:00'),
(48, 48, '', '', 'uang', '', '27000000', '0000-00-00', 'Bantuan honorium untuk operasional Guru SMA Mamahak Besar selama 3 bulan (Januari, Februari, Maret) Tahun 2025', 27000000, '1', '11', 'uang', '-', '-', 'Mamahak Besar', '2025', '-', 'tayang', '2025-02-11 00:00:00', '2025-02-11 00:00:00'),
(49, 49, '', '', 'bbm', '', '3000000', '0000-00-00', 'Bantuan BBM Solar untuk Masjid Baiturrahim Kampung Mamahak Ulu, Kec. Long Bagun, Kab. Mahulu', 3000000, '4', '11', 'bbm', '-', '-', 'Kampung Mamahak Ulu', '2025', '-', 'tayang', '2025-03-07 00:00:00', '2025-03-07 00:00:00'),
(50, 50, '', '', 'uang', '', '27000000', '0000-00-00', 'Bantuan honorium untuk operasional Guru SMA Mamahak Besar selama 3 bulan (April, Mei, Juni) Tahun 2025', 27000000, '1', '11', 'uang', '-', '-', 'Mamahak Besar', '2025', '-', 'tayang', '2025-04-29 00:00:00', '2025-04-29 00:00:00'),
(51, 51, '', '', 'hewan qurba', '', '20000000', '0000-00-00', 'Bantuan Hewan Qurban kepada Polres Mahakam Ulu (PT BBS)', 20000000, '4', '11', 'hewan qurba', '-', '-', 'Mahakam Ulu', '2025', '-', 'tayang', '2025-06-03 00:00:00', '2025-06-03 00:00:00'),
(52, 52, '', '', 'hewan qurba', '', '9000000', '0000-00-00', 'Bantuan Hewan Qurban kepada Umat Muslim di Kampung Rukun Damai (PT BBS)', 9000000, '4', '11', 'hewan qurba', '-', '-', 'Kampung Rukun Damai', '2025', '-', 'tayang', '2025-06-03 00:00:00', '2025-06-03 00:00:00'),
(53, 53, '', '', 'pengenalan lingungan sekolah', '', '1500000', '0000-00-00', 'Bantuan masa pengenalan lingkungan sekolah MPLS SMPN 2 Long Bagun', 1500000, '1', '11', 'pengenalan lingungan sekolah', '-', '-', 'Long Bagun', '2025', '-', 'tayang', '2025-06-13 00:00:00', '2025-06-13 00:00:00'),
(54, 54, '', '', 'uang', '', '22599083', '0000-00-00', 'Bantuan Sekolah dan Pendidikan', 22599083, '1', '11', 'uang', '-', '-', 'Mahakam Ulu', '2025', '-', 'tayang', '2025-01-01 00:00:00', '2025-01-01 00:00:00'),
(55, 54, '', '', 'uang', '', '22599083', '0000-00-00', 'Bantuan Sekolah dan Pendidikan', 22599083, '1', '11', 'uang', '-', '-', 'Mahakam Ulu', '2025', '-', 'tayang', '2025-02-01 00:00:00', '2025-02-01 00:00:00'),
(56, 54, '', '', 'uang', '', '22599083', '0000-00-00', 'Bantuan Sekolah dan Pendidikan', 22599083, '1', '11', 'uang', '-', '-', 'Mahakam Ulu', '2025', '-', 'tayang', '2025-03-01 00:00:00', '2025-03-01 00:00:00'),
(57, 54, '', '', 'uang', '', '22599083', '0000-00-00', 'Bantuan Sekolah dan Pendidikan', 22599083, '1', '11', 'uang', '-', '-', 'Mahakam Ulu', '2025', '-', 'tayang', '2025-04-01 00:00:00', '2025-04-01 00:00:00'),
(58, 54, '', '', 'uang', '', '22599083', '0000-00-00', 'Bantuan Sekolah dan Pendidikan', 22599083, '1', '11', 'uang', '-', '-', 'Mahakam Ulu', '2025', '-', 'tayang', '2025-06-01 00:00:00', '2025-06-01 00:00:00'),
(59, 54, '', '', 'uang', '', '22599083', '0000-00-00', 'Bantuan Sekolah dan Pendidikan', 22599083, '1', '11', 'uang', '-', '-', 'Mahakam Ulu', '2025', '-', 'tayang', '2025-06-01 00:00:00', '2025-06-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `beritas`
--

CREATE TABLE `beritas` (
  `id` int(11) NOT NULL,
  `headline` varchar(1000) NOT NULL,
  `gambar` varchar(250) NOT NULL,
  `berita` longtext NOT NULL,
  `tanggal` date NOT NULL,
  `hastag` varchar(500) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `dilihat` int(11) NOT NULL,
  `status` varchar(30) DEFAULT NULL,
  `penulis` int(11) DEFAULT NULL,
  `slug` varchar(1000) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `beritas`
--

INSERT INTO `beritas` (`id`, `headline`, `gambar`, `berita`, `tanggal`, `hastag`, `kategori`, `dilihat`, `status`, `penulis`, `slug`, `created_at`, `updated_at`) VALUES
(39, 'GUNA SINERGIKAN PERSEPSI, PEMKAB MAHULU GELAR RAKOR CSR', 'berita/adMrNmXtnywNiMWY48NBjCHyexgfDih75yRfpXUN.png', '<p>UJOH BILANG &ndash; Pemerintah Kabupaten Mahakam Ulu menggelar Rapat Koordinasi (Rakor) Penerapan Corporate Social Responsibility (CSR) bersama 8 (Delapan) perusahaan yang beroperasi di Kabupaten Mahakam Ulu. Senin (10/08).</p>\r\n<p>Rakor diselenggarakan oleh Badan Perencanaan Pembangunan, Penelitian dan Pengembangan Daerah (Bappelitbangda) Mahulu. Dihadiri oleh Wakil Bupati Mahakam Ulu Drs. Y Juan Jenau didampingi Pj. Sekretaris Daerah Dr. Stephanus Madang,S.Sos,MM, Asisten Bidang Sosial Ekonomi dan Pembangunan E. Tek Hen Yohanes,S.Pd, Kepala Organisasi Perangkat Daerah (OPD) dan perwakilan dari 8 perusahan di wilayah Mahulu.</p>\r\n<p>Bupati Mahulu Bonifasius Belawan Geh, SH yang diwakili oleh Wakil Bupati Drs. Y. Juan Jenau saat memimpin Rakor mengatakan, tujuan kegiatan sebagai wadah koordinasi dan sinergitas antar pemerintah dan perusahaan terkait pelaksanaan program CSR. Hal ini menjadi langkah awal penyelarasan antara program CSR perusahaan dengan program prioritas pemerintah kedepan.</p>\r\n<p>&ldquo;Pemerintah memiliki komitmen bersama-sama dengan perusahaan terkait, dalam membangun Mahulu perlu kerjasama dan butuh sinergitas antar program,&rdquo;kata Wabup.</p>\r\n<p>Dikatakan Wabup Drs. Y. Juan Jenau lebih lanjut, melalui rakor agar terwujudnya kesamaan persepsi, komitmen dan kepedulian perusahaan untuk berpartisipasi dalam upaya peningkatan kesejahteraan masyarakat dan pembangunan di Mahulu.</p>\r\n<p>&ldquo;Selain hubungan yang baik, kemudian akses jalan, tentu saja kedepan dengan adanya forum CSR yang telah dibentuk oleh pemerintah kita berharap juga kira-kira apa yang menjadi konstribusi atau peran langsung dari perusahaan dalam hal ini karena pemerintah masih mengalami kesulitan terutama bagian PU,&rdquo;ujar Wabup.</p>\r\n<p>Wabup Drs. Y. Juan Jenau menambahkan, dengan adanya CSR akan memberikan kontribusi terhadap pembangunan yang berkelanjutan dengan memberikan manfaat ekonomi, sosial dan lingkungan.</p>\r\n<p>&ldquo;Saya yakin bahwa ketika kita bisa mencapai kesepakatan mengenai bagaimana kita menangani jalan, tentu perusahaan juga dengan sendirinya mempunyai komintmen untuk membantu pemerintah,&rdquo;kata Wabup.</p>\r\n<p>Disampaikan oleh Subroto selaku perwakilan dari PT. Ratah Timber, kegiatan CSR yang telah dilaksanakan PT. Ratah Timber antara lain perbaikan ruas jalan Kampung Nyaribungan Kecamatan Laham dan perbaikan jalan dari Sungai Ratah sepanjang 7 kilometer, selain itu juga untuk peningkatan pemberdayaan masyarakat pihaknya mempunyai program kemitraan kehutanan.</p>\r\n<p>&ldquo;Kegiatan kami mengenai CSR mungkin kalau bapak-bapak pernah ke Nyaribungan, dulu Nyaribungan hanya bisa dilewati dari sungai dan sekarang sudah bisa di lewati dari darat dan itu kami yang membuat jalannya, dan Untuk jalan PU kami memperbaiki ruas jalan yang melewati perusahaan kami, dan jembatan yg putus pun bahan baku bikin jembatannya dari kami,&rdquo;jelasnya.</p>\r\n<p>Ia menambahkan, &ldquo;Untuk pemberdayaan masyarakat kami juga berkerjasama dengan lembaga lain, kemarin kami juga melakukan pendataan kelompok tani di sekitar datah bilang, smp skr masih dlm tahap penyususnna laporan,&rdquo;tutupnya.</p>\r\n<p>Adapun 8 perusahaan yang beroprasi di Mahulu diantaranya, PT. Ratah Timber Co, PT. Kedap Sayaaq, PT. Marsam Citra Adiperkasa, PT. Setia Agro Utama, PT. Roda Mas, PT. Rimba Sempana Makmur, PT. Permata Agro Sejahtera, PT. Nusa Sumber Rejeki.(HMS11/td)</p>\r\n<p>sumber : https://prokopim.mahakamulukab.go.id/guna-sinergikan-persepsi-pemkab-mahulu-gelar-rakor-csr/</p>', '2025-10-08', '#berita', 'berita', 40, 'publish', NULL, 'guna-sinergikan-persepsi-pemkab-mahulu-gelar-rakor-csr', '2026-05-21 20:19:14', '2026-05-21 20:19:14'),
(40, 'ITM Group Peduli, Salurkan Bantuan Paket Sembako untuk Korban Banjir Mahakam Ulu', 'berita/U3DiFsNGORmLcgkevVoJFlUvqwKr9SMTnLwyfR1i.png', '<p>&nbsp;Manajemen Indo Tambangraya Megah (ITM) Group menyalurkan bantuan untuk korban banjir di Kabupaten Mahakam Ulu (Mahulu), Kalimantan Timur, sebagai bentuk perhatian kepada sesama sekaligus untuk membantu meringankan beban mereka yang terdampak musibah.&nbsp;</p>\r\n<div class=\"jeg_ad jeg_ad_article jnews_content_inline_ads  \">\r\n<div class=\"ads-wrapper align-right \"><a class=\"adlink ads_image align-right\" href=\"http://bit.ly/jnewsio\" target=\"_blank\" rel=\"nofollow noopener\"><img class=\" lazyloaded\" src=\"https://gocsrkaltim.com/wp-content/uploads/2021/04/ad_300x250.jpg\" alt=\"\" data-od-unknown-tag=\"\" data-od-xpath=\"/HTML/BODY/DIV[@class=\'jeg_viewport\']/*[5][self::DIV]/*[1][self::DIV]/*[1][self::DIV]/*[1][self::DIV]/*[1][self::DIV]/*[1][self::DIV]/*[2][self::DIV]/*[1][self::DIV]/*[1][self::DIV]/*[6][self::DIV]/*[2][self::DIV]/*[2][self::DIV]/*[1][self::DIV]/*[1][self::A]/*[1][self::IMG]\" data-src=\"https://gocsrkaltim.com/wp-content/uploads/2021/04/ad_300x250.jpg\" data-pin-no-hover=\"true\"></a></div>\r\n</div>\r\n<p>&ldquo;Bantuan yang diberikan adalah paket sembako berisi beras, minyak goreng, sarden, telur, gula, mi instan, dan air mineral sebanyak 150 paket dengan total jumlah barang sebanyak 1.050 item. Bantuan diterima secara simbolis oleh Kepala Dinas Sosial Mahulu,&rdquo; kata perwakilan ITM Group Danang Sabto Nugroho dalam rilisnya ke Samarinda, Minggu.&nbsp;</p>\r\n<p>Manajemen yang hadir dalam menyalurkan bantuan adalah Danang Sabto Nugroho selaku Kepala Teknik Tambang Trubaindo Coal Mining (KTT TCM), Iman Mandiri selaku KTT Bharinto Ekatama (BEK), Hirung selaku Admin Mine Manager (AMM) Melak ITM Group.&nbsp;</p>\r\n<p>Kemudian Budhi Cahyono selaku HSeC Head TCM, Yudo Hariyanto selaku Finance &amp; Accounting Melak Group, Dwityo Trisno selaku HRD Head Melak Group, Agustinus selaku ER Melak Group, bersama Team CD TCM &ndash; BEK, Team Dokter dan Perawat TCM &ndash; BEK, Team Safety TCM &ndash; BEK, Team GA, dan sejumlah perwakilan CSR Forum Kontraktor TCM &ndash; BEK.&nbsp;</p>\r\n<p>Manajemen ITM Group melalui dua KTT- nya yakni Danang Sabto Nugroho dan Iman Mandiri menyampaikan, kunjungan mereka ke Mahulu selain melihat kondisi banjir, pihaknya juga menyalurkan paket bantuan sembako.&nbsp;</p>\r\n<p>Bantuan tersebut diharapkan dapat membantu para korban banjir di Mahulu, karena berdasarkan pemantauan yang pihaknya ikuti di berbagai media, banjirnya sangat parah.&nbsp;</p>\r\n<p>&ldquo;Untuk itu, kami secara coorporate tergerak berkontribusi untuk meringankan warga yang saat ini terkena dampak banjir. Kami beserta tim juga melihat apakah dibutuhkan relawan untuk pasca banjir, jika dibutuhkan maka hal tersebut akan dikomunikasikan kembali di internal kami,&rdquo; katanya.&nbsp;</p>\r\n<p>Iman Mandiri berharap bantuan yang diberikan ini dapat meringankan beban korban banjir, karena saat ini aktivitas dan roda ekonomi di Mahulu tidak bisa berjalan sebagaimana mestinya. Ia juga berharap para korban tetap menjaga kesehatan dan tetap kuat menghadapi situasi ini.&nbsp;</p>\r\n<p>&ldquo;Bantuan ini juga salah satu bentuk kepedulian ITM Group bersama anak perusahaannya di Melak Site kepada warga yang terkena musibah. Kami selalu berkomitmen dalam berkontribusi terhadap kegiatan sosial untuk mereka yang memang benar-benar membutuhkan, apalagi statusnya adalah bencana,&rdquo; kata Iman.&nbsp;</p>\r\n<p>Ia melanjutkan, pada Minggu dan Senin ini, tim dari Graha Panca Karsa (GPK), anak perusahaan ITM, bekerjasama dengan BPBD Kabupaten Kubar juga menyalurkan 150 paket di area Kecamatan Long Iram, Tering dan sekitarnya, karena di Kubar juga terdampak banjir.&nbsp;</p>\r\n<p>&ldquo;Melihat kondisi yang ada, kami turut prihatin. Semoga warga Mahulu tetap diberi kesehatan dan kekuatan menghadapi cobaan ini. Semoga keadaan Mahulu segera pulih seperti sedia kala. Aktivitas kembali normal dan ekonomi masyarakat lancar, pemerintahan di Mahulu juga kembali beraktivitas,&rdquo; katanya.</p>\r\n<p>sumber : https://gocsrkaltim.com/itm-group-peduli-salurkan-bantuan-paket-sembako-untuk-korban-banjir-mahakam-ulu/</p>', '2025-04-27', '#berita', 'berita', 43, 'publish', NULL, 'itm-group-peduli-salurkan-bantuan-paket-sembako-untuk-korban-banjir-mahakam-ulu', '2026-05-19 14:03:41', '2026-05-19 14:03:41'),
(41, 'Jalankan Program CSR Bidang Pendidikan, KEN Berikan Pelatihan Bahasa Inggris di Mahakam Ulu', 'berita/ONRJRvTZFJew8h40NUdnRuyveHMTDvHW4IdMwsST.png', '<p>SKK Migas &ndash; Kalisat Energi Nusantara (KEN) bekerjasama dengan Sele Energi melaksanakan program Pembelajaran bahasa Inggris untuk siswa SD dan SMP, Kamis (7/3/2024).</p>\r\n<div class=\"jeg_ad jeg_ad_article jnews_content_inline_ads  \">\r\n<div class=\"ads-wrapper align-right \"><a class=\"adlink ads_image align-right\" href=\"http://bit.ly/jnewsio\" target=\"_blank\" rel=\"nofollow noopener\"><img class=\" lazyloaded\" src=\"https://gocsrkaltim.com/wp-content/uploads/2021/04/ad_300x250.jpg\" alt=\"\" data-od-xpath=\"/HTML/BODY/DIV[@class=\'jeg_viewport\']/*[5][self::DIV]/*[1][self::DIV]/*[1][self::DIV]/*[1][self::DIV]/*[1][self::DIV]/*[1][self::DIV]/*[2][self::DIV]/*[1][self::DIV]/*[1][self::DIV]/*[6][self::DIV]/*[2][self::DIV]/*[2][self::DIV]/*[1][self::DIV]/*[1][self::A]/*[1][self::IMG]\" data-src=\"https://gocsrkaltim.com/wp-content/uploads/2021/04/ad_300x250.jpg\" data-pin-no-hover=\"true\"></a></div>\r\n</div>\r\n<p>Seremoni Program Pembelajaran Bahasa Inggris ini diadakan di Aula SDN 007&nbsp;Mamahak&nbsp;Besar, Kabupaten&nbsp;Mahakam&nbsp;Ulu, Kalimantan Timur.&nbsp;</p>\r\n<p>Kegiatan ini dihadiri oleh siswa peserta Pembelajaran Bahasa Inggris, Petinggi Kampung&nbsp;Mamahak&nbsp;Besar&nbsp;dan Mamahak Ulu (diwakili BPK), Kepala Sekolah SDN 007&nbsp;Mamahak&nbsp;Besar&nbsp;dan perwakilan SMPN 002 Long Bagun serta pihak SKK Migas bersama Sele Energi dan KEN.</p>\r\n<p>Peresmian ini juga sekaligus penyerahan tenaga pengajar yang akan mengajar disana selama 2 bulan lamanya.</p>\r\n<p>Penyaluran kegiatan&nbsp;<em>Corporate Social Responsibility</em>&nbsp;(CSR) ini sebagai bentuk kepedulian SKK Migas bersama KKKS kepada warga sekitar wilayah operasi khususnya dalam kemajuan dunia pendidikan.</p>\r\n<p>Program pembelajaran Bahasa Inggris secara intensif ini diikuti oleh total 25 siswa, yang terdiri dari 12 siswa SDN 007&nbsp;Mamahak&nbsp;Besar&nbsp;dan 13 siswa SMPN 002 Long Bagun.</p>\r\n<p>Humas Sele Energi, Dani menyampaikan apresiasinya karena KEN tidak hanya melakukan eksplorasi migas di tempat ini tapi juga membimbing siswa dalam belajar bahasa Inggris.</p>\r\n<p>&ldquo;Karena bisa hadir tidak hanya melakukan kegiatan eksplorasi migas saja, melainkan juga turut berkontribusi dalam meningkatkan kemampuan anak-anak kita dalam belajar berbahasa Inggris,&rdquo; sebutnya.</p>\r\n<p>Petinggi Kampung Mambes, Alfon Hal menyambut positif atas program CSR Pendidikan yang diberikan.</p>\r\n<p>&ldquo;Pendidikan merupakan modal dasar dalam pengembangan sumber daya manusia. Inisasi yang dilakukan oleh perusahaan merupakan suatu bentuk kepedulian perusahaan kepada masyarakat,&rdquo; jelasnya.</p>\r\n<p>Ia pun menambahkan dengan hadirnya perusahaan migas diwilayahnya, harapannya dapat meningkatkan perekonomian dan kesejahteraan masyarakat setempat.</p>\r\n<p>&ldquo;Kami akan dukung kegiatan pengeboran yang akan dilakukan dan berharap bisa berhasil sehingga dapat membawa multiflier positif bagi warga sekitar,&rdquo; tuturnya.</p>\r\n<p>sumber : https://gocsrkaltim.com/jalankan-program-csr-bidang-pendidikan-ken-berikan-pelatihan-bahasa-inggris-di-mahakam-ulu/</p>', '2025-03-26', '#berita', 'berita', 42, 'publish', NULL, 'jalankan-program-csr-bidang-pendidikan-ken-berikan-pelatihan-bahasa-inggris-di-mahakam-ulu', '2026-05-19 19:40:49', '2026-05-19 19:40:49'),
(42, 'CSR: Tanggung Jawab Sosial Perusahaan untuk Pembangunan Berkelanjutan', 'berita/yd9Ai07V4OzgNOhR5BiiSpxC2vQSWGJEwr3XLqdr.png', '<p data-start=\"116\" data-end=\"494\"><strong data-start=\"116\" data-end=\"157\">Corporate Social Responsibility (CSR)</strong> merupakan komitmen perusahaan untuk mengambil peran aktif dalam pembangunan sosial, ekonomi, dan lingkungan di wilayah operasionalnya. Lebih dari sekadar kewajiban moral, CSR telah menjadi bagian penting dari strategi keberlanjutan perusahaan dalam membangun hubungan yang harmonis dengan masyarakat dan menjaga keseimbangan lingkungan.</p>\r\n<p data-start=\"496\" data-end=\"909\">Dalam praktiknya, CSR diwujudkan melalui berbagai program yang menyentuh langsung kebutuhan masyarakat, mulai dari peningkatan kualitas pendidikan, layanan kesehatan, pengembangan ekonomi lokal, hingga pelestarian lingkungan. Melalui pendekatan ini, perusahaan diharapkan mampu menciptakan dampak positif yang berkelanjutan, tidak hanya bagi masyarakat sekitar, tetapi juga bagi keberlangsungan usaha itu sendiri.</p>\r\n<p data-start=\"911\" data-end=\"1326\">Pelaksanaan CSR mencerminkan perubahan paradigma dunia usaha yang tidak lagi semata-mata berorientasi pada keuntungan finansial. Perusahaan kini dituntut untuk memperhatikan kesejahteraan masyarakat (<em data-start=\"1111\" data-end=\"1119\">people</em>) dan kelestarian lingkungan (<em data-start=\"1149\" data-end=\"1157\">planet</em>), seiring dengan pencapaian keuntungan (<em data-start=\"1198\" data-end=\"1206\">profit</em>). Prinsip ini dikenal luas sebagai konsep <strong data-start=\"1249\" data-end=\"1271\">Triple Bottom Line</strong>, yang menjadi landasan utama dalam praktik CSR modern.</p>\r\n<p data-start=\"1328\" data-end=\"1668\">Di Indonesia, CSR memiliki peran strategis dalam mendukung pembangunan daerah, khususnya di wilayah dengan aktivitas industri dan sumber daya alam. Program CSR yang dirancang secara tepat sasaran dan berkelanjutan mampu menjadi katalisator peningkatan kualitas hidup masyarakat, sekaligus memperkuat kepercayaan publik terhadap dunia usaha.</p>\r\n<p data-start=\"1670\" data-end=\"1865\">Dengan demikian, CSR tidak hanya berfungsi sebagai bentuk kepedulian sosial, tetapi juga sebagai investasi jangka panjang perusahaan dalam menciptakan pertumbuhan yang inklusif dan berkelanjutan.</p>', '2025-05-20', '#enslikopedia', 'enslikopedia', 46, 'publish', NULL, 'csr-tanggung-jawab-sosial-perusahaan-untuk-pembangunan-berkelanjutan', '2026-05-23 00:13:56', '2026-05-23 00:13:56');

-- --------------------------------------------------------

--
-- Table structure for table `bidangcsr`
--

CREATE TABLE `bidangcsr` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `logo` text DEFAULT NULL,
  `urut` varchar(255) DEFAULT NULL,
  `deskripsi` varchar(300) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bidangcsr`
--

INSERT INTO `bidangcsr` (`id`, `nama`, `logo`, `urut`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'Pendidikan', 'school', NULL, 'Meliputi bantuan pendidikan, fasilitas penunjang pendidikan untuk meningkatkan kecerdasan masyarakat.', '2024-05-07 20:51:45', '2024-05-07 20:51:45'),
(2, 'Kesehatan', 'health_cross', NULL, 'Meliputi bantuan pelayanaan kesehatan, fasilitas penunjang kesehatan untuk meningkatkan kesehatan masyarakat.', NULL, NULL),
(3, 'Lingkungan Hidup', 'eco', NULL, 'Meliputi produksi bersih, kantor ramah lingkungan, konservasi energi dan sumber daya alam, pengelolaan sampah, energi terbarukan, adaptasi perubahan iklim dan pendidikan lingkungan hidup.', NULL, NULL),
(4, 'Keagamaan', 'synagogue', NULL, 'Meliputi rehabilitasi sosial, jaminan sosial, pemberdayaan sosial, dan perlindungan sosial bagi penyandang masalah kesejahteraan sosial. ', NULL, NULL),
(5, 'Pertanian Dalam Arti Luas', 'wheat', NULL, 'Meliputi bantuan pelayanan dan/atau fasilitasi untuk menunjang peningkatan kualitas hidup menuju kedaulatan dan kemandirian pangan.', NULL, NULL),
(6, 'Usaha Ekonomi Kerakyatan', 'account_balance_wallet', NULL, 'Merupakan upaya penyelenggaraan ekonomi yang memberikan dampak kepada kesejahteraan rakyat kecil dan kemajuan ekonomi rakyat, untuk mewujudkan kedaulatan rakyat dalam bidang ekonomi. ', NULL, NULL),
(7, 'Infrastruktur Dasar', 'cool_to_dry', NULL, 'Meliputi bantuan sarana dan prasarana fisik.', NULL, NULL),
(8, 'Pemuda, Olahraga, Seni, Budaya, Pariwisata', 'directions_bike', NULL, 'Meliputi bantuan pelayanaan dan atau fasilitas kepada masyarakat untuk menunjang peningkatan kegiatan olah raga, seni, budaya dan pariwisata.', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dasarhukum`
--

CREATE TABLE `dasarhukum` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dasarhukum`
--

INSERT INTO `dasarhukum` (`id`, `nama`, `file`, `link`, `created_at`, `updated_at`) VALUES
(1, 'Undang-Undang Nomor 40 Tahun 2007 tentang Perseroan Terbatas (UUPT)', 'UU-40-2007 PERSEROAN TERBATAS.pdf', '', NULL, NULL),
(3, 'Peraturan Pemerintah Nomor 47 Tahun 2012 tentang Tanggung Jawab Sosial dan Lingkungan Perseroan Terbatas', 'Peraturan Pemerintah Nomor 47 Tahun 2012 tentang Tanggung Jawab Sosial dan Lingkungan Perseroan Terbatas.PDF', '', NULL, NULL),
(4, 'Undang-Undang Nomor 25 Tahun 2007 tentang Penanaman Modal', 'UU Nomor 25 Tahun 2007.pdf', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `informasi`
--

CREATE TABLE `informasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `informasi`
--

INSERT INTO `informasi` (`id`, `nama`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'tentang', 'Sistem Pelaporan Online CSR adalah sistem pelaporan berbasis online sistem yang akan digunakan oleh Perusahaan, BUMN dan BUMD untuk melaporkan pelaksanaan kegiatan Corporate Social Responsibility (CSR) yang telah dilaksanakan dan pelaporan rencana kegiatan CSR kedepan.', NULL, '2024-05-11 02:54:21');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kecamatan` varchar(255) DEFAULT NULL,
  `desa` varchar(255) DEFAULT NULL,
  `target` text DEFAULT NULL,
  `realisasi_fisik` text DEFAULT NULL,
  `realisasi_uang` text DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `nominalpagu` bigint(20) DEFAULT NULL,
  `idbidang` varchar(255) DEFAULT NULL,
  `idperusahaan` varchar(255) DEFAULT NULL,
  `output` varchar(255) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `lampiran` varchar(255) DEFAULT NULL,
  `lokasi` varchar(255) DEFAULT NULL,
  `tahun` varchar(255) DEFAULT NULL,
  `catatan` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `kecamatan`, `desa`, `target`, `realisasi_fisik`, `realisasi_uang`, `tanggal`, `nama`, `nominalpagu`, `idbidang`, `idperusahaan`, `output`, `deskripsi`, `lampiran`, `lokasi`, `tahun`, `catatan`, `status`, `created_at`, `updated_at`) VALUES
(21, 'Long Bagun', '', 'uang', '', '4000000', '0000-00-00', 'Bantuan dana acara Natal Tahun 2024 Kampung Mamahak Besar Kec. Long Bagun', 4000000, '4', '9', 'uang', '-', '-', 'Kec. Long Bagun', '2025', '-', 'tayang', '2025-01-20 00:00:00', '2025-01-20 00:00:00'),
(22, 'Long Bagun', 'Long Hurai', 'uang', '', '1500000', '0000-00-00', 'Bantuan Dana Acara Paskah Kampung Long Hurai', 1500000, '4', '9', 'uang', '-', '-', 'Kampung Long Hurai', '2025', '-', 'tayang', '2025-05-02 00:00:00', '2025-05-02 00:00:00'),
(23, 'Long Hubung', '', 'uang', '', '1500000', '0000-00-00', 'Bantuan dana acara Paskah Gereja Paroki Santa Maria Long Hubung', 1500000, '4', '9', 'uang', '-', '-', 'Long Hubung', '2025', '-', 'tayang', '2025-05-02 00:00:00', '2025-05-02 00:00:00'),
(24, '', '', 'uang', '', '88679196', '0000-00-00', 'Bantuan Sekolah dan Pendidikan', 88679196, '1', '9', 'uang', '-', '-', 'Mahakam Ulu', '2025', '-', 'tayang', '2025-01-01 00:00:00', '2025-01-01 00:00:00'),
(30, 'Long Bagun', 'Mamahak Besar', 'uang', '', '4000000', '0000-00-00', 'Bantuan dana acara Natal Tahun 2024 Kampung Mamahak Besar Kec. Long Bagun', 4000000, '4', '10', 'uang', '-', '-', 'Kampung Mamahak Besar Kec. Long Bagun', '2025', '-', 'tayang', '2025-01-20 00:00:00', '2025-01-20 00:00:00'),
(31, '', '', 'uang', '', '7000000', '0000-00-00', 'Biaya perayaan Natal Sempekat Tonyooi Benuaq (STB) sesuai dengan hasil rapat dengan Bupati Kubar tanggal 8 Januari 2025', 7000000, '4', '10', 'uang', '-', '-', 'Tonyooi Benuaq', '2025', '-', 'tayang', '2025-01-20 00:00:00', '2025-01-20 00:00:00'),
(32, 'Tering', '', 'uang', '', '1000000', '0000-00-00', 'Bantuan Dana Perayaan Paskah Tahun 2025 Gereja Katolik Paroki Keluarga Suci Tering Kec. Tering', 1000000, '4', '10', 'uang', '-', '-', 'Kec. Tering', '2025', '-', 'tayang', '2025-03-17 00:00:00', '2025-03-17 00:00:00'),
(33, 'Long Iram', 'Suko Mulyo', 'uang', '', '2000000', '0000-00-00', 'Bantuan Dana Perbaikan Jalan Poros PU Kamp. Suko Mulyo Kec. Long Iram', 2000000, '2', '10', 'uang', '-', '-', 'Kec. Long Iram', '2025', '-', 'tayang', '2025-03-17 00:00:00', '2025-03-17 00:00:00'),
(34, '', '', 'uang', '', '1000000', '0000-00-00', 'Bantuan Dana Acara Paskah Gereja ST. Mikael', 1000000, '4', '10', 'uang', '-', '-', '-', '2025', '-', 'tayang', '2025-04-15 00:00:00', '2025-04-15 00:00:00'),
(35, '', 'Tukul', 'uang', '', '1000000', '0000-00-00', 'Bantuan Dana Acara Paskah Jemaat GKE \"SION\" Tukul (Resort GKE Mahakam) Kamp. Tukul', 1000000, '4', '10', 'uang', '-', '-', 'Kamp. Tukul', '2025', '-', 'tayang', '2025-04-15 00:00:00', '2025-04-15 00:00:00'),
(36, '', 'Tukul ', 'meteran', '', '48000000', '0000-00-00', 'Bantuan Pemasangan Kwh Listrik PLN Kampung Tukul MCA3, 12 KWH (Meteran)', 48000000, '2', '10', 'meteran', '-', '-', 'Kamp. Tukul', '2025', '-', 'tayang', '2025-04-30 00:00:00', '2025-04-30 00:00:00'),
(37, '', '', 'uang', '', '15000000', '0000-00-00', 'Bantuan Biaya Partisipasi Kegiatan Pekan Daerah XI Petani Nelayan Provinsi Kalimantan Timur yang dilaksanakan di Kutai Barat hasil rapat dengan Bupati Kutai Barat tanggal 09 Mei 2025', 15000000, '7', '10', 'uang', '-', '-', 'Mahakam Ulu', '2025', '-', 'tayang', '2025-05-22 00:00:00', '2025-05-22 00:00:00'),
(38, 'Laham', 'Long Gelawang', 'sapi', '', '25000000', '0000-00-00', 'Sapi Kurban Idul Adha 1446 H di Kamp. Long Gelawang PT MCA 1', 25000000, '4', '10', 'sapi', '-', '-', 'Kamp. Long Gelawang', '2025', '-', 'tayang', '2025-06-03 00:00:00', '2025-06-03 00:00:00'),
(39, 'Long Bagun', 'Mamahak Ulu', 'sapi', '', '25000000', '0000-00-00', 'Sapi Kurban Idul Adha 1446 H di Kamp. Mamahak Ulu PT MCA 1', 25000000, '4', '10', 'sapi', '-', '-', 'Kamp. Mamahak Ulu', '2025', '-', 'tayang', '2025-06-03 00:00:00', '2025-06-03 00:00:00'),
(40, '', '', 'Pemeriksaan Kesehatan', '', '39592961', '0000-00-00', 'Baksos Sunatan Massal dan Pemeriksaan Kesehatan Gratis FAPA Kaltim', 39592961, '2', '10', 'Pemeriksaan Kesehatan', '-', '-', 'Mahakam Ulu', '2025', '-', 'tayang', '2025-06-30 00:00:00', '2025-06-30 00:00:00'),
(41, '', '', 'uang', '', '198428098', '0000-00-00', 'Bantuan Sekolah dan Pendidikan', 198428098, '1', '10', 'uang', '-', '-', 'Mahakam Ulu', '2025', '-', 'tayang', '2025-01-01 00:00:00', '2025-01-01 00:00:00'),
(47, 'Long Bagun', 'Mamahak Besar', 'uang', '', '4000000', '0000-00-00', 'Bantuan dana acara Natal Tahun 2024 Kampung Mamahak Besar Kec. Long Bagun', 4000000, '4', '11', 'uang', '-', '-', 'Kec. Long Bagun', '2025', '-', 'tayang', '2025-01-20 00:00:00', '2025-01-20 00:00:00'),
(48, 'Long Bagun', 'Mamahak Besar', 'uang', '', '27000000', '0000-00-00', 'Bantuan honorium untuk operasional Guru SMA Mamahak Besar selama 3 bulan (Januari, Februari, Maret) Tahun 2025', 27000000, '1', '11', 'uang', '-', '-', 'Mamahak Besar', '2025', '-', 'tayang', '2025-02-11 00:00:00', '2025-02-11 00:00:00'),
(49, 'Long Bagun', 'Kampung Mamahak', 'bbm', '', '3000000', '0000-00-00', 'Bantuan BBM Solar untuk Masjid Baiturrahim Kampung Mamahak Ulu, Kec. Long Bagun, Kab. Mahulu', 3000000, '4', '11', 'bbm', '-', '-', 'Kampung Mamahak Ulu', '2025', '-', 'tayang', '2025-03-07 00:00:00', '2025-03-07 00:00:00'),
(50, 'Long Bagun', 'Mamahak Besar', 'uang', '', '27000000', '0000-00-00', 'Bantuan honorium untuk operasional Guru SMA Mamahak Besar selama 3 bulan (April, Mei, Juni) Tahun 2025', 27000000, '1', '11', 'uang', '-', '-', 'Mamahak Besar', '2025', '-', 'tayang', '2025-04-29 00:00:00', '2025-04-29 00:00:00'),
(51, '', '', 'hewan qurba', '', '20000000', '0000-00-00', 'Bantuan Hewan Qurban kepada Polres Mahakam Ulu (PT BBS)', 20000000, '4', '11', 'hewan qurba', '-', '-', 'Mahakam Ulu', '2025', '-', 'tayang', '2025-06-03 00:00:00', '2025-06-03 00:00:00'),
(52, 'Long Bagun', 'Rukun Damai', 'hewan qurba', '', '9000000', '0000-00-00', 'Bantuan Hewan Qurban kepada Umat Muslim di Kampung Rukun Damai (PT BBS)', 9000000, '4', '11', 'hewan qurba', '-', '-', 'Kampung Rukun Damai', '2025', '-', 'tayang', '2025-06-03 00:00:00', '2025-06-03 00:00:00'),
(53, 'Long Bagun', '', 'pengenalan lingungan sekolah', '', '1500000', '0000-00-00', 'Bantuan masa pengenalan lingkungan sekolah MPLS SMPN 2 Long Bagun', 1500000, '1', '11', 'pengenalan lingungan sekolah', '-', '-', 'Long Bagun', '2025', '-', 'tayang', '2025-06-13 00:00:00', '2025-06-13 00:00:00'),
(54, '', '', 'uang', '', '135594498', '0000-00-00', 'Bantuan Sekolah dan Pendidikan', 135594498, '1', '11', 'uang', '-', '-', 'Mahakam Ulu', '2025', '-', 'tayang', '2025-01-01 00:00:00', '2025-01-01 00:00:00'),
(60, NULL, NULL, NULL, NULL, '60045000', NULL, 'Bantuan Paket Sembako untuk Korban Banjir Mahakam Ulu', 60045000, '1', '12', '150 paket bantuan', '-', '', 'Long Bagun', '2025', '-', 'tayang', '2026-02-21 14:34:38', '2026-02-21 14:34:38'),
(61, NULL, NULL, NULL, NULL, '28750000', NULL, 'program Pembelajaran bahasa Inggris untuk siswa SD dan SMP\r\n', 28750000, '1', '13', '', '-', '', 'Long Bagun', '2025', '-', 'tayang', '2026-02-21 14:34:38', '2026-02-21 14:34:38');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_05_08_022501_perusahaan', 2),
(7, '2024_05_08_023005_bidangcsr', 2),
(8, '2024_05_08_023216_kegiatan', 2),
(9, '2024_05_08_032216_create_kegiatans_table', 3),
(10, '2024_05_09_172929_slider', 4),
(11, '2024_05_09_173106_informasi', 4),
(12, '2024_05_09_173423_dasar_hukum', 5),
(13, '2024_05_15_125541_periset', 6),
(14, '2024_05_15_130043_lembaga_riset', 6),
(15, '2024_05_15_130524_usulan_kebutuhan_riset_&_inovasi', 6),
(16, '2024_05_15_130808_inovasi', 6),
(17, '2024_05_15_131050_pengajuan_pelayanan_ki', 6),
(18, '2024_05_15_131501_kolaborasi_riset', 6),
(19, '2024_05_15_131732_riset', 6),
(20, '2024_05_15_132123_request_full_paper', 6),
(21, '2024_05_15_133342_tim_peneliti', 6),
(22, '2024_05_15_134945_jurnal', 6),
(23, '2024_05_15_135231_sentra_ki', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `direktur` varchar(255) DEFAULT NULL,
  `kecamatan` varchar(255) DEFAULT NULL,
  `kelurahan` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `kodepos` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `nomorhp` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`id`, `nama`, `direktur`, `kecamatan`, `kelurahan`, `alamat`, `kodepos`, `website`, `nomorhp`, `status`, `email`, `password`, `created_at`, `updated_at`) VALUES
(9, 'PT. SETIA AGRO UTAMA', '', '', '', '', '', NULL, '', '', '', '', NULL, NULL),
(10, 'PT.MARSAM CITRA ADIPERKASA', '', '', '', '', '', NULL, '', '', '', '', NULL, NULL),
(11, 'PT. BORNEO BHAKTI SEJAHTERA', '', '', '', '', '', NULL, '', '', '', '', NULL, NULL),
(12, 'Indo Tambangraya Megah Group', '-', '-', '-', '-', '-', '-', '-', 'diterima', '-', '$2y$12$VcG/a9rI9njJc7RkKYjJeu4OPtjw2L0ALFWnEIscxb1PXvr5RDP/S', '2026-02-21 14:30:40', '2026-02-21 14:30:40'),
(13, 'Kalisat Energi Nusantara', '-', '-', '-', '-', '-', '-', '-', 'diterima', '--', '$2y$12$9UFgqQMyUlm3t0hUFNFEu.kxJWjnZ1DEdVSctuGVwp0RiMsWnEbQq', '2026-02-21 14:30:52', '2026-02-21 14:30:52'),
(82, 'PT. Setia Argo Abadi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(83, 'PT. Citra Palma Pertiwi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(84, 'PT. Kemakmuran Berkat Timber', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(85, 'PT. Sumalindo Lestari Jaya II', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(86, 'PT. Sumalindo Lestari Jaya V', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(87, 'PT. Ratah Timber Company', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(88, 'PT. Permata Agro Sejahtera', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(89, 'PT. Permata Bumi Sejahtera', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(90, 'PT. Putra Utama Lestari', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(91, 'PT. Dewata Wanatama Lestari', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(92, 'PT. Mahulu Jaya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(93, 'PT. Bumi Bagun Damai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(94, 'PT. Seroja Universum Narwastu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(95, 'PT. Kedap Sayaaq', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(96, 'PT. Keham Agro Sejahtera', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(97, 'PT. Kaltim Bumi Palma', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(98, 'PT. Wangsa Karya Lestari', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(99, 'PT. Tukung', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(100, 'PT. Daya Maju Lestari', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(101, 'PT. Bukit Indah Berkah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(102, 'PT. Ratah Coal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(103, 'PT. Nusantara Graha Utama 5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(104, 'PT. Karya Wijaya Sukses', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(105, 'PT. Fangiano Agro Plantation A', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(106, 'PT. Mahakam Hidro Energi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(107, 'PT. Malawa Putra Utama', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(108, 'PT. Pari Coal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(109, 'PT. Jaya Timber', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(110, 'PT. Duta Mega Perkasa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(111, 'PT. Borneo Damai Lestari', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(112, 'PT. Mahakam Listrik Tenaga Air', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(113, 'PT. Abang Modal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(114, 'PT. Rekayasa Semesta Utama', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(115, 'PT. Multi Aroma Sejati', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

UPDATE `perusahaan`
SET `email` = CONCAT(
  COALESCE(
    NULLIF(
      REGEXP_REPLACE(
        REGEXP_REPLACE(LOWER(`nama`), '^(pt|cv)[[:space:][:punct:]]*', ''),
        '[^a-z0-9]+',
        ''
      ),
      ''
    ),
    'perusahaan'
  ),
  '@gmail.com'
)
WHERE `email` IS NULL OR `email` = '' OR `email` = '-';

UPDATE `perusahaan`
SET `password` = '$2y$12$phlkqyY08CnH9OueJsoYNevLQOaGm/sR8RXInewX/IBfD3CoQRdji';

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `keterangan` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id`, `url`, `judul`, `keterangan`) VALUES
(1, 'ucapan', 'ucapan', 'ucapan.png');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slider` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `slider`, `link`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'banner1.PNG', '', '', NULL, NULL),
(2, 'banner2.PNG', '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('superadmin','perusahaan') NOT NULL DEFAULT 'perusahaan',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'superadmin@csrmahulu.com', NULL, '$2y$12$ZYg86GSpvBr1IK8wYNehL.n4bC6SVA3C6CMjKsWHVqt7vT/sNP52S', 'superadmin', NULL, '2024-05-07 12:32:00', '2024-05-11 06:32:18'),
(3, 'PT. XYZ Bersaudara', 'xyzbersaudara@csrmahulu.com', NULL, 'password', 'perusahaan', NULL, '2024-05-09 04:02:31', '2024-05-09 04:02:31'),
(4, 'AK Kreatif', 'akkreatif@csrmahulu.com', NULL, 'password', 'perusahaan', NULL, '2024-05-09 10:03:30', '2024-05-09 10:03:30'),
(5, 'adminxps', 'budaklzcrew@gmail.com', NULL, '$2y$12$59Faor/TANI3oIdcbC1nSuxIzH8BQ0KEU7Sdyj.918JzV60IcR1YO', 'perusahaan', NULL, '2026-01-11 07:47:48', '2026-01-11 07:47:48');

INSERT INTO `users` (`name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`)
SELECT `nama`, `email`, NULL, `password`, 'perusahaan', NULL, `created_at`, `updated_at`
FROM `perusahaan`
WHERE `email` IS NOT NULL AND `email` <> ''
ON DUPLICATE KEY UPDATE
  `name` = VALUES(`name`),
  `password` = VALUES(`password`),
  `role` = VALUES(`role`),
  `updated_at` = VALUES(`updated_at`);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aksi`
--
ALTER TABLE `aksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `beritas`
--
ALTER TABLE `beritas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bidangcsr`
--
ALTER TABLE `bidangcsr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dasarhukum`
--
ALTER TABLE `dasarhukum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `informasi`
--
ALTER TABLE `informasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aksi`
--
ALTER TABLE `aksi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `beritas`
--
ALTER TABLE `beritas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `bidangcsr`
--
ALTER TABLE `bidangcsr`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `dasarhukum`
--
ALTER TABLE `dasarhukum`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `informasi`
--
ALTER TABLE `informasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
