<?php

namespace App\Controller;

use App\Entity\Pokemon;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class ApiPokemon extends AbstractController
{
    
    #[Route('/Api/createPokemon', name: 'createPokemon', methods: ['GET', 'HEAD'])]
    public function CreatePokemon(Request $request, EntityManagerInterface $em): JsonResponse
    {
        $pokemonEntity = new Pokemon;
        $response = new JsonResponse();

        $id = $request->get('id', null);
        $name = $request->get('name', null);
        $baseExp = $request->get('base_experience', null);
        $height = $request->get('height', null);
        $weight = $request->get('weight', null);
        $hp = $request->get('hp', null);
        $attack = $request->get('attack', null);
        $defense = $request->get('defense', null);
        $spAttack = $request->get('special_attack', null);
        $spDefense = $request->get('special_defense', null);
        $speed = $request->get('speed', null);

        if (empty ($id | $name | $height | $weight | $hp)){
            $response->setData([
                'status' => false,
                'error' => 'id, name, height, weight or hp cannot be empty',
                'data' => null

            ]);
            return $response;
        }
        $pokemonEntity->setId($id);
        $pokemonEntity->setName($name);
        $pokemonEntity->setBaseExperience($baseExp);
        $pokemonEntity->setHeight($height);
        $pokemonEntity->setWeight($weight);
        $pokemonEntity->setHp($hp);
        $pokemonEntity->setAttack($attack);
        $pokemonEntity->setDefense($defense);
        $pokemonEntity->setSpecialAttack($spAttack);
        $pokemonEntity->setSpecialDefense($spDefense);
        $pokemonEntity->setSpeed($speed);

        $em->persist($pokemonEntity);
        $em->flush();

        $response->setData([
            'status' => true,
            'message' => ['El pokemon'. $pokemonEntity->getName(). 'se guardo correctamente',
                          'id' => $pokemonEntity->getId()
                        ]
        ]);
        return $response;
    }


}
