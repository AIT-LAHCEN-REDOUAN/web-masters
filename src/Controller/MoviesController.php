<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MoviesController extends AbstractController
{
    #[Route('/movies/{name}', name: 'app_movies',condition: "params['name']=='ENGLAND'")]
    public function index(string $name): Response
    {

        //return $this->json(["message" => "Hello World"]);
        return $this->render('movies/index.html.twig', [
            'name' => $name,
        ]);
    }


    #[Route(path: '/hello', name: 'hello')]
    public function create(): string
    {
        return "hello world" ;
    }
}
