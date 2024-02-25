<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class index extends AbstractController
{
    #[Route('/index', name: 'app_movies')]
    public function index(): Response
    {
        return $this->render("derived.html.twig");
    }}



