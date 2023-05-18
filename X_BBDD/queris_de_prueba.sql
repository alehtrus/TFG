use portal_del_peludo;

select propietarios.nombre, mascotas.nombre, mascotas.especie from propietarios inner join mascotas on propietarios.id = mascotas.propietario_id;

SELECT 
    citas.id AS idCitas,
    fecha,
    mascotas.nombre as nombreMascota,
    medicos.nombre AS nombreMedico,
    motivo,
    procedimientos.id AS idProcedimiento,
    procedimientos.nombre AS nombreProcedimiento,
    descripcion
FROM
    citas
        INNER JOIN
    procedimientos ON citas.procedimiento_id = procedimientos.id
        INNER JOIN
    medicos ON medicos.id = citas.id_medico
        INNER JOIN
    mascotas ON mascotas.id = citas.id_mascota
ORDER BY fecha;
    
    
select citas.id as idCitas, fecha,id_mascota, id_medico, motivo, procedimientos.id as idProcedimiento, nombre, descripcion from citas inner join procedimientos on citas.procedimiento_id = procedimientos.id order by id_medico;

select id, nombre, especie, raza, edad, genero, id_propietario, fecha_ultima_visita from mascotas;
select id, nombre, especie, raza, edad, genero, id_propietario, fecha_ultima_visita from mascotas where id_propietario = 4;
insert into procedimientos(id, nombre, especie, raza, edad, genero, id_propietario, fecha_ultima_visita) values(@id, @nombre, @especie, @raza, @edad, @genero, @id_propietario, @fecha_ultima_visita);
UPDATE mascotas set nombre=@nombre, especie=@especie, raza=@raza, edad=@edad, genero=@genero, id_propietario=@id_propietario, fecha_ultima_visita=@fecha_ultima_visita where id=@id;

select id, fecha, procedimiento_id, id_mascota from citas;
select * from citas;


