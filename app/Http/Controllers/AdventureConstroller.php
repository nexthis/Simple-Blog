<?php

namespace App\Http\Controllers;

use App\Adventure;
use Illuminate\Http\Request;

class AdventureConstroller extends Controller
{
    public function index()
    {
        $adventure = Adventure::get();
        return view('adventure.index',compact('adventure'));
    }
    public function show($slug){
        $adventure =  Adventure::where('slug',$slug)->first();
        return view('adventure.show',compact('adventure'));
    }
}
