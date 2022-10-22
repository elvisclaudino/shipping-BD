-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Tempo de geração: 10-Set-2022 às 02:03
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
--
-- Banco de dados: `shipping`

-- --------------------------------------------------------
--
-- Estrutura da tabela Tipo_Carga
CREATE TABLE Tipo_Carga (
  Tipo_Carga_ID int NOT NULL,
  Descricao varchar(50) NOT NULL,
  PRIMARY KEY (Tipo_Carga_ID) 
);
-- --------------------------------------------------------
-- Estrutura da tabela cargas
CREATE TABLE Cargas (
  Carga_ID int NOT NULL,
  Fk_Tipo_ID int NOT NULL,
  Peso float NOT NULL,
  Volume float NOT NULL,
  PRIMARY KEY (Carga_ID),
  FOREIGN KEY (Fk_Tipo_ID) REFERENCES Tipo_Carga(Tipo_Carga_ID)
);
-- --------------------------------------------------------
-- Estrutura da tabela Funcionarios
CREATE TABLE Funcionarios (
  Matricula int NOT NULL,
  Nome varchar(50) NOT NULL,
  Sobrenome varchar(50) NOT NULL,
  Cargo varchar(50) NOT NULL,
  PRIMARY KEY (Matricula)
);
-- --------------------------------------------------------
-- Estrutura da tabela Transportes
CREATE TABLE Transportes (
  Transporte_ID int NOT NULL,
  Modelo varchar(50) NOT NULL,
  Capacidade_Peso float NOT NULL,
  Capacidade_Volume float NOT NULL,
  PRIMARY KEY (Transporte_ID)
);
-- --------------------------------------------------------
-- Estrutura da tabela Destinos
CREATE TABLE Destinos (
  Destino_ID int NOT NULL,
  Rua varchar(50) NOT NULL,
  Numero int NOT NULL,
  Complemento varchar(50) NOT NULL,
  CEP varchar(50) NOT NULL,
  PRIMARY KEY (Destino_ID)
);
-- -- --------------------------------------------------------
-- Estrutura da tabela Entregas
CREATE TABLE Entregas (
  Entrega_ID int NOT NULL,
  Data_Recebimento date NOT NULL,
  Data_Prevista_Entrega date NOT NULL,
  Fk_Destino_ID int NOT NULL,
  Fk_Funcionario_ID int NOT NULL,
  Fk_Carga_ID int NOT NULL,
  Fk_Transporte_ID int NOT NULL,
  PRIMARY KEY (Entrega_ID),
  FOREIGN KEY (Fk_Destino_ID) REFERENCES Destinos(Destino_ID),
  FOREIGN KEY (Fk_Funcionario_ID) REFERENCES Funcionarios(Matricula),
  FOREIGN KEY (Fk_Carga_ID) REFERENCES Cargas(Carga_ID),
  FOREIGN KEY (Fk_Transporte_ID) REFERENCES Transportes(Transporte_ID)
) ;

-- -------------------------------------------------------------------------------------------------------------
-- Insercao de dados nas tabelas
--  ------------------------------------------------------------------------------------------------------------
INSERT INTO Tipo_Carga (Tipo_Carga_ID,Descricao)
VALUES
(1,'Tijolo'),
(2,'Madeira'),
(3,'Cimento'),
(4,'Pregos'),
(5,'Cal'),
(6,'Pallet'),
(7,'Parafuso'),
(8,'Bucha'),
(9,'Janela'),
(10,'Tomada');

INSERT INTO Cargas (Carga_ID,Peso,Fk_Tipo_ID,Volume)
VALUES
(1,10.5,1,10.1),
(2,20.5,2,5.5),
(3,50.4,3,10.5),
(4,1.8,4,5.8),
(5,15.4,5,10.6),
(6,10.9,6,5.0),
(7,20.1,7,32.0),
(8,20.5,8,44.0),
(9,10.5,1,10.1),
(10,20.5,2,5.5);

INSERT INTO Funcionarios  (Matricula,Nome,Sobrenome,Cargo)
VALUES
(1,'Rodrigo','Caio','Almoxerife'),
(2,'Neymar','Junior','Entregador'),
(3,'Gabriel','Jesus','Almoxerife'),
(4,'Antonny','Brasileiro','Entregador'),
(5,'Adenor','Tite','Almoxerife'),
(6,'Fabio','Junior','Entregador'),
(7,'Felipe','Luis','Almoxerife'),
(8,'Julia','Puzzuoli','Entregador'),
(9,'Marta','Capita','Almoxerife'),
(10,'Christiane','Almeida','Entregador');


INSERT INTO Transportes  (Transporte_ID,Modelo,Capacidade_Volume,Capacidade_Peso)
VALUES
(1,'Caminhao',9,15000),
(2,'Moto',1,200),
(3,'Camionete',3,500),
(4,'Bicicleta',0.5,50),
(5,'Caminhao',7,15000),
(6,'Moto',1.5,100),
(7,'Camionete',2,400),
(8,'Bicicleta',1,60),
(9,'Caminhao',10,20000),
(10,'Moto',1.0,300);

INSERT INTO Destinos  (Destino_ID,Rua,Numero,Complemento,CEP)
VALUES
(1,'Rua Pedro Lemos',55,'Casa','83199-000'),
(2,'Rua Algusto Curi',13,'Apartamento','85198-060'),
(3,'Rua Fabio de Melo',22,'Casa','86720-720'),
(4,'Rua Irmão Adão',22,'Casa','86720-720'),
(5,'Rua Neymar Junior',66,'Casa','85789-111'),
(6,'Rua Sol do amanha',33333,'Apartamento','85198-222'),
(7,'Rua Orvalho da noite',1010,'Casa','86720-333'),
(8,'Rua Arbustos do Campo',1111,'Apartamento','76520-444'),
(9,'Rua Adenor',666,'Casa','81234-111'),
(10,'Carecas',12,'Apartamento','34567-222');


INSERT INTO Entregas  (Entrega_ID,Data_Recebimento,Data_Prevista_Entrega,Fk_Destino_ID,Fk_Funcionario_ID,Fk_Carga_ID,Fk_Transporte_ID)
VALUES
(1,'2022-8-1','2022-8-2',1,1,1,1),
(2,'2022-8-3','2022-8-5',2,2,2,2),
(3,'2022-8-1','2022-8-2',3,3,3,3),
(4,'2022-8-1','2022-8-2',5,4,4,4),
(5,'2022-9-11','2022-9-12',5,5,5,5),
(6,'2022-9-12','2022-9-13',6,6,6,6),
(7,'2022-9-15','2022-9-18',7,7,7,7),
(8,'2022-9-25','2022-9-26',8,8,8,8),
(9,'2022-9-29','2022-9-30',9,9,9,9),
(10,'2022-9-30','2022-10-2',10,10,10,10);

