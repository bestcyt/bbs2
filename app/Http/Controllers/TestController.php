<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    const MY_ARR=['a','b','c'];

    public function index(){
        dd(self::MY_ARR);
    }
}
