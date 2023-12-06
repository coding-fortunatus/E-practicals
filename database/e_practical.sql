-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 16, 2023 at 11:16 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_practical`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `matric_number` varchar(20) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `email` varchar(256) NOT NULL,
  `session` varchar(15) NOT NULL,
  `program_type` varchar(10) NOT NULL,
  `class` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `fullname`, `matric_number`, `phone_number`, `email`, `session`, `program_type`, `class`) VALUES
(1, 'RIDWAN ADEMOLA', 'H/CS/21/0860', '23481234364765', 'Nil', '2021/2022', 'FT', 'HND2'),
(2, 'MUSTAPHA Aisha Abisola', 'H/CS/21/0861', '23481234364766', 'Nil', '2021/2022', 'FT', 'HND2'),
(3, 'ADEBISI EMMANUEL OLUWASEUN', 'H/CS/21/0862', '23481234364767', 'Nil', '2021/2022', 'FT', 'HND2'),
(4, 'Oladipo Temitope Goodness', 'H/CS/21/0863', '23481234364768', 'Nil', '2021/2022', 'FT', 'HND2'),
(5, 'HASSAN ABDUL-AZEEZ', 'H/CS/21/0864', '23481234364769', 'Nil', '2021/2022', 'FT', 'HND2'),
(6, 'MACLEAN MAYOWA OLUWATIMILEYIN', 'H/CS/21/0865', '23481234364770', 'Nil', '2021/2022', 'FT', 'HND2'),
(7, 'HAMZAT MUDASIR ', 'H/CS/21/0866', '23481234364771', 'Nil', '2021/2022', 'FT', 'HND2'),
(8, 'Marvellous Oguntola', 'H/CS/21/0867', '23481234364772', 'Nil', '2021/2022', 'FT', 'HND2'),
(9, 'MAKINDE OPEYEMI DAVID', 'H/CS/21/0868', '23481234364773', 'Nil', '2021/2022', 'FT', 'HND2'),
(10, 'OPARINDE JULIANAH OLUWASEYI ', 'H/CS/21/0869', '23481234364774', 'Nil', '2021/2022', 'FT', 'HND2'),
(11, 'Olusegun Oluwatomiwa Blessing', 'H/CS/21/0870', '23481234364775', 'Nil', '2021/2022', 'FT', 'HND2'),
(12, '', 'H/CS/21/0871', '23481234364776', 'Nil', '2021/2022', 'FT', 'HND2'),
(13, 'ADEDEJI SAMUEL ', 'H/CS/21/0872', '23481234364777', 'Nil', '2021/2022', 'FT', 'HND2'),
(14, 'ADENIYI EUNICE DEMILADE', 'H/CS/21/0873', '23481234364778', 'Nil', '2021/2022', 'FT', 'HND2'),
(15, 'OLUWATOBI ODEDE', 'H/CS/21/0874', '23481234364779', 'Nil', '2021/2022', 'FT', 'HND2'),
(16, 'FORTUNATUS ADEGOKE', 'H/CS/21/0875', '23481234364780', 'Nil', '2021/2022', 'FT', 'HND2'),
(17, 'Oluwagbohunmi Orekoya', 'H/CS/21/0876', '23481234364781', 'Nil', '2021/2022', 'FT', 'HND2'),
(18, 'IJEOMA EMMANUEL CHUKUNOSO ', 'H/CS/21/0877', '23481234364782', 'Nil', '2021/2022', 'FT', 'HND2'),
(19, 'ASABA SAMUEL', 'H/CS/21/0878', '23481234364783', 'Nil', '2021/2022', 'FT', 'HND2'),
(20, 'AZEEZAT BADMUS', 'H/CS/21/0879', '23481234364784', 'Nil', '2021/2022', 'FT', 'HND2'),
(21, 'ABEJIDE PLEASANT', 'H/CS/21/0880', '23481234364785', 'Nil', '2021/2022', 'FT', 'HND2'),
(22, 'OLOYEDE IDRIS KOLAWOLE ', 'H/CS/21/0881', '23481234364786', 'Nil', '2021/2022', 'FT', 'HND2'),
(23, 'ISA OLAMILEKAN ', 'H/CS/21/0882', '23481234364787', 'Nil', '2021/2022', 'FT', 'HND2'),
(24, 'OPEYEMI ARETOLA', 'H/CS/21/0883', '23481234364788', 'Nil', '2021/2022', 'FT', 'HND2'),
(25, 'ABDULMUJEEB OSENI', 'H/CS/21/0884', '23481234364789', 'Nil', '2021/2022', 'FT', 'HND2'),
(26, 'UWEH ABUH', 'H/CS/21/0885', '23481234364790', 'Nil', '2021/2022', 'FT', 'HND2'),
(27, 'OGUNBAYO KEHINDE ORIYOMI', 'H/CS/21/0886', '23481234364791', 'Nil', '2021/2022', 'FT', 'HND2'),
(28, 'ADEMOLA AYENI', 'H/CS/21/0887', '23481234364792', 'Nil', '2021/2022', 'FT', 'HND2'),
(29, 'IFEANYI EZENWANI ', 'H/CS/21/0888', '23481234364793', 'Nil', '2021/2022', 'FT', 'HND2'),
(30, 'AKINYEMI Olamilekan Ayodele', 'H/CS/21/0889', '23481234364794', 'Nil', '2021/2022', 'FT', 'HND2'),
(31, 'AKINWOLE TOLULOPE ', 'H/CS/21/0890', '23481234364795', 'Nil', '2021/2022', 'FT', 'HND2'),
(32, 'SODIYA OLUWATOYIN ', 'H/CS/21/0891', '23481234364796', 'Nil', '2021/2022', 'FT', 'HND2'),
(33, 'ADEBANJO ESTHER ', 'H/CS/21/0892', '23481234364797', 'Nil', '2021/2022', 'FT', 'HND2'),
(34, 'SALAMI MUTIU', 'H/CS/21/0893', '23481234364798', 'Nil', '2021/2022', 'FT', 'HND2'),
(35, 'RAIMOT  ABIDEMI ADEBOWALE', 'H/CS/21/0894', '23481234364799', 'Nil', '2021/2022', 'FT', 'HND2'),
(36, 'OLAMILEKAN SOYELE', 'H/CS/21/0895', '23481234364800', 'Nil', '2021/2022', 'FT', 'HND2'),
(37, 'Omoshilade Oluwafemi ', 'H/CS/21/0896', '23481234364801', 'Nil', '2021/2022', 'FT', 'HND2'),
(38, 'SOKUNTADE OLUWATOBI MICHEAL', 'H/CS/21/0897', '23481234364802', 'Nil', '2021/2022', 'FT', 'HND2'),
(39, 'Bamigboye Adeolu Ademola ', 'H/CS/21/0898', '23481234364803', 'Nil', '2021/2022', 'FT', 'HND2'),
(40, 'ADEMOLA OKUNOLA', 'H/CS/21/0899', '23481234364804', 'Nil', '2021/2022', 'FT', 'HND2'),
(41, 'ODUROYE OLUWADAMILOLA ODUNAYO', 'H/CS/21/0900', '23481234364805', 'Nil', '2021/2022', 'FT', 'HND2'),
(42, 'AGUNBIADE TEMITOPE OLUWASEUN', 'H/CS/21/0901', '23481234364806', 'Nil', '2021/2022', 'FT', 'HND2'),
(43, 'ADESANYA ESTHER ITUNUOLUWA', 'H/CS/21/0902', '23481234364807', 'Nil', '2021/2022', 'FT', 'HND2'),
(44, 'AGBOOLA RUTH TEMITOPE', 'H/CS/21/0903', '23481234364808', 'Nil', '2021/2022', 'FT', 'HND2'),
(45, 'ADEYEMO SOFIAT DASOLA', 'H/CS/21/0904', '23481234364809', 'Nil', '2021/2022', 'FT', 'HND2'),
(46, 'OLAWOYIN ADEOLA', 'H/CS/21/0905', '23481234364810', 'Nil', '2021/2022', 'FT', 'HND2'),
(47, 'Salaudeen Fatai  olamilekan', 'H/CS/21/0906', '23481234364811', 'Nil', '2021/2022', 'FT', 'HND2'),
(48, 'SIYANBADE WALIU OLAWALE', 'H/CS/21/0907', '23481234364812', 'Nil', '2021/2022', 'FT', 'HND2'),
(49, 'OKPALA NKECHI JESSICA', 'H/CS/21/0908', '23481234364813', 'Nil', '2021/2022', 'FT', 'HND2'),
(50, 'ABIOLA OPEYEMI ', 'H/CS/21/0909', '23481234364814', 'Nil', '2021/2022', 'FT', 'HND2'),
(51, 'OLORUNSOLA YEMISI DORCAS ', 'H/CS/21/0910', '23481234364815', 'Nil', '2021/2022', 'FT', 'HND2'),
(52, 'STELLA BASSEY', 'H/CS/21/0911', '23481234364816', 'Nil', '2021/2022', 'FT', 'HND2'),
(53, 'ADELEKE SAMUEL OLUWAGBEMILEKE ', 'H/CS/21/0912', '23481234364817', 'Nil', '2021/2022', 'FT', 'HND2'),
(54, 'SULAIMAN MICHEAL OLOWOSALE', 'H/CS/21/0913', '23481234364818', 'Nil', '2021/2022', 'FT', 'HND2'),
(55, 'KOSOKO TOHEEB OLADIMEJI', 'H/CS/21/0914', '23481234364819', 'Nil', '2021/2022', 'FT', 'HND2'),
(56, 'ODEYEMI OLUWADAMILARE  BABATUNDE ', 'H/CS/21/0915', '23481234364820', 'Nil', '2021/2022', 'FT', 'HND2'),
(57, 'OGUNJIMI MARVELLOUS', 'H/CS/21/0916', '23481234364821', 'Nil', '2021/2022', 'FT', 'HND2'),
(58, 'RASHEED RAMON', 'H/CS/21/0917', '23481234364822', 'Nil', '2021/2022', 'FT', 'HND2'),
(59, 'SALAKO BABATUNDE BOLUWATIFE ', 'H/CS/21/0918', '23481234364823', 'Nil', '2021/2022', 'FT', 'HND2'),
(60, 'SAMUEL ODUWOLE', 'H/CS/21/0919', '23481234364855', 'Nil', '2021/2022', 'FT', 'HND2'),
(61, 'AFOLABI HABEEB. A', 'H/CS/21/0921', '23481234364825', 'Nil', '2021/2022', 'FT', 'HND2'),
(62, 'OYEWOLE ODUNAYO OYINDAMOLA ', 'H/CS/21/0922', '23481234364826', 'Nil', '2021/2022', 'FT', 'HND2'),
(63, 'ELIZABETH KUYEBI', 'H/CS/21/0923', '23481234364827', 'Nil', '2021/2022', 'FT', 'HND2'),
(64, 'SHUAIB SEKINAT OMEYIMI', 'H/CS/21/0924', '23481234364828', 'Nil', '2021/2022', 'FT', 'HND2'),
(65, 'OYEKOLA BUKOLA VICTORIA ', 'H/CS/21/0925', '23481234364829', 'Nil', '2021/2022', 'FT', 'HND2'),
(66, 'GEORGE ESTHER IYANUOLUWA ', 'H/CS/21/0926', '23481234364830', 'Nil', '2021/2022', 'FT', 'HND2'),
(67, 'ADESANYA OMOLARA NOIMOT', 'H/CS/21/0927', '23481234364831', 'Nil', '2021/2022', 'FT', 'HND2'),
(68, 'Bashiru Ganiyat  Abeke', 'H/CS/21/0928', '23481234364832', 'Nil', '2021/2022', 'FT', 'HND2'),
(69, 'FATUNBI LAWRENCE O.', 'H/CS/21/0929', '23481234364833', 'Nil', '2021/2022', 'FT', 'HND2'),
(70, 'ADENLE ANIYAT AYINKE', 'H/CS/21/0930', '23481234364834', 'Nil', '2021/2022', 'FT', 'HND2'),
(71, 'QUADRI OLAMILEKAN T.', 'H/CS/21/0931', '23481234364835', 'Nil', '2021/2022', 'FT', 'HND2'),
(72, 'AJILOGBA ANUOLUWAPO D.', 'H/CS/21/0932', '23481234364836', 'Nil', '2021/2022', 'FT', 'HND2'),
(73, 'CHIKA NNANNA', 'H/CS/21/0933', '23481234364837', 'Nil', '2021/2022', 'FT', 'HND2'),
(74, 'Mubaraq Ilesanmi ', 'H/CS/21/0934', '23481234364838', 'Nil', '2021/2022', 'FT', 'HND2'),
(75, 'OLADELE ITUNU ABIGAEL ', 'H/CS/21/0935', '23481234364839', 'Nil', '2021/2022', 'FT', 'HND2'),
(76, 'ISLAMIYAT MAYOWA ABDULRAHMAN', 'H/CS/21/0936', '23481234364840', 'Nil', '2021/2022', 'FT', 'HND2'),
(77, 'OGUNLESI CHRISTIANAH OMOLOLA', 'H/CS/21/0937', '23481234364841', 'Nil', '2021/2022', 'FT', 'HND2'),
(78, 'SAMUEL OLUWAFEMI', 'H/CS/21/0938', '23481234364842', 'Nil', '2021/2022', 'FT', 'HND2'),
(79, 'OLAJUWON OLAMILEKAN YUSHAU', 'H/CS/21/0939', '23481234364843', 'Nil', '2021/2022', 'FT', 'HND2'),
(80, 'Samuel Eriwayo', 'H/CS/21/0940', '23481234364844', 'Nil', '2021/2022', 'FT', 'HND2'),
(81, 'PELUMI ADEBIYI', 'H/CS/21/0941', '23481234364845', 'Nil', '2021/2022', 'FT', 'HND2'),
(82, 'MARY OLAWORE ', 'H/CS/21/0942', '23481234364846', 'Nil', '2021/2022', 'FT', 'HND2'),
(83, 'Sonola Oluwademilade ', 'H/CS/21/0943', '23481234364847', 'Nil', '2021/2022', 'FT', 'HND2'),
(84, 'Azeez Habeeb', 'H/CS/21/0944', '23481234364848', 'Nil', '2021/2022', 'FT', 'HND2'),
(85, 'MOSUNMOLA SOWUNMI ', 'H/CS/21/0945', '23481234364849', 'Nil', '2021/2022', 'FT', 'HND2'),
(86, 'IBUKUNOLUWA SMITH', 'H/CS/21/0946', '23481234364850', 'Nil', '2021/2022', 'FT', 'HND2'),
(87, 'Bello Muhammedulawwal Opeyemi', 'H/CS/21/0947', '23481234364851', 'Nil', '2021/2022', 'FT', 'HND2'),
(88, 'ESTHER HUNGE ', 'H/CS/21/0948', '23481234364852', 'Nil', '2021/2022', 'FT', 'HND2'),
(89, 'BALOGUN QASIM', 'H/CS/21/0949', '23481234364853', 'Nil', '2021/2022', 'FT', 'HND2'),
(90, 'ADENEKAN SEUN', 'H/CS/21/0950', '23481234364854', 'Nil', '2021/2022', 'FT', 'HND2'),
(91, 'OLUWATOSIN ADENIKE ADEGBOLA', 'H/CS/21/0920', '23481234364856', 'Nil', '2021/2022', 'FT', 'HND2'),
(92, 'Deborah Popoola', 'H/CS/20/0809', '23481234364857', 'Nil', '2021/2022', 'FT', 'HND2'),
(93, 'IJACHI EMMANUEL', 'N/CS/21/2969', '', 'tobiijachi@gmail.com', '2021/2022', 'FT', 'ND2'),
(94, 'AKINDE SAMUEL', 'N/CS/21/2970', '', '123samuelakinde@gmail.com', '2021/2022', 'FT', 'ND2'),
(95, 'ALUKU FAVOUR', 'N/CS/21/2971', '', 'alukufavouraniel@gmail.com', '2021/2022', 'FT', 'ND2'),
(96, 'OPALEYE TEMINIOLUWA', 'N/CS/21/2972', '', 'teminioluwaopaleye@gmail.com', '2021/2022', 'FT', 'ND2'),
(97, 'ADEKOYA SARAH', 'N/CS/21/2973', '', 'sarahadekoya083@gmail.com', '2021/2022', 'FT', 'ND2'),
(98, 'ABDULWAHAB MALIK', 'N/CS/21/2974', '', 'abdulwahabmalikfowu@gmail.com', '2021/2022', 'FT', 'ND2'),
(99, 'BIOBAKU TESLIM', 'N/CS/21/2975', '', '', '2021/2022', 'FT', 'ND2'),
(100, 'ADEJOBI TEMITOPE', 'N/CS/21/2976', '', 'adejobitemiboy@gmail.com', '2021/2022', 'FT', 'ND2'),
(101, 'AKINDE IBRAHIM', 'N/CS/21/2977', '', 'akindeibrahim319@gmail.com', '2021/2022', 'FT', 'ND2'),
(102, 'JIDONU BOLUWATIFE', 'N/CS/21/2978', '', 'jidosboluwatife2002@gmail.com', '2021/2022', 'FT', 'ND2'),
(103, 'OLAGUNJU SAMUEL', 'N/CS/21/2979', '', 'olagunjusamuel47@gmail.com', '2021/2022', 'FT', 'ND2'),
(104, 'ANIMASHAUN ABDULBAI', 'N/CS/21/2980', '', 'animashaunabdulba@gmail.com', '2021/2022', 'FT', 'ND2'),
(105, 'ALAYANDE ABDULBASIT', 'N/CS/21/2981', '', 'alayandeabdulbasit@gmail.com', '2021/2022', 'FT', 'ND2'),
(106, 'RICHARD BUSOLAMI', 'N/CS/21/2982', '', 'tofunmirichard@gmail.com', '2021/2022', 'FT', 'ND2'),
(107, 'AKINLOYE AYOMIDE', 'N/CS/21/2983', '', 'clintonayomide838@gmail.com', '2021/2022', 'FT', 'ND2'),
(108, 'LADEGA DANIEL', 'N/CS/21/2984', '', 'danielladega01@gmail.com', '2021/2022', 'FT', 'ND2'),
(109, 'ABDULAZEEZ KHADIJAH', 'N/CS/21/2985', '', '', '2021/2022', 'FT', 'ND2'),
(110, 'OHIREIMEN CONFIDENCE', 'N/CS/21/2986', '', 'confidenceohireimen75@gmail.com', '2021/2022', 'FT', 'ND2'),
(111, 'OSOKO EXCEL', 'N/CS/21/2987', '', '', '2021/2022', 'FT', 'ND2'),
(112, 'ADELEKE AYOMIDE', 'N/CS/21/2988', '', 'ayomideadeleke989@gmail.com', '2021/2022', 'FT', 'ND2'),
(113, 'BADEJO OYEBANJI', 'N/CS/21/2989', '', 'oyebanjir5@gmail.com', '2021/2022', 'FT', 'ND2'),
(114, 'OYENEKAN ISRAEL', 'N/CS/21/2990', '', 'oyenekanisreal2021@gmail.com', '2021/2022', 'FT', 'ND2'),
(115, 'AMAHALU UGOCHUKWU', 'N/CS/21/2991', '', 'ugochukwuamahalu@gmail.com', '2021/2022', 'FT', 'ND2'),
(116, 'ADEYEMI EMMANUEL', 'N/CS/21/2992', '', 'adeyemie125@gmail.com', '2021/2022', 'FT', 'ND2'),
(117, 'ISMAILA AZEEZ', 'N/CS/21/2993', '', 'azeezabiodun012@gmail.com', '2021/2022', 'FT', 'ND2'),
(118, 'ONYEACHONAM MERVYN', 'N/CS/21/2994', '', 'adedayodesmomd@gmail.com', '2021/2022', 'FT', 'ND2'),
(119, 'BAKARA MARYAM', 'N/CS/21/2995', '', 'bakaramaryam@gmail.com', '2021/2022', 'FT', 'ND2'),
(120, 'OLALEYE VICTORIA', 'N/CS/21/2996', '', 'victoriaolaleye8@gmail.com', '2021/2022', 'FT', 'ND2'),
(121, 'ADEBAYO MICHAEL', 'N/CS/21/2997', '', 'adebayomichael2203@gmail.com', '2021/2022', 'FT', 'ND2'),
(122, 'ADERIBIGBE OLUWAPELUMI', 'N/CS/21/2998', '', 'Aderibigbefeyisetan2005@gmail.com', '2021/2022', 'FT', 'ND2'),
(123, 'OLAWALE AYOMIDE', 'N/CS/21/2999', '', 'olawaleayomide970@gmail.com', '2021/2022', 'FT', 'ND2'),
(124, 'ADELEKE MOHAMMED', 'N/CS/21/3000', '', 'adelekemohammed356@gmail.com', '2021/2022', 'FT', 'ND2'),
(125, 'JEGEDE SIMEON', 'N/CS/21/3001', '', 'Adejuwonsimeon73@gmail.com', '2021/2022', 'FT', 'ND2'),
(126, 'OLADEJO DOMINION', 'N/CS/21/3002', '', 'dominionoladejo1@gmail.com', '2021/2022', 'FT', 'ND2'),
(127, 'OGUNBIYI RICHARD', 'N/CS/21/3003', '', '', '2021/2022', 'FT', 'ND2'),
(128, 'OGUNDELE FAVOUR', 'N/CS/21/3004', '', '', '2021/2022', 'FT', 'ND2'),
(129, 'OMOGOR EMMANUEL', 'N/CS/21/3005', '', 'omogoremmanuel24@gmail.com', '2021/2022', 'FT', 'ND2'),
(130, 'DIBANI VICTORY', 'N/CS/21/3006', '', 'dibaniprince4@gmail.com', '2021/2022', 'FT', 'ND2'),
(131, 'ADARAMOLA SAMUEL', 'N/CS/21/3007', '', 'samueladaramola31@gmail.com', '2021/2022', 'FT', 'ND2'),
(132, 'RASHEED SAUDAH', 'N/CS/21/3008', '', 'saudahanuoluwapo@gmail.com', '2021/2022', 'FT', 'ND2'),
(133, 'KUFORIJI SAMUEL', 'N/CS/21/3009', '', 'Kuforijisamuel1@gmail.com', '2021/2022', 'FT', 'ND2'),
(134, 'FATOKI UDUS', 'N/CS/21/3010', '', 'olamilekan1811@gmail.com', '2021/2022', 'FT', 'ND2'),
(135, 'OLAYINKA SAMUEL', 'N/CS/21/3011', '', '', '2021/2022', 'FT', 'ND2'),
(136, 'AJALA ABDULBASIT', 'N/CS/21/3012', '', 'ajala.ba2014@gmail.com', '2021/2022', 'FT', 'ND2'),
(137, 'OBAYEJU OMOLOLA', 'N/CS/21/3013', '', 'lhorlarwhaysapphire@gmail.com', '2021/2022', 'FT', 'ND2'),
(138, 'ADEYEMI MUBARAK', 'N/CS/21/3014', '', 'adeyemiadigun12@gmail.com', '2021/2022', 'FT', 'ND2'),
(139, 'OGUNTOLA OLUWADAMILOLA', 'N/CS/21/3015', '', 'damisco005@gmail.com', '2021/2022', 'FT', 'ND2'),
(140, 'ADEDAYO EMMANUEL', 'N/CS/21/3016', '', 'adedayoemmy2004@gmail.com', '2021/2022', 'FT', 'ND2'),
(141, 'ABDULAREEM ABIMBOLA', 'N/CS/21/3017', '', '', '2021/2022', 'FT', 'ND2'),
(142, 'ISHOLA OLUWATOFUNMI', 'N/CS/21/3018', '', 'isholaoluwatofunmi97@gmail.com', '2021/2022', 'FT', 'ND2'),
(143, 'OLUMIDE PAUL', 'N/CS/21/3019', '', 'olumidepaul864@gmail.com', '2021/2022', 'FT', 'ND2'),
(144, 'AYENI MOYINOLUWA', 'N/CS/21/3020', '', 'ayenimoyinoluwa2005@gmail.com', '2021/2022', 'FT', 'ND2'),
(145, 'KINGSTON ANWARSADAT', 'N/CS/21/3021', '', '', '2021/2022', 'FT', 'ND2'),
(146, 'SOGUNLE BANJI', 'N/CS/21/3022', '', '', '2021/2022', 'FT', 'ND2'),
(147, 'OLAYINKA OLATOYE', 'N/CS/21/3023', '', 'olayinkaq2@gmail.com', '2021/2022', 'FT', 'ND2'),
(148, 'ADENLE OLUWATOSIN', 'N/CS/21/3024', '', '', '2021/2022', 'FT', 'ND2'),
(149, 'OGUNMILUYI BOLUWATIFE', 'N/CS/21/3025', '', 'ogunmiluyiboluwatife@gmail.com', '2021/2022', 'FT', 'ND2'),
(150, 'SAMUEL CALEB', 'N/CS/21/3026', '', '', '2021/2022', 'FT', 'ND2'),
(151, 'AKANDE BOLUWATIFE', 'N/CS/21/3027', '', '', '2021/2022', 'FT', 'ND2'),
(152, 'SALAUDEEN RIDWAN', 'N/CS/21/3028', '', 'horlahmii4250@gmail.com', '2021/2022', 'FT', 'ND2'),
(153, 'FOLASHELE OLANREWAJU', 'N/CS/21/3029', '', 'larryfola@gmail.com', '2021/2022', 'FT', 'ND2'),
(154, 'ALATISE RACHAEL', 'N/CS/21/3030', '', 'rachaeltemitopealatise@gmail.com', '2021/2022', 'FT', 'ND2'),
(155, 'ADEBOWALE SAMUEL', 'N/CS/21/3031', '', '', '2021/2022', 'FT', 'ND2'),
(156, 'OSANYIBI TAOFEE', 'N/CS/21/3032', '', '', '2021/2022', 'FT', 'ND2'),
(157, 'LAMEED AZEEZAT', 'N/CS/21/3033', '', 'Lameedazeezat01@gmail.com', '2021/2022', 'FT', 'ND2'),
(158, 'POPOOLA EMMANUEL', 'N/CS/21/3034', '', 'Popoolae90@gmail.com', '2021/2022', 'FT', 'ND2'),
(159, 'KUDORO TITILAYO', 'N/CS/21/3035', '', '', '2021/2022', 'FT', 'ND2'),
(160, 'AYANDELE AYOMIDE', 'N/CS/21/3036', '', 'ayandeleayomide1@gmail.com', '2021/2022', 'FT', 'ND2'),
(161, 'ADEKOYA DAVID', 'N/CS/21/3037', '', 'adekoyadavidadeboye@gmail.com', '2021/2022', 'FT', 'ND2'),
(162, 'KUKOYI ANTHONY', 'N/CS/21/3038', '', 'anthonydamilola24@gmail.com', '2021/2022', 'FT', 'ND2'),
(163, 'AKINOLA SAMUEL', 'N/CS/21/3039', '', 'akinolasam904@gmail.com', '2021/2022', 'FT', 'ND2'),
(164, 'ADESHINA JOHN', 'N/CS/21/3040', '', 'tblizz2004@gmail.com', '2021/2022', 'FT', 'ND2'),
(165, 'ALIU MARY', 'N/CS/21/3041', '', 'aliumary49@gmail.com', '2021/2022', 'FT', 'ND2'),
(166, 'EGBETOKUN', 'N/CS/21/3042', '', '', '2021/2022', 'FT', 'ND2'),
(167, 'KIMEKU DAVID', 'N/CS/21/3043', '', 'Isiomadavid239@gmail.com', '2021/2022', 'FT', 'ND2'),
(168, 'BAMIDELE OPEYEMI', 'N/CS/21/3044', '', 'bamideleopeyemi2003@gmailcom', '2021/2022', 'FT', 'ND2'),
(169, 'AGBOOLA IBRAHIM', 'N/CS/21/3045', '', '', '2021/2022', 'FT', 'ND2'),
(170, 'OGNDARE JAMIU', 'N/CS/21/3046', '', 'ogundaredamilare52@gmail.com', '2021/2022', 'FT', 'ND2'),
(171, 'OFINNI JOSHUA', 'N/CS/21/3047', '', 'ofinnijoshua2021@gmail.com', '2021/2022', 'FT', 'ND2'),
(172, '', 'N/CS/21/3048', '', '', '2021/2022', 'FT', 'ND2'),
(173, 'JIMOR UMAR', 'N/CS/21/3049', '', 'jimohumar283@gmail.com', '2021/2022', 'FT', 'ND2'),
(174, 'OLASUNKANMI AYOBAMI', 'N/CS/21/3050', '', '', '2021/2022', 'FT', 'ND2');

-- --------------------------------------------------------

--
-- Table structure for table `course_practicals`
--

CREATE TABLE `course_practicals` (
  `id` int(11) NOT NULL,
  `lecturer_id` int(11) NOT NULL,
  `course_code` varchar(10) NOT NULL,
  `class` varchar(50) NOT NULL,
  `practical_number` int(10) NOT NULL,
  `practical_manual` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lecturers`
