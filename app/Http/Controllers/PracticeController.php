<?php 

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Name;

class PracticeController  extends Controller 
{
    public function index() 
    {
        $names = Name::all();

        return view('practice.index', compact('names'));

    }
}