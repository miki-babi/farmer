@extends('admin.layout')

@section('title', 'Register')

@section('content')
<div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-4 text-center">Register</h2>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <label class="block mb-2">Name</label>
        <input type="text" name="name" class="border p-2 w-full rounded mb-4" required>

        <label class="block mb-2">Phone Number</label>
        <input type="text" name="phone" class="border p-2 w-full rounded mb-4" required>

        <label class="block mb-2">Password</label>
        <input type="password" name="password" class="border p-2 w-full rounded mb-4" required>

        <label class="block mb-2">Confirm Password</label>
        <input type="password" name="password_confirmation" class="border p-2 w-full rounded mb-4" required>

        <label class="block mb-2">Role</label>
        <select name="role" class="border p-2 w-full rounded mb-4">
            <option value="farmer">Farmer</option>
            <option value="admin">Admin</option>
        </select>

        <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded">Register</button>
    </form>

    
</div>
@endsection
