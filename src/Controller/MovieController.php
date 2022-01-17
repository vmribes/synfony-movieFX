<?php

namespace App\Controller;
use App\Service\DBTest;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MovieController extends AbstractController
{
    private array $movies;
    public function __construct(DBTest $dbtest)
    {
        $this->movies = $dbtest->getMovies();
    }


    /**
     * @Route("/movies/{id}", name="movies_show", requirements={"id"="\d+"})
     */
    public function show($id=2)
    {
        $result = array_filter($this->movies,
            function($movie) use ($id)
            {
                return $movie["id"] == $id;
            });
        if (count($result) > 0)
        {
            return $this->render('movies_show.html.twig', [
                'movie' => array_shift($result)
            ]);
        }
        else
            return $this->render('movies_show.html.twig', [
                'movie' => null
            ]);
    }

    /**
     * @Route("/movies/{text}", name="movies_filter")
     */
    public function filter($text)
    {
        $result = array_filter($this->movies,
            function($movie) use ($text)
            {
                return strpos($movie["title"], $text) !== false;
            });
        $response = "";
        if (count($result) > 0)
        {
            foreach ($result as $movie) {
                $response .= "<ul><li>" . $movie["title"] . "</li>" .
                    "<li>" . $movie["tagline"] . "</li>" .
                    "<li>" . $movie["release_date"] . "</li></ul>";
            }
            return $this->render('movies_filter.html.twig', [
                'movies' => $result
            ]);
        }
    }
}