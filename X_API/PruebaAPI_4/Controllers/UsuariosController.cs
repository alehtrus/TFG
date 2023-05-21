using Dapper;
using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Mvc.ModelBinding;
using MySql.Data.MySqlClient;
using MySqlX.XDevAPI.Relational;
using PortalDelPeludo_API.Controllers.Model;

namespace PortalDelPeludo_API.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class UsuarioController : ControllerBase
    {
        private string _connection = @"Server=localhost; Database=portal_del_peludo; Uid=root; Pwd=1234;";
        private Usuario usuario;

        [HttpGet]
        [Route("todos")]
        public IActionResult GetAll()
        {
            IEnumerable<Model.Usuario> lst = null;
            using (var db = new MySqlConnection(_connection)) 
            {                
                string query = "select DNI, contrasena, rol from usuarios";
                lst = db.Query<Model.Usuario>(query);
            }

            return Ok(lst);

        }

        [HttpGet]
        [Route("uno")]
        public IActionResult GetOne(string dni)
        {
            IEnumerable<Model.Usuario> lst = null;
            using (var db = new MySqlConnection(_connection))
            {
                usuario = new Model.Usuario();
                usuario.DNI = dni;
                string query = "select DNI, contrasena, rol from usuarios where DNI = @dni";
                lst = db.Query<Model.Usuario>(query, usuario);
            }

            return Ok(lst);

        }

        [HttpPost]
        public IActionResult Insert(string dni, string contrasena, string rol) 
        {
            int resultado = 0;
            using (var db = new MySqlConnection(_connection))
            {
                usuario = new Model.Usuario();
                usuario.DNI = dni;
                usuario.contrasena = contrasena;
                usuario.rol = rol;

                string query = "insert into usuarios(DNI, contrasena, rol)"
                    + " values(@DNI, @contrasena, @rol)";
                resultado = db.Execute(query, usuario);
            }

            return Ok(resultado);
        }

        [HttpPut]

        public IActionResult Edit(string dni, string contrasena, string rol)
        {
            int resultado = 0;
            using (var db = new MySqlConnection(_connection))
            {
                usuario = new Model.Usuario();
                usuario.DNI = dni;
                usuario.contrasena = contrasena;
                usuario.rol = rol;
                string query = "UPDATE usuarios set contrasena=@contrasena, rol=@rol"
                    + " where DNI=@DNI";
                resultado = db.Execute(query, usuario);
            }

            return Ok(resultado);
        }

        [HttpDelete]
        public IActionResult Delete(string dni)
        {
            int resultado = 0;
            using (var db = new MySqlConnection(_connection))
            {
                usuario = new Model.Usuario();
                usuario.DNI = dni;

                string query = "delete from usuarios where DNI=@dni";
                resultado = db.Execute(query, usuario);
            }

            return Ok(resultado);
        }

    }
}
