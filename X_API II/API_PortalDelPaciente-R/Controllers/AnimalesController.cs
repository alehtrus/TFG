using Microsoft.AspNetCore.Mvc;
using System.ServiceModel.Syndication;
using System.Xml;

namespace API_PortalDelPaciente_R.Controllers
{

    [ApiController]
    [Route("[controller]")]
    public class AnimalesController : Controller
    {

        [HttpGet]
        public ActionResult GetRssAnimles()
        {
            string rssUrl = "https://www.sos-animal-mallorca.org/dogs/feed/"; // URL del feed RSS

            using (XmlReader reader = XmlReader.Create(rssUrl))
            {
                SyndicationFeed feed = SyndicationFeed.Load(reader);

                List<object> rssItems = new List<object>();
                foreach (SyndicationItem item in feed.Items)
                {
                    // Obtener los datos relevantes de cada item y agregarlos a la lista
                    if(!item.Summary.Text.Contains("RESERVADO"))
                    {
                        string titulo = item.Title.Text;
                        string descripcion = item.Summary.Text;
                        string link = item.Links[0].Uri.ToString();


                        rssItems.Add(new { Titulo = titulo, Descripcion = descripcion, Link = link });
                    }
                    
                }

                // Serializar la lista a JSON y devolverla como respuesta
                return Json(rssItems);
            }
        }
    }
}
