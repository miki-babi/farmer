@extends('layouts.app')
@section('title', 'Add Product')
@section('content')

<div class="container mx-auto mt-10 p-6 bg-white shadow-md rounded-lg">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Add Product</h2>
    <form method="POST" action="{{ route('products.store') }}" class="space-y-4">
        @csrf
        <div>
            <label class="block text-gray-700 font-medium mb-2">Name:</label>
            <input type="text" name="name" required 
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <button type="submit" 
                class="px-6 py-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
            Save
        </button>
    </form>
</div>

@endsection