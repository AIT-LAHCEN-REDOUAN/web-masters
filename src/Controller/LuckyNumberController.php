<?php

namespace App\Controller;

use App\Entity\Movie;
use App\Repository\MovieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class LuckyNumberController extends AbstractController
{

    private $em ;
    public function __construct(EntityManagerInterface $em){
          $this->em = $em ;
    }

    //findAll Method
    #[Route('/findAll', name: 'findAll')]
    public function findAll(): Response
    {
        $repository = $this->em->getRepository(Movie::class);
        $movie =  $repository->findAll() ;
        dd($movie);
    }

    //find Method
    #[Route("/find",name: "find")]
    public function find(): Response
    {
        $repository = $this->em->getRepository(Movie::class);
        $movie =  $repository->find(5) ;
        dd($movie);
    }


    //findBy Method
    #[Route("/findBy",name: "findBy")]
    public function findBy(){
        $repository = $this->em->getRepository(Movie::class);
        $movie = $repository->findBy([],["id"=>'DESC']);
        dd($movie);
    }


    //findOneBy Method
    #[Route("/findOneBy",name: "findOneBy")]
    public function findOneBy(){
        $repository = $this->em->getRepository(Movie::class);
        $movie = $repository->findOneBy(['id'=>6,'Title'=>"ONE PIECE1"],['id'=>"DESC"]);
        dd($movie);
    }

    //Count Method
    #[Route("/Count",name: "Count")]
    public function Count(){
        $repository = $this->em->getRepository(Movie::class);
        $movie = $repository->count(['id'=>5]);
        dd($movie);
    }

    //getClass Name Method
    #[Route("/getClassName",name: "getClassName")]
    public function getClassName(){
        $repository = $this->em->getRepository(Movie::class);
        $movie = $repository->getClassName();
        dd($movie);
    }










    #[Route('/api/posts/{id}',name: "Number",defaults: ["id"=>0],methods:['GET','HEAD'],condition: "params['id']<=1000")]
public function show(int $id) :Response {
        return $this->json(["number"=>$id]);
    }
}
