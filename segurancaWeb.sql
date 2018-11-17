-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 17, 2018 at 12:24 PM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `segurancaWeb`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `idActivity` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `desc` varchar(500) NOT NULL,
  `idAdmin` int(11) NOT NULL,
  `location` varchar(75) NOT NULL,
  `idImage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`idActivity`, `name`, `desc`, `idAdmin`, `location`, `idImage`) VALUES
(4, 'Passeios a Cavalo', 'Para quem gosta de praticar atividades equestres, os Açores são o local ideal, pois é muito fácil encontrar cavalos Lusitano e Cruzado Português bem treinados.\r\n\r\nAlém disso, as ilhas açorianas oferecem uma diversidade de cenários deslumbrantes sobre o Oceano Atlântico, embelezadas pelos jardins alegres e vibrantes, bem como pelos pastos verdes.\r\n\r\nA trote, os cavaleiros poderão desfrutar da serenidade dos caminhos, com alguma aventura à mistura, rendendo-se, por fim, às bonitas paisagens.', 3, 'Ponta Delgada', 4),
(5, 'Pesca', 'Bla', 3, 'Ponta Delgada', 7),
(15, 'Canyoning', 'Os Açores são um arquipélago situado na crista Média Oceânica de origem vulcânica e constituído por 9 ilhas, das quais três apresentam excelentes condições para a prática de canyoning.', 3, 'Ribeira Grande', 18),
(16, 'Golfe', 'Olhar em redor e não ver qualquer tipo de construção humana na linha do horizonte. Só paz e natureza. Mais uma tacada e temos o Atlântico à espreita. A morfologia dos greens convida à caminhada, na companhia de uma explosão colorida de flores. ', 3, 'Ribeira Grande', 19),
(30, 'Observação de Aves', 'Os Açores são conhecidos internacionalmente como destino para a observação de determinados grupos de espécies de aves. Devido à sua posição central no Oceano Atlântico, é possível observar várias espécies migratórias que ocorrem ocasionalmente nos Açores por desvios migratórios provocados principalmente por intempéries.', 3, 'Ponta Delgada', 33),
(31, 'Geoturismo', 'A génese dos Açores está impressa em 1766 vulcões, nove dos quais ainda placidamente activos. No subsolo, estão assinaladas quase três centenas de cavidades vulcânicas, sob a forma de grutas, algares e fendas. Na paisagem, há caldeiras secas, lagoas em crateras, campos fumarólicos e nascentes termais. No mar, encontram-se fontes geotermais submarinas. A majestosa montanha do Pico, de cone ainda intacto, parece proteger todas estas riquezas geológicas. Testemunho do poder da Natureza, o vulcanism', 3, 'Lagoa', 34),
(32, 'Observação de Cetáceos', 'Os Açores são actualmente um dos maiores santuários de baleias do mundo. Entre espécies residentes e migratórias, comuns ou raras, avistam-se mais de 20 tipos diferentes de cetáceos nas suas águas. O número impressiona e corresponde a um terço do total de espécies existentes. Estamos num ecossistema de características únicas. Com a presença das majestosas baleias e dos simpáticos golfinhos, o azul do Atlântico torna-se ainda mais mágico e abençoado em redor destas nove ilhas. E traz para os novo', 3, 'Ponta Delgada', 35),
(33, 'Parapente', 'Os Açores são considerados por muitos como um destino singular para prática do parapente, com variadíssimos spots, bem como zonas de descolagem e aterragem. É possível voar durante todo o ano, mas os meses de verão afirmam-se como os melhores para a prática da modalidade.\r\nDesde voos técnicos em cross country passando pelas crateras vulcânicas das Furnas, Lagoa do Fogo ', 3, 'Sete Cidades', 36),
(34, 'huhb', 'sds', 3, 'sd', 37);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idAdmin` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idAdmin`, `username`, `password`, `name`) VALUES
(3, 'andre', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 'André Silva');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `idComments` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idActivity` int(11) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `dateComment` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`idComments`, `idUser`, `idActivity`, `comment`, `dateComment`) VALUES
(1, 6, 15, 'Adorei a experiência!', '2018-11-15 16:56:21'),
(2, 6, 15, 'o jose é toto', '2018-11-15 16:59:05'),
(3, 6, 15, 'teste', '2018-11-15 16:59:44'),
(4, 6, 15, 'teste', '2018-11-15 17:00:31'),
(5, 5, 16, 'O nelson é um mano fixe!', '2018-11-16 11:59:14');

-- --------------------------------------------------------

--
-- Table structure for table `creditCard`
--

