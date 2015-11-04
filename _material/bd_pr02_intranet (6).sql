-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-11-2015 a las 09:27:14
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


DROP TABLE IF EXISTS `tbl_usuario`;
CREATE TABLE IF NOT EXISTS `tbl_usuario` (
`id_usuario` int(11) NOT NULL,
  `email` text COLLATE utf8_bin NOT NULL,
  `password` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

DROP TABLE IF EXISTS `tbl_material`;
CREATE TABLE IF NOT EXISTS `tbl_material` (
`id_material` int(11) NOT NULL,
  `tipo_material` text COLLATE utf8_bin,
  `descripcion` text COLLATE utf8_bin,
  `disponible` tinyint(1) DEFAULT NULL,
  `id_incidencia` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

DROP TABLE IF EXISTS `tbl_reservas`;
CREATE TABLE IF NOT EXISTS `tbl_reservas` (
`id_reserva` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `hora_entrada` datetime DEFAULT NULL,
  `hora_salida` datetime DEFAULT NULL,
  `id_material` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

DROP TABLE IF EXISTS `tbl_incidencia`;
CREATE TABLE IF NOT EXISTS `tbl_incidencia` (
`id_incidencia` int(11) NOT NULL,
  `descripcion_incidencia` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `tbl_usuario` (`id_usuario`,`email`, `password`) VALUES
(1,'1010.joan23@fje.edu', '1234'),
(2,'2020.joan23@fje.edu', '1234'),
(3,'3030.joan23@fje.edu', '1234'),
(4,'4040.joan23@fje.edu', '1234'),
(5,'5050.joan23@fje.edu', '1234'),
(6,'6060.joan23@fje.edu', '1234'),
(7,'7070.joan23@fje.edu', '1234'),
(8,'8080.joan23@fje.edu', '1234'),
(9,'9090.joan23@fje.edu', '1234'),
(10,'1111.joan23@fje.edu', '1234');

INSERT INTO `tbl_material` (`id_material`,`tipo_material`, `descripcion`, `disponible`, `id_incidencia`) VALUES
(1,'Sala Reuniones', 'Sala Reuniones 01', 0, NULL),
(2,'Sala Reuniones', 'Sala Reuniones 02', 0, NULL),
(3,'Despacho', 'Despacho 01', 0, NULL),
(4,'Despacho', 'Despacho 02', 0, NULL),
(5,'Aula Informática', 'Aula Informática 01', 0, NULL),
(6,'Aula Informática', 'Aula Informática 02', 0, NULL),
(7,'Aula Teoría', 'Aula Teoría 01', 0, NULL),
(8,'Aula Teoría', 'Aula Teoría 02', 0, NULL),
(9,'Aula Teoría', 'Aula Teoría 03', 0, NULL),
(10,'Aula Teoría', 'Aula Teoría 04', 0, NULL);
(11,'Ordenador', 'Ordenador Portátil Dell', 0, NULL),
(12,'Ordenador', 'Ordenador Portátil Apple', 0, NULL),
(13,'Ordenador', 'Ordenador Portátil Acer', 0, NULL),
(14,'Ordenador', 'Ordenador Portátil Asus', 0, NULL),
(15,'Ordenador', 'Ordenador Portátil Lenovo', 0, NULL),
(16,'Proyector', 'Proyector Acer', 0, NULL),
(17,'Proyector', 'Proyector Benq', 0, NULL),
(18,'Proyector', 'Proyector Epson', 0, NULL),
(19,'Proyector', 'Proyector Optoma', 0, NULL),
(20,'Proyector', 'Proyector Lg', 0, NULL),
(21,'Móvil', 'Móvil Bq Aquaris', 0, NULL),
(22,'Móvil', 'Móvil Doogee Voyager', 0, NULL),
(23,'Móvil', 'Móvil Apple Iphone', 0, NULL),
(24,'Móvil', 'Móvil Hisense', 0, NULL),
(25,'Móvil', 'Móvil Samsung Galaxy', 0, NULL),
(26,'Carro de portátil', 'Carro de portátil 01', 0, NULL),
(27,'Carro de portátil', 'Carro de portátil 02', 0, NULL);
