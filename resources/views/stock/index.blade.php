@extends('layouts.app')
@section('title', 'Stocks')
@section('content')
    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-bold mb-4">Your Stock</h2>
        <a href="{{ route('stocks.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 mb-4 inline-block">Add Stock</a>
        <ul class="space-y-4">
            @foreach($stocks as $stock)
                <li class="bg-white shadow-md rounded p-4 flex justify-between items-center">
                    <div>
                        <span class="font-semibold">{{ $stock->product->name }}</span> - 
                        <span>{{ $stock->quantity }} kg/l</span>
                    </div>
                    <div class="flex space-x-2">
                        <a href="{{ route('stocks.edit', $stock) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Edit</a>
                        <form method="POST" action="{{ route('stocks.destroy', $stock) }}" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Delete</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
