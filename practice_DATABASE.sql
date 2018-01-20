-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 20 2018 г., 13:12
-- Версия сервера: 5.6.37
-- Версия PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `practice_DATABASE`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `admin`
--

INSERT INTO `admin` (`id`) VALUES
(1),
(4),
(23),
(25),
(26),
(27);

-- --------------------------------------------------------

--
-- Структура таблицы `groups`
--

CREATE TABLE `groups` (
  `id_group` int(10) UNSIGNED NOT NULL,
  `studygroup` varchar(6) NOT NULL,
  `speciality` varchar(255) NOT NULL,
  `course` int(1) NOT NULL,
  `kaf` varchar(255) NOT NULL,
  `school` varchar(255) NOT NULL,
  `admin` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `groups`
--

INSERT INTO `groups` (`id_group`, `studygroup`, `speciality`, `course`, `kaf`, `school`, `admin`) VALUES
(1, 'Б8119', 'Прикладная информатика', 1, 'Информатики, математического и компьютерного моделирования', 'ШЕН', 26),
(2, 'Б8219', 'Прикладная информатика', 2, 'Информатики, математического и компьютерного моделирования', 'ШЕН', 27),
(3, 'Б8419', 'Прикладная Информатика', 4, 'Информатики, математического и компьютерного моделирования', 'ШЕН', 23),
(4, 'Б8114', 'Прикладная математика', 1, 'Информатики, математического и компьютерного моделирования', 'ШЕН', 23),
(5, 'Б8214', 'Прикладная математика', 2, 'Информатики, математического и компьютерного моделирования', 'ШЕН', 27),
(6, 'Б8414', 'Прикладная математика', 4, 'Информатики, математического и компьютерного моделирования', 'ШЕН', 4),
(7, 'Б8319', 'Прикладная информатика', 3, 'Информатики, математического и компьютерного моделирования', 'ШЕН', 1),
(8, 'Б8314', 'Прикладная математика', 3, 'Информатики, математического и компьютерного моделирования', 'ШЕН', 1),
(9, 'Б8202', 'Математика и компьютерные науки', 2, 'Информатики, математического и компьютерного моделирования', 'ШЕН', 23),
(10, 'Б8203', 'Прикладная математика и информатика', 2, 'Информатики, математического и компьютерного моделирования', 'ШЕН', 25);

-- --------------------------------------------------------

--
-- Структура таблицы `person`
--

CREATE TABLE `person` (
  `id_person` int(10) UNSIGNED NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `fathername` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `person`
--

INSERT INTO `person` (`id_person`, `lastname`, `name`, `fathername`, `username`, `password`, `email`, `telephone`) VALUES
(1, 'Кленина', 'Надежда', 'Викторовна', 'klenina_nv', 'c4ca4238a0b923820dcc509a6f75849b', 'klenina_nv@dvfu.ru', '89145556677'),
(4, 'Олейников', 'Игорь', 'Сергеевич', 'oleynikov_is', '1b60b18079450737f3e0c85870660275', 'oleynikov_is@dvfu.ru', '89247776699'),
(5, 'Кронидов', 'Тимофей', 'Витальевич', 'kronidov_tv', '700739c88308a38f2e5cd1777d27eef8', 'kronidov_tv@yandex.ru', '88089996677'),
(6, 'Овчинникова', 'Анна', 'Сергеевна2', 'ovchanna', 'd41d8cd98f00b204e9800998ecf8427e', 'ovchanna@mail.ru', '890455d58833'),
(7, 'Степанова', 'Светлана', 'Геннадьевна', 'svetstep', 'd41d8cd98f00b204e9800998ecf8427e', 'svetstep@gmail.com', '87034445566'),
(8, 'Орлов', 'Илья', 'Юрьевич', 'ilya_orel', 'cef0da9e01dee492ff2635ac65974710', 'ilya_orel@gmail.com', '89165557733'),
(9, 'Крицкая', 'Мария', 'Евгеньевна', 'mary_kric', '81073af95987fb43824ea2b694ac5e90', 'mary_kric@mail.ru', '83025553344'),
(10, 'Тарасов', 'Сергей', 'Геннадьевич', 'tarasov_sg', 'd41d8cd98f00b204e9800998ecf8427e', 'tarasov_sg@yandex.ru', '89032224455'),
(11, 'Бардаш', 'Алексей', 'Степанович', 'bardash', '941ec1ea45179c611a9291e740d1aa14', 'bardash@gmail.com', '89049992200'),
(12, 'Сафронова', 'Екатерина', 'Владимировна', 'safronova', 'd41d8cd98f00b204e9800998ecf8427e', 'safronova@gmail.com', '89056669911'),
(13, 'Скоропостижная', 'Александра', 'Святославовна', 'sashaskor', 'c82bb0de2404d8ef9d4246f2930eb6ef', 'sashaskor@mail.ru', '89051113322'),
(14, 'Андреева', 'Елена', 'Григорьевна', 'andreeva', '44fc6e1e35359d97d836a6bb3bd536ce', 'andreeva@gmail.com', '8907772244'),
(15, 'Захаров', 'Валентин', 'Геннадьевич', 'zaharov', 'afcc079e986210121f5bf4f3d6b0f367', 'zaharov@yandex.ru', '89046668822'),
(16, 'Якимов', 'Владислав', 'Валерьевич', 'vlad_yak', '58663187dd3d6829f876270db4fa6342', 'vlad_yak@gmail.com', '89023338855'),
(17, 'Савинский', 'Александр', 'Владимирович', 'rostelekom', '12d511c00e69e21606096c4c93bad4bc', 'hr@rtk.ru', '2456789'),
(18, 'Шепелев', 'Антон', 'Сергеевич', 'alians_tk', '4b8a3cdd41639679dc798723f228c074', 'hr@alians_tk.ru', '2456734'),
(19, 'Леонов', 'Влад', 'Семёнович', 'rm_soft', 'd27d8a7ade6a5b5ff874f815d96ddb3e', 'mail@rm_soft.ru', '2342321'),
(21, 'Орлов', 'Кирилл', 'Витальевич', 'coral', 'd41d8cd98f00b204e9800998ecf8427e', 'hr_mail@coral.ru', '2758934'),
(22, 'Горунов', 'Илья', 'Владимирович', 'sozvezdie', '7b3183bc833f8e114965f4d8063e2a2f', 'hr_mail@sozvezdie.ru', '2305611'),
(23, 'Кленин', 'Александр', 'Сергеевич', 'klenin_as', 'd2ebed4eaf58509dcc358e1782c38fea', 'klenin@gmail.com', '89145056677'),
(24, 'Ефимов', 'Дмитрий', 'Сергеевич', 'vl_consult', '8dd2002ca9dd04ed11c60291f6a8b030', 'hr_mail@vl_consult.ru', '2782310'),
(25, 'Малыкина', 'Ирина', 'Анатольевна', 'malikina_ia', '387dbe4d4488648a3e75a0d8ed75e44a', 'malikina_ia@dvfu.ru', '89035557733'),
(26, 'Калинина ', 'Татьяна', 'Александровна', 'kalinila_ta', '477fc7bbdeed37de9f7b7691b0cca20a', 'kalinina@mail.rru', '89141234567'),
(27, 'Никитина', 'Евгения', 'Юрьевна', 'nikitina_eu', '3fc4253bee1b31c8ccdd82eb59abec4b', 'nikitina@mail.ru', '89142345678'),
(28, 'Антонов', 'Сергей ', 'Михайлович', 'antonov_sm', '172ac3d9c220d8e7cd120bcf38397210', 'antonov@mail.ru', '89143456789'),
(29, 'Баранов', 'Вячеслав', 'Борисович', 'baranov_vb', 'f75239cf64f78c330d408087dfe73704', 'baranov@mail.ru', '89144567890'),
(30, 'Васильева', 'Елена', 'Викторовна', 'vasileva_ev', 'f337ee5cce0ac7c73db48e083a66d76e', 'vasileva@mail.ru', '89146789012'),
(31, 'Дорофеева', 'Маргарита', 'Александровна', 'dorofeeva_ma', 'df0b1d4f3c573fdc9a6cd44dcb91517c', 'dorofeeva@mail.ru', '89147890123'),
(32, 'Ельникова', 'Ирина', 'Олеговна', 'elnikova_io', ' a9ec8c7b3643e5e3f8e25d7c6ce9b722', 'elnikova@mail.ru', '89145623471'),
(33, 'Жарков', 'Евгений', 'Павлович', 'garkov_ep', '1cdde0c3a586fb2fdf1325fd9b1c2ba2', 'garkov@mail.ru', '89621234567'),
(34, 'Круглов', 'Валентин', 'Тимофеевич', 'kruglov_vt', 'b3cd10e4c0e7980c92bb175c58a3b5a5', 'kruglov@mail.ru', '89622345678'),
(35, 'Кулешов', 'Станислав', 'Сергеевич', 'kyleshov_ss', 'cdaf7e4856f5ab437cd08f04f50486fc', 'kyleshov@mail.ru', '89623456789'),
(36, 'Москалев', 'Григорий', 'Павлович', 'moskalev_gp', 'e2a1009e59dba58f05818b6366474ee7', 'moskalev@mail.ru', '89624567890'),
(37, 'Николаева', 'Алла', 'Дмитриевна', 'nikolaeva_ad', '573bd9b4b0eb508c3e9761978c2b03f2', 'nikolaeva@mail.ru', '89625678901'),
(70, 'QW', 'QW', 'QW', 'QW', '1dc02f192a13048f59331616afb0e063', 'QW', 'QW'),
(72, '', '', '', 'QR', '66c35cd8077f7e1db5faefbc048a646a', '', ''),
(74, '', '', '', 'RR', 'cb95449a94688af33f6e9bb090cf2936', '', ''),
(76, '', '', '', 'YY', '0867f43e27585e019c13f7f4b7c4ab6b', '', ''),
(77, '', '', '', 'rte', 'e3fd2afa75b6e2e40021c7054361fbf4', '', ''),
(79, '', '', '', 'TTTTT', '689658a01af6d620cd77c623b307234b', '', ''),
(81, '', '', '', 'YYY', 'fd7c5c4fdaa97163ee4ba8842baa537a', '', ''),
(83, '', '', '', 'rp', '00639c71ba1dbde84db84b3eb15d6820', '', ''),
(85, '', '', '', 'Yqw', 'dfef9aa43923bf8b72b604cb6b67a453', '', ''),
(87, '', '', '', 'yur', '0daa0d1935f4033d015c90da3de1b10a', '', ''),
(88, '', '', '', 'r', '4b43b0aee35624cd95b910189b3dc231', '', ''),
(89, '', '', '', 'tybv', '8c14c3c2cb10668255078fae7b9c7489', '', ''),
(90, 'tybvkl', 'tybvkl', 'tybvkl', 'tybvkl', '1e575573f69b27d814297dac71e2e4eb', 'tybvkl', 'tybvkl'),
(91, 'RRRRR', 'RRRRR', 'RRRRR', 'RRRRR', '56fec8241a2321eae5d2b2ad1cae6f27', 'RRRRR', 'RRRRR');

-- --------------------------------------------------------

--
-- Структура таблицы `pterodactyl`
--

CREATE TABLE `pterodactyl` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `sphere` varchar(255) NOT NULL COMMENT 'сфера деятельности',
  `about` text NOT NULL COMMENT 'о компании',
  `iscontract` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'наличие договора о сотрудничестве с ДВФУ',
  `contract` varchar(255) DEFAULT NULL COMMENT 'ссылка на электроный вариант договора'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pterodactyl`
--

INSERT INTO `pterodactyl` (`id`, `name`, `address`, `sphere`, `about`, `iscontract`, `contract`) VALUES
(17, 'Ростелеком', 'г.Владивосток, пр-т Красного Знамени, 37 ', 'Телефонная связь, IP-телефония, кабельное телевидение, Интернет.', '\"Ростелеком\" – одна из крупнейших в России и Европе телекоммуникационных компаний, присутствующая во всех сегментах рынка услуг связи и охватывающая более 34 млн. домохозяйств в России.', 0, NULL),
(18, 'АльянсТелеком', 'г.Владивосток, ул. Луговая, 21а ', 'Интернет и телевидение, видеонаблюдение для физических и юридических лиц.', 'Компания \"АльянсТелеком\" работает на рынке телекоммуникационных услуг с 2007 года. Образовавшись путем слияния двух операторов связи города Владивостока, ООО \"ОктопусНет\" и ООО \"ВладТелеКом\" (\"СтритНет\"), компания превратилась в провайдера города Владивостока, предоставив жителям доступ к современным телекоммуникационным услугам и Интернет-сервисам.\r\n\r\nМультимедийная сеть компании охватывает большую часть города, при этом компания постоянно расширяет свою транспортную сеть, подключая новые дома к быстрому Интернету и современному кабельному телевидению \"АльянсЦифра\".', 0, NULL),
(19, 'РМ софт', 'г.Владивосток, ул. Карла Либкнехта, 10а', 'Разработка, продажа, сопровождение и обслуживание программного обеспечения.', 'ООО \"РМ Софт\".', 0, NULL),
(21, 'Coral', 'г.Владивосток, ул. Пограничная, 12, 2-й этаж', 'Разработка и сопровождение программного обеспечения на платформе 1С. Электронный документооборот, CRM, бюджетирование. ', 'Профессиональный ИТ-аутсорс и разработка нестандартных ИТ-решений.Компания использует открытую платформу 1С 8.х с готовыми решениями для бизнеса.Цены адаптации привязаны к работе специалистов на локальном рынке ИТ-разработки.Срочность исполнения - проект сопровождает менеджер-аналитик и настроенная тикет-система Helpdesk. Это гарантирует быструю реакцию и поиск решения на вопрос и заявку.Системный консалтинг - компания имеет возможность рассказать о выборе архитектуры корпоративной ИТ-системы, помочь в увеличении скорости обмена и интеграции баз данных, настроить сторонние приложения.', 1, 'Без названия.jpg'),
(22, 'Созвездие', 'г.Владивосток, пр-т Народный, 29', 'Разработка, продажа, внедрение, сопровождение программы 1С.', '', 0, NULL),
(24, 'ВЛ-Консалтинг', 'г.Владивосток, ул. Круговая 2-я, 12, 1-й этаж', 'Продажа, внедрение и обслуживание программ 1С, антивирусов, системного программного обеспечения. Программа 1+ мобильная торговля.', '', 0, NULL),
(91, 'RRRRR', 'RRRRR', 'RRRRR', 'RRRRR', 1, 'Новый текстовый документ (2).txt');

-- --------------------------------------------------------

--
-- Структура таблицы `request`
--

CREATE TABLE `request` (
  `id_vac` int(10) UNSIGNED NOT NULL COMMENT 'вакансия',
  `id_stud` int(10) UNSIGNED NOT NULL COMMENT 'студент',
  `stud_agree` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'согласие студента',
  `pter_agree` tinyint(1) DEFAULT NULL COMMENT 'согласие практикодателя',
  `admin_agree` tinyint(1) DEFAULT NULL COMMENT 'согласие администратора',
  `sender` varchar(11) NOT NULL COMMENT 'категория пользователя, который отправил заявку'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `request`
--

INSERT INTO `request` (`id_vac`, `id_stud`, `stud_agree`, `pter_agree`, `admin_agree`, `sender`) VALUES
(16, 10, 0, 1, NULL, 'pterodactyl'),
(16, 13, 0, 1, NULL, 'pterodactyl'),
(16, 15, 0, 1, NULL, 'pterodactyl');

-- --------------------------------------------------------

--
-- Структура таблицы `resume`
--

CREATE TABLE `resume` (
  `id_stud` int(10) UNSIGNED NOT NULL,
  `skills` text NOT NULL,
  `experience` text NOT NULL,
  `additional` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `resume`
--

INSERT INTO `resume` (`id_stud`, `skills`, `experience`, `additional`) VALUES
(10, 'цфпукпу', 'фукруфкрфу', 'фукрфукр'),
(13, 'Swift, C/C++, Java', 'Участие в крупных ИТ-проектах', ''),
(15, 'HTML, PHP, JS', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `student`
--

CREATE TABLE `student` (
  `id` int(10) UNSIGNED NOT NULL,
  `studygroup` int(10) UNSIGNED NOT NULL,
  `birthdate` date NOT NULL,
  `invalid` text NOT NULL,
  `report` text NOT NULL,
  `diary` text NOT NULL,
  `feedback` text NOT NULL,
  `direction` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `student`
--

INSERT INTO `student` (`id`, `studygroup`, `birthdate`, `invalid`, `report`, `diary`, `feedback`, `direction`) VALUES
(5, 8, '1996-12-01', '', '', '', '', ''),
(6, 8, '1997-05-06', '32', '3.png', '3.png', '3.png', '3.png'),
(7, 9, '1999-04-12', '', '3.png', '', '', ''),
(8, 10, '1998-12-03', '', '', '', '', ''),
(9, 10, '1996-09-14', '', '', '', '', ''),
(10, 10, '1998-08-17', '', '', '', '', ''),
(11, 7, '1997-05-28', '', '', '', '', ''),
(12, 8, '1997-10-30', '', '3.png', '3.png', 'Вопросы и ответы по PHP.docx', ''),
(13, 10, '1998-05-15', '', '', '', '', ''),
(14, 8, '1996-01-14', '', '', '', '', ''),
(15, 7, '1997-03-08', 'да', '', '', '', ''),
(16, 8, '1997-11-29', '', '', '', '', ''),
(17, 9, '1998-01-01', '', '', '', '', ''),
(18, 9, '1998-12-15', '', '', '', '', ''),
(19, 9, '1998-02-02', 'да', '', '', '', ''),
(21, 7, '1997-03-03', '', '', '', '', ''),
(22, 7, '1997-04-04', '', '', '', '', ''),
(24, 7, '1997-05-05', '', '', '', '', ''),
(28, 10, '1998-05-05', '', '', '', '', ''),
(29, 10, '1998-06-06', '', '', '', '', ''),
(30, 1, '1998-07-07', '', '', '', '', ''),
(31, 1, '1999-07-07', '', '', '', '', ''),
(32, 1, '1999-08-08', '', '', '', '', ''),
(33, 1, '1999-09-09', '', '', '', '', ''),
(34, 2, '1998-10-10', '', '', '', '', ''),
(35, 2, '1998-11-11', '', '', '', '', ''),
(36, 2, '1998-12-12', '', '', '', '', ''),
(37, 2, '1998-03-20', '', '', '', '', ''),
(90, 4, '2018-01-14', 'tybvkl', '', '', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `vacancy`
--

CREATE TABLE `vacancy` (
  `id_vac` int(10) UNSIGNED NOT NULL,
  `id_pter` int(10) UNSIGNED NOT NULL,
  `about` varchar(255) NOT NULL COMMENT 'название вакансии',
  `practic` varchar(255) NOT NULL COMMENT 'вид деятельности',
  `start` date DEFAULT NULL COMMENT 'начало периода',
  `finish` date DEFAULT NULL COMMENT 'конецц периода',
  `invalid` text NOT NULL COMMENT 'условия для инвалидов',
  `logo` varchar(255) NOT NULL,
  `places` int(3) NOT NULL DEFAULT '1' COMMENT 'количество мест',
  `privet` text NOT NULL COMMENT 'описание вакансии'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `vacancy`
--

INSERT INTO `vacancy` (`id_vac`, `id_pter`, `about`, `practic`, `start`, `finish`, `invalid`, `logo`, `places`, `privet`) VALUES
(16, 21, 'Программист в компании NASA', 'Необходимо разработать интерактивкую ГИС карту для последующего внедрения в сообщество NASA. ', '2018-01-28', '2018-02-24', '', '200px-NASA_logo.svg.png', 15, 'Работа в сфере космических технологий. Оплата труда.'),
(17, 21, 'Системный администратор МТВ', 'Необходимо частичное присутствие в компании для поддержания решетки вещания в компании МТВ по адресу г.Москва, ул.Пятницкая', '2018-03-07', '2018-05-25', 'Без отклонений', '200px-MTV_Logo.svg.png', 5, 'Поддержка эфира на телерешетке и радиорешетке канала МТВ'),
(18, 21, 'ВЕЛКОМ', 'Разработка мобильного приложения для осуществления оплаты услуг мобильной связи велком', '2018-02-04', '2018-05-26', 'Дополнительный комфорт рабочего места', 'russia-logo.gif', 29, 'второй по численности абонентов оператор сотовой связи в Беларуси. Предоставляет услуги связи стандарта GSM 900/1800 и UMTS. С ноября 2007 года компания входит в состав группы Telekom Austria.'),
(19, 21, 'ALTAIR VR', 'Разработка мобильного приложения симуляции СУ-34 для устройства окулус рифт. ', '0000-00-00', '0000-00-00', '', 'altair-logo.jpg', 15, 'Российский производственный холдинг ALTAIR VR — участник государственной программы по развитию российской промышленности и ее конкурентоспособности, член Ассоциации АВОК, АПИК, «Аэропорты Гражданской Авиации».');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admin`
--
ALTER TABLE `admin`
  ADD UNIQUE KEY `id_admin_2` (`id`),
  ADD KEY `id_admin` (`id`);

--
-- Индексы таблицы `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id_group`),
  ADD UNIQUE KEY `studygroup_2` (`studygroup`),
  ADD KEY `studygroup` (`id_group`),
  ADD KEY `admin` (`admin`);

--
-- Индексы таблицы `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id_person`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `id_person` (`id_person`),
  ADD KEY `id_person_2` (`id_person`),
  ADD KEY `id_person_3` (`id_person`);

--
-- Индексы таблицы `pterodactyl`
--
ALTER TABLE `pterodactyl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_pter` (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Индексы таблицы `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id_vac`,`id_stud`),
  ADD KEY `id_vac` (`id_vac`),
  ADD KEY `id_stud` (`id_stud`);

--
-- Индексы таблицы `resume`
--
ALTER TABLE `resume`
  ADD UNIQUE KEY `id_stud` (`id_stud`);

--
-- Индексы таблицы `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_stud` (`id`),
  ADD KEY `studygroup` (`studygroup`);

--
-- Индексы таблицы `vacancy`
--
ALTER TABLE `vacancy`
  ADD PRIMARY KEY (`id_vac`),
  ADD KEY `id_pter` (`id_pter`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `groups`
--
ALTER TABLE `groups`
  MODIFY `id_group` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `person`
--
ALTER TABLE `person`
  MODIFY `id_person` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
--
-- AUTO_INCREMENT для таблицы `vacancy`
--
ALTER TABLE `vacancy`
  MODIFY `id_vac` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`id`) REFERENCES `person` (`id_person`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `groups_ibfk_1` FOREIGN KEY (`admin`) REFERENCES `admin` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `pterodactyl`
--
ALTER TABLE `pterodactyl`
  ADD CONSTRAINT `pterodactyl_ibfk_1` FOREIGN KEY (`id`) REFERENCES `person` (`id_person`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `request_ibfk_1` FOREIGN KEY (`id_stud`) REFERENCES `student` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `request_ibfk_2` FOREIGN KEY (`id_vac`) REFERENCES `vacancy` (`id_vac`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `resume`
--
ALTER TABLE `resume`
  ADD CONSTRAINT `resume_ibfk_1` FOREIGN KEY (`id_stud`) REFERENCES `student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`id`) REFERENCES `person` (`id_person`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`studygroup`) REFERENCES `groups` (`id_group`) ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `vacancy`
--
ALTER TABLE `vacancy`
  ADD CONSTRAINT `vacancy_ibfk_1` FOREIGN KEY (`id_pter`) REFERENCES `pterodactyl` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
