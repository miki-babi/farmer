<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(["resources/css/app.css", "resources/js/app.js"])
    <title>Add Delivery</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
<div class="container mx-auto p-6 bg-white shadow-md rounded-md">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Add Delivery</h2>
    <form method="POST" action="{{ route('deliveries.store') }}" class="space-y-4">
        @csrf
        <div>
            <label class="block text-gray-700 font-medium">Farmer:</label>
            <select name="farmer_id" id="farmer-select" required
                    class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                <option value="">Select a farmer</option>
                @foreach($farmers as $farmer)
                    <option value="{{ $farmer->id }}">{{ $farmer->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-gray-700 font-medium">Product:</label>
            <select name="product_id" id="product-select" required
                    class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                <option value="">Select a product</option>
            </select>
        </div>

        <div>
            <label class="block text-gray-700 font-medium">Amount (kg/l):</label>
            <input type="number" name="amount_delivered" required
                   class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div>
            <label class="block text-gray-700 font-medium">Total Price:</label>
            <input type="number" name="total_price" required
                   class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div>
            <label class="block text-gray-700 font-medium">Delivery Date:</label>
            <input type="date" name="delivery_date" required
                   class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div>
            <button type="submit"
                    class="w-full bg-blue-500 text-white font-medium py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Save
            </button>
        </div>
    </form>
</div>

<script>
    $(document).ready(function () {
        $('#farmer-select').change(function () {
            let farmerId = $(this).val();
            $('#product-select').empty().append('<option value="">Select a product</option>');

            if (farmerId) {
                $.get('public/farmer/' + farmerId + '/products', function (data) {
                    data.forEach(function (product) {
                        $('#product-select').append('<option value="' + product.id + '">' + product.name + '</option>');
                    });
                });
            }
        });
    });
</script>

</body>
</html>
