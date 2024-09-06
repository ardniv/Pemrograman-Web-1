<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;

class HomeController extends Controller
{
    //
    public function index()
    {
        $users = User::count();
        $products = Product::count();
        return view('admins.dashboard', compact('users','products'));

    }
}
