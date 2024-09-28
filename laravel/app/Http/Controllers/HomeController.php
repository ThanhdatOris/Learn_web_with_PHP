<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('welcome', [
            'title'=> 'Be Dat',
        ]); // hoặc tên view mà bạn đã tạo
    }
}
