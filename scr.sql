create table filial(
       idFilial int not null auto_increment,
       nome varchar(20) not null,
       cidade varchar(20) not null,
       endereco varchar(50) not null,
       fone varchar(20) not null,
       email varchar(50) not null,
       primary key(idFilial)
);

create table automovel(
       idCarro int not null auto_increment,
       marca varchar(20) not null,
       modelo varchar(20) not null,
       cor varchar(10) not null,
       ano int not null,
       placa varchar(8) not null,
       km double not null,
       combustivel varchar(10) not null,
       portas int not null,
       cambio varchar(10) not null,
       preco varchar(20) not null,
       primary key(idCarro),
       foreign key(idFilial) references filial(idFilial)
);

create table vendedor(
       idVendedor int not null auto_increment,
       nome varchar(20),
       sobrenome varchar(20),
       fone varchar(20),
       email varchar(50),
       idFilial int not null,
       primary key(idVendedor),
       foreign key(idFilial) references filial(idFilial)
);

insert into filial(idFilial, nome, cidade, endereco, fone, email)
  values(null,"ze","canoas","rua xingu, 544","4778889","ze@gmail.com"),
  (null,"aguia carros","porto alegre","av. bento, 22", "3126474","aguia@carros.com.br");

insert into vendedor(idVendedor,nome,sobrenome,fone,email,idFIlial)
values (null,"João","Silva", "3774888","joao@gmail.com",1),
(null,"Diego","José","23487841","diego@yahoo.com.br",2);

insert into automovel(idCarro,marca,modelo,cor,ano,placa,km,combustivel,portas,cambio,preco,idFilial)
values(null,"chevrolet","vectra","vermelha",2010,"iii2222",50000,"flex",4,"automatico",20000,1),
	   (null,"fiat","uno","branca",2005,"ccc3333",80000,"gasolina",2,"manual",8000,2),
	   (null,"ford","fiesta","preta",2012,"aaa5050",10000,"flex",4,"manual",22000,3),
	   (null,"citroen","aircross","vermelha",2017,"bbb0112",10000,"flex",4,"automatico",53900,4),
	   (null,"volkswagen","fox","azul",2018,"ccc2325",11000,"flex",4,"automatico",44800,5),
	   (null,"hyundai","hb20s","preta",2015,"abc2206",120000,"flex",4,"manual",35000,6);
