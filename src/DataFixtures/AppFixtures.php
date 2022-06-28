<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    private UserPasswordEncoderInterface $encoder ;

    public function __construct(serPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }


    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $username = 'username';

        for ($u= 0; $u<5;$u++)
        {
            $user = new User();
            $user->setUsername($username.$u);
        }

        $manager->flush();
    }
}
