<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Order;
use App\OrderProduct;
use App\Http\Requests;
use Illuminate\Support\Facades\App;
use App\Billing;

class UsersController extends Controller
{
    public function profile($id)
    {
    	$orders = Order::where('user_id', '=', $id)->get();

        $billing = App::make('Billing\BillingInterface');

        $class = get_class($billing);

        dd($class);


    	// foreach ($orders as $order) {
    	// 	foreach ($order->order_products as $order_product) {
    	// 		//dd($order_product->products->images);
    	// 		$prd = $order_product->products;
    	// 		foreach ($prd->images as $image) {
    	// 			dd($image);
    	// 		}
    	// 	}
    	// }
    	return view('pages.user.profile', compact('orders'));
    }
}
