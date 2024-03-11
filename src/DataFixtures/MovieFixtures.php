<?php

namespace App\DataFixtures;

use App\Entity\Movie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MovieFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $movie = new Movie();
        $movie->setTitle("ONE PIECE");
        $movie->setReleaseYear(2015);
        $movie->setDescription("GOL .D ROGER");
        $movie->setImagePath("C:\Users\aitlh\Desktop\Screenshot 2023-11-20 122413.png");
        $movie->addActor($this->getReference("actor_1"));
        $manager->persist($movie);


        $movie2 = new Movie();
        $movie2->setTitle("ONE PIECE1");
        $movie2->setReleaseYear(2015);
        $movie2->setDescription("GOL .D ROGER");
        $movie2->setImagePath("C:\Users\aitlh\Desktop\Screenshot 2023-11-20 122413.png");
        $movie2->addActor($this->getReference("actor_2"));
        $manager->persist($movie2);


        $manager->flush();


    }
}
