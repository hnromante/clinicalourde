-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 20, 2017 at 06:29 PM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id3524871_bd_clinicalourde`
--
CREATE DATABASE IF NOT EXISTS `id3524871_bd_clinicalourde` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `id3524871_bd_clinicalourde`;

-- --------------------------------------------------------

--
-- Table structure for table `especialidades`
--

CREATE TABLE `especialidades` (
  `id_esp` int(11) NOT NULL,
  `nom_esp` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `desc_esp` text COLLATE utf8_unicode_ci NOT NULL,
  `pre_esp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `especialidades`
--

INSERT INTO `especialidades` (`id_esp`, `nom_esp`, `desc_esp`, `pre_esp`) VALUES
(1, 'Cardiologia', 'Encargada de ver personas con problemas al corazon.', 60000),
(2, 'Endocrinologia', 'Hormonas?', 30000),
(3, 'Obstatricia', '', 20000),
(4, 'Psicologia', 'Shrink', 30000),
(5, 'Psiquiatria', '+Shrink', 35000),
(6, 'Pediatria', 'Atencion especializada para menores de edad', 20000),
(7, 'Odontologia', 'Pal tarro', 45000),
(8, 'Gastroenterologia', 'Pa la guatita', 25000),
(9, 'Cirugia Plastica', 'Fixea faces', 60000),
(10, 'Nefrologia', '??', 99999999);

-- --------------------------------------------------------

--
-- Table structure for table `especialistas`
--

