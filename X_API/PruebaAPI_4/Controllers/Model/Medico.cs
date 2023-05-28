namespace PortalDelPeludo_API.Controllers.Model
{
    public class Medico
    {

        public int id { get; set; }
        public int id_veterinario { get; set; }
        public string DNI { get; set; }
        public string nombre { get; set; }
        public int numero_colegiado { get; set;}

    }
}
