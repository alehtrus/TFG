using Dapper;
using Microsoft.AspNetCore.Mvc;
using MySql.Data.MySqlClient;

namespace PortalDelPeludo_API.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class MedicoController : Controller
    {
        private string _connection = @"Server=localhost; Database=portal_del_peludo; Uid=root; Pwd=1234;";

        [HttpGet]
        public IActionResult Get()
        {
            IEnumerable<Model.Medico> lst = null;
            using (var db = new MySqlConnection(_connection))
            {
                string query = "select id, DNI, nombre, numero_colegiado from medicos";
                lst = db.Query<Model.Medico>(query);
            }

            return Ok(lst);

        }        

    }
}
