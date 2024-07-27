<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddPlot;
class Visitor1Controller extends Controller
{
    public function home(){

        return view('visitor1.content.home');
    }
    public function plot(){
        $plots = AddPlot::all();
        return view('visitor1.content.plot', compact('plots'));
    }
    public function discount(){
        $plots = AddPlot::all();
        return view('visitor1.content.discount', compact('plots'));
    }
    public function contact(){
        return view('visitor1.content.contact');
    }
}
