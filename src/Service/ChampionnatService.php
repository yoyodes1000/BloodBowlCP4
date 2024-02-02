<?php

namespace App\Service;

use App\Entity\Equipe;
use Doctrine\ORM\EntityManagerInterface;

class ChampionnatService
{
    public function creerChampionnat(array $equipes): array
    {
        $nombreEquipes = count($equipes);
        $calendrier = [];

        if ($nombreEquipes % 2 != 0) {
            $exempte = new Equipe;
            $equipes[] = $exempte->setNom('Exempte');
            $nombreEquipes +=1;
        }
        $nombreJournees = $nombreEquipes - 1;

        for ($journee = 1; $journee <= $nombreJournees; $journee++) {
            $calendrier[$journee] = [];

            for ($i = 0; $i < $nombreEquipes / 2; $i++) {
                $equipe1 = $equipes[$i];
                $equipe2 = $equipes[$nombreEquipes - 1 - $i];
                if ($equipe1->getNom() != "Exempte" && $equipe2->getNom() != "Exempte") {
                    $calendrier[$journee][] = $equipe1->getNom() . " vs " . $equipe2->getNom();
                }
            }
            for ($j = 1; $j < count($equipes) -1; $j++) {
                $tab[] = $equipes[$j]->getNom();
            }
            $tab[count($equipes) -1] = $equipes[0]->getNom();
        }
        return $calendrier;
    }

    /*public function afficherChampionnat(array $calendrier): void
    {
        foreach ($calendrier as $journee => $matches) {
            echo "Journée $journee: " . PHP_EOL;
            foreach ($matches as $match) {
                echo $match . PHP_EOL;
            }
            echo "\n";
        }
    }*/
}
