<?php

namespace App\DataFixtures;

use App\Entity\Competence;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CompetenceFixtures extends Fixture
{
    public const COMPETENCE = [
        ['carac' => 'Agilité', 'nom' => 'Réception'],
        ['carac' => 'Agilité', 'nom' => 'Réception plongeante'],
        ['carac' => 'Agilité', 'nom' => 'Tacle plongeant'],
        ['carac' => 'Agilité', 'nom' => 'Esquive'],
        ['carac' => 'Agilité', 'nom' => 'Défenseur'],
        ['carac' => 'Agilité', 'nom' => 'Rétablissement'],
        ['carac' => 'Agilité', 'nom' => 'Saut'],
        ['carac' => 'Agilité', 'nom' => 'Libération controlée'],
        ['carac' => 'Agilité', 'nom' => 'Glissade controlée'],
        ['carac' => 'Agilité', 'nom' => 'Sournois'],
        ['carac' => 'Agilité', 'nom' => 'Sprint'],
        ['carac' => 'Agilité', 'nom' => 'Equilibre'],
        ['carac' => 'Générale', 'nom' => 'Blocage'],
        ['carac' => 'Générale', 'nom' => 'Intrépide'],
        ['carac' => 'Générale', 'nom' => 'Joueur déloyal (+1)'],
        ['carac' => 'Générale', 'nom' => 'Parade'],
        ['carac' => 'Générale', 'nom' => 'Frénésie'],
        ['carac' => 'Générale', 'nom' => 'Frappe précise'],
        ['carac' => 'Générale', 'nom' => 'Pro'],
        ['carac' => 'Générale', 'nom' => 'Poursuite'],
        ['carac' => 'Générale', 'nom' => 'Arracher le ballon'],
        ['carac' => 'Générale', 'nom' => 'Prise sûre'],
        ['carac' => 'Générale', 'nom' => 'Tacle'],
        ['carac' => 'Générale', 'nom' => 'Lutte'],
        ['carac' => 'Mutation', 'nom' => 'Main démesurée'],
        ['carac' => 'Mutation', 'nom' => 'Griffes'],
        ['carac' => 'Mutation', 'nom' => 'Présence perturbante'],
        ['carac' => 'Mutation', 'nom' => 'Bras suppléméentaires'],
        ['carac' => 'Mutation', 'nom' => 'Répulsion'],
        ['carac' => 'Mutation', 'nom' => 'Cornes'],
        ['carac' => 'Mutation', 'nom' => 'Peau de fer'],
        ['carac' => 'Mutation', 'nom' => 'Grande gueule'],
        ['carac' => 'Mutation', 'nom' => 'Queue préhensible'],
        ['carac' => 'Mutation', 'nom' => 'Tentacules'],
        ['carac' => 'Mutation', 'nom' => 'Deux têtes'],
        ['carac' => 'Mutation', 'nom' => 'Très longues jambes'],
        ['carac' => 'Passe', 'nom' => 'Précision'],
        ['carac' => 'Passe', 'nom' => 'Canonnier'],
        ['carac' => 'Passe', 'nom' => 'Perce-nuages'],
        ['carac' => 'Passe', 'nom' => 'Délestage'],
        ['carac' => 'Passe', 'nom' => 'Fumblerooskie'],
        ['carac' => 'Passe', 'nom' => 'Passe désespérée'],
        ['carac' => 'Passe', 'nom' => 'Chef'],
        ['carac' => 'Passe', 'nom' => 'Nerfs d\'acier'],
        ['carac' => 'Passe', 'nom' => 'Sur le ballon'],
        ['carac' => 'Passe', 'nom' => 'Passe'],
        ['carac' => 'Passe', 'nom' => 'Passe dans la course'],
        ['carac' => 'Passe', 'nom' => 'Passe assurée'],
        ['carac' => 'Force', 'nom' => 'Clé de bras'],
        ['carac' => 'Force', 'nom' => 'Bagarreur'],
        ['carac' => 'Force', 'nom' => 'Esquive en force'],
        ['carac' => 'Force', 'nom' => 'Projection'],
        ['carac' => 'Force', 'nom' => 'Garde'],
        ['carac' => 'Force', 'nom' => 'Juggernaut'],
        ['carac' => 'Force', 'nom' => 'Chataîgne (+1)'],
        ['carac' => 'Force', 'nom' => 'Blocage multiple'],
        ['carac' => 'Force', 'nom' => 'Marteau-pilon'],
        ['carac' => 'Force', 'nom' => 'Stabilité'],
        ['carac' => 'Force', 'nom' => 'Bras musclé'],
        ['carac' => 'Force', 'nom' => 'Crâne épais']
    ];

    public function load(ObjectManager $manager): void
    {
        foreach(self::COMPETENCE as $data) {
        $competence = new Competence();
        $competence->setCarac($data['carac']);
        $competence->setNom($data['nom']);
        $manager->persist($competence);
        }
        $manager->flush();
    }
}
