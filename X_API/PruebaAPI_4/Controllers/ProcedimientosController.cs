using Dapper;
using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Mvc.ModelBinding;
using MySql.Data.MySqlClient;

namespace PortalDelPeludo_API.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class ProcedimientosController : ControllerBase
    {
        private string _connection = @"Server=localhost; Database=portal_del_peludo; Uid=root; Pwd=1234;";

        [HttpGet]
        public IActionResult Get()
        {
            IEnumerable<Model.Procedimiento> lst = null;
            using (var db = new MySqlConnection(_connection)) 
            {                
                string query = "select id, nombre, descripcion from procedimientos";
                lst = db.Query<Model.Procedimiento>(query);
            }

            return Ok(lst);

        }

        [HttpPost]
        public IActionResult Insert(Model.Procedimiento model) 
        {
            int resultado = 0;
            using (var db = new MySqlConnection(_connection))
            {
                string query = "insert into procedimientos(id, nombre, descripcion)"
                    + " values(@id, @nombre, @descripcion)";
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
                string query = "UPDATE procedmientos set nombre=@nombre, descripcion=@descripcion"
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
                string query = "delete from procedimientos where id=@id";
                resultado = db.Execute(query, model);
            }

            return Ok(resultado);
        }

    }
}
