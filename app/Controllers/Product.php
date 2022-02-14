<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Product_model;

class Product extends Controller
{
    public function index()
    {
        // Instanciation du modèle
        $objProductModel       = new Product_model();
        // On fournit les variables pour la vue
        $data['title']          = "Liste des produits"; // titre
        $data['arrProducts']   = $objProductModel->findAll(); // liste de tous les produits
        // Affichage de la vue
        echo view('product_list',$data);
    }

    public function add(){
        helper('form'); // Déclare l'utilisation du helper

        $data['title']          = "Ajouter un produit";
        $data['form_open']      = form_open("product/add");
        $data['label_name']     = form_label("Nom", "product_name");
        $data['form_name']      = form_input("product_name", "", "id='product_name'");
        $data['label_price']    = form_label("Prix", "product_price");
        $data['form_price']     = form_input("product_price", "", "id='product_price'");
        $data['form_submit']    = form_submit("submit", "Envoyer");
        $data['form_close']     = form_close();
        echo view('product_add', $data);
    }
}

