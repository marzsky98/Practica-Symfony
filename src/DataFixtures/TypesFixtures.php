<?php

namespace App\DataFixtures;

use App\Entity\Types;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;

class TypesFixtures extends Fixture implements FixtureGroupInterface
{
    public function load(ObjectManager $manager): void
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "https://pokeapi.co/api/v2/type");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        curl_close($curl);
        $typesData = json_decode($result, true);

        foreach ($typesData['results'] as $type) {
            $typeEntity = new Types();
            $typeEntity->setName($type['name']);

            $manager->persist($typeEntity);
        }
        $manager->flush();
    }

    public static function getGroups(): array
     {
         return ['catalogs'];
     }
}
