create database chagasnet;
use chagasnet;

create table usuario (
    id_usuario int not null primary key,
    nome varchar(55) not null,
    email varchar(55) not null unique,
    senha varchar(20) not null,
    tipo boolean
);


create table curriculo_digital (
    id_curriculo int not null primary key,
    descricao varchar(150),
    link varchar(255),
    id_usuario int
);


create table artigo (
    id_artigo int not null primary key,
    titulo varchar(200) not null,
    conteudo text not null,
    data_publicacao datetime not null,
    media_notas decimal(10,2)
);


create table avaliacao (
    id_avaliacao int not null primary key,
    nota decimal(10,2),
    id_usuario int,
    id_artigo int
);


create table comentario (
    id_comentario int not null primary key,
    texto varchar(255) not null,
    data_publicacao datetime not null,
    id_usuario int,
    id_artigo int
);
