-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 13, 2025 at 04:31 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simanja`
--

-- --------------------------------------------------------

--
-- Table structure for table `aspek_kinerjas`
--

CREATE TABLE `aspek_kinerjas` (
  `id` bigint UNSIGNED NOT NULL,
  `aspek_kinerja` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bobot` int NOT NULL,
  `cukup` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `baik` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sangat_baik` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aspek_kinerjas`
--

INSERT INTO `aspek_kinerjas` (`id`, `aspek_kinerja`, `bobot`, `cukup`, `baik`, `sangat_baik`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Kualitas dan Kuantitas', 30, '>50 % hasil pekerjaan memerlukan perbaikan / penggantian agar sesuai dengan ketentuan dalam kontrak', '<50 % hasil pekerjaan memerlukan perbaikan / penggantian agar sesuai dengan ketentuan dalam kontrak', '100 % hasil pekerjaan sesuai dengan ketentuan dalam kontrak', NULL, '2025-01-09 02:36:46', '2025-01-09 02:36:46'),
(2, 'Biaya', 20, 'Tidak menginformasikan sejak awal kondisi atau kejadian yang berpotensi menambah biaya, dan mengajukan perubahan kontrak yang akan berdampak pada penambahan total biaya tanpa alasan yang memadai sehingga ditolak oleh PPK.', 'Melakukan salah satu kondisi pada kriteria cukup', 'Telah melakukan pengendalian biaya dengan baik dengan menginformasikan sejak awal atas kondisi yang berpotensi menambah biaya dan perubahan kontrak yang di ajukan sudah didasari dengan alasan yang dapat di pertanggungjawabkan, sehingga penambahan biaya dapat diantisipasi.', NULL, '2025-01-09 02:36:46', '2025-01-09 02:36:46'),
(3, 'Waktu', 30, 'Penyelesaian pekerjaan terlambat melebihi 50 hari kalender dari waktu yang ditetapkan dalam kontrak karena kesalahan Penyedia', 'Penyelesaian pekerjaan terlambat sampai dengan 50 hari kalender dari waktu yang ditetapkan dalam kontrak karena kesalahan Penyedia', 'Penyelesaian pekerjaan sesuai dengan waktu yang ditetapkan dalam kontrak / lebih cepat sesuai dengan kebutuhan PPK', NULL, '2025-01-09 02:36:46', '2025-01-09 02:36:46'),
(4, 'Layanan', 20, 'Penyedia lambat memberikan tanggapan positif atas permintaan PPK dan sulit diajak berdiskusi dalam penyelesaian pelaksanaan pekerjaan.', 'Merespon permintaan dengan penyelesaian sesuai dengan yang diminta atau Penyedia mudah dihubungi dan berdiskusi dalam penyelesian pelaksanan pekerjaan', 'Merespon permintaan dengan penyelesaian sesuai dengan yang diminta, dan penyedia mudah dihubungi serta berdiskusi dalam penyelesaian pelaksanaan pekerjaan.', NULL, '2025-01-09 02:36:46', '2025-01-09 02:36:46');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('356a192b7913b04c54574d18c28d46e6395428ab', 'i:1;', 1736419334),
('356a192b7913b04c54574d18c28d46e6395428ab:timer', 'i:1736419334;', 1736419334),
('pengenteri1|127.0.0.1', 'i:1;', 1736419763),
('pengenteri1|127.0.0.1:timer', 'i:1736419763;', 1736419763);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `log_nilais`
--

CREATE TABLE `log_nilais` (
  `id` bigint UNSIGNED NOT NULL,
  `transaksi_id` bigint UNSIGNED NOT NULL,
  `aspek_kinerja_id` bigint UNSIGNED NOT NULL,
  `nilai_kinerja` int NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(21, '0001_01_01_000000_create_users_table', 1),
(22, '0001_01_01_000001_create_cache_table', 1),
(23, '0001_01_01_000002_create_jobs_table', 1),
(24, '2024_11_13_065828_create_penyedias_table', 1),
(25, '2024_11_14_031303_create_produks_table', 1),
(26, '2024_11_15_011050_create_produk_penyedias_table', 1),
(27, '2024_11_18_022457_create_transaksis_table', 1),
(28, '2024_11_18_022938_create_produk_transaksis_table', 1),
(29, '2024_12_04_074644_create_aspek_kinerjas_table', 1),
(30, '2024_12_05_053329_create_log_nilais_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penyedias`
--

CREATE TABLE `penyedias` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun_berdiri` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nohp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_usaha` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_identitas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pengurus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_akta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `notaris` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_tgl` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `masa_berlaku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instansi_pemberi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `npwp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_narahubung` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nohp_narahubung` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jabatan_narahubung` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penyedias`
--

INSERT INTO `penyedias` (`id`, `nama`, `status`, `alamat`, `tahun_berdiri`, `nohp`, `email`, `jenis_usaha`, `no_identitas`, `pengurus`, `jabatan`, `no_akta`, `tanggal`, `notaris`, `no_tgl`, `masa_berlaku`, `instansi_pemberi`, `npwp`, `nama_narahubung`, `nohp_narahubung`, `jabatan_narahubung`, `created_at`, `updated_at`) VALUES
(1, 'CV. Graphic Dwipa', 'pusat', 'Jl. Abdul Muiz No.21 C Padang', '2004', '812666414041', 'Graphic.dwipa69@gmail.com', 'jasa percetakan', '1371110508690000', 'Yunda Abdi', 'Direktur', '1', NULL, 'Yusmarni, SH', '0213-0385/03.07/PK/SIUP/II/2016-PROB', '19/02/2016 -19/02/2021', 'DPMPTSP Kota Padang', '02.631.103.1-201.000', NULL, NULL, NULL, '2025-01-09 02:37:12', '2025-01-09 02:41:16'),
(2, 'Hotel Pangeran Beach', 'pusat', 'Jl. Ir. H Juanda No 79 Padang, 25155', NULL, '7517051333', 'reservation@beach.hotelpangeran.com', 'jasa perhotelan', NULL, 'soedjoko', 'general manager', NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(3, 'Rocky Plaza Hotel Padang', 'pusat', 'Jl. Permindo No.40 Kampung Baru, Padang', '2001', '751840888', 'reservation@rockyplazahotelpadang.com', 'jasa perhotelan', NULL, 'Buyung Arani', 'general manager', '31', NULL, 'H. Hendri Final, SH', '03.07.55.02374', '11 oktober 2020', 'BPMP2T kota Padang', '01.200.406.5-201.000', NULL, NULL, NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(4, 'Grand Inna Padang', 'pusat', 'Jl. Gereja No. 34 Padang', NULL, '75135600', 'sm@grandinnamura.com', 'jasa perhotelan', '1371102702670000', 'Masri Tanjung', 'general Manager', '28', NULL, 'Titiek Irawati, SH', '2576-1601/IG-NI/BPMPTSP/XI/2015-PROB', '5 TAHUN', 'Pemko Padang', '01.001.617.8.201.001', NULL, NULL, NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(5, 'PT Anggia Lestari Logistik', 'pusat', 'Jl. Kis Mangunsarkoro No.54 Padang', NULL, '811662237', 'andreasboga54@gmail.com', 'jasa pengiriman', '1371110212750000', 'Boby Andreas', 'Pemilik', '1', NULL, 'Yolheri Alioes, SH', '0030/IUA/DPMPTSP/IV/2018', '23 Mei 2023', 'DPMPTSP Kota Padang', '83.410.959.7-205.000', NULL, NULL, NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(6, 'Kyriad Bumiminang Hotel Padang', 'cabang', 'Jl. Bundo Kandung No. 20-28 Padang', '1989', '751375333', 'sales.marketing@bumiminanghotel.com', 'jasa perhotelan', NULL, 'Fajri D.Roesman', 'general manager', '6', NULL, 'DR.H. Erwal Gewang, SH', '607/T/PARPOSTEL/1995', 'Selama beroperasi', 'Parpostel', '01.459.466.7-201.000', NULL, NULL, NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(7, 'PT. Erempat Syaher Karya', 'pusat', 'Jl. Sarang Gagak Raya No.5 Anduring Padang', '2016', '82284972033', 'pt.eremparsyaherkarya@gmail.com', 'kontraktor, supplier, service', '1371091211890010', 'Rino Berkah Permata', 'Direktur', '6', NULL, 'Devi Hasibuan, SH', '0503-0786/03.07/PK/SIUP/V/2017-PROB', 'Sselamanya', 'DPMPTSP Kota Padang', '76.582.607.8-201.000', NULL, NULL, NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(8, 'Mercure Hotel Padang', 'pusat', 'Jl. Purus IV No.8 Padang', '2009', '751891188', 'reservation@mercurepadang.com', 'jasa perhotelan', '1407102709810000', 'Subhan H.Sahaban', 'General Manager', '1', NULL, 'Haryanti, SH', '003/TDUP/DPMPTSP/II/2017', 'Selama beroperasi', 'Pemko Padang', '02.984.077.4-201.000', NULL, NULL, NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(9, 'Hotel Grand Royal Denai', 'pusat', 'Jl. Yos Sudarso No. 5,6,7 Kayu Kubu', '2016', '7528100535', 'grandroyaldenai@reservasi@gmail.com', 'jasa perhotelan', '1375011501730000', 'Syafroni Falian, SST. Par', 'Executive Assistant Manager', '3', NULL, 'Hj. Tessi Levino, SH, M.kn', '556.2/07/BP2TPM-BKT/2016', 'Juni 2021', 'DPPTPM Kota Bukittinggi', '76.351.034.4-202.000', NULL, NULL, NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(10, 'HW Hotel Padang', 'pusat', 'Jl. Hayam Wuruk No. 16 Padang', '1996', '81374906145', 'reservasi@hwhotelpadang.com', 'jasa perhotelan', NULL, 'Firman Farid Latif', 'General Manager', '43', NULL, 'Lanny Widjaja, SH', '2540/IG-NI/BPMPTSP/X2016-PROB', '19 Oktober 2016', 'DPMPTSP Kota Padang', '01.800.645.2.-201.000', NULL, NULL, NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(11, 'CV. Sarana Multi Abadi', 'pusat', 'Jl. Beringin No.1 Lolong Padang', '2016', '751705903', 'saranamultiabadi@gmail.com', 'kontraktor dan supplier', NULL, 'Syfaril Can', 'Direktur', '4', NULL, 'Dra. Butet, SH', '0205-0415/03.07/SIUP/II/2016', '18 Maret 2021', 'DPMPTSP Kota Padang', '03.119469.9-201.000', NULL, NULL, NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(12, 'CV. Balimo Jaya', 'pusat', 'Jl. Kelapa Gading V No.5 Ulak Karang Selatan', '2012', '751445525', 'cv.balimojaya@gmail.com', 'konstruksi dan perdagangan', '1371092910770000', 'Robby Cahyadi', 'Direktur', '9', NULL, 'Wahidah Septiani, SH', '03.07.2.46.10851', '31 maret 2017', 'KP2T Kota Padang', '03.202.020.8.201.000', NULL, NULL, NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(13, 'CV. Adika Cipta', 'pusat', 'Jl. Pondok Indah Permai H.6 Dadok Tunggul Hitam', '2010', '8128711851', 'epramujaya@gmial.com', 'kontraktor dan supplier', '1371116604781000', 'Devy Heryanti, SE', 'Direktur', '13', NULL, 'Muhammad Ahyar Prawira,SH', '017-0791/03/PK/SIUP/XI/2018', 'Selama beroperasi', 'Pemko Padang', '03.119.141.4-201.000', NULL, NULL, NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(14, 'PT. Kimia Farma Diagnostika', 'cabang', 'Jl. Perintis Kemerdekaan No. 11 Sawahan Timur', '2008', '7518959574', 'kfd.padang@yahoo.com', 'laboratorium klinik', NULL, 'Loly Yustiani Pohon', 'Bisnis Manager', '1', NULL, 'Amsal Sulaeman, SH', '03/ILAP/DPMPTSP/XI/2019', '12-Nov-24', 'DPMPTSP', '01.061.332.1-051.000', NULL, NULL, NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(15, 'Ibis hotel padang', 'pusat', 'Jl. taman siswa no 1A padang, 25134', NULL, '7514488688', 'reservation@ibispadang.com', 'jasa', '3310260607750000', 'ferry yudhi iswoyo', 'general manager', '13', NULL, 'Haryanti, SH', '570413', '', 'DPMPTSP', '03.233.-009.4-201.000', NULL, NULL, NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(16, 'CV. Ryur Namuri Chan', 'pusat', 'Jorong Koto Baru Desa Kubang kecamatan guguak Kabupaten Lima Puluh Kota', NULL, '8116697411', 'tenunkubang@gmail.com', 'jasa konveksi', NULL, 'yulia Rahmi', 'manager', '1', NULL, 'Marlina, SH', '217/03.09.20/DPMPTSP-LK/PK/XI/2017', 'Selama beroperasi', 'DPMPTSP 50 Kota', '03.108.365.2-204.000', NULL, NULL, NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(17, 'CV. Petratama Persada', 'pusat', 'Jl. Radin Inten II 150 D1, Duren Sawit', '2004', '2121285843', 'pertratamapersada@yahoo.co.id', 'ATK, Percetakan, jasa periklanan', '3175070306640020', 'Victor manurung', 'direktur', '10', NULL, 'Darbi, SH', '9120103990871', 'efektif', 'Sitem OSS', '02.359.962.4.008.000', NULL, NULL, NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(18, 'The ZHM Premiere', 'cabang', 'Jl. M. Thamrin No.27', NULL, '87518948888', 'reservation@premierehotelpadang.com', 'jasa perhotelan', '1471095005700020', 'Surni Yanti', 'General Manager', '62', NULL, 'Sugiono HarIanto, SH', '8120310121069', 'Selama beroperasi', 'Pemerintah RI', '02.365.685.3-301.001', NULL, NULL, NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(19, 'Hotel Pusako Bukittinggi', 'cabang', 'Jl. Soekarno Hatta No.7 Bukittinggi', NULL, '75232111', 'eam.phbt@gmail.com', 'jasa perhotelan', '1306070211640000', 'Anuzul', 'Executive Assistant Manager', '93', NULL, 'Yudo Paripurno, SH', '1/13/IU-PB/PMDN/2014', 'Selama beroperasi', 'BKPM Provinsi Sumbar', '01.347.001.8-202.001', NULL, NULL, NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(20, 'Novotel Bukittinggi', 'pusat', 'Jl. Laras Datuak Bandaro Bukittinggi', NULL, '217822057', 'gm@novotel-bukittinggi.com', 'jasa perhotelan', NULL, 'Yon Hendri', 'general manager', NULL, NULL, 'Vidhya Shah, SH', '9120205581936', 'Selama beroperasi', 'DPMPTSP', '01.345.312.1-202.001', NULL, NULL, NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(21, 'The Balcone Hotel & Resort', 'Pusat', 'Jl. Raya Bukittinggi Medan KM 7', NULL, '7526484444', 'gm@thebalconehotel.com', 'jasa perhotelan', NULL, 'Vibianto Rizaldy', 'General Manager', '43', NULL, 'Sawitri Hadiprayitno, SH', '', '', '', '', NULL, NULL, NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(22, 'CV. Neo Pratama', 'pusat', 'Jl. Melati No.6 Flamboyan Padang', NULL, '7517051328', '', '', NULL, 'Yuzi Hendri', 'Direktur', NULL, NULL, '', '', '', '', '02.403.868.9-201.000', NULL, NULL, NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(23, 'Hotel Santika Premiere', 'pusat', 'Jl. Sudirman No.19 Kampung Jao', '2018', '75132777', 'amaris.stj@gmail.com', 'jasa perhotelan', NULL, 'Ainur R Mustafar', 'General Manager', '250', NULL, 'Dr. Beatrix Benny, SH, M.Pd, M.Kn.', '9120406830396', 'Selama beroperasi', 'DPMPTSP', '31.601.506.4.201.000', NULL, NULL, NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(24, 'CV. Dimas Pakarti', 'pusat', 'Jl. Akasia Raya No.67 RT 04 RW 09', NULL, NULL, '', '', NULL, 'Ratri Handayani', 'Direktur', NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(25, 'Hotel Truntum', 'cabang', 'Jl. Gereja No.34', NULL, '75135600', 'gim.accounting@yahoo.com', 'jasa perhotelan', NULL, 'Pardomuan Siregar', 'General Manager', '47', NULL, 'Titik Irawati, SE', '500.74/KBT/V/2021', 'Selama beroperasi', 'Kelurahan Belakang Tangsi', '42.290.962.2.015.000', NULL, NULL, NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(26, 'Ocean Beach Hotel', 'pusat', 'Jl. Wolter Monginsidi No.4 D/E', '2020', '75132238', 'rsvn.obhpadang@gmail.com', 'jasa perhotelan', NULL, 'Dewa Putu Suastika', 'General Manager', '5', NULL, 'Jana Hanna Waturangi, SH', '03.07.3.55.05504', 'Selama beroperasi', 'DPMPTSP', '91.019.275.6-201.000', NULL, NULL, NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(27, 'PT. Airmas Jbros Teknologi', 'pusat', 'Jl. AR Hakim Petak 2 No. 3B Belakang Pondok', NULL, NULL, '', '', NULL, 'Kamius', 'Direktur', NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, '2025-01-09 02:37:13', '2025-01-09 02:37:13'),
(28, 'CV. Dunia Bordir Komputer', 'pusat', 'Jl. Perintis Kemerdekaan No.18 A', '2016', '81266902445', 'cv.duniabordirkomputer@gmail.com', 'Konveksi', '1371091212890010', 'Roby Sugara', 'Pimpinan', '2', NULL, 'Defri Nasri', '1054.3.17', '21/08/2022', 'DPMPTSP', '76.651.829.4-205.000', NULL, NULL, NULL, '2025-01-09 02:37:13', '2025-01-09 02:37:13'),
(29, 'Emersia Hotel & Resort', 'pusat', 'Jl. Hamka No. 41 Jorong Parak Jua', NULL, '75271771', 'reservation@emersiahotel.com', 'jasa perhotelan', '327312150274004', 'Jamil S.S', 'General Manager', '14', NULL, 'Ihsan Wijaya, SH', '8120011221158', '', 'PMDN', '72.926.443.2-204.000', NULL, NULL, NULL, '2025-01-09 02:37:13', '2025-01-09 02:37:13');

-- --------------------------------------------------------

--
-- Table structure for table `produks`
--

CREATE TABLE `produks` (
  `id` bigint UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produks`
--

INSERT INTO `produks` (`id`, `kode`, `nama`, `satuan`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'P001', 'room only-twinshare', 'OH', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(2, 'P002', 'fullboard', 'OH', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(3, 'P003', 'breakfast', 'pax', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(4, 'P004', 'room only-twinshare', 'OH', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(5, 'P005', 'fullboard', 'OH', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(6, 'P006', 'breakfast', 'pax', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(7, 'P007', 'snack', 'pax', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(8, 'P008', 'Paket Halfday', 'pax', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(9, 'P009', 'snack', 'pax', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(10, 'P010', 'jasa pengiriman', 'koli', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(11, 'P011', 'room only-twinshare', 'OH', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(12, 'P012', 'fullboard', 'OH', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(13, 'P013', 'breakfast', 'pax', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(14, 'P014', 'snack', 'pax', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(15, 'P015', 'Coffee break', 'pax', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(16, 'P016', 'backdrop', 'paket', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(17, 'P017', 'spanduk', 'paket', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(18, 'P018', 'poster', 'paket', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(19, 'P019', 'leaflet', 'lembar', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(20, 'P020', 'jasa dokumentasi', 'paket', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(21, 'P021', 'sertifikat', 'paket', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(22, 'P022', 'souvenir', 'paket', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(23, 'P023', 'fullboard', 'OH', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(24, 'P024', 'room only-twinshare', 'OH', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(25, 'P025', 'fullboard', 'OH', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(26, 'P026', 'breakfast', 'pax', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(27, 'P027', 'snack', 'pax', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(28, 'P028', 'Fullday Meeting', 'pax', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(29, 'P029', 'room only-twinshare', 'OH', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(30, 'P030', 'fullboard', 'OH', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(31, 'P031', 'breakfast', 'pax', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(32, 'P032', 'snack', 'pax', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(33, 'P033', 'Pena gel', 'Buah', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(34, 'P034', 'Tas Ransel', 'Buah', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(35, 'P035', 'Pekerjaan Instalasi Kabel dan Stop Kontak', 'paket', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(36, 'P036', 'Pekerjaan plesteran', 'm2', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(37, 'P037', 'Pekerjaan Lantai', 'm2', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(38, 'P038', 'Pekerjaan wc', 'm2', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(39, 'P039', 'Pekerjaan Perbaikan Atap', 'm2', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(40, 'P040', 'Pekerjaan kusen dan pintu', 'paket', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(41, 'P041', 'Pekerjaan cat', 'paket', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(42, 'P042', 'Pekerjaan Canopy dan Pagar', 'paket', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(43, 'P043', 'Pekerjaan dinding pembatas dan kolam ikan', 'paket', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(44, 'P044', 'pemeliharaan saniter', 'paket', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(45, 'P045', 'pekerjaan pintu aluminium', 'paket', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(46, 'P046', 'pekerjaan dinding partisi', 'paket', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(47, 'P047', 'pekerjaan pemindahan washtafel', 'paket', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(48, 'P048', 'Rapid test', 'test', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(49, 'P049', 'kamar', 'OH', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(50, 'P050', 'fullboard', 'OH', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(51, 'P051', 'breakfast', 'pax', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(52, 'P052', 'snack', 'pax', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(53, 'P053', 'seragam dinas pegawai', 'potong', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(54, 'P054', 'Publikasi', 'eksemplar', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(55, 'P055', 'kamar', 'OH', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(56, 'P056', 'fullboard', 'OH', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(57, 'P057', 'breakfast', 'pax', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(58, 'P058', 'snack', 'pax', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(59, 'P059', 'Fullday Meeting', 'OH', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(60, 'P060', 'kamar', 'OH', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(61, 'P061', 'fullboard', 'OH', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(62, 'P062', 'breakfast', 'pax', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(63, 'P063', 'snack', 'pax', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(64, 'P064', 'kamar', 'OH', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(65, 'P065', 'fullboard', 'OH', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(66, 'P066', 'Perawatan Komputer', 'unit', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(67, 'P067', 'Upgrade Storage', 'unit', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(68, 'P068', 'Upgrade Memory', 'unit', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(69, 'P069', 'Penarikan kabel LAN', 'titik', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(70, 'P070', 'Pemasangan dan setting access point', 'titik', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(71, 'P071', 'Fullday Meeting', 'OH', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(72, 'P072', 'Moisture Tester', 'paket', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(73, 'P073', 'Fullday Meeting', 'OH', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(74, 'P074', 'Room only-twinshare', 'OH', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(75, 'P075', 'Room only-twinshare', 'OH', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(76, 'P076', 'Fullboard Meeting', 'OH', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(77, 'P077', 'Infocus', 'unit', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(78, 'P078', 'Baju', 'potong', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(79, 'P079', 'Room only-twinshare', 'OH', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(80, 'P080', 'Fullboard Meeting', 'OH', NULL, '2025-01-09 02:37:12', '2025-01-09 02:37:12'),
(81, 'P081', 'kuesioner', 'eksemplar', NULL, '2025-01-09 02:41:16', '2025-01-09 02:41:16');

-- --------------------------------------------------------

--
-- Table structure for table `produk_penyedias`
--

CREATE TABLE `produk_penyedias` (
  `id` bigint UNSIGNED NOT NULL,
  `penyedia_id` bigint UNSIGNED NOT NULL,
  `produk_id` bigint UNSIGNED NOT NULL,
  `harga` int NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produk_transaksis`
--

CREATE TABLE `produk_transaksis` (
  `id` bigint UNSIGNED NOT NULL,
  `transaksi_id` bigint UNSIGNED NOT NULL,
  `produk_id` bigint UNSIGNED NOT NULL,
  `jumlah` int NOT NULL,
  `harga` bigint NOT NULL,
  `total` int NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksis`
--

CREATE TABLE `transaksis` (
  `id` bigint UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `penyedia_id` bigint UNSIGNED NOT NULL,
  `nilai_kontrak` bigint NOT NULL,
  `uraian_pekerjaan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nilai` decimal(10,2) DEFAULT NULL,
  `predikat` enum('Sangat Baik','Baik','Cukup','Buruk') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun_anggaran` year NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('supervisor','pengentri') COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `role`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'supervisor', 'supervisor', '$2y$12$FCAAUppuNNQZiSy49f3W5e65vaBmvgsatvvc.3m5eZvCaEdS1QV4O', 'NRSAxggJHsKL2eN63G9y31MDFuTbyJ80F5mwrvarSkrdezbr7PtmhINJa2ox', '2025-01-09 02:36:46', '2025-01-09 02:36:46'),
(2, 'pengentri1', 'pengentri', '$2y$12$AOF0jb5UdoWSFo2Rt7GoveeUPB22R6gpb5IpCo/2FSRPTJsnd0Rn.', 'gNeaAFdSUieQTKb6vsLkKXwqJnhaJA96DMRt5jvapTgO08CNdMiNzeAK4kAj', '2025-01-09 02:36:46', '2025-01-09 02:36:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aspek_kinerjas`
--
ALTER TABLE `aspek_kinerjas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_nilais`
--
ALTER TABLE `log_nilais`
  ADD PRIMARY KEY (`id`),
  ADD KEY `log_nilais_transaksi_id_foreign` (`transaksi_id`),
  ADD KEY `log_nilais_aspek_kinerja_id_foreign` (`aspek_kinerja_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `penyedias`
--
ALTER TABLE `penyedias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produks`
--
ALTER TABLE `produks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `produks_kode_unique` (`kode`);

--
-- Indexes for table `produk_penyedias`
--
ALTER TABLE `produk_penyedias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produk_penyedias_penyedia_id_foreign` (`penyedia_id`),
  ADD KEY `produk_penyedias_produk_id_foreign` (`produk_id`);

--
-- Indexes for table `produk_transaksis`
--
ALTER TABLE `produk_transaksis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produk_transaksis_transaksi_id_foreign` (`transaksi_id`),
  ADD KEY `produk_transaksis_produk_id_foreign` (`produk_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `transaksis`
--
ALTER TABLE `transaksis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksis_penyedia_id_foreign` (`penyedia_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aspek_kinerjas`
--
ALTER TABLE `aspek_kinerjas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log_nilais`
--
ALTER TABLE `log_nilais`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `penyedias`
--
ALTER TABLE `penyedias`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `produks`
--
ALTER TABLE `produks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `produk_penyedias`
--
ALTER TABLE `produk_penyedias`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk_transaksis`
--
ALTER TABLE `produk_transaksis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksis`
--
ALTER TABLE `transaksis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `log_nilais`
--
ALTER TABLE `log_nilais`
  ADD CONSTRAINT `log_nilais_aspek_kinerja_id_foreign` FOREIGN KEY (`aspek_kinerja_id`) REFERENCES `aspek_kinerjas` (`id`),
  ADD CONSTRAINT `log_nilais_transaksi_id_foreign` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksis` (`id`);

--
-- Constraints for table `produk_penyedias`
--
ALTER TABLE `produk_penyedias`
  ADD CONSTRAINT `produk_penyedias_penyedia_id_foreign` FOREIGN KEY (`penyedia_id`) REFERENCES `penyedias` (`id`),
  ADD CONSTRAINT `produk_penyedias_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produks` (`id`);

--
-- Constraints for table `produk_transaksis`
--
ALTER TABLE `produk_transaksis`
  ADD CONSTRAINT `produk_transaksis_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produks` (`id`),
  ADD CONSTRAINT `produk_transaksis_transaksi_id_foreign` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksis` (`id`);

--
-- Constraints for table `transaksis`
--
ALTER TABLE `transaksis`
  ADD CONSTRAINT `transaksis_penyedia_id_foreign` FOREIGN KEY (`penyedia_id`) REFERENCES `penyedias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
