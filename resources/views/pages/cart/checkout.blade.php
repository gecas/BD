@extends('layout')

@section('content')
<style >

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

<div class="container">
@if(! Auth::user())

  <div class="col-md-6" style="border:1px solid #e3e3e3; margin:15px 5px;">
    <h3 class="text-center">Pirkti neprisiregistravus</h3>
    <p class="text-center">
      <a href="/cart/checkout/guest" class="btn normal-btn">Tęsti <i class="fa fa-arrow-right"></i></a>
    </p>
  </div>

  <div class="col-md-5" style="border:1px solid #e3e3e3; margin:15px 5px;">
    @if(Auth::user())
    <h3 class="text-center">Pirkti kaip {{ Auth::user()->name }}</h3>
    <p class="text-center">
      <a href="/cart/checkout/confirm" class="btn normal-btn">Tęsti <i class="fa fa-arrow-right"></i></a>
    </p>
    @else
    <h3 class="text-center">Prisijungti</h3>
    @include('partials.login_form')
    @endif
  </div>
@else
  <div class="col-md-12" style="border:1px solid #e3e3e3; margin:15px 5px;">
    @if(Auth::user())
    <h3 class="text-center">Pirkti kaip {{ Auth::user()->name }}</h3>
    <p class="text-center">
      <a href="/cart/checkout/confirm" class="btn normal-btn">Tęsti <i class="fa fa-arrow-right"></i></a>
    </p>
    @else
    <h3 class="text-center">Prisijungti</h3>
    @include('partials.login_form')
    @endif
  </div>
 @endif 
</div>

@endsection