--

CREATE TABLE `lecturers` (
  `id` int(11) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `lecturer_code` varchar(10) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `email` varchar(256) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lecturers`
--

INSERT INTO `lecturers` (`id`, `fullname`, `lecturer_code`, `phone_number`, `email`, `gender`, `status`) VALUES
(1, 'MR OLORUNTOBA S.A', 'CS001', '', '', 'Male', 'Chief Lecturer'),
(2, 'DR.(MRS) SOYEMI, J.', 'CS002', '', '', 'Female', 'Chief Lecturer'),
(3, 'DR. (MRS) ODUNTAN, O.E', 'CS003', '', '', 'Female', 'Chief Lecturer'),
(4, 'MR ALAWODE, A.J.', 'CS004', '', '', 'Male', 'Senior Lecturer'),
(5, 'MR. OJUAWO, O.O.', 'CS005', '', '', 'Male', 'Lecturer 1'),
(6, 'MR AKINODE, J.L.', 'CS006', '', '', 'Male', 'Lecturer 1'),
(7, 'MR HAMMED, M.', 'CS007', '', '', 'Male', 'Lecturer 2'),
(8, 'MR. BUOYE, P.A.', 'CS008', '', '', 'Male', 'Lecturer 2'),
(9, 'MR. ADEGBOYE, O.J.', 'CS009', '', '', 'Male', 'Lecturer 2'),
(10, 'MR. OGUNSEYE, J.O.', 'CS010', '', '', 'Male', 'Lecturer 3'),
(11, 'MISS ADEBOWALE, O.A.', 'CS011', '', '', 'Female', 'lecturer 3'),
(12, 'MR. AYODELE, EMMANUEL', 'CS012', '', '', 'Male', 'Assistant Lecturer'),
(13, 'MR. JIBOKU, FOLAHAN J.', 'CS013', '', '', 'Male', 'Assistant Lecturer'),
(14, 'MR. SODEINDE, VICTOR O.', 'CS014', '', '', 'Male', 'Assistant Lecturer'),
(15, 'MR. AROWOLO, P.', 'CS015', '', '', 'Male', 'Senior Instructor'),
(16, 'MRS BELLO, Z.O', 'CS016', '', '', 'Female', 'Technologist 2'),
(17, 'MR. ADIO ABIODUN', 'CS017', '', '', 'Male', ''),
(18, 'MRS AKINBOLA', 'CS018', '', '', 'Female', ''),
(19, 'MR AWOSANYA', 'CS019', '', '', 'Male', ''),
(20, 'MRS GANIYU SUKURAT', 'CS020', '', '', 'Female', ''),
(21, 'MRS ADEYEMI A.B', 'CS021', '', '', 'Female', ''),
(22, 'MISS ADEBOWALE O.A', 'CS022', '', '', 'Female', ''),
(23, 'AROWOLO AHMED', 'CS023', '', '', 'Male', '');

-- --------------------------------------------------------

--
-- Table structure for table `practical_reports`
--

CREATE TABLE `practical_reports` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `exercise_number` int(11) NOT NULL,
  `practical_title` text NOT NULL,
  `aim_objectives` text NOT NULL,
  `procedures` text NOT NULL,
  `experience_gain` text NOT NULL,
  `problem_encountered` text NOT NULL,
  `date_time` varchar(200) NOT NULL,
  `attachment` varchar(300) NOT NULL,
  `lecturer_remark` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(256) NOT NULL,
  `user_role` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `user_role`) VALUES
(1, 'Admin', '$2y$10$nGarcbOZmWbgLcA/AfTxuOfi5Mvf0pUuOZ73nEp82RxzdaBPQLT62', 'Admin'),
(3, 'H/CS/21/0861', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(4, 'H/CS/21/0862', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(5, 'H/CS/21/0863', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(6, 'H/CS/21/0864', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(7, 'H/CS/21/0865', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(8, 'H/CS/21/0866', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(9, 'H/CS/21/0867', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(10, 'H/CS/21/0868', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(11, 'H/CS/21/0869', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(12, 'H/CS/21/0870', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(13, 'H/CS/21/0871', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(14, 'H/CS/21/0872', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(15, 'H/CS/21/0873', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(16, 'H/CS/21/0874', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(17, 'H/CS/21/0875', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(18, 'H/CS/21/0876', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(19, 'H/CS/21/0877', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(20, 'H/CS/21/0878', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(21, 'H/CS/21/0879', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(22, 'H/CS/21/0880', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(23, 'H/CS/21/0881', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(24, 'H/CS/21/0882', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(25, 'H/CS/21/0883', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(26, 'H/CS/21/0884', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(27, 'H/CS/21/0885', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(28, 'H/CS/21/0886', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(29, 'H/CS/21/0887', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(30, 'H/CS/21/0888', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(31, 'H/CS/21/0889', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(32, 'H/CS/21/0890', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(33, 'H/CS/21/0891', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(34, 'H/CS/21/0892', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(35, 'H/CS/21/0893', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(36, 'H/CS/21/0894', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(37, 'H/CS/21/0895', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(38, 'H/CS/21/0896', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(39, 'H/CS/21/0897', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(40, 'H/CS/21/0898', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(41, 'H/CS/21/0899', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(42, 'H/CS/21/0900', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(43, 'H/CS/21/0901', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(44, 'H/CS/21/0902', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(45, 'H/CS/21/0903', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(46, 'H/CS/21/0904', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(47, 'H/CS/21/0905', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(48, 'H/CS/21/0906', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(49, 'H/CS/21/0907', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(50, 'H/CS/21/0908', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(51, 'H/CS/21/0909', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(52, 'H/CS/21/0910', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(53, 'H/CS/21/0911', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(54, 'H/CS/21/0912', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(55, 'H/CS/21/0913', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(56, 'H/CS/21/0914', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(57, 'H/CS/21/0915', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(58, 'H/CS/21/0916', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(59, 'H/CS/21/0917', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(60, 'H/CS/21/0918', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(61, 'H/CS/21/0919', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(62, 'H/CS/21/0921', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(63, 'H/CS/21/0922', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(64, 'H/CS/21/0923', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(65, 'H/CS/21/0924', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(66, 'H/CS/21/0925', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(67, 'H/CS/21/0926', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(68, 'H/CS/21/0927', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(69, 'H/CS/21/0928', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(70, 'H/CS/21/0929', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(71, 'H/CS/21/0930', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(72, 'H/CS/21/0931', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(73, 'H/CS/21/0932', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(74, 'H/CS/21/0933', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(75, 'H/CS/21/0934', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(76, 'H/CS/21/0935', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(77, 'H/CS/21/0936', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(78, 'H/CS/21/0937', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(79, 'H/CS/21/0938', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(80, 'H/CS/21/0939', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(81, 'H/CS/21/0940', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(82, 'H/CS/21/0941', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(83, 'H/CS/21/0942', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(84, 'H/CS/21/0943', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(85, 'H/CS/21/0944', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(86, 'H/CS/21/0945', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(87, 'H/CS/21/0946', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(88, 'H/CS/21/0947', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(89, 'H/CS/21/0948', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(90, 'H/CS/21/0949', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(91, 'H/CS/21/0950', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(92, 'H/CS/21/0920', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(93, 'H/CS/20/0809', '$2y$10$gz.iFltqcJPWCyZiHO0xDezpFUUNy7vw0gt46mAVTnn5yTE9xEUSK', NULL),
(94, 'N/CS/21/2969', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(95, 'N/CS/21/2970', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(96, 'N/CS/21/2971', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(97, 'N/CS/21/2972', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(98, 'N/CS/21/2973', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(99, 'N/CS/21/2974', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(100, 'N/CS/21/2975', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(101, 'N/CS/21/2976', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(102, 'N/CS/21/2977', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(103, 'N/CS/21/2978', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(104, 'N/CS/21/2979', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(105, 'N/CS/21/2980', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(106, 'N/CS/21/2981', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(107, 'N/CS/21/2982', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(108, 'N/CS/21/2983', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(109, 'N/CS/21/2984', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(110, 'N/CS/21/2985', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(111, 'N/CS/21/2986', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(112, 'N/CS/21/2987', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(113, 'N/CS/21/2988', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(114, 'N/CS/21/2989', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(115, 'N/CS/21/2990', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(116, 'N/CS/21/2991', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(117, 'N/CS/21/2992', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(118, 'N/CS/21/2993', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(119, 'N/CS/21/2994', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(120, 'N/CS/21/2995', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(121, 'N/CS/21/2996', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(122, 'N/CS/21/2997', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(123, 'N/CS/21/2998', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(124, 'N/CS/21/2999', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(125, 'N/CS/21/3000', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(126, 'N/CS/21/3001', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(127, 'N/CS/21/3002', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(128, 'N/CS/21/3003', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(129, 'N/CS/21/3004', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(130, 'N/CS/21/3005', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(131, 'N/CS/21/3006', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(132, 'N/CS/21/3007', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(133, 'N/CS/21/3008', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(134, 'N/CS/21/3009', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(135, 'N/CS/21/3010', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(136, 'N/CS/21/3011', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(137, 'N/CS/21/3012', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(138, 'N/CS/21/3013', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(139, 'N/CS/21/3014', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(140, 'N/CS/21/3015', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(141, 'N/CS/21/3016', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(142, 'N/CS/21/3017', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(143, 'N/CS/21/3018', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(144, 'N/CS/21/3019', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(145, 'N/CS/21/3020', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(146, 'N/CS/21/3021', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(147, 'N/CS/21/3022', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(148, 'N/CS/21/3023', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(149, 'N/CS/21/3024', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(150, 'N/CS/21/3025', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(151, 'N/CS/21/3026', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(152, 'N/CS/21/3027', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(153, 'N/CS/21/3028', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(154, 'N/CS/21/3029', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(155, 'N/CS/21/3030', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(156, 'N/CS/21/3031', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(157, 'N/CS/21/3032', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(158, 'N/CS/21/3033', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(159, 'N/CS/21/3034', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(160, 'N/CS/21/3035', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(161, 'N/CS/21/3036', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(162, 'N/CS/21/3037', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(163, 'N/CS/21/3038', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(164, 'N/CS/21/3039', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(165, 'N/CS/21/3040', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(166, 'N/CS/21/3041', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(167, 'N/CS/21/3042', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(168, 'N/CS/21/3043', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(169, 'N/CS/21/3044', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(170, 'N/CS/21/3045', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(171, 'N/CS/21/3046', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(172, 'N/CS/21/3047', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(173, 'N/CS/21/3048', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(174, 'N/CS/21/3049', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(175, 'N/CS/21/3050', '$2y$10$VGxNaqpX9MRyEo.wY5JxfOan45GiG5rbQRwfqv0RxudQIPGEyp0Zi', NULL),
(176, 'Adegboye', '$2y$10$ta1Y8cS5eFMIul3SZFKWgOQSNlYXA9t9odVoP0.fQeaLAYYG7k4d2', 'Lecturer'),
(177, 'Oduntan', '$2y$10$ta1Y8cS5eFMIul3SZFKWgOQSNlYXA9t9odVoP0.fQeaLAYYG7k4d2', 'Lecturer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `matric_number` (`matric_number`);

--
-- Indexes for table `course_practicals`
--
ALTER TABLE `course_practicals`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `course_code` (`course_code`),
  ADD KEY `lecturer_id` (`lecturer_id`);

--
-- Indexes for table `lecturers`
--
ALTER TABLE `lecturers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `lecturer_code` (`lecturer_code`);

--
-- Indexes for table `practical_reports`
--
ALTER TABLE `practical_reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT for table `course_practicals`
--
ALTER TABLE `course_practicals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lecturers`
--
ALTER TABLE `lecturers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `practical_reports`
--
ALTER TABLE `practical_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course_practicals`
--
ALTER TABLE `course_practicals`
  ADD CONSTRAINT `course_practicals_ibfk_1` FOREIGN KEY (`lecturer_id`) REFERENCES `lecturers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `practical_reports`
--
ALTER TABLE `practical_reports`
  ADD CONSTRAINT `practical_reports_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `practical_reports_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `course_practicals` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
