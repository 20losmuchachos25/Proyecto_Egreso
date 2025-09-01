<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelocomeAdminController extends Controller
{
    public function WelcomeAdmin()
    {
        return view('WelcomeAdmin');
    }
}
