<?php

namespace App\Controllers;

use App\Models\User_model;
use CodeIgniter\Controller;

Class SignUp extends BaseController
{
    public function index(){

        helper('form');

        $validation = \Config\Services::validation();

        $validation->setRule('EMail','Email', 'required');
        $validation->setRule('Password', 'Mot de Passe', 'required');

        $arrErrors = array();
        if (count($this->request->getPost()) > 0){
            if ($validation->run($this->request->getPost())) {
                $objUserModel = new User_model();
                $isUser = $objUserModel->where('EMail', $this->request->getPost('EMail'))->where('Password', $this->request->getPost('Password'))->findAll(1);
                if (isset($isUser[0])){
                    $UserInfo = ['username' => $this->request->getPost('UserName'), 'IsLoggedIn' => true];
                    $this->session->set($UserInfo);
                    return redirect()->to('/Homepage');

                }else {
                    $arrErrors[0] = "Email ou Mot de Passe incorrect";
                }
            }
            else {
                $arrErrors = $validation->getErrors();
            }
        }

        $data['title'] = "Se Connecter";
        $data['arrErrors'] = $arrErrors;
        $data['form_open'] = form_open("SignUp");
        $data['label_email'] = form_label("Email", "EMail");
        $data['form_email'] = form_input("EMail", "", "id='EMail'");
        $data['label_password'] = form_label("Mot de Passe","Password");
        $data['form_password'] = form_input("Password", "", "id='Password'");
        $data['form_submit'] = form_submit("submit", "Envoyer");
        $data['form_close'] = form_close();
        echo view('signup_view.php', $data);

    }
}