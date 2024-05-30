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

INSERT INTO Usuario (id, Usuarios, Password, Email, Genero, Pais, Imagen)
VALUES
(1, 'unfago', '12345', 'unaifago@gmail.com', 'Hombre', 'España', 'https://pbs.twimg.com/media/Fy75lCdXgAEGjWa.jpg'),
(2, 'Alvaricoque', '12345', 'alvarealla@alu.edu.gva.es', 'Femenino', 'Argentina', 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2a/Apricot_and_cross_section.jpg/251px-Apricot_and_cross_section.jpg');


CREATE TABLE Libreria (
    id INT AUTO_INCREMENT PRIMARY KEY,
    Titulo VARCHAR(255) NOT NULL,
    Imagen VARCHAR(255),
    id_usuario INT,
    FOREIGN KEY (id_usuario) REFERENCES Usuario(id) on delete cascade
);
INSERT INTO Libreria (id, Titulo, Imagen, id_usuario)
VALUES
(1, 'ver mas tarde', 'https://cdn.pixabay.com/photo/2019/07/03/09/43/clock-4314041_960_720.jpg', 1),
(2, 'Favoritos', 'https://t3.ftcdn.net/jpg/01/21/64/88/360_F_121648819_ZQ0tZ6tjLzxim1SG7CQ86raBw4sglCzB.jpg', 1),
(3, 'ver mas tarde', 'https://cdn.pixabay.com/photo/2019/07/03/09/43/clock-4314041_960_720.jpg', 2),
(4, 'Favoritos', 'https://t3.ftcdn.net/jpg/01/21/64/88/360_F_121648819_ZQ0tZ6tjLzxim1SG7CQ86raBw4sglCzB.jpg', 2);



create table Tipo(
	id int auto_increment primary key,
    Nombre varchar(255) not null
);

INSERT INTO Tipo (id, Nombre)
VALUES
(1, 'Pelicula'),
(2, 'Serie'),
(3, 'Noticia');

create table Media(
	id int auto_increment primary key,
    Titulo varchar(255) not null,
    Descripcion text,
    Imagen varchar(255),
    Tipo int,
    Foreign key(tipo) references Tipo(id) on delete cascade
    );
    INSERT INTO Media (id, Titulo, Descripcion, Imagen, Tipo) VALUES
(1, 'Breaking Bad', 'Un profesor de química con problemas económicos se convierte en un fabricante de metanfetamina para asegurar el futuro financiero de su familia.', 'https://static.posters.cz/image/750/posters/breaking-bad-i-am-the-danger-i15749.jpg', 2),
(2, 'Game of Thrones', 'Sigue las luchas dinásticas entre las familias nobles por el control del Trono de Hierro de los Siete Reinos; mientras otras facciones luchan por independencia del mismo.', 'https://tumbaabierta.com/wp-content/uploads/2012/03/juego_de_tronos_1920x1200_wallpaper_0.jpg', 2),
(3, 'Stranger Things', 'Un grupo de niños en un pequeño pueblo investiga una serie de extrañas desapariciones y eventos sobrenaturales.', 'https://genotipia.com/wp-content/uploads/2017/10/stranger-things-season-2-poster-2-786x1174.jpg', 2),
(4, 'The Crown', 'Sigue la vida de la reina Isabel II desde su boda en 1947 hasta los eventos actuales.', 'https://m.media-amazon.com/images/I/71f97nf-u9L._AC_UF894,1000_QL80_.jpg', 2),
(5, 'The Mandalorian', 'Un solitario pistolero lucha en los confines de la galaxia, lejos de la autoridad de la Nueva República.', 'https://sm.ign.com/t/ign_es/cover/s/star-wars-/star-wars-the-mandalorian_mymx.1200.jpg', 2),
(6, 'Peaky Blinders', 'Una familia de gánsteres ambientada en Birmingham, Inglaterra, en 1919, justo después de la Primera Guerra Mundial.', 'https://i.pinimg.com/474x/54/8a/49/548a49d961b82f4afe1762ccbe3ca1d2.jpg', 2),
(7, 'Friends', 'Sigue las vidas, amores y desventuras de seis amigos que viven en Manhattan.', 'https://e00-expansion.uecdn.es/assets/multimedia/imagenes/2020/02/07/15810718650326.jpg', 2),
(8, 'The Witcher', 'Geralt de Rivia, un cazador de monstruos solitario, lucha por encontrar su lugar en un mundo donde las personas a menudo son más malvadas que las bestias.', 'https://sm.ign.com/t/ign_es/gallery/t/the-witche/the-witcher-season-3-first-look-images_xagb.1080.jpg', 2),
(9, 'La casa de Papel', 'Un grupo de criminales planea y ejecuta asaltos a la Fábrica Nacional de Moneda y Timbre de España.', 'https://www.koimoi.com/wp-content/new-galleries/2020/08/money-heist-5-pics-from-la-casa-de-papels-finale-shoot-will-surprise-you-as-it-features-a-dead-character001.jpg', 2),
(10, 'The Office', 'Una mirada a la vida cotidiana de los empleados de una oficina de papel mediocre que se filma en un estilo de documental.', 'https://mx.web.img3.acsta.net/newsv7/17/12/22/00/21/1367244.jpg', 2),
(11, 'Sherlock', 'Una versión moderna del detective de Arthur Conan Doyle, con Sherlock Holmes y el Dr. John Watson resolviendo crímenes en el Londres del siglo XXI.', 'https://es.web.img3.acsta.net/pictures/15/11/20/12/35/130260.jpg', 2),
(12, 'Narcos', 'Narcos cuenta la historia real de los infames jefes de la droga en la década de 1980 y los esfuerzos de las fuerzas de la ley para detenerlos.', 'https://es.web.img3.acsta.net/pictures/15/07/29/14/33/086520.jpg', 2),
(13, 'House of Cards', 'Un congresista de los Estados Unidos trabaja con su esposa para vengarse de las personas que lo traicionaron.', 'https://m.media-amazon.com/images/M/MV5BNmM4ODU1MzItODYyYi00Y2U0LWFjZjItYTRhZWIwOGMyZTRhXkEyXkFqcGdeQXVyNjc2NTQ4Nzk@._V1_.jpg', 2),
(14, 'The Simpsons', 'La vida satírica de una familia de clase trabajadora en la ciudad ficticia de Springfield.', 'https://wallpapers.com/images/featured/simpsons-pictures-9wzpuir133xwhizz.jpg', 2),
(15, 'The Boys', 'Un grupo de vigilantes lucha contra superhéroes corruptos que abusan de sus poderes.', 'https://static.posters.cz/image/1300/posters/the-boys-season-2-i101937.jpg', 2),
(16, 'Westworld', 'Un parque temático futurista permite a los visitantes vivir sus fantasías más salvajes sin consecuencias, hasta que algo sale mal.', 'https://pics.filmaffinity.com/westworld-604319388-large.jpg', 2),
(17, 'Vikingos', 'Sigue las aventuras del legendario Ragnar Lothbrok y su tripulación vikinga.', 'https://es.web.img3.acsta.net/pictures/20/12/04/10/04/4859166.jpg', 2),
(18, 'Black Mirror', 'Una serie de antología que explora una distopía de alta tecnología y los impactos negativos de la tecnología moderna.', 'https://i.pinimg.com/originals/e1/fb/16/e1fb164433849d9ac3fd18052d02f113.jpg', 2),
(19, 'The Umbrella Academy', 'Una familia disfuncional de superhéroes se reúne para resolver el misterio de la muerte de su padre y la amenaza inminente del apocalipsis.', 'https://es.web.img3.acsta.net/pictures/18/12/10/14/01/0178829.jpg', 2),
(20, 'Nueva película de ciencia ficción promete efectos visuales asombrosos', 'Un equipo de cineastas ha anunciado una nueva película de ciencia ficción que promete llevar los efectos visuales a un nivel completamente nuevo. Con tecnología de vanguardia y un elenco talentoso, esta película podría ser un hito en la historia del cine.', 'https://mundosdeleyendas.com/wp-content/uploads/2017/04/subgenero-ciencia-ficcion.jpg', 3),
(21, 'Serie de misterio basada en un bestseller literario', 'Los fanáticos del género de misterio están emocionados por la próxima serie de televisión basada en un popular libro. La trama intrigante, los giros inesperados y los personajes complejos prometen mantener a los espectadores al borde de sus asientos.', 'https://m.media-amazon.com/images/I/51-Mx0hXOVL.jpg', 3),
(22, 'Documental sobre la vida de un famoso director de cine', 'Un aclamado director de cine tendrá su vida explorada en un próximo documental. Desde sus humildes comienzos hasta su éxito en Hollywood, esta película revelará los desafíos y triunfos detrás de las cámaras.', 'https://pics.filmaffinity.com/La_vida_de_Michael_J_Fox-694723570-large.jpg', 3),
(23, 'Remake de una película clásica genera controversia entre los fanáticos', 'Los estudios están trabajando en un remake de una película icónica. Sin embargo, algunos fanáticos están preocupados de que no pueda capturar la magia del original. ¿Será un éxito o una decepción?', 'https://cdn.socy.cloud/JOLY/v3/SSFC/65240440166d2/https://www.huelvainformacion.es/2024/05/09/huelva/Final-Fantasy-VII-Remake_1901221091_211728455_1200x675.jpg', 3),
(24, 'Nueva serie de superhéroes se une al universo cinematográfico', 'Una serie de superhéroes está en camino, expandiendo aún más el universo cinematográfico. Los fanáticos esperan ver cómo se entrelazan los personajes y las tramas en esta emocionante aventura.', 'https://es.web.img3.acsta.net/r_1280_720/newsv7/22/06/07/17/50/1588599.jpg', 3),
(25, 'Director aclamado anuncia su próxima película épica', 'Un director de renombre ha revelado detalles sobre su próxima película épica. Con un elenco estelar y una trama ambiciosa, los fanáticos están ansiosos por ver esta obra maestra en la gran pantalla.', 'https://www.actualidad.es/wp-content/uploads/2023/07/dsfsdf-768x514.jpg', 3),
(26, 'Serie de comedia romántica se convierte en fenómeno global', 'Una serie de comedia romántica ha conquistado corazones en todo el mundo. Los personajes carismáticos y las situaciones hilarantes han convertido esta serie en un éxito masivo de audiencia.', 'https://media.vogue.es/photos/661fe3c44739361e25a263b7/1:1/w_3544,h_3544,c_limit/EROS%20Y%20REESE_Laia%20Lluch.jpg', 3),
(27, 'Documental sobre la historia detrás de una película icónica', 'Un nuevo documental explora los entresijos de una película clásica. Desde los desafíos de producción hasta las anécdotas del elenco, este documental ofrece una visión fascinante detrás de escena.', 'https://www.hola.com/us/images/0288-19d0447796d8-860dd521e3df-1000/horizontal-480/image-8265969-collage-u81132372105sgb.jpg', 3),
(28, 'Avengers: Endgame', 'Los Vengadores se enfrentan a Thanos en una batalla épica.', 'https://m.media-amazon.com/images/I/61RhWaYBp7L.jpg', 1),
(29, 'Joker', 'Un comediante fallido se vuelve loco y se convierte en un notorio criminal en Gotham City.', 'https://estaticos-cdn.prensaiberica.es/clip/e69eea86-2439-4a06-a342-f2b6bd2af843_alta-libre-aspect-ratio_default_0.jpg', 1),
(30, 'Frozen II', 'Elsa, Anna, Kristoff, Olaf y Sven emprenden un nuevo viaje más allá de Arendelle.', 'https://media.vogue.es/photos/5ddd13142761a80008ff265c/4:3/w_3751,h_2813,c_limit/Frozen2_ONLINE-USE_trailer1_FINAL_formatted.jpg', 1),
(31, 'Parasite', 'Una familia pobre se infiltra en una rica con consecuencias inesperadas.', 'https://assets.scriptslug.com/live/img/posters/x/_posterPageJpg/parasite-2019.jpg', 1),
(32, 'Spider-Man: Into the Spider-Verse', 'Miles Morales se convierte en Spider-Man y se encuentra con otros Spider-Man de diferentes dimensiones.', 'https://m.media-amazon.com/images/M/MV5BMjMwNDkxMTgzOF5BMl5BanBnXkFtZTgwNTkwNTQ3NjM@._V1_.jpg', 1),
(33, 'Inception', 'Un ladrón que roba secretos corporativos a través de la tecnología de sueños se le ofrece la oportunidad de borrar su historial criminal.', 'https://m.media-amazon.com/images/I/81CgNB2mglL._UF894,1000_QL80_.jpg', 1),
(34, 'La La Land', 'Una pianista y una actriz aspirante se enamoran mientras buscan el éxito en Los Ángeles.', 'https://es.web.img3.acsta.net/pictures/16/11/30/17/44/581119.jpg', 1),
(35, 'Mad Max: Fury Road', 'En un futuro post-apocalíptico, Max se une a Furiosa para escapar del tirano Immortan Joe.', 'https://upload.wikimedia.org/wikipedia/en/6/6e/Mad_Max_Fury_Road.jpg', 1),
(36, 'The Revenant', 'Un hombre lucha por sobrevivir y vengarse tras ser atacado por un oso y dejado por muerto.', 'https://i.pinimg.com/originals/26/5e/89/265e89318d1f345432bd2eb34bd2c279.jpg', 1),
(37, '1917', 'Dos soldados británicos durante la Primera Guerra Mundial reciben la misión de entregar un mensaje que salvará a miles.', 'https://archive.org/services/img/1917originalmotionpicture/full/pct:500/0/default.jpg', 1);

create table Detalle_Pelicula(
	id int auto_increment primary key ,
	Duracion int,
    Ano int,
    Trailer varchar(255),
    valoracion double,
    id_pelicula int,
    foreign key(id_pelicula) references Media(id) on delete cascade
    );
    INSERT INTO Detalle_Pelicula (id, Duracion, Ano, Trailer, valoracion, id_pelicula) VALUES
(1, 181, 2019, 'https://www.youtube.com/watch?v=TcMBFSGVi1c', 8.4, 28),
(2, 122, 2019, 'https://www.youtube.com/watch?v=zAGVQLHvwOY', 8.5, 29),
(3, 103, 2019, 'https://www.youtube.com/watch?v=bwzLiQZDw2I', 6.9, 30),
(4, 132, 2019, 'https://www.youtube.com/watch?v=5xH0HfJHsaY', 8.6, 31),
(5, 117, 2018, 'https://www.youtube.com/watch?v=g4Hbz2jLxvQ', 8.4, 32),
(6, 148, 2010, 'https://www.youtube.com/watch?v=YoHD9XEInc0', 8.8, 33),
(7, 128, 2016, 'https://www.youtube.com/watch?v=0pdqf4P9MB8', 8, 34),
(8, 120, 2015, 'https://www.youtube.com/watch?v=hEJnMQG9ev8', 8.1, 35),
(9, 156, 2015, 'https://www.youtube.com/watch?v=LoebZZ8K5N0', 8, 36),
(10, 119, 2019, 'https://www.youtube.com/watch?v=YqNYrYUiMfg', 8.3, 37);

    

    create table Detalle_Serie(
	id int auto_increment primary key ,
	Temporadas int,
    Ano int,
    Trailer varchar(255),
    valoracion double,
    id_serie int,
    foreign key(id_serie) references Media(id) on delete cascade
    );
    INSERT INTO Detalle_Serie (id, Temporadas, Ano, Trailer, valoracion, id_serie) VALUES
(1, 5, 2008, 'https://www.youtube.com/watch?v=HhesaQXLuRY', 8.7, 1),
(2, 8, 2011, 'https://www.youtube.com/watch?v=rlR4PJn8b8I', 5.8, 2),
(3, 4, 2016, 'https://www.youtube.com/watch?v=b9EkMc79ZSU', 7.6, 3),
(4, 6, 2016, 'https://www.youtube.com/watch?v=JWtnJjn6ng0', 7, 4),
(5, 3, 2019, 'https://www.youtube.com/watch?v=eW7Twd85m2g', 6.5, 5),
(6, 6, 2013, 'https://www.youtube.com/watch?v=oVzVdvGIC7U', 9, 6),
(7, 10, 1994, 'https://www.youtube.com/watch?v=X9O0twHFfLw', 7.2, 7),
(8, 3, 2019, 'https://www.youtube.com/watch?v=ndl1W4ltcmg', 5.8, 8),
(9, 5, 2017, 'https://www.youtube.com/watch?v=hMANIarjT50', 8.1, 9),
(10, 9, 2005, 'https://www.youtube.com/watch?v=UauTBl5FbG0', 7.4, 10),
(11, 4, 2010, 'https://www.youtube.com/watch?v=qlcWFoNqZHc', 6.1, 11),
(12, 3, 2015, 'https://www.youtube.com/watch?v=U7elNhHwgBU', 10, 12),
(13, 6, 2013, 'https://www.youtube.com/watch?v=ULwUzF1q5w4', 5.8, 13),
(14, 35, 1989, 'https://www.youtube.com/watch?v=X5bXw5TpxKw', 4.4, 14),
(15, 4, 2019, 'https://www.youtube.com/watch?v=06rueu_fh30', 7.9, 15),
(16, 3, 2016, 'https://www.youtube.com/watch?v=1cX4t5-YpHQ', 5.9, 16),
(17, 6, 2013, 'https://www.youtube.com/watch?v=I2nT2Vl0CgY', 8.2, 17),
(18, 6, 2011, 'https://www.youtube.com/watch?v=jDiYGjp5iFg', 7.1, 18),
(19, 4, 2019, 'https://www.youtube.com/watch?v=0DAmWHxeoKw', 8.3, 19);


create table Genero(
	id int auto_increment primary key,
    Nombre varchar(255),
    Imagen varchar(255)
);
INSERT INTO Genero (id, Nombre, Imagen) VALUES
(1, 'Accion', 'https://media.gq.com.mx/photos/5be9df325c1fcbd1504c3507/16:9/w_2560%2Cc_limit/john_whick_327.jpg'),
(2, 'Aventura', 'https://thumbs.dreamstime.com/b/icono-del-libro-concepto-de-aventura-g%C3%A9nero-de-la-ficci%C3%B3n-81644130.jpg'),
(3, 'Comedia', 'https://thumbs.dreamstime.com/z/icono-del-vector-cine-de-la-comedia-g%C3%A9nero-pel%C3%ADcula-risa-payaso-101449944.jpg'),
(4, 'Drama', 'https://previews.123rf.com/images/anatolir/anatolir2010/anatolir201000431/156832956-icono-de-libro-de-g%C3%A9nero-literario-drama-estilo-plano.jpg'),
(5, 'Ciencia ficcion', 'https://mundosdeleyendas.com/wp-content/uploads/2017/04/subgenero-ciencia-ficcion.jpg'),
(6, 'Fantasia', 'https://mundosdeleyendas.com/wp-content/uploads/2017/02/alta-fantasc3ada.jpg'),
(7, 'Suspense', 'https://historiadelcine.es/wp-content/uploads/2021/10/psicosis-para-halloween.jpg'),
(8, 'Animacion', 'https://i0.wp.com/imgs.hipertextual.com/wp-content/uploads/2015/07/inside-out-scaled.jpg?fit=1200%2C804&quality=55&strip=all&ssl=1'),
(9, 'Romance', 'https://definicion.de/wp-content/uploads/2010/01/amor.jpg'),
(10, 'Documental', 'https://historia.nationalgeographic.com.es/medio/2024/01/18/hng-242-portada_d5c28d17_240118123323_1280x1690.jpg');



create table Genero_Media(
    id int auto_increment primary key,
	id_genero int,
    id_media int ,
    foreign key(id_media) references Media(id) on delete cascade,
    foreign key(id_genero) references Genero(id) on delete cascade
    );
    INSERT INTO Genero_Media (id, id_genero, id_media) VALUES
(1, 1, 20),
(2, 2, 21),
(3, 3, 22),
(4, 5, 23),
(5, 7, 24),
(6, 8, 25),
(7, 8, 26),
(8, 8, 27),
(9, 5, 1),
(10, 6, 2),
(11, 6, 3),
(12, 4, 4),
(13, 1, 5),
(14, 4, 6),
(15, 3, 7),
(16, 5, 8),
(17, 3, 9),
(18, 3, 10),
(19, 7, 11),
(20, 1, 12),
(21, 3, 13),
(22, 3, 14),
(23, 1, 15),
(24, 4, 16),
(25, 5, 17),
(26, 6, 18),
(27, 6, 19),
(28, 1, 28),
(29, 5, 28),
(30, 4, 29),
(31, 7, 29),
(32, 8, 30),
(33, 6, 30),
(34, 4, 31),
(35, 7, 31),
(36, 8, 32),
(37, 1, 32),
(38, 5, 32),
(39, 1, 33),
(40, 5, 33),
(41, 7, 33),
(42, 9, 34),
(43, 3, 34),
(44, 1, 35),
(45, 6, 35),
(46, 4, 36),
(47, 1, 36),
(48, 4, 37),
(49, 1, 37);

    
create table Libreria_Media(
    id int auto_increment primary key,
	id_libreria int,
    id_media int,
	foreign key(id_media) references Media(id) on delete cascade,
	foreign key(id_libreria) references Libreria(id) on delete cascade
	);
    INSERT INTO Libreria_Media (id, id_libreria, id_media) VALUES
(1, 1, 9),
(2, 2, 32),
(3, 3, 32),
(4, 4, 29);

Create table Visto_Anteriormente(
    id int auto_increment primary key,
    id_media int,
    id_user int,
    foreign key(id_media) references Media(id) on delete cascade,
    foreign key(id_user) references Usuario(id) on delete cascade
    );