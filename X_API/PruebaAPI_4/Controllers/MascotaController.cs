using Dapper;
using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Mvc.ModelBinding;
using MySql.Data.MySqlClient;

namespace PortalDelPeludo_API.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class MascotaController : ControllerBase
    {
        
        private string _connection = @"Server=localhost; Database=portal_del_peludo; Uid=root; Pwd=1234;";

        [HttpGet]
        [Route("medico")]
        public IActionResult Get()
        {
            IEnumerable<Model.Mascota> lst = null;
            using (var db = new MySqlConnection(_connection))
            {
                string query = "select id, nombre, especie, raza, edad, genero, id_propietario, fecha_ultima_visita from mascotas";
                lst = db.Query<Model.Mascota>(query);
            }

            return Ok(lst);

        }

        [HttpGet]
        [Route("propietario")]
        public IActionResult GetAll(int id)
        {
            IEnumerable<Model.Mascota> lst = null;
            using (var db = new MySqlConnection(_connection))
            {
                string query = "select id, nombre, especie, raza, edad, genero, id_propietario, fecha_ultima_visita from mascotas"
                    + " where id_propietario = " + id;
                lst = db.Query<Model.Mascota>(query);
            }

            return Ok(lst);

        }

        [HttpPost]
        public IActionResult Insert(Model.Mascota model)
        {
            int resultado = 0;
            using (var db = new MySqlConnection(_connection))
            {
                string query = "insert into procedimientos(id, nombre, especie, raza, edad, genero, id_propietario, fecha_ultima_visita)"
                    + " values(@id, @nombre, @especie, @raza, @edad, @genero, @id_propietario, @fecha_ultima_visita)";
                resultado = db.Execute(query, model);
            }

            return Ok(resultado);
        }

        [HttpPut]

        public IActionResult Edit(Model.Procedimiento model)
        {
            int resultado = 0;
            using (var db = new MySqlConnection(_connection))
            {
                string query = "UPDATE mascotas set nombre=@nombre, especie=@especie, raza=@raza, edad=@edad, genero=@genero, id_propietario=@id_propietario, fecha_ultima_visita=@fecha_ultima_visita"
                    + " where id=@id";
                resultado = db.Execute(query, model);
            }

            return Ok(resultado);
        }

        [HttpDelete]
        public IActionResult Delete(Model.Procedimiento model)
        {
            int resultado = 0;
            using (var db = new MySqlConnection(_connection))
            {
                string query = "delete from mascotas where id=@id";
                resultado = db.Execute(query, model);
            }

            return Ok(resultado);
        }

    }
}
