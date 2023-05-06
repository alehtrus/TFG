drop database if exists portal_del_peludo;
create database if not exists portal_del_peludo;

use portal_del_peludo;

CREATE TABLE usuarios (
  DNI varchar (255) PRIMARY KEY,
  contrasena VARCHAR(255) NOT NULL,
  rol enum('USR','VET', 'ADMIN') NOT NULL
);

CREATE TABLE propietarios (
  id INT PRIMARY KEY,
  DNI varchar (10) not null,
  nombre VARCHAR(255) NOT NULL,
  direccion VARCHAR(255),
  telefono int(20) NOT NULL,
  email VARCHAR(255) default NULL,
  
  foreign key (DNI)references usuarios(DNI)
);


CREATE TABLE procedimientos (
  id INT PRIMARY KEY,
  nombre varchar(100),
  descripcion text NOT NULL
);


CREATE TABLE veterinarios (
	id int PRIMARY KEY,
    nombre varchar(255) not null,
    direccion varchar(255) not null,
    municipio varchar(60) not null,
    telefono varchar(15) not null,
    email varchar (255) not null

);


CREATE TABLE medicos (
  id INT PRIMARY KEY,
  id_veterinario int not null,
  DNI varchar(10) not null,
  nombre VARCHAR(255) NOT NULL,
  numero_colegiado int unique,
  
  foreign key (DNI)references usuarios(DNI),
  foreign key (id_veterinario)references veterinarios(id)
);

CREATE TABLE mascotas (
  id INT PRIMARY KEY,
  nombre VARCHAR(255) NOT NULL,
  especie VARCHAR(255) NOT NULL,
  raza VARCHAR(255),
  edad INT,
  genero enum('Macho', 'Hembra'),
  id_propietario int NOT NULL,
  fecha_ultima_visita DATE default null,
  
  FOREIGN KEY (id_propietario) REFERENCES propietarios(id)
);

CREATE TABLE citas (
  id INT PRIMARY KEY auto_increment,
  fecha datetime NOT NULL,
  procedimiento_id int not null,
  id_mascota int not null,
  id_medico int not null,
  motivo TEXT NOT NULL,
  foreign key (procedimiento_id) REFERENCES procedimientos(id),
  foreign key (id_mascota) references mascotas(id),
  foreign key (id_medico) REFERENCES medicos(id)
);




/*
CREATE TABLE CITAS_MASCOTAS(
	id_cita int,
    id_mascota int,
    primary key (id_cita, id_mascota),
    foreign key (id_cita) references citas(id),
    foreign key (id_mascota) references mascotas(id)
);	

*/

-- Inserción de usuarios
INSERT INTO usuarios (DNI, contrasena, rol) VALUES
  (11111111, SHA2('password1', 256), 'USR'),
  (22222222, SHA2('password2', 256), 'USR'),
  (33333333, SHA2('password3', 256), 'USR'),
  (44444444, SHA2('password4', 256), 'USR'),
  (55555555, SHA2('password5', 256), 'USR'),
  (66666666, SHA2('password6', 256), 'USR'),
  (77777777, SHA2('password7', 256), 'USR'),
  (88888888, SHA2('password8', 256), 'USR'),
  (99999999, SHA2('password9', 256), 'USR'),
  (12345678, SHA2('password10', 256), 'USR'),
  (23456789, SHA2('password11', 256), 'USR'),
  (34567890, SHA2('password12', 256), 'USR'),
  (45678901, SHA2('password13', 256), 'USR'),
  (56789012, SHA2('password14', 256), 'USR'),
  (67890123, SHA2('password15', 256), 'USR'),
  (78901234, SHA2('password16', 256), 'USR'),
  (89012345, SHA2('password17', 256), 'USR'),
  (90123456, SHA2('password18', 256), 'USR'),
  (01234567, SHA2('password19', 256), 'USR'),
  (99999998, SHA2('adminpassword', 256), 'ADMIN'),
  (11111211, SHA2('contrasena1', 256), 'VET'),
