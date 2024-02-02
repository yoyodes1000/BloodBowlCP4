<?php

namespace App\DataFixtures;

use App\Entity\Race;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
;

class RaceFixtures extends Fixture
{
    private const RACES = [
        [
            'nom' => 'Orques Noirs',
            'relance' => 120000,
            'apothicaire' => 'OUI',
            'tresorerie' => 600000,
            'cheerleader' => 0,
            'assistant' => 0
        ],
        [
            'nom' => 'Elus du Chaos',
            'relance' => 120000,
            'apothicaire' => 'OUI',
            'tresorerie' => 600000,
            'cheerleader' => 0,
            'assistant' => 0
        ],
        [
            'nom' => 'Renégats du Chaos',
            'relance' => 140000,
            'apothicaire' => 'OUI',
            'tresorerie' => 600000,
            'cheerleader' => 0,
            'assistant' => 0
        ],
        [
            'nom' => 'Elfes Noirs',
            'relance' => 100000,
            'apothicaire' => 'OUI',
            'tresorerie' => 600000,
            'cheerleader' => 0,
            'assistant' => 0
        ],
        [
            'nom' => 'Nains',
            'relance' => 100000,
            'apothicaire' => 'OUI',
            'tresorerie' => 600000,
            'cheerleader' => 0,
            'assistant' => 0
        ],
        [
            'nom' => 'Union Elfique',
            'relance' => 100000,
            'apothicaire' => 'OUI',
            'tresorerie' => 600000,
            'cheerleader' => 0,
            'assistant' => 0
        ],
        [
            'nom' => 'Gobelins',
            'relance' => 120000,
            'apothicaire' => 'OUI',
            'tresorerie' => 600000,
            'cheerleader' => 0,
            'assistant' => 0
        ],
        [
            'nom' => 'Halflings',
            'relance' => 120000,
            'apothicaire' => 'OUI',
            'tresorerie' => 600000,
            'cheerleader' => 0,
            'assistant' => 0
        ],
        [
            'nom' => 'Humain',
            'relance' => 100000,
            'apothicaire' => 'OUI',
            'tresorerie' => 600000,
            'cheerleader' => 0,
            'assistant' => 0
        ],
        [
            'nom' => 'Noblesse Impériale',
            'relance' => 140000,
            'apothicaire' => 'OUI',
            'tresorerie' => 600000,
            'cheerleader' => 0,
            'assistant' => 0
        ],
        [
            'nom' => 'Hommes Lézards',
            'relance' => 140000,
            'apothicaire' => 'OUI',
            'tresorerie' => 600000,
            'cheerleader' => 0,
            'assistant' => 0
        ],
        [
            'nom' => 'Horreur Necromantiques',
            'relance' => 140000,
            'apothicaire' => 'NON',
            'tresorerie' => 600000,
            'cheerleader' => 0,
            'assistant' => 0
        ],
        [
            'nom' => 'Nurgle',
            'relance' => 140000,
            'apothicaire' => 'NON',
            'tresorerie' => 600000,
            'cheerleader' => 0,
            'assistant' => 0
        ],
        [
            'nom' => 'Ogres',
            'relance' => 140000,
            'apothicaire' => 'OUI',
            'tresorerie' => 600000,
            'cheerleader' => 0,
            'assistant' => 0
        ],
        [
            'nom' => 'Alliance du Vieux Monde',
            'relance' => 140000,
            'apothicaire' => 'OUI',
            'tresorerie' => 600000,
            'cheerleader' => 0,
            'assistant' => 0
        ],
        [
            'nom' => 'Orques',
            'relance' => 120000,
            'apothicaire' => 'OUI',
            'tresorerie' => 600000,
            'cheerleader' => 0,
            'assistant' => 0
        ],
        [
            'nom' => 'Morts-Vivants',
            'relance' => 140000,
            'apothicaire' => 'NON',
            'tresorerie' => 600000,
            'cheerleader' => 0,
            'assistant' => 0
        ],
        [
            'nom' => 'Snotlings',
            'relance' => 120000,
            'apothicaire' => 'OUI',
            'tresorerie' => 600000,
            'cheerleader' => 0,
            'assistant' => 0
        ],
        [
            'nom' => 'Skavens',
            'relance' => 100000,
            'apothicaire' => 'OUI',
            'tresorerie' => 600000,
            'cheerleader' => 0,
            'assistant' => 0
        ],
        [
            'nom' => 'Bas-Fonds',
            'relance' => 140000,
            'apothicaire' => 'OUI',
            'tresorerie' => 600000,
            'cheerleader' => 0,
            'assistant' => 0
        ],
        [
            'nom' => 'Elfes Sylvains',
            'relance' => 100000,
            'apothicaire' => 'OUI',
            'tresorerie' => 600000,
            'cheerleader' => 0,
            'assistant' => 0
        ]
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::RACES as $data) {
            $race = new Race();
            $race->setNom($data['nom']);
            $race->setRelance($data['relance']);
            $race->setApothicaire($data['apothicaire']);
            $race->setTresorerie($data['tresorerie']);
            $race->setCheerleader($data['cheerleader']);
            $race->setAssistant($data['assistant']);
            $manager->persist($race);
            $this->addReference('Race_' . $data['nom'], $race);
        }

        $manager->flush();
    }
}
