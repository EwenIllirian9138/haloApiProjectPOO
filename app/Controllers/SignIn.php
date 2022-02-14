<?php

namespace App\Controllers;

use App\Entities\User_entity;
use App\Models\User_model;
use CodeIgniter\Controller;

Class SignIn extends Controller
{
    public function index()
    {
        helper('form');

        $data['title'] = "Inscription";

        $validation = \Config\Services::validation();

        $validation->setRule('EMail', 'Email', 'required');
        $validation->setRule('UserName', "Nom d'Utilisateur", 'required');
        $validation->setRule('Password', 'Mot de Passe', 'required');

        $arrErrors = array();
        if (count($this->request->getPost()) > 0){
            if ($validation->run($this->request->getPost())) {
                $objNewUserModel = new User_model();
                $objNewUser = new User_entity();
                $objNewUser->fill($this->request->getPost());
                $objNewUserModel->save($objNewUser);
                return redirect()->to('/Homepage');
            }
            else {
                $arrErrors = $validation->getErrors();
            }
        }
        $data['arrErrors'] = $arrErrors;

        $data['form_open'] = form_open("SignIn");
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