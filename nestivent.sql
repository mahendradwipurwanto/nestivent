-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Agu 2021 pada 15.20
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nestivent`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `BIDANG_JURI`
--

CREATE TABLE `BIDANG_JURI` (
  `ID` int(11) NOT NULL,
  `KODE_USER` varchar(20) DEFAULT NULL,
  `ID_BIDANG` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `BIDANG_JURI`
--

INSERT INTO `BIDANG_JURI` (`ID`, `KODE_USER`, `ID_BIDANG`) VALUES
(2, 'JRI_DDYHf85', 1),
(3, 'JRI_DMSPfad', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `BIDANG_LOMBA`
--

CREATE TABLE `BIDANG_LOMBA` (
  `ID_BIDANG` int(10) NOT NULL,
  `KODE_KOMPETISI` varchar(100) DEFAULT NULL,
  `TEAM` tinyint(1) NOT NULL DEFAULT 0,
  `MIN_ANGGOTA` int(10) DEFAULT NULL,
  `MAX_ANGGOTA` int(10) DEFAULT NULL,
  `BIDANG_LOMBA` varchar(50) DEFAULT NULL,
  `KETERANGAN` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `BIDANG_LOMBA`
--

INSERT INTO `BIDANG_LOMBA` (`ID_BIDANG`, `KODE_KOMPETISI`, `TEAM`, `MIN_ANGGOTA`, `MAX_ANGGOTA`, `BIDANG_LOMBA`, `KETERANGAN`) VALUES
(1, 'evnt-lo-kreatif-2021-c8b', 1, 2, 5, 'Mobile programming', 'Upload poster, proposal, dan link demo aplikasi mobile'),
(3, 'evnt-lo-kreatif-2021-c8b', 0, NULL, NULL, 'Desain UI/UX', 'Upload desain UI/IX dari suatu aplikasi'),
(4, 'evnt-lo-kreatif-2021-c8b', 1, 1, 5, 'Desain Poster', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `FORM_META`
--

CREATE TABLE `FORM_META` (
  `ID_FORM` int(10) NOT NULL,
  `KEGIATAN` int(11) NOT NULL DEFAULT 1,
  `KODE` varchar(100) DEFAULT NULL,
  `PERTANYAAN` text DEFAULT NULL,
  `TYPE` int(5) DEFAULT NULL,
  `REQUIRED` tinyint(1) NOT NULL DEFAULT 0,
  `KETERANGAN` text DEFAULT NULL,
  `POSISI` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `KRITERIA_PENILAIAN`
--

CREATE TABLE `KRITERIA_PENILAIAN` (
  `ID_KRITERIA` int(10) NOT NULL,
  `ID_TAHAP` int(10) DEFAULT NULL,
  `ID_BIDANG` int(10) DEFAULT NULL,
  `KRITERIA` varchar(50) DEFAULT NULL,
  `KETERANGAN` text DEFAULT NULL,
  `BOBOT` int(10) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `KRITERIA_PENILAIAN`
--

INSERT INTO `KRITERIA_PENILAIAN` (`ID_KRITERIA`, `ID_TAHAP`, `ID_BIDANG`, `KRITERIA`, `KETERANGAN`, `BOBOT`) VALUES
(1, 1, 1, 'Kreativitas', 'Mantabs', 25),
(2, 1, 1, 'Ide', NULL, 25),
(3, 1, 1, 'Mood', '', 25),
(5, 1, 1, 'Disiplin', '', 25),
(14, 1, 3, 'Kreativitas', 't', 50),
(15, 1, 3, '', 'e', 50);

-- --------------------------------------------------------

--
-- Struktur dari tabel `LOG_AKTIVITAS`
--

CREATE TABLE `LOG_AKTIVITAS` (
  `ID_LOG` int(10) NOT NULL,
  `RECEIVER_GROUP` int(5) NOT NULL DEFAULT 1,
  `RECEIVER` varchar(20) DEFAULT NULL,
  `SENDER` varchar(20) DEFAULT NULL,
  `TYPE` int(10) DEFAULT NULL,
  `READ` tinyint(1) DEFAULT 0,
  `CREATED_AT` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `LOG_AKTIVITAS`
--

INSERT INTO `LOG_AKTIVITAS` (`ID_LOG`, `RECEIVER_GROUP`, `RECEIVER`, `SENDER`, `TYPE`, `READ`, `CREATED_AT`) VALUES
(1, 1, 'USR_MHND116', 'USR_MHND116', 1, 0, '2021-06-12 06:10:58'),
(2, 1, 'USR_MHND116', 'USR_MHND116', 4, 1, '2021-06-12 06:43:55'),
(3, 1, 'USR_MHND116', 'USR_MHND116', 1, 0, '2021-06-12 06:46:00'),
(4, 1, 'USR_MHND116', 'USR_MHND116', 3, 0, '2021-06-12 06:48:49'),
(5, 1, 'USR_MHND116', 'USR_MHND116', 6, 1, '2021-06-12 06:50:27'),
(6, 1, 'USR_MHND116', 'USR_MHND116', 7, 0, '2021-06-12 06:51:00'),
(7, 1, 'USR_MHND116', 'USR_MHND116', 1, 0, '2021-06-12 06:10:58'),
(8, 1, 'USR_MHND116', 'USR_MHND116', 4, 1, '2021-06-12 06:43:55'),
(9, 1, 'USR_MHND116', 'USR_MHND116', 2, 1, '2021-06-12 06:46:00'),
(10, 1, 'USR_MHND116', 'USR_MHND116', 5, 1, '2021-06-12 06:48:49'),
(11, 1, 'USR_MHND116', 'USR_MHND116', 6, 1, '2021-06-12 06:50:27'),
(12, 1, 'USR_MHND116', 'USR_MHND116', 7, 0, '2021-06-12 06:51:00'),
(13, 1, 'USR_MHND116', 'USR_MHND116', 1, 0, '2021-06-12 06:10:58'),
(14, 1, 'USR_MHND116', 'USR_MHND116', 4, 1, '2021-06-12 06:43:55'),
(15, 1, 'USR_MHND116', 'USR_MHND116', 1, 0, '2021-06-12 06:46:00'),
(16, 1, 'USR_MHND116', 'USR_MHND116', 3, 0, '2021-06-12 06:48:49'),
(17, 1, 'USR_MHND116', 'USR_MHND116', 6, 1, '2021-06-12 06:50:27'),
(18, 1, 'USR_MHND116', 'USR_MHND116', 7, 0, '2021-06-12 06:51:00'),
(19, 1, 'USR_MHND116', 'USR_MHND116', 1, 0, '2021-06-12 06:10:58'),
(20, 1, 'USR_MHND116', 'USR_MHND116', 4, 1, '2021-06-12 06:43:55'),
(21, 1, 'USR_MHND116', 'USR_MHND116', 2, 1, '2021-06-12 06:46:00'),
(22, 1, 'USR_MHND116', 'USR_MHND116', 5, 1, '2021-06-12 06:48:49'),
(23, 1, 'USR_MHND116', 'USR_MHND116', 6, 1, '2021-06-12 06:50:27'),
(28, 1, 'ADM_001', 'ADM_001', 1, 0, '2021-06-12 10:19:24'),
(29, 1, 'ADM_001', 'ADM_001', 1, 0, '2021-06-12 14:45:51'),
(30, 1, 'ADM_001', 'ADM_001', 1, 0, '2021-06-13 05:58:53'),
(33, 1, 'ADM_001', 'ADM_001', 1, 0, '2021-06-14 07:46:54'),
(34, 1, 'ADM_001', 'ADM_001', 1, 0, '2021-06-14 13:49:02'),
(35, 1, 'USR_MHND116', 'USR_MHND116', 1, 0, '2021-06-15 16:02:09'),
(36, 1, 'ADM_001', 'ADM_001', 1, 0, '2021-07-01 06:54:48'),
(37, 1, 'ADM_001', 'ADM_001', 1, 0, '2021-07-01 15:33:48'),
(38, 1, 'ADM_001', 'ADM_001', 1, 0, '2021-07-02 15:15:48'),
(39, 1, 'ADM_001', 'ADM_001', 1, 0, '2021-07-02 20:14:30'),
(40, 1, 'USR_MHND116', 'USR_MHND116', 4, 1, '2021-07-02 20:20:14'),
(41, 1, 'USR_MHND116', 'USR_MHND116', 1, 0, '2021-07-02 20:24:21'),
(42, 1, 'USR_MHND116', 'USR_MHND116', 1, 0, '2021-07-03 06:33:38'),
(43, 1, 'USR_MHND116', 'USR_MHND116', 5, 1, '2021-07-03 06:35:56'),
(44, 1, 'ADM_001', 'ADM_001', 1, 0, '2021-07-03 09:16:33'),
(45, 1, 'ADM_001', 'ADM_001', 1, 0, '2021-07-03 14:58:27'),
(46, 1, 'ADM_001', 'ADM_001', 1, 0, '2021-07-03 19:32:50'),
(47, 1, 'USR_MHND116', 'USR_MHND116', 1, 0, '2021-07-04 05:36:28'),
(48, 1, 'ADM_001', 'ADM_001', 1, 0, '2021-07-04 09:49:40'),
(49, 1, 'ADM_001', 'ADM_001', 1, 0, '2021-07-04 13:31:16'),
(50, 1, 'ADM_001', 'ADM_001', 1, 0, '2021-07-05 07:45:53'),
(51, 1, 'ADM_001', 'ADM_001', 1, 0, '2021-07-05 15:26:31'),
(52, 1, 'ADM_001', 'ADM_001', 1, 0, '2021-07-05 20:11:40'),
(53, 1, 'USR_MHND116', 'USR_MHND116', 1, 0, '2021-07-07 11:58:37'),
(54, 1, 'USR_MHND116', 'USR_MHND116', 5, 1, '2021-07-07 12:30:53'),
(55, 1, 'USR_MHND116', 'USR_MHND116', 1, 0, '2021-07-07 13:10:34'),
(56, 1, 'USR_MHND116', 'USR_MHND116', 1, 0, '2021-07-07 13:33:26'),
(57, 1, 'USR_MHND116', 'USR_MHND116', 1, 0, '2021-07-07 13:51:51'),
(58, 1, 'ADM_001', 'ADM_001', 1, 0, '2021-07-07 13:52:23'),
(59, 1, 'ADM_001', 'ADM_001', 1, 0, '2021-07-07 13:54:24'),
(60, 1, 'ADM_001', 'ADM_001', 1, 0, '2021-07-07 13:59:15'),
(61, 1, 'USR_MHND116', 'USR_MHND116', 1, 0, '2021-07-07 14:19:15'),
(62, 1, 'USR_MHND116', 'USR_MHND116', 5, 1, '2021-07-07 14:33:54'),
(63, 1, 'ADM_001', 'ADM_001', 1, 0, '2021-07-07 14:51:28'),
(64, 1, 'USR_MHND116', 'ADM_001', 9, 1, '2021-07-07 15:11:47'),
(65, 1, 'USR_MHND116', 'USR_MHND116', 1, 0, '2021-07-07 15:13:59'),
(66, 1, 'ADM_001', 'ADM_001', 1, 0, '2021-07-12 20:53:47'),
(67, 1, 'USR_MHND116', 'USR_MHND116', 1, 0, '2021-07-12 20:55:31'),
(68, 1, 'USR_MHND116', 'USR_MHND116', 1, 0, '2021-07-13 06:10:48'),
(69, 3, 'PYL-PK2-M0GM59VYNQ', 'USR_MHND116', 10, 0, '2021-07-13 06:36:35'),
(70, 1, 'USR_MHND116', 'USR_MHND116', 1, 0, '2021-07-13 06:44:14'),
(71, 3, 'PYL-PK2-M0GM59VYNQ', 'USR_MHND116', 10, 0, '2021-07-13 06:44:24'),
(72, 1, 'USR_MHND116', 'USR_MHND116', 1, 0, '2021-07-13 10:59:22'),
(73, 3, 'PYL-PK2-M0GM59VYNQ', 'USR_MHND116', 10, 0, '2021-07-13 11:03:41'),
(74, 1, 'USR_MHND116', 'USR_MHND116', 1, 0, '2021-07-13 14:40:50'),
(75, 1, 'USR_MHND116', 'USR_MHND116', 1, 0, '2021-07-13 14:46:51'),
(76, 3, 'PYL-PK2-M0GM59VYNQ', 'USR_MHND116', 10, 0, '2021-07-13 14:47:06'),
(77, 1, 'ADM_001', 'ADM_001', 1, 0, '2021-07-13 15:30:01'),
(78, 1, 'USR_MHND116', 'USR_MHND116', 1, 0, '2021-07-14 01:48:36'),
(79, 3, 'PYL-PK2-M0GM59VYNQ', 'USR_MHND116', 10, 0, '2021-07-14 01:57:42'),
(80, 1, 'USR_MHND116', 'USR_MHND116', 1, 0, '2021-07-15 16:12:16'),
(81, 3, 'PYL-PK2-M0GM59VYNQ', 'USR_MHND116', 10, 0, '2021-07-15 16:12:35'),
(82, 1, 'USR_MHND116', 'USR_MHND116', 1, 0, '2021-07-16 13:00:26'),
(83, 3, 'PYL-PK2-M0GM59VYNQ', 'USR_MHND116', 10, 0, '2021-07-16 13:00:35'),
(84, 1, 'USR_MHND116', 'USR_MHND116', 1, 0, '2021-07-17 12:17:26'),
(85, 3, 'PYL-PK2-M0GM59VYNQ', 'USR_MHND116', 10, 0, '2021-07-17 12:17:41'),
(86, 3, 'PYL-PK2-M0GM59VYNQ', 'USR_MHND116', 11, 0, '2021-07-17 16:31:05'),
(87, 3, 'PYL-PK2-M0GM59VYNQ', 'USR_MHND116', 11, 0, '2021-07-17 16:35:52'),
(88, 1, 'USR_MHND116', 'USR_MHND116', 1, 0, '2021-07-17 19:39:05'),
(89, 3, 'PYL-PK2-M0GM59VYNQ', 'USR_MHND116', 10, 0, '2021-07-17 19:39:19'),
(90, 3, 'PYL-PK2-M0GM59VYNQ', 'USR_MHND116', 11, 0, '2021-07-17 19:45:15'),
(91, 3, 'PYL-PK2-M0GM59VYNQ', 'USR_MHND116', 11, 0, '2021-07-17 19:54:44'),
(92, 3, 'PYL-PK2-M0GM59VYNQ', 'USR_MHND116', 11, 0, '2021-07-17 19:56:30'),
(93, 3, 'PYL-PK2-M0GM59VYNQ', 'USR_MHND116', 11, 0, '2021-07-17 19:59:19'),
(94, 3, 'PYL-PK2-M0GM59VYNQ', 'USR_MHND116', 11, 0, '2021-07-17 20:02:15'),
(95, 3, 'PYL-PK2-M0GM59VYNQ', 'USR_MHND116', 11, 0, '2021-07-17 20:06:05'),
(96, 3, 'PYL-PK2-M0GM59VYNQ', 'USR_MHND116', 11, 0, '2021-07-17 20:08:34'),
(97, 3, 'PYL-PK2-M0GM59VYNQ', 'USR_MHND116', 11, 0, '2021-07-17 20:18:28'),
(98, 3, 'PYL-PK2-M0GM59VYNQ', 'USR_MHND116', 11, 0, '2021-07-17 20:30:31'),
(99, 3, 'PYL-PK2-M0GM59VYNQ', 'USR_MHND116', 11, 0, '2021-07-17 20:35:34'),
(100, 1, 'ADM_001', 'ADM_001', 1, 0, '2021-07-18 11:49:31'),
(101, 1, 'ADM_001', 'ADM_001', 1, 0, '2021-07-18 12:39:35'),
(102, 1, 'USR_MHND116', 'USR_MHND116', 1, 0, '2021-07-18 13:13:15'),
(103, 3, 'PYL-PK2-M0GM59VYNQ', 'USR_MHND116', 10, 0, '2021-07-18 13:21:09'),
(104, 3, 'PYL-PK2-M0GM59VYNQ', 'USR_MHND116', 10, 0, '2021-07-18 13:52:26'),
(105, 4, 'evnt-stiki-technofes', 'USR_MHND116', 12, 0, '2021-07-18 14:18:26'),
(106, 3, 'PYL-PK2-M0GM59VYNQ', 'USR_MHND116', 10, 0, '2021-07-18 14:25:50'),
(107, 4, 'evnt-stiki-technofes', 'USR_MHND116', 12, 0, '2021-07-18 14:26:16'),
(108, 3, 'PYL-PK2-M0GM59VYNQ', 'USR_MHND116', 10, 0, '2021-07-18 14:56:01'),
(109, 3, 'PYL-PK2-M0GM59VYNQ', 'USR_MHND116', 11, 0, '2021-07-18 15:35:19'),
(110, 4, 'evnt-lo-kreatif-2021', 'USR_MHND116', 12, 0, '2021-07-18 15:36:47'),
(111, 1, 'USR_MHND116', 'USR_MHND116', 1, 0, '2021-07-18 15:43:50'),
(112, 3, 'PYL-PK2-M0GM59VYNQ', 'USR_MHND116', 10, 0, '2021-07-18 15:43:59'),
(113, 4, 'evnt-stiki-technofes', 'USR_MHND116', 12, 0, '2021-07-18 15:44:21'),
(114, 4, 'evnt-stiki-technofes', 'USR_MHND116', 12, 0, '2021-07-18 15:45:18'),
(115, 4, 'evnt-lo-kreatif-2021', 'USR_MHND116', 12, 0, '2021-07-18 15:46:23'),
(116, 3, 'PYL-PK2-M0GM59VYNQ', 'USR_MHND116', 10, 0, '2021-07-18 16:00:36'),
(117, 1, 'ADM_001', 'ADM_001', 1, 0, '2021-07-18 16:01:10'),
(118, 1, 'ADM_001', 'ADM_001', 1, 0, '2021-07-18 16:36:58'),
(119, 1, 'ADM_001', 'ADM_001', 1, 0, '2021-07-19 07:20:30'),
(120, 1, 'USR_MHND116', 'USR_MHND116', 1, 0, '2021-07-19 09:09:33'),
(121, 3, 'PYL-PK2-M0GM59VYNQ', 'USR_MHND116', 10, 0, '2021-07-19 09:09:53'),
(122, 4, 'evnt-stiki-technofes', 'USR_MHND116', 12, 0, '2021-07-19 09:10:09'),
(123, 3, 'PYL-PK2-M0GM59VYNQ', 'USR_MHND116', 10, 0, '2021-07-19 10:49:42'),
(124, 4, 'evnt-lo-kreatif-2021', 'USR_MHND116', 12, 0, '2021-07-19 10:50:15'),
(125, 1, 'USR_MHND116', 'USR_MHND116', 1, 0, '2021-07-20 05:31:29'),
(126, 3, 'PYL-PK2-M0GM59VYNQ', 'USR_MHND116', 10, 0, '2021-07-20 06:12:22'),
(127, 4, 'evnt-lo-kreatif-2021', 'USR_MHND116', 12, 0, '2021-07-20 06:12:56'),
(128, 3, 'PYL-PK2-M0GM59VYNQ', 'USR_MHND116', 10, 0, '2021-07-20 07:41:05'),
(129, 4, 'evnt-stiki-technofes', 'USR_MHND116', 12, 0, '2021-07-20 07:46:57'),
(130, 3, 'PYL-PK2-M0GM59VYNQ', 'USR_MHND116', 10, 0, '2021-07-20 08:08:19'),
(131, 4, 'evnt-lo-kreatif-2021', 'USR_MHND116', 12, 0, '2021-07-20 08:08:43'),
(132, 3, 'PYL-PK2-M0GM59VYNQ', 'USR_MHND116', 10, 0, '2021-07-20 08:09:09'),
(133, 1, 'ADM_001', 'ADM_001', 1, 0, '2021-07-21 01:29:31'),
(134, 1, 'ADM_001', 'ADM_001', 1, 0, '2021-07-21 01:30:07'),
(135, 1, 'USR_MHND116', 'USR_MHND116', 1, 0, '2021-07-21 01:48:45'),
(136, 1, 'USR_MHND67b', 'USR_MHND67b', 2, 0, '2021-07-21 01:50:22'),
(137, 1, 'USR_MHND67b', 'USR_MHND67b', 3, 0, '2021-07-21 01:50:51'),
(138, 1, 'USR_MHND67b', 'USR_MHND67b', 5, 0, '2021-07-21 01:53:19'),
(139, 1, 'ADM_001', 'ADM_001', 1, 0, '2021-07-21 01:54:16'),
(140, 1, '\r\n<div style=', 'ADM_001', 9, 0, '2021-07-21 01:55:51'),
(141, 1, 'USR_MHND116', 'USR_MHND116', 1, 0, '2021-07-21 01:58:28'),
(142, 3, 'PYL-PK2-M0GM59VYNQ', 'USR_MHND116', 10, 0, '2021-07-21 01:58:56'),
(143, 3, 'PYL-PK2-M0GM59VYNQ', 'USR_MHND116', 11, 0, '2021-07-21 02:01:51'),
(144, 4, 'evnt-lo-kreatif-2021', 'USR_MHND116', 12, 0, '2021-07-21 02:03:15'),
(145, 1, 'USR_MHND116', 'USR_MHND116', 1, 0, '2021-07-23 05:52:10'),
(146, 3, 'PYL-PK2-M0GM59VYNQ', 'USR_MHND116', 10, 0, '2021-07-23 05:52:38'),
(147, 4, 'event-online-charity', 'USR_MHND116', 12, 0, '2021-07-23 06:07:56'),
(148, 1, 'USR_MHND116', 'USR_MHND116', 1, 0, '2021-07-23 11:42:47'),
(149, 3, 'PYL-PK2-M0GM59VYNQ', 'USR_MHND116', 10, 0, '2021-07-23 11:42:57'),
(150, 4, 'event-online-charity', 'USR_MHND116', 12, 0, '2021-07-23 11:44:00'),
(151, 1, 'USR_MHND116', 'USR_MHND116', 1, 0, '2021-07-24 11:45:25'),
(152, 3, 'PYL-PK2-M0GM59VYNQ', 'USR_MHND116', 10, 0, '2021-07-24 11:48:33'),
(153, 4, 'event-online-charity', 'USR_MHND116', 12, 0, '2021-07-24 11:49:13'),
(154, 1, 'USR_MHND116', 'USR_MHND116', 1, 0, '2021-07-24 14:16:17'),
(155, 3, 'PYL-PK2-M0GM59VYNQ', 'USR_MHND116', 10, 0, '2021-07-24 14:33:23'),
(156, 3, 'PYL-PK2-M0GM59VYNQ', 'USR_MHND116', 10, 0, '2021-07-24 14:33:43'),
(157, 4, 'event-online-charity', 'USR_MHND116', 12, 0, '2021-07-24 14:40:38'),
(158, 3, 'PYL-PK2-M0GM59VYNQ', 'USR_MHND116', 10, 0, '2021-07-24 14:45:45'),
(159, 4, 'evnt-lo-kreatif-2021', 'USR_MHND116', 12, 0, '2021-07-24 14:46:00'),
(160, 1, 'USR_MHND116', 'USR_MHND116', 1, 0, '2021-08-07 13:04:44'),
(161, 1, 'USR_MHND116', 'USR_MHND116', 5, 0, '2021-08-07 13:10:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `LOG_TYPE`
--

CREATE TABLE `LOG_TYPE` (
  `ID_TYPE` int(10) NOT NULL,
  `REFERENCES` varchar(50) DEFAULT NULL,
  `TYPE` varchar(50) DEFAULT NULL,
  `MESSAGE` text DEFAULT NULL,
  `LINK` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `LOG_TYPE`
--

INSERT INTO `LOG_TYPE` (`ID_TYPE`, `REFERENCES`, `TYPE`, `MESSAGE`, `LINK`) VALUES
(1, 'LOGIN', '0', 'telah login ke dalam sistem', NULL),
(2, 'PENDAFTARAN AKUN', '1', 'melakukan pendaftaran akun pada sistem', NULL),
(3, 'AKTIVASI AKUN', '0', 'melakukan aktivasi akun pada sistem', 'data-pengguna'),
(4, 'RECOVERY PASSWORD AKUN', '1', 'recovery password akun', NULL),
(5, 'PENGAJUAN AKSES PENYELENGGARA', '1', 'mengirim pengajuan hak akses penyelenggara', 'pengajuan-kpanel'),
(6, 'PROSES HAPUS AKUN', '1', 'meminta proses hapus data akun', NULL),
(7, 'PEMBATALAN PENGHAPUSAN AKUN', '0', 'membatalkan proses hapus data akun', NULL),
(8, 'HAPUS DATA PENGGUNA', '1', 'menghapus semua data terkait pengguna', NULL),
(9, 'VERIFIKASI PENGAJUAN HAK AKSES K-PANEL', '1', 'telah menerima pengajuan hak akses k-panel anda', 'pengguna/k-panel'),
(10, 'LOGIN K-Panel Penyelenggara', '0', 'telah login ke dalam k-panel penyelenggaranya', NULL),
(11, 'MEMBUAT EVENT', '1', 'berhasil membuat kegiatan event baru', NULL),
(12, 'Akses Panel EVENT', '0', 'mengakses panel event untuk memanagement', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `LOG_VERIFIKASI_PENGAJUAN`
--

CREATE TABLE `LOG_VERIFIKASI_PENGAJUAN` (
  `ID_LOG` int(10) NOT NULL,
  `KODE_PENYELENGGARA` varchar(20) NOT NULL,
  `PESAN` text DEFAULT NULL,
  `LOG_TIME` timestamp NOT NULL DEFAULT current_timestamp(),
  `STATUS_VERIFIKASI` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `LOG_VERIFIKASI_PENGAJUAN`
--

INSERT INTO `LOG_VERIFIKASI_PENGAJUAN` (`ID_LOG`, `KODE_PENYELENGGARA`, `PESAN`, `LOG_TIME`, `STATUS_VERIFIKASI`) VALUES
(5, 'PYL-PK2-M0GM59VYNQ', 'Good anikin, good', '2021-07-07 15:11:48', 1),
(6, 'PYL-HCS-IX4IAOA7GM', 'Iya', '2021-07-21 01:55:51', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `MENU_PENYELENGGARA`
--

CREATE TABLE `MENU_PENYELENGGARA` (
  `ID_MENUP` int(10) NOT NULL,
  `KODE_PENYELENGGARA` varchar(50) DEFAULT NULL,
  `POSITION` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `MENU_PENYELENGGARA`
--

INSERT INTO `MENU_PENYELENGGARA` (`ID_MENUP`, `KODE_PENYELENGGARA`, `POSITION`) VALUES
(12, 'PYL-PK2-M0GM59VYNQ', 1),
(13, 'PYL-HCS-IX4IAOA7GM', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `PENDAFTARAN_DATA`
--

CREATE TABLE `PENDAFTARAN_DATA` (
  `ID_DATA` int(10) NOT NULL,
  `KODE_PENDAFTARAN` varchar(20) DEFAULT NULL,
  `ID_FORM` int(10) DEFAULT NULL,
  `JAWABAN` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `PENDAFTARAN_EVENT`
--

CREATE TABLE `PENDAFTARAN_EVENT` (
  `KODE_PENDAFTARAN` varchar(20) NOT NULL,
  `KODE_EVENT` varchar(100) NOT NULL,
  `KODE_USER` varchar(20) NOT NULL,
  `ID_TIKET` int(10) DEFAULT NULL,
  `BUKTI_BAYAR` text DEFAULT NULL,
  `LOG_TIME` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `TAHAP_PENILAIAN`
--

CREATE TABLE `TAHAP_PENILAIAN` (
  `ID_TAHAP` int(10) NOT NULL,
  `KODE_KOMPETISI` varchar(100) DEFAULT NULL,
  `NAMA_TAHAP` varchar(50) DEFAULT NULL,
  `KETERANGAN` text DEFAULT NULL,
  `STATUS` tinyint(1) NOT NULL DEFAULT 0,
  `DATE_START` varchar(30) DEFAULT NULL,
  `TIME_START` varchar(20) DEFAULT NULL,
  `DATE_END` varchar(30) DEFAULT NULL,
  `TIME_END` varchar(20) DEFAULT NULL,
  `TEAM` int(10) DEFAULT 3
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `TAHAP_PENILAIAN`
--

INSERT INTO `TAHAP_PENILAIAN` (`ID_TAHAP`, `KODE_KOMPETISI`, `NAMA_TAHAP`, `KETERANGAN`, `STATUS`, `DATE_START`, `TIME_START`, `DATE_END`, `TIME_END`, `TEAM`) VALUES
(1, 'evnt-lo-kreatif-2021-c8b', 'Penyisihan', 'TEST', 0, '2021-07-21', '20:33', '2021-07-23', '18:30', 10),
(2, 'evnt-lo-kreatif-2021-c8b', 'FInal', 'Lorem ipsum', 0, '2021-07-31', '07:00', '2021-07-31', '18:00', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `TB_AUTH`
--

CREATE TABLE `TB_AUTH` (
  `KODE_USER` varchar(12) NOT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `PASSWORD` varchar(200) DEFAULT NULL,
  `ROLE` int(2) DEFAULT NULL,
  `NONAKTIF` tinyint(1) DEFAULT 0,
  `DEADLINE` varchar(20) DEFAULT NULL,
  `JOIN_DATE` timestamp NOT NULL DEFAULT current_timestamp(),
  `LOG_TIME` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `TB_AUTH`
--

INSERT INTO `TB_AUTH` (`KODE_USER`, `EMAIL`, `PASSWORD`, `ROLE`, `NONAKTIF`, `DEADLINE`, `JOIN_DATE`, `LOG_TIME`) VALUES
('ADM_001', 'admin@nestivent.org', '$2y$10$voeLDCmjARvwVqKZQvPQ3.SaFNpc15VuWtSrfXO9jg7FGdZyIegJS', 0, 0, NULL, '2021-06-02 09:07:23', '2021-07-04 09:56:20'),
('JRI_DDYHf85', 'dedyhermawan@gmail.com', '$2y$10$4iKwnbQ83qRRzYfZWaU43uvJZ2C78KNnn8p0xsSjBNXpIqnxu9j5G', 2, 0, NULL, '2021-07-19 15:37:27', '2021-07-19 15:37:27'),
('JRI_DMSPfad', 'dimas@gmail.com', '$2y$10$ZOiIL.RLqBC9tnFj9ARUnOCROEV7a5TwaSR8QwnF8IR1szRZVRFNC', 2, 0, NULL, '2021-07-19 15:39:14', '2021-07-19 15:45:36'),
('USR_MHND116', 'mahendradwipurwanto@gmail.com', '$2y$10$FjgV9LHJNAnbt8AC5BXHPOe2KZH2h03wDQG9jwbQ9SQhVY6lffp8y', 1, 0, NULL, '2021-06-12 09:07:23', '2021-07-02 20:20:14'),
('USR_MHND67b', '181221006@mhs.stiki.ac.id', '$2y$10$RqSAEUXwJm7I3u4HaHyqRuIyWK.6KvNVdwWp8Alt8Q8kg1KFG2vH2', 1, 0, NULL, '2021-07-21 01:50:21', '2021-07-21 01:50:21');

--
-- Trigger `TB_AUTH`
--
DELIMITER $$
CREATE TRIGGER `add_penggunaPengaturan` AFTER INSERT ON `TB_AUTH` FOR EACH ROW BEGIN

INSERT INTO TB_PENGGUNA_PENGATURAN (KODE_USER, IDENTIFIER, VALUE) VALUES (NEW.KODE_USER, "ALERT_MakeK-PANEL", 1);

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `del_aktivitas` BEFORE DELETE ON `TB_AUTH` FOR EACH ROW BEGIN

DELETE FROM LOG_AKTIVITAS WHERE RECEIVER = OLD.KODE_USER AND TYPE != 8;

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `del_kolabolator` BEFORE DELETE ON `TB_AUTH` FOR EACH ROW BEGIN

DELETE FROM TB_KOLABOLATOR WHERE EMAIL = OLD.EMAIL AND BAGIAN = 1;

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `del_penggunaPengaturan` BEFORE DELETE ON `TB_AUTH` FOR EACH ROW BEGIN

DELETE FROM TB_PENGGUNA_PENGATURAN WHERE KODE_USER = OLD.KODE_USER;

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `del_token` BEFORE DELETE ON `TB_AUTH` FOR EACH ROW BEGIN

DELETE FROM TB_TOKEN WHERE KODE = OLD.KODE_USER;

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `del_user` BEFORE DELETE ON `TB_AUTH` FOR EACH ROW BEGIN

DELETE FROM TB_PENGGUNA WHERE KODE_USER = OLD.KODE_USER;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `TB_CONTACT_PERSON`
--

CREATE TABLE `TB_CONTACT_PERSON` (
  `ID_CP` int(10) NOT NULL,
  `TYPE` int(10) DEFAULT NULL,
  `KODE` varchar(50) DEFAULT NULL,
  `NAMA_CONTACT` varchar(50) DEFAULT NULL,
  `CONTACT` varchar(200) DEFAULT NULL,
  `CONTACT_MEDIA` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `TB_CONTACT_PERSON`
--

INSERT INTO `TB_CONTACT_PERSON` (`ID_CP`, `TYPE`, `KODE`, `NAMA_CONTACT`, `CONTACT`, `CONTACT_MEDIA`) VALUES
(7, 1, 'evnt-stiki-technofest-2-0-2021-bc7', 'Dyah Ajeng Salsabilla', '085785111746', 'WHATSAPP'),
(8, 1, 'evnt-stiki-technofest-2-0-2021-bc7', 'Mahendra Dwi Purwanto', '085785111746', 'PHONE'),
(9, 2, 'evnt-lo-kreatif-2021-c8b', 'Vebry Eka Purwantoro', '085704302114', 'WHATSAPP'),
(10, 1, 'event-online-charity-seminar-series-2-629', 'Mahendra', '085785111746', 'WHATSAPP'),
(11, 1, 'event-online-charity-seminar-series-2-629', 'Dyah Ajeng Salsabilla', 'mahendra@gmail.com', 'EMAIL');

-- --------------------------------------------------------

--
-- Struktur dari tabel `TB_EVENT`
--

CREATE TABLE `TB_EVENT` (
  `KODE_EVENT` varchar(50) CHARACTER SET latin1 NOT NULL,
  `KODE_PENYELENGGARA` varchar(20) CHARACTER SET latin1 NOT NULL,
  `JENIS` int(5) NOT NULL DEFAULT 0,
  `STATUS_EVENT` tinyint(1) NOT NULL DEFAULT 1,
  `JUDUL` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `POSTER` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `TANGGAL` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `WAKTU` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `MEDIA` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `BAYAR` tinyint(1) NOT NULL DEFAULT 0,
  `ONLINE` tinyint(1) NOT NULL DEFAULT 0,
  `DESKRIPSI` text CHARACTER SET latin1 DEFAULT NULL,
  `LOG_TIME` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `TB_EVENT`
--

INSERT INTO `TB_EVENT` (`KODE_EVENT`, `KODE_PENYELENGGARA`, `JENIS`, `STATUS_EVENT`, `JUDUL`, `POSTER`, `TANGGAL`, `WAKTU`, `MEDIA`, `BAYAR`, `ONLINE`, `DESKRIPSI`, `LOG_TIME`) VALUES
('event-online-charity-seminar-series-2-629', 'PYL-PK2-M0GM59VYNQ', 0, 1, 'Online Charity Seminar Series #2', 'POSTER_-1626832911.png', '2021-07-21', '09:00', 'instagram', 1, 0, '<p>TEST</p>', '2021-07-21 09:01:51'),
('evnt-stiki-technofest-2-0-2021-bc7', 'PYL-PK2-M0GM59VYNQ', 1, 0, 'STIKI TECHNOFEST 2.0 #2021', 'POSTER_-1626554133.png', '2021-07-21', '03:34', 'instagram', 1, 1, '<p style=\"text-align: justify;\"><strong style=\"margin: 0px; padding: 0px; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; text-align: justify; background-color: #ffffff;\">Lorem Ipsum</strong><span style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; text-align: justify; background-color: #ffffff;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. <!-- pagebreak -->It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; text-align: justify; background-color: #ffffff;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://localhost/nestivent/berkas/tmp/post/1626551001.png\" alt=\"\" width=\"400\" height=\"250\" /></span><span style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; text-align: justify; background-color: #ffffff;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.</span></p>\r\n<h4 style=\"margin: 10px 10px 5px; padding: 0px; font-weight: 400; font-size: 14px; line-height: 18px; text-align: center; font-style: italic; font-family: \'Open Sans\', Arial, sans-serif; background-color: #ffffff;\">\"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...\"</h4>\r\n<h5 style=\"margin: 5px 10px 20px; padding: 0px; font-weight: 400; font-size: 12px; line-height: 14px; text-align: center; font-family: \'Open Sans\', Arial, sans-serif; background-color: #ffffff;\">\"There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain...\"</h5>\r\n<p>&nbsp;</p>\r\n<p style=\"text-align: center;\"><iframe title=\"YouTube video player\" src=\"https://www.youtube.com/embed/7BCojznmtRE\" width=\"400\" height=\"225\" frameborder=\"0\" allowfullscreen=\"allowfullscreen\"></iframe></p>', '2021-07-18 03:35:33');

--
-- Trigger `TB_EVENT`
--
DELIMITER $$
CREATE TRIGGER `deL_cp` BEFORE DELETE ON `TB_EVENT` FOR EACH ROW BEGIN

DELETE FROM TB_CONTACT_PERSON WHERE KODE = OLD.KODE_EVENT AND TYPE = 1;

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `del_sosmed` BEFORE DELETE ON `TB_EVENT` FOR EACH ROW BEGIN

DELETE FROM TB_SOSMED WHERE KODE = OLD.KODE_EVENT AND TYPE = 1;

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `del_tiket` BEFORE DELETE ON `TB_EVENT` FOR EACH ROW BEGIN

DELETE FROM TB_TIKET WHERE KODE = OLD.KODE_EVENT AND TYPE = 1;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `TB_KATEGORI`
--

CREATE TABLE `TB_KATEGORI` (
  `ID_KATEGORI` int(10) NOT NULL,
  `KATEGORI` varchar(20) DEFAULT NULL,
  `TYPE` int(5) DEFAULT NULL,
  `DESC` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `TB_KOLABOLATOR`
--

CREATE TABLE `TB_KOLABOLATOR` (
  `ID_KOLABOLATOR` int(10) NOT NULL,
  `KODE_PENYELENGGARA` varchar(20) DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `BAGIAN` int(5) DEFAULT NULL,
  `STATUS` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `TB_KOLABOLATOR`
--

INSERT INTO `TB_KOLABOLATOR` (`ID_KOLABOLATOR`, `KODE_PENYELENGGARA`, `EMAIL`, `BAGIAN`, `STATUS`) VALUES
(30, 'PYL-PK2-M0GM59VYNQ', 'mahendradwipurwanto@gmail.com', 0, 1),
(32, 'PYL-PK2-M0GM59VYNQ', 'developpertech@gmail.com', 2, 0),
(33, 'PYL-HCS-IX4IAOA7GM', '181221006@mhs.stiki.ac.id', 0, 1),
(34, 'PYL-HCS-IX4IAOA7GM', 'dyahajengsalsabilla@gmail.com', 2, 0),
(35, 'PYL-BM-ILF1EB9W4N', 'mahendradwipurwanto@gmail.com', 0, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `TB_KOMPETISI`
--

CREATE TABLE `TB_KOMPETISI` (
  `KODE_KOMPETISI` varchar(100) CHARACTER SET latin1 NOT NULL,
  `KODE_PENYELENGGARA` varchar(20) CHARACTER SET latin1 NOT NULL,
  `STATUS_KOMPETISI` tinyint(1) NOT NULL DEFAULT 1,
  `JUDUL` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `POSTER` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `PANDUAN` varchar(50) DEFAULT NULL,
  `TANGGAL` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `WAKTU` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `MEDIA` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `BAYAR` tinyint(1) NOT NULL DEFAULT 0,
  `ONLINE` tinyint(1) NOT NULL DEFAULT 0,
  `DESKRIPSI` text CHARACTER SET latin1 DEFAULT NULL,
  `LOG_TIME` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `TB_KOMPETISI`
--

INSERT INTO `TB_KOMPETISI` (`KODE_KOMPETISI`, `KODE_PENYELENGGARA`, `STATUS_KOMPETISI`, `JUDUL`, `POSTER`, `PANDUAN`, `TANGGAL`, `WAKTU`, `MEDIA`, `BAYAR`, `ONLINE`, `DESKRIPSI`, `LOG_TIME`) VALUES
('evnt-lo-kreatif-2021-c8b', 'PYL-PK2-M0GM59VYNQ', 1, 'Lo Kreatif 2021', 'POSTER_-1626622519.png', NULL, '2021-09-01', '00:00', 'instagram', 1, 1, '<p>Front is an incredibly beautiful, fully responsive, and mobile-first projects on the web – it is the perfect starting point for any creative and professional sites. Get started with Front\'s components and options for laying out your Front project, including SVG components, powerful scripts, fully detailed documentation, and yet developer friendly code.</p><br><p><span style=\"font-size: 14pt;\"><strong>1. Ruang Lingkup</strong></span></p>\r\n<p>Berikut ini adalah ruang lingkup bisnis yang dapat diikutsertakan dalam Lomba Nasional Kreativitas Mahasiswa (LO KREATIF) 2021 kategori Ide Bisnis:</p>\r\n<p>&nbsp;</p>\r\n<ul>\r\n<li>Mendukung salah satu program Sustainable Development Goals (SDG).</li>\r\n<li>Jenis usaha bebas sesuai minat, pasar dan keterampilan.</li>\r\n<li>Karakteristik usaha yang dikembangkan tergolong usaha mikro baik di bidang produksi barang dan/atau jasa, baik usaha baru atau usaha yang sudah ada.</li>\r\n<li>Proposal bisnis yang diajukan merupakan proposal bisnis yang belum pernah mendapatkan hibah atau memenangkan lomba apapun.</li>\r\n<li>Biaya alokasi untuk bisnis yaitu sebesar Rp 10.000.000 &ndash; Rp 20.000.000.</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p><span style=\"font-size: 14pt;\"><strong>2. Format Proposal</strong></span></p>\r\n<div>\r\n<ul>\r\n<li>Naskah diketik dengan font style Times New Roman ukuran 12 dengan line spacing 1,5.</li>\r\n<li>Format kertas ukuran A4.</li>\r\n<li>Margin top, bottom, right dan left adalah 2,54 cm.</li>\r\n<li>Proposal maksimal 20 halaman dihitung mulai Latar Belakang Permasalahan sampai dengan Lampiran.</li>\r\n<li>Proposal dan Surat Pernyataan diunggah di web pada halaman &ldquo;Unggah Karya&rdquo; dengan format .pdf maksimal 10 MB.</li>\r\n</ul>\r\n</div>', '2021-07-18 22:35:19');

--
-- Trigger `TB_KOMPETISI`
--
DELIMITER $$
CREATE TRIGGER `del_contact_person_kompetisi` BEFORE DELETE ON `TB_KOMPETISI` FOR EACH ROW BEGIN

DELETE FROM TB_CONTACT_PERSON WHERE TYPE = 2 AND KODE = OLD.KODE_KOMPETISI;

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `del_sosmed_kompetisi` BEFORE DELETE ON `TB_KOMPETISI` FOR EACH ROW BEGIN

DELETE FROM TB_SOSMED WHERE TYPE = 2 AND KODE = OLD.KODE_KOMPETISI;

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `del_tiket_kompetisi` BEFORE DELETE ON `TB_KOMPETISI` FOR EACH ROW BEGIN

DELETE FROM TB_TIKET WHERE TYPE = 2 AND KODE = OLD.KODE_KOMPETISI;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `TB_LAPORAN`
--

CREATE TABLE `TB_LAPORAN` (
  `ID_LAPORAN` int(10) NOT NULL,
  `SENDER` varchar(20) DEFAULT NULL,
  `MESSAGE` text DEFAULT NULL,
  `TYPE` int(5) DEFAULT NULL,
  `TARGET` varchar(20) DEFAULT NULL,
  `READ` tinyint(1) NOT NULL DEFAULT 0,
  `LOG_TIME` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `TB_LAPORAN`
--

INSERT INTO `TB_LAPORAN` (`ID_LAPORAN`, `SENDER`, `MESSAGE`, `TYPE`, `TARGET`, `READ`, `LOG_TIME`) VALUES
(1, 'USR_MHND116', 'APAAN NIH KEMBALIKAN HAK KAMIIII!!!', 1, 'PYL-PK2-M0GM59VYNQ', 0, '2021-07-07 23:41:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `TB_PENGATURAN`
--

CREATE TABLE `TB_PENGATURAN` (
  `ID_PENGATURAN` int(10) NOT NULL,
  `KEY` varchar(50) DEFAULT NULL,
  `VALUE` text DEFAULT NULL,
  `DESC` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `TB_PENGATURAN`
--

INSERT INTO `TB_PENGATURAN` (`ID_PENGATURAN`, `KEY`, `VALUE`, `DESC`) VALUES
(1, 'EM_HOST', 'us10.fastserver.my.id', NULL),
(2, 'EM_USERNAME', 'support@nestivent.site', NULL),
(3, 'EM_PASSWORD', '?v8lRT,nfDiM', NULL),
(4, 'LN_FACEBOOK', 'www.facebook.com', NULL),
(5, 'LN_INSTAGRAM', 'www.instagram.com', NULL),
(6, 'LN_TWITTER', 'www.twitter.com', NULL),
(7, 'LN_GITHUB', 'www.github.com', NULL),
(8, 'LOGO_FAV', 'icon-ts.png', NULL),
(9, 'LOGO_WHITE', 'logo-in.png', NULL),
(10, 'LOGO_BLACK', 'logo-ts.png', NULL),
(11, 'WEB_JUDUL', 'Nestivent', NULL),
(12, 'WEB_DESKRIPSI', 'Kelola kegiatan kompetisi dan event mulai dari pendaftaran hingga pembagian sertifikat secara mudah.', NULL),
(13, 'WEB_WA', '85785111746', NULL),
(14, 'WEB_HERO_BUTTON', '1', NULL),
(15, 'OPEN_CAREER', '0', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `TB_PENGGUNA`
--

CREATE TABLE `TB_PENGGUNA` (
  `KODE_USER` varchar(12) NOT NULL,
  `NAMA` varchar(50) DEFAULT NULL,
  `PROFIL` text DEFAULT NULL,
  `JK` char(1) DEFAULT NULL,
  `HP` varchar(20) DEFAULT NULL,
  `ALAMAT` text DEFAULT NULL,
  `INSTAGRAM` varchar(50) DEFAULT NULL,
  `INSTANSI` text DEFAULT NULL,
  `JABATAN` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `TB_PENGGUNA`
--

INSERT INTO `TB_PENGGUNA` (`KODE_USER`, `NAMA`, `PROFIL`, `JK`, `HP`, `ALAMAT`, `INSTAGRAM`, `INSTANSI`, `JABATAN`) VALUES
('USR_MHND116', 'Mahendra Dwi Purwanto', 'FOTO_-1625297542.png', 'L', '85785111746', 'Singosari\r\nCandirenggo', 'mahendradwipurwanto', 'STIKI', '1|Pelajar / Mahasiswa'),
('ADM_001', 'ADMIN', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('JRI_DDYHf85', 'dedy hermawan', NULL, NULL, '', NULL, NULL, NULL, NULL),
('JRI_DMSPfad', 'Dimas P', NULL, NULL, '', NULL, NULL, NULL, NULL),
('USR_MHND67b', 'MAHENDRA DWI PURWANTO', NULL, 'L', '85785111746', 'Singosari\r\nCandirenggo', '', 'STIKI Malang', '1|Pelajar / Mahasiswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `TB_PENGGUNA_PENGATURAN`
--

CREATE TABLE `TB_PENGGUNA_PENGATURAN` (
  `ID` int(10) NOT NULL,
  `KODE_USER` varchar(12) CHARACTER SET latin1 NOT NULL,
  `IDENTIFIER` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `VALUE` text CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `TB_PENGGUNA_PENGATURAN`
--

INSERT INTO `TB_PENGGUNA_PENGATURAN` (`ID`, `KODE_USER`, `IDENTIFIER`, `VALUE`) VALUES
(1, 'USR_MHND116', 'ALERT_MakeK_PANEL', '1'),
(4, 'JRI_DDYHf85', 'ALERT_MakeK-PANEL', '1'),
(5, 'JRI_DMSPfad', 'ALERT_MakeK-PANEL', '1'),
(6, 'USR_MHND67b', 'ALERT_MakeK-PANEL', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `TB_PENYELENGGARA`
--

CREATE TABLE `TB_PENYELENGGARA` (
  `KODE_PENYELENGGARA` varchar(200) NOT NULL,
  `NAMA` varchar(100) DEFAULT NULL,
  `LOGO` varchar(50) DEFAULT NULL,
  `INSTANSI` text DEFAULT NULL,
  `INSTAGRAM` text DEFAULT NULL,
  `TWITTER` text DEFAULT NULL,
  `FACEBOOK` text DEFAULT NULL,
  `GITHUB` text DEFAULT NULL,
  `DESKRIPSI` text DEFAULT NULL,
  `STATUS` int(5) DEFAULT 0,
  `FEATURED` tinyint(1) NOT NULL DEFAULT 0,
  `MAKE_DATE` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `TB_PENYELENGGARA`
--

INSERT INTO `TB_PENYELENGGARA` (`KODE_PENYELENGGARA`, `NAMA`, `LOGO`, `INSTANSI`, `INSTAGRAM`, `TWITTER`, `FACEBOOK`, `GITHUB`, `DESKRIPSI`, `STATUS`, `FEATURED`, `MAKE_DATE`) VALUES
('PYL-BM-ILF1EB9W4N', 'BAM', 'LOGO_1628341841.png', 'STIKI Malang', NULL, NULL, NULL, NULL, '', 0, 0, '2021-08-07 13:10:42'),
('PYL-HCS-IX4IAOA7GM', 'HIC STIKI Malang', 'LOGO_1626832394.png', 'STIKI Malang', NULL, NULL, NULL, NULL, '', 1, 0, '2021-07-21 01:53:14'),
('PYL-PK2-M0GM59VYNQ', 'PK2M STIKI Malang', 'LOGO_1627020079.png', 'STIKI', 'pk2m', 'Belum diatur', 'Belum diatur', 'Belum diatur', '<p>PK2M STIKI Malang</p>', 1, 0, '2021-07-07 14:33:43');

--
-- Trigger `TB_PENYELENGGARA`
--
DELIMITER $$
CREATE TRIGGER `del_contact_person` BEFORE DELETE ON `TB_PENYELENGGARA` FOR EACH ROW BEGIN

DELETE FROM TB_CONTACT_PERSON WHERE KODE = OLD.KODE_PENYELENGGARA;

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `del_kolabPenyelenggara` BEFORE DELETE ON `TB_PENYELENGGARA` FOR EACH ROW BEGIN

DELETE FROM TB_KOLABOLATOR WHERE KODE_PENYELENGGARA = OLD.KODE_PENYELENGGARA;

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `del_menuPenyelenggara` BEFORE DELETE ON `TB_PENYELENGGARA` FOR EACH ROW BEGIN

DELETE FROM MENU_PENYELENGGARA WHERE KODE_PENYELENGGARA = OLD.KODE_PENYELENGGARA;

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `del_verifikasiPengajuan` BEFORE DELETE ON `TB_PENYELENGGARA` FOR EACH ROW BEGIN

DELETE FROM LOG_VERIFIKASI_PENGAJUAN WHERE KODE_PENYELENGGARA = OLD.KODE_PENYELENGGARA;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `TB_PENYELENGGARA_KATEGORI`
--

CREATE TABLE `TB_PENYELENGGARA_KATEGORI` (
  `ID_PKAT` int(10) NOT NULL,
  `KODE_PENYELENGGARA` varchar(30) DEFAULT NULL,
  `ID_KATEGORI` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `TB_PESAN`
--

CREATE TABLE `TB_PESAN` (
  `ID_PESAN` int(10) NOT NULL,
  `RECEIVER` varchar(20) DEFAULT NULL,
  `SENDER` varchar(20) DEFAULT NULL,
  `MESSAGE` text DEFAULT NULL,
  `READ` tinyint(1) NOT NULL DEFAULT 0,
  `LOG_TIME` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `TB_PESAN`
--

INSERT INTO `TB_PESAN` (`ID_PESAN`, `RECEIVER`, `SENDER`, `MESSAGE`, `READ`, `LOG_TIME`) VALUES
(1, 'PYL-PK2-M0GM59VYNQ', 'USR_MHND116', 'Haii syangggg :*', 0, '2021-07-07 23:46:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `TB_POSTER`
--

CREATE TABLE `TB_POSTER` (
  `ID_POSTER` int(10) NOT NULL,
  `TYPE` int(5) DEFAULT NULL,
  `KODE` varchar(50) DEFAULT NULL,
  `POSTER` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `TB_SOSMED`
--

CREATE TABLE `TB_SOSMED` (
  `ID_SOSMED` int(10) NOT NULL,
  `TYPE` int(5) NOT NULL,
  `KODE` varchar(50) NOT NULL,
  `NAMA_SOSMED` varchar(50) DEFAULT NULL,
  `LINK_SOSMED` text DEFAULT NULL,
  `SOSMED` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `TB_SOSMED`
--

INSERT INTO `TB_SOSMED` (`ID_SOSMED`, `TYPE`, `KODE`, `NAMA_SOSMED`, `LINK_SOSMED`, `SOSMED`) VALUES
(18, 1, 'evnt-stiki-technofest-2-0-2021-bc7', 'stiki.technofest', 'www.instagram.com/stiki.technofest', 'INSTAGRAM'),
(19, 1, 'evnt-stiki-technofest-2-0-2021-bc7', 'STIKI MALANG', 'www.facebook.com/STIKI', 'FACEBOOK'),
(20, 2, 'evnt-lo-kreatif-2021-c8b', 'lo kreatif', 'www.instagram.com/lo.kreatif', 'INSTAGRAM'),
(21, 1, 'event-online-charity-seminar-series-2-629', 'STIKI', 'www.instagram.com/stiki', 'INSTAGRAM');

-- --------------------------------------------------------

--
-- Struktur dari tabel `TB_TIKET`
--

CREATE TABLE `TB_TIKET` (
  `ID_TIKET` int(10) NOT NULL,
  `TYPE` int(5) NOT NULL,
  `KODE` varchar(50) DEFAULT NULL,
  `NAMA_TIKET` varchar(50) DEFAULT NULL,
  `HARGA_TIKET` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `TB_TIKET`
--

INSERT INTO `TB_TIKET` (`ID_TIKET`, `TYPE`, `KODE`, `NAMA_TIKET`, `HARGA_TIKET`) VALUES
(17, 1, 'evnt-stiki-technofest-2-0-2021-bc7', 'MHS STIKI', 0),
(18, 1, 'evnt-stiki-technofest-2-0-2021-bc7', 'Luar STIKI', 25000),
(19, 2, 'evnt-lo-kreatif-2021-c8b', 'INDIVIDU', 50000),
(20, 2, 'evnt-lo-kreatif-2021-c8b', 'TEAM', 150000),
(21, 2, 'evnt-lo-kreatif-2021-c8b', 'MHS STIKI', 0),
(22, 1, 'event-online-charity-seminar-series-2-629', 'MHS STIKI', 25000),
(23, 1, 'event-online-charity-seminar-series-2-629', 'Luar Stiki', 50000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `TB_TOKEN`
--

CREATE TABLE `TB_TOKEN` (
  `id` int(10) NOT NULL,
  `KODE` varchar(12) NOT NULL,
  `KEY` text DEFAULT NULL,
  `TYPE` int(2) DEFAULT NULL,
  `STATUS` tinyint(1) DEFAULT 0,
  `DATE_CREATED` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `TB_TOKEN`
--

INSERT INTO `TB_TOKEN` (`id`, `KODE`, `KEY`, `TYPE`, `STATUS`, `DATE_CREATED`) VALUES
(1, 'USR_MHND116', '84e24344b906df1a7664a6b12852e80a26dec5c1066eb0a43f7773fea6eaa00e1674f3de1a18810c95966e29dc1d0c17b760226cf9b3210c14ba40ba99790d24aP2biVoyC+CpyM7DjVZ0BuYfOxggqjaneAs0wRUDRLE=', 1, 1, '2021-05-10 04:00:02'),
(2, 'USR_5c4', '2f6156b5345dad697923c157207579b31db7a2344b289816453c8afe7edaef96edf77519bd719d1e0641c08e70c0556e7ab592ece7f798147533d7cf3b886570Tq4YxDqzQIZ3rANGJpZJuEyFGQ8oK+4SPNtxpaiRi6Y=', 1, 0, '1621581442'),
(4, 'USR_MHND116', '82d99c2027d0ca2061ea6f85cbe26c49fee941dc296d5b3daf293d81db261858', 2, 0, '1622367475'),
(5, 'USR_MHND116', 'cafae91fbf681be34b9bb3179156c430c09548a8b05213b69ab4fbf5e697c59a', 2, 0, '1623314290'),
(6, 'USR_MHND116', '7ccb74d0ac6deb670e5e4eadbf175001e4a8831bec5f9afdb2a5ca11d8a39dca', 2, 0, '1623480113'),
(8, 'USR_MHND116', 'a2a990c63ce5c58316af6fac66559524a6438167e8785966908b635440b99259', 2, 0, '1625257141'),
(9, 'USR_MHND116', '78272ce288c2ae3b92d79abfc407c831a638b959bb267d0826b91f4a9f6cf19a', 2, 0, '1625819547'),
(10, 'USR_MHND67b', '4ff9ecb1b2d40f2fa74439d4226ee235890cbf72fa1cbfe4518bb64bdf6476407eb2825aded7357d6da7ada44b2276d621c485de576ea77d3dd7a9c10bc6279aJkSG6OTYbfFjXpasC0UoNTO8bPsl+27aUT2FvTEgH58=', 1, 1, '1626832221');

-- --------------------------------------------------------

--
-- Struktur dari tabel `USER_SESSION`
--

CREATE TABLE `USER_SESSION` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `USER_SESSION`
--

INSERT INTO `USER_SESSION` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('2f566gb2eaie21n7ohjjgt3r6fdm00vc', '::1', 1627136161, 0x5f5f63695f6c6173745f726567656e65726174657c693a313632373133363136313b),
('2k0smbs7648lhhk6k2nijqd15svmgf3c', '::1', 1628340664, 0x5f5f63695f6c6173745f726567656e65726174657c693a313632383334303636343b),
('2pamekh6q3bkq8f10834afev2f9u51g8', '::1', 1627127123, 0x5f5f63695f6c6173745f726567656e65726174657c693a313632373132373132333b),
('5tdpnv55ibtem709tuj2tm5fjknuurhq', '::1', 1627130875, 0x5f5f63695f6c6173745f726567656e65726174657c693a313632373133303837353b6b6f64655f757365727c733a31313a225553525f4d484e44313136223b656d61696c7c733a32393a226d6168656e64726164776970757277616e746f40676d61696c2e636f6d223b6e616d617c733a32313a224d6168656e647261204477692050757277616e746f223b726f6c657c733a313a2231223b6c6f676765645f696e7c623a313b6b6f64655f616b7365737c733a31383a2250594c2d504b322d4d30474d353956594e51223b70656e79656c656e67676172615f616b7365737c733a31373a22504b324d205354494b49204d616c616e67223b6c6f676f5f616b7365737c733a31393a224c4f474f5f313632373032303037392e706e67223b726f6c655f616b7365737c733a313a2230223b7374617475735f616b7365737c623a313b6d616e6167655f6576656e747c733a34313a226576656e742d6f6e6c696e652d636861726974792d73656d696e61722d7365726965732d322d363239223b6d616e6167655f6e616d614576656e747c733a33323a224f6e6c696e6520436861726974792053656d696e617220536572696573202332223b6d7374617475735f6576656e747c623a313b),
('6t2t7f0p9esr6il9i1rcm54e9pchm1a3', '::1', 1627135754, 0x5f5f63695f6c6173745f726567656e65726174657c693a313632373133353735343b),
('7bf4adfhc4a5a7tp5g6f0l4qambkvuks', '::1', 1628340026, 0x5f5f63695f6c6173745f726567656e65726174657c693a313632383334303032363b),
('7o2p6ob3eoj9sru3nhc07m0rlmhfnovj', '::1', 1627137194, 0x5f5f63695f6c6173745f726567656e65726174657c693a313632373133373139343b6b6f64655f757365727c733a31313a225553525f4d484e44313136223b656d61696c7c733a32393a226d6168656e64726164776970757277616e746f40676d61696c2e636f6d223b6e616d617c733a32313a224d6168656e647261204477692050757277616e746f223b726f6c657c733a313a2231223b6c6f676765645f696e7c623a313b),
('b3aafs51ji6hmkh4mnvipunbj6vdoaql', '::1', 1627135045, 0x5f5f63695f6c6173745f726567656e65726174657c693a313632373133353034353b),
('bho99lubag6qtpfc5g1ndglg8rsnq585', '::1', 1627131713, 0x5f5f63695f6c6173745f726567656e65726174657c693a313632373133313731333b6b6f64655f757365727c733a31313a225553525f4d484e44313136223b656d61696c7c733a32393a226d6168656e64726164776970757277616e746f40676d61696c2e636f6d223b6e616d617c733a32313a224d6168656e647261204477692050757277616e746f223b726f6c657c733a313a2231223b6c6f676765645f696e7c623a313b6b6f64655f616b7365737c733a31383a2250594c2d504b322d4d30474d353956594e51223b70656e79656c656e67676172615f616b7365737c733a31373a22504b324d205354494b49204d616c616e67223b6c6f676f5f616b7365737c733a31393a224c4f474f5f313632373032303037392e706e67223b726f6c655f616b7365737c733a313a2230223b7374617475735f616b7365737c623a313b6d616e6167655f6576656e747c733a34313a226576656e742d6f6e6c696e652d636861726974792d73656d696e61722d7365726965732d322d363239223b6d616e6167655f6e616d614576656e747c733a33323a224f6e6c696e6520436861726974792053656d696e617220536572696573202332223b6d7374617475735f6576656e747c623a313b),
('d94j8jsitaoj3jji1l2801t0gfi64obp', '::1', 1628341789, 0x5f5f63695f6c6173745f726567656e65726174657c693a313632383334313738393b6b6f64655f757365727c733a31313a225553525f4d484e44313136223b656d61696c7c733a32393a226d6168656e64726164776970757277616e746f40676d61696c2e636f6d223b6e616d617c733a32313a224d6168656e647261204477692050757277616e746f223b726f6c657c733a313a2231223b6c6f676765645f696e7c623a313b),
('dlbb4e7vuc6pg66dcqalgv5i6kcjcjti', '::1', 1627137631, 0x5f5f63695f6c6173745f726567656e65726174657c693a313632373133373633313b6b6f64655f757365727c733a31313a225553525f4d484e44313136223b656d61696c7c733a32393a226d6168656e64726164776970757277616e746f40676d61696c2e636f6d223b6e616d617c733a32313a224d6168656e647261204477692050757277616e746f223b726f6c657c733a313a2231223b6c6f676765645f696e7c623a313b6b6f64655f616b7365737c733a31383a2250594c2d504b322d4d30474d353956594e51223b70656e79656c656e67676172615f616b7365737c733a31373a22504b324d205354494b49204d616c616e67223b6c6f676f5f616b7365737c733a31393a224c4f474f5f313632373032303037392e706e67223b726f6c655f616b7365737c733a313a2230223b7374617475735f616b7365737c623a313b),
('gdq6qbti4hpsiq8t9q3oevrj7om2cta0', '::1', 1627138655, 0x5f5f63695f6c6173745f726567656e65726174657c693a313632373133383532303b6b6f64655f757365727c733a31313a225553525f4d484e44313136223b656d61696c7c733a32393a226d6168656e64726164776970757277616e746f40676d61696c2e636f6d223b6e616d617c733a32313a224d6168656e647261204477692050757277616e746f223b726f6c657c733a313a2231223b6c6f676765645f696e7c623a313b6b6f64655f616b7365737c733a31383a2250594c2d504b322d4d30474d353956594e51223b70656e79656c656e67676172615f616b7365737c733a31373a22504b324d205354494b49204d616c616e67223b6c6f676f5f616b7365737c733a31393a224c4f474f5f313632373032303037392e706e67223b726f6c655f616b7365737c733a313a2230223b7374617475735f616b7365737c623a313b6d616e6167655f6576656e747c733a34313a226576656e742d6f6e6c696e652d636861726974792d73656d696e61722d7365726965732d322d363239223b6d616e6167655f6e616d614576656e747c733a33323a224f6e6c696e6520436861726974792053656d696e617220536572696573202332223b6d7374617475735f6576656e747c623a313b6d616e6167655f6b6f6d7065746973697c733a32343a2265766e742d6c6f2d6b7265617469662d323032312d633862223b6d616e6167655f6e616d614b6f6d7065746973697c733a31353a224c6f204b7265617469662032303231223b6d7374617475735f6b6f6d7065746973697c623a313b),
('hf8v8h215vsd0b59nov7arvh68e4sql8', '::1', 1627131214, 0x5f5f63695f6c6173745f726567656e65726174657c693a313632373133313231343b6b6f64655f757365727c733a31313a225553525f4d484e44313136223b656d61696c7c733a32393a226d6168656e64726164776970757277616e746f40676d61696c2e636f6d223b6e616d617c733a32313a224d6168656e647261204477692050757277616e746f223b726f6c657c733a313a2231223b6c6f676765645f696e7c623a313b6b6f64655f616b7365737c733a31383a2250594c2d504b322d4d30474d353956594e51223b70656e79656c656e67676172615f616b7365737c733a31373a22504b324d205354494b49204d616c616e67223b6c6f676f5f616b7365737c733a31393a224c4f474f5f313632373032303037392e706e67223b726f6c655f616b7365737c733a313a2230223b7374617475735f616b7365737c623a313b6d616e6167655f6576656e747c733a34313a226576656e742d6f6e6c696e652d636861726974792d73656d696e61722d7365726965732d322d363239223b6d616e6167655f6e616d614576656e747c733a33323a224f6e6c696e6520436861726974792053656d696e617220536572696573202332223b6d7374617475735f6576656e747c623a313b),
('i302fhj6cf2q07fevi85c0c404q3soo7', '::1', 1628312612, 0x5f5f63695f6c6173745f726567656e65726174657c693a313632383331323436313b),
('iqor4q7rcrbdnbe528j6b16e49u15si8', '::1', 1627129754, 0x5f5f63695f6c6173745f726567656e65726174657c693a313632373132393735343b6b6f64655f757365727c733a31313a225553525f4d484e44313136223b656d61696c7c733a32393a226d6168656e64726164776970757277616e746f40676d61696c2e636f6d223b6e616d617c733a32313a224d6168656e647261204477692050757277616e746f223b726f6c657c733a313a2231223b6c6f676765645f696e7c623a313b6b6f64655f616b7365737c733a31383a2250594c2d504b322d4d30474d353956594e51223b70656e79656c656e67676172615f616b7365737c733a31373a22504b324d205354494b49204d616c616e67223b6c6f676f5f616b7365737c733a31393a224c4f474f5f313632373032303037392e706e67223b726f6c655f616b7365737c733a313a2230223b7374617475735f616b7365737c623a313b6d616e6167655f6576656e747c733a34313a226576656e742d6f6e6c696e652d636861726974792d73656d696e61722d7365726965732d322d363239223b6d616e6167655f6e616d614576656e747c733a33323a224f6e6c696e6520436861726974792053656d696e617220536572696573202332223b6d7374617475735f6576656e747c623a313b),
('je4cg6ed1po4dj3tss22ejnch1ib1odl', '::1', 1627132166, 0x5f5f63695f6c6173745f726567656e65726174657c693a313632373133323136363b6b6f64655f757365727c733a31313a225553525f4d484e44313136223b656d61696c7c733a32393a226d6168656e64726164776970757277616e746f40676d61696c2e636f6d223b6e616d617c733a32313a224d6168656e647261204477692050757277616e746f223b726f6c657c733a313a2231223b6c6f676765645f696e7c623a313b6b6f64655f616b7365737c733a31383a2250594c2d504b322d4d30474d353956594e51223b70656e79656c656e67676172615f616b7365737c733a31373a22504b324d205354494b49204d616c616e67223b6c6f676f5f616b7365737c733a31393a224c4f474f5f313632373032303037392e706e67223b726f6c655f616b7365737c733a313a2230223b7374617475735f616b7365737c623a313b6d616e6167655f6576656e747c733a34313a226576656e742d6f6e6c696e652d636861726974792d73656d696e61722d7365726965732d322d363239223b6d616e6167655f6e616d614576656e747c733a33323a224f6e6c696e6520436861726974792053656d696e617220536572696573202332223b6d7374617475735f6576656e747c623a313b),
('ljkbi5b92vhrvjirldqgpuftrr1h8jre', '::1', 1627137944, 0x5f5f63695f6c6173745f726567656e65726174657c693a313632373133373934343b6b6f64655f757365727c733a31313a225553525f4d484e44313136223b656d61696c7c733a32393a226d6168656e64726164776970757277616e746f40676d61696c2e636f6d223b6e616d617c733a32313a224d6168656e647261204477692050757277616e746f223b726f6c657c733a313a2231223b6c6f676765645f696e7c623a313b6b6f64655f616b7365737c733a31383a2250594c2d504b322d4d30474d353956594e51223b70656e79656c656e67676172615f616b7365737c733a31373a22504b324d205354494b49204d616c616e67223b6c6f676f5f616b7365737c733a31393a224c4f474f5f313632373032303037392e706e67223b726f6c655f616b7365737c733a313a2230223b7374617475735f616b7365737c623a313b6d616e6167655f6576656e747c733a34313a226576656e742d6f6e6c696e652d636861726974792d73656d696e61722d7365726965732d322d363239223b6d616e6167655f6e616d614576656e747c733a33323a224f6e6c696e6520436861726974792053656d696e617220536572696573202332223b6d7374617475735f6576656e747c623a313b),
('nelb5vebrgrb08avuvv82j4ubitatrbq', '::1', 1628342176, 0x5f5f63695f6c6173745f726567656e65726174657c693a313632383334323137363b6b6f64655f757365727c733a31313a225553525f4d484e44313136223b656d61696c7c733a32393a226d6168656e64726164776970757277616e746f40676d61696c2e636f6d223b6e616d617c733a32313a224d6168656e647261204477692050757277616e746f223b726f6c657c733a313a2231223b6c6f676765645f696e7c623a313b),
('nk7l8nqoe1kvhkn9ljgb9bamq4e1ibfo', '::1', 1627138520, 0x5f5f63695f6c6173745f726567656e65726174657c693a313632373133383532303b6b6f64655f757365727c733a31313a225553525f4d484e44313136223b656d61696c7c733a32393a226d6168656e64726164776970757277616e746f40676d61696c2e636f6d223b6e616d617c733a32313a224d6168656e647261204477692050757277616e746f223b726f6c657c733a313a2231223b6c6f676765645f696e7c623a313b6b6f64655f616b7365737c733a31383a2250594c2d504b322d4d30474d353956594e51223b70656e79656c656e67676172615f616b7365737c733a31373a22504b324d205354494b49204d616c616e67223b6c6f676f5f616b7365737c733a31393a224c4f474f5f313632373032303037392e706e67223b726f6c655f616b7365737c733a313a2230223b7374617475735f616b7365737c623a313b6d616e6167655f6576656e747c733a34313a226576656e742d6f6e6c696e652d636861726974792d73656d696e61722d7365726965732d322d363239223b6d616e6167655f6e616d614576656e747c733a33323a224f6e6c696e6520436861726974792053656d696e617220536572696573202332223b6d7374617475735f6576656e747c623a313b6d616e6167655f6b6f6d7065746973697c733a32343a2265766e742d6c6f2d6b7265617469662d323032312d633862223b6d616e6167655f6e616d614b6f6d7065746973697c733a31353a224c6f204b7265617469662032303231223b6d7374617475735f6b6f6d7065746973697c623a313b),
('no7ld8a8e16rk776hoatao7sp4foea00', '::1', 1627130096, 0x5f5f63695f6c6173745f726567656e65726174657c693a313632373133303039363b6b6f64655f757365727c733a31313a225553525f4d484e44313136223b656d61696c7c733a32393a226d6168656e64726164776970757277616e746f40676d61696c2e636f6d223b6e616d617c733a32313a224d6168656e647261204477692050757277616e746f223b726f6c657c733a313a2231223b6c6f676765645f696e7c623a313b6b6f64655f616b7365737c733a31383a2250594c2d504b322d4d30474d353956594e51223b70656e79656c656e67676172615f616b7365737c733a31373a22504b324d205354494b49204d616c616e67223b6c6f676f5f616b7365737c733a31393a224c4f474f5f313632373032303037392e706e67223b726f6c655f616b7365737c733a313a2230223b7374617475735f616b7365737c623a313b6d616e6167655f6576656e747c733a34313a226576656e742d6f6e6c696e652d636861726974792d73656d696e61722d7365726965732d322d363239223b6d616e6167655f6e616d614576656e747c733a33323a224f6e6c696e6520436861726974792053656d696e617220536572696573202332223b6d7374617475735f6576656e747c623a313b),
('obq1f5g08d6fku4hmqb6vs50ii3g14e9', '::1', 1628312461, 0x5f5f63695f6c6173745f726567656e65726174657c693a313632383331323436313b),
('ohotq93qfnipl9kgetfp3o0gmns8lj4m', '::1', 1628341483, 0x5f5f63695f6c6173745f726567656e65726174657c693a313632383334313438333b),
('ohq9gloe6ii9s6hdvvslgvroaa3q7f7n', '::1', 1628342176, 0x5f5f63695f6c6173745f726567656e65726174657c693a313632383334323137363b6b6f64655f757365727c733a31313a225553525f4d484e44313136223b656d61696c7c733a32393a226d6168656e64726164776970757277616e746f40676d61696c2e636f6d223b6e616d617c733a32313a224d6168656e647261204477692050757277616e746f223b726f6c657c733a313a2231223b6c6f676765645f696e7c623a313b),
('q1gk9hd9o77hssi2jm8hva5fk41940l3', '::1', 1627134420, 0x5f5f63695f6c6173745f726567656e65726174657c693a313632373133343432303b6b6f64655f757365727c733a31313a225553525f4d484e44313136223b656d61696c7c733a32393a226d6168656e64726164776970757277616e746f40676d61696c2e636f6d223b6e616d617c733a32313a224d6168656e647261204477692050757277616e746f223b726f6c657c733a313a2231223b6c6f676765645f696e7c623a313b6b6f64655f616b7365737c733a31383a2250594c2d504b322d4d30474d353956594e51223b70656e79656c656e67676172615f616b7365737c733a31373a22504b324d205354494b49204d616c616e67223b6c6f676f5f616b7365737c733a31393a224c4f474f5f313632373032303037392e706e67223b726f6c655f616b7365737c733a313a2230223b7374617475735f616b7365737c623a313b6d616e6167655f6576656e747c733a34313a226576656e742d6f6e6c696e652d636861726974792d73656d696e61722d7365726965732d322d363239223b6d616e6167655f6e616d614576656e747c733a33323a224f6e6c696e6520436861726974792053656d696e617220536572696573202332223b6d7374617475735f6576656e747c623a313b),
('rbt5v6h7e29mpub20lrj9plqcjh0su25', '::1', 1628341011, 0x5f5f63695f6c6173745f726567656e65726174657c693a313632383334313031313b);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `BIDANG_JURI`
--
ALTER TABLE `BIDANG_JURI`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `BIDANG_LOMBA`
--
ALTER TABLE `BIDANG_LOMBA`
  ADD PRIMARY KEY (`ID_BIDANG`);

--
-- Indeks untuk tabel `FORM_META`
--
ALTER TABLE `FORM_META`
  ADD PRIMARY KEY (`ID_FORM`);

--
-- Indeks untuk tabel `KRITERIA_PENILAIAN`
--
ALTER TABLE `KRITERIA_PENILAIAN`
  ADD PRIMARY KEY (`ID_KRITERIA`);

--
-- Indeks untuk tabel `LOG_AKTIVITAS`
--
ALTER TABLE `LOG_AKTIVITAS`
  ADD PRIMARY KEY (`ID_LOG`);

--
-- Indeks untuk tabel `LOG_TYPE`
--
ALTER TABLE `LOG_TYPE`
  ADD PRIMARY KEY (`ID_TYPE`);

--
-- Indeks untuk tabel `LOG_VERIFIKASI_PENGAJUAN`
--
ALTER TABLE `LOG_VERIFIKASI_PENGAJUAN`
  ADD PRIMARY KEY (`ID_LOG`);

--
-- Indeks untuk tabel `MENU_PENYELENGGARA`
--
ALTER TABLE `MENU_PENYELENGGARA`
  ADD PRIMARY KEY (`ID_MENUP`);

--
-- Indeks untuk tabel `PENDAFTARAN_DATA`
--
ALTER TABLE `PENDAFTARAN_DATA`
  ADD PRIMARY KEY (`ID_DATA`);

--
-- Indeks untuk tabel `PENDAFTARAN_EVENT`
--
ALTER TABLE `PENDAFTARAN_EVENT`
  ADD PRIMARY KEY (`KODE_PENDAFTARAN`);

--
-- Indeks untuk tabel `TAHAP_PENILAIAN`
--
ALTER TABLE `TAHAP_PENILAIAN`
  ADD PRIMARY KEY (`ID_TAHAP`);

--
-- Indeks untuk tabel `TB_AUTH`
--
ALTER TABLE `TB_AUTH`
  ADD PRIMARY KEY (`KODE_USER`);

--
-- Indeks untuk tabel `TB_CONTACT_PERSON`
--
ALTER TABLE `TB_CONTACT_PERSON`
  ADD PRIMARY KEY (`ID_CP`);

--
-- Indeks untuk tabel `TB_EVENT`
--
ALTER TABLE `TB_EVENT`
  ADD PRIMARY KEY (`KODE_EVENT`);

--
-- Indeks untuk tabel `TB_KATEGORI`
--
ALTER TABLE `TB_KATEGORI`
  ADD PRIMARY KEY (`ID_KATEGORI`);

--
-- Indeks untuk tabel `TB_KOLABOLATOR`
--
ALTER TABLE `TB_KOLABOLATOR`
  ADD PRIMARY KEY (`ID_KOLABOLATOR`);

--
-- Indeks untuk tabel `TB_KOMPETISI`
--
ALTER TABLE `TB_KOMPETISI`
  ADD PRIMARY KEY (`KODE_KOMPETISI`);

--
-- Indeks untuk tabel `TB_LAPORAN`
--
ALTER TABLE `TB_LAPORAN`
  ADD PRIMARY KEY (`ID_LAPORAN`);

--
-- Indeks untuk tabel `TB_PENGATURAN`
--
ALTER TABLE `TB_PENGATURAN`
  ADD PRIMARY KEY (`ID_PENGATURAN`);

--
-- Indeks untuk tabel `TB_PENGGUNA`
--
ALTER TABLE `TB_PENGGUNA`
  ADD KEY `KODE_USER` (`KODE_USER`);

--
-- Indeks untuk tabel `TB_PENGGUNA_PENGATURAN`
--
ALTER TABLE `TB_PENGGUNA_PENGATURAN`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `KODE_USER` (`KODE_USER`);

--
-- Indeks untuk tabel `TB_PENYELENGGARA`
--
ALTER TABLE `TB_PENYELENGGARA`
  ADD PRIMARY KEY (`KODE_PENYELENGGARA`);

--
-- Indeks untuk tabel `TB_PENYELENGGARA_KATEGORI`
--
ALTER TABLE `TB_PENYELENGGARA_KATEGORI`
  ADD PRIMARY KEY (`ID_PKAT`);

--
-- Indeks untuk tabel `TB_PESAN`
--
ALTER TABLE `TB_PESAN`
  ADD PRIMARY KEY (`ID_PESAN`);

--
-- Indeks untuk tabel `TB_POSTER`
--
ALTER TABLE `TB_POSTER`
  ADD PRIMARY KEY (`ID_POSTER`);

--
-- Indeks untuk tabel `TB_SOSMED`
--
ALTER TABLE `TB_SOSMED`
  ADD PRIMARY KEY (`ID_SOSMED`);

--
-- Indeks untuk tabel `TB_TIKET`
--
ALTER TABLE `TB_TIKET`
  ADD PRIMARY KEY (`ID_TIKET`);

--
-- Indeks untuk tabel `TB_TOKEN`
--
ALTER TABLE `TB_TOKEN`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `USER_SESSION`
--
ALTER TABLE `USER_SESSION`
  ADD PRIMARY KEY (`id`,`ip_address`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `BIDANG_JURI`
--
ALTER TABLE `BIDANG_JURI`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `BIDANG_LOMBA`
--
ALTER TABLE `BIDANG_LOMBA`
  MODIFY `ID_BIDANG` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `FORM_META`
--
ALTER TABLE `FORM_META`
  MODIFY `ID_FORM` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `KRITERIA_PENILAIAN`
--
ALTER TABLE `KRITERIA_PENILAIAN`
  MODIFY `ID_KRITERIA` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `LOG_AKTIVITAS`
--
ALTER TABLE `LOG_AKTIVITAS`
  MODIFY `ID_LOG` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT untuk tabel `LOG_TYPE`
--
ALTER TABLE `LOG_TYPE`
  MODIFY `ID_TYPE` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `LOG_VERIFIKASI_PENGAJUAN`
--
ALTER TABLE `LOG_VERIFIKASI_PENGAJUAN`
  MODIFY `ID_LOG` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `MENU_PENYELENGGARA`
--
ALTER TABLE `MENU_PENYELENGGARA`
  MODIFY `ID_MENUP` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `PENDAFTARAN_DATA`
--
ALTER TABLE `PENDAFTARAN_DATA`
  MODIFY `ID_DATA` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `TAHAP_PENILAIAN`
--
ALTER TABLE `TAHAP_PENILAIAN`
  MODIFY `ID_TAHAP` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `TB_CONTACT_PERSON`
--
ALTER TABLE `TB_CONTACT_PERSON`
  MODIFY `ID_CP` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `TB_KATEGORI`
--
ALTER TABLE `TB_KATEGORI`
  MODIFY `ID_KATEGORI` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `TB_KOLABOLATOR`
--
ALTER TABLE `TB_KOLABOLATOR`
  MODIFY `ID_KOLABOLATOR` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `TB_LAPORAN`
--
ALTER TABLE `TB_LAPORAN`
  MODIFY `ID_LAPORAN` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `TB_PENGATURAN`
--
ALTER TABLE `TB_PENGATURAN`
  MODIFY `ID_PENGATURAN` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `TB_PENGGUNA_PENGATURAN`
--
ALTER TABLE `TB_PENGGUNA_PENGATURAN`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `TB_PENYELENGGARA_KATEGORI`
--
ALTER TABLE `TB_PENYELENGGARA_KATEGORI`
  MODIFY `ID_PKAT` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `TB_PESAN`
--
ALTER TABLE `TB_PESAN`
  MODIFY `ID_PESAN` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `TB_POSTER`
--
ALTER TABLE `TB_POSTER`
  MODIFY `ID_POSTER` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `TB_SOSMED`
--
ALTER TABLE `TB_SOSMED`
  MODIFY `ID_SOSMED` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `TB_TIKET`
--
ALTER TABLE `TB_TIKET`
  MODIFY `ID_TIKET` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `TB_TOKEN`
--
ALTER TABLE `TB_TOKEN`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `TB_PENGGUNA`
--
ALTER TABLE `TB_PENGGUNA`
  ADD CONSTRAINT `TB_PENGGUNA_ibfk_1` FOREIGN KEY (`KODE_USER`) REFERENCES `TB_AUTH` (`KODE_USER`);

--
-- Ketidakleluasaan untuk tabel `TB_PENGGUNA_PENGATURAN`
--
ALTER TABLE `TB_PENGGUNA_PENGATURAN`
  ADD CONSTRAINT `TB_PENGGUNA_PENGATURAN_ibfk_1` FOREIGN KEY (`KODE_USER`) REFERENCES `TB_AUTH` (`KODE_USER`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
