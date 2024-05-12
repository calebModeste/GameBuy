<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class UserFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        for ($i = 0; $i < 25; $i++) {
            $user = new User();


            $user->setEmail('user' . $i . '@email.com');
            $user->setRoles(['ROLE_USER']);
            $user->setPassword('azerty');

            $manager->persist($user);
        }

        $manager->flush();
    }
}
