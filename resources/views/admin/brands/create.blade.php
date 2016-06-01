@extends('admin')

@section('admin_content')

<div class="container col-md-10 col-md-offset-1">

<h3 class="text-center">Sukurti naują prekinį ženklą: </h3>


  <form action="/dashboard/brands" method="POST" class="col-md-8 col-md-offset-2">

	{!! csrf_field() !!}

    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
      <label class="col-md-4 control-label">Pavadinimas</label>

      <div class="col-md-12">
          <input type="text" class="form-control" name="title" value="{{ old('title') }}">

          @if ($errors->has('title'))
              <span class="help-block">
                  <strong>{{ $errors->first('title') }}</strong>
              </span>
          @endif
      </div>
  </div>

    <div class="form-group">
    <div class="col-md-12" style="margin-top: 15px;">
    <button class="btn btn-warning form-control" type="submit">Sukurti prekinį ženklą</button>
  </div>
    </div>
	
    </form>
</div>



@endsection