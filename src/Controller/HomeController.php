<?php
namespace App\Controller;
use App\Service\DBTest;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class HomeController extends AbstractController
{

    private LoggerInterface $logger;
    private string $dateFormat;

    public function __construct(LoggerInterface $logger, string $dateFormat)
    {
        $this->logger = $logger;
        $this->dateFormat = $dateFormat;
    }

    /**
     * @Route("/", name="home")
     */
    public function home(DBTest $data): Response
    {
        $now = new \DateTime();

        $this->logger->info("Access on {$now->format("Y/m/d H:i:s")}");

        $movies = $data->getMovies();
        return $this->render("home.html.twig", ["movies"=>$movies]);
    }
}
