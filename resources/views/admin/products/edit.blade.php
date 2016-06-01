@extends('admin')

@section('admin_content')

<div class="container col-md-10 col-md-offset-1">

<h3 class="text-center">Redaguoti įrašą : </h3>


  <form action="/dashboard/products/{!! $product->id !!}/update" method="POST" class="dropzone col-md-8 col-md-offset-2" id="my-dropzone" enctype="multipart/form-data">

  {{ method_field('PUT') }}

	{!! csrf_field() !!}

    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
      <label class="col-md-4 control-label">Pavadinimas :</label>

      <div class="col-md-12">
          <input type="text" class="form-control" name="title" value="{{ $product->title }}">

          @if ($errors->has('title'))
              <span class="help-block">
                  <strong>{{ $errors->first('title') }}</strong>
              </span>
          @endif
      </div>
  </div>

    <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
      <label class="col-md-4 control-label">Kategorija :</label>

      <div class="col-md-12">

          <select name="category_id" id="category_id" class="form-control" >
            @foreach($categories as $category)
              @if($product->category_id == $category->id)
              <option value="{!! $category->id !!}" selected>{!! $category->title !!}</option>
              @else
              <option value="{!! $category->id !!}">{!! $category->title !!}</option>
              @endif
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
      <label class="col-md-4 control-label">Prekinis ženklas :</label>

      <div class="col-md-12">

          <select name="brand_id" class="form-control" >
            @foreach($brands as $brand)
            @if($product->brand_id == $brand->id)
              <option value="{!! $brand->id !!}" selected>{!! $brand->title !!}</option>
              @else
              <option value="{!! $brand->id !!}">{!! $brand->title !!}</option>
              @endif
            @endforeach
          </select>

          @if ($errors->has('brand_id'))
              <span class="help-block">
                  <strong>{{ $errors->first('brand_id') }}</strong>
              </span>
          @endif
      </div>
  </div>

    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
      <label class="col-md-4 control-label">Aprašymas :</label>

      <div class="col-md-12">

          <textarea rows="10" class="form-control" name="description">{{ $product->description }}</textarea>

          @if ($errors->has('description'))
              <span class="help-block">
                  <strong>{{ $errors->first('description') }}</strong>
              </span>
          @endif
      </div>
  </div>

  <div class="form-group{{ $errors->has('stock') ? ' has-error' : '' }}">
      <label class="col-md-4 control-label">Kiekis :</label>

      <div class="col-md-12">

         <input type="number" class="form-control" name="stock" value="{{ $product->stock }}">

          @if ($errors->has('stock'))
              <span class="help-block">
                  <strong>{{ $errors->first('stock') }}</strong>
              </span>
          @endif
      </div>
  </div>

  <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
      <label class="col-md-4 control-label">Kaina :</label>

      <div class="col-md-12">

         <input type="number" class="form-control" name="price" value="{{ $product->price }}">

          @if ($errors->has('price'))
              <span class="help-block">
                  <strong>{{ $errors->first('price') }}</strong>
              </span>
          @endif
      </div>
  </div>

  @if(count($product->images) > 0)
      <div class="form-group">
        <ul class="list-inline">
          @foreach($product->images as $photo)
          <li style="float: left; margin: 10px 0;">
            <div style="background-image: url('/{!! $photo->image_thumbnail_path.$photo->image_thumbnail_name !!}'); background-size:cover; width:70px; height: 70px; display: table; background-position: center center;  "></div>
            <br>
            <label for="product_images_{!! $photo->id !!}">
            <input id="product_images_{!! $photo->id !!}" type="checkbox" name="product_photos[]" value="{!! $photo->id !!}"> Ištrinti</label>
          </li>
         @endforeach
      </ul>
      </div>
    @endif

    <div class="form-group">
      <div class="col-md-12">
	     <div id="dropzonePreview" class="dz-default dz-message" style="cursor: pointer; border:1px solid black;padding:4%;">
	  		<span>Spauskite arba meskite failus čia, norėdami juos įkelt</span><br/>
	  	</div>
   </div>
	</div>

    <div class="form-group">
    <div class="col-md-12">
    <button class="btn btn-primary form-control" id="submit-all" type="button">Redaguoti įrašą</button>
  </div>
    </div>
	
    </form>
</div>

@endsection