-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 16, 2025 at 04:33 PM
-- Server version: 11.4.4-MariaDB-log
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cv_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `biodata`
--

CREATE TABLE `biodata` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `tentang_saya` text DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `github` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `biodata`
--

INSERT INTO `biodata` (`id`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `telepon`, `email`, `foto`, `tentang_saya`, `linkedin`, `github`, `instagram`, `created_at`, `updated_at`) VALUES
(1, 'Harits Hardiansyah\r\n하리스트 하르디안샤', 'Sukabumi', '2004-06-16', 'Laki-laki', 'Jl. Baros No 15 RT 004 RW 005 Kel. Jayaraksa, Kec. Baros, Kota Sukabumi – Jawa Barat, Indonesia', '085163509045', 'haritshardiansyah@email.com', 'CV.jpg', 'Saya adalah mahasiswa Teknik Informatika dan Teknik Penerbangan yang sedang menempuh program Double Degree dan juga yang passionate dalam web development dan memiliki pengalaman dalam membuat berbagai aplikasi web menggunakan PHP dan JavaScript.', 'https://www.linkedin.com/in/harits-hardiansyah-00ba9a290/', 'https://github.com/tealts', '', '2025-11-16 11:24:47', '2025-11-16 12:49:44');

-- --------------------------------------------------------

--
-- Table structure for table `keahlian`
--

