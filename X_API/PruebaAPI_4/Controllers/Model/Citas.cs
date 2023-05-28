namespace PortalDelPeludo_API.Controllers.Model
{
    public class Citas
    {
        public int idCitas { get; set; }
        public DateTime fecha { get; set; }        
        public int id_mascota { get; set; }
        public int id_medico { get; set; }
        public string nombreMedico { get; set; }
        public string motivo { get; set; }
        public int procedimiento_id { get; set; }
        public string nombreProcedimiento { get; set; }
        public string descripcion { get; set; }
    }

    public class CitasExtended
    {
        public int idCitas { get; set; }
        public DateTime fecha { get; set; }        
        public string nombreMascota { get; set; }
        public int id_medico { get; set; }
        public string nombreMedico { get; set; }
        public string motivo{ get; set; }
        public int procedimiento_id { get; set; }
        public string nombreProcedimiento { get; set; }
        public string descripcion { get; set; }

    }
}
