create database potedocuras;
use potedocuras;

create table cliente(
	id int auto_increment primary key,
    nome varchar(256),
    tel varchar(15)
);

create table prouto(
	id int auto_increment primary key,
    nome varchar(256),
    valor float,
    imagem varchar(256),
    quantidade int
);

create table venda(
	id int auto_increment primary key,
    id_cliente int,
    id_produto int,
    quantidade int,
    data_venda date,
    foreign key (id_cliente) references cliente(id),
    foreign key (id_produto) references produto(id)
);