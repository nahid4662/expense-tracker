<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Http\Requests\StoreExpenseRequest;
use App\Http\Requests\UpdateExpenseRequest;
use App\Models\Category;
use App\Services\ExpenseService;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    private ExpenseService $expenseService;

    public function __construct(ExpenseService $expenseService)
    {
        $this->expenseService = $expenseService;
    }

    public function index()
    {
        $expenses = Expense::with('category')
            ->where('user_id', Auth::id())
            ->latest()
            ->paginate(10);

        return view('expenses.index', compact('expenses'));
    }

    public function create()
    {
        // Fetch categories for the select dropdown
        $categories = Category::where('user_id', Auth::id())->get();
        return view('expenses.form', compact('categories'));
    }

    public function store(StoreExpenseRequest $request)
    {
        $this->expenseService->create($request->validated(), Auth::id());

        return redirect()
            ->route('expenses.index')
            ->with('success', 'Expense created successfully.');
    }

    public function edit(Expense $expense)
    {
        // Fetch categories for the select dropdown
        $categories = Category::where('user_id', Auth::id())->get();
        return view('expenses.form', compact('expense', 'categories'));
    }

    public function update(UpdateExpenseRequest $request, Expense $expense)
    {
        $this->expenseService->update($expense, $request->validated());

        return redirect()
            ->route('expenses.index')
            ->with('success', 'Expense updated successfully.');
    }

    public function destroy(Expense $expense)
    {
        $expense->delete();

        return redirect()
            ->route('expenses.index')
            ->with('success', 'Expense deleted successfully.');
    }
}
