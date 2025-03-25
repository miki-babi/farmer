<div class="container">
    <h2>Deliveries</h2>
    <a href="{{ route('deliveries.create') }}">Add Delivery</a>
    <ul>
        @foreach($deliveries as $delivery)
            <li>Farmer: {{ $delivery->farmer->name }} | Product: {{ $delivery->product->name }} | 
                Amount: {{ $delivery->amount }} kg/l | Total Price: ${{ $delivery->total_price }} | Date: {{ $delivery->delivery_date }}
                <a href="{{ route('deliveries.edit', $delivery) }}">Edit</a>
                <form method="POST" action="{{ route('deliveries.destroy', $delivery) }}">
                    @csrf @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</div>

