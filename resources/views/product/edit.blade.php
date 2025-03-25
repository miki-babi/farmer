@extends('layouts.app')
@section('title', 'Add Product')
@section('content')

<div class="container">
    <h2>Edit Product</h2>
    <form method="POST" action="{{ route('products.update', $product) }}">
        @csrf @method('PUT')
        <label>Name:</label>
        <input type="text" name="name" value="{{ $product->name }}" required>
        <label>Unit Price (per kg/l):</label>
        <input type="number" name="unit_price" step="0.01" value="{{ $product->unit_price }}" required>
        <button type="submit">Update</button>
    </form>
</div>
@endsection