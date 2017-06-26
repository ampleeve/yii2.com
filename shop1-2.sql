-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Май 29 2017 г., 16:13
-- Версия сервера: 10.1.21-MariaDB
-- Версия PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop1`
--
CREATE DATABASE IF NOT EXISTS `shop1` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `shop1`;

-- --------------------------------------------------------

--
-- Структура таблицы `brand`
--

DROP TABLE IF EXISTS `brand`;
CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `brand`
--

INSERT INTO `brand` (`id`, `name`) VALUES
(1, 'Gucci'),
(2, 'guci'),
(3, 'hemes'),
(4, 'bmw'),
(5, 'Adidas'),
(6, 'Marlboro');

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--
-- используется(#1932 - Table 'shop1.category' doesn't exist in engine)
-- Ошибка считывания данных: (#1064 - У вас ошибка в запросе. Изучите документацию по используемой версии MariaDB на предмет корректного синтаксиса около 'FROM `shop1`.`category`' на строке 1)

-- --------------------------------------------------------

--
-- Структура таблицы `customer`
--
-- используется(#1932 - Table 'shop1.customer' doesn't exist in engine)
-- Ошибка считывания данных: (#1064 - У вас ошибка в запросе. Изучите документацию по используемой версии MariaDB на предмет корректного синтаксиса около 'FROM `shop1`.`customer`' на строке 1)

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1489936042),
('m170319_144756_new_table_vendor', 1489936102),
('m170319_151646_newTableVendor', 1489936960),
('m170319_152308_newTest', 1489937114),
('m170319_152559_newTest1', 1489937430);

-- --------------------------------------------------------

--
-- Структура таблицы `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `order`
--

INSERT INTO `order` (`id`, `customerID`, `date`) VALUES
(1, 1, '2017-02-10 18:45:07'),
(2, 1, '2017-01-10 18:45:07'),
(3, 1, '2016-12-10 18:45:07'),
(4, 1, '2016-11-10 18:45:07'),
(5, 1, '2016-10-10 18:45:07'),
(6, 1, '2016-09-10 18:45:07');

-- --------------------------------------------------------

--
-- Структура таблицы `orderProduct`
--
-- используется(#1932 - Table 'shop1.orderproduct' doesn't exist in engine)
-- Ошибка считывания данных: (#1064 - У вас ошибка в запросе. Изучите документацию по используемой версии MariaDB на предмет корректного синтаксиса около 'FROM `shop1`.`orderProduct`' на строке 1)

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--
-- используется(#1932 - Table 'shop1.product' doesn't exist in engine)
-- Ошибка считывания данных: (#1064 - У вас ошибка в запросе. Изучите документацию по используемой версии MariaDB на предмет корректного синтаксиса около 'FROM `shop1`.`product`' на строке 1)

-- --------------------------------------------------------

--
-- Структура таблицы `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `userID` int(11) NOT NULL,
  `lastUpdate` datetime NOT NULL,
  `sid` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sessions`
--

INSERT INTO `sessions` (`userID`, `lastUpdate`, `sid`) VALUES
(3, '2017-03-18 17:44:24', 'biszxzUkbl');

-- --------------------------------------------------------

--
-- Структура таблицы `type`
--
-- используется(#1932 - Table 'shop1.type' doesn't exist in engine)
-- Ошибка считывания данных: (#1064 - У вас ошибка в запросе. Изучите документацию по используемой версии MariaDB на предмет корректного синтаксиса около 'FROM `shop1`.`type`' на строке 1)

-- --------------------------------------------------------

--
-- Структура таблицы `vendor`
--

DROP TABLE IF EXISTS `vendor`;
CREATE TABLE `vendor` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkCustomerOrder_idx` (`customerID`);

--
-- Индексы таблицы `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`sid`),
  ADD KEY `fkUid_idx` (`userID`);

--
-- Индексы таблицы `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fkCustomerOrder` FOREIGN KEY (`customerID`) REFERENCES `customer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `fkUid` FOREIGN KEY (`userID`) REFERENCES `customer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
