@extends('admin')

@section('admin_content')

<div class="table-responsive">
	<h3 class="text-center">Kategorijos</h3>
	<p class="text-center">
		<a href="/dashboard/categories/create" class="btn btn-warning">Sukurti kategoriją</a>
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
		
        @foreach($categories as $category)
        {{--*/ $i++; /*--}}
        
          <tr>
         
            <th scope="row">{!! $i !!}</th>
       
            <td>{!! $category->title !!}</td> 
            <td>
            <i class="fa fa-pencil-square-o"></i>
            <a href="/dashboard/categories/{!! $category->id !!}/edit">Redaguoti</a>
            </td>
            <td><button class="btn btn-danger" data-toggle="modal" data-target="#myCategoryDeleteModal" category-id="{!! $category->id !!}">Ištrinti</button></td>
         </tr>
         @endforeach
           
        </tbody>

  </table>
  {!! $categories->render() !!}

</div>


<!-- Modal -->
<div id="myCategoryDeleteModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ištrinti kategoriją</h4>
      </div>
      <div class="modal-body">
      <p class="text-center">Ar tikrai norite ištrinti kategoriją ? </p>
      </div>
      <div class="modal-footer">
      <form action="" id="modal-category-delete-form" method="POST">
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