CREATE TABLE `keahlian` (
  `id` int(11) NOT NULL,
  `biodata_id` int(11) NOT NULL,
  `kategori` varchar(50) DEFAULT NULL,
  `nama_skill` varchar(100) DEFAULT NULL,
  `level` enum('Beginner','Intermediate','Advanced','Expert') DEFAULT NULL,
  `persentase` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `keahlian`
--

INSERT INTO `keahlian` (`id`, `biodata_id`, `kategori`, `nama_skill`, `level`, `persentase`, `created_at`) VALUES
(1, 1, 'Programming', 'PHP', 'Intermediate', 70, '2025-11-16 11:24:47'),
(2, 1, 'Programming', 'JavaScript', 'Intermediate', 70, '2025-11-16 11:24:47'),
(3, 1, 'Programming', 'Python', 'Intermediate', 70, '2025-11-16 11:24:47'),
(4, 1, 'Framework', 'CodeIgniter', 'Beginner', 60, '2025-11-16 11:24:47'),
(5, 1, 'Framework', 'Laravel', 'Beginner', 60, '2025-11-16 11:24:47'),
(7, 1, 'Database', 'MySQL', 'Intermediate', 75, '2025-11-16 11:24:47'),
(8, 1, 'Database', 'PostgreSQL', 'Intermediate', 70, '2025-11-16 11:24:47'),
(9, 1, 'Tools', 'Git', 'Beginner', 60, '2025-11-16 11:24:47'),
(10, 1, 'Tools', 'Docker', 'Beginner', 60, '2025-11-16 11:24:47'),
(11, 1, 'Language', 'English', 'Intermediate', 70, '2025-11-16 11:24:47'),
(12, 1, 'Language', 'Arabic', 'Beginner', 60, '2025-11-16 11:24:47'),
(13, 1, 'Language', 'Korean', 'Beginner', 60, '2025-11-16 11:24:47');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id` int(11) NOT NULL,
  `biodata_id` int(11) NOT NULL,
  `jenjang` varchar(50) DEFAULT NULL,
  `institusi` varchar(100) DEFAULT NULL,
  `jurusan` varchar(100) DEFAULT NULL,
  `tahun_mulai` year(4) DEFAULT NULL,
  `tahun_selesai` year(4) DEFAULT NULL,
  `ipk` decimal(3,2) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pendidikan`
--

INSERT INTO `pendidikan` (`id`, `biodata_id`, `jenjang`, `institusi`, `jurusan`, `tahun_mulai`, `tahun_selesai`, `ipk`, `deskripsi`, `created_at`) VALUES
(1, 1, 'SD', 'SDIT Adzkia 1', '-', 2010, 2016, NULL, 'Lulus dengan nilai baik', '2025-11-16 11:24:47'),
(2, 1, 'SMP', 'MTS Tahfidz Al-Bassam', '-', 2016, 2019, NULL, 'Aktif dalam kegiatan dakwah', '2025-11-16 11:24:47'),
(3, 1, 'SMA', 'SMKS Plus An-Naba', 'OTKP', 2020, 2023, NULL, 'Lulus Uji Kompetensi Keahlian Sertifikat ISI dengan nilai 89.75', '2025-11-16 11:24:47'),
(4, 1, 'S1', 'Universitas Muhammadiyah Sukabumi', 'Teknik Informatika', 2023, NULL, '3.75', 'Fokus pada Web Development dan Database', '2025-11-16 11:24:47'),
(5, 1, 'D2', 'University of Gyeongnam Namhae ', 'Aviation Maintenance Engineering', 2025, NULL, NULL, '항공정비학부', '2025-11-16 11:24:47');

-- --------------------------------------------------------

--
-- Table structure for table `pengalaman`
--

CREATE TABLE `pengalaman` (
  `id` int(11) NOT NULL,
  `biodata_id` int(11) NOT NULL,
  `jenis` enum('Organisasi','Magang','Pekerjaan','Proyek') DEFAULT NULL,
  `posisi` varchar(100) DEFAULT NULL,
  `nama_tempat` varchar(100) DEFAULT NULL,
  `tahun_mulai` year(4) DEFAULT NULL,
  `tahun_selesai` year(4) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengalaman`
--

INSERT INTO `pengalaman` (`id`, `biodata_id`, `jenis`, `posisi`, `nama_tempat`, `tahun_mulai`, `tahun_selesai`, `deskripsi`, `created_at`) VALUES
(1, 1, 'Organisasi', 'Sekretaris Duta Kampus UMMI', 'UKM Protapusmi', 2021, 2022, 'Mengelola Administrasi: Menyusun dan memelihara dokumentasi kegiatan Duta Kampus, termasuk notulen rapat,agenda, dan arsip penting.', '2025-11-16 11:24:47'),
(2, 1, 'Magang', 'Administrative Internship.', 'LPK Generasi Putra Bangsa', 2024, 2024, 'Memberikan dukungan administratif dan perkantoran untuk memastikan operasional kantor berjalan lancar. ', '2025-11-16 11:24:47'),
(3, 1, 'Proyek', 'Full Stack Developer', 'Sistem Informasi Akademik ', 2023, 2023, 'Membangun sistem informasi akademik', '2025-11-16 11:24:47'),
(4, 1, 'Pekerjaan', 'Guru Piket', 'SMKS Plus An-Naba', 2024, 2025, 'Memastikan ketertiban, keamanan, dan kelancaran kegiatan belajar mengajar (KBM) harian di sekolah', '2025-11-16 11:24:47'),
(5, 1, 'Magang', 'Pelayanan Umum', 'Kantor Kecamatan Baros', 2022, 2023, 'Memberikan dukungan pelayanan pelanggan dan mengelola korespondensi kantor', '2025-11-16 11:24:47');

-- --------------------------------------------------------

--
-- Table structure for table `portofolio`
--

CREATE TABLE `portofolio` (
  `id` int(11) NOT NULL,
  `biodata_id` int(11) NOT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `teknologi` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `link_demo` varchar(255) DEFAULT NULL,
  `link_github` varchar(255) DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `portofolio`
--

INSERT INTO `portofolio` (`id`, `biodata_id`, `judul`, `deskripsi`, `teknologi`, `gambar`, `link_demo`, `link_github`, `tanggal_selesai`, `created_at`) VALUES
(1, 1, 'Sertifikat ISI', 'Sertifikat Uji Kompetensi Otomatisasi Tata Kelola Pengkantoran', 'Microsoft Word, Microsoft Excel, Microsoft PowerPoint, Microsoft Outlook', 'Sertifikat_ISI.jpg', '', '', '2023-06-15', '2025-11-16 11:24:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biodata`
--
ALTER TABLE `biodata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keahlian`
--
ALTER TABLE `keahlian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `biodata_id` (`biodata_id`);

--
-- Indexes for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `biodata_id` (`biodata_id`);

--
-- Indexes for table `pengalaman`
--
ALTER TABLE `pengalaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `biodata_id` (`biodata_id`);

--
-- Indexes for table `portofolio`
--
ALTER TABLE `portofolio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `biodata_id` (`biodata_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `biodata`
--
ALTER TABLE `biodata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `keahlian`
--
ALTER TABLE `keahlian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pengalaman`
--
ALTER TABLE `pengalaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `portofolio`
--
ALTER TABLE `portofolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `keahlian`
--
ALTER TABLE `keahlian`
  ADD CONSTRAINT `keahlian_ibfk_1` FOREIGN KEY (`biodata_id`) REFERENCES `biodata` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD CONSTRAINT `pendidikan_ibfk_1` FOREIGN KEY (`biodata_id`) REFERENCES `biodata` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pengalaman`
--
ALTER TABLE `pengalaman`
  ADD CONSTRAINT `pengalaman_ibfk_1` FOREIGN KEY (`biodata_id`) REFERENCES `biodata` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `portofolio`
--
ALTER TABLE `portofolio`
  ADD CONSTRAINT `portofolio_ibfk_1` FOREIGN KEY (`biodata_id`) REFERENCES `biodata` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
