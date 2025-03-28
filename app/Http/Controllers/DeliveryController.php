<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Delivery;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;


class DeliveryController extends Controller
{
    public function getProductsByFarmer($farmerId)
{
    $products = Product::where('farmer_id', $farmerId)->get();
    return response()->json($products);
}
    public function index()
    {
        $deliveries = Delivery::all();
        return view('deliveries.index', compact('deliveries'));
    }

    public function create()
    {
        $farmers=User::where('role','farmer')->get();
        $products=Product::all();
        return view('deliveries.create',compact('farmers','products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'farmer_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
            'amount_delivered' => 'required|numeric|min:1',
            'total_price' => 'required|numeric|min:1',
            'delivery_date' => 'required|date',
        ]);
        // dd($request->all());

        Delivery::create($request->all());

        return redirect()->route('deliveries.index');
    }

    public function show(Delivery $delivery)
    {
        return view('deliveries.show', compact('delivery'));
    }

    public function edit(Delivery $delivery)
    {
        return view('deliveries.edit', compact('delivery'));
    }

    public function update(Request $request, Delivery $delivery)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
            'total_price' => 'required|numeric|min:1',
            'delivery_date' => 'required|date',
        ]);

        $delivery->update($request->all());

        return redirect()->route('deliveries.index');
    }

    public function destroy(Delivery $delivery)
    {
        $delivery->delete();
        return redirect()->route('deliveries.index');
    }
}
