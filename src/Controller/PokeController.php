<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use PokePHP\PokeApi;

class PokeController extends AbstractController
{
    #[Route('/poke', name: 'app_poke')]
    public function index(): JsonResponse
    {
        return $this->json([
                            'Status' => 'Funcionando chingon',
                            'path' => 'src/Controller/PokeController.php',
                            ]);
    }
 /*
    #[Route('/Types', name: 'ShowTypes')] 
    public function ListAllTypes(): JsonResponse{
       
       $curl = curl_init();

       curl_setopt($curl, CURLOPT_URL, 'https://pokeapi.co/api/v2/type');
       curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

       $response = curl_exec($curl);

       if(curl_errno($curl)) echo curl_errno($curl);
       else $decoded = json_decode($response, true);
       //var_dump($decoded); 
       curl_close($curl);
       return $this->json($decoded);
    }

    #[Route('/Ability', name: 'ShowAllAbilities')]
    public function ListAllAbilities():JsonResponse{
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, 'https://pokeapi.co/api/v2/ability/?limit=358&offset=0');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($curl);

        if (curl_errno($curl)) {
            echo curl_errno($curl);
        }else 
        $decoded = json_decode($response, true);
        //var_dump($decoded);
        curl_close($curl);
        return $this->json($decoded);
    }

    #[Route('/pokemon', name: 'ListAllPokemon')] 
    public function ListAllPokemon(): JsonResponse{
       
       $curl = curl_init();

       curl_setopt($curl, CURLOPT_URL, 'https://pokeapi.co/api/v2/pokemon/?limit=1280&offset=0');
       curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

       $response = curl_exec($curl);

       if(curl_errno($curl)) echo curl_errno($curl);
       else $decoded = json_decode($response, true);
       //var_dump($decoded);
       curl_close($curl);
       return $this->json($decoded);
    }

    #[Route('/SinglePokemon/{IdOrName}', name: 'ShowSinglePokemon')]
    public function ShowSinglePokemon($IdOrName): JsonResponse{

            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, "https://pokeapi.co/api/v2/pokemon/{$IdOrName}");
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            $result = curl_exec($curl);
            curl_close($curl);
            $pokemonData = json_decode($result, true);
            //var_dump($pokemonData);

            if(is_array($pokemonData)){

                $id = $pokemonData['id'];
                $name = $pokemonData['name'];                                                         
                $base_experience = $pokemonData['base_experience'];                                   
                $height = $pokemonData['height'];                                                     
                $weight = $pokemonData['weight'];

                foreach($pokemonData['stats'] as $stat){
                    $hp=$stat['base_stat'];
                    $attack=$stat['base_stat'];
                    $defense=$stat['base_stat'];
                    $spAttack=$stat['base_stat'];
                    $spDefense=$stat['base_stat'];
                    $speed=$stat['base_stat'];
                }
                $filteredPokemonData = [
                    'id' => $id,
                    'name' => $name,
                    'base_experience' => $base_experience,
                    'height' => $height,
                    'weight' => $weight,
                    'stat' => $hp.",".$attack.",".$defense.",".$spAttack.",".$spDefense.",".$speed,
                    
                ];
            }
        var_dump($filteredPokemonData);
        return new JsonResponse($filteredPokemonData);
        //return $this->json($result);
    }
        */

}

        
