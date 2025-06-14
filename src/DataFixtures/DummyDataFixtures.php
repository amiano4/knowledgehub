<?php

namespace App\DataFixtures;

use App\Factory\CategoryFactory;
use App\Factory\NoteFactory;
use App\Factory\TagFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class DummyDataFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Create 5 categories
        CategoryFactory::createMany(5);

        // Create 20 tags to choose from
        TagFactory::createMany(20);

        // Create 10 notes
        NoteFactory::createMany(25, function () {
            return [
                'category' => CategoryFactory::random(), // or use array_rand if not using Foundry references
                'tags' => TagFactory::randomRange(1, 3), // 1–3 random tags
            ];
        });
    }
}
