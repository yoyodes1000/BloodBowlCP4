<?php

namespace App\DataFixtures;

use App\Entity\Championnat;
use App\Entity\Equipe;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;

;

class ChampionnatFixtures extends Fixture
{

    private SluggerInterface $slugger;

    public function __construct(SluggerInterface $slugger)
    {
        $this->slugger = $slugger;
    }

    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create();

        $championnat = new Championnat();
        $championnat->setNom("Coupe du Chaos");
        $manager->persist($championnat);
        $manager->flush();
        $nombreEquipes = rand(14, 18);
        for ($i = 0; $i < $nombreEquipes; $i++) {
            $equipe = new Equipe();
            $equipe->setNom("Equipe ". $faker->realText($faker->numberBetween(10, 22)));
            $slug = $this->slugger->slug($equipe->getNom());
            $equipe->setSlug($slug);
            $championnat->addEquipe($equipe);
            $manager->persist($equipe);
        }
        $manager->flush();
    }
}
