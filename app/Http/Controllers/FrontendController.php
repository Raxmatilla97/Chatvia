<?php

namespace App\Http\Controllers;

use App\Models\Spikerlar;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $spikers = Spikerlar::all();
        return view('home.index2')->with('spikers', $spikers);;
    }
}
