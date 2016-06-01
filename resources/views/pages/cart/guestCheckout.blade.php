@extends('layout')

@section('content')
<style>
    #search-results{
    position:absolute;
    z-index:999;
    background-color:lightgrey;
    margin-top: -8px;
    width: 350px;
    margin-left: 20px;
    max-height: 400px;
    overflow: auto;
    border-left: 1px solid #e3e3e3;
    border-right: 1px solid #e3e3e3;
    border-bottom: 1px solid #e3e3e3;
    display: none;
}
#search-results ul{
    list-style:none;
    padding:0 1%;
}
#search-results ul li{
    word-break: break-word;
    padding:0% 1%;
    border-bottom:1px solid rgba(95,98,97,0.5);
} 
#search-results ul li:nth-child(2n+1){
    background-color:#eee;
}  
#search-results ul li:hover{
    cursor:pointer;
    background-color:#CECECE;
}

</style>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Svečio apsipirkimas</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Vardas :</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Pavardė :</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="lastname" value="{{ old('lastname') }}">

                                @if ($errors->has('lastname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">El. paštas :</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Lytis</label>

                            <div class="col-md-6">
                                <select name="gender">
                                    <option value="man">Vyras</option>
                                    <option value="woman">Moteris</option>
                                    <option value="other">Kita</option>
                                </select>

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Telefonas :</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="phone" value="{{ old('phone') }}">

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Adresas :</label>

                            <div class="col-md-6">

                                <!-- <input type="text" class="form-control" v-model="address" v-on:keyup="getAddress(address)" name="address" value="{{ old('address') }}"> -->

                                <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}">

                                <div id="search-results"></div>

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Slaptažodis : </label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Patvirtinti slaptažodį :</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                       

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>Pirkti
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="/js/jquery.js"></script>
<script>

    $('#address').on("input", function(){
        if( $(this).val().trim().length >= 3){
        var form = $('#address').parent().find('form');

        var address = $(this).val();

        $.ajax({
            type: form.attr('method'),
            url: "https://postit.lt/data/?address="+address,
            data: {_token: "{{ csrf_token() }}"},
            success: function (addresses) {
                console.log(addresses);
                var list = $("#search-results").text(" ");
                    if(addresses.data.length > 0){
                        list.append($("<h4/>").attr('class', 'list-title text-center').text("Adresai"));
                        var ul = $("<ul/>");
                        $.each(addresses.data, function(index, item){

                            var span = $("<span/>").addClass('form-control').text(item.address+","+item.city+","+item.post_code).on('click', function() {
                                        $("#address").val($(this).text());
                                        $("#search-results").hide(500);
                                    });

                            var li = $("<li/>").append(span);
                            //});
                            ul.append(li);
                        });
                        list.append(ul);
                    }

                    if (addresses.data.length == 0) {
                        $("#search-results").text("Rezultatų nerasta");
                    };
            }
        });
        //e.preventDefault();
      }
    });
</script>

<script>
$("#address").on('input', function(event) {
    $("#search-results").slideDown(100);
});

$(document).on('click', function(event) {
    if (($(event.target).parents("#search-results").length == 0)) {
        $("#search-results").slideUp(500);
    };
});
</script>
@endsection
