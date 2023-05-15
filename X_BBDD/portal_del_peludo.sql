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
  fecha_ultima_visita DATE default Null,
  
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

-- Inserción de usuarios
INSERT INTO usuarios (DNI, contrasena, rol)
VALUES 
('Z5728886M', SHA2('contraseña1', 256), 'VET'),
('36701642J', SHA2('contraseña2', 256), 'VET'),
('48568720B', SHA2('contraseña3', 256), 'VET'),
('18516119S', SHA2('contraseña4', 256), 'VET'),
('47249526M', SHA2('contraseña5', 256), 'VET'),
('86138623N', SHA2('contraseña6', 256), 'USR'),
('58840661Z', SHA2('contraseña7', 256), 'USR'),
('66377255Z', SHA2('contraseña8', 256), 'USR'),
('98006682W', SHA2('contraseña9', 256), 'USR'),
('10087273W', SHA2('contraseña10', 256), 'USR'),
('84604555K', SHA2('contraseña11', 256), 'ADMIN');



INSERT INTO propietarios (id, DNI, nombre, direccion, telefono, email)
VALUES 
   (1, '86138623N', 'Alejandro Cano', 'Calle Mayor 1', 123456789, 'a.cano@gmail.com'),
   (2, '58840661Z', 'Maria Rodriguez', 'Calle San Juan 2', 987654321, 'maria.rodriguez@gmail.com'),
   (3, '66377255Z', 'Pablo Gomez', 'Calle Alcala 3', 555666777, 'pablo.gomez@gmail.com'),
   (4, '98006682W', 'Sara Hernandez', 'Calle Gran Via 4', 111222333, 'sara.hernandez@gmail.com'),
   (5, '10087273W', 'Javier Garcia', 'Calle Serrano 5', 444555666, 'javier.garcia@gmail.com');
      

INSERT INTO medicos (id, id_veterinario, DNI, nombre, numero_colegiado)
VALUES
(1, 1, 'Z5728886M', 'Juan Pérez', 123456),
(2, 3, '36701642J', 'Marta Gómez', 234567),
(3, 7, '48568720B', 'Pedro Fernández', 345678),
(4, 2, '18516119S', 'Laura Rodríguez', 456789),
(5, 9, '47249526M', 'Carlos Sánchez', 567890);

-- Insercion de mascotas

