using Dapper;
using Microsoft.AspNetCore.Mvc;
using MySql.Data.MySqlClient;
using PortalDelPeludo_API.Controllers.Model;

namespace PortalDelPeludo_API.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class CitasController : Controller
    {
        
        private string _connection = @"Server=localhost; Database=portal_del_peludo; Uid=root; Pwd=1234;";

        [HttpGet]
        [Route("citasMascota")]
        public IActionResult GetCitasMascota(int idMascota)
        {
            IEnumerable<Citas> lst = null;
            using (var db = new MySqlConnection(_connection)) 
            {
                string query = "SELECT citas.id AS idCitas, fecha, id_mascota, medicos.nombre AS nombreMedico, motivo, " +
                    "procedimientos.id AS idProcedimiento, procedimientos.nombre as nombreProcedimiento, " +
                    "descripcion FROM citas INNER JOIN procedimientos ON citas.procedimiento_id = procedimientos.id " +
                    "INNER JOIN medicos ON medicos.id = citas.id_medico where id_mascota= "+idMascota+" order by fecha";
                lst = db.Query<Citas>(query);
            }

            return Ok(lst);
        }

        [HttpGet]
        [Route("todasCitas")]
        public IActionResult GetTodasCitas()
        {
            IEnumerable<CitasExtended> lst = null;
            using (var db = new MySqlConnection(_connection))
            {
                string query = "select citas.id AS idCitas, fecha, mascotas.nombre as nombreMascota, medicos.nombre AS nombreMedico, " +
                    "motivo, procedimientos.id AS idProcedimiento, procedimientos.nombre AS nombreProcedimiento, descripcion " +
                    "FROM citas INNER JOIN procedimientos ON citas.procedimiento_id = procedimientos.id " +
                    "INNER JOIN medicos ON medicos.id = citas.id_medico INNER JOIN mascotas ON mascotas.id = citas.id_mascota " +
                    "ORDER BY fecha desc";
                
                lst = db.Query<CitasExtended>(query);
            }

            return Ok(lst);
        }

        [HttpPost]
        public IActionResult Insert(DateTime fecha, int procedimiento_id, int id_mascota, int id_medico, string motivo)
        {
            int resultado = 0;
            using (var db = new MySqlConnection(_connection))
            {

                var cita = new Citas();
                cita.fecha = fecha;
                cita.procedimiento_id = procedimiento_id;
                cita.id_mascota = id_mascota;
                cita.id_medico = id_medico;
                cita.motivo = motivo;

                string query = "insert into citas (fecha, procedimiento_id, id_mascota, id_medico, motivo) " +
                    "values(@fecha, @procedimiento_id, @id_mascota, @id_medico, @motivo)";
                resultado = db.Execute(query, cita);
            }

            return Ok(resultado);
        }

        [HttpPut]

        public IActionResult Edit(Model.Procedimiento model)
        {
            int resultado = 0;
            using (var db = new MySqlConnection(_connection))
            {
                string query = "UPDATE citas set fecha=@fecha, procedimiento_id=@procedimiento_id, id_mascota=@id_mascota, id_medico=@id_medico, motivo=@motivo"
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
                string query = "delete from citas where id=@id";
                resultado = db.Execute(query, model);
            }

            return Ok(resultado);
        }

    }
}
