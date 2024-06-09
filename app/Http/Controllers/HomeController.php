<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        if (Auth::check() && Auth::user()->userrole == 'admin') {
            return redirect()->route('admin.dashboard');
        } else {
            $products = Product::latest()->paginate(6)->withQueryString();
            return view('home', compact('products'));
        }
    }
}