CREATE TABLE `especialistas` (
  `rut_esp` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `nom_esp` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `ape_esp` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `nac_esp` date NOT NULL,
  `tit_esp` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `especialistas`
--

INSERT INTO `especialistas` (`rut_esp`, `nom_esp`, `ape_esp`, `nac_esp`, `tit_esp`) VALUES
('10.100.100-1', 'Cristian', 'Reyes', '1975-11-30', 'Licenciado en algunaw'),
('11.111.111-1', 'Carlos', 'Contreras', '1990-11-30', 'Dentista'),
('8.888.888-8', 'Esteban', 'Valenzuela', '1980-11-30', 'Dr. en cachania'),
('9.999.999-9', 'Cesar', 'Arce', '1960-11-30', 'Dr. en algo');

-- --------------------------------------------------------

--
-- Table structure for table `metodopago`
--

CREATE TABLE `metodopago` (
  `id_met` int(11) NOT NULL,
  `tipo_met` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `nom_met` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Metodos de Pago - id_met, tipo_met, nom_met';

--
-- Dumping data for table `metodopago`
--

INSERT INTO `metodopago` (`id_met`, `tipo_met`, `nom_met`) VALUES
(1, 'Credito', 'Visa'),
(2, 'Credito', 'Master Plop'),
(3, 'Credito', 'American Express'),
(4, 'Debito', 'Cuenta Rut Banco Estado'),
(5, 'Debito', 'Cuenta Vista'),
(6, 'Debito', 'Cuenta Corriente'),
(7, 'Efectivo', 'Efectivo');

-- --------------------------------------------------------

--
-- Table structure for table `nub_especialista_especialidad`
--

CREATE TABLE `nub_especialista_especialidad` (
  `id_nub` int(11) NOT NULL,
  `rut_especialista` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `id_especialidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='relacion N a M de especialistas y especialidades';

--
-- Dumping data for table `nub_especialista_especialidad`
--

INSERT INTO `nub_especialista_especialidad` (`id_nub`, `rut_especialista`, `id_especialidad`) VALUES
(1, '8.888.888-8', 3),
(2, '8.888.888-8', 9);

-- --------------------------------------------------------

--
-- Table structure for table `pacientes`
--

CREATE TABLE `pacientes` (
  `rut_pac` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `nom_pac` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `ape_pac` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `tel_pac` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `dir_pac` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `usu_pac` int(30) NOT NULL,
  `sal_pac` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Paciente - rut_pac,nom_pac, ape_pac ,tel_pac,dir_pac,usu,sal';

--
-- Dumping data for table `pacientes`
--

INSERT INTO `pacientes` (`rut_pac`, `nom_pac`, `ape_pac`, `tel_pac`, `dir_pac`, `usu_pac`, `sal_pac`) VALUES
('1.273.852-5', 'Ayline ', 'Espinoza', '1111111111', 'Av. Siempre Viva 2824', 1, 3),
('12.123.123-1', 'Juan ', 'Perez Original', '999999999', 'Av. Siempre Viva 2824', 1, 1),
('33.213.573-7', 'Juan ', 'Gonzales Original', '444444444', 'Av. Falsa', 1, 1),
('8.892.926-3', 'Valeska ', 'Cisterna ', '123123123', 'Av. Siempre Viva 2824', 3, 5),
('85.926.263.1', 'Karla ', 'Perez Original', '333333333', 'Av. Siempre Viva 2824', 3, 2),
('9.825.301-9', 'Camila ', 'Cabello Original', '222222222', 'Av. Siempre Viva 2824', 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `reservas`
--

CREATE TABLE `reservas` (
  `id_res` int(11) NOT NULL,
  `usr_res` int(11) NOT NULL,
  `pac_res` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `especialidad_res` int(11) NOT NULL,
  `especialista_res` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `met_pag_res` int(11) NOT NULL,
  `suc_res` int(11) NOT NULL,
  `comentario_res` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `agregado_en` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reservas`
--

INSERT INTO `reservas` (`id_res`, `usr_res`, `pac_res`, `especialidad_res`, `especialista_res`, `met_pag_res`, `suc_res`, `comentario_res`, `agregado_en`) VALUES
(1, 1, '1.273.852-5', 1, '8.888.888-8', 1, 1, 'Primer Ingreso a la clinica', '2017-11-14 22:25:28'),
(2, 3, '8.892.926-3', 2, '10.100.100-1', 5, 4, 'Segundo ingreso a la clinica', '2017-11-14 22:25:28'),
(3, 4, '33.213.573-7', 7, '10.100.100-1', 6, 3, 'Tercer ....', '2017-11-14 22:25:28'),
(4, 1, '9.825.301-9', 9, '11.111.111-1', 2, 3, 'Pablito clavo un clavito', '2017-11-14 22:25:28'),
(5, 3, '9.825.301-9', 6, '9.999.999-9', 3, 3, 'Quinto ingreso ', '2017-11-14 22:25:28');

-- --------------------------------------------------------

--
-- Table structure for table `salud`
--

CREATE TABLE `salud` (
  `id_sal` int(11) NOT NULL,
  `tipo_sal` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `nom_sal` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Salud - id_sal, tipo_sal(publica, privada), nom_sal';

--
-- Dumping data for table `salud`
--

INSERT INTO `salud` (`id_sal`, `tipo_sal`, `nom_sal`) VALUES
(1, 'Publica', 'Fonasa'),
(2, 'Publica', 'Capedrena'),
(3, 'Isapre', 'Consalud'),
(4, 'Isapre', 'Cruz Blanca'),
(5, 'Isapre', 'Colmena'),
(6, 'Privada', 'Isapreqla');

-- --------------------------------------------------------

--
-- Table structure for table `sucursal`
--

CREATE TABLE `sucursal` (
  `id_suc` int(11) NOT NULL,
  `nom_suc` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `ciu_suc` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='sucursal - id_suc,nom_suc,ciu_suc';

--
-- Dumping data for table `sucursal`
--

INSERT INTO `sucursal` (`id_suc`, `nom_suc`, `ciu_suc`) VALUES
(1, 'Clinica Lourde Central', 'Santiago de Chile'),
(3, 'Clinica Lourde Norte Grande', 'Antofagasta'),
(4, 'Clinica Lourde Ohiggins', 'Rancagua'),
(5, 'Clinica Lourde Sur', 'Concepcion'),
(6, 'Clinica Lourde centro medico', 'Santiago Centro');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usr` int(11) NOT NULL,
  `nom_usr` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mail_usr` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pass_usr` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Admin` int(1) NOT NULL,
  `bloqueo` int(1) NOT NULL DEFAULT '0',
  `creacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id_usr`, `nom_usr`, `mail_usr`, `pass_usr`, `Admin`, `bloqueo`, `creacion`) VALUES
(1, 'jperez', 'jperez@inacap.cl', '', 0, 0, '2017-11-14 21:14:20'),
(3, 'admin', 'clinicalourde@gmail.com', '', 1, 0, '2017-11-14 21:16:03'),
(4, 'hugonr', 'hugonromante@gmail.com', '', 1, 0, '2017-11-14 21:16:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `especialidades`
--
ALTER TABLE `especialidades`
  ADD PRIMARY KEY (`id_esp`);

--
-- Indexes for table `especialistas`
--
ALTER TABLE `especialistas`
  ADD PRIMARY KEY (`rut_esp`);

--
-- Indexes for table `metodopago`
--
ALTER TABLE `metodopago`
  ADD PRIMARY KEY (`id_met`);

--
-- Indexes for table `nub_especialista_especialidad`
--
ALTER TABLE `nub_especialista_especialidad`
  ADD PRIMARY KEY (`id_nub`),
  ADD KEY `fk_nub1_especialista` (`rut_especialista`),
  ADD KEY `fk_nub_especialidades` (`id_especialidad`);

--
-- Indexes for table `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`rut_pac`),
  ADD KEY `fk_pac_usu` (`usu_pac`),
  ADD KEY `fk_pac_sal` (`sal_pac`);

--
-- Indexes for table `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id_res`),
  ADD KEY `fk_usu_res` (`usr_res`),
  ADD KEY `fk_pac_res` (`pac_res`),
  ADD KEY `fk_especialidad_res` (`especialidad_res`),
  ADD KEY `fk_especialista_res` (`especialista_res`),
  ADD KEY `fk_metpag_res` (`met_pag_res`),
  ADD KEY `fk_suc_res` (`suc_res`);

--
-- Indexes for table `salud`
--
ALTER TABLE `salud`
  ADD PRIMARY KEY (`id_sal`);

--
-- Indexes for table `sucursal`
--
ALTER TABLE `sucursal`
  ADD PRIMARY KEY (`id_suc`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usr`),
  ADD UNIQUE KEY `nom_usr` (`nom_usr`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `especialidades`
--
ALTER TABLE `especialidades`
  MODIFY `id_esp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `metodopago`
--
ALTER TABLE `metodopago`
  MODIFY `id_met` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `nub_especialista_especialidad`
--
ALTER TABLE `nub_especialista_especialidad`
  MODIFY `id_nub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id_res` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `salud`
--
ALTER TABLE `salud`
  MODIFY `id_sal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `sucursal`
--
ALTER TABLE `sucursal`
  MODIFY `id_suc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `nub_especialista_especialidad`
--
ALTER TABLE `nub_especialista_especialidad`
  ADD CONSTRAINT `fk_nub1_especialista` FOREIGN KEY (`rut_especialista`) REFERENCES `especialistas` (`rut_esp`),
  ADD CONSTRAINT `fk_nub_especialidades` FOREIGN KEY (`id_especialidad`) REFERENCES `especialidades` (`id_esp`);

--
-- Constraints for table `pacientes`
--
ALTER TABLE `pacientes`
  ADD CONSTRAINT `fk_pac_sal` FOREIGN KEY (`sal_pac`) REFERENCES `salud` (`id_sal`),
  ADD CONSTRAINT `fk_pac_usu` FOREIGN KEY (`usu_pac`) REFERENCES `usuarios` (`id_usr`);

--
-- Constraints for table `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `fk_especialidad_res` FOREIGN KEY (`especialidad_res`) REFERENCES `especialidades` (`id_esp`),
  ADD CONSTRAINT `fk_especialista_res` FOREIGN KEY (`especialista_res`) REFERENCES `especialistas` (`rut_esp`),
  ADD CONSTRAINT `fk_metpag_res` FOREIGN KEY (`met_pag_res`) REFERENCES `metodopago` (`id_met`),
  ADD CONSTRAINT `fk_pac_res` FOREIGN KEY (`pac_res`) REFERENCES `pacientes` (`rut_pac`),
  ADD CONSTRAINT `fk_suc_res` FOREIGN KEY (`suc_res`) REFERENCES `sucursal` (`id_suc`),
  ADD CONSTRAINT `fk_usu_res` FOREIGN KEY (`usr_res`) REFERENCES `usuarios` (`id_usr`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
