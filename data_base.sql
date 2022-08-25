CREATE table estoque(
	id int not null AUTO_INCREMENT primary key,
    nome_produto varchar(25) not null,
    quantidade int not null,
    valor_compra int not null,
    valor_venda int not null
);

create table status_venda(
	id int not null primary key auto_increment,
    status varchar(25) not null
);

insert into status_venda(status)values('Pendente');
insert into status_venda(status)values('Pago');

create table vendas(
    id int not null AUTO_INCREMENT primary key,
    produto varchar(25) not null,
    quantidade int not null,
    cliente varchar(25) not null,
    valor int not null,
    status int not null default 1,
    foreign key(status) references status_venda(id),
    data_cadastrado varchar(10) DEFAULT current_timestamp(),
    observacoes text
    );