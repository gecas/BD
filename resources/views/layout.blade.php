<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/prettyPhoto.css" rel="stylesheet">
    <link href="/css/price-range.css" rel="stylesheet">
    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
    <link href="/css/responsive.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Lora&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="/images/ico/apple-touch-icon-57-precomposed.png">
    <link rel="stylesheet" type="text/css" href="/sweetalert/dist/sweetalert.css">

    <meta id="token" name="token" value="{{csrf_token()}}">
    <meta name="publishable-key" content="pk_test_Yqn9lgQfQDJkJmuxToiGm1Ac">

    
    <style type="text/css">
        .flash {
          background: #F6624A;
          color: #fff;
          width: 200px;
          position: fixed;
          right: 20px;
          bottom: 20px;
          padding: 1em;
          display: none;
         }
        .flash::after{
        content: '';
        position: absolute;
        left: -20px;
        top: 5px;
        border-left: 10px solid transparent;
        border-top: 10px solid transparent;
        border-right: 10px solid #F6624A;
        border-bottom: 10px solid transparent;
        } 

        body { padding-top: 150px; width: 100% !important; overflow-x: hidden; }
        </style>
     
</head><!--/head-->

<body>
    @include('partials.nav')

    <section>
        <div class="container">
            <div class="row">

                <div class="col-md-10 col-md-offset-1">
                        @yield('content')
                </div>

                <div class="col-md-3">
                  @include('partials.left-sidebar')  
                </div>
                
                <div class="col-md-9 padding-right">

                    @include('partials.features_items')
                    
                </div>
            </div>
        </div>
    </section>
    
    <footer id="footer"><!--Footer-->
        <div class="footer-top">
            
        </div>
        <!-- 
        <div class="footer-widget">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Service</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Online Help</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">Order Status</a></li>
                                <li><a href="#">Change Location</a></li>
                                <li><a href="#">FAQ’s</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Quock Shop</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">T-Shirt</a></li>
                                <li><a href="#">Mens</a></li>
                                <li><a href="#">Womens</a></li>
                                <li><a href="#">Gift Cards</a></li>
                                <li><a href="#">Shoes</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Policies</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Terms of Use</a></li>
                                <li><a href="#">Privecy Policy</a></li>
                                <li><a href="#">Refund Policy</a></li>
                                <li><a href="#">Billing System</a></li>
                                <li><a href="#">Ticket System</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>About Shopper</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Company Information</a></li>
                                <li><a href="#">Careers</a></li>
                                <li><a href="#">Store Location</a></li>
                                <li><a href="#">Affillate Program</a></li>
                                <li><a href="#">Copyright</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3 col-sm-offset-1">
                        <div class="single-widget">
                            <h2>About Shopper</h2>
                            <form action="#" class="searchform">
                                <input type="text" placeholder="Your email address" />
                                <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                                <p>Get the most recent updates from <br />our site and be updated your self...</p>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
         -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <p class="text-center">© Visos teisės saugomos, 2016 Marius Gečiauskas, MKDf-12/3, VGTU</p>
                </div>
            </div>
        </div>
        
    </footer><!--/Footer-->
  
    <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js'></script>
    <script src="/jquery-ui/jquery-ui.js"></script> 
    <script src="/js/jquery.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/jquery.scrollUp.min.js"></script>
    <script src="/js/price-range.js"></script>
    <script src="/js/jquery.prettyPhoto.js"></script>
    <script src="/js/main.js"></script>
    <script src="https://js.stripe.com/v2/"></script>
    <script src="/js/billing.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.17/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/0.7.0/vue-resource.js"></script>
    <script src="/sweetalert/dist/sweetalert.min.js"></script>
    <script src="/sweetalert/dist/sweetalert-dev.js"></script>
    <script src="/js/vueScript.js"></script>
    

    <script>
  $('#myCartProductDeleteModal').on('show.bs.modal', function (event) {
    var product_id = $(event.relatedTarget).attr("product-id");
    var input = $(this).find("#modal-cart-product-delete-form").attr("action", "/cart/remove/"+product_id);
  });
</script>
<script>
    function showMessage(title, message, type){
            swal({   
                title: title,   
                text: message,   
                type: type,   
                timer:1500,
                showConfirmButton:false
            });
        }

         function flashMessage(message){
             var block = document.createElement("div");
             $(block).addClass("flash").html(message);

             $("body").append(block);

             $(block).fadeIn(1000);
             setTimeout(function(){
                 $(block).fadeOut(1000, function(){
                     $(this).remove();
                 });
             }, 2000);
         }
    </script>

    <script>
    $(document).ready(function(){

        $(".checkout-button").on('click', function(){
            $(".checkout-form").show(1500);
    });
});
</script>

<script>

$(document).on('click','.add-to-cart', function () {
        var cart = $('.shopping-cart');
        var imgtodrag = $(this).parents('.product-wrap-to-cart').find(".imgtocart").eq(0);
        console.log(imgtodrag);
        if (imgtodrag.length > 0) {
            var imgclone = imgtodrag.clone()
                .offset({
                top: imgtodrag.offset().top,
                left: imgtodrag.offset().left
            })
                .css({
                'opacity': '0.5',
                    'position': 'absolute',
                    'height': '150px',
                    'width': '150px',
                    'z-index': '10000'
            })
                .appendTo($('body'))
                .animate({
                'top': cart.offset().top + 10,
                    'left': cart.offset().left + 10,
                    'width': 75,
                    'height': 75
            }, 1000);
            
            // setTimeout(function () {
            //     cart.effect("shake", {
            //         times: 2
            //     }, 200);
            // }, 1500);

            imgclone.animate({
                'width': 0,
                    'height': 0
            }, function () {
                $(this).detach()
            });
        }
    });


</script>

 @include ('flash')
</body>
</html>