-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tempo de Geração: 
-- Versão do Servidor: 5.5.27
-- Versão do PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `udd`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `gph_cache`
--

CREATE TABLE IF NOT EXISTS `gph_cache` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `gph_cache`
--

INSERT INTO `gph_cache` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('0720217dba2226b184360268b4d8d140', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.137 Safari/537.36', 1400594057, 'a:1:{s:9:"user_data";s:0:"";}'),
('d5e6958f4dcb3784b724a9785e0b4273', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:29.0) Gecko/20100101 Firefox/29.0', 1400593717, 'a:9:{s:9:"user_data";s:0:"";s:5:"n_cod";s:3:"999";s:7:"c_email";s:17:"renato@fpc.com.br";s:6:"c_nome";s:17:"renato@fpc.com.br";s:9:"c_usuario";s:20:"Renato Costa Barbosa";s:6:"c_tipo";s:5:"admin";s:11:"acesso_hora";s:5:"00h00";s:11:"acesso_data";s:10:"0000-00-00";s:11:"rmtgph_auth";b:1;}');

-- --------------------------------------------------------

--
-- Estrutura da tabela `gph_rmtacess`
--

CREATE TABLE IF NOT EXISTS `gph_rmtacess` (
  `n_cod` int(11) NOT NULL AUTO_INCREMENT,
  `n_cod_user` int(11) NOT NULL,
  `t_hora` time NOT NULL,
  `d_data` date NOT NULL,
  PRIMARY KEY (`n_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `gph_servicos`
--

CREATE TABLE IF NOT EXISTS `gph_servicos` (
  `n_cod` int(11) NOT NULL AUTO_INCREMENT,
  `c_nome` varchar(150) NOT NULL,
  `c_link` varchar(150) NOT NULL,
  `d_data` date NOT NULL,
  `t_hora` time NOT NULL,
  `c_status` enum('ativo','inativo') NOT NULL DEFAULT 'inativo',
  PRIMARY KEY (`n_cod`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `gph_servicos`
--

INSERT INTO `gph_servicos` (`n_cod`, `c_nome`, `c_link`, `d_data`, `t_hora`, `c_status`) VALUES
(1, 'Café da esquina', 'cafe-da-esquina', '2014-04-14', '14:00:00', 'inativo'),
(2, 'Bar do Antônio', 'bar-do-antonio', '2014-04-14', '10:00:00', 'inativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `gph_sessoes`
--

CREATE TABLE IF NOT EXISTS `gph_sessoes` (
  `n_cod` int(11) NOT NULL AUTO_INCREMENT,
  `c_tipo` enum('s','m') NOT NULL DEFAULT 's',
  `c_link` varchar(250) NOT NULL,
  `c_sessao` varchar(150) NOT NULL,
  `c_subsessao` varchar(150) NOT NULL,
  `d_data` date NOT NULL,
  `t_hora` time NOT NULL,
  `n_usuario` int(11) NOT NULL,
  `c_status` enum('ativo','inativo') NOT NULL DEFAULT 'inativo',
  PRIMARY KEY (`n_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `gph_usuarios`
--

CREATE TABLE IF NOT EXISTS `gph_usuarios` (
  `n_cod` int(11) NOT NULL AUTO_INCREMENT,
  `c_email` varchar(250) NOT NULL,
  `c_usuario` varchar(150) NOT NULL,
  `c_nome` varchar(250) NOT NULL,
  `c_senha` varchar(250) NOT NULL,
  `c_tipo` enum('admin','user') NOT NULL DEFAULT 'user',
  `c_registro` date NOT NULL,
  `c_status` enum('ativo','inativo') NOT NULL DEFAULT 'inativo',
  PRIMARY KEY (`n_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
