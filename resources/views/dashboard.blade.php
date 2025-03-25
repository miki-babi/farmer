@extends('layouts.app')
@section('title', 'Add Product')
@section('content')

<div class="container mx-auto p-6 bg-gray-100 rounded-lg shadow-md h-screen">
    <h2 class="text-2xl font-bold text-gray-800 mb-4">Dashboard</h2>
    @if(auth()->user()->role === 'farmer')
        {{-- <div class="mb-6 flex justify-between items-center bg-gradient-to-r from-gray-100 to-gray-200 p-4 rounded-lg ">
            <div class="flex space-x-4">
            <a href="{{ route('products.index') }}" class="px-5 py-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 transition duration-300">
                Manage Products
            </a>
            <a href="{{ route('stocks.index') }}" class="px-5 py-2 bg-green-500 text-white font-semibold rounded-lg hover:bg-green-600 transition duration-300">
                Manage Stock
            </a>
            </div>
            <div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="px-5 py-2 bg-red-500 text-white font-semibold rounded-lg hover:bg-red-600 transition duration-300">
                Logout
                </button>
            </form>
            </div>
        </div> --}}
        <h1 class="text-xl font-semibold text-gray-700 mt-6">Deliveries</h1>
        @foreach ($deliveries as $delivery)
            <div class="p-4 bg-white rounded-lg shadow-md mb-4 ">
                <p class="text-gray-700 space-x-4">
                    <span class="font-semibold">{{ $delivery->product->name }}</span> - 
                    <span>{{ $delivery->amount_delivered }} kg/l</span> - 
                    <span>${{ $delivery->total_price }}</span> - 
                    <span>{{ $delivery->delivery_date }}</span>
                </p>
            </div>
        @endforeach
    @elseif(auth()->user()->role === 'admin')
        <div class="mb-4">
            <a href="{{ route('deliveries.index') }}" class="text-blue-500 hover:underline">Manage Deliveries</a>
        </div>
    @endif
    
</div>

@endsection