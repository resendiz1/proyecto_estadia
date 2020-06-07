-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 07-06-2020 a las 13:27:41
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `uttecama`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acti_dep`
--

CREATE TABLE IF NOT EXISTS `acti_dep` (
  `id_act` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_actividad` text NOT NULL,
  `tipo_actividad` text NOT NULL,
  PRIMARY KEY (`id_act`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alu_depor`
--

CREATE TABLE IF NOT EXISTS `alu_depor` (
  `id_al` int(11) NOT NULL AUTO_INCREMENT,
  `matricula_alumno` text NOT NULL,
  `nombre_alumno` text NOT NULL,
  `apellidos_alumno` text NOT NULL,
  `curp_alumno` text NOT NULL,
  `cuatri_alumno` text NOT NULL,
  `foto_alumno` longblob NOT NULL,
  `genero_alumno` text NOT NULL,
  `tipo_sangre` text NOT NULL,
  `nss_alumno` text NOT NULL,
  `seleccionado` text,
  `observ_alumno` text NOT NULL,
  `disciplina_alum` text NOT NULL,
  `carrera_alum` text NOT NULL,
  `horas_alum` text,
  PRIMARY KEY (`id_al`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asis_alum`
--

CREATE TABLE IF NOT EXISTS `asis_alum` (
  `id_a` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_asistencia` text NOT NULL,
  `horas_asistencias` text NOT NULL,
  `alu_depor_id_al` int(11) NOT NULL,
  PRIMARY KEY (`id_a`),
  KEY `asis_alum_alu_depor_fk` (`alu_depor_id_al`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE IF NOT EXISTS `carrera` (
  `id_car` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_carrera` text NOT NULL,
  PRIMARY KEY (`id_car`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `carrera`
--

INSERT INTO `carrera` (`id_car`, `nombre_carrera`) VALUES
(6, 'Tecnologías de la Información'),
(7, 'Ingeniería Industrial'),
(8, 'Mantenimiento Industrial'),
(9, 'Mecatrónica'),
(10, 'Finanzas y Fiscal Contador Público'),
(11, 'Procesos Bioalimentarios'),
(12, 'Innovación de Negocios y Mercadotecnia'),
(13, 'Gestión de Negocios y Proyectos'),
(14, 'Agricultura Sustentable y Protegida'),
(15, 'Gestión del Capital Humano');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consu_med`
--

CREATE TABLE IF NOT EXISTS `consu_med` (
  `id_con` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_consulta` text NOT NULL,
  `presion_arterial` text NOT NULL,
  `temperatura_consulta` text NOT NULL,
  `peso_consulta` text NOT NULL,
  `sintomas` text NOT NULL,
  `curaciones` text NOT NULL,
  `diagnostico` text NOT NULL,
  `medicamento_receta` text NOT NULL,
  `paraclinico_receta` text NOT NULL,
  `observ_consulta` text NOT NULL,
  `paci_med_id_paci` int(11) NOT NULL,
  PRIMARY KEY (`id_con`),
  KEY `consu_med_paci_med_fk` (`paci_med_id_paci`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `del_inv_dep`
--

CREATE TABLE IF NOT EXISTS `del_inv_dep` (
  `id_del` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_delete` text NOT NULL,
  `can_del_invent` text NOT NULL,
  `motivo_del_inv` text NOT NULL,
  `fecha_delete` text NOT NULL,
  `discip_del` text NOT NULL,
  PRIMARY KEY (`id_del`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `del_inv_med`
--

CREATE TABLE IF NOT EXISTS `del_inv_med` (
  `id_med_1` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_del` text NOT NULL,
  `nom_del` text NOT NULL,
  `sus_del` text NOT NULL,
  `presentacion_del` text NOT NULL,
  `grupo` text NOT NULL,
  `cantidad_medic` text NOT NULL,
  `motivo_medica` text NOT NULL,
  `fecha_baja_medica` text NOT NULL,
  PRIMARY KEY (`id_med_1`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `event_no_iems`
--

CREATE TABLE IF NOT EXISTS `event_no_iems` (
  `id_no` int(11) NOT NULL AUTO_INCREMENT,
  `motivo_no_event` text NOT NULL,
  `ev_prog_iems_id_prog` int(11) NOT NULL,
  PRIMARY KEY (`id_no`),
  KEY `event_no_iems_ev_prog_iems_fk` (`ev_prog_iems_id_prog`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `event_si_iems`
--

CREATE TABLE IF NOT EXISTS `event_si_iems` (
  `id_si` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_realizado` text NOT NULL,
  `num_hombres` text NOT NULL,
  `num_mujeres` text NOT NULL,
  `total_atendidos` text NOT NULL,
  `acti_realizada` text NOT NULL,
  `observ_realizado` text NOT NULL,
  `num_viajes` text NOT NULL,
  `evid_1` longblob,
  `evid_2` longblob,
  `evid_3` longblob,
  `ev_prog_iems_id_prog` int(11) NOT NULL,
  PRIMARY KEY (`id_si`),
  KEY `event_si_iems_ev_prog_iems_fk` (`ev_prog_iems_id_prog`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ev_deport`
--

CREATE TABLE IF NOT EXISTS `ev_deport` (
  `id_ev` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_actividad` text NOT NULL,
  `fecha_evento` text NOT NULL,
  `lugar_evento` text NOT NULL,
  `num_part_m` text NOT NULL,
  `num_part_h` text NOT NULL,
  `num_asis_h` text NOT NULL,
  `num_asis_m` text NOT NULL,
  `observ_evento` text NOT NULL,
  PRIMARY KEY (`id_ev`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ev_prog_iems`
--

CREATE TABLE IF NOT EXISTS `ev_prog_iems` (
  `id_prog` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_prog` text NOT NULL,
  `actividad_prog` text NOT NULL,
  `tipo_prog` text NOT NULL,
  `turno_iems` text NOT NULL,
  `realizado` text,
  `carrera_ev` text NOT NULL,
  `id_ev_id_iems` int(11) NOT NULL,
  PRIMARY KEY (`id_prog`),
  KEY `id_ev_id_iems` (`id_ev_id_iems`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ev_prog_med`
--

CREATE TABLE IF NOT EXISTS `ev_prog_med` (
  `id_evp` int(11) NOT NULL AUTO_INCREMENT,
  `tema_evento` text NOT NULL,
  `fecha_evento` text NOT NULL,
  `descripcion_evento` text NOT NULL,
  `tipo_evento` text NOT NULL,
  `carrera` text NOT NULL,
  `realizado` text,
  PRIMARY KEY (`id_evp`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exis_inv_med`
--

CREATE TABLE IF NOT EXISTS `exis_inv_med` (
  `id_med` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_medica` text NOT NULL,
  `nombre_medica` text NOT NULL,
  `activo_medica` text NOT NULL,
  `grupo_medica` text NOT NULL,
  `presentacion` text NOT NULL,
  `cantidad_medica` text NOT NULL,
  `observaciones_medica` text NOT NULL,
  `fecha_alta_medica` text NOT NULL,
  `eliminado` text,
  PRIMARY KEY (`id_med`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `iems_difu`
--

CREATE TABLE IF NOT EXISTS `iems_difu` (
  `id_iems` int(11) NOT NULL AUTO_INCREMENT,
  `clave_iems` text NOT NULL,
  `nom_iems` text NOT NULL,
  `cp_iems` text NOT NULL,
  `municipio_iems` text NOT NULL,
  `localidad_iems` text NOT NULL,
  `zona_influencia` text NOT NULL,
  `direccion_iems` text NOT NULL,
  `tel1_iems` text NOT NULL,
  `tel2_iems` text NOT NULL,
  `email_iems` text NOT NULL,
  `coordinador_iems` text NOT NULL,
  `ruta_iems` longblob,
  `distancia_iems` text NOT NULL,
  `servicio_educativo` text NOT NULL,
  `observ_iems` text NOT NULL,
  PRIMARY KEY (`id_iems`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inv_del`
--

CREATE TABLE IF NOT EXISTS `inv_del` (
  `id_dele` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_delete` text NOT NULL,
  `cantidad_delete` text NOT NULL,
  `fecha_delete` text NOT NULL,
  `motivo_delete` text NOT NULL,
  PRIMARY KEY (`id_dele`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inv_deport`
--

CREATE TABLE IF NOT EXISTS `inv_deport` (
  `id_in` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_inv` text NOT NULL,
  `nombre_invent` text NOT NULL,
  `cantidad_invent` text NOT NULL,
  `fecha_alta` text NOT NULL,
  `disciplina_inv` text NOT NULL,
  `descrp_inv` text NOT NULL,
  PRIMARY KEY (`id_in`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inv_dif`
--

CREATE TABLE IF NOT EXISTS `inv_dif` (
  `id_invent` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` text NOT NULL,
  `nombre_invent` varchar(200) NOT NULL,
  `cantidad_invent` varchar(200) NOT NULL,
  `fecha_alta` varchar(200) NOT NULL,
  `descrip_invent` varchar(200) NOT NULL,
  `cantidad_delete` text,
  `fecha_delete` text,
  `motivo_delete` text,
  PRIMARY KEY (`id_invent`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `no_ev_med`
--

CREATE TABLE IF NOT EXISTS `no_ev_med` (
  `id_evno` int(11) NOT NULL AUTO_INCREMENT,
  `motivo_evento` text NOT NULL,
  `ev_prog_med_id_evp` int(11) NOT NULL,
  PRIMARY KEY (`id_evno`),
  KEY `no_ev_med_ev_prog_med_fk` (`ev_prog_med_id_evp`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paci_med`
--

CREATE TABLE IF NOT EXISTS `paci_med` (
  `id_paci` int(11) NOT NULL AUTO_INCREMENT,
  `matricula_paciente` text NOT NULL,
  `nombre_paciente` text NOT NULL,
  `apellidos_paciente` text NOT NULL,
  `factor_rh` text NOT NULL,
  `genero_paciente` text NOT NULL,
  `primer_vez` text NOT NULL,
  `alergias_paciente` text NOT NULL,
  `padecimientos_paciente` text NOT NULL,
  `fecha_nacimiento_paciente` text NOT NULL,
  `tipo_sangre` text NOT NULL,
  `observaciones_paciente` text NOT NULL,
  `fecha_add_paciente` text NOT NULL,
  `carrera_paciente` text NOT NULL,
  PRIMARY KEY (`id_paci`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pre_r`
--

CREATE TABLE IF NOT EXISTS `pre_r` (
  `id_reg` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_pre` text NOT NULL,
  `apellidos_pre` text NOT NULL,
  `fecha_pre` text NOT NULL,
  `observ_pre` text NOT NULL,
  `ingreso` text,
  `carrera_pre` text NOT NULL,
  `iems_difu_id_iems` int(11) NOT NULL,
  PRIMARY KEY (`id_reg`),
  KEY `pre_r_iems_difu_fk` (`iems_difu_id_iems`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prof_dep`
--

CREATE TABLE IF NOT EXISTS `prof_dep` (
  `id_prof` int(11) NOT NULL AUTO_INCREMENT,
  `num_trabajador` text NOT NULL,
  `nombre_profesor` text NOT NULL,
  `foto_profesor` longblob NOT NULL,
  `perfil_prof` text NOT NULL,
  `fecha_ingreso` text NOT NULL,
  `horas_profesor` text NOT NULL,
  `tel_profesor` text NOT NULL,
  `observ_profesor` text NOT NULL,
  `pass_profesor` text NOT NULL,
  `disciplina_docente` text NOT NULL,
  PRIMARY KEY (`id_prof`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `root_o`
--

CREATE TABLE IF NOT EXISTS `root_o` (
  `id_rooto` int(11) NOT NULL AUTO_INCREMENT,
  `nom_rooto` text NOT NULL,
  `pass_rooto` text NOT NULL,
  `intentos_root` int(11) DEFAULT NULL,
  `bloqueo` text,
  PRIMARY KEY (`id_rooto`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `root_o`
--

INSERT INTO `root_o` (`id_rooto`, `nom_rooto`, `pass_rooto`, `intentos_root`, `bloqueo`) VALUES
(2, 'admin', 'admin', 0, 'no');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `selec_depo`
--

CREATE TABLE IF NOT EXISTS `selec_depo` (
  `id_sel` int(11) NOT NULL AUTO_INCREMENT,
  `alu_depor_id_al` int(11) NOT NULL,
  PRIMARY KEY (`id_sel`),
  KEY `selec_depo_alu_depor_fk` (`alu_depor_id_al`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `si_eve_med`
--

CREATE TABLE IF NOT EXISTS `si_eve_med` (
  `id_evsi` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_r_evento` text NOT NULL,
  `descripcion_r_evento` text NOT NULL,
  `tipo_r_evento` text NOT NULL,
  `num_mujeres` text NOT NULL,
  `num_hombres` text NOT NULL,
  `total_ate` text NOT NULL,
  `ev_prog_med_id_evp` int(11) NOT NULL,
  PRIMARY KEY (`id_evsi`),
  KEY `si_eve_med_ev_prog_med_fk` (`ev_prog_med_id_evp`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_sys`
--

CREATE TABLE IF NOT EXISTS `user_sys` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `num_trabajador` text NOT NULL,
  `nombre_user` text NOT NULL,
  `tel_user` text NOT NULL,
  `email_user` text NOT NULL,
  `pass_user` text NOT NULL,
  `area_sys_user` text NOT NULL,
  `baneo` text,
  `intentos` int(11) NOT NULL,
  `area_intento` text,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Volcado de datos para la tabla `user_sys`
--

INSERT INTO `user_sys` (`id_user`, `num_trabajador`, `nombre_user`, `tel_user`, `email_user`, `pass_user`, `area_sys_user`, `baneo`, `intentos`, `area_intento`) VALUES
(39, 'admin_medico', 'Arturo Resendiz LÃ³pez', '249-115-2365', 'resendiz@mail.com', 'D1x1BbDyVzNH2', 'medico', NULL, 0, NULL),
(38, 'admin_deportes', 'Arturo Resendiz LÃ³pez', '249-144-2352', 'resendiz@email.com', 'D1NBMoGsMxrMk', 'adyc', NULL, 0, NULL),
(40, 'admin_difusion', 'Arturo Resendiz LÃ³pez', '249-122-5689', 'resendiz@email.com', 'D1M3j4wguc7.U', 'difusion', NULL, 0, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
