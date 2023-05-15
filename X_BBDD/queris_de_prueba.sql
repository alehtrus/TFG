use portal_del_peludo;

select propietarios.nombre, mascotas.nombre, mascotas.especie from propietarios inner join mascotas on propietarios.id = mascotas.propietario_id;

select * from mascotas;

select id, nombre, especie, raza, edad, genero, id_propietario, fecha_ultima_visita from mascotas;
select id, nombre, especie, raza, edad, genero, id_propietario, fecha_ultima_visita from mascotas where id_propietario = 4;
insert into procedimientos(id, nombre, especie, raza, edad, genero, id_propietario, fecha_ultima_visita) values(@id, @nombre, @especie, @raza, @edad, @genero, @id_propietario, @fecha_ultima_visita);
UPDATE mascotas set nombre=@nombre, especie=@especie, raza=@raza, edad=@edad, genero=@genero, id_propietario=@id_propietario, fecha_ultima_visita=@fecha_ultima_visita where id=@id;


