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

     .product-details{
		margin-bottom: 10%;
    }
</style>
<h3 class="text-center">Prekė - {!! $product->title !!}</h3>
<div class="col-md-10 col-md-offset-1 padding-right product-details">
	<div class="product-details product-wrap-to-cart"><!--product-details-->
		<div class="col-sm-5">
			<div class="view-product product-item">
				{{--*/ $image = $product->images->first() /*--}}
				<div class="product-image imgtocart" style="background-image: url('/{!! $image->image_thumbnail_path.$image->image_thumbnail_name !!}');"></div>

			</div>

			<div id="similar-product" class="carousel slide" data-ride="carousel">
			  	<!-- Wrapper for slides -->
			    <div class="carousel-inner">
				    {{--*/ $isFirst = true /*--}}
				    {{--*/ $counter = 1 /*--}}
				    {{--*/ $counter2 = 1 /*--}}
				    {{--*/ $imageCount = count($product->images) /*--}}
				    @foreach($product->images as $image)
				    	@if($counter > 3)
				    	{{--*/ $counter = 1 /*--}}
				    	@endif

				    	@if($counter == 1)
				    		@if($isFirst)
								<div class="item active" style="margin-left:15px;">
				    			{{--*/ $isFirst = false /*--}}
				    		@else
				    			<div class="item" style="margin-left:15px;">
				    		@endif
				    	@endif
						<a href="">
						<img src="/{!! $image->image_thumbnail_path.$image->image_thumbnail_name !!}" width="85px" height="85px" alt=""></a>


						@if($counter == 3 || $counter2 == $imageCount)
							</div>						
				    	@endif
				    	{{--*/ $counter++ /*--}}
				    	{{--*/ $counter2++ /*--}}
			    	@endforeach
				</div>

				<!-- Controls -->
				<a class="left item-control" href="#similar-product" data-slide="prev">
					<i class="fa fa-angle-left"></i>
				</a>
				<a class="right item-control" href="#similar-product" data-slide="next">
					<i class="fa fa-angle-right"></i>
				</a>
			</div>
		</div>
		
		<div class="col-sm-7">
			<div class="product-information" style="word-break: break-all;"><!--/product-information-->
				<h2>{!! $product->title !!}</h2>

				<p>
					<b>Liko prekių:</b>
					@if($product->stock > 0)
					{!! $product->stock !!}
					@else
					Prekių nėra
					@endif
				</p>

				<span>
					<span>{!! number_format($product->price,2) !!}</span>
					<label>Kiekis:</label>

					<input type="text" name="quantity" v-model="quantity" value="1" style="display: inline;" />
				
					<button style="display: inline;" class="btn btn-default add-to-cart" v-on:click="postToCart({{ $product }}, quantity)" type="button">
        			<i class="fa fa-shopping-cart"></i> Pridėti į krepšelį</button>

				</span>

					<p>{!! $product->description !!}</p>

				

				<p><b>Kategorija:</b> {!! $product->category->title !!}</p>
				<p><b>Prekinis ženklas:</b> {!! $product->brand->title !!}</p>
				
			</div><!--/product-information-->
		</div>
	</div><!--/product-details-->
</div>
@endsection