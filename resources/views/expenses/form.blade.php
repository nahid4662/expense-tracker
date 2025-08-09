@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-10 bg-white rounded-lg shadow-lg p-8">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">{{ isset($expense) ? 'Edit Expense' : 'Add Expense' }}</h2>
    @if($errors->any())
        <div class="mb-4 p-3 bg-red-100 text-red-800 rounded">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ isset($expense) ? route('expenses.update', $expense) : route('expenses.store') }}">
        @csrf
        @if(isset($expense))
            @method('PUT')
        @endif
        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Amount</label>
            <input type="number" step="0.01" name="amount" value="{{ old('amount', $expense->amount ?? '') }}" class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Category</label>
            <select name="category_id" class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $expense->category_id ?? '') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Description</label>
            <textarea name="description" class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400">{{ old('description', $expense->description ?? '') }}</textarea>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Date</label>
            <input type="date" name="date" value="{{ old('date', isset($expense) ? $expense->date : now()->toDateString()) }}" class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400" required>
        </div>
        <div class="flex justify-end gap-2">
            <a href="{{ route('expenses.index') }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 transition">Cancel</a>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">{{ isset($expense) ? 'Update' : 'Create' }}</button>
        </div>
    </form>
</div>
@endsection
