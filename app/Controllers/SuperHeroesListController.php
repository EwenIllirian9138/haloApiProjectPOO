<?php

namespace App\Controllers;

use App\Entities\SuperHeroes_entity;
use CodeIgniter\Controller;
use App\Models\SuperHeroes_model;

class SuperHeroesListController extends BaseController
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

    public function addHero()
    {
        helper('form');

        $validation = \Config\Services::validation();

        $validation->setRule('Name', 'Nom', 'required');

        $arrErrors = array();
        if (count($this->request->getPost()) > 0) {
            if ($validation->run($this->request->getPost())){
                $objNewSuperHeroModel = new SuperHeroes_model();
                $objNewSuperHero = new SuperHeroes_entity();
                $objNewSuperHero->fill($this->request->getPost());
                $objNewSuperHeroModel->save($objNewSuperHero);
                return redirect()->to('/Homepage');
            }else{
                $arrErrors = $validation->getErrors();
            }
        }

        $this->_data['title'] = "Ajouter un héros";
        $this->_data['arrErrors'] = $arrErrors;
        $this->_data['form_open'] = form_open('/SuperHeroesListController/addHero');
        $this->_data['label_name'] = form_label("Nom", "Name");
        $this->_data['form_name'] = form_input("Name", "", "id='Name'");
        $this->_data['label_alterego'] = form_label("Alter-Ego", "AlterEgo");
        $this->_data['form_alterego'] = form_input("AlterEgo", "", "id='AlterEgo'");
        $this->_data['label_aliases'] = form_label("Alias", "Aliases");
        $this->_data['form_aliases'] = form_input("Aliases", "", "id='Aliases'");
        $this->_data['label_placeofbirth'] = form_label("Lieu de Naissance", "PlaceOfBirth");
        $this->_data['form_placeofbirth'] = form_input("PlaceofBirth", "", "id='PlaceOfBirth'");
        $this->_data['label_firstappearance'] = form_label("Première Apparition", "FirstAppearance");
        $this->_data['form_firstappearance'] = form_input("FirstAppearance", "", "id='FirstAppearance'");
        $this->_data['label_alignment'] = form_label("Alignement", "Alignment");
        $this->_data['options'] = array('good' => 'Good','bad' => 'Bad','neutral' => 'Neutral');
        $this->_data['form_alignment'] = form_dropdown("Alignment", $this->_data['options'], 'good', "id='Alignment'");
        $this->_data['label_imagelink'] = form_label("Lien de l'Image", "ImageLink");
        $this->_data['form_imagelink'] = form_input("ImageLink", "", "id='ImageLink'");
        $this->_data['form_submit'] = form_submit("submit", "Envoyer");
        $this->_data['form_close'] = form_close();
        $this->display('addhero.tpl');
    }

    public function deleteHero($intId)
    {
        $objSuperHeroModel = new SuperHeroes_model();
        $objSuperHeroModel->delete($intId);
        return redirect()->to('/Homepage');
    }
}