<div class="left-sidebar">

                        <h2>Kategorijos</h2>
                        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                           @foreach($categories as $category)
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="/kategorija/{!! $category->slug !!}">{!! $category->title !!}</a></h4>
                                </div>
                            </div>
                            @endforeach
                            
                        </div><!--/category-products-->
                    
                        <div class="brands_products"><!--brands_products-->
                            <h2>Prekiniai ženklai</h2>
                            <div class="brands-name">
                                <ul class="nav nav-pills nav-stacked">
                                    @foreach($brands as $brand)
                                    <li><a href="/brand/{!! $brand->slug !!}"> <span class="pull-right">({{ count($brand->products) }})</span>{!! $brand->title !!}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div><!--/brands_products-->
                        
                        <!--price-range-->
                        <!-- <div class="price-range">
                            <h2>Price Range</h2>
                            <div class="well text-center">
                                 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                                 <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
                            </div>
                        </div> -->
                        <!--/price-range-->
                        
                    
                    </div>