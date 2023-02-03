<?php

namespace App\Controller;

use App\Entity\Pokemon;
use App\Repository\PokemonRepository;
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
        */

}

        
