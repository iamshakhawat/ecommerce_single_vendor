<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function Index(){
        $products = Product::latest('id')->paginate(20);
        return view('admin.allproduct',compact('products'));
    }

    public function AddProduct(){
        $categories = Category::latest('id')->get();
        $subcategories = SubCategory::latest('id')->get();
        return view('admin.addproduct',compact('categories','subcategories'));
    }

    public function SelectSubCategory(Request $request){
        $request->validate([
            'category_id' => 'required'
        ]);

        $subcategories = SubCategory::where('category_id','=',$request->category_id)->get();

        return view('admin.template.select-subcategory',compact('subcategories'))->render();
    }

    public function StoreProduct(Request $request){
        $request->validate([
            'product_name' => 'required|unique:products,product_name',
            'short_description' => 'required',
            'long_description' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'photo' => 'required|image|mimes:jpg,png,jpeg,webp',
        ]);

        $slug = strtolower(str_replace(' ','-',$request->product_name));
        $productImage = uniqid().'_'.time().'.'.$request->file('photo')->getClientOriginalExtension();
        $request->file('photo')->move(public_path('upload/products/'),$productImage);

        $category_name = Category::find($request->category_id)->category_name;
        $subcategory_name = SubCategory::find($request->subcategory_id)->subcategory_name;

        Product::insert([
            'product_name' => $request->product_name,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'category_name' => $category_name,
            'subcategory_name' => $subcategory_name,
            'photo' => $productImage,
            'slug' => $slug,
        ]);

        Category::find($request->category_id)->increment('total_product',1);
        SubCategory::find($request->subcategory_id)->increment('total_product',1);

        return redirect()->route('allproduct')->withIcon('success')->withMsg('Product Added!');

    }

    public function EditProduct($id){
        $product = Product::find($id);
        $categories = Category::latest('id')->get();
        $subcategories = SubCategory::where('category_name',$product->category_name)->get();
        return view('admin.editproduct',compact('product','categories','subcategories'));
    }

    public function UpdateProduct(Request $request){
        $request->validate([
            'product_name' => 'required|unique:products,product_name,'.$request->id,
            'short_description' => 'required',
            'long_description' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'photo' => 'nullable|image|mimes:jpg,png,jpeg,webp',
        ]);

        $slug = strtolower(str_replace(' ','-',$request->product_name));
        $dbimage = Product::find($request->id)->photo;
        if($request->file('photo')){
            $path = public_path('upload/products').'/'.$dbimage;
            unlink($path);
            $productImage = uniqid().'_'.time().'.'.$request->file('photo')->getClientOriginalExtension();
            $request->file('photo')->move(public_path('upload/products/'),$productImage);
        }else{
            $productImage = Product::find($request->id)->photo;
        }

        $category_name = Category::find($request->category_id)->category_name;
        $subcategory_name = SubCategory::find($request->subcategory_id)->subcategory_name;

        Product::where('id',$request->id)->update([
            'product_name' => $request->product_name,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'category_name' => $category_name,
            'subcategory_name' => $subcategory_name,
            'photo' => $productImage,
            'slug' => $slug,
        ]);

        Category::where('category_name',$request->old_category)->decrement('total_product',1);
        SubCategory::where('subcategory_name',$request->old_subcategory)->decrement('total_product',1);

        Category::find($request->category_id)->increment('total_product',1);
        SubCategory::find($request->subcategory_id)->increment('total_product',1);

        return redirect()->route('allproduct')->withIcon('success')->withMsg('Product Updated!');

    }

    public function DeleteProduct($id){
        $dbimage = Product::find($id)->photo;
        $old_category = Product::find($id)->category_name;
        $old_subcategory = Product::find($id)->subcategory_name;
        $path = public_path('upload/products').'/'.$dbimage;
        unlink($path);

        Category::where('category_name',$old_category)->decrement('total_product',1);
        SubCategory::where('subcategory_name',$old_subcategory)->decrement('total_product',1);

        Product::destroy($id);

        return redirect()->route('allproduct')->withIcon('success')->withText('Product Delete Successfully!')->withTitle('Deleted!')->withSweetalert('active');
    }

}
