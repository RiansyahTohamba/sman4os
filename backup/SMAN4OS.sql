-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Inang: localhost
-- Waktu pembuatan: 23 Agu 2013 pada 09.14
-- Versi Server: 5.5.27
-- Versi PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `SMAN4OS`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `Admin`
--

CREATE TABLE IF NOT EXISTS `Admin` (
  `Id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `Username_admin` char(50) NOT NULL,
  `Password_admin` char(40) NOT NULL,
  `Email_admin` char(250) NOT NULL,
  `Akses_admin` tinyint(4) NOT NULL,
  PRIMARY KEY (`Id_admin`),
  UNIQUE KEY `Username_admin` (`Username_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `Admin`
--

INSERT INTO `Admin` (`Id_admin`, `Username_admin`, `Password_admin`, `Email_admin`, `Akses_admin`) VALUES
(1, 'Riansyah', 'Allahesa', 'mriansyah93@gmail.com', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `Artikel`
--

CREATE TABLE IF NOT EXISTS `Artikel` (
  `Id_artikel` int(20) NOT NULL AUTO_INCREMENT,
  `Judul_artikel` char(250) NOT NULL,
  `Isi_artikel` varchar(10000) NOT NULL,
  `Waktu_artikel` datetime NOT NULL,
  `Id_artikel_teks` varchar(200) NOT NULL,
  `Kategori_artikel` varchar(300) DEFAULT NULL,
  `View_artikel` int(11) NOT NULL DEFAULT '0',
  `Commcount_artikel` int(11) NOT NULL DEFAULT '0',
  `Gambar_artikel` varchar(300) NOT NULL,
  PRIMARY KEY (`Id_artikel`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data untuk tabel `Artikel`
--

INSERT INTO `Artikel` (`Id_artikel`, `Judul_artikel`, `Isi_artikel`, `Waktu_artikel`, `Id_artikel_teks`, `Kategori_artikel`, `View_artikel`, `Commcount_artikel`, `Gambar_artikel`) VALUES
(1, 'Network Scanning', 'Network scanning adalah sebuah teknik yang digunakan untuk melakukan\nscanning pada sebuah jaringan, teknik ini digunakan untuk mendapatkan\ndata,ip,Port,file data yang keluar masuk melalui jaringan, dll. Probing adalah\nsuatu usaha untuk mengakses system atau mendapatkan informasi tentang\nsistem.\nServer bertugas untuk melayani client dengan menyediakan service yang\ndibutuhkan. Server menyediakan service dengan bermacam-macam\nkemampuan, baik untuk local maupun remote.Server listening pada suatu port\ndan menunggu incomning connection ke port.Koneksi bisa berupa local maupun\nremote.\nPort sebenarnya suatu alamat pada stack jaringan kernel,sebagai cara dimana\ntransport layer mengelola koneksi dan melakukan pertukaran data antar\ncomputer. Port yang terbuk amempunyai resikoterkait dengan exploit. Perlu\ndikelola port mana yang perlu dibukadan yang ditutup untuk mengurangi resiko\nterhadap exploit.\nAda beberapa utility yang bisa dipakai untuk melakukan diagnose terhadap\nsystem service dan port kita. Utility ini melakukan scanning terhadap system\nuntukmencari port mana saja yang terbuka, ada jugasekaligus memberikan\nlaporan kelemahan system jika port ini terbuka.\nPort scanner merupakan program yang didesain untuk melakukan layanan\n(service) apa saja yang dijalankan pada host jaringan, untuk mendapatkan akses\nke host, cracker harus mengetahui titik-titik kelemahan yang ada. Sebagai\ncontoh, apabila cracker sudah mengetahui bahwa host menjalankan proses ftp\nserver, ia dapa tmenggunakan kelemahan-kelemahan yang ada pada ftp server\nuntuk mendapatkan akses. Dari bagian ini kita dapat mengambil kesimpulan\nbahwa\nlayanan-layanan\nyang\ntidak\nbenar-benar\ndiperlukan\nsebaiknyadihilangkan\nuntuk\nmemperkecil\nresiko\nkeamanan\nyang\nmungkinterjadi.', '2013-08-14 05:05:22', 'Network_scanning', 'Jaringan Komputer', 0, 4, ''),
(2, 'Tool Network Scanning', 'NMAP\nNmap adalah sebuah tool open source yang powerfull untuk mengaudit\nkemanan dan eksplorasi jaringan.Dengan menggunakan nmap kita dapat melihat\nhost yang aktif, port yang terbuka, system operasi yang digunakan dan feature-\nfeature scanning lainnya.\nState pada nmap adalah open, filtered, dan unfiltered. open berarti mesin target\ndapat menerima koneksi pada port tersebut. Filtered berarti ada sebuah firewall,\npacket-filter atau device jaringan yang menghalangi port danmencegah nmap\nuntuk menentukan port yang terbuka, unfiltered berarti port yang diketahui oleh\nnmap tertutup dan tidak ada firewall atau packet-filter yang menutupi\nNESSUS\nNessus merupakansuatu tools yang powerfull untuk melihat kelemahan port\nyang ada pada computer kita dan computer lain. Nessus akan memberikan\nreport secara lengkap apa kelemahan computer kita dan bagaimana cara\nmengatasinya.\nPercobaan\n1. Jalankan netstat dan gunakan option berikut :\n> Netstat -a\n> Netstat -e\n> Netstat -n\n> Netstat -o\n> Netstat -s\n> Netstat -r\n> Netstat -p\n> Netstat -tpane\n> Netstat –tupne\n> Netstat –au\nApa hasil yang di dapat ?', '2012-09-19 05:05:22', 'Tool_Network_Scanning', 'Jaringan Komputer', 0, 0, ''),
(3, 'Prosedur', 'Jaringan Komputer merupakan kumpulan Jaringan Komputer yang saling terhubung dan bgitulah halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo ', '2013-08-23 05:05:22', 'Prosedur', 'Algoritma', 0, 3, ''),
(4, 'Metasploit', 'Dasar Teori\nMetasploit adalah sebuah penetration tools yang dibuat dengan bahasa\nruby, digunakan untuk mengeksploitasi kelemahan suatu system atau\nsoftware. Digunakan oleh profesional keamanan jaringan untuk\nmelakukan test penetrasi, administrator untuk memverifikasi instalasi\npacth dan lain-lain. Metasploit bisa digunakan untuk penetrasi ke\nsebuah system windows, linux, dan mac.\nExploit\nadalah sarana yang biasa digunakan oleh seorang attacker atau\npenetrasi keamanan. Memanfaatkan kelemahan-kelemahan yang\ndiakibatkan oleh cacat pada sistem, aplikasi atau pun layanan. Hacker\nmenggunakan kode exploit untuk melakukan serangan.Payload\nAdalah kode yang yang kita ingin dieksekusi atau dijalankan oleh\nsistem dan yang akan dipilih untuk dikirimkan oleh framework.\nMetasploit memiliki berbagai jenis payload, tiap payload memiliki\nfungsi yang berbeda di metasploit\nBeberapa Tipe – tipe payload\n> Inline\nPayload yang berisi exploits dan shellcode yang lengkap.\nPayload inline di design lebih stabil dibandingkan payload\nlainnya karena mengandung semuanya dalam satu.\n> Staged\nMembentuk saluran komunikasi antara penyerang dan korban\n> Meterpreter\nFitur dari metasploit yang menggunakan injeksi DDL untuk\nberkomunikasi melalui socket, bekerja pada sisi klien dengan\nmeyediakan lingkungan yang kuat untuk berkomunikasi, untuk\nmentrasfer file.\n> PassiveX\nAdalah payloads yang dapat membantu meghindari firewall.\nBeberapa fungsi payload\n> Win32_adduser : menambah user pada system korban\n> Win32_bind : masuk ke shell korban\n> Win32_bind/meterpreter : exploitasi dengan menjalankan\nmeterpreter\n> reverse_Shell : payload yang membuat koneksi dari mesin target\nkepenyerang sebagai Windows command prompt.> bind_shell : payload untuk dapat mengikat command prompt\nagar tetap dapat melihat port pada komputer target, sehingga\npenyerang dapat terhubung.\nShellcode\nAdalah perintah-perintah yang digunakan sebagai payload ketika\nmelakukan eksploitasi\nModule\nAdalah bagian dari aplikasi yang dapat digunakan oleh metasploit\nframework. Modul dibutuhkan untuk dapat melakukan serangan atau\nscanning.\nListener\nAdalah komponen dari metasploit yang berguna merespon koneksi\ndari komputer target\n', '2013-07-02 05:05:22', 'Metasploit', 'Jaringan Komputer', 0, 0, ''),
(5, 'Matematika', 'Jaringan Komputer merupakan kumpulan Jaringan Komputer yang saling terhubung dan bgitulah halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo ', '2013-07-23 18:05:22', 'Matematika', 'Umum', 0, 0, ''),
(6, 'Jaringan Komputer 6', 'Jaringan Komputer 6 merupakan kumpulan Jaringan Komputer yang saling terhubung dan bgitulah halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo ', '2013-07-23 05:05:22', 'Jaringan_Komputer_6', 'Jaringan Komputer', 0, 0, ''),
(7, 'Algoritma Dan Pemograman 1', 'Algoritma merupakan ilmus menyelesaikan solusi merupakan kumpulan Jaringan Komputer yang saling terhubung dan bgitulah halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo ', '2013-07-02 05:05:22', 'Algoritma_Dan_Pemograman_1', 'Algoritma', 0, 0, ''),
(8, 'Matematika 2', 'Jaringan Komputer merupakan kumpulan Jaringan Komputer yang saling terhubung dan bgitulah halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo ', '2013-07-23 18:05:22', 'Matematika_2', 'Umum', 0, 0, ''),
(9, 'Matematika 27', 'Jaringan Komputer merupakan kumpulan Jaringan Komputer yang saling terhubung dan bgitulah halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo ', '2013-07-23 18:05:22', 'Matematika_27', 'Umum', 0, 0, ''),
(10, 'Algoritma Sequence', 'Algoritma Sequence merupakan kumpulan Jaringan Komputer yang saling terhubung dan bgitulah halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo ', '2013-07-02 05:05:22', 'Algoritma_Sequence', 'Algoritma', 0, 0, ''),
(11, 'Algoritma percabangan', 'Jaringan Komputer merupakan "kumpulan" Jaringan Komputer yang saling terhubung dan bgitulah halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo ', '2013-07-09 05:05:22', 'Algoritma_percabangan', 'Algoritma', 0, 0, ''),
(12, 'Struktur Kontrol Perulangan', 'Jaringan Komputer merupakan "kumpulan" Jaringan Komputer yang saling terhubung dan bgitulah halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo ', '2013-07-09 05:05:22', 'Struktur_Kontrol_Perulangan', 'Algoritma', 0, 0, ''),
(14, 'Fungsi', 'Fungsi merupakan sekumpulan baris yang mengerjakan suatu tugas tertentu. Fungsi dibuat agar program dapat tersusun secara sistematis dan baris kodenya dapat digunakan berulang-ulang', '2013-07-02 05:05:22', 'Fungsi', 'Algoritma', 0, 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `Captcha`
--

CREATE TABLE IF NOT EXISTS `Captcha` (
  `Id_captcha` bigint(20) NOT NULL AUTO_INCREMENT,
  `Time_captcha` int(11) NOT NULL DEFAULT '0',
  `Ip_captcha` varchar(16) NOT NULL,
  `Word_captcha` varchar(20) NOT NULL,
  PRIMARY KEY (`Id_captcha`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data untuk tabel `Captcha`
--

INSERT INTO `Captcha` (`Id_captcha`, `Time_captcha`, `Ip_captcha`, `Word_captcha`) VALUES
(29, 1377176114, '127.0.0.1', 'Kecut029'),
(30, 1377176244, '127.0.0.1', 'Teh029'),
(31, 1377176244, '127.0.0.1', 'Pisang019');

-- --------------------------------------------------------

--
-- Struktur dari tabel `Komentar`
--

CREATE TABLE IF NOT EXISTS `Komentar` (
  `Id_komentar` int(20) NOT NULL AUTO_INCREMENT,
  `Nama_komentar` char(250) NOT NULL,
  `Email_komentar` char(255) NOT NULL,
  `Isi_komentar` varchar(1000) NOT NULL,
  `Waktu_komentar` datetime NOT NULL,
  `Approve_komentar` tinyint(4) NOT NULL,
  `Id_artikel` int(20) NOT NULL,
  PRIMARY KEY (`Id_komentar`),
  KEY `Id_artikel` (`Id_artikel`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data untuk tabel `Komentar`
--

INSERT INTO `Komentar` (`Id_komentar`, `Nama_komentar`, `Email_komentar`, `Isi_komentar`, `Waktu_komentar`, `Approve_komentar`, `Id_artikel`) VALUES
(1, 'Riansyah', 'mriansyah93@gmail.com', 'wah wah mantap ini blog...', '2013-08-09 07:10:23', 1, 1),
(22, 'riansyah', 'rahangkeras@yahoo.co.id', 'mantappp', '2013-08-19 07:33:35', 1, 1),
(23, 'riansyah', 'mriansyah93@gmail.com', 'keren', '2013-08-19 07:33:46', 1, 1),
(24, 'rian', 'rahangkeras@yahoo.co.id', 'haloo kawan  :lol:  :lol:', '2013-08-19 10:57:26', 1, 3),
(25, 'rian', 'mriansyah93@gmail.com', ' :cheese:  :cheese: mantap', '2013-08-19 10:59:59', 1, 3),
(26, 'rian', 'mriansyah93@gmail.com', 'helo', '2013-08-20 09:02:49', 1, 1),
(27, 'riansyah', 'rahangkeras@yahoo.co.id', ' :wow: :wow: :wow: top kawan!!', '2013-08-20 09:05:56', 1, 3);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `Komentar`
--
ALTER TABLE `Komentar`
  ADD CONSTRAINT `Komentar_ibfk_1` FOREIGN KEY (`Id_artikel`) REFERENCES `Artikel` (`Id_artikel`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
