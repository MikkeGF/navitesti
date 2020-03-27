drop database if exists verkkokauppa;
create database verkkokauppa;
use verkkokauppa;

create table asiakas (
  id int primary key auto_increment,
  etunimi varchar(50) not null,
  sukunimi varchar(100) not null,
  lahiosoite varchar(100),
  postinumero char(5),
  postitoimipaikka varchar(100),
  email varchar(255),
  puhelin varchar(20)
);

create table tuoteryhma (
  id int primary key auto_increment,
  nimi varchar(255) not null unique
);

create table tuote (
  id int primary key auto_increment,
  nimi varchar(255) not null,
  hinta decimal(5,2) not null,
  kuvaus text,
  varastomaara int not null,
  kuva varchar(50),
  tuoteryhma_id int not null,
  index (tuoteryhma_id),
  foreign key (tuoteryhma_id) references tuoteryhma(id)
  on delete restrict
);


create table tilaus (
  id int primary key auto_increment,
  tila enum ('tilattu','toimitettu','maksettu'),
  tilattu timestamp default current_timestamp,
  asiakas_id int not null,
  index (asiakas_id),
  foreign key (asiakas_id) references asiakas(id)
  on delete restrict
);

create table tilausrivi (
  tilaus_id int not null,
  index (tilaus_id),
  foreign key (tilaus_id) references tilaus(id)
  on delete restrict,
  tuote_id int not null,
  index (tuote_id),
  foreign key (tuote_id) references tuote(id)
  on delete restrict,
  maara smallint
);

insert into tuoteryhma (id, nimi) values (1, 'Asusteet');
insert into tuoteryhma (id, nimi) values (2, 'Kengät');
insert into tuoteryhma (id, nimi) values (3, 'Urheiluvälineet');

insert into tuote (nimi, kuvaus, hinta, kuva, varastomaara,tuoteryhma_id) 
values ('The North Face','Halo Down Hoodie, miesten untuvatakki',70,'takki.png',10,1);

insert into tuote (nimi, kuvaus, hinta, kuva, varastomaara,tuoteryhma_id) 
values ('Haglöfs','Vision II GTX, miesten retkeilykengät',60,'kengat.png',10,2);

insert into tuote (nimi, kuvaus, hinta, kuva, varastomaara,tuoteryhma_id) 
values ('Bauer','Aikuisten luistimet',25,'luistimet.jpg',20,3);



