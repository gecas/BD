<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductImage;
use App\Category;
use App\Brand;
use Session;
use App\Http\Requests;
use Image;
use DB;

class ProductsController extends Controller
{
    protected $_product_image_path = 'images/product_images/';

    protected $_product_image_thumbnail_path = 'images/product_thumbnails/';

    public function index()
    {
    	return view('admin.products.index');
    }

    public function store(Request $request)
    {
         $this->validate($request,['title'=>'required','category_id'=>'required|integer','price'=>'required|integer', 'stock'=>'required|integer','description'=>'required', 'brand_id'=>'required']);

        $title = $request->title;
        $category = $request->category_id;
        $brand = $request->brand_id;
        $price = $request->price;
        $stock = $request->stock;
        $description = $request->description;
        $slug = str_slug($title); 

        $product = Product::create(['title'=>$title, 'category_id'=>$category, 'brand_id'=>$brand, 'price'=>$price, 'stock'=>$stock, 'description'=>$description, 'slug'=>$slug]);  

        // $images = $product->images()->create(['image_name' => 'image', 'image_path' => 'path']);  
        // dd($images);  
        $image = $request->file('file');

        $this->saveImages($image, $product);

        flash()->success('', 'Prekė pridėta!');

        return Redirect('/dashboard/products');
       
    }

    public function create()
    {
        $categories = $this->getCategoriesAndBrands()["categories"];

        $brands = $this->getCategoriesAndBrands()["brands"];

    	return view('admin.products.create', compact('categories', 'brands'));
    }
    /**
     * @param  Gaunamas produktas
     * @return Viewsas su produktu
     */
    public function show($slug)
    {
        $product = Product::where('slug','=', $slug)->firstOrFail()->load('images');

        return view('pages.products.show', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);

     
        $categories = $this->getCategoriesAndBrands()["categories"];

        $brands = $this->getCategoriesAndBrands()["brands"];

        return view('admin.products.edit', compact('product', 'categories', 'brands'));
    }

    public function update(Request $request, $id)
    {
         $this->validate($request,['title'=>'required','category_id'=>'required|integer','price'=>'required|integer', 'stock'=>'required|integer','description'=>'required', 'brand_id'=>'required']);

        $product = Product::findOrFail($id);

        $product->title = $request->title;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->description = $request->description;
        $product->slug = str_slug($product->title); 

        $product->save();

         if ($request->product_photos) {
            foreach ($request->product_photos as $image) {
                $tmp = ProductImage::findOrFail($image);
                if (file_exists($tmp->image_path.$tmp->image_name)) {
                    unlink($tmp->image_path.$tmp->image_name);
                }
                else if(file_exists($tmp->image_thumbnail_path.$tmp->image_thumbnail_name)){
                    unlink($tmp->image_thumbnail_path.$tmp->image_thumbnail_name);
                }

                $img = $tmp->image_path.$tmp->image_name;
                $tmb = $tmp->image_thumbnail_path.$tmp->image_thumbnail_name;

                if(\File::isFile($img)){
                \File::delete($img);
                 }

                 else if(\File::isFile($tmb)){
                \File::delete($tmb);
                 }

                $tmp->delete();
            }
        }

        $image = $request->file('file');

        $this->saveImages($image, $product); 

        flash()->success('', 'Prekė pakeista!');

        return redirect('/dashboard/products');


    }

    public function products()
    {
        return view('pages.products.index');
    }

    public function productsAjax()
    {
        $products = Product::latest()->skip(0)->take(3)->with('images')->get();

        return response()->json($products);
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

       foreach($product->images as $photo){
       $img_path = $photo->image_path;
       $tmb_path = $photo->image_thumbnail_path;
       $name = $photo->name;
       $img = $img_path.$name;
       $tmb = $tmb_path.$name;
       
           if(\File::isFile($img)){
                \File::delete($img);
        }
        else if(\File::isFile($tmb)){
                \File::delete($tmb);
        }

        }

        $product->delete();

        flash()->aside('', 'Produktas ištrintas!');

        return redirect('/dashboard/products');
    }

    public function getCategoryProducts($slug)
    {
        $product = Category::where('slug', '=', $slug)->firstOrFail()->load('products', 'products.brand', 'products.images');

        return view('pages.products.category_products', compact('product'));
    }

    public function getBrandProducts($slug)
    {
        $product = Brand::where('slug', '=', $slug)->firstOrFail()->load('products', 'products.brand', 'products.images');

        return view('pages.products.brand_products', compact('product'));
    }

    private function getCategoriesAndBrands()
    {
        $categories = Category::all();

        $brands = Brand::all();

        return array('categories' => $categories, 'brands' => $brands);
    }

    private function saveImages($image, $product)
    {

            if ($image){

             $img_path = $this->_product_image_path;

             $tmb_path = $this->_product_image_thumbnail_path;

            foreach ($image as $file) {

            $name = uniqid() . "_" .str_replace(' ', '_', $file->getClientOriginalName());

            // $path = public_path($this->_product_image_path.$name);

            // $thumbnail_path = public_path($this->_product_image_thumbnail_path.$name);

            $file->move($img_path, $name);

            $images = $product->images()->create(['image_name' => $name, 'image_path' => $img_path, 'image_thumbnail_path'=> $tmb_path, 'image_thumbnail_name' => 'tn-' . $name]);

            // $thumbs = Image::make($thumbnail_path . '/' . $name)->fit(300)->save($thumbnail_path . '/' . 'tn-' . $name);
             //$thumbs = Image::make($path . '/' . $name)->fit(300)->save($thumbnail_path);
            //Image::make($file->getRealPath())->fit(300)->save($thumbnail_path);
            // open an image file
            Image::make($img_path.$name)->fit(300)->save($tmb_path. 'tn-' . $name);
            }

           // $thumbs = Image::make($path . '/' . $name)->fit(300)->save($thumbnail_path);

            $product->save();


        }
    }

    

    
}
