<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\OrderItem;
use App\Models\AddressBook;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{

    public function Index()
    {
        return view('homepage');
    }

    public function ShowCategory($slug)
    {
        $category = Category::where('slug', $slug)->get();
        $subcategory = SubCategory::where('category_name', $category[0]->category_name)->get();
        $products = Product::where('category_name', $category[0]->category_name)->latest('id')->paginate(20);
        return view('category', compact('products', 'category'));
    }

    public function SingleProduct($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $product_name = $product->subcategory_name;
        $releated = Product::where('subcategory_name', 'LIKE', '%' . $product_name . '%')->limit(4)->latest('id')->get();
        return view('singleproduct', compact('product', 'releated'));
    }

    public function SearchProduct(Request $request)
    {
        $request->validate([
            'search' => 'required',
        ]);

        $products = Product::where('product_name', 'LIKE', "%$request->search%")->paginate(10);
        $search = $request->search;

        return view('search', compact('products', 'search'));
    }



    public function Cart()
    {
        $carts = Cart::where('user_id', Auth::id())->latest('id')->get();
        return view('cart', compact('carts'));
    }

    public function AddProducttoCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'quantity' => 'required'
        ]);

        $quantity = $request->quantity;
        $product = Product::find($request->product_id);
        $product_price = $product->price;
        $price = $quantity * $product_price;

        if($request->quantity > $product->quantity){
            return redirect()->back()->withIcon('error')->withMsg('Product Out of Stock!');
        }
        else{
            Cart::insert([
                'product_id' => $request->product_id,
                'user_id' => Auth::id(),
                'quantity' => $quantity,
                'price' => $price,
            ]);
            return redirect()->route('cart')->withIcon('success')->withMsg('Product added to cart!');
        }

    }

    public function AddtoCartSingleProduct($id)
    {
        $quantity = 1;
        $product = Product::find($id);
        $product_price = $product->price;
        $price = $quantity * $product_price;

        if($quantity > $product->quantity){
            return redirect()->back()->withIcon('error')->withMsg('Product Out of Stock!');
        }
        else{
            Cart::insert([
                'product_id' => $id,
                'user_id' => Auth::id(),
                'quantity' => $quantity,
                'price' => $price,
            ]);
            return redirect()->route('cart')->withIcon('success')->withMsg('Product added to cart!');
        }
    }

    public function RemoveFromCart($id)
    {
        Cart::destroy($id);
        return redirect()->route('cart')->withIcon('error')->withMsg('Product removed from cart!');
    }

    public function Dashboard()
    {
        $orders = Order::where('status','Confirm')->orWhere('status','Shipping')->orWhere('status','Complete')->limit(1)->latest('id')->get();
        return view('dashboard',compact('orders'));
    }

    public function PendingOrders()
    {

        $orders = Order::where('status','Pending')->latest('id')->get();

        return view('pending-orders',compact('orders'));
    }

    public function AddressBook()
    {
        $address = AddressBook::where('user_id', Auth::id())->get();
        $alert = 0;
        return view('address-book', compact('address','alert'));
    }

    public function OrderHistory()
    {
        $orders = Order::latest('id')->get();
        return view('order-history',compact('orders'));
    }

    public function UserProfile()
    {
        return view('user-profile');
    }

    public function Logout()
    {
        Auth::guard('web')->logout();
        return redirect('/');
    }

    public function AddAdress()
    {
        $address = AddressBook::where('user_id',Auth::id())->get();

        if(is_countable($address) && (count($address) > 0)){
            return redirect()->route('addressbook')->withIcon('warning')->withMsg('Address already exist!');
        }else{
            return view('add-address');
        }


    }

    public function StoreAddress(Request $request)
    {
        $request->validate([
            "name" => 'required',
            "phone" => 'required',
            "district" => 'required',
            "city" => 'required',
            "area" => 'required',
            "address" => 'required',
        ]);


        AddressBook::insert([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'phone' => $request->phone,
            'district' => $request->district,
            'city' => $request->city,
            'area' => $request->area,
            'address' => $request->address,
        ]);

        if(isset($request->next)){
            return redirect()->route('checkout')->withIcon('success')->withMsg('Address Book Added!');
        }else{
            return redirect()->route('addressbook')->withIcon('success')->withMsg('Address Book Added!');
        }

    }

    public function EditAddress($id){
        $address = AddressBook::find($id);
        return view('edit-address',compact('address'));
    }

    public function UpdateAddress(Request $request)
    {
        $request->validate([
            "name" => 'required',
            "phone" => 'required',
            "district" => 'required',
            "city" => 'required',
            "area" => 'required',
            "address" => 'required',
        ]);


        AddressBook::where('id',$request->id)->update([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'phone' => $request->phone,
            'district' => $request->district,
            'city' => $request->city,
            'area' => $request->area,
            'address' => $request->address,
        ]);
        return redirect()->route('addressbook')->withIcon('success')->withMsg('Address Book Updated!');
    }

    public function Checkout(){
        $address = AddressBook::where('user_id', Auth::id())->get();
        $carts = Cart::where('user_id', Auth::id())->latest('id')->get();
        $alert = 1;
        if(is_countable($address) && count($address) > 0){
            return view('checkout',compact('address','carts'));
        }else{
            return view('address-book',compact('address','alert'));
        }
    }

    public function Placeorder(){
        $address = AddressBook::where('user_id', Auth::id())->first();
        $carts = Cart::where('user_id', Auth::id())->latest('id')->get();
        $price = 0;
        $quantity = 0;
        foreach($carts as $cart){
            $price = $cart->price + $price;
            $quantity = $quantity + $cart->quantity;
        }

        $price = $price + 50 + 50; //Add Delivery & Shipping Charge

        Order::insert([
            'user_id' => Auth::id(),
            'address_id' => $address->id,
            'price' => $price,
            'quantity' => $quantity,
        ]);

        $lastorderId = Order::where('user_id',Auth::id())->where('quantity',$quantity)->where('price',$price)->limit(1)->latest('id')->first()->id;
        $products = Cart::where('user_id',Auth::id())->get();

        foreach($products as $product){
            OrderItem::insert([
                'user_id' => Auth::id(),
                'order_id' => $lastorderId,
                'product_id' => $product->product_id,
                'per_item_quantity' => $product->quantity,
            ]);
            Cart::findOrFail($product->id)->delete();
            Product::find($product->product_id)->decrement('quantity',$product->quantity);
        }


        return redirect()->route('orderpending')->withIcon('success')->withMsg('Order Placed Successfully');


    }

    public function ChangePassword(){
        return view('userchangepassword');
    }

    public function UpdatePassword(Request $request){
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8',
            'confirm_password' => 'required|min:8|same:confirm_password',
        ]);
         $dbpassword = User::find(Auth::id())->password;
         $oldpass = $request->old_password;
        if(Hash::check($oldpass,$dbpassword)){
            User::find(Auth::id())->update([
                'password' => Hash::make($request->new_password),
            ]);
            return redirect()->back()->withIcon('success')->withMsg('Password Change Successfully');
        }
        else{
            return redirect()->back()->withIcon('error')->withMsg('Incorrct Old Password');
        }

    }

    public function UpdateProfile(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.Auth::id(),
        ]);

        User::find(Auth::id())->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->back()->withIcon('success')->withMsg('Profile Updated!');
    }
}
