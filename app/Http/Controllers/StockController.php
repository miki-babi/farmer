<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class StockController extends Controller
{
    public function index()
    {
        $stocks = Stock::whereHas('product', function ($query) {
            $query->where('farmer_id', Auth::id());
        })->get();
        return view('stock.index', compact('stocks'));
    
    }

    public function create()
    {
        $products = Product::where('farmer_id', Auth::id())->get();
        return view('stock.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|numeric|min:1',
            'unit_price' => 'required|numeric|min:1',
            
        ]);

        Stock::create([
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'farmer_id' => Auth::id(),
            'unit_price' => $request->unit_price,
        ]);

        return redirect()->route('stocks.index');
    }

    public function show()
    {
        $stock=Stock::where('farmer_id', Auth::id())->get();
        
        return view('stock.show', compact('stock'));
    }

    public function edit(Stock $stock)
    {
        $products = Product::all();
        return view('stock.edit', compact('stock', 'products'));
    }

    public function update(Request $request, Stock $stock)
    {
        $request->validate([
            'quantity' => 'required|numeric|min:1',
        ]);

        $stock->update($request->all());

        return redirect()->route('stocks.index');
    }

    public function destroy(Stock $stock)
    {
        $stock->delete();
        return redirect()->route('stocks.index');
    }
}
