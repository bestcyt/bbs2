<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TestController extends Controller
{
    //
    const MY_ARR=['a','b','c'];

    public function index(){
        dd(Hash::make('123456'));
    }
}
