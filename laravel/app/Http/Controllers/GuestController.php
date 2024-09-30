<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestController extends Controller
{
    /**
     * Show the guest shop.
     *
     * @return \Illuminate\View\View
     */
    public function shop()
    {
        return view('guest.shop');
    }
}