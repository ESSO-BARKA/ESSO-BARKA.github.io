drop database if exists gestion_stag;
create database if not exists gestion_stag;

use gestion_stag;

create table filiere(

    idFiliere int(4)  auto_increment primary key,   
    nomFiliere varchar(50),
    niveau varchar(50)
);

create table stagiaire(

 
    idStagiaire int(4)  auto_increment primary key,   
    nom varchar(50),
    prenom varchar(50),
    civilite varchar(1),
    photo varchar(100),
    idFiliere int(4)
);

create table utilisateur(
    
    iduser int(4)  auto_increment primary key,   
    logine varchar(50),
    email varchar(255),
   roles varchar(50),
   etat int(1),
   pwd varchar(255)
);

alter table stagiaire add constraint foreign key(idFiliere) references filiere(idFiliere);

INSERT INTO filiere(nomFiliere,niveau) VALUES
('LMIA', 'LICENCE'),
('LMSP', 'MASTER'),
('LC2AP','DOCTORAT');

INSERT INTO utilisateur(logine,email,roles,etat,pwd) VALUES
('ADMIN','essossolim@gmail.com','ADMIN',1, md5('123'));


INSERT INTO stagiaire(nom,prenom,civilite,photo,idFiliere) VALUES
('Barka','Esso','M','12.jpg','2'),
('eric','rodo','F','azer.jpg','3');

select * from filiere;
select * from utilisateur;
select * from stagiaire;
