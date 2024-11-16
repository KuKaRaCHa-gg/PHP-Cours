using Microsoft.AspNetCore.Mvc;

namespace TonProjet.Controllers
{
    public class HomeController : Controller
    {
        [HttpGet]
        public IActionResult Index()
        {
            return View();
        }

        [HttpPost]
        public IActionResult SubmitForm(string nom, string prenom)
        {
            // Traite les données du formulaire
            ViewData["Nom"] = nom;
            ViewData["Prenom"] = prenom;

            // Redirige vers la vue avec les informations
            return View("Index");
        }
    }
}