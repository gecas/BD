@extends('layout')

@section('content')
<style type="text/css">
	.remove-from-cart{
		color:red;
		font-size:25px;

	}
	.remove-from-cart:hover{
		cursor: pointer;
	}
	.normal-btn{
		background-color:#e3e3e3; 
		border:0 none;
		border-radius: 0;
	}
	.normal-btn:hover{
		background-color: #FE980F;
		color:#fff;
	}
</style>
<div class="table-responsive container">
  <h3 class="text-center">Prekės</h3>
  <table class="table table-striped table-hover" id="coaches-list-table">
    <div class="col-md-8 col-md-offset-1">
   
    </div>
    <thead>
      <tr>
        <th>#</th>
        <th>Pavadinimas</th>
        <th>Kaina</th>
        <th>Kiekis</th>
        <th>Nuotrauka</th>
        <th>Ištrinti</th>
      </tr>
    </thead>
    <tbody>
    {{--*/ $i = 0 /*--}}
    	@if($products)
    	@foreach($products as $product)
    	<tr>
    	{{--*/ $i ++ /*--}}
			<th scope="row">{!! $i !!}</th>
			<td>{!! $product->title !!}</td>
			<td><span class="price">€{{ number_format($product->price , 2) }}</span></td>
			
			<td><input type="number" min="0" name="product_count[{{ $product->id }}]" v-model="product_count[{{ $product->id }}]"  v-on:change="editCart({{ $product->id }}, product_count[{{ $product->id }}])" class="form-control" value="{{ \Session::get("cart.items.".$product->id) }}" style="width:75px;" />
			</td>
			<td><div style="background-image: url('/{!! $product->images[0]->image_thumbnail_path.$product->images[0]->image_thumbnail_name !!}'); width: 50px; height: 50px; background-size: cover;"></div></td>
			<td><i class="fa fa-times remove-from-cart" data-toggle="modal" data-target="#myCartProductDeleteModal" product-id="{!! $product->id !!}"></i></td>
			</tr>
			
    	@endforeach
    	<tr>
    	<td colspan="6">
    	<div class="col-md-11">
    		<p class="text-right"><b>Galutinė kaina : @{{ total | currency '€ ' }}</b></p>
    	</div>
    	</td>
        </tr>
        <tr>
        	<td colspan="6">
    	<div class="col-md-10">
    	<p class="text-right">
    		<a href="cart/checkout" class="btn btn-default normal-btn"><i class="fa fa-shopping-basket"></i> Tęsti pirkimą</a>
    	</p>
    	</div>
    	</td>
        </tr>
    	
    	@else
    	<tr>
    	<td colspan="6">
    	<div class="col-md-12">
    	<p class="text-center">Krepšelyje produktų nėra</p>
		</div>
		</td>
		</tr>
    	@endif
    	
    </tbody>
  </table>
</div>


<!-- Modal -->
<div id="myCartProductDeleteModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ištrinti produktą</h4>
      </div>
      <div class="modal-body">
      <p class="text-center">Ar tikrai norite ištrinti produktą ? </p>
      </div>
      <div class="modal-footer">
      <form action="" id="modal-cart-product-delete-form" method="POST">
      {{ csrf_field() }}
     <button type="submit" class="btn btn-danger">Ištrinti</button>
      <button type="button" class="btn btn-default" data-dismiss="modal">Uždaryti</button>
        </form>
      </div>
    </div>

  </div>
</div>
@endsection