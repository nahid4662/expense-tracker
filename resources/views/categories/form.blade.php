@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-10 bg-white rounded-lg shadow-lg p-8">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">{{ isset($category) ? 'Edit Category' : 'Add Category' }}</h2>
    @if($errors->any())
        <div class="mb-4 p-3 bg-red-100 text-red-800 rounded">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ isset($category) ? route('categories.update', $category) : route('categories.store') }}">
        @csrf
        @if(isset($category))
            @method('PUT')
        @endif
        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Name</label>
            <input type="text" name="name" value="{{ old('name', $category->name ?? '') }}" class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Description</label>
            <textarea name="description" class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400">{{ old('description', $category->description ?? '') }}</textarea>
        </div>
        <div class="flex justify-end gap-2">
            <a href="{{ route('categories.index') }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 transition">Cancel</a>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">{{ isset($category) ? 'Update' : 'Create' }}</button>
        </div>
    </form>
</div>
@endsection
