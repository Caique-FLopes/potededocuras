create database potedocuras;
use potedocuras;

create table cliente(
	id int auto_increment primary key,
    nome varchar(256),
    tel varchar(15)
);

create table produto(
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

select * from cliente;
select * from produto;
select * from venda;

SELECT 
    c.nome AS nome_cliente,
    c.tel AS telefone_cliente,
    p.nome AS nome_produto,
    p.valor,
    v.quantidade,
    v.data_venda
FROM venda v
JOIN cliente c ON v.id_cliente = c.id
JOIN produto p ON v.id_produto = p.id;


