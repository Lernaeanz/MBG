<?php

namespace App\Controllers;

use App\Models\PenerimaModel;
use App\Models\AuthModel;
use App\Models\FeedbackModel;
use App\Models\UserModel;

class Admin extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        helper('session');
    }
    public function getCoordinates()
    {
        $userModel = new \App\Models\UserModel();
        $users = $userModel->where('latitude IS NOT NULL', null, false)
                           ->where('longitude IS NOT NULL', null, false)
                           ->findAll();
    
        return $this->response->setJSON($users);
    }    
}