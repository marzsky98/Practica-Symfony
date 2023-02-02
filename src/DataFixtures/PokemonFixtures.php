<?php

namespace App\DataFixtures;

use App\Entity\Abilities;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
USE App\Entity\Pokemon;
use App\Entity\Types;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;

class PokemonFixtures extends Fixture implements FixtureGroupInterface
{
    
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i <= 25; $i++) {
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, "https://pokeapi.co/api/v2/pokemon/{$i}");
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            $result = curl_exec($curl);
            curl_close($curl);
            $pokemonData = json_decode($result, true);

            if(is_array($pokemonData)){
                $pokemonEntity = new Pokemon();
                $pokemonEntity->setId($pokemonData['id']);
                $pokemonEntity->setName($pokemonData['name']);
                $pokemonEntity->setBaseExperience($pokemonData['base_experience']);
                $pokemonEntity->setHeight($pokemonData['height']);
                $pokemonEntity->setWeight($pokemonData['weight']);

                foreach($pokemonData['stats'] as $stat){

                    switch ($stat['stat']['name']) {
                        case 'hp':
                            $pokemonEntity->setHp($stat['base_stat']);
                            break;
                        case 'attack':
                            $pokemonEntity->setAttack($stat['base_stat']);
                            break;
                        case 'defense':
                            $pokemonEntity->setDefense($stat['base_stat']);
                            break;
                        case 'special-attack':
                            $pokemonEntity->setSpecialAttack($stat['base_stat']);
                            break; 
                        case 'special-defense':
                            $pokemonEntity->setSpecialDefense($stat['base_stat']);
                            break; 
                        case 'speed':
                            $pokemonEntity->setSpeed($stat['base_stat']);
                            break;              
                        
                        default:
                            echo "no stat ingresado";
                            break;
                    }
                }
                /*foreach($pokemonData['types'] as $type){
                    $pokemonEntity->addType($type['type']['name']);
                }
                foreach($pokemonData['abilities'] as $ability){
                    $pokemonEntity->addAbility($ability['ability']['name']);
                }*/
                $manager->persist($pokemonEntity);
            } 
        }
        $manager->flush();
    }

    public static function getGroups(): array
     {
         return ['pokemon'];
     }

}
    



