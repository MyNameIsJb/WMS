<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FallbackController extends Controller
{
    // To render if the url is not existing
    public function __invoke() 
    {
        return view('errors.404');
    }
}
