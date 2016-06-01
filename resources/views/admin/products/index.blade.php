@extends('admin')

@section('admin_content')

<div class="table-responsive">
	<h3 class="text-center">Products</h3>
	<p class="text-center">
		<a href="/dashboard/products/create" class="btn btn-warning">Sukurti prekę</a>
	</p>
  <table class="table table-striped table-hover">
    <thead>
          <tr>
            <th>#</th>
            <th>Pavadinimas</th>
            <th>Kategorija</th>
            <th>Prekinis ženklas</th>
            <th>Kiekis</th>
            <th>Kaina</th>
            <th>Redaguoti</th>
            <th>Ištrinti</th>
          </tr>
        </thead>

        <tbody>
       {{--*/ $i = 0 /*--}}
		
        @foreach($products as $product)
        {{--*/ $i++; /*--}}
        
          <tr>
         
            <th scope="row">{!! $i !!}</th>
       
            <td>{!! $product->title !!}</td>
            <td>{!! $product->category->title !!}</td>
            <td>{!! $product->brand->title !!}</td>
            <td>{!! $product->stock !!}</td>
            <td>{!! $product->price !!} € </td>      
            <td>
            <i class="fa fa-pencil-square-o"></i>
            <a href="/dashboard/products/{!! $product->id !!}/edit">Redaguoti</a>
            </td>
            <td><button class="btn btn-danger" data-toggle="modal" data-target="#myProductDeleteModal" product-id="{!! $product->id !!}">Ištrinti</button></td>
         </tr>
         @endforeach
           
        </tbody>

  </table>
  {!! $products->render() !!}

</div>


<!-- Modal -->
<div id="myProductDeleteModal" class="modal fade" role="dialog">
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
      <form action="" id="modal-product-delete-form" method="POST">
      {{ method_field('DELETE') }}
      {{ csrf_field() }}
     <button type="submit" class="btn btn-danger">Ištrinti</button>
      <button type="button" class="btn btn-default" data-dismiss="modal">Uždaryti</button>
        </form>
      </div>
    </div>

  </div>
</div>
@endsection