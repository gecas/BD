<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Linksniai;
use App\User;
use Auth;
use App\Product;

class PagesController extends Controller
{
    public function index()
    {
    	$products = Product::skip(0)->take(3)->with('images')->get();

    	// chdir(base_path());

    	// $run = exec('php artisan schedule:run');

    	// dd($run);

    	return view('pages.index', compact('products'));
    }

    public function index_products()
    {
    	// $products = Product::random(1)->skip(0)->take(3)->with('images')->get();

     
    }
}
