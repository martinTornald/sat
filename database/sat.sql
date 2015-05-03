-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 03 2015 г., 18:51
-- Версия сервера: 5.5.41-log
-- Версия PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `sat`
--

-- --------------------------------------------------------

--
-- Структура таблицы `car`
--

CREATE TABLE IF NOT EXISTS `car` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `owner_id` int(11) NOT NULL DEFAULT '0' COMMENT 'Владельц',
  `insurance_id` int(11) NOT NULL DEFAULT '0' COMMENT 'Страховка',
  `make_model` varchar(255) DEFAULT '' COMMENT 'Модель',
  `number` varchar(50) NOT NULL DEFAULT '' COMMENT 'Номер',
  `color` varchar(255) DEFAULT '' COMMENT 'Цвет',
  `year` year(4) DEFAULT '0000' COMMENT 'Год выпуска',
  `reg_number` varchar(255) NOT NULL DEFAULT '' COMMENT 'Регистрационный номер',
  `reg_certificate` varchar(255) NOT NULL DEFAULT '' COMMENT 'Регистрационный сертификат',
  `mileage` int(11) DEFAULT '0' COMMENT 'Пробег',
  `photo` varchar(255) DEFAULT '' COMMENT 'Фото',
  `cost` double DEFAULT '0' COMMENT 'Стоимость',
  PRIMARY KEY (`id`),
  KEY `ix_carOwnerIx` (`owner_id`) USING BTREE COMMENT 'Индекс для владельца машины',
  KEY `ix_carInsurance` (`insurance_id`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Таблица, сожержащая информацию о всех машинах.' AUTO_INCREMENT=77 ;

--
-- Дамп данных таблицы `car`
--

INSERT INTO `car` (`id`, `owner_id`, `insurance_id`, `make_model`, `number`, `color`, `year`, `reg_number`, `reg_certificate`, `mileage`, `photo`, `cost`) VALUES
(0, 0, 0, 'Scania R4X2HNA', 'YS2R4X20002060290', 'Белый', 2010, 'С143НТ154', '2147483647', 0, '0', 0),
(1, 0, 0, 'Scania P114 GA4X2NA 340', '9BSP4X20003595081', 'Красный', 2006, 'С142ВМ154', '2147483647', 0, '0', 0),
(2, 0, 0, 'Scania G400LA4X2HXA', 'YS2G4X20002085897', 'Белый', 2013, 'Р713ЕУ178', '2147483647', 0, '0', 0),
(3, 0, 0, 'VOLVOFHTRUCK', 'YV2ASG0A88A672691', 'Белый', 2008, 'С144ОО154', '2147483647', 0, '0', 0),
(4, 0, 0, 'DAFFT85CF38004X2', 'XLRTE85XC0E531714', 'Красный', 2000, 'Е146АТ154', '2147483647', 0, '0', 0),
(5, 0, 0, 'DAF85CF38004X2', 'XLRTE85XC0E526253', 'Белый', 2000, 'P063CP54', '54XC 600145', 0, '0', 0),
(76, 41, 1, '13213', '123213', '123213', 0000, '1231', '1231', 123, '123123', 12313);

-- --------------------------------------------------------

--
-- Структура таблицы `cost`
--

CREATE TABLE IF NOT EXISTS `cost` (
  `voyage_id` int(11) NOT NULL DEFAULT '0' COMMENT 'Перевозка',
  `plan` double(11,0) DEFAULT '0' COMMENT 'Планируемая стоимость',
  `fact` double DEFAULT NULL COMMENT 'Фактическая стоимость',
  PRIMARY KEY (`voyage_id`),
  KEY `ix_costVoyage` (`voyage_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Таблица, сожержащая информацию о стоимости перевозок.';

-- --------------------------------------------------------

--
-- Структура таблицы `cost_driver`
--

CREATE TABLE IF NOT EXISTS `cost_driver` (
  `voyage_id` int(11) NOT NULL DEFAULT '0' COMMENT 'Перевозка',
  `costs` float(11,0) NOT NULL DEFAULT '0' COMMENT 'Расходы',
  PRIMARY KEY (`voyage_id`),
  KEY `ix_costDriver` (`voyage_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Таблица, сожержащая информацию о расходах на водителя.';

-- --------------------------------------------------------

--
-- Структура таблицы `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company` varchar(127) NOT NULL DEFAULT '' COMMENT 'Имя',
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT 'Компания',
  `phone` varchar(255) NOT NULL DEFAULT '' COMMENT 'Телефон',
  PRIMARY KEY (`id`),
  KEY `ix_customerId` (`id`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Таблица, содержащая всю информацию о заказчиках.' AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `customer`
--

INSERT INTO `customer` (`id`, `company`, `name`, `phone`) VALUES
(0, 'ИЦТ-Новосибирск', 'Наталья', '+79138796464'),
(1, 'Сервис-групп', 'Ирина', '+79139174568');

-- --------------------------------------------------------

--
-- Структура таблицы `distance`
--

CREATE TABLE IF NOT EXISTS `distance` (
  `voyage_id` int(11) NOT NULL DEFAULT '0' COMMENT 'Перевозка',
  `plan` float DEFAULT '0' COMMENT 'Ожидаемая дальность',
  `fact` float DEFAULT '0' COMMENT 'Фактическая дальность',
  PRIMARY KEY (`voyage_id`),
  KEY `ix_distanceVoyage` (`voyage_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Таблица, содержащая информацию о планируемой и фактической дальности перевозок.';

--
-- Дамп данных таблицы `distance`
--

INSERT INTO `distance` (`voyage_id`, `plan`, `fact`) VALUES
(0, 10, 12);

-- --------------------------------------------------------

--
-- Структура таблицы `driver`
--

CREATE TABLE IF NOT EXISTS `driver` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `passport` varchar(255) NOT NULL COMMENT 'Паспорт',
  `license` varchar(255) NOT NULL COMMENT 'Лицензия',
  `surname` varchar(50) NOT NULL COMMENT 'Фамилия',
  `name` varchar(50) NOT NULL COMMENT 'Имя',
  `patronymic` varchar(50) NOT NULL COMMENT 'Отчество',
  `address` varchar(255) NOT NULL COMMENT 'Адрес',
  `phone` varchar(255) NOT NULL COMMENT 'Телефон',
  PRIMARY KEY (`id`),
  KEY `ix_driverPassport` (`passport`) USING BTREE,
  KEY `ix_driverLicense` (`license`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Таблица, содержащая информацию о всех водителях.' AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `driver`
--

INSERT INTO `driver` (`id`, `passport`, `license`, `surname`, `name`, `patronymic`, `address`, `phone`) VALUES
(0, '0', '0', 'Агалаков', 'Василий', 'Алексеевич', 'г.Новосибирск', '+79137233744 +79139467132'),
(1, '0', '0', 'Курочкин ', 'Дмитрий', 'Викторович ', 'г.Новосибирск', '+79833161654'),
(2, '0', '0', 'Самохвалов', 'Александр', 'Евгеньевич', 'г.Новосибирск', '+79137989130'),
(3, '0', '0', 'Слинько', 'Сергей', 'Валентинович', 'г. Тюмень', '+79139869583'),
(4, '0', '0', 'Никитин', 'Виктор', 'Николаевич', 'г. Искитим', '+79231751236'),
(5, '0', '0', 'Шихов', 'Сергей', 'Михайлович', 'п. Грибной ул.Мира 17, кв3', '+79137465275'),
(6, '0', '0', 'Коваленко', 'Владимир', 'Павлович', 'dsfs', '+79137423107');

-- --------------------------------------------------------

--
-- Структура таблицы `driver_tool`
--

CREATE TABLE IF NOT EXISTS `driver_tool` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `driver_id` int(11) NOT NULL,
  `tool_id` int(11) NOT NULL,
  `date_of_issue` datetime NOT NULL,
  `date_delivery` datetime DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`),
  KEY `ix_driverToolToolId` (`tool_id`) USING BTREE,
  KEY `ix_driverToolDriverId` (`driver_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `income`
--

CREATE TABLE IF NOT EXISTS `income` (
  `voyage_id` int(11) NOT NULL,
  `fact` float(11,0) NOT NULL,
  PRIMARY KEY (`voyage_id`),
  KEY `ix_incomeVoyage` (`voyage_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `insurance`
--

CREATE TABLE IF NOT EXISTS `insurance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT 'Наименование',
  `createdAt` date NOT NULL DEFAULT '0000-00-00' COMMENT 'Дата выдачи',
  `term` date NOT NULL DEFAULT '0000-00-00' COMMENT 'Срок действия',
  `description` text COMMENT 'Описание',
  PRIMARY KEY (`id`),
  KEY `ix_insuranceId` (`id`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Таблица, сожержащая информацию о всех страховках.' AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `insurance`
--

INSERT INTO `insurance` (`id`, `name`, `createdAt`, `term`, `description`) VALUES
(1, 'nora', '2015-04-30', '2015-05-03', 'Papa -paap'),
(2, 'xxx', '2010-10-20', '2010-10-20', 'xxxx');

-- --------------------------------------------------------

--
-- Структура таблицы `loading`
--

CREATE TABLE IF NOT EXISTS `loading` (
  `voyage_id` int(11) NOT NULL DEFAULT '0' COMMENT 'Перевозка',
  `place` varchar(255) DEFAULT '' COMMENT 'Место загрузки',
  `plan` date DEFAULT NULL COMMENT 'Ожидаемая дата загрузки',
  `fact` date DEFAULT NULL COMMENT 'Фактическая дата загрузки',
  PRIMARY KEY (`voyage_id`),
  KEY `ix_loadingVoyage` (`voyage_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Таблица, сожержащая информацию о времени и месте загрузки машин.';

--
-- Дамп данных таблицы `loading`
--

INSERT INTO `loading` (`voyage_id`, `place`, `plan`, `fact`) VALUES
(0, 'Vff', '2015-04-28', '2015-04-21');

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `alias` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `alias`, `apply_time`) VALUES
('m000000_000000_base', '@app/migrations', 1429900373),
('m140209_132017_init', '@dektrium/user/migrations', 1429900387),
('m140403_174025_create_account_table', '@dektrium/user/migrations', 1429900387),
('m140504_113157_update_tables', '@dektrium/user/migrations', 1429900391),
('m140504_130429_create_token_table', '@dektrium/user/migrations', 1429900391),
('m140830_171933_fix_ip_field', '@dektrium/user/migrations', 1429900392),
('m140830_172703_change_account_table_name', '@dektrium/user/migrations', 1429900392),
('m141222_110026_update_ip_field', '@dektrium/user/migrations', 1429900392);

-- --------------------------------------------------------

--
-- Структура таблицы `owner`
--

CREATE TABLE IF NOT EXISTS `owner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `surname` varchar(50) NOT NULL COMMENT 'Фамилия',
  `name` varchar(50) NOT NULL COMMENT 'Имя',
  `patronymic` varchar(50) NOT NULL COMMENT 'Отчество',
  `passport` varchar(255) NOT NULL COMMENT 'Паспорт',
  `phone` varchar(255) NOT NULL COMMENT 'Телефон',
  PRIMARY KEY (`id`),
  KEY `ix_ownerPassport` (`passport`) USING BTREE,
  KEY `ix_ownerId` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Таблица, содержащая персональную информацию о владельцах.' AUTO_INCREMENT=43 ;

--
-- Дамп данных таблицы `owner`
--

INSERT INTO `owner` (`id`, `surname`, `name`, `patronymic`, `passport`, `phone`) VALUES
(0, 'Беляева', 'Ольга', 'Викторовна', '0', '+79139874444'),
(41, 'Максимов', 'Василий', 'Петрович', '112232323', '+7 923 433 11 11'),
(42, 'Dff', 'ddd', 'eee', 'fdsffsdf', 'dfdfd');

-- --------------------------------------------------------

--
-- Структура таблицы `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `public_email` varchar(255) DEFAULT NULL,
  `gravatar_email` varchar(255) DEFAULT NULL,
  `gravatar_id` varchar(32) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `bio` text,
  PRIMARY KEY (`user_id`),
  KEY `ix_profile` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `profile`
--

INSERT INTO `profile` (`user_id`, `name`, `public_email`, `gravatar_email`, `gravatar_id`, `location`, `website`, `bio`) VALUES
(1, NULL, NULL, 'admin@myapp.local', '632c8988831808e77ad27c4215384254', NULL, NULL, NULL),
(2, 'Alex', 'fafnur@yandex.rru', 'fafnur@yandex.ru', 'f1b7ba26eda8786d4f3c0fe486bed1d0', 'Novosibirsk', 'http://alex92.ru', 'Web developer'),
(3, NULL, NULL, 'asa@dfdf.ty', '0f6ded5adff79cd40d11cbe91d75378e', NULL, NULL, NULL),
(4, NULL, NULL, 'dd@fd.rt', '64d0931e6ebdb736af5fe1a312a63111', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `rate`
--

CREATE TABLE IF NOT EXISTS `rate` (
  `voyage_id` int(11) NOT NULL DEFAULT '0' COMMENT 'Перевозка',
  `prepayment` float(11,0) DEFAULT '0' COMMENT 'Предоплата',
  `payment` float(11,0) DEFAULT '0' COMMENT 'Оплата',
  `debt` float(11,0) DEFAULT '0' COMMENT 'Задолженность',
  PRIMARY KEY (`voyage_id`),
  KEY `ix_rateVoyage` (`voyage_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Таблица, сожержащая информацию о платежах.';

-- --------------------------------------------------------

--
-- Структура таблицы `social_account`
--

CREATE TABLE IF NOT EXISTS `social_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `provider` varchar(255) NOT NULL,
  `client_id` varchar(255) NOT NULL,
  `data` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `account_unique` (`provider`,`client_id`),
  KEY `fk_user_account` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `spare_part`
--

CREATE TABLE IF NOT EXISTS `spare_part` (
  `voyage_id` int(11) NOT NULL DEFAULT '0' COMMENT 'Перевозка',
  `plan` tinyint(1) DEFAULT NULL COMMENT 'Запланированная деталь',
  `name` varchar(255) DEFAULT NULL COMMENT 'Наименование',
  `price` float(11,0) DEFAULT '0' COMMENT 'Цена',
  PRIMARY KEY (`voyage_id`),
  KEY `ix_sparePartVoyage` (`voyage_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Таблица, сожержащая информацию о всех запчастях для перевозки.';

-- --------------------------------------------------------

--
-- Структура таблицы `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL COMMENT 'Тип',
  `description` text COMMENT 'Описание',
  PRIMARY KEY (`id`),
  KEY `ix_voyageStatusId` (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Таблица, сожержащая информацию о всех статусах перевозок.' AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `status`
--

INSERT INTO `status` (`id`, `type`, `description`) VALUES
(0, 0, 'Все доставлено');

-- --------------------------------------------------------

--
-- Структура таблицы `token`
--

CREATE TABLE IF NOT EXISTS `token` (
  `user_id` int(11) NOT NULL,
  `code` varchar(32) NOT NULL,
  `created_at` int(11) NOT NULL,
  `type` smallint(6) NOT NULL,
  UNIQUE KEY `token_unique` (`user_id`,`code`,`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `tool`
--

CREATE TABLE IF NOT EXISTS `tool` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `name` int(11) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`),
  KEY `ix_tool` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `trailer`
--

CREATE TABLE IF NOT EXISTS `trailer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `make_model` varchar(255) NOT NULL DEFAULT '' COMMENT 'Модель',
  `number` varchar(50) NOT NULL DEFAULT '' COMMENT 'Номер',
  `type` varchar(255) NOT NULL DEFAULT '' COMMENT 'Тип',
  `year` year(4) NOT NULL DEFAULT '0000' COMMENT 'Год выпуска',
  `reg_number` varchar(255) NOT NULL DEFAULT '' COMMENT 'Регистрационный номер',
  `reg_certificate` varchar(255) NOT NULL DEFAULT '' COMMENT 'Регистрационный сертификат',
  `id_owner` int(11) NOT NULL DEFAULT '0' COMMENT 'Владелец',
  `photo` varchar(255) NOT NULL DEFAULT '' COMMENT 'Фото',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Таблица, сожержащая информацию о всех прицепах.' AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `trailer`
--

INSERT INTO `trailer` (`id`, `make_model`, `number`, `type`, `year`, `reg_number`, `reg_certificate`, `id_owner`, `photo`) VALUES
(0, 'SCHMITZ S01', 'WSMS6980000491919', 'полуприцеп бортовой', 2003, 'НО2423 54', '5404 537962', 0, '0'),
(4, '901100', 'Z0P901100C0000076', 'полуприцеп прочие', 2012, 'НО5862 54', '5404 545559', 0, '0'),
(5, 'KRONE SD', 'WKESD000000480286', 'полуприцеп прочие', 2010, '0', '0', 0, '0'),
(6, 'KRONE SDR 27', 'WKESDR27011380829', 'полуприцеп прочие', 2003, 'НО7607 54', '5409 228484', 0, '0'),
(7, 'SCHMITZSK027', 'WSMSKO27000063656', 'прицеп прочие', 1993, 'НО9516 54', '5413 149901', 0, '0'),
(8, 'SCHMITZSK027', 'WSMSKO27000063656', 'прицеп прочие', 1993, 'НО9516 54', '5413 149901', 0, '0');

-- --------------------------------------------------------

--
-- Структура таблицы `unloading`
--

CREATE TABLE IF NOT EXISTS `unloading` (
  `voyage_id` int(11) NOT NULL,
  `place` varchar(255) DEFAULT '' COMMENT 'Место разгрузки',
  `plan` date DEFAULT NULL COMMENT 'Ожидаемая дата разгрузки',
  `fact` date DEFAULT NULL COMMENT 'Фактическая дата разгрузки',
  PRIMARY KEY (`voyage_id`),
  KEY `unloadingVoyage` (`voyage_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Таблица, сожержащая информацию о времени и месте разгрузки машин.';

--
-- Дамп данных таблицы `unloading`
--

INSERT INTO `unloading` (`voyage_id`, `place`, `plan`, `fact`) VALUES
(0, 'Vff', '2015-04-28', '2015-04-21');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(60) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `confirmed_at` int(11) DEFAULT NULL,
  `unconfirmed_email` varchar(255) DEFAULT NULL,
  `blocked_at` int(11) DEFAULT NULL,
  `registration_ip` varchar(45) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `flags` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_unique_username` (`username`),
  UNIQUE KEY `user_unique_email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password_hash`, `auth_key`, `confirmed_at`, `unconfirmed_email`, `blocked_at`, `registration_ip`, `created_at`, `updated_at`, `flags`) VALUES
(1, 'admin', 'admin@myapp.local', '$2y$10$g2cu94PfLLMOIaX9K3tiG.T6CHGxRs6NVDzSJblI/7gKshJZdMPXu', 'uYWlfdc6PidtE_UD7OBzi0hA-7pr_Isu', 1429900400, NULL, NULL, NULL, 1429900397, 1429900397, 0),
(2, 'fafnur', 'fafnur@yandex.ru', '$2y$10$FhjeCyHrQ.XCwVyIfcCB2.6LzDH97/Jtt0W0uxYjRVlc0c1IZ16Iy', 'qxtVBaoKnChfWR4FNITLF_-S5pZ5X_dp', 1430068416, NULL, NULL, '127.0.0.1', 1430068416, 1430068416, 0),
(3, 'ase', 'asa@dfdf.ty', '$2y$10$jjQbIm9AwxsTWaLM4CB5huwWUVW.XtuFf.kcM9vWo5U6YrpQNxn1W', 'FAW6vrqybkP5gFPFjGShl7ux1P5kCoGe', 1430238401, NULL, NULL, '127.0.0.1', 1430238401, 1430238401, 0),
(4, 'ddddd', 'dd@fd.rt', '$2y$10$tQQGBhEjK0FW1U/tQuWuI.Z3uC2JKAPCcDScTHDR4wz/Cu5drttAK', 'ZNxlIrWdDWQetxloEXs_W9l_Fmzx3_Iz', 1430312506, NULL, NULL, '127.0.0.1', 1430312506, 1430312506, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `voyage`
--

CREATE TABLE IF NOT EXISTS `voyage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL DEFAULT '0' COMMENT 'Заказчик',
  `car_id` int(11) NOT NULL DEFAULT '0' COMMENT 'Машина',
  `trailer_id` int(11) NOT NULL DEFAULT '0' COMMENT 'Прицеп',
  `driver_id` int(11) NOT NULL DEFAULT '0' COMMENT 'Водитель',
  `status_id` int(11) NOT NULL DEFAULT '0' COMMENT 'Статус',
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT 'Название перевозки',
  `description` text COMMENT 'Описание перевозки',
  `updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Дата обновления',
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Дата создания',
  PRIMARY KEY (`id`),
  KEY `voyageId` (`id`),
  KEY `voyageCustomer` (`customer_id`),
  KEY `voyageCar` (`car_id`),
  KEY `voyageTrailer` (`trailer_id`),
  KEY `voyageDriver` (`driver_id`),
  KEY `voyageStatus` (`status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Таблица, сожержащая информацию о всех перевозках.' AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `voyage`
--

INSERT INTO `voyage` (`id`, `customer_id`, `car_id`, `trailer_id`, `driver_id`, `status_id`, `name`, `description`, `updated`, `created_at`) VALUES
(0, 0, 0, 0, 0, 0, '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `fk_carInsurance` FOREIGN KEY (`insurance_id`) REFERENCES `insurance` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_carOwner` FOREIGN KEY (`owner_id`) REFERENCES `owner` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `cost`
--
ALTER TABLE `cost`
  ADD CONSTRAINT `fk_costVoyage` FOREIGN KEY (`voyage_id`) REFERENCES `voyage` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `cost_driver`
--
ALTER TABLE `cost_driver`
  ADD CONSTRAINT `fk_costDriver` FOREIGN KEY (`voyage_id`) REFERENCES `voyage` (`id`);

--
-- Ограничения внешнего ключа таблицы `distance`
--
ALTER TABLE `distance`
  ADD CONSTRAINT `fk_distanceVoyage` FOREIGN KEY (`voyage_id`) REFERENCES `voyage` (`id`);

--
-- Ограничения внешнего ключа таблицы `driver_tool`
--
ALTER TABLE `driver_tool`
  ADD CONSTRAINT `fk_driverToolDriverId` FOREIGN KEY (`driver_id`) REFERENCES `driver` (`id`),
  ADD CONSTRAINT `fk_driverToolToolId` FOREIGN KEY (`tool_id`) REFERENCES `tool` (`id`);

--
-- Ограничения внешнего ключа таблицы `income`
--
ALTER TABLE `income`
  ADD CONSTRAINT `fk_incomeVoyage` FOREIGN KEY (`voyage_id`) REFERENCES `voyage` (`id`);

--
-- Ограничения внешнего ключа таблицы `loading`
--
ALTER TABLE `loading`
  ADD CONSTRAINT `fk_loadingVoyage` FOREIGN KEY (`voyage_id`) REFERENCES `voyage` (`id`);

--
-- Ограничения внешнего ключа таблицы `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `fk_profileUser` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Ограничения внешнего ключа таблицы `rate`
--
ALTER TABLE `rate`
  ADD CONSTRAINT `fk_rateVoyage` FOREIGN KEY (`voyage_id`) REFERENCES `voyage` (`id`);

--
-- Ограничения внешнего ключа таблицы `social_account`
--
ALTER TABLE `social_account`
  ADD CONSTRAINT `fk_user_account` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `spare_part`
--
ALTER TABLE `spare_part`
  ADD CONSTRAINT `fk_sparePartVoyage` FOREIGN KEY (`voyage_id`) REFERENCES `voyage` (`id`);

--
-- Ограничения внешнего ключа таблицы `token`
--
ALTER TABLE `token`
  ADD CONSTRAINT `fk_user_token` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `unloading`
--
ALTER TABLE `unloading`
  ADD CONSTRAINT `unloadingVoyage` FOREIGN KEY (`voyage_id`) REFERENCES `voyage` (`id`);

--
-- Ограничения внешнего ключа таблицы `voyage`
--
ALTER TABLE `voyage`
  ADD CONSTRAINT `voyageCar` FOREIGN KEY (`car_id`) REFERENCES `car` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `voyageCustomer` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `voyageDriver` FOREIGN KEY (`driver_id`) REFERENCES `driver` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `voyageStatus` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `voyageTrailer` FOREIGN KEY (`trailer_id`) REFERENCES `trailer` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
