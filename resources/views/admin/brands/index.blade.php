@extends('admin')

@section('admin_content')

<div class="table-responsive">
	<h3 class="text-center">Prekiniai ženklai</h3>
	<p class="text-center">
		<a href="/dashboard/brands/create" class="btn btn-warning">Sukurti prekinį ženklą</a>
	</p>
  <table class="table table-striped table-hover">
    <thead>
          <tr>
            <th>#</th>
            <th>Pavadinimas</th>
            <th>Redaguoti</th>
            <th>Ištrinti</th>
          </tr>
        </thead>

        <tbody>
       {{--*/ $i = 0 /*--}}
		
        @foreach($brands as $brand)
        {{--*/ $i++; /*--}}
        
          <tr>
         
            <th scope="row">{!! $i !!}</th>
       
            <td>{!! $brand->title !!}</td> 
            <td>
            <i class="fa fa-pencil-square-o"></i>
            <a href="/dashboard/brands/{!! $brand->id !!}/edit">Redaguoti</a>
            </td>
            <td><button class="btn btn-danger" data-toggle="modal" data-target="#myBrandDeleteModal" brand-id="{!! $brand->id !!}">Ištrinti</button></td>
         </tr>
         @endforeach
           
        </tbody>

  </table>
  {!! $brands->render() !!}

</div>


<!-- Modal -->
<div id="myBrandDeleteModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ištrinti prekinį ženklą</h4>
      </div>
      <div class="modal-body">
      <p class="text-center">Ar tikrai norite ištrinti prekinį ženklą ? </p>
      </div>
      <div class="modal-footer">
      <form action="" id="modal-brand-delete-form" method="POST">
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