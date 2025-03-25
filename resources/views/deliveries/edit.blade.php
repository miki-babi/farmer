
<div class="container">
    <h2>Add Delivery</h2>
    <form method="POST" action="{{ route('deliveries.store') }}">
        @csrf
        <label>Farmer:</label>
        <select name="farmer_id" required>
            @foreach($farmers as $farmer)
                <option value="{{ $farmer->id }}">{{ $farmer->name }}</option>
            @endforeach
        </select>
        <label>Product:</label>
        <select name="product_id" required>
            @foreach($products as $product)
                <option value="{{ $product->id }}">{{ $product->name }}</option>
            @endforeach
        </select>
        <label>Amount (kg/l):</label>
        <input type="number" name="amount_delivered" value={{ $amount_delivered }} required> 
        <label>Total Price:</label>
        <input type="number" name="total_price" required>
        <label>Delivery Date:</label>
        <input type="date" name="delivery_date" required>
        <button type="submit">Save</button>
    </form>
</div>
