<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SheetController extends Controller
{


    public function index()
    {
        return view('Home.index');
    }
}
