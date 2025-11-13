<?php

namespace App\Controllers;

class Cv extends BaseController
{
    public function index()
    {
        // Contoh load view CV, sesuaikan dengan yang dibuat
        return view('cv_view');
    }
}