using Microsoft.AspNetCore.Mvc;

namespace MonApplication.Controllers
{
    public class HomeController : Controller
    {
        public IActionResult Index(string nom)
        {
            // Passe le paramètre 'nom' à la vue
            ViewData["Nom"] = nom;
            return View();
        }
    }
}
