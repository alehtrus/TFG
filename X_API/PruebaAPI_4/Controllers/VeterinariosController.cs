using Dapper;
using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Mvc.ModelBinding;
using MySql.Data.MySqlClient;

namespace PortalDelPeludo_API.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class VeterinarioController : ControllerBase
    {
        private string _connection = @"Server=localhost; Database=portal_del_peludo; Uid=root; Pwd=1234;";

        [HttpGet]

        public IActionResult Get()
        {
            IEnumerable<Model.Veterinario> lst = null;
            using (var db = new MySqlConnection(_connection)) 
            {                
                string query = "select id, nombre, direccion, municipio, telefono, email from veterinarios";
                lst = db.Query<Model.Veterinario>(query);
            }

            return Ok(lst);

        }

        [HttpPost]
        public IActionResult Insert(Model.Veterinario model) 
        {
            int resultado = 0;
            using (var db = new MySqlConnection(_connection))
            {
                string query = "insert into veterinarios(id, nombre, direccion, municipio, telefono, email)"
                    + " values(@id, @nombre, @direccion, @municipio, @telefono, @email)";
                resultado = db.Execute(query, model);
            }

            return Ok(resultado);
        }

        [HttpPut]

        public IActionResult Edit(Model.Veterinario model)
        {
            int resultado = 0;
            using (var db = new MySqlConnection(_connection))
            {
                string query = "UPDATE veterinarios set nombre=@nombre, direccion=@direccion, municipio=@municipio, telefono=@telefono, email=@email"
                    + " where id=@id";
                resultado = db.Execute(query, model);
            }

            return Ok(resultado);
        }

        [HttpDelete]
        public IActionResult Delete(Model.Veterinario model)
        {
            int resultado = 0;
            using (var db = new MySqlConnection(_connection))
            {
                string query = "delete from veterinarios where id=@id";
                resultado = db.Execute(query, model);
            }

            return Ok(resultado);
        }

    }
}
