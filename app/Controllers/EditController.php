<?php

namespace App\Controllers;

use App\Entities\SuperHeroes_entity;
use CodeIgniter\Controller;
use App\Models\SuperHeroes_model;


class EditController extends BaseController
{
    public function goToForm(){
        $this->getForm($_POST['id']);
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
        $this->_data['form_open'] = form_open("EditController/getForm/".$IdSuperHero);
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
}