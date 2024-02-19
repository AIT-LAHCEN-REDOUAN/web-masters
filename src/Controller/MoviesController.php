<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MoviesController extends AbstractController
{
    #[Route('/movies', name: 'app_movies')]
    public function index(): Response
    {

        //return $this->json(["message" => "Hello World"]);
        return $this->render('movies/index.html.twig', [
            'name' => 'MoviesController',
        ]);
    }


    #[Route(path: '/hello', name: 'hello')]
    public function create(): string
    {
        return "hello world" ;
    }
}
