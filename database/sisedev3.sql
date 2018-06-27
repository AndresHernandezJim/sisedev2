/*
Navicat MySQL Data Transfer

Source Server         : Mysql
Source Server Version : 50720
Source Host           : 127.0.0.1:3306
Source Database       : sisedev3

Target Server Type    : MYSQL
Target Server Version : 50720
File Encoding         : 65001

Date: 2018-06-27 04:38:26
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for acuerdotipo
-- ----------------------------
DROP TABLE IF EXISTS `acuerdotipo`;
CREATE TABLE `acuerdotipo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Tipo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nivel` tinyint(4) NOT NULL,
  `estatus` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of acuerdotipo
-- ----------------------------
INSERT INTO `acuerdotipo` VALUES ('1', 'Admite', 'Artículo 32.- Admitida la demanda', '2', '1');
INSERT INTO `acuerdotipo` VALUES ('2', 'Contestacion', '', '2', '1');
INSERT INTO `acuerdotipo` VALUES ('3', 'Requiere', '', '2', '1');
INSERT INTO `acuerdotipo` VALUES ('4', 'Desecha', '', '2', '1');
INSERT INTO `acuerdotipo` VALUES ('5', 'Incompetencia', '', '2', '1');
INSERT INTO `acuerdotipo` VALUES ('6', 'Pruebas y Alegatos', '', '2', '1');
INSERT INTO `acuerdotipo` VALUES ('7', 'Termino para Ampliación', '', '2', '1');
INSERT INTO `acuerdotipo` VALUES ('8', 'Turnar a Sentencia', '', '2', '1');
INSERT INTO `acuerdotipo` VALUES ('9', 'Audiencia de Pruebas y Alegatos', '', '2', '1');
INSERT INTO `acuerdotipo` VALUES ('10', 'Requeriendo el Cumplimiento de Sentencia', '', '2', '1');
INSERT INTO `acuerdotipo` VALUES ('11', 'Sentencia Cumplida', '', '2', '1');
INSERT INTO `acuerdotipo` VALUES ('12', 'Otros', '', '2', '1');
INSERT INTO `acuerdotipo` VALUES ('13', 'Promoción', '', '1', '1');
INSERT INTO `acuerdotipo` VALUES ('14', 'Escritura Pública', '', '1', '1');
INSERT INTO `acuerdotipo` VALUES ('15', 'Demanda', '', '1', '1');
INSERT INTO `acuerdotipo` VALUES ('16', 'Nombramiento', '', '1', '1');
INSERT INTO `acuerdotipo` VALUES ('17', 'Recibo de Nómina', '', '1', '1');
INSERT INTO `acuerdotipo` VALUES ('18', 'Resolución', '', '1', '1');
INSERT INTO `acuerdotipo` VALUES ('19', 'Boleta de Infracción', '', '1', '1');
INSERT INTO `acuerdotipo` VALUES ('20', 'Copia Certificada', '', '1', '1');
INSERT INTO `acuerdotipo` VALUES ('21', 'Expediente', '', '1', '1');
INSERT INTO `acuerdotipo` VALUES ('22', 'Constancia de Notificación', '', '1', '1');
INSERT INTO `acuerdotipo` VALUES ('23', 'Oficio', '', '1', '1');
INSERT INTO `acuerdotipo` VALUES ('24', 'Concesión', '', '1', '1');
INSERT INTO `acuerdotipo` VALUES ('25', 'Ácuerdo', '', '2', '1');
INSERT INTO `acuerdotipo` VALUES ('26', 'Proyecto', '', '4', '1');
INSERT INTO `acuerdotipo` VALUES ('27', 'Promoción', '', '1', '1');
INSERT INTO `acuerdotipo` VALUES ('28', 'Poder para Pleitos y Cobranzas', '', '1', '1');
INSERT INTO `acuerdotipo` VALUES ('29', 'Amparo', '', '5', '1');
INSERT INTO `acuerdotipo` VALUES ('30', 'Acta de Notificación', '', '3', '1');
INSERT INTO `acuerdotipo` VALUES ('31', 'Constancia de Notificación', '', '3', '1');

-- ----------------------------
-- Table structure for anexopdf
-- ----------------------------
DROP TABLE IF EXISTS `anexopdf`;
CREATE TABLE `anexopdf` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Folio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_Tipo` int(11) NOT NULL,
  `id_Expediente` int(11) NOT NULL,
  `FechaUp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `PathAnexo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NomFile` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of anexopdf
-- ----------------------------
INSERT INTO `anexopdf` VALUES ('1', '1_0', '15', '1', '2018-06-25 10:05:01', './Historico/2018/1', '1_Demanda_01-18.pdf', '0');
INSERT INTO `anexopdf` VALUES ('2', '1_1', '12', '1', '2018-06-25 10:05:01', './Historico/2018/1', '2_Anexo_1.pdf', '0');
INSERT INTO `anexopdf` VALUES ('3', '2_0', '15', '2', '2018-06-25 10:07:15', './Historico/2018/2', '1_Demanda_02-18.pdf', '0');
INSERT INTO `anexopdf` VALUES ('4', '2_1', '12', '2', '2018-06-25 10:07:15', './Historico/2018/2', '2_Anexo_1.pdf', '0');
INSERT INTO `anexopdf` VALUES ('5', '2_2', '12', '2', '2018-06-25 10:07:15', './Historico/2018/2', '3_Anexo_2.pdf', '0');
INSERT INTO `anexopdf` VALUES ('6', '2_3', '12', '2', '2018-06-25 10:07:15', './Historico/2018/2', '4_Anexo_3.pdf', '0');
INSERT INTO `anexopdf` VALUES ('11', '2_4', '1', '2', '2018-06-25 13:33:02', './Historico/2018/2', 'ADM 0218 DGTMSC Colima.pdf', '0');

-- ----------------------------
-- Table structure for domicilio
-- ----------------------------
DROP TABLE IF EXISTS `domicilio`;
CREATE TABLE `domicilio` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `calle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ninter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `next` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `colonia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `municipio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `localidad` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cp` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `referencia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `oir` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of domicilio
-- ----------------------------
INSERT INTO `domicilio` VALUES ('1', '11', 'Ricardo Flores Magón', null, '226', 'Centro', 'Colima', 'Colima', null, '28000', 'Ninguna', '1', '2018-06-20 18:01:04', '2018-06-20 18:01:04');
INSERT INTO `domicilio` VALUES ('2', '12', 'Bulevard Miguel de la Madrid', null, '12575', 'Península de Santiago', 'Manzanillo', 'Colima', null, '28867', 'Ninguna', '1', '2018-06-20 18:02:57', '2018-06-20 18:02:57');
INSERT INTO `domicilio` VALUES ('3', '13', 'Albañiles', 'A', '522', 'El Porvenir', 'Colima', 'Colima', null, '28019', 'Ninguna', '1', '2018-06-20 18:22:00', '2018-06-20 18:22:00');
INSERT INTO `domicilio` VALUES ('4', '14', 'Francisco Ramirez Villareal', null, '570', 'El Porvenir II', 'Colima', 'Colima', null, '28019', 'Ninguna', '1', '2018-06-20 18:27:41', '2018-06-20 18:27:41');
INSERT INTO `domicilio` VALUES ('5', '15', 'Morelos', null, '433', 'Centro', 'Colima', 'Colima', null, '28000', 'Ninguna', '1', '2018-06-20 18:28:52', '2018-06-20 18:28:52');
INSERT INTO `domicilio` VALUES ('6', '16', 'Espinal', null, '199', 'Prados de la Villa', 'Villa de Álvarez', 'Colima', null, '28989', 'Ninguna', '1', '2018-06-21 02:58:50', '2018-06-21 02:58:50');
INSERT INTO `domicilio` VALUES ('7', '17', 'Espinal', null, '201', 'Prados de la Villa', 'Villa de Álvarez', 'Colima', null, '28989', 'Ninugna', '1', '2018-06-22 02:06:08', '2018-06-22 02:06:08');

-- ----------------------------
-- Table structure for envios
-- ----------------------------
DROP TABLE IF EXISTS `envios`;
CREATE TABLE `envios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_exp` int(11) NOT NULL,
  `id_envio` int(11) NOT NULL,
  `id_receptor` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of envios
-- ----------------------------
INSERT INTO `envios` VALUES ('1', '1', '2', '4', '2018-06-25 10:08:55');
INSERT INTO `envios` VALUES ('2', '2', '2', '3', '2018-06-25 10:17:06');
INSERT INTO `envios` VALUES ('3', '2', '3', '5', '2018-06-25 11:13:00');
INSERT INTO `envios` VALUES ('4', '1', '4', '6', '2018-06-25 12:12:04');
INSERT INTO `envios` VALUES ('5', '2', '3', '5', '2018-06-25 13:41:03');

-- ----------------------------
-- Table structure for expediente
-- ----------------------------
DROP TABLE IF EXISTS `expediente`;
CREATE TABLE `expediente` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_demandante` int(11) NOT NULL,
  `id_demandado` int(11) NOT NULL,
  `expediente` int(11) NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `serie` int(11) NOT NULL,
  `idtipo` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of expediente
-- ----------------------------
INSERT INTO `expediente` VALUES ('1', '2', '11', '12', '1', 'ASUNTO: Nulidad de resolución administrativa de CAPDAM', '4', '2018', '1', '2018-06-25 12:12:04');
INSERT INTO `expediente` VALUES ('2', '2', '13', '14', '2', 'ASUNTO: Nulidad de boleta de infracción', '4', '2018', '1', '2018-06-25 13:41:03');

-- ----------------------------
-- Table structure for institucion
-- ----------------------------
DROP TABLE IF EXISTS `institucion`;
CREATE TABLE `institucion` (
  `user_id` int(11) NOT NULL,
  `razon_social` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `celular` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usuario` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TipodePersona` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'INSTITUCION',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of institucion
-- ----------------------------
INSERT INTO `institucion` VALUES ('12', 'Comisión de agua potable, drenaje y alcantarillado de Manzanillo', '3143311630', '3143311630', null, 'INSTITUCION', '2018-06-20 18:02:57', '2018-06-20 18:02:57');
INSERT INTO `institucion` VALUES ('14', 'Dirección General de Tránsito Municipal y Seguridad Ciudadana de Colima', '312000000', '3120000000', null, 'INSTITUCION', '2018-06-20 18:27:41', '2018-06-20 18:27:41');

-- ----------------------------
-- Table structure for involucrados
-- ----------------------------
DROP TABLE IF EXISTS `involucrados`;
CREATE TABLE `involucrados` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `id_exp` int(11) NOT NULL,
  `rol` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of involucrados
-- ----------------------------
INSERT INTO `involucrados` VALUES ('1', '11', '1', '2', '1', '2018-06-25 10:05:01');
INSERT INTO `involucrados` VALUES ('2', '12', '1', '1', '1', '2018-06-25 10:05:01');
INSERT INTO `involucrados` VALUES ('3', '13', '2', '2', '1', '2018-06-25 10:07:15');
INSERT INTO `involucrados` VALUES ('4', '14', '2', '1', '1', '2018-06-25 10:07:15');

-- ----------------------------
-- Table structure for mensajes
-- ----------------------------
DROP TABLE IF EXISTS `mensajes`;
CREATE TABLE `mensajes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usuario_origen` int(11) NOT NULL,
  `usuario_destino` int(11) NOT NULL,
  `mensaje` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estatus` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of mensajes
-- ----------------------------
INSERT INTO `mensajes` VALUES ('1', '2', '2', 'Se ha registrado el Expediente 1/2018', '1', '2018-06-25 10:05:02', null);
INSERT INTO `mensajes` VALUES ('2', '2', '2', 'Se ha registrado el Expediente 2/2018', '1', '2018-06-25 10:07:15', null);
INSERT INTO `mensajes` VALUES ('3', '2', '2', 'Enviaste el Exp. 1/2018 al Secretario  Erika Zughey Peña Llerenas', '0', '2018-06-25 10:08:55', null);
INSERT INTO `mensajes` VALUES ('4', '2', '4', 'Se te ha asignado el Expediente 1/2018', '1', '2018-06-25 10:08:55', null);
INSERT INTO `mensajes` VALUES ('5', '2', '2', 'Enviaste el Exp. 2/2018 al Secretario  Jorge Ricardo Anguiano Barbosa', '0', '2018-06-25 10:17:06', null);
INSERT INTO `mensajes` VALUES ('6', '2', '3', 'Se te ha asignado el Expediente 2/2018', '1', '2018-06-25 10:17:06', null);
INSERT INTO `mensajes` VALUES ('11', '3', '3', 'Enviaste el Exp. 2/2018 al Actuario Lizeth Yemeli Martínez García para notificar', '0', '2018-06-25 13:41:03', null);
INSERT INTO `mensajes` VALUES ('12', '3', '5', 'El Expediente 2/2018 se te ha asignado para Notificar', '1', '2018-06-25 13:41:03', null);

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=174 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('154', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('155', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('156', '2018_01_11_010502_create_role_user_table', '1');
INSERT INTO `migrations` VALUES ('157', '2018_01_12_222726_create_roles_table', '1');
INSERT INTO `migrations` VALUES ('158', '2018_01_31_191902_crear_persona', '1');
INSERT INTO `migrations` VALUES ('159', '2018_01_31_192448_crear_institucion', '1');
INSERT INTO `migrations` VALUES ('160', '2018_01_31_192512_crear_expediente', '1');
INSERT INTO `migrations` VALUES ('161', '2018_01_31_192537_crear_anexopdf', '1');
INSERT INTO `migrations` VALUES ('162', '2018_01_31_192601_crear_involucrados', '1');
INSERT INTO `migrations` VALUES ('163', '2018_01_31_192622_crear_domicilio', '1');
INSERT INTO `migrations` VALUES ('164', '2018_01_31_211241_crear_tipo_seguimiento', '1');
INSERT INTO `migrations` VALUES ('165', '2018_01_31_212203_crear_rol_involucrado', '1');
INSERT INTO `migrations` VALUES ('166', '2018_01_31_213031_crear_tipo_documento', '1');
INSERT INTO `migrations` VALUES ('167', '2018_04_20_063500_create_envios_table', '1');
INSERT INTO `migrations` VALUES ('168', '2018_04_20_071125_create_seguimiento_table', '1');
INSERT INTO `migrations` VALUES ('169', '2018_04_20_073936_create_notificaciones_table', '1');
INSERT INTO `migrations` VALUES ('170', '2018_06_19_152449_create_mensajes', '1');
INSERT INTO `migrations` VALUES ('171', '2018_06_20_153418_create_modulo', '1');
INSERT INTO `migrations` VALUES ('172', '2018_06_20_153735_create_acuerdotipo', '1');
INSERT INTO `migrations` VALUES ('173', '2018_06_20_175101_createtipoexpediente', '1');

-- ----------------------------
-- Table structure for modulo
-- ----------------------------
DROP TABLE IF EXISTS `modulo`;
CREATE TABLE `modulo` (
  `idmodulo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `modulo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Descripcion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idmodulo`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of modulo
-- ----------------------------
INSERT INTO `modulo` VALUES ('1', 'Ciudadano', 'Usuarios Externos al Sistema', '2018-06-20 17:59:46');
INSERT INTO `modulo` VALUES ('2', 'Oficialía de Partes', 'Usuarios Internos', '2018-06-20 17:59:46');
INSERT INTO `modulo` VALUES ('3', 'Secretaría de acuerdos', 'Usuarios Internos', '2018-06-20 17:59:46');
INSERT INTO `modulo` VALUES ('4', 'Actuarios', 'Usuarios Internos', '2018-06-20 17:59:46');
INSERT INTO `modulo` VALUES ('5', 'Proyectista de Sentencias', 'Usuarios Internos', '2018-06-22 06:26:18');
INSERT INTO `modulo` VALUES ('6', 'Magistrado', 'Usuarios Internos', '2018-06-20 17:59:46');
INSERT INTO `modulo` VALUES ('7', 'Amparos', 'Usuarios Internos', '2018-06-20 17:59:46');
INSERT INTO `modulo` VALUES ('8', 'Administrador del sistema', 'Usuarios Internos', '2018-06-20 17:59:46');

-- ----------------------------
-- Table structure for notificaciones
-- ----------------------------
DROP TABLE IF EXISTS `notificaciones`;
CREATE TABLE `notificaciones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_actuario` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `rol` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_exp` int(11) NOT NULL,
  `id_anexo` int(11) NOT NULL,
  `fecha_creacion` timestamp NULL DEFAULT NULL,
  `fecha_solicitud` timestamp NULL DEFAULT NULL,
  `fecha_limite` timestamp NULL DEFAULT NULL,
  `autorizacion` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of notificaciones
-- ----------------------------

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for persona
-- ----------------------------
DROP TABLE IF EXISTS `persona`;
CREATE TABLE `persona` (
  `user_id` int(10) unsigned NOT NULL,
  `curp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `celular` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TipodePersona` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `razon_social` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of persona
-- ----------------------------
INSERT INTO `persona` VALUES ('11', null, '312000000', '3123000000', 'Fisica', null, '2018-06-20 18:01:04', '2018-06-20 18:01:04');
INSERT INTO `persona` VALUES ('13', null, '3121231233', '3123000000', 'Fisica', null, '2018-06-20 18:22:00', '2018-06-20 18:22:00');
INSERT INTO `persona` VALUES ('15', null, '312000000', '3120000000', 'Fisica', null, '2018-06-20 18:28:52', '2018-06-20 18:28:52');
INSERT INTO `persona` VALUES ('16', null, '3121233136', '3123114350', 'Fisica', null, '2018-06-21 02:58:50', '2018-06-21 02:58:50');
INSERT INTO `persona` VALUES ('17', null, '3121231231', '12312312312', 'Fisica', null, '2018-06-22 02:06:08', '2018-06-22 02:06:08');

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('1', 'Administrador', 'Administrador del sistema', '2018-06-20 17:59:44', '2018-06-20 17:59:44');
INSERT INTO `roles` VALUES ('2', 'Oficial de Partes', 'Oficial del partes', '2018-06-20 17:59:44', '2018-06-20 17:59:44');
INSERT INTO `roles` VALUES ('3', 'Secretario de Acuerdos', 'Secretario de acuerdos en la demanda', '2018-06-20 17:59:44', '2018-06-20 17:59:44');
INSERT INTO `roles` VALUES ('4', 'Proyectista', 'Proyectista de sentencias', '2018-06-20 17:59:44', '2018-06-20 17:59:44');
INSERT INTO `roles` VALUES ('5', 'Actuario', 'Actuario de acuerdos', '2018-06-20 17:59:44', '2018-06-20 17:59:44');
INSERT INTO `roles` VALUES ('6', 'Magistrado', 'Magistrado administrador del sistema', '2018-06-20 17:59:44', '2018-06-20 17:59:44');
INSERT INTO `roles` VALUES ('7', 'Usuario', 'Usuario del sistema', '2018-06-20 17:59:44', '2018-06-20 17:59:44');
INSERT INTO `roles` VALUES ('8', 'Amparos', 'Cotejador de amparos', '2018-06-20 17:59:44', '2018-06-20 17:59:44');
INSERT INTO `roles` VALUES ('9', 'Institución', 'Institución publica ', '2018-06-20 17:59:44', '2018-06-20 17:59:44');

-- ----------------------------
-- Table structure for role_user
-- ----------------------------
DROP TABLE IF EXISTS `role_user`;
CREATE TABLE `role_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of role_user
-- ----------------------------
INSERT INTO `role_user` VALUES ('1', '1', '1', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `role_user` VALUES ('2', '2', '2', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `role_user` VALUES ('3', '3', '3', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `role_user` VALUES ('4', '3', '4', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `role_user` VALUES ('5', '5', '5', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `role_user` VALUES ('6', '5', '6', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `role_user` VALUES ('7', '4', '7', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `role_user` VALUES ('8', '4', '8', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `role_user` VALUES ('9', '8', '9', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `role_user` VALUES ('10', '6', '10', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `role_user` VALUES ('11', '7', '11', '2018-06-20 18:01:04', '2018-06-20 18:01:04');
INSERT INTO `role_user` VALUES ('12', '9', '12', '2018-06-20 18:02:57', '2018-06-20 18:02:57');
INSERT INTO `role_user` VALUES ('13', '7', '13', '2018-06-20 18:22:00', '2018-06-20 18:22:00');
INSERT INTO `role_user` VALUES ('14', '9', '14', '2018-06-20 18:27:41', '2018-06-20 18:27:41');
INSERT INTO `role_user` VALUES ('15', '7', '15', '2018-06-20 18:28:52', '2018-06-20 18:28:52');
INSERT INTO `role_user` VALUES ('16', '7', '16', '2018-06-21 02:58:50', '2018-06-21 02:58:50');
INSERT INTO `role_user` VALUES ('17', '7', '17', '2018-06-22 02:06:08', '2018-06-22 02:06:08');

-- ----------------------------
-- Table structure for rolinvolucrado
-- ----------------------------
DROP TABLE IF EXISTS `rolinvolucrado`;
CREATE TABLE `rolinvolucrado` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of rolinvolucrado
-- ----------------------------
INSERT INTO `rolinvolucrado` VALUES ('1', 'Demandado', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `rolinvolucrado` VALUES ('2', 'Demandante', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `rolinvolucrado` VALUES ('3', 'involucrado', '2018-06-20 17:59:45', '2018-06-20 17:59:45');

-- ----------------------------
-- Table structure for seguimiento
-- ----------------------------
DROP TABLE IF EXISTS `seguimiento`;
CREATE TABLE `seguimiento` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_modulo` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `movimiento` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_exp` int(11) NOT NULL,
  `id_anexo` int(11) DEFAULT NULL,
  `id_Tseguimiento` int(11) DEFAULT NULL,
  `comentarios` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of seguimiento
-- ----------------------------
INSERT INTO `seguimiento` VALUES ('1', '2018-06-25 10:05:01', '2', '2', 'Entrada', '1', null, '2', 'ASUNTO: Nulidad de resolución administrativa de CAPDAM');
INSERT INTO `seguimiento` VALUES ('2', '2018-06-25 10:05:01', '2', '2', 'insitu', '1', '1', '15', 'Anexo de documento ');
INSERT INTO `seguimiento` VALUES ('3', '2018-06-25 10:05:01', '2', '2', 'insitu', '1', '2', '15', 'Anexo de documento ');
INSERT INTO `seguimiento` VALUES ('4', '2018-06-25 10:07:15', '2', '2', 'Entrada', '2', null, '2', 'ASUNTO: Nulidad de boleta de infracción');
INSERT INTO `seguimiento` VALUES ('5', '2018-06-25 10:07:15', '2', '2', 'insitu', '2', '3', '15', 'Anexo de documento ');
INSERT INTO `seguimiento` VALUES ('6', '2018-06-25 10:07:15', '2', '2', 'insitu', '2', '4', '15', 'Anexo de documento ');
INSERT INTO `seguimiento` VALUES ('7', '2018-06-25 10:07:15', '2', '2', 'insitu', '2', '5', '15', 'Anexo de documento ');
INSERT INTO `seguimiento` VALUES ('8', '2018-06-25 10:07:15', '2', '2', 'insitu', '2', '6', '15', 'Anexo de documento ');
INSERT INTO `seguimiento` VALUES ('9', '2018-06-25 00:00:00', '2', '2', 'Salida', '1', null, '3', 'Llegó el 8 de enero de 2018');
INSERT INTO `seguimiento` VALUES ('10', '2018-06-25 00:00:00', '3', '4', 'Entrada', '1', null, '3', 'Llegó el 8 de enero de 2018');
INSERT INTO `seguimiento` VALUES ('11', '2018-06-25 00:00:00', '2', '2', 'Salida', '2', null, '3', 'Llegó el 09 de enero de 2018');
INSERT INTO `seguimiento` VALUES ('12', '2018-06-25 00:00:00', '3', '3', 'Entrada', '2', null, '3', 'Llegó el 09 de enero de 2018');
INSERT INTO `seguimiento` VALUES ('15', '2018-06-25 11:13:00', '3', '3', 'Salida', '2', null, '7', 'Se turna el Expediente al Actuario para Notificar');
INSERT INTO `seguimiento` VALUES ('16', '2018-06-25 11:13:00', '4', '5', 'Entrada', '2', null, '7', 'Se recibe el Expediente para Notificar');
INSERT INTO `seguimiento` VALUES ('17', '2018-06-25 12:06:42', '3', '4', 'insitu', '1', '10', '6', 'Anexo de Documento');
INSERT INTO `seguimiento` VALUES ('20', '2018-06-25 13:33:02', '3', '3', 'insitu', '2', '11', '6', 'Anexo de Documento');
INSERT INTO `seguimiento` VALUES ('21', '2018-06-25 13:41:03', '3', '3', 'Salida', '2', null, '7', 'Se turna el Expediente al Actuario para Notificar');
INSERT INTO `seguimiento` VALUES ('22', '2018-06-25 13:41:03', '4', '5', 'Entrada', '2', null, '7', 'Se recibe el Expediente para Notificar');

-- ----------------------------
-- Table structure for tipoexpediente
-- ----------------------------
DROP TABLE IF EXISTS `tipoexpediente`;
CREATE TABLE `tipoexpediente` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of tipoexpediente
-- ----------------------------
INSERT INTO `tipoexpediente` VALUES ('1', 'Nulidad');
INSERT INTO `tipoexpediente` VALUES ('2', 'Resoponsabilidad Patrimonial');
INSERT INTO `tipoexpediente` VALUES ('3', 'Afirmativa Ficta');
INSERT INTO `tipoexpediente` VALUES ('4', 'Negativa Ficta');
INSERT INTO `tipoexpediente` VALUES ('5', 'Responsabilidad Adminstrativa Grave');

-- ----------------------------
-- Table structure for tiposeguimiento
-- ----------------------------
DROP TABLE IF EXISTS `tiposeguimiento`;
CREATE TABLE `tiposeguimiento` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of tiposeguimiento
-- ----------------------------
INSERT INTO `tiposeguimiento` VALUES ('1', ' Demanda creada', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `tiposeguimiento` VALUES ('2', 'Validado por el Oficial de Partes', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `tiposeguimiento` VALUES ('3', 'Se turna el expediente al Secretario de Acuerdo', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `tiposeguimiento` VALUES ('4', 'El expediente se desecha por incompetencia, por lo que se turna a la autoridad competente ', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `tiposeguimiento` VALUES ('5', 'El expediente se desecha art. 31', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `tiposeguimiento` VALUES ('6', 'El expediente se admite', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `tiposeguimiento` VALUES ('7', 'Se turna al Actuario para su notificación', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `tiposeguimiento` VALUES ('8', 'Se envía notificación', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `tiposeguimiento` VALUES ('9', 'Se agrega promoción al expediente', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `tiposeguimiento` VALUES ('10', 'Se rechaza la promoción', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `tiposeguimiento` VALUES ('11', 'Se turna a proyectista para elaboración del proyecto', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `tiposeguimiento` VALUES ('12', 'En elaboración de proyecto', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `tiposeguimiento` VALUES ('13', 'Proyecto elaborado, en espera de sentencia', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `tiposeguimiento` VALUES ('14', 'Sentencia', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `tiposeguimiento` VALUES ('15', 'Se agrego documento', '2018-06-20 17:59:45', '2018-06-20 17:59:45');

-- ----------------------------
-- Table structure for tipo_documento
-- ----------------------------
DROP TABLE IF EXISTS `tipo_documento`;
CREATE TABLE `tipo_documento` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rol_usuario` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of tipo_documento
-- ----------------------------
INSERT INTO `tipo_documento` VALUES ('1', ' Promoción', '2', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `tipo_documento` VALUES ('2', 'Escritura Pública', '2', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `tipo_documento` VALUES ('3', 'Demanda', '2', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `tipo_documento` VALUES ('4', 'Nombramiento', '2', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `tipo_documento` VALUES ('5', 'Recibo de Nómina', '2', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `tipo_documento` VALUES ('6', 'Resolución', '2', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `tipo_documento` VALUES ('7', 'Boleta de Infracción', '2', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `tipo_documento` VALUES ('8', 'Copia Certificada', '2', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `tipo_documento` VALUES ('9', 'Expediente', '2', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `tipo_documento` VALUES ('10', 'Constancia de Notificación', '2', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `tipo_documento` VALUES ('11', 'Oficio', '2', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `tipo_documento` VALUES ('12', 'Concesión', '2', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `tipo_documento` VALUES ('13', 'Acuerdo', '2', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `tipo_documento` VALUES ('14', 'Sentencia', '2', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `tipo_documento` VALUES ('15', 'Proyecto', '2', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `tipo_documento` VALUES ('16', 'Poder para Pleitos y Cobranzas', '2', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `tipo_documento` VALUES ('17', 'Amparo', '2', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `tipo_documento` VALUES ('18', 'Otros', '2', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `tipo_documento` VALUES ('19', 'Anexos', '2', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `tipo_documento` VALUES ('20', 'Admite', '3', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `tipo_documento` VALUES ('21', 'Contestación', '3', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `tipo_documento` VALUES ('22', 'Requiere', '3', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `tipo_documento` VALUES ('23', 'Desecha', '3', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `tipo_documento` VALUES ('24', 'Incompetencia', '3', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `tipo_documento` VALUES ('25', 'Pruebas y Alegatos', '3', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `tipo_documento` VALUES ('26', 'Termino para Ampliación', '3', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `tipo_documento` VALUES ('27', 'Turnar a Sentencia', '3', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `tipo_documento` VALUES ('28', 'Audiencia de Pruebas y Alegatos', '3', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `tipo_documento` VALUES ('29', 'Requiriendo el Cumplimiento de Sentencia', '3', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `tipo_documento` VALUES ('30', 'Sentencia Cumplida', '3', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `tipo_documento` VALUES ('31', 'Otros', '3', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `tipo_documento` VALUES ('32', 'Promoción', '3', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `tipo_documento` VALUES ('33', 'Escritura Pública', '3', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `tipo_documento` VALUES ('34', 'Demanda', '3', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `tipo_documento` VALUES ('35', 'Nombramiento', '3', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `tipo_documento` VALUES ('36', 'Recibo de Nómina', '3', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `tipo_documento` VALUES ('37', 'Resolución', '3', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `tipo_documento` VALUES ('38', 'Boleta de Infracción', '3', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `tipo_documento` VALUES ('39', 'Copia Certificada', '3', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `tipo_documento` VALUES ('40', 'Expediente', '3', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `tipo_documento` VALUES ('41', 'Constancia de Notificación', '3', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `tipo_documento` VALUES ('42', 'Oficio', '3', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `tipo_documento` VALUES ('43', 'Concesión', '3', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `tipo_documento` VALUES ('44', 'Acuerdo', '3', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `tipo_documento` VALUES ('45', 'Sentencia', '3', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `tipo_documento` VALUES ('46', 'Proyecto', '3', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `tipo_documento` VALUES ('47', 'Poder para Pleitos y Cobranzas', '3', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `tipo_documento` VALUES ('48', 'Amparo', '3', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `tipo_documento` VALUES ('49', 'Acta de Notificación', '3', '2018-06-20 17:59:45', '2018-06-20 17:59:45');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_paterno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_materno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Admin', 'andres', ' ', 'dreamsroom3@gmail.com', '$2y$10$feJqSIujDuVy22JMp3O5yeMDJfDLYVG2zGRH0hB4qMMHwG7m.Sg3m', '/img/basic/mrsmith.png', null, '2018-06-20 17:59:44', '2018-06-20 17:59:44');
INSERT INTO `users` VALUES ('2', 'Gabriela Alitzet', 'García', 'Márquez', 'oficialpartes@sisede.tcacolima.com', '$2y$10$JIUsVMP/JfPet0idMQo1I.utAaBTSYrhT2zigOOgl/sSkzjzGYlpa', '/img/basic/fem-avatar.png', 'zbGTXjQU64MsT3CCmzhFNqLUkpCheFOCTSSIqsClrmAyMnmcWJ2acmTPFZ0P', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `users` VALUES ('3', 'Jorge Ricardo', 'Anguiano', 'Barbosa', 'sacuerdo1@sisede.tcacolima.com', '$2y$10$Xr8xN0tAwDio29jIf8Q1B.27ZTuwMdTXBtwADtCJL3FHCfADjskia', '/img/3/LicJorge.jpg', 'E1pR7Ad0FQLu5M7S6fPliYZTvVD6pCJ6QWP0KXl2RnsKBfeaSAsPGiMFUjJ4', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `users` VALUES ('4', 'Erika Zughey', 'Peña', 'Llerenas', 'sacuerdo2@sisede.tcacolima.com', '$2y$10$9LiV20oio6NpEezbZeopMOvmA7HT3FaVCgwx61qrJgu8DBxfPswze', '/img/4/LicErika.jpg', 'iKOW1z1DCQIj9zf1IkOJ7etJppxVl1c7k9Zlk3gWC7pqiiltFSlmAPgL7bOU', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `users` VALUES ('5', 'Lizeth Yemeli', 'Martínez', 'García', 'actuaria1@sisede.tcacolima.com', '$2y$10$gykNSI5vUrLfruDwDPfhfu8J5Iej/ZvAMDk.uWwKrRH9OtpXGGDDO', '/img/5/actu1.jpg', 'EH1Ew7CnqrdisTgsBARWeKNjg8wCUetSx9c7lUGmbSjCzJKdqZPT7tabcwxp', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `users` VALUES ('6', 'Adriana Vanessa', 'Pérez', 'Mestas', 'actuaria2@sisede.tcacolima.com', '$2y$10$9EaspkpRuPDVMFF1kMsSYu0TLd7R5aJuNmtlkIPHBU/h9H7fvcySO', '/img/6/actu2.jpg', 'hN23JLpPs2YnxWxx2NaNQmrnyAC9iCXxLvmbvvKk4GvEK0YzrCDH1dM4nBwq', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `users` VALUES ('7', 'Proyectista', 'N°', ' 1 ', 'proyectista@sisede.tcacolima.com', '$2y$10$r2cTk3Z0JnosHtZ.8sWhwen7KetBYKshBJaF7z1zM/0Jf2VgXW6DS', '/img/basic/fem-avatar.png', null, '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `users` VALUES ('8', 'Proyectista ', 'N°', ' 2 ', 'proyectista2@sisede.tcacolima.com', '$2y$10$7pbmPfNJ/HOudWpXrHBdBu9b3SUbn7tmeSP4Vv6YyisEyZSOu.Iu6', '/img/basic/avatar.png', null, '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `users` VALUES ('9', 'Amparos', 'N°', ' 1 ', 'amparos@sisede.tcacolima.com', '$2y$10$GxLawt6i6sAk62X6zcLoIuh/WDYQgKcrAZDB9Gr4hQjm3Mr3ugfk6', '/img/basic/avatar.png', null, '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `users` VALUES ('10', 'René', 'Rodríguez', 'Alcaraz', 'magistrado@sisede.tcacolima.com', '$2y$10$pIJLTbUHIuNg24GKWKvwGuLPNXcisdocU5wmVMUZvcnJX7hPAQ5NS', '/img/10/licrene.png', 'XJDu6nANjw6wzDjueCR7IdyIwmy71WTgOeLtgsHYxyaAQBsAV3HU1gGB07sb', '2018-06-20 17:59:45', '2018-06-20 17:59:45');
INSERT INTO `users` VALUES ('11', 'Omar Roberto', 'Moran', 'Cervantes', 'mail1@gmail.com', '$2y$10$mGMOQWnLD7Kuk68TgOm5S.Lk4nODHr.oQMTaWp00aXMnjTZilL1tG', '/img/basic/avatar.png', null, '2018-06-20 18:01:04', '2018-06-20 18:01:04');
INSERT INTO `users` VALUES ('12', 'Daniel', 'Cortes', 'Carrillo', 'capdam@hotmail.com', '$2y$10$OvOMudXHIwguj5iDDfQQF.8lsjP6ZcHMe6gEsIAHHHVoSG2m2pwqq', '/img/basic/avatar.png', null, '2018-06-20 18:02:57', '2018-06-20 18:02:57');
INSERT INTO `users` VALUES ('13', 'Salvador', 'Ochoa', 'Estrada', 'mail2@gmail.com', '$2y$10$YqHl4T0//4VujPL5AQAN7O5HApcCw66j1FwbSk55kfpRm4yxbPVx2', '/img/basic/avatar.png', null, '2018-06-20 18:22:00', '2018-06-20 18:22:00');
INSERT INTO `users` VALUES ('14', 'Roberto', 'García', 'Avedaño', 'transitocolima@colima.gob.mx', '$2y$10$CJrHXZt/2p02ZVYaIS8sd.EjGN6ep67r1MsRtyIuFSCqyAcrewmjO', '/img/basic/avatar.png', null, '2018-06-20 18:27:41', '2018-06-20 18:27:41');
INSERT INTO `users` VALUES ('15', 'Christian Gerardo', 'Velazco', 'Valdadez', 'mail3@gmail.com', '$2y$10$xyvX6cAhw6zp.jjGhUo8yucBhTtYsIW2ZIbeXvxFa2ELAQ3dhi1Bu', '/img/basic/avatar.png', null, '2018-06-20 18:28:52', '2018-06-20 18:28:52');
INSERT INTO `users` VALUES ('16', 'Andrés', 'Hernández', 'Jiménez', 'mai4@gmail.com', '$2y$10$iHdCq.P34ngZg2tNFUh7JesUnlAjNRXYggfodXqpXXcne89ATEXLm', '/img/basic/avatar.png', null, '2018-06-21 02:58:50', '2018-06-21 02:58:50');
INSERT INTO `users` VALUES ('17', 'Miguel', 'Hernández', 'Jiménez', 'mail5@gmail.com', '$2y$10$QipcwOkCneGiIemTuKUCquv.fd7sMJ5eVbZvSDCfwfCnodPL0zRVu', '/img/basic/avatar.png', 'aLPybufBIQAkjeJkdintpC71wuLCKE0KthC5ayvwactgUJEJaEmTVAr0qjUf', '2018-06-22 02:06:08', '2018-06-25 04:58:30');

-- ----------------------------
-- View structure for sacuerdos1
-- ----------------------------
DROP VIEW IF EXISTS `sacuerdos1`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sacuerdos1` AS (select `e`.`id` AS `id_expediente`,`e`.`expediente` AS `expediente`,date_format(`e`.`fecha`,'%d-%m-%Y %T') AS `fechasis`,`pdo`.`id` AS `id_razonsocial`,`pdo`.`razon_social` AS `Demandado`,`pde`.`id` AS `id_demandante`,`pde`.`Nombre` AS `Demandante`,`e`.`descripcion` AS `Resumen`,`en`.`fecha` AS `FechaEnvio`,`en`.`id_receptor` AS `id_receptor` from (((`expediente` `e` join `v_usuarios` `pde` on((`pde`.`id` = `e`.`id_demandante`))) join `v_usuarios` `pdo` on((`pdo`.`id` = `e`.`id_demandado`))) join `envios` `en` on((`en`.`id_exp` = `e`.`id`))) where (`e`.`status` = 1) group by `e`.`id` order by `e`.`expediente` desc) ;

-- ----------------------------
-- View structure for trackseguimiento
-- ----------------------------
DROP VIEW IF EXISTS `trackseguimiento`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `trackseguimiento` AS (select `e`.`id` AS `id`,date_format(`s`.`fecha`,'%d-%m-%Y ') AS `fechasis`,`e`.`expediente` AS `expediente`,if(isnull(`ap`.`Folio`),'',`ap`.`Folio`) AS `Folio`,`ap`.`PathAnexo` AS `PathAnexo`,`ap`.`NomFile` AS `NomFile`,`s`.`movimiento` AS `movimiento`,`act`.`Tipo` AS `Tipox`,`ts`.`tipo` AS `Tipo`,if(isnull(`act`.`Tipo`),'',`act`.`Tipo`) AS `IF (act.Tipo IS NULL, "", act.Tipo)`,`m`.`modulo` AS `modulo`,concat(`u`.`nombre`,' ',`u`.`a_paterno`,' ',`u`.`a_materno`) AS `Responsable`,if(isnull(`s`.`comentarios`),'',`s`.`comentarios`) AS `Comentarios` from ((((((`seguimiento` `s` join `modulo` `m` on((`m`.`idmodulo` = `s`.`id_modulo`))) join `users` `u` on((`u`.`id` = `s`.`id_persona`))) left join `expediente` `e` on((`e`.`id` = `s`.`id_exp`))) left join `tiposeguimiento` `ts` on((`ts`.`id` = `s`.`id_Tseguimiento`))) left join `anexopdf` `ap` on((`ap`.`id` = `s`.`id_anexo`))) left join `acuerdotipo` `act` on((`act`.`id` = `ap`.`id_Tipo`)))) ;

-- ----------------------------
-- View structure for v_entrada1
-- ----------------------------
DROP VIEW IF EXISTS `v_entrada1`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_entrada1` AS select `seguimiento`.`id_exp` AS `id_exp`,`seguimiento`.`fecha` AS `entrada` from `seguimiento` where ((`seguimiento`.`id_modulo` = 2) and (`seguimiento`.`movimiento` = 'Entrada')) ;

-- ----------------------------
-- View structure for v_entrada2
-- ----------------------------
DROP VIEW IF EXISTS `v_entrada2`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_entrada2` AS select `seguimiento`.`id_exp` AS `id_exp`,`seguimiento`.`fecha` AS `entrada` from `seguimiento` where ((`seguimiento`.`id_modulo` = 3) and (`seguimiento`.`movimiento` = 'Entrada')) ;

-- ----------------------------
-- View structure for v_entradasalida1
-- ----------------------------
DROP VIEW IF EXISTS `v_entradasalida1`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_entradasalida1` AS select `a`.`id_exp` AS `id_exp`,(to_days(`b`.`salida`) - to_days(`a`.`entrada`)) AS `tiempo` from (`v_entrada1` `a` join `v_salidas1` `b` on((`a`.`id_exp` = `b`.`id_exp`))) union select `seguimiento`.`id_exp` AS `id_exp`,(to_days(now()) - to_days(`seguimiento`.`fecha`)) AS `tiempo` from `seguimiento` where ((`seguimiento`.`id_modulo` = 2) and (`seguimiento`.`movimiento` = 'Entrada') and (not(`seguimiento`.`id_exp` in (select `seguimiento`.`id_exp` from `seguimiento` where ((`seguimiento`.`id_modulo` = 3) and (`seguimiento`.`movimiento` = 'Entrada')))))) ;

-- ----------------------------
-- View structure for v_entradasalida2
-- ----------------------------
DROP VIEW IF EXISTS `v_entradasalida2`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_entradasalida2` AS select `a`.`id_exp` AS `id_exp`,(to_days(`b`.`salida`) - to_days(`a`.`entrada`)) AS `tiempo` from (`v_entrada1` `a` join `v_salidas1` `b` on((`a`.`id_exp` = `b`.`id_exp`))) where `a`.`id_exp` in (select `seguimiento`.`id_exp` from `seguimiento` where ((`seguimiento`.`id_modulo` = 4) and (`seguimiento`.`movimiento` = 'entrada'))) union select `seguimiento`.`id_exp` AS `id_exp`,(to_days(now()) - to_days(`seguimiento`.`fecha`)) AS `tiempo` from `seguimiento` where ((`seguimiento`.`id_modulo` = 3) and (`seguimiento`.`movimiento` = 'Entrada') and (not(`seguimiento`.`id_exp` in (select `seguimiento`.`id_exp` from `seguimiento` where ((`seguimiento`.`id_modulo` = 4) and (`seguimiento`.`movimiento` = 'Entrada')))))) ;

-- ----------------------------
-- View structure for v_exp1
-- ----------------------------
DROP VIEW IF EXISTS `v_exp1`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_exp1` AS select distinct `e`.`id` AS `id`,`e`.`expediente` AS `expediente`,cast(`e`.`fecha` as date) AS `fecha`,`d`.`razon_social` AS `rdemandado`,`d1`.`Nombre` AS `demandante`,`d1`.`razon_social` AS `rdemandante`,`e`.`descripcion` AS `resumen`,`e`.`status` AS `status`,`u`.`avatar` AS `avatar`,`e`.`serie` AS `serie`,concat(`u`.`nombre`,' ',`u`.`a_paterno`,' ',`u`.`a_materno`) AS `oficiales` from ((((`expediente` `e` join `v_usuarios` `d` on((`d`.`id` = `e`.`id_demandado`))) join `v_usuarios` `d1` on((`d1`.`id` = `e`.`id_demandante`))) join `seguimiento` `s` on((`s`.`id_exp` = `e`.`id`))) left join `users` `u` on((`u`.`id` = `s`.`id_persona`))) where ((`s`.`id_modulo` = 4) and (`s`.`movimiento` = 'Entrada')) union select `e`.`id` AS `id`,`e`.`expediente` AS `expediente`,cast(`e`.`fecha` as date) AS `fecha`,`d`.`razon_social` AS `rdemandado`,`d1`.`Nombre` AS `demandante`,`d1`.`razon_social` AS `rdemandante`,`e`.`descripcion` AS `resumen`,`e`.`status` AS `status`,`u`.`avatar` AS `avatar`,`e`.`serie` AS `serie`,concat(`u`.`nombre`,' ',`u`.`a_paterno`,' ',`u`.`a_materno`) AS `oficiales` from ((((`expediente` `e` join `v_usuarios` `d` on((`d`.`id` = `e`.`id_demandado`))) join `v_usuarios` `d1` on((`d1`.`id` = `e`.`id_demandante`))) join `seguimiento` `s` on((`s`.`id_exp` = `e`.`id`))) left join `users` `u` on((`u`.`id` = `s`.`id_persona`))) where ((`s`.`id_modulo` = 3) and (`s`.`movimiento` = 'Entrada') and (not(`e`.`id` in (select `e`.`id` from (`expediente` `e` join `seguimiento` `s` on((`e`.`id` = `s`.`id_exp`))) where ((`s`.`id_modulo` = 4) and (`s`.`movimiento` = 'Entrada')))))) ;

-- ----------------------------
-- View structure for v_exp2
-- ----------------------------
DROP VIEW IF EXISTS `v_exp2`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_exp2` AS select distinct `e`.`id` AS `id`,`e`.`expediente` AS `expediente`,cast(`e`.`fecha` as date) AS `fecha`,`d`.`razon_social` AS `rdemandado`,`d1`.`Nombre` AS `demandante`,`d1`.`razon_social` AS `rdemandante`,`e`.`descripcion` AS `resumen`,`e`.`status` AS `status`,`u`.`avatar` AS `avatar`,`e`.`serie` AS `serie`,concat(`u`.`nombre`,' ',`u`.`a_paterno`,' ',`u`.`a_materno`) AS `oficiales` from ((((`expediente` `e` join `v_usuarios` `d` on((`d`.`id` = `e`.`id_demandado`))) join `v_usuarios` `d1` on((`d1`.`id` = `e`.`id_demandante`))) join `seguimiento` `s` on((`s`.`id_exp` = `e`.`id`))) left join `users` `u` on((`u`.`id` = `s`.`id_persona`))) where ((`s`.`id_modulo` = 4) and (`s`.`movimiento` = 'Entrada')) union select `e`.`id` AS `id`,`e`.`expediente` AS `expediente`,cast(`e`.`fecha` as date) AS `fecha`,`d`.`razon_social` AS `rdemandado`,`d1`.`Nombre` AS `demandante`,`d1`.`razon_social` AS `rdemandante`,`e`.`descripcion` AS `resumen`,`e`.`status` AS `status`,`u`.`avatar` AS `avatar`,`e`.`serie` AS `serie`,concat(`u`.`nombre`,' ',`u`.`a_paterno`,' ',`u`.`a_materno`) AS `oficiales` from ((((`expediente` `e` join `v_usuarios` `d` on((`d`.`id` = `e`.`id_demandado`))) join `v_usuarios` `d1` on((`d1`.`id` = `e`.`id_demandante`))) join `seguimiento` `s` on((`s`.`id_exp` = `e`.`id`))) left join `users` `u` on((`u`.`id` = `s`.`id_persona`))) where ((`s`.`id_modulo` = 4) and (`s`.`movimiento` = 'Entrada') and (not(`e`.`id` in (select `e`.`id` from (`expediente` `e` join `seguimiento` `s` on((`e`.`id` = `s`.`id_exp`))) where ((`s`.`id_modulo` = 5) and (`s`.`movimiento` = 'Entrada')))))) ;

-- ----------------------------
-- View structure for v_expedientes
-- ----------------------------
DROP VIEW IF EXISTS `v_expedientes`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_expedientes` AS select distinct `e`.`id` AS `id`,`e`.`expediente` AS `expediente`,cast(`e`.`fecha` as date) AS `fecha`,`d`.`razon_social` AS `rdemandado`,`d1`.`Nombre` AS `demandante`,`d1`.`razon_social` AS `rdemandante`,`e`.`descripcion` AS `resumen`,`e`.`status` AS `status`,`u`.`avatar` AS `avatar`,`e`.`serie` AS `serie`,concat(`u`.`nombre`,' ',`u`.`a_paterno`,' ',`u`.`a_materno`) AS `oficiales` from ((((`expediente` `e` join `v_usuarios` `d` on((`d`.`id` = `e`.`id_demandado`))) join `v_usuarios` `d1` on((`d1`.`id` = `e`.`id_demandante`))) join `seguimiento` `s` on((`s`.`id_exp` = `e`.`id`))) left join `users` `u` on((`u`.`id` = `s`.`id_persona`))) where ((`s`.`id_modulo` = 3) and (`s`.`movimiento` = 'Entrada')) union select `e`.`id` AS `id`,`e`.`expediente` AS `expediente`,cast(`e`.`fecha` as date) AS `fecha`,`d`.`razon_social` AS `rdemandado`,`d1`.`Nombre` AS `demandante`,`d1`.`razon_social` AS `rdemandante`,`e`.`descripcion` AS `resumen`,`e`.`status` AS `status`,`u`.`avatar` AS `avatar`,`e`.`serie` AS `serie`,concat(`u`.`nombre`,' ',`u`.`a_paterno`,' ',`u`.`a_materno`) AS `oficiales` from ((((`expediente` `e` join `v_usuarios` `d` on((`d`.`id` = `e`.`id_demandado`))) join `v_usuarios` `d1` on((`d1`.`id` = `e`.`id_demandante`))) join `seguimiento` `s` on((`s`.`id_exp` = `e`.`id`))) left join `users` `u` on((`u`.`id` = `s`.`id_persona`))) where ((`s`.`id_modulo` = 2) and (`s`.`movimiento` = 'Entrada') and (not(`e`.`id` in (select `e`.`id` from (`expediente` `e` join `seguimiento` `s` on((`e`.`id` = `s`.`id_exp`))) where ((`s`.`id_modulo` = 3) and (`s`.`movimiento` = 'Entrada')))))) ;

-- ----------------------------
-- View structure for v_expedientes2
-- ----------------------------
DROP VIEW IF EXISTS `v_expedientes2`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_expedientes2` AS select `v_exp1`.`id` AS `id`,`v_exp1`.`expediente` AS `expediente`,`v_exp1`.`fecha` AS `fecha`,`v_exp1`.`rdemandado` AS `rdemandado`,`v_exp1`.`demandante` AS `demandante`,`v_exp1`.`rdemandante` AS `rdemandante`,`v_exp1`.`resumen` AS `resumen`,`v_exp1`.`status` AS `status`,`v_exp1`.`avatar` AS `avatar`,`v_exp1`.`serie` AS `serie`,`v_exp1`.`oficiales` AS `oficiales` from `v_exp1` union select `e`.`id` AS `id`,`e`.`expediente` AS `expediente`,cast(`e`.`fecha` as date) AS `fecha`,`d`.`razon_social` AS `rdemandado`,`d1`.`Nombre` AS `demandante`,`d1`.`razon_social` AS `rdemandante`,`e`.`descripcion` AS `resumen`,`e`.`status` AS `status`,`u`.`avatar` AS `avatar`,`e`.`serie` AS `serie`,concat(`u`.`nombre`,' ',`u`.`a_paterno`,' ',`u`.`a_materno`) AS `oficiales` from ((((`expediente` `e` join `v_usuarios` `d` on((`d`.`id` = `e`.`id_demandado`))) join `v_usuarios` `d1` on((`d1`.`id` = `e`.`id_demandante`))) join `seguimiento` `s` on((`s`.`id_exp` = `e`.`id`))) left join `users` `u` on((`u`.`id` = `s`.`id_persona`))) where ((`s`.`id_modulo` = 3) and (`s`.`movimiento` = 'Entrada') and (not(`e`.`id` in (select `v_exp1`.`id` from `v_exp1`)))) ;

-- ----------------------------
-- View structure for v_expedientes3
-- ----------------------------
DROP VIEW IF EXISTS `v_expedientes3`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_expedientes3` AS select `v_exp2`.`id` AS `id`,`v_exp2`.`expediente` AS `expediente`,`v_exp2`.`fecha` AS `fecha`,`v_exp2`.`rdemandado` AS `rdemandado`,`v_exp2`.`demandante` AS `demandante`,`v_exp2`.`rdemandante` AS `rdemandante`,`v_exp2`.`resumen` AS `resumen`,`v_exp2`.`status` AS `status`,`v_exp2`.`avatar` AS `avatar`,`v_exp2`.`serie` AS `serie`,`v_exp2`.`oficiales` AS `oficiales` from `v_exp2` union select `e`.`id` AS `id`,`e`.`expediente` AS `expediente`,cast(`e`.`fecha` as date) AS `fecha`,`d`.`razon_social` AS `rdemandado`,`d1`.`Nombre` AS `demandante`,`d1`.`razon_social` AS `rdemandante`,`e`.`descripcion` AS `resumen`,`e`.`status` AS `status`,`u`.`avatar` AS `avatar`,`e`.`serie` AS `serie`,concat(`u`.`nombre`,' ',`u`.`a_paterno`,' ',`u`.`a_materno`) AS `oficiales` from ((((`expediente` `e` join `v_usuarios` `d` on((`d`.`id` = `e`.`id_demandado`))) join `v_usuarios` `d1` on((`d1`.`id` = `e`.`id_demandante`))) join `seguimiento` `s` on((`s`.`id_exp` = `e`.`id`))) left join `users` `u` on((`u`.`id` = `s`.`id_persona`))) where ((`s`.`id_modulo` = 4) and (`s`.`movimiento` = 'Entrada') and (not(`e`.`id` in (select `v_exp1`.`id` from `v_exp1`)))) ;

-- ----------------------------
-- View structure for v_folio
-- ----------------------------
DROP VIEW IF EXISTS `v_folio`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_folio` AS (select `a`.`id_Expediente` AS `Fexpediente`,`a`.`Folio` AS `Folio`,cast(substring_index(`a`.`Folio`,'_',-(1)) as signed) AS `num` from (`expediente` `e` join `anexopdf` `a` on((`e`.`id` = `a`.`id_Expediente`))) order by cast(substring_index(`a`.`Folio`,'_',-(1)) as signed) desc) ;

-- ----------------------------
-- View structure for v_razones
-- ----------------------------
DROP VIEW IF EXISTS `v_razones`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_razones` AS (select `persona`.`user_id` AS `user_id`,`persona`.`razon_social` AS `razon_social` from `persona`) union (select `institucion`.`user_id` AS `user_id`,`institucion`.`razon_social` AS `razon_social` from `institucion`) ;

-- ----------------------------
-- View structure for v_salidas1
-- ----------------------------
DROP VIEW IF EXISTS `v_salidas1`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_salidas1` AS select `seguimiento`.`id_exp` AS `id_exp`,`seguimiento`.`fecha` AS `salida` from `seguimiento` where ((`seguimiento`.`id_modulo` = 3) and (`seguimiento`.`movimiento` = 'Entrada')) ;

-- ----------------------------
-- View structure for v_salidas2
-- ----------------------------
DROP VIEW IF EXISTS `v_salidas2`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_salidas2` AS select `seguimiento`.`id_exp` AS `id_exp`,`seguimiento`.`fecha` AS `salida` from `seguimiento` where ((`seguimiento`.`id_modulo` = 4) and (`seguimiento`.`movimiento` = 'Entrada')) ;

-- ----------------------------
-- View structure for v_seguimiento
-- ----------------------------
DROP VIEW IF EXISTS `v_seguimiento`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_seguimiento` AS (select `e`.`id` AS `id_expediente`,`e`.`expediente` AS `expediente`,date_format(`e`.`fecha`,'%d-%m-%Y') AS `fechasis`,`pdo`.`id` AS `id_razonsocial`,`pdo`.`razon_social` AS `Demandado`,`pde`.`id` AS `id_demandante`,`pde`.`Nombre` AS `Demandante`,`e`.`descripcion` AS `Resumen`,year(`e`.`fecha`) AS `anio` from ((`expediente` `e` join `v_usuarios` `pde` on((`pde`.`id` = `e`.`id_demandante`))) join `v_usuarios` `pdo` on((`pdo`.`id` = `e`.`id_demandado`))) group by `e`.`id`,`Demandado` order by `e`.`expediente` desc) ;

-- ----------------------------
-- View structure for v_seguimiento2
-- ----------------------------
DROP VIEW IF EXISTS `v_seguimiento2`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_seguimiento2` AS (select `v`.`id_expediente` AS `id_expediente`,`v`.`expediente` AS `expediente`,`v`.`fechasis` AS `fechasis`,`v`.`id_razonsocial` AS `id_razonsocial`,`v`.`Demandado` AS `demandado`,`v`.`Demandante` AS `demandante`,`v`.`Resumen` AS `resumen`,date_format(`s`.`fecha`,'%d-%m-%Y') AS `FechaEnvio` from (`v_seguimiento` `v` join `seguimiento` `s` on((`v`.`id_expediente` = `s`.`id_exp`))) where `s`.`id` in (select distinct `seguimiento`.`id` from `seguimiento` where (`seguimiento`.`movimiento` = 'Salida'))) ;

-- ----------------------------
-- View structure for v_usuarios
-- ----------------------------
DROP VIEW IF EXISTS `v_usuarios`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_usuarios` AS select `u`.`id` AS `id`,concat(`u`.`nombre`,' ',`u`.`a_paterno`,' ',`u`.`a_materno`) AS `Nombre`,`vr`.`razon_social` AS `razon_social` from (`users` `u` join `v_razones` `vr` on((`u`.`id` = `vr`.`user_id`))) ;
