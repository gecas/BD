@extends('layout')

@section('content')
<style>
    #billing-form input,#billing-form label{
        margin: 5px 0;
    }

    .payment-errors p{
        color:#F44336;
        font-weight: bold;
    }

    .checkout-form{
        display: none;
    }
</style>
<h3 class="text-center">Patvirtinti užsakymą</h3>

<div class="table-responsive container">
  <h3 class="text-center">Prekės</h3>
  <table class="table table-striped table-hover" id="coaches-list-table">
    <div class="col-md-6 col-md-offset-3">
   
    </div>
    <thead>
      <tr>
        <th>#</th>
        <th>Pavadinimas</th>
        <th>Kaina</th>
        <th>Kiekis</th>
        <th>Nuotrauka</th>
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
			<td><span class="price">{{ number_format($product->price , 2) }} €</span></td>
			
			<td>{!! \Session::get("cart.items.".$product->id) !!}</td>
			<td><div style="background-image: url('/{!! $product->images[0]->image_thumbnail_path.$product->images[0]->image_thumbnail_name !!}'); width: 50px; height: 50px; background-size: cover;"></div></td>
			</tr>
			
    	@endforeach
    	<tr>
    	<td colspan="6">
    	<div class="col-md-11">
    		<p class="text-right"><b>Galutinė kaina : {{ number_format($total,2)}} €</b></p>
            <p class="text-right">
                <button class="btn btn-warning checkout-button">Apmokėti</button>
            </p>
    	</div>
    	</td>
        </tr>
        <tr>
        	<td colspan="6">
    	<div class="col-md-12">
    	
    	</div>
    	</td>
        </tr>
        <tr>
        <td colspan="6">
        <div class="col-md-6 col-md-offset-3 checkout-form">
        	<form action="/cart/checkout/pay" method="POST" id="billing-form">
	          {{ csrf_field() }}
        		<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Vardas</label>

                            <div class="col-md-8">
                                <input type="text" class="form-control" name="name" value="{{ Auth::user()->name ? : (old('name')) }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Pavardė</label>

                            <div class="col-md-8">
                                <input type="text" class="form-control" name="lastname" value="{{ Auth::user()->lastname ? : (old('lastname')) }}">

                                @if ($errors->has('lastname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">El. paštas :</label>

                            <div class="col-md-8">
                                <input type="email" class="form-control" name="email" value="{{ Auth::user()->email ? : (old('email')) }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('card-number') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Kortelės numeris :</label>

                            <div class="col-md-8">
                                <input type="text" data-stripe="number" class="form-control" name="card-number" value="">

                                @if ($errors->has('card-number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('card-number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('card-cvc') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">CVC :</label>

                            <div class="col-md-8">
                                <input type="text" data-stripe="cvc" class="form-control" name="card-cvc" value="">

                                @if ($errors->has('card-cvc'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('card-cvc') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('card-exp-year') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Galiojimo laikas :</label>

                            <div class="col-md-8">
                              
                                <select name="card-exp-year" data-stripe="exp-year" style="width:150px !important;">
                                   {{--*/ $year = date("Y") /*--}}
                                    @for ($i = $year; $i < $year+10; $i++)
                                        <option  class="form-control" value="{{ $i }}">{!! $i !!}</option> 
                                    @endfor
                                </select>

                                <select name="card-exp-month" data-stripe="exp-month" style="width:100px !important;">
                                   {{--*/ $month = 1 /*--}}
                                    @for ($i = 1; $i < $month+12; $i++)
                                        @if($i < 10)
                                        <option  class="form-control" value="{{ $i }}">0{!! $i !!}</option> 
                                        @else
                                        <option  class="form-control" value="{{ $i }}">{!! $i !!}</option> 
                                        @endif
                                    @endfor
                                </select>
                                @if ($errors->has('card-exp-year'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('card-exp-year') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        

                        <div class="form-group">
                        	<input type="submit" class="btn btn-warning form-control" value="Pirkti">
                        </div>

                        <div class="payment-errors">
                            <p></p>
                        </div>

                        
                        </div>

        	</form>
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



@endsection