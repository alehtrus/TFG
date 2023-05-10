namespace PortalDelPeludo_API.Controllers.Model
{
    public class Citas
    {
        public int id { get; set; }
        public DateTime fecha { get; set; }
        public int procedimiento_id{ get; set; }

        public int id_mascota { get; set; }
        public int id_medico { get; set; }
        public string motivo { get; set; }
    }
}
