<?php 

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class PracticeController  extends Controller 
{
    public function index() 
    {
        $names = Name::all();

        return view('practice.index', compact('names'));

    }
}