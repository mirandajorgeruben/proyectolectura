-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: feb 13, 2015 at 05:17 p.m.
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `audio`
--

-- --------------------------------------------------------




-- --------------------------------------------------------

--
-- Table structure for table `genero`
--

CREATE TABLE IF NOT EXISTS `genero` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;


-- --------------------------------------------------------

--
-- Table structure for table `autor`
--

CREATE TABLE IF NOT EXISTS `autor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;



-- --------------------------------------------------------


--
-- Table structure for table `lista`
--

CREATE TABLE IF NOT EXISTS `lista` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `fecha` datetime NOT NULL,
  `id_visibilidad` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_control` int(11) NOT NULL,
  `id_genero` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_visiblilidad` (`id_visibilidad`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_onda` (`id_onda`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;


-- --------------------------------------------------------

--
-- Table structure for table `lista_audiolibro`
--

CREATE TABLE IF NOT EXISTS `lista_audiolibro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_audiolibro` int(11) NOT NULL,
  `id_lista` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_audiolibro` (`id_audiolibro`),
  KEY `id_lista` (`id_lista`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=99 ;



-- --------------------------------------------------------

--
-- Table structure for table `reproducido`
--

CREATE TABLE IF NOT EXISTS `reproducido` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` datetime NOT NULL,
  `id_lista` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_lista` (`id_lista`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;


-- --------------------------------------------------------

--
-- Table structure for table `audiolibro`
--

CREATE TABLE IF NOT EXISTS `audiolibro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `fecha` datetime NOT NULL,
  `hash` varchar(250) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `id_genero` int(11) NOT NULL,
  `id_autor` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_autor` (`id_autor`),
  KEY `id_genero` (`id_genero`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `mail` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `admin` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `mail`, `password`, `admin`) VALUES
(16, 'rodo', 'rodo@rodo.com', '123456', 0),
(17, 'cris', 'cris@cris.com', '123456', 0),
(18, 'admin', 'admin@admin.com', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `visibilidad`
--

CREATE TABLE IF NOT EXISTS `visibilidad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estado` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `visibilidad`
--


--
-- Constraints for dumped tables
--

--

--
-- Constraints for table `compartido`
--

--
-- Constraints for table `lista`
--
ALTER TABLE `lista`
  ADD CONSTRAINT `lista_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);

--
-- Constraints for table `lista_audiolibro`
--
ALTER TABLE `lista_audiolibro`
  ADD CONSTRAINT `lista_audiolibro_ibfk_1` FOREIGN KEY (`id_audiolibro`) REFERENCES `audiolibro` (`id`),
  ADD CONSTRAINT `lista_audiolibro_ibfk_2` FOREIGN KEY (`id_lista`) REFERENCES `lista` (`id`);

--
-- Constraints for table `reproducido`
--
ALTER TABLE `reproducido`
  ADD CONSTRAINT `reproducido_ibfk_1` FOREIGN KEY (`id_lista`) REFERENCES `lista` (`id`),
  ADD CONSTRAINT `reproducido_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);

--
-- Constraints for table `audiolibro`
--
ALTER TABLE `audiolibro`
  ADD CONSTRAINT `audiolibro_ibfk_1` FOREIGN KEY (`id_genero`) REFERENCES `genero` (`id`),
  ADD CONSTRAINT `audiolibro_ibfk_2` FOREIGN KEY (`id_autor`) REFERENCES `autor` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
