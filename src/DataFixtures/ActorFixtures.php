<?php

namespace App\DataFixtures;

use App\Entity\Actor;
use App\Entity\Movie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ActorFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $actor = new Actor();
        $actor->setName("ICHIRO");
        $manager->persist($actor);

        $actor1 = new Actor() ;
        $actor1->setName("ODA");
        $manager->persist($actor1);

        $manager->flush();


        $this->addReference("actor_1",$actor);
        $this->addReference("actor_2",$actor1);


    }
}