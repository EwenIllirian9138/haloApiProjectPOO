<?php
namespace App\Controllers;

use App\Models\SuperHeroes_model;
use CodeIgniter\Controller;
use App\Controllers\BaseController;

Class Homepage extends BaseController
{
    public function index()
    {
        $this->_data['title'] = "Accueil";

        $objNewSuperHeroesModel = new SuperHeroes_model();

        $this->_data['arrNewSuperHeroes'] = $objNewSuperHeroesModel->orderBy('IdSuperHero','desc')->where('Published',1)->findAll();

        //echo view('homepage_view', $data);
        $this->display( 'home.tpl');
    }
}