<?php

namespace App\Controllers;

use App\Entities\User_entity;
use App\Models\User_model;
use CodeIgniter\Controller;
use App\Controllers\BaseController;

Class LogIn extends BaseController
{
    public function index(){}


    public function signIn()
    {
        helper('form');

        $this->_data['title'] = "Inscription";

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
                $arrUser = $objNewUserModel->findAll();
                $problemDetected = false;
                foreach($arrUser as $strUser)
                {
                    if(strlen($objNewUser->Password) < 8)
                    {
                        $arrErrors[0] = "Mot de Passe trop court";
                        $problemDetected = true;
                    }
                    if($objNewUser->UserName == $strUser->UserName)
                    {
                        $arrErrors[0] = "Ce nom d'utilisateur est déjà utilisé";
                        $problemDetected = true;
                    }
                    if($objNewUser->EMail == $strUser->EMail)
                    {
                        $arrErrors[0] = "Un compte à déjà été enregistré avec cet e-mail";
                        $problemDetected = true;
                    }
                }
                if ($problemDetected == false){
                    $objNewUserModel->save($objNewUser);
                    return redirect()->to('/Homepage');
                }

            }
            else {
                $arrErrors = $validation->getErrors();
            }
        }
        $this->_data['arrErrors'] = $arrErrors;

        $this->_data['form_open'] = form_open(site_url('/LogIn/signIn'));
        $this->_data['label_email'] = form_label("Email", "EMail");
        $this->_data['form_email'] = form_input("EMail", "", "id='EMail'");
        $this->_data['label_username'] = form_label("Nom d'Utilisateur", "UserName");
        $this->_data['form_username'] = form_input("UserName", "", "id='UserName'");
        $this->_data['label_password'] = form_label("Mot de Passe", "Password");
        $this->_data['form_password'] = form_input("Password", "", "id='Password'");
        $this->_data['form_submit'] = form_submit("submit", "Envoyer");
        $this->_data['form_close'] = form_close();
        //echo view('signin_view.php', $this->_data);
        $this->display( 'signin.tpl');
    }

    public function signUp()
    {
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
                    $UserInfo = ['UserName' => $isUser[0]->UserName, 'IsLoggedIn' => true];
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

        $this->_data['title'] = "Se Connecter";
        $this->_data['arrErrors'] = $arrErrors;
        $this->_data['form_open'] = form_open(site_url('/LogIn/signUp'));
        $this->_data['label_email'] = form_label("Email", "EMail");
        $this->_data['form_email'] = form_input("EMail", "", "id='EMail'");
        $this->_data['label_password'] = form_label("Mot de Passe","Password");
        $this->_data['form_password'] = form_input("Password", "", "id='Password'", 'password');
        $this->_data['form_submit'] = form_submit("submit", "Envoyer");
        $this->_data['form_close'] = form_close();
        //echo view('signup_view.php', $data);
        $this->display( 'signup.tpl');
    }

    public function logOut()
    {
        $this->session->destroy();
        return redirect()->to('/Homepage');
    }
}
?>