<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Linksniai;
use Auth;
use App\Product;
use App\Category;
use App\Brand;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
       $this->composeloggedUser();
       $this->composefeaturesItems();
       $this->composeCategories();
       $this->composeBrands();
       $this->composerecommendedItems();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
     
    }

    private function composefeaturesItems()
    {
        view()->composer('partials.features_items', function($view){

            $features_items = Product::latest()->skip(0)->take(6)->with('images')->get()->random(6);

            $view->with('features_items', $features_items);
        });
    }

    private function composeCategories()
    {
        view()->composer('partials.left-sidebar', function($view){

            $categories = Category::latest()->get();

            $view->with('categories', $categories);
        });
    }

    private function composeBrands()
    {
        view()->composer('partials.left-sidebar', function($view){

            $brands = Brand::latest()->get();

            $view->with('brands', $brands);
        });
    }

    private function composeloggedUser()
    {
        

        view()->composer('layout', function($view){

            $user = Auth::user();

            $linksnis = new Linksniai;

             if ($user) {
                if($user->gender == 'man')
                {
                   $name = $linksnis->getName($user->name, $linksnis = 'sau' );
                }
                else{
                    $name = $user->name;
                }
             }

             else{
                $name = null;
             }
             

            $view->with('name', $name);
        });

    }

    private function composerecommendedItems()
    {
        view()->composer('partials.recommended', function($view){

            $recommended_items = Product::latest()->skip(0)->take(6)->with('images')->get()->random(6);

            $view->with('recommended_items', $recommended_items);
        });
    }
}
