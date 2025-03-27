<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Stock;
use App\Models\Product;
use App\Models\Delivery;

class UserController extends Controller
{
    public function showForm()
    {
        return view('admin.usercreate');
    }
  
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|unique:users,phone',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|in:farmer,admin'
        ]);

        $user = User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);

        // auth()->login($user);

        if (Auth::user()->role === 'admin') {
            $users=User::all();
            $stocks=Stock::all();
            $products=Product::all();
            $farmers=User::where('role','farmer')->get();
            $deliveries=Delivery::all();
            return view('admin.dashboard',compact('stocks','products','farmers','deliveries','users'));
        }
    }
}
