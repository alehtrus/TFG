namespace PortalDelPeludo_API.Controllers.Model
{
    public class Mascota
    {
        public int id {get; set;}
        public string nombre { get; set; }
        public string especie { get; set; }
        public string raza { get; set; }
        public int edad { get; set; }
        public string genero { get; set; }
        public int id_propietario { get; set; }
        public string fecha_ultima_visita { get; set; }
    }
}
