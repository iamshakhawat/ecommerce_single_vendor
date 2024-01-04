<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SubCategory;

class SubcategoryController extends Controller
{
    public function Index(){
        $subcategories = SubCategory::latest('id')->get();
        return view('admin.allsubcategory',compact('subcategories'));
    }

    public function AddSubcategory(){
        $categories = Category::latest('id')->get();
        return view('admin.addsubcategory',compact('categories'));
    }

    public function StoreCategory(Request $request){
        $request->validate([
            'subcategory_name' => 'required|unique:sub_categories,subcategory_name',
            'category' => 'required',
        ]);
        $category_name = Category::find($request->category)->category_name;
        SubCategory::insert([
            'subcategory_name' => $request->subcategory_name,
            'slug' => strtolower(str_replace(' ','-',$request->subcategory_name)),
            'category_id' => $request->category,
            'category_name' => $category_name,
        ]);

        Category::find($request->category)->increment('total_subcategory',1);

        return redirect()->route('allsubcategory')->withIcon('success')->withMsg('Subcategory Added!');
    }

    public function EditSubCategory($id){
        $categories = Category::latest('id')->get();
        $subcategory = SubCategory::find($id);
        return view('admin.editsubcategory',compact('subcategory','categories'));
    }

    public function UpdateSubCategory(Request $request){
        $request->validate([
            'subcategory_name' => 'required|unique:sub_categories,subcategory_name,'.$request->id,
            'category' => 'required',
            'old_category_id' => 'required',
        ]);

        Category::find($request->old_category_id)->decrement('total_subcategory',1);
        $category_name = Category::find($request->category)->category_name;

        SubCategory::where('id',$request->id)->update([
            'subcategory_name' => $request->subcategory_name,
            'slug' => strtolower(str_replace(' ','-',$request->subcategory_name)),
            'category_id' => $request->category,
            'category_name' => $category_name,
        ]);

        Category::find($request->category)->increment('total_subcategory',1);

        return redirect()->route('allsubcategory')->withIcon('success')->withMsg('Subcategory Updated!');
    }

    public function DeleteSubCategory($id){
        $category_id = SubCategory::find($id)->category_id;
        Category::find($category_id)->decrement('total_subcategory',1);

        

        SubCategory::find($id)->delete();

        return redirect()->route('allsubcategory')->withIcon('success')->withText('Sub Category Delete Successfully!')->withTitle('Deleted!')->withSweetalert('active');
    }
}
