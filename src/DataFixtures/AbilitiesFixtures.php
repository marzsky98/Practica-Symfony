<?php 

namespace App\DataFixtures;

use App\Entity\Abilities;
use App\Entity\Pokemon;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;

class AbilitiesFixtures extends Fixture implements FixtureGroupInterface
{
    public function load(ObjectManager $manager): void
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "https://pokeapi.co/api/v2/ability");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        curl_close($curl);
        $abilityData = json_decode($result, true);

        foreach ($abilityData['results'] as $ability) {
            $abilityEntity = new Abilities();                                               #convertir name en PK
            $abilityEntity->setName($ability['name']);

            $manager->persist($abilityEntity);
        }   
        $manager->flush();
    }

    public static function getGroups(): array
     {
         return ['catalogs'];
     }
}