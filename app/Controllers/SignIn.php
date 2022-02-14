<?php

namespace App\Controllers;

use CodeIgniter\Controller;

Class SignIn extends Controller
{
    public function index()
    {
        $objNewUserModel = new User_Model();

        helper('form');

        $data['title'] = "Inscription";
        $data['form_open'] = form_open("halo/SignIn");
        $data['label_email'] = form_label("Email", "EMail");
        $data['form_email'] = form_input("EMail", "", "id='EMail'");
        $data['label_username'] = form_label("Nom d'Utilisateur", "UserName");
        $data['form_username'] = form_input("UserName", "", "id='UserName'");
        $data['label_password'] = form_label("Mot de Passe", "Password");
        $data['form_password'] = form_input("Password", "", "id='Password'");
        $data['form_submit'] = form_submit("submit", "Envoyer");
        $data['form_close'] = form_close();
        echo view('signin_view.php', $data);
    }
}