<?php
namespace App\Controllers;

use App\Models\SuperHeroes_model;
use CodeIgniter\Controller;

Class Homepage extends Controller
{
    public function index()
    {
        $data['title'] = "Accueil";

        $objNewSuperHeroesModel = new SuperHeroes_model();

        $data['arrNewSuperHeroes'] = $objNewSuperHeroesModel->orderBy('IdSuperHero','desc')->where('Published',1)->findAll();

        echo view('homepage_view', $data);
    }
}