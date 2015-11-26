/*
Navicat MySQL Data Transfer

Source Server         : HOME
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : secundaria

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2015-11-25 14:06:42
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for rangos
-- ----------------------------
DROP TABLE IF EXISTS `rangos`;
CREATE TABLE `rangos` (
  `id_rango` tinyint(2) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_rango`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of rangos
-- ----------------------------
INSERT INTO `rangos` VALUES ('1', 'Administrador', 'usuario que ingresara los datos al sistema');
INSERT INTO `rangos` VALUES ('2', 'Profesor', 'Captura las calificaciones en el sistema');

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id_usuario` int(20) NOT NULL AUTO_INCREMENT,
  `matricula` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `contrasena` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `change_pass` tinyint(1) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `a_paterno` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `a_materno` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` int(20) NOT NULL,
  `celular` int(20) NOT NULL,
  `correo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `antiguedad_ingreso_sep` date NOT NULL,
  `puesto` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `fotografia` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `id_rango` tinyint(2) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_modificacion` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_usuario`),
  KEY `FK_RANGOS` (`id_rango`),
  CONSTRAINT `FK_RANGOS` FOREIGN KEY (`id_rango`) REFERENCES `rangos` (`id_rango`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES ('1', '09102017', 'admin', '1', 'luis', 'romero', 'pasten', '551548838', '445525262', 'luispasten.net@gmail.com', '0002-05-02', 'programador', 'europpa.jpg', '1', '2015-11-20 14:32:44', '2015-11-24 20:24:19');
INSERT INTO `usuarios` VALUES ('2', '09102029', 'admin ', '0', 'antonio ', 'palomino', 'gonzalez', '551567890', '445512344', 'antonio.beatle07@gmail.com', '0002-05-06', 'diseñador grafico', 'beatles.jpg', '2', '2015-11-20 16:48:42', '0000-00-00 00:00:00');
