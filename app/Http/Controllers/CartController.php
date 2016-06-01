<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Order;
use Session;
use Illuminate\Support\Facades\App;
use App\Http\Requests;
use Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $products = $this->getProducts();

        return view('pages.cart.show', compact('products'));
    }

    public function cartAjax()
    {
        return response()->json($this->getProducts());
    }

    private function getProducts(){
        if(count(Session::get('cart.items')) > 0){
            $products = Product::find(array_keys(Session::get('cart.items')))->load('images');
        }else{
            $products = array();
        }
        return $products;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function cart($id, Request $request){
        $product_id = $id;
        $quantity = $request->quantity;

        if ($product_id) {
            if (Session::has('cart.items.'.$product_id)) {
                Session::set('cart.items.'.$product_id, Session::get('cart.items.'.$product_id)+$quantity);
            }else{

                 Session::set('cart.items.'.$product_id, $quantity);
            }
        }
        
        $count = $this->getCount();
        $total = $this->getTotal();

        return response()->json(array("count" => $count, "total" => $total));
       // return Session::get('cart.items');
    }

    public function countCart()
    {
        $count = $this->getCount();
        $total = $this->getTotal();

        return response()->json(array("count" => $count, "total" => $total));
    }

    public function removeFromCart($id)
    {
        Session::forget('cart.items.'.$id);
        return redirect()->back();
    }

    public function editCart(Request $request)
    {
        Session::set('cart.items.'.$request->id, $request->count);

        $count = $this->getCount();
        $total = $this->getTotal();

        return response()->json(array("count" => $count, "total" => $total));
    }

    private function getTotal()
    {
        if(Session::get('cart.items')){
            $products = Product::find(array_keys(Session::get('cart.items')))->load('images');
        }else{
            $products = array();
        }
        $total = 0;
        foreach ($products as $product) {
            $total += number_format($product->price, 2) * number_format(Session::get("cart.items.".$product->id),2);
        }

        return $total;
    }

    private function getCount()
    {
        $ses = Session::get('cart.items');

        $count = 0;
        if($ses){
            foreach($ses as $c){
                $count += $c;
            }
        }

        return $count;
    }

    public function checkout()
    {
        return view('pages.cart.checkout');
    }

    public function guestCheckout()
    {
        return view('pages.cart.guestCheckout');
    }

    public function confirmCheckout(Request $request)
    {

        $total = $this->getCheckoutInfo()["total"];
        $products = $this->getCheckoutInfo()["products"]; 


        return view('pages.cart.confirmCheckout', compact('products', 'total'));
    }

    public function postCheckout(Request $request)
    {
           //$billing = \App::make(Billing\BillingInterface::class);
           $billing = App::make('Billing\BillingInterface');

           //$card = App::make(BillingInterface::class);

           $total = $this->getCheckoutInfo()["total"];

           $products = $this->getCheckoutInfo()["products"];

            try
            {

            $customerId = $billing->charge([
                'email' => $request->email,
                'amount'=> $total,
                'token' => $request->stripeToken
            ]);

            $user = Auth::user();
            $user->billing_id = $customerId;
            $user->save();

            $order = Order::create(['user_id'=>$user->id]);

            foreach ($products as $product) {

            $quantity = Session::get('cart.items.'.$product->id);
                //$product_id = $product->id;

            $order->order_products()->create(['order_id'=>$order->id,'product_id'=>$product->id, 'quantity'=>$quantity]);
            }


            $products = Session::pull('cart.items');

            flash()->success('', 'Apmokėta!');

            return redirect('/');
            }
            catch (Exception $e)
            {

                return redirect()->back()->withFlashMessage($e->getMessage());
            }
    }

    private function getCheckoutInfo()
    {
        if(Session::get('cart.items')){
            $products = Product::find(array_keys(Session::get('cart.items')))->load('images');
        }else{
            $products = array();
        }
        $total = 0;

        foreach ($products as $product) {

            $total += number_format($product->price, 2) * number_format(Session::get("cart.items.".$product->id),2);

            //$quantity = Session::get("cart.items.".$product->id);

        }

        return array('products' => $products, 'total' => $total);
    }
}
