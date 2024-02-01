<?php

namespace App\DataFixtures;

use App\Entity\Championnat;
use App\Entity\Equipe;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
;

class ChampionnatFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create();

        $championnat = new Championnat();
        $championnat->setNom("Coupe du Chaos");
        $manager->persist($championnat);
        $manager->flush();
        $nombreEquipes = rand(8, 15);
        for ($i = 0; $i < $nombreEquipes; $i++) {
            $equipe = new Equipe();
            $equipe->setNom("Equipe ". $faker->realText($faker->numberBetween(10, 22)));
            $championnat->addEquipe($equipe);
            $manager->persist($equipe);
        }
        $manager->flush();
    }
}
