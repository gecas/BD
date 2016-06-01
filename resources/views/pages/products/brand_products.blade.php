@extends('layout')

@section('content')
<style>
    .product-image{
        height: 85px;
        width: 85px;
        background-size: cover;
        background-position: center center;
        display: table;
        margin:auto;
    }
    .brand-products{
    	margin:5 0 25px 0;
    }
</style>
<h3 class="text-center">Prekės pagal ženklą - {!! $product->title !!}</h3>
<div class="md-col-12 brand-products">
	@if(count($product->products) > 0)
    @foreach($product->products as $prod)
	<div class="col-md-4">
	
        <div class="single-products items">
        
            <div class="productinfo text-center product-wrap-to-cart">
            	
				{{--*/ $image = $prod->images->first() /*--}}
		 			<div class="product-image imgtocart" style="background-image: url('/{!! $image->image_thumbnail_path.$image->image_thumbnail_name !!}');"></div>
                    
		                <h2>{!! number_format($prod->price,2) !!} €</h2>
		                <p><a href="/prekes/{!! $prod->slug !!}">{!! $prod->title !!}</a></p>
		                <button class="btn btn-default add-to-cart"
		                 v-on:click="postToCart({{ $prod }}, 1)" type="button">
                         <i class="fa fa-shopping-cart"></i> Į krepšelį</button>
				   	 </div> 
				  </div>
		    </div> 
		    @endforeach
		    @else
			<h3 class="text-center">Prekių pagal šį prekinį ženklą nėra</h3>
		    @endif


	</div>

@endsection