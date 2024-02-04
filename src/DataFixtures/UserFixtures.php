<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

;

class UserFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;

    private const COACHES = [
        [
            'pseudo' => 'Orques Noirs',
            'email' => 'Orques_Noirs@mail.com',
            'password' => 'Orques_Noirs',
        ],
        [
            'pseudo' => 'Elus du Chaos',
            'email' => 'Elus_du_Chaos@mail.com',
            'password' => 'Elus_du_Chaos',
        ],
        [
            'pseudo' => 'Renégats du Chaos',
            'email' => 'Renegats_du_Chaos@mail.com',
            'password' => 'Renegats_du_Chaos',
        ],
        [
            'pseudo' => 'Elfes Noirs',
            'email' => 'Elfes_Noirs@mail.com',
            'password' => 'Elfes_Noirs',
        ],
        [
            'pseudo' => 'Nains',
            'email' => 'Nains@mail.com',
            'password' => 'Nains',
        ],
        [
            'pseudo' => 'Union Elfique',
            'email' => 'Union_Elfique@mail.com',
            'password' => 'Union_Elfique',
        ],
        [
            'pseudo' => 'Gobelins',
            'email' => 'Gobelins@mail.com',
            'password' => 'Gobelins',
        ],
        [
            'pseudo' => 'Halflings',
            'email' => 'Halflings@mail.com',
            'password' => 'Halflings',
        ],
        [
            'pseudo' => 'Humains',
            'email' => 'Humains@mail.com',
            'password' => 'Humains',
        ],
        [
            'pseudo' => 'Noblesse Impériale',
            'email' => 'Noblesse_Imperiale@mail.com',
            'password' => 'Noblesse_Imperiale',
        ],
        [
            'pseudo' => 'Hommes Lézards',
            'email' => 'Hommes_Lezards@mail.com',
            'password' => 'Hommes_Lezards',
        ],
        [
            'pseudo' => 'Horreurs Necromantiques',
            'email' => 'Horreurs_Necromantiques@mail.com',
            'password' => 'Horreurs_Necromantiques',
        ],
        [
            'pseudo' => 'Nurgle',
            'email' => 'Nurgle@mail.com',
            'password' => 'Nurgle',
        ],
        [
            'pseudo' => 'Ogres',
            'email' => 'Ogres@mail.com',
            'password' => 'Ogres',
        ],
        [
            'pseudo' => 'Alliance du Vieux Monde',
            'email' => 'Alliance_du_Vieux_Monde@mail.com',
            'password' => 'Alliance_du_Vieux_Monde',
        ],
        [
            'pseudo' => 'Orques',
            'email' => 'Orques@mail.com',
            'password' => 'Orques',
        ],
        [
            'pseudo' => 'Morts-Vivants',
            'email' => 'Morts_Vivants@mail.com',
            'password' => 'Morts_Vivants',
        ],
        [
            'pseudo' => 'Snotlings',
            'email' => 'Snotlings@mail.com',
            'password' => 'Snotlings',
        ],
        [
            'pseudo' => 'Skavens',
            'email' => 'Skavens@mail.com',
            'password' => 'Skavens',
        ],
        [
            'pseudo' => 'Bas-Fonds',
            'email' => 'Bas_Fonds@mail.com',
            'password' => 'Bas_Fonds',
        ],
        [
            'pseudo' => 'Elfes Sylvains',
            'email' => 'Elfes_Sylvains@mail.com',
            'password' => 'Elfes_Sylvains',
        ],
    ];

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        foreach (self::COACHES as $data) {
            $user = new User();
            $user->setPseudo($data['pseudo']);
            $user->setEmail($data['email']);
            $user->setRoles(['ROLE_USER']);
            $hashedPassword = $this->passwordHasher->hashPassword(
                $user,
                $data['password'],
            );
            $user->setPassword($hashedPassword);
            $manager->persist($user);
            $this->addReference('Coach_' . $data['email'], $user);
        }

        $manager->flush();
    }
}