(12222222, SHA2('contrasena2', 256), 'VET'),
(33335333, SHA2('contrasena3', 256), 'VET'),
(48444444, SHA2('contrasena4', 256), 'VET'),
(55556555, SHA2('contrasena5', 256), 'VET'),
(46666666, SHA2('contrasena6', 256), 'VET'),
(77777677, SHA2('contrasena7', 256), 'VET'),
(84888888, SHA2('contrasena8', 256), 'VET'),
(99993999, SHA2('contrasena9', 256), 'VET'),
(10101010, SHA2('contrasena10', 256), 'USR'),
(11111112, SHA2('contrasena11', 256), 'VET'),
(12121212, SHA2('contrasena12', 256), 'VET'),
(13131313, SHA2('contrasena13', 256), 'VET'),
(14141414, SHA2('contrasena14', 256), 'VET'),
(15151515, SHA2('contrasena15', 256), 'VET'),
(16161616, SHA2('contrasena16', 256), 'VET'),
(17171717, SHA2('contrasena17', 256), 'VET'),
(18181818, SHA2('contrasena18', 256), 'VET'),
(19191919, SHA2('contrasena19', 256), 'VET'),
(20202020, SHA2('contrasena20', 256), 'VET'),
(21212121, SHA2('contrasena21', 256), 'VET');



-- Inserción de veterinarios
INSERT INTO veterinarios (id, nombre, direccion, municipio, telefono, email)
VALUES
(1, 'Clínica Veterinaria Mallorca', 'Calle de Joan Miró 11', 'Palma', '971 77 15 39', 'info@clinicasveterinariasmallorca.es'),
(2, 'Hospital Veterinario Dr. Ramis', 'Calle València, 8', 'Marratxí', '971 14 44 04', 'info@hospitalveterinariodrramis.es'),
(3, 'Clínica Veterinaria Son Sardina', 'Calle de la Mare de Déu de Montserrat, 20', 'Palma', '971 20 14 44', 'info@clinicasveterinariasmallsardina.es'),
(4, 'Clínica Veterinaria Sa Pobla', 'Calle de Sant Antoni Maria Claret, 28', 'Sa Pobla', '971 54 02 67', 'info@clinicasveterinariassapobla.es'),
(5, 'Clínica Veterinaria Felanitx', 'Avinguda de Joan Llompart, 38', 'Felanitx', '971 58 24 52', 'info@clinicasveterinariasfelanitx.es'),
(6, 'Clínica Veterinaria Can Picafort', 'Calle de Isaac Peral, 8', 'Santa Margalida', '971 85 80 38', 'info@clinicasveterinariascanpicafort.es'),
(7, 'Clínica Veterinaria Llucmajor', 'Avinguda dels Pins, 22', 'Llucmajor', '971 66 00 66', 'info@clinicasveterinariasllucmajor.es'),
(8, 'Hospital Veterinari Son Ferriol', 'Calle de Son Ferriol, 147', 'Palma', '971 43 46 46', 'info@hospitalveterinarisonferriol.es'),
(9, 'Clínica Veterinaria Inca', 'Calle de sa Pobla, 33', 'Inca', '971 50 10 11', 'info@clinicasveterinariasinca.es'),
(10, 'Clínica Veterinaria Alcúdia', 'Calle de la Rosa dels Vents, 9', 'Alcúdia', '971 54 59 97', 'info@clinicasveterinariasalcudia.es');

