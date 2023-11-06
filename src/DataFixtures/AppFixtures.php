<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use App\Factory\ProductFactory;
use App\Factory\ProductMediaFactory;


class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        
        ProductMediaFactory::createMany(40);

        ProductFactory::createMany(
            20,
            function() { 
                return ['media' => ProductMediaFactory::random()];
            }
        );
    }
}
