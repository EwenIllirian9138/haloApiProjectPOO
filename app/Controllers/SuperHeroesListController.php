<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\SuperHeroes_model;

class SuperHeroesListController extends Controller
{
    public function index (){

        //à commenter une fois la bdd remplie
        //$this->seedsBdd();

        $objSuperHeroModel = new SuperHeroes_model();

        $data['title'] = "Liste des supers heros";

        $data['arrSuperHeroes'] = $objSuperHeroModel->findAll();

        echo view ('superHeroes_list',$data);

    }

    /**Description : Cette fonction remplit la bdd avec le contenu de l'API,
     * param : aucun,
     * auteur : Ewen BILLOT*
     */
    public function seedsBdd (){

        $model = new SuperHeroes_model();

        for ($i = 1; $i <= 731; $i = $i + 40){

            $url = "https://superheroapi.com/api/2992778527630545/$i";

            $resp = file_get_contents($url);

            $decode = json_decode($resp,false);

            $data = ['Name'=> $decode->name,
                'AlterEgo'=> $decode->biography->{"alter-egos"},
                'Aliases'=> $decode->biography-> aliases[0] = $decode->biography-> aliases[0] === '-' ? null :$decode->biography-> aliases[0],
                'PlaceOfBirth'=>$decode->biography->{"place-of-birth"} = $decode->biography->{"place-of-birth"} === '-' ? null : $decode->biography->{"place-of-birth"} ,
                'FirstAppearance'=>$decode->biography->{"first-appearance"} = $decode->biography->{"first-appearance"} === '-' ? null : $decode->biography->{"first-appearance"},
                'Alignment'=>$decode->biography->alignment,
                'ImageLink'=>$decode->image->url,
                'IdApi'=>$decode->id,
                'Published'=>1

            ];
            $model -> save($data);
        }
    }
}