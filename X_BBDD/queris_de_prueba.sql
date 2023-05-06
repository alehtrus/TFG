use portal_del_peludo;

select propietarios.nombre, mascotas.nombre, mascotas.especie from propietarios inner join mascotas on propietarios.id = mascotas.propietario_id;

select * from veterinarios;

