-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июл 31 2018 г., 08:31
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
-- Структура таблицы `org_dpts`
--

CREATE TABLE `org_dpts` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `plant_id` int(11) NOT NULL,
  `code` int(11) DEFAULT NULL COMMENT 'Org chart unit'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Подразделения внутри заводов';

--
-- Дамп данных таблицы `org_dpts`
--

INSERT INTO `org_dpts` (`id`, `name`, `plant_id`, `code`) VALUES
(100, 'Оперативный персонал 9 ГЭС', 1, 50072483),
(101, '12 ГЭС', 1, 50072484),
(102, 'Электромашинный цех 12 ГЭС', 1, 50072485),
(103, 'Отдел материально-технического снабжения', 1, 50072477),
(104, '6 ГЭС', 1, 50072744),
(105, '6 ГЭС', 1, 50072478),
(106, 'Электромашинный цех 6 ГЭС', 1, 50072479),
(107, 'Оперативный персонал 6 ГЭС', 1, 50072480),
(108, '9 ГЭС', 1, 50072481),
(109, 'Электромашинный цех 9 ГЭС', 1, 50072482),
(110, 'Автотранспортный участок', 1, 50072407),
(111, '6 ГЭС', 1, 50072750),
(112, 'Руководство', 23, 50072409),
(113, 'Бухгалтерия', 23, 50072410),
(114, 'Оперативный персонал 12 ГЭС', 1, 50072486),
(115, 'Электротехническая производственная лабо', 1, 50072487),
(116, '6 ГЭС', 1, 50072745),
(117, '9 ГЭС', 1, 50072746),
(118, '12 ГЭС', 1, 50072747),
(119, 'Гидротехнический цех', 1, 50072488),
(120, 'Гидротехнический участок 6 ГЭС', 1, 50072489),
(121, 'Гидротехнический цех 9 ГЭС', 1, 50072490),
(122, 'Гидротехнический цех 12 ГЭС', 1, 50072491),
(123, 'Производственно-технический отдел', 1, 50072476),
(124, 'Руководство', 1, 50072473),
(125, 'Административный отдел', 1, 50072474),
(126, 'Бухгалтерия', 1, 50072475),
(127, 'Склад', 23, 50072411),
(128, 'Служба логистики и обеспечения производс', 2, 50072426),
(129, '(договорная группа)', 2, 50072769),
(130, '(участок общестанционных и общецеховых р', 2, 50072770),
(131, 'Группа по информационным технологиям и а', 2, 50072427),
(132, 'Оперативная служба', 2, 50072428),
(133, 'Группа производственного контроля и охра', 2, 50072422),
(134, 'Планово-экономическая группа', 2, 50072423),
(135, 'Административный отдел', 2, 50072424),
(136, 'Бухгалтерия', 2, 50072425),
(137, 'Топливно-транспортный цех', 2, 50072431),
(138, 'Производственно-технический отдел', 2, 50072429),
(139, 'Отдел подготовки и проведения ремонтов', 2, 50072430),
(140, 'Руководство', 2, 50072421),
(141, 'Отдел сетевых технологий', 23, 50072415),
(142, 'Служба телемеханики и АСКУЭ', 23, 50072417),
(143, 'Отдел систем учета электроэнергии и теле', 23, 50072761),
(144, 'Отдел сопровождения ИТ-бюджета', 23, 50072413),
(145, 'Сметно-договорная группа', 23, 50072752),
(146, 'Группа планирования и контроля инвестици', 23, 50072753),
(147, 'Группа планирования и контроля сметы зат', 23, 50072754),
(148, 'Служба обслуживания ПТС', 23, 50072414),
(149, 'Группа учета и логистики', 23, 50072755),
(150, 'Группа поддержки программных комплексов', 23, 50072995),
(151, 'Центр внедрения', 23, 50072420),
(152, 'Центр SAP-проектов', 23, 50089868),
(153, 'Служба телефонии', 23, 50072419),
(154, 'Отдел организации физической защиты объе', 3, 50072970),
(155, 'Департамент по обеспечению физической за', 3, 50072798),
(156, 'Отдел информационной работы', 3, 50072971),
(157, 'Группа по работе с дебиторской задолженн', 3, 50073059),
(158, 'Отдел организации защиты корпоративных и', 3, 50072972),
(159, 'Отдел информационной безопасности', 3, 50072969),
(160, 'Блок по ресурсообеспечению', 3, 50072455),
(161, 'Управление ресурсообеспечения и закупочн', 3, 50072800),
(162, 'Отдел организации закупочной деятельност', 3, 50072968),
(163, 'Группа планирования', 3, 50073058),
(164, 'Отдел НОРЭМ', 3, 50072977),
(165, 'Отдел расчетов и договорной работы', 3, 50072975),
(166, 'Департамент по сбыту тепловой энергии', 3, 50072796),
(167, 'Отдел продаж тепловой энергии', 3, 50072974),
(168, 'Отдел маркетинга рынка тепловой энергии', 3, 50072973),
(169, 'Блок по корпоративной защите', 3, 50072454),
(170, 'Департамент по защите корпоративных инте', 3, 50072797),
(171, 'Отдел финансового планирования и управле', 3, 50072965),
(172, 'Казначейство', 3, 50072805),
(173, 'Отдел платежей', 3, 50072964),
(174, 'Финансовый департамент', 3, 50072804),
(175, 'Отдел по работе с банками', 3, 50072963),
(176, 'Департамент по экономике', 3, 50072806),
(177, 'Планово-экономический отдел', 3, 50072962),
(178, 'Отдел тарифного регулирования', 3, 50072961),
(179, 'Центральная бухгалтерия', 3, 50072807),
(180, 'Блок заместителя главного бухгалтера 1', 3, 50072991),
(181, 'Группа обеспечения закупочных процедур', 3, 50073057),
(182, 'Группа договоров и контроля исполнения Г', 3, 50073056),
(183, 'Отдел комплектации производства', 3, 50072967),
(184, 'Группа топливообеспечения', 3, 50072801),
(185, 'Группа водопользования', 3, 50072802),
(186, 'Служба транспорта', 3, 50072803),
(187, 'Аппарат управления филиала Невский', 4, 50072169),
(188, 'Отдел финансового контроля', 3, 50072966),
(189, 'Отдел планирования и отчетности', 3, 50072978),
(190, 'Служба внутреннего аудита', 3, 50072785),
(191, 'Департамент по правовым вопросам', 3, 50072786),
(192, 'Отдел судебных споров', 3, 50072988),
(193, 'Отдел сопровождения исполнительного прои', 3, 50072987),
(194, 'Отдел правовой экспертизы', 3, 50072986),
(195, 'Административный отдел', 3, 50072787),
(196, 'Сервисный отдел', 3, 50072788),
(197, 'Блок генерального директора', 3, 50072449),
(198, 'Аппарат генерального директора', 3, 50072780),
(199, 'Отдел протокольных и благотворительных м', 3, 50089112),
(200, 'Канцелярия', 3, 50072782),
(201, 'Департамент по связям с общественностью', 3, 50072783),
(202, 'Отдел развития общественных связей', 3, 50072990),
(203, 'Пресс-служба', 3, 50072989),
(204, 'Отдел по гражданской защите и мобилизаци', 3, 50072784),
(205, 'Департамент инвестиций', 3, 50072793),
(206, 'Отдел стратегического планирования', 3, 50072983),
(207, 'Отдел инвестиционных программ и отчетнос', 3, 50072982),
(208, 'Блок по маркетингу и сбыту', 3, 50072453),
(209, 'Департамент по планированию и оперативно', 3, 50072794),
(210, 'Служба энергетических режимов', 3, 50072981),
(211, 'Группа режимов ТЭС', 3, 50073061),
(212, 'Группа режимов ГЭС', 3, 50073060),
(213, 'Департамент по сбыту электроэнергии', 3, 50072795),
(214, 'Блок по персоналу', 3, 50072451),
(215, 'Отдел оплаты и организации труда', 3, 50072789),
(216, 'Отдел кадров', 3, 50072790),
(217, 'Отдел социально-трудовых отношений', 3, 50072791),
(218, 'Блок по развитию', 3, 50072452),
(219, 'Департамент корпоративного управления', 3, 50072792),
(220, 'Отдел акционерного капитала и работы с и', 3, 50072985),
(221, 'Отдел по работе с акционерами', 3, 50072984),
(222, 'Отдел учета расчетов с бюджетами', 3, 50073055),
(223, 'Сектор судебных споров', 4, 50073047),
(224, 'Отдел развития персонала', 4, 50072817),
(225, 'Отдел по работе с потребителями коммунал', 4, 50073002),
(226, 'Учебно-методическая группа', 4, 50072818),
(227, 'Отдел недвижимости', 3, 50073020),
(228, 'Отдел земельных отношений', 3, 50073019),
(229, 'Блок главного инженера', 3, 50072457),
(230, 'Департамент эксплуатации электростанций', 3, 50072809),
(231, 'Служба производственного контроля и наде', 3, 50073018),
(232, 'Служба эксплуатации электростанций', 3, 50073017),
(233, 'Экспертно-техническая группа', 3, 50073049),
(234, 'Группа анализа и отчетности', 3, 50073016),
(235, 'Служба охраны труда', 3, 50073015),
(236, 'Отдел расчетов с персоналом', 3, 50073054),
(237, 'Блок заместителя главного бухгалтера 2', 3, 50073021),
(238, 'Отдел сводной бухгалтерской отчетности п', 3, 50073053),
(239, 'Отдел учета продаж и себестоимости', 3, 50073052),
(240, 'Отдел по подготовке финансовой отчетност', 3, 50073051),
(241, 'Департамент управления имуществом', 3, 50072808),
(242, 'Отдел сопровождения ремонта', 3, 50073010),
(243, 'Блок по капитальному строительству', 3, 50072458),
(244, 'Департамент реализации проектов капиталь', 3, 50072811),
(245, 'Отдел реализации проектов КС', 3, 50073009),
(246, 'Отдел технического перевооружения и реко', 3, 50073008),
(247, 'Отдел сопровождения проектов', 7, 50072895),
(248, 'Сметно-договорной отдел', 3, 50072812),
(249, 'Отдел эффективности использования топлив', 3, 50073014),
(250, 'Группа энергоэффективности', 3, 50073048),
(251, 'Департамент подготовки и проведения ремо', 3, 50072810),
(252, 'Отдел планирования ремонта', 3, 50073013),
(253, 'Группа формирования программ ТОиР', 3, 50090122),
(254, 'Группа формирования программ ТПиР', 3, 50090118),
(255, 'Отдел мониторинга и отчетности', 3, 50073012),
(256, 'Отдел подготовки ремонта', 3, 50073011),
(257, '', 3, 0),
(258, 'Цех тепловой автоматики и измерений', 5, 50072499),
(259, 'Аварийно-ремонтная служба', 5, 50072500),
(260, 'Химический цех', 5, 50072498),
(261, 'Служба логистики и обеспечения производс', 6, 50072509),
(262, 'Планово-экономический отдел', 6, 50072505),
(263, 'Отдел подготовки и проведения ремонтов', 6, 50072508),
(264, 'Группа КС', 6, 50072826),
(265, 'Котлотурбинный цех', 6, 50072510),
(266, 'Производственно-технический отдел', 6, 50072507),
(267, 'Руководство', 6, 50072501),
(268, 'Бухгалтерия', 6, 50072506),
(269, 'Административный отдел', 6, 50072504),
(270, 'Группа производственного контроля и охра', 6, 50072502),
(271, 'Служба логистики и обеспечения производс', 5, 50072494),
(272, 'Бухгалтерия', 5, 50072493),
(273, 'Планово-экономическая группа', 5, 50072492),
(274, 'Группа договоров', 5, 50072899),
(275, 'Отдел подготовки и проведения ремонтов', 5, 50072535),
(276, 'Отдел капитального строительства', 5, 50089033),
(277, 'Топливно-транспортный цех', 5, 50072495),
(278, 'Отдел инженерных систем', 5, 50090762),
(279, 'Группа инструментального контроля', 7, 50072928),
(280, 'Отдел технического надзора', 7, 50072896),
(281, 'Группа планирования и отчетности', 7, 50072929),
(282, 'Дирекция по строительству и технологичес', 7, 50072573),
(283, 'Отдел организации строительства', 5, 50089035),
(284, 'Производственно-технический отдел', 5, 50072578),
(285, 'Административный отдел', 5, 50072577),
(286, 'Руководство', 5, 50072574),
(287, 'Электрический цех', 5, 50072497),
(288, 'Котлотурбинный цех', 5, 50072496),
(289, 'Электротехническая лаборатория', 8, 50072837),
(290, 'Химический цех', 8, 50072529),
(291, 'Лаборатория автоматизированных систем уп', 8, 50072838),
(292, 'Цех тепловой автоматики и измерений', 8, 50072528),
(293, 'Электрический цех', 8, 50072527),
(294, 'Группа производственного контроля и охра', 9, 50072282),
(295, '(группа автоматики и средств измерений э', 8, 50072841),
(296, 'Оперативная служба', 8, 50072532),
(297, 'Отдел подготовки и проведения ремонтов', 9, 50072277),
(298, 'Производственно-технический отдел', 9, 50072276),
(299, 'Планово-экономический отдел', 9, 50072275),
(300, 'Бухгалтерия', 9, 50072534),
(301, 'Руководство', 9, 50072533),
(302, 'Аварийно-ремонтная служба', 8, 50072531),
(303, 'Химическая лаборатория', 8, 50072530),
(304, 'Цех тепловой автоматики и измерений', 6, 50072512),
(305, 'Электрический цех', 6, 50072511),
(306, 'Служба логистики и обеспечения производс', 8, 50072524),
(307, 'Отдел подготовки и проведения ремонтов', 8, 50072523),
(308, 'Группа договоров и отчетности', 8, 50072834),
(309, 'Котлотурбинный цех', 8, 50072526),
(310, 'Топливно-транспортный цех', 8, 50072525),
(311, 'Участок по ремонту котельного оборудаван', 6, 50072828),
(312, 'Аварийно-ремонтная служба', 6, 50072515),
(313, 'Производственно-технический отдел', 8, 50072522),
(314, 'Административный отдел', 8, 50072518),
(315, 'Административный отдел', 7, 50072559),
(316, 'Планово-экономический отдел', 8, 50072521),
(317, 'Бухгалтерия', 8, 50072520),
(318, 'Руководство', 8, 50072516),
(319, 'Отдел подготовки и проведения ремонтов', 10, 50072536),
(320, 'Группа технического перевооружения и рек', 10, 50072871),
(321, 'Производственно-технический отдел', 10, 50072447),
(322, 'Служба логистики и обеспечения производс', 10, 50072537),
(323, 'Группа материально-технического снабжени', 10, 50072872),
(324, 'Отдел релейной защиты и автоматики', 10, 50072870),
(325, 'Отдел основного электротехнического обор', 10, 50072869),
(326, 'Планово-экономическая группа', 10, 50072444),
(327, 'Транспортный цех', 10, 50072539),
(328, 'Ремонтно-хозяйственный участок', 10, 50072873),
(329, 'Бухгалтерия', 10, 50072443),
(330, '(Аналитическая группа)', 2, 50072866),
(331, 'Инженерный центр', 2, 50072438),
(332, '(документальное сопровождение ПТК АСУ ТП', 2, 50072864),
(333, '(Группа автоматизации)', 2, 50072863),
(334, 'Служба автоматизации и АСУ ТП', 2, 50072437),
(335, 'Административный отдел', 10, 50072442),
(336, 'Группа производственного контроля и охра', 10, 50072441),
(337, 'Руководство', 10, 50072440),
(338, 'Метрологическая служба (БОМС) ТГК', 2, 50072439),
(339, '(Группа ведения технической нормативно-с', 2, 50072868),
(340, '(Производственно-техническая группа)', 2, 50072867),
(341, 'Котельное отделение', 10, 50072874),
(342, 'Котлотурбинный цех', 10, 50072540),
(343, 'Турбинное отделение', 10, 50072875),
(344, 'Электрический цех', 2, 50072434),
(345, 'Химический цех', 2, 50072432),
(346, 'Котлотурбинный цех', 2, 50072433),
(347, '(лаборатория химического цеха)', 2, 50072771),
(348, '(участок ремонта СИ)', 2, 50072779),
(349, '(участок ремонта ТЗ и С и ДУ)', 2, 50072777),
(350, '(участок по эксплуатации и ремонту грузо', 2, 50072862),
(351, '(участок по ремонту турбинного оборудо', 2, 50072861),
(352, '(участок по ремонту котельного оборудо', 2, 50072860),
(353, 'Аварийно-ремонтная служба', 2, 50072436),
(354, 'Цех тепловой автоматики и измерений', 2, 50072435),
(355, '(электротехническая лаборатория)', 2, 50072772),
(356, 'Электрический цех', 7, 50072568),
(357, 'Группа производственного контроля и охра', 7, 50072558),
(358, 'Котлотурбинный цех № 2', 7, 50072567),
(359, 'Руководство', 7, 50072557),
(360, 'Котлотурбинный цех № 1', 7, 50072566),
(361, 'Котельное отделение', 7, 50072885),
(362, 'Производственно-технический отдел', 7, 50072560),
(363, 'Аварийно-ремонтная служба', 7, 50072571),
(364, 'Химическая лаборатория', 7, 50072888),
(365, 'Химический цех', 7, 50072570),
(366, 'Дирекция капитального строительства', 5, 50089034),
(367, 'Участок по ремонту котельного оборудован', 7, 50072891),
(368, 'Цех тепловой автоматики и измерений', 7, 50072569),
(369, 'Группа по испытаниям и измерениям', 7, 50072992),
(370, 'Электротехническая лаборатория', 7, 50072886),
(371, 'Участок эксплуатации средств информацион', 7, 50072887),
(372, 'Участок по ремонту котельного оборудован', 10, 50072878),
(373, 'Аварийно-ремонтная служба', 10, 50072544),
(374, 'Цех тепловой автоматики и измерений', 10, 50072543),
(375, 'Руководство', 11, 50072546),
(376, 'Гостиница', 10, 50072545),
(377, 'Химическая лаборатория', 10, 50072877),
(378, 'Электрический цех', 10, 50072541),
(379, 'Химический цех', 10, 50072542),
(380, 'Электротехническая лаборатория', 10, 50072876),
(381, 'Планово-экономическая группа', 7, 50072562),
(382, 'Бухгалтерия', 7, 50072561),
(383, 'Материальный склад', 7, 50072881),
(384, 'Служба логистики и обеспечения производс', 7, 50072565),
(385, 'Отдел подготовки и проведения ремонтов', 7, 50072563),
(386, 'Группа договоров и отчетности', 7, 50072880),
(387, 'Электротехнический участок', 11, 50072550),
(388, 'Оперативно-эксплуатационная служба', 11, 50072549),
(389, 'Производственно-технический отдел', 11, 50072548),
(390, 'Финансово-экономический отдел', 11, 50072547),
(391, 'Гидротехнический участок', 11, 50072552),
(392, 'Машинный участок', 11, 50072551),
(393, 'Руководство', 17, 50072377),
(394, 'Автотранспортный цех', 16, 50072376),
(395, 'Электромашинный цех №1', 17, 50072383),
(396, 'Производственно-технический отдел', 17, 50072380),
(397, 'Отдел снабжения и административно-хозяйс', 17, 50072381),
(398, 'Аварийно-ремонтная служба', 16, 50072375),
(399, 'Химическая лаборатория', 16, 50072734),
(400, 'Санитарно-промышленная группа', 16, 50072940),
(401, 'Сектор хозяйственного обслуживания', 16, 50072374),
(402, 'Руководство', 18, 50072390),
(403, 'Производственно-технический отдел', 14, 50072323),
(404, 'Производственно-технический отдел', 18, 50072391),
(405, 'Группа охраны труда', 18, 50072392),
(406, 'Группа подготовки документов', 18, 50072393),
(407, 'Отдел материально-технического снабжения', 18, 50072394),
(408, 'Группа эксплуатации ГЭС-4', 18, 50072397),
(409, 'Группа эксплуатации ГЭС-8', 18, 50072402),
(410, 'Электротехническая лаборатория', 18, 50072404),
(411, 'Гидротехнический цех', 18, 50072318),
(412, 'Электромашинный цех ГЭС-6', 18, 50072400),
(413, 'Электромашинный цех №2', 17, 50072385),
(414, 'Электромашинный цех № 1 (ЭМЦ-1)', 14, 50072328),
(415, 'ГЭС-11', 17, 50072384),
(416, 'Гидротехнический цех', 17, 50072388),
(417, 'Электротехническая лаборатория', 17, 50072386),
(418, 'Котлотурбинный цех', 16, 50072369),
(419, 'Сектор по работе с дебиторской задолженн', 16, 50072728),
(420, 'Топливно-транспортный цех', 16, 50072368),
(421, 'Служба логистики и обеспечения производс', 16, 50072362),
(422, 'Отдел подготовки и проведения ремонтов', 16, 50072363),
(423, 'Юридический отдел', 16, 50072365),
(424, 'Электротехническая лаборатория', 16, 50072731),
(425, 'Цех тепловой автоматики и измерений', 16, 50072371),
(426, 'Химический цех', 16, 50072372),
(427, 'Электрический цех', 16, 50072370),
(428, 'Электрический цех № 2', 13, 50072350),
(429, 'Лаборатория', 13, 50072676),
(430, 'Лаборатория ЭС-1', 13, 50072674),
(431, 'Участок автоматизированных систем управл', 13, 50072681),
(432, 'Участок ЭС-2', 13, 50072682),
(433, 'Цех тепловой автоматики и измерений', 13, 50072351),
(434, 'Участок автоматизированных систем управл', 13, 50072677),
(435, 'Участок ЭС-1', 13, 50072679),
(436, 'Котлотурбинный цех № 2', 13, 50072348),
(437, 'ЭС-1', 13, 50072668),
(438, 'ЭС-1', 13, 50072673),
(439, 'Служба производственно-технологической к', 13, 50072355),
(440, 'Планово-экономическая группа', 13, 50072695),
(441, 'Группа материалов для эксплуатации', 13, 50072696),
(442, 'Группа материалов для ремонта', 13, 50072697),
(443, 'Участок ЭС-1', 13, 50072688),
(444, 'Топливно-транспортный цех', 13, 50072354),
(445, 'Участок мазутного хозяйства ЭС-2', 13, 50072692),
(446, 'Метрологическая лаборатория калибровки и', 13, 50072357),
(447, 'Центральный материальный склад', 13, 50072698),
(448, 'материальный склад', 13, 50072666),
(449, 'Центральная лаборатория металлов', 13, 50072356),
(450, 'Химический цех', 13, 50072352),
(451, 'Участок ЭС-1', 13, 50072683),
(452, 'Лаборатория', 13, 50072684),
(453, 'Участок по ремонту насосов', 13, 50072933),
(454, 'Участок по эксплуатации и техническому о', 13, 50072931),
(455, 'Аварийно-ремонтная служба', 13, 50072353),
(456, 'ЭС-1', 13, 50072686),
(457, 'Участок по техническому обслуживанию и р', 13, 50072935),
(458, 'Котлотурбинный цех № 1', 13, 50072347),
(459, 'Руководство', 14, 50072320),
(460, 'Сектор планирования ремонтов', 15, 50072959),
(461, 'Автотранспортный участок', 18, 50072319),
(462, 'Отдел материально-технического снабжения', 14, 50072325),
(463, 'Группа сопровождения производства', 14, 50072326),
(464, 'Центральный склад', 14, 50072327),
(465, 'Планово-экономическая группа', 13, 50072337),
(466, 'Производственно-технический отдел', 13, 50072338),
(467, 'Группа капитального строительства', 13, 50072662),
(468, 'Отдел подготовки и проведения ремонта', 13, 50072339),
(469, 'Руководство', 13, 50072335),
(470, 'Бухгалтерия', 13, 50072336),
(471, 'Группа производственного контроля и охра', 13, 50072342),
(472, 'Служба логистики и обеспечения производс', 13, 50072343),
(473, 'Оперативная служба', 13, 50072346),
(474, 'ГТУ', 13, 50072667),
(475, 'Дирекция капитального строительства', 13, 50072340),
(476, 'Отдел организации строительства', 13, 50072663),
(477, 'Административный отдел', 13, 50072341),
(478, 'Сектор бизнес-планирования и тарифного р', 12, 50072916),
(479, 'Отдел экономики', 12, 50072859),
(480, 'Сектор анализа экономики', 12, 50072915),
(481, 'Блок директора по экономике и финансам', 12, 50072296),
(482, 'Сектор водно-энергетических ресурсов', 12, 50073042),
(483, 'Отдел контроля обязательств', 12, 50072739),
(484, 'Отдел управления имуществом', 12, 50072619),
(485, 'Электротехническая служба', 12, 50072922),
(486, 'Гидротехническая служба', 12, 50072921),
(487, 'Теплотехническая служба', 12, 50089875),
(488, 'Блок заместителя главного инженера 2', 12, 50072858),
(489, 'Служба релейной защиты', 12, 50072918),
(490, 'Сектор автоматизации и АСУ ТП', 12, 50073044),
(491, 'Сектор диспетчеризации', 12, 50073043),
(492, 'Группа продаж Прионежского района', 12, 50073037),
(493, 'Отдел управления реализацией', 12, 50072912),
(494, 'Группа реализации', 12, 50073035),
(495, 'Группа закупок тепловой энергии и услуг', 12, 50073034),
(496, 'Отдел сбыта электрической энергии', 12, 50072621),
(497, 'Блок главного бухгалтера', 12, 50072297),
(498, 'Отдел бухгалтерского учета и отчетности', 12, 50072622),
(499, 'Группа продаж', 12, 50073038),
(500, 'Химический цех', 9, 50072290),
(501, 'Группа производственной лаборатории ТЭЦ', 9, 50089448),
(502, 'Блок главного инженера', 12, 50072295),
(503, 'Служба охраны труда', 12, 50072854),
(504, 'Производственно-технический отдел', 12, 50072855),
(505, 'Сектор перспективного развития', 12, 50072924),
(506, 'Сектор планирования ремонтов', 12, 50072923),
(507, 'Экологический сектор', 12, 50072856),
(508, 'Блок заместителя главного инженера 1', 12, 50072857),
(509, 'Центральная химическая лаборатория ТГК', 9, 50072292),
(510, 'Лаборатория металлов', 9, 50072293),
(511, 'Блок директора филиала', 12, 50072294),
(512, 'Юридическая служба', 12, 50072853),
(513, 'Отдел правового обеспечения', 12, 50072927),
(514, 'Отдел судебных споров', 12, 50072926),
(515, 'Группа судебной работы с физическими лиц', 12, 50073046),
(516, 'Группа судебной работы с юридическими ли', 12, 50073045),
(517, 'Отдел сопровождения исполнительного прои', 12, 50072925),
(518, 'Выгостровская', 19, 50072305),
(519, 'Группа по эксплуатации и ремонту электро', 19, 50072639),
(520, 'Группа по эксплуатации и ремонту гидроме', 19, 50072640),
(521, 'Палакоргская ГЭС (ГЭС-7)', 19, 50072306),
(522, 'Группа по эксплуатации и ремонту электро', 19, 50072641),
(523, 'Производственно-технический отдел', 19, 50072303),
(524, 'Маткожненская ГЭС (ГЭС-3)', 19, 50072304),
(525, 'Группа по ремонту и эксплуатации электро', 19, 50072637),
(526, 'Группа по эксплуатации и ремонту гидроме', 19, 50072638),
(527, 'Участок средств диспетчерского и техноло', 19, 50072308),
(528, 'Отдел материально-технического снабжения', 19, 50072309),
(529, 'Автотранспортный участок', 19, 50072310),
(530, 'Руководство', 20, 50072311),
(531, 'Электротехническая лаборатория', 19, 50072307),
(532, 'Группа релейной защиты', 19, 50072642),
(533, 'Канцелярия', 12, 50072626),
(534, 'Административно-сервисная группа', 12, 50072627),
(535, 'Блок директора по корпоративной защите', 12, 50072299),
(536, 'Служба средств диспетчерского и технолог', 12, 50072628),
(537, 'Группа договоров и отчетности', 12, 50072908),
(538, 'Отдел эксплуатации средств вычислительно', 12, 50072907),
(539, 'Отдел информационных технологий', 12, 50072906),
(540, 'Отдел телекоммуникаций', 12, 50072905),
(541, 'Группа по учету заработной платы', 12, 50072911),
(542, 'Группа по учету основных средств', 12, 50072910),
(543, 'Группа по учету ТМЦ', 12, 50072909),
(544, 'Отдел налогового учета и отчетности', 12, 50072623),
(545, 'Блок директора по персоналу', 12, 50072298),
(546, 'Отдел кадров', 12, 50072624),
(547, 'Отдел оплаты и организации труда', 12, 50072625),
(548, 'Руководство', 19, 50072301),
(549, 'Группа телефонии', 12, 50073030),
(550, 'Отдел телемеханики и автоматизированных', 12, 50072904),
(551, 'Отдел организации защиты корпоративных и', 12, 50072629),
(552, 'Отдел по обеспечению физической защиты и', 12, 50072630),
(553, 'Служба обеспечения производства', 12, 50072300),
(554, 'Отдел комплектации производства', 12, 50072631),
(555, 'Отдел организации закупочной деятельност', 12, 50072632),
(556, 'Группа транспорта', 12, 50072633),
(557, 'Транспортный цех', 9, 50072285),
(558, 'Котлотурбинный цех', 9, 50072286),
(559, 'Участок по содержанию зданий и внутренни', 9, 50072843),
(560, 'Топливно-транспортный цех', 9, 50072284),
(561, 'Административный отдел', 9, 50072278),
(562, 'Экологическая служба ТГК', 9, 50072279),
(563, 'Санитарно-промышленная лаборатория', 9, 50072280),
(564, 'Служба логистики и обеспечения производс', 9, 50072281),
(565, 'Материальный склад', 9, 50072842),
(566, '(Участок АСУ)', 9, 50072847),
(567, 'Аварийно-ремонтная служба', 9, 50072289),
(568, 'Цех тепловой автоматики и измерений', 9, 50072288),
(569, 'Участок общестанционных и общецеховых ра', 9, 50072851),
(570, 'Участок по ремонту котельного оборудован', 9, 50072849),
(571, 'Участок по ремонту турбинного оборудован', 9, 50072850),
(572, 'Электрический цех', 9, 50072287),
(573, '(4 энергоблок)', 9, 50072844),
(574, 'Электротехническая лаборатория', 9, 50072845),
(575, '(4 энергоблок)', 9, 50072846),
(576, 'Химический цех', 21, 50072261),
(577, 'Сектор по надзору', 21, 50072579),
(578, 'Цех тепловых сетей', 21, 50072260),
(579, 'Блок главного инженера', 15, 50072263),
(580, 'Теплотехнический сектор', 15, 50072617),
(581, 'Экологический сектор', 15, 50072618),
(582, 'Сектор водноэнергетических ресурсов', 15, 50072900),
(583, 'Сектор оптового рынка', 15, 50072960),
(584, 'Производственно-технический отдел', 15, 50072700),
(585, 'Отдел организации защиты корпоративных и', 15, 50072714),
(586, 'Химлаборатория', 21, 50072615),
(587, 'Блок директора филиала', 15, 50072262),
(588, 'Отдел по правовым вопросам', 15, 50072616),
(589, 'Группа по эксплуатации и ремонту распред', 21, 50072599),
(590, 'Группа по эксплуатации и ремонту электри', 21, 50072600),
(591, 'Электрический цех', 21, 50072257),
(592, 'Оперативный персонал', 21, 50072588),
(593, 'Электротехническая лаборатория', 21, 50072586),
(594, 'Участок главной схемы', 21, 50072903),
(595, 'Участок собственных нужд', 21, 50072902),
(596, 'Участок испытаний и измерений', 21, 50072901),
(597, 'Лаборатория хроматографического анализа', 21, 50072587),
(598, 'Бригада по ремонту', 21, 50072604),
(599, 'Бригада по ремонту', 21, 50072605),
(600, 'Бригада по ремонту', 21, 50072606),
(601, 'Топливный цех', 21, 50072259),
(602, 'Оперативный персонал', 21, 50072607),
(603, 'Группа по эксплуатации и ремонту кабельн', 21, 50072601),
(604, 'Цех тепловой автоматики и измерений', 21, 50072258),
(605, 'Бригада по ремонту', 21, 50072603),
(606, 'Административно-сервисная группа', 15, 50072716),
(607, 'Отдел оплаты и организации труда', 15, 50072718),
(608, 'Отдел кадров', 15, 50072717),
(609, 'Руководство', 16, 50072268),
(610, 'Группа подготовки документов', 16, 50072269),
(611, 'Производственно-технический отдел', 16, 50072270),
(612, 'Группа наладки и испытаний котлотурбинно', 16, 50072719),
(613, 'Группа обслуживания вычислительной и коп', 15, 50073026),
(614, 'Отдел телекоммуникаций', 15, 50072942),
(615, 'Группа телефонии', 15, 50073025),
(616, 'Группа эксплуатации сетей передачи данны', 15, 50073024),
(617, 'Отдел телемеханики и автоматизированных', 15, 50072941),
(618, 'Группа обслуживания телемеханики и СОТИА', 15, 50073023),
(619, 'Группа обслуживания АСКУЭ', 15, 50073022),
(620, 'Отдел по обеспечению физической защиты и', 15, 50072713),
(621, 'Блок директора по персоналу', 15, 50072267),
(622, 'Канцелярия', 15, 50072715),
(623, 'Группа учета', 16, 50072726),
(624, 'Группа учета', 16, 50072720),
(625, 'Отдел по работе с персоналом', 16, 50072271),
(626, 'Сектор организации труда и оплаты труда', 16, 50072722),
(627, 'Планово-экономическая группа', 16, 50072272),
(628, 'Отдел сбыта', 16, 50072273),
(629, 'Расчетно-договорная группа', 16, 50072724),
(630, 'Лаборатория РЗА', 15, 50072955),
(631, 'Служба охраны труда', 15, 50072705),
(632, 'Блок главного бухгалтера', 15, 50072264),
(633, 'Отдел бухгалтерского учета и отчетности', 15, 50072954),
(634, 'Отдел по учету товарно-материальных ценн', 15, 50072953),
(635, 'Отдел учета заработной платы', 15, 50072952),
(636, 'Сектор перспективного развития', 15, 50072958),
(637, 'Гидротехническая служба', 15, 50072701),
(638, 'Сектор гидротехнических сооружений', 15, 50072957),
(639, 'Сектор гидромеханического оборудования', 15, 50072702),
(640, 'Электротехническая служба', 15, 50072703),
(641, 'Центральная электротехническая служба ТГ', 10, 50072445),
(642, 'Сектор РЗА', 15, 50072956),
(643, 'Отдел комплектации производства', 15, 50072948),
(644, 'Отдел организации закупочной деятельност', 15, 50072947),
(645, 'Группа транспорта', 15, 50072946),
(646, 'Блок директора по корпоративной защите', 15, 50072266),
(647, 'Служба средств диспетчерского', 15, 50072712),
(648, 'Группа договоров и отчетности', 15, 50072945),
(649, 'Отдел информационных технологий', 15, 50072944),
(650, 'Группа сопровождения информационных комп', 15, 50073029),
(651, 'Группа сопровождения экономических инфор', 15, 50073028),
(652, 'Отдел эксплуатации средств вычислительно', 15, 50072943),
(653, 'Группа сопровождения программно-аппаратн', 15, 50073027),
(654, 'Отдел налогового учета и отчетности', 15, 50072951),
(655, 'Блок директора по экономике и финансам', 15, 50072265),
(656, 'Отдел управления имуществом', 15, 50072708),
(657, 'Отдел контроля обязательств', 15, 50072709),
(658, 'Отдел экономики', 15, 50072710),
(659, 'Сектор бизнес-планирования и экономическ', 15, 50072950),
(660, 'Сектор тарифного регулирования и управле', 15, 50072949),
(661, 'Служба обеспечения производства', 15, 50072711),
(662, 'Руководство', 22, 50072249),
(663, 'Автотранспортный участок', 22, 50072248),
(664, 'Руководство', 22, 50072247),
(665, 'Производственно-технический отдел', 22, 50072246),
(666, 'Группа РЗА', 20, 50072652),
(667, 'Группа АСУ', 20, 50072653),
(668, 'Участок средств диспетчерского и техноло', 20, 50072274),
(669, 'Отдел материально-технического снабжения', 20, 50072251),
(670, 'Автотранспортный участок', 20, 50072250),
(671, 'Кондопожская ГЭС (ГЭС-1)', 22, 50072244),
(672, 'Группа по эксплуатации и ремонту электро', 22, 50072597),
(673, 'Пальеозерская ГЭС (ГЭС-2)', 22, 50072243),
(674, 'Группа по эксплуатации и ремонту электро', 22, 50072596),
(675, 'Электротехническая лаборатория', 22, 50072242),
(676, 'Оперативная служба', 22, 50072245),
(677, 'Участок ГЭС-1 (Кондопожская ГЭС)', 22, 50072654),
(678, 'Производственно-технический отдел', 20, 50072313),
(679, 'Путкинская', 20, 50072314),
(680, 'Группа по эксплуатации и ремонту электро', 20, 50072647),
(681, 'Группа по эксплуатации и ремонту гидроме', 20, 50072650),
(682, 'Юшкозерская ГЭС (ГЭС-16)', 20, 50072316),
(683, 'Группа по эксплуатации и ремонту электро', 20, 50072651),
(684, 'Электротехническая лаборатория', 20, 50072317),
(685, 'Группа по эксплуатации и ремонту гидроме', 20, 50072648),
(686, 'Кривопорожская ГЭС (ГЭС-14)', 20, 50072315),
(687, 'Группа по эксплуатации и ремонту электро', 20, 50072649),
(688, 'Котлотурбинный цех', 21, 50072256),
(689, 'Отдел подготовки и проведения ремонтов', 21, 50072253),
(690, 'Сектор ремонта оборудования', 21, 50072581),
(691, 'Аварийно-ремонтная служба', 21, 50072254),
(692, 'Административный отдел', 21, 50072231),
(693, 'Служба логистики и обеспечения производс', 21, 50072232),
(694, 'Группа планирования ресурсообеспечения', 21, 50072594),
(695, 'Участок средств диспетчерского и техноло', 22, 50072241),
(696, 'Группа по эксплуатации и ремонту зданий', 22, 50072235),
(697, 'Группа малых ГЭС', 22, 50072234),
(698, 'Группа по эксплуатации и ремонту Малых Г', 22, 50072595),
(699, 'Руководство', 21, 50072238),
(700, 'Производственно-технический отдел', 21, 50072252),
(701, 'Центральная ТЭЦ (ЦТЭЦ)', 13, 50072165),
(702, 'Каскад Туломских и Серебрянских ГЭС', 14, 50072122),
(703, 'Каскад Пазских ГЭС', 18, 50072123),
(704, 'Каскад Нивских ГЭС', 17, 50072124),
(705, 'Апатитская ТЭЦ (АТЭЦ)', 16, 50072150),
(706, 'Блок заместителя главного бухгалтера 2', 15, 50072707),
(707, 'Блок заместителя главного бухгалтера 1', 15, 50072706),
(708, 'Аппарат управления филиала Кольский', 15, 50072151),
(709, 'Петрозаводская ТЭЦ (ПТЭЦ)', 21, 50072152),
(710, 'Каскад Сунских ГЭС', 22, 50072153),
(711, 'Каскад Кемских ГЭС', 20, 50072154),
(712, 'Каскад Выгских ГЭС', 19, 50072155),
(713, 'Аппарат управления филиала Карельский', 12, 50072156),
(714, 'Южная ТЭЦ (ТЭЦ-22)', 9, 50072157),
(715, 'Северная ТЭЦ (ТЭЦ-21)', 8, 50072158),
(716, 'Выборгская ТЭЦ (ТЭЦ-17)', 6, 50072159),
(717, 'Автовская ТЭЦ (ТЭЦ-15)', 5, 50072160),
(718, 'Первомайская ТЭЦ (ТЭЦ-14)', 7, 50072161),
(719, 'Нарвская ГЭС (ГЗС-13)', 11, 50072162),
(720, 'Василеостровская ТЭЦ (ТЭЦ-7)', 10, 50072163),
(721, 'Правобережная ТЭЦ (ТЭЦ-5)', 2, 50072164),
(722, 'Предприятие СДТУ и ИТ', 23, 50072166),
(723, 'Каскад Ладожских ГЭС', 1, 50072167),
(724, 'Учебный центр ТГК', 4, 50072460),
(725, 'Руководство', 24, 50072462),
(726, 'Бухгалтерия', 24, 50072463),
(727, 'Производственно-технический отдел', 24, 50072464),
(728, 'Отдел материально-технического снабжения', 24, 50072465),
(729, 'Электротехническая лаборатория', 24, 50072467),
(730, 'Оперативная служба', 24, 50072468),
(731, 'Транспортный участок', 24, 50072472),
(732, 'Гидроэлектростанция-10', 24, 50072469),
(733, 'Гидроэлектростанция-11', 24, 50072470),
(734, 'Гидротехнический участок', 24, 50072471),
(735, '', 3, 0),
(736, 'Каскад Вуоксинских ГЭС', 24, 50072168),
(737, '', 3, 0),
(738, '', 3, 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `org_dpts`
--
ALTER TABLE `org_dpts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `org_dpts`
--
ALTER TABLE `org_dpts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=739;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
