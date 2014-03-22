-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 20, 2014 at 03:05 PM
-- Server version: 5.5.35
-- PHP Version: 5.4.4-14+deb7u8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `carsale`
--

-- --------------------------------------------------------

--
-- Table structure for table `serieFeature`
--

CREATE TABLE IF NOT EXISTS `serieFeature` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idFeature` int(11) NOT NULL,
  `description` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `option` char(1) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT 'n',
  `dateCreate` datetime DEFAULT NULL,
  `dateUpdate` datetime DEFAULT NULL,
  `userUpdate` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=802 ;

--
-- Dumping data for table `serieFeature`
--

INSERT INTO `serieFeature` (`id`, `idFeature`, `description`, `option`, `dateCreate`, `dateUpdate`, `userUpdate`) VALUES
(70, 366, 'Revestimento do assoalho em carpete', 's', '2014-03-06 14:47:52', '2014-03-06 14:47:52', NULL),
(69, 366, 'Retrovisores externos el?tricos; aquec?veis e com rebatimento el?trico', 's', '2014-03-06 14:47:52', '2014-03-06 14:47:52', NULL),
(68, 366, 'Retrovisor interno eletrocr?mico', 's', '2014-03-06 14:47:52', '2014-03-06 14:47:52', NULL),
(67, 366, 'Radio RCD510 touchscreen c/ SD-Card; AUX-in e Bluetooth', 's', '2014-03-06 14:47:52', '2014-03-06 14:47:52', NULL),
(65, 366, 'Pneus 255/60 R18', 's', '2014-03-06 14:47:52', '2014-03-06 14:47:52', NULL),
(66, 366, 'Protetor do c?rter + para-barro', 's', '2014-03-06 14:47:52', '2014-03-06 14:47:52', NULL),
(64, 366, 'Piloto autom?tico', 's', '2014-03-06 14:47:52', '2014-03-06 14:47:52', NULL),
(63, 366, 'P?ra-choque dianteiro na cor da pick-up e traseiro cromado', 's', '2014-03-06 14:47:52', '2014-03-06 14:47:52', NULL),
(62, 366, 'Novo computador de bordo', 's', '2014-03-06 14:47:52', '2014-03-06 14:47:52', NULL),
(61, 366, 'Motor 2.0 TDI Bi-turbo diesel 180cv', 's', '2014-03-06 14:47:52', '2014-03-06 14:47:52', NULL),
(60, 366, 'Molduras das caixas roda na cor do carro', 's', '2014-03-06 14:47:52', '2014-03-06 14:47:52', NULL),
(59, 366, 'Limpador do p?ra-brisa com temporizador vari?vel', 's', '2014-03-06 14:47:52', '2014-03-06 14:47:52', NULL),
(58, 366, 'Gaveta sob o banco do motorista', 's', '2014-03-06 14:47:52', '2014-03-06 14:47:52', NULL),
(57, 366, 'Far?is de neblina c/ luz din?mica para manobras', 's', '2014-03-06 14:47:52', '2014-03-06 14:47:52', NULL),
(56, 366, 'Dire??o hidr?ulica', 's', '2014-03-06 14:47:52', '2014-03-06 14:47:52', NULL),
(55, 366, 'Detalhes internos cromados', 's', '2014-03-06 14:47:52', '2014-03-06 14:47:52', NULL),
(54, 366, 'Desemba?ador do vidro traseiro', 's', '2014-03-06 14:47:52', '2014-03-06 14:47:52', NULL),
(53, 366, 'Descansa-bra?o central com porta-objetos', 's', '2014-03-06 14:47:52', '2014-03-06 14:47:52', NULL),
(51, 366, 'Coming & Leaving home', 's', '2014-03-06 14:47:52', '2014-03-06 14:47:52', NULL),
(52, 366, 'Controle Eletr?nico de Estabilidade (ESC) c/ Controle Autom?tico de Descida (HDC) e Assistente para ', 's', '2014-03-06 14:47:52', '2014-03-06 14:47:52', NULL),
(50, 366, 'Carca?as dos retrovisores parcialmente cromadas', 's', '2014-03-06 14:47:52', '2014-03-06 14:47:52', NULL),
(49, 366, 'Bancos dianteiros com ajuste de altura (motorista e passageiro)', 's', '2014-03-06 14:47:52', '2014-03-06 14:47:52', NULL),
(48, 366, 'Ar condicionado Climatronic', 's', '2014-03-06 14:47:52', '2014-03-06 14:47:52', NULL),
(47, 366, 'Antena incorporada ? carca?a do retrovisor esquerdo', 's', '2014-03-06 14:47:52', '2014-03-06 14:47:52', NULL),
(46, 366, 'Al?as de seguran?a no teto (4)', 's', '2014-03-06 14:47:52', '2014-03-06 14:47:52', NULL),
(45, 366, 'Al?as de apoio na coluna dianteira (L.D) e traseiras', 's', '2014-03-06 14:47:52', '2014-03-06 14:47:52', NULL),
(44, 366, 'Airbag para motorista e passageiro', 's', '2014-03-06 14:47:52', '2014-03-06 14:47:52', NULL),
(43, 366, 'ABS off-road; EDL; TCS; BAS; EBD e RBS', 's', '2014-03-06 14:47:52', '2014-03-06 14:47:52', NULL),
(42, 366, '4 alto-falantes e 2 tweeters', 's', '2014-03-06 14:47:52', '2014-03-06 14:47:52', NULL),
(71, 366, 'Rodas de liga-leve de 18? (estepe em a?o)', 's', '2014-03-06 14:47:52', '2014-03-06 14:47:52', NULL),
(72, 366, 'Sensores crepuscular e chuva', 's', '2014-03-06 14:47:52', '2014-03-06 14:47:52', NULL),
(73, 366, 'Sensores de estacionamento dianteiros e traseiros', 's', '2014-03-06 14:47:52', '2014-03-06 14:47:52', NULL),
(74, 366, 'Sistema ISOFIX para fixa??o de cadeiras para crian?a no banco traseiro', 's', '2014-03-06 14:47:52', '2014-03-06 14:47:52', NULL),
(75, 366, 'Tampa traseira com sistema de al?vio de peso e chave', 's', '2014-03-06 14:47:52', '2014-03-06 14:47:52', NULL),
(76, 366, 'Torque de 42;8kgfm', 's', '2014-03-06 14:47:52', '2014-03-06 14:47:52', NULL),
(77, 366, 'Tra??o 4x4 permanente', 's', '2014-03-06 14:47:52', '2014-03-06 14:47:52', NULL),
(78, 366, 'Transmiss?o autom?tica de 8 velocidades', 's', '2014-03-06 14:47:52', '2014-03-06 14:47:52', NULL),
(79, 366, 'Travamento central e alarme keyless', 's', '2014-03-06 14:47:52', '2014-03-06 14:47:52', NULL),
(80, 366, 'Vidros el?tricos', 's', '2014-03-06 14:47:52', '2014-03-06 14:47:52', NULL),
(81, 366, 'Volante multifuncional c/ comandos duplos do r?dio e computador de bordo', 's', '2014-03-06 14:47:52', '2014-03-06 14:47:52', NULL),
(82, 366, 'Volante; alavanca de c?mbio e freio revestidos em couro', 's', '2014-03-06 14:47:52', '2014-03-06 14:47:52', NULL),
(801, 26144, 'Vidros dianteiros e traseiros elétricos com função ', 's', '2014-03-06 17:08:43', '2014-03-06 17:08:43', NULL),
(762, 26144, '2 luzes de leitura LED na frente com bordasde cromo e 2 atrás', 's', '2014-03-06 17:08:43', '2014-03-06 17:08:43', NULL),
(761, 828, 'Volante; alavanca de c?mbio e freio revestidos em couro', 's', '2014-03-06 17:04:58', '2014-03-06 17:04:58', NULL),
(760, 828, 'Volante multifuncional c/ comandos duplos do r?dio e computador de bordo', 's', '2014-03-06 17:04:58', '2014-03-06 17:04:58', NULL),
(759, 828, 'Vidros el?tricos', 's', '2014-03-06 17:04:58', '2014-03-06 17:04:58', NULL),
(758, 828, 'Travamento central e alarme keyless', 's', '2014-03-06 17:04:58', '2014-03-06 17:04:58', NULL),
(756, 828, 'Tra??o 4x4 permanente', 's', '2014-03-06 17:04:58', '2014-03-06 17:04:58', NULL),
(757, 828, 'Transmiss?o autom?tica de 8 velocidades', 's', '2014-03-06 17:04:58', '2014-03-06 17:04:58', NULL),
(755, 828, 'Torque de 42;8kgfm', 's', '2014-03-06 17:04:58', '2014-03-06 17:04:58', NULL),
(754, 828, 'Tampa traseira com sistema de al?vio de peso e chave', 's', '2014-03-06 17:04:58', '2014-03-06 17:04:58', NULL),
(752, 828, 'Sensores de estacionamento dianteiros e traseiros', 's', '2014-03-06 17:04:58', '2014-03-06 17:04:58', NULL),
(753, 828, 'Sistema ISOFIX para fixa??o de cadeiras para crian?a no banco traseiro', 's', '2014-03-06 17:04:58', '2014-03-06 17:04:58', NULL),
(751, 828, 'Sensores crepuscular e chuva', 's', '2014-03-06 17:04:58', '2014-03-06 17:04:58', NULL),
(750, 828, 'Rodas de liga-leve de 18? (estepe em a?o)', 's', '2014-03-06 17:04:58', '2014-03-06 17:04:58', NULL),
(749, 828, 'Revestimento do assoalho em carpete', 's', '2014-03-06 17:04:58', '2014-03-06 17:04:58', NULL),
(748, 828, 'Retrovisores externos el?tricos; aquec?veis e com rebatimento el?trico', 's', '2014-03-06 17:04:58', '2014-03-06 17:04:58', NULL),
(747, 828, 'Retrovisor interno eletrocr?mico', 's', '2014-03-06 17:04:58', '2014-03-06 17:04:58', NULL),
(746, 828, 'Radio RCD510 touchscreen c/ SD-Card; AUX-in e Bluetooth', 's', '2014-03-06 17:04:58', '2014-03-06 17:04:58', NULL),
(745, 828, 'Protetor do c?rter + para-barro', 's', '2014-03-06 17:04:58', '2014-03-06 17:04:58', NULL),
(744, 828, 'Pneus 255/60 R18', 's', '2014-03-06 17:04:58', '2014-03-06 17:04:58', NULL),
(743, 828, 'Piloto autom?tico', 's', '2014-03-06 17:04:58', '2014-03-06 17:04:58', NULL),
(741, 828, 'Novo computador de bordo', 's', '2014-03-06 17:04:58', '2014-03-06 17:04:58', NULL),
(742, 828, 'P?ra-choque dianteiro na cor da pick-up e traseiro cromado', 's', '2014-03-06 17:04:58', '2014-03-06 17:04:58', NULL),
(740, 828, 'Motor 2.0 TDI Bi-turbo diesel 180cv', 's', '2014-03-06 17:04:58', '2014-03-06 17:04:58', NULL),
(739, 828, 'Molduras das caixas roda na cor do carro', 's', '2014-03-06 17:04:58', '2014-03-06 17:04:58', NULL),
(737, 828, 'Gaveta sob o banco do motorista', 's', '2014-03-06 17:04:58', '2014-03-06 17:04:58', NULL),
(738, 828, 'Limpador do p?ra-brisa com temporizador vari?vel', 's', '2014-03-06 17:04:58', '2014-03-06 17:04:58', NULL),
(736, 828, 'Far?is de neblina c/ luz din?mica para manobras', 's', '2014-03-06 17:04:58', '2014-03-06 17:04:58', NULL),
(735, 828, 'Dire??o hidr?ulica', 's', '2014-03-06 17:04:58', '2014-03-06 17:04:58', NULL),
(728, 828, 'Bancos dianteiros com ajuste de altura (motorista e passageiro)', 's', '2014-03-06 17:04:58', '2014-03-06 17:04:58', NULL),
(729, 828, 'Carca?as dos retrovisores parcialmente cromadas', 's', '2014-03-06 17:04:58', '2014-03-06 17:04:58', NULL),
(730, 828, 'Coming & Leaving home', 's', '2014-03-06 17:04:58', '2014-03-06 17:04:58', NULL),
(731, 828, 'Controle Eletr?nico de Estabilidade (ESC) c/ Controle Autom?tico de Descida (HDC) e Assistente para ', 's', '2014-03-06 17:04:58', '2014-03-06 17:04:58', NULL),
(734, 828, 'Detalhes internos cromados', 's', '2014-03-06 17:04:58', '2014-03-06 17:04:58', NULL),
(733, 828, 'Desemba?ador do vidro traseiro', 's', '2014-03-06 17:04:58', '2014-03-06 17:04:58', NULL),
(732, 828, 'Descansa-bra?o central com porta-objetos', 's', '2014-03-06 17:04:58', '2014-03-06 17:04:58', NULL),
(727, 828, 'Ar condicionado Climatronic', 's', '2014-03-06 17:04:58', '2014-03-06 17:04:58', NULL),
(725, 828, 'Al?as de seguran?a no teto (4)', 's', '2014-03-06 17:04:58', '2014-03-06 17:04:58', NULL),
(726, 828, 'Antena incorporada ? carca?a do retrovisor esquerdo', 's', '2014-03-06 17:04:58', '2014-03-06 17:04:58', NULL),
(724, 828, 'Al?as de apoio na coluna dianteira (L.D) e traseiras', 's', '2014-03-06 17:04:58', '2014-03-06 17:04:58', NULL),
(723, 828, 'Airbag para motorista e passageiro', 's', '2014-03-06 17:04:58', '2014-03-06 17:04:58', NULL),
(721, 828, '4 alto-falantes e 2 tweeters', 's', '2014-03-06 17:04:58', '2014-03-06 17:04:58', NULL),
(722, 828, 'ABS off-road; EDL; TCS; BAS; EBD e RBS', 's', '2014-03-06 17:04:58', '2014-03-06 17:04:58', NULL),
(624, 1055, 'Volante de dire??o com ajuste de altura e profundidade', 's', '2014-03-06 15:47:35', '2014-03-06 15:47:35', NULL),
(622, 1055, 'Travamento manual das portas', 's', '2014-03-06 15:47:35', '2014-03-06 15:47:35', NULL),
(623, 1055, 'Vidros com acionamento manual', 's', '2014-03-06 15:47:35', '2014-03-06 15:47:35', NULL),
(621, 1055, 'Transmiss?o manual de 6 velocidades', 's', '2014-03-06 15:47:35', '2014-03-06 15:47:35', NULL),
(619, 1055, 'Terceiro apoio de cabe?a no banco traseiro com cinto central de 3 pontos', 's', '2014-03-06 15:47:35', '2014-03-06 15:47:35', NULL),
(620, 1055, 'Tra??o 4x4 selecion?vel com reduzida', 's', '2014-03-06 15:47:35', '2014-03-06 15:47:35', NULL),
(618, 1055, 'Tampa traseira com sistema de al?vio de peso e chave', 's', '2014-03-06 15:47:35', '2014-03-06 15:47:35', NULL),
(617, 1055, 'Sistema ISOFIX para fixa??o de cadeiras para crian?a no banco traseiro', 's', '2014-03-06 15:47:35', '2014-03-06 15:47:35', NULL),
(616, 1055, 'Rodas em a?o 16?', 's', '2014-03-06 15:47:35', '2014-03-06 15:47:35', NULL),
(615, 1055, 'Revestimento do assoalho em carpete', 's', '2014-03-06 15:47:35', '2014-03-06 15:47:35', NULL),
(614, 1055, 'Retrovisores sem controle interno', 's', '2014-03-06 15:47:35', '2014-03-06 15:47:35', NULL),
(613, 1055, 'Protetor do c?rter', 's', '2014-03-06 15:47:35', '2014-03-06 15:47:35', NULL),
(612, 1055, 'Prepara??o para r?dio', 's', '2014-03-06 15:47:35', '2014-03-06 15:47:35', NULL),
(611, 1055, 'Pneus 205 R16', 's', '2014-03-06 15:47:35', '2014-03-06 15:47:35', NULL),
(608, 1055, 'Limpador do p?ra-brisa com temporizador vari?vel', 's', '2014-03-06 15:47:35', '2014-03-06 15:47:35', NULL),
(610, 1055, 'P?ra-choque dianteiro na cor da pick-up e traseiro ', 's', '2014-03-06 15:47:35', '2014-03-06 15:47:35', NULL),
(609, 1055, 'P?ra-barros', 's', '2014-03-06 15:47:35', '2014-03-06 15:47:35', NULL),
(607, 1055, 'Ganchos para amarra??o de carga na ca?amba (4)', 's', '2014-03-06 15:47:35', '2014-03-06 15:47:35', NULL),
(606, 1055, 'Friso na calha de teto', 's', '2014-03-06 15:47:35', '2014-03-06 15:47:35', NULL),
(602, 1055, 'Conta-giros', 's', '2014-03-06 15:47:35', '2014-03-06 15:47:35', NULL),
(603, 1055, 'Descansa-bra?o central com porta-objetos', 's', '2014-03-06 15:47:35', '2014-03-06 15:47:35', NULL),
(605, 1055, 'Dire??o hidr?ulica', 's', '2014-03-06 15:47:35', '2014-03-06 15:47:35', NULL),
(604, 1055, 'Desemba?ador do vidro traseiro', 's', '2014-03-06 15:47:35', '2014-03-06 15:47:35', NULL),
(601, 1055, 'Brake-light com ilumina??o da ca?amba', 's', '2014-03-06 15:47:35', '2014-03-06 15:47:35', NULL),
(600, 1055, 'Bancos dianteiros com ajuste de altura (motorista e passageiro)', 's', '2014-03-06 15:47:35', '2014-03-06 15:47:35', NULL),
(599, 1055, 'Ar condicionado Climatic', 's', '2014-03-06 15:47:35', '2014-03-06 15:47:35', NULL),
(598, 1055, 'Antena incorporada ? carca?a do retrovisor esquerdo', 's', '2014-03-06 15:47:35', '2014-03-06 15:47:35', NULL),
(597, 1055, 'Al?as de seguran?a no teto (4)', 's', '2014-03-06 15:47:35', '2014-03-06 15:47:35', NULL),
(595, 1055, 'Airbag para motorista e passageiro', 's', '2014-03-06 15:47:35', '2014-03-06 15:47:35', NULL),
(596, 1055, 'Al?a de apoio na coluna dianteira (L.D)', 's', '2014-03-06 15:47:35', '2014-03-06 15:47:35', NULL),
(594, 1055, 'Acendedor de cigarros', 's', '2014-03-06 15:47:35', '2014-03-06 15:47:35', NULL),
(593, 1055, 'ABS off-road; EDL; TCS; BAS; EBD e RBS', 's', '2014-03-06 15:47:35', '2014-03-06 15:47:35', NULL),
(592, 1055, '2 alto-falantes', 's', '2014-03-06 15:47:35', '2014-03-06 15:47:35', NULL),
(800, 26144, 'Tomada multimídia MEDIA-IN com cabo adaptador para iPod/iPhone', 's', '2014-03-06 17:08:43', '2014-03-06 17:08:43', NULL),
(799, 26144, 'Tomada de 12 V no porta-malas', 's', '2014-03-06 17:08:43', '2014-03-06 17:08:43', NULL),
(798, 26144, 'Sistema de alarme com comando remoto ', 's', '2014-03-06 17:08:43', '2014-03-06 17:08:43', NULL),
(797, 26144, 'Sensores de estacionamento dianteiro e t raseiro ', 's', '2014-03-06 17:08:43', '2014-03-06 17:08:43', NULL),
(795, 26144, 'Regulagem de altura dos faróis', 's', '2014-03-06 17:08:43', '2014-03-06 17:08:43', NULL),
(796, 26144, 'Sensor de chuva e crepuscular', 's', '2014-03-06 17:08:43', '2014-03-06 17:08:43', NULL),
(794, 26144, 'Regulador de velocidade inclusive limitador de velocidade', 's', '2014-03-06 17:08:43', '2014-03-06 17:08:43', NULL),
(793, 26144, 'Porta-revistas no encosto dos bancos dianteiros', 's', '2014-03-06 17:08:43', '2014-03-06 17:08:43', NULL),
(792, 26144, 'Pedais em aço inoxidável', 's', '2014-03-06 17:08:43', '2014-03-06 17:08:43', NULL),
(790, 26144, 'Logotipo ', 's', '2014-03-06 17:08:43', '2014-03-06 17:08:43', NULL),
(791, 26144, 'Luz de neblina traseira', 's', '2014-03-06 17:08:43', '2014-03-06 17:08:43', NULL),
(788, 26144, 'Gaveta sob o banco do motorista', 's', '2014-03-06 17:08:43', '2014-03-06 17:08:43', NULL),
(789, 26144, 'Limpador do vidro traseiro com temporizador', 's', '2014-03-06 17:08:43', '2014-03-06 17:08:43', NULL),
(787, 26144, 'Função ', 's', '2014-03-06 17:08:43', '2014-03-06 17:08:43', NULL),
(786, 26144, 'Fundo do porta-malas ajustável na altura e removível', 's', '2014-03-06 17:08:43', '2014-03-06 17:08:43', NULL),
(785, 26144, 'Freio de estacionamento eletrônico com função ', 's', '2014-03-06 17:08:43', '2014-03-06 17:08:43', NULL),
(783, 26144, 'Faróis de neblina', 's', '2014-03-06 17:08:43', '2014-03-06 17:08:43', NULL),
(784, 26144, 'Faróis principais de halogêneos', 's', '2014-03-06 17:08:43', '2014-03-06 17:08:43', NULL),
(782, 26144, 'Espelho retrovisor interno antiofuscante (eletrocrômico)', 's', '2014-03-06 17:08:43', '2014-03-06 17:08:43', NULL),
(781, 26144, 'Dispositivos antifurto das rodas com proteção antifurto ampliada', 's', '2014-03-06 17:08:43', '2014-03-06 17:08:43', NULL),
(780, 26144, 'Display multifuncional ', 's', '2014-03-06 17:08:43', '2014-03-06 17:08:43', NULL),
(779, 26144, 'Descanso de braço dianteiro central com porta objetos e regulagem longitudinal e de altura', 's', '2014-03-06 17:08:43', '2014-03-06 17:08:43', NULL),
(778, 26144, 'Cintos de segurança traseiro de 3 pontos', 's', '2014-03-06 17:08:43', '2014-03-06 17:08:43', NULL),
(777, 26144, 'Cintos de segurança dianteiro com ajuste de altura e pré-tensionador', 's', '2014-03-06 17:08:43', '2014-03-06 17:08:43', NULL),
(776, 26144, 'CD-player e leitor de cartões de memória', 's', '2014-03-06 17:08:43', '2014-03-06 17:08:43', NULL),
(775, 26144, 'Bloqueio eletrônico do diferencial ', 's', '2014-03-06 17:08:43', '2014-03-06 17:08:43', NULL),
(774, 26144, 'Bancos dianteiros com ajuste lombar (motorista e passageiro)', 's', '2014-03-06 17:08:43', '2014-03-06 17:08:43', NULL),
(773, 26144, 'Bancos dianteiros com ajuste de altura milimétrico (motorista e passageiro)', 's', '2014-03-06 17:08:43', '2014-03-06 17:08:43', NULL),
(771, 26144, 'Ar condicionado digital com duas zonas ', 's', '2014-03-06 17:08:43', '2014-03-06 17:08:43', NULL),
(772, 26144, 'Automática DSG de 6 velocidades com função Tiptronic', 's', '2014-03-06 17:08:43', '2014-03-06 17:08:43', NULL),
(770, 26144, 'Alerta de perda de pressão dos pneus', 's', '2014-03-06 17:08:43', '2014-03-06 17:08:43', NULL),
(769, 26144, 'Airbag para motorista e passageiro; com desativação do airbag do passageiro; incluindo airbag p/ os ', 's', '2014-03-06 17:08:43', '2014-03-06 17:08:43', NULL),
(768, 26144, 'ABS com EBD; MSR; Controle eletrônico de Estabilidade ESC; Bloqueio eletrônico do diferencial EDS e ', 's', '2014-03-06 17:08:43', '2014-03-06 17:08:43', NULL),
(767, 26144, '8 alto-falantes', 's', '2014-03-06 17:08:43', '2014-03-06 17:08:43', NULL),
(766, 26144, '7 airbags (2 frontais; 2 de cortina e 1 de joelho para motorista)', 's', '2014-03-06 17:08:43', '2014-03-06 17:08:43', NULL),
(764, 26144, '2 FW', 's', '2014-03-06 17:08:43', '2014-03-06 17:08:43', NULL),
(765, 26144, '4 portas', 's', '2014-03-06 17:08:43', '2014-03-06 17:08:43', NULL),
(763, 26144, '2 lâmpadas na área dos pés na frente', 's', '2014-03-06 17:08:43', '2014-03-06 17:08:43', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
