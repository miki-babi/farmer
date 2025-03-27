@extends('layouts.app')
@section('title', 'Stocks')
@section('content')
<div class="container mx-auto p-6 bg-gray-100 rounded-lg shadow-md h-screen">

    <h2 class="text-2xl font-bold mb-4">Edit Stock</h2>
    <form method="POST" action="{{ route('stocks.update', $stock) }}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf @method('PUT')
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Product:</label>
            <select name="product_id" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @foreach($products as $product)
                    <option value="{{ $product->id }}" {{ $product->id == $stock->product_id ? 'selected' : '' }}>
                        {{ $product->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Quantity (kg/l):</label>
            <input type="number" name="quantity" step="0.01" value="{{ $stock->quantity }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Update
            </button>
        </div>
    </form>
</div>
@endsection