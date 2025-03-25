@extends('layouts.app')
@section('title', 'Stocks')
@section('content')
<div class="container">
    <h2>Edit Stock</h2>
    <form method="POST" action="{{ route('stocks.update', $stock) }}">
        @csrf @method('PUT')
        <label>Product:</label>
        <select name="product_id" required>
            @foreach($products as $product)
                <option value="{{ $product->id }}" {{ $product->id == $stock->product_id ? 'selected' : '' }}>
                    {{ $product->name }}
                </option>
            @endforeach
        </select>
        <label>Quantity (kg/l):</label>
        <input type="number" name="quantity" step="0.01" value="{{ $stock->quantity }}" required>
        <button type="submit">Update</button>
    </form>
</div>
@endsection