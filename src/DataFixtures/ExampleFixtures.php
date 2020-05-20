<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Example;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ExampleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker  =  Factory::create('fr_FR');

        for ($i = 0; $i < 50; $i++) {
            $example = new Example();
            $example->setName($faker->name);
            $manager->persist($example);
        }
        $manager->flush();
    }
}