/*
-- Inserción de propietarios
INSERT INTO propietarios (id, DNI, nombre, direccion, telefono, email)
VALUES 
   (1, '11111111A', 'Juan Perez', 'Calle Mayor 1', 123456789, 'juan.perez@gmail.com'),
   (2, '22222222B', 'Maria Rodriguez', 'Calle San Juan 2', 987654321, 'maria.rodriguez@gmail.com'),
   (3, '33333333C', 'Pablo Gomez', 'Calle Alcala 3', 555666777, 'pablo.gomez@gmail.com'),
   (4, '44444444D', 'Sara Hernandez', 'Calle Gran Via 4', 111222333, 'sara.hernandez@gmail.com'),
   (5, '55555555E', 'Javier Garcia', 'Calle Serrano 5', 444555666, 'javier.garcia@gmail.com'),
   (6, '66666666F', 'Elena Martin', 'Calle Bravo Murillo 6', 777888999, 'elena.martin@gmail.com'),
   (7, '77777777G', 'Carlos Sanchez', 'Calle Orense 7', 222333444, 'carlos.sanchez@gmail.com'),
   (8, '88888888H', 'Ana Lopez', 'Calle Alfonso XIII 8', 999888777, 'ana.lopez@gmail.com'),
   (9, '99999999I', 'Pedro Jimenez', 'Calle Goya 9', 666777888, 'pedro.jimenez@gmail.com'),
   (10, '11111111J', 'Carmen Ruiz', 'Calle Gran Via 10', 333444555, 'carmen.ruiz@gmail.com'),
   (11, '22222222K', 'Mario Navarro', 'Calle Alcala 11', 222333444, 'mario.navarro@gmail.com'),
   (12, '33333333L', 'Laura Diaz', 'Calle Mayor 12', 555444333, 'laura.diaz@gmail.com'),
   (13, '44444444M', 'Diego Fernandez', 'Calle Serrano 13', 888777666, 'diego.fernandez@gmail.com'),
   (14, '55555555N', 'Isabel Perez', 'Calle Orense 14', 444333222, 'isabel.perez@gmail.com'),
   (15, '66666666O', 'Sergio Rodriguez', 'Calle Gran Via 15', 777888999, 'sergio.rodriguez@gmail.com'),
   (16, '77777777P', 'Nuria Gomez', 'Calle Alcala 16', 222333444, 'nuria.gomez@gmail.com'),
   (17, '88888888Q', 'Jorge Hernandez', 'Calle Mayor 17', 999888777, 'jorge.hernandez@gmail.com'),
   (18, '99999999R', 'Marina Garcia', 'Calle Bravo Murillo 18', 666777888, 'marina.garcia@gmail.com'),
   (19, '11111111S', 'Raul Martin', 'Calle Serrano 19', 333444555, 'raul.martin@gmail.com'),
   (20, '22222222T', 'Lucia Sanchez', 'Calle Ramon 20', 555222111, 'lucia.sanchez@gmail.com');
   
   
-- Inserción de médicos
INSERT INTO medicos (id, id_veterinario, DNI, nombre, numero_colegiado)
VALUES
(1, 1, '12345678A', 'Juan Pérez', 123456),
(2, 1, '23456789B', 'Marta Gómez', 234567),
(3, 1, '34567890C', 'Pedro Fernández', 345678),
(4, 1, '45678901D', 'Laura Rodríguez', 456789),
(5, 1, '56789012E', 'Carlos Sánchez', 567890),
(6, 2, '67890123F', 'Ana López', 678901),
(7, 2, '78901234G', 'Javier García', 789012),
(8, 2, '89012345H', 'María González', 890123),
(9, 2, '90123456I', 'Luisa Martínez', 901234),
(10, 2, '01234567J', 'Roberto Ruiz', 012345),
(11, 3, '12345678K', 'Elena Pérez', 123452),
(12, 3, '23456789L', 'Diego Gómez', 234561),
(13, 3, '34567890M', 'Isabel Fernández', 325678),
(14, 3, '45678901N', 'Andrés Rodríguez', 416789),
(15, 3, '56789012O', 'Laura Sánchez', 567850),
(16, 4, '67890123P', 'Antonio López', 678301),
(17, 4, '78901234Q', 'Sofía García', 789212),
(18, 4, '89012345R', 'Juan González', 896123),
(19, 4, '90123456S', 'Carmen Martínez', 921234),
(20, 4, '01234567T', 'Raúl Ruiz', 012325);
*/
-- Insercion de mascotas

