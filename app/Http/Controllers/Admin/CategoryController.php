<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function Index(){
        $categories = Category::latest('id')->paginate(10);
        return view('admin.allcategory',compact('categories'));
    }

    public function AddCategory(){

        return view('admin.addcategory');
    }

    public function StoreCategory(Request $request){
        $request->validate([
            'category_name' => 'required|unique:categories,category_name',
        ]);

        $slug = strtolower(str_replace(' ','-',$request->category_name));

        Category::insert([
            'category_name' => $request->category_name,
            'slug' => $slug
        ]);

        return redirect()->route('allcategory')->withIcon('success')->withMsg('Category Added Successfully!');

    }

    public function EditCategory($id){
        $category = Category::findOrFail($id);
        return view('admin.editcategory',compact('category'));
    }

    public function UpdateCategory(Request $request){
        $request->validate([
            'category_name' => 'required|unique:categories,category_name,'.$request->id,
        ]);

        $slug = strtolower(str_replace(' ','-',$request->category_name));

        Category::findOrFail($request->id)->update([
            'category_name' => $request->category_name,
            'slug' => $slug,
        ]);
        return redirect()->route('allcategory')->withIcon('success')->withMsg('Category Updated!');
    }

    public function DeleteCategory($cat_id){
            Category::destroy($cat_id);
            return redirect()->route('allcategory')->withIcon('success')->withText('Category Delete Successfully!')->withTitle('Deleted!')->withSweetalert('active');

    }
}
