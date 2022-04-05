-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Jan 2022 pada 11.10
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quotation`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_currency`
--

CREATE TABLE `ms_currency` (
  `id_currency` int(11) NOT NULL,
  `code_currency` varchar(30) NOT NULL,
  `rate_currency` float(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ms_currency`
--

INSERT INTO `ms_currency` (`id_currency`, `code_currency`, `rate_currency`) VALUES
(1, 'IDR', 1.00),
(2, 'SGD', 10461.45),
(3, 'USD', 14273.24),
(4, 'YUAN', 2244.93),
(5, 'GBP', 18940.16);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_customer`
--

CREATE TABLE `ms_customer` (
  `id_cust` varchar(20) NOT NULL,
  `nama_cust` varchar(30) NOT NULL,
  `perusahaan_cust` varchar(30) NOT NULL,
  `alamat_cust` varchar(50) NOT NULL,
  `area_cust` varchar(20) NOT NULL,
  `telepon_cust` varchar(20) NOT NULL,
  `email_cust` varchar(100) NOT NULL,
  `custqq_code` varchar(10) DEFAULT NULL,
  `custqq_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ms_customer`
--

INSERT INTO `ms_customer` (`id_cust`, `nama_cust`, `perusahaan_cust`, `alamat_cust`, `area_cust`, `telepon_cust`, `email_cust`, `custqq_code`, `custqq_name`) VALUES
('ABC123', 'CHRISTIANO RONALDO', 'PT. MAJU TERUS', 'TYTYAN KENCANA A1 NO. 8', 'BEKASI UTARA', '081283264650', 'christian@majuterus.co.id', 'asdaw123', ''),
('CS-01-A1', 'CHRISTIAN', 'PT. MAJU TERUS', 'TYTYAN KENCANA A1 NO. 8', 'BEKASI UTARA', '081283264650', 'christian@majuterus.co.id', '', ''),
('CS-02-B2', 'NATANAEL', 'PT. PANTANG MUNDUR', 'TYTYAN KENCANA A1 NO. 5', 'BEKASI TIMUR', '081234124565', 'natanael@pantangmundur.co.id', '', ''),
('CS-03-C3', 'OLESA', 'PT. ABADI JAYA', 'TYTYAN KENCANA A1 NO. 2', 'BEKASI SELATAN', '081234567789', 'olesa@abadijaya.co.id', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_item`
--

CREATE TABLE `ms_item` (
  `id_item` varchar(8) NOT NULL,
  `detail_item` varchar(255) NOT NULL,
  `harga_item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ms_item`
--

INSERT INTO `ms_item` (`id_item`, `detail_item`, `harga_item`) VALUES
('ITEM001', 'DETAIL ITEM 1', 100000),
('ITEM002', 'DETAIL ITEM 2', 200000),
('ITEM003', 'DETAIL ITEM 3', 300000),
('ITEM004', 'DETAIL ITEM 4', 400000),
('ITEM005', 'DETAIL ITEM 5', 500000),
('ITEM006', 'DETAIL ITEM 6', 600000),
('ITEM007', 'DETAIL ITEM 7', 700000),
('ITEM008', 'DETAIL ITEM 8', 800000),
('ITEM009', 'DETAIL ITEM 9', 900000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_jabatan`
--

CREATE TABLE `ms_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_sales`
--

CREATE TABLE `ms_sales` (
  `id_sales` varchar(10) NOT NULL,
  `nama_sales` varchar(30) NOT NULL,
  `telepon_sales` varchar(20) NOT NULL,
  `email_sales` varchar(100) NOT NULL,
  `tipe_sales` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ms_sales`
--

INSERT INTO `ms_sales` (`id_sales`, `nama_sales`, `telepon_sales`, `email_sales`, `tipe_sales`) VALUES
('PM-01-A1', 'SUNARTA', '081218889295', 'sunarta@trafoindo.co.id', 1),
('PM-02-B2', 'ANWAR', '081218889295', 'anwar@trafoindo.co.id', 2),
('PM-03-C3', 'JOKO', '081218889295', 'joko@trafoindo.co.id', 1),
('PM-04-D4', 'SUNARTA', '081218889295', 'sunarta@trafoindo.co.id', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_salestype`
--

CREATE TABLE `ms_salestype` (
  `id_salestype` int(11) NOT NULL,
  `salestype` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ms_salestype`
--

INSERT INTO `ms_salestype` (`id_salestype`, `salestype`) VALUES
(1, 'BUMN'),
(2, 'SWASTA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_segmen`
--

CREATE TABLE `ms_segmen` (
  `id_segment` int(11) NOT NULL,
  `segment` varchar(20) NOT NULL,
  `sub_segment` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ms_segmen`
--

INSERT INTO `ms_segmen` (`id_segment`, `segment`, `sub_segment`) VALUES
(1, 'Segment 1', 'Sub Segment A'),
(2, 'Segment 1', 'Sub Segment B'),
(3, 'Segment 1', 'Sub Segment C'),
(4, 'Segment 2', 'Sub Segment D'),
(5, 'Segment 2', 'Sub Segment E'),
(6, 'Segment 2', 'Sub Segment F'),
(7, 'Segment 3', 'Sub Segment G'),
(8, 'Segment 3', 'Sub Segment H'),
(9, 'Segment 3', 'Sub Segment I');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_segment`
--

CREATE TABLE `ms_segment` (
  `id_segment` int(11) NOT NULL,
  `segment` varchar(20) NOT NULL,
  `sub_segment` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ms_segment`
--

INSERT INTO `ms_segment` (`id_segment`, `segment`, `sub_segment`) VALUES
(1, 'SEGMENT 1', 'SUB SEGMENT A'),
(2, 'SEGMENT 1', 'SUB SEGMENT B'),
(3, 'SEGMENT 1', 'SUB SEGMENT C'),
(4, 'SEGMENT 2', 'SUB SEGMENT D'),
(5, 'SEGMENT 2', 'SUB SEGMENT E'),
(6, 'SEGMENT 2', 'SUB SEGMENT F'),
(7, 'SEGMENT 3', 'SUB SEGMENT G'),
(8, 'SEGMENT 3', 'SUB SEGMENT H'),
(9, 'SEGMENT 3', 'SUB SEGMENT I');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_status`
--

CREATE TABLE `ms_status` (
  `id_status` int(11) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ms_status`
--

INSERT INTO `ms_status` (`id_status`, `status`) VALUES
(1, 'Open'),
(2, 'Waiting For Approval'),
(3, 'Approve'),
(4, 'Reject'),
(5, 'Print'),
(6, 'Revisi'),
(7, 'Create SO');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_top`
--

CREATE TABLE `ms_top` (
  `kode_top` varchar(6) NOT NULL,
  `desc_top` varchar(100) NOT NULL,
  `status_top` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ms_top`
--

INSERT INTO `ms_top` (`kode_top`, `desc_top`, `status_top`) VALUES
('TOP01', '30% uang muka paling lambat 1 minggu setelah invoice diterima', 1),
('TOP02', '70% sebelum penyerahan barang', 1),
('TOP03', '50% potongan pembelian lebih dari 5 unit', 2),
('TOP04', '25% potongan', 1),
('TOP05', 'DISCOUNT 90%', 2),
('TOP17', 'Other', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_user`
--

CREATE TABLE `ms_user` (
  `id_user` varchar(20) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `jk_user` varchar(20) NOT NULL,
  `telp_user` varchar(20) NOT NULL,
  `divisi` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `hak_akses` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto_emp` text NOT NULL,
  `status_user` varchar(20) NOT NULL,
  `id_adm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ms_user`
--

INSERT INTO `ms_user` (`id_user`, `nama_user`, `jk_user`, `telp_user`, `divisi`, `jabatan`, `alamat`, `hak_akses`, `password`, `foto_emp`, `status_user`, `id_adm`) VALUES
('Leader001', 'Admin', 'Laki-Laki', '0123456789', 'Sales', 'Leader Sales', 'Bekasi Utara', 'Leader', 'admin', 'foto11111.jpg', 'Aktif', 1),
('Staff002', 'Staff', 'Laki-Laki', '0987654321', 'Sales', 'Staff Sales', 'Bekasi Timur', 'Staff', 'staff', 'foto22222.jpg', 'Aktif', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `multi_user`
--

CREATE TABLE `multi_user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction`
--

CREATE TABLE `transaction` (
  `transid` varchar(20) NOT NULL,
  `transdate` date NOT NULL,
  `id_status` int(2) NOT NULL,
  `id_cust` varchar(20) NOT NULL,
  `nama_cust` varchar(50) NOT NULL,
  `perusahaan_cust` varchar(50) NOT NULL,
  `alamat_cust` varchar(100) NOT NULL,
  `area_cust` varchar(50) NOT NULL,
  `telepon_cust` varchar(20) NOT NULL,
  `email_cust` varchar(50) NOT NULL,
  `custqq_code` varchar(20) DEFAULT NULL,
  `custqq_name` varchar(50) DEFAULT NULL,
  `id_sales` varchar(20) NOT NULL,
  `nama_sales` varchar(50) NOT NULL,
  `telepon_sales` varchar(20) NOT NULL,
  `email_sales` varchar(50) NOT NULL,
  `project_cust` varchar(255) NOT NULL,
  `segment` varchar(20) NOT NULL,
  `sub_segment` varchar(20) NOT NULL,
  `ppn` float(5,2) NOT NULL,
  `delivery_date` date NOT NULL,
  `id_currency` int(2) NOT NULL,
  `rate_currency` float(7,2) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `keterangan` text NOT NULL,
  `atasan_app` int(11) NOT NULL,
  `status_app` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaction`
--

INSERT INTO `transaction` (`transid`, `transdate`, `id_status`, `id_cust`, `nama_cust`, `perusahaan_cust`, `alamat_cust`, `area_cust`, `telepon_cust`, `email_cust`, `custqq_code`, `custqq_name`, `id_sales`, `nama_sales`, `telepon_sales`, `email_sales`, `project_cust`, `segment`, `sub_segment`, `ppn`, `delivery_date`, `id_currency`, `rate_currency`, `tgl_pengajuan`, `keterangan`, `atasan_app`, `status_app`) VALUES
('0001/PEN/I/2022', '2022-01-05', 1, 'ABC123', 'CHRISTIANO RONALDO', 'PT. MAJU TERUS', 'TYTYAN KENCANA A1 NO. 8', 'BEKASI UTARA', '081283264650', 'christian@majuterus.co.id', '', '', 'PM-01-A1', 'SUNARTA', '081218889295', 'sunarta@trafoindo.co.id', '', '', '', 10.00, '2022-01-06', 1, 1.00, '0000-00-00', '', 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction_rev`
--

CREATE TABLE `transaction_rev` (
  `transid_rev` varchar(20) NOT NULL,
  `revisi` int(11) NOT NULL,
  `transid` varchar(20) NOT NULL,
  `transdate` date NOT NULL,
  `id_status` int(2) NOT NULL,
  `id_cust` varchar(20) NOT NULL,
  `nama_cust` varchar(50) NOT NULL,
  `perusahaan_cust` varchar(50) NOT NULL,
  `alamat_cust` varchar(100) NOT NULL,
  `area_cust` varchar(50) NOT NULL,
  `telepon_cust` varchar(20) NOT NULL,
  `email_cust` varchar(50) NOT NULL,
  `custqq_code` varchar(20) DEFAULT NULL,
  `custqq_name` varchar(50) DEFAULT NULL,
  `id_sales` varchar(20) NOT NULL,
  `nama_sales` varchar(50) NOT NULL,
  `telepon_sales` varchar(20) NOT NULL,
  `email_sales` varchar(50) NOT NULL,
  `ppn` float(5,2) NOT NULL,
  `delivery_date` date NOT NULL,
  `id_currency` int(2) NOT NULL,
  `rate_currency` float(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `trx_item`
--

CREATE TABLE `trx_item` (
  `id_item` varchar(10) NOT NULL,
  `transid` varchar(20) NOT NULL,
  `id_cust` varchar(20) NOT NULL,
  `nama_item` varchar(30) NOT NULL,
  `type_item` varchar(50) NOT NULL,
  `detail_item` varchar(255) NOT NULL,
  `harga_item` int(11) NOT NULL,
  `qty_item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `trx_item`
--

INSERT INTO `trx_item` (`id_item`, `transid`, `id_cust`, `nama_item`, `type_item`, `detail_item`, `harga_item`, `qty_item`) VALUES
('ITEM001', '0001/PEN/I/2022', 'ABC123', 'TRANSFORMATOR DISTRIBUSI', 'Hermetically Sealed', 'DETAIL 1', 111, 1),
('ITEM002', '0001/PEN/I/2022', 'ABC123', 'TRANSFORMATOR DISTRIBUSI', 'Hermetically Sealed', 'DETAIL 2', 222, 2),
('ITEM003', '0001/PEN/I/2022', 'ABC123', 'TRANSFORMATOR DISTRIBUSI', 'Hermetically Sealed', 'DETAIL 3', 333, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `trx_item_rev`
--

CREATE TABLE `trx_item_rev` (
  `id_item` int(11) NOT NULL,
  `kode_item` varchar(20) NOT NULL,
  `transid` varchar(20) NOT NULL,
  `revisi` int(11) NOT NULL,
  `transid_rev` varchar(20) NOT NULL,
  `id_cust` varchar(20) NOT NULL,
  `nama_item` varchar(30) NOT NULL,
  `type_item` varchar(50) NOT NULL,
  `detail_item` varchar(255) NOT NULL,
  `harga_item` int(11) NOT NULL,
  `qty_item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `trx_top`
--

CREATE TABLE `trx_top` (
  `id_top` int(11) NOT NULL,
  `transid` varchar(20) NOT NULL,
  `kode_top` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `trx_top`
--

INSERT INTO `trx_top` (`id_top`, `transid`, `kode_top`) VALUES
(1, '0001/PEN/I/2022', 'TOP01'),
(2, '0001/PEN/I/2022', 'TOP17'),
(3, '0001/PEN/I/2022', 'TOP05'),
(4, '0001/PEN/I/2022', 'TOP04'),
(5, '0001/PEN/I/2022', 'TOP03'),
(6, '0001/PEN/I/2022', 'TOP02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `trx_top_rev`
--

CREATE TABLE `trx_top_rev` (
  `id_top` int(11) NOT NULL,
  `transid` varchar(20) NOT NULL,
  `revisi` int(11) NOT NULL,
  `transid_rev` varchar(20) NOT NULL,
  `kode_top` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `ms_currency`
--
ALTER TABLE `ms_currency`
  ADD PRIMARY KEY (`id_currency`);

--
-- Indeks untuk tabel `ms_customer`
--
ALTER TABLE `ms_customer`
  ADD PRIMARY KEY (`id_cust`);

--
-- Indeks untuk tabel `ms_item`
--
ALTER TABLE `ms_item`
  ADD PRIMARY KEY (`id_item`);

--
-- Indeks untuk tabel `ms_jabatan`
--
ALTER TABLE `ms_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `ms_sales`
--
ALTER TABLE `ms_sales`
  ADD PRIMARY KEY (`id_sales`);

--
-- Indeks untuk tabel `ms_salestype`
--
ALTER TABLE `ms_salestype`
  ADD PRIMARY KEY (`id_salestype`);

--
-- Indeks untuk tabel `ms_segmen`
--
ALTER TABLE `ms_segmen`
  ADD PRIMARY KEY (`id_segment`);

--
-- Indeks untuk tabel `ms_segment`
--
ALTER TABLE `ms_segment`
  ADD PRIMARY KEY (`id_segment`);

--
-- Indeks untuk tabel `ms_status`
--
ALTER TABLE `ms_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indeks untuk tabel `ms_top`
--
ALTER TABLE `ms_top`
  ADD PRIMARY KEY (`kode_top`);

--
-- Indeks untuk tabel `ms_user`
--
ALTER TABLE `ms_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `multi_user`
--
ALTER TABLE `multi_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transid`);

--
-- Indeks untuk tabel `transaction_rev`
--
ALTER TABLE `transaction_rev`
  ADD PRIMARY KEY (`transid_rev`);

--
-- Indeks untuk tabel `trx_item`
--
ALTER TABLE `trx_item`
  ADD PRIMARY KEY (`id_item`);

--
-- Indeks untuk tabel `trx_item_rev`
--
ALTER TABLE `trx_item_rev`
  ADD PRIMARY KEY (`id_item`);

--
-- Indeks untuk tabel `trx_top`
--
ALTER TABLE `trx_top`
  ADD PRIMARY KEY (`id_top`);

--
-- Indeks untuk tabel `trx_top_rev`
--
ALTER TABLE `trx_top_rev`
  ADD PRIMARY KEY (`id_top`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `ms_currency`
--
ALTER TABLE `ms_currency`
  MODIFY `id_currency` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `ms_jabatan`
--
ALTER TABLE `ms_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ms_salestype`
--
ALTER TABLE `ms_salestype`
  MODIFY `id_salestype` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `ms_segmen`
--
ALTER TABLE `ms_segmen`
  MODIFY `id_segment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `ms_segment`
--
ALTER TABLE `ms_segment`
  MODIFY `id_segment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `ms_status`
--
ALTER TABLE `ms_status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `multi_user`
--
ALTER TABLE `multi_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `trx_item_rev`
--
ALTER TABLE `trx_item_rev`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `trx_top`
--
ALTER TABLE `trx_top`
  MODIFY `id_top` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `trx_top_rev`
--
ALTER TABLE `trx_top_rev`
  MODIFY `id_top` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
