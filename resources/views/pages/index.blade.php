@extends('layout')

@section('content')
<style type="text/css">
    .product-image{
        width: 250px;
        background-size: cover;
        background-position: center center;
        display: table;
        margin:auto;
    }

</style>
@foreach($products as $product)
<div class="col-sm-4 " id="products">
    <div class="product-image-wrapper">
        <div class="single-products items">
            <div class="productinfo text-center product-wrap-to-cart">

                  
                    <div class="imgtocart">
                    <img src="{{ $product->images[0]->image_thumbnail_path.$product->images[0]->image_thumbnail_name }}" width="200px; height="200px;" " />
                    </div>
                    
                        <h2>{{ $product->price }} €</h2>
                        <p><a href="/prekes/{{ $product->slug }}">{{ $product->title }}</a></p>
                        <button class="btn btn-default add-to-cart" v-on:click="postToCart({{ $product }},1)" type="button">
                        <i class="fa fa-shopping-cart"></i> Į krepšelį</button>
    </div>
            
        </div>
        <!-- <div class="choose">
            <ul class="nav nav-pills nav-justified">
                <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
            </ul>
        </div> -->
    </div>
</div>
@endforeach


   



@endsection