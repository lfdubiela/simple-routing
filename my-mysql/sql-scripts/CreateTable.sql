CREATE TABLE administrador (
   adm_cod int not null AUTO_INCREMENT primary key,
   nivel ENUM('USUARIO', 'SIMPLES'),
   adm_nome varchar(250),
   adm_email varchar(250),
   adm_matricula varchar(250),
   cargo_cod int,
   adm_data_admissao date
);


CREATE TABLE cargo (
   cargo_cod int not null AUTO_INCREMENT primary key,
   cargo_nome varchar(250)
);