CREATE TABLE `creditCard` (
  `idCreditCard` int(11) NOT NULL,
  `name` varchar(75) NOT NULL,
  `cardNumber` int(16) NOT NULL,
  `expiry` date NOT NULL,
  `cardType` enum('Visa','MasterCard','American Express','AirPlus') NOT NULL,
  `securityCode` int(4) NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `creditCard`
--

INSERT INTO `creditCard` (`idCreditCard`, `name`, `cardNumber`, `expiry`, `cardType`, `securityCode`, `idUser`) VALUES
(0, 'Alice', 2147483647, '3235-02-12', 'Visa', 1223, 5);

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `idImage` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `imagePath` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`idImage`, `name`, `imagePath`) VALUES
(3, 'mergulho.jpg', 'images/'),
(4, 'mergulho.jpg', 'images/'),
(5, '4', 'images/'),
(6, '4', 'images/'),
(7, 'img_7_dark.jpg', 'images/'),
(8, '', 'images/'),
(9, '', 'images/'),
(10, '', 'images/'),
(11, '', 'images/'),
(12, '', 'images/'),
(13, '', 'images/'),
(14, '', 'images/'),
(15, '', 'images/'),
(16, '', 'images/'),
(17, '', 'images/'),
(18, 'canyoning.jpg', 'images/'),
(19, 'golfe.jpg', 'images/'),
(20, '', 'images/'),
(21, '', 'images/'),
(22, '', 'images/'),
(23, '', 'images/'),
(24, '', 'images/'),
(25, '', 'images/'),
(26, '', 'images/'),
(27, '', 'images/'),
(28, '', 'images/'),
(29, '', 'images/'),
(30, '', 'images/'),
(31, '', 'images/'),
(32, 'img_8_dark.jpg', 'images/'),
(33, 'observacaoAves.jpg', 'images/'),
(34, 'geotourism.jpg', 'images/'),
(35, 'cetaceos.jpeg', 'images/'),
(36, 'parapente.jpg', 'images/'),
(37, 'img_5.jpg', 'images/');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `idUser` int(11) NOT NULL,
  `idActivity` int(11) NOT NULL,
  `dateReservation` date NOT NULL,
  `state` enum('reservada','adiada','cancelada') NOT NULL,
  `idReservation` int(11) NOT NULL,
  `timeReservation` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`idUser`, `idActivity`, `dateReservation`, `state`, `idReservation`, `timeReservation`) VALUES
(5, 4, '2018-11-09', 'adiada', 1, '23:23:00'),
(6, 4, '2018-11-07', 'cancelada', 2, '22:02:00'),
(6, 4, '2018-11-07', 'cancelada', 3, '22:02:00'),
(5, 4, '0000-00-00', 'adiada', 4, '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`idUser`, `username`, `password`, `name`) VALUES
(1, 'carina', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 'Carina Gomes'),
(2, 'jose', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 'José Felizmino'),
(5, 'alice', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 'Alice Gomes'),
(6, 'ana', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'Ana Morais');

-- --------------------------------------------------------

--
-- Table structure for table `user_activity`
--

CREATE TABLE `user_activity` (
  `idUser` int(11) NOT NULL,
  `idActivity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`idActivity`),
  ADD KEY `fk_activity_admin_idx` (`idAdmin`),
  ADD KEY `idImage` (`idImage`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`idComments`),
  ADD KEY `fk_comments_user_idx` (`idUser`),
  ADD KEY `fk_comments_activity_idx` (`idActivity`);

--
-- Indexes for table `creditCard`
--
ALTER TABLE `creditCard`
  ADD PRIMARY KEY (`idCreditCard`),
  ADD KEY `idUser` (`idUser`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`idImage`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`idReservation`),
  ADD KEY `fk_user_activity_idx` (`idActivity`),
  ADD KEY `fk_user_reservation` (`idUser`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- Indexes for table `user_activity`
--
ALTER TABLE `user_activity`
  ADD PRIMARY KEY (`idUser`,`idActivity`),
  ADD KEY `fk_user_activity_idx` (`idActivity`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `idActivity` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `idComments` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `idImage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `idReservation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity`
--
ALTER TABLE `activity`
  ADD CONSTRAINT `activity_ibfk_1` FOREIGN KEY (`idImage`) REFERENCES `image` (`idImage`),
  ADD CONSTRAINT `fk_activity_admin` FOREIGN KEY (`idAdmin`) REFERENCES `admin` (`idAdmin`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_comments_activity` FOREIGN KEY (`idActivity`) REFERENCES `activity` (`idActivity`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comments_user` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `creditCard`
--
ALTER TABLE `creditCard`
  ADD CONSTRAINT `creditCard_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`);

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `fk_activity_reservation` FOREIGN KEY (`idActivity`) REFERENCES `activity` (`idActivity`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_reservation` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_activity`
--
ALTER TABLE `user_activity`
  ADD CONSTRAINT `fk_activity_user` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_activity` FOREIGN KEY (`idActivity`) REFERENCES `activity` (`idActivity`) ON DELETE NO ACTION ON UPDATE NO ACTION;
