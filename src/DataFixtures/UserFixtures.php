<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for($i = 1; $i <= 10; $i++){
            $u = new User();
            $u->setEmail("user{$i}@domain.com");
            $u->setPassword("user{$i}_password");
            $u->setUsername("user{$i}");
            $u->setIsActive($i % 2 === 0);
            $manager->persist($u);
        }

        $manager->flush();
    }
}
