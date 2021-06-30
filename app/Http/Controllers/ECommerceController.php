<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class ECommerceController extends Controller
{
    public function menu(){
        return view('menu');
    }

}
