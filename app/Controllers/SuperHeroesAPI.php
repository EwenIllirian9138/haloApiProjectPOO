<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\SuperHeroes_model;

class SuperHeroesAPI extends Controller

{
    public function index (){

        $arrSuperHeroes = array();

        //à commenter une fois la bdd remplie
        $this->seedsBdd();

        echo view ('superHeroes_list');

    }

    public function seedsBdd (){

        $model = new SuperHeroes_model();

        for ($i = 1; $i <= 731; $i = $i + 40){

            $url = "https://superheroapi.com/api/2992778527630545/$i";

            $resp = file_get_contents($url);

            $decode = json_decode($resp,false);

            $data = ['Name'=> $decode->name,
                'AlterEgo'=> $decode->biography->{"alter-egos"},
                'Aliases'=> $decode->biography->aliases[0],
                'PlaceOfBirth'=>$decode->biography->{"place-of-birth"},
                'FirstAppearance'=>$decode->biography->{"first-appearance"},
                'Alignment'=>$decode->biography->alignment,
                'ImageLink'=>$decode->image->url

            ];
            $model -> save($data);
        }
    }
}
