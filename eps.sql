-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-07-2025 a las 21:03:28
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `eps`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `CitNumero` int(11) NOT NULL,
  `CitFecha` date NOT NULL,
  `CitHora` varchar(10) NOT NULL,
  `CitPaciente` char(10) NOT NULL,
  `CitMedico` char(10) NOT NULL,
  `CitConsultorio` int(3) NOT NULL,
  `CitEstado` enum('Asignada','Cumplida','Solicitada','Cancelada') NOT NULL DEFAULT 'Asignada',
  `CitObservaciones` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`CitNumero`, `CitFecha`, `CitHora`, `CitPaciente`, `CitMedico`, `CitConsultorio`, `CitEstado`, `CitObservaciones`) VALUES
(3, '2025-06-11', '10:40:00', '1098765432', '1125623285', 1, 'Solicitada', 'Cita de prueba\r\n                            '),
(4, '2025-11-05', '10:40:00', '1023456789', '1125623285', 1, 'Solicitada', 'cita de prueva 2\r\n                            '),
(5, '2025-06-17', '11:20:00', '1055554321', '1125623285', 2, 'Solicitada', 'cita de prueba 5\r\n                            '),
(6, '2025-06-19', '10:20:00', '1098765432', '1125623285', 3, 'Solicitada', 'Cita de prueba 6\r\n                            '),
(7, '2025-06-12', '10:40:00', '1098765432', '1125623285', 3, 'Solicitada', 'CIta prueba 7\r\n                            '),
(8, '2025-06-17', '10:20:00', '1583276238', '1011223344', 2, 'Solicitada', 'cita de prueba8\r\n                            '),
(10, '2025-06-27', '09:20:00', '1583276238', '1023456789', 2, 'Solicitada', 'cita pruba 22\r\n                            '),
(14, '2025-06-11', '11:00:00', '1583276238', '1098765432', 3, 'Solicitada', '\r\n             cfffff               '),
(15, '2025-06-20', '10:20:00', '1583276238', '1011223344', 3, 'Solicitada', 'loquesea\r\n                            '),
(17, '2025-06-26', '10:20:00', '1583276238', '1098765432', 2, 'Solicitada', 'lo que sea\r\n                            '),
(19, '2025-06-11', '11:00:00', '1583276238', '1002345678', 2, 'Solicitada', 'lo que sea\r\n                            '),
(20, '2025-06-13', '08:40:00', '1583276238', '1011223344', 2, 'Solicitada', '\r\n           cita                 '),
(22, '2025-06-12', '11:00:00', '1583276238', '1098765432', 2, 'Solicitada', 'cita\r\n                            '),
(23, '2025-06-18', '10:20:00', '1583276238', '1098765432', 1, 'Solicitada', 'cita prueba             '),
(24, '2025-06-03', '08:40:00', '1583276238', '1023456789', 2, 'Solicitada', '\r\n       cita prueba                     '),
(25, '2025-07-16', '09:40:00', '1011121314', '1011223344', 1, 'Cancelada', 'tiene fiebre\r\n                            ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultorios`
--

CREATE TABLE `consultorios` (
  `ConNumero` int(11) NOT NULL,
  `ConNombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `consultorios`
--

INSERT INTO `consultorios` (`ConNumero`, `ConNombre`) VALUES
(1, 'consultas 1'),
(2, 'tartamientos 2'),
(3, 'quimioterapia 3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horas`
--

CREATE TABLE `horas` (
  `hora` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `horas`
--

INSERT INTO `horas` (`hora`) VALUES
('08:00:00'),
('08:20:00'),
('08:40:00'),
('09:00:00'),
('09:20:00'),
('09:40:00'),
('10:00:00'),
('10:20:00'),
('10:40:00'),
('11:00:00'),
('11:20:00'),
('11:40:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicos`
--

CREATE TABLE `medicos` (
  `MedIdentificacion` varchar(10) NOT NULL,
  `MedNombres` varchar(50) NOT NULL,
  `MedApellidos` varchar(50) NOT NULL,
  `MedLicencia` varchar(10) NOT NULL,
  `MedTipo` enum('Planta','Practicante') NOT NULL,
  `estado` enum('Activo','Desactivado') DEFAULT 'Activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `medicos`
--

INSERT INTO `medicos` (`MedIdentificacion`, `MedNombres`, `MedApellidos`, `MedLicencia`, `MedTipo`, `estado`) VALUES
('1002345678', 'Julián', 'Herrera', '4589123456', 'Planta', 'Activo'),
('1011223344', 'Mariana', 'López', '4577231980', 'Planta', 'Activo'),
('1023456789', 'Natalia', 'Gómez', '4598761234', 'Planta', 'Activo'),
('1098765432', 'Ricardo', 'Pérez', '4532678490', 'Practicante', 'Activo'),
('1125623285', 'Ricardo', 'Martinez', '2367367277', 'Planta', 'Desactivado'),
('1221233284', 'German', 'Garmendia', '87366333', 'Planta', 'Desactivado'),
('152625353', 'Pepe', 'Arjona', '76343638', 'Planta', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `PacIdentificacion` char(10) NOT NULL,
  `PacNombres` varchar(50) NOT NULL,
  `PacApellidos` varchar(50) DEFAULT NULL,
  `PacFechaNacimiento` date NOT NULL,
  `PacSexo` enum('M','F') NOT NULL,
  `Pactratamiento` int(11) DEFAULT NULL,
  `Pacestado` enum('Activo','Inactivo') DEFAULT 'Activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`PacIdentificacion`, `PacNombres`, `PacApellidos`, `PacFechaNacimiento`, `PacSexo`, `Pactratamiento`, `Pacestado`) VALUES
('1011121314', 'Camila', 'Torres', '2010-07-26', 'F', 6, 'Activo'),
('1023456789', 'Laura', 'Ramírez', '1985-06-26', 'F', 5, 'Activo'),
('1055554321', 'Andrés', 'Rodríguez', '2012-06-06', 'M', 4, 'Activo'),
('1098765432', 'Juan', 'González', '2002-11-06', 'M', 3, 'Activo'),
('1583276238', 'Angel', 'Bernal', '2006-08-21', 'M', 3, 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tratamientos`
--

CREATE TABLE `tratamientos` (
  `TraNumero` int(11) NOT NULL,
  `TraFechaAsignado` date NOT NULL,
  `TraDescripcion` text NOT NULL,
  `TraFechaInicio` date NOT NULL,
  `TraFechaFin` date NOT NULL,
  `TraObservaciones` text NOT NULL,
  `estado` enum('Activo','Desactivado') DEFAULT 'Activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tratamientos`
--

INSERT INTO `tratamientos` (`TraNumero`, `TraFechaAsignado`, `TraDescripcion`, `TraFechaInicio`, `TraFechaFin`, `TraObservaciones`, `estado`) VALUES
(3, '1928-07-18', 'Inyeccion de Penicilina', '1929-06-18', '2119-06-13', 'Pacientes con infeccion bacteriana comprobada', 'Activo'),
(4, '2024-06-26', 'Tratamiento de ortodoncia', '2025-06-12', '2025-04-24', 'Corrección de maloclusión severa', 'Activo'),
(5, '2011-07-06', 'Endodoncia molar', '2020-07-09', '2023-07-26', 'Dolor persistente, tratamiento de conducto exitoso', 'Activo'),
(6, '2025-06-05', 'Implante dental', '2009-11-11', '2016-06-26', 'Implante en premolar superior izquierdo', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `email` varchar(60) NOT NULL,
  `UserPasword` varchar(20) NOT NULL,
  `Rol` enum('Admin','Medico','Paciente') DEFAULT NULL,
  `idUsuario` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`email`, `UserPasword`, `Rol`, `idUsuario`) VALUES
('desconocido@gmail.com', '231', 'Medico', '1125623285'),
('paciente@gmail.com', '321', 'Paciente', '1583276238'),
('yayelbernal2@gmail.com', '123', 'Admin', '1487346737');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`CitNumero`),
  ADD KEY `CitPaciente` (`CitPaciente`),
  ADD KEY `CitMedico` (`CitMedico`),
  ADD KEY `CitConsultorio` (`CitConsultorio`);

--
-- Indices de la tabla `consultorios`
--
ALTER TABLE `consultorios`
  ADD PRIMARY KEY (`ConNumero`);

--
-- Indices de la tabla `medicos`
--
ALTER TABLE `medicos`
  ADD PRIMARY KEY (`MedIdentificacion`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`PacIdentificacion`);

--
-- Indices de la tabla `tratamientos`
--
ALTER TABLE `tratamientos`
  ADD PRIMARY KEY (`TraNumero`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `CitNumero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `tratamientos`
--
ALTER TABLE `tratamientos`
  MODIFY `TraNumero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas_ibfk_1` FOREIGN KEY (`CitPaciente`) REFERENCES `pacientes` (`PacIdentificacion`),
  ADD CONSTRAINT `citas_ibfk_2` FOREIGN KEY (`CitMedico`) REFERENCES `medicos` (`MedIdentificacion`),
  ADD CONSTRAINT `citas_ibfk_3` FOREIGN KEY (`CitConsultorio`) REFERENCES `consultorios` (`ConNumero`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
