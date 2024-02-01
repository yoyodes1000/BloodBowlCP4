<?php

namespace App\Service;

use App\Entity\Race;

class ChampionnatService
{
    public function creerChampionnat(array $equipes): array
    {
        $nombreEquipes = count($equipes);
        $calendrier = [];

        if ($nombreEquipes % 2 != 0) {
            $equipes[] = "Exempte";
            $nombreEquipes +=1;
        }

        $nombreJournees = $nombreEquipes - 1;

        for ($journee = 1; $journee <= $nombreJournees; $journee++) {
            $calendrier[$journee] = [];

            for ($i = 0; $i < $nombreEquipes / 2; $i++) {
                $equipe1 = $equipes[$i];
                $equipe2 = $equipes[$nombreEquipes - 1 - $i];

                if ($equipe1 != "Exempte" && $equipe2 != "Exempte") {
                    $calendrier[$journee][] = "$equipe1 vs $equipe2";
                }
            }
            array_splice($equipes, 1, 0, array_pop($equipes));
        }

        return $calendrier;
    }

    public function afficherChampionnat(array $calendrier): void
    {
        foreach ($calendrier as $journee => $matches) {
            echo "Journée $journee: " . PHP_EOL;
            foreach ($matches as $match) {
                echo $match . PHP_EOL;
            }
            echo "\n";
        }
    }
}
