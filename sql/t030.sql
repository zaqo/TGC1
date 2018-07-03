-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июл 04 2018 г., 00:44
-- Версия сервера: 10.1.31-MariaDB
-- Версия PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `tgc1_users`
--

-- --------------------------------------------------------

--
-- Структура таблицы `t030`
--

CREATE TABLE `t030` (
  `id` int(11) NOT NULL,
  `valuation_class` int(4) NOT NULL,
  `mc` varchar(3) NOT NULL,
  `cost_type1` int(11) NOT NULL COMMENT 'ID from cost table',
  `cost_type2` int(11) NOT NULL COMMENT 'ID from cost table',
  `bookedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isValid` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='T030 from SAP ERP';

--
-- Дамп данных таблицы `t030`
--

INSERT INTO `t030` (`id`, `valuation_class`, `mc`, `cost_type1`, `cost_type2`, `bookedOn`, `isValid`) VALUES
(1, 1220, 'AUF', 301, 301, '2018-06-30 17:29:46', 1),
(2, 1011, 'REM', 34, 34, '2018-06-30 17:29:47', 1),
(3, 1040, 'REM', 55, 55, '2018-06-30 17:29:47', 1),
(4, 1050, 'REM', 57, 57, '2018-06-30 17:29:47', 1),
(5, 1061, 'REM', 59, 59, '2018-06-30 17:29:47', 1),
(6, 1062, 'REM', 61, 61, '2018-06-30 17:29:47', 1),
(7, 1063, 'REM', 63, 63, '2018-06-30 17:29:47', 1),
(8, 1064, 'REM', 65, 65, '2018-06-30 17:29:47', 1),
(9, 1070, 'REM', 67, 67, '2018-06-30 17:29:47', 1),
(10, 1080, 'REM', 69, 69, '2018-06-30 17:29:47', 1),
(11, 1090, 'REM', 71, 71, '2018-06-30 17:29:47', 1),
(12, 1100, 'REM', 73, 73, '2018-06-30 17:29:47', 1),
(13, 1110, 'REM', 75, 75, '2018-06-30 17:29:47', 1),
(14, 1120, 'REM', 77, 77, '2018-06-30 17:29:47', 1),
(15, 1130, 'REM', 81, 81, '2018-06-30 17:29:47', 1),
(16, 1150, 'REM', 85, 85, '2018-06-30 17:29:47', 1),
(17, 1161, 'REM', 87, 87, '2018-06-30 17:29:47', 1),
(18, 1163, 'REM', 89, 89, '2018-06-30 17:29:47', 1),
(19, 1170, 'REM', 91, 91, '2018-06-30 17:29:47', 1),
(20, 1180, 'REM', 93, 93, '2018-06-30 17:29:47', 1),
(21, 1190, 'REM', 95, 95, '2018-06-30 17:29:47', 1),
(22, 1210, 'REM', 98, 98, '2018-06-30 17:29:47', 1),
(23, 1220, 'REM', 79, 79, '2018-06-30 17:29:47', 1),
(24, 3500, 'REM', 167, 167, '2018-06-30 17:29:47', 1),
(25, 3501, 'REM', 164, 164, '2018-06-30 17:29:47', 1),
(26, 3502, 'REM', 165, 165, '2018-06-30 17:29:47', 1),
(27, 3503, 'REM', 166, 166, '2018-06-30 17:29:47', 1),
(28, 3606, 'REM', 168, 168, '2018-06-30 17:29:47', 1),
(29, 3610, 'REM', 65, 65, '2018-06-30 17:29:47', 1),
(30, 4111, 'S10', 41, 41, '2018-06-30 17:29:47', 1),
(31, 4112, 'S10', 42, 42, '2018-06-30 17:29:47', 1),
(32, 4113, 'S10', 43, 43, '2018-06-30 17:29:47', 1),
(33, 4131, 'S10', 45, 45, '2018-06-30 17:29:47', 1),
(34, 4132, 'S10', 46, 46, '2018-06-30 17:29:47', 1),
(35, 4133, 'S10', 47, 47, '2018-06-30 17:29:47', 1),
(36, 4134, 'S10', 48, 48, '2018-06-30 17:29:47', 1),
(37, 700, 'VAX', 326, 326, '2018-06-30 17:29:47', 1),
(38, 1011, 'VAX', 330, 330, '2018-06-30 17:29:47', 1),
(39, 1012, 'VAX', 330, 330, '2018-06-30 17:29:47', 1),
(40, 1013, 'VAX', 330, 330, '2018-06-30 17:29:47', 1),
(41, 1014, 'VAX', 330, 330, '2018-06-30 17:29:47', 1),
(42, 1015, 'VAX', 330, 330, '2018-06-30 17:29:47', 1),
(43, 1040, 'VAX', 330, 330, '2018-06-30 17:29:47', 1),
(44, 1050, 'VAX', 330, 330, '2018-06-30 17:29:47', 1),
(45, 1061, 'VAX', 330, 330, '2018-06-30 17:29:47', 1),
(46, 1062, 'VAX', 330, 330, '2018-06-30 17:29:47', 1),
(47, 1063, 'VAX', 330, 330, '2018-06-30 17:29:47', 1),
(48, 1064, 'VAX', 330, 330, '2018-06-30 17:29:47', 1),
(49, 1070, 'VAX', 330, 330, '2018-06-30 17:29:47', 1),
(50, 1080, 'VAX', 330, 330, '2018-06-30 17:29:47', 1),
(51, 1090, 'VAX', 330, 330, '2018-06-30 17:29:47', 1),
(52, 1100, 'VAX', 330, 330, '2018-06-30 17:29:47', 1),
(53, 1110, 'VAX', 330, 330, '2018-06-30 17:29:47', 1),
(54, 1120, 'VAX', 330, 330, '2018-06-30 17:29:47', 1),
(55, 1130, 'VAX', 330, 330, '2018-06-30 17:29:47', 1),
(56, 1140, 'VAX', 330, 330, '2018-06-30 17:29:47', 1),
(57, 1150, 'VAX', 330, 330, '2018-06-30 17:29:47', 1),
(58, 1161, 'VAX', 330, 330, '2018-06-30 17:29:47', 1),
(59, 1163, 'VAX', 330, 330, '2018-06-30 17:29:47', 1),
(60, 1170, 'VAX', 330, 330, '2018-06-30 17:29:47', 1),
(61, 1180, 'VAX', 330, 330, '2018-06-30 17:29:47', 1),
(62, 1190, 'VAX', 330, 330, '2018-06-30 17:29:47', 1),
(63, 1200, 'VAX', 330, 330, '2018-06-30 17:29:47', 1),
(64, 1210, 'VAX', 330, 330, '2018-06-30 17:29:47', 1),
(65, 1220, 'VAX', 330, 330, '2018-06-30 17:29:47', 1),
(66, 4104, 'VAX', 330, 330, '2018-06-30 17:29:47', 1),
(67, 700, 'VAY', 326, 326, '2018-06-30 17:29:47', 1),
(68, 1011, 'VAY', 330, 330, '2018-06-30 17:29:47', 1),
(69, 1012, 'VAY', 330, 330, '2018-06-30 17:29:47', 1),
(70, 1013, 'VAY', 330, 330, '2018-06-30 17:29:47', 1),
(71, 1014, 'VAY', 330, 330, '2018-06-30 17:29:47', 1),
(72, 1015, 'VAY', 330, 330, '2018-06-30 17:29:47', 1),
(73, 1040, 'VAY', 330, 330, '2018-06-30 17:29:47', 1),
(74, 1050, 'VAY', 330, 330, '2018-06-30 17:29:47', 1),
(75, 1061, 'VAY', 330, 330, '2018-06-30 17:29:47', 1),
(76, 1062, 'VAY', 330, 330, '2018-06-30 17:29:47', 1),
(77, 1063, 'VAY', 330, 330, '2018-06-30 17:29:47', 1),
(78, 1064, 'VAY', 330, 330, '2018-06-30 17:29:47', 1),
(79, 1070, 'VAY', 330, 330, '2018-06-30 17:29:47', 1),
(80, 1080, 'VAY', 330, 330, '2018-06-30 17:29:47', 1),
(81, 1090, 'VAY', 330, 330, '2018-06-30 17:29:47', 1),
(82, 1100, 'VAY', 330, 330, '2018-06-30 17:29:47', 1),
(83, 1110, 'VAY', 330, 330, '2018-06-30 17:29:47', 1),
(84, 1120, 'VAY', 330, 330, '2018-06-30 17:29:47', 1),
(85, 1130, 'VAY', 330, 330, '2018-06-30 17:29:47', 1),
(86, 1140, 'VAY', 330, 330, '2018-06-30 17:29:47', 1),
(87, 1150, 'VAY', 330, 330, '2018-06-30 17:29:47', 1),
(88, 1161, 'VAY', 330, 330, '2018-06-30 17:29:47', 1),
(89, 1163, 'VAY', 330, 330, '2018-06-30 17:29:47', 1),
(90, 1170, 'VAY', 330, 330, '2018-06-30 17:29:47', 1),
(91, 1180, 'VAY', 330, 330, '2018-06-30 17:29:47', 1),
(92, 1190, 'VAY', 330, 330, '2018-06-30 17:29:47', 1),
(93, 1200, 'VAY', 330, 330, '2018-06-30 17:29:47', 1),
(94, 1210, 'VAY', 330, 330, '2018-06-30 17:29:47', 1),
(95, 1220, 'VAY', 330, 330, '2018-06-30 17:29:47', 1),
(96, 4104, 'VAY', 330, 330, '2018-06-30 17:29:47', 1),
(97, 700, 'VBR', 284, 284, '2018-06-30 17:29:47', 1),
(98, 801, 'VBR', 296, 296, '2018-06-30 17:29:47', 1),
(99, 802, 'VBR', 296, 296, '2018-06-30 17:29:47', 1),
(100, 804, 'VBR', 282, 282, '2018-06-30 17:29:47', 1),
(101, 805, 'VBR', 295, 295, '2018-06-30 17:29:47', 1),
(102, 806, 'VBR', 285, 285, '2018-06-30 17:29:47', 1),
(103, 807, 'VBR', 297, 297, '2018-06-30 17:29:47', 1),
(104, 1011, 'VBR', 33, 33, '2018-06-30 17:29:47', 1),
(105, 1012, 'VBR', 35, 35, '2018-06-30 17:29:47', 1),
(106, 1013, 'VBR', 36, 36, '2018-06-30 17:29:47', 1),
(107, 1014, 'VBR', 38, 38, '2018-06-30 17:29:47', 1),
(108, 1015, 'VBR', 40, 40, '2018-06-30 17:29:47', 1),
(109, 1040, 'VBR', 54, 54, '2018-06-30 17:29:47', 1),
(110, 1050, 'VBR', 56, 56, '2018-06-30 17:29:47', 1),
(111, 1061, 'VBR', 58, 58, '2018-06-30 17:29:47', 1),
(112, 1062, 'VBR', 60, 60, '2018-06-30 17:29:47', 1),
(113, 1063, 'VBR', 62, 62, '2018-06-30 17:29:47', 1),
(114, 1064, 'VBR', 64, 64, '2018-06-30 17:29:47', 1),
(115, 1070, 'VBR', 66, 66, '2018-06-30 17:29:47', 1),
(116, 1080, 'VBR', 68, 68, '2018-06-30 17:29:47', 1),
(117, 1090, 'VBR', 70, 70, '2018-06-30 17:29:47', 1),
(118, 1100, 'VBR', 72, 72, '2018-06-30 17:29:47', 1),
(119, 1110, 'VBR', 74, 74, '2018-06-30 17:29:47', 1),
(120, 1120, 'VBR', 76, 76, '2018-06-30 17:29:47', 1),
(121, 1130, 'VBR', 80, 80, '2018-06-30 17:29:47', 1),
(122, 1140, 'VBR', 82, 82, '2018-06-30 17:29:47', 1),
(123, 1150, 'VBR', 84, 84, '2018-06-30 17:29:47', 1),
(124, 1161, 'VBR', 86, 86, '2018-06-30 17:29:47', 1),
(125, 1163, 'VBR', 88, 88, '2018-06-30 17:29:47', 1),
(126, 1170, 'VBR', 90, 90, '2018-06-30 17:29:47', 1),
(127, 1180, 'VBR', 92, 92, '2018-06-30 17:29:47', 1),
(128, 1190, 'VBR', 94, 94, '2018-06-30 17:29:47', 1),
(129, 1200, 'VBR', 96, 96, '2018-06-30 17:29:47', 1),
(130, 1210, 'VBR', 97, 97, '2018-06-30 17:29:47', 1),
(131, 1220, 'VBR', 78, 78, '2018-06-30 17:29:47', 1),
(132, 3101, 'VBR', 33, 33, '2018-06-30 17:29:47', 1),
(133, 3105, 'VBR', 53, 53, '2018-06-30 17:29:47', 1),
(134, 3501, 'VBR', 164, 164, '2018-06-30 17:29:47', 1),
(135, 3502, 'VBR', 172, 172, '2018-06-30 17:29:47', 1),
(136, 3504, 'VBR', 222, 222, '2018-06-30 17:29:47', 1),
(137, 3505, 'VBR', 223, 223, '2018-06-30 17:29:48', 1),
(138, 3506, 'VBR', 224, 224, '2018-06-30 17:29:48', 1),
(139, 3507, 'VBR', 169, 169, '2018-06-30 17:29:48', 1),
(140, 3508, 'VBR', 170, 170, '2018-06-30 17:29:48', 1),
(141, 3509, 'VBR', 190, 190, '2018-06-30 17:29:48', 1),
(142, 3510, 'VBR', 191, 191, '2018-06-30 17:29:48', 1),
(143, 3511, 'VBR', 192, 192, '2018-06-30 17:29:48', 1),
(144, 3512, 'VBR', 193, 193, '2018-06-30 17:29:48', 1),
(145, 3513, 'VBR', 195, 195, '2018-06-30 17:29:48', 1),
(146, 3514, 'VBR', 186, 186, '2018-06-30 17:29:48', 1),
(147, 3515, 'VBR', 187, 187, '2018-06-30 17:29:48', 1),
(148, 3516, 'VBR', 188, 188, '2018-06-30 17:29:48', 1),
(149, 3517, 'VBR', 174, 174, '2018-06-30 17:29:48', 1),
(150, 3518, 'VBR', 175, 175, '2018-06-30 17:29:48', 1),
(151, 3519, 'VBR', 176, 176, '2018-06-30 17:29:48', 1),
(152, 3520, 'VBR', 177, 177, '2018-06-30 17:29:48', 1),
(153, 3521, 'VBR', 178, 178, '2018-06-30 17:29:48', 1),
(154, 3522, 'VBR', 179, 179, '2018-06-30 17:29:48', 1),
(155, 3523, 'VBR', 185, 185, '2018-06-30 17:29:48', 1),
(156, 3524, 'VBR', 180, 180, '2018-06-30 17:29:48', 1),
(157, 3525, 'VBR', 181, 181, '2018-06-30 17:29:48', 1),
(158, 3526, 'VBR', 215, 215, '2018-06-30 17:29:48', 1),
(159, 3527, 'VBR', 213, 213, '2018-06-30 17:29:48', 1),
(160, 3528, 'VBR', 214, 214, '2018-06-30 17:29:48', 1),
(161, 3529, 'VBR', 216, 216, '2018-06-30 17:29:48', 1),
(162, 3530, 'VBR', 218, 218, '2018-06-30 17:29:48', 1),
(163, 3531, 'VBR', 219, 219, '2018-06-30 17:29:48', 1),
(164, 3532, 'VBR', 220, 220, '2018-06-30 17:29:48', 1),
(165, 3533, 'VBR', 221, 221, '2018-06-30 17:29:48', 1),
(166, 3534, 'VBR', 225, 225, '2018-06-30 17:29:48', 1),
(167, 3535, 'VBR', 226, 226, '2018-06-30 17:29:48', 1),
(168, 3536, 'VBR', 227, 227, '2018-06-30 17:29:48', 1),
(169, 3537, 'VBR', 230, 230, '2018-06-30 17:29:48', 1),
(170, 3538, 'VBR', 231, 231, '2018-06-30 17:29:48', 1),
(171, 3539, 'VBR', 229, 229, '2018-06-30 17:29:48', 1),
(172, 3540, 'VBR', 228, 228, '2018-06-30 17:29:48', 1),
(173, 3541, 'VBR', 272, 272, '2018-06-30 17:29:48', 1),
(174, 3542, 'VBR', 274, 274, '2018-06-30 17:29:48', 1),
(175, 3543, 'VBR', 254, 254, '2018-06-30 17:29:48', 1),
(176, 3544, 'VBR', 251, 251, '2018-06-30 17:29:48', 1),
(177, 3545, 'VBR', 233, 233, '2018-06-30 17:29:48', 1),
(178, 3546, 'VBR', 234, 234, '2018-06-30 17:29:48', 1),
(179, 3547, 'VBR', 235, 235, '2018-06-30 17:29:48', 1),
(180, 3548, 'VBR', 236, 236, '2018-06-30 17:29:48', 1),
(181, 3549, 'VBR', 237, 237, '2018-06-30 17:29:48', 1),
(182, 3550, 'VBR', 238, 238, '2018-06-30 17:29:48', 1),
(183, 3551, 'VBR', 239, 239, '2018-06-30 17:29:48', 1),
(184, 3552, 'VBR', 240, 240, '2018-06-30 17:29:48', 1),
(185, 3553, 'VBR', 242, 242, '2018-06-30 17:29:48', 1),
(186, 3554, 'VBR', 243, 243, '2018-06-30 17:29:48', 1),
(187, 3555, 'VBR', 244, 244, '2018-06-30 17:29:48', 1),
(188, 3556, 'VBR', 245, 245, '2018-06-30 17:29:48', 1),
(189, 3557, 'VBR', 246, 246, '2018-06-30 17:29:48', 1),
(190, 3558, 'VBR', 247, 247, '2018-06-30 17:29:48', 1),
(191, 3559, 'VBR', 196, 196, '2018-06-30 17:29:48', 1),
(192, 3560, 'VBR', 197, 197, '2018-06-30 17:29:48', 1),
(193, 3561, 'VBR', 198, 198, '2018-06-30 17:29:48', 1),
(194, 3562, 'VBR', 173, 173, '2018-06-30 17:29:48', 1),
(195, 3563, 'VBR', 199, 199, '2018-06-30 17:29:48', 1),
(196, 3564, 'VBR', 200, 200, '2018-06-30 17:29:48', 1),
(197, 3565, 'VBR', 253, 253, '2018-06-30 17:29:48', 1),
(198, 3566, 'VBR', 217, 217, '2018-06-30 17:29:48', 1),
(199, 3567, 'VBR', 250, 250, '2018-06-30 17:29:48', 1),
(200, 3568, 'VBR', 201, 201, '2018-06-30 17:29:48', 1),
(201, 3569, 'VBR', 202, 202, '2018-06-30 17:29:48', 1),
(202, 3570, 'VBR', 203, 203, '2018-06-30 17:29:48', 1),
(203, 3571, 'VBR', 204, 204, '2018-06-30 17:29:48', 1),
(204, 3572, 'VBR', 205, 205, '2018-06-30 17:29:48', 1),
(205, 3573, 'VBR', 206, 206, '2018-06-30 17:29:48', 1),
(206, 3574, 'VBR', 207, 207, '2018-06-30 17:29:48', 1),
(207, 3575, 'VBR', 208, 208, '2018-06-30 17:29:48', 1),
(208, 3576, 'VBR', 257, 257, '2018-06-30 17:29:48', 1),
(209, 3577, 'VBR', 258, 258, '2018-06-30 17:29:48', 1),
(210, 3578, 'VBR', 209, 209, '2018-06-30 17:29:48', 1),
(211, 3579, 'VBR', 281, 281, '2018-06-30 17:29:48', 1),
(212, 3580, 'VBR', 283, 283, '2018-06-30 17:29:48', 1),
(213, 3581, 'VBR', 287, 287, '2018-06-30 17:29:48', 1),
(214, 3582, 'VBR', 288, 288, '2018-06-30 17:29:48', 1),
(215, 3583, 'VBR', 289, 289, '2018-06-30 17:29:48', 1),
(216, 3584, 'VBR', 290, 290, '2018-06-30 17:29:48', 1),
(217, 3585, 'VBR', 210, 210, '2018-06-30 17:29:48', 1),
(218, 3586, 'VBR', 248, 248, '2018-06-30 17:29:48', 1),
(219, 3587, 'VBR', 249, 249, '2018-06-30 17:29:48', 1),
(220, 3588, 'VBR', 293, 293, '2018-06-30 17:29:48', 1),
(221, 3589, 'VBR', 299, 299, '2018-06-30 17:29:48', 1),
(222, 3590, 'VBR', 189, 189, '2018-06-30 17:29:48', 1),
(223, 3591, 'VBR', 268, 268, '2018-06-30 17:29:48', 1),
(224, 3592, 'VBR', 269, 269, '2018-06-30 17:29:48', 1),
(225, 3593, 'VBR', 270, 270, '2018-06-30 17:29:48', 1),
(226, 3594, 'VBR', 271, 271, '2018-06-30 17:29:48', 1),
(227, 3595, 'VBR', 280, 280, '2018-06-30 17:29:48', 1),
(228, 3596, 'VBR', 266, 266, '2018-06-30 17:29:48', 1),
(229, 3597, 'VBR', 211, 211, '2018-06-30 17:29:48', 1),
(230, 3598, 'VBR', 212, 212, '2018-06-30 17:29:48', 1),
(231, 3599, 'VBR', 255, 255, '2018-06-30 17:29:48', 1),
(232, 3600, 'VBR', 256, 256, '2018-06-30 17:29:48', 1),
(233, 3601, 'VBR', 273, 273, '2018-06-30 17:29:48', 1),
(234, 3602, 'VBR', 275, 275, '2018-06-30 17:29:48', 1),
(235, 3603, 'VBR', 276, 276, '2018-06-30 17:29:48', 1),
(236, 3604, 'VBR', 194, 194, '2018-06-30 17:29:48', 1),
(237, 3605, 'VBR', 183, 183, '2018-06-30 17:29:48', 1),
(238, 3607, 'VBR', 171, 171, '2018-06-30 17:29:48', 1),
(239, 3608, 'VBR', 265, 265, '2018-06-30 17:29:48', 1),
(240, 3609, 'VBR', 182, 182, '2018-06-30 17:29:48', 1),
(241, 3610, 'VBR', 56, 56, '2018-06-30 17:29:48', 1),
(242, 3611, 'VBR', 184, 184, '2018-06-30 17:29:48', 1),
(243, 3612, 'VBR', 232, 232, '2018-06-30 17:29:48', 1),
(244, 4114, 'VBR', 44, 44, '2018-06-30 17:29:48', 1),
(245, 4121, 'VBR', 49, 49, '2018-06-30 17:29:48', 1),
(246, 4122, 'VBR', 50, 50, '2018-06-30 17:29:48', 1),
(247, 4135, 'VBR', 52, 52, '2018-06-30 17:29:48', 1),
(248, 9100, 'VBR', 351, 351, '2018-06-30 17:29:48', 1),
(249, 9101, 'VBR', 352, 352, '2018-06-30 17:29:48', 1),
(250, 9103, 'VBR', 350, 350, '2018-06-30 17:29:48', 1),
(251, 9104, 'VBR', 348, 348, '2018-06-30 17:29:48', 1),
(252, 9109, 'VBR', 278, 278, '2018-06-30 17:29:48', 1),
(253, 1040, 'X01', 301, 301, '2018-06-30 17:29:48', 1),
(254, 1050, 'X01', 301, 301, '2018-06-30 17:29:48', 1),
(255, 1061, 'X01', 301, 301, '2018-06-30 17:29:48', 1),
(256, 1062, 'X01', 301, 301, '2018-06-30 17:29:48', 1),
(257, 1063, 'X01', 301, 301, '2018-06-30 17:29:48', 1),
(258, 1064, 'X01', 301, 301, '2018-06-30 17:29:48', 1),
(259, 1070, 'X01', 301, 301, '2018-06-30 17:29:48', 1),
(260, 1080, 'X01', 301, 301, '2018-06-30 17:29:48', 1),
(261, 1090, 'X01', 301, 301, '2018-06-30 17:29:48', 1),
(262, 1100, 'X01', 301, 301, '2018-06-30 17:29:48', 1),
(263, 1110, 'X01', 301, 301, '2018-06-30 17:29:48', 1),
(264, 1120, 'X01', 301, 301, '2018-06-30 17:29:48', 1),
(265, 1130, 'X01', 301, 301, '2018-06-30 17:29:48', 1),
(266, 1140, 'X01', 301, 301, '2018-06-30 17:29:48', 1),
(267, 1150, 'X01', 301, 301, '2018-06-30 17:29:48', 1),
(268, 1161, 'X01', 301, 301, '2018-06-30 17:29:48', 1),
(269, 1163, 'X01', 301, 301, '2018-06-30 17:29:48', 1),
(270, 1170, 'X01', 301, 301, '2018-06-30 17:29:48', 1),
(271, 1180, 'X01', 301, 301, '2018-06-30 17:29:48', 1),
(272, 1190, 'X01', 301, 301, '2018-06-30 17:29:48', 1),
(273, 1200, 'X01', 301, 301, '2018-06-30 17:29:48', 1),
(274, 1210, 'X01', 301, 301, '2018-06-30 17:29:48', 1),
(275, 1220, 'X01', 301, 301, '2018-06-30 17:29:48', 1),
(276, 700, 'X09', 284, 284, '2018-06-30 17:29:48', 1),
(277, 1015, 'X09', 40, 40, '2018-06-30 17:29:48', 1),
(278, 1040, 'X09', 54, 54, '2018-06-30 17:29:48', 1),
(279, 1050, 'X09', 56, 56, '2018-06-30 17:29:48', 1),
(280, 1061, 'X09', 58, 58, '2018-06-30 17:29:48', 1),
(281, 1062, 'X09', 60, 60, '2018-06-30 17:29:48', 1),
(282, 1063, 'X09', 62, 62, '2018-06-30 17:29:48', 1),
(283, 1064, 'X09', 64, 64, '2018-06-30 17:29:48', 1),
(284, 1070, 'X09', 66, 66, '2018-06-30 17:29:48', 1),
(285, 1080, 'X09', 68, 68, '2018-06-30 17:29:48', 1),
(286, 1090, 'X09', 70, 70, '2018-06-30 17:29:48', 1),
(287, 1100, 'X09', 72, 72, '2018-06-30 17:29:48', 1),
(288, 1110, 'X09', 74, 74, '2018-06-30 17:29:48', 1),
(289, 1120, 'X09', 76, 76, '2018-06-30 17:29:48', 1),
(290, 1130, 'X09', 80, 80, '2018-06-30 17:29:48', 1),
(291, 1150, 'X09', 84, 84, '2018-06-30 17:29:48', 1),
(292, 1161, 'X09', 86, 86, '2018-06-30 17:29:48', 1),
(293, 1163, 'X09', 88, 88, '2018-06-30 17:29:48', 1),
(294, 1170, 'X09', 90, 90, '2018-06-30 17:29:48', 1),
(295, 1180, 'X09', 92, 92, '2018-06-30 17:29:48', 1),
(296, 1190, 'X09', 94, 94, '2018-06-30 17:29:48', 1),
(297, 1210, 'X09', 97, 97, '2018-06-30 17:29:48', 1),
(298, 1220, 'X09', 78, 78, '2018-06-30 17:29:48', 1),
(299, 1012, 'Z11', 341, 341, '2018-06-30 17:29:48', 1),
(300, 1013, 'Z11', 341, 341, '2018-06-30 17:29:48', 1),
(301, 1014, 'Z11', 341, 341, '2018-06-30 17:29:48', 1),
(302, 1040, 'Z11', 341, 341, '2018-06-30 17:29:48', 1),
(303, 1050, 'Z11', 341, 341, '2018-06-30 17:29:48', 1),
(304, 1061, 'Z11', 341, 341, '2018-06-30 17:29:48', 1),
(305, 1062, 'Z11', 341, 341, '2018-06-30 17:29:48', 1),
(306, 1063, 'Z11', 341, 341, '2018-06-30 17:29:48', 1),
(307, 1064, 'Z11', 341, 341, '2018-06-30 17:29:48', 1),
(308, 1070, 'Z11', 341, 341, '2018-06-30 17:29:48', 1),
(309, 1080, 'Z11', 341, 341, '2018-06-30 17:29:48', 1),
(310, 1090, 'Z11', 341, 341, '2018-06-30 17:29:48', 1),
(311, 1100, 'Z11', 341, 341, '2018-06-30 17:29:48', 1),
(312, 1110, 'Z11', 341, 341, '2018-06-30 17:29:48', 1),
(313, 1120, 'Z11', 341, 341, '2018-06-30 17:29:49', 1),
(314, 1130, 'Z11', 341, 341, '2018-06-30 17:29:49', 1),
(315, 1140, 'Z11', 341, 341, '2018-06-30 17:29:49', 1),
(316, 1150, 'Z11', 341, 341, '2018-06-30 17:29:49', 1),
(317, 1161, 'Z11', 341, 341, '2018-06-30 17:29:49', 1),
(318, 1163, 'Z11', 341, 341, '2018-06-30 17:29:49', 1),
(319, 1170, 'Z11', 341, 341, '2018-06-30 17:29:49', 1),
(320, 1180, 'Z11', 341, 341, '2018-06-30 17:29:49', 1),
(321, 1190, 'Z11', 341, 341, '2018-06-30 17:29:49', 1),
(322, 1200, 'Z11', 341, 341, '2018-06-30 17:29:49', 1),
(323, 1210, 'Z11', 341, 341, '2018-06-30 17:29:49', 1),
(324, 1220, 'Z11', 341, 341, '2018-06-30 17:29:49', 1),
(325, 1013, 'ZCH', 78, 78, '2018-06-30 17:29:49', 1),
(326, 1014, 'ZCH', 78, 78, '2018-06-30 17:29:49', 1),
(327, 1015, 'ZCH', 78, 78, '2018-06-30 17:29:49', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `t030`
--
ALTER TABLE `t030`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `t030`
--
ALTER TABLE `t030`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=328;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
