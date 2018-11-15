-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 15, 2018 at 10:21 PM
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
(4, 'Mergulho', 'Teste', 3, 'Ponta Delgada', 4),
(5, 'Pesca', 'Bla', 3, 'Ponta Delgada', 7),
(15, 'Canyoning', 'Os Açores são um arquipélago situado na crista Média Oceânica de origem vulcânica e constituído por 9 ilhas, das quais três apresentam excelentes condições para a prática de canyoning.', 3, 'Ribeira Grande', 18),
(16, 'Golfe', 'Olhar em redor e não ver qualquer tipo de construção humana na linha do horizonte. Só paz e natureza. Mais uma tacada e temos o Atlântico à espreita. A morfologia dos greens convida à caminhada, na companhia de uma explosão colorida de flores. ', 3, 'Ribeira Grande', 19);

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
(4, 6, 15, 'teste', '2018-11-15 17:00:31');

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
(31, '', 'images/');

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
(5, 4, '2018-11-09', 'cancelada', 1, '23:23:00'),
(6, 4, '2018-11-07', 'reservada', 2, '22:02:00'),
(6, 4, '2018-11-07', 'reservada', 3, '22:02:00'),
(5, 4, '0000-00-00', 'cancelada', 4, '00:00:00');

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
(5, 'alice', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 'Alice Linda'),
(6, 'ana', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'Ana');

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
  MODIFY `idActivity` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `idComments` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `idImage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

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
