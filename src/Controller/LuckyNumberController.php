<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class LuckyNumberController extends AbstractController
{
    #[Route('/lucky', name: 'app_lucky_number')]
    public function index(): Response
    {
        $number = random_int(0,1000);
        return $this->render('lucky_number/index.html.twig', [
            'LuckyNumber' => $number,
        ]);
    }

    #[Route('/api/posts/{id}',name: "Number",methods:['GET','HEAD'],condition: "params['id']<=1000")]
public function show(int $id) :Response {
        return $this->json(["number"=>$id]);
    }
}
