<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class Halefekprogram extends BaseController
{
    public function index()
    {
        return view('user/halefekprogram');
    }
}
