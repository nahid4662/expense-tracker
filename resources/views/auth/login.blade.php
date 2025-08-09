@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-100 to-blue-300">
    <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-8">
        <h2 class="text-3xl font-bold text-center text-blue-700 mb-6">Login to Expense Tracker</h2>
        @if(session('error'))
            <div class="mb-4 p-3 bg-red-100 text-red-800 rounded">{{ session('error') }}</div>
        @endif
        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf
            <div>
                <label class="block text-gray-700 mb-2">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                @error('email')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label class="block text-gray-700 mb-2">Password</label>
                <input type="password" name="password" required class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                @error('password')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex items-center justify-between">
                <label class="flex items-center">
                    <input type="checkbox" name="remember" class="mr-2">
                    <span class="text-gray-700">Remember me</span>
                </label>
                <a href="#" class="text-blue-600 hover:underline text-sm">Forgot password?</a>
            </div>
            <button type="submit" class="w-full py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition text-lg font-semibold cursor-pointer">Login</button>
        </form>
    </div>
</div>
@endsection
