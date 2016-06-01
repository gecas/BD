<style>
    .product-image{
        height: 250px;
        width: 250px;
        background-size: cover;
        background-position: center center;
        display: table;
        margin:auto;
    }
</style>
<div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Populiarios prekės</h2>
                        @foreach($features_items as $product)
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                        <div class="productinfo text-center product-wrap-to-cart">
                                        {{--*/ $image = $product->images->first() /*--}}
                                            <div class="product-image imgtocart" style="background-image: url('/{!!$image->image_thumbnail_path.$image->image_thumbnail_name !!}');"></div>

                                            <h2>{!! number_format($product->price,2) !!} €</h2>
                                            <p><a href="/prekes/{!! $product->slug !!}">{!! $product->title !!}</a></p>
                                            <button class="btn btn-default add-to-cart" v-on:click="postToCart({{ $product }}, 1)" type="button">
                                            <i class="fa fa-shopping-cart"></i> Į krepšelį</button>
                                        </div>
                                        
                                </div>
                                <!-- <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                    </ul>
                                </div> -->
                            </div>
                        </div>
                        @endforeach

                        
                    </div><!--features_items-->