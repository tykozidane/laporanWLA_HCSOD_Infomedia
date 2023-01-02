<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class RequestController extends BaseController
{
    public function index()
    {
        //
    }
    public function formsurat()
    {
        return view('requestpage/formsurat');
    }
}
