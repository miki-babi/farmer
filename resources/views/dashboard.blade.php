@extends('layouts.app')
@section('title', 'Add Product')
@section('content')

<div class="container mx-auto p-6 bg-gray-100 rounded-lg shadow-md h-screen">
    <h2 class="text-2xl font-bold text-gray-800 mb-4">Dashboard</h2>
    
        <h1 class="text-xl font-semibold text-gray-700 mt-6">Deliveries</h1>

@if ($deliveries->isEmpty())
<div class="flex justify-center items-center h-40">
   
        <p class="text-gray-500 text-lg">Sorry, no deliveries yet.</p>
    
</div>
@else
    @foreach ($deliveries as $delivery)
        <div class="p-4 bg-white rounded-lg shadow-md mb-4">
            <p class="text-gray-700 space-x-4">
                <span class="font-semibold">{{ $delivery->product->name }}</span> - 
                <span>{{ $delivery->amount_delivered }} kg/l</span> - 
                <span>${{ $delivery->total_price }}</span> - 
                <span>{{ $delivery->delivery_date }}</span>
            </p>
        </div>
    @endforeach
@endif

    @elseif(auth()->user()->role === 'admin')
        <div class="mb-4">
            <a href="{{ route('deliveries.index') }}" class="text-blue-500 hover:underline">Manage Deliveries</a>
        </div>
    @endif
    
</div>

@endsection