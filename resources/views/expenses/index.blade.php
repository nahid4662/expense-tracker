
@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto mt-10 bg-white rounded-lg shadow-lg p-8">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Expenses</h2>
        <a href="{{ route('expenses.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Add Expense</a>
    </div>
    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
    @endif
    <table class="min-w-full bg-white border rounded">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b text-left">Amount</th>
                <th class="py-2 px-4 border-b text-left">Category</th>
                <th class="py-2 px-4 border-b text-left">Description</th>
                <th class="py-2 px-4 border-b text-left">Date</th>
                <th class="py-2 px-4 border-b text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($expenses as $expense)
                <tr class="hover:bg-gray-50">
                    <td class="py-2 px-4 border-b">${{ number_format($expense->amount, 2) }}</td>
                    <td class="py-2 px-4 border-b">{{ $expense->category->name ?? '-' }}</td>
                    <td class="py-2 px-4 border-b">{{ $expense->description }}</td>
                    <td class="py-2 px-4 border-b">{{ $expense->date }}</td>
                    <td class="py-2 px-4 border-b flex gap-2">
                        <a href="{{ route('expenses.edit', $expense) }}" class="text-blue-600 hover:underline">Edit</a>
                        <form action="{{ route('expenses.destroy', $expense) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="py-4 text-center text-gray-500">No expenses found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div class="mt-4">{{ $expenses->links() }}</div>
</div>
@endsection