INSERT INTO mascotas (id, nombre, especie, raza, edad, genero, id_propietario, fecha_ultima_visita)
VALUES
(1, 'Max', 'Perro', 'Labrador', 2, 'Macho', 5, '2022-03-10'),
(2, 'Luna', 'Gato', 'Siames', 1, 'Hembra', 3, '2022-01-05'),
(3, 'Rocky', 'Perro', 'Pastor Alemán', 4, 'Macho', 12, '2021-11-20'),
(4, 'Toby', 'Perro', 'Chihuahua', 3, 'Macho', 9, '2022-02-15'),
(5, 'Nina', 'Gato', 'Bengal', 2, 'Hembra', 18, '2022-03-01'),
(6, 'Paco', 'Perro', 'Bulldog Francés', 1, 'Macho', 6, NULL),
(7, 'Kira', 'Gato', 'Persa', 5, 'Hembra', 16, '2021-12-18'),
(8, 'Buddy', 'Perro', 'Golden Retriever', 6, 'Macho', 20, NULL),
(9, 'Lola', 'Perro', 'Poodle', 2, 'Hembra', 2, NULL),
(10, 'Gizmo', 'Gato', 'Sphynx', 4, 'Macho', 13, '2022-03-15'),
(11, 'Sasha', 'Perro', 'Husky Siberiano', 3, 'Hembra', 7, '2021-10-25'),
(12, 'Milo', 'Perro', 'Shih Tzu', 1, 'Macho', 17, NULL),
(13, 'Lily', 'Gato', 'Angora', 7, 'Hembra', 14, '2022-02-27'),
(14, 'Ziggy', 'Perro', 'Boxer', 5, 'Macho', 4, '2022-03-02'),
(15, 'Simba', 'Gato', 'Maine Coon', 2, 'Macho', 1, NULL),
(16, 'Lucas', 'Perro', 'Bichón Frisé', 3, 'Macho', 19, '2022-01-10'),
(17, 'Mia', 'Perro', 'Labradoodle', 1, 'Hembra', 15, NULL),
(18, 'Lucky', 'Gato', 'Bombay', 6, 'Macho', 10, '2022-02-20'),
(19, 'Finn', 'Perro', 'Cavalier King Charles', 2, 'Macho', 8, NULL),
(20, 'Cleo', 'Gato', 'Ragdoll', 4, 'Hembra', 11, '2021-12-10'),
(21, 'Luna', 'Perro', 'Labrador', 3, 'Hembra', 1, '2022-02-12'),
(22, 'Buddy', 'Perro', 'Beagle', 2, 'Macho', 2, '2021-08-08'),
(23, 'Fluffy', 'Gato', 'Siamés', 4, 'Hembra', 3, NULL),
(24, 'Max', 'Perro', 'Golden Retriever', 5, 'Macho', 4, '2021-11-25'),
(25, 'Simba', 'Gato', 'Persa', 1, 'Macho', 5, '2022-03-03'),
(26, 'Toby', 'Perro', 'Bulldog', 6, 'Macho', 6, NULL),
(27, 'Lucky', 'Perro', 'Chihuahua', 3, 'Macho', 7, '2022-01-15'),
(28, 'Cleo', 'Gato', 'Egipcio', 2, 'Hembra', 8, '2021-10-10'),
(29, 'Rocky', 'Perro', 'Pastor Alemán', 4, 'Macho', 9, NULL),
(30, 'Sasha', 'Gato', 'Siames', 7, 'Hembra', 10, '2022-02-28'),
(31, 'Milo', 'Perro', 'Pitbull', 2, 'Macho', 11, NULL),
(32, 'Tigger', 'Gato', 'Sphynx', 1, 'Macho', 12, '2021-12-20'),
(33, 'Ziggy', 'Perro', 'Terrier', 4, 'Macho', 13, '2022-01-10'),
(34, 'Whiskers', 'Gato', 'Bombay', 3, 'Hembra', 14, NULL),
(35, 'Bruno', 'Perro', 'Doberman', 5, 'Macho', 15, '2021-09-23');

