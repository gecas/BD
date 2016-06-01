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
    tr.collapse-tr{
        cursor: pointer;
    }
</style>
<div class="table-responsive container">
  <h3 class="text-center">Vartotojo užsakymai</h3>

<table class="table table-bordered">

    <thead>
        <tr class="info">
            <th>Nr. #</th>
            <th>Užsakymo data</th>
            <th>Visa kaina</th>
        </tr>
    </thead>

    @if($orders)
        {{--*/ $k = 0 /*--}}
        @foreach($orders as $order)
            {{--*/ $k ++ /*--}}
            
            <tbody>
            {{--*/ $i = 0 /*--}}
                
                
            <tr class="active collapse-tr">
                {{--*/ $i ++ /*--}}
                {{--*/ $total = 0; /*--}}
                {{--*/ $tmp_order_products = $order->order_products /*--}}
                @foreach($tmp_order_products as $order_product)
                    {{--*/ $product = $order_product->products /*--}}
                    {{--*/ $total += number_format($order_product->quantity, 2) * number_format($product->price,2) /*--}}
                @endforeach
                <th scope="row">{!! $k !!}</th>
                <th>{!! $order->created_at->format('Y-m-d H:i') !!}</th>
                <th>{{ $total }} € <span class="glyphicon glyphicon-chevron-down"></span></th>
            </tr>
        
        <tr class="collapsed-item hidden">
            <td colspan="4">
                <table class="table table-bordered" style="margin: 0">
                    <thead>

                        <tr class="info">
                            <th>#</th>
                            <th>Pavadinimas</th>
                            <th>Kaina</th>
                            <th>Kiekis</th>
                            <th>Nuotrauka</th>
                            <th>Pirkimo data</th>
                        </tr>
                    </thead>
                    
                    {{--*/ $i = 0 /*--}}
                    @foreach($tmp_order_products as $order_product)
                    {{--*/ $product = $order_product->products /*--}}
                    {{--*/ $i ++ /*--}}                    
                    <tbody class="table-body">
                    <input type="hidden" class="total" value="{{ $total }}">
                        <tr>
                            <td>{!! $i !!}</td>
                            <td>{!! $product->title !!}</td>
                            <td>{!! $product->price !!}</td>
                            <td>{!! $order_product->quantity !!}</td>
                            {{--*/ $image = $product->images->first() /*--}}
                            <td><div style="background-image: url('/{!! $image->image_path.$image->image_name !!}'); width: 100px;height: 100px;background-size: cover;"></div></td>
                            <td>{!! $order_product->created_at->format('Y-m-d H:i') !!}</td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </td>
        </tr>

    </tbody>
    @endforeach

    @else
    <tr>
    <td colspan="6">
    <div class="col-md-12">
    <p class="text-center">Krepšelyje produktų nėra</p>
    </div>
    </td>
    </tr>
    @endif

    
</table>


</div>

<script src="https://code.jquery.com/jquery-2.2.2.js"></script>
<script>
    $(document).ready(function() {
        var body = $(".table-body").find(".total").length;
        console.log(body);
        
    });
    $(document).on('click', '.collapse-tr', function(event) {
        $(this).find(".glyphicon").toggleClass('glyphicon-chevron-down glyphicon-chevron-up');
        //$(this).find('.hidden').show(500);
        $(this).parent().find("tr.collapsed-item").toggleClass('hidden');
    });
</script>


@endsection