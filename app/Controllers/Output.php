<?php

namespace App\Controllers;

use App\Models\InputModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Output extends BaseController
{
    public function index()
    {
        return view('output');
    }
    
}
