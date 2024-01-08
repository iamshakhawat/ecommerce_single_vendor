<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\AuthManager;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use function PHPUnit\Framework\returnSelf;

class DashboardController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }
    public function Logout(){
        date_default_timezone_set('Asia/Dhaka');
        User::where('id',Auth::id())->update([
            'updated_at' => date('Y-m-d H:i:m'),
        ]);
        Auth::guard('web')->logout();
        return redirect('/');
    }


    public function AdminProfile(){
        $user = User::find(Auth::id());
        return view('admin.adminprofile',compact('user'));
    }


    public function EditProfile(){
        $user = User::find(Auth::id());
        return view('admin.editprofile',compact('user'));
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

        return redirect()->route('adminprofile')->withIcon('success')->withMsg('Profile Updated!');
    }

    public function ChangePassword(){
        return view('admin.changepassword');
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
}
