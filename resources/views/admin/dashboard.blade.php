@extends('admin.layout')
@section('title', 'Admin Dashboard')
@section('content')
<div class="min-h-screen bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100 p-6">

    <div class="flex justify-between items-center mb-6">
        <a href="{{ route('deliveries.index') }}" class="text-blue-500 hover:underline">Manage Deliveries</a>

        <form action="{{ route('logout') }}" method="POST" class="inline">
            @csrf
            <button type="submit" class="btn btn-danger bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">Logout</button>
        </form>
    </div>

    <h1 class="text-3xl font-bold mb-4">Dashboard</h1>

    <a href="{{ route('register.form') }}" class="text-blue-500 hover:underline">Register</a>

    <h2 class="text-2xl font-semibold mt-6 mb-4">Stock</h2>

    <div class="space-y-4">
        @foreach ($stocks as $stock)
            <div class="p-4 bg-white dark:bg-gray-800 rounded shadow">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="font-semibold">{{ $stock->product->name }}</p>
                        <p>{{ $stock->quantity }} kg/l</p>
                    </div>
                    <div class="flex space-x-2">
                        <a href="{{ route('stocks.edit', $stock) }}" class="text-blue-500 hover:underline">Edit</a>
                        <form method="POST" action="{{ route('stocks.destroy', $stock) }}" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</div>
@endsection