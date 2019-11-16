create database pizza;

	use pizza;

create table extra(
	id_extra smallint not null auto_increment,
	extra varchar(100) not null,
	precio numeric(12,2) not null,
	constraint PKExtra primary key (id_extra)
);

insert into extra(extra, precio) values("NINGUNO", "0.00");
insert into extra(extra, precio) values("QUESO EXTRA", "15.00");
insert into extra(extra, precio) values("REFRESCO 2L", "20.00");
insert into extra(extra, precio) values("HELADO", "10.00");
insert into extra(extra, precio) values("COMBO 1", "60.00");
insert into extra(extra, precio) values("COMBO 2", "9300.00");
insert into extra(extra, precio) values("COMBO 3", "45.00");
insert into extra(extra, precio) values("COMBO 4", "80.00");
insert into extra(extra, precio) values("COMBO 5", "30.00");
insert into extra(extra, precio) values("COMBO 6", "40.00");
insert into extra(extra, precio) values("COMBO 7", "8900.00");
insert into extra(extra, precio) values("COMBO 8", "6200.00");
insert into extra(extra, precio) values("COMBO 9", "30.00");
insert into extra(extra, precio) values("COMBO 10", "155.00");
insert into extra(extra, precio) values("COMBO 11", "40.00");

create table especialidad(
	id_especialidad smallint not null auto_increment,
	especialidad varchar(200) not null,
	constraint PKEspecialidad primary key (id_especialidad)
);

insert into especialidad(especialidad) values("NINGUNO");
insert into especialidad(especialidad) values("MOLOCAY");
insert into especialidad(especialidad) values("IMPALA");
insert into especialidad(especialidad) values("VIENNA");
insert into especialidad(especialidad) values("SILICIANA");
insert into especialidad(especialidad) values("EUROPEA");
insert into especialidad(especialidad) values("BBQ");
insert into especialidad(especialidad) values("VEGETARIANA");
insert into especialidad(especialidad) values("TEXANA");
insert into especialidad(especialidad) values("PORTOS");
insert into especialidad(especialidad) values("CORDICA");
insert into especialidad(especialidad) values("CHICKEN");
insert into especialidad(especialidad) values("MANTOVA");

create table tamano(
	id_tamano smallint not null auto_increment,
	tamano varchar(50) not null,
	precio numeric(12,2) not null,
	constraint PKTamano primary key (id_tamano)
);

insert into tamano(tamano, precio) values("NINGUNO", "0.00");
insert into tamano(tamano, precio) values("FAMILIAR", "85.00");
insert into tamano(tamano, precio) values("MEDIANA", "73.00");

create table ingrediente(
	id_ingrediente smallint not null auto_increment,
	ingrediente varchar(80) not null,
	precio numeric(12,2) not null,
	constraint PKIngrediente primary key (id_ingrediente)
);

insert into ingrediente(ingrediente, precio) values("NINGUNO", "0.00");
insert into ingrediente(ingrediente, precio) values("JAMON", "10.00");
insert into ingrediente(ingrediente, precio) values("CEBOLLIN", "10.00");
insert into ingrediente(ingrediente, precio) values("ADEREZO DE CILANTRO", "10.00");
insert into ingrediente(ingrediente, precio) values("SALCHICHA", "10.00");
insert into ingrediente(ingrediente, precio) values("CHILE GUERO", "10.00");
insert into ingrediente(ingrediente, precio) values("CEBOLLA MORADA", "10.00");
insert into ingrediente(ingrediente, precio) values("CARNE ASADA", "10.00");
insert into ingrediente(ingrediente, precio) values("CHORIZO", "10.00");
insert into ingrediente(ingrediente, precio) values("ACEITUNA NEGRA", "10.00");
insert into ingrediente(ingrediente, precio) values("TOCINO", "10.00");
insert into ingrediente(ingrediente, precio) values("CARNE ITALIANA", "10.00");
insert into ingrediente(ingrediente, precio) values("PEPERONI", "10.00");
insert into ingrediente(ingrediente, precio) values("CHAMPINON", "10.00");
insert into ingrediente(ingrediente, precio) values("PIMIENTO VERDE", "10.00");
insert into ingrediente(ingrediente, precio) values("POLLO", "10.00");
insert into ingrediente(ingrediente, precio) values("ELOTE", "10.00");
insert into ingrediente(ingrediente, precio) values("CHILE TOREADO", "10.00");
insert into ingrediente(ingrediente, precio) values("PINA", "10.00");
insert into ingrediente(ingrediente, precio) values("CHILE JALAPENO", "10.00");
insert into ingrediente(ingrediente, precio) values("CHILE CHIPOTLE", "10.00");

create table cliente(
	id_cliente int not null auto_increment,
	usuario varchar(100) not null,
	contrasena varchar(200) not null,
	cliente varchar(50) not null,
	domicilio varchar(600) not null,
	telefono varchar(50),
	constraint PKCliente primary key (id_cliente)
);

create table pedido(
	id_pedido int not null auto_increment,
	id_cliente int not null,
	id_especialidad smallint not null,
	id_tamano smallint not null,
	id_extra smallint not null,
	cantidad smallint not null,
	subtotal numeric(12,2) not null,
	total numeric(12,2) not null,
	fecha timestamp not null,
	constraint PKPedido primary key (id_pedido),
	constraint FKCliente foreign key (id_cliente) references cliente(id_cliente),
	constraint FKEspecialidad foreign key (id_especialidad) references especialidad(id_especialidad),
	constraint FKTamano foreign key (id_tamano) references tamano(id_tamano),
	constraint FKExtra foreign key (id_extra) references extra(id_extra)
);

create table pizza(
	id_pizza int not null auto_increment,
	id_pedido int not null,
	id_ingrediente smallint not null,
	subtotal numeric(12,2) not null,
	constraint PKPizza primary key (id_pizza, id_pedido),
	constraint FKIngrediente foreign key (id_ingrediente) references ingrediente(id_ingrediente)
);
