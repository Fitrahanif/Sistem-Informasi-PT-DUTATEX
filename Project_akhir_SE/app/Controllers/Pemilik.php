<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Pemilik extends BaseController
{
    public function index()
    {
        return view('main/pemilik');
    }
}
