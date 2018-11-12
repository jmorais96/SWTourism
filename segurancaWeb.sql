-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 12, 2018 at 01:08 PM
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
(4, 'Mergulho', 'Bla bla', 3, 'Ponta Delgada', 4);

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
(4, 'mergulho.jpg', 'images/');

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
(5, 4, '2018-11-09', 'reservada', 1, '23:23:00');

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
(5, 'alice', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 'Alice Linda');

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
  MODIFY `idActivity` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `idComments` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `idImage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `idReservation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
