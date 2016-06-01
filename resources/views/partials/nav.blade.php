<header id="header">

    <nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a style="padding: 20px;" class="navbar-brand" href="#"><img src="/images/home/logo.png" alt="" /></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" style="padding: 20px;" id="bs-example-navbar-collapse-1">
     <ul class="nav navbar-nav">
        <li><a href="/">Pradinis</a></li>
        <li><a href="/products">Prekės</a></li>
        <!-- <li><a href="/kontaktai">Kontaktai</a></li> -->
    </ul>
      <ul class="nav navbar-nav navbar-right">
            @if(Auth::user())
                                
                                @if(Auth::user()->gender == 'man')
                                    <p class="navbar-text">Sveikas, <strong>
                                    {{ $name }} </strong>!</p>
                                @elseif(Auth::user()->gender == 'woman')
                               Moteris <p class="navbar-text">Sveika, {{ $name }}<strong>
                                 </strong>!</p>
                                @else
                                <p class="navbar-text">Labas, <strong> {{ $name }} </strong>!</p>
                                @endif
                                
                                <li><a href="/users/{{ Auth::user()->id }}"><i class="fa fa-user"></i> Mano profilis</a></li>

                                <li><a href="/logout"><i class="fa fa-sign-out"></i>Atsijungti</a></li>
                                @else
                                <li><a href="{{ url('/login') }}"><i class="fa fa-lock"></i> Prisijungti</a></li>
                                <li><a href="{{ url('/register') }}"><i class="fa fa-lock"></i> Registruotis</a></li>
                                @endif
                                <li><a href="/cart" class="shopping-cart"><i class="fa fa-shopping-cart"></i> Krepšelis <span v-if="count > 0">(@{{ count }})</span></a></li>
        
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

</header><!--/header-->