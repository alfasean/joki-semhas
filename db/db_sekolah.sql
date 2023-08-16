-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Jul 2023 pada 07.32
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sekolah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_berita`
--

CREATE TABLE `tb_berita` (
  `id_berita` int(30) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `tgl_publish` date NOT NULL,
  `deskripsi` varchar(9999) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_berita`
--

INSERT INTO `tb_berita` (`id_berita`, `judul`, `tgl_publish`, `deskripsi`, `foto`) VALUES
(2, 'Penyambutan Kapolri di SD NEGERI 193 Hansel', '2023-07-04', 'baslasalsalssa', 'download (2).jfif'),
(3, 'Viral Mahasiswi Unsrat Manado Dianiaya dan Dipasung Ibu Tiri', '2023-07-02', 'Jakarta - Viral di media sosial mahasiswi Universitas Sam Ratulangi (Unsrat) Manado, Sulawesi Utara (Sulut) diduga dianiaya dan dipasung oleh ibu tirinya. Kondisi itu membuat korban alami beberapa luka.\r\nDalam video viral yang dilihat detikcom, Senin (10/10/2022), tampak seorang wanita sedang terbaring di tempat tidur. Kedua kaki dan tangannya juga tampak terikat.\r\n\r\nTampak pula sejumlah luka di tubuh korban. Luka-luka itu diduga akibat dianiaya ibu tirinya.\r\n\r\nDilansir dari detikSulsel, diketahui mahasiswi itu adalah Kim Yuni Saerang (20). Korban merupakan mahasiswi Fakultas Ilmu Sosial dan Politik (Fispol) Unsrat Manado.\r\n\r\nUnit Pelaksana Teknis Daerah (UPTD) Perlindungan Perempuan dan Anak (PPA) Sulut turun tangan. Kepala UPTD PPA Sulut Marsel Silom mengaku pihaknya telah berkoordinasi dengan kepolisian dan mengevakuasi korban pada Sabtu (8/10) malam.\r\n\r\n\"Sejak viral UPTD PPA melalui pendamping hukum koordinasi dengan Polda untuk evakuasi,\" katanya.\r\n\r\nNamun Marsel mengatakan pihaknya belum dapat memberikan keterangan lebih lanjut.', 'asasa.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_danabos`
--

CREATE TABLE `tb_danabos` (
  `id_danabos` int(11) NOT NULL,
  `file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_danabos`
--

INSERT INTO `tb_danabos` (`id_danabos`, `file`) VALUES
(1, 'SK Kepengurusan HIMSIFOR.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_event`
--

CREATE TABLE `tb_event` (
  `id_event` int(11) NOT NULL,
  `judul` varchar(99) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_event`
--

INSERT INTO `tb_event` (`id_event`, `judul`, `deskripsi`, `gambar`) VALUES
(2, 'Lomba Menghias Kelas', 'lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem haha', 'bitng.webp'),
(3, 'Peringatan Hari Guru', 'Semua siswa mempersiapkan hadiah bom kepada gurunya masing-masing', '5f3975f4d597e.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_guru`
--

CREATE TABLE `tb_guru` (
  `id_guru` int(30) NOT NULL,
  `nama_guru` varchar(50) NOT NULL,
  `foto` text NOT NULL,
  `nip` varchar(50) NOT NULL,
  `pendidikan` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `keterangan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_guru`
--

INSERT INTO `tb_guru` (`id_guru`, `nama_guru`, `foto`, `nip`, `pendidikan`, `jabatan`, `status`, `keterangan`) VALUES
(13, 'Alfa Sean Lonteng', 'user.png', '1239129999921', 'S1 Sistem Informasi', 'Kepala Lab', 'PNS', 'A'),
(14, 'Dimas', 'team-2.jpg', '328328473287', 'S1 Hukum', 'Kepala Lab', 'PNS', 'A'),
(15, 'Bambang', 'team-3.jpg', '82193821328', 'S1 Pendidikan', 'Guru', 'PNS', 'A');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kalender`
--

CREATE TABLE `tb_kalender` (
  `id_kalender` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `judul` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_kalender`
--

INSERT INTO `tb_kalender` (`id_kalender`, `tanggal`, `judul`) VALUES
(1, '2023-07-09', 'Ujian Tengah Semester'),
(3, '2023-07-20', 'Rapat Evaluasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kontak`
--

CREATE TABLE `tb_kontak` (
  `id_kontak` int(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `pesan` varchar(255) NOT NULL,
  `subjek` varchar(999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_kontak`
--

INSERT INTO `tb_kontak` (`id_kontak`, `email`, `nama`, `pesan`, `subjek`) VALUES
(1, 'alfasean22@gmail.com', 'Alfa Sean', 'halosnasnajs', 'JASajsaj');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_sejarah`
--

CREATE TABLE `tb_sejarah` (
  `id_sejarah` int(11) NOT NULL,
  `deskripsi` varchar(9999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_sejarah`
--

INSERT INTO `tb_sejarah` (`id_sejarah`, `deskripsi`) VALUES
(2, 'SEJARAH PENDIRIAN SD NEGERI 193 HALMAHERA SELATAN\r\nSekolah dasar Negeri 193 Halmahera Selatan ( SDN 193 HAL-SEL) terletak di Desa Tawa Kecamatan Bacan Timur Tengah, Kabupaten Halmahera Selatan,Provinsi Maluku Utara.\r\nPendirian SDN 193 HAL-SEL ( status Sekolah saat ini) melalui beberapa fase anta lain:\r\nA.	FASE SEBELUM INPRES\r\nDesa Tawa pada era tahun 70-an masih bebrbentuk anak desa ( Dusun) dari Desa Babang     \r\n(± 9 km jarak dari Desa Tawa ). Populasi masyarakat yang kian berkembang dari tahun ketahun, kesadaran masyarakat terhadap pentingnya Pendidikan bagi warga masyarakat, melalui musyawarah warga Desa (rapat) memunculkan sebuah kesepakatan untuk membangun sebuah gedung sebagai tempat belajar bagi anak-anak .\r\nPembangunan gedung tempat belajar yang dilakukan secara swadaya menghasilkan dua ruang belajar sederhana ( semi parmanen) di atas tanah milik warga dengan status tanah pinjaman.\r\nPembangunan gedung yang dilakukan oleh warga masyarakat secara swadaya dengan maksud untuk menarik perhatian pemerintah setempat agar dapat mendatangkan tenaga Guru bagi warga masyarakat. \r\nPerjalanan waktu sesudah pembangunan gedung dilakukan, harapan masyarakat akan tanggapan pemerintah setempat belum juga terwujud.gedung yang dibangun belum juga digunakan sebagai wujud harapan warga sampai pada suatu saat datanglah seseorang yang kebetulan lewat dan mampir dengan maksud menunggu perhubungan lanjutan ke Ambon karena baru di pecat dari perusahan tempat ia bekerja. Dalam waktu penantian itu membuat ia bertemu dengan Kepala Desa yang baru saja dipilih setelah berstatus Desa Definitif yang kemudian meminta kesediaanya untuk mengajar di Desa sebulum waktunya Kembali ke kampung halaman.menerima permintaan Kepal Desa, Pak Samuel Hanoatubun kemudian di manfaatkan sebagai Guru ( engku) untuk mengajar di Desa.\r\n\r\nB.	BERSTATUS INPRES\r\nPada tahun 1986 melalui pemerintah daerah, tempat belajar yang telah berada di desa di lembagakan sebagai SD INPRES TAWA dan ditempatkan seorang Guru yang berasal dari kecamatan Kao Yakni Bpk Yohanis Tarnate ( Kepala Sekolah Pertama ) untuk bertugas di Desa. Melalaui keberadaan Tenaga guru di tengah-tengah masyarakat, anak-anak desa yang bersekolah di luar kampung kemudian Kembali bersekolah di kampung.\r\nKebersamaan dengan Bpk Yohanis Tarnate tidak berlansung lama, beliau kemudian ditugaskan ke daerah asalnya yakni, Desa Doro Kecamatan Kao ( Thn 1988) dan digantikan oleh Bpk Adolof Lewanmeru ( Kepala Sekolah Kedua) untuk melanjutkan pelayanan pendidikan di tengah-tengah masyarakat desa. Sebagai satu-satunya tenaga guru di desa, aktifitas mengajar dilakoni seorang diri pada semua kelas.sampai pada tahun 1987 seorang anak desa selesai menamatkan pendidikanya di Sekolah Pendidikan Guru (SPG) di Ternate dan Kembali ke kampung. Be;iau kemudian diperbantukan di SD INPRES TAWA sebagai tenaga honorer dan mengabdi selama satu tahun selanjutnya kemudian diangkat sebagai Pegawai Negeri Sipil (PNS) pada tahun 1987.\r\nPengabdian Bpk Adolf Lewanmeru di SD INPRES TAWA berakhir pada tahun 1988 karena dipindah-tugaskan ke sekolah lain. Kepindahan Bpk Adolof Lewanmeru ditahun 1988 tidak disertai penempatan tenaga guru ( Kepal Sekolah pengganti) oleh karenanya SD Inpres Tawa Tidak ememiliki kepala sekolah  selama empat tahun. Selama itu aktifitas belajar mengajar hanya di ampuh Oleh satu org tenaga guru,yakni Bpk Apolos Loleo Sampai pada tahun 1992 , SD Inpres Tawa kemudian ditempatkan Bpk. Alex Umhersuny ( Kepala Sekolah ke 3) sebagai pengganti Kepala Sekolah sebelumnya.\r\nPada tahun 1992 saat kepemimpinan Kepala Sekolah Bpk.Alex Umhersuny, Warga Masyarakat dengan inisistif sendiri bersepakat secara swadaya menambah ruang belajar untuk kegiatan belajar mengajar di sekolah. Dari hasil kerja sama itu terbangunlah dua ruang unutk aktifitas pembelajaran di sekolah.\r\nPertamnbahan jumlah penduduk yang kian berkembang dari tahun ketahun memberikan pengaruh terhadap jumlah peserta didik di sekolah oleh karenaya melaluli pemerintah daerah, SD inpres Tawa memperoleh penambahan satu tenaga Guru untuk mengabdi di Desa Tawa. Dengan demikian jumlah tenaga Guru di sekolah menjadi tiga orang. Dalam perjalan waktu sampai pada tahun 1996, Bpk Alex Umhersuny kemudian dipidah-tugaskan ke sekolah lain dan di gantikan olen Ibu. Lenora Louhenapesy ( Kepala Sekolah ke 4).\r\nPeriode kepemimpinan Ibu. L. Louhenapesy ( 1996 s/d 2004) tidak di laksanakan sepenuhnya karena tragedy kemanusiaan di tahun 2000. Akibat peristiwa itu, sang Ibu harus keluar dari tempat pengunsian dan memilih mengikuti keluarga suami dan berpisah meninggalkan anak didiknya di tempat pengungsian sampai pada waktu pemulangan pengungsi ketempat asalnya, SD Inpres Tawa hanya memiliki satu orang Guru tanpa kepala sekolah. Pada akhirnya melalui Pemerintah Kabupaten yang baru di mekarkan pada saat itu, menugaskan dan melantik Bpk Apolos Loleo sebagai Kepala Sekolah(Kepala Sekolah ke 5) SD Ipres Tawa menggantikan Ibu . Lenora Louhenapesy di tahun 2004.\r\nSebagai putera daerah(anak kampung), Bpk.Apolos Loleo merupakan penjabat Kepala Sekolah terlama yaitu 10 tahun ( 2004 s/d 2014). Pada periode ini, SD Inpres Tawa memperoleh penambahan tiga gedung dengan tujuh ruang belajar dari Pemerintah Daerah. Selain itu ,dalam periode ini pula SD Inpres Tawa cukup memiliki tenaga pendidik baik honorer maupun PNS. Kemudian pada tahun 2014 beliau di gantikan oleh Ibu. Lolita.P.Lewanmeru ( Putri pertama Bpk . Adolof Lewanmeru)\r\nSaat periode kepempinan Ibu Lolita (Kepela Sekolah ke 6), SD Inpres Tawa mengalami perubahan nomenklatur terkait perubahan status dan identitas sekolah dari SD Inpres Tawa menjadi SD Negeri 193 Hal-Sel di tahun 2017. Selain itu pada periode ini pula status akreditasi sekolah diperoleh kategori “A” oleh Badan Akreditasi Nasional ( BAN SM ) di tahun 2016. pada tahun 2022, Ibu Lolita.P. Lewanmeru SP.SD kemudian dipindah-tugaskan ke sekolah lain dan digantikan oleh Bpk Apolos Loleo. Tetapi karena kondisi Kesehatan yang bersangkutan, surat penugasanya kemudian dibatalkandan oleh Badan Kepegawaian Daerah(BKD) kemudian melalui Surat Keputusan yang ditandatangani Bupati Halmahera Selatan, Bpk. Monces Anaktototi,SPd (Kepala Sekolah ke 7)ditugaskan sebagai Pelaksana tugas menggantikan Bpk Apolos Loleo kareana alasan Kesehatan.\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id_siswa` int(30) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `foto` text NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `rombel` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `nisn` varchar(50) NOT NULL,
  `nis` varchar(50) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `agama` varchar(50) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `nama_ibu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_siswa`
--

INSERT INTO `tb_siswa` (`id_siswa`, `nama_siswa`, `tgl_lahir`, `foto`, `tempat_lahir`, `rombel`, `jenis_kelamin`, `nisn`, `nis`, `nik`, `agama`, `nama_ayah`, `nama_ibu`) VALUES
(6, 'Alfa Sean Lonteng', '2023-06-29', 'mv5bodhhy2m5njetztc0oc00mde5lwjimwqtytzk.jpg', 'Palu', 'IPA XII - 3', 'Laki-Laki', '21333423', '20101106063', '1323', 'Budha', 'Julius Altien', 'Yuli Dakka'),
(7, 'Grimonia Tarigan', '2023-06-25', 'nk0zwc4ubm518tbnqt9j.png', 'Medan', 'IPA XII - 1', 'Perempuan', '23342332', '20101106063', '32343232333232', 'Pria', 'Josh', 'Andar'),
(8, 'Ida Bagus', '2023-06-26', '2572610460.webp', 'Bali', 'IPA XII - 2', 'Laki-Laki', '32242342', '4342333', '23143242432', 'Hindu', 'Jajang', 'Marni'),
(9, 'Juliansyah', '2023-07-02', 'main-blue.png', 'Manado', 'TKJ 1', 'Laki-Laki', '4324234', '53453444442', '13234323', 'Islam', 'Rinu', 'Naru'),
(10, 'Kevin', '2023-07-02', 'user.png', 'Manado', 'IPS XII - 1', 'Laki-Laki', '213132143', '342342333333', '321314324', 'Katolik', 'Rws', 'Xase'),
(11, 'Rizky', '2023-07-03', 'tlat_payoffposter_ph_id_d335e44b.jpeg', 'Jakarta', 'IPS XII - 2', 'Laki-Laki', '23342332', '53453444442', '32343232333232', 'Islam', 'Rinu', 'Xase'),
(12, 'Aldy', '2023-06-25', 'MV5BYTUxYjczMWUtYzlkZC00NTcwLWE3ODQtN2I2YTIxOTU0ZTljXkEyXkFqcGdeQXVyMTkxNjUyNQ@@._V1_FMjpg_UX1000_.jpg', 'Manado', 'IPA XII - 3', 'Laki-Laki', '23342332', '53453444442', '23143242432', 'Islam', 'Rinu', 'Andar');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tb_berita`
--
ALTER TABLE `tb_berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indeks untuk tabel `tb_danabos`
--
ALTER TABLE `tb_danabos`
  ADD PRIMARY KEY (`id_danabos`);

--
-- Indeks untuk tabel `tb_event`
--
ALTER TABLE `tb_event`
  ADD PRIMARY KEY (`id_event`);

--
-- Indeks untuk tabel `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indeks untuk tabel `tb_kalender`
--
ALTER TABLE `tb_kalender`
  ADD PRIMARY KEY (`id_kalender`);

--
-- Indeks untuk tabel `tb_kontak`
--
ALTER TABLE `tb_kontak`
  ADD PRIMARY KEY (`id_kontak`);

--
-- Indeks untuk tabel `tb_sejarah`
--
ALTER TABLE `tb_sejarah`
  ADD PRIMARY KEY (`id_sejarah`);

--
-- Indeks untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_berita`
--
ALTER TABLE `tb_berita`
  MODIFY `id_berita` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_danabos`
--
ALTER TABLE `tb_danabos`
  MODIFY `id_danabos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_event`
--
ALTER TABLE `tb_event`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_guru`
--
ALTER TABLE `tb_guru`
  MODIFY `id_guru` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tb_kalender`
--
ALTER TABLE `tb_kalender`
  MODIFY `id_kalender` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_kontak`
--
ALTER TABLE `tb_kontak`
  MODIFY `id_kontak` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_sejarah`
--
ALTER TABLE `tb_sejarah`
  MODIFY `id_sejarah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id_siswa` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
