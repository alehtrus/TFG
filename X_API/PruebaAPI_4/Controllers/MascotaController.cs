using Dapper;
using Google.Protobuf.WellKnownTypes;
using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Mvc.ModelBinding;
using MySql.Data.MySqlClient;
using PortalDelPeludo_API.Controllers.Model;

namespace PortalDelPeludo_API.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class MascotaController : ControllerBase
    {
        
        private string _connection = @"Server=localhost; Database=portal_del_peludo; Uid=root; Pwd=1234;";

        [HttpGet]
        [Route("medico")]
        public IActionResult GetTodas()
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
        public IActionResult GetMascotaPropietario(int id)
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

        [HttpGet]
        [Route("mascota")]
        public IActionResult GetUnaMascota(int id)
        {
            IEnumerable<Model.Mascota> lst = null;
            using (var db = new MySqlConnection(_connection))
            {
                string query = "select id, nombre, especie, raza, edad, genero, id_propietario, fecha_ultima_visita from mascotas"
                    + " where id =" + id;
                lst = db.Query<Model.Mascota>(query);
            }

            return Ok(lst);

        }

        [HttpPost]
        public IActionResult Insert(Model.Mascota model)
        {
            int resultado = 0;
            if (String.IsNullOrEmpty(model.fecha_ultima_visita)) 
            {
                model.fecha_ultima_visita = "0000/00/00";
            }
            using (var db = new MySqlConnection(_connection))
            {
                string query = "insert into mascotas(id, nombre, especie, raza, edad, genero, id_propietario, fecha_ultima_visita)"
                    + " values(@id, @nombre, @especie, @raza, @edad, @genero, @id_propietario, @fecha_ultima_visita)";
                resultado = db.Execute(query, model);
            }

            return Ok(resultado);
        }

        [HttpPost]
        [Route("editar")]
        public IActionResult Edit(int id, string nombre, string especie, string raza, int edad, string genero,int idPropietario, string fechaUltimavisita)
        {            
            int resultado = 0;
            using (var db = new MySqlConnection(_connection))
            {                
                var mascota = new Model.Mascota();
                mascota.id = id;
                mascota.nombre = nombre;
                mascota.especie = especie;
                mascota.raza = raza;
                mascota.edad = edad;
                mascota.genero = genero;
                mascota.id_propietario = idPropietario;
                mascota.fecha_ultima_visita = fechaUltimavisita;                

                string query = "UPDATE mascotas set nombre=@nombre, especie=@especie, raza=@raza, edad=@edad, genero=@genero, id_propietario=@id_propietario, fecha_ultima_visita=@fecha_ultima_visita"
                    + " where id=@id";
                resultado = db.Execute(query, mascota);
            }

            return Ok(resultado);
        }

        [HttpDelete]
        public IActionResult Delete(int id)
        {
            
            int resultado = 0;
            using (var db = new MySqlConnection(_connection))
            {
                var mascota = new Mascota();
                mascota.id = id;

                string query = "delete from mascotas where id=@id";
                resultado = db.Execute(query, mascota);
            }

            return Ok(resultado);
        }

    }
}
