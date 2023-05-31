using Microsoft.AspNetCore.Mvc;
using System.ServiceModel.Syndication;
using System.Xml;

namespace API_PortalDelPaciente_R.Controllers
{

    [ApiController]
    [Route("[controller]")]
    public class NoticiasController : Controller
    {

        [HttpGet]
        public ActionResult GetRssMascotas()
        {
            string rssUrl = "https://www.diariodemallorca.es/rss/section/2612"; // URL del feed RSS

            using (XmlReader reader = XmlReader.Create(rssUrl))
            {
                SyndicationFeed feed = SyndicationFeed.Load(reader);

                List<object> rssItems = new List<object>();
                foreach (SyndicationItem item in feed.Items)
                {
                    // Obtener los datos relevantes de cada item y agregarlos a la lista
                    string titulo = item.Title.Text;
                    string descripcion = item.Summary.Text;
                    string link = item.Links[0].Uri.ToString();
                    string imagen = item.Links[1].Uri.ToString();
                    DateTime publishDate = item.PublishDate.DateTime;

                    rssItems.Add(new { Titulo = titulo, Descripcion = descripcion, Link = link, PublishDate = publishDate , Imagen = imagen});
                }

                // Serializar la lista a JSON y devolverla como respuesta
                return Json(rssItems);
            }
        }
    }
}
