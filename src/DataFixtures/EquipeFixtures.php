<?php

namespace App\DataFixtures;

use AllowDynamicProperties;
use App\Entity\Equipe;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;

;

#[AllowDynamicProperties] class EquipeFixtures extends Fixture implements DependentFixtureInterface
{
    private const EQUIPES = [
        [
            'user' => 'Orques_Noirs@mail.com',
            'race' => 'Orques Noirs',
        ],
        [
            'user' => 'Elus_du_Chaos@mail.com',
            'race' => 'Elus du Chaos',
        ],
        [
            'user' => 'Renegats_du_Chaos@mail.com',
            'race' => 'Renégats du Chaos',
        ],
        [
            'user' => 'Elfes_Noirs@mail.com',
            'race' => 'Elfes Noirs',
        ],
        [
            'user' => 'Nains@mail.com',
            'race' => 'Nains',
        ],
        [
            'user' => 'Union_Elfique@mail.com',
            'race' => 'Union Elfique',
        ],
        [
            'user' => 'Gobelins@mail.com',
            'race' => 'Gobelins',
        ],
        [
            'user' => 'Halflings@mail.com',
            'race' => 'Halflings',
        ],
        [
            'user' => 'Humains@mail.com',
            'race' => 'Humains',
        ],
        [
            'user' => 'Noblesse_Imperiale@mail.com',
            'race' => 'Noblesse Impériale',
        ],
        [
            'user' => 'Hommes_Lezards@mail.com',
            'race' => 'Hommes Lézards',
        ],
        [
            'user' => 'Horreurs_Necromantiques@mail.com',
            'race' => 'Horreurs Necromantiques',
        ],
        [
            'user' => 'Nurgle@mail.com',
            'race' => 'Nurgle',
        ],
        [
            'user' => 'Ogres@mail.com',
            'race' => 'Ogres',
        ],
        [
            'user' => 'Alliance_du_Vieux_Monde@mail.com',
            'race' => 'Alliance du Vieux Monde',
        ],
        [
            'user' => 'Orques@mail.com',
            'race' => 'Orques',
        ],
        [
            'user' => 'Morts_Vivants@mail.com',
            'race' => 'Morts-Vivants',
        ],
        [
            'user' => 'Snotlings@mail.com',
            'race' => 'Snotlings',
        ],
        [
            'user' => 'Skavens@mail.com',
            'race' => 'Skavens',
        ],
        [
            'user' => 'Bas_Fonds@mail.com',
            'race' => 'Bas-Fonds',
        ],
        [
            'user' => 'Elfes_Sylvains@mail.com',
            'race' => 'Elfes Sylvains',
        ]
    ];
    private SluggerInterface $slugger;

    public function __construct(SluggerInterface $slugger)
    {
        $this->slugger = $slugger;
    }

    public function load(ObjectManager $manager): void
    {

        $faker = \Faker\Factory::create();
        foreach(self::EQUIPES as $data) {
            $equipe = new Equipe();
            $equipe->setNom($data['race']);
            $equipe->setUsers($this->getReference('Coach_' . $data['user']));
            $equipe->setRaces($this->getReference('Race_' . $data['race']));
            $slug = $this->slugger->slug($equipe->getNom());
            $equipe->setSlug($slug);
            $manager->persist($equipe);
        }
        foreach(self::EQUIPES as $data) {
            $equipe = new Equipe();
            $equipe->setNom($faker->realTextBetween(10, 15));
            $equipe->setUsers($this->getReference('Coach_' . $data['user']));
            $equipe->setRaces($this->getReference('Race_' . $data['race']));
            $slug = $this->slugger->slug($equipe->getNom());
            $equipe->setSlug($slug);
            $manager->persist($equipe);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            UserFixtures::class,
            RaceFixtures::class,
        ];
    }
}
