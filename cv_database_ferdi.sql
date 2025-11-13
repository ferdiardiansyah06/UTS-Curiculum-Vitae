-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 13, 2025 at 07:02 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cv_database_ferdi`
--

-- --------------------------------------------------------

--
-- Table structure for table `biodata`
--

CREATE TABLE `biodata` (
  `id` int NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `gelar` varchar(50) DEFAULT NULL,
  `foto_profil` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `alamat` text,
  `tentang_saya` text,
  `linkedin` varchar(255) DEFAULT NULL,
  `github` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `biodata`
--

INSERT INTO `biodata` (`id`, `nama_lengkap`, `gelar`, `foto_profil`, `email`, `telepon`, `alamat`, `tentang_saya`, `linkedin`, `github`, `website`, `created_at`, `updated_at`) VALUES
(1, 'Ferdi Ardiansyah', '', 'profile.jpg\r\n', 'ferdi@exsample.com', '+62 812-3456-7890', 'Jln.Kp.Cirumput Desa selaawi, Kabupaten Sukabumi Kecamatan Sukaraja  ', 'Saya adalah mahasiswa semester 5 yang sedang fokus mempelajari dan mengembangkan kemampuan dalam bidang pengembangan web, khususnya menggunakan CodeIgniter 4, React.js, Bootstrap, Tailwind CSS, dan PHP. Melalui teknologi tersebut, saya berupaya untuk memahami proses pembuatan aplikasi web yang dinamis, responsif, dan efisien, baik dari sisi tampilan maupun fungsionalitas.', 'https://www.linkedin.com/in/ferdi-ardiansyah-77a533330/', 'https://github.com/ferdiardiansyah06', '', '2025-11-08 19:39:21', '2025-11-13 13:26:25');

-- --------------------------------------------------------

--
-- Table structure for table `keahlian`
--

CREATE TABLE `keahlian` (
  `id` int NOT NULL,
  `biodata_id` int NOT NULL,
  `kategori` varchar(50) DEFAULT NULL,
  `nama_skill` varchar(100) NOT NULL,
  `urutan` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `keahlian`
--

INSERT INTO `keahlian` (`id`, `biodata_id`, `kategori`, `nama_skill`, `urutan`) VALUES
(1, 1, 'Frontend', 'React.js', 1),
(2, 1, 'Frontend', 'Tailwind CSS', 2),
(3, 1, 'Backend', 'Node.js', 3),
(4, 1, 'Backend', 'PHP', 4),
(5, 1, 'Backend', 'Python', 5),
(6, 1, 'Backend', 'CodeIgniter', 6),
(7, 1, 'Database', 'MySQL', 7),
(8, 1, 'Database', 'PostgreSQL', 8),
(9, 1, 'Database', 'MongoDB', 9),
(10, 1, 'DevOps', 'Git', 10),
(11, 1, 'Frontend', 'HTML', 11),
(12, 1, 'Frontend', 'CSS', 12),
(13, 1, 'Frontend', 'Java Scripts', 13);

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id` int NOT NULL,
  `biodata_id` int NOT NULL,
  `jenjang` varchar(50) NOT NULL,
  `institusi` varchar(150) NOT NULL,
  `jurusan` varchar(100) DEFAULT NULL,
  `tahun_mulai` year NOT NULL,
  `tahun_selesai` year DEFAULT NULL,
  `ipk` decimal(3,2) DEFAULT NULL,
  `deskripsi` text,
  `urutan` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pendidikan`
--

INSERT INTO `pendidikan` (`id`, `biodata_id`, `jenjang`, `institusi`, `jurusan`, `tahun_mulai`, `tahun_selesai`, `ipk`, `deskripsi`, `urutan`) VALUES
(1, 1, 's1 ', 'Universitas Muhammadiyah Sukabumi ', 'Teknik Informatika', 2023, 2027, '3.37', 'Berfokus pada pengembangan perangkat lunak, Front-End merupakan aspek penting dalam pembuatan aplikasi atau website yang menitikberatkan pada tampilan dan interaksi pengguna. Melalui penerapan teknologi modern seperti HTML, CSS, dan JavaScript, bagian ini bertujuan menciptakan antarmuka yang menarik, responsif, serta memberikan pengalaman pengguna yang intuitif dan menyenangkan.', 1),
(2, 1, 'SMA', 'SMA Negeri 1 Sukaraja', 'IPA', 2020, 2023, NULL, '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pengalaman`
--

CREATE TABLE `pengalaman` (
  `id` int NOT NULL,
  `biodata_id` int NOT NULL,
  `jenis_pengalaman` enum('pekerjaan','magang','organisasi','proyek') NOT NULL,
  `judul` varchar(150) NOT NULL,
  `perusahaan_organisasi` varchar(150) DEFAULT NULL,
  `lokasi` varchar(100) DEFAULT NULL,
  `tahun_mulai` year NOT NULL,
  `tahun_selesai` year DEFAULT NULL,
  `sedang_berlangsung` tinyint(1) DEFAULT '0',
  `deskripsi` text,
  `urutan` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pengalaman`
--

INSERT INTO `pengalaman` (`id`, `biodata_id`, `jenis_pengalaman`, `judul`, `perusahaan_organisasi`, `lokasi`, `tahun_mulai`, `tahun_selesai`, `sedang_berlangsung`, `deskripsi`, `urutan`) VALUES
(1, 1, 'magang', 'Tech Space ', 'Startup ', 'Sukabumi', 2025, 2026, 0, 'disini saya sebagai Front Ent developer yang mengembangkan lading page, Project Counter, Member Counter, Learning Page, Result Page', 3),
(4, 1, 'magang', 'Toko Baju Xsecondwear', 'e-commerce', 'Sukabumi', 2025, 2026, 0, 'Toko Baju XSecondWear, saya berperan sebagai Front-End Developer yang berfokus pada pengembangan dan penyempurnaan tampilan website e-commerce. Saya bertanggung jawab untuk merancang dan mengimplementasikan antarmuka pengguna menggunakan teknologi seperti HTML, CSS, JavaScript, dan Bootstrap, sehingga website dapat tampil menarik, responsif, serta mudah digunakan oleh pelanggan.', 4);

-- --------------------------------------------------------

--
-- Table structure for table `portofolio`
--

CREATE TABLE `portofolio` (
  `id` int NOT NULL,
  `biodata_id` int NOT NULL,
  `judul` varchar(150) NOT NULL,
  `deskripsi` text,
  `teknologi` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `link_github` varchar(255) DEFAULT NULL,
  `tahun` year DEFAULT NULL,
  `urutan` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `portofolio`
--

INSERT INTO `portofolio` (`id`, `biodata_id`, `judul`, `deskripsi`, `teknologi`, `gambar`, `link_github`, `tahun`, `urutan`) VALUES
(1, 1, 'Project-web-php', 'ini adalah project web php semester 3 disini saya belajar terkait tentang oop yaitu orientasi object programing ', 'php, Mysql, html, css, java scripts', 'sampah.png\r\n', 'https://github.com/ferdiardiansyah06/Project-web-php-', 2023, 1),
(2, 1, 'Project Web Toko Baju ', 'disini saya membuat project toko baju menggunakan CodeIgniter 4 dan saya membuat project ini ', 'React js, CodeIgniter 4, MySQL, Tailwain css, php', 'uploads/toko baju.png', 'https://github.com/ferdiardiansyah06/project-toko-baju', 2023, 2);

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `keahlian`
--
ALTER TABLE `keahlian`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengalaman`
--
ALTER TABLE `pengalaman`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `portofolio`
--
ALTER TABLE `portofolio`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
