-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 24 Apr 2020 pada 17.31
-- Versi server: 5.7.24-0ubuntu0.18.04.1
-- Versi PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_yukkajian`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jenis_kajian`
--

CREATE TABLE `tb_jenis_kajian` (
  `id_jenis_kajian` int(11) NOT NULL,
  `nama_jenis_kajian` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jenis_kajian`
--

INSERT INTO `tb_jenis_kajian` (`id_jenis_kajian`, `nama_jenis_kajian`) VALUES
(1, 'tabligh'),
(2, 'taklim');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kajian`
--

CREATE TABLE `tb_kajian` (
  `id_kajian` int(11) NOT NULL,
  `id_jenis_kajian` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `judul_kajian` varchar(200) NOT NULL,
  `pemateri` varchar(255) NOT NULL,
  `tanggal` datetime NOT NULL,
  `tanggal_upload` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `gambar` varchar(100) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `latlng` varchar(255) NOT NULL,
  `status` enum('belum publish','publish') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kajian`
--

INSERT INTO `tb_kajian` (`id_kajian`, `id_jenis_kajian`, `id_kategori`, `judul_kajian`, `pemateri`, `tanggal`, `tanggal_upload`, `gambar`, `lokasi`, `latlng`, `status`) VALUES
(1, 2, 3, 'Kitab Arbain annawawi Hadits ke 13', 'Ustadz Muh Ihsan Zainuddin Lc', '2020-04-23 16:43:00', '2020-03-06 22:48:06', 'kajian1.jpg', 'Masjid Nurul Hikmah Jl.Faisal', '-5.162393@119.429865', 'publish'),
(2, 2, 2, 'Mempelajari Kitab Aqidah Washtisiyah', 'Ustadz Adi Hidayat Lc, MA.', '2020-03-14 18:12:00', '2020-03-12 00:20:34', 'kajian2.jpg', 'Jl. Sepi di batas kota ini', '', 'publish'),
(3, 2, 4, 'Fiqih Jual Beli', 'Ustadz Ahmad Hanafi Ld, MA, Ph.d', '2020-04-16 13:21:00', '2020-03-07 01:14:42', 'kajian3.jpg', 'Masjid Al Amiin, JL.A.P.Pettarani', '', 'publish'),
(4, 2, 3, 'Tidak manfaat tinggalkan', 'Ustadz Muh Ihsan Zainuddin', '2020-03-14 20:30:00', '2020-03-07 01:16:35', 'kajian4.jpg', 'Masjid Nurul Hikmah MIM', '', 'publish'),
(5, 2, 4, 'Fiqih Muyassar', 'Ustadz Ahmad Hanafi', '2020-03-14 19:19:00', '2020-03-07 01:17:40', 'kajian5.jpg', 'Masjid Nur Akhlaq', '', 'publish'),
(6, 1, 1, 'vcvc', 'vcc', '2020-03-13 17:01:00', '2020-03-13 17:02:01', 'pamflet_195.jpeg', 'fff', '', 'belum publish'),
(7, 1, 1, 'ygd', 'ccxz', '2020-03-13 17:30:00', '2020-03-13 17:04:42', 'pamflet_361.jpeg', 'flddk', '', 'belum publish'),
(8, 1, 1, 'sessss', 'dfdssa', '2020-03-16 09:55:00', '2020-03-16 09:41:28', 'pamflet_533.jpeg', 'dassfg', '', 'publish'),
(9, 1, 1, 'riya', 'ustadz Yusuf', '2020-03-16 11:30:00', '2020-03-16 11:32:50', 'pamflet_25.jpeg', 'hhgg', '', 'belum publish'),
(10, 1, 1, 'Rambu lalu lintas', 'ustadz Yusuf', '2020-03-19 11:02:00', '2020-03-19 11:04:07', 'pamflet_247.jpeg', 'jl.  sepi', '', 'belum publish'),
(11, 2, 4, 'Fiqh Sunnah', 'Ustadz Herman Hasyim, Sp.d., MM', '2020-03-20 17:21:00', '2020-03-20 19:03:15', 'kajian__1.jpg', 'Masjid Al-Fattah, Jl. Kandea No. 24', '', 'publish'),
(12, 2, 4, 'Sifat shalat Nabi', 'Ustadz Herman Hasyim, S.Pd., MM', '2020-03-23 14:15:00', '2020-03-20 19:05:39', 'kajian__2.jpg', 'Masjid Nur Islam, Jl. Muhammad Yamin Baru', '', 'publish'),
(13, 2, 6, 'Tafsir Al Quran', 'Ustadz Ronny Mahmuddin, Lc., M.Pd.I', '2020-03-20 16:33:00', '2020-03-20 19:08:09', 'kajian__3.jpg', 'Masjid Nurul Aisyah, Jl. Tamangapa Raya', '', 'publish'),
(14, 2, 3, 'Tidak manfaat, tinggalkan. Seri Kitab Arbain Annawawi', 'Ustadz DR. Muh. Ihsan Zainuddin, Lc. M.Si', '2020-03-20 16:36:00', '2020-03-20 19:10:40', 'kajian__4.jpg', 'Masjid Nurul Hikmah, Jl. RSI Faisal 14', '', 'publish'),
(15, 2, 3, 'Umdatul Ahkam', 'Ustadz Saifullah Anshar,Lc., M.H.I', '2020-03-20 18:36:00', '2020-03-20 19:13:49', 'kajian__5.jpg', 'Masjid Ni\'matullah, Jl.Andi tonro raya', '', 'publish'),
(16, 2, 3, 'Safinatun Najah', 'Ustadz H. Ayyub Subandi, Lc.', '2020-03-20 20:59:00', '2020-03-20 19:16:12', 'kajian__6.jpg', 'Masjid Anas bin Malik, Jl.Inpeksi Pam', '', 'publish'),
(17, 2, 6, 'Tadabbur Al Quran ayat-ayat pilihan', 'Ustadz Mukran, Lc.', '2020-03-20 17:31:00', '2020-03-20 19:24:35', 'kajian__7.jpg', 'Masjid Ni\'matullah, Jl.Andi Tonro', '', 'publish'),
(18, 2, 3, 'Keutamaan Membaca Al Quran, Kitab Riyadus Sholihin', 'Ustadz Yusran Anshar', '2020-03-20 19:18:00', '2020-03-20 19:26:32', 'kajian__8.jpg', 'Masjid Wihdatul Ummah, Jl. Abdesir', '', 'publish'),
(19, 2, 6, 'Tafsir Al Muyassar, penjelasan  surah Al Fatihah', 'Ustadz Jahada Mangka, Lc. M.A', '2020-03-20 21:04:00', '2020-03-20 19:28:53', 'kajian__9.jpg', 'Masjid Nurul Iman, Jl.Toddopuli raya timur', '-5.165115@119.449174', 'publish'),
(20, 1, 1, 'interaksi Rasulullah bersama anak-anak nya', 'ustadz Faisal', '2020-03-20 12:35:00', '2020-03-20 20:37:08', 'pamflet_814.jpeg', 'Masjid Nur Akhlaq, Hartaco', '', 'belum publish'),
(21, 1, 1, 'gfdd', 'ggdd', '2020-03-23 15:27:00', '2020-03-23 15:28:01', 'pamflet_142.jpeg', 'hhfd', '', 'belum publish'),
(22, 1, 1, 'bbcf', 'ggff', '2020-03-23 15:38:00', '2020-03-23 15:38:53', 'pamflet_524.jpeg', 'hhfff', '', 'belum publish'),
(23, 1, 1, 'Kajian Fiqh,taharah', 'ustadz Harman tajang', '2020-04-25 16:55:00', '2020-04-08 16:57:13', 'pamflet_929.jpeg', 'Masjid Hubbu Al Wathan, jl. pandang raya', '', 'belum publish'),
(24, 1, 1, 'Kajian Rutin', 'ustadz abu Yahya', '2020-04-18 12:06:00', '2020-04-16 12:07:36', 'pamflet_390.jpeg', 'jl. masjid agung, Masjid Agung', '', 'belum publish'),
(25, 2, 1, 'Kajian rutim', 'ustadz abu Haidar', '2020-04-22 12:08:00', '2020-04-16 12:09:43', 'pamflet_282.jpeg', 'Masjid Agung', '', 'belum publish'),
(26, 2, 1, 'jjaah', 'vVV', '2020-04-16 12:10:00', '2020-04-16 12:10:30', 'pamflet_126.jpeg', 'bbA', '', 'belum publish'),
(27, 2, 1, 'Kajian rutim', 'ustadz abu Haidar', '2020-04-22 12:08:00', '2020-04-16 12:10:31', 'pamflet_483.jpeg', '', '', 'belum publish');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Tauhid'),
(2, 'Aqidah'),
(3, 'Kitab'),
(4, 'Fiqih'),
(5, 'Parenting'),
(6, 'Tafsir');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_lampiran`
--

CREATE TABLE `tb_lampiran` (
  `id_lampiran` int(11) NOT NULL,
  `id_usulan` int(11) NOT NULL,
  `keterangan` enum('surat peminjaman tempat','surat kesediaan pemateri','surat izin keramaian','surat kerjasama') NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_lampiran`
--

INSERT INTO `tb_lampiran` (`id_lampiran`, `id_usulan`, `keterangan`, `gambar`) VALUES
(1, 1, 'surat izin keramaian', 'lampiran_400.jpeg'),
(2, 1, 'surat kesediaan pemateri', 'lampiran_367.jpeg'),
(3, 1, 'surat peminjaman tempat', 'lampiran_536.jpeg'),
(4, 1, 'surat kerjasama', 'lampiran_229.jpeg'),
(5, 2, 'surat kesediaan pemateri', 'lampiran_327.jpeg'),
(6, 2, 'surat izin keramaian', 'lampiran_496.jpeg'),
(7, 2, 'surat peminjaman tempat', 'lampiran_254.jpeg'),
(8, 2, 'surat kerjasama', 'lampiran_841.jpeg'),
(9, 2, 'surat kerjasama', 'lampiran_442.jpeg'),
(10, 2, 'surat kerjasama', 'lampiran_852.jpeg'),
(11, 3, 'surat izin keramaian', 'lampiran_716.jpeg'),
(12, 3, 'surat peminjaman tempat', 'lampiran_993.jpeg'),
(13, 3, 'surat kesediaan pemateri', 'lampiran_438.jpeg'),
(14, 3, 'surat kerjasama', 'lampiran_458.jpeg'),
(15, 3, 'surat kerjasama', 'lampiran_481.jpeg'),
(16, 3, 'surat kerjasama', 'lampiran_496.jpeg'),
(17, 3, 'surat kerjasama', 'lampiran_979.jpeg'),
(18, 3, 'surat kerjasama', 'lampiran_336.jpeg'),
(19, 4, 'surat izin keramaian', 'lampiran_68.jpeg'),
(20, 4, 'surat kesediaan pemateri', 'lampiran_66.jpeg'),
(21, 4, 'surat peminjaman tempat', 'lampiran_857.jpeg'),
(22, 4, 'surat kerjasama', 'lampiran_251.jpeg'),
(23, 4, 'surat kerjasama', 'lampiran_687.jpeg'),
(24, 4, 'surat kerjasama', 'lampiran_107.jpeg'),
(25, 5, 'surat izin keramaian', 'lampiran_943.jpeg'),
(26, 5, 'surat peminjaman tempat', 'lampiran_171.jpeg'),
(27, 6, 'surat izin keramaian', 'lampiran_200.jpeg'),
(28, 6, 'surat kesediaan pemateri', 'lampiran_552.jpeg'),
(29, 6, 'surat kerjasama', 'lampiran_263.jpeg'),
(30, 6, 'surat peminjaman tempat', 'lampiran_554.jpeg'),
(31, 6, 'surat kerjasama', 'lampiran_436.jpeg'),
(32, 6, 'surat kerjasama', 'lampiran_101.jpeg'),
(33, 7, 'surat izin keramaian', 'lampiran_859.jpeg'),
(34, 7, 'surat kesediaan pemateri', 'lampiran_511.jpeg'),
(35, 7, 'surat peminjaman tempat', 'lampiran_312.jpeg'),
(36, 8, 'surat izin keramaian', 'lampiran_937.jpeg'),
(37, 8, 'surat peminjaman tempat', 'lampiran_496.jpeg'),
(38, 8, 'surat kesediaan pemateri', 'lampiran_671.jpeg'),
(39, 8, 'surat kerjasama', 'lampiran_214.jpeg'),
(40, 9, 'surat izin keramaian', 'lampiran_259.jpeg'),
(41, 9, 'surat peminjaman tempat', 'lampiran_159.jpeg'),
(42, 9, 'surat kesediaan pemateri', 'lampiran_12.jpeg'),
(43, 9, 'surat kerjasama', 'lampiran_611.jpeg'),
(44, 10, 'surat kerjasama', 'lampiran_700.jpeg'),
(45, 10, 'surat peminjaman tempat', 'lampiran_328.jpeg'),
(46, 11, 'surat peminjaman tempat', 'lampiran_898.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pesan`
--

CREATE TABLE `tb_pesan` (
  `id_pesan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `pengirim` int(11) NOT NULL,
  `isi` varchar(255) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pesan`
--

INSERT INTO `tb_pesan` (`id_pesan`, `id_user`, `pengirim`, `isi`, `tanggal`) VALUES
(1, 1, 4, 'Kajian anda yang berjudul (Rambu lalu lintas) telah diterima. Tunggu beberapa saat, kajian anda segera akan di publish', '2020-03-19 11:04:51'),
(3, 1, 4, 'Kajian anda yang berjudul (Kajian Fiqh,taharah) telah diterima. Tunggu beberapa saat, kajian anda segera akan di publish', '2020-04-16 12:32:52'),
(4, 7, 4, 'Kajian anda yang berjudul (jjaah) telah diterima. Tunggu beberapa saat, kajian anda segera akan di publish', '2020-04-16 12:34:04'),
(5, 7, 4, 'Kajian anda yang berjudul (Kajian Rutin) telah diterima. Tunggu beberapa saat, kajian anda segera akan di publish', '2020-04-16 12:39:16'),
(6, 7, 4, 'Kajian anda yang berjudul (Kajian rutim) telah ditolak Ditolak', '2020-04-16 12:39:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_riwayat`
--

CREATE TABLE `tb_riwayat` (
  `id_riwayat` int(11) NOT NULL,
  `id_usulan` int(11) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_riwayat`
--

INSERT INTO `tb_riwayat` (`id_riwayat`, `id_usulan`, `tanggal`) VALUES
(3, 8, '2020-04-16 12:32:52'),
(5, 9, '2020-04-16 12:39:17'),
(6, 10, '2020-04-16 12:39:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `level` enum('admin','operator','user') NOT NULL,
  `status` enum('Tidak Aktif','Aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `email`, `password`, `nama`, `alamat`, `no_telp`, `gambar`, `level`, `status`) VALUES
(1, '', 'raihanarman8@gmail.com', 'Mantap123', 'Raihan', 'jahj', '0852963147', 'profil_82.jpeg', 'user', 'Aktif'),
(2, '', 'hldea', 'bashashioahsoahshaoshaiohai', 'nklnkl', '', '', 'saosa', 'user', 'Tidak Aktif'),
(3, '', 'andiraih61@gmail.com', 'Mantap123', 'Andi Raihan', '', '', '', 'user', 'Tidak Aktif'),
(4, 'operator', '', 'Kambing123', 'Operator Kajian', '', '08971726272', 'profil_913.jpeg', 'operator', 'Aktif'),
(6, '', 'mantap@gmail.com', 'Mantap123', 'Mantap', '', '', '', 'user', 'Aktif'),
(7, '', 'farid@gmail.com', 'Farid123', 'Farid', 'Jl. Pandang', '0852369147', 'profil_777.jpeg', 'user', 'Aktif'),
(8, '', 'hsahsao', 'saosa', 'bashashioahsoahshaoshaiohai', '', '', '', 'user', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_usulan`
--

CREATE TABLE `tb_usulan` (
  `id_usulan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kajian` int(11) NOT NULL,
  `no_telp_pemateri` varchar(12) NOT NULL,
  `status` enum('sedang proses','ditolak','diterima') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_usulan`
--

INSERT INTO `tb_usulan` (`id_usulan`, `id_user`, `id_kajian`, `no_telp_pemateri`, `status`) VALUES
(1, 1, 7, '082397147928', 'diterima'),
(2, 1, 8, 'dfdssa', 'diterima'),
(3, 1, 9, 'ustadz Yusuf', 'diterima'),
(4, 1, 10, '0852369147', 'diterima'),
(5, 7, 20, '0852369147', 'diterima'),
(6, 7, 21, '65554122', 'sedang proses'),
(7, 7, 22, '0852369741', 'sedang proses'),
(8, 1, 23, '0852369147', 'diterima'),
(9, 7, 24, '0852963147', 'diterima'),
(10, 7, 25, '0852369147', 'ditolak'),
(11, 7, 26, '0852369147', 'diterima'),
(12, 7, 27, '', 'sedang proses');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `vw_kajian`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vw_kajian` (
`id_kajian` int(11)
,`id_jenis_kajian` int(11)
,`id_kategori` int(11)
,`judul_kajian` varchar(200)
,`pemateri` varchar(255)
,`tanggal` datetime
,`tanggal_upload` datetime
,`gambar` varchar(100)
,`lokasi` varchar(255)
,`status` enum('belum publish','publish')
,`nama_kategori` varchar(40)
,`nama_jenis_kajian` varchar(100)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `vw_kajian`
--
DROP TABLE IF EXISTS `vw_kajian`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_kajian`  AS  select `tb_kajian`.`id_kajian` AS `id_kajian`,`tb_kajian`.`id_jenis_kajian` AS `id_jenis_kajian`,`tb_kajian`.`id_kategori` AS `id_kategori`,`tb_kajian`.`judul_kajian` AS `judul_kajian`,`tb_kajian`.`pemateri` AS `pemateri`,`tb_kajian`.`tanggal` AS `tanggal`,`tb_kajian`.`tanggal_upload` AS `tanggal_upload`,`tb_kajian`.`gambar` AS `gambar`,`tb_kajian`.`lokasi` AS `lokasi`,`tb_kajian`.`status` AS `status`,`tb_kategori`.`nama_kategori` AS `nama_kategori`,`tb_jenis_kajian`.`nama_jenis_kajian` AS `nama_jenis_kajian` from ((`tb_kajian` join `tb_kategori`) join `tb_jenis_kajian`) where ((`tb_kajian`.`id_kategori` = `tb_kategori`.`id_kategori`) and (`tb_kajian`.`id_jenis_kajian` = `tb_jenis_kajian`.`id_jenis_kajian`)) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_jenis_kajian`
--
ALTER TABLE `tb_jenis_kajian`
  ADD PRIMARY KEY (`id_jenis_kajian`);

--
-- Indeks untuk tabel `tb_kajian`
--
ALTER TABLE `tb_kajian`
  ADD PRIMARY KEY (`id_kajian`),
  ADD KEY `id_jenis_kajian` (`id_jenis_kajian`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tb_lampiran`
--
ALTER TABLE `tb_lampiran`
  ADD PRIMARY KEY (`id_lampiran`),
  ADD KEY `id_usulan` (`id_usulan`);

--
-- Indeks untuk tabel `tb_pesan`
--
ALTER TABLE `tb_pesan`
  ADD PRIMARY KEY (`id_pesan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tb_riwayat`
--
ALTER TABLE `tb_riwayat`
  ADD PRIMARY KEY (`id_riwayat`),
  ADD KEY `id_usulan` (`id_usulan`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `tb_usulan`
--
ALTER TABLE `tb_usulan`
  ADD PRIMARY KEY (`id_usulan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_kajian` (`id_kajian`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_jenis_kajian`
--
ALTER TABLE `tb_jenis_kajian`
  MODIFY `id_jenis_kajian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_kajian`
--
ALTER TABLE `tb_kajian`
  MODIFY `id_kajian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_lampiran`
--
ALTER TABLE `tb_lampiran`
  MODIFY `id_lampiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `tb_pesan`
--
ALTER TABLE `tb_pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_riwayat`
--
ALTER TABLE `tb_riwayat`
  MODIFY `id_riwayat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_usulan`
--
ALTER TABLE `tb_usulan`
  MODIFY `id_usulan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_kajian`
--
ALTER TABLE `tb_kajian`
  ADD CONSTRAINT `tb_kajian_ibfk_1` FOREIGN KEY (`id_jenis_kajian`) REFERENCES `tb_jenis_kajian` (`id_jenis_kajian`),
  ADD CONSTRAINT `tb_kajian_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori` (`id_kategori`);

--
-- Ketidakleluasaan untuk tabel `tb_lampiran`
--
ALTER TABLE `tb_lampiran`
  ADD CONSTRAINT `tb_lampiran_ibfk_1` FOREIGN KEY (`id_usulan`) REFERENCES `tb_usulan` (`id_usulan`);

--
-- Ketidakleluasaan untuk tabel `tb_pesan`
--
ALTER TABLE `tb_pesan`
  ADD CONSTRAINT `tb_pesan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `tb_riwayat`
--
ALTER TABLE `tb_riwayat`
  ADD CONSTRAINT `tb_riwayat_ibfk_1` FOREIGN KEY (`id_usulan`) REFERENCES `tb_usulan` (`id_usulan`);

--
-- Ketidakleluasaan untuk tabel `tb_usulan`
--
ALTER TABLE `tb_usulan`
  ADD CONSTRAINT `tb_usulan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`),
  ADD CONSTRAINT `tb_usulan_ibfk_2` FOREIGN KEY (`id_kajian`) REFERENCES `tb_kajian` (`id_kajian`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
