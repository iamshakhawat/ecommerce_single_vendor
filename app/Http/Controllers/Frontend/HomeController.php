<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function Index(){
        return view('homepage');
    }

    public function ShowCategory($slug){
        $category = Category::where('slug',$slug)->get();
        $products = Product::where('category_name',$category[0]->category_name)->latest('id')->paginate(5);
        return view('category',compact('products','category'));
    }

    public function SingleProduct($slug){
        $product = Product::where('slug',$slug)->first();
        return view('singleproduct',compact('product'));
    }

}
