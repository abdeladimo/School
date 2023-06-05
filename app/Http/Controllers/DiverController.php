<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diver;

class DiverController extends Controller
{
    public function index(){
        $divers = Diver::all();
        return view('divers.alldivers',compact('divers'));
    }
}
