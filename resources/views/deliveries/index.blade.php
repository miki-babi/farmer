<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(["resources/css/app.css", "resources/js/app.js"])
    <title>Add Delivery</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto p-6">
        <h2 class="text-2xl font-bold mb-4">Deliveries</h2>
        <a href="{{ route('deliveries.create') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 mb-4">Add Delivery</a>
        <ul class="space-y-4">
            @foreach($deliveries as $delivery)
                <li class="bg-white shadow-md rounded p-4 flex flex-col md:flex-row md:items-center justify-between">
                    <div class="mb-4 md:mb-0">
                        <p><span class="font-semibold">Farmer:</span> {{ $delivery->farmer->name }}</p>
                        <p><span class="font-semibold">Product:</span> {{ $delivery->product->name }}</p>
                        <p><span class="font-semibold">Amount:</span> {{ $delivery->amount }} kg/l</p>
                        <p><span class="font-semibold">Total Price:</span> ${{ $delivery->total_price }}</p>
                        <p><span class="font-semibold">Date:</span> {{ $delivery->delivery_date }}</p>
                    </div>
                    <div class="flex space-x-2">
                        <a href="{{ route('deliveries.edit', $delivery) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Edit</a>
                        <form method="POST" action="{{ route('deliveries.destroy', $delivery) }}">
                            @csrf @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Delete</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>