INSERT INTO mascotas (id, nombre, especie, raza, edad, genero, id_propietario, fecha_ultima_visita)
VALUES
(1, 'Lucas', 'Gato', 'Romano', 15, 'Macho', 1, '2022-04-27'),
-- (2, 'Luna', 'Gato', 'Siames', 1, 'Hembra', 3, '2022-01-05'),
-- (3, 'Rocky', 'Perro', 'Pastor Alemán', 4, 'Macho', 12, '2021-11-20'),
-- (4, 'Toby', 'Perro', 'Chihuahua', 3, 'Macho', 9, '2022-02-15'),
-- (5, 'Nina', 'Gato', 'Bengal', 2, 'Hembra', 18, '2022-03-01'),
-- (6, 'Paco', 'Perro', 'Bulldog Francés', 1, 'Macho', 6, NULL),
-- (7, 'Kira', 'Gato', 'Persa', 5, 'Hembra', 16, '2021-12-18'),
-- (8, 'Buddy', 'Perro', 'Golden Retriever', 6, 'Macho', 20, NULL),
(9, 'Lola', 'Perro', 'Poodle', 2, 'Hembra', 2, '2022-11-02'),
-- (10, 'Gizmo', 'Gato', 'Sphynx', 4, 'Macho', 13, '2022-03-15'),
-- (11, 'Sasha', 'Perro', 'Husky Siberiano', 3, 'Hembra', 7, '2021-10-25'),
-- (12, 'Milo', 'Perro', 'Shih Tzu', 1, 'Macho', 17, NULL),
-- (13, 'Lily', 'Gato', 'Angora', 7, 'Hembra', 14, '2022-02-27'),
(14, 'Ziggy', 'Perro', 'Boxer', 5, 'Macho', 4, '2022-03-02'),
(15, 'Simba', 'Gato', 'Maine Coon', 2, 'Macho', 1, '2019-05-17'),
-- (16, 'Lucas', 'Perro', 'Bichón Frisé', 3, 'Macho', 19, '2022-01-10'),
-- (17, 'Mia', 'Perro', 'Labradoodle', 1, 'Hembra', 15, NULL),
-- (18, 'Lucky', 'Gato', 'Bombay', 6, 'Macho', 10, '2022-02-20'),
-- (19, 'Finn', 'Perro', 'Cavalier King Charles', 2, 'Macho', 8, NULL),
-- (20, 'Cleo', 'Gato', 'Ragdoll', 4, 'Hembra', 11, '2021-12-10'),
(21, 'Luna', 'Perro', 'Labrador', 3, 'Hembra', 1, '2022-02-12'),
(22, 'Buddy', 'Perro', 'Beagle', 2, 'Macho', 2, '2021-08-08'),
(23, 'Fluffy', 'Gato', 'Siamés', 4, 'Hembra', 3, '2020-12-23'),
(24, 'Max', 'Perro', 'Golden Retriever', 5, 'Macho', 4, '2021-11-25'),
(25, 'Simba', 'Gato', 'Persa', 1, 'Macho', 5, '2022-03-03'),
-- (26, 'Toby', 'Perro', 'Bulldog', 6, 'Macho', 6, NULL),
-- (27, 'Lucky', 'Perro', 'Chihuahua', 3, 'Macho', 7, '2022-01-15'),
-- (28, 'Cleo', 'Gato', 'Egipcio', 2, 'Hembra', 8, '2021-10-10'),
-- (29, 'Rocky', 'Perro', 'Pastor Alemán', 4, 'Macho', 9, NULL),
-- (30, 'Sasha', 'Gato', 'Siames', 7, 'Hembra', 10, '2022-02-28'),
-- (31, 'Milo', 'Perro', 'Pitbull', 2, 'Macho', 11, NULL),
-- (32, 'Tigger', 'Gato', 'Sphynx', 1, 'Macho', 12, '2021-12-20'),
-- (33, 'Ziggy', 'Perro', 'Terrier', 4, 'Macho', 13, '2022-01-10'),
-- (34, 'Whiskers', 'Gato', 'Bombay', 3, 'Hembra', 14, NULL),
-- (35, 'Bruno', 'Perro', 'Doberman', 5, 'Macho', 15, '2021-09-23');
(36, 'Natalia', 'Perro','Pinscher en miniatura', 4,'Hembra',4,'2023-05-17');


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
INSERT INTO CITAS (fecha, procedimiento_id, id_mascota, id_medico, motivo)
VALUES 
('2023-04-20 10:00:00', 1, 1, 1, 'Vacunación'),
('2023-04-20 12:00:00', 2, 9, 2, 'Revisión anual'),
('2023-04-21 09:00:00', 3, 14, 3, 'Extracción de sangre'),
('2023-04-22 14:00:00', 4, 15, 4, 'Corte de uñas'),
('2023-04-23 11:00:00', 5, 21, 5, 'Tratamiento contra pulgas'),
('2023-04-24 15:00:00', 6, 22, 2, 'Revisión general'),
('2023-04-25 10:30:00', 7, 23, 3, 'Limpieza dental'),
('2023-04-26 12:30:00', 8, 24, 4, 'Cirugía de esterilización'),
('2023-04-27 13:00:00', 9, 25, 5, 'Curación de herida'),
('2023-04-28 09:30:00', 10, 36, 1, 'Consulta por tos'),
('2023-04-29 08:00:00', 11, 36, 3, 'Tratamiento contra parásitos');




/*
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
*/
