<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Stock;
use App\Models\Product;
use App\Models\Delivery;
use App\Models\User;


class SessionController extends Controller
{
    // Show the login form

    public function showLoginForm()
    {
        //check if user has logged in before 
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('auth.login');
    }

    // Handle login request
    public function login(Request $request)
    {
        $request->validate([
            'phone' => 'required|exists:users,phone',
            'password' => 'required',
        ]);

        if (Auth::attempt(['phone' => $request->phone, 'password' => $request->password])) {
            if (Auth::user()->role === 'admin') {
                $users=User::all();
                $stocks=Stock::all();
                $products=Product::all();
                $farmers=User::where('role','farmer')->get();
                $deliveries=Delivery::all();
                return view('admin.dashboard',compact('stocks','products','farmers','deliveries','users'));
            }
            return redirect()->route('dashboard');
        }

        return back()->withErrors(['phone' => 'Invalid credentials']);
    }

    // Handle logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
