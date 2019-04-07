-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Апр 07 2019 г., 22:50
-- Версия сервера: 5.5.56-MariaDB
-- Версия PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `mdlshop2`
--

-- --------------------------------------------------------

--
-- Структура таблицы `ms_adminmenu`
--

CREATE TABLE IF NOT EXISTS `ms_adminmenu` (
  `id` int(11) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ms_adminmenu`
--

INSERT INTO `ms_adminmenu` (`id`, `title`, `link`) VALUES
(1, 'Admin-панель', '/admin'),
(2, 'Продавцы', '/sellers'),
(3, 'Статистика заказов', '/orders_statistics'),
(4, 'Управление секциями', '/edittopics'),
(5, 'Управление разделами', '/editsections'),
(6, 'Управление категориями', '/editcategories');

-- --------------------------------------------------------

--
-- Структура таблицы `ms_categories`
--

CREATE TABLE IF NOT EXISTS `ms_categories` (
  `id` int(11) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `section_id` int(11) unsigned NOT NULL,
  `sef` varchar(255) DEFAULT NULL,
  `text` text,
  `properties` text
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ms_categories`
--

INSERT INTO `ms_categories` (`id`, `title`, `section_id`, `sef`, `text`, `properties`) VALUES
(1, 'Apple iPad', 1, 'ballu', '', 'Свойство,Свойство2,Свойство3'),
(2, 'Apple iPhone', 1, 'zanussi', '', NULL),
(3, 'Смартфоны', 1, 'delta', '', NULL),
(4, 'Ноутбуки', 1, 'mystery', '', NULL),
(5, 'Планшеты', 1, 'vitek', '', NULL),
(6, 'MP3-плееры', 1, 'behtc', '', NULL),
(7, 'Мониторы', 1, 'polaris', '', NULL),
(8, 'Принтеры', 1, 'scarlett', '', NULL),
(9, 'Кондиционеры "BALLU"', 2, 'ballu', '', NULL),
(10, 'Кондиционеры "ELECTROLUX"', 2, 'electrolux', '', NULL),
(11, 'Кондиционеры "NEONIX"', 2, 'neonix', '', NULL),
(13, 'Кондиционеры "ОАЗИС AKVILION"', 2, 'akvilion', '', NULL),
(14, 'Воздуховоды', 5, '', '', NULL),
(15, 'Вытяжки', 5, '', '', NULL),
(16, 'Газовые баллоны', 5, '', '', NULL),
(17, 'Газовые горелки', 5, '', '', NULL),
(18, 'Газовые колонки', 5, '', '', NULL),
(19, 'Газовые котлы', 5, '', '', NULL),
(20, 'Газовые плиты', 5, '', '', NULL),
(21, 'Обогреватели', 5, '', '', NULL),
(22, 'Горелки инфракрасные', 5, '', '', NULL),
(23, 'Газовые краны', 5, '', '', NULL),
(24, 'Циркуляционные насосы', 5, '', '', NULL),
(25, 'Печи для бани', 5, '', '', NULL),
(26, 'Счетчики воды', 5, '', '', NULL),
(27, 'Счетчики газа', 5, '', '', NULL),
(28, 'Банные штучки', 6, '', '', NULL),
(29, 'Веники и метлы', 6, '', '', NULL),
(30, 'Весы бытовые', 6, '', '', NULL),
(31, 'Губки и мочалки', 6, '', '', NULL),
(32, 'Доски гладильные', 6, '', '', NULL),
(33, 'Сушилки', 6, '', '', NULL),
(34, 'Кашпо подвесное', 6, '', '', NULL),
(35, 'Клеенка, скатерти', 6, '', '', NULL),
(36, 'Коврики бытовые', 6, '', '', NULL),
(37, 'Литьё печное', 6, '', '', NULL),
(38, 'Мешки для мусора', 6, '', '', NULL),
(39, 'Обувь', 6, '', '', NULL),
(40, 'Оцинкованные изделия', 6, '', '', NULL),
(41, 'Пакеты полиэтиленовые', 6, '', '', NULL),
(42, 'Подцветочники', 6, '', '', NULL),
(43, 'Салфетки', 6, '', '', NULL),
(44, 'Сетка оконная', 6, '', '', NULL),
(45, 'Термометры', 6, '', '', NULL),
(46, 'Товары для отдыха', 6, '', '', NULL),
(47, 'Фильтры для воды', 6, '', '', NULL),
(48, 'Швабры, тряпкодержатели', 6, '', '', NULL),
(49, 'Шнуры, шпагаты', 6, '', '', NULL),
(50, 'Щетки автомобильные', 6, '', '', NULL),
(51, 'Ящики почтовые', 6, '', '', NULL),
(52, 'Матрицы "Д"', 7, '', '', NULL),
(53, 'Нижнее белье', 7, '', '', NULL),
(54, 'Одежда', 7, '', '', NULL),
(55, 'Одежда для сна', 7, '', '', NULL),
(56, 'Одеяла, подушки, пледы', 7, '', '', NULL),
(57, 'Полотенца, салфетки', 7, '', '', NULL),
(58, 'Постельное белье', 7, '', '', NULL),
(59, 'Спецодежда', 7, '', '', NULL),
(60, 'Столовое белье, рукавички', 7, '', '', NULL),
(61, 'Сувениры', 7, '', '', NULL),
(62, 'Халаты, платья, фартуки', 7, '', '', NULL),
(63, 'Чехлы', 7, '', '', NULL),
(64, 'Шторы', 7, '', '', NULL),
(65, 'Новость', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `ms_mainmenu`
--

CREATE TABLE IF NOT EXISTS `ms_mainmenu` (
  `id` int(11) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `ms_products`
--

CREATE TABLE IF NOT EXISTS `ms_products` (
  `id` int(11) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `price` int(5) unsigned NOT NULL,
  `category_id` int(11) unsigned NOT NULL,
  `section_id` int(11) unsigned NOT NULL,
  `text` text NOT NULL,
  `wholesale` int(1) unsigned NOT NULL DEFAULT '0',
  `properties` text,
  `seller_id` int(11) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ms_products`
--

INSERT INTO `ms_products` (`id`, `title`, `img`, `price`, `category_id`, `section_id`, `text`, `wholesale`, `properties`, `seller_id`) VALUES
(1, 'Apple iPad Pro 11', '1.jpg', 12312, 1, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry...', 0, '1,2,3', 1),
(2, 'Apple iPad Pro 11" Wi-Fi 512GB Space Grey', '2.jpg', 62990, 1, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry...', 0, '1,42,-3', 1),
(3, 'Apple iPad 9.7 32GB Wi-Fi Silver Controlling', '3.jpg', 53990, 1, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry...', 0, '145,2,3', 1),
(4, 'Новинка', '4.jpg', 87990, 2, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry...', 0, NULL, 1),
(5, 'Товар 5', 'product.png', 5000, 9, 2, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p> 			<div class="specifications"> 				<table> 					<tr> 						<td> 							<p>Цена:</p> 						</td> 						<td> 							<b class="specification"><?=$price?></b> 						</td> 					</tr> 					<tr> 						<td> 							<p>Вес:</p> 						</td> 						<td> 							<b class="specification">75 кг</b> 						</td> 					</tr> 					<tr> 						<td> 							<p>Цвет:</p> 						</td> 						<td> 							<b class="specification">Белый</b> 						</td> 					</tr> 				</table> 			</div>', 1, NULL, 1),
(6, 'Товар 6', 'product.png', 3500, 10, 2, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p> 			<div class="specifications"> 				<table> 					<tr> 						<td> 							<p>Цена:</p> 						</td> 						<td> 							<b class="specification"><?=$price?></b> 						</td> 					</tr> 					<tr> 						<td> 							<p>Вес:</p> 						</td> 						<td> 							<b class="specification">75 кг</b> 						</td> 					</tr> 					<tr> 						<td> 							<p>Цвет:</p> 						</td> 						<td> 							<b class="specification">Белый</b> 						</td> 					</tr> 				</table> 			</div>', 1, NULL, 1),
(7, 'Новинка 7', 'product.png', 2990, 20, 5, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p> 			<div class="specifications"> 				<table> 					<tr> 						<td> 							<p>Цена:</p> 						</td> 						<td> 							<b class="specification"><?=$price?></b> 						</td> 					</tr> 					<tr> 						<td> 							<p>Вес:</p> 						</td> 						<td> 							<b class="specification">75 кг</b> 						</td> 					</tr> 					<tr> 						<td> 							<p>Цвет:</p> 						</td> 						<td> 							<b class="specification">Белый</b> 						</td> 					</tr> 				</table> 			</div>', 0, NULL, 1),
(8, 'Новинка 8', 'product.png', 3590, 21, 5, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p> 			<div class="specifications"> 				<table> 					<tr> 						<td> 							<p>Цена:</p> 						</td> 						<td> 							<b class="specification"><?=$price?></b> 						</td> 					</tr> 					<tr> 						<td> 							<p>Вес:</p> 						</td> 						<td> 							<b class="specification">75 кг</b> 						</td> 					</tr> 					<tr> 						<td> 							<p>Цвет:</p> 						</td> 						<td> 							<b class="specification">Белый</b> 						</td> 					</tr> 				</table> 			</div>', 0, NULL, 1),
(9, '1C', 'product.png', 550, 1, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry...', 0, '-1,52,3', 1),
(10, 'Товар из 1с', 'product.png', 1000, 1, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry...', 0, '1,-2,3', 1),
(11, 'New Product', '1.jpg', 1, 1, 1, 'asdf', 0, '', 1),
(12, 'New Product', '1.jpg', 1, 1, 1, 'asdf', 0, NULL, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `ms_profits`
--

CREATE TABLE IF NOT EXISTS `ms_profits` (
  `id` int(11) unsigned NOT NULL,
  `seller_id` int(11) unsigned NOT NULL,
  `product_id` int(11) unsigned NOT NULL,
  `procent` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ms_profits`
--

INSERT INTO `ms_profits` (`id`, `seller_id`, `product_id`, `procent`) VALUES
(1, 1, 1, 0.25),
(2, 1, 2, 0.5),
(3, 1, 4, 0.2);

-- --------------------------------------------------------

--
-- Структура таблицы `ms_promo`
--

CREATE TABLE IF NOT EXISTS `ms_promo` (
  `id` int(11) unsigned NOT NULL,
  `code` varchar(255) NOT NULL,
  `procent` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ms_promo`
--

INSERT INTO `ms_promo` (`id`, `code`, `procent`) VALUES
(1, 'asdf', 0.5);

-- --------------------------------------------------------

--
-- Структура таблицы `ms_properties_cat_names`
--

CREATE TABLE IF NOT EXISTS `ms_properties_cat_names` (
  `id` int(11) unsigned NOT NULL,
  `cat_id` int(11) unsigned NOT NULL,
  `attr` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ms_properties_cat_names`
--

INSERT INTO `ms_properties_cat_names` (`id`, `cat_id`, `attr`) VALUES
(1, 1, 'Операционная система'),
(2, 1, 'Количество ядер');

-- --------------------------------------------------------

--
-- Структура таблицы `ms_properties_cat_values`
--

CREATE TABLE IF NOT EXISTS `ms_properties_cat_values` (
  `id` int(11) unsigned NOT NULL,
  `product_id` int(11) unsigned NOT NULL,
  `attr_id` int(11) unsigned NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ms_properties_cat_values`
--

INSERT INTO `ms_properties_cat_values` (`id`, `product_id`, `attr_id`, `value`) VALUES
(1, 1, 1, 'iOS'),
(2, 1, 2, '8'),
(3, 2, 1, 'iOS'),
(4, 2, 2, '10');

-- --------------------------------------------------------

--
-- Структура таблицы `ms_sections`
--

CREATE TABLE IF NOT EXISTS `ms_sections` (
  `id` int(11) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `sef` varchar(255) DEFAULT NULL,
  `topic_id` int(11) unsigned NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ms_sections`
--

INSERT INTO `ms_sections` (`id`, `title`, `img`, `sef`, `topic_id`, `text`) VALUES
(1, 'Цифровая техника', '1.jpg', 'fans', 1, 'Чтобы быть современным, важно быть мобильным и всегда оставаться на связи. Помогут в этом цифровые устройства: планшеты, смартфоны, ноутбуки, электронные книги. Современные устройства функционируют практически в любом месте: будь то самолет или дача. Много интересного придумано и для развлечения и отдыха: предустановленные приложения и развлекательные сервисы, технологии улучшения изображения и звука.'),
(2, 'Крупная бытовая техника', '2.jpg', 'conditioning', 1, 'Крупная бытовая техника – это, прежде всего, техника, без которой не может обойтись ни одна семья - холодильники, стиральные машины, плиты, вытяжки. Также к крупной бытовой технике относятся посудомоечные и сушильные машины, морозильные камеры, винные и сигаретные шкафы – с ними жизнь значительно упрощается и наполняется новыми удовольствиями. Как правило, крупную бытовую технику приобретают с расчетом на многолетнее использование. Именно поэтому так важно выбирать качественные и удобные модели.'),
(3, 'Красота и здоровье', '3.jpg', 'eltools', 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s...'),
(4, 'Климат', '4.jpg', 'benztools', 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s...'),
(5, 'Для кухни', '5.jpg', 'stove', 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s...'),
(6, 'Хоз. товары', 'bucket.png', 'bucket', 0, ''),
(7, 'Швейные изделия', 'garments.png', 'garments', 0, ''),
(8, 'Отделочные материалы', 'decoration_materials.png', 'decoration_materials', 0, ''),
(9, 'Изделия из дерева', 'tree_materials.png', 'tree_materials', 0, ''),
(10, 'Строительные материалы', 'construction_materials.png', 'construction_materials', 0, ''),
(11, 'Замки', 'castle.png', 'castle', 0, ''),
(12, 'Ручной инструмент', 'hand_tool.png', '', 0, ''),
(13, 'Бытовая техника', 'home_technics.png', '', 0, ''),
(14, 'Светотехника', 'lighting_equipment.png', '', 0, ''),
(15, 'Посуда', 'dishes.png', '', 0, ''),
(16, 'Пластиковые изделия', 'plastic.png', '', 0, ''),
(17, 'Лаки и краски', 'paints.png', '', 0, ''),
(18, 'Двери', 'doors.png', '', 0, ''),
(19, 'Теплые полы', 'warmfloor.png', '', 0, ''),
(20, 'Сантехника', 'plumbing.png', '', 0, ''),
(21, 'Для огорода и сада', 'gardenproducts.png', '', 0, ''),
(22, 'Вешалки', 'hangers.png', '', 0, ''),
(23, 'Раздел', '1.jpg', NULL, 1, 'asdf');

-- --------------------------------------------------------

--
-- Структура таблицы `ms_sef`
--

CREATE TABLE IF NOT EXISTS `ms_sef` (
  `id` int(11) unsigned NOT NULL,
  `link` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ms_sef`
--

INSERT INTO `ms_sef` (`id`, `link`, `alias`) VALUES
(1, '/category?id=1', 'ballu'),
(2, '/section?id=1', 'fans'),
(3, '/product?id=1', 'product1');

-- --------------------------------------------------------

--
-- Структура таблицы `ms_sellermenu`
--

CREATE TABLE IF NOT EXISTS `ms_sellermenu` (
  `id` int(11) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ms_sellermenu`
--

INSERT INTO `ms_sellermenu` (`id`, `title`, `link`) VALUES
(1, 'Панель продавца', '/seller'),
(2, 'Управление товарами', '/editproducts'),
(3, 'Управление акциями', '/editprofits');

-- --------------------------------------------------------

--
-- Структура таблицы `ms_sellers`
--

CREATE TABLE IF NOT EXISTS `ms_sellers` (
  `id` int(11) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ms_sellers`
--

INSERT INTO `ms_sellers` (`id`, `title`, `text`) VALUES
(1, 'СуперТоргМаг', 'Данный магазин специализируется на продаже определенный видов товаров, обговоренных непонятно кем и непонятно где. Тем не менее, мы должны иметь хоть какое-то описание!'),
(2, 'MedalShop1', '123'),
(3, 'Seller1', 'Asdf');

-- --------------------------------------------------------

--
-- Структура таблицы `ms_systemmenu`
--

CREATE TABLE IF NOT EXISTS `ms_systemmenu` (
  `id` int(11) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ms_systemmenu`
--

INSERT INTO `ms_systemmenu` (`id`, `title`, `link`) VALUES
(1, 'Главная', '/'),
(2, 'Оплата и доставка', '/paydelivery'),
(3, 'Сотрудничество', '/partners'),
(4, 'Контакты', '/contact');

-- --------------------------------------------------------

--
-- Структура таблицы `ms_topics`
--

CREATE TABLE IF NOT EXISTS `ms_topics` (
  `id` int(11) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `sef` varchar(255) DEFAULT NULL,
  `meta_key` text,
  `meta_desk` text
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ms_topics`
--

INSERT INTO `ms_topics` (`id`, `title`, `img`, `sef`, `meta_key`, `meta_desk`) VALUES
(1, 'Бытовая техника', '', 'topic1', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `ms_usermenu`
--

CREATE TABLE IF NOT EXISTS `ms_usermenu` (
  `id` int(11) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ms_usermenu`
--

INSERT INTO `ms_usermenu` (`id`, `title`, `link`) VALUES
(1, 'Моя страница', '/user'),
(2, 'Мои заказы', '/myorders'),
(3, 'Список желаний', '/wishlist'),
(4, 'Выход из панели', '/logout');

-- --------------------------------------------------------

--
-- Структура таблицы `ms_userorders`
--

CREATE TABLE IF NOT EXISTS `ms_userorders` (
  `id` int(11) unsigned NOT NULL,
  `id_product` int(11) unsigned NOT NULL,
  `count` int(11) unsigned NOT NULL,
  `date` varchar(255) NOT NULL,
  `status` int(1) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `price` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ms_userorders`
--

INSERT INTO `ms_userorders` (`id`, `id_product`, `count`, `date`, `status`, `user_id`, `price`) VALUES
(1, 1, 1, '2019-01-18', 0, 5, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `ms_users`
--

CREATE TABLE IF NOT EXISTS `ms_users` (
  `id` int(11) unsigned NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `patronymic` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `is_admin` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `is_moderator` int(1) unsigned DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ms_users`
--

INSERT INTO `ms_users` (`id`, `login`, `password`, `name`, `surname`, `patronymic`, `phone`, `email`, `address`, `is_admin`, `is_moderator`) VALUES
(1, 'admin', '2f2b2adb68e83de7433190e454536813', 'Алексей', 'Медведев', 'Валерьевич', '+79374173355', 'admin@asdf.ru', 'ул. Менявозят,1а', 1, 1),
(2, 'user', '25d55ad283aa400af464c76d713c07ad', 'Лёша', 'Медведев', 'Попович', '112', 'asdf@asdfa.ru', 'ул. Очамчирская,1а', 0, 0),
(3, 'us1', '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(4, 'mdl', '9efd395356ee9d52f66fd6022510f246', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(5, 'test', '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(6, 'asdf', '2f2b2adb68e83de7433190e454536813', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(7, 'newuser', '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(8, 'us1243', '912ec803b2ce49e4a541068d495ab570', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(9, 'asdasf34', '2f2b2adb68e83de7433190e454536813', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `ms_userwishlist`
--

CREATE TABLE IF NOT EXISTS `ms_userwishlist` (
  `id` int(11) unsigned NOT NULL,
  `id_product` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ms_userwishlist`
--

INSERT INTO `ms_userwishlist` (`id`, `id_product`, `user_id`) VALUES
(1, 1, 5),
(2, 2, 5);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `ms_adminmenu`
--
ALTER TABLE `ms_adminmenu`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ms_categories`
--
ALTER TABLE `ms_categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ms_mainmenu`
--
ALTER TABLE `ms_mainmenu`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ms_products`
--
ALTER TABLE `ms_products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ms_profits`
--
ALTER TABLE `ms_profits`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ms_promo`
--
ALTER TABLE `ms_promo`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ms_properties_cat_names`
--
ALTER TABLE `ms_properties_cat_names`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ms_properties_cat_values`
--
ALTER TABLE `ms_properties_cat_values`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ms_sections`
--
ALTER TABLE `ms_sections`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ms_sef`
--
ALTER TABLE `ms_sef`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ms_sellermenu`
--
ALTER TABLE `ms_sellermenu`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ms_sellers`
--
ALTER TABLE `ms_sellers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ms_systemmenu`
--
ALTER TABLE `ms_systemmenu`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ms_topics`
--
ALTER TABLE `ms_topics`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ms_usermenu`
--
ALTER TABLE `ms_usermenu`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ms_userorders`
--
ALTER TABLE `ms_userorders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ms_users`
--
ALTER TABLE `ms_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- Индексы таблицы `ms_userwishlist`
--
ALTER TABLE `ms_userwishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `ms_adminmenu`
--
ALTER TABLE `ms_adminmenu`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `ms_categories`
--
ALTER TABLE `ms_categories`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT для таблицы `ms_mainmenu`
--
ALTER TABLE `ms_mainmenu`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `ms_products`
--
ALTER TABLE `ms_products`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT для таблицы `ms_profits`
--
ALTER TABLE `ms_profits`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `ms_promo`
--
ALTER TABLE `ms_promo`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `ms_properties_cat_names`
--
ALTER TABLE `ms_properties_cat_names`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `ms_properties_cat_values`
--
ALTER TABLE `ms_properties_cat_values`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `ms_sections`
--
ALTER TABLE `ms_sections`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT для таблицы `ms_sef`
--
ALTER TABLE `ms_sef`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `ms_sellermenu`
--
ALTER TABLE `ms_sellermenu`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `ms_sellers`
--
ALTER TABLE `ms_sellers`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `ms_systemmenu`
--
ALTER TABLE `ms_systemmenu`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `ms_topics`
--
ALTER TABLE `ms_topics`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `ms_usermenu`
--
ALTER TABLE `ms_usermenu`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `ms_userorders`
--
ALTER TABLE `ms_userorders`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `ms_users`
--
ALTER TABLE `ms_users`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `ms_userwishlist`
--
ALTER TABLE `ms_userwishlist`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
