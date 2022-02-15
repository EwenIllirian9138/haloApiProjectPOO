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

        $this->_data['title'] = "Tous les Super-Héros";


        $this->_data['arrSuperHeroes'] = $objSuperHeroModel->findAll();
        $this->display('superHeroes_list.tpl');
        //echo view ('superHeroes_list',$data);

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
                return redirect()->to('/SuperHeroesListController');
            }else{
                $arrErrors = $validation->getErrors();
            }
        }

        $this->_data['title'] = "Ajouter un héros";
        $this->_data['arrErrors'] = $arrErrors;
        $this->_data['form_open'] = form_open('/SuperHeroesListController/addHero');
        $this->_data['label_name'] = form_label("Nom", "Name",["class" => "col-sm-2 col-form-label"]);
        $this->_data['form_name'] = form_input("Name", "", "class=form-control");
        $this->_data['label_alterego'] = form_label("Alter-Ego", "AlterEgo",["class" => "col-sm-2 col-form-label"]);
        $this->_data['form_alterego'] = form_input("AlterEgo", "", "class=form-control");
        $this->_data['label_aliases'] = form_label("Alias", "Aliases",["class" => "col-sm-2 col-form-label"]);
        $this->_data['form_aliases'] = form_input("Aliases", "", "class=form-control");
        $this->_data['label_placeofbirth'] = form_label("Lieu de Naissance", "PlaceOfBirth",["class" => "col-sm-2 col-form-label"]);
        $this->_data['form_placeofbirth'] = form_input("PlaceOfBirth", "", "class=form-control");
        $this->_data['label_firstappearance'] = form_label("Première Apparition", "FirstAppearance",["class" => "col-sm-2 col-form-label"]);
        $this->_data['form_firstappearance'] = form_input("FirstAppearance", "", "class=form-control");
        $this->_data['label_alignment'] = form_label("Alignement", "Alignment",["class" => "col-sm-2 col-form-label"]);
        $this->_data['options'] = array('good' => 'Good','bad' => 'Bad','neutral' => 'Neutral');
        $this->_data['form_alignment'] = form_dropdown("Alignment", $this->_data['options'], 'good', "id='Alignment'");
        $this->_data['label_imagelink'] = form_label("Lien de l'Image", "ImageLink", ["class" => "col-sm-2 col-form-label"]);
        $this->_data['form_imagelink'] = form_input("ImageLink", "", "class=form-control");
        $this->_data['form_submit'] = form_submit("submit", "Envoyer","class= btn-primary");
        $this->_data['form_close'] = form_close();
        $this->display('addhero.tpl');
    }

    public function deleteHero()
    {
        $objSuperHeroModel = new SuperHeroes_model();
        $objSuperHeroModel->delete($_POST['id']);
        return redirect()->to('/SuperHeroesListController');
    }

    public function getForm ($IdSuperHero){
        helper('form');
        $objSuperHeroModel = new SuperHeroes_model();
        $objSuperHero = new SuperHeroes_entity();
        //$data['arrSuperHeroes'] = $objSuperHeroModel->find($_POST['id']);

        $data['title'] = "Modifier un Super-Hero";

        //var_dump($IdSuperHero);die;
        $objSuperHero = $objSuperHeroModel->find($IdSuperHero);

        // Il faut charger la librairie
        $validation =  \Config\Services::validation();

        // On donne des règles de validation
        $validation->setRules([
            'Name' => [
                'label'  => 'Nom du Super-Héros',
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Le {field} est obligatoire',
                ],
            ]
        ]);
        $arrErrors = array();
        // Le formulaire a été envoyé ?
        if (count($this->request->getPost()) > 0){
            $objSuperHero->fill($this->request->getPost());
            //on teste la validation du formulaire sur les données
            if ($validation->run($this->request->getPost())){
                // On sauvegarde l'objet
                $objSuperHeroModel->save($objSuperHero);
                // redirection vers l'action par défaut du controller Product
                return redirect()->to('/SuperHeroesListController');
            }else{
                // on récupère les erreurs pour les afficher
                $arrErrors = $validation->getErrors();
            }
        }

        $this->_data['title'] = "Ajouter un héros";
        $this->_data['arrErrors'] = $arrErrors;
        $this->_data['form_open'] = form_open("SuperHeroesListController/getForm/".$IdSuperHero);
        $this->_data['form_id'] = form_hidden("IdSuperHero", $objSuperHero->IdSuperHero??'', "id='IdSuperHero'");
        $this->_data['label_name'] = form_label("Nom", "Name",["class" => "col-sm-2 col-form-label"]);
        $this->_data['form_name'] = form_input("Name", $objSuperHero->Name??'', "class=form-control");
        $this->_data['label_alterego'] = form_label("Alter-Ego", "AlterEgo",["class" => "col-sm-2 col-form-label"]);
        $this->_data['form_alterego'] = form_input("AlterEgo", $objSuperHero->AlterEgo??'', "class=form-control");
        $this->_data['label_aliases'] = form_label("Alias", "Aliases",["class" => "col-sm-2 col-form-label"]);
        $this->_data['form_aliases'] = form_input("Aliases", $objSuperHero->Aliases??'', "class=form-control");
        $this->_data['label_placeofbirth'] = form_label("Lieu de Naissance", "PlaceOfBirth",["class" => "col-sm-2 col-form-label"]);
        $this->_data['form_placeofbirth'] = form_input("PlaceOfBirth", $objSuperHero->PlaceOfBirth??'', "class=form-control");
        $this->_data['label_firstappearance'] = form_label("Première Apparition", "FirstAppearance",["class" => "col-sm-2 col-form-label"]);
        $this->_data['form_firstappearance'] = form_input("FirstAppearance", $objSuperHero->FirstAppearance??'', "class=form-control");
        $this->_data['label_alignment'] = form_label("Alignement", "Alignment",["class" => "col-sm-2 col-form-label"]);
        $this->_data['options'] = array('good' => 'Good','bad' => 'Bad','neutral' => 'Neutral');
        $this->_data['form_alignment'] = form_dropdown("Alignment", $this->_data['options'], $objSuperHero->Alignment??'', "id='Alignment'");
        $this->_data['label_imagelink'] = form_label("Lien de l'Image", "ImageLink", ["class" => "col-sm-2 col-form-label"]);
        $this->_data['form_imagelink'] = form_input("ImageLink", "", "class=form-control");
        $this->_data['form_submit'] = form_submit("submit", "Envoyer","class= btn-primary");
        $this->_data['form_close'] = form_close();
        $this->display('EditHero.tpl');

    }

    public function goToForm(){
        $this->getForm($_POST['id']);
    }
}