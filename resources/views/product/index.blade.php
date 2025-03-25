
@extends('layouts.app')

@section('title', 'Products')

@section('content')
<body class="bg-gray-100 text-gray-800">
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold mb-4">Your Products</h2>
    <a href="{{ route('products.create') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 mb-4">Add Product</a>
    <ul class="space-y-4">
        @foreach($products as $product)
            <li class="bg-white shadow-md rounded p-4 flex justify-between items-center">
                <div>
                    <span class="font-semibold">{{ $product->name }}</span>  
                    {{-- <span class="text-gray-600">${{ $product->unit_price }} per kg/l</span> --}}
                </div>
                <div class="flex space-x-2">
                    <a href="{{ route('products.edit', $product) }}" class="text-blue-500 hover:underline">Edit</a>
                    <form method="POST" action="{{ route('products.destroy', $product) }}" class="inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
</div>
@endsection