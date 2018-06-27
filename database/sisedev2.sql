/*
Navicat MySQL Data Transfer

Source Server         : Mysql
Source Server Version : 50720
Source Host           : 127.0.0.1:3306
Source Database       : sisedev2

Target Server Type    : MYSQL
Target Server Version : 50720
File Encoding         : 65001

Date: 2018-05-23 21:52:40
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for acuerdotipo
-- ----------------------------
DROP TABLE IF EXISTS `acuerdotipo`;
CREATE TABLE `acuerdotipo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Tipo` longtext NOT NULL COMMENT 'Son todos los acuerdos que el SA realiza los siguientes acuerdos son:\nAdmite\nContestación\nRequiere\nDesecha\nIncompetencia\nPleitos y Alegatos\nTermino para Ampliación \nTurnar a Sentencia\nAudiencia de Pruebas y alegatos\nRequiriendo el cumplimiento de senten',
  `Descripción` varchar(45) DEFAULT NULL COMMENT 'Describe el ACUERDO',
  `Tiempo` int(11) DEFAULT NULL COMMENT 'Tiempo en el cual se deben acatar los acuerdos (expresados en Dias).',
  `nivels` int(11) DEFAULT NULL COMMENT '1: Usuarios externos e internos\n2: Solamente usuarios internos.',
  `status` int(11) DEFAULT NULL COMMENT '0:activo\n1:borrado',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of acuerdotipo
-- ----------------------------
INSERT INTO `acuerdotipo` VALUES ('1', 'Admite', 'ARTÍCULO 32.- Admitida la demanda, se correr', null, '2', '0');
INSERT INTO `acuerdotipo` VALUES ('2', 'Contestación', null, null, '2', '0');
INSERT INTO `acuerdotipo` VALUES ('3', 'Requiere', null, null, '2', '0');
INSERT INTO `acuerdotipo` VALUES ('4', 'Desecha', null, null, '2', '0');
INSERT INTO `acuerdotipo` VALUES ('5', 'Incompetencia', null, null, '2', '0');
INSERT INTO `acuerdotipo` VALUES ('6', 'Pruebas y Alegatos', null, null, '2', '0');
INSERT INTO `acuerdotipo` VALUES ('7', 'Termino para Ampliación ', null, null, '2', '0');
INSERT INTO `acuerdotipo` VALUES ('8', 'Turnar a Sentencia', null, null, '2', '0');
INSERT INTO `acuerdotipo` VALUES ('9', 'Audiencia de Pruebas y alegatos', null, null, '2', '0');
INSERT INTO `acuerdotipo` VALUES ('10', 'Requiriendo el cumplimiento de sentencia', null, null, '2', '0');
INSERT INTO `acuerdotipo` VALUES ('11', 'Sentencia Cumplida', null, null, '2', '0');
INSERT INTO `acuerdotipo` VALUES ('12', 'Otros', null, null, '2', '0');
INSERT INTO `acuerdotipo` VALUES ('13', 'Promoción', null, null, '1', '0');
INSERT INTO `acuerdotipo` VALUES ('14', 'Escritura Pública', null, null, '1', '0');
INSERT INTO `acuerdotipo` VALUES ('15', 'Demanda	', null, null, '1', '0');
INSERT INTO `acuerdotipo` VALUES ('16', 'Nombramiento	', null, null, '1', '0');
INSERT INTO `acuerdotipo` VALUES ('17', 'Recibo de Nómina	', null, null, '1', '0');
INSERT INTO `acuerdotipo` VALUES ('18', 'Resolución	', null, null, '1', '0');
INSERT INTO `acuerdotipo` VALUES ('19', 'Boleta de Infracción	', null, null, '1', '0');
INSERT INTO `acuerdotipo` VALUES ('20', 'Copia Certificada	', null, null, '1', '0');
INSERT INTO `acuerdotipo` VALUES ('21', 'Expediente	', null, null, '1', '0');
INSERT INTO `acuerdotipo` VALUES ('22', 'Constancia de Notificación	', null, null, '1', '0');
INSERT INTO `acuerdotipo` VALUES ('23', 'Oficio	', null, null, '1', '0');
INSERT INTO `acuerdotipo` VALUES ('24', 'Concesión	', null, null, '1', '0');
INSERT INTO `acuerdotipo` VALUES ('25', 'Acuerdo	', null, null, '2', '0');
INSERT INTO `acuerdotipo` VALUES ('26', 'Sentencia	', null, null, '1', '0');
INSERT INTO `acuerdotipo` VALUES ('27', 'Comprobante de registro de Alta en el siste', null, null, '1', '0');
INSERT INTO `acuerdotipo` VALUES ('28', 'Proyecto	', null, null, '2', '0');
INSERT INTO `acuerdotipo` VALUES ('29', 'Poder para Pleitos y Cobranzas	', null, null, '1', '0');
INSERT INTO `acuerdotipo` VALUES ('30', 'Amparo	', null, null, '2', '0');
INSERT INTO `acuerdotipo` VALUES ('31', 'Acta de notificación', null, null, '1', '0');

-- ----------------------------
-- Table structure for anexopdf
-- ----------------------------
DROP TABLE IF EXISTS `anexopdf`;
CREATE TABLE `anexopdf` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Control de tabla',
  `Folio` varchar(45) NOT NULL,
  `id_Tipo` int(11) NOT NULL COMMENT 'Tipo de anexo guardado',
  `id_Expediente` int(11) NOT NULL COMMENT 'Expediente',
  `FechaUp` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de subida',
  `PathAnexo` varchar(50) NOT NULL COMMENT 'Directorio electrónico del documento',
  `NomFile` longtext NOT NULL COMMENT 'Nombre del documento asignado por el usuario',
  `NomFileSis` longtext COMMENT 'Nombre del documento otorgado por el sistema',
  `Status` int(11) NOT NULL COMMENT 'borrado lógico\n0: activo\n1: borrado',
  `StatusCrea` int(11) NOT NULL COMMENT 'Creado el documento a través del sistema\n0: Se subió directamente el oficio\n1: Se redacto una promoción',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=302 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of anexopdf
-- ----------------------------
INSERT INTO `anexopdf` VALUES ('21', '1_0', '15', '7', '2017-11-22 19:15:03', './Historico/1', 'DEMANDA 894-17 BIS.pdf', 'null', '0', '0');
INSERT INTO `anexopdf` VALUES ('22', '1_1', '13', '7', '2017-11-22 19:16:32', './Historico/1', '894-17 BIS Anexo 1.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('24', '897_0', '15', '9', '2017-11-22 19:40:01', './Historico/897', 'img20171122_13314678.pdf', 'null', '0', '0');
INSERT INTO `anexopdf` VALUES ('25', '898_0', '15', '10', '2017-11-22 20:00:50', './Historico/898', 'img20171122_13583733.pdf', 'null', '0', '0');
INSERT INTO `anexopdf` VALUES ('26', '898_1', '13', '10', '2017-11-22 20:02:02', './Historico/898', 'img20171122_13585471.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('27', '898_2', '14', '10', '2017-11-22 20:02:17', './Historico/898', 'img20171122_13591076.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('28', '898_3', '13', '10', '2017-11-22 20:04:23', './Historico/898', 'img20171122_13592143.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('29', '899_0', '15', '11', '2017-11-22 20:15:39', './Historico/899', 'img20171122_14132575.pdf', 'null', '0', '0');
INSERT INTO `anexopdf` VALUES ('30', '899_1', '13', '11', '2017-11-22 20:16:03', './Historico/899', 'img20171122_14135297.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('31', '899_2', '13', '11', '2017-11-22 20:16:12', './Historico/899', 'img20171122_14140842.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('32', '899_3', '13', '11', '2017-11-22 20:16:22', './Historico/899', 'img20171122_14141906.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('33', '899_4', '13', '11', '2017-11-22 20:16:29', './Historico/899', 'img20171122_14144164.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('34', '900_0', '15', '12', '2017-11-22 20:25:04', './Historico/900', 'img20171122_14193096.pdf', 'null', '0', '0');
INSERT INTO `anexopdf` VALUES ('35', '900_1', '13', '12', '2017-11-22 20:32:23', './Historico/900', 'img20171122_14194128.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('36', '900_2', '13', '12', '2017-11-22 20:32:38', './Historico/900', 'img20171122_14194936.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('37', '901_0', '15', '13', '2017-11-22 20:39:59', './Historico/901', 'img20171122_14333572.pdf', 'null', '0', '0');
INSERT INTO `anexopdf` VALUES ('38', '901_1', '19', '13', '2017-11-22 20:40:22', './Historico/901', 'img20171122_14334500.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('39', '897_1', '19', '9', '2017-11-22 20:42:16', './Historico/897', 'img20171122_13320134.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('42', '902_0', '15', '14', '2017-11-24 17:29:13', './Historico/902', '1_Demanda_902-17.pdf', 'null', '0', '0');
INSERT INTO `anexopdf` VALUES ('43', '902_1', '13', '14', '2017-11-24 17:29:45', './Historico/902', '2_Anexo_1.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('44', '902_2', '13', '14', '2017-11-24 17:29:56', './Historico/902', '3_Anexo_2.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('45', '902_3', '13', '14', '2017-11-24 17:30:06', './Historico/902', '4_Anexo_3.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('46', '902_4', '13', '14', '2017-11-24 17:30:17', './Historico/902', '5_Anexo_4.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('47', '903_0', '15', '15', '2017-11-24 17:31:32', './Historico/903', '1 Demanda 903-17.pdf', 'null', '0', '0');
INSERT INTO `anexopdf` VALUES ('48', '903_1', '13', '15', '2017-11-24 17:31:44', './Historico/903', '2 Anexo 1.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('49', '903_2', '13', '15', '2017-11-24 17:32:10', './Historico/903', '3 Anexo 2.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('50', '903_3', '13', '15', '2017-11-24 17:32:25', './Historico/903', '4 Anexo 3.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('51', '903_4', '13', '15', '2017-11-24 17:32:46', './Historico/903', '5 Anexo 4.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('52', '903_5', '13', '15', '2017-11-24 17:32:59', './Historico/903', '6 Anexo 5.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('53', '904_0', '15', '16', '2017-11-24 17:34:42', './Historico/904', '1 Demanda 904-17.pdf', 'null', '0', '0');
INSERT INTO `anexopdf` VALUES ('54', '904_0', '15', '17', '2017-11-24 17:35:18', './Historico/904', '1_Demanda_904-17.pdf', 'null', '0', '0');
INSERT INTO `anexopdf` VALUES ('56', '897_2', '15', '9', '2017-11-27 19:34:42', './Historico/897', '897-17 estrados- sin aut.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('57', '897_3', '15', '9', '2017-11-27 19:39:46', './Historico/897', '897_17_estrados_sin_aut.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('58', '899_5', '15', '11', '2017-11-27 19:47:41', './Historico/899', '899-2017 TRÁNSITO COL con dom sin aut.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('59', '899_6', '15', '11', '2017-11-27 19:49:39', './Historico/899', '899-2017_TRÁNSITO_COL_con_dom_sin_aut.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('60', '901_2', '15', '13', '2017-11-27 19:51:57', './Historico/901', '901_17 estrados_Luis Bañuelos.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('61', '903_6', '15', '15', '2017-11-27 19:57:09', './Historico/903', '903-17 REQ- de ADM para que exhiba copias cert de carta poder.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('62', '903_7', '1', '15', '2017-11-27 20:03:13', './Historico/903', '903_17_REQ_ de_ADM_de_carta_poder.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('63', '903_8', '1', '15', '2017-11-27 20:08:36', './Historico/903', '903_17_REQ_ de_ADM_de_carta_poder.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('64', '903_9', '12', '15', '2017-11-27 20:10:17', './Historico/903', '903_17_Req_de_adm_carta_poder.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('65', '898_4', '1', '10', '2017-11-27 20:24:02', './Historico/898', 'ADM_898_17.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('66', '897_4', '1', '9', '2017-11-27 20:55:04', './Historico/897', '897_17_ADM.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('67', '899_7', '1', '11', '2017-11-28 16:01:37', './Historico/899', '899_17_ADM.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('68', '901_3', '1', '13', '2017-11-28 16:02:33', './Historico/901', '901_17_ADM.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('69', '903_10', '3', '15', '2017-11-28 16:05:02', './Historico/903', '903_17_ REQ_ ADM.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('72', '905_0', '15', '20', '2017-11-28 20:03:46', './Historico/905', '1_Demanda_905-17.pdf', 'null', '0', '0');
INSERT INTO `anexopdf` VALUES ('73', '905_1', '20', '20', '2017-11-28 20:04:15', './Historico/905', '2_Anexo_1.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('74', '905_2', '13', '20', '2017-11-28 20:04:58', './Historico/905', '3_Anexo_2.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('75', '898_5', '1', '10', '2017-11-28 21:06:23', './Historico/898', 'semi7.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('76', '898_6', '31', '10', '2017-11-28 21:10:59', './Historico/898', 'ADM1111.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('77', '904_1', '13', '17', '2017-12-01 15:05:51', './Historico/904', '2_Anexo_1.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('78', '906_0', '15', '21', '2017-12-01 15:13:41', './Historico/906', '1_Demanda_906-17.pdf', 'null', '0', '0');
INSERT INTO `anexopdf` VALUES ('79', '1_2', '13', '7', '2017-12-01 15:14:33', './Historico/1', '2_Anexo_1.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('80', '1_3', '13', '7', '2017-12-01 15:14:41', './Historico/1', '3_Anexo_2.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('81', '906_1', '13', '21', '2017-12-01 15:15:08', './Historico/906', '2_Anexo_1.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('82', '906_2', '13', '21', '2017-12-01 15:15:20', './Historico/906', '3_Anexo_2.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('83', '907_0', '15', '22', '2017-12-01 15:21:02', './Historico/907', '1_Demanda_907-17.pdf', 'null', '0', '0');
INSERT INTO `anexopdf` VALUES ('84', '907_1', '19', '22', '2017-12-01 15:21:24', './Historico/907', '2_Anexo_1.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('85', '908_0', '15', '23', '2017-12-01 15:23:40', './Historico/908', '1_Demanda_908-17.pdf', 'null', '0', '0');
INSERT INTO `anexopdf` VALUES ('86', '908_1', '19', '23', '2017-12-01 15:23:57', './Historico/908', '2_Anexo_1.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('87', '908_2', '13', '23', '2017-12-01 15:24:25', './Historico/908', '3_Anexo_2.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('88', '909_0', '15', '24', '2017-12-01 15:27:27', './Historico/909', '1_Demanda_909-17.pdf', 'null', '0', '0');
INSERT INTO `anexopdf` VALUES ('89', '909_1', '13', '24', '2017-12-01 15:27:40', './Historico/909', '2_Anexo_1.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('90', '909_2', '13', '24', '2017-12-01 15:27:54', './Historico/909', '3_Anexo_2.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('91', '909_3', '13', '24', '2017-12-01 15:28:18', './Historico/909', '4_Anexo_3.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('92', '909_4', '13', '24', '2017-12-01 15:28:46', './Historico/909', '5_Anexo_4.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('93', '909_5', '13', '24', '2017-12-01 15:29:12', './Historico/909', '6_Anexo_5.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('94', '909_6', '13', '24', '2017-12-01 15:29:23', './Historico/909', '7_Anexo_6.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('95', '909_7', '13', '24', '2017-12-01 15:29:41', './Historico/909', '7_Anexo_6.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('96', '909_8', '13', '24', '2017-12-01 15:29:51', './Historico/909', '8_Anexo_7.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('97', '905_3', '13', '20', '2017-12-01 15:30:06', './Historico/905', '9_Anexo_8.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('98', '909_9', '13', '24', '2017-12-01 15:30:43', './Historico/909', '9_Anexo_8.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('99', '909_10', '13', '24', '2017-12-01 15:31:37', './Historico/909', '10_Anexo_9.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('100', '909_11', '13', '24', '2017-12-01 15:31:51', './Historico/909', '11_Anexo_10.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('101', '909_12', '13', '24', '2017-12-01 15:32:48', './Historico/909', '12_Anexo_11.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('102', '910_0', '15', '25', '2017-12-01 15:34:38', './Historico/910', '1_Demanda_910-17.pdf', 'null', '0', '0');
INSERT INTO `anexopdf` VALUES ('103', '910_1', '19', '25', '2017-12-01 15:34:53', './Historico/910', '2_Anexo_1.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('104', '913_0', '15', '26', '2017-12-04 19:16:02', './Historico/913', '1_Demanda_913-17.pdf', 'null', '0', '0');
INSERT INTO `anexopdf` VALUES ('105', '913_1', '19', '26', '2017-12-04 19:16:40', './Historico/913', '2_Anexo_1.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('106', '913_2', '13', '26', '2017-12-04 19:17:09', './Historico/913', '3_Anexo_2.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('107', '914_0', '15', '27', '2017-12-04 19:18:39', './Historico/914', '1_Demanda_914-17.pdf', 'null', '0', '0');
INSERT INTO `anexopdf` VALUES ('108', '914_1', '19', '27', '2017-12-04 19:19:05', './Historico/914', '2_Anexo_1.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('109', '914_2', '13', '27', '2017-12-04 19:19:46', './Historico/914', '3_Anexo_2.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('110', '914_3', '13', '27', '2017-12-04 19:19:59', './Historico/914', '4_Anexo_3.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('111', '916_0', '15', '28', '2017-12-04 19:24:08', './Historico/916', '1_Demanda_916-17.pdf', 'null', '0', '0');
INSERT INTO `anexopdf` VALUES ('112', '916_1', '19', '28', '2017-12-04 19:24:24', './Historico/916', '2_Anexo_1.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('113', '916_2', '13', '28', '2017-12-04 19:24:37', './Historico/916', '3_Anexo_2.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('114', '917_0', '15', '29', '2017-12-04 19:30:24', './Historico/917', '1_Demanda_917-17.pdf', 'null', '0', '0');
INSERT INTO `anexopdf` VALUES ('115', '917_1', '13', '29', '2017-12-04 19:30:40', './Historico/917', '2_Anexo_1.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('116', '917_2', '13', '29', '2017-12-04 19:30:53', './Historico/917', '3_Anexo_2.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('117', '918_0', '15', '30', '2017-12-04 19:36:45', './Historico/918', '1_Demanda_918-17.pdf', 'null', '0', '0');
INSERT INTO `anexopdf` VALUES ('118', '918_1', '19', '30', '2017-12-04 19:36:59', './Historico/918', '2_Anexo_1.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('119', '918_2', '13', '30', '2017-12-04 19:37:13', './Historico/918', '3_Anexo_2.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('120', '918_3', '13', '30', '2017-12-04 19:37:53', './Historico/918', '4_Anexo_3.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('121', '918_4', '13', '30', '2017-12-04 19:38:17', './Historico/918', '5_Anexo_4.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('122', '919_0', '15', '31', '2017-12-04 19:40:31', './Historico/919', '1_Demanda_919-17.pdf', 'null', '0', '0');
INSERT INTO `anexopdf` VALUES ('123', '919_1', '13', '31', '2017-12-04 19:40:55', './Historico/919', '2_Anexo_1.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('124', '919_2', '13', '31', '2017-12-04 19:41:06', './Historico/919', '3_Anexo_2.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('125', '919_3', '13', '31', '2017-12-04 19:41:17', './Historico/919', '4_Anexo_3.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('126', '919_0', '15', '32', '2017-12-05 17:28:19', './Historico/919', '1_Demanda_919-17.pdf', 'null', '0', '0');
INSERT INTO `anexopdf` VALUES ('127', '919_1', '13', '32', '2017-12-05 17:28:39', './Historico/919', '2_Anexo_1.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('128', '919_2', '13', '32', '2017-12-05 17:29:20', './Historico/919', '3_Anexo_2.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('129', '919_3', '13', '32', '2017-12-05 17:29:45', './Historico/919', '4_Anexo_3.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('130', '920_0', '15', '33', '2017-12-05 17:31:41', './Historico/920', '1_Demanda_920-17.pdf', 'null', '0', '0');
INSERT INTO `anexopdf` VALUES ('131', '920_1', '19', '33', '2017-12-05 17:31:55', './Historico/920', '2_Anexo_1.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('132', '920_2', '13', '33', '2017-12-05 17:32:06', './Historico/920', '3_Anexo_2.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('133', '920_3', '13', '33', '2017-12-05 17:32:31', './Historico/920', '4_Anexo_3.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('134', '921_0', '15', '34', '2017-12-05 17:33:47', './Historico/921', '1_Demanda_921-17.pdf', 'null', '0', '0');
INSERT INTO `anexopdf` VALUES ('135', '921_1', '19', '34', '2017-12-05 17:34:02', './Historico/921', '2_Anexo_1.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('136', '921_2', '13', '34', '2017-12-05 17:34:17', './Historico/921', '3_Anexo_2.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('137', '922_0', '15', '35', '2017-12-05 17:41:42', './Historico/922', '1_Demanda_922-17.pdf', 'null', '0', '0');
INSERT INTO `anexopdf` VALUES ('138', '922_1', '13', '35', '2017-12-05 17:42:02', './Historico/922', '2_Anexo_1.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('139', '922_2', '13', '35', '2017-12-05 17:42:13', './Historico/922', '3_Anexo_2.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('140', '922_3', '13', '35', '2017-12-05 17:42:23', './Historico/922', '4_Anexo_3.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('141', '922_4', '13', '35', '2017-12-05 17:42:36', './Historico/922', '5_Anexo_4.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('142', '922_5', '13', '35', '2017-12-05 17:42:50', './Historico/922', '6_Anexo_5.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('143', '905_4', '13', '20', '2017-12-05 17:43:02', './Historico/905', '7_Anexo_6.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('144', '923_0', '15', '36', '2017-12-05 17:44:38', './Historico/923', '1_Demanda_923-17.pdf', 'null', '0', '0');
INSERT INTO `anexopdf` VALUES ('145', '924_0', '15', '37', '2017-12-05 17:45:51', './Historico/924', '1_Demanda_924-17.pdf', 'null', '0', '0');
INSERT INTO `anexopdf` VALUES ('146', '924_1', '13', '37', '2017-12-05 17:46:13', './Historico/924', '2_Anexo_1.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('147', '925_0', '15', '38', '2017-12-05 17:47:45', './Historico/925', '1_Demanda_925-17.pdf', 'null', '0', '0');
INSERT INTO `anexopdf` VALUES ('148', '925_1', '19', '38', '2017-12-05 17:48:02', './Historico/925', '2_Anexo_1.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('149', '926_0', '15', '39', '2017-12-05 17:49:59', './Historico/926', '1_Demanda_926-17.pdf', 'null', '0', '0');
INSERT INTO `anexopdf` VALUES ('150', '926_0', '15', '40', '2017-12-05 17:50:45', './Historico/926', '1_Demanda_926-17.pdf', 'null', '0', '0');
INSERT INTO `anexopdf` VALUES ('151', '926_1', '13', '40', '2017-12-05 17:50:58', './Historico/926', '2_Anexo_1.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('152', '926_2', '19', '40', '2017-12-05 17:51:11', './Historico/926', '3_Anexo_2.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('153', '927_0', '15', '41', '2017-12-05 17:53:11', './Historico/927', '1_Demanda_927-17.pdf', 'null', '0', '0');
INSERT INTO `anexopdf` VALUES ('154', '927_1', '19', '41', '2017-12-05 17:53:38', './Historico/927', '2_Anexo_1.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('155', '928_0', '15', '42', '2017-12-05 17:54:43', './Historico/928', '1_Demanda_928-17.pdf', 'null', '0', '0');
INSERT INTO `anexopdf` VALUES ('156', '928_1', '19', '42', '2017-12-05 17:54:56', './Historico/928', '2_Anexo_1.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('157', '929_0', '15', '43', '2017-12-05 18:04:16', './Historico/929', '1_Demanda_929-17.pdf', 'null', '0', '0');
INSERT INTO `anexopdf` VALUES ('158', '929_1', '13', '43', '2017-12-05 18:04:27', './Historico/929', '2_Anexo_1.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('159', '929_2', '13', '43', '2017-12-05 18:04:44', './Historico/929', '3_Anexo_2.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('160', '930_0', '15', '44', '2017-12-05 20:39:53', './Historico/930', '1_Demanda_930-17.pdf', 'null', '0', '0');
INSERT INTO `anexopdf` VALUES ('161', '931_0', '15', '45', '2017-12-05 20:43:21', './Historico/931', '1_Demanda_931-17.pdf', 'null', '0', '0');
INSERT INTO `anexopdf` VALUES ('162', '931_1', '13', '45', '2017-12-05 20:43:33', './Historico/931', '2_Anexo_1.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('163', '931_2', '13', '45', '2017-12-05 20:43:41', './Historico/931', '3_Anexo_3.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('164', '932_0', '15', '46', '2017-12-05 20:45:02', './Historico/932', '1_Demanda_932-17.pdf', 'null', '0', '0');
INSERT INTO `anexopdf` VALUES ('165', '932_1', '19', '46', '2017-12-05 20:45:19', './Historico/932', '2_Anexo_1.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('166', '933_0', '15', '47', '2017-12-06 17:04:28', './Historico/933', '1_Demanda_933-17.pdf', 'null', '0', '0');
INSERT INTO `anexopdf` VALUES ('167', '933_1', '29', '47', '2017-12-06 17:05:00', './Historico/933', '2_Anexo_1.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('168', '933_2', '18', '47', '2017-12-06 17:05:34', './Historico/933', '3_Anexo_2.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('169', '933_3', '13', '47', '2017-12-06 20:38:06', './Historico/933', '5_Anexo_4.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('170', '933_4', '13', '47', '2017-12-06 20:38:30', './Historico/933', '6_Anexo_5.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('171', '933_5', '13', '47', '2017-12-06 20:38:40', './Historico/933', '7_Anexo_6.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('172', '933_6', '13', '47', '2017-12-06 20:38:52', './Historico/933', '8_Anexo_7.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('173', '933_7', '13', '47', '2017-12-06 20:39:26', './Historico/933', '9_Anexo_8.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('174', '933_8', '13', '47', '2017-12-06 20:39:53', './Historico/933', '10_Anexo_9.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('175', '933_9', '13', '47', '2017-12-06 20:40:07', './Historico/933', '11_Anexo_10.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('176', '933_10', '13', '47', '2017-12-06 20:40:25', './Historico/933', '12_Anexo_11.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('177', '934_0', '15', '48', '2017-12-06 20:55:52', './Historico/934', '1_Demanda_934-17.pdf', 'null', '0', '0');
INSERT INTO `anexopdf` VALUES ('178', '934_1', '23', '48', '2017-12-06 20:56:10', './Historico/934', '2_Anexo_1.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('179', '934_2', '13', '48', '2017-12-06 20:56:48', './Historico/934', '4_Anexo_3.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('180', '934_3', '13', '48', '2017-12-06 20:57:08', './Historico/934', '5_Anexo_4.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('181', '934_4', '13', '48', '2017-12-06 20:57:24', './Historico/934', '6_Anexo_5.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('182', '934_5', '13', '48', '2017-12-06 20:57:49', './Historico/934', '7_Anexo_6.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('183', '934_6', '13', '48', '2017-12-06 20:58:01', './Historico/934', '8_Anexo_7.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('184', '935_0', '15', '49', '2017-12-07 16:37:18', './Historico/935', '1_Demanda_935-17.pdf', 'null', '0', '0');
INSERT INTO `anexopdf` VALUES ('185', '936_0', '15', '50', '2017-12-11 19:02:05', './Historico/936', '1_Demanda_936-17.pdf', 'null', '0', '0');
INSERT INTO `anexopdf` VALUES ('186', '936_0', '15', '51', '2017-12-11 19:04:34', './Historico/936', '1_Demanda_936-17.pdf', 'null', '0', '0');
INSERT INTO `anexopdf` VALUES ('187', '936_1', '13', '51', '2017-12-11 19:04:54', './Historico/936', '2_Anexo_1.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('188', '936_2', '18', '51', '2017-12-11 19:05:08', './Historico/936', '3_Anexo_2.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('189', '905_5', '13', '20', '2017-12-11 19:05:19', './Historico/905', '4_Anexo_3.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('190', '936_3', '13', '51', '2017-12-11 19:05:29', './Historico/936', '5_Anexo_4.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('191', '936_4', '13', '51', '2017-12-11 19:05:38', './Historico/936', '6_Anexo_5.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('192', '936_5', '13', '51', '2017-12-11 19:05:49', './Historico/936', '7_Anexo_6.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('193', '936_6', '13', '51', '2017-12-11 19:06:00', './Historico/936', '8_Anexo_7.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('194', '936_7', '13', '51', '2017-12-11 19:06:11', './Historico/936', '9_Anexo_8.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('195', '936_8', '13', '51', '2017-12-11 19:06:20', './Historico/936', '10_Anexo_9.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('196', '936_9', '13', '51', '2017-12-11 19:06:29', './Historico/936', '11_Anexo_10.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('197', '905_6', '13', '20', '2017-12-11 19:06:38', './Historico/905', '12_Anexo_11.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('198', '936_10', '13', '51', '2017-12-11 19:06:49', './Historico/936', '13_Anexo_12.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('199', '936_11', '13', '51', '2017-12-11 19:07:03', './Historico/936', '14_Anexo_13.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('200', '936_12', '13', '51', '2017-12-11 19:07:22', './Historico/936', '12_Anexo_11.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('201', '936_13', '13', '51', '2017-12-11 19:07:41', './Historico/936', '15_Anexo_14.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('202', '936_14', '13', '51', '2017-12-11 19:07:55', './Historico/936', '16_Anexo_15.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('203', '936_15', '13', '51', '2017-12-11 19:08:16', './Historico/936', '17_Anexo_16.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('204', '936_16', '13', '51', '2017-12-11 19:08:16', './Historico/936', '17_Anexo_16.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('205', '936_17', '13', '51', '2017-12-11 19:08:35', './Historico/936', '4_Anexo_3.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('206', '937_0', '15', '52', '2017-12-11 19:09:51', './Historico/937', '1_Demanda_937-17.pdf', 'null', '0', '0');
INSERT INTO `anexopdf` VALUES ('207', '937_1', '13', '52', '2017-12-11 19:10:04', './Historico/937', '2_Anexo_1.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('208', '938_0', '15', '53', '2017-12-11 19:26:33', './Historico/938', '1_Demanda_938_17.pdf', 'null', '0', '0');
INSERT INTO `anexopdf` VALUES ('209', '938_1', '19', '53', '2017-12-11 19:31:24', './Historico/938', '2_Anexo_1.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('210', '939_0', '15', '54', '2017-12-11 19:32:18', './Historico/939', '1_Demanda_939-17.pdf', 'null', '0', '0');
INSERT INTO `anexopdf` VALUES ('211', '939_1', '19', '54', '2017-12-11 19:32:34', './Historico/939', '2_Anexo_1.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('212', '940_0', '15', '55', '2017-12-11 19:38:14', './Historico/940', '1_Demanda_940-17.pdf', 'null', '0', '0');
INSERT INTO `anexopdf` VALUES ('213', '940_1', '13', '55', '2017-12-11 19:38:26', './Historico/940', '2_Anexo_1.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('214', '940_2', '13', '55', '2017-12-11 19:38:34', './Historico/940', '3_Anexo_2.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('215', '940_3', '19', '55', '2017-12-11 19:38:53', './Historico/940', '4_Anexo_3.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('216', '941_0', '15', '56', '2017-12-11 19:40:00', './Historico/941', '1_Demanda_941-17.pdf', 'null', '0', '0');
INSERT INTO `anexopdf` VALUES ('217', '941_1', '13', '56', '2017-12-11 19:40:16', './Historico/941', '2_Anexo_1.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('218', '941_2', '19', '56', '2017-12-11 19:40:44', './Historico/941', '3_Anexo_2.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('219', '942_0', '15', '57', '2017-12-11 19:42:15', './Historico/942', '1_Demanda_942-17.pdf', 'null', '0', '0');
INSERT INTO `anexopdf` VALUES ('220', '942_0', '15', '58', '2017-12-11 19:43:16', './Historico/942', '1_Demanda_942-17.pdf', 'null', '0', '0');
INSERT INTO `anexopdf` VALUES ('221', '942_1', '19', '58', '2017-12-11 19:43:30', './Historico/942', '2_Anexo_1.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('222', '943_0', '15', '59', '2017-12-11 19:46:39', './Historico/943', '1_Demanda_943-17.pdf', 'null', '0', '0');
INSERT INTO `anexopdf` VALUES ('223', '943_1', '13', '59', '2017-12-11 19:46:52', './Historico/943', '2_Anexo_1.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('224', '943_2', '13', '59', '2017-12-11 19:47:03', './Historico/943', '3_Anexo_2.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('225', '943_3', '13', '59', '2017-12-11 19:47:19', './Historico/943', '4_Anexo_3.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('226', '944_0', '15', '60', '2017-12-12 17:38:26', './Historico/944', '1_Demanda_944-17.pdf', 'null', '0', '0');
INSERT INTO `anexopdf` VALUES ('227', '944_1', '19', '60', '2017-12-12 17:38:45', './Historico/944', '2_Anexo_2.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('228', '945_0', '15', '61', '2017-12-12 17:40:05', './Historico/945', '1_Demanda_945-17.pdf', 'null', '0', '0');
INSERT INTO `anexopdf` VALUES ('229', '945_1', '19', '61', '2017-12-12 17:41:34', './Historico/945', '2_Demanda_1.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('230', '945_2', '13', '61', '2017-12-12 17:41:53', './Historico/945', '3_Anexo_2.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('231', '946_0', '15', '62', '2017-12-12 18:09:48', './Historico/946', '1_Demanda_946-17.pdf', 'null', '0', '0');
INSERT INTO `anexopdf` VALUES ('232', '946_1', '13', '62', '2017-12-12 18:10:02', './Historico/946', '2_Anexo_1.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('233', '946_2', '14', '62', '2017-12-12 18:10:20', './Historico/946', '3_Anexo_2.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('234', '946_3', '31', '62', '2017-12-12 18:10:42', './Historico/946', '4_Anexo_3.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('235', '946_4', '18', '62', '2017-12-12 18:10:59', './Historico/946', '5_Anexo_4.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('236', '947_0', '15', '63', '2017-12-13 19:39:27', './Historico/947', '1_Demanda__947-17.pdf', 'null', '0', '0');
INSERT INTO `anexopdf` VALUES ('237', '947_1', '19', '63', '2017-12-13 19:39:45', './Historico/947', '2_anexopdf_1.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('238', '948_0', '15', '64', '2017-12-13 19:53:24', './Historico/948', '1_Demanda_948-17.pdf', 'null', '0', '0');
INSERT INTO `anexopdf` VALUES ('239', '948_1', '19', '64', '2017-12-13 19:53:42', './Historico/948', '2_Anexo_1.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('240', '949_0', '15', '65', '2017-12-13 19:55:54', './Historico/949', '1_Demanda_949-17.pdf', 'null', '0', '0');
INSERT INTO `anexopdf` VALUES ('241', '949_1', '13', '65', '2017-12-13 19:56:14', './Historico/949', '2_Anexo_1.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('242', '949_2', '14', '65', '2017-12-13 19:56:31', './Historico/949', '3_Anexo_2.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('243', '950_0', '15', '66', '2017-12-13 20:00:14', './Historico/950', '1_Demanda_950-17.pdf', 'null', '0', '0');
INSERT INTO `anexopdf` VALUES ('244', '950_1', '19', '66', '2017-12-13 20:01:38', './Historico/950', '2_Anexo_1.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('245', '951_0', '15', '67', '2017-12-13 20:02:40', './Historico/951', '1_Demanda_951-17.pdf', 'null', '0', '0');
INSERT INTO `anexopdf` VALUES ('246', '951_1', '13', '67', '2017-12-13 20:02:51', './Historico/951', '2_Anexo_1.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('247', '952_0', '15', '68', '2017-12-13 20:16:06', './Historico/952', '', 'null', '0', '0');
INSERT INTO `anexopdf` VALUES ('248', '952_0', '15', '69', '2017-12-13 20:16:53', './Historico/952', '1_Demanda_952-17.pdf', 'null', '0', '0');
INSERT INTO `anexopdf` VALUES ('249', '952_1', '19', '69', '2017-12-13 20:17:18', './Historico/952', '2_Anexo_1.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('250', '952_2', '13', '69', '2017-12-13 20:17:30', './Historico/952', '3_Anexo_2.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('251', '952_3', '13', '69', '2017-12-13 20:17:39', './Historico/952', '4_Anexo_3.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('252', '953_0', '15', '70', '2017-12-13 20:18:21', './Historico/953', '1_Demanda_953-17.pdf', 'null', '0', '0');
INSERT INTO `anexopdf` VALUES ('253', '953_1', '13', '70', '2017-12-13 20:18:30', './Historico/953', '2_Anexo_1.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('254', '954_0', '15', '71', '2017-12-13 20:19:37', './Historico/954', '1_Demanda_954-17.pdf', 'null', '0', '0');
INSERT INTO `anexopdf` VALUES ('255', '954_0', '15', '72', '2017-12-13 20:22:23', './Historico/954', '1_Demanda_954-17.pdf', 'null', '0', '0');
INSERT INTO `anexopdf` VALUES ('256', '954_1', '13', '72', '2017-12-13 20:22:48', './Historico/954', '2_Anexo_1.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('257', '954_2', '13', '72', '2017-12-13 20:23:00', './Historico/954', '3_Anexo_2.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('258', '954_3', '13', '72', '2017-12-13 20:23:27', './Historico/954', '4_Anexo_3.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('259', '954_4', '13', '72', '2017-12-13 20:23:37', './Historico/954', '5_Anexo_4.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('260', '954_5', '13', '72', '2017-12-13 20:23:47', './Historico/954', '6_Anexo_5.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('261', '954_6', '13', '72', '2017-12-13 20:23:58', './Historico/954', '7_Anexo_6.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('262', '955_0', '15', '73', '2017-12-13 20:25:04', './Historico/955', '1_Demanda_955-17.pdf', 'null', '0', '0');
INSERT INTO `anexopdf` VALUES ('263', '955_1', '13', '73', '2017-12-13 20:28:51', './Historico/955', '2_Anexo_1.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('264', '957_0', '15', '74', '2017-12-14 17:07:20', './Historico/957', '1_Demanda_957-17.pdf', 'null', '0', '0');
INSERT INTO `anexopdf` VALUES ('265', '957_1', '13', '74', '2017-12-14 17:07:40', './Historico/957', '2_Anexo_1.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('266', '957_2', '13', '74', '2017-12-14 17:07:52', './Historico/957', '3_Anexo_2.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('267', '957_3', '13', '74', '2017-12-14 17:08:14', './Historico/957', '4_Anexo_3.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('268', '957_4', '13', '74', '2017-12-14 17:08:23', './Historico/957', '5_Anexo_4.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('269', '957_5', '13', '74', '2017-12-14 17:08:32', './Historico/957', '6_Anexo_5.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('270', '957_6', '13', '74', '2017-12-14 17:08:44', './Historico/957', '7_Anexo_6.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('271', '957_7', '13', '74', '2017-12-14 17:08:58', './Historico/957', '8_anexo_7.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('272', '957_8', '13', '74', '2017-12-14 17:09:14', './Historico/957', '9_Anexo_8.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('273', '957_9', '13', '74', '2017-12-14 17:09:26', './Historico/957', '10_Anexo_9.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('274', '957_10', '13', '74', '2017-12-14 17:09:36', './Historico/957', '11_Anexo_10.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('275', '957_11', '13', '74', '2017-12-14 17:09:45', './Historico/957', '12_Anexo_11.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('276', '957_12', '13', '74', '2017-12-14 17:10:01', './Historico/957', '13_Anexo_12.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('277', '957_13', '13', '74', '2017-12-14 17:10:58', './Historico/957', '14 Anexo_13.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('278', '957_14', '13', '74', '2017-12-14 17:11:07', './Historico/957', '15_Anexo_14.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('279', '957_15', '13', '74', '2017-12-14 17:11:16', './Historico/957', '16_Anexo_15.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('280', '957_16', '13', '74', '2017-12-14 17:11:34', './Historico/957', '16_Anexo_15.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('281', '957_17', '13', '74', '2017-12-14 17:11:49', './Historico/957', '17_Anexo_16.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('282', '957_18', '13', '74', '2017-12-14 17:11:59', './Historico/957', '18_Anexo_17.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('283', '957_19', '13', '74', '2017-12-14 17:12:07', './Historico/957', '19_Anexo_18.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('284', '958_0', '15', '75', '2017-12-14 17:13:04', './Historico/958', '1_Demanda_958-17.pdf', 'null', '0', '0');
INSERT INTO `anexopdf` VALUES ('285', '958_1', '13', '75', '2017-12-14 17:13:15', './Historico/958', '2_Anexo_1.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('286', '958_2', '13', '75', '2017-12-14 17:13:28', './Historico/958', '3_Anexo_2.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('287', '959_0', '15', '76', '2017-12-15 16:23:52', './Historico/959', '1_Demanda_959-17.pdf', 'null', '0', '0');
INSERT INTO `anexopdf` VALUES ('288', '959_1', '13', '76', '2017-12-15 16:24:28', './Historico/959', '2_Anexo_1.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('289', '959_2', '13', '76', '2017-12-15 16:24:40', './Historico/959', '3_Anexo_2.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('290', '959_3', '14', '76', '2017-12-15 16:24:59', './Historico/959', '4_Anexo_3.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('291', '959_4', '14', '76', '2017-12-15 16:25:04', './Historico/959', '4_Anexo_3.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('292', '960_0', '15', '77', '2017-12-15 16:27:58', './Historico/960', '1_Demanda_960-17.pdf', 'null', '0', '0');
INSERT INTO `anexopdf` VALUES ('293', '961_0', '15', '78', '2017-12-15 16:43:28', './Historico/961', '1_Demanda_961-17.pdf', 'null', '0', '0');
INSERT INTO `anexopdf` VALUES ('294', '961_1', '14', '78', '2017-12-15 16:43:42', './Historico/961', '2_Anexo_1.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('295', '961_2', '13', '78', '2017-12-15 16:44:11', './Historico/961', '3_Anexo_2.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('296', '962_0', '15', '79', '2017-12-15 16:47:10', './Historico/962', '1_Demanda_962-17.pdf', 'null', '0', '0');
INSERT INTO `anexopdf` VALUES ('297', '962_1', '13', '79', '2017-12-15 16:47:20', './Historico/962', '2_Anexo_1.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('298', '962_2', '13', '79', '2017-12-15 16:47:48', './Historico/962', '1_Demanda_963-17.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('299', '963_0', '15', '80', '2017-12-15 17:09:23', './Historico/963', '1_Demanda_963-17.pdf', 'null', '0', '0');
INSERT INTO `anexopdf` VALUES ('300', '963_1', '19', '80', '2017-12-15 17:09:37', './Historico/963', '2_Anexo_1.pdf', null, '0', '0');
INSERT INTO `anexopdf` VALUES ('301', '963_2', '13', '80', '2017-12-15 17:09:46', './Historico/963', '3_Anexo_2.pdf', null, '0', '0');

-- ----------------------------
-- Table structure for domicilio
-- ----------------------------
DROP TABLE IF EXISTS `domicilio`;
CREATE TABLE `domicilio` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `calle` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ninter` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `next` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `colonia` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `municipio` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cp` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `referencia` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `oir` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of domicilio
-- ----------------------------
INSERT INTO `domicilio` VALUES ('1', '1', 'Benito Juarez # 130, El Trapiche, Colima', '', null, '', 'CUAUHTEMOC', 'COLIMA', '28550', '', '0', null, null);
INSERT INTO `domicilio` VALUES ('2', '11', 'TORRES QUINTERO', '', '85', 'CENTRO', 'COLIMA', 'COLIMA', '', '', '1', null, null);
INSERT INTO `domicilio` VALUES ('3', '13', 'TAMAULIPAS', '', '301', 'SANTA AMALIA', 'COLIMA', 'COLIMA', '28048', '', '1', null, null);
INSERT INTO `domicilio` VALUES ('4', '127', 'Francisco Zarco ', '', '1460', '', 'Colima', 'Colima', '28018', 'NULL', '0', null, null);
INSERT INTO `domicilio` VALUES ('5', '127', 'Miguel Virgen Morfín', 'Z-1', '265', '', 'Colima', 'Colima', '28970', 'Ninguna', '1', null, null);
INSERT INTO `domicilio` VALUES ('6', '128', '18 de abril II ', '', '962', '', 'Colima', 'Colima', '28980', 'NULL', '0', null, null);
INSERT INTO `domicilio` VALUES ('7', '128', 'Francisco Zarco ', '', '1460', '', 'Colima', 'Colima', '28018', 'Ninguna', '1', null, null);
INSERT INTO `domicilio` VALUES ('8', '129', 'Avenida Pablo Silva García', '', '693 Altos', '', 'Colima', 'Colima', '28070', 'Ninguna', '1', null, null);
INSERT INTO `domicilio` VALUES ('9', '130', 'Adolfo López Mateos', '', '53-A', '', 'Colima', 'Colima', '28970', 'Ninguna', '1', null, null);
INSERT INTO `domicilio` VALUES ('10', '131', 'Adolfo López Mateos', '', '53 A', '', 'Colima', 'Colima', '28070', 'Ninguna', '1', null, null);
INSERT INTO `domicilio` VALUES ('11', '132', 'Francisco Zarco', '', '1460', '', 'Colima', 'Colima', '28018', 'Ninguna', '1', null, null);
INSERT INTO `domicilio` VALUES ('12', '133', 'Gabino Barreda', '', '523 Altos', '', 'Colima', 'Colima', '', 'Ninguna', '1', null, null);
INSERT INTO `domicilio` VALUES ('13', '134', 'J. Pimentel Llerenas', '', '419', '', 'Colima', 'Colima', '', 'Ninguna', '1', null, null);
INSERT INTO `domicilio` VALUES ('14', '135', 'Río Armería ', '', '552', '', 'Colima', 'Colima', '', 'Ninguna', '1', null, null);
INSERT INTO `domicilio` VALUES ('15', '136', 'Río Armería', '', '552', '', 'Colima', 'Colima', '', '', '1', null, null);
INSERT INTO `domicilio` VALUES ('16', '137', 'Río Armería', '', '552', '', 'Colima', 'Colima', '', 'Ninguna', '1', null, null);
INSERT INTO `domicilio` VALUES ('17', '138', 'Dr. Alt ', '', '44', '', 'Colima', 'Colima', '', 'Ninguna', '1', null, null);
INSERT INTO `domicilio` VALUES ('18', '139', 'Marías Romero esquina con calle SANTIAGO ', '', '634', '', 'Colima', 'Colima', '', 'Ninguna', '1', null, null);
INSERT INTO `domicilio` VALUES ('19', '140', 'Matías Romero esquina con calle Santiago Esco', '', '634', '', 'Colima', 'Colima', '', 'Ninguna', '1', null, null);
INSERT INTO `domicilio` VALUES ('20', '141', 'Alfonso Reyes ', '9', '535', '', 'Colima', 'Colima', '', 'Ninguna', '1', null, null);
INSERT INTO `domicilio` VALUES ('21', '142', 'Aldama', '', '474', '', 'Colima', 'Colima', '', 'Ninguna', '1', null, null);
INSERT INTO `domicilio` VALUES ('22', '143', 'Pablo González', '', '283', '', 'Colima', 'Colima', '', 'Ninguna', '1', null, null);
INSERT INTO `domicilio` VALUES ('23', '144', 'Emilio Carranza', '', '577', '', 'Colima', 'Colima', '28030', 'Ninguna', '1', null, null);
INSERT INTO `domicilio` VALUES ('24', '145', 'Ocre', '', '679', '', 'Colima', 'Colima', '', 'Ninguna', '1', null, null);
INSERT INTO `domicilio` VALUES ('25', '146', 'BLVD. Camino Real', '', '992', '', 'Colima', 'Colima', '28019', 'Colonia El porvenir, Colima, Colima.', '1', null, null);
INSERT INTO `domicilio` VALUES ('26', '147', 'Francisco Zarco', '', '1460', '', 'Colima', 'Colima', '', 'Colonia Girasoles, Colima, Colima.', '1', null, null);
INSERT INTO `domicilio` VALUES ('27', '148', 'Morelos ', '', '360', '', 'Colima', 'Colima', '', 'Centro, Colima, Colima.', '1', null, null);
INSERT INTO `domicilio` VALUES ('28', '149', 'Avenida Juárez ', '', '100', '', 'Colima', 'Colima', '28200', 'Centro, Manzanillo, Colima', '1', null, null);
INSERT INTO `domicilio` VALUES ('29', '150', 'Arándano', '', '9', '', 'Colima', 'Colima', '', 'NULL', '0', null, null);
INSERT INTO `domicilio` VALUES ('30', '150', 'Venustiano Carranza', '', '372', '', 'Colima', 'Colima', '', 'Colima, Colima', '1', null, null);
INSERT INTO `domicilio` VALUES ('31', '151', 'Cuitláhuac', '', '60', '', 'Colima', 'Colima', '', 'NULL', '0', null, null);
INSERT INTO `domicilio` VALUES ('32', '151', 'Venustiano Carranza ', '', '372', '', 'Colima', 'Colima', '', 'Colima, Colima', '1', null, null);
INSERT INTO `domicilio` VALUES ('33', '152', 'Gregorio Torres Quintero', '', '70', '', 'Colima', 'Colima', '', 'Centro, Colima, Colima', '1', null, null);
INSERT INTO `domicilio` VALUES ('34', '153', 'Filomeno Medina', '', '74-A', '', 'Colima', 'Colima', '', 'Centro, Colima, Colima.', '1', null, null);
INSERT INTO `domicilio` VALUES ('35', '154', 'Francisco Zarco ', '', '1460', '', 'Colima', 'Colima', '', 'Colonia Girasoles, Colima, Colima', '1', null, null);
INSERT INTO `domicilio` VALUES ('36', '155', 'Francisco Zarco', '', '1460', '', 'Colima', 'Colima', '', 'Colonia Girasoles, Colima, Colima', '1', null, null);
INSERT INTO `domicilio` VALUES ('37', '156', 'Francisco Zarco', '', '1460', '', 'Colima', 'Colima', '', 'Colonia Girasoles, Colima, Colima', '1', null, null);
INSERT INTO `domicilio` VALUES ('38', '157', 'Manuel Sánchez Silva Prolongación Andador 6', '', '41', '', 'Colima', 'Colima', '', 'Colonia FOVISSSTE, Colima, Colima', '1', null, null);
INSERT INTO `domicilio` VALUES ('39', '158', 'calle 23 de octubre, colonia Alfonso Rolón Mi', '', '959', '', 'Colima', 'Colima', '', 'NULL', '0', null, null);
INSERT INTO `domicilio` VALUES ('40', '158', 'Francisco Zarco ', '', '1460', '', 'Colima', 'Colima', '', 'Colonia Girasoles, Colima, Colima', '1', null, null);
INSERT INTO `domicilio` VALUES ('41', '159', 'Calle 23 de octubre, colonia Alfonso Rolón Mi', '', '959', '', 'Colima', 'Colima', '', 'NULL', '0', null, null);
INSERT INTO `domicilio` VALUES ('42', '159', 'Francisco Zarco', '', '1460', '', 'Colima', 'Colima', '', 'Colonia Girasoles, Colima, Colima', '1', null, null);
INSERT INTO `domicilio` VALUES ('43', '160', 'Francisco Zarco ', '', '1460', '', 'Colima', 'Colima', '', 'Colonia Girasoles, Colima, Colima', '1', null, null);
INSERT INTO `domicilio` VALUES ('44', '161', 'Calle 5 de mayo ', '', '190', '', 'Colima', 'Colima', '', 'Colonia Centro, Colima, Colima', '1', null, null);
INSERT INTO `domicilio` VALUES ('45', '162', 'Benito Juárez ', '', '396', '', 'Colima', 'Colima', '', 'Colonia Centro, Colima, Colima', '1', null, null);
INSERT INTO `domicilio` VALUES ('46', '163', 'Filomeno Medina', 'A', '74', '', 'Colima', 'Colima', '', 'Colonia Centro, Colima, Colima', '1', null, null);
INSERT INTO `domicilio` VALUES ('47', '164', 'Azucena', '', '878', '', 'Colima', 'Colima', '', 'Colonia Arboledas, Villa de Álvarez, Colima.', '1', null, null);
INSERT INTO `domicilio` VALUES ('48', '165', 'Adolfo López Mateos', 'A', '53', '', 'Colima', 'Colima', '', 'Colonia El Moralete, Colima, Colima', '1', null, null);
INSERT INTO `domicilio` VALUES ('49', '166', 'Francisco Zarco ', '', '1460', '', 'Colima', 'Colima', '', 'Colonia Girasoles, Colima, Colima', '1', null, null);
INSERT INTO `domicilio` VALUES ('50', '167', 'Rinconada de los fresnos', '', '2603', '', 'Jalisco', 'Jalisco', '45019', 'Fraccionamiento  Valle Real, Manzanillo, Coli', '1', null, null);
INSERT INTO `domicilio` VALUES ('51', '168', 'Constitución', 'A', '320', '', 'Colima', 'Colima', '', 'Colonia Centro, Colima, Colima', '1', null, null);
INSERT INTO `domicilio` VALUES ('52', '169', 'Constitución', 'A', '320', '', 'Colima', 'Colima', '', 'Colonia Centro, Colima, Colima', '1', null, null);
INSERT INTO `domicilio` VALUES ('53', '170', 'Sonora', '', '1756', '', 'Colima', 'Colima', '', 'Colonia Jardines del sol, Colima, Colima', '1', null, null);
INSERT INTO `domicilio` VALUES ('54', '171', 'Jorge Washington', '', '185', '', 'Colima', 'Colima', '28060', 'Colonia San Pablo, Colima, Colima', '1', null, null);
INSERT INTO `domicilio` VALUES ('55', '172', 'Guillermo Prieto', '', '201', '', 'Colima', 'Colima', '', 'Colonia Lomas de Circunvalación, Colima, Coli', '1', null, null);
INSERT INTO `domicilio` VALUES ('56', '173', 'Maclovio Herrera', 'Altos', '100', '', 'Colima', 'Colima', '', 'Colonia Jardines de la Corregidora, Colima, C', '1', null, null);
INSERT INTO `domicilio` VALUES ('57', '174', 'Maclovio Herrera', 'Altos', '100', '', 'Colima', 'Colima', '222', 'Colonia Jardines de la Corregidora, Colima, C', '1', null, null);
INSERT INTO `domicilio` VALUES ('58', '175', 'Insurgentes', '', '855', '', 'Colima', 'Colima', '', 'Colonia FOVISSSTE, Colima, Colima', '1', null, null);
INSERT INTO `domicilio` VALUES ('59', '176', 'Aquiles Serdán', '', '222', '', 'Colima', 'Colima', '', 'Colima, Colima', '1', null, null);
INSERT INTO `domicilio` VALUES ('60', '177', 'Gregorio Torres Quintero', 'Altos', '70', '', 'Colima', 'Colima', '', 'Colonia Centro, Colima, Colima', '1', null, null);
INSERT INTO `domicilio` VALUES ('61', '178', 'Ignacio Allende', '', '83', '', 'Colima', 'Colima', '', 'Colonia Centro, Colima, Colima', '1', null, null);
INSERT INTO `domicilio` VALUES ('62', '179', 'Maclovio Herrera ', 'Altos', '100', '', 'Colima', 'Colima', '', 'Colonia Jardines de Corregidora, Colima, Coli', '1', null, null);
INSERT INTO `domicilio` VALUES ('63', '180', 'Insurgentes', '', '855', '', 'Colima', 'Colima', '', 'Colonia FOVISSSTE, Colima, Colima', '1', null, null);
INSERT INTO `domicilio` VALUES ('64', '181', 'Adolfo López Mateos ', 'A', '53', '', 'Colima', 'Colima', '', 'Colonia El Moralete, Colima, Colima', '1', null, null);
INSERT INTO `domicilio` VALUES ('65', '182', 'Avenida San Fernando', '2', '505 Altos', '', 'Colima', 'Colima', '', 'Colonia Lomas de Circunvalación, Colima, Coli', '1', null, null);
INSERT INTO `domicilio` VALUES ('66', '183', 'aVENIDA tECOMÁN', '', '654', '', 'Colima', 'Colima', '28047', 'Colonia Luis Donaldo Colosio, Colima, Colima', '1', null, null);
INSERT INTO `domicilio` VALUES ('67', '184', 'Dr. Miguel Galindo', 'A', '386', '', 'Colima', 'Colima', '', 'Colonia Fátima, Colima, Colima', '1', null, null);
INSERT INTO `domicilio` VALUES ('68', '185', 'Francisco Zarco', '', '1460', '', 'Colima', 'Colima', '', 'Colonia Girasoles, Colima, Colima', '1', null, null);
INSERT INTO `domicilio` VALUES ('69', '186', 'Antonio Caso', '', '84', '', 'Colima', 'Colima', '', 'Colonia Lomas de Circunvalación, Colima, Coli', '1', null, null);
INSERT INTO `domicilio` VALUES ('70', '187', 'Francisco Zarco', '', '1460', '', 'Colima', 'Colima', '', 'Colonia Girasoles, Colima, Colima', '1', null, null);
INSERT INTO `domicilio` VALUES ('71', '188', 'Antonio Caso', '', '84', '', 'Colima', 'Colima', '', 'Colonia Lomas de Circunvalación', '1', null, null);
INSERT INTO `domicilio` VALUES ('72', '189', 'Laguna de Carrizalillos', '', '730', '', 'Colima', 'Colima', '', 'Colonia Las Víboras, Colima, Colima', '1', null, null);
INSERT INTO `domicilio` VALUES ('73', '190', 'Antonio  Caso', '', '84', '', 'Colima', 'Colima', '', 'Colonia Lomas de Circunvalación, Colima, Coli', '1', null, null);
INSERT INTO `domicilio` VALUES ('74', '191', 'Caxitlán', '', '368', '', 'Colima', 'Colima', '28046', 'Colonia Oriental', '1', null, null);
INSERT INTO `domicilio` VALUES ('75', '192', 'Francisco Zarco', '', '1460', '', 'Colima', 'Colima', '', 'Colonia Girasoles, Colima, Colima', '1', null, null);
INSERT INTO `domicilio` VALUES ('76', '193', 'Avenida Ignacio Sandoval', '2 y 3', '1956', '', 'Colima', 'Colima', '', '\"Plaza Hemmy\", Colonia la Cantera, Colima, Co', '1', null, null);
INSERT INTO `domicilio` VALUES ('77', '194', 'Francisco Zarco', '', '1460', '', 'Colima', 'Colima', '', 'Colonia Girasoles, Colima, Colima', '1', null, null);
INSERT INTO `domicilio` VALUES ('78', '195', 'Antonio Caso', '', '84', '', 'Colima', 'Colima', '', 'Colonia Lomas de Circunvalación, Colima, Coli', '1', null, null);
INSERT INTO `domicilio` VALUES ('79', '196', 'España', '', '330', '', 'Colima', 'Colima', '', 'Colonia Centro, Colima, Colima', '1', null, null);
INSERT INTO `domicilio` VALUES ('80', '197', 'Profesor Gregorio Torres Quintero', '', '157', '', 'Colima', 'Colima', '', 'Colonia Centro, Colima, Colima', '1', null, null);
INSERT INTO `domicilio` VALUES ('81', '198', 'Francisco Zarco', '', '1460', '', 'Colima', 'Colima', '', 'Colonia Girasoles, Colima, Colima', '1', null, null);
INSERT INTO `domicilio` VALUES ('82', '199', 'Antonio Caso', '', '84', '', 'Colima', 'Colima', '', 'Colonia Lomas de Circunvalación, Colima, Coli', '1', null, null);

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
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of envios
-- ----------------------------
INSERT INTO `envios` VALUES ('16', '7', '2', '3', '2017-11-22 19:23:42');
INSERT INTO `envios` VALUES ('17', '9', '2', '4', '2017-11-22 20:01:47');
INSERT INTO `envios` VALUES ('18', '13', '2', '3', '2017-11-23 20:13:48');
INSERT INTO `envios` VALUES ('19', '9', '2', '4', '2017-11-23 20:14:42');
INSERT INTO `envios` VALUES ('20', '13', '3', '6', '2017-11-23 20:19:41');
INSERT INTO `envios` VALUES ('21', '9', '2', '4', '2017-11-27 19:13:27');
INSERT INTO `envios` VALUES ('22', '10', '2', '3', '2017-11-27 19:13:37');
INSERT INTO `envios` VALUES ('23', '11', '2', '3', '2017-11-27 19:13:51');
INSERT INTO `envios` VALUES ('24', '12', '2', '3', '2017-11-27 19:14:03');
INSERT INTO `envios` VALUES ('25', '13', '2', '4', '2017-11-27 19:14:13');
INSERT INTO `envios` VALUES ('26', '14', '2', '3', '2017-11-27 19:14:21');
INSERT INTO `envios` VALUES ('27', '15', '2', '4', '2017-11-27 19:14:31');
INSERT INTO `envios` VALUES ('28', '17', '2', '4', '2017-11-27 19:14:51');
INSERT INTO `envios` VALUES ('29', '11', '2', '4', '2017-11-27 19:15:27');
INSERT INTO `envios` VALUES ('30', '10', '3', '5', '2017-11-27 20:29:37');
INSERT INTO `envios` VALUES ('31', '12', '3', '7', '2017-11-30 19:15:49');
INSERT INTO `envios` VALUES ('32', '12', '7', '10', '2017-11-30 19:20:30');
INSERT INTO `envios` VALUES ('33', '11', '2', '4', '2017-12-01 15:01:03');
INSERT INTO `envios` VALUES ('34', '12', '2', '3', '2017-12-01 15:01:41');
INSERT INTO `envios` VALUES ('35', '14', '2', '3', '2017-12-01 15:03:48');
INSERT INTO `envios` VALUES ('36', '17', '2', '3', '2017-12-01 15:06:49');
INSERT INTO `envios` VALUES ('37', '20', '2', '4', '2017-12-01 15:07:20');
INSERT INTO `envios` VALUES ('38', '21', '2', '3', '2017-12-01 15:14:20');
INSERT INTO `envios` VALUES ('39', '21', '2', '3', '2017-12-01 15:15:56');
INSERT INTO `envios` VALUES ('40', '22', '2', '4', '2017-12-01 15:21:55');
INSERT INTO `envios` VALUES ('41', '23', '2', '3', '2017-12-01 15:25:05');
INSERT INTO `envios` VALUES ('42', '24', '2', '4', '2017-12-01 15:33:41');
INSERT INTO `envios` VALUES ('43', '25', '2', '3', '2017-12-01 15:35:25');
INSERT INTO `envios` VALUES ('44', '17', '4', '8', '2017-12-01 20:32:24');
INSERT INTO `envios` VALUES ('45', '17', '8', '10', '2017-12-01 20:36:40');
INSERT INTO `envios` VALUES ('46', '26', '2', '4', '2017-12-04 19:17:56');
INSERT INTO `envios` VALUES ('47', '27', '2', '3', '2017-12-04 19:21:12');
INSERT INTO `envios` VALUES ('48', '28', '2', '3', '2017-12-04 19:28:01');
INSERT INTO `envios` VALUES ('49', '29', '2', '4', '2017-12-04 19:31:51');
INSERT INTO `envios` VALUES ('50', '30', '2', '3', '2017-12-04 19:39:25');
INSERT INTO `envios` VALUES ('51', '31', '2', '4', '2017-12-04 19:41:53');
INSERT INTO `envios` VALUES ('52', '32', '2', '4', '2017-12-05 17:30:20');
INSERT INTO `envios` VALUES ('53', '33', '2', '3', '2017-12-05 17:32:56');
INSERT INTO `envios` VALUES ('54', '34', '2', '4', '2017-12-05 17:36:30');
INSERT INTO `envios` VALUES ('55', '35', '2', '3', '2017-12-05 17:43:41');
INSERT INTO `envios` VALUES ('56', '37', '2', '3', '2017-12-05 17:46:52');
INSERT INTO `envios` VALUES ('57', '38', '2', '4', '2017-12-05 17:48:43');
INSERT INTO `envios` VALUES ('58', '40', '2', '3', '2017-12-05 17:51:42');
INSERT INTO `envios` VALUES ('59', '41', '2', '4', '2017-12-05 17:54:05');
INSERT INTO `envios` VALUES ('60', '30', '2', '3', '2017-12-05 17:55:25');
INSERT INTO `envios` VALUES ('61', '43', '2', '4', '2017-12-05 18:05:06');
INSERT INTO `envios` VALUES ('62', '44', '2', '3', '2017-12-05 20:45:36');
INSERT INTO `envios` VALUES ('63', '45', '2', '4', '2017-12-05 20:45:51');
INSERT INTO `envios` VALUES ('64', '46', '2', '3', '2017-12-05 20:46:02');
INSERT INTO `envios` VALUES ('65', '47', '2', '4', '2017-12-06 20:52:40');
INSERT INTO `envios` VALUES ('66', '48', '2', '3', '2017-12-06 21:02:47');
INSERT INTO `envios` VALUES ('67', '49', '2', '4', '2017-12-07 16:37:43');
INSERT INTO `envios` VALUES ('68', '51', '2', '3', '2017-12-11 19:48:03');
INSERT INTO `envios` VALUES ('69', '52', '2', '4', '2017-12-11 19:48:20');
INSERT INTO `envios` VALUES ('70', '53', '2', '3', '2017-12-11 19:48:32');
INSERT INTO `envios` VALUES ('71', '54', '2', '4', '2017-12-11 19:48:49');
INSERT INTO `envios` VALUES ('72', '55', '2', '3', '2017-12-11 19:49:01');
INSERT INTO `envios` VALUES ('73', '56', '2', '4', '2017-12-11 19:49:13');
INSERT INTO `envios` VALUES ('74', '58', '2', '3', '2017-12-11 19:49:29');
INSERT INTO `envios` VALUES ('75', '59', '2', '4', '2017-12-11 19:49:42');
INSERT INTO `envios` VALUES ('76', '60', '2', '3', '2017-12-12 18:11:35');
INSERT INTO `envios` VALUES ('77', '61', '2', '4', '2017-12-12 18:11:48');
INSERT INTO `envios` VALUES ('78', '62', '2', '3', '2017-12-12 18:12:02');
INSERT INTO `envios` VALUES ('79', '63', '2', '4', '2017-12-13 20:29:35');
INSERT INTO `envios` VALUES ('80', '64', '2', '3', '2017-12-13 20:30:03');
INSERT INTO `envios` VALUES ('81', '65', '2', '4', '2017-12-13 20:30:29');
INSERT INTO `envios` VALUES ('82', '66', '2', '3', '2017-12-13 20:30:53');
INSERT INTO `envios` VALUES ('83', '67', '2', '3', '2017-12-13 20:31:44');
INSERT INTO `envios` VALUES ('84', '69', '2', '3', '2017-12-13 20:32:05');
INSERT INTO `envios` VALUES ('85', '70', '2', '4', '2017-12-13 20:32:22');
INSERT INTO `envios` VALUES ('86', '72', '2', '3', '2017-12-13 20:32:46');
INSERT INTO `envios` VALUES ('87', '73', '2', '4', '2017-12-13 20:32:59');
INSERT INTO `envios` VALUES ('88', '74', '2', '4', '2017-12-14 17:13:55');
INSERT INTO `envios` VALUES ('89', '75', '2', '3', '2017-12-14 17:14:20');
INSERT INTO `envios` VALUES ('90', '76', '2', '4', '2017-12-15 17:10:59');
INSERT INTO `envios` VALUES ('91', '77', '2', '3', '2017-12-15 17:11:15');
INSERT INTO `envios` VALUES ('92', '78', '2', '4', '2017-12-15 17:11:31');
INSERT INTO `envios` VALUES ('93', '79', '2', '4', '2017-12-15 17:11:46');
INSERT INTO `envios` VALUES ('94', '80', '2', '4', '2017-12-15 17:12:19');

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
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of expediente
-- ----------------------------
INSERT INTO `expediente` VALUES ('7', '2', '127', '19', '1', 'ASUNTO: DAP', '1', '2017-11-22 19:15:03');
INSERT INTO `expediente` VALUES ('9', '2', '128', '11', '897', 'ASUNTO: Nulidad de boleta de infracción', '1', '2017-11-22 19:40:01');
INSERT INTO `expediente` VALUES ('10', '2', '129', '11', '898', 'ASUNTO: Nulidad de boleta de infracción', '1', '2017-11-22 20:00:50');
INSERT INTO `expediente` VALUES ('11', '2', '130', '18', '899', 'ASUNTO: Nulidad de boleta de infracción', '1', '2017-11-22 20:15:39');
INSERT INTO `expediente` VALUES ('12', '2', '131', '11', '900', 'ASUNTO: Nulidad de boleta de infracción', '1', '2017-11-22 20:25:04');
INSERT INTO `expediente` VALUES ('13', '2', '132', '11', '901', 'ASUNTO: Nulidad de boleta de infracción', '1', '2017-11-22 20:39:59');
INSERT INTO `expediente` VALUES ('14', '2', '133', '16', '902', 'ASUNTO: Jubilación de agente vial', '1', '2017-11-24 17:29:13');
INSERT INTO `expediente` VALUES ('15', '2', '134', '20', '903', 'ASUNTO: Nulidad de boleta de infracción', '1', '2017-11-24 17:31:32');
INSERT INTO `expediente` VALUES ('16', '2', '0', '27', '904', 'ASUNTO: CIAPACOV', '1', '2017-11-24 17:34:42');
INSERT INTO `expediente` VALUES ('17', '2', '135', '11', '904', 'ASUNTO: CIAPACOV', '1', '2017-11-24 17:35:18');
INSERT INTO `expediente` VALUES ('20', '2', '137', '11', '905', 'ASUNTO: CIAPACOV', '1', '2017-11-28 20:03:46');
INSERT INTO `expediente` VALUES ('21', '2', '138', '16', '906', 'ASUNTO:DAP', '1', '2017-12-01 15:13:41');
INSERT INTO `expediente` VALUES ('22', '2', '140', '20', '907', 'ASUNTO: Nulidad de boleta de infracción', '1', '2017-12-01 15:21:02');
INSERT INTO `expediente` VALUES ('23', '2', '141', '18', '908', 'ASUNTO: Nulidad de boleta de infracción', '1', '2017-12-01 15:23:40');
INSERT INTO `expediente` VALUES ('24', '2', '142', '62', '909', 'ASUNTO: Destitución de agente de Seguridad Pública', '1', '2018-05-08 01:18:59');
INSERT INTO `expediente` VALUES ('25', '2', '143', '11', '910', 'ASUNTO: Nulidad de boleta de infracción', '1', '2017-12-01 15:34:38');
INSERT INTO `expediente` VALUES ('26', '2', '147', '11', '913', 'ASUNTO: Nulidad de boleta de infracción', '1', '2017-12-04 19:16:02');
INSERT INTO `expediente` VALUES ('27', '2', '148', '11', '914', 'ASUNTO: Nulidad de boleta de infracción', '1', '2017-12-04 19:18:39');
INSERT INTO `expediente` VALUES ('28', '2', '150', '11', '916', 'ASUNTO: Nulidad de boleta de infracción', '1', '2017-12-04 19:24:08');
INSERT INTO `expediente` VALUES ('29', '2', '151', '87', '917', 'ASUNTO: Nulidad de boleta de infracción', '1', '2017-12-04 19:30:24');
INSERT INTO `expediente` VALUES ('30', '2', '152', '11', '918', 'ASUNTO: Nulidad de boleta de infracción', '1', '2017-12-04 19:36:45');
INSERT INTO `expediente` VALUES ('31', '2', '153', '18', '919', 'ASUNTO: Nulidad de boleta de infracción', '1', '2017-12-04 19:40:31');
INSERT INTO `expediente` VALUES ('32', '2', '163', '18', '919', 'ASUNTO: Nulidad de Boleta de infracción', '1', '2017-12-05 17:28:19');
INSERT INTO `expediente` VALUES ('33', '2', '154', '11', '920', 'ASUNTO: Nulidad de boleta de infracción', '1', '2017-12-05 17:31:41');
INSERT INTO `expediente` VALUES ('34', '2', '155', '11', '921', 'ASUNTO: Nulidad de boleta de infracción', '1', '2017-12-05 17:33:47');
INSERT INTO `expediente` VALUES ('35', '2', '156', '11', '922', 'ASUNTO: Nulidad de boleta de infracción y devolución del pago de lo indebido', '1', '2017-12-05 17:41:42');
INSERT INTO `expediente` VALUES ('36', '2', '157', '11', '923', 'ASUNTO: Responsabilidad patrimonial del Estado', '1', '2017-12-05 17:44:38');
INSERT INTO `expediente` VALUES ('37', '2', '159', '15', '924', 'ASUNTO: DAP', '1', '2017-12-05 17:45:51');
INSERT INTO `expediente` VALUES ('38', '2', '160', '11', '925', 'ASUNTO: Nulidad de boleta de infracción', '1', '2017-12-05 17:47:45');
INSERT INTO `expediente` VALUES ('39', '2', '0', '11', '926', 'ASUNTO: Nulidad de boleta de infracción', '1', '2017-12-05 17:49:59');
INSERT INTO `expediente` VALUES ('40', '2', '161', '11', '926', 'ASUNTO: Nulidad de boleta de infracción', '1', '2017-12-05 17:50:45');
INSERT INTO `expediente` VALUES ('41', '2', '143', '11', '927', 'ASUNTO: Nulidad de boleta de infracción', '1', '2017-12-05 17:53:10');
INSERT INTO `expediente` VALUES ('42', '2', '143', '11', '928', 'ASUNTO: Nulidad de boleta de infracción', '1', '2017-12-05 17:54:43');
INSERT INTO `expediente` VALUES ('43', '2', '162', '11', '929', 'ASUNTO: Despido injustificado de elemento de seguridad pública', '1', '2017-12-05 18:04:16');
INSERT INTO `expediente` VALUES ('44', '2', '164', '17', '930', 'ASUNTO: CIAPACOV', '1', '2017-12-05 20:39:53');
INSERT INTO `expediente` VALUES ('45', '2', '165', '15', '931', 'ASUNTO: Nulidad de acta de notificación', '1', '2017-12-05 20:43:21');
INSERT INTO `expediente` VALUES ('46', '2', '166', '20', '932', 'ASUNTO: Nulidad de boleta de infracción', '1', '2017-12-05 20:45:02');
INSERT INTO `expediente` VALUES ('47', '2', '167', '28', '933', 'ASUNTO: Nulidad de resolución Administrativa que impone multa y suspende acciones de construcción en el Puerto de Manzanillo', '1', '2017-12-06 17:04:28');
INSERT INTO `expediente` VALUES ('48', '2', '169', '94', '934', 'ASUNTO: Nulidad de resolución que niega la cancelación total de una anotación en el Instituto del Registro del Territorio de Colima', '1', '2017-12-06 20:55:52');
INSERT INTO `expediente` VALUES ('49', '2', '170', '23', '935', 'ASUNTO: Restitución de policías e indemnización constitucional', '1', '2017-12-07 16:37:18');
INSERT INTO `expediente` VALUES ('50', '2', '0', '17', '936', 'ASUNTO:  Nulidad en contra del Proceso de Licitación Pública Nacional Presencial No. OM-002/2017', '1', '2017-12-11 19:02:05');
INSERT INTO `expediente` VALUES ('51', '2', '171', '17', '936', 'ASUNTO: Nulidad deL Proceso de Licitación  Pública Nacional Presencial No. OM_002/2017', '1', '2017-12-11 19:04:34');
INSERT INTO `expediente` VALUES ('52', '2', '172', '11', '937', 'ASUNTO: Nulidad de boleta de infracción', '1', '2017-12-11 19:09:51');
INSERT INTO `expediente` VALUES ('53', '2', '179', '18', '938', 'ASUNTO: Nulidad de boleta de infracción', '1', '2017-12-11 19:26:33');
INSERT INTO `expediente` VALUES ('54', '2', '174', '18', '939', 'ASUNTO: Nulidad de boleta de infracción', '1', '2017-12-11 19:32:18');
INSERT INTO `expediente` VALUES ('55', '2', '180', '11', '940', 'ASUNTO: Nulidad de boleta de tránsito', '1', '2017-12-11 19:38:14');
INSERT INTO `expediente` VALUES ('56', '2', '176', '11', '941', 'ASUNTO: Nulidad de boleta de infracción', '1', '2017-12-11 19:40:00');
INSERT INTO `expediente` VALUES ('57', '2', '0', '18', '942', 'ASUNTO: Nulidad de boleta de infracción', '1', '2017-12-11 19:42:15');
INSERT INTO `expediente` VALUES ('58', '2', '177', '18', '942', 'ASUNTO: Nulidad de boleta de infracción', '1', '2017-12-11 19:43:16');
INSERT INTO `expediente` VALUES ('59', '2', '178', '62', '943', 'ASUNTO: Nulidad de orden de retiro emitida por la Dirección de Ecología y Salud del H. Ayuntamiento Constitucional de Cuauhtémoc', '1', '2018-05-08 01:19:11');
INSERT INTO `expediente` VALUES ('60', '2', '181', '11', '944', 'ASUNTO: Nulidad de boleta de infracción', '1', '2017-12-12 17:38:26');
INSERT INTO `expediente` VALUES ('61', '2', '182', '11', '945', 'ASUNTO: Nulidad de boleta de infracción', '1', '2017-12-12 17:40:05');
INSERT INTO `expediente` VALUES ('62', '2', '183', '16', '946', 'ASUNTO: Nulidad de Resolución administrativa que ordena la clausura definitiva de un local comercial', '1', '2017-12-12 18:09:48');
INSERT INTO `expediente` VALUES ('63', '2', '184', '18', '947', 'ASUNTO: Nulidad de boleta de infracción', '1', '2017-12-13 19:39:27');
INSERT INTO `expediente` VALUES ('64', '2', '185', '11', '948', 'ASUNTO: Nulidad del boleta de infracción', '1', '2017-12-13 19:53:24');
INSERT INTO `expediente` VALUES ('65', '2', '186', '24', '949', 'ASUNTO: DAP', '1', '2017-12-13 19:55:54');
INSERT INTO `expediente` VALUES ('66', '2', '187', '18', '950', 'ASUNTO: Nulidad de boleta de infracción', '1', '2017-12-13 20:00:14');
INSERT INTO `expediente` VALUES ('67', '2', '190', '24', '951', 'ASUNTO: DAP', '1', '2017-12-13 20:02:40');
INSERT INTO `expediente` VALUES ('68', '2', '189', '11', '952', '', '1', '2017-12-13 20:16:06');
INSERT INTO `expediente` VALUES ('69', '2', '189', '11', '952', 'ASUNTO: Nulidad de boleta de infracción', '1', '2017-12-13 20:16:53');
INSERT INTO `expediente` VALUES ('70', '2', '188', '24', '953', 'ASUNTO: DAP', '1', '2017-12-13 20:18:21');
INSERT INTO `expediente` VALUES ('71', '2', '0', '16', '954', 'ASUNTO: Responsabilidad patrimonial del Estado', '1', '2017-12-13 20:19:37');
INSERT INTO `expediente` VALUES ('72', '2', '191', '24', '954', 'ASUNTO: DAP', '1', '2017-12-13 20:22:23');
INSERT INTO `expediente` VALUES ('73', '2', '192', '11', '955', 'ASUNTO: Nulidad de boleta de infracción', '1', '2017-12-13 20:25:04');
INSERT INTO `expediente` VALUES ('74', '2', '193', '30', '957', 'ASUNTO: Afirmativa ficta respecto a permiso de construcción de obra\r\nhidráulica con fines de riego agrícola', '1', '2017-12-14 17:07:20');
INSERT INTO `expediente` VALUES ('75', '2', '194', '11', '958', 'ASUNTO: Nulidad de boleta de infracción inserta en Estado de Cuenta', '1', '2017-12-14 17:13:04');
INSERT INTO `expediente` VALUES ('76', '2', '197', '24', '959', 'ASUNTO: Nulidad del requerimiento de pago relativo al impuesto predial', '1', '2017-12-15 16:23:52');
INSERT INTO `expediente` VALUES ('77', '2', '198', '15', '960', 'ASUNTO: Nulidad de requerimiento de pago relativo a una multa de infracción', '1', '2017-12-15 16:27:58');
INSERT INTO `expediente` VALUES ('78', '2', '199', '24', '961', 'ASUNTO: DAP', '1', '2017-12-15 16:43:28');
INSERT INTO `expediente` VALUES ('79', '2', '127', '19', '962', 'ASUNTO: DAP', '1', '2017-12-15 16:47:10');
INSERT INTO `expediente` VALUES ('80', '2', '196', '11', '963', 'ASUNTO: Nulidad de boleta de infracción', '1', '2017-12-15 17:09:23');
INSERT INTO `expediente` VALUES ('81', '2', '147', '0', '964', '', '1', '2018-03-29 22:22:34');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of institucion
-- ----------------------------
INSERT INTO `institucion` VALUES ('11', 'Director de Tránsito y Vialidad del H. Ayuntamiento Constitucional de Colima', null, null, 'transito', null, null);
INSERT INTO `institucion` VALUES ('13', 'Dirección de Transporte de Gobierno', null, null, 'transporte', null, null);
INSERT INTO `institucion` VALUES ('15', 'Tesorero del H. Ayuntamiento Constitucional de Colima', null, null, null, null, null);
INSERT INTO `institucion` VALUES ('16', 'H. Ayuntamiento Constitucional de Colima', null, null, null, null, null);
INSERT INTO `institucion` VALUES ('17', 'H. Ayuntamiento Constitucional de Villa de Álvarez', null, null, null, null, null);
INSERT INTO `institucion` VALUES ('18', 'Director de Seguridad Pública  del H. Ayuntamiento Constitucional de Villa de Álvarez', null, null, null, null, null);
INSERT INTO `institucion` VALUES ('19', 'Presidente del H. Ayuntamiento Constitucional de Armería', null, null, null, null, null);
INSERT INTO `institucion` VALUES ('20', 'Director de  Seguridad Pública del H. Ayuntamiento Constitucional de Tecomán', null, null, null, null, null);
INSERT INTO `institucion` VALUES ('21', 'Tesorero  del  H.  Ayuntamiento Constitucional de Villa de Álvarez', null, null, null, null, null);
INSERT INTO `institucion` VALUES ('22', 'Director de Desarrollo Urbano  y Ecología de H. Ayuntamiento Constitucional de Colima ', null, null, null, null, null);
INSERT INTO `institucion` VALUES ('23', 'H. Ayuntamiento Constitucional de Coquimatlán', null, null, null, null, null);
INSERT INTO `institucion` VALUES ('24', 'H. Ayuntamiento Constitucional de Manzanillo', null, null, null, null, null);
INSERT INTO `institucion` VALUES ('25', 'Tesorero del H. Ayuntamiento Constitucional de Armería', null, null, null, null, null);
INSERT INTO `institucion` VALUES ('26', 'Presidente del H. Ayuntamiento Constitucional de  Colima ', null, null, null, null, null);
INSERT INTO `institucion` VALUES ('27', 'Director de Inspección y Licencias del Municipio de Colima', null, null, null, null, null);
INSERT INTO `institucion` VALUES ('28', 'Presidente del H. Ayuntamiento Constitucional de Manzanillo ', null, null, null, null, null);
INSERT INTO `institucion` VALUES ('29', 'Director de Ingresos del H. Ayuntamiento Constitucional de Colima', null, null, null, null, null);
INSERT INTO `institucion` VALUES ('30', 'Director de Desarrollo Urbano y Ecología del Ayuntamiento de Manzanillo ', null, null, null, null, null);
INSERT INTO `institucion` VALUES ('31', 'Secretario del H. Ayuntamiento Constitucional de Colima ', null, null, null, null, null);
INSERT INTO `institucion` VALUES ('32', 'Tesorero del H. Ayuntamiento Constitucional de Manzanillo ', null, null, null, null, null);
INSERT INTO `institucion` VALUES ('33', 'H. Ayuntamiento Constitucional de Tecomán ', null, null, null, null, null);
INSERT INTO `institucion` VALUES ('34', 'Tesorero del H. Ayuntamiento Constitucional de Tecomán ', null, null, null, null, null);
INSERT INTO `institucion` VALUES ('35', 'Director General de Catastro del Municipio de Colima ', null, null, null, null, null);
INSERT INTO `institucion` VALUES ('36', 'Presidente del H. Ayuntamiento de Villa de Álvarez', null, null, null, null, null);
INSERT INTO `institucion` VALUES ('37', 'Síndico del H. Ayuntamiento Constitucional de Colima ', null, null, null, null, null);
INSERT INTO `institucion` VALUES ('38', 'Director de Seguridad Pública de Armería', null, null, null, null, null);
INSERT INTO `institucion` VALUES ('39', 'Secretario  General  del  H.  Ayuntamiento  Constitucional de Villa de Álvarez ', null, null, null, null, null);
INSERT INTO `institucion` VALUES ('40', 'Secretario del Ayuntamiento Constitucional de Armería ', null, null, null, null, null);
INSERT INTO `institucion` VALUES ('41', 'Presidente del H. Ayuntamiento  Constitucional de Minatitlán', null, null, null, null, null);
INSERT INTO `institucion` VALUES ('42', 'Director  de  Seguridad  Pública  del  H.  Ayuntamiento  de  Coquimatlán', null, null, null, null, null);
INSERT INTO `institucion` VALUES ('43', 'Director de Tránsito y Vialidad de Armería', null, null, null, null, null);
INSERT INTO `institucion` VALUES ('44', 'H. Ayuntamiento Constitucional de Ixtlahuacán ', null, null, null, null, null);
INSERT INTO `institucion` VALUES ('45', 'Receptoría de Rentas de Villa de Álvarez', null, null, null, null, null);
INSERT INTO `institucion` VALUES ('46', 'Presidente del H. Ayuntamiento Constitucional de Comala ', null, null, null, null, null);
INSERT INTO `institucion` VALUES ('47', 'Director de Seguridad Pública y Vialidad de Manzanillo ', null, null, null, null, null);
INSERT INTO `institucion` VALUES ('48', 'H. Cabildo del H. Ayuntamiento Constitucional de Colima ', null, null, null, null, null);
INSERT INTO `institucion` VALUES ('50', 'Director  de  Desarrollo Urbano y Ecología de Villa de Álvarez ', null, null, null, null, null);
INSERT INTO `institucion` VALUES ('51', 'Director de Catastro de Villa de Álvarez', null, null, null, null, null);
INSERT INTO `institucion` VALUES ('52', 'Secretario  del  H. Ayuntamiento  Constitucional de Manzanillo', null, null, null, null, null);
INSERT INTO `institucion` VALUES ('53', 'Subdirector  de  Permisos, Licencias Vía Pública del  H. Ayuntamiento Constitucional de Tecomán ', null, null, null, null, null);
INSERT INTO `institucion` VALUES ('54', 'Receptor de Rentas del H. Ayuntamiento Constitucional de Manzanillo  ', null, null, null, null, null);
INSERT INTO `institucion` VALUES ('55', 'Cabildo  del  H.  Ayuntamiento  Constitucional  de  Villa  de  Álvarez', null, null, null, null, null);
INSERT INTO `institucion` VALUES ('56', 'Director de Inspección y Licencias del H. Ayuntamiento Constitucional de Manzanillo ', null, null, null, null, null);
INSERT INTO `institucion` VALUES ('57', 'Presidente Municipal del H. Ayuntamiento Constitucional de Coquimatlán ', null, null, null, null, null);
INSERT INTO `institucion` VALUES ('58', 'Tesorero del H. Ayuntamiento Constitucional de Coquimatlán ', null, null, null, null, null);
INSERT INTO `institucion` VALUES ('59', 'Secretario del H. Ayuntamiento Constitucional de Comala ', null, null, null, null, null);
INSERT INTO `institucion` VALUES ('60', 'Director General de Servicios Públicos Municipales del H. Ayuntamiento Constitucional de Colima ', null, null, null, null, null);
INSERT INTO `institucion` VALUES ('62', 'Presidente Municipal del H. Ayuntamiento Constitucional de Cuauhtémoc ', null, null, null, null, null);
INSERT INTO `institucion` VALUES ('63', 'Tesorero del H. Ayuntamiento Constitucional de Cuauhtémoc', null, null, null, null, null);
INSERT INTO `institucion` VALUES ('64', 'Director de Ingresos del H. Ayuntamiento Constitucional de Villa de Álvarez ', null, null, null, null, null);
INSERT INTO `institucion` VALUES ('67', 'Tesorero del H.Ayuntamiento Constitucional de Coquimatlán ', null, null, null, null, null);
INSERT INTO `institucion` VALUES ('68', 'Cabildo del H. Ayuntamiento Constitucional de Comala ', null, null, null, null, null);
INSERT INTO `institucion` VALUES ('70', 'Presidente del H. Ayuntamiento Constitucional de Tecomán ', null, null, null, null, null);
INSERT INTO `institucion` VALUES ('71', 'Cabildo del H. Ayuntamiento Constitucional de Armería ', null, null, null, null, null);
INSERT INTO `institucion` VALUES ('72', 'H. Ayuntamiento Constitucional de Armería ', null, null, null, null, null);
INSERT INTO `institucion` VALUES ('73', 'Director de Catastro del H. Ayuntamiento Constitucional de Armería ', null, null, null, null, null);
INSERT INTO `institucion` VALUES ('74', 'Consejo de Honor y de Justicia del H. Ayuntamiento Constitucional de Manzanillo ', null, null, null, null, null);
INSERT INTO `institucion` VALUES ('75', 'Director de Catastro del H. Ayuntamiento Constitucional de Manzanillo ', null, null, null, null, null);
INSERT INTO `institucion` VALUES ('76', 'Director de Catastro del H. Ayuntamiento Constitucional de Cuauhtémoc ', null, null, null, null, null);
INSERT INTO `institucion` VALUES ('78', 'Tesorero del H. Ayuntamiento Constitucional de Cuauhtémoc ', null, null, null, null, null);
INSERT INTO `institucion` VALUES ('79', 'H. Ayuntamiento Constitucional de Cuauhtémoc ', null, null, null, null, null);
INSERT INTO `institucion` VALUES ('80', 'Tesorero del H. Ayuntamiento Constitucional de Coquimatlán ', null, null, null, null, null);
INSERT INTO `institucion` VALUES ('82', 'Presidente Municipal del H. Ayuntamiento Constitucional de Ixtlahuacán', null, null, null, null, null);
INSERT INTO `institucion` VALUES ('83', 'Oficina Catastral del H. Ayuntamiento Constitucional de Colima ', null, null, null, null, null);
INSERT INTO `institucion` VALUES ('86', 'Receptor de Rentas del H. Ayuntamiento Constitucional de Tecomán', null, null, null, null, null);
INSERT INTO `institucion` VALUES ('87', 'Dirección de Transporte de Gobierno', null, null, null, null, null);
INSERT INTO `institucion` VALUES ('88', 'Dirección de Ingresos del Gobierno del Estado de Colima', null, null, null, null, null);
INSERT INTO `institucion` VALUES ('89', 'Centro de Desarrollo Educativo de Colima A.C.', null, null, null, null, null);
INSERT INTO `institucion` VALUES ('90', 'Secretaría General del Gobierno del Estado de Colima ', null, null, null, null, null);
INSERT INTO `institucion` VALUES ('91', 'Secretaría de Salud y Previsión Social ', null, null, null, null, null);
INSERT INTO `institucion` VALUES ('92', 'Secretario de Finanzas del Gobierno del Estado', null, null, null, null, null);
INSERT INTO `institucion` VALUES ('93', 'Secretario de Educación del Gobierno del Estado', null, null, null, null, null);
INSERT INTO `institucion` VALUES ('94', 'Director del Registro Público de la Propiedad', null, null, null, null, null);
INSERT INTO `institucion` VALUES ('95', 'Gobernador Constitucional del Estado', null, null, null, null, null);
INSERT INTO `institucion` VALUES ('96', 'Procuraduría General de Justicia del Estado', null, null, null, null, null);
INSERT INTO `institucion` VALUES ('146', 'Comisión Intermunicipal de Agua Potable y Alc', '3120523', 'Null', 'CIAPACOV', null, null);

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
) ENGINE=InnoDB AUTO_INCREMENT=156 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of involucrados
-- ----------------------------
INSERT INTO `involucrados` VALUES ('13', '127', '7', '2', '1', '2017-11-22 19:15:03');
INSERT INTO `involucrados` VALUES ('14', '19', '7', '1', '1', '2017-11-22 19:15:03');
INSERT INTO `involucrados` VALUES ('17', '128', '9', '2', '1', '2017-11-22 19:40:01');
INSERT INTO `involucrados` VALUES ('18', '11', '9', '1', '1', '2017-11-22 19:40:01');
INSERT INTO `involucrados` VALUES ('19', '129', '10', '2', '1', '2017-11-22 20:00:50');
INSERT INTO `involucrados` VALUES ('20', '11', '10', '1', '1', '2017-11-22 20:00:50');
INSERT INTO `involucrados` VALUES ('21', '130', '11', '2', '1', '2017-11-22 20:15:39');
INSERT INTO `involucrados` VALUES ('22', '18', '11', '1', '1', '2017-11-22 20:15:39');
INSERT INTO `involucrados` VALUES ('23', '131', '12', '2', '1', '2017-11-22 20:25:04');
INSERT INTO `involucrados` VALUES ('24', '11', '12', '1', '1', '2017-11-22 20:25:04');
INSERT INTO `involucrados` VALUES ('25', '132', '13', '2', '1', '2017-11-22 20:39:59');
INSERT INTO `involucrados` VALUES ('26', '11', '13', '1', '1', '2017-11-22 20:39:59');
INSERT INTO `involucrados` VALUES ('27', '133', '14', '2', '1', '2017-11-24 17:29:13');
INSERT INTO `involucrados` VALUES ('28', '16', '14', '1', '1', '2017-11-24 17:29:13');
INSERT INTO `involucrados` VALUES ('29', '134', '15', '2', '1', '2017-11-24 17:31:32');
INSERT INTO `involucrados` VALUES ('30', '20', '15', '1', '1', '2017-11-24 17:31:32');
INSERT INTO `involucrados` VALUES ('32', '135', '17', '2', '1', '2017-11-24 17:35:18');
INSERT INTO `involucrados` VALUES ('33', '146', '17', '1', '1', '2017-11-24 17:35:18');
INSERT INTO `involucrados` VALUES ('37', '137', '20', '2', '1', '2017-11-28 20:03:46');
INSERT INTO `involucrados` VALUES ('38', '11', '20', '1', '1', '2017-11-28 20:03:46');
INSERT INTO `involucrados` VALUES ('39', '138', '21', '2', '1', '2017-12-01 15:13:41');
INSERT INTO `involucrados` VALUES ('40', '16', '21', '1', '1', '2017-12-01 15:13:41');
INSERT INTO `involucrados` VALUES ('41', '140', '22', '2', '1', '2017-12-01 15:21:02');
INSERT INTO `involucrados` VALUES ('42', '20', '22', '1', '1', '2017-12-01 15:21:02');
INSERT INTO `involucrados` VALUES ('43', '141', '23', '2', '1', '2017-12-01 15:23:40');
INSERT INTO `involucrados` VALUES ('44', '18', '23', '1', '1', '2017-12-01 15:23:40');
INSERT INTO `involucrados` VALUES ('45', '142', '24', '2', '1', '2017-12-01 15:27:27');
INSERT INTO `involucrados` VALUES ('46', '61', '24', '1', '1', '2017-12-01 15:27:27');
INSERT INTO `involucrados` VALUES ('47', '143', '25', '2', '1', '2017-12-01 15:34:38');
INSERT INTO `involucrados` VALUES ('48', '11', '25', '1', '1', '2017-12-01 15:34:38');
INSERT INTO `involucrados` VALUES ('49', '147', '26', '2', '1', '2017-12-04 19:16:02');
INSERT INTO `involucrados` VALUES ('50', '11', '26', '1', '1', '2017-12-04 19:16:02');
INSERT INTO `involucrados` VALUES ('51', '148', '27', '2', '1', '2017-12-04 19:18:39');
INSERT INTO `involucrados` VALUES ('52', '11', '27', '1', '1', '2017-12-04 19:18:39');
INSERT INTO `involucrados` VALUES ('53', '150', '28', '2', '1', '2017-12-04 19:24:08');
INSERT INTO `involucrados` VALUES ('54', '11', '28', '1', '1', '2017-12-04 19:24:08');
INSERT INTO `involucrados` VALUES ('55', '151', '29', '2', '1', '2017-12-04 19:30:24');
INSERT INTO `involucrados` VALUES ('56', '87', '29', '1', '1', '2017-12-04 19:30:24');
INSERT INTO `involucrados` VALUES ('57', '152', '30', '2', '1', '2017-12-04 19:36:45');
INSERT INTO `involucrados` VALUES ('58', '11', '30', '1', '1', '2017-12-04 19:36:45');
INSERT INTO `involucrados` VALUES ('59', '153', '31', '2', '1', '2017-12-04 19:40:31');
INSERT INTO `involucrados` VALUES ('60', '18', '31', '1', '1', '2017-12-04 19:40:31');
INSERT INTO `involucrados` VALUES ('61', '163', '32', '2', '1', '2017-12-05 17:28:19');
INSERT INTO `involucrados` VALUES ('62', '18', '32', '1', '1', '2017-12-05 17:28:19');
INSERT INTO `involucrados` VALUES ('63', '154', '33', '2', '1', '2017-12-05 17:31:41');
INSERT INTO `involucrados` VALUES ('64', '11', '33', '1', '1', '2017-12-05 17:31:41');
INSERT INTO `involucrados` VALUES ('65', '155', '34', '2', '1', '2017-12-05 17:33:47');
INSERT INTO `involucrados` VALUES ('66', '11', '34', '1', '1', '2017-12-05 17:33:47');
INSERT INTO `involucrados` VALUES ('67', '156', '35', '2', '1', '2017-12-05 17:41:42');
INSERT INTO `involucrados` VALUES ('68', '11', '35', '1', '1', '2017-12-05 17:41:42');
INSERT INTO `involucrados` VALUES ('69', '157', '36', '2', '1', '2017-12-05 17:44:38');
INSERT INTO `involucrados` VALUES ('70', '11', '36', '1', '1', '2017-12-05 17:44:38');
INSERT INTO `involucrados` VALUES ('71', '159', '37', '2', '1', '2017-12-05 17:45:51');
INSERT INTO `involucrados` VALUES ('72', '15', '37', '1', '1', '2017-12-05 17:45:51');
INSERT INTO `involucrados` VALUES ('73', '160', '38', '2', '1', '2017-12-05 17:47:45');
INSERT INTO `involucrados` VALUES ('74', '11', '38', '1', '1', '2017-12-05 17:47:45');
INSERT INTO `involucrados` VALUES ('76', '161', '40', '2', '1', '2017-12-05 17:50:45');
INSERT INTO `involucrados` VALUES ('77', '11', '40', '1', '1', '2017-12-05 17:50:45');
INSERT INTO `involucrados` VALUES ('78', '143', '41', '2', '1', '2017-12-05 17:53:11');
INSERT INTO `involucrados` VALUES ('79', '11', '41', '1', '1', '2017-12-05 17:53:11');
INSERT INTO `involucrados` VALUES ('80', '143', '42', '2', '1', '2017-12-05 17:54:43');
INSERT INTO `involucrados` VALUES ('81', '11', '42', '1', '1', '2017-12-05 17:54:43');
INSERT INTO `involucrados` VALUES ('82', '162', '43', '2', '1', '2017-12-05 18:04:16');
INSERT INTO `involucrados` VALUES ('83', '11', '43', '1', '1', '2017-12-05 18:04:16');
INSERT INTO `involucrados` VALUES ('84', '164', '44', '2', '1', '2017-12-05 20:39:53');
INSERT INTO `involucrados` VALUES ('85', '17', '44', '1', '1', '2017-12-05 20:39:53');
INSERT INTO `involucrados` VALUES ('86', '165', '45', '2', '1', '2017-12-05 20:43:21');
INSERT INTO `involucrados` VALUES ('87', '15', '45', '1', '1', '2017-12-05 20:43:21');
INSERT INTO `involucrados` VALUES ('88', '166', '46', '2', '1', '2017-12-05 20:45:02');
INSERT INTO `involucrados` VALUES ('89', '20', '46', '1', '1', '2017-12-05 20:45:02');
INSERT INTO `involucrados` VALUES ('90', '167', '47', '2', '1', '2017-12-06 17:04:28');
INSERT INTO `involucrados` VALUES ('91', '28', '47', '1', '1', '2017-12-06 17:04:28');
INSERT INTO `involucrados` VALUES ('92', '169', '48', '2', '1', '2017-12-06 20:55:52');
INSERT INTO `involucrados` VALUES ('93', '94', '48', '1', '1', '2017-12-06 20:55:52');
INSERT INTO `involucrados` VALUES ('94', '170', '49', '2', '1', '2017-12-07 16:37:18');
INSERT INTO `involucrados` VALUES ('95', '23', '49', '1', '1', '2017-12-07 16:37:18');
INSERT INTO `involucrados` VALUES ('97', '171', '51', '2', '1', '2017-12-11 19:04:34');
INSERT INTO `involucrados` VALUES ('98', '17', '51', '1', '1', '2017-12-11 19:04:34');
INSERT INTO `involucrados` VALUES ('99', '172', '52', '2', '1', '2017-12-11 19:09:51');
INSERT INTO `involucrados` VALUES ('100', '11', '52', '1', '1', '2017-12-11 19:09:51');
INSERT INTO `involucrados` VALUES ('101', '179', '53', '2', '1', '2017-12-11 19:26:33');
INSERT INTO `involucrados` VALUES ('102', '18', '53', '1', '1', '2017-12-11 19:26:33');
INSERT INTO `involucrados` VALUES ('103', '174', '54', '2', '1', '2017-12-11 19:32:18');
INSERT INTO `involucrados` VALUES ('104', '18', '54', '1', '1', '2017-12-11 19:32:18');
INSERT INTO `involucrados` VALUES ('105', '180', '55', '2', '1', '2017-12-11 19:38:14');
INSERT INTO `involucrados` VALUES ('106', '11', '55', '1', '1', '2017-12-11 19:38:14');
INSERT INTO `involucrados` VALUES ('107', '176', '56', '2', '1', '2017-12-11 19:40:00');
INSERT INTO `involucrados` VALUES ('108', '11', '56', '1', '1', '2017-12-11 19:40:00');
INSERT INTO `involucrados` VALUES ('110', '177', '58', '2', '1', '2017-12-11 19:43:16');
INSERT INTO `involucrados` VALUES ('111', '18', '58', '1', '1', '2017-12-11 19:43:16');
INSERT INTO `involucrados` VALUES ('112', '178', '59', '2', '1', '2017-12-11 19:46:39');
INSERT INTO `involucrados` VALUES ('113', '61', '59', '1', '1', '2017-12-11 19:46:39');
INSERT INTO `involucrados` VALUES ('114', '181', '60', '2', '1', '2017-12-12 17:38:26');
INSERT INTO `involucrados` VALUES ('115', '11', '60', '1', '1', '2017-12-12 17:38:26');
INSERT INTO `involucrados` VALUES ('116', '182', '61', '2', '1', '2017-12-12 17:40:05');
INSERT INTO `involucrados` VALUES ('117', '11', '61', '1', '1', '2017-12-12 17:40:05');
INSERT INTO `involucrados` VALUES ('118', '183', '62', '2', '1', '2017-12-12 18:09:48');
INSERT INTO `involucrados` VALUES ('119', '16', '62', '1', '1', '2017-12-12 18:09:48');
INSERT INTO `involucrados` VALUES ('120', '184', '63', '2', '1', '2017-12-13 19:39:27');
INSERT INTO `involucrados` VALUES ('121', '18', '63', '1', '1', '2017-12-13 19:39:27');
INSERT INTO `involucrados` VALUES ('122', '185', '64', '2', '1', '2017-12-13 19:53:24');
INSERT INTO `involucrados` VALUES ('123', '11', '64', '1', '1', '2017-12-13 19:53:24');
INSERT INTO `involucrados` VALUES ('124', '186', '65', '2', '1', '2017-12-13 19:55:54');
INSERT INTO `involucrados` VALUES ('125', '24', '65', '1', '1', '2017-12-13 19:55:54');
INSERT INTO `involucrados` VALUES ('126', '187', '66', '2', '1', '2017-12-13 20:00:14');
INSERT INTO `involucrados` VALUES ('127', '18', '66', '1', '1', '2017-12-13 20:00:14');
INSERT INTO `involucrados` VALUES ('128', '190', '67', '2', '1', '2017-12-13 20:02:40');
INSERT INTO `involucrados` VALUES ('129', '24', '67', '1', '1', '2017-12-13 20:02:40');
INSERT INTO `involucrados` VALUES ('130', '189', '68', '2', '1', '2017-12-13 20:16:06');
INSERT INTO `involucrados` VALUES ('131', '11', '68', '1', '1', '2017-12-13 20:16:06');
INSERT INTO `involucrados` VALUES ('132', '189', '69', '2', '1', '2017-12-13 20:16:53');
INSERT INTO `involucrados` VALUES ('133', '11', '69', '1', '1', '2017-12-13 20:16:53');
INSERT INTO `involucrados` VALUES ('134', '188', '70', '2', '1', '2017-12-13 20:18:21');
INSERT INTO `involucrados` VALUES ('135', '24', '70', '1', '1', '2017-12-13 20:18:21');
INSERT INTO `involucrados` VALUES ('137', '191', '72', '2', '1', '2017-12-13 20:22:23');
INSERT INTO `involucrados` VALUES ('138', '24', '72', '1', '1', '2017-12-13 20:22:24');
INSERT INTO `involucrados` VALUES ('139', '192', '73', '2', '1', '2017-12-13 20:25:04');
INSERT INTO `involucrados` VALUES ('140', '11', '73', '1', '1', '2017-12-13 20:25:04');
INSERT INTO `involucrados` VALUES ('141', '193', '74', '2', '1', '2017-12-14 17:07:20');
INSERT INTO `involucrados` VALUES ('142', '30', '74', '1', '1', '2017-12-14 17:07:20');
INSERT INTO `involucrados` VALUES ('143', '194', '75', '2', '1', '2017-12-14 17:13:04');
INSERT INTO `involucrados` VALUES ('144', '11', '75', '1', '1', '2017-12-14 17:13:04');
INSERT INTO `involucrados` VALUES ('145', '197', '76', '2', '1', '2017-12-15 16:23:52');
INSERT INTO `involucrados` VALUES ('146', '24', '76', '1', '1', '2017-12-15 16:23:52');
INSERT INTO `involucrados` VALUES ('147', '198', '77', '2', '1', '2017-12-15 16:27:58');
INSERT INTO `involucrados` VALUES ('148', '15', '77', '1', '1', '2017-12-15 16:27:58');
INSERT INTO `involucrados` VALUES ('149', '199', '78', '2', '1', '2017-12-15 16:43:28');
INSERT INTO `involucrados` VALUES ('150', '24', '78', '1', '1', '2017-12-15 16:43:28');
INSERT INTO `involucrados` VALUES ('151', '127', '79', '2', '1', '2017-12-15 16:47:10');
INSERT INTO `involucrados` VALUES ('152', '19', '79', '1', '1', '2017-12-15 16:47:10');
INSERT INTO `involucrados` VALUES ('153', '196', '80', '2', '1', '2017-12-15 17:09:23');
INSERT INTO `involucrados` VALUES ('154', '11', '80', '1', '1', '2017-12-15 17:09:23');
INSERT INTO `involucrados` VALUES ('155', '147', '81', '2', '1', '2018-03-29 22:22:34');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('3', '2018_01_11_010502_create_role_user_table', '1');
INSERT INTO `migrations` VALUES ('4', '2018_01_12_222726_create_roles_table', '1');
INSERT INTO `migrations` VALUES ('5', '2018_01_31_191902_crear_persona', '1');
INSERT INTO `migrations` VALUES ('6', '2018_01_31_192448_crear_institucion', '1');
INSERT INTO `migrations` VALUES ('7', '2018_01_31_192512_crear_expediente', '1');
INSERT INTO `migrations` VALUES ('8', '2018_01_31_192537_crear_anexopdf', '1');
INSERT INTO `migrations` VALUES ('9', '2018_01_31_192601_crear_involucrados', '1');
INSERT INTO `migrations` VALUES ('10', '2018_01_31_192622_crear_domicilio', '1');
INSERT INTO `migrations` VALUES ('11', '2018_01_31_211241_crear_tipo_seguimiento', '1');
INSERT INTO `migrations` VALUES ('12', '2018_01_31_212203_crear_rol_involucrado', '1');
INSERT INTO `migrations` VALUES ('13', '2018_01_31_213031_crear_tipo_documento', '1');
INSERT INTO `migrations` VALUES ('14', '2018_04_20_063500_create_envios_table', '1');
INSERT INTO `migrations` VALUES ('15', '2018_04_20_071125_create_seguimiento_table', '1');
INSERT INTO `migrations` VALUES ('16', '2018_04_20_073936_create_notificaciones_table', '1');

-- ----------------------------
-- Table structure for modulo
-- ----------------------------
DROP TABLE IF EXISTS `modulo`;
CREATE TABLE `modulo` (
  `idmodulo` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador único de la tabla',
  `modulo` varchar(45) DEFAULT NULL COMMENT 'EXTERNOS\nOFICIALIA DE PARTES\nSECRETARIA DE ACUERDOS\nPROYECTISTA\nAMPAROS\nMAGISTRADO',
  `descripcion` varchar(45) DEFAULT NULL COMMENT 'Descripcion del modulo ',
  `fechasis` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'fecha del sistema la cual marca el día y hora de aceptación y elaboración del expediente',
  `status` int(11) DEFAULT NULL COMMENT 'Borrado lógico\n0: activo\n1: borrado lógico',
  PRIMARY KEY (`idmodulo`),
  UNIQUE KEY `idmodulo_UNIQUE` (`idmodulo`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of modulo
-- ----------------------------
INSERT INTO `modulo` VALUES ('1', 'Ciudadano', 'Usuarios externos al sistema', '2017-03-05 02:13:08', '0');
INSERT INTO `modulo` VALUES ('2', 'Oficialia de Partes', 'Usuario interno', '2017-03-05 02:13:08', '0');
INSERT INTO `modulo` VALUES ('3', 'Secretaria de Acuerdos', 'Usuario interno', '2017-03-05 02:13:08', '0');
INSERT INTO `modulo` VALUES ('4', 'Actuarios', 'Usuario interno', '2017-03-05 02:13:08', '0');
INSERT INTO `modulo` VALUES ('5', 'Proyectos de Sentencias', 'Usuario interno', '2017-03-05 02:13:08', '0');
INSERT INTO `modulo` VALUES ('6', 'Magistrado', 'Usuario interno', '2017-03-05 02:13:08', '0');
INSERT INTO `modulo` VALUES ('7', 'Amparos', 'Usuario interno', '2017-03-05 02:13:08', '0');
INSERT INTO `modulo` VALUES ('8', 'Administrador del Sistema', 'Usuario interno', '2017-03-05 13:02:30', '0');

-- ----------------------------
-- Table structure for notificaciones
-- ----------------------------
DROP TABLE IF EXISTS `notificaciones`;
CREATE TABLE `notificaciones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_actuario` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `id_expediente` int(11) NOT NULL,
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
  `usuario` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of persona
-- ----------------------------
INSERT INTO `persona` VALUES ('12', 'MOMJ540626HCMRNV00', null, null, 'FISICA', null, 'recartcolima@hotmail.com', null, null);
INSERT INTO `persona` VALUES ('127', '', '3128545', '31041622', 'Fisica', '', 'Gabriel Ángel Zepeda Padilla', null, null);
INSERT INTO `persona` VALUES ('128', 'GAMG930410MCMRRB04', '3128545', '3121041622', 'Fisica', '', 'Antonio de Jesús González López', null, null);
INSERT INTO `persona` VALUES ('129', 'GAMG930410MCMRRB02', '3128545', '3121041622', 'Fisica', '', 'José Luis Ochoa Sahagún', null, null);
INSERT INTO `persona` VALUES ('130', 'GAMG930410MCMRRB05', '3128545', '3121041622', 'Fisica', '', 'Vicente Emanuel Solano Anguiano', null, null);
INSERT INTO `persona` VALUES ('131', 'GAMG930410MCMRRB00', '3128545', '3121041622', 'Fisica', '', 'Ma. Magdalena Pérez Castañeda', null, null);
INSERT INTO `persona` VALUES ('132', 'GAMG930410MCMRRB01', '3128545', '3121041622', 'Fisica', '', 'Eduardo Padilla Gálvez', null, null);
INSERT INTO `persona` VALUES ('133', 'GAMG930410MCMRRB06', '3128545', '3121041622', 'Fisica', '', 'José Ignacio Paz Esparza', null, null);
INSERT INTO `persona` VALUES ('134', 'GAMG930410MCMRRB07', '3128545', '3121041622', 'Fisica', '', 'Arturo Peña Delgadillo', null, null);
INSERT INTO `persona` VALUES ('135', 'GAMG930410MCMRRB08', '3128545', '3121041622', 'Fisica', '', '', null, null);
INSERT INTO `persona` VALUES ('136', 'GAMG930410MCMRRB09', '3128545', '3121041622', 'Fisica', '', 'José Reyes Marcial Hernández', null, null);
INSERT INTO `persona` VALUES ('137', 'GAMG930410MCMRRB12', '3128545', '3121041622', 'Fisica', '', 'Vidal Reyes Villalvazo', null, null);
INSERT INTO `persona` VALUES ('138', 'GAMG930410MCMRRB11', '3128545', '3121041622', 'Fisica', '', 'María Eufamia Ramos Castellanos', null, null);
INSERT INTO `persona` VALUES ('139', 'GAMG930410MCMRRB13', '3128545', '3121041622', 'Fisica', '', '', null, null);
INSERT INTO `persona` VALUES ('140', 'GAMG930410MCMRRB14', '3128545', '3121041622', 'Fisica', '', 'Edgar Manuel Toscano Moreno', null, null);
INSERT INTO `persona` VALUES ('141', 'GAMG930410MCMRRB19', '3128545', '3121041622', 'Fisica', '', 'Jesús Amed Torres Medina', null, null);
INSERT INTO `persona` VALUES ('142', 'GAMG930410MCMRRB20', '3128545', '3121041622', 'Fisica', '', 'Andrés Ramírez Mendoza', null, null);
INSERT INTO `persona` VALUES ('143', 'GAMG930410MCMRRB21', '3128545', '3121041622', 'Fisica', '', 'Francisco Javier Amezcua Rincón', null, null);
INSERT INTO `persona` VALUES ('144', '.', '3128545', '3121041622', 'Moral', 'Proveedora Hospitalaria de Colima S.A. de C.V', 'Proveedora Hospilataria de Colima S.A. de C.V', null, null);
INSERT INTO `persona` VALUES ('145', 'GAMG930410MCMRRB23', '3128545', '3128545', 'Fisica', '', 'Teresa Barragán Ornelas', null, null);
INSERT INTO `persona` VALUES ('147', 'GAMG930410MCMRRB42', '', '', 'Fisica', '', 'Brayan Iván Arias Larios', null, null);
INSERT INTO `persona` VALUES ('148', 'GAMG930410MCMRRB22', '', '', 'Fisica', '', 'Cielo María Larios Cortés', null, null);
INSERT INTO `persona` VALUES ('150', 'GAMG930410MCMRRB27', '', '', 'Fisica', '', 'José Luis Gallegos Martínez', null, null);
INSERT INTO `persona` VALUES ('151', 'GAMG930410MCMRRB85', '', '', 'Fisica', '', 'Adrián Martínez Torres', null, null);
INSERT INTO `persona` VALUES ('152', 'GAMG930410MCMRRB51', '', '', 'Fisica', '', 'José de Jesús Morán Martín', null, null);
INSERT INTO `persona` VALUES ('153', 'GAMG930410MCMRRB54', '', '', 'Fisica', '', 'Vanessa Amador Larios', null, null);
INSERT INTO `persona` VALUES ('154', 'GAMG930410MC1111RB04', '', '', 'Fisica', '', 'María Elba Rodríguez Camarena', null, null);
INSERT INTO `persona` VALUES ('155', 'fgggggg', '', '', 'Fisica', '', 'Saúl Alejandro Jiménez Sánchez', null, null);
INSERT INTO `persona` VALUES ('156', '1111111111111111', '', '', 'Fisica', '', 'María de Lourdes Sánchez Martínez', null, null);
INSERT INTO `persona` VALUES ('157', '222222222222222222222', '', '', 'Fisica', '', 'Pedro Dante Ceballos Hernández', null, null);
INSERT INTO `persona` VALUES ('158', '1111111111111111111111', '', '', 'Fisica', '', '', null, null);
INSERT INTO `persona` VALUES ('159', '1111111111111', '', '', 'Fisica', '', 'Ezrikam Eckhaus Solís Cámara', null, null);
INSERT INTO `persona` VALUES ('160', '11111111', '', '', 'Fisica', '', 'Luis Eduardo Schulte Orozco', null, null);
INSERT INTO `persona` VALUES ('161', '111', '', '', 'Fisica', '', 'Leonardo Torres González', null, null);
INSERT INTO `persona` VALUES ('162', '22222222222222', '', '', 'Fisica', '', 'Enrique Barajas de la Vega', null, null);
INSERT INTO `persona` VALUES ('163', '1111111111122211111', '', '', 'Fisica', '', 'Vanessa Amador Orozco', null, null);
INSERT INTO `persona` VALUES ('164', '1010101010', '', '', 'Fisica', '', 'José Eduardo Murillo Lugo', null, null);
INSERT INTO `persona` VALUES ('165', '102101201', '', '', 'Fisica', '', 'Carlos Hugo James Ibañez', null, null);
INSERT INTO `persona` VALUES ('166', '123123123', '', '', 'Fisica', '', 'Carlos Alberto Ramírez Barajas', null, null);
INSERT INTO `persona` VALUES ('167', '000000000', '', '', 'Moral', 'Administración Portuaria Integral de Manzanil', 'Administración Portuaria Integral de Manzanil', null, null);
INSERT INTO `persona` VALUES ('168', '10213210213', '', '', 'Moral', 'Adame Conatrucciones Electromecánicas S.A. de', 'Adame Conatrucciones Electromecánicas S.A. de', null, null);
INSERT INTO `persona` VALUES ('169', '12301230', '', '', 'Moral', 'Adame Construcciones Electromecánicas S.A. de', 'Adame Construcciones Electromecánicas S.A. de', null, null);
INSERT INTO `persona` VALUES ('170', '15478', '', '', 'Fisica', '', 'Alberto Ramón López Peralta', null, null);
INSERT INTO `persona` VALUES ('171', '12312312307', '', '', 'Moral', 'Industrias GFE S.A.P.I. de C.V.', 'Industias GFE S.A.P.I. de C.V.', null, null);
INSERT INTO `persona` VALUES ('172', '102301', '', '', 'Fisica', '', 'Ma. de Jesús Ramírez Andrade', null, null);
INSERT INTO `persona` VALUES ('173', '104', '', '', 'Fisica', '', 'Francisco Pinal Ruiz', null, null);
INSERT INTO `persona` VALUES ('174', '2000', '', '', 'Fisica', '', 'Mauricio Cervantes Picazo', null, null);
INSERT INTO `persona` VALUES ('175', '111119', '', '', 'Fisica', '', 'Esteban Armin Torres Cárdenas', null, null);
INSERT INTO `persona` VALUES ('176', '251544', '', '', 'Fisica', '', 'José Armando Vuelvas Alcaraz', null, null);
INSERT INTO `persona` VALUES ('177', '1568', '', '', 'Fisica', '', 'Hugo Fernando Sosa Ortega', null, null);
INSERT INTO `persona` VALUES ('178', '1254', '', '', 'Fisica', '', 'José Antonio Cortes Chávez', null, null);
INSERT INTO `persona` VALUES ('179', '1642', '', '', 'Fisica', '', 'Francisco Pinal Ruiz', null, null);
INSERT INTO `persona` VALUES ('180', '125454577', '', '', 'Fisica', '', 'Esteban Armin Torres Cárdenas', null, null);
INSERT INTO `persona` VALUES ('181', '147825963', '', '', 'Fisica', '', 'Roberto Martínez Pacheco', null, null);
INSERT INTO `persona` VALUES ('182', '96325', '', '', 'Fisica', '', 'Mario Arturo Bravo Pérez', null, null);
INSERT INTO `persona` VALUES ('183', '1478', '', '', 'Fisica', '', 'Luz del Alba Leonor López Carmona', null, null);
INSERT INTO `persona` VALUES ('184', '147854', '', '', 'Fisica', '', 'Pablo Abraham Rodríguez Guzmán', null, null);
INSERT INTO `persona` VALUES ('185', '5214', '', '', 'Fisica', '', 'Imelda María González Llerenas', null, null);
INSERT INTO `persona` VALUES ('186', '14632', '', '', 'Moral', 'Inmobiliaria BEAPA S.A. de C.V.', 'Inmobiliaria BEAPA S.A. de C.V.', null, null);
INSERT INTO `persona` VALUES ('187', '454', '', '', 'Fisica', '', 'Hugo Alejandro Ruíz Venegas', null, null);
INSERT INTO `persona` VALUES ('188', '1248', '', '', 'Fisica', '', 'Marco Antonio Suárez Solís', null, null);
INSERT INTO `persona` VALUES ('189', '783', '', '', 'Fisica', '', 'Jorge Arturo Martínez Venegas', null, null);
INSERT INTO `persona` VALUES ('190', '5845', '', '', 'Fisica', '', 'Pablo Michel Hernández', null, null);
INSERT INTO `persona` VALUES ('191', '4567', '', '', 'Fisica', '', 'Elda Gizel Zúñiga Cárdenas', null, null);
INSERT INTO `persona` VALUES ('192', '29879', '', '', 'Fisica', '', 'Víctor David López Vázquez', null, null);
INSERT INTO `persona` VALUES ('193', '16846', '', '', 'Moral', 'Citrojugos S.A. de C.V.', 'Citrojugos S.A. de C.V.', null, null);
INSERT INTO `persona` VALUES ('194', '9445', '', '', 'Fisica', '', 'Luis Eduardo Schulte Orozco', null, null);
INSERT INTO `persona` VALUES ('195', '21644', '', '', 'Moral', 'Súper Kiosko S.A. de C.V. ', 'Súper Kiosko S.A. de C.V.', null, null);
INSERT INTO `persona` VALUES ('196', '159753', '', '', 'Fisica', '', 'Carmen Castillo Velasco', null, null);
INSERT INTO `persona` VALUES ('197', '84685', '', '', 'Moral', 'Comisión Federal de Electricidad', 'Comisión Federal de Electricidad ', null, null);
INSERT INTO `persona` VALUES ('198', '6584552', '', '', 'Fisica', '', 'José Alejandro Lozano Viera', null, null);
INSERT INTO `persona` VALUES ('199', '4584', '', '', 'Moral', 'Súper Kiosko S.A. de C.V. ', 'Súper Kiosko S.A. de C.V.', null, null);

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
INSERT INTO `roles` VALUES ('1', 'Administrador', 'Administrador del sistema', '2018-05-06 18:40:05', '2018-05-06 18:40:05');
INSERT INTO `roles` VALUES ('2', 'Oficial de Partes', 'Oficial del partes', '2018-05-06 18:40:05', '2018-05-06 18:40:05');
INSERT INTO `roles` VALUES ('3', 'Secretario de Acuerdos', 'Secretario de acuerdos en la demanda', '2018-05-06 18:40:05', '2018-05-06 18:40:05');
INSERT INTO `roles` VALUES ('4', 'Proyectista', 'Proyectista de sentencias', '2018-05-06 18:40:05', '2018-05-06 18:40:05');
INSERT INTO `roles` VALUES ('5', 'Actuario', 'Actuario de acuerdos', '2018-05-06 18:40:05', '2018-05-06 18:40:05');
INSERT INTO `roles` VALUES ('6', 'Magistrado', 'Magistrado administrador del sistema', '2018-05-06 18:40:05', '2018-05-06 18:40:05');
INSERT INTO `roles` VALUES ('7', 'Usuario', 'Usuario del sistema', '2018-05-06 18:40:05', '2018-05-06 18:40:05');
INSERT INTO `roles` VALUES ('8', 'Amparos', 'Cotejador de amparos', '2018-05-06 18:40:05', '2018-05-06 18:40:05');
INSERT INTO `roles` VALUES ('9', 'Institución', 'Institución publica ', '2018-05-06 18:40:05', '2018-05-06 18:40:05');

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
) ENGINE=InnoDB AUTO_INCREMENT=200 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of role_user
-- ----------------------------
INSERT INTO `role_user` VALUES ('1', '1', '1', '2018-05-17 19:58:17', '2018-05-17 19:58:17');
INSERT INTO `role_user` VALUES ('2', '2', '2', '2018-05-17 19:58:17', '2018-05-17 19:58:17');
INSERT INTO `role_user` VALUES ('3', '3', '3', '2018-05-17 19:58:17', '2018-05-17 19:58:17');
INSERT INTO `role_user` VALUES ('4', '3', '4', '2018-05-17 19:58:18', '2018-05-17 19:58:18');
INSERT INTO `role_user` VALUES ('5', '5', '5', '2018-05-17 19:58:18', '2018-05-17 19:58:18');
INSERT INTO `role_user` VALUES ('6', '5', '6', '2018-05-17 19:58:18', '2018-05-17 19:58:18');
INSERT INTO `role_user` VALUES ('7', '4', '7', '2018-05-17 19:58:18', '2018-05-17 19:58:18');
INSERT INTO `role_user` VALUES ('8', '4', '8', '2018-05-17 19:58:18', '2018-05-17 19:58:18');
INSERT INTO `role_user` VALUES ('9', '8', '9', '2018-05-17 19:58:18', '2018-05-17 19:58:18');
INSERT INTO `role_user` VALUES ('10', '6', '10', '2018-05-17 19:58:18', '2018-05-17 19:58:18');
INSERT INTO `role_user` VALUES ('11', '9', '11', '2018-05-17 19:58:18', '2018-05-17 19:58:18');
INSERT INTO `role_user` VALUES ('12', '7', '12', '2018-05-17 19:58:18', '2018-05-17 19:58:18');
INSERT INTO `role_user` VALUES ('13', '9', '13', '2018-05-17 19:58:18', '2018-05-17 19:58:18');
INSERT INTO `role_user` VALUES ('14', '7', '14', '2018-05-17 19:58:18', '2018-05-17 19:58:18');
INSERT INTO `role_user` VALUES ('15', '9', '15', '2018-05-17 19:58:18', '2018-05-17 19:58:18');
INSERT INTO `role_user` VALUES ('16', '9', '16', '2018-05-17 19:58:19', '2018-05-17 19:58:19');
INSERT INTO `role_user` VALUES ('17', '9', '17', '2018-05-17 19:58:19', '2018-05-17 19:58:19');
INSERT INTO `role_user` VALUES ('18', '9', '18', '2018-05-17 19:58:19', '2018-05-17 19:58:19');
INSERT INTO `role_user` VALUES ('19', '9', '19', '2018-05-17 19:58:19', '2018-05-17 19:58:19');
INSERT INTO `role_user` VALUES ('20', '9', '20', '2018-05-17 19:58:19', '2018-05-17 19:58:19');
INSERT INTO `role_user` VALUES ('21', '9', '21', '2018-05-17 19:58:19', '2018-05-17 19:58:19');
INSERT INTO `role_user` VALUES ('22', '9', '22', '2018-05-17 19:58:19', '2018-05-17 19:58:19');
INSERT INTO `role_user` VALUES ('23', '9', '23', '2018-05-17 19:58:19', '2018-05-17 19:58:19');
INSERT INTO `role_user` VALUES ('24', '9', '24', '2018-05-17 19:58:19', '2018-05-17 19:58:19');
INSERT INTO `role_user` VALUES ('25', '9', '25', '2018-05-17 19:58:19', '2018-05-17 19:58:19');
INSERT INTO `role_user` VALUES ('26', '9', '26', '2018-05-17 19:58:19', '2018-05-17 19:58:19');
INSERT INTO `role_user` VALUES ('27', '9', '27', '2018-05-17 19:58:19', '2018-05-17 19:58:19');
INSERT INTO `role_user` VALUES ('28', '9', '28', '2018-05-17 19:58:19', '2018-05-17 19:58:19');
INSERT INTO `role_user` VALUES ('29', '9', '29', '2018-05-17 19:58:20', '2018-05-17 19:58:20');
INSERT INTO `role_user` VALUES ('30', '9', '30', '2018-05-17 19:58:20', '2018-05-17 19:58:20');
INSERT INTO `role_user` VALUES ('31', '9', '31', '2018-05-17 19:58:20', '2018-05-17 19:58:20');
INSERT INTO `role_user` VALUES ('32', '9', '32', '2018-05-17 19:58:20', '2018-05-17 19:58:20');
INSERT INTO `role_user` VALUES ('33', '9', '33', '2018-05-17 19:58:20', '2018-05-17 19:58:20');
INSERT INTO `role_user` VALUES ('34', '9', '34', '2018-05-17 19:58:20', '2018-05-17 19:58:20');
INSERT INTO `role_user` VALUES ('35', '9', '35', '2018-05-17 19:58:20', '2018-05-17 19:58:20');
INSERT INTO `role_user` VALUES ('36', '9', '36', '2018-05-17 19:58:20', '2018-05-17 19:58:20');
INSERT INTO `role_user` VALUES ('37', '9', '37', '2018-05-17 19:58:20', '2018-05-17 19:58:20');
INSERT INTO `role_user` VALUES ('38', '9', '38', '2018-05-17 19:58:20', '2018-05-17 19:58:20');
INSERT INTO `role_user` VALUES ('39', '9', '39', '2018-05-17 19:58:21', '2018-05-17 19:58:21');
INSERT INTO `role_user` VALUES ('40', '9', '40', '2018-05-17 19:58:21', '2018-05-17 19:58:21');
INSERT INTO `role_user` VALUES ('41', '9', '41', '2018-05-17 19:58:21', '2018-05-17 19:58:21');
INSERT INTO `role_user` VALUES ('42', '9', '42', '2018-05-17 19:58:21', '2018-05-17 19:58:21');
INSERT INTO `role_user` VALUES ('43', '9', '43', '2018-05-17 19:58:21', '2018-05-17 19:58:21');
INSERT INTO `role_user` VALUES ('44', '9', '44', '2018-05-17 19:58:21', '2018-05-17 19:58:21');
INSERT INTO `role_user` VALUES ('45', '9', '45', '2018-05-17 19:58:21', '2018-05-17 19:58:21');
INSERT INTO `role_user` VALUES ('46', '9', '46', '2018-05-17 19:58:21', '2018-05-17 19:58:21');
INSERT INTO `role_user` VALUES ('47', '9', '47', '2018-05-17 19:58:21', '2018-05-17 19:58:21');
INSERT INTO `role_user` VALUES ('48', '9', '48', '2018-05-17 19:58:21', '2018-05-17 19:58:21');
INSERT INTO `role_user` VALUES ('49', '7', '49', '2018-05-17 19:58:21', '2018-05-17 19:58:21');
INSERT INTO `role_user` VALUES ('50', '9', '50', '2018-05-17 19:58:21', '2018-05-17 19:58:21');
INSERT INTO `role_user` VALUES ('51', '9', '51', '2018-05-17 19:58:22', '2018-05-17 19:58:22');
INSERT INTO `role_user` VALUES ('52', '9', '52', '2018-05-17 19:58:22', '2018-05-17 19:58:22');
INSERT INTO `role_user` VALUES ('53', '9', '53', '2018-05-17 19:58:22', '2018-05-17 19:58:22');
INSERT INTO `role_user` VALUES ('54', '9', '54', '2018-05-17 19:58:22', '2018-05-17 19:58:22');
INSERT INTO `role_user` VALUES ('55', '9', '55', '2018-05-17 19:58:22', '2018-05-17 19:58:22');
INSERT INTO `role_user` VALUES ('56', '9', '56', '2018-05-17 19:58:22', '2018-05-17 19:58:22');
INSERT INTO `role_user` VALUES ('57', '7', '57', '2018-05-17 19:58:22', '2018-05-17 19:58:22');
INSERT INTO `role_user` VALUES ('58', '9', '58', '2018-05-17 19:58:22', '2018-05-17 19:58:22');
INSERT INTO `role_user` VALUES ('59', '9', '59', '2018-05-17 19:58:22', '2018-05-17 19:58:22');
INSERT INTO `role_user` VALUES ('60', '9', '60', '2018-05-17 19:58:22', '2018-05-17 19:58:22');
INSERT INTO `role_user` VALUES ('61', '7', '61', '2018-05-17 19:58:22', '2018-05-17 19:58:22');
INSERT INTO `role_user` VALUES ('62', '9', '62', '2018-05-17 19:58:22', '2018-05-17 19:58:22');
INSERT INTO `role_user` VALUES ('63', '9', '63', '2018-05-17 19:58:23', '2018-05-17 19:58:23');
INSERT INTO `role_user` VALUES ('64', '9', '64', '2018-05-17 19:58:23', '2018-05-17 19:58:23');
INSERT INTO `role_user` VALUES ('65', '7', '65', '2018-05-17 19:58:23', '2018-05-17 19:58:23');
INSERT INTO `role_user` VALUES ('66', '7', '66', '2018-05-17 19:58:23', '2018-05-17 19:58:23');
INSERT INTO `role_user` VALUES ('67', '9', '67', '2018-05-17 19:58:23', '2018-05-17 19:58:23');
INSERT INTO `role_user` VALUES ('68', '9', '68', '2018-05-17 19:58:23', '2018-05-17 19:58:23');
INSERT INTO `role_user` VALUES ('69', '7', '69', '2018-05-17 19:58:23', '2018-05-17 19:58:23');
INSERT INTO `role_user` VALUES ('70', '9', '70', '2018-05-17 19:58:23', '2018-05-17 19:58:23');
INSERT INTO `role_user` VALUES ('71', '9', '71', '2018-05-17 19:58:23', '2018-05-17 19:58:23');
INSERT INTO `role_user` VALUES ('72', '9', '72', '2018-05-17 19:58:23', '2018-05-17 19:58:23');
INSERT INTO `role_user` VALUES ('73', '9', '73', '2018-05-17 19:58:23', '2018-05-17 19:58:23');
INSERT INTO `role_user` VALUES ('74', '9', '74', '2018-05-17 19:58:23', '2018-05-17 19:58:23');
INSERT INTO `role_user` VALUES ('75', '9', '75', '2018-05-17 19:58:24', '2018-05-17 19:58:24');
INSERT INTO `role_user` VALUES ('76', '9', '76', '2018-05-17 19:58:24', '2018-05-17 19:58:24');
INSERT INTO `role_user` VALUES ('77', '7', '77', '2018-05-17 19:58:24', '2018-05-17 19:58:24');
INSERT INTO `role_user` VALUES ('78', '9', '78', '2018-05-17 19:58:24', '2018-05-17 19:58:24');
INSERT INTO `role_user` VALUES ('79', '9', '79', '2018-05-17 19:58:24', '2018-05-17 19:58:24');
INSERT INTO `role_user` VALUES ('80', '9', '80', '2018-05-17 19:58:24', '2018-05-17 19:58:24');
INSERT INTO `role_user` VALUES ('81', '9', '81', '2018-05-17 19:58:24', '2018-05-17 19:58:24');
INSERT INTO `role_user` VALUES ('82', '9', '82', '2018-05-17 19:58:24', '2018-05-17 19:58:24');
INSERT INTO `role_user` VALUES ('83', '9', '83', '2018-05-17 19:58:24', '2018-05-17 19:58:24');
INSERT INTO `role_user` VALUES ('84', '7', '84', '2018-05-17 19:58:24', '2018-05-17 19:58:24');
INSERT INTO `role_user` VALUES ('85', '7', '85', '2018-05-17 19:58:24', '2018-05-17 19:58:24');
INSERT INTO `role_user` VALUES ('86', '9', '86', '2018-05-17 19:58:24', '2018-05-17 19:58:24');
INSERT INTO `role_user` VALUES ('87', '9', '87', '2018-05-17 19:58:25', '2018-05-17 19:58:25');
INSERT INTO `role_user` VALUES ('88', '9', '88', '2018-05-17 19:58:25', '2018-05-17 19:58:25');
INSERT INTO `role_user` VALUES ('89', '9', '89', '2018-05-17 19:58:25', '2018-05-17 19:58:25');
INSERT INTO `role_user` VALUES ('90', '9', '90', '2018-05-17 19:58:25', '2018-05-17 19:58:25');
INSERT INTO `role_user` VALUES ('91', '9', '91', '2018-05-17 19:58:25', '2018-05-17 19:58:25');
INSERT INTO `role_user` VALUES ('92', '9', '92', '2018-05-17 19:58:25', '2018-05-17 19:58:25');
INSERT INTO `role_user` VALUES ('93', '9', '93', '2018-05-17 19:58:25', '2018-05-17 19:58:25');
INSERT INTO `role_user` VALUES ('94', '7', '94', '2018-05-17 19:58:25', '2018-05-17 19:58:25');
INSERT INTO `role_user` VALUES ('95', '9', '95', '2018-05-17 19:58:25', '2018-05-17 19:58:25');
INSERT INTO `role_user` VALUES ('96', '9', '96', '2018-05-17 19:58:25', '2018-05-17 19:58:25');
INSERT INTO `role_user` VALUES ('97', '7', '97', '2018-05-17 19:58:25', '2018-05-17 19:58:25');
INSERT INTO `role_user` VALUES ('98', '7', '98', '2018-05-17 19:58:26', '2018-05-17 19:58:26');
INSERT INTO `role_user` VALUES ('99', '7', '99', '2018-05-17 19:58:26', '2018-05-17 19:58:26');
INSERT INTO `role_user` VALUES ('100', '7', '100', '2018-05-17 19:58:26', '2018-05-17 19:58:26');
INSERT INTO `role_user` VALUES ('101', '7', '101', '2018-05-17 19:58:26', '2018-05-17 19:58:26');
INSERT INTO `role_user` VALUES ('102', '7', '102', '2018-05-17 19:58:26', '2018-05-17 19:58:26');
INSERT INTO `role_user` VALUES ('103', '7', '103', '2018-05-17 19:58:26', '2018-05-17 19:58:26');
INSERT INTO `role_user` VALUES ('104', '7', '104', '2018-05-17 19:58:26', '2018-05-17 19:58:26');
INSERT INTO `role_user` VALUES ('105', '7', '105', '2018-05-17 19:58:26', '2018-05-17 19:58:26');
INSERT INTO `role_user` VALUES ('106', '7', '106', '2018-05-17 19:58:26', '2018-05-17 19:58:26');
INSERT INTO `role_user` VALUES ('107', '7', '107', '2018-05-17 19:58:26', '2018-05-17 19:58:26');
INSERT INTO `role_user` VALUES ('108', '7', '108', '2018-05-17 19:58:26', '2018-05-17 19:58:26');
INSERT INTO `role_user` VALUES ('109', '7', '109', '2018-05-17 19:58:27', '2018-05-17 19:58:27');
INSERT INTO `role_user` VALUES ('110', '7', '110', '2018-05-17 19:58:27', '2018-05-17 19:58:27');
INSERT INTO `role_user` VALUES ('111', '7', '111', '2018-05-17 19:58:27', '2018-05-17 19:58:27');
INSERT INTO `role_user` VALUES ('112', '7', '112', '2018-05-17 19:58:27', '2018-05-17 19:58:27');
INSERT INTO `role_user` VALUES ('113', '7', '113', '2018-05-17 19:58:27', '2018-05-17 19:58:27');
INSERT INTO `role_user` VALUES ('114', '7', '114', '2018-05-17 19:58:27', '2018-05-17 19:58:27');
INSERT INTO `role_user` VALUES ('115', '7', '115', '2018-05-17 19:58:27', '2018-05-17 19:58:27');
INSERT INTO `role_user` VALUES ('116', '7', '116', '2018-05-17 19:58:27', '2018-05-17 19:58:27');
INSERT INTO `role_user` VALUES ('117', '7', '117', '2018-05-17 19:58:27', '2018-05-17 19:58:27');
INSERT INTO `role_user` VALUES ('118', '7', '118', '2018-05-17 19:58:27', '2018-05-17 19:58:27');
INSERT INTO `role_user` VALUES ('119', '7', '119', '2018-05-17 19:58:27', '2018-05-17 19:58:27');
INSERT INTO `role_user` VALUES ('120', '7', '120', '2018-05-17 19:58:27', '2018-05-17 19:58:27');
INSERT INTO `role_user` VALUES ('121', '7', '121', '2018-05-17 19:58:28', '2018-05-17 19:58:28');
INSERT INTO `role_user` VALUES ('122', '7', '122', '2018-05-17 19:58:28', '2018-05-17 19:58:28');
INSERT INTO `role_user` VALUES ('123', '7', '123', '2018-05-17 19:58:28', '2018-05-17 19:58:28');
INSERT INTO `role_user` VALUES ('124', '7', '124', '2018-05-17 19:58:28', '2018-05-17 19:58:28');
INSERT INTO `role_user` VALUES ('125', '7', '125', '2018-05-17 19:58:28', '2018-05-17 19:58:28');
INSERT INTO `role_user` VALUES ('126', '7', '126', '2018-05-17 19:58:28', '2018-05-17 19:58:28');
INSERT INTO `role_user` VALUES ('127', '7', '127', '2018-05-17 19:58:28', '2018-05-17 19:58:28');
INSERT INTO `role_user` VALUES ('128', '7', '128', '2018-05-17 19:58:28', '2018-05-17 19:58:28');
INSERT INTO `role_user` VALUES ('129', '7', '129', '2018-05-17 19:58:28', '2018-05-17 19:58:28');
INSERT INTO `role_user` VALUES ('130', '7', '130', '2018-05-17 19:58:28', '2018-05-17 19:58:28');
INSERT INTO `role_user` VALUES ('131', '7', '131', '2018-05-17 19:58:28', '2018-05-17 19:58:28');
INSERT INTO `role_user` VALUES ('132', '7', '132', '2018-05-17 19:58:28', '2018-05-17 19:58:28');
INSERT INTO `role_user` VALUES ('133', '7', '133', '2018-05-17 19:58:29', '2018-05-17 19:58:29');
INSERT INTO `role_user` VALUES ('134', '7', '134', '2018-05-17 19:58:29', '2018-05-17 19:58:29');
INSERT INTO `role_user` VALUES ('135', '7', '135', '2018-05-17 19:58:29', '2018-05-17 19:58:29');
INSERT INTO `role_user` VALUES ('136', '7', '136', '2018-05-17 19:58:29', '2018-05-17 19:58:29');
INSERT INTO `role_user` VALUES ('137', '7', '137', '2018-05-17 19:58:29', '2018-05-17 19:58:29');
INSERT INTO `role_user` VALUES ('138', '7', '138', '2018-05-17 19:58:29', '2018-05-17 19:58:29');
INSERT INTO `role_user` VALUES ('139', '7', '139', '2018-05-17 19:58:29', '2018-05-17 19:58:29');
INSERT INTO `role_user` VALUES ('140', '7', '140', '2018-05-17 19:58:29', '2018-05-17 19:58:29');
INSERT INTO `role_user` VALUES ('141', '7', '141', '2018-05-17 19:58:29', '2018-05-17 19:58:29');
INSERT INTO `role_user` VALUES ('142', '7', '142', '2018-05-17 19:58:29', '2018-05-17 19:58:29');
INSERT INTO `role_user` VALUES ('143', '7', '143', '2018-05-17 19:58:29', '2018-05-17 19:58:29');
INSERT INTO `role_user` VALUES ('144', '7', '144', '2018-05-17 19:58:30', '2018-05-17 19:58:30');
INSERT INTO `role_user` VALUES ('145', '7', '145', '2018-05-17 19:58:30', '2018-05-17 19:58:30');
INSERT INTO `role_user` VALUES ('146', '9', '146', '2018-05-17 19:58:30', '2018-05-17 19:58:30');
INSERT INTO `role_user` VALUES ('147', '7', '147', '2018-05-17 19:58:30', '2018-05-17 19:58:30');
INSERT INTO `role_user` VALUES ('148', '7', '148', '2018-05-17 19:58:30', '2018-05-17 19:58:30');
INSERT INTO `role_user` VALUES ('149', '7', '149', '2018-05-17 19:58:30', '2018-05-17 19:58:30');
INSERT INTO `role_user` VALUES ('150', '7', '150', '2018-05-17 19:58:30', '2018-05-17 19:58:30');
INSERT INTO `role_user` VALUES ('151', '7', '151', '2018-05-17 19:58:30', '2018-05-17 19:58:30');
INSERT INTO `role_user` VALUES ('152', '7', '152', '2018-05-17 19:58:30', '2018-05-17 19:58:30');
INSERT INTO `role_user` VALUES ('153', '7', '153', '2018-05-17 19:58:30', '2018-05-17 19:58:30');
INSERT INTO `role_user` VALUES ('154', '7', '154', '2018-05-17 19:58:30', '2018-05-17 19:58:30');
INSERT INTO `role_user` VALUES ('155', '7', '155', '2018-05-17 19:58:30', '2018-05-17 19:58:30');
INSERT INTO `role_user` VALUES ('156', '7', '156', '2018-05-17 19:58:31', '2018-05-17 19:58:31');
INSERT INTO `role_user` VALUES ('157', '7', '157', '2018-05-17 19:58:31', '2018-05-17 19:58:31');
INSERT INTO `role_user` VALUES ('158', '7', '158', '2018-05-17 19:58:31', '2018-05-17 19:58:31');
INSERT INTO `role_user` VALUES ('159', '7', '159', '2018-05-17 19:58:31', '2018-05-17 19:58:31');
INSERT INTO `role_user` VALUES ('160', '7', '160', '2018-05-17 19:58:31', '2018-05-17 19:58:31');
INSERT INTO `role_user` VALUES ('161', '7', '161', '2018-05-17 19:58:31', '2018-05-17 19:58:31');
INSERT INTO `role_user` VALUES ('162', '7', '162', '2018-05-17 19:58:31', '2018-05-17 19:58:31');
INSERT INTO `role_user` VALUES ('163', '7', '163', '2018-05-17 19:58:31', '2018-05-17 19:58:31');
INSERT INTO `role_user` VALUES ('164', '7', '164', '2018-05-17 19:58:31', '2018-05-17 19:58:31');
INSERT INTO `role_user` VALUES ('165', '7', '165', '2018-05-17 19:58:31', '2018-05-17 19:58:31');
INSERT INTO `role_user` VALUES ('166', '7', '166', '2018-05-17 19:58:32', '2018-05-17 19:58:32');
INSERT INTO `role_user` VALUES ('167', '7', '167', '2018-05-17 19:58:32', '2018-05-17 19:58:32');
INSERT INTO `role_user` VALUES ('168', '7', '168', '2018-05-17 19:58:32', '2018-05-17 19:58:32');
INSERT INTO `role_user` VALUES ('169', '7', '169', '2018-05-17 19:58:32', '2018-05-17 19:58:32');
INSERT INTO `role_user` VALUES ('170', '7', '170', '2018-05-17 19:58:32', '2018-05-17 19:58:32');
INSERT INTO `role_user` VALUES ('171', '7', '171', '2018-05-17 19:58:32', '2018-05-17 19:58:32');
INSERT INTO `role_user` VALUES ('172', '7', '172', '2018-05-17 19:58:32', '2018-05-17 19:58:32');
INSERT INTO `role_user` VALUES ('173', '7', '173', '2018-05-17 19:58:32', '2018-05-17 19:58:32');
INSERT INTO `role_user` VALUES ('174', '7', '174', '2018-05-17 19:58:32', '2018-05-17 19:58:32');
INSERT INTO `role_user` VALUES ('175', '7', '175', '2018-05-17 19:58:32', '2018-05-17 19:58:32');
INSERT INTO `role_user` VALUES ('176', '7', '176', '2018-05-17 19:58:32', '2018-05-17 19:58:32');
INSERT INTO `role_user` VALUES ('177', '7', '177', '2018-05-17 19:58:33', '2018-05-17 19:58:33');
INSERT INTO `role_user` VALUES ('178', '7', '178', '2018-05-17 19:58:33', '2018-05-17 19:58:33');
INSERT INTO `role_user` VALUES ('179', '7', '179', '2018-05-17 19:58:33', '2018-05-17 19:58:33');
INSERT INTO `role_user` VALUES ('180', '7', '180', '2018-05-17 19:58:33', '2018-05-17 19:58:33');
INSERT INTO `role_user` VALUES ('181', '7', '181', '2018-05-17 19:58:33', '2018-05-17 19:58:33');
INSERT INTO `role_user` VALUES ('182', '7', '182', '2018-05-17 19:58:33', '2018-05-17 19:58:33');
INSERT INTO `role_user` VALUES ('183', '7', '183', '2018-05-17 19:58:33', '2018-05-17 19:58:33');
INSERT INTO `role_user` VALUES ('184', '7', '184', '2018-05-17 19:58:33', '2018-05-17 19:58:33');
INSERT INTO `role_user` VALUES ('185', '7', '185', '2018-05-17 19:58:33', '2018-05-17 19:58:33');
INSERT INTO `role_user` VALUES ('186', '7', '186', '2018-05-17 19:58:33', '2018-05-17 19:58:33');
INSERT INTO `role_user` VALUES ('187', '7', '187', '2018-05-17 19:58:33', '2018-05-17 19:58:33');
INSERT INTO `role_user` VALUES ('188', '7', '188', '2018-05-17 19:58:33', '2018-05-17 19:58:33');
INSERT INTO `role_user` VALUES ('189', '7', '189', '2018-05-17 19:58:34', '2018-05-17 19:58:34');
INSERT INTO `role_user` VALUES ('190', '7', '190', '2018-05-17 19:58:34', '2018-05-17 19:58:34');
INSERT INTO `role_user` VALUES ('191', '7', '191', '2018-05-17 19:58:34', '2018-05-17 19:58:34');
INSERT INTO `role_user` VALUES ('192', '7', '192', '2018-05-17 19:58:34', '2018-05-17 19:58:34');
INSERT INTO `role_user` VALUES ('193', '7', '193', '2018-05-17 19:58:34', '2018-05-17 19:58:34');
INSERT INTO `role_user` VALUES ('194', '7', '194', '2018-05-17 19:58:34', '2018-05-17 19:58:34');
INSERT INTO `role_user` VALUES ('195', '7', '195', '2018-05-17 19:58:34', '2018-05-17 19:58:34');
INSERT INTO `role_user` VALUES ('196', '7', '196', '2018-05-17 19:58:34', '2018-05-17 19:58:34');
INSERT INTO `role_user` VALUES ('197', '7', '197', '2018-05-17 19:58:34', '2018-05-17 19:58:34');
INSERT INTO `role_user` VALUES ('198', '7', '198', '2018-05-17 19:58:34', '2018-05-17 19:58:34');
INSERT INTO `role_user` VALUES ('199', '7', '199', '2018-05-17 19:58:34', '2018-05-17 19:58:34');

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
INSERT INTO `rolinvolucrado` VALUES ('1', 'Demandado', '2018-05-06 18:40:06', '2018-05-06 18:40:06');
INSERT INTO `rolinvolucrado` VALUES ('2', 'Demandante', '2018-05-06 18:40:06', '2018-05-06 18:40:06');
INSERT INTO `rolinvolucrado` VALUES ('3', 'involucrado', '2018-05-06 18:40:06', '2018-05-06 18:40:06');

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
) ENGINE=InnoDB AUTO_INCREMENT=506 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of seguimiento
-- ----------------------------
INSERT INTO `seguimiento` VALUES ('65', '2017-11-22 19:15:03', '2', '2', 'Entrada', '7', '21', '2', 'ASUNTO: DAP');
INSERT INTO `seguimiento` VALUES ('66', '2017-11-22 19:16:32', '2', '2', 'insitu', '7', '22', '16', null);
INSERT INTO `seguimiento` VALUES ('67', '2017-11-22 19:23:42', '2', '2', 'Salida', '7', null, '4', null);
INSERT INTO `seguimiento` VALUES ('68', '2017-11-22 19:23:42', '3', '3', 'Entrada', '7', null, '4', 'Ninguna');
INSERT INTO `seguimiento` VALUES ('70', '2017-11-22 19:40:01', '2', '2', 'Entrada', '9', '24', '2', 'ASUNTO: Nulidad de boleta de infracción');
INSERT INTO `seguimiento` VALUES ('71', '2017-11-22 20:00:50', '2', '2', 'Entrada', '10', '25', '2', 'ASUNTO: Nulidad de boleta de infracción');
INSERT INTO `seguimiento` VALUES ('72', '2017-11-22 20:01:47', '2', '2', 'Salida', '9', null, '4', null);
INSERT INTO `seguimiento` VALUES ('73', '2017-11-22 20:01:47', '3', '4', 'Entrada', '9', null, '4', 'Ninguna');
INSERT INTO `seguimiento` VALUES ('74', '2017-11-22 20:02:02', '2', '2', 'insitu', '10', '26', '16', null);
INSERT INTO `seguimiento` VALUES ('75', '2017-11-22 20:02:17', '2', '2', 'insitu', '10', '27', '16', null);
INSERT INTO `seguimiento` VALUES ('76', '2017-11-22 20:04:23', '2', '2', 'insitu', '10', '28', '16', null);
INSERT INTO `seguimiento` VALUES ('77', '2017-11-22 20:15:39', '2', '2', 'Entrada', '11', '29', '2', 'ASUNTO: Nulidad de boleta de infracción');
INSERT INTO `seguimiento` VALUES ('78', '2017-11-22 20:16:03', '2', '2', 'insitu', '11', '30', '16', null);
INSERT INTO `seguimiento` VALUES ('79', '2017-11-22 20:16:12', '2', '2', 'insitu', '11', '31', '16', null);
INSERT INTO `seguimiento` VALUES ('80', '2017-11-22 20:16:22', '2', '2', 'insitu', '11', '32', '16', null);
INSERT INTO `seguimiento` VALUES ('81', '2017-11-22 20:16:29', '2', '2', 'insitu', '11', '33', '16', null);
INSERT INTO `seguimiento` VALUES ('82', '2017-11-22 20:25:04', '2', '2', 'Entrada', '12', '34', '2', 'ASUNTO: Nulidad de boleta de infracción');
INSERT INTO `seguimiento` VALUES ('83', '2017-11-22 20:32:23', '2', '2', 'insitu', '12', '35', '16', null);
INSERT INTO `seguimiento` VALUES ('84', '2017-11-22 20:32:38', '2', '2', 'insitu', '12', '36', '16', null);
INSERT INTO `seguimiento` VALUES ('85', '2017-11-22 20:39:59', '2', '2', 'Entrada', '13', '37', '2', 'ASUNTO: Nulidad de boleta de infracción');
INSERT INTO `seguimiento` VALUES ('86', '2017-11-22 20:40:22', '2', '2', 'insitu', '13', '38', '16', null);
INSERT INTO `seguimiento` VALUES ('87', '2017-11-22 20:42:16', '2', '2', 'insitu', '9', '39', '16', null);
INSERT INTO `seguimiento` VALUES ('89', '2017-11-23 20:13:48', '2', '2', 'Salida', '13', null, '4', null);
INSERT INTO `seguimiento` VALUES ('90', '2017-11-23 20:13:48', '3', '3', 'Entrada', '13', null, '4', 'Ninguna');
INSERT INTO `seguimiento` VALUES ('91', '2017-11-23 20:14:42', '2', '2', 'Salida', '9', null, '4', null);
INSERT INTO `seguimiento` VALUES ('92', '2017-11-23 20:14:42', '3', '4', 'Entrada', '9', null, '4', 'Ninguna');
INSERT INTO `seguimiento` VALUES ('94', '2017-11-23 20:19:41', '3', '3', 'Salida', '13', null, '8', null);
INSERT INTO `seguimiento` VALUES ('95', '2017-11-23 20:19:41', '4', '6', 'Entrada', '13', null, '8', null);
INSERT INTO `seguimiento` VALUES ('96', '2017-11-24 17:29:13', '2', '2', 'Entrada', '14', '42', '2', 'ASUNTO: Jubilación de agente vial');
INSERT INTO `seguimiento` VALUES ('97', '2017-11-24 17:29:45', '2', '2', 'insitu', '14', '43', '16', null);
INSERT INTO `seguimiento` VALUES ('98', '2017-11-24 17:29:56', '2', '2', 'insitu', '14', '44', '16', null);
INSERT INTO `seguimiento` VALUES ('99', '2017-11-24 17:30:06', '2', '2', 'insitu', '14', '45', '16', null);
INSERT INTO `seguimiento` VALUES ('100', '2017-11-24 17:30:17', '2', '2', 'insitu', '14', '46', '16', null);
INSERT INTO `seguimiento` VALUES ('101', '2017-11-24 17:31:32', '2', '2', 'Entrada', '15', '47', '2', 'ASUNTO: Nulidad de boleta de infracción');
INSERT INTO `seguimiento` VALUES ('102', '2017-11-24 17:31:44', '2', '2', 'insitu', '15', '48', '16', null);
INSERT INTO `seguimiento` VALUES ('103', '2017-11-24 17:32:10', '2', '2', 'insitu', '15', '49', '16', null);
INSERT INTO `seguimiento` VALUES ('104', '2017-11-24 17:32:25', '2', '2', 'insitu', '15', '50', '16', null);
INSERT INTO `seguimiento` VALUES ('105', '2017-11-24 17:32:46', '2', '2', 'insitu', '15', '51', '16', null);
INSERT INTO `seguimiento` VALUES ('106', '2017-11-24 17:32:59', '2', '2', 'insitu', '15', '52', '16', null);
INSERT INTO `seguimiento` VALUES ('107', '2017-11-24 17:34:42', '2', '2', 'Entrada', '16', '53', '2', 'ASUNTO: CIAPACOV');
INSERT INTO `seguimiento` VALUES ('108', '2017-11-24 17:35:18', '2', '2', 'Entrada', '17', '54', '2', 'ASUNTO: CIAPACOV');
INSERT INTO `seguimiento` VALUES ('109', '2017-11-27 19:13:27', '2', '2', 'Salida', '9', null, '4', null);
INSERT INTO `seguimiento` VALUES ('110', '2017-11-27 19:13:27', '3', '4', 'Entrada', '9', null, '4', '');
INSERT INTO `seguimiento` VALUES ('111', '2017-11-27 19:13:37', '2', '2', 'Salida', '10', null, '4', null);
INSERT INTO `seguimiento` VALUES ('112', '2017-11-27 19:13:37', '3', '3', 'Entrada', '10', null, '4', '');
INSERT INTO `seguimiento` VALUES ('113', '2017-11-27 19:13:51', '2', '2', 'Salida', '11', null, '4', null);
INSERT INTO `seguimiento` VALUES ('114', '2017-11-27 19:13:51', '3', '3', 'Entrada', '11', null, '4', '');
INSERT INTO `seguimiento` VALUES ('115', '2017-11-27 19:14:03', '2', '2', 'Salida', '12', null, '4', null);
INSERT INTO `seguimiento` VALUES ('116', '2017-11-27 19:14:03', '3', '3', 'Entrada', '12', null, '4', '');
INSERT INTO `seguimiento` VALUES ('117', '2017-11-27 19:14:13', '2', '2', 'Salida', '13', null, '4', null);
INSERT INTO `seguimiento` VALUES ('118', '2017-11-27 19:14:13', '3', '4', 'Entrada', '13', null, '4', '');
INSERT INTO `seguimiento` VALUES ('119', '2017-11-27 19:14:21', '2', '2', 'Salida', '14', null, '4', null);
INSERT INTO `seguimiento` VALUES ('120', '2017-11-27 19:14:21', '3', '3', 'Entrada', '14', null, '4', '');
INSERT INTO `seguimiento` VALUES ('121', '2017-11-27 19:14:31', '2', '2', 'Salida', '15', null, '4', null);
INSERT INTO `seguimiento` VALUES ('122', '2017-11-27 19:14:31', '3', '4', 'Entrada', '15', null, '4', '');
INSERT INTO `seguimiento` VALUES ('123', '2017-11-27 19:14:51', '2', '2', 'Salida', '17', null, '4', null);
INSERT INTO `seguimiento` VALUES ('124', '2017-11-27 19:14:51', '3', '4', 'Entrada', '17', null, '4', '');
INSERT INTO `seguimiento` VALUES ('125', '2017-11-27 19:15:27', '2', '2', 'Salida', '11', null, '4', null);
INSERT INTO `seguimiento` VALUES ('126', '2017-11-27 19:15:27', '3', '4', 'Entrada', '11', null, '4', '');
INSERT INTO `seguimiento` VALUES ('128', '2017-11-27 19:34:42', '3', '4', 'insitu', '9', '56', '16', null);
INSERT INTO `seguimiento` VALUES ('129', '2017-11-27 19:39:46', '3', '4', 'insitu', '9', '57', '16', null);
INSERT INTO `seguimiento` VALUES ('130', '2017-11-27 19:47:41', '3', '4', 'insitu', '11', '58', '16', null);
INSERT INTO `seguimiento` VALUES ('131', '2017-11-27 19:49:39', '3', '4', 'insitu', '11', '59', '16', null);
INSERT INTO `seguimiento` VALUES ('132', '2017-11-27 19:51:57', '3', '4', 'insitu', '13', '60', '16', null);
INSERT INTO `seguimiento` VALUES ('133', '2017-11-27 19:57:09', '3', '4', 'insitu', '15', '61', '16', null);
INSERT INTO `seguimiento` VALUES ('134', '2017-11-27 20:03:13', '3', '4', 'insitu', '15', '62', '16', 'ninguna');
INSERT INTO `seguimiento` VALUES ('135', '2017-11-27 20:08:36', '3', '4', 'insitu', '15', '63', '16', 'Modificación al documento anterior');
INSERT INTO `seguimiento` VALUES ('136', '2017-11-27 20:24:02', '3', '3', 'insitu', '10', '65', '16', 'ninguna');
INSERT INTO `seguimiento` VALUES ('137', '2017-11-27 20:29:37', '3', '3', 'Salida', '10', null, '8', null);
INSERT INTO `seguimiento` VALUES ('138', '2017-11-27 20:29:37', '4', '5', 'Entrada', '10', null, '8', null);
INSERT INTO `seguimiento` VALUES ('139', '2017-11-27 20:55:04', '3', '4', 'insitu', '9', '66', '16', 'NINGUNA');
INSERT INTO `seguimiento` VALUES ('140', '2017-11-28 16:01:37', '3', '4', 'insitu', '11', '67', '16', 'nunguna');
INSERT INTO `seguimiento` VALUES ('141', '2017-11-28 16:02:33', '3', '4', 'insitu', '13', '68', '16', 'nunguna');
INSERT INTO `seguimiento` VALUES ('142', '2017-11-28 16:05:02', '3', '4', 'insitu', '15', '69', '16', 'nunguna');
INSERT INTO `seguimiento` VALUES ('145', '2017-11-28 20:03:46', '2', '2', 'Entrada', '20', '72', '2', 'ASUNTO: CIAPACOV');
INSERT INTO `seguimiento` VALUES ('146', '2017-11-28 20:04:15', '2', '2', 'insitu', '20', '73', '16', null);
INSERT INTO `seguimiento` VALUES ('147', '2017-11-28 20:04:58', '2', '2', 'insitu', '20', '74', '16', null);
INSERT INTO `seguimiento` VALUES ('148', '2017-11-28 21:06:23', '4', '5', 'insitu', '10', '75', '16', 'errores \r\nnombres diferentes ');
INSERT INTO `seguimiento` VALUES ('149', '2017-11-28 21:10:59', '4', '5', 'insitu', '10', '76', '16', 'ninguna');
INSERT INTO `seguimiento` VALUES ('150', '2017-11-30 19:15:49', '3', '3', 'Salida', '12', null, '12', null);
INSERT INTO `seguimiento` VALUES ('151', '2017-11-30 19:15:49', '5', '7', 'Entrada', '12', null, '12', null);
INSERT INTO `seguimiento` VALUES ('152', '2017-11-30 19:16:34', '5', '7', 'Entrada', '12', null, '13', 'En proceso de redacción');
INSERT INTO `seguimiento` VALUES ('153', '2017-11-30 19:20:30', '5', '7', 'Salida', '12', null, '14', 'Enviado a revisi贸n');
INSERT INTO `seguimiento` VALUES ('154', '2017-12-01 15:01:03', '2', '2', 'Salida', '11', null, '4', null);
INSERT INTO `seguimiento` VALUES ('155', '2017-12-01 15:01:03', '3', '4', 'Entrada', '11', null, '4', 'Llegó el 21 de noviembre de 2017');
INSERT INTO `seguimiento` VALUES ('156', '2017-12-01 15:01:41', '2', '2', 'Salida', '12', null, '4', null);
INSERT INTO `seguimiento` VALUES ('157', '2017-12-01 15:01:41', '3', '3', 'Entrada', '12', null, '4', 'Llegó el 21 de noviembre de 2017');
INSERT INTO `seguimiento` VALUES ('158', '2017-12-01 15:03:48', '2', '2', 'Salida', '14', null, '4', null);
INSERT INTO `seguimiento` VALUES ('159', '2017-12-01 15:03:48', '3', '3', 'Entrada', '14', null, '4', 'Llegó el 22 de noviembre de 2017');
INSERT INTO `seguimiento` VALUES ('160', '2017-12-01 15:05:51', '2', '2', 'insitu', '17', '77', '16', null);
INSERT INTO `seguimiento` VALUES ('161', '2017-12-01 15:06:49', '2', '2', 'Salida', '17', null, '4', null);
INSERT INTO `seguimiento` VALUES ('162', '2017-12-01 15:06:49', '3', '3', 'Entrada', '17', null, '4', 'Llegó el 23 de noviembre de 2017');
INSERT INTO `seguimiento` VALUES ('163', '2017-12-01 15:07:20', '2', '2', 'Salida', '20', null, '4', null);
INSERT INTO `seguimiento` VALUES ('164', '2017-12-01 15:07:20', '3', '4', 'Entrada', '20', null, '4', 'Llegó el 23 de noviembre de 2017');
INSERT INTO `seguimiento` VALUES ('165', '2017-12-01 15:13:41', '2', '2', 'Entrada', '21', '78', '2', 'ASUNTO:DAP');
INSERT INTO `seguimiento` VALUES ('166', '2017-12-01 15:14:20', '2', '2', 'Salida', '21', null, '4', null);
INSERT INTO `seguimiento` VALUES ('167', '2017-12-01 15:14:20', '3', '3', 'Entrada', '21', null, '4', 'Llegó el 23 de noviembre de 2017');
INSERT INTO `seguimiento` VALUES ('168', '2017-12-01 15:14:33', '2', '2', 'insitu', '7', '79', '16', null);
INSERT INTO `seguimiento` VALUES ('169', '2017-12-01 15:14:41', '2', '2', 'insitu', '7', '80', '16', null);
INSERT INTO `seguimiento` VALUES ('170', '2017-12-01 15:15:08', '2', '2', 'insitu', '21', '81', '16', null);
INSERT INTO `seguimiento` VALUES ('171', '2017-12-01 15:15:20', '2', '2', 'insitu', '21', '82', '16', null);
INSERT INTO `seguimiento` VALUES ('172', '2017-12-01 15:15:56', '2', '2', 'Salida', '21', null, '4', null);
INSERT INTO `seguimiento` VALUES ('173', '2017-12-01 15:15:56', '3', '3', 'Entrada', '21', null, '4', '');
INSERT INTO `seguimiento` VALUES ('174', '2017-12-01 15:21:02', '2', '2', 'Entrada', '22', '83', '2', 'ASUNTO: Nulidad de boleta de infracción');
INSERT INTO `seguimiento` VALUES ('175', '2017-12-01 15:21:24', '2', '2', 'insitu', '22', '84', '16', null);
INSERT INTO `seguimiento` VALUES ('176', '2017-12-01 15:21:55', '2', '2', 'Salida', '22', null, '4', null);
INSERT INTO `seguimiento` VALUES ('177', '2017-12-01 15:21:55', '3', '4', 'Entrada', '22', null, '4', 'Llegó el 24 de noviembre de 2017');
INSERT INTO `seguimiento` VALUES ('178', '2017-12-01 15:23:40', '2', '2', 'Entrada', '23', '85', '2', 'ASUNTO: Nulidad de boleta de infracción');
INSERT INTO `seguimiento` VALUES ('179', '2017-12-01 15:23:57', '2', '2', 'insitu', '23', '86', '16', null);
INSERT INTO `seguimiento` VALUES ('180', '2017-12-01 15:24:25', '2', '2', 'insitu', '23', '87', '16', null);
INSERT INTO `seguimiento` VALUES ('181', '2017-12-01 15:25:05', '2', '2', 'Salida', '23', null, '4', null);
INSERT INTO `seguimiento` VALUES ('182', '2017-12-01 15:25:05', '3', '3', 'Entrada', '23', null, '4', 'Llegó el 27 de noviembre de 2017');
INSERT INTO `seguimiento` VALUES ('183', '2017-12-01 15:27:27', '2', '2', 'Entrada', '24', '88', '2', 'ASUNTO: Destitución de agente de Seguridad Pública');
INSERT INTO `seguimiento` VALUES ('184', '2017-12-01 15:27:40', '2', '2', 'insitu', '24', '89', '16', null);
INSERT INTO `seguimiento` VALUES ('185', '2017-12-01 15:27:54', '2', '2', 'insitu', '24', '90', '16', null);
INSERT INTO `seguimiento` VALUES ('186', '2017-12-01 15:28:18', '2', '2', 'insitu', '24', '91', '16', null);
INSERT INTO `seguimiento` VALUES ('187', '2017-12-01 15:28:46', '2', '2', 'insitu', '24', '92', '16', null);
INSERT INTO `seguimiento` VALUES ('188', '2017-12-01 15:29:12', '2', '2', 'insitu', '24', '93', '16', null);
INSERT INTO `seguimiento` VALUES ('189', '2017-12-01 15:29:23', '2', '2', 'insitu', '24', '94', '16', null);
INSERT INTO `seguimiento` VALUES ('190', '2017-12-01 15:29:41', '2', '2', 'insitu', '24', '95', '16', null);
INSERT INTO `seguimiento` VALUES ('191', '2017-12-01 15:29:51', '2', '2', 'insitu', '24', '96', '16', null);
INSERT INTO `seguimiento` VALUES ('192', '2017-12-01 15:30:06', '2', '2', 'insitu', '20', '97', '16', null);
INSERT INTO `seguimiento` VALUES ('193', '2017-12-01 15:30:43', '2', '2', 'insitu', '24', '98', '16', null);
INSERT INTO `seguimiento` VALUES ('194', '2017-12-01 15:31:37', '2', '2', 'insitu', '24', '99', '16', null);
INSERT INTO `seguimiento` VALUES ('195', '2017-12-01 15:31:51', '2', '2', 'insitu', '24', '100', '16', null);
INSERT INTO `seguimiento` VALUES ('196', '2017-12-01 15:32:48', '2', '2', 'insitu', '24', '101', '16', null);
INSERT INTO `seguimiento` VALUES ('197', '2017-12-01 15:33:41', '2', '2', 'Salida', '24', null, '4', null);
INSERT INTO `seguimiento` VALUES ('198', '2017-12-01 15:33:41', '3', '4', 'Entrada', '24', null, '4', 'Llegó el 27 de noviembre de 2017');
INSERT INTO `seguimiento` VALUES ('199', '2017-12-01 15:34:38', '2', '2', 'Entrada', '25', '102', '2', 'ASUNTO: Nulidad de boleta de infracción');
INSERT INTO `seguimiento` VALUES ('200', '2017-12-01 15:34:53', '2', '2', 'insitu', '25', '103', '16', null);
INSERT INTO `seguimiento` VALUES ('201', '2017-12-01 15:35:25', '2', '2', 'Salida', '25', null, '4', null);
INSERT INTO `seguimiento` VALUES ('202', '2017-12-01 15:35:25', '3', '3', 'Entrada', '25', null, '4', 'Llegó el 27 de noviembre de 2017');
INSERT INTO `seguimiento` VALUES ('203', '2017-12-01 20:32:24', '3', '4', 'Salida', '17', null, '12', null);
INSERT INTO `seguimiento` VALUES ('204', '2017-12-01 20:32:24', '5', '8', 'Entrada', '17', null, '12', null);
INSERT INTO `seguimiento` VALUES ('205', '2017-12-01 20:33:47', '5', '8', 'Entrada', '17', null, '13', 'En proceso de redacción');
INSERT INTO `seguimiento` VALUES ('206', '2017-12-01 20:34:20', '5', '8', 'Entrada', '17', null, '13', 'En proceso de redacción');
INSERT INTO `seguimiento` VALUES ('207', '2017-12-01 20:35:29', '5', '8', 'Entrada', '17', null, '13', 'En proceso de redacción');
INSERT INTO `seguimiento` VALUES ('208', '2017-12-01 20:36:40', '5', '8', 'Salida', '17', null, '14', 'Enviado a revisi贸n');
INSERT INTO `seguimiento` VALUES ('209', '2017-12-04 19:16:02', '2', '2', 'Entrada', '26', '104', '2', 'ASUNTO: Nulidad de boleta de infracción');
INSERT INTO `seguimiento` VALUES ('210', '2017-12-04 19:16:40', '2', '2', 'insitu', '26', '105', '16', null);
INSERT INTO `seguimiento` VALUES ('211', '2017-12-04 19:17:09', '2', '2', 'insitu', '26', '106', '16', null);
INSERT INTO `seguimiento` VALUES ('212', '2017-12-04 19:17:56', '2', '2', 'Salida', '26', null, '4', null);
INSERT INTO `seguimiento` VALUES ('213', '2017-12-04 19:17:56', '3', '4', 'Entrada', '26', null, '4', 'Llegó el 28 de noviembre de 2017');
INSERT INTO `seguimiento` VALUES ('214', '2017-12-04 19:18:39', '2', '2', 'Entrada', '27', '107', '2', 'ASUNTO: Nulidad de boleta de infracción');
INSERT INTO `seguimiento` VALUES ('215', '2017-12-04 19:19:05', '2', '2', 'insitu', '27', '108', '16', null);
INSERT INTO `seguimiento` VALUES ('216', '2017-12-04 19:19:46', '2', '2', 'insitu', '27', '109', '16', null);
INSERT INTO `seguimiento` VALUES ('217', '2017-12-04 19:19:59', '2', '2', 'insitu', '27', '110', '16', null);
INSERT INTO `seguimiento` VALUES ('218', '2017-12-04 19:21:12', '2', '2', 'Salida', '27', null, '4', null);
INSERT INTO `seguimiento` VALUES ('219', '2017-12-04 19:21:12', '3', '3', 'Entrada', '27', null, '4', 'ASUNTO: Nulidad de boleta de infracción');
INSERT INTO `seguimiento` VALUES ('220', '2017-12-04 19:24:08', '2', '2', 'Entrada', '28', '111', '2', 'ASUNTO: Nulidad de boleta de infracción');
INSERT INTO `seguimiento` VALUES ('221', '2017-12-04 19:24:24', '2', '2', 'insitu', '28', '112', '16', null);
INSERT INTO `seguimiento` VALUES ('222', '2017-12-04 19:24:37', '2', '2', 'insitu', '28', '113', '16', null);
INSERT INTO `seguimiento` VALUES ('223', '2017-12-04 19:28:01', '2', '2', 'Salida', '28', null, '4', null);
INSERT INTO `seguimiento` VALUES ('224', '2017-12-04 19:28:01', '3', '3', 'Entrada', '28', null, '4', 'Llegó el 29 de noviembre de 2017');
INSERT INTO `seguimiento` VALUES ('225', '2017-12-04 19:30:24', '2', '2', 'Entrada', '29', '114', '2', 'ASUNTO: Nulidad de boleta de infracción');
INSERT INTO `seguimiento` VALUES ('226', '2017-12-04 19:30:40', '2', '2', 'insitu', '29', '115', '16', null);
INSERT INTO `seguimiento` VALUES ('227', '2017-12-04 19:30:53', '2', '2', 'insitu', '29', '116', '16', null);
INSERT INTO `seguimiento` VALUES ('228', '2017-12-04 19:31:51', '2', '2', 'Salida', '29', null, '4', null);
INSERT INTO `seguimiento` VALUES ('229', '2017-12-04 19:31:51', '3', '4', 'Entrada', '29', null, '4', 'Llegó el 29 de noviembre de 2017.\r\nLa autoridad demandada en Tránsito de Comala');
INSERT INTO `seguimiento` VALUES ('230', '2017-12-04 19:36:45', '2', '2', 'Entrada', '30', '117', '2', 'ASUNTO: Nulidad de boleta de infracción');
INSERT INTO `seguimiento` VALUES ('231', '2017-12-04 19:36:59', '2', '2', 'insitu', '30', '118', '16', null);
INSERT INTO `seguimiento` VALUES ('232', '2017-12-04 19:37:13', '2', '2', 'insitu', '30', '119', '16', null);
INSERT INTO `seguimiento` VALUES ('233', '2017-12-04 19:37:53', '2', '2', 'insitu', '30', '120', '16', null);
INSERT INTO `seguimiento` VALUES ('234', '2017-12-04 19:38:17', '2', '2', 'insitu', '30', '121', '16', null);
INSERT INTO `seguimiento` VALUES ('235', '2017-12-04 19:39:25', '2', '2', 'Salida', '30', null, '4', null);
INSERT INTO `seguimiento` VALUES ('236', '2017-12-04 19:39:25', '3', '3', 'Entrada', '30', null, '4', 'Llegó el día 30 de noviembre de 2017');
INSERT INTO `seguimiento` VALUES ('237', '2017-12-04 19:40:31', '2', '2', 'Entrada', '31', '122', '2', 'ASUNTO: Nulidad de boleta de infracción');
INSERT INTO `seguimiento` VALUES ('238', '2017-12-04 19:40:55', '2', '2', 'insitu', '31', '123', '16', null);
INSERT INTO `seguimiento` VALUES ('239', '2017-12-04 19:41:06', '2', '2', 'insitu', '31', '124', '16', null);
INSERT INTO `seguimiento` VALUES ('240', '2017-12-04 19:41:17', '2', '2', 'insitu', '31', '125', '16', null);
INSERT INTO `seguimiento` VALUES ('241', '2017-12-04 19:41:53', '2', '2', 'Salida', '31', null, '4', null);
INSERT INTO `seguimiento` VALUES ('242', '2017-12-04 19:41:53', '3', '4', 'Entrada', '31', null, '4', 'Llegó el día 30 de noviembre de 2017');
INSERT INTO `seguimiento` VALUES ('243', '2017-12-05 17:28:19', '2', '2', 'Entrada', '32', '126', '2', 'ASUNTO: Nulidad de Boleta de infracción');
INSERT INTO `seguimiento` VALUES ('244', '2017-12-05 17:28:39', '2', '2', 'insitu', '32', '127', '16', null);
INSERT INTO `seguimiento` VALUES ('245', '2017-12-05 17:29:20', '2', '2', 'insitu', '32', '128', '16', null);
INSERT INTO `seguimiento` VALUES ('246', '2017-12-05 17:29:45', '2', '2', 'insitu', '32', '129', '16', null);
INSERT INTO `seguimiento` VALUES ('247', '2017-12-05 17:30:20', '2', '2', 'Salida', '32', null, '4', null);
INSERT INTO `seguimiento` VALUES ('248', '2017-12-05 17:30:20', '3', '4', 'Entrada', '32', null, '4', 'Llegó el 30 de noviembre de 2017');
INSERT INTO `seguimiento` VALUES ('249', '2017-12-05 17:31:41', '2', '2', 'Entrada', '33', '130', '2', 'ASUNTO: Nulidad de boleta de infracción');
INSERT INTO `seguimiento` VALUES ('250', '2017-12-05 17:31:55', '2', '2', 'insitu', '33', '131', '16', null);
INSERT INTO `seguimiento` VALUES ('251', '2017-12-05 17:32:06', '2', '2', 'insitu', '33', '132', '16', null);
INSERT INTO `seguimiento` VALUES ('252', '2017-12-05 17:32:31', '2', '2', 'insitu', '33', '133', '16', null);
INSERT INTO `seguimiento` VALUES ('253', '2017-12-05 17:32:56', '2', '2', 'Salida', '33', null, '4', null);
INSERT INTO `seguimiento` VALUES ('254', '2017-12-05 17:32:56', '3', '3', 'Entrada', '33', null, '4', 'Llegó el 30 de noviembre de 2017');
INSERT INTO `seguimiento` VALUES ('255', '2017-12-05 17:33:47', '2', '2', 'Entrada', '34', '134', '2', 'ASUNTO: Nulidad de boleta de infracción');
INSERT INTO `seguimiento` VALUES ('256', '2017-12-05 17:34:02', '2', '2', 'insitu', '34', '135', '16', null);
INSERT INTO `seguimiento` VALUES ('257', '2017-12-05 17:34:17', '2', '2', 'insitu', '34', '136', '16', null);
INSERT INTO `seguimiento` VALUES ('258', '2017-12-05 17:36:30', '2', '2', 'Salida', '34', null, '4', null);
INSERT INTO `seguimiento` VALUES ('259', '2017-12-05 17:36:30', '3', '4', 'Entrada', '34', null, '4', 'Llegó el 30 de noviembre de 2017');
INSERT INTO `seguimiento` VALUES ('260', '2017-12-05 17:41:42', '2', '2', 'Entrada', '35', '137', '2', 'ASUNTO: Nulidad de boleta de infracción y devolución del pago de lo indebido');
INSERT INTO `seguimiento` VALUES ('261', '2017-12-05 17:42:02', '2', '2', 'insitu', '35', '138', '16', null);
INSERT INTO `seguimiento` VALUES ('262', '2017-12-05 17:42:13', '2', '2', 'insitu', '35', '139', '16', null);
INSERT INTO `seguimiento` VALUES ('263', '2017-12-05 17:42:23', '2', '2', 'insitu', '35', '140', '16', null);
INSERT INTO `seguimiento` VALUES ('264', '2017-12-05 17:42:36', '2', '2', 'insitu', '35', '141', '16', null);
INSERT INTO `seguimiento` VALUES ('265', '2017-12-05 17:42:50', '2', '2', 'insitu', '35', '142', '16', null);
INSERT INTO `seguimiento` VALUES ('266', '2017-12-05 17:43:02', '2', '2', 'insitu', '20', '143', '16', null);
INSERT INTO `seguimiento` VALUES ('267', '2017-12-05 17:43:41', '2', '2', 'Salida', '35', null, '4', null);
INSERT INTO `seguimiento` VALUES ('268', '2017-12-05 17:43:41', '3', '3', 'Entrada', '35', null, '4', 'Llegó el día 30 de noviembre de 2017');
INSERT INTO `seguimiento` VALUES ('269', '2017-12-05 17:44:38', '2', '2', 'Entrada', '36', '144', '2', 'ASUNTO: Responsabilidad patrimonial del Estado');
INSERT INTO `seguimiento` VALUES ('270', '2017-12-05 17:45:51', '2', '2', 'Entrada', '37', '145', '2', 'ASUNTO: DAP');
INSERT INTO `seguimiento` VALUES ('271', '2017-12-05 17:46:13', '2', '2', 'insitu', '37', '146', '16', null);
INSERT INTO `seguimiento` VALUES ('272', '2017-12-05 17:46:52', '2', '2', 'Salida', '37', null, '4', null);
INSERT INTO `seguimiento` VALUES ('273', '2017-12-05 17:46:52', '3', '3', 'Entrada', '37', null, '4', 'Llegó el 01 de diciembre de 2017');
INSERT INTO `seguimiento` VALUES ('274', '2017-12-05 17:47:45', '2', '2', 'Entrada', '38', '147', '2', 'ASUNTO: Nulidad de boleta de infracción');
INSERT INTO `seguimiento` VALUES ('275', '2017-12-05 17:48:02', '2', '2', 'insitu', '38', '148', '16', null);
INSERT INTO `seguimiento` VALUES ('276', '2017-12-05 17:48:43', '2', '2', 'Salida', '38', null, '4', null);
INSERT INTO `seguimiento` VALUES ('277', '2017-12-05 17:48:43', '3', '4', 'Entrada', '38', null, '4', 'Llegó el 04 de diciembre de 2017');
INSERT INTO `seguimiento` VALUES ('278', '2017-12-05 17:49:59', '2', '2', 'Entrada', '39', '149', '2', 'ASUNTO: Nulidad de boleta de infracción');
INSERT INTO `seguimiento` VALUES ('279', '2017-12-05 17:50:45', '2', '2', 'Entrada', '40', '150', '2', 'ASUNTO: Nulidad de boleta de infracción');
INSERT INTO `seguimiento` VALUES ('280', '2017-12-05 17:50:58', '2', '2', 'insitu', '40', '151', '16', null);
INSERT INTO `seguimiento` VALUES ('281', '2017-12-05 17:51:11', '2', '2', 'insitu', '40', '152', '16', null);
INSERT INTO `seguimiento` VALUES ('282', '2017-12-05 17:51:42', '2', '2', 'Salida', '40', null, '4', null);
INSERT INTO `seguimiento` VALUES ('283', '2017-12-05 17:51:42', '3', '3', 'Entrada', '40', null, '4', 'Llegó el 04 de diciembre de 2017');
INSERT INTO `seguimiento` VALUES ('284', '2017-12-05 17:53:11', '2', '2', 'Entrada', '41', '153', '2', 'ASUNTO: Nulidad de boleta de infracción');
INSERT INTO `seguimiento` VALUES ('285', '2017-12-05 17:53:38', '2', '2', 'insitu', '41', '154', '16', null);
INSERT INTO `seguimiento` VALUES ('286', '2017-12-05 17:54:05', '2', '2', 'Salida', '41', null, '4', null);
INSERT INTO `seguimiento` VALUES ('287', '2017-12-05 17:54:05', '3', '4', 'Entrada', '41', null, '4', 'Llegó el 04 de diciembre de 2017');
INSERT INTO `seguimiento` VALUES ('288', '2017-12-05 17:54:43', '2', '2', 'Entrada', '42', '155', '2', 'ASUNTO: Nulidad de boleta de infracción');
INSERT INTO `seguimiento` VALUES ('289', '2017-12-05 17:54:56', '2', '2', 'insitu', '42', '156', '16', null);
INSERT INTO `seguimiento` VALUES ('290', '2017-12-05 17:55:25', '2', '2', 'Salida', '30', null, '4', null);
INSERT INTO `seguimiento` VALUES ('291', '2017-12-05 17:55:25', '3', '3', 'Entrada', '30', null, '4', 'Llegó el 04 de diciembre de 2017');
INSERT INTO `seguimiento` VALUES ('292', '2017-12-05 18:04:16', '2', '2', 'Entrada', '43', '157', '2', 'ASUNTO: Despido injustificado de elemento de seguridad pública');
INSERT INTO `seguimiento` VALUES ('293', '2017-12-05 18:04:27', '2', '2', 'insitu', '43', '158', '16', null);
INSERT INTO `seguimiento` VALUES ('294', '2017-12-05 18:04:44', '2', '2', 'insitu', '43', '159', '16', null);
INSERT INTO `seguimiento` VALUES ('295', '2017-12-05 18:05:06', '2', '2', 'Salida', '43', null, '4', null);
INSERT INTO `seguimiento` VALUES ('296', '2017-12-05 18:05:06', '3', '4', 'Entrada', '43', null, '4', 'Llegó el 04 de diciembre de 2017');
INSERT INTO `seguimiento` VALUES ('297', '2017-12-05 20:39:53', '2', '2', 'Entrada', '44', '160', '2', 'ASUNTO: CIAPACOV');
INSERT INTO `seguimiento` VALUES ('298', '2017-12-05 20:43:21', '2', '2', 'Entrada', '45', '161', '2', 'ASUNTO: Nulidad de acta de notificación');
INSERT INTO `seguimiento` VALUES ('299', '2017-12-05 20:43:33', '2', '2', 'insitu', '45', '162', '16', null);
INSERT INTO `seguimiento` VALUES ('300', '2017-12-05 20:43:41', '2', '2', 'insitu', '45', '163', '16', null);
INSERT INTO `seguimiento` VALUES ('301', '2017-12-05 20:45:02', '2', '2', 'Entrada', '46', '164', '2', 'ASUNTO: Nulidad de boleta de infracción');
INSERT INTO `seguimiento` VALUES ('302', '2017-12-05 20:45:19', '2', '2', 'insitu', '46', '165', '16', null);
INSERT INTO `seguimiento` VALUES ('303', '2017-12-05 20:45:36', '2', '2', 'Salida', '44', null, '4', null);
INSERT INTO `seguimiento` VALUES ('304', '2017-12-05 20:45:36', '3', '3', 'Entrada', '44', null, '4', '');
INSERT INTO `seguimiento` VALUES ('305', '2017-12-05 20:45:51', '2', '2', 'Salida', '45', null, '4', null);
INSERT INTO `seguimiento` VALUES ('306', '2017-12-05 20:45:51', '3', '4', 'Entrada', '45', null, '4', '');
INSERT INTO `seguimiento` VALUES ('307', '2017-12-05 20:46:02', '2', '2', 'Salida', '46', null, '4', null);
INSERT INTO `seguimiento` VALUES ('308', '2017-12-05 20:46:02', '3', '3', 'Entrada', '46', null, '4', '');
INSERT INTO `seguimiento` VALUES ('309', '2017-12-06 17:04:28', '2', '2', 'Entrada', '47', '166', '2', 'ASUNTO: Nulidad de resolución Administrativa que impone multa y suspende acciones de construcción en el Puerto de Manzanillo');
INSERT INTO `seguimiento` VALUES ('310', '2017-12-06 17:05:00', '2', '2', 'insitu', '47', '167', '16', null);
INSERT INTO `seguimiento` VALUES ('311', '2017-12-06 17:05:34', '2', '2', 'insitu', '47', '168', '16', null);
INSERT INTO `seguimiento` VALUES ('312', '2017-12-06 20:38:06', '2', '2', 'insitu', '47', '169', '16', null);
INSERT INTO `seguimiento` VALUES ('313', '2017-12-06 20:38:30', '2', '2', 'insitu', '47', '170', '16', null);
INSERT INTO `seguimiento` VALUES ('314', '2017-12-06 20:38:40', '2', '2', 'insitu', '47', '171', '16', null);
INSERT INTO `seguimiento` VALUES ('315', '2017-12-06 20:38:52', '2', '2', 'insitu', '47', '172', '16', null);
INSERT INTO `seguimiento` VALUES ('316', '2017-12-06 20:39:26', '2', '2', 'insitu', '47', '173', '16', null);
INSERT INTO `seguimiento` VALUES ('317', '2017-12-06 20:39:53', '2', '2', 'insitu', '47', '174', '16', null);
INSERT INTO `seguimiento` VALUES ('318', '2017-12-06 20:40:07', '2', '2', 'insitu', '47', '175', '16', null);
INSERT INTO `seguimiento` VALUES ('319', '2017-12-06 20:40:25', '2', '2', 'insitu', '47', '176', '16', null);
INSERT INTO `seguimiento` VALUES ('320', '2017-12-06 20:52:40', '2', '2', 'Salida', '47', null, '4', null);
INSERT INTO `seguimiento` VALUES ('321', '2017-12-06 20:52:40', '3', '4', 'Entrada', '47', null, '4', 'No su puedo agregar de manera electrónica el archivo: 4_Anexo_3');
INSERT INTO `seguimiento` VALUES ('322', '2017-12-06 20:55:52', '2', '2', 'Entrada', '48', '177', '2', 'ASUNTO: Nulidad de resolución que niega la cancelación total de una anotación en el Instituto del Registro del Territorio de Colima');
INSERT INTO `seguimiento` VALUES ('323', '2017-12-06 20:56:10', '2', '2', 'insitu', '48', '178', '16', null);
INSERT INTO `seguimiento` VALUES ('324', '2017-12-06 20:56:48', '2', '2', 'insitu', '48', '179', '16', null);
INSERT INTO `seguimiento` VALUES ('325', '2017-12-06 20:57:08', '2', '2', 'insitu', '48', '180', '16', null);
INSERT INTO `seguimiento` VALUES ('326', '2017-12-06 20:57:24', '2', '2', 'insitu', '48', '181', '16', null);
INSERT INTO `seguimiento` VALUES ('327', '2017-12-06 20:57:49', '2', '2', 'insitu', '48', '182', '16', null);
INSERT INTO `seguimiento` VALUES ('328', '2017-12-06 20:58:01', '2', '2', 'insitu', '48', '183', '16', null);
INSERT INTO `seguimiento` VALUES ('329', '2017-12-06 21:02:47', '2', '2', 'Salida', '48', null, '4', null);
INSERT INTO `seguimiento` VALUES ('330', '2017-12-06 21:02:47', '3', '3', 'Entrada', '48', null, '4', 'No se pudo enviar de manera digital el archivo: 3_Anexo_2');
INSERT INTO `seguimiento` VALUES ('331', '2017-12-07 16:37:18', '2', '2', 'Entrada', '49', '184', '2', 'ASUNTO: Restitución de policías e indemnización constitucional');
INSERT INTO `seguimiento` VALUES ('332', '2017-12-07 16:37:43', '2', '2', 'Salida', '49', null, '4', null);
INSERT INTO `seguimiento` VALUES ('333', '2017-12-07 16:37:43', '3', '4', 'Entrada', '49', null, '4', 'Llegó el 06 de diciembre de 2017');
INSERT INTO `seguimiento` VALUES ('334', '2017-12-11 19:02:05', '2', '2', 'Entrada', '50', '185', '2', 'ASUNTO:  Nulidad en contra del Proceso de Licitación Pública Nacional Presencial No. OM-002/2017');
INSERT INTO `seguimiento` VALUES ('335', '2017-12-11 19:04:34', '2', '2', 'Entrada', '51', '186', '2', 'ASUNTO: Nulidad deL Proceso de Licitación  Pública Nacional Presencial No. OM_002/2017');
INSERT INTO `seguimiento` VALUES ('336', '2017-12-11 19:04:54', '2', '2', 'insitu', '51', '187', '16', null);
INSERT INTO `seguimiento` VALUES ('337', '2017-12-11 19:05:08', '2', '2', 'insitu', '51', '188', '16', null);
INSERT INTO `seguimiento` VALUES ('338', '2017-12-11 19:05:19', '2', '2', 'insitu', '20', '189', '16', null);
INSERT INTO `seguimiento` VALUES ('339', '2017-12-11 19:05:29', '2', '2', 'insitu', '51', '190', '16', null);
INSERT INTO `seguimiento` VALUES ('340', '2017-12-11 19:05:38', '2', '2', 'insitu', '51', '191', '16', null);
INSERT INTO `seguimiento` VALUES ('341', '2017-12-11 19:05:49', '2', '2', 'insitu', '51', '192', '16', null);
INSERT INTO `seguimiento` VALUES ('342', '2017-12-11 19:06:00', '2', '2', 'insitu', '51', '193', '16', null);
INSERT INTO `seguimiento` VALUES ('343', '2017-12-11 19:06:11', '2', '2', 'insitu', '51', '194', '16', null);
INSERT INTO `seguimiento` VALUES ('344', '2017-12-11 19:06:20', '2', '2', 'insitu', '51', '195', '16', null);
INSERT INTO `seguimiento` VALUES ('345', '2017-12-11 19:06:29', '2', '2', 'insitu', '51', '196', '16', null);
INSERT INTO `seguimiento` VALUES ('346', '2017-12-11 19:06:38', '2', '2', 'insitu', '20', '197', '16', null);
INSERT INTO `seguimiento` VALUES ('347', '2017-12-11 19:06:49', '2', '2', 'insitu', '51', '198', '16', null);
INSERT INTO `seguimiento` VALUES ('348', '2017-12-11 19:07:03', '2', '2', 'insitu', '51', '199', '16', null);
INSERT INTO `seguimiento` VALUES ('349', '2017-12-11 19:07:22', '2', '2', 'insitu', '51', '200', '16', null);
INSERT INTO `seguimiento` VALUES ('350', '2017-12-11 19:07:41', '2', '2', 'insitu', '51', '201', '16', null);
INSERT INTO `seguimiento` VALUES ('351', '2017-12-11 19:07:55', '2', '2', 'insitu', '51', '202', '16', null);
INSERT INTO `seguimiento` VALUES ('352', '2017-12-11 19:08:16', '2', '2', 'insitu', '51', '203', '16', null);
INSERT INTO `seguimiento` VALUES ('353', '2017-12-11 19:08:16', '2', '2', 'insitu', '51', '204', '16', null);
INSERT INTO `seguimiento` VALUES ('354', '2017-12-11 19:08:35', '2', '2', 'insitu', '51', '205', '16', null);
INSERT INTO `seguimiento` VALUES ('355', '2017-12-11 19:09:51', '2', '2', 'Entrada', '52', '206', '2', 'ASUNTO: Nulidad de boleta de infracción');
INSERT INTO `seguimiento` VALUES ('356', '2017-12-11 19:10:04', '2', '2', 'insitu', '52', '207', '16', null);
INSERT INTO `seguimiento` VALUES ('357', '2017-12-11 19:26:33', '2', '2', 'Entrada', '53', '208', '2', 'ASUNTO: Nulidad de boleta de infracción');
INSERT INTO `seguimiento` VALUES ('358', '2017-12-11 19:31:24', '2', '2', 'insitu', '53', '209', '16', null);
INSERT INTO `seguimiento` VALUES ('359', '2017-12-11 19:32:18', '2', '2', 'Entrada', '54', '210', '2', 'ASUNTO: Nulidad de boleta de infracción');
INSERT INTO `seguimiento` VALUES ('360', '2017-12-11 19:32:34', '2', '2', 'insitu', '54', '211', '16', null);
INSERT INTO `seguimiento` VALUES ('361', '2017-12-11 19:38:14', '2', '2', 'Entrada', '55', '212', '2', 'ASUNTO: Nulidad de boleta de tránsito');
INSERT INTO `seguimiento` VALUES ('362', '2017-12-11 19:38:26', '2', '2', 'insitu', '55', '213', '16', null);
INSERT INTO `seguimiento` VALUES ('363', '2017-12-11 19:38:34', '2', '2', 'insitu', '55', '214', '16', null);
INSERT INTO `seguimiento` VALUES ('364', '2017-12-11 19:38:53', '2', '2', 'insitu', '55', '215', '16', null);
INSERT INTO `seguimiento` VALUES ('365', '2017-12-11 19:40:00', '2', '2', 'Entrada', '56', '216', '2', 'ASUNTO: Nulidad de boleta de infracción');
INSERT INTO `seguimiento` VALUES ('366', '2017-12-11 19:40:16', '2', '2', 'insitu', '56', '217', '16', null);
INSERT INTO `seguimiento` VALUES ('367', '2017-12-11 19:40:44', '2', '2', 'insitu', '56', '218', '16', null);
INSERT INTO `seguimiento` VALUES ('368', '2017-12-11 19:42:15', '2', '2', 'Entrada', '57', '219', '2', 'ASUNTO: Nulidad de boleta de infracción');
INSERT INTO `seguimiento` VALUES ('369', '2017-12-11 19:43:16', '2', '2', 'Entrada', '58', '220', '2', 'ASUNTO: Nulidad de boleta de infracción');
INSERT INTO `seguimiento` VALUES ('370', '2017-12-11 19:43:30', '2', '2', 'insitu', '58', '221', '16', null);
INSERT INTO `seguimiento` VALUES ('371', '2017-12-11 19:46:39', '2', '2', 'Entrada', '59', '222', '2', 'ASUNTO: Nulidad de orden de retiro emitida por la Dirección de Ecología y Salud del H. Ayuntamiento Constitucional de Cuauhtémoc');
INSERT INTO `seguimiento` VALUES ('372', '2017-12-11 19:46:52', '2', '2', 'insitu', '59', '223', '16', null);
INSERT INTO `seguimiento` VALUES ('373', '2017-12-11 19:47:03', '2', '2', 'insitu', '59', '224', '16', null);
INSERT INTO `seguimiento` VALUES ('374', '2017-12-11 19:47:19', '2', '2', 'insitu', '59', '225', '16', null);
INSERT INTO `seguimiento` VALUES ('375', '2017-12-11 19:48:03', '2', '2', 'Salida', '51', null, '4', null);
INSERT INTO `seguimiento` VALUES ('376', '2017-12-11 19:48:03', '3', '3', 'Entrada', '51', null, '4', 'Llegó el día 08 de diciembre de 2017');
INSERT INTO `seguimiento` VALUES ('377', '2017-12-11 19:48:20', '2', '2', 'Salida', '52', null, '4', null);
INSERT INTO `seguimiento` VALUES ('378', '2017-12-11 19:48:20', '3', '4', 'Entrada', '52', null, '4', 'Llegó el día 08 de diciembre de 2017');
INSERT INTO `seguimiento` VALUES ('379', '2017-12-11 19:48:32', '2', '2', 'Salida', '53', null, '4', null);
INSERT INTO `seguimiento` VALUES ('380', '2017-12-11 19:48:32', '3', '3', 'Entrada', '53', null, '4', 'Llegó el día 08 de diciembre de 2017');
INSERT INTO `seguimiento` VALUES ('381', '2017-12-11 19:48:49', '2', '2', 'Salida', '54', null, '4', null);
INSERT INTO `seguimiento` VALUES ('382', '2017-12-11 19:48:49', '3', '4', 'Entrada', '54', null, '4', 'Llegó el día 08 de diciembre de 2017');
INSERT INTO `seguimiento` VALUES ('383', '2017-12-11 19:49:01', '2', '2', 'Salida', '55', null, '4', null);
INSERT INTO `seguimiento` VALUES ('384', '2017-12-11 19:49:01', '3', '3', 'Entrada', '55', null, '4', 'Llegó el día 08 de diciembre de 2017');
INSERT INTO `seguimiento` VALUES ('385', '2017-12-11 19:49:13', '2', '2', 'Salida', '56', null, '4', null);
INSERT INTO `seguimiento` VALUES ('386', '2017-12-11 19:49:13', '3', '4', 'Entrada', '56', null, '4', 'Llegó el día 08 de diciembre de 2017');
INSERT INTO `seguimiento` VALUES ('387', '2017-12-11 19:49:29', '2', '2', 'Salida', '58', null, '4', null);
INSERT INTO `seguimiento` VALUES ('388', '2017-12-11 19:49:29', '3', '3', 'Entrada', '58', null, '4', 'Llegó el día 08 de diciembre de 2017');
INSERT INTO `seguimiento` VALUES ('389', '2017-12-11 19:49:42', '2', '2', 'Salida', '59', null, '4', null);
INSERT INTO `seguimiento` VALUES ('390', '2017-12-11 19:49:42', '3', '4', 'Entrada', '59', null, '4', 'Llegó el día 08 de diciembre de 2017');
INSERT INTO `seguimiento` VALUES ('391', '2017-12-12 17:38:26', '2', '2', 'Entrada', '60', '226', '2', 'ASUNTO: Nulidad de boleta de infracción');
INSERT INTO `seguimiento` VALUES ('392', '2017-12-12 17:38:45', '2', '2', 'insitu', '60', '227', '16', null);
INSERT INTO `seguimiento` VALUES ('393', '2017-12-12 17:40:05', '2', '2', 'Entrada', '61', '228', '2', 'ASUNTO: Nulidad de boleta de infracción');
INSERT INTO `seguimiento` VALUES ('394', '2017-12-12 17:41:34', '2', '2', 'insitu', '61', '229', '16', null);
INSERT INTO `seguimiento` VALUES ('395', '2017-12-12 17:41:53', '2', '2', 'insitu', '61', '230', '16', null);
INSERT INTO `seguimiento` VALUES ('396', '2017-12-12 18:09:48', '2', '2', 'Entrada', '62', '231', '2', 'ASUNTO: Nulidad de Resolución administrativa que ordena la clausura definitiva de un local comercial');
INSERT INTO `seguimiento` VALUES ('397', '2017-12-12 18:10:02', '2', '2', 'insitu', '62', '232', '16', null);
INSERT INTO `seguimiento` VALUES ('398', '2017-12-12 18:10:20', '2', '2', 'insitu', '62', '233', '16', null);
INSERT INTO `seguimiento` VALUES ('399', '2017-12-12 18:10:42', '2', '2', 'insitu', '62', '234', '16', null);
INSERT INTO `seguimiento` VALUES ('400', '2017-12-12 18:10:59', '2', '2', 'insitu', '62', '235', '16', null);
INSERT INTO `seguimiento` VALUES ('401', '2017-12-12 18:11:35', '2', '2', 'Salida', '60', null, '4', null);
INSERT INTO `seguimiento` VALUES ('402', '2017-12-12 18:11:35', '3', '3', 'Entrada', '60', null, '4', 'Llegó el día 11 de diciembre de 2017');
INSERT INTO `seguimiento` VALUES ('403', '2017-12-12 18:11:48', '2', '2', 'Salida', '61', null, '4', null);
INSERT INTO `seguimiento` VALUES ('404', '2017-12-12 18:11:48', '3', '4', 'Entrada', '61', null, '4', 'Llegó el día 11 de diciembre de 2017');
INSERT INTO `seguimiento` VALUES ('405', '2017-12-12 18:12:02', '2', '2', 'Salida', '62', null, '4', null);
INSERT INTO `seguimiento` VALUES ('406', '2017-12-12 18:12:02', '3', '3', 'Entrada', '62', null, '4', 'Llegó el día 11 de diciembre de 2017');
INSERT INTO `seguimiento` VALUES ('407', '2017-12-13 19:39:27', '2', '2', 'Entrada', '63', '236', '2', 'ASUNTO: Nulidad de boleta de infracción');
INSERT INTO `seguimiento` VALUES ('408', '2017-12-13 19:39:45', '2', '2', 'insitu', '63', '237', '16', null);
INSERT INTO `seguimiento` VALUES ('409', '2017-12-13 19:53:24', '2', '2', 'Entrada', '64', '238', '2', 'ASUNTO: Nulidad del boleta de infracción');
INSERT INTO `seguimiento` VALUES ('410', '2017-12-13 19:53:42', '2', '2', 'insitu', '64', '239', '16', null);
INSERT INTO `seguimiento` VALUES ('411', '2017-12-13 19:55:54', '2', '2', 'Entrada', '65', '240', '2', 'ASUNTO: DAP');
INSERT INTO `seguimiento` VALUES ('412', '2017-12-13 19:56:14', '2', '2', 'insitu', '65', '241', '16', null);
INSERT INTO `seguimiento` VALUES ('413', '2017-12-13 19:56:31', '2', '2', 'insitu', '65', '242', '16', null);
INSERT INTO `seguimiento` VALUES ('414', '2017-12-13 20:00:14', '2', '2', 'Entrada', '66', '243', '2', 'ASUNTO: Nulidad de boleta de infracción');
INSERT INTO `seguimiento` VALUES ('415', '2017-12-13 20:01:38', '2', '2', 'insitu', '66', '244', '16', null);
INSERT INTO `seguimiento` VALUES ('416', '2017-12-13 20:02:40', '2', '2', 'Entrada', '67', '245', '2', 'ASUNTO: DAP');
INSERT INTO `seguimiento` VALUES ('417', '2017-12-13 20:02:51', '2', '2', 'insitu', '67', '246', '16', null);
INSERT INTO `seguimiento` VALUES ('418', '2017-12-13 20:16:06', '2', '2', 'Entrada', '68', '247', '2', '');
INSERT INTO `seguimiento` VALUES ('419', '2017-12-13 20:16:53', '2', '2', 'Entrada', '69', '248', '2', 'ASUNTO: Nulidad de boleta de infracción');
INSERT INTO `seguimiento` VALUES ('420', '2017-12-13 20:17:18', '2', '2', 'insitu', '69', '249', '16', null);
INSERT INTO `seguimiento` VALUES ('421', '2017-12-13 20:17:30', '2', '2', 'insitu', '69', '250', '16', null);
INSERT INTO `seguimiento` VALUES ('422', '2017-12-13 20:17:39', '2', '2', 'insitu', '69', '251', '16', null);
INSERT INTO `seguimiento` VALUES ('423', '2017-12-13 20:18:21', '2', '2', 'Entrada', '70', '252', '2', 'ASUNTO: DAP');
INSERT INTO `seguimiento` VALUES ('424', '2017-12-13 20:18:30', '2', '2', 'insitu', '70', '253', '16', null);
INSERT INTO `seguimiento` VALUES ('425', '2017-12-13 20:19:37', '2', '2', 'Entrada', '71', '254', '2', 'ASUNTO: Responsabilidad patrimonial del Estado');
INSERT INTO `seguimiento` VALUES ('426', '2017-12-13 20:22:23', '2', '2', 'Entrada', '72', '255', '2', 'ASUNTO: DAP');
INSERT INTO `seguimiento` VALUES ('427', '2017-12-13 20:22:48', '2', '2', 'insitu', '72', '256', '16', null);
INSERT INTO `seguimiento` VALUES ('428', '2017-12-13 20:23:00', '2', '2', 'insitu', '72', '257', '16', null);
INSERT INTO `seguimiento` VALUES ('429', '2017-12-13 20:23:27', '2', '2', 'insitu', '72', '258', '16', null);
INSERT INTO `seguimiento` VALUES ('430', '2017-12-13 20:23:37', '2', '2', 'insitu', '72', '259', '16', null);
INSERT INTO `seguimiento` VALUES ('431', '2017-12-13 20:23:47', '2', '2', 'insitu', '72', '260', '16', null);
INSERT INTO `seguimiento` VALUES ('432', '2017-12-13 20:23:58', '2', '2', 'insitu', '72', '261', '16', null);
INSERT INTO `seguimiento` VALUES ('433', '2017-12-13 20:25:04', '2', '2', 'Entrada', '73', '262', '2', 'ASUNTO: Nulidad de boleta de infracción');
INSERT INTO `seguimiento` VALUES ('434', '2017-12-13 20:28:51', '2', '2', 'insitu', '73', '263', '16', null);
INSERT INTO `seguimiento` VALUES ('435', '2017-12-13 20:29:35', '2', '2', 'Salida', '63', null, '4', null);
INSERT INTO `seguimiento` VALUES ('436', '2017-12-13 20:29:35', '3', '4', 'Entrada', '63', null, '4', 'Llegó el 12 de diciembre de 2017');
INSERT INTO `seguimiento` VALUES ('437', '2017-12-13 20:30:03', '2', '2', 'Salida', '64', null, '4', null);
INSERT INTO `seguimiento` VALUES ('438', '2017-12-13 20:30:03', '3', '3', 'Entrada', '64', null, '4', 'Llegó el 12 de diciembre de 2017');
INSERT INTO `seguimiento` VALUES ('439', '2017-12-13 20:30:29', '2', '2', 'Salida', '65', null, '4', null);
INSERT INTO `seguimiento` VALUES ('440', '2017-12-13 20:30:29', '3', '4', 'Entrada', '65', null, '4', 'Llegó el 12 de diciembre de 2017');
INSERT INTO `seguimiento` VALUES ('441', '2017-12-13 20:30:53', '2', '2', 'Salida', '66', null, '4', null);
INSERT INTO `seguimiento` VALUES ('442', '2017-12-13 20:30:53', '3', '3', 'Entrada', '66', null, '4', 'Llegó el 12 de diciembre de 2017');
INSERT INTO `seguimiento` VALUES ('443', '2017-12-13 20:31:44', '2', '2', 'Salida', '67', null, '4', null);
INSERT INTO `seguimiento` VALUES ('444', '2017-12-13 20:31:44', '3', '3', 'Entrada', '67', null, '4', 'Llegó el 12 de diciembre de 2017');
INSERT INTO `seguimiento` VALUES ('445', '2017-12-13 20:32:05', '2', '2', 'Salida', '69', null, '4', null);
INSERT INTO `seguimiento` VALUES ('446', '2017-12-13 20:32:05', '3', '3', 'Entrada', '69', null, '4', 'Llegó el 12 de diciembre de 2017');
INSERT INTO `seguimiento` VALUES ('447', '2017-12-13 20:32:22', '2', '2', 'Salida', '70', null, '4', null);
INSERT INTO `seguimiento` VALUES ('448', '2017-12-13 20:32:22', '3', '4', 'Entrada', '70', null, '4', 'Llegó el 12 de diciembre de 2017');
INSERT INTO `seguimiento` VALUES ('449', '2017-12-13 20:32:46', '2', '2', 'Salida', '72', null, '4', null);
INSERT INTO `seguimiento` VALUES ('450', '2017-12-13 20:32:46', '3', '3', 'Entrada', '72', null, '4', 'Llegó el 12 de diciembre de 2017');
INSERT INTO `seguimiento` VALUES ('451', '2017-12-13 20:32:59', '2', '2', 'Salida', '73', null, '4', null);
INSERT INTO `seguimiento` VALUES ('452', '2017-12-13 20:32:59', '3', '4', 'Entrada', '73', null, '4', 'Llegó el 12 de diciembre de 2017');
INSERT INTO `seguimiento` VALUES ('453', '2017-12-14 17:07:20', '2', '2', 'Entrada', '74', '264', '2', 'ASUNTO: Afirmativa ficta respecto a permiso de construcción de obra\r\nhidráulica con fines de riego agrícola');
INSERT INTO `seguimiento` VALUES ('454', '2017-12-14 17:07:40', '2', '2', 'insitu', '74', '265', '16', null);
INSERT INTO `seguimiento` VALUES ('455', '2017-12-14 17:07:52', '2', '2', 'insitu', '74', '266', '16', null);
INSERT INTO `seguimiento` VALUES ('456', '2017-12-14 17:08:14', '2', '2', 'insitu', '74', '267', '16', null);
INSERT INTO `seguimiento` VALUES ('457', '2017-12-14 17:08:23', '2', '2', 'insitu', '74', '268', '16', null);
INSERT INTO `seguimiento` VALUES ('458', '2017-12-14 17:08:32', '2', '2', 'insitu', '74', '269', '16', null);
INSERT INTO `seguimiento` VALUES ('459', '2017-12-14 17:08:44', '2', '2', 'insitu', '74', '270', '16', null);
INSERT INTO `seguimiento` VALUES ('460', '2017-12-14 17:08:58', '2', '2', 'insitu', '74', '271', '16', null);
INSERT INTO `seguimiento` VALUES ('461', '2017-12-14 17:09:14', '2', '2', 'insitu', '74', '272', '16', null);
INSERT INTO `seguimiento` VALUES ('462', '2017-12-14 17:09:26', '2', '2', 'insitu', '74', '273', '16', null);
INSERT INTO `seguimiento` VALUES ('463', '2017-12-14 17:09:36', '2', '2', 'insitu', '74', '274', '16', null);
INSERT INTO `seguimiento` VALUES ('464', '2017-12-14 17:09:45', '2', '2', 'insitu', '74', '275', '16', null);
INSERT INTO `seguimiento` VALUES ('465', '2017-12-14 17:10:01', '2', '2', 'insitu', '74', '276', '16', null);
INSERT INTO `seguimiento` VALUES ('466', '2017-12-14 17:10:58', '2', '2', 'insitu', '74', '277', '16', null);
INSERT INTO `seguimiento` VALUES ('467', '2017-12-14 17:11:07', '2', '2', 'insitu', '74', '278', '16', null);
INSERT INTO `seguimiento` VALUES ('468', '2017-12-14 17:11:16', '2', '2', 'insitu', '74', '279', '16', null);
INSERT INTO `seguimiento` VALUES ('469', '2017-12-14 17:11:34', '2', '2', 'insitu', '74', '280', '16', null);
INSERT INTO `seguimiento` VALUES ('470', '2017-12-14 17:11:49', '2', '2', 'insitu', '74', '281', '16', null);
INSERT INTO `seguimiento` VALUES ('471', '2017-12-14 17:11:59', '2', '2', 'insitu', '74', '282', '16', null);
INSERT INTO `seguimiento` VALUES ('472', '2017-12-14 17:12:07', '2', '2', 'insitu', '74', '283', '16', null);
INSERT INTO `seguimiento` VALUES ('473', '2017-12-14 17:13:04', '2', '2', 'Entrada', '75', '284', '2', 'ASUNTO: Nulidad de boleta de infracción inserta en Estado de Cuenta');
INSERT INTO `seguimiento` VALUES ('474', '2017-12-14 17:13:15', '2', '2', 'insitu', '75', '285', '16', null);
INSERT INTO `seguimiento` VALUES ('475', '2017-12-14 17:13:28', '2', '2', 'insitu', '75', '286', '16', null);
INSERT INTO `seguimiento` VALUES ('476', '2017-12-14 17:13:55', '2', '2', 'Salida', '74', null, '4', null);
INSERT INTO `seguimiento` VALUES ('477', '2017-12-14 17:13:55', '3', '4', 'Entrada', '74', null, '4', 'Llegó el 13 de diciembre de 2017');
INSERT INTO `seguimiento` VALUES ('478', '2017-12-14 17:14:20', '2', '2', 'Salida', '75', null, '4', null);
INSERT INTO `seguimiento` VALUES ('479', '2017-12-14 17:14:20', '3', '3', 'Entrada', '75', null, '4', 'Llegó el 13 de diciembre de 2017');
INSERT INTO `seguimiento` VALUES ('480', '2017-12-15 16:23:52', '2', '2', 'Entrada', '76', '287', '2', 'ASUNTO: Nulidad del requerimiento de pago relativo al impuesto predial');
INSERT INTO `seguimiento` VALUES ('481', '2017-12-15 16:24:28', '2', '2', 'insitu', '76', '288', '16', null);
INSERT INTO `seguimiento` VALUES ('482', '2017-12-15 16:24:40', '2', '2', 'insitu', '76', '289', '16', null);
INSERT INTO `seguimiento` VALUES ('483', '2017-12-15 16:24:59', '2', '2', 'insitu', '76', '290', '16', null);
INSERT INTO `seguimiento` VALUES ('484', '2017-12-15 16:25:04', '2', '2', 'insitu', '76', '291', '16', null);
INSERT INTO `seguimiento` VALUES ('485', '2017-12-15 16:27:58', '2', '2', 'Entrada', '77', '292', '2', 'ASUNTO: Nulidad de requerimiento de pago relativo a una multa de infracción');
INSERT INTO `seguimiento` VALUES ('486', '2017-12-15 16:43:28', '2', '2', 'Entrada', '78', '293', '2', 'ASUNTO: DAP');
INSERT INTO `seguimiento` VALUES ('487', '2017-12-15 16:43:42', '2', '2', 'insitu', '78', '294', '16', null);
INSERT INTO `seguimiento` VALUES ('488', '2017-12-15 16:44:11', '2', '2', 'insitu', '78', '295', '16', null);
INSERT INTO `seguimiento` VALUES ('489', '2017-12-15 16:47:10', '2', '2', 'Entrada', '79', '296', '2', 'ASUNTO: DAP');
INSERT INTO `seguimiento` VALUES ('490', '2017-12-15 16:47:20', '2', '2', 'insitu', '79', '297', '16', null);
INSERT INTO `seguimiento` VALUES ('491', '2017-12-15 16:47:48', '2', '2', 'insitu', '79', '298', '16', null);
INSERT INTO `seguimiento` VALUES ('492', '2017-12-15 17:09:23', '2', '2', 'Entrada', '80', '299', '2', 'ASUNTO: Nulidad de boleta de infracción');
INSERT INTO `seguimiento` VALUES ('493', '2017-12-15 17:09:37', '2', '2', 'insitu', '80', '300', '16', null);
INSERT INTO `seguimiento` VALUES ('494', '2017-12-15 17:09:46', '2', '2', 'insitu', '80', '301', '16', null);
INSERT INTO `seguimiento` VALUES ('495', '2017-12-15 17:10:59', '2', '2', 'Salida', '76', null, '4', null);
INSERT INTO `seguimiento` VALUES ('496', '2017-12-15 17:10:59', '3', '4', 'Entrada', '76', null, '4', 'Llegó el 14 de diciembre de 2017');
INSERT INTO `seguimiento` VALUES ('497', '2017-12-15 17:11:15', '2', '2', 'Salida', '77', null, '4', null);
INSERT INTO `seguimiento` VALUES ('498', '2017-12-15 17:11:15', '3', '3', 'Entrada', '77', null, '4', 'Llegó el 14 de diciembre de 2017');
INSERT INTO `seguimiento` VALUES ('499', '2017-12-15 17:11:31', '2', '2', 'Salida', '78', null, '4', null);
INSERT INTO `seguimiento` VALUES ('500', '2017-12-15 17:11:31', '3', '4', 'Entrada', '78', null, '4', 'Llegó el 14 de diciembre de 2017');
INSERT INTO `seguimiento` VALUES ('501', '2017-12-15 17:11:46', '2', '2', 'Salida', '79', null, '4', null);
INSERT INTO `seguimiento` VALUES ('502', '2017-12-15 17:11:46', '3', '4', 'Entrada', '79', null, '4', 'Llegó el 14 de diciembre de 2017');
INSERT INTO `seguimiento` VALUES ('503', '2017-12-15 17:12:19', '2', '2', 'Salida', '80', null, '4', null);
INSERT INTO `seguimiento` VALUES ('504', '2017-12-15 17:12:19', '3', '4', 'Entrada', '80', null, '4', 'Llegó el 14 de diciembre de 2017');
INSERT INTO `seguimiento` VALUES ('505', '2018-03-29 22:22:34', '2', '2', 'Entrada', '81', '302', '2', '');

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
INSERT INTO `tiposeguimiento` VALUES ('1', ' Demanda creada', '2018-05-06 18:40:06', '2018-05-06 18:40:06');
INSERT INTO `tiposeguimiento` VALUES ('2', 'Validado por el Oficial de Partes', '2018-05-06 18:40:06', '2018-05-06 18:40:06');
INSERT INTO `tiposeguimiento` VALUES ('3', 'Se turna el expediente al Secretario de Acuerdo', '2018-05-06 18:40:06', '2018-05-06 18:40:06');
INSERT INTO `tiposeguimiento` VALUES ('4', 'El expediente se desecha por incompetencia, por lo cual se turna a la autoridad competente ', '2018-05-06 18:40:06', '2018-05-06 18:40:06');
INSERT INTO `tiposeguimiento` VALUES ('5', 'El expediente se desecha art. 31', '2018-05-06 18:40:06', '2018-05-06 18:40:06');
INSERT INTO `tiposeguimiento` VALUES ('6', 'El expediente se admite', '2018-05-06 18:40:06', '2018-05-06 18:40:06');
INSERT INTO `tiposeguimiento` VALUES ('7', 'Se turna al Actuario para su notificación', '2018-05-06 18:40:06', '2018-05-06 18:40:06');
INSERT INTO `tiposeguimiento` VALUES ('8', 'Se envía notificación', '2018-05-06 18:40:06', '2018-05-06 18:40:06');
INSERT INTO `tiposeguimiento` VALUES ('9', 'Se agrega promoción al expediente', '2018-05-06 18:40:06', '2018-05-06 18:40:06');
INSERT INTO `tiposeguimiento` VALUES ('10', 'Se rechaza la promoción', '2018-05-06 18:40:06', '2018-05-06 18:40:06');
INSERT INTO `tiposeguimiento` VALUES ('11', 'Se turna a proyectista para elaboración del proyecto', '2018-05-06 18:40:06', '2018-05-06 18:40:06');
INSERT INTO `tiposeguimiento` VALUES ('12', 'En elaboración de proyecto', '2018-05-06 18:40:06', '2018-05-06 18:40:06');
INSERT INTO `tiposeguimiento` VALUES ('13', 'Proyecto elaborado, en espera de sentencia', '2018-05-06 18:40:06', '2018-05-06 18:40:06');
INSERT INTO `tiposeguimiento` VALUES ('14', 'Sentencia', '2018-05-06 18:40:06', '2018-05-06 18:40:06');
INSERT INTO `tiposeguimiento` VALUES ('15', 'Se agrego documento', '2018-05-06 18:40:06', '2018-05-06 18:40:06');

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
INSERT INTO `tipo_documento` VALUES ('1', ' Promoción', '2', '2018-05-06 18:40:06', '2018-05-06 18:40:06');
INSERT INTO `tipo_documento` VALUES ('2', 'Escritura Pública', '2', '2018-05-06 18:40:06', '2018-05-06 18:40:06');
INSERT INTO `tipo_documento` VALUES ('3', 'Demanda', '2', '2018-05-06 18:40:06', '2018-05-06 18:40:06');
INSERT INTO `tipo_documento` VALUES ('4', 'Nombramiento', '2', '2018-05-06 18:40:06', '2018-05-06 18:40:06');
INSERT INTO `tipo_documento` VALUES ('5', 'Recibo de Nómina', '2', '2018-05-06 18:40:06', '2018-05-06 18:40:06');
INSERT INTO `tipo_documento` VALUES ('6', 'Resolución', '2', '2018-05-06 18:40:06', '2018-05-06 18:40:06');
INSERT INTO `tipo_documento` VALUES ('7', 'Boleta de Infracción', '2', '2018-05-06 18:40:06', '2018-05-06 18:40:06');
INSERT INTO `tipo_documento` VALUES ('8', 'Copia Certificada', '2', '2018-05-06 18:40:06', '2018-05-06 18:40:06');
INSERT INTO `tipo_documento` VALUES ('9', 'Expediente', '2', '2018-05-06 18:40:06', '2018-05-06 18:40:06');
INSERT INTO `tipo_documento` VALUES ('10', 'Constancia de Notificación', '2', '2018-05-06 18:40:06', '2018-05-06 18:40:06');
INSERT INTO `tipo_documento` VALUES ('11', 'Oficio', '2', '2018-05-06 18:40:06', '2018-05-06 18:40:06');
INSERT INTO `tipo_documento` VALUES ('12', 'Concesión', '2', '2018-05-06 18:40:06', '2018-05-06 18:40:06');
INSERT INTO `tipo_documento` VALUES ('13', 'Acuerdo', '2', '2018-05-06 18:40:06', '2018-05-06 18:40:06');
INSERT INTO `tipo_documento` VALUES ('14', 'Sentencia', '2', '2018-05-06 18:40:06', '2018-05-06 18:40:06');
INSERT INTO `tipo_documento` VALUES ('15', 'Proyecto', '2', '2018-05-06 18:40:06', '2018-05-06 18:40:06');
INSERT INTO `tipo_documento` VALUES ('16', 'Poder para Pleitos y Cobranzas', '2', '2018-05-06 18:40:06', '2018-05-06 18:40:06');
INSERT INTO `tipo_documento` VALUES ('17', 'Amparo', '2', '2018-05-06 18:40:06', '2018-05-06 18:40:06');
INSERT INTO `tipo_documento` VALUES ('18', 'Otros', '2', '2018-05-06 18:40:06', '2018-05-06 18:40:06');
INSERT INTO `tipo_documento` VALUES ('19', 'Anexos', '2', '2018-05-06 18:40:06', '2018-05-06 18:40:06');
INSERT INTO `tipo_documento` VALUES ('20', 'Admite', '3', '2018-05-06 18:40:06', '2018-05-06 18:40:06');
INSERT INTO `tipo_documento` VALUES ('21', 'Contestación', '3', '2018-05-06 18:40:06', '2018-05-06 18:40:06');
INSERT INTO `tipo_documento` VALUES ('22', 'Requiere', '3', '2018-05-06 18:40:06', '2018-05-06 18:40:06');
INSERT INTO `tipo_documento` VALUES ('23', 'Desecha', '3', '2018-05-06 18:40:06', '2018-05-06 18:40:06');
INSERT INTO `tipo_documento` VALUES ('24', 'Incompetencia', '3', '2018-05-06 18:40:06', '2018-05-06 18:40:06');
INSERT INTO `tipo_documento` VALUES ('25', 'Pruebas y Alegatos', '3', '2018-05-06 18:40:06', '2018-05-06 18:40:06');
INSERT INTO `tipo_documento` VALUES ('26', 'Termino para Ampliación', '3', '2018-05-06 18:40:06', '2018-05-06 18:40:06');
INSERT INTO `tipo_documento` VALUES ('27', 'Turnar a Sentencia', '3', '2018-05-06 18:40:06', '2018-05-06 18:40:06');
INSERT INTO `tipo_documento` VALUES ('28', 'Audiencia de Pruebas y Alegatos', '3', '2018-05-06 18:40:06', '2018-05-06 18:40:06');
INSERT INTO `tipo_documento` VALUES ('29', 'Requiriendo el Cumplimiento de Sentencia', '3', '2018-05-06 18:40:06', '2018-05-06 18:40:06');
INSERT INTO `tipo_documento` VALUES ('30', 'Sentencia Cumplida', '3', '2018-05-06 18:40:06', '2018-05-06 18:40:06');
INSERT INTO `tipo_documento` VALUES ('31', 'Otros', '3', '2018-05-06 18:40:06', '2018-05-06 18:40:06');
INSERT INTO `tipo_documento` VALUES ('32', 'Promoción', '3', '2018-05-06 18:40:06', '2018-05-06 18:40:06');
INSERT INTO `tipo_documento` VALUES ('33', 'Escritura Pública', '3', '2018-05-06 18:40:06', '2018-05-06 18:40:06');
INSERT INTO `tipo_documento` VALUES ('34', 'Demanda', '3', '2018-05-06 18:40:06', '2018-05-06 18:40:06');
INSERT INTO `tipo_documento` VALUES ('35', 'Nombramiento', '3', '2018-05-06 18:40:06', '2018-05-06 18:40:06');
INSERT INTO `tipo_documento` VALUES ('36', 'Recibo de Nómina', '3', '2018-05-06 18:40:06', '2018-05-06 18:40:06');
INSERT INTO `tipo_documento` VALUES ('37', 'Resolución', '3', '2018-05-06 18:40:06', '2018-05-06 18:40:06');
INSERT INTO `tipo_documento` VALUES ('38', 'Boleta de Infracción', '3', '2018-05-06 18:40:06', '2018-05-06 18:40:06');
INSERT INTO `tipo_documento` VALUES ('39', 'Copia Certificada', '3', '2018-05-06 18:40:06', '2018-05-06 18:40:06');
INSERT INTO `tipo_documento` VALUES ('40', 'Expediente', '3', '2018-05-06 18:40:06', '2018-05-06 18:40:06');
INSERT INTO `tipo_documento` VALUES ('41', 'Constancia de Notificación', '3', '2018-05-06 18:40:06', '2018-05-06 18:40:06');
INSERT INTO `tipo_documento` VALUES ('42', 'Oficio', '3', '2018-05-06 18:40:06', '2018-05-06 18:40:06');
INSERT INTO `tipo_documento` VALUES ('43', 'Concesión', '3', '2018-05-06 18:40:06', '2018-05-06 18:40:06');
INSERT INTO `tipo_documento` VALUES ('44', 'Acuerdo', '3', '2018-05-06 18:40:06', '2018-05-06 18:40:06');
INSERT INTO `tipo_documento` VALUES ('45', 'Sentencia', '3', '2018-05-06 18:40:06', '2018-05-06 18:40:06');
INSERT INTO `tipo_documento` VALUES ('46', 'Proyecto', '3', '2018-05-06 18:40:06', '2018-05-06 18:40:06');
INSERT INTO `tipo_documento` VALUES ('47', 'Poder para Pleitos y Cobranzas', '3', '2018-05-06 18:40:06', '2018-05-06 18:40:06');
INSERT INTO `tipo_documento` VALUES ('48', 'Amparo', '3', '2018-05-06 18:40:06', '2018-05-06 18:40:06');
INSERT INTO `tipo_documento` VALUES ('49', 'Acta de Notificación', '3', '2018-05-06 18:40:06', '2018-05-06 18:40:06');

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
) ENGINE=InnoDB AUTO_INCREMENT=200 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Admin', 'andres', ' ', 'dreamsroom3@gmail.com', '$2y$10$POBSllbIgmg7uWX6M/288eJgks7EV8ttMGrzclWCCT0YrREc7zK0G', '/img/basic/mrsmith.png', null, '2018-05-17 19:58:17', '2018-05-17 19:58:17');
INSERT INTO `users` VALUES ('2', 'Gabriela', 'Oficial', 'de partes', 'oficialpartes@sisede.tcacolima.com', '$2y$10$XZp8F9L6KnPBFbeg1cXcReL3MDVY0BYQyl1JHgVXnp4BoySeOtaUq', '/img/2/31946084_2187574254592056_3938181721316392960_n.jpg', '9hl5yffQYqhO8zYhhbucCpfgh2bVfVnpZT45woq4PHPvHhH74AtuzzuRXbhH', '2018-05-17 19:58:17', '2018-05-17 19:58:17');
INSERT INTO `users` VALUES ('3', 'Secretario Acuerdos ', 'N°', ' 1 ', 'sacuerdo1@sisede.tcacolima.com', '$2y$10$vH4b0xVZKYmKi83je74y0.feXpjGX4NTbMTflv82OJn2ltjFzp6iW', '/img/basic/avatar.png', null, '2018-05-17 19:58:17', '2018-05-17 19:58:17');
INSERT INTO `users` VALUES ('4', 'Secretario Acuerdos ', 'N°', ' 2 ', 'sacuerdo2@sisede.tcacolima.com', '$2y$10$sBRopH5DCugXWdomRjIIt.Of1.jzZLlTzGUrGmJOS5Z9XmNK2R6Ae', '/img/basic/fem-avatar.png', null, '2018-05-17 19:58:18', '2018-05-17 19:58:18');
INSERT INTO `users` VALUES ('5', 'Actuario', 'N°', ' 1 ', 'actuaria1@sisede.tcacolima.com', '$2y$10$TZXWBdsJufqIH4jTxYrDyeNLlE9Ce8fUR0.YPRAhLONI.UDsS3pHG', '/img/basic/fem-avatar.png', null, '2018-05-17 19:58:18', '2018-05-17 19:58:18');
INSERT INTO `users` VALUES ('6', 'Actuario', 'N°', ' 2 ', 'actuaria2@sisede.tcacolima.com', '$2y$10$1a5COTBjXTXd.GukQMX9But70ChntQf8k1/gbb9/7GFNgNkeL1BG2', '/img/basic/fem-avatar.png', null, '2018-05-17 19:58:18', '2018-05-17 19:58:18');
INSERT INTO `users` VALUES ('7', 'Proyectista', 'N°', ' 1 ', 'proyectista@sisede.tcacolima.com', '$2y$10$A1keRVL9mFl39Ar.3lk5fe/RmLgrtkkk5CrH2rreDWU2y9k8V0qiG', '/img/basic/fem-avatar.png', null, '2018-05-17 19:58:18', '2018-05-17 19:58:18');
INSERT INTO `users` VALUES ('8', 'Proyectista ', 'N°', ' 2 ', 'proyectista2@sisede.tcacolima.com', '$2y$10$DP4hFMPDmGNuKkiMkOzsvOd3.f3GIjbOlkKU.dUSJP1R9hnneySCm', '/img/basic/avatar.png', null, '2018-05-17 19:58:18', '2018-05-17 19:58:18');
INSERT INTO `users` VALUES ('9', 'Amparos', 'N°', ' 1 ', 'amparos@sisede.tcacolima.com', '$2y$10$lrkqg0soM5i8gey.Fv2bzeSNENr4ylW4ZJTMTIO/T.F4zLHpXRQhO', '/img/basic/avatar.png', null, '2018-05-17 19:58:18', '2018-05-17 19:58:18');
INSERT INTO `users` VALUES ('10', 'René', 'Magistrado', 'Presidente', 'magistrado@sisede.tcacolima.com', '$2y$10$3ByeLAm4apAxCmLctbfVZOXZTcTor7zDl9SsP.7LBd3.dpd3ENO/W', '/img/10/avatar.png', 'sTcqkclqhFsvlPctAIXVV6ksgKpcoNWKa1dx3K9WiizcluH9ulPUK8DqzXeP', '2018-05-17 19:58:18', '2018-05-17 19:58:18');
INSERT INTO `users` VALUES ('11', 'JOSE', 'PEREZ', 'CANTU', 'mail72@mail.com', '$2y$10$kNsgmV/xkfeMAQgPjmWKDO8..PWPxTqUGue6.OVw10YVZk72JDH/.', '/img/basic/avatar.png', null, '2018-05-17 19:58:18', '2018-05-17 19:58:18');
INSERT INTO `users` VALUES ('12', 'JAVIER', 'MORENO', 'MENDOZA', 'recartcolima@hotmail.com', '$2y$10$f58Yya4oSDVSfZGB4JegaORW2Z7mwmOIzdAsiKr3uBbz1M0yZUTRy', '/img/basic/avatar.png', null, '2018-05-17 19:58:18', '2018-05-17 19:58:18');
INSERT INTO `users` VALUES ('13', 'JOAQUIN', 'MACHUCA', 'LIVIER', 'mail73@mail.com', '$2y$10$PSwBC/yaAn3wFqR03TF.HuyeqlOUC.zXYwCh6p0M5IDkTWmtrfGNW', '/img/basic/avatar.png', null, '2018-05-17 19:58:18', '2018-05-17 19:58:18');
INSERT INTO `users` VALUES ('14', 'Usuario', 'Prueba', '1', 'mail210@mail.com', '$2y$10$PvYboxVO7Vg9X0hTAeEDk.EYsjBxpRZAx95DLBpY7GoAmQhmeLcV.', '/img/basic/avatar.png', null, '2018-05-17 19:58:18', '2018-05-17 19:58:18');
INSERT INTO `users` VALUES ('15', 'Eduardo', 'Camarena', '', 'mail74@mail.com', '$2y$10$boXj8fWXr3ZKQQtaTFIvt.ZUnetgnvPa9XRP4sC4/TN5KGPfQQZsO', '/img/basic/avatar.png', null, '2018-05-17 19:58:18', '2018-05-17 19:58:18');
INSERT INTO `users` VALUES ('16', 'Francisco', 'Santana', 'Roldán', 'mail75@mail.com', '$2y$10$cBGh2ng05Su1yfMcEqeBjuzQWgZ.C4wOj9hHdXAegSssG7Rv7Xfe6', '/img/basic/avatar.png', null, '2018-05-17 19:58:19', '2018-05-17 19:58:19');
INSERT INTO `users` VALUES ('17', 'Manuel Antonio', 'Rodales', 'Torres', 'mail76@mail.com', '$2y$10$nNsAzPE6y/SFGSM/NumgtOq5PHVCZDSXcogSRz4T0b0MChQ84L52y', '/img/basic/avatar.png', null, '2018-05-17 19:58:19', '2018-05-17 19:58:19');
INSERT INTO `users` VALUES ('18', 'Francisco Javier', 'Sanchez', 'Soliz', 'mail77@mail.com', '$2y$10$ycIc6lTJ0CDMmO60j32Ng.tTXt5kSK3lwgfyhq6koCo/Ly0FsWPwG', '/img/basic/avatar.png', null, '2018-05-17 19:58:19', '2018-05-17 19:58:19');
INSERT INTO `users` VALUES ('19', 'Ernesto', 'Marquez', 'Guerrero', 'mail78@mail.com', '$2y$10$C8DsXAqIY.mXWbO5Zb1GtOyhMO7n9K/eEBDO0OTlAFhlfmDavCui2', '/img/basic/avatar.png', null, '2018-05-17 19:58:19', '2018-05-17 19:58:19');
INSERT INTO `users` VALUES ('20', 'Victor Humberto', 'Larios', 'Alonso', 'mail79@mail.com', '$2y$10$Wa2q80GfsjrGnjcmq/LKiO5IpLFXiUAN3P1PUaXrdluOxB8A.fhhK', '/img/basic/avatar.png', null, '2018-05-17 19:58:19', '2018-05-17 19:58:19');
INSERT INTO `users` VALUES ('21', 'Eduardo', 'Camarena', 'Berra', 'eduardo.camarena@colima.gob.mx', '$2y$10$SpuOpjC5OlxNnrKBu95w9uNk7ANL.sAmFneDYimvRvGBD6OqWYc/C', '/img/basic/avatar.png', null, '2018-05-17 19:58:19', '2018-05-17 19:58:19');
INSERT INTO `users` VALUES ('22', 'Vanessa', 'Hoyos', 'Villaseñor', 'desarrollourbano@colima.gob.mx', '$2y$10$hd.f7IyArZzLWnRHX0figu6Hra/G/9gHCODzrlD94p1ICXhODZwRe', '/img/basic/avatar.png', null, '2018-05-17 19:58:19', '2018-05-17 19:58:19');
INSERT INTO `users` VALUES ('23', 'Orlando', 'Lino', 'Castellanos', 'mail82@mail.com', '$2y$10$mFl6Q3c5yTbkl4lXKJMOnu7nNLtIIzVajlo13Hr7Ulnc50STCnpzy', '/img/basic/avatar.png', null, '2018-05-17 19:58:19', '2018-05-17 19:58:19');
INSERT INTO `users` VALUES ('24', 'Gabriela', 'Benvides', 'Cobos', 'mail83@mail.com', '$2y$10$1DTh.YWpAqEyfP/DMViJlOXkm9jybdXqhORIemKp43r4psrRZ86oW', '/img/basic/avatar.png', null, '2018-05-17 19:58:19', '2018-05-17 19:58:19');
INSERT INTO `users` VALUES ('25', 'Juan Manuel', 'Olivares', 'Fernandez', 'mail80s4@mail.com', '$2y$10$70ECgF.2R.3rS/lvisNgheu4GlOMi7ujrWZiYzJHApMdvtYRWd8QG', '/img/basic/avatar.png', null, '2018-05-17 19:58:19', '2018-05-17 19:58:19');
INSERT INTO `users` VALUES ('26', 'José de Jesús', 'Sanchez', 'Sanchez', 'mail85@mail.com', '$2y$10$/y1aHlfXOj79.F.1VSt7s.8yby71YHoDABAOzg.CIVK3Vw9wqU5oS', '/img/basic/avatar.png', null, '2018-05-17 19:58:19', '2018-05-17 19:58:19');
INSERT INTO `users` VALUES ('27', 'Francisco Javier', 'Michel', 'Ruiz', 'francisco.michel@colima.gob.mx', '$2y$10$Gs8p9SYQc1XW53b2z3IfnO3meHBmFzDIWyUqHo77cPp.2tZv5XWgK', '/img/basic/avatar.png', null, '2018-05-17 19:58:19', '2018-05-17 19:58:19');
INSERT INTO `users` VALUES ('28', 'Juan', 'Sambrano', 'Ibarra', 'mail87@mail.com', '$2y$10$bAvZztIV1SAQNjkbTtr4LuZagKwC6swvz/CxM57kq/fZMbwpaR1TK', '/img/basic/avatar.png', null, '2018-05-17 19:58:19', '2018-05-17 19:58:19');
INSERT INTO `users` VALUES ('29', 'Pedro Emanuel', 'Juarez', 'Arredondo', 'mail88@mail.com', '$2y$10$p9jbz4LwZ99vyVmuhi3UzeDcKeSBaR5vOpVl/Fa9IMPJ4I5N6pfw.', '/img/basic/avatar.png', null, '2018-05-17 19:58:20', '2018-05-17 19:58:20');
INSERT INTO `users` VALUES ('30', 'Paulina', 'García', 'Juarez', 'mail89@mail.com', '$2y$10$9Kgou5wpoy/0zuwH9fBURuI73sSmNb/vrXLRkbrBp0FhZdgXjuHxW', '/img/basic/avatar.png', null, '2018-05-17 19:58:20', '2018-05-17 19:58:20');
INSERT INTO `users` VALUES ('31', 'Rafael', 'Mendoza', 'Alonso', 'mail90@mail.com', '$2y$10$UOiVKAAQMnCSQXY1.XN84.upP3gqO3J.Uiy9sNSBN.FXIi0LVjC4y', '/img/basic/avatar.png', null, '2018-05-17 19:58:20', '2018-05-17 19:58:20');
INSERT INTO `users` VALUES ('32', 'Rodrigo', 'Gaitán', 'Moreno', 'mail91@mail.com', '$2y$10$ckwQy79/FBasF1fWJNBgc.UlwfNqnVD6oIfWGPUcJ9CudXXkOzTNm', '/img/basic/avatar.png', null, '2018-05-17 19:58:20', '2018-05-17 19:58:20');
INSERT INTO `users` VALUES ('33', 'José Guadalupe', 'García', 'Negrete', 'mail92@mail.com', '$2y$10$69H6N71WH.4ETEbLNWoAe.Q2VC33obfjCJ9BM4KrwD9qmNl1lrJem', '/img/basic/avatar.png', null, '2018-05-17 19:58:20', '2018-05-17 19:58:20');
INSERT INTO `users` VALUES ('34', 'Salvador', 'Zuñiga', 'Guerrero', 'mail93@mail.com', '$2y$10$yAMvW2btxRPiduNDoy4mw.eQ5nXYB1IOgADMYna5iWIjwMSDJogZW', '/img/basic/avatar.png', null, '2018-05-17 19:58:20', '2018-05-17 19:58:20');
INSERT INTO `users` VALUES ('35', 'Francisco Javier', 'Avalos', 'Gutiérrez', 'francisco.avalos@colima.gob.mx', '$2y$10$y7Qs9VZOjC2dbrDPgrjRZe/vJ9vYqrDbfCszvPuD8WRb9OD3.Ztai', '/img/basic/avatar.png', null, '2018-05-17 19:58:20', '2018-05-17 19:58:20');
INSERT INTO `users` VALUES ('36', 'Yulenny', 'Cortés', 'León', 'mail94@mail.com', '$2y$10$gGT3slO7qDa51lBgHl5eBOgnkeSrFINdog4/v8muiJCkN5QR68Xx.', '/img/basic/avatar.png', null, '2018-05-17 19:58:20', '2018-05-17 19:58:20');
INSERT INTO `users` VALUES ('37', 'Marcos', 'Ruiz', 'Cervantes', 'mail95@mail.com', '$2y$10$UO9y891qBOZ/aS/B39tIa.LmOsNEJfSFRw7Fvkdc4UZtBVRkiR6xa', '/img/basic/avatar.png', null, '2018-05-17 19:58:20', '2018-05-17 19:58:20');
INSERT INTO `users` VALUES ('38', 'Daniel', 'Valdovinos', 'Cerna', 'mail96@mail.com', '$2y$10$Dd0gao6UCBOP8a.DsecTFuXbbeS5yy4i7TiWlgnnNX9LRTMTZQRES', '/img/basic/avatar.png', null, '2018-05-17 19:58:20', '2018-05-17 19:58:20');
INSERT INTO `users` VALUES ('39', 'Miguel', 'Crispin', 'Hernández', 'mail97@mail.com', '$2y$10$G9imwjnpBN89Au6UDQemh../pbyuIFQ6BAudptyRt8m.L0RI6us3S', '/img/basic/avatar.png', null, '2018-05-17 19:58:21', '2018-05-17 19:58:21');
INSERT INTO `users` VALUES ('40', 'Darío', 'Velueta', 'Álvarez', 'mail908@mail.com', '$2y$10$ASWsj3Pf.Kf2BMn5E17SWuW7EwaA1DwR.bRrpCxBOKrx9DTo/Kf3S', '/img/basic/avatar.png', null, '2018-05-17 19:58:21', '2018-05-17 19:58:21');
INSERT INTO `users` VALUES ('41', 'Ricardo Alberto', 'Durán', 'Aguilar', 'mail99@mail.com', '$2y$10$t2O2IF5riGuk.ZJVtmUHwea9rrvTnexDzPDPY6cpcZbSfXX0Oo7CS', '/img/basic/avatar.png', null, '2018-05-17 19:58:21', '2018-05-17 19:58:21');
INSERT INTO `users` VALUES ('42', 'Salvador', 'Heredia', 'Melendez', 'mail00@mail.com', '$2y$10$HYgTbdawNa5ulYMWQkDCNOjs9C2im2eRiBJHZiLYbDvkL1gNnWoNG', '/img/basic/avatar.png', null, '2018-05-17 19:58:21', '2018-05-17 19:58:21');
INSERT INTO `users` VALUES ('43', 'Silverio', 'Medrano', 'Pérez', 'iscjuanmafa@gmail.com', '$2y$10$CCN2iJzVSHQ7/ElKFr9fmOzj82UuyeG/h.ef3FPXUESN7ZLV8ePkG', '/img/basic/avatar.png', null, '2018-05-17 19:58:21', '2018-05-17 19:58:21');
INSERT INTO `users` VALUES ('44', 'Joaquin', 'Salazar', 'Álvarez', 'mail101@mail.com', '$2y$10$5zwm.GiZ2tKS8RXt2nyLd.TGvwymSQ2wdwCEe44raEIDKK/HP2oQe', '/img/basic/avatar.png', null, '2018-05-17 19:58:21', '2018-05-17 19:58:21');
INSERT INTO `users` VALUES ('45', 'Andres Alberto', 'Juarez', 'Jiménez', 'mail102@mail.com', '$2y$10$nbGMHM.S2zNbAPBozru2vOz82BPvADYAYHzj9aekK0cO60vfXXDhS', '/img/basic/avatar.png', null, '2018-05-17 19:58:21', '2018-05-17 19:58:21');
INSERT INTO `users` VALUES ('46', 'Joel', 'Cardenaz', 'Padilla', 'mail103@mail.com', '$2y$10$/HGNz1vNjaUk46uY4e5rzOZMiRMl6jYgNs21V.ooefw20sP3z454q', '/img/basic/avatar.png', null, '2018-05-17 19:58:21', '2018-05-17 19:58:21');
INSERT INTO `users` VALUES ('47', 'Javier', 'Salazar', 'Davila', 'mail104@mail.com', '$2y$10$QYWZQUbtBm/eyTPpXSLv5ObF4xfOniQ1o5jpwWdb6Jt.Xmi4mbrUO', '/img/basic/avatar.png', null, '2018-05-17 19:58:21', '2018-05-17 19:58:21');
INSERT INTO `users` VALUES ('48', 'Pedro', 'Pereira', 'Uribe', 'mail105@mail.com', '$2y$10$xyZOFNjXfbt7GfEs0rHweuu6ZA3Y9xClGXd7H1ONm7WsYuKWKUzLu', '/img/basic/avatar.png', null, '2018-05-17 19:58:21', '2018-05-17 19:58:21');
INSERT INTO `users` VALUES ('49', 'Prueba', 'Prueba', '6', 'mail106@mail.com', '$2y$10$QswuQqzrDau3PxVlG4ybfu.F/Vh4/qZtkAy2eD6NuLi/nXUxb6pwy', '/img/basic/avatar.png', null, '2018-05-17 19:58:21', '2018-05-17 19:58:21');
INSERT INTO `users` VALUES ('50', 'Juan Marcos', 'Martinez', 'Garay', 'mail107@mail.com', '$2y$10$at7yzUl7/7L9usANXggIl.k0tTUMOnpLM0pUOnLq8zn.sAO4Drgx.', '/img/basic/avatar.png', null, '2018-05-17 19:58:21', '2018-05-17 19:58:21');
INSERT INTO `users` VALUES ('51', 'David', 'Jauregui', 'Diaz', 'mail108@mail.com', '$2y$10$xSdft5iB7b8Gm5whAMz4cOD5c3Jqaby8434fkeIKWidlt5V028qCe', '/img/basic/avatar.png', null, '2018-05-17 19:58:22', '2018-05-17 19:58:22');
INSERT INTO `users` VALUES ('52', 'Alejandro', 'Lopez', 'Llerenas', 'mail109@mail.com', '$2y$10$a3Dz8cuBW1YoejjUO49p1eo7EzDbm6ctw5vxW0.DMWhJPVZrZ/hVy', '/img/basic/avatar.png', null, '2018-05-17 19:58:22', '2018-05-17 19:58:22');
INSERT INTO `users` VALUES ('53', 'Juan Francisco', 'Rodríguez', 'Luna', 'mail110@mail.com', '$2y$10$rM80A7eR5xC2p6DX4.E1rOIKzXNk/lPj2LpV/E8AXCpoKw6iRa936', '/img/basic/avatar.png', null, '2018-05-17 19:58:22', '2018-05-17 19:58:22');
INSERT INTO `users` VALUES ('54', 'Alfonso ', 'Madrigal', 'Cervantes', 'mail111@mail.com', '$2y$10$kRE4fTuut3IAPgSk71KuC.g8SHkwPUdMsRu5zwVGAYvBbanbnX2SS', '/img/basic/avatar.png', null, '2018-05-17 19:58:22', '2018-05-17 19:58:22');
INSERT INTO `users` VALUES ('55', 'Maria Concepcion', 'Torres', 'Acevedo', 'mail112@mail.com', '$2y$10$gaH3I266n7WOR/hNA4oojOyMkUbyq70woRmbw6XeesuLspcX8tosS', '/img/basic/avatar.png', null, '2018-05-17 19:58:22', '2018-05-17 19:58:22');
INSERT INTO `users` VALUES ('56', 'Eder Paul', 'Jaramillo', 'Cazares', 'mail113@mail.com', '$2y$10$BB9QNanpVxbx/eA/wLg9l.3WOcoVEWtChGZuVaiUI20b8Mq5y0BYS', '/img/basic/avatar.png', null, '2018-05-17 19:58:22', '2018-05-17 19:58:22');
INSERT INTO `users` VALUES ('57', 'Prueba11', 'Prueba', '11', 'mail114@mail.com', '$2y$10$aTf66nCdlz.TuarpGjlibOz2vE5zN4OlW280L1TNvvZ5QORwi4dkG', '/img/basic/avatar.png', null, '2018-05-17 19:58:22', '2018-05-17 19:58:22');
INSERT INTO `users` VALUES ('58', 'Juan', 'Decena', 'Molina', 'mail115@mail.com', '$2y$10$eE1q2rA2BXn6zcsp7RQyWOAoV25otgYNNisd0PjuU2voyKvAThbwW', '/img/basic/avatar.png', null, '2018-05-17 19:58:22', '2018-05-17 19:58:22');
INSERT INTO `users` VALUES ('59', 'Pablo', 'Lechuga', 'Juarez', 'mail116@mail.com', '$2y$10$vHJIkqfr9GZepdsvQn5eCuh.lHJvH2X8w6NgYYa6qlTcQaIrg.4va', '/img/basic/avatar.png', null, '2018-05-17 19:58:22', '2018-05-17 19:58:22');
INSERT INTO `users` VALUES ('60', 'José Ignacio', 'Vaquero', 'Díaz', 'ignacio.vaquero@colima.gob.mx', '$2y$10$lwh9EVUV2/bZ9/HslN3kdenSxUx/OKFqqpd0GvR6o3mF7UMOcE5Q6', '/img/basic/avatar.png', null, '2018-05-17 19:58:22', '2018-05-17 19:58:22');
INSERT INTO `users` VALUES ('61', 'Prueba', 'Prueba', '2', 'mail118@mail.com', '$2y$10$ne010YbLQE5D2os/.rvf0.jL9CICem9x0xwL9lKLI5h9O/7HfTz0S', '/img/basic/avatar.png', null, '2018-05-17 19:58:22', '2018-05-17 19:58:22');
INSERT INTO `users` VALUES ('62', 'Rafael', 'Mendoza', 'Godínez', 'mail119@mail.com', '$2y$10$Dzl3xcBIUfpNLhbOQYUAz.SvVjOAS4TlaafUWFAfXpqjran6mzbS2', '/img/basic/avatar.png', null, '2018-05-17 19:58:22', '2018-05-17 19:58:22');
INSERT INTO `users` VALUES ('63', 'Francisco Rafael', 'Quintero', 'Toscano', 'mail120@mail.com', '$2y$10$F/xK.kaVCS55IYgo.kyX8eQMN1dYq5PWHGkjQiya6qx/Tvo6y/rY2', '/img/basic/avatar.png', null, '2018-05-17 19:58:23', '2018-05-17 19:58:23');
INSERT INTO `users` VALUES ('64', 'Javier', 'Radillo', 'Mora', 'mail121@mail.com', '$2y$10$4xdGBeh.Y.W62o2KnitdXeEsgmIkcz7HeYiwEsAjtesn869USohPO', '/img/basic/avatar.png', null, '2018-05-17 19:58:23', '2018-05-17 19:58:23');
INSERT INTO `users` VALUES ('65', 'Prueba', 'Prueba', '8', 'mail122@mail.com', '$2y$10$OcTRTBNU3d/VP65a/WMJf.pwNXyoGr4LvM0nwWGbwUuafSzmdBAYG', '/img/basic/avatar.png', null, '2018-05-17 19:58:23', '2018-05-17 19:58:23');
INSERT INTO `users` VALUES ('66', 'Prueba', 'Prueba', '9', 'mail123@mail.com', '$2y$10$pgll2uEKHQmaG3ehCSAan.fngYRbLFvc2tZheCE9akOHQbpXt6Gga', '/img/basic/avatar.png', null, '2018-05-17 19:58:23', '2018-05-17 19:58:23');
INSERT INTO `users` VALUES ('67', 'Manuel Antonio', 'Sandoval', 'Jaramillo', 'mail124@mail.com', '$2y$10$g6mqG9CrUSXRxfhwjseGBeICKYzkr/RMM8cc2L51OCm3nJi7diGQi', '/img/basic/avatar.png', null, '2018-05-17 19:58:23', '2018-05-17 19:58:23');
INSERT INTO `users` VALUES ('68', 'Ramiro', 'Pacheco', 'Salazar', 'mail125@mail.com', '$2y$10$5ehsZcnKT6wZ5aGpawys..Lq5MV2NpfPYlaDsh1NKDpm5cQ664wfe', '/img/basic/avatar.png', null, '2018-05-17 19:58:23', '2018-05-17 19:58:23');
INSERT INTO `users` VALUES ('69', 'Prueba', 'Prueba', '4', 'mail126@mail.com', '$2y$10$vLTBjReozC.f/GzBref8aOqHodibiz7BYMAnvdIYto9smDsNntERC', '/img/basic/avatar.png', null, '2018-05-17 19:58:23', '2018-05-17 19:58:23');
INSERT INTO `users` VALUES ('70', 'Salvador', 'Ochoa', 'Romero', 'mail127@mail.com', '$2y$10$cA/7v.8l6wHSr.jeJV1EKOlt/c2fNLGkZptsxHQWvtDM3LhMQ8fby', '/img/basic/avatar.png', null, '2018-05-17 19:58:23', '2018-05-17 19:58:23');
INSERT INTO `users` VALUES ('71', 'Pablo', 'Neruda', 'Ornelas', 'mail128@mail.com', '$2y$10$eK.YO.RKiNdM9R159CwExeVwFWiUoDImtho2jkT5Eevdz18v0lCde', '/img/basic/avatar.png', null, '2018-05-17 19:58:23', '2018-05-17 19:58:23');
INSERT INTO `users` VALUES ('72', 'Roberto', 'Marquez', 'Primas', 'mail129@mail.com', '$2y$10$ONaO2xOy1N8fQzUPY1EzyOyY1pQrmRb5Phqw6CPyooyyaB6fin2XW', '/img/basic/avatar.png', null, '2018-05-17 19:58:23', '2018-05-17 19:58:23');
INSERT INTO `users` VALUES ('73', 'Silverio', 'Solis', 'Cernas', 'mail130@mail.com', '$2y$10$bxNPJznvsajfdstsUKTRSee9P/aAV8ajVT19.ECAQBD5gYuJFExPG', '/img/basic/avatar.png', null, '2018-05-17 19:58:23', '2018-05-17 19:58:23');
INSERT INTO `users` VALUES ('74', 'Patricia', 'Pinedo', 'Fernandez', 'mail131@mail.com', '$2y$10$WUecraENYjAwTTCgidg1xO4ey.JqC0c1XOTxISPTM/ReNcH1if8/O', '/img/basic/avatar.png', null, '2018-05-17 19:58:23', '2018-05-17 19:58:23');
INSERT INTO `users` VALUES ('75', 'José Luis', 'Silva', 'Luna', 'mail132@mail.com', '$2y$10$35QZ9di5jjCLDbdQl9fiQOb66ZBNLY9O6qIDk23CyMDoYQ/eWZiYq', '/img/basic/avatar.png', null, '2018-05-17 19:58:24', '2018-05-17 19:58:24');
INSERT INTO `users` VALUES ('76', 'Antonio', 'Moreno', 'Perez', 'mail133@mail.com', '$2y$10$MPhF.0m71uX4pS/B6YksVOEHlUGI0ImG.HEiqiMK5dsBaVjhk8jdO', '/img/basic/avatar.png', null, '2018-05-17 19:58:24', '2018-05-17 19:58:24');
INSERT INTO `users` VALUES ('77', 'Prueba', 'Prueba', '3', 'mail134@mail.com', '$2y$10$3.JxGtLf3TjfdaxHF6M07OkhnOjtyrvFIvzuc.1skfnY2Q/FEPyFy', '/img/basic/avatar.png', null, '2018-05-17 19:58:24', '2018-05-17 19:58:24');
INSERT INTO `users` VALUES ('78', 'Miguel', 'Solis', 'Prado', 'mail135@mail.com', '$2y$10$KOopVSyIqD13VXqDrQOQTe4Dgtbiq1M1AbDQzPySB5AzIO.TEUq8G', '/img/basic/avatar.png', null, '2018-05-17 19:58:24', '2018-05-17 19:58:24');
INSERT INTO `users` VALUES ('79', 'Ernesto', 'Murguia', 'Gómez', 'mail136@mail.com', '$2y$10$XBTH/yuxYsmSu1zX7Rbs2.aUqjG794yKCUL1A1L1qSbDEQE7OG9QK', '/img/basic/avatar.png', null, '2018-05-17 19:58:24', '2018-05-17 19:58:24');
INSERT INTO `users` VALUES ('80', 'Paulino', 'Dominguez', 'Ceja', 'mail137@mail.com', '$2y$10$7I/t4Yz71G8C1i8pSEQKee5vdnhZjJDmmmSMurkI9ZqmlLFIygBTe', '/img/basic/avatar.png', null, '2018-05-17 19:58:24', '2018-05-17 19:58:24');
INSERT INTO `users` VALUES ('81', 'José Guadalupe', 'Sandoval', 'Estrella', 'mail138@mail.com', '$2y$10$.vUp4raePzGsxWbQPky0ReTeYc8pZpMEU6J5cmsIO2NR4wdyGJwE2', '/img/basic/avatar.png', null, '2018-05-17 19:58:24', '2018-05-17 19:58:24');
INSERT INTO `users` VALUES ('82', 'Crispin', 'Gutiérrez', 'Moreno', 'crispingtz63@gmail.com', '$2y$10$rhOXJcH9aT8EmMWFKrr5XOGUhTXWyn0mqIxfhUkP02Sp5s.hWQy5S', '/img/basic/avatar.png', null, '2018-05-17 19:58:24', '2018-05-17 19:58:24');
INSERT INTO `users` VALUES ('83', 'Francisco Manuel', 'Sanchez', 'Hurtado', 'fmsanchez@col.gob.mx', '$2y$10$NpIgzwMYSTrn.S0..bV56eL/qtpRIZx5JYMj2V/BlipGl4Vvw9NnG', '/img/basic/avatar.png', null, '2018-05-17 19:58:24', '2018-05-17 19:58:24');
INSERT INTO `users` VALUES ('84', 'Prueba', 'Prueba', '10', 'mail141@mail.com', '$2y$10$frSzYmGPYrjh9/1Gb0e86etafiitTvfU7hijdMH31WzyOqtnGscei', '/img/basic/avatar.png', null, '2018-05-17 19:58:24', '2018-05-17 19:58:24');
INSERT INTO `users` VALUES ('85', 'Prueba', 'Prueba', '7', 'mail142@mail.com', '$2y$10$jiHTgx7Jw3Dby82UPt0UI.X2oPGnTJKugBcq2yR.tz3xrwC/uFOUu', '/img/basic/avatar.png', null, '2018-05-17 19:58:24', '2018-05-17 19:58:24');
INSERT INTO `users` VALUES ('86', 'Fernando', 'Madrigal', 'Dueñas', 'mail143@mail.com', '$2y$10$abKp20rPpV4F6R10pBc8rOekp0PKHJE551bJnrbXvIoCQmISa/qOK', '/img/basic/avatar.png', null, '2018-05-17 19:58:24', '2018-05-17 19:58:24');
INSERT INTO `users` VALUES ('87', 'Sergio', 'Magaña', 'Magaña', 'mail144@mail.com', '$2y$10$f7bL/tW6O1muesSraEvQPOigEJlyMeQ/pica9jHKHVP9c3WkEc3OO', '/img/basic/avatar.png', null, '2018-05-17 19:58:25', '2018-05-17 19:58:25');
INSERT INTO `users` VALUES ('88', 'Wilberto', 'Morales', 'Montes', 'mail145@mail.com', '$2y$10$wresUt9YC0AInJ/c4/dBqe5LUUAmuOYPdp5NDNijdH6zrN3pu2uWW', '/img/basic/avatar.png', null, '2018-05-17 19:58:25', '2018-05-17 19:58:25');
INSERT INTO `users` VALUES ('89', 'Andres', 'Dario', 'Silva', 'mail146@mail.com', '$2y$10$6GCgo13anjYVKV0FUDIT9eMR5by9NITkGgCUKoT1vA4ZEl4Tx8JJe', '/img/basic/avatar.png', null, '2018-05-17 19:58:25', '2018-05-17 19:58:25');
INSERT INTO `users` VALUES ('90', 'Arnoldo', 'Ochoa', 'González', 'mail147@mail.com', '$2y$10$H/vYBs7zILmSb7TBQnh5ouY2n.ySLwNku1V/yA.bCDmOWcp1V/RRm', '/img/basic/avatar.png', null, '2018-05-17 19:58:25', '2018-05-17 19:58:25');
INSERT INTO `users` VALUES ('91', 'Miguel', 'Becerra', 'Hernández', 'secretariossa@gmail.com', '$2y$10$ob4cBWl7QLpCER.MyrwIDus1rrPNUDRUnU/SWMoetVD04SOMHl2Hi', '/img/basic/avatar.png', null, '2018-05-17 19:58:25', '2018-05-17 19:58:25');
INSERT INTO `users` VALUES ('92', 'Carlos Arturo', 'Noriega', 'Garcia', 'mail149@mail.com', '$2y$10$T1TmYw2vVjePqmVwT.9vl.mm72JwE3eZmmPdgj3aoMzuGVcZ6UhPm', '/img/basic/avatar.png', null, '2018-05-17 19:58:25', '2018-05-17 19:58:25');
INSERT INTO `users` VALUES ('93', 'Jaime', 'Flores', 'Merlo', 'despacho.secretario@secolima.gob.mx', '$2y$10$CHXROIGGxTMd.e7xYsgYHOLKcYlkx9WbLjIxlM6GmfFErtxo/rr1G', '/img/basic/avatar.png', null, '2018-05-17 19:58:25', '2018-05-17 19:58:25');
INSERT INTO `users` VALUES ('94', 'Prueba', 'Prueba', '101', 'mail1101@mail.com', '$2y$10$DXJHbhAVP7gUlX4WTIO3MePmF86g3LlFBCyU5DXpoOXZCkJUnS27C', '/img/basic/avatar.png', null, '2018-05-17 19:58:25', '2018-05-17 19:58:25');
INSERT INTO `users` VALUES ('95', 'José Ignacio', 'Peralta', 'Sanchez', 'mail152@mail.com', '$2y$10$IsOyq/5tiK0t4gFzXHY2ae4biUMtEAHiL72Z3IKgGWmcSfBfN9aQG', '/img/basic/avatar.png', null, '2018-05-17 19:58:25', '2018-05-17 19:58:25');
INSERT INTO `users` VALUES ('96', 'Guadalupe', 'Franco', 'Escobar', 'procurador@pgje.col.gob.mx', '$2y$10$xI9BEwBJhbQwhwa9j5JeSuCMrIvwFCuBkcjd/3heLIpyq8YJXM2Vq', '/img/basic/avatar.png', null, '2018-05-17 19:58:25', '2018-05-17 19:58:25');
INSERT INTO `users` VALUES ('97', 'Prueba', 'prueba', '20', 'mail200@mail.com', '$2y$10$g6W/5zjui7bAdK5fnJt4b.ALHL58GeoZEIkFrJTcwW1J2q0lDJixm', '/img/basic/avatar.png', null, '2018-05-17 19:58:25', '2018-05-17 19:58:25');
INSERT INTO `users` VALUES ('98', 'Prueba', 'prueba', '21', 'mail201@mail.com', '$2y$10$RZYMX6MMtJziUhIGwvbHl.74CuauF0Ul9SEKQoBVipO/x5zT8bONe', '/img/basic/avatar.png', null, '2018-05-17 19:58:26', '2018-05-17 19:58:26');
INSERT INTO `users` VALUES ('99', 'Prueba', 'prueba', '22', 'mail202@mail.com', '$2y$10$N3zINGDgb1xBnk5JkZ0Qn.JHiQMTogPzNaENQmJDNPjLCIpMiScFa', '/img/basic/avatar.png', null, '2018-05-17 19:58:26', '2018-05-17 19:58:26');
INSERT INTO `users` VALUES ('100', 'Prueba', 'prueba', '23', 'mail203@mail.com', '$2y$10$bko9ANCDBR.64rFUchTEPexxWYC3OtfPLFCHbyVikIVtuaeYcKfiG', '/img/basic/avatar.png', null, '2018-05-17 19:58:26', '2018-05-17 19:58:26');
INSERT INTO `users` VALUES ('101', 'Prueba', 'prueba', '24', 'mail204@mail.com', '$2y$10$aiei6VZFSFj5lOARSYGJkeRLcb2ITC.B0jUa2ql8gQLiVQmeMk18K', '/img/basic/avatar.png', null, '2018-05-17 19:58:26', '2018-05-17 19:58:26');
INSERT INTO `users` VALUES ('102', 'Prueba', 'prueba', '25', 'mail205@mail.com', '$2y$10$HLMUuk8XlhN8TOj1s7F6A.OkVyE03gsUXC8YAnONpl2xU/MLADjPS', '/img/basic/avatar.png', null, '2018-05-17 19:58:26', '2018-05-17 19:58:26');
INSERT INTO `users` VALUES ('103', 'Prueba', 'prueba', '26', 'mail206@mail.com', '$2y$10$UWrd5trG7zPj9WBIU2fDfeLau9cFW6HTk3EKL6gHBKRsNHR0ujSZC', '/img/basic/avatar.png', null, '2018-05-17 19:58:26', '2018-05-17 19:58:26');
INSERT INTO `users` VALUES ('104', 'Prueba', 'prueba', '27', 'mail207@mail.com', '$2y$10$nTpWt/2M/ostOa0IwCPFl.KNVT0mJe8PmC/vAtieNrGd2H0hQcA3.', '/img/basic/avatar.png', null, '2018-05-17 19:58:26', '2018-05-17 19:58:26');
INSERT INTO `users` VALUES ('105', 'Prueba', 'prueba', '28', 'mail208@mail.com', '$2y$10$x7W1jraaAjm0OBne2DqRzehkVjRtzeJz/wo4FPMwoLYPGaUmaHA8y', '/img/basic/avatar.png', null, '2018-05-17 19:58:26', '2018-05-17 19:58:26');
INSERT INTO `users` VALUES ('106', 'Prueba', 'prueba', '29', 'mail209@mail.com', '$2y$10$zerIj5bgVRvnrIAAI6jqIuqYliEInO36ODC94I31IssabSExJxyly', '/img/basic/avatar.png', null, '2018-05-17 19:58:26', '2018-05-17 19:58:26');
INSERT INTO `users` VALUES ('107', 'Prueba', 'prueba', '210', 'mail2010@mail.com', '$2y$10$pBT5GoKrt0MKKxkvmOS.d.IO5v3THVd.KC/AnsX8Ahm/GDN5VCZx6', '/img/basic/avatar.png', null, '2018-05-17 19:58:26', '2018-05-17 19:58:26');
INSERT INTO `users` VALUES ('108', 'Prueba', 'prueba', '211', 'mail2011@mail.com', '$2y$10$OYAq6JplSr5DKXu51JAp6.VheqOFWNGXTZCiYvT4zoliTBPU4vjzm', '/img/basic/avatar.png', null, '2018-05-17 19:58:26', '2018-05-17 19:58:26');
INSERT INTO `users` VALUES ('109', 'Prueba', 'prueba', '212', 'mail2012@mail.com', '$2y$10$RcTgVaBL3a69rqx1iD.6sOBoj6S5RF161y1d1DJrKHGXl5i3PAo2K', '/img/basic/avatar.png', null, '2018-05-17 19:58:27', '2018-05-17 19:58:27');
INSERT INTO `users` VALUES ('110', 'Prueba', 'prueba', '213', 'mail2013@mail.com', '$2y$10$MLMZdjGzuXvWm8jYYjV4eOvqKgKaslBhmtUlfKfAO7Jxrg1IkWYZG', '/img/basic/avatar.png', null, '2018-05-17 19:58:27', '2018-05-17 19:58:27');
INSERT INTO `users` VALUES ('111', 'Prueba', 'prueba', '214', 'mail2014@mail.com', '$2y$10$iCGfH4A/aUNManObW/XG/.maOnnK/z83WdHZHhYntkrBntaZewAoa', '/img/basic/avatar.png', null, '2018-05-17 19:58:27', '2018-05-17 19:58:27');
INSERT INTO `users` VALUES ('112', 'Prueba', 'prueba', '215', 'mail2015@mail.com', '$2y$10$knGIO0EOi/lq1cddaexIPunLfR40rhF3ZHesHXW.GuC1rUok4jYRe', '/img/basic/avatar.png', null, '2018-05-17 19:58:27', '2018-05-17 19:58:27');
INSERT INTO `users` VALUES ('113', 'Prueba', 'prueba', '216', 'mail2016@mail.com', '$2y$10$VaRC5TCGuUWxkhNJgCOIZOZ2eGxWVYk6tALpxk869QUuf9jTnRB8i', '/img/basic/avatar.png', null, '2018-05-17 19:58:27', '2018-05-17 19:58:27');
INSERT INTO `users` VALUES ('114', 'Prueba', 'prueba', '217', 'mail2017@mail.com', '$2y$10$/fdH8s52VokLnYCDbAF1vuuAs9HU/TYj4/kvm0Di.9s16b1AzhN82', '/img/basic/avatar.png', null, '2018-05-17 19:58:27', '2018-05-17 19:58:27');
INSERT INTO `users` VALUES ('115', 'Prueba', 'prueba', '218', 'mail2018@mail.com', '$2y$10$Mv0AViiYGkIyQqEBHFSEK.Bke8zmt98PvKjYiRjVAD5xD0frESspy', '/img/basic/avatar.png', null, '2018-05-17 19:58:27', '2018-05-17 19:58:27');
INSERT INTO `users` VALUES ('116', 'Prueba', 'prueba', '219', 'mail2019@mail.com', '$2y$10$EQpUkXQS2XCt8VX1GBe64.P7dQU21/g/3U/wWU6k6bvkVuLVRczHy', '/img/basic/avatar.png', null, '2018-05-17 19:58:27', '2018-05-17 19:58:27');
INSERT INTO `users` VALUES ('117', 'Prueba', 'prueba', '220', 'mail2020@mail.com', '$2y$10$N6Va2/1mbzkJ416WmTuzJeOtc/rPw/aef8xVAzKPjXy.zkL8mogNO', '/img/basic/avatar.png', null, '2018-05-17 19:58:27', '2018-05-17 19:58:27');
INSERT INTO `users` VALUES ('118', 'Prueba', 'prueba', '221', 'mail2021@mail.com', '$2y$10$gfHuns7IOyIJ4oVocsAf/e5kdefc7uEuXeZ3QBCffz2j/36hMjuCK', '/img/basic/avatar.png', null, '2018-05-17 19:58:27', '2018-05-17 19:58:27');
INSERT INTO `users` VALUES ('119', 'Prueba', 'prueba', '222', 'mail2022@mail.com', '$2y$10$gBKKR2P.HMNmG8DdtoCU5eVLZj8mvlxoib4nEBiSqStIpW4BcroBm', '/img/basic/avatar.png', null, '2018-05-17 19:58:27', '2018-05-17 19:58:27');
INSERT INTO `users` VALUES ('120', 'Prueba', 'prueba', '223', 'mail2023@mail.com', '$2y$10$BfpHJgyGTpR/cxHIctaKze5Ar0mCcTY1xMllfShOOYCtYgaYZcWYq', '/img/basic/avatar.png', null, '2018-05-17 19:58:27', '2018-05-17 19:58:27');
INSERT INTO `users` VALUES ('121', 'Prueba', 'prueba', '224', 'mail2024@mail.com', '$2y$10$ECU1myMzKbdnMl.ScJYeLOG/OEIxRzygvgr59eHNL/R5RH5e9tM9y', '/img/basic/avatar.png', null, '2018-05-17 19:58:28', '2018-05-17 19:58:28');
INSERT INTO `users` VALUES ('122', 'Prueba', 'prueba', '225', 'mail2025@mail.com', '$2y$10$I3NO2RAtjAI1PQsbnKGAV.EYLtNYYho0bvfDdar92R0we22yz9tTi', '/img/basic/avatar.png', null, '2018-05-17 19:58:28', '2018-05-17 19:58:28');
INSERT INTO `users` VALUES ('123', 'Prueba', 'prueba', '226', 'mail2026@mail.com', '$2y$10$CDAX/nCAyTbDQ0Gh7rJmv.JkBwJ5teO3vmh0/T3hfNajXGaPPMDLu', '/img/basic/avatar.png', null, '2018-05-17 19:58:28', '2018-05-17 19:58:28');
INSERT INTO `users` VALUES ('124', 'Prueba', 'prueba', '227', 'mail2027@mail.com', '$2y$10$x4QQD569WeoJHc/U.xY.jeO/cC09TDEpBgUgC0BS9iyiEv1NLX2T2', '/img/basic/avatar.png', null, '2018-05-17 19:58:28', '2018-05-17 19:58:28');
INSERT INTO `users` VALUES ('125', 'Prueba', 'prueba', '228', 'mail2028@mail.com', '$2y$10$nJ5oEolYbAJSDIzQr/Goq.ZhRFLMKn.I/9X0HkSqjG9Eg4zAqYd1u', '/img/basic/avatar.png', null, '2018-05-17 19:58:28', '2018-05-17 19:58:28');
INSERT INTO `users` VALUES ('126', 'Prueba', 'prueba', '229', 'mail2029@mail.com', '$2y$10$1.T6hQYNPssyU1UIux2y/eVE4Wos7csfK1jH1sHQ.dB9AfwmSmv9a', '/img/basic/avatar.png', null, '2018-05-17 19:58:28', '2018-05-17 19:58:28');
INSERT INTO `users` VALUES ('127', 'Gabriel Ángel', 'Zepeda', 'Padilla', 'mail1@mail.com', '$2y$10$8UPLkDq9IwCrjrZoxypfmOR0OQTL7TruyFREIHe1of//hDenAajO6', '/img/basic/avatar.png', null, '2018-05-17 19:58:28', '2018-05-17 19:58:28');
INSERT INTO `users` VALUES ('128', 'Antonio de Jesús', 'González', 'López', 'mail2@mail.com', '$2y$10$J4eb0oNy40qCZfWMcARpxey5ScXH7FLzGpv52dVMIfiJyAjtOAPk6', '/img/basic/avatar.png', null, '2018-05-17 19:58:28', '2018-05-17 19:58:28');
INSERT INTO `users` VALUES ('129', 'José Luis', 'Ochoa', 'Sahagún', 'mail3@mail.com', '$2y$10$5n7e8rLFMK0RxaMyLctuquZIYkOEzKYOnRXcn3qHZhNYehHIZuQoC', '/img/basic/avatar.png', null, '2018-05-17 19:58:28', '2018-05-17 19:58:28');
INSERT INTO `users` VALUES ('130', 'Vicente Emanuel', 'Solano', 'Anguiano', 'mail4@mail.com', '$2y$10$hfl3QaBG6tZL3hviEgFYQenqs49rEdz/3YyxmHf5gMimzcAMikGD.', '/img/basic/avatar.png', null, '2018-05-17 19:58:28', '2018-05-17 19:58:28');
INSERT INTO `users` VALUES ('131', 'María Magdalena', 'Pérez', 'Cartañeda', 'mail5@mail.com', '$2y$10$U8Ih/j1gV3WUnKDcVNND8Od1XhbGWhH6eF5/18k7NQsNF7Eh9hxjK', '/img/basic/avatar.png', null, '2018-05-17 19:58:28', '2018-05-17 19:58:28');
INSERT INTO `users` VALUES ('132', 'Eduardo', 'Padilla', 'Gálvez', 'mail6@mail.com', '$2y$10$YbUtG/3OarXyjRBjiU0HV.5oBvvkTRL.6ZfPyJHeTcwwg3scIHxli', '/img/basic/avatar.png', null, '2018-05-17 19:58:28', '2018-05-17 19:58:28');
INSERT INTO `users` VALUES ('133', 'José Ignacio', 'Paz', 'Esparza', 'mail7@mail.com', '$2y$10$9k2zk3iUBtHNbStkttLJ5.GrlSrY.yMAF.VEqkLKkLR1WcybG2rjW', '/img/basic/avatar.png', null, '2018-05-17 19:58:29', '2018-05-17 19:58:29');
INSERT INTO `users` VALUES ('134', 'Arturo', 'Peña', 'Delgadillo', 'mail8@mail.com', '$2y$10$SUm1HCOklBFB5k1CS5z6W.t89Anm29X1EpM3rorOzu757uUcC5Og6', '/img/basic/avatar.png', null, '2018-05-17 19:58:29', '2018-05-17 19:58:29');
INSERT INTO `users` VALUES ('135', 'José Reyes', 'Marcial', 'Hernández', 'mail9@mail.com', '$2y$10$3FrAU017QcxaqOatvrhgh.7aTbAE4W6Wem945JRwsSFH.IoAzkiTO', '/img/basic/avatar.png', null, '2018-05-17 19:58:29', '2018-05-17 19:58:29');
INSERT INTO `users` VALUES ('136', 'Prueba', 'Prueba', '31', 'mail10@mail.com', '$2y$10$elgs.B80ptpFbszjX9xNCekgnKVfAEEe0KC1NnPNqXG51IcKtMKsa', '/img/basic/avatar.png', null, '2018-05-17 19:58:29', '2018-05-17 19:58:29');
INSERT INTO `users` VALUES ('137', 'Vidal', 'Reyes', 'Villalvazo', 'mail11@mail.com', '$2y$10$3.qJR30JQhmIvpcTt7wp8u5WQZCbXZGNaBe9h.cZPWygEiuDPz4hu', '/img/basic/avatar.png', null, '2018-05-17 19:58:29', '2018-05-17 19:58:29');
INSERT INTO `users` VALUES ('138', 'María Eufamia', 'Ramos', 'Castellanos', 'mail12@mail.com', '$2y$10$8jRimVw1uDMeCrsZWcZ7sOi0LRzftrU0L65fWdX7Uf.NcGSlFQhbe', '/img/basic/avatar.png', null, '2018-05-17 19:58:29', '2018-05-17 19:58:29');
INSERT INTO `users` VALUES ('139', 'Prueba', 'Prueba', '32', 'mail14@mail.com', '$2y$10$Wq3Gr/K4i9.DoTsWQR93aOSxpKSGE0DdrZc6/2xlWE9aPoyzZvKtO', '/img/basic/avatar.png', null, '2018-05-17 19:58:29', '2018-05-17 19:58:29');
INSERT INTO `users` VALUES ('140', 'Edgar Manuel', 'Toscano', 'Moreno', 'mail13@mail.com', '$2y$10$N5VTMFyQM19Vtmc45wiaU.YfI2VAdzQwc/3Hf8YB4u6gza.yJL.26', '/img/basic/avatar.png', null, '2018-05-17 19:58:29', '2018-05-17 19:58:29');
INSERT INTO `users` VALUES ('141', 'Jesús Amed', 'Torres', 'Medina', 'mail15@mail.com', '$2y$10$W6tkVpGGEnYW2yzJL0JoX.I9727jEvx66WNjNExb9O/3SRd3/CBLO', '/img/basic/avatar.png', null, '2018-05-17 19:58:29', '2018-05-17 19:58:29');
INSERT INTO `users` VALUES ('142', 'Andrés', 'Ramírez', 'Mendoza', 'mail16@mail.com', '$2y$10$FdOKDkze1bHF7jXY/YZv4OONbLktWv7rETvKfjPz8fHTq3QKJY6Hi', '/img/basic/avatar.png', null, '2018-05-17 19:58:29', '2018-05-17 19:58:29');
INSERT INTO `users` VALUES ('143', 'Francisco Javier', 'Amezcua', 'Rincón', 'mail17@mail.com', '$2y$10$7ZJz4vLCmZ9aXds3U/w/qe8TVv1hexzIrfuas81Is6GGt2fELhame', '/img/basic/avatar.png', null, '2018-05-17 19:58:29', '2018-05-17 19:58:29');
INSERT INTO `users` VALUES ('144', 'Arcadio', 'Andrade', 'Urzúa', 'mail18@mail.com', '$2y$10$Q5ahy2Qe8yw2VeTRmvMhz.DKkTMq33ZXdPhrFtNWMcWG2PmK0KfWO', '/img/basic/avatar.png', null, '2018-05-17 19:58:30', '2018-05-17 19:58:30');
INSERT INTO `users` VALUES ('145', 'Teresa', 'Barragán', 'Ornelas', 'mail19@mail.com', '$2y$10$j/VqL.zdB6G0chWgiR2GE.qdwvFloTBvDttLp22kkOg/ZX79ywoiG', '/img/basic/avatar.png', null, '2018-05-17 19:58:30', '2018-05-17 19:58:30');
INSERT INTO `users` VALUES ('146', 'HELIODORO', 'LANGARICA', 'MUÑOS', 'mail154@mail.com', '$2y$10$dcJBgktsHi9ka7wqeyIAjeEfHWTlYY4n7wmbVdTSul9Kvz5MpeAmO', '/img/basic/avatar.png', null, '2018-05-17 19:58:30', '2018-05-17 19:58:30');
INSERT INTO `users` VALUES ('147', 'Brayan Iván', 'Arias', 'Larios', 'mail20@mail.com', '$2y$10$KXAyljEX1xXkMXohplz/C.uYoaq.kVamo2dYIJACIafzuPDTzUK6a', '/img/basic/avatar.png', null, '2018-05-17 19:58:30', '2018-05-17 19:58:30');
INSERT INTO `users` VALUES ('148', 'Cielo María', 'Larios', 'Cortés', 'mail21@mail.com', '$2y$10$6Bv.2fqtJf.hKxrPfHVO.OVpAQ8i.h9IGN6Iafg5YVshT.ls4xGTu', '/img/basic/avatar.png', null, '2018-05-17 19:58:30', '2018-05-17 19:58:30');
INSERT INTO `users` VALUES ('149', 'Prueba', 'Prueba', '5', 'mai1l22@mail.com', '$2y$10$3GA1PjZhTzQRns4XuplAWescfF/SZrZbAL1H/fRtb8zGU1bophdSi', '/img/basic/avatar.png', null, '2018-05-17 19:58:30', '2018-05-17 19:58:30');
INSERT INTO `users` VALUES ('150', 'José Luis', 'Gallegos', 'Martínez', 'mail155@mail.com', '$2y$10$q5fh6n.QZtTZkVBejxWmiOvTf8sN.JDMcoOSsOnSNqC7JvNSS.9Iy', '/img/basic/avatar.png', null, '2018-05-17 19:58:30', '2018-05-17 19:58:30');
INSERT INTO `users` VALUES ('151', 'Adrián', 'Gallegos', 'Torres', 'mail156@mail.com', '$2y$10$DenBCoCO18jZ.wvSsq6/8eeRLcfKX15IIIeMvUJgrvzbJbD461W9i', '/img/basic/avatar.png', null, '2018-05-17 19:58:30', '2018-05-17 19:58:30');
INSERT INTO `users` VALUES ('152', 'José de Jesús', 'Morán', 'Martín', 'mail157@mail.com', '$2y$10$6qzvQl7dzpfYLwFLvG5Ka.ImI/J42hVJnVWZitTvmPFpKIE1v6Fji', '/img/basic/avatar.png', null, '2018-05-17 19:58:30', '2018-05-17 19:58:30');
INSERT INTO `users` VALUES ('153', 'Vanessa', 'Amador', 'Orozco', 'mail158@mail.com', '$2y$10$7dsThYAwqvwF5tHTDMfideWEhnjEVLxeb0kyNN9wnaxban9q89UPm', '/img/basic/avatar.png', null, '2018-05-17 19:58:30', '2018-05-17 19:58:30');
INSERT INTO `users` VALUES ('154', 'María Elba', 'Rodríguez', 'Camarena', 'mail159@mail.com', '$2y$10$kresy6iAxbfzj0KUUyq6Z.6vHcSPSle6IeNAoGBZ9vWtCWNaTO71u', '/img/basic/avatar.png', null, '2018-05-17 19:58:30', '2018-05-17 19:58:30');
INSERT INTO `users` VALUES ('155', 'Saúl Alejandro', 'Jiménez', 'Sánchez', 'mail160@mail.com', '$2y$10$oPvkrnVyF96ljdTMX0niwebTgLtCa0jO3mu1KdzmevkQ2jv84NQz6', '/img/basic/avatar.png', null, '2018-05-17 19:58:30', '2018-05-17 19:58:30');
INSERT INTO `users` VALUES ('156', 'María de Lourdes', 'Sánchez', 'Martínez', 'mail161@mail.com', '$2y$10$QHrQizZSA9L2/a7p0lvEm.7Jx/c30atnD.3A8Nm62u7oZy5dukRl2', '/img/basic/avatar.png', null, '2018-05-17 19:58:31', '2018-05-17 19:58:31');
INSERT INTO `users` VALUES ('157', 'Pedro Dante', 'Ceballos', 'Hernández', 'mail162@mail.com', '$2y$10$8Qu61QEOchV8oI4g9mGXFO.bZZHkqb56KWPCHj/BmLBxXJhclMwuO', '/img/basic/avatar.png', null, '2018-05-17 19:58:31', '2018-05-17 19:58:31');
INSERT INTO `users` VALUES ('158', 'Prueba', 'Prueba', '33', 'mail163@mail.com', '$2y$10$.FiO/n4jWUrwjiGaChh5V.4YtHilZkfmE30NgCZh2O8DShp6gh1ua', '/img/basic/avatar.png', null, '2018-05-17 19:58:31', '2018-05-17 19:58:31');
INSERT INTO `users` VALUES ('159', 'Ezrikam Eckhaus', 'Solís', 'Cámara', 'mail164@mail.com', '$2y$10$NyQMiOGjB8OYg1eJIour5upa2Q2yLC2ql9UgseRnXdDYaaXoo8HoK', '/img/basic/avatar.png', null, '2018-05-17 19:58:31', '2018-05-17 19:58:31');
INSERT INTO `users` VALUES ('160', 'Luis Eduardo', 'Schulte', 'Orozco', 'mail165@mail.com', '$2y$10$VhpdyXvU70tHvqvJESbSyef9Hu7HVGzaMwANMHPQxNDzm7XGRjWf6', '/img/basic/avatar.png', null, '2018-05-17 19:58:31', '2018-05-17 19:58:31');
INSERT INTO `users` VALUES ('161', 'Leonardo', 'Torres', 'González', 'mail166@mail.com', '$2y$10$t14jDbWke5RyUfMx7Ip9tevwoHo.uZ.R90m6P77vor5tkqkrWn7nW', '/img/basic/avatar.png', null, '2018-05-17 19:58:31', '2018-05-17 19:58:31');
INSERT INTO `users` VALUES ('162', 'Enrique', 'Barajas', 'De la Vega', 'mail167@mail.com', '$2y$10$0rwPddFjOTptIBTg1x4C2eVnM2fjmKAlDetriz6vJh41/7UNlVkiu', '/img/basic/avatar.png', null, '2018-05-17 19:58:31', '2018-05-17 19:58:31');
INSERT INTO `users` VALUES ('163', 'Vanessa', 'Amador', 'Orozco', 'mail168@mail.com', '$2y$10$JnFefGBimeyssJmU00X3iepFl9.pLOqCPvEhaEKaAuWsE.BwJ7.1u', '/img/basic/avatar.png', null, '2018-05-17 19:58:31', '2018-05-17 19:58:31');
INSERT INTO `users` VALUES ('164', 'José Eduardo', 'Murillo', 'Lugo', 'mail169@mail.com', '$2y$10$qEFOhXTwywfp/PWGzMOw7ehBKiJ2SHHkVF.rY.xFY7WgFEdaGgpU2', '/img/basic/avatar.png', null, '2018-05-17 19:58:31', '2018-05-17 19:58:31');
INSERT INTO `users` VALUES ('165', 'Carlos Hugo', 'James', 'Ibañez', 'mail170@mail.com', '$2y$10$USbimtj1XdHdnC4jaPck6eKzX/KnDyIBKc3RbIF41BUtZFJH8aa82', '/img/basic/avatar.png', null, '2018-05-17 19:58:31', '2018-05-17 19:58:31');
INSERT INTO `users` VALUES ('166', 'Carlos Alberto', 'Ramírez', 'Barajas', 'mail171@mail.com', '$2y$10$APgL1weX3cyzH4HCtZAgc.hJSDaxKizz9QcUg0TpEkRIfoWzO4Zsa', '/img/basic/avatar.png', null, '2018-05-17 19:58:32', '2018-05-17 19:58:32');
INSERT INTO `users` VALUES ('167', 'Hernán Seúl', 'Estuardo', 'Cisneros', 'mail172@mail.com', '$2y$10$U4eyJy0OqN9RnqmWbHjOFu6Egkhs8YfCC9IiHw2Oo46apItDfmwJe', '/img/basic/avatar.png', null, '2018-05-17 19:58:32', '2018-05-17 19:58:32');
INSERT INTO `users` VALUES ('168', 'Prueba', 'Prueba', '34', 'mail173@mail.com', '$2y$10$O8blwVMTpXtADEgWLmjjUe420NbmEo0rrucl9Ug5OZ3H27t2CvG.G', '/img/basic/avatar.png', null, '2018-05-17 19:58:32', '2018-05-17 19:58:32');
INSERT INTO `users` VALUES ('169', 'Guillermo', 'Adame', 'Barreto', 'mail174@mail.com', '$2y$10$OhYmpw5q3JfuWYXou2qZm.yTx3A0DV6K3tx/7xhOYgDkIifSzTOia', '/img/basic/avatar.png', null, '2018-05-17 19:58:32', '2018-05-17 19:58:32');
INSERT INTO `users` VALUES ('170', 'Alberto Ramón', 'López', 'Peralta', 'mail175@mail.com', '$2y$10$iVvjdw8Z7ipgkCtbQwm5Ce9ZI5e4uCR.ZMdcsXTxpIEjlCfogubWm', '/img/basic/avatar.png', null, '2018-05-17 19:58:32', '2018-05-17 19:58:32');
INSERT INTO `users` VALUES ('171', 'Gustavo Adolfo', 'García', 'Molina', 'mail176@mail.com', '$2y$10$uL3bja192C6Ye36s.DrTv.3CbTjx.w0LVjBjALpH1X3dKlgS.JWbe', '/img/basic/avatar.png', null, '2018-05-17 19:58:32', '2018-05-17 19:58:32');
INSERT INTO `users` VALUES ('172', 'Ma. de Jesús', 'Ramírez', 'Andrade', 'mail177@mail.com', '$2y$10$xjqiAXEexb1Q.Acgupj8IuP.zFZbxhlxBvP6yTftwHJTKcYtDLewm', '/img/basic/avatar.png', null, '2018-05-17 19:58:32', '2018-05-17 19:58:32');
INSERT INTO `users` VALUES ('173', 'Prueba', 'Prueba', '50', 'mail178@mail.com', '$2y$10$1z81k2jQuQrlCEMGEl.DyeXZYLPmYpOl8AHGTK.JzmjUUDIRXxoWa', '/img/basic/avatar.png', null, '2018-05-17 19:58:32', '2018-05-17 19:58:32');
INSERT INTO `users` VALUES ('174', 'Mauricio', 'Cervantes', 'Picazo', 'mail1178@mail.com', '$2y$10$4GTF8EqpfwPDRhw3zqiZSu7GYfXEROQWiKZlzNe0fiwPTBTGapd8e', '/img/basic/avatar.png', null, '2018-05-17 19:58:32', '2018-05-17 19:58:32');
INSERT INTO `users` VALUES ('175', 'Prueba', 'Prueba', '51', 'mail180@mail.com', '$2y$10$iXArSpdTcUCXMvzIod.fX.cs3LvZ7UtlzsjgCKk0m83awo9uVve2S', '/img/basic/avatar.png', null, '2018-05-17 19:58:32', '2018-05-17 19:58:32');
INSERT INTO `users` VALUES ('176', 'José Armando', 'Vuelvas', 'Alcaraz', 'mail181@mail.com', '$2y$10$vIr0LaEinebpGBQG7nJvP./oD1OWERNDJo/WIZucEVlXZAbstPD.C', '/img/basic/avatar.png', null, '2018-05-17 19:58:32', '2018-05-17 19:58:32');
INSERT INTO `users` VALUES ('177', 'Hugo Fernando', 'Sosa', 'Ortega', 'mail182@mail.com', '$2y$10$Pf7C3BH9AnzQ8SMcWj0FluAyCfsu8WiJtJ7PQL7Azf3fuQ7KjC5Ku', '/img/basic/avatar.png', null, '2018-05-17 19:58:33', '2018-05-17 19:58:33');
INSERT INTO `users` VALUES ('178', 'José Antonio', 'Cortes', 'Chávez', 'mail183@mail.com', '$2y$10$iT5u/QpCOhYMvTmxO7XBoeQ4.tWV.C/y.WGblf7lSnC8RCSvA7HrW', '/img/basic/avatar.png', null, '2018-05-17 19:58:33', '2018-05-17 19:58:33');
INSERT INTO `users` VALUES ('179', 'Francisco', 'Pinal', 'Ruiz', 'mail184@mail.com', '$2y$10$oB/al3kcWU17v3VPVXd6KeNc9mAraaDkaDCVuA8PdPOUul2RYHpim', '/img/basic/avatar.png', null, '2018-05-17 19:58:33', '2018-05-17 19:58:33');
INSERT INTO `users` VALUES ('180', 'Esteban Armin', 'Torres', 'Cárdenas', 'mail185@mail.com', '$2y$10$iAltX5alJti7K8lEUDHd1ukgcIZPhBN624RdjWGaujw.zDxY8sXXy', '/img/basic/avatar.png', null, '2018-05-17 19:58:33', '2018-05-17 19:58:33');
INSERT INTO `users` VALUES ('181', 'Roberto', 'Martínez', 'Pacheco', 'mail186@mail.com', '$2y$10$HjZ4Hr8kLFA7FqHXtWmbgut8BMrNeN1Wzmw8ynu.u9uOsRI6Iv8lO', '/img/basic/avatar.png', null, '2018-05-17 19:58:33', '2018-05-17 19:58:33');
INSERT INTO `users` VALUES ('182', 'Mario Arturo', 'Bravo', 'Pérez', 'mail187@mail.com', '$2y$10$qtl1nRuSQI6asEBHA88osOAUi1Bsyyuo1vwmEtPTBRxhlNTW7F/Fe', '/img/basic/avatar.png', null, '2018-05-17 19:58:33', '2018-05-17 19:58:33');
INSERT INTO `users` VALUES ('183', 'Luz del Alba Leonor', 'López', 'Carmona', 'mail188@mail.com', '$2y$10$elxxYqAUIz/Ic5jYwio3qu0P6Fo2NbDMKJOzGRs7SHP5NhvJZv5Aq', '/img/basic/avatar.png', null, '2018-05-17 19:58:33', '2018-05-17 19:58:33');
INSERT INTO `users` VALUES ('184', 'Pablo Abraham', 'Rodríguez', 'Guzmán', 'mail189@mail.com', '$2y$10$57Ow6HwNmtDqEyIvmGqC8uLvZ9WY866XNLzSi1LOJhbcjbsPU56Da', '/img/basic/avatar.png', null, '2018-05-17 19:58:33', '2018-05-17 19:58:33');
INSERT INTO `users` VALUES ('185', 'Imelda María', 'González', 'Llerenas', 'mail190@mail.com', '$2y$10$JTbqtQKbk1VXhoXF3Y6sducDJ5w85sqppTCtB28UkguXwwRpv0L0a', '/img/basic/avatar.png', null, '2018-05-17 19:58:33', '2018-05-17 19:58:33');
INSERT INTO `users` VALUES ('186', 'Socorro', 'Venegas', 'Martínez', 'mail191@mail.com', '$2y$10$FxI/HCMWvS/WwaPXDHuS7.3sC8K8YzHLQLYc8Tt3vKKjqJVTGPwNm', '/img/basic/avatar.png', null, '2018-05-17 19:58:33', '2018-05-17 19:58:33');
INSERT INTO `users` VALUES ('187', 'Hugo Alejandro', 'Ruiz', 'Venegas', 'mail192@mail.com', '$2y$10$wAkOVir2NgrABCc9Fpzwo.XQCIGRdMtJvbpkOw9./fqsMopeLxTXC', '/img/basic/avatar.png', null, '2018-05-17 19:58:33', '2018-05-17 19:58:33');
INSERT INTO `users` VALUES ('188', 'Marco Antonio', 'Suárez', 'Solís', 'mail193@mail.com', '$2y$10$xVO7vh/H/aPuAlRhgGBcJ.w9fBdxVLJI15Hz/Xgd2I12mktz5Z3RS', '/img/basic/avatar.png', null, '2018-05-17 19:58:33', '2018-05-17 19:58:33');
INSERT INTO `users` VALUES ('189', 'Jorge Arturo', 'Martínez', 'Álvarez', 'mail194@mail.com', '$2y$10$fu7UYeTIdLPhvadfC3B4MO00HjD/9vv5UQfYwVhN4m3HC029Q3Hk.', '/img/basic/avatar.png', null, '2018-05-17 19:58:34', '2018-05-17 19:58:34');
INSERT INTO `users` VALUES ('190', 'Pablo', 'Michel', 'Hernández', 'mail195@mail.com', '$2y$10$sfVD3lc85eZtUbhkVr003Ou8JiNVIHwNruk2QOlYF6979Y1oRZ/G2', '/img/basic/avatar.png', null, '2018-05-17 19:58:34', '2018-05-17 19:58:34');
INSERT INTO `users` VALUES ('191', 'Elda Gizel', 'Zúñiga', 'Cárdenas', 'mail196@mail.com', '$2y$10$aX5xh5bpWUwKBteKu72Xge9W/tR1RaAJentBumPlaMfFZIc8WC/Cq', '/img/basic/avatar.png', null, '2018-05-17 19:58:34', '2018-05-17 19:58:34');
INSERT INTO `users` VALUES ('192', 'Víctor David', 'López', 'Vázquez', 'mail197@mail.com', '$2y$10$W6.gEWpZBwQ98KlrTE3HaOfJsARWEGUnRx8CaPAo9pBWNLgTi9jQq', '/img/basic/avatar.png', null, '2018-05-17 19:58:34', '2018-05-17 19:58:34');
INSERT INTO `users` VALUES ('193', 'Héctor Darío', 'Ramírez', 'Medina', 'mail198@mail.com', '$2y$10$zjFLHimzPvbFaZoKJZ99LOf9mdooMw1sundFmSrC3O0xepLJcUWHG', '/img/basic/avatar.png', null, '2018-05-17 19:58:34', '2018-05-17 19:58:34');
INSERT INTO `users` VALUES ('194', 'Luis Eduardo', 'Schulte', 'Orozco', 'mail199@mail.com', '$2y$10$hfU/bhXb/V6q6drFBOBdyeJMPUQ1LVBXSkTG3bDoU8UkVmrH0AIJ6', '/img/basic/avatar.png', null, '2018-05-17 19:58:34', '2018-05-17 19:58:34');
INSERT INTO `users` VALUES ('195', 'Héctor Manuel', 'Brambila', 'Cortés', 'mail230@mail.com', '$2y$10$PdhHi3Rfb3flk2EhLIxIROyLpkAKsL/w1Nq6UjxtFhWD2gQru/wqK', '/img/basic/avatar.png', null, '2018-05-17 19:58:34', '2018-05-17 19:58:34');
INSERT INTO `users` VALUES ('196', 'Carmen', 'Castillo', 'Velasco', 'mail231@mail.com', '$2y$10$G5pOEZvvlIiF7M9AMrq4LuXEX54icXdnWVAwHq5kM8fLqUlatFpOG', '/img/basic/avatar.png', null, '2018-05-17 19:58:34', '2018-05-17 19:58:34');
INSERT INTO `users` VALUES ('197', 'Emmanuel Martín', 'Carreño', 'Ruíz', 'mail232@mail.com', '$2y$10$yTPXTKBPkJMvTD5lMg6W8e08wS7h3Aq.O2RJCyE67pUALnRdRjGGy', '/img/basic/avatar.png', null, '2018-05-17 19:58:34', '2018-05-17 19:58:34');
INSERT INTO `users` VALUES ('198', 'José Alejandro', 'Lozano', 'Viera', 'mail233@mail.com', '$2y$10$MHmGfWqXxkoZqyzn74jNVOaai6n2jaQZXDj5Yp1UbJB1mcIw6MlX6', '/img/basic/avatar.png', null, '2018-05-17 19:58:34', '2018-05-17 19:58:34');
INSERT INTO `users` VALUES ('199', 'Héctor Manuel', 'Brambila', 'Cortés', 'mail234@mail.com', '$2y$10$g5sodsPh.WPQm4lIzIexmuwxmbq9SzEDkNIbhrXKtL09JSP3yQDTi', '/img/basic/avatar.png', null, '2018-05-17 19:58:34', '2018-05-17 19:58:34');

-- ----------------------------
-- View structure for v_folio
-- ----------------------------
DROP VIEW IF EXISTS `v_folio`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_folio` AS select `a`.`id_Expediente` AS `Fexpediente`,`a`.`Folio` AS `Folio`,cast(substring_index(`a`.`Folio`,'_',-(1)) as signed) AS `num` from (`expediente` `e` join `anexopdf` `a` on((`e`.`id` = `a`.`id_Expediente`))) order by cast(substring_index(`a`.`Folio`,'_',-(1)) as signed) desc ;

-- ----------------------------
-- View structure for v_razones
-- ----------------------------
DROP VIEW IF EXISTS `v_razones`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_razones` AS (select `persona`.`user_id` AS `user_id`,`persona`.`razon_social` AS `razon_social` from `persona`) union (select `institucion`.`user_id` AS `user_id`,`institucion`.`razon_social` AS `razon_social` from `institucion`) ;

-- ----------------------------
-- View structure for v_seguimiento
-- ----------------------------
DROP VIEW IF EXISTS `v_seguimiento`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_seguimiento` AS select `e`.`id` AS `id_expediente`,`e`.`expediente` AS `expediente`,date_format(`e`.`fecha`,'%d-%m-%Y') AS `fechasis`,`pdo`.`id` AS `id_razonsocial`,`pdo`.`razon_social` AS `Demandado`,`pde`.`id` AS `id_demandante`,`pde`.`Nombre` AS `Demandante`,`e`.`descripcion` AS `Resumen` from ((`expediente` `e` join `v_usuarios` `pde` on((`pde`.`id` = `e`.`id_demandante`))) join `v_usuarios` `pdo` on((`pdo`.`id` = `e`.`id_demandado`))) where (`e`.`status` = 1) group by `e`.`id`,`Demandado` order by `e`.`expediente` desc ;

-- ----------------------------
-- View structure for v_seguimiento2
-- ----------------------------
DROP VIEW IF EXISTS `v_seguimiento2`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_seguimiento2` AS select `v`.`id_expediente` AS `id_expediente`,`v`.`expediente` AS `expediente`,`v`.`fechasis` AS `fechasis`,`v`.`id_razonsocial` AS `id_razonsocial`,`v`.`Demandado` AS `demandado`,`v`.`Demandante` AS `demandante`,`v`.`Resumen` AS `resumen`,date_format(`s`.`fecha`,'%d-%m-%Y') AS `FechaEnvio` from (`v_seguimiento` `v` join `seguimiento` `s` on((`v`.`id_expediente` = `s`.`id_exp`))) where `s`.`id` in (select distinct `seguimiento`.`id` from `seguimiento` where (`seguimiento`.`movimiento` = 'Salida')) ;

-- ----------------------------
-- View structure for v_usuarios
-- ----------------------------
DROP VIEW IF EXISTS `v_usuarios`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_usuarios` AS select `u`.`id` AS `id`,concat(`u`.`nombre`,' ',`u`.`a_paterno`,' ',`u`.`a_materno`) AS `Nombre`,`vr`.`razon_social` AS `razon_social` from (`users` `u` join `v_razones` `vr` on((`u`.`id` = `vr`.`user_id`))) ;
