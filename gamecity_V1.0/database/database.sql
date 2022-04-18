-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 26-Maio-2015 às 20:51
-- Versão do servidor: 5.6.21
-- PHP Version: 5.6.3
SET
    SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

SET
    time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;

/*!40101 SET NAMES utf8 */
;

--
-- Database: `sistema`
--
-- --------------------------------------------------------
--
-- Estrutura da tabela `usuario`
--
CREATE TABLE usuarios(
    id int(4) AUTO_INCREMENT,
    nome varchar(200) not null,
    usuario varchar(15) not null,
    email varchar(50) not null,
    senha varchar(15) not null,
    nivel varchar(4) not null,
    primary key (id)
);

--
-- Extraindo dados da tabela `usuario`
--
INSERT INTO
    `usuarios` (
        `id`,
        `nome`,
        `usuario`,
        `email`,
        `senha`,
        `nivel`
    )
VALUES
    (
        1,
        'Dario Antonio Ribeiro Junior',
        'OriadSakai',
        'darioarjr@gmail.com',
        '123456',
        'ADM'
    ),
    (
        2,
        'Rogerio Mamilos',
        'Rogerinho',
        'rogerinho123@gmail.com',
        '1234',
        'USER'
    );

--
-- Indexes for dumped tables
--
--
-- Indexes for table `usuario`
--
ALTER TABLE
    `usuarios`
ADD
    PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE
    `usuarios`
MODIFY
    `id` int(2) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 3;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;

CREATE TABLE produtos(
    id int(4) AUTO_INCREMENT,
    nome varchar(50) not null,
    descricao varchar(200) not null,
    preco float(7) not null,
    categoria varchar(15) not null,
    primary key (id)
);