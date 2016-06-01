@extends('admin')

@section('admin_content')

<div class="container col-md-10 col-md-offset-1">

<h3 class="text-center">Sukurti naują įrašą : </h3>


  <form action="/dashboard/products" method="POST" class="dropzone col-md-8 col-md-offset-2" id="my-dropzone" enctype="multipart/form-data">

	{!! csrf_field() !!}

    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
      <label class="col-md-4 control-label">Title</label>

      <div class="col-md-12">
          <input type="text" class="form-control" name="title" value="{{ old('title') }}">

          @if ($errors->has('title'))
              <span class="help-block">
                  <strong>{{ $errors->first('title') }}</strong>
              </span>
          @endif
      </div>
  </div>

    <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
      <label class="col-md-4 control-label">Category</label>

      <div class="col-md-12">

          <select name="category_id" id="category_id" class="form-control" >
            @foreach($categories as $category)
              <option value="{!! $category->id !!}">{!! $category->title !!}</option>
            @endforeach
          </select>

          @if ($errors->has('category_id'))
              <span class="help-block">
                  <strong>{{ $errors->first('category_id') }}</strong>
              </span>
          @endif
      </div>
  </div>

  <div class="form-group{{ $errors->has('brand_id') ? ' has-error' : '' }}">
      <label class="col-md-4 control-label">Brand</label>

      <div class="col-md-12">

          <select name="brand_id" class="form-control" >
            @foreach($brands as $brand)
              <option value="{!! $brand->id !!}">{!! $brand->title !!}</option>
            @endforeach
          </select>

          @if ($errors->has('category_id'))
              <span class="help-block">
                  <strong>{{ $errors->first('category_id') }}</strong>
              </span>
          @endif
      </div>
  </div>

    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
      <label class="col-md-4 control-label">Description</label>

      <div class="col-md-12">

          <textarea rows="10" class="form-control" name="description">{{ old('description') }}</textarea>

          @if ($errors->has('description'))
              <span class="help-block">
                  <strong>{{ $errors->first('description') }}</strong>
              </span>
          @endif
      </div>
  </div>

  <div class="form-group{{ $errors->has('stock') ? ' has-error' : '' }}">
      <label class="col-md-4 control-label">Stock</label>

      <div class="col-md-12">

         <input type="number" class="form-control" name="stock" value="{{ old('stock') }}">

          @if ($errors->has('stock'))
              <span class="help-block">
                  <strong>{{ $errors->first('stock') }}</strong>
              </span>
          @endif
      </div>
  </div>

  <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
      <label class="col-md-4 control-label">Price</label>

      <div class="col-md-12">

         <input type="number" class="form-control" name="price" value="{{ old('price') }}">

          @if ($errors->has('price'))
              <span class="help-block">
                  <strong>{{ $errors->first('price') }}</strong>
              </span>
          @endif
      </div>
  </div>



    <div class="form-group">
      <div class="col-md-12">
	     <div id="dropzonePreview" class="dz-default dz-message" style="cursor: pointer; border:1px solid black;padding:4%;">
	  		<span>Spauskite arba meskite failus čia, norėdami juos įkelt</span><br/>
	  	</div>
   </div>
	</div>

    <div class="form-group">
    <div class="col-md-12">
    <button class="btn btn-primary form-control" id="submit-all" type="button">Sukurti įrašą</button>
  </div>
    </div>
	
    </form>
</div>



@endsection