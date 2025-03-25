<div>
    <!-- Do what you can, with what you have, where you are. - Theodore Roosevelt -->

    @foreach ($stocks as $stock)
        <div>
            <h2>{{ $stock->product->name }}</h2>
            <p>{{ $stock->quantity }} kg/l</p>
            <a href="{{ route('stocks.edit', $stock) }}">Edit</a>
            <form method="POST" action="{{ route('stocks.destroy', $stock) }}" style="display:inline;">
                @csrf @method('DELETE')
                <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </div>
        
    @endforeach
</div>
