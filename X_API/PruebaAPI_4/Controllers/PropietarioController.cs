using Dapper;
using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Mvc.ModelBinding;
using MySql.Data.MySqlClient;
using PortalDelPeludo_API.Controllers.Model;

namespace PortalDelPeludo_API.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class PropietarioController : ControllerBase
    {
        
        private string _connection = @"Server=localhost; Database=portal_del_peludo; Uid=root; Pwd=1234;";

        public Propietarios tmpProp { get; private set; }

        [HttpGet]       
        public IActionResult GetPropietario(string dni)
        {
            IEnumerable<Model.Propietarios> lst = null;
            using (var db = new MySqlConnection(_connection))
            {
                tmpProp = new Model.Propietarios();
                tmpProp.dni = dni;

                string query = "select id, DNI, nombre, direccion, telefono, email from propietarios"
                    + " where DNI = @dni";
                lst = db.Query<Model.Propietarios>(query, tmpProp);
            }

            return Ok(lst);

        }


        [HttpPost]
        public IActionResult Insert(Model.Propietarios model)
        {
            int resultado = 0;
            using (var db = new MySqlConnection(_connection))
            {
                string query = "insert into propietarios(id, DNI, nombre, direccion, telefono, email)"
                    + " values(@id, @nombre, @direccion, @telefono, @email)";
                resultado = db.Execute(query, model);
            }

            return Ok(resultado);
        }

        [HttpPut]

        public IActionResult Edit(Model.Propietarios model)
        {
            int resultado = 0;
            using (var db = new MySqlConnection(_connection))
            {
                string query = "UPDATE propietarios set nombre=@nombre, direccion=@direccion, telefono=@telefono, email=@email"
                    + " where id=@id";
                resultado = db.Execute(query, model);
            }

            return Ok(resultado);
        }

        [HttpDelete]
        public IActionResult Delete(string dni)
        {
            int resultado = 0;
            using (var db = new MySqlConnection(_connection))
            {
                tmpProp = new Propietarios();
                tmpProp.dni = dni;

                string query = "delete from propietarios where DNI=@dni";
                resultado = db.Execute(query, tmpProp);
            }

            return Ok(resultado);
        }

    }
}