-- Insercion de procedimientos
INSERT INTO procedimientos (id, nombre, descripcion)
VALUES
  (1, 'Vacunación', 'Procedimiento para prevenir enfermedades en la mascota'),
  (2, 'Cirugía de esterilización', 'Procedimiento para evitar que la mascota tenga crías'),
  (3, 'Desparasitación', 'Procedimiento para eliminar parásitos del sistema digestivo de la mascota'),
  (4, 'Limpieza dental', 'Procedimiento para limpiar los dientes de la mascota'),
  (5, 'Tratamiento para alergias', 'Procedimiento para tratar las alergias de la mascota'),
  (6, 'Cirugía de emergencia', 'Procedimiento para tratar una emergencia médica en la mascota'),
  (7, 'Tratamiento para la obesidad', 'Procedimiento para ayudar a la mascota a perder peso'),
  (8, 'Cirugía ortopédica', 'Procedimiento para tratar problemas musculoesqueléticos en la mascota'),
  (9, 'Tratamiento para enfermedades respiratorias', 'Procedimiento para tratar enfermedades respiratorias en la mascota'),
  (10, 'Terapia física', 'Procedimiento para ayudar a la mascota a recuperarse de una lesión'),
  (11, 'Radiografía', 'Procedimiento para obtener imágenes del interior del cuerpo de la mascota'),
  (12, 'Ecografía', 'Procedimiento para obtener imágenes del interior del cuerpo de la mascota mediante ultrasonidos'),
  (13, 'Análisis de sangre', 'Procedimiento para evaluar la salud de la mascota'),
  (14, 'Cirugía de tejidos blandos', 'Procedimiento para tratar problemas en los órganos internos de la mascota'),
  (15, 'Tratamiento para problemas de piel', 'Procedimiento para tratar problemas de la piel de la mascota'),
  (16, 'Tratamiento para enfermedades del oído', 'Procedimiento para tratar enfermedades del oído en la mascota'),
  (17, 'Endoscopia', 'Procedimiento para examinar el interior del cuerpo de la mascota con un endoscopio'),
  (18, 'Cirugía ocular', 'Procedimiento para tratar problemas oculares en la mascota'),
  (19, 'Tratamiento para enfermedades del sistema urinario', 'Procedimiento para tratar enfermedades del sistema urinario en la mascota'),
  (20, 'Cirugía de reconstrucción', 'Procedimiento para reconstruir una parte del cuerpo de la mascota que se ha fracturado');
  
  -- Insercion de citas
  /* Modificar insert de citas
  INSERT INTO citas (id, fecha, procedimiento_id, id_veterinario, id_medico, motivo)
VALUES
(1, '2023-04-20 10:00:00', 5, 8, 2, 'Control anual'),
(2, '2023-04-20 11:00:00', 8, 10, 1, 'Vacunación'),
(3, '2023-04-21 15:30:00', 12, 3, 5, 'Revisión tras cirugía'),
(4, '2023-04-22 09:15:00', 7, 5, 4, 'Extracción de dientes'),
(5, '2023-04-22 10:30:00', 2, 2, 7, 'Tratamiento de infección de oído'),
(6, '2023-04-23 14:00:00', 9, 9, 8, 'Revisión de herida'),
(7, '2023-04-24 11:30:00', 1, 1, 6, 'Cirugía de esterilización'),
(8, '2023-04-25 12:00:00', 10, 6, 3, 'Control post-operatorio'),
(9, '2023-04-25 16:30:00', 3, 4, 10, 'Tratamiento de alergia'),
(10, '2023-04-26 10:45:00', 6, 7, 9, 'Revisión de patas'),
(11, '2023-04-26 11:30:00', 4, 10, 2, 'Vacunación'),
(12, '2023-04-27 16:00:00', 11, 3, 1, 'Tratamiento de parásitos'),
(13, '2023-04-28 15:15:00', 2, 5, 7, 'Control de peso'),
(14, '2023-04-29 09:30:00', 8, 8, 4, 'Vacunación'),
(15, '2023-04-29 11:00:00', 5, 2, 5, 'Control de diabetes'),
(16, '2023-04-30 10:30:00', 3, 9, 6, 'Tratamiento de infección'),
(17, '2023-05-01 12:15:00', 1, 1, 10, 'Control post-operatorio'),
(18, '2023-05-02 16:30:00', 9, 6, 2, 'Revisión tras cirugía'),
(19, '2023-05-03 14:45:00', 7, 4, 3, 'Tratamiento de infección'),
(20, '2023-05-04 10:00:00', 12, 7, 8, 'Revisión general');

-- Insercion de CITAS_MASCOTAS

INSERT INTO CITAS_MASCOTAS (id_cita, id_mascota)
VALUES 
(1, 5),
(2, 12),
(3, 17),
(4, 24),
(5, 8),
(6, 32),
(7, 21),
(8, 15),
(9, 28),
(10, 3),
(11, 9),
(12, 18),
(13, 23),
(14, 30),
(15, 2),
(16, 10),
(17, 26),
(18, 33),
(19, 14),
(20, 31);















