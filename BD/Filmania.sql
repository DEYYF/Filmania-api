Create database Filmania2;

use Filmania2;

CREATE TABLE Usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    Usuarios VARCHAR(255) NOT NULL UNIQUE,
    Password VARCHAR(255) NOT NULL,
    Email VARCHAR(255) NOT NULL,
    Genero VARCHAR(50),
    Pais VARCHAR(50),
    Imagen VARCHAR(255)
);


CREATE TABLE Libreria (
    id INT AUTO_INCREMENT PRIMARY KEY,
    Titulo VARCHAR(255) NOT NULL,
    Imagen VARCHAR(255),
    id_usuario INT,
    FOREIGN KEY (id_usuario) REFERENCES Usuario(id) on delete cascade
);

create table Tipo(
	id int auto_increment primary key,
    Nombre varchar(255) not null
);

create table Media(
	id int auto_increment primary key,
    Titulo varchar(255) not null,
    Descripcion text,
    Imagen varchar(255),
    Tipo int,
    Foreign key(tipo) references Tipo(id) on delete cascade
    );

create table Detalle_Pelicula(
	id int auto_increment primary key ,
	Duracion int,
    Ano int,
    Trailer varchar(255),
    valoracion double,
    id_pelicula int,
    foreign key(id_pelicula) references Media(id) on delete cascade
    );
    

    create table Detalle_Serie(
	id int auto_increment primary key ,
	Temporadas int,
    Ano int,
    Trailer varchar(255),
    valoracion double,
    id_serie int,
    foreign key(id_serie) references Media(id) on delete cascade
    );

create table Genero(
	id int auto_increment primary key,
    Nombre varchar(255),
    Imagen varchar(255)
);


create table Genero_Media(
    id int auto_increment primary key,
	id_genero int,
    id_media int ,
    foreign key(id_media) references Media(id) on delete cascade,
    foreign key(id_genero) references Genero(id) on delete cascade
    );
    
create table Libreria_Media(
    id int auto_increment primary key,
	id_libreria int,
    id_media int,
	foreign key(id_media) references Media(id) on delete cascade,
	foreign key(id_libreria) references Libreria(id) on delete cascade
	);
    
