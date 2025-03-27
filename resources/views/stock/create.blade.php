@extends('layouts.app')
@section('title', 'Add Stock')
@section('content')
{{-- <body class="bg-gray-100 min-h-screen flex items-center justify-center"> --}}
    <div class="container mx-auto p-6 bg-gray-100 rounded-lg shadow-md h-screen">

        <h2 class="text-2xl font-bold mb-6 text-gray-800">Add Stock</h2>
        <form method="POST" action="{{ route('stocks.store') }}" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700">Product:</label>
                <select name="product_id" required class="mt-1 block w-full rounded-lg border-2 border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-lg p-3">
                    @foreach($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Quantity (kg/l):</label>
                <input type="number" name="quantity" step="0.01" required class="mt-1 block w-full rounded-lg border-2 border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-lg p-3">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Price:</label>
                <input type="number" name="unit_price" step="0.01" required class="mt-1 block w-full rounded-lg border-2 border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-lg p-3">
            </div>
            <div>
                <button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    Save
                </button>
            </div>
        </form>
    </div>
@endsection