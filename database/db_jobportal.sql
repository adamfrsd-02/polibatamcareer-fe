-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Mar 2022 pada 02.38
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_jobportal`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblapplicants`
--

CREATE TABLE `tblapplicants` (
  `APPLICANTID` int(11) NOT NULL,
  `FNAME` varchar(90) NOT NULL,
  `LNAME` varchar(90) NOT NULL,
  `MNAME` varchar(90) NOT NULL,
  `ADDRESS` varchar(255) NOT NULL,
  `SEX` varchar(11) NOT NULL,
  `CIVILSTATUS` varchar(30) NOT NULL,
  `BIRTHDATE` date NOT NULL,
  `BIRTHPLACE` varchar(255) NOT NULL,
  `AGE` int(2) NOT NULL,
  `USERNAME` varchar(90) NOT NULL,
  `PASS` varchar(90) NOT NULL,
  `EMAILADDRESS` varchar(90) NOT NULL,
  `CONTACTNO` varchar(90) NOT NULL,
  `DEGREE` text NOT NULL,
  `APPLICANTPHOTO` varchar(255) NOT NULL,
  `NATIONALID` varchar(255) NOT NULL,
  `LINKEDINLINK` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tblapplicants`
--

INSERT INTO `tblapplicants` (`APPLICANTID`, `FNAME`, `LNAME`, `MNAME`, `ADDRESS`, `SEX`, `CIVILSTATUS`, `BIRTHDATE`, `BIRTHPLACE`, `AGE`, `USERNAME`, `PASS`, `EMAILADDRESS`, `CONTACTNO`, `DEGREE`, `APPLICANTPHOTO`, `NATIONALID`, `LINKEDINLINK`) VALUES
(2019016, 'Anto Wijaya', 'Saputra', 'asd', 'bengkong', 'Male', 'none', '1980-01-29', 'asd', 42, 'aa', 'e0c9035898dd52fc65c41454cec9c4d2611bfb37', 'a@gmil.com', '08882319930', 'asd', 'photos/08032022021325270px-LogoPSI.svg.png', '', 'https://www.linkedin.com/in/anto-wijaya-saputra-b078b3163/'),
(2019018, 'asdasd', 'asd', 'asd', 'sadas', 'Female', 'Single', '1992-01-12', 'sad', 27, 'ss', 'c1c93f88d273660be5358cd4ee2df2c2f3f0e8e7', 'a@gmil.com', 'sad', 'sad', 'photos/08032022084331download.jfif', '', 'https://www.linkedin.com/in/anto-wijaya-saputra-b078b3163/'),
(2019020, 'sad', 'sad', 'sad', 'asdsad', 'Female', 'Single', '1992-10-14', 'asdsad', 27, 'ddd', '9c969ddf454079e3d439973bbab63ea6233e4087', 'a@gmil.com', '123123', 'sadsadsad', 'photos/077db70b-ab84-46c4-bbaa-a5dd6b7332a4_200x200.png', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblassesment`
--

CREATE TABLE `tblassesment` (
  `ASSESMENTID` int(30) NOT NULL,
  `QUESTION` text NOT NULL,
  `QID` int(30) NOT NULL,
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tblassesment`
--

INSERT INTO `tblassesment` (`ASSESMENTID`, `QUESTION`, `QID`, `date_updated`) VALUES
(2, 'siapakah nama saya', 2, '0000-00-00 00:00:00'),
(3, 'i don\'t know', 3, '0000-00-00 00:00:00'),
(4, 'another test', 4, '0000-00-00 00:00:00'),
(5, 'just testing', 4, '2022-03-09 05:27:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblassesmentlist`
--

CREATE TABLE `tblassesmentlist` (
  `ASSESMENTLISTID` int(30) NOT NULL,
  `TITLE` text NOT NULL,
  `JOBID` int(11) NOT NULL,
  `COMPANYID` int(11) NOT NULL,
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tblassesmentlist`
--

INSERT INTO `tblassesmentlist` (`ASSESMENTLISTID`, `TITLE`, `JOBID`, `COMPANYID`, `date_updated`) VALUES
(2, 'another assesment', 7, 2, '2022-03-09 05:47:03'),
(3, 'TEST ASSESMENT', 8, 2, '2022-03-08 20:18:00'),
(4, 'second assesment', 8, 2, '2022-03-08 20:19:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblassesmentopt`
--

CREATE TABLE `tblassesmentopt` (
  `ASSESMENTOPTID` int(30) NOT NULL,
  `OPTIONTEXT` text NOT NULL,
  `ASSESMENTID` int(30) NOT NULL,
  `is_right` tinyint(4) NOT NULL COMMENT '1 = right answer',
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tblassesmentopt`
--

INSERT INTO `tblassesmentopt` (`ASSESMENTOPTID`, `OPTIONTEXT`, `ASSESMENTID`, `is_right`, `date_updated`) VALUES
(1, 'asda', 0, 1, '0000-00-00 00:00:00'),
(2, 'asda', 0, 0, '0000-00-00 00:00:00'),
(3, 'asdaa', 0, 0, '0000-00-00 00:00:00'),
(4, 'as', 0, 0, '0000-00-00 00:00:00'),
(5, 'adam', 2, 1, '0000-00-00 00:00:00'),
(6, 'firdaus', 2, 0, '0000-00-00 00:00:00'),
(7, 'anto', 2, 0, '0000-00-00 00:00:00'),
(8, 'wijaya', 2, 0, '0000-00-00 00:00:00'),
(13, 'idk man', 4, 1, '0000-00-00 00:00:00'),
(14, 'yeah', 4, 0, '0000-00-00 00:00:00'),
(15, 'no', 4, 0, '0000-00-00 00:00:00'),
(16, 'nope', 4, 0, '0000-00-00 00:00:00'),
(17, 'a', 3, 0, '2022-03-09 04:21:16'),
(18, 'b', 3, 1, '2022-03-09 04:21:16'),
(19, 'c', 3, 0, '2022-03-09 04:21:16'),
(20, 'd', 3, 0, '2022-03-09 04:21:16'),
(21, '12', 5, 0, '2022-03-09 05:27:44'),
(22, '11', 5, 0, '2022-03-09 05:27:44'),
(23, '10', 5, 0, '2022-03-09 05:27:44'),
(24, '9', 5, 0, '2022-03-09 05:27:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblassesmentresult`
--

CREATE TABLE `tblassesmentresult` (
  `id` int(30) NOT NULL,
  `ASSESMENTLISTID` int(30) NOT NULL,
  `APPLICANTID` int(30) NOT NULL,
  `score` int(11) NOT NULL,
  `total_score` int(11) NOT NULL,
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tblassesmentresult`
--

INSERT INTO `tblassesmentresult` (`id`, `ASSESMENTLISTID`, `APPLICANTID`, `score`, `total_score`, `date_updated`) VALUES
(1, 3, 2019018, 1, 1, '2022-03-09 04:55:22'),
(5, 4, 2019018, 0, 4, '2022-03-09 05:59:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblattachmentfile`
--

CREATE TABLE `tblattachmentfile` (
  `FILEID` int(11) NOT NULL,
  `JOBID` int(11) NOT NULL,
  `FILE_NAME` varchar(90) NOT NULL,
  `FILE_LOCATION` varchar(255) NOT NULL,
  `USERATTACHMENTID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tblattachmentfile`
--

INSERT INTO `tblattachmentfile` (`FILEID`, `JOBID`, `FILE_NAME`, `FILE_LOCATION`, `USERATTACHMENTID`) VALUES
(201900001, 2, 'Resume', 'photos/24122019073209Filtering a Group of Data VB.Net and SQL Server 2019.docx', 2019020),
(202200002, 1, 'Resume', 'photos/07032022023905ktp.jpeg', 2019016),
(202200006, 8, 'Resume', 'photos/08032022092400Antos_Resume.pdf', 2019018),
(202200007, 8, 'Resume', 'photos/08032022092940Antos_Resume.pdf', 2019018),
(202200008, 8, 'Resume', 'photos/08032022094020Antos_Resume.pdf', 2019018),
(2147483647, 2, 'Resume', 'photos/24122019072801Filtering a Group of Data VB.Net and SQL Server 2019.docx', 2019019);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblautonumbers`
--

CREATE TABLE `tblautonumbers` (
  `AUTOID` int(11) NOT NULL,
  `AUTOSTART` varchar(30) NOT NULL,
  `AUTOEND` int(11) NOT NULL,
  `AUTOINC` int(11) NOT NULL,
  `AUTOKEY` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tblautonumbers`
--

INSERT INTO `tblautonumbers` (`AUTOID`, `AUTOSTART`, `AUTOEND`, `AUTOINC`, `AUTOKEY`) VALUES
(1, '02983', 9, 1, 'userid'),
(2, '000', 79, 1, 'employeeid'),
(3, '0', 21, 1, 'APPLICANT'),
(4, '0000', 9, 1, 'FILEID');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblcategory`
--

CREATE TABLE `tblcategory` (
  `CATEGORYID` int(11) NOT NULL,
  `CATEGORY` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tblcategory`
--

INSERT INTO `tblcategory` (`CATEGORYID`, `CATEGORY`) VALUES
(10, 'Technology'),
(11, 'Managerial'),
(12, 'Engineer'),
(13, 'IT'),
(14, 'Civil Engineer'),
(15, 'HR'),
(23, 'Sales'),
(24, 'Banking'),
(25, 'Finance'),
(26, 'BPO'),
(27, 'Degital Marketing'),
(28, 'Shipping');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblcompany`
--

CREATE TABLE `tblcompany` (
  `COMPANYID` int(11) NOT NULL,
  `COMPANYNAME` varchar(90) NOT NULL,
  `COMPANYUSERNAME` varchar(90) NOT NULL,
  `COMPANYPASSWORD` varchar(90) NOT NULL,
  `COMPANYADDRESS` varchar(90) NOT NULL,
  `COMPANYCONTACTNO` varchar(30) NOT NULL,
  `COMPANYSTATUS` varchar(90) NOT NULL,
  `COMPANYMISSION` text NOT NULL,
  `COMPANYLOGO` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tblcompany`
--

INSERT INTO `tblcompany` (`COMPANYID`, `COMPANYNAME`, `COMPANYUSERNAME`, `COMPANYPASSWORD`, `COMPANYADDRESS`, `COMPANYCONTACTNO`, `COMPANYSTATUS`, `COMPANYMISSION`, `COMPANYLOGO`) VALUES
(2, 'Lapmodo Batam', 'lapmodo', 'b117455b2310cc6678291aee8e4009538f7d5ba3', 'Batam Center', '8912994', '', 'Oke', 'perusahaan2.png'),
(8, 'SAPU LINTAS DIGITAL', 'sapulidi', 'fa7cae9a4e470acb9481ca3bb314445ada420906', 'asd', '01201123', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblemployees`
--

CREATE TABLE `tblemployees` (
  `INCID` int(11) NOT NULL,
  `EMPLOYEEID` varchar(30) NOT NULL,
  `FNAME` varchar(50) NOT NULL,
  `LNAME` varchar(50) NOT NULL,
  `MNAME` varchar(50) NOT NULL,
  `ADDRESS` varchar(90) NOT NULL,
  `BIRTHDATE` date NOT NULL,
  `BIRTHPLACE` varchar(90) NOT NULL,
  `AGE` int(11) NOT NULL,
  `SEX` varchar(30) NOT NULL,
  `CIVILSTATUS` varchar(30) NOT NULL,
  `TELNO` varchar(40) NOT NULL,
  `EMP_EMAILADDRESS` varchar(90) NOT NULL,
  `CELLNO` varchar(30) NOT NULL,
  `POSITION` varchar(50) NOT NULL,
  `WORKSTATS` varchar(90) NOT NULL,
  `EMPPHOTO` varchar(255) NOT NULL,
  `EMPUSERNAME` varchar(90) NOT NULL,
  `EMPPASSWORD` varchar(125) NOT NULL,
  `DATEHIRED` date NOT NULL,
  `COMPANYID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tblemployees`
--

INSERT INTO `tblemployees` (`INCID`, `EMPLOYEEID`, `FNAME`, `LNAME`, `MNAME`, `ADDRESS`, `BIRTHDATE`, `BIRTHPLACE`, `AGE`, `SEX`, `CIVILSTATUS`, `TELNO`, `EMP_EMAILADDRESS`, `CELLNO`, `POSITION`, `WORKSTATS`, `EMPPHOTO`, `EMPUSERNAME`, `EMPPASSWORD`, `DATEHIRED`, `COMPANYID`) VALUES
(76, '2018001', 'Anto', 'Saputra', 'Akwokwoakwo', 'Bengkong', '2000-01-13', 'Pemalang', 22, 'Male', 'Married', '032656', 'antoawkoakwo@gmail.com', '', 'Programmer', '', '', '2018001', 'f3593fd40c55c33d1788309d4137e82f5eab0dea', '2018-05-23', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblfeedback`
--

CREATE TABLE `tblfeedback` (
  `FEEDBACKID` int(11) NOT NULL,
  `APPLICANTID` int(11) NOT NULL,
  `REGISTRATIONID` int(11) NOT NULL,
  `FEEDBACK` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblinterview`
--

CREATE TABLE `tblinterview` (
  `INTERVIEWID` int(30) NOT NULL,
  `id_progress` int(30) NOT NULL,
  `INTERVIEWLINK` text NOT NULL,
  `INTERVIEWDATE` datetime NOT NULL,
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbljob`
--

CREATE TABLE `tbljob` (
  `JOBID` int(11) NOT NULL,
  `COMPANYID` int(11) NOT NULL,
  `CATEGORY` varchar(90) NOT NULL,
  `OCCUPATIONTITLE` varchar(90) NOT NULL,
  `REQ_NO_EMPLOYEES` int(11) NOT NULL,
  `SALARIES` double NOT NULL,
  `DURATION_EMPLOYEMENT` varchar(90) NOT NULL,
  `QUALIFICATION_WORKEXPERIENCE` text NOT NULL,
  `JOBDESCRIPTION` text NOT NULL,
  `PREFEREDSEX` varchar(30) NOT NULL,
  `SECTOR_VACANCY` text NOT NULL,
  `JOBSTATUS` varchar(90) NOT NULL,
  `DATEPOSTED` datetime NOT NULL,
  `PROGRESS_DETAIL` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbljob`
--

INSERT INTO `tbljob` (`JOBID`, `COMPANYID`, `CATEGORY`, `OCCUPATIONTITLE`, `REQ_NO_EMPLOYEES`, `SALARIES`, `DURATION_EMPLOYEMENT`, `QUALIFICATION_WORKEXPERIENCE`, `JOBDESCRIPTION`, `PREFEREDSEX`, `SECTOR_VACANCY`, `JOBSTATUS`, `DATEPOSTED`, `PROGRESS_DETAIL`) VALUES
(1, 2, 'Technology', 'ISD', 6, 15000, 'jan 30', 'Two year Experience', 'We are looking for bachelor of science in information technology.\r\nasdasdasd', 'Male/Female', 'yes', '', '2018-05-20 00:00:00', ''),
(4, 2, 'IT', 'WEB DESIGN', 10, 125000, '1 week', 'asdas', 'asd', 'Male/Female', 'asd', '', '2022-03-08 14:42:00', ''),
(5, 8, 'IT', 'NETWORK', 120, 150000, '1239012039', '123123', '11231', 'Male/Female', '1231231', '', '2022-03-08 14:46:00', ''),
(6, 2, 'Technology', 'CONTOH SAJA', 20, 150000, '123123', '123123', '123123', 'Male/Female', '232323', '', '2022-03-08 18:14:00', ''),
(7, 2, 'Finance', 'BANK SWASTA', 20, 120312031023, '10 WEEK', 'APA AJALAH', 'ASD', 'Male/Female', 'ASD', '', '2022-03-08 18:35:00', 'a:4:{i:0;s:9:\"assesment\";i:1;s:9:\"interview\";i:2;s:9:\"interview\";i:3;s:2:\"mc\";}'),
(8, 2, 'HR', 'just test again', 20, 125000, '1 week', 'senior on everything', 'just doing work', 'Male/Female', 'work', '', '2022-03-08 20:18:00', 'a:6:{i:0;s:9:\"assesment\";i:1;s:9:\"assesment\";i:2;s:9:\"interview\";i:3;s:9:\"interview\";i:4;s:15:\"medical checkup\";i:5;s:5:\"hired\";}\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbljobregistration`
--

CREATE TABLE `tbljobregistration` (
  `REGISTRATIONID` int(11) NOT NULL,
  `COMPANYID` int(11) NOT NULL,
  `JOBID` int(11) NOT NULL,
  `APPLICANTID` int(11) NOT NULL,
  `APPLICANT` varchar(90) NOT NULL,
  `REGISTRATIONDATE` date NOT NULL,
  `REMARKS` varchar(255) NOT NULL DEFAULT 'Pending',
  `FILEID` int(11) NOT NULL,
  `PENDINGAPPLICATION` tinyint(1) NOT NULL DEFAULT 1,
  `HVIEW` tinyint(1) NOT NULL DEFAULT 1,
  `DATETIMEAPPROVED` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbljobregistration`
--

INSERT INTO `tbljobregistration` (`REGISTRATIONID`, `COMPANYID`, `JOBID`, `APPLICANTID`, `APPLICANT`, `REGISTRATIONDATE`, `REMARKS`, `FILEID`, `PENDINGAPPLICATION`, `HVIEW`, `DATETIMEAPPROVED`) VALUES
(12, 2, 8, 2019018, 'asdasd asd', '2022-03-08', 'Success', 202200008, 0, 0, '2022-03-09 08:32:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblprogress`
--

CREATE TABLE `tblprogress` (
  `id_progress` int(11) NOT NULL,
  `COMPANYID` int(11) NOT NULL,
  `JOBID` int(11) NOT NULL,
  `APPLICANTID` int(11) NOT NULL,
  `detail_progress` text NOT NULL,
  `ASSESMENTID` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tblprogress`
--

INSERT INTO `tblprogress` (`id_progress`, `COMPANYID`, `JOBID`, `APPLICANTID`, `detail_progress`, `ASSESMENTID`) VALUES
(7, 2, 8, 2019018, 'a:6:{i:0;s:9:\"assesment\";i:1;s:9:\"assesment\";i:2;s:9:\"interview\";i:3;s:9:\"interview\";i:4;s:15:\"medical checkup\";i:5;s:5:\"hired\";}\r\n', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblusers`
--

CREATE TABLE `tblusers` (
  `USERID` varchar(30) NOT NULL,
  `FULLNAME` varchar(40) NOT NULL,
  `USERNAME` varchar(90) NOT NULL,
  `PASS` varchar(90) NOT NULL,
  `ROLE` varchar(30) NOT NULL,
  `PICLOCATION` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tblusers`
--

INSERT INTO `tblusers` (`USERID`, `FULLNAME`, `USERNAME`, `PASS`, `ROLE`, `PICLOCATION`) VALUES
('00018', 'Adam Firdaus', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Administrator', 'photos/a.jpg'),
('029838', 'coco', 'coco', '09f836894fc1fe9af6f429fc24dcccc2e6847fe0', 'Staff', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_curriculum_vitae`
--

CREATE TABLE `tbl_curriculum_vitae` (
  `id_cv` int(11) NOT NULL,
  `APPLICANTID` int(11) NOT NULL,
  `skill_utama` varchar(255) NOT NULL,
  `skill_secondary` text NOT NULL,
  `jenjang_sekolah` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_curriculum_vitae`
--

INSERT INTO `tbl_curriculum_vitae` (`id_cv`, `APPLICANTID`, `skill_utama`, `skill_secondary`, `jenjang_sekolah`) VALUES
(1, 2019016, 'Web Developer', 'a:3:{i:0;s:15:\"Web Development\";i:1;s:20:\" Android Development\";i:2;s:12:\" Photography\";}', 'a:2:{i:0;s:23:\"SMKIbnu Sina(2018-2019)\";i:1;s:35:\" Politeknik Negeri Batam(2022-2025)\";}'),
(8, 2019018, 'Graphic Design', 'a:3:{i:0;s:14:\"Design Graphic\";i:1;s:21:\"  Android Development\";i:2;s:13:\"  Photography\";}', 'a:2:{i:0;s:24:\"SMK Ibnu Sina(2018-2019)\";i:1;s:36:\"  Politeknik Negeri Batam(2022-2025)\";}');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user_progress`
--

CREATE TABLE `tbl_user_progress` (
  `id_user_progress` int(11) NOT NULL,
  `id_progress` int(11) NOT NULL,
  `APPLICANTID` int(11) NOT NULL,
  `progres_step` int(11) NOT NULL,
  `appliance_status` enum('reject','pending','accepted','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_user_progress`
--

INSERT INTO `tbl_user_progress` (`id_user_progress`, `id_progress`, `APPLICANTID`, `progres_step`, `appliance_status`) VALUES
(2, 7, 2019018, 6, 'accepted');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tblapplicants`
--
ALTER TABLE `tblapplicants`
  ADD PRIMARY KEY (`APPLICANTID`);

--
-- Indeks untuk tabel `tblassesment`
--
ALTER TABLE `tblassesment`
  ADD PRIMARY KEY (`ASSESMENTID`);

--
-- Indeks untuk tabel `tblassesmentlist`
--
ALTER TABLE `tblassesmentlist`
  ADD PRIMARY KEY (`ASSESMENTLISTID`);

--
-- Indeks untuk tabel `tblassesmentopt`
--
ALTER TABLE `tblassesmentopt`
  ADD PRIMARY KEY (`ASSESMENTOPTID`);

--
-- Indeks untuk tabel `tblassesmentresult`
--
ALTER TABLE `tblassesmentresult`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tblattachmentfile`
--
ALTER TABLE `tblattachmentfile`
  ADD PRIMARY KEY (`FILEID`);

--
-- Indeks untuk tabel `tblautonumbers`
--
ALTER TABLE `tblautonumbers`
  ADD PRIMARY KEY (`AUTOID`);

--
-- Indeks untuk tabel `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`CATEGORYID`);

--
-- Indeks untuk tabel `tblcompany`
--
ALTER TABLE `tblcompany`
  ADD PRIMARY KEY (`COMPANYID`);

--
-- Indeks untuk tabel `tblemployees`
--
ALTER TABLE `tblemployees`
  ADD PRIMARY KEY (`INCID`),
  ADD UNIQUE KEY `EMPLOYEEID` (`EMPLOYEEID`);

--
-- Indeks untuk tabel `tblfeedback`
--
ALTER TABLE `tblfeedback`
  ADD PRIMARY KEY (`FEEDBACKID`);

--
-- Indeks untuk tabel `tblinterview`
--
ALTER TABLE `tblinterview`
  ADD PRIMARY KEY (`INTERVIEWID`);

--
-- Indeks untuk tabel `tbljob`
--
ALTER TABLE `tbljob`
  ADD PRIMARY KEY (`JOBID`);

--
-- Indeks untuk tabel `tbljobregistration`
--
ALTER TABLE `tbljobregistration`
  ADD PRIMARY KEY (`REGISTRATIONID`);

--
-- Indeks untuk tabel `tblprogress`
--
ALTER TABLE `tblprogress`
  ADD PRIMARY KEY (`id_progress`);

--
-- Indeks untuk tabel `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`USERID`);

--
-- Indeks untuk tabel `tbl_curriculum_vitae`
--
ALTER TABLE `tbl_curriculum_vitae`
  ADD PRIMARY KEY (`id_cv`);

--
-- Indeks untuk tabel `tbl_user_progress`
--
ALTER TABLE `tbl_user_progress`
  ADD PRIMARY KEY (`id_user_progress`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tblapplicants`
--
ALTER TABLE `tblapplicants`
  MODIFY `APPLICANTID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2019021;

--
-- AUTO_INCREMENT untuk tabel `tblassesment`
--
ALTER TABLE `tblassesment`
  MODIFY `ASSESMENTID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tblassesmentlist`
--
ALTER TABLE `tblassesmentlist`
  MODIFY `ASSESMENTLISTID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tblassesmentopt`
--
ALTER TABLE `tblassesmentopt`
  MODIFY `ASSESMENTOPTID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `tblassesmentresult`
--
ALTER TABLE `tblassesmentresult`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tblattachmentfile`
--
ALTER TABLE `tblattachmentfile`
  MODIFY `FILEID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- AUTO_INCREMENT untuk tabel `tblautonumbers`
--
ALTER TABLE `tblautonumbers`
  MODIFY `AUTOID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `CATEGORYID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `tblcompany`
--
ALTER TABLE `tblcompany`
  MODIFY `COMPANYID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tblemployees`
--
ALTER TABLE `tblemployees`
  MODIFY `INCID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT untuk tabel `tblfeedback`
--
ALTER TABLE `tblfeedback`
  MODIFY `FEEDBACKID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tblinterview`
--
ALTER TABLE `tblinterview`
  MODIFY `INTERVIEWID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbljob`
--
ALTER TABLE `tbljob`
  MODIFY `JOBID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbljobregistration`
--
ALTER TABLE `tbljobregistration`
  MODIFY `REGISTRATIONID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tblprogress`
--
ALTER TABLE `tblprogress`
  MODIFY `id_progress` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_curriculum_vitae`
--
ALTER TABLE `tbl_curriculum_vitae`
  MODIFY `id_cv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_user_progress`
--
ALTER TABLE `tbl_user_progress`
  MODIFY `id_user_progress` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
