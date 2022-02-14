<?php

namespace App\Controllers;

Class LogOut extends BaseController
{
    public function index()
    {
        $this->session->destroy();
        return redirect()->to('/Homepage');
    